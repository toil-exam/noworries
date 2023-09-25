<?php
//area class

class Area {
	var $id;
	var $recipe;
	var $shape;
	var $origin;
	var $pointB;
	var $width;
	var $height;
	var $radius;
	var $area;
	var $name;
	
	function __construct($id,$recipe,$shape,$origin,$a,$b){
		$this->id = $id;
		$this->recipe = $recipe;
		$this->shape = $shape;
		if(isPoint($origin))
			$this->origin = $origin;
		if($shape=="square"){
			$this->width=$a;
			}
		elseif($shape=="rectangle"){
			$this->width=$a;
			$this->height=$b;
			}
		elseif($shape=="circle"){
			$this->radius=$a;
			}
		elseif($shape=="path"){
			$this->pointB=$a;
			$this->width=$b;
			}
		
		$this->area = area($shape,$origin,$a,$b);
		
		if($shape!="path")
			$this->setName();
		
		}
	
	function setName($name=2){
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