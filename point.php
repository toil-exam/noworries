<?php

class Point {
	var $x;
	var $y;
	var $z;
	var $occupied;
	var $occupant;
	
	function __construct($x,$y,$z=0){
		$this->x=$x;
		$this->y=$y;
		$this->z=$z;
		$occupied=false;
		$occupant="";
		}
	
	function x(){
		return $this->x;
		}
	function y(){
		return $this->y;
		}
	function z(){
		return $this->z;
		}
	
	function xy(){
		$a=array($this->x(),$this->y());
		return $a;
		}
	function xyz(){
		$a=array($this->x(),$this->y(),$this->z());
		return $a;
		}
	
	function distanceFrom($x,$y,$z=0){
		$a=abs($this->x - $x);
		$b=abs($this->y - $y);
		$c=abs($this->z - $z);
		$d=pow($a,2)+pow($b,2)+pow($c,2);
		$e=round(sqrt($d));
		return $e;
		}
	
	
	function reposition($x,$y,$z=""){
		$this->x=$x;
		$this->y=$y;
		if($z!="")
			$this->z=$z;
		}
	
	function occupyWith($a){
		if(is_string($a)){
			$this->occupied=true;
			$this->occupant=$a;
			}
		}
	function unOccupy(){
		$this->occupied=false;
		$this->occupant=null;
		}
	
	function isOccupied(){
		return $this->occupied;
		}
	
	function isOccupiedBy(){
		return $this->occupant;
		}
	
	}

?>