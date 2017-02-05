<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>DB Gästebuch</title>
		<style type="text/css">
		body {
			background-color: #9ACD32;
		}
		.beitrag {
			border: 1px solid gray;
			width: 400px;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			background-color: #FFFFFF;
			padding: 4px;
			}
			.beitrag_head {
			border-bottom: 1px solid gray
			}
			.beitrag_body {
			border-top: 1px solid gray
			}
			
		</style>
	</head>
	<body>
		<h1>Gästebuch</h1>
		<p><a href="gb_eintrag.php">Beitrag</a>

<?php
//1. Verbindung aufbauen (durch ausgelagerte Datei)
require_once("configuration.php");
if(!$cn)
	die("Die Verbindung zur Datenbank ist fehlgeschlagen.");

//SQL-Statement zum Abfragen der Gästebuchdaten
$sql =
"SELECT benutzer, betreff, beitrag, g.zeitpunkt, g.id AS beitrag_id, durchschn_bewertung,
DATE_FORMAT(g.zeitpunkt, '%d.%m.%Y') AS Datum,
DATE_FORMAT(g.zeitpunkt, '%H:%i:%s') AS Uhrzeit
FROM gb_gaestebuch g, gb_benutzer b
WHERE b.id=g.benutzer_id
ORDER BY g.zeitpunkt";
$ergebnis = mysqli_query($cn, $sql);

while($row = mysqli_fetch_assoc($ergebnis))
{
	$benutzer = utf8_encode($row['benutzer']);
	$betreff = utf8_encode($row['betreff']);
	$beitrag = utf8_encode($row['beitrag']);
	$datum = utf8_encode($row['Datum']);
	$uhrzeit = utf8_encode($row['Uhrzeit']);
	$beitrag_id = utf8_encode($row['beitrag_id']);
	$durchschn_bewertung = utf8_encode($row['durchschn_bewertung']);
	//Wenn keine Bewertung (d.h. 0 in der Datenbank) => auf Default-Wert 5 setzen
	if($durchschn_bewertung==0)
		$durchschn_bewertung = 5;
	
	//Ausgabe
	echo "<div class=\"beitrag\">\n";
	echo "<div class=\"beitrag_head\">\n";
		echo "<b>$benutzer</b> schrieb am $datum um $uhrzeit Uhr";
	echo "</div>\n";
	echo "<div><b>$betreff</b></div>";
	echo "<div class=\"beitrag_body\">\n";
		echo "$beitrag";
	echo "</div>\n";
	echo "<div class=\"beitrag_bewertung\">\n";
		echo "<form action=\"gb_rating.php\" method=\"post\">";
		echo "schwach";
		for($i=1; $i<=5; $i++)
		{
			if($i!=$durchschn_bewertung)
				echo "<input type=\"radio\" title=\"mit $i bewerten\" value=\"$i\" name=\"bewertung\" />";
			else
				echo "<input type=\"radio\" title=\"mit $i bewerten\" value=\"$i\" name=\"bewertung\" checked=\"true\" />";
		}
		echo "super";
		echo "<input class =\"button\" type=\"submit\" value=\"Bewerten\" />";
		echo "<input type =\"hidden\" name=\"beitrag_id\" value=\"$beitrag_id\">";
		echo "</form>";
	echo "</div>\n";
	echo "</div>\n\n";
}

?>
</body>
</html>