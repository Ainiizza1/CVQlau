-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Nov 2020 pada 16.00
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
-- Struktur dari tabel `t_jproduk`
--

CREATE TABLE IF NOT EXISTS `t_jproduk` (
  `id_jproduk` int(11) NOT NULL,
  `kode_jproduk` varchar(50) DEFAULT NULL,
  `namajenis_jproduk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jproduk`
--

INSERT INTO `t_jproduk` (`id_jproduk`, `kode_jproduk`, `namajenis_jproduk`) VALUES
(1, 'TAW', 'Tawar'),
(2, 'SOB', 'Sobek'),
(3, 'KAS', 'Kasino'),
(4, 'KUP', 'Kupas'),
(5, 'DON', 'Donat'),
(6, 'Cak', 'Cake'),
(7, 'BRO', 'Brownies'),
(8, 'ABO', 'Abon'),
(9, 'ROT', 'Roti'),
(10, 'CIS', 'Cisroll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(50) NOT NULL,
  `id_jproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_produk`, `id_jproduk`) VALUES
(1, 'TAW001', 'Tawar Keju', '11000', 1),
(2, 'TAW002', 'Tawar Pandan', '7500', 1),
(3, 'TAW003', 'Tawar Gandum', '12000', 1),
(4, 'TAW004', 'Tawar Cip', '11000', 1),
(5, 'TAW005', 'Tawar Coklat', '7500', 1),
(6, 'KUP001', 'Kupas Biasa', '15000', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`, `level`) VALUES
(1, 'koko1', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'admin'),
(2, 'user', '$2y$10$rRUVnUUHdB6dSBJNDLlSH.MS6eOjRNrMqgl3EP143Lns8olDqdTZq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jproduk`
--
ALTER TABLE `t_jproduk`
  ADD PRIMARY KEY (`id_jproduk`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jproduk` (`id_jproduk`);

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
  MODIFY `id_jproduk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`id_jproduk`) REFERENCES `t_jproduk` (`id_jproduk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
