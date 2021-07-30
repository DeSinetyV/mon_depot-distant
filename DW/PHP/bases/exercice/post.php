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

$prenom = $_GET['lastname'];  
$nom = $_GET['firstname'];  
echo $prenom;
print_r($prenom);





var_dump($_FILES);echo"<br><br>";
echo ($_FILES["fichier"]["error"]);echo"<br><br>";
echo ($_FILES["fichier"]["tmp_name"]);echo"<br><br>";
echo ($_FILES["fichier"]["name"]);echo"<br><br>";

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);

echo($mimetype);
echo ($_FILES["fichier"]["type"]);echo"<br><br>";


?>

</body>
</html>