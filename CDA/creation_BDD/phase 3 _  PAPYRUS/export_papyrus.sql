-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2022 at 11:36 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papyrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `entcom`
--

CREATE TABLE `entcom` (
  `numcom` int(10) NOT NULL,
  `obscom` varchar(50) DEFAULT NULL,
  `datcom` timestamp NOT NULL DEFAULT current_timestamp(),
  `numfou` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fournis`
--

CREATE TABLE `fournis` (
  `numfou` varchar(25) NOT NULL,
  `nomfou` varchar(25) NOT NULL,
  `ruefou` varchar(50) NOT NULL,
  `posfou` char(5) NOT NULL,
  `vilfou` varchar(30) NOT NULL,
  `confou` varchar(15) NOT NULL,
  `satisf` tinyint(3) DEFAULT NULL CHECK (`satisf` >= 0 and `satisf` <= 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ligcom`
--

CREATE TABLE `ligcom` (
  `numcom` int(10) NOT NULL,
  `numlig` tinyint(3) NOT NULL,
  `codart` char(4) NOT NULL,
  `qtecde` int(10) NOT NULL,
  `priuni` varchar(50) NOT NULL,
  `qteliv` int(10) DEFAULT NULL,
  `derliv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `codart` char(4) NOT NULL,
  `libart` varchar(30) NOT NULL,
  `stkale` int(10) NOT NULL,
  `stkphy` int(10) NOT NULL,
  `qteann` int(10) NOT NULL,
  `unimes` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `codart` char(4) NOT NULL,
  `numfou` varchar(25) NOT NULL,
  `delliv` smallint(5) NOT NULL,
  `qte1` int(10) NOT NULL,
  `prix1` varchar(50) NOT NULL,
  `qte2` int(10) DEFAULT NULL,
  `prix2` varchar(50) DEFAULT NULL,
  `qte3` int(10) DEFAULT NULL,
  `prix3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entcom`
--
ALTER TABLE `entcom`
  ADD PRIMARY KEY (`numcom`),
  ADD KEY `numfou` (`numfou`),
  ADD KEY `numfou_2` (`numfou`);

--
-- Indexes for table `fournis`
--
ALTER TABLE `fournis`
  ADD PRIMARY KEY (`numfou`);

--
-- Indexes for table `ligcom`
--
ALTER TABLE `ligcom`
  ADD PRIMARY KEY (`numcom`,`numlig`),
  ADD KEY `ligcom_ibfk_2` (`codart`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codart`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`codart`,`numfou`),
  ADD KEY `vente_ibfk_1` (`numfou`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entcom`
--
ALTER TABLE `entcom`
  MODIFY `numcom` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entcom`
--
ALTER TABLE `entcom`
  ADD CONSTRAINT `entcom_ibfk_1` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`);

--
-- Constraints for table `ligcom`
--
ALTER TABLE `ligcom`
  ADD CONSTRAINT `ligcom_ibfk_1` FOREIGN KEY (`numcom`) REFERENCES `entcom` (`numcom`),
  ADD CONSTRAINT `ligcom_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`);

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`numfou`) REFERENCES `fournis` (`numfou`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`codart`) REFERENCES `produit` (`codart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
