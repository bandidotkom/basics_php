<?php
	$zahlen = array(1, 3, 7, 8, 0, 6, 2);
	echo "Das 3. Element: ".$zahlen[2]."<br />"; //Ausgabe: 7
	//2 austauschen durch 4
	$zahlen[6] = 4;
	//neues Element hinzufügen
	$zahlen[] = 9;
	$anzahl = count($zahlen);
	echo "Anzahl der Elemente: $anzahl";
	//alle Elemente ausgeben
	echo "<br />";
	echo "$zahlen[0]<br />";
	echo "$zahlen[1]<br />";
	echo "$zahlen[2]<br />";
	echo "$zahlen[3]<br />";
	echo "$zahlen[4]<br />";
	echo "$zahlen[5]<br />";
	echo "$zahlen[6]<br />";
	echo "$zahlen[7]<br />";
	//schnelle Variante fuer die Ausgabe aller Elemente (dump)
	echo "<br />";
	print_r($zahlen);
	echo "<br />";
	//Ausgabe mit Hilfe einer for-Schleife
	for ($i=0; $i<count($zahlen); $i++)
	{
		echo "Element $i: $zahlen[$i]<br />";
	}
	$nelhaz = array_reverse($zahlen);
	print_r($nelhaz);
	echo "<br />";
	//explode - include
	$datum = "31.07.2014";
	$infos = explode(".",$datum);
	print_r($infos);
	echo "<br />";
	$zusammengesetzt=implode("-",$infos);
	echo "$zusammengesetzt<br />";
?>