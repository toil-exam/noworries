<?php
//area function

function area($shape,$originX,$originY,$a,$b="",$c=""){
	/*
	if(isPoint($origin)){
		$originX=$origin[0];
		$originY=$origin[1];
		}
	*/
		
	$area=array();
	
	if(($shape=="square")&&(is_numeric($a))){
		//a is width fyi
		$xStart=$originX-round($a/2);
		$xStop=$a+$xStart;
		$yStart=$originY+round($a/2);
		$yStop=$yStart-$a;
		for($x=$xStart;$x<=$xStop;$x++){
			for($y=$yStart;$y>=$yStop;$y--){
				$area[]=array($x,$y);
				}
			}
		}
	elseif(($shape=="rectangle")&&(is_numeric($a)&&is_numeric($b))){
		//a is width again, b is height
		$xStart=$originX-round($a/2);
		$xStop=$a+$xStart;
		$yStart=$originY+round($b/2);
		$yStop=$yStart-$b;
		for($x=$xStart;$x<=$xStop;$x++){
			for($y=$yStart;$y>=$yStop;$y--){
				$area[]=array($x,$y);
				}
			}
		}
	elseif(($shape=="circle")&&(is_numeric($a))){
		//a is radius
		$xStart=$originX-$a;
		$xStop=($a*2)+$xStart;
		$yStart=$originY+$a;
		$yStop=$yStart-($a*2);
		for($x=$xStart;$x<=$xStop;$x++){
			for($y=$yStart;$y>=$yStop;$y--){
				if(round(sqrt(pow($originX-$x,2)+pow($originY-$y,2)))<=$a){
					$area[]=array($x,$y);
					}
				}
			}
		}
	elseif(($shape=="path")&&(is_numeric($a))&&(is_numeric($b))&&(is_numeric($c))){
		//path from the origin point to a,b with width of c
		
		//declare the two points as x0,y0 and x1,y1 such that x0 < x1
		if($originX<=$a){
			$x0=$originX;
			$x1=$a;
			$y0=$originY;
			$y1=$b;
			}
		else{
			$x0=$a;
			$x1=$originX;
			$y0=$b;
			$y1=$originY;
			}
			
		//letsss determinnnne sloooooope
		if($x0==$x1){
			$m0="vLine";
			$xintercept0=$x0;
			}
		elseif($y0==$y1){
			$m0="hLine";
			$yintercept0=$y0;
			}
		else{
			$m0=($y0-$y1)/($x0-$x1);
			$m1=(-1)/($m0);
			$b0=$y0-($m0*$x0);
			}
		
		//determine x range
		if($x0<=$x1){
			$xStart=$x0-$c;
			$xStop=$x1+$c;
			}
		else{
			$xStart=$x1-$c;
			$xStop=$x0+$c;
			}
		//and then y range
		if($y0>=$y1){
			$yStart=$y0+$c;
			$yStop=$y1-$c;
			}
		else{
			$yStart=$y1+$c;
			$yStop=$y0-$c;
			}
		
		//LETS RUNNA FORLOOP
		for($x=$xStart;$x<=$xStop;$x++){
			for($y=$yStart;$y>=$yStop;$y--){
				//becaussssse uhhhhh
				$x2=$x;
				$y2=$y;
				
				//OKAY FIND x3,y3
				if($m0=="vLine"){
					//so find the vertical line blah blah, uncertain if y0<or>y1
					$x3=$xintercept0;
					if($y0>$y1){
						if($y2>$y0)
							$y3=$y0;
						elseif($y1>$y2)
							$y3=$y1;
						else
							$y3=$y2;
						}
					elseif($y1>$y0){
						if($y2>$y1)
							$y3=$y1;
						elseif($y0>$y2)
							$y3=$y0;
						else
							$y3=$y2;
						}
					else
						_log("fucked up a vertical line");
					}
				elseif($m0=="hLine"){
					//uuuuh so find the vertical line, $x0 IS< $1
					$y3=$yintercept0;
					if($x2<$x0)
						$x3=$x0;
					elseif($x1<$x2)
						$x3=$x1;
					elseif(($x0<=$x2)&&($x2<=$x1))
						$x3=$x2;
					else
						_log("fucked up a horizontal line");
					}
				elseif(is_numeric($m0)){
					//find temporary b for spare line
					$b1=$y2-($m1*$x2);
					
					/*
					
					uh
					
					$y2=$m1*$x2+$b1;
					$y3=$m1*$x3+$b1;
					$y3=$m0*$x3+$b0;
					
					$m1*$x3+$b1=$m0*$x3+$b0
					$m1*$x3=$m0*$x3+$b0-$b1
					$m1*$x3-$m0*$x3=$b0-$b1
					$m1*$x3-$m0*$x3=$b0-$b1
					$x3($m1-$m0)=$b0-$b1
					$x3=($b0-$b1)/($m1-$m0)
					
					*/
					
					$x3=($b0-$b1)/($m1-$m0);
					
					if(($m1*$x3+$b1)-($m0*$x3+$b0)<=1)
						$y3=$m1*$x3+$b1;
						
					if($x3<$x0){
						$x3=$x0;
						$y3=$y0;
						}
					elseif($x1<$x3){
						$x3=$x1;
						$y3=$y1;
						}
					
					}
				
				if(isset($x3,$y3)){
					if(distance(array($x2,$y2),array($x3,$y3))<=$c)
						$area[]=array($x2,$y2);
					}
				
				
				}
			}
		
		}//EOPATH
			
	return $area;
	}//EOF

function edge($area){
	$edge=array();
	$dir=array(
		array(0,1),
		array(0,-1),
		array(-1,0),
		array(1,0)
		);
	for($a=0;$a<count($area);$a++){
		$c=0;
		for($b=0;$b<4;$b++){
			$cX=$area[$a][0]+$dir[$b][0];
			$cY=$area[$a][1]+$dir[$b][1];
			if(in_array(array($cX,$cY),$area))
				$c++;
			}
		if($c<4)
			$edge[]=array($cX,$cY);
		}
	return $edge;
	}
?>