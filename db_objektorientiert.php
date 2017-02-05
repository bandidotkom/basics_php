<?php
//1. Datenbankverbindung
$host = "usersql.zedat.fu-berlin.de";
$user = "komaromy-sql";
$pw = "d5xn44ky";
$db = "komaromy-db3";
$cn = new mysqli($host, $user, $pw, $db);
//2. 
$sql = "SELECT Artikelname FROM Artikel";
$result = $cn->query($sql);
//3.
while($row = $result->fetch_row())
{
	$artikel = $row[0];
	echo "$artikel<br />";
}
?>