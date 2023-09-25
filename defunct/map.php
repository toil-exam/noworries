<?php
//POSSIBLY DEPRECATE
class Map {
	var $map = array();
	
	
	function buildAsRectangle($width="",$height="",$originX=0,$originY=0){
		if($width!="" && $height!=""){
			$xStart=$originX-round($width/2);
			$xStop=$width-$xStart;
			$yStart=round($height/2)-$originY;
			$yStop=$yStart-$height;
			
			for($x=$xStart;$x<=$xStop;$x++){
				for($y=$yStart;$y>=$yStop;$y--){
					$this->map[$x][$y] = new Point($x,$y);
					
					if(($x==$xStart||$x==$xStop)&&($y==$yStart||$y==$yStop)){
						$_SESSION["map"][$x][$y]->occupyWith("stuff");
						}
					
					}
				
				
				}
			
			}
		}
	
	
	
	}

?>