-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Client_ID` int(11) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Phone_Number` varchar(25) NOT NULL,
  `Email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Contract_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Client_ID`, `FirstName`, `LastName`, `Phone_Number`, `Email`, `Contract_Number`) VALUES
(1, 'Mohamed', 'Ismail', '01010891305', 'mohamed@gmail.com', NULL),
(2, 'Ahmed', 'Nader', '0101023456', 'ahmed@gamil.com', NULL),
(3, 'Youssef', 'Emad', '0101', 'Hi@hi.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `Contract_Number` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Client_ID` int(11) NOT NULL,
  `Deposit` int(11) NOT NULL,
  `Payment_Method` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Vehicle_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`Contract_Number`, `Date`, `Client_ID`, `Deposit`, `Payment_Method`, `Vehicle_ID`) VALUES
(1, '2024-04-16', 1, 12, 'cash', 1),
(2, '2024-04-10', 2, 13, 'installments', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerservicerepresentative`
--

CREATE TABLE `customerservicerepresentative` (
  `Rating` int(2) NOT NULL,
  `Emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerservicerepresentative`
--

INSERT INTO `customerservicerepresentative` (`Rating`, `Emp_ID`) VALUES
(3, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(11) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Street` varchar(15) NOT NULL,
  `Building` varchar(15) NOT NULL,
  `Apartment` int(3) NOT NULL,
  `Working_Hours` varchar(15) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Supervises_Emp_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `FirstName`, `LastName`, `Sex`, `Phone_Number`, `Email`, `City`, `Street`, `Building`, `Apartment`, `Working_Hours`, `Salary`, `Supervises_Emp_ID`) VALUES
(0, 'Nada', 'Mohamed', 'Female', '01234567', 'nadamohamed@gmail.com', 'Cairo', 'Salah Salem', '34', 12, 'Full Time', 20000, 1),
(1, 'Youssef', 'Emad', 'Male', '01010891304', 'yousefemad@icloud.com', 'Cairo', 'Ahmed', '15', 5, 'Full Time', 3000, NULL),
(2, 'Youssef', 'Nader', 'Male', '010101010', 'yousefemad@', 'cairo', 'Ahmed', '5', 2, '13', 2000, NULL),
(10, 'Salah', 'Ahmed', 'Male', '010101034', 'salah@gmail.com', 'Cairo', 'Ahmed', '12', 12, 'Full Time', 12000, 0),
(12, 'salah', 'Mohamed', 'Male', '010101010', 'salah@gamail.com', 'caio', 'ahmed', '12', 12, 'Full Time', 12, 1),
(100, 'Salah', 'Ahmed', 'Male', '010101034', 'salah@gmail.com', 'Cairo', 'Ahmed', '12', 12, 'Full Time', 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE `new` (
  `Quantity` int(11) NOT NULL,
  `Vehicle_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new`
--

INSERT INTO `new` (`Quantity`, `Vehicle_ID`) VALUES
(12344, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `Week_Number` int(2) NOT NULL,
  `SalesPerWeek` int(11) DEFAULT NULL,
  `CommissionsPerWeek` int(11) DEFAULT NULL,
  `Emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`Week_Number`, `SalesPerWeek`, `CommissionsPerWeek`, `Emp_ID`) VALUES
(2, 20000, 1200, 0),
(2, 12, 20, 1),
(4, 20000, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Service_Number` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Service_Number`, `Type`, `Price`) VALUES
(0, 'Repair The Motor', 1000),
(1, 'Change Motor Oil', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `Specialization` varchar(15) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `Service_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`Specialization`, `Emp_ID`, `Service_Number`) VALUES
('Motor', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `used`
--

CREATE TABLE `used` (
  `License_Plate` varchar(11) NOT NULL,
  `Odometer` int(11) NOT NULL,
  `Vehicle_ID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `used`
--

INSERT INTO `used` (`License_Plate`, `Odometer`, `Vehicle_ID`) VALUES
('XYZ123', 12000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_ID` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Model` varchar(15) NOT NULL,
  `Manufacturer` varchar(15) NOT NULL,
  `Year` int(4) NOT NULL,
  `InteriorColor` varchar(15) NOT NULL,
  `ExteriorColor` varchar(15) NOT NULL,
  `Price` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_ID`, `Type`, `Model`, `Manufacturer`, `Year`, `InteriorColor`, `ExteriorColor`, `Price`, `Emp_ID`) VALUES
(1, 'Car', 'Sportage', 'KIA', 2016, 'Black', 'Silver', 150, 1),
(2, 'Car', 'XYZ', 'Merceds', 2023, 'Black', 'Silver', 230000, 2),
(3, 'Motorcycle', 'XYZ', 'Merceds', 2023, 'Black', 'Silver', 230000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Client_ID`),
  ADD KEY `Contract_Number` (`Contract_Number`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`Contract_Number`),
  ADD KEY `Vehicle_ID` (`Vehicle_ID`);

--
-- Indexes for table `customerservicerepresentative`
--
ALTER TABLE `customerservicerepresentative`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `Supervises_Emp_ID` (`Supervises_Emp_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`Vehicle_ID`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Service_Number`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `Service_Number` (`Service_Number`);

--
-- Indexes for table `used`
--
ALTER TABLE `used`
  ADD PRIMARY KEY (`Vehicle_ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`Contract_Number`) REFERENCES `contract` (`Contract_Number`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`);

--
-- Constraints for table `customerservicerepresentative`
--
ALTER TABLE `customerservicerepresentative`
  ADD CONSTRAINT `customerservicerepresentative_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Supervises_Emp_ID`) REFERENCES `employee` (`Emp_ID`);

--
-- Constraints for table `new`
--
ALTER TABLE `new`
  ADD CONSTRAINT `new_ibfk_1` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`);

--
-- Constraints for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD CONSTRAINT `salesperson_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`);

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`),
  ADD CONSTRAINT `technician_ibfk_2` FOREIGN KEY (`Service_Number`) REFERENCES `service` (`Service_Number`);

--
-- Constraints for table `used`
--
ALTER TABLE `used`
  ADD CONSTRAINT `used_ibfk_1` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `salesperson` (`Emp_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
