
    --/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 3
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



--Que concluez-vous ?
--      pas de modification de la base
--Les données sont-elles modifiables par d'autres utilisateurs (ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?
--      test effectué avec "test_marketing": il peut ffectuer un SELECT
--La transaction est-elle terminée ?
--   NON
--Comment rendre la modification permanente ?
--   commande COMMIT

START TRANSACTION
SELECT nomfou FROM fournis WHERE numfou = 120;    
UPDATE fournis SET nomfou = 'GROSBRIGAND' WHERE numfou = 120;
SELECT nomfou FROM fournis WHERE numfou = 120; 
COMMIT


--Comment annuler la transaction ?
--   commande ROLLBACK

START TRANSACTION;
SELECT nomfou FROM fournis WHERE numfou = 120;    
UPDATE fournis SET nomfou = 'GROSBRIGAND' WHERE numfou = 120;
SELECT nomfou FROM fournis WHERE numfou = 120; 
ROLLBACK