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

$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$birthday=$_POST["birthday"];
$code=$_POST['code'];
$address=$_POST['address'];
$city=$_POST['city'];
$mail=$_POST['mail'];
if (!empty($_POST['validation'])) {
    $validation=$_POST['validation'];}
$count = 0;

if (empty($_POST["lastname"])) {
    echo "Le nom doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[a-zéèêàâîïA-Z '-]+$/",$lastname)){
    echo "le nom n'est pas valide <br>";
    $count++;
}else{ echo $lastname."<br>";}



if (empty($_POST["firstname"])) {
    echo "Le prénom doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[a-zéèêàâîïA-Z -]+$/",$firstname)){
    echo "le prenom n'est pas valide <br>";
    $count++;
}else{ echo $firstname."<br>";}


if (empty($_POST["birthday"])){
    echo "La date de naissance doit être renseigné <br>";
    $count++;
}else if (!strtotime($_POST["birthday"])){
    echo "La date de naissance n'est pas valide <br>";
    $count++;
}else{ echo $birthday."<br>";}


if (empty($_POST["code"])){
    echo "Le code postal doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[0-9]{5}$/",$code)){
    echo "Le code postal n'est pas valide <br>";
    $count++;
}else{ echo $code."<br>";}


if (empty($_POST["address"])) {
    echo "L'adresse doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[0-9a-zA-Z ,'-]+$/",$address)){
    echo "L'adresse n'est pas valide <br>";
    $count++;
}else{ echo $address."<br>";}


if (empty($_POST["city"])) {
    echo "La ville doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[a-zéèêA-Z '-]+$/",$city)){
    echo "La ville n'est pas valide <br>";
    $count++;
}else{ echo $city."<br>";}


if (empty($_POST["mail"])) {
    echo "L'adresse mail doit être renseigné <br>";
    $count++;
}else if(!preg_match("/^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+[.][a-z]{2,5}$/",$mail)){
    echo "L'adresse mail n'est pas valide <br>";
    $count++;
}else{ echo $mail."<br>";}

if (!empty($_POST['validation'])) {
    if ($validation !="Yes"){
        echo "Le traitement informatique de ce formulaire n'est pas coché <br>";
        $count++;
    }
}

if(!isset($_POST['validation'])){

        echo "La case 'Jaccepte le traitement informatique de ce formulaire' n'est pas coché <br>";
        $count++;
     };


echo $count;
if ($count == 0){
    var_dump($_POST);}
?>

</body>
</html>