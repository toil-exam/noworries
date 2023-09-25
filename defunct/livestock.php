<?php
//livestock

$livestock=array(
	0=>array(),
	1=>array(),
	2=>array(),
	3=>array(),
	4=>array()
	);

function randomLivestock($a=0){
	$b=$GLOBALS["livestock"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>