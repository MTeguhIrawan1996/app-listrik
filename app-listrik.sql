-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table app-listrik.ajukan_pemasangan
DROP TABLE IF EXISTS `ajukan_pemasangan`;
CREATE TABLE IF NOT EXISTS `ajukan_pemasangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pengajuan` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `listrik_id` int(11) DEFAULT NULL,
  `tgl_pengajuan` int(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_input_data` date DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ajukan_pemasangan_user` (`user_id`),
  KEY `FK_ajukan_pemasangan_listrik` (`listrik_id`),
  CONSTRAINT `FK_ajukan_pemasangan_listrik` FOREIGN KEY (`listrik_id`) REFERENCES `listrik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ajukan_pemasangan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.ajukan_pemasangan: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `ajukan_pemasangan` DISABLE KEYS */;
REPLACE INTO `ajukan_pemasangan` (`id`, `kode_pengajuan`, `user_id`, `listrik_id`, `tgl_pengajuan`, `status`, `tgl_input_data`, `delete`) VALUES
	(38, 'LSTRK1306220001', 13, 7, 1655111959, 1, '2022-06-13', 1);
/*!40000 ALTER TABLE `ajukan_pemasangan` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.listrik
DROP TABLE IF EXISTS `listrik`;
CREATE TABLE IF NOT EXISTS `listrik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daya` varchar(50) DEFAULT NULL,
  `produk_layanan` varchar(50) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.listrik: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `listrik` DISABLE KEYS */;
REPLACE INTO `listrik` (`id`, `daya`, `produk_layanan`, `delete`) VALUES
	(4, '450', 'Prabayar', 1),
	(7, '900 V', 'Prabayar', 1),
	(8, '1200', 'Prabayar', 1);
/*!40000 ALTER TABLE `listrik` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.surat_tugas
DROP TABLE IF EXISTS `surat_tugas`;
CREATE TABLE IF NOT EXISTS `surat_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_surat` varchar(50) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `ajukan_id` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `tgl_input_surat` date DEFAULT NULL,
  `tgl_surat` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_tugas_user` (`petugas_id`),
  KEY `FK_surat_tugas_ajukan_pemasangan` (`ajukan_id`),
  CONSTRAINT `FK_surat_tugas_ajukan_pemasangan` FOREIGN KEY (`ajukan_id`) REFERENCES `ajukan_pemasangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_surat_tugas_user` FOREIGN KEY (`petugas_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.surat_tugas: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `surat_tugas` DISABLE KEYS */;
REPLACE INTO `surat_tugas` (`id`, `kode_surat`, `petugas_id`, `ajukan_id`, `ket`, `tgl_input_surat`, `tgl_surat`) VALUES
	(5, 'SRT/06/22/0001', 4, 38, 'Survey', '2022-06-15', 1655297514);
/*!40000 ALTER TABLE `surat_tugas` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `status_pelanggan` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_user_role` (`role_id`),
  CONSTRAINT `FK_user_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `nik`, `nama`, `password`, `alamat`, `kelurahan`, `kecamatan`, `provinsi`, `produk_id`, `no_hp`, `status_pelanggan`, `role_id`, `is_active`, `date_created`, `delete`) VALUES
	(3, 'admin', '6203011906970002', 'Teguh Irawan', '$2y$10$7ki0Pb2H.8iDvkVTvIiBauQsGBJwfZLvdOh2Yn3ezwpjWiyRUjMCq', NULL, NULL, NULL, NULL, NULL, '08123', NULL, 1, 1, 1654763875, 1),
	(4, 'petugas', '321', 'Petugas', '$2y$10$oOeRVgjjVChWq3zCq3GJOulpHeugL68bmNllL5DblIdFro3aNwV16', NULL, NULL, NULL, NULL, NULL, '321', NULL, 2, 1, 1654845446, 1),
	(7, 'coba', '1010', 'Coba Baru', '$2y$10$Sazg7o1gHz4jYvbGq/fCR..RsJt2dOjzRYuSo.piNE/JVBVabmhm2', 'Kapuas', 'Selat', 'Selat Tengah', 'Kalteng', NULL, '081234', NULL, 3, 1, 1654936348, 1),
	(13, 'bowo', '6203011906970003', 'bowo', '$2y$10$XWgjZk5YdTZwF5iIDBhqbuWlZXgoQIck7hn54diMQeJPP7lQ1U8OK', 'Banjarmasin', 'BJM', 'bjm', 'KALSEL', NULL, '08123333', NULL, 3, 1, 1655058328, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_access_menu
DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user_role` (`role_id`),
  KEY `FK__user_menu` (`menu_id`),
  CONSTRAINT `FK__user_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user_access_menu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
REPLACE INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 3, 5),
	(6, 2, 6),
	(7, 1, 7);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_menu
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user_menu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
REPLACE INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'Listrik'),
	(3, 'Petugas'),
	(4, 'User'),
	(5, 'Pelanggan'),
	(6, 'UserPetugas'),
	(7, 'Transaksi');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user_role: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
REPLACE INTO `user_role` (`id`, `role`) VALUES
	(1, 'ADMIN'),
	(2, 'PETUGAS'),
	(3, 'PELANGGAN');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
