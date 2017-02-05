<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Summe</title>
</head>
<body>

<h1><?php echo $this->_['blog_title']; ?></h1>
<p>
	<a href="index.php?view=insert">Neuer Gästebucheintrag</a>
</p>
<?php //Fehlerausgabe
if(isset($this->_['blog_error']))
	echo "<p style=\"color:red\">" . $this->_['blog_error'] . "</p>";
 ?>
<?php echo $this->_['blog_content']; ?>
<hr />
<?php echo $this->_['blog_footer']; ?>
</body>
</html>