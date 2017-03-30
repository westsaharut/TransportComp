-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2017 at 09:22 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `AccoutTypes`
--

CREATE TABLE `AccoutTypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Interest` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `AccoutTypes`
--

INSERT INTO `AccoutTypes` (`ID`, `Name`, `Interest`) VALUES
(1, 'บัญชีสะสมทรัพย์', 2),
(2, 'บัญชีฝากประจำ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Actions`
--

CREATE TABLE `Actions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Actions`
--

INSERT INTO `Actions` (`ID`, `Name`) VALUES
(1, 'ฝาก'),
(2, 'ถอน');

-- --------------------------------------------------------

--
-- Table structure for table `BorrowHistories`
--

CREATE TABLE `BorrowHistories` (
  `ID` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `MoneyRefund` decimal(10,2) NOT NULL,
  `Date` datetime NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BorrowHistories`
--

INSERT INTO `BorrowHistories` (`ID`, `Total`, `MoneyRefund`, `Date`, `UserID`) VALUES
(2, '500.00', '0.00', '2017-03-30 12:40:37', 6),
(5, '5000.00', '2000.00', '2017-03-30 13:14:52', 5),
(6, '5000.00', '5000.00', '2017-03-30 13:14:57', 5),
(7, '2300.00', '2300.00', '2017-03-30 13:45:58', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Histories`
--

CREATE TABLE `Histories` (
  `ID` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Date` datetime NOT NULL,
  `ActionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Histories`
--

INSERT INTO `Histories` (`ID`, `Amount`, `Date`, `ActionID`, `UserID`) VALUES
(7, '5000.00', '2017-03-23 14:24:22', 2, 2),
(8, '300.00', '2017-03-23 14:24:27', 1, 5),
(9, '200.00', '2017-03-23 14:26:13', 1, 5),
(10, '500.00', '2017-03-23 15:00:33', 1, 5),
(11, '300.00', '2017-03-23 15:00:47', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `RefundHistories`
--

CREATE TABLE `RefundHistories` (
  `ID` int(11) NOT NULL,
  `Refund` decimal(10,2) NOT NULL,
  `Date` datetime NOT NULL,
  `BorrowID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RefundHistories`
--

INSERT INTO `RefundHistories` (`ID`, `Refund`, `Date`, `BorrowID`) VALUES
(1, '300.00', '2017-03-30 13:06:06', 2),
(2, '200.00', '2017-03-30 13:07:47', 2),
(6, '3000.00', '2017-03-30 14:15:01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Money` decimal(15,2) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AccountTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `UserName`, `Password`, `FirstName`, `LastName`, `Money`, `CreateDate`, `Type`, `AccountTypeID`) VALUES
(2, 'admin', '12', 'Admin', 'Naja', '0.00', '0000-00-00 00:00:00', 'Admin', 0),
(5, 'west', '12', 'Saharut', 'Suntiwarawit', '5700.00', '2017-03-22 00:00:00', 'User', 1),
(6, 'test', '12', 'ฝากประจำ', 'นะจ๊ะ', '10000.00', '2016-03-22 00:00:00', 'User', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccoutTypes`
--
ALTER TABLE `AccoutTypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Actions`
--
ALTER TABLE `Actions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `BorrowHistories`
--
ALTER TABLE `BorrowHistories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Histories`
--
ALTER TABLE `Histories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `RefundHistories`
--
ALTER TABLE `RefundHistories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccoutTypes`
--
ALTER TABLE `AccoutTypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Actions`
--
ALTER TABLE `Actions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `BorrowHistories`
--
ALTER TABLE `BorrowHistories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Histories`
--
ALTER TABLE `Histories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `RefundHistories`
--
ALTER TABLE `RefundHistories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
