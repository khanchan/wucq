<?php

header("Content-Type:text/html;charset=utf-8");

//保存 shopEX 导出来的所有商品的 xml
$shopex_goods_data = './data/product-didaozhan.com.xml';

$mb = array(
	'name' => 'no name'
	,'description' => 'description-debug'
	,'short_description' => 'short-description-debug'	
	,'sku' => 'sku-'
	,'weight' => '12'	
	,'news_from_date' => '' 	
	,'news_to_date' => '' 	
	,'status' => '1'	
	,'url_key' => ''
	,'visibility' => '4'	
	,'is_imported' => '0'	
	,'price' => '90'
	,'special_price' => '80'	
	,'special_from_date' => ''	
	,'special_to_date' => ''
	,'cost' => '60'
	,'tax_class_id' => '0'
	,'enable_googlecheckout' => '1'
	,'meta_title' => '' 	
	,'meta_keyword' => '' 	
	,'meta_description' => ''
	,'image' => 'no_selection'	
	,'small_image' => 'no_selection'	
	,'thumbnail' => 'no_selection'	
	,'media_gallery' => array(	
		'images' => '[]'
		,'values' => '{"image":"http://www.didaozhan.com/home/upload/gpic/jjj_pic/p0.636359-T2rFNxXihMXXXXXXXX_!!409339828.jpg","small_image":"http://www.didaozhan.com/home/upload/gpic/jjj_pic/p0.636359-T2rFNxXihMXXXXXXXX_!!409339828.jpg","thumbnail":"http://www.didaozhan.com/home/upload/gpic/jjj_pic/p0.636359-T2rFNxXihMXXXXXXXX_!!409339828.jpg"}'
	)
	,'is_recurring' => '0'	
	,'recurring_profile' => ''
	,'custom_design' => ''	
	,'custom_design_from' => ''	
	,'custom_design_to' => ''	
	,'custom_layout_update' => ''
	,'page_layout' => ''
	,'options_container' => 'container2'	
	,'use_config_gift_message_available' => '1'	
	,'stock_data' => array(
		'use_config_manage_stock' => '1'	
		,'original_inventory_qty' => '0'	
		,'qty' => '1230'
		,'use_config_min_qty' => '1'	
		,'use_config_min_sale_qty' => '1'	
		,'use_config_max_sale_qty' => '1'	
		,'is_qty_decimal' => '0'	
		,'use_config_backorders' => '1'	
		,'use_config_notify_stock_qty' => '1'	
		,'use_config_enable_qty_increments' => '1'	
		,'use_config_qty_increments' => '1'	
		,'is_in_stock' => '1'	
	)
	,'website_ids' => array('1' , '4' , '3' , '5')
);

if (!file_exists($shopex_goods_data)) {

	die("请先生成shopex的XML格式数据文件 : {$shopex_goods_data}" );
} 

$xml = simplexml_load_file($shopex_goods_data);

$index = 1;
foreach($xml as $r){
	#echo '<li>' , $r->name;
	$mb['name'] = strval($r->name);
	$mb['sku'] = strval($r->bn);
	$mb['description'] = strval($r->intro);
	$mb['short_description'] = strval($r->brief);
	$mb['weight'] = strval($r->weight);
	$mb['stock_data']['qty'] = 1000;//strval($r->store ? 10 : $r->store);
	$mb['price'] = strval(isset($r->mktprice) ? $r->mktprice : $r->price);
	$mb['cost'] = strval($r->cost);
	$mb['special_price'] = strval($r->price);
	$mb['goods_id'] = strval($r->id);
	$mb['cat_name'] = strval($r->cat_name);

	if(strval($r->marketable) == 'true'){ // 有库存

		$dump_file = './goods-dump/'.$mb['sku'].'.dump';

		if(!file_exists($dump_file)){

			file_put_contents($dump_file , serialize($mb));
		
			echo '<li><div style="color:white;width:100%;background-color:black;">' , $index , ' : ' , $r->store , ' | ', $mb['sku'] , '</div>';

		}else{
			echo '<li>' , $index , ' : ' , $r->store , ' | ', $mb['sku']  , '<font color=green>此条记录为本地缓存</font>';
		}
		
		$index++;
	}
}
?>