<?php
///////////////////////////////////////////////////////////////////  EXERCICE 1 ////////////////////////////////////////////////////////////////
//Affichez la date du jour au format mardi 2 juillet 2019. 
$Date = new DateTime();

echo $Date->format("l d F Y");echo "<br>";

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');
echo strftime("%A %d %B %Y");

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 2 ////////////////////////////////////////////////////////////////
//Trouvez le numéro de semaine de la date suivante : 14/07/2019

$date= '14/07/2019';
$date2 = DateTime::createFromFormat('j/m/Y', $date);
echo $date2->format('W');


echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 3 ////////////////////////////////////////////////////////////////
//Combien reste-t-il de jours avant la fin de votre formation

$date= new DateTime();
echo $date->format('j/m/Y');echo "<br>";
$finFormation ='11/02/2022';
$finFormation = DateTime::createFromFormat('j/m/Y', $finFormation);""
echo $finFormation->format('j/m/Y');echo "<br>";

$interval = date_diff($date,$finFormation);
echo $interval->format('%a days');

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 4 ////////////////////////////////////////////////////////////////
//Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime(). 

$time = time();
echo $time;echo "<br>";
$mktime = mktime(0, 0, 0, 2, 11, 2022);
echo $mktime;echo "<br>";

$interval = $mktime - $time;
echo $interval;echo "<br>";
$interval = round($interval/86400);
echo $interval; echo " days";

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 5 ////////////////////////////////////////////////////////////////
//Quelle sera la prochaine année bissextile ? 

$date= new DateTime();
$year=$date->format('Y');

$bisextile =0;

while ($bisextile !=1){

    $bisextile=date('L',mktime(0, 0, 0, 1, 1, $year));
    $year++;
}
$year= $year-1;
echo "L'année $year sera la prochaine année bisextile";

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 6 ////////////////////////////////////////////////////////////////
//Montrez que la date du 17/17/2019 est erronée. 
$date='17/17/2019';
list($dd,$mm,$yyyy) = explode('/', $date);

$dd = (int) $dd;
$mm = (int) $mm;
$yyyy = (int) $yyyy;

if (!checkdate($mm, $dd, $yyyy))
{         
    echo"La date ".$date." est erronée.<br>";
    if(!checkdate(1, $dd, 1)){
        echo "le jour est incorrect <br>";
    };
    if(!checkdate($mm, 1, 1)){
        echo "le mois est incorrect <br>";  
    };
    if(!checkdate(1, 1, $yyyy)){
        echo "l'année est incorrect <br>";
    };    
}
else if (checkdate($mm, $dd, $yyyy))
{
    echo "La date ".$date." valide.<br>";

}

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 7 ////////////////////////////////////////////////////////////////
//Affichez l'heure courante sous cette forme : 11h25.
$date= new DateTime();
echo $Date->format("G\hi");

echo "<br>";echo "<br>";
///////////////////////////////////////////////////////////////////  EXERCICE 8 ////////////////////////////////////////////////////////////////
//Ajoutez 1 mois à la date courante. 
$date= new DateTime();
echo $date->format('d/m/y');echo "<br>";
$date->add(new DateInterval('P1M'));
echo $date->format('d/m/y');

















































?>

</body>
</html>