-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samp2445_samsat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_antrian`
--

CREATE TABLE `tb_antrian` (
  `id_antrian` int(11) NOT NULL,
  `kostumer_id` int(11) NOT NULL,
  `no_antrian` varchar(50) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `panggil_antrian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_antrian`
--

INSERT INTO `tb_antrian` (`id_antrian`, `kostumer_id`, `no_antrian`, `created_at`, `status`, `panggil_antrian`) VALUES
(1, 2, '001', '02 Dec 2021', 1, 'PANGGIL'),
(2, 2, '002', '02 Dec 2021', 1, 'PANGGIL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_grup`
--

CREATE TABLE `tb_grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grup`
--

INSERT INTO `tb_grup` (`id_grup`, `nama_grup`, `created_at`) VALUES
(1, 'Administrator', '21 Oktober 2021'),
(2, 'User', '21 Oktober 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_info` int(11) NOT NULL,
  `jadwal_buka` varchar(128) NOT NULL,
  `jadwal_tutup` varchar(128) NOT NULL,
  `jam_buka` varchar(128) NOT NULL,
  `jam_tutup` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_info`, `jadwal_buka`, `jadwal_tutup`, `jam_buka`, `jam_tutup`, `created_at`) VALUES
(2, 'Senin', 'Senin', '08:00', '16:00', '01 Dec 2021'),
(3, 'Selasa', 'Selasa', '08:00', '16:00', '01 Dec 2021'),
(4, 'Rabu', 'Rabu', '08:00', '16:00', '01 Dec 2021'),
(5, 'Kamis', 'Kamis', '08:00', '16:00', '01 Dec 2021'),
(6, 'Jumat', 'Jumat', '08:00', '15:00', '01 Dec 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kostumer`
--

CREATE TABLE `tb_kostumer` (
  `id_kostumer` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `token_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kostumer`
--

INSERT INTO `tb_kostumer` (`id_kostumer`, `user_id`, `nama`, `email`, `username`, `password`, `no_hp`, `alamat`, `created_at`, `token_id`) VALUES
(2, 2, 'Adi murdayani', 'adimurdayani@gmail.com', 'adimurdayani', '74e92d137df14c2f05a571ebf2dfc75145a69045', '', '', '01 Dec 2021 01:11', 'fnUwhiFeoTE:APA91bGlqdfiDPsYZB9tuZ3uIhvWCx2HQ_r6OQs0SYzgdLvaaN5jBJ3QyL_GnHuIFNWEVeSxUHd8QCJocFf_ODsB3Jkw0REv7ladopsWSMVglKHHXxpy0c-O0KcA7O-_bd-hnT09lpAu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pajak`
--

CREATE TABLE `tb_pajak` (
  `id_pajak` int(11) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `th_buat` varchar(50) NOT NULL,
  `pkb_pokok` int(50) NOT NULL,
  `pkb_denda` int(50) NOT NULL,
  `jr_pokok` int(50) NOT NULL,
  `jr_denda` int(50) NOT NULL,
  `pnbp` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `masa_pajak` varchar(123) NOT NULL,
  `masa_stnk` varchar(123) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pajak`
--

INSERT INTO `tb_pajak` (`id_pajak`, `nopol`, `jenis`, `merk`, `tipe`, `th_buat`, `pkb_pokok`, `pkb_denda`, `jr_pokok`, `jr_denda`, `pnbp`, `total`, `masa_pajak`, `masa_stnk`, `status`) VALUES
(2, 'DP2886EC', 'SPD.MOTOR', 'YAMAHA', '1KP A/T 113 cc', '2013', 169500, 0, 35000, 0, 0, 204500, '2022-07-17', '2023-07-06', 0),
(4, 'DP2999EG', 'SPD.MOTOR', 'HONDA', 'GL15A1RR M/T', '2011', 228000, 0, 35000, 0, 0, 263000, '2022-07-22', '2026-07-22', 0),
(5, 'DP3136TC', 'SPD.MOTOR', 'YAMAHA', '2TP', '2015', 951750, 0, 140000, 8000, 160000, 1259750, '2018-10-22', '2020-10-22', 0),
(6, 'DP2135TC', 'SPD.MOTOR', 'HONDA', 'C1C02N16M2 A/T', '2015', 316838, 0, 70000, 8000, 160000, 554838, '2020-08-27', '2020-08-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_active` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `user_active`, `nama`, `email`, `username`, `password`, `created_at`) VALUES
(2, 1, 1, 'Admin', 'admin123@gmail.com', 'admin123', '$2y$10$BaldTS/sgB1ycoejh/k5wOoMiVD6MQwVq35jH.PcNZDVGfIJB9stG', '03 Nov 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `antrian_id` (`no_antrian`),
  ADD KEY `kostumer_id` (`kostumer_id`);

--
-- Indexes for table `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_kostumer`
--
ALTER TABLE `tb_kostumer`
  ADD PRIMARY KEY (`id_kostumer`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_pajak`
--
ALTER TABLE `tb_pajak`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kostumer`
--
ALTER TABLE `tb_kostumer`
  MODIFY `id_kostumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pajak`
--
ALTER TABLE `tb_pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kostumer`
--
ALTER TABLE `tb_kostumer`
  ADD CONSTRAINT `tb_kostumer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_grup` (`id_grup`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_grup` (`id_grup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
