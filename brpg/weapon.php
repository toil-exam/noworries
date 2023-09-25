<?php

class Weapon extends Item {
	var $attack;
	function setAttack($a,$b){
		$this->attack=array($a,$b);
		}
	function getAttack(){
		return $attack;
		}
	function attack(){
		return round(rand($this->attack[0],$this->attack[1])*($this->condition/100),2);
		}
		
	function __construct($a){
		parent::__construct($a);
		}
	}

?>