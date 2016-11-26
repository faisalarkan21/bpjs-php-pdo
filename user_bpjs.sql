-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16 Jun 2016 pada 08.27
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_bpjs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `bpjs` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `nama_level`, `email`, `level`, `bpjs`, `mobile`, `joining_date`) VALUES
(13, 'admin', 'Ghost', '51f3224a39ef4dcf325f2c27a9047fca', 'Administrator', 'admin@gmail.com', 1, '698892364', '6876768678', '2016-06-15 23:41:53'),
(26, 'faisal21', 'Faisal Arkan', 'd606757a9c50dedc85e3cc90949b10ae', 'User', 'faisalarkan21@gmail.com', 3, '7484375487543', '85778805197', '2016-06-15 23:40:50'),
(27, 'ganangyeah', 'Ganang Sadewo Separtan', 'd606757a9c50dedc85e3cc90949b10ae', 'User', 'ganang@gmail.com', 3, '475493875839', '830948320948092', '2016-06-15 23:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
