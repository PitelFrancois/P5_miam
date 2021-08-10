<?php

// NAMESPACE
namespace Francois\Models;

// Déclaration de la classe
class CommentModel extends ModelManager {

    protected $id;
    protected $recipeId;
	protected $userId;
    protected $pseudo;
    protected $comment;
    protected $dateAdd;
    protected $signalComment;

    public function __construct() {
    	$this->table = "comments" ;
    }

    // Liste de setters

    public function setId($id) {
		$id = (int) $id ;
		if ($id > 0) {
			$this->id = $id ;
		}
	}
    public function setRecipeId($recipeId) {
		$recipeId = (int) $recipeId ;
		if ($recipeId > 0) {
			$this->recipeId = $recipeId ;
		}
	}
    public function setUserId($userId) {
		$userId = (int) $userId ;
		if ($userId > 0) {
			$this->userId = $userId ;
		}
	}
    public function setPseudo($pseudo) {
		if (is_string($pseudo)) {
			$this->pseudo = $pseudo ;
		}
	}
    public function setComment($comment) {
		if (is_string($comment)) {
			$this->comment = $comment ;
		}
	}
    public function setDateAdd($dateAdd) {
		$this->dateAdd = $dateAdd ;
	}
    public function setSignalComment($signalComment){
        $signalComment = (int) $signalComment ;
		if ($signalComment > 0) {
			$this->signalComment = $signalComment ;
		}
    }

    // Liste de getters 

    public function id() {
        return $this->id;
    }
    public function recipeId() {
        return $this->recipeId;
    }
    public function userId() {
		return $this->userId ;
	}
    public function pseudo() {
        return $this->pseudo;
    }
    public function comment() {
        return $this->comment;
    }
    public function dateAdd() {
        return $this->dateAdd;
    }
    public function signalComment(){
        return $this->signalComment;
    }

    // Méthode qui permet de récupérer tout les commentaires d'une recette
    public function findAll($id) {
        $result = $this->request('SELECT * FROM ' . $this->table . " WHERE recipeId = ? AND publishComment = 2",[$id] )->fetchAll();
        return $result;
    }
    // Méthode qui permet de récupérer le nombre de commentaire d'une recette
    public function commentCount($id) {
        $result = $this->request("SELECT count(*) as nbComment FROM " . $this->table . " WHERE recipeId = ? AND publishComment = 2",[$id] )->fetch();
        return $result['nbComment'];
    }
    // Méthode qui permet de récupérer un commentaire suivant son id
    public function findById($id) {
        return $result = $this->request("SELECT * FROM " . $this->table . " WHERE id = ?",[$id])->fetch();
    }
    // Méthode qui permet de signaler un commentaire
    public function signal($id) {
        return $this->request('UPDATE '.$this->table.' SET signalComment = 2 WHERE id = ?', [$id]);
    }
    // Méthode qui récupère le nombres de commentaires 
    public function commentCountAll() {
		$result = $this->request("SELECT count(*) as nbComments FROM " . $this->table)->fetch();
        return $result['nbComments'];
	}
    // Méthode qui récupère le nombres de commentaires non publiés
    public function commentNotPublishCount() {
		$result = $this->request("SELECT count(*) as nbCommentsNotPublish FROM " . $this->table . " WHERE publishComment = 1 ")->fetch();
		return $result['nbCommentsNotPublish'];
	}
    // Méthode qui récupère le nombres de commentaires signalés
    public function commentSignalCount() {
		$result = $this->request("SELECT count(*) as nbCommentsSignal FROM " . $this->table . " WHERE signalComment = 2 ")->fetch();
		return $result['nbCommentsSignal'];
	}
    // Méthode qui récupère tous les commentaires
    public function findAllComment(){
		return $result = $this->request("SELECT * FROM " . $this->table . " ORDER BY id")->fetchAll();
	}
    // Méthode qui récupère tous les commentaires signalés
    public function findAllSignal() {
        return $result = $this->request("SELECT * FROM " . $this->table . " WHERE signalComment = 2 ORDER BY id")->fetchAll();
    }
    // Méthode qui récupère tous les commentaires non publiés
    public function notPublishComments(){
        return $result = $this->request("SELECT * FROM " . $this->table . " WHERE publishComment = 1 ORDER BY id")->fetchAll();
    }
}