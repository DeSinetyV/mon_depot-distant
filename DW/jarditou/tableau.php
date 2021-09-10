<?php session_start();
$title='Tableau';
include ("public/php/entete.php");
?>
            <div class="table-responsive m-auto">
            <?php
             
                include 'public/php/connexion_bdd.php';
                // Connect to MySQL database
                $pdo = pdo_connect_mysql();

                // Prepare the SQL statement and get records from our products table
                if (isset($_GET['recherche'])){
                    $recherche = $_GET['recherche'];
                    $produits = $pdo->prepare("SELECT * FROM produits 
                                            JOIN categories ON pro_cat_id = cat_id
                                            WHERE cat_nom LIKE '%$recherche%' OR pro_libelle LIKE '%$recherche%' 
                                            ORDER BY pro_id");
                    $produits->execute();

                }else{

                $produits = $pdo->prepare("SELECT * FROM produits 
                                           JOIN categories ON pro_cat_id = cat_id
                                           ORDER BY pro_id");
                $produits->execute();
                // var_dump($produits);
                }

?>
<?php if(isset($_SESSION['role']) && ($_SESSION['role']== 'admin' || $_SESSION['role']== 'gestionnaire')): ?>
    <form class=""  action="public/php/ajout.php">
    <input  class=" btn btn-success mb-2 mt-2 display-2 center-block" type="submit" value="  &#43;Ajouter un produit ">
<?php endif; ?>


                

                <table class=" table table-hover table-bordered">

                    <thead class="font-weight-bold bg-light">
                        <tr>
                            <td>Photo</td>
                            <td>ID</td>
                            <td>Catégorie</td>
                            <td>Référence</td>
                            <td>Libellé</td>
                            <td>Prix</td>
                            <td>Stock</td>
                            <td>Couleur</td>
                            <td>Ajout</td>
                            <td>Modif</td>
                            <td>Bloqué</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($produits as $produit):?>
                        
                        <tr >
                            <td class="bg-warning"><?php $image= 'public/images/'.$produit['pro_id'];
                            echo '<img width=110px  src='.$image.' >'?></td>
                            <td class="text-center align-middle"><?=$produit['pro_id']?></td>
                            <td class="text-center align-middle" width=80><?=$produit['cat_nom']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_ref']?></td>
                            <td class="bg-warning text-center font-weight-bold align-middle"><a href="../public/php/read.php?pro_id=<?php echo $produit['pro_id']; ?>" class="text-danger"><u><h5><?php echo $produit['pro_libelle'];?><u><h5></a></td>
                            <td class="text-center align-middle"><?=$produit['pro_prix']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_stock']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_couleur']?></td>
                            <td class="text-center align-middle"><?=$produit['pro_d_ajout']?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>    
                </table>
            </div>
<?php
include ("public/php/footer.php");
?>