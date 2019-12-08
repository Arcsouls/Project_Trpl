-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 06:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peramalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_Admin` int(11) NOT NULL,
  `Username` varchar(11) NOT NULL,
  `Password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_Admin`, `Username`, `Password`) VALUES
(1, 'Admin1', '12345'),
(2, 'Admin2', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `penambahan_darah_rs`
--

CREATE TABLE `penambahan_darah_rs` (
  `Id_Penambahan` int(10) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `A` int(10) DEFAULT NULL,
  `B` int(10) DEFAULT NULL,
  `O` int(10) DEFAULT NULL,
  `AB` int(10) DEFAULT NULL,
  `Id_RS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penambahan_darah_rs`
--

INSERT INTO `penambahan_darah_rs` (`Id_Penambahan`, `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RS`) VALUES
(4, '2019-11-01 17:00:00', 2, 0, 0, 0, 1),
(12, '2019-11-30 21:47:34', 2, 0, 0, 0, 1),
(13, '2019-11-30 21:49:33', 3, 0, 0, 0, 1),
(14, '2019-11-30 22:44:18', 5, 5, 0, 0, 1),
(15, '2019-11-30 22:44:55', 5, 5, 0, 0, 1),
(16, '2019-11-30 22:57:11', 10, 10, 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_darah_rs`
--

CREATE TABLE `pengambilan_darah_rs` (
  `Id_Pengambilan` int(10) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `A` int(10) DEFAULT NULL,
  `B` int(10) DEFAULT NULL,
  `O` int(11) DEFAULT NULL,
  `AB` int(11) DEFAULT NULL,
  `Id_RS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan_darah_rs`
--

INSERT INTO `pengambilan_darah_rs` (`Id_Pengambilan`, `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RS`) VALUES
(3, '2019-11-29 17:00:00', 10, 10, 10, 10, 1),
(4, '2019-11-29 17:00:00', 10, 10, 10, 10, 2),
(5, '0000-00-00 00:00:00', 0, 0, 0, 2, 1),
(6, '2019-11-30 22:10:10', 2, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `Id_Permintaan` int(11) NOT NULL,
  `Bulan_Permintaan` varchar(100) NOT NULL,
  `Goldar_A` int(11) NOT NULL,
  `Goldar_B` int(11) NOT NULL,
  `Goldar_AB` int(11) NOT NULL,
  `Goldar_O` int(11) NOT NULL,
  `Id_RS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`Id_Permintaan`, `Bulan_Permintaan`, `Goldar_A`, `Goldar_B`, `Goldar_AB`, `Goldar_O`, `Id_RS`) VALUES
(11, '2019-03', 12, 3, 7, 15, 1),
(13, '2019-02', 15, 5, 10, 10, 1),
(14, '2019-01', 10, 5, 10, 5, 1),
(15, '2020-11', 10, 10, 10, 10, 2),
(16, '2019-12', 12, 12, 12, 12, 1),
(17, '2019-12', 10, 10, 10, 10, 3),
(18, '2020-03', 100, 10, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `Id_prediksi` int(11) NOT NULL,
  `Bulan_prediksi` varchar(100) NOT NULL,
  `Goldar_A` int(11) NOT NULL,
  `Goldar_B` int(11) NOT NULL,
  `Goldar_AB` int(11) NOT NULL,
  `Goldar_O` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`Id_prediksi`, `Bulan_prediksi`, `Goldar_A`, `Goldar_B`, `Goldar_AB`, `Goldar_O`) VALUES
(11, '2019-03', 12, 3, 7, 15),
(13, '2019-02', 15, 5, 10, 10),
(14, '2019-01', 10, 5, 10, 5),
(15, '2019-11', 22, 22, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_darah_rs`
--

CREATE TABLE `riwayat_darah_rs` (
  `Id_pengiriman` int(11) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `O` int(11) NOT NULL,
  `AB` int(11) NOT NULL,
  `Id_RS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_darah_rs`
--

INSERT INTO `riwayat_darah_rs` (`Id_pengiriman`, `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RS`) VALUES
(0, '2019-11-30 22:57:11', 10, 10, 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stokdarah`
--

CREATE TABLE `stokdarah` (
  `Id_Darah` int(11) NOT NULL,
  `Goldar_A` int(11) NOT NULL DEFAULT '0',
  `Goldar_B` int(11) NOT NULL DEFAULT '0',
  `Goldar_AB` int(11) NOT NULL DEFAULT '0',
  `Goldar_O` int(11) NOT NULL DEFAULT '0',
  `Id_RS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stokdarah`
--

INSERT INTO `stokdarah` (`Id_Darah`, `Goldar_A`, `Goldar_B`, `Goldar_AB`, `Goldar_O`, `Id_RS`) VALUES
(23, 48, 46, 46, 19, 1),
(24, 100, 20, 45, 80, 2),
(26, 9, 10, 10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_RS` int(11) NOT NULL,
  `Nama_Rumah_Sakit` varchar(100) NOT NULL,
  `Alamat_Rumah_Sakit` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Limit_Stok` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_RS`, `Nama_Rumah_Sakit`, `Alamat_Rumah_Sakit`, `email`, `Limit_Stok`, `Username`, `Password`) VALUES
(1, 'Rumah Sakit A', 'Jl. Pedang no. 10', 'RSA@gmail.com', 50, 'RSA', '123'),
(2, 'Rumah Sakit B', 'Jl. Perisai no. 15', 'RSB@gmail.com', 80, 'RSB', '321'),
(3, 'Rumah Sakit C', 'Jl. Tombak no. 11', 'RSC@gmail.com', 60, 'RSC', '123'),
(4, 'Rumah Sakit D', 'jl mawar', 'jua@gmail.com', 10, 'RSD', '1234'),
(5, '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_Admin`);

--
-- Indexes for table `penambahan_darah_rs`
--
ALTER TABLE `penambahan_darah_rs`
  ADD PRIMARY KEY (`Id_Penambahan`);

--
-- Indexes for table `pengambilan_darah_rs`
--
ALTER TABLE `pengambilan_darah_rs`
  ADD PRIMARY KEY (`Id_Pengambilan`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`Id_Permintaan`),
  ADD KEY `Id_RS` (`Id_RS`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`Id_prediksi`);

--
-- Indexes for table `riwayat_darah_rs`
--
ALTER TABLE `riwayat_darah_rs`
  ADD PRIMARY KEY (`Id_pengiriman`);

--
-- Indexes for table `stokdarah`
--
ALTER TABLE `stokdarah`
  ADD PRIMARY KEY (`Id_Darah`),
  ADD KEY `Id_RS` (`Id_RS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_RS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penambahan_darah_rs`
--
ALTER TABLE `penambahan_darah_rs`
  MODIFY `Id_Penambahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengambilan_darah_rs`
--
ALTER TABLE `pengambilan_darah_rs`
  MODIFY `Id_Pengambilan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `Id_Permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `Id_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stokdarah`
--
ALTER TABLE `stokdarah`
  MODIFY `Id_Darah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_RS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penambahan_darah_rs`
--
ALTER TABLE `penambahan_darah_rs`
  ADD CONSTRAINT `penambahan_darah_rs_ibfk_1` FOREIGN KEY (`Id_RS`) REFERENCES `user` (`Id_RS`);

--
-- Constraints for table `pengambilan_darah_rs`
--
ALTER TABLE `pengambilan_darah_rs`
  ADD CONSTRAINT `pengambilan_darah_rs_ibfk_1` FOREIGN KEY (`Id_RS`) REFERENCES `user` (`Id_RS`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`Id_RS`) REFERENCES `user` (`Id_RS`);

--
-- Constraints for table `riwayat_darah_rs`
--
ALTER TABLE `riwayat_darah_rs`
  ADD CONSTRAINT `riwayat_darah_rs_ibfk_1` FOREIGN KEY (`Id_RS`) REFERENCES `user` (`Id_RS`);

--
-- Constraints for table `stokdarah`
--
ALTER TABLE `stokdarah`
  ADD CONSTRAINT `stokdarah_ibfk_1` FOREIGN KEY (`Id_RS`) REFERENCES `user` (`Id_RS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
