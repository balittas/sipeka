-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2021 pada 04.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_balittas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_capaian`
--

CREATE TABLE `tb_capaian` (
  `id` int(11) NOT NULL,
  `id_pk` int(11) NOT NULL,
  `capaian` varchar(500) NOT NULL,
  `permasalahan` varchar(500) NOT NULL,
  `tindak_lanjut` varchar(500) NOT NULL,
  `evaluasi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_capaian`
--

INSERT INTO `tb_capaian` (`id`, `id_pk`, `capaian`, `permasalahan`, `tindak_lanjut`, `evaluasi`, `tanggal`, `keterangan`) VALUES
(6, 7, '20', 'pandemi', 'penjadwalan ulang', 'melakukan koordinasi ulang', '2021-06-06', 'lanjut'),
(7, 8, '30', 'pandemi', 'penjadwalan ulang', 'koordinasi ulang', '2021-06-04', 'lanjut'),
(8, 9, '20', 'pandemi', 'penjadwalan ulang', 'koordinasi ulang', '2021-06-01', 'lanjutkan'),
(9, 10, '30', 'pandemi covid', 'penjadwalan ulang', 'koordinasi ulang', '2021-06-03', 'Lanjutkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pk`
--

CREATE TABLE `tb_pk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sasaran` varchar(1000) NOT NULL,
  `kode` varchar(500) NOT NULL,
  `indikator_kerja` varchar(1000) NOT NULL,
  `target` varchar(500) NOT NULL,
  `PIC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pk`
--

INSERT INTO `tb_pk` (`id`, `id_user`, `sasaran`, `kode`, `indikator_kerja`, `target`, `PIC`) VALUES
(7, 7, 'Teknologi Pertanian', '1-2', 'Pertanian', '80', 'nadila'),
(8, 7, 'Birokrasi akuntabel berkualitas', '3-4', 'Nilai Pembangunan', '100', 'nadila'),
(9, 8, 'Tanaman Serat', '1-2', 'serat buah-buahan', '75', 'nada'),
(10, 10, 'Tanaman Serat', '1-2', 'Pertanian', '90', 'Okta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `hak_akses`) VALUES
(7, 'nadila', 'nadila', 'pk1'),
(8, 'nada', 'nada', 'pk4'),
(9, 'sasa', 'sasa', 'pk3'),
(10, 'okta', 'okta', 'pk2'),
(11, 'petugas', 'petugas', 'admin'),
(14, 'rara', 'rara', 'pk5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_capaian`
--
ALTER TABLE `tb_capaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pk` (`id_pk`);

--
-- Indeks untuk tabel `tb_pk`
--
ALTER TABLE `tb_pk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hak_akses` (`hak_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_capaian`
--
ALTER TABLE `tb_capaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pk`
--
ALTER TABLE `tb_pk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_capaian`
--
ALTER TABLE `tb_capaian`
  ADD CONSTRAINT `FK_tb_capaian_tb_pk` FOREIGN KEY (`id_pk`) REFERENCES `tb_pk` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pk`
--
ALTER TABLE `tb_pk`
  ADD CONSTRAINT `FK_tb_pk_tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
