<?php
session_start();
$title= 'Accueil';
include ("public/php/entete.php");
?>
            <div class="row m-auto shadow">
                <div class="col-lg-8">
                    <h1 class='mt-2' >Accueil</h1>
                    <hr>
                    <article>
                        <h3>L'entreprise </h3>

                        <p> Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
                        <p> Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                        <p> Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie.</p>		
                    </article> 
                    <article>         
                        <h3>Qualité </h3>
                        
                        <p> Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
                        <p> Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
                    </article>
                    <article>  
                        <h3>Devis gratuit </h3>
                    
                        <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
                                    
                    </article>
                
                </div>
                <div class="col-lg-4 bg-warning pt-3">
                    <h3 class="text-center" > [Colonne de droite]</h3>
                </div>
            </div>
            <?php
include ("public/php/footer.php");
?>