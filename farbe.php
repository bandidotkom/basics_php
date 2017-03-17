<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Farbe</title>
	</head>

		<?php
		var_dump($_POST); // Testausgabe
		
		if (isset($_POST["farbe"])) // Skript über Formular aufgerufen??
		{
			$farbe = trim($_POST["farbe"]);
			
			if (preg_match("/^#([0-9a-f]{3}|[0-9a-f]{6})$/i",$farbe)) // auch Kurzschreibweise erlaubt
			{
				echo "<body style=\"background-color: $farbe;\">";
				echo "<h1>Farbe</h1>";
				echo "<p>Die eingegebene Farbe: $farbe</p>";
			}
			else
			{
				echo "<body>";
				echo "<p>Die Eingabe sollte ein gültiger RGB-Wert sein.</p>";
				echo "<p><a href=\"farbe.html\">zurück</a></p>";
			}
		}
		else
		{
			echo "<body>";
			echo "<p style=\"color:red\">Bitte rufen Sie zuerst das Formular auf.</p>\n";
			echo "<p><a href=\"farbe.html\">zurück</a></p>";
		}
		?>
	</body>
</html>