<?php
if(empty($_POST['vorname']) || empty($_POST['nachname']) || empty($_POST['matrikelnr'])){
	echo "<p>Sie muessen alle drei Feder ausfuellen!</p>";
}
else{
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
	$matrikelnr = $_POST['matrikelnr'];
	echo "<p>$vorname, $nachname ($matrikelnr)</p>";
}	

?>