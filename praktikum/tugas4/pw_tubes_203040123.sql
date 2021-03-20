-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2021 pada 16.38
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
-- Database: `pw_tubes_203040123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `picture`, `name`, `brand`, `description`, `category`, `price`) VALUES
(1, '1.png', 'Dark Gray Short', 'Broodis', 'Original Dark Grey Short, made of full cotton and comfortable to wear', 'Shirt', 185000),
(2, '4.png', 'Austin Gray', 'Broodis', 'Original Austin Grey Flannel, made of flannel fabric and comfortable to wear', 'Flannel', 195000),
(3, '5.png', 'Bro Do Trainer', 'Bro Do', 'Original Bro Do Trainer shoes, sporty style and casual shoes', 'Shoes', 265000),
(4, '3.png', 'Gentle Black Long', 'Broodis', 'Original Gentle Black Long, made of full cotton and comfortable to wear', 'Long Shirt', 225000),
(5, '6.png', 'VTG V.2 Olive', 'Bro Do', 'Original VTG V.2 Olive Shoes, elegant style and casual shoes', 'Shoes', 375000),
(6, '7.png', 'Signature Navy Short', 'Kyran', 'Original Signature Navy Short Pants, for comfortable and enjoyment', 'Pants', 126000),
(7, '8.png', 'Oversized Clothes', 'Kyran', 'Original Oversized Clothes, made of cotton combed 30s and comfortable to wear', 'Clothes', 65000),
(8, '9.png', 'Malta Blast', 'Osgood', 'Original Malta Blast Sandals, made adventure, travelling and protect the feet', 'Sandals', 315000),
(9, '10.png', 'Stripy Polo', 'Prepp Studio', 'Original Stripy Polo Clothes, made of full cotton and comfortable to wear', 'Clothes', 199000),
(10, '2.png', 'Clean White Long', 'Broodis', 'Original Clean White Long, made of full cotton and comfortable to wear', 'Long Shirt', 225000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
