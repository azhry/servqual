-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 02:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(30) NOT NULL,
  `id_kategori_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('1','0','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(5) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `jawaban`, `id_pertanyaan`, `skor`) VALUES
(1, 'Sangat tidak puas', 1, 1),
(2, 'Tidak puas', 1, 2),
(3, 'Cukup puas', 1, 3),
(4, 'Puas', 1, 4),
(5, 'Sangat puas', 1, 5),
(6, 'Sangat tidak puas', 2, 1),
(7, 'Tidak puas', 2, 2),
(8, 'Cukup puas', 2, 3),
(9, 'Puas', 2, 4),
(10, 'Sangat puas', 2, 5),
(11, 'Sangat tidak puas', 3, 1),
(12, 'Tidak puas', 3, 2),
(13, 'Cukup puas', 3, 3),
(14, 'Puas', 3, 4),
(15, 'Sangat puas', 3, 5),
(16, 'Sangat tidak puas', 4, 1),
(17, 'Tidak puas', 4, 2),
(18, 'Cukup puas', 4, 3),
(19, 'Puas', 4, 4),
(20, 'Sangat puas', 4, 5),
(21, 'Sangat tidak puas', 5, 1),
(22, 'Tidak puas', 5, 2),
(23, 'Cukup puas', 5, 3),
(24, 'Puas', 5, 4),
(25, 'Sangat puas', 5, 5),
(26, 'Sangat tidak puas', 6, 1),
(27, 'Tidak puas', 6, 2),
(28, 'Cukup Puas', 6, 3),
(29, 'Puas', 6, 4),
(30, 'Sangat puas', 6, 5),
(31, 'Sangat tidak puas', 7, 1),
(32, 'Tidak puas', 7, 2),
(33, 'Cukup puas', 7, 3),
(34, 'Puas', 7, 4),
(35, 'Sangat puas', 7, 5),
(36, 'Sangat tidak puas', 8, 1),
(37, 'Tidak puas', 8, 2),
(38, 'Cukup puas', 8, 3),
(39, 'Puas', 8, 4),
(40, 'Sangat puas', 8, 5),
(41, 'Sangat tidak puas', 9, 1),
(42, 'Tidak puas', 9, 2),
(43, 'Cukup puas', 9, 3),
(44, 'Puas', 9, 4),
(45, 'Sangat puas', 9, 5),
(46, 'Sangat tidak puas', 10, 1),
(47, 'Tidak puas', 10, 2),
(48, 'Cukup puas', 10, 3),
(49, 'Puas', 10, 4),
(50, 'Sangat puas', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pengguna`
--

CREATE TABLE `jawaban_pengguna` (
  `id_jawaban_pengguna` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `kurir` varchar(30) NOT NULL,
  `ongkir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_role`, `username`, `password`, `email`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(1, 2, 'ayu', '985fabf8f96dc1c4c306341031569937', 'aa', 'Ayu Lestari', 'Perempuan', 'aaa', '088888');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'Menurut anda, bagaimana informasi detail produk yang terdapat dalam web?'),
(2, 'Menurut anda, bagaimana dengan transaksi pembelian barang pada website kami?'),
(3, 'Menurut anda, bagaimana dengan tampilan website kami?'),
(4, 'Menurut anda, bagaimana dengan pelayanan dan informasi yang kami tampilkan di dalam website kami?'),
(5, 'Menurut anda, bagaimana pelayanan diskon pembelian barang pada website kami?'),
(6, 'Menurut anda, bagaimana fitur notifikasi update terbaru pada website kami?'),
(7, 'Menurut anda, bagaimana fitur layanan \"Tren Products\" pada website kami?'),
(8, 'Menurut anda, bagaimana fitur-fitur FAQ yang terdapat pada website kami?'),
(9, 'Menurut anda, bagaimana fitur kritik dan saran yang terdapat pada website kami?'),
(10, 'Menurut anda, bagaimana fitur-fitur membandingkan antar produk-produk pada website kami?');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'pengguna'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_kategori_barang` (`id_kategori_barang`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pengguna`
--
ALTER TABLE `jawaban_pengguna`
  ADD PRIMARY KEY (`id_jawaban_pengguna`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `jawaban_pengguna`
--
ALTER TABLE `jawaban_pengguna`
  MODIFY `id_jawaban_pengguna` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori_barang`) REFERENCES `kategori_barang` (`id_kategori_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `barang` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
