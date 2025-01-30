-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 01:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `content`, `created_at`) VALUES
(12, 'pengenalan lingkungan kerja ', 'pengenalan lingkungan kerja menjadi wacana yang diprogramkan oleh PT. Witel Telkom Papua Barat. program ini bertujuan untuk menciptakan karyawan-karyawan yang paham akan lingkungan kerja serta menambah erat kekeluargaan pada sesama', '2025-01-16 05:34:09'),
(13, 'Antares Eazy Jadikan CCTV Analog Semakin Andal dan Berdaya Guna', 'Jakarta, 15 Januari 2025 - Teknologi kian berkembang pesat, sejalan dengan bertambahnya kebutuhan masyarakat, seperti solusi keamanan yang praktis dan efisien bagi masyarakat modern. Menjawab kebutuhan ini, PT Telkom Indonesia Tbk (Telkom) melalui inovasi produk andalannya, Antares Eazy, menghadirkan cara baru untuk meningkatkan keamanan dengan lebih fleksibel. Memanfaatkan teknologi Antares Eazy, CCTV analog yang umumnya hanya terhubung melalui jaringan khusus, kini dapat terintegrasi langsung ke format digital dan diakses dari satu aplikasi.\r\n\r\nSecara konvensional, CCTV analog hanya dapat terhubung ke monitor tertentu melalui jaringan analog yang terbatas. Kendala muncul lantaran pengguna tidak bisa memantau CCTV mereka dari jarak jauh dan harus selalu berada di depan layar monitor. Hal ini tidak hanya membatasi pengawasan, tetapi juga meningkatkan risiko keamanan, terutama jika terjadi insiden yang memerlukan respons cepat.\r\n\r\nDengan mengintegrasikan teknologi CCTV konvensional ke dalam aplikasi digital Antares Eazy, kebutuhan keamanan andal dan praktis di rumah maupun tempat bisnis bisa tersolusikan tanpa perlu membeli perangkat baru. Sistem keamanan kini semakin fleksibel dengan hadirnya fitur integrasi CCTV analog dari Antares Eazy yang dapat mengubah jaringan analog menjadi digital. Dengan kemudahan pengintegrasian ini pengguna dapat menurunkan risiko pencurian atau kerusakan yang sering kali terjadi tanpa pengawasan ketat.', '2025-01-16 05:59:02'),
(14, 'sanka', 'jsla', '2025-01-16 13:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `file_path`, `description`, `created_at`) VALUES
(12, 'Oyen Mambu', 'uploads/4.+Jurnal_Suzuki_finance_Mobile+32-42.pdf', 'dokumen berisi rahasia oyen mambu ok', '2025-01-12 07:16:49'),
(13, 'tes', 'uploads/48-100-1-SM.pdf', 'Tagline (khusus Logo Utama Skunder, tagline tidak wajib. BOLEH pakai, BOLEH TIDAK)', '2025-01-16 06:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `ponsel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `alamat`, `email`, `telepon`, `ponsel`) VALUES
(20, 'raisa', 'Jl. rambutan', 'idk@gmail.com', '0909090', '09090');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_name`, `file_type`, `uploaded_at`) VALUES
(1, 'IMG_4-15.png', 'image/png', '2025-01-10 01:58:12'),
(2, 'TGS BAHASA INGGRIS_GILBERT ZEFANYA OMBUH_202155202015.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2025-01-10 02:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `video_url`, `description`, `created_at`) VALUES
(14, 'telkom new year 2025 1', 'videos/videotelkom.mp4', 'pencapaian telkom selama 2024 sampai awal tahun 2025', '2025-01-16 05:23:23'),
(17, 'kurang tau', 'videos/6 intro.mp4', 'sasa', '2025-01-16 13:14:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
