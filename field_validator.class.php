<?php
class FieldType //Enum
{
const String = 0;
const Email = 1;
const Number = 2;
}
class FieldValidator
{
private $name;
private $value;
private $type;
private $required; // TRUE Pflichtfeld
private $minLen;
private $maxLen;
private $error;

function __construct($name, $value, $type=FieldType::String, $required=TRUE, $minLen=-1, $maxLen=-1)
{
$this->name = $name;
$this->value = $value;
$this->type = $type;
$this->required = $required;
$this->maxLen = $maxLen;
$this->minLen = $minLen;
}
function isValid()
{
	$value = trim($this->value);
	$len = strlen($value); //Anzahl der Zeichen
	//required und leeres Feld
	if($this->required && $len == 0)
	{
		$this->error = "Eingabe für das Feld <b>$this->name</b> erforderlich.";
		return false;
	}
	//minLen angegeben? eingehalten?
	if($this->minLen > $len)
	{
		$this->error = "Das Feld <b>$this->name</b> muss mindestens <b>$this->minLen</b> Zeichen enthalten.";
		return false;
	}
	//maxLen angegeben? eingehalten?
	if($this->maxLen != -1 && $this->maxLen < $len)
	{
		$this->error = "Das Feld <b>$this->name</b> darf höchstens <b>$this->maxLen</b> Zeichen enthalten.";
		return false;
	}
	//nicht required und leer
	if($len == 0)
		return true;
	//type != Zeichenkette? -> spezielle Prüfung
	if($this->type == FieldType::Email && filter_var($value, FILTER_VALIDATE_EMAIL) == false)
	{
		$this->error = "Die Eingabe für das Feld <b>$this->name</b> soll eine gültige E-Mail-Adresse sein.";
		return false;
	}
	if($this->type == FieldType::Number && is_numeric($value) == false)
	{
		$this->error = "Die Eingabe für das Feld <b>$this->name</b> soll eine Zahl sein.";
		return false;
	}
	//alle Prüfungen bestanden
	return true;
}
//Getter
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