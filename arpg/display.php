<?php
//display





echo"<html>\n<head>\n<title>\n";
//TITLE??
echo"</title>\n<style>\n";
echo"body,table,tr,td,div,input{font-size:".$_SESSION["settings"]["font"]."px;}\n";
echo"td{text-align:center;}\n";
echo"hr{border:1px solid black;}\n";
echo"</style>\n</head>\n<body>\n<center>\n";
echo"<table style=\"position:relative;z-index:0;\">\n";

$urx=$_SESSION["user"]["location"]["x"];
$ury=$_SESSION["user"]["location"]["y"];
$x_start=$urx-round($_SESSION["settings"]["width"]/2)+1;
$x_stop=$x_start+$_SESSION["settings"]["width"]-1;
$y_start=$ury-round($_SESSION["settings"]["height"]/2)+1;
$y_stop=$y_start+$_SESSION["settings"]["height"]-1;



for($y=$y_start;$y<=$y_stop;$y++){
	echo"<tr>\n";
	for($x=$x_start;$x<=$x_stop;$x++){
		$temp=($_SESSION["settings"]["tablesize"]*10);
		echo"<td style=\"position:relative;width:".$temp.";height:".$temp."px;border:1px solid black;text-align:center;\">\n";
		$xytype=$_SESSION["world"][$_SESSION["user"]["location"]["z"]][$x][$y]["type"];
		if($x==$_SESSION["user"]["location"]["x"] && $y==$_SESSION["user"]["location"]["y"])
			echo"HEY UR HERE";
		elseif($xytype=="wall")
			echo "WALL ";
		elseif($x==$_SESSION["user"]["location"]["x"] && $y==($_SESSION["user"]["location"]["y"]-1))
			_qbf("move","up","^");
		elseif($x==$_SESSION["user"]["location"]["x"] && $y==($_SESSION["user"]["location"]["y"]+1))
			_qbf("move","down","v");
		elseif(($x==$_SESSION["user"]["location"]["x"]-1) && $y==$_SESSION["user"]["location"]["y"])
			_qbf("move","left","<");
		elseif(($x==$_SESSION["user"]["location"]["x"]+1) && $y==$_SESSION["user"]["location"]["y"])
			_qbf("move","right",">");
		elseif($xytype!="empty")
			echo $xytype;
		
		if($_SESSION["world"][$_SESSION["user"]["location"]["z"]][$x][$y]["type"])
			echo"\n<!--(".$x.",".$y.")-->";
		echo"</td>\n";
		}
	echo"</tr>\n";
	}
echo"</table>\n";


if($GLOBALS["divtext"]!=""){
	echo"<div style=\"position:absolute;width:50%;left:15%;top:10%;border:1px solid black;background-color:white;\"><div style=\"padding:10px;\">\n";
	echo$GLOBALS["divtext"];
	echo"</div></div>\n</body></html>\n";
	}

?>