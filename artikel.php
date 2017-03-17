<?php

//Formularauswertung
if(isset($_POST["preisfilter"]))
{
	$preisfilter = $_POST["preisfilter"];
	if($preisfilter == "billig")
		$filter = "AND Einzelpreis < 50.0";
	else
		if($preisfilter == "moderat")
			$filter = "AND (Einzelpreis BETWEEN 50.0 AND 100.0)";
		else
			$filter = "AND Einzelpreis > 100.0";
}
//1. Verbindung aufbauen (durch ausgelagerte Datei)
require_once("configuration.php");

if(!$cn)
	die("Die Verbindung zur Datenbank ist fehlgeschlagen.");

//2. SQL-Statement formulieren
$sql = "SELECT Artikelname, Einzelpreis, L.Firma AS Lieferant, L.Land FROM Artikel A, Lieferanten L WHERE L.LieferantenNr = A.LieferantenNr ".$filter." ORDER BY Einzelpreis";
$ergebnistabelle = mysqli_query($cn, $sql);
//Fehlerausgabe
if(!$ergebnistabelle)
	echo mysqli_error($cn);

//Ausgabe
?>
<h2>Preisfilter</h2>
<form action="artikel.php" method="post">
billig
<input type="radio" value="billig" name="preisfilter" />
moderat
<input type="radio" value="moderat" name="preisfilter" />
teuer
<input type="radio" value="teuer" name="preisfilter" />
<input type="submit" value="Filtern" />
</form>
<?php
//3. Abfrage-Ergebnis ausgeben
echo "<table border=\"1\">";
//Spalten
echo "<tr>";
while($field = mysqli_fetch_field($ergebnistabelle))
	{
	$spaltenname = $field->name; //kein Array, sondern Objekt
	echo"<th>$spaltenname</th>";
	}
echo "</tr>";
//Zeilen
while($zeile = mysqli_fetch_assoc($ergebnistabelle))
{
	$artikelname = $zeile["Artikelname"];
	$einzelpreis = $zeile["Einzelpreis"];
	$firma = $zeile["Lieferant"];
	$land = $zeile["Land"];
	echo "<tr>";
		echo"<td>$artikelname</td>";
		echo"<td>$einzelpreis</td>";
		echo"<td>$firma</td>";
		echo"<td>$land</td>";
	echo "</tr>";
}
?>
</table>
