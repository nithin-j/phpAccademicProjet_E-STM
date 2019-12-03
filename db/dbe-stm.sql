-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 08:58 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbe-stm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `CardNumber` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TripTypeID` int(11) NOT NULL,
  `StatusCode` int(11) NOT NULL,
  `IsValid` int(11) NOT NULL,
  `ExpiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`CardNumber`, `UserID`, `TripTypeID`, `StatusCode`, `IsValid`, `ExpiryDate`) VALUES
(8700025, 1033, 2, 1, 1, '2020-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `cardstatus`
--

CREATE TABLE `cardstatus` (
  `StatusCode` int(11) NOT NULL,
  `StatusType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardstatus`
--

INSERT INTO `cardstatus` (`StatusCode`, `StatusType`) VALUES
(0, 'Inactive'),
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `deactivatecards`
--

CREATE TABLE `deactivatecards` (
  `CardNumber` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `Remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `CardNumber` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`CardNumber`, `ValidFrom`, `ValidTo`) VALUES
(8700025, '2019-12-03', '2020-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `triptypes`
--

CREATE TABLE `triptypes` (
  `TripTypeID` int(11) NOT NULL,
  `TripType` varchar(25) NOT NULL,
  `Fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triptypes`
--

INSERT INTO `triptypes` (`TripTypeID`, `TripType`, `Fare`) VALUES
(1, 'Monthly', 105),
(2, 'Monthly - Student', 52),
(3, 'Monthly - Seniour Citizen', 50),
(4, '4 Months', 410),
(5, '4 Months - Student', 200),
(6, '4 Month - Seniour Citizen', 200),
(7, 'Yearly', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `StreetAddress` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `ZipCode` varchar(6) NOT NULL,
  `UserTypeID` int(11) DEFAULT NULL,
  `profilepic` varchar(85) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Password`, `Name`, `PhoneNumber`, `StreetAddress`, `City`, `ZipCode`, `UserTypeID`, `profilepic`) VALUES
(1000, '1234', 'ADMINISTRATOR', '4382269336', '3261 Avenue Barclay', 'Montreal', 'h3s1k2', 1, 'default.jpg'),
(1033, '1234', 'Nithin', '4382269338', '3265 Avenue Barclay', 'Montreal', 'h3s1k2', 3, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `UserTypeID` int(11) NOT NULL,
  `UserTypeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`UserTypeID`, `UserTypeName`) VALUES
(1, 'Admin'),
(2, 'Default'),
(3, 'Student'),
(4, 'Senior Citizen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`CardNumber`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `FK_Cards_CardStatus` (`StatusCode`),
  ADD KEY `FK_Cards_TripType` (`TripTypeID`);

--
-- Indexes for table `cardstatus`
--
ALTER TABLE `cardstatus`
  ADD PRIMARY KEY (`StatusCode`);

--
-- Indexes for table `deactivatecards`
--
ALTER TABLE `deactivatecards`
  ADD PRIMARY KEY (`CardNumber`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`CardNumber`);

--
-- Indexes for table `triptypes`
--
ALTER TABLE `triptypes`
  ADD PRIMARY KEY (`TripTypeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD KEY `FK_Users_UserTypes` (`UserTypeID`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CardNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8700026;

--
-- AUTO_INCREMENT for table `cardstatus`
--
ALTER TABLE `cardstatus`
  MODIFY `StatusCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `triptypes`
--
ALTER TABLE `triptypes`
  MODIFY `TripTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `FK_Cards_CardStatus` FOREIGN KEY (`StatusCode`) REFERENCES `cardstatus` (`StatusCode`),
  ADD CONSTRAINT `FK_Cards_TripType` FOREIGN KEY (`TripTypeID`) REFERENCES `triptypes` (`TripTypeID`),
  ADD CONSTRAINT `FK_Cards_Users` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `deactivatecards`
--
ALTER TABLE `deactivatecards`
  ADD CONSTRAINT `FK_DeactivateCards_Cards` FOREIGN KEY (`CardNumber`) REFERENCES `cards` (`CardNumber`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Users_UserTypes` FOREIGN KEY (`UserTypeID`) REFERENCES `usertypes` (`UserTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
