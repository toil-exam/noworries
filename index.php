<html>
<head>
	<title>Max E Art - Home</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<style>
		@media screen and (orientation:portrait) {
			:root{
				--width: 60vw;
				--size: 300%;
			}
		}

		@media screen and (orientation:landscape) {
			:root{
				--width: 30vw;
				--size: 200%;
			}
		}

		body {font-family: "Merriweather", serif; color: #ccc; font-size: var(--size); 
			<?php
			$back = rand(1,93);
			echo "background: url(bg" . $back . ".jpg); \n";
			?>
		}

		a {color: #ccc; text-decoration: none; }
		a:hover {color: #fff; }
		div {background: #222; text-align: center; padding: 5px; border: 3px solid #ccc; }
		img {padding: 3px; border: 3px solid #ccc; }

		small {font-size: 50%; }

		#mainDiv {position: absolute; left: 20%; width: var(--width); top: 15%; z-index: 51; }
		#innerDiv {padding: 15px; };
	</style>
</head>
<body>

<?php
include("art.php");
$a = array();

while (count($a) < 25) {
	$b = rand(1, count($art));
	if(!in_array($b, $a))
		$a[] = $b;
}

for ($c = 0; $c < count($a); $c++) {
	$left = rand(0, 90);
	$top = rand(0, 85);
	$x = $a[$c];

	echo "<div style=\"position: absolute; left: " . $left . "%; top: " . $top . "%;\"><a href=\"theothergallery.php?f=" . $x . "\"><img src=\"new/tn/" . $x . ".jpg\"/></a></div>\n";
}
?>

<div id="mainDiv">
	<div id="innerDiv">
		<h1>Max E Art</h1>
		<p>&rarr; <a href="theothergallery.php">Enter Gallery</a></p>
		<p>&rarr; <a href="cube/index.html">Play Cubic <sup><small>(New!)</small></sup></a></p>
		<p>&rarr; <a href="espionage/alpha.html">Play Espionage</a></p>
		<p>&rarr; <a href="note3/index.php">Play Zompox</a></p>
	</div>
</div>

</body>
</html>