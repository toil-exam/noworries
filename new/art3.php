<?php
//art3

function _tn($x,$link=false){
	//if (is_file("tn/".$x.".jpg")){
		if($link=true){
			echo "<a href=\"theothergallery.php?f=".$x."\"><img src=\"tn/".$x.".jpg\" /></a>";
			}
		else{
			echo "<img src=\"tn/".$x.".jpg\" />";
			}
		//}
	}

function _img($x,$link=false){
	if (is_file("img/".$x.".jpg")){
		if($link=true){
			echo "<a href=\"theothergallery.php?f=".$x."\"><img src=\"img/".$x.".jpg\" /></a>";
			}
		else{
			echo "<img src=\"img/".$x.".jpg\" />";
			}
		}
	}

function _color(){
	$r=rand(0,2);
	if(($_SESSION["a"]=="")||($r==0))
	$_SESSION["a"]=rand(0,255);
	if(($_SESSION["b"]=="")||($r==1))
	$_SESSION["b"]=rand(0,255);
	if(($_SESSION["c"]=="")||($r==2))
	$_SESSION["c"]=rand(0,255);
	}

?>