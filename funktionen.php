<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<?php
/*1. Funktion: buildLink
 *Die Funktion erhält eine URL und einen
 *Text und gibt einen daraus zusammen-
 *gesetzten Hyperlink zurück.
 *Parameter: string $url, string $text
 *Rückgabe: string (Hyperlink)
*/
	function buildLink($url, $text)
	{
		if(!preg_match("/^http/", $url))
			{
			$url = "https://".$url;
			}
		return "<a href=\"".$url."\">".$text."</a>";
	}
	$link = buildLink("https://www.google.de", "Zu Google");
	echo $link;
	echo "<br />";
	$link2 = buildLink("www.google.de", "Zu Google");
	echo $link2;

/*2. Funktion: Wortzähler
 *Die Funktion erhält einen String mit einem Satz
 *und gibt die Anzahl der Wörter im Satz zurück.
 */
	function wortzaehler($satz)
	{
		$satzListe = explode(" ",$satz);
		return count($satzListe);
	}
	$anzahlWoerter = wortzaehler("Das ist das Haus vom Nikolaus");
	echo "<br />Die Anzahl der Wörter im Satz beträgt: ".$anzahlWoerter;
?>
	</body>
</html>