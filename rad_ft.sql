-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 01:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rad_ft`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `brandName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contactNo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CusAccID` int(11) DEFAULT NULL,
  `RentingID` int(11) DEFAULT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `SupportID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `DOB`, `address`, `fullName`, `contactNo`, `CusAccID`, `RentingID`, `PaymentID`, `SupportID`) VALUES
(1, '2003-10-01', 'adadadada', 'Nguyen Van B', '0888888888', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customeraccount`
--

CREATE TABLE `customeraccount` (
  `CusAccID` int(11) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `regDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updationDate` datetime DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customeraccount`
--

INSERT INTO `customeraccount` (`CusAccID`, `password`, `regDate`, `updationDate`, `ManagerID`) VALUES
(1, '123456', '2024-06-08 17:54:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customersupport`
--

CREATE TABLE `customersupport` (
  `SupportID` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `startTime` datetime DEFAULT curdate(),
  `endTime` datetime DEFAULT NULL,
  `SupportType` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ManagerID` int(11) NOT NULL,
  `fullName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contactNo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ManagerID`, `fullName`, `password`, `contactNo`) VALUES
(1, 'Nguyen Van A', '123456', '0999999999');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `method` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `RentingID` int(11) DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `ProviderID` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contactNo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`ProviderID`, `email`, `address`, `fullName`, `contactNo`) VALUES
(1, 'ProviderA@gmail.com', 'adadafsgdbdv', 'Nguyen Van C', '0777777777');

-- --------------------------------------------------------

--
-- Table structure for table `renting`
--

CREATE TABLE `renting` (
  `RentingID` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `toDate` datetime DEFAULT NULL,
  `userEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rentingNumber` int(11) DEFAULT NULL,
  `fromDate` datetime DEFAULT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportdamage`
--

CREATE TABLE `reportdamage` (
  `ReportID` int(11) NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` datetime DEFAULT curdate(),
  `reportName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `fullName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `StaffAccID` int(11) DEFAULT NULL,
  `ReportID` int(11) DEFAULT NULL,
  `RentingID` int(11) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `fullName`, `StaffAccID`, `ReportID`, `RentingID`, `VehicleID`) VALUES
(1, 'Nguyen Van A', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffaccount`
--

CREATE TABLE `staffaccount` (
  `StaffAccID` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffaccount`
--

INSERT INTO `staffaccount` (`StaffAccID`, `email`, `password`, `ManagerID`) VALUES
(1, 'staffA@gmail.com', '098765', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `pricePerDay` int(11) DEFAULT NULL,
  `vehiclesTitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `vehiclesOverview` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `features` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `photoURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `availability` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `modelYear` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `kn_Customer_CustomerAccount` (`CusAccID`);

--
-- Indexes for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD PRIMARY KEY (`CusAccID`),
  ADD KEY `kn_CustomerAccount_Manager` (`ManagerID`);

--
-- Indexes for table `customersupport`
--
ALTER TABLE `customersupport`
  ADD PRIMARY KEY (`SupportID`),
  ADD KEY `kn_CustomerSupport_Customer` (`CustomerID`),
  ADD KEY `kn_CustomerSupport_Manager` (`ManagerID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `kn_Payment_Renting` (`RentingID`),
  ADD KEY `kn_Payment_Manager` (`ManagerID`),
  ADD KEY `kn_Payment_Customer` (`CustomerID`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`ProviderID`);

--
-- Indexes for table `renting`
--
ALTER TABLE `renting`
  ADD PRIMARY KEY (`RentingID`),
  ADD KEY `kn_Renting_Vehicle` (`VehicleID`),
  ADD KEY `kn_Renting_Customer` (`CustomerID`);

--
-- Indexes for table `reportdamage`
--
ALTER TABLE `reportdamage`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `kn_ReportDamage_Staff` (`StaffID`),
  ADD KEY `kn_ReportDamage_Provider` (`ProviderID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `kn_Staff_StaffAccount` (`StaffAccID`),
  ADD KEY `kn_Staff_Vehicle` (`VehicleID`),
  ADD KEY `kn_Staff_Renting` (`RentingID`);

--
-- Indexes for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD PRIMARY KEY (`StaffAccID`),
  ADD KEY `kn_staffAccount_Manager` (`ManagerID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `kn_Vehicle_Brand` (`BrandID`),
  ADD KEY `kn_Vehicle_Provider` (`ProviderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customeraccount`
--
ALTER TABLE `customeraccount`
  MODIFY `CusAccID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customersupport`
--
ALTER TABLE `customersupport`
  MODIFY `SupportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `ProviderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `renting`
--
ALTER TABLE `renting`
  MODIFY `RentingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportdamage`
--
ALTER TABLE `reportdamage`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffaccount`
--
ALTER TABLE `staffaccount`
  MODIFY `StaffAccID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `kn_Customer_CustomerAccount` FOREIGN KEY (`CusAccID`) REFERENCES `customeraccount` (`CusAccID`);

--
-- Constraints for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD CONSTRAINT `kn_CustomerAccount_Manager` FOREIGN KEY (`ManagerID`) REFERENCES `manager` (`ManagerID`);

--
-- Constraints for table `customersupport`
--
ALTER TABLE `customersupport`
  ADD CONSTRAINT `kn_CustomerSupport_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `kn_CustomerSupport_Manager` FOREIGN KEY (`ManagerID`) REFERENCES `manager` (`ManagerID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `kn_Payment_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `kn_Payment_Manager` FOREIGN KEY (`ManagerID`) REFERENCES `manager` (`ManagerID`),
  ADD CONSTRAINT `kn_Payment_Renting` FOREIGN KEY (`RentingID`) REFERENCES `renting` (`RentingID`);

--
-- Constraints for table `renting`
--
ALTER TABLE `renting`
  ADD CONSTRAINT `kn_Renting_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `kn_Renting_Vehicle` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`);

--
-- Constraints for table `reportdamage`
--
ALTER TABLE `reportdamage`
  ADD CONSTRAINT `kn_ReportDamage_Provider` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`ProviderID`),
  ADD CONSTRAINT `kn_ReportDamage_Staff` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `kn_Staff_Renting` FOREIGN KEY (`RentingID`) REFERENCES `renting` (`RentingID`),
  ADD CONSTRAINT `kn_Staff_StaffAccount` FOREIGN KEY (`StaffAccID`) REFERENCES `staffaccount` (`StaffAccID`),
  ADD CONSTRAINT `kn_Staff_Vehicle` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`);

--
-- Constraints for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD CONSTRAINT `kn_staffAccount_Manager` FOREIGN KEY (`ManagerID`) REFERENCES `manager` (`ManagerID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `kn_Vehicle_Brand` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`),
  ADD CONSTRAINT `kn_Vehicle_Provider` FOREIGN KEY (`ProviderID`) REFERENCES `provider` (`ProviderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
