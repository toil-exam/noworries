<?php
//stones

$stone=array(
	0=>array("Limestone","Mudstone","Sandstone"),
	1=>array("Basalt","Flint","Granite","Quartz","Slate"),
	2=>array("Gneiss","Marble","Obsidian"),
	3=>array("Andesite","Basanite","Quartzite"),
	4=>array("Crocodite","Jadedite","Serpentinite")
	);

function randomStone($a=0){
	$b=$GLOBALS["stone"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>