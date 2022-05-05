
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*//////////////////////////////////////////////// Requêtes d'intérrogation sur la base NorthWind //////////////////////////////////////////////////////////////////////////////*/
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


/*  1 -Liste des contacts français:  */

SELECT companyname as Société, contactname as Contact, contacttitle as Fonction, phone as Téléphone FROM customers
WHERE country ='france'

/*  2 -Produits vendus par le fournisseur «Exotic Liquids»:*/

SELECT productname as Produit, unitprice as Prix FROM suppliers
JOIN products
ON products.SupplierID = suppliers.SupplierID
WHERE companyname ='Exotic Liquids'

/*  3 -Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant:*/

SELECT companyname as Fournisseur, COUNT(productid) as `Nbre produits`  FROM suppliers
JOIN products
ON products.SupplierID = suppliers.SupplierID
WHERE country ='france'
GROUP BY companyname
ORDER BY COUNT(productid) desc


/*  4 -Liste des clients Français ayant plus de 10 commandes:   */

SELECT companyname, COUNT(orderid) FROM customers
JOIN orders
ON customers.customerid = orders.customerid
WHERE country ='france'
GROUP BY companyname
HAVING COUNT(orderid) > 10


/*  5 -Liste des clients ayant un chiffre d’affaires > 30.000:  */

SELECT companyname, SUM(quantity*unitprice) AS CA, country FROM customers
JOIN orders
ON customers.customerid = orders.customerid
JOIN `order details`
ON `order details`.orderid =orders.orderid
GROUP BY  companyname
HAVING CA > 30000
ORDER BY CA desc

/* 6 –Liste des pays dont les clients ont passé commande de produits fournis par «Exotic Liquids»: */

SELECT DISTINCT customers.country FROM customers
JOIN orders
ON customers.customerid = orders.customerid
JOIN `order details`
ON `order details`.orderid =orders.orderid
JOIN products
ON products.productID = `order details`.productID
JOIN suppliers
ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.companyname = 'Exotic Liquids'
ORDER BY customers.country

/* 7 –Montant des ventes de 1997:*/

SELECT SUM(quantity*unitprice) AS 'montant vente 97' FROM orders
JOIN `order details`
ON `order details`.orderid =orders.orderid
WHERE orderdate >= '1997-01-01' AND orderdate < '1998-01-01'

/* 8 –Montant des ventes de 1997 mois par mois:*/

SELECT MONTH(orderdate) AS MONTH, SUM(quantity*unitprice) AS 'montant vente 97' FROM orders
JOIN `order details`
ON `order details`.orderid =orders.orderid
WHERE orderdate >= '1997-01-01' AND orderdate < '1998-01-01'
GROUP BY MONTH

/*9 –Depuis quelle date le client «Du monde entier» n’a plus commandé?*/

SELECT MAX(orderdate) FROM customers
JOIN orders
ON customers.customerid = orders.customerid
WHERE companyname = 'Du monde entier'

/*10 –Quel est le délai moyen de livraison en jours?*/

SELECT ROUND(AVG(DATEDIFF(shippeddate,orderdate))) FROM orders



/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*//////////////////////////////////////////////////////////////////////////// Procédures stockées//////////////////////////////////////////////////////////////////////////////*/
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


DELIMITER |

    CREATE PROCEDURE lastcommande(In company varchar(40))
    BEGIN

    SELECT MAX(orderdate) FROM customers
    JOIN orders
    ON customers.customerid = orders.customerid
    WHERE companyname = company;

    END |


    CREATE PROCEDURE delailivraison()
    BEGIN

    SELECT ROUND(AVG(DATEDIFF(shippeddate,orderdate))) FROM orders

    END |

DELIMITER ;

call lastcommande('Du monde entier');
call lastcommande('Folies gourmandes');
call delailivraison();

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////// Mise en place d'une règle de gestion//////////////////////////////////////////////////////////////////////*/
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

 DELIMITER |
    CREATE TRIGGER samecountry before insert on `order details`
    FOR EACH ROW
    BEGIN
       Declare id_o int;
       declare id_p int;
       declare suppliercountry varchar(15);
       declare clientcountry varchar(15);
       set id_o = New.orderiD;
       set id_p = New.productID;
       set suppliercountry =(SELECT country From suppliers
                            join products on suppliers.SupplierID= products.SupplierID
                            where products.productID = id_p
                            );
        set clientcountry = (SELECT country From customers
                            join orders on orders.CustomerID = customers.customerid
                            where orders.orderiD = id_o
                            );
        if suppliercountry <> clientcountry then
                SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = ' Destinataire et fournisseur dans des pays différents !';
end if;
    END |
DELIMITER ;


produit 25
supplier 11
client ALFKI
Commande 11078





from suppliers
join products
join `order details` on `order details`.orderid = products.productid