-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2025 at 07:36 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

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
  `adminID` int NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `chiefcomplaint`
--

DROP TABLE IF EXISTS `chiefcomplaint`;
CREATE TABLE IF NOT EXISTS `chiefcomplaint` (
  `chiefComplaintId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `BOV_FAR` int DEFAULT '0',
  `BOV_NEAR` int DEFAULT '0',
  `HEADACHE` int DEFAULT '0',
  `DOUBLE_VISION` int DEFAULT '0',
  `GLARING` int DEFAULT '0',
  `ITCHY_EYES` int DEFAULT '0',
  `REDNESS` int DEFAULT '0',
  `LACRIMATION` int DEFAULT '0',
  `DRY_EYE` int DEFAULT '0',
  PRIMARY KEY (`chiefComplaintId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chiefcomplaint`
--

INSERT INTO `chiefcomplaint` (`chiefComplaintId`, `patientId`, `date`, `BOV_FAR`, `BOV_NEAR`, `HEADACHE`, `DOUBLE_VISION`, `GLARING`, `ITCHY_EYES`, `REDNESS`, `LACRIMATION`, `DRY_EYE`) VALUES
(1, 1, '2025-05-16 00:00:00', 0, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 0, 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosisId` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `patientId` int NOT NULL,
  `diagnosisOD` varchar(255) DEFAULT NULL,
  `diagnosisOS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`diagnosisId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisId`, `date`, `patientId`, `diagnosisOD`, `diagnosisOS`) VALUES
(1, '2025-05-16 00:00:00', 1, '3123', '31'),
(2, '2025-05-19 00:00:00', 1, 'OD', '5');

-- --------------------------------------------------------

--
-- Table structure for table `digitalhistory`
--

DROP TABLE IF EXISTS `digitalhistory`;
CREATE TABLE IF NOT EXISTS `digitalhistory` (
  `digitalHistoryId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `noOfHours` int DEFAULT NULL,
  `LAPTOP` int DEFAULT '0',
  `MOBILE` int DEFAULT '0',
  `DESKTOP` int DEFAULT '0',
  `TELEVISION` int DEFAULT '0',
  `sleepHours` int DEFAULT NULL,
  PRIMARY KEY (`digitalHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `digitalhistory`
--

INSERT INTO `digitalhistory` (`digitalHistoryId`, `patientId`, `date`, `noOfHours`, `LAPTOP`, `MOBILE`, `DESKTOP`, `TELEVISION`, `sleepHours`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 1, 0, 0, 0, 321),
(2, 1, '2025-05-19 00:00:00', 5, 1, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dominanteye`
--

DROP TABLE IF EXISTS `dominanteye`;
CREATE TABLE IF NOT EXISTS `dominanteye` (
  `dominantEyeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `OD` int DEFAULT '0',
  `OS` int DEFAULT '0',
  PRIMARY KEY (`dominantEyeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dominanteye`
--

INSERT INTO `dominanteye` (`dominantEyeId`, `patientId`, `date`, `OD`, `OS`) VALUES
(1, 1, '2025-05-16 00:00:00', 5, 5),
(2, 1, '2025-05-19 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `finalprescriptions`
--

DROP TABLE IF EXISTS `finalprescriptions`;
CREATE TABLE IF NOT EXISTS `finalprescriptions` (
  `prescriptionId` int NOT NULL AUTO_INCREMENT,
  `patientId` int NOT NULL,
  `date` datetime NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finalprescriptions`
--

INSERT INTO `finalprescriptions` (`prescriptionId`, `patientId`, `date`, `od`, `odPh`, `odVasc`, `odVacc`, `os`, `osVacc`, `osVasc`, `osPh`, `addFirst`, `addFirstNVA`, `addSecond`, `addSecondNVA`) VALUES
(1, 1, '2025-05-16 00:00:00', '13', '131', '13', '3131', '312', '13', '123121', '313', '31', '31313', '3', '13123'),
(2, 1, '2025-05-19 00:00:00', 'OD', '5', 'VAsc', 'Vacc', 'OS', '5', '5', '5', 'ADD', 'NVA', 'ADD2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `frameparameters`
--

DROP TABLE IF EXISTS `frameparameters`;
CREATE TABLE IF NOT EXISTS `frameparameters` (
  `frameParameterId` int NOT NULL AUTO_INCREMENT,
  `patientId` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `hor` varchar(255) DEFAULT NULL,
  `ver` varchar(255) DEFAULT NULL,
  `nbl` varchar(255) DEFAULT NULL,
  `fittingH` varchar(255) DEFAULT NULL,
  `segmentH` varchar(255) DEFAULT NULL,
  `effectiveDIA` varchar(255) DEFAULT NULL,
  `monoBinoPD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`frameParameterId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frameparameters`
--

INSERT INTO `frameparameters` (`frameParameterId`, `patientId`, `date`, `hor`, `ver`, `nbl`, `fittingH`, `segmentH`, `effectiveDIA`, `monoBinoPD`) VALUES
(1, 1, '2025-05-16 00:00:00', '31', '13', '312', '23', '22', '2', '321313'),
(2, 1, '2025-05-19 00:00:00', 'HOR', 'VER', 'NBL', 'FITTING H', 'SEGMENT H', 'EFFECTIVE DIA', 'MONO/BINO PD');

-- --------------------------------------------------------

--
-- Table structure for table `iop`
--

DROP TABLE IF EXISTS `iop`;
CREATE TABLE IF NOT EXISTS `iop` (
  `iopId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `OD` decimal(5,2) DEFAULT NULL,
  `OS` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`iopId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `iop`
--

INSERT INTO `iop` (`iopId`, `patientId`, `date`, `OD`, `OS`) VALUES
(1, 1, '2025-05-16 00:00:00', 31.00, 312.00),
(2, 1, '2025-05-19 00:00:00', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `lensprice`
--

DROP TABLE IF EXISTS `lensprice`;
CREATE TABLE IF NOT EXISTS `lensprice` (
  `lensPriceId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `lensBrand` varchar(255) DEFAULT NULL,
  `lensPrice` int DEFAULT NULL,
  `contactLensPrice` int DEFAULT NULL,
  `totalAmount` int DEFAULT NULL,
  PRIMARY KEY (`lensPriceId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lensprice`
--

INSERT INTO `lensprice` (`lensPriceId`, `patientId`, `date`, `lensBrand`, `lensPrice`, `contactLensPrice`, `totalAmount`) VALUES
(1, 1, '2025-05-16 00:00:00', '313', 2, 12321, 231),
(2, 1, '2025-05-19 00:00:00', 'Adidas', 100, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `lenstype`
--

DROP TABLE IF EXISTS `lenstype`;
CREATE TABLE IF NOT EXISTS `lenstype` (
  `lensTypeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `SV` int DEFAULT '0',
  `ANTI_RAD` int DEFAULT '0',
  `MC` int DEFAULT '0',
  `KK` int DEFAULT '0',
  `FT` int DEFAULT '0',
  `PAL` int DEFAULT '0',
  `DIGITAL` int DEFAULT '0',
  `EYEZEN` int DEFAULT '0',
  `PHOTO` int DEFAULT '0',
  `TRANS` int DEFAULT '0',
  `BLUE_LENS` int DEFAULT '0',
  `TINT_COLORED` int DEFAULT '0',
  PRIMARY KEY (`lensTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lenstype`
--

INSERT INTO `lenstype` (`lensTypeId`, `patientId`, `date`, `SV`, `ANTI_RAD`, `MC`, `KK`, `FT`, `PAL`, `DIGITAL`, `EYEZEN`, `PHOTO`, `TRANS`, `BLUE_LENS`, `TINT_COLORED`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

DROP TABLE IF EXISTS `medicalhistory`;
CREATE TABLE IF NOT EXISTS `medicalhistory` (
  `medicalHistoryId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `HYPERTENSION` int DEFAULT '0',
  `DIABETES` int DEFAULT '0',
  `CVD` int DEFAULT '0',
  `ASTHMA` int DEFAULT '0',
  `ALLERGIES` int DEFAULT '0',
  `OTHERS` int DEFAULT '0',
  PRIMARY KEY (`medicalHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`medicalHistoryId`, `patientId`, `date`, `HYPERTENSION`, `DIABETES`, `CVD`, `ASTHMA`, `ALLERGIES`, `OTHERS`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 0, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monobinopd`
--

DROP TABLE IF EXISTS `monobinopd`;
CREATE TABLE IF NOT EXISTS `monobinopd` (
  `monoBinoPDid` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `MONOBINO` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`monoBinoPDid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `monobinopd`
--

INSERT INTO `monobinopd` (`monoBinoPDid`, `patientId`, `date`, `MONOBINO`) VALUES
(1, 1, '2025-05-16 00:00:00', 999.99),
(2, 1, '2025-05-19 00:00:00', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `npa`
--

DROP TABLE IF EXISTS `npa`;
CREATE TABLE IF NOT EXISTS `npa` (
  `npaId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `OD` decimal(5,2) DEFAULT NULL,
  `OS` decimal(5,2) DEFAULT NULL,
  `OU` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`npaId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `npa`
--

INSERT INTO `npa` (`npaId`, `patientId`, `date`, `OD`, `OS`, `OU`) VALUES
(1, 1, '2025-05-16 00:00:00', 2.00, 2.00, 2.00),
(2, 1, '2025-05-19 00:00:00', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `npa_age`
--

DROP TABLE IF EXISTS `npa_age`;
CREATE TABLE IF NOT EXISTS `npa_age` (
  `npaAgeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `MIN` decimal(5,2) DEFAULT NULL,
  `AVE` decimal(5,2) DEFAULT NULL,
  `MAX` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`npaAgeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `npa_age`
--

INSERT INTO `npa_age` (`npaAgeId`, `patientId`, `date`, `MIN`, `AVE`, `MAX`) VALUES
(1, 1, '2025-05-16 00:00:00', 123.00, 13.00, 13.00),
(2, 1, '2025-05-19 00:00:00', 5.00, 5.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `npc`
--

DROP TABLE IF EXISTS `npc`;
CREATE TABLE IF NOT EXISTS `npc` (
  `npcId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `BREAK` decimal(5,2) DEFAULT NULL,
  `RECOVERY` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`npcId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `npc`
--

INSERT INTO `npc` (`npcId`, `patientId`, `date`, `BREAK`, `RECOVERY`) VALUES
(1, 1, '2025-05-16 00:00:00', 999.99, 999.99),
(2, 1, '2025-05-19 00:00:00', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `occupationalhistory`
--

DROP TABLE IF EXISTS `occupationalhistory`;
CREATE TABLE IF NOT EXISTS `occupationalhistory` (
  `occupationalHistoryId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `NON_WORKING` int DEFAULT '0',
  `WORKING` int DEFAULT '0',
  `FIELD` int DEFAULT '0',
  `OFFICE` int DEFAULT '0',
  `WFH` int DEFAULT '0',
  `BUSINESS` int DEFAULT '0',
  `STUDYING` int DEFAULT '0',
  PRIMARY KEY (`occupationalHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `occupationalhistory`
--

INSERT INTO `occupationalhistory` (`occupationalHistoryId`, `patientId`, `date`, `NON_WORKING`, `WORKING`, `FIELD`, `OFFICE`, `WFH`, `BUSINESS`, `STUDYING`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 0, 0, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ocularhistory`
--

DROP TABLE IF EXISTS `ocularhistory`;
CREATE TABLE IF NOT EXISTS `ocularhistory` (
  `ocularHistoryId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `GLAUCOMA` int DEFAULT '0',
  `CATARACT` int DEFAULT '0',
  `RETINA` int DEFAULT '0',
  `MACULA` int DEFAULT '0',
  `INJURIES` int DEFAULT '0',
  `OTHERS` int DEFAULT '0',
  PRIMARY KEY (`ocularHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ocularhistory`
--

INSERT INTO `ocularhistory` (`ocularHistoryId`, `patientId`, `date`, `GLAUCOMA`, `CATARACT`, `RETINA`, `MACULA`, `INJURIES`, `OTHERS`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 1, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oldframetypes`
--

DROP TABLE IF EXISTS `oldframetypes`;
CREATE TABLE IF NOT EXISTS `oldframetypes` (
  `oldFrameTypeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`oldFrameTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oldframetypes`
--

INSERT INTO `oldframetypes` (`oldFrameTypeId`, `patientId`, `date`, `value`) VALUES
(1, 1, '2025-05-16 00:00:00', 'Plastic'),
(2, 1, '2025-05-19 00:00:00', 'Rimless');

-- --------------------------------------------------------

--
-- Table structure for table `oldlenstype`
--

DROP TABLE IF EXISTS `oldlenstype`;
CREATE TABLE IF NOT EXISTS `oldlenstype` (
  `oldlensTypeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `SV` int DEFAULT '0',
  `ANTI_RAD` int DEFAULT '0',
  `MC` int DEFAULT '0',
  `KK` int DEFAULT '0',
  `FT` int DEFAULT '0',
  `PAL` int DEFAULT '0',
  `DIGITAL` int DEFAULT '0',
  `EYEZEN` int DEFAULT '0',
  `PHOTO` int DEFAULT '0',
  `TRANS` int DEFAULT '0',
  `BLUE_LENS` int DEFAULT '0',
  `TINT_COLORED` int DEFAULT '0',
  PRIMARY KEY (`oldlensTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oldlenstype`
--

INSERT INTO `oldlenstype` (`oldlensTypeId`, `patientId`, `date`, `SV`, `ANTI_RAD`, `MC`, `KK`, `FT`, `PAL`, `DIGITAL`, `EYEZEN`, `PHOTO`, `TRANS`, `BLUE_LENS`, `TINT_COLORED`) VALUES
(1, 1, '2025-05-16 00:00:00', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, 1, '2025-05-19 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oldrx`
--

DROP TABLE IF EXISTS `oldrx`;
CREATE TABLE IF NOT EXISTS `oldrx` (
  `oldRXId` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `oldRXDate` date NOT NULL,
  `patientId` int NOT NULL,
  `oldOD` varchar(255) DEFAULT NULL,
  `oldODVA` varchar(255) DEFAULT NULL,
  `oldOS` varchar(255) DEFAULT NULL,
  `oldOSVA` varchar(255) DEFAULT NULL,
  `oldADD` varchar(255) DEFAULT NULL,
  `oldADDVA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oldRXId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldrx`
--

INSERT INTO `oldrx` (`oldRXId`, `date`, `oldRXDate`, `patientId`, `oldOD`, `oldODVA`, `oldOS`, `oldOSVA`, `oldADD`, `oldADDVA`) VALUES
(1, '2025-05-16 00:00:00', '2025-05-13', 1, '123', '123', '123', '131', '3131', '3123'),
(2, '2025-05-19 00:00:00', '2025-05-12', 1, 'OD', 'VA', 'OS', 'VA', 'ADD', 'VA');

-- --------------------------------------------------------

--
-- Table structure for table `patientcontactlenstypes`
--

DROP TABLE IF EXISTS `patientcontactlenstypes`;
CREATE TABLE IF NOT EXISTS `patientcontactlenstypes` (
  `patientContactLensTypeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`patientContactLensTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patientcontactlenstypes`
--

INSERT INTO `patientcontactlenstypes` (`patientContactLensTypeId`, `patientId`, `date`, `value`) VALUES
(1, 1, '2025-05-16 00:00:00', 'Conventional'),
(2, 1, '2025-05-19 00:00:00', 'Colored');

-- --------------------------------------------------------

--
-- Table structure for table `patientframetype`
--

DROP TABLE IF EXISTS `patientframetype`;
CREATE TABLE IF NOT EXISTS `patientframetype` (
  `patientFrameTypeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`patientFrameTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patientframetype`
--

INSERT INTO `patientframetype` (`patientFrameTypeId`, `patientId`, `date`, `value`) VALUES
(1, 1, '2025-05-16 00:00:00', 'Plastic'),
(2, 1, '2025-05-19 00:00:00', 'Rimless');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patientId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `age` int NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  PRIMARY KEY (`patientId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientId`, `name`, `address`, `age`, `gender`, `contactNo`, `dateOfBirth`) VALUES
(1, 'test', 'test', 21, 'Male', '123456787908', '2025-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `pupilsize`
--

DROP TABLE IF EXISTS `pupilsize`;
CREATE TABLE IF NOT EXISTS `pupilsize` (
  `pupilSizeId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `OD` decimal(5,2) DEFAULT NULL,
  `OS` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`pupilSizeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pupilsize`
--

INSERT INTO `pupilsize` (`pupilSizeId`, `patientId`, `date`, `OD`, `OS`) VALUES
(1, 1, '2025-05-16 00:00:00', 213.00, 999.99),
(2, 1, '2025-05-19 00:00:00', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `retinoscopy`
--

DROP TABLE IF EXISTS `retinoscopy`;
CREATE TABLE IF NOT EXISTS `retinoscopy` (
  `retinoscopyId` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `patientId` int NOT NULL,
  `retinoscopyOD` varchar(255) DEFAULT NULL,
  `retinoscopyOS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`retinoscopyId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `retinoscopy`
--

INSERT INTO `retinoscopy` (`retinoscopyId`, `date`, `patientId`, `retinoscopyOD`, `retinoscopyOS`) VALUES
(1, '2025-05-16 00:00:00', 1, '13', '21'),
(2, '2025-05-19 00:00:00', 1, 'OD', '5');

-- --------------------------------------------------------

--
-- Table structure for table `slitlampexamination`
--

DROP TABLE IF EXISTS `slitlampexamination`;
CREATE TABLE IF NOT EXISTS `slitlampexamination` (
  `slitLampExaminationId` int NOT NULL AUTO_INCREMENT,
  `patientId` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `LIDS_LEFT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `LIDS_RIGHT` text,
  `LASHES_LEFT` text,
  `LASHES_RIGHT` text,
  `CONJUNCTIVA_LEFT` text,
  `CONJUNCTIVA_RIGHT` text,
  `CORNEA_LEFT` text,
  `CORNEA_RIGHT` text,
  `IRIS_LEFT` text,
  `IRIS_RIGHT` text,
  `AC_LEFT` text,
  `AC_RIGHT` text,
  `LENS_LEFT` text,
  `LENS_RIGHT` text,
  `IOP_LEFT` text,
  `IOP_RIGHT` text,
  `CLINICAL_NOTES` text,
  PRIMARY KEY (`slitLampExaminationId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slitlampexamination`
--

INSERT INTO `slitlampexamination` (`slitLampExaminationId`, `patientId`, `date`, `LIDS_LEFT`, `LIDS_RIGHT`, `LASHES_LEFT`, `LASHES_RIGHT`, `CONJUNCTIVA_LEFT`, `CONJUNCTIVA_RIGHT`, `CORNEA_LEFT`, `CORNEA_RIGHT`, `IRIS_LEFT`, `IRIS_RIGHT`, `AC_LEFT`, `AC_RIGHT`, `LENS_LEFT`, `LENS_RIGHT`, `IOP_LEFT`, `IOP_RIGHT`, `CLINICAL_NOTES`) VALUES
(1, 1, '2025-05-16 00:00:00', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '111'),
(2, 1, '2025-05-19 00:00:00', 'Lids Left:', 'lids Right', 'Lashes Left', 'Lashes Right', 'Conjunctiva Left:', 'Conjunctiva Right:', 'c', '', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
