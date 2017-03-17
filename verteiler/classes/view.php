<?php
class View{

	// Pfad zum Template
	private $path = 'templates';
	// Name des Templates, in dem Fall das Standardtemplate.
	private $template = 'default';

	// Enth�lt die Variablen, die in das Template eingebettet werden sollen.
	private $_ = array();


	// Ordnet eine Variable (value) einem bestimmten Schl�ssel(key) zu.
	public function assign($key, $value){
		$this->_[$key] = $value;
	}


	//Setzt den Namen des Templates.
	public function setTemplate($template = 'default'){
		$this->template = $template;
	}


	// Das Template-File laden und zur�ckgeben
	public function loadTemplate(){
		$tpl = $this->template;
		// Pfad zum Template erstellen u. �berpr�fen, ob das Template existiert.
		$file = $this->path . '/' . $tpl . '.php';
		$exists = file_exists($file);

		if ($exists){
			// Der Output des Scripts wird in einen Buffer gespeichert, d.h.
			// nicht gleich ausgegeben.
			ob_start();

			// Das Template-File wird eingebunden und dessen Ausgabe in
			// $output gespeichert.
			include $file;
			$output = ob_get_contents();
			ob_end_clean();
				
			// Output zur�ckgeben.
			return $output;
		}
		else {
			// Template-File existiert nicht-> Fehlermeldung.
			return 'could not find template';
		}
	}
}
?>