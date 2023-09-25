<?php
//class

include("item.php");
	include("weapon.php");
	include("armor.php");
	include("container.php");

include("being.php");
	include("character.php");
	include("npc.php");



//dirty inv dump
function _did($a){
	if(is_array($a)){
		$temp="(";
		for($b=0;$b<count($a);$b++){
			$temp.="\"".$a[$b]->getName()."\"";
			if($b<count($a)-1)
				$temp.=",";
			}
		$temp.=")<br/>\n";
		echo$temp;
		}
	}

?>