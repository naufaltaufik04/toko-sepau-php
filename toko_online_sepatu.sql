-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 06:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_sepatu`
--

CREATE TABLE `detail_sepatu` (
  `tipe_sepatu` varchar(55) NOT NULL,
  `warna` varchar(16) NOT NULL,
  `ukuran` varchar(2) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_sepatu`
--

INSERT INTO `detail_sepatu` (`tipe_sepatu`, `warna`, `ukuran`, `stok`, `berat`, `harga`) VALUES
('SP001', 'Vivid Red', '39', 0, 200, 1400000),
('SP001', 'Vivid Red', '40', 5, 200, 1450000),
('SP001', 'Vivid Red', '41', 9, 200, 1500000),
('SP001', 'Vivid Red', '42', 8, 200, 1550000),
('SP001', 'Light Purple', '39', 3, 200, 1500000),
('SP001', 'Light Purple', '40', 0, 200, 1550000),
('SP001', 'Light Purple', '41', 1, 200, 1600000),
('SP001', 'Clear Mint', '38', 5, 200, 1250000),
('SP001', 'Clear Mint', '39', 4, 200, 1300000),
('SP001', 'Clear Mint', '40', 5, 200, 1350000),
('SP002', 'Halo Silver', '39', 2, 300, 1300000),
('SP002', 'Halo Silver', '40', 2, 300, 1350000),
('SP002', 'Halo Silver', '41', 0, 300, 1400000),
('SP002', 'Chalk White', '39', 3, 300, 1350000),
('SP002', 'Chalk White', '40', 1, 300, 1400000),
('SP002', 'Chalk White', '41', 2, 300, 1450000),
('SP003', 'Core Black', '39', 7, 275, 1200000),
('SP003', 'Core Black', '40', 6, 275, 1250000),
('SP003', 'Chalk White', '39', 5, 275, 1300000),
('SP003', 'Chalk White', '40', 6, 275, 1350000),
('SP004', 'Core Black', '40', 7, 200, 1000000),
('SP004', 'Core Black', '41', 4, 200, 1050000),
('SP004', 'Core Black', '42', 2, 200, 1100000),
('SP004', 'Core Black', '43', 8, 200, 1150000),
('SP004', 'Core Black', '44', 3, 200, 1200000),
('SP004', 'Cloud White', '40', 9, 200, 1000000),
('SP004', 'Cloud White', '41', 4, 200, 1050000),
('SP004', 'Cloud White', '42', 8, 200, 1100000),
('SP004', 'Cloud White', '43', 1, 200, 1150000),
('SP004', 'Collegiate Royal', '40', 3, 200, 1100000),
('SP004', 'Collegiate Royal', '41', 5, 200, 1150000),
('SP004', 'Collegiate Royal', '42', 2, 200, 1200000),
('SP004', 'Collegiate Royal', '43', 19, 200, 1250000),
('SP005', 'Shock Blue', '35', 9, 250, 850000),
('SP005', 'Shock Blue', '36', 10, 250, 900000),
('SP005', 'Shock Blue', '37', 5, 250, 950000),
('SP005', 'Shock Blue', '38', 3, 250, 1000000),
('SP005', 'Green', '35', 2, 250, 750000),
('SP005', 'Green', '36', 2, 250, 800000),
('SP005', 'Green', '37', 9, 250, 850000),
('SP005', 'Green', '38', 3, 250, 900000),
('SP005', 'Eqt Yellow', '35', 4, 250, 850000),
('SP005', 'Eqt Yellow', '36', 1, 250, 900000),
('SP005', 'Eqt Yellow', '37', 5, 250, 950000),
('SP005', 'Eqt Yellow', '38', 4, 250, 1000000),
('SP005', 'Red', '35', 1, 250, 800000),
('SP005', 'Red', '36', -7, 250, 850000),
('SP005', 'Red', '37', 3, 250, 900000),
('SP005', 'Red', '38', 2, 250, 9500000),
('SP005', 'Red', '35', 1, 250, 800000),
('SP005', 'Red', '36', -7, 250, 850000),
('SP005', 'Red', '37', 3, 250, 900000),
('SP005', 'Red', '38', 2, 250, 9500000);

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_transaksi` int(11) NOT NULL,
  `tipe_sepatu` varchar(5) NOT NULL,
  `warna_sepatu` varchar(15) NOT NULL,
  `ukuran_sepatu` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `harga_sepatu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`no_transaksi`, `tipe_sepatu`, `warna_sepatu`, `ukuran_sepatu`, `jumlah_jual`, `harga_sepatu`) VALUES
(1, 'SP005', 'Green', 36, 1, 800000),
(1, 'SP003', 'Core Black', 39, 1, 1200000),
(2, 'SP005', 'Red', 36, 5, 850000),
(2, 'SP004', 'Core Black', 40, 1, 1000000),
(2, 'SP002', 'Halo Silver', 39, 1, 1300000),
(2, 'SP001', 'Light Purple', 40, 2, 1550000),
(3, 'SP005', 'Red', 36, 5, 850000),
(3, 'SP004', 'Core Black', 40, 1, 1000000),
(3, 'SP002', 'Halo Silver', 39, 1, 1300000),
(3, 'SP001', 'Light Purple', 40, 2, 1550000),
(4, 'SP001', 'Vivid Red', 39, 5, 1400000);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `kodePosAwal` varchar(5) NOT NULL,
  `kodePosTujuan` varchar(5) NOT NULL,
  `ongkosKirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`kodePosAwal`, `kodePosTujuan`, `ongkosKirim`) VALUES
('40142', '10150', 11000),
('40142', '98782', 102000);

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `kode_sepatu` varchar(5) NOT NULL,
  `tipe_sepatu` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`kode_sepatu`, `tipe_sepatu`) VALUES
('AD001', 'SP001'),
('AD002', 'SP002'),
('AD003', 'SP003'),
('AD004', 'SP004'),
('AD005', 'SP005');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pembeli` varchar(55) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal`, `nama_pembeli`, `no_telepon`, `alamat`, `kecamatan`, `kota`, `kode_pos`, `total_jual`) VALUES
(1, '2021-07-12', 'siapa2', '1234567890', 'DISINI Juga', 'Disini juga', 'Disini juga', '40142', 2000000),
(2, '2021-07-12', 'Naufal', '12331', 'DISINI', 'Cidadap', 'Bandung', '40142', 9650000),
(3, '2021-07-12', 'Naufal', '12331', 'DISINI', 'Cidadap', 'Bandung', '40142', 9650000),
(4, '2021-07-12', '', '', '', '', '', '40142', 7000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`kode_sepatu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
