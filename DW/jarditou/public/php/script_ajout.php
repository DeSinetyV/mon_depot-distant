<?php


//dans ce fichier, nous récupérons les informations pour réaliser la requête de création

//récupération des informations passées en POST

var_dump($_POST);
$id=intval($_POST['id']);
$reference=$_POST['reference'];
$categorie=$_POST['categorie'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=intval($_POST['prix']);
$stock=intval($_POST['stock']);
$couleur=$_POST['couleur'];
$ajout=$_POST['ajout'];




//$id=501;
//$reference="qeuttrjytrj";
//$categorie="outillage";
//$libelle="jhfkjhfkhyc";
//$description=",hgccj,hgc,h";
//$prix=120;
//$stock=100;
//$couleur="blouge";
//$ajout="2021-06-05";

//**********     connection à la base de données    **********

// si la ligne : 'require "connection_bdd.php";', ci-dessous est décommentée, 
// il faut commenter la ligne : '$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'root', '');'
//et décommenter la ligne : '$db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base.'', $login, $password);'

require "connexion_bdd.php";
$db = pdo_connect_mysql();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//construction de la requête INSERT sans injection SQL



try{
    $id_categorie = "SELECT cat_id FROM categories
    WHERE cat_nom = '$categorie'";
$id_categorie = $db->query($id_categorie)->fetch(PDO::FETCH_OBJ);
$id_categorie =intval($id_categorie->cat_id);
var_dump($id_categorie);
var_dump($prix);


$insert="insert INTO produits (pro_id,pro_cat_id, pro_ref, pro_libelle, pro_description,pro_prix, pro_stock, pro_couleur, pro_d_ajout) 
VALUES  (:pro_id, :pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_d_ajout)";



$requete = $db->prepare($insert);

$requete->bindValue(':pro_id', $id, PDO::PARAM_INT);
$requete->bindValue(':pro_ref', $reference, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $id_categorie, PDO::PARAM_INT);
$requete->bindValue(':pro_libelle', $libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $prix, PDO::PARAM_INT);
$requete->bindValue(':pro_stock', $stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $couleur, PDO::PARAM_STR);
$requete->bindValue(':pro_d_ajout', $ajout, PDO::PARAM_STR);


//print_r($requete);
$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo "N° : " . $e->getCode();
    }
    if($error){
        echo $error;
    }else{
     header("Location:../../tableau.php");
    }


?>