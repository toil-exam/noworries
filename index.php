<html>
<head>
<title>Max E Art - Home</title>
<style>
a {color: white; }
<?php
$back = rand(1,93);
echo "div {background: black; text-align: center; padding: 5px; border: 3px solid #ffffff; }\n";
echo "span {font-size: 200%; }\n";
echo "img {padding: 3px; border: 3px solid #ffffff; }\n";
echo "body {background: url(bg" . $back . ".jpg); color: white; }\n";
echo "a {text-decoration:none;}\n";
?>
</style>
</head>
<body>
<tt>

<?php
/*
include("art2.php");
$inde="x";
include("logit.php");

for($c=1;$c<=count($art);$c++)
{
echo "<div style=\"position:absolute;left:".rand(0,90)."%;top:".rand(-10,200)."%;\"><a href=\"theothergallery.php?f=" . $c . "\"><img src=\"tn/" . $art[$c][0] . "\"/></a></div>\n";
}
*/
include("art.php");
$a=array();
while(count($a)<25){
	$b=rand(1,count($art));
	if(!in_array($b,$a))
		$a[]=$b;
	}
for($c=0;$c<count($a);$c++){
	echo"<div style=\"position:absolute;left:".rand(0,90)."%;top:".rand(0,75)."%;\"><a href=\"theothergallery.php?f=".$a[$c]."\"><img src=\"new/tn/".$a[$c].".jpg\"/></a></div>\n";
	}
?>

<div style="position:absolute;left:30%;top:15%;z-index:51;font-size:300%;"><div style="padding:15px;">Max E<br/>Art</div></div>
<div style="position:absolute;left:25%;top:45%;z-index:50;font-size:200%;"><div style="padding:15px;"><a href="espionage/alpha.html">Play<br/>Espionage</a></div></div>
<div style="position:absolute;left:45%;top:65%;z-index:50;font-size:200%;"><div style="padding:15px;"><a href="note3/index.php">Play<br/>Zompox</a></div></div>
<div style="position:absolute;left:55%;top:25%;z-index:50;font-size:200%;"><div style="padding:15px;"><a href="theothergallery.php">Enter<br/>Gallery</a></div></div>

<br/><br/>

</tt>
</body>
</html>