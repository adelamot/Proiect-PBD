-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 08:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proiect1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`user`@`localhost` PROCEDURE `vinde_produs`(IN `IdProdus` INT(11), IN `Cantitate` INT(11), IN `NumarCont` VARCHAR(8))
    MODIFIES SQL DATA
insert into comenzi values(NumarCont,IdProdus,Cantitate,CURRENT_DATE)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `NumarCont` varchar(8) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Prenume` varchar(30) NOT NULL,
  `DataNasterii` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES
('11111111', 'Popescu', 'Ion', '2020-10-09'),
('12341234', 'Corbu', 'Maria', '2020-11-01'),
('22222222', 'Georgescu', 'Andreea', '1983-08-23'),
('33333333', 'Ionescu', 'Robert', '1982-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE IF NOT EXISTS `comenzi` (
  `NumarCont` varchar(8) DEFAULT NULL,
  `IdProdus` int(11) DEFAULT NULL,
  `Cantitate` int(11) NOT NULL,
  `DataVanzarii` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`NumarCont`, `IdProdus`, `Cantitate`, `DataVanzarii`) VALUES
('12341234', 1, 3, '2020-11-16'),
('12341234', 2, 1, '2020-11-16'),
('12341234', 3, 2, '2020-11-16'),
('22222222', 2, 2, '2020-11-16'),
('12341234', 3, 2, '2020-11-16');

--
-- Triggers `comenzi`
--
DELIMITER //
CREATE TRIGGER `decrementareStoc` AFTER INSERT ON `comenzi`
 FOR EACH ROW Update `proiect1`.`produse` set produse.Stoc=produse.Stoc - NEW.Cantitate where produse.IdProdus=NEW.IdProdus
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE IF NOT EXISTS `produse` (
`IdProdus` int(11) NOT NULL,
  `Produs` varchar(80) NOT NULL,
  `Garantie` int(11) NOT NULL,
  `Stoc` int(11) NOT NULL,
  `ValoareUnitara` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`IdProdus`, `Produs`, `Garantie`, `Stoc`, `ValoareUnitara`) VALUES
(1, 'Fujitsu Siemens Amilo Pro', 1, 10, 2000),
(2, 'Indesit WLI1000', 3, 3, 900),
(3, 'Gorenje RC400', 3, 2, 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
 ADD PRIMARY KEY (`NumarCont`);

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
 ADD KEY `FK_NrCont` (`NumarCont`), ADD KEY `FK_IdProd` (`IdProdus`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
 ADD PRIMARY KEY (`IdProdus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
MODIFY `IdProdus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
ADD CONSTRAINT `FK_IdProd` FOREIGN KEY (`IdProdus`) REFERENCES `produse` (`IdProdus`),
ADD CONSTRAINT `FK_NrCont` FOREIGN KEY (`NumarCont`) REFERENCES `clienti` (`NumarCont`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
