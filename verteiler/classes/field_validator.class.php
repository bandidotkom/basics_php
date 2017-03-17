<?php
class FieldType { // Enum
  const String = 0;
  const Email = 1;
  const Number = 2;
}
class FieldValidator
{
	// Attribute
	private $name;
	private $value;
	private $type; // 0 String, 1 Email, 2 Number
	private $required; // TRUE Pflichtfeld
	private $minLen;
	private $maxLen;
	private $error; // Fehlermeldung
	
	function __construct($name, $value, $type=FieldType::String, 
		$required=TRUE, $maxLen=-1, $minLen=-1)
	{
	 $this->name = $name;
	 $this->value = $value;
	 $this->type = $type; 
	 $this->required = $required; 
	 $this->minLen = $minLen;
	 $this->maxLen = $maxLen;
	}
	function isValid()
	{
		$value = trim($this->value);
		$len = strlen($value); // Anzahl der Zeichen
		
		//required
		if($this->required && $len == 0)
		{
			$this->error = "Eingabe für das Feld 
				<b>$this->name</b> erforderlich.";
			return false;
		}
		//minLen angegeben? eingehalten?
		if($len < $this->minLen)
		{
			$this->error = "Das Feld <b>$this->name</b> 
				muss mindestens $this->minLen Zeichen enthalten.";
			return false;
		}		
		//maxLen angegeben? eingehalten?
		if($this->maxLen != -1 && $len > $this->maxLen)
		{
			$this->error = "Das Feld <b>$this->name</b> 
				darf maximal $this->maxLen Zeichen enthalten.";
			return false;
		}
		//nicht required + leeres Feld
		if($len == 0)
			return true;
			
		//type != Zeichenkette? -> spezielle Prüfung
		if($this->type == FieldType::Email && 
			!filter_var($value, FILTER_VALIDATE_EMAIL))
		{
			$this->error = "Das Feld <b>$this->name</b> 
				enthält keine gültige Email-Adresse.";
			return false;	
		}
		if($this->type == FieldType::Number && !is_numeric($value))
		{
			$this->error = "Das Feld <b>$this->name</b> 
				darf nur Zahlen enthalten.";
			return false;
		}
		//Alle Prüfungen bestanden
		return true;
	}
	// Getter
	function getError()
	{
		if(isset($this->error))
			return $this->error;
		else
			return false;
	}	
	function getName()
	{
		return $this->name;
	}
	function getValue()
	{
		return $this->value;
	}
	
}
?>