-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 07:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek manpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(1) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `pegawai_id`, `tanggal`, `status`, `keterangan`) VALUES
(1, 1, '2022-10-27 14:24:45', '1', 'sdajdj'),
(8, 1, '2022-11-02 12:43:21', '1', 'tes'),
(9, 1, '2022-11-17 15:12:23', '1', 'sakit'),
(10, 1, '2022-11-17 15:15:26', '2', 'dhjadjkfgj'),
(11, 1, '2022-11-18 17:49:07', '2', 'bolos'),
(12, 1, '2022-11-18 17:49:10', '1', ''),
(13, 1, '2022-11-26 00:46:32', '1', ''),
(15, 1, '2022-11-27 16:56:16', '2', ''),
(30, 1, '2022-11-28 12:02:54', '1', ''),
(34, 1, '2022-11-30 17:56:41', '1', ''),
(35, 1, '2022-11-30 17:56:44', '2', ''),
(36, 1, '2022-12-09 13:56:46', '1', ''),
(37, 1, '2022-12-09 13:59:55', '2', ''),
(38, 1, '2022-12-13 18:31:57', '1', ''),
(39, 1, '2022-12-13 18:32:00', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `alasan` varchar(300) NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `pegawai_id`, `tanggal_mulai`, `tanggal_berakhir`, `status`, `alasan`, `tipe`, `file`) VALUES
(16, 1, '2022-11-26', '2022-11-27', '2', 'Sakit c', 'Cuti', '9992022NovSat042414kisspng-indonesia-the-birth-of-pancasila-pancasila-day-bad-garuda-pancasila-5b485'),
(28, 1, '2022-12-07', '2022-12-09', '3', 'tes', 'Sakit', '7952022DecMon082611Soal_UTS_ManProTI_09_Okt_21.pdf'),
(29, 1, '2022-12-07', '2022-12-08', '3', 'sakit demam', 'Sakit', '6102022DecMon142551Catatan UTS Manpro .docx'),
(30, 1, '2022-12-13', '2022-12-16', '1', 'hamil', 'Cuti', '872022DecTue131248Contoh Soal Cost Management.pptx'),
(31, 1, '2022-12-14', '2022-12-17', '2', 'sakit', 'Sakit', '9842022DecTue152516Soal_UTS_ManProTI_09_Okt_21.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal lahir` date NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nomor telepon` varchar(20) NOT NULL,
  `level` varchar(100) NOT NULL,
  `jatah cuti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `tanggal lahir`, `jabatan`, `email`, `password`, `nomor telepon`, `level`, `jatah cuti`) VALUES
(1, 'ryond', '2022-10-10', 'pegawai', 'abc@gmail.com', '123', '0839238392', 'pegawai', 3),
(2, '', '0000-00-00', '', 'def@gmail.com', '123', '08534849578', 'baka', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
