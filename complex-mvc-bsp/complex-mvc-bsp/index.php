<?php
session_start();
// MVC Klassen einbinden
require('library/field_validator.class.php');
require('library/form_validator.class.php');
require('library/controller.php');
require('library/model.php');
require('library/view.php');
require('controllers/auth_controller.php');
require('controllers/gaestebuch_controller.php');
require('models/auth_model.php');
require('models/gaestebuch_model.php');

$dispatch = array(
  'gaestebuch' => 'GaestebuchController',
  'auth' => 'AuthController'
);

// $_GET und $_POST zusammenfasen, $_COOKIE interessiert uns nicht.
$request = array_merge($_GET, $_POST);


$page = 	$page = 'gaestebuch'; // Default
// Controller aus page-Parameter ermitteln
if(isset($request['page']))
	$page = $request['page'];

	
$controller_ = 'gaestebuch';	// Default
foreach($dispatch as $tmp_key => $tmp_value)
{
   if($tmp_key == $page)
     $controller_ = $tmp_value;
}

// Authenthifizierung
if(isset($request['view']) && $request['view'] == 'insert' && !isset($_SESSION['benutzer_id']))
	header("Location:index.php?page=auth&view=login");
	

// Controller erstellen
$controller = new $controller_($request);

// Inhalt der Webanwendung ausgeben.
echo $controller->display();

?>