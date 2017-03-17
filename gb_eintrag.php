<?php
//Authentifizierungs-Prüfung
session_start();
if(!isset($_SESSION['benutzer_id']))
	header("Location:gb_login.php");
$error[] = array();
if (isset($_POST["betreff"]) && isset($_POST["beitrag"]))
{
	$betreff = trim($_POST["betreff"]);
	$beitrag = trim($_POST["beitrag"]);
	
	//Fehlerueberpfuefung
	if($betreff == "")
		$error[] = "Bitte geben Sie ein Betreff ein.<br />";
	if($beitrag == "")
		$error[] = "Bitte geben Sie einen Beitrag ein.<br />";
	if(count($error) == 0)
	{
		//HTML; Anführungszeichen, Zeilenumbrüche umwandeln
		$betreff = htmlspecialchars($betreff);
		$beitrag = htmlspecialchars($beitrag);
		$beitrag = preg_replace("/(\r\n|\r|\n)/", "<br />", $beitrag);
		
		require_once("configuration.php");
		$betreff = mysqli_real_escape_string($cn, $betreff);
		$beitrag = mysqli_real_escape_string($cn, $beitrag);
		$benutzer_id = $_SESSION['benutzer_id'];
		
		//Neuen Beitrag in die Datenbank schreiben
		$sql = "INSERT gb_gaestebuch
				(benutzer_id, betreff, beitrag)
				VALUES ('$benutzer_id', '$betreff', '$beitrag')";
		echo $sql;
		mysqli_query($cn, $sql);
		echo mysqli_error($cn);
		header("Location:gb_gaestebuch");
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
		<form action="gb_eintrag.php" method="post">
			Betreff:
			<input type="text" name="betreff" /><br />
			Beitrag:<br />
			<textarea name="beitrag" maxlenght="500"></textarea>
						
			<input type="submit" value="Absenden"/>
		</form>
	</body>
</html>