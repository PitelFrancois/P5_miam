<?php

// Namespace
namespace Francois\App;

// Déclaration de la classe
class Session {

    public $session;

    // Méthode qui créer une session
    public function set($name, $value) {
        $_SESSION[$name] = $value ;
    }

    // Méthode qui permet de récupérer une session
    public function get($name) {
        if(isset($_SESSION[$name])) {
            return $_SESSION[$name] ;
        }
    }

    // Méthode qui permet d'afficher une session
    public function show($name) {
        if(isset($_SESSION[$name])) {
            $key = $this->get($name) ;
            $this->remove($name) ;
            return $key ;
        }
    }

    // Méthode qui supprime une session
    public function remove($name) {
        unset($_SESSION[$name]) ;
    }

    // Méthode qui lance une session
    public function start() {
        session_start();
    }

    // Méthode qui stop une session
    public function stop() {
        session_destroy() ;
    }
}