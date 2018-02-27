-- MySQL dump 10.16  Distrib 10.1.30-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sjhs1819
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `user_id` varchar(20) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `pnumber` bigint(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('F2015M011','Sister','Demo','sister@yahoo.com',9355989504,'admin','$2y$10$obNHH008zVLkKMklo3FLzu5Nc9oV5PlfoSsUk8KnvrGp09MfJewEO');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `Fee_code` varchar(5) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`Fee_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES ('CF1','Computer',500.00),('CF2','Internet Fee',250.00),('Gr10','Grade 10 Tuition',7500.00),('Gr11','Grade 11 Tuition',7500.00),('Gr7','Grade 7 Tuition',8000.00),('Gr8','Grade 8 Tuition',8000.00),('Gr9','Grade 9 Tuition',8000.00),('MF1','Registration',120.00),('MF10','ID',100.00),('MF11','Testing Fee',200.00),('MF12','Student Handbook',50.00),('MF13','Guidance',100.00),('MF14','Publication',50.00),('MF15','Development Fee',120.00),('MF16','SSG Membership',60.00),('MF17','Clubs Membership',50.00),('MF18','Security Fee',200.00),('MF19','Utility Fee',200.00),('MF2','Library',100.00),('MF20','Report Card',100.00),('MF21','Happy Home',10.00),('MF22','Seminary',10.00),('MF23','PTA',100.00),('MF24','MAPEH Uniform',500.00),('MF25','Haircut',250.00),('MF26','Youth Encounter',1550.00),('MF27','Moving Up',650.00),('MF28','Seniors Project',200.00),('MF29','Graduation Fee',85.00),('MF3','Laboratory',85.00),('MF30','Souvenier',1200.00),('MF31','Retreat',1550.00),('MF32','TOGA Rental',200.00),('MF4','Medical/Dental',75.00),('MF5','Athletic Fee',75.00),('MF6','BUACS',20.00),('MF7','CEAP',11.00),('MF8','SWF',50.00),('MF9','Religious Fee',150.00),('OF1','SRA',300.00),('OF2','Books: Rental',0.00),('OF3','Books: Purchased',NULL);
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level` (
  `Level_code` varchar(5) NOT NULL,
  `Year_level` varchar(100) DEFAULT NULL,
  `Section` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Level_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES ('G0a','Not enrolled','None'),('G10a','Grade 10','St. Dominic'),('G7a','Grade 7','St. Anne'),('G7b','Grade 7','St. Agnes'),('G8a','Grade 8','St. Bernadette'),('G8b','Grade 8','St. Benedict'),('G9a','Grade 9','St. Cecilia'),('G9b','Grade 9','St. Catherine');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt` (
  `ReceiptNo` int(11) NOT NULL,
  `StudentID` varchar(30) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Amount` double NOT NULL,
  `Receipt_Date` date DEFAULT NULL,
  `ReceiptID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ReceiptID`),
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `student_pay_fees_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt`
--

LOCK TABLES `receipt` WRITE;
/*!40000 ALTER TABLE `receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `StudentID` varchar(30) NOT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Level_code` varchar(5) DEFAULT NULL,
  `Date_enrolled` date DEFAULT NULL,
  `School_Year` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `Level_code` (`Level_code`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Level_code`) REFERENCES `level` (`Level_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_pay_fees`
--

DROP TABLE IF EXISTS `student_pay_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_pay_fees` (
  `PaymentID` int(15) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(30) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Payment` varchar(50) NOT NULL,
  `ORNo` varchar(50) NOT NULL,
  `Balance` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `StudentID` (`StudentID`),
  KEY `Fee_code` (`Fee_code`),
  CONSTRAINT `student_pay_fees_ibfk_2` FOREIGN KEY (`Fee_code`) REFERENCES `fees` (`Fee_code`),
  CONSTRAINT `student_pay_fees_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_pay_fees`
--

LOCK TABLES `student_pay_fees` WRITE;
/*!40000 ALTER TABLE `student_pay_fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_pay_fees` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-27  9:34:33
