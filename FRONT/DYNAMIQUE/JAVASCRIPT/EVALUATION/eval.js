
function exo1(){

    age=0;
    tab=[];
    var moins20=0; 
    plus40=0;
    milieu=0; 
    i=0;

    while(age !=100) {
        age=parseInt(prompt("Veuillez saisir un age:"));
        tab[i]=age;
        if(age>40){
            plus40 = plus40 +1;
        }else if(age<20){
            moins20++;
        }else{
            milieu++;
        }
        i++;
    }
    document.getElementById("resultat").textContent = "il y a "+plus40+" personnes de plus de 40 ans, "+milieu+" personnes qui ont entre 20 et 40 ans et "+moins20+" qui ont moins de 20 ans.";
}

function exo2(){

        /*   var X = parseInt(prompt("entrez la table de multiplication que vous voulez afficher: "));
            table(X);

            function table(nbr)
                for (i=0;i <= 10;i++){
                    document.write(i + " nbr " + nbr +" = " + String(i*nbr)+"<br>") */




    var X = parseInt(prompt("entrez la table de multiplication que vous voulez afficher: "));
    document.getElementById("resultat").innerHTML = ""  
    table(X);

    function table(nbr){
        for (i=0;i <= 10;i++){
            document.getElementById("resultat").innerHTML = document.getElementById("resultat").innerHTML +i + " X " + nbr +" = " + String(i*nbr)+"<br>"
        }    
    }
}

function exo3(){

    var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    var prenom = prompt("entrez un prénom: ");
    // mise en forme prenom
    prenom = firstLetterMaj(prenom);
    position = tab.indexOf(prenom);
    //Si le prenom est dans le tableau
    if (position != -1){
        tab[position] = "";
        tab.sort();
        tab2 =tab.splice(0, 1);
        tab.push(tab2[0]);

        document.getElementById("resultat").innerHTML = '["';
        for (i=0; i< tab.length -1; i++){
            document.getElementById("resultat").innerHTML = document.getElementById("resultat").innerHTML +tab[i]+'" ,"';
        }
        document.getElementById("resultat").innerHTML = document.getElementById("resultat").innerHTML+ ' "]';
    }else{
        document.getElementById("resultat").innerHTML ="Ce prénom n'apparait pas dans la liste";
    }

    // mise en forme prenom: 1 lettre MAJ, le reste en minuscule
    function firstLetterMaj(string) {
        string = string.toLowerCase();
        return string = string.charAt(0).toUpperCase() + string.slice(1);
    }
}


function exo4(){

    var PU = prompt("prix unitaire:");
    var QTECOM = prompt("quantité commandé:");
    TOT = PU*QTECOM;


    if (TOT<100) {
        REM = 0;
        PORT = 6;
        PAP = TOT + PORT - REM  ;
    } else if (TOT >=100 & TOT <=200) {
        REM = TOT/20;
        PORT = 6;
        PAP = TOT + PORT - REM ;
    } else if (TOT >200) {
        REM = TOT/10;
        if(TOT/50 <6 ){
            PORT=6;
        }else if(TOT-REM <=500){
            PORT = (TOT-REM)/50;
        }else{
            PORT= 0;
        }
        PAP = TOT + PORT - REM  ;
    }
    console.log(REM);
    console.log(PORT);
    console.log(PAP);
    document.getElementById("resultat").innerHTML ="Le prix à payer est de : "+ PAP.toFixed(2)+"€."

}

function exo5(){


    
}
            

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                            //HORS EVALUATION: configuration page EVAL.html
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// onClick boutons 1 à 5 
var bouton1= document.getElementById("Id_btn1");
bouton1.addEventListener("click",clickbtn1);
var bouton2= document.getElementById("Id_btn2");
bouton2.addEventListener("click",clickbtn2);
var bouton3= document.getElementById("Id_btn3");
bouton3.addEventListener("click",clickbtn3);
var bouton4= document.getElementById("Id_btn4");
bouton4.addEventListener("click",clickbtn4);
var bouton5= document.getElementById("Id_btn5");
bouton5.addEventListener("click",clickbtn5);



// onClick boutons "Lancer l'exercice"
document.getElementById("btn_Exo1").addEventListener("click",exo1);
document.getElementById("btn_Exo2").addEventListener("click",exo2);
document.getElementById("btn_Exo3").addEventListener("click",exo3);
document.getElementById("btn_Exo4").addEventListener("click",exo4);



// cacher toutes les consigne exercices
hidAll()


function clickbtn1(){       // fonction bouton 1
    hidAll()
    document.getElementById("titreExo").textContent="Exercice 1";
    document.getElementById("exo1").hidden= false;
    document.getElementById("code1").hidden= false;
}

function clickbtn2(){       // fonction bouton 2
    hidAll()
    document.getElementById("titreExo").textContent="Exercice 2";
    document.getElementById("exo2").hidden= false;
    document.getElementById("code2").hidden= false;
}

function clickbtn3(){       // fonction bouton 3
    hidAll()
    document.getElementById("titreExo").textContent="Exercice 3";
    document.getElementById("exo3").hidden= false;
    document.getElementById("code3").hidden= false;
}

function clickbtn4(){       // fonction bouton 4
    hidAll()
    document.getElementById("titreExo").textContent="Exercice 4";
    document.getElementById("exo4").hidden= false;
    document.getElementById("code4").hidden= false;
}

function clickbtn5(){       // fonction bouton 5
    hidAll()
    document.getElementById("titreExo").textContent="Exercice 5";
    document.getElementById("exo5").hidden= false;
}


function hidAll(){
    document.getElementById("resultat").innerHTML = "En attente du résultat"  
    document.getElementById("exo1").hidden= true;
    document.getElementById("exo2").hidden= true;
    document.getElementById("exo3").hidden= true;
    document.getElementById("exo4").hidden= true;
    document.getElementById("exo5").hidden= true;
    document.getElementById("code1").hidden= true;
    document.getElementById("code2").hidden= true;
    document.getElementById("code3").hidden= true;
    document.getElementById("code4").hidden= true;

}