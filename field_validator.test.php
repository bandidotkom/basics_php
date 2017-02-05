<?php
require("field_validator.class.php");
$feld = new FieldValidator ("E-Mail", "andras.kom@v.com", 1, TRUE, 8, 30);

if($feld->isValid())
	echo "Feldeingabe korrekt.";
else
	echo $feld->getError();
?>