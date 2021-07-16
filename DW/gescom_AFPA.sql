CREATE DATABASE IF NOT EXISTS GESCOM_DSY;

USE GESCOM_DSY;

CREATE TABLE store(
   sto_id INT AUTO_INCREMENT NOT NULL,
   sto_name VARCHAR(50) NOT NULL,
   sto_city VARCHAR(50) NOT NULL,
   PRIMARY KEY(sto_id),
   UNIQUE(sto_name)
);

CREATE TABLE category(
   cat_id INT AUTO_INCREMENT NOT NULL,
   cat_name VARCHAR(40) NOT NULL,
   PRIMARY KEY(cat_id),
   UNIQUE(cat_name)
);

CREATE TABLE supplier(
   sup_id INT AUTO_INCREMENT NOT NULL,
   sup_companyName VARCHAR(50) NOT NULL,
   sup_contactName VARCHAR(50),
   sup_adress VARCHAR(50) NOT NULL,
   sup_city VARCHAR(50) NOT NULL,
   sup_phone CHAR(10) NOT NULL,
   PRIMARY KEY(sup_id),
   UNIQUE(sup_companyName),
   UNIQUE(sup_phone)
);

CREATE TABLE product(
   prod_id INT AUTO_INCREMENT NOT NULL,
   prod_name VARCHAR(30) NOT NULL,
   prod_price DECIMAL(12,2) NOT NULL,
   prod_references CHAR(15) NOT NULL,
   prod_codeEAN VARCHAR(30) NOT NULL,
   prod_color VARCHAR(10),
   prod_label VARCHAR(30) NOT NULL,
   prod_description TEXT,
   prod_dateAjout DATE NOT NULL,
   prod_dateModif DATE,
   prod_onSale BOOLEAN NOT NULL,
   sup_id INT NOT NULL,
   PRIMARY KEY(prod_id),
   UNIQUE(prod_name),
   UNIQUE(prod_references),
   UNIQUE(prod_codeEAN),
   FOREIGN KEY(sup_id) REFERENCES supplier(sup_id)
);

CREATE TABLE customer(
   cus_id INT AUTO_INCREMENT NOT NULL,
   cus_lastname VARCHAR(30),
   cus_firstname VARCHAR(30),
   cus_password VARCHAR(50),
   cus_dateMod DATE,
   cus_dateAdd DATE,
   PRIMARY KEY(cus_id)
);

CREATE TABLE employe(
   emp_id INT AUTO_INCREMENT NOT NULL,
   emp_service VARCHAR(50),
   emp_salary SMALLINT NOT NULL,
   emp_ancienneté INT,
   emp_sex CHAR(10),
   emp_nbrChildren INT,
   emp_phone CHAR(10) NOT NULL,
   sto_id INT NOT NULL,
   PRIMARY KEY(emp_id),
   UNIQUE(emp_phone),
   FOREIGN KEY(sto_id) REFERENCES store(sto_id)
);

CREATE TABLE sub_category(
   sub_id INT AUTO_INCREMENT NOT NULL,
   sub_name VARCHAR(40) NOT NULL,
   cat_id INT NOT NULL,
   prod_id INT NOT NULL,
   PRIMARY KEY(sub_id),
   UNIQUE(sub_name),
   FOREIGN KEY(cat_id) REFERENCES category(cat_id),
   FOREIGN KEY(prod_id) REFERENCES product(prod_id)
);

CREATE TABLE orders(
   ord_id INT AUTO_INCREMENT NOT NULL,
   ord_datePayement DATE,
   ord_dateModif DATE,
   cus_id INT NOT NULL,
   PRIMARY KEY(ord_id),
   FOREIGN KEY(cus_id) REFERENCES customer(cus_id)
);

CREATE TABLE diriger(
   emp_id INT,
   emp_id_1 INT,
   PRIMARY KEY(emp_id, emp_id_1),
   FOREIGN KEY(emp_id) REFERENCES employe(emp_id),
   FOREIGN KEY(emp_id_1) REFERENCES employe(emp_id)
);

CREATE TABLE ord_prod(
   prod_id INT AUTO_INCREMENT NOT NULL,
   ord_id INT,
   ord_prod_reduction VARCHAR(50),
   ord_prod_quantity VARCHAR(50),
   PRIMARY KEY(prod_id, ord_id),
   FOREIGN KEY(prod_id) REFERENCES product(prod_id),
   FOREIGN KEY(ord_id) REFERENCES orders(ord_id)
);

CREATE TABLE stock(
   sto_id INT,
   prod_id INT,
   store_prod_stockAlert SMALLINT,
   store_prod_stockPhy SMALLINT,
   PRIMARY KEY(sto_id, prod_id),
   FOREIGN KEY(sto_id) REFERENCES store(sto_id),
   FOREIGN KEY(prod_id) REFERENCES product(prod_id)
);
