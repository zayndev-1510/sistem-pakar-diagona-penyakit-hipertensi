-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 03:08 AM
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
-- Table structure for table `tbl_tata_tertib`
--

CREATE TABLE `tbl_tata_tertib` (
  `id` int(11) NOT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tata_tertib`
--

INSERT INTO `tbl_tata_tertib` (`id`, `ket`) VALUES
(1, 'Anak didik Masuk 08:00-11:00 wita pada hari Senin-Kamis, dan 08:00-10:30 pada hari Jum\'at, berusaha tidak terlambat dan agar dijemput paling lambat satu jam setelah KBM selesai'),
(2, 'Anak didik libur pada hari sabtu dan Ahad, serta hari-hari yang ditentukan libur oleh sekolah(tanggal merah belum tentu libur).'),
(3, 'Anak didik senantiasa membawa buku komunikasi yang telah ditandatangani orang tua.'),
(4, 'Anak didik diperkenakan membawa bekal makan dan minum dari rumah.'),
(5, 'Anak didik diperkenakan membawa perlengkapan sekolah (buku,tas dan alat tulis) tidak dianjurkan membawa permainan dari rumah,apalagi permainan yang berharga mahal tidak diperkenakan bawa kesekolah.'),
(6, 'Anak didik berusaha mandiri tanpa ditunggui orang tua.'),
(7, 'Bila ada kepentingan mendadak,anak didik boleh diambil sewaktu-waktu dengan pemberitahuan terlebih dahulu'),
(8, 'Anak didik tidak diperkenankan mekakai perhiasan yang berlebihan.'),
(9, 'Anak didik senantiasa berperilaku islami.'),
(10, 'Setiap anak didampingi Oleh Guru Pendamping dengan perbandingan 1 guru:5 murid. Untuk memaksimalkan perkembangan anak didik terutama dalam proses belajar membaca Alqur\'an(Mengaji).'),
(11, 'Orang Tua/Wali murid wajib berperan aktif terhadap perkembangan pendidikan anak.'),
(12, 'Orang Tua/Wali murid setiap hari memeriksa, memperhatikan dan menandatangani buku komunikasi anak didik.'),
(13, 'Orang Tua/Wali murid dan Guru pendamping yang telah ditunjuk wajib saling mengkonsultasikan perkembangan anak didik, baik dari sisi akhlak perilaku dan Keilmuan anak.'),
(14, 'Orang tua/Wali murid berusaha memenuhi infaq pendidikan tepat waktu setiap bulannya, jika tidak bisa harap segera dikomunikasikan dengan guru pendampingnya.'),
(15, 'Orang tua/Wali murid berusaha mengantar dan menjemput tepat waktu.'),
(16, 'Orang tua/Wali murid tidak membawa anak didik kesekolah jika terkena penyakit yang mudah mewabah.'),
(17, 'Orang tua/Wali murid diperkenankan untuk memberi saran yang sifatnya membangun sesuai dengan syariat, yang disampaikan  secara baik kepada guru pendamping.'),
(18, 'Ustadzah tidak menerima hadiah dalam bentuk apapun dari orang Orang tua/Wali.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tata_tertib`
--
ALTER TABLE `tbl_tata_tertib`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tata_tertib`
--
ALTER TABLE `tbl_tata_tertib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
