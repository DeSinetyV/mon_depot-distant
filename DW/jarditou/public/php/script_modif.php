<?php
var_dump($_POST);
$error = NULL;


//dans ce fichier, nous récupérons les informations pour réaliser la requête de modification : UPDATE

//récupération des informations passées en POST, nécessaires à la modification
//var_dump($_FILES);
//var_dump($_POST);
$id=$_POST['id'];
$reference=$_POST['reference'];
$categorie=$_POST['categorie'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$stock=$_POST['stock'];
$couleur=$_POST['couleur'];
$modification=$_POST['modification'];
$extension=$_POST['extension'];

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
//var_dump($id_categorie);

//Controle extension image

if ($_FILES["fichier"]["name"] != ''){
// On met les types autorisés dans un tableau 
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/tiff");
// On ouvre l'extension FILE_INFO
$finfo = finfo_open(FILEINFO_MIME_TYPE);
// On extrait le type MIME du fichier via l'extension FILE_INFO 
$mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
// On ferme l'utilisation de FILE_INFO 
finfo_close($finfo);

// gestion des erreurs 
if (is_array($_FILES["fichier"]["error"])) ;
{ 
    // Boucle pour afficher les messages d'erreurs    
    //var_dump($_FILES["fichier"]["error"]);
    
    switch($_FILES["fichier"]["error"])  {
        case 1:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case 2:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case 3:
            $message = "The uploaded file was only partially uploaded";
            break;
        case 4:
            $message = "No file was uploaded";
            break;
        case 5:
            $message = "Missing a temporary folder";
            break;
        case 6:
            $message = "Failed to write file to disk";
            break;
        case 7:
            $message = "File upload stopped by extension";
            break;
        case 0:
            $message = "upload correct";
            break;
        default:
            $message = "Unknown upload error";
            break;
    }
    echo $message."<br>"; 
} 

//Recuperer extension du fichier image
echo $_FILES["fichier"]["name"]."<br>";
$extension=explode(".",$_FILES["fichier"]["name"]);
$extension=end($extension);
//$extension = pathinfo($_POST["fichier"]["tmp_name"], PATHINFO_EXTENSION);   
echo $extension."<br>";

};



$update="UPDATE produits JOIN categories ON pro_cat_id= cat_id SET pro_ref=:pro_ref, pro_cat_id=:pro_cat_id, pro_libelle=:pro_libelle, pro_description=:pro_description,
pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_d_modif=:pro_d_modif, pro_photo=:pro_photo WHERE pro_id= :pro_id";

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
$requete->bindValue(':pro_photo', $extension, PDO::PARAM_STR);

//print_r($requete)
$requete->execute();

//////////////////////////////////////////////////////// mise a jour image ///////////////////////////////////////////////////////////////////

//var_dump($_FILES);
if ($_FILES["fichier"]["name"] != ''){
    if (in_array($mimetype, $aMimeTypes))
    {
        /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
        déplacer et renommer le fichier */  
    //   var_dump($extension);  
        echo("../images/".$_POST["id"].".".$_POST["extension"]);
        if (file_exists("../images/".$_POST["id"].".".$_POST["extension"])){
            unlink("../images/".$_POST["id"].".".$_POST["extension"]);
        };
    
        move_uploaded_file($_FILES["fichier"]["tmp_name"], "../images/".$_POST["id"].".".$extension);        
        
    } 
    else 
    {
    // Le type n'est pas autorisé, donc ERREUR

    echo "Type de fichier non autorisé";    
    exit;
    };   
}

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