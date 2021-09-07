-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 02:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

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
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2020_06_05_174709_create_zaposleni_table', 1),
(34, '2020_06_07_152952_create_soba_table', 2),
(40, '2020_06_07_230028_create_rezervacije_table', 3),
(41, '2020_06_08_222459_create_minibar_table', 3),
(42, '2020_06_09_110235_create_uslugehotela_table', 3),
(43, '2020_06_16_132001_create_userusluge_table', 3),
(44, '2020_06_18_130023_create_userminibar_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `minibar`
--

CREATE TABLE `minibar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena_pica` decimal(8,2) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minibar`
--

INSERT INTO `minibar` (`id`, `pice`, `cena_pica`, `kolicina`, `created_at`, `updated_at`) VALUES
(1, 'koka kola', '200.00', 200, '2020-06-22 05:36:29', '2020-06-22 05:36:29'),
(2, 'fanta', '200.00', 200, '2020-06-22 05:36:41', '2020-06-22 05:36:41'),
(3, 'Rosa', '100.00', 200, '2020-06-22 05:36:58', '2020-06-22 05:37:19');

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
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `soba_id` bigint(20) UNSIGNED NOT NULL,
  `datum_rezervacije` date NOT NULL,
  `broj_nocenja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `user_id`, `soba_id`, `datum_rezervacije`, `broj_nocenja`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2020-06-24', 2, '2020-06-22 05:35:18', '2020-06-22 05:35:18'),
(4, 2, 1, '2020-06-27', 2, '2020-06-22 05:49:59', '2020-06-22 05:49:59'),
(5, 1, 1, '2020-07-25', 2, '2020-07-05 11:44:18', '2020-07-05 11:44:18'),
(6, 1, 1, '2020-07-16', 2, '2020-07-09 14:37:45', '2020-07-09 14:37:45'),
(7, 1, 2, '2020-07-10', 111111, '2020-07-09 14:54:23', '2020-07-09 14:54:23'),
(8, 1, 2, '2020-07-10', 111, '2020-07-09 14:54:29', '2020-07-09 14:54:29'),
(9, 1, 1, '2021-03-31', 5, '2021-03-27 21:57:32', '2021-03-27 21:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE `soba` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `broj_sobe` int(11) NOT NULL,
  `broj_kreveta` int(11) NOT NULL,
  `cena_sobe` decimal(8,2) NOT NULL DEFAULT 1000.00,
  `zauzeta` enum('jeste','nije') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nije',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`id`, `broj_sobe`, `broj_kreveta`, `cena_sobe`, `zauzeta`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '500.00', 'jeste', '2020-06-22 05:01:21', '2020-06-22 05:02:32'),
(2, 2, 2, '1000.00', 'nije', '2020-06-22 05:02:45', '2020-06-22 05:23:31'),
(4, 3, 3, '500.00', 'nije', '2020-06-22 05:42:03', '2020-06-22 05:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `userminibar`
--

CREATE TABLE `userminibar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `minibar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userminibar`
--

INSERT INTO `userminibar` (`id`, `user_id`, `minibar_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-06-22 05:38:26', '2020-06-22 05:38:26'),
(3, 2, 1, '2020-06-22 05:49:29', '2020-06-22 05:49:29'),
(4, 2, 2, '2020-06-22 05:49:29', '2020-06-22 05:49:29'),
(5, 2, 3, '2020-06-22 05:49:29', '2020-06-22 05:49:29'),
(6, 1, 1, '2020-07-05 11:45:01', '2020-07-05 11:45:01'),
(7, 1, 2, '2020-07-05 11:45:01', '2020-07-05 11:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(8,2) DEFAULT 1000.00,
  `racun` decimal(8,2) DEFAULT 0.00,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `phone`, `email`, `usertype`, `balance`, `racun`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Adminovic', '0118465838', 'admin@admin.com', 'admin', '200.00', '115200.00', NULL, '$2y$10$mzroTCH8rvAHvUgiy3Tj1.7Z3O.7H6YPVk7edOc7GxuT4g0TL.U7q', NULL, '2020-06-21 23:23:03', '2020-06-22 04:28:06'),
(2, 'Ivan', 'Todorovic', '0118465839', 'ivan@ivan.com', 'menadzer', '1000.00', '0.00', NULL, '$2y$10$.lRGxtXIqQuQn98bgpsOouxmJojHy.kAIFd1arW1YRJ0qqqEDhJE2', NULL, '2020-06-21 23:23:43', '2020-06-22 05:53:48'),
(8, 'milan', 'toplica', NULL, 'milan@milan.com', NULL, '1000.00', '0.00', NULL, '$2y$10$LUlGZJGIeEMYW/03FDcQYusOwlmSZKDf7fF7RbFYEyI9FXBsZI7iS', NULL, '2021-07-11 07:28:55', '2021-07-11 07:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `userusluge`
--

CREATE TABLE `userusluge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `uslugehotela_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userusluge`
--

INSERT INTO `userusluge` (`id`, `user_id`, `uslugehotela_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2020-06-22 05:28:40', '2020-06-22 05:39:11'),
(4, 1, 2, '2020-06-22 05:39:25', '2020-06-22 05:39:25'),
(5, 2, 1, '2020-06-22 05:49:44', '2020-06-22 05:49:44'),
(6, 2, 4, '2020-06-22 05:49:44', '2020-06-22 05:49:44'),
(7, 1, 1, '2020-07-05 11:44:50', '2020-07-05 11:44:50'),
(8, 1, 4, '2020-07-05 11:44:50', '2020-07-05 11:44:50'),
(9, 1, 1, '2020-07-09 14:54:35', '2020-07-09 14:54:35'),
(10, 1, 2, '2020-07-09 14:54:35', '2020-07-09 14:54:35'),
(11, 1, 4, '2020-07-09 14:54:35', '2020-07-09 14:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `uslugehotela`
--

CREATE TABLE `uslugehotela` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipusluge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena_usluge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uslugehotela`
--

INSERT INTO `uslugehotela` (`id`, `tipusluge`, `cena_usluge`, `created_at`, `updated_at`) VALUES
(1, 'Teretana', '200.00', '2020-06-22 05:28:05', '2020-06-22 05:28:05'),
(2, 'Room servis', '300.00', '2020-06-22 05:28:12', '2020-06-22 05:28:12'),
(4, 'bazen', '200.00', '2020-06-22 05:39:38', '2020-06-22 05:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datumrodjenja` date NOT NULL,
  `datumistekaugovora` date NOT NULL,
  `datumistekasanitarneknjizice` date NOT NULL,
  `radnisati` int(11) NOT NULL DEFAULT 0,
  `radio` enum('dosao','nijedosao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dosao',
  `smena` enum('prva','druga') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'prva',
  `pozicija` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`id`, `ime`, `prezime`, `telefon`, `adresa`, `datumrodjenja`, `datumistekaugovora`, `datumistekasanitarneknjizice`, `radnisati`, `radio`, `smena`, `pozicija`, `created_at`, `updated_at`) VALUES
(1, 'Petar', 'Petrovic', '0801111444', 'Surcinska 154 Surcin', '1998-03-22', '2020-06-27', '2020-06-27', 88, 'dosao', 'prva', 'konobar', '2020-06-21 23:30:42', '2020-06-22 05:35:56'),
(2, 'Goran', 'Sakic', '0801111444', 'Surcinska 154 Surcin', '1997-02-28', '2022-06-27', '2022-06-24', 64, 'dosao', 'druga', 'Konobar', '2020-06-21 23:32:04', '2021-07-11 08:08:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minibar`
--
ALTER TABLE `minibar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezervacije_user_id_foreign` (`user_id`),
  ADD KEY `rezervacije_soba_id_foreign` (`soba_id`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `soba_broj_sobe_unique` (`broj_sobe`);

--
-- Indexes for table `userminibar`
--
ALTER TABLE `userminibar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userminibar_user_id_foreign` (`user_id`),
  ADD KEY `userminibar_minibar_id_foreign` (`minibar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userusluge`
--
ALTER TABLE `userusluge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userusluge_user_id_foreign` (`user_id`),
  ADD KEY `userusluge_uslugehotela_id_foreign` (`uslugehotela_id`);

--
-- Indexes for table `uslugehotela`
--
ALTER TABLE `uslugehotela`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `minibar`
--
ALTER TABLE `minibar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `soba`
--
ALTER TABLE `soba`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userminibar`
--
ALTER TABLE `userminibar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userusluge`
--
ALTER TABLE `userusluge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uslugehotela`
--
ALTER TABLE `uslugehotela`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `rezervacije_soba_id_foreign` FOREIGN KEY (`soba_id`) REFERENCES `soba` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rezervacije_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userminibar`
--
ALTER TABLE `userminibar`
  ADD CONSTRAINT `userminibar_minibar_id_foreign` FOREIGN KEY (`minibar_id`) REFERENCES `minibar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userminibar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userusluge`
--
ALTER TABLE `userusluge`
  ADD CONSTRAINT `userusluge_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userusluge_uslugehotela_id_foreign` FOREIGN KEY (`uslugehotela_id`) REFERENCES `uslugehotela` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
