<?php
//birth
$_SESSION["user"]=array();
$_SESSION["user"]=_generate_race();
$_SESSION["user"]["sp"]=$_SESSION["user"]["stat"]["strength"]*10;
$_SESSION["user"]["hp"]=$_SESSION["user"]["stat"]["health"]*10;
$_SESSION["user"]["ap"]=$_SESSION["user"]["stat"]["agility"]*10;
$_SESSION["user"]["ip"]=$_SESSION["user"]["stat"]["intelligence"]*10;
$_SESSION["user"]["mp"]=$_SESSION["user"]["stat"]["mana"]*10;
$_SESSION["user"]["inv"][]=_generate_weapon();
$_SESSION["user"]["lives"]=0;

$_SESSION["world"]=array();
_generate_area();

$a=array();
for($b=0;$b<count($_SESSION["world"][0]);$b++){
	for($c=0;$c<count($_SESSION["world"][0][$b]);$c++){
		if($_SESSION["world"][0][$b][$c]["type"]=="empty")
			$a[]=array($b,$c);
		}
	}
$d=rand(0,(count($a)-1));
$_SESSION["user"]["location"]=array("z"=>0,"x"=>$a[$d][0],"y"=>$a[$d][1]);

_div("You've been born!");
_div("You are a newborn ".$_SESSION["user"]["race"].".");
_divstat();
_divqbf("edit","edit","Edit Settings");
_divqbf("","","STERT");

?>