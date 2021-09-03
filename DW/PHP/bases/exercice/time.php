<?php
echo time();echo "<br>";

$date = date("d/m/Y");
echo"Nous sommes le ".$date;echo "<br>";
// Ou directement :
echo"Nous sommes le ".date("d.m.Y H:i:s");


$oDate = new DateTime();
var_dump($oDate);
echo $oDate->format("d/m/Y H\hi");echo "<br>";



//$oDate = new DateTime($macolonne_sql);
$oDate = new DateTime('2018-11-16 11:26:51');
echo $oDate->format("d/m/Y H\hi");echo "<br>";



$datePattern = "/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/";
$date = "2019-16-39";

if (preg_match($datePattern, $date))
{
    echo "Date ".$date." valide.<br>";
}
else 
{
    echo "Date ".$date." erronée.<br>";
} 



//$date = "01/10/2019";
//$date = "39/16/2019";

/* 
* - On découpe la chaîne $date selon '/' avec la fonction explode() qui retourne un tableau 
* - Les éléments du tableau sont directement afffecté à des variables ($dd, $mm, $yyyy) dans un ordre respectif grâce à la fonction list()      
*/
//list($dd, $mm, $yyyy) = explode('/', $date);
list($yyyy,$mm, $dd) = explode('-', $date);

/* Les variables $dd, $mm, $yyyy sont des chaînes, or la fonction checkdate()  
* n'accepte que des entiers
*/
echo gettype($dd); // indique que $dd est une chaîne
echo "<br>";

/* On va donc 'caster' c'est-à-dire changer le type d'une variable,
* ici on veut un entier, la syntaxe est de l'indiquer avec (int) 
* devant la variable
*/ 
$dd = (int) $dd;

echo gettype($dd); // $dd est désormais bien un entier
echo "<br>";

$mm = (int) $mm;
$yyyy = (int) $yyyy;

if (!checkdate($mm, $dd, $yyyy))
{         
    echo"Date ".$date." est erronée.";
}
else if (checkdate($mm, $dd, $yyyy))
{
    echo "Date ".$date." valide.<br>";
} 

$dateTime = DateTime::createFromFormat('Y-m-d', $date);
var_dump($dateTime);

echo $dateTime->format("d/m/Y H\hi");echo "<br>";
$errors = DateTime::getLastErrors();
echo $errors['warning_count'];
if (!empty($errors['warning_count'])) 
{
   return FALSE;
}
?>
