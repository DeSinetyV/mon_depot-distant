<?php 
    $myString = "Vive les formateurs"; 
    $myInteger = (integer)$myString; 
var_dump($myInteger);



function coucou($name = "Maxime") { 
   return "Hey $name!\n"; 
};
print coucou(); ?><br><?php 
print coucou("Morgan");?><br><?php 
print coucou("Eric"); 

$myarray = array("a"=>"Pommes", "b"=>"Oranges", 
"c"=>"Poires"); 
    var_dump($myarray);

    arsort($myarray);
    var_dump($myarray);
?>