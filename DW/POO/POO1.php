<?php


class Vehicule
{
    public $_marque;
    public $_vitesseMax;
    protected $_vitesseCourante;
    private $_nbPassagers;


       // Définition du constructeur de la classe
    function __construct($marque, $vitesseMax, $vitesseCourante,$nbPassagers, ) 
    {
         $this->_marque = $marque;
         $this->_vitesseMax = $vitesseMax;
         $this->_vitesseCourante = $vitesseCourante;
         $this->_nbPassagers = $nbPassagers;

    }

    public function demarrer() {
        // code permettant de démarrer l'objet instancié
    }
    public function accelerer(int $nbKm) {
        // code permettant d'accélérer
    }
    public function avancer(int $nbKm) {
        // code permettant d'avancer
    }
    public function ajouterPassager() {
        // code permettant d'ajouter un passager 
    }
}



