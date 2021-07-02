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

$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
     "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
     "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
    );
///////////////////////////////////////////////////////////////////  EXERCICE 1 ////////////////////////////////////////////////////////////////

$b = array_keys($a["19002"],"Validation");
print_r($b[0]+1);echo"<br><br>";

///////////////////////////////////////////////////////////////////  EXERCICE 2 ////////////////////////////////////////////////////////////////

$b = $a["19001"];
$i=0;
echo sizeof($b);echo"<br><br>";

for($i=0;$i < sizeof($b); $i++ ){
    if($b[$i] == "Stage"){
        $fin_stage= $i+1;
    }
}
echo $fin_stage;echo"<br><br>";

///////////////////////////////////////////////////////////////////  EXERCICE 3 ////////////////////////////////////////////////////////////////

print_r($a);echo"<br><br>";


foreach( $a as $clef => $valeur ){
    echo $clef;echo"<br><br>";
    $array2[] = $clef;
    }
    print_r($array2);echo"<br><br>";


///////////////////////////////////////////////////////////////////  EXERCICE 4 ////////////////////////////////////////////////////////////////

$b = $a["19003"];
$i=0;

foreach( $b as $value ){
    if($value == "Stage"){
        $i++;
    }
}
echo $i;echo"<br><br>";



    ?>

</body>
</html>