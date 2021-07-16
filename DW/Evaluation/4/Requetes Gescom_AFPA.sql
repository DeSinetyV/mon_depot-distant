--1--
SELECT  CONCAT (emp_lastname,' ', emp_firstname) AS employé , emp_children AS nb_enfants 
FROM employees
ORDER BY emp_children DESC

--2--
SELECT cus_lastname, cus_firstname, cus_countries_id from customers
WHERE cus_countries_id NOT LIKE 'FR'


--3--
SELECT cus_city, cus_countries_id, cou_name from customers
JOIN countries ON cus_countries_id=cou_id
ORDER BY cus_city


--4--
SELECT cus_lastname, cus_update_date from customers
WHERE cus_update_date IS NOT NULL


--5--
SELECT cus_id, CONCAT (cus_lastname,' ', cus_firstname), cus_city from customers WHERE cus_city LIKE '%divos%'


--6--
SELECT pro_id, pro_name, pro_price from products
order by pro_price
LIMIT 1


--7--
SELECT pro_id, pro_ref, pro_name from products
WHERE pro_id != ALL
(SELECT DISTINCT ode_pro_id from orders_details)


--8--
SELECT pro_id, pro_ref,pro_color, pro_name, cus_id, cus_lastname, ord_id, ode_id from customers
JOIN orders ON ord_cus_id=cus_id
JOIN orders_details ON ode_ord_id=ord_id
JOIN products ON pro_id=ode_pro_id
WHERE cus_lastname ='Pikatchien'


--9--
SELECT cat_id, cat_name, pro_name from categories
JOIN products ON pro_cat_id= cat_id
ORDER BY cat_name


--10--
SELECT CONCAT (t1.emp_lastname,' ', t1.emp_firstname) AS employé,post1.pos_libelle, CONCAT (t2.emp_lastname,' ', t2.emp_firstname) AS supérieur,post2.pos_libelle
from employees as t1
JOIN employees as t2 on t1.emp_superior_id=t2.emp_id
JOIN posts as post1 on t1.emp_pos_id=post1.pos_id
JOIN posts as post2 on t2.emp_pos_id=post2.pos_id
ORDER by employé


--11-
SELECT pro_id, pro_name, ((ode_unit_price/100)*ode_discount) AS remise, ode_ord_id AS commande, ode_id as 'ligne commande' from products
JOIN orders_details ON ode_pro_id= pro_id
ORDER BY remise DESC
LIMIT 1


--12--
SELECT COUNT(cus_id) FROM customers 
JOIN countries on cou_id=cus_countries_id
WHERE cou_name = 'CANADA'


--13--
SELECT ode_id,ode_unit_price, ode_discount, ode_quantity, ode_ord_id, ode_pro_id, ord_order_date FROM orders_details
JOIN orders ON ode_ord_id=ord_id
WHERE ord_order_date LIKE '2020%'


--14--
SELECT sup_id, sup_address, sup_contact from suppliers
WHERE EXISTS
(SELECT pro_sup_id from products WHERE pro_sup_id = sup_id)


SELECT * FROM gescom_afpa.suppliers
WHERE EXISTS (SELECT pro_sup_id FROM gescom_afpa.products WHERE pro_sup_id = sup_id)


--15--
select SUM((ode_unit_price*ode_quantity)*(1-(ode_discount/100))) FROM orders_details
JOIN orders ON ord_id=ode_ord_id
WHERE ord_order_date like '2020%'


--16--
select ord_id, cus_lastname, ord_order_date, ode_quantity,((ode_unit_price*ode_quantity)*(1-(ode_discount/100)))as total FROM orders_details
JOIN orders ON ord_id=ode_ord_id
JOIN customers ON cus_id=ord_cus_id
ORDER BY total DESC


--17--
select AVG((ode_unit_price*ode_quantity)*(1-(ode_discount/100))) as total FROM orders_details


--18--
UPDATE products
SET pro_price = pro_price*0.9,
    pro_name='Camper'
WHERE pro_ref = 'barb004' 


--19--
UPDATE products
JOIN categories ON pro_cat_id=cat_id
SET pro_price = pro_price*1.011
WHERE cat_name = 'Parasols' 


--20--
DELETE products FROM products 
JOIN categories ON cat_id=pro_cat_id
WHERE  pro_id  NOT IN
(SELECT ode_pro_id from orders_details)
AND cat_name ='Tondeuses électriques'