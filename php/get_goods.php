<?php

header("Content-Type:text/plain;charset=utf-8");

$host    = 'localhost';

define('HOST' , 'http://www.didaozhan.com');

if(strpos($_SERVER['HTTP_HOST'] , 'didaozhan.com') !== false){
	$db_user = 'shop7001798_u';
	$db_pwd  = 'SMTuPQG5b6Tn';
	$db_name = 'shop7001798';
} else {
	$db_user = 'root';
	$db_pwd  = 'wcq537';
	$db_name = 'ekd';
}

function get_all_goods(){
	global $db_user , $db_name , $db_pwd , $host;

	$link = mysqli_connect($host , $db_user , $db_pwd , $db_name);
	if (!$link) {
	   die("Connect failed: " . mysqli_connect_error());
		exit();
	}

	####################################################################
	$pics = array();
	mysqli_query($link , 'SET NAMES "utf8";');
	$result = mysqli_query($link , 'SELECT goods_id , source FROM  `sdb_gimages` WHERE goods_id > 0 LIMIT 0 , 100000;');

	while($o = mysqli_fetch_assoc($result)){
		$pics['pic_'.$o['goods_id']][] = HOST.'/home/upload/'.$o['source'];
	}
	mysqli_free_result($result);
	#####################################################################

	$result = mysqli_query($link , 'SELECT goods_id , marketable , bn , name , g.cat_id as catid , c.cat_name as catname , mktprice , price , cost , weight , store , brief , intro FROM `sdb_goods` g , `sdb_goods_cat` c WHERE g.cat_id = c.cat_id and g.disabled="false" LIMIT 0 , 100000;');

	$goods_record = <<<ENDOF
	<item>
		<id>%s</id>
		<marketable>%s</marketable>
		<bn>%s</bn>
		<name><![CDATA[%s]]></name>
		<cat_id>%s</cat_id>
		<cat_name>%s</cat_name>
		<mktprice>%s</mktprice>
		<price>%s</price>
		<cost>%s</cost>
		<weight>%s</weight>
		<store>%s</store>
		<brief><![CDATA[%s]]></brief>
		<intro><![CDATA[%s]]></intro>
		<pics><![CDATA[%s]]></pics>
	</item>
ENDOF;

	$ary = array("<?xml version='1.0' encoding='utf-8' ?>\n<goods>");

	while($o = mysqli_fetch_assoc($result)){
		$pcs = '';
		if(isset($pics['pic_'.$o['goods_id']])){
			$pcs = join('|' , $pics['pic_'.$o['goods_id']]);
		} 
		$ary['id_'.$o['goods_id']] = sprintf($goods_record , $o['goods_id'] , $o['marketable'] , $o['bn'] , $o['name'] , $o['catid'] , $o['catname'] , $o['mktprice'] , $o['price'] , $o['cost'] , $o['weight'] , $o['store'] , $o['brief'] , $o['intro'] , $pcs);

	}
	$ary[]= '</goods>';
	mysqli_free_result($result);
	mysqli_close($link);
	echo join('' , $ary);
}

function get_pics($format = 'py'){
	global $db_user , $db_name , $db_pwd , $host;
	$link = mysqli_connect($host , $db_user , $db_pwd , $db_name);
	if (!$link) {
	   die("Connect failed: " . mysqli_connect_error());
		exit();
	}

	####################################################################
	$result = mysqli_query($link , 'SELECT goods_id , source FROM `sdb_gimages` WHERE goods_id > 0 LIMIT 0 , 100000;');
	$pics = array();
	#################################
	if($format == 'py' || $format == 'python' || $format == 'p'){
		$pics[] = "pics = [";
		$firstline=True;
		while($o = mysqli_fetch_assoc($result)){
			$pics[] = sprintf($firstline ? "['%s' , '%s']" : ",['%s' , '%s']" , $o["goods_id"] ,  HOST.'/home/upload/'.$o['source']);
			$firstline = False;
		}
		$pics[] = "]";
	}else{
		$pics[] = "<?php";
		$pics[] = '$pics = array(';
		$firstline=True;
		while($o = mysqli_fetch_assoc($result)){
			$pics[] = sprintf($firstline ? "\tarray('%s' , '%s')" : "\t,array('%s' , '%s')" , $o["goods_id"] ,  HOST.'/home/upload/'.$o['source']);
			$firstline = False;
		}
		$pics[] = ");\r\n?>";
	}
	#################################
	echo join("\r\n" , $pics);

	mysqli_free_result($result);
	mysqli_close($link);
}


if(!isset($_REQUEST['pic'])){ 
	get_all_goods();
}else{
	get_pics($_REQUEST['type']);
}
?>