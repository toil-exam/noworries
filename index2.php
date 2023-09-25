<html>
<head>
<title>Gallery</title>
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

include("art2.php");


for($c=count($art);$c>0;$c--)
{
echo "<div style=\"position:absolute;left:".rand(0,90)."%;top:".rand(-10,200)."%;\"><a href=\"theothergallery.php?f=" . $c . "\"><img src=\"tn/" . $art[$c][0] . "\"/></a></div>\n";
}

?>

<div style="position:absolute;left:44%;top:50%;z-index:50;font-size:200%;"><div style="padding:15px;"><a href="index2.php">reload</a></div><div style="padding:15px;"><a href="theothergallery.php">enter</a></div></div>

<br/><br/>

</tt>
</body>
</html>