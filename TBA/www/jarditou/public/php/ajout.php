<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title >Update</title>   
    </head>
    <body> 
        <div class="container-fluid">
            <header>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col mt-2 ">
                        <img src="../images/jarditou_logo.jpg" class="img-fluid" alt="logo" title="logo" >  
                    </div>
                    <h1 class="col-5 align-self-center text-right mr-5 d-none d-lg-block">Tout le jardin</h1>
                </div>
            </header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand">Jarditou.com</a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>
                </div>
            </nav>
            <div class="row">
                <img class="col" src="../images/promotion.jpg" alt="promotion" title="promotion">
        </div>  


            <div class="container-fluid">

<?php
   // var_dump($_POST);
    //var_dump($_GET);
    require "connexion_bdd.php"; // Connexion base
    $db = pdo_connect_mysql();
    $categories="SELECT cat_nom FROM categories";
    $result_categories = $db->query($categories)->fetchAll(PDO::FETCH_OBJ);

    $new_id="SELECT pro_id from produits order by pro_id desc LIMIT 1";
    $id = $db->query($new_id)->fetch(PDO::FETCH_OBJ);

?>

    <form class="col-6 ml-auto mr-auto mt-4" action="script_ajout.php" method="POST">
        <label for="id">ID</label><br>
        <input class="w-100 " type="text" name="id" placeholder="<?=$id->pro_id + 1?>" value="" id="id" ><br><br>
        <label for="reference">Référence</label><br>
        <input class="w-100 " type="text" name="reference" placeholder="" value="" id="reference"><br><br>
        <label for="categorie">Catégorie</label><br>
        <select class="w-100"  name="categorie" placeholder="" value="" id="categorie">
            <?php foreach ($result_categories as  $categorie){
            echo("<option>$categorie->cat_nom</option>");};?>

        </select><br><br>
        <label for="email">Libellé</label><br>
        <input class="w-100" type="text" name="libelle" placeholder="" value="" id="libelle"><br><br>
        <label for="phone">Description</label><br>
        <textarea class="w-100" name="description" placeholder="" value="" id="description"></textarea><br><br>
        <label for="email">Prix</label><br>
        <input class="w-100" type="text" name="prix" placeholder="" value="" id="prix"><br><br>
        <label for="email">Stock</label><br>
        <input class="w-100" type="text" name="stock" placeholder="" value="" id="stock"><br><br>
        <label for="email">Couleur</label><br>
        <input class="w-100" type="text" name="couleur" placeholder="" value="" id="couleur"><br><br>
        <label for="email">Date d'ajout</label><br>
        <input class="w-100" type="text" name="ajout" placeholder="<?=date('Y-m-d')?>" value="" id="ajout" readonly><br><br>



        <a class="btn btn-secondary mr-5 display-2" onclick="history.back()">Retour</a>
        <input class="btn btn-success display-2" type="submit" value="Enregistrer">

    </form>
        <?php 


//$result->closeCursor(); // Libère la connexion au serveur

?>
    
    <footer>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mt-1">
                <div>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="legual.phtml">Mentions légales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="horaires.html">Horaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="plan.html">Plan du site</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>
</html>