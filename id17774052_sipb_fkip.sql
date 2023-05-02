-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2022 at 04:51 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_activitylog` int(10) NOT NULL,
  `datetime_log` datetime NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_activitylog`, `datetime_log`, `aksi`, `deskripsi`, `id_user`) VALUES
(1, '2021-11-16 14:41:45', 'Hapus', 'Hapus Barang Masuk [ BM-0010, AC ], dengan Jumlah Masuk 20', 1),
(2, '2021-11-16 14:42:25', 'Hapus', 'Hapus Barang Keluar [ BK-0030, Genset ], dengan Jumlah Keluar 2', 1),
(3, '2021-11-16 14:42:34', 'Hapus', 'Hapus Barang Masuk [ BM-0011, Genset ], dengan Jumlah Masuk 23', 1),
(4, '2021-11-16 14:42:41', 'Hapus', 'Hapus Barang Masuk [ BM-0012, Lampu biasa ], dengan Jumlah Masuk 1', 1),
(5, '2021-11-16 14:44:03', 'Hapus', 'Hapus Barang Keluar [ BK-0014, AC ], dengan Jumlah Keluar 13', 1),
(6, '2021-11-16 14:44:21', 'Edit', 'Edit Barang Masuk [ BM-0007, AC ], Jumlah masuk menjadi 13', 1),
(7, '2021-11-16 14:44:57', 'Edit', 'Edit Barang Masuk [ BM-0007, AC ], Jumlah masuk menjadi 10', 1),
(8, '2021-11-16 14:45:15', 'Hapus', 'Hapus Barang Keluar [ BK-0021, AC ], dengan Jumlah Keluar 10', 1),
(9, '2021-11-16 14:45:20', 'Hapus', 'Hapus Barang Masuk [ BM-0007, AC ], dengan Jumlah Masuk 10', 1),
(10, '2021-11-20 13:17:37', 'Hapus', 'Hapus Barang [ BRG-0034, Pena Standard ]', 1),
(11, '2021-11-21 22:47:19', 'Tambah', 'Tambah Barang Masuk [ BM-0010, Printer EPSON L210 ], dengan Jumlah Masuk 1', 1),
(12, '2021-11-21 22:47:40', 'Tambah', 'Tambah Barang Keluar [ BK-0030, Printer EPSON L210 ], dengan Jumlah Keluar 1', 1),
(13, '2021-11-21 22:47:57', 'Tambah', 'Tambah Barang Masuk [ BM-0011, Printer EPSON L220 ], dengan Jumlah Masuk 2', 1),
(14, '2021-11-21 22:48:07', 'Tambah', 'Tambah Barang Keluar [ BK-0031, Printer EPSON L220 ], dengan Jumlah Keluar 1', 1),
(15, '2021-11-21 22:48:19', 'Tambah', 'Tambah Barang Keluar [ BK-0032, Printer EPSON L220 ], dengan Jumlah Keluar 1', 1),
(16, '2021-11-21 22:49:32', 'Tambah', 'Tambah Barang Masuk [ BM-0012, Printer EPSON WF-7711 ], dengan Jumlah Masuk 1', 1),
(17, '2021-11-21 22:49:50', 'Tambah', 'Tambah Barang Keluar [ BK-0033, Printer EPSON WF-7711 ], dengan Jumlah Keluar 1', 1),
(18, '2021-11-21 22:58:55', 'Tambah', 'Tambah Barang Masuk [ BM-0013, Printer EPSON L-1455 ], dengan Jumlah Masuk 1', 1),
(19, '2021-11-21 23:00:38', 'Tambah', 'Tambah Barang Keluar [ BK-0034, Printer EPSON L-1455 ], dengan Jumlah Keluar 1', 1),
(20, '2021-11-21 23:00:57', 'Tambah', 'Tambah Barang Masuk [ BM-0014, Printer CANON PIXMA MP287 ], dengan Jumlah Masuk 5', 1),
(21, '2021-11-21 23:01:06', 'Tambah', 'Tambah Barang Keluar [ BK-0035, Printer CANON PIXMA MP287 ], dengan Jumlah Keluar 2', 1),
(22, '2021-11-21 23:01:20', 'Tambah', 'Tambah Barang Keluar [ BK-0036, Printer CANON PIXMA MP287 ], dengan Jumlah Keluar 3', 1),
(23, '2021-11-21 23:01:38', 'Tambah', 'Tambah Barang Masuk [ BM-0015, Printer Laser jet MFP 135a ], dengan Jumlah Masuk 2', 1),
(24, '2021-11-21 23:01:45', 'Tambah', 'Tambah Barang Keluar [ BK-0037, Printer Laser jet MFP 135a ], dengan Jumlah Keluar 2', 1),
(25, '2021-11-21 23:01:56', 'Tambah', 'Tambah Barang Masuk [ BM-0016, Printer Laser jet HP P1102 ], dengan Jumlah Masuk 14', 1),
(26, '2021-11-21 23:02:07', 'Tambah', 'Tambah Barang Keluar [ BK-0038, Printer Laser jet HP P1102 ], dengan Jumlah Keluar 7', 1),
(27, '2021-11-21 23:02:14', 'Tambah', 'Tambah Barang Keluar [ BK-0039, Printer Laser jet HP P1102 ], dengan Jumlah Keluar 6', 1),
(28, '2021-11-21 23:02:21', 'Tambah', 'Tambah Barang Keluar [ BK-0040, Printer Laser jet HP P1102 ], dengan Jumlah Keluar 1', 1),
(29, '2021-11-21 23:02:37', 'Tambah', 'Tambah Barang Masuk [ BM-0017, Printer Laser jet HP 1020 ], dengan Jumlah Masuk 1', 1),
(30, '2021-11-21 23:02:43', 'Tambah', 'Tambah Barang Keluar [ BK-0041, Printer Laser jet HP 1020 ], dengan Jumlah Keluar 1', 1),
(31, '2021-11-21 23:03:18', 'Tambah', 'Tambah Barang Masuk [ BM-0018, Printer Laser jet 135A ], dengan Jumlah Masuk 2', 1),
(32, '2021-11-21 23:03:26', 'Tambah', 'Tambah Barang Keluar [ BK-0042, Printer Laser jet 135A ], dengan Jumlah Keluar 2', 1),
(33, '2021-11-21 23:03:44', 'Tambah', 'Tambah Barang Masuk [ BM-0019, Printer Laser jet P1006 ], dengan Jumlah Masuk 1', 1),
(34, '2021-11-21 23:03:50', 'Tambah', 'Tambah Barang Keluar [ BK-0043, Printer Laser jet P1006 ], dengan Jumlah Keluar 1', 1),
(35, '2021-11-21 23:04:09', 'Tambah', 'Tambah Barang Masuk [ BM-0020, Printer Laser jet 2135 ], dengan Jumlah Masuk 1', 1),
(36, '2021-11-21 23:04:16', 'Tambah', 'Tambah Barang Keluar [ BK-0044, Printer Laser jet 2135 ], dengan Jumlah Keluar 1', 1),
(37, '2021-11-21 23:04:24', 'Tambah', 'Tambah Barang Masuk [ BM-0021, Smart TV LG 32 Inch ], dengan Jumlah Masuk 2', 1),
(38, '2021-11-21 23:04:33', 'Tambah', 'Tambah Barang Keluar [ BK-0045, Smart TV LG 32 Inch ], dengan Jumlah Keluar 2', 1),
(39, '2021-11-21 23:04:43', 'Tambah', 'Tambah Barang Masuk [ BM-0022, Smart TV 86 Inch ], dengan Jumlah Masuk 2', 1),
(40, '2021-11-21 23:04:56', 'Tambah', 'Tambah Barang Keluar [ BK-0046, Smart TV 86 Inch ], dengan Jumlah Keluar 2', 1),
(41, '2021-11-21 23:05:37', 'Tambah', 'Tambah Barang Masuk [ BM-0023, Smart TV Samsung 32 Inch ], dengan Jumlah Masuk 3', 1),
(42, '2021-11-21 23:05:48', 'Tambah', 'Tambah Barang Keluar [ BK-0047, Smart TV Samsung 32 Inch ], dengan Jumlah Keluar 3', 1),
(43, '2021-11-21 23:05:59', 'Tambah', 'Tambah Barang Masuk [ BM-0024, Smart TV Samsung 43 Inch ], dengan Jumlah Masuk 1', 1),
(44, '2021-11-21 23:06:05', 'Tambah', 'Tambah Barang Masuk [ BM-0025, Smart TV Samsung 43 Inch ], dengan Jumlah Masuk 1', 1),
(45, '2021-11-21 23:06:11', 'Tambah', 'Tambah Barang Keluar [ BK-0048, Smart TV Samsung 43 Inch ], dengan Jumlah Keluar 1', 1),
(46, '2021-11-21 23:06:17', 'Tambah', 'Tambah Barang Keluar [ BK-0049, Smart TV Samsung 43 Inch ], dengan Jumlah Keluar 1', 1),
(47, '2021-11-21 23:06:29', 'Tambah', 'Tambah Barang Masuk [ BM-0026, Smart TV Samsung 65 Inch ], dengan Jumlah Masuk 1', 1),
(48, '2021-11-21 23:06:36', 'Tambah', 'Tambah Barang Keluar [ BK-0050, Smart TV Samsung 65 Inch ], dengan Jumlah Keluar 1', 1),
(49, '2021-11-21 23:06:56', 'Tambah', 'Tambah Barang Masuk [ BM-0027, Smart TV Samsung 75 Inch ], dengan Jumlah Masuk 13', 1),
(50, '2021-11-21 23:07:02', 'Tambah', 'Tambah Barang Keluar [ BK-0051, Smart TV Samsung 75 Inch ], dengan Jumlah Keluar 7', 1),
(51, '2021-11-21 23:07:10', 'Tambah', 'Tambah Barang Keluar [ BK-0052, Smart TV Samsung 75 Inch ], dengan Jumlah Keluar 4', 1),
(52, '2021-11-21 23:07:17', 'Tambah', 'Tambah Barang Keluar [ BK-0053, Smart TV Samsung 75 Inch ], dengan Jumlah Keluar 2', 1),
(53, '2021-11-21 23:07:24', 'Tambah', 'Tambah Barang Masuk [ BM-0028, Smart TV Samsung 85 Inch ], dengan Jumlah Masuk 1', 1),
(54, '2021-11-21 23:07:31', 'Tambah', 'Tambah Barang Keluar [ BK-0054, Smart TV Samsung 85 Inch ], dengan Jumlah Keluar 1', 1),
(55, '2021-11-21 23:07:37', 'Tambah', 'Tambah Barang Masuk [ BM-0029, Smart TV Sharp 32 Inch ], dengan Jumlah Masuk 1', 1),
(56, '2021-11-21 23:07:47', 'Tambah', 'Tambah Barang Keluar [ BK-0055, Smart TV Sharp 32 Inch ], dengan Jumlah Keluar 1', 1),
(57, '2021-11-21 23:08:50', 'Tambah', 'Tambah Barang Masuk [ BM-0030, Smart TV 32 Inch ], dengan Jumlah Masuk 1', 1),
(58, '2021-11-21 23:08:57', 'Tambah', 'Tambah Barang Keluar [ BK-0056, Smart TV 32 Inch ], dengan Jumlah Keluar 1', 1),
(59, '2021-11-21 23:09:27', 'Tambah', 'Tambah Barang Masuk [ BM-0031, Genset ], dengan Jumlah Masuk 4', 1),
(60, '2021-11-21 23:09:41', 'Tambah', 'Tambah Barang Keluar [ BK-0057, Genset ], dengan Jumlah Keluar 2', 1),
(61, '2021-11-21 23:09:47', 'Tambah', 'Tambah Barang Keluar [ BK-0058, Genset ], dengan Jumlah Keluar 1', 1),
(62, '2021-11-21 23:10:00', 'Tambah', 'Tambah Barang Keluar [ BK-0059, Genset ], dengan Jumlah Keluar 1', 1),
(63, '2021-11-21 23:10:14', 'Tambah', 'Tambah Barang Masuk [ BM-0032, Mesin pompa air ], dengan Jumlah Masuk 14', 1),
(64, '2021-11-21 23:10:24', 'Tambah', 'Tambah Barang Keluar [ BK-0060, Mesin pompa air ], dengan Jumlah Keluar 5', 1),
(65, '2021-11-21 23:10:34', 'Tambah', 'Tambah Barang Keluar [ BK-0061, Mesin pompa air ], dengan Jumlah Keluar 6', 1),
(66, '2021-11-21 23:10:44', 'Tambah', 'Tambah Barang Keluar [ BK-0062, Mesin pompa air ], dengan Jumlah Keluar 3', 1),
(67, '2021-11-21 23:11:00', 'Tambah', 'Tambah Barang Masuk [ BM-0033, Lampu biasa ], dengan Jumlah Masuk 319', 1),
(68, '2021-11-21 23:11:11', 'Tambah', 'Tambah Barang Keluar [ BK-0063, Lampu biasa ], dengan Jumlah Keluar 289', 1),
(69, '2021-11-21 23:11:22', 'Tambah', 'Tambah Barang Keluar [ BK-0064, Lampu biasa ], dengan Jumlah Keluar 30', 1),
(70, '2021-11-21 23:17:05', 'Tambah', 'Tambah Barang Masuk [ BM-0034, AC ], dengan Jumlah Masuk 48', 1),
(71, '2021-11-21 23:17:15', 'Tambah', 'Tambah Barang Keluar [ BK-0065, AC ], dengan Jumlah Keluar 18', 1),
(72, '2021-11-21 23:17:21', 'Tambah', 'Tambah Barang Keluar [ BK-0066, AC ], dengan Jumlah Keluar 30', 1),
(73, '2021-11-21 23:17:54', 'Tambah', 'Tambah Barang Masuk [ BM-0035, Smart TV 85  Inch ], dengan Jumlah Masuk 3', 1),
(74, '2021-11-21 23:18:01', 'Tambah', 'Tambah Barang Keluar [ BK-0067, Smart TV 85  Inch ], dengan Jumlah Keluar 3', 1),
(75, '2021-11-22 20:07:00', 'Hapus', 'Hapus Barang Keluar [ BK-0065, AC ], dengan Jumlah Keluar 18', 1),
(76, '2021-11-22 20:08:02', 'Hapus', 'Hapus Barang Keluar [ BK-0066, AC ], dengan Jumlah Keluar 30', 1),
(77, '2021-11-22 20:08:12', 'Hapus', 'Hapus Barang Masuk [ BM-0034, AC ], dengan Jumlah Masuk 48', 1),
(78, '2021-11-22 20:11:41', 'Tambah', 'Tambah Barang Masuk [ BM-0036, Laptop ], dengan Jumlah Masuk 48', 1),
(79, '2021-11-22 20:11:52', 'Tambah', 'Tambah Barang Keluar [ BK-0068, Laptop ], dengan Jumlah Keluar 18', 1),
(80, '2021-11-22 20:12:36', 'Tambah', 'Tambah Barang Keluar [ BK-0069, Laptop ], dengan Jumlah Keluar 30', 1),
(81, '2022-01-21 16:11:50', 'Tambah', 'Tambah Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 1', 1),
(82, '2022-01-21 16:12:00', 'Tambah', 'Tambah Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 1', 1),
(83, '2022-01-21 16:12:05', 'Hapus', 'Hapus Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 1', 1),
(84, '2022-01-21 16:12:20', 'Hapus', 'Hapus Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 1', 1),
(85, '2022-02-09 13:24:55', 'Tambah', 'Tambah Barang [ BRG-0034, test ]', 1),
(86, '2022-02-09 13:25:05', 'Hapus', 'Hapus Barang [ BRG-0034, test ]', 1),
(87, '2022-04-11 22:51:59', 'Tambah', 'Tambah Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 1', 1),
(88, '2022-04-11 22:52:14', 'Hapus', 'Hapus Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 1', 1),
(89, '2022-04-12 08:56:29', 'Tambah', 'Tambah Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 50', 1),
(90, '2022-04-12 08:56:54', 'Tambah', 'Tambah Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 50', 1),
(91, '2022-04-12 08:57:13', 'Hapus', 'Hapus Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 50', 1),
(92, '2022-04-12 08:57:36', 'Tambah', 'Tambah Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 10', 1),
(93, '2022-04-22 21:02:50', 'Hapus', 'Hapus Barang Masuk [ BM-0037, AC ], dengan Jumlah Masuk 50', 1),
(94, '2022-04-22 21:02:54', 'Hapus', 'Hapus Barang Keluar [ BK-0070, AC ], dengan Jumlah Keluar 10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bk` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jam_keluar` time NOT NULL,
  `id_lokasi` varchar(100) NOT NULL,
  `jumlahkeluar` int(100) NOT NULL,
  `penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bk`, `id_barang`, `tanggal_keluar`, `jam_keluar`, `id_lokasi`, `jumlahkeluar`, `penerima`) VALUES
('BK-0001', 'BRG-0001', '2021-10-03', '20:05:57', 'LKS-0001', 71, 'Dayat'),
('BK-0002', 'BRG-0001', '2021-10-03', '20:06:10', 'LKS-0002', 43, 'Dayat'),
('BK-0003', 'BRG-0001', '2021-10-03', '20:06:23', 'LKS-0003', 5, 'Dayat'),
('BK-0004', 'BRG-0001', '2021-10-03', '20:06:35', 'LKS-0004', 10, 'Dayat'),
('BK-0005', 'BRG-0002', '2021-10-03', '21:47:58', 'LKS-0001', 208, 'Dayat'),
('BK-0006', 'BRG-0002', '2021-10-03', '21:48:28', 'LKS-0002', 116, 'Dayat'),
('BK-0007', 'BRG-0002', '2021-10-03', '21:48:38', 'LKS-0003', 74, 'Dayat'),
('BK-0008', 'BRG-0002', '2021-10-03', '21:48:58', 'LKS-0004', 32, 'Dayat'),
('BK-0009', 'BRG-0006', '2021-10-04', '10:47:12', 'LKS-0002', 1, 'Dayat'),
('BK-0010', 'BRG-0006', '2021-10-04', '10:47:46', 'LKS-0004', 1, 'Dayat'),
('BK-0011', 'BRG-0004', '2021-10-04', '10:47:57', 'LKS-0001', 9, 'Dayat'),
('BK-0012', 'BRG-0004', '2021-10-04', '10:48:49', 'LKS-0002', 6, 'Dayat'),
('BK-0013', 'BRG-0004', '2021-10-04', '10:48:57', 'LKS-0003', 1, 'Dayat'),
('BK-0015', 'BRG-0003', '2021-10-06', '20:25:39', 'LKS-0001', 36, 'Dayat'),
('BK-0016', 'BRG-0003', '2021-10-06', '20:27:17', 'LKS-0002', 5, 'Dayat'),
('BK-0017', 'BRG-0003', '2021-10-06', '20:27:26', 'LKS-0003', 4, 'Dayat'),
('BK-0018', 'BRG-0003', '2021-10-06', '20:27:38', 'LKS-0004', 4, 'Dayat'),
('BK-0019', 'BRG-0005', '2021-10-06', '20:27:43', 'LKS-0001', 4, 'Dayat'),
('BK-0020', 'BRG-0005', '2021-10-06', '20:27:58', 'LKS-0002', 5, 'Dayat'),
('BK-0022', 'BRG-0032', '2021-10-06', '20:36:20', 'LKS-0001', 895, 'Dayat'),
('BK-0023', 'BRG-0032', '2021-10-06', '20:36:34', 'LKS-0002', 504, 'Dayat'),
('BK-0024', 'BRG-0032', '2021-10-06', '20:36:44', 'LKS-0003', 110, 'Dayat'),
('BK-0025', 'BRG-0032', '2021-10-06', '20:36:52', 'LKS-0004', 87, 'Dayat'),
('BK-0026', 'BRG-0027', '2021-10-07', '13:16:28', 'LKS-0001', 65, 'Dayat'),
('BK-0027', 'BRG-0027', '2021-10-07', '13:16:37', 'LKS-0002', 144, 'Dayat'),
('BK-0028', 'BRG-0027', '2021-10-14', '20:17:37', 'LKS-0003', 6, 'Dayat'),
('BK-0029', 'BRG-0027', '2021-10-14', '20:19:54', 'LKS-0004', 2, 'Dayat'),
('BK-0030', 'BRG-0008', '2021-11-21', '22:47:25', 'LKS-0001', 1, 'dayat'),
('BK-0031', 'BRG-0009', '2021-11-21', '22:47:57', 'LKS-0001', 1, 'dayat'),
('BK-0032', 'BRG-0009', '2021-11-21', '22:48:07', 'LKS-0003', 1, 'dayat'),
('BK-0033', 'BRG-0010', '2021-11-21', '22:49:32', 'LKS-0001', 1, 'dayat'),
('BK-0034', 'BRG-0011', '2021-11-21', '22:58:55', 'LKS-0001', 1, 'dayat'),
('BK-0035', 'BRG-0012', '2021-11-21', '23:00:57', 'LKS-0001', 2, 'dayat'),
('BK-0036', 'BRG-0012', '2021-11-21', '23:01:06', 'LKS-0002', 3, 'dayat'),
('BK-0037', 'BRG-0013', '2021-11-21', '23:01:39', 'LKS-0001', 2, 'dayat'),
('BK-0038', 'BRG-0014', '2021-11-21', '23:01:57', 'LKS-0001', 7, 'dayat'),
('BK-0039', 'BRG-0014', '2021-11-21', '23:02:07', 'LKS-0002', 6, 'dayat'),
('BK-0040', 'BRG-0014', '2021-11-21', '23:02:14', 'LKS-0003', 1, 'dayat'),
('BK-0041', 'BRG-0015', '2021-11-21', '23:02:38', 'LKS-0001', 1, 'dayat'),
('BK-0042', 'BRG-0016', '2021-11-21', '23:03:18', 'LKS-0002', 2, 'dayat'),
('BK-0043', 'BRG-0017', '2021-11-21', '23:03:44', 'LKS-0004', 1, 'dayat'),
('BK-0044', 'BRG-0018', '2021-11-21', '23:04:10', 'LKS-0002', 1, 'dayat'),
('BK-0045', 'BRG-0019', '2021-11-21', '23:04:25', 'LKS-0001', 2, 'dayat'),
('BK-0046', 'BRG-0020', '2021-11-21', '23:04:43', 'LKS-0001', 2, 'dayat'),
('BK-0047', 'BRG-0021', '2021-11-21', '23:05:38', 'LKS-0001', 3, 'dayat'),
('BK-0048', 'BRG-0022', '2021-11-21', '23:06:05', 'LKS-0001', 1, 'dayat'),
('BK-0049', 'BRG-0022', '2021-11-21', '23:06:11', 'LKS-0004', 1, 'dayat'),
('BK-0050', 'BRG-0023', '2021-11-21', '23:06:29', 'LKS-0001', 1, 'dayat'),
('BK-0051', 'BRG-0024', '2021-11-21', '23:06:56', 'LKS-0001', 7, 'dayat'),
('BK-0052', 'BRG-0024', '2021-11-21', '23:07:03', 'LKS-0002', 4, 'dayat'),
('BK-0053', 'BRG-0024', '2021-11-21', '23:07:10', 'LKS-0003', 2, 'dayat'),
('BK-0054', 'BRG-0025', '2021-11-21', '23:07:24', 'LKS-0004', 1, 'dayat'),
('BK-0055', 'BRG-0026', '2021-11-21', '23:07:37', 'LKS-0001', 1, 'dayat'),
('BK-0056', 'BRG-0030', '2021-11-21', '23:08:51', 'LKS-0004', 1, 'dayat'),
('BK-0057', 'BRG-0007', '2021-11-21', '23:09:27', 'LKS-0001', 2, 'dayat'),
('BK-0058', 'BRG-0007', '2021-11-21', '23:09:41', 'LKS-0002', 1, 'dayat'),
('BK-0059', 'BRG-0007', '2021-11-21', '23:09:47', 'LKS-0004', 1, 'dayat'),
('BK-0060', 'BRG-0031', '2021-11-21', '23:10:15', 'LKS-0001', 5, 'dayat'),
('BK-0061', 'BRG-0031', '2021-11-21', '23:10:24', 'LKS-0002', 6, 'dayat'),
('BK-0062', 'BRG-0031', '2021-11-21', '23:10:34', 'LKS-0003', 3, 'dayat'),
('BK-0063', 'BRG-0033', '2021-11-21', '23:11:01', 'LKS-0001', 289, 'dayat'),
('BK-0064', 'BRG-0033', '2021-11-21', '23:11:11', 'LKS-0004', 30, 'dayat'),
('BK-0067', 'BRG-0029', '2021-11-21', '23:17:55', 'LKS-0004', 3, 'dayat'),
('BK-0068', 'BRG-0028', '2021-11-22', '20:11:42', 'LKS-0001', 18, 'dayat'),
('BK-0069', 'BRG-0028', '2021-11-22', '20:12:25', 'LKS-0002', 30, 'dayat');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `deletekeluar` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok=stok+old.jumlahkeluar
WHERE id_barang=OLD.id_barang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editkeluar` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN
 update tb_barang SET stok=stok+old.jumlahkeluar-new.jumlahkeluar
 WHERE id_barang=old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokkeluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok=stok-new.jumlahkeluar WHERE id_barang=new.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_bm` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jumlahmasuk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `id_barang`, `tanggal_masuk`, `jam_masuk`, `jumlahmasuk`) VALUES
('BM-0001', 'BRG-0001', '2021-10-03', '19:28:26', 129),
('BM-0002', 'BRG-0002', '2021-10-03', '19:29:06', 430),
('BM-0003', 'BRG-0003', '2021-10-03', '19:29:21', 49),
('BM-0004', 'BRG-0004', '2021-10-03', '19:29:49', 16),
('BM-0005', 'BRG-0005', '2021-10-03', '19:30:15', 9),
('BM-0006', 'BRG-0006', '2021-10-03', '19:30:27', 2),
('BM-0008', 'BRG-0032', '2021-10-06', '20:35:58', 1596),
('BM-0009', 'BRG-0027', '2021-10-07', '13:16:19', 217),
('BM-0010', 'BRG-0008', '2021-11-21', '22:47:06', 1),
('BM-0011', 'BRG-0009', '2021-11-21', '22:47:41', 2),
('BM-0012', 'BRG-0010', '2021-11-21', '22:49:15', 1),
('BM-0013', 'BRG-0011', '2021-11-21', '22:58:40', 1),
('BM-0014', 'BRG-0012', '2021-11-21', '23:00:38', 5),
('BM-0015', 'BRG-0013', '2021-11-21', '23:01:28', 2),
('BM-0016', 'BRG-0014', '2021-11-21', '23:01:45', 14),
('BM-0017', 'BRG-0015', '2021-11-21', '23:02:22', 1),
('BM-0018', 'BRG-0016', '2021-11-21', '23:02:44', 2),
('BM-0019', 'BRG-0017', '2021-11-21', '23:03:36', 1),
('BM-0020', 'BRG-0018', '2021-11-21', '23:03:51', 1),
('BM-0021', 'BRG-0019', '2021-11-21', '23:04:16', 2),
('BM-0022', 'BRG-0020', '2021-11-21', '23:04:34', 2),
('BM-0023', 'BRG-0021', '2021-11-21', '23:04:56', 3),
('BM-0024', 'BRG-0022', '2021-11-21', '23:05:48', 1),
('BM-0025', 'BRG-0022', '2021-11-21', '23:06:00', 1),
('BM-0026', 'BRG-0023', '2021-11-21', '23:06:17', 1),
('BM-0027', 'BRG-0024', '2021-11-21', '23:06:37', 13),
('BM-0028', 'BRG-0025', '2021-11-21', '23:07:17', 1),
('BM-0029', 'BRG-0026', '2021-11-21', '23:07:31', 1),
('BM-0030', 'BRG-0030', '2021-11-21', '23:08:41', 1),
('BM-0031', 'BRG-0007', '2021-11-21', '23:09:17', 4),
('BM-0032', 'BRG-0031', '2021-11-21', '23:10:00', 14),
('BM-0033', 'BRG-0033', '2021-11-21', '23:10:45', 319),
('BM-0035', 'BRG-0029', '2021-11-21', '23:17:44', 3),
('BM-0036', 'BRG-0028', '2021-11-22', '20:11:34', 48);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `deletemasuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok=stok-OLD.jumlahmasuk
WHERE id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editmasuk` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN
 update tb_barang SET stok=stok-old.jumlahmasuk+new.jumlahmasuk
 WHERE id_barang=old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokmasuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok=stok+new.jumlahmasuk
WHERE id_barang=new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` varchar(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_jenis`, `stok`) VALUES
('BRG-0001', 'LCD', 'JNS-0001', 0),
('BRG-0002', 'AC', 'JNS-0002', 0),
('BRG-0003', 'Printer EPSON L360', 'JNS-0003', 0),
('BRG-0004', 'Printer EPSON L3110', 'JNS-0003', 0),
('BRG-0005', 'Printer EPSON L6170', 'JNS-0003', 0),
('BRG-0006', 'Printer EPSON L200', 'JNS-0003', 0),
('BRG-0007', 'Genset', 'JNS-0007', 0),
('BRG-0008', 'Printer EPSON L210', 'JNS-0003', 0),
('BRG-0009', 'Printer EPSON L220', 'JNS-0003', 0),
('BRG-0010', 'Printer EPSON WF-7711', 'JNS-0003', 0),
('BRG-0011', 'Printer EPSON L-1455', 'JNS-0003', 0),
('BRG-0012', 'Printer CANON PIXMA MP287', 'JNS-0003', 0),
('BRG-0013', 'Printer Laser jet MFP 135a', 'JNS-0003', 0),
('BRG-0014', 'Printer Laser jet HP P1102', 'JNS-0003', 0),
('BRG-0015', 'Printer Laser jet HP 1020', 'JNS-0003', 0),
('BRG-0016', 'Printer Laser jet 135A', 'JNS-0003', 0),
('BRG-0017', 'Printer Laser jet P1006', 'JNS-0003', 0),
('BRG-0018', 'Printer Laser jet 2135', 'JNS-0003', 0),
('BRG-0019', 'Smart TV LG 32 Inch', 'JNS-0004', 0),
('BRG-0020', 'Smart TV 86 Inch', 'JNS-0004', 0),
('BRG-0021', 'Smart TV Samsung 32 Inch', 'JNS-0004', 0),
('BRG-0022', 'Smart TV Samsung 43 Inch', 'JNS-0004', 0),
('BRG-0023', 'Smart TV Samsung 65 Inch', 'JNS-0004', 0),
('BRG-0024', 'Smart TV Samsung 75 Inch', 'JNS-0004', 0),
('BRG-0025', 'Smart TV Samsung 85 Inch', 'JNS-0004', 0),
('BRG-0026', 'Smart TV Sharp 32 Inch', 'JNS-0004', 0),
('BRG-0027', 'PC', 'JNS-0005', 0),
('BRG-0028', 'Laptop', 'JNS-0006', 0),
('BRG-0029', 'Smart TV 85  Inch', 'JNS-0004', 0),
('BRG-0030', 'Smart TV 32 Inch', 'JNS-0004', 0),
('BRG-0031', 'Mesin pompa air', 'JNS-0008', 0),
('BRG-0032', 'Lampu TL', 'JNS-0009', 0),
('BRG-0033', 'Lampu biasa', 'JNS-0009', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`) VALUES
('JNS-0001', 'LCD'),
('JNS-0002', 'AC'),
('JNS-0003', 'Printer'),
('JNS-0004', 'Smart TV'),
('JNS-0005', 'PC'),
('JNS-0006', 'Laptop'),
('JNS-0007', 'Genset'),
('JNS-0008', 'Mesin Pompa Air'),
('JNS-0009', 'Lampu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lokasi`) VALUES
('LKS-0001', 'INDRALAYA'),
('LKS-0002', 'OGAN'),
('LKS-0003', 'KM 5'),
('LKS-0004', 'INDUK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pegawai'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ropss`
--

CREATE TABLE `tb_ropss` (
  `id_ropss` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `lead_time` int(100) NOT NULL,
  `permintaan` int(100) NOT NULL,
  `hari_kerja` varchar(100) NOT NULL,
  `safety_stock` double DEFAULT NULL,
  `reorder_point` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ropss`
--

INSERT INTO `tb_ropss` (`id_ropss`, `id_barang`, `periode`, `lead_time`, `permintaan`, `hari_kerja`, `safety_stock`, `reorder_point`) VALUES
('ROPSS-0001', 'BRG-0002', '16 April 2021 - 16 April 2022', 4, 440, '365', 4.82, 9.64);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(100) DEFAULT current_timestamp(),
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `nama`, `email`, `no_telp`, `username`, `password`, `role_id`, `date_created`) VALUES
(1, '123456', 'Muhammad Hidayat Mauluddin', 'hidayat.mauludin@yahoo.co.id', '081369982678', 'admin', '$2y$10$ilA56zE5k8pO9LiYxRz5o.nAHlvqsrllvItiJcDWnHX.eNz00t2de', 1, '2021-10-03'),
(2, '123456789', 'dayat', 'dayat@gmail.com', '0865675778', 'dayat12z', '$2y$10$6cSbSXLdxIQTiGO0xa.vf.7IMoBtNm/7JVyj6VV1uq/2ZFzMjIb46', 2, '2021-10-03'),
(4, '123456', 'pimpinan', 'pimpinan@gmail.com', '92434234234', 'pimpinan', '$2y$10$mxr9cO3m7GzEsKp4/Z42/eDcMQBDbJqKlo.ebhnfEyRaVzEKDqSvC', 3, '2022-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_activitylog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_bk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_tempat` (`id_lokasi`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_ropss`
--
ALTER TABLE `tb_ropss`
  ADD PRIMARY KEY (`id_ropss`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_activitylog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
