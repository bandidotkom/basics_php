<?php
//Klasse Person
class Person
{
//Attribute (Felder)
	public $vorname;
	public $nachname;
	private $geburtsdatum;
//Magische Funktion: Parameter-Konstruktor
	function __construct($vorname, $nachname, $geburtsdatum)
	{
		$this->vorname = $vorname;
		$this->nachname = $nachname;
		$this->geburtsdatum = $geburtsdatum;		
	}
	function __toString()
	{
		return "$this->vorname $this->nachname $this->geburtsdatum";
	}
	
	function setGeburtsdatum($geburtsdatum)
	{
		//Überprüfungen
		list($tag, $monat, $jahr) = explode(".", $geburtsdatum);
		if($tag < 1 || $tag > 31 || $monat < 1 || $monat > 12)
		{	
			echo "Kein gueltiges Geburtsdatum!";
			return;
		}
		$this->geburtsdatum = $geburtsdatum;	
	}
	
	function getGeburtsdatum()
	{
		return $this->geburtsdatum;
	}
}
//Objektinstanz
$pers1 = new Person("Gundel", "Gaukel", "03.09.1980");
$pers2 = new Person("Dagobert", "Duck", "10.02.1951");
$pers3 = new Person("Gaby", "Wiedemann", "03.03.1970");

$personen = array($pers1, $pers2, $pers3);
for($i=0; $i<count($personen); $i++)
{
	echo $personen[$i]->__toString()."<br />";
}
//alternativ
foreach($personen as $temp)
{
	echo $temp->__toString()."<br />";
}

// $pers1->geburtsdatum = "03.09.1981"; ---führt zum Fehler, da Variable private
// Zugriff auf private Variable durche get-set-Methoden
$pers1->setGeburtsdatum("03.10.1981");
echo $pers1->getGeburtsdatum()."<br />";





echo "1. Person: " . $pers1->__toString();
echo "<br />";
echo "2. Person: " . $pers2;
?>