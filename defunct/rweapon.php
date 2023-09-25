<?php
//ranged weapon

$rweapon=array(
	0=>array("Sling"),
	1=>array("Bow"),
	2=>array("Longbow"),
	3=>array("Crossbow"),
	4=>array("Cannon")
	);

function randomRWeapon($a=0){
	$b=$GLOBALS["rweapon"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>