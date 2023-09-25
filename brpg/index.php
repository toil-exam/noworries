<?php
//index
session_start();
include("basicforms.php");
include("class.php");

$sword=new Weapon("Sword");
$chainmail=new Armor("Chainmail");
$sword->setAttack(1,5);
$sword->setWeight(10);
$temp=array();
$temp[0]=$sword->attack();
echo $sword->getName()." -> ".$temp[0]."<br/>\n";
$chainmail->setDefense(1,5);
$chainmail->setWeight(10);
$temp[1]=$chainmail->defense();
echo $chainmail->getName()." -> ".$temp[1]."<br/>\n";
echo"->-> ".($temp[0]-$temp[1])."<br/><br/>";
$box=new Container("Box");
$box->setCapacity(20);
$box->addItem($sword);
$box->addItem($chainmail);
_did($box->getInventory());


echo _d(10)."<br/>\n";
echo _d(20)."<br/>\n";
echo _d(30)."<br/>\n";
echo _d(40)."<br/>\n";
echo _d(10,10)."<br/>\n";
echo _d(10,20)."<br/>\n";
echo _d(10,30)."<br/>\n";
echo _d(10,40)."<br/>\n";
echo _d(1,1,4)."<br/>\n";
echo _d(1,1,14)."<br/>\n";
echo _d(1,1,24)."<br/>\n";
echo _d(1,1,34)."<br/>\n";

?>