<?php
class AuthModel extends Model
{
	function getBenutzerId($benutzername, $passwort)
	{
		$benutzername = $this->cn->real_escape_string($benutzername);
		$pw_verschluesselt = md5($passwort);
		
		$sql = "SELECT COUNT(*) AS Anzahl, id 
				FROM gb_benutzer 
		        WHERE benutzer = '$benutzername' 
		        AND	passwort = '$pw_verschluesselt'
				AND status = 1";
				
		// Fehlerüberprüfung		
		$ergebnis = $this->cn->query($sql);

		if(!$ergebnis) {
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return null;
		}
		return $ergebnis->fetch_assoc();
	}
}
?>




