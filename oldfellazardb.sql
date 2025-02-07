-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2025 at 09:03 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fellazardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminUsername` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminPassword`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `contactlenstype`
--

DROP TABLE IF EXISTS `contactlenstype`;
CREATE TABLE IF NOT EXISTS `contactlenstype` (
  `contactLensTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `contactLensTypeName` varchar(255) NOT NULL,
  PRIMARY KEY (`contactLensTypeId`),
  UNIQUE KEY `contactLensTypeName` (`contactLensTypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finalprescriptions`
--

DROP TABLE IF EXISTS `finalprescriptions`;
CREATE TABLE IF NOT EXISTS `finalprescriptions` (
  `prescriptionId` int(11) NOT NULL AUTO_INCREMENT,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  `od` varchar(50) DEFAULT NULL,
  `odPh` varchar(50) DEFAULT NULL,
  `odVasc` varchar(50) DEFAULT NULL,
  `odVacc` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `osVacc` varchar(50) DEFAULT NULL,
  `osVasc` varchar(50) DEFAULT NULL,
  `osPh` varchar(50) DEFAULT NULL,
  `addFirst` varchar(50) DEFAULT NULL,
  `addFirstNVA` varchar(50) DEFAULT NULL,
  `addSecond` varchar(50) NOT NULL,
  `addSecondNVA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prescriptionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frameparameters`
--

DROP TABLE IF EXISTS `frameparameters`;
CREATE TABLE IF NOT EXISTS `frameparameters` (
  `frameParameterId` int(11) NOT NULL AUTO_INCREMENT,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  `frameTypeId` int(11) NOT NULL,
  `contactLensTypeId` int(11) NOT NULL,
  `hor` varchar(255) DEFAULT NULL,
  `ver` varchar(255) DEFAULT NULL,
  `nbl` varchar(255) DEFAULT NULL,
  `fittingH` varchar(255) DEFAULT NULL,
  `segmentH` varchar(255) DEFAULT NULL,
  `effectiveDIA` varchar(255) DEFAULT NULL,
  `monoBinoPD` varchar(255) DEFAULT NULL,
  `lensBrand` varchar(255) DEFAULT NULL,
  `contactLensPrice` int(11) DEFAULT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  PRIMARY KEY (`frameParameterId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frametype`
--

DROP TABLE IF EXISTS `frametype`;
CREATE TABLE IF NOT EXISTS `frametype` (
  `frameTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `frameTypeName` varchar(255) NOT NULL,
  PRIMARY KEY (`frameTypeId`),
  UNIQUE KEY `frameTypeName` (`frameTypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lenstypes`
--

DROP TABLE IF EXISTS `lenstypes`;
CREATE TABLE IF NOT EXISTS `lenstypes` (
  `lensTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `lensName` varchar(255) NOT NULL,
  PRIMARY KEY (`lensTypeId`),
  UNIQUE KEY `lensName` (`lensName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oldrx`
--

DROP TABLE IF EXISTS `oldrx`;
CREATE TABLE IF NOT EXISTS `oldrx` (
  `oldRXId` int(11) NOT NULL AUTO_INCREMENT,
  `oldRXDate` date NOT NULL,
  `patientId` int(11) NOT NULL,
  `oldOD` varchar(255) DEFAULT NULL,
  `oldODVA` varchar(255) DEFAULT NULL,
  `oldOS` varchar(255) DEFAULT NULL,
  `oldOSVA` varchar(255) DEFAULT NULL,
  `oldADD` varchar(255) DEFAULT NULL,
  `oldADDVA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oldRXId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oldtypeoflens`
--

DROP TABLE IF EXISTS `oldtypeoflens`;
CREATE TABLE IF NOT EXISTS `oldtypeoflens` (
  `oldTypeOfLensId` int(11) NOT NULL AUTO_INCREMENT,
  `lensTypeId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`oldTypeOfLensId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patientId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  PRIMARY KEY (`patientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userselectedlenstype`
--

DROP TABLE IF EXISTS `userselectedlenstype`;
CREATE TABLE IF NOT EXISTS `userselectedlenstype` (
  `userSelectedLensTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `lensTypeId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`userSelectedLensTypeId`),
  KEY `lensTypeId` (`lensTypeId`),
  KEY `patientId` (`patientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userselectedlenstype`
--
ALTER TABLE `userselectedlenstype`
  ADD CONSTRAINT `userselectedlenstype_ibfk_1` FOREIGN KEY (`lensTypeId`) REFERENCES `lenstypes` (`lensTypeId`) ON DELETE CASCADE,
  ADD CONSTRAINT `userselectedlenstype_ibfk_2` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
