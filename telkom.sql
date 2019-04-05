/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.31-MariaDB : Database - telkom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`telkom` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `telkom`;

/*Table structure for table `aspek_bisnis` */

DROP TABLE IF EXISTS `aspek_bisnis`;

CREATE TABLE `aspek_bisnis` (
  `id_aspek` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_proyek` int(11) unsigned DEFAULT NULL,
  `layanan_revenue` varchar(255) DEFAULT NULL,
  `beban_mitra` varchar(255) DEFAULT NULL,
  `nilai_kontrak` varchar(255) DEFAULT NULL,
  `margin_tg` varchar(255) DEFAULT NULL,
  `rp_margin` varchar(255) DEFAULT NULL,
  `colocation` varchar(255) DEFAULT NULL,
  `revenue_connectivity` varchar(255) DEFAULT NULL,
  `revenue_cpe_proyek` varchar(255) DEFAULT NULL,
  `revenue_cpe_mitra` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_aspek`),
  KEY `id_proyek` (`id_proyek`),
  CONSTRAINT `id_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aspek_bisnis` */

/*Table structure for table `chatroom` */

DROP TABLE IF EXISTS `chatroom`;

CREATE TABLE `chatroom` (
  `id_chatroom` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_proyel` int(11) DEFAULT NULL,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_chatroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatroom` */

/*Table structure for table `detil_latar_belakang` */

DROP TABLE IF EXISTS `detil_latar_belakang`;

CREATE TABLE `detil_latar_belakang` (
  `id_detil_latar_belakang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_latar_belakang` int(11) DEFAULT NULL,
  `fk_id_proyek` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detil_latar_belakang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_latar_belakang` */

/*Table structure for table `detil_nilai` */

DROP TABLE IF EXISTS `detil_nilai`;

CREATE TABLE `detil_nilai` (
  `id_detil_nilai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_nilai` int(11) DEFAULT NULL,
  `fk_id_rumus` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detil_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_nilai` */

/*Table structure for table `detil_parameter` */

DROP TABLE IF EXISTS `detil_parameter`;

CREATE TABLE `detil_parameter` (
  `id_detil_parameter` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_parameter` int(11) DEFAULT NULL,
  `fk_id_rumus` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detil_parameter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_parameter` */

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nama_jabatan`,`created_at`,`updated_at`) values (1,'Account Manager','2018-07-18 11:04:55','2018-07-18 11:04:55'),(2,'Sales Engineer','2018-07-18 11:05:01','2018-07-18 11:05:01'),(3,'Bidding','2018-08-07 14:52:19','2018-08-07 14:52:19'),(4,'Manager','2018-08-07 14:52:31','2018-08-07 14:52:31'),(5,'Deputy Manager','2018-08-07 14:52:43','2018-08-07 14:52:43'),(6,'General Manager','2018-08-07 14:52:54','2018-08-07 14:52:54'),(7,'Approval','2018-08-16 15:15:24','2018-08-16 15:15:24');

/*Table structure for table `latar_belakang` */

DROP TABLE IF EXISTS `latar_belakang`;

CREATE TABLE `latar_belakang` (
  `id_latar_belakang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latar_belakang` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_latar_belakang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `latar_belakang` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_08_01_013415_chatroom',1);

/*Table structure for table `mitra` */

DROP TABLE IF EXISTS `mitra`;

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(255) NOT NULL,
  `deskripsi_mitra` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mitra`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `mitra` */

insert  into `mitra`(`id_mitra`,`nama_mitra`,`deskripsi_mitra`,`created_at`,`updated_at`) values (1,'PINS','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:58:24','2018-07-17 13:58:24'),(2,'TELIN',NULL,'2018-07-17 13:58:29','2018-07-17 13:58:29'),(3,'MITRATEL',NULL,'2018-07-17 13:58:34','2018-07-17 13:58:34'),(4,'TELKOMINFRA',NULL,'2018-07-17 13:58:50','2018-07-17 13:58:50'),(5,'FINNET',NULL,'2018-07-17 13:58:53','2018-07-17 13:58:53'),(6,'INFOMEDIA',NULL,'2018-07-17 13:58:59','2018-07-17 13:58:59'),(7,'ADMEDIKA',NULL,'2018-07-17 13:59:02','2018-07-17 13:59:02'),(8,'MDMEDIA',NULL,'2018-07-17 13:59:07','2018-07-17 13:59:07'),(9,'ILCS',NULL,'2018-07-17 13:59:12','2018-07-17 13:59:12'),(10,'SIGMA',NULL,'2018-08-21 07:23:36','2018-08-21 07:23:36'),(11,'SMARTMEDIA',NULL,'2018-08-21 07:24:04','2018-08-21 07:24:04');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_pc` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

/*Table structure for table `parameter` */

DROP TABLE IF EXISTS `parameter`;

CREATE TABLE `parameter` (
  `id_parameter` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_parameter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `parameter` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_wilayah` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nomor_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `jenis_pelanggan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`fk_id_wilayah`,`nama_pelanggan`,`nomor_pelanggan`,`alamat_pelanggan`,`jenis_pelanggan`,`created_at`,`updated_at`) values (85,1,'shafira aisyah','081515512894','Busan','Government','2018-07-31 07:04:33','2018-08-16 06:55:30'),(86,1,'rizka baba','08172777777','Surabaya','Enterprise','2018-07-31 07:08:43','2018-08-21 09:03:52'),(87,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:01:18','2018-08-01 08:01:18'),(88,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:03:32','2018-08-01 08:03:32'),(89,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:04:43','2018-08-01 08:04:43'),(90,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:12:27','2018-08-01 08:12:27'),(91,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:15:17','2018-08-01 08:15:17'),(92,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:16:00','2018-08-01 08:16:00'),(93,0,'Park Bo Dong','08172777777','Ketintang','Enterprise','2018-08-01 08:18:52','2018-08-01 08:59:41'),(95,1,'Nuvo','08128171','Surabaya','Enterprise','2018-08-02 01:46:04','2018-08-21 07:24:32'),(96,0,'Zwitsal','1987211021','Seoul','Government','2018-08-02 01:48:16','2018-08-02 01:48:16'),(97,0,'Telkom Sigma','081515512894','Surabaya','Government','2018-08-02 02:19:10','2018-08-02 02:19:10'),(98,0,'apalah','100198','test','Government','2018-08-07 02:27:51','2018-08-07 02:27:51'),(99,0,'Traveloka','081515512894','Surabaya','Enterprise','2018-08-07 04:11:15','2018-08-07 04:11:15'),(100,0,'Zwitsal','081515512894','Seoul',NULL,'2018-08-07 04:12:30','2018-08-07 04:12:30'),(101,0,'Hoodieku','08128171198','Surabaya','Government','2018-08-07 04:13:49','2018-08-07 04:13:49'),(102,0,'Samsung','081515512894','Seoul','Government','2018-08-07 04:14:43','2018-08-07 04:14:43'),(103,0,'Logitech','08172777777','Surabaya','Enterprise','2018-08-07 04:15:47','2018-08-07 04:15:47'),(104,0,'Yakult','081515512894','Surabaya','Enterprise','2018-08-07 16:34:11','2018-08-07 16:34:11'),(106,0,'anindya hantari','08172777777','Busan','Enterprise','2018-08-10 07:55:30','2018-08-10 07:55:30'),(107,0,'RSUD Dr. Soetomo','081515512894','Surabaya','Government','2018-08-13 01:57:31','2018-08-13 01:57:31'),(108,0,'PLN','081515512894','Surabaya','Government','2018-08-13 02:13:52','2018-08-13 02:13:52'),(109,0,'dogy kim','081515512894','surabaya','Enterprise','2018-08-13 03:38:10','2018-08-13 03:38:10'),(110,0,'anindya hantari','081515512894','surabaya','Enterprise','2018-08-15 04:20:42','2018-08-15 04:20:42'),(111,0,'shafira aisyah','08172777777','surabaya','Enterprise','2018-08-15 06:10:37','2018-08-15 06:10:37'),(112,1,'anindya hantari','48','Surabaya','Enterprise','2018-08-15 06:11:25','2018-08-21 09:08:50'),(113,0,'dogy kim','1987211021','Surabaya','Enterprise','2018-08-15 06:11:58','2018-08-15 06:11:58'),(114,0,'dogy kim','081515512894','Surabaya','Enterprise','2018-08-15 06:33:19','2018-08-15 06:33:19'),(115,3,'Wiliiam Albertus Yuta','081515512894','Surabaya','Enterprise','2018-08-16 07:27:14','2018-08-16 07:27:14'),(116,3,'Brian Surya','081515512894','Seoul','Government','2018-08-16 07:30:44','2018-08-16 07:30:44'),(117,1,'anindya hantari','081515512894','surabaya','Government','2018-08-16 07:32:54','2018-08-16 07:32:54'),(118,1,'dogy kim','081515512894','surabaya','Government','2018-08-16 07:35:58','2018-08-16 07:35:58'),(119,3,'anindya hantari','081515512894','surabaya','Bisnis','2018-08-16 09:06:09','2018-08-16 09:06:09'),(120,1,'shafira aisyah','08172777777','surabaya','Government','2018-08-21 07:16:04','2018-08-21 07:16:04'),(121,1,'rizka baba','081515512894','surabaya','Enterprise','2018-08-24 02:24:45','2018-08-24 02:26:20');

/*Table structure for table `proyek` */

DROP TABLE IF EXISTS `proyek`;

CREATE TABLE `proyek` (
  `id_proyek` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_pelanggan` int(11) DEFAULT NULL,
  `fk_id_unit_kerja` int(11) DEFAULT NULL,
  `fk_id_users` int(11) DEFAULT NULL,
  `fk_id_mitra` int(11) DEFAULT NULL,
  `id_mitra_2` int(11) DEFAULT NULL,
  `keterangan_mitra_1` varchar(255) DEFAULT NULL,
  `keterangan_mitra_2` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `masa_kontrak` varchar(255) DEFAULT NULL,
  `alamat_delivery` varchar(255) DEFAULT NULL,
  `mekanisme_pembayaran` varchar(255) DEFAULT NULL,
  `rincian_pembayaran` varchar(255) DEFAULT NULL,
  `skema_bisnis` varchar(255) DEFAULT NULL,
  `ready_for_service` date DEFAULT NULL,
  `saat_penggunaan` date DEFAULT NULL,
  `pemasukan_dokumen` date DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL,
  `keterangan_proyek` text,
  `file_p0` varchar(255) DEFAULT NULL,
  `file_p1` varchar(255) DEFAULT NULL,
  `bukti_scan_p0` varchar(255) DEFAULT NULL,
  `bukti_scan_p1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_proyek`),
  KEY `id_mitra` (`fk_id_mitra`),
  KEY `id_pelanggan` (`fk_id_pelanggan`),
  KEY `nik` (`fk_id_users`),
  KEY `id_unit_kerja` (`fk_id_unit_kerja`),
  CONSTRAINT `id_mitra` FOREIGN KEY (`fk_id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_pelanggan` FOREIGN KEY (`fk_id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_unit_kerja` FOREIGN KEY (`fk_id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proyek` */

/*Table structure for table `rekomendasi` */

DROP TABLE IF EXISTS `rekomendasi`;

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_rumus` int(11) DEFAULT NULL,
  `fk_id_proyek` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekomendasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rekomendasi` */

/*Table structure for table `rumus` */

DROP TABLE IF EXISTS `rumus`;

CREATE TABLE `rumus` (
  `id_rumus` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rumus_akhir` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rumus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rumus` */

/*Table structure for table `unit_kerja` */

DROP TABLE IF EXISTS `unit_kerja`;

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit_kerja` varchar(255) NOT NULL,
  `deskripsi_unit_kerja` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_unit_kerja`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `unit_kerja` */

insert  into `unit_kerja`(`id_unit_kerja`,`nama_unit_kerja`,`deskripsi_unit_kerja`,`created_at`,`updated_at`) values (1,'RNO','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:40','2018-07-17 13:56:40'),(2,'ROC','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:44','2018-07-17 13:56:44'),(3,'MSO','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:47','2018-07-17 13:56:47'),(4,'GES','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:49','2018-07-17 13:56:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_jabatan` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`fk_id_jabatan`,`email`,`password`,`name`,`nik`,`remember_token`,`created_at`,`updated_at`) values (1,1,'pelkenuk.24@gmail.com','$2y$10$9IIKvRxzOZh2l8gwsbrhkuV18S35YM2BpJ44Np8GPlmcPKaML9F9G','Rizka Annisa','5115100114','ahQDyGlhYyRSYuzUpRefGdKKpCAWbnk1PGWAn8uXSm8Oa1tqZRxDsHHgFUBW','2018-07-19 08:28:28','2018-07-19 08:28:28'),(2,7,'seoul@kr.com','$2y$10$UTX5QPD.VHxVyNCLuRKnFuVXSq294kDEAsriO640QWBC9dIzTsnyS','Park Seo Joon','5115100028','pCWq3jcTFjvLv0Jxl1M4cZ0mJ8lP2HlaZIKrsrGKkZlGBX2QnftoG6vspAoo','2018-07-19 08:35:20','2018-07-19 08:35:20'),(3,1,'b@b.com','$2y$10$Tey.yyUE4yORk3eCAK7SqePKU9rZpRKy1LQ.6wAwzTaYb358qY6Dy','Rizka Annisa','5115100001','5he0MH9631gTEfOKMw1ic3aS3PPCl89RL8Fhlfv5Xeh30i2S7SPDd6JnvCp5','2018-07-20 03:43:55','2018-07-20 03:43:55'),(4,2,'a@a.com','$2y$10$tA.H8TKO0O2pV4B9eIBdxO5KdWcfBLhZFEdySJyquHvB0/i4JFsp2','Cinca','5115100002',NULL,'2018-07-20 03:58:29','2018-07-20 03:58:29'),(5,2,'c@c.com','$2y$10$1YwlO35BufqmgP7saxKUpuEOOXdm/zmKrFGiDA6FhSlvo9EAmdh2i','Suzana','5115100004','Ci59jAr5DHNEMQVZNgg8VPRLXPIioxDjCGl7ZEVElzJz83ZLQ6GA2Q72NLjf','2018-07-27 03:35:28','2018-07-27 03:35:28'),(6,1,'e@e.com','$2y$10$XPhECIwOT2.dH2Fyre4Qe.WvJjQ6J.ExbzJfTYXxC58U0c4t9Ld3u','Elon Musk','5115100006','cHuNgLDeNhaFrnjES1nK5pFU07rPZDBJ6hTrx0JCUGYoHrdt3YnjO16QT1HU','2018-07-27 03:44:19','2018-07-27 03:44:19'),(7,1,'f@f.com','$2y$10$.tT7JfDJGXkA/GwiBEQbWuP/rjYsiZpkIfzo9uj3fMbN3G8Lj8N5K','Rizka Annisa','5115100007',NULL,'2018-07-27 08:43:24','2018-07-27 08:43:24'),(8,1,'jungkook@co.kr','$2y$10$V8gCUukTx1RpnnNsKFK8wOTCWLdnHUjifSNVA5yi8XI9mvW5cEuGS','Jeon Jungkook','5115100114','l8dUoVntqdVDDMXJ73s6MRB0nyZzhQsBzyu1XAndFO61ZDn3cclkdYBUWpgy','2018-07-30 02:00:50','2018-07-30 02:00:50'),(9,1,'bon@bon.bon','$2y$10$2hXFOz0QcL.jycYAeN6szeJ5Huz1EXAt.cdBfLNbiPFS5QYcXiE.6','bonbon','100198',NULL,'2018-08-07 02:27:27','2018-08-07 02:27:27'),(10,2,'seojoon@co.kr','$2y$10$J5jrS3rs8V11no3wvr0H/.yxdxotHLAGBp/woGGnzu0Iff0wLUr.m','Park Seo Joon','5115100009','nZBARgN2kdjrdDr0wPZJJW1QD1nRQDYU5XtsnTfSXUrsB5nDb0gqiuVwuCrk','2018-08-07 04:59:24','2018-08-07 04:59:24'),(11,4,'kyungsoo@co.kr','$2y$10$D9rNLgu/OmLX9ftDCM/45.kapqTetla8oVahYFkbVqbdkxBN6ZTJu','Do Kyung Soo','5115100010','CEElx7l6NbddYPdE7vCXOTCScjrNMEWdFO8m2pZdzIb5NW3YIpmh8KwIFTPp','2018-08-07 17:55:27','2018-08-07 17:55:27'),(12,3,'jihyo@co.kr','$2y$10$ui.7Sp5Eloq.jpNAbmyYje5iuThBlRHkL.yGuaq5Jwmvcz6973M7G','Song Ji Hyo','5115100011','5ajaoSub39mJKQV6usUV2dgiK5GYFoczo2GTYNY8LF5T5Yi2mB0Q8FeedoZF','2018-08-07 18:05:20','2018-08-07 18:05:20'),(13,6,'kwangsoo@co.kr','$2y$10$wmGc6QTf8KBZp0DLeS1sKuKblO9vqv2dZqgYOEW6c2MQnDKBK3DaG','Lee Kwang Soo','5115100012','05j8jpEWQ333uRC8MqEpJUOsj0EGYchDieKV51fzvjpqfxgbo6IfpWzPA3ck','2018-08-07 18:06:22','2018-08-07 18:06:22'),(14,2,'woobin@co.kr','$2y$10$LKgqNO80Bk6L9e78Fj6O7urjrylMpBnnvXGxmaSxT7vuWbqry030W','Kim Woo Bin','5115100013','QXErWawUX7VJHIDRUAqY4WI2SEWnp1nqOs2YWf4ARu278PlE0TmZhFTrDD8R','2018-08-07 18:07:21','2018-08-07 18:07:21'),(15,2,'arya@gmail.com','$2y$10$LN9DzLcWJurBLTluiXV5KOiLkN0wQfaE/S750c0UCHN5kcUbenfF6','Arya Wiranata','51151000017','40o68ErjVNswJlBNBksgVp6cVNaw3KSscLS2WP33skKxL3sBxHoyxXnIrI4m','2018-08-13 02:10:17','2018-08-13 02:10:17'),(16,5,'bonbon@gmail.com','$2y$10$LhkOmZB5ImziTuIp2e0oX.R9QrIN6B5ZLe.mqa8s6FDfga3a3./1i','Shafira Aisyah','5115100018','LKtxGbpRgvzUVUKsYRHzsYfHoNoQUGJmbnAWAsrEnS3ZZP0W7i4SA5eTP5EQ','2018-08-13 02:12:34','2018-08-13 02:12:34'),(32,2,'taehyung@co.kr','$2y$10$rgM0l8F1ych9qlyapOOX3e1rqvSA1JXWikctzqSiAr4NeDHaiEFDq','Kim Taehyung','5115100200','Z3Ztwy5BEbu0iCc94BOKc957NZOXywzSTQvQgH1OTDy4TIsLy1pi7CbEqs5V','2019-04-04 03:36:24','2019-04-04 03:36:24');

/*Table structure for table `wilayah` */

DROP TABLE IF EXISTS `wilayah`;

CREATE TABLE `wilayah` (
  `id_witel` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_witel` varchar(255) DEFAULT NULL,
  `se` int(11) DEFAULT NULL,
  `bidding` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `deputy` int(11) DEFAULT NULL,
  `gm` int(11) DEFAULT NULL,
  `approval` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_witel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wilayah` */

insert  into `wilayah`(`id_witel`,`nama_witel`,`se`,`bidding`,`manager`,`deputy`,`gm`,`approval`,`created_at`,`updated_at`) values (1,'Surabaya Selatan',14,12,11,16,13,2,NULL,NULL),(3,'Surabaya Barat',4,21,11,20,13,32,'2018-08-16 02:59:03','2018-08-24 02:53:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
