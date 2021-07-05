<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title >Tableau</title>   
    </head>
    <body> 
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>
                </div>
            </nav>
            <div class="row">
                <img class="col" src="public/images/promotion.jpg" alt="promotion" title="promotion">
            </div>  
            <div class="table-responsive m-auto">
            <?php
                include 'public/php/connexion_bdd.php';
                // Connect to MySQL database
                $pdo = pdo_connect_mysql();

                // Prepare the SQL statement and get records from our contacts table
                $produits = $pdo->prepare('SELECT * FROM produits ORDER BY pro_id');
                $produits->execute();

                ?>
                <table class=" table table-hover table-bordered">
                    <thead class="font-weight-bold bg-light">
                        <tr>
                            <td>Photo</td>
                            <td>ID</td>
                            <td>Catégorie</td>
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
                            <td class="bg-warning"><?php $image= 'public/images/'.$produit['pro_id'].'.jpg';
                            echo '<img  width="80" src='.$image.' >'?></td>
                            <td class="text-center align-middle"><?=$produit['pro_id']?></td>
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
        </div>    
    
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