-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2022 at 11:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'token', '3291163c6b63d118c43664fbe886e4d1a855951bc0b0b3b792a69f5bcf70618f', '[\"*\"]', NULL, '2022-03-24 22:32:27', '2022-03-24 22:32:27'),
(2, 'App\\Models\\User', 4, 'token', 'f588ece648d28401bb9c9f866d434df89185376323c911eb0fbac0a2d9e70496', '[\"*\"]', NULL, '2022-03-24 23:04:21', '2022-03-24 23:04:21'),
(3, 'App\\Models\\User', 5, 'token', '945899d8bc5a4cb8cdc97a475d274e61bb264cd207057eb56dd8798e0a9787d7', '[\"*\"]', NULL, '2022-03-24 23:04:41', '2022-03-24 23:04:41'),
(4, 'App\\Models\\User', 6, 'token', '357441a2e9c0c4b165d4771aa1abe44a23d37895f817042098d35759a82a501e', '[\"*\"]', NULL, '2022-03-24 23:05:02', '2022-03-24 23:05:02'),
(5, 'App\\Models\\User', 7, 'token', '29792b56e0073bce4f575a3e3871b4b5bef951d8c9dbc7c2d68887282c6e4f59', '[\"*\"]', NULL, '2022-03-24 23:59:54', '2022-03-24 23:59:54'),
(6, 'App\\Models\\User', 8, 'token', 'ceb3942f1cf145df2d1962e012df5f418951175500a9596beb737476856d2fed', '[\"*\"]', NULL, '2022-03-25 00:00:12', '2022-03-25 00:00:12'),
(7, 'App\\Models\\User', 9, 'token', 'a9e76f754a0f4ee6a3ff703798cd7c236fb03edd8340a8f0be13ca4f7bed84c4', '[\"*\"]', NULL, '2022-03-25 00:00:44', '2022-03-25 00:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `block` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_Delete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `Education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State_Region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Experience_in_Designing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Additional_Details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `role`, `block`, `is_Delete`, `Education`, `Country`, `State_Region`, `Experience_in_Designing`, `Additional_Details`, `Address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$E/A6hgJmv8fm7XOOTML8W.xkQ4YxQ53bSpSD85qLK6q7Ewqc8ML6O', 'img/admin_img_1648204419.jpg', 'admin', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-24 22:32:27', '2022-03-25 05:03:39'),
(2, 'case2', 'case4@gmail.com', NULL, '$2y$10$UQBMQAJ3Ei3or3KWSZoPX.lDaK.t6Auau5mnE2BC2C2ExOuNxO8F.', 'img/admin_img_1648186587.jpg', 'user', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-25 00:06:27'),
(3, 'case3', 'case3@gmail', NULL, '$2y$10$Q.y/IbCtEO.k2lEWKTz/ze/sSa5tBnm39cRar.9g9calkKzyEkyvW', 'img/admin_img_1648186615.jpg', 'user', '0', '0', 'MCA', 'USA', 'Louisiana/Plantation', '2 Years', 'many more things .', 'terracess', NULL, NULL, '2022-03-25 01:41:59'),
(4, 'Geet', 'Geet@gmail.com', NULL, '$2y$10$/dMGpYMQ5A5cNy1vcpu06eegn9za.TIoGZzA7TXtIuYZ3Lg3J70qm', 'img/admin_img_1648186895.jpg', 'user', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-24 23:04:21', '2022-03-25 00:11:35'),
(5, 'mack', 'Mack@gmail.com', NULL, '$2y$10$peeFqkYoZoFbev3SVEsJDe3RQX2vtArjZ5RuHKAwYBtDSZzMd5yPe', 'img/admin_img_1648186672.jpg', 'user', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-24 23:04:41', '2022-03-25 04:26:39'),
(6, 'Nina Mcintire', 'NIna@gmail.com', NULL, '$2y$10$EQKN68.Cs8IzC4kgQthHZ.Kdn1UkKvDxFU4TF/fwWjQZMrGMKQ.C.', 'img/admin_img_1648186716.jpg', 'user', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-24 23:05:02', '2022-03-25 00:08:36'),
(7, 'Rajat', 'Rajat@gmail.com', NULL, '$2y$10$XGWeUImW9GkoE7sGd5m8N.jVNjBqaaIvSRfy47QyWVMZzf4m86Hmu', 'img/admin_img_1648186844.jpg', 'user', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-24 23:59:54', '2022-03-25 02:34:58'),
(8, 'case21', 'case21@gmail.com', NULL, '$2y$10$WWhnpHO0WOg4MCy1m0Giy.AIplikeT6mA1xgsU2U.0wQVqKQoXWh.', 'img/admin_img_1648186864.jpg', 'user', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-25 00:00:12', '2022-03-25 00:11:04'),
(9, 'case22', 'case22@gmail.com', NULL, '$2y$10$XEkKBuYuGr5v.kK6CjGz/OhosQbzCnegecGdOr2VWl62xA6a0qaYG', 'img/admin_img_1648186880.jpg', 'user', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-25 00:00:44', '2022-03-25 00:11:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
