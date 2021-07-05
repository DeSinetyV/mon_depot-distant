<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo PHP</title>
</head>
<body>

<!-- Notre code php -->
<?php
    require "connexion_bdd.php"; // Connexion base
    $requete = "SELECT * FROM station";
    $result = $db->query($requete);
    $nbLigne = $result->rowCount(); // Nombre de lignes retournées par la requête
    if ($nbLigne > 1) {             
        while ($row = $result->fetch(PDO::FETCH_OBJ)) // Tant qu'il y a des lignes à afficher :
        { ?>

            <div> 
                <?php  echo $row->sta_nom;  // On affiche le nom des stations ?>
            </div> 
        <?php 
        }

$result->closeCursor(); // Libère la connexion au serveur

}  
?>
</body>
</html>