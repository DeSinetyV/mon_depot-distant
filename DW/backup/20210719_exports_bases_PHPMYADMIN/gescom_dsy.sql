-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 juil. 2021 à 08:06
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gescom_dsy`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--
create database if not exists gescom_dsy;

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(40) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_lastname` varchar(30) DEFAULT NULL,
  `cus_firstname` varchar(30) DEFAULT NULL,
  `cus_password` varchar(50) DEFAULT NULL,
  `cus_dateMod` date DEFAULT NULL,
  `cus_dateAdd` date DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `diriger`
--

DROP TABLE IF EXISTS `diriger`;
CREATE TABLE IF NOT EXISTS `diriger` (
  `emp_id` int(11) NOT NULL,
  `emp_id_1` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`,`emp_id_1`),
  KEY `emp_id_1` (`emp_id_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_service` varchar(50) DEFAULT NULL,
  `emp_salary` smallint(6) NOT NULL,
  `emp_ancienneté` int(11) DEFAULT NULL,
  `emp_sex` char(10) DEFAULT NULL,
  `emp_nbrChildren` int(11) DEFAULT NULL,
  `emp_phone` char(10) NOT NULL,
  `sto_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_phone` (`emp_phone`),
  KEY `sto_id` (`sto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_datePayement` date DEFAULT NULL,
  `ord_dateModif` date DEFAULT NULL,
  `cus_id` int(11) NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `cus_id` (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ord_prod`
--

DROP TABLE IF EXISTS `ord_prod`;
CREATE TABLE IF NOT EXISTS `ord_prod` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_id` int(11) NOT NULL,
  `ord_prod_reduction` varchar(50) DEFAULT NULL,
  `ord_prod_quantity` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prod_id`,`ord_id`),
  KEY `ord_id` (`ord_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(30) NOT NULL,
  `prod_price` decimal(12,2) NOT NULL,
  `prod_references` char(15) NOT NULL,
  `prod_codeEAN` varchar(30) NOT NULL,
  `prod_color` varchar(10) DEFAULT NULL,
  `prod_label` varchar(30) NOT NULL,
  `prod_description` text,
  `prod_dateAjout` date NOT NULL,
  `prod_dateModif` date DEFAULT NULL,
  `prod_onSale` tinyint(1) NOT NULL,
  `sup_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `prod_name` (`prod_name`),
  UNIQUE KEY `prod_references` (`prod_references`),
  UNIQUE KEY `prod_codeEAN` (`prod_codeEAN`),
  KEY `sup_id` (`sup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `sto_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `store_prod_stockAlert` smallint(6) DEFAULT NULL,
  `store_prod_stockPhy` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`sto_id`,`prod_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `sto_id` int(11) NOT NULL AUTO_INCREMENT,
  `sto_name` varchar(50) NOT NULL,
  `sto_city` varchar(50) NOT NULL,
  PRIMARY KEY (`sto_id`),
  UNIQUE KEY `sto_name` (`sto_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(40) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_name` (`sub_name`),
  KEY `cat_id` (`cat_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_companyName` varchar(50) NOT NULL,
  `sup_contactName` varchar(50) DEFAULT NULL,
  `sup_adress` varchar(50) NOT NULL,
  `sup_city` varchar(50) NOT NULL,
  `sup_phone` char(10) NOT NULL,
  PRIMARY KEY (`sup_id`),
  UNIQUE KEY `sup_companyName` (`sup_companyName`),
  UNIQUE KEY `sup_phone` (`sup_phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
