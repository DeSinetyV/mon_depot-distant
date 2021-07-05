/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                EXERCICE 1
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


DROP DATABASE Exercice1 IF EXISTS Exercice1;
CREATE DATABASE Exercice1;
USE Exercice1;

CREATE table client (
cli_num INT NOT NULL,
cli_nom VARCHAR(50) NOT NULL,
cli_adresse VARCHAR(50) NOT NULL,
cli_tel VARCHAR(30) NOT NULL,
PRIMARY KEY (cli_num)
);

CREATE table commande (
com_num INT NOT NULL,
cli_num INT NOT NULL,
cli_adresse VARCHAR(50) NOT NULL,
cli_tel VARCHAR(30) NOT NULL,
PRIMARY KEY (com_num),
CONSTRAINT fk3 FOREIGN KEY (cli_num) REFERENCES client (cli_num)
);

CREATE table produit (
pro_num INT NOT NULL,
pro_libelle VARCHAR(50) NOT NULL,
pro_description VARCHAR(50) NOT NULL,
PRIMARY KEY (pro_num) 
);

CREATE table est_compose (
com_num INT NOT NULL,
pro_num INT NOT NULL,
est_qte INT NOT NULL,
CONSTRAINT fk1 FOREIGN KEY (com_num) REFERENCES commande (com_num),
CONSTRAINT fk2 FOREIGN KEY (pro_num) REFERENCES produit (pro_num)
);

CREATE INDEX index1 ON client (cli_num);

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                EXERCICE 2
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


/*  1 -Liste des contacts français:  */

SELECT companyname, contactname, contacttitle, phone  FROM customers
WHERE country ='france'

/*  2 -Produits vendus par le fournisseur «Exotic Liquids»:*/

SELECT productname, unitprice  FROM suppliers
JOIN products
ON products.SupplierID = suppliers.SupplierID
WHERE companyname ='Exotic Liquids'

/*  3 -Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant:*/

SELECT companyname, COUNT(productid) FROM suppliers
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
JOIN order_details
ON order_details.orderid =orders.orderid
GROUP BY  companyname
HAVING CA > 30000
ORDER BY CA desc

/* 6 –Liste des pays dont les clients ont passé commande de produits fournis par «Exotic Liquids»: */

SELECT DISTINCT customers.country FROM customers
JOIN orders
ON customers.customerid = orders.customerid
JOIN order_details
ON order_details.orderid =orders.orderid
JOIN products
ON products.productID = order_details.productID
JOIN suppliers
ON products.SupplierID = suppliers.SupplierID
WHERE suppliers.companyname = 'Exotic Liquids'
ORDER BY customers.country

/* 7 –Montant des ventes de 1997:*/

SELECT SUM(quantity*unitprice) AS 'montant vente 97' FROM orders
JOIN order_details
ON order_details.orderid =orders.orderid
WHERE orderdate >= '1997-01-01' AND orderdate < '1998-01-01'

/* 8 –Montant des ventes de 1997 mois par mois:*/

SELECT MONTH(orderdate) AS MONTH, SUM(quantity*unitprice) AS 'montant vente 97' FROM orders
JOIN order_details
ON order_details.orderid =orders.orderid
WHERE orderdate >= '1997-01-01' AND orderdate < '1998-01-01'
GROUP BY MONTH

/*9 –Depuis quelle date le client «Du monde entier» n’a plus commandé?*/

SELECT MAX(orderdate) FROM customers
JOIN orders
ON customers.customerid = orders.customerid
WHERE companyname = 'Du monde entier'

/*10 –Quel est le délai moyen de livraison en jours?*/

SELECT ROUND(AVG(DATEDIFF(shippeddate,orderdate))) FROM orders

