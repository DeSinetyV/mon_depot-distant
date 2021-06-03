/* EXERCICE JS 05
var sexe
var nom=prompt("Saisissez votre nom");
var prenom = prompt("Saisissez votre prénom");
if (window.confirm("Etes vous un homme ?") == true)
{
    sexe = "Monsieur";
}
else
{
    sexe= "Madame";
}
alert("Bonjour " + sexe + " " + prenom + " " + nom);

*/

 /*EXERCICE JS 06 

a = "100";
b = 100;
c = 1.00;
d = true;

alert( "Ceci est un " + typeof a + " : " + a);
b -= 1; alert(b);
c += Number(a); alert(c);
d = !d; alert(d);
*/

/* EXERCICE JS 07-01 *//*

var a = prompt("entrez un chiffre");
if(a %2 == 0){
    alert(a + " est pair");
}
else if(isNaN(a)){
    alert( "veuillez indiquer une valeur numerique ");
}
else{
    alert(a + " est impair");
}
*/

/* EXERCICE JS 07-02 *//*

var a = prompt("entrez votre date de naissance");
var date = new Date;
date= date.getFullYear();
age = date - a

if(age > 18){
    alert("Vous êtes majeur");
}
else if(isNaN(a)){
    alert( "veuillez indiquer une valeur numerique ");
}
else{
    alert("Vous êtes mineur")
}

*/

/* EXERCICE JS 07-03 *//*

var nbr1 = parseInt(prompt("veuillez choisir un premier nombre:"));
var nbr2 = parseInt(prompt("veuillez choisir un second nombre:"));
var operateur = prompt("veuillez choisir un operateur (parmis +, - , * et /):");
var resultat

if (isNaN(nbr1) || isNaN(nbr2) || !(operateur == "+" || operateur == "-" || operateur == "*" || operateur == "/" )){
    alert("Veuillez entrer des informations conformes !" );

}
else {

    switch(operateur){
        case "+" :
            resultat = nbr1 + nbr2;
  //          document.write(" le resultat est " + String(nbr1 + nbr2));
            break;
        case "-" :
            resultat = nbr1 - nbr2;

            break;
        case "*" :
            resultat = nbr1 * nbr2;

            if( nbr2 == 0){
                alert("division par 0 impossible")
            }
            else{
            resultat = nbr1 * nbr2;
s
            }
            break;
        case "/" :
            resultat = nbr1 / nbr2;

            break;

    }
    document.write(resultat);
}
*/
/* EXERCICE JS 08-01 *//*


var prenom =[]
var i = 0
do{
    prenom[i] = prompt("saisissez un prénom :");
    console.log(prenom);
    i++
}while (prenom[i - 1] != "");

document.write(i);

for (var ii in prenom){
    document.write("<br>"+prenom[ii]);
}

*//* EXERCICE JS 08-02 *//*


nbr = prompt("saisissez un nombre :");
var i = 1;

while (i < nbr) {
    console.log(i)
    i++

}
*//* EXERCICE JS 08-03 *//*
var nbr =[];
var i = 0;
var somme = 0;
var moyenne = 0;

do{
   nbr [i] = parseInt(prompt("saisissez un nombre :"));
   console.log(nbr)
    i++;
}while (nbr[i - 1] != 0);
console.log(nbr.length);

for (a in nbr){ 
    console.log(a)
    somme += nbr[a]
    console.log(somme);
    a++;
}
console.log("somme totale " +somme);
moyenne = somme / (nbr.length -1);
console.log("moyenne de tous les résultats " + moyenne);

*//* EXERCICE JS 08-04 *//*
var i = 1;
var X = parseInt(prompt("entrez X: "));
var N = parseInt(prompt("entrez N: "));

while (i <= N){
    console.log(i + " X " + X +" = " + String(i*X));
    i++;

}
azerty
*//* EXERCICE JS 08-05 *//*

//var mot = prompt("Entrez un mot");
//var voyelles = "aeiouy";         
//var compteur = 0;          
//for (i=0;i<mot.length;i++){             
//    var lettre = mot.substring(i, i+1);                  
//   if (voyelles.indexOf(lettre) != -1){                 
//        compteur++;             
//    }         
//}          
//alert("Le nombre de voyelles est de : " + compteur);

var myVar = prompt("entrer un mot: ");
var nbrVoyelles = 0;
var i = 0;
console.log(myVar)
while (i < myVar.length){
    if (myVar[i] == "a" || myVar[i] == "e" || myVar[i] == "i" || myVar[i] == "o" || myVar[i] == "u" || myVar[i] == "y"){
        nbrVoyelles++;
        console.log((i+1) + " --> " + myVar[i] );
    }
    i++;
}
console.log("nombre de caractères --> " + myVar.length);
console.log("nombre de voyelles --> " + nbrVoyelles);
console.log("nombre de consonnes --> " + (myVar.length - nbrVoyelles) );

*//* EXERCICE JS 09-01  (voir papillon.html pour la version fonctionnelle) *//*

    var X = parseInt(prompt("entrez X: "));
            var Y = parseInt(prompt("entrez N: "));

            function produit(arg1,arg2){

                resultat= arg1*arg2;

            }

            function afficheImg(image){

           //      var img = document.createElement("img");
           //     img.src = image;
           //     var papillon = document.getElementById("emplacementPapillon")
           //     papillon.appendChild(img);

                document.write("<img src="+image+">")

            }
            afficheImg("images/papillon.jpg")


            produit(X,Y)
            carre = Math.pow(X,4);
            document.write("<br>"+" le cube de "+X+" est égal à "+carre+"<br>");
            document.write("\n le produit\n de "+X+" x "+Y+" est égal à "+resultat);


*//* EXERCICE JS 09-02 *//*

var liste1 = ["vincent","marie","antoine"];
var separateur= " ; ";
let position = 2  ;

function strtok(str1,str2,n){
var i = 0;
    for (i in str1){
        if (i <str1.length -1){
            document.write(str1[i]+" "+ str2 +" ");
            i++;       
        }
        else{
            document.write(" "+str1[i] + ".")
        }
    }
     document.write("<br>Le mot en position "+n+" dans la liste est "+ str1[n])
}
strtok(liste1, "&", 2);

*//* EXERCICE JS 10-1 *//*

var longueurTableau=parseInt(prompt("Entrez la longueur désiré du tableau: "));

tableau = new Array(longueurTableau);
//console.log(tableau);

for (i = 0; i < tableau.length;i++){
    tableau[i] = prompt("Entrez la valeur "+ (i+1)+" de votre tableau" )
    
} 
console.log(tableau);
document.write(tableau);

*//* EXERCICE JS 10-2 */

function getInteger(){
        parseInt(prompt("Veuiller saisir un nombre entier:"));
        return;
}

function initTab(){
     longeur =parseInt(prompt("Veuiller saisir la taille de votre tableau:"));
     tableau= new Array(longeur);
}

function saisieTab(){
    for (i = 0; i < tableau.length;i++){
        tableau[i] = prompt("Entrez la valeur "+ (i+1)+" de votre tableau: ");
        
    }
}

function afficheTab (){
    for (i = 0; i < tableau.length;i++){
        document.write(tableau[i]+ "<br>");
    }
}

function rechercheTab(){
    position= prompt("Quelle position du tableau voulez vous consulter ?:");
    document.write(tableau[position -1]+ "<br>");
}
function infoTab(){
    var total = 0;
    for (i = 0; i < tableau.length;i++){
        total = total+parseInt(tableau[i]);
        console.log(total);
    }
    document.write(total/i)
   // document.write(tableau.max())


}
function appel() {
    var choix = prompt (" 1, 2 ou 3");
    switch(choix){
        case "1":
            afficheTab();
            appel();
        case "2":
            rechercheTab();
            appel();
        case "3":
            infoTab();
            appel();
        case "0":
            break;
        default:
            break;

    }
    
}
initTab();
saisieTab();
appel();



























