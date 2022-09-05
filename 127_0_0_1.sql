-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2021 pada 16.28
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darwis`
--
CREATE DATABASE IF NOT EXISTS `darwis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `darwis`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Elda Pikasari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_kategori`, `tanggal_masuk`, `nama_barang`, `deskripsi`, `harga`, `stok`, `terjual`, `gambar`) VALUES
(1, 1, '2016-09-13', 'Carissa Maxi Dress Bloger', '<p>Size :&nbsp; Fit L</p>\r\n\r\n<p>Bahan : Satin Hq mewah recomended untuk acara resmi</p>\r\n\r\n<p>Pilihan Warna : coklat abu-abu</p>', 80000, 14, 1, 'carrisa maxi dress bloger.png'),
(2, 1, '2016-09-14', 'maxi babyterri abu', '<p>Bahan : Bebyterri</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : abu-abu</p>', 85000, 30, 0, 'IMG_20160913_123652.jpg'),
(3, 1, '2016-09-14', 'longouter sonya', '<p>Bahan : Spandek halus</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : Tosca dan Pink</p>', 90000, 20, 0, 'longouter sonya.jpg'),
(4, 1, '2016-09-14', 'Yori one set', '<p>Bahan : Spandek</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>warna : merah maron</p>', 70000, 30, 0, 'yori one set.png'),
(5, 4, '2016-09-14', 'devika tunik', '<p>Bahan : katun Rayon</p>\r\n\r\n<p>&nbsp;Ukuran : Fit To L</p>\r\n\r\n<p>Warna : Hitam</p>\r\n\r\n<p>lengan mix kotak</p>', 66000, 20, 0, 'devika tunik.jpg'),
(6, 5, '2016-09-14', 'jaket natalia', '<p>Bahan : babyterri</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna&nbsp; : Merah</p>\r\n\r\n<p>babyterri tebal ada hodie tali ada saku kancing buka full</p>', 67000, 20, 0, 'IMG_20160913_123500.jpg'),
(7, 7, '2016-09-14', 'Tunik Lutamina', '<p>Bahan : katun rayon motif asli</p>\r\n\r\n<p>Ukuran : fit to L</p>\r\n\r\n<p>Warna : putih, merah marun, hitam</p>', 67000, 25, 0, 'IMG_20160913_123546.jpg'),
(8, 4, '2016-09-14', 'latifa salim', '<p>Bahan : spandek</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>warna : pink, hitam</p>\r\n\r\n<p>baju cardi nempel kancing&nbsp; good quality</p>', 72000, 25, 0, 'IMG_20160913_123518.jpg'),
(9, 7, '2016-09-14', 'triple tone tunik', '<p>Bahan : twiscon</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna :tosca, pink, coklat</p>\r\n\r\n<p>&nbsp;</p>', 85000, 20, 0, 'Screenshot_2016-09-13-09-17-47.png'),
(10, 8, '2016-09-14', 'blue marine', '<p>Bahan : Jeans asli</p>\r\n\r\n<p>Ukuran : 27-30</p>\r\n\r\n<p>Warna : Biru</p>', 100000, 15, 0, 'blue marine.png'),
(11, 8, '2016-09-14', 'Wahite jeans', '<p>Bahan : Lepis</p>\r\n\r\n<p>&nbsp;Ukuran : 27-29</p>\r\n\r\n<p>Warna : putih</p>', 100000, 15, 0, 'white jeans.png'),
(12, 3, '2016-09-14', 'Jaket ita', '<p>Bahan : Jeans washed tebal</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : biru langit<br />\r\n&nbsp;</p>', 85000, 10, 0, 'jkt ita bhn jeans tebal.jpg'),
(13, 8, '2016-09-14', 'Balck Jeans', '<p>Bahan : Jaens Tebal</p>\r\n\r\n<p>Ukuran : 27-29</p>\r\n\r\n<p>Warna : Hitam</p>', 100000, 5, 0, 'black jeans.png'),
(14, 4, '2016-09-14', 'Basic Michole', '<p>Bahan : katun rayon</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>warna : biru, coklat dan tosca</p>\r\n\r\n<p>&nbsp;</p>', 65000, 25, 0, 'IMG_20160913_123646.jpg'),
(15, 1, '2016-09-14', 'olla drip dress', '<p>Bahan : spandek</p>\r\n\r\n<p>&nbsp;Ukuran : fit L</p>\r\n\r\n<p>Warna : merah, biru, coklat,</p>', 65000, 15, 0, 'olla stripe dress.png'),
(16, 4, '2016-09-14', 'Crad + Inner Channel', '<p>Bahan : Spandek</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : biru</p>', 65000, 10, 0, 'cardi+inner channel.jpg'),
(17, 4, '2016-09-14', 'kaira blaose', '<p>Bahan : kanit</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan warna: coklat, hitam merah</p>\r\n\r\n<p>&nbsp;</p>', 70000, 10, 0, 'khaira blouse.png'),
(18, 1, '2016-09-14', 'Kemeja dress', '<p>Bahan : katun stripe asli</p>\r\n\r\n<p>&nbsp;Ukuran : fit xl</p>\r\n\r\n<p>Pilihan warna : biru, ungu</p>', 85000, 15, 0, 'kemeja dress.jpg'),
(19, 9, '2016-09-14', 'couple rama batik', '<p>Bahan : katun rayon motif quality</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>pilihan warna : merah marun, coklat, hitam</p>', 125000, 10, 0, 'IMG_20160913_123536.jpg'),
(20, 4, '2016-09-14', 'sofhi rumple', '<p>Bahan : spandek</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : abu-abu</p>', 65000, 8, 0, 'sofhi rumple.png'),
(21, 7, '2016-09-14', 'tunic metty pink', '<p>Bahan : Twiscon</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : Pink</p>', 65000, 10, 0, 'tunic metty pink.jpg'),
(22, 1, '2016-09-14', 'Turtleneck Sweater Dress', '<p>Bahan : soft Babyterri</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan warna : hitam, putih, coklat, hijau</p>', 70000, 30, 0, 'turtleneck sweatter dress1.png'),
(23, 7, '2016-09-14', 'Benicia', '<p>Bahan : katun rayon</p>\r\n\r\n<p>ukuran : fit L</p>\r\n\r\n<p>&nbsp;Pilihan Warna : marun, pink</p>', 69000, 10, 0, 'benicia.png'),
(24, 7, '2016-09-14', 'Baju baby doll', '<p>Bahan : Katun polyster</p>\r\n\r\n<p>Ukuran : fit XL</p>\r\n\r\n<p>Warna : putih</p>\r\n\r\n<p>&nbsp;</p>', 56000, 12, 0, 'IMG_20160913_123526.jpg'),
(25, 7, '2016-09-14', 'Tunik Aulia Navy', '<p>Bahan : katun rayon</p>\r\n\r\n<p>Ukuran : fit XL</p>\r\n\r\n<p>Warna : biru</p>', 64000, 15, 0, 'tunik.jpg'),
(26, 7, '2016-09-14', 'Paloma Pinguin', '<p>Bahan :&nbsp; Twiscon Peachshofie</p>\r\n\r\n<p>Ukuran : fit L besar</p>\r\n\r\n<p>Pilihan Warna : Hitam</p>', 60000, 25, 0, 'paloma pinguin.png'),
(27, 7, '2016-09-14', 'Collage Tunic', '<p>Bahan : Babyterri Import Combie Twsicon</p>\r\n\r\n<p>Ukuran : fit L besar</p>\r\n\r\n<p>Warna : Hitam, Navy dan Putih</p>', 70000, 10, 0, 'collage tunic.png'),
(28, 7, '2016-09-14', 'Channel Shirt', '<p>Bahan : Twiscone Import Super Lembut</p>\r\n\r\n<p>Ukuran : fit L besar</p>\r\n\r\n<p>Warna : Hitam , Tosca dan Coklat</p>', 65000, 30, 0, 'channel shirt.png'),
(29, 6, '2016-09-14', 'Fit and Flare Flowery', '<p>Bahan :Sateen Maxi Skirt</p>\r\n\r\n<p>Ukuran : fit L standar (Pinggang Ngaret)</p>\r\n\r\n<p>Warna : Green</p>', 75000, 10, 0, 'fit flare maxi shirt.png'),
(30, 7, '2016-09-14', 'Pocket Jeans', '<p>Bahan : Jeans Combi Twiscone</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan Warna : Light blue dan Dark Blue</p>\r\n\r\n<p>&nbsp;</p>', 70000, 10, 0, 'pocket jeans.png'),
(31, 7, '2016-09-14', 'paloma', '<p>Bahan : Twiscone</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan warna : putih, biru, pink</p>\r\n\r\n<p>&nbsp;</p>', 65000, 10, 0, 'Screenshot_2016-09-13-10-32-13.png'),
(32, 2, '2016-09-14', 'Blouse Whiteko', '<p>Bahan : Twiscon</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan Warna : Putih</p>', 55000, 10, 0, 'IMG_20160913_123640.jpg'),
(33, 2, '2016-09-14', 'Kemeja bella', '<p>Bahan: Katun Rayon</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Warna : Merah</p>', 65000, 10, 0, 'IMG_20160914_223440.jpg'),
(34, 2, '2016-09-14', 'Kemeja Luna', '<p>Bahan : Katun rayon</p>\r\n\r\n<p>Ukuran ; fit L</p>\r\n\r\n<p>Pilihan Warna: Biru</p>', 65000, 10, 0, 'IMG_20160914_223449.jpg'),
(35, 2, '2016-09-14', 'Cardi keyko', '<p>Bahan : Twiscone Combii Denim</p>\r\n\r\n<p>Ukuran : fit XL Kancing Depan Full</p>\r\n\r\n<p>Warna :Hitam</p>', 50000, 10, 0, 'IMG_20160914_223513.jpg'),
(36, 10, '2016-09-15', 'Raisha Shar\'i', '<p>Bahan : maxi halus</p>\r\n\r\n<p>Ukuran : fit xl</p>\r\n\r\n<p>Pilihan Warna :Tosca, Pink, Ungu, Biru</p>', 120000, 10, 0, ',.jpg'),
(37, 10, '2016-09-15', 'Gamis Aulia', '<p>Bahan : Wadges</p>\r\n\r\n<p>Ukuran : fit XL</p>\r\n\r\n<p>Pilihan Warna: putih, ungu, biru, hijau</p>', 130000, 10, 0, 'a.jpg'),
(38, 10, '2016-09-15', 'Gamis Tunami', '<p>Bahan : Katun Rayon</p>\r\n\r\n<p>Ukuran :fit L</p>\r\n\r\n<p>Warna : Hitam</p>', 100000, 10, 0, 'b.jpg'),
(39, 10, '2016-09-15', 'Gamis Ayana Syari', '<p>Bahan : Maxi</p>\r\n\r\n<p>Ukuran : fit L</p>\r\n\r\n<p>Pilihan Warna : Mocca Marron</p>', 125000, 10, 0, 'BAJU-GAMIS-MUSLIM-TERBARU-67.jpg'),
(40, 10, '2016-09-15', 'Gamis Amina', '<p>Bahan : Maxi</p>\r\n\r\n<p>Ukuran : fit XL</p>\r\n\r\n<p>Pilihan Warna : Hitam, merah</p>', 100000, 7, 0, 'images1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `id_biaya` int(11) NOT NULL,
  `provinsi` int(4) NOT NULL,
  `kabkota` int(2) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`id_biaya`, `provinsi`, `kabkota`, `biaya`) VALUES
(1, 11, 137, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `judul`, `keterangan`) VALUES
(1, 'Tentang ONESHOP Bandar Lampung', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.</p>'),
(2, 'Cara Pembelian', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.</p>\r\n\r\n<div>\r\n<p>The Modern Business template by Start Bootstrap includes:</p>\r\n\r\n<ul>\r\n	<li><strong>Bootstrap v3.2.0</strong></li>\r\n	<li>jQuery v1.11.0</li>\r\n	<li>Font Awesome v4.1.0</li>\r\n	<li>Working PHP contact form with validation</li>\r\n	<li>Unstyled page elements for easy customization</li>\r\n	<li>17 HTML pages</li>\r\n</ul>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kabkota`
--

CREATE TABLE `tbl_kabkota` (
  `id_kabkota` int(4) NOT NULL,
  `nama_kabkota` varchar(50) NOT NULL,
  `id_provinsi` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kabkota`
--

INSERT INTO `tbl_kabkota` (`id_kabkota`, `nama_kabkota`, `id_provinsi`) VALUES
(1, 'JAKARTA PUSAT', 1),
(2, 'JAKARTA BARAT', 1),
(3, 'JAKARTA SELATAN', 1),
(4, 'JAKARTA TIMUR', 1),
(5, 'JAKARTA UTARA', 1),
(6, 'KEPULAUAN SERIBU', 1),
(7, 'TANGERANG', 2),
(8, 'TANGERANG SELATAN', 2),
(9, 'BOGOR', 3),
(10, 'DEPOK', 3),
(11, 'BEKASI', 3),
(12, 'MEDAN', 4),
(13, 'DELI SERDANG', 4),
(14, 'TEBING TINGGI', 4),
(15, 'BINJAI', 4),
(16, 'LANGKAT', 4),
(17, 'SERDANG BEDAGAI', 4),
(18, 'PEMATANG SIANTAR', 4),
(19, 'SIMALUNGUN', 4),
(20, 'ASAHAN', 4),
(21, 'BATU BARA', 4),
(22, 'TANJUNG BALAI', 4),
(23, 'LABUHAN BATU', 4),
(24, 'LABUHAN BATU UTARA', 4),
(25, 'LABUHAN BATU SELATAN', 4),
(26, 'KARO', 4),
(27, 'DAIRI', 4),
(28, 'PAKPAK BHARAT', 4),
(29, 'TOBA SAMOSIR', 4),
(30, 'SAMOSIR', 4),
(31, 'TAPANULI UTARA', 4),
(32, 'HUMBANG HASUNDUTAN', 4),
(33, 'SIBOLGA', 4),
(34, 'TAPANULI TENGAH', 4),
(35, 'PADANG SIDEMPUAN', 4),
(36, 'TAPANULI SELATAN', 4),
(37, 'PADANG LAWAS UTARA', 4),
(38, 'PADANG LAWAS', 4),
(39, 'GUNUNGSITOLI', 4),
(40, 'NIAS BARAT', 4),
(41, 'NIAS UTARA', 4),
(42, 'NIAS', 4),
(43, 'NIAS SELATAN', 4),
(44, 'MANDAILING NATAL', 4),
(45, 'BANDA ACEH', 5),
(46, 'ACEH BESAR', 5),
(47, 'SABANG', 5),
(48, 'ACEH BARAT', 5),
(49, 'ACEH JAYA', 5),
(50, 'NAGAN RAYA', 5),
(51, 'ACEH SELATAN', 5),
(52, 'ACEH BARAT DAYA', 5),
(53, 'SIMEULUE', 5),
(54, 'PIDIE', 5),
(55, 'PIDIE JAYA', 5),
(56, 'BIREUEN', 5),
(57, 'LHOKSEUMAWE', 5),
(58, 'ACEH UTARA', 5),
(59, 'LANGSA', 5),
(60, 'ACEH TIMUR', 5),
(61, 'ACEH TAMIANG', 5),
(62, 'ACEH TENGAH', 5),
(63, 'BENER MERIAH', 5),
(64, 'ACEH TENGGARA', 5),
(65, 'GAYO LUES', 5),
(66, 'SUBULUSSALAM', 5),
(67, 'ACEH SINGKIL', 5),
(68, 'PADANG', 6),
(69, 'KEPULAUAN MENTAWAI', 6),
(70, 'PARIAMAN', 6),
(71, 'PADANG PARIAMAN', 6),
(72, 'PESISIR SELATAN', 6),
(73, 'BUKITTINGGI', 6),
(74, 'AGAM', 6),
(75, 'PAYAKUMBUH', 6),
(76, 'LIMA PULUH KOTO/KOTA', 6),
(77, 'PASAMAN', 6),
(78, 'PASAMAN BARAT', 6),
(79, 'PADANG PANJANG', 6),
(80, 'TANAH DATAR', 6),
(81, 'SOLOK', 6),
(82, 'SAWAH LUNTO', 6),
(83, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 6),
(84, 'DHARMASRAYA', 6),
(85, 'SOLOK SELATAN', 6),
(86, 'PEKANBARU', 7),
(87, 'PELALAWAN', 7),
(88, 'KAMPAR', 7),
(89, 'ROKAN HULU', 7),
(90, 'SIAK', 7),
(91, 'BENGKALIS', 7),
(92, 'KEPULAUAN MERANTI', 7),
(93, 'DUMAI', 7),
(94, 'ROKAN HILIR', 7),
(95, 'TANJUNG PINANG', 8),
(96, 'BINTAN', 8),
(97, 'INDRAGIRI HILIR', 7),
(98, 'INDRAGIRI HULU', 7),
(99, 'BATAM', 8),
(100, 'KUANTAN SINGINGI', 7),
(101, 'KARIMUN', 8),
(102, 'NATUNA', 8),
(103, 'KEPULAUAN ANAMBAS', 8),
(104, 'LINGGA', 8),
(105, 'PALEMBANG', 9),
(106, 'OGAN KOMERING ILIR', 9),
(107, 'OGAN ILIR', 9),
(108, 'MUSI BANYUASIN', 9),
(109, 'MUSI RAWAS', 9),
(110, 'BANYUASIN', 9),
(111, 'PRABUMULIH', 9),
(112, 'MUARA ENIM', 9),
(113, 'LAHAT', 9),
(114, 'EMPAT LAWANG', 9),
(115, 'PAGAR ALAM', 9),
(116, 'LUBUK LINGGAU', 9),
(117, 'OGAN KOMERING ULU', 9),
(118, 'OGAN KOMERING ULU TIMUR', 9),
(119, 'OGAN KOMERING ULU SELATAN', 9),
(120, 'PANGKAL PINANG', 10),
(121, 'BANGKA', 10),
(122, 'BANGKA BARAT', 10),
(123, 'BELITUNG', 10),
(124, 'BELITUNG TIMUR', 10),
(125, 'BANGKA TENGAH', 10),
(126, 'BANGKA SELATAN', 10),
(127, 'METRO', 11),
(128, 'LAMPUNG TENGAH', 11),
(129, 'LAMPUNG TIMUR', 11),
(130, 'TULANG BAWANG BARAT', 11),
(131, 'LAMPUNG UTARA', 11),
(132, 'TULANG BAWANG', 11),
(133, 'MESUJI', 11),
(134, 'WAY KANAN', 11),
(135, 'LAMPUNG BARAT', 11),
(136, 'PESISIR BARAT', 11),
(137, 'BANDAR LAMPUNG', 11),
(138, 'LAMPUNG SELATAN', 11),
(139, 'PESAWARAN', 11),
(140, 'PRINGSEWU', 11),
(141, 'TANGGAMUS', 11),
(142, 'JAMBI', 12),
(143, 'MUARO JAMBI', 12),
(144, 'TANJUNG JABUNG BARAT', 12),
(145, 'TANJUNG JABUNG TIMUR', 12),
(146, 'BATANG HARI', 12),
(147, 'SUNGAIPENUH', 12),
(148, 'KERINCI', 12),
(149, 'BUNGO', 12),
(150, 'TEBO', 12),
(151, 'MERANGIN', 12),
(152, 'SAROLANGUN', 12),
(153, 'BENGKULU', 13),
(154, 'BENGKULU UTARA', 13),
(155, 'BENGKULU TENGAH', 13),
(156, 'BENGKULU SELATAN', 13),
(157, 'MUKO MUKO', 13),
(158, 'SELUMA', 13),
(159, 'KAUR', 13),
(160, 'REJANG LEBONG', 13),
(161, 'LEBONG', 13),
(162, 'KEPAHIANG', 13),
(163, 'BANDUNG', 3),
(164, 'BANDUNG BARAT', 3),
(165, 'CIMAHI', 3),
(166, 'PURWAKARTA', 3),
(167, 'SUBANG', 3),
(168, 'KARAWANG', 3),
(169, 'SERANG', 2),
(170, 'PANDEGLANG', 2),
(171, 'LEBAK', 2),
(172, 'CILEGON', 2),
(173, 'SUKABUMI', 3),
(174, 'CIANJUR', 3),
(175, 'GARUT', 3),
(176, 'CIREBON', 3),
(177, 'INDRAMAYU', 3),
(178, 'SUMEDANG', 3),
(179, 'MAJALENGKA', 3),
(180, 'KUNINGAN', 3),
(181, 'TASIKMALAYA', 3),
(182, 'CIAMIS', 3),
(183, 'PANGANDARAN', 3),
(184, 'BANJAR', 3),
(185, 'SEMARANG', 14),
(186, 'SALATIGA', 14),
(187, 'PEKALONGAN', 14),
(188, 'BATANG', 14),
(189, 'KENDAL', 14),
(190, 'TEGAL', 14),
(191, 'BREBES', 14),
(192, 'PEMALANG', 14),
(193, 'BANYUMAS', 14),
(194, 'CILACAP', 14),
(195, 'PURBALINGGA', 14),
(196, 'BANJARNEGARA', 14),
(197, 'PURWOREJO', 14),
(198, 'KEBUMEN', 14),
(199, 'YOGYAKARTA', 15),
(200, 'BANTUL', 15),
(201, 'SLEMAN', 15),
(202, 'KULON PROGO', 15),
(203, 'GUNUNG KIDUL', 15),
(204, 'MAGELANG', 14),
(205, 'TEMANGGUNG', 14),
(206, 'WONOSOBO', 14),
(207, 'SURAKARTA (SOLO)', 14),
(208, 'SUKOHARJO', 14),
(209, 'KARANGANYAR', 14),
(210, 'SRAGEN', 14),
(211, 'BOYOLALI', 14),
(212, 'KLATEN', 14),
(213, 'WONOGIRI', 14),
(214, 'GROBOGAN', 14),
(215, 'BLORA', 14),
(216, 'PATI', 14),
(217, 'REMBANG', 14),
(218, 'KUDUS', 14),
(219, 'JEPARA', 14),
(220, 'DEMAK', 14),
(221, 'SURABAYA', 16),
(222, 'GRESIK', 16),
(223, 'SIDOARJO', 16),
(224, 'MOJOKERTO', 16),
(225, 'JOMBANG', 16),
(226, 'BOJONEGORO', 16),
(227, 'LAMONGAN', 16),
(228, 'TUBAN', 16),
(229, 'MADIUN', 16),
(230, 'MAGETAN', 16),
(231, 'NGAWI', 16),
(232, 'PONOROGO', 16),
(233, 'PACITAN', 16),
(234, 'KEDIRI', 16),
(235, 'NGANJUK', 16),
(236, 'MALANG', 16),
(237, 'BATU', 16),
(238, 'BLITAR', 16),
(239, 'TULUNGAGUNG', 16),
(240, 'TRENGGALEK', 16),
(241, 'PASURUAN', 16),
(242, 'PROBOLINGGO', 16),
(243, 'LUMAJANG', 16),
(244, 'JEMBER', 16),
(245, 'BONDOWOSO', 16),
(246, 'SITUBONDO', 16),
(247, 'BANYUWANGI', 16),
(248, 'BANGKALAN', 16),
(249, 'SAMPANG', 16),
(250, 'PAMEKASAN', 16),
(251, 'SUMENEP', 16),
(252, 'BANJARMASIN', 17),
(253, 'BARITO KUALA', 17),
(254, 'BANJARBARU', 17),
(255, 'TANAH LAUT', 17),
(256, 'TAPIN', 17),
(257, 'HULU SUNGAI SELATAN', 17),
(258, 'HULU SUNGAI TENGAH', 17),
(259, 'HULU SUNGAI UTARA', 17),
(260, 'TABALONG', 17),
(261, 'BALANGAN', 17),
(262, 'KOTABARU', 17),
(263, 'TANAH BUMBU', 17),
(264, 'PALANGKA RAYA', 18),
(265, 'KAPUAS', 18),
(266, 'BARITO TIMUR', 18),
(267, 'BARITO SELATAN', 18),
(268, 'BARITO UTARA', 18),
(269, 'MURUNG RAYA', 18),
(270, 'KOTAWARINGIN BARAT', 18),
(271, 'LAMANDAU', 18),
(272, 'SUKAMARA', 18),
(273, 'SERUYAN', 18),
(274, 'KOTAWARINGIN TIMUR', 18),
(275, 'KATINGAN', 18),
(276, 'GUNUNG MAS', 18),
(277, 'PULANG PISAU', 18),
(278, 'SAMARINDA', 19),
(279, 'KUTAI KARTANEGARA', 19),
(280, 'BONTANG', 19),
(281, 'KUTAI TIMUR', 19),
(282, 'KUTAI BARAT', 19),
(283, 'BALIKPAPAN', 19),
(284, 'PENAJAM PASER UTARA', 19),
(285, 'PASER', 19),
(286, 'TARAKAN', 20),
(287, 'TANA TIDUNG', 20),
(288, 'MALINAU', 20),
(289, 'BULUNGAN (BULONGAN)', 20),
(290, 'BERAU', 19),
(291, 'NUNUKAN', 20),
(292, 'PONTIANAK', 21),
(293, 'KUBU RAYA', 21),
(294, 'SANGGAU', 21),
(295, 'SINTANG', 21),
(296, 'KAPUAS HULU', 21),
(297, 'KETAPANG', 21),
(298, 'KAYONG UTARA', 21),
(299, 'SINGKAWANG', 21),
(300, 'SAMBAS', 21),
(301, 'BENGKAYANG', 21),
(302, 'LANDAK', 21),
(303, 'SEKADAU', 21),
(304, 'MELAWI', 21),
(305, 'DENPASAR', 22),
(306, 'BADUNG', 22),
(307, 'GIANYAR', 22),
(308, 'BANGLI', 22),
(309, 'KLUNGKUNG', 22),
(310, 'KARANGASEM', 22),
(311, 'BULELENG', 22),
(312, 'TABANAN', 22),
(313, 'JEMBRANA', 22),
(314, 'MATARAM', 23),
(315, 'LOMBOK BARAT', 23),
(316, 'LOMBOK UTARA', 23),
(317, 'LOMBOK TENGAH', 23),
(318, 'LOMBOK TIMUR', 23),
(319, 'BIMA', 23),
(320, 'DOMPU', 23),
(321, 'SUMBAWA', 23),
(322, 'SUMBAWA BARAT', 23),
(323, 'KUPANG', 24),
(324, 'SABU RAIJUA', 24),
(325, 'TIMOR TENGAH SELATAN', 24),
(326, 'TIMOR TENGAH UTARA', 24),
(327, 'BELU', 24),
(328, 'ALOR', 24),
(329, 'ROTE NDAO', 24),
(330, 'SIKKA', 24),
(331, 'ENDE', 24),
(332, 'FLORES TIMUR', 24),
(333, 'NGADA', 24),
(334, 'NAGEKEO', 24),
(335, 'MANGGARAI', 24),
(336, 'MANGGARAI TIMUR', 24),
(337, 'LEMBATA', 24),
(338, 'MANGGARAI BARAT', 24),
(339, 'SUMBA TIMUR', 24),
(340, 'SUMBA BARAT', 24),
(341, 'SUMBA BARAT DAYA', 24),
(342, 'SUMBA TENGAH', 24),
(343, 'MAKASSAR', 25),
(344, 'GOWA', 25),
(345, 'BONE', 25),
(346, 'MAROS', 25),
(347, 'PANGKAJENE KEPULAUAN', 25),
(348, 'BARRU', 25),
(349, 'SOPPENG', 25),
(350, 'WAJO', 25),
(351, 'PAREPARE', 25),
(352, 'PINRANG', 25),
(353, 'POLEWALI MANDAR', 26),
(354, 'MAMUJU', 26),
(355, 'MAMASA', 26),
(356, 'MAJENE', 26),
(357, 'MAMUJU UTARA', 26),
(358, 'SIDENRENG RAPPANG/RAPANG', 25),
(359, 'SINJAI', 25),
(360, 'ENREKANG', 25),
(361, 'TANA TORAJA', 25),
(362, 'TORAJA UTARA', 25),
(363, 'LUWU UTARA', 25),
(364, 'PALOPO', 25),
(365, 'LUWU', 25),
(366, 'LUWU TIMUR', 25),
(367, 'TAKALAR', 25),
(368, 'JENEPONTO', 25),
(369, 'BANTAENG', 25),
(370, 'BULUKUMBA', 25),
(371, 'SELAYAR (KEPULAUAN SELAYAR)', 25),
(372, 'KENDARI', 27),
(373, 'KONAWE', 27),
(374, 'KONAWE UTARA', 27),
(375, 'KONAWE SELATAN', 27),
(376, 'KOLAKA', 27),
(377, 'MUNA', 27),
(378, 'BUTON UTARA', 27),
(379, 'BAU-BAU', 27),
(380, 'BUTON', 27),
(381, 'BOMBANA', 27),
(382, 'WAKATOBI', 27),
(383, 'KOLAKA UTARA', 27),
(384, 'PALU', 28),
(385, 'SIGI', 28),
(386, 'DONGGALA', 28),
(387, 'PARIGI MOUTONG', 28),
(388, 'TOLI-TOLI', 28),
(389, 'BUOL', 28),
(390, 'POSO', 28),
(391, 'TOJO UNA-UNA', 28),
(392, 'BANGGAI', 28),
(393, 'BANGGAI KEPULAUAN', 28),
(394, 'MOROWALI', 28),
(395, 'MANADO', 29),
(396, 'MINAHASA SELATAN', 29),
(397, 'MINAHASA UTARA', 29),
(398, 'MINAHASA', 29),
(399, 'TOMOHON', 29),
(400, 'BITUNG', 29),
(401, 'KOTAMOBAGU', 29),
(402, 'BOLAANG MONGONDOW (BOLMONG)', 29),
(403, 'BOLAANG MONGONDOW UTARA', 29),
(404, 'BOLAANG MONGONDOW SELATAN', 29),
(405, 'BOLAANG MONGONDOW TIMUR', 29),
(406, 'KEPULAUAN SANGIHE', 29),
(407, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 29),
(408, 'KEPULAUAN TALAUD', 29),
(409, 'MINAHASA TENGGARA', 29),
(410, 'GORONTALO', 30),
(411, 'GORONTALO UTARA', 30),
(412, 'BOALEMO', 30),
(413, 'POHUWATO', 30),
(414, 'BONE BOLANGO', 30),
(415, 'AMBON', 31),
(416, 'MALUKU BARAT DAYA', 31),
(417, 'MALUKU TENGGARA BARAT', 31),
(418, 'MALUKU TENGAH', 31),
(419, 'BURU SELATAN', 31),
(420, 'SERAM BAGIAN TIMUR', 31),
(421, 'SERAM BAGIAN BARAT', 31),
(422, 'BURU', 31),
(423, 'MALUKU TENGGARA', 31),
(424, 'TUAL', 31),
(425, 'KEPULAUAN ARU', 31),
(426, 'TERNATE', 32),
(427, 'HALMAHERA BARAT', 32),
(428, 'HALMAHERA UTARA', 32),
(429, 'HALMAHERA SELATAN', 32),
(430, 'PULAU MOROTAI', 32),
(431, 'KEPULAUAN SULA', 32),
(432, 'TIDORE KEPULAUAN', 32),
(433, 'HALMAHERA TENGAH', 32),
(434, 'HALMAHERA TIMUR', 32),
(435, 'BIAK NUMFOR', 33),
(436, 'SUPIORI', 33),
(437, 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 33),
(438, 'WAROPEN', 33),
(439, 'MAMBERAMO RAYA', 33),
(440, 'MANOKWARI', 34),
(441, 'PEGUNUNGAN ARFAK', 34),
(442, 'MANOKWARI SELATAN', 34),
(443, 'TELUK WONDAMA', 34),
(444, 'TELUK BINTUNI', 34),
(445, 'TAMBRAUW', 34),
(446, 'SORONG', 34),
(447, 'SORONG SELATAN', 34),
(448, 'MAYBRAT', 34),
(449, 'RAJA AMPAT', 34),
(450, 'FAKFAK', 34),
(451, 'KAIMANA', 34),
(452, 'PANIAI', 33),
(453, 'DEIYAI (DELIYAI)', 33),
(454, 'INTAN JAYA', 33),
(455, 'NABIRE', 33),
(456, 'DOGIYAI', 33),
(457, 'PUNCAK JAYA', 33),
(458, 'PUNCAK', 33),
(459, 'JAYAPURA', 33),
(460, 'SARMI', 33),
(461, 'KEEROM', 33),
(462, 'JAYAWIJAYA', 33),
(463, 'MAMBERAMO TENGAH', 33),
(464, 'LANNY JAYA', 33),
(465, 'TOLIKARA', 33),
(466, 'NDUGA', 33),
(467, 'YAHUKIMO', 33),
(468, 'PEGUNUNGAN BINTANG', 33),
(469, 'YALIMO', 33),
(470, 'MERAUKE', 33),
(471, 'BOVEN DIGOEL', 33),
(472, 'ASMAT', 33),
(473, 'MAPPI', 33),
(474, 'MIMIKA', 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Dress'),
(2, 'Kemeja'),
(3, 'Jaket'),
(4, 'Cardigan'),
(5, 'Sweater'),
(6, 'Rok'),
(7, 'Baju atasan'),
(8, 'Celana Jeans'),
(9, 'Batik'),
(10, 'Baju Gamis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_konsumen` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'n',
  `balas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_barang`, `tanggal`, `id_konsumen`, `komentar`, `status`, `balas`) VALUES
(1, 4, '2016-09-24 03:02:00', 2, 'bagus banget..', 'n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsumen`
--

CREATE TABLE `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_konsumen` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` int(4) NOT NULL,
  `provinsi` int(2) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `tanggal_daftar`, `nama_konsumen`, `alamat`, `kota`, `provinsi`, `kode_pos`, `telepon`, `email`, `password`) VALUES
(0, '2016-09-15 08:12:48', 'Admin', '', 137, 11, '', '', 'admin@gmail.com', ''),
(1, '2016-08-31 17:00:00', 'Raisa Ariandini', 'Jalan Teuku Umar No. 52, Kedaton', 137, 11, '12345', '085758857775', 'raisa@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, '2016-09-13 05:33:29', 'Maudy Ayunda', 'Jalan Pagar Alam No. 114, Kedaton', 137, 11, '12345', '081299889933', 'maudy@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, '2021-06-14 02:06:10', 'naufal', 'jalan baru', 7, 2, '15131', '45353453', 'naufalfadhh@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `rekening_asal` varchar(20) NOT NULL,
  `no_rekening_asal` varchar(20) NOT NULL,
  `pemilik_rekening` varchar(30) NOT NULL,
  `rekening_tujuan` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `status_bayar` varchar(30) NOT NULL DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_bayar`, `tanggal_bayar`, `id_transaksi`, `rekening_asal`, `no_rekening_asal`, `pemilik_rekening`, `rekening_tujuan`, `jumlah_bayar`, `bukti_bayar`, `status_bayar`) VALUES
(5, '2016-09-24', 1, 'BNI', '123456789', 'Raisa Ariandini', 'BNI', 240000, 'logo_php.png', 'Pembayaran Diterima'),
(6, '2016-10-11', 2, 'BNI', '123456789', 'Raisa Ariandini', 'BNI', 95000, 'php-1.jpg', 'Pembayaran Diterima'),
(7, '2021-06-17', 3, 'BNI', '12121', '212121', 'BCA', 212222, 'asl.png', 'Pembayaran Ditolak'),
(8, '0000-00-00', 4, '', '', '', '', 0, '', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'DKI JAKARTA'),
(2, 'BANTEN'),
(3, 'JAWA BARAT'),
(4, 'SUMATERA UTARA'),
(5, 'NANGGROE ACEH DARUSSALAM (NAD)'),
(6, 'SUMATERA BARAT'),
(7, 'RIAU'),
(8, 'KEPULAUAN RIAU'),
(9, 'SUMATERA SELATAN'),
(10, 'BANGKA BELITUNG'),
(11, 'LAMPUNG'),
(12, 'JAMBI'),
(13, 'BENGKULU'),
(14, 'JAWA TENGAH'),
(15, 'DI YOGYAKARTA'),
(16, 'JAWA TIMUR'),
(17, 'KALIMANTAN SELATAN'),
(18, 'KALIMANTAN TENGAH'),
(19, 'KALIMANTAN TIMUR'),
(20, 'KALIMANTAN UTARA'),
(21, 'KALIMANTAN BARAT'),
(22, 'BALI'),
(23, 'NUSA TENGGARA BARAT (NTB)'),
(24, 'NUSA TENGGARA TIMUR (NTT)'),
(25, 'SULAWESI SELATAN'),
(26, 'SULAWESI BARAT'),
(27, 'SULAWESI TENGGARA'),
(28, 'SULAWESI TENGAH'),
(29, 'SULAWESI UTARA'),
(30, 'GORONTALO'),
(31, 'MALUKU'),
(32, 'MALUKU UTARA'),
(33, 'PAPUA'),
(34, 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_konsumen` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tanggal_transaksi`, `id_konsumen`, `total_bayar`, `status`) VALUES
(1, '2016-09-24 06:47:56', 1, 240000, 'Transaksi Selesai'),
(2, '2016-10-11 02:43:53', 1, 95000, 'Proses Pengiriman'),
(3, '2021-06-14 02:06:48', 3, 100000, 'Pembayaran Ditolak'),
(4, '2021-06-15 08:33:59', 3, 200000, 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah_beli`, `jumlah_bayar`) VALUES
(5, 1, 40, 1, 100000),
(6, 1, 39, 1, 125000),
(7, 2, 1, 1, 80000),
(8, 3, 40, 1, 100000),
(9, 4, 40, 2, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_tmp`
--

CREATE TABLE `tbl_transaksi_tmp` (
  `id_konsumen` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`id_biaya`),
  ADD KEY `provinsi` (`provinsi`,`kabkota`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tbl_kabkota`
--
ALTER TABLE `tbl_kabkota`
  ADD PRIMARY KEY (`id_kabkota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_warta` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_konsumen_2` (`id_konsumen`);

--
-- Indeks untuk tabel `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id_konsumen`),
  ADD KEY `kota` (`kota`),
  ADD KEY `provinsi` (`provinsi`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `pendaftar` (`id_transaksi`),
  ADD KEY `id_konsumen` (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indeks untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD CONSTRAINT `tbl_komentar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_komentar_ibfk_2` FOREIGN KEY (`id_konsumen`) REFERENCES `tbl_konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `tbl_konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `dimsumin`
--
CREATE DATABASE IF NOT EXISTS `dimsumin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dimsumin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `foto`) VALUES
(1, 'naufal', '202cb962ac59075b964b07152d234b70', 'Naufal Fadhillah', '60d98a350ba7c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimsum`
--

CREATE TABLE `dimsum` (
  `id_dimsum` int(11) NOT NULL,
  `nama_dimsum` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimsum`
--

INSERT INTO `dimsum` (`id_dimsum`, `nama_dimsum`, `stok`, `harga`, `gambar`, `deskripsi`) VALUES
(1, 'Dimsum Mentai', 20, 25000, 'menu1.png', 'Halo Dimsumers, Lezatnya sebuah dimsum tak hanya memiliki cita rasa enak dilidah saja, tetapi juga penampilan menarik, gizi sempurna, dan perpaduan bumbu yang menggugah selera serta membuat ketagihan. Kami berusaha keras untuk memenuhi permintaan pelanggan. Seluruh olahan dimsum kami dimasak kualitas setara dengan restoran bintang lima dan harga yang terjangkau. Dimsum mentai ini dibuat dengan daging segar pilihan lalu diolah dengan bumbu terbaik kami dan dibungkus, lalu diberi saus, mayones, dan bubuk cabai untuk saus mentainya dan lalu di tabur rumput laut di atasnya.'),
(2, 'Dimsum Mentai Tobiko', 20, 25000, 'menu2.png', 'Halo Dimsumers, Lezatnya sebuah dimsum tak hanya memiliki cita rasa enak dilidah saja, tetapi juga penampilan menarik, gizi sempurna, dan perpaduan bumbu yang menggugah selera serta membuat ketagihan. Kami berusaha keras untuk memenuhi permintaan pelanggan. Seluruh olahan dimsum kami dimasak kualitas setara dengan restoran bintang lima dan harga yang terjangkau. Dimsum mentai ini dibuat dengan daging segar pilihan lalu diolah dengan bumbu terbaik kami dan dibungkus, lalu diberi saus, mayones, dan bubuk cabai untuk saus mentainya dan lalu di tabur rumput laut di atasnya.'),
(3, 'Dimsum Chessy', 20, 20000, 'menu3.png', 'Halo Dimsumers, Lezatnya sebuah dimsum tak hanya memiliki cita rasa enak dilidah saja, tetapi juga penampilan menarik, gizi sempurna, dan perpaduan bumbu yang menggugah selera serta membuat ketagihan. Kami berusaha keras untuk memenuhi permintaan pelanggan. Seluruh olahan dimsum kami dimasak kualitas setara dengan restoran bintang lima dan harga yang terjangkau. Dimsum mentai ini dibuat dengan daging segar pilihan lalu diolah dengan bumbu terbaik kami dan dibungkus, lalu diberi saus, mayones, dan bubuk cabai untuk saus mentainya dan lalu di tabur rumput laut di atasnya.'),
(4, 'Dimsum Original', 20, 15000, 'menu4.png', 'Halo Dimsumers, Lezatnya sebuah dimsum tak hanya memiliki cita rasa enak dilidah saja, tetapi juga penampilan menarik, gizi sempurna, dan perpaduan bumbu yang menggugah selera serta membuat ketagihan. Kami berusaha keras untuk memenuhi permintaan pelanggan. Seluruh olahan dimsum kami dimasak kualitas setara dengan restoran bintang lima dan harga yang terjangkau. Dimsum mentai ini dibuat dengan daging segar pilihan lalu diolah dengan bumbu terbaik kami dan dibungkus, lalu diberi saus, mayones, dan bubuk cabai untuk saus mentainya dan lalu di tabur rumput laut di atasnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `jumlah_bayar` int(7) NOT NULL,
  `bukti_bayar` varchar(60) NOT NULL,
  `status_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_transaksi`, `tanggal_bayar`, `nama`, `no_telepon`, `jumlah_bayar`, `bukti_bayar`, `status_bayar`) VALUES
(1, 3, '2021-06-16', 'naufal', '231312323', 70000, '60cafff6ae0d6.png', 'Pembayaran Diterima'),
(2, 4, '2021-06-15', 'adam', '121212112121', 100000, '60cafcc5d9736.png', 'Pembayaran Diterima'),
(3, 5, '2021-06-17', '', '', 0, '', 'Pembayaran Diterima'),
(4, 6, '2021-06-23', 'Naufal Fadhillah', '081317375341', 20000, '60d1b0e35a630.jpg', 'Pembayaran Diterima'),
(8, 10, '2021-06-17', 'Naufal Fadhillah', '081317375341', 100000, '60d401729926d.png', 'Pembayaran Diterima'),
(9, 11, '2021-06-25', 'Naufal Fadhillah', '081317375341', 35000, '60d403b442df7.jpg', 'Pembayaran Diterima'),
(11, 13, '2021-06-30', 'Naufal Fadhillah', '081317375341', 10000, '60dbd5c12b8ce.jpg', 'Pembayaran Diterima'),
(15, 17, '2021-06-29', 'Naufal Fadhillah', '081317375341', 10000, '60db103dbd24f.jpg', 'Pembayaran Diterima'),
(16, 18, '2021-06-30', 'Naufal Fadhillah', '081317375341', 60000, 'default.png', 'Pembayaran Diterima'),
(17, 19, '2021-07-06', '', '', 0, '', 'Menunggu Pembayaran'),
(18, 20, '2021-07-07', 'Naufal Fadhillah', '081317375341', 35000, '60e5178500030.png', 'Menunggu Verifikasi Pembayaran'),
(19, 21, '2021-07-07', '', '', 0, '', 'Menunggu Pembayaran'),
(20, 22, '2021-07-09', '', '', 0, '', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `email`, `telepon`, `alamat`, `password`) VALUES
(1, 'adam ubah', 'naufalfn00@gmail.com222', '1231323232', 'jalan umum', '202cb962ac59075b964b07152d234b70'),
(8, 'naufalfadhh', 'naufalf66@gmail.com', '32424242', 'jalan umum', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', '081317275341', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(10, 'Aren Tyas', 'arentyas@gmail.com', '081317275341', 'Total Persada', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_dimsum` int(11) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_transaksi`, `id_dimsum`, `jumlah`) VALUES
(1, 2, 2, 1),
(2, 2, 3, 2),
(14, 7, 1, 1),
(15, 7, 2, 3),
(16, 7, 3, 1),
(23, 11, 2, 1),
(26, 13, 1, 1),
(27, 13, 2, 1),
(28, 13, 3, 1),
(29, 13, 4, 1),
(36, 17, 1, 1),
(37, 17, 2, 1),
(38, 17, 3, 1),
(39, 17, 4, 1),
(40, 18, 3, 1),
(41, 18, 2, 1),
(42, 18, 4, 1),
(43, 19, 1, 1),
(44, 20, 2, 1),
(45, 21, 3, 1),
(46, 22, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `total` int(7) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembeli`, `nama`, `email`, `alamat`, `kota`, `telepon`, `total`, `status`, `tanggal_transaksi`) VALUES
(11, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 35000, 'Pembayaran Diterima', '2021-06-24'),
(13, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 95000, 'Pembayaran Diterima', '2021-06-28'),
(17, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 95000, 'Pembayaran Diterima', '2021-06-29'),
(18, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 70000, 'Pembayaran Diterima', '2021-06-30'),
(19, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 35000, 'Menunggu Pembayaran', '2021-07-06'),
(20, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 35000, 'Menunggu Verifikasi Pembayaran', '2021-07-07'),
(21, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 30000, 'Menunggu Pembayaran', '2021-07-07'),
(22, 9, 'Naufal Fadhillah', 'naufalfadhillah@gmail.com', 'Vila Grand Tomang, Jl. Tomang waru 1 B1 No.9', 'Tangerang', '081317275341', 35000, 'Menunggu Pembayaran', '2021-07-09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dimsum`
--
ALTER TABLE `dimsum`
  ADD PRIMARY KEY (`id_dimsum`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_dimsum` (`id_dimsum`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dimsum`
--
ALTER TABLE `dimsum`
  MODIFY `id_dimsum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Database: `pemesanan`
--
CREATE DATABASE IF NOT EXISTS `pemesanan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pemesanan`;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-21 13:37:09', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
