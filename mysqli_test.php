 <?php
$servername = "localhost";
$username = "root";
$password = "z100106max";


// Create connection
$conn = mysql_connect($servername,$username,$password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
else {
	echo "Connected successfully";
}
?> 