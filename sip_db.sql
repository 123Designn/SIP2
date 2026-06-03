-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 07:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajuan`
--

CREATE TABLE `detail_pengajuan` (
  `id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `field_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pengajuan`
--

INSERT INTO `detail_pengajuan` (`id`, `pengajuan_id`, `field_name`, `field_value`) VALUES
(1, 1, 'judul', 'Analisis data Keuangan '),
(2, 1, 'tanggal_ujian', '2026-05-12'),
(3, 1, 'ruangan', 'DIM 01'),
(4, 2, 'judul', 'Analisis data'),
(5, 2, 'tanggal_ujian', '2026-06-05'),
(6, 2, 'hari_ujian', 'Jumat'),
(7, 2, 'promotor', 'Dr. khalid'),
(8, 2, 'co_promotor_1', 'das'),
(9, 2, 'co_promotor_2', 'dar'),
(10, 2, 'penguji_1', 'das'),
(11, 2, 'penguji_2', 'dar'),
(12, 2, 'penguji_3', 'das'),
(13, 3, 'judul', 'Keuangan Negara'),
(14, 3, 'tanggal_ujian', '2026-05-29'),
(15, 3, 'hari_ujian', 'Jumat'),
(16, 3, 'promotor', 'Dr. Edy Jumady, S.E.,M.Si.'),
(17, 3, 'co_promotor_1', 'Dr.Ir. Ansir Launtu, S.T.,S.E.,M.M.'),
(18, 3, 'co_promotor_2', 'Prof. Dr. Jannati Tangngisalu, SE, M.Si.'),
(19, 3, 'penguji_1', 'Dr. Hj. Marwah Yusuf, S.E.,M.Si.'),
(20, 3, 'penguji_2', 'Prof.Dr.H. Muh. Akob, M.Si.'),
(21, 3, 'penguji_3', 'Prof. Dr. H. Syamsul Ridjal, M.Si');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `created_at`) VALUES
(2, 'dasril utama', '2026-05-28 13:24:45'),
(3, 'Dr.H. Ampauleng, S.E.,M.Si.', '2026-05-28 13:28:28'),
(4, 'Dr. Ir. Syamsul Alam, ST, MM', '2026-05-28 13:28:28'),
(5, 'Prof.Dr.H. Muh. Akob, M.Si.', '2026-05-28 13:28:28'),
(6, 'Prof. Dr. H. Syamsul Ridjal, M.Si', '2026-05-28 13:28:28'),
(7, 'Dr. Hasbiyadi, S.E., M.M.', '2026-05-28 13:28:28'),
(8, 'Dr.Ir. Ansir Launtu, S.T.,S.E.,M.M.', '2026-05-28 13:28:28'),
(9, 'Dr. Edy Jumady, S.E.,M.Si.', '2026-05-28 13:28:28'),
(10, 'Prof. Dr. Jannati Tangngisalu, SE, M.Si.', '2026-05-28 13:28:28'),
(11, 'Dr. Hj. Marwah Yusuf, S.E.,M.Si.', '2026-05-28 13:28:28'),
(12, 'Dr. Herman Sjahruddin, SE, M.Si', '2026-05-28 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `tipe_nomor` enum('auto','manual') DEFAULT 'auto',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `nama_surat`, `kode_surat`, `tipe_nomor`, `created_at`) VALUES
(2, 'Seminar Proposal', 'SP', 'manual', '2026-05-27 16:41:15'),
(3, 'Seminar Hasil', 'SH', 'auto', '2026-05-27 17:22:43'),
(4, 'Promosi Doktor', 'PD', 'manual', '2026-05-27 17:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `angkatan` varchar(10) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `nama`, `angkatan`, `no_hp`, `email`, `created_at`, `password`) VALUES
(3, 2, '202502', 'Ahmad', '2026', '81234', 'ahmad@gmail.com', '2026-05-27 17:49:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `jenis_surat_id` int(11) NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status` enum('pending','diproses','selesai','ditolak') DEFAULT 'pending',
  `file_surat` varchar(255) DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ruangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id`, `mahasiswa_id`, `jenis_surat_id`, `nomor_surat`, `tanggal_pengajuan`, `status`, `file_surat`, `catatan_admin`, `created_at`, `ruangan`) VALUES
(1, 3, 2, NULL, '2026-05-28', 'pending', NULL, NULL, '2026-05-28 04:42:06', NULL),
(2, 3, 2, NULL, '2026-05-28', 'pending', NULL, NULL, '2026-05-28 11:43:45', NULL),
(3, 3, 2, '081/DIM-STIEM/IV/2026', '2026-05-28', 'diproses', NULL, 'Proses Lagi', '2026-05-28 13:36:33', 'Ruangan Pascasarjana');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$IMPRMk6A4lZJ5tEHHueH9.3D1LL70sbQAbmy/jRyAQlNJ7VLmCdBK', 'admin', '2026-05-26 16:59:24'),
(2, '202502', '$2y$10$5bV7ZTmZVXXAt43c0MQqg.XhC10TYwBYQ5W.qw9n.bBjzuBR4JCg.', 'mahasiswa', '2026-05-27 17:49:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
