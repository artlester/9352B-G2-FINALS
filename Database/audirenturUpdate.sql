-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: audirentur
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(64) NOT NULL,
  `admin_password` varchar(120) NOT NULL,
  `admin_last_name` varchar(35) NOT NULL,
  `admin_first_name` varchar(35) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorysound`
--

DROP TABLE IF EXISTS `categorysound`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorysound` (
  `sound_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`sound_id`,`category_id`),
  KEY `category_idx` (`category_id`),
  CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
  CONSTRAINT `sound` FOREIGN KEY (`sound_id`) REFERENCES `sounds` (`sound_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorysound`
--

LOCK TABLES `categorysound` WRITE;
/*!40000 ALTER TABLE `categorysound` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorysound` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_username` varchar(45) NOT NULL,
  `cust_password` varchar(45) NOT NULL,
  `cust_last_name` varchar(45) NOT NULL,
  `cust_first_name` varchar(45) NOT NULL,
  `cust_gender` enum('Male','Female') NOT NULL,
  `cust_email` varchar(45) NOT NULL,
  `cust_contact_number` varchar(15) NOT NULL,
  `cust_avatar` longblob,
  `cust_bio` varchar(125) DEFAULT NULL,
  `cust_create_date` datetime NOT NULL,
  `acc_status` enum('pending','accepted','denied','disabled') NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`),
  UNIQUE KEY `cust_username_UNIQUE` (`cust_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `sound_id` int(11) NOT NULL,
  `status` enum('pending','renting','rented','cancelled') NOT NULL,
  PRIMARY KEY (`rental_id`),
  KEY `vendor_idx` (`vendor_id`),
  KEY `customer_idx` (`customer_id`),
  KEY `sounds_idx` (`sound_id`),
  CONSTRAINT `customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `sounds` FOREIGN KEY (`sound_id`) REFERENCES `sounds` (`sound_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sounds`
--

DROP TABLE IF EXISTS `sounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sounds` (
  `sound_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `duration` int(11) NOT NULL,
  `date_availability` datetime NOT NULL,
  `status` enum('available','unavailable','rented') NOT NULL,
  `product_image` longblob,
  PRIMARY KEY (`sound_id`),
  KEY `vendor_id_idx` (`vendor_id`),
  CONSTRAINT `vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sounds`
--

LOCK TABLES `sounds` WRITE;
/*!40000 ALTER TABLE `sounds` DISABLE KEYS */;
/*!40000 ALTER TABLE `sounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `ven_username` varchar(45) NOT NULL,
  `ven_password` varchar(45) NOT NULL,
  `ven_last_name` varchar(45) NOT NULL,
  `ven_first_name` varchar(45) NOT NULL,
  `ven_gender` enum('Male','Female') NOT NULL,
  `ven_email` varchar(45) NOT NULL,
  `ven_contact_number` varchar(15) NOT NULL,
  `ven_avatar` longblob,
  `ven_bio` varchar(125) DEFAULT NULL,
  `ven_create_date` datetime NOT NULL,
  `acc_status` enum('pending','accepted','denied','disabled') NOT NULL,
  PRIMARY KEY (`vendor_id`),
  UNIQUE KEY `ven_username_UNIQUE` (`ven_username`),
  UNIQUE KEY `ven_email_UNIQUE` (`ven_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29 18:16:27
