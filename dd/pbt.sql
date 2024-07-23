-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 04:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(1) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Fees', '2024-07-23 06:15:58.000000', '2024-07-23 14:19:15.611229'),
(2, 'Food', '2024-07-23 06:19:36.000000', '2024-07-23 14:19:19.190159'),
(3, 'Transportation', '2024-07-23 06:20:11.000000', '2024-07-23 14:19:22.854111'),
(4, 'Entertainment', '2024-07-23 06:20:27.000000', '2024-07-23 14:19:26.520157');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(1) NOT NULL,
  `user_id` int(15) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(150) NOT NULL,
  `category` int(15) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `amount`, `date`, `type`, `category`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '10000', '2024-07-23', 'income', 2, 'add Transportation Income.', '2024-07-23 04:30:17.000000', '2024-07-23 06:58:00.000000'),
(2, 1, '10000', '2024-07-23', 'income', 1, 'add food income.', '2024-07-23 04:31:22.000000', '2024-07-23 04:31:22.000000'),
(4, 1, '20000', '2024-07-23', 'income', 3, 'Add Transportation Income.', '2024-07-23 07:08:57.000000', '2024-07-23 07:08:57.000000'),
(5, 1, '30000', '2024-07-23', 'income', 4, 'Add Entertainment Income.', '2024-07-23 07:09:39.000000', '2024-07-23 07:09:39.000000'),
(6, 1, '5000', '2024-07-23', 'expense', 1, 'Add Fees Expense.', '2024-07-23 07:11:10.000000', '2024-07-23 07:12:26.000000'),
(7, 1, '3000', '2024-07-23', 'expense', 3, 'Add Transportation Expense.', '2024-07-23 07:12:04.000000', '2024-07-23 07:12:04.000000'),
(8, 1, '2000', '2024-07-23', 'expense', 2, 'Add Expense Food.', '2024-07-23 07:14:33.000000', '2024-07-23 07:14:33.000000'),
(9, 2, '10000', '2024-07-23', 'income', 2, 'ad income to food.', '2024-07-23 08:41:17.000000', '2024-07-23 08:41:17.000000'),
(10, 2, '20000', '2024-07-23', 'income', 3, 'ad income to transportation.', '2024-07-23 08:41:57.000000', '2024-07-23 08:41:57.000000'),
(11, 2, '40000', '2024-07-23', 'income', 4, 'add income entertainment.', '2024-07-23 08:42:38.000000', '2024-07-23 08:42:38.000000'),
(12, 2, '2000', '2024-07-23', 'expense', 1, 'add expense to fees.', '2024-07-23 08:44:39.000000', '2024-07-23 08:44:39.000000'),
(13, 2, '5000', '2024-07-23', 'expense', 3, 'add expense to transportation.', '2024-07-23 08:45:44.000000', '2024-07-23 08:45:44.000000');

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
(1, 'Ankit', 'ankit@gmail.com', NULL, '$2y$10$304Kg.97DKSqIrV0A8I1TOzpWtrulnGDs5b9iBCN4Ui46UUIe7rAm', 'fQ63WQFqXeLiJaQtc5iv7lpIfnEYa5kospkjeJf09K9KtOBfnWQ0Hca8lez8', '2024-07-23 02:03:33', '2024-07-23 02:03:33'),
(2, 'Hemant', 'hk@gmail.com', NULL, '$2y$10$qfpgQ3vCcFYfx3l.qStyGuIYfV09kph5VcyFw2RcDu12EtWIpL6d.', 'tgbW7jZB9nhR8UHRyMA3IkDICT5SdlugQvbwszHB', '2024-07-23 08:36:00', '2024-07-23 08:36:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
