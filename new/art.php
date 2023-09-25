<?php
//art.php

$GLOBALS["art"]=array();
$GLOBALS["tags"]=array("Abstract","Commission","Recursion","Landscape","Portrait","Spectrum","Satire","X");

//x number (int), w width (int), height (int), media (string), tags (array full of strings), portfolio (boolean, set true to add to portfolio)
function _art($x,$w,$h,$m,$t,$p=false){
	$GLOBALS["art"][$x]=array();
	if($w>0)
		$GLOBALS["art"][$x]["width"]=$w;
	elseif($w==0)
		$GLOBALS["art"][$x]["width"]="Unavailable";
	if($h>0)
		$GLOBALS["art"][$x]["height"]=$h;
	elseif($h==0)
		$GLOBALS["art"][$x]["height"]="Unavailable";
	switch($m){
		case "aoc":
			$GLOBALS["art"][$x]["media"]="Acrylic on Canvas";
			break;
		case "aocb":
			$GLOBALS["art"][$x]["media"]="Acrylic on Canvas Board";
			break;
		case "mamaoc":
			$GLOBALS["art"][$x]["media"]="Metallic and Matte Acrylic on Canvas";
			break;
		case "mamaocb":
			$GLOBALS["art"][$x]["media"]="Metallic and Matte Acrylic on Canvas Board";
			break;
		case "moc":
			$GLOBALS["art"][$x]["media"]="Multimedia on Canvas";
			break;
		case "mocb":
			$GLOBALS["art"][$x]["media"]="Multimedia on Canvas Board";
			break;
		case "mop":
			$GLOBALS["art"][$x]["media"]="Multimedia on Poster";
			break;
		case "opoc":
			$GLOBALS["art"][$x]["media"]="Oil Pastel on Canvas";
			break;
		case "opocb":
			$GLOBALS["art"][$x]["media"]="Oil Pastel on Canvas Board";
			break;
		/*
		case "":
			$GLOBALS["art"][$x]["media"]="";
			break;
		*/
		default:
			$GLOBALS["art"][$x]["media"]=$m;
		}
	$temp=array();
	if(is_array($t)){
		sort($t);
		for($a=0;$a<count($t);$a++){
			switch($t[$a]){
				case "a":
					$temp[]="Abstract";
					break;
				case "c":
					$temp[]="Commission";
					break;
				case "f":
					$temp[]="Recursion";
					break;
				case "l":
					$temp[]="Landscape";
					break;
				case "p":
					$temp[]="Portrait";
					break;
				case "r":
					$temp[]="Spectrum";
					break;
				case "s":
					$temp[]="Satire";
					break;
				case "X":
					$temp[]="X";
					break;
				default:
					$temp[]=$t[$a];
					if(!in_array($t[$a],$GLOBALS["tags"]))
						$GLOBALS["tags"][]=$t[$a];
					break;
				/*
				case "":
					$temp[]="";
					break;
				*/
				}
			}
		}
	sort($temp);
	sort($GLOBALS["tags"]);
	$GLOBALS["art"][$x]["tags"]=$temp;
	$GLOBALS["art"][$x]["portfolio"]=$p;
	}

// _art(20,,,"",array(),false);

_art(293,20,16,"aoc",array(),false);
_art(292,12,16,"aoc",array(),false);
_art(291,8,10,"aoc",array(),false);
_art(290,8,10,"aoc",array(),false);
_art(289,8,10,"aoc",array(),false);
_art(288,8,10,"aoc",array(),false);
_art(287,10,10,"aoc",array(),false);
_art(286,8,10,"aoc",array(),false);
_art(285,10,10,"aoc",array(),false);
_art(284,8,10,"aoc",array(),false);
_art(283,8,10,"aoc",array(),false);
_art(282,8,10,"aoc",array(),false);
_art(281,9,12,"aoc",array(),false);
_art(280,9,12,"aoc",array(),false);
_art(279,10,20,"aoc",array(),false);
_art(278,8,10,"aoc",array(),false);
_art(277,9,12,"aoc",array(),false);
_art(276,9,12,"aoc",array(),false);
_art(275,11,14,"aoc",array(),false);
_art(274,18,24,"aoc",array(),false);
_art(273,12,12,"aoc",array(),false);
_art(272,36,48,"aoc",array("c"),false);
_art(271,9,12,"aoc",array(),false);
_art(270,16,20,"aoc",array(),false);
_art(269,16,20,"aoc",array(),false);
_art(268,16,20,"aoc",array(),false);
_art(267,16,20,"aoc",array(),false);
_art(266,10,10,"aoc",array(),false);
_art(265,6,8,"aoc",array(),false);
_art(264,24,30,"moc",array(),false);
_art(263,16,20,"moc",array(),false);
_art(262,16,20,"moc",array(),false);
_art(261,16,20,"moc",array(),false);
_art(260,16,20,"moc",array(),false);
_art(259,16,20,"moc",array(),false);
_art(258,16,20,"moc",array(),false);
_art(257,16,20,"moc",array(),false);
_art(256,16,20,"moc",array(),false);
_art(255,16,20,"moc",array(),false);
_art(254,16,20,"moc",array(),false);
_art(253,24,30,"aoc",array(),false);
_art(252,16,20,"aoc",array(),false);
_art(251,16,20,"aoc",array(),false);
_art(250,16,20,"aoc",array(),false);
_art(249,16,20,"aoc",array(),false);
_art(248,16,20,"aoc",array(),false);
_art(247,16,20,"aoc",array(),false);
_art(246,18,24,"aoc",array(),false);
_art(245,16,20,"aoc",array(),false);
_art(244,16,20,"aoc",array(),false);
_art(243,16,20,"aoc",array(),false);
_art(242,16,20,"aoc",array(),false);
_art(241,16,20,"aoc",array(),false);
_art(240,16,20,"aoc",array(),false);
_art(239,24,36,"aoc",array(),false);
_art(238,16,20,"aoc",array(),false);
_art(237,16,20,"aoc",array(),false);
_art(236,24,36,"aoc",array(),false);
_art(235,18,18,"aoc",array(),false);
_art(234,24,18,"aoc",array(),false);
_art(233,20,20,"aoc",array(),false);
_art(232,30,24,"aoc",array(),false);
_art(231,36,48,"aoc",array(),false);
_art(230,18,24,"aoc",array(),false);
_art(229,40,30,"aoc",array(),false);
_art(228,18,24,"aoc",array("Skull","Fire","Sword","Spell","c"),false);
_art(227,18,24,"aoc",array("MrPuckett","dog","c"),false);
_art(226,14,11,"aoc",array("pumpkin","cat"),false);
_art(225,18,18,"aoc",array(),false);
_art(224,20,16,"aoc",array(),false);
_art(223,18,24,"mamaoc",array(),false);
_art(222,12,12,"mamaoc",array(),false);
_art(221,20,16,"mamaoc",array(),false);
_art(220,14,11,"aocb",array(),false);
_art(219,11,14,"aocb",array(),false);
_art(218,11,14,"aoc",array(),false);
_art(217,11,14,"aoc",array(),false);
_art(216,11,14,"aocb",array(),false);
_art(215,16,12,"aocb",array(),false);
_art(214,11,14,"aoc",array(),false);
_art(213,16,20,"aoc",array(),false);
_art(212,20,16,"aoc",array(),false);
_art(211,20,20,"aoc",array(),false);
_art(210,48,48,"aoc",array(),false);
_art(209,16,20,"aoc",array(),false);
_art(208,16,20,"aoc",array(),false);
_art(207,18,24,"aoc",array(),false);
_art(206,18,24,"aoc",array(),false);
_art(205,30,40,"aoc",array(),false);
_art(204,24,36,"aoc",array(),false);
_art(203,20,20,"aoc",array(),false);
_art(202,20,20,"aoc",array(),false);
_art(201,24,30,"aoc",array("c",),false);
_art(200,24,36,"aoc",array("c","Red","White","Blue","Dazzler","Marvel"),false);
_art(199,18,24,"aoc",array("Halloween","Haunted House","Orange","Purple","Green","Black"),false);
_art(198,18,18,"aoc",array("Halloween","Jack o Lantern","Orange","Pumpkin","Black"),false);
_art(197,18,24,"aoc",array("Kiwi","Whiskey","c","Dog"),false);
_art(196,6,18,"aoc",array("White","Yellow","Brown","Pokemon","Ninetails"),false);
_art(195,8,10,"aoc",array("Blue","Green","Lime","Turquoise","Pokemon","Scyther"),false);
_art(194,11,14,"aocb",array("Brown","White","Red","Pokemon","Cubone"),false);
_art(193,12,12,"aoc",array("p","Black","Purple","Pokemon","Gengar"),false);
_art(192,30,24,"aoc",array("c","p","Orange","Red","Yellow","Roaring Girl"),false);
_art(191,24,30,"mamaoc",array("a","f","Visual","Snow","Black","Silver","Blue","Purple","Teal"),true);
_art(190,18,24,"aoc",array("s","Mountain","Castle","Dragon","Beer","Cigarette","Phone","Turquoise","Tangerine"),true);
_art(189,16,20,"aoc",array("a","l","r","Volcano"),false);
_art(188,30,24,"aoc",array("Seascape","Red","Bird","Seagull","Seagullscape"),false);
_art(187,18,24,"aoc",array("Phone","Charger","f","White","Red","Blue"),true);
_art(186,16,20,"aoc",array("Coffee Pot","Brown","s","Black","Yellow"),false);
_art(185,24,30,"mamaoc",array("Lillies","Flowers","Green","Gold","Olive","Teal","White","Monet","X"),true);
_art(184,24,36,"aoc",array("RNC","p","DUMP","GOP","GROSS","GIANT PILE OF DOGSHIT","HAIR PIECE"),false);
_art(183,18,24,"aoc",array("a","l","r","Forest"),false);
_art(182,12,12,"aoc",array("p","Dog","Leche","Black","White","Purple"),true);
_art(181,36,24,"aoc",array("c","Frank","Graphic"),false);
_art(180,24,36,"aoc",array("f","a","r","X"),true);
_art(179,30,24,"aoc",array("a","Ceiling Fan","Green","Olive","Yellow","White","Wind"),false);
_art(178,24,18,"aoc",array("l","Pastel"),false);
_art(177,18,24,"aoc",array("f","p","Graphic","Blood","Blue","Red"),true);
_art(176,24,18,"aoc",array("Cityscape","Pastel"),false);
_art(175,16,20,"aoc",array("a","p","Black"),false);
_art(174,24,30,"aoc",array("p","American Gothic","Zombie"),false);
_art(173,36,24,"aoc",array("a","l","r","X"),true);
_art(172,36,24,"aoc",array("a","Spacescape","Gold","r"),true);
_art(171,36,24,"aoc",array("a","f","l","Blue","Purple","White"),false);
_art(170,24,30,"aoc",array("a","f","l","Forest","Yellow","Purple","Plum","Crimson","X"),true);
_art(169,30,24,"aoc",array("a","f","Black","White","Spiral"),false);
_art(168,18,24,"aoc",array("p","Dog","Lucy","c","Black","White","Lab"),false);
_art(167,16,20,"aoc",array("a","l","Spiral"),false);
_art(166,18,24,"aoc",array("s","Brain","Storm","Blue","Pink","Lightning"),false);
_art(165,36,24,"aoc",array("p","Zombie","Bride","Groom","Brain","X"),true);
_art(164,16,20,"aoc",array("p","Gun","f","Death","Graphic","Blood"),false);
_art(163,24,30,"aoc",array("a","Lighter","Peacock","Yellow","Purple","Blue","Turquoise","Fuschia","Magenta","Plum","Purple","Crimson","X"),true);
_art(162,16,20,"aoc",array("a","l","Forest","White","Black","Yellow","Purple"),false);
_art(161,24,36,"aoc",array("p","Satan","Rock n Roll","Snake","Guitar","r"),false);
_art(160,24,30,"aoc",array("Bird","Phoenix","Egg","Skeleton","Fire","Black","White","Orange","Red","Yellow","X"),true);
_art(159,24,18,"aoc",array("Hand","Black","White","Tan","Sienna","Ochre"),false);
_art(158,18,24,"aoc",array("Jack Daniels","Red","Blue","Yellow","Alcohol"),false);
_art(157,24,30,"aoc",array("p","a","r"),false);
_art(156,24,18,"aoc",array("s","Painter","Red","Blue","Black","White"),false);
_art(155,18,24,"aoc",array("a","Nonsense"),false);
_art(154,16,20,"mamaoc",array("a","f","Satan","Purple","Silver","Black"),false);
_art(153,24,16,"aoc",array("Mantis","Green","Red"),false);
_art(152,24,30,"aoc",array("a","Aum","Fire","Monk","Black","White","Red","Yellow","Flower"),false);
_art(151,24,18,"aoc",array("p","r"),false);
_art(150,24,36,"aoc",array("Anubis","Satan","Blue","Purple","Orange","Yellow","Sphinx","Pyramid","Sun","Moon"),false);
_art(149,20,20,"aoc",array("p","Rick","Blue","Tan"),false);
_art(148,24,24,"aoc",array("f","Black","White","r","Painting","X"),true);
_art(147,18,24,"aoc",array("Satan","Grass","Fire","r"),false);
_art(146,24,36,"mamaoc",array("FSM","Black","Blue","Red","Gold","Yeeza","Eris","Beer"),false);
_art(145,18,24,"aoc",array("s","Worm","Bird","Pink","Green"),false);
_art(144,24,30,"mamaoc",array("Satan","Tree","Apple","Gold","Green","White","Yellow","Skeleton","X"),true);
_art(143,36,24,"mamaoc",array("l","Forest","Green","Gold"),false);
_art(142,18,24,"aoc",array("l","Cabin","Green","Crimson","White"),false);
_art(141,18,24,"aoc",array("Seascape","White","Orange","Pink","Crimson","Plum"),false);
_art(140,18,24,"aoc",array("l","Flowers","Pink","Blue","Green"),false);
_art(139,18,24,"aoc",array("s","Roach","Nuclear","Black","White"),false);
_art(138,18,24,"mamaoc",array("l","a","Green","Black","Silver","Moon"),false);
_art(137,24,16,"aoc",array("l","Castles","Destruction","Pink","Yellow"),false);
_art(136,18,24,"aoc",array("p","Satan","Cthulhu","Kraken","Beast","Tentacle","Skull","Octopus","Squid","Mint","Purple","Black"),true);
_art(135,18,24,"aoc",array("Sun","Moon","Titan","Blue","Yellow","Tan"),false);
_art(134,18,24,"aoc",array("s","Tree","Chainsaw","Blue","Brown","Orange","Slate"),false);
_art(133,24,36,"aoc",array("p","r","Satan","La Muerta","Anti Christ","Hell","Gold"),false);
_art(132,22,28,"aocb",array("p","a","r","Satan","Baphomet","Apple","Death","Sun","Moon","Time","Knife","Tree"),false);
_art(131,18,24,"mamaocb",array("p","War","Black","Silver"),false);
_art(130,18,24,"aoc",array("s","Bird","Pidgeon","Bread","Blue","White"),false);
_art(129,18,24,"mamaoc",array("p","Death","Black","White","Gold"),false);
_art(128,16,20,"aoc",array("s","Godzilla","Destruction","Cityscape","Fire"),false);
_art(127,12,12,"aoc",array("s","Soap","Mud Bath","Margarita","Alcohol","Pink","Turquoise","Brown"),false);
_art(126,18,24,"mamaoc",array("Dragon","Knight","Blue","Olive","Silver","Green","Fire"),false);
_art(125,12,9,"aoc",array("s","Ship","Bottle","Shotglass","Blue","Seascape"),false);
_art(124,12,18,"aocb",array("Black","Lotus","Mtg"),false);
_art(123,18,24,"aoc",array("Captain Morgan","Black","Red","Blue","Yellow","White","Alcohol"),false);
_art(122,12,16,"aoc",array("s","Pregnant","Nun"),false);
_art(121,12,12,"aoc",array("s","Cat","Mouse","Tom","Jerry","Black","White","Yellow"),false);
_art(120,18,24,"aoc",array("s","Rabbit","Top Hat","Magician","Trick","Black","White","Orange","Pink"),false);
_art(119,0,0,"aoc",array("s","Flask","Alcohol","Blood"),true);
_art(118,0,0,"mamaoc",array("s","Fish","Bird","Silver","Blue"),false);
_art(117,12,12,"aoc",array("s","Deer","Hunter","Forest","Green","Orange"),false);
_art(116,24,36,"mamaoc",array("l","Forest","Black","White","Silver","Night","Spooky"),true);
_art(115,16,20,"mamaoc",array("Gold","Caps"),false);
_art(114,12,12,"mamaoc",array("p","Gold","Silver","Bronze"),false);
_art(113,12,12,"mamaoc",array("a","p","Gold"),false);
_art(112,12,12,"mamaoc",array("Green","Skull","Gold","Slate"),false);
_art(111,24,36,"mamaoc",array("Dragon","Gold","Bronze","Yellow","Red","Orange","Fire"),false);
_art(110,24,36,"mamaoc",array("p","Satan","Monk","Gold","Red","Crimson","X","Blood"),true);
_art(109,24,18,"aoc",array("l","Black","White","Purple","Lighthouse"),false);
_art(108,16,20,"mamaoc",array("l","Bronze","Forest"),false);
_art(107,20,20,"mamaoc",array("a","l","Forest"),false);
_art(106,24,24,"aoc",array("QR","Pink","Turquoise"),false);
_art(105,18,24,"mamaoc",array("Still Life","Jack Daniels","Alcohol","Black","Blue","Silver"),false);
_art(104,18,24,"aoc",array("Still Life","Bong","Flowers","Vase","Yellow","Red","Crimson"),true);
_art(103,24,36,"aoc",array("a","l","Volcano","Eruption","Black","White","Turquoise","Plum"),false);
_art(102,16,20,"aoc",array("Tunnel","Cave","Black","Blue"),false);
_art(101,22,28,"aocb",array("l","Seascape","Mountain","Blue","Olive"),false);
_art(100,30,24,"mamaoc",array("l","Forest","Pink","Green","Silver"),false);
_art(99,24,30,"aoc",array("a","l","Forest","Yellow","Blue","Red"),false);
_art(98,24,30,"mamaoc",array("a","l","X","Black","Blue","Turqoise","Gold"),true);
_art(97,30,24,"mamaoc",array("a","l","Lake","Blue","Silver"),false);
_art(96,18,24,"aocb",array("s","Dog","Walk","Person"),false);
_art(95,18,24,"aoc",array("a","l","Mountain","Blue","Black"),false);
_art(94,18,24,"aoc",array("a","l","Lake","Cabin","Pink","Plum","Blue","Turquoise"),false);
_art(93,18,24,"aoc",array("a","l","Forest","Black","Pink"),false);
_art(92,24,18,"aoc",array("a","l","Black","Tan","Orange","Sienna","Ochre"),false);
_art(91,18,24,"aoc",array("a","l","Castle","Peak","Purple","Black","Tan"),false);
_art(90,18,24,"aoc",array("a","l","Valley","Black","White","Tan","Green","Turquoise"),false);
_art(89,36,24,"aoc",array("s","l","Satan","Death","Vincent van Gogh","Spooky","Black","White"),false);
_art(88,36,24,"aoc",array("c","l","Vincent van Gogh","The Starry Night"),false);
_art(87,20,20,"aoc",array("a","p","Skull","Tree","Blue","Pink"),false);
_art(86,20,20,"aoc",array("Still Life","Fruit"),false);
_art(85,16,20,"aoc",array("Skyscape","Church","Satan","Black","Yellow"),false);
_art(84,20,20,"aoc",array("p","Red"),false);
_art(83,16,20,"aoc",array("a","l","Mountain","Black","White"),false);
_art(82,24,18,"aoc",array("a","l","Forest","Blue","Pink","Red","Green"),false);
_art(81,16,20,"aoc",array("c","Dog","Dutch","Green","White","Brown"),false);
_art(80,24,36,"aoc",array("l","Green","Olive","Yellow","Orange","Red","X"),true);
_art(79,36,24,"aoc",array("a","l","Forest","Green","Blue","Turquoise","Plum"),false);
_art(78,16,20,"aoc",array("p","Zombie"),false);
_art(77,18,24,"aoc",array("a","l","Black","Blue","Red","X"),true);
_art(76,18,24,"aoc",array("a","p","Red","Blue","Spooky"),false);
_art(75,24,18,"aoc",array("s","Carrot","Rabbit","Pink","Orange"),false);
_art(74,18,24,"aoc",array("s","Banana","Monkey","White","Black","Yellow","Pink"),false);
_art(73,16,20,"aoc",array("Smoke","Smoker","Cigarette","Match","s","Black","White","X","Death"),true);
_art(72,20,16,"aoc",array("Tunnel"),false);
_art(71,18,24,"aoc",array("a","p","Yellow","Blue","Green"),false);
_art(70,18,24,"aoc",array("a","p","Black"),false);
_art(69,18,24,"aoc",array("p","Pink","Red"),false);
_art(68,16,20,"aoc",array("a","p","Purple","Plum"),false);
_art(67,28,22,"aoc",array("l"),false);
_art(66,20,16,"aoc",array("a","l","Pearl","Asparagus"),false);
_art(65,16,20,"mamaoc",array("a","l","Olive"),false);
_art(64,36,24,"mamaoc",array("a","l","Gold","Plum","Orange","Red","Yellow","Black","White"),false);
_art(63,18,24,"aoc",array("Black","Cat","Blue"),false);
_art(62,20,16,"aoc",array("p","Satan","Black","White","Plum","Crimson","Yellow"),false);
_art(61,30,24,"aoc",array("Red","Gecko","Yellow"),false);
_art(60,16,20,"aoc",array("Red","Skull","Skeleton"),false);
_art(59,24,30,"aoc",array("Green","Blue","Moon"),false);
_art(58,24,36,"aoc",array("Centaur","Apple","Neil"),false);
_art(57,16,20,"mamaoc",array("Stag","Gold"),true);
_art(56,16,20,"aoc",array("p","Blue"),false);
_art(55,36,48,"aoc",array("a","p","Huge","Blue","Red","Green"),false);
_art(54,28,22,"mocb",array("a","l","Mountain","Waves","Purple","Gold","X","Plum","Turquoise","Yellow","White"),true);
_art(53,18,24,"aoc",array("p","Olive","Plum"),false);
_art(52,18,24,"aoc",array("a","Bird","Blue","Turquoise"),false);
_art(51,18,24,"aoc",array("a","Cat","r","Mini"),false);
_art(50,26,22,"aoc",array("a","l","Snow","Winter","Blue","Pink","Purple"),false);
_art(49,18,24,"aoc",array("a","Cave","Owl","Yellow","Plum"),false);
_art(48,24,18,"Marker on Poster",array("Mountain","Turquoise","Tangerine","Blue","Orange"),false);
_art(47,0,0,"Multimedia on Shaped Poster",array("Smoking Kills","Dinosaur","Cigarette","Smoke"),false);
_art(46,24,18,"mop",array("a","Beast","r"),false);
_art(45,24,18,"mop",array("a","Beast","Green","Blue","Purple"),false);
_art(44,18,24,"mop",array("a","Beast","Red"),false);
_art(43,24,18,"mop",array("l","Spooky","Night"),false);
_art(42,0,0,"Marker on Shaped Poster",array("White","Owl"),false);
_art(41,0,0,"Marker on Poster",array("a","r"),false);
_art(40,30,24,"aoc",array("l","NCSU","Pullen Park","The Gates"),false);
_art(39,0,0,"Acrylic on Sheetrock",array("l","Eruption","Volcano","Mountain","r"),false);
_art(38,18,24,"mamaoc",array("p","Satan","Fire","Orange","Red","Gold"),false);
_art(37,18,24,"aoc",array("l","a"),false);
_art(36,24,18,"aoc",array("l","Wheat","Turquoise","Tan","X"),true);
_art(35,18,24,"aoc",array("l","Forest","Green","Blue","Red"),false);
_art(34,24,18,"aoc",array("l","Cactus","Orange","Green"),false);
_art(33,0,0,"mamocb",array("l","Mountain","Bronze"),false);
_art(32,0,0,"aocb",array("p","Blue","Red"),false);
_art(31,0,0,"mop",array("p","s","r"),false);
_art(30,24,18,"aoc",array("l","a","Barren"),false);
_art(29,24,18,"aoc",array("Skeleton","Cigarette","Smoke"),false);
_art(28,20,16,"aoc",array("a","Comet"),false);
_art(27,20,16,"aoc",array("l","Mountain","Blue"),false);
_art(26,24,18,"mamaoc",array("l","Forest"),true);
_art(25,24,18,"moc",array("a","Shot Glass","Alcohol"),false);
_art(24,18,24,"moc",array("p","Bender","Bender is Great"),false);
_art(23,0,0,"mop",array("p"),false);
_art(22,0,0,"mop",array("p","Gandhi","Clone High"),false);
_art(21,20,16,"moc",array("p","Eyes","Green","Glance"),true);
_art(20,24,18,"aoc",array("King","Crab","s"),false);
_art(19,0,0,"mop",array("p","Abe Lincoln","Clone High"),false);
_art(18,18,24,"moc",array("Salamander","Lighter","s"),true);
_art(17,16,20,"moc",array("Hawk","Mohawk","s"),true);
_art(16,24,18,"moc",array("Bear","Berries","s"),false);
_art(15,0,0,"mop",array(),false);
_art(14,18,24,"mocb",array("Bird","Beach","CaCaw"),false);
_art(13,18,24,"aoc",array("p","Satan"),false);
_art(12,0,0,"opocb",array("p","Edgar"),false);
_art(11,0,0,"opocb",array("p","White"),false);
_art(10,0,0,"aoc",array("p","Green"),false);
_art(9,0,0,"mop",array("p","Fedora","Plum","Yellow","Olive","Blue"),false);
_art(8,18,24,"aoc",array("p","Black","White","Hitsugi"),false);
_art(7,0,0,"aoc",array("Hydra"),false);
_art(6,0,0,"opocb",array("Tentacles","Kraken"),false);
_art(5,20,16,"aoc",array("Cat","c","Myesha"),false);
_art(4,0,0,"aocb",array("a","Piet Mondrian"),false);
_art(3,16,20,"aoc",array("p","Red","Blue"),false);
_art(2,0,0,"mop",array("Bird","Mountain","Thunder","Lightning","Red","Blue"),false);
_art(1,0,0,"opoc",array("l","Fall","Autumn"),false);	

?>