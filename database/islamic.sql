-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 01:17 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islamic`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `tgl_kegiatan`, `kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2018-04-01', 'Agenda 1', 'Agenda 1', '2018-04-14 22:18:16', '2018-04-14 22:18:16'),
(2, '2018-04-10', 'Agenda 2', 'Agenda2', '2018-04-14 22:18:30', '2018-04-14 22:18:30'),
(3, '2018-04-18', 'Save Gaza', 'Pengiriman Bantuan Ke gaza', '2018-04-15 07:03:53', '2018-04-15 07:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `amals`
--

CREATE TABLE `amals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amals`
--

INSERT INTO `amals` (`id`, `nama`, `jk`, `alamat`, `jenis`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Infaq', '100000000.00', '201804', '2018-04-15 07:27:38', '2018-04-15 07:27:38'),
(2, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancaksiat', 'Infaq', '1000000.00', '201804', '2018-04-15 07:28:26', '2018-04-15 07:28:26'),
(3, 'Bagas A.P', 'Laki-Laki', 'Katapang', 'Sodaqoh', '1000000.00', '201804', '2018-04-15 07:28:56', '2018-04-15 07:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `jenis`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'visi', '\"<p>1.Meningkatkan Kesadaran Umat.<\\/p>\\n<p>2.Mewujudkan kemaslahatan umat.<\\/p>\\n<p>3.Mempersatukan umat dengan kesadaran bersedekah.<\\/p>\"', '2018-04-13 18:17:50', '2018-04-15 07:36:15'),
(2, 'misi', '\"<p>Menjadi Lembaga pengolahan Zakat,infaq dan sodaqoh yang moderen serta dapat di andalkan masyarakat zaman sekarang.<\\/p>\"', '2018-04-13 18:17:50', '2018-04-15 07:36:57'),
(3, 'tentang', '\"Sebuah organisasi yang bergerak di bidang pendataan zakat , infaq dan sodaqoh . dengan pengolahan data secara modrn kami menyajikan informasi dan laporan yang faktual,\"', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(4, 'quotes', '\"\\u201cSesungguhnya orang-orang yang bersedekah baik laki-laki maupun perempuan dan meminjamkan kepada Allah dengan pinjaman yang baik, niscaya akan dilipatgandakan (pahalanya) kepada mereka dan bagi mereka pahala yang banyak\\u201c. (QS. Al-Hadid: 18)\"', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(5, 'slide1', '{\"slide1.jpeg\":\"\\u201cOrang yang mengusahakan bantuan (pertolongan) bagi janda dan orang miskin ibarat berjihad di jalan Allah dan ibarat orang shalat malam\\u201d \\u2013 (HR Bukhari)\"}', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(6, 'slide2', '{\"slide2.jpg\":\"\\u201cKalian tidak akan mendapatkan kebaikan, sampai kalian infakkah apa yang kalian cintai\\u201d \\u2013 (Q.S Ali Imran : 92)\"}', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(7, 'slide3', '{\"slide3.jpg\":\"\\u201cBarangsiapa ingin doanya terkabul dan dibebaskan dari kesulitannya hendaklah dia mengatasi (menyelesaikan ) kesulitan orang lain\\u201d \\u2013 HR. Ahmad\"}', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(8, 'phone', '\"022-xxx-xxx\"', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(9, 'email', '\"example@domain.com\"', '2018-04-13 18:17:50', '2018-04-13 18:17:50'),
(10, 'lokasi', '\"Yayasan Assalaam, Balonggede, Kota Bandung, Jawa Barat, Indonesia\"', '2018-04-13 18:17:50', '2018-04-15 08:52:32'),
(11, 'lat', '\"-6.9258352\"', '2018-04-13 18:17:50', '2018-04-15 08:52:32'),
(12, 'lng', '\"107.60970199999997\"', '2018-04-13 18:17:50', '2018-04-15 08:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `jenis`, `ket`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fitrah', '{\"Uang\":{\"Muzzaki\":\"3 Orang\",\"Total\":\"Rp.81.000,00\"},\"Beras\":{\"Muzzaki\":\"3 Orang\",\"Total\":\"7.50.Kg\"}}', '201804', 'verified', '2018-04-15 08:40:13', '2018-04-15 08:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `fitrahs`
--

CREATE TABLE `fitrahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk` text COLLATE utf8mb4_unicode_ci,
  `nominal` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fitrahs`
--

INSERT INTO `fitrahs` (`id`, `nama`, `jk`, `alamat`, `jenis`, `bentuk`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Beras', 'kilogram', '2.50', '201804', '2018-04-15 03:56:48', '2018-04-15 03:56:48'),
(2, 'Bagas A.P', 'Laki-Laki', 'TCI', 'Beras', 'kilogram', '2.50', '201804', '2018-04-15 07:18:24', '2018-04-15 07:18:24'),
(3, 'Tantan', 'Laki-Laki', 'Kp.Cupu', 'Beras', 'kilogram', '2.50', '201804', '2018-04-15 07:18:48', '2018-04-15 07:18:48'),
(4, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Uang', 'rupiah', '27000.00', '201804', '2018-04-15 07:19:13', '2018-04-15 07:19:13'),
(5, 'Nopi Latifah', 'Perempuan', 'Permata Kopo', 'Uang', 'rupiah', '27000.00', '201804', '2018-04-15 07:20:13', '2018-04-15 07:20:27'),
(6, 'Alby', 'Laki-Laki', 'Boma', 'Uang', 'rupiah', '27000.00', '201804', '2018-04-15 07:20:47', '2018-04-15 07:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `inouts`
--

CREATE TABLE `inouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inouts`
--

INSERT INTO `inouts` (`id`, `jenis`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Fitrah', '6 Orang', 'Masuk', '2018-04-15 08:45:23', '2018-04-15 08:45:23'),
(2, 'Fitrah', '110 Orang', 'Keluar', '2018-04-15 08:45:23', '2018-04-15 08:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `mals`
--

CREATE TABLE `mals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk` text COLLATE utf8mb4_unicode_ci,
  `nominal` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mals`
--

INSERT INTO `mals` (`id`, `nama`, `jk`, `alamat`, `jenis`, `bentuk`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Zakat Emas', 'gram', '2.13', '201804', '2018-04-15 07:21:59', '2018-04-15 07:21:59'),
(2, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Zakat Perak', 'gram', '14.88', '201804', '2018-04-15 07:23:35', '2018-04-15 07:23:35'),
(3, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Zakat Harta', 'rupiah', '25350000.00', '201804', '2018-04-15 07:24:50', '2018-04-15 07:24:50'),
(4, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Zakat Harta Temuan', 'rupiah', '2000.00', '201804', '2018-04-15 07:25:10', '2018-04-15 07:25:10'),
(5, 'Ari Ardiansyah', 'Laki-Laki', 'Kp.Rancakasiat', 'Zakat Pertanian', 'kilogram', '37.50', '201804', '2018-04-15 07:27:06', '2018-04-15 07:27:06'),
(6, '---', 'Laki-Laki', '---', 'Zakat Pertanian', 'kilogram', '80.00', '201804', '2018-04-15 08:39:31', '2018-04-15 08:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(623, '2014_10_12_000000_create_users_table', 1),
(624, '2014_10_12_100000_create_password_resets_table', 1),
(625, '2017_10_22_054020_laratrust_setup_tables', 1),
(626, '2017_10_31_132748_create_fitrahs_table', 1),
(627, '2017_11_08_150616_create_mals_table', 1),
(628, '2017_11_08_153532_create_amals_table', 1),
(629, '2017_11_08_160158_create_m_ketetapans_table', 1),
(630, '2017_11_08_160352_create_m_kategoris_table', 1),
(631, '2017_11_08_160409_create_counts_table', 1),
(632, '2017_11_08_160433_create_m_kontens_table', 1),
(633, '2018_01_03_205026_create_inouts_table', 1),
(634, '2018_01_03_205556_create_shares_table', 1),
(635, '2018_01_10_201407_create_posts_table', 1),
(636, '2018_01_14_222543_create_sosmeds_table', 1),
(637, '2018_03_14_200136_create_contents_table', 1),
(638, '2018_03_14_200507_create_agendas_table', 1),
(639, '2018_03_17_135348_create_testings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategoris`
--

CREATE TABLE `m_kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategoris`
--

INSERT INTO `m_kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Laporan', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(2, 'Tutorial', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(3, 'Hiburan', '2018-04-13 18:17:50', '2018-04-13 18:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `m_ketetapans`
--

CREATE TABLE `m_ketetapans` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketetapan` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_ketetapans`
--

INSERT INTO `m_ketetapans` (`id`, `jenis`, `ketetapan`, `created_at`, `updated_at`) VALUES
(1, 'Beras', '2.50', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(2, 'Uang', '27000.00', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(3, 'Emas', '511000.00', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(4, 'Perak', '11000.00', '2018-04-13 18:17:49', '2018-04-13 18:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `m_kontens`
--

CREATE TABLE `m_kontens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no.jpg',
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `picture`, `judul`, `slug`, `content`, `views`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'no.jpg', 'Lorem', 'lorem', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 3, '2018-04-13 18:19:21', '2018-04-15 13:14:20'),
(2, 'picture_Su6m7R.jpg', 'Lorem Ipsum', 'lorem-ipsum', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 3, 1, '2018-04-15 07:05:17', '2018-04-15 08:01:02'),
(3, 'picture_2kKOcl.jpg', 'Postingan Contoh', 'postingan-contoh', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 0, 2, '2018-04-15 07:08:24', '2018-04-15 07:08:24'),
(4, 'picture_Maq1gm.jpg', 'Cara Sholat gerhana', 'cara-sholat-gerhana', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 0, 2, '2018-04-15 07:09:47', '2018-04-15 07:11:39'),
(6, 'no.jpg', 'Laporan Zakat Fitrah Bulan April 2018', 'laporan-zakat-fitrah-bulan-april-2018', '<p>Laporan Zakat Fitrah Bulan April Tahun 2018.</p>\r\n\r\n<p>Dana Yang diperoleh dari para Muzzaki :</p>\r\n\r\n<table border=\"1\" class=\"table table-bordered\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Zakat Uang :</td>\r\n			<td>Muzzaki : 3 Orang , Total : Rp.81.000,00 ,</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Zakat Beras :</td>\r\n			<td>Muzzaki : 3 Orang , Total : 7.50.Kg ,</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dana Teralokasikan kepada para mustahik :</p>\r\n\r\n<table border=\"1\" class=\"table table-bordered\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Mustahik</td>\r\n			<td>Jumlah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fakir</td>\r\n			<td>10 Orang</td>\r\n			<td>miskin</td>\r\n			<td>100 Orang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 2, 1, '2018-04-15 08:50:48', '2018-04-15 13:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'su', 'Super User', 'Super User', '2018-04-13 18:17:48', '2018-04-13 18:17:48'),
(2, 'admin', 'Admin', 'Mengelola Pendataan', '2018-04-13 18:17:48', '2018-04-13 18:17:48'),
(3, '0', '0', '0 0', '2018-04-13 18:17:48', '2018-04-13 18:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 4, 'App\\User'),
(3, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `jenis`, `ket`, `count_id`, `kode`, `created_at`, `updated_at`) VALUES
(1, 'Fitrah', '{\"Fakir\":\"10 Orang\",\"miskin\":\"100 Orang\"}', 1, '201804', '2018-04-15 08:45:23', '2018-04-15 08:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `sosmeds`
--

CREATE TABLE `sosmeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sosmeds`
--

INSERT INTO `sosmeds` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'fb', 'http://facebook.com', NULL, NULL),
(2, 'twitter', 'http://twitter.com', NULL, NULL),
(3, 'gplus', 'http://gmail.com', NULL, NULL),
(4, 'ig', 'http://instagram.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testings`
--

CREATE TABLE `testings` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SU ISLAMIC', 'su@islamic.local', 'default.jpg', '$2y$10$3Rw8s3U77DWBbeNoZn.69e7gPe8x9x7/py9YJqSB5Gblk2AjKt1je', NULL, '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(2, 'Sample Admin', 'admin@islamic.local', 'default.jpg', '$2y$10$k9QfCB0PoUTE5VOBSuoX0esDm2N04m5GCj6uc.lx64xL61NYGNzxi', 'yL6bBLMUDHrMZXgM7vMtW71KBfCLTHwgVSupgOrPprjDQQiXn6xOkBf1EoBp', '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(3, 'hakel', 'hakel@test.pro', 'default.jpg', '$2y$10$ZJkF9TWxxmzgHPPZ2pvqdehdlPPRm1zsrQ9sDPPiEjfoy7JYCDKwO', NULL, '2018-04-13 18:17:49', '2018-04-13 18:17:49'),
(4, 'Mobile', 'ari@mobile.com', 'default.png', '$2y$10$fm247npCUEQyzgEUkj6zuel2NyENPeOipNewL8.mWWABJ9qkuevp.', NULL, '2018-04-15 02:30:17', '2018-04-15 02:30:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amals`
--
ALTER TABLE `amals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitrahs`
--
ALTER TABLE `fitrahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inouts`
--
ALTER TABLE `inouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mals`
--
ALTER TABLE `mals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kategoris`
--
ALTER TABLE `m_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_ketetapans`
--
ALTER TABLE `m_ketetapans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kontens`
--
ALTER TABLE `m_kontens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_count_id_foreign` (`count_id`);

--
-- Indexes for table `sosmeds`
--
ALTER TABLE `sosmeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testings`
--
ALTER TABLE `testings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `amals`
--
ALTER TABLE `amals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fitrahs`
--
ALTER TABLE `fitrahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inouts`
--
ALTER TABLE `inouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mals`
--
ALTER TABLE `mals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `m_kategoris`
--
ALTER TABLE `m_kategoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_ketetapans`
--
ALTER TABLE `m_ketetapans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_kontens`
--
ALTER TABLE `m_kontens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sosmeds`
--
ALTER TABLE `sosmeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testings`
--
ALTER TABLE `testings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_count_id_foreign` FOREIGN KEY (`count_id`) REFERENCES `counts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
