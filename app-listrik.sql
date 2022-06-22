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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.ajukan_pemasangan: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `ajukan_pemasangan` DISABLE KEYS */;
REPLACE INTO `ajukan_pemasangan` (`id`, `kode_pengajuan`, `user_id`, `listrik_id`, `tgl_pengajuan`, `status`, `tgl_input_data`, `delete`) VALUES
	(47, 'LSTRK2006220001', 13, 7, 1655739054, 5, '2022-06-20', 1),
	(48, 'LSTRK2106220001', 14, 8, 1655819366, 5, '2022-06-21', 1),
	(49, 'LSTRK2206220001', 7, 4, 1655890137, 1, '2022-06-22', 1);
/*!40000 ALTER TABLE `ajukan_pemasangan` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.listrik
CREATE TABLE IF NOT EXISTS `listrik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daya` varchar(50) DEFAULT NULL,
  `produk_layanan` varchar(50) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.listrik: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `listrik` DISABLE KEYS */;
REPLACE INTO `listrik` (`id`, `daya`, `produk_layanan`, `harga`, `delete`) VALUES
	(4, '450', 'Prabayar', '500000', 1),
	(7, '900 V', 'Prabayar', '1000000', 1),
	(8, '1200', 'Prabayar', '1500000', 1);
/*!40000 ALTER TABLE `listrik` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pembayaran` varchar(255) DEFAULT NULL,
  `ajukan_id` int(15) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `harga_lain` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pembayaran_ajukan_pemasangan` (`ajukan_id`),
  CONSTRAINT `FK_pembayaran_ajukan_pemasangan` FOREIGN KEY (`ajukan_id`) REFERENCES `ajukan_pemasangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.pembayaran: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
REPLACE INTO `pembayaran` (`id`, `kode_pembayaran`, `ajukan_id`, `tgl_pembayaran`, `status`, `harga_lain`, `total`) VALUES
	(6, 'TRK2006220001', 47, '2022-06-20', 1, '400000', '1400000'),
	(7, 'TRK2106220001', 48, '2022-06-21', 1, '200000', '1700000');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.surat_tugas
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.surat_tugas: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `surat_tugas` DISABLE KEYS */;
REPLACE INTO `surat_tugas` (`id`, `kode_surat`, `petugas_id`, `ajukan_id`, `ket`, `tgl_input_surat`, `tgl_surat`) VALUES
	(15, 'SRT/20/06/22/0001', 4, 47, 'PEMASANGAN SELESAI', '2022-06-20', 1655739101),
	(16, 'SRT/21/06/22/0001', 4, 48, 'PEMASANGAN SELESAI', '2022-06-21', 1655819404),
	(17, 'SRT/22/06/22/0001', 4, 49, 'TIDAK BISA DILAKUKAN PEMASANGAN', '2022-06-22', 1655890254);
/*!40000 ALTER TABLE `surat_tugas` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.tracking
CREATE TABLE IF NOT EXISTS `tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ajukan_user_id` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `tgl_tracking` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tarcking_ajukan_pemasangan` (`ajukan_user_id`) USING BTREE,
  CONSTRAINT `FK_tarcking_ajukan_pemasangan` FOREIGN KEY (`ajukan_user_id`) REFERENCES `ajukan_pemasangan` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.tracking: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `tracking` DISABLE KEYS */;
REPLACE INTO `tracking` (`id`, `ajukan_user_id`, `ket`, `tgl_tracking`) VALUES
	(30, 13, 'Diajukan', '2022-06-20'),
	(31, 13, 'Disetujui', '2022-06-20'),
	(32, 13, 'Proses Survey Oleh Petugas', '2022-06-20'),
	(33, 13, 'Sudah dibayar dan proses pemasangan', '2022-06-20'),
	(34, 13, 'Pemasangan Selesai', '2022-06-20'),
	(35, 14, 'Diajukan', '2022-06-21'),
	(36, 14, 'Disetujui', '2022-06-21'),
	(37, 14, 'Proses Survey Oleh Petugas', '2022-06-21'),
	(38, 14, 'Sudah dibayar dan proses pemasangan', '2022-06-21'),
	(39, 14, 'Pemasangan Selesai', '2022-06-21'),
	(40, 7, 'Diajukan', '2022-06-22'),
	(41, 7, 'Disetujui', '2022-06-22'),
	(42, 7, 'Proses Survey Oleh Petugas', '2022-06-22'),
	(43, 7, 'Ditolak', '2022-06-22');
/*!40000 ALTER TABLE `tracking` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `nik`, `nama`, `password`, `alamat`, `kelurahan`, `kecamatan`, `provinsi`, `produk_id`, `no_hp`, `status_pelanggan`, `role_id`, `is_active`, `date_created`, `delete`) VALUES
	(3, 'admin', '6203011906970002', 'Admin', '$2y$10$NK7.Urm/zsrKjMK8Dxr41eVJNVCeAovVVN5N82FP1F7d4sxU1mjty', NULL, NULL, NULL, NULL, NULL, '08123', NULL, 1, 1, 1654763875, 1),
	(4, 'petugas', '321', 'Petugas', '$2y$10$oOeRVgjjVChWq3zCq3GJOulpHeugL68bmNllL5DblIdFro3aNwV16', NULL, NULL, NULL, NULL, NULL, '321', NULL, 2, 1, 1654845446, 1),
	(7, 'coba', '1010', 'Coba', '$2y$10$WC7Xs35ykN/Hj16ENEGgT.qDuwoQDSvuJRWIzC9p2AUEsVAWFp2Ru', 'Kapuas', 'Selat', 'Selat Tengah', 'Kalteng', NULL, '081234', NULL, 3, 1, 1654936348, 1),
	(13, 'bowo', '6203011906970003', 'bowo', '$2y$10$KUlegTHwSc03N0XaeHaslejngMF4Ynz.FPvbY0AG9/nCvUdfTSbbG', 'Banjarmasin', 'BJM', 'bjm', 'KALSEL', NULL, '08123333', NULL, 3, 1, 1655058328, 1),
	(14, 'dimas', '4242434643634643', 'Dimas', '$2y$10$UMev5j9g5Fjz64Pzf9ud7eBPlzzzDXV/C1XEG5/0x5hcS782qjSWO', 'kapuas', 'kapuas', 'kapuas', 'kalteng', NULL, '4645342424', NULL, 3, 1, 1655373824, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user_role` (`role_id`),
  KEY `FK__user_menu` (`menu_id`),
  CONSTRAINT `FK__user_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user_access_menu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
REPLACE INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 3, 5),
	(6, 2, 6),
	(7, 1, 7),
	(8, 1, 8);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel app-listrik.user_menu: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
REPLACE INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'Listrik'),
	(3, 'Petugas'),
	(4, 'User'),
	(5, 'Pelanggan'),
	(6, 'UserPetugas'),
	(7, 'Transaksi'),
	(8, 'Laporan');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- membuang struktur untuk table app-listrik.user_role
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
