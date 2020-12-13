-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2020 at 02:25 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15539494_outfitlabs`
--
DROP DATABASE IF EXISTS `outfitlabs`;
CREATE DATABASE IF NOT EXISTS `outfitlabs` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
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
('BA001', 'JB001', 'Adidas Athletics Graphic Tee', '330000', '1', '', 14, 5, './assets/pic/BA001.png'),
('BA002', 'JB001', 'ASSC X Undefeated 2015 Tee', '2400000', '3', '', 7, 5, './assets/pic/BA002.png'),
('BA003', 'JB001', 'Long-sleeved Top Long', '179000', '3', '', 0, 5, './assets/pic/BA003.png'),
('BA004', 'JB001', 'RickAndMorty T-Shirt', '249000', '3', '', 1, 5, './assets/pic/BA004.png'),
('BA005', 'JB001', 'RipnDip Hiker Nerm Tee', '680000', '3', '', 0, 5, './assets/pic/BA005.png'),
('BA006', 'JB001', 'Thrasher Flame T-shirt', '699000', '3', '', 0, 5, './assets/pic/BA006.png'),
('BA007', 'JB001', 'V-neck T-shirt Regular', '149000', '2', '', 0, 5, './assets/pic/BA007.png'),
('BA008', 'JB002', 'Fred Perry High Neck Dress', '1899000', '1', '', 7, 2.5, './assets/pic/BA008.png'),
('BA009', 'JB002', 'Glittery Shirt', '899000', '4', '', 0, 5, './assets/pic/BA009.png'),
('BA010', 'JB002', 'Imitation Leather Shirt Jacket', '599000', '4', '', 0, 5, './assets/pic/BA010.png'),
('BA011', 'JB002', 'Jersey Top', '70000', '4', '', 0, 5, './assets/pic/BA011.png'),
('BA012', 'JB002', 'Large-collared Blouse leopard', '349000', '4', '', 6, 5, './assets/pic/BA012.png'),
('BA013', 'JB002', 'Short Polo-neck Top', '149000', '3', '', 1, 5, './assets/pic/BA013.png'),
('BA014', 'JB002', 'Tie-detail Dress', '349000', '4', '', 1, 5, './assets/pic/BA014.png'),
('BA015', 'JB003', 'Black Embroidered Unisex Jogger Pants', '240000', '1', '', 16, 5, './assets/pic/BA015.png'),
('BA016', 'JB003', 'Dark Blue Straight Pants', '5960000', '3', '', 0, 5, './assets/pic/BA016.png'),
('BA017', 'JB003', 'Dark Green Mens Chino', '1199000', '3', '', 0, 5, './assets/pic/BA017.png'),
('BA018', 'JB003', 'Lead Pants Speed', '1199000', '3', '', 0, 5, './assets/pic/BA018.png'),
('BA019', 'JB003', 'Mens Shredded Slit Wool Pants', '1156000', '3', '', 0, 5, './assets/pic/BA019.png'),
('BA020', 'JB003', 'Stripes Davi Pleated Pants', '750000', '3', '', 0, 5, './assets/pic/BA020.png'),
('BA021', 'JB003', 'Washed Denim Elastic Pants', '3318000', '3', '', 0, 5, './assets/pic/BA021.png'),
('BA022', 'JB004', 'Beige Mina Quarter Check Pants', '6850000', '1', '', 2, 5, './assets/pic/BA022.png'),
('BA023', 'JB004', 'Black Faux Leather Patch Jogger Pants', '6190000', '1', '', 1, 5, './assets/pic/BA023.png'),
('BA024', 'JB004', 'Blue Stripes Denim Pants', '5580000', '2', '', 0, 5, './assets/pic/BA024.png'),
('BA025', 'JB004', 'Brown Check Elba Pants', '5980000', '2', '', 0, 5, './assets/pic/BA025.png'),
('BA026', 'JB004', 'Bubblegum Nini Pants', '2250000', '2', '', 0, 5, './assets/pic/BA026.png'),
('BA027', 'JB004', 'Grey Long Wide-Leg Paperbag Pants', '11980000', '2', '', 0, 5, './assets/pic/BA027.png'),
('BA028', 'JB004', 'Orange Ginger Hemal Wide Leg Trousser', '2190000', '2', '', 0, 5, './assets/pic/BA028.png'),
('BA029', 'JB008', 'Checked Print Fringed Blazer', '1799000', '5', '', 1, 5, './assets/pic/BA029.png'),
('BA030', 'JB008', 'Cross Button Blazer', '1399000', '0', '', 8, 3.5, './assets/pic/BA030.png'),
('BA031', 'JB005', 'Faux Shearling-Lined Corduroy Jacket', '1399000', '5', '', 0, 5, './assets/pic/BA031.png'),
('BA032', 'JB005', 'Faux Shearling-Lined Jacket', '1799000', '5', '', 0, 5, './assets/pic/BA032.png'),
('BA033', 'JB008', 'Tweed Blazer', '1799000', '5', '', 2, 5, './assets/pic/BA033.png'),
('BA034', 'JB005', 'Wool College Bomber Jacket', '1599000', '5', '', 1, 5, './assets/pic/BA034.png'),
('BA035', 'JB009', 'Chain Crossbody Bag', '479000', '4', '', 3, 5, './assets/pic/BA035.png'),
('BA036', 'JB006', 'External Pocket Tote Briefcase', '1199000', '4', '', 0, 5, './assets/pic/BA036.png'),
('BA037', 'JB009', 'Nylon Baguette Bag', '479000', '1', '', 6, 5, './assets/pic/BA037.png'),
('BA038', 'JB006', 'Technical Fabric Backpack', '999000', '0', '', 4, 5, './assets/pic/BA038.png'),
('BA039', 'JB006', 'Technical Fabric Cross-Body Bag', '479000', '2', '', 0, 5, './assets/pic/BA039.png'),
('BA040', 'JB009', 'Tortoiseshell Baguette Bag', '359000', '4', '', 1, 5, './assets/pic/BA040.png'),
('BA041', 'JB007', 'Black White Campo Sneakers', '2650000', '5', '', 1, 5, './assets/pic/BA041.png'),
('BA042', 'JB010', 'Fuchsia Hoya Heels Shoes', '6923000', '2', '', 5, 5, './assets/pic/BA042.png'),
('BA043', 'JB010', 'Gold Oversized Pearl Heeled Slip On', '2116000', '0', '', 6, 5, './assets/pic/BA043.png'),
('BA044', 'JB007', 'Mens Blue White Canvas Sneakers', '3750000', '1', '', 0, 5, './assets/pic/BA044.png'),
('BA045', 'JB007', 'Mens Orange Repeat Low Triplet Plain Light', '1990000', '5', '', 0, 5, './assets/pic/BA045.png'),
('BA046', 'JB010', 'Multicolor Raffia Printed Canvas Shoes', '4790000', '6', '', 1, 5, './assets/pic/BA046.png'),
('BA047', 'JB007', 'White Green Dreamy Leather Sabot', '6790000', '6', '', 0, 5, './assets/pic/BA047.png'),
('BA048', 'JB002', 'barang contoh2', '300000', '32', 'ini barang contohh', 0, 5, './assets/pic/BA048.jpg'),
('BA049', 'JB007', 'sepatu cowok', '235000', '3', 'ini sepatu baru', 1, 5, './assets/pic/BA049.jpg');

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
('CU001', 'user1', '$2y$10$sKFPvKjsgGPqQNy5v0mau.8wU5Axl137PTAQdoF/iQ6avVELVB.Mu', 'user1@gmail.com', 'entah', 'ID027', '0', '0'),
('CU002', 'widean', '$2y$10$sQsx62XrmFx9IT/dCDseiOMyBWnirU1xlqBO9BJIo.oSwomTp5nYq', 'widean@gmail.com', 'jalan2', 'ID018', '936197220', '0'),
('CU003', 'wideann', '$2y$10$ehuhlg6OG.CPMEfSpq9vheacEfSti7HdD1hEzMPkEL6uS00/Crkkq', 'widean@gmail.coms', 'aaaaa', 'ID012', '12256000', '1'),
('CU004', 'david', '$2y$10$O15SrZqfmcD5Z/CijLTA6.yBGcDRwDeZrNck9V5b5FtwfpVwWh/Qm', 'davidcahyadi.022@gmail.com', 'Jalan ABC', 'ID016', '1000000', '1'),
('CU005', 'indah', '$2y$10$KC1iDQ.Xea0conKL0P/SA.B77fC5cI.6bUdwEuzB0GM8ZA5lXPB7C', 'indah@example.com', 'jalan-jalan kemana saja', 'ID017', '0', '1'),
('CU006', 'Yantii28', '$2y$10$9vxarb.yumFWo/fwZyhxmuF3yvjRHWMsWkzt9/VETq61rrFhktTM.', 'lindayanti928@gmail.com', 'Jln samalona', 'ID027', '518800', '1'),
('CU007', '12', '$2y$10$qV/KKVzvTX9GWESzfe3hAum6zzVR6eqCmdYIYnhlxgdpKfbPqW7nK', 'HH', '12', 'ID018', '0', '1'),
('CU008', 'widean33', '$2y$10$EdSqGTgfEkFhUlLQ7dAdXuGSLDuEzxVPm4vdi14Hq53op.eR3m4Pi', 'xx@gmail.com', 'jalan apa?', 'ID018', '6525800', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` varchar(10) NOT NULL,
  `nama_event` varchar(30) NOT NULL,
  `diskon` varchar(20) NOT NULL DEFAULT '0',
  `diskon2` varchar(10) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `diskon`, `diskon2`, `status`) VALUES
('EV001', 'OutfitLabs Anniversary', '0', '30', '0'),
('EV002', 'OutfitLabs ShopFest', '40000', '0', '1'),
('EV003', 'Hari Belanja Online Nasional', '15000', '10', '0'),
('EV004', 'Black Friday', '20000', '20', '1'),
('EV005', 'Super Shopping Day', '50000', '0', '0'),
('EV006', 'x', '12500', '1', '0'),
('EV007', 'aaa', '20000', '1', '1'),
('EV008', 'event baru', '50002', '1', '0');

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
  `jumlah` int(10) NOT NULL DEFAULT 1,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mybag`
--

INSERT INTO `mybag` (`id`, `id_user`, `id_barang`, `jumlah`, `status`) VALUES
(14, 'CU002', 'BA015', 1, 2),
(15, 'CU002', 'BA008', 0, 1),
(17, 'CU004', 'BA001', 1, 1),
(18, 'CU002', 'BA012', 1, 1),
(19, 'CU004', 'BA004', 1, 1),
(26, 'CU003', 'BA041', 1, 2);

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
('KI001', 'TR001', '26 November 2020 at 19:39', '26 November 2020 at 19:43', '1606394638', 'finished'),
('KI002', 'TR002', '26 November 2020 at 19:44', '26 November 2020 at 19:48', '1606394903', 'finished'),
('KI003', 'TR003', '26 November 2020 at 20:07', '26 November 2020 at 20:11', '1606396261', 'finished'),
('KI004', 'TR004', '26 November 2020 at 20:08', '26 November 2020 at 20:12', '1606396355', 'finished'),
('KI005', 'TR005', '26 November 2020 at 20:10', '26 November 2020 at 20:14', '1606396496', 'finished'),
('KI006', 'TR006', '26 November 2020 at 20:12', '26 November 2020 at 20:16', '1606396602', 'finished'),
('KI007', 'TR007', '26 November 2020 at 20:13', '26 November 2020 at 20:17', '1606396630', 'finished'),
('KI008', 'TR008', '26 November 2020 at 20:14', '26 November 2020 at 20:18', '1606396728', 'finished'),
('KI009', 'TR009', '26 November 2020 at 20:45', '26 November 2020 at 20:49', '1606398563', 'finished'),
('KI010', 'TR010', '28 November 2020 at 12:23', '28 November 2020 at 12:27', '1606541268', 'finished'),
('KI011', 'TR011', '05 December 2020 at 16:53', '05 December 2020 at 16:57', '1607162249', 'onGoing'),
('KI012', 'TR012', '05 December 2020 at 20:37', '05 December 2020 at 20:44', '1607175850', 'onGoing'),
('KI013', 'TR013', '05 December 2020 at 20:37', '05 December 2020 at 20:44', '1607175850', 'onGoing'),
('KI014', 'TR014', '13 December 2020 at 12:40', '13 December 2020 at 12:50', '1607838640', 'finished'),
('KI015', 'TR015', '13 December 2020 at 12:41', '13 December 2020 at 12:51', '1607838679', 'finished');

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
  `id_barang` varchar(10) NOT NULL,
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

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_barang`, `jumlah`, `harga`, `diskon`, `ongkos_kirim`, `total_harga`, `rating`) VALUES
('TR001', 'CU002', 'BA030', '1', '1399000', '0', '26000', '1425000', '5'),
('TR002', 'CU002', 'BA030', '1', '1399000', '0', '26000', '1425000', '2'),
('TR003', 'CU002', 'BA038', '1', '999000', '0', '26000', '1025000', '1'),
('TR004', 'CU002', 'BA038', '1', '999000', '0', '26000', '1025000', '5'),
('TR005', 'CU002', 'BA042', '1', '6923000', '0', '26000', '6949000', '5'),
('TR006', 'CU002', 'BA042', '1', '6923000', '0', '26000', '6949000', '-'),
('TR007', 'CU002', 'BA042', '1', '6923000', '0', '26000', '6949000', '-'),
('TR008', 'CU002', 'BA042', '1', '6923000', '0', '26000', '6949000', '-'),
('TR009', 'CU002', 'BA023', '1', '6190000', '1258000', '26000', '4958000', '-'),
('TR010', 'CU003', 'BA043', '1', '2116000', '40000', '26000', '2102000', '-'),
('TR011', 'CU003', 'BA001', '1', '330000', '40000', '26000', '316000', '-'),
('TR012', 'CU006', 'BA013', '1', '149000', '115800', '59000', '92200', '-'),
('TR013', 'CU006', 'BA001', '1', '330000', '115800', '59000', '273200', '-'),
('TR014', 'CU008', 'BA008', '1', '1899000', '399800', '63000', '1562200', '1'),
('TR015', 'CU008', 'BA008', '1', '1899000', '40000', '63000', '1922000', '4');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
