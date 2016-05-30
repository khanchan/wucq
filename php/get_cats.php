<?php

header("Content-Type:text/plain;charset=utf-8");

$host    = 'localhost';

if(strpos($_SERVER['HTTP_HOST'] , 'didaozhan.com') !== false){
	$db_user = 'shop7001798_u';
	$db_pwd  = 'SMTuPQG5b6Tn';
	$db_name = 'shop7001798';
} else {
	$db_user = 'root';
	$db_pwd  = 'wcq537';
	$db_name = 'ekd';
}

### 获取所有分类
function get_cats(){
	global $db_user , $db_name , $db_pwd , $host;

	$link = mysql_connect($host , $db_user , $db_pwd);

	mysql_select_db($db_name , $link);

	if (!$link) {
	    die("Connect failed: " . mysql_error());
		exit();
	}

	####################################################################
	
	mysql_query('SET NAMES "utf8";' , $link );
	
	#####################################################################

	$result = mysql_query('SELECT cat_id , parent_id , cat_path , is_leaf , cat_name , child_count FROM `sdb_goods_cat` WHERE disabled="false" ORDER BY cat_path LIMIT 0 , 100000;' , $link) or die(mysql_error($link));

$cat_record = <<<ENDOF
	
<item>
	<cat_id>%s</cat_id>
	<parent_id>%s</parent_id>
	<parent_name>%s</parent_name>
	<cat_path>%s</cat_path>
	<cat_name><![CDATA[%s]]></cat_name>
	<is_leaf>%s</is_leaf>
	<child_count>%s</child_count>
</item>
ENDOF;
	#echo mysql_num_rows($result);

	$ary = array("<?xml version='1.0' encoding='utf-8' ?>\n<cats>");
	
	$objs = array();

	while($obj = mysql_fetch_assoc($result)){
		$objs[] = $obj;
	}
		
	foreach($objs as $o){
		$parent_name = '临时节点';
		
		foreach($objs as $tmo){
			if($tmo['cat_id'] == $o['parent_id']){
				$parent_name = $tmo['cat_name'];
				break;
			}
		}

		$ary[] = sprintf($cat_record , $o['cat_id'] , $o['parent_id'] , $parent_name , $o['cat_path'] , $o['cat_name'] , $o['is_leaf'] , $o['child_count']);
	
	}

	$ary[]= '</cats>';
	mysql_free_result($result);
	mysql_close($link);
	echo join('' , $ary);
}

function biantai_sort($a , $b){
	if($a['parent_id'] == '0' || $a['parent_id'] == 0){
		return 1;
	}else{
	
	}
}

function get_virtual_cats(){
	global $db_user , $db_name , $db_pwd , $host;

}

get_cats();

?>