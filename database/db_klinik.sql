-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2020 pada 09.33
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `spesialis` varchar(70) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `nama`, `spesialis`, `alamat`, `no_hp`) VALUES
(5, 'ali', 'kulit', 'malang', '089787654'),
(6, 'Arika', 'Umum', 'Malang', '0897457363'),
(7, 'ali ali', 'mata', 'Malang', '000'),
(8, 'dokter', 'mata', 'Malang', '08967695769'),
(10, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(61, 'ilham', 'malang', '089746485'),
(65, 'ali', 'ali', '000'),
(66, 'karyawan', 'Malang', '08967695769'),
(67, 'yazid', 'malang', '0897457363'),
(68, 'hadi', 'malang', '089746485'),
(69, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id` int(80) NOT NULL,
  `rekam_medis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `rekam_medis`, `nama`, `usia`, `alamat`, `no_hp`) VALUES
(6, '099', 'ilham', '18', 'malang', '08967695769'),
(8, '099', 'Muhammad Ilham Ali', '18', 'Malang', '08967695769'),
(9, '0000', 'pasien', '18', 'malang', '08967695769'),
(10, '1', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sistem`
--

CREATE TABLE `tb_sistem` (
  `id` int(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `obat` varchar(100) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sistem`
--

INSERT INTO `tb_sistem` (`id`, `nama`, `tgl`, `diagnosa`, `nama_dokter`, `nama_admin`, `obat`, `total`) VALUES
(84, 'pasien', '2020-10-02', 'a', 'dokter', 'karyawan', 'ab', '13.000'),
(85, 'Budi Laksana', '2020-09-11', '', 'ali', 'ilham', '', ''),
(86, 'Budi Laksana', '2020-02-01', '', 'ali', 'ilham', '', ''),
(87, 'Budi Laksana', '2020-12-31', '', 'ali', 'ilham', '', ''),
(89, 'Budi Laksana', '2020-12-01', '', 'ali', 'ilham', '', ''),
(90, 'Budi Laksana', '2020-12-23', '', 'ali', 'ilham', '', ''),
(91, 'ilham', '2020-09-02', 'umum', 'Arika', 'ilham', 'sangobion', ''),
(92, 'ilham', '2020-09-04', '', 'ali', 'ilham', '', ''),
(95, 'Muhammad Ilham Ali', '2019-09-02', '', 'dokter', 'karyawan', '', ''),
(98, 'pasien', '2020-09-02', '', 'Arika', 'ilham', '', ''),
(99, 'Muhammad Ilham Ali', '2020-09-30', 'b', 'dokter', 'hadi', 'tetes tebu', '13.000'),
(100, 'ilham', '2020-10-06', '', 'ali', 'ilham', '', ''),
(101, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '2020-11-05', '', 'ali', 'ilham', '', ''),
(102, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '2020-11-05', '', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'ilham', '', ''),
(103, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '2020-11-05', '', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'ilham', '', ''),
(104, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '2020-09-02', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '12.000.000'),
(105, 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', '2020-09-02', 'kulit', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'Muhammad Ilham Ali Muhammad Ilham Ali Muhammad Ilham Ali', 'kalpanak', '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'ilham', 'ilham'),
(4, 'ali', 'ali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sistem`
--
ALTER TABLE `tb_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_sistem`
--
ALTER TABLE `tb_sistem`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
