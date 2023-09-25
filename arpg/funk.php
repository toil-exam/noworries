<?php
//functions
include("basicforms.php");

//dieroll random
function _d($a,$b=""){
	$c=0;
	if($b=="")
		$c+=rand(1,$a);
	else{
		for($d=$a;$d>0;$d--){
			$c+=rand(1,$b);
			}
		}
	return$c;
	}

//writing to the div text
$GLOBALS["divtext"]="";
function _div($text,$newline=true){
	$GLOBALS["divtext"].=$text;
	if($newline==true)
		$GLOBALS["divtext"].="<br/><br/>";
	$GLOBALS["divtext"].="\n";
	}

function _divqbf($a,$b,$c){
	_div("<form action=\"index.php\" method=\"post\">",false);
	_div("<input type=\"hidden\" name=\"".$a."\" value=\"".$b."\"/>",false);
	_div("<input type=\"submit\" value=\"".$c."\"/>",false);
	_div("</form>");
	}

function _divstat(){
	foreach($_SESSION["user"] as $a=>$b){
		if(is_array($b)){
			foreach($_SESSION["user"][$a] as $c=>$d){
				if(is_array($d)){
					foreach($_SESSION["user"][$a][$c] as $e=>$f){
						_div("<b>".$e."</b>: ".$f);
						}
					}
				else
					_div("<b>".$c."</b>: ".$d);
				}
			}
		else{
			_div("<b>".$a."</b>: ".$b);
			}
		}
	}
?>