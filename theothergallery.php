<?php
//theothergallery.php

session_start();

include("art.php");
include("color.php");

_setColor();

echo"<html>\n<head>\n<title>Max E Art - Gallery\n";

if(($_GET["f"]!="")&&(is_numeric($_GET["f"])))
	echo" - #".$_GET["f"];
elseif(($_GET["tag"]!="")&&(in_array($_GET["tag"],$GLOBALS["tags"])))
	echo" - ".$_GET["tag"];

echo"</title>\n<style>\n";
echo"body{background-color:"._getColor().";font-size:120%;}\n";
echo "h1, a:link, a:visited, a:hover, a:active {color: "._getColor(0)."; }\n";
echo"a:hover {color: "._getColor(4).";}\n";
echo"img{padding:10px;border:5px solid "._getColor(1).";background-color:white;}\n";
echo"img:hover{padding10px;border:5px solid "._getColor(4).";}\n";
echo"div{padding:10px;border:5px solid "._getColor(0).";background-color:white; position:relative; width:66%;}\n";
echo"</style>\n";
echo"</head>\n";
echo"<body>\n";
echo"<center>\n";
echo"<tt>\n";

if(is_numeric($_GET["f"])){
	_detail($_GET["f"]);
	}
elseif(is_string($_GET["tag"])){
	_title("Tagged \"".$_GET["tag"]."\"");
	echo"<div>\n";
	echo"<br/>\n";
	for($a=count($art);$a>0;$a--){
		if(in_array($_GET["tag"],$GLOBALS["art"][$a]["tags"]))
			_tn($a,true);
		}
	echo"<br/>\n";
	echo"</div>\n";
	echo"<br/>\n";
	}
elseif($_GET["view"]=="all"){
	for($a=count($art);$a>0;$a--){
		_detail($a);
		}
	}
elseif($_GET["view"]=="portfolio"){
	_title("Portfolio");
	for($a=count($art);$a>0;$a--){
		if($GLOBALS["art"][$a]["portfolio"]==true)
		_detail($a);
		}
	}
elseif($_GET["view"]=="commissiondetails"){
	_title("Commissions");
	echo "<div>";
	echo "<p style=\"padding:50px\">\n";
	echo "<b>- Paintings -</b>\n";
	echo "<br/>\n";
	echo "<br/>My standard rate is 50 cents a square inch.\n";
	echo "<br/>There are some standard sizes of canvas but I can find an appropriate size to fit any budget.\n";
	echo "<br/>\n";
	echo "<br/>Some standard canvas sizes:\n";
	echo "<br/>(not an exhaustive list)\n";
	echo "<br/>\n";
	echo "<br/>16 x 20 - $160\n";
	echo "<br/>20 x 20 - $200\n";
	echo "<br/>18 x 24 - $212\n";
	echo "<br/>24 x 30 - $360\n";
	echo "<br/>24 x 36 - $432\n";
	echo "<br/>\n";
	echo "<br/>$50 upcharge for familial faces, specific locations, or anything else requiring reference photos from patron\n";
	echo "<br/>$20 upcharge for celebrity faces, well known locations, anything publicly known\n";
	echo "<br/>Pet portriats - upcharge based on complexity of pet's markings etc\n";
	echo "<br/>\n";
	echo "<br/><b>- Drawings / Sketches -</b>\n";
	echo "<br/>Black and White - $25\n";
	echo "<br/>Full Color - $50\n";
	echo "<br/>\n";
	echo "<br/><b>- Quotes available upon request -</b>\n";
	echo "<br/>T-Shirts\n";
	echo "<br/>Murals\n";
	echo "<br/>Tattoos\n";
	echo "<br/>Graphic Design\n";
	echo "<br/>\n";
	echo "<br/>Most of my commission work has been pet portraits or familial portraits but I am happy to bring any idea to life! Please have a budget in mind when contacting me to set up a commission. I require half up front as a non-refundable deposit to cover costs of production and the second half after completion to cover labor. Contact me at <a href=\"mailto:maxt.elliott@gmail.com\">maxt.elliott@gmail.com</a> if you have any questions. Thanks!\n";
	echo "</p></div>";
	echo "<br/>\n";
	}
else{
	_title("Max E Art");
	echo "<div>";
	echo "<p style=\"padding:50px\">Hi! My name is Max and I'm an artist based out of Cary, NC. I've been painting for fourteen years and it's the most fulfilling thing I've ever done. I like to keep my site pretty minimalist but I hope you enjoy my work! If you have any questions or if you'd like to set up a commission please contact me at <a href=\"mailto:maxt.elliott@gmail.com\">maxt.elliott@gmail.com</a>. Thanks!\n";
	echo "</p></div>";
	echo "<br/>\n";
	}

_header();

echo"<div class=\"main\">\n";

for($a=count($art);$a>0;$a--){
	_tn($a,true);
	}

echo"</div>\n";
echo"</tt>\n";
echo"</center>\n";
echo"</body>\n";
echo"</html>\n";

?>