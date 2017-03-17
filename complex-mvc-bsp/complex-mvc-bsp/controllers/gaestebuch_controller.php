<?php
class GaestebuchController extends Controller
{
	function __construct($request)
	{
		parent::__construct($request);
	}
	
	public function display(){
		$view = new View();
		$model = new GaestebuchModel();
		
	 // Content-Template
		switch($this->template){
			  case 'insert' :
				//Formular abgeschickt?
			    if(isset($this->request['betreff']) &&
				   isset($this->request['beitrag']) )
				{
					$benutzer_id = $_SESSION['benutzer_id'];
					$betreff = $this->request['betreff'];
					$beitrag = $this->request['beitrag'];
					
					// HTML, Anführungszeichen u. Zeilenumbrüche umwandeln
					$beitrag = htmlspecialchars($beitrag);
					$betreff = htmlspecialchars($betreff);
					$beitrag = preg_replace("/(\r\n|\n|\r)/", "<br />", $beitrag);
   	
					//Formular-Fehlerüberprüfung
					$form = new FormValidator(
						array(
							new FieldValidator("betreff", $betreff),
							new FieldValidator("beitrag", $beitrag)	
					));
					
				// Kein Formulareingabe-Fehler
					if($form->isValid()) {
				
						$erg = $model->insertEntry($benutzer_id, $betreff, $beitrag);
						if($erg == false)
							$this->error = $model->getError();
						else
							header("Location:index.php");
					}
					else { // Formulareingabe-Fehler
						$view->assign('fehler', $form->getErrors());
						$view->assign('form', $form);
					}
				}
				$view->setTemplate('insert');
				break;
				
			case 'entry':
				$view->setTemplate('entry');
				$entryid = $this->request['id'];
				$entry = $model->getEntry($entryid);
				if(!isset($entry)) // Fehler
					$this->error = $model->getError();
				else // Alles O.K.
				{
					$view->assign('title', $entry['title']);
					$view->assign('content', $entry['content']);
					$view->assign('benutzername', $entry['benutzer']);
					$view->assign('datum', $entry['datum']);
					$view->assign('uhrzeit', $entry['uhrzeit']);
				}
				break;
				
			case 'default':
			default:
				$entries = $model->getEntries();
				if(!isset($entries)) // Fehler
					$this->error = $model->getError();
				else // Alles O.K.
				{
					$view->setTemplate('default');
					$view->assign('entries', $entries);
				}
		}
		
		// Rahmentemplate anzeigen
		return parent::display($view); 
	}
}