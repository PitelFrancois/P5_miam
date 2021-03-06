<?php

namespace Francois\Models;

use Francois\Models\ModelManager;

class RecipeModel extends ModelManager {

	protected $id;
	protected $userId;
	protected $title;
	protected $preparationTime;
	protected $cookingTime;
	protected $restTime;
	protected $howManyPeople;
	protected $step;
	protected $ing;
	protected $vegan;
	protected $categorie;
	protected $dateAdd;
	protected $pseudo;
	protected $namePicture;

	public function __construct() {
    	$this->table = "recipes" ;
    }

    // Liste de setters
	
	public function setId($id) {
		$id = (int) $id ;
		if ($id > 0) {
			$this->id = $id ;
		}
	}
	public function setUserId($userId) {
		$userId = (int) $userId ;
		if ($userId > 0) {
			$this->userId = $userId ;
		}
	}
	public function setTitle($title) {
		if (is_string($title)) {
			$this->title = $title ;
		}
	}
	public function setPreparationTime($preparationTime) {
		$preparationTime = (int) $preparationTime ;
		if ($preparationTime > 0) {
			$this->preparationTime = $preparationTime ;
		}		
	}
	public function setCookingTime($cookingTime) {
		$cookingTime = (int) $cookingTime ;
		if ($cookingTime > 0) {
			$this->cookingTime = $cookingTime ;
		}		
	}
	public function setRestTime($restTime) {
		$restTime = (int) $restTime ;
		if ($restTime > 0) {
			$this->restTime = $restTime ;
		}		
	}
	public function setHowManyPeople($howManyPeople) {
		$howManyPeople = (int) $howManyPeople ;
		if ($howManyPeople > 0) {
			$this->howManyPeople = $howManyPeople ;
		}		
	}
	public function setStep($step) {
		if (is_string($step)) {
			$this->step = $step ;
		}		
	}
	public function setIng($ing) {
		if (is_string($ing)) {
			$this->ing = $ing ;
		}		
	}
	public function setVegan($vegan) {
		if (is_string($vegan)) {
			$this->vegan = $vegan ;
		}			
	}
	public function setCategorie($categorie) {
		if (is_string($categorie)) {
			$this->categorie = $categorie ;
		}			
	}
	public function setDateAdd($dateAdd) {
		$this->dateAdd = $dateAdd ;
	}
	public function setPseudo($pseudo){
		if (is_string($pseudo)) {
			$this->pseudo = $pseudo ;
		}
	}
	public function setNamePicture($namePicture) {
		if (is_string($namePicture)) {
			$this->namePicture = $namePicture ;
		}		
	}

	// Liste des getters
	
	public function id() {
		return $this->id ;
	}
	public function userId() {
		return $this->userId ;
	}
	public function title() {
		return $this->title ;
	}
	public function preparationTime() {
		return $this->preparationTime ;
	}
	public function cookingTime() {
		return $this->cookingTime ;
	}
	public function restTime() {
		return $this->restTime ;
	}
	public function howManyPeople() {
		return $this->howManyPeople ;
	}
	public function step() {
		return $this->step ;
	}
	public function ing() {
		return $this->ing ;
	}
	public function vegan() {
		return $this->vegan ;
	}
	public function categorie() {
		return $this->categorie ;
	}
	public function dateAdd() {
		return $this->dateAdd ;
	}
	public function pseudo(){
		return $this->pseudo;
	}
	public function namePicture() {
		return $this->namePicture ;
	}

    // M??thode qui permet de r??cup??rer le nombre de recette suivant une cat??gorie
    public function recipeCount($critere) {
        $result = $this->request("SELECT count(*) as nbRecipe FROM " . $this->table . " WHERE categorie = ?",[$critere] )->fetch();
        return $result['nbRecipe'];
    }
    // M??thode qui permet de r??cup??rer la derni??re recette suivant sa cat??gorie
    public function lastRecipe($categorie) {
        return $result = $this->request("SELECT *,DATE_FORMAT(dateAdd, '<span>%d</span><p>%m</p>') AS dateAdd FROM " . $this->table . " WHERE categorie = ? AND namePicture !='' ORDER BY id DESC LIMIT 1",[$categorie])->fetch();
    }
	// M??thode qui permet de r??cup??rer une recette suivant son id
    public function findById($id) {
        return $result = $this->request("SELECT *,DATE_FORMAT(dateAdd, '<h2>%d</h2><span>%m</span>') AS dateAdd FROM " . $this->table . " WHERE id = ?",[$id])->fetch();
    }
	// M??thode qui permet de r??cup??rer la derni??re recette cr??e
	public function lastRecipeCreate() {
        return $this->request("SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 1")->fetch();
    }
	// M??thode qui permet de r??cup??rer toutes les recettes suivant leurs cat??gories
	public function findAllCategorie($categorie){
		return $result = $this->request("SELECT *,DATE_FORMAT(dateAdd, '<h4>%d</h4><span>%m</span>') AS dateAdd FROM " . $this->table . " WHERE categorie = ? ORDER BY id",[$categorie])->fetchAll();
	}
	// M??thode qui permet de r??cup??rer toutes les recettes d'un utilisateur
	public function findAllMyRecipe($pseudo){
		return $result = $this->request("SELECT *,DATE_FORMAT(dateAdd, '<h4>%d</h4><span>%m</span>') AS dateAdd FROM " . $this->table . " WHERE pseudo = ? ORDER BY id DESC ",[$pseudo])->fetchAll();
	}
	// M??thode qui permet de supprimer une recette via son id
	public function deleteRecipe($id){
		return $this->request("DELETE FROM " . $this->table . " WHERE id = ?",[$id]);
	}
	// M??thode qui permet ?? l'utilisateur de update une photo de sa recette
	public function recipeUpdatePicture($fileName,$id){
		return $this->request('UPDATE '.$this->table.' SET namePicture=? WHERE id = ?', [$fileName,$id]);
	}
	// M??thode qui permet ?? l'utilisateur de update sa recette
	public function recipeUpdate($newTitle,$newPreparationTime,$newCookingTime,$newRestTime,$newHowManyPeople,$newStep,$newIng,$newVegan,$newCategorie,$id){
		return $this->request('UPDATE '.$this->table.' SET title=?,preparationTime=?,cookingTime=?,restTime=?,howManyPeople=?,step=?,ing=?,vegan=?,categorie=? WHERE id = ?', [$newTitle,$newPreparationTime,$newCookingTime,$newRestTime,$newHowManyPeople,$newStep,$newIng,$newVegan,$newCategorie,$id]);
	}
	// M??thode qui permet de r??cup??rer le nombre de recette
	public function recipeCountAll() {
		$result = $this->request("SELECT count(*) as nbRecipes FROM " . $this->table)->fetch();
        return $result['nbRecipes'];
	}
	// M??thode qui permet de r??cup??rer toutes les recettes
	public function findAll(){
		return $result = $this->request("SELECT * FROM " . $this->table . " ORDER BY id")->fetchAll();
	}
	// M??thode qui permet ?? l'admin de update une recette
	public function updateRecipe($newUserId,$newTitle,$newPreparationTime,$newCookingTime,$newRestTime,$newHowManyPeople,$newStep,$newIng,$newPicture,$newCategorie,$newPseudo,$id){
		return $this->request('UPDATE '.$this->table.' SET userId=?,title=?,preparationTime=?,cookingTime=?,restTime=?,howManyPeople=?,step=?,ing=?,namePicture=?,categorie=?,pseudo=? WHERE id = ?', [$newUserId,$newTitle,$newPreparationTime,$newCookingTime,$newRestTime,$newHowManyPeople,$newStep,$newIng,$newPicture,$newCategorie,$newPseudo,$id]);
	}
}