<?php

session_start();

if($_POST["extra"]=="destroy")
{
session_destroy();
session_start();
}

//check for id, if not load up a bitch
if($_SESSION["id"]=="")
include("start.php");
else
include("id/".$_SESSION["id"].".php");

//functions
include("funk.php");

//i guess handlers here...?
include("handlers.php");  
  
//inventory check
if((count($_SESSION["inv"]))>5)
 {
 if((in_array("bag",$_SESSION["inv"]))&&((count($_SESSION["inv"]))<10))
  echo"";
 else
  {
  $tag="";
  include("poss.php");
  }
 }
 
/*
//life check
if($_SESSION["hp"][0]>0)
 echo"";
elseif(($_SESSION["hp"][0]<=0)&&($_SESSION["lives"]>0))
 {
 $_SESSION["hp"][0]=$_SESSSION["hp"][1];
 if($_SESSION["lives"]==1)
  $text[count($text)]="<b>You're dead!</b> And this is your last continue!";
 else
  $text[count($text)]="<b>You are dead!</b> But thankfully you have ".$_SESSION["lives"]." continues left.";
 $_SESSION["lives"]-=1;
 $tag=array();
 tag($x,"Continue","continue");
 }
else
 {
 $tag=array();
 tag("dead","You are dead");
 }
*/

//display
include("display.php");

//save
include("save.php");



echo"<form action=\"index.php\" method=\"post\"><input type=\"hidden\" name=\"extra\" value=\"destroy\"/><input type=\"submit\" value=\"destroy\"/></form>";

?>