-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2022 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_trinitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` varchar(100) NOT NULL,
  `nama_acara` varchar(200) NOT NULL,
  `tanggal_pelaksanaan` datetime NOT NULL,
  `catatan` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `nama_acara`, `tanggal_pelaksanaan`, `catatan`, `added_by`, `added_on`) VALUES
('b216a107-397a-4fb7-9b19-d6f31d3da5f0', 'Jumatan 17 Mei 2022', '2022-05-17 12:00:00', 'Jumatan rutin', '', '2022-05-09 04:40:04'),
('b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'Jumatan 13 Mei 2022', '2022-05-13 12:00:00', 'Jumatan rutin', '', '2022-05-09 04:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `master_petugas`
--

CREATE TABLE `master_petugas` (
  `id_petugas` int(3) NOT NULL,
  `jenis_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_petugas`
--

INSERT INTO `master_petugas` (`id_petugas`, `jenis_petugas`) VALUES
(1, 'Pastor'),
(2, 'Koordinator Utama'),
(3, 'Koordinator Liturgi'),
(4, 'Putri Legio Ekaristi'),
(5, 'Putra Altar'),
(6, 'Lektor & Komentator'),
(7, 'Organis'),
(8, 'Dirigen'),
(9, 'Solis'),
(10, 'Multimedia'),
(11, 'Sound System'),
(12, 'Prodiakon'),
(13, 'Penata Umat Gereja'),
(14, 'Penata Umat Balkon'),
(15, 'Penata Umat Kapel'),
(16, 'Logistik'),
(17, 'Koordinator Zona'),
(18, 'Scan Barcode & Thermogun'),
(19, 'Peduli Lindungi & Wastafel'),
(20, 'Tim Medis'),
(21, 'Petugas Parkir'),
(22, 'Fotografer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no_kk_gereja` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no_kk_gereja`, `email`, `username`, `password`) VALUES
('1233312', 'adity@gmail.com', 'FX Rudi Rahkito Jati', 'ff41710842060a02f6c792cf55b49551'),
('12333123', 'aditya@gmail.com', 'Oey Sukardi L', '827ccb0eea8a706c4c34a16891f84e7b'),
('123331233', 'adita@gmail.com', 'Antonious Freddy Irawan', 'ff41710842060a02f6c792cf55b49551'),
('123331234', 'aditya@gmail.com', 'Valerie Elviani', 'ff41710842060a02f6c792cf55b49551'),
('12345', 'garbriellcn@gmail.com', 'Melodi Alexandra', '9d62dc00b22e64225f6945efc84223bd'),
('123453', 'garbriellcnut@gmail.com', 'Audrey Valerie', '9d62dc00b22e64225f6945efc84223bd'),
('1234531', 'garbriellcs@gmail.com', 'Agnes Zaneta', '9d62dc00b22e64225f6945efc84223bd'),
('qwwuuhhh', 'agas@gmail.com', 'Agas Satria', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user_petugas`
--

CREATE TABLE `user_petugas` (
  `id` int(11) NOT NULL,
  `id_petugas` int(3) NOT NULL,
  `id_acara` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_petugas`
--

INSERT INTO `user_petugas` (`id`, `id_petugas`, `id_acara`, `userid`) VALUES
(53, 1, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'aditya@gmail.com'),
(54, 2, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'garbriellcn@gmail.com'),
(56, 4, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(58, 6, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(59, 7, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'garbriellcn@gmail.com'),
(60, 8, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'garbriellcs@gmail.com'),
(61, 9, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(62, 10, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'garbriellcnut@gmail.com'),
(64, 12, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(65, 13, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'garbriellcn@gmail.com'),
(69, 17, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(71, 19, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(72, 20, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(73, 21, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(74, 22, 'b216a107-397a-4fb7-9b19-d6f31d3da5f2', 'adita@gmail.com'),
(75, 1, 'b216a107-397a-4fb7-9b19-d6f31d3da5f0', 'aditya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_petugas`
--
ALTER TABLE `master_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_kk_gereja`);

--
-- Indexes for table `user_petugas`
--
ALTER TABLE `user_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_petugas`
--
ALTER TABLE `master_petugas`
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_petugas`
--
ALTER TABLE `user_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_petugas`
--
ALTER TABLE `user_petugas`
  ADD CONSTRAINT `user_petugas_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `master_petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
