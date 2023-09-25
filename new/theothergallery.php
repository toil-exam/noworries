<?php
//theothergallery.php

//w/e1

/*
session_start();

if(($_GET=="")&&($_POST==""))
 $gall="ery";

include("art3.php");

_color();

echo "<html>\n";
echo "<head>\n";
echo "<title>Gallery";
if($_GET["f"]!="")
 {
 if(is_numeric($_GET["f"]))
  echo" - #".$_GET["f"];
 else
  echo" - ".$_GET["f"];
 }
echo" </title>\n";
echo "<style>\n";
echo "body {background: rgb(" . $_SESSION["a"] . "," . $_SESSION["b"] . "," . $_SESSION["c"] . "); }\n";
echo "a:link, a:visited, a:hover, a:active {color: black; }\n";
echo "p, ul, div {position: relative; width: 60%; left: 20%; text-align: center; border: 3px solid black; padding: 3px; background: white; }\n";
echo "#p2 {position: relative; width: 60%; left: 20%; text-align: center; border: 3px solid black; padding: 3px; background: white; font-size:500%}\n";
echo "h1, h2, h3, h4, h5, h6 {text-align: center; }\n";
echo "hr {border: 1px solid black; position: relative; width: 30%; padding: 1px; }\n";
echo "img {padding: 3px; border: 3px solid black; }\n";
echo "span {font-size: 200%; }\n";
echo "</style>\n";
echo "</head>\n";
echo "<body>\n";
echo "<tt>\n";

if($_GET["f"]=="")
{
echo "<br/><p><br/>";
echo "<span>- <a href=\"theothergallery.php\">GALLERY</a> -</span>\n";
echo "<br/>\n";
echo "<br/>- Hi! My name is Max and I'm a young artist based out of Cary, NC. -\n";
echo "<br/>- I've been painting for six years and it's the most fulfilling thing I've ever done. -\n";
echo "<br/>- I love to paint I hope you love my work! -\n";
echo "<br/>\n";
echo "<br/>- <a href=\"index.php\">Home</a> - <a href=\"theothergallery.php?all=sale\">For Sale</a> - <a href=\"theothergallery.php?all=sold\">Sold</a> - <a href=\"theothergallery.php?all=port\">Portfolio</a> - <a href=\"theothergallery.php?all=yes\">View All</a> - <a href=\"theothergallery.php?all=buy\">Buy Now!</a> - <a href=\"https://squareup.com/market/max-e-art\">Square Market</a> -\n";
echo "<br/>\n";
echo "<br/>- I use <a href=\"https://squareup.com/market/max-e-art\">Square</a> for online, out-of-town and credit card purchases -\n";
echo "<br/>- checks and money orders can be sent by mail -\n";
echo "<br/>- and cash is wonderful for in-person sales -\n";
echo "<br/>- Please contact me if you'd like to set up a sale or contract a commission -\n";
echo "<br/>\n";
echo "<br/>- <a href=\"mailto:ihatechoosingausername@gmail.com\">ihatechoosingausername@gmail.com</a> -\n";
echo "<br/><br/></p>";
echo "<br/>\n";
}

if($_GET["f"] != "")
{
if(is_numeric($_GET["f"]))
 {
 echo "<br/><div id=\"p2\">#" . $_GET["f"] . "</div><br/>\n";
 echo "<p><br/>- <a href=\"index.php\">Home</a> - <a href=\"theothergallery.php?all=sale\">For Sale</a> - <a href=\"theothergallery.php?all=sold\">Sold</a> - <a href=\"theothergallery.php?all=port\">Portfolio</a> - <a href=\"theothergallery.php?all=yes\">View All</a> - <a href=\"theothergallery.php?all=buy\">Buy Now!</a> - <a href=\"https://squareup.com/market/max-e-art\">Square Market</a> -<br/><br/></p><br/>\n";
 echo "<div><br/><br/>";
 echo"<img src=\"" . $art[$_GET["f"]][0] . "\"/><br/><br/>\n";
 if($art[$_GET["f"]][1] == "0")
	  {
	  echo "<span style=\"color: red; \">- sold / unavailable -</span><br/>\n";
	  }
	else
	  echo "<span>- \$" . $art[$_GET["f"]][1] . " -</span><br/>\n";
	echo "<span>" . $art[$_GET["f"]][2] . "</span><br/><br/>\n";
	
 }
else
 {
 echo "<div><br/><img src=\"" . $_GET["f"] . "\"/><br/><br/>\n";
 for($i=1;$i<=count($art);$i++)
  {
  if($art[$i][0] == $_GET["f"])
    {
	echo "<span>- #" . $i . " -</span><br/>\n";
	if($art[$i][1] == "0")
	  {
	  echo "<span style=\"color: red; \">- sold / unavailable -</span><br/>\n";
	  }
	else
	  echo "<span>- \$" . $art[$i][1] . " -</span><br/>\n";
	echo "<span>" . $art[$i][2] . "</span><br/><br/>\n";
	}
  }
 }
echo "</div>\n";

}

if($_GET["all"] == "yes")
  {
  echo "<p><br/><span>- ALL -</span><br/><br/></p><br/>\n";
  for($j=count($art);$j>=1;$j--)
    {
	echo "<p><br/><a href=\"theothergallery.php?f=" . $j . "\"><img src=\"" . $art[$j][0] . "\"/></a><br/><br/>\n";
	echo "<span>- #" . $j . " -</span><br/>\n";
	if($art[$j][1] == "0")
	  {
	  echo "<span style=\"color: red; \">- sold / unavailable -</span><br/>\n";
	  }
	else
	  echo "<span>- \$" . $art[$j][1] . " -</span><br/>\n";
	echo "<span>" . $art[$j][2] . "</span><br/><br/>\n";
	echo "</p><br/><br/>\n";
	}
  }

if($_GET["all"] == "buy")
  {
  echo "<p><br/><span>- Buy Now! -</span><br/><br/></p><br/>\n";
  include("sq.php");
  
  }

if($_GET["all"] == "sale")
  {
  echo "<p><br/><span>- FOR SALE -</span><br/><br/></p><br/>\n";
  
  
  
  for($j=count($art);$j>=1;$j--)
    {
	if($art[$j][1]!="0")
	{
	echo "<p><br/><a href=\"theothergallery.php?f=" . $j . "\"><img src=\"" . $art[$j][0] . "\"/></a><br/><br/>\n";
	echo "<span>- #" . $j . " -</span><br/>\n";
	echo "<span>- \$" . $art[$j][1] . " -</span><br/>\n";
	echo "<span>" . $art[$j][2] . "</span><br/><br/>\n";
	echo "</p><br/><br/>\n";
	}
	}
  }

if($_GET["all"] == "sold")
  {
  echo "<p><br/><span style=\"color: red\">- SOLD/UNAVAILABLE -</span><br/><br/></p><br/>\n";
  for($j=count($art);$j>=1;$j--)
    {
	if($art[$j][1]=="0")
	{
	echo "<p><br/><a href=\"theothergallery.php?f=" . $j . "\"><img src=\"" . $art[$j][0] . "\"/></a><br/><br/>\n";
	echo "<span>- #" . $j . " -</span><br/>\n";
	echo "<span style=\"color: red; \">- sold/unavailable -</span><br/>\n";
	echo "<span>" . $art[$j][2] . "</span><br/><br/>\n";
	echo "</p><br/><br/>\n";
	}
	}
  }

if($_GET["all"] == "port")
  {
  echo "<p><br/><span>- ARTIST PORTFOLIO -</span><br/><br/></p><br/>\n";
  for($j=0;$j<count($port);$j++)
    {
	echo "<p><br/><a href=\"theothergallery.php?f=" . $port[$j] . "\"><img src=\"" . $art[$port[$j]][0] . "\"/></a><br/><br/>\n";
	echo "<span>- #" . $port[$j] . " -</span><br/>\n";
	if($art[$port[$j]][1] == "0")
	  {
	  echo "<span style=\"color: red; \">- sold / unavailable -</span><br/>\n";
	  }
	else
	  echo "<span>- \$" . $art[$port[$j]][1] . " -</span><br/>\n";
	echo "<span>" . $art[$port[$j]][2] . "</span><br/><br/>\n";
	echo "</p><br/><br/>\n";
	}
  }

echo "<br/>";
echo "<p>\n";
echo "<br/><br/><span>- AVAILABLE / FOR SALE -</span><br/><br/>\n";

for($p=count($art);$p>0;$p--)
 {
 if($art[$p][1]!="0")
 echo "<a href=\"theothergallery.php?f=" . $p . "\"><img src=\"tn/" . $art[$p][0] . "\"/></a>\n";
 }

echo "<br/><br/></p><br/><br/><p>\n";
echo "<br/><br/><span>- SOLD / UNAVAILABLE -</span><br/><br/>\n";

for($p=count($art);$p>0;$p--)
 {
 if($art[$p][1]=="0")
 echo "<a href=\"theothergallery.php?f=" . $p . "\"><img src=\"tn/" . $art[$p][0] . "\"/></a>\n";
 }

echo "<br/><br/></p>\n";
echo "\n";
echo "<br/>\n";
echo "</body>\n";
echo "</html>\n";

*/












//w/e2


session_start();

include("art.php");
include("color.php");

_setColor();

echo"<!--\n";
print_r($GLOBALS["color"]);
echo"\n-->\n";


echo"<html>\n";
echo"<head>\n";
echo"<style>\n";
echo"body{background-color:"._getColor().";font-size:150%;}\n";
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
else{
	_title("Max E Art");
	echo "<div>";
	echo "<br/>- Hi! My name is Max and I'm an artist based out of Cary, NC. -\n";
	echo "<br/>- I've been painting for nine years and it's the most fulfilling thing I've ever done. -\n";
	echo "<br/>- Thanks for visiting and I hope you enjoy my work! -\n";
	echo "<br/>- Please contact me if you'd like to set up a sale or contract a commission -\n";
	echo "<br/>- <a href=\"mailto:ihatechoosingausername@gmail.com\">ihatechoosingausername@gmail.com</a> -\n";
	echo "<br/><br/></div>";
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

echo"<!--\n";
print_r($GLOBALS["tags"]);
echo"\n\n";
print_r($GLOBALS["art"]);
echo"\n-->";

?>