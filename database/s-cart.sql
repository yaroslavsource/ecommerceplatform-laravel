-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: s-cart
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

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
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'Index','fa-bar-chart','/',NULL,NULL,NULL),(2,0,2,'admin','fa-tasks','',NULL,NULL,NULL),(3,2,3,'users','fa-users','auth/users',NULL,NULL,NULL),(4,2,4,'roles','fa-user','auth/roles',NULL,NULL,NULL),(5,2,5,'permission','fa-ban','auth/permissions',NULL,NULL,NULL),(6,2,6,'menu','fa-bars','auth/menu',NULL,NULL,NULL),(7,2,7,'operation_log','fa-history','auth/logs',NULL,NULL,NULL),(8,31,23,'customer_manager','fa-user-md','shop_customer',NULL,NULL,NULL),(9,25,18,'orders_manager','fa-shopping-cart','shop_order',NULL,NULL,NULL),(10,15,11,'all_products','fa-file-photo-o','shop_product',NULL,NULL,NULL),(11,15,13,'brands','fa-bank','shop_brand',NULL,NULL,NULL),(13,15,10,'categories','fa-folder-open-o','shop_category',NULL,NULL,NULL),(14,15,12,'special_price','fa-paw','special_price',NULL,NULL,NULL),(15,0,9,'product_mamager','fa-folder-open','',NULL,NULL,NULL),(18,23,43,'config_info','fa-cog','config_info',NULL,NULL,NULL),(22,0,8,'pages','fa-clone','shop_page',NULL,NULL,NULL),(23,0,42,'settings','fa-cogs','',NULL,NULL,NULL),(24,62,38,'banners_manager','fa-simplybuilt','banner',NULL,NULL,NULL),(25,0,17,'order_manager','fa-cart-arrow-down','',NULL,NULL,NULL),(26,25,19,'order_status','fa-asterisk','shop_order_status',NULL,NULL,NULL),(27,25,20,'payment_status','fa-recycle','shop_payment_status',NULL,NULL,NULL),(28,25,21,'shipping_status','fa-ambulance','shop_shipping_status',NULL,NULL,NULL),(30,0,25,'extensions','fa-puzzle-piece','',NULL,NULL,NULL),(31,0,22,'customer_manager','fa-group','',NULL,NULL,NULL),(51,23,44,'config_global','fa-cogs','config_global',NULL,NULL,NULL),(52,56,49,'config_language','fa-pagelines','language',NULL,NULL,NULL),(53,101,34,'design_layout','fa-newspaper-o','layout',NULL,NULL,NULL),(56,23,48,'localisation','fa-shirtsinbulk','',NULL,NULL,NULL),(57,15,14,'vendor','fa-user-secret','shop_vendor',NULL,NULL,NULL),(58,0,52,'report_analytics','fa-pie-chart','',NULL,NULL,NULL),(59,58,53,'customer_report','fa-bars','shop_report/customer',NULL,NULL,NULL),(60,58,54,'product_report','fa-bars','shop_report/product',NULL,NULL,NULL),(61,15,15,'import_product','fa-save','shop_process/productImport',NULL,NULL,NULL),(62,0,37,'file_manager','fa-image','',NULL,NULL,NULL),(63,62,39,'images_manager','fa-file-image-o','documents',NULL,NULL,NULL),(64,56,50,'currencies','fa-dollar','currencies',NULL,NULL,NULL),(65,0,40,'api_manager','fa-plug','',NULL,NULL,NULL),(66,65,41,'shop_api','fa-usb','modules/api/shop_api',NULL,NULL,NULL),(70,15,16,'attributes_group','fa-bars','shop_attribute_group',NULL,NULL,NULL),(71,30,26,'payment','fa-money','extensions/payment',NULL,NULL,NULL),(72,30,27,'shipping','fa-ambulance','extensions/shipping',NULL,NULL,NULL),(73,30,28,'total','fa-cog','extensions/total',NULL,NULL,NULL),(74,30,29,'other_extension','fa-circle-thin','extensions/other',NULL,NULL,NULL),(75,0,30,'modules','fa-codepen','',NULL,NULL,NULL),(76,75,31,'cms','fa-modx','modules/cms',NULL,NULL,NULL),(81,101,36,'templates_manager','fa-columns','config_template',NULL,NULL,NULL),(82,23,51,'backup_restore','fa-save','backup_database',NULL,NULL,NULL),(83,21,34,'subscribe_manager','fa-user-md','subscribe',NULL,NULL,NULL),(101,0,33,'template_layout','fa-object-ungroup','',NULL,NULL,NULL),(102,75,32,'other_module','fa-bars','modules/other',NULL,NULL,NULL),(105,101,35,'url','fa-chrome','layout_url',NULL,NULL,NULL),(108,23,45,'email_setting','fa-envelope','',NULL,NULL,NULL),(109,108,46,'email_config','fa-gear','email_config',NULL,NULL,NULL),(110,108,47,'email_template','fa-bars','email_template',NULL,NULL,NULL),(111,0,55,'Helpers','fa-gears','',NULL,NULL,NULL),(112,111,56,'Scaffold','fa-keyboard-o','helpers/scaffold',NULL,NULL,NULL),(113,111,57,'Database terminal','fa-database','helpers/terminal/database',NULL,NULL,NULL),(114,111,58,'Laravel artisan','fa-terminal','helpers/terminal/artisan',NULL,NULL,NULL),(115,111,59,'Routes','fa-list-alt','helpers/routes',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_operation_log`
--

DROP TABLE IF EXISTS `admin_operation_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_operation_log`
--

LOCK TABLES `admin_operation_log` WRITE;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
INSERT INTO `admin_operation_log` VALUES (1,1,'system_admin','GET','127.0.0.1','[]','2019-08-13 14:43:50','2019-08-13 14:43:50'),(2,1,'system_admin/backup_database','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-08-13 14:44:03','2019-08-13 14:44:03'),(3,1,'system_admin/backup','POST','127.0.0.1','{\"_token\":\"vmE33yHmvnV5P9VEpAt8tStqFAh7KUPFNciUNSXn\"}','2019-08-13 14:44:05','2019-08-13 14:44:05');
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT,DELETE','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'System manager','system.mamanger','','/config_info*\r\n/config_global*\r\n/language*\r\n/currencies*\r\n/backup_database*',NULL,NULL),(7,'API manager','api.manager','','/modules/api/*',NULL,NULL),(8,'Template & Layout','template.layout','','/layout*\r\n/config_template*',NULL,NULL),(9,'Email setting','email.setting','','/email_*',NULL,NULL),(10,'View all','view.all','GET','*',NULL,NULL),(11,'CMS manager','cms.manager','','/modules/cms/*\r\n/shop_page*',NULL,NULL),(12,'Product manager','product.manager','','/shop_category*\r\n/shop_product*\r\n/shop_special_price*\r\n/shop_brand*\r\n/shop_vendor*\r\n/shop_attribute_group*\r\n/shop_process*',NULL,NULL),(13,'Admin helpers','ext.helpers','','/helpers/*',NULL,NULL),(14,'Report shop','report.shop','GET','/shop_report/*',NULL,NULL),(15,'File manager','file.manager','','/banner/*\r\n/documents/*',NULL,NULL),(16,'Order Manager','order.manager','','/shop_order*\r\n/shop_payment_status*\r\n/shop_shipping_status*',NULL,NULL),(17,'Customer manager','customer.manager','','/shop_customer*\r\n/subscribe*',NULL,NULL),(18,'Extensions Manager','extensions.manager','','/extensions*',NULL,NULL),(19,'User manager','user.manager','','/auth/users*',NULL,NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_permissions`
--

DROP TABLE IF EXISTS `admin_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(4,4,NULL,NULL),(4,3,NULL,NULL),(3,10,NULL,NULL),(2,6,NULL,NULL),(2,7,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL),(2,11,NULL,NULL),(2,12,NULL,NULL),(2,13,NULL,NULL),(2,14,NULL,NULL),(2,15,NULL,NULL),(2,16,NULL,NULL),(2,17,NULL,NULL),(2,18,NULL,NULL),(2,19,NULL,NULL),(4,11,NULL,NULL),(5,2,NULL,NULL),(5,3,NULL,NULL),(5,12,NULL,NULL),(5,14,NULL,NULL),(5,16,NULL,NULL),(5,17,NULL,NULL),(6,2,NULL,NULL),(6,3,NULL,NULL),(6,4,NULL,NULL),(6,8,NULL,NULL),(6,9,NULL,NULL),(6,11,NULL,NULL),(6,12,NULL,NULL),(6,14,NULL,NULL),(6,15,NULL,NULL),(6,16,NULL,NULL),(6,17,NULL,NULL),(4,15,NULL,NULL),(5,15,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_users`
--

DROP TABLE IF EXISTS `admin_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator',NULL,NULL),(2,'Admin','admin',NULL,NULL),(3,'Group only View','views',NULL,NULL),(4,'Cms manager','cms',NULL,NULL),(5,'Sales','sale',NULL,NULL),(6,'Marketing','maketing',NULL,NULL);
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user_permissions`
--

DROP TABLE IF EXISTS `admin_user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$JcmAHe5eUZ2rS0jU1GWr/.xhwCnh2RU13qwjTPcqfmtZXjZxcryPO','Administrator','images/user2-160x160.jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `click` tinyint(4) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'banner/6122cfae7fdb5fff1a4e7406dcab10ef.jpg',NULL,'<h1>S-CART</h1><h2>Free E-Commerce Template</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p><button type=\"button\" class=\"btn btn-default get\">Get it now</button>',1,0,0,1,NULL,NULL);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `detail` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `config_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'','config','shop_allow_guest','1',11,'language.admin.shop_allow_guest'),(2,'','config','product_preorder','1',18,'language.admin.product_preorder'),(3,'','config','product_display_out_of_stock','1',19,'language.admin.product_display_out_of_stock'),(4,'','config','product_buy_out_of_stock','1',20,'language.admin.product_buy_out_of_stock'),(5,'','config','show_date_available','1',21,'language.admin.show_date_available'),(6,'','config','site_ssl','0',0,'language.admin.enable_https'),(7,'','config','watermark','1',0,'language.admin.enable_watermark'),(8,'','config','site_status','1',100,'language.admin.site_status'),(9,'','config','show_product_of_category_children','1',21,'language.admin.show_product_of_category_children'),(10,'','config','admin_log','1',20,'language.admin.admin_log'),(11,'','display','product_hot','6',0,'language.admin.hot_product'),(12,'','display','product_new','6',0,'languagelanguage.admin.new_product'),(13,'','display','product_list','18',0,'language.admin.list_product'),(14,'','display','product_relation','4',0,'language.admin.relation_product'),(15,'','display','product_viewed','4',0,'language.admin.viewed_product'),(16,'','display','item_list','12',0,'language.admin.item_list'),(17,'','email_action','email_action_mode','0',0,'language.admin.email_action.email_action_mode'),(18,'','email_action','order_success_to_admin','0',1,'language.admin.email_action.order_success_to_admin'),(19,'','email_action','order_success_to_customer','0',2,'language.admin.email_action.order_success_to_cutomer'),(20,'','email_action','forgot_password','0',3,'language.admin.email_action.forgot_password'),(21,'','email_action','welcome_customer','0',4,'language.admin.email_action.welcome_customer'),(22,'','email_action','contact_to_admin','0',6,'language.admin.email_action.contact_to_admin'),(23,'','email_action','email_action_smtp_mode','0',6,'language.admin.email_action.email_action_smtp_mode'),(24,'Modules','Other','LastViewProduct','1',0,'Modules/Other/LastViewProduct.title'),(25,'Extensions','Payment','Cash','1',0,'Extensions/Payment/Cash.title'),(26,'Extensions','Shipping','ShippingStandard','1',0,'Shipping Standard'),(27,'','smtp','smtp_host','',8,'language.admin.smtp_host'),(28,'','smtp','smtp_user','',7,'language.admin.smtp_user'),(29,'','smtp','smtp_password','',6,'language.admin.smtp_password'),(30,'','smtp','smtp_security','',5,'language.admin.smtp_security'),(31,'','smtp','smtp_port','',4,'language.admin.smtp_port'),(32,'Extensions','Total','Discount','1',0,'Extensions/Total/Discount.title');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_global`
--

DROP TABLE IF EXISTS `config_global`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_global` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintain_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_global`
--

LOCK TABLES `config_global` WRITE;
/*!40000 ALTER TABLE `config_global` DISABLE KEYS */;
INSERT INTO `config_global` VALUES (1,'images/scart-mid.png','images/watermark.png','default','0123456789','Support: 0987654321','admin@gmail.com','','123st - abc - xyz','en','Asia/Ho_Chi_Minh','<center><img src=\"/images/maintenance.png\" />\r\n<h3><span style=\"color:#e74c3c;\"><strong>Sorry! We are currently doing site maintenance!</strong></span></h3>\r\n</center>','USD');
/*!40000 ALTER TABLE `config_global` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_global_description`
--

DROP TABLE IF EXISTS `config_global_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_global_description` (
  `config_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `config_global_description_config_id_lang_id_unique` (`config_id`,`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_global_description`
--

LOCK TABLES `config_global_description` WRITE;
/*!40000 ALTER TABLE `config_global_description` DISABLE KEYS */;
INSERT INTO `config_global_description` VALUES (1,1,'Demo S-cart: Free open source - eCommerce Platform for Business','Free website shopping cart for business',''),(1,2,'Demo S-cart: xây dựng website bán hàng miễn phí cho doanh nghiệp','Free website shopping cart for business','');
/*!40000 ALTER TABLE `config_global_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_template`
--

LOCK TABLES `email_template` WRITE;
/*!40000 ALTER TABLE `email_template` DISABLE KEYS */;
INSERT INTO `email_template` VALUES (1,'Reset password','forgot_password','<h1 style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left\">{{$title}}</h1>\r\n<p style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left\">{{$text1}}</p>\r\n                    <table class=\"action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:30px auto;padding:0;text-align:center;width:100%\">\r\n                      <tbody><tr>\r\n                        <td align=\"center\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                          <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                            <tbody><tr>\r\n                              <td align=\"center\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                                  <tbody><tr>\r\n                                    <td style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                                      <a href=\"{{$reset_link}}\" class=\"button button-primary\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3097d1;border-top:10px solid #3097d1;border-right:18px solid #3097d1;border-bottom:10px solid #3097d1;border-left:18px solid #3097d1\" target=\"_blank\">{{$reset_button}}</a>\r\n                                    </td>\r\n                                  </tr>\r\n                                </tbody>\r\n                              </table>\r\n                              </td>\r\n                            </tr>\r\n                          </tbody>\r\n                        </table>\r\n                        </td>\r\n                      </tr>\r\n                    </tbody>\r\n                  </table>\r\n                    <p style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left\">\r\n                      {{$text2}}\r\n                    </p>\r\n                    <table class=\"subcopy\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-top:1px solid #edeff2;margin-top:25px;padding-top:25px\">\r\n                    <tbody><tr>\r\n                      <td style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box\">\r\n                        <p style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;line-height:1.5em;margin-top:0;text-align:left;font-size:12px\">{{$text3}}: <a href=\"{{$reset_link}}\" style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#3869d4\" target=\"_blank\">{{$reset_link}}</a></p>\r\n                          </td>\r\n                        </tr>\r\n                      </tbody>\r\n                    </table>',1),(2,'Welcome new customer','welcome_customer','<h1 style=\"font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:center\">{{$title}}</h1>\r\n<p style=\"text-align:center;\">Welcome to my site!</p>',1),(3,'Send form contact to admin','contact_to_admin','<table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tr>\r\n        <td>\r\n            <b>Name</b>: {{$name}}<br>\r\n            <b>Email</b>: {{$email}}<br>\r\n            <b>Phone</b>: {{$phone}}<br>\r\n        </td>\r\n    </tr>\r\n</table>\r\n<hr>\r\n<p style=\"text-align: center;\">Content:<br>\r\n<table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\r\n    <tr>\r\n        <td>{{$content}}</td>\r\n    </tr>\r\n</table>',1),(4,'New order to admin','order_success_to_admin','<table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                            <td>\r\n                                <b>Order ID</b>: {{$orderID}}<br>\r\n                                <b>Customer name</b>: {{$toname}}<br>\r\n                                <b>Email</b>: {{$email}}<br>\r\n                                <b>Address</b>: {{$address}}<br>\r\n                                <b>Phone</b>: {{$phone}}<br>\r\n                                <b>Order note</b>: {{$comment}}\r\n                            </td>\r\n                        </tr>\r\n                    </table>\r\n                    <hr>\r\n                    <p style=\"text-align: center;\">Order detail:<br>\r\n                    ===================================<br></p>\r\n                    <table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">\r\n                        {{$orderDetail}}\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Sub total</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$subtotal}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Shipping fee</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$shipping}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Discount</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$discount}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Total</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$total}}</td>\r\n                        </tr>\r\n                    </table>',1),(5,'New order to customr','order_success_to_customer','<table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                            <td>\r\n                                <b>Order ID</b>: {{$orderID}}<br>\r\n                                <b>Customer name</b>: {{$toname}}<br>\r\n                                <b>Address</b>: {{$address}}<br>\r\n                                <b>Phone</b>: {{$phone}}<br>\r\n                                <b>Order note</b>: {{$comment}}\r\n                            </td>\r\n                        </tr>\r\n                    </table>\r\n                    <hr>\r\n                    <p style=\"text-align: center;\">Order detail:<br>\r\n                    ===================================<br></p>\r\n                    <table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">\r\n                        {{$orderDetail}}\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Sub total</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$subtotal}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Shipping fee</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$shipping}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Discount</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$discount}}</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td colspan=\"2\"></td>\r\n                            <td colspan=\"2\" style=\"font-weight: bold;\">Total</td>\r\n                            <td colspan=\"2\" align=\"right\">{{$total}}</td>\r\n                        </tr>\r\n                    </table>',1);
/*!40000 ALTER TABLE `email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'English','en','language/flag_uk.png',1,1),(2,'Tiếng Việt','vi','language/flag_vn.png',1,1);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout`
--

LOCK TABLES `layout` WRITE;
/*!40000 ALTER TABLE `layout` DISABLE KEYS */;
INSERT INTO `layout` VALUES (1,'Facebook code','top','','html','<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \'//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=934208239994473\';\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));\r\n</script>',1,0),(2,'Google Analytics','header','','html','<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-128658138-1\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n  gtag(\'config\', \'UA-128658138-1\');\r\n</script>',1,0),(3,'Product special','left','home,product_list','view','product_special',1,1),(4,'Brands','left','home,item_list','view','brands_left',1,3),(5,'Banner home','banner_top','home','view','banner_image',1,0),(6,'Categories','left','home,product_list,product_detail,shop_wishlist','view','categories',1,4),(7,'Product last view','left','','module','\\App\\Modules\\Other\\Controllers\\LastViewProduct',1,0);
/*!40000 ALTER TABLE `layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_page`
--

DROP TABLE IF EXISTS `layout_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniquekey` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layout_page_uniquekey_unique` (`uniquekey`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_page`
--

LOCK TABLES `layout_page` WRITE;
/*!40000 ALTER TABLE `layout_page` DISABLE KEYS */;
INSERT INTO `layout_page` VALUES (1,'home','Home page'),(2,'product_list','Product list'),(3,'product_detail','Product detail'),(4,'shop_cart','Shop cart'),(5,'shop_account','Account'),(6,'shop_profile','Profile'),(7,'shop_compare','Compare page'),(8,'shop_wishlist','Wishlist page'),(9,'item_list','Item list');
/*!40000 ALTER TABLE `layout_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_position`
--

DROP TABLE IF EXISTS `layout_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniquekey` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layout_position_uniquekey_unique` (`uniquekey`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_position`
--

LOCK TABLES `layout_position` WRITE;
/*!40000 ALTER TABLE `layout_position` DISABLE KEYS */;
INSERT INTO `layout_position` VALUES (1,'meta','Meta'),(2,'header','Header'),(3,'top','Top'),(4,'bottom','Bottom'),(5,'footer','Footer'),(6,'left','Column left'),(7,'right','Column right'),(8,'banner_top','Banner top');
/*!40000 ALTER TABLE `layout_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_type`
--

DROP TABLE IF EXISTS `layout_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniquekey` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layout_type_uniquekey_unique` (`uniquekey`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_type`
--

LOCK TABLES `layout_type` WRITE;
/*!40000 ALTER TABLE `layout_type` DISABLE KEYS */;
INSERT INTO `layout_type` VALUES (1,'html','Html'),(2,'view','View'),(3,'module','Module');
/*!40000 ALTER TABLE `layout_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_url`
--

DROP TABLE IF EXISTS `layout_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_url` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_url`
--

LOCK TABLES `layout_url` WRITE;
/*!40000 ALTER TABLE `layout_url` DISABLE KEYS */;
INSERT INTO `layout_url` VALUES (1,'language.contact','/contact.html','_self','menu','',1,3),(2,'language.about','/about.html','_self','menu','',1,4),(3,'S-Cart','https://s-cart.org','_blank','menu','',1,0),(4,'language.my_profile','/member/login.html','_self','footer','',1,5),(5,'language.compare_page','/compare.html','_self','footer','',1,4),(6,'language.wishlist_page','/wishlist.html','_self','footer','',1,3);
/*!40000 ALTER TABLE `layout_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_05_25_v3_create_admin_tables',1),(2,'2019_05_25_v3_insert_data_scart',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
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
-- Table structure for table `shipping_standard`
--

DROP TABLE IF EXISTS `shipping_standard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_standard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fee` int(11) NOT NULL,
  `shipping_free` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_standard`
--

LOCK TABLES `shipping_standard` WRITE;
/*!40000 ALTER TABLE `shipping_standard` DISABLE KEYS */;
INSERT INTO `shipping_standard` VALUES (1,20000,100000);
/*!40000 ALTER TABLE `shipping_standard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_api`
--

DROP TABLE IF EXISTS `shop_api`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden_default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_api_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_api`
--

LOCK TABLES `shop_api` WRITE;
/*!40000 ALTER TABLE `shop_api` DISABLE KEYS */;
INSERT INTO `shop_api` VALUES (1,'api_product_list','','secret'),(2,'api_product_detail','cost,sold,stock,sort','private'),(3,'api_order_list','','public'),(4,'api_order_detail','','secret');
/*!40000 ALTER TABLE `shop_api` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_api_process`
--

DROP TABLE IF EXISTS `shop_api_process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_api_process` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_id` int(11) NOT NULL,
  `secret_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden_fileds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_allow` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_deny` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_api_process_secret_key_unique` (`secret_key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_api_process`
--

LOCK TABLES `shop_api_process` WRITE;
/*!40000 ALTER TABLE `shop_api_process` DISABLE KEYS */;
INSERT INTO `shop_api_process` VALUES (1,1,'!CVCBsd$6j9ds3%flh[^d','descriptions,cost','','127.0.0.11,1233.2.2.3','2019-12-14 00:00:00',1,NULL,NULL),(2,1,'%GSFf13gkLtP@d','','','',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `shop_api_process` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_attribute_detail`
--

DROP TABLE IF EXISTS `shop_attribute_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_attribute_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_attribute_detail`
--

LOCK TABLES `shop_attribute_detail` WRITE;
/*!40000 ALTER TABLE `shop_attribute_detail` DISABLE KEYS */;
INSERT INTO `shop_attribute_detail` VALUES (1,'Blue',1,16,0),(2,'White',1,16,0),(3,'S',2,16,0),(4,'XL',2,16,0),(5,'Blue',1,15,0),(6,'Red',1,15,0),(7,'S',2,15,0),(8,'M',2,15,0);
/*!40000 ALTER TABLE `shop_attribute_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_attribute_group`
--

DROP TABLE IF EXISTS `shop_attribute_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_attribute_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_attribute_group`
--

LOCK TABLES `shop_attribute_group` WRITE;
/*!40000 ALTER TABLE `shop_attribute_group` DISABLE KEYS */;
INSERT INTO `shop_attribute_group` VALUES (1,'Color',1,1,'radio'),(2,'Size',1,2,'select');
/*!40000 ALTER TABLE `shop_attribute_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_brand`
--

DROP TABLE IF EXISTS `shop_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_brand`
--

LOCK TABLES `shop_brand` WRITE;
/*!40000 ALTER TABLE `shop_brand` DISABLE KEYS */;
INSERT INTO `shop_brand` VALUES (1,'Husq','brand/1ca28f797c0f2edb635c4b51c2e7e952.png','',1,0),(2,'Ideal','brand/0a778de7e1e2f2a0635d6a1727e3de8d.png','',1,0),(3,'Apex','brand/d3abfcfc8c0fef7e1356fc637ab9d8d8.png','',1,0),(4,'CST','brand/185c50c85b83644e02e8b96639370341.png','',1,0),(5,'Klein','brand/3e11cc022e9f30774ab5f6a0c6c36451.png','',1,0),(6,'Metabo','brand/7868b0924b8f115aef70292aea1a67b8.png','',1,0);
/*!40000 ALTER TABLE `shop_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `top` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (1,'',0,1,1,0),(2,'',0,1,1,0),(3,'',0,1,1,0),(4,'',0,1,1,0),(5,'',0,1,1,0),(6,'',9,0,1,0),(7,'',4,0,1,0),(8,'',4,0,1,0),(9,'',0,1,1,0),(10,'',2,0,1,0),(11,'',1,0,1,0),(12,'',1,0,1,3);
/*!40000 ALTER TABLE `shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_category_description`
--

DROP TABLE IF EXISTS `shop_category_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category_description` (
  `shop_category_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `shop_category_description_shop_category_id_lang_id_unique` (`shop_category_id`,`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category_description`
--

LOCK TABLES `shop_category_description` WRITE;
/*!40000 ALTER TABLE `shop_category_description` DISABLE KEYS */;
INSERT INTO `shop_category_description` VALUES (1,1,'SPORTSWEAR','',''),(1,2,'Mục SPORTSWEAR','',''),(2,1,'MENS','',''),(2,2,'Mục MENS','',''),(3,1,'WOMENS','',''),(3,2,'Mục WOMENS','',''),(4,1,'KIDS','',''),(4,2,'Mục KIDS','',''),(5,1,'FASHION','',''),(5,2,'Mục FASHION','',''),(6,1,'GUESS','',''),(6,2,'Mục GUESS','',''),(7,1,'PUMA','',''),(7,2,'Mục PUMA','',''),(8,1,'ASICS','',''),(8,2,'Mục ASICS','',''),(9,1,'HOUSEHOLDS','',''),(9,2,'Mục HOUSEHOLDS','',''),(10,1,'VALENTINO','',''),(10,2,'Mục VALENTINO','',''),(11,1,'DIOR','',''),(11,2,'Mục DIOR','',''),(12,1,'FENDI','',''),(12,2,'Mục FENDI','','');
/*!40000 ALTER TABLE `shop_category_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_currency`
--

DROP TABLE IF EXISTS `shop_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_currency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double(8,2) NOT NULL,
  `precision` tinyint(4) NOT NULL DEFAULT 2,
  `symbol_first` tinyint(4) NOT NULL DEFAULT 0,
  `thousands` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_currency_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_currency`
--

LOCK TABLES `shop_currency` WRITE;
/*!40000 ALTER TABLE `shop_currency` DISABLE KEYS */;
INSERT INTO `shop_currency` VALUES (1,'USD Dola','USD','$',1.00,0,1,',',1,0),(2,'VietNam Dong','VND','₫',20.00,0,0,',',1,1);
/*!40000 ALTER TABLE `shop_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_discount`
--

DROP TABLE IF EXISTS `shop_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward` int(11) NOT NULL DEFAULT 2,
  `type` int(11) NOT NULL DEFAULT 0,
  `data` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_uses` int(11) NOT NULL DEFAULT 1,
  `used` int(11) NOT NULL DEFAULT 0,
  `login` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `expires_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_discount_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_discount`
--

LOCK TABLES `shop_discount` WRITE;
/*!40000 ALTER TABLE `shop_discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_discount_user`
--

DROP TABLE IF EXISTS `shop_discount_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_discount_user` (
  `user_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `log` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_discount_user`
--

LOCK TABLES `shop_discount_user` WRITE;
/*!40000 ALTER TABLE `shop_discount_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_discount_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT 0,
  `shipping` int(11) DEFAULT 0,
  `discount` int(11) DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `shipping_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `tax` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double(8,2) DEFAULT NULL,
  `received` int(11) DEFAULT 0,
  `balance` int(11) DEFAULT 0,
  `toname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(11) DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order`
--

LOCK TABLES `shop_order` WRITE;
/*!40000 ALTER TABLE `shop_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order_detail`
--

DROP TABLE IF EXISTS `shop_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` double(8,2) DEFAULT NULL,
  `attribute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order_detail`
--

LOCK TABLES `shop_order_detail` WRITE;
/*!40000 ALTER TABLE `shop_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order_history`
--

DROP TABLE IF EXISTS `shop_order_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `content` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order_history`
--

LOCK TABLES `shop_order_history` WRITE;
/*!40000 ALTER TABLE `shop_order_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_order_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order_status`
--

DROP TABLE IF EXISTS `shop_order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order_status`
--

LOCK TABLES `shop_order_status` WRITE;
/*!40000 ALTER TABLE `shop_order_status` DISABLE KEYS */;
INSERT INTO `shop_order_status` VALUES (1,'New'),(2,'Processing'),(3,'Hold'),(4,'Canceled'),(5,'Done'),(6,'Failed');
/*!40000 ALTER TABLE `shop_order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order_total`
--

DROP TABLE IF EXISTS `shop_order_total`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order_total` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `text` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order_total`
--

LOCK TABLES `shop_order_total` WRITE;
/*!40000 ALTER TABLE `shop_order_total` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_order_total` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_page`
--

DROP TABLE IF EXISTS `shop_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uniquekey` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_page_uniquekey_unique` (`uniquekey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_page`
--

LOCK TABLES `shop_page` WRITE;
/*!40000 ALTER TABLE `shop_page` DISABLE KEYS */;
INSERT INTO `shop_page` VALUES (1,'','about',1),(2,'','contact',1);
/*!40000 ALTER TABLE `shop_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_page_description`
--

DROP TABLE IF EXISTS `shop_page_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_page_description` (
  `page_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `shop_page_description_page_id_lang_id_unique` (`page_id`,`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_page_description`
--

LOCK TABLES `shop_page_description` WRITE;
/*!40000 ALTER TABLE `shop_page_description` DISABLE KEYS */;
INSERT INTO `shop_page_description` VALUES (1,1,'About','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n'),(1,2,'Giới thiệu','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n'),(2,1,'Contact','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n'),(2,2,'Liên hệ với chúng tôi','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n');
/*!40000 ALTER TABLE `shop_page_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_payment_status`
--

DROP TABLE IF EXISTS `shop_payment_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_payment_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_payment_status`
--

LOCK TABLES `shop_payment_status` WRITE;
/*!40000 ALTER TABLE `shop_payment_status` DISABLE KEYS */;
INSERT INTO `shop_payment_status` VALUES (1,'Unpaid'),(2,'Partial payment'),(3,'Paid'),(4,'Refurn');
/*!40000 ALTER TABLE `shop_payment_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product`
--

DROP TABLE IF EXISTS `shop_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT 0,
  `vendor_id` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT 0,
  `category_other` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `cost` int(11) DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `option` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `date_lastview` datetime DEFAULT NULL,
  `date_available` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_product_sku_unique` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (1,'MEGA2560','product/f2d9505d28f1b10f949cec466cada01e.jpeg',1,1,7,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(2,'LEDFAN1','product/95349d3747fdaf79d391fdc98e083701.jpg',1,1,6,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(3,'CLOCKFAN1','product/15aa6b1f31b53a0177d7653761a45274.jpeg',2,1,12,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(4,'CLOCKFAN2','product/0e1416d509af3712bd801404ca928702.jpeg',3,1,12,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(5,'CLOCKFAN3','product/95349d3747fdaf79d391fdc98e083701.jpg',1,1,12,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(6,'TMC2208','product/95349d3747fdaf79d391fdc98e083701.jpg',1,1,11,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(7,'FILAMENT','product/95349d3747fdaf79d391fdc98e083701.jpg',2,1,12,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(8,'A4988','product/820283598735f98a9b23960821da438b.jpeg',2,1,12,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(9,'ANYCUBIC-P','product/d63af407fa92299e163696a585566dc7.jpeg',2,1,10,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(10,'3DHLFD-P','product/95349d3747fdaf79d391fdc98e083701.jpg',4,1,9,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(11,'SS495A','product/95349d3747fdaf79d391fdc98e083701.jpg',2,1,6,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(12,'3D-CARBON1.75','product/d05966a529efdd8d7b41ed9b687859b6.jpeg',2,1,11,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(13,'3D-GOLD1.75','product/eedfd153bf368919a134da17f22c8de7.jpeg',3,1,10,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(14,'LCD12864-3D','product/a7a315526ecf7594731448d792714a11.jpeg',3,1,11,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(15,'LCD2004-3D','product/9215506044b8a350fc082f5350b3653a.jpg',3,1,9,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL),(16,'RAMPS1.5-3D','product/cd7aa3394c35330ed7f9e4095c6adb65.jpeg',2,1,11,NULL,15000,10000,100,0,0,NULL,1,0,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_description`
--

DROP TABLE IF EXISTS `shop_product_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product_description` (
  `product_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `shop_product_description_product_id_lang_id_unique` (`product_id`,`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_description`
--

LOCK TABLES `shop_product_description` WRITE;
/*!40000 ALTER TABLE `shop_product_description` DISABLE KEYS */;
INSERT INTO `shop_product_description` VALUES (1,1,'Easy Polo Black Edition 1','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(1,2,'Easy Polo Black Edition 1','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(2,1,'Easy Polo Black Edition 2','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(2,2,'Easy Polo Black Edition 2','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(3,1,'Easy Polo Black Edition 3','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(3,2,'Easy Polo Black Edition 3','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(4,1,'Easy Polo Black Edition 4','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(4,2,'Easy Polo Black Edition 4','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(5,1,'Easy Polo Black Edition 5','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(5,2,'Easy Polo Black Edition 5','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(6,1,'Easy Polo Black Edition 6','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(6,2,'Easy Polo Black Edition 6','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(7,1,'Easy Polo Black Edition 7','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(7,2,'Easy Polo Black Edition 7','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(8,1,'Easy Polo Black Edition 8','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(8,2,'Easy Polo Black Edition 8','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(9,1,'Easy Polo Black Edition 9','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(9,2,'Easy Polo Black Edition 9','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(10,1,'Easy Polo Black Edition 10','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(10,2,'Easy Polo Black Edition 10','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(11,1,'Easy Polo Black Edition 11','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(11,2,'Easy Polo Black Edition 11','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(12,1,'Easy Polo Black Edition 12','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(12,2,'Easy Polo Black Edition 12','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(13,1,'Easy Polo Black Edition 13','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(13,2,'Easy Polo Black Edition 13','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(14,1,'Easy Polo Black Edition 14','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(14,2,'Easy Polo Black Edition 14','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(15,1,'Easy Polo Black Edition 15','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(15,2,'Easy Polo Black Edition 15','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(16,1,'Easy Polo Black Edition 16','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'),(16,2,'Easy Polo Black Edition 16','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt=\"\" src=\"/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg\" style=\"width: 262px; height: 262px; float: right; margin: 10px;\" /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>');
/*!40000 ALTER TABLE `shop_product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_image`
--

DROP TABLE IF EXISTS `shop_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_image`
--

LOCK TABLES `shop_product_image` WRITE;
/*!40000 ALTER TABLE `shop_product_image` DISABLE KEYS */;
INSERT INTO `shop_product_image` VALUES (1,'product_slide/0642809276ecd6a28cb23d464cf41734.jpeg',1,1,1),(2,'product_slide/f4786d81509a8d8ffa461535b07c77bc.png',1,1,1),(3,'product_slide/e09af215f794f8225063c368f46a971d.jpeg',2,1,1),(4,'product_slide/54fac65e58eb9abafe3ac1acbde5ee6d.jpeg',6,1,1),(5,'product_slide/81f37c10d867710075e3ab6153a31d03.png',11,1,1),(6,'product_slide/2fbba5ac3b9c0838e5ce2b536d0c5659.jpeg',10,1,1),(7,'product_slide/8718dfdb75f951010cdce669768c3e3a.png',11,1,1),(8,'product_slide/86282e4f808428108773596dea5ee29c.jpeg',14,1,1),(9,'product_slide/b89873b9c888c0511e14c6e3abc798e8.jpeg',14,1,1),(10,'product_slide/b0d9ffad7e40d07bae6d36665f765e0f.jpeg',14,1,1),(11,'product_slide/70edffd9b5b4121fb8aee7e41c941f03.jpeg',10,1,1),(12,'product_slide/e9d5898fc6daf50751ec0c4e91ed904d.jpeg',15,1,1),(13,'product_slide/e91e85e37bb89ed854aa4123ce5eb14f.jpeg',15,1,1),(14,'product_slide/bcf85f60d3fe35de2c1be6272f9605ef.png',15,1,1),(15,'product_slide/40999526f41b1d4090e30c6b0ce21dca.jpg',16,1,1),(16,'product_slide/7963a1dc4e1676c2b3bc97ade96de7b6.jpeg',16,1,1),(17,'product_slide/101a109520cfbddde1be1791423010b6.jpeg',16,1,1),(18,'product_slide/f02dbb115272eac46f46f015608ab93a.jpeg',16,1,1);
/*!40000 ALTER TABLE `shop_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_like`
--

DROP TABLE IF EXISTS `shop_product_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product_like` (
  `product_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`product_id`,`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_like`
--

LOCK TABLES `shop_product_like` WRITE;
/*!40000 ALTER TABLE `shop_product_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_product_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_option`
--

DROP TABLE IF EXISTS `shop_product_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product_option` (
  `id` int(11) NOT NULL,
  `opt_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_price` int(11) NOT NULL DEFAULT 0,
  `opt_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  UNIQUE KEY `shop_product_option_opt_sku_unique` (`opt_sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_option`
--

LOCK TABLES `shop_product_option` WRITE;
/*!40000 ALTER TABLE `shop_product_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_product_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_shipping`
--

DROP TABLE IF EXISTS `shop_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_shipping` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT 0,
  `value` int(11) NOT NULL DEFAULT 0,
  `free` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_shipping`
--

LOCK TABLES `shop_shipping` WRITE;
/*!40000 ALTER TABLE `shop_shipping` DISABLE KEYS */;
INSERT INTO `shop_shipping` VALUES (1,0,20000,10000000,1);
/*!40000 ALTER TABLE `shop_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_shipping_status`
--

DROP TABLE IF EXISTS `shop_shipping_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_shipping_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_shipping_status`
--

LOCK TABLES `shop_shipping_status` WRITE;
/*!40000 ALTER TABLE `shop_shipping_status` DISABLE KEYS */;
INSERT INTO `shop_shipping_status` VALUES (1,'Not sent'),(2,'Sending'),(3,'Shipping done');
/*!40000 ALTER TABLE `shop_shipping_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_shoppingcart`
--

DROP TABLE IF EXISTS `shop_shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_shoppingcart` (
  `identifier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `shop_shoppingcart_identifier_instance_index` (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_shoppingcart`
--

LOCK TABLES `shop_shoppingcart` WRITE;
/*!40000 ALTER TABLE `shop_shoppingcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_shoppingcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_special_price`
--

DROP TABLE IF EXISTS `shop_special_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_special_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `off` int(11) NOT NULL DEFAULT 0,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_special_price`
--

LOCK TABLES `shop_special_price` WRITE;
/*!40000 ALTER TABLE `shop_special_price` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_special_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_users`
--

DROP TABLE IF EXISTS `shop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_users`
--

LOCK TABLES `shop_users` WRITE;
/*!40000 ALTER TABLE `shop_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_vendor`
--

DROP TABLE IF EXISTS `shop_vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_vendor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_vendor`
--

LOCK TABLES `shop_vendor` WRITE;
/*!40000 ALTER TABLE `shop_vendor` DISABLE KEYS */;
INSERT INTO `shop_vendor` VALUES (1,'ABC distributor','abc@abc.com','012496657567','','','',0);
/*!40000 ALTER TABLE `shop_vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe`
--

LOCK TABLES `subscribe` WRITE;
/*!40000 ALTER TABLE `subscribe` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-13 21:44:07
