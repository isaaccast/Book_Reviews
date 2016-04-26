-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: Appointments
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (9,'iphone 5','Isaac Castaneda','2016-04-26 11:09:37','2016-04-26 11:09:37'),(14,'iphone 5','Isaac Castaneda','2016-04-26 11:18:46','2016-04-26 11:18:46'),(15,'Macbook','Isaac Castaneda','2016-04-26 11:20:05','2016-04-26 11:20:05'),(16,'Macbook','Isaac Castaneda','2016-04-26 11:21:35','2016-04-26 11:21:35'),(17,'Macbook','Isaac Castaneda','2016-04-26 11:29:36','2016-04-26 11:29:36'),(18,'Macbook','Isaac Castaneda','2016-04-26 11:29:51','2016-04-26 11:29:51'),(19,'Mac Mini','Amy Castaneda','2016-04-26 11:34:49','2016-04-26 11:34:49'),(20,'Mac Mini','Amy Castaneda','2016-04-26 11:44:59','2016-04-26 11:44:59'),(21,'Mac Mini','Amy Castaneda','2016-04-26 11:47:10','2016-04-26 11:47:10'),(22,'Mac Mini','Amy Castaneda','2016-04-26 11:47:38','2016-04-26 11:47:38'),(23,'Television','Amy Castaneda','2016-04-26 12:00:19','2016-04-26 12:00:19'),(24,'Television','Amy Castaneda','2016-04-26 12:06:06','2016-04-26 12:06:06'),(25,'Mac Mini','Amy Castaneda','2016-04-26 12:08:13','2016-04-26 12:08:13'),(40,'bose speaker','Amy Castaneda','2016-04-26 12:41:21','2016-04-26 12:41:21'),(41,'bose speaker','Amy Castaneda','2016-04-26 12:46:16','2016-04-26 12:46:16'),(42,'bose speaker','Amy Castaneda','2016-04-26 12:47:09','2016-04-26 12:47:09');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_hired` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Isaac Castaneda','isaaccast','5f4dcc3b5aa765d61d8327deb882cf99','2016-04-25 00:00:00','2016-04-26 09:12:43','2016-04-26 09:12:43'),(2,'Amy Castaneda','amycast','5f4dcc3b5aa765d61d8327deb882cf99','2016-04-17 00:00:00','2016-04-26 11:30:17','2016-04-26 11:30:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `fk_users_has_products_products1_idx` (`product_id`),
  KEY `fk_users_has_products_users_idx` (`user_id`),
  CONSTRAINT `fk_users_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (1,14,'2016-04-26 12:08:02','2016-04-26 12:08:02'),(2,14,'2016-04-26 12:41:04','2016-04-26 12:41:04'),(2,25,'2016-04-26 12:08:13','2016-04-26 12:08:13'),(2,40,'2016-04-26 12:41:21','2016-04-26 12:41:21'),(2,41,'2016-04-26 12:46:16','2016-04-26 12:46:16'),(2,42,'2016-04-26 12:47:10','2016-04-26 12:47:10');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-26 12:55:30
