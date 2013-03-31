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

	$ary = range(1,101);
	echo(bin_search($ary , 4.3));
	echo(bin_search($ary , 300));
	echo(bin_search($ary , 101));
}
test();
