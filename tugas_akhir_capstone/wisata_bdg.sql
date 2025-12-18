-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2025 pada 04.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_bdg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `waktu_perjalanan` int(11) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `layanan_pilihan` text DEFAULT NULL,
  `harga_paket` decimal(10,2) DEFAULT NULL,
  `jumlah_tagihan` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `nomor_hp`, `tanggal_pesan`, `waktu_perjalanan`, `jumlah_peserta`, `layanan_pilihan`, `harga_paket`, `jumlah_tagihan`) VALUES
(2, 'Rezza Dinulhaq', '08131313424', '2025-12-17', 1, 1, 'Tenda, Sleeping Bag, Orchid Forest', 105000.00, 105000.00),
(3, 'bunga', '08131313424', '2025-12-13', 1, 1, 'Paket Masak, Orchid Forest', 65000.00, 65000.00),
(4, 'STARBOY', '0801380174017', '2025-12-19', 1, 1, 'Tenda, Sleeping Bag, Orchid Forest, Sunrise Point', 120000.00, 120000.00),
(5, 'Jeno', '0830183017', '2026-01-01', 1, 5, 'Tenda, Sleeping Bag, Paket Masak, Sunrise Point', 105000.00, 525000.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
