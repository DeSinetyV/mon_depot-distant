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
///////////////////////////////////////////////////////////////////  EXERCICE 1 ////////////////////////////////////////////////////////////////

function calculator($ope1, $ope2, $sign){

    if($sign == "+"){
        return $ope1 + $ope2;
    }
    elseif ($sign == "-"){
        return $ope1 - $ope2;
    }
    elseif ($sign == "*"){
        return $ope1 * $ope2;
    }
    elseif ($sign == "/"){
        return $ope1 / $ope2;
    }


}

echo calculator(1,2,"+");?><br><?php 
echo calculator(1,2,"-");?><br><?php 
echo calculator(1,2,"*");?><br><?php 
echo calculator(1,2,"/")

    ?>

</body>
</html>