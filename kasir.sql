-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2019 at 02:42 
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'rudy', '123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_barang` int(25) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `keterangan_barang` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah`, `harga_barang`, `gambar_barang`, `keterangan_barang`) VALUES
('8886008101053', 'Aqua Tanggung', 12, 3000, 'bd9f2-cherries.jpg', 'Air Mineral'),
('8996001600269', 'Le Minerale', 12, 3000, 'adb79-yellowflower.jpg', 'Air Mineral'),
('B0001', 'Kecap Bango', 28, 1000, 'f0b86-warty-final-ubuntu.png', 'keterangan barang'),
('B0002', 'Kapal Api', 16, 1000, '', ''),
('B0003', 'INDOMILK', 33, 4000, '60b65-throwingstones.jpg', 'barang lama'),
('B0004', 'Enzim', 40, 2000, '17147-twilight_frost_by_phil_jackson.jpg', 'barang baru'),
('B0005', 'Pepsoden', 10, 4000, '21ea6-yellowflower.jpg', 'barang kadalurasa'),
('B0006', 'Sepatu', 0, 45000, '03c6d-whiteorchid.jpg', 'barang');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_beli` varchar(10) NOT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_barang`, `jumlah`, `total`, `tanggal`) VALUES
('129900', 'B0002', 12, 90000, '2018-10-23 10:01:11'),
('30000', 'B0003', 3, 3000, '2018-10-23 09:59:06'),
('89000', 'B0003', 20, 300000, '2018-11-13 00:00:00'),
('90000', 'B0003', 10, 10000, '2018-10-23 00:00:00');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `kulakan` AFTER INSERT ON `pembelian`
 FOR EACH ROW UPDATE barang SET jumlah=jumlah+NEW.jumlah
WHERE id_barang=NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_transaksi`, `id_barang`, `jumlah`, `total`, `tanggal`) VALUES
(1, '1000001', 'B0002', 3, 4000, '2018-10-23 15:39:14'),
(2, '1298000', 'B0001', 3, 40000, '2018-10-23 06:16:19'),
(3, '23891281', 'B0005', 10, 90000, '2018-10-23 00:00:00'),
(4, 'Shop-20181106041300', 'B0001', 7, 7000, '2018-11-06 00:00:00'),
(5, 'Shop-20181106041300', 'B0006', 4, 180000, '2018-11-06 00:00:00'),
(6, 'Shop-20181106041300', 'B0002', 3, 3000, '2018-11-06 00:00:00'),
(7, 'Shop-20181106041406', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(8, 'Shop-20181106041755', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(9, 'Shop-20181106041911', 'B0001', 4, 4000, '2018-11-06 00:00:00'),
(10, 'Shop-20181106041947', 'B0006', 4, 180000, '2018-11-06 00:00:00'),
(11, 'Shop-20181106042051', 'B0006', 4, 180000, '2018-11-06 00:00:00'),
(12, 'Shop-20181106042151', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(13, 'Shop-20181106042151', 'B0004', 4, 8000, '2018-11-06 00:00:00'),
(14, 'Shop-20181106042747', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(15, 'Shop-20181106042747', 'B0004', 4, 8000, '2018-11-06 00:00:00'),
(16, 'Shop-20181106045608', '8886008101', 3, 9000, '2018-11-06 00:00:00'),
(17, 'Shop-20181106045628', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(18, 'Shop-20181106050907', '8886008101', 2, 6000, '2018-11-06 00:00:00'),
(19, 'Shop-20181106061124', 'B0001', 3, 3000, '2018-11-06 00:00:00'),
(20, 'Shop-20191007103425', 'B0001', 2, 2000, '2019-10-07 10:34:25');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `penjualan`
 FOR EACH ROW UPDATE 
barang SET jumlah=jumlah-NEW.jumlah
WHERE id_barang=NEW.id_barang
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
