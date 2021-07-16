USE gescom_struct;

/* Script Categories */
INSERT INTO gescom_struct.categories
VALUES
(1, 'CAT1', NULL),
(2, 'CAT2', NULL),
(3, 'Sous_CAT1', 1);

/* Script Posts */
INSERT INTO gescom_struct.posts
VALUES
(1, 'patron'),
(2, 'pti chef'),
(3, 'stagiaire');

/* Script Employees */
INSERT INTO gescom_struct.employees
VALUES
(1, NULL, 1, 'Sinety', 'Martin', '30 Rue de Poulainville', '80000', 'Amiens', 'emp1@gmail.fr', '0123456789', NULL, '2015-07-15', 'M', 1),
(2, 1, 2, 'tahar', 'Loic', '30 Rue de Poulainville', '80000', 'Amiens', 'emp1@gmail.fr', '0987654321', NULL, '2016-07-15', 'M', 0),
(3, 2, 3, 'Blob', 'Edouard', '30 Rue de Poulainville', '80000', 'Amiens', 'emp1@gmail.fr', '0123456789', NULL, '2017-07-15', 'M', 0);


/* Script Suppliers */
INSERT INTO gescom_struct.suppliers
VALUES
(1, 'Four1', 'Amiens', 'FR', '30 Rue de Poulainville', '80000', 'Lionel', '0123456789', 'four1@hotmail.fr'),
(2, 'Four2', 'Amiens', 'FR', '20 Rue de Poulainville', '80000', 'Victor', '9876543210', 'four1@hotmail.fr'),
(3, 'Four3', 'Amiens', 'FR', '10 Rue de Poulainville', '80000', 'Antoine', '9638527410', 'four1@hotmail.fr');



/* Script Customers */
INSERT INTO gescom_struct.customers
VALUES
(1, 'test', 'Giles', '30 Rue de Poulainville', '80000', 'Amiens', 'FR', 'cus1@gmail.fr', '1234567890','123', '2021-07-13', NULL),
(2, 'taste', 'Gilead', '40 Rue de Poulainville', '80000', 'Amiens', 'FR', 'cus2@gmail.fr', '0123456789','456', '2021-07-13', NULL),
(3, 'testa', 'Gilet', '50 Rue de Poulainville', '80000', 'Amiens', 'FR', 'cus3@gmail.fr', '234567890', '789', '2021-07-13', NULL);

/* Script Orders */
INSERT INTO gescom_struct.orders
VALUES
(1, '2021-05-15', '2021-05-16', '2021-05-20', '2021-05-30', 'delivred', 1),
(2, '2021-06-15', '2021-06-16', '2021-06-20', '2021-06-30', 'delivred', 2),
(3, '2021-07-15', NULL, NULL, NULL, 'undelivred', 3);