<?php

// MVC Klassen einbinden
require('classes/field_validator.class.php');
require('classes/form_validator.class.php');
require('classes/controller.php');
require('classes/model.php');
require('classes/view.php');

// $_GET und $_POST zusammenfassen, $_COOKIE interessiert uns nicht.
$request = array_merge($_GET, $_POST);
// Controller erstellen
$controller = new Controller($request);
// Inhalt der Webanwendung ausgeben.
echo $controller->display();

?>