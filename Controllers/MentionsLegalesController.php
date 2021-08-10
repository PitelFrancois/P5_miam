<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\App\Session;
use Francois\Models\RecipeModel;

// Déclaration de la classe
class MentionsLegalesController extends Controller {

    public $session;

    public function __construct() {
        $this->session = new Session($this->session);
    }

    // Méthode qui renvoie sur la page mention légales
    public function index() {
        $this->renderFront('mentionLegales/index');
    }
}