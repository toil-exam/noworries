<?php
//fabric

$fabric=array(
	0=>array("Broadcloth","Buckram","Burlap","Canvas","Cheesecloth","Felt","Gingham","Hemp","Jute","Muslin","Sailcloth","Terrycloth"),
	1=>array("Cotton","Corduroy","Denim","Flannel","Gabardine","Seersucker","Tartan","Tweed","Twill","Wool"),
	2=>array("Brocade","Lace","Leather","Linen","Herringbone","Moleskin","Oilskin","Satin","Silk","Suede"),
	3=>array("Angora","Calico","Cashmere","Fleece","Fur","Sharkskin","Taffeta","Velour","Velvet"),
	4=>array()
	);

function randomFabric($a=0){
	$b=$GLOBALS["fabric"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>