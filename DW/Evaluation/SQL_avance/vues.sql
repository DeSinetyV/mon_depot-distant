--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  Vues
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


CREATE view catalogue as 
SELECT pro_id, pro_ref,pro_name, pro_cat_id, cat_name FROM products
JOIN categories on cat_id = pro_cat_id


--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  Procédures  stockées
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER |
CREATE PROCEDURE facture(
            IN id_commande INT,
            OUT total_commande INT)
BEGIN
    SELECT SUM((ode_unit_price * ode_quantity)*(1-(ode_discount/100)))  INTO total_commande
    FROM orders_details
    WHERE  ode_pro_id = id_commande;
END |
DELIMITER ; 

 call facture(8, @result);
 SELECT @result

 --/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  Triggers
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



CREATE table if not EXISTS commander_article (
    codart INT,
    qte INT,
    date DATE
)

DELIMITER |

CREATE TRIGGER after_products_update
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    DECLARE id INT;
    DECLARE stock INT;
    DECLARE alert INT;
    set id = NEW.pro_id;
    SET stock = new.pro_stock;
    set alert = old.pro_stock_alert;
    DELETE from commander_article where codart = id;
    IF (alert > stock)
    THEN 
        INSERT INTO commander_article (codart, qte, date) VALUES (id, alert - stock, now());

    end IF;

END |

DELIMITER ;

---------------------------------------------VERSION2-----------------------------------------------------------------------


DELIMITER |


CREATE TRIGGER after_products_update
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    DECLARE id INT;
    DECLARE stock INT;
    DECLARE alert INT;
    DECLARE v_codart INT;

    SET id = NEW.pro_id;
    SET stock = NEW.pro_stock;
    SET alert = NEW.pro_stock_alert;
    SET v_codart = (SELECT codart FROM commander_articles WHERE codart = id);

    IF (stock < alert)
    THEN
        IF ISNULL(v_codart)
        THEN
            INSERT INTO commander_articles 
            VALUES
            (id, alert - stock, now());
        ELSE
            UPDATE commander_articles
            SET
                qte = alert - stock,
                date = now()
            WHERE codart = v_codart;
        END IF;
    END IF;
END |

DELIMITER ;



--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  Transactions
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


--V1--

START TRANSACTION;
INSERT INTO posts VALUES (36, 'Retraité(e)');
UPDATE employees SET emp_pos_id = 36 WHERE emp_id = 59;
UPDATE employees SET emp_pos_id = 2, emp_superior_id = 4, emp_salary = emp_salary * (1 + (5/100)) WHERE emp_id = 38;
UPDATE employees SET emp_superior_id = 38 WHERE emp_pos_id = 14 AND emp_id != 38;
SELECT * FROM employees WHERE emp_id = 38;
SELECT * FROM employees WHERE emp_pos_id = 14;
COMMIT;


--V2-- :)   parce que pourquoi faire simple quand on peux faire compliqué :}

START TRANSACTION



SET @pepinieristes= ( SELECT pos_id FROM posts
				WHERE posts.pos_libelle = 'Pépiniériste');

SET @plus_vieux_pepinieriste= ( SELECT emp_id FROM employees
                  join posts ON posts.pos_id = emp_pos_id
				WHERE posts.pos_libelle = 'Pépiniériste'
				ORDER BY emp_enter_date ASC
				LIMIT 1);

-- les pépinieristes passe sous la direction du plus vieux d'entre eux

UPDATE employees as a
SET emp_superior_id = @plus_vieux_pepinieriste
WHERE emp_pos_id = @pepinieristes;


-- le pépinieriste le plus ancien prend la place de Amity HANNAH

UPDATE employees as a
SET  emp_superior_id = (SELECT emp_superior_id from (select * from employees)as b   --son supérieur change
					join posts ON posts.pos_id = emp_pos_id
             WHERE emp_firstname like 'Amity' AND emp_lastname like 'HANNAH'),
    emp_pos_id = (SELECT emp_pos_id from (select * from employees)as b              --son poste change
					join posts ON posts.pos_id = emp_pos_id
             WHERE emp_firstname like 'Amity' AND emp_lastname like 'HANNAH'),
    emp_salary = emp_salary*1.05                                                    --son salaire augmente de 5 %
WHERE emp_id = @plus_vieux_pepinieriste;


--création du poste 'retraité'
INSERT INTO posts (pos_libelle)
VALUES ('retraité');


-- le poste de Amity HANNAH passe en 'rétraité'
UPDATE employees as a
join posts ON posts.pos_id = emp_pos_id
SET emp_pos_id = ( SELECT pos_id FROM posts
				WHERE pos_libelle = 'retraité')
WHERE emp_id = (SELECT emp_id from (select * from employees)as b
					join posts ON posts.pos_id = emp_pos_id
             WHERE emp_firstname like 'Amity' AND emp_lastname like 'HANNAH');

COMMIT;
