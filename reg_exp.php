<?php

$var1 = "239"; // Formulareingabe
if(preg_match("/(^1[1-9][0-9]$)|(^2[0-3][0-9]$)|(^24[0-8]$)/",$var1)) //Zahl zwischen 110 und 248
{
	echo "Richtig";
}
else
{
	echo "Falsch";
}

echo "<br />";

$var2 = "255.255.255.255";
if(preg_match("/^(((([0-9])|([1-9][0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9])|([1-9][0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5])))$/",$var2))
//Eingabe eine IP-Adresse (IPv4, d.h.: vier punktseparierte Teile, die die Werte 0 bis 255 annehmen können)
{
	echo "Richtig";
}
else
{
	echo "Falsch";
}

?>