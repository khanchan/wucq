#! /usr/bin/php
<?php

function quick_sort($ary){
	$len = count($ary);
	if($len <= 1){
		return $ary;
	}
	$left = array();
	$right= array();	
	$flag = $ary[0];
	for($i = 1 ; $i < $len ; $i++){
		if($flag > $ary[$i]){
			$left[] = $ary[$i];
		}else{
			$right[] = $ary[$i];
		}
	}
	return array_merge(quick_sort($left) , array($flag) , quick_sort($right));
}

function test(){

	$ary = array_merge(range(1,10) , range(1,20));
	shuffle($ary);
	print_r(quick_sort($ary));
}
test();
