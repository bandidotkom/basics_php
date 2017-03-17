<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

<?php


if (isset($_POST["Stil"]))
{
	$stil = $_POST["Stil"];
	echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"$stil.css\" />";
	setcookie("styleswitcher", $stil, time()+60*60*24*30);
}

else
{
if (isset($_COOKIE["styleswitcher"]))
{
	$stil = $_COOKIE["styleswitcher"];
	echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"$stil.css\" />";
}
else
{
	echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"black.css\" />";
}
}
?>

<title>Style-Switcher</title>
</head>
	<body>
		<h1>Style-Switcher</h1>
	<form action="style_switcher.php" method="post">
	<p>Wählen Sie einen Stil:</p>
	<select name="Stil">
		<option value="pink">Pink</option>
		<option value="black">Black</option>
	</select>
	<input type="submit" value="Los!" />
	</form>

</html>
