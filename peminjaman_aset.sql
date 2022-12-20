-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 02:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id_aset` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nip_pegawai` int(11) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nilai_aset` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `detail_aset` text NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `kondisi` varchar(100) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aset`
--

INSERT INTO `tbl_aset` (`id_aset`, `kode`, `qr_code`, `id_kategori`, `nip_pegawai`, `nama_aset`, `tanggal_pembelian`, `nilai_aset`, `id_lokasi`, `detail_aset`, `gambar`, `kondisi`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'AS1', 'AS1', 1, 111, 'Monitor', '2022-07-23', 600000, 3, 'Monitor dengan ukuran 32 inc', 'gambar_aset/zcBkNUTlnuTB7GgsTXoid1D4EfoADZBJFzbRZ5ys.jpg', 'Baik', 't', '2022-07-23 00:00:00', '2022-12-14'),
(2, 'AS2', 'AS2', 1, 111, 'Mouse', '2022-07-23', 100000, 3, 'Mouse Bluotuth', 'gambar_aset/gdH1V9XG87wfKCPznS5XUXJezFNFMYN0WNveGwAp.jpg', 'Baik', 't', '2022-07-23 00:00:00', '2022-12-14'),
(16, 'AS3', '', 1, 111, 'Keyboard', '2022-07-29', 1500000, 7, 'Rexus Gamming', 'gambar_aset/W0jNAzFODjFxAVvj7x59iBteetoRpb1JU2CcDJGU.jpg', 'Baik', 't', '2022-07-29 00:00:00', '2022-12-14'),
(17, 'AS4', '', 1, 111, 'Speaker', '2022-09-22', 300000, 3, 'Speaker Bagus', 'gambar_aset/yF9zorAAarPLjxy3arUaMQQYIZ22VHsaj2SIeBCc.jpg', 'Baik', 't', '2022-09-22 00:00:00', '2022-12-14'),
(18, 'AS5', '', 1, 111, 'csdc', '2022-09-28', 200000, 7, 'sdsad', 'gambar_aset/ARS0WW444a2PcQG75CDe8nttvCveOpW8IEJRS6qu.png', 'Baik', 't', '2022-09-28 00:00:00', '2022-09-30'),
(19, 'AS6', '', 1, 111, 'aaa', '2022-09-28', 32432432, 3, 'csacas', 'gambar_aset/4bpTFb2gP3j0Lg8uoYutOXv8A0amn4rKA2CWtyeg.jpg', 'Baik', 't', '2022-09-28 00:00:00', '2022-09-30'),
(20, 'ef324', '', 1, 111, 'wfef', '2022-09-29', 343543, 3, 'tregre', 'gambar_aset/KJEUO2hDfeBvzVZ7MvpwF69k5DJiwVY7eF8q9izG.jpg', 'Baik', 't', '2022-09-28 00:00:00', '2022-09-30'),
(21, 'AS5', 'AS5', 1, 111, 'Laptop', '2022-11-08', 4000000, 1, 'baik', 'gambar_aset/J2nNlqwCZlCTqS6JSJZ5n1puygyhcUThtqO6WpCl.jpg', 'Baik', 't', '2022-11-08 00:00:00', '2022-12-14'),
(22, 'AS7', 'AS7', 1, 111, 'Keyboard', '2022-11-08', 120000, 1, 'baik', 'gambar_aset/FUT1TdkmwZfCxk03Cdw8kgvIwmdwywaD9IN03rZA.jpg', 'Baik', 't', '2022-11-08 00:00:00', '2022-11-08'),
(23, 'AS7', '$2y$10$EY/cvtoDCbqrP', 1, 111, 'Keyboard', '2022-11-08', 1220000, 1, 'baik', 'gambar_aset/rTvw5P6Fh9UfsF0XBTEcFG4FoHfWv8Sp9fgEowzn.jpg', 'Baik', 't', '2022-11-08 00:00:00', '2022-11-08'),
(24, 'AS7', '$2y$10$nSwivr5TEj568fU9UFWZCebB9SMYaDsK43IKjvUWU/3WLB/oDd12W', 1, 111, 'Keyboard', '2022-11-09', 21230000, 1, 'baik', 'gambar_aset/SX9th0Wy8QcznYigyAYxuAFOpCMYJiskHID99VAc.jpg', 'Baik', 't', '2022-11-08 00:00:00', '2022-11-08'),
(25, 'AS7', 'Keyboard', 1, 111, 'Keyboard', '2022-11-08', 1200000, 1, 'baik', 'gambar_aset/Jxqu0pDBCR1zkd0w8NjuM8pJtDLfhXvh5p3n0ret.jpg', 'Baik', 't', '2022-11-08 00:00:00', '2022-12-14'),
(27, 'AS8', 'HP', 1, 111, 'HP', '2022-11-17', 2000000, 1, 'baik', 'gambar_aset/pxHlABc7E19GgwnBfSxsyo1GcSmdT0zDTpTK5vaY.jpg', 'Baik', 't', '2022-11-17 00:00:00', '2022-12-14'),
(28, 'AS9', 'AS9', 1, 111, 'Laptop', '2022-11-18', 100000, 7, 'sehat', 'gambar_aset/NrJQIIQH0xGKGS7i9DRMqGswUittmg2MBpgbv6Dq.jpg', 'Baik', 't', '2022-11-18 00:00:00', '2022-12-14'),
(29, 'AS10', 'AS10', 1, 111, 'Mouse', '2022-11-19', 200000, 1, 'good', 'gambar_aset/t9eF3lIthil45Tupva1inlZmx352miFoLGWIgBBz.jpg', 'Baik', 't', '2022-11-19 00:00:00', '2022-12-14'),
(30, 'AS11', 'AS11', 1, 111, 'Laptop', '2022-11-20', 200000, 7, 'dijedw', 'gambar_aset/I3STePDdKQhOSLUVEtcYJsPXpbW8bN2QtOTZtiqn.jpg', 'Baik', 't', '2022-11-20 00:00:00', '2022-12-14'),
(31, 'AS12', 'AS12', 1, 111, 'Laptop', '2022-12-14', 21000000, 7, 'bagus', 'gambar_aset/greqFZ3WaaF3orXQZy9jCVd7brY3yXyJaQxfT9Vy.jpg', 'Baik', 't', '2022-12-14 00:00:00', '2022-12-14'),
(32, 'AS1', 'AS1', 1, 111, 'Monitor', '2022-06-15', 20000000, 1, 'Baik', 'gambar_aset/xCDZXBakARprfpiniRMXadFPct4OVWeSuvwxKXjW.png', 'Baik', 'y', '2022-12-14 07:30:34', '2022-12-14'),
(33, 'AS2', 'AS2', 1, 111, 'Laptop', '2022-09-02', 50000000, 7, 'baik', 'gambar_aset/BQL4QbSWygGJgkMH53dOfuybZVIIsikY8vqhTsu4.png', 'Baik', 'y', '2022-12-14 07:32:40', '2022-12-14'),
(34, 'AS3', 'AS3', 1, 111, 'speaker', '2022-10-18', 1200000, 3, 'baik', 'gambar_aset/tkU42GhPtfPdSmKtmNqxzVBgq7s7YF9d8zUZAZco.png', 'Baik', 'y', '2022-12-14 07:45:07', '2022-12-14'),
(35, 'AS4', 'AS4', 1, 111, 'Mouse', '2022-12-02', 210000, 8, '-', 'gambar_aset/V8wT750CMQgj0odRZlLCLSOLivHEt69OcxBM2YBq.png', 'Baik', 'y', '2022-12-15 02:12:15', '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` enum('y','t') NOT NULL DEFAULT 'y',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `kode`, `nama`, `aktif`, `created_at`, `updated_at`) VALUES
(0, 'A10', 'Non Pegawai', 't', '2022-07-20 00:00:00', '2022-12-15 03:00:01'),
(1, 'A11', 'Departemen Pengembangan & Organisasi', 't', '2022-07-18 00:00:00', '2022-12-15 03:00:04'),
(2, 'A12', 'Departemen Produksi', 't', '2022-07-18 00:00:00', '2022-12-15 03:00:07'),
(3, 'A13', 'Departemen Pemeliharaan', 't', '2022-07-19 00:00:00', '2022-12-15 03:00:10'),
(6, 'A14', 'Departemen Riset', 't', '2022-09-28 00:00:00', '2022-09-30 00:00:00'),
(7, 'A10', 'Non Pegawai', 'y', '2022-12-15 03:00:34', '2022-12-15 03:00:34'),
(8, 'A11', 'Departemen Pegawai & Organisasi', 'y', '2022-12-15 03:01:02', '2022-12-15 03:01:02'),
(9, 'A12', 'Departemen Produksi', 'y', '2022-12-15 03:01:18', '2022-12-15 03:01:18'),
(10, 'A13', 'Departemen Pemeliharaan', 'y', '2022-12-15 03:01:57', '2022-12-15 03:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_aset`
--

CREATE TABLE `tbl_kategori_aset` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` enum('y','t') NOT NULL DEFAULT 'y',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori_aset`
--

INSERT INTO `tbl_kategori_aset` (`id_kategori`, `nama`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 't', '2022-07-18 00:00:00', '2022-12-15 03:02:08'),
(2, 'Non Elektronik', 't', '2022-07-27 00:00:00', '2022-12-15 03:02:11'),
(9, 'cascas', 't', '2022-09-30 00:00:00', '2022-09-30 00:00:00'),
(10, 'Elektronik', 'y', '2022-12-15 03:02:18', '2022-12-15 03:02:18'),
(11, 'Non Elektronik', 'y', '2022-12-15 03:02:28', '2022-12-15 03:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi_aset`
--

CREATE TABLE `tbl_lokasi_aset` (
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi_aset`
--

INSERT INTO `tbl_lokasi_aset` (`id_lokasi`, `nama`, `alamat`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Gedung Teknologi Informatika', 'Jalan Tarumanegara No.12 Jawa Barat', 't', '2022-09-30 00:00:00', '2022-12-15 03:02:49'),
(2, 'gedung it', 'it', 't', '2022-09-30 00:00:00', '2022-09-30 00:00:00'),
(3, 'Departemen Pengembangan & Organisasi', 'Lantai 2 Ruang 1 Departemen', 't', '2022-09-30 00:00:00', '2022-12-15 03:02:52'),
(4, 'Departemen', 'Lantai 2 Ruang AB', 't', '2022-09-30 00:00:00', '2022-09-30 00:00:00'),
(5, 'Departemen Produksi 1', 'Lantai 3 No 5', 't', '2022-09-30 00:00:00', '2022-09-30 00:00:00'),
(6, 'Departemen Pemeliharaan 1', 'Kantor lantai 1', 't', '2022-09-30 00:00:00', '2022-09-30 00:00:00'),
(7, 'Departemen Pemeliharaan', 'Kantor lantai 2', 't', '2022-09-30 00:00:00', '2022-12-15 03:02:55'),
(8, 'Departemen Produksi', 'Ruang A Lantai 5', 't', '2022-09-30 00:00:00', '2022-12-15 03:02:57'),
(9, 'Departemen Riset', 'Jl.riset block A56', 't', '2022-09-30 00:00:00', '2022-12-15 03:03:00'),
(10, 'Gedung Teknologi Informatika', 'Jl. Jenderal Ahmad Yani - Gresik 61119', 'y', '2022-12-15 03:03:54', '2022-12-15 03:03:54'),
(11, 'Departemen Pengembangan & Organisasi', 'Jl. Jenderal Ahmad Yani - Gresik 61119', 'y', '2022-12-15 03:04:16', '2022-12-15 03:04:16'),
(12, 'Departemen Pemeliharaan', 'Jl. Jenderal Ahmad Yani - Gresik 61119', 'y', '2022-12-15 03:04:36', '2022-12-15 03:04:36'),
(13, 'Departemen Produksi', 'Jl. Jenderal Ahmad Yani - Gresik 61119', 'y', '2022-12-15 03:04:53', '2022-12-15 03:04:53'),
(14, 'Departemen Riset', 'Jl. Jenderal Ahmad Yani - Gresik 61119', 'y', '2022-12-15 03:05:09', '2022-12-15 03:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` bigint(13) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'ADMIN;USER;',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` enum('y','t') NOT NULL DEFAULT 'y',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip_pegawai`, `nama_pegawai`, `jenis_kelamin`, `no_telepon`, `id_departemen`, `status`, `username`, `password`, `aktif`, `created_at`, `updated_at`) VALUES
(111, 'Admin', 'Laki-laki', 8511111111, 1, 'ADMIN', 'admin', '$2y$10$bM8b27G.Kmn1ixzkz4r4feyESj30FhxCKz19j/lDE0nw2GdD0ah96', 'y', '2022-07-21 00:00:00', '2022-07-21 00:00:00'),
(121, 'Ali Suma', 'Laki-laki', 8326328317, 2, 'USER', 'ali', '$2y$10$pnoPwSZR545U2Xo0Hlvypu6nz4FBUq6mW43gsKBffiKxS/XHQ0KvW', 'y', '2022-12-15 02:12:48', '2022-12-15 02:54:48'),
(122, 'Sofiah', 'Perempuan', 82721282721, 3, 'USER', 'sofiah', '$2y$10$fJxYq/wvYFGdVIGyGUTPzuPSOl1lh8eNbY7YTlaPTcbRA9AdXp0uy', 'y', '2022-12-15 02:12:19', '2022-12-15 02:55:19'),
(123, 'Savina', 'Perempuan', 89696668828, 2, 'USER', 'savina', '$2y$10$eaalc5mAzP4w7wOa1.aWBuedpe8VRc61z0CHzRSoNV3TUI6mVVC7.', 'y', '2022-12-15 02:12:43', '2022-12-15 02:55:43'),
(124, 'Admin 2', 'Laki-laki', 8732637238, 6, 'ADMIN', 'admin 2', '$2y$10$y7ifvD5OukaVtaMtzfgnC.5blQ0BzI0ViCLV/6wDaVUhT7PKU5sYi', 'y', '2022-12-15 02:12:26', '2022-12-15 02:56:26'),
(222, 'User', 'Perempuan', 8587654321, 1, 'USER', 'user', '$2y$10$AGVTQI/jVqx43.Qm2XRrTu.Si..z9F82xbdObLE/mISipDhIfh2..', 't', '2022-07-25 00:00:00', '2022-12-15 02:45:31'),
(1111, 'Ali Suma', 'Laki-laki', 85945960519, 0, 'USER', 'ali', '$2y$10$K5Ts51.fBZSsurUhL3QKGONrddYJbdAVGqxQEaNWj/cHTvEayDvLW', 't', '2022-07-21 00:00:00', '2022-12-15 02:45:34'),
(1112, 'Savina Nur Inayah', 'Perempuan', 85643637477, 0, 'USER', 'savina', '$2y$10$/B.gKpC4xmg8bkzS3wsc0.1RD25UYhrESuec4BjHb9UjnXV1wUXWa', 't', '2022-07-30 00:00:00', '2022-12-02 00:00:00'),
(1113, 'Sofiah Dwi', 'Perempuan', 85765765675, 0, 'USER', 'sofiah', '$2y$10$RO7LQVUw5lC7K0BszffuyuByLXO8jZXQTTGXeM7SUqtU/j1wY.sRm', 't', '2022-08-01 00:00:00', '2022-12-15 02:45:37'),
(1232, 'coba', 'Perempuan', 94332432423, 1, 'ADMIN', 'coba', '$2y$10$KNTHDhIWvAL1AjHRYJAZQegBUy9W5YCZSYFKc4sX60AX7I23OaB3O', 't', '2022-09-28 00:00:00', '2022-09-30 00:00:00'),
(9991, 'cobak', 'Perempuan', 8699999991, 0, 'USER', 'cobak', '$2y$10$LNVBbhG.b/Rmrpi.6wpEtOvOh.2yPHgmvuOWqXlo.glaXN5iN3MYa', 't', '2022-09-02 00:00:00', '2022-09-30 00:00:00'),
(42324, 'vxcvcxv', 'Perempuan', 54646456456, 6, 'USER', 'cxcxbx', '$2y$10$.5MgOV5EwYAWZqACvSg.SeA.lkQUJK3y67Hju3XeZiTxocVWJPK8u', 't', '2022-12-14 00:00:00', '2022-12-15 02:45:39'),
(324324, 'cdsvdsv', 'Laki-laki', 84347372432, 0, 'ADMIN', 'sofiahvcsvs', '$2y$10$438sAOj3dxCnvp1gEcZTgesUF.IbZT7trDqtiqXHQD5VK/WhvtnN2', 't', '2022-09-02 00:00:00', '2022-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `deadline_pengembalian` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `keperluan` text NOT NULL,
  `status` enum('PROSES','DITERIMA','DITOLAK','SELESAI') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `id_pegawai`, `id_aset`, `qr_code`, `tanggal_peminjaman`, `deadline_pengembalian`, `tanggal_pengembalian`, `keperluan`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(20, 222, 17, NULL, '2022-10-02', '2022-10-04', '2022-10-03', 'Percobaan', 'SELESAI', 'on time', '2022-10-02 00:00:00', '2022-10-02 00:00:00'),
(21, 222, 1, NULL, '2022-10-03', '2022-10-03', '2022-10-04', 'vgefdrgvfd', 'DITOLAK', 'telat', '2022-10-02 00:00:00', '2022-10-02 00:00:00'),
(22, 222, 2, NULL, '2022-10-03', '2022-10-03', '2022-10-03', 'dcasdc', 'SELESAI', NULL, '2022-10-02 00:00:00', '2022-11-01 00:00:00'),
(23, 222, 1, 'lnzswMHXLqqzkzSfydXC', '2022-11-02', '2022-11-03', '2022-11-03', 'adsdw', 'SELESAI', NULL, '2022-11-02 00:00:00', '2022-11-08 00:00:00'),
(24, 222, 29, '2YkE9DEA7ktOaRiaf1ri', '2022-11-19', '2022-11-19', '2022-11-19', 'weew', 'SELESAI', NULL, '2022-11-19 00:00:00', '2022-11-19 00:00:00'),
(25, 222, 29, '5EVkcFJLmtfbHHAfMbuk', '2022-11-20', '2022-11-20', '2022-11-20', 'xsssa', 'SELESAI', NULL, '2022-11-20 00:00:00', '2022-12-02 00:00:00'),
(26, 222, 30, 'xfnbDWBGjWCxroZGJfzh', '2022-12-02', '2022-12-03', '2022-12-03', 'meminjam', 'DITOLAK', NULL, '2022-12-02 00:00:00', '2022-12-02 00:00:00'),
(27, 111, 33, 'WwNxmnPoOtjFbMOYuk5X', '2022-11-29', '2022-11-30', '2022-11-30', '-', 'SELESAI', NULL, '2022-12-14 00:00:00', '2022-12-14 00:00:00'),
(28, 222, 32, 'vI5fVh3fUwzOVob7tI6Y', '2022-12-01', '2022-12-02', '2022-12-02', '-', 'SELESAI', NULL, '2022-12-14 00:00:00', '2022-12-14 00:00:00'),
(29, 121, 33, 'ordEVgxjiVrC0wpSBE22', '2022-12-06', '2022-12-07', '2022-12-07', '-', 'SELESAI', NULL, '2022-12-15 03:12:28', '2022-12-15 03:08:56'),
(30, 122, 32, 'bKa3fTKvVvt6LLDzGjLE', '2022-11-30', '2022-12-01', '2022-12-01', '-', 'SELESAI', NULL, '2022-12-15 13:12:56', '2022-12-15 13:53:50'),
(31, 123, 32, 'nG7HoVFf3IZAq4f5bzTJ', '2022-12-08', '2022-12-09', '2022-12-09', '-', 'DITOLAK', NULL, '2022-12-15 13:12:25', '2022-12-15 13:54:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tbl_kategori_aset`
--
ALTER TABLE `tbl_kategori_aset`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_lokasi_aset`
--
ALTER TABLE `tbl_lokasi_aset`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip_pegawai`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kategori_aset`
--
ALTER TABLE `tbl_kategori_aset`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_lokasi_aset`
--
ALTER TABLE `tbl_lokasi_aset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
