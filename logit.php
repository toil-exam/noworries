<?php
/*





include("thelog.php");

if(($_POST["userid"]!="")&&($_POST["commenttext"]!=""))
$c=1;
else
$c=0;

if(is_numeric($_GET["f"]))
 $num=$_GET["f"];
elseif(($_GET["all"]=="sale")||($_GET["all"]=="sold"))
 $num=$_GET["all"];
elseif($_GET["all"]=="yes")
 $num="all";
elseif($_GET["all"]=="buy")
 $num="buy";
elseif($_GET["all"]=="port")
 $num="portfolio";
elseif($inde=="x")
 $num="home";
elseif($gall=="ery")
 $num="gallery";
elseif($num=="")
 {
 for($e=1;$e<=count($art);$e++)
  {
  if($_GET["f"]==$art[$e][0])
   $num=$e;
  }
 }


if($num=="")
 $num="TOSS";

$logit[count($logit)]=array($_SERVER["REMOTE_ADDR"],array(date("Y"),date("m"),date("d"),date("H"),date("i"),date("s"),date("w")),$num,$c);

$filepage=fopen("thelog.php","w");
fwrite($filepage,"<?php\n\$logit=array();\n");
for($a=(count($logit)-1);$a>=0;$a--)
 {
 fwrite($filepage,"\$logit[".$a."]=array(\"".$logit[$a][0]."\",array(\"".$logit[$a][1][0]."\",\"".$logit[$a][1][1]."\",\"".$logit[$a][1][2]."\",\"".$logit[$a][1][3]."\",\"".$logit[$a][1][4]."\",\"".$logit[$a][1][5]."\",\"".$logit[$a][1][6]."\"),\"".$logit[$a][2]."\",\"".$logit[$a][3]."\");\n");
 }
fwrite($filepage,"?>");
fclose($filepage);

*/
?>