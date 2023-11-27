-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 07:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuanganakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` varchar(10) NOT NULL,
  `NamaMahasiswa` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `TglDaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `ProgramStudi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `NamaMahasiswa`, `Password`, `TglDaftar`, `ProgramStudi`) VALUES
('2055201007', 'VIVIN TAMARA', '2055201007', '2023-11-27 07:00:16', '55201'),
('2055201016', 'Eri Yulian Hidayat', '2055201016', '2023-11-27 07:35:38', '55201');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `KodePengguna` varchar(10) NOT NULL,
  `NamaPengguna` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Level` enum('Petugas','Kepala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`KodePengguna`, `NamaPengguna`, `Password`, `Level`) VALUES
('123456', 'Kasir 1', '123456', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `IdTagihan` varchar(11) NOT NULL,
  `TglTagihan` datetime NOT NULL DEFAULT current_timestamp(),
  `NamaTagihan` varchar(50) NOT NULL,
  `BesarTagihan` double(12,2) NOT NULL,
  `KodePengguna` varchar(10) NOT NULL,
  `SaldoTagihan` double(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`IdTagihan`, `TglTagihan`, `NamaTagihan`, `BesarTagihan`, `KodePengguna`, `SaldoTagihan`) VALUES
('SPP2020', '2023-11-27 11:41:38', 'SPP angkatan 2020', 1500000.00, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `IdTransaksi` int(11) NOT NULL,
  `TglTransaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `IdTagihan` varchar(11) NOT NULL,
  `NPM` varchar(10) NOT NULL,
  `BesarTransaksi` double(12,2) NOT NULL,
  `BesarPembayaran` double(12,2) NOT NULL,
  `TglBayar` datetime DEFAULT NULL,
  `KodeBank` varchar(10) DEFAULT NULL,
  `IdTransaksiBank` varchar(30) DEFAULT NULL,
  `KodePengguna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`IdTransaksi`, `TglTransaksi`, `IdTagihan`, `NPM`, `BesarTransaksi`, `BesarPembayaran`, `TglBayar`, `KodeBank`, `IdTransaksiBank`, `KodePengguna`) VALUES
(1, '2023-11-27 11:41:38', 'SPP2020', '2055201007', 1500000.00, 0.00, NULL, NULL, NULL, ''),
(2, '2023-11-27 11:41:38', 'SPP2020', '2055201016', 1500000.00, 0.00, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`KodePengguna`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`IdTagihan`),
  ADD KEY `IndexPengguna` (`KodePengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IdTransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `IdTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
