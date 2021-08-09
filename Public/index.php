<?php

// Use
use Francois\Autoloader;
use Francois\App\Router;

// On défini une root
define('ROOT',dirname(__DIR__));

// On fait appelle à l'autoloader
require_once ROOT."/Autoloader.php";

// On lance la méthode register
Autoloader::register();

// Lancement du session
session_start();

// On instancie le router
$router = new Router;

// On fait appelle à la méthode start
$router->start();