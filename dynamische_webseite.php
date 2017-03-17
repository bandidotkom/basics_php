<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Dynamische Webseite</title>
	</head>
	<body>
		<h1>Dynamische Webseite</h1>
		<p>Dynamische Webseiten haben die Endung php<br />
		und werden vom Webserver geparst bevor sie<br />
		an den Browser geschickt werden.</p>
		<?php
			$x = 10;
			echo "Die Variable x enthält eine: $x\n";
			
			$datum = date("d.m.Y H:i:s");
			echo "<p>Datum und Uhrzeit: $datum</p>";
		?>
		<p>Ein relativer Hyperlink
			<a href="statische_webseite">zur statischen Webseite</a>
		</p>
	</body>
</html>