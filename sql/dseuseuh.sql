-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Nov 2018 pada 15.46
-- Versi Server: 10.3.9-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dseuseuh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `kode_booking` varchar(15) NOT NULL,
  `kode_customer` varchar(15) NOT NULL,
  `jenis_booking` varchar(30) NOT NULL,
  `paket_booking` varchar(30) NOT NULL,
  `banyak` int(11) NOT NULL,
  `tanggal_booking` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(15) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `notelp_customer` int(15) NOT NULL,
  `alamat_customer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_customer`, `subjek`, `pesan`, `status`, `created_at`) VALUES
(1, NULL, 'Test', 'kurang GG gaess', 0, '2018-11-08 04:43:12'),
(2, NULL, 'Cek', 'cek nomer 2 gaess', 0, '2018-11-08 04:43:12'),
(4, NULL, 'Ceksadasdada', 'dasdadkladsald', 1, '2018-11-10 14:23:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laundry`
--

CREATE TABLE `jenis_laundry` (
  `kode_jenis` varchar(15) NOT NULL,
  `nama_jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE `laundry` (
  `id_laundry` varchar(25) NOT NULL,
  `nama_usr` int(11) NOT NULL,
  `nama_konsumen` varchar(45) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `status` enum('masuk','keluar') DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  `paket_id_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laundry`
--

INSERT INTO `laundry` (`id_laundry`, `nama_usr`, `nama_konsumen`, `berat`, `status`, `bayar`, `tgl_masuk`, `tgl_keluar`, `paket_id_paket`) VALUES
('D12212', 0, 'Kamu siapa ', 3, 'masuk', 15000, '09/13/2018', NULL, 4),
('D12213', 0, 'Kamu seperti jelly', 2, 'masuk', 1000000, '09/06/2018', NULL, 4),
('D12214', 0, 'Aku siapa', 5, 'masuk', 6000, '09/19/2018', NULL, 3),
('D12215', 0, 'qwerty', 100, 'keluar', 2000000, '09/25/2018', '09/19/2018', 1),
('D12218', 0, 'Eka', 5, 'keluar', 1000000, '09/20/2018', '09/21/2018', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(45) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `deskripsi_paket`, `harga`) VALUES
(1, 'Cuci Kering ', 'Jika kamu ingin mencuci item laundry yang tidak perlu disetrika (seperti jamduk, bathrobe,dsb), jasa cuci kering kiloan menjadi pilihan terbaik buat laundry kamu.', 4000),
(2, 'Cuci Setrika', 'Cuci Setrika menjadi pilihan favorit bagi kamu yang sibuk untuk menyetrika', 5000),
(3, 'Cuci Komplit', 'Jika kamu ingin item laundry dengan hasil maksimal dan sudah disetrika maka paket ini adalah yang pas', 6000),
(4, 'Express 4 Jam Selesai', 'Buru-buru item akan dipakai maka 4 jam langsung selesai', 8000),
(7, 'Cuci Wangi 48 jam', 'Paket paling maksimal di laundry ini', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nama_usr` varchar(45) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'user.png',
  `level` enum('super','admin','costumer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_usr`, `no_telp`, `alamat`, `email`, `avatar`, `level`) VALUES
(1, 'ekaa1', 'E48EC16D066A59DFFBE1E352AD0710D7', 'Eka Lestari', '089656789909', 'skm', 'eka@email.com', '', 'admin'),
(2, 'akhdanfirdaus', '1b299379339898edbe5a9508aba85493', 'Akhdan Musyaffa Firdaus', NULL, 'kp.Burujul rt.06 rw.17 no.13', 'akhdan.musyaffa.firdaus@gmail.com', 'user.png', 'costumer'),
(4, 'fimarf', 'd36dd48d1b15c79ca41e5a3583de7350', 'Fimar Firdaus', NULL, 'kp.brujul rt.6 rw.17 no.13 Mekarrahayu-Margaasih', 'fimarf@gmail.com', 'user.png', 'costumer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `kode_customer` (`kode_customer`),
  ADD KEY `jenis_booking` (`jenis_booking`),
  ADD KEY `paket_booking` (`paket_booking`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id_laundry`),
  ADD KEY `fk_laundry_paket_idx` (`paket_id_paket`),
  ADD KEY `id_user` (`nama_usr`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`jenis_booking`) REFERENCES `jenis_laundry` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `fk_laundry_paket` FOREIGN KEY (`paket_id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
