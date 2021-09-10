<?php session_start(); ?>
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
                </div>
            </nav>
            <div class="row">
                <img class="col" src="../images/promotion.jpg" alt="promotion" title="promotion">
        </div>  
<?php
   // var_dump($_POST);
    //var_dump($_GET);
    $id = $_GET['pro_id'];
    require "connexion_bdd.php"; // Connexion base
    $db = pdo_connect_mysql();
    $requete = "SELECT * FROM produits
                JOIN categories ON pro_cat_id = cat_id
                WHERE pro_id = '$id'";
    $result = $db->query($requete)->fetch(PDO::FETCH_OBJ);

    $categories="SELECT cat_nom FROM categories";
    $result_categories = $db->query($categories)->fetchAll(PDO::FETCH_OBJ);


    //$test = $db->prepare("SELECT * FROM produits Where pro_id = ?");
    //$test->execute([$id, $ref,  $libelle, $prix, $stock, $couleur, $created, $_GET['id']]);

?>

            <div class="col-6 ml-auto mr-auto" class="container-fluid">
            <?php $image= '../images/'.$result->pro_id;
                            echo '<br><img class="col-6 d-block mx-auto" src='.$image.' ><br>'?>




    <form  action="script_modif.php" method="POST" enctype="multipart/form-data">
        <input class="ml-5" type="file" name="fichier"><br><br>
        <label for="name">ID</label><br>
        <input class="w-100 " type="text" name="id" placeholder="" value="<?=$result->pro_id?>" id="id" readonly><br><br>
        <label for="name">Référence</label><br>
        <input class="w-100 " type="text" name="reference" placeholder="" value="<?=$result->pro_ref?>" id="reference"><br><br>
        <label for="id">Catégorie</label><br>
        <select class="w-100"  name="categorie" placeholder="<?=$result->cat_nom?>" value="<?=$result->cat_nom?>" id="categorie">
            <option><?=$result->cat_nom?></option>;
            <?php foreach ($result_categories as  $categorie){
                echo("<option>$categorie->cat_nom</option>");};?>

        </select><br><br>
        <label for="libelle">Libellé</label><br>
        <input class="w-100 " type="text" name="libelle" placeholder="" value="<?=$result->pro_libelle?>" id="libelle"><br><br>
        <label for="description">Description</label><br>
        <textarea class="w-100" name="description" placeholder="" value="" id="description"><?=$result->pro_description?></textarea><br><br>
        <label for="prix">Prix</label><br>
        <input class="w-100" type="text" name="prix" placeholder="" value="<?=$result->pro_prix?>" id="prix"><br><br>
        <label for="stock">Stock</label><br>
        <input class="w-100" type="text" name="stock" placeholder="" value="<?=$result->pro_stock?>" id="stock"><br><br>
        <label for="couleur">Couleur</label><br>
        <input class="w-100" type="text" name="couleur" placeholder="" value="<?=$result->pro_couleur?>" id="couleur"><br><br>
        <label for="ajout">Date d'ajout</label><br>
        <input class="w-100" type="text" name="ajout" placeholder="" value="<?=$result->pro_d_ajout?>" id="ajout" readonly><br><br>
        <label for="modification">Date de modification</label><br>
        <input class="w-100" type="text" name="modification" placeholder="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" id="modification" readonly><br><br>
        <input class="w-100" type="hidden" name="extension" placeholder="" value="<?=$result->pro_photo?>" id="ajout" readonly><br><br>


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