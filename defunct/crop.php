<?php
//crop

$crop=array(
	0=>array("Barley","Carrot","Garlic","Lettuce","Oat","Peanut","Potato","Raddish","Rice","Soy","Wheat"),
	1=>array("Apple","Beet","Cucumber","Corn","Pepper","Tomato","Turnip"),
	2=>array("Almond","Banana","Grape","Lemon","Maize","Mushroom","Orange","Rye","Strawberry"),
	3=>array("Asparagus","Cashew","Chilli","Ginger","Lime","Peach","Shallot","Tangerine","Truffle","Yam"),
	4=>array("Coconut","Guava","Mango","Olive","Quinoa","Watermelon")
	);

function randomCrop($a=0){
	$b=$GLOBALS["crop"][$a];
	$c=rand(1,count($b))-1;
	return $b[$c];
	}

?>