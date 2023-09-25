<?php
//basic form start, optional id
function _bfs($a=""){
 echo"<form id=\"".$a."\" action=\"index.php\" method=\"post\">\n";
 }
//basic form end
function _bfe(){
 echo"</form>\n";
 }
//basic form input hidden, key, value
function _bfih($a,$b){
 echo"<input type=\"hidden\" name=\"".$a."\" value=\"".$b."\"/>\n";
 }
//basic form input text, key, default text
function _bfit($a,$b=""){
 echo"<input type=\"text\" name=\"".$a."\" value=\"".$b."\"/>\n";
 }
//basic form submit button, display text
function _bfis($a="Submit"){
 echo"<input type=\"submit\" value=\"".$a."\"/>\n";
 }

//quick hidden form, id, key, value
function _qhf($a,$b,$c){
 _bfs($a);
 _bfih($b,$c);
 _bfe();
 }

//quick basic form, key, value, display text
function _qbf($a,$b,$c){
 _bfs();
 _bfih($a,$b);
 _bfis($c);
 _bfe();
 }

//quick basic form text, key, default text, default button
function _qbft($a,$b="",$c="Submit"){
 _bfs();
 _bfih("default".$a,$b);
 _bfit($a,$b);
 _bfis($c);
 _bfe();
 }



?>