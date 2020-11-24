-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 03:41 PM
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
  `nama_barang` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `view` int(10) NOT NULL DEFAULT 0,
  `rate` float NOT NULL DEFAULT 5,
  `path` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nama_barang`, `harga`, `stok`, `deskripsi`, `view`, `rate`, `path`) VALUES
('BA001', 'JB001', 'Adidas Athletics Graphic Tee', '330000', '3', '', 0, 5, './assets/pic/BA001.png'),
('BA002', 'JB001', 'ASSC X Undefeated 2015 Tee', '2400000', '3', '', 0, 5, './assets/pic/BA002.png'),
('BA003', 'JB001', 'Long-sleeved Top Long', '179000', '3', '', 0, 5, './assets/pic/BA003.png'),
('BA004', 'JB001', 'RickAndMorty T-Shirt', '249000', '3', '', 0, 5, './assets/pic/BA004.png'),
('BA005', 'JB001', 'RipnDip Hiker Nerm Tee', '680000', '3', '', 0, 5, './assets/pic/BA005.png'),
('BA006', 'JB001', 'Thrasher Flame T-shirt', '699000', '3', '', 0, 5, './assets/pic/BA006.png'),
('BA007', 'JB001', 'V-neck T-shirt Regular', '149000', '2', '', 0, 5, './assets/pic/BA007.png'),
('BA008', 'JB002', 'Fred Perry High Neck Dress', '1899000', '3', '', 0, 5, './assets/pic/BA008.png'),
('BA009', 'JB002', 'Glittery Shirt', '899000', '4', '', 0, 5, './assets/pic/BA009.png'),
('BA010', 'JB002', 'Imitation Leather Shirt Jacket', '599000', '4', '', 0, 5, './assets/pic/BA010.png'),
('BA011', 'JB002', 'Jersey Top', '70000', '4', '', 0, 5, './assets/pic/BA011.png'),
('BA012', 'JB002', 'Large-collared Blouse leopard', '349000', '4', '', 0, 5, './assets/pic/BA012.png'),
('BA013', 'JB002', 'Short Polo-neck Top', '149000', '4', '', 0, 5, './assets/pic/BA013.png'),
('BA014', 'JB002', 'Tie-detail Dress', '349000', '4', '', 0, 5, './assets/pic/BA014.png'),
('BA015', 'JB003', 'Black Embroidered Unisex Jogger Pants', '240000', '1', '', 0, 5, './assets/pic/BA015.png'),
('BA016', 'JB003', 'Dark Blue Straight Pants', '5960000', '3', '', 0, 5, './assets/pic/BA016.png'),
('BA017', 'JB003', 'Dark Green Mens Chino', '1199000', '3', '', 0, 5, './assets/pic/BA017.png'),
('BA018', 'JB003', 'Lead Pants Speed', '1199000', '3', '', 0, 5, './assets/pic/BA018.png'),
('BA019', 'JB003', 'Mens Shredded Slit Wool Pants', '1156000', '3', '', 0, 5, './assets/pic/BA019.png'),
('BA020', 'JB003', 'Stripes Davi Pleated Pants', '750000', '3', '', 0, 5, './assets/pic/BA020.png'),
('BA021', 'JB003', 'Washed Denim Elastic Pants', '3318000', '3', '', 0, 5, './assets/pic/BA021.png'),
('BA022', 'JB004', 'Beige Mina Quarter Check Pants', '6850000', '1', '', 0, 5, './assets/pic/BA022.png'),
('BA023', 'JB004', 'Black Faux Leather Patch Jogger Pants', '6190000', '2', '', 0, 5, './assets/pic/BA023.png'),
('BA024', 'JB004', 'Blue Stripes Denim Pants', '5580000', '2', '', 0, 5, './assets/pic/BA024.png'),
('BA025', 'JB004', 'Brown Check Elba Pants', '5980000', '2', '', 0, 5, './assets/pic/BA025.png'),
('BA026', 'JB004', 'Bubblegum Nini Pants', '2250000', '2', '', 0, 5, './assets/pic/BA026.png'),
('BA027', 'JB004', 'Grey Long Wide-Leg Paperbag Pants', '11980000', '2', '', 0, 5, './assets/pic/BA027.png'),
('BA028', 'JB004', 'Orange Ginger Hemal Wide Leg Trousser', '2190000', '2', '', 0, 5, './assets/pic/BA028.png'),
('BA029', 'JB008', 'Checked Print Fringed Blazer', '1799000', '5', '', 0, 5, './assets/pic/BA029.png'),
('BA030', 'JB008', 'Cross Button Blazer', '1399000', '2', '', 0, 5, './assets/pic/BA030.png'),
('BA031', 'JB005', 'Faux Shearling-Lined Corduroy Jacket', '1399000', '5', '', 0, 5, './assets/pic/BA031.png'),
('BA032', 'JB005', 'Faux Shearling-Lined Jacket', '1799000', '5', '', 0, 5, './assets/pic/BA032.png'),
('BA033', 'JB008', 'Tweed Blazer', '1799000', '5', '', 0, 5, './assets/pic/BA033.png'),
('BA034', 'JB005', 'Wool College Bomber Jacket', '1599000', '5', '', 0, 5, './assets/pic/BA034.png'),
('BA035', 'JB009', 'Chain Crossbody Bag', '479000', '4', '', 0, 5, './assets/pic/BA035.png'),
('BA036', 'JB006', 'External Pocket Tote Briefcase', '1199000', '4', '', 0, 5, './assets/pic/BA036.png'),
('BA037', 'JB009', 'Nylon Baguette Bag', '479000', '1', '', 0, 5, './assets/pic/BA037.png'),
('BA038', 'JB006', 'Technical Fabric Backpack', '999000', '2', '', 0, 5, './assets/pic/BA038.png'),
('BA039', 'JB006', 'Technical Fabric Cross-Body Bag', '479000', '2', '', 0, 5, './assets/pic/BA039.png'),
('BA040', 'JB009', 'Tortoiseshell Baguette Bag', '359000', '4', '', 0, 5, './assets/pic/BA040.png'),
('BA041', 'JB007', 'Black White Campo Sneakers', '2650000', '5', '', 0, 5, './assets/pic/BA041.png'),
('BA042', 'JB010', 'Fuchsia Hoya Heels Shoes', '6923000', '6', '', 0, 5, './assets/pic/BA042.png'),
('BA043', 'JB010', 'Gold Oversized Pearl Heeled Slip On', '2116000', '1', '', 0, 5, './assets/pic/BA043.png'),
('BA044', 'JB007', 'Mens Blue White Canvas Sneakers', '3750000', '1', '', 0, 5, './assets/pic/BA044.png'),
('BA045', 'JB007', 'Mens Orange Repeat Low Triplet Plain Light', '1990000', '5', '', 0, 5, './assets/pic/BA045.png'),
('BA046', 'JB010', 'Multicolor Raffia Printed Canvas Shoes', '4790000', '6', '', 0, 5, './assets/pic/BA046.png'),
('BA047', 'JB007', 'White Green Dreamy Leather Sabot', '6790000', '6', '', 0, 5, './assets/pic/BA047.png');

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
('CU002', 'widean', '$2y$10$sQsx62XrmFx9IT/dCDseiOMyBWnirU1xlqBO9BJIo.oSwomTp5nYq', 'widean@gmail.com', 'aaaas', 'ID016', '975771220', '1'),
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
-- Table structure for table `mybag`
--

CREATE TABLE `mybag` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL DEFAULT 0,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mybag`
--

INSERT INTO `mybag` (`id`, `id_user`, `id_barang`, `jumlah`, `status`) VALUES
(2, 'CU002', 'BA029', 1, 1),
(4, 'CU002', 'BA030', 0, 1);

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
('KI001', 'TR001', '08 November 2020 at 16:17', '08 November 2020 at 16:21', '1604827278', 'finished'),
('KI002', 'TR001', '21 November 2020 at 20:32', '21 November 2020 at 20:36', '1605965792', 'finished'),
('KI003', 'TR002', '21 November 2020 at 21:04', '21 November 2020 at 21:08', '1605967720', 'finished'),
('KI004', 'TR003', '21 November 2020 at 22:10', '21 November 2020 at 22:14', '1605971652', 'finished'),
('KI005', 'TR004', '21 November 2020 at 22:10', '21 November 2020 at 22:14', '1605971652', 'finished'),
('KI006', 'TR005', '21 November 2020 at 22:10', '21 November 2020 at 22:14', '1605971652', 'finished'),
('KI007', 'TR006', '21 November 2020 at 22:18', '21 November 2020 at 22:22', '1605972155', 'finished'),
('KI008', 'TR007', '21 November 2020 at 22:24', '21 November 2020 at 22:28', '1605972505', 'finished'),
('KI009', 'TR008', '21 November 2020 at 22:29', '21 November 2020 at 22:33', '1605972794', 'finished'),
('KI010', 'TR009', '21 November 2020 at 22:29', '21 November 2020 at 22:33', '1605972794', 'finished'),
('KI011', 'TR010', '22 November 2020 at 22:04', '22 November 2020 at 22:08', '1606057739', 'finished');

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
  `total_harga` varchar(30) NOT NULL,
  `rating` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `nama_barang`, `jumlah`, `harga`, `diskon`, `ongkos_kirim`, `total_harga`, `rating`) VALUES
('TR001', 'CU002', 'Gold Oversized Pearl Heeled Sl', '1', '2116000', '0', '26000', '2142000', ''),
('TR002', 'CU002', 'Mens Blue White Canvas Sneaker', '1', '3750000', '0', '29000', '3779000', '-'),
('TR003', 'CU002', 'Black White Campo Sneakers', '1', '2650000', '0', '26000', '2676000', '-'),
('TR004', 'CU002', 'Mens Orange Repeat Low Triplet', '1', '1990000', '0', '26000', '2016000', '3'),
('TR005', 'CU002', 'Fred Perry High Neck Dress', '1', '1899000', '0', '26000', '1925000', '-'),
('TR006', 'CU002', 'Mens Blue White Canvas Sneaker', '1', '3750000', '0', '26000', '3776000', '-'),
('TR007', 'CU002', 'Nylon Baguette Bag', '1', '479000', '0', '26000', '505000', '-'),
('TR008', 'CU002', 'Technical Fabric Backpack', '1', '999000', '0', '26000', '1025000', '-'),
('TR009', 'CU002', 'Beige Mina Quarter Check Pants', '1', '6850000', '0', '26000', '6876000', '-'),
('TR010', 'CU002', 'Gold Oversized Pearl Heeled Sl', '1', '2116000', '0', '26000', '2142000', '-');

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
-- Indexes for table `mybag`
--
ALTER TABLE `mybag`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mybag`
--
ALTER TABLE `mybag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
