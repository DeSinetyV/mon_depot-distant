-- INSERT INTO NOM_DE_TABLE (NOMS DE COLONNES)
-- VALUES (LISTE DE VALEURS)

-- INSERT INTO EMPLOYES (NOEMP, NOM, PRENOM, DEPT, SALAIRE)
-- VALUES (00140,'REEVES','HUBERT','A00', 2100), (00150,'JACQUARD','ALBERT','B00', 1800)




-- UPDATE <NOM DE TABLE>
-- SET <NOM COLONNE 1> = <VALEUR 1> [,… <NOM COLONNE n> = <VALEUR n>]
-- WHERE <condition>

-- UPDATE EMPLOYES
-- SET SALAIRE = SALAIRE * 1,2, DEPT= 'A40'
-- WHERE NOEMP = 00040





-- DELETE [FROM] <NOM DE TABLE>
-- FROM <NOM DE TABLE> [, … <NOM DE TABLE n>]
-- WHERE <PREDICAT>

-- DELETE FROM EMPLOYES
-- WHERE WDEPT ='E21'






USE papyrus;

INSERT INTO `Station` (`numero_station`, `nom_station`) VALUES
(1, 'La Montagne'),
(2, 'Le sud'),
(3, 'La Plage');


INSERT INTO `Hotel` (`numero_hotel`, `capacite_hotel` , `categorie_hotel` , `nom_hotel`, `adresse_hotel`, `numero_station`) VALUES
(1, 100,2, 'Le Magnifique', 'rue du bas', 1),
(2, 18, 4,'Hotel du haut', 'rue du haut', 1),
(3, 29, 6,'Le Narval', 'place de la liberation', 1),
(4, 100,2, 'l hotel', 'rue haaute', 2),
(5, 18, 4,'Hotel nouveau', 'rue basse', 2),
(6, 29, 6,'Le trepot', 'place de tourcoing', 2),
(7, 100,2, 'Le plus beau', 'rue du general', 3),
(8, 18, 4,'Hotel du bosquet', 'rue du toit', 3),
(9, 29, 6,'Le superieur', 'place des tilleuls', 3);


INSERT INTO `Chambre` (`numero_chambre`, `capacite_chambre`, `numero_hotel`) VALUES
(1, 18, 1),
(2, 11, 1),
(3, 10, 1),
(4, 122, 2),
(5, 102, 2),
(6, 180, 2),
(7, 110, 3),
(8, 100, 3),
(9, 145, 3),
(10, 10, 4),
(11, 18, 4),
(12, 165, 4),
(13, 152, 5),
(14, 114, 5),
(15, 199, 5),
(16, 800, 6),
(17, 7000, 7),
(18, 10, 7),
(19, 168, 8),
(20, 45, 8),
(21, 67, 8),
(22, 95, 9),
(23, 23, 9),
(24, 54, 9),
(25, 78, 6),
(26, 87, 6),
(27, 89, 7);