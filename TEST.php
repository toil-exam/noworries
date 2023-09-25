<?php
// TEST


$_SESSION["player"]["location"] = new Point(0,0);

$_SESSION["world"] = new World;


$_SESSION["world"]->buildArea(area("path",-1,-8,-2,9,2),0);


/*

$_SESSION["world"]->buildArea(area("path",0,0,10,10,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,-10,-10,2),0);


$_SESSION["world"]->buildArea(area("path",0,0,0,10,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,10,0,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,10,-10,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,0,-10,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,-10,0,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,-10,10,2),0);

*/

/*
$_SESSION["world"]->buildArea(area("path",0,0,30,20,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,-30,20,2),0);
$_SESSION["world"]->buildArea(area("path",0,0,0,-20,2),0);

$_SESSION["world"]->buildArea(area("path",30,20,-30,20,2),0);
$_SESSION["world"]->buildArea(area("path",0,-20,-30,20,2),0);
$_SESSION["world"]->buildArea(area("path",30,20,0,-20,2),0);

$_SESSION["world"]->buildArea(area("circle",0,0,8),0);
$_SESSION["world"]->buildArea(area("circle",30,20,4),0);
$_SESSION["world"]->buildArea(area("circle",-30,20,4),0);
$_SESSION["world"]->buildArea(area("circle",0,-20,4),0);
*/


//$_SESSION["world"]->buildArea("path",1,-1,-7,17,2);



//$_SESSION["world"]->buildArea("path",-10,0,10,0,5);

/*
$_SESSION["world"]->buildArea("path",5,5,15,15,2);
$_SESSION["world"]->buildArea("path",5,5,-5,15,2);
$_SESSION["world"]->buildArea("path",5,5,15,-5,2);
$_SESSION["world"]->buildArea("path",5,5,-5,-5,2);
*/

/*
$_SESSION["world"]->buildArea("path",0,0,10,10,5);
$_SESSION["world"]->buildArea("path",0,0,-10,10,5);
$_SESSION["world"]->buildArea("path",0,0,10,-10,5);
$_SESSION["world"]->buildArea("path",0,0,-10,-10,5);
*/

/*
$_SESSION["world"]->buildArea("circle",0,0,5);
$_SESSION["world"]->buildArea("circle",10,20,5);
$_SESSION["world"]->buildArea("circle",-10,20,5);
*/






?>