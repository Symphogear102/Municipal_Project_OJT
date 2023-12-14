-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 07:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `municipal`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienttb`
--

CREATE TABLE `clienttb` (
  `cCTR` int(150) NOT NULL,
  `clientCode` varchar(200) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `brgy` varchar(90) NOT NULL,
  `street` varchar(100) NOT NULL,
  `contactNum` varchar(20) NOT NULL,
  `birthDate` date NOT NULL,
  `civilStatus` varchar(30) NOT NULL,
  `monthlyIncome` float(9,2) NOT NULL,
  `numofChildren` varchar(20) NOT NULL,
  `soloParent` varchar(20) NOT NULL,
  `senior` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `youth` varchar(20) NOT NULL,
  `4pc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fa_tb`
--

CREATE TABLE `fa_tb` (
  `finCode` int(11) NOT NULL,
  `claimant` varchar(150) NOT NULL,
  `amountofAssist` float(9,2) NOT NULL,
  `dateIssued` date NOT NULL,
  `clientCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `med_tb`
--

CREATE TABLE `med_tb` (
  `medRec` int(11) NOT NULL,
  `claimant` varchar(150) NOT NULL,
  `medName` varchar(100) NOT NULL,
  `medQty` varchar(50) NOT NULL,
  `dateIssued` date NOT NULL,
  `clientCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `userCode` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `userImage` varchar(99) NOT NULL,
  `userLast` varchar(50) NOT NULL,
  `userFirst` varchar(50) NOT NULL,
  `userMid` varchar(50) NOT NULL,
  `userContact` varchar(50) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userAge` int(10) NOT NULL,
  `userGender` varchar(20) NOT NULL,
  `userTypeCode` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `userPass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`userCode`, `userID`, `userImage`, `userLast`, `userFirst`, `userMid`, `userContact`, `userBirthDate`, `userAge`, `userGender`, `userTypeCode`, `userName`, `userPass`) VALUES
(2, NULL, '', 'Ochoa', 'John Michael', 'Pogi', '0932-000-3212', '2000-11-18', 22, 'M', 1, 'mikepogi', '1234'),
(11, NULL, '', 'Victoriano', 'Daniel', 'Pogi', '0909-321-3212', '2000-11-28', 22, 'Male', 2, 'danpogi', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `userTypeCode` int(11) NOT NULL,
  `userType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienttb`
--
ALTER TABLE `clienttb`
  ADD PRIMARY KEY (`cCTR`),
  ADD UNIQUE KEY `clientCode` (`clientCode`);

--
-- Indexes for table `fa_tb`
--
ALTER TABLE `fa_tb`
  ADD PRIMARY KEY (`finCode`),
  ADD UNIQUE KEY `clientCode` (`clientCode`);

--
-- Indexes for table `med_tb`
--
ALTER TABLE `med_tb`
  ADD PRIMARY KEY (`medRec`),
  ADD UNIQUE KEY `clientCode` (`clientCode`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`userCode`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`userTypeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienttb`
--
ALTER TABLE `clienttb`
  MODIFY `cCTR` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_tb`
--
ALTER TABLE `fa_tb`
  MODIFY `finCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_tb`
--
ALTER TABLE `med_tb`
  MODIFY `medRec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `userCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
