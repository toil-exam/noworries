<?php
//food

$food=array(
	0=>array("Dip","Juice","Meal","Paste"),
	1=>array("Cake","Chips","Soup"),
	2=>array("Salad","Stew"),
	3=>array("Dumpling","Loaf"),
	4=>array("Pastry","Sandwich")
	);

function randomFood($a=0){
	$b=$GLOBALS["food"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>