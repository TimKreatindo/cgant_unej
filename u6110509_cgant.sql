-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2025 at 01:06 PM
-- Server version: 10.11.11-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6110509_cgant`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'Matematika'),
(2, 'Kimia'),
(3, 'Fisika'),
(4, 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `MIGRATE`
--

CREATE TABLE `MIGRATE` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `MIGRATE`
--

INSERT INTO `MIGRATE` (`version`) VALUES
(11);

-- --------------------------------------------------------

--
-- Table structure for table `sh_kegiatan_tridharma`
--

CREATE TABLE `sh_kegiatan_tridharma` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kegiatan` text NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `tempat_kegiatan` text NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_kegiatan_tridharma`
--

INSERT INTO `sh_kegiatan_tridharma` (`id`, `id_user`, `tanggal_kegiatan`, `jenis_kegiatan`, `tempat_kegiatan`, `bukti`, `create_at`, `last_update`) VALUES
(3, 4, '{\"start\":\"2025-03-03\",\"end\":\"2025-03-03\"}', 'Seminar Internasional', 'Sahrdaya College of Engineering & Technology', '{\"type\":\"url\",\"url\":\"https:\\/\\/app.diagrams.net\\/\"}', '2025-03-11 11:07:36', '2025-03-11 11:07:36'),
(4, 4, '{\"start\":\"2025-03-10\",\"end\":\"2025-03-11\"}', 'Seminar Internasional', 'Universiti Putra malaysia', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"kegiatan-tridharma-20250311110834.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":8.69,\"raw_name\":\"kegiatan-tridharma-20250311110834\",\"ori_name\":\"IMC.xlsx\",\"client_name\":\"IMC.xlsx\"},{\"status\":true,\"file_name\":\"kegiatan-tridharma-202503111108341.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":60.25,\"raw_name\":\"kegiatan-tridharma-202503111108341\",\"ori_name\":\"logbook- TAUFIK HIDAYAT S.E., M.Si-20250217131546.xlsx\",\"client_name\":\"logbook- TAUFIK HIDAYAT S_E_, M_Si-20250217131546.xlsx\"},{\"status\":true,\"file_name\":\"kegiatan-tridharma-20250311110834.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":399.41,\"raw_name\":\"kegiatan-tridharma-20250311110834\",\"ori_name\":\"Surat Rekomendasi.pdf\",\"client_name\":\"Surat Rekomendasi.pdf\"},{\"status\":true,\"file_name\":\"kegiatan-tridharma-20250311110834.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_ext\":\".docx\",\"file_size\":17.47,\"raw_name\":\"kegiatan-tridharma-20250311110834\",\"ori_name\":\"Pentingnya Ayam Broiler.docx\",\"client_name\":\"Pentingnya Ayam Broiler.docx\"}]}', '2025-03-11 11:08:34', '2025-03-11 11:08:34'),
(5, 4, '{\"start\":\"2025-03-08\",\"end\":\"2025-03-10\"}', 'Workshop', 'Politeknik Negeri Jember', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"kegiatan-tridharma-20250317103620.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_ext\":\".docx\",\"file_size\":3107.36,\"raw_name\":\"kegiatan-tridharma-20250317103620\",\"ori_name\":\"6120-169-0-1-2-20250218.docx\",\"client_name\":\"6120-169-0-1-2-20250218.docx\"},{\"status\":true,\"file_name\":\"kegiatan-tridharma-202503171036201.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_ext\":\".docx\",\"file_size\":25.08,\"raw_name\":\"kegiatan-tridharma-202503171036201\",\"ori_name\":\"Format-Logbook-Harian-Magang-MBKM (1).docx\",\"client_name\":\"Format-Logbook-Harian-Magang-MBKM (1).docx\"}]}', '2025-03-17 10:29:01', '2025-03-17 10:36:21'),
(6, 4, '{\"start\":\"2025-03-07\",\"end\":\"2025-03-12\"}', 'Seminar Nasional', 'Universitas Negeri Jember', '{\"type\":\"url\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '2025-03-17 11:40:01', '2025-03-17 11:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `sh_kerjasama`
--

CREATE TABLE `sh_kerjasama` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` text NOT NULL,
  `nama_mitra` text NOT NULL,
  `level_mitra` varchar(255) NOT NULL,
  `jangka_waktu` text NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_kerjasama`
--

INSERT INTO `sh_kerjasama` (`id`, `id_user`, `judul`, `nama_mitra`, `level_mitra`, `jangka_waktu`, `bukti`, `create_at`, `last_update`) VALUES
(10, 3, 'loreng ingsun ing switch hope ', 'Agen 101-darkface', 'Nasional', '{\"start\":\"2025-03-01\",\"end\":\"2025-03-10\"}', '{\"type\":\"url\",\"url\":\"https:\\/\\/codeigniter.com\"}', '2025-03-10 08:14:36', '2025-03-10 14:10:24'),
(12, 3, 'king ling sung kang', 'Napoleon Bonaparte', 'Internasional', '{\"start\":\"2025-03-01\",\"end\":\"2025-04-05\"}', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"bukti-kerjasama-20250310082635.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":10.97,\"raw_name\":\"bukti-kerjasama-20250310082635\",\"ori_name\":\"Data Dosen.xlsx\",\"client_name\":\"Data Dosen.xlsx\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-202503100826351.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":8.69,\"raw_name\":\"bukti-kerjasama-202503100826351\",\"ori_name\":\"IMC.xlsx\",\"client_name\":\"IMC.xlsx\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-20250310082635.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":399.41,\"raw_name\":\"bukti-kerjasama-20250310082635\",\"ori_name\":\"Surat Rekomendasi (1).pdf\",\"client_name\":\"Surat Rekomendasi (1).pdf\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-20250310140312.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":165.77,\"raw_name\":\"bukti-kerjasama-20250310140312\",\"ori_name\":\"Screenshot (1).png\",\"client_name\":\"Screenshot (1).png\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-202503101403121.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":179.95,\"raw_name\":\"bukti-kerjasama-202503101403121\",\"ori_name\":\"Screenshot (2).png\",\"client_name\":\"Screenshot (2).png\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-202503101403122.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":105.75,\"raw_name\":\"bukti-kerjasama-202503101403122\",\"ori_name\":\"Screenshot (3).png\",\"client_name\":\"Screenshot (3).png\"},{\"status\":true,\"file_name\":\"bukti-kerjasama-202503101403123.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":271.77,\"raw_name\":\"bukti-kerjasama-202503101403123\",\"ori_name\":\"Screenshot (4).png\",\"client_name\":\"Screenshot (4).png\"}]}', '2025-03-10 08:26:35', '2025-03-10 14:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `sh_organisasi`
--

CREATE TABLE `sh_organisasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `organisasi` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_organisasi`
--

INSERT INTO `sh_organisasi` (`id`, `id_user`, `organisasi`, `level`, `tahun`, `bukti`, `create_at`, `last_update`) VALUES
(2, 4, 'InaCombS', 'Nasional', '2023', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"organisasi-20250314134801.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":165.77,\"raw_name\":\"organisasi-20250314134801\",\"ori_name\":\"Screenshot (1).png\",\"client_name\":\"Screenshot (1).png\"},{\"status\":true,\"file_name\":\"organisasi-202503141348012.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":105.75,\"raw_name\":\"organisasi-202503141348012\",\"ori_name\":\"Screenshot (3).png\",\"client_name\":\"Screenshot (3).png\"},{\"status\":true,\"file_name\":\"organisasi-202503141348013.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":112.66,\"raw_name\":\"organisasi-202503141348013\",\"ori_name\":\"Screenshot (7).png\",\"client_name\":\"Screenshot (7).png\"},{\"status\":true,\"file_name\":\"organisasi-20250314135730.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":138.44,\"raw_name\":\"organisasi-20250314135730\",\"ori_name\":\"Screenshot (5).png\",\"client_name\":\"Screenshot (5).png\"},{\"status\":true,\"file_name\":\"organisasi-202503141357301.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":211.87,\"raw_name\":\"organisasi-202503141357301\",\"ori_name\":\"Screenshot (6).png\",\"client_name\":\"Screenshot (6).png\"}]}', '2025-03-14 13:48:01', '2025-03-14 13:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `sh_pengelola_jurnal`
--

CREATE TABLE `sh_pengelola_jurnal` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `jurnal` text NOT NULL,
  `level` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_pengelola_jurnal`
--

INSERT INTO `sh_pengelola_jurnal` (`id`, `id_user`, `jurnal`, `level`, `role`, `tahun`, `bukti`, `create_at`, `last_update`) VALUES
(2, 4, 'Electronic Journal of Graph Theory and Applications ', 'Internasional', 'Managing Editor', '2023', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"jurnal-20250314090623.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":165.77,\"raw_name\":\"jurnal-20250314090623\",\"ori_name\":\"Screenshot (1).png\",\"client_name\":\"Screenshot (1).png\"},{\"status\":true,\"file_name\":\"jurnal-202503140906231.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":179.95,\"raw_name\":\"jurnal-202503140906231\",\"ori_name\":\"Screenshot (2).png\",\"client_name\":\"Screenshot (2).png\"},{\"status\":true,\"file_name\":\"jurnal-20250314093537.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":138.44,\"raw_name\":\"jurnal-20250314093537\",\"ori_name\":\"Screenshot (5).png\",\"client_name\":\"Screenshot (5).png\"},{\"status\":true,\"file_name\":\"jurnal-202503140935371.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":211.87,\"raw_name\":\"jurnal-202503140935371\",\"ori_name\":\"Screenshot (6).png\",\"client_name\":\"Screenshot (6).png\"}]}', '2025-03-14 09:06:23', '2025-03-14 09:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `sh_publikasi`
--

CREATE TABLE `sh_publikasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` text NOT NULL,
  `jurnal` text NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `level` varchar(255) NOT NULL,
  `indeks` text NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_publikasi`
--

INSERT INTO `sh_publikasi` (`id`, `id_user`, `judul`, `jurnal`, `tahun`, `level`, `indeks`, `bukti`, `create_at`, `last_update`) VALUES
(2, 4, 'Resolving Dominating Set pada Graf Bunga dan Graf Roda', 'CGANT JOURNAL OF MATHEMATICS AND APPLICATIONS', '2023', 'Nasional', '{\"scopus\":\"\",\"wos\":\"\",\"sinta\":\"SINTA 5\"}', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"publikasi-20250313140750.PNG\",\"file_type\":\"image\\/png\",\"file_ext\":\".PNG\",\"file_size\":13.59,\"raw_name\":\"publikasi-20250313140750\",\"ori_name\":\"Capture.PNG\",\"client_name\":\"Capture.PNG\"},{\"status\":true,\"file_name\":\"publikasi-20250313143617.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":105.75,\"raw_name\":\"publikasi-20250313143617\",\"ori_name\":\"Screenshot (3).png\",\"client_name\":\"Screenshot (3).png\"},{\"status\":true,\"file_name\":\"publikasi-202503131436171.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":271.77,\"raw_name\":\"publikasi-202503131436171\",\"ori_name\":\"Screenshot (4).png\",\"client_name\":\"Screenshot (4).png\"},{\"status\":true,\"file_name\":\"publikasi-202503131436172.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":138.44,\"raw_name\":\"publikasi-202503131436172\",\"ori_name\":\"Screenshot (5).png\",\"client_name\":\"Screenshot (5).png\"}]}', '2025-03-13 14:07:50', '2025-03-13 14:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `sh_rekognisi`
--

CREATE TABLE `sh_rekognisi` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jenis_rekognisi` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `penyelenggara` text NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_rekognisi`
--

INSERT INTO `sh_rekognisi` (`id`, `id_user`, `tahun`, `jenis_rekognisi`, `jenis_kegiatan`, `level`, `penyelenggara`, `bukti`, `create_at`, `last_update`) VALUES
(3, 4, '2025', 'Pembicara', 'Seminar', 'Internasional', 'Neural Processing Letters', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"rekognisi-20250312151149.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":9.61,\"raw_name\":\"rekognisi-20250312151149\",\"ori_name\":\"test url by role.xlsx\",\"client_name\":\"test url by role.xlsx\"}]}', '2025-03-12 15:11:49', '2025-03-12 15:11:49'),
(4, 4, '2024', 'Juri', 'Lomba Ilmiah', 'Internasional', 'MIT', '{\"type\":\"url\",\"url\":\"https:\\/\\/digitalocean.com\"}', '2025-03-17 08:53:08', '2025-03-17 08:53:08'),
(5, 4, '2015', 'Reviewer', 'Seminar', 'Internasional', 'CGANT', '{\"type\":\"url\",\"url\":\"https:\\/\\/www.google.com\\/\"}', '2025-03-17 11:47:54', '2025-03-17 11:48:36'),
(6, 4, '2020', 'Reviewer', 'Seminar', 'Nasional', 'Universitas Jember', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"rekognisi-20250317121614.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":550.01,\"raw_name\":\"rekognisi-20250317121614\",\"ori_name\":\"170-13-492-1-11-20181221.pdf\",\"client_name\":\"170-13-492-1-11-20181221.pdf\"},{\"status\":true,\"file_name\":\"rekognisi-202503171216141.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":474.31,\"raw_name\":\"rekognisi-202503171216141\",\"ori_name\":\"inovasi 2025-prop tok.pdf\",\"client_name\":\"inovasi 2025-prop tok.pdf\"}]}', '2025-03-17 12:16:14', '2025-03-17 12:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `sh_seminar`
--

CREATE TABLE `sh_seminar` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_kegiatan` text NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `jenis_partisipasi` varchar(255) NOT NULL,
  `judul_kegiatan` text NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `penyelenggara` text NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_seminar`
--

INSERT INTO `sh_seminar` (`id`, `id_user`, `tanggal_kegiatan`, `jenis_kegiatan`, `jenis_partisipasi`, `judul_kegiatan`, `tingkat`, `penyelenggara`, `bukti`, `create_at`, `last_update`) VALUES
(1, 4, '{\"start\":\"2025-03-01\",\"end\":\"2025-03-02\"}', 'Kolokium', 'Speaker', 'Image Authentication Based on Magic Square Orde-n', 'Nasional', 'PUI-PT Kombinatorika dan Graf', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"seminar-20250312082329.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":165.77,\"raw_name\":\"seminar-20250312082329\",\"ori_name\":\"Screenshot (1).png\",\"client_name\":\"Screenshot (1).png\"},{\"status\":true,\"file_name\":\"seminar-202503120823291.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":179.95,\"raw_name\":\"seminar-202503120823291\",\"ori_name\":\"Screenshot (2).png\",\"client_name\":\"Screenshot (2).png\"},{\"status\":true,\"file_name\":\"seminar-202503120823292.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":105.75,\"raw_name\":\"seminar-202503120823292\",\"ori_name\":\"Screenshot (3).png\",\"client_name\":\"Screenshot (3).png\"},{\"status\":true,\"file_name\":\"seminar-202503120823293.png\",\"file_type\":\"image\\/png\",\"file_ext\":\".png\",\"file_size\":271.77,\"raw_name\":\"seminar-202503120823293\",\"ori_name\":\"Screenshot (4).png\",\"client_name\":\"Screenshot (4).png\"},{\"status\":true,\"file_name\":\"seminar-20250312092734.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":10.97,\"raw_name\":\"seminar-20250312092734\",\"ori_name\":\"Data Dosen.xlsx\",\"client_name\":\"Data Dosen.xlsx\"},{\"status\":true,\"file_name\":\"seminar-20250312092734.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":399.41,\"raw_name\":\"seminar-20250312092734\",\"ori_name\":\"Surat Rekomendasi (1).pdf\",\"client_name\":\"Surat Rekomendasi (1).pdf\"},{\"status\":true,\"file_name\":\"seminar-20250312092734.ppt\",\"file_type\":\"application\\/vnd.ms-powerpoint\",\"file_ext\":\".ppt\",\"file_size\":507.5,\"raw_name\":\"seminar-20250312092734\",\"ori_name\":\"Perilaku Konsumen.ppt\",\"client_name\":\"Perilaku Konsumen.ppt\"}]}', '2025-03-12 08:23:29', '2025-03-12 09:27:34'),
(3, 4, '{\"start\":\"2025-03-01\",\"end\":\"2025-03-02\"}', 'Webinar', 'Moderator', 'amp yolo dev the moto', 'Nasional', 'UNIVERSITAS AIRLANGGA', '{\"type\":\"url\",\"url\":\"https:\\/\\/fesnuk.com\"}', '2025-03-17 05:17:05', '2025-03-17 05:17:05'),
(4, 4, '{\"start\":\"2025-03-04\",\"end\":\"2025-03-06\"}', 'Webinar', 'Speaker', 'Pengembangan Sistem Informasi Percetakan', 'Internasional', 'Agna Rizky Putra Anggara', '{\"type\":\"url\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '2025-03-17 10:43:26', '2025-03-17 10:44:21'),
(5, 4, '{\"start\":\"2025-03-17\",\"end\":\"2025-03-18\"}', 'Webinar', 'Presenter', 'Rancang Bangun SIM FMIPA', 'Nasional', 'Universitas Jember', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"seminar-20250317114429.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":550.01,\"raw_name\":\"seminar-20250317114429\",\"ori_name\":\"170-13-492-1-11-20181221.pdf\",\"client_name\":\"170-13-492-1-11-20181221.pdf\"},{\"status\":true,\"file_name\":\"seminar-202503171144291.pdf\",\"file_type\":\"application\\/pdf\",\"file_ext\":\".pdf\",\"file_size\":474.31,\"raw_name\":\"seminar-202503171144291\",\"ori_name\":\"inovasi 2025-prop tok.pdf\",\"client_name\":\"inovasi 2025-prop tok.pdf\"}]}', '2025-03-17 11:44:29', '2025-03-17 11:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `sh_sertifikat_kompetensi`
--

CREATE TABLE `sh_sertifikat_kompetensi` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` text NOT NULL,
  `bidang` text NOT NULL,
  `level` varchar(255) NOT NULL,
  `lembaga` text NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `bukti` text NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sh_sertifikat_kompetensi`
--

INSERT INTO `sh_sertifikat_kompetensi` (`id`, `id_user`, `jenis`, `bidang`, `level`, `lembaga`, `tahun`, `bukti`, `create_at`, `last_update`) VALUES
(3, 4, 'Sertifikat Industri', 'Aerodynamic', 'Internasional', 'McLaren', '2025', '{\"type\":\"file\",\"data\":[{\"status\":true,\"file_name\":\"sertifikat-20250313091538.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_ext\":\".docx\",\"file_size\":17.47,\"raw_name\":\"sertifikat-20250313091538\",\"ori_name\":\"Pentingnya Ayam Broiler.docx\",\"client_name\":\"Pentingnya Ayam Broiler.docx\"},{\"status\":true,\"file_name\":\"sertifikat-20250313094643.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":10.97,\"raw_name\":\"sertifikat-20250313094643\",\"ori_name\":\"Data Dosen.xlsx\",\"client_name\":\"Data Dosen.xlsx\"},{\"status\":true,\"file_name\":\"sertifikat-202503130946431.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_ext\":\".xlsx\",\"file_size\":60.25,\"raw_name\":\"sertifikat-202503130946431\",\"ori_name\":\"logbook- TAUFIK HIDAYAT S.E., M.Si-20250217131546.xlsx\",\"client_name\":\"logbook- TAUFIK HIDAYAT S_E_, M_Si-20250217131546.xlsx\"}]}', '2025-03-13 09:15:38', '2025-03-13 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `is_active` int(1) NOT NULL,
  `create_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_role`, `id_jurusan`, `nip`, `nama`, `password`, `image`, `is_active`, `create_at`, `last_update`) VALUES
(3, 1, 4, '196501081990032002', 'Prof. Dra. Hari Sulistiyowati, M.Sc., Ph.D', '$2y$10$ZzJ9.WqQuaA26n.WVW.k3uo1NjL.G0RYVUbC1zYcgx5AjRLTIEik.', 'default.png', 1, '2025-03-06 13:21:01', '2025-03-17 09:07:35'),
(4, 4, 1, '199004062015041001', 'Abduh Riski, S.Si., M.Si.', '$2y$10$rLzYFnjgjpnitgymtyKYWeHWLb/lxIv297ZYISFUrZE9CnIN7lRPC', 'default.png', 1, '2025-03-07 08:45:47', '2025-03-07 08:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Kaprodi'),
(3, 'Dekan'),
(4, 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_kegiatan_tridharma`
--
ALTER TABLE `sh_kegiatan_tridharma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_kerjasama`
--
ALTER TABLE `sh_kerjasama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_organisasi`
--
ALTER TABLE `sh_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_pengelola_jurnal`
--
ALTER TABLE `sh_pengelola_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_publikasi`
--
ALTER TABLE `sh_publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_rekognisi`
--
ALTER TABLE `sh_rekognisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_seminar`
--
ALTER TABLE `sh_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_sertifikat_kompetensi`
--
ALTER TABLE `sh_sertifikat_kompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sh_kegiatan_tridharma`
--
ALTER TABLE `sh_kegiatan_tridharma`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sh_kerjasama`
--
ALTER TABLE `sh_kerjasama`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sh_organisasi`
--
ALTER TABLE `sh_organisasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sh_pengelola_jurnal`
--
ALTER TABLE `sh_pengelola_jurnal`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sh_publikasi`
--
ALTER TABLE `sh_publikasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sh_rekognisi`
--
ALTER TABLE `sh_rekognisi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sh_seminar`
--
ALTER TABLE `sh_seminar`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sh_sertifikat_kompetensi`
--
ALTER TABLE `sh_sertifikat_kompetensi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
