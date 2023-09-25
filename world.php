<?php

class World {
	var $map = array();
	var $recipe = array();
	var $area = array();
	var $census = array();
	
	function addPerson($level="",$recipe=""){
		$id = count($this->census);
		$this->census[$id] = new Person($id,$recipe,$level);
		}
	
	function buildRecipe($a=""){
		if(is_numeric($a))
			$this->recipe[$a] = new Recipe();
		elseif($a=="")
			$this->recipe[] = new Recipe();
		}
	
	
	function buildArea($recipe,$shape,$originX,$originY,$a,$b="",$c=""){
		$area=area($shape,$originX,$originY,$a,$b="",$c="");
		//plot
		$aNum=count($this->area);
		//$this->area[$aNum]["area"]=$area;
		if(!is_object($this->recipe[$recipe]))
			$this->buildRecipe($recipe);
		$this->area[$aNum] = new Area ($area,$recipe,$aNum);
		
		
		for($d=0;$d<count($area);$d++){
			$x=$area[$d][0];
			$y=$area[$d][1];
			if(!is_object($this->map[$x][$y]))
				$this->map[$x][$y] = new Point($x,$y);
			}
		//then edge
		$mat=$this->recipe[$this->area[$aNum]->recipe]->borderMaterial(3);
		$dir=array(array(0,1),array(0,-1),array(-1,0),array(1,0));
		for($d=0;$d<count($area);$d++){
			$check=0;
			for($e=0;$e<4;$e++){
				$cX=$area[$d][0]+$dir[$e][0];
				$cY=$area[$d][1]+$dir[$e][1];
				if(is_object($this->map[$cX][$cY]))
					$check++;
				}
			if($check<4)
				$this->map[$area[$d][0]][$area[$d][1]]->occupyWith($mat);
			else
				$this->map[$area[$d][0]][$area[$d][1]]->unOccupy();
			}
		}//build area end
	
	}//class end

?>