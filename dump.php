<?php



$check=array(array(0,0,0),array(-1,0,0),array(0,0),array(0,0,0,0),array(256,0,0));

for($a=0;$a<count($check);$a++){
	if(isColor($check[$a]))
		_log("is color");
	else
		_log("is not color");
	}

_display("wtf mate");
_log("wtf mate");






// visual dump

echo"<html><head><style>";
echo"td{width:30px;height:30px;font-size:15px;text-align:center;}\n";
echo"td.one{background-color:#333333;color:white;}";
echo"td.two{background-color:#eeeeee;color:black;}";
echo"td.three{background-color:black;}";
echo"td.player{background-color:rgb(200,255,150);border:2px solid black;}";


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




echo"</style></head><body><center><table>";

if(isset($_SESSION["player"]["location"])){
	$loc = $_SESSION["player"]["location"];
	$xStart = $loc->x() - 15;
	$xStop = $loc->x() + 15;
	$yStart = $loc->y() + 8;
	$yStop = $loc->y() - 8;

	for($y=$yStart;$y>=$yStop;$y--){
		echo"<tr>";
		for($x=$xStart;$x<=$xStop;$x++){
			if(is_object($_SESSION["world"]->map[$x][$y])){
				if(($x==$_SESSION["player"]["location"]->x())&&($y==$_SESSION["player"]["location"]->y()))
					echo"<td class=\"player\">";
				elseif($_SESSION["world"]->map[$x][$y]->isOccupied()==true)
					echo"<td class=\"".$_SESSION["world"]->map[$x][$y]->isOccupiedBy()."\">";
				else
					echo"<td class=\"two\">";
				}
			else
				echo"<td class=\"three\">";
			
			if(is_object($_SESSION["world"]->map[$x][$y])){
				if($_SESSION["world"]->map[$x][$y]->isOccupied()==true){
					echo substr($_SESSION["world"]->map[$x][$y]->isOccupiedBy(),0,1);
					}
				elseif($y==$loc->y() && $x==$loc->x())
					echo"U";
				
				echo" <!--($x,$y)-->";
			}
			
			echo"</td>";
			}
		echo"</tr>";
		}
	
	}




echo"</table></center>";


//D PAD
echo"<table style=\"position:absolute; left:20%; top: 70%; background-color: white;\">";
echo"<tr><td/><td>";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()][$_SESSION["player"]["location"]->y()+1]->isOccupied())
	_qbf("upArrow","up","^");
echo"</td><td/></tr>";
echo"<tr><td>";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()-1][$_SESSION["player"]["location"]->y()]->isOccupied())
	_qbf("leftArrow","left","<");
echo"</td><td><a href=\"destroy.php\">X</a></td><td>";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()+1][$_SESSION["player"]["location"]->y()]->isOccupied())
	_qbf("rightArrow","right",">");
echo"</td></tr>";
echo"<tr><td/><td>";
if(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()][$_SESSION["player"]["location"]->y()-1]->isOccupied())
	_qbf("downArrow","down","v");
echo"</td><td/></tr>";
echo"</table>";

//run them arrow presses
echo"<script src=\"arrowpress.js\"></script>";








$a=count($_SESSION["world"]->area);
$point = $_SESSION["player"]["location"]->xy();
for($b=0;$b<$a;$b++){
	$area = $_SESSION["world"]->area[$b]->area();
	$name = $_SESSION["world"]->area[$b]->areaName();
	if(in_array($point,$area) && $name!="")
		_display("You are in the town of ".$name);
	}





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
	

echo"</body></html>";







if($GLOBALS["log"]){
	echo"\n <!-- LOG \n\n";
	
	for($a=0;$a<count($GLOBALS["log"]);$a++){
		echo $GLOBALS["log"][$a]."\n";
		}

	echo" \n-->";
}

?>