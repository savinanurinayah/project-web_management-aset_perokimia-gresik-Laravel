-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 10:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id_aset` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aset`
--

INSERT INTO `tbl_aset` (`id_aset`, `kode`, `id_kategori`, `nip_pegawai`, `nama_aset`, `tanggal_pembelian`, `nilai_aset`, `id_lokasi`, `detail_aset`, `gambar`, `kondisi`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'AS1', 1, 111, 'Monitor', '2022-07-23', 600000, 3, 'Monitor dengan ukuran 32 inc', 'gambar_aset/a5BiI5zVyijFiEgptO8y82Fnpbwzcg9Nv9N83nH9.jpg', 'Baik', 'y', '2022-07-23 16:01:05', '2022-08-24 14:08:06'),
(2, 'AS2', 1, 111, 'Mouse', '2022-07-23', 100000, 3, 'Mouse Bluotuth', 'gambar_aset/i3ymsDDTu1QcPRxJCJJJZrx7x5i9ldcYL5pMnurO.jpg', 'Baik', 'y', '2022-07-23 16:01:01', '2022-09-22 02:09:46'),
(16, 'AS3', 1, 111, 'Keyboard', '2022-07-29', 1500000, 7, 'Rexus Gamming', 'gambar_aset/W0jNAzFODjFxAVvj7x59iBteetoRpb1JU2CcDJGU.jpg', 'Baik', 'y', '2022-07-29 15:07:05', '2022-08-08 13:08:06'),
(17, 'AS4', 1, 111, 'Speaker', '2022-09-22', 300000, 3, 'Speaker Bagus', 'gambar_aset/yF9zorAAarPLjxy3arUaMQQYIZ22VHsaj2SIeBCc.jpg', 'Baik', 'y', '2022-09-22 02:09:03', '2022-09-22 02:09:44'),
(18, 'AS5', 1, 111, 'csdc', '2022-09-28', 200000, 7, 'sdsad', 'gambar_aset/ARS0WW444a2PcQG75CDe8nttvCveOpW8IEJRS6qu.png', 'Baik', 't', '2022-09-28 03:09:46', '2022-09-30 01:19:26'),
(19, 'AS6', 1, 111, 'aaa', '2022-09-28', 32432432, 3, 'csacas', 'gambar_aset/4bpTFb2gP3j0Lg8uoYutOXv8A0amn4rKA2CWtyeg.jpg', 'Baik', 't', '2022-09-28 12:09:44', '2022-09-30 01:19:22'),
(20, 'ef324', 1, 111, 'wfef', '2022-09-29', 343543, 3, 'tregre', 'gambar_aset/KJEUO2hDfeBvzVZ7MvpwF69k5DJiwVY7eF8q9izG.jpg', 'Baik', 't', '2022-09-28 13:09:20', '2022-09-30 01:19:14');

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
(0, 'A10', 'Non Pegawai', 'y', '2022-07-20 02:45:30', '2022-09-02 08:09:18'),
(1, 'A11', 'Departemen Pengembangan & Organisasi', 'y', '2022-07-18 14:52:51', '2022-07-18 07:07:48'),
(2, 'A12', 'Departemen Produksi', 'y', '2022-07-18 10:02:18', '2022-07-19 13:07:19'),
(3, 'A13', 'Departemen Pemeliharaan', 'y', '2022-07-19 13:45:16', '2022-07-19 13:07:02'),
(6, 'A14', 'Departemen Riset', 't', '2022-09-28 12:37:54', '2022-09-30 01:16:03');

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
(1, 'Elektronik', 'y', '2022-07-18 18:00:19', '2022-07-18 18:00:19'),
(2, 'Non Elektronik', 'y', '2022-07-27 03:47:19', '2022-07-27 03:47:19'),
(9, 'cascas', 't', '2022-09-30 01:17:16', '2022-09-30 01:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi_aset`
--

CREATE TABLE `tbl_lokasi_aset` (
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi_aset`
--

INSERT INTO `tbl_lokasi_aset` (`id_lokasi`, `nama`, `alamat`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Gedung Teknologi Informatika', 'Jalan Tarumanegara No.12 Jawa Barat', 'y', '2022-09-30 00:10:29', '2022-09-29 17:01:17'),
(2, 'gedung it', 'it', 't', '2022-09-30 01:09:10', '2022-09-29 18:09:10'),
(3, 'Departemen Pengembangan & Organisasi', 'Lantai 2 Ruang 1 Departemen', 'y', '2022-09-29 22:10:45', '2022-09-29 15:09:32'),
(4, 'Departemen', 'Lantai 2 Ruang AB', 't', '2022-09-30 01:09:54', '2022-09-29 18:09:54'),
(5, 'Departemen Produksi 1', 'Lantai 3 No 5', 't', '2022-09-30 01:10:02', '2022-09-29 18:10:02'),
(6, 'Departemen Pemeliharaan 1', 'Kantor lantai 1', 't', '2022-09-30 01:10:07', '2022-09-29 18:10:07'),
(7, 'Departemen Pemeliharaan', 'Kantor lantai 2', 'y', '2022-09-30 00:47:28', '2022-09-29 17:16:44'),
(8, 'Departemen Produksi', 'Ruang A Lantai 5', 'y', '2022-09-30 00:47:31', '2022-09-29 17:16:32'),
(9, 'Departemen Riset', 'Jl.riset block A56', 'y', '2022-09-30 00:47:35', '2022-09-29 17:16:15');

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
(111, 'Admin', 'Laki-laki', 8511111111, 1, 'ADMIN', 'admin', '$2y$10$bM8b27G.Kmn1ixzkz4r4feyESj30FhxCKz19j/lDE0nw2GdD0ah96', 'y', '2022-07-21 12:07:21', '2022-07-21 12:22:21'),
(222, 'User', 'Perempuan', 8587654321, 1, 'USER', 'user', '$2y$10$AGVTQI/jVqx43.Qm2XRrTu.Si..z9F82xbdObLE/mISipDhIfh2..', 'y', '2022-07-25 07:07:29', '2022-07-25 07:07:29'),
(1111, 'Ali Suma', 'Laki-laki', 85945960519, 0, 'USER', 'ali', '$2y$10$K5Ts51.fBZSsurUhL3QKGONrddYJbdAVGqxQEaNWj/cHTvEayDvLW', 'y', '2022-07-21 12:07:38', '2022-09-02 08:09:56'),
(1112, 'Savina Nur Inayah', 'Perempuan', 85643637477, 0, 'USER', 'savina', '$2y$10$/B.gKpC4xmg8bkzS3wsc0.1RD25UYhrESuec4BjHb9UjnXV1wUXWa', 'y', '2022-07-30 15:07:05', '2022-07-30 15:34:05'),
(1113, 'Sofiah Dwi', 'Perempuan', 85765765675, 0, 'USER', 'sofiah', '$2y$10$RO7LQVUw5lC7K0BszffuyuByLXO8jZXQTTGXeM7SUqtU/j1wY.sRm', 'y', '2022-08-01 06:08:22', '2022-09-02 08:09:21'),
(1232, 'coba', 'Perempuan', 94332432423, 1, 'ADMIN', 'coba', '$2y$10$KNTHDhIWvAL1AjHRYJAZQegBUy9W5YCZSYFKc4sX60AX7I23OaB3O', 't', '2022-09-28 03:09:52', '2022-09-30 01:14:55'),
(9991, 'cobak', 'Perempuan', 8699999991, 0, 'USER', 'cobak', '$2y$10$LNVBbhG.b/Rmrpi.6wpEtOvOh.2yPHgmvuOWqXlo.glaXN5iN3MYa', 't', '2022-09-02 06:09:58', '2022-09-30 01:14:44'),
(324324, 'cdsvdsv', 'Laki-laki', 84347372432, 0, 'ADMIN', 'sofiahvcsvs', '$2y$10$438sAOj3dxCnvp1gEcZTgesUF.IbZT7trDqtiqXHQD5VK/WhvtnN2', 't', '2022-09-02 08:09:18', '2022-09-30 01:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL,
  `deadline_pengembalian` datetime NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `keperluan` text NOT NULL,
  `status` enum('PROSES','DITERIMA','DITOLAK','SELESAI') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `id_pegawai`, `id_aset`, `tanggal_peminjaman`, `deadline_pengembalian`, `tanggal_pengembalian`, `keperluan`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(20, 222, 17, '2022-10-02 00:00:00', '2022-10-04 00:00:00', '2022-10-03 00:00:00', 'Percobaan', 'SELESAI', 'on time', '2022-10-02 00:10:40', '2022-10-02 03:21:30'),
(21, 222, 1, '2022-10-03 00:00:00', '2022-10-03 00:00:00', '2022-10-04 00:00:00', 'vgefdrgvfd', 'DITOLAK', 'telat', '2022-10-02 03:10:01', '2022-10-02 03:18:38'),
(22, 222, 2, '2022-10-03 00:00:00', '2022-10-03 00:00:00', '2022-10-03 00:00:00', 'dcasdc', 'PROSES', NULL, '2022-10-02 03:10:33', '2022-10-02 03:20:33');

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
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori_aset`
--
ALTER TABLE `tbl_kategori_aset`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_lokasi_aset`
--
ALTER TABLE `tbl_lokasi_aset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
