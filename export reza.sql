-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: haloreza
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_heading` varchar(255) NOT NULL,
  `about_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'About Us','We are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\nWe are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\n');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blog_date` datetime DEFAULT NULL,
  `blog_heading` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'2023-03-14 10:43:41','Jangan Ragu untuk Menikah, Ini Janji dan Jaminan Rezeki dari Allah SWT','Pernikahan dapat dimaknai sebagai ikatan lahir dan batin yang dilaksanakan menurut syariat Islam antara seorang laki-laki dan seorang perempuan, untuk hidup bersama dalam satu rumah tangga guna mendapatkan keturunan.','202eba4f142351b909ae3f2d96bb1cf4-blog1.jpg'),(2,'2023-03-14 10:44:16','Sudah Pernah Menikah tapi Belum Pernah Digauli, Bagaimana Statusnya dalam Islam?','Nah, dalam beberapa kasus, ada wanita yang sudah menikah, kemudian cerai namun belum digauli. Atau bisa juga, sudah menikah belum pernah digauli, namun suaminya meninggal','6c0949d4341e44f9e1dab0447f560424-blog2.jpg'),(3,'2023-03-14 10:45:03','Mengapa Banyak Pria yang Sudah Menikah Menganggap Istri Orang Lain Lebih Menarik?','Semua pria cenderung mengagumi dan melihat ke arah istri pria lain tetapi hanya beberapa yang maju dan bertindak atas ketertarikan mereka yang kemudian mengarah pada perselingkuhan dalam pernikahan.','a24cdf55e7d7145a08c67d865f010887-blog3.jpg');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contact_date` datetime DEFAULT NULL,
  `contact_name` varchar(225) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (5,'2023-03-14 12:11:19','Iqbal ','iqbalprasetya665@gmail.com','Menawarkan Kerjasama','Halo saya ingin menawarkan Kerjasama'),(6,'2023-03-14 01:13:51','farel','test@gmail.com','testtt','haloo');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `features_icon` varchar(255) NOT NULL,
  `features_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,'fa-solid fa-address-book','Accommodate Invited Guests'),(2,'fa-solid fa-circle-check','Verified Wedding Organizer'),(4,'fa-solid fa-clock','Always On Time Every Time'),(5,'fa-solid fa-house','Comfortable and Safe Indoor Place'),(6,'fa-solid fa-camera','Broadcast On Multiple Platforms'),(7,'fa-solid fa-shirt','Great Souvenirs and Gifts');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gallery_heading` varchar(255) NOT NULL,
  `gallery_desc` text NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,'Pernikahan Jhon &  Emma','Mar 14 2023','95b66256391cf16df1f716067ed5c885-gallery1.jpg'),(2,'Pernikahan Candler & Mia','Bangku & Meja Tamu Undangan','90b0c15d7053da82f8bf2addb32dbdf8-gallery2.jpg'),(4,'Pernihakan Chris & Rin','Tempat Mengucapkan Janji Suci','42a6599845ab472c68303cb34f6e15d0-gallery3.jpg'),(5,'Pernikahan Finn & Alexa','Bangku Para Tamu','03e65ed528a1063814a1e4453b3238c9-gallery4.jpg'),(6,'Pernikahan Andi & Sinta','Jamuan Tamu','d162b6c93c42dddb860da77f62aaa33c-gallery5.jpg'),(7,'Pernikahan Bagus & Sriayuningsih','Tradisi Pernikahan','7f49ff22466565c4831d329febcc1736-gallery6.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `packages_heading` varchar(255) NOT NULL,
  `packages_price` varchar(255) NOT NULL,
  `packages_list` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'BRONZE PACKAGE','$750','<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>'),(2,'SILVER PACKAGE','$1000','<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>'),(3,'GOLD PACKAGE','$1200','<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `testi_text` text NOT NULL,
  `testi_client` varchar(255) NOT NULL,
  `testi_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
INSERT INTO `testimonial` VALUES (1,'Saya sangat merekomendasikan wedding organizer ini','Chris & Mia','efb57760ce625d44d4e9690d4c4650c4-client1.jpg'),(2,'Saya dan istri saya sangat puas dengan pelayanan nya','Cendler & Mia','32d4dd8e1a66af69773985c4bb64005a-client2.jpg'),(3,'Membantu sekali untuk pernikahan saya','Jhon & Emma','46f7d8f3c33641346da6a4a4e113d90e-client3.jpg');
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'reza','admin','21232f297a57a5a743894a0e4a801fc3');
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

-- Dump completed on 2024-08-19  3:47:37
