<?php

session_start();

if($_POST["reset"]=="reset")
 {
 session_destroy();
 session_start();
 }

if($_SESSION["login"]=="")
include("login.php");

?>

<html>
<head>
<script src="shownames.js"></script>
</head>
<body>








<form action="" method="post"> 
<input type="hidden" name="reset" value="reset"/><input type="submit" value="reset"/>
</form>

<div id="demNames"></div>

</body>
</html>
