<?php
class FormValidator
{
  //Attribut
  private $fields;
  
  function __construct($fields)
  {
	if(is_array($fields))
	{
		foreach($fields as $tmp)
			if(!get_class($tmp) == "FieldValidator")
				throw new Exception(utf8_encode("Falscher Datentyp"), 1);
		$this->fields = $fields;
	}
	else
	  $fields = array();
  }
  // Soll für jedes FieldValidator-Objekt im 
  // $fields-Array prüfen, ob die Feldeingabe 
  // gütlig ist und false zurückgeben, wenn eines
  // der FieldValidator-Objekte keine gütlige Eingabe
  // enthält. Anderenfalls soll true zurückgegeben
  //werden.
  function isValid()
  {
	foreach($this->fields as $tmp)
	{
	  if($tmp->isValid() == false)
		return false;
	}
	return true;
  }
  // Fehlermeldungen aller Felder hintereinander in eine 
  // Zeichenkette ($errors) schreiben u. zurück geben
  function getErrors()
  {
    $errors = "";
	foreach($this->fields as $tmp)
	{
	  if($tmp->isValid() == false)
		$errors .= $tmp->getError() . "<br />";
	}
	return $errors;
  }
  // Feld mit dem angegebenen Namen ($feldname) im $fields-
  // Array suchen und zurück geben, falls nicht vorhanden,
  // false zurück geben
  function getField($feldname)
  {
	foreach($this->fields as $tmp)
	{
	  if($tmp->getName() == $feldname)
		return $tmp;
    }	
	return false;
  }
}
?>