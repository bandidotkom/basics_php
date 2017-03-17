<?php
if(isset($_POST['bewertung']))
{
	$bewertung = $_POST['bewertung'];
	$beitrag_id = $_POST['beitrag_id'];
	//1. Verbindung zur Datenbank aufbauen (durch externe Datei)
	require_once("configuration.php");
	if(!$cn)
		die("Die Verbindung zur Datenbank ist fehlgeschlagen.");
	//2. Daten der Rating-Tabelle abfragen
	$sql = "SELECT beitrag_id, anzahl, summe
			FROM rating
			WHERE beitrag_id = $beitrag_id";
	$ergebnistabelle = mysqli_query($cn, $sql);
	$anzZeilen = mysqli_num_rows($ergebnistabelle);
	$zeile = mysqli_fetch_assoc($ergebnistabelle);
	//wenn Beitrag noch nicht bewertet, Datensatz einfügen
	if($anzZeilen==0)
	{
	$counter = 1;
	$sum = $bewertung;
	$sql_einfuegen = "INSERT rating (beitrag_id, anzahl, summe)
					VALUES ($beitrag_id, $counter, $sum)";
	$ergebnistabelle = mysqli_query($cn, $sql_einfuegen);
	}
	//wenn Beitrag schon bewertet, Datensatz aktualisieren
	else
	{
	$counter = $zeile["anzahl"];
	$sum = $zeile["summe"];
	//Anzahl und Summe hochzaehlen
	$counter += 1;
	$sum += $bewertung;
	$sql_akt = "UPDATE rating
				SET anzahl = $counter, summe = $sum
				WHERE beitrag_id = $beitrag_id";
	$ergebnistabelle = mysqli_query($cn, $sql_akt);
	}
	
	//durchschnittliche Punktezahl der Bewertungen berechnen und in die Datenbank schreiben
	$durchschn_bewertung = round($sum/$counter);
	$sql = "UPDATE gb_gaestebuch
			SET durchschn_bewertung = $durchschn_bewertung
			WHERE id = $beitrag_id";
	mysqli_query($cn, $sql);
	header('Location:gb_gaestebuch.php');
}

?>