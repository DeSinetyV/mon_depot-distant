--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 1
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER |

create procedure Lst_Suppliers()
BEGIN
    SELECT sup_id, sup_address, sup_contact from suppliers
    WHERE EXISTS
    (SELECT pro_sup_id from products WHERE pro_sup_id = sup_id);
END |

DELIMITER ;

call Lst_suppliers;

--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 2
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


DELIMITER |

create procedure Lst_Rush_Orders( IN p_status VARCHAR (25))
BEGIN
    SELECT * from orders
    WHERE ord_status = p_status;

END |

DELIMITER ;

call Lst_Rush_Orders("commande urgente")


--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 3
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DELIMITER |

create procedure CA_Supplier( IN p_code_fournisseur VARCHAR (50),
                              IN p_annee char(4),
                              OUT p_CA INT
                              )
BEGIN
    DECLARE p_existe varchar(50);
    SET p_existe =(SELECT p_code_fournisseur from suppliers
                   WHERE sup_id = p_code_fournisseur 
                   );



 --   declare @annee char(4);
 --   set @annee = p_annee +'%';

    IF ISNULL(p_existe) 
    THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Le fournisseur n'existe pas !";
    ELSE
        SELECT SUM(ode_quantity*ode_unit_price) INTO p_CA
        FROM orders_details
        JOIN products on ode_pro_id = pro_id
        JOIN suppliers on pro_sup_id = sup_id
        JOIN orders on  ode_ord_id = ord_id
        WHERE sup_id= p_code_fournisseur AND ord_payment_date LIKE CONCAT( p_annee,'%');
    END IF;
END |

DELIMITER ;