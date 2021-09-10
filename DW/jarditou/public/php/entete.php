<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link type="text/css" rel="stylesheet" href="entete.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title ><?=$title?></title>   
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
                            <a class="nav-link <?php if($title =='Accueil'): ?>active<?php endif; ?>" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($title =='Tableau'): ?>active<?php endif; ?>" href="tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($title =='Contact'): ?>active<?php endif; ?>" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <?php if($title =='Tableau'): ?>
                    <form class="form-inline my-2 my-lg-0"  method="GET" action="tableau.php">
                        <input class="form-control mr-sm-2" type="search" name="recherche" id="test" placeholder="Votre recherche">
                                                                                    
                        <button class=" mr-5 btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                            
                    </form>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION["login"])) :?>
                    <div class="dropdown <?php if (isset($_GET['nouser'])){ echo 'show';} ?>">
                        <button class="btn btn-success dropdown-toggle" type="button" id="connexionMenu" data-toggle="dropdown" >
                            connexion
                        </button>
                        <div class="dropdown-menu dropdown-menu-right <?php if (isset($_GET['nouser'])){ echo 'show';} ?>">
                            <form class="px-4 py-3" action="public/php/login.php" method="POST">
                                <div class="form-group">
                                <label for="text">Email address</label>
                                <input type="text" class="form-control" id="login" name='login' placeholder="email@example.com">
                                <p class= "text-danger"><?php if (isset($_GET['nouser'])){ echo "Ce login n'existe pas";} ?></p>
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                                <input type="hidden" id="page" name='page' value=<?=$_SERVER['REQUEST_URI']?>>
                            </div>
                                <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Remember me
                                    </label>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a href="public/php/signUp.php"  class="dropdown-item" >New around here? Sign up</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION["login"])):?>
                        <form method="POST" action="public/php/logout.php">
                            <input type="hidden" id="page" name='page' value=<?=$_SERVER['REQUEST_URI']?>>
                            <button class=" btn btn-warning mb-2 mt-2 display-2 center-block" type="submit">Deconnexion</button>
                        </form>
                    <?php endif; ?>
                </div>
            </nav>
            <div class="row">
                    <img class="col" src="public/images/promotion.jpg" alt="promotion" title="promotion">
            </div>
            <div><?php if (isset($_SESSION["login"])){var_dump($_SESSION);} ?></div>  