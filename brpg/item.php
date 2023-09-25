<?php

class Item {
	var $name;
	var $value;
	var $level;
	var $weight;
	var $description;
	var $type;
	var $condition;
	function setName($a){
		$this->name=$a;
		}
	function getName(){
		return $this->name;
		}
	function setValue($a){
		$this->value=$a;
		}
	function getValue(){
		return $this->value;
		}
	function setLevel($a){
		$this->level=$a;
		}
	function getLevel(){
		return $this->level;
		}
	function setWeight($a){
		$this->weight=$a;
		}
	function getWeight(){
		return $this->weight;
		}
	function setDescription($a){
		$this->description=$a;
		}
	function getDescription(){
		return $this->description;
		}
	function setType($a){
		$this->type=$a;
		}
	function getType(){
		return $this->type;
		}
	function setCondition($a){
		$this->condition=$a;
		}
	function getCondition(){
		return $this->condition;
		}
	function fixCondition(){
		$this->setCondition(100);
		}
	
	function __construct($a){
		$this->setName($a);
		$this->setCondition(100);
		}
	}

?>