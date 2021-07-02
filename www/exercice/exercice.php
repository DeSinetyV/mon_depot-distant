<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXERCICES PHP</title>
</head>
<body>
<br>
<?php
/*echo "<br><br>";
echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
echo "  EXERCICE 1  ";
echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
echo "<br><br>";

FOR ($a= 1 ; $a <150; $a=$a+2){
    echo $a." ";
};
echo "<br>";
FOR ($a= 1 ; $a <150; $a++){
    if ($a%2 == 1)
        echo $a." ";
    };

    echo "<br><br>";
    echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
    echo "  EXERCICE 2  ";
    echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
    echo "<br><br>";
    FOR ($a= 1 ; $a <500; $a++){
        echo"Je dois faire des sauvegardes régulières de mes fichiers ";
    };
    echo "<br><br>";
    echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
    echo "  EXERCICE 3  ";
    echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
    echo "<br><br>";


  $tableau = '<table border="1"><tr>';

    for($i =-1; $i <=12; $i++){
        if($i >= 0){
        $tableau .= "<th>".$i."</th>";
        }
        else{
            $tableau .= "<th></th>";  
        };
};

  for($a =0; $a <=12; $a++){
        $tableau .= '<tr>';
        $tableau .= "<th>".$a."</th>";
            for ($b=0; $b <=12; $b++){
                $tableau .= "<td>".$a*$b."</td>";
            };
        $tableau .= '</tr>';
        };
        $tableau .= '</table>';



  $tableau .= '<tr><td></td></tr>';
  $tableau .= '</table>';
  echo $tableau;*/
  echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
  echo "  EXERCICE 4  ";
  echo"///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////";
  echo "<br><br>";


function calculator($val1,$val2,$operateur){

    switch($operateur){
        case "+":
            echo $val1." + ".$val2." = ";
            return $val1+$val2; 
        case "-":
            echo $val1." - ".$val2." = " ; 
            return $val1-$val2;
        case "*":
            echo $val1." X ".$val2." = ";
            return $val1*$val2 ; 
        case "/":
            echo $val1." / ".$val2." = ";
            return $val1/$val2 ; 
    }   
};

echo calculator(100,50,"*");


?>

<br><br>
<form action="post.php" method="post" enctype="multipart/form-data">
<input type="file" name="fichier">
<input type="submit" value="Envoyer le fichier" />
</body>
</html>
