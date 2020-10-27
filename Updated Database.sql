-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 04:12 AM
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
  `id_provinsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis barang`
--

CREATE TABLE `jenis barang` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(10) NOT NULL,
  `nama_kurir` varchar(30) NOT NULL,
  `tambahan_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
('ID001', 'Aceh'),
('ID002', 'Sumatra Utara'),
('ID003', 'Sumatra Barat'),
('ID004', 'Riau'),
('ID005', 'Kepulauan Riau'),
('ID006', 'Jambi'),
('ID007', 'Bengkulu'),
('ID008', 'Sumatra Selatan'),
('ID009', 'Kepulauan Bangka Belitung'),
('ID010', 'Lampung'),
('ID011', 'Banten'),
('ID012', 'Jawa Barat'),
('ID013', 'DKI Jakarta'),
('ID014', 'Jawa Tengah'),
('ID015', 'DI Yogyakarta'),
('ID016', 'Jawa Timur'),
('ID017', 'Bali'),
('ID018', 'Nusa Tenggara Barat'),
('ID019', 'Nusa Tenggara Timur'),
('ID020', 'Kalimantan Barat'),
('ID021', 'Kalimantan Selatan'),
('ID022', 'Kalimantan Tengah'),
('ID023', 'Kalimantan Timur'),
('ID024', 'Kalimantan Utara'),
('ID025', 'Gorontalo'),
('ID026', 'Sulawesi Barat'),
('ID027', 'Sulawesi Selatan'),
('ID028', 'Sulawesi Tengah'),
('ID029', 'Sulawesi Tenggara'),
('ID030', 'Sulawesi Utara'),
('ID031', 'Maluku'),
('ID032', 'Maluku Utara'),
('ID033', 'Papua Barat'),
('ID034', 'Papua');

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
