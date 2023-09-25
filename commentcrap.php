<?php

echo"<br/><br/><div>\n";

$x=$_GET["f"];
$xphp="comment/".$x.".php";

echo"<br/><span>- Comments -</span><br/><hr/><br/>\n";

if(($_POST["userid"]!="")&&($_POST["commenttext"]!=""))
 {
  if(is_file($xphp))
   include($xphp);
  else
   $comment=array();
   
  
   $comment[count($comment)]=array(htmlspecialchars(substr($_POST["userid"],0,50)),htmlspecialchars(substr($_POST["commenttext"],0,500)));
 
 
 $filepage=fopen($xphp,"w");
 fwrite($filepage,"<?php\n\$comment=array();");
 for($a=0;$a<count($comment);$a++)
  {
  fwrite($filepage,"\$comment[".$a."]=array(\"".$comment[$a][0]."\",\"".$comment[$a][1]."\");\n");
  }
 fwrite($filepage,"?>");
 fclose($filepage);

 }
 
if(is_file($xphp))
 {
 include($xphp);
 for($b=(count($comment)-1);$b>=0;$b--)
  {
  echo"<b>".$comment[$b][0]."</b>: ".$comment[$b][1]."<br/><br/><hr/><br/>\n";
  }
 }


echo"<form action=\"theothergallery.php?f=".$x."\" method=\"post\">\n";
echo"Name: <input type=\"text\" name=\"userid\"/><br/><br/>\n";
echo"Comment: <textarea rows=\"2\" cols=\"40\" name=\"commenttext\"></textarea><br/><br/>\n";
echo"<input type=\"submit\" value=\"Submit Comment\"/><br/>\n";
echo"</form>\n";


echo"</div><br/>\n";


?>