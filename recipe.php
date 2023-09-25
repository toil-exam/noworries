<?php

class Recipe {
	var $book;
	var $nameRecipe;
	
	function __construct($level=0){
		$this->book=array(
			"animal"=>array(),
			"armor"=>array(),
			"crop"=>array(),
			"fabric"=>array(),
			"food"=>array(),
			"livestock"=>array(),
			"metal"=>array(),
			"rweapon"=>array(),
			"stone"=>array(),
			"weapon"=>array(),
			"wood"=>array()
			);
		$this->nameRecipe = new NameRecipe($level);
		}
	
	function addToBook($key,$value=0){
		if(is_array($this->book[$key])&&is_numeric($value)){
			$temp=randomENC($key,$value);
			$this->book[$key][$value][]=$temp;
			_style($temp);
			}
		else
			_log("failed to addToBooooook");
		}
		
	function cook($key,$value=0){
		if(is_array($this->book[$key])&&is_numeric($value)){
			if(!is_array($this->book[$key][$value])){
				$this->addToBook($key,$value);
				}
			$a=rand(0,count($this->book[$key][$value])-1);
			return $this->book[$key][$value][$a];
			}
		else
			_log("failed to cooook");
		}
	
	function borderMaterial($value=0){
		if($value==0){
			$temp=array(
				array("fabric",0)
				);
			}
		elseif($value==1){
			$temp=array(
				array("fabric",1),
				array("wood",0)
				);
			}
		elseif($value==2){
			$temp=array(
				array("fabric",2),
				array("wood",1),
				array("stone",0)
				);
			}
		elseif($value==3){
			$temp=array(
				array("fabric",3),
				array("wood",2),
				array("stone",1),
				array("metal",0)
				);
			}
		
		$r=rand(0,(count($temp)-1));
		$mat=$this->cook($temp[$r][0],$temp[$r][1]);
		return $mat;
		}
	
	function DUMP(){
		print_r($this->book);
		}
	
	}
	
	
	
	
?>