--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  phase 1
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DELIMITER |
CREATE TRIGGER add_total 
AFTER INSERT ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot-remise WHERE id=id_c; -- on stock le total dans la table commande
END |

CREATE TRIGGER update_total 
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = new.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot-remise WHERE id=id_c; -- on stock le total dans la table commande
END |

CREATE TRIGGER del_total 
AFTER DELETE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = old.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot-remise WHERE id=id_c; -- on stock le total dans la table commande
END |


DELIMITER ;


--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  phase 2
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







---------------------------------------------VERSION2-----------------------------------------------------------------------


DELIMITER ;


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