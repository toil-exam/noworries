<?php

include("thelog.php");
include("art2.php");


echo"<html><head><style>td{vertical-align:top;}table{padding:50px;}</style></head><body>\n";





echo"<center>\n";
echo"<h1>".count($logit)."</h1>\n";
echo"<table>\n";
echo"<tr>\n";

echo"<td>\n";
echo"<table>\n";
$tot=array();
for($d=(count($logit)-1);$d>=0;$d--)
 {
 if(is_numeric($logit[$d][2]))
  {
  if($tot[$logit[$d][2]]=="")
   $tot[$logit[$d][2]]=1;
  else
   $tot[$logit[$d][2]]+=1;
  }  
 }
for($d=count($art);$d>0;$d--)
 {
 if($tot[$d]!="")
  echo"<tr><td><b>#".$d."</b></td><td>(".$tot[$d].")</td></tr>\n";
 }
echo"</table>\n";
echo"</td>\n";

echo"<td>\n";
echo"<table>\n";
for($d=(count($logit)-1);$d>=0;$d--)
 {
 echo "<tr><td><b>#".$logit[$d][2]."</b></td><td>(".$logit[$d][1][1]."/".$logit[$d][1][2]."/".$logit[$d][1][0].")</td><td>(".$logit[$d][1][3].":".$logit[$d][1][4].")</td></tr>\n";
 }
echo"</table>\n";
echo"</td>\n";


echo"<td>\n";
echo"<table>\n";
$tot=array();
for($d=(count($logit)-1);$d>=0;$d--)
 {
 if(is_numeric($logit[$d][2]))
  echo"";
 else
  {
  if($tot[$logit[$d][2]]=="")
   $tot[$logit[$d][2]]=1;
  else
   $tot[$logit[$d][2]]+=1;
  }  
 }
foreach($tot as $key=>$value)
 {
  echo"<tr><td><b>".$key."</b></td><td>(".$tot[$key].")</td></tr>\n";
 }
echo"</table>\n";
echo"</td>\n";



echo"<td>\n";
echo"<table>\n";
$tot=0;
for($d=(count($logit)-1);$d>=0;$d--)
 {
 if($tot==0)
  $tot=1;
 elseif(($logit[$d][1][0]==$logit[($d+1)][1][0])&&($logit[$d][1][1]==$logit[($d+1)][1][1])&&($logit[$d][1][2]==$logit[($d+1)][1][2]))
  $tot+=1;
 else
  {
  $date="";
  if($logit[($d+1)][1][6]==0)
   $date.="Sun ";
  elseif($logit[($d+1)][1][6]==1)
   $date.="Mon ";
  elseif($logit[($d+1)][1][6]==2)
   $date.="Tue ";
  elseif($logit[($d+1)][1][6]==3)
   $date.="Wed ";
  elseif($logit[($d+1)][1][6]==4)
   $date.="Thu ";
  elseif($logit[($d+1)][1][6]==5)
   $date.="Fri ";
  elseif($logit[($d+1)][1][6]==6)
   $date.="Sat ";
  
  if($logit[($d+1)][1][1]==1)
   $date.="Jan ";
  elseif($logit[($d+1)][1][1]==2)
   $date.="Feb ";
  elseif($logit[($d+1)][1][1]==3)
   $date.="Mar ";
  elseif($logit[($d+1)][1][1]==4)
   $date.="Apr ";
  elseif($logit[($d+1)][1][1]==5)
   $date.="May ";
  elseif($logit[($d+1)][1][1]==6)
   $date.="Jun ";
  elseif($logit[($d+1)][1][1]==7)
   $date.="Jul ";
  elseif($logit[($d+1)][1][1]==8)
   $date.="Aug ";
  elseif($logit[($d+1)][1][1]==9)
   $date.="Sep ";
  elseif($logit[($d+1)][1][1]==10)
   $date.="Oct ";
  elseif($logit[($d+1)][1][1]==11)
   $date.="Nov ";
  elseif($logit[($d+1)][1][1]==12)
   $date.="Dec ";
  
  $date.=$logit[($d+1)][1][2];
  
  echo"<tr><td><b>".$date."</b></td><td>(".$tot.")</td></tr>";
  
  $tot=1;
  }
 
 
 
 }



echo"</table>\n";
echo"</td>\n";





echo"</tr>\n";
echo"</table\n";
echo"</center>\n";



?>