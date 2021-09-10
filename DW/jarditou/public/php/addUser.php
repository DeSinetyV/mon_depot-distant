<?php
session_start();

var_dump($_POST);


$_SESSION["login"] =$_POST["login"];
$_SESSION["role"] =$_POST["role"];
$pass= $_POST["password"];

var_dump($_SESSION);

echo"- session ID : ".session_id()."<br>";
echo"- Nom de la session : ".session_name();




require "connexion_bdd.php";
$db = pdo_connect_mysql();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//try{
    $role = $_SESSION["role"];
    $login =$_SESSION["login"];
    echo($role);
    $id_Acc = "SELECT Acc_id FROM accessright
    WHERE Acc_name = '$role'";
    echo $id_Acc;

// contrôle du role
    $id_Acc = $db->query($id_Acc)->fetch(PDO::FETCH_OBJ);echo"<br>";echo"<br>";
    //echo $id_Acc;echo"<br>";echo"<br>";
    var_dump($id_Acc);echo"<br>";
    $id_Acc =intval($id_Acc->Acc_id);
    echo($id_Acc);echo"<br>";echo"<br>";

//vérification unicité du login
    $test_login = "SELECT use_login FROM users
    WHERE Use_login = '$login'";
    $test_login = $db->query($test_login)->fetch(PDO::FETCH_OBJ);echo"<br>";echo"<br>";
    var_dump($test_login);


    $errors="";
     if ($test_login != false)
     {
     //    echo 'et merde!';
       $errors .= "doublon";
        header("Location: SignUp.php?".$errors);
    }

//hashage du password
$hash_password=password_hash($pass, PASSWORD_DEFAULT);
var_dump($hash_password);





if(isset($id_Acc)){

    $insert="insert INTO users (use_login, use_Acc_id, use_password) 
    VALUES (:login, :role, :password)";echo"<br>";echo"<br>";

        echo($_SESSION["login"]);echo"<br>";echo"<br>";
        echo($id_Acc);echo"<br>";echo"<br>";
        echo($_POST["password"]);echo"<br>";echo"<br>";
    $requete = $db->prepare($insert);

    $requete->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
    $requete->bindValue(':role', $id_Acc, PDO::PARAM_INT);
    $requete->bindValue(':password', $hash_password, PDO::PARAM_STR);

    //print_r($requete);
$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

    
}


// } catch (PDOException $e) {
//     $error = $e->getMessage();
//     echo "N° : " . $e->getCode();
//     }
//     if($error){
//         echo $error;
//     }else{
//  //   header("Location:../../tableau.php");
//     }


