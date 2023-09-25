<?php
//WORLD BUILD
// include("list.php");
//clear shit
//NOT USEFUL YET???
//deprecate TEST first
unset($_SESSION["world"],$_SESSION["player"]);

$_SESSION["world"] = new World;

$_SESSION["player"]["location"] = new Point(0,0);

$_SESSION["world"]->buildArea(0,"circle",0,0,4);
$_SESSION["world"]->area[0]->setName(4);

$edge=edge(area("circle",0,0,12));

$a=count($edge)-1;

$b=rand(3,8);

for($b2=$b;$b2>=0;$b2--){
	$c[]=rand(0,$a);
	}

/*
$b=round($a/3);
$c[0]=rand(0,$a);
$c[1]=$c[0]+$b;
if($c[1]>$a)
	$c[1]-=$a;
$c[2]=$c[1]+$b;
if($c[2]>$a)
	$c[2]-=$a;
*/
	
	
for($d=0;$d<count($c);$d++){
	$x=$edge[$c[$d]][0];
	$y=$edge[$c[$d]][1];
	$_SESSION["world"]->buildArea(0,"circle",$x,$y,4);
	$aNum=count($_SESSION["world"]->area)-1;
	$_SESSION["world"]->area[$aNum]->setName();
	$_SESSION["world"]->buildArea(0,"path",$x,$y,0,0,2);
	
	}



?>