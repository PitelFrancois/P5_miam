<?php

// Namespace
namespace Francois\Controllers;

// Déclaration de la classe
class CookieController extends Controller {

    // Méthode qui créer un cookie (accept_cookie)
    public function acceptCookie(){
        setcookie('accept_cookie', true, time() +365*24*3600,'/',null,true,true);
        header("Location: /");
    }
}