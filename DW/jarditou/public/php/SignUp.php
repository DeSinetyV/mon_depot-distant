<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title >SignUp</title>   
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
             
             include 'connexion_bdd.php';
             // Connect to MySQL database
             $pdo = pdo_connect_mysql();

            $accessrights = $pdo->prepare("SELECT * FROM accessright
            ORDER BY Acc_id  DESC");
            $accessrights->execute();

?>

    <form  action="addUser.php" method="POST">
        <label class="mt-3" for="login">Login</label><br>
        <input class="w-50 " type="text" name="login" placeholder="" id="login" >
        <?php if (isset($_GET['doublon'])) { echo '<br><i class="text-danger"> Ce login existe déjà </i>'; } ?><br><br>
        <label for="password">password</label><br>
        <input class="w-50 " type="text" name="password" placeholder="" id="password" ><br><br>
        <fieldset>
            <h4 class="pt-1">Vos droits</h4>
                <select class="w-50" name="role" id="liste">
                    <?php foreach($accessrights as $accessright): ?>
                    <option><?= $accessright['Acc_name']?></option>
                    <?php endforeach; ?>
                </select><br>
        </fieldset><br>
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