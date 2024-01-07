-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 05.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(9, 'BR001', 12, 'Pulpen', 'Joyko', '2000', 'PCS', '213', '19 December 2023, 7:42', NULL),
(10, 'BR002', 12, 'Pulpen', 'Standard AE7', '2500', 'PCS', '267', '19 December 2023, 14:29', NULL),
(11, 'BR003', 12, 'Pulpen', 'Standard R6', '3000', 'PCS', '289', '19 December 2023, 14:29', '19 December 2023, 14:29'),
(12, 'BR004', 12, 'Pulpen', 'Faster C600', '3000', 'PCS', '197', '19 December 2023, 16:39', NULL),
(13, 'BR005', 12, 'Pulpen', 'Snowman Calligraphy', '8000', 'PCS', '250', '19 December 2023, 16:40', NULL),
(14, 'BR006', 12, 'Pensil', 'Joyko', '1500', 'PCS', '200', '19 December 2023, 16:40', NULL),
(15, 'BR007', 12, 'Pensil', 'Faber Castel', '4000', 'PCS', '250', '19 December 2023, 16:41', NULL),
(16, 'BR008', 12, 'Pensil', 'Staedlear', '2000', 'PCS', '100', '19 December 2023, 16:41', NULL),
(17, 'BR009', 12, 'Pensil', 'Kenko', '2500', 'PCS', '199', '19 December 2023, 16:42', NULL),
(18, 'BR010', 12, 'Spidol', 'Snowman', '10000', 'PCS', '199', '19 December 2023, 16:43', NULL),
(19, 'BR011', 12, 'Spidol', 'Standard Permanent P77', '5000', 'PCS', '100', '19 December 2023, 16:44', NULL),
(20, 'BR012', 12, 'Spidol', 'Faster', '7500', 'PCS', '100', '19 December 2023, 16:45', NULL),
(21, 'BR013', 12, 'Spidol Warna', 'Spidol Standard CM2 ', '2000', 'PCS', '100', '19 December 2023, 16:46', NULL),
(22, 'BR014', 13, 'Lakban Bening', 'Seikomori', '8500', 'PCS', '100', '19 December 2023, 16:48', NULL),
(23, 'BR015', 13, 'Lakban Kain (hitam)', 'Kenko Black', '15000', 'PCS', '150', '19 December 2023, 16:51', NULL),
(24, 'BR016', 13, 'Amplop', 'Paperline Amplop (Small)', '500', 'PCS', '150', '19 December 2023, 16:53', '19 December 2023, 16:58'),
(25, 'BR017', 13, 'Amplop', 'Paperline Amplop (Big)', '1000', 'PCS', '150', '19 December 2023, 16:58', NULL),
(26, 'BR018', 14, 'Minuman Botol', 'Ades', '3000', 'PCS', '200', '19 December 2023, 16:58', NULL),
(27, 'BR019', 14, 'Minuman Botol', 'Frestea Madu', '4000', 'PCS', '99', '19 December 2023, 17:00', NULL),
(28, 'BR020', 14, 'Minuman Botol', 'Frestea Apple', '4000', 'PCS', '100', '19 December 2023, 17:01', NULL),
(29, 'BR021', 14, 'Minuman Botol', 'Teh Pucuk', '3500', 'PCS', '94', '19 December 2023, 17:01', NULL),
(30, 'BR022', 14, 'Minuman Botol', 'Pulpy Orange', '6000', 'PCS', '90', '19 December 2023, 17:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(12, 'ATK', '19 December 2023, 7:42'),
(13, 'Material', '19 December 2023, 7:42'),
(14, 'Minuman', '19 December 2023, 7:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_member`, `nm_member`, `pass`, `id_login`, `user`, `alamat_member`, `telepon`, `gambar`) VALUES
(1, 'Fatih', '202cb962ac59075b964b07152d234b70', 1, 'rpl', 'Jl. Swadaya No. 13 Rt.02/Rw.03', '085692569477', '1702946501Logo Rajawali.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_pembayaran`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(64, 18, 'BR001', 1, '3', '6000', '22 December 2023, 8:40', '12-2023'),
(65, 18, 'BR003', 0, '2', '6000', '22 December 2023, 8:40', '12-2023'),
(66, 19, 'BR021', 1, '3', '10500', '22 December 2023, 8:41', '12-2023'),
(67, 19, 'BR022', 0, '2', '12000', '22 December 2023, 8:41', '12-2023'),
(68, 20, 'BR002', 1, '10', '25000', '22 December 2023, 12:40', '12-2023'),
(69, 21, 'BR001', 1, '3', '6000', '5 January 2024, 20:09', '01-2024'),
(70, 21, 'BR002', 0, '10', '25000', '22 December 2023, 12:40', '01-2024'),
(71, 22, 'BR003', 1, '2', '6000', '6 January 2024, 8:31', '01-2024'),
(72, 22, 'BR004', 0, '3', '9000', '6 January 2024, 8:31', '01-2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(50) NOT NULL,
  `id_member` int(50) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `harga_byr` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `kembali` varchar(225) NOT NULL,
  `tanggal_input` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`) VALUES
(118, 'BR004', 1, '3', '9000', '6 January 2024, 8:31'),
(119, 'BR003', 1, '2', '6000', '6 January 2024, 8:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
