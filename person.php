<?php
//person

class Person {
	var $recipe;
	var $id;
	var $name;
	var $stat;
	var $inventory;
//	var $location;
	
	function __construct($id,$recipe="",$level=""){
		
		if($recipe=="")
			$r = count($_SESSION["world"]->recipe)-1;
		elseif(is_numeric($recipe))
			$r = $recipe;
		
		$this->recipe = $recipe;
		$this->id = $id;
		$this->name = "PLACEHOLDER";
		$this->stat = array(
			"stamina"=>array(),
			"health"=>array(),
			"agility"=>array(),
			"intelligence"=>array(),
			"mana"=>array()
			;
		$this->inventory = array();
		}
	
	
	
	}

?>