
/*
function btn(){
    alert("OK");
 };
 function btn2(){
    alert('Vous avez cliqué !');
 };

 var btn1 = document.getElementById("btn1");
btn1.addEventListener("click",btn)

 document.querySelector('#btn1').onclick = btn2

 *//* EXERCICE 15_1 *//*

var btn1 = document.getElementById("btn1");
btn1.addEventListener("click",btn);

function btn(){
    var saisie = document.getElementById("text").value;
    alert("Vous avez saisi: "+ saisie );
 };

 *//*  EXERCICE 15_2 */
 
 var random = parseInt(Math.random() * 10)  
 console.log(random)

 function verif(){
   document.getElementById("button1").value = "Vérifier";
   var saisie= document.getElementById("textBox1").value;
   console.log(saisie)

      if (isNaN(saisie)){
         document.getElementById("label1").textContent = "Ceci n'est pas un nombre!";
      console.log(saisie)
      }
      else if (saisie < 0 || saisie > 10){
         document.getElementById("label1").textContent = "veuiller saisir un nombre compris entre 0 et 10 inclus";
         console.log(saisie)
      }
      else if ( saisie > random){
         document.getElementById("label1").textContent = "Trop grand !";
         console.log(saisie);
      }
      else if ( saisie < random){
         document.getElementById("label1").textContent = "Trop petit !";
         console.log(saisie);
      }else if ( saisie == random){
         document.getElementById("label1").textContent = "Bravo!";
         console.log(saisie);
         newGame();

      }
      document.getElementById("textBox1").value = ""
}
 function newGame(){
   document.getElementById("button1").value = "recommencer";
   var random = parseInt(Math.random() * 10)  



 } 