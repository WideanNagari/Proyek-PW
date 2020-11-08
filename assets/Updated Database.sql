-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 10:22 AM
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
DROP DATABASE IF EXISTS `outfitlabs`;
CREATE DATABASE IF NOT EXISTS `outfitlabs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `outfitlabs`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nama_barang`, `harga`, `stok`, `deskripsi`) VALUES
('BA001', 'JB001', 'Adidas Athletics Graphic Tee', '330000', '3', ''),
('BA002', 'JB001', 'ASSC X Undefeated 2015 Tee', '2400000', '3', ''),
('BA003', 'JB001', 'Long-sleeved Top Long', '179000', '3', ''),
('BA004', 'JB001', 'RickAndMorty T-Shirt', '249000', '3', ''),
('BA005', 'JB001', 'RipnDip Hiker Nerm Tee', '680000', '3', ''),
('BA006', 'JB001', 'Thrasher Flame T-shirt', '699000', '3', ''),
('BA007', 'JB001', 'V-neck T-shirt Regular', '149000', '2', ''),
('BA008', 'JB002', 'Fred Perry High Neck Dress', '1899000', '4', ''),
('BA009', 'JB002', 'Glittery Shirt', '899000', '4', ''),
('BA010', 'JB002', 'Imitation Leather Shirt Jacket', '599000', '4', ''),
('BA011', 'JB002', 'Jersey Top', '70000', '4', ''),
('BA012', 'JB002', 'Large-collared Blouse leopard', '349000', '4', ''),
('BA013', 'JB002', 'Short Polo-neck Top', '149000', '4', ''),
('BA014', 'JB002', 'Tie-detail Dress', '349000', '4', ''),
('BA015', 'JB003', 'Black Embroidered Unisex Jogger Pants', '240000', '1', ''),
('BA016', 'JB003', 'Dark Blue Straight Pants', '5960000', '3', ''),
('BA017', 'JB003', 'Dark Green Mens Chino', '1199000', '3', ''),
('BA018', 'JB003', 'Lead Pants Speed', '1199000', '3', ''),
('BA019', 'JB003', 'Mens Shredded Slit Wool Pants', '1156000', '3', ''),
('BA020', 'JB003', 'Stripes Davi Pleated Pants', '750000', '3', ''),
('BA021', 'JB003', 'Washed Denim Elastic Pants', '3318000', '3', ''),
('BA022', 'JB004', 'Beige Mina Quarter Check Pants', '6850000', '2', ''),
('BA023', 'JB004', 'Black Faux Leather Patch Jogger Pants', '6190000', '2', ''),
('BA024', 'JB004', 'Blue Stripes Denim Pants', '5580000', '2', ''),
('BA025', 'JB004', 'Brown Check Elba Pants', '5980000', '2', ''),
('BA026', 'JB004', 'Bubblegum Nini Pants', '2250000', '2', ''),
('BA027', 'JB004', 'Grey Long Wide-Leg Paperbag Pants', '11980000', '2', ''),
('BA028', 'JB004', 'Orange Ginger Hemal Wide Leg Trousser', '2190000', '2', ''),
('BA029', 'JB008', 'Checked Print Fringed Blazer', '1799000', '5', ''),
('BA030', 'JB008', 'Cross Button Blazer', '1399000', '2', ''),
('BA031', 'JB005', 'Faux Shearling-Lined Corduroy Jacket', '1399000', '5', ''),
('BA032', 'JB005', 'Faux Shearling-Lined Jacket', '1799000', '5', ''),
('BA033', 'JB008', 'Tweed Blazer', '1799000', '5', ''),
('BA034', 'JB005', 'Wool College Bomber Jacket', '1599000', '5', ''),
('BA035', 'JB009', 'Chain Crossbody Bag', '479000', '4', ''),
('BA036', 'JB006', 'External Pocket Tote Briefcase', '1199000', '4', ''),
('BA037', 'JB009', 'Nylon Baguette Bag', '479000', '2', ''),
('BA038', 'JB006', 'Technical Fabric Backpack', '999000', '3', ''),
('BA039', 'JB006', 'Technical Fabric Cross-Body Bag', '479000', '2', ''),
('BA040', 'JB009', 'Tortoiseshell Baguette Bag', '359000', '4', ''),
('BA041', 'JB007', 'Black White Campo Sneakers', '2650000', '6', ''),
('BA042', 'JB010', 'Fuchsia Hoya Heels Shoes', '6923000', '6', ''),
('BA043', 'JB010', 'Gold Oversized Pearl Heeled Slip On', '2116000', '3', ''),
('BA044', 'JB007', 'Mens Blue White Canvas Sneakers', '3750000', '3', ''),
('BA045', 'JB007', 'Mens Orange Repeat Low Triplet Plain Light', '1990000', '6', ''),
('BA046', 'JB010', 'Multicolor Raffia Printed Canvas Shoes', '4790000', '6', ''),
('BA047', 'JB007', 'White Green Dreamy Leather Sabot', '6790000', '6', '');

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
  `saldo` varchar(20) NOT NULL,
  `akses` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `password`, `email`, `alamat`, `id_provinsi`, `saldo`, `akses`) VALUES
('CU002', 'widean', '$2y$10$sQsx62XrmFx9IT/dCDseiOMyBWnirU1xlqBO9BJIo.oSwomTp5nYq', 'widean@gmail.com', 'aaaas', 'ID016', '4147000', '1'),
('CU003', 'wideann', '$2y$10$ehuhlg6OG.CPMEfSpq9vheacEfSti7HdD1hEzMPkEL6uS00/Crkkq', 'widean@gmail.coms', '', 'ID012', '4674000', '1'),
('CU004', 'user1', '$2y$10$sKFPvKjsgGPqQNy5v0mau.8wU5Axl137PTAQdoF/iQ6avVELVB.Mu', 'user1@gmail.com', 'entah', 'ID027', '0', '0');

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

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `diskon`, `diskon (%)`, `status`) VALUES
('EV001', 'OutfitLabs Anniversary', '0', '30', '0'),
('EV002', 'OutfitLabs ShopFest', '40000', '0', '0'),
('EV003', 'Hari Belanja Online Nasional', '15000', '10', '0'),
('EV004', 'Black Friday', '20000', '20', '0'),
('EV005', 'Super Shopping Day', '50000', '0', '0'),
('EV006', 'x', '12500', '1', '1');

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
('HP001', '45000', '300'),
('HP002', '23000', '240'),
('HP003', '60000', '600'),
('HP004', '50000', '300'),
('HP005', '56000', '420'),
('HP006', '130000', '600'),
('HP007', '140000', '600');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`) VALUES
('JB001', 'Man\'s clothes'),
('JB002', 'Woman\'s clothes'),
('JB003', 'Man\'s trousers'),
('JB004', 'Woman\'s trousers'),
('JB005', 'Man\'s Jacket'),
('JB006', 'Man\'s Bag'),
('JB007', 'Man\'s Shoes'),
('JB008', 'Woman\'s Jacket'),
('JB009', 'Woman\'s Bag'),
('JB010', 'Woman\'s Shoes');

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
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_kirim` varchar(10) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `waktu_kirim` varchar(30) NOT NULL,
  `waktu_sampai` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_kirim`, `id_transaksi`, `waktu_kirim`, `waktu_sampai`, `time`, `status`) VALUES
('KI001', 'TR001', '08 November 2020 at 16:17', '08 November 2020 at 16:21', '1604827278', 'finished');

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
  `harga` varchar(30) NOT NULL,
  `diskon` varchar(30) NOT NULL,
  `ongkos_kirim` varchar(10) NOT NULL,
  `total_harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `nama_barang`, `jumlah`, `harga`, `diskon`, `ongkos_kirim`, `total_harga`) VALUES
('TR001', 'CU002', 'Mens Blue White Canvas Sneaker', '1', '3750000', '0', '26000', '3776000');

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
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_kirim`);

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
