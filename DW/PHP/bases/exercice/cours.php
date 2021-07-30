<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
exercice 1
<br>
<?php
$bonjour = "Bonjour le monde\n"; 
echo "<b>$bonjour</b><br>"; 

echo "Affichage d'un \" \t "; 
echo"test";"\n";
echo "\r\n \ttest2<br><br>";

$a = 6.32172; 
$b = intval($a); 
$c = doubleval($a); 
echo "$a  $b  $c<br><br>"; 

$myVar = "bonjour";
var_dump($myVar);

echo $_SERVER["SERVER_NAME"];
var_dump($_SERVER);

  $euro = 6.55957;
  printf("%.2f FF<br />",$euro);

  $money1 = 68.75;
  $money2 = 54.35;
  $money = $money1 + $money2;

  echo $money; // affiche 123.1;

  echo "affichage sans printf : ".$money."<br>";

  $monformat = sprintf("%01.2f", $money);

  echo $monformat; // affiche 123.10

  echo "affichage avec printf : ".$monformat."<br>";

  $year = "2002";
  $month = "4";
  $day = "5";

  $date = sprintf("%04d-%02d-%02d", $year, $month, $day);

  echo $date."<br>"; // affichera "2002-04-05"
  echo "affichage avec sprintf : ".$date."<br>";

  for ($a = 1; $a < 10; $a++) { 
    echo $a."<br>"; 
} 



?>
</body>
</html>*/
