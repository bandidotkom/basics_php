<?php
class Controller{

	private $request = null;
	private $template = ''; 
	private $view = null;   // Rahmentemplate
	private $error;

	// Konstruktor, erstellt den Controller.
	public function __construct($request){
		$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}

	// Methode zum anzeigen des Contents.
	public function display(){
		$view = new View();
		$model = new Model();
		
	 // Content-Template
		switch($this->template){
		    case 'insert' :
				//Formular abgeschickt?
			    if(isset($this->request['betreff']) &&
				   isset($this->request['beitrag']) )
				{
					$benutzer_id = 3; //Krücke
					$betreff = $this->request['betreff'];
					$beitrag = $this->request['beitrag'];
	
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
						// HTML, Anführungszeichen u. Zeilenumbrüche umwandeln
				
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
		
		// Rahmen-Template
		$this->view->setTemplate('theblog'); //Rahmentemplate
		$this->view->assign('blog_title', 'Gästebuch');
		$this->view->assign('blog_error', $this->error);
		$this->view->assign('blog_content', $view->loadTemplate());
		$this->view->assign('blog_footer', 'Ein Gästebuch von und mit MVC');
		return $this->view->loadTemplate();
	}
}
?>