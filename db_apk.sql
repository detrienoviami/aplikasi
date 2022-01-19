-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2022 pada 09.57
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_atribut`
--

CREATE TABLE `t_atribut` (
  `id_atribut` varchar(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_atribut`
--

INSERT INTO `t_atribut` (`id_atribut`, `atribut`, `nilai_atribut`) VALUES
('ATR01', 'Sangat Tidak Puas', 1),
('ATR02', 'Tidak Puas', 2),
('ATR03', 'Cukup Puas', 3),
('ATR04', 'Puas', 4),
('ATR05', 'Sangat Puas', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datamining`
--

CREATE TABLE `t_datamining` (
  `id_datamining` int(10) NOT NULL,
  `id_atribut` int(10) NOT NULL,
  `jml_jawaban` int(5) NOT NULL,
  `entrophy` int(11) NOT NULL,
  `gain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datawifi`
--

CREATE TABLE `t_datawifi` (
  `id_wifi` varchar(10) NOT NULL,
  `nama_wifi` varchar(20) NOT NULL,
  `lokasi` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data untuk tabel `t_datawifi`
--

INSERT INTO `t_datawifi` (`id_wifi`, `nama_wifi`, `lokasi`, `status`) VALUES
('001', 'Indihome', 'Karawang', 'Aktif'),
('002', 'Indihome', 'Cikampek', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karyawan`
--

CREATE TABLE `t_karyawan` (
  `id_user` int(10) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_karyawan`
--

INSERT INTO `t_karyawan` (`id_user`, `nip`, `nama`, `tgl_lahir`, `email`, `agama`, `alamat`, `no_hp`, `status`) VALUES
(27, 'KRY20220119032533113492', 'Admin', '0000-00-00', '', '', '', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kuisioner`
--

CREATE TABLE `t_kuisioner` (
  `id_kuisioner` int(10) NOT NULL,
  `kuisioner` text NOT NULL,
  `atribut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_kuisioner`
--

INSERT INTO `t_kuisioner` (`id_kuisioner`, `kuisioner`, `atribut`) VALUES
(1, 'Waktu yang dibutuhkan Teller dan CSO untuk menangani transaksi atau pertanyaan Bapak/Ibu.', 'Waktu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kuisioner_result`
--

CREATE TABLE `t_kuisioner_result` (
  `id_kuisioner_result` int(11) NOT NULL,
  `kode_survey` varchar(100) NOT NULL,
  `no_kuisioner` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','','') NOT NULL,
  `nohp` varchar(11) NOT NULL,
  `id_kuisioner` int(10) NOT NULL,
  `jawaban` int(5) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_jawaban` date NOT NULL,
  `layanan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_kuisioner_result`
--

INSERT INTO `t_kuisioner_result` (`id_kuisioner_result`, `kode_survey`, `no_kuisioner`, `nama`, `jk`, `nohp`, `id_kuisioner`, `jawaban`, `nama_karyawan`, `tgl_jawaban`, `layanan`) VALUES
(485, 'SRVY0001', '1', 'Iqbal', 'Laki-laki', '08963496752', 1, 5, 'Putri ', '2021-07-31', 5),
(489, 'SRVY0489', '1', 'Andri', 'Laki-laki', '08121281413', 1, 5, 'Ade', '2021-07-31', 5),
(493, 'SRVY0493', '1', 'Wini Wulandari', 'Perempuan', '08577476756', 1, 3, 'Putri ', '2021-07-31', 1),
(497, 'SRVY0497', '1', 'M Najib', 'Laki-laki', '08574943410', 1, 3, 'Putri ', '2021-07-31', 5),
(501, 'SRVY0501', '1', 'Wahyu', 'Laki-laki', '08381528516', 1, 5, 'Putri ', '2021-07-31', 1),
(505, 'SRVY0505', '1', 'Yustikawati', 'Perempuan', '08588687479', 1, 5, 'Putri ', '2021-07-31', 5),
(509, 'SRVY0509', '1', 'Abdul Malik', 'Laki-laki', '08953699110', 1, 5, 'Ade', '2021-07-31', 5),
(513, 'SRVY0513', '1', 'Tria Junia', 'Perempuan', '08588792712', 1, 5, 'Putri ', '2021-07-31', 5),
(517, 'SRVY0517', '1', 'Sutardi', 'Laki-laki', '08581152561', 1, 4, 'Putri ', '2021-07-31', 1),
(521, 'SRVY0521', '1', 'Yustina', 'Perempuan', '08228300155', 1, 5, 'Putri ', '2021-07-31', 5),
(525, 'SRVY0525', '1', 'iin', 'Laki-laki', '23', 1, 1, 'Putri ', '2022-01-18', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_total`
--

CREATE TABLE `t_total` (
  `id_total` int(100) NOT NULL,
  `id_kuisioner` int(10) NOT NULL,
  `stp` int(5) NOT NULL,
  `tp` int(5) NOT NULL,
  `cp` int(5) NOT NULL,
  `p` int(5) NOT NULL,
  `sp` int(5) NOT NULL,
  `entrophy` int(20) NOT NULL,
  `gain` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `username`, `level`, `password`, `status`) VALUES
(9, 'Iis', 'Iis', 'KLO', '$2y$10$/rkk3waB9A/biWdhhr9YKu65CIzuyJyNGncuDvYZ..tYW5qe7cQbq', 'aktif'),
(18, 'Lolipop', '', 'Pimpinan', '$2y$10$l3wuDHAgcH5bvautR2oLeuKnNkAdC6/1pb7gd/hwttXDxHQiv.G9C', 'Non Aktif'),
(19, 'Lolipop', 'loll', 'Pimpinan', '$2y$10$/rkk3waB9A/biWdhhr9YKu65CIzuyJyNGncuDvYZ..tYW5qe7cQbq', 'aktif'),
(21, 'Putri ', 'Putri ', 'Teller', '$2y$10$MnmV8xkrnq0rSsDlR3Erm.C9zRx0nkBAs1NfiI1bp7FOTr2v4vOZK', 'aktif'),
(22, 'Ade', 'ade@gmail.com', 'Teller', '$2y$10$W4IFsYpp91ohitAHSXOrSuacgkneSADyQ4Qc5vYI7g1tWVi8LJ.cy', 'aktif'),
(23, 'widuri', 'widuri@gmail.com', 'KLO', '$2y$10$7Wi60JeZ7f3/aeJrdcaDT..WxScCaAq5dgJHPTOhBjveDebhYD.V6', 'non aktif'),
(24, 'Admin', 'Admin', 'Pimpinan', '$2y$10$Kx00xzbAd0MnVwUF99ttp.MNjCsFki8tVfuVwUokXkiMFEdFrb7Za', 'aktif'),
(25, 'lili', 'lili', 'KLO', '$2y$10$L26DP.BUm9pLFLzr01UsU.RsNHincJSWikUBLupdYHeUHwsskBZkW', 'aktif'),
(26, 'admin', 'admin', '1', 'admin', 'aktif'),
(27, 'Admin', 'admin1', 'KLO', '$2y$10$e3fofbtLVdo.0M6a5MUZUOJjvFu9n.WZA2/rIk2uyAozKCp41V78O', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_atribut`
--
ALTER TABLE `t_atribut`
  ADD PRIMARY KEY (`id_atribut`) USING BTREE;

--
-- Indeks untuk tabel `t_datamining`
--
ALTER TABLE `t_datamining`
  ADD PRIMARY KEY (`id_datamining`),
  ADD KEY `id_atribut` (`id_atribut`);

--
-- Indeks untuk tabel `t_datawifi`
--
ALTER TABLE `t_datawifi`
  ADD PRIMARY KEY (`id_wifi`);

--
-- Indeks untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  ADD KEY `id_kuisioner` (`id_kuisioner`) USING BTREE,
  ADD KEY `id_kuisioner_result` (`id_kuisioner_result`) USING BTREE;

--
-- Indeks untuk tabel `t_total`
--
ALTER TABLE `t_total`
  ADD PRIMARY KEY (`id_total`),
  ADD UNIQUE KEY `id_total` (`id_kuisioner`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_datamining`
--
ALTER TABLE `t_datamining`
  MODIFY `id_datamining` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  MODIFY `id_kuisioner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  MODIFY `id_kuisioner_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

--
-- AUTO_INCREMENT untuk tabel `t_total`
--
ALTER TABLE `t_total`
  MODIFY `id_total` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD CONSTRAINT `t_karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  ADD CONSTRAINT `t_kuisioner_result_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `t_kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_total`
--
ALTER TABLE `t_total`
  ADD CONSTRAINT `t_total_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `t_kuisioner_result` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
