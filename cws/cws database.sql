-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cws`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_description`, `created_at`, `updated_at`) VALUES
(1, 'computer', 'ksdkls', '2024-03-01 12:34:58', '2024-03-01 12:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `discount_fees` varchar(255) NOT NULL,
  `lang` enum('en','hi') NOT NULL DEFAULT 'hi',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `duration`, `instructor`, `fees`, `discount_fees`, `lang`, `category_id`, `featured_image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'C++', '4 Week', 'Sadiq Hussain', '3000', '2500', 'en', 1, '1709390352.jpg', 'afdjjdlj;', '2024-03-02 09:09:12', '2024-03-02 09:09:12'),
(3, 'Python', '8 Week', 'Sadiq Hussain', '5500', '4000', 'en', 1, '1709390676.jpg', ';adjl;dd', '2024-03-02 09:14:36', '2024-03-02 09:14:36'),
(4, 'JavaScript', '8 Week', 'Sadiq Hussain', '6000', '4500', 'en', 1, '1709390765.jpg', 'adsd', '2024-03-02 09:16:05', '2024-03-02 09:16:05'),
(5, 'C', '8 Week', 'Sadiq Hussain', '2000', '1500', 'en', 1, '1709390877.jpg', 'afadad', '2024-03-02 09:17:57', '2024-03-02 09:17:57');

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
-- Table structure for table `hall_frames`
--

CREATE TABLE `hall_frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_frames`
--

INSERT INTO `hall_frames` (`id`, `name`, `position`, `industry`, `featured_image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Siddharth ', 'Senior developer', 'google', '1709409259.jpg', 'aklsddlaljkdflafdddd', '2024-03-02 14:24:20', '2024-03-02 14:24:20'),
(2, 'Rishav Raj', 'Senior developer', 'microsoft', '1709409299.jpg', 'aladkdl;kkldafskldlkd', '2024-03-02 14:24:59', '2024-03-02 14:24:59'),
(3, 'Saurabh Yadav', 'Senior developer', 'amazon', '1709409329.jpg', 'andnkalkkd', '2024-03-02 14:25:29', '2024-03-02 14:25:29'),
(4, 'Roni Sah', 'Senior developer', 'Jio', '1709409363.jpg', 'adlkaka lkadlka', '2024-03-02 14:26:03', '2024-03-02 14:26:03'),
(5, 'Rishav Raj', 'Senior developer', 'microsoft', '1709409377.jpg', 'adlk;da', '2024-03-02 14:26:17', '2024-03-02 14:26:17'),
(6, 'Siddharth ', 'Senior developer', 'microsoft', '1709409398.jpg', 'al;kdoia;lk; alkdl', '2024-03-02 14:26:38', '2024-03-02 14:26:38');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_03_01_105443_create_categories_table', 1),
(13, '2024_03_01_105528_create_courses_table', 1),
(14, '2024_03_01_134647_create_recent_projects_table', 1),
(15, '2024_03_02_064016_create_hall_frames_table', 2);

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
-- Table structure for table `recent_projects`
--

CREATE TABLE `recent_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_projects`
--

INSERT INTO `recent_projects` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'pro name ', 'saurav hjhjhhlkhhjjhj', '2024-03-01 12:24:53', '2024-03-01 12:30:54'),
(3, 'project name', 'dsd', '2024-03-01 12:25:00', '2024-03-01 12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'password',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Light yagami', 'sinigami@gmail.com', NULL, 1, NULL, '$2y$12$gL/I.vD5js1hfeTgwdtl4.qpa6ab.lCu/BXEsAfMtZ2wu2DWJf8i.', NULL, '2024-03-01 12:52:29', '2024-03-01 12:52:29'),
(2, 'Siddharth', 'sidsundram@gmail.com', NULL, 0, NULL, '$2y$12$8tmrkRvqqrOAiMLRJEPPF.zt8m7jgkIDRltjmiIhBJPAIubi0A.a6', NULL, '2024-03-02 01:43:18', '2024-03-02 01:43:18'),
(3, 'siddharth', 'siddha@gmail.com', NULL, 0, NULL, '$2y$12$L9xfDYu2Rcm80YZJH1S4Oehn/sithwoRFEVwBvVd66tkf67Pjo0qG', NULL, '2024-03-02 07:25:20', '2024-03-02 07:25:20'),
(4, 'Siddharth Sundaram', 's@gmail.com', '1234566789', 0, NULL, '$2y$12$YTtT4TYPfZUzcdr4tcK5JuFKEsaLD90p.LI4t86dTNHPR.IOW.FCC', NULL, '2024-03-02 08:37:28', '2024-03-02 08:37:28'),
(5, 'Siddharth Sundaram', 's1@gmail.com', NULL, 0, NULL, '$2y$12$6/t.9tOV41uzV.qMOkktT.6ixPNGYtGfG3/ziwZj/rK42GAts94OS', NULL, '2024-03-02 08:53:32', '2024-03-02 08:53:32'),
(6, 'sid', 's12@gmail.com', NULL, 0, NULL, '$2y$12$Svu.j0Ctja8AmVRXtPZa1.DydydW7.P0HqX5/Lkk18IV41e2YOPa6', NULL, '2024-03-02 13:11:05', '2024-03-02 13:11:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hall_frames`
--
ALTER TABLE `hall_frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `recent_projects`
--
ALTER TABLE `recent_projects`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hall_frames`
--
ALTER TABLE `hall_frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_projects`
--
ALTER TABLE `recent_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
