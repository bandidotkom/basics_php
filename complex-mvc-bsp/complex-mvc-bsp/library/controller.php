<?php
class Controller{

	protected $request = null;
	protected $template = ''; 
	protected $view = null;   // Rahmentemplate
	protected $error;

	// Konstruktor, erstellt den Controller.
	public function __construct($request){
		$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}

	// Methode zum anzeigen des Contents.
	public function display($view){
		
		// Rahmen-Template
		$this->view->setTemplate('theblog'); //Rahmentemplate
		$this->view->assign('blog_title', 'MVC Gästebuch');
		$this->view->assign('blog_error', $this->error);
		$this->view->assign('blog_content', $view->loadTemplate());
		$this->view->assign('blog_footer', 'Ein Gästebuch mit MVC');
		return $this->view->loadTemplate();
	}
}
?>