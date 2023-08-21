-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jun 2023 pada 17.13
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sig`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `id_tempat`, `gambar`, `tanggal`, `status`, `keterangan`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 1, 'cac8ef33adad82b281881f982be7c9c3181fc2c0.png', '2023-06-18', 1, '<p>sdsdfsdffsfsdfdsfdÂ  Â dsfdsf</p>', 2, '2023-06-18 11:41:42', 0, '2023-06-18 12:40:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `nama_tempat`, `gambar`, `lat`, `lng`, `lokasi`, `keterangan`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Wisata Hutan Mangrove Pantai Celincing', '19e5c56153df242d38632e22c7a5abb0ae52e9cd.png', -1.825598140852918, 109.90717916681359, 'Jl. Tanjung Matan, Suka Baru, Benua Kayong, Ketapang Regency, West Kalimantan 78822', '<p>gjghgjjhgjhgj</p>', 2, '2023-06-18 11:38:15', 0, '0000-00-00 00:00:00'),
(2, 'WISATA HUTAN MANGROVE, KUALA SATONG', 'ccc5c083541aeb8af23cc4a8353f6dde831faab0.png', -1.4026381347602808, 110.07829396515154, 'Kuala Satong, Kec. Matan Hilir Utara, Kabupaten Ketapang, Kalimantan Barat', '<p>WISATA HUTAN MANGROVE, KUALA SATONG<br></p>', 2, '2023-06-18 14:51:49', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `hak_akses`, `password`) VALUES
(2, 'Super Admin', 'super', 'Administrator', '$2y$12$z31cFVTX5yIsqrTeZO9mvuq0X3IYxCWsS/.yvAvbgnujZ/MsBNcCO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_galeri` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `ket_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `id_tempat`, `nama_galeri`, `gambar`, `ket_galeri`) VALUES
(17, 11, '', '7709a.jpg', ''),
(18, 12, '', '1039goa-lawah.jpg', ''),
(19, 12, 'Goa Lawah 1', '2443gua-lawah-1.jpg', ''),
(20, 12, 'Goa Lawah 2', '6752gua-lawah3.jpg', ''),
(21, 11, 'Lempuyang 1', '8479lempuyang.jpg', ''),
(22, 15, '', '5071pusering-jagat.jpg', ''),
(23, 10, 'Mandala 1', '7182mandapa-1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(24, 10, 'Mandala 2', '9349mandapa-2.jpg', ''),
(25, 10, 'Mandala 3', '4694mandapa-3.jpg', ''),
(26, 10, 'Mandala 4', '8986mandapa-4.jpg', ''),
(27, 10, 'Mandala 5,6,7', '2425mandapa-567.jpg', ''),
(28, 10, 'Gambar 1', '7398besakih.jpg', ''),
(29, 10, 'Gambar 2', '7659besakih-2.jpg', ''),
(30, 13, 'Batukaru 1', '5413batukaru-1.jpg', '<p>barukaru tes keternagan</p>'),
(31, 13, 'Batukaru 2', '1935batukaru-2.jpg', ''),
(32, 11, 'Lempuyang 2', '5131lempuyang-3.jpg', ''),
(33, 14, 'Uluwatu 1', '6659uluwatu-1.jpg', ''),
(34, 14, 'Uluwatu 2', '6237uluwatu-2.jpg', ''),
(35, 15, 'Pusering jagat 1', '4421pusering-jagat-1.jpg', ''),
(36, 15, 'Pusering jagat 2', '6820pusering-jagat-2.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_options`
--

CREATE TABLE `tb_options` (
  `option_name` varchar(16) NOT NULL,
  `option_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_options`
--

INSERT INTO `tb_options` (`option_name`, `option_value`) VALUES
('default_lat', '-8.251889'),
('default_lng', '115.076818'),
('default_zoom', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tb_options`
--
ALTER TABLE `tb_options`
  ADD PRIMARY KEY (`option_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
