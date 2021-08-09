<?php

// NAMESPACE
namespace Francois\Models;

// USE
use Francois\Models\Database;

// Déclaration de la classe
class ModelManager extends Database {

    protected $table;
	private $db;

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

    // Méthode qui permet d'hydrater un objet avec les données reçu
	public function hydrate($data) {
		foreach ($data as $key => $value) {
			$setter = "set" . ucfirst($key);
			if (method_exists($this, $setter)) {
				$this->$setter($value);
			}
		}
		return $this ;
	}

    // Méthode de véfication dans la base de données
    public function verification($colonne,$criteres) {
		$query = $this->request('SELECT * FROM ' . $this->table . " WHERE " . $colonne . " = ?", [$criteres] );
		$verificationExist = $query->rowCount();
		return $verificationExist;
	}

    // Création d'un objet dans la base de données
	public function create() {
		$champs = [];
		$inter = [];
		$valeurs = [];
		foreach ($this as $champ => $valeur) {
			if ($valeur !== null && $champ != "db" && $champ != "table") {
				$champs[] = "$champ";
				$inter[] = "?" ;
				$valeurs[] = $valeur;
			}				
		}
		$liste_champs = implode(', ', $champs);
		$listeInter = implode(', ', $inter);
		return $this->request('INSERT INTO '.$this->table.' ('. $liste_champs.')VALUES('.$listeInter.')', $valeurs);		
	}

    // Méthode qui modifie un élément dans la base de données
	public function update() {
		$champs = [];
		$valeurs = [];
		foreach ($this as $champ => $valeur) {
			if ($valeur !== null && $champ != "db" && $champ != "table") {
				$champs[] = "$champ = ?";
				$valeurs[] = $valeur;
			}				
		}
		$valeurs[] = $this->id;
		$liste_champs = implode(', ', $champs);
		return $this->request('UPDATE '.$this->table.' SET '. $liste_champs . " WHERE id = ? " , $valeurs);		
	}
}