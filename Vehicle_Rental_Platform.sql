-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2019 at 02:59 পূর্বাহ্ণ
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Vehicle_Rental_Platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `ADMIN_ID` int(11) NOT NULL,
  `EMAIL_ADDRESS` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`ADMIN_ID`, `EMAIL_ADDRESS`, `PASSWORD`) VALUES
(1, 'utshaw105@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMERS`
--

CREATE TABLE `CUSTOMERS` (
  `CUSTOMER_ID` bigint(20) NOT NULL,
  `CONTACT_NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(250) NOT NULL,
  `EMAIL_ADDRESS` varchar(255) NOT NULL,
  `CONTACT_NUMBER` varchar(20) NOT NULL,
  `PASSWORD` varchar(1000) DEFAULT NULL,
  `VERIFICATION_CODE` varchar(50) DEFAULT NULL,
  `BLOCKED` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMERS`
--

INSERT INTO `CUSTOMERS` (`CUSTOMER_ID`, `CONTACT_NAME`, `ADDRESS`, `EMAIL_ADDRESS`, `CONTACT_NUMBER`, `PASSWORD`, `VERIFICATION_CODE`, `BLOCKED`) VALUES
(1123001, 'SAMPLE', 'sAMPLE', 'sample', '01', '123456', NULL, 0),
(1123031, 'SAM MANYARD', 'HARROW ROAD', 'sam@hotmail.co.uk', '07724526856', '123456', NULL, 0),
(1123032, 'PARAMJEET SINGH', 'MELBORNE ROAD', 'prabs@outlook.co.uk', '07724526858', '123456', NULL, 0),
(1123033, 'ASWAD KHAN', 'DARLSTON ROAD', 'aswad@yahoo.co.uk', '07744526858', '123456', NULL, 0),
(1123034, 'GEORGE BAILEY', 'WALTON AVENUE', 'gb@yahoo.com', '07744566858', '123456', NULL, 0),
(1123035, 'GREGG PLAMERS', 'TRINITY AVENUE', 'gp1980@live.com', '07744566858', '123456', NULL, 0),
(1123036, 'MATTHEW GONSALVES', 'RIDLEY ROAD', 'mt97@gmail.com', '07744567858', '123456', NULL, 0),
(1123037, 'ANDREW PETERS', 'UXBRIDGE ROAD', 'apt@gmail.com', '07794567858', '123456', NULL, 0),
(1123038, 'TOM PETRAN', 'DARTFORD ROAD', 'tpt@outlook.co.uk', '07794587858', '123456', NULL, 0),
(1123039, 'RORRY SHAUN WILLIAMS', 'SOTHEY ROAD', 'rorrysw@outlook.co.uk', '07794587958', '123456', NULL, 0),
(1123040, 'PAUL STERON', 'GRIFFITS ROAD', 'steron@outlook.co.uk', '07494587958', '123456', NULL, 0),
(1123043, 'Jawad Siddiqui', 'London', 'example@example.com', '01800000000', '123456', NULL, 0),
(1123044, 'mush', 'mush', 'foo@gmail.com', '01800000000', '123456', NULL, 0),
(1123045, 'Test', 'Test', 'test@hotmail.co.uk', '01800000000', '123456', NULL, 0),
(1123068, 'Farhan Utshaw', 'Dhaka', 'farhan.tanvir.utshaw@gmail.com', '01811563457', '123456', NULL, 0),
(1123071, 'Masfiq', 'Dhaka', 'masfiq15@gmail.com', '01521332156', '123456', '927d4639c336dbc36c49ab9f10658c1d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `PROMOTION`
--

CREATE TABLE `PROMOTION` (
  `PROMOTION_ID` int(11) NOT NULL,
  `DISCOUNT_AMOUNT` double NOT NULL,
  `EXPIRY_DATE` date NOT NULL,
  `MODEL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PROMOTION`
--

INSERT INTO `PROMOTION` (`PROMOTION_ID`, `DISCOUNT_AMOUNT`, `EXPIRY_DATE`, `MODEL_ID`) VALUES
(4, 26, '2019-02-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE`
--

CREATE TABLE `VEHICLE` (
  `VEHICLE_ID` int(11) NOT NULL,
  `MAKE_ID` int(11) DEFAULT NULL,
  `MODEL_ID` int(11) DEFAULT NULL,
  `DAILY_RATE` double(10,2) NOT NULL,
  `IMAGE` varchar(255) DEFAULT NULL,
  `MAX_CAPACITY` int(11) DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE`
--

INSERT INTO `VEHICLE` (`VEHICLE_ID`, `MAKE_ID`, `MODEL_ID`, `DAILY_RATE`, `IMAGE`, `MAX_CAPACITY`, `COMPANY_ID`) VALUES
(98718, 2, 4, 2845.00, '98718.jpg', 24, 1),
(98720, 2, 1, 2050.00, '98720.jpg', 49, 1),
(98721, 2, 1, 2901.00, '98721.jpg', 73, 1),
(98749, 1, 1, 3000.00, '98749.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_COMPANY`
--

CREATE TABLE `VEHICLE_COMPANY` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(255) NOT NULL,
  `EMAIL_ADDRESS` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CONTACT_NUMBER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE_COMPANY`
--

INSERT INTO `VEHICLE_COMPANY` (`COMPANY_ID`, `COMPANY_NAME`, `EMAIL_ADDRESS`, `PASSWORD`, `ADDRESS`, `CONTACT_NUMBER`) VALUES
(1, 'AZ Autos', 'utshaw105@gmail.com', '123456', 'dhaka', '1521332156'),
(2, 'NR Corporation', '0', '0', '0', '0'),
(3, 'Shuvo Enterprise', '0', '0', '0', '0'),
(4, 'Shakil Enterprise', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_MAKE`
--

CREATE TABLE `VEHICLE_MAKE` (
  `MAKE_ID` int(11) NOT NULL,
  `MAKE_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE_MAKE`
--

INSERT INTO `VEHICLE_MAKE` (`MAKE_ID`, `MAKE_NAME`) VALUES
(1, 'VOLVO'),
(2, 'MERCEDES BENZ'),
(3, 'SCANIA'),
(5, 'TOYOTA'),
(6, 'BMW'),
(7, 'Rolls Royce'),
(8, 'Wayne corporation'),
(9, 'Wayne2'),
(10, 'Wayne3'),
(11, 'Wayn4'),
(12, 'Wayn4'),
(13, 'Wayne5 '),
(14, 'Audi'),
(15, 'AUdi2'),
(16, 'Audi3'),
(17, 'Audi4'),
(18, 'AUDI5'),
(19, 'TATA');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_MODEL`
--

CREATE TABLE `VEHICLE_MODEL` (
  `MODEL_ID` int(11) NOT NULL,
  `MODEL_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE_MODEL`
--

INSERT INTO `VEHICLE_MODEL` (`MODEL_ID`, `MODEL_NAME`) VALUES
(1, 'Sedan'),
(2, 'Hatchback'),
(3, 'Minivan'),
(4, 'SUV'),
(5, 'Pickup'),
(6, 'Convertible'),
(7, 'Micro Bus'),
(14, 'Coupe');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_ORDER`
--

CREATE TABLE `VEHICLE_ORDER` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` bigint(20) DEFAULT NULL,
  `VEHICLE_ID` int(11) NOT NULL,
  `BOOKING_DATE` date NOT NULL,
  `RENT_FROM` date NOT NULL,
  `RENT_TO` date NOT NULL,
  `RATING` double DEFAULT NULL,
  `REVIEW` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE_ORDER`
--

INSERT INTO `VEHICLE_ORDER` (`ORDER_ID`, `CUSTOMER_ID`, `VEHICLE_ID`, `BOOKING_DATE`, `RENT_FROM`, `RENT_TO`, `RATING`, `REVIEW`) VALUES
(1, 1123031, 98721, '2019-02-28', '0000-00-00', '0000-00-00', 3, ''),
(4, 1123031, 98721, '2019-02-28', '0000-00-00', '0000-00-00', 5, 'nice'),
(7, 1123031, 98720, '2019-07-01', '2019-07-09', '2019-07-11', NULL, NULL),
(11, 1123031, 98720, '2019-07-01', '2019-07-09', '2019-07-11', NULL, NULL),
(15, 1123068, 98718, '2019-07-15', '2019-07-14', '2019-07-15', 5, 'good.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `CUSTOMERS`
--
ALTER TABLE `CUSTOMERS`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD PRIMARY KEY (`PROMOTION_ID`),
  ADD KEY `promotionModel` (`MODEL_ID`);

--
-- Indexes for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD PRIMARY KEY (`VEHICLE_ID`),
  ADD KEY `COMPANY_ID` (`COMPANY_ID`),
  ADD KEY `FK_MODEL` (`MODEL_ID`);

--
-- Indexes for table `VEHICLE_COMPANY`
--
ALTER TABLE `VEHICLE_COMPANY`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indexes for table `VEHICLE_MAKE`
--
ALTER TABLE `VEHICLE_MAKE`
  ADD PRIMARY KEY (`MAKE_ID`);

--
-- Indexes for table `VEHICLE_MODEL`
--
ALTER TABLE `VEHICLE_MODEL`
  ADD PRIMARY KEY (`MODEL_ID`);

--
-- Indexes for table `VEHICLE_ORDER`
--
ALTER TABLE `VEHICLE_ORDER`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `ORDER_VEHICLE_FK` (`VEHICLE_ID`),
  ADD KEY `ORDER_CUSTOMER_FK` (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `CUSTOMERS`
--
ALTER TABLE `CUSTOMERS`
  MODIFY `CUSTOMER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123072;
--
-- AUTO_INCREMENT for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  MODIFY `PROMOTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  MODIFY `VEHICLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98750;
--
-- AUTO_INCREMENT for table `VEHICLE_COMPANY`
--
ALTER TABLE `VEHICLE_COMPANY`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `VEHICLE_MAKE`
--
ALTER TABLE `VEHICLE_MAKE`
  MODIFY `MAKE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `VEHICLE_MODEL`
--
ALTER TABLE `VEHICLE_MODEL`
  MODIFY `MODEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `VEHICLE_ORDER`
--
ALTER TABLE `VEHICLE_ORDER`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD CONSTRAINT `promotionModel` FOREIGN KEY (`MODEL_ID`) REFERENCES `VEHICLE_MODEL` (`MODEL_ID`);

--
-- Constraints for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD CONSTRAINT `FK_COMPANY` FOREIGN KEY (`COMPANY_ID`) REFERENCES `VEHICLE_COMPANY` (`COMPANY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODEL` FOREIGN KEY (`MODEL_ID`) REFERENCES `VEHICLE_MODEL` (`MODEL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `VEHICLE_ORDER`
--
ALTER TABLE `VEHICLE_ORDER`
  ADD CONSTRAINT `ORDER_CUSTOMER_FK` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `CUSTOMERS` (`CUSTOMER_ID`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `ORDER_VEHICLE_FK` FOREIGN KEY (`VEHICLE_ID`) REFERENCES `VEHICLE` (`VEHICLE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
