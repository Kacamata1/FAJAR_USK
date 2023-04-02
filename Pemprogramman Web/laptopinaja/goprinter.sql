-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 09:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goprinter`
--

-- --------------------------------------------------------

--
-- Table structure for table `printer_tb`
--

CREATE TABLE `printer_tb` (
  `idPrinter` int(10) NOT NULL,
  `NamaPrinter` char(50) DEFAULT NULL,
  `SpesifikasiPrinter` char(50) DEFAULT NULL,
  `HargaPrinter` int(50) DEFAULT NULL,
  `GambarPrinter` varchar(50) NOT NULL,
  `UserIdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printer_tb`
--

INSERT INTO `printer_tb` (`idPrinter`, `NamaPrinter`, `SpesifikasiPrinter`, `HargaPrinter`, `GambarPrinter`, `UserIdUser`) VALUES
(8, 'hp deskjet 2655', 'All In One Printer', 6000000, 'img-banner.png', NULL),
(9, 'Canon 3040', 'Printer Terbaru', 3000000, 'product.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(10) NOT NULL,
  `Jumlah` int(10) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `HargaPrinter` int(50) DEFAULT NULL,
  `UserIdUser` int(11) NOT NULL,
  `Printer_tblIdPrinter` int(11) NOT NULL,
  `UserIdUser2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `Jumlah`, `subtotal`, `status`, `tanggal`, `HargaPrinter`, `UserIdUser`, `Printer_tblIdPrinter`, `UserIdUser2`) VALUES
(1, 3, 9000000, 2, '2022-04-08 03:17:05', 3000000, 1, 9, 1),
(2, 1, 3000000, 3, '2022-04-08 05:38:07', 3000000, 1, 9, 1),
(3, 1, 3000000, 1, '2022-04-08 05:41:29', 3000000, 1, 9, 1),
(4, 2, 12000000, 1, '2022-04-08 05:41:29', 6000000, 1, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `Username`, `Password`) VALUES
(1, 'user', 'user'),
(2, 'admin', 'admin'),
(4, 'tes', '$2y$10$HDe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printer_tb`
--
ALTER TABLE `printer_tb`
  ADD PRIMARY KEY (`idPrinter`),
  ADD UNIQUE KEY `UserIdUser` (`UserIdUser`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printer_tb`
--
ALTER TABLE `printer_tb`
  MODIFY `idPrinter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `printer_tb`
--
ALTER TABLE `printer_tb`
  ADD CONSTRAINT `printer_tb_ibfk_1` FOREIGN KEY (`UserIdUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
