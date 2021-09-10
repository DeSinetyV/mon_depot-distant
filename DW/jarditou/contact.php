<?php
session_start();
$title = 'Contact';
include ("public/php/entete.php");
?>

            <div class=" row m-auto shadow">
                <section  class="row col ">
                    <p> * ces zones sont obligatoires</p>
                    <hr>
                    <form class="w-100 p-2" action="public/php/post.php" method="POST"  onSubmit="return verif(this)">
                        <fieldset>
                            <h1>Vos Coordonnées</h1>
                            <label for="lastname">Nom* :</label><br><input class="w-100" type="text" placeholder="Veuillez saisir votre nom" name="lastname" id="lastname">
                            <label class="pt-3" for="firstname">Prénom* :</label><br><input class="w-100" type="text" placeholder="Veuillez saisir votre prénom" name="firstname" id="firstname">
                            <label>Sexe* :</label><br>
                                <input class="ml-1 mr-1" type="radio" name="sex" value="Féminin" >Féminin
                                <input class="ml-3  mr-1" type="radio" name="sex" value="Masculin">Masculin
                                <input class="ml-3  mr-1" type="radio" name="sex" value="Neutre" checked>Neutre <br>
                            <label class="pt-3" for="birthday">Date de naissance* :</label><br><input class="w-100" type="date" name="birthday" id="birthday">
                            <label class="pt-3" for="code">Code postal* :</label><br><input class="w-100" type="text" placeholder="code postal" name="code" id="code">
                            <label class="pt-3" for="address">Adresse :</label><br><input class="w-100" type="text" placeholder="adresse" name="address" id="address"><br>
                            <label class="pt-3" for="city">Ville :</label><br><input class="w-100" type="text" placeholder="ville" name="city" id="city"><br>
                            <label class="pt-3" for="mail">Email :</label><br><input class="w-100" type="text" placeholder="dave.loper@afpa.fr" name="mail" id="mail"><br>
                        </fieldset>
                        <fieldset>
                            <h1 class="pt-3">Votre demande</h1>
                            <label for="subject">Sujet*: </label>
                                <select class="w-100" name="subject" id="liste">
                                    <option>Mes commandes</option>
                                    <option>Questions sur un produit</option>
                                    <option>Réclamations</option>
                                    <option>Autres</option>
                                </select><br>
                            <label class="pt-3" for="question"> Votre question* :</label><br><textarea class="w-100" name="question" id="question"  rows="2" cols="25" placeholder="tapez votre question ici"></textarea>
                        </fieldset><br>
                        <input type="checkbox" name="validation" id="validation" value="Yes" ><label class="ml-2" for="validation">  J'accepte le traitement informatique de ce formulaire</label><br>
                        <input class="btn btn-dark btn btn-outline-primary text-white" type="submit" value="Envoyer"> 
                        <input class="btn btn-dark btn btn-outline-primary text-white" type="reset" value="Annuler"><br>
                    </form>
                </section>
            </div>
<?php
include ("public/php/footer.php");
?>