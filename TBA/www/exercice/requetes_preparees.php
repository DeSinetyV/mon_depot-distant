<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>var_dump</title>
</head>
<body>
<br>

<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '');
    $requete = "INSERT INTO station (sta_nom,sta_altitude) VALUES (?, ?)";
    $req = $db->prepare($requete); //Préparation de la requête 
    
    $req->execute(array('test_station', '10000')); //Exécution de la requête
    }
    
    // Gestion des erreurs
    catch (Exception $e) {
    
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
    } 
?>

</body>
</html>
