-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangpuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `direktori_bantuan`
--

CREATE TABLE `direktori_bantuan` (
  `id_bantuan` bigint(20) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tautan` varchar(100) DEFAULT NULL,
  `status` enum('aktif','non aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dukungan_unggahan`
--

CREATE TABLE `dukungan_unggahan` (
  `id_dukungan` bigint(20) NOT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `unggahan_id_unggahan` bigint(20) NOT NULL,
  `unggahan_pengguna_id_pengguna` bigint(20) NOT NULL,
  `pengguna_id_pengguna` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` bigint(20) NOT NULL,
  `nama_event` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_event` datetime DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `status_event` enum('akan datang','berlangsung','selesai','dibatalkan') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `id_admin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` bigint(20) NOT NULL,
  `isi_komentar` text DEFAULT NULL,
  `status_moderasi` enum('tampil','disembunyikan') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `unggahan_id_unggahan` bigint(20) NOT NULL,
  `unggahan_pengguna_id_pengguna` bigint(20) NOT NULL,
  `pengguna_id_pengguna` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kejadian`
--

CREATE TABLE `laporan_kejadian` (
  `id_laporan_kejadian` bigint(20) NOT NULL,
  `jenis_kegiatan` varchar(100) DEFAULT NULL,
  `kronologi` text DEFAULT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `tingkat_urgensi` enum('rendah','sedang','tinggi') DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  `status_laporan` enum('menunggu','ditinjau','dirujuk','selesai') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `direktori_bantuan_id_bantuan` bigint(20) NOT NULL,
  `pengguna_id_pengguna` bigint(20) NOT NULL,
  `pengguna_id_pengguna1` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_konten`
--

CREATE TABLE `laporan_konten` (
  `id_laporan_konten` bigint(20) NOT NULL,
  `alasan` char(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_laporan` enum('menunggu','ditinjau','selesai') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `ditinjau_pada` datetime DEFAULT NULL,
  `unggahan_id_unggahan` bigint(20) NOT NULL,
  `unggahan_pengguna_id_pengguna` bigint(20) NOT NULL,
  `komentar_id_komentar` bigint(20) NOT NULL,
  `komentar_unggahan_id_unggahan` bigint(20) NOT NULL,
  `komentar_unggahan_pengguna_id_pengguna` bigint(20) NOT NULL,
  `komentar_pengguna_id_pengguna` bigint(20) NOT NULL,
  `pengguna_id_pengguna` bigint(20) NOT NULL,
  `pengguna_id_pengguna1` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `peran` enum('pengguna','admin','pengunjung') DEFAULT NULL,
  `status_akun` enum('aktif','non aktif','menunggu','ditolak') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unggahan`
--

CREATE TABLE `unggahan` (
  `id_unggahan` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text DEFAULT NULL,
  `status_moderasi` enum('tampil','disembunyikan') DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diperbarui_pada` datetime DEFAULT NULL,
  `pengguna_id_pengguna` bigint(20) NOT NULL,
  `kategori_id_kategori1` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `direktori_bantuan`
--
ALTER TABLE `direktori_bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `dukungan_unggahan`
--
ALTER TABLE `dukungan_unggahan`
  ADD PRIMARY KEY (`id_dukungan`,`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`,`pengguna_id_pengguna`),
  ADD KEY `fk_dukungan_unggahan_unggahan1_idx` (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`),
  ADD KEY `fk_dukungan_unggahan_pengguna1_idx` (`pengguna_id_pengguna`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`,`id_admin`),
  ADD KEY `fk_event_pengguna1_idx` (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`,`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`,`pengguna_id_pengguna`),
  ADD KEY `fk_komentar_unggahan1_idx` (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`),
  ADD KEY `fk_komentar_pengguna1_idx` (`pengguna_id_pengguna`);

--
-- Indexes for table `laporan_kejadian`
--
ALTER TABLE `laporan_kejadian`
  ADD PRIMARY KEY (`id_laporan_kejadian`,`direktori_bantuan_id_bantuan`,`pengguna_id_pengguna`,`pengguna_id_pengguna1`),
  ADD KEY `fk_laporan_kejadian_direktori_bantuan1_idx` (`direktori_bantuan_id_bantuan`),
  ADD KEY `fk_laporan_kejadian_pengguna1_idx` (`pengguna_id_pengguna`),
  ADD KEY `fk_laporan_kejadian_pengguna2_idx` (`pengguna_id_pengguna1`);

--
-- Indexes for table `laporan_konten`
--
ALTER TABLE `laporan_konten`
  ADD PRIMARY KEY (`id_laporan_konten`,`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`,`komentar_id_komentar`,`komentar_unggahan_id_unggahan`,`komentar_unggahan_pengguna_id_pengguna`,`komentar_pengguna_id_pengguna`,`pengguna_id_pengguna`,`pengguna_id_pengguna1`),
  ADD KEY `fk_laporan_konten_unggahan1_idx` (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`),
  ADD KEY `fk_laporan_konten_komentar1_idx` (`komentar_id_komentar`,`komentar_unggahan_id_unggahan`,`komentar_unggahan_pengguna_id_pengguna`,`komentar_pengguna_id_pengguna`),
  ADD KEY `fk_laporan_konten_pengguna1_idx` (`pengguna_id_pengguna`),
  ADD KEY `fk_laporan_konten_pengguna2_idx` (`pengguna_id_pengguna1`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `unggahan`
--
ALTER TABLE `unggahan`
  ADD PRIMARY KEY (`id_unggahan`,`pengguna_id_pengguna`,`kategori_id_kategori1`),
  ADD KEY `fk_unggahan_pengguna1_idx` (`pengguna_id_pengguna`),
  ADD KEY `fk_unggahan_kategori1_idx` (`kategori_id_kategori1`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dukungan_unggahan`
--
ALTER TABLE `dukungan_unggahan`
  ADD CONSTRAINT `fk_dukungan_unggahan_pengguna1` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dukungan_unggahan_unggahan1` FOREIGN KEY (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`) REFERENCES `unggahan` (`id_unggahan`, `pengguna_id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_pengguna1` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_pengguna1` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komentar_unggahan1` FOREIGN KEY (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`) REFERENCES `unggahan` (`id_unggahan`, `pengguna_id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `laporan_kejadian`
--
ALTER TABLE `laporan_kejadian`
  ADD CONSTRAINT `fk_laporan_kejadian_direktori_bantuan1` FOREIGN KEY (`direktori_bantuan_id_bantuan`) REFERENCES `direktori_bantuan` (`id_bantuan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laporan_kejadian_pengguna1` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laporan_kejadian_pengguna2` FOREIGN KEY (`pengguna_id_pengguna1`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `laporan_konten`
--
ALTER TABLE `laporan_konten`
  ADD CONSTRAINT `fk_laporan_konten_komentar1` FOREIGN KEY (`komentar_id_komentar`,`komentar_unggahan_id_unggahan`,`komentar_unggahan_pengguna_id_pengguna`,`komentar_pengguna_id_pengguna`) REFERENCES `komentar` (`id_komentar`, `unggahan_id_unggahan`, `unggahan_pengguna_id_pengguna`, `pengguna_id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laporan_konten_pengguna1` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laporan_konten_pengguna2` FOREIGN KEY (`pengguna_id_pengguna1`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laporan_konten_unggahan1` FOREIGN KEY (`unggahan_id_unggahan`,`unggahan_pengguna_id_pengguna`) REFERENCES `unggahan` (`id_unggahan`, `pengguna_id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unggahan`
--
ALTER TABLE `unggahan`
  ADD CONSTRAINT `fk_unggahan_kategori1` FOREIGN KEY (`kategori_id_kategori1`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unggahan_pengguna1` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
