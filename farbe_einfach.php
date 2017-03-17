<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Farbe</title>
</head>
<?php
	var_dump($_POST);

	if (isset($_POST["farbe"])){
	
		$farbe = trim($_POST["farbe"]);
		echo"<body style=\"background-color:$farbe;\">";
		echo"<p>Die eingegebene Farbe: $farbe </p>";
	}
	else{
		echo"<body><p style=\"color:red\">Fehler</p>";
		echo"<p> Füllen Sie zuerst das Formular aus. </p>";
		echo"<a href=\"farbe_einfach.html\">zum Formular</a>";
	}
?>
</body>
</html>