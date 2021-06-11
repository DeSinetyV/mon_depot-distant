
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
            milieu++
        }
        i++
    }
    document.getElementById("resultat").textContent = "il y a "+plus40+" personnes de plus de 40 ans, "+milieu+" personnes qui ont entre 20 et 40 ans et "+moins20+" qui ont moins de 20 ans."
}










function exo2(){

    age= prompt("Veuillez saisir un age:")
    
}

function exo3(){

        age= prompt("Veuillez saisir un age:")
        
}


function exo4(){

    age= prompt("Veuillez saisir un age:")
    
}


function exo5(){

    age= prompt("Veuillez saisir un age:")
    
}
            
    
        
      

































/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                            //HORS EVALUATION: mise en forme page EVAL.html
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
document.getElementById("btn_Exo5").addEventListener("click",exo5);


// cacher toutes les consigne exercices
document.getElementById("exo1").hidden= true;
document.getElementById("exo2").hidden= true;
document.getElementById("exo3").hidden= true;
document.getElementById("exo4").hidden= true;
document.getElementById("exo5").hidden= true;


function clickbtn1(){       // fonction bouton 1
    document.getElementById("titreExo").textContent="Exercice 1";
    document.getElementById("exo1").hidden= false;
    document.getElementById("exo2").hidden= true;
    document.getElementById("exo3").hidden= true;
    document.getElementById("exo4").hidden= true;
    document.getElementById("exo5").hidden= true;

}

function clickbtn2(){       // fonction bouton 2
    document.getElementById("titreExo").textContent="Exercice 2";
    document.getElementById("exo1").hidden= true;
    document.getElementById("exo2").hidden= false;
    document.getElementById("exo3").hidden= true;
    document.getElementById("exo4").hidden= true;
    document.getElementById("exo5").hidden= true;

}

function clickbtn3(){       // fonction bouton 3
    document.getElementById("titreExo").textContent="Exercice 3";
    document.getElementById("exo1").hidden= true;
    document.getElementById("exo2").hidden= true;
    document.getElementById("exo3").hidden= false;
    document.getElementById("exo4").hidden= true;
    document.getElementById("exo5").hidden= true;
}

function clickbtn4(){       // fonction bouton 4
    document.getElementById("titreExo").textContent="Exercice 4";
    document.getElementById("exo1").hidden= true;
    document.getElementById("exo2").hidden= true;
    document.getElementById("exo3").hidden= true;
    document.getElementById("exo4").hidden= false;
    document.getElementById("exo5").hidden= true;
}

function clickbtn5(){       // fonction bouton 5
    document.getElementById("titreExo").textContent="Exercice 5";
    document.getElementById("exo1").hidden= true;
    document.getElementById("exo2").hidden= true;
    document.getElementById("exo3").hidden= true;
    document.getElementById("exo4").hidden= true;
    document.getElementById("exo5").hidden= false;
}