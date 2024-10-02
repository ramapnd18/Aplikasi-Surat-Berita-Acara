-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 12:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(10) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `level`) VALUES
(5, 'admin', 'admin', 'admin'),
(9, 'amon', 'amon', 'petugas'),
(10, 'r', 'r', 'pelayanan'),
(11, 'a', 'a', 'petugas'),
(13, 'petugas', 'petugas', 'petugas'),
(14, 'pelayanan', 'pelayanan', 'pelayanan'),
(15, 'rama', 'rama', 'pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `data_baru`
--

CREATE TABLE `data_baru` (
  `id_data_baru` int(5) NOT NULL,
  `nop_baru` varchar(25) DEFAULT NULL,
  `nama_wp_baru` varchar(30) DEFAULT NULL,
  `alamat_baru` varchar(30) DEFAULT NULL,
  `desa_wp_baru` varchar(20) DEFAULT NULL,
  `rt_wp_baru` varchar(3) DEFAULT NULL,
  `rw_wp_baru` varchar(2) DEFAULT NULL,
  `kabupaten_baru` varchar(20) DEFAULT NULL,
  `letak_op_baru` varchar(30) DEFAULT NULL,
  `desa_op_baru` varchar(20) DEFAULT NULL,
  `rt_op_baru` varchar(3) DEFAULT NULL,
  `rw_op_baru` varchar(2) DEFAULT NULL,
  `kecamatan_baru` varchar(20) DEFAULT NULL,
  `bumi_baru` int(6) DEFAULT NULL,
  `bangunan_baru` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_baru`
--

INSERT INTO `data_baru` (`id_data_baru`, `nop_baru`, `nama_wp_baru`, `alamat_baru`, `desa_wp_baru`, `rt_wp_baru`, `rw_wp_baru`, `kabupaten_baru`, `letak_op_baru`, `desa_op_baru`, `rt_op_baru`, `rw_op_baru`, `kecamatan_baru`, `bumi_baru`, `bangunan_baru`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(9, '32.19.040.007.024.0044.0', 'MUHDI', 'KALAPATIGA', 'BABAKAN', '004', '09', 'PANGANDARAN', 'JL SUKAHURIP', 'SUKAHURIP', '002', '01', 'PANGANDARAN', 4052, 0),
(10, '32.19.040.003.007.0001.0', 'YONO SUYONO', 'DUSUN PARAPAT', 'PANGANDARAN', '009', '01', 'PANGANDARAN', 'JL SILIWANGI', 'WONOHARJO', '001', '03', 'PANGANDARAN', 98, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_lama`
--

CREATE TABLE `data_lama` (
  `id_data_lama` int(5) NOT NULL,
  `nop_lama` varchar(25) DEFAULT NULL,
  `nama_wp_lama` varchar(30) DEFAULT NULL,
  `alamat_lama` varchar(30) DEFAULT NULL,
  `desa_wp_lama` varchar(20) DEFAULT NULL,
  `rt_wp_lama` varchar(3) DEFAULT NULL,
  `rw_wp_lama` varchar(2) DEFAULT NULL,
  `kabupaten_lama` varchar(20) DEFAULT NULL,
  `letak_op_lama` varchar(30) DEFAULT NULL,
  `desa_op_lama` varchar(20) DEFAULT NULL,
  `rt_op_lama` varchar(3) DEFAULT NULL,
  `rw_op_lama` varchar(2) DEFAULT NULL,
  `kecamatan_lama` varchar(20) DEFAULT NULL,
  `bumi_lama` int(6) DEFAULT NULL,
  `bangunan_lama` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_lama`
--

INSERT INTO `data_lama` (`id_data_lama`, `nop_lama`, `nama_wp_lama`, `alamat_lama`, `desa_wp_lama`, `rt_wp_lama`, `rw_wp_lama`, `kabupaten_lama`, `letak_op_lama`, `desa_op_lama`, `rt_op_lama`, `rw_op_lama`, `kecamatan_lama`, `bumi_lama`, `bangunan_lama`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(9, '32.19.040.007.024.0044.0', 'MUHDI', 'DUSUN KALAPATIGA', 'BABAKAN', '004', '09', 'PANGANDARAN', 'JL SUKAHURIP', 'SUKAHURIP', '0', '0', 'PANGANDARAN', 4100, 0),
(10, '32.19.050.007.037.0074.0', 'CICIH', 'GN KARIKIL', 'TUGURAJA', '004', '07', 'PANGANDARAN', 'KARANG SIMPANG', 'BANJARHARJA', '009', '09', 'KALIPUCANG', 372, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_verifikasi`
--

CREATE TABLE `hasil_verifikasi` (
  `id_verifikasi` int(10) NOT NULL,
  `no_pelayanan` varchar(13) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `hasil` varchar(900) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_verifikasi`
--

INSERT INTO `hasil_verifikasi` (`id_verifikasi`, `no_pelayanan`, `status`, `hasil`, `id_user`) VALUES
(34, '2023.0014.141', 'DIKABULKAN', 'Berdasarkan penjelasan dari pemerintah desa dan berdasarkan cek fisik dilapngan luas yang benar adalah 4052 m2 sesuai dengan hasil ukur yang dilakukan oleh pemerintah desa adapun pengurangan luas tersebut sebagian terpotong digunakan untuk jalan\r\n', 13),
(35, '2023.0014.152', 'DIKABULKAN', 'Berdasarkan keterangan dari pemerintah desa dan berdasarkan cek fisik dilapangan objek tersebut ada dan yang berbatasan membenarkan bahwa objek tersebut dikuasai oleh pemohon ,dan belum terbit SPPT\r\n', 13),
(36, '2023.0014.035', 'DIKABULKAN', 'Berdasarkan informasi dari pemerintah desa bahwa objek tersebut sudah digabungkan ke Nop 037.0075 atas nama Asep Cahyo\r\n', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `no_pelayanan` varchar(13) NOT NULL,
  `jenis_pelayanan` varchar(10) DEFAULT NULL,
  `id_data_lama` int(5) DEFAULT NULL,
  `id_data_baru` int(5) DEFAULT NULL,
  `perubah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`no_pelayanan`, `jenis_pelayanan`, `id_data_lama`, `id_data_baru`, `perubah`) VALUES
('2023.0014.035', 'Pembatalan', 10, 0, 'petugas'),
('2023.0014.141', 'Pembetulan', 9, 9, 'petugas'),
('2023.0014.152', 'Data Baru', 0, 10, 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `data_baru`
--
ALTER TABLE `data_baru`
  ADD PRIMARY KEY (`id_data_baru`);

--
-- Indexes for table `data_lama`
--
ALTER TABLE `data_lama`
  ADD PRIMARY KEY (`id_data_lama`);

--
-- Indexes for table `hasil_verifikasi`
--
ALTER TABLE `hasil_verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD KEY `no_pelayanan` (`no_pelayanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`no_pelayanan`),
  ADD KEY `id_data_baru` (`id_data_baru`),
  ADD KEY `id_data_lama` (`id_data_lama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_baru`
--
ALTER TABLE `data_baru`
  MODIFY `id_data_baru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_lama`
--
ALTER TABLE `data_lama`
  MODIFY `id_data_lama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil_verifikasi`
--
ALTER TABLE `hasil_verifikasi`
  MODIFY `id_verifikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_verifikasi`
--
ALTER TABLE `hasil_verifikasi`
  ADD CONSTRAINT `hasil_verifikasi_ibfk_1` FOREIGN KEY (`no_pelayanan`) REFERENCES `pelayanan` (`no_pelayanan`),
  ADD CONSTRAINT `hasil_verifikasi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`);

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_1` FOREIGN KEY (`id_data_lama`) REFERENCES `data_lama` (`id_data_lama`),
  ADD CONSTRAINT `pelayanan_ibfk_2` FOREIGN KEY (`id_data_baru`) REFERENCES `data_baru` (`id_data_baru`),
  ADD CONSTRAINT `pelayanan_ibfk_3` FOREIGN KEY (`id_data_lama`) REFERENCES `data_lama` (`id_data_lama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
