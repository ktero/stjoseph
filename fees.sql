-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 08:58 AM
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
('OF3', 'Books: Purchased', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`Fee_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
