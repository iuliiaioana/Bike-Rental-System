-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bicicleta
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `order1`
--

DROP TABLE IF EXISTS `order1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order1` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `date_added` date NOT NULL,
  `complete` varchar(10) NOT NULL,
  `value_transaction` int DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order1`
--

LOCK TABLES `order1` WRITE;
/*!40000 ALTER TABLE `order1` DISABLE KEYS */;
INSERT INTO `order1` VALUES (5,14,'2020-12-25','da',100),(6,14,'2020-12-25','da',100),(8,15,'2020-12-25','da',120),(9,15,'2020-12-25','da',120),(10,16,'2020-12-25','da',80),(12,16,'2020-12-25','da',80),(13,16,'2020-12-25','nu',80),(14,16,'2020-12-25','nu',80),(15,17,'2020-12-26','nu',87),(16,17,'2020-12-26','nu',87),(17,17,'2020-12-26','da',87),(18,18,'2020-12-26','da',76),(19,18,'2020-12-26','nu',99),(20,19,'2020-12-26','da',253),(21,19,'2020-12-26','nu',33),(22,21,'2020-12-30','da',93),(23,21,'2020-12-30','nu',95),(24,22,'2020-12-30','nu',100),(25,22,'2020-12-30','nu',100),(26,22,'2020-12-30','nu',100),(27,23,'2020-09-21','nu',75),(28,23,'2020-12-30','da',55),(29,24,'2020-12-30','nu',85),(30,25,'2020-12-30','nu',45),(31,25,'2020-12-30','da',112),(32,25,'2020-12-30','nu',155),(33,25,'2020-12-30','nu',60),(34,25,'2020-12-30','nu',55),(35,26,'2020-12-30','nu',60),(36,28,'2021-01-06','nu',100),(37,29,'2021-01-12','nu',180),(38,29,'2021-01-12','nu',60),(39,29,'2021-01-14','nu',50),(40,29,'2020-10-21','nu',22),(41,29,'2021-01-14','nu',100),(42,29,'2021-01-14','nu',106),(43,29,'2020-10-21','nu',35),(44,29,'2021-01-16','nu',50),(45,29,'2021-01-16','nu',35),(46,29,'2020-10-22','nu',51),(47,29,'2021-01-16','da',50),(48,29,'2020-11-22','nu',20),(49,29,'2021-01-20','nu',70),(51,30,'2021-01-22','nu',606),(52,29,'2021-01-22','nu',70),(53,29,'2021-01-22','nu',50);
/*!40000 ALTER TABLE `order1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-22 14:22:47
