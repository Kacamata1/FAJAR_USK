-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2023 pada 01.36
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
-- Database: `printer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto`, `harga`, `stok`, `deskripsi`) VALUES
(3, 'printer epsonCba120V', 'epson.jpg', 100000, 10, 'MURAH BANGET'),
(4, 'hp apv12c', 'hpprinter.jpg', 1800000, 2, 'murah sangat'),
(5, 'pixma canon 120jv', 'pixmacanon.jpg', 200000, 18, 'berkualitas'),
(6, 'epson trek02', 'epson2.jpg', 2111111, 18, 'kelas bagus'),
(7, 'tsc printer901mk', 'tscprinter.jpg', 1800000, 5, 'bagus'),
(8, 'brotherepson19ov', 'brotherprint.jpg', 160000, 21, 'modern'),
(9, 'hp printer17mv', 'hpprinter2.jpg', 1500000, 15, 'murah'),
(10, 'epson as19k', 'epson as19kk.jpg', 220000, 8, 'murahbiasa'),
(11, 'epson tre generasi', 'epson tre generasi.jpg', 18999999, 4, 'berkualitas murah'),
(12, 'epson2018kmn', 'epson2018kmn.jpg', 140000, 17, 'modern v2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(25) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('proses','berhasil','gagal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text DEFAULT NULL,
  `roles` enum('Admin','Customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `foto`, `roles`) VALUES
(1, 'Fajar Admin', 'fajaradmin', '123', 'fajar.JPG', 'Admin'),
(12, 'zindan', 'ghina sayang jidan', '123', 'WIN_20221208_10_51_34_Pro.jpg', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
