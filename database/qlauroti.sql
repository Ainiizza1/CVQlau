/*
SQLyog Ultimate v10.42 
MySQL - 5.6.26 : Database - qlauroti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qlauroti` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `qlauroti`;

/*Table structure for table `t_detail_pemesanan` */

DROP TABLE IF EXISTS `t_detail_pemesanan`;

CREATE TABLE `t_detail_pemesanan` (
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_ambil` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `t_detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`),
  CONSTRAINT `t_detail_pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `t_detail_pemesanan` */

insert  into `t_detail_pemesanan`(`id_pemesanan`,`id_produk`,`qty_ambil`,`ket`) values (9,7,11,NULL),(10,12,3,NULL),(11,31,20,NULL),(14,7,10,NULL),(14,11,5,NULL),(14,14,9,NULL),(16,8,1,NULL),(16,10,2,NULL),(16,9,2,NULL),(18,14,2,NULL),(19,14,3,NULL),(20,9,9,NULL),(21,14,3,NULL),(21,17,1,NULL),(22,8,5,NULL),(22,10,1,NULL),(22,16,8,NULL),(22,17,6,NULL),(22,18,8,NULL),(22,15,5,NULL),(23,8,5,NULL),(23,9,1,NULL),(23,11,5,NULL),(24,29,10,NULL),(24,54,5,NULL),(24,21,1,NULL),(24,55,1,NULL),(25,53,5,NULL),(32,8,6,NULL),(32,9,1,NULL),(32,10,1,NULL),(32,16,9,NULL),(32,17,1,NULL),(32,18,8,NULL),(32,19,3,NULL),(32,20,2,NULL),(32,27,2,NULL),(33,9,7,NULL),(33,9,1,NULL),(33,19,2,NULL),(33,18,5,NULL),(33,20,5,NULL),(33,56,1,NULL),(34,8,11,NULL),(34,16,5,NULL),(34,18,4,NULL),(34,28,1,NULL),(34,40,1,NULL),(34,47,2,NULL),(34,50,6,NULL),(34,52,2,NULL),(34,54,4,NULL),(34,56,4,NULL),(35,8,3,NULL),(35,11,3,NULL),(35,16,9,NULL),(35,18,4,NULL),(35,19,5,NULL),(35,20,2,NULL),(35,36,2,NULL),(35,38,2,NULL),(35,44,1,NULL),(35,53,4,NULL),(35,56,3,NULL),(36,10,1,NULL),(36,11,2,NULL),(36,16,6,NULL),(36,17,11,NULL),(36,20,3,NULL),(36,31,1,NULL),(36,52,7,NULL),(36,56,3,NULL),(37,16,11,NULL),(37,33,2,NULL),(37,39,5,NULL),(37,47,5,NULL),(37,52,3,NULL),(37,54,2,NULL),(38,16,6,NULL),(38,19,2,NULL),(38,20,5,NULL),(38,40,2,NULL),(38,50,5,NULL),(38,52,2,NULL),(38,53,2,NULL),(39,9,3,NULL),(39,10,2,NULL),(39,18,5,NULL),(39,28,1,NULL),(39,40,1,NULL),(39,47,2,NULL),(39,50,6,NULL),(39,52,2,NULL),(39,54,4,NULL),(39,56,4,NULL),(40,8,8,NULL),(40,16,7,NULL),(40,19,2,NULL),(40,20,3,NULL),(40,27,3,NULL),(40,30,4,NULL),(40,33,3,NULL),(40,35,5,NULL),(40,38,2,NULL),(40,39,2,NULL),(40,43,1,NULL),(40,47,5,NULL),(40,51,2,NULL),(40,54,3,NULL),(41,11,2,NULL),(41,30,3,NULL),(41,32,2,NULL),(41,33,4,NULL),(41,36,1,NULL),(41,37,1,NULL),(41,39,7,NULL),(41,50,1,NULL),(41,54,5,NULL),(42,8,7,NULL),(42,30,2,NULL),(42,36,2,NULL),(42,50,3,NULL),(42,53,5,NULL),(43,8,7,NULL),(43,11,2,NULL),(43,19,2,NULL),(43,27,2,NULL),(43,41,4,NULL),(43,47,2,NULL),(43,52,5,NULL),(43,55,1,NULL),(43,56,4,NULL),(44,7,1,NULL),(44,8,3,NULL),(44,10,2,NULL),(44,11,2,NULL),(44,14,2,NULL),(44,16,6,NULL),(44,17,5,NULL),(44,35,2,NULL),(44,45,3,NULL),(44,47,2,NULL),(44,50,5,NULL),(44,51,2,NULL),(44,52,2,NULL),(44,56,5,NULL),(45,13,2,NULL),(45,14,2,NULL),(45,16,3,NULL),(45,19,1,NULL),(45,27,1,NULL),(45,29,1,NULL),(45,31,1,NULL),(45,33,1,NULL),(45,34,1,NULL),(45,36,2,NULL),(45,38,2,NULL),(45,40,1,NULL),(45,45,4,NULL),(45,52,1,NULL),(45,53,2,NULL),(46,8,5,NULL),(46,16,7,NULL),(46,18,4,NULL),(46,20,1,NULL),(46,34,1,NULL),(46,37,1,NULL),(46,38,2,NULL),(46,41,2,NULL),(46,45,2,NULL),(46,50,3,NULL),(46,52,2,NULL),(46,55,1,NULL),(46,56,5,NULL),(47,7,1,NULL),(47,8,11,NULL),(47,11,1,NULL),(47,13,1,NULL),(47,16,9,NULL),(47,18,5,NULL),(47,19,2,NULL),(47,24,1,NULL),(47,29,2,NULL),(47,35,5,NULL),(47,37,1,NULL),(47,38,5,NULL),(47,41,3,NULL),(47,44,2,NULL),(47,51,10,NULL),(47,53,3,NULL),(48,7,1,NULL),(48,9,3,NULL),(48,10,1,NULL),(48,13,3,NULL),(48,16,4,NULL),(48,17,10,NULL),(48,18,5,NULL),(48,19,2,NULL),(48,27,2,NULL),(48,29,1,NULL),(48,35,2,NULL),(48,47,1,NULL),(48,56,3,NULL),(49,13,2,NULL),(49,18,0,NULL),(49,36,2,NULL),(49,39,2,NULL),(49,18,0,NULL),(50,8,3,NULL),(50,11,4,NULL),(50,13,2,NULL),(50,16,5,NULL),(50,17,2,NULL),(50,25,10,NULL),(50,27,3,NULL),(50,30,3,NULL),(50,38,3,NULL),(50,43,1,NULL),(50,44,4,NULL),(50,47,2,NULL),(50,51,2,NULL),(51,18,9,NULL),(51,25,8,NULL),(51,38,1,NULL),(51,41,1,NULL),(51,47,2,NULL),(51,50,6,NULL),(51,52,2,NULL),(51,54,5,NULL),(52,8,5,NULL),(52,10,1,NULL),(52,16,8,NULL),(52,17,6,NULL),(52,18,8,NULL),(52,19,2,NULL),(52,20,1,NULL),(52,24,8,NULL),(52,40,1,NULL),(52,47,2,NULL),(52,48,1,NULL);

/*Table structure for table `t_detail_penjualan` */

DROP TABLE IF EXISTS `t_detail_penjualan`;

CREATE TABLE `t_detail_penjualan` (
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_terjual` int(11) DEFAULT NULL,
  KEY `id_produk` (`id_produk`),
  KEY `id_penjualan` (`id_penjualan`),
  CONSTRAINT `t_detail_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`),
  CONSTRAINT `t_detail_penjualan_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `t_penjualan` (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `t_detail_penjualan` */

insert  into `t_detail_penjualan`(`id_penjualan`,`id_produk`,`qty_terjual`) values (3,9,8),(4,9,8),(5,14,3),(5,17,1),(6,8,5),(6,10,1),(6,16,8),(6,17,6),(6,18,8),(6,15,5),(7,8,5),(7,9,1),(7,11,5),(8,29,10),(8,54,5),(8,21,1),(8,55,1),(9,53,5),(10,8,6),(10,9,1),(10,10,1),(10,16,9),(10,17,1),(10,18,8),(10,19,6),(10,20,2),(10,27,2),(11,13,2),(11,14,2),(11,16,3),(11,19,1),(11,27,1),(11,29,1),(11,31,1),(11,33,1),(11,34,1),(11,36,2),(11,38,2),(11,40,1),(11,45,4),(11,52,1),(11,53,2),(12,8,5),(12,16,7),(12,18,4),(12,20,1),(12,34,1),(12,37,1),(12,38,2),(12,41,2),(12,45,2),(12,50,3),(12,52,2),(12,55,1),(12,56,5),(13,8,5),(13,16,7),(13,18,4),(13,20,1),(13,34,1),(13,37,1),(13,38,2),(13,41,2),(13,45,2),(13,50,3),(13,52,2),(13,55,1),(13,56,5),(14,7,1),(14,8,11),(14,11,1),(14,13,1),(14,16,9),(14,18,5),(14,19,2),(14,24,1),(14,29,2),(14,35,5),(14,37,1),(14,38,5),(14,41,3),(14,44,2),(14,51,10),(14,53,3),(15,7,1),(15,9,3),(15,10,1),(15,13,3),(15,16,4),(15,17,10),(15,18,5),(15,19,2),(15,27,2),(15,29,1),(15,35,2),(15,47,1),(15,56,3),(16,13,2),(16,18,0),(16,36,2),(16,39,2),(16,18,0),(17,9,3),(17,10,2),(17,18,5),(17,28,1),(17,40,1),(17,47,2),(17,50,6),(17,52,2),(17,54,4),(17,56,4),(18,8,8),(18,16,7),(18,19,2),(18,20,3),(18,27,3),(18,30,4),(18,33,3),(18,35,5),(18,38,2),(18,39,2),(18,43,1),(18,47,5),(18,51,2),(18,54,3),(19,11,2),(19,30,3),(19,32,2),(19,33,4),(19,36,1),(19,37,1),(19,39,7),(19,50,1),(19,54,5),(20,8,7),(20,30,2),(20,36,2),(20,50,3),(20,53,5),(21,8,7),(21,11,2),(21,19,2),(21,27,2),(21,41,4),(21,47,2),(21,52,5),(21,55,1),(21,56,4),(22,7,1),(22,8,3),(22,10,2),(22,11,2),(22,14,2),(22,16,6),(22,17,5),(22,35,2),(22,45,3),(22,47,2),(22,50,5),(22,51,2),(22,52,2),(22,56,5),(23,9,7),(23,9,1),(23,19,2),(23,18,5),(23,20,5),(23,56,1),(24,8,11),(24,16,5),(24,18,4),(24,28,1),(24,40,1),(24,47,2),(24,50,6),(24,52,2),(24,54,4),(24,56,4),(25,8,3),(25,11,3),(25,16,9),(25,18,4),(25,19,5),(25,20,2),(25,36,2),(25,38,2),(25,44,1),(25,53,4),(25,56,3),(26,10,1),(26,11,2),(26,16,6),(26,17,11),(26,20,3),(26,31,1),(26,52,7),(26,56,3),(27,16,11),(27,33,2),(27,39,5),(27,47,5),(27,52,3),(27,54,2),(28,16,6),(28,19,2),(28,20,5),(28,40,2),(28,50,5),(28,52,2),(28,53,2),(29,8,3),(29,11,4),(29,13,2),(29,16,5),(29,17,2),(29,25,10),(29,27,3),(29,30,3),(29,38,3),(29,43,1),(29,44,4),(29,47,2),(29,51,2),(30,18,9),(30,25,8),(30,38,1),(30,41,1),(30,47,2),(30,50,6),(30,52,2),(30,54,5),(31,8,5),(31,10,1),(31,16,8),(31,17,6),(31,18,8),(31,19,2),(31,20,1),(31,24,8),(31,40,1),(31,47,2),(31,48,1);

/*Table structure for table `t_jproduk` */

DROP TABLE IF EXISTS `t_jproduk`;

CREATE TABLE `t_jproduk` (
  `id_jproduk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jproduk` varchar(50) DEFAULT NULL,
  `namajenis_jproduk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `t_jproduk` */

insert  into `t_jproduk`(`id_jproduk`,`kode_jproduk`,`namajenis_jproduk`) values (1,'TAW','Tawar'),(3,'SOB','Sobek'),(4,'KUP','Kupas'),(5,'DON','Donat'),(6,'Cak','Cake'),(7,'BRO','Brownies'),(8,'ABO','Abon'),(9,'ROT','Roti'),(10,'CIS','Cisroll'),(15,'KAS','Kasino');

/*Table structure for table `t_kendaraan` */

DROP TABLE IF EXISTS `t_kendaraan`;

CREATE TABLE `t_kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kendaraan` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `t_kendaraan` */

insert  into `t_kendaraan`(`id_kendaraan`,`nama_kendaraan`,`plat`,`warna`) values (8,'Honda Revo X','B 3258 KXN','Hitam'),(9,'Honda Revo X','B 4040 FCM','Hitam'),(10,'Honda Revo X','B 3277 KXN','Hitam'),(11,'Honda Revo X','B 3790 KXL','Hitam'),(13,'Honda Revo X','B 4044 KRK','Hitam'),(14,'Honda Revo X','B 4030 KRK','Hitam'),(15,'Honda Revo X','B 4048 KRK','Hitam'),(16,'Honda Revo X','B 4037 KRK','Hitam'),(17,'Honda Revo X','B 4035 KRK','Hitam'),(18,'Honda Revo X','B 4029 KRK','Hitam'),(19,'Honda Revo X','B 4027 KRK','Hitam'),(20,'Honda Revo X','B 4046 KRK','Hitam');

/*Table structure for table `t_pegawai` */

DROP TABLE IF EXISTS `t_pegawai`;

CREATE TABLE `t_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `t_pegawai` */

insert  into `t_pegawai`(`id_pegawai`,`nama_lengkap`,`telp`,`id_user`,`foto`) values (1,'Diya','08123456789',2,'Lighthouse.jpg'),(2,'Beatriz','0897654321',10,'default.jpg'),(3,'Tutut Setyawatie','085648541592',35,'Tulips.jpg');

/*Table structure for table `t_pelanggan` */

DROP TABLE IF EXISTS `t_pelanggan`;

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(150) NOT NULL,
  `telepon_pelanggan` varchar(14) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `t_pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `t_pelanggan` */

insert  into `t_pelanggan`(`id_pelanggan`,`kode_pelanggan`,`nama_pelanggan`,`alamat_pelanggan`,`telepon_pelanggan`,`kota`,`kecamatan`,`status`,`id_user`) values (19,'PELC','PT Toyo Denso Indonesia','Kawasan Industri MM 2100, Jl Irian 	Blok KK No. 12','02189982626','Bekasi','Jatiwangi',1,46);

/*Table structure for table `t_pemesanan` */

DROP TABLE IF EXISTS `t_pemesanan`;

CREATE TABLE `t_pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pemesanan` datetime NOT NULL,
  `id_sales` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `ket_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `t_pemesanan_ibfk_3` (`id_sales`),
  KEY `id` (`id_pegawai`),
  CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  CONSTRAINT `t_pemesanan_ibfk_3` FOREIGN KEY (`id_sales`) REFERENCES `t_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `t_pemesanan` */

insert  into `t_pemesanan`(`id_pemesanan`,`tgl_pemesanan`,`id_sales`,`status`,`id_pegawai`,`ket_status`) values (9,'2020-11-24 03:14:39',16,'Telah Dikonfirmasi',2,'gudang'),(10,'2020-12-01 03:25:58',20,'Belum Dikonfirmasi',10,'keuangan'),(11,'2020-12-01 03:41:58',16,'Belum Dikonfirmasi',10,'keuangan'),(14,'2020-11-30 10:31:06',16,'Telah Dikonfirmasi',2,'gudang'),(16,'2020-12-07 05:41:54',16,'Belum Dikonfirmasi',NULL,NULL),(18,'2020-12-16 04:30:45',16,'Belum Dikonfirmasi',NULL,NULL),(19,'2021-01-05 01:08:23',34,'Belum Dikonfirmasi',NULL,NULL),(20,'2019-11-21 05:50:31',38,'Telah Dibayar',10,'keuangan'),(21,'2019-11-22 10:28:52',38,'Telah Dibayar',10,'keuangan'),(22,'2019-11-23 04:01:31',38,'Telah Dibayar',10,'keuangan'),(23,'2019-11-24 05:08:43',47,'Telah Dibayar',10,'keuangan'),(24,'2019-11-25 06:09:05',49,'Telah Dibayar',10,'keuangan'),(25,'2019-11-26 06:20:58',50,'Telah Dibayar',10,'keuangan'),(32,'2021-02-25 14:34:15',38,'Telah Dibayar',10,'keuangan'),(33,'2019-11-09 15:26:10',38,'Telah Dibayar',10,'keuangan'),(34,'2019-11-10 07:11:09',38,'Telah Dibayar',10,'keuangan'),(35,'2019-11-11 07:13:37',38,'Telah Dibayar',10,'keuangan'),(36,'2019-11-12 07:15:11',38,'Telah Dibayar',10,'keuangan'),(37,'2019-11-13 07:17:27',38,'Telah Dibayar',10,'keuangan'),(38,'2019-11-14 07:18:42',38,'Telah Dibayar',10,'keuangan'),(39,'2019-11-09 07:24:45',47,'Telah Dibayar',10,'keuangan'),(40,'2019-11-10 07:27:39',47,'Telah Dibayar',10,'keuangan'),(41,'2019-11-11 07:29:41',47,'Telah Dibayar',10,'keuangan'),(42,'2019-11-12 07:35:09',47,'Telah Dibayar',10,'keuangan'),(43,'2019-11-13 07:36:42',47,'Telah Dibayar',10,'keuangan'),(44,'2019-11-14 07:39:27',47,'Telah Dibayar',10,'keuangan'),(45,'2019-11-09 07:45:22',50,'Telah Dibayar',10,'keuangan'),(46,'2019-11-10 07:47:43',50,'Telah Dibayar',10,'keuangan'),(47,'2019-11-11 07:50:30',50,'Telah Dibayar',10,'keuangan'),(48,'2019-11-12 07:52:38',50,'Telah Dibayar',10,'keuangan'),(49,'2019-11-13 07:53:51',50,'Telah Dibayar',10,'keuangan'),(50,'2021-02-26 07:56:22',50,'Telah Dibayar',10,'keuangan'),(51,'2019-11-15 08:39:39',38,'Telah Dibayar',10,'keuangan'),(52,'2019-11-16 08:42:08',38,'Telah Dibayar',10,'keuangan');

/*Table structure for table `t_penjualan` */

DROP TABLE IF EXISTS `t_penjualan`;

CREATE TABLE `t_penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `tgl_setor` datetime NOT NULL,
  `jumlah_setor` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_sales` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id` (`id_pegawai`),
  KEY `id_sales` (`id_sales`),
  CONSTRAINT `t_penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  CONSTRAINT `t_penjualan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`),
  CONSTRAINT `t_penjualan_ibfk_3` FOREIGN KEY (`id_sales`) REFERENCES `t_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `t_penjualan` */

insert  into `t_penjualan`(`id_penjualan`,`id_pemesanan`,`tgl_setor`,`jumlah_setor`,`id_pegawai`,`id_sales`) values (3,20,'2019-11-21 00:00:00',64000,10,38),(4,20,'2019-11-22 00:00:00',64000,10,38),(5,21,'2019-11-23 00:00:00',0,10,38),(6,22,'2019-11-24 00:00:00',40000,10,38),(7,23,'2019-11-25 00:00:00',48000,10,47),(8,24,'2019-11-26 00:00:00',0,10,49),(9,25,'2019-11-27 00:00:00',0,10,50),(10,32,'2021-02-25 00:00:00',262000,10,38),(11,45,'2019-11-10 08:01:22',154000,10,50),(12,46,'2019-11-11 08:03:39',218000,10,50),(13,46,'2019-11-12 08:11:32',218000,10,50),(14,47,'2019-11-12 08:15:16',380000,10,50),(15,48,'2019-11-13 08:16:30',277000,10,50),(16,49,'2019-11-14 08:17:26',42000,10,50),(17,39,'2019-11-10 08:21:44',180000,10,47),(18,40,'2019-11-11 08:22:51',282500,10,47),(19,41,'2019-11-12 08:24:02',124500,10,47),(20,42,'2019-11-13 08:24:55',109000,10,47),(21,43,'2019-11-14 08:26:27',172500,10,47),(22,44,'2019-11-15 08:27:26',278000,10,47),(23,33,'2019-11-10 08:28:41',140500,10,38),(24,34,'2019-11-11 08:29:42',252000,10,38),(25,35,'2019-11-12 08:30:46',240500,10,38),(26,36,'2019-11-13 08:31:37',219500,10,38),(27,37,'2019-11-14 08:32:23',164500,10,38),(28,38,'2019-11-15 08:33:03',131000,10,38),(29,50,'2021-02-26 08:34:59',268000,10,50),(30,51,'2021-02-26 08:43:27',189500,10,38),(31,52,'2019-11-17 08:44:21',289000,10,38);

/*Table structure for table `t_produk` */

DROP TABLE IF EXISTS `t_produk`;

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL DEFAULT '0',
  `id_jproduk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_jproduk` (`id_jproduk`),
  CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_jproduk`) REFERENCES `t_jproduk` (`id_jproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `t_produk` */

insert  into `t_produk`(`id_produk`,`kode_produk`,`nama_produk`,`harga_produk`,`id_jproduk`) values (7,'TAW001','Tawar Keju',7500,1),(8,'TAW002','Tawar Pandan',8000,1),(9,'TAW003','Tawar Gandum',8000,1),(10,'TAW004','Tawar Cip',11000,1),(11,'TAW005','Tawar Coklat',7500,1),(12,'TAW006','Tawar Open Top',7500,1),(13,'SOB001','Sobek Kombinasi',12000,3),(14,'SOB002','Sobek Coklat',12000,3),(15,'SOB003','Sobek Keju',12000,3),(16,'KAS001','Kasino',7500,15),(17,'KUP001','Kupas Biasa',7500,4),(18,'KUP002','Kupas Pandan',7500,4),(19,'DON001','Donat 6 (Enam)',7000,NULL),(20,'DON002','Donat Coklat',4000,NULL),(21,'CAK001','Cake Strawberry',5000,NULL),(22,'BRO001','Brownies Coklat',4000,NULL),(23,'BRO002','Brownies Keju',5000,NULL),(24,'ABO001','Abon',4500,NULL),(25,'ROT001','Roti Toping',5000,NULL),(26,'ROT002','Roti Pis New',5000,NULL),(27,'ROT003','Roti Sisir',5000,NULL),(28,'ROT004','Roti Kacang Hijau',4000,NULL),(29,'ROT005','Roti Keju Susu',4000,NULL),(30,'ROT006','Roti Panda',5000,NULL),(31,'ROT007','Roti Srikaya',4000,NULL),(32,'ROT008','Roti Nanas',4000,NULL),(33,'ROT009','Roti Kelapa Muda',4000,NULL),(34,'ROT010','Roti Mocca',4000,NULL),(35,'ROT011','Roti Coklat',4000,NULL),(36,'ROT012','Roti Coklat Keju',4000,NULL),(37,'ROT013','Roti Strawberry',4000,NULL),(38,'ROT014','Roti Sosis',5000,NULL),(39,'ROT015','Roti Pisang Cup',5000,NULL),(40,'ROT016','Roti Keju',4500,NULL),(41,'ROT017','Roti Pisang Coklat',4500,NULL),(42,'ROT018','Roti Pisang Keju',4500,NULL),(43,'ROT019','Roti Tiga Rasa',4500,NULL),(44,'ROT020','Roti Longjon Coklat',4500,NULL),(45,'ROT021','Roti Longjon Keju',5000,NULL),(46,'ROT022','Roti Cappucino',4500,NULL),(47,'ROT023','Roti Pizza',5000,NULL),(48,'ROT024','Roti Polo Coklat',4500,NULL),(49,'ROT025','Roti Polo Nanas',4500,NULL),(50,'ROT026','Roti Gulung Kombinasi',5000,NULL),(51,'ROT027','Roti Gulung Abon',5000,NULL),(52,'ROT028','Roti Blueberry Keju',5000,NULL),(53,'ROT029','Roti Mickey Mouse',4000,NULL),(54,'ROT030','Roti Kura-Kura',4500,NULL),(55,'ROT031','Roti Buaya',4500,NULL),(56,'CIS001','Cisroll',5000,NULL);

/*Table structure for table `t_sales` */

DROP TABLE IF EXISTS `t_sales`;

CREATE TABLE `t_sales` (
  `id_sales` int(11) NOT NULL AUTO_INCREMENT,
  `id_kendaraan` int(11) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sales`),
  KEY `id_user` (`id_user`),
  KEY `id_kendaraan` (`id_kendaraan`),
  CONSTRAINT `t_sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`),
  CONSTRAINT `t_sales_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `t_kendaraan` (`id_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `t_sales` */

insert  into `t_sales`(`id_sales`,`id_kendaraan`,`nik`,`nama_sales`,`foto`,`alamat`,`id_user`) values (26,9,'32156156890865120','Nurdin','Hydrangeas.jpg','Jl Tubagus ',38),(27,13,'32106186411980010','Rahman','Jellyfish.jpg','Jl Kolibri 1',47),(28,14,'32106186411980011','Gustiana Fajri','Chrysanthemum.jpg','Jl Elang ',48),(29,15,'32106186411980012','Ahyudin','Penguins.jpg','Jl Bawang',49),(30,16,'32106186411980013','Wawan Sugianto','Desert.jpg','Jl Delta',50),(31,17,'32106186411980014','Resdiana','Chrysanthemum.jpg','Jl Beta',51),(32,18,'32106186411980015','Andi','Tulips.jpg','Jl Alfa',52),(33,19,'32106186411980016','Rian','Jellyfish.jpg','Jl Cibitung',53),(34,20,'3210618641198001','Sidik','Penguins.jpg','Jl Raya Setu',54);

/*Table structure for table `t_users` */

DROP TABLE IF EXISTS `t_users`;

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `t_users` */

insert  into `t_users`(`id`,`username`,`password`,`level`,`status`) values (2,'gudang','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','gudang',1),(10,'keuangan','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','keuangan',1),(16,'sales','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','sales',1),(18,'admin','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq',NULL,1),(19,'pemilik1','$2y$10$boH7/Smx8p1n5fReQEvaMep5YnTflHdU11//JloLkoCM1abrW.XcS','gudang',1),(20,'pelanggan','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','pelanggan',1),(22,'sales10','$2y$10$OJwjWhlkmR6UmZwOTrRVwuxJHk8dKc9BONnRCKynglVJSztsjBGOu','sales',1),(23,'sales88','$2y$10$DWd50jwTXeZtOzFXlpZjcOQbTC4j74Pd8c3wOgGFFUnBfcI8bwXci','sales',1),(24,'coba1','$2y$10$fcRF/OQLbf8K8bl9ka2y9uJUAQXKFZ0GW3R4E2PWdxJOG.z6Xg3r6','sales',1),(25,'coba1','$2y$10$YK7nSIwqYkgIO2r.e.7wfeUZIhZBbhCIneQETxcka7J6YoLTXuM9.','sales',1),(26,'coba2','$2y$10$.NtXB.YAKs6a1tXE7HF8ceUuJ5IelkOaHVWEu6z.daIT3b6gQKBtm','sales',1),(27,'huhu1','$2y$10$OjO3j5WAToYxvg69JgcHYeMEDVYslnwnICPyi8isjcrERoWTls862','sales',1),(28,'dono1','$2y$10$Q5DYPWiZyVPjjqAo5Y/gfumWymh5zGCWrOGO8AVQ.n2qY.feo9Ok6','sales',1),(29,'dono1','$2y$10$a.tsiP4SsHZPgLA4HmIRs.1tPPtn6Nb9A8TfFmpzf1jhW7FiAP1WG','sales',1),(30,'dono2','$2y$10$AhXs6mm/FZseD6pKpaMeG.fC51NknDBricz2jBWMrNeJoiRK6m.6e','sales',1),(31,'dini1','$2y$10$JEKFoCnloD09cbRHYDs.o.YtaX3xlHDnzsZ0YOyCaG1LhCuzrAFCW','sales',1),(34,'sales11','$2y$10$Oq8PEsexF3oOA6PZzYfNPOoO1bbm82.Z0rShzpEHnDPwX0uRRLnTq','sales',1),(35,'pemilik','$2y$10$ZDcsPt6AVwkH3jyJnwQ7fuqw0vXtZWKvWeN450WktQSK1RVvzek16','admin',1),(36,'gudangmiu5','$2y$10$B.5Zrm350s47qdC4eqljweqAMEu6NJJNYwiORKXdQR4FqA8uplOUW','keuangan',1),(38,'salesnurdin','$2y$10$t5eiuZvFXjLRzuL/SYO/2O8rJuhYE0tteKQhQV6ys/NrkgN9.Ci9G','sales',1),(39,'pelsamsung3','samsung3','pelanggan',1),(46,'pelanggandenso','$2y$10$A8T15pd9Sm3CAk5acuLpTOuS84e1dL2hjslwPdSU9m6DTtSYgBq6.','pelanggan',1),(47,'salesrahman','$2y$10$/hwh/nn19Tu5XPiZRZzcxu23py.J3N42tK1RF3Ko4ppevqQ9Tahxm','sales',1),(48,'salesgustiana','$2y$10$ZHGwt9icrXSYSJ62d.Fjl.gwtvI6ZjO8GbC7Wj7j1tIcCv7hTUtV.','sales',1),(49,'salesahyudin','$2y$10$U/ApXBH2KjbVqzO8RFaF9OrxIoDpDqyqzYfvmIltvhHpsWhmt1xeu','sales',1),(50,'saleswawan','$2y$10$g9H.FjAOJ0Pm3Bej.v4JYel8hmqEzq3cIdho3Gnz23WMK56VCDT2i','sales',1),(51,'salesresdiana','$2y$10$SEOjNvmTXD4NaFKBOnLv6ehAeZzB0F8SdCIlkEyB0blq.7ZkDSqNO','sales',1),(52,'salesandi','$2y$10$29CHisUbfxc1zt0a5R7HGO7039Yq2yGQU1kUeraZERbHu3t.oCSNu','sales',1),(53,'salesrian','$2y$10$g1rBHQ5ULkK1bK8chBUlzu.4NzEqG/4a2DInJZGRopTWL/3Fp6AN.','sales',1),(54,'salessidik','$2y$10$Oh/RHri84B3TagK3zm5aguFcVAzR5U9qDhYugKQA8GzRCz0biHnYa','sales',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
