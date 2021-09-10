<?php
session_start();

var_dump($_POST);

//le login from log.php devient $_SESSION["login"]

$_SESSION["login"] =$_POST["login"];

var_dump($_SESSION);

// $_SESSION["login"] = ;
// $_SESSION["role"] = ;

//echo $_SESSION["login"];
//var_dump($_SESSION);


echo"- session ID : ".session_id()."<br>";
echo"- Nom de la session : ".session_name();


//Si un $_SESSION["login"] existe est et non vide, l'utilisateur est redirigé vers tableau.php

if(isset($_SESSION["login"])  && $_SESSION["login"] !=''){

    header("Location:../../tableau.php");
}else{
    header("Location:log.php");
}



?>