/*///////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        base et table
///////////////////////////////////////////////////////////////////////////////////////////////////////////*/
create DATABASE HOTEL;

use HOTEL;

create TABLE Client(
num_client int PRIMARY KEY,
adresse_client varchar(50),
nom_client varchar(50),
nom_prenom varchar(30)
);

create TABLE Station(
num_station int NOT NULL PRIMARY KEY,
nom_station varchar(30)
);

create TABLE Hotel(
num_hotel int NOT NULL PRIMARY KEY,
capacite_hotel int,
categorie_hotel varchar(30),
nom_hotel varchar(30),
adresse_hotel varchar(30),
num_station int,
FOREIGN KEY (num_station) REFERENCES Station(num_station)
);

create TABLE Chambre(
num_chambre int NOT NULL PRIMARY KEY,
capacite_chambre int,
degre_confort varchar(20),
exposition varchar(20),
type_chambre varchar(20),
num_hotel int,
FOREIGN KEY (num_hotel) REFERENCES Hotel(num_hotel)
);

create TABLE Reservation(
num_chambre int,
num_client int ,
date_debut DATE,
date_fin DATE,
date_réservation DATE,
montant_arrhes varchar(20),
prix_total varchar(20),
FOREIGN KEY (num_client) REFERENCES Client(num_client) ,
FOREIGN KEY (num_chambre) REFERENCES Chambre(num_chambre)
);

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        utilisateurs
///////////////////////////////////////////////////////////////////////////////////////////////////////////*/

grant all privileges on Hotel.* to 'util1'@'%' IDENTIFIED BY 'azerty';
grant select on Hotel.* to 'util2'@'%' IDENTIFIED BY 'azerty';
grant show view, select on Hotel.Station to 'util3'@'%' IDENTIFIED BY 'azerty';

show grants for util1;
show grants for util2;
show grants for util3;


/*///////////////////////////////////////////////////////////////////////////////////////////////////////////
                                       COURS alimenter base
///////////////////////////////////////////////////////////////////////////////////////////////////////////

INSERT INTO NOM_DE_TABLE (NOMS DE COLONNES)
VALUES (LISTE DE VALEURS)

exemple:
    INSERT INTO EMPLOYES (NOEMP, NOM, PRENOM, DEPT, SALAIRE) <-- inserer dans la table EMPLOYES dans les colonnes selectionnés entre ()
    VALUES  (00140,'REEVES','HUBERT','A00', 2100),    <--\
            (00150,'JACQUARD','ALBERT','B00', 1800),  <---   les valeurs suivantes. Chaque valeur allant dans la colonne corespondante cité audessus  
            (00999,'LOPER", 'DAVE', 'C00', 900)       <--/


UPDATE NOM_DE_TABLE
SET NOM_COLONNE_1 = VALEUR_1 [,… NOM_COLONNE_n = VALEUR_n]
WHERE condition

exemple:
    UPDATE employes
    SET nom = 'LOPER', prenom = 'Dave', adresse = '15 avenue Tella'
    WHERE noemp = '00999'                                              <-- sans WHERE impact toute la table (ici seul l'employé 00999 est modifié)

DELETE [FROM] NOM_DE_TABLE
WHERE CLAUSE

DELETE FROM employes
    WHERE nodept = 'E21'
    AND ville = 'Amiens'
*/


/*///////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        papyrus phase 1
///////////////////////////////////////////////////////////////////////////////////////////////////////////*/

INSERT INTO `fournis` (`numfou`, `nomfou`, `ruefou`, `posfou`, `vilfou`, `confou`, `satisf`) 
VALUES (120, 'GROBRIGAN', '20 RUE DU PAPIER', 92200, 'papercity', 'Georges', 8),
       (540, 'ECLIPSE','53 RUE laisse flotter les rubans',78250, 'bugbugville', 'Nestor', 7),
        (8700,'MEDICIS','120 rue des plantes',75014,'paris','lison',0),
        (9120,'DISCOBOL','11 rue des sports',85100,'la roche sur yon','hercule',8),
        (9150,'DEPANPAP','26 avenue des locomotives',59987,'coroncountry','pollux',5),
        (9180,'HURRYTAPE','68 boulevard des octets',4044,'dumpville','track',0);



INSERT INTO entcom (numcom, obscom, datcom, numfou)  
VALUES  (70010, NULL, '2018-08-23 15:59:51', 120),
        (70011, 'commande urgente', '2018-08-23 15:59:51', 540),
        (70020,NULL,'2018-08-23 15:59:51',9120),
        (70025,'commandes urgente','2018-08-23 15:59:51',9150),
        (70210,'commandes cadencée','2018-08-23 15:59:51',120),
        (70250,'commandes cadencée','2018-08-23 15:59:51',8700),
        (70300,NULL,'2018-08-23 15:59:51',9120),
        (70620,NULL,'2018-08-23 15:59:51',540),
        (70625,NULL,'2018-08-23 15:59:51',120),
        (70629,NULL,'2018-08-23 15:59:51',9180);


INSERT INTO ligcom (numcom,numlig,codart,qtecde,priuni,qteliv,derliv)
VALUES  (70010,1,'I100',3000,470,3000,"2007/03/15"),
        (70010,2,'I105',2000,485,2000,"2007-07-05"),
        (70010,3,'I108',1000,680,1000,"2007-08-20"),
        (70010,4,'D035',200,40,250,"2007-02-20"),
        (70010,5,'P220',6000,3500,6000,"2007-03-31"),
        (70010,6,'P240',6000,2000,2000,"2007-03-31"),
        (70011,1,'I105',1000,600,1000,"2007-05-16"),
        (70011,2,'P220',10000,3500,10000,"2007-08-31"),
        (70020,1,'B001',200,140,0,"2007-12-31"),
        (70020,2,'B002',200,140,0,"2007-12-31"),
        (70025,1,'I100',1000,590,1000,"2007-05-15"),
        (70025,2,'I105',500,590,500,"2007-03-15"),
        (70210,1,'I110',1000,470,1000,"2007-07-15"),
        (70250,1,'P230',15000,4900,12000,"2007-12-15"),
        (70250,2,'P220',10000,3350,10000,"2007-11-10"),
        (70300,1,'I100',50,790,50,"2007-10-31"),
        (70620,1,'I105',200,600,200,"2007-11-01"),
        (70625,1,'I100',1000,470,1000,"2007-10-15"),
        (70625,2,'P220',10000,3500,10000,"2007-10-31"),
        (70629,1,'B002',200,140,0,"2007-12-31"),
        (70629,2,'B002',200,140,0,"2007-12-31");

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////
                                   cours     Formaliser des requêtes SQL
///////////////////////////////////////////////////////////////////////////////////////////////////////////*//*


    SELECT
    FROM
    WHERE
    ORDER BY
    GROUP BY
    HAVING
    JOIN



    SELECT  <NOMS DE COLONNES OU EXPRESSIONS>
    FROM    <NOMS DE TABLES>
    WHERE   <CONDITIONS DE RECHERCHE>
    GROUP BY    <NOMS DE COLONNE DU SELECT>
    HAVING  <CONDITION DE RECHERCHE>
    ORDER BY    <NOM OU POSITION DE COLONNE 

exemples:
        SELECT NOM, SALAIRE FROM EMPLOYES

        SELECT CONCAT(NOM,' ',PRENOM),'SALAIRE :', SALAIRE * 100, 'CENTIMES '
        FROM EMPLOYES

        SELECT CONCAT(NOM,' ',PRENOM) AS 'NOM DU SALARIE', SALAIRE * 100 AS 'CENTIMES'
        FROM EMPLOYES

SELECT DISTINCT

L'option DISTINCT permet de ne conserver qu'un exemplaire de chaque ligne en double.

        SELECT DISTINCT WDEPT FROM EMPLOYES

LA CLAUSE LIMIT

    Exemple  : Lister les 5 premiers employés de la table EMPLOYES.

                SELECT NOM,PRENOM FROM EMPLOYES
                LIMIT 5;

SELECT CONDITIONNELLE AVEC WHERE

La clause WHERE permet de préciser les conditions de recherche sur les lignes de la table.

                SELECT * FROM EMPLOYES WHERE WDEPT = 41 OR WDEPT = '50' 

                SELECT NOM, SALAIRE, NOEMP FROM EMPLOYES
                WHERE NOEMP > '19' AND SALAIRE = 13000

                SELECT * FROM EMPLOYES
                WHERE (SALAIRE = 22500 OR SALAIRE = 23000) AND NOEMP >= '11'

                SELECT PRENOM, NOM FROM EMPLOYES                        ou                      SELECT PRENOM, NOM FROM EMPLOYES 
                WHERE SALAIRE BETWEEN 20000 AND 30000                                           WHERE SALAIRE NOT BETWEEN 20000 AND 30000


                SELECT * FROM EMPLOYES
                WHERE NOEMP IN ('0001', '0002', '0003', '004', '00005')
                -- ou
                SELECT * FROM EMPLOYES
                WHERE NOEMP BETWEEN 1 AND 5
                -- ou
                SELECT * FROM EMPLOYES
                WHERE NOEMP >= 1 AND NOEMP <= 5


