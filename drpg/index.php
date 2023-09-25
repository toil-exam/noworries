<?php
//index
spl_autoload_register(function($class){
	include(strtolower($class).".php");
	});
session_start();
if(!$_SESSION["enc"])
	include("enc.php");
include("basicforms.php");
include("encfunc.php");
include("areafunc.php");

include("playermovement.php");

if(!$_SESSION["player"]["location"]){
	include("world_builder.php");
	//include("TEST.php");
	}

include("dump.php");

?>