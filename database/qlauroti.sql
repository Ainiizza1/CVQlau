-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2021 pada 08.11
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlauroti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_detail_pemesanan` (
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_ambil` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_detail_pemesanan`
--

INSERT INTO `t_detail_pemesanan` (`id_pemesanan`, `id_produk`, `qty_ambil`, `ket`) VALUES
(9, 7, 11, NULL),
(10, 12, 3, NULL),
(11, 31, 20, NULL),
(14, 7, 10, NULL),
(14, 11, 5, NULL),
(14, 14, 9, NULL),
(16, 8, 1, NULL),
(16, 10, 2, NULL),
(16, 9, 2, NULL),
(18, 14, 2, NULL),
(19, 14, 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `t_detail_penjualan` (
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jproduk`
--

CREATE TABLE IF NOT EXISTS `t_jproduk` (
  `id_jproduk` int(11) NOT NULL,
  `kode_jproduk` varchar(50) DEFAULT NULL,
  `namajenis_jproduk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jproduk`
--

INSERT INTO `t_jproduk` (`id_jproduk`, `kode_jproduk`, `namajenis_jproduk`) VALUES
(1, 'TAW', 'Tawar'),
(3, 'SOB', 'Sobek'),
(4, 'KUP', 'Kupas'),
(5, 'DON', 'Donat'),
(6, 'Cak', 'Cake'),
(7, 'BRO', 'Brownies'),
(8, 'ABO', 'Abon'),
(9, 'ROT', 'Roti'),
(10, 'CIS', 'Cisroll'),
(15, 'KAS', 'Kasino');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kendaraan`
--

CREATE TABLE IF NOT EXISTS `t_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kendaraan`
--

INSERT INTO `t_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `plat`, `warna`) VALUES
(8, 'Honda Revo X', 'B 3258 KXN', 'Hitam'),
(9, 'Honda Revo X', 'B 4040 FCM', 'Hitam'),
(10, 'Honda Revo X', 'B 3277 KXN', 'Hitam'),
(11, 'Honda Revo X', 'B 3790 KXL', 'Hitam'),
(13, 'Honda Revo X', 'B 4044 KRK', 'Hitam'),
(14, 'Honda Revo X', 'B 4030 KRK', 'Hitam'),
(15, 'Honda Revo X', 'B 4048 KRK', 'Hitam'),
(16, 'Honda Revo X', 'B 4037 KRK', 'Hitam'),
(17, 'Honda Revo X', 'B 4035 KRK', 'Hitam'),
(18, 'Honda Revo X', 'B 4029 KRK', 'Hitam'),
(19, 'Honda Revo X', 'B 4027 KRK', 'Hitam'),
(20, 'Honda Revo X', 'B 4046 KRK', 'Hitam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE IF NOT EXISTS `t_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_pegawai`, `nama_lengkap`, `telp`, `id_user`, `foto`) VALUES
(1, 'Diya', '08123456789', 2, 'default.jpg'),
(2, 'Beatriz', '0897654321', 10, 'default.jpg'),
(3, 'Gabriel4', '0642738483474', 35, 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggan`
--

CREATE TABLE IF NOT EXISTS `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(150) NOT NULL,
  `telepon_pelanggan` varchar(14) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `kota`, `kecamatan`, `status`, `id_user`) VALUES
(19, 'PELC', 'PT Toyo Denso Indonesia', 'Kawasan Industri MM 2100, Jl Irian 	Blok KK No. 12', '02189982626', 'Bekasi', 'Jatiwangi', 1, 46);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `id_sales` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `ket_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `id_sales`, `status`, `id_pegawai`, `ket_status`) VALUES
(9, '2020-11-24 03:14:39', 16, 'Telah Dikonfirmasi', 2, 'gudang'),
(10, '2020-12-01 03:25:58', 20, 'Belum Dikonfirmasi', 10, 'keuangan'),
(11, '2020-12-01 03:41:58', 16, 'Belum Dikonfirmasi', 10, 'keuangan'),
(14, '2020-11-30 10:31:06', 16, 'Telah Dikonfirmasi', 2, 'gudang'),
(16, '2020-12-07 05:41:54', 16, 'Belum Dikonfirmasi', NULL, NULL),
(18, '2020-12-16 04:30:45', 16, 'Belum Dikonfirmasi', NULL, NULL),
(19, '2021-01-05 01:08:23', 34, 'Belum Dikonfirmasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penjualan`
--

CREATE TABLE IF NOT EXISTS `t_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `tgl_setor` datetime NOT NULL,
  `jumlah_setor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_sales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL DEFAULT '0',
  `id_jproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_produk`, `id_jproduk`) VALUES
(7, 'TAW001', 'Tawar Keju', 7500, 1),
(8, 'TAW002', 'Tawar Pandan', 8000, 1),
(9, 'TAW003', 'Tawar Gandum', 8000, 1),
(10, 'TAW004', 'Tawar Cip', 0, 1),
(11, 'TAW005', 'Tawar Coklat', 0, 1),
(12, 'TAW006', 'Tawar Open Top', 0, 1),
(13, 'SOB001', 'Sobek Kombinasi', 0, 3),
(14, 'SOB002', 'Sobek Coklat', 0, 3),
(15, 'SOB003', 'Sobek Keju', 0, 3),
(16, 'KAS001', 'Kasino', 0, 15),
(17, 'KUP001', 'Kupas Biasa', 0, 4),
(18, 'KUP002', 'Kupas Pandan', 0, 4),
(19, 'DON001', 'Donat 6 (Enam)', 0, NULL),
(20, 'DON002', 'Donat Coklat', 0, NULL),
(21, 'CAK001', 'Cake Strawberry', 0, NULL),
(22, 'BRO001', 'Brownies Coklat', 0, NULL),
(23, 'BRO002', 'Brownies Keju', 0, NULL),
(24, 'ABO001', 'Abon', 0, NULL),
(25, 'ROT001', 'Roti Toping', 0, NULL),
(26, 'ROT002', 'Roti Pis New', 0, NULL),
(27, 'ROT003', 'Roti Sisir', 0, NULL),
(28, 'ROT004', 'Roti Kacang Hijau', 0, NULL),
(29, 'ROT005', 'Roti Keju Susu', 0, NULL),
(30, 'ROT006', 'Roti Panda', 0, NULL),
(31, 'ROT007', 'Roti Srikaya', 0, NULL),
(32, 'ROT008', 'Roti Nanas', 0, NULL),
(33, 'ROT009', 'Roti Kelapa Muda', 0, NULL),
(34, 'ROT010', 'Roti Mocca', 0, NULL),
(35, 'ROT011', 'Roti Coklat', 0, NULL),
(36, 'ROT012', 'Roti Coklat Keju', 0, NULL),
(37, 'ROT013', 'Roti Strawberry', 0, NULL),
(38, 'ROT014', 'Roti Sosis', 0, NULL),
(39, 'ROT015', 'Roti Pisang Cup', 0, NULL),
(40, 'ROT016', 'Roti Keju', 0, NULL),
(41, 'ROT017', 'Roti Pisang Coklat', 0, NULL),
(42, 'ROT018', 'Roti Pisang Keju', 0, NULL),
(43, 'ROT019', 'Roti Tiga Rasa', 0, NULL),
(44, 'ROT020', 'Roti Longjon Coklat', 0, NULL),
(45, 'ROT021', 'Roti Longjon Keju', 0, NULL),
(46, 'ROT022', 'Roti Cappucino', 0, NULL),
(47, 'ROT023', 'Roti Pizza', 0, NULL),
(48, 'ROT024', 'Roti Polo Coklat', 0, NULL),
(49, 'ROT025', 'Roti Polo Nanas', 0, NULL),
(50, 'ROT026', 'Roti Gulung Kombinasi', 0, NULL),
(51, 'ROT027', 'Roti Gulung Abon', 0, NULL),
(52, 'ROT028', 'Roti Blueberry Keju', 0, NULL),
(53, 'ROT029', 'Roti Mickey Mouse', 0, NULL),
(54, 'ROT030', 'Roti Kura-Kura', 0, NULL),
(55, 'ROT031', 'Roti Buaya', 0, NULL),
(56, 'CIS001', 'Cisroll', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sales`
--

CREATE TABLE IF NOT EXISTS `t_sales` (
  `id_sales` int(11) NOT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sales`
--

INSERT INTO `t_sales` (`id_sales`, `id_kendaraan`, `nik`, `nama_sales`, `foto`, `alamat`, `id_user`) VALUES
(2, 16, NULL, 'Hendi', NULL, NULL, 17),
(3, NULL, NULL, 'Ilqi', NULL, NULL, NULL),
(4, NULL, NULL, 'Anwar', NULL, NULL, NULL),
(5, NULL, NULL, 'Abdullah', NULL, NULL, NULL),
(6, NULL, NULL, 'Sueb', NULL, NULL, NULL),
(7, NULL, NULL, 'Ali', NULL, NULL, NULL),
(8, NULL, NULL, 'Ahmad', NULL, NULL, NULL),
(9, NULL, NULL, 'Atam', NULL, NULL, NULL),
(10, NULL, NULL, 'Iday', NULL, NULL, NULL),
(11, NULL, NULL, 'Mamat', NULL, NULL, NULL),
(12, NULL, '102912011', 'Adi', NULL, 'Jakarta', 20),
(13, NULL, NULL, 'Dunta', NULL, NULL, NULL),
(15, NULL, '2147483647', '', NULL, 'sales 1', NULL),
(16, NULL, '2147483647', '', NULL, 'jkhjh', NULL),
(17, NULL, '123456', '', NULL, 'fdgb', NULL),
(18, NULL, '234567', 'trytr', NULL, 'tyrty', NULL),
(19, NULL, '2147483647', 'Sales 8', NULL, 'Sales 8', NULL),
(23, 18, '2147483647', 'Sales 9', NULL, 'Sales 9', NULL),
(24, 18, '12345678912', 'Siapa1', NULL, 'Siapa1', 32),
(25, 14, '23456744566124', 'Sales12', 'Penguins.jpg', 'sales10', 33),
(26, 9, '3215615689086512', 'Aini Izza2', 'Aini Izza KTP.jpg', 'Jl Tubagus ', 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`, `level`, `status`) VALUES
(2, 'gudang', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'gudang', 1),
(10, 'keuangan', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'keuangan', 1),
(16, 'sales', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'sales', 1),
(17, 'sales2', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', NULL, 1),
(18, 'admin', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', NULL, 1),
(19, 'pemilik1', '$2y$10$boH7/Smx8p1n5fReQEvaMep5YnTflHdU11//JloLkoCM1abrW.XcS', 'gudang', 1),
(20, 'pelanggan', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'pelanggan', 1),
(22, 'sales10', '$2y$10$OJwjWhlkmR6UmZwOTrRVwuxJHk8dKc9BONnRCKynglVJSztsjBGOu', 'sales', 1),
(23, 'sales88', '$2y$10$DWd50jwTXeZtOzFXlpZjcOQbTC4j74Pd8c3wOgGFFUnBfcI8bwXci', 'sales', 1),
(24, 'coba1', '$2y$10$fcRF/OQLbf8K8bl9ka2y9uJUAQXKFZ0GW3R4E2PWdxJOG.z6Xg3r6', 'sales', 1),
(25, 'coba1', '$2y$10$YK7nSIwqYkgIO2r.e.7wfeUZIhZBbhCIneQETxcka7J6YoLTXuM9.', 'sales', 1),
(26, 'coba2', '$2y$10$.NtXB.YAKs6a1tXE7HF8ceUuJ5IelkOaHVWEu6z.daIT3b6gQKBtm', 'sales', 1),
(27, 'huhu1', '$2y$10$OjO3j5WAToYxvg69JgcHYeMEDVYslnwnICPyi8isjcrERoWTls862', 'sales', 1),
(28, 'dono1', '$2y$10$Q5DYPWiZyVPjjqAo5Y/gfumWymh5zGCWrOGO8AVQ.n2qY.feo9Ok6', 'sales', 1),
(29, 'dono1', '$2y$10$a.tsiP4SsHZPgLA4HmIRs.1tPPtn6Nb9A8TfFmpzf1jhW7FiAP1WG', 'sales', 1),
(30, 'dono2', '$2y$10$AhXs6mm/FZseD6pKpaMeG.fC51NknDBricz2jBWMrNeJoiRK6m.6e', 'sales', 1),
(31, 'dini1', '$2y$10$JEKFoCnloD09cbRHYDs.o.YtaX3xlHDnzsZ0YOyCaG1LhCuzrAFCW', 'sales', 1),
(32, 'siapa1', '$2y$10$QteG.xUHSpP6Eq/aP8BHvuI5hqQE00DO.hrtHthC2otXwdbR4D7ru', 'sales', 1),
(33, 'sales10', '$2y$10$OyQ.XP5UfWEtL/seKgi7ke47LSQ7mPfLC48XmUBCINmuDtDtQHGk.', 'sales', 1),
(34, 'sales11', '$2y$10$Oq8PEsexF3oOA6PZzYfNPOoO1bbm82.Z0rShzpEHnDPwX0uRRLnTq', 'sales', 1),
(35, 'pemilik4', '$2y$10$ZDcsPt6AVwkH3jyJnwQ7fuqw0vXtZWKvWeN450WktQSK1RVvzek16', 'admin', 1),
(36, 'gudangmiu5', '$2y$10$B.5Zrm350s47qdC4eqljweqAMEu6NJJNYwiORKXdQR4FqA8uplOUW', 'keuangan', 1),
(38, 'ainiadmin2', '$2y$10$Q1P9ngzKdekqTXp.nVbhwOR6Kdz1HMdfsyinse58E8zhtB8dsuXtS', 'sales', 1),
(39, 'pelsamsung3', 'samsung3', 'pelanggan', 1),
(46, 'peldenso2', '$2y$10$QIP0v0gOBcEsg1AhvxmGq.4HyvLOUj1Ai5cGzqh8cYvszoQN6ADX6', 'pelanggan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detail_pemesanan`
--
ALTER TABLE `t_detail_pemesanan`
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_detail_penjualan`
--
ALTER TABLE `t_detail_penjualan`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `t_jproduk`
--
ALTER TABLE `t_jproduk`
  ADD PRIMARY KEY (`id_jproduk`);

--
-- Indexes for table `t_kendaraan`
--
ALTER TABLE `t_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `t_pemesanan_ibfk_3` (`id_sales`),
  ADD KEY `id` (`id_pegawai`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id` (`id_pegawai`),
  ADD KEY `id_sales` (`id_sales`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jproduk` (`id_jproduk`);

--
-- Indexes for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jproduk`
--
ALTER TABLE `t_jproduk`
  MODIFY `id_jproduk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `t_kendaraan`
--
ALTER TABLE `t_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_detail_pemesanan`
--
ALTER TABLE `t_detail_pemesanan`
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `t_detail_penjualan`
--
ALTER TABLE `t_detail_penjualan`
  ADD CONSTRAINT `t_detail_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`),
  ADD CONSTRAINT `t_detail_penjualan_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `t_penjualan` (`id_penjualan`);

--
-- Ketidakleluasaan untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD CONSTRAINT `t_pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_pemesanan_ibfk_3` FOREIGN KEY (`id_sales`) REFERENCES `t_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_penjualan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `t_penjualan_ibfk_3` FOREIGN KEY (`id_sales`) REFERENCES `t_sales` (`id_sales`);

--
-- Ketidakleluasaan untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_jproduk`) REFERENCES `t_jproduk` (`id_jproduk`);

--
-- Ketidakleluasaan untuk tabel `t_sales`
--
ALTER TABLE `t_sales`
  ADD CONSTRAINT `t_sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_sales_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `t_kendaraan` (`id_kendaraan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
