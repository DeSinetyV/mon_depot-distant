create DATABASE HOTEL;

use HOTEL;

create TABLE Reservation(
num_chambre int NOT NULL,
num_client int,
date_debut DATE,
date_fin DATE,
date_réservation DATE,
montant_arrhes varchar(20),
prix_total varchar(20),
PRIMARY KEY (num_chambre,num_client)
);

create TABLE Client(
adresse_client varchar(50),
nom_client varchar(50),
nom_prenom varchar(30),
num_client int,
FOREIGN KEY (num_client) REFERENCES Reservation(num_client) 
);

create TABLE Chambre(
num_chambre int,
FOREIGN KEY (num_chambre) REFERENCES Reservation(num_chambre) 
);

create TABLE Hotel(
num_hotel int NOT NULL PRIMARY KEY
);

create TABLE Station(
num_station int NOT NULL PRIMARY KEY
);
