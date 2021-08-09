<?php

// Use
use Francois\Autoloader;
use Francois\App\Router;
use Francois\Controllers\UserController;

// On défini une root
define('ROOT',dirname(__DIR__));

// On fait appelle à l'autoloader
require_once ROOT."/Autoloader.php";

// On lance la méthode register
Autoloader::register();

// Lancement du session
session_start();

// Connexion automatique
if (isset($_COOKIE['auth'])){
    $auth = $_COOKIE['auth'];
    $auth = explode('----',$auth);
    $userController = new UserController;
    $userController->autoLogin($auth);
}

// On instancie le router
$router = new Router;

// On fait appelle à la méthode start
$router->start();