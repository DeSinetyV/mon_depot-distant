DROP DATABASE OTO;
CREATE DATABASE OTO;
USE OTO;

CREATE TABLE vehicle (
    veh_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    veh_modele VARCHAR(20)NOT NULL,
    veh_year INT NOT NULL,
    veh_kilometer DECIMAL,
    veh_utilitaire BOOLEAN NOT NULL,
    veh_new BOOLEAN NOT NULL,
    veh_price DECIMAL NOT NULL
);
CREATE TABLE accessories (
    acc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    acc_name  VARCHAR(20),
    acc_references VARCHAR(20),
    acc_stock INT,
    acc_price INT
);



CREATE TABLE client (
   cli_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_firstname VARCHAR(20)NOT NULL,
    cli_lastname VARCHAR(20)NOT NULL,
    cli_particuliers BOOLEAN
);
CREATE TABLE commercial (
    com_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    com_firstname VARCHAR(20)NOT NULL,
    com_lastname VARCHAR(20)NOT NULL,
    com_particuliers BOOLEAN,
    cli_id 	INT,
    FOREIGN KEY (cli_id) REFERENCES client(cli_id) 
);
    

CREATE TABLE orders (
    ord_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_id INT,
    com_id INT,
    ord_date DATETIME, 
    ord_type VARCHAR(10) CHECK(ord_entretien in ('vente','entretien','reparation','accessoires')),
    FOREIGN KEY (cli_id) REFERENCES client(cli_id),
    FOREIGN KEY (com_id) REFERENCES commercial(com_id)
);
CREATE TABLE sale_vehicle  (
    sale_veh_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ord_id INT,
    veh_id INT,
    sale_veh_quantity INT,
    FOREIGN KEY (veh_id) REFERENCES vehicle(veh_id),
    FOREIGN KEY (ord_id) REFERENCES orders(ord_id) 
);
CREATE TABLE sale_accessories  (
    sale_acc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ord_id INT,
    acc_id INT,
    sale_acc_quantity INT,
    FOREIGN KEY (acc_id) REFERENCES accessories(acc_id),
    FOREIGN KEY (ord_id) REFERENCES orders(ord_id) 
);

CREATE TABLE services (
    ser_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ord_id INT,
    ser_time INT,
    FOREIGN KEY (ord_id) REFERENCES orders(ord_id) 
)