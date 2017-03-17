<p> Die folgende Tabelle enthält alle bisher eingetragenen Mitglieder des Mail-Verteilers nach Nachnamen sortiert.</p>
<p> Falls Sie sich neu eintragen wollen, klicken Sie hier: <a href="index.php?page=verteiler&view=eintrag">Neuer Eintrag</a> </p>
<p> Wenn Sie eine Mail an alle schicken möchten, dann klicken Sie hier: <a href="index.php?page=verteiler&view=email">E-Mail</a> </p>
<table border ="1">
<tr style="background-color:red; color:black">
	<td>Vorname</td>
	<td>Nachname</td>
	<td>E-Mail-Adresse</td>
	<td>Eintragung am</td>
	<td>...um</td>
</tr>
<?php
if(isset($this->_['entries'])){
  foreach($this->_['entries'] as $entry){

  echo"<tr>";
	echo"<td>".$entry['Vorname']."</td>";
	echo"<td>".$entry['Nachname']."</td>";
	echo"<td>".$entry['Email']."</td>";
	echo"<td>".$entry['Datum']."</td>";
	echo"<td>".$entry['Uhrzeit']."</td>";
  echo"</tr>";
  } // end foreach
  echo"</table>";
} // end isset
?>