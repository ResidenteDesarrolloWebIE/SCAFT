-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: scaftdb
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
-- Table structure for table `aditional_details`
--

DROP TABLE IF EXISTS `aditional_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aditional_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double NOT NULL,
  `offer` bigint unsigned DEFAULT NULL,
  `purchase_order` bigint unsigned DEFAULT NULL,
  `project_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aditional_details_offer_foreign` (`offer`),
  KEY `aditional_details_purchase_order_foreign` (`purchase_order`),
  KEY `aditional_details_project_id_foreign` (`project_id`),
  CONSTRAINT `aditional_details_offer_foreign` FOREIGN KEY (`offer`) REFERENCES `files` (`id`),
  CONSTRAINT `aditional_details_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `aditional_details_purchase_order_foreign` FOREIGN KEY (`purchase_order`) REFERENCES `files` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditional_details`
--

LOCK TABLES `aditional_details` WRITE;
/*!40000 ALTER TABLE `aditional_details` DISABLE KEYS */;
INSERT INTO `aditional_details` VALUES (1,'Mas suministros',10000,2,3,1,'2020-04-17 03:53:41','2020-04-17 03:53:41');
/*!40000 ALTER TABLE `aditional_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_database_syncs`
--

DROP TABLE IF EXISTS `adm_database_syncs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adm_database_syncs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `database` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_database_syncs`
--

LOCK TABLES `adm_database_syncs` WRITE;
/*!40000 ALTER TABLE `adm_database_syncs` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_database_syncs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affiliation_projects`
--

DROP TABLE IF EXISTS `affiliation_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `affiliation_projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned DEFAULT NULL,
  `affiliation_project_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `affiliation_projects_project_id_foreign` (`project_id`),
  KEY `affiliation_projects_affiliation_project_id_foreign` (`affiliation_project_id`),
  CONSTRAINT `affiliation_projects_affiliation_project_id_foreign` FOREIGN KEY (`affiliation_project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `affiliation_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affiliation_projects`
--

LOCK TABLES `affiliation_projects` WRITE;
/*!40000 ALTER TABLE `affiliation_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `affiliation_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agreements`
--

DROP TABLE IF EXISTS `agreements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agreements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `agreement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `minuta_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agreements_minuta_id_foreign` (`minuta_id`),
  CONSTRAINT `agreements_minuta_id_foreign` FOREIGN KEY (`minuta_id`) REFERENCES `minutas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agreements`
--

LOCK TABLES `agreements` WRITE;
/*!40000 ALTER TABLE `agreements` DISABLE KEYS */;
INSERT INTO `agreements` VALUES (1,'Echar las retas de cartas','Israel Gutierrez','REGISTRADO','2020-04-16','2020-04-18',1,NULL,'2020-04-17 03:57:18','2020-04-17 03:57:18');
/*!40000 ALTER TABLE `agreements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coins`
--

DROP TABLE IF EXISTS `coins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coins`
--

LOCK TABLES `coins` WRITE;
/*!40000 ALTER TABLE `coins` DISABLE KEYS */;
INSERT INTO `coins` VALUES (1,'MXN','PESOS',NULL,'2020-04-17 03:48:28','2020-04-17 03:48:28'),(2,'USD','DOLARES',NULL,'2020-04-17 03:48:29','2020-04-17 03:48:29');
/*!40000 ALTER TABLE `coins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`),
  CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Administrador','Administrador','9661006467','administrador@integracion-energia.com',1,NULL,'2020-04-17 03:48:29','2020-04-17 03:48:29'),(2,'ISRAEL GUTIERREZ','GERENTE','9161008840','israel_gutierrez3@hotmail.com',2,NULL,'2020-04-17 03:51:09','2020-04-17 03:51:09');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `economic_advances`
--

DROP TABLE IF EXISTS `economic_advances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `economic_advances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `initial_advance_percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `initial_advance_mount` double(15,6) NOT NULL DEFAULT '0.000000',
  `initial_advance_completed` tinyint NOT NULL DEFAULT '0',
  `engineering_release_payment_percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `engineering_release_payment_mount` double(15,6) NOT NULL DEFAULT '0.000000',
  `engineering_release_payment_completed` tinyint NOT NULL DEFAULT '0',
  `final_payment_percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `final_payment_mount` double(15,6) NOT NULL DEFAULT '0.000000',
  `final_payment_completed` tinyint NOT NULL DEFAULT '0',
  `project_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `economic_advances_project_id_foreign` (`project_id`),
  CONSTRAINT `economic_advances_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `economic_advances`
--

LOCK TABLES `economic_advances` WRITE;
/*!40000 ALTER TABLE `economic_advances` DISABLE KEYS */;
INSERT INTO `economic_advances` VALUES (1,0.00,0.000000,0,0.00,0.000000,0,0.00,0.000000,0,1,NULL,'2020-04-17 03:52:38','2020-04-17 03:52:38');
/*!40000 ALTER TABLE `economic_advances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'105238correcto cambio.pdf','DOCUMENTOS/SUMINISTROS/TB20001/OFERTAS/105238correcto cambio.pdf',NULL,'2020-04-17 03:52:38','2020-04-17 03:52:38'),(2,'105340correcto cambio.pdf','DOCUMENTOS/SUMINISTROS/TB20001/OFERTAS/105340correcto cambio.pdf',NULL,'2020-04-17 03:53:40','2020-04-17 03:53:40'),(3,'105341Comprobante de domicilio.pdf','DOCUMENTOS/SUMINISTROS/TB20001/ORDENES_DE_COMPRA/105341Comprobante de domicilio.pdf',NULL,'2020-04-17 03:53:41','2020-04-17 03:53:41'),(4,'110026genertek-power.png','DOCUMENTOS/SUMINISTROS/TB20001/MINUTA_FIRMADA/110026genertek-power.png',NULL,'2020-04-17 04:00:26','2020-04-17 04:00:26');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `project_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_project_id_foreign` (`project_id`),
  CONSTRAINT `images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_01_21_194308_create_adm_database_syncs_table',1),(5,'2020_02_20_055616_create_roles_table',1),(6,'2020_02_20_055809_create_role_user_table',1),(7,'2020_03_21_012520_create_project_types_table',1),(8,'2020_03_21_012522_create_coins_table',1),(9,'2020_03_21_012525_create_projects_table',1),(10,'2020_03_21_012803_create_economic_advances_table',1),(11,'2020_03_21_012835_create_technical_advances_table',1),(12,'2020_03_21_013022_create_affiliation_projects_table',1),(13,'2020_03_21_013048_create_files_table',1),(14,'2020_03_21_013126_create_images_table',1),(15,'2020_03_23_054405_create_offers_table',1),(16,'2020_03_23_054839_create_minutas_table',1),(17,'2020_03_23_054840_create_agreements_table',1),(18,'2020_03_23_222525_create_contacts_table',1),(19,'2020_03_29_211807_create_purchase_orders_table',1),(20,'2020_04_14_211807_create_aditional_details_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minutas`
--

DROP TABLE IF EXISTS `minutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `minutas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assistants` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint unsigned DEFAULT NULL,
  `file_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `minutas_project_id_foreign` (`project_id`),
  KEY `minutas_file_id_foreign` (`file_id`),
  KEY `minutas_user_id_foreign` (`user_id`),
  CONSTRAINT `minutas_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  CONSTRAINT `minutas_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `minutas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minutas`
--

LOCK TABLES `minutas` WRITE;
/*!40000 ALTER TABLE `minutas` DISABLE KEYS */;
INSERT INTO `minutas` VALUES (1,'M20001','EXTERNA','Nueva Minuta','Nueva reunión','Mi objetivo','{\"nombres\": [\"Israel\",\"Leo\",\"Monica\"],\"dependencias\": [\"IE\",\"EOS\",\"BPC\"]}',1,4,1,NULL,'2020-04-17 03:57:18','2020-04-17 04:00:26');
/*!40000 ALTER TABLE `minutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned DEFAULT NULL,
  `file_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_project_id_foreign` (`project_id`),
  KEY `offers_file_id_foreign` (`file_id`),
  CONSTRAINT `offers_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  CONSTRAINT `offers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,1,1,NULL,'2020-04-17 03:52:39','2020-04-17 03:52:39');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `project_types`
--

DROP TABLE IF EXISTS `project_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_types`
--

LOCK TABLES `project_types` WRITE;
/*!40000 ALTER TABLE `project_types` DISABLE KEYS */;
INSERT INTO `project_types` VALUES (1,'SUMINISTRO',NULL,'2020-04-17 03:48:27','2020-04-17 03:48:27'),(2,'SERVICIO',NULL,'2020-04-17 03:48:27','2020-04-17 03:48:27');
/*!40000 ALTER TABLE `project_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `substation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDIENTE',
  `exchange_rate` double DEFAULT NULL,
  `total_amount` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint unsigned DEFAULT NULL,
  `project_type_id` bigint unsigned DEFAULT NULL,
  `coin_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_customer_id_foreign` (`customer_id`),
  KEY `projects_project_type_id_foreign` (`project_type_id`),
  KEY `projects_coin_id_foreign` (`coin_id`),
  CONSTRAINT `projects_coin_id_foreign` FOREIGN KEY (`coin_id`) REFERENCES `coins` (`id`),
  CONSTRAINT `projects_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  CONSTRAINT `projects_project_type_id_foreign` FOREIGN KEY (`project_type_id`) REFERENCES `project_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'TB20001','Israel Proyecto','Mi subestacion','PENDIENTE',NULL,100000,'Nuevo proyecto',2,1,1,'2020-04-17 03:52:38','2020-04-17 03:52:38',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned DEFAULT NULL,
  `file_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_orders_project_id_foreign` (`project_id`),
  KEY `purchase_orders_file_id_foreign` (`file_id`),
  CONSTRAINT `purchase_orders_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  CONSTRAINT `purchase_orders_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders`
--

LOCK TABLES `purchase_orders` WRITE;
/*!40000 ALTER TABLE `purchase_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2020-04-17 03:48:26','2020-04-17 03:48:26',NULL),(2,11,1,'2020-04-17 03:48:26','2020-04-17 03:48:26',NULL),(3,2,2,'2020-04-17 03:51:09','2020-04-17 03:51:09',NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','Administrador total del sistema','2020-04-17 03:48:22','2020-04-17 03:48:22',NULL),(2,'Cliente','Cliente','2020-04-17 03:48:22','2020-04-17 03:48:22',NULL),(3,'Ofertas','Tecnico de ofertas','2020-04-17 03:48:22','2020-04-17 03:48:22',NULL),(4,'Ventas','Tecnico de Ventas','2020-04-17 03:48:22','2020-04-17 03:48:22',NULL),(5,'Ingenieria','Ingenieria','2020-04-17 03:48:23','2020-04-17 03:48:23',NULL),(6,'Manufactura','Ingeniero de Manufactura','2020-04-17 03:48:23','2020-04-17 03:48:23',NULL),(7,'Servicio','Ingeniero de Servicio','2020-04-17 03:48:23','2020-04-17 03:48:23',NULL),(8,'Almacen','Almacen','2020-04-17 03:48:24','2020-04-17 03:48:24',NULL),(9,'Finanzas','Administrador de finanzas','2020-04-17 03:48:25','2020-04-17 03:48:25',NULL),(10,'Lider','Lider de area','2020-04-17 03:48:25','2020-04-17 03:48:25',NULL),(11,'Consulta','Consultas al sistema','2020-04-17 03:48:25','2020-04-17 03:48:25',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technical_advances`
--

DROP TABLE IF EXISTS `technical_advances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technical_advances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `receive_order` double(8,2) NOT NULL DEFAULT '0.00',
  `engineering_release` double(8,2) NOT NULL DEFAULT '0.00',
  `work_progress` double(8,2) NOT NULL DEFAULT '0.00',
  `delivery_customer` double(8,2) NOT NULL DEFAULT '0.00',
  `project_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `technical_advances_project_id_foreign` (`project_id`),
  CONSTRAINT `technical_advances_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technical_advances`
--

LOCK TABLES `technical_advances` WRITE;
/*!40000 ALTER TABLE `technical_advances` DISABLE KEYS */;
INSERT INTO `technical_advances` VALUES (1,0.00,0.00,0.00,0.00,1,NULL,'2020-04-17 03:52:38','2020-04-17 03:52:38');
/*!40000 ALTER TABLE `technical_advances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','administrador@integracion-energia.com','$2y$10$Bll1QG9GBdZXr7J9LH8ir.oCtwjokQxaNSewfRZi5WRYNweFA9aS2',NULL,NULL,NULL,'2020-04-17 03:48:25','2020-04-17 03:48:25',NULL),(2,'ISRAEL GUTIERREZ','israel_gutierrez3@hotmail.com','$2y$10$AeCAZ0OXslKKgXRe25tRNOiNT.pa2w5fNp1IIXPsYQPUJO7hyIjYu','C0001',NULL,NULL,'2020-04-17 03:51:09','2020-04-17 03:51:09',NULL);
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

-- Dump completed on 2020-04-17 17:40:55
