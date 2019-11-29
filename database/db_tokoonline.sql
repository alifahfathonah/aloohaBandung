-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Agu 2016 pada 13.02
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `account_id` int(5) NOT NULL,
  `account_email` varchar(35) NOT NULL,
  `account_password1` varchar(100) NOT NULL,
  `account_password2` varchar(100) NOT NULL,
  `account_nama` varchar(50) NOT NULL,
  `account_jk` enum('L','P') NOT NULL DEFAULT 'L',
  `account_alamat` text NOT NULL,
  `kota_id` int(5) NOT NULL,
  `account_tlp` char(15) NOT NULL,
  `account_foto` varchar(100) NOT NULL,
  `account_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `account_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`account_id`, `account_email`, `account_password1`, `account_password2`, `account_nama`, `account_jk`, `account_alamat`, `kota_id`, `account_tlp`, `account_foto`, `account_status`, `account_post`) VALUES
(2, 'ali.dihaw96@gmail.com', '1f32aa4c9a1d2ea010adcf2348166a04', '827ccb0eea8a706c4c34a16891f84e7b', 'Ali Abdul Wahid', 'L', 'Bandung', 2, '0812345', '1471606174-13924953_1393841163966170_62915728544292481_n.jpg', 'Y', '2016-07-31 00:00:00'),
(9, 'anggi1@gmail.com', 'e8059811450b854a7b77cc653761282d', 'bc554ecf2b33458ff1f152433cd4c813', 'Anggi Sholihatus1', 'P', 'Subang', 1, '12345', '1471606157-bg.jpg', 'N', '2016-08-01 22:36:07'),
(11, 'dafi@gmail.com', 'b80d536b6ce80ff8cd8daa5c1f8477c5', 'dafi@gmail.com', 'Dafi A', 'L', 'Sarijadi', 2, '0891181818', '1471680707-2.jpg', 'Y', '2016-08-20 10:11:47'),
(16, 'anggi123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'Anggi Sholihatus ', 'L', 'subang', 3, '1231', '1471683248-3382.jpg', 'Y', '2016-08-20 15:54:08'),
(23, 'agus1234@gmail.com', '994483695cd2ade3c89d7b68ae1981e1', '80748430dea0437a37e1760874e3f85e', 'Agus', 'L', '2', 1, '911001', '1472130066-3382.jpg', 'Y', '2016-08-25 20:01:06'),
(24, 'navagiaginasta@gmail.com', 'e6de19452e3a89a15d0875d78882cac1', 'vava', 'Vava Aldava', 'L', 'Haurwangi', 1, '087820033395', '1472384691-comment_author_photo.jpg', 'Y', '2016-08-28 18:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_user` varchar(30) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_pass2` varchar(50) NOT NULL,
  `admin_nama` varchar(30) NOT NULL,
  `admin_alamat` varchar(250) NOT NULL,
  `admin_telepon` varchar(15) NOT NULL,
  `admin_ip` varchar(12) NOT NULL,
  `admin_online` int(10) NOT NULL,
  `admin_level_kode` int(3) NOT NULL,
  `admin_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_user`, `admin_pass`, `admin_pass2`, `admin_nama`, `admin_alamat`, `admin_telepon`, `admin_ip`, `admin_online`, `admin_level_kode`, `admin_status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Administrator', 'Bandung', '087820033395', '', 0, 1, 'A'),
('superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'Super Admin', '-', '-', '', 0, 1, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_level`
--

CREATE TABLE `admin_level` (
  `admin_level_kode` int(3) NOT NULL,
  `admin_level_nama` varchar(30) NOT NULL,
  `admin_level_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_level`
--

INSERT INTO `admin_level` (`admin_level_kode`, `admin_level_nama`, `admin_level_status`) VALUES
(1, 'Administrator', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(5) NOT NULL,
  `berita_judul` varchar(250) NOT NULL,
  `headline` enum('N','Y') NOT NULL DEFAULT 'N',
  `berita_deskripsi` text NOT NULL,
  `berita_waktu` datetime NOT NULL,
  `berita_hits` int(3) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `berita_foto` varchar(100) NOT NULL,
  `berita_foto2` varchar(100) NOT NULL,
  `berita_foto3` varchar(100) NOT NULL,
  `berita_foto4` varchar(100) NOT NULL,
  `berita_foto5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_judul`, `headline`, `berita_deskripsi`, `berita_waktu`, `berita_hits`, `tags`, `kategori_id`, `admin_nama`, `berita_foto`, `berita_foto2`, `berita_foto3`, `berita_foto4`, `berita_foto5`) VALUES
(4, 'Mobil Terbaru 2016 Tips', 'N', '<p>\r\n	Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat</p>\r\n', '2016-08-14 14:38:45', 6, '', 2, 'Administrator', '1471160455-Harga-Mobil-Murah-Daihatsu.jpg', '1471160325-Harga-Mobil-Murah-Daihatsu.jpg', '1471160325-Harga-Mobil-Murah-Honda.jpg', '1471160325-Honda-Brio-1.jpg', '1471160325-Mobil-Terbaik-di-Indonesia.jpg'),
(5, 'Mobil Honda Super Cepat Tips', 'Y', '<p>\r\n	Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat&nbsp;Mobil Honda Super Cepat</p>\r\n', '2016-08-14 14:46:08', 55, '', 2, 'Administrator', '1471160768-Harga-Mobil-Murah-Honda.jpg', '1471160768-Honda-Brio-1.jpg', '1471160768-Harga-Mobil-Murah-Daihatsu.jpg', '1471160768-Harga-Mobil-Murah-Honda.jpg', '1471160768-Harga-Mobil-Murah-Daihatsu.jpg'),
(6, 'Honda Meluncurkan mobil terbaiknya pada 2017', 'N', '<p>\r\n	Honda Meluncurkan mobil terbaiknya pada 2017 nanti&nbsp;Honda Meluncurkan mobil terbaiknya pada 2017 nanti&nbsp;Honda Meluncurkan mobil terbaiknya pada 2017 nanti&nbsp;Honda Meluncurkan mobil terbaiknya pada 2017 nanti</p>\r\n', '2016-08-14 14:48:31', 42, '', 1, 'Administrator', '1471160911-Honda-Brio-1.jpg', '1471160911-Honda-Brio-1.jpg', '1471160911-Honda-Brio-1.jpg', '1471160911-Honda-Brio-1.jpg', '1471160911-Honda-Brio-1.jpg'),
(7, 'HP  Samsung yang sangat diminati pada tahun 2015', 'N', '<p align="justify">\r\n	HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015 &nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015 &nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015 &nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015 &nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015 &nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;HP &nbsp;Samsung yang sangat diminati pada tahun 2015&nbsp;</p>\r\n', '2016-08-14 16:50:59', 92, '2', 1, 'Administrator', '1471168259-IMG_3058 copy.JPG', '1471168259-IMG_3056 copy.JPG', '1471168259-IMG_3058 copy.JPG', '1471168259-IMG_3058 copy.JPG', '1471168259-IMG_3059 copy.JPG'),
(8, 'Tips &amp; Trik', 'N', '<p>\r\n	Tips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; TrikTips &amp; Trik</p>\r\n', '2016-08-18 17:04:24', 23, '', 3, 'Administrator', '1472398537-IMG_3053 copy.JPG', '1472398537-IMG_3054 copy.JPG', '1472398537-IMG_3055 copy.JPG', '1472398538-IMG_3056 copy.JPG', '1472398538-IMG_3058 copy.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(3292, 1472635617, '::1', '2407'),
(3293, 1472635863, '::1', '2406'),
(3294, 1472635870, '::1', '0453'),
(3295, 1472638621, '::1', '3758');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(3) NOT NULL,
  `identitas_website` varchar(250) NOT NULL,
  `identitas_deskripsi` text NOT NULL,
  `identitas_keyword` text NOT NULL,
  `identitas_alamat` varchar(250) NOT NULL,
  `identitas_notelp` char(20) NOT NULL,
  `identitas_fb` varchar(100) NOT NULL,
  `identitas_email` varchar(100) NOT NULL,
  `identitas_tw` varchar(100) NOT NULL,
  `identitas_ig` varchar(100) NOT NULL,
  `identitas_gp` varchar(100) NOT NULL,
  `identitas_yb` varchar(100) NOT NULL,
  `identitas_maps` varchar(50) NOT NULL,
  `identitas_favicon` varchar(250) NOT NULL,
  `identitas_author` varchar(100) NOT NULL,
  `identitas_warning` varchar(100) NOT NULL,
  `identitas_aktif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `identitas_website`, `identitas_deskripsi`, `identitas_keyword`, `identitas_alamat`, `identitas_notelp`, `identitas_fb`, `identitas_email`, `identitas_tw`, `identitas_ig`, `identitas_gp`, `identitas_yb`, `identitas_maps`, `identitas_favicon`, `identitas_author`, `identitas_warning`, `identitas_aktif`) VALUES
(1, 'alohaBandung.com', 'dcubes', 'alohaBandung.com', 'alohaBandung.com', '087820033395', 'https://www.facebook.com/', 'info@alohabandung.com', 'https://twitter.com/', 'http://instagram.com/', 'https://plus.google.com/', 'https://www.youtube.com/', '-6.848546,107.492616', 'fav_icon.ico', 'www.nava.web.id | Nava Gia Ginasta', 'DEMO WEBSITE IS UP', '2017-07-26 11:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `iklan_id` int(5) NOT NULL,
  `iklan_link` varchar(250) NOT NULL,
  `iklan_gambar` varchar(100) NOT NULL,
  `iklan_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`iklan_id`, `iklan_link`, `iklan_gambar`, `iklan_post`) VALUES
(1, 'http://nava.web.id', '1471167612-iklan1.jpg', '2016-08-14 16:40:12'),
(2, 'http://nava.web.id', '1471167440-iklan2.JPG', '2016-08-14 16:37:20'),
(3, 'http://nava.web.id', '1471167185-iklan3.JPG', '2016-08-14 16:33:05'),
(4, 'http://nava.web.id', '1471168125-iklan4.jpg', '2016-08-14 16:48:45'),
(5, 'http://nava.web.id', '1471168814-iklan5.jpg', '2016-08-14 17:00:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(3) NOT NULL,
  `kategori_judul` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_judul`, `admin_nama`) VALUES
(1, 'Berita', 'Administrator'),
(2, 'Review', 'Administrator'),
(3, 'Artikel', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katproduk`
--

CREATE TABLE `katproduk` (
  `katproduk_id` int(5) NOT NULL,
  `katproduk_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katproduk`
--

INSERT INTO `katproduk` (`katproduk_id`, `katproduk_nama`) VALUES
(1, 'Motor'),
(2, 'Mobil'),
(3, 'Properti'),
(4, 'Keperluan Pribadi'),
(5, 'Elektronik &amp; Gadget '),
(6, 'Hobi &amp; Olahraga'),
(7, 'Rumah Tangga'),
(8, 'Perlengkapan Bayi &amp; Anak'),
(9, 'Kantor &amp; Industri'),
(10, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(5) NOT NULL,
  `kota_nama` varchar(50) NOT NULL,
  `provinsi_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota_nama`, `provinsi_id`) VALUES
(1, 'Cianjur', 1),
(2, 'Bandung', 1),
(3, 'Subang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_kode` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_deskripsi` varchar(50) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_site` enum('A','H') NOT NULL DEFAULT 'A',
  `menu_level` char(1) NOT NULL,
  `menu_subkode` int(11) NOT NULL,
  `menu_urutan` int(2) NOT NULL,
  `menu_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_kode`, `menu_nama`, `menu_deskripsi`, `menu_url`, `menu_site`, `menu_level`, `menu_subkode`, `menu_urutan`, `menu_status`) VALUES
(1, 'Admin', 'Admin', 'admin', 'A', '1', 0, 1, 'A'),
(2, 'Public', 'Menu Public', '#', 'A', '1', 0, 0, 'A'),
(3, 'Setting', 'fa-cogs', '#', 'A', '2', 1, 8, 'A'),
(4, 'Dashboard', 'fa fa-home', 'admin', 'A', '2', 1, 1, 'A'),
(5, 'Identitas Website', 'Informasi Identitas Website', 'website/identitas/edit/1', 'A', '3', 24, 1, 'A'),
(6, 'Modul Barang', 'fa fa-shopping-cart', '#', 'H', '2', 1, 4, 'A'),
(7, 'Daftar Menu', 'Informasi Daftar Menu', 'pengaturan/menu', 'A', '3', 3, 1, 'A'),
(8, 'Daftar Pengguna', 'Informasi Daftar Pengguna', 'pengaturan/pengguna', 'A', '3', 3, 2, 'A'),
(9, 'Kelompok Pengguna', 'Informasi Kelompok Pengguna', 'pengaturan/kelompok_pengguna', 'A', '3', 3, 3, 'A'),
(10, 'Hak Akses Kelompok', 'Informasi Hak Akses Kelompok', 'pengaturan/hak_akses', 'A', '3', 3, 4, 'A'),
(11, 'Kategori Barang', 'Informasi Kategori Barang', 'website/katproduk', 'A', '3', 6, 1, 'A'),
(12, 'Barang', 'Informasi Barang', 'website/produk', 'A', '3', 6, 2, 'A'),
(13, 'Penjual Produk', 'Informasi Penjual Produk', 'website/accout', 'A', '3', 6, 5, 'H'),
(14, 'Kota', 'Informasi Kota', 'website/kota', 'A', '3', 18, 2, 'A'),
(15, 'Modul Berita', 'fa fa-newspaper-o', '#', 'A', '2', 1, 3, 'A'),
(16, 'Kategori Berita', 'Informasi Kategori Berita', 'website/kategori', 'A', '3', 15, 1, 'H'),
(17, 'Berita', 'Informasi Berita', 'website/berita', 'A', '3', 15, 2, 'A'),
(18, 'Modul User', 'fa fa-users', '#', 'A', '2', 1, 5, 'A'),
(19, 'User', 'Informasi User', 'website/account', 'A', '3', 18, 1, 'A'),
(20, 'Newsletter', 'Informasi Newsletter', 'website/newsletter', 'A', '3', 15, 4, 'A'),
(21, 'Tags', 'Informasi Tags Berita', 'website/tags', 'A', '3', 15, 3, 'A'),
(22, 'Iklan', 'fa fa-dollar', 'website/iklan', 'A', '2', 1, 6, 'A'),
(23, '', '', '', 'H', '1', 0, 0, 'H'),
(24, 'Modul Website', 'fa fa-laptop', '#', 'H', '2', 1, 2, 'A'),
(25, 'Slide', 'Infromasi Slide', 'website/slide', 'A', '3', 24, 2, 'A'),
(26, 'Halaman Statis', 'Informasi Halaman Statis', 'website/halaman_statis', 'A', '3', 24, 3, 'A'),
(27, 'Backup Data', 'fa fa-download', 'backup', 'A', '2', 1, 7, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_admin`
--

CREATE TABLE `menu_admin` (
  `menu_admin_kode` int(11) NOT NULL,
  `menu_kode` int(11) NOT NULL,
  `admin_level_kode` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_kode`, `menu_kode`, `admin_level_kode`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 5, 1),
(4, 6, 1),
(5, 7, 1),
(6, 8, 1),
(7, 9, 1),
(8, 10, 1),
(9, 11, 1),
(10, 12, 1),
(11, 13, 1),
(12, 15, 1),
(13, 16, 1),
(14, 17, 1),
(15, 18, 1),
(16, 19, 1),
(17, 14, 1),
(18, 21, 1),
(19, 20, 1),
(20, 22, 1),
(21, 24, 1),
(22, 25, 1),
(23, 26, 1),
(24, 27, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newsletter`
--

CREATE TABLE `newsletter` (
  `news_id` int(5) NOT NULL,
  `news_email` varchar(100) NOT NULL,
  `news_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `newsletter`
--

INSERT INTO `newsletter` (`news_id`, `news_email`, `news_post`) VALUES
(1, 'navagiaginasta@gmail.com', '2016-01-12 19:29:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(5) NOT NULL,
  `produk_nama` varchar(250) NOT NULL,
  `katproduk_id` int(5) NOT NULL,
  `produk_harga` int(15) NOT NULL,
  `produk_kondisi` enum('S','B') NOT NULL DEFAULT 'S',
  `produk_deskripsi` text NOT NULL,
  `produk_foto` varchar(100) NOT NULL,
  `produk_foto2` varchar(100) NOT NULL,
  `produk_foto3` varchar(100) NOT NULL,
  `produk_foto4` varchar(100) NOT NULL,
  `produk_foto5` varchar(100) NOT NULL,
  `produk_hits` int(5) NOT NULL,
  `produk_status` enum('R','P') NOT NULL DEFAULT 'R',
  `account_id` int(5) NOT NULL,
  `produk_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `katproduk_id`, `produk_harga`, `produk_kondisi`, `produk_deskripsi`, `produk_foto`, `produk_foto2`, `produk_foto3`, `produk_foto4`, `produk_foto5`, `produk_hits`, `produk_status`, `account_id`, `produk_post`) VALUES
(14, 'Samsung Gallaxy DOUS 2014', 5, 222, 'S', '<p>\r\n	2</p>\r\n', '1471012783-IMG_3053 copy.JPG', '1471012783-IMG_3054 copy.JPG', '1471012783-IMG_3055 copy.JPG', '1471012783-IMG_3055 copy.JPG', '1471012783-IMG_3056 copy.JPG', 73, 'P', 11, '2016-08-25 16:43:42'),
(15, 'Honda 2016', 1, 200000, 'B', '<p>\r\n	Honda 2013</p>\r\n', '1471012656-All-New-Honda-CBR150R.jpg', '1471012656-Motor-Baru-Yamaha-Xabre.jpg', '1471012656-Motor-Kawasaki-ER-6n-yellow.jpg', '1471012656-Suzuki-GSX-Lead.jpg', '1471012656-Suzuki-GSX-Lead.jpg', 20, 'R', 9, '2016-08-12 21:37:36'),
(16, 'Mobil Terbaru Honda 2016', 2, 200000000, 'S', '<p>\r\n	Mobil Terbaru Honda 2016</p>\r\n', '1471013722-Harga-Mobil-Murah-Daihatsu.jpg', '1471013460-Harga-Mobil-Murah-Daihatsu.jpg', '1471013460-Harga-Mobil-Murah-Honda.jpg', '1471013460-Honda-Brio-1.jpg', '1471013460-Mobil-Terbaik-di-Indonesia.jpg', 43, 'P', 2, '2016-08-12 21:55:22'),
(17, 'Laptop ASUS Terbaru 2016 dengan RAM Super', 5, 1000000000, 'B', 'Laptop ASUS Terbaru 2016 dengan RAM Super\r\n', '1471013596-asus-zenbook-pro-ux501.jpg', '1471013596-4481400_sd.jpg', '1471013596-Best_budget_laptops_2015_thumb800.jpg', '1471013597-laptops.jpg', '1471013597-unduhan.jpg', 142, 'P', 11, '2016-08-25 19:57:05'),
(19, 'Mobil Toyota terlaris 2016 yang sangat menarik', 2, 2000000, 'B', '<p>\r\n	Mobil Toyota terlaris 2016 yang sangat menarik</p>\r\n', '1471013781-Honda-Brio-1.jpg', '1471013781-Honda-Brio-1.jpg', '1471013781-Honda-Brio-1.jpg', '1471013781-Honda-Brio-1.jpg', '1471013781-Honda-Brio-1.jpg', 54, 'P', 2, '2016-08-12 21:56:21'),
(30, 'Handphone', 5, 1450000, 'B', '32', '1471694310-IMG_3053 copy.JPG', '1471694310-IMG_3054 copy.JPG', '1471694310-IMG_3055 copy.JPG', '1471694310-IMG_3056 copy.JPG', '1471707761-IMG_3060 copy.jpg', 49, 'P', 1, '2016-08-20 22:44:10'),
(31, 'ASASASA', 7, 433333, 'S', 'GFHGF', '1472635746-IMG_3053 copy.JPG', '', '', '', '', 2, 'P', 11, '2016-08-31 16:29:06'),
(32, 'Mobil', 2, 250000000, 'S', '', '1472636181-IMG_3060 copy.jpg', '1472636181-IMG_3059 copy.JPG', '1472636181-IMG_3058 copy.JPG', '1472636181-IMG_3056 copy.JPG', '1472636181-IMG_3056 copy.JPG', 1, 'P', 11, '2016-08-31 16:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsi_id` int(5) NOT NULL,
  `provinsi_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `provinsi_nama`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('28313ce7e0ce69612818ba34e3b25f21', '0.0.0.0', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile', 1472637812, ''),
('a1e74fd9edffa4cc646f38e3ff813feb', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 1472637794, 'a:5:{s:9:"user_data";s:0:"";s:10:"admin_user";s:5:"admin";s:10:"admin_nama";s:13:"Administrator";s:11:"admin_level";s:1:"1";s:9:"logged_in";b:1;}'),
('be24102dd8d80597c3604031b0628029', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 1472639810, 'a:4:{s:10:"admin_user";s:5:"admin";s:10:"admin_nama";s:13:"Administrator";s:11:"admin_level";s:1:"1";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(5) NOT NULL,
  `slide_judul` varchar(100) NOT NULL,
  `slide_gambar` varchar(100) NOT NULL,
  `slide_deskripsi` text NOT NULL,
  `slide_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_judul`, `slide_gambar`, `slide_deskripsi`, `slide_waktu`) VALUES
(3, 'Promo 1', '1472368894-home_slide_1.jpg', '<p>\r\n	Promo</p>\r\n', '2016-08-28 14:18:27'),
(4, 'Promo 2', '1472368919-home_slide_2.jpg', '<p>\r\n	Promo 2</p>\r\n', '2016-08-28 14:21:16'),
(5, 'Promo 3', '1472368943-home_slide_3.jpg', '', '2016-08-28 14:22:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statis`
--

CREATE TABLE `statis` (
  `statis_id` int(5) NOT NULL,
  `statis_judul` varchar(100) NOT NULL,
  `statis_deskripsi` text NOT NULL,
  `statis_gambar` varchar(100) NOT NULL,
  `statis_status` enum('N','Y') NOT NULL,
  `statis_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statis`
--

INSERT INTO `statis` (`statis_id`, `statis_judul`, `statis_deskripsi`, `statis_gambar`, `statis_status`, `statis_waktu`) VALUES
(2, 'Cara Pasang Iklan Premium', '<p>\r\n	Pasang Iklan :</p>\r\n<p>\r\n	1. Harus 1111...</p>\r\n<p>\r\n	2. Haruss 222...</p>\r\n', '', 'N', '2016-08-28 15:33:28'),
(3, 'Ketentuan Layanan', '<p>\r\n	Ketentuan Layanan</p>\r\n<p>\r\n	1.</p>\r\n<p>\r\n	2.</p>\r\n<p>\r\n	3.</p>\r\n<p>\r\n	4.</p>\r\n<p>\r\n	5.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', 'N', '2016-08-28 15:44:15'),
(4, 'Berjualan dan Transaksi Aman', '<p>\r\n	Berjualan dan Transaksi Aman</p>\r\n<p>\r\n	1.</p>\r\n<p>\r\n	2.</p>\r\n<p>\r\n	3.</p>\r\n<p>\r\n	4.</p>\r\n', '', 'N', '2016-08-28 15:45:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(5) NOT NULL,
  `tag_judul` varchar(50) NOT NULL,
  `tag_seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_judul`, `tag_seo`) VALUES
(1, 'Mobil Terbaru', 'mobil-terbaru'),
(2, 'HP Terbaru', 'hp-terbaru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_user`),
  ADD KEY `admin_level_kode` (`admin_level_kode`);

--
-- Indexes for table `admin_level`
--
ALTER TABLE `admin_level`
  ADD PRIMARY KEY (`admin_level_kode`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`iklan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `katproduk`
--
ALTER TABLE `katproduk`
  ADD PRIMARY KEY (`katproduk_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_kode`);

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
  ADD PRIMARY KEY (`menu_admin_kode`),
  ADD KEY `menu_kode` (`menu_kode`),
  ADD KEY `admin_level_kode` (`admin_level_kode`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `statis`
--
ALTER TABLE `statis`
  ADD PRIMARY KEY (`statis_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `admin_level`
--
ALTER TABLE `admin_level`
  MODIFY `admin_level_kode` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3296;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `iklan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `katproduk`
--
ALTER TABLE `katproduk`
  MODIFY `katproduk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `menu_admin_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statis`
--
ALTER TABLE `statis`
  MODIFY `statis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_level_kode`) REFERENCES `admin_level` (`admin_level_kode`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
