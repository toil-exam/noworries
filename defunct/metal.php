<?php
//metal

$metal=array(
	0=>array("Brass","Copper","Nickel","Pewter","Tin"),
	1=>array("Bronze","Cobalt","Invar","Iron","Steel"),
	2=>array("Aluminum","Electrum","Kovar","Nichrome","Talonite","Titanium"),
	3=>array("Chromium","Rosemetal","Silver","Vitallium","Zirconium"),
	4=>array("Gold","Palladium","Rosegold")
	);

function randomMetal($a=0){
	$b=$GLOBALS["metal"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>