-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: trafegus
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `motorista`
--

DROP TABLE IF EXISTS `motorista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veiculo_id` int(11) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4106B9EE86BB49E3` (`veiculo_id`),
  CONSTRAINT `FK_4106B9EE86BB49E3` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motorista`
--

LOCK TABLES `motorista` WRITE;
/*!40000 ALTER TABLE `motorista` DISABLE KEYS */;
INSERT INTO `motorista` VALUES (6,NULL,'Caleb Ricardo Augusto Peixoto','42.218.237-0','471.006.222','(61) 98326-9907');
/*!40000 ALTER TABLE `motorista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) NOT NULL,
  `renavam` varchar(30) DEFAULT NULL,
  `modelo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `ano` int(11) NOT NULL,
  `cor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B1231B8E737097D4` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (10,'MDP-367','05014415179','Hummer Open-Top 6.5 ','AM Gen',1998,'Marrom');
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-12 13:05:22
