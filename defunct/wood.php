<?php
//wood

$wood=array(
	0=>array("Ash","Bamboo","Beech","Birch","Cedar","Maple","Oak","Pine","Poplar","Spruce","Willow"),
	1=>array("Camphor","Cypress","Dogwood","Elm","Fir","Hickory","Sycamore","Teak","Yew"),
	2=>array("Aspen","Eucalyptus","Hemlock","Mahogany","Muskwood","Redwood","Sandalwood"),
	3=>array("Alder","Ebony","Ironwood","Lacewood","Satinwood","Sourwood"),
	4=>array("Bloodwood","Holywood","Ironbark","Kingwood","Marblewood","Rosewood")
	);

function randomWood($a=0){
	$b=$GLOBALS["wood"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>