DROP DATABASE papyrus;

CREATE DATABASE papyrus;

USE papyrus;

CREATE TABLE fournis (
  numfou varchar(25) NOT NULL,
  nomfou varchar(25) NOT NULL,
  ruefou varchar(50) NOT NULL,
  posfou char(5) NOT NULL,
  vilfou varchar(30) NOT NULL,
  confou varchar(15) NOT NULL,
  satisf tinyint(3)
  CHECK (satisf >=0 AND satisf <=10),
  PRIMARY KEY (numfou)
);

CREATE TABLE produit (
  codart char(4) NOT NULL,
  libart varchar(30) NOT NULL,
  stkale int(10) NOT NULL,
  stkphy int(10) NOT NULL,
  qteann int(10) NOT NULL,
  unimes char(5) NOT NULL,
  PRIMARY KEY (codart)
) ;

CREATE TABLE entcom (
  numcom int(10) NOT NULL AUTO_INCREMENT,
  obscom varchar(50) DEFAULT NULL,
  datcom timestamp NOT NULL DEFAULT current_timestamp(), 
  numfou varchar(25) DEFAULT NULL,
  PRIMARY KEY (numcom),
  KEY numfou (numfou),
  CONSTRAINT entcom_ibfk_1 FOREIGN KEY (numfou) REFERENCES fournis (numfou)
);

CREATE TABLE ligcom (
  numcom int(10) NOT NULL,
  numlig tinyint(3) NOT NULL,
  codart char(4) NOT NULL,
  qtecde int(10) NOT NULL,
  priuni varchar(50) NOT NULL,
  qteliv int(10) DEFAULT NULL,
  derliv date NOT NULL,
  PRIMARY KEY (numcom,numlig),
  CONSTRAINT ligcom_ibfk_1 FOREIGN KEY (numcom) REFERENCES entcom (numcom),
  CONSTRAINT ligcom_ibfk_2 FOREIGN KEY (codart) REFERENCES produit (codart)
);

CREATE TABLE vente (
  codart char(4) NOT NULL,
  numfou varchar(25)NOT NULL,
  delliv smallint(5) NOT NULL,
  qte1 int(10) NOT NULL,
  prix1 varchar(50) NOT NULL,
  qte2 int(10) DEFAULT NULL,
  prix2 varchar(50)DEFAULT NULL,
  qte3 int(10) DEFAULT NULL,
  prix3 varchar(50) DEFAULT NULL,
  PRIMARY KEY (codart,numfou),
  CONSTRAINT vente_ibfk_1 FOREIGN KEY (numfou) REFERENCES fournis (numfou),
  CONSTRAINT vente_ibfk_2 FOREIGN KEY (codart) REFERENCES produit (codart)
) ;

