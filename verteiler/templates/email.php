<h2>E-Mail schicken</h2>
<?php
if(isset($this->_['fehler']))
  echo "<p style=\"color:red\">" . $this->_['fehler'] . "</p>";
?>
<form action="index.php?view=email" method="post">
  Betreff:
  <input type="text" name="betreff" 
  <?php
  if(isset($this->_['form']))
  {
    $betreff = $this->_['form']->getField("betreff")->getValue();
    echo " value=\"$betreff\" " ;
  }
  ?>  
  /><br />
	<br />
  Nachricht (max. 500 Zeichen):<br />
  <textarea name="nachricht" maxlength="500"></textarea>
  <br />
  <input type="submit" value="E-Mail schicken" />
</form>