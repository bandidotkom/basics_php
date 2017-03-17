<?php
$zahl = 13;
if(setcookie("Testcookie",$zahl,time()+60*3))
	echo "Cookie wurde erfolgreich gesetzt.<br />";
?>
