<?php
//Klasse für den Datenzugriff
class Model{

	protected $cn; //Datenbankverbindung
	private $error; 
	
	function __construct()
	{
	  require_once("connect.php");
	  $this->cn = $cn;
	  
	  if($this->cn->connect_errno)
					die ( "Keine Verbindung zur Datenbank moeglich: $this->cn->connect_error ($this->cn->connect_errno)");
			
			// Zeichensatz für Datenbankabfragen setzen
			// damit entfallen die utf8_encode-Aufrufe in den Templates
			$cn->set_charset("utf8"); 
	}

	function getError() {
		return $this->error;
	}	
	
	// Gibt alle Einträge zurück.
	public function getEntries()
	{
	$sql = 
		"SELECT Vorname, Nachname, Email,
		DATE_FORMAT(Zeitstempel,'%d.%m.%Y') AS Datum,
		DATE_FORMAT(Zeitstempel,'%H:%i:%s') AS Uhrzeit
		FROM verteiler
		ORDER BY Nachname ASC";
	$ergebnis = $this->cn->query($sql);
		if(!$ergebnis) {
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return null;
		}
		while($row = $ergebnis->fetch_assoc()){
		  $entries[] = $row;
		}
		return $entries;
	}


	function insertEntry($vorname, $nachname, $email)
	{		
		$sql = "INSERT verteiler 
			(vorname, nachname, email)
			VALUES ('$vorname', '$nachname', '$email')";
		$ergebnis = $this->cn->query($sql);
		
		if(!$ergebnis) // Fehlerüberprüfung
		{
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return false;
		}
		return true;
	}
	
	function getEmails()
	{
		//E-Mail-Adressen aus der Datenbank holen
		$sql = 
		"SELECT Email
		FROM verteiler";
		$ergebnis = $this->cn->query($sql);
		if(!$ergebnis) {
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return null;
		}
		while($row = $ergebnis->fetch_assoc()){
		  $emails[] = $row['Email'];
		}
		return $emails;
	}
}
?>