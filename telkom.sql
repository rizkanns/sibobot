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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `aspek_bisnis` */

insert  into `aspek_bisnis`(`id_aspek`,`id_proyek`,`layanan_revenue`,`beban_mitra`,`nilai_kontrak`,`margin_tg`,`rp_margin`,`colocation`,`revenue_connectivity`,`revenue_cpe_proyek`,`revenue_cpe_mitra`,`created_at`,`updated_at`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-07 06:20:05','2019-04-07 06:20:05'),(2,NULL,'Tahunan','5497987','878','767,584.27','983290802',NULL,'3273891','128102',NULL,'2019-04-07 15:10:21','2019-04-09 04:29:37'),(3,3,'Tahunan','5497987','878','767,584.27','983290802',NULL,'3273891','128102',NULL,'2019-04-12 02:09:10','2019-04-12 02:10:43'),(4,4,'Tahunan','1000000','69120000','8.00','40000',NULL,'650000','500000',NULL,'2019-04-21 15:54:57','2019-04-21 15:58:03'),(5,NULL,'Tahunan',NULL,NULL,'0.00',NULL,NULL,'121','1212',NULL,'2019-04-21 16:15:38','2019-04-21 16:16:09');

/*Table structure for table `chatroom` */

DROP TABLE IF EXISTS `chatroom`;

CREATE TABLE `chatroom` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatroom` */

insert  into `chatroom`(`id`,`chat_id`,`created_at`,`updated_at`) values (1,-381821301,'2019-04-15 04:46:21','2019-04-15 04:46:21');

/*Table structure for table `detil_latar_belakang` */

DROP TABLE IF EXISTS `detil_latar_belakang`;

CREATE TABLE `detil_latar_belakang` (
  `id_detil_latar_belakang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_latar_belakang` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detil_latar_belakang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_latar_belakang` */

/*Table structure for table `detil_nilai` */

DROP TABLE IF EXISTS `detil_nilai`;

CREATE TABLE `detil_nilai` (
  `id_detil_nilai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_nilai` int(11) DEFAULT NULL,
  `id_rumus` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detil_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_nilai` */

/*Table structure for table `detil_parameter` */

DROP TABLE IF EXISTS `detil_parameter`;

CREATE TABLE `detil_parameter` (
  `id_detil_parameter` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_parameter` int(11) DEFAULT NULL,
  `id_rumus` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `mitra` */

insert  into `mitra`(`id_mitra`,`nama_mitra`,`deskripsi_mitra`,`created_at`,`updated_at`) values (1,'PINS','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:58:24','2018-07-17 13:58:24'),(2,'TELIN',NULL,'2018-07-17 13:58:29','2018-07-17 13:58:29'),(3,'MITRATEL',NULL,'2018-07-17 13:58:34','2018-07-17 13:58:34'),(4,'TELKOMINFRA',NULL,'2018-07-17 13:58:50','2018-07-17 13:58:50'),(5,'FINNET',NULL,'2018-07-17 13:58:53','2018-07-17 13:58:53'),(6,'INFOMEDIA',NULL,'2018-07-17 13:58:59','2018-07-17 13:58:59'),(7,'ADMEDIKA',NULL,'2018-07-17 13:59:02','2018-07-17 13:59:02'),(8,'MDMEDIA',NULL,'2018-07-17 13:59:07','2018-07-17 13:59:07'),(9,'ILCS',NULL,'2018-07-17 13:59:12','2018-07-17 13:59:12'),(10,'SIGMA',NULL,'2018-08-21 07:23:36','2018-08-21 07:23:36'),(11,'SMARTMEDIA',NULL,'2018-08-21 07:24:04','2018-08-21 07:24:04'),(12,'Telkomsel','I\'m animal','2019-04-07 04:35:51','2019-04-07 04:35:51');

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
  `nilai_parameter` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `parameter` */

insert  into `parameter`(`id_parameter`,`nama_parameter`,`nilai_parameter`,`created_at`,`updated_at`) values (1,'layanan_revenue',0,'2019-04-19 23:38:40','2019-04-19 23:38:40'),(2,'beban_mitra',0.1,'2019-04-19 23:38:52','2019-04-22 07:02:23'),(3,'nilai_kontrak',0,'2019-04-19 23:39:03','2019-04-19 23:39:03'),(4,'margin_tg',0.25,'2019-04-19 23:39:14','2019-04-19 16:40:53'),(5,'rp_margin',0,'2019-04-19 23:39:24','2019-04-19 23:39:24'),(6,'colocation',0,'2019-04-19 23:39:37','2019-04-19 23:39:37'),(7,'revenue_connectivity',0,'2019-04-19 23:39:48','2019-04-19 23:39:48'),(8,'revenue_cpe_proyek',0,'2019-04-19 23:40:05','2019-04-19 23:40:05'),(9,'revenue_cpe_mitra',0,'2019-04-19 23:40:19','2019-04-19 23:40:19');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `id_witel` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nomor_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `jenis_pelanggan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`id_witel`,`nama_pelanggan`,`nomor_pelanggan`,`alamat_pelanggan`,`jenis_pelanggan`,`created_at`,`updated_at`) values (85,1,'shafira aisyah','081515512894','Busan','Government','2018-07-31 07:04:33','2018-08-16 06:55:30'),(86,1,'rizka baba','08172777777','Surabaya','Enterprise','2018-07-31 07:08:43','2018-08-21 09:03:52'),(87,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:01:18','2018-08-01 08:01:18'),(88,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:03:32','2018-08-01 08:03:32'),(89,0,'dogy kim','08172777777','Seoul','Government','2018-08-01 08:04:43','2018-08-01 08:04:43'),(90,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:12:27','2018-08-01 08:12:27'),(91,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:15:17','2018-08-01 08:15:17'),(92,0,'anindya hantari','08172777777','Ketintang','Enterprise','2018-08-01 08:16:00','2018-08-01 08:16:00'),(93,0,'Park Bo Dong','08172777777','Ketintang','Enterprise','2018-08-01 08:18:52','2018-08-01 08:59:41'),(95,1,'Nuvo','08128171','Surabaya','Enterprise','2018-08-02 01:46:04','2018-08-21 07:24:32'),(96,0,'Zwitsal','1987211021','Seoul','Government','2018-08-02 01:48:16','2018-08-02 01:48:16'),(97,0,'Telkom Sigma','081515512894','Surabaya','Government','2018-08-02 02:19:10','2018-08-02 02:19:10'),(98,0,'apalah','100198','test','Government','2018-08-07 02:27:51','2018-08-07 02:27:51'),(99,0,'Traveloka','081515512894','Surabaya','Enterprise','2018-08-07 04:11:15','2018-08-07 04:11:15'),(100,0,'Zwitsal','081515512894','Seoul',NULL,'2018-08-07 04:12:30','2018-08-07 04:12:30'),(101,0,'Hoodieku','08128171198','Surabaya','Government','2018-08-07 04:13:49','2018-08-07 04:13:49'),(102,0,'Samsung','081515512894','Seoul','Government','2018-08-07 04:14:43','2018-08-07 04:14:43'),(103,0,'Logitech','08172777777','Surabaya','Enterprise','2018-08-07 04:15:47','2018-08-07 04:15:47'),(104,0,'Yakult','081515512894','Surabaya','Enterprise','2018-08-07 16:34:11','2018-08-07 16:34:11'),(106,0,'anindya hantari','08172777777','Busan','Enterprise','2018-08-10 07:55:30','2018-08-10 07:55:30'),(107,0,'RSUD Dr. Soetomo','081515512894','Surabaya','Government','2018-08-13 01:57:31','2018-08-13 01:57:31'),(108,0,'PLN','081515512894','Surabaya','Government','2018-08-13 02:13:52','2018-08-13 02:13:52'),(109,0,'dogy kim','081515512894','surabaya','Enterprise','2018-08-13 03:38:10','2018-08-13 03:38:10'),(110,0,'anindya hantari','081515512894','surabaya','Enterprise','2018-08-15 04:20:42','2018-08-15 04:20:42'),(111,0,'shafira aisyah','08172777777','surabaya','Enterprise','2018-08-15 06:10:37','2018-08-15 06:10:37'),(112,1,'anindya hantari','48','Surabaya','Enterprise','2018-08-15 06:11:25','2018-08-21 09:08:50'),(113,0,'dogy kim','1987211021','Surabaya','Enterprise','2018-08-15 06:11:58','2018-08-15 06:11:58'),(114,0,'dogy kim','081515512894','Surabaya','Enterprise','2018-08-15 06:33:19','2018-08-15 06:33:19'),(115,3,'Wiliiam Albertus Yuta','081515512894','Surabaya','Enterprise','2018-08-16 07:27:14','2018-08-16 07:27:14'),(116,3,'Brian Surya','081515512894','Seoul','Government','2018-08-16 07:30:44','2018-08-16 07:30:44'),(117,1,'anindya hantari','081515512894','surabaya','Government','2018-08-16 07:32:54','2018-08-16 07:32:54'),(118,1,'dogy kim','081515512894','surabaya','Government','2018-08-16 07:35:58','2018-08-16 07:35:58'),(119,3,'anindya hantari','081515512894','surabaya','Bisnis','2018-08-16 09:06:09','2018-08-16 09:06:09'),(120,1,'shafira aisyah','08172777777','surabaya','Government','2018-08-21 07:16:04','2018-08-21 07:16:04'),(121,1,'rizka baba','081515512894','surabaya','Enterprise','2018-08-24 02:24:45','2018-08-24 02:26:20'),(124,4,'John Mayer','0317667727','Solo','Enterprise','2019-04-12 02:09:10','2019-04-12 02:09:10'),(125,4,'RSUD Dr Soetomo','03172777777','Jl. Darmo 21 Surabaya','Government','2019-04-21 15:54:56','2019-04-21 15:54:56');

/*Table structure for table `proyek` */

DROP TABLE IF EXISTS `proyek`;

CREATE TABLE `proyek` (
  `id_proyek` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `id_mitra_2` int(11) DEFAULT NULL,
  `keterangan_mitra_1` varchar(255) DEFAULT NULL,
  `keterangan_mitra_2` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `latar_belakang_1` text,
  `latar_belakang_2` text,
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
  KEY `id_mitra` (`id_mitra`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `nik` (`id_users`),
  KEY `id_unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `id_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_unit_kerja` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `proyek` */

insert  into `proyek`(`id_proyek`,`id_pelanggan`,`id_unit_kerja`,`id_users`,`id_mitra`,`id_mitra_2`,`keterangan_mitra_1`,`keterangan_mitra_2`,`judul`,`latar_belakang_1`,`latar_belakang_2`,`masa_kontrak`,`alamat_delivery`,`mekanisme_pembayaran`,`rincian_pembayaran`,`skema_bisnis`,`ready_for_service`,`saat_penggunaan`,`pemasukan_dokumen`,`status_pengajuan`,`keterangan_proyek`,`file_p0`,`file_p1`,`bukti_scan_p0`,`bukti_scan_p1`,`created_at`,`updated_at`,`_token`) values (3,124,4,32,7,9,NULL,NULL,'Pengadaan Server',NULL,NULL,'5','Bojong','MRC','Sesudah','Sewa Murni','2019-04-26','2019-04-05','2019-04-19',1,NULL,NULL,NULL,NULL,NULL,'2019-04-12 02:09:10','2019-04-18 03:55:31',NULL),(4,125,4,32,5,NULL,NULL,NULL,'Pekerjaan Penyediaan CPE Managed Services untuk Layanan Astinet, Indihome dan Wifi Station',NULL,NULL,'2','Jl. Darmo 21 Surabaya','MRC','Sesudah','Sewa Murni','2019-04-18','2019-04-06','2019-04-05',NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-21 15:54:57','2019-04-21 15:57:13',NULL);

/*Table structure for table `rekomendasi` */

DROP TABLE IF EXISTS `rekomendasi`;

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_rumus` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekomendasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rekomendasi` */

/*Table structure for table `rumus` */

DROP TABLE IF EXISTS `rumus`;

CREATE TABLE `rumus` (
  `id_rumus` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rumus_awal` varchar(255) DEFAULT NULL,
  `flag` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rumus`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `rumus` */

insert  into `rumus`(`id_rumus`,`rumus_awal`,`flag`,`created_at`,`updated_at`) values (1,'a + b',0,'2019-04-22 14:31:54','2019-04-22 14:31:54'),(2,'a - b',0,'2019-04-22 14:32:01','2019-04-22 14:32:01'),(3,'a * b',0,'2019-04-22 14:32:12','2019-04-22 14:32:12'),(4,'a / b',0,'2019-04-22 14:32:23','2019-04-22 14:32:23'),(5,'a + b + c',0,'2019-04-22 14:32:57','2019-04-22 14:32:57'),(6,'a + b - c',0,'2019-04-22 14:33:04','2019-04-22 14:33:04'),(7,'a - b - c',0,'2019-04-22 14:33:30','2019-04-22 14:33:30'),(8,'(a + b) * c',0,'2019-04-22 14:33:49','2019-04-22 14:33:49'),(9,'(a + b) / c',0,'2019-04-22 14:34:16','2019-04-22 14:34:16'),(10,'(a - b) * c',0,'2019-04-22 14:34:45','2019-04-22 14:34:45'),(11,'(a - b) / c',0,'2019-04-22 14:34:59','2019-04-22 14:34:59'),(12,'-(a + b) * c',0,'2019-04-22 14:35:42','2019-04-22 14:35:42'),(13,'-(a + b) /c',NULL,'2019-04-22 14:35:57','2019-04-22 14:35:57');

/*Table structure for table `unit_kerja` */

DROP TABLE IF EXISTS `unit_kerja`;

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit_kerja` varchar(255) NOT NULL,
  `deskripsi_unit_kerja` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_unit_kerja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `unit_kerja` */

insert  into `unit_kerja`(`id_unit_kerja`,`nama_unit_kerja`,`deskripsi_unit_kerja`,`created_at`,`updated_at`) values (1,'RNO','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:40','2018-07-17 13:56:40'),(2,'ROC','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:44','2018-07-17 13:56:44'),(3,'MSO','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:47','2018-07-17 13:56:47'),(4,'GES','Annyeong Haseo orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','2018-07-17 13:56:49','2018-07-17 13:56:49'),(5,'NET','Ya begitu','2019-04-07 04:34:55','2019-04-07 04:34:55');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_witel` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`id_jabatan`,`id_witel`,`email`,`password`,`name`,`nik`,`remember_token`,`created_at`,`updated_at`) values (1,1,NULL,'pelkenuk.24@gmail.com','$2y$10$9IIKvRxzOZh2l8gwsbrhkuV18S35YM2BpJ44Np8GPlmcPKaML9F9G','Rizka Annisa','5115100114','ahQDyGlhYyRSYuzUpRefGdKKpCAWbnk1PGWAn8uXSm8Oa1tqZRxDsHHgFUBW','2018-07-19 08:28:28','2018-07-19 08:28:28'),(2,7,1,'seoul@kr.com','$2y$10$UTX5QPD.VHxVyNCLuRKnFuVXSq294kDEAsriO640QWBC9dIzTsnyS','John Mayer','5115100028','pCWq3jcTFjvLv0Jxl1M4cZ0mJ8lP2HlaZIKrsrGKkZlGBX2QnftoG6vspAoo','2018-07-19 08:35:20','2018-07-19 08:35:20'),(3,5,1,'b@b.com','$2y$10$Tey.yyUE4yORk3eCAK7SqePKU9rZpRKy1LQ.6wAwzTaYb358qY6Dy','Anindya Hantari','5115100001','5he0MH9631gTEfOKMw1ic3aS3PPCl89RL8Fhlfv5Xeh30i2S7SPDd6JnvCp5','2018-07-20 03:43:55','2018-07-20 03:43:55'),(4,3,1,'a@a.com','$2y$10$tA.H8TKO0O2pV4B9eIBdxO5KdWcfBLhZFEdySJyquHvB0/i4JFsp2','Bruno Mars','5115100002',NULL,'2018-07-20 03:58:29','2018-07-20 03:58:29'),(5,3,2,'c@c.com','$2y$10$1YwlO35BufqmgP7saxKUpuEOOXdm/zmKrFGiDA6FhSlvo9EAmdh2i','Suzana','5115100004','Ci59jAr5DHNEMQVZNgg8VPRLXPIioxDjCGl7ZEVElzJz83ZLQ6GA2Q72NLjf','2018-07-27 03:35:28','2018-07-27 03:35:28'),(6,5,2,'e@e.com','$2y$10$XPhECIwOT2.dH2Fyre4Qe.WvJjQ6J.ExbzJfTYXxC58U0c4t9Ld3u','Elon Musk','5115100006','cHuNgLDeNhaFrnjES1nK5pFU07rPZDBJ6hTrx0JCUGYoHrdt3YnjO16QT1HU','2018-07-27 03:44:19','2018-07-27 03:44:19'),(7,5,3,'f@f.com','$2y$10$.tT7JfDJGXkA/GwiBEQbWuP/rjYsiZpkIfzo9uj3fMbN3G8Lj8N5K','Shawn Mendes','5115100007',NULL,'2018-07-27 08:43:24','2018-07-27 08:43:24'),(8,1,NULL,'jungkook@co.kr','$2y$10$V8gCUukTx1RpnnNsKFK8wOTCWLdnHUjifSNVA5yi8XI9mvW5cEuGS','Jeon Jungkook','5115100114','VB4bEEWBGpVsBYGsuPCN8Lc7q2TGz7UQBq2FC79mOfxBEYlQruKkW6Y1DRSE','2018-07-30 02:00:50','2018-07-30 02:00:50'),(9,4,1,'bon@bon.bon','$2y$10$2hXFOz0QcL.jycYAeN6szeJ5Huz1EXAt.cdBfLNbiPFS5QYcXiE.6','Bonbon','100198',NULL,'2018-08-07 02:27:27','2018-08-07 02:27:27'),(10,2,1,'seojoon@co.kr','$2y$10$J5jrS3rs8V11no3wvr0H/.yxdxotHLAGBp/woGGnzu0Iff0wLUr.m','Park Seo Joon','5115100009','nZBARgN2kdjrdDr0wPZJJW1QD1nRQDYU5XtsnTfSXUrsB5nDb0gqiuVwuCrk','2018-08-07 04:59:24','2018-08-07 04:59:24'),(11,4,2,'kyungsoo@co.kr','$2y$10$D9rNLgu/OmLX9ftDCM/45.kapqTetla8oVahYFkbVqbdkxBN6ZTJu','Do Kyung Soo','5115100010','CEElx7l6NbddYPdE7vCXOTCScjrNMEWdFO8m2pZdzIb5NW3YIpmh8KwIFTPp','2018-08-07 17:55:27','2018-08-07 17:55:27'),(12,3,4,'jihyo@co.kr','$2y$10$ui.7Sp5Eloq.jpNAbmyYje5iuThBlRHkL.yGuaq5Jwmvcz6973M7G','Song Ji Hyo','5115100011','b7pJMYlbJNmL28Vp9Y4avrYZctPaCx8Zw4Is1Ie6DOmAC35vJvv8BumR1WHr','2018-08-07 18:05:20','2018-08-07 18:05:20'),(13,6,1,'kwangsoo@co.kr','$2y$10$wmGc6QTf8KBZp0DLeS1sKuKblO9vqv2dZqgYOEW6c2MQnDKBK3DaG','Lee Kwang Soo','5115100012','05j8jpEWQ333uRC8MqEpJUOsj0EGYchDieKV51fzvjpqfxgbo6IfpWzPA3ck','2018-08-07 18:06:22','2018-08-07 18:06:22'),(14,2,2,'woobin@co.kr','$2y$10$LKgqNO80Bk6L9e78Fj6O7urjrylMpBnnvXGxmaSxT7vuWbqry030W','Kim Woo Bin','5115100013','QXErWawUX7VJHIDRUAqY4WI2SEWnp1nqOs2YWf4ARu278PlE0TmZhFTrDD8R','2018-08-07 18:07:21','2018-08-07 18:07:21'),(15,2,3,'arya@gmail.com','$2y$10$LN9DzLcWJurBLTluiXV5KOiLkN0wQfaE/S750c0UCHN5kcUbenfF6','Arya Wiranata','51151000017','40o68ErjVNswJlBNBksgVp6cVNaw3KSscLS2WP33skKxL3sBxHoyxXnIrI4m','2018-08-13 02:10:17','2018-08-13 02:10:17'),(16,5,4,'bonbon@gmail.com','$2y$10$LhkOmZB5ImziTuIp2e0oX.R9QrIN6B5ZLe.mqa8s6FDfga3a3./1i','Shafira Aisyah','5115100018','LKtxGbpRgvzUVUKsYRHzsYfHoNoQUGJmbnAWAsrEnS3ZZP0W7i4SA5eTP5EQ','2018-08-13 02:12:34','2018-08-13 02:12:34'),(32,2,4,'taehyung@co.kr','$2y$10$rgM0l8F1ych9qlyapOOX3e1rqvSA1JXWikctzqSiAr4NeDHaiEFDq','Kim Taehyung','5115100200','b7vnLTwQoM9CyCDRCrrivX1TxOV6S1FSMMIhCOfSQlya0KqGiN9jqcfjbumz','2019-04-04 03:36:24','2019-04-04 03:36:24'),(33,4,4,'jin@co.kr','$2y$10$55nJ1stoKuLAbV8uzgzvD.gMSDUjAvim39ETB/msdKNfXXG2Pgnd.','Kim Seok Jin','5115100300','OhUxazlS1kjZLqVnOSrgWEwLWutB8PLnJpb7CHAyWHQISB15G5D5cqOuGDnS','2019-04-07 03:52:02','2019-04-07 03:52:02'),(34,3,3,'jimin@co.kr','$2y$10$SmoeBBERPekNgJeoJ2/B8eLJ.QomGsxJSJZXU/XAZpyFkWXjZxcx6','Park Jimin','5115100400','CT9OliOR8egBP2uP4LpxjfqfUGUcU2ikb4aSSV0CSFdJWKyQ1C6afHaFwbr9','2019-04-07 03:54:40','2019-04-07 03:54:40'),(35,4,3,'suga@co.kr','$2y$10$F3GS0OJ6OjpZBjVFQlSJi.EaZvsvy/WUv3anoLTjvxzyOm4z0bK0a','Min Yoon Gi','5115100500','NuPpH7TrQb4ncsF5w1Gm0gXBE3g3n9iYUvbiCpLPef6ichWh6hevNNudJi5t','2019-04-07 04:22:50','2019-04-07 04:22:50'),(36,6,2,'meghan@co.us','$2y$10$17L9uhPDKLtHCY2KBxyirewPKBKcW7hIhRVO4wV1z0ixoOTOBEAke','Meghan Trainor','5115100028','wjwVhcodKSinnXzDYeheeGqK8lkgZhwDzpa45KOQoLTxmdkQQ0EjvB5FEmCe','2019-04-22 13:29:32','2019-04-22 13:29:32'),(37,6,3,'billie@co.us','$2y$10$w6dTgXPFvWdNc2xTgAmZB.D8tajkf3dwjWIvihj3JGGtVEH.f97P.','Billie Elish','5115100013','UKXDO08PhJXSDWHuOvrbHGccYRhuGyr0PsLMYidqhtrw1yk3hmSSPt7mZ7Yx','2019-04-22 13:31:54','2019-04-22 13:31:54'),(38,6,4,'sekala@co.id','$2y$10$a1FOzdaDRLUv/YyXd7/tzeQ1ilZTe52o9Ljo3yvF9ahxBeApHd/bC','Dia Sekala Bumi','5115100029','JRfg21whyv8sqo7xaxGwEfVjFoutyjc7745mRFn7GSIMXGKNtG7l6suSjwaW','2019-04-22 13:35:53','2019-04-22 13:35:53'),(39,7,2,'dua@co.us','$2y$10$Znjy48C8170GF9PGCIQdxOysDzwPQilLZlzdPQHYknCqwzYOoTyFO','Dua Lipa','5115100009','pYMC016rOWBSfhlX9mTyUFSVraEJmS7T1W8HLSnmnFTnchgSRr4VhUCAfqTR','2019-04-22 13:41:40','2019-04-22 13:41:40'),(40,7,3,'raisa@co.id','$2y$10$8JBoslLTtSoDVZA1MI0fVu5AmHNjBX5TPS0Cy.IJ.JcG1tJKtfpFS','Raisa Andriana','5115100066','u4nEXfZmTJYxtOAS8A9MjxVaiK4MGRyrFCzwkyz5KbgSeGFFwt2YpO3B09hw','2019-04-22 13:59:52','2019-04-22 13:59:52'),(41,7,4,'neny@co.id','$2y$10$cezdMmASQ1VovKseFjNL9eOSmwlVqq87a2JZMPLv4b.xZxYJ/kYfa','Neny Lukitasari','5115100018','1Hh9joOCeZee1vohR1o7kw0fFtfayq20rIXHWIU9FeEa6LMNjrqZvYBgGPD9','2019-04-22 14:03:38','2019-04-22 14:03:38');

/*Table structure for table `witel` */

DROP TABLE IF EXISTS `witel`;

CREATE TABLE `witel` (
  `id_witel` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_witel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_witel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `witel` */

insert  into `witel`(`id_witel`,`nama_witel`,`created_at`,`updated_at`) values (1,'Surabaya Selatan','2019-04-10 07:07:56','2019-04-10 07:07:56'),(3,'Surabaya Barat','2018-08-16 02:59:03','2019-04-07 04:43:38'),(4,'Surabaya Timur','2019-04-10 00:06:46','2019-04-10 00:06:46'),(5,'Surabaya Utara','2019-04-10 00:08:25','2019-04-10 00:08:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
