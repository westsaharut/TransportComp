-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 09:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TransportComp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Transports`
--

CREATE TABLE `Transports` (
  `TranID` int(11) NOT NULL,
  `AddressToSend` varchar(500) NOT NULL,
  `Weight` decimal(8,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ReceiveDate` datetime NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transports`
--

INSERT INTO `Transports` (`TranID`, `AddressToSend`, `Weight`, `Price`, `CreateDate`, `ReceiveDate`, `UserID`) VALUES
(7, '2\r\n', '300.00', '1500.00', '2017-04-20 13:32:33', '2017-04-20 13:50:53', 8),
(8, 'dfxfd', '1000.00', '5000.00', '2017-04-20 13:32:33', '2017-04-20 13:50:53', 8),
(9, '12sad', '900.00', '4500.00', '2017-04-20 14:04:22', '0000-00-00 00:00:00', 8),
(10, 'kf df', '100.00', '500.00', '2017-04-20 14:04:47', '0000-00-00 00:00:00', 8),
(11, 'dsmf\r\n\r\n', '100.00', '500.00', '2017-04-20 14:06:11', '0000-00-00 00:00:00', 12),
(12, 'kflsd\r\n', '213.00', '1065.00', '2017-04-20 14:06:18', '0000-00-00 00:00:00', 12),
(13, '129098', '500.00', '2500.00', '2017-04-20 14:27:33', '0000-00-00 00:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `Password`, `FirstName`, `LastName`, `Address`, `Type`) VALUES
(2, 'admin', '12', 'Admin', 'Naja', '888', 'Admin'),
(7, 'ent', '12', 'Ent', 'EntSur', '21ij3', 'Entrepreneur'),
(8, 'user', '12', 'User', 'UserSur', '9098', 'User'),
(10, 'clerk', '12', 'Clerk', 'ClerkSu', '8sf', 'Clerk'),
(11, 'cha', '12', 'Chauffeur', 'ChauffeurSur', 'dslf21', 'Chauffeur'),
(12, 'u2', '12', 'User2', 'Udk', 'isfn', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Transports`
--
ALTER TABLE `Transports`
  ADD PRIMARY KEY (`TranID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Transports`
--
ALTER TABLE `Transports`
  MODIFY `TranID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Transports`
--
ALTER TABLE `Transports`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
