<?php


class Magasin
{
    public $_nom_mag;
    public $_adresse;
    public $_codePostal;
    public $_ville;




    public function __construct($nom_mag='test', $adresse,$codePostal, $ville){
        $this->_nom_mag = $nom_mag;
        $this->_adresse = $adresse;
        $this->_codePostal = $codePostal;
        $this->_ville = $ville;

  
    }

    public function getNomMag(){
        return $this->_nom_mag; 
    }
    public function setNomMag($snom_mag){
        return $this->_nom_mag= $snom_mag; 
    }

    public function getAdresse(){
        return $this->_adresse;
    }
    public function setAdresse($sAdresse){
        return $this->_adresse= $sAdresse; 
    }

    public function getCodePostal(){
        return $this->_codePostal; 
    }
    public function setCodePostal($sCodePostal){
        return $this->_codePostal = $sCodePostal; 
    }

    public function getVille(){
        return $this->_ville; 
    }
    public function setVille($sVille){
        return $this->_ville= $sVille; 
    }


}

