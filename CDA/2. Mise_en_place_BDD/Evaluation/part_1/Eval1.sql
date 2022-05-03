DROP DATABASE if EXISTS  eval_mettre_en_place_BDD;

CREATE DATABASE eval_mettre_en_place_BDD;

USE eval_mettre_en_place_BDD;

CREATE TABLE Client (
  cli_num int NOT NULL AUTO_INCREMENT,
  cli_nom varchar(50) NOT NULL,
  cli_adresse varchar(50),
  cli_tel varchar(30),
  PRIMARY KEY (cli_num)
);

CREATE TABLE Commande (
  com_num int NOT NULL AUTO_INCREMENT,
  cli_num int NOT NULL ,
  com_date date NOT NULL ,
  com_obs varchar(50),
  PRIMARY KEY (com_num),
  CONSTRAINT commande_fk FOREIGN KEY (cli_num) REFERENCES Client (cli_num)
);

CREATE TABLE Produit (
  pro_num int NOT NULL AUTO_INCREMENT,
  pro_libelle varchar(50) NOT NULL,
  pro_description varchar(50),
  PRIMARY KEY (pro_num)
);


CREATE TABLE est_compose (
  com_num int NOT NULL,
  pro_num int NOT NULL,
  est_qte int ,
  PRIMARY KEY (com_num,pro_num),
  CONSTRAINT est_compose_fk_1 FOREIGN KEY (com_num ) REFERENCES Commande (com_num ),
  CONSTRAINT est_compose_fk_2 FOREIGN KEY (pro_num ) REFERENCES Produit (pro_num )
);

CREATE INDEX cli_nom ON Client (cli_nom);