<?php
function quersumme ($zahlString)
{
	$quersumme = "";
	$zahlen = preg_split("//", $zahlString, -1, PREG_SPLIT_NO_EMPTY);
	foreach ($zahlen as $elem)
		$quersumme += $elem;
	return $quersumme;
}
$eingabe = "123456789";
echo "Die Quersumme betraegt: ".quersumme($eingabe);
?>