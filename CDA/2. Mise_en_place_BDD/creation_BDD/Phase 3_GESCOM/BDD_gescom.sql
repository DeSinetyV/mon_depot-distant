DROP DATABASE IF EXISTS GESCOM;
CREATE DATABASE IF NOT EXISTS GESCOM;

USE GESCOM;

CREATE TABLE IF NOT EXISTS suppliers (
  sup_id int(10) NOT NULL AUTO_INCREMENT,
  sup_name varchar(50)  NOT NULL,
  sup_city varchar(50)  NOT NULL,
  sup_address varchar(150) NOT NULL,
  sup_mail varchar(75) ,
  sup_phone varchar(10),
  PRIMARY KEY (sup_id)
);


CREATE TABLE IF NOT EXISTS customers (
  cus_id int(10) NOT NULL AUTO_INCREMENT,
  cus_lastname varchar(50) NOT NULL,
  cus_firstname varchar(50) NOT NULL,
  cus_address varchar(150) NOT NULL,
  cus_zipcode char(5) NOT NULL,
  cus_city varchar(50) NOT NULL,
  cus_mail varchar(75),
  cus_phone int(10),
  PRIMARY KEY (cus_id)
);


CREATE TABLE IF NOT EXISTS orders (
  ord_id int(10) NOT NULL AUTO_INCREMENT,
  ord_order_date date NOT NULL DEFAULT current_timestamp(),
  ord_ship_date date,
  ord_bill_date date,
  ord_reception_date date,
  ord_status varchar(25) NOT NULL,
  cus_id int(10) NOT NULL,
  PRIMARY KEY (ord_id),
  CONSTRAINT orders_ibfk_1 FOREIGN KEY (cus_id) REFERENCES customers (cus_id)
);

CREATE TABLE IF NOT EXISTS categories (
  cat_id int(10) NOT NULL AUTO_INCREMENT,
  cat_name varchar(200) NOT NULL,
  cat_parent_id int(10),
  PRIMARY KEY (cat_id),
CONSTRAINT categories_ibfk_1 FOREIGN KEY (cat_parent_id) REFERENCES categories (cat_id)
);

CREATE TABLE IF NOT EXISTS products (
  pro_id int(10) NOT NULL AUTO_INCREMENT,
  pro_ref varchar(10) NOT NULL,
  pro_name varchar(200)  NOT NULL,
  pro_desc text  NOT NULL,
  pro_price decimal(6,2) NOT NULL,
  pro_stock smallint(4) ,
  pro_color varchar(30),
  pro_picture varchar(40),
  pro_add_date date NOT NULL DEFAULT current_timestamp(),
  pro_update_date TIMESTAMP DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  pro_publish tinyint(1) NOT NULL,
  sup_id int(10)  NOT NULL,
  cat_id int(10) NOT NULL,
   PRIMARY KEY (pro_id),
   CONSTRAINT products_ibfk_1 FOREIGN KEY (sup_id) REFERENCES suppliers (sup_id),
   CONSTRAINT products_ibfk_2 FOREIGN KEY (cat_id) REFERENCES categories (cat_id)
);

CREATE TABLE IF NOT EXISTS details (
  det_id int(10) NOT NULL AUTO_INCREMENT,
  det_price decimal(6,2) NOT NULL,
  det_quantity int(5) NOT NULL CHECK (det_quantity > 0 AND det_quantity <= 100),
  pro_id int(10) NOT NULL,
  ord_id int(10) NOT NULL,
  PRIMARY KEY (det_id),
  CONSTRAINT details_ibfk_1 FOREIGN KEY (pro_id) REFERENCES products (pro_id),
  CONSTRAINT details_ibfk_2 FOREIGN KEY (ord_id) REFERENCES orders (ord_id) 
  );
   
   CREATE INDEX pro_ref ON products (pro_ref);

