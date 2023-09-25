<?php
//index
session_start();
include("funk.php");
include("enc.php");
include("handlers.php");

if($_SESSION["settings"]=="")
	$_SESSION["settings"]=array("width"=>7,"height"=>5,"font"=>18,"tablesize"=>12,"edit"=>"done");


if(is_numeric($_SESSION["settings"]["edit"]))
	include("edit_setting.php");

if(($_SESSION["user"]["hp"]<=0)&&($_SESSION["user"]["lives"]<=0))
	include("birth.php");



if(!is_numeric($_SESSION["settings"]["edit"]))
	include("display.php");


?>