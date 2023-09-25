<?php
//player movement

$test=array(
	array("up",0,1),
	array("down",0,-1),
	array("left",-1,0),
	array("right",1,0)
	);

for($a=0;$a<4;$a++){
	$dir=$test[$a][0];
	$dX=$test[$a][1];
	$dY=$test[$a][2];
	
	if(($_POST[$dir."Arrow"]==$dir)&&(!$_SESSION["world"]->map[$_SESSION["player"]["location"]->x()+$dX][$_SESSION["player"]["location"]->y()+$dY]->isOccupied())){
		$newX=$_SESSION["player"]["location"]->x()+$dX;
		$newY=$_SESSION["player"]["location"]->y()+$dY;
		$_SESSION["player"]["location"]->reposition($newX,$newY);
		$a=4;
		}
	}

?>