//var submit=document.getElementById("idSubForm1");
//submit.addEventListener("click", verif);

var filtreNom = new RegExp("^[A-Za-z0-9]");
var filtreMail=new RegExp("^[A-Za-z0-9.-_]+[@][A-Za-z0-9.-_]+[.][a-z]{2,4}$");
var filtreCodePostal=new RegExp("^[0-9][0-9][0-9][0-9][0-9]$");

console.log(document.getElementById("societe").class)

function verif(){
    var societe= document.getElementById("societe").value;
    console.log(societe);
    societe = filtreNom.test(societe);
    console.log(societe);
    if (societe == false){
        document.getElementById("labelSociete").classList.add("text-danger");
        document.getElementById("messageErreurSociete").classList.remove("d-none");
    } else {
        document.getElementById("labelSociete").classList.remove("text-danger");
        document.getElementById("messageErreurSociete").classList.add("d-none");
    }

    var contact=document.getElementById("contact").value;
    console.log(contact);
    contact = filtreNom.test(contact);
    console.log(contact);
    if (contact== false){
        document.getElementById("labelContact").classList.add("text-danger");
        document.getElementById("messageErreurContact").classList.remove("d-none");
    } else {
        document.getElementById("labelContact").classList.remove("text-danger");
        document.getElementById("messageErreurContact").classList.add("d-none");
    }

    var ville=document.getElementById("ville").value;
    console.log(ville);
    ville = filtreNom.test(ville);
    console.log(ville);
    if (ville == false){
        document.getElementById("labelVille").classList.add("text-danger");
        document.getElementById("messageErreurVille").classList.remove("d-none");
    } else {
        document.getElementById("labelVille").classList.remove("text-danger");
        document.getElementById("messageErreurVille").classList.add("d-none");
    }
    
    var code=document.getElementById("code").value;
    console.log(code);
    code = filtreCodePostal.test(code);
    console.log(code);
    if (code == false){
        document.getElementById("labelCode").classList.add("text-danger");
        document.getElementById("messageErreurCode").classList.remove("d-none");
    } else {
        document.getElementById("labelCode").classList.remove("text-danger");
        document.getElementById("messageErreurCode").classList.add("d-none");
    }
    
    var mail=document.getElementById("mail").value;
    console.log(mail);
    mail = filtreMail.test(mail);
    console.log(mail);
    if (mail == false){
        document.getElementById("labelMail").classList.add("text-danger");
        document.getElementById("messageErreurMail").classList.remove("d-none");
    } else {
        document.getElementById("labelMail").classList.remove("text-danger");
        document.getElementById("messageErreurMail").classList.add("d-none");
    }
    

    var subject= document.getElementById("subject").value;
    console.log(subject);
   document.getElementById("details").innerText = subject;
    if (subject == ""){
        document.getElementById("messageErreurSujet").classList.remove("d-none");   
    }
    else{
        document.getElementById("messageErreurSujet").classList.add("d-none");   
    }

    if (societe == false || contact== false || ville == false|| code == false || mail == false || subject == ""){
        return false;
    }else{
 
    return false; // a passer a true pour pouvoir envoyer le formulaire 
    }
}