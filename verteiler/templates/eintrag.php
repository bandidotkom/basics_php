<h2>Neuer Eintrag</h2>
<?php
if(isset($this->_['fehler']))
  echo "<p style=\"color:red\">" . $this->_['fehler'] . "</p>";
?>
<form action="index.php?view=eintrag" method="post">
  Vorname:
  <input type="text" name="vorname"  /><br />
  Nachname:
    <input type="text" name="nachname" /><br />
  E-Mail:
    <input type="text" name="email" /><br />

	<br />

  <input type="submit" value="in den Verteiler eintragen"/>
</form>