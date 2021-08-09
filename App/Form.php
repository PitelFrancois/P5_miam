<?php

// Namespace
namespace Francois\App;

// Déclaration de la classe
class Form {

	private $formCode = "";

	// Méthode qui permet de créer un formulaire
	public function create(){
	    return $this->formCode;
	}
	// Méthode qui permet d'ajouter des attributs au formulaire
	private function addAttributs($attributs) {
    	$str = '';
		$courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];
		foreach($attributs as $attribut => $valeur){
        	if(in_array($attribut, $courts) && $valeur == true){
            	$str .= " $attribut";
        	} else {
            	$str .= " $attribut='$valeur'";
        	}
    	}
		return $str;
	}
	// Méthode qui permet de vérifier si les champs obligatoires sont remplis
	public static function validate($form,$fields){
		foreach($fields as $field){
	        if(!isset($form[$field]) || empty($form[$field])){
				return false;
			}
	    }
	    return true;
	}
	// Méthode qui renvoie le début du formualire
	public function beginForm($method = 'POST',$attributs = []) {
		$this->formCode .= "<form method='$method'";
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>' : '>';
		return $this;
	}
	// Méthode qui renvoie le début d'une div
	public function beginDiv($attributs = []) {
		$this->formCode .= "<div ";
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>' : '>';
		return $this;
	}
	// Méthode qui renvoie la fin d'une div
	public function endDiv() {
		$this->formCode .= "</div>";
		return $this;
	}
	// Méthode qui renvoie la fin du formulaire
	public function endForm() {
		$this->formCode .= "</form>";
		return $this;
	}
	// Méthode qui renvoie un label
	public function addLabel($for,$text,$attributs = []) {
		$this->formCode .= "<label for='$for'"; 
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';
		$this->formCode .= ">$text</label>";
		return $this;
	}
	// Méthod qui renvoie un input
	public function addInput($type,$name,$attributs = []) {
    	$this->formCode .= "<input type='$type' name='$name'";
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>' : '>';		
		return $this;
	}
	// Méthode qui renvoie un textarea
	public function addTextarea($name,$value = "",$attributs = []) {
    	$this->formCode .= "<textarea name='$name'";
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';
		$this->formCode .= ">$value</textarea>";		
		return $this;
	}
	// Méthode qui renvoie un select
	public function addSelect($name,$options,$attributs = []) {
   		$this->formCode .= "<select name='$name'";
		$this->formCode .= $attributs ? $this->addAttributs($attributs).'>' : '>';
		foreach($options as $value => $text){
        	$this->formCode .= "<option value='$text'>$text</option>";
    	}
		$this->formCode .= '</select>';
		return $this;
	}
	// Méthode qui renvoie un button
	public function addButton($text,$attributs = []) {
		$this->formCode .= '<button ';
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';
		$this->formCode .= ">$text</button>";
		return $this;
	}
	// Méthode qui renvoie un label de type checkbox (remember me)
	public function addRememberMe(){
		$this->formCode .= '<label for="rememberMe">
								Se souvenir de moi
								<input type="checkbox" name="rememberMe" id="rememberMe">
								<span class="checkmark"></span>
							</label>';
		return $this;
	}
	// Méthode qui renvoie un label de type checkbox (rgpd)
	public function rgpdValide(){
		$this->formCode .= '<label for="rgpdValide">
								<input type="checkbox" name="rgpdValide" id="rgpdValide">
								<span class="checkmark"></span>
								J\'autorise ce site à conserver mes données personnelles transmises via ce formulaire.
								Aucune exploitation commerciale ne sera faite des données conservées.
							</label>';
		return $this;
	}
	public function addI($for,$text,$attributs = []){
		$this->formCode .= "<label for='$for'"; 
		$this->formCode .= $attributs ? $this->addAttributs($attributs) : '';
		$this->formCode .= ">$text <i id='renderPicture' class='fas fa-camera ml-3'></i></label>";
		return $this;
	}
}