--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 1
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--base HOTEL

--1--
CREATE VIEW v_hotels_station
AS
SELECT hot_nom, sta_nom  FROM hotel
join station on hot_sta_id = sta_id;

SELECT * FROM v_hotels_station


--2--
CREATE VIEW v_hotels_chambres
AS
SELECT hot_nom, cha_numero FROM hotel
join chambre on cha_hot_id = hot_id;

SELECT * FROM v_hotels_chambres


--3--
CREATE VIEW v_reservation_clients
AS
SELECT res_id, cli_nom FROM reservation
join client on res_cli_id = cli_id;

SELECT * FROM v_reservation_clients


--4--
CREATE VIEW v_chambre_hotel_station
AS
SELECT cha_numero, hot_nom, sta_nom  FROM hotel
join station on hot_sta_id = sta_id
join chambre on cha_hot_id = hot_id;

SELECT * FROM v_chambre_hotel_station


--5--
CREATE VIEW v_reservation_clients_hotel
AS
SELECT res_id, cli_nom, hot_nom FROM reservation
join client on res_cli_id = cli_id
join chambre on res_cha_id = cha_id
join hotel on cha_hot_id = hot_id;

SELECT * FROM v_reservation_clients


--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
--                                                  EXERCICE 2
--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- base GESCOM_AFPA

--1--
CREATE VIEW v_details
AS
SELECT ode_pro_id, SUM(ode_quantity) AS QteTot, SUM(ode_quantity)*ode_unit_price AS PrixTot from orders_details
GROUP BY ode_pro_id;

SELECT * FROM v_details


--2-- ('Zoom' n'existe pas. remplacons le par 'barb002')
CREATE VIEW v_Ventes_barb002
AS
SELECT * from orders_details
join products on pro_id = ode_pro_id
where pro_ref = "barb002";

SELECT * FROM v_Ventes_barb002