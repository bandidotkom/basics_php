<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Gästebuch</title>
		<style type="text/css">
		body {
			background-color: #9ACD32;
		}
		.beitrag {
			border: 1px solid gray;
			width: 400px;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			background-color: #FFFFFF;
			padding: 4px;
			}
			.beitrag_head {
			border-bottom: 1px solid gray
			}
		</style>
	</head>
	<body>
		<h1>Gästebuch</h1>
		<p><a href="gaestebuch_beitrag.php">Beitrag</a>
		<?php
			//include("gaestebuch.txt");
			$zeilen = file("gaestebuch.txt");
			//Eine Lösung für die umgekehrte Reihenfolge: $zeilen_rev = array_reverse($zeilen);
			//Alternativ: mit umgekehrter for-Schleife
			for($i=count($zeilen)-1; $i>=0; $i--)
			{
				$zeile = $zeilen[$i];
				//Zeile zerschneiden
				$infos = explode("::", $zeile);
				$benutzer = $infos[0];
				$beitrag = $infos[1];
				$zeitstempel = $infos[2];
				//Zeitstempel zerlegen
				$datum_uhrzeit = explode(" ",$zeitstempel);
				$datum = $datum_uhrzeit[0];
				$uhrzeit = $datum_uhrzeit[1];
				//einfachere Lösung mit Sammelzuweisung
				//list($datum, $uhrzeit) = explode(" ",$zeitstempel);
				
				//Ausgabe
				echo "<div class=\"beitrag\">\n";
				echo "<div class=\"beitrag_head\">\n";
					echo "<b>$benutzer</b> schrieb am $datum um $uhrzeit Uhr";
				echo "</div>\n";
				echo "<div>";
					echo "$beitrag";
				echo "</div>\n";
				echo "</div>\n\n";
			}
		?>
	</body>
</html>