<?php
class AuthController extends Controller
{
	function __construct($request)
	{
		parent::__construct($request);
	}
	
	public function display(){
		$view = new View();
		$model = new AuthModel();

	 // Content-Template
		switch($this->template) {
			default:
		    case 'login' :
				//Formular abgeschickt?
			    if(isset($this->request['benutzername']) &&
				   isset($this->request['passwort']) )
				{
					$benutzername = $this->request['benutzername'];
					$passwort = $this->request['passwort'];
	
					$benutzername = htmlspecialchars($benutzername);
   	
					//Formular-Fehlerüberprüfung
					$form = new FormValidator(
						array(
							new FieldValidator("benutzername", $benutzername),
							new FieldValidator("passwort", $passwort)	
					));
				   // Kein Formulareingabe-Fehler
					if($form->isValid()) {
				
						$row = $model->getBenutzerId($benutzername, $passwort);
						if($row == null)
							$this->error = $model->getError();
						else
						{	
						  	$anzahl = $row['Anzahl'];
							if($anzahl > 0)
							{
								$id = $row['id'];
								// Benutzer-Id in Session-Variablen merken
								$_SESSION['benutzer_id'] = $id;
								header("Location:index.php?page=gaestebuch&view=insert");
							}
							else
							  $this->error = "Falscher Benutzername oder falsches Passwort.";
						}
							
					}
					else { // Formulareingabe-Fehler
						$view->assign('fehler', $form->getErrors());
					}
				}
				$view->setTemplate($this->template);	
		}

		// Rahmentemplate anzeigen
		return parent::display($view); 
	}
}