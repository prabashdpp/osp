-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 11:04 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_09_25_123303_create_replies_table', 1),
(6, '2020_09_25_123241_create_tickets_table', 2);

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
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `ticket_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'issue has fixed', '2020-09-26 01:54:17', '2020-09-26 01:54:17'),
(2, 4, 1, 'tested no issues', '2020-09-26 03:05:16', '2020-09-26 03:05:16'),
(3, 8, 0, 'jhgjgj', '2020-09-26 03:07:42', '2020-09-26 03:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `ticket_id`, `title`, `email`, `phone_no`, `fname`, `lname`, `message`, `status`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, '96813K091228752', 'tv issue', 'prabashdptwo@gmail.com', '0714055088', 'prabash', 'perera', 'ghhgfhghghgfh', 'Closed', 1, '2020-09-26 01:53:26', '2020-09-26 01:57:55'),
(2, 1, 'I72533756685826', 'tv issue again', 'prabashdptwo@gmail.com', '0714055088', 'prabash', 'perera', 'jjghjghj', 'Closed', 1, '2020-09-26 01:54:52', '2020-09-26 03:29:17'),
(3, 0, 'V02983878303335', 'vhjhg', 'prabash2@gmail.com', '07140550889', 'prabash', 'perera', 'hjhgjgh', 'Open', 0, '2020-09-26 01:55:07', '2020-09-26 01:55:07'),
(4, 1, '867758D02303859', 'broadband issue', 'milan.lakshita@gmail.com', '0714055088', 'milan', 'pererahg', 'jhgjghjgh', 'Open', 0, '2020-09-26 01:55:50', '2020-09-26 03:05:00'),
(5, 2, '816342P50421932', 'broadband issue again', 'admin@admin.com', '07140550889', 'prabash', 'silva', 'jgjjghj', 'Open', 1, '2020-09-26 01:56:12', '2020-09-26 03:28:37'),
(6, 1, '97481770043M902', 'broadband issue', 'prabashdptwo@gmail.com', '0714055088', 'milan', 'perera', 'hjhgjghj', 'Closed', 0, '2020-09-26 01:56:28', '2020-09-26 01:59:36'),
(7, 1, '40428938L512943', 'khkhk', 'admin@admin.com', '07140550889', 'prabash', 'pererahg', 'jkjhk', 'Open', 0, '2020-09-26 01:56:43', '2020-09-26 01:59:09');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'prabash', 'prabashdptwo@gmail.com', NULL, '$2y$10$FnptuGknktBQHc4yBptQFOxBfKX4DiHXitjBQ297Dgbjp2FX8sPy.', NULL, '2020-09-26 03:27:24', '2020-09-26 03:27:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
