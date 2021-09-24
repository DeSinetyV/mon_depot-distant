<?php


class Personnage
{
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    public function getNom(){
        return $this->_nom; 
    }

    public function setNom($sNom){
        return $this->_nom= $sNom; 
    }
    public function getPrenom(){
        return $this->_prenom;
    }

    public function setPrenom($sPrenom){
        return $this->_prenom= $sPrenom; 
    }

    public function getAge(){
        return $this->_age; 
    }
    public function getSexe(){
        return $this->_sexe; 
    }
}







