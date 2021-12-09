-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2021 at 05:04 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_antrian`
--

INSERT INTO `tb_antrian` (`id_antrian`, `kostumer_id`, `no_antrian`, `created_at`, `status`) VALUES
(7, 8, 'NA-000001ST', '23 Nov 2021', 1),
(8, 9, 'NA-000002ST', '23 Nov 2021', 1),
(9, 10, 'NA-000003ST', '23 Nov 2021 10:25', 0);

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
(2, 'Senin', 'Senin', '08:00', '16:00', '03 Nov 2021');

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
(1, 2, 'Muharya', 'muharya@gmail.com', 'Muharya', '99f5888ec8048988f16c825b043f4530e91098f8', '085242145661', 'Binturu', '18 Nov 2021 19:48', 'frf7C7p_OGY:APA91bG4emDgdv05OML2eun9-yuxLYhahpfkSW_zMr8Wx1pQEt-X-wXKXITZFiuiJPyGebdJs6xe8kycIDMfZz6XLfFoOXV2SETQdDe6SfEVvscW1NOG7yVqKuiuNNArBiQIZZZOPC-1'),
(2, 2, 'Devi aratni', 'deviaratni@gmail.com', 'Deviaratni', '272562eb9d916b61ab67912a505a59d6e51a2fb6', '', '', '22 Nov 2021 12:42', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(3, 2, 'Pak rinto', 'pakrinto@gmail.com', 'pakrinto', 'cb39510c3dd6ca9873bb70c91051f9fa3015ca4e', '', '', '22 Nov 2021 12:47', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(4, 2, 'Kirana Larasati', 'kiranalarasati@gmail.com', 'kiranalarasati', 'ae0ee22c7ab9805e0a153374d1d9ff2827b92979', '', '', '22 Nov 2021 12:48', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(5, 2, 'Rian', 'rian@gmail.com', 'rian', 'd703e234f79945cb054da8480461332197fbe25f', '', '', '22 Nov 2021 12:53', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(6, 2, 'Restu pratama', 'restupratama@gmail.com', 'restupratama', 'dc604caeae5fa220bbc2bffb35f54767d96becba', '', '', '22 Nov 2021 12:55', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(7, 2, 'Adi Murdayani', 'adi@gmail.com', 'adi123', '74e92d137df14c2f05a571ebf2dfc75145a69045', '', '', '23 Nov 2021 05:54', 'e43vXPWmRmw:APA91bFDxq8k6H5JpdCslAl3dFIISxMuHy82_6g_DEJRIcxwotQVpL2fwRxaLiKbp_cPAOXWwz9aR-BdNqw-pUhx350q3euCaU7D9syIpsbdirnmflIhmlRCVZ8SOobKNQOFpJDSi2u9'),
(8, 2, 'Fabianahmad', 'fabianahmad@gmail.com', 'fabianahmad', 'fd59d877b8c7798a09a18aed7f50144e066d500e', '', '', '23 Nov 2021 06:46', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(9, 2, 'Resa jaya', 'resajaya@gmail.com', 'resajaya', 'dc604caeae5fa220bbc2bffb35f54767d96becba', '', '', '23 Nov 2021 10:03', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs'),
(10, 2, 'Adelard Jibril', 'adelard.jibril88@gmail.com', 'Adelard', 'eed2cb4828d7d9c52aa757501900686ea8bff499', '', '', '23 Nov 2021 10:24', 'fkT24IQyFy0:APA91bHPnQY5Q8DCZRnPshWCZZp1At_uHaM4wmgP_SOD6Lr359aiyCtGAPoV8CZZcx0oxKn3eK5ueYQ3wRpc07AV0w1muUdpYJueSEJZPoErXzUJkTGQZU0tmxmIVK2tVAaMNfSemUAs');

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
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kostumer`
--
ALTER TABLE `tb_kostumer`
  MODIFY `id_kostumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
