/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 8.0.30 : Database - dongyi_rajan_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dongyi_rajan_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `dongyi_rajan_db`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(12,2) NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`name`,`balance`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Brack-00001234561',40000.00,1,1,NULL,'2023-05-27 10:57:02'),(2,'Brack-00001234562',50000.00,1,NULL,NULL,NULL),(3,'NRBC-00001234701',60000.00,1,1,NULL,'2023-05-27 10:57:22'),(4,'DutchBangla-00001234901',150000.00,1,NULL,NULL,NULL),(5,'EBL-00001234771',1000000.00,1,NULL,NULL,NULL);

/*Table structure for table `frontend_menus` */

DROP TABLE IF EXISTS `frontend_menus`;

CREATE TABLE `frontend_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `frontend_menus` */

/*Table structure for table `home_links` */

DROP TABLE IF EXISTS `home_links`;

CREATE TABLE `home_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_links` */

/*Table structure for table `icons` */

DROP TABLE IF EXISTS `icons`;

CREATE TABLE `icons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `icons` */

insert  into `icons`(`id`,`name`,`deleted_at`,`created_at`,`updated_at`) values (1,'fa-copy',NULL,NULL,NULL),(2,'ion-social-twitter',NULL,NULL,NULL),(3,'ion-ionic',NULL,NULL,NULL),(4,'ion-settings',NULL,NULL,NULL);

/*Table structure for table `menu_permissions` */

DROP TABLE IF EXISTS `menu_permissions`;

CREATE TABLE `menu_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `role_id` int NOT NULL,
  `permitted_route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_permissions` */

insert  into `menu_permissions`(`id`,`menu_id`,`role_id`,`permitted_route`,`menu_from`,`created_at`,`updated_at`) values (1,4,1,'user','menu',NULL,NULL),(2,5,1,'user.role','menu',NULL,NULL),(3,6,1,'user.permission','menu',NULL,NULL),(4,8,1,'frontend-menu','menu',NULL,NULL),(5,9,1,'frontend-menu.post.view','menu',NULL,NULL),(6,10,1,'frontend-menu.menu.view','menu',NULL,NULL);

/*Table structure for table `menu_posts` */

DROP TABLE IF EXISTS `menu_posts`;

CREATE TABLE `menu_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_posts` */

/*Table structure for table `menu_routes` */

DROP TABLE IF EXISTS `menu_routes`;

CREATE TABLE `menu_routes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `sort` int NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_routes` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`parent`,`route`,`sort`,`icon`,`status`,`created_at`,`updated_at`) values (1,'Menu Management',0,'menu',1,'',1,NULL,NULL),(2,'Menu List',1,'menu',1,'',1,NULL,NULL),(3,'Menu Icon',1,'menu.icon',2,'',1,NULL,NULL),(4,'Use Management',0,'user',2,'',1,NULL,NULL),(5,'User Role',4,'user.role',1,'',1,NULL,NULL),(6,'Menu Permission',4,'user.permission',2,'',1,NULL,NULL),(7,'Profile Management',0,'project-management',3,'',1,NULL,NULL),(8,'Change Password',7,'profile-management.change.password',1,'',1,NULL,NULL),(9,'Frontend Menu',0,'frontend-menu',4,'',1,NULL,NULL),(10,'View Post',9,'frontend-menu.post.view',1,'',1,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2019_08_01_090751_create_site_settings_table',1),(2,'2019_12_02_062512_create_menu_posts_table',1),(3,'2019_12_02_062605_create_frontend_menus_table',1),(4,'2021_01_19_050240_create_users_table',1),(5,'2021_01_19_050241_create_roles_table',1),(6,'2021_01_19_050242_create_user_roles_table',1),(7,'2021_01_19_050243_create_password_resets_table',1),(8,'2021_01_19_050244_create_menus_table',1),(9,'2021_01_19_050245_create_menu_permissions_table',1),(10,'2021_01_19_050246_create_menu_routes_table',1),(11,'2021_01_19_050247_create_home_links_table',1),(12,'2021_01_19_050248_create_icons_table',1),(13,'2023_05_26_051548_create_accounts_table',1),(14,'2023_05_26_051549_create_transactions_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`description`,`status`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`) values (1,'Admin',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Author',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `site_settings` */

DROP TABLE IF EXISTS `site_settings`;

CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `site_title` text COLLATE utf8mb4_unicode_ci,
  `site_title_bn` text COLLATE utf8mb4_unicode_ci,
  `site_short_description` text COLLATE utf8mb4_unicode_ci,
  `site_short_description_bn` text COLLATE utf8mb4_unicode_ci,
  `site_header_logo` text COLLATE utf8mb4_unicode_ci,
  `site_footer_logo` text COLLATE utf8mb4_unicode_ci,
  `site_favicon` text COLLATE utf8mb4_unicode_ci,
  `site_banner_image` text COLLATE utf8mb4_unicode_ci,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone_primary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone_secondary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` text COLLATE utf8mb4_unicode_ci,
  `mail_driver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci,
  `twitter_url` text COLLATE utf8mb4_unicode_ci,
  `google_plus_url` text COLLATE utf8mb4_unicode_ci,
  `linkedin_url` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` text COLLATE utf8mb4_unicode_ci,
  `instagram_url` text COLLATE utf8mb4_unicode_ci,
  `pinterest_url` text COLLATE utf8mb4_unicode_ci,
  `tumblr_url` text COLLATE utf8mb4_unicode_ci,
  `flickr_url` text COLLATE utf8mb4_unicode_ci,
  `recaptcha_key` text COLLATE utf8mb4_unicode_ci,
  `recaptcha_secret` text COLLATE utf8mb4_unicode_ci,
  `facebook_key` text COLLATE utf8mb4_unicode_ci,
  `facebook_secret` text COLLATE utf8mb4_unicode_ci,
  `twitter_key` text COLLATE utf8mb4_unicode_ci,
  `twitter_secret` text COLLATE utf8mb4_unicode_ci,
  `google_plus_key` text COLLATE utf8mb4_unicode_ci,
  `google_plus_secret` text COLLATE utf8mb4_unicode_ci,
  `google_map_api` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_width` text COLLATE utf8mb4_unicode_ci,
  `image_height` text COLLATE utf8mb4_unicode_ci,
  `image_size` text COLLATE utf8mb4_unicode_ci,
  `file_type` text COLLATE utf8mb4_unicode_ci,
  `notification_type` tinyint NOT NULL DEFAULT '1' COMMENT '1 = toastr; 2 = sweetalert; 3 = notifyjs',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `site_settings` */

insert  into `site_settings`(`id`,`company_name`,`site_title`,`site_title_bn`,`site_short_description`,`site_short_description_bn`,`site_header_logo`,`site_footer_logo`,`site_favicon`,`site_banner_image`,`site_email`,`site_phone_primary`,`site_phone_secondary`,`site_address`,`mail_driver`,`mail_host`,`mail_port`,`mail_username`,`mail_password`,`mail_encryption`,`facebook_url`,`twitter_url`,`google_plus_url`,`linkedin_url`,`youtube_url`,`instagram_url`,`pinterest_url`,`tumblr_url`,`flickr_url`,`recaptcha_key`,`recaptcha_secret`,`facebook_key`,`facebook_secret`,`twitter_key`,`twitter_secret`,`google_plus_key`,`google_plus_secret`,`google_map_api`,`image_width`,`image_height`,`image_size`,`file_type`,`notification_type`,`created_at`,`updated_at`) values (1,'Rajan','Accounts System',' ',' ',' ','20190821_1566385367712.png','20190821_1566385399772.png','20190821_1566373763949.jpg','20190821_1566373763367.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jpeg|png|jpg|gif',1,NULL,NULL);

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_id` bigint unsigned NOT NULL,
  `amount` double(8,2) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_account_id_foreign` (`account_id`),
  CONSTRAINT `transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`account_id`,`amount`,`type`,`date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,1,40000.00,'Credit','2023-05-27',1,NULL,'2023-05-27 10:57:02','2023-05-27 10:57:02'),(3,3,60000.00,'Debit','2023-05-25',1,NULL,'2023-05-27 10:57:22','2023-05-27 10:57:22');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`) values (1,1,1,NULL,NULL),(2,2,2,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`deleted_at`,`image`,`remember_token`,`created_at`,`updated_at`) values (1,'Administrtor','admin','admin@gmail.com',NULL,'$2y$10$RyRVjxIIf5k8yD3d4TEhd.nNrcd/JuXh/rQpAVF22ivl/MZ2cU5oi',NULL,NULL,'2VnRV2CI9Qy2EIAiJ8FrNXamzv54nWYNu6benubKcouxuaka24x40WTclRn9',NULL,NULL),(2,'Author','author','author@gmail.com',NULL,'$2y$10$jxGXUOsf8NAy7Li2jNK/yeVZ3VcVDfo5b080KKUsR1Hshl1Xs/./i',NULL,NULL,'NxGZVdT7VLhLfo5spegKgo5yXWcg0Wm8bKFwFmR0vMnkfk4LPdpFjlwj3bXB',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
