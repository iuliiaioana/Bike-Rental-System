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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `parola` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'iulia','test@ro','123'),(2,'iulia','iulia@ro','202cb962ac59075b964b07152d234b70'),(3,'iulia','test@ro','123'),(4,'calin','calin@ro','202cb962ac59075b964b07152d234b70'),(5,'sorina','sorina@ro','202cb962ac59075b964b07152d234b70'),(6,'dike','dike@com','202cb962ac59075b964b07152d234b70'),(7,'miki','miki@ro','202cb962ac59075b964b07152d234b70'),(8,'xx','xx@ro','202cb962ac59075b964b07152d234b70'),(9,'casc','cascsa@dd','202cb962ac59075b964b07152d234b70'),(10,'mihai alexandru','mihai@ro','202cb962ac59075b964b07152d234b70'),(11,'alex','alex@ro','202cb962ac59075b964b07152d234b70'),(12,'admin','admin@admin','21232f297a57a5a743894a0e4a801fc3'),(13,'sabin','sabin@ro','202cb962ac59075b964b07152d234b70'),(14,'alexandru','alexandru12333@xasdxsa','c04ed5586ca071127f35e172823b38a8'),(15,'simona','simo@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055'),(16,'adrian','adi@gmail.com','81dc9bdb52d04dc20036dbd8313ed055'),(17,'mircea','mircea@ro','81dc9bdb52d04dc20036dbd8313ed055'),(18,'emanuel','manu@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055'),(19,'bobby','bob@ro','e034fb6b66aacc1d48f445ddfb08da98'),(20,'esmaralda','esma@gmail.com','d879b047b0b205c25f92da2aace62d0b'),(21,'mihaela mirea','mirea@gmail.com','b53086d558f1127993271e8c504ded45'),(22,'vladimir','vla@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055'),(23,'dobrin','dobrin@gmail.com','81dc9bdb52d04dc20036dbd8313ed055'),(24,'daniel','dany@yahoo.ro','202cb962ac59075b964b07152d234b70'),(25,'maria ','maria@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055'),(26,'beatrice','betty@ro','81dc9bdb52d04dc20036dbd8313ed055'),(27,'Mihnea ','MIH@YAHOO.COM','81dc9bdb52d04dc20036dbd8313ed055'),(28,'calinnnnn','calind@yahoo','81dc9bdb52d04dc20036dbd8313ed055'),(29,'cleo','cleo@ro','81dc9bdb52d04dc20036dbd8313ed055'),(30,'Claudia','clau99@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
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
