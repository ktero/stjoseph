-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 10:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjhs1819`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` varchar(20) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `pnumber` bigint(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `fname`, `lname`, `email`, `pnumber`, `username`, `password`) VALUES
('F2015M010', 'Sister', 'Demo', 'sister@yahoo.com', 9355989504, 'admin', '$2y$10$PRwyxWU8dYh/JyzheMOoCuQILsPAvcL0MPtluRciikNqauRjV9nIm');

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
('MF23', 'PTA', 0.00),
('MF24', 'MAPEH Uniform', 500.00),
('MF25', 'Haircut', 250.00),
('MF26', 'Youth Encounter', 1550.00),
('MF27', 'Moving Up', 650.00),
('MF28', 'Seniors Project', 200.00),
('MF29', 'Graduation Fee', 85.00),
('MF3', 'Laboratory', 85.00),
('MF30', 'Souvenier', 1200.00),
('MF31', 'Retreat', 1550.00),
('MF32', 'TOGA Rental', 200.00),
('MF4', 'Medical/Dental', 75.00),
('MF5', 'Athletic Fee', 75.00),
('MF6', 'BUACS', 20.00),
('MF7', 'CEAP', 11.00),
('MF8', 'SWF', 50.00),
('MF9', 'Religious Fee', 150.00),
('OF1', 'SRA', 300.00),
('OF2', 'Books: Rental', 0.00),
('OF3', 'Books: Purchased', NULL);

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
  `Amount` double NOT NULL,
  `Receipt_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReceiptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ReceiptNo`, `StudentID`, `Fee_code`, `Description`, `Amount`, `Receipt_Date`, `ReceiptID`) VALUES
(19, 201700010, 'CF1', 'Computer', 500, '2018-02-25 09:17:49', 7);

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
(2017000, 'Mack', 'Patrick', 'P', 'Male', 'xavier', 'G10a', '2017-01-01', '2017-2018'),
(2017001, 'Malaya', 'Blayce', 'P', 'Female', 'Iponan, Cagayan de Oro', 'G10a', '2017-06-05', '2017-2018'),
(20140385, 'Macale', 'Andrea Gail', 'P', 'Female', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2014-2018'),
(20150494, 'Licup', 'Haide Rogen', 'C', 'Male', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2015-2018'),
(20150508, 'Hingking', 'Francis', 'R', 'Female', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2015-2018'),
(20170675, 'Balas-og', 'Brandel', 'D', 'Male', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2017-2018'),
(20170730, 'Alesin', 'Emmane Laurence Johne', 'R', 'Male', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2017-2018'),
(20170761, 'Alvarado', 'Bethel Ham', 'L', 'Female', 'Talakag, Bukidnon', 'G10a', '2017-06-05', '2017-2018'),
(201700010, 'Tero', 'Kenneth', 'B', 'Male', 'Xavier University - Ateneo de Cagayan', 'G7a', '2018-02-28', '2017-2018');

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
(65, 2017000, 'CF1', '2017-10-16 06:38:02', '500', '1', NULL),
(66, 2017000, 'CF2', '2017-10-16 06:38:02', '250', '1', NULL),
(67, 2017000, 'Gr7', '2017-10-16 06:38:02', '8000', '1', NULL),
(68, 2017000, 'MF1', '2017-10-16 06:38:02', '120', '1', NULL),
(69, 2017000, 'MF10', '2017-10-16 06:38:02', '100', '1', NULL),
(70, 2017000, 'MF11', '2017-10-16 06:38:02', '200', '1', NULL),
(71, 2017000, 'MF12', '2017-10-16 06:39:04', '50', '2', NULL),
(72, 2017000, 'MF13', '2017-10-16 06:39:04', '100', '2', NULL),
(73, 2017000, 'MF14', '2017-10-16 06:39:04', '50', '2', NULL),
(74, 2017000, 'MF15', '2017-10-16 06:39:04', '120', '2', NULL),
(75, 2017000, 'MF16', '2017-10-16 06:39:04', '60', '2', NULL),
(76, 2017000, 'MF17', '2017-10-16 06:39:04', '50', '2', NULL),
(77, 2017000, 'MF18', '2017-10-16 06:39:39', '200', '3', NULL),
(78, 2017000, 'MF19', '2017-10-16 06:39:39', '200', '3', NULL),
(79, 2017000, 'MF2', '2017-10-16 06:39:39', '100', '3', NULL),
(80, 2017000, 'MF20', '2017-10-16 06:39:39', '100', '3', NULL),
(81, 2017000, 'MF21', '2017-10-16 06:40:47', '10', '4', NULL),
(82, 2017000, 'MF22', '2017-10-16 06:40:47', '10', '4', NULL),
(83, 2017000, 'MF24', '2017-10-16 06:40:47', '500', '4', NULL),
(84, 2017000, 'MF25', '2017-10-16 06:40:47', '250', '4', NULL),
(85, 2017000, 'MF26', '2017-10-16 06:40:47', '1500', '4', NULL),
(86, 2017000, 'MF27', '2017-10-16 06:40:47', '650', '4', NULL),
(87, 2017000, 'MF3', '2017-10-16 06:42:34', '85', '5', NULL),
(88, 2017000, 'MF4', '2017-10-16 06:42:34', '75', '5', NULL),
(90, 2017000, 'MF6', '2017-10-16 06:42:34', '20', '5', NULL),
(91, 2017000, 'MF7', '2017-10-16 06:42:34', '11', '5', NULL),
(92, 2017000, 'MF8', '2017-10-16 06:42:34', '50', '5', NULL),
(93, 2017000, 'MF9', '2017-10-16 06:42:34', '150', '5', NULL),
(94, 2017000, 'OF1', '2017-10-16 06:42:34', '300', '5', NULL),
(95, 20140385, 'CF1', '2017-10-16 07:09:49', '500', '1', NULL),
(96, 20140385, 'CF2', '2017-10-16 07:09:49', '250', '1', NULL),
(97, 20140385, 'Gr10', '2017-10-16 07:09:49', '7500', '1', NULL),
(98, 20140385, 'MF1', '2017-10-16 07:09:49', '120', '1', NULL),
(99, 20140385, 'MF10', '2017-10-16 07:09:49', '100', '1', NULL),
(100, 20140385, 'MF11', '2017-10-16 07:09:49', '200', '1', NULL),
(101, 20140385, 'MF12', '2017-10-16 07:09:49', '50', '1', NULL),
(102, 20140385, 'MF13', '2017-10-16 07:09:49', '100', '1', NULL),
(103, 20140385, 'MF14', '2017-10-16 07:09:49', '50', '1', NULL),
(104, 20140385, 'MF15', '2017-10-16 07:09:49', '120', '1', NULL),
(105, 20140385, 'MF16', '2017-10-16 07:09:49', '60', '1', NULL),
(106, 20140385, 'MF17', '2017-10-16 07:09:49', '50', '1', NULL),
(107, 20140385, 'MF18', '2017-10-16 07:09:49', '200', '1', NULL),
(108, 20140385, 'MF19', '2017-10-16 07:09:49', '200', '1', NULL),
(109, 20140385, 'MF2', '2017-10-16 07:09:49', '100', '1', NULL),
(110, 20140385, 'MF20', '2017-10-16 07:09:49', '100', '1', NULL),
(111, 20140385, 'MF21', '2017-10-16 07:09:49', '10', '1', NULL),
(112, 20140385, 'MF22', '2017-10-16 07:09:49', '10', '1', NULL),
(113, 20140385, 'MF24', '2017-10-16 07:09:49', '500', '1', NULL),
(114, 20140385, 'MF25', '2017-10-16 07:09:49', '250', '1', NULL),
(115, 20140385, 'MF26', '2017-10-16 07:09:49', '1500', '1', NULL),
(116, 20140385, 'MF3', '2017-10-16 07:09:49', '85', '1', NULL),
(117, 20140385, 'MF4', '2017-10-16 07:09:49', '75', '1', NULL),
(118, 20140385, 'MF5', '2017-10-16 07:09:49', '75', '1', NULL),
(119, 20140385, 'MF6', '2017-10-16 07:09:49', '20', '1', NULL),
(120, 20140385, 'MF7', '2017-10-16 07:09:49', '11', '1', NULL),
(121, 20140385, 'MF8', '2017-10-16 07:09:49', '50', '1', NULL),
(122, 20140385, 'MF9', '2017-10-16 07:09:49', '150', '1', NULL),
(123, 20140385, 'OF1', '2017-10-16 07:09:49', '300', '1', NULL),
(125, 2017000, 'MF4', '2017-10-16 07:36:20', '75', '9', NULL),
(126, 20170675, 'CF1', '2017-10-16 07:43:15', '500', '1', NULL),
(127, 20170675, 'CF2', '2017-10-16 07:43:15', '250', '1', NULL),
(128, 20170675, 'Gr7', '2017-10-16 07:43:15', '8000', '1', NULL),
(129, 20170675, 'MF1', '2017-10-16 07:43:15', '120', '1', NULL),
(130, 20170675, 'MF10', '2017-10-16 07:43:15', '100', '1', NULL),
(131, 20170675, 'MF11', '2017-10-16 07:43:15', '200', '1', NULL),
(132, 20170675, 'MF12', '2017-10-16 07:43:15', '50', '1', NULL),
(133, 20170675, 'MF13', '2017-10-16 07:43:15', '100', '1', NULL),
(134, 20170675, 'MF14', '2017-10-16 07:43:15', '50', '1', NULL),
(135, 20170675, 'MF15', '2017-10-16 07:43:15', '120', '1', NULL),
(136, 20170675, 'MF16', '2017-10-16 07:43:15', '60', '1', NULL),
(137, 20170675, 'MF17', '2017-10-16 07:43:15', '50', '1', NULL),
(138, 20170675, 'MF18', '2017-10-16 07:43:15', '200', '1', NULL),
(139, 20170675, 'MF19', '2017-10-16 07:43:15', '200', '1', NULL),
(140, 20170675, 'MF2', '2017-10-16 07:43:15', '100', '1', NULL),
(141, 20170675, 'MF20', '2017-10-16 07:43:16', '100', '1', NULL),
(142, 20170675, 'MF21', '2017-10-16 07:43:16', '10', '1', NULL),
(143, 20170675, 'MF22', '2017-10-16 07:43:16', '10', '1', NULL),
(144, 20170675, 'MF24', '2017-10-16 07:43:16', '500', '1', NULL),
(145, 20170675, 'MF25', '2017-10-16 07:43:16', '250', '1', NULL),
(146, 20170675, 'MF26', '2017-10-16 07:43:16', '1500', '1', NULL),
(147, 20170675, 'MF27', '2017-10-16 07:43:16', '650', '1', NULL),
(148, 20170675, 'MF3', '2017-10-16 07:43:16', '85', '1', NULL),
(149, 20170675, 'MF4', '2017-10-16 07:43:16', '75', '1', NULL),
(150, 20170675, 'MF5', '2017-10-16 07:43:16', '75', '1', NULL),
(151, 20170675, 'MF6', '2017-10-16 07:43:16', '20', '1', NULL),
(152, 20170675, 'MF7', '2017-10-16 07:43:16', '11', '1', NULL),
(153, 20170675, 'MF8', '2017-10-16 07:43:16', '50', '1', NULL),
(154, 20170675, 'MF9', '2017-10-16 07:43:16', '150', '1', NULL),
(155, 20170675, 'OF1', '2017-10-16 07:43:16', '300', '1', NULL),
(162, 201700010, 'CF1', '2018-02-25 09:17:49', '500.00', '19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

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
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `Fee_code` (`Fee_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_pay_fees`
--
ALTER TABLE `student_pay_fees`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

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
