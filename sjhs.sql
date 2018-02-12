-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 06:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(3) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `pnumber` bigint(11) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `fname`, `lname`, `email`, `pnumber`, `age`, `username`, `password`) VALUES
(1, 'test', 'ing123', 'sample@sample.com', 9123456789, 17, 'test', 'ing1234'),
(2, 'Reyson', 'Palacios', 'reyson.palacios22@gmail.com', 9059502533, 17, 'Reyson', 'palacios'),
(3, 'Karen', 'Delarea', 'rea@gmail.com', 87673421, 21, 'karen', 'antazo'),
(4, 'Karen', 'Delarea', 'rea@gmail.com', 87673421, 21, 'karen', 'antazo'),
(5, 'Karen', 'Delarea', 'rea@gmail.com', 87673421, 21, 'karen', 'antazo'),
(6, 'Reyson', 'Benedicto', 'reyson.palacios22@gmail.com', 972941217, 17, 'reyson', 'benedicto'),
(7, 'Reyson', 'Palacios', 'ERDSY@gmail.com', 39424, 21, 'reyson', 'benedicto'),
(8, 'Reyson', 'Esplago', 'reyson.palacios22@gmail.com', 23456, 12, 'benedicto', 'palacios'),
(9, 'Reyson', 'Palacios', 'reyson.palacios22@gmail.com', 223456, 11, 'benedicto', 'reyson');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `Fee_code` varchar(5) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`Fee_code`, `Description`, `Amount`) VALUES
('CF1', 'Computer', 500.00),
('CF2', 'Internet Fee', 250.00),
('Gr10', 'Grade 10 Tuition', 7500.00),
('Gr7', 'Grade 7 Tuition', 8000.00),
('Gr8', 'Grade 8 Tuition', 8000.00),
('Gr9', 'Grade 9 Tuition', 8000.00),
('MF1', 'Registration', 120.00),
('MF10', 'ID', 100.00),
('MF11', 'Testing Fee', 200.00),
('MF12', 'Student Handbook', 50.00),
('MF13', 'Guidance', 100.00),
('MF14', 'Publication', 50.00),
('MF15', 'Development Fee', 120.00),
('MF16', 'SSG Membership', 60.00),
('MF17', 'Clubs Membership', 50.00),
('MF18', 'Security Fee', 200.00),
('MF19', 'Utility Fee', 200.00),
('MF2', 'Library', 100.00),
('MF20', 'Report Card', 100.00),
('MF21', 'Happy Home', 10.00),
('MF22', 'Seminary', 10.00),
('MF23', 'PTA', NULL),
('MF24', 'MAPEH Uniform', 500.00),
('MF25', 'Haircut', 250.00),
('MF26', 'Youth Encounter', 1500.00),
('MF27', 'Moving Up', 650.00),
('MF3', 'Laboratory', 85.00),
('MF4', 'Medical/Dental', 75.00),
('MF5', 'Athletic Fee', 75.00),
('MF6', 'BUACS', 20.00),
('MF7', 'CEAP', 11.00),
('MF8', 'SWF', 50.00),
('MF9', 'Religious Fee', 150.00),
('OF1', 'SRA', 300.00),
('OF2', 'Books: Rental', NULL),
('OF3', 'Books: Purchased', NULL),
('TP1', 'Table fee', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_code` varchar(5) NOT NULL,
  `Year_level` varchar(100) DEFAULT NULL,
  `Section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Level_code`, `Year_level`, `Section`) VALUES
('G10a', 'Grade 10', 'St. Dominic'),
('G7a', 'Grade 7', 'St. Anne'),
('G7b', 'Grade 7', 'St. Agnes'),
('G8a', 'Grade 8', 'St. Bernadette'),
('G8b', 'Grade 8', 'St. Benedict'),
('G9a', 'Grade 9', 'St. Cecilia'),
('G9b', 'Grade 9', 'St. Catherine');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ReceiptNo` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ReceiptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Level_code` varchar(5) DEFAULT NULL,
  `Date_enrolled` date DEFAULT NULL,
  `School_Year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Lname`, `Fname`, `Mname`, `Gender`, `Address`, `Level_code`, `Date_enrolled`, `School_Year`) VALUES
(666, 'AYAW', 'SA NI', 'TANG TANGA', 'Male', 'BS', 'G9b', '2010-06-15', '2010-2011'),
(1322434, 'Serra', 'Winona', 'Santos', 'Male', 'sdvzd', 'G8a', '1998-01-24', '2015-2016'),
(20140000, 'jakafa', 'asgds', 'sdagg', 'Male', 'dsaga', 'G9a', '1992-01-01', '2017-2018'),
(200232919, 'Tabboga', 'Jose Antonio', 'Ragudo', 'Male', '11-14 Nazareth', 'G7b', '2018-06-01', '2018-2019'),
(2147483647, 'Bobadilla', 'Irene', 'Danlog', 'Female', 'Private Area', 'G7b', '2016-12-31', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `student_pay_fees`
--

CREATE TABLE `student_pay_fees` (
  `PaymentID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Payment_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payment` varchar(50) NOT NULL,
  `ORNo` varchar(50) NOT NULL,
  `Balance` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_pay_fees`
--

INSERT INTO `student_pay_fees` (`PaymentID`, `StudentID`, `Fee_code`, `Payment_Date`, `Payment`, `ORNo`, `Balance`) VALUES
(27, 200232919, 'CF2', '2017-10-10 08:56:20', '50', '101', NULL),
(28, 20140000, 'MF1', '2017-10-10 14:20:52', '35', '12345', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`Fee_code`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Level_code`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ReceiptID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Level_code` (`Level_code`);

--
-- Indexes for table `student_pay_fees`
--
ALTER TABLE `student_pay_fees`
  ADD PRIMARY KEY (`PaymentID`) USING BTREE,
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `Fee_code` (`Fee_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_pay_fees`
--
ALTER TABLE `student_pay_fees`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Level_code`) REFERENCES `level` (`Level_code`);

--
-- Constraints for table `student_pay_fees`
--
ALTER TABLE `student_pay_fees`
  ADD CONSTRAINT `student_pay_fees_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `student_pay_fees_ibfk_2` FOREIGN KEY (`Fee_code`) REFERENCES `fees` (`Fee_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
