-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 03:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_tk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip_sekolah`
--

CREATE TABLE `tbl_arsip_sekolah` (
  `id` int(11) NOT NULL,
  `nama_arsip` varchar(50) DEFAULT NULL,
  `jenis_arsip` varchar(10) DEFAULT NULL,
  `kategori_arsip` varchar(20) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_arsip_sekolah`
--

INSERT INTO `tbl_arsip_sekolah` (`id`, `nama_arsip`, `jenis_arsip`, `kategori_arsip`, `berkas`, `tgl`, `waktu`) VALUES
(2, 'Surat Pengangkatan Bendahara RA Al Muslihun', 'SK', 'Dokumen Guru', 'file_20220820010025.pdf', '2022-08-20', '01:00:25'),
(3, 'surat Izin operasioanl RA Baubau', 'Persuratan', 'Persuratan', 'file_20220820010644.docx', '2022-08-20', '01:06:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip_sekolah`
--
ALTER TABLE `tbl_arsip_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip_sekolah`
--
ALTER TABLE `tbl_arsip_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
