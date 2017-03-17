<?php
$lines = file("aufwaerts.txt");
$rev_lines = array_reverse($lines);
foreach($rev_lines as $line)
{
	$daten = preg_split("/,/",$line);
	$matr = preg_replace("/\r|\n/s", "", $daten[2]);
	$nachn = $daten[0];
	$vorn = $daten[1];
	$line = "$matr,$nachn,$vorn\n";
	file_put_contents("abwaerts.txt", $line, FILE_APPEND);
}
?>