<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


echo '/////////////////////////////////////////////////////////////  V1 /////////////////////////////////////////////<br>';
function test($X)
{
 
$Y =0;
if (  gettype($X) == "double"){
  $X =explode(".", $X);
  $Y=$X[1];
  $X=$X[0];
  }

echo "You need :<br>";

$bn50=intdiv($X,50);$X = $X % 50;
if($bn50 >0)echo $bn50." banknotes of 50<br>";
$bn20=intdiv($X,20);$X = $X % 20;
if($bn20 >0)echo $bn20." banknotes of 20<br>";
$bn10=intdiv($X,10);$X = $X % 10;
if($bn10 >0)echo $bn10." banknotes of 10<br>";
$bn5=intdiv($X,5);$X = $X % 5;
if($bn5 >0)echo $bn5." banknotes of 5<br>";
$coin2=intdiv($X,2);$X = $X % 2;
if($coin2>0)echo $coin2." coins of 2<br>";
$coin1=$X;
if($coin1 >0)echo $coin1." coins of 1<br>";

$coin05=intdiv($Y,5);$Y = $Y % 5;
if($coin05>0)echo $coin05." coins of 0.5<br>";
$coin02=intdiv($Y,2);$Y = $Y % 2;
if($coin02>0)echo $coin02." coins of 0.2<br>";
$coin01=$Y;
if($coin01>0)echo $coin01." coins of 0.1<br>";
}


test(203.50);

echo '/////////////////////////////////////////////////////////////  V2 /////////////////////////////////////////////<br>';

?>

<form method="POST" name="form1" id="form1" action="test.php">
    <label for="price">Entrez la valeur a rendre:</label><br>
    <input type="text" id="price" name="price" >
    <input type="submit" name="value" value="calculer"/>
</form>

<?php

function test2($price){

 
  $values=[50,20,10,5,2,1,0.50,0.20,0.10,0.05,0.02,0.01];

  $i=0;   // coin ou banknote
  $ii=0;  // virgule ou pas

  echo "You need :<br>";
  foreach ($values as $value){

  //  echo $price/$value.'<br>';
    $rendu=floor($price/$value); $price = $price -$rendu*$value;   
  //  echo $price.'<br>';
    if($rendu>0){
      if ($ii >0){echo ",<br>";}  // virgule puis retour a la ligne si ce n'est pas la 1ere valeur retourné
      echo $rendu;
        if($i > 3){               // billets ou pièces
          if($rendu==1){          // "coins" ou "coin"
            echo " coin of ";
          }else{
            echo " coins of ";
          }
        }else{ 
          if($rendu==1){          //banknote ou banknotes
            echo " banknote of ";
          }else{
            echo " banknotes of ";
          }
        }
        if($i < 6){               // euros ou centimes
        echo $value." euros";
        }else{
        echo ($value*100)." cents";
        }
        $ii++;
    }
    $i++;
  }
  if ($ii ==0) echo "rien a rendre...";
  echo".";
  }

  if(isset($_POST['price'])) {
    $price=$_POST['price'];
    $chaine="#^[0-9]*(\.[0-9]{0,2})?$#";

    if(!preg_match($chaine, $price)){
      echo "veuiller rentrer un prix correct<br>";
    }else{test2($price);};
   
   // var_dump($_POST);
  }

?>



</body>
</html>

