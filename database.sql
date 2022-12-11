-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2022 at 08:11 PM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1659238_spkpekanpendit`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_alternatif` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `nama_alternatif`, `created_at`, `updated_at`) VALUES
(1, 'R1', 'Wayan Yuliani', '2019-12-04 17:36:24', '2022-12-06 15:54:50'),
(2, 'R2', 'Siti Harmati', '2019-12-04 23:19:47', '2022-12-06 15:54:57'),
(3, 'R3', 'Mustika Ayuni', '2019-12-04 23:19:57', '2022-12-06 15:55:14'),
(4, 'R4', 'Putu Yenyen Mahadewi', '2019-12-04 23:20:06', '2022-12-06 15:55:18'),
(6, 'R5', 'Luh Ari Susanti', '2022-11-08 15:04:07', '2022-12-06 15:55:24'),
(7, 'R6', 'Nyoman Ari Padmini', '2022-11-29 17:51:29', '2022-12-06 15:55:29'),
(9, 'R7', 'Wayan Ernawati', '2022-12-02 20:20:59', '2022-12-06 15:55:35'),
(10, 'R8', 'Noviktiani', '2022-12-02 20:29:20', '2022-12-06 15:55:41'),
(11, 'R9', 'Wayan Gede Sutama', '2022-12-02 20:29:31', '2022-12-06 15:55:45'),
(12, 'R10', 'I Nyoman Budiarta', '2022-12-02 20:29:42', '2022-12-06 15:55:54'),
(14, 'R11', 'Gede Juli Darma Harta', '2022-12-02 20:35:11', '2022-12-02 20:35:11'),
(15, 'R12', 'Luh Putu Purnamasari', '2022-12-02 20:36:18', '2022-12-02 20:36:18'),
(16, 'R13', 'Yunita Wiryanti', '2022-12-02 20:36:35', '2022-12-02 20:36:35'),
(17, 'R14', 'I Wayan Sukaarnawa', '2022-12-02 20:40:29', '2022-12-02 20:40:29'),
(18, 'R15', 'I Wayan Ardani', '2022-12-02 20:40:45', '2022-12-02 20:40:45'),
(19, 'R16', 'Ni Wayan Ariasih', '2022-12-02 20:41:00', '2022-12-02 20:41:00'),
(20, 'R17', 'Ni Luh Putu Diantari', '2022-12-02 20:41:13', '2022-12-02 20:41:13'),
(21, 'R18', 'I Wayan Puspayadi', '2022-12-02 20:41:30', '2022-12-02 20:41:30'),
(22, 'R19', 'Ni Made Sukarti', '2022-12-02 20:42:51', '2022-12-02 20:42:51'),
(23, 'R20', 'Ni Wayan Sri Utari', '2022-12-02 20:43:01', '2022-12-06 16:08:41'),
(24, 'R21', 'Ni Luh Putu Ary', '2022-12-02 20:43:34', '2022-12-06 16:07:22'),
(25, 'R22', 'I Wayan Sujana', '2022-12-02 20:44:10', '2022-12-06 16:02:37'),
(26, 'R23', 'Ni Made Estiyanti', '2022-12-02 20:45:02', '2022-12-06 16:05:20'),
(27, 'R24', 'Ni Wayan Sendri', '2022-12-02 20:45:14', '2022-12-02 20:45:14'),
(28, 'R25', 'Ni Wayan Sesekawati', '2022-12-02 20:45:32', '2022-12-02 20:45:32'),
(29, 'R26', 'Ni Made Siliwati', '2022-12-02 20:45:50', '2022-12-02 20:45:50'),
(30, 'R27', 'I Made Rudika', '2022-12-02 20:46:02', '2022-12-02 20:46:02'),
(31, 'R28', 'I Wayan Suardinata', '2022-12-02 20:47:03', '2022-12-02 20:47:03'),
(32, 'R29', 'Ni Wayan Suliasih', '2022-12-02 20:47:13', '2022-12-02 20:47:13'),
(33, 'R30', 'Ni Wayan Ratningsih', '2022-12-02 20:47:41', '2022-12-02 20:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_alternatif_kriteria`
--

CREATE TABLE `bobot_alternatif_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alternatif_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_alternatif_kriteria`
--

INSERT INTO `bobot_alternatif_kriteria` (`id`, `kriteria_id`, `alternatif_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '3000000', NULL, NULL),
(2, 4, 1, '1135000', NULL, NULL),
(5, 7, 1, '19', NULL, NULL),
(7, 5, 1, '21', NULL, NULL),
(8, 6, 1, '6', NULL, NULL),
(9, 3, 2, '2000000', NULL, NULL),
(10, 4, 2, '1545000', NULL, NULL),
(11, 5, 2, '22', NULL, NULL),
(12, 6, 2, '3', NULL, NULL),
(13, 7, 2, '19', NULL, NULL),
(15, 3, 3, '4000000', NULL, NULL),
(16, 4, 3, '2000000', NULL, NULL),
(17, 5, 3, '21', NULL, NULL),
(18, 6, 3, '4', NULL, NULL),
(19, 7, 3, '19', NULL, NULL),
(21, 3, 4, '1500000', NULL, NULL),
(22, 4, 4, '750000', NULL, NULL),
(23, 5, 4, '12', NULL, NULL),
(24, 6, 4, '3', NULL, NULL),
(25, 7, 4, '19', NULL, NULL),
(26, 3, 6, '2000000', NULL, NULL),
(27, 4, 6, '1545000', NULL, NULL),
(28, 5, 6, '21', NULL, NULL),
(29, 6, 6, '4', NULL, NULL),
(30, 7, 6, '19', NULL, NULL),
(31, 3, 7, '4000000', NULL, NULL),
(32, 4, 7, '2000000', NULL, NULL),
(33, 5, 7, '21', NULL, NULL),
(34, 6, 7, '4', NULL, NULL),
(35, 7, 7, '19', NULL, NULL),
(39, 3, 9, '2700000', NULL, NULL),
(40, 4, 9, '2000000', NULL, NULL),
(41, 5, 9, '24', NULL, NULL),
(42, 6, 9, '6', NULL, NULL),
(43, 7, 9, '19', NULL, NULL),
(44, 3, 14, '4000000', NULL, NULL),
(45, 4, 14, '2000000', NULL, NULL),
(46, 5, 14, '23', NULL, NULL),
(47, 6, 14, '3', NULL, NULL),
(48, 7, 14, '19', NULL, NULL),
(49, 3, 15, '3700000', NULL, NULL),
(50, 4, 15, '1900000', NULL, NULL),
(51, 5, 15, '23', NULL, NULL),
(52, 6, 15, '3', NULL, NULL),
(53, 7, 15, '19', NULL, NULL),
(54, 3, 16, '2700000', NULL, NULL),
(55, 4, 16, '1800000', NULL, NULL),
(56, 5, 16, '25', NULL, NULL),
(57, 6, 16, '2', NULL, NULL),
(58, 7, 16, '19', NULL, NULL),
(59, 3, 17, '2700000', NULL, NULL),
(60, 4, 17, '1750000', NULL, NULL),
(61, 5, 17, '21', NULL, NULL),
(62, 6, 17, '2', NULL, NULL),
(63, 7, 17, '19', NULL, NULL),
(64, 3, 18, '1600000', NULL, NULL),
(65, 4, 18, '1000000', NULL, NULL),
(66, 5, 18, '14', NULL, NULL),
(67, 6, 18, '6', NULL, NULL),
(68, 7, 18, '19', NULL, NULL),
(69, 3, 19, '3200000', NULL, NULL),
(70, 4, 19, '2550000', NULL, NULL),
(71, 5, 19, '25', NULL, NULL),
(72, 6, 19, '3', NULL, NULL),
(73, 7, 19, '19', NULL, NULL),
(74, 3, 24, '1750000', NULL, NULL),
(75, 4, 24, '1000000', NULL, NULL),
(76, 5, 24, '13', NULL, NULL),
(77, 6, 24, '4', NULL, NULL),
(78, 7, 24, '19', NULL, NULL),
(79, 3, 20, '4000000', NULL, NULL),
(80, 4, 20, '2750000', NULL, NULL),
(81, 5, 20, '23', NULL, NULL),
(82, 6, 20, '4', NULL, NULL),
(83, 7, 20, '19', NULL, NULL),
(84, 3, 25, '3400000', NULL, NULL),
(85, 4, 25, '2000000', NULL, NULL),
(86, 5, 25, '24', NULL, NULL),
(87, 6, 25, '5', NULL, NULL),
(88, 7, 25, '19', NULL, NULL),
(89, 3, 21, '3500000', NULL, NULL),
(90, 4, 21, '1900000', NULL, NULL),
(91, 5, 21, '23', NULL, NULL),
(92, 6, 21, '6', NULL, NULL),
(93, 7, 21, '19', NULL, NULL),
(94, 3, 22, '4000000', NULL, NULL),
(95, 4, 22, '2450000', NULL, NULL),
(96, 5, 22, '23', NULL, NULL),
(97, 6, 22, '4', NULL, NULL),
(98, 7, 22, '19', NULL, NULL),
(99, 3, 26, '1500000', NULL, NULL),
(100, 4, 26, '12500000', NULL, NULL),
(101, 5, 26, '13', NULL, NULL),
(102, 6, 26, '1', NULL, NULL),
(103, 7, 26, '19', NULL, NULL),
(104, 3, 23, '2450000', NULL, NULL),
(105, 4, 23, '1450000', NULL, NULL),
(106, 5, 23, '21', NULL, NULL),
(107, 6, 23, '4', NULL, NULL),
(108, 7, 23, '19', NULL, NULL),
(109, 3, 27, '2700000', NULL, NULL),
(110, 4, 27, '1750000', NULL, NULL),
(111, 5, 27, '21', NULL, NULL),
(112, 6, 27, '2', NULL, NULL),
(113, 7, 27, '19', NULL, NULL),
(114, 3, 28, '3200000', NULL, NULL),
(115, 4, 28, '2000000', NULL, NULL),
(116, 5, 28, '21', NULL, NULL),
(117, 6, 28, '2', NULL, NULL),
(118, 7, 28, '19', NULL, NULL),
(119, 3, 29, '2650000', NULL, NULL),
(120, 4, 29, '1550000', NULL, NULL),
(121, 5, 29, '21', NULL, NULL),
(122, 6, 29, '4', NULL, NULL),
(123, 7, 29, '19', NULL, NULL),
(124, 3, 30, '2750000', NULL, NULL),
(125, 4, 30, '1400000', NULL, NULL),
(126, 5, 30, '23', NULL, NULL),
(127, 6, 30, '3', NULL, NULL),
(128, 7, 30, '19', NULL, NULL),
(129, 3, 31, '2400000', NULL, NULL),
(130, 4, 31, '1700000', NULL, NULL),
(131, 5, 31, '23', NULL, NULL),
(132, 6, 31, '2', NULL, NULL),
(133, 7, 31, '19', NULL, NULL),
(134, 3, 32, '1750000', NULL, NULL),
(135, 4, 32, '1250000', NULL, NULL),
(136, 5, 32, '21', NULL, NULL),
(137, 6, 32, '5', NULL, NULL),
(138, 7, 32, '19', NULL, NULL),
(139, 3, 33, '3700000', NULL, NULL),
(140, 4, 33, '2750000', NULL, NULL),
(141, 5, 33, '23', NULL, NULL),
(142, 6, 33, '3', NULL, NULL),
(143, 7, 33, '19', NULL, NULL),
(144, 3, 10, '2700000', NULL, NULL),
(145, 4, 10, '1750000', NULL, NULL),
(146, 5, 10, '21', NULL, NULL),
(147, 6, 10, '2', NULL, NULL),
(148, 7, 10, '19', NULL, NULL),
(149, 3, 11, '3200000', NULL, NULL),
(150, 4, 11, '2000000', NULL, NULL),
(151, 5, 11, '26', NULL, NULL),
(152, 6, 11, '4', NULL, NULL),
(153, 7, 11, '19', NULL, NULL),
(154, 3, 12, '2000000', NULL, NULL),
(155, 4, 12, '1750000', NULL, NULL),
(156, 5, 12, '21', NULL, NULL),
(157, 6, 12, '3', NULL, NULL),
(158, 7, 12, '19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kriteria` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  `jenis` enum('keuntungan','biaya') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'keuntungan',
  `tipe_kriteria` enum('integer','float','pilihan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'integer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `bobot`, `jenis`, `tipe_kriteria`, `created_at`, `updated_at`) VALUES
(3, 'C1', 'Pendapatan', 4, 'keuntungan', 'integer', '2019-12-04 01:50:18', '2022-11-08 06:53:05'),
(4, 'C2', 'Pengeluaran', 5, 'biaya', 'integer', '2019-12-04 01:51:05', '2022-11-08 06:53:23'),
(5, 'C3', 'Jabatan', 2, 'keuntungan', 'pilihan', '2019-12-04 01:51:33', '2022-11-08 06:57:20'),
(6, 'C4', 'Lama Kerja', 3, 'keuntungan', 'integer', '2019-12-04 01:51:33', '2022-11-08 06:53:50'),
(7, 'C5', 'Status Kerja', 3, 'keuntungan', 'pilihan', '2019-12-04 01:51:33', '2022-11-08 06:56:23'),
(13, 'C7474', 'Loyalitas', -313161, 'keuntungan', 'integer', '2022-12-06 20:14:29', '2022-12-06 20:14:29'),
(15, '1', 'Q', 3, 'keuntungan', 'float', '2022-12-06 20:15:51', '2022-12-06 20:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_04_064721_create_alternatif_table', 2),
(9, '2019_12_04_064912_create_kriteria_table', 2),
(10, '2019_12_04_070914_create_bobot_alternatif_kriteria_table', 2),
(11, '2019_12_04_072129_create_pilihan_kriteria_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `token` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_kriteria`
--

CREATE TABLE `pilihan_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pilihan` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilihan_kriteria`
--

INSERT INTO `pilihan_kriteria` (`id`, `kriteria_id`, `nama_pilihan`, `bobot`, `created_at`, `updated_at`) VALUES
(7, 3, 'Biasa Saja', 1, '2019-12-04 23:16:31', '2019-12-04 23:16:31'),
(8, 3, 'Biasa', 2, '2019-12-04 23:16:40', '2019-12-04 23:16:40'),
(9, 3, 'Standar', 3, '2019-12-04 23:16:49', '2019-12-04 23:16:49'),
(10, 3, 'Enak', 4, '2019-12-04 23:16:58', '2019-12-04 23:16:58'),
(11, 3, 'Sangat Enak', 5, '2019-12-04 23:17:07', '2019-12-04 23:17:07'),
(12, 5, 'Serabutan', 1, '2019-12-04 23:17:32', '2022-12-02 17:52:05'),
(13, 5, 'Buruh', 1, '2019-12-04 23:17:38', '2022-12-02 20:22:20'),
(14, 5, 'Buruh Tani', 1, '2019-12-04 23:17:46', '2022-12-02 20:24:48'),
(15, 6, 'Biasa Saja', 1, '2019-12-04 23:18:26', '2019-12-04 23:18:26'),
(16, 6, 'Standar', 2, '2019-12-04 23:18:37', '2019-12-04 23:18:37'),
(17, 6, 'Nyaman', 3, '2019-12-04 23:18:43', '2019-12-04 23:18:43'),
(18, 6, 'Sangat Nyaman', 4, '2019-12-04 23:18:50', '2019-12-04 23:18:50'),
(19, 7, 'Aktif', 3, '2022-11-08 06:56:50', '2022-11-08 06:57:07'),
(20, 7, 'Tidak Aktif', 1, '2022-11-08 06:57:02', '2022-11-08 06:57:02'),
(21, 5, 'Pedagang', 1, '2022-12-02 20:25:06', '2022-12-02 20:25:49'),
(22, 5, 'Warung Makan', 1, '2022-12-02 20:29:14', '2022-12-02 20:29:14'),
(23, 5, 'Pegawai Swasta', 1, '2022-12-02 20:29:28', '2022-12-02 20:29:28'),
(24, 5, 'Peternak', 1, '2022-12-02 20:29:41', '2022-12-02 20:29:41'),
(25, 5, 'Karyawan', 1, '2022-12-02 20:30:55', '2022-12-02 20:30:55'),
(26, 5, 'Karyawan Toko', 1, '2022-12-02 20:30:59', '2022-12-02 20:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dede Gunawan', 'dede@unsil.ac.id', NULL, '$2y$10$oJfUVSBfKFxuv9GH1.qRO.nkm9R9BY.ByiHfx7pDQwaMEpqehBQ3m', NULL, '2019-12-03 19:58:38', '2019-12-03 19:58:38'),
(2, 'admin', 'test@gmail.com', NULL, '$2y$10$nDqwgxy8AjV6oIKfJJlc4eqhTp7nGbbcQfBOh44RG.OgSYhZsTpHS', NULL, '2022-11-26 04:27:04', '2022-11-26 04:27:04'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$oOrd7QavcJ6WzdLyKBszROmLPGnXdQkHqj3F0i1fVkuRmffuBPAYK', 'Ynh3v37wXFkLjLDWr59mEpWjPWcQzjt6C7LtCiHjevCywtrCpzBuRhfy1dDw', '2022-11-29 07:41:16', '2022-11-29 07:41:16'),
(4, '12827337', 'syakurrahman@gmail.com', NULL, '$2y$10$0p6/j24umiBi1YNLrUUEKuiR5Hu8ce7yb6xR/AIJJhOyFvgJ0KvTq', NULL, '2022-12-06 20:07:40', '2022-12-06 20:07:40'),
(5, 'ayam', 'kampus@gmail.com', NULL, '$2y$10$In5sNbNz7VSd6F3gtoRWKeUTFfw6QKmhz9ZbVBVx39rHKcxwlKhxa', NULL, '2022-12-06 20:11:36', '2022-12-06 20:11:36'),
(6, 'Budhi Arta K Giri', 'budhi09dede0201@gmail.com', NULL, '$2y$10$Fh43jCKINpRaPgfBKA4f/ez8jA3Li5J/JDCz35rfNR/Maa9Bmj9Q6', NULL, '2022-12-06 20:12:41', '2022-12-06 20:12:41'),
(7, 'admin', 'adminleo@gmail.com', NULL, '$2y$10$ZSAKjVRxUcCDjloso3QppOo2ZqNycR5mrCedwOG2qXqkQNuaJD7Ee', NULL, '2022-12-09 09:17:43', '2022-12-09 09:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_alternatif_kriteria`
--
ALTER TABLE `bobot_alternatif_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_alternatif_kriteria_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `bobot_alternatif_kriteria_alternatif_id_foreign` (`alternatif_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilihan_kriteria_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bobot_alternatif_kriteria`
--
ALTER TABLE `bobot_alternatif_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_alternatif_kriteria`
--
ALTER TABLE `bobot_alternatif_kriteria`
  ADD CONSTRAINT `bobot_alternatif_kriteria_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bobot_alternatif_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  ADD CONSTRAINT `pilihan_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
