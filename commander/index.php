<?php

session_start();

if($_SESSION["names"]=="")
{
$_SESSION["names"]=array();
echo"<form action=\"index.php\" method=\"post\">\n";
echo"<input type=\"hidden\" name=\"begin\" value=\"BEGIN\"/>\n";
echo"<input type=\"submit\" value=\"BEGIN\"/>\n";
echo"</form>\n";
}

if($_POST["begin"]=="BEGIN")
{
echo"<form action=\"index.php\" method=\"post\">\n";
echo"<input type=\"text\" name=\"name\"/>\n";
echo"<input type=\"submit\" value=\"ADD\"/>\n";
echo"</form>\n";
}

if($_POST["name"]!="")
{
$_SESSION["names"][count($_SESSION["names"])]=$_POST["name"];
for($x=0;$x<count($_SESSION["names"]);$x++)
{
 echo $_SESSION["names"][$x]."<br/>\n";
}
echo"<form action=\"index.php\" method=\"post\">\n";
echo"<input type=\"text\" name=\"name\"/>\n";
echo"<input type=\"submit\" value=\"ADD\"/>\n";
echo"</form>\n";
echo"<form action=\"index.php\" method=\"post\">\n";
echo"<input type=\"hidden\" name=\"ready\" value=\"ready\"/>\n";
echo"<input type=\"submit\" value=\"READY\"/>\n";
echo"</form>\n";
}

if($_POST["ready"]=="ready")
{

echo"oh shit i haven't coded this far yet";

}





echo"<form action=\"index.php\" method=\"post\">\n";
echo"<input type=\"hidden\" name=\"end\" value=\"END\"/>\n";
echo"<input type=\"submit\" value=\"END\"/>\n";
echo"</form>\n";

if($_POST["end"]=="END")
{
session_destroy();
}

?>