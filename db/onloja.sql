CREATE DATABASE  IF NOT EXISTS `onloja` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `onloja`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: onloja
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `tbaddress`
--

DROP TABLE IF EXISTS `tbaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbaddress` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `streetaddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberaddress` int(10) NOT NULL,
  `cepaddress` int(20) NOT NULL,
  `hoodaddress` varchar(255) NOT NULL,
  `cityaddress` varchar(255) NOT NULL,
  `stateaddress` varchar(255) NOT NULL,
  `countryaddress` varchar(255) NOT NULL,
  PRIMARY KEY (`idaddress`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaddress`
--

LOCK TABLES `tbaddress` WRITE;
/*!40000 ALTER TABLE `tbaddress` DISABLE KEYS */;
INSERT INTO `tbaddress` VALUES (1,'rua tal',12,9998888,'campos','foz do iguaçu','pr','brasil'),(2,'av de tal',111,3333,'porra','cascavel','pr','brasil');
/*!40000 ALTER TABLE `tbaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcat`
--

DROP TABLE IF EXISTS `tbcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcat` (
  `idcat` int(40) NOT NULL AUTO_INCREMENT,
  `namecat` varchar(255) NOT NULL,
  `desccat` varchar(255) NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcat`
--

LOCK TABLES `tbcat` WRITE;
/*!40000 ALTER TABLE `tbcat` DISABLE KEYS */;
INSERT INTO `tbcat` VALUES (8,'Celulares','Computadores portateis'),(14,'Notebooks','Computadores portÃ¡teis');
/*!40000 ALTER TABLE `tbcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcontact`
--

DROP TABLE IF EXISTS `tbcontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `cell` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcontact`
--

LOCK TABLES `tbcontact` WRITE;
/*!40000 ALTER TABLE `tbcontact` DISABLE KEYS */;
INSERT INTO `tbcontact` VALUES (1,'fulano@gmail.com',222222,33333),(2,'cicrano@gmail.com',1111,44444);
/*!40000 ALTER TABLE `tbcontact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproducts`
--

DROP TABLE IF EXISTS `tbproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbproducts` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `activeproduct` tinyint(1) NOT NULL DEFAULT '1',
  `nameproduct` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandproduct` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descproduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceproduct` float NOT NULL,
  `photoproduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registerdateproduct` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catproduct` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduct`),
  KEY `catproduct` (`catproduct`),
  CONSTRAINT `tbproducts_ibfk_1` FOREIGN KEY (`catproduct`) REFERENCES `tbcat` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducts`
--

LOCK TABLES `tbproducts` WRITE;
/*!40000 ALTER TABLE `tbproducts` DISABLE KEYS */;
INSERT INTO `tbproducts` VALUES (24,1,'Samsung S9','Samsung','Galaxy S9 Tela infinita.',2800,'0144e4044193116467f6e5e0fff7ba3b.jpg','2018-11-07 01:20:25',8),(27,1,'fsgs','dsds','dsds',111111,'f7cc24a40ffe5d9fb1a5ff5a9e5729ec.jpg','2018-11-08 01:07:47',8),(28,1,'dasda','asdasd','asdasd',1111,'735d579ad7dcc4ee4e139a4c8ee66247','2018-11-08 01:13:12',8),(29,1,'scsc','sasa','asasa',1111,'918a56772c585ea811ab2c92e54d9b9b','2018-11-08 01:14:11',8),(30,1,'dsd','sdasdas','adsada',21111,'f37344349d887c06a4dd37ee7535472c','2018-11-08 01:21:27',8),(31,1,'css','dasda','adsada',1111,'7c39dd4b88adc618c06192fbfd990a1b','2018-11-08 01:24:43',8),(32,1,'csdcd','cdcsd','csdcsdc',222222,'1c9240ea22b5719a26d6c6fbc02d5e74.png','2018-11-08 01:48:27',14);
/*!40000 ALTER TABLE `tbproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusers`
--

DROP TABLE IF EXISTS `tbusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusers` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `activeuser` tinyint(1) NOT NULL DEFAULT '1',
  `nameuser` varchar(255) DEFAULT NULL,
  `cpfuser` int(11) DEFAULT NULL,
  `dtnascuser` date DEFAULT NULL,
  `sexuser` varchar(50) DEFAULT NULL,
  `loginuser` varchar(10) DEFAULT NULL,
  `passworduser` varchar(255) DEFAULT NULL,
  `isadm` tinyint(1) NOT NULL DEFAULT '0',
  `dtcadastro` date NOT NULL,
  `contactuser` int(11) DEFAULT NULL,
  `addressuser` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `contactuser` (`contactuser`),
  KEY `addressuser` (`addressuser`),
  CONSTRAINT `tbusers_ibfk_1` FOREIGN KEY (`contactuser`) REFERENCES `tbcontact` (`id`),
  CONSTRAINT `tbusers_ibfk_2` FOREIGN KEY (`addressuser`) REFERENCES `tbaddress` (`idaddress`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusers`
--

LOCK TABLES `tbusers` WRITE;
/*!40000 ALTER TABLE `tbusers` DISABLE KEYS */;
INSERT INTO `tbusers` VALUES (5,1,'fulano',333333,'0000-00-00','fem','fulname','admin1234',0,'0000-00-00',1,2,'juniorosorio47@gmail.com');
/*!40000 ALTER TABLE `tbusers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-08  0:02:16
