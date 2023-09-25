<?php
//person

//does a person need to keep record of recipe? maybe?

class Person {
	var $recipe;
	var $id;
	var $name;
	var $level;
	var $stat;
	var $inventory;
	var $body;
//	var $location;
	
	function __construct($id,$recipe="",$level=0){
		if($recipe=="")
			$r = count($_SESSION["world"]->recipe)-1;
		elseif(is_numeric($recipe))
			$r = $recipe;
		$this->recipe = $r;
		$this->id = $id;
		$this->name = array("first"=>"Bob","last"=>"Belcher");
		$this->level = $level;
		$this->stat = array(
			"strength"=>array(0,0),
			"health"=>array(10,10),
			"agility"=>array(0,0),
			"intelligence"=>array(0,0),
			"mana"=>array(0,0),
			"experience"=array(0,5)
			);
		$this->body = array(
			"head"=>"",
			"chest"=>"",
			"legs"=>"",
			"feet"=>"",
			"hand"=>array(hand()=>"",hand(false)=>""),
			"extra"=>""
			);
		$this->inventory = array();
		}
	
	function firstName(){
		return $this->name["first"];
		}
	function lastName(){
		return $this->name["last"];
		}
	
	function setStat($stat,$value,$test=true){
		if(is_array($this->stat[$stat])){
			if(is_numeric($value) && $test==true)
				$this->stat[$stat][0] = $value;
			elseif(is_numeric($value) && $test==false)
				$this->stat[$stat][1] = $value;
			}
		}
	function stat($stat,$value=true){
		if($value==true)
			return $this->stat[$stat][0];
		elseif($value==false)
			return $this->stat[$stat][1];
		}
	
	function inHand($item,$test=true){
		$hand=hand($test);
		return ($this->body->hand[$hand]==$item);
		}
	function emptyHanded($test=true){
		$hand=hand($test);
		return ($this->body->hand[$hand]=="");
		}
	function addToHand($item,$test=true){
		$hand=hand($test);
		$this->body->hand[$hand]=$item;
		}
	function emptyHand($test=true){
		$hand=hand($test);
		$this->body->hand[$hand]="";
		}
	
	function name(){
		return $this->firstName()." ".$this->lastName();
		}
	
	function inInventory($item){
		return in_array($item,$this->inventory);
		}
	function addToInventory($item){
		$this->inventory[]=$item;
		}
	function removeFromInventory($item){
		if(inInventory($item)){
			$temp=array();
			for($a=0;$a<count($this->inventory);$a++){
				if($this->inventory[$a] != $item)
					$temp[]=$this->inventory[$a];
				}
			$this->inventory = $temp;
			}
		}
	
	function arm($item,$test=true){
		$hand=hand($test);
		if(inInventory($item) && $this->emptyHanded($hand)){
			$this->removeFromInventory($item);
			$this->addToHand($item);
			}
		}
	function disarm($test=true){
		$hand=hand($test);
		if(!$this->emptyHanded($hand){
			for($a=0;$a<count($this->body->hand[$hand]);$a++){
				$item=$this->body->hand[$hand][$a];
				$this->emptyHand($item);
				$this->addToInventory($item);
				}
			}
		}
	
	
	function attack($test=true){
		$hand=hand($test);
		$attack=0;
		if(is_object($this->body->hand[$hand])){
			if($this->body->hand[$hand]->isA("weapon")){
				$A=$this->body->hand[$hand]->level;
				$B=$this->body->hand[$hand]->rarity+1;
				}
			}
		else{
			$A=$this->level;
			$B=1;
			}
		$C=$this->stat("strength");
		$attack=d($A,$B,$C);
		return $attack;
		}
	
	
	}

?>