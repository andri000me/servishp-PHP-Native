/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.8-MariaDB : Database - servishp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`servishp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `servishp`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `barang_ibfk_1` (`id_pembelian`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`id_pembelian`,`nama_barang`,`harga_beli`,`harga_jual`,`stok`,`satuan`,`foto`) values 
(10,1,'Soft Case OPPO A7s Hitam',25000,30000,8,'pcs','http://localhost/servishp/images/Soft Case OPPO A7s Hitam-211219.png'),
(11,1,'Soft Case OPPO A7s Pink',25000,30000,10,'pcs','http://localhost/servishp/images/Soft Case OPPO A7s Pink-211219.png');

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id_detpenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jual` varchar(10) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml_jual` int(11) DEFAULT NULL,
  `subtotal_jual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detpenjualan`),
  KEY `id_barang` (`id_barang`),
  KEY `id_jual` (`id_jual`),
  CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_jual`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `detail_penjualan` */

insert  into `detail_penjualan`(`id_detpenjualan`,`id_jual`,`id_barang`,`jml_jual`,`subtotal_jual`) values 
(10,'NNHK950X',10,2,60000);

/*Table structure for table `detail_perbaikan` */

DROP TABLE IF EXISTS `detail_perbaikan`;

CREATE TABLE `detail_perbaikan` (
  `id_detperbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detperbaikan`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `detail_perbaikan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_perbaikan` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_beli` date DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `total_beli` int(11) DEFAULT 0,
  `status_beli` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_supplier` (`id_supplier`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id_pembelian`,`tgl_beli`,`id_supplier`,`total_beli`,`status_beli`) values 
(1,'2019-12-02',1,50000,'lunas');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_jual` varchar(20) DEFAULT NULL,
  `total_penjualan` int(11) DEFAULT NULL,
  `status_penjualan` enum('order','proses','kirim','selesai','batal','aktif') DEFAULT 'order',
  PRIMARY KEY (`id_penjualan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id_penjualan`,`id_user`,`tgl_jual`,`total_penjualan`,`status_penjualan`) values 
('NNHK950X',2,'2019-12-23T13:11',60000,'aktif');

/*Table structure for table `perbaikan` */

DROP TABLE IF EXISTS `perbaikan`;

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_detperbaikan` int(11) DEFAULT NULL,
  `id_servis` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `ket_hp` varchar(50) DEFAULT NULL,
  `biaya_perbaikan` int(11) DEFAULT NULL,
  `biaya_sparepart` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_perbaikan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_perbaikan`),
  KEY `id_servis` (`id_servis`),
  KEY `id_detperbaikan` (`id_detperbaikan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `perbaikan_ibfk_1` FOREIGN KEY (`id_servis`) REFERENCES `servis` (`id_servis`),
  CONSTRAINT `perbaikan_ibfk_2` FOREIGN KEY (`id_detperbaikan`) REFERENCES `detail_perbaikan` (`id_detperbaikan`),
  CONSTRAINT `perbaikan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perbaikan` */

/*Table structure for table `servis` */

DROP TABLE IF EXISTS `servis`;

CREATE TABLE `servis` (
  `id_servis` int(11) NOT NULL AUTO_INCREMENT,
  `id_teknisi` int(11) DEFAULT NULL,
  `nama_servis` varchar(80) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servis`),
  KEY `id_teknisi` (`id_teknisi`),
  CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `servis` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(80) DEFAULT NULL,
  `no_tlp` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_supplier`,`no_tlp`,`alamat`) values 
(1,'CV Dunia Komputer Baru',111111,'Jl. Wonosari Km 5, Gunung Kidul Yogyakarta'),
(2,'PT Rekayasa Komputer',923321212,'Jl. Prof Dr Soepomo');

/*Table structure for table `teknisi` */

DROP TABLE IF EXISTS `teknisi`;

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_teknisi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `teknisi` */

insert  into `teknisi`(`id_teknisi`,`nama`,`alamat`,`no_tlp`) values 
(2,'Dihki Ardhianto','Gunung Kidul','09212212039'),
(4,'Dwiki Likuisa','Jl. Dr. Wahidin Sudirohusodo','089438492382');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `token` varchar(20) DEFAULT NULL,
  `level` enum('admin','pengguna') DEFAULT 'pengguna',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`nama`,`alamat`,`no_tlp`,`email`,`username`,`password`,`status`,`token`,`level`) values 
(2,'Customer Ku','Yogya','088111111000','wkwk@gmail.com','customer','*2A1A57C49941F3BE8E4CEB49E4929EF2F8117AF0',1,'USDSDB_313213','pengguna'),
(4,'Administrator','Jl Dr Angk','02312312931','doni@gmail.com','admin','*4ACFE3202A5FF5CF467898FC58AAB1D615029441',0,NULL,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
