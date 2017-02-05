<?php
session_start();
// session_destroy();
// session_nuset();

$error = array();
if(isset($_POST['benutzername'], $_POST['passwort']))
{
	$benutzername = trim($_POST['benutzername']);
	$passwort = trim($_POST['passwort']);

	
	//Wenn alle Felder  nicht leer
	if($benutzername == "")
		$error[] = "Benutzernamen eingeben";
	if($passwort == "")
		$error[] = "Passwort eingeben";
	if(count($error) == 0)
	{
		//1. Verbindung aufbauen (durch ausgelagerte Datei)
		require_once("configuration.php");
		if(!$cn)
			die("Die Verbindung zur Datenbank ist fehlgeschlagen.");
		
		$benutzername = mysqli_real_escape_string($cn, $benutzername);
		$pw_verschluesselt = md5($passwort);
		$sql = "SELECT COUNT(*) AS anzahl, id
				FROM gb_benutzer
				WHERE benutzer = '$benutzername'
				AND passwort = '$pw_verschluesselt'
				AND status = 1";
		$ergebnis = mysqli_query($cn, $sql);
		echo mysqli_error($cn);
		
		$row = mysqli_fetch_assoc($ergebnis);
		$anzahl = $row['anzahl'];
		if($anzahl > 0)
		{
			$id = $row['id'];
			$_SESSION['benutzer_id'] = $id;
			header("Location:gb_eintrag.php");
		}
		else
		{
			$error[] = "ungültiger Benutzer oder ungültiges Passwort";
		}
	}
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Gästebuch Log-in</title>
	</head>
<body>
<h1>Gästebuch Log-in</h1>
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
<form action="gb_login.php" method="post">
Benutzername
<input type="text" name="benutzername" maxlength="30" />
<br />

Passwort
<input type="password" name="passwort" maxlength="32" />
<br />

<input type="submit" value="Einloggen" />
</form>

</body>
</html>