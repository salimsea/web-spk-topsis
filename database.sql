-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 07:26 PM
-- Server version: 8.0.34
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slmyid_skripsi_salim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `id_bobot` int NOT NULL,
  `nama_bobot` varchar(50) NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`id_bobot`, `nama_bobot`, `nilai`) VALUES
(1, 'Sangat Rendah', 1),
(2, 'Rendah', 2),
(3, 'Cukup', 3),
(4, 'Baik', 4),
(5, 'Sangat Baik', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_himpunan`
--

CREATE TABLE `tbl_himpunan` (
  `id_himpunan` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_himpunan`
--

INSERT INTO `tbl_himpunan` (`id_himpunan`, `id_kriteria`, `nama`, `nilai`) VALUES
(12, 1, '<10.000', 5),
(13, 1, '10.000 – 50.000', 4),
(14, 1, '51.000 – 100.000', 3),
(21, 1, '101.000 – 200.000', 2),
(22, 1, '>200.000', 1),
(23, 2, '>400', 5),
(24, 2, '301-400', 4),
(25, 2, '201-300', 3),
(26, 2, '100-200', 2),
(27, 2, '<100', 1),
(28, 3, '>500', 5),
(29, 3, '301-500', 4),
(30, 3, '101-300', 3),
(31, 3, '51-100', 2),
(32, 3, '<50', 1),
(33, 4, 'Jakarta', 5),
(34, 4, 'Tangerang Selatan', 4),
(35, 4, 'Bandung', 3),
(36, 4, 'Garut', 2),
(37, 4, 'Jepara', 1),
(38, 5, '5 Rating', 5),
(39, 5, '4 Rating', 4),
(40, 5, '3 Rating', 3),
(41, 5, '2 Rating', 2),
(42, 5, '1 Rating', 1),
(43, 0, 'koakwoa', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id_produk` int NOT NULL,
  `id_himpunan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_klasifikasi`
--

INSERT INTO `tbl_klasifikasi` (`id_produk`, `id_himpunan`) VALUES
(15, 12),
(15, 7),
(15, 2),
(15, 15),
(15, 19),
(2, 13),
(2, 25),
(2, 29),
(2, 34),
(2, 39),
(3, 13),
(3, 25),
(3, 30),
(3, 34),
(3, 38),
(4, 13),
(4, 25),
(4, 30),
(4, 34),
(4, 38),
(5, 13),
(5, 25),
(5, 30),
(5, 34),
(5, 39),
(8, 13),
(8, 25),
(8, 30),
(8, 34),
(8, 39),
(9, 13),
(9, 24),
(9, 31),
(9, 34),
(9, 40),
(10, 13),
(10, 25),
(10, 31),
(10, 34),
(10, 40),
(6, 13),
(6, 25),
(6, 30),
(6, 34),
(6, 40),
(7, 13),
(7, 26),
(7, 30),
(7, 34),
(7, 38),
(1, 13),
(1, 26),
(1, 28),
(1, 34),
(1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `atribut` enum('benefit','cost') NOT NULL,
  `bobot_kriteria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `atribut`, `bobot_kriteria`) VALUES
(1, 'Biaya', 'cost', 5),
(2, 'Stok', 'benefit', 3),
(3, 'Terjual', 'benefit', 3),
(4, 'Gudang', 'benefit', 4),
(5, 'Rating', 'cost', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `terjual` int NOT NULL,
  `gudang` varchar(100) NOT NULL,
  `rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama`, `harga`, `stok`, `terjual`, `gudang`, `rating`) VALUES
(1, 'Pop Corn East Bali Cashew', 28000, 103, 677, 'Tangerang Selatan', 4),
(2, 'Soaci (Seblak Baso Aci)', 17200, 214, 323, 'Tangerang Selatan', 4),
(3, 'Kering Kentang Mustofa', 23000, 265, 224, 'Tangerang Selatan', 5),
(4, 'Sambal Jawara Selera (20)', 21700, 297, 236, 'Tangerang Selatan', 5),
(5, 'Teh Dedew Bacil Ori / Bacil Geprek', 17200, 267, 209, 'Tangerang Selatan', 4),
(6, 'Siengkong', 16300, 267, 189, 'Tangerang Selatan', 3),
(7, 'BOCI Baso Aci', 17200, 186, 157, 'Tangerang Selatan', 5),
(8, 'Abon Sapi Malioboro', 18500, 287, 132, 'Tangerang Selatan', 4),
(9, 'Kripik Usus dan Ceker', 13600, 312, 100, 'Tangerang Selatan', 3),
(10, 'Rosella Tea East Bali Cashew', 19000, 287, 77, 'Tangerang Selatan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `tbl_himpunan`
--
ALTER TABLE `tbl_himpunan`
  ADD PRIMARY KEY (`id_himpunan`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  MODIFY `id_bobot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_himpunan`
--
ALTER TABLE `tbl_himpunan`
  MODIFY `id_himpunan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
