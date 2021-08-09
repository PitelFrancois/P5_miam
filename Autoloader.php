<?php

// Namespace
namespace Francois;

// Déclaration de la class
class Autoloader {

    // Méthode qui lance l'autoloader
    static function register() {
        spl_autoload_register([__CLASS__,'autoload']);
    }
    
    // Méthode qui récupère le chemin des fichiers
    static function autoload($class) {
        // On récupère dans $class le namespace de la classe
        $class = str_replace(__NAMESPACE__ . '\\','',$class);
        // On remplace les \ par des /
        $class = str_replace('\\','/',$class);
        // On récupere le chemin final
        $file = __DIR__ . '/' . $class . '.php';
        // On vérifie si le fichier existe
        if (file_exists($file)) {
            // On appelle le fichier
            require_once $file;
        }
    }
}