-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 06:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentinel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'yHg1u3G8jO0CZ5xplHHPMN2u95i9aaDy', 1, '2017-03-06 18:44:42', '2017-03-06 18:44:42', '2017-03-06 18:44:42'),
(2, 2, 'ZWbKjvV9fDZPz8C6YloSBdQ2LQbu78Fd', 1, '2017-03-07 03:38:15', '2017-03-07 03:38:15', '2017-03-07 03:38:15'),
(3, 3, '4aagQMsu5WIZZJ4NqNEvKgXRNatsDEvS', 1, '2017-03-07 13:06:03', '2017-03-07 13:06:03', '2017-03-07 13:06:03'),
(4, 4, 'Co8rU9JfoutfBjKbjElyM9NOF3BWpz8v', 1, '2017-03-07 13:07:04', '2017-03-07 13:07:04', '2017-03-07 13:07:04'),
(5, 5, 'RDPNsv4DWiw2BISxiigMLKkTNHYv6wmq', 1, '2017-03-07 15:26:05', '2017-03-07 15:26:05', '2017-03-07 15:26:05'),
(6, 6, 'teDvyV9FiSfgAooET2MSJKrGMIp2w0FK', 1, '2017-03-12 07:00:49', '2017-03-12 07:00:49', '2017-03-12 07:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelaksana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desk_pre` text COLLATE utf8mb4_unicode_ci,
  `desk_live` text COLLATE utf8mb4_unicode_ci,
  `desk_post` text COLLATE utf8mb4_unicode_ci,
  `img_pre` text COLLATE utf8mb4_unicode_ci,
  `img_live` text COLLATE utf8mb4_unicode_ci,
  `img_post` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `judul`, `pelaksana`, `tgl_mulai`, `tgl_selesai`, `tempat`, `uploader`, `desk_pre`, `desk_live`, `desk_post`, `img_pre`, `img_live`, `img_post`, `created_at`, `updated_at`) VALUES
(15, 'Cat''s Meeting', 'Kantor HI', '2017-01-15', '2017-01-15', 'Kantor Hubungan International', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac lacus vitae urna molestie ullamcorper. Fusce vel elit nibh. Cras posuere efficitur porttitor. Proin eu fringilla velit. Curabitur mattis orci eu nisi blandit, in ultrices ligula fermentum. Vestibulum maximus in nunc sed tempor. Ut ac venenatis quam, sed pulvinar dolor. Curabitur consequat porttitor nunc, egestas iaculis est accumsan non. Aenean sed tincidunt felis.</p>\n      <p>Mauris tincidunt leo nibh, at egestas dui facilisis in. Sed posuere justo urna, a efficitur libero fringilla vel. Sed quis volutpat diam. Integer mollis nec ligula id lobortis. Integer at cursus nibh. Morbi aliquam enim ac ex venenatis luctus. Integer molestie velit ac sagittis pulvinar. Aenean porta posuere ipsum, at vestibulum nisl fermentum in. Donec sed justo non libero ultricies laoreet.</p>\n      <p><iframe src="//www.youtube.com/embed/5dsGWM5XGdg" width="560" height="314" allowfullscreen="allowfullscreen"></iframe></p>', '<p>Ut metus arcu, semper at erat et, venenatis pharetra lorem. Vivamus eu ipsum nulla. Mauris rhoncus non mauris id sagittis. Nam ut porttitor elit. Nulla sodales rutrum pretium. Phasellus quis risus dolor. Suspendisse dapibus, risus in consequat pellentesque, justo orci viverra justo, eget sodales ligula neque sed risus. Aliquam non est libero.</p>\n      <p>Donec rutrum fermentum fringilla. Aliquam vitae laoreet nisi. Ut dui velit, volutpat sed erat ut, tristique tincidunt dolor. Aenean feugiat nisl eu mauris venenatis, non vehicula elit semper. Pellentesque id venenatis nibh. Sed consequat commodo augue, vel euismod sem hendrerit id. Pellentesque posuere mattis metus, nec vulputate tellus commodo quis. Vestibulum et dui vel orci sodales mollis vitae at ipsum. Quisque tincidunt quis elit ac bibendum. Cras sit amet metus ut quam sollicitudin placerat vel a mauris. Sed vel posuere quam.</p>', '<p>Aliquam erat volutpat. Ut dignissim dui a metus bibendum porta. Nunc non rutrum nibh, ac congue risus. Praesent ultricies non urna eu molestie. Proin posuere in ante vitae venenatis. Curabitur id congue nibh. Pellentesque consectetur ligula at nulla rutrum ultrices. Quisque viverra euismod libero, eu blandit turpis bibendum ornare. Sed maximus risus in velit molestie, quis ultrices urna egestas. Suspendisse luctus, sem non feugiat ultricies, enim mi placerat urna, et congue nisi enim id sem. Phasellus dapibus, mauris quis viverra pellentesque, eros risus semper tortor, sit amet cursus mauris justo in diam.</p>', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(16, 'Awal Tahun', 'Kantor HI', '2017-02-07', '2017-02-08', 'Sasana Budaya', '1', '<p>Persiapan event</p>', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(17, 'adfadfa dfads fasdf', 'Kantor HI', '2017-03-01', '2017-03-02', 'fads fadsfasdf adsfadsf', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(18, 'fadsfa dfa dfa df', 'Kantor HI', '2017-03-02', '2017-03-02', 'dfa dfa dfadfa dfadfadf adf', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(19, 'weevadadadfe', 'Kantor HI', '2017-04-06', '2017-04-05', 'dfa dfad fa dfadf', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(20, 'adf adf adf', 'Kantor HI', '2017-06-02', '2017-06-02', 'd fasd fads fad a', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(21, 'desember', 'Kantor HI', '2017-12-01', '2018-01-01', 'Kantor HI', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(22, 'Kunjungan Dosen ke Singapur', 'Kantor HI', '2017-02-08', '2017-02-11', 'Singapura', '1', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:45', '2017-03-07 12:52:45'),
(23, 'Nanem Pare bersama', 'Bahasa Indonesia', '2017-01-25', '2017-01-28', 'Kuburan sebelah', '3', NULL, NULL, '<p>aaaaa</p>', '', '23live201703231622520.gif; ', '', '2017-03-07 12:52:46', '2017-03-23 09:22:52'),
(24, 'Kunjungan dari Mahasiswa Sastra Indonesia Universitas Tokyo', 'Bahasa Inggris', '2017-03-16', '2017-03-25', 'Fakultas Bahasa Indonesia', '3', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(25, 'Sakura FT', 'Teknik Elektro', '2017-01-18', '2017-01-19', 'Universitas Negeri Malang, Aula Gedung H5 lt4', '2', '<p>persiapan ke jepang</p>', NULL, '<p>asdf asdf adsf asdf asdf asdf asd fads [edited]</p>', '25pre201703231609260.jpeg; 25pre201703231609261.jpeg; 25pre201703231609262.jpeg; ', '', '25post201703231610030.jpeg; ', '2017-03-07 12:52:46', '2017-03-30 00:17:10'),
(28, 'ad adf adfadsfasd', 'Teknik Industri', '2017-12-20', '2017-12-21', 'afd fad fad fad fads fads f', '2', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(29, 'ad fad fads fad', 'Teknik Elektro', '2017-12-05', '2017-12-21', 'adf adfadf adsfa dsf', '2', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(30, 'contoh', 'Teknik Sipil', '2017-08-10', '2017-08-18', 'universitas negeri malang', '2', '<p>deskripsi</p>', '<p>kegiat berlangsung</p>', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(31, 'adf adf adsf', 'Teknik Industri', '2017-02-26', '2017-02-28', 'adf adf adsf asdf', '2', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(32, 'Kunjungan ke Universitas Havard', 'Staff Rektor', '2017-04-06', '2017-05-06', 'Universitas Havard', '5', '<p>Persiapan</p>', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(33, 'Jalan-jalan ke Kyoto', 'Staff Rektor', '2017-02-25', '2017-03-04', 'Kyoto, Jepang', '5', '<p>Mempersiapan perlengkapan masak</p>', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(34, 'fladkj falkdj flad', 'Pendidikan Jasmani dan Kesehatan', '2017-09-06', '2017-09-15', 'dfads adf ad fad f', '4', '', '', '', NULL, NULL, NULL, '2017-03-07 12:52:46', '2017-03-07 12:52:46'),
(35, 'Edu Fair 2017', 'Kantor HI', '2017-04-07', '2017-04-08', 'Gedung A3 Universitas Negeri Malang', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-09 08:24:20', '2017-03-10 20:50:28'),
(36, 'Test Kegiatan di Bulan Maret', 'Kantor HI', '2017-03-01', '2017-03-31', 'Kos masing-masing', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-09 14:41:00', '2017-03-10 20:30:21'),
(37, 'Tes Masal Kemampuan Berbahasa Jepang', 'Kantor HI', '2017-03-25', '2017-03-25', 'Graha Cakrawala', '1', '<p>Persiapan</p>', NULL, NULL, NULL, NULL, NULL, '2017-03-10 20:32:38', '2017-03-10 20:32:38'),
(40, 'Cat''s Meeting', 'Kantor HI', '2017-03-23', '2017-03-25', 'Kantor Hubungan Internasional', '1', '<p>Persiapan</p>', NULL, NULL, '  40pre201703192108431.jpeg; 40pre201703192108432.jpeg;  40pre201703192108434.jpeg;  ', '40live201703192116390.jpeg; 40live201703192116391.jpeg; 40live201703192116392.jpeg; ', '40post201703192118020.jpeg; 40post201703192118021.jpeg; 40post201703192118022.jpeg;  ', '2017-03-19 14:08:16', '2017-03-29 15:55:37'),
(42, 'Kegiatan dadakan1', 'Teknik Sipil', '2017-03-24', '2017-03-25', 'Gedung H5 lt5, Universitas Negeri Malang', '2', NULL, NULL, NULL, '42pre201703231456510.jpeg;  42pre201703231452270.jpeg; ', ' ', '', '2017-03-23 07:50:46', '2017-03-30 00:25:12'),
(46, 'Seminar Pendidikan Berkarakter', 'Fakultas Ilmu Pendidikan', '2017-03-23', '2017-03-25', 'Gedung Sasana Krida, Universitas Negeri Malang', '6', NULL, NULL, '<p>kegiatan berakhir saat para undangan sadar bahwa apa yang mereka datangi adalah hal yang sia-sia</p>', '46pre201703251601140.jpeg; ', '46live201703251603470.png; ', '46post201703251604450.gif; ', '2017-03-25 08:52:15', '2017-03-26 09:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasamas`
--

CREATE TABLE `kerjasamas` (
  `id` int(10) UNSIGNED NOT NULL,
  `instansi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_expired` date NOT NULL,
  `uploader` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerjasamas`
--

INSERT INTO `kerjasamas` (`id`, `instansi`, `jenis`, `bentuk`, `isi`, `tgl_mulai`, `tgl_expired`, `uploader`, `created_at`, `updated_at`) VALUES
(1, 'Harvard University', 'MoU', 'Student Exchange', '<p>Student Exchange</p>', '2017-03-09', '2017-03-31', 1, '2017-03-30 00:47:21', '2017-04-01 04:12:11'),
(5, 'Sakura University', 'Mou', 'Student Exchange', '<p>Student Exchange</p>', '2017-02-01', '2018-02-01', 6, '2017-03-31 01:44:37', '2017-03-31 02:05:44'),
(6, 'adfadf', 'asdfadsf', 'adfadsf', '<p>adfadsf</p>', '2017-03-20', '2020-03-20', 6, '2017-03-31 01:51:30', '2017-03-31 02:01:06'),
(7, 'hh', 'hh', 'jj', '<p>ccc</p>', '2017-04-12', '2017-04-21', 1, '2017-04-01 04:50:47', '2017-04-01 04:50:47'),
(8, 'Saga Uni', 'nn', 'bb', '<p>bb</p>', '2017-04-13', '2017-04-22', 2, '2017-04-01 04:53:23', '2017-04-01 04:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `uid`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Menambahkan <a href="/admin/kegiatan/47/edit">event</a> baru', '2017-03-30 00:13:37', '2017-03-30 00:13:37'),
(2, 1, 'Keluar dari sistem', '2017-03-30 00:14:54', '2017-03-30 00:14:54'),
(3, 2, 'Masuk ke dalam sistem', '2017-03-30 00:16:40', '2017-03-30 00:16:40'),
(4, 2, 'Mengubah data suatu <a href="/admin/kegiatan/25/edit">event</a>', '2017-03-30 00:17:10', '2017-03-30 00:17:10'),
(5, 2, 'Mengubah data suatu <a href="/admin/kegiatan/25/edit">event</a>', '2017-03-30 00:18:18', '2017-03-30 00:18:18'),
(6, 2, 'Keluar dari sistem', '2017-03-30 00:42:45', '2017-03-30 00:42:45'),
(7, 1, 'Menambahkan <a href="/admin/kegiatan/1/edit">kerjasama</a> baru', '2017-03-30 00:47:21', '2017-03-30 00:47:21'),
(8, 1, 'Menambahkan <a href="/admin/kegiatan/2/edit">kerjasama</a> baru', '2017-03-30 01:44:38', '2017-03-30 01:44:38'),
(9, 1, 'Menambahkan <a href="/admin/kegiatan/3/edit">kerjasama</a> baru', '2017-03-31 01:17:27', '2017-03-31 01:17:27'),
(10, 1, 'Menambahkan <a href="/admin/kegiatan/4/edit">kerjasama</a> baru', '2017-03-31 01:22:54', '2017-03-31 01:22:54'),
(11, 1, 'Keluar dari sistem', '2017-03-31 01:38:55', '2017-03-31 01:38:55'),
(12, 6, 'Masuk ke dalam sistem', '2017-03-31 01:39:02', '2017-03-31 01:39:02'),
(13, 6, 'Menambahkan <a href="/admin/kegiatan/5/edit">kerjasama</a> baru', '2017-03-31 01:44:37', '2017-03-31 01:44:37'),
(14, 6, 'Menambahkan <a href="/admin/kegiatan/5/edit">kerjasama</a> baru', '2017-03-31 01:45:23', '2017-03-31 01:45:23'),
(15, 6, 'Menambahkan <a href="/admin/kegiatan/6/edit">kerjasama</a> baru', '2017-03-31 01:51:30', '2017-03-31 01:51:30'),
(16, 6, 'Menambahkan <a href="/admin/kegiatan/6/edit">kerjasama</a> baru', '2017-03-31 01:51:43', '2017-03-31 01:51:43'),
(17, 6, 'Menambahkan <a href="/admin/kegiatan/6/edit">kerjasama</a> baru', '2017-03-31 01:54:58', '2017-03-31 01:54:58'),
(18, 6, 'Menambahkan <a href="/admin/kegiatan/5/edit">kerjasama</a> baru', '2017-03-31 01:56:38', '2017-03-31 01:56:38'),
(19, 6, 'Keluar dari sistem', '2017-03-31 01:56:43', '2017-03-31 01:56:43'),
(20, 1, 'Menambahkan <a href="/admin/kegiatan/5/edit">kerjasama</a> baru', '2017-03-31 02:00:47', '2017-03-31 02:00:47'),
(21, 1, 'Menambahkan <a href="/admin/kegiatan/6/edit">kerjasama</a> baru', '2017-03-31 02:01:06', '2017-03-31 02:01:06'),
(22, 1, 'Menambahkan <a href="/admin/kegiatan/5/edit">kerjasama</a> baru', '2017-03-31 02:05:44', '2017-03-31 02:05:44'),
(23, 1, 'Menambahkan <a href="/admin/kegiatan/1/edit">kerjasama</a> baru', '2017-04-01 04:11:05', '2017-04-01 04:11:05'),
(24, 1, 'Menambahkan <a href="/admin/kegiatan/1/edit">kerjasama</a> baru', '2017-04-01 04:12:11', '2017-04-01 04:12:11'),
(25, 1, 'Menambahkan <a href="/admin/kegiatan/7/edit">kerjasama</a> baru', '2017-04-01 04:50:47', '2017-04-01 04:50:47'),
(26, 1, 'Keluar dari sistem', '2017-04-01 04:52:15', '2017-04-01 04:52:15'),
(27, 2, 'Masuk ke dalam sistem', '2017-04-01 04:52:39', '2017-04-01 04:52:39'),
(28, 2, 'Menambahkan <a href="/admin/kegiatan/8/edit">kerjasama</a> baru', '2017-04-01 04:53:23', '2017-04-01 04:53:23'),
(29, 2, 'Keluar dari sistem', '2017-04-01 04:53:50', '2017-04-01 04:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(6, '2017_03_07_005658_create_events_table', 1),
(7, '2017_03_07_203203_create_pelaksanas_table', 2),
(8, '2017_03_23_170401_create_log_table', 3),
(9, '2017_03_30_073415_create_kerjasamas_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanas`
--

CREATE TABLE `pelaksanas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pelaksana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelaksanas`
--

INSERT INTO `pelaksanas` (`id`, `user_id`, `pelaksana`, `created_at`, `updated_at`) VALUES
(2, 2, 'Teknik Mesin', '2017-03-07 15:22:42', '2017-03-07 15:22:42'),
(3, 2, 'Teknik Sipil', '2017-03-07 15:22:42', '2017-03-07 15:22:42'),
(4, 2, 'Teknik Elektro', '2017-03-07 15:22:43', '2017-03-07 15:22:43'),
(5, 2, 'Teknik Industri', '2017-03-07 15:22:43', '2017-03-07 15:22:43'),
(6, 2, 'Pendidikan Vokasi', '2017-03-07 15:22:43', '2017-03-07 15:22:43'),
(11, 4, 'Pendidikan Kepelatihan', '2017-03-07 15:24:31', '2017-03-07 15:24:31'),
(12, 4, 'Ilmu Keolahragaan', '2017-03-07 15:24:32', '2017-03-07 15:24:32'),
(13, 4, 'Ilmu Kesehatan Masyarakat', '2017-03-07 15:24:32', '2017-03-07 15:24:32'),
(14, 4, 'Pendidikan Jasmani dan Kesehatan', '2017-03-07 15:24:32', '2017-03-07 15:24:32'),
(22, 5, 'Rektor UM', '2017-03-12 10:03:42', '2017-03-12 10:03:42'),
(25, 6, 'Fakultas Ilmu Pendidikan', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(26, 6, 'Bimbingan dan Konseling', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(27, 6, 'Teknologi Pendidikan', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(28, 6, 'Pendidikan Guru Sekolah Dasar', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(29, 6, 'Administrasi Pendidikan', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(30, 6, 'Pendidikan Luar Sekolah', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(31, 6, 'Pendidikan Luar Biasa', '2017-03-25 08:37:07', '2017-03-25 08:37:07'),
(32, 3, 'Fakultas Sastra', '2017-03-29 10:04:20', '2017-03-29 10:04:20'),
(33, 3, 'Bahasa Indonesia', '2017-03-29 10:04:20', '2017-03-29 10:04:20'),
(34, 3, 'Bahasa Inggris', '2017-03-29 10:04:20', '2017-03-29 10:04:20'),
(35, 3, 'Bahasa Jerman', '2017-03-29 10:04:20', '2017-03-29 10:04:20'),
(36, 3, 'Seni dan Desain', '2017-03-29 10:04:20', '2017-03-29 10:04:20'),
(38, 10, 'Kontol', '2017-03-29 14:22:32', '2017-03-29 14:22:32'),
(39, 10, 'Memek', '2017-03-29 14:22:32', '2017-03-29 14:22:32'),
(40, 1, 'Kantor HI', '2017-03-31 01:15:11', '2017-03-31 01:15:11'),
(41, 1, 'Direktur HI', '2017-03-31 01:15:11', '2017-03-31 01:15:11'),
(42, 1, 'Staff HI', '2017-03-31 01:15:11', '2017-03-31 01:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'bPJPvmEmEQp9z3ES6p4wouaj13fq50Xh', '2017-03-06 18:46:02', '2017-03-06 18:46:02'),
(4, 1, 'dUcC6G8lqL4UyR58sfGRtMVAp7gSQOD0', '2017-03-07 03:39:25', '2017-03-07 03:39:25'),
(5, 1, '9Px0IXeqU16XPzbXbowHsh4naeq36vwy', '2017-03-07 06:08:24', '2017-03-07 06:08:24'),
(6, 1, '4ywVlDbYYi90my8JN3ZwBsw2m0SN1V4g', '2017-03-07 08:12:45', '2017-03-07 08:12:45'),
(9, 1, 'oDoNExsCBLTlQYGW9dGGB5FOXxczjMAQ', '2017-03-07 09:13:43', '2017-03-07 09:13:43'),
(10, 1, 'WJbYjubkJVFgHlC9V2J0rauXc8sUiRv5', '2017-03-07 11:11:30', '2017-03-07 11:11:30'),
(11, 1, 'T4uRgvvFJgQHBdbDuzuXACI2f4a27IX2', '2017-03-07 11:36:33', '2017-03-07 11:36:33'),
(12, 1, 'Enp0Nm0VwoSttrbUpryYk3JzXNZszV3S', '2017-03-07 11:40:44', '2017-03-07 11:40:44'),
(13, 1, 'QKL2kseT4u76XfEhHAK1Wlh5UjKyDf2a', '2017-03-07 18:14:11', '2017-03-07 18:14:11'),
(14, 1, 'HA0ep0zUo9I4nl53HHjwXA1OYuQx3adO', '2017-03-08 00:12:09', '2017-03-08 00:12:09'),
(15, 1, 'Shf7BCUgoll4vi4KtO3gy8iXI7JCeEuy', '2017-03-08 01:23:00', '2017-03-08 01:23:00'),
(17, 1, 'us4plnHDsQVh1uAdbDjGEs9oSwfGDP2h', '2017-03-08 02:21:19', '2017-03-08 02:21:19'),
(18, 1, 'jwRFcXAw6Lx7nyEDjsQ7zYNF2hAmW97A', '2017-03-09 07:52:29', '2017-03-09 07:52:29'),
(19, 1, 'xdXhtHD5nffs651mc54CVQxw3FHAL6S1', '2017-03-09 12:15:41', '2017-03-09 12:15:41'),
(20, 1, 'eQhTlRFYDN0ofewdocHnpTcHCy6kwlcc', '2017-03-09 12:44:58', '2017-03-09 12:44:58'),
(21, 1, 'j1O3MuGRJKY71mgMfKQQMJRBfh8LS2WY', '2017-03-10 02:27:05', '2017-03-10 02:27:05'),
(22, 1, 'UnUaJ3pgKWRBWV5s6X0SpURFm5k4sciz', '2017-03-10 20:16:52', '2017-03-10 20:16:52'),
(23, 1, 'FZZ3GxvikHXojPph2L6truiXtJvhMLUi', '2017-03-11 04:03:13', '2017-03-11 04:03:13'),
(24, 1, 'qr7oHVZ4POnvh8PFfpQ8RjS8dREzJlTR', '2017-03-11 12:38:22', '2017-03-11 12:38:22'),
(25, 1, 'zts4sWkblRd6AUQTZxBKkpp3l9o9cNyr', '2017-03-12 03:42:58', '2017-03-12 03:42:58'),
(37, 2, 'LgKv3bJAYFgSZSRPdV8kWz3957MydFfo', '2017-03-12 10:12:42', '2017-03-12 10:12:42'),
(38, 1, 'tDckG9EKwDpD4T11FJ3vUsnsDSuEpdjm', '2017-03-15 01:37:18', '2017-03-15 01:37:18'),
(39, 1, '6f6JBW3cmF5ny4rE1OhZ98TkHRlBGseA', '2017-03-18 06:31:02', '2017-03-18 06:31:02'),
(40, 1, 'NNb3Gu96SzZj0Y7uf7Ue1RWKNKPMu5KV', '2017-03-18 12:59:11', '2017-03-18 12:59:11'),
(41, 1, 'TA4aRuBovsmk7m815OK9oIpCAmMhW3Y8', '2017-03-19 06:05:31', '2017-03-19 06:05:31'),
(42, 1, 'jvg0sIvcP7HfjLpzIj3PI8NKuUQOX2gF', '2017-03-19 08:58:30', '2017-03-19 08:58:30'),
(43, 1, 'mCCQnGfSxUpFF5B4kImjfSZIcbk3KGEJ', '2017-03-19 12:08:57', '2017-03-19 12:08:57'),
(44, 1, '7eVEX5uUtOEQq9mecApc9i9zRQjJM8Na', '2017-03-19 18:15:15', '2017-03-19 18:15:15'),
(45, 1, 'iijHbUAdRxxz5QoKJLnFcBSvGsX4sV86', '2017-03-23 05:33:01', '2017-03-23 05:33:01'),
(52, 6, 'FcebxoKxzK9dnmRO0sxPnqgD35ZZrYuQ', '2017-03-23 10:21:45', '2017-03-23 10:21:45'),
(55, 6, '7jgpi4hrGlZZu3ekPrhBhoCZO2Mif1m5', '2017-03-23 10:25:21', '2017-03-23 10:25:21'),
(58, 2, 'fOrMQZHbI7OxCFNhQzbKeZtaZsbFS0kv', '2017-03-23 10:30:51', '2017-03-23 10:30:51'),
(62, 6, 'WQrIjuV3dHsrfNgi2njAAnVmPsLWNevu', '2017-03-25 08:36:49', '2017-03-25 08:36:49'),
(63, 6, 'B3l7tMHBpkJNbfWiG0YrdsH5JoBy9A41', '2017-03-25 10:20:01', '2017-03-25 10:20:01'),
(64, 6, 's8CO1WdJF7Ee6u30V8gi5T8hglYvfj5g', '2017-03-25 10:25:45', '2017-03-25 10:25:45'),
(66, 6, 'VozBHNFiEUirJL6nMSHDcu56UzbzG1ra', '2017-03-25 10:28:57', '2017-03-25 10:28:57'),
(68, 1, 'ZxEKTPY4U7wYIJf4J2uvuLNt03RBzWNa', '2017-03-25 23:08:45', '2017-03-25 23:08:45'),
(71, 1, '5hrBDsSREYK6NL1viZF9rAVVSHMtnjHT', '2017-03-26 06:58:11', '2017-03-26 06:58:11'),
(90, 1, 'psT9MrK6fMdUl7TkWlLNzCMUulxfK81C', '2017-03-29 09:35:50', '2017-03-29 09:35:50'),
(93, 1, 'NjhWWFlq3cjwSDB0SDfmhiD8QWpDuXk9', '2017-03-30 00:42:51', '2017-03-30 00:42:51'),
(96, 1, '3KAKM98fteGrhSEAI9FBp6h8xYaKoKyV', '2017-03-31 01:56:49', '2017-03-31 01:56:49'),
(99, 1, 'ehTwKTfB5rrIzVQKaEa1qJqFOq8coEWM', '2017-04-01 04:54:04', '2017-04-01 04:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'user', 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-03-07 01:29:33', '2017-03-07 01:29:33'),
(2, 2, '2017-03-06 18:44:42', '2017-03-06 18:44:42'),
(3, 2, '2017-03-07 13:06:04', '2017-03-07 13:06:04'),
(4, 2, '2017-03-07 13:07:04', '2017-03-07 13:07:04'),
(5, 2, '2017-03-07 15:26:05', '2017-03-07 15:26:05'),
(6, 2, '2017-03-12 07:00:49', '2017-03-12 07:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `email`, `password`, `permissions`, `last_login`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Kantor Hubungan Internasional', '1234567890', 'oia@um.ac.id', '$2y$10$6.HT.QQ/oS3RSsvSmGtJ2O9iV3Tfv4tXcIEaaARMtKZOxbPKlWA.q', NULL, '2017-04-01 04:54:04', NULL, '2017-03-06 18:44:42', '2017-04-01 04:54:04'),
(2, 'Fakultas Teknik', '12345678901', 'ft@um.ac.id', '$2y$10$1JS7lLCAM5xPTgbXvgpKHerl5RKO5xzsus0LeytHT9Rvcqh/j/fNe', NULL, '2017-04-01 04:52:39', NULL, '2017-03-07 03:38:15', '2017-04-01 04:52:39'),
(3, 'Fakultas Sastra', '12345678902', 'fs@um.ac.id', '$2y$10$PkhOGwlaAbhEBeNDVW2b4uembrmRN/M8G.6/WsqKkmSdAo2RXzTqu', NULL, '2017-03-25 07:33:34', NULL, '2017-03-07 13:06:03', '2017-03-25 07:33:34'),
(4, 'Fakultas Keolahragaan', '12345678903', 'fk@um.ac.id', '$2y$10$k2AmQtMk4Ebx5SK0c0i6C.YaQ2xKuveN5wuimrYb0vu9gdJ0RjDV.', NULL, '2017-03-23 09:33:40', NULL, '2017-03-07 13:07:04', '2017-03-23 09:33:40'),
(5, 'Staff Rektor', '12345678905', 'rektor@um.ac.id', '$2y$10$Y7CM0hHW6KZcjluAcMWJHuRkvcu/793U7MKIFG8wIBaSDWb5Qm2se', NULL, '2017-03-12 10:02:09', NULL, '2017-03-07 15:26:05', '2017-03-12 10:02:09'),
(6, 'Fakultas Ilmu Pendidikan', '12345678909', 'fip@um.ac.id', '$2y$10$x1gpJnlbRgh7S1GKhgaSouPlV8q7kh4zyEeWxqlblwoNHjQTafjW.', NULL, '2017-03-31 01:39:02', NULL, '2017-03-12 07:00:48', '2017-03-31 01:39:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerjasamas`
--
ALTER TABLE `kerjasamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelaksanas`
--
ALTER TABLE `pelaksanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `kerjasamas`
--
ALTER TABLE `kerjasamas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pelaksanas`
--
ALTER TABLE `pelaksanas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
