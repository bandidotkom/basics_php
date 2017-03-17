
<?php
$fehler = "";
if (isset($_POST["benutzername"]) && isset($_POST["beitrag"])) // oder: isset($_POST["benutzername"],$_POST["beitrag"])
{
	$benutzername = trim($_POST["benutzername"]);
	$beitrag = trim($_POST["beitrag"]);
	
	//Fehlerueberpfuefung
	if($benutzername == "")
		$fehler = "Bitte geben Sie einen Namen ein.<br />";
	if($beitrag == "")
		$fehler = $fehler."Bitte geben Sie einen Beitrag ein.<br /<"; // kuerzer:  .= "...";
	//Benutzername, Beitrag und Zeitstempel in Datei speichern
	//ein Beitrag pro Zeile, Trennzeichen ::
	if($fehler =="")
	{
		$zeitstempel = date("d.m.Y H:i:s");
		$benutzername = htmlspecialchars($benutzername);
		$benutzername = preg_replace("/::/",";;",$benutzername);
		$beitrag = htmlspecialchars($beitrag);
		$beitrag = preg_replace("/::/",";;",$beitrag);
		$beitrag = preg_replace("/(\r\n|\r|\n)/","<br />",$beitrag);
		
		file_put_contents(
			"gaestebuch.txt",
			"$benutzername::$beitrag::$zeitstempel\n",
			FILE_APPEND); // Dateianlegerechte pruefen
		//Weiterleitung
		header("Location:gaestebuch.php");
	}
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Neuer Gästebuch Beitrag</title>
	</head>
	<body>
		<h1>Neuer Gästebuch Beitrag</h1>
		<?php
			if($fehler != "")
				echo "<p style=\"color:red;\">$fehler</p>";
		?>
		<form action="gaestebuch_beitrag.php" method="post">
			Benutzername:<input type="text" name="benutzername" /><br />
			Beitrag:<br /><textarea name="beitrag"></textarea>
						
			<input type="submit" value="Absenden"/>
		</form>
		
	</body>
</html>