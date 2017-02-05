<?php
//Registrierungsformular

if(isset($_GET['confirm']))
{
	$benutzername = $_GET['benutzer'];
	$confirmationcode = $_GET['code'];
	//1. Verbindung aufbauen (durch ausgelagerte Datei)
	require_once("configuration.php");
	if(!$cn)
		die("Die Verbindung zur Datenbank ist fehlgeschlagen.");
	//2. SQL-Statement (setzt Status auf 1)
	$sql = "UPDATE gb_benutzer SET status = '1' WHERE benutzer = '$benutzername' AND confirmationcode = '$confirmationcode'";
	mysqli_query($cn, $sql);
	
	//Weiterleitung 
}

//var_dump($_POST);
$error = array();
if(isset($_POST['benutzername'], $_POST['email'], $_POST['passwort'], $_POST['passwortbestaetigung']))
{
	$benutzername = $_POST['benutzername'];
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	$passwortbestaetigung = $_POST['passwortbestaetigung'];
	
	//Wenn alle Felder  nicht leer
	if($benutzername =="")
		$error[] = "Benutzernamen eingeben";
	if($email =="")
		$error[] = "E-Mail eingeben";
	if($passwort =="")
		$error[] = "Passwort eingeben";
	if($passwortbestaetigung =="")
		$error[] = "Passwort bestätigen";
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		$error[] = "Keine gültige E-Mail-Adresse";
	if($passwort != $passwortbestaetigung)
		$error[] = "Die Passwörter stimmen nicht überein.";
	if(count($error) == 0)
	{
		//Passwort verschluesseln
		$verschluesseltes_passwort = md5($passwort);
	
		//Benutzer-IP ermitteln
		$ip = $_SERVER["REMOTE_ADDR"];
		
		//Bestaetigungscode generieren
		$confirmationcode = md5($benutzername.$ip);
		
		//1 Verbindung aufbauen (durch ausgelagerte Datei)
		require_once("configuration.php");
		if(!$cn)
			die("Die Verbindung zur Datenbank ist fehlgeschlagen.");
		//2. SQL-Statement abschicken
		$sql_eintrag = "INSERT gb_benutzer (benutzer, email, passwort, confirmationcode) VALUES ('$benutzername', '$email', '$verschluesseltes_passwort', '$confirmationcode')";
		mysqli_query($cn, $sql_eintrag);
		//3. Fehler überprüfen
		$betr_zeilen = mysqli_affected_rows($cn); //-1 im Fehlerfall (doppelter Benutzername)
		if($betr_zeilen < 0)
		{
			$error[] = "Der Benutzername ist bereits vorhanden.";
		}
		else // Kein Fehler
		{
		//Bestaetigungslink generieren
		$url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$confirmationlink = $url."?confirm&benutzer=$benutzername&code=$confirmationcode";
		//Umlaute in der E-Mail richtig darstellen
		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/plain; charset=utf8' . "\r\n";
		//E-Mail senden (Adressat, Betreff, Nachricht, Mail-Header)
		mail($email,
			"Gästebuch Registrierung",
			"Sie wurden erfolgreich für unser Gästebuch registriert. Bitte aktivieren Sie ihren Account mit
			folgendem Link: $confirmationlink",
			$header
			);
		}
	}//Ende count($error)
}//Ende isset

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registrierung</title>
	</head>
<body>
<?php
//Fehlerausgabe
	if(count($error) != 0)
	{
		echo "<p style=\"color: red\">";
		for($i=0; $i<count($error); $i++)
			echo $error[$i] . "<br />";
		echo "</p>";
	}

?>
<form action="gb_register.php" method="post">
Benutzername
<input type="text" name="benutzername" maxlength="30" />
<br />
E-Mail
<input type="text" name="email" maxlength="40" />
<br />
Passwort
<input type="password" name="passwort" maxlength="32" />
<br />
Passwortbestätigung
<input type="password" name="passwortbestaetigung" maxlength="32" />
<br />
<input type="submit" value="Registrieren" />
</form>

</body>
</html>
