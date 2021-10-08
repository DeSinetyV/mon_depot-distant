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


$X = 107.19;
$X =explode(".", $X);
$Y=$X[1];
$X=$X[0];


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

?>


  
</body>
</html>

