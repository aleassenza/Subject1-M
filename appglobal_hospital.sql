-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB-5+b1

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
-- Table structure for table `CITAS`
--

DROP TABLE IF EXISTS `CITAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CITAS` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `ci_usuario` int(8) NOT NULL,
  `ci_doctor` int(8) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `ci_moderador` int(8) NOT NULL,
  `motivo` varchar(64) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `FK_CITAS_USUARIOS` (`ci_usuario`),
  CONSTRAINT `FK_CITAS_USUARIOS` FOREIGN KEY (`ci_usuario`) REFERENCES `USUARIOS` (`ci_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CITAS`
--

LOCK TABLES `CITAS` WRITE;
/*!40000 ALTER TABLE `CITAS` DISABLE KEYS */;
INSERT INTO `CITAS` VALUES (1,12345679,12345678,'2017-04-25 15:53:26','A',22913436,''),(2,12345679,12345678,'2017-04-28 00:46:02','A',22913436,''),(3,12345678,0,'2017-05-02 11:12:00','A',22913436,'Consulta general'),(4,12345678,0,'2017-05-02 11:12:00','A',22913436,'Consulta general'),(5,12345678,0,'2017-05-02 15:00:00','A',22913436,'GENERAL'),(6,12345678,12345678,'2017-05-02 15:12:00','A',22913436,'GENERAL');
/*!40000 ALTER TABLE `CITAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DESCRIPCIONES`
--

DROP TABLE IF EXISTS `DESCRIPCIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DESCRIPCIONES` (
  `id_descripcion` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL,
  PRIMARY KEY (`id_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DESCRIPCIONES`
--

LOCK TABLES `DESCRIPCIONES` WRITE;
/*!40000 ALTER TABLE `DESCRIPCIONES` DISABLE KEYS */;
INSERT INTO `DESCRIPCIONES` VALUES (1,'Consulta general'),(2,'Consulta reestructurada');
/*!40000 ALTER TABLE `DESCRIPCIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DOCTORES`
--

DROP TABLE IF EXISTS `DOCTORES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DOCTORES` (
  `ci_usuario` int(8) NOT NULL,
  `id_especializacion` int(11) NOT NULL,
  `cov` varchar(10) NOT NULL,
  `mpps` varchar(10) NOT NULL,
  `resumen` text,
  PRIMARY KEY (`ci_usuario`),
  KEY `FK_DOCTORES_ESPECIALIZACIONES` (`id_especializacion`),
  CONSTRAINT `FK_DOCTORES_ESPECIALIZACIONES` FOREIGN KEY (`id_especializacion`) REFERENCES `ESPECIALIZACIONES` (`id_especializacion`),
  CONSTRAINT `FK_DOCTORES_USUARIOS` FOREIGN KEY (`ci_usuario`) REFERENCES `USUARIOS` (`ci_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DOCTORES`
--

LOCK TABLES `DOCTORES` WRITE;
/*!40000 ALTER TABLE `DOCTORES` DISABLE KEYS */;
INSERT INTO `DOCTORES` VALUES (1,1,'12345','12345',NULL),(12345670,1,'123456','123456',NULL),(12345678,1,'12345','12345',NULL);
/*!40000 ALTER TABLE `DOCTORES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ESPECIALIZACIONES`
--

DROP TABLE IF EXISTS `ESPECIALIZACIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ESPECIALIZACIONES` (
  `id_especializacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_especializacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ESPECIALIZACIONES`
--

LOCK TABLES `ESPECIALIZACIONES` WRITE;
/*!40000 ALTER TABLE `ESPECIALIZACIONES` DISABLE KEYS */;
INSERT INTO `ESPECIALIZACIONES` VALUES (1,'Odontólogo');
/*!40000 ALTER TABLE `ESPECIALIZACIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MODERADORES`
--

DROP TABLE IF EXISTS `MODERADORES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MODERADORES` (
  `id_moderador` int(11) NOT NULL AUTO_INCREMENT,
  `ci_moderador` int(8) NOT NULL,
  `ci_doctor` int(8) NOT NULL,
  PRIMARY KEY (`id_moderador`),
  KEY `FK_MODERADORES_USUARIOS` (`ci_moderador`),
  CONSTRAINT `FK_MODERADORES_USUARIOS` FOREIGN KEY (`ci_moderador`) REFERENCES `USUARIOS` (`ci_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MODERADORES`
--

LOCK TABLES `MODERADORES` WRITE;
/*!40000 ALTER TABLE `MODERADORES` DISABLE KEYS */;
INSERT INTO `MODERADORES` VALUES (1,22913436,12345678),(2,22913436,1),(3,22913436,1);
/*!40000 ALTER TABLE `MODERADORES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NOTIFICACIONES`
--

DROP TABLE IF EXISTS `NOTIFICACIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NOTIFICACIONES` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `id_descripcion` int(11) NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_notificacion`),
  KEY `FK_NOTIFICACIONES_CITAS` (`id_cita`),
  CONSTRAINT `FK_NOTIFICACIONES_CITAS` FOREIGN KEY (`id_cita`) REFERENCES `CITAS` (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NOTIFICACIONES`
--

LOCK TABLES `NOTIFICACIONES` WRITE;
/*!40000 ALTER TABLE `NOTIFICACIONES` DISABLE KEYS */;
INSERT INTO `NOTIFICACIONES` VALUES (1,3,0,0,'A'),(2,4,0,0,'A'),(3,5,0,0,'A'),(4,6,1,0,'A');
/*!40000 ALTER TABLE `NOTIFICACIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIOS` (
  `ci_usuario` int(8) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `apellido` varchar(24) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `nivel` smallint(6) NOT NULL DEFAULT '3',
  `telefono` varchar(14) DEFAULT NULL,
  `contrasenna` varchar(32) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_usuario` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ci_usuario`,`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (1,'doc','doc','doc',2,'','9a09b4dfda82e3e665e31092d1c3ec8d','2017-05-02 13:34:27','A'),(3,'b','b','b',2,'4','92eb5ffee6ae2fec3ad71c777531578f','2017-05-06 15:45:41','A'),(12345670,'doctor','doctor','doctor@gmail.com',2,'','25d55ad283aa400af464c76d713c07ad','2017-04-29 16:47:17','A'),(12345678,'test','test','test@gmail.com',2,'','25d55ad283aa400af464c76d713c07ad','2017-04-25 14:35:04','A'),(12345679,'paciente','paciente','paciente@gmail.com',3,NULL,'25d55ad283aa400af464c76d713c07ad','2017-04-25 15:50:40','A'),(22913436,'root','root','root@gmail.com',0,'12345','25d55ad283aa400af464c76d713c07ad','2017-04-23 19:59:42','A');
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-11  4:24:42
