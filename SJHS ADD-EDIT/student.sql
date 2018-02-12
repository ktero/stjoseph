-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2017 at 03:55 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(20140071, 'Mendez', 'Shawn', 'Jo', 'Male', 'Canada', 'G11a', '2017-09-17', '2017-2018'),
(20140072, 'Dela Cruz', 'Joseph', 'Santos', 'Male', 'Talakag', 'G9a', '2017-09-17', '2017-2018'),
(20140073, 'Kim', 'Eun Tak', 'Lee', 'Female', 'Korea', 'G8b', '2017-09-17', '2017-2018'),
(20140074, 'Sheeran', 'Ed', 'Ginger', 'Male', 'USA', 'G12a', '2017-09-17', '2017-2018'),
(20140075, 'Hernandez', 'Thomas', 'Santos', 'Male', 'Talakag', 'G8b', '0000-00-00', ''),
(20140076, 'Swift', 'Taylor', 'Her', 'Female', 'USA', 'G9a', '2017-09-17', '2017-2018'),
(20140077, 'Go', 'Kurt', 'Sy', 'Male', 'Talakag', 'G7b', '2017-09-19', '2017-2018'),
(20140078, 'Lapuz', 'Angiela', 'Cagampang', 'Female', 'Iponan', 'G12a', '2017-09-19', '2017-2018'),
(20140079, 'Malaya', 'Blayce', 'Palmere', 'Female', 'Iponan', 'G12a', '2017-09-19', '2017-2018'),
(20170090, 'Gomez', 'Jackie', 'Kho', 'Female', 'Talakag', 'G9a', '2017-09-17', '2017-2018'),
(201700092, 'Faustino', 'Selena', 'Santos', 'Female', 'Talakag', 'G9a', '2017-09-17', '2017-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Level_code` (`Level_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Level_code`) REFERENCES `level` (`Level_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
