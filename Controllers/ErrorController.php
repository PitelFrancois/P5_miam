<?php

// Namespace
namespace Francois\Controllers;

// Déclaration de la classe
class ErrorController extends Controller {

    // Méthode qui renvoie sur la page d'accueil
    public function error404() {
        $this->renderFront('error/404');
    }
}