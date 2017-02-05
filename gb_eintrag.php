<?php
//Authentifizierungs-Prüfung
require_once("field_validator.class.php");
require_once("form_validator.class.php");

session_start();
if(!isset($_SESSION['benutzer_id']))
	header("Location:gb_login.php");
	
$form;
$error = array();
if (isset($_POST["betreff"]) && isset($_POST["beitrag"]))
{
	$betreff = $_POST["betreff"];
	$beitrag = $_POST["beitrag"];
	
	//Fehlerüberprüfung mit den Validator-Klassen
	$form = new FormValidator(array(new FieldValidator("Betreff", $betreff, FieldType::String),
									new FieldValidator("Beitrag", $beitrag, FieldType::String)));
	//Alle Feldeingaben d.h. Formular gültig?
	if($form->isValid())
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
		<?php
		//Wenn Fehler im Formular
		if(isset($form) && $form->isValid() == false)
		{
			echo "<p style=\"color:red\">";
			echo $form->getErrors();
			echo "<p>";
		}
		?>
		<form action="gb_eintrag.php" method="post">
			Betreff:
			<input type="text" name="betreff" /><br />
			Beitrag:<br />
			<textarea name="beitrag" maxlenght="500"></textarea>
						
			<input type="submit" value="Absenden"/>
		</form>
	</body>
</html>