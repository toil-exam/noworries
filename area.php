<?php
//area class

class Area {
	var $area;
	var $recipe;
	var $name;
	var $id;
	
	function __construct($area,$recipe=0,$id=""){
		$this->area = $area;
		$this->recipe = $recipe;
		if($id=="")
			$this->id = count($_SESSION["world"]->area);
		elseif(is_numeric($id))
			$this->id = $id;
		
		}
	
	function setName($name=3){
		if(is_numeric($name)){
			$tempName = $_SESSION["world"]->recipe[$this->recipe]->nameRecipe->cookName($name);
			$this->name = $tempName;
			}
		else
			$this->name=$name;
		}
	
	function areaName(){
		return $this->name;
		}
	
	function area(){
		return $this->area;
		}
	
	}




?>