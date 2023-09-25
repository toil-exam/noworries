<?php
//color

function _setColor(){
	$a=rand(0,2);
	if(($_SESSION["color"][0]=="")||($a==0))
		$_SESSION["color"][0]=rand(0,255);
	if(($_SESSION["color"][1]=="")||($a==1))
		$_SESSION["color"][1]=rand(0,255);
	if(($_SESSION["color"][2]=="")||($a==2))
		$_SESSION["color"][2]=rand(0,255);
	
	for($a=0;$a<5;$a++){
		for($b=0;$b<3;$b++){
			$temp=$_SESSION["color"][$b]+(($a-2)*50);
			if($temp>255)
				$temp=255;
			if($temp<0)
				$temp=0;
			$GLOBALS["color"][$a][$b]=$temp;
			}
		}
	}

function _getColor($x=2){
	$a="rgb(".$GLOBALS["color"][$x][0].",".$GLOBALS["color"][$x][1].",".$GLOBALS["color"][$x][2].")";
	return $a;
	}

function _tn($x,$link=false){
	if (is_file("new/tn/".$x.".jpg"))
		echo "<a href=\"theothergallery.php?f=".$x."\"><img src=\"new/tn/".$x.".jpg\" /></a> ";
	}

function _img($x,$link=false){
	if (is_file("new/img/".$x.".jpg")){
		if($link=true){
			echo "<a href=\"theothergallery.php?f=".$x."\"><img src=\"new/img/".$x.".jpg\" /></a> ";
			}
		else{
			echo "<img src=\"new/img/".$x.".jpg\" /> ";
			}
		}
	}

function _detail($x){
	$a="<div>\n";
	$a.="<h1>Painting #".$x."</h1>\n";
	$a.="<img src=\"new/img/".$x.".jpg\" /><br/>\n";
	$a.="<p>\n";
	$a.="Media: ".$GLOBALS["art"][$x]["media"]."<br/>\n";
	$a.="Width: ".$GLOBALS["art"][$x]["width"]."<br/>\n";
	$a.="Height: ".$GLOBALS["art"][$x]["height"]."<br/>\n";
	$a.="Tags: (";
	for($b=0;$b<count($GLOBALS["art"][$x]["tags"]);$b++){
		$a.="<a href=\"theothergallery.php?tag=".$GLOBALS["art"][$x]["tags"][$b]."\">".$GLOBALS["art"][$x]["tags"][$b]."</a>";
		if($b!=(count($GLOBALS["art"][$x]["tags"])-1)){
			$a.=", ";
			}
		}
	$a.=")<br/>\n";
	/*
	if($GLOBALS["art"][$x]["portfolio"]==true)
		$a.="<a href=\"theothergallery.php?f=portfolio\">Portfolio</a><br/>\n";
	*/
	$a.="</p></div><br/>\n";
	echo $a;
	}

function _title($a){
	echo"<div><h1>- ".$a." -</h1></div><br/>\n";
	}

function _header(){
	echo"<div>\n";
	echo"- <a href=\"index.php\">Home</a> - <a href=\"theothergallery.php\">Gallery</a> - <a href=\"theothergallery.php?view=all\">View All</a> - <a href=\"https://max-e-art.square.site/\">For Sale</a> - <a href=\"theothergallery.php?view=portfolio\">Portfolio</a> - <a href=\"theothergallery.php?view=commissiondetails\">Commissions</a> - \n";
	echo"</div>\n";
	echo"<br/>\n";
	}
?>