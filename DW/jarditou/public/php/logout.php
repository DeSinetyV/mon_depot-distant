<?php
session_start();

var_dump($_POST);
$page = $_POST['page'];


$_SESSION["login"] = "";
$_SESSION["role"] = "";

unset($_SESSION["login"]);
unset($_SESSION["role"]);

if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-1);
}

session_destroy();
session_write_close();
header("location:".$page);




?>