-- MySQL dump 10.13  Distrib 5.6.41, for Win32 (AMD64)
--
-- Host: localhost    Database: ltest
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Картошка',NULL,NULL,1),(2,'Лук',NULL,NULL,1),(3,'Помидор',NULL,NULL,1),(4,'Колбасса',NULL,NULL,1),(5,'Огурец',NULL,NULL,1),(14,'lop','2019-12-13 22:09:21','2019-12-13 22:09:21',2),(15,'Сметана','2019-12-13 22:21:09','2019-12-13 22:21:09',2),(16,'aSDZXCV','2019-12-13 22:22:36','2019-12-13 22:22:36',2),(17,'лук','2019-12-13 23:33:32','2019-12-13 23:33:32',2),(18,'картошка','2019-12-13 23:33:37','2019-12-13 23:33:37',2),(19,'сахар','2019-12-13 23:33:43','2019-12-13 23:33:43',2),(20,'Лук','2019-12-14 00:05:16','2019-12-14 00:05:16',3);
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_12_12_022801_create_recipes_table',1),(4,'2019_12_12_022826_create_ingredients_table',1),(5,'2019_12_12_022908_create_recipe_ingredient_table',1),(6,'2019_12_12_022935_create_user_recipe_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_ingredient`
--

DROP TABLE IF EXISTS `recipe_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_ingredient` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` bigint(20) unsigned DEFAULT NULL,
  `ingredient_id` bigint(20) unsigned DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_ingredient_recipe_id_foreign` (`recipe_id`),
  KEY `recipe_ingredient_ingredient_id_foreign` (`ingredient_id`),
  CONSTRAINT `recipe_ingredient_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`),
  CONSTRAINT `recipe_ingredient_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_ingredient`
--

LOCK TABLES `recipe_ingredient` WRITE;
/*!40000 ALTER TABLE `recipe_ingredient` DISABLE KEYS */;
INSERT INTO `recipe_ingredient` VALUES (74,116,14,'200',NULL,NULL),(75,116,15,'kg',NULL,NULL),(76,117,16,'800',NULL,NULL),(77,117,14,'906',NULL,NULL),(78,117,14,'3gr',NULL,NULL),(79,118,15,'200 гр',NULL,NULL),(80,118,17,'3 репки',NULL,NULL),(81,118,18,'5кг',NULL,NULL),(82,118,19,'1 мешок',NULL,NULL),(83,119,1,'200гр',NULL,NULL),(84,119,2,'111',NULL,NULL),(85,119,3,'kg',NULL,NULL),(86,120,1,'мешок',NULL,NULL),(87,120,5,'2кг',NULL,NULL),(88,120,5,'опять огурец 1',NULL,NULL);
/*!40000 ALTER TABLE `recipe_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'Шарлотка','Вкусняшка',NULL,NULL),(2,'Борщ','Красиво',NULL,NULL),(3,'Холодец','холодный',NULL,NULL),(116,'щту','one','2019-12-13 22:22:25','2019-12-13 22:22:25'),(117,'two','zxfvg sdfg sdf g','2019-12-13 22:23:05','2019-12-13 22:23:05'),(118,'Борщ','фылво ашыфов а шоф ыщвшаощшф ывоащш фоывщш аофыщшв оащшфыо вщшаофы щшваофщшыоащшфыо ащшфоы вашщофы а','2019-12-13 23:34:40','2019-12-13 23:34:40'),(119,'Pasta','zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz','2019-12-14 00:08:50','2019-12-14 00:08:50'),(120,'Медуза','ооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооооо','2019-12-14 00:09:43','2019-12-14 00:09:43');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_recipe`
--

DROP TABLE IF EXISTS `user_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_recipe` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `recipe_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_recipe_user_id_foreign` (`user_id`),
  KEY `user_recipe_recipe_id_foreign` (`recipe_id`),
  CONSTRAINT `user_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  CONSTRAINT `user_recipe_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_recipe`
--

LOCK TABLES `user_recipe` WRITE;
/*!40000 ALTER TABLE `user_recipe` DISABLE KEYS */;
INSERT INTO `user_recipe` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(82,2,116,NULL,NULL),(83,2,117,NULL,NULL),(84,2,118,NULL,NULL),(85,1,119,NULL,NULL),(86,1,120,NULL,NULL);
/*!40000 ALTER TABLE `user_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'a','a@a.aa',NULL,'$2y$10$GJqwrilv9AZEmtC6vc5sd.0vK/8sB1AFytdjunGn/JQAC8TmOstVq','Z0YJ6YaMpHp2YDQ2vVoM8SaJWSqApnY68FlB18lCOObCEltVNHtKenREoJ11','2019-12-12 01:03:21','2019-12-12 01:03:21'),(2,'b','b@b.bb',NULL,'$2y$10$.gAuG3x7eSDhm8eyPi9NgeZdja5nNxdVfTxKDgvxG1xaaKV.f3Ywm',NULL,'2019-12-12 21:35:12','2019-12-12 21:35:12'),(3,'c','c@c.cc',NULL,'$2y$10$6efz6rSVtMSgCCHeJczcWOYZPWWjHxZ9CWWXBCWa8giQyPzpCyjwG',NULL,'2019-12-13 08:39:10','2019-12-13 08:39:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-14 11:07:07
