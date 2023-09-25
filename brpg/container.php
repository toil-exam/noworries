<?php

class Container extends Item {
	var $capacity; //in weight I guess?
	var $inventory=array();
	
	function setCapacity($a){
		$this->capacity=$a;
		}
	function getCapacity(){
		return $this->capacity;
		}
	function getFreeCapacity(){
		$temp=0;
		for($a=0;$a<count($this->inventory);$a++)
			{
			$temp+=$this->inventory[$a]->getWeight();
			}
		if($temp>=$this->capacity)
			return 0;
		elseif($temp<$this->capacity)
			return $this->capacity-$temp;
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
	
	function __construct($a){
		parent::__construct($a);
		}
	
	}

?>