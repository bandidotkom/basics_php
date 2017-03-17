<?php
//Cookie lesen
if (isset ($_COOKIE["Testcookie"]))
	echo $_COOKIE["Testcookie"];
else
	echo "<p>Cookie nicht vorhanden</p>";
?>