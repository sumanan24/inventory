-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2023 at 04:29 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Admin_ID` varchar(10) DEFAULT NULL,
  `Full_Name` varchar(50) DEFAULT NULL,
  `profile` varchar(200) NOT NULL,
  `E_mail` varchar(50) DEFAULT NULL,
  `Department_Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Ph_No` varchar(10) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Admin_ID` (`Admin_ID`),
  UNIQUE KEY `E_mail` (`E_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Admin_ID`, `Full_Name`, `profile`, `E_mail`, `Department_Name`, `Gender`, `Ph_No`, `Username`, `Password`) VALUES
(1, 'A001', 'Sumanan', '', 'sumanan22@slgti.com', 'ict', 'Male', '0770487696', 'sumanan', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Department_Code` varchar(30) DEFAULT NULL,
  `Image` blob,
  `Department_Name` varchar(100) DEFAULT NULL,
  `Head_Of_Department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Department_Code` (`Department_Code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Department_Code`, `Image`, `Department_Name`, `Head_Of_Department`) VALUES
(2, 'ICT', NULL, 'Information Communication Technolog', NULL),
(3, 'CON', NULL, 'Construction Technology', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dispose`
--

DROP TABLE IF EXISTS `dispose`;
CREATE TABLE IF NOT EXISTS `dispose` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Inventory_ID` varchar(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Quantity` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Inventory_ID` (`Inventory_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Image` varchar(200) DEFAULT NULL,
  `Inventory_ID` varchar(30) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Dcode` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Inventory_ID` (`Inventory_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `Image`, `Inventory_ID`, `Name`, `Description`, `Quantity`, `Date`, `Dcode`) VALUES
(1, 'a2.jpg', '101', 'sdfsdf', 'ffdfsdf', 2, '2023-08-17', 'ICT'),
(2, 'jquest - Copy.jpg', '222', 'fsdfsdf', 'fsdfsdgf', 7, '2023-08-18', 'CON'),
(3, 'jquest.jpg', 'gretert', 'fdfsdfsd', 'rerw', 24, '2023-08-25', 'CON');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Staff_ID` varchar(10) DEFAULT NULL,
  `Full_Name` varchar(50) DEFAULT NULL,
  `profile` varchar(200) NOT NULL,
  `E_mail` varchar(50) DEFAULT NULL,
  `Department_Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Ph_No` varchar(10) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Staff_ID` (`Staff_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `Staff_ID`, `Full_Name`, `profile`, `E_mail`, `Department_Name`, `Gender`, `Ph_No`, `Username`, `Password`) VALUES
(1, '01', 'kumarar', 'a2.jpg', 'kumar@gmail.com', 'CON', 'Male', '212261034', 'kumar', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE IF NOT EXISTS `transfer` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Transfer_ID` varchar(10) DEFAULT NULL,
  `Staff_Name` varchar(50) DEFAULT NULL,
  `Inventory_Name` varchar(50) DEFAULT NULL,
  `Sender_D_Code` varchar(10) DEFAULT NULL,
  `Receiver_D_Code` varchar(10) DEFAULT NULL,
  `Quantity` int NOT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Transfer_ID` (`Transfer_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`ID`, `Transfer_ID`, `Staff_Name`, `Inventory_Name`, `Sender_D_Code`, `Receiver_D_Code`, `Quantity`, `Date`) VALUES
(1, '3434', 'kumar', '222', 'CON', 'ICT', 7, '2023-08-25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
