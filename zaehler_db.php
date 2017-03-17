<?php
//Datenbankbasierter Zugriffszaehler

//Verbindung aufbauen (durch ausgelagerte Datei)
require_once("configuration.php");
if(!$cn)
	die("Die Verbindung zur Datenbank ist fehlgeschlagen.");
//Zugriffe auslesen und anzeigen

$sql = "SELECT zugriffe FROM zaehler WHERE zaehler_id = 1";
$ergebnistabelle = mysqli_query($cn, $sql);
$anzZeilen = mysqli_num_rows($ergebnistabelle);
if($anzZeilen = 0){
	echo mysqli_error($cn);
}
$zeile = mysqli_fetch_assoc($ergebnistabelle);
$counter = $zeile["zugriffe"];
echo $counter;

//Zugriffe hochzaehlen und Datensatz aktualisieren
$counter += 1;
$akt = "UPDATE zaehler SET zugriffe = $counter WHERE zaehler_id = 1";
mysqli_query($cn, $akt);

?>