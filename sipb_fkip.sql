-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 05:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipb_fkip`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_activitylog` int(10) NOT NULL,
  `datetime_log` datetime NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_activitylog`, `datetime_log`, `aksi`, `deskripsi`, `id_user`) VALUES
(1, '2023-02-01 08:10:11', 'Hapus', 'Hapus Barang Keluar [ BK-0003, AC Panasonic, Lokasi  ], dengan Jumlah Keluar 2, Kondisi ', 1),
(2, '2023-02-01 08:30:19', 'Edit', 'Edit Barang [ 12356, AC Panasonicaaaaaaaaaa ]', 1),
(3, '2023-02-01 08:30:41', 'Edit', 'Edit Barang [ 12356, AC Panasonic ]', 1),
(4, '2023-02-01 10:06:38', 'Tambah', 'Tambah Barang Keluar [ BK-0003, AC Panasonic, Lokasi KM 5 ], dengan Jumlah Keluar 2, Kondisi BAGUS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bk` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_lokasi` varchar(100) NOT NULL,
  `jumlahkeluar` int(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `id_kondisi` int(250) NOT NULL,
  `tanggal_rusakhilang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bk`, `id_barang`, `tanggal_keluar`, `id_lokasi`, `jumlahkeluar`, `penerima`, `id_kondisi`, `tanggal_rusakhilang`) VALUES
('BK-0002', 'BRG-0003', '2023-02-01', 'LKS-0003', 2, 'dayat', 2, '2023-02-01'),
('BK-0003', 'BRG-0003', '2023-02-01', 'LKS-0003', 2, 'dayat', 1, '2023-02-01');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `deletebk` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN

UPDATE tb_transaksi SET stok=stok+old.jumlahkeluar
WHERE id_barang=OLD.id_barang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editbk` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN

UPDATE tb_transaksi SET stok=stok+old.jumlahkeluar-new.jumlahkeluar
 WHERE id_barang=old.id_barang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokkeluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN

UPDATE tb_transaksi SET stok=stok-new.jumlahkeluar 
WHERE id_barang=new.id_barang;
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
  `id_lokasi` varchar(100) NOT NULL,
  `jumlahmasuk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `id_barang`, `tanggal_masuk`, `id_lokasi`, `jumlahmasuk`) VALUES
('BM-0001', 'BRG-0003', '2023-01-31', 'LKS-0001', 24);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `deletebm` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN
    UPDATE tb_transaksi SET stok=stok-OLD.jumlahmasuk
    WHERE id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `editbm` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN
 update tb_transaksi SET stok=stok-old.jumlahmasuk+new.jumlahmasuk
 WHERE id_barang=old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokmasuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN

IF(SELECT COUNT(id_transaksi) FROM tb_transaksi WHERE id_barang = new.id_barang and id_lokasi = new.id_lokasi) > 0 THEN
UPDATE tb_transaksi SET stok=stok+new.jumlahmasuk
WHERE id_barang=new.id_barang;
ELSE
INSERT INTO tb_transaksi(id_barang, id_lokasi, stok) VALUES(new.id_barang, new.id_lokasi, new.jumlahmasuk);

END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(250) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `id_jenis`) VALUES
('BRG-0002', '23', 'Printer Epson', 'JNS-0002'),
('BRG-0003', '12356', 'AC Panasonic', 'JNS-0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`) VALUES
('JNS-0001', 'AC'),
('JNS-0002', 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `kondisi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `kondisi`) VALUES
(1, 'BAGUS'),
(2, 'RUSAK'),
(3, 'HILANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Pegawai'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `id_lokasi` varchar(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_barang`, `id_lokasi`, `stok`) VALUES
(7, 'BRG-0003', 'LKS-0001', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(100) DEFAULT current_timestamp(),
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `no_telp`, `username`, `password`, `role_id`, `date_created`) VALUES
(1, 'Muhammad Hidayat Mauluddin', 'hidayat.mauludin@yahoo.co.id', '081369982678', 'admin', '$2y$10$90ZQE2reRVO44qJnSv83GO4.AgbESRyk7SplZ6NIsNdRNFuUnmFJC', 1, '2021-10-03'),
(5, 'test', '09031381823106@student.unsri.ac.id', '0813888888', 'dayat12z', '$2y$10$0pqBBiRPjifW8uCvdXul3.57IS9bvRsdN2qcyPQQCVIux00G74o7q', 2, '2023-01-07');

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
  ADD KEY `id_tempat` (`id_lokasi`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`);

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
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

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
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`);

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
  MODIFY `id_activitylog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_kondisi`) REFERENCES `tb_kondisi` (`id_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
