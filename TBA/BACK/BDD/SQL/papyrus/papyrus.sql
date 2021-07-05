/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                LES BESOINS D’AFFICHAGE
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

  /*  1.Quelles sont les commandes du fournisseur 09120?*/

    SELECT numcom FROM entcom
    WHERE numfou = 09120

   /* 2.Afficher le code des fournisseurs pour lesquels des commandes ont été passées.*/

    SELECT DISTINCT numfou FROM entcom

   /* 3.Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés. */

    SELECT count( DISTINCT numfou) AS 'NBR FOURNISSEUR', count(numcom) AS 'NBR COMMANDES' FROM entcom

   /* 4.Editer les produits ayant un stock inférieur ou égal au stock d'alerte et dont la quantité annuelle est inférieure à1000 (informations à fournir : n° produit, libelléproduit, stock, stockactuel d'alerte, quantitéannuelle)*/

    SELECT codart, libart, stkphy, stkale, qteann FROM produit
    WHERE stkale >= stkphy AND qteann < 1000

   /* 5.Quels sont les fournisseurs situés dans les départements 75 78 92 77 ? L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique*/

    SELECT SUBSTR(posfou, 1, 2)AS DEPARTEMENT, nomfou FROM fournis 
    WHERE posfou like'75%' OR posfou like'78%' OR posfou like'92%' OR posfou like'77%'
    ORDER BY DEPARTEMENT DESC, nomfou ASC

    SELECT nomfou, substring(posfou,1,2) as DEPARTEMENT from fournis
    where substring(posfou,1,2) in ('75', '78', '92', '77') 
    order by posfou desc, nomfou

   /* 6.Quelles sont les commandes passées au mois de mars et avril?*/

    SELECT numcom, datcom  FROM entcom
    WHERE datcom BETWEEN '2018-03-00' AND '2018-04-30'

   /* 7.Quelles sont les commandes du jour qui ont des observations particulières ?(Affichage numéro de commande, date de commande)*/

    SELECT numcom, datcom  FROM entcom
    WHERE obscom <> ''

   /* 8.Lister le total de chaque commande par total décroissant (Affichage numéro de commande et total)*/

    SELECT numcom, SUM(qtecde*priuni)AS TOTAL FROM ligcom
    GROUP by numcom
    order by TOTAL desc

  /*  9.Lister les commandes dont le total est supérieur à 10000€; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000.(Affichage numéro de commande et total)*/
 
    SELECT numcom, SUM(qtecde*priuni) AS TOTAL FROM ligcom
    WHERE qtecde < 1000 AND qtecde*priuni >10000
    GROUP BY NUMCOM

  /*  10.Lister les commandes par nom fournisseur (Afficher le nom du fournisseur, le numéro de commande et la date)*/

    SELECT nomfou, numcom, datcom FROM fournis
    JOIN entcom
    ON entcom.numfou = fournis.numfou

   /* 11.Sortir les produits des commandes ayant le mot "urgent' en observation?(Afficher le numéro de commande, le nom du fournisseur, le libellé du produit et le sous total= quantité commandée * Prix unitaire)*/
    
    SELECT entcom.numcom,nomfou, libart,(qtecde*priuni)AS TOTAL FROM entcom
    JOIN fournis
    ON entcom.numfou = fournis.numfou
    JOIN ligcom
    ON entcom.numcom = ligcom.numcom
    JOIN produit
    ON produit.codart = ligcom.codart
    WHERE obscom like '%urgent%'

  /*  12.Coder de 2 manières différentes la requête suivante:Lister le nom des fournisseurs susceptibles de livrer au moins un article*/

    SELECT entcom.numfou FROM fournis
    JOIN entcom
    ON entcom.numfou = fournis.numfou
    JOIN ligcom
    ON entcom.numcom = ligcom.numcom
    WHERE qteliv > 0
    GROUP BY nomfou
  
  /*  13.Coder de 2 manières différentes la requête suivante: Lister les commandes (Numéro et date) dont le fournisseur est celui de la commande 70210*/

    select numcom, datcom from entcom
    where numfou = (select numfou from entcom where numcom = 70210)

  /*  14.Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R). On affichera le libellé de l’article et prix1*/

    SELECT DISTINCT libart, prix1 from vente
    JOIN produit
    ON vente.codart = produit.codart
    WHERE prix1 < (SELECT min(prix1)
                    FROM produit join vente
                    ON produit.codart = vente.codart WHERE produit.codart like 'R%')

  /*  15.Editer la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte. La liste est triée par produit puis fournisseur*/

    SELECT libart, nomfou from produit
    JOIN vente
    on produit.codart = vente.codart
    JOIN fournis
    on fournis.numfou = vente.numfou
    WHERE stkphy < (1.5*stkale)
    ORDER BY libart, nomfou

   /* 16.Éditer la liste des fournisseurs susceptibles de livrer les produit dont le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de livraison d'au plus 30 jours. La liste est triée par fournisseur puis produit*/

    SELECT libart, nomfou from produit
    JOIN vente
    ON produit.codart = vente.codart
    JOIN fournis
    ON fournis.numfou = vente.numfou
    WHERE stkphy < (1.5*stkale) and delliv <= 30
    ORDER BY libart, nomfou

  /*  17.Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur trié par total décroissant*/

    select nomfou, SUM(stkphy) as 'TOTAL STOCK' from produit
    JOIN vente
    ON produit.codart = vente.codart
    JOIN fournis
    on fournis.numfou = vente.numfou
    GROUP BY nomfou
    ORDER BY SUM(stkphy)


  /*  18.En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.*/

    SELECT produit.codart, SUM(qtecde) AS 'quantitée commandée', qteann from produit
    join ligcom
    on ligcom.codart = produit.codart
    group by produit.codart 
	  having SUM(qtecde) > 0.9*qteann


   /* 19.Calculer le chiffre d'affaire par fournisseur pour l'année 2007 sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.*/

SELECT nomfou, SUM(qteliv*priuni*1.2) FROM ligcom
    JOIN produit
    ON ligcom.codart = produit.codart
    JOIN vente
    ON produit.codart = vente.codart
    JOIN fournis
    on fournis.numfou = vente.numfou
    where derliv >= '2007-01-01' AND derliv < '2008-01-01'
    GROUP BY nomfou


/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                LES BESOINS DE MISE A JOUR
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/



  /*  1.Application d'une augmentation de tarif de 4% pour le prix 1, 2% pour le prix2 pour le fournisseur 9180*/

    update vente 
    set prix1= prix1 +(prix1/25), prix2 = prix2 +(prix2/50)
    where numfou = 9180

  /*  2.Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est null, en affectant a valeur de prix.*/

    update vente 
    set prix2 = prix1
    where prix2 = 0

  /*  3.Mettre à jour le champ obscom en positionnant '*****' pour toutes les commandes dont le fournisseur a un indice de satisfaction <5   */

    update entcom
    JOIN fournis
    ON fournis.numfou = entcom.numfou 
    set obscom ='*****'
    where satisf <5


  /*  4.Suppression du produit I110 */

    delete from produit
    where codart = 'I110'
   