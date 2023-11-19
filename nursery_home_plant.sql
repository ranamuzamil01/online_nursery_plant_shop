-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 09:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery_home_plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(22) NOT NULL,
  `category` varchar(250) NOT NULL,
  `original_price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `price`, `user_name`, `email`, `category`, `original_price`, `discount_price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'tre', 55465, '', '', '', 65465, 656, 'product_images/XEqKfgzYQ66SOhjNFSeGqxTnrXK4syVzdGiqQAXo.jpg', '2023-08-25 02:50:14', '2023-08-25 02:50:14'),
(2, 'u', 65, '', '', 'ytu', 5765, 57, 'product_images/fxGdi7lZAH05Nu3WyuQgNL9153oPbCv5wFC0tyEP.jpg', '2023-08-25 03:40:27', '2023-08-25 03:40:27'),
(3, '6ytr', 6546, '', '', 'ytry', 6546, 5, 'product_images/mHH7btBFVUze6cKh3ylquhW2edCOZp2mZgAkU5qD.jpg', '2023-08-25 03:45:04', '2023-08-25 03:45:04'),
(6, 'tre', 55465, 'umair', 'umair@gmail.com', 'ytryu', 65465, 656, 'product_images/XEqKfgzYQ66SOhjNFSeGqxTnrXK4syVzdGiqQAXo.jpg', '2023-08-25 04:11:45', '2023-08-25 04:11:45'),
(7, 'u', 65, 'umair', 'umair@gmail.com', 'Inside Plant', 5765, 57, 'product_images/fxGdi7lZAH05Nu3WyuQgNL9153oPbCv5wFC0tyEP.jpg', '2023-08-25 11:42:59', '2023-08-25 11:42:59'),
(8, 'u', 65, 'dani', 'dani@gmail.com', 'Inside Plant', 5765, 57, 'product_images/fxGdi7lZAH05Nu3WyuQgNL9153oPbCv5wFC0tyEP.jpg', '2023-08-28 01:53:12', '2023-08-28 01:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `image`, `created_at`, `updated_at`) VALUES
(8, 'flower2', '1693141900.jpg', '2023-08-27 08:11:40', '2023-08-27 08:11:40'),
(9, 'Outsider Plant', '1693142381.jpg', '2023-08-27 08:19:41', '2023-08-27 08:19:41'),
(10, 'Inside Plant', '1693142448.jpg', '2023-08-27 08:20:48', '2023-08-27 08:20:48'),
(11, 'Fruit Plant', '1693142469.jpg', '2023-08-27 08:21:09', '2023-08-27 08:21:09'),
(12, 'Green Plants', '1693142488.jpg', '2023-08-27 08:21:28', '2023-08-27 08:21:28'),
(13, 'Plants', '1693142514.jpg', '2023-08-27 08:21:54', '2023-08-27 08:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `name` varchar(20) NOT NULL,
  `product_id` int(22) NOT NULL,
  `auth_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_16_150204_create_products_table', 1),
(7, '2023_08_17_085831_add_column_to_products_table', 1),
(8, '2023_08_17_112301_create_categories_table', 1),
(9, '2023_08_17_135719_add_column_to_categories_table', 1),
(10, '2023_08_25_070927_create_carts_table', 2),
(11, '2023_08_26_145802_create_subcribers_table', 3),
(12, '2023_08_27_123407_create_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rate` decimal(3,1) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `favorite` int(20) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `rate`, `discount_price`, `original_price`, `quantity`, `favorite`, `tags`, `image`, `created_at`, `updated_at`) VALUES
(1, 'u', 'Inside Plant', 'y', 65.00, 4.0, 57.00, 5765.00, 75, 0, '7', 'product_images/fxGdi7lZAH05Nu3WyuQgNL9153oPbCv5wFC0tyEP.jpg', '2023-08-20 22:16:31', '2023-08-25 12:25:59'),
(2, 'tre', 'ytryu', 'try', 55465.00, 2.0, 656.00, 65465.00, 65, 1, '54', 'product_images/XEqKfgzYQ66SOhjNFSeGqxTnrXK4syVzdGiqQAXo.jpg', '2023-08-20 22:19:20', '2023-08-25 12:25:55'),
(3, '6ytr', 'ytry', 'tr', 6546.00, 4.0, 5.00, 6546.00, 5476, 1, '5476', 'product_images/mHH7btBFVUze6cKh3ylquhW2edCOZp2mZgAkU5qD.jpg', '2023-08-20 22:19:37', '2023-08-28 01:54:35'),
(4, '44ttrytr', 'Green Plants', 'yr', 654.00, 1.1, 5454.00, 674.00, 6546646, 1, '46', 'product_images/POTTwoSMZP3SNQOHOw3tOXJJ61AJ8mj2bB0E3wAb.jpg', '2023-08-20 22:20:00', '2023-08-20 22:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'umair@gmail.com', '2023-08-26 09:59:48', '2023-08-26 09:59:48'),
(2, 'umair@gmail.com', '2023-08-26 10:00:12', '2023-08-26 10:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `phone` int(30) NOT NULL,
  `image` varchar(22) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rana G', 'muhammadmuzamil0301@gmail.com', NULL, 0, NULL, NULL, '$2y$10$Qm54ytIGMEILj4NknaDBdOMdlp9NMGE9kM1ZJ6IxHEQvffPb26NrC', NULL, '2023-08-20 20:18:44', '2023-08-20 20:18:44'),
(3, 'umair', 'umair@gmail.com', NULL, 0, NULL, NULL, '$2y$10$cMMsUn9vljGyDMXsQy247.8tR7fyCxJevIWVBOF3WeCdxR3D.Dz92', NULL, '2023-08-24 22:46:20', '2023-08-24 22:46:20'),
(4, 'admin', 'admin@gmail.com', NULL, 0, NULL, NULL, '$2y$10$VPtVSQoK1mWnNCAUIlP/iOpg/Fc2Ed0neAnVDXrktOj0BAo3dlXSG', NULL, '2023-08-25 07:18:46', '2023-08-25 07:18:46'),
(5, 'dani', 'dani@gmail.com', 'admin', 301123433, NULL, NULL, '$2y$10$abINMwr8b7sT10YVzIkJXuyEdiUHp0Y02P48mpP73WFvacG41Ac5e', NULL, '2023-08-25 07:54:05', '2023-08-25 07:54:05'),
(6, 'muzamil', 'muzamil@gmail.com', NULL, 123224535, NULL, NULL, '$2y$10$nIHA93.CjCClkRR/NehvX.3e.yBXNDntao1pbwnXDhgIARdCbBdmK', NULL, '2023-08-28 02:00:59', '2023-08-28 02:00:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_categories_unique` (`categories`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
