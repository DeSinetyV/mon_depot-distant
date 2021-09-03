
<?php 



///////////////////////////////////////////////////////////////////  EXERCICE 1 V1 ////////////////////////////////////////////////////////////////
//parcourir un répertoire pour lister les fichiers qu'il contient. 

$nom_dossier = '.';
$dossier = opendir($nom_dossier);

while($fichier = readdir($dossier))
{
if($fichier != '.' && $fichier != '..')
{
echo $fichier.'<br/>';
}
}
closedir($dossier);



///////////////////////////////////////////////////////////////////  EXERCICE 1 V2 ////////////////////////////////////////////////////////////////
//parcourir un répertoire pour lister les fichiers qu'il contient. 


function lister($chemin)
{
    echo '<pre>';
    if ($chemin == '.'){
   echo '<u>Contenu du dossier courant</u><br><blockquote>';
    }else{
    echo '<u>Contenu du dossier '.$chemin.'</u><br><blockquote>';
    }

   //on ouvre un pointeur sur le repertoire
   $opendir = opendir($chemin);
   
   //pour chaque fichier et dossier
   while ($fichier = readdir($opendir))
   {
      //on ne traite pas les . et ..
      if(($fichier != '.') && ($fichier != '..'))
      {
         //si c'est un dossier, on le lit
         if (is_dir($chemin.'/'.$fichier)){
            lister($chemin.'/'.$fichier);
         }
         else
         {
            //c'est un fichier, on l'affiche
            echo $fichier.'<br>';
         }
      }
   }
   echo '</blockquote>';
   
   //fermeture du pointeur
   closedir($opendir);
   echo '</pre>';
}
lister('../../bases');

///////////////////////////////////////////////////////////////////  EXERCICE 2 ////////////////////////////////////////////////////////////////
//Téléchargez le fichier ListeLiens.zip contenant des adresses web et écrire un programme qui lit ce fichier pour
// construire une page web contenant une liste de liens hypertextes.

// On ouvre le fichier ListeLiens.txt
$fichier = fopen("ListeLiens.txt","r");
echo "<h1>Liste des liens</h1><hr><ul>";

// Boucle jusqu'à la fin du fichier
while (!feof($fichier)) {
    $lien = fgets($fichier,255);
    echo "<li><a href='".$lien."'>".$lien."</a></li>";
}
echo "</ul><hr>";
// on referme le fichier ListeLiens.txt
fclose($fichier);

echo"<br>";


///////////////////////////////////////////////////////////////////  EXERCICE 3 ////////////////////////////////////////////////////////////////
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="fichier">
<input class="btn btn-dark btn btn-outline-primary text-white" type="submit" value="Envoyer"> 
