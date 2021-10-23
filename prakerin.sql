-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 03:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat_perusahaan`, `no_telp`) VALUES
(1, 'PT. Mencari Cinta Sejati', 'Jl. Patah Hati No 34', '(021) 1564138'),
(2, 'PT. Tokopedia Indonesia', 'jl. Soekarno Hatta  no 121', '(021) 2613541'),
(3, 'PT. Ovo Payment', 'Jl. Merdeka No 210', '(021) 6521872');

-- --------------------------------------------------------

--
-- Table structure for table `prakerin`
--

CREATE TABLE `prakerin` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_prakerin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prakerin`
--

INSERT INTO `prakerin` (`id`, `id_user`, `id_siswa`, `id_perusahaan`, `tgl_mulai`, `tgl_kembali`, `status_prakerin`) VALUES
(7, 4, 4, 2, '2021-08-02', '2021-10-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_user`, `id_perusahaan`, `nama`, `jenis_kelamin`, `kelas`, `jurusan`, `status`) VALUES
(4, 4, 2, 'Lillik Pratama S', 'Laki-laki', '11OTKP1', 'OTKP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `jabatan`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'administrator'),
(2, 'kepsek', 'e10adc3949ba59abbe56e057f20f883e', 'kepsek'),
(3, 'kajur', 'e10adc3949ba59abbe56e057f20f883e', 'kajur'),
(4, '1111', 'e10adc3949ba59abbe56e057f20f883e', 'siswa'),
(5, '1112', 'e10adc3949ba59abbe56e057f20f883e', 'siswa'),
(7, '1113', 'e10adc3949ba59abbe56e057f20f883e', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prakerin`
--
ALTER TABLE `prakerin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prakerin`
--
ALTER TABLE `prakerin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
