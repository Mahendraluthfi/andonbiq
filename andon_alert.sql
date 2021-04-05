-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Waktu pembuatan: 05 Apr 2021 pada 04.26
-- Versi server: 10.4.11-MariaDB-1:10.4.11+maria~bionic
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andon_alert`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apikey_telegram`
--

CREATE TABLE `apikey_telegram` (
  `id` int(11) NOT NULL,
  `api_ecosystem` varchar(50) NOT NULL,
  `api_valuestream` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `apikey_telegram`
--

INSERT INTO `apikey_telegram` (`id`, `api_ecosystem`, `api_valuestream`) VALUES
(1, '-495415635', '-301363315');

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtime`
--

CREATE TABLE `downtime` (
  `id` int(11) NOT NULL,
  `line` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date` date NOT NULL,
  `count` float NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `downtime`
--

INSERT INTO `downtime` (`id`, `line`, `time_start`, `time_end`, `date`, `count`, `status`) VALUES
(7, 'Line 1', '16:20:08', '16:37:41', '2020-12-17', 17, 1),
(8, 'Line 1', '16:25:22', '16:38:34', '2020-12-17', 13, 1),
(9, 'Line 1', '14:31:18', '14:33:38', '2020-12-18', 2, 1),
(10, 'Line ', '13:54:52', '13:55:15', '2021-02-11', 0, 1),
(11, 'Line 1', '14:57:06', '14:57:33', '2021-02-11', 0, 1),
(12, 'Line 1', '15:08:00', '15:09:29', '2021-02-11', 1, 1),
(13, 'Line 1', '15:15:59', '15:16:37', '2021-02-11', 0, 1),
(14, 'Line 1', '15:17:38', '15:18:13', '2021-02-11', 0, 1),
(15, 'Line 1', '08:30:07', '08:30:35', '2021-02-16', 0, 1),
(16, 'Line 1', '10:14:36', '10:15:09', '2021-03-01', 0, 1),
(18, 'Line 1', '15:02:08', '15:03:42', '2021-03-22', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_eco`
--

CREATE TABLE `dt_eco` (
  `id` int(11) NOT NULL,
  `id_line` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date` date NOT NULL,
  `count` float NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_eco`
--

INSERT INTO `dt_eco` (`id`, `id_line`, `time_start`, `time_end`, `date`, `count`, `status`) VALUES
(26, '3', '14:56:26', '14:56:53', '2021-02-26', 0, 1),
(27, '3', '14:57:12', '14:58:06', '2021-02-26', 0, 1),
(28, '6', '15:25:39', '15:26:20', '2021-02-26', 0, 1),
(29, '6', '15:26:34', '15:27:11', '2021-02-26', 0, 1),
(30, '9', '15:36:50', '15:38:30', '2021-02-26', 1, 1),
(31, '4', '15:50:25', '15:51:09', '2021-02-26', 0, 1),
(32, '5', '15:57:31', '00:00:00', '2021-02-26', 0, 0),
(33, '1', '16:22:17', '16:22:55', '2021-02-26', 0, 1),
(34, '4', '09:41:17', '09:41:45', '2021-03-01', 0, 1),
(35, '4', '10:16:27', '10:16:53', '2021-03-01', 0, 1),
(36, '11', '15:51:08', '15:51:47', '2021-03-22', 0, 1),
(37, '11', '15:52:23', '15:52:53', '2021-03-22', 0, 1),
(38, '11', '17:13:16', '00:00:00', '2021-04-01', 0, 0),
(39, '11', '06:28:12', '00:00:00', '2021-04-05', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_vsm`
--

CREATE TABLE `dt_vsm` (
  `id` int(11) NOT NULL,
  `id_line` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date` date NOT NULL,
  `count` float NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_vsm`
--

INSERT INTO `dt_vsm` (`id`, `id_line`, `time_start`, `time_end`, `date`, `count`, `status`) VALUES
(25, '3', '14:57:15', '14:58:23', '2021-02-26', 1, 1),
(26, '6', '15:26:38', '15:27:29', '2021-02-26', 0, 1),
(27, '9', '15:37:15', '15:38:39', '2021-02-26', 1, 1),
(28, '4', '15:50:32', '15:51:25', '2021-02-26', 0, 1),
(29, '5', '15:57:54', '00:00:00', '2021-02-26', 0, 0),
(30, '1', '16:22:33', '16:23:03', '2021-02-26', 0, 1),
(31, '4', '09:41:25', '09:41:51', '2021-03-01', 0, 1),
(32, '4', '10:16:35', '10:17:05', '2021-03-01', 0, 1),
(33, '11', '15:52:25', '15:52:57', '2021-03-22', 0, 1),
(34, '11', '17:13:55', '00:00:00', '2021-04-01', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `mac_address` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `line`
--

INSERT INTO `line` (`id`, `mac_address`, `line`, `section`, `last_update`) VALUES
(11, '2C:F4:32:57:4B:B1', '1', 'A', '2021-04-05 11:26:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `epf` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `epf`, `password`) VALUES
(1, '8497', '4ef42b32bccc9485b10b8183507e5d82'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apikey_telegram`
--
ALTER TABLE `apikey_telegram`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `downtime`
--
ALTER TABLE `downtime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dt_eco`
--
ALTER TABLE `dt_eco`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dt_vsm`
--
ALTER TABLE `dt_vsm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apikey_telegram`
--
ALTER TABLE `apikey_telegram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `downtime`
--
ALTER TABLE `downtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `dt_eco`
--
ALTER TABLE `dt_eco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `dt_vsm`
--
ALTER TABLE `dt_vsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
