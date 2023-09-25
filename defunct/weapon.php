<?php
//weapon

$weapon=array(
	0=>array("Club","Dagger","Dirk","Knife","Hammer","Hatchet","Pickaxe","Shortsword","Sickle","Staff"),
	1=>array("Axe","Bludgeon","Flail","Goad","Halberd","Lance","Mace","Machete","Morningstar","Pike","Quarterstaff","Rapier","Sabre","Sword"),
	2=>array("Battleaxe","Broadsword","Cutlass","Falchion","Glaive","Longsword","Maul","Scimitar","Scythe"),
	3=>array("Longsword","Warhammer"),
	4=>array("Claymore","Katana")
	);

function randomWeapon($a=0){
	$b=$GLOBALS["weapon"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>