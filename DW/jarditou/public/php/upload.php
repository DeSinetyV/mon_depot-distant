<?php
var_dump($_FILES);
echo $_FILES["fichier"]["name"];

// Si c'est un tableau et que celui-ci n'est pas vide  
if (is_array($_FILES["fichier"]["error"]) and ($_FILES["fichier"]["error"]) != 0 ) ;
{ 
    // Boucle pour afficher les messages d'erreurs    
    var_dump($_FILES["fichier"]["error"]);
    
    switch($_FILES["fichier"]["error"])  {
        case 1:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case 2:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case 3:
            $message = "The uploaded file was only partially uploaded";
            break;
        case 4:
            $message = "No file was uploaded";
            break;
        case 5:
            $message = "Missing a temporary folder";
            break;
        case 6:
            $message = "Failed to write file to disk";
            break;
        case 7:
            $message = "File upload stopped by extension";
            break;
        case 0:
            $message = "upload correct";
            break;
        default:
            $message = "Unknown upload error";
            break;
    }
    echo $message; 
} 
// On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On ouvre l'extension FILE_INFO
$finfo = finfo_open(FILEINFO_MIME_TYPE);

// On extrait le type MIME du fichier via l'extension FILE_INFO 
$mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);

// On ferme l'utilisation de FILE_INFO 
finfo_close($finfo);

if (in_array($mimetype, $aMimeTypes))
{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */    
    move_uploaded_file($_FILES["fichier"]["tmp_name"], "images/".$_FILES["fichier"]["name"]);        
    
} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR

   echo "Type de fichier non autorisé";    
   exit;
}    
?>
