<?php
//WORLD BUILD
//deprecate TEST 
unset($_SESSION["world"],$_SESSION["player"]);

$_SESSION["world"] = new World;

$_SESSION["player"]["location"] = new Point(0,0);

$_SESSION["world"]->buildArea(0,"circle",point(0,0),4);
//$_SESSION["world"]->area[0]->setName();


$_SESSION["world"]->buildRandomArea(0,"circle",4);

/*
$edge=edge(area("circle",point(0,0),15));

$final=array(oneOf($edge));

while(true){
	$check=array();
	for($a=0;$a<count($edge);$a++){
		$test=0;
		for($b=0;$b<count($final);$b++){
			if(distance($edge[$a],$final[$b])>15)
				$test++;
			}
		if($test==count($final))
			$check[]=$edge[$a];
		}
	if(count($check)==0)
		break;
	$final[]=oneOf($check);
	}


	
for($d=0;$d<count($final);$d++){
	$x=x($final[$d]);
	$y=y($final[$d]);
	$_SESSION["world"]->buildArea(0,"circle",point($x,$y),4);
	$aNum=count($_SESSION["world"]->area)-1;
	//$_SESSION["world"]->area[$aNum]->setName();
	$_SESSION["world"]->buildArea(0,"path",point($x,$y),point(0,0),3);
	
	}

*/

?>