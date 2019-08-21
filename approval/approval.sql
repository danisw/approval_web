-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2019 pada 06.46
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `approval`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dept`
--

INSERT INTO `tbl_dept` (`id_dept`, `nama_dept`) VALUES
(1, 'MIS'),
(2, 'SALES'),
(3, 'FINANCE'),
(4, 'WAREHOUSE'),
(5, 'PRODUKSI'),
(6, 'PROCUREMENT'),
(7, 'TAC-GA'),
(8, 'PPIC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Manager'),
(2, 'SPV'),
(3, 'Staff'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_layanan`
--

CREATE TABLE `tbl_kategori_layanan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_layanan`
--

INSERT INTO `tbl_kategori_layanan` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Permintaan Akses Media Informasi'),
(2, 'Permintaan Akses ERP Sunfish'),
(3, 'Permintaan Akses Media Transfer'),
(4, 'Permintaan Akses Internet'),
(5, 'Permintaan Akses Email');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_request`
--

INSERT INTO `tbl_request` (`id_request`, `id_user`, `tanggal_input`, `last_update`) VALUES
(55, 3, '2019-08-20 08:46:59', '0000-00-00'),
(56, 12, '2019-08-20 08:52:49', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_request_detail`
--

CREATE TABLE `tbl_request_detail` (
  `id_detail` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `kode_request` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_layanan` int(11) NOT NULL,
  `id_sub_layanan` int(11) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `status_approval` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_request_detail`
--

INSERT INTO `tbl_request_detail` (`id_detail`, `id_request`, `kode_request`, `id_user`, `id_kategori_layanan`, `id_sub_layanan`, `alasan`, `status_approval`, `last_update`, `update_by`) VALUES
(31, 55, '1/MIS/55', 3, 1, 1, 'alasan_pc', 0, '0000-00-00', 0),
(32, 55, '1/MIS/55', 3, 1, 3, 'yaya cctv', 0, '0000-00-00', 0),
(33, 56, '1/MIS/56', 12, 1, 2, 'wifi gopal', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_layanan`
--

CREATE TABLE `tbl_sub_layanan` (
  `id_sub` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_sub` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_layanan`
--

INSERT INTO `tbl_sub_layanan` (`id_sub`, `id_kategori`, `nama_sub`) VALUES
(1, 1, 'pc'),
(2, 1, 'wifi'),
(3, 1, 'cctv'),
(4, 1, 'erp'),
(5, 3, 'HDD'),
(6, 3, 'FD'),
(7, 3, 'Printer'),
(8, 3, 'CD'),
(9, 3, 'MTP'),
(10, 3, 'Modem'),
(11, 3, 'Bluetooth'),
(12, 3, 'Camera & scanners'),
(13, 3, 'Smartcard'),
(14, 3, 'Lainnya'),
(15, 4, 'Internet'),
(16, 5, 'Registrasi email');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` text,
  `jabatan` int(11) DEFAULT NULL,
  `departemen` int(11) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nik`, `nama`, `jabatan`, `departemen`, `company`, `password`) VALUES
(1, 'UMS15060398', 'Sugeng Widodo', 1, 1, 1, 'Kokola2019'),
(2, 'MGF13020204', 'Fahmi', 2, 1, 2, 'Kokola2019'),
(3, 'UMS17110197', 'Paramita', 3, 1, 1, 'Kokola2019'),
(4, 'UMS01070153', 'Nanang', 1, 2, 1, 'Kokola2019'),
(5, 'UMS05050214', 'Betty', 2, 2, 1, 'Kokola2019'),
(6, 'UMS14100835', 'Ninuk', 3, 2, 1, 'Kokola2019'),
(7, 'UMS99120084', 'Injar', 1, 4, 1, 'Kokola2019'),
(8, 'UMS18060145', 'Icuk', 2, 4, 1, 'Kokola2019'),
(9, 'UMS08080263', 'Rudy', 3, 4, 1, 'Kokola2019'),
(10, 'admin', 'admin', 4, 1, 1, 'Kokola2019'),
(11, 'UMS18070147', 'Kevin Ongs', 3, 1, 2, 'Kokola2019'),
(12, 'MGF19010191', 'Naufal Asad ', 3, 1, 2, 'Kokola2019'),
(13, 'UMS16050007', 'Arief Priyadi', 2, 1, 1, 'Kokola2019'),
(14, 'MGF17040040', 'Abdulloh Fiqih', 2, 1, 1, 'Kokola2019');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_kategori_layanan`
--
ALTER TABLE `tbl_kategori_layanan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `tbl_request_detail`
--
ALTER TABLE `tbl_request_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tbl_sub_layanan`
--
ALTER TABLE `tbl_sub_layanan`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_layanan`
--
ALTER TABLE `tbl_kategori_layanan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_request_detail`
--
ALTER TABLE `tbl_request_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_layanan`
--
ALTER TABLE `tbl_sub_layanan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
