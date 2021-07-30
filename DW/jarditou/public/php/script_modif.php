<?php
var_dump($_POST);
$error = NULL;


//dans ce fichier, nous récupérons les informations pour réaliser la requête de modification : UPDATE

//récupération des informations passées en POST, nécessaires à la modification
var_dump($_POST);
$id=$_POST['id'];
$reference=$_POST['reference'];
$categorie=$_POST['categorie'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$stock=$_POST['stock'];
$couleur=$_POST['couleur'];
$modification=$_POST['modification'];

//**********     connection à la base de données    **********

// si la ligne : 'require "connection_bdd.php";', ci-dessous est décommentée, 
// il faut commenter la ligne : '$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'root', '');'
//et décommenter la ligne : '$db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base.'', $login, $password);'

require "connexion_bdd.php";
$db = pdo_connect_mysql();

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//construction de la requête UPDATE sans injection SQL
try{
$id_categorie = "SELECT cat_id FROM categories
                    WHERE cat_nom = '$categorie'";
$id_categorie = $db->query($id_categorie)->fetch(PDO::FETCH_OBJ);
$id_categorie =intval($id_categorie->cat_id);
var_dump($id_categorie);

$update="UPDATE produits JOIN categories ON pro_cat_id= cat_id SET pro_ref=:pro_ref, pro_cat_id=:pro_cat_id, pro_libelle=:pro_libelle, pro_description=:pro_description,
pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_d_modif=:pro_d_modif WHERE pro_id= :pro_id";

$requete = $db->prepare($update);

$requete->bindValue(':pro_id', $id, PDO::PARAM_INT);
$requete->bindValue(':pro_ref', $reference, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $id_categorie , PDO::PARAM_INT);
$requete->bindValue(':pro_libelle', $libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', $prix, PDO::PARAM_INT);
$requete->bindValue(':pro_stock', $stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $couleur, PDO::PARAM_STR);
$requete->bindValue(':pro_d_modif', $modification, PDO::PARAM_STR);

//print_r($requete)
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