-- CREATE USER 'dave_loper'@'123.45.67.89' IDENTIFIED BY '1Ksable';

-- GRANT ALL PRIVILEGES ON papyrus.* TO 'dave_loper'@'%';

	
-- GRANT select 
-- ON papyrus.fournis 	
-- TO dave_loper;

	
-- GRANT SELECT, INSERT, UPDATE 	
-- ON papyrus.vente	
-- TO dave_loper;


-- GRANT PRIVILEGE POUR LE COMPTE ADMIN
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;



-- CREATION DES COMPTES 
CREATE USER 'util1'@'%' IDENTIFIED BY'util1';
CREATE USER 'util2'@'%' IDENTIFIED BY'util2';
CREATE USER 'util3'@'%' IDENTIFIED BY'util3';


--APPLICATION DES DROITS D'ACCES
GRANT ALL PRIVILEGES ON papyrus.* TO 'util1'@'%';
GRANT SELECT ON papyrus.* TO 'util2'@'%';
GRANT SELECT ON papyrus.fournis TO'util3'@'%';
