<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title >tableau</title>   
    </head>
    <body >
        <div class="container-fluid">
            <header>
                <div class="row justify-content-between">
                    <div class="col-lg-3 col mt-2 ">
                        <img src="public/images/jarditou_logo.jpg" class="img-fluid" alt="logo" title="logo" >  
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
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0"  method="GET" action="tableau.php">
                        <input class="form-control mr-sm-2" type="search" name="recherche" id="test" placeholder="Votre recherche">
                                                                                    
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                        <?php var_dump($_GET);?>     
                    </form>
                </div>
            </nav>
            <div class="row">
                    <img class="col" src="public/images/promotion.jpg" alt="promotion" title="promotion">
            </div>  

            <div class="table-responsive m-auto">
            <?php

                var_dump($_GET);
                
                include 'public/php/connexion_bdd.php';
                // Connect to MySQL database
                $pdo = pdo_connect_mysql();

                // Prepare the SQL statement and get records from our products table
                if (isset($_GET['recherche'])){
                    $recherche = $_GET['recherche'];
                    $produits = $pdo->prepare("SELECT * FROM produits 
                                            JOIN categories ON pro_cat_id = cat_id
                                            WHERE cat_nom LIKE '%$recherche%' OR pro_libelle LIKE '%$recherche%' 
                                            ORDER BY pro_id");
                    $produits->execute();

                }else{

                $produits = $pdo->prepare("SELECT * FROM produits 
                                           JOIN categories ON pro_cat_id = cat_id
                                           ORDER BY pro_id");
                $produits->execute();
                }
                ?>


                <form class="" method="GET" action="public/php/ajout.php">
                <input  class=" btn btn-success mb-2 mt-2 display-2 center-block" type="submit" value="  &#43;Ajouter un produit ">


                <table class=" table table-hover table-bordered">

                    <thead class="font-weight-bold bg-light">
                        <tr>
                            <td>Photo</td>
                            <td>ID</td>
                            <td>Catégorie</td>
                            <td>Référence</td>
                            <td>Libellé</td>
                            <td>Prix</td>
                            <td>Stock</td>
                            <td>Couleur</td>
                            <td>Ajout</td>
                            <td>Modif</td>
                            <td>Bloqué</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($produits as $produit):?>
                        
                        <tr >
                            <td class="bg-warning"><?php $image= 'public/images/'.$produit['pro_id'].".".$produit['pro_photo'];
                            echo '<img width=110px  src='.$image.' >'?></td>
                            <td class="text-center align-middle"><?=$produit['pro_id']?></td>
                            <td class="text-center align-middle" width=80><?=$produit['cat_nom']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_ref']?></td>
                            <td class="bg-warning text-center font-weight-bold align-middle"><a href="../public/php/read.php?pro_id=<?php echo $produit['pro_id']; ?>" class="text-danger"><u><h5><?php echo $produit['pro_libelle'];?><u><h5></a></td>
                            <td class="text-center align-middle"><?=$produit['pro_prix']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_stock']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_couleur']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_d_ajout']?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>    
                </table>
            </div>
<?php
include ("public/php/footer.php");
?>