-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 06:32 AM
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
-- Database: `mswdo`
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
  `address` varchar(90) NOT NULL,
  `contactNum` varchar(20) NOT NULL,
  `birthDate` date NOT NULL,
  `civilStatus` varchar(30) NOT NULL,
  `monthlyIncome` float(9,2) NOT NULL,
  `numofChildren` varchar(10) NOT NULL,
  `soloParent` varchar(10) NOT NULL,
  `senior` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `youth` varchar(10) NOT NULL,
  `4pc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttb`
--

INSERT INTO `clienttb` (`cCTR`, `clientCode`, `lastName`, `firstName`, `middleName`, `age`, `gender`, `suffix`, `address`, `contactNum`, `birthDate`, `civilStatus`, `monthlyIncome`, `numofChildren`, `soloParent`, `senior`, `pwd`, `youth`, `4pc`) VALUES
(2, 'SAL-0001', 'Vic', 'Dan', 'Pogi', '22', 'Male', 'Sr.', 'Underwater', '09099538842', '2023-02-14', 'Separated', 20000.00, '10', 'Yes', 'No', 'No', 'No', 'No'),
(3, 'PAL-0001', 'Legaspi', 'Jose Miguel', 'Dacallos', '21', 'Male', '', 'Obando Paliwas', '123123123', '2023-02-07', 'Single', 10000.00, '5', 'No', 'No', 'Yes', 'No', 'No'),
(4, 'CAT-0001', 'Ochoa', 'John Dominick', 'Pogi', '22', 'Male', '', 'Catanghalan', '9432543365', '2023-02-10', 'Single', 20000.00, '0', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `recordtb`
--

CREATE TABLE `recordtb` (
  `recCode` int(11) NOT NULL,
  `claimant` varchar(90) NOT NULL,
  `typeofAssist` varchar(40) NOT NULL,
  `amountofAssist` float(9,2) NOT NULL,
  `dateIssued` date NOT NULL,
  `clientCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recordtb`
--

INSERT INTO `recordtb` (`recCode`, `claimant`, `typeofAssist`, `amountofAssist`, `dateIssued`, `clientCode`) VALUES
(1, 'Daniel Pogi Victoriano', 'Financial Assistance', 500.00, '2023-02-28', 'CAT-0001');

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `userCode` int(11) NOT NULL,
  `userLast` varchar(30) NOT NULL,
  `userFirst` varchar(30) NOT NULL,
  `userMid` varchar(30) NOT NULL,
  `userContact` varchar(30) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userAge` int(10) NOT NULL,
  `userTypeCode` int(11) NOT NULL DEFAULT 1,
  `userName` varchar(40) NOT NULL,
  `userPass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`userCode`, `userLast`, `userFirst`, `userMid`, `userContact`, `userBirthDate`, `userAge`, `userTypeCode`, `userName`, `userPass`) VALUES
(1, 'Vic', 'Daniel', 'Pogi', '0935-543-3456', '2000-11-28', 22, 1, 'danpogi', 'danmaster'),
(2, 'Magisa', 'Dominick', 'Miguel', '09231234454', '0000-00-00', 22, 1, 'mikepogi', 'mastermike'),
(3, 'Legaspi', 'Jose Miguel', 'Dacallos', '09123329559', '2001-05-15', 22, 1, 'legaspijose@gmail.com', 'josemaster'),
(4, '', '', '', '', '0000-00-00', 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `userTypeCode` int(11) NOT NULL,
  `userType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`userTypeCode`, `userType`) VALUES
(1, 'staff'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienttb`
--
ALTER TABLE `clienttb`
  ADD PRIMARY KEY (`cCTR`);

--
-- Indexes for table `recordtb`
--
ALTER TABLE `recordtb`
  ADD PRIMARY KEY (`recCode`),
  ADD KEY `clientCode` (`clientCode`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`userCode`),
  ADD KEY `userTypeCode` (`userTypeCode`);

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
  MODIFY `cCTR` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recordtb`
--
ALTER TABLE `recordtb`
  MODIFY `recCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `userCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `userTypeCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usertb`
--
ALTER TABLE `usertb`
  ADD CONSTRAINT `usertb_ibfk_1` FOREIGN KEY (`userTypeCode`) REFERENCES `usertype` (`userTypeCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
