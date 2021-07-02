<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
// Dans ce fichier, nous récupérons les informations pour réaliser la requête de modification : UPDATE

// Récupération des informations passées en POST, nécessaires à la modification

$id_station=$_POST['id'];
$nom_station=$_POST['nom'];
$altitude_station=$_POST['altitude'];

// Connexion à la base de données
require "connexion_bdd.php";

// Construction de la requête UPDATE sans injection SQL
try {
$requete = $db->prepare("UPDATE station SET sta_nom=:sta_nom, sta_altitude=:sta_altitude WHERE sta_id=:sta_id");

$requete->bindValue(':sta_nom', $nom_station, PDO::PARAM_STR);
$requete->bindValue(':sta_altitude', $altitude_station, PDO::PARAM_INT);
$requete->bindValue(':sta_id', $id_station, PDO::PARAM_INT);

$requete->execute();

// Libération de la connexion au serveur de BDD
$requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {

        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

// Redirection vers la page index.php 
header("Location: index.php");
exit;

?>

</body>
</html>