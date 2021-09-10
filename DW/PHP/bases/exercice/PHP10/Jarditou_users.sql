CREATE DATABASE IF NOT EXISTS jarditou;

USE jarditou;

CREATE TABLE AccessRight(
   Acc_id INT AUTO_INCREMENT NOT NULL,
   Acc_name VARCHAR(30) NOT NULL,
   PRIMARY KEY(Acc_id)

);

CREATE TABLE users(
   use_id INT AUTO_INCREMENT NOT NULL,
   use_lastname VARCHAR(30),
   use_firstname VARCHAR(30),
   use_login VARCHAR(50),
   use_password VARCHAR(50),
   use_Acc_id INT NOT NULL,
   PRIMARY KEY(use_id),
   FOREIGN KEY(use_Acc_id) REFERENCES AccessRight(Acc_id)
);


