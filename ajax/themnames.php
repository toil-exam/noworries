<?php
// Fill up array with names
include("namelist.php");
ksort($name);

echo"<h1>names</h1>\n";

if($_REQUEST["extra"]=="update")
 {
 for($a=0;$a<count($name);$a++)
  {
  echo$a." ".$name[$a]."<br/>\n";
  }
 }

?> 