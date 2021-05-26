-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 16.43
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_203040123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `brands` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `pictures`, `names`, `brands`, `descriptions`, `categories`, `prices`) VALUES
(3, '6.jpg', 'jhjhk', 'jhkjhjh', 'jhkjhkhjhjhghhgfgdfcvbbbuuuvbvjhkjhkhjhjhghhgfgdfcvbbbuuuvbvjhkjhkhjhjhghhgfgdfcvbbbuuuvbv', 'gjhgg', '2212'),
(9, '60a1c0231d47c.jpg', 'nbnbmn', 'nbmnb', 'nbmnbn', 'Shirt', '687'),
(19, 'no-photo.png', 'kjkjl', 'kjlkjk', 'kjlkj', 'Shirt', '7987'),
(20, '60a3d46787e9e.jpg', 'jkljkj', 'kjlkj', 'kjlj', 'Shirt', '7687'),
(21, '60a3d4ac7304c.jpg', 'ljkjlk', 'kjljk', 'kjkljkl', 'Pants', '89789'),
(22, 'no-photo.png', '87987', 'hhgj', 'hgjgh', 'Shirt', '789'),
(23, 'no-photo.png', 'ljkljhgf', 'gfghf', 'iuugbv', 'Clothes', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `address`, `picture`) VALUES
(1, 'kalam', '$2y$10$p8BUD3FbESmViMonZcW9/u4i7hV3pCD6Ne2qhVm2cgsEps3f8z.u6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
