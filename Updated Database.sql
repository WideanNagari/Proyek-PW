-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 10:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outfitlabs`
--
CREATE DATABASE IF NOT EXISTS `outfitlabs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `outfitlabs`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_provinsi` varchar(10) NOT NULL,
  `saldo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` varchar(10) NOT NULL,
  `nama_event` varchar(30) NOT NULL,
  `diskon` varchar(20) NOT NULL DEFAULT '0',
  `diskon (%)` varchar(10) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harga_pengiriman`
--

CREATE TABLE `harga_pengiriman` (
  `id_harga` varchar(10) NOT NULL,
  `harga_kirim` varchar(30) NOT NULL,
  `waktu_pengiriman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_pengiriman`
--

INSERT INTO `harga_pengiriman` (`id_harga`, `harga_kirim`, `waktu_pengiriman`) VALUES
('HP001', '45000', '5'),
('HP002', '23000', '4'),
('HP003', '60000', '10'),
('HP004', '50000', '5'),
('HP005', '56000', '7'),
('HP006', '130000', '10'),
('HP007', '140000', '10');

-- --------------------------------------------------------

--
-- Table structure for table `jenis barang`
--

CREATE TABLE `jenis barang` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis barang`
--

INSERT INTO `jenis barang` (`id_jenis`, `nama_jenis`) VALUES
('JK001', 'Man\'s clothes'),
('JK002', 'Woman\'s clothes'),
('JK003', 'Jacket'),
('JK004', 'Bag'),
('JK005', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(10) NOT NULL,
  `nama_kurir` varchar(30) NOT NULL,
  `tambahan_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `tambahan_harga`) VALUES
('KU001', 'JNE', 3000),
('KU002', 'J&T', 5000),
('KU003', 'TIKI', 7000),
('KU004', 'POS', 9000),
('KU005', 'WAHANA', 10000),
('KU006', 'NINJA EXPRESS', 5000),
('KU007', 'SiCepat', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL,
  `id_harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `id_harga`) VALUES
('ID001', 'Aceh', 'HP001'),
('ID002', 'Sumatra Utara', 'HP001'),
('ID003', 'Sumatra Barat', 'HP001'),
('ID004', 'Riau', 'HP001'),
('ID005', 'Kepulauan Riau', 'HP001'),
('ID006', 'Jambi', 'HP001'),
('ID007', 'Bengkulu', 'HP001'),
('ID008', 'Sumatra Selatan', 'HP001'),
('ID009', 'Kepulauan Bangka Belitung', 'HP001'),
('ID010', 'Lampung', 'HP001'),
('ID011', 'Banten', 'HP002'),
('ID012', 'Jawa Barat', 'HP002'),
('ID013', 'DKI Jakarta', 'HP002'),
('ID014', 'Jawa Tengah', 'HP002'),
('ID015', 'DI Yogyakarta', 'HP002'),
('ID016', 'Jawa Timur', 'HP002'),
('ID017', 'Bali', 'HP003'),
('ID018', 'Nusa Tenggara Barat', 'HP003'),
('ID019', 'Nusa Tenggara Timur', 'HP003'),
('ID020', 'Kalimantan Barat', 'HP004'),
('ID021', 'Kalimantan Selatan', 'HP004'),
('ID022', 'Kalimantan Tengah', 'HP004'),
('ID023', 'Kalimantan Timur', 'HP004'),
('ID024', 'Kalimantan Utara', 'HP004'),
('ID025', 'Gorontalo', 'HP005'),
('ID026', 'Sulawesi Barat', 'HP005'),
('ID027', 'Sulawesi Selatan', 'HP005'),
('ID028', 'Sulawesi Tengah', 'HP005'),
('ID029', 'Sulawesi Tenggara', 'HP005'),
('ID030', 'Sulawesi Utara', 'HP005'),
('ID031', 'Maluku', 'HP006'),
('ID032', 'Maluku Utara', 'HP006'),
('ID033', 'Papua Barat', 'HP007'),
('ID034', 'Papua', 'HP007');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `waktu` date NOT NULL,
  `harga` varchar(30) NOT NULL,
  `diskon` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `harga_pengiriman`
--
ALTER TABLE `harga_pengiriman`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jenis barang`
--
ALTER TABLE `jenis barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
