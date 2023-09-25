<?php

// visual dump

echo"<html><head><style>";
echo"td{width:30px;height:30px;font-size:15px;text-align:center;}\n";
echo"td.one{background-color:#333333;color:white;}\n";
echo"td.two{background-color:#eeeeee;color:black;}\n";
echo"td.three{background-color:black;}\n";
echo"td.player{background-color:rgb(200,255,150);border:2px solid black;}\n";

//run style on em
foreach($_SESSION["style"] as $key=>$value){
	$id=$key;
	$c1=$_SESSION["style"][$key][0];
	$c2=$_SESSION["style"][$key][1];
	$c3=$_SESSION["style"][$key][2];
	if((($c1+$c2+$c3)/3)>150)
		$text="black";
	else
		$text="white";
	echo"td.$id{background-color:rgb($c1,$c2,$c3);color:$text;}\n";
	}

echo"</style></head><body><center><table>\n";

if(isset($_SESSION["player"]["location"])){
	$loc = $_SESSION["player"]["location"];
	$xStart = $loc->x() - 15;
	$xStop = $loc->x() + 15;
	$yStart = $loc->y() + 8;
	$yStop = $loc->y() - 8;

	for($y=$yStart;$y>=$yStop;$y--){
		echo"<tr>\n";
		for($x=$xStart;$x<=$xStop;$x++){
			if(is_object($_SESSION["world"]->map[$x][$y])){
				if(($x==$_SESSION["player"]["location"]->x())&&($y==$_SESSION["player"]["location"]->y()))
					echo"<td class=\"player\">";
				elseif($_SESSION["world"]->map[$x][$y]->isOccupied()==true)
					echo"<td class=\"".simplify($_SESSION["world"]->map[$x][$y]->isOccupiedBy())."\">";
				else
					echo"<td class=\"two\">";
				}
			else
				echo"<td class=\"three\">";
			
			if(is_object($_SESSION["world"]->map[$x][$y])){
				if($_SESSION["world"]->map[$x][$y]->isOccupied()==true){
					echo substr($_SESSION["world"]->map[$x][$y]->isOccupiedBy(),0,4);
					}
				elseif($y==$loc->y() && $x==$loc->x())
					echo"U";
				
				echo" <!--($x,$y)-->";
			}
			echo"</td>\n";
			}
		echo"</tr>\n";
		}
	}

echo"</table></center>\n";

//D PAD
echo"<table style=\"position:absolute; left:20%; top: 70%; background-color: white;\">\n";
echo"<tr><td/><td>\n";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()][$_SESSION["player"]["location"]->y()+1]->isOccupied())
	_qbf("upArrow","up","^");
echo"</td><td/></tr>\n";
echo"<tr><td>\n";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()-1][$_SESSION["player"]["location"]->y()]->isOccupied())
	_qbf("leftArrow","left","<");
echo"</td><td><a href=\"destroy.php\">X</a></td><td>\n";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()+1][$_SESSION["player"]["location"]->y()]->isOccupied())
	_qbf("rightArrow","right",">");
echo"</td></tr>\n";
echo"<tr><td/><td>\n";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()][$_SESSION["player"]["location"]->y()-1]->isOccupied())
	_qbf("downArrow","down","v");
echo"</td><td/></tr>\n";
echo"</table>\n";

//run them arrow presses
echo"<script src=\"arrowpress.js\"></script>\n";







//uhh figure out which town youse in
$a=count($_SESSION["world"]->area);
$point = $_SESSION["player"]["location"]->xy();
for($b=0;$b<$a;$b++){
	$area = $_SESSION["world"]->area[$b]->area();
	$name = $_SESSION["world"]->area[$b]->areaName();
	if($name)
		_log($name);
	if(in_array($point,$area) && $name!="")
		_display("You are in the town of ".$name);
	}




//uh display text
if($GLOBALS["display"]){
	echo"<div style=\"position:absolute; left:60%; top: 60%; width: 30%; padding: 2%; background-color: white;\">\n";
	if(count($GLOBALS["display"])>5)
		$b=5;
	else
		$b=count($GLOBALS["display"]);
	
	for($a=0;$a<$b;$a++){
		echo "<p>".$GLOBALS["display"][$a]."</p>\n";
		}
	echo"</div>\n";
	}
	

	
//uh close html
echo"</body></html>\n";


//LOG
if($GLOBALS["log"]){
	echo"\n <!-- LOG \n\n";
	
	echo $_SESSION["world"]->recipe[0]->DUMP();
	
	for($a=0;$a<count($GLOBALS["log"]);$a++){
		echo $a.":: ".$GLOBALS["log"][$a]."\n";
		}

	echo" \n-->";
}

?>