<?php
class FormValidator
{
	//Attribut
	private $fields;

	function __construct($fields)
	{
		if(is_array($fields))
			$this->fields = $fields;
		else
			$fields = array();
	}
	/*
	Soll für jedes FieldValidator-Objekt im $fields-Array prüfen,
	ob die Feldeingabe gültig ist und false zurückgeben, wenn eines
	der FieldValidator-Objekte keine gültige Eingabe enthält.
	Anderenfalls soll true zurückgegeben werden.
	*/
	function isValid()
	{
		foreach($this->fields as $field)
		{
			if($field->isValid() == false)
				return false;
		}
		return true;
	}
	function getErrors()
	{
		$errors = "";
		foreach($this->fields as $field)
		{
			if($field->isValid() == false)
				$errors .= $field->getError() . "<br />";
		}
		return $errors;
	}
	function getField($fieldName)
	{
		foreach($this->fields as $field)
		{
			if($field->getName() == $fieldName)
			return $field;	
		}
		return false;
	}
}
?>