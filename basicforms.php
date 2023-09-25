<?php
//basic form start, optional id
function _bfs($a=""){
 echo"<form id=\"".$a."\" action=\"index.php\" method=\"post\">\n";
 }
//basic form end
function _bfe(){
 echo"</form>\n";
 }
//basic form input hidden, key, value
function _bfih($a,$b){
 echo"<input type=\"hidden\" name=\"".$a."\" value=\"".$b."\"/>\n";
 }
//basic form input text, key, default text
function _bfit($a,$b=""){
 echo"<input type=\"text\" name=\"".$a."\" value=\"".$b."\"/>\n";
 }
//basic form submit button, display text
function _bfis($a="Submit"){
 echo"<input type=\"submit\" value=\"".$a."\"/>\n";
 }

//quick hidden form, id, key, value
function _qhf($a,$b,$c){
 _bfs($a);
 _bfih($b,$c);
 _bfe();
 }

//quick basic form, key, value, display text
function _qbf($a,$b,$c){
 _bfs($a);
 _bfih($a,$b);
 _bfis($c);
 _bfe();
 }

//quick basic form text, key, default text, default button
function _qbft($a,$b="",$c="Submit"){
 _bfs();
 _bfih("default".$a,$b);
 _bfit($a,$b);
 _bfis($c);
 _bfe();
 }


 
//display - for viewer viewing
function _display($text){
	if(is_array($GLOBALS["display"]))
		$GLOBALS["display"][]=$text;
	else
		$GLOBALS["display"]=array($text);
	}

 
 
//LOG - for back end intel 
function _log($text){
	if(is_array($GLOBALS["log"]) && is_string($text))
		$GLOBALS["log"][]=$text;
	elseif(is_string($text))
		$GLOBALS["log"]=array($text);
	}
	


//style
function _style($key,$value=""){
	if($value==""){
		$c0=rand(0,255);
		$c1=rand(0,255);
		$c2=rand(0,255);
		$value=array($c0,$c1,$c2);
		}
	if((!isset($_SESSION["style"][$key]))&&(is_array($value)))
		$c0=$value[0];
		$c1=$value[1];
		$c2=$value[2];
		$_SESSION["style"][$key]=array($c0,$c1,$c2);
	}
	

//one of many 
function oneOf($thing){
	if(is_array($thing)){
		$total = count($thing)-1;
		$number = rand(0,$total);
		$choice = $thing[$number];
		return $choice;
		}
	else
		_log("thing not array");
	}

//uh color?
function color($a,$b,$c){
	$test=true;
	$color=array($a,$b,$c);
	for($d=0;$d<3;$d++){
		if(is_numeric($color[$d])){
			if($color[$d]>255)
				$color[$d]=255;
			if($color[$d]<0)
				$color[$d]=0;
			}
		else
			$test=false;
		}
	if($test==true)
		return $color;
	else
		_log("failure to colorize");
	}
	
//qualifies as color
function isColor($color){
	$test=true;
	$check=array(is_array($color),count($color)==3);
	for($a=0;$a<3;$a++){
		$check[]=is_numeric($color[$a]);
		$check[]=$color[$a]>=0;
		$check[]=$color[$a]<=255;
		}
	if(in_array(false,$check))
		$test=false;
	return $test;
	}

	
//uh point
function point($x,$y,$z=""){
	$point=array($x,$y);
	if(is_numeric($z))
		$point[2]=$z;
	return $point;
	}
	
//qualifies as a coordinate or w/e
function isPoint($point){
	$test=0;
	if(is_array($point))
		$test++;
	if((count($point)==2)&&(is_numeric($point[0]))&&(is_numeric($point[1])))
		$test++;
	elseif((count($point)==3)&&(is_numeric($point[0]))&&(is_numeric($point[1]))&&(is_numeric($point[2])))
		$test++;
	if($test==2)
		return true;
	else
		return false;
	}

//distance between two points
function distance($pointA,$pointB){
	if(isPoint($pointA)&&isPoint($pointB)){
		$x0=$pointA[0];
		$y0=$pointA[1];
		$x1=$pointB[0];
		$y1=$pointB[1];
		$distance = sqrt( pow(($x0-$x1),2) + pow(($y0-$y1),2) );
		return $distance;
		}
	else
		_log("failure to calculate distance");
	}

//area check
function isArea($area){
	$test=0;
	if($is_array($area))
		$test++;
	$pTest=0;
	for($a=0;$a<count($area);$a++){
		if(isPoint($area[$a]))
			$pTest++;
		}
	if($pTest==(count($area)-1))
		$test++;
	if($test==2)
		return true;
	else
		return false;
	}

//point in area check
function inArea($point,$area){
		if(isPoint($point) && isArea($area) && in_array($point,$area))
			return true;
		else
			return false;
		}
?>