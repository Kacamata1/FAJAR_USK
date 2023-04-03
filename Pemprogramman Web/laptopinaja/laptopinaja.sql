-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2023 pada 06.35
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptopinaja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laptop_tb`
--

CREATE TABLE `laptop_tb` (
  `id_laptop` int(10) NOT NULL,
  `nama_laptop` char(50) DEFAULT NULL,
  `spesifikasi_laptop` char(50) DEFAULT NULL,
  `harga_laptop` int(50) DEFAULT NULL,
  `gambar_laptop` varchar(50) NOT NULL,
  `UserIdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laptop_tb`
--

INSERT INTO `laptop_tb` (`id_laptop`, `nama_laptop`, `spesifikasi_laptop`, `harga_laptop`, `gambar_laptop`, `UserIdUser`) VALUES
(10, 'MSI', 'LAPTOP GAMING', 25000000, 'MSI.jfif', NULL),
(11, 'MSI FI GEN2', 'MODE GAMING RTX2010', 20000000, 'MSI FI20RTX.jfif', NULL),
(13, 'ASUS FLIP R55', 'MODERN LAPTOP FLIP GEN4\r\n', 2000000, 'asus flip r55.jfif', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(10) NOT NULL,
  `Jumlah` int(10) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `harga_laptop` int(50) DEFAULT NULL,
  `UserIdUser` int(11) NOT NULL,
  `laptop_tblid_laptop` int(11) NOT NULL,
  `UserIdUser2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `Jumlah`, `subtotal`, `status`, `tanggal`, `harga_laptop`, `UserIdUser`, `laptop_tblid_laptop`, `UserIdUser2`) VALUES
(5, 1, 4000000, 1, '2023-03-31 15:17:53', 4000000, 1, 14, 1),
(6, 1, 14000000, 1, '2023-03-31 15:30:43', 14000000, 1, 12, 1),
(7, 1, 4000000, 1, '2023-03-31 15:30:43', 4000000, 1, 14, 1),
(8, 14, 28000000, 2, '2023-04-02 12:49:46', 2000000, 1, 13, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `Username`, `Password`) VALUES
(1, 'user', 'user'),
(2, 'admin', 'admin'),
(4, 'tes', '$2y$10$HDe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laptop_tb`
--
ALTER TABLE `laptop_tb`
  ADD PRIMARY KEY (`id_laptop`),
  ADD UNIQUE KEY `UserIdUser` (`UserIdUser`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laptop_tb`
--
ALTER TABLE `laptop_tb`
  MODIFY `id_laptop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laptop_tb`
--
ALTER TABLE `laptop_tb`
  ADD CONSTRAINT `laptop_tb_ibfk_1` FOREIGN KEY (`UserIdUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
