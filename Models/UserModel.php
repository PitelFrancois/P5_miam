<?php

namespace Francois\Models;

use Francois\Models\ModelManager;

class UserModel extends ModelManager {

    protected $id;
    protected $pseudo;
    protected $mail;
    protected $password;
    protected $role;
    protected $confirmKey;
    protected $confirm;

    public function __construct() {
    	$this->table = "miammembers" ;
    }

    // Liste des setters
    
    public function setId($id) {
        $id = (int) $id ;
        if ($id > 0) {
            $this->id = $id ;
        }
    }
    public function setPseudo($pseudo) {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo ;
        }       
    }
    public function setMail($mail) {
        if (is_string($mail)) {
            $this->mail = $mail ;
        }    
    }
    public function setPassword($password) {
        if (is_string($password)) {
            $this->password = $password ;
        }       
    }
    public function setRole($role) {
        $role = (int) $role ;
        if ($role > 0) {
            $this->role = $role ;
        }        
    }
    public function setConfirmKey($confirmKey) {
        if (is_string($confirmKey)) {
            $this->confirmKey = $confirmKey ;
        }         
    }
    public function setConfirm($confirm) {
        $confirm = (int) $confirm ;
        if ($confirm > 0) {
            $this->confirm = $confirm ;
        }        
    }

    // Liste des getters
    
    public function id() {
        return $this->id ;
    }
    public function pseudo() {
        return $this->pseudo ;
    }
    public function mail() {
        return $this->mail ;
    }
    public function password() {
        return $this->password ;
    }
    public function role() {
        return $this->role ;
    }
    public function confirmKey() {
        return $this->confirmKey ;
    }
    public function confirm() {
        return $this->confirm ;
    }
}