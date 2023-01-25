-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 02:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bahan Kue'),
(2, 'Bumbu Masak'),
(3, 'Minuman Saset');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` int(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`) VALUES
(1, 'Terigu Segitiga', 1, 30000),
(2, 'Tepung Hunkwee', 1, 20000),
(5, 'Tepung Panir', 1, 7000),
(6, 'Kopi Kapal Api', 3, 1500),
(7, 'Kopi Luwak', 3, 1700),
(8, 'Saus McLewis', 2, 7500),
(9, 'Mayonaise Maestro', 2, 8500);

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id_keluar` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `qty_keluar` int(255) NOT NULL,
  `tgl_keluar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_keluar`
--

INSERT INTO `produk_keluar` (`id_keluar`, `id_produk`, `qty_keluar`, `tgl_keluar`) VALUES
(1, 1, 100, '2023-01-23 08:43:54'),
(2, 2, 10, '2023-01-23 08:44:10'),
(3, 5, 20, '2023-01-25 01:41:21'),
(4, 6, 30, '2023-01-25 01:41:26'),
(5, 6, 30, '2023-01-25 01:41:32'),
(6, 7, 70, '2023-01-25 01:41:39'),
(7, 8, 40, '2023-01-25 01:41:44'),
(8, 9, 10, '2023-01-25 01:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_masuk` int(255) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `id_supplier` int(255) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `qty` int(255) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_masuk`, `id_produk`, `id_supplier`, `kadaluarsa`, `qty`, `tgl_masuk`) VALUES
(1, 1, 1, '2023-01-27', 10, '2023-01-23 07:07:26'),
(2, 2, 3, '2023-01-27', 10, '2023-01-23 07:07:39'),
(3, 1, 1, '2023-02-02', 100, '2023-01-23 23:22:41'),
(4, 1, 1, '2023-03-01', 1, '2023-01-24 22:39:36'),
(5, 5, 4, '2023-03-16', 150, '2023-01-25 01:37:27'),
(6, 6, 3, '2023-03-01', 200, '2023-01-25 01:37:48'),
(7, 7, 1, '2023-03-30', 250, '2023-01-25 01:38:10'),
(8, 8, 1, '2023-04-06', 200, '2023-01-25 01:38:28'),
(9, 9, 3, '2023-04-13', 250, '2023-01-25 01:38:47'),
(10, 5, 3, '2023-03-03', 60, '2023-01-25 01:39:05'),
(11, 6, 1, '2023-04-21', 30, '2023-01-25 01:39:18'),
(12, 7, 4, '2023-04-08', 20, '2023-01-25 01:40:56'),
(13, 9, 4, '2023-03-24', 20, '2023-01-25 01:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(255) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telpon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `email`, `telpon`) VALUES
(1, 'Sumber Plastik', 'Jl. Ki Hajar Dewantoro no. 8 Kaweron Talun', 'sumberplastik@gmail.com', '089966748387'),
(3, 'Bintang Plastik', 'Jl Asemka Psr Pagi Los SS Lt Dasar/29, Roa Malaka, Tambora', 'bintangplas@gmail.com', '08993782634'),
(4, 'Surya Makmur Plast', 'Jl Husein Sastranegara Pergudangan Nusa Indah', 'suryamp@gmail.com', '08998992618');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_produk` (`id_produk`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_keluar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_masuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD CONSTRAINT `produk_keluar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD CONSTRAINT `produk_masuk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `produk_masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
