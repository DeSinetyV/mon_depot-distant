<?php
require_once "magasin.class.php" ;

class Employe extends Magasin


{
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_salaire;
    public $_service;


    public function __construct($prenom, $nom,$dateEmbauche, $salaire, $service,$nom_mag='tstt'){
        parent::__construct($nom_mag, $adresse = "30 Gin street", $code_postal = 80000, $ville = "Birmingham");


        $this->_prenom= $prenom;
        $this->_nom= $nom;
        $this->_dateEmbauche= $dateEmbauche;
        $this->_salaire= $salaire;
        $this->_service= $service;
    //    var_dump($this->getNom().'  '.$this->getPrenom().' a été embauché le '.$this->getEmbauche().". Il travaille dans l'entreprise depuis ".$this->annees()." ans");
        echo "$this->_nom $this->_prenom a été embauché le $this->_dateEmbauche. Il travaille dans l'entreprise depuis ". $this->annees()." ans.
        Son salaire annuel est de $this->_salaire"."K et sa prime s'eleve à ".($this->primeAnnuelle()+$this->primeAnciennete())."K par an. Il travaille dans le magasin " .$this->getNomMag()/*.$this->_nom_mag*/."<br>" ;
    }


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

    public function getEmbauche(){
        return $this->_dateEmbauche; 
    }
    public function setEmbauche($sEmbauche){
        return $this->_dateEmbauche = $sEmbauche; 
    }

    public function getSalaire(){
        return $this->_salaire; 
    }
    public function setSalaire($sSalaire){
        return $this->_salaire= $sSalaire; 
    }

    public function getService(){
        return $this->_service; 
    }
    public function setService($sService){
        return $this->_service = $sService; 
    }

    


    public function annees(){
        $date = new DateTime();
        $date2 = new DateTime("$this->_dateEmbauche");
        $diff = $date2->diff($date)->y ;
        return $diff ;
    }

    public function primeAnnuelle(){
        $primeAnnuelle = $this->_salaire*0.05 ;
        return $primeAnnuelle;
    }

    public function primeAnciennete(){
        $primeAnciennete = (($this->annees()*0.02)*$this->_salaire);
        return $primeAnciennete;


    }

    // public function presentation(){
    //     echo "$this->_nom $this->_prenom a été embauché le $this->_dateEmbauche. Il travaille dans l'entreprise depuis ". $this->annees()." ans.<br>".$this->primeAnnuelle()." ".$this->primeAnciennete();
    // }

}

    $employe1 = new Employe("Jeff","Lebowski",'2020/05/06',20,'vendeurs');
    $employe2 = new Employe("Romain","alpha",'2015/09/06',21,'vendeurs','test');
    $employe3 = new Employe("Remi","Beta",'2007/12/08',20,'vendeurs','test1');
    $employe4 = new Employe("Florian","Gamma",'2018/07/20',30,'vendeurs','test2');
    $employe5 = new Employe("Ali","Delta",'2017/11/06',40,'vendeurs','test3');
    var_dump($employe1->_nom_mag);
    var_dump($employe2->_nom_mag);

    // $test->setNom("Lebowski");
    // $test->setPrenom("Jeff");
    // $test->setEmbauche("");

   // var_dump($p->getNom());

    //    echo ($employe1->getNom()."  ".$employe1->getPrenom()."a été embauché le ".$employe1->getEmbauche().". Il travaille dans l'entreprise depuis ".$employe1->annees()." ans");


//$employe1->presentation();

