<?php
//edit settings
if($_POST["edit"]=="next")
	$_SESSION["settings"]["edit"]+=1;
elseif(($_POST["edit"]=="previous")&&($_SESSION["settings"]["edit"]>0))
	$_SESSION["settings"]["edit"]-=1;
elseif($_POST["edit"]=="again")
	$_SESSION["settings"]["edit"]=0;
elseif(($_POST["edit_font"]=="minus")&&($_SESSION["settings"]["font"]>8))
	$_SESSION["settings"]["font"]-=2;
elseif(($_POST["edit_font"]=="plus")&&($_SESSION["settings"]["font"]<38))
	$_SESSION["settings"]["font"]+=2;
elseif(($_POST["edit_width"]=="minus")&&($_SESSION["settings"]["width"]>3))
	$_SESSION["settings"]["width"]-=1;
elseif(($_POST["edit_width"]=="plus")&&($_SESSION["settings"]["width"]<13))
	$_SESSION["settings"]["width"]+=1;
elseif(($_POST["edit_height"]=="minus")&&($_SESSION["settings"]["height"]>3))
	$_SESSION["settings"]["height"]-=1;
elseif(($_POST["edit_height"]=="plus")&&($_SESSION["settings"]["height"]<13))
	$_SESSION["settings"]["height"]+=1;
elseif(($_POST["edit_tablesize"]=="minus")&&($_SESSION["settings"]["tablesize"]>5))
	$_SESSION["settings"]["tablesize"]-=1;
elseif(($_POST["edit_tablesize"]=="plus")&&($_SESSION["settings"]["tablesize"]<25))
	$_SESSION["settings"]["tablesize"]+=1;




echo"<html>\n<head>\n<title>\n";
echo"</title>\n<style>\n";
echo"body,table,tr,td,div,input{font-size:".$_SESSION["settings"]["font"]."px;}\n";
echo"td{text-align:center;}\n";
echo"hr{border:1px solid black;}\n";
echo"</style>\n</head>\n<body>\n<center>\n";
echo"<table style=\"position:relative;z-index:0;\">\n";
for($y=0;$y<$_SESSION["settings"]["height"];$y++){
	echo"<tr>\n";
	for($x=0;$x<$_SESSION["settings"]["width"];$x++){
		$temp=($_SESSION["settings"]["tablesize"]*10);
		echo"<td style=\"position:relative;width:".$temp.";height:".$temp."px;border:1px solid black;text-align:center;\">\n";
		if(($y==round($_SESSION["settings"]["height"]-1))&&($x==round($_SESSION["settings"]["width"]-1)))
			_qbf("","","Test Button");
		echo"Test Text<br/>\n(".$x.",".$y.")\n";
		echo"</td>\n";
		}
	echo"</tr>\n";
	}
echo"</table>\n";

echo"<div style=\"position:absolute;width:50%;left:15%;top:10%;border:1px solid black;background-color:white;\"><div style=\"padding:10px;\">\n";

if($_SESSION["settings"]["edit"]==0){
	echo"Let's start by adjusting the font size. Generally this text box will contain the dense paragraphs of information while the display behind will have simpler text and information.<br/>We'll edit the size and number of cells in the display in a moment.<br/><br/>\n";
	echo"<table>\n<tr>\n";
	if($_SESSION["settings"]["font"]>8){
		echo"<td>\n";
		_qbf("edit_font","minus","Smaller");
		echo"</td>\n";
		}
	if($_SESSION["settings"]["font"]<38){
		echo"<td>\n";
		_qbf("edit_font","plus","Larger");
		echo"</td>\n";
		}
	echo"</tr>\n</table>\n";
	_qbf("edit","next","Next >>");
	}
elseif($_SESSION["settings"]["edit"]==1){
	echo"Next up the display behind this text box.<br/><br/>\n";
	echo"Expand or shrink the box size to comfortably accomodate the text and button. There should be a small buffer around the test button in the bottom right hand cell and all cells should be the same size.<br/><br/>We'll adjust the number of cells next.<br/><br/>\n";
	echo"<table>\n<tr>\n";
	if($_SESSION["settings"]["tablesize"]>5){
		echo"<td>\n";
		_qbf("edit_tablesize","minus","Smaller");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	if($_SESSION["settings"]["tablesize"]<25){
		echo"<td>\n";
		_qbf("edit_tablesize","plus","Larger");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	echo"</tr>\n<tr>\n<td>\n";
	_qbf("edit","previous","<< Previous");
	echo"\n</td><td>\n";
	_qbf("edit","next","Next >>");
	echo"</tr>\n</table>\n";
	}
elseif($_SESSION["settings"]["edit"]==2){
	echo"Next up the number of boxes in the display.<br/><br/>\n";
	echo"The exact number is not a huge deal, but there should be a number to comfortably fit your screen, without any scrollbars. Again, not an exact science. Generally your character will appear in a space close to the center.<br/><br/>\n";
	echo"<table>\n<tr>\n";
	if($_SESSION["settings"]["width"]>3){
		echo"<td>\n";
		_qbf("edit_width","minus","Narrower");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	if($_SESSION["settings"]["width"]<13){
		echo"<td>\n";
		_qbf("edit_width","plus","Wider");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	echo"</tr><tr>\n";
	if($_SESSION["settings"]["height"]>3){
		echo"<td>\n";
		_qbf("edit_height","minus","Shorter");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	if($_SESSION["settings"]["height"]<13){
		echo"<td>\n";
		_qbf("edit_height","plus","Taller");
		echo"</td>\n";
		}
	else
		echo"<td></td>\n";
	echo"</tr>\n<tr>\n<td>\n";
	_qbf("edit","previous","<< Previous");
	echo"\n</td><td>\n";
	_qbf("edit","next","Next >>");
	echo"</tr>\n</table>\n";
	}
elseif($_SESSION["settings"]["edit"]==3){
	echo"All ready to begin?<br/><br/>Feel free to go back and edit again.<br/><br/>\n";
	_qbf("edit","done","Begin >>");
	echo"<br/>\n";
	_qbf("edit","again","<< Edit");
	}

echo"<hr/><a href=\"destroy.php\">Destroy</a></div></div>\n";

echo"</center>\n</body>\n</html>\n";



?>