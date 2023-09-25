<?php
//animal

$animal=array(
	0=>array("Chicken","Rabbit","Rat"),
	1=>array("Camel","Cattle","Deer","Donkey","Goat","Pig","Sheep","Yak"),
	2=>array("Alpaca","Buffalo","Bear","Bison","Crocodile","Elk","Moose","Reindeer"),
	3=>array("Addax"),
	4=>array("Oryx")
	);

function randomAnimal($a=0){
	$b=$GLOBALS["animal"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>