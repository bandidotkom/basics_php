<h2>Neuer Gästebucheintrag</h2>
<?php
if(isset($this->_['fehler']))
  echo "<p style=\"color:red\">" . $this->_['fehler'] . "</p>";
?>
<form action="index.php?view=insert" method="post">
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
 
  Beitrag:<br />
  <textarea name="beitrag" maxlength="500"></textarea>
  <br />
  <input type="submit" />
</form>