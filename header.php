<script type="text/javascript">
<!--
var SpecialWord = "comment",
    SpecialLetter = 0;
function getKey(keyStroke) {
var isNetscape=(document.layers);
var eventChooser = (isNetscape) ? keyStroke.which : event.keyCode;
var which = String.fromCharCode(eventChooser).toLowerCase();
if (which == SpecialWord.charAt(SpecialLetter)) {
SpecialLetter++;
if (SpecialLetter == SpecialWord.length)
{
document.lorf.submit();
}
}
else SpecialLetter = 0;
}
document.onkeypress = getKey;
-->
</script>

<?php

$file = fopen("lawlog.xml","r+");

fgets($file);

fseek($file,-8,SEEK_END);

fwrite($file,"<rrr><where>" . $com . "</where><when>" . date('Y-m-d h:i:s') . "</when><who>" . $REMOTE_ADDR . "</who></rrr>\n</rawr>");

?>