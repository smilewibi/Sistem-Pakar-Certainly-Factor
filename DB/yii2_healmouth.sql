-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2019 pada 10.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2_healmouth`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `akode_gejala` varchar(10) NOT NULL,
  `ya` varchar(255) NOT NULL,
  `tidak` varchar(255) NOT NULL,
  `cfuser` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `kode_diagnosa` varchar(10) NOT NULL,
  `nama_diagnosa` varchar(255) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`kode_diagnosa`, `nama_diagnosa`, `solusi`) VALUES
('PM001', 'Radang Gusi', '- membersihkan gigi dengan benang (minimal sekali sehari)\r\n- menyikat gigi (2x sehari)\r\n- menggunakan pasta gigi dan obat kumur'),
('PM002', 'Kanker Lidah', '- melakukan operasi\r\n-melakukan radioterapi\r\n- melakukan kemoterapi'),
('PM003', 'Abses Gusi', '-mencabut gigi yang terinfeksi\r\n- memberikan antibiotik'),
('PM004', 'Sariawan', '- kumur dengan larutan obat kumur\r\n- salep dan obat sariawan\r\n- perbanyak konsumsi yang mengandung vit C'),
('PM005', 'Tumor gigi', '- dilakukan operasi'),
('PM006', 'Coxsackie', '- istirahat yang cukup\r\n- minum air putih yang banyak\r\n- minum obat penghilang rasa sakit(sesuai resep dokter)'),
('PM007', 'Kanker Mulut', '- dilakukan operasi\r\n-radioterapi\r\n- kemoterapi'),
('PM008', 'Karies Gigi', '- dilakukan penambalan pada gigi berlubang\r\n- menjaga kebersihan mulut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G0001', 'Bau mulut'),
('G0002', 'sakit tenggorokan yang berlangsung terus-menerus'),
('G0003', 'demam'),
('G0004', 'sakit saat menelan'),
('G0005', 'gusi bengkak'),
('G0006', 'bercak berwarna merah atau putih'),
('G0007', 'sariawan yang tidak kunjung sembuh'),
('G0008', 'perubahan warna gusi menjadi merah tua'),
('G0009', 'gusi rentan mengalami pendarahan'),
('G0010', 'gusi yang mengerut'),
('G0011', 'rasa kebal dalam mulut yang tidak kunjung sembuh'),
('G0012', 'pendarahan tanpa sebab yang jelas pada lidah'),
('G0013', 'rasa sakit pada telinga'),
('G0014', 'nyeri pada rahang'),
('G0015', 'luka yang muncul dari dalam mulut(gusi,lidah,bibir, dan langit mulut)'),
('G0016', 'luka berwarna (putih,kuning,merah atau abu-abu)'),
('G0017', 'dapat membengkak'),
('G0018', 'tertundanya kemunculan gigi dewasa atau gigi tetap'),
('G0019', 'muncul sariawan'),
('G0020', 'batuk'),
('G0021', 'nyeri perut,lidah,gusi dan bagian dalam pipi'),
('G0022', 'hilang nafsu makan'),
('G0023', 'sariawan yang mengalami pendarahan'),
('G0024', 'rasa sakit dalam mulut(terutama lidah)'),
('G0025', 'rahang yang terasa kaku atau sakit'),
('G0026', 'pembengkakan kelenjar getah bening pada leher atau batuk'),
('G0027', 'sakit gigi'),
('G0028', 'gigi sensitive'),
('G0029', 'nyeri saat menggigit makanan'),
('G0030', 'lubang yang terlihat pada gigi'),
('G0031', 'sensitive pada suhu panas dan dingin'),
('G0032', 'sensasi terbakar pada lidah'),
('G0033', 'sakit kepala'),
('G0034', 'ruam'),
('G0035', 'noda berwarna cokelat,hitam, atau putih pada permukaan gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_konsultasi`
--

CREATE TABLE `hasil_konsultasi` (
  `id_hasil_konsultasi` int(11) NOT NULL,
  `hid_konsultasi` int(11) NOT NULL,
  `hkode_gejala` varchar(10) NOT NULL,
  `jawaban` tinyint(4) NOT NULL,
  `cf_user` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_konsultasi`
--

INSERT INTO `hasil_konsultasi` (`id_hasil_konsultasi`, `hid_konsultasi`, `hkode_gejala`, `jawaban`, `cf_user`) VALUES
(11, 5, 'G0002', 1, 0),
(12, 5, 'G0003', 1, 0),
(13, 5, 'G0006', 1, 0),
(14, 6, 'G0001', 0, 0),
(15, 6, 'G0001', 1, 0),
(16, 6, 'G0002', 0, 0),
(17, 6, 'G0005', 1, 0),
(18, 6, 'G0007', 1, 0),
(19, 6, 'G0003', 1, 0),
(20, 6, 'G0012', 1, 0),
(21, 6, 'G0001', 0, 0),
(22, 6, 'G0002', 1, 0),
(23, 6, 'G0003', 1, 0),
(24, 6, 'G0001', 1, 0),
(25, 6, 'G0005', 1, 0),
(26, 6, 'G0001', 1, 0),
(27, 6, 'G0002', 1, 0),
(28, 6, 'G0003', 1, 0),
(29, 6, 'G0004', 1, 0),
(30, 6, 'G0005', 1, 0),
(31, 6, 'G0006', 1, 0),
(32, 6, 'G0011', 1, 0),
(33, 6, 'G0012', 1, 0),
(34, 6, 'G0013', 1, 0),
(35, 6, 'G0014', 1, 0),
(36, 6, 'G0015', 0, 0),
(37, 6, 'G0016', 0, 0),
(38, 6, 'G0017', 0, 0),
(39, 6, 'G0018', 0, 0),
(40, 8, 'G0001', 0, 0),
(41, 8, 'G0002', 1, 0),
(42, 8, 'G0003', 0, 0),
(43, 8, 'G0035', 1, 0),
(44, 8, 'G0015', 1, 0),
(45, 8, 'G0016', 1, 0),
(46, 8, 'G0017', 0, 0),
(47, 8, 'G0018', 0, 0),
(48, 8, 'G0019', 0, 0),
(49, 8, 'G0001', 0, 0),
(50, 8, 'G0002', 0, 0),
(51, 8, 'G0003', 1, 0),
(52, 8, 'G0004', 1, 0),
(53, 8, 'G0005', 1, 0),
(54, 8, 'G0006', 1, 0),
(55, 8, 'G0007', 1, 0),
(56, 8, 'G0008', 1, 0),
(57, 8, 'G0009', 1, 0),
(58, 8, 'G0010', 1, 0),
(59, 8, 'G0011', 1, 0),
(60, 5, 'G0001', 0, 0),
(61, 5, 'G0002', 0, 0),
(62, 5, 'G0003', 0, 0),
(63, 9, 'G0001', 1, 0),
(64, 9, 'G0002', 1, 0),
(65, 9, 'G0003', 0, 0),
(66, 9, 'G0004', 0, 0),
(67, 10, 'G0001', 1, 0),
(68, 10, 'G0002', 0, 0),
(69, 10, 'G0003', 1, 0),
(70, 10, 'G0004', 0, 0),
(71, 10, 'G0005', 1, 0),
(72, 10, 'G0006', 0, 0),
(73, 11, 'G0001', 1, 0),
(74, 11, 'G0002', 0, 0),
(75, 11, 'G0003', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `nama_penderita` varchar(255) NOT NULL,
  `jenkel` varchar(12) NOT NULL,
  `usia_penderita` int(11) NOT NULL,
  `alamat_penderita` text NOT NULL,
  `kkode_diagnosa` varchar(10) DEFAULT NULL,
  `hasil_cf` float DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `nama_penderita`, `jenkel`, `usia_penderita`, `alamat_penderita`, `kkode_diagnosa`, `hasil_cf`, `tanggal`, `id_user`) VALUES
(5, 'Intan', 'Perempuan', 24, 'Jl. Muria Raya', NULL, NULL, '2019-12-28', 1),
(6, 'Yama', 'Perempuan', 20, 'Madiun', NULL, NULL, '2019-12-28', 1),
(7, 'Ilham', 'Laki-laki', 50, 'Jakarta', NULL, NULL, '2019-12-28', 1),
(8, 'ilham wibi', 'Laki-laki', 50, 'Jakarta', NULL, NULL, '2019-12-28', 1),
(9, 'wibi', 'Perempuan', 22, 'Jl. Muria Raya', NULL, NULL, '2019-12-30', 100),
(10, 'facebook', 'Laki-laki', 22, 'Jl. Kurma', NULL, NULL, '2019-12-30', 100),
(11, 'Agus', 'Perempuan', 22, 'Lampung', NULL, NULL, '2019-12-30', 1),
(12, 'agus', 'Laki-laki', 22, 'Surabaya', NULL, NULL, '2019-12-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakar`
--

CREATE TABLE `pakar` (
  `id_pakar` int(11) NOT NULL,
  `pkode_diagnosa` varchar(10) NOT NULL,
  `pkode_gejala` varchar(10) NOT NULL,
  `evidence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pakar`
--

INSERT INTO `pakar` (`id_pakar`, `pkode_diagnosa`, `pkode_gejala`, `evidence`) VALUES
(9, 'PM001', 'G0001', 0.4),
(10, 'PM001', 'G0005', 0.4),
(11, 'PM001', 'G0008', 0.8),
(12, 'PM001', 'G0009', 0.8),
(13, 'PM001', 'G0010', 0.4),
(14, 'PM002', 'G0002', 0.4),
(15, 'PM002', 'G0004', 0.6),
(16, 'PM002', 'G0006', 0.4),
(17, 'PM002', 'G0007', 0.6),
(18, 'PM002', 'G0011', 0.4),
(19, 'PM002', 'G0012', 0.6),
(20, 'PM002', 'G0013', 0.2),
(21, 'PM003', 'G0001', 0.6),
(22, 'PM003', 'G0003', 0.6),
(23, 'PM003', 'G0004', 0.6),
(24, 'PM003', 'G0006', 0.4),
(25, 'PM003', 'G0014', -0.4),
(26, 'PM003', 'G0017', 0.4),
(27, 'PM003', 'G0029', 0.4),
(28, 'PM004', 'G0004', 0.6),
(29, 'PM004', 'G0015', 0.8),
(30, 'PM004', 'G0016', 0.8),
(31, 'PM004', 'G0017', 0.4),
(32, 'PM004', 'G0024', 0.4),
(33, 'PM004', 'G0032', 0.6),
(34, 'PM005', 'G0001', 0.6),
(35, 'PM005', 'G0005', 0.4),
(36, 'PM005', 'G0018', 0.4),
(37, 'PM006', 'G0003', 0.8),
(38, 'PM006', 'G0019', 0.1),
(39, 'PM006', 'G0020', 0.4),
(40, 'PM006', 'G0021', 1),
(41, 'PM006', 'G0022', 1),
(42, 'PM006', 'G0033', 0.8),
(43, 'PM006', 'G0034', 0.8),
(44, 'PM007', 'G0001', 0.4),
(45, 'PM007', 'G0002', 0.8),
(46, 'PM007', 'G0004', 1),
(47, 'PM007', 'G0006', 1),
(48, 'PM007', 'G0007', 0.8),
(49, 'PM007', 'G0023', 0.8),
(50, 'PM007', 'G0024', 0.4),
(51, 'PM007', 'G0025', 0.4),
(52, 'PM007', 'G0026', 0.8),
(53, 'PM008', 'G0027', 0.6),
(54, 'PM008', 'G0028', 0.8),
(55, 'PM008', 'G0029', 0.4),
(56, 'PM008', 'G0030', 1),
(57, 'PM008', 'G0035', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `v_list_aturan`
--

CREATE TABLE `v_list_aturan` (
  `kode` varchar(10) NOT NULL,
  `nama_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `akode_gejala` (`akode_gejala`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD UNIQUE KEY `kode_diagnosa` (`kode_diagnosa`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`);

--
-- Indeks untuk tabel `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  ADD PRIMARY KEY (`id_hasil_konsultasi`),
  ADD KEY `id_konsultasi` (`hid_konsultasi`),
  ADD KEY `hkode_gejala` (`hkode_gejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `kode_diagnosa` (`kkode_diagnosa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`id_pakar`),
  ADD KEY `pkode_diagnosa` (`pkode_diagnosa`),
  ADD KEY `pkode_gejala` (`pkode_gejala`);

--
-- Indeks untuk tabel `v_list_aturan`
--
ALTER TABLE `v_list_aturan`
  ADD KEY `kode` (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  MODIFY `id_hasil_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pakar`
--
ALTER TABLE `pakar`
  MODIFY `id_pakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`akode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Ketidakleluasaan untuk tabel `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  ADD CONSTRAINT `hasil_konsultasi_ibfk_1` FOREIGN KEY (`hkode_gejala`) REFERENCES `gejala` (`kode_gejala`),
  ADD CONSTRAINT `hasil_konsultasi_ibfk_2` FOREIGN KEY (`hid_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`);

--
-- Ketidakleluasaan untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`kkode_diagnosa`) REFERENCES `diagnosa` (`kode_diagnosa`);

--
-- Ketidakleluasaan untuk tabel `pakar`
--
ALTER TABLE `pakar`
  ADD CONSTRAINT `pakar_ibfk_1` FOREIGN KEY (`pkode_gejala`) REFERENCES `gejala` (`kode_gejala`),
  ADD CONSTRAINT `pakar_ibfk_2` FOREIGN KEY (`pkode_diagnosa`) REFERENCES `diagnosa` (`kode_diagnosa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
