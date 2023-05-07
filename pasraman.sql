-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 06:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.5

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
(1, 1, 'Ayam Colong Luh Muani', 1, '2022-11-18 12:02:38', '2022-12-14 06:13:41'),
(2, 1, 'Bangkit Bebek', 1, '2022-11-18 12:02:38', '2022-12-14 06:13:41'),
(3, 1, 'Banten Ari - ari', 1, '2022-11-18 12:02:38', '2022-12-14 06:13:41'),
(4, 1, 'Banten Gedong - gedongan', 1, '2022-11-18 12:02:38', '2022-12-14 06:13:41'),
(5, 1, 'Banten Kalahyang', 1, '2022-11-18 12:02:38', '2022-11-29 04:01:07'),
(6, 1, 'Banten Kumara', 1, '2022-11-18 12:02:38', '2022-12-12 06:20:27'),
(7, 1, 'Banten Ngangkid', 1, '2022-11-18 12:02:38', '2022-11-25 11:56:04'),
(8, 1, 'Banten Ngilehin Lesung', 1, '2022-11-18 12:02:38', '2022-11-28 23:57:04'),
(9, 1, 'Banten Nutug Kambuhan', 1, '2022-11-18 12:02:38', '2022-11-29 04:20:40'),
(10, 1, 'Banten Paingkupan', 1, '2022-11-18 12:02:38', '2022-11-25 11:48:25'),
(11, 1, 'Banten Patemuan Ring Sumur', 1, '2022-11-18 12:02:38', '2022-11-24 07:30:01'),
(12, 1, 'Banten Pawintenan', 1, '2022-11-18 12:02:38', '2022-11-22 07:55:58'),
(13, 1, 'Banten Pawintenan Mesurat Gana', 1, '2022-11-18 12:02:38', '2022-11-22 07:55:58'),
(14, 1, 'Banten Pawintenan Saraswati', 1, '2022-11-18 12:02:38', '2022-11-29 00:25:43'),
(15, 1, 'Banten Pedambel', 1, '2022-11-18 12:02:38', '2022-11-28 23:55:22'),
(16, 1, 'Banten Pemegat Sesangi', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(17, 1, 'Banten Pemerasan Jangkep', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(18, 1, 'Banten Pemereman', 1, '2022-11-18 12:02:38', '2022-12-12 06:43:06'),
(19, 1, 'Banten Penunas Tirta', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(20, 1, 'Banten Sesangi', 1, '2022-11-18 12:02:38', '2022-11-19 12:14:36'),
(21, 1, 'Banten Soroan Bangkit', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(22, 1, 'Banten Wayang', 1, '2022-11-18 12:06:56', '2022-11-29 00:25:45'),
(23, 1, 'Bayuan', 1, '2022-11-18 12:06:56', '2022-11-28 23:55:25'),
(24, 1, 'Bayuh Oton', 1, '2022-11-18 12:06:56', '2022-11-27 12:05:52'),
(25, 1, 'Bebek Idup', 1, '2022-11-18 12:06:56', '2022-11-28 23:57:06'),
(26, 1, 'Cecaron Oton', 1, '2022-11-18 12:06:56', '2022-11-27 12:05:52'),
(27, 1, 'Cecaron Patemuan', 1, '2022-11-18 12:06:56', '2022-11-20 12:25:39'),
(28, 1, 'Cecaron Rare', 1, '2022-11-18 12:06:56', '2022-11-21 11:19:22'),
(29, 1, 'Guling Bawi Bawa Sendiri', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(30, 1, 'Guling Bawi Karangasem', 1, '2022-11-18 12:06:56', '2022-11-27 11:28:23'),
(31, 1, 'Guling Bawi Monjonk', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(32, 1, 'Guling Bebek', 1, '2022-11-18 12:06:56', '2022-11-28 23:55:28'),
(33, 1, 'Guling Bebek Putih', 1, '2022-11-18 12:06:56', '2022-11-29 00:25:46'),
(34, 1, 'Janganan', 1, '2022-11-18 12:06:56', '2022-12-12 07:03:46'),
(35, 1, 'Janganan Belog', 1, '2022-11-18 12:06:56', '2022-11-20 12:25:39'),
(36, 1, 'Jrimpen', 1, '2022-11-18 12:06:56', '2022-11-30 03:56:19'),
(37, 1, 'Lelasan Idup', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(38, 1, 'Manisan', 1, '2022-11-18 12:06:56', '2022-12-12 07:03:46'),
(39, 1, 'Megat Benang', 1, '2022-11-18 12:06:56', '2022-11-19 12:14:36'),
(40, 1, 'Pageh Tuwuh', 1, '2022-11-18 12:06:56', '2022-12-12 07:03:46'),
(41, 1, 'Pakekesan', 1, '2022-11-18 12:14:50', '2022-11-27 11:50:50'),
(42, 1, 'Papah, Layangan, Pemali', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(43, 1, 'Payuk Pebayuhan Manut Wewaran', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(44, 1, 'Payuk Pebayuhan Ring Ajeng Gedong', 1, '2022-11-18 12:14:50', '2022-11-29 00:25:48'),
(45, 1, 'Payuk Pebayuhan Ring Jaba Griya', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(46, 1, 'Payuk Pebayuhan Ring Jaba Merajan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(47, 1, 'Pebayuh Rare Manut Pancawara', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(48, 1, 'Pebayuh Weton', 1, '2022-11-18 12:14:50', '2022-11-27 14:19:23'),
(49, 1, 'Pejati Alit (Peras Daksina)', 1, '2022-11-18 12:14:50', '2022-12-12 06:20:27'),
(50, 1, 'Pejati Suci', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(51, 1, 'Pejati Suci Putih', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(52, 1, 'Pejati Taluh Bebek', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(53, 1, 'Pejati Tipat Kelanan', 1, '2022-11-18 12:14:50', '2022-11-27 12:00:03'),
(54, 1, 'Pejati Upasaksi', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(55, 1, 'Pekakulan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(56, 1, 'Pekoleman Munggah Kelih', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(57, 1, 'Pemereman', 1, '2022-11-18 12:14:50', '2022-11-27 11:54:11'),
(58, 1, 'Pengulapan', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(59, 1, 'Pesosolan Ayam', 1, '2022-11-18 12:14:50', '2022-11-19 12:14:36'),
(60, 1, 'Prascita', 1, '2022-11-18 12:14:50', '2022-11-20 13:08:33'),
(61, 1, 'Pregembal Gede', 1, '2022-11-18 12:14:50', '2022-12-12 07:03:46'),
(62, 1, 'Rajah Semara Ratih', 1, '2022-11-22 04:43:48', '2022-11-22 04:43:48'),
(63, 1, 'Rantasan Putih Kuning', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(64, 1, 'Sambutan', 1, '2022-11-22 05:17:53', '2022-12-12 07:03:46'),
(65, 1, 'Santun Sokan Manut Pancawara', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(66, 1, 'Sayut Agung', 1, '2022-11-22 05:17:53', '2022-12-12 06:43:06'),
(67, 1, 'Sayut Pengambian', 1, '2022-11-22 05:17:53', '2022-11-27 14:19:23'),
(68, 1, 'Selempod Benang Putih', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(69, 1, 'Sesayut Sudhi Widani', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(70, 1, 'Soroan Bangkit', 1, '2022-11-22 05:17:53', '2022-12-12 06:43:06'),
(71, 1, 'Soroan Punggel', 1, '2022-11-22 05:17:53', '2022-11-27 14:19:23'),
(72, 1, 'Suci', 1, '2022-11-22 05:17:53', '2022-12-12 06:43:06'),
(73, 1, 'Tataban Munggah Kelih', 1, '2022-11-22 05:17:53', '2022-12-12 07:03:46'),
(74, 1, 'Tataban Ngekep', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(75, 1, 'Tataban Oton', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(76, 1, 'Tataban Rare', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(77, 1, 'Tataban Sapuhleger', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(78, 1, 'Tataban Weton Manut Wewaran', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(79, 1, 'Tebasan', 1, '2022-11-22 05:17:53', '2022-11-27 10:56:47'),
(80, 1, 'Tebasan 5', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(81, 1, 'Tebasan Magedong Gedongan', 1, '2022-11-22 05:17:53', '2022-11-22 05:17:53'),
(82, 1, 'Tebasan Pasupati', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(83, 1, 'Teteg Pregembal', 1, '2022-11-22 05:21:33', '2022-11-29 04:01:26'),
(84, 1, 'Tirta Empul', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(85, 1, 'Tirta Segara', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(86, 1, 'Tumpeng17', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(87, 1, 'Ulam', 1, '2022-11-22 05:21:33', '2022-11-27 14:19:23'),
(88, 1, 'Ulam Bangkit', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(89, 1, 'Ulam Pemereman', 1, '2022-11-22 05:21:33', '2022-11-22 05:21:33'),
(90, 1, 'Ulam Punggel', 1, '2022-11-22 05:21:33', '2022-11-27 12:09:50'),
(91, 1, 'Upasaksi', 1, '2022-11-22 05:21:33', '2022-11-24 07:33:15'),
(92, 1, 'tsts', 1, '2022-11-26 04:28:25', '2022-11-26 07:00:31'),
(93, 1, 'bebas3', 1, '2022-11-26 09:06:37', '2022-11-26 09:06:45'),
(94, 1, 'Tarantula', 1, '2022-12-20 17:29:33', '2022-12-20 17:29:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_faq`
--

INSERT INTO `tb_faq` (`id`, `id_user`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(2, 1, 'aku seorang kapiten?', 'iya..tapibohong', '2022-12-23 06:05:02', '2022-12-23 06:05:53'),
(3, 1, 'apakah aku tidak apa apa?', 'iya kamu tidak apa apa', '2022-12-23 06:22:28', '2022-12-23 06:22:28'),
(4, 1, 'coba dulu ya?', 'okeoke', '2022-12-23 06:29:57', '2022-12-23 06:29:57'),
(5, 1, 'Aku test ini', 'okeeewww', '2022-12-23 06:40:39', '2022-12-23 06:40:45');

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
(1, 1, 'tes', '1670990930.jpeg', 'upacaraas', '2022-12-14 04:08:50', '2022-12-23 05:53:22');

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
(1, 1, 'Bayuh Rare', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(2, 1, 'Tiga Bulanan', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(3, 1, 'Pawiwahan', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(4, 1, 'Pawintenan', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(5, 1, 'Metatah', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(6, 1, 'Otonan', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(7, 1, 'Bayuh Oton', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(8, 1, 'Magedong - gedongan', 1, '2022-11-12 07:00:25', '2022-11-12 07:00:25'),
(9, 1, 'Nutug Kambuhan', 1, '2022-11-12 07:00:25', '2022-12-17 15:03:54'),
(10, 1, 'Sudiwidani', 1, '2022-11-13 07:51:54', '2022-12-17 15:03:53'),
(11, 1, 'Meras Nak Alit', 1, '2022-11-12 07:00:25', '2022-12-17 15:03:52'),
(12, 1, 'Lain - lain', 1, '2022-11-12 07:00:25', '2022-12-17 15:03:51'),
(13, 1, 'bebas', 1, '2022-11-26 09:06:20', '2022-12-17 15:03:49');

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
(1, 1, 'tes', 'good!', 1, '2022-12-14 04:08:11', '2022-12-14 04:08:24'),
(2, 1, 'test', '1233', 1, '2022-12-23 06:06:04', '2022-12-23 06:06:04');

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
  `keterangan` text,
  `tanggal_banten_pulang` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `kode_transaksi`, `nama_pelanggan`, `no_telepon`, `alamat`, `email`, `kategori`, `sapta_wara`, `panca_wara`, `tanggal_upacara`, `waktu_upacara`, `status`, `tanggal_transaksi`, `biaya`, `dp`, `pelunasan`, `tanggal_pelunasan`, `keterangan`, `tanggal_banten_pulang`, `created_at`, `updated_at`) VALUES
(24, 1, 'PB1212220001', 'Sayu Chandra Aula', '081246547227', 'Tabanan', 'admin@gmail.com', 'Privat', 'Soma', 'Paing', '2022-12-12', '14:00:00', 0, '2022-12-11', 2000000, 1000000, 1000000, '2022-12-12', NULL, '2022-12-12', '2022-12-12 06:20:27', '2022-12-12 07:07:49'),
(25, 1, 'PB1212220002', 'Gede Qicen Saputra', '081353226601', 'Denpasar', 'admin@gmail.com', 'Privat', 'Soma', 'Paing', '2022-12-12', '14:00:00', 0, '2022-12-11', 1500000, 500000, 1000000, '2022-12-12', NULL, '2022-12-12', '2022-12-12 06:24:41', '2022-12-12 07:07:33'),
(26, 1, 'PB1212220003', 'I Made Sudarsana', '081353153326', 'Denpasar', 'admin@gmail.com', 'Umum', 'Soma', 'Paing', '2022-12-12', '10:00:00', 0, '2022-12-11', 1500000, 500000, 1000000, '2022-12-12', NULL, '2022-12-12', '2022-12-12 06:36:36', '2022-12-12 07:07:20'),
(27, 1, 'PB1212220004', 'I Ketut Murdita', '081997834252', 'Denpasar', 'admin@gmail.com', 'Umum', 'Soma', 'Paing', '2022-12-12', '14:00:00', 0, '2022-12-11', 1000000, 500000, 500000, '2022-12-12', NULL, '2022-12-12', '2022-12-12 06:43:06', '2022-12-12 07:07:04'),
(28, 1, 'PB1212220005', 'Nyoman Wira Darma', '08881038339249', 'Denpasar', 'admin@gmail.com', 'Umum', 'Soma', 'Paing', '2022-12-12', '14:58:00', 0, '2022-12-11', 1500000, 500000, 1000000, '2022-12-12', NULL, NULL, '2022-12-12 07:03:46', '2022-12-12 07:05:07'),
(29, 1, 'PB1412220006', 'tes', '34234', 'sdvdfg', 'a@gmail.com', 'Umum', 'Redite', 'Umanis', '2022-12-14', '12:06:00', 0, '2022-12-14', 500000, 500000, 0, '2022-12-14', NULL, '2022-12-14', '2022-12-14 04:07:13', '2022-12-14 04:07:14'),
(30, 1, 'PB1412220007', 'tes 1', '234', 'dfgdfg', 'a@gmail.com', 'Privat', 'Redite', 'Umanis', '2022-12-14', '14:12:00', 0, '2022-12-14', 100000, 100000, 0, '2022-12-14', NULL, '2022-12-14', '2022-12-14 06:13:41', '2022-12-14 06:13:41');

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
(108, 24, 2, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(109, 24, 3, 1, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(110, 24, 6, 1, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(111, 24, 18, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(112, 24, 34, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(113, 24, 38, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(114, 24, 49, 5, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(115, 24, 61, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(116, 24, 64, 1, 0, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(117, 24, 72, 1, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(118, 25, 38, 1, 0, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(119, 25, 40, 1, 0, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(120, 25, 61, 1, 0, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(121, 25, 66, 1, 0, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(122, 25, 72, 6, 1, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(123, 26, 38, 1, 0, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(124, 26, 40, 1, 0, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(125, 26, 61, 1, 0, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(126, 26, 66, 1, 0, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(127, 26, 72, 6, 1, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(128, 27, 18, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(129, 27, 38, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(130, 27, 40, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(131, 27, 61, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(132, 27, 66, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(133, 27, 70, 1, 0, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(134, 27, 72, 6, 1, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(135, 28, 34, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(136, 28, 38, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(137, 28, 40, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(138, 28, 61, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(139, 28, 64, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(140, 28, 73, 1, 0, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(141, 29, 1, 1, 0, '2022-12-14 04:07:13', '2022-12-14 04:07:13'),
(142, 29, 2, 2, 1, '2022-12-14 04:07:13', '2022-12-14 04:07:14'),
(143, 30, 1, 1, 0, '2022-12-14 06:13:41', '2022-12-14 06:13:41'),
(144, 30, 2, 1, 0, '2022-12-14 06:13:41', '2022-12-14 06:13:41'),
(145, 30, 3, 1, 0, '2022-12-14 06:13:41', '2022-12-14 06:13:41'),
(146, 30, 4, 1, 1, '2022-12-14 06:13:41', '2022-12-14 06:13:41');

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
(45, 24, 8, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(46, 24, 28, 1, '2022-12-12 06:20:27', '2022-12-12 06:20:27'),
(47, 25, 14, 1, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(48, 25, 23, 2, '2022-12-12 06:24:41', '2022-12-12 06:24:41'),
(49, 26, 14, 1, '2022-12-12 06:36:36', '2022-12-12 06:36:36'),
(50, 27, 14, 1, '2022-12-12 06:43:06', '2022-12-12 06:43:06'),
(51, 28, 14, 1, '2022-12-12 07:03:46', '2022-12-12 07:03:46'),
(52, 29, 1, 1, '2022-12-14 04:07:13', '2022-12-14 04:07:13'),
(53, 29, 66, 2, '2022-12-14 04:07:14', '2022-12-14 04:07:14'),
(54, 30, 1, 1, '2022-12-14 06:13:41', '2022-12-14 06:13:41'),
(55, 30, 5, 1, '2022-12-14 06:13:41', '2022-12-14 06:13:41');

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
(1, 1, 1, 'Bayuh Rare', 1, '2022-11-12 07:03:27', '2022-11-30 03:56:19'),
(2, 1, 1, 'Bayuh Rare Pakoleman', 1, '2022-11-12 07:03:27', '2022-11-30 03:56:19'),
(3, 1, 1, 'Bayuh Rare Soroan Bangkit', 1, '2022-11-12 07:03:27', '2022-11-30 03:56:19'),
(4, 2, 1, 'Tiga Bulanan', 1, '2022-11-12 07:04:24', '2022-11-30 03:56:19'),
(5, 2, 1, 'Pekakulan', 1, '2022-11-12 07:04:24', '2022-11-30 03:56:19'),
(6, 2, 1, 'Ngileh Lesung', 1, '2022-11-12 07:04:24', '2022-11-30 03:56:19'),
(7, 2, 1, 'Taun Tanah', 1, '2022-11-13 07:55:14', '2022-11-30 03:56:19'),
(8, 2, 1, 'Petik Rambut', 1, '2022-11-13 07:55:14', '2022-11-30 03:56:19'),
(9, 2, 1, 'Busung Biu', 1, '2022-11-12 07:06:00', '2022-11-30 03:56:19'),
(10, 2, 1, 'Lepas AON', 1, '2022-11-12 07:06:00', '2022-11-30 03:56:19'),
(11, 2, 1, 'Ngempungan', 1, '2022-11-12 07:06:00', '2022-11-30 03:56:19'),
(12, 3, 1, 'Pawiwahan Beten', 1, '2022-11-13 07:56:46', '2022-11-30 03:56:19'),
(13, 3, 1, 'Pawiwahan Duur', 1, '2022-11-13 07:56:46', '2022-11-30 03:56:19'),
(14, 3, 1, 'Pawiwahan Beten Duur', 1, '2022-11-12 07:08:04', '2022-11-30 03:56:19'),
(15, 3, 1, 'Pawiwahan Tingkat Bangkit', 1, '2022-11-12 07:08:04', '2022-11-30 03:56:19'),
(16, 3, 1, 'Pawiwahan Tingkat Pekoleman', 1, '2022-11-12 07:08:04', '2022-11-30 03:56:19'),
(17, 4, 1, 'Mawinten Gana', 1, '2022-11-12 07:08:04', '2022-11-30 03:56:19'),
(18, 4, 1, 'Mawinten Sari', 1, '2022-11-13 07:59:23', '2022-11-30 03:56:19'),
(19, 4, 1, 'Mawinten Mapakolem', 1, '2022-11-13 07:59:23', '2022-11-30 03:56:19'),
(20, 4, 1, 'Mawinten Mapedembel', 1, '2022-11-13 07:59:23', '2022-11-30 03:56:19'),
(21, 4, 1, 'Pawintenan Dalang', 1, '2022-11-12 07:10:09', '2022-11-30 03:56:19'),
(22, 4, 1, 'Mawinten Saraswati', 1, '2022-11-12 07:10:09', '2022-11-30 03:56:19'),
(23, 5, 1, 'Metatah', 1, '2022-11-12 07:10:09', '2022-11-30 03:56:19'),
(24, 5, 1, 'Metatah Bangkit', 1, '2022-11-12 07:10:09', '2022-11-30 03:56:19'),
(25, 5, 1, 'Metatah Mapekolem', 1, '2022-11-12 07:11:29', '2022-11-30 03:56:19'),
(26, 6, 1, '1 Oton', 1, '2022-11-13 08:00:29', '2022-11-30 03:56:19'),
(27, 6, 1, '2 Oton', 1, '2022-11-12 07:12:24', '2022-11-30 03:56:19'),
(28, 6, 1, '3 Oton', 1, '2022-11-12 07:12:24', '2022-11-30 03:56:19'),
(36, 6, 1, '4 Oton', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(37, 6, 1, '5 Oton', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(38, 6, 1, '6 Oton', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(39, 6, 1, 'Oton Gede', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(40, 6, 1, 'Natab Sambutan', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(41, 6, 1, 'Otonan', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(42, 6, 1, 'Natab Tebasan Oton', 1, '2022-11-22 04:02:46', '2022-11-30 03:56:19'),
(43, 7, 1, 'Bayuh Oton', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(44, 7, 1, 'Sananempeg', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(45, 7, 1, 'Ngaturang Melik', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(46, 7, 1, 'Menek Kelih', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(47, 7, 1, 'Ngingkup', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(48, 7, 1, 'Sapuhleger', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(49, 7, 1, 'Bayuh Oton', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(50, 7, 1, 'Patemuan', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(51, 7, 1, 'Mapag', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(52, 7, 1, 'Wayang Lemah', 1, '2022-11-22 04:06:55', '2022-11-30 03:56:19'),
(53, 8, 1, 'Magedong - gedongan', 1, '2022-11-22 04:09:25', '2022-11-29 04:26:24'),
(54, 9, 1, 'Nutug Kambuhan', 1, '2022-11-22 04:09:25', '2022-11-29 04:28:56'),
(55, 10, 1, 'Sudiwidani', 1, '2022-11-22 04:09:25', '2022-11-29 04:28:56'),
(56, 11, 1, 'Meras Nak Alit', 1, '2022-11-22 04:09:25', '2022-11-30 03:56:19'),
(57, 12, 1, 'Ngulapin Kendaraan', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(58, 12, 1, 'Nunas Pasupati', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(59, 12, 1, 'Melukat', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(60, 12, 1, 'Masesangi', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(61, 12, 1, 'Gong Lan Penabuh', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(62, 12, 1, 'Mlaspas Wayang', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(63, 12, 1, 'Nunas Banten Suci', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(64, 12, 1, 'Nunas Banten Ngele', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(65, 12, 1, 'Nangkid', 1, '2022-11-22 04:14:36', '2022-11-30 03:56:19'),
(66, 13, 1, 'bebas2', 1, '2022-11-26 09:06:20', '2022-11-30 03:56:19'),
(67, 2, 1, 'wew', 1, '2022-12-20 17:29:02', '2022-12-20 17:29:02');

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
(1, 'Admin', '$2y$10$.QIcGCxss/jEEvCy6ue5EeWntot62oJoKJ9rfip3e0J2pbm/PMIpe', 'admin@gmail.com', '2022-11-17 10:27:40', '2022-11-17 10:27:40');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_upacara`
--
ALTER TABLE `tb_jenis_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_transaksi_banten`
--
ALTER TABLE `tb_transaksi_banten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `tb_transaksi_upacara`
--
ALTER TABLE `tb_transaksi_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_upacara`
--
ALTER TABLE `tb_upacara`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
