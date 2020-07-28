-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2020 at 07:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Balai Latihan Kerja', 'member.png', 'admin.png', 'admin@admin.com', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `status` enum('tutup','tersedia') NOT NULL,
  `detail_pelatihan` text NOT NULL,
  `nama_pelatih` varchar(255) NOT NULL,
  `kontak_pelatih` varchar(255) NOT NULL,
  `kuota_luar_kota` int(11) NOT NULL,
  `kuota_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelatihan`
--

INSERT INTO `tbl_pelatihan` (`id`, `nama`, `tgl_buka`, `tgl_tutup`, `status`, `detail_pelatihan`, `nama_pelatih`, `kontak_pelatih`, `kuota_luar_kota`, `kuota_kota`) VALUES
(40, 'Pelatihan Corel', '2020-07-27', '2020-07-30', 'tersedia', '', '', '', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftar`
--

CREATE TABLE `tbl_pendaftar` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Proses Konfirmasi 1=Hadir 2=Tidak Hadir 3=Cadangan 4=Cadangan Proses Konfirmasi 5=Cadangan Hadir 6=Cadangan Tidak Hadir',
  `wilayah` enum('luar kota','kota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaftar`
--

INSERT INTO `tbl_pendaftar` (`id`, `email`, `id_pelatihan`, `status`, `wilayah`) VALUES
(103, 'kota@mail.com', 40, 2, 'kota'),
(105, 'kota@mail.com', 40, 0, 'kota'),
(108, 'luar_kota@mail.com', 40, 2, 'luar kota'),
(110, 'luar_kota@mail.com', 40, 0, 'luar kota'),
(112, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(114, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(116, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(118, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(120, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(122, 'luar_kota@mail.com', 40, 3, 'luar kota'),
(124, 'kota@mail.com', 40, 0, 'kota'),
(125, 'kota@mail.com', 40, 0, 'kota'),
(126, 'kota@mail.com', 40, 0, 'kota'),
(127, 'kota@mail.com', 40, 3, 'kota'),
(128, 'kota@mail.com', 40, 3, 'kota'),
(129, 'kota@mail.com', 40, 3, 'kota');

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
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'ADMIN', '', 'admin@mail.com', '081906515912', '1526456245974.png', 1, '2020-07-27 20:05:16', '2020-03-14 21:58:17', NULL),
(2, 2, 'member', '$2y$05$8GdJw3BVbmhN6x2t0MNise7O0xqLMCNAN1cmP6fkhy0DZl4SxB5iO', '', 'MEMBER', '', 'member@mail.com', '081906515912', '1583991814826.png', 1, '2020-07-27 18:08:24', '2020-03-14 22:00:32', NULL),
(17, 2, 'Harits', '$2y$05$WdPoYb9l71mpVS1FCivlau2d1hFtm2F446/CeNMyaIgbwAu5WKg.e', NULL, '', '', 'harits.abdullah19@gmail.com', '', '', 1, '2020-07-27 21:21:42', '2020-07-27 18:16:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(5, '2382a7302a22da5950424bda4a802a', 14, '2020-07-19'),
(6, '82519ebf2cc0eb5fa9e0d60181e733', 14, '2020-07-19'),
(7, 'b1bd9c47d5a92f6612be0981cd2131', 14, '2020-07-19'),
(8, '03353bc90db9f08d68b10815489c5b', 14, '2020-07-19'),
(9, '18a0adb68d8fd92bb5d13a54b90887', 14, '2020-07-19'),
(10, 'a41104a318a898b057aa016ee09d76', 14, '2020-07-21'),
(11, '343e610e8ef678626134807f21c52a', 14, '2020-07-21'),
(12, 'c30ce22f8395205ecc692de838efd2', 14, '2020-07-21'),
(13, '609493c57c72d81e0a565263909563', 14, '2020-07-21'),
(14, '722d4862853a2c8343253879c6e4e8', 14, '2020-07-21'),
(15, 'd1889db795ee771d70a7d220564892', 14, '2020-07-21'),
(16, '6e6508adab216e8d315ac16f578caf', 14, '2020-07-21'),
(17, 'f52bb2b7b22318214615caebca82e7', 14, '2020-07-21'),
(18, '98f1284cbac1b5ab008eea4c2875b0', 14, '2020-07-21'),
(19, '1d6749cf44bf5dcc9553ede583c39c', 14, '2020-07-21'),
(20, 'da315410d266e197e736aed9264b09', 14, '2020-07-21'),
(21, '9a66073e08668448daca5c7ef49ece', 14, '2020-07-21'),
(22, '15356b42416837c89444724475cc64', 14, '2020-07-21'),
(23, '11202f902087cb5011c195a721acb7', 14, '2020-07-21'),
(24, '9a08b7614235b427454c05c4a0a06f', 14, '2020-07-21'),
(25, '72fa874f68add5098ad34cff244072', 14, '2020-07-21'),
(26, 'bf4c57a54ebb173dfd11b43454def6', 14, '2020-07-21'),
(27, 'cdeaf317d0727454011c3dc83689fa', 14, '2020-07-21'),
(28, '4d8f99719a060ade3c23a171e3e3f2', 14, '2020-07-21'),
(29, '1c171e853ad80a721b943399d8047b', 14, '2020-07-21'),
(30, 'd94cfa96dd62026f62a87dd8dda61b', 14, '2020-07-21'),
(31, 'de5a13839d4eb0b3c9bf376e73e95c', 14, '2020-07-21'),
(32, 'c636014b9bbdd0c6c6942d5d9dfba0', 14, '2020-07-21'),
(33, '0a36fe068c99e81bd02df8d3710048', 14, '2020-07-21'),
(34, '687b342738b0afcb0e988fc9099cf5', 14, '2020-07-21'),
(35, 'a2c1a1acb864c67f0846c1758e933f', 14, '2020-07-21'),
(36, '9ab43c648916df38430ad136bb25fa', 14, '2020-07-21'),
(37, 'e4e180b98e1b18f0c77a4f4a2842cf', 14, '2020-07-21'),
(38, '50a0cee4a2fa952c963cf347586f8b', 14, '2020-07-21'),
(39, 'c06409e3814a9e483b002d5f75e0ad', 14, '2020-07-21'),
(40, '842cf8c9408039e588477c28512dba', 14, '2020-07-21'),
(41, '7bfe2b7bbda03615f707d3899625de', 14, '2020-07-21'),
(42, '9584bc5d416a88e3d4bbb95f8f727e', 14, '2020-07-21'),
(43, '483fe231dc3c8bec962fb2417fe0bb', 14, '2020-07-21'),
(44, '612523df0869db726a5b6b0a18d23d', 14, '2020-07-22'),
(45, '8020e31dc75152f98f3671b401490f', 1, '2020-07-25'),
(46, '217dda1ebaaff6ca96742f362223ac', 1, '2020-07-25'),
(47, '5f846069a8a0c60cfaee296ace7c02', 2, '2020-07-25'),
(48, 'bdcc90177e4da7e62890dfa50fb797', 4, '2020-07-25'),
(49, '173f3f450924324d820c3b1c518d51', 1, '2020-07-25'),
(50, '14491e8b7e2cf51642f1bce26a419f', 2, '2020-07-25'),
(51, '6b775e1734cfef3e7dbc2321ced6c4', 4, '2020-07-25'),
(52, 'dbbd483e11e3ebf8e24aad7957dc0b', 1, '2020-07-25'),
(53, 'f4f11ced86036cb231a12b0a4aa3d4', 2, '2020-07-25'),
(54, '46581585d9e4152530be6bc836117d', 4, '2020-07-25'),
(55, 'fa31b85b80df059328bfaadb9cd2ab', 1, '2020-07-25'),
(56, 'ef5b303c52fc2bc33a0b7feb5a66db', 2, '2020-07-25'),
(57, 'c5facdd1c7c9446cbd92dd885da8dc', 4, '2020-07-25'),
(58, 'ca61d1904d045dfd49f6c57fcde34c', 1, '2020-07-25'),
(59, '2c1c84c910a5f661b665f0a52d1556', 2, '2020-07-25'),
(60, '94617288067927aa74d8ec32867afa', 4, '2020-07-25'),
(61, '3780223d01c433192fca3c769b6b21', 5, '2020-07-25'),
(62, 'd73e4f82ed58e2bb89e66bac23b169', 6, '2020-07-25'),
(63, '0f21756909a28a6b846cd97cb4bb7e', 7, '2020-07-25'),
(64, '5813dc5e70085049ce75c56180ab96', 8, '2020-07-25'),
(65, '0ae5f8c77198abb326cb81b6f19cde', 13, '2020-07-25'),
(66, '536a7ed1420128332afa2e72f3be85', 14, '2020-07-25'),
(67, '1134d9f1d992c219daba225dc1fbd0', 15, '2020-07-25'),
(68, 'f7a9a5da044f0f356f35fcea6398e9', 16, '2020-07-25'),
(69, '09cde0c72f424bcb3782edf9c5aefa', 16, '2020-07-25'),
(70, 'e5af1e9daf77750d09de74128eb585', 17, '2020-07-25'),
(71, 'ce3767c66b309a3981144be03bed17', 18, '2020-07-25'),
(72, '605af8947b6f537d63358bb58488bd', 19, '2020-07-25'),
(73, '19f67f3dd6ac24b2cffbbe8f3bc56d', 20, '2020-07-25'),
(74, '71d905e68d121065ef687e6ea82ebc', 1, '2020-07-25'),
(75, '5defefc267a92ea862441902e05005', 2, '2020-07-25'),
(76, '4447540b51c3ab0ef7000ca67369c9', 4, '2020-07-25'),
(77, '1ef76cf8aa82993c6b7df0e0522f6d', 5, '2020-07-25'),
(78, 'd0459a480f23a6a5db900ae018fb9a', 6, '2020-07-25'),
(79, 'dd4320bd7c6e9e41386bc874a3c5c6', 7, '2020-07-25'),
(80, '717360934a22433219b41aa11b65e4', 8, '2020-07-25'),
(81, 'e449f1165fd858dcba8bdd519bbc27', 13, '2020-07-25'),
(82, '4b2608cd5553b070d08e3dca686dd5', 14, '2020-07-25'),
(83, 'e616baa5b19b122d36af11fe148e2a', 15, '2020-07-25'),
(84, '8014bbf0a7559c2a2a984baea12632', 16, '2020-07-25'),
(85, '473ecb1d08ea2bdae9ce6d42e73e18', 1, '2020-07-25'),
(86, 'd04ea499fc49b2b8b933392715ec5f', 2, '2020-07-25'),
(87, '14273b799b35471f884b3d5cda7025', 4, '2020-07-25'),
(88, '9e386ca98cd96dab95cced7dd1c785', 5, '2020-07-25'),
(89, 'f250c2516ccac2857f45f28bc612fe', 6, '2020-07-25'),
(90, 'c099f6afedbb1bf5189c95f9af8621', 7, '2020-07-25'),
(91, 'fb550455aa3f4c76efdefd371d1841', 8, '2020-07-25'),
(92, '6892783f838ba5615a6f41f4c9478f', 13, '2020-07-25'),
(93, 'b1be2dc11c41eba3227a7ed527cb60', 14, '2020-07-25'),
(94, 'b034f327a453f83a27bfb03682fb0e', 15, '2020-07-25'),
(95, '4664cbe7b5d58e172b5734293535eb', 1, '2020-07-25'),
(96, 'e296bbc778e4f6715e2c5f7e7dbfd3', 2, '2020-07-25'),
(97, 'c05d97835d34076ba1ef9efdb0c0e1', 4, '2020-07-25'),
(98, 'ed9db7be0c7f2ace9e87f1c48a99a6', 5, '2020-07-25'),
(99, 'a0dd874adb9ad7e0734d139618c670', 6, '2020-07-25'),
(100, 'fd778aa7bb2490e0071a0594823d9e', 7, '2020-07-25'),
(101, '60f2eeca011d3c396503afc002232a', 8, '2020-07-25'),
(102, '54e8b14ef19652ec3357d5376a6f98', 13, '2020-07-25'),
(103, '5134e5c23b4190b668dd8b90caa0ad', 14, '2020-07-25'),
(104, 'cee8d8413b634afd26d6bda84b5c70', 15, '2020-07-25'),
(105, '11178e0c22efe66d4025ccbf5c4c1d', 16, '2020-07-25'),
(106, 'a7994faac28b4c04c9d4e8eea6f1eb', 17, '2020-07-25'),
(107, '434200e171e7fbd30c019a0cfe2559', 18, '2020-07-25'),
(108, 'd512b926a71132d0701c4b5b373b03', 19, '2020-07-25'),
(109, 'a9354ba1b6e5bbbe2a0ac63992075c', 20, '2020-07-25'),
(110, '0095b3021440c7875685bc2be1fa4c', 1, '2020-07-25'),
(111, 'df0ac4baeb4af956625351d4dbe5c9', 2, '2020-07-25'),
(112, 'e3fe7c41b15d66eef71869a1d15277', 4, '2020-07-25'),
(113, '4dc0e2f222d8fdeb6919b0b2456ede', 5, '2020-07-25'),
(114, 'ff1f1f4f5cfbb87daa03872363db5d', 6, '2020-07-25'),
(115, '25fe3486cd065c33b49e67985eddae', 7, '2020-07-25'),
(116, 'f0de76786300bca6b357ba34aae661', 8, '2020-07-25'),
(117, '4e6f139a7de4920c104be71a0330ca', 13, '2020-07-25'),
(118, '989971784dad404a0fecd33d91ae1f', 14, '2020-07-25'),
(119, '3bd105179306f82a64ac703def3c7c', 15, '2020-07-25'),
(120, 'ca26892f07d339089f2bdc76050e44', 16, '2020-07-25'),
(121, '8e1e0963ee0be8cb5c65ac7b34a734', 17, '2020-07-25'),
(122, '00cd970564e62096f7178ecfb85924', 1, '2020-07-25'),
(123, '5166afbc1ee37fad2ad4509caa51a2', 2, '2020-07-25'),
(124, '37c2d494f045311d197158d8e5077a', 4, '2020-07-25'),
(125, '85c55c7cf502bfec27a5ab7094f899', 5, '2020-07-25'),
(126, '80e88442e0a4880e06516004d9fc36', 6, '2020-07-25'),
(127, 'ac4f74b7869196b08085467adc4850', 7, '2020-07-25'),
(128, 'd4c0b9ddf2a25f373e0552900f1388', 8, '2020-07-25'),
(129, '6d56aed9f2bd1d9e842b11cea8c9c9', 13, '2020-07-25'),
(130, '4a4337b3102aa19c7340f39894469f', 14, '2020-07-25'),
(131, '5c3e6c445f901b936449869329e345', 15, '2020-07-25'),
(132, '1bc02870edb8c93bceb1ddfdd9dec9', 16, '2020-07-25'),
(133, 'e9c19de3a5b66c2292e9e2da00d5b6', 17, '2020-07-25'),
(134, 'c84aa898cbb643f47671725a40cbef', 17, '2020-07-25'),
(135, '820e5ec30bd9aca6dfbf02b8c62ae2', 18, '2020-07-25'),
(136, '38928eaefd788e87378faba5d26010', 18, '2020-07-25'),
(137, 'b778788ca87680f8529aec2bd17baf', 1, '2020-07-25'),
(138, '21c8ed061d2fe68a0a1e0c0bc7a1cb', 2, '2020-07-25'),
(139, '93d77b967ed71a43cb0d67ee8a36a2', 4, '2020-07-25'),
(140, '2b3eeef9765508126715388d8dbc82', 5, '2020-07-25'),
(141, '18f42bca80b9ca509ebee221359421', 6, '2020-07-25'),
(142, '2c2e1ffea77628f81bcab540b144b0', 7, '2020-07-25'),
(143, '71980439df63ce451385042262ca85', 8, '2020-07-25'),
(144, '603d2b8ec0b2a0e1fd5c6866f458e5', 13, '2020-07-25'),
(145, '62506039f199f79c2283c228350a9f', 14, '2020-07-25'),
(146, '1980aee21da2da614d75504994a232', 15, '2020-07-25'),
(147, '8929aa98abdbdeedf1b4d4f06e9f12', 1, '2020-07-25'),
(148, '1eb518a4c01ab681a66c8129bb1fa0', 2, '2020-07-25'),
(149, 'a937b38038fa5b6920add303f84f92', 4, '2020-07-25'),
(150, '48c7e8739433a51b07d1eaabe6e9ee', 5, '2020-07-25'),
(151, '8e8ec962883f485ba5c9d2c3452b77', 6, '2020-07-25'),
(152, '030744a1d4ac85f457e3e9bf0936e3', 7, '2020-07-25'),
(153, '3b50b5dcb6feec8b575549401875c0', 8, '2020-07-25'),
(154, 'eb992ce31ca584e30dbad3fb8798c3', 13, '2020-07-25'),
(155, 'f72b7b14b38a353089c78778dd1af3', 14, '2020-07-25'),
(156, 'b72cc919582e77f81146022813165d', 15, '2020-07-25'),
(157, '25c7856e948e4f799217625695fbe0', 1, '2020-07-25'),
(158, '15ec63e66b17a8cd83233d776df064', 2, '2020-07-25'),
(159, 'a9d41988e6393d47ba56c8997e24c5', 4, '2020-07-25'),
(160, '91020d4bb63063613f455ab0277ea0', 5, '2020-07-25'),
(161, '452a253bf2bc3253b2e8e5306cbd3a', 6, '2020-07-25'),
(162, 'bb7db1a31572b849b4c95ab5d7463b', 7, '2020-07-25'),
(163, '9bc6dbe341770943c846722e47ae14', 8, '2020-07-25'),
(164, '7e27c37484b10ea1670d227651cd97', 13, '2020-07-25'),
(165, '03c5a8bdf78466d24f45b8f863b1d0', 14, '2020-07-25'),
(166, '6e119aa254fd8ed2b8a88b937221f8', 15, '2020-07-25'),
(167, '1b73148b4e092a6135b379f00d4087', 1, '2020-07-25'),
(168, 'fcbf83182be780342769188e7f6f8c', 2, '2020-07-25'),
(169, '2685742dbca05d1ec4aa810446d6a5', 4, '2020-07-25'),
(170, '20730206260dd4ccb51fc7c140041c', 5, '2020-07-25'),
(171, 'a27ff720c24c72c38638715304b983', 6, '2020-07-25'),
(172, '6859916ffa7ae38568fde306613256', 7, '2020-07-25'),
(173, 'ea2f0fb8a6a3ebd7ad611f7ea9fb3b', 8, '2020-07-25'),
(174, '62a8cfa8ff559f74f648abf89403d4', 13, '2020-07-25'),
(175, 'de63ddf02d519c1883600c7a8063c4', 14, '2020-07-25'),
(176, 'ea98ed51b4eba8c015aae2c65efb18', 15, '2020-07-25'),
(177, '21802f4fc974747f17cc665295a5d7', 1, '2020-07-25'),
(178, '108f7f0dffde8c76f1076004c48050', 2, '2020-07-25'),
(179, 'fcbc517bacf0739e6f1489c81e438a', 4, '2020-07-25'),
(180, '66a58f75dae791515a7645f68c24d7', 5, '2020-07-25'),
(181, 'ca052d51b4df8364cd169a7a825c99', 6, '2020-07-25'),
(182, '2d3f51bc6cd892648864b7ce20c833', 7, '2020-07-25'),
(183, '3d4b497becfa47abc5a6ddb420f295', 8, '2020-07-25'),
(184, '3ab1e7148920f5c704044c0676aec7', 13, '2020-07-25'),
(185, '8dc097398286eb8959877dbe747ca1', 14, '2020-07-25'),
(186, 'b98d53f522b8d9eddad6be4aba480b', 15, '2020-07-25'),
(187, '34a7650b273d14191765e59ee8cbf2', 1, '2020-07-25'),
(188, 'dc9113e757311a078a6ac9b4473caa', 2, '2020-07-25'),
(189, '09b5778c2a9d10d52769e0461fe976', 4, '2020-07-25'),
(190, '9cbba0116d6ed18a6f72d358f90511', 5, '2020-07-25'),
(191, '99a7ce1e0698a72364acfd098d174d', 6, '2020-07-25'),
(192, '4bfc5d13540cb9ce7589103fbd017a', 7, '2020-07-25'),
(193, '778fae3f31f5b2cf4e25c98ae5ba89', 8, '2020-07-25'),
(194, '550d419b061170db7e7df17a96aa29', 13, '2020-07-25'),
(195, '230185b08ee13b823760f0b7dc7a50', 14, '2020-07-25'),
(196, 'c61678442235018e5236270e264b09', 15, '2020-07-25'),
(197, '7e451cc5feb031aa66e7d04547a686', 1, '2020-07-25'),
(198, '8ac9ca521fb55bc9733cfda1fa0415', 2, '2020-07-25'),
(199, 'c3a83701bc3b88930b0bc4c9afa113', 4, '2020-07-25'),
(200, '49192395c52ffffae2a7a26bc935fe', 5, '2020-07-25'),
(201, 'fb879cf91ad422bab4a6f1412a3fe4', 6, '2020-07-25'),
(202, '0f741ef718eac7ce337237a9e1741f', 7, '2020-07-25'),
(203, '136bbd2f5f7f8f2e0734e084ec421a', 8, '2020-07-25'),
(204, 'e6995a96139de1cc94a3b1a3d138bd', 13, '2020-07-25'),
(205, '1d7b7c497ebf3a151bb85d01d057ba', 14, '2020-07-25'),
(206, '95103c93278b9aede62c214456fe63', 15, '2020-07-25'),
(207, '2000994bffd39732c617374e145b73', 1, '2020-07-25'),
(208, 'b8830fcb62e77a86c9da6f2c1c72c9', 2, '2020-07-25'),
(209, '53d0f6213d70f8d64ab4708e60aee3', 4, '2020-07-25'),
(210, 'b55d9339f5f17810e939f760ee50c2', 5, '2020-07-25'),
(211, '610b2061805f5160e379e9b2ac5aed', 6, '2020-07-25'),
(212, '616fd4bcd4f0600879822f22b9138a', 7, '2020-07-25'),
(213, '21aa48ac16a3c550d309b4efe2ffda', 8, '2020-07-25'),
(214, '69f232b3ad75c33e90fa4fdeac9e05', 13, '2020-07-25'),
(215, 'd1f0200275757f2d7edec877632f39', 14, '2020-07-25'),
(216, '6822f51edfa2b6feef03c2013a4467', 15, '2020-07-25'),
(217, 'f31c2958dde8e9bb2fa6f1f4ac2188', 1, '2020-07-25'),
(218, '023614b668165fa3b49b78a24325da', 2, '2020-07-25'),
(219, 'ecf54bee4276d83e6f83accba50187', 4, '2020-07-25'),
(220, '821afab4b91150c719452118cb1d55', 5, '2020-07-25'),
(221, 'cfdd70d5f4fed2e7708862265a9e6d', 6, '2020-07-25'),
(222, '9238096b0b1545914d2d68ff9b0e0b', 7, '2020-07-25'),
(223, 'a0489f593aa5bfe6c6db5ad5c24675', 8, '2020-07-25'),
(224, 'a764d6a07662d6586cbe839e0d4cc1', 13, '2020-07-25'),
(225, '9c0b54c4d742917214d30ce46d5bf1', 14, '2020-07-25'),
(226, 'd0e7a62005145dc674ca4ed3fda28e', 15, '2020-07-25'),
(227, 'f6e46108289ca7d50f8328bd569b2f', 1, '2020-07-25'),
(228, '6e7845ef171958aec8a1a1d7ebc6b7', 2, '2020-07-25'),
(229, '885e5eb4fddd29dcb16ad225d243e6', 4, '2020-07-25'),
(230, '15370b06dc58f0b8db14b82db303c5', 5, '2020-07-25'),
(231, 'f57e75b9165e579d8c8aa1c88d6c3c', 6, '2020-07-25'),
(232, 'b0b80ea39b8971038904ccfee5d2db', 7, '2020-07-25'),
(233, 'd36e9cfe9d7133da5d2402999df111', 8, '2020-07-25'),
(234, '7066db67e14e2009fb67f4c8739751', 13, '2020-07-25'),
(235, 'a27dc3676b65054484643536c3da7f', 14, '2020-07-25'),
(236, '9b350904f79271dbef6869d0bfac69', 15, '2020-07-25'),
(237, '1d1a013cd13aed3d06555a04fc1487', 1, '2020-07-25'),
(238, '1f15b4bc4f9eb6b5f1fc57bbeeb27e', 2, '2020-07-25'),
(239, '4becfd074326cf47f42194c241da03', 4, '2020-07-25'),
(240, 'd9bdc0927cd6610c54155a4913b41e', 5, '2020-07-25'),
(241, 'edf57e0b3c200e482791f76c6b1daa', 6, '2020-07-25'),
(242, '531cb07ab2f1044b09a8ed3acbf4cd', 7, '2020-07-25'),
(243, 'caef1b7cbbe1229f2cf2ffd3b1348d', 8, '2020-07-25'),
(244, '5bdce350c1443bb2d5871cabdfb2da', 13, '2020-07-25'),
(245, '01dedf6f3147254dffe36701ce94af', 14, '2020-07-25'),
(246, 'a1d9427c7927c7bcffb71cae570af0', 15, '2020-07-25'),
(247, 'd27129f8ac35cd5b68283020b70364', 1, '2020-07-25'),
(248, '70401814b8c2b1bfec73abb50ae9cc', 2, '2020-07-25'),
(249, '3569737f6996e59f3655354e42367a', 4, '2020-07-25'),
(250, '71ccd21620047d80704eaae61bdf62', 5, '2020-07-25'),
(251, '8eb105808e4ff3a9e8c26716e8b1c3', 6, '2020-07-25'),
(252, '9b046f87a67d679651e3eddeb88726', 7, '2020-07-25'),
(253, 'de5baf51e9e6b3862c257ed58d9c3f', 8, '2020-07-25'),
(254, 'c17ef56e56328765b7ba88aa420b2e', 13, '2020-07-25'),
(255, '7f215cf57d224cb15da70ec9de45ad', 14, '2020-07-25'),
(256, '6403859ea773bfc1311587df52ba74', 15, '2020-07-25'),
(257, '2289c13e46af2d6e3d901417b56dbf', 1, '2020-07-25'),
(258, '6b49223629f4ba70eaf4215ca9c333', 2, '2020-07-25'),
(259, '1f17ef6332f7df565565311d333f89', 4, '2020-07-25'),
(260, 'c31d26f9ba3179c0e2b8adf91dd019', 5, '2020-07-25'),
(261, '495ada4eaec7c400813d72e640ddb3', 6, '2020-07-25'),
(262, '9be73367e729d7e23b4cc924085d87', 7, '2020-07-25'),
(263, 'f5975917e30b77fd22b1e7ce9932da', 8, '2020-07-25'),
(264, '0c7d14416d76d54944d4b88ccdab20', 13, '2020-07-25'),
(265, '02f9b88f1acf41d938864537edcae6', 14, '2020-07-25'),
(266, '21cd28cacb5bb3b165da6d9fa3da6d', 15, '2020-07-25'),
(267, 'bfd4c58cc4215e23232ceb304b570d', 16, '2020-07-25'),
(268, '27fbb58798ae70915db2301a0d67f8', 1, '2020-07-25'),
(269, 'fcd07d7448d0a07ef4ce43b0f4c3a7', 2, '2020-07-25'),
(270, 'f8b9577347fcba317dceb1c014a108', 4, '2020-07-25'),
(271, '6eff9d8216ad0ec2f42d0dd1f5f623', 5, '2020-07-25'),
(272, '2ab4396fe4d06f60ed55f7ed7d9b18', 6, '2020-07-25'),
(273, 'b6f33e72546c43f01527cfbfb1bbc7', 7, '2020-07-25'),
(274, 'faac09cd34c8a8c9703efe62a95e17', 8, '2020-07-25'),
(275, '7dd79ddd68448e5641b655e89e2659', 13, '2020-07-25'),
(276, '5d1b2708ff3584e839941562c07a36', 14, '2020-07-25'),
(277, 'b42956ca27967d469fcc28baa8a580', 15, '2020-07-25'),
(278, '0b3afd2e2e62599b15c7477e638666', 16, '2020-07-25'),
(279, 'e97e79e621202c0e1ee7ce3fc9b160', 1, '2020-07-25'),
(280, '67dc4c433323fca5765f9700a0ca39', 2, '2020-07-25'),
(281, 'f854b5859c81223f7c3d46de506655', 4, '2020-07-25'),
(282, '3ffd724eb25e5e918cf040d75e462f', 5, '2020-07-25'),
(283, '1e097db6630d3e69e447c3c3d440fb', 6, '2020-07-25'),
(284, '835e05da5c332141e80dac24f4517f', 7, '2020-07-25'),
(285, '35b60f39da153bc8a3feabe5efe7ea', 8, '2020-07-25'),
(286, '43997a80ea04a4bda3182b5ab56dff', 13, '2020-07-25'),
(287, 'f37c5620a27783ece7c294b15b1d75', 14, '2020-07-25'),
(288, '289552067374a34c938f960a5be6d9', 15, '2020-07-25'),
(289, '66fc8138628a500552b8fe2669ad2f', 16, '2020-07-25'),
(290, '541768559e83f3cc982d468d7a3707', 1, '2020-07-25'),
(291, 'ed14d4affd1360db48fe60c458f595', 2, '2020-07-25'),
(292, '67444c1fa89f15a215ba5125d96a45', 4, '2020-07-25'),
(293, 'd867cd933182468b613437bf44c5bb', 5, '2020-07-25'),
(294, 'e494b6018f4c1845a7b49a21d00e0b', 6, '2020-07-25'),
(295, '76b4a134db2b14b0504f740666aef5', 7, '2020-07-25'),
(296, '91bce2c75eb5ee730c89967611d675', 8, '2020-07-25'),
(297, '352c8336f77d96b4eea216cd6b4a2a', 13, '2020-07-25'),
(298, '2f89e4b591b24191352a7da7cde6da', 14, '2020-07-25'),
(299, 'df75c6434940623606621bc5e85f1b', 15, '2020-07-25'),
(300, 'ee2346c02f7279fc57e6bccf082004', 1, '2020-07-25'),
(301, '1ff20f13d18ee056464cf19b9f6690', 2, '2020-07-25'),
(302, '5e6ad13287b5ed82193205c84647f0', 4, '2020-07-25'),
(303, '5dcb5275c36e88d7b52339b73ab7fb', 5, '2020-07-25'),
(304, 'e974aecbbd696f6952a2c2b16695a7', 6, '2020-07-25'),
(305, 'd361c3ca27375d176296960be99b78', 7, '2020-07-25'),
(306, 'f664a2f85194c6a95572a4ac10f0c0', 8, '2020-07-25'),
(307, '2d01b3d55da93c6445696f279704e4', 13, '2020-07-25'),
(308, '7d9ac869cf79e82ad316c41d0d2008', 14, '2020-07-25'),
(309, 'ec42788db5880a92899150b27c507b', 15, '2020-07-25'),
(310, 'bfdfcbfd19cf94c64d0188004ef776', 1, '2020-07-25'),
(311, '4ddf5fa98ad5dab2fbc75c7d3bbba4', 2, '2020-07-25'),
(312, 'ec2c49b9ed45eabcc13afedbcdc3e0', 4, '2020-07-25'),
(313, '83305cac5727737f7f5cbc43834137', 5, '2020-07-25'),
(314, 'dbe59327ff247361ec6cd6ecd7acf6', 6, '2020-07-25'),
(315, '6cd46243dfa92e4e2fe0a9d9dd0edb', 7, '2020-07-25'),
(316, '47719d639092d5c4ec30733b5ae7ec', 8, '2020-07-25'),
(317, '5fff3c1e5628920f2e2ea440ef9fb6', 13, '2020-07-25'),
(318, 'c8c26ae6c266a916a4a16cd0743246', 14, '2020-07-25'),
(319, 'd93921f9255a96cd92fe035d2f953f', 15, '2020-07-25'),
(320, '7aa37cdee146f9b1ea7e9238a779f3', 16, '2020-07-25'),
(321, '83f9dad168e452b12ceb883062f0d0', 1, '2020-07-25'),
(322, 'a9e14eee9e3616da6ca1f477e8c739', 2, '2020-07-25'),
(323, 'f906638d700fb8943bfa1601c49309', 4, '2020-07-25'),
(324, 'ffca7a90a9288d36b2ed23167368ff', 5, '2020-07-25'),
(325, '1c7c3c5db7d66190e8901f1efec6b6', 6, '2020-07-25'),
(326, '363bc299fa841be81cc836964ef317', 7, '2020-07-25'),
(327, '860c77a2b28068b97cd46ecd9efc2b', 8, '2020-07-25'),
(328, 'd0c18f9f55da7c495b349d4429fd02', 13, '2020-07-25'),
(329, 'e26c4df201769f20b1152a22dfcc6c', 14, '2020-07-25'),
(330, '211fd1c68a267682b7af0298614cea', 15, '2020-07-25'),
(331, 'cd54045f9f09b38af1d5cd14d85f7c', 16, '2020-07-25'),
(332, 'c48c215fbd1246ab30c740bf6f7972', 17, '2020-07-25'),
(333, 'b8b424b9f75ee916c45dff43ddb198', 1, '2020-07-25'),
(334, '9d04ca519d87c37719983ed5196dbd', 2, '2020-07-25'),
(335, '971b010dc3ae7843be82a16d0041e4', 4, '2020-07-25'),
(336, 'fcca93d0a349b1555823612341890c', 5, '2020-07-25'),
(337, '3b0f3ccb33bac4a7a45fe96214f3dc', 6, '2020-07-25'),
(338, '9ded899cdb91c2dc5ddf57ecba2ff0', 7, '2020-07-25'),
(339, 'fd3067046cc6863007e30f630eaea4', 8, '2020-07-25'),
(340, 'e18f61327596365c691a0b0e3a5ac1', 13, '2020-07-25'),
(341, '5985ec3ed65ee08af7dc60c37bf974', 14, '2020-07-25'),
(342, '76e2daf178bd38041f293d113b9215', 15, '2020-07-25'),
(343, '17a5957ad70519fd6eb21b9a8cea92', 16, '2020-07-25'),
(344, '5a4bbd780dc57bcd7c0e8a09292b2f', 17, '2020-07-25'),
(345, 'dc8043876a79e69f0b31a5c665469b', 18, '2020-07-25'),
(346, 'e0addd693d8f6c1cb201faa17d6eed', 19, '2020-07-25'),
(347, '04436a620b639bae6eb99451f7069b', 19, '2020-07-25'),
(348, '6353bdd884be5e9b74fcdb74ecd349', 20, '2020-07-25'),
(349, '325338d77b98ea974c2cc8e86106c4', 21, '2020-07-25'),
(350, 'adba4f6eeed416807078ddba602f3d', 1, '2020-07-25'),
(351, '1425884ca18a035e5d8f4ea0e4f049', 2, '2020-07-25'),
(352, '23e70f04ae2b8a37dc71d9b70f19a3', 4, '2020-07-25'),
(353, '6c2a80ac59f60ef1fbce193dc289f6', 5, '2020-07-25'),
(354, 'dea7688500c9943ddab5afef90d052', 6, '2020-07-25'),
(355, '276a09b711304e94d275f45c5ee17b', 7, '2020-07-25'),
(356, 'd729517f6b05417d52c8a15fd0920e', 8, '2020-07-25'),
(357, 'a3f9cd6396f54f70f65a11747022de', 13, '2020-07-25'),
(358, 'bf221463e891e3dfade7fd3c04de27', 14, '2020-07-25'),
(359, 'e1760bb4fb250e5a95ef48a4373c50', 15, '2020-07-25'),
(360, 'dacd3d2c98f7b0eeb36615ef79d7cc', 16, '2020-07-25'),
(361, '25d02230d1d0434224f4f714165392', 17, '2020-07-25'),
(362, '49c5f80bfd19835d86f04447d9eb89', 18, '2020-07-25'),
(363, 'c69a790956b7dac248899ec254616c', 83, '2020-07-27'),
(364, 'ea24b026edef677e88020c034d7a2f', 84, '2020-07-27'),
(365, '99734c6a2a099ee3e9f15477b0036c', 85, '2020-07-27'),
(366, '1941f24be4cc7aa1e63d307deb5fcc', 103, '2020-07-27'),
(367, '3ce427c3bc09178c333084cda0ade3', 102, '2020-07-27'),
(368, '070696948559db4516b56e0b30fc0d', 104, '2020-07-27'),
(369, '76aa56c1a61354124e6dca4fdef50d', 103, '2020-07-27'),
(370, '2ead86d8344031e981f684117e2833', 105, '2020-07-27'),
(371, 'f8da1e440bf65d7fc0910d70d544ca', 108, '2020-07-27'),
(372, '9aa695d8e6c3b4c1c0ddf746ef626a', 110, '2020-07-27'),
(373, 'c44be99d0d6aacd98847a3eee20c36', 112, '2020-07-27'),
(374, 'a8e6460401530d9fc3432c7e6b59b9', 114, '2020-07-27'),
(375, '9afa38c4316a0b93f7f9e36ddeaa6d', 116, '2020-07-27'),
(376, '3d84fd942bd68a49f27875558babca', 118, '2020-07-27'),
(377, '3542aa4881967cd4930359d7346d09', 122, '2020-07-27'),
(378, '0517fc0b59079e2115c9c763d934af', 103, '2020-07-27'),
(379, 'bf7dc7006344205bc67c70f00843c5', 105, '2020-07-27'),
(380, 'd3570a05da5a174b28e6190eb10b44', 108, '2020-07-27'),
(381, '4720dbfdee07231557cc52213dfaac', 110, '2020-07-27'),
(382, 'faf868b517652fd3062a2cf2909058', 112, '2020-07-27'),
(383, '9d06870081a8158fe51a9343b2944e', 114, '2020-07-27'),
(384, 'cea2c3ab739cbcd76ce891c4fea4b0', 116, '2020-07-27'),
(385, '4f9323e2a27085114a4f962dff360c', 122, '2020-07-27'),
(386, '0e682e8f2ace59b3371f39d51ecfc7', 103, '2020-07-27'),
(387, 'ca7f0c9686c5e414e07cbb948fb15d', 105, '2020-07-27'),
(388, '2c7ae35473e234e4850fe5dbbaaf4c', 108, '2020-07-27'),
(389, '7c00fede83206e1d2a1deb5e365b79', 110, '2020-07-27'),
(390, '1fcfe993e0dee0649cc52167817e5b', 112, '2020-07-27'),
(391, 'ae83bad40547bd2c8cfffab4751d0f', 114, '2020-07-27'),
(392, 'd122f3583800910cdf1945c626086b', 116, '2020-07-27'),
(393, '76267c0f744f039b8a09176c387d11', 103, '2020-07-27'),
(394, '387230c58993aab91fe339409b2339', 105, '2020-07-27'),
(395, '4e9549b9dbcd60ae7bdb000d42a3f8', 124, '2020-07-27'),
(396, '018b5a4f6a7001673f58f662b1fdab', 125, '2020-07-27'),
(397, 'abf8291d0d89ba4b30b219f0bd5012', 126, '2020-07-27'),
(398, '328c8ae5b35d93431e0c665267022c', 108, '2020-07-27'),
(399, '74198fc11a8ba245682a7c4416d48e', 110, '2020-07-27');

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
-- Indexes for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
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
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
