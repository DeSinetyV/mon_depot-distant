create role if not exists 'gescom_marketing'@'%';

grant SELECT, INSERT , UPDATE, DELETE 
on gescom_afpa.products
to gescom_marketing;

grant SELECT, INSERT , UPDATE, DELETE 
on gescom_afpa.categories
to gescom_marketing;

grant SELECT 
on gescom_afpa.orders
to gescom_marketing;
grant SELECT 
on gescom_afpa.orders_details
to gescom_marketing;
grant SELECT 
on gescom_afpa.customers
to gescom_marketing;



CREATE user 'test_marketing'@'%' identified by '';

grant gescom_marketing
to 'test_marketing'@'%';





CREATE ROLE IF NOT EXISTS 'marketing'@'localhost';

grant SELECT, INSERT , UPDATE, DELETE 
on gescom_afpa.products
to gescom_marketing;

grant SELECT, INSERT , UPDATE, DELETE 
on gescom_afpa.categories
to gescom_marketing;

grant SELECT 
on gescom_afpa.orders
to gescom_marketing;
grant SELECT 
on gescom_afpa.orders_details
to gescom_marketing;
grant SELECT 
on gescom_afpa.customers
to gescom_marketing;

CREATE user 'test2_marketing'@'localhost' identified by '';

grant 'marketing'@'localhost'
to 'test2_marketing'@'localhost'



