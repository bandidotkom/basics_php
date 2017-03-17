<h2>Login</h2>
<?php
if(isset($this->_['fehler']))
  echo "<p style=\"color:red\">" . $this->_['fehler'] . "</p>";
?>
<form action="index.php?page=auth&view=login" method="post">
  Benutzername:
  <input type="text" name="benutzername" /><br />
 
  Passwort:<br />
  <input type="password" name="passwort" /><br />
  <br />
  <input type="submit" />
</form>