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
	
	// Gibt alle Einträge des Blogs zurück.
	public function getEntries()
	{
	  $sql = 
		"SELECT g.id AS id, benutzer, 
		betreff AS title, beitrag AS content,
		g.zeitpunkt,
		DATE_FORMAT(g.zeitpunkt,'%d.%m.%Y') AS Datum,
		DATE_FORMAT(g.zeitpunkt,'%H:%i:%s') AS Uhrzeit
		FROM gb_gaestebuch g, gb_benutzer b
		WHERE b.id = g.benutzer_id
		ORDER BY g.zeitpunkt DESC";
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

	// Gibt einen bestimmten Eintrag oder wenn dieser nicht vorhanden ist, 
	// null zurück.
	public function getEntry($id){
	  $sql = 
		"SELECT g.id AS id, benutzer, 
		betreff AS title, beitrag AS content, g.zeitpunkt,
		DATE_FORMAT(g.zeitpunkt,'%d.%m.%Y') AS datum,
		DATE_FORMAT(g.zeitpunkt,'%H:%i:%s') AS uhrzeit
		FROM gb_gaestebuch g, gb_benutzer b
		WHERE b.id = g.benutzer_id
		AND g.id = $id";
		$ergebnis = $this->cn->query($sql);
		if(!$ergebnis)
		{
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return null;
		}
		return $ergebnis->fetch_assoc();	
	}
	
	function insertEntry($benutzer_id, $betreff, $beitrag)
	{
		$betreff = $this->cn->real_escape_string($betreff);
		$beitrag = $this->cn->real_escape_string($beitrag);
		
		$sql = "INSERT gb_gaestebuch 
			(benutzer_id, betreff, beitrag)
			VALUES ('$benutzer_id', '$betreff', '$beitrag')";
		$ergebnis = $this->cn->query($sql);
		
		if(!$ergebnis) // Fehlerüberprüfung
		{
			$this->error = "SQL-Fehler: " . $this->cn->error;
			return false;
		}
		return true;
	}
}
?>