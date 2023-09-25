<?php
//enc functions

function randomENC($key,$value=0){
	if(is_array($GLOBALS["enc"][$key][$value]))
		{
		$a=rand(0,count($GLOBALS["enc"][$key][$value])-1);
		return($GLOBALS["enc"][$key][$value][$a]);
		}
	else
		_log("you done fukked up now, failed onna randomENC call");
	}

	



?>