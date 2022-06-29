/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 5.7.33 : Database - permintaan-atk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`permintaan-atk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `permintaan-atk`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `desk` text,
  `photo` varchar(150) DEFAULT NULL,
  `is_pelaksana` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`barang_id`,`kode_barang`,`nama_barang`,`jumlah`,`desk`,`photo`,`is_pelaksana`) values 
(7,'BR-0001','Barang A',3,'DEsk','File-220606-d10a898755.jpg','Ya'),
(8,'BR-0002','Barang B',0,'Desk','File-220606-3e111620f1.jpg','Tidak'),
(9,'BR-0003','Pensil',0,'Pencil 2B XXX','File-220607-a759cdb4e0.jpg','Ya');

/*Table structure for table `history_login` */

DROP TABLE IF EXISTS `history_login`;

CREATE TABLE `history_login` (
  `history_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `user_agent` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`history_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `history_login` */

insert  into `history_login`(`history_login_id`,`user_id`,`info`,`user_agent`,`tanggal`) values 
(4,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 07:07:59'),
(5,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 07:09:57'),
(6,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 07:47:19'),
(7,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 08:15:09'),
(8,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 11:43:53'),
(9,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-06 15:38:00'),
(10,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-07 20:12:07'),
(11,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-07 20:12:21'),
(12,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-16 08:02:57'),
(13,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-17 06:03:13'),
(14,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-19 10:12:28'),
(15,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-19 10:22:34'),
(16,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-19 10:27:55'),
(17,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-19 10:30:52'),
(18,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-19 13:02:42'),
(19,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-21 08:45:02'),
(20,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-21 08:45:11'),
(21,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-28 14:10:36'),
(22,1,'admin Telah melakukan login','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36','2022-06-28 15:34:36');

/*Table structure for table `permintaan` */

DROP TABLE IF EXISTS `permintaan`;

CREATE TABLE `permintaan` (
  `permintaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_permintaan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `team` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`permintaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan` */

insert  into `permintaan`(`permintaan_id`,`kode_permintaan`,`nama_karyawan`,`nip`,`jabatan`,`tanggal_permintaan`,`status`,`team`) values 
(8,'REQ/2022/0004','Ramdan','2017310023','Subbag Umum','2022-06-07','Approved',NULL),
(9,'REQ/2022/0005','Anisa','123456','Subbag Umum','2022-06-07','Approved',NULL),
(10,'REQ/2022/0006','ramdan','2017310023','Subbag Keuangan','2022-06-21','Approved',NULL),
(11,'REQ/2022/0007','asc','aascasc','Pemeriksa','2022-06-28','Waiting',NULL),
(12,'REQ/2022/0008','aa','aaaaaaaaaaaaaa','Pemeriksa','2022-06-28','Waiting',NULL),
(13,'REQ/2022/0009','testing','testing','Pemeriksa','2022-06-28','Waiting','aaaaa');

/*Table structure for table `permintaan_detail` */

DROP TABLE IF EXISTS `permintaan_detail`;

CREATE TABLE `permintaan_detail` (
  `permintaan_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `permintaan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`permintaan_detail_id`),
  KEY `permintaan_id` (`permintaan_id`),
  CONSTRAINT `permintaan_detail_ibfk_1` FOREIGN KEY (`permintaan_id`) REFERENCES `permintaan` (`permintaan_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_detail` */

insert  into `permintaan_detail`(`permintaan_detail_id`,`permintaan_id`,`barang_id`,`qty`) values 
(11,8,7,10),
(12,8,8,10),
(13,8,9,10),
(14,9,7,5),
(15,10,7,2),
(16,11,8,1),
(17,12,8,2),
(18,13,9,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:pegawai',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`password`,`level_id`) values 
(1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
