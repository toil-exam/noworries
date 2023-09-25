<?php
session_start();
session_destroy();
echo"<html><body><center style=\"font-size:100px;\"><a href=\"index.php\">start</a><br/><a href=\"\">reset</a></center></body></html>";
?>