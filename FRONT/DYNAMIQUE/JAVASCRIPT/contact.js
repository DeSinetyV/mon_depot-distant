

function verif(){
// expressions régulières 
    var filtreNom = new RegExp("^[a-zA-Z '-]+$");
    var filtrePrenom =  new RegExp("^[a-zA-Z -]+$");
    var filtreMail= new RegExp("^[0-9a-zA-Z._-]+@[0-9a-zA-Z._-]+[.][a-z]{2,5}$");
    var filtreDate = new RegExp("^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$");
    var filtreCodePostal=new RegExp("^[0-9]{5}$");
    var filtreAdresse= new RegExp("^[0-9a-zA-Z ,'-]+$");

// remise a 0 des message d'erreurs
    document.getElementById("errorLastname").innerHTML = "";
    document.getElementById("errorFirstname").innerHTML = "";
    document.getElementById("errorMail").innerHTML = "";
    document.getElementById("errorBirthday").innerHTML = "";
    document.getElementById("errorCity").innerHTML = "";
    document.getElementById("errorCode").innerHTML = "";
    document.getElementById("errorAddress").innerHTML = "";
    document.getElementById("errorSubject").innerHTML ="";

    var erreur = 0

    var lastname= document.getElementById("lastname").value;
    console.log(lastname);
    lastname = filtreNom.test(lastname);
    console.log(lastname);
    if (lastname==false){
        document.getElementById("errorLastname").innerHTML = "*Veuillez entrer un nom valide";
        erreur++;
    }
    var firstname= document.getElementById("firstname").value;
    console.log(firstname);
    firstname = filtrePrenom.test(firstname);
    console.log(firstname);
    if (firstname==false){
        document.getElementById("errorFirstname").innerHTML = "*Veuillez entrer un prénom valide";
        erreur++;
     }

    var mail= document.getElementById("mail").value;
    console.log(mail);
    mail = filtreMail.test(mail);
    console.log(mail);
    if (mail==false){
        document.getElementById("errorMail").innerHTML = "*Veuillez entrer une adresse mail valide";
        erreur++;
     }

    var date= document.getElementById("birthday").value;
    console.log(date);
    date = filtreDate.test(date);
    console.log(date);
    if (date==false){
        document.getElementById("errorBirthday").innerHTML = "*Veuillez entrer une date de naissance valide";
        erreur++;
     }

    var ville=document.getElementById("city").value;
    console.log(ville);
    ville = filtreNom.test(ville);
    console.log(ville);
    if (ville==false){
        document.getElementById("errorCity").innerHTML = "*Veuillez entrer une ville valide";
        erreur++;
     }
    
    var code=document.getElementById("code").value;
    console.log(code);
    code = filtreCodePostal.test(code);
    console.log(code);
    if (code==false){
        document.getElementById("errorCode").innerHTML = "*Veuillez entrer un code postal valide";
        erreur++;
     }

    var adresse=document.getElementById("address").value;
    console.log(adresse);
    adresse = filtreAdresse.test(adresse);
    console.log(adresse);
    if (adresse==false){
        document.getElementById("errorAddress").innerHTML = "*Veuillez entrer une adresse valide";
        erreur++;
     }

    listeSujets= ["Mes commandes","Questions sur un produit", "Réclamations", "Autres"];
    sujet = document.getElementById("subject").value;
    compareListe = listeSujets.includes(sujet);
    console.log(compareListe)
    if (compareListe == false){
        document.getElementById("errorSubject").innerHTML = "*Veuillez selectionner un sujet dans la liste";
        erreur++;
    }

    if(erreur >0){
        console.log("il reste "+ erreur+" erreurs !");
        return false;
    }else{   
        console.log("tout est bon!");
        return true;

    }



}