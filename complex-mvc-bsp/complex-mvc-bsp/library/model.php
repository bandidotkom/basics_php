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

}
?>