-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2023 at 10:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasraman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banten`
--

CREATE TABLE `tb_banten` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_banten` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banten`
--

INSERT INTO `tb_banten` (`id`, `id_user`, `nama_banten`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ayam Colong Luh Muani', 1, '2022-11-18 12:02:38', '2023-02-05 10:35:06'),
(2, 1, 'Bangkit Bebek', 1, '2022-11-18 12:02:38', '2023-01-26 07:41:21'),
(3, 1, 'Banten Ari - ari', 1, '2022-11-18 12:02:38', '2023-02-04 01:12:02'),
(4, 1, 'Banten Gedong - gedongan', 1, '2022-11-18 12:02:38', '2023-01-16 11:15:21'),
(5, 1, 'Banten Kalahyang', 1, '2022-11-18 12:02:38', '2023-01-10 03:05:02'),
(6, 1, 'Banten Kumara', 1, '2022-11-18 12:02:38', '2023-02-04 05:36:03'),
(7, 1, 'Banten Ngangkid', 1, '2022-11-18 12:02:38', '2023-01-08 02:46:39'),
(8, 1, 'Banten Ngilehin Lesung', 1, '2022-11-18 12:02:38', '2023-01-08 02:46:39'),
(9, 1, 'Banten Nutug Kambuhan', 1, '2022-11-18 12:02:38', '2023-01-08 02:46:39'),
(10, 1, 'Banten Paingkupan', 1, '2022-11-18 12:02:38', '2023-01-08 02:46:39'),
(11, 1, 'Banten Patemuan Ring Sumur', 1, '2022-11-18 12:02:38', '2023-01-08 02:46:39'),
(12, 1, 'Banten Pawintenan', 1, '2022-11-18 12:02:38', '2022-11-22 07:55:58'),
(13, 1, 'Banten Pawintenan Mesurat Gana', 1, '2022-11-18 12:02:38', '2023-01-06 15:00:40'),
(14, 1, 'Banten Pawintenan Saraswati', 1, '2022-11-18 12:02:38', '2023-01-10 03:05:02'),
(15, 1, 'Banten Pedambel', 1, '2022-11-18 12:02:38', '2023-01-06 15:00:40'),
(16, 1, 'Banten Pemegat Sesangi', 1, '2022-11-18 12:02:38', '2023-01-06 15:00:40'),
(17, 1, 'Banten Pemerasan Jangkep', 1, '2022-11-18 12:02:38', '2022-12-28 04:20:00'),
(18, 1, 'Banten Pemereman', 1, '2022-11-18 12:02:38', '2023-02-04 01:12:02'),
(19, 1, 'Banten Penunas Tirta', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(20, 1, 'Banten Sesangi', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(21, 1, 'Banten Soroan Bangkit', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(22, 1, 'Banten Wayang', 1, '2022-11-18 12:06:56', '2022-11-29 00:25:45'),
(23, 1, 'Bayuan', 1, '2022-11-18 12:06:56', '2022-11-28 23:55:25'),
(24, 1, 'Bayuh Oton', 1, '2022-11-18 12:06:56', '2023-02-04 01:03:08'),
(25, 1, 'Bebek Idup', 1, '2022-11-18 12:06:56', '2022-11-28 23:57:06'),
(26, 1, 'Cecaron Oton', 1, '2022-11-18 12:06:56', '2023-02-04 01:03:08'),
(27, 1, 'Cecaron Patemuan', 1, '2022-11-18 12:06:56', '2022-11-20 12:25:39'),
(28, 1, 'Cecaron Rare', 1, '2022-11-18 12:06:56', '2023-02-04 01:08:45'),
(29, 1, 'Guling Bawi Bawa Sendiri', 1, '2022-11-18 12:06:56', '2023-01-10 15:46:37'),
(30, 1, 'Guling Bawi Karangasem', 1, '2022-11-18 12:06:56', '2023-02-04 00:21:23'),
(31, 1, 'Guling Bawi Monjonk', 1, '2022-11-18 12:06:56', '2023-02-04 01:05:05'),
(32, 1, 'Guling Bebek', 1, '2022-11-18 12:06:56', '2023-02-04 01:12:02'),
(33, 1, 'Guling Bebek Putih', 1, '2022-11-18 12:06:56', '2023-01-10 00:58:24'),
(34, 1, 'Janganan', 1, '2022-11-18 12:06:56', '2023-02-04 01:12:02'),
(35, 1, 'Janganan Belog', 1, '2022-11-18 12:06:56', '2023-01-10 04:32:23'),
(36, 1, 'Jrimpen', 1, '2022-11-18 12:06:56', '2022-11-30 03:56:19'),
(37, 1, 'Lelasan Idup', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(38, 1, 'Manisan', 1, '2022-11-18 12:06:56', '2023-02-04 00:43:55'),
(39, 1, 'Megat Benang', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(40, 1, 'Pageh Tuwuh', 1, '2022-11-18 12:06:56', '2023-01-11 02:08:34'),
(41, 1, 'Pakekesan', 1, '2022-11-18 12:14:50', '2022-12-28 03:57:05'),
(42, 1, 'Papah, Layangan, Pemali', 1, '2022-11-18 12:14:50', '2023-02-04 00:43:55'),
(43, 1, 'Payuk Pebayuhan Manut Wewaran', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(44, 1, 'Payuk Pebayuhan Ring Ajeng Gedong', 1, '2022-11-18 12:14:50', '2022-11-29 00:25:48'),
(45, 1, 'Payuk Pebayuhan Ring Jaba Griya', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(46, 1, 'Payuk Pebayuhan Ring Jaba Merajan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(47, 1, 'Pebayuh Rare Manut Pancawara', 1, '2022-11-18 12:14:50', '2023-02-04 01:08:45'),
(48, 1, 'Pebayuh Weton', 1, '2022-11-18 12:14:50', '2022-11-27 14:19:23'),
(49, 1, 'Pejati Alit (Peras Daksina)', 1, '2022-11-18 12:14:50', '2023-02-04 01:12:02'),
(50, 1, 'Pejati Suci', 1, '2022-11-18 12:14:50', '2022-12-20 01:54:24'),
(51, 1, 'Pejati Suci Putih', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(52, 1, 'Pejati Taluh Bebek', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(53, 1, 'Pejati Tipat Kelanan', 1, '2022-11-18 12:14:50', '2023-01-10 16:02:43'),
(54, 1, 'Pejati Upasaksi', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(55, 1, 'Pekakulan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(56, 1, 'Pekoleman Munggah Kelih', 1, '2022-11-18 12:14:50', '2022-12-20 01:51:37'),
(57, 1, 'Pemereman', 1, '2022-11-18 12:14:50', '2023-02-04 01:07:07'),
(58, 1, 'Pengulapan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(59, 1, 'Pesosolan Ayam', 1, '2022-11-18 12:14:50', '2023-02-04 05:24:17'),
(60, 1, 'Prascita', 1, '2022-11-18 12:14:50', '2023-02-04 05:24:12'),
(61, 1, 'Pregembal Gede', 1, '2022-11-18 12:14:50', '2023-02-04 05:24:11'),
(62, 1, 'Rajah Semara Ratih', 0, '2022-11-22 04:43:48', '2023-02-04 05:23:04'),
(63, 1, 'Rantasan Putih Kuning', 1, '2022-11-22 05:17:53', '2023-02-04 05:36:03'),
(64, 1, 'Sambutan', 1, '2022-11-22 05:17:53', '2023-02-04 05:24:05'),
(65, 1, 'Santun Sokan Manut Pancawara', 1, '2022-11-22 05:17:53', '2023-02-04 05:24:08'),
(66, 1, 'Sayut Agung', 1, '2022-11-22 05:17:53', '2023-02-04 05:24:02'),
(67, 1, 'Sayut Pengambian', 1, '2022-11-22 05:17:53', '2023-02-04 05:24:01'),
(68, 1, 'Selempod Benang Putih', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:59'),
(69, 1, 'Sesayut Sudhi Widani', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:57'),
(70, 1, 'Soroan Bangkit', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:56'),
(71, 1, 'Soroan Punggel', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:55'),
(72, 1, 'Suci', 1, '2022-11-22 05:17:53', '2023-02-04 05:24:15'),
(73, 1, 'Tataban Munggah Kelih', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:48'),
(74, 1, 'Tataban Ngekep', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:50'),
(75, 1, 'Tataban Oton', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:44'),
(76, 1, 'Tataban Rare', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:41'),
(77, 1, 'Tataban Sapuhleger', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:53'),
(78, 1, 'Tataban Weton Manut Wewaran', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:35'),
(79, 1, 'Tebasan', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:33'),
(80, 1, 'Tebasan 5', 0, '2022-11-22 05:17:53', '2023-02-04 05:22:26'),
(81, 1, 'Tebasan Magedong Gedongan', 1, '2022-11-22 05:17:53', '2023-02-04 05:23:37'),
(82, 1, 'Tebasan Pasupati', 0, '2022-11-22 05:21:33', '2023-02-04 05:22:23'),
(83, 1, 'Teteg Pregembal', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:39'),
(84, 1, 'Tirta Empul', 0, '2022-11-22 05:21:33', '2022-12-25 03:34:04'),
(85, 1, 'Tirta Segara', 0, '2022-11-22 05:21:33', '2023-02-04 05:22:20'),
(86, 1, 'Tumpeng17', 1, '2022-11-22 05:21:33', '2023-02-05 10:37:35'),
(87, 1, 'Ulam', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:28'),
(88, 1, 'Ulam Bangkit', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:27'),
(89, 1, 'Ulam Pemereman', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:26'),
(90, 1, 'Ulam Punggel', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:25'),
(91, 1, 'Upasaksi', 1, '2022-11-22 05:21:33', '2023-02-04 05:23:23'),
(92, 1, 'tsts', 0, '2022-11-26 04:28:25', '2022-12-25 03:33:55'),
(93, 1, 'bebas3', 0, '2022-11-26 09:06:37', '2022-12-25 03:33:54'),
(94, 1, 'Tasa', 1, '2023-02-05 08:39:28', '2023-02-05 08:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_faq`
--

CREATE TABLE `tb_faq` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_faq`
--

INSERT INTO `tb_faq` (`id`, `id_user`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kapan Pasraman Griya Buruan didirikan?', 'Pasraman ini berdiri sejak bulan April 2020 dan meneruskan kegiatan yang sudah berlangsung di Griya Gede Wayahan Buruan sejak tahun 1998', '2023-01-11 01:08:23', '2023-01-11 01:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_foto` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `id_user`, `nama_foto`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Foto tempat', '1673399349.jpeg', 'Foto dummy', '2023-01-11 01:09:09', '2023-01-11 01:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_upacara`
--

CREATE TABLE `tb_jenis_upacara` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_jenis_upacara` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_upacara`
--

INSERT INTO `tb_jenis_upacara` (`id`, `id_user`, `nama_jenis_upacara`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bayuh Rare', 1, '2022-11-12 07:00:25', '2022-12-25 03:33:27'),
(2, 1, 'Tiga Bulanan', 1, '2022-11-12 07:00:25', '2023-02-04 05:20:26'),
(3, 1, 'Pawiwahan', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:28'),
(4, 1, 'Pawintenan', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:26'),
(5, 1, 'Metatah', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:25'),
(6, 1, 'Otonan', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:30'),
(7, 1, 'Bayuh Oton', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:35'),
(8, 1, 'Magedong - gedongan', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:37'),
(9, 1, 'Nutug Kambuhan', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:34'),
(10, 1, 'Sudiwidani', 1, '2022-11-13 07:51:54', '2023-02-04 05:24:42'),
(11, 1, 'Meras Nak Alit', 1, '2022-11-12 07:00:25', '2023-02-04 05:24:40'),
(12, 1, 'Lain - lain', 0, '2022-11-12 07:00:25', '2022-11-30 04:02:53'),
(13, 1, 'bebas', 0, '2022-11-26 09:06:20', '2022-12-20 02:22:29'),
(14, 1, 'baru', 0, '2022-12-28 06:37:02', '2023-01-11 02:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_testimoni` varchar(60) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id`, `id_user`, `nama_testimoni`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'tes', 'kk', 1, '2023-02-05 09:00:08', '2023-02-05 09:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `kode_transaksi` text NOT NULL,
  `nama_pelanggan` varchar(60) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `kategori` enum('Privat','Umum') NOT NULL,
  `sapta_wara` varchar(10) NOT NULL,
  `panca_wara` varchar(10) NOT NULL,
  `tanggal_upacara` date NOT NULL,
  `waktu_upacara` time NOT NULL,
  `status` int NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `biaya` int NOT NULL,
  `dp` int NOT NULL,
  `pelunasan` int DEFAULT NULL,
  `tanggal_pelunasan` date DEFAULT NULL,
  `keterangan_upacara` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `keterangan_cancel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tanggal_banten_pulang` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `kode_transaksi`, `nama_pelanggan`, `no_telepon`, `alamat`, `email`, `kategori`, `sapta_wara`, `panca_wara`, `tanggal_upacara`, `waktu_upacara`, `status`, `tanggal_transaksi`, `biaya`, `dp`, `pelunasan`, `tanggal_pelunasan`, `keterangan_upacara`, `keterangan_cancel`, `tanggal_banten_pulang`, `created_at`, `updated_at`) VALUES
(1, 1, 'PB1001230001', 'Ni Luh Pasek Trisnawati (Jro Ningrum)', '082146484638', 'Puri Klungkung', 'pasek@gmail.com', 'Umum', 'Redite', 'Umanis', '2023-01-10', '08:39:00', 1, '2023-01-10', 3000000, 1500000, 1500000, NULL, NULL, NULL, NULL, '2023-01-10 00:40:08', '2023-01-10 00:40:08'),
(2, 1, 'PB1001230002', 'I Made Renan Tresna Pratama', '081337407789', 'Dsn Payungan Selat Klungkung', 'renan@gmail.com', 'Umum', 'Wrespati', 'Pon', '2023-01-10', '08:42:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(3, 1, 'PB1001230003', 'Kadek Dwi Payana', '087860003202', 'Lebih Beten kelod', 'dwi@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:44:00', 1, '2023-01-10', 2500000, 1000000, 1500000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(4, 1, 'PB1001230004', 'Ni Wayan Sulastri', '081338768747', 'Guwang', 'sulastri@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:48:00', 1, '2023-01-10', 1700000, 1000000, 700000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:49:04', '2023-01-10 00:49:04'),
(5, 1, 'PB1001230005', 'I Kadek Kenzie Ksatria Wicaksana', '081805617358', 'Jl. Wibisana Denpasar', 'ksatria@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:49:00', 1, '2023-01-10', 2500000, 1500000, 1000000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:50:26', '2023-01-10 00:50:26'),
(6, 1, 'PB1001230006', 'Putu Willy Wahyuni', '081356512561', 'Klungkung', 'willy@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:51:00', 1, '2023-01-10', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(7, 1, 'PB1001230007', 'Ni Komang Tri Purnama Sari', '081339694997', 'Karangasem', 'purnama@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '15:52:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 00:53:58', '2023-01-10 00:54:13'),
(8, 1, 'PB1001230008', 'I Made Dody Swandika Putra', '0895353638273', 'Badung', 'dody@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '15:55:00', 0, '2023-01-10', 1000000, 500000, 500000, '2023-01-10', NULL, NULL, '2023-01-10', '2023-01-10 00:55:43', '2023-01-10 01:10:21'),
(9, 1, 'PB1001230009', 'Made Arsana', '0817346413', 'Padang Sambian', 'arsana@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:56:00', 1, '2023-01-10', 8000000, 4000000, 4000000, NULL, NULL, NULL, NULL, '2023-01-10 00:57:05', '2023-01-10 00:57:05'),
(10, 1, 'PB1001230010', 'Nyoman Sukirta', '087863141449', 'Banjarangkan', 'sukirta@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '08:57:00', 1, '2023-01-10', 5000000, 3000000, 2000000, NULL, NULL, NULL, NULL, '2023-01-10 00:58:24', '2023-01-10 00:58:24'),
(11, 1, 'PB1001230011', 'I Gusti Ayu Agung Adiputri', '081237674240', 'Bedulu', 'ayu@gmail.com', 'Privat', 'Wrespati', 'Paing', '2023-01-10', '17:59:00', 1, '2023-01-10', 6000000, 3000000, 3000000, NULL, NULL, NULL, NULL, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(12, 1, 'PB1001230012', 'I Wayan Sadia', '087862214291', 'Denpasar', 'sadia@gmail.com', 'Privat', 'Wrespati', 'Paing', '2023-01-10', '13:00:00', 1, '2023-01-10', 2500000, 1000000, 1500000, NULL, NULL, NULL, '2023-01-10', '2023-01-10 01:01:17', '2023-01-10 01:01:17'),
(13, 1, 'PB1001230013', 'Ni Komang Ari Susanti', '0361224308', 'Denpasar', 'arisusanti@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '15:16:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, NULL, '2023-01-10 02:16:53', '2023-01-10 02:16:53'),
(14, 1, 'PB1001230014', 'Ni Made Tania Putri', '083115666479', 'Denpasar', 'tania@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '15:47:00', 1, '2023-01-10', 3000000, 2000000, 1000000, NULL, 'Pekekesan; kepala ayam, kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, NULL, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(15, 1, 'PB1001230015', 'Nyoman Kartika', '087750704447', 'Serongga Kaja', 'kartika@gmail.com', 'Umum', 'Wrespati', 'Paing', '2023-01-10', '15:04:00', 1, '2023-01-10', 2500000, 1500000, 1000000, NULL, NULL, NULL, NULL, '2023-01-10 03:05:02', '2023-01-10 03:05:02'),
(16, 1, 'PB1001230016', 'I Gusti Ngurah Wira Prayoga', '085940878293', 'Blahbatuh', 'wira@gmail.com', 'Umum', 'Soma', 'Umanis', '2023-01-11', '06:07:00', 1, '2023-01-11', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(17, 1, 'PB1001230017', 'Ni Wayan Dhita Jayanti', '0881037252469', 'Renon', 'tes@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '04:09:00', 1, '2023-01-10', 4500000, 3000000, 1500000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(18, 1, 'PB1001230018', 'I Made Wira Ayodya Putra', '081936677763', 'Klungkung', 'wira@gmail.com', 'Umum', 'Redite', 'Pon', '2023-01-11', '05:11:00', 1, '2023-01-11', 2000000, 1000000, 1000000, NULL, 'pekekesan: kepala ayam, kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, NULL, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(19, 1, 'PB1001230019', 'Dewa Ayu Falisha Sriwindrya', '081236963959', 'Denpasar', 'falisha@gmail.com', 'Umum', 'Redite', 'Umanis', '2023-01-11', '00:19:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(20, 1, 'PB1001230020', 'Ketut Nakula Andrea Gandara', '081999072500', 'Pedungan', 'nakula@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '00:27:00', 1, '2023-01-10', 3500000, 1500000, 2000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(21, 1, 'PB1001230021', 'Nyoman Nusani', '08123831011', 'Jl. Sinta Blakang Pengadilan', 'nusani@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '00:29:00', 1, '2023-01-10', 2500000, 1000000, 1500000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:30:15', '2023-01-10 04:30:15'),
(22, 1, 'PB1001230022', 'I Gusti Ayu Milan Anandari', '082339814128', 'Kesiman', 'milan@gmail.com', 'Umum', 'Redite', 'Pon', '2023-01-11', '12:31:00', 0, '2023-01-10', 1200000, 1200000, 0, '2023-01-10', NULL, NULL, '2023-01-11', '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(23, 1, 'PB1001230023', 'Komang Rheynaka', '085237767683', 'Nusa Dua', 'rheynaka@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '12:33:00', 0, '2023-01-11', 1500000, 1500000, 0, '2023-01-10', NULL, NULL, '2023-01-11', '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(24, 1, 'PB1001230024', 'Kadek Rangga Tanaka', '089611311657', 'Ubud', 'rangga@gmail.com', 'Umum', 'Redite', 'Paing', '2023-01-11', '12:34:00', 1, '2023-01-10', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(25, 1, 'PB1001230025', 'Ni Putu Naila Adnyani', '081239679235', 'Klungkung', 'naila@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '12:36:00', 0, '2023-01-10', 1500000, 1500000, 0, '2023-01-10', 'pekekesan: kepala ayam, kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, '2023-01-11', '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(26, 1, 'PB1001230026', 'Ni Putu Harlin Nanda Arischa', '08199392666', 'Gianyar', 'harlin@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '12:37:00', 1, '2023-01-10', 1500000, 500000, 1000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(27, 1, 'PB1001230027', 'I Gusti Agung Ngurah Anom Deva', '081338659146', 'Blahabatuh', 'anom@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-11', '12:39:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:40:11', '2023-01-10 04:40:11'),
(28, 1, 'PB1001230028', 'I Komang Dananjaya', '085337034195', 'Bangli', 'dananjaya@gmail.com', 'Privat', 'Soma', 'Umanis', '2023-01-11', '06:41:00', 1, '2023-01-10', 5000000, 2500000, 2500000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(29, 1, 'PB1001230029', 'A.A. Istri Wahyundari', '02458125226', 'Buruan', 'wahyundari@gmail.com', 'Privat', 'Soma', 'Pon', '2023-01-11', '07:42:00', 0, '2023-01-10', 5000000, 5000000, 0, '2023-01-10', NULL, NULL, '2023-01-11', '2023-01-10 04:43:01', '2023-01-10 04:43:01'),
(30, 1, 'PB1001230030', 'Ni Ketut Suardani', '085738811635', 'Banjarangkan- Klungkung', 'suardani@gmail.com', 'Privat', 'Soma', 'Paing', '2023-01-11', '07:43:00', 1, '2023-01-10', 5000000, 2500000, 2500000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 04:44:16', '2023-01-10 04:44:16'),
(31, 1, 'PB1001230031', 'Kadek Yudi Putra Wijaya', '085941053831', 'Gianyar', 'yudi@gmail.com', 'Umum', 'Redite', 'Umanis', '2023-01-12', '01:48:00', 1, '2023-01-10', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 05:49:30', '2023-01-10 05:49:30'),
(32, 1, 'PB1001230032', 'I Kadek Bagas Dwipa Arsyanendra', '087850073840', 'Darmasaba', 'dwipa@gmail.com', 'Privat', 'Redite', 'Paing', '2023-01-12', '06:45:00', 1, '2023-01-10', 3000000, 2000000, 1000000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 15:47:19', '2023-01-10 15:47:20'),
(33, 1, 'PB1001230033', 'Ni Putu Febri Ardiantari', '081338790420', 'Denpasar', 'febri@gmail.com', 'Privat', 'Soma', 'Pon', '2023-01-12', '14:49:00', 1, '2023-01-10', 3000000, 2000000, 1000000, NULL, NULL, NULL, NULL, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(34, 1, 'PB1001230034', 'Wiwin Susianti', '081999230761', 'Lantang idung', 'wiwin@gmail.com', 'Privat', 'Budha', 'Paing', '2023-01-12', '18:51:00', 0, '2023-01-10', 6500000, 6500000, 0, '2023-01-10', 'Pekekesan: kakul, kikil, kepala ayam, kepala bebek, taluh bebek lebeng', NULL, '2023-01-12', '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(35, 1, 'PB1001230035', 'Dewa Made Keenan Alvarendra', '085714005507', 'Bajera, Tabanan', 'keenan@gmail.com', 'Umum', 'Redite', 'Paing', '2023-01-12', '10:56:00', 1, '2023-01-10', 3500000, 1500000, 2000000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(36, 1, 'PB1101230036', 'Ni Luh Putu Ayunda Ghari Sundari', '081338959988', 'Paguyangan kaja', 'ghari@gmail.com', 'Umum', 'Soma', 'Umanis', '2023-01-12', '10:00:00', 1, '2023-01-11', 2500000, 2000000, 500000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(37, 1, 'PB1101230037', 'Gusti Ayu Made Sri Imas Purnama', '085337428326', 'Sidakarya', 'srimas@gmail.com', 'Umum', 'Redite', 'Paing', '2023-01-12', '00:06:00', 1, '2023-01-11', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(38, 1, 'PB1101230038', 'Agung Sugianto', '081999424949', 'Dalung', 'agung@gmail.com', 'Umum', 'Soma', 'Wage', '2023-01-12', '00:17:00', 1, '2023-01-11', 6000000, 3000000, 3000000, NULL, NULL, NULL, NULL, '2023-01-10 16:19:04', '2023-01-10 16:19:04'),
(39, 1, 'PB1101230039', 'Kadek Rendra Pranata', '081999944844', 'Gianyar', 'rendra@gmail.com', 'Umum', 'Anggara', 'Paing', '2023-01-11', '00:24:00', 1, '2023-01-11', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-11', '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(40, 1, 'PB1101230040', 'Kadek Laksmi Cantika Putri', '081238199367', 'Denpasar', 'laksmi@gmail.com', 'Umum', 'Redite', 'Paing', '2023-01-12', '00:29:00', 1, '2023-01-11', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(41, 1, 'PB1101230041', 'I Wayan Agus Suparta', '081999759092', 'Batubulan', 'agus@gmail.com', 'Umum', 'Anggara', 'Paing', '2023-01-12', '00:31:00', 0, '2023-01-11', 3000000, 3000000, 0, '2023-01-11', NULL, NULL, '2023-01-12', '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(42, 1, 'PB1101230042', 'I Komang Arselio Kenzo Danendra', '082236605975', 'Siangan', 'arselio@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-01-12', '00:35:00', 1, '2023-01-11', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-12', '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(45, 1, 'PB1101230043', 'Agus Mahendra Adi Artha', '081338433181', 'Denpasar', 'mahendra@gmail.com', 'Umum', 'Soma', 'Pon', '2023-01-12', '10:07:00', 1, '2023-01-11', 4000000, 2000000, 2000000, NULL, NULL, NULL, '2023-01-12', '2023-01-11 02:08:34', '2023-01-12 03:15:51'),
(46, 1, 'PB1201230044', 'Komang Tressa Damara', '081339696233', 'Singapadu', 'damara@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-01-12', '11:22:00', 1, '2023-01-12', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-12', '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(47, 1, 'PB1201230045', 'AA. Istri Kanaya Prameswari', '087860621231', 'Gianyar', 'kanaya@gmail.com', 'Umum', 'Redite', 'Paing', '2023-01-12', '11:27:00', 1, '2023-01-12', 2000000, 500000, 1500000, NULL, NULL, NULL, '2023-01-12', '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(48, 1, 'PB1201230046', 'Ni Kadek Intan Jesyana Putri', '081547284750', 'Bangli', 'intan@gmail.com', 'Privat', 'Redite', 'Umanis', '2023-01-12', '11:35:00', 0, '2023-01-12', 5000000, 5000000, 0, '2023-01-12', 'request meja di kanan', NULL, NULL, '2023-01-12 03:36:15', '2023-01-12 03:36:15'),
(49, 1, 'PB1201230047', 'I Wayan Suja', '0819163353500', 'Pejeng', 'suja@gmail.com', 'Umum', 'Anggara', 'Paing', '2023-01-12', '11:41:00', 1, '2023-01-12', 3000000, 1500000, 1500000, NULL, NULL, NULL, '2023-01-12', '2023-01-12 03:42:40', '2023-01-12 03:42:40'),
(50, 1, 'PB1201230048', 'Gusti Ayu Okawati', '08164712169', 'Bedulu', 'okawati@gmail.com', 'Umum', 'Soma', 'Umanis', '2023-01-16', '11:43:00', 2, '2023-01-12', 1500000, 500000, 1000000, NULL, NULL, 'cancel', '2023-01-12', '2023-01-12 03:44:13', '2023-01-16 12:46:50'),
(53, 1, 'PB1901230051', 'Ni Putu Yura Saputri', '085737000829', 'Payangan', 'yura@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-19', '08:22:00', 2, '2023-01-19', 2000000, 1500000, 500000, NULL, NULL, 'tes', '2023-01-19', '2023-01-19 00:23:19', '2023-02-04 06:16:18'),
(54, 1, 'PB1901230052', 'I Made Eiji', '081933696111', 'Denpasar', 'elji@gmail.com', 'Umum', 'Soma', 'Umanis', '2023-01-20', '08:23:00', 2, '2023-01-19', 2500000, 1000000, 1500000, NULL, NULL, 'tes', '2023-01-19', '2023-01-19 00:30:29', '2023-02-04 06:16:41'),
(55, 1, 'PB1901230053', 'Ni Komang Agustin Arya Putri', '081238009399', 'Sidakarya', 'arya@gmail.com', 'Umum', 'Soma', 'Umanis', '2023-01-21', '08:35:00', 1, '2023-01-19', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-20', '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(56, 1, 'PB1901230054', 'I Komang Ryuga Diratama', '081353137340', 'NusaDua', 'ryuga@gmail.com', 'Privat', 'Anggara', 'Pon', '2023-01-20', '08:41:00', 1, '2023-01-19', 3000000, 2500000, 500000, NULL, NULL, NULL, '2023-01-19', '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(57, 1, 'PB1901230055', 'IA. Gauri Padma Dewi', '081916360529', 'Gianyar', 'gauri@gmail.com', 'Privat', 'Anggara', 'Paing', '2023-01-22', '08:49:00', 1, '2023-01-19', 3500000, 1000000, 2500000, NULL, NULL, NULL, '2023-01-21', '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(58, 1, 'PB1901230056', 'Kadek Wisnu Maheswara', '083114914411', 'Denpasar', 'wisnu@gmail.com', 'Umum', 'Anggara', 'Paing', '2023-01-22', '08:52:00', 1, '2023-01-19', 2000000, 1500000, 500000, NULL, NULL, NULL, '2023-01-20', '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(59, 1, 'PB1901230057', 'Gusti Ayu Mirah Santika Dewi', '082341004494', 'Badung', 'mirah@gmail.com', 'Privat', 'Soma', 'Paing', '2023-01-21', '08:53:00', 1, '2023-01-19', 2500000, 1000000, 1500000, NULL, NULL, NULL, '2023-01-19', '2023-01-19 00:54:18', '2023-01-19 00:54:18'),
(60, 1, 'PB1901230058', 'Ni Putu Laura Putri Sedana', '081553749890', 'Denpasar', 'laura@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-20', '11:55:00', 1, '2023-01-19', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-19', '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(61, 1, 'PB1901230059', 'Sang Ayu Putu Intan Karunia Pertiwi', '085238140602', 'Bangli', 'intan@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-01-21', '11:57:00', 1, '2023-01-19', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-01-19', '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(62, 1, 'PB1901230060', 'Ida Ayu Naomi Anindra Manuaba', '08124687272', 'Tabanan', 'naomi@gmail.com', 'Umum', 'Wrespati', 'Pon', '2023-01-22', '10:58:00', 0, '2023-01-19', 2000000, 2000000, 0, '2023-01-19', NULL, NULL, '2023-01-20', '2023-01-19 00:59:20', '2023-01-19 00:59:20'),
(63, 1, 'PB1901230061', 'Luh Ade Srinadi Purwati', '082144115123', 'Angantaka', 'srinadi@gmail.com', 'Umum', 'Anggara', 'Wage', '2023-01-20', '09:00:00', 1, '2023-01-19', 1500000, 500000, 1000000, NULL, NULL, NULL, '2023-01-19', '2023-01-19 01:01:02', '2023-01-19 01:01:02'),
(64, 1, 'PB1901230062', 'Ketut Karmi', '085237194220', 'Manggis', 'karmi@gmail.com', 'Privat', 'Anggara', 'Pon', '2023-01-19', '11:02:00', 0, '2023-01-19', 1000000, 1000000, 0, '2023-01-19', NULL, NULL, NULL, '2023-01-19 01:03:07', '2023-01-19 01:03:07'),
(66, 1, 'PB2601230064', 'efewfew', '565879', 'kujhm', 'sintya@gmail.com', 'Umum', 'Soma', 'Paing', '2023-01-26', '15:51:00', 2, '2023-01-26', 1500000, 500000, 1000000, '2023-01-26', NULL, 'tes', NULL, '2023-01-26 07:52:05', '2023-01-26 07:52:30'),
(67, 1, 'PB0402230065', 'Ni Putu Yura Saputri', '0876432128764', 'Gianyar', 'yura@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-29', 4000000, 2000000, 2000000, NULL, 'Pekekesan; kepala ayam , kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, NULL, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(68, 1, 'PB0402230066', 'I Made Eiji', '098221234432', 'Denpasar', 'elji@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-30', 3500000, 1500000, 2000000, NULL, 'Pekekesan; kepala ayam , kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, '2023-02-01', '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(69, 1, 'PB0402230067', 'Made Dewi Rahmini', '098123567874', 'Gianyar', 'dewi@rahmini', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-30', 1500000, 500000, 1000000, NULL, NULL, NULL, '2023-01-31', '2023-02-04 00:26:05', '2023-02-04 00:26:05'),
(70, 1, 'PB0402230068', 'Ni Komang Agustin Arya Putri', '08756612297', 'Denpasar', 'arya@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 0, '2023-01-30', 2700000, 2700000, 0, '2023-02-04', NULL, NULL, '2023-02-01', '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(71, 1, 'PB0402230069', 'I Komang Ryuga Diratama', '0876489754321', 'Badung', 'ryuga@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-31', 2300000, 1000000, 1300000, NULL, NULL, NULL, '2023-02-01', '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(72, 1, 'PB0402230070', 'IA. Gauri Padma Dewi', '087543566243', 'Gianyar', 'gauripadma@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-31', 3000000, 2000000, 1000000, NULL, NULL, NULL, '2023-02-01', '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(73, 1, 'PB0402230071', 'Kadek Wisnu Maheswara', '089765234543', 'Denpasar', 'wisnu@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-31', 1800000, 1000000, 800000, NULL, NULL, NULL, '2023-02-01', '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(74, 1, 'PB0402230072', 'Gusti Ayu Mirah Santika Dewi', '087123456765', 'Badung', 'mirah@gmail.com', 'Umum', 'Anggara', 'Pon', '2023-02-01', '10:00:00', 1, '2023-01-31', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-02-01', '2023-02-04 00:36:24', '2023-02-04 00:36:24'),
(75, 1, 'PB0402230073', 'Wayan Artha Purbawa', '089234567987', 'Kuta', 'artha@gmail.com', 'Privat', 'Soma', 'Wage', '2023-02-07', '06:00:00', 1, '2023-02-04', 5000000, 3000000, 2000000, NULL, 'Pekekesan; kepala ayam , kepala bebek, kakul, kikil, taluh bebek lebeng', NULL, NULL, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(76, 1, 'PB0402230074', 'Komang Sri Rahayu', '087523332878', 'Gianyar', 'sri@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 2000000, 1000000, 1000000, '2023-02-05', NULL, NULL, '2023-02-07', '2023-02-04 00:50:43', '2023-02-04 00:53:11'),
(77, 1, 'PB0402230075', 'Kadek Lila Dewitara', '081654234990', 'Gianyar', 'lila@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 1, '2023-02-04', 6000000, 3000000, 3000000, NULL, NULL, NULL, '2023-02-05', '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(78, 1, 'PB0402230076', 'Ni Putu Shriya Kyotika', '081890221675', 'Singapadu', 'shriya@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 4000000, 4000000, 0, '2023-02-04', NULL, NULL, '2023-02-07', '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(79, 1, 'PB0402230077', 'Kadek Senja Partaiswari', '081223908765', 'Badung', 'senja@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 5000000, 2000000, 3000000, '2023-02-06', NULL, NULL, '2023-02-05', '2023-02-04 01:01:42', '2023-02-04 01:19:20'),
(80, 1, 'PB0402230078', 'Komang Adi Saputra', '087112908765', 'Badung', 'adi@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 1, '2023-02-04', 2000000, 1000000, 1000000, NULL, NULL, NULL, '2023-02-06', '2023-02-04 01:03:08', '2023-02-04 01:03:08'),
(81, 1, 'PB0402230079', 'I Gusti Ngurah Agung Nani Pradipta', '081223654234', 'Denpasar', 'agungnani@gmail.com', 'Umum', 'Soma', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 3500000, 3000000, 500000, '2023-02-05', NULL, NULL, '2023-02-06', '2023-02-04 01:05:05', '2023-02-04 01:45:21'),
(82, 1, 'PB0402230080', 'I Made Bagus Tanaka Wicaksana', '087112098123', 'Gianyar', 'bagus@gmail.com', 'Umum', 'Anggara', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 2000000, 1000000, 1000000, '2023-02-06', NULL, NULL, '2023-02-05', '2023-02-04 01:07:07', '2023-02-04 01:45:08'),
(83, 1, 'PB0402230081', 'Komang Narotama', '081223908009', 'Gianyar', 'narotama@gmail.com', 'Umum', 'Anggara', 'Wage', '2023-02-07', '10:00:00', 1, '2023-02-04', 2000000, 500000, 1500000, NULL, NULL, NULL, '2023-02-05', '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(84, 1, 'PB0402230082', 'I Gusti Ayu Sheela Maharani Pinatih', '089665345221', 'Badung', 'sheela@gmail.com', 'Umum', 'Anggara', 'Wage', '2023-02-08', '10:00:00', 0, '2023-02-05', 5000000, 5000000, 0, '2023-02-04', NULL, NULL, '2023-02-05', '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(85, 1, 'PB0402230083', 'Ida Ayu Made Arisintya Dewi', '085738090686', 'Gianyar', 'sintya@gmail.com', 'Umum', 'Anggara', 'Wage', '2023-02-07', '10:00:00', 0, '2023-02-04', 2000000, 1000000, 1000000, '2023-02-05', 'Request meja depan kanan', NULL, '2023-02-05', '2023-02-04 05:36:03', '2023-02-04 05:50:09'),
(86, 1, 'PB0502230084', 'lll', '41231', '12312', 'a@gmail.com', 'Umum', 'Soma', 'Paing', '2023-02-05', '20:25:00', 1, '2023-02-05', 2000000, 900000, 1100000, NULL, NULL, NULL, NULL, '2023-02-05 10:27:11', '2023-02-05 10:27:11'),
(87, 1, 'PB0502230085', 'tes', '123123', '123123', 'tes@gmail.com', 'Umum', 'Soma', 'Pon', '2023-02-07', '20:36:00', 1, '2023-02-07', 2000000, 900000, 1100000, NULL, NULL, NULL, NULL, '2023-02-05 10:35:06', '2023-02-05 10:35:06'),
(88, 1, 'PB0502230086', 'tesasa', '123', '1231', 'tesasa@gmail.com', 'Umum', 'Soma', 'Paing', '2023-02-05', '19:37:00', 1, '2023-02-05', 222222, 33, 222189, NULL, NULL, NULL, NULL, '2023-02-05 10:37:35', '2023-02-05 10:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_banten`
--

CREATE TABLE `tb_transaksi_banten` (
  `id` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_banten` int NOT NULL,
  `qty` int NOT NULL,
  `banten_pulang` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_banten`
--

INSERT INTO `tb_transaksi_banten` (`id`, `id_transaksi`, `id_banten`, `qty`, `banten_pulang`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 1, 0, '2023-01-10 00:40:08', '2023-01-10 00:40:08'),
(2, 1, 32, 1, 0, '2023-01-10 00:40:08', '2023-01-10 00:40:08'),
(3, 1, 81, 1, 0, '2023-01-10 00:40:08', '2023-01-10 00:40:08'),
(4, 2, 3, 1, 1, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(5, 2, 6, 1, 1, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(6, 2, 28, 1, 1, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(7, 2, 49, 5, 1, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(8, 2, 64, 1, 0, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(9, 3, 24, 1, 0, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(10, 3, 26, 1, 1, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(11, 3, 49, 2, 1, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(12, 3, 53, 1, 0, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(13, 4, 24, 1, 0, '2023-01-10 00:49:04', '2023-01-10 00:49:04'),
(14, 4, 26, 1, 1, '2023-01-10 00:49:04', '2023-01-10 00:49:04'),
(15, 4, 49, 3, 1, '2023-01-10 00:49:04', '2023-01-10 00:49:04'),
(16, 5, 26, 1, 1, '2023-01-10 00:50:26', '2023-01-10 00:50:26'),
(17, 5, 49, 2, 1, '2023-01-10 00:50:26', '2023-01-10 00:50:26'),
(18, 6, 26, 1, 1, '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(19, 6, 32, 1, 0, '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(20, 6, 49, 2, 1, '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(21, 7, 18, 1, 0, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(22, 7, 24, 1, 0, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(23, 7, 26, 1, 1, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(24, 7, 32, 1, 0, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(25, 7, 49, 2, 1, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(26, 8, 24, 1, 0, '2023-01-10 00:55:43', '2023-01-10 00:55:43'),
(27, 8, 26, 1, 1, '2023-01-10 00:55:43', '2023-01-10 00:55:43'),
(28, 8, 49, 2, 1, '2023-01-10 00:55:43', '2023-01-10 00:55:43'),
(29, 9, 5, 1, 0, '2023-01-10 00:57:05', '2023-01-10 00:57:05'),
(30, 9, 14, 1, 0, '2023-01-10 00:57:05', '2023-01-10 00:57:05'),
(31, 9, 33, 1, 0, '2023-01-10 00:57:05', '2023-01-10 00:57:05'),
(32, 10, 18, 1, 0, '2023-01-10 00:58:24', '2023-01-10 00:58:24'),
(33, 10, 33, 1, 0, '2023-01-10 00:58:24', '2023-01-10 00:58:24'),
(34, 10, 68, 1, 0, '2023-01-10 00:58:24', '2023-01-10 00:58:24'),
(35, 11, 18, 1, 0, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(36, 11, 32, 1, 0, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(37, 11, 79, 1, 0, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(38, 11, 81, 1, 0, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(39, 12, 26, 1, 1, '2023-01-10 01:01:17', '2023-01-10 01:01:17'),
(40, 12, 49, 2, 1, '2023-01-10 01:01:17', '2023-01-10 01:01:17'),
(41, 13, 18, 1, 0, '2023-01-10 02:16:53', '2023-01-10 02:16:53'),
(42, 13, 32, 2, 0, '2023-01-10 02:16:53', '2023-01-10 02:16:53'),
(43, 13, 81, 1, 0, '2023-01-10 02:16:53', '2023-01-10 02:16:53'),
(44, 14, 1, 1, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(45, 14, 18, 1, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(46, 14, 34, 2, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(47, 14, 42, 1, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(48, 14, 64, 1, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(49, 14, 71, 1, 0, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(50, 15, 5, 1, 0, '2023-01-10 03:05:02', '2023-01-10 03:05:02'),
(51, 15, 14, 1, 0, '2023-01-10 03:05:02', '2023-01-10 03:05:02'),
(52, 16, 18, 1, 0, '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(53, 16, 49, 4, 1, '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(54, 16, 75, 1, 0, '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(55, 16, 81, 1, 0, '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(56, 17, 3, 1, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(57, 17, 6, 1, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(58, 17, 32, 2, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(59, 17, 34, 2, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(60, 17, 49, 6, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(61, 17, 57, 1, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(62, 17, 64, 1, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(63, 17, 71, 1, 0, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(64, 18, 34, 2, 0, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(65, 18, 57, 1, 0, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(66, 18, 64, 1, 0, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(67, 19, 3, 1, 1, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(68, 19, 6, 1, 1, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(69, 19, 31, 1, 0, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(70, 19, 32, 1, 0, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(71, 19, 34, 1, 0, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(72, 19, 57, 1, 0, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(73, 19, 64, 1, 0, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(74, 20, 3, 1, 1, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(75, 20, 6, 1, 1, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(76, 20, 31, 1, 0, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(77, 20, 34, 1, 0, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(78, 20, 49, 6, 1, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(79, 20, 57, 1, 0, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(80, 20, 64, 1, 0, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(81, 21, 24, 1, 0, '2023-01-10 04:30:15', '2023-01-10 04:30:15'),
(82, 21, 26, 1, 1, '2023-01-10 04:30:15', '2023-01-10 04:30:15'),
(83, 21, 49, 2, 1, '2023-01-10 04:30:15', '2023-01-10 04:30:15'),
(84, 22, 3, 1, 1, '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(85, 22, 6, 1, 1, '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(86, 22, 35, 1, 0, '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(87, 22, 42, 1, 0, '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(88, 23, 3, 1, 1, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(89, 23, 6, 1, 1, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(90, 23, 18, 1, 0, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(91, 23, 31, 1, 0, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(92, 23, 34, 1, 0, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(93, 23, 64, 1, 0, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(94, 23, 79, 1, 0, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(95, 24, 3, 1, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(96, 24, 6, 1, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(97, 24, 18, 1, 0, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(98, 24, 34, 2, 0, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(99, 24, 49, 5, 0, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(100, 24, 64, 2, 0, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(101, 24, 72, 1, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(102, 25, 3, 1, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(103, 25, 6, 1, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(104, 25, 18, 1, 0, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(105, 25, 34, 2, 0, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(106, 25, 64, 1, 0, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(107, 26, 3, 1, 1, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(108, 26, 6, 1, 1, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(109, 26, 34, 1, 0, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(110, 26, 57, 1, 0, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(111, 26, 64, 1, 0, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(112, 27, 24, 1, 0, '2023-01-10 04:40:11', '2023-01-10 04:40:11'),
(113, 27, 26, 1, 1, '2023-01-10 04:40:11', '2023-01-10 04:40:11'),
(114, 27, 49, 3, 1, '2023-01-10 04:40:11', '2023-01-10 04:40:11'),
(115, 28, 24, 1, 0, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(116, 28, 26, 1, 1, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(117, 28, 49, 2, 1, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(118, 28, 57, 1, 0, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(119, 28, 79, 1, 0, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(120, 29, 24, 1, 0, '2023-01-10 04:43:01', '2023-01-10 04:43:01'),
(121, 29, 26, 1, 1, '2023-01-10 04:43:01', '2023-01-10 04:43:01'),
(122, 29, 49, 1, 1, '2023-01-10 04:43:01', '2023-01-10 04:43:01'),
(123, 30, 24, 1, 0, '2023-01-10 04:44:16', '2023-01-10 04:44:16'),
(124, 30, 26, 1, 1, '2023-01-10 04:44:16', '2023-01-10 04:44:16'),
(125, 30, 49, 3, 1, '2023-01-10 04:44:16', '2023-01-10 04:44:16'),
(126, 31, 18, 1, 1, '2023-01-10 05:49:30', '2023-01-10 05:49:30'),
(127, 31, 32, 1, 0, '2023-01-10 05:49:30', '2023-01-10 05:49:30'),
(128, 31, 81, 1, 0, '2023-01-10 05:49:30', '2023-01-10 05:49:30'),
(129, 32, 3, 1, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(130, 32, 6, 1, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(131, 32, 18, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(132, 32, 30, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(133, 32, 32, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(134, 32, 34, 2, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(135, 32, 38, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(136, 32, 49, 5, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(137, 32, 61, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(138, 32, 64, 1, 0, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(139, 32, 72, 1, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(140, 33, 18, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(141, 33, 30, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(142, 33, 32, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(143, 33, 38, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(144, 33, 40, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(145, 33, 61, 1, 0, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(146, 34, 3, 1, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(147, 34, 6, 1, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(148, 34, 18, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(149, 34, 30, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(150, 34, 32, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(151, 34, 34, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(152, 34, 38, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(153, 34, 40, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(154, 34, 49, 4, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(155, 34, 61, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(156, 34, 64, 1, 0, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(157, 34, 72, 6, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(158, 35, 3, 1, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(159, 35, 6, 1, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(160, 35, 18, 1, 0, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(161, 35, 34, 1, 0, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(162, 35, 49, 5, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(163, 35, 64, 1, 0, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(164, 35, 72, 1, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(165, 36, 24, 1, 0, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(166, 36, 26, 1, 1, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(167, 36, 49, 2, 1, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(168, 36, 53, 1, 0, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(169, 36, 57, 1, 0, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(170, 36, 79, 1, 0, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(171, 37, 3, 1, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(172, 37, 6, 1, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(173, 37, 32, 2, 0, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(174, 37, 34, 2, 0, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(175, 37, 57, 1, 0, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(176, 37, 64, 1, 0, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(177, 37, 71, 1, 0, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(178, 38, 38, 1, 0, '2023-01-10 16:19:04', '2023-01-10 16:19:04'),
(179, 38, 40, 1, 0, '2023-01-10 16:19:04', '2023-01-10 16:19:04'),
(180, 38, 57, 1, 0, '2023-01-10 16:19:05', '2023-01-10 16:19:05'),
(181, 38, 61, 1, 0, '2023-01-10 16:19:05', '2023-01-10 16:19:05'),
(182, 39, 3, 1, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(183, 39, 6, 1, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(184, 39, 28, 1, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(185, 39, 34, 1, 0, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(186, 39, 49, 6, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(187, 39, 57, 1, 0, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(188, 39, 64, 1, 0, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(189, 40, 3, 1, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(190, 40, 6, 1, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(191, 40, 18, 1, 0, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(192, 40, 31, 1, 0, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(193, 40, 32, 1, 0, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(194, 40, 34, 2, 0, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(195, 40, 64, 1, 0, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(196, 41, 3, 1, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(197, 41, 6, 1, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(198, 41, 18, 1, 0, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(199, 41, 34, 1, 0, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(200, 41, 49, 6, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(201, 41, 64, 1, 0, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(202, 42, 3, 1, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(203, 42, 6, 1, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(204, 42, 34, 1, 0, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(205, 42, 49, 5, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(206, 42, 57, 1, 0, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(207, 42, 64, 1, 0, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(208, 42, 72, 1, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(209, 44, 1, 1, 1, '2023-01-10 16:45:22', '2023-01-10 16:45:23'),
(210, 44, 2, 1, 1, '2023-01-10 16:45:23', '2023-01-10 16:45:23'),
(211, 45, 30, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(212, 45, 32, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(213, 45, 38, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(214, 45, 40, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(215, 45, 57, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(216, 45, 61, 1, 0, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(217, 45, 72, 6, 1, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(218, 46, 3, 1, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(219, 46, 6, 1, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(220, 46, 18, 1, 0, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(221, 46, 34, 1, 0, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(222, 46, 49, 6, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(223, 46, 64, 1, 0, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(224, 47, 3, 1, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(225, 47, 6, 1, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(226, 47, 18, 1, 0, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(227, 47, 34, 2, 0, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(228, 47, 49, 5, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(229, 47, 64, 1, 0, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(230, 48, 57, 1, 0, '2023-01-12 03:36:15', '2023-01-12 03:36:15'),
(231, 48, 81, 1, 0, '2023-01-12 03:36:15', '2023-01-12 03:36:15'),
(232, 49, 24, 1, 0, '2023-01-12 03:42:40', '2023-01-12 03:42:40'),
(233, 49, 26, 1, 1, '2023-01-12 03:42:40', '2023-01-12 03:42:40'),
(234, 49, 49, 2, 1, '2023-01-12 03:42:40', '2023-01-12 03:42:40'),
(235, 50, 26, 1, 1, '2023-01-12 03:44:13', '2023-01-12 03:44:13'),
(236, 50, 49, 2, 1, '2023-01-12 03:44:13', '2023-01-12 03:44:13'),
(237, 51, 2, 1, 0, '2023-01-16 11:15:21', '2023-01-16 11:15:21'),
(238, 51, 4, 1, 1, '2023-01-16 11:15:21', '2023-01-16 11:15:21'),
(239, 52, 1, 1, 0, '2023-01-16 12:45:34', '2023-01-16 12:45:34'),
(240, 52, 2, 1, 1, '2023-01-16 12:45:34', '2023-01-16 12:45:34'),
(241, 53, 3, 1, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(242, 53, 6, 1, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(243, 53, 34, 2, 0, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(244, 53, 57, 1, 0, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(245, 53, 64, 1, 0, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(246, 53, 71, 1, 0, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(247, 54, 3, 1, 1, '2023-01-19 00:30:29', '2023-01-19 00:30:30'),
(248, 54, 6, 1, 1, '2023-01-19 00:30:29', '2023-01-19 00:30:30'),
(249, 54, 34, 2, 0, '2023-01-19 00:30:29', '2023-01-19 00:30:29'),
(250, 54, 57, 1, 0, '2023-01-19 00:30:29', '2023-01-19 00:30:29'),
(251, 54, 64, 1, 0, '2023-01-19 00:30:29', '2023-01-19 00:30:29'),
(252, 55, 24, 1, 0, '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(253, 55, 26, 1, 1, '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(254, 55, 49, 2, 1, '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(255, 56, 26, 1, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(256, 56, 34, 2, 0, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(257, 56, 49, 2, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(258, 56, 57, 1, 0, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(259, 56, 64, 1, 0, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(260, 56, 71, 1, 0, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(261, 57, 3, 1, 1, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(262, 57, 6, 1, 1, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(263, 57, 18, 1, 0, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(264, 57, 34, 2, 0, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(265, 57, 49, 3, 1, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(266, 57, 64, 1, 0, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(267, 58, 3, 1, 1, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(268, 58, 6, 2, 1, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(269, 58, 34, 2, 0, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(270, 58, 57, 1, 0, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(271, 58, 64, 1, 0, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(272, 59, 24, 1, 0, '2023-01-19 00:54:18', '2023-01-19 00:54:18'),
(273, 59, 26, 1, 1, '2023-01-19 00:54:18', '2023-01-19 00:54:18'),
(274, 59, 49, 2, 1, '2023-01-19 00:54:18', '2023-01-19 00:54:18'),
(275, 60, 3, 1, 1, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(276, 60, 6, 1, 1, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(277, 60, 18, 1, 0, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(278, 60, 34, 1, 0, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(279, 60, 49, 5, 1, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(280, 60, 64, 1, 0, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(281, 60, 72, 1, 1, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(282, 61, 3, 1, 1, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(283, 61, 6, 1, 1, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(284, 61, 18, 1, 0, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(285, 61, 34, 1, 0, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(286, 61, 49, 5, 1, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(287, 61, 64, 1, 0, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(288, 62, 26, 1, 1, '2023-01-19 00:59:20', '2023-01-19 00:59:20'),
(289, 62, 49, 5, 1, '2023-01-19 00:59:20', '2023-01-19 00:59:20'),
(290, 62, 64, 1, 0, '2023-01-19 00:59:20', '2023-01-19 00:59:20'),
(291, 63, 24, 1, 0, '2023-01-19 01:01:02', '2023-01-19 01:01:02'),
(292, 63, 26, 1, 1, '2023-01-19 01:01:02', '2023-01-19 01:01:02'),
(293, 63, 49, 5, 1, '2023-01-19 01:01:02', '2023-01-19 01:01:02'),
(294, 64, 64, 2, 0, '2023-01-19 01:03:07', '2023-01-19 01:03:07'),
(295, 65, 1, 1, 0, '2023-01-26 07:41:21', '2023-01-26 07:41:21'),
(296, 65, 2, 1, 1, '2023-01-26 07:41:21', '2023-01-26 07:41:21'),
(297, 66, 1, 1, 0, '2023-01-26 07:52:05', '2023-01-26 07:52:05'),
(298, 67, 3, 1, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(299, 67, 6, 1, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(300, 67, 32, 2, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(301, 67, 34, 2, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(302, 67, 57, 2, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(303, 67, 64, 1, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(304, 67, 71, 1, 0, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(305, 68, 3, 1, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(306, 68, 6, 1, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(307, 68, 18, 1, 0, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(308, 68, 34, 2, 0, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(309, 68, 64, 1, 0, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(310, 69, 26, 1, 1, '2023-02-04 00:26:05', '2023-02-04 00:26:05'),
(311, 69, 49, 2, 1, '2023-02-04 00:26:05', '2023-02-04 00:26:05'),
(312, 69, 64, 1, 0, '2023-02-04 00:26:05', '2023-02-04 00:26:05'),
(313, 70, 18, 1, 0, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(314, 70, 24, 1, 0, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(315, 70, 26, 1, 1, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(316, 70, 49, 2, 1, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(317, 71, 3, 1, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(318, 71, 6, 1, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(319, 71, 18, 2, 0, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(320, 71, 34, 1, 0, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(321, 71, 64, 1, 0, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(322, 71, 71, 1, 0, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(323, 72, 3, 1, 1, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(324, 72, 6, 1, 1, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(325, 72, 18, 1, 0, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(326, 72, 32, 1, 0, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(327, 72, 34, 1, 0, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(328, 72, 49, 3, 1, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(329, 72, 64, 1, 0, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(330, 73, 3, 1, 1, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(331, 73, 6, 1, 1, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(332, 73, 18, 1, 0, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(333, 73, 32, 1, 0, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(334, 73, 34, 1, 0, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(335, 73, 64, 1, 0, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(336, 74, 24, 1, 0, '2023-02-04 00:36:24', '2023-02-04 00:36:24'),
(337, 74, 26, 1, 1, '2023-02-04 00:36:24', '2023-02-04 00:36:24'),
(338, 74, 49, 2, 1, '2023-02-04 00:36:24', '2023-02-04 00:36:24'),
(339, 75, 1, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(340, 75, 34, 2, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(341, 75, 38, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(342, 75, 42, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(343, 75, 57, 2, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(344, 75, 61, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(345, 75, 64, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(346, 75, 71, 1, 0, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(347, 76, 3, 1, 1, '2023-02-04 00:50:43', '2023-02-04 00:50:43'),
(348, 76, 6, 1, 1, '2023-02-04 00:50:43', '2023-02-04 00:50:43'),
(349, 76, 34, 2, 0, '2023-02-04 00:50:43', '2023-02-04 00:50:43'),
(350, 76, 64, 1, 0, '2023-02-04 00:50:43', '2023-02-04 00:50:43'),
(351, 77, 3, 1, 1, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(352, 77, 6, 1, 1, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(353, 77, 34, 1, 0, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(354, 77, 49, 9, 1, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(355, 77, 57, 1, 0, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(356, 77, 64, 1, 0, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(357, 78, 3, 1, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(358, 78, 6, 1, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(359, 78, 26, 1, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(360, 78, 31, 1, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(361, 78, 32, 1, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(362, 78, 34, 1, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(363, 78, 49, 6, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(364, 78, 57, 1, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(365, 78, 64, 1, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(366, 78, 72, 6, 0, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(367, 79, 1, 1, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(368, 79, 3, 1, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(369, 79, 6, 1, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(370, 79, 18, 1, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(371, 79, 31, 1, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(372, 79, 32, 1, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(373, 79, 34, 2, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(374, 79, 49, 5, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(375, 79, 64, 1, 0, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(376, 79, 72, 1, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(377, 80, 24, 1, 0, '2023-02-04 01:03:08', '2023-02-04 01:03:08'),
(378, 80, 26, 1, 1, '2023-02-04 01:03:08', '2023-02-04 01:03:08'),
(379, 80, 49, 2, 1, '2023-02-04 01:03:08', '2023-02-04 01:03:08'),
(380, 81, 3, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(381, 81, 6, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(382, 81, 18, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(383, 81, 31, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(384, 81, 32, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(385, 81, 34, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(386, 81, 49, 5, 1, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(387, 81, 64, 1, 0, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(388, 81, 72, 1, 1, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(389, 82, 3, 1, 1, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(390, 82, 6, 1, 1, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(391, 82, 28, 1, 1, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(392, 82, 32, 1, 0, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(393, 82, 34, 1, 0, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(394, 82, 47, 1, 0, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(395, 82, 57, 1, 0, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(396, 82, 64, 1, 0, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(397, 83, 3, 1, 1, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(398, 83, 6, 1, 1, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(399, 83, 28, 2, 1, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(400, 83, 47, 1, 0, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(401, 83, 49, 1, 1, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(402, 83, 64, 1, 0, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(403, 84, 3, 1, 1, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(404, 84, 6, 1, 1, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(405, 84, 18, 1, 0, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(406, 84, 32, 1, 0, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(407, 84, 34, 1, 0, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(408, 84, 49, 5, 1, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(409, 84, 64, 1, 0, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(410, 84, 72, 1, 1, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(411, 85, 6, 2, 1, '2023-02-04 05:36:03', '2023-02-04 05:36:03'),
(412, 85, 63, 1, 0, '2023-02-04 05:36:03', '2023-02-04 05:36:03'),
(413, 86, 1, 1, 0, '2023-02-05 10:27:11', '2023-02-05 10:27:11'),
(414, 87, 1, 1, 0, '2023-02-05 10:35:06', '2023-02-05 10:35:06'),
(415, 88, 86, 1, 0, '2023-02-05 10:37:35', '2023-02-05 10:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_upacara`
--

CREATE TABLE `tb_transaksi_upacara` (
  `id` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_upacara` int NOT NULL,
  `qty_upacara` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_upacara`
--

INSERT INTO `tb_transaksi_upacara` (`id`, `id_transaksi`, `id_upacara`, `qty_upacara`, `created_at`, `updated_at`) VALUES
(1, 1, 53, 1, '2023-01-10 00:40:08', '2023-01-10 00:40:08'),
(2, 2, 1, 1, '2023-01-10 00:43:42', '2023-01-10 00:43:42'),
(3, 3, 43, 1, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(4, 3, 46, 1, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(5, 3, 47, 1, '2023-01-10 00:45:26', '2023-01-10 00:45:26'),
(6, 4, 43, 1, '2023-01-10 00:49:04', '2023-01-10 00:49:04'),
(7, 5, 43, 1, '2023-01-10 00:50:26', '2023-01-10 00:50:26'),
(8, 6, 43, 1, '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(9, 6, 46, 1, '2023-01-10 00:52:11', '2023-01-10 00:52:11'),
(10, 7, 43, 1, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(11, 7, 46, 1, '2023-01-10 00:53:58', '2023-01-10 00:53:58'),
(12, 8, 43, 1, '2023-01-10 00:55:43', '2023-01-10 00:55:43'),
(13, 9, 22, 16, '2023-01-10 00:57:05', '2023-01-10 00:57:05'),
(14, 10, 18, 2, '2023-01-10 00:58:24', '2023-01-10 00:58:24'),
(15, 11, 42, 1, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(16, 11, 53, 1, '2023-01-10 01:00:01', '2023-01-10 01:00:01'),
(17, 12, 43, 1, '2023-01-10 01:01:17', '2023-01-10 01:01:17'),
(18, 13, 53, 1, '2023-01-10 02:16:53', '2023-01-10 02:16:53'),
(19, 14, 4, 1, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(20, 14, 5, 1, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(21, 14, 6, 1, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(22, 14, 7, 1, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(23, 14, 8, 1, '2023-01-10 02:48:57', '2023-01-10 02:48:57'),
(24, 15, 22, 1, '2023-01-10 03:05:02', '2023-01-10 03:05:02'),
(25, 16, 53, 1, '2023-01-10 04:07:53', '2023-01-10 04:07:53'),
(26, 17, 4, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(27, 17, 5, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(28, 17, 6, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(29, 17, 7, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(30, 17, 8, 1, '2023-01-10 04:10:24', '2023-01-10 04:10:24'),
(31, 18, 4, 1, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(32, 18, 5, 1, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(33, 18, 6, 1, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(34, 18, 7, 1, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(35, 18, 8, 1, '2023-01-10 04:11:57', '2023-01-10 04:11:57'),
(36, 19, 8, 1, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(37, 19, 26, 1, '2023-01-10 04:20:24', '2023-01-10 04:20:24'),
(38, 20, 8, 1, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(39, 20, 26, 1, '2023-01-10 04:28:53', '2023-01-10 04:28:53'),
(40, 21, 43, 1, '2023-01-10 04:30:15', '2023-01-10 04:30:15'),
(41, 22, 1, 1, '2023-01-10 04:32:23', '2023-01-10 04:32:23'),
(42, 23, 8, 1, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(43, 23, 28, 1, '2023-01-10 04:34:16', '2023-01-10 04:34:16'),
(44, 24, 4, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(45, 24, 5, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(46, 24, 6, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(47, 24, 7, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(48, 24, 8, 1, '2023-01-10 04:35:46', '2023-01-10 04:35:46'),
(49, 25, 5, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(50, 25, 6, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(51, 25, 8, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(52, 25, 26, 1, '2023-01-10 04:37:21', '2023-01-10 04:37:21'),
(53, 26, 8, 1, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(54, 26, 26, 1, '2023-01-10 04:38:52', '2023-01-10 04:38:52'),
(55, 27, 43, 1, '2023-01-10 04:40:11', '2023-01-10 04:40:11'),
(56, 28, 43, 1, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(57, 28, 46, 1, '2023-01-10 04:41:51', '2023-01-10 04:41:51'),
(58, 29, 43, 1, '2023-01-10 04:43:01', '2023-01-10 04:43:01'),
(59, 30, 43, 1, '2023-01-10 04:44:16', '2023-01-10 04:44:16'),
(60, 31, 53, 1, '2023-01-10 05:49:30', '2023-01-10 05:49:30'),
(61, 32, 4, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(62, 32, 5, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(63, 32, 6, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(64, 32, 7, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(65, 32, 8, 1, '2023-01-10 15:47:20', '2023-01-10 15:47:20'),
(66, 33, 23, 3, '2023-01-10 15:50:24', '2023-01-10 15:50:24'),
(67, 34, 4, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(68, 34, 5, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(69, 34, 6, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(70, 34, 7, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(71, 34, 8, 1, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(72, 34, 23, 4, '2023-01-10 15:54:38', '2023-01-10 15:54:38'),
(73, 35, 8, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(74, 35, 26, 1, '2023-01-10 15:58:06', '2023-01-10 15:58:06'),
(75, 36, 43, 1, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(76, 36, 45, 1, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(77, 36, 46, 1, '2023-01-10 16:02:43', '2023-01-10 16:02:43'),
(78, 37, 4, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(79, 37, 5, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(80, 37, 6, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(81, 37, 7, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(82, 37, 8, 1, '2023-01-10 16:07:54', '2023-01-10 16:07:54'),
(83, 38, 23, 6, '2023-01-10 16:19:05', '2023-01-10 16:19:05'),
(84, 39, 1, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(85, 39, 28, 1, '2023-01-10 16:25:26', '2023-01-10 16:25:26'),
(86, 40, 4, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(87, 40, 5, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(88, 40, 6, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(89, 40, 7, 1, '2023-01-10 16:30:13', '2023-01-10 16:30:13'),
(90, 41, 7, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(91, 41, 8, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(92, 41, 26, 1, '2023-01-10 16:33:31', '2023-01-10 16:33:31'),
(93, 42, 5, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(94, 42, 8, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(95, 42, 26, 1, '2023-01-10 16:38:05', '2023-01-10 16:38:05'),
(96, 44, 43, 1, '2023-01-10 16:45:23', '2023-01-10 16:45:23'),
(97, 45, 23, 1, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(98, 45, 72, 1, '2023-01-11 02:08:34', '2023-01-11 02:08:34'),
(99, 46, 4, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(100, 46, 5, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(101, 46, 6, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(102, 46, 7, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(103, 46, 8, 1, '2023-01-12 03:24:02', '2023-01-12 03:24:02'),
(104, 47, 1, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(105, 47, 4, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(106, 47, 5, 1, '2023-01-12 03:28:14', '2023-01-12 03:28:14'),
(107, 48, 53, 1, '2023-01-12 03:36:15', '2023-01-12 03:36:15'),
(108, 49, 43, 1, '2023-01-12 03:42:40', '2023-01-12 03:42:40'),
(109, 50, 43, 1, '2023-01-12 03:44:13', '2023-01-12 03:44:13'),
(110, 51, 8, 1, '2023-01-16 11:15:21', '2023-01-16 11:15:21'),
(111, 51, 9, 1, '2023-01-16 11:15:21', '2023-01-16 11:15:21'),
(112, 52, 1, 1, '2023-01-16 12:45:34', '2023-01-16 12:45:34'),
(113, 53, 4, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(114, 53, 5, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(115, 53, 6, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(116, 53, 7, 1, '2023-01-19 00:23:19', '2023-01-19 00:23:19'),
(117, 54, 4, 1, '2023-01-19 00:30:29', '2023-01-19 00:30:29'),
(118, 54, 5, 1, '2023-01-19 00:30:30', '2023-01-19 00:30:30'),
(119, 54, 6, 1, '2023-01-19 00:30:30', '2023-01-19 00:30:30'),
(120, 54, 7, 1, '2023-01-19 00:30:30', '2023-01-19 00:30:30'),
(121, 55, 46, 1, '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(122, 55, 49, 1, '2023-01-19 00:36:10', '2023-01-19 00:36:10'),
(123, 56, 4, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(124, 56, 5, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(125, 56, 6, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(126, 56, 7, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(127, 56, 8, 1, '2023-01-19 00:43:11', '2023-01-19 00:43:11'),
(128, 57, 28, 1, '2023-01-19 00:51:26', '2023-01-19 00:51:26'),
(129, 58, 28, 1, '2023-01-19 00:53:04', '2023-01-19 00:53:04'),
(130, 59, 49, 1, '2023-01-19 00:54:18', '2023-01-19 00:54:18'),
(131, 60, 26, 1, '2023-01-19 00:56:24', '2023-01-19 00:56:24'),
(132, 61, 8, 1, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(133, 61, 26, 1, '2023-01-19 00:58:02', '2023-01-19 00:58:02'),
(134, 62, 1, 1, '2023-01-19 00:59:20', '2023-01-19 00:59:20'),
(135, 63, 49, 1, '2023-01-19 01:01:02', '2023-01-19 01:01:02'),
(136, 64, 7, 2, '2023-01-19 01:03:08', '2023-01-19 01:03:08'),
(137, 65, 1, 1, '2023-01-26 07:41:21', '2023-01-26 07:41:21'),
(138, 66, 71, 1, '2023-01-26 07:52:05', '2023-01-26 07:52:05'),
(139, 67, 4, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(140, 67, 5, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(141, 67, 6, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(142, 67, 7, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(143, 67, 8, 1, '2023-02-04 00:21:37', '2023-02-04 00:21:37'),
(144, 68, 4, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(145, 68, 5, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(146, 68, 6, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(147, 68, 7, 1, '2023-02-04 00:24:07', '2023-02-04 00:24:07'),
(148, 69, 43, 1, '2023-02-04 00:26:05', '2023-02-04 00:26:05'),
(149, 70, 43, 1, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(150, 70, 46, 1, '2023-02-04 00:29:43', '2023-02-04 00:29:43'),
(151, 71, 4, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(152, 71, 5, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(153, 71, 6, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(154, 71, 7, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(155, 71, 8, 1, '2023-02-04 00:31:36', '2023-02-04 00:31:36'),
(156, 72, 28, 1, '2023-02-04 00:33:15', '2023-02-04 00:33:15'),
(157, 73, 28, 1, '2023-02-04 00:35:02', '2023-02-04 00:35:02'),
(158, 74, 43, 1, '2023-02-04 00:36:24', '2023-02-04 00:36:24'),
(159, 75, 4, 1, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(160, 75, 5, 1, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(161, 75, 6, 1, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(162, 75, 7, 1, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(163, 75, 8, 2, '2023-02-04 00:43:55', '2023-02-04 00:43:55'),
(164, 76, 1, 1, '2023-02-04 00:50:43', '2023-02-04 00:50:43'),
(165, 77, 28, 1, '2023-02-04 00:52:57', '2023-02-04 00:52:57'),
(166, 78, 1, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(167, 78, 8, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(168, 78, 28, 1, '2023-02-04 00:58:05', '2023-02-04 00:58:05'),
(169, 79, 4, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(170, 79, 5, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(171, 79, 6, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(172, 79, 7, 1, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(173, 79, 8, 2, '2023-02-04 01:01:42', '2023-02-04 01:01:42'),
(174, 80, 43, 1, '2023-02-04 01:03:08', '2023-02-04 01:03:08'),
(175, 81, 8, 1, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(176, 81, 28, 1, '2023-02-04 01:05:05', '2023-02-04 01:05:05'),
(177, 82, 1, 1, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(178, 82, 28, 1, '2023-02-04 01:07:07', '2023-02-04 01:07:07'),
(179, 83, 1, 1, '2023-02-04 01:08:45', '2023-02-04 01:08:45'),
(180, 84, 8, 4, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(181, 84, 28, 1, '2023-02-04 01:12:02', '2023-02-04 01:12:02'),
(182, 85, 1, 1, '2023-02-04 05:36:03', '2023-02-04 05:36:03'),
(183, 86, 1, 2, '2023-02-05 10:27:11', '2023-02-05 10:27:11'),
(184, 87, 1, 3, '2023-02-05 10:35:06', '2023-02-05 10:35:06'),
(185, 88, 1, 3, '2023-02-05 10:37:35', '2023-02-05 10:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upacara`
--

CREATE TABLE `tb_upacara` (
  `id` int NOT NULL,
  `id_jenis_upacara` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_upacara` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_upacara`
--

INSERT INTO `tb_upacara` (`id`, `id_jenis_upacara`, `id_user`, `nama_upacara`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bayuh Rare', 1, '2022-11-12 07:03:27', '2022-12-25 03:33:27'),
(2, 1, 1, 'Bayuh Rare Pakoleman', 1, '2022-11-12 07:03:27', '2022-12-25 03:33:27'),
(3, 1, 1, 'Bayuh Rare Soroan Bangkit', 0, '2022-11-12 07:03:27', '2023-02-04 05:20:54'),
(4, 2, 1, 'Tiga Bulanan', 0, '2022-11-12 07:04:24', '2023-02-04 05:21:57'),
(5, 2, 1, 'Pekakulan', 1, '2022-11-12 07:04:24', '2023-02-04 05:20:26'),
(6, 2, 1, 'Ngileh Lesung', 1, '2022-11-12 07:04:24', '2023-02-04 05:21:50'),
(7, 2, 1, 'Tuun Tanah', 0, '2022-11-13 07:55:14', '2023-02-04 05:20:43'),
(8, 2, 1, 'Petik Rambut', 0, '2022-11-13 07:55:14', '2023-02-04 05:20:40'),
(9, 2, 1, 'Busung Biu', 0, '2022-11-12 07:06:00', '2023-02-04 05:20:39'),
(10, 2, 1, 'Lepas AON', 0, '2022-11-12 07:06:00', '2023-02-04 05:20:38'),
(11, 2, 1, 'Ngempungan', 0, '2022-11-12 07:06:00', '2023-02-04 05:20:37'),
(12, 3, 1, 'Pawiwahan Beten', 1, '2022-11-13 07:56:46', '2023-02-04 05:24:28'),
(13, 3, 1, 'Pawiwahan Duur', 1, '2022-11-13 07:56:46', '2023-02-04 05:24:28'),
(14, 3, 1, 'Pawiwahan Beten Duur', 1, '2022-11-12 07:08:04', '2023-02-04 05:24:28'),
(15, 3, 1, 'Pawiwahan Tingkat Bangkit', 1, '2022-11-12 07:08:04', '2023-02-04 05:24:28'),
(16, 3, 1, 'Pawiwahan Tingkat Pekoleman', 1, '2022-11-12 07:08:04', '2023-02-04 05:24:28'),
(17, 4, 1, 'Mawinten Gana', 1, '2022-11-12 07:08:04', '2023-02-04 05:24:26'),
(18, 4, 1, 'Mawinten Sari', 1, '2022-11-13 07:59:23', '2023-02-04 05:24:26'),
(19, 4, 1, 'Mawinten Mapakolem', 1, '2022-11-13 07:59:23', '2023-02-04 05:24:26'),
(20, 4, 1, 'Mawinten Mapedembel', 1, '2022-11-13 07:59:23', '2023-02-04 05:24:26'),
(21, 4, 1, 'Pawintenan Dalang', 1, '2022-11-12 07:10:09', '2023-02-04 05:24:26'),
(22, 4, 1, 'Mawinten Saraswati', 1, '2022-11-12 07:10:09', '2023-02-04 05:24:26'),
(23, 5, 1, 'Metatah', 1, '2022-11-12 07:10:09', '2023-02-04 05:24:25'),
(24, 5, 1, 'Metatah Bangkit', 1, '2022-11-12 07:10:09', '2023-02-04 05:24:25'),
(25, 5, 1, 'Metatah Mapekolem', 1, '2022-11-12 07:11:29', '2023-02-04 05:24:25'),
(26, 6, 1, '1 Oton', 1, '2022-11-13 08:00:29', '2023-02-04 05:24:30'),
(27, 6, 1, '2 Oton', 1, '2022-11-12 07:12:24', '2023-02-04 05:24:30'),
(28, 6, 1, '3 Oton', 1, '2022-11-12 07:12:24', '2023-02-04 05:24:30'),
(36, 6, 1, '4 Oton', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(37, 6, 1, '5 Oton', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(38, 6, 1, '6 Oton', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(39, 6, 1, 'Oton Gede', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(40, 6, 1, 'Natab Sambutan', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(41, 6, 1, 'Otonan', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(42, 6, 1, 'Natab Tebasan Oton', 1, '2022-11-22 04:02:46', '2023-02-04 05:24:30'),
(43, 7, 1, 'Bayuh Oton', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:35'),
(44, 7, 1, 'Sananempeg', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(45, 7, 1, 'Ngaturang Melik', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(46, 7, 1, 'Menek Kelih', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(47, 7, 1, 'Ngingkup', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(48, 7, 1, 'Sapuhleger', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(49, 7, 1, 'Bayuh Oton', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(50, 7, 1, 'Patemuan', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(51, 7, 1, 'Mapag', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(52, 7, 1, 'Wayang Lemah', 1, '2022-11-22 04:06:55', '2023-02-04 05:24:36'),
(53, 8, 1, 'Magedong - gedongan', 1, '2022-11-22 04:09:25', '2023-02-04 05:24:37'),
(54, 9, 1, 'Nutug Kambuhan', 1, '2022-11-22 04:09:25', '2023-02-04 05:24:34'),
(55, 10, 1, 'Sudiwidani', 1, '2022-11-22 04:09:25', '2023-02-04 05:24:42'),
(56, 11, 1, 'Meras Nak Alit', 1, '2022-11-22 04:09:25', '2023-02-04 05:24:40'),
(57, 12, 1, 'Ngulapin Kendaraan', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:23'),
(58, 12, 1, 'Nunas Pasupati', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:22'),
(59, 12, 1, 'Melukat', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:21'),
(60, 12, 1, 'Masesangi', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:20'),
(61, 12, 1, 'Gong Lan Penabuh', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:19'),
(62, 12, 1, 'Mlaspas Wayang', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:18'),
(63, 12, 1, 'Nunas Banten Suci', 0, '2022-11-22 04:14:36', '2022-12-20 02:24:16'),
(64, 12, 1, 'Nunas Banten Ngele', 0, '2022-11-22 04:14:36', '2022-12-20 02:23:04'),
(65, 12, 1, 'Nangkid', 0, '2022-11-22 04:14:36', '2023-01-16 14:04:51'),
(66, 13, 1, 'bebas2', 0, '2022-11-26 09:06:20', '2022-12-20 02:23:00'),
(67, 1, 1, 'bayuh rare baru', 0, '2022-12-20 02:26:55', '2023-01-11 02:06:40'),
(68, 2, 1, 'tes tiga bulanan', 0, '2022-12-25 03:32:31', '2023-02-04 05:20:35'),
(69, 1, 1, 'baru bayuh rare', 0, '2022-12-28 06:17:12', '2023-01-11 02:06:38'),
(70, 14, 1, 'tes baru', 0, '2022-12-28 06:37:02', '2023-01-11 02:06:11'),
(71, 7, 1, 'upacara baru', 1, '2022-12-28 06:38:09', '2023-02-04 05:24:36'),
(72, 5, 1, 'Ngekeb', 1, '2023-01-11 02:05:39', '2023-02-04 05:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sintya', '$2y$10$jM0Q/kLtL2LvYFb/PTRsTOmuhRNkQ0MeYjbwBYcTQ1MEYzRCLgLWq', 'sintya@gmail.com', '2022-11-17 10:27:40', '2023-02-05 10:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banten`
--
ALTER TABLE `tb_banten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_upacara`
--
ALTER TABLE `tb_jenis_upacara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi_banten`
--
ALTER TABLE `tb_transaksi_banten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi_upacara`
--
ALTER TABLE `tb_transaksi_upacara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_upacara`
--
ALTER TABLE `tb_upacara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_upacaras_ibfk_1` (`id_jenis_upacara`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banten`
--
ALTER TABLE `tb_banten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_upacara`
--
ALTER TABLE `tb_jenis_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_transaksi_banten`
--
ALTER TABLE `tb_transaksi_banten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `tb_transaksi_upacara`
--
ALTER TABLE `tb_transaksi_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tb_upacara`
--
ALTER TABLE `tb_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
