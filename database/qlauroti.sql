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

insert  into `t_detail_pemesanan`(`id_pemesanan`,`id_produk`,`qty_ambil`,`ket`) values (9,7,11,NULL),(10,12,3,NULL),(11,31,20,NULL),(14,7,10,NULL),(14,11,5,NULL),(14,14,9,NULL),(16,8,1,NULL),(16,10,2,NULL),(16,9,2,NULL),(18,14,2,NULL),(19,14,3,NULL),(20,9,9,NULL),(21,14,3,NULL),(21,17,1,NULL),(22,8,5,NULL),(22,10,1,NULL),(22,16,8,NULL),(22,17,6,NULL),(22,18,8,NULL),(22,15,5,NULL),(23,8,5,NULL),(23,9,1,NULL),(23,11,5,NULL),(24,29,10,NULL),(24,54,5,NULL),(24,21,1,NULL),(24,55,1,NULL),(25,53,5,NULL);

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

insert  into `t_detail_penjualan`(`id_penjualan`,`id_produk`,`qty_terjual`) values (3,9,8),(4,9,8),(5,14,3),(5,17,1),(6,8,5),(6,10,1),(6,16,8),(6,17,6),(6,18,8),(6,15,5),(7,8,5),(7,9,1),(7,11,5),(8,29,10),(8,54,5),(8,21,1),(8,55,1),(9,53,5);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `t_pemesanan` */

insert  into `t_pemesanan`(`id_pemesanan`,`tgl_pemesanan`,`id_sales`,`status`,`id_pegawai`,`ket_status`) values (9,'2020-11-24 03:14:39',16,'Telah Dikonfirmasi',2,'gudang'),(10,'2020-12-01 03:25:58',20,'Belum Dikonfirmasi',10,'keuangan'),(11,'2020-12-01 03:41:58',16,'Belum Dikonfirmasi',10,'keuangan'),(14,'2020-11-30 10:31:06',16,'Telah Dikonfirmasi',2,'gudang'),(16,'2020-12-07 05:41:54',16,'Belum Dikonfirmasi',NULL,NULL),(18,'2020-12-16 04:30:45',16,'Belum Dikonfirmasi',NULL,NULL),(19,'2021-01-05 01:08:23',34,'Belum Dikonfirmasi',NULL,NULL),(20,'2019-11-21 05:50:31',38,'Telah Dibayar',10,'keuangan'),(21,'2019-11-22 10:28:52',38,'Telah Dibayar',10,'keuangan'),(22,'2019-11-23 04:01:31',38,'Telah Dibayar',10,'keuangan'),(23,'2019-11-24 05:08:43',47,'Telah Dibayar',10,'keuangan'),(24,'2019-11-25 06:09:05',49,'Telah Dibayar',10,'keuangan'),(25,'2019-11-26 06:20:58',50,'Telah Dibayar',10,'keuangan');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `t_penjualan` */

insert  into `t_penjualan`(`id_penjualan`,`id_pemesanan`,`tgl_setor`,`jumlah_setor`,`id_pegawai`,`id_sales`) values (3,20,'2019-11-21 00:00:00',64000,10,38),(4,20,'2019-11-22 00:00:00',64000,10,38),(5,21,'2019-11-23 00:00:00',0,10,38),(6,22,'2019-11-24 00:00:00',40000,10,38),(7,23,'2019-11-25 00:00:00',48000,10,47),(8,24,'2019-11-26 00:00:00',0,10,49),(9,25,'2019-11-27 00:00:00',0,10,50);

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

insert  into `t_produk`(`id_produk`,`kode_produk`,`nama_produk`,`harga_produk`,`id_jproduk`) values (7,'TAW001','Tawar Keju',7500,1),(8,'TAW002','Tawar Pandan',8000,1),(9,'TAW003','Tawar Gandum',8000,1),(10,'TAW004','Tawar Cip',0,1),(11,'TAW005','Tawar Coklat',0,1),(12,'TAW006','Tawar Open Top',0,1),(13,'SOB001','Sobek Kombinasi',0,3),(14,'SOB002','Sobek Coklat',0,3),(15,'SOB003','Sobek Keju',0,3),(16,'KAS001','Kasino',0,15),(17,'KUP001','Kupas Biasa',0,4),(18,'KUP002','Kupas Pandan',0,4),(19,'DON001','Donat 6 (Enam)',0,NULL),(20,'DON002','Donat Coklat',0,NULL),(21,'CAK001','Cake Strawberry',0,NULL),(22,'BRO001','Brownies Coklat',0,NULL),(23,'BRO002','Brownies Keju',0,NULL),(24,'ABO001','Abon',0,NULL),(25,'ROT001','Roti Toping',0,NULL),(26,'ROT002','Roti Pis New',0,NULL),(27,'ROT003','Roti Sisir',0,NULL),(28,'ROT004','Roti Kacang Hijau',0,NULL),(29,'ROT005','Roti Keju Susu',0,NULL),(30,'ROT006','Roti Panda',0,NULL),(31,'ROT007','Roti Srikaya',0,NULL),(32,'ROT008','Roti Nanas',0,NULL),(33,'ROT009','Roti Kelapa Muda',0,NULL),(34,'ROT010','Roti Mocca',0,NULL),(35,'ROT011','Roti Coklat',0,NULL),(36,'ROT012','Roti Coklat Keju',0,NULL),(37,'ROT013','Roti Strawberry',0,NULL),(38,'ROT014','Roti Sosis',0,NULL),(39,'ROT015','Roti Pisang Cup',0,NULL),(40,'ROT016','Roti Keju',0,NULL),(41,'ROT017','Roti Pisang Coklat',0,NULL),(42,'ROT018','Roti Pisang Keju',0,NULL),(43,'ROT019','Roti Tiga Rasa',0,NULL),(44,'ROT020','Roti Longjon Coklat',0,NULL),(45,'ROT021','Roti Longjon Keju',0,NULL),(46,'ROT022','Roti Cappucino',0,NULL),(47,'ROT023','Roti Pizza',0,NULL),(48,'ROT024','Roti Polo Coklat',0,NULL),(49,'ROT025','Roti Polo Nanas',0,NULL),(50,'ROT026','Roti Gulung Kombinasi',0,NULL),(51,'ROT027','Roti Gulung Abon',0,NULL),(52,'ROT028','Roti Blueberry Keju',0,NULL),(53,'ROT029','Roti Mickey Mouse',0,NULL),(54,'ROT030','Roti Kura-Kura',0,NULL),(55,'ROT031','Roti Buaya',0,NULL),(56,'CIS001','Cisroll',0,NULL);

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

insert  into `t_sales`(`id_sales`,`id_kendaraan`,`nik`,`nama_sales`,`foto`,`alamat`,`id_user`) values (26,9,'3215615689086512','Nurdin','Hydrangeas.jpg','Jl Tubagus ',38),(27,13,'32106186411980010','Rahman','Jellyfish.jpg','Jl Kolibri 1',47),(28,14,'32106186411980011','Gustiana Fajri','Chrysanthemum.jpg','Jl Elang ',48),(29,15,'32106186411980012','Ahyudin','Penguins.jpg','Jl Bawang',49),(30,16,'32106186411980013','Wawan Sugianto','Desert.jpg','Jl Delta',50),(31,17,'32106186411980014','Resdiana','Chrysanthemum.jpg','Jl Beta',51),(32,18,'32106186411980015','Andi','Tulips.jpg','Jl Alfa',52),(33,19,'32106186411980016','Rian','Jellyfish.jpg','Jl Cibitung',53),(34,20,'3210618641198001','Sidik','Penguins.jpg','Jl Raya Setu',54);

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

insert  into `t_users`(`id`,`username`,`password`,`level`,`status`) values (2,'gudang','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','gudang',1),(10,'keuangan','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','keuangan',1),(16,'sales','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','sales',1),(18,'admin','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq',NULL,1),(19,'pemilik1','$2y$10$boH7/Smx8p1n5fReQEvaMep5YnTflHdU11//JloLkoCM1abrW.XcS','gudang',1),(20,'pelanggan','$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq','pelanggan',1),(22,'sales10','$2y$10$OJwjWhlkmR6UmZwOTrRVwuxJHk8dKc9BONnRCKynglVJSztsjBGOu','sales',1),(23,'sales88','$2y$10$DWd50jwTXeZtOzFXlpZjcOQbTC4j74Pd8c3wOgGFFUnBfcI8bwXci','sales',1),(24,'coba1','$2y$10$fcRF/OQLbf8K8bl9ka2y9uJUAQXKFZ0GW3R4E2PWdxJOG.z6Xg3r6','sales',1),(25,'coba1','$2y$10$YK7nSIwqYkgIO2r.e.7wfeUZIhZBbhCIneQETxcka7J6YoLTXuM9.','sales',1),(26,'coba2','$2y$10$.NtXB.YAKs6a1tXE7HF8ceUuJ5IelkOaHVWEu6z.daIT3b6gQKBtm','sales',1),(27,'huhu1','$2y$10$OjO3j5WAToYxvg69JgcHYeMEDVYslnwnICPyi8isjcrERoWTls862','sales',1),(28,'dono1','$2y$10$Q5DYPWiZyVPjjqAo5Y/gfumWymh5zGCWrOGO8AVQ.n2qY.feo9Ok6','sales',1),(29,'dono1','$2y$10$a.tsiP4SsHZPgLA4HmIRs.1tPPtn6Nb9A8TfFmpzf1jhW7FiAP1WG','sales',1),(30,'dono2','$2y$10$AhXs6mm/FZseD6pKpaMeG.fC51NknDBricz2jBWMrNeJoiRK6m.6e','sales',1),(31,'dini1','$2y$10$JEKFoCnloD09cbRHYDs.o.YtaX3xlHDnzsZ0YOyCaG1LhCuzrAFCW','sales',1),(34,'sales11','$2y$10$Oq8PEsexF3oOA6PZzYfNPOoO1bbm82.Z0rShzpEHnDPwX0uRRLnTq','sales',1),(35,'pemilik','$2y$10$ZDcsPt6AVwkH3jyJnwQ7fuqw0vXtZWKvWeN450WktQSK1RVvzek16','admin',1),(36,'gudangmiu5','$2y$10$B.5Zrm350s47qdC4eqljweqAMEu6NJJNYwiORKXdQR4FqA8uplOUW','keuangan',1),(38,'salesnurdin','$2y$10$LNa.YpH1GvMCkWWMI9pIH..RjCG3P5pa4magkxW1aFjJC.iFGToJi','sales',1),(39,'pelsamsung3','samsung3','pelanggan',1),(46,'pelanggandenso','$2y$10$A8T15pd9Sm3CAk5acuLpTOuS84e1dL2hjslwPdSU9m6DTtSYgBq6.','pelanggan',1),(47,'salesrahman','$2y$10$/hwh/nn19Tu5XPiZRZzcxu23py.J3N42tK1RF3Ko4ppevqQ9Tahxm','sales',1),(48,'salesgustiana','$2y$10$ZHGwt9icrXSYSJ62d.Fjl.gwtvI6ZjO8GbC7Wj7j1tIcCv7hTUtV.','sales',1),(49,'salesahyudin','$2y$10$U/ApXBH2KjbVqzO8RFaF9OrxIoDpDqyqzYfvmIltvhHpsWhmt1xeu','sales',1),(50,'saleswawan','$2y$10$g9H.FjAOJ0Pm3Bej.v4JYel8hmqEzq3cIdho3Gnz23WMK56VCDT2i','sales',1),(51,'salesresdiana','$2y$10$SEOjNvmTXD4NaFKBOnLv6ehAeZzB0F8SdCIlkEyB0blq.7ZkDSqNO','sales',1),(52,'salesandi','$2y$10$29CHisUbfxc1zt0a5R7HGO7039Yq2yGQU1kUeraZERbHu3t.oCSNu','sales',1),(53,'salesrian','$2y$10$g1rBHQ5ULkK1bK8chBUlzu.4NzEqG/4a2DInJZGRopTWL/3Fp6AN.','sales',1),(54,'salessidik','$2y$10$Oh/RHri84B3TagK3zm5aguFcVAzR5U9qDhYugKQA8GzRCz0biHnYa','sales',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
