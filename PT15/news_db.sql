-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 23.53
-- Versi server: 8.0.30
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `author_id`) VALUES
(3, 'Berita Satu', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut velit totam eius, officia odio aliquid consectetur quod maxime magnam! Inventore!', 1),
(4, 'Berita Dua', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore vitae, iusto dolores error illo eos eius quasi? Doloribus, repellendus quasi architecto a rem quae odit ratione dolor quas. Quaerat fugit distinctio consequuntur, libero quo officia incidunt magnam? Minus impedit obcaecati aspernatur vitae error. Obcaecati earum facilis itaque praesentium, incidunt ad?', 1),
(5, 'Berita Satu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore vitae, iusto dolores error illo eos eius quasi? Doloribus, repellendus quasi architecto a rem quae odit ratione dolor quas. Quaerat fugit distinctio consequuntur, libero quo officia incidunt magnam? Minus impedit obcaecati aspernatur vitae error. Obcaecati earum facilis itaque praesentium, incidunt ad?', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','penulis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'penulis', '$2y$10$tIHlNEwgZG.NAlibqIgRG.pBOGUileuNAa73L/N1sfkzQpgNsKafK', 'penulis'),
(2, 'admin', '$2y$10$g2oSjPkNVD/JVBAc38UpgOS566z2k4qBURNXuaJGOeSrGBfEXkhES', 'admin'),
(3, 'penulis2', '$2y$10$Wm/5yERL0B36kLQkaLUoGeDnOZsfpcSCAFKb.LbGmTJKG.34MsoPW', 'penulis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
