-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 09.17
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `id_user`, `judul`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(4, 1, 'Cara membangun', 'cara-membangun', 'ec561126f1e23248d5a679b197ed5ed9.jpg', '2020-02-01 08:03:32', '2020-05-20 02:24:42'),
(14, 26, 'test', 'test', 'a12a92e5bfe7831eb54a8a69d2868a46.png', '2020-05-20 02:21:59', '2020-05-20 02:24:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `program_studi` varchar(50) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(16) DEFAULT NULL,
  `divisi` varchar(30) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nim`, `nama`, `alamat`, `no_hp`, `program_studi`, `angkatan`, `gambar`, `instagram`, `whatsapp`, `divisi`, `bio`, `alasan`, `verified`, `created_at`, `updated_at`) VALUES
(1, '1800086', 'Muhamad Iqbal Rivaldi', 'Smd', '089', '2', 2000, '9bed5ba58045487e24ed4757d0ff7a65.jpg', NULL, NULL, '4', '', '', 1, '2020-05-20 00:45:46', '2020-05-20 02:37:41'),
(17, '180001', 'User Baru', 'Sumedang', '085795992899', 'Teknik Informatika', 2020, '8de9b5c313d9bdce74a12c179851d5fe.jpg', NULL, NULL, '4', '', 'Mengembangkan minat', 1, '2020-05-19 23:45:08', '2020-05-20 02:37:58'),
(18, '20000', 'Wakil Ketua', 'Sumedang', '089645', 'Teknik Informatika', 2000, '73a7b284db82c057c1326c06ad9d4401.jpg', 'tahungoding', '6289', '4', '', '', 1, '2020-05-20 02:34:44', '2020-05-20 02:38:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `pengunjung` int(12) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'Futsal', 'Futbol Sala1', '2020-01-29 14:45:53', '2020-01-29 15:10:01'),
(22, 'Volly', 'Olahraga Bola', '2020-01-29 15:00:21', '2020-01-29 15:00:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `size` int(10) NOT NULL,
  `id_album` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `path`, `size`, `id_album`, `created_at`, `updated_at`) VALUES
(59, '7cace54ced07a4649c460b72ec11c7f6537fb5276a5fdd75628e27699fc73a8f.jpg', 138364, 4, '2020-02-01 15:43:07', '2020-02-01 15:43:07'),
(60, '69519498_2396539837061547_6799115477915271168_n.jpg', 74861, 4, '2020-02-01 15:43:07', '2020-02-01 15:43:07'),
(62, 'IMG-20200213-WA0043.jpg', 62813, 4, '2020-02-21 15:05:51', '2020-02-21 15:05:51'),
(63, 'photo-1504305754058-2f08ccd89a0a.jpg', 119669, 4, '2020-02-22 17:19:47', '2020-02-22 17:19:47'),
(64, 'user-default.png', 3252, 4, '2020-02-22 17:19:53', '2020-02-22 17:19:53'),
(65, 'photo-1504305754058-2f08ccd89a0a1.jpg', 119669, 4, '2020-02-22 17:20:27', '2020-02-22 17:20:27'),
(66, 'photo-1504305754058-2f08ccd89a0a2.jpg', 119669, 4, '2020-02-22 17:20:52', '2020-02-22 17:20:52'),
(67, 'WKt6e9w4_400x400.jpg', 16983, 4, '2020-02-22 17:21:09', '2020-02-22 17:21:09'),
(68, 'photo-1504305754058-2f08ccd89a0a3.jpg', 119669, 4, '2020-02-22 17:52:28', '2020-02-22 17:52:28'),
(69, 'Logo-propinsi-jawa-barat.png', 209025, 4, '2020-02-22 17:52:41', '2020-02-22 17:52:41'),
(70, '2.jpg', 1612440, 9, '2020-05-19 09:09:15', '2020-05-19 09:09:15'),
(71, '1.jpg', 1642122, 9, '2020-05-19 09:09:16', '2020-05-19 09:09:16'),
(72, '3.jpg', 1425516, 9, '2020-05-19 09:09:16', '2020-05-19 09:09:16'),
(73, '4.jpg', 1296932, 9, '2020-05-19 09:09:16', '2020-05-19 09:09:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Teknologi', 'Modern2', '2020-01-30 04:07:16', '2020-01-30 15:43:48'),
(3, 'Negara', '...', '2020-02-20 16:09:56', '2020-02-20 16:09:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `webname` varchar(20) NOT NULL,
  `pembuka` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `bio` text NOT NULL,
  `ketua` int(11) NOT NULL,
  `wakil_ketua` int(11) NOT NULL,
  `sekretaris` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `pendaftaran` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `favicon`, `webname`, `pembuka`, `visi`, `misi`, `bio`, `ketua`, `wakil_ketua`, `sekretaris`, `email`, `telp`, `alamat`, `facebook`, `logo`, `gambar`, `instagram`, `twitter`, `pendaftaran`, `created_at`, `updated_at`) VALUES
(1, 'tahu.png', 'TAHU NGODING', 'Selamat Datang di Website Resmi UKM UHATNGODING', 'Membangun Negeri<br>', '<ol><li>ketuhanan yang maha esa</li><li>kemanusiaan yang adil dan beradab</li><li>persatuan indonesia</li><li>kerakyatan...</li><li>keadilan sosial bagi seluruh rakyat..<br></li></ol>', '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</span><br></p>', 1, 27, 26, 'test1@gmail.com', '1111', 'test1', 'test1fb', 'tahu1.png', 'Business_PNG.png', 'test1ig', 'test1tw', 1, '2020-02-01 18:02:19', '2020-05-20 06:14:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id_saran`, `nama`, `email`, `subjek`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'iqbal', 'test@test.test', 'tst', 'test', '2020-02-05 17:49:51', '2020-02-05 17:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_anggota`, `username`, `password`, `level_user`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'ketua', '202cb962ac59075b964b07152d234b70', 1, 0, '2020-01-24 14:12:49', '2020-05-20 05:01:16'),
(26, 17, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 0, '2020-05-20 01:10:34', '2020-05-20 02:33:20'),
(27, 18, 'wakil_ketua', '202cb962ac59075b964b07152d234b70', 2, 0, '2020-05-20 02:34:44', '2020-05-20 02:38:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
