-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2019 pada 00.01
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_devonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_06_02_121657_create_products_table', 1),
(19, '2019_06_02_203559_create_users_table', 1),
(20, '2019_06_12_085854_create_orders_table', 2),
(21, '2019_07_30_154424_create_sliders_table', 2),
(22, '2019_10_07_130921_create_transfers_table', 3),
(23, '2019_10_07_201900_create_resis_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `payment_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `cart`, `address`, `status`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dana', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:7;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:250000;s:4:\"item\";O:12:\"App\\Products\":26:{s:8:\"\0*\0table\";s:8:\"products\";s:11:\"\0*\0fillable\";a:4:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2019-10-03 14:53:25\";s:10:\"updated_at\";s:19:\"2019-10-03 15:02:11\";s:9:\"imagePath\";s:14:\"1570114405.jpg\";s:5:\"title\";s:10:\"WarWolf K3\";s:11:\"description\";s:582:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.\";s:5:\"price\";i:250000;}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2019-10-03 14:53:25\";s:10:\"updated_at\";s:19:\"2019-10-03 15:02:11\";s:9:\"imagePath\";s:14:\"1570114405.jpg\";s:5:\"title\";s:10:\"WarWolf K3\";s:11:\"description\";s:582:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.\";s:5:\"price\";i:250000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:250000;}', 'Karawang', '3', 'ch_1FR2XzJaveLa3TcVR8R9dHd6', '2019-10-07 13:11:09', '2019-10-07 14:30:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `imagePath`, `title`, `description`, `price`) VALUES
(1, NULL, '2019-10-03 07:41:43', '1570113703.jpg', 'Rexus Xierra G4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 80000),
(3, '2019-10-03 07:47:43', '2019-10-03 08:01:08', '1570114063.jpg', 'NYK G06 Assassin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 50000),
(4, '2019-10-03 07:49:48', '2019-10-03 08:01:15', '1570114188.jpg', 'WarWolf T1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 120000),
(5, '2019-10-03 07:51:55', '2019-10-03 08:01:51', '1570114315.jpg', 'NYK K02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 135000),
(6, '2019-10-03 07:52:33', '2019-10-03 08:02:01', '1570114353.png', 'Rexus K9TKL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 130000),
(7, '2019-10-03 07:53:25', '2019-10-03 08:02:11', '1570114405.jpg', 'WarWolf K3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 250000),
(8, '2019-10-03 07:56:03', '2019-10-03 08:03:27', '1570114563.jpg', 'WarWolf R1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 115000),
(9, '2019-10-03 07:59:10', '2019-10-03 08:02:32', '1570114750.jpg', 'Rexus Vonix FX995', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 80000),
(10, '2019-10-03 08:00:34', '2019-10-03 08:02:42', '1570114834.jpg', 'NYK HS-P12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit Adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.', 330000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resis`
--

CREATE TABLE `resis` (
  `id` int(10) UNSIGNED NOT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `credit_id` int(11) DEFAULT NULL,
  `resi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resis`
--

INSERT INTO `resis` (`id`, `transfer_id`, `credit_id`, `resi`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'CGKAJ14485799319', '2019-10-07 13:37:07', '2019-10-07 13:37:07'),
(4, 1, NULL, 'CGKAJ14485799319', '2019-10-07 14:09:20', '2019-10-07 14:09:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `title`, `image`, `link`) VALUES
(1, NULL, '2019-10-03 08:05:42', 'Rexus Gaming', '1570115142.png', '/search?keyword=rexus'),
(2, '2019-10-03 08:06:09', '2019-10-03 08:06:09', 'Warwolf Banner', '1570115169.png', '/search?keyword=warwolf'),
(3, '2019-10-03 08:06:32', '2019-10-03 08:06:32', 'Signup banner', '1570115192.png', '/signup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transfers`
--

INSERT INTO `transfers` (`id`, `user_id`, `name`, `cart`, `address`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ali Davit', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:3;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:50000;s:4:\"item\";O:12:\"App\\Products\":26:{s:8:\"\0*\0table\";s:8:\"products\";s:11:\"\0*\0fillable\";a:4:{i:0;s:9:\"imagePath\";i:1;s:5:\"title\";i:2;s:11:\"description\";i:3;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2019-10-03 14:47:43\";s:10:\"updated_at\";s:19:\"2019-10-03 15:01:08\";s:9:\"imagePath\";s:14:\"1570114063.jpg\";s:5:\"title\";s:16:\"NYK G06 Assassin\";s:11:\"description\";s:587:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.\";s:5:\"price\";i:50000;}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2019-10-03 14:47:43\";s:10:\"updated_at\";s:19:\"2019-10-03 15:01:08\";s:9:\"imagePath\";s:14:\"1570114063.jpg\";s:5:\"title\";s:16:\"NYK G06 Assassin\";s:11:\"description\";s:587:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac. Ipsum dolor sit amet consectetur adipiscing elit duis. Ac odio tempor orci dapibus. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Lacinia at quis risus sed vulputate. Commodo odio aenean sed adipiscing. Tincidunt eget nullam non nisi est sit amet. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Aenean euismod elementum nisi quis eleifend quam adipiscing.\";s:5:\"price\";i:50000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:50000;}', 'Karawang', '3', '1570457443.jpg', '2019-10-07 07:10:43', '2019-10-07 14:47:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `email`, `role`, `password`) VALUES
(1, '2019-10-03 07:31:18', '2019-10-03 07:31:18', 'Administrator', 'admin@gmail.com', 1, '$2y$10$Fk8lvXFk4t9x4CtPIr0sSOpMO2yT6QnuHLtae1OuKlD9sVQmfC2de'),
(2, '2019-10-03 07:32:38', '2019-10-03 07:32:38', 'Ali Davit', 'alidavit78@yahoo.com', 0, '$2y$10$cFCFmvGP22dnuUXzXcQ48.M9JgTFeaTJ0KZuog1oZKQwAcbCfFdGC'),
(3, '2019-10-07 12:59:36', '2019-10-07 12:59:36', 'Dana', 'dana@gmail.com', 0, '$2y$10$vuNZKl0/6BCfTufiJ4v64OtYfxVxZ2iWHtQ0zgO5epmBudV1lz5a.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resis`
--
ALTER TABLE `resis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `resis`
--
ALTER TABLE `resis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
