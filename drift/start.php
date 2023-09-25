<?php



if($_POST["name"]!="")
 {
 //write some shit someplaces and create files and shit
 $_SESSION["name"]=htmlspecialchars(substr($_POST["name"],0,30));
 echo$_SESSION["name"];
 }


elseif($_SESSION["name"]=="")
 {
 echo"<form action=\"index.php\" method=\"post\"><input type=\"text\" name=\"name\"/>\n<br/><input type=\"submit\" value=\"CODENAME\"/></form>";
 }








?>