<?php

// Use
use Francois\Autoloader;

// On défini une root
define('ROOT',dirname(__DIR__));

// On fait appelle à l'autoloader
require_once ROOT."/Autoloader.php";

// On lance la méthode register
Autoloader::register();