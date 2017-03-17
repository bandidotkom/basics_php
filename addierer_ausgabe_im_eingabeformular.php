<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Addierer</title>
	</head>
	<body>
		<h1>Addierer</h1>
		<p>Bitte geben Sie die Zahlen ein, die Sie addieren möchten:</p>
		
		<form action="addierer_ausgabe_im_eingabeformular.php" method="post">
			Zahl 1<input type="text" name="zahl1" /><br />
			Zahl 2<input type="text" name="zahl2" /><br />
			<input type="submit" value="Addieren"/>
		</form>
		
		<?php
		if (isset($_POST["zahl1"]) && isset($_POST["zahl2"]))
		{
			$z1 = $_POST["zahl1"];
			$z2 = $_POST["zahl2"];
			$z1 = trim($z1); // Leerzeichen löschen
			$z2 = trim($z2);
			
			if(is_numeric($z1) && is_numeric($z2)) // beide Eingaben Zahlen
			{
				$sum = $z1 + $z2;
				echo "<p>$z1 + $z2 = $sum</p>";
			}
			else
			{
				echo "<p style=\"color: red\">Bitte geben Sie Zahlen ein.</p>";
				echo "<a href=\"addierer.html\">zurück zum Addierer</a>";
			}
		}
		?>
	</body>
</html>