-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2020 pada 08.52
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
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
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'Balai Latihan Kerja', 'member.png', 'admin.png', 'admin@admin.com', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `konfirmasi_pendaftar` enum('belum','sudah') NOT NULL,
  `konfirmasi_pendaftar_cadangan` enum('belum','sudah') NOT NULL,
  `status` enum('tutup','tersedia') NOT NULL,
  `detail_pelatihan` text NOT NULL,
  `nama_pelatih` varchar(255) NOT NULL,
  `kontak_pelatih` varchar(255) NOT NULL,
  `kuota_luar_kota` int(11) NOT NULL,
  `kuota_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelatihan`
--

INSERT INTO `tbl_pelatihan` (`id`, `nama`, `tgl_buka`, `tgl_tutup`, `konfirmasi_pendaftar`, `konfirmasi_pendaftar_cadangan`, `status`, `detail_pelatihan`, `nama_pelatih`, `kontak_pelatih`, `kuota_luar_kota`, `kuota_kota`) VALUES
(56, 'Pelatihan Menjahit', '2020-07-22', '2020-08-05', 'belum', 'belum', 'tersedia', 'Pelatihan atau Magang adalah proses melatih; kegiatan atau pekerjaan Pelatihan mempersiapkan peserta latihan untuk mengambil jalur tindakan tertentu yang dilukiskan oleh teknologi dan organisasi tempat bekerja, dan membantu peserta memperbaiki prestasi dalam kegiatannya terutama mengenai pengertian dan keterampilan.', 'Joko Anwar', '081231231231', 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftar`
--

CREATE TABLE `tbl_pendaftar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Proses Konfirmasi 1=Hadir 2=Tidak Hadir 3=Cadangan 4=Cadangan Proses Konfirmasi 5=Cadangan Hadir 6=Cadangan Tidak Hadir',
  `wilayah` enum('luar kota','kota') NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `alasan_mengikuti` text DEFAULT NULL,
  `foto_ktp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pendaftar`
--

INSERT INTO `tbl_pendaftar` (`id`, `user_id`, `nik`, `email`, `id_pelatihan`, `status`, `wilayah`, `nama`, `alamat`, `jenis_kelamin`, `no_hp`, `pendidikan_terakhir`, `alasan_mengikuti`, `foto_ktp`) VALUES
(233, 28, '3310032808990005', 'asdad@sadad.com4', 56, 3, 'kota', 'rkim@ub.ac.id', '1', 'laki-laki', '1', '1', '1', '3310032808990005.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak akses Administrator'),
(2, 'Member', 'Hak akses Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_role`, `username`, `password`, `password_reset_key`, `first_name`, `last_name`, `email`, `phone`, `photo`, `activated`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$05$OA.OoeNHoEkbGGKazYqPU.UOaI5jmgro8x2pRSV56ClTWlDf0EEn2', '', 'ADMIN', '', 'admin@mail.com', '081906515912', '1526456245974.png', 1, '2020-10-02 09:11:30', '2020-03-14 21:58:17', NULL),
(2, 2, 'member', '$2y$05$C53Jmt2hAeqr0EnQPjsm6.XBlNkDE8l7aFllR72PY9zHSkAMLiixW', '', 'MEMBER', 'asd', 'member@mail.com', '081906515912', '1596468728042.png', 1, '2020-08-07 16:26:23', '2020-03-14 22:00:32', NULL),
(28, 2, 'rkim@ub.ac.id', '$2y$05$Sfi3XaBJ4g3A4BpZdSAU2umv4ZIWP3Z1NL8Bd1HgD0nEEYUzN04SK', NULL, '', '', 'asdad@sadad.com4', '', '1583991814826.png', 1, NULL, '2020-10-06 12:51:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_fk` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=822;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
