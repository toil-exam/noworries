<?php
session_start();
include("funk.php");
if($_POST["dir"]=="end")
 $_SESSION["game"]="";
_start();
if(($_POST["dir"]!="")&&($_POST["dir"]!="end"))
 _move($_POST["dir"]);
echo"<html>\n";
echo"<head>\n";
echo"<title>2048</title>\n";
echo"<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>\n";
echo"<script src=\"keys.js\"></script>\n";
echo"<style>\n";
echo"td{text-align:center; width: 100px; padding: 5px;}\n";
echo".b{border:1px solid black; font-size:60px;}\n";
echo"input{font-size:20px}\n";
echo"</style>\n";
echo"</head>\n";
echo"<body>\n";
echo"<center>\n";
_dump();
_menu();
_button("end");
echo"</center>\n";
echo"</body>\n";
echo"</html>\n";
?>