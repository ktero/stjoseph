-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sjhs
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB

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
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `pnumber` bigint(11) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (10,'Sister','Demo','sister@gmail.com',9355989504,25,'admin','0000');
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
INSERT INTO `fees` VALUES ('CF1','Computer',500.00),('CF2','Internet Fee',250.00),('Gr10','Grade 10 Tuition',7500.00),('Gr7','Grade 7 Tuition',8000.00),('Gr8','Grade 8 Tuition',8000.00),('Gr9','Grade 9 Tuition',8000.00),('MF1','Registration',120.00),('MF10','ID',100.00),('MF11','Testing Fee',200.00),('MF12','Student Handbook',50.00),('MF13','Guidance',100.00),('MF14','Publication',50.00),('MF15','Development Fee',120.00),('MF16','SSG Membership',60.00),('MF17','Clubs Membership',50.00),('MF18','Security Fee',200.00),('MF19','Utility Fee',200.00),('MF2','Library',100.00),('MF20','Report Card',100.00),('MF21','Happy Home',10.00),('MF22','Seminary',10.00),('MF23','PTA',0.00),('MF24','MAPEH Uniform',500.00),('MF25','Haircut',250.00),('MF26','Youth Encounter',1500.00),('MF27','Moving Up',650.00),('MF3','Laboratory',85.00),('MF4','Medical/Dental',75.00),('MF5','Athletic Fee',75.00),('MF6','BUACS',20.00),('MF7','CEAP',11.00),('MF8','SWF',50.00),('MF9','Religious Fee',150.00),('OF1','SRA',300.00),('OF2','Books: Rental',0.00),('OF3','Books: Purchased',NULL);
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
INSERT INTO `level` VALUES ('G10a','Grade 10','St. Dominic'),('G7a','Grade 7','St. Anne'),('G7b','Grade 7','St. Agnes'),('G8a','Grade 8','St. Bernadette'),('G8b','Grade 8','St. Benedict'),('G9a','Grade 9','St. Cecilia'),('G9b','Grade 9','St. Catherine');
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
  `StudentID` int(11) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ReceiptID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ReceiptID`),
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt`
--

LOCK TABLES `receipt` WRITE;
/*!40000 ALTER TABLE `receipt` DISABLE KEYS */;
INSERT INTO `receipt` VALUES (1,2017001,'CF0','',100,174);
/*!40000 ALTER TABLE `receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
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
INSERT INTO `student` VALUES (2017000,'Mack','Patrick','P','Female','xavier','G7a','2017-01-01','2017-2018'),(2017001,'Malaya','Blayce','P','Female','Iponan, Cagayan de Oro','G10a','2017-06-05','2017-2018'),(20140385,'Macale','Andrea Gail','P','Female','Talakag, Bukidnon','G10a','2017-06-05','2014-2018'),(20150494,'Licup','Haide Rogen','C','Male','Talakag, Bukidnon','G9a','2017-06-05','2015-2018'),(20150508,'Hingking','Francis','R','Female','Talakag, Bukidnon','G9b','2017-06-05','2015-2018'),(20170675,'Balas-og','Brandel','D','Male','Talakag, Bukidnon','G7b','2017-06-05','2017-2018'),(20170730,'Alesin','Emmane Laurence Johne','R','Male','Talakag, Bukidnon','G7a','2017-06-05','2017-2018'),(20170761,'Alvarado','Bethel Ham','L','Female','Talakag, Bukidnon','G7a','2017-06-05','2017-2018');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_pay_fees`
--

DROP TABLE IF EXISTS `student_pay_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_pay_fees` (
  `PaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) NOT NULL,
  `Fee_code` varchar(5) NOT NULL,
  `Payment_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payment` varchar(50) NOT NULL,
  `ORNo` varchar(50) NOT NULL,
  `Balance` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `StudentID` (`StudentID`),
  KEY `Fee_code` (`Fee_code`),
  CONSTRAINT `student_pay_fees_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  CONSTRAINT `student_pay_fees_ibfk_2` FOREIGN KEY (`Fee_code`) REFERENCES `fees` (`Fee_code`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_pay_fees`
--

LOCK TABLES `student_pay_fees` WRITE;
/*!40000 ALTER TABLE `student_pay_fees` DISABLE KEYS */;
INSERT INTO `student_pay_fees` VALUES (65,2017000,'CF1','2017-10-16 06:38:02','500','1',NULL),(66,2017000,'CF2','2017-10-16 06:38:02','250','1',NULL),(67,2017000,'Gr7','2017-10-16 06:38:02','8000','1',NULL),(68,2017000,'MF1','2017-10-16 06:38:02','120','1',NULL),(69,2017000,'MF10','2017-10-16 06:38:02','100','1',NULL),(70,2017000,'MF11','2017-10-16 06:38:02','200','1',NULL),(71,2017000,'MF12','2017-10-16 06:39:04','50','2',NULL),(72,2017000,'MF13','2017-10-16 06:39:04','100','2',NULL),(73,2017000,'MF14','2017-10-16 06:39:04','50','2',NULL),(74,2017000,'MF15','2017-10-16 06:39:04','120','2',NULL),(75,2017000,'MF16','2017-10-16 06:39:04','60','2',NULL),(76,2017000,'MF17','2017-10-16 06:39:04','50','2',NULL),(77,2017000,'MF18','2017-10-16 06:39:39','200','3',NULL),(78,2017000,'MF19','2017-10-16 06:39:39','200','3',NULL),(79,2017000,'MF2','2017-10-16 06:39:39','100','3',NULL),(80,2017000,'MF20','2017-10-16 06:39:39','100','3',NULL),(81,2017000,'MF21','2017-10-16 06:40:47','10','4',NULL),(82,2017000,'MF22','2017-10-16 06:40:47','10','4',NULL),(83,2017000,'MF24','2017-10-16 06:40:47','500','4',NULL),(84,2017000,'MF25','2017-10-16 06:40:47','250','4',NULL),(85,2017000,'MF26','2017-10-16 06:40:47','1500','4',NULL),(86,2017000,'MF27','2017-10-16 06:40:47','650','4',NULL),(87,2017000,'MF3','2017-10-16 06:42:34','85','5',NULL),(88,2017000,'MF4','2017-10-16 06:42:34','75','5',NULL),(90,2017000,'MF6','2017-10-16 06:42:34','20','5',NULL),(91,2017000,'MF7','2017-10-16 06:42:34','11','5',NULL),(92,2017000,'MF8','2017-10-16 06:42:34','50','5',NULL),(93,2017000,'MF9','2017-10-16 06:42:34','150','5',NULL),(94,2017000,'OF1','2017-10-16 06:42:34','300','5',NULL),(95,20140385,'CF1','2017-10-16 07:09:49','500','1',NULL),(96,20140385,'CF2','2017-10-16 07:09:49','250','1',NULL),(97,20140385,'Gr10','2017-10-16 07:09:49','7500','1',NULL),(98,20140385,'MF1','2017-10-16 07:09:49','120','1',NULL),(99,20140385,'MF10','2017-10-16 07:09:49','100','1',NULL),(100,20140385,'MF11','2017-10-16 07:09:49','200','1',NULL),(101,20140385,'MF12','2017-10-16 07:09:49','50','1',NULL),(102,20140385,'MF13','2017-10-16 07:09:49','100','1',NULL),(103,20140385,'MF14','2017-10-16 07:09:49','50','1',NULL),(104,20140385,'MF15','2017-10-16 07:09:49','120','1',NULL),(105,20140385,'MF16','2017-10-16 07:09:49','60','1',NULL),(106,20140385,'MF17','2017-10-16 07:09:49','50','1',NULL),(107,20140385,'MF18','2017-10-16 07:09:49','200','1',NULL),(108,20140385,'MF19','2017-10-16 07:09:49','200','1',NULL),(109,20140385,'MF2','2017-10-16 07:09:49','100','1',NULL),(110,20140385,'MF20','2017-10-16 07:09:49','100','1',NULL),(111,20140385,'MF21','2017-10-16 07:09:49','10','1',NULL),(112,20140385,'MF22','2017-10-16 07:09:49','10','1',NULL),(113,20140385,'MF24','2017-10-16 07:09:49','500','1',NULL),(114,20140385,'MF25','2017-10-16 07:09:49','250','1',NULL),(115,20140385,'MF26','2017-10-16 07:09:49','1500','1',NULL),(116,20140385,'MF3','2017-10-16 07:09:49','85','1',NULL),(117,20140385,'MF4','2017-10-16 07:09:49','75','1',NULL),(118,20140385,'MF5','2017-10-16 07:09:49','75','1',NULL),(119,20140385,'MF6','2017-10-16 07:09:49','20','1',NULL),(120,20140385,'MF7','2017-10-16 07:09:49','11','1',NULL),(121,20140385,'MF8','2017-10-16 07:09:49','50','1',NULL),(122,20140385,'MF9','2017-10-16 07:09:49','150','1',NULL),(123,20140385,'OF1','2017-10-16 07:09:49','300','1',NULL),(125,2017000,'MF4','2017-10-16 07:36:20','75','9',NULL),(126,20170675,'CF1','2017-10-16 07:43:15','500','1',NULL),(127,20170675,'CF2','2017-10-16 07:43:15','250','1',NULL),(128,20170675,'Gr7','2017-10-16 07:43:15','8000','1',NULL),(129,20170675,'MF1','2017-10-16 07:43:15','120','1',NULL),(130,20170675,'MF10','2017-10-16 07:43:15','100','1',NULL),(131,20170675,'MF11','2017-10-16 07:43:15','200','1',NULL),(132,20170675,'MF12','2017-10-16 07:43:15','50','1',NULL),(133,20170675,'MF13','2017-10-16 07:43:15','100','1',NULL),(134,20170675,'MF14','2017-10-16 07:43:15','50','1',NULL),(135,20170675,'MF15','2017-10-16 07:43:15','120','1',NULL),(136,20170675,'MF16','2017-10-16 07:43:15','60','1',NULL),(137,20170675,'MF17','2017-10-16 07:43:15','50','1',NULL),(138,20170675,'MF18','2017-10-16 07:43:15','200','1',NULL),(139,20170675,'MF19','2017-10-16 07:43:15','200','1',NULL),(140,20170675,'MF2','2017-10-16 07:43:15','100','1',NULL),(141,20170675,'MF20','2017-10-16 07:43:16','100','1',NULL),(142,20170675,'MF21','2017-10-16 07:43:16','10','1',NULL),(143,20170675,'MF22','2017-10-16 07:43:16','10','1',NULL),(144,20170675,'MF24','2017-10-16 07:43:16','500','1',NULL),(145,20170675,'MF25','2017-10-16 07:43:16','250','1',NULL),(146,20170675,'MF26','2017-10-16 07:43:16','1500','1',NULL),(147,20170675,'MF27','2017-10-16 07:43:16','650','1',NULL),(148,20170675,'MF3','2017-10-16 07:43:16','85','1',NULL),(149,20170675,'MF4','2017-10-16 07:43:16','75','1',NULL),(150,20170675,'MF5','2017-10-16 07:43:16','75','1',NULL),(151,20170675,'MF6','2017-10-16 07:43:16','20','1',NULL),(152,20170675,'MF7','2017-10-16 07:43:16','11','1',NULL),(153,20170675,'MF8','2017-10-16 07:43:16','50','1',NULL),(154,20170675,'MF9','2017-10-16 07:43:16','150','1',NULL),(155,20170675,'OF1','2017-10-16 07:43:16','300','1',NULL);
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

-- Dump completed on 2018-02-22 12:20:45
