<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Verteiler</title>
    <link rel='stylesheet' type='text/css' href='templates/style.css' />
 </head>
<body>
<div id="container">
<!-- Menue -->
<p>
<a href="index.php?page=verteiler&view=ansicht">Verteiler</a> |
<a href="index.php?page=verteiler&view=eintrag">Neuer Eintrag</a> |
<a href="index.php?page=verteiler&view=email">E-Mail schicken</a>
<hr />
</p>
<!-- Ende Menue -->
<h1><?php echo $this->_['verteiler_title']; ?></h1>

<?php echo $this->_['verteiler_content']; ?>
<hr />
<?php echo $this->_['verteiler_footer']; ?>
</div>
</body>
</html>