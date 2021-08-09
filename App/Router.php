<?php

// Namespace
namespace Francois\App;

// Use
use Francois\Controllers\MainController;

// Déclaration de la classe
class Router {
    
    // Méthode de routing
    public function start() {
        // On sépare les paramètres et on les met dans le tableau
        $params = explode("/",$_GET['p']);
        // Si au moins un paramètre existe
        if ($params[0] != "") {
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule, 
            // en ajoutant le namespace des controleurs et en ajoutant "Controller" à la fin
            $controller = '\\Francois\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';
            // On vérifie si la class existe
            if (class_exists($controller)) {
                // on instancie le contrôlleur
                $controller = new $controller();
                // On sauvegarde le 2ème paramètre dans $method si il existe, sinon index
                $method =  (isset($params[0])) ? array_shift($params) : 'index';
                // On vérifie que la méthode existe
                if (method_exists($controller,$method)) {
                    // Si il reste des paramètres, on appelle la méthode en envoyant les paramètres sinon on l'appelle "à vide"
					(isset($params[0])) ? call_user_func_array([$controller,$method], $params) : $controller->$method() ;
                } else {
                    // Sinon on renvoie l'utilisateur sur la page 404
				    header('Location: /error/error404');
                }
            } else {
                // On renvoie l'utilisateur sur la page 404
				header('Location: /error/error404');
            }
        // Sinon on renvoie l'utilisateur vers la page d'accueil    
        } else {
            // On instancie le contrôlleur par défaut
            $controller = new MainController;
            $controller->index();
        }
    }
}