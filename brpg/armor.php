<?php

class Armor extends Item {
	var $defense;
	function setDefense($a,$b){
		$this->defense=array($a,$b);
		}
	function getDefense(){
		return $defense;
		}
	function defense(){
		return round(rand($this->defense[0],$this->defense[1])*($this->condition/100),2);
		}
	
	function __construct($a){
		parent::__construct($a);
		}
	}


?>