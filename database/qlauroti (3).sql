-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 10:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `t_detail_pemesanan`
--

CREATE TABLE `t_detail_pemesanan` (
  `id_pemesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_ambil` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detail_pemesanan`
--

INSERT INTO `t_detail_pemesanan` (`id_pemesanan`, `id_produk`, `qty_ambil`, `ket`) VALUES
(9, 7, 11, NULL),
(10, 12, 5, NULL),
(11, 31, 20, NULL),
(14, 7, 10, NULL),
(14, 11, 5, NULL),
(14, 14, 9, NULL),
(15, 10, 5, NULL),
(15, 14, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_penjualan`
--

CREATE TABLE `t_detail_penjualan` (
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty_terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_jproduk`
--

CREATE TABLE `t_jproduk` (
  `id_jproduk` int(11) NOT NULL,
  `kode_jproduk` varchar(50) DEFAULT NULL,
  `namajenis_jproduk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jproduk`
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
-- Table structure for table `t_kendaraan`
--

CREATE TABLE `t_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `plat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kendaraan`
--

INSERT INTO `t_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `plat`, `warna`) VALUES
(2, 'Budi Arin', 'B 3538 FHA', 'Hitam'),
(4, 'Aini Izza', 'B 3242 FGE', 'Hitam'),
(5, 'Honda CBR150R', 'B123456', 'Merah'),
(6, 'Honda Scoopy FI', 'F129876', 'Biru'),
(7, 'Honda BeAT110', 'F192846', 'Oren');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_pegawai`, `nama_lengkap`, `telp`, `id_user`, `foto`) VALUES
(1, 'Diya', '08123456789', 2, 'default.jpg'),
(2, 'Beatriz', '0897654321', 10, 'default.jpg'),
(3, 'Gabriel', '064273848347', 19, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(150) NOT NULL,
  `telepon_pelanggan` varchar(14) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `kota`, `kecamatan`, `status`, `id_user`) VALUES
(2, 'PELC', 'PT Honda Lock Indonesia', 'Kawasan Industri MM 2100 Blok NN 8-1, Jl. Irian', '02189982672', 'Bekasi', 'Cikarang', 1, 20),
(3, 'PELC', 'Oreo', 'Jl. Jababeka VII K No.2, Wangunharja', '', 'Bekasi', 'Cikarang Utara', 0, 21),
(4, 'PELC', 'Toyo Denso', 'Blk. KK Jl. Irian No.12, Jatiwangi', '', 'Bekasi', 'Cikarang Barat', 0, NULL),
(5, 'PELC', 'Aika Ebon', 'Jl. Meranti Utara No.89, RT.002/RW.032', '', 'Bekasi', 'Bekasi Utara', 0, NULL),
(6, 'PELC', 'Sutex', 'Jl. Kw. Industri Gobel No.93, RT.5/RW.6', '', 'Bekasi', 'Cikarang Barat', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `id_sales` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `ket_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `id_sales`, `status`, `id_pegawai`, `ket_status`) VALUES
(9, '2020-11-24 03:14:39', 16, 'Telah Dikonfirmasi', 2, 'gudang'),
(10, '2020-12-01 03:25:58', 20, 'Belum Dikonfirmasi', 10, 'keuangan'),
(11, '2020-12-01 03:41:58', 16, 'Belum Dikonfirmasi', 10, 'keuangan'),
(14, '2020-11-30 10:31:06', 16, 'Telah Dikonfirmasi', 2, 'gudang'),
(15, '2020-11-30 10:34:32', 16, 'Belum Dikonfirmasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `tgl_setor` datetime NOT NULL,
  `jumlah_setor` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL DEFAULT 0,
  `id_jproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_produk`, `id_jproduk`) VALUES
(7, 'TAW001', 'Tawar Keju', 7500, 1),
(8, 'TAW002', 'Tawar Pandan', 0, 1),
(9, 'TAW003', 'Tawar Gandum', 0, 1),
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
-- Table structure for table `t_sales`
--

CREATE TABLE `t_sales` (
  `id_sales` int(11) NOT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `nik` int(20) DEFAULT NULL,
  `nama_sales` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sales`
--

INSERT INTO `t_sales` (`id_sales`, `id_kendaraan`, `nik`, `nama_sales`, `foto`, `alamat`, `id_user`) VALUES
(1, 2, 1010291092, 'Taslim', NULL, 'Bekasi', 16),
(2, 4, NULL, 'Hendi', NULL, NULL, 17),
(3, NULL, NULL, 'Ilqi', NULL, NULL, NULL),
(4, NULL, NULL, 'Anwar', NULL, NULL, NULL),
(5, NULL, NULL, 'Abdullah', NULL, NULL, NULL),
(6, NULL, NULL, 'Sueb', NULL, NULL, NULL),
(7, NULL, NULL, 'Ali', NULL, NULL, NULL),
(8, NULL, NULL, 'Ahmad', NULL, NULL, NULL),
(9, NULL, NULL, 'Atam', NULL, NULL, NULL),
(10, NULL, NULL, 'Iday', NULL, NULL, NULL),
(11, NULL, NULL, 'Mamat', NULL, NULL, NULL),
(12, NULL, 102912011, 'Adi', NULL, 'Jakarta', 20),
(13, NULL, NULL, 'Dunta', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`, `level`, `status`) VALUES
(2, 'gudang', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'gudang', 1),
(10, 'keuangan', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'keuangan', 1),
(16, 'sales', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'sales', 1),
(17, 'sales2', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', NULL, 1),
(18, 'admin', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', NULL, 1),
(19, 'pemilik', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'pemilik', 1),
(20, 'pelanggan', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'pelanggan', 1),
(21, 'pelanggan2', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', NULL, 1);

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
  ADD KEY `id` (`id_pegawai`);

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
  MODIFY `id_jproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_kendaraan`
--
ALTER TABLE `t_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detail_pemesanan`
--
ALTER TABLE `t_detail_pemesanan`
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_detail_penjualan`
--
ALTER TABLE `t_detail_penjualan`
  ADD CONSTRAINT `t_detail_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`),
  ADD CONSTRAINT `t_detail_penjualan_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `t_penjualan` (`id_penjualan`);

--
-- Constraints for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD CONSTRAINT `t_pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_pemesanan_ibfk_3` FOREIGN KEY (`id_sales`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_penjualan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `t_pemesanan` (`id_pemesanan`);

--
-- Constraints for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_jproduk`) REFERENCES `t_jproduk` (`id_jproduk`);

--
-- Constraints for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD CONSTRAINT `t_sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_users` (`id`),
  ADD CONSTRAINT `t_sales_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `t_kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
