create DATABASE HOTEL;

use HOTEL;

create TABLE Client(
numero_client int NOT NULL PRIMARY KEY,
adresse_client varchar(50),
nom_client varchar(50),
prenom_client varchar(30)
);

create TABLE Station(
numero_station int NOT NULL PRIMARY KEY,
nom_station varchar(30)
);

create TABLE Hotel(
numero_hotel int NOT NULL PRIMARY KEY,
capacite_hotel int,
categorie_hotel varchar(30),
nom_hotel varchar(50),
adresse_hotel varchar(50),
numero_station int,
FOREIGN KEY (numero_station) REFERENCES Station(numero_station)
);

create TABLE Chambre(
numero_chambre int NOT NULL PRIMARY KEY,
capacite_chambre int,
confort_chambre varchar(20),
exposition_chambre varchar(20),
type_chambre varchar(20),
numero_hotel int,
FOREIGN KEY (numero_hotel) REFERENCES Hotel(numero_hotel)
);

create TABLE Reservation(
numero_chambre int,
numero_client int ,
debut_reservation DATE,
fin_reservation DATE,
date_reservation DATE,
arrhes_reservation decimal(15,2),
prix_reservation decimal(15,2), 
PRIMARY KEY (numero_chambre,numero_client),
FOREIGN KEY (numero_client) REFERENCES Client(numero_client) ,
FOREIGN KEY (numero_chambre) REFERENCES Chambre(numero_chambre)
);
