-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2019 at 10:14 পূর্বাহ্ণ
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
  `PASSWORD` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMERS`
--

INSERT INTO `CUSTOMERS` (`CUSTOMER_ID`, `CONTACT_NAME`, `ADDRESS`, `EMAIL_ADDRESS`, `CONTACT_NUMBER`, `PASSWORD`) VALUES
(1123001, 'SAMPLE', 'sAMPLE', 'sample', '01', '123456'),
(1123031, 'SAM MANYARD', 'HARROW ROAD', 'sam@hotmail.co.uk', '07724526856', '123456'),
(1123032, 'PARAMJEET SINGH', 'MELBORNE ROAD', 'prabs@outlook.co.uk', '07724526858', '123456'),
(1123033, 'ASWAD KHAN', 'DARLSTON ROAD', 'aswad@yahoo.co.uk', '07744526858', '123456'),
(1123034, 'GEORGE BAILEY', 'WALTON AVENUE', 'gb@yahoo.com', '07744566858', '123456'),
(1123035, 'GREGG PLAMERS', 'TRINITY AVENUE', 'gp1980@live.com', '07744566858', '123456'),
(1123036, 'MATTHEW GONSALVES', 'RIDLEY ROAD', 'mt97@gmail.com', '07744567858', '123456'),
(1123037, 'ANDREW PETERS', 'UXBRIDGE ROAD', 'apt@gmail.com', '07794567858', '123456'),
(1123038, 'TOM PETRAN', 'DARTFORD ROAD', 'tpt@outlook.co.uk', '07794587858', '123456'),
(1123039, 'RORRY SHAUN WILLIAMS', 'SOTHEY ROAD', 'rorrysw@outlook.co.uk', '07794587958', '123456'),
(1123040, 'PAUL STERON', 'GRIFFITS ROAD', 'steron@outlook.co.uk', '07494587958', '123456'),
(1123043, 'Jawad Siddiqui', 'London', 'example@example.com', '01800000000', '123456'),
(1123044, 'mush', 'mush', 'foo@gmail.com', '01800000000', '123456');

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
(98716, 1, 2, 85.23, 'VOLVO_Hatchback.jpg', 22, 1),
(98717, 2, 1, 70.00, 'MERCEDES BENZ_Sedan1.jpg', 16, 1),
(98718, 2, 4, 80.00, 'suv merc black.jpeg', 24, 1),
(98719, 2, 1, 120.00, 'suv merc red.jpeg', 33, 1),
(98720, 2, 1, 130.00, 'suv merc white.jpeg', 49, 1),
(98721, 2, 1, 150.00, 'merceds_benz_sedan2.jpg', 73, 1),
(98722, 3, 7, 140.00, 'SCANIA_Micro Bus.jpg', 72, 1),
(98723, 3, 7, 90.00, 'mini scania black double.jpeg', 16, 1),
(98724, 3, 7, 100.00, 'mini scania green .jpg', 24, 1),
(98725, 3, 7, 140.00, 'mini scania white .jpeg', 49, 1),
(98730, 1, 1, 12.00, 'VOLVO_Sedan.jpg', 12, 1),
(98731, 1, 1, 123.00, 'sedan volvo ash.jpeg', 123, 1),
(98732, 1, 1, 111.00, 'sedan volvo black.jpeg', 111, 1),
(98733, 1, 1, 123.00, 'sedan volvo blue.jpeg', 223, 1),
(98734, 1, 1, 145.00, 'sedan volvo red.jpeg', 155, 1),
(98735, 1, 1, 145.00, 'volvo_sedan1.jpeg', 200, 1),
(98736, 1, 1, 145.00, 'volvo_sedan2.jpeg', 220, 1),
(98737, 1, 1, 149.00, 'volvo_sedan3.jpeg', 10, 1),
(98738, 1, 1, 145.00, 'volvo_sedan4.jpeg', 20, 1),
(98739, 1, 1, 145.00, 'volvo_sedan5.jpeg', 220, 1),
(98740, 1, 1, 145.00, 'volvo_sedan6.jpg', 222, 1);

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
(4, 'Shakil Enterprise', '0', '0', '0', '0'),
(5, 'masfiq', 'masfiq15@gmail.com', '123456', 'dhaka', '2147483647'),
(6, 'sakib', 'sakib@gmail.com', '123456', 'Dhaka', '1521332155');

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
  `RENT_TO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `VEHICLE_ORDER`
--

INSERT INTO `VEHICLE_ORDER` (`ORDER_ID`, `CUSTOMER_ID`, `VEHICLE_ID`, `BOOKING_DATE`, `RENT_FROM`, `RENT_TO`) VALUES
(1, 1123031, 98721, '2019-02-28', '0000-00-00', '0000-00-00'),
(2, 1123031, 98736, '2019-02-28', '0000-00-00', '0000-00-00'),
(3, 1123031, 98737, '2019-02-28', '0000-00-00', '0000-00-00'),
(4, 1123031, 98721, '2019-02-28', '0000-00-00', '0000-00-00'),
(5, 1123031, 98722, '2019-02-28', '0000-00-00', '0000-00-00');

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
  MODIFY `CUSTOMER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123045;
--
-- AUTO_INCREMENT for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  MODIFY `PROMOTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  MODIFY `VEHICLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98741;
--
-- AUTO_INCREMENT for table `VEHICLE_COMPANY`
--
ALTER TABLE `VEHICLE_COMPANY`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
