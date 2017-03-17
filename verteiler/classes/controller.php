<?php
class Controller{

	private $request = null;
	private $template = ''; 
	private $view = null;   // Rahmentemplate
	private $error;

	// Konstruktor, erstellt den Controller
	public function __construct($request){
		$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}

	// Methode zum Anzeigen des Contents
	public function display(){
		$view = new View();
		$model = new Model();
		
	 // Content-Template
		switch($this->template){
		    case 'eintrag' :
				//Formular mit allen Daten abgeschickt?
			    if(isset($this->request['vorname']) &&
				   isset($this->request['nachname']) &&
				   isset($this->request['email']))
				{
					$vorname = $this->request['vorname'];
					$nachname = $this->request['nachname'];
					$email = $this->request['email'];
	
					$vorname = htmlspecialchars($vorname);
					$nachname = htmlspecialchars($nachname);
					$email = htmlspecialchars($email);
   	
					//Formular-Fehlerüberprüfung
					$form = new FormValidator(
						array(
							new FieldValidator("vorname", $vorname),
							new FieldValidator("nachname", $nachname),
							new FieldValidator("email", $email, FieldType::Email)
					));
				   // Kein Formulareingabe-Fehler
					if($form->isValid()) {
						//E-Mail-Adresse auf Übereinstimmung mit den vorhandenen Einträgen prüfen
						$emails = $model->getEmails();
												if (!in_array($email, $emails))
						{//falls E-Mail-Adresse noch nicht vorhanden --> Eintragung
							$erg = $model->insertEntry($vorname, $nachname, $email);
							if($erg == false)
								$this->error = $model->getError();
							else
								header("Location:index.php");
						}
						//falls E-Mail-Adresse bereits vorhanden --> Fehlermeldung
						else
						    $view->assign('fehler', "Die E-Mail-Adresse ist bereits vorhanden! Die Eintragung war nicht erfolgreich.");
					}
					else { // Formulareingabe-Fehler
						$view->assign('fehler', $form->getErrors());
					}
				}
				$view->setTemplate('eintrag');
				break;
				
			case 'email':
				//Formular abgeschickt?
			    if(isset($this->request['betreff']) &&
				   isset($this->request['nachricht']))
				{
					$betreff = $this->request['betreff'];
					$nachricht = $this->request['nachricht'];
	
					$betreff = htmlspecialchars($betreff);
					$betreff = utf8_encode($betreff);
					$nachricht = htmlspecialchars($nachricht);
   	
					//Formular-Fehlerüberprüfung
					$form = new FormValidator(
						array(
							new FieldValidator("betreff", $betreff),
							new FieldValidator("nachricht", $nachricht)
					));
				   // Kein Formulareingabe-Fehler
					if($form->isValid()) {
						//E-Mail-Adressen aus der Datenbank auslesen			
						$emails = $model->getEmails();
						//falls kein Ergebnis:
						if($emails == null)
							$this->error = $model->getError();
						//wenn E-Mail-Adressen vorliegen, Nachricht an alle Adressen senden
						else
						{
							foreach($emails as $email)
							{
								$header = 'MIME-Version: 1.0' . "\r\n";
								$header .= 'Content-type: text/plain; charset=utf8' . "\r\n";
								mail("$email", "$betreff", "$nachricht", $header);
							}
							//... und zurück zur Hauptansicht
							header("Location:index.php");
						}
					}
					else { // Formulareingabe-Fehler
						$view->assign('fehler', $form->getErrors());
					}
				}
				$view->setTemplate('email');
				break;
				
			case 'ansicht':
			default:
				$entries = $model->getEntries();
				if(!isset($entries)) // Fehler
					$this->error = $model->getError();
				else // Alles O.K.
				{
					$view->setTemplate('ansicht');
					$view->assign('entries', $entries);
				}
		}
		
		// Rahmen-Template
		$this->view->setTemplate('frame'); //Rahmentemplate
		$this->view->assign('verteiler_title', 'Verteiler');
		$this->view->assign('verteiler_content', $view->loadTemplate());
		$this->view->assign('verteiler_footer', 'Ein Mail-Verteiler von und mit MVC');
		return $this->view->loadTemplate();
	}
}
?>