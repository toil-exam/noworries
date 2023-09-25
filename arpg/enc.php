<?php
//enc
$GLOBALS["enc"]["race"]=array("human","orc","elf");

function _random_race(){
	$a=rand(0,(count($GLOBALS["enc"]["race"])-1));
	return $GLOBALS["enc"]["race"][$a];
	}

//common stats "strength"(sp),"health"=>(hp),"agility"(ap),"intelligence"(ip),"mana"(mp)

/*
class race{
	var $name;
	function set_name($a){
		$this->name=$a;
		}
	function get_name(){
		return $this->name;
		}
	}
*/

function _generate_race($b=1,$a=""){
	if($a=="")
		$a=_random_race();
	$c=array();
	$c["race"]=$a;
	$c["level"]=$b;
	$c["inv"]=array();
	if($a=="human"){
		$c["stat"]["strength"]=_d($b,4);
		$c["stat"]["health"]=_d((2*$b),3)+1;
		$c["stat"]["agility"]=_d($b,5);
		$c["stat"]["intelligence"]=_d($b,8);
		$c["stat"]["mana"]=_d($b,5);
		}
	elseif($a=="orc"){
		$c["stat"]["strength"]=_d($b,10);
		$c["stat"]["health"]=_d((2*$b),4)+1;
		$c["stat"]["agility"]=_d($b,3);
		$c["stat"]["intelligence"]=_d($b,5);
		$c["stat"]["mana"]=_d($b,3);
		}
	elseif($a=="elf"){
		$c["stat"]["strength"]=_d($b,3);
		$c["stat"]["health"]=_d((2*$b),2)+1;
		$c["stat"]["agility"]=_d($b,6);
		$c["stat"]["intelligence"]=_d($b,7);
		$c["stat"]["mana"]=_d($b,8);
		}
	return $c;
	}

$GLOBALS["enc"]["weapon"]=array("knife","sword","club");

function _random_weapon(){
	$a=rand(0,(count($GLOBALS["enc"]["weapon"])-1));
	return $GLOBALS["enc"]["weapon"][$a];
	}

//common stats "type","level","damage","weight","value"

function _generate_weapon($a=1,$b=""){
	if($b=="")
		$b=_random_weapon();
	$c=array();
	$c["type"]=$b;
	$c["level"]=$a;
	if($b=="knife"){
		$c["damage"]=_d($a,4);
		$c["weight"]=_d($a,2);
		$c["value"]=$a;
		}
	elseif($b=="sword"){
		$c["damage"]=_d((2*$a),4)+1;
		$c["weight"]=_d($a,6);
		$c["value"]=_d($a,5);
		}
	elseif($b=="club"){
		$c["damage"]=_d($a,7);
		$c["weight"]=_d($a,7);
		$c["value"]=_d($a,3);
		}
	return$c;
	}





		





/*
$_SESSION["world"][1][2][3]=array("text"=>"Level 1\nOrc","button"=>"Attack");

*/


function _generate_area($level=""){
	if($level=="")
		$level=$_SESSION["user"]["level"];
	$b=count($_SESSION["world"]);
	$_SESSION["world"][$b]=array();
	$e=_d(4,($level*2));
	$f=_d(4,($level*2));
	for($c=0;$c<$e;$c++){
		for($d=0;$d<$f;$d++){
			$_SESSION["world"][$b][$c][$d]=array();
			if(($c==0||$c==($e-1))||($d==0||$d==($f-1)))
				$_SESSION["world"][$b][$c][$d]["type"]="wall";
			else{
				$_SESSION["world"][$b][$c][$d]["type"]="empty";
				$_SESSION["world"][$b][$c][$d]["inv"]=array();
				}
			}
		}
	}





?>