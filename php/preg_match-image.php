<?php


class O{

	const URL = 'http://www.chunbo.com/product/';

	const REG = '/http:\/\/[^"]*?(?=")/';

	public static function getBtween($str , $start_str , $end_str){
		$start = strpos($str , $start_str);
		$end   = strpos($str , $end_str);
		return substr($str , $start+strlen($start_str) , $end-$start-strlen($end_str));
	}

	public static function getImgsAndName($v){
		$url = self::URL;
		$ary = array();
		if(is_int($v)){ # 传id 
			$ary[] = self::fetch($url.$v);
		}else if(is_array($v)){
		
			foreach($v as $_){
				$ary[] = self::fetch($_);
			}
		}
		return $ary;	
	}

	public static function fetch($id){
		$url       = is_int($id) ? self::URL.$id : $id;
		$domstr    = file_get_contents($url); 
		$start_str = 'id="product_image_list"';
		$end_str   = 'class="name"';
		$matches   = array();
		$imgsstr   = self::getBtween($domstr , $start_str , $end_str);
		$imgsstr   = preg_match_all(self::REG, $imgsstr, $matches);

		return isset($matches[0]) && isset($matches[0][0]) ? array('imgs' => $matches[0] ,'name' => self::getBtween($domstr , '<h3>', "</h3>")) : array('imgs'  => array() ,'name' => '');
	}
}

var_dump(O::getImgsAndName(range(3023,3026)));