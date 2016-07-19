#! /usr/bin/php
<?php

function bin_search($ary , $val){
	$left = 0;
	$right= count($ary);	
	while($left < $right){
		$middle = $left + (($right-$left)>>1);
		if($ary[$middle] > $val){
			$right = $middle;
		} else if($ary[$middle] < $val){
			$left = $middle + 1;
		} else {
			return $middle;
		} 
	}
	return -1;
}

function test(){

	$start = 1;
	$end   = 100;
	$tmp   = range($start   , $end);
	$find  = range($start-5 , $end+5);
	foreach($find as $val){

		echo "$val : " , bin_search($tmp , $val) , "\n";
	}

}
test();
