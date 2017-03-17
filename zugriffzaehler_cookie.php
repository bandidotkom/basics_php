<?php
$zaehler = 1;
if(file_exists("zaehler_cookie.txt"))
{
	$zaehler=file_get_contents("zaehler_cookie.txt");
}
echo "<p>Sie sind der $zahler-te Besucher auf der Seite</p>";

//nur hochzaehlen und schreiben, wenn Cookie nicht da
if(!isset($_COOKIE["Besucher"]))
{
	setcookie("Besucher",$zaehler,time()+60<+60*24);
	$zaehler++;
	file_put_contents("zaehler_cookie.txt",$zaehler);
}

?>