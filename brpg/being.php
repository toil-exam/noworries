<?php

class Being {
	var $name;
	var $level;
	var $type;
	var $inventory=array();
	var $strength;
	var $sp;
	var $health;
	var $hp;
	var $agility;
	var $ap;
	var $intelligence;
	var $ip;
	var $mana;
	var $mp;
	var $lives;
	var $gold;
	
	function setStat($stat,$a){
		$this->$stat=$a;
		}
	function getStat($stat){
		return $this->$stat;
		}
	
	function setName($a){
		$this->name=$a;
		}
	function getName(){
		return $this->name;
		}
	function setLevel($a){
		$this->level=$a;
		}
	function getLevel(){
		return $this->level;
		}
	function setType($a){
		$this->type=$a;
		}
	function getType(){
		return $this->type;
		}
	//inventory >>;;
	function getCapacity(){
		return $this->strength*10;
		}
	function getFreeCapacity(){
		$temp=0;
		for($a=0;$a<count($this->inventory);$a++)
			{
			$temp+=$this->inventory[$a]->getWeight();
			}
		if($temp>=$this->getCapacity())
			return 0;
		elseif($temp<$this->getCapacity())
			return $this->getCapacity()-$temp;
		}
	function addItem($a){
		if($this->getFreeCapacity()>=$a->weight)
			$this->inventory[]=$a;
		else{
			echo $this->getName()." is too FULL<br/>\n";
			echo "(".$this->getFreeCapacity()."/".$this->getCapacity().") Available<br/>\n";
			}
		}
	function removeItem($a){
		if(in_array($a,$this->inventory))
			{
			$temp=array();
			for($b=0;$b<count($this->inventory);$b++)
				{
				if($this->inventory[$b]!=$a)
					$temp[]=$this->inventory[$b];
				}
			$this->inventory=$temp;
			}
		}
	function clearInventory(){
		$this->inventory=array();
		}
	function setInventory($a){
		$this->clearInventory();
		if(is_array($a)){
			for($b=0;$b<count($a);$b++){
				$this->addItem($a[$b]);
				}
			}
		else
			$this->addItem($a);
		}
	function getInventory(){
		return $this->inventory;
		}
	
	
	
	//stats: strength, health, agility, intelligence, mana
	function setStrength($a){
		$this->strength=$a;
		}
	function getStrength(){
		return $this->strength;
		}
	function setSP($a){
		$this->sp=$a;
		}
	function getSP(){
		return $this->sp;
		}
	function setHealth($a){
		$this->health=$a;
		}
	function getHealth(){
		return $this->health;
		}
	function setHP($a){
		$this->hp=$a;
		}
	function getHP(){
		return $this->hp;
		}
	function setAgility($a){
		$this->agility=$a;
		}
	function getAgility(){
		return $this->agility;
		}
	function setAP($a){
		$this->ap=$a;
		}
	function getAP(){
		return $this->ap;
		}
	function setIntelligence($a){
		$this->intelligence=$a;
		}
	function getIntelligence(){
		return $this->intelligence;
		}
	function setIP($a){
		$this->ip=$a;
		}
	function getIP(){
		return $this->ip;
		}
	function setMana($a){
		$this->mana=$a;
		}
	function getMana(){
		return $this->mana;
		}
	function setMP($a){
		$this->mp=$a;
		}
	function getMP(){
		return $this->mp;
		}
	
	function setLives($a){
		$this->lives=$a;
		}
	function getLives(){
		return $this->lives;
		}
	
	function setGold($a){
		$this->gold=$a;
		}
	function addGold($a){
		$this->gold+=$a;
		}
	function removeGold($a){
		$this->gold-=$a;
		}
	function getGold(){
		return $this->gold;
		}
	
	function __construct(){
		
		}
	
	}

?>