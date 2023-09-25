<?php
//enc functions

function randomENC($key,$value=0){
	if(is_array($_SESSION["enc"][$key][$value]))
		return oneOf($_SESSION["enc"][$key][$value]);
	else
		_log("you done fukked up now, failed onna randomENC call");
	}




?>