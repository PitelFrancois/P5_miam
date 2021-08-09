<?php

// NAMESPACE

namespace Francois\Models ;

// USE

use PDO;
use PDOException;

// Déclaration de la classe

class Database extends PDO {

    // Instance de la classe
    private static $instance;

    // Informations de connexion
    const DBHOST = '********************';
    const DBUSER = '********************';
    const DBPASS = '********************';
    const DBNAME = '********************';
    const CHARSET = ';charset=utf8' ;

    public function __construct() {

        // DSN de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST . self::CHARSET;
        try {
            // On appelle le constructeur de la classe PDO
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // Vérifiaction si il y a déjà une instance
    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new self() ;
        }
        return self::$instance;
    }

    // Préparation de la requête à éxécuter
    public function request($sql,$attributs = null) {
		$this->db = Database::getInstance();
		if($attributs !== null){
	        $query = $this->db->prepare($sql);
	        $query->execute($attributs);
	        return $query;
		} else {
			return $this->db->query($sql);
    	}
	}
}