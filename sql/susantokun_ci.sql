-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 08:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `susantokun_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` varchar(225) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'SUSANTOKUN', 'member.png', 'admin.png', 'admin@susantokun.com', '081906515912', 'KOMPLEK BTN Munjul No.12A 02/06, Sukaresmi, Cianjur, Jawa Barat, Indonesia (43253)', 'https://facebook.com/susantokundotcom', 'https://instagram.com/susantokun', 'info-susantokun, demo-susantokun, susantokun', 'Situs Edukasi, Tips dan Tutorial', 'Susantokun adalah situs edukasi seperti pelajaran dan ilmu pengetahuan, serta membahas tentang tips, tutorial, teknologi, tugas-tugas hingga berita terkini.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelatihan`
--

INSERT INTO `tbl_pelatihan` (`id`, `nama`, `tgl_buka`, `tgl_tutup`, `status`) VALUES
(1, 'Testadad', '2020-07-01', '2020-07-02', 0),
(2, 'Test', '2020-07-01', '2020-07-02', 0),
(3, 'Test', '2020-07-01', '2020-07-02', 0),
(4, 'Test', '2020-07-01', '2020-07-02', 0),
(5, 'Test', '2020-07-01', '2020-07-02', 0),
(6, 'Test', '2020-07-01', '2020-07-02', 0),
(7, 'Test', '2020-07-01', '2020-07-02', 0),
(8, 'Test', '2020-07-01', '2020-07-02', 0),
(9, 'Test', '2020-07-01', '2020-07-02', 0),
(10, 'Test', '2020-07-01', '2020-07-02', 0),
(11, 'Test', '2020-07-01', '2020-07-02', 0),
(12, 'Test', '2020-07-01', '2020-07-02', 0),
(13, 'Test', '2020-07-01', '2020-07-02', 0),
(14, 'Test', '2020-07-01', '2020-07-02', 0),
(15, 'Test', '2020-07-01', '2020-07-02', 0),
(16, 'Test', '2020-07-01', '2020-07-02', 0),
(17, 'Anjing', '2020-07-01', '2020-07-02', 0),
(18, 'Test', '2020-07-02', '2020-07-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak akses Administrator'),
(2, 'Member', 'Hak akses Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_reset_key` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'ADMIN', 'SUSANTOKUN', 'admin@mail.com', '081906515912', '1526456245974.png', 1, '2020-07-17 22:43:45', '2020-03-14 21:58:17', NULL),
(2, 2, 'member', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'MEMBER', 'SUSANTOKUN', 'member@mail.com', '081906515912', '1583991814826.png', 1, '2020-07-17 19:09:37', '2020-03-14 22:00:32', NULL),
(11, 2, 'harits@gmail.com', '$2y$05$VtbxU/uI3DcliXPrtUvxXebwO6nIF54m37tl7BUjW6yt06taUi2gS', NULL, '', '', 'ruwucucak@gmail.com', '', '', 1, '2020-07-17 19:51:25', '2020-07-17 19:49:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
