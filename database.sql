-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: planos_interactivos
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anyo_inicio` int(11) NOT NULL,
  `anyo_fin` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
INSERT INTO `parcelas` VALUES (1,1900,2021,'1.png',1,'Casa del gnomo','Una casa donde vivia un gnomo ETP',NULL,NULL),(9,1970,2021,'9.png',2,'Azul','Azul','2021-02-06 13:58:27','2021-02-06 13:58:27'),(10,1920,2021,'10.png',2,'Verde','Verde','2021-02-13 14:59:53','2021-02-13 14:59:53'),(11,1950,2021,'11.png',2,'Morado','Morado','2021-02-13 15:00:09','2021-02-13 15:00:09'),(12,1960,2021,'12.png',2,'Rojo','Rojo','2021-02-13 15:00:25','2021-02-13 15:00:25'),(13,1920,1940,'13.png',2,'Morada primera','asd','2021-02-13 15:03:40','2021-02-13 15:03:40'),(14,1800,1900,'14.png',3,'Herrería','Herrería prinicipal de Almería','2021-02-20 11:40:32','2021-02-20 11:40:32'),(15,1800,1920,'15.png',3,'Restaurante Purchena','Restaurante Purchena. El más antiguo de la ciudad.','2021-02-20 11:42:34','2021-02-20 11:42:34'),(16,1800,1980,'16.png',3,'Bloque','Bloque de pisos','2021-02-20 11:43:17','2021-02-20 11:43:17'),(17,1800,1920,'17.png',3,'Bloque 2','Bloque de pisos 2','2021-02-20 11:43:37','2021-02-20 11:43:37'),(18,1800,2021,'18.png',3,'Refugios de Almería','Refugios de Almería','2021-02-20 11:44:09','2021-02-20 11:44:09'),(19,1850,2021,'19.png',3,'Edificio de las Mariposas','El emblemático edificio de las mariposas de Almería','2021-02-20 11:45:21','2021-02-20 11:46:38'),(20,1800,2021,'20.png',3,'Farmacia','Farmacia','2021-02-20 11:46:29','2021-02-20 11:49:22'),(21,1900,2021,'21.png',3,'Tienda del Sastre Hernández','Tienda del Sastre Hernández','2021-02-20 11:47:28','2021-02-20 11:49:18'),(22,1905,2021,'22.png',3,'Bloque 1','Bloque de pisos 1','2021-02-20 11:48:01','2021-02-20 11:48:01'),(23,1905,2021,'23.png',3,'Bloque 2','Bloque de pisos 2','2021-02-20 11:48:18','2021-02-20 11:49:29'),(24,1910,2021,'24.png',3,'Restaurante Da Vinci','Restaurante Da Vinci. Actualmente está en obras.','2021-02-20 11:48:48','2021-02-20 11:49:35'),(25,1925,2021,'25.png',3,'Bloque 3','Bloque 3','2021-02-20 11:49:12','2021-02-20 11:49:12'),(26,1985,2021,'26.png',3,'Bloque moderno','Bloque moderno','2021-02-20 11:49:52','2021-02-20 11:49:52'),(27,2005,2021,'27.png',3,'Hotel Torreluz','Hotel Torreluz','2021-02-20 11:50:08','2021-02-20 11:50:08');
/*!40000 ALTER TABLE `parcelas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-20 12:57:11
