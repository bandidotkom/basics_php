<?php
$zeilen = file("studenten.txt");
echo "<ul>";
foreach($zeilen as $zeile)
{
	if(preg_match("/^3/", $zeile))
	{
		$daten = preg_split("/,/", $zeile);
		echo "<li>$daten[3]</li>";
	}
}
echo "</ul>";
?>