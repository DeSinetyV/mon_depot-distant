<?php
include_once 'personnage.class.php'; 
include_once 'personnage.class.php'; 

$p = new Personnage();
$p->setNom("Lebowski");
$p->setPrenom("Jeff");


var_dump($p->getNom());

echo ($p->getNom()).'<br>'.($p->getPrenom());