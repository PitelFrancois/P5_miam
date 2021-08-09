<?php

// Namespace
namespace Francois\Controllers ;

// Use
use Francois\App\Session;

// Déclaration de la classe
abstract class Controller {

    private $file;
    private $title;
	public $session;

	// Constructeur
    public function __construct() {
        $this->session = new Session;
    }

    // Renvoie le template de la view front
	public function renderFront($template, $data = []) {
        $this->file = ROOT.'/Views/Frontend/' . $template . '.php';
		$content = $this->renderFile($this->file, $data) ;
		$view = $this->renderFile(ROOT.'/Views/Frontend/template.php', [
				'title' => $this->title,
				'content' => $content,
				'session' => $this->session
		]) ;
        echo $view ;
	}
    // Renvoie le template de la view back
	public function renderBack($template, $data = []) {
		// On vérifie que l'utilisateur est un admin du site
        if ($this->session->get('role') === 2){
			$test = str_replace('Public/', '', ROOT);
			$this->file = $test . 'Views/Backend/' . $template . '.php';
			$content = $this->renderFile($this->file, $data) ;
			$view = $this->renderFile($test . 'Views/Backend/templateBack.php', [
					'title' => $this->title,
					'content' => $content ,
					'session' => $this->session 
			]) ;
			echo $view ;
		} else {
            // Sinon on renvoie l'utilisateur sur la page d'accueil avec un message d'erreur
            echo '<div id=session>
                    <div id="session2">
                        <p class="sessionP">Vous n\'avez les droits pour accéder à cette parti du site.</p>
                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>';
            header("Location: /");
        }
	}
    // Méthode qui renvoie le fichier avec les données
	public function renderfile($file, $data) {
		if (file_exists($file)) {
			extract($data) ;
			ob_start() ;
			require $file ;
			return ob_get_clean() ;
		}
		header('Location: /error/error404');
	}  
}