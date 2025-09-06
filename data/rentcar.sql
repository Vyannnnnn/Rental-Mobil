/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.19-MariaDB : Database - rentcar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `armada` */

CREATE TABLE `armada` (
  `id` varchar(50) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `plat_no` varchar(50) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `transmission` enum('Manual','Automatic') DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `status` enum('Ready','Not Ready') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `armada` */

insert  into `armada`(`id`,`merk`,`model`,`type`,`desc`,`year`,`plat_no`,`capacity`,`transmission`,`fuel`,`color`,`price`,`status`,`image`) values 
('ARM-106529','Honda','HRV','Hatchback','<p>Honda HRV</p>',2023,'AD 1265 AOC',4,'Automatic','Bensin','Black',800000,'Ready','1683793739_8b0a4c61ba25abce86ea.jpeg'),
('ARM-123432','Honda','Supra','Sedan','The BMW M2 is the high-performance version of the 2 Series 2-door coupé. The first generation of the M2 is the F87 coupé and is powered by turbocharged.',2023,'AD 5612 AOC',2,'Automatic','Bensin','Black',1250000,'Ready','1683386411_01d751b3a8c723537e7e.jpg'),
('ARM-157286','Toyota','Avanza Veloz','Minivan','<p>Toyota avanza</p>',2018,'AD 3123 AAD',6,'Automatic','Bensin','Red Metalic',250000,'Ready','1683805888_4cfb9d4b5cbac307a357.jpg'),
('ARM-421790','Ertiga','SM 3','SUV','<div class=\"read-more-less m-lg-b\" style=\"margin: 0px 0px 20px; padding: 0px; -webkit-user-drag: none; text-size-adjust: none; -webkit-highlight: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 15px; color: rgb(72, 72, 72); position: relative; font-family: gilroy-medium, sans-serif;\"><p class=\"info height-hidden\" style=\"margin: 8px 0px 0px; padding: 0px; -webkit-user-drag: none; text-size-adjust: none; -webkit-highlight: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.5; list-style: none; outline: none; height: 44px; overflow: hidden; transition: all 0.1s ease-in 0s;\">Tesla Model X 2023 adalah 5 seater SUV. Pesaing terdekat Tesla Model X adalah XC60, Q5, Outlander PHEV dan RX.</p></div>',2022,'AD B4C03 TT',2,'Automatic','Bensin','White',500000,'Ready','1683556647_151fc58b30eb2a37b105.png'),
('ARM-584176','Mitsubishi','Pajero Sport 4X4','SUV','<p><span style=\"color: rgb(72, 72, 72); font-family: gilroy-medium, sans-serif; font-size: 15px;\">Mitsubishi Pajero Sport tersedia dalam pilihan mesin Diesel di Indonesia SUV baru dari Mitsubishi hadir dalam 12 varian. Bicara soal spesifikasi mesin Mitsubishi Pajero Sport, ini ditenagai dua pilihan mesin Diesel berkapasitas 2442 cc. Pajero Sport tersedia dengan transmisi Manual and Otomatis tergantung variannya. serta ground clearance 218 mm.</span><br></p>',2022,'AD 1265 AOC',6,'Automatic','Disel','Black',1000000,'Ready','1683464651_c0e610766c2030b52e7b.jpg'),
('ARM-892073','Honda','Mobilio','Hatchback','<p>asdadsad</p>',2023,'AD 3321 AOC',4,'Automatic','Bensin','Black Metalic',600000,'Ready','1684071121_326fc006ecebadac7cf5.jpg');

/*Table structure for table `auth_activation_attempts` */

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values 
(1,'admin','Halaman Admin'),
(2,'user','Halaman User');

/*Table structure for table `auth_groups_permissions` */

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_permissions` */

/*Table structure for table `auth_groups_users` */

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values 
(1,1),
(2,2),
(2,5),
(2,6),
(2,7);

/*Table structure for table `auth_logins` */

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values 
(1,'::1','admin@gmail.com',1,'2023-05-03 08:22:20',1),
(2,'::1','admin@gmail.com',1,'2023-05-03 10:01:27',1),
(3,'::1','admin@gmail.com',1,'2023-05-05 15:29:43',1),
(4,'::1','admin@gmail.com',1,'2023-05-06 00:31:43',1),
(5,'::1','admin@gmail.com',1,'2023-05-06 15:06:10',1),
(6,'::1','admin@gmail.com',1,'2023-05-07 12:57:24',1),
(7,'::1','admin@gmail.com',1,'2023-05-07 13:21:33',1),
(8,'::1','admin@gmail.com',1,'2023-05-08 13:21:06',1),
(9,'::1','admin@gmail.com',1,'2023-05-08 13:28:54',1),
(10,'::1','admin@gmail.com',1,'2023-05-08 13:30:12',1),
(11,'::1','admin@gmail.com',1,'2023-05-08 13:30:28',1),
(12,'::1','admin@gmail.com',1,'2023-05-09 03:15:01',1),
(13,'::1','yohanrmdp@gmail.com',2,'2023-05-09 03:52:43',1),
(14,'::1','siskaee@gmail.com',3,'2023-05-09 03:57:36',1),
(15,'::1','admin@gmail.com',1,'2023-05-09 10:39:26',1),
(16,'::1','admin@gmail.com',1,'2023-05-09 17:43:40',1),
(17,'::1','yohanrmdp@gmail.com',2,'2023-05-09 17:44:01',1),
(18,'::1','yohanrmdp@gmail.com',2,'2023-05-11 05:57:58',1),
(19,'::1','yohanrmdp@gmail.com',2,'2023-05-11 07:08:54',1),
(20,'::1','yohanrmdp@gmail.com',2,'2023-05-11 07:15:48',1),
(21,'::1','admin@gmail.com',1,'2023-05-11 08:23:59',1),
(22,'::1','admin@gmail.com',1,'2023-05-11 11:47:42',1),
(23,'::1','yohanrmdp@gmail.com',2,'2023-05-11 14:11:46',1),
(24,'::1','admin@gmail.com',1,'2023-05-11 14:16:34',1),
(25,'::1','yohanrmdp@gmail.com',2,'2023-05-11 14:18:05',1),
(26,'::1','habibi@gmail.com',4,'2023-05-11 18:00:44',1),
(27,'::1','admin',NULL,'2023-05-12 03:09:29',0),
(28,'::1','admin@gmail.com',1,'2023-05-12 03:09:39',1),
(29,'::1','admin@gmail.com',1,'2023-05-12 03:09:40',1),
(30,'::1','yohanrmdp@gmail.com',2,'2023-05-12 05:35:26',1),
(31,'::1','admin@gmail.com',1,'2023-05-12 05:36:27',1),
(32,'::1','fairuzbahrain12@gmail.com',5,'2023-05-12 06:55:01',1),
(33,'::1','admin@gmail.com',1,'2023-05-12 06:56:47',1),
(34,'::1','fairuzbahrain12@gmail.com',5,'2023-05-12 06:59:33',1),
(35,'::1','yohanrmdp@gmail.com',2,'2023-05-12 07:06:39',1),
(36,'::1','fairuzbahrain12@gmail.com',5,'2023-05-12 08:13:04',1),
(37,'::1','admin',NULL,'2023-05-12 08:18:07',0),
(38,'::1','admin@gmail.com',1,'2023-05-12 08:18:14',1),
(39,'::1','admin@gmail.com',1,'2023-05-12 14:09:29',1),
(40,'::1','admin@gmail.com',1,'2023-05-13 08:22:08',1),
(41,'::1','yohanrmdp@gmail.com',2,'2023-05-13 08:44:57',1),
(42,'::1','admin@gmail.com',1,'2023-05-13 08:46:04',1),
(43,'::1','azharrizki@gmail.com',6,'2023-05-13 10:15:27',1),
(44,'::1','azharrizki@gmail.com',6,'2023-05-13 10:17:40',1),
(45,'::1','fairuzbahrain12@gmail.com',5,'2023-05-13 12:00:51',1),
(46,'::1','azharrizki@gmail.com',6,'2023-05-13 16:01:38',1),
(47,'::1','admin@gmail.com',1,'2023-05-13 16:06:55',1),
(48,'::1','azharrizki@gmail.com',6,'2023-05-13 16:14:17',1),
(49,'::1','azharrizki@gmail.com',6,'2023-05-13 16:20:04',1),
(50,'::1','azharrizki@gmail.com',6,'2023-05-14 05:47:05',1),
(51,'::1','azharrizki@gmail.com',6,'2023-05-14 05:51:30',1),
(52,'::1','azharrizki',NULL,'2023-05-14 06:38:30',0),
(53,'::1','azharrizki@gmail.com',6,'2023-05-14 06:38:35',1),
(54,'::1','admin@gmail.com',1,'2023-05-14 06:39:07',1),
(55,'::1','yohanrmdp@gmail.com',2,'2023-05-14 07:09:28',1),
(56,'::1','ali@gmail.com',7,'2023-05-14 13:21:54',1),
(57,'::1','admin@gmail.com',1,'2023-05-14 13:27:56',1);

/*Table structure for table `auth_permissions` */

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_permissions` */

/*Table structure for table `auth_reset_attempts` */

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_users_permissions` */

/*Table structure for table `driver` */

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaya` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `driver` */

insert  into `driver`(`id`,`biaya`) values 
(1,'300000');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1682606571,1);

/*Table structure for table `rekening` */

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rekening` */

insert  into `rekening`(`id`,`nama`,`bank`,`no_rek`) values 
(1,'Yohan Rahma','BRI','08821355431');

/*Table structure for table `transaksi` */

CREATE TABLE `transaksi` (
  `id` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `armada_id` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `pickup_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status_penyewaan` enum('Lepas Kunci','Dengan Driver') DEFAULT NULL,
  `status_transaksi` enum('Diproses','Disewa','Selesai','Dibatalkan') DEFAULT 'Diproses',
  `biaya_sewa` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `cancelled_reason` text DEFAULT NULL,
  `cancelled_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`user_id`,`armada_id`,`email`,`fullname`,`no_telp`,`alamat`,`kk`,`ktp`,`duration`,`pickup_date`,`return_date`,`catatan`,`status_penyewaan`,`status_transaksi`,`biaya_sewa`,`bukti_pembayaran`,`cancelled_reason`,`cancelled_by`) values 
('INV-645DF5E297B89',5,'ARM-584176','fairuzbahrain12@gmail.com','Fairuz Bahrain','089634815186','asdasd','1683879394_18537ee5bb27a632b293.jpeg','1683879394_7ddb938eae326215c18a.jpeg','16 jam','2023-05-12 00:00:00','2023-05-12 16:00:00','asdad','Lepas Kunci','Disewa','700000','1683879394_0ba62c163368b97f0f74.jpg',NULL,NULL),
('INV-645DF60E50FD6',5,'ARM-421790','fairuzbahrain12@gmail.com','Fairuz Bahrain','089634815186','sdasda','1683879438_d9a24e0b4b1389564df1.jpeg','1683879438_3d7cb549f8755b131b45.jpeg','2 hari','2023-05-12 00:00:00','2023-05-14 00:00:00','asdasd','Dengan Driver','Selesai','1250000','1683879438_3f85804bef30549d3d49.jpg',NULL,NULL),
('INV-645F4E2EA4F83',2,'ARM-421790','yohanrmdp@gmail.com','Yohan Rahma Dipa','089634815186','asdasd','1683967534_8dd11b7beabd58d02f36.jpg','1683967534_da672407b23b44a9c36e.jpg','1 hari 16 jam','2023-05-13 03:00:00','2023-05-14 19:00:00','asd','Dengan Driver','Selesai','1050000','1683967534_5f175dd1bc4ff98cdb00.jpg',NULL,NULL),
('INV-645FB787D37A5',6,'ARM-123432','azharrizki@gmail.com','Azhar Rizki','089634815186','ads','1683994504_b1b268905f84861da4da.jpeg','1683994504_2514397454216cda4c32.jpeg','19 jam','2023-05-13 00:00:00','2023-05-13 19:00:00','asd','Dengan Driver','Dibatalkan','1250000','1683994504_0e71bfc8fa4f4a4f892c.jpeg','asdasdsad',6),
('INV-6460E13FC9A7F',7,'ARM-584176','ali@gmail.com','Ahmad Ali','089634815186','fdgdg','1684070719_b5bc59a75c10babd72bc.png','1684070719_a7a576d15977fc0413bc.png','3 hari 12 jam','2023-05-14 00:00:00','2023-05-17 12:00:00','fghfhf','Lepas Kunci','Diproses','3500000','1684070719_1a48f0c53246d28876f4.jpg',NULL,NULL),
('INV-6460E19015482',7,'ARM-157286','ali@gmail.com','Ahmad Ali','089634815186','hkjhk','1684070800_ffe9c10a1ce823014818.jpeg','1684070800_c1c94ecb26cedd3010ce.jpg','1 hari','2023-05-14 00:00:00','2023-05-15 00:00:00','hggjgh','Dengan Driver','Diproses','550000','1684070800_cf4c196484638ef69a5b.jpeg',NULL,NULL);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`fullname`,`username`,`image`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'admin@gmail.com','Admin','admin','default.png','$2y$10$foRYWIUIrgK6.FjYMcQvDeivt8SbWfqhAZmXDsf/4imv21Qbcecy6',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-04-27 15:10:49','2023-04-27 15:10:49',NULL),
(2,'yohanrmdp@gmail.com','Yohan Rahma Dipa','yohan','default.jpg','$2y$10$9Ccwk2xNSLzkNnzw.2Udk.8q5VSZa3cscQGASm/.MJoKoZPMG9Oz.',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-05-09 03:52:36','2023-05-09 03:52:36',NULL),
(5,'fairuzbahrain12@gmail.com','Fairuz Bahrain','fairuzbahrain','default.jpg','$2y$10$V4mDjbLd9A4TL6Cri6OiQ.MFQ7ChCTMUOuacrVMcLeLw0xdgE5tWy',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-05-12 06:53:56','2023-05-12 06:53:56',NULL),
(6,'azharrizki@gmail.com','Azhar Rizki','azharrizki','default.jpg','$2y$10$rT3ER4d8PovRy8gLHTxSle54l7BEP4nL76Inmf0ncBDVVzr/wqARy',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-05-13 10:15:20','2023-05-13 10:15:20',NULL),
(7,'ali@gmail.com','Ahmad Ali','ali','default.jpg','$2y$10$Eude59Np9wXFBokLGnGyQe7psbH6fczn19Wo5WyL6w6BUsCU9oOJ.',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-05-14 13:21:37','2023-05-14 13:21:37',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
