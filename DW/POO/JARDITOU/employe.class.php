<?php
require_once "magasin.class.php" ;

class Employe extends Magasin


{
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_salaire;
    private $_service;
    private $_anciennete;
    private $_enfant0_10;
    private $_enfant11_15;
    private $_enfant16_18;
   

    public function __construct($prenom, $nom,$dateEmbauche, $salaire, $service,$_enfant0_10 = 1,$_enfant11_15=1,$_enfant16_18=1,$nom_mag='testt',$restauration=0,$adresse = "30 Gin street", $code_postal = 80000, $ville = "Birmingham"){
        parent::__construct($nom_mag, $adresse, $code_postal, $ville,$restauration);


        $this->_prenom= $prenom;
        $this->_nom= $nom;
        $this->_dateEmbauche= $dateEmbauche;
        $this->_salaire= $salaire;
        $this->_service= $service;
        $this->_enfant0_10= $_enfant0_10;
        $this->_enfant11_15= $_enfant11_15;
        $this->_enfant16_18= $_enfant16_18;

        $this->_anciennete = $this->annees();
        $this->_chequeVacances = $this->chequeVacances();

    //    var_dump($this->getNom().'  '.$this->getPrenom().' a été embauché le '.$this->getEmbauche().". Il travaille dans l'entreprise depuis ".$this->annees()." ans");
        echo "$this->_nom $this->_prenom a été embauché le $this->_dateEmbauche. ";
        
        if($this->_anciennete>0){echo "Il travaille dans l'entreprise depuis ". $this->annees()." ans. ";}else{echo "Il travaille dans l'entreprise depuis moins d'un an. ";};
        
        echo "Son salaire annuel est de $this->_salaire"."K et sa prime s'eleve à ".($this->primeAnnuelle()+$this->primeAnciennete())."K par an.
        Il travaille dans le magasin " .$this->getNomMag()/*.$this->_nom_mag*/."<br>" ;

        if ($this->_restauration == 0){
            echo "Le magasin dispose d'un restaurant d'entreprise.<br>";
        }elseif ($this->_restauration == 1){
            echo "En l'absence de restaurant d'entreprise, il dipose de tickets restaurants.<br>";
        }
        if ($this->_chequeVacances == 0){
            echo "Il est trop jeune dans l'entreprise pour disposer de chéques vacances.<br>";
        }elseif ($this->_chequeVacances == 1){
            echo "Il dispose  de chéques vacances.<br>";
        }

        if($this->_enfant0_10 >=1){
            echo "il recoit $this->_enfant0_10 cheques Noel de 20 euros .<br>";
        }
        if($this->_enfant11_15 >=1){
            echo "il recoit $this->_enfant11_15 cheques Noel de 30 euros .<br>";
        }
        if($this->_enfant16_18 >=1){
            echo "il recoit $this->_enfant16_18 cheques Noel de 50 euros .<br>";
        }

        echo " Pour un total de ".(($this->_enfant0_10*20)+($this->_enfant11_15*30)+($this->_enfant16_18*50)." euros.<br><br><hr>");


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
    public function getEnfant0_10(){
        return $this->_enfant0_10; 
    }
    public function setEnfant0_10($sEnfant0_10){
        return $this->_enfant0_10 = $sEnfant0_10; 
    }

    public function getEnfant11_15(){
        return $this->_enfant11_15; 
    }
    public function setEnfant11_15($sEnfant11_15){
        return $this->_enfant11_15 = $sEnfant11_15; 
    }

    public function getEnfant16_18(){
        return $this->_enfant16_18; 
    }
    public function setEnfant16_18($sEnfant16_18){
        return $this->_enfant16_18 = $sEnfant16_18; 
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

    public function chequeVacances(){
        if($this->_anciennete >=1){
            return 1;
        }else{
            return 0;
        }
    }

    public function chequeNoel(){

    }

    // public function presentation(){
    //     echo "$this->_nom $this->_prenom a été embauché le $this->_dateEmbauche. Il travaille dans l'entreprise depuis ". $this->annees()." ans.<br>".$this->primeAnnuelle()." ".$this->primeAnciennete();
    // }

}

    $employe1 = new Employe("Jeff","Lebowski",'2021/05/06',20,'vendeurs',2,3,1,'test50');
    $employe2 = new Employe("Romain","alpha",'2015/09/06',21,'vendeurs',1,1,1,'test');
    $employe3 = new Employe("Remi","Beta",'2007/12/08',20,'vendeurs',2,0,5,'test1',1);
    $employe4 = new Employe("Florian","Gamma",'2018/07/20',30,'vendeurs',2,3,0,'test2',0);
    $employe5 = new Employe("Ali","Delta",'2017/11/06',40,'vendeurs',0,1,0,'test3',1);
    var_dump($employe1);
    var_dump($employe2);

    // $test->setNom("Lebowski");
    // $test->setPrenom("Jeff");
    // $test->setEmbauche("");

   // var_dump($p->getNom());

    //    echo ($employe1->getNom()."  ".$employe1->getPrenom()."a été embauché le ".$employe1->getEmbauche().". Il travaille dans l'entreprise depuis ".$employe1->annees()." ans");


//$employe1->presentation();

