<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gästebuch</title>
    <link rel='stylesheet' type='text/css' href='templates/style.css' />
 </head>
<body>
<div id="container">
<!-- Menue -->
<p>
<a href="index.php?page=gaestebuch&view=default">Gästebuch</a> |
<a href="index.php?page=gaestebuch&view=insert">Neuer Eintrag</a>
</p>
<!-- ende Menue -->
<h1><?php echo $this->_['blog_title']; ?></h1>
<?php // Fehlerausgabe
if(isset($this->_['blog_error']))
  echo "<p style=\"color:red\">" .
       $this->_['blog_error'] .
	   "</p>";
?>
<?php echo $this->_['blog_content']; ?>
<hr />
<?php echo $this->_['blog_footer']; ?>
</div>
</body>
</html>