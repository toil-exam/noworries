<?php
//handling




//editing
if($_POST["edit"]=="edit")
	$_SESSION["settings"]["edit"]=0;
elseif($_POST["edit"]=="done")
	$_SESSION["settings"]["edit"]="done";



//moving
if($_POST["move"]=="up")
	$_SESSION["user"]["location"]["y"]-=1;
elseif($_POST["move"]=="down")
	$_SESSION["user"]["location"]["y"]+=1;
elseif($_POST["move"]=="left")
	$_SESSION["user"]["location"]["x"]-=1;
elseif($_POST["move"]=="right")
	$_SESSION["user"]["location"]["x"]+=1;


















?>