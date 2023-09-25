<?php
//funkblock
//bootup
function _start(){
 if($_SESSION["game"]==""){
  $_SESSION["score"]=0;
  $_SESSION["game"]=array(array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0));
  $a=rand(0,3);
  $b=rand(0,3);
  $c=rand(0,3);
  if($c==0)
   $_SESSION["game"][$a][$b]=4;
  else
   $_SESSION["game"][$a][$b]=2;
 }
}
//single line condense
function _condense($a,$b,$c,$d){
 $in=array();
 if($a!=0)
  $in[]=$a;
 if($b!=0)
  $in[]=$b;
 if($c!=0)
  $in[]=$c;
 if($d!=0)
  $in[]=$d;
 $out=array();
 for($e=0;$e<4;$e++){
  if($in[$e]==$in[($e+1)]){
   $out[]=($in[$e])*2;
   $_SESSION["score"]+=($in[$e])*2;
   $e+=1;
  }
  else
   $out[]=$in[$e];
 }
 if(count($out)<4){
  for($e=count($out);$e<4;$e++){
   $out[]=0;
  }
 }
 return $out;
}
//four line condense
function _move($dir){
 //setup incoming and outgoing info
 $temp=$_SESSION["game"];
 $out=array();
 //direction -> condenseage 
 if($dir=="left"){
  for($a=0;$a<4;$a++){
   $out[]=_condense($temp[$a][0],$temp[$a][1],$temp[$a][2],$temp[$a][3]);
  }
 }
 elseif($dir=="right"){
  for($a=0;$a<4;$a++){
   $z=array();
   $z=_condense($temp[$a][3],$temp[$a][2],$temp[$a][1],$temp[$a][0]);
   $out[]=array($z[3],$z[2],$z[1],$z[0]);
  }
 }
 elseif($dir=="up"){
  for($a=0;$a<4;$a++){
   $b=3-$a;
   $z=array();
   $z=_condense($temp[0][$b],$temp[1][$b],$temp[2][$b],$temp[3][$b]);
   $out[0][$b]=$z[0];
   $out[1][$b]=$z[1];
   $out[2][$b]=$z[2];
   $out[3][$b]=$z[3];
  }
 }
 elseif($dir=="down"){
  for($a=0;$a<4;$a++){
   $z=array();
   $z=_condense($temp[3][$a],$temp[2][$a],$temp[1][$a],$temp[0][$a]);
   $out[0][$a]=$z[3];
   $out[1][$a]=$z[2];
   $out[2][$a]=$z[1];
   $out[3][$a]=$z[0];
  }
 }
 //as long as the move resulted in results, add in a random
 if($out!=$temp){
  $z=array();
  for($a=0;$a<4;$a++){
   for($b=0;$b<4;$b++){
    if($out[$a][$b]==0)
	 $z[]=array($a,$b);
   }
  }
  if(count($z)>0){
   $a=rand(0,count($z));
   $b=rand(0,3);
   if($b==0)
    $out[$z[$a][0]][$z[$a][1]]=4;
   else
    $out[$z[$a][0]][$z[$a][1]]=2;
  }
 }
 //set, game, match
 $_SESSION["game"]=$out;
}
//single button
function _button($dir){
 echo"<form action=\"index.php\" id=\"".$dir."\" method=\"post\">";
 echo"<input type=\"hidden\" name=\"dir\" value=\"".$dir."\"/>";
 echo"<input type=\"submit\" value=\"".$dir."\"/>";
 echo"</form>";
}
//display a bitch
function _dump(){
 echo"<table>\n";
 for($a=0;$a<4;$a++){
  echo"<tr>\n";
  for($b=0;$b<4;$b++){
   if($_SESSION["game"][$a][$b]==0)
    $c="white";
   elseif($_SESSION["game"][$a][$b]==2)
    $c="yellow";
   elseif($_SESSION["game"][$a][$b]==4)
    $c="orange";
   elseif($_SESSION["game"][$a][$b]==8)
    $c="orangered";
   elseif($_SESSION["game"][$a][$b]==16)
    $c="red";
   elseif($_SESSION["game"][$a][$b]==32)
    $c="plum";
   elseif($_SESSION["game"][$a][$b]==64)
    $c="purple";
   elseif($_SESSION["game"][$a][$b]==128)
    $c="magenta";
   elseif($_SESSION["game"][$a][$b]==256)
    $c="lightblue";
   elseif($_SESSION["game"][$a][$b]==512)
    $c="cyan";
   elseif($_SESSION["game"][$a][$b]==1024)
    $c="teal";
   elseif($_SESSION["game"][$a][$b]==2048)
    $c="green";
   elseif($_SESSION["game"][$a][$b]==4096)
    $c="yellowgreen";
   echo"<td class=\"b\" style=\"background-color:".$c."\">".$_SESSION["game"][$a][$b]."</td>";
  }
  echo"</tr>\n";
 }
 echo"</table>\n";
}
//menu display
function _menu(){
 echo"<table>\n";
 echo"<tr><td></td><td>";
 _button("up");
 echo"</td><td></td></tr>\n";
 echo"<tr><td>";
 _button("left");
 echo"</td><td class=\"b\">".$_SESSION["score"]."</td><td>";
 _button("right");
 echo"</td></tr>\n";
 echo"<tr><td></td><td>";
 _button("down");
 echo"</td><td></td></tr>\n";
 echo"</table>\n";
}
?>