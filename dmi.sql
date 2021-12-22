-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Nov 2021 pada 12.03
-- Versi server: 8.0.26-0ubuntu0.20.04.3
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int NOT NULL,
  `id_kartu` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `beras` int DEFAULT NULL,
  `telur` int DEFAULT NULL,
  `telur_beras` int DEFAULT NULL,
  `status_waktu_pengambilan` enum('N','Y') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_pengambilan` int NOT NULL,
  `max_pengambilan` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `id_kartu`, `beras`, `telur`, `telur_beras`, `status_waktu_pengambilan`, `status_pengambilan`, `max_pengambilan`, `updated_at`) VALUES
(1, '20211f1b1', 0, 0, 0, 'Y', 0, 1, '2021-10-16 15:06:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
