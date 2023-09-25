<?php

if(ctype_alnum($_POST["name"]))
 {
 $_SESSION["login"]=$_POST["name"];
 include("namelist.php");
 $txt="<?php\n\$name=array();\n";
 for($a=0;$a<count($name);$a++)
  {
  $txt.="\$name[]=\"".$name[$a]."\";\n";
  }
 $txt.="\$name[]=\"".$_POST["name"]."\";\n";
 $txt.="?>\n";
 $file=fopen("namelist.php","w+");
 fwrite($file,$txt);
 fclose($file);
 }
else
 echo"Letter and numbers only please";

if($_SESSION["login"]=="")
 {
 echo"<form action=\"\" method=\"post\"><input type=\"text\" name=\"name\"/><input type=\"submit\"/></form><br/>\n"; 
 }

?>