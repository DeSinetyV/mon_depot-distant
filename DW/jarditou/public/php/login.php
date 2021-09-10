<?php
session_start();

// var_dump($_POST);


// // $_SESSION["login"] =$_POST["login"];
// // $_SESSION["role"] =$_POST["role"];

// $_SESSION["login"] ='test1';
// $_SESSION["role"] ='administrateur';

// var_dump($_SESSION);




// echo"- session ID : ".session_id()."<br>";
// echo"- Nom de la session : ".session_name();


// //Si un $_SESSION["login"] existe et est non vide, l'utilisateur est redirigé vers tableau.php

// if(isset($_SESSION["login"])  && $_SESSION["login"] !=''){

//     header("Location:../../tableau.php");
// }


if (isset($_POST['submit']))
{
    echo 'test';
    $login= $_POST['login'];
    $pass= $_POST['password'];
    
    var_dump($_POST);
}
var_dump($_POST);
$login= $_POST['login'];
$pass= $_POST['password'];
$page= $_POST['page'];



require "connexion_bdd.php"; // Connexion base
$db = pdo_connect_mysql();

$user= "SELECT * FROM users
        join accessright ON use_Acc_id=Acc_id  WHERE use_login= '$login'";
$user= $db ->prepare($user);
$user-> execute();

var_dump($user->rowCount());


var_dump($user);
$row = $user->fetch(PDO::FETCH_OBJ);
var_dump($row->Acc_name);

$nouser= explode("?",$page);


//si l'utilisateur existe
if($user->rowCount() > 0){
    //si le password est correct
    if (password_verify($pass,$row->use_password)){
  
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["role"]=$row->Acc_name;

    var_dump($_SESSION);

    if(isset($nouser[1])){
        if ($nouser[1] == "nouser"){
            $page=$nouser[0];
            echo($page);}
    }   
   header("location:".$page);

    }else{ //si le password est incorrect
        $errors .= "?badpassword";
        header("location:".$page.$errors);


    }

 }
 else{
     //    echo 'et merde!';
     
     if (!isset($nouser[1])){
     $errors .= "?nouser";
     header("location:".$page.$errors);
    }else{
   header("location:".$page);}
}



?>