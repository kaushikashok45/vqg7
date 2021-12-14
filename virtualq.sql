-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: virtualq
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `phone` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,9) DEFAULT NULL,
  `longitude` decimal(10,9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('9443563720',9.999999999,9.999999999),('8220595109',9.999999999,9.999999999),('9159416225',9.999999999,9.999999999),('9655944820',9.999999999,9.999999999),('9626336554',9.999999999,9.999999999),('9790393758',9.999999999,9.999999999),('8220595109',9.999999999,9.999999999),('9443563720',9.999999999,9.999999999),('9159416225',9.999999999,9.999999999),('9655944820',9.999999999,9.999999999),('9626336554',9.999999999,9.999999999),('9790393758',9.999999999,9.999999999),('7373765460',9.999999999,9.999999999);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customerd`
--

DROP TABLE IF EXISTS `customerd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customerd` (
  `phone` varchar(50) DEFAULT NULL,
  `latitude` mediumtext DEFAULT NULL,
  `longitude` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customerd`
--

LOCK TABLES `customerd` WRITE;
/*!40000 ALTER TABLE `customerd` DISABLE KEYS */;
INSERT INTO `customerd` VALUES ('8220595109','11.0777259','76.9895811'),('9443563720','11.0777165','76.9895857'),('9159416225','11.0797','76.9997'),('9655944820','11.0802','76.9415'),('9626336554','11.0848','76.9980'),('9790393758','11.0176','76.9674'),('7373765460','11.017363','76.958885'),('9159232169','11.0247','77.0021'),('9894047689','11.0553','11.0553'),('861050400','11.1085','77.3411');
/*!40000 ALTER TABLE `customerd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customerdistance`
--

DROP TABLE IF EXISTS `customerdistance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customerdistance` (
  `phone` varchar(50) DEFAULT NULL,
  `distance` varchar(50) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customerdistance`
--

LOCK TABLES `customerdistance` WRITE;
/*!40000 ALTER TABLE `customerdistance` DISABLE KEYS */;
INSERT INTO `customerdistance` VALUES ('8220595109','0.4082',1),('9443563720','0.4091',2),('9159416225','0.4308',3),('9655944820','2.6525',4),('9626336554','0.5054',5),('9790393758','7.1911',6),('7373765460','7.3101',7),('9159232169','6.306',8),('9894047689','7181.0792',9),('861050400','18.2551',10);
/*!40000 ALTER TABLE `customerdistance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `unique_code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `total_tokens` varchar(100) DEFAULT NULL,
  `available_tokens` varchar(100) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  PRIMARY KEY (`unique_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,'PIZZA HUT','9.30-10.30','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta modi porro dolores? Qui, odit ea! Fuga, ducimus? Nihil vel at quibusdam earum odit quos odio, magni fugit autem eius corporis voluptates. Animi consequatur est quisquam unde corporis assumenda autem sint ducimus','99','99',NULL),(2,'DLF','9.30-10.30','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta modi porro dolores? Qui, odit ea! Fuga, ducimus? Nihil vel at quibusdam earum odit quos odio, magni fugit autem eius corporis voluptates. Animi consequatur est quisquam unde corporis assumenda autem sint ducimus','99','99',NULL),(3,'LULU PARADISE','9.30-10.30','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta modi porro dolores? Qui, odit ea! Fuga, ducimus? Nihil vel at quibusdam earum odit quos odio, magni fugit autem eius corporis voluptates. Animi consequatur est quisquam unde corporis assumenda autem sint ducimus','99','99',NULL),(4,'STARBUGS','9.30-10.30','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta modi porro dolores? Qui, odit ea! Fuga, ducimus? Nihil vel at quibusdam earum odit quos odio, magni fugit autem eius corporis voluptates. Animi consequatur est quisquam unde corporis assumenda autem sint ducimus','99','99',NULL),(5,'CAFE COFFEE DAY','9.30-10.30','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis soluta modi porro dolores? Qui, odit ea! Fuga, ducimus? Nihil vel at quibusdam earum odit quos odio, magni fugit autem eius corporis voluptates. Animi consequatur est quisquam unde corporis assumenda autem sint ducimus','99','99',NULL);
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopdetails`
--

DROP TABLE IF EXISTS `shopdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopdetails` (
  `phone` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `latitude` mediumtext DEFAULT NULL,
  `longitude` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopdetails`
--

LOCK TABLES `shopdetails` WRITE;
/*!40000 ALTER TABLE `shopdetails` DISABLE KEYS */;
INSERT INTO `shopdetails` VALUES ('9345375045','spicy garden','11.0812','76.9921');
/*!40000 ALTER TABLE `shopdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `phone` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('9790393758','sarojini','admin1','1','jonny',1),('8220595109','Dinesh Kumar P K','dinesh123','1','ajay',2),('9443563720','Kumaresan','kumar','1','abs',1),('9626336554','ajay olan','olu','1','ajay kumar',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-02 21:20:51
