-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 10:26 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheypoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'موبایل و تبلت', 0, '2018-03-16 04:38:36', '2018-03-16 04:38:36'),
(2, 'موبایل', 1, '2018-03-16 04:39:08', '2018-03-16 04:39:08'),
(3, 'لوازم موبایل', 1, '2018-03-16 04:39:21', '2018-03-16 04:39:21'),
(4, 'لوازم الکترونیکی', 0, '2018-03-16 04:39:36', '2018-03-16 04:39:36'),
(5, 'لپ تاپ و کامپیوتر', 4, '2018-03-16 04:39:56', '2018-03-16 04:39:56'),
(6, 'صوتی و تصویری', 4, '2018-03-16 04:41:10', '2018-03-16 04:41:10'),
(7, 'وسایل نقلیه', 0, '2018-03-16 04:41:27', '2018-03-16 04:41:27'),
(8, 'خودرو', 7, '2018-03-16 04:41:41', '2018-03-16 04:41:41'),
(9, 'موتور سیکلت', 7, '2018-03-16 04:41:53', '2018-03-16 04:41:53'),
(10, 'لوازم خانگی', 0, '2018-03-16 04:42:07', '2018-03-16 04:42:07'),
(11, 'مبلمان', 10, '2018-03-16 04:42:21', '2018-03-16 04:42:21'),
(12, 'وسایل برقی خانه', 10, '2018-03-16 04:42:32', '2018-03-16 04:42:32'),
(13, 'لوازم شخصی', 0, '2018-03-16 04:42:51', '2018-03-16 04:42:51'),
(14, 'لباس', 13, '2018-03-16 04:43:00', '2018-03-16 04:43:00'),
(15, 'کیف و کفش', 13, '2018-03-16 04:43:11', '2018-03-16 04:43:11'),
(16, 'املاک', 0, '2018-03-16 04:43:24', '2018-03-16 04:43:24'),
(17, 'فروش مسکونی', 16, '2018-03-16 04:43:35', '2018-03-16 04:43:35'),
(18, 'رهن و اجاره', 16, '2018-03-16 04:43:48', '2018-03-16 04:43:48'),
(19, 'خدمات', 0, '2018-03-16 04:43:59', '2018-03-16 04:43:59'),
(20, 'آموزش', 19, '2018-03-16 04:44:09', '2018-03-16 04:44:09'),
(21, 'کسب و کار', 0, '2018-03-16 04:44:20', '2018-03-16 04:44:20'),
(22, 'کارگر ساده', 21, '2018-03-16 04:44:33', '2018-03-16 04:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `cat_posts`
--

CREATE TABLE `cat_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_posts`
--

INSERT INTO `cat_posts` (`id`, `post_id`, `cat_id`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '2', '1'),
(4, '2', '2'),
(5, '3', '4'),
(6, '3', '6');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2018_03_07_144438_create_categories_table', 1),
(29, '2018_03_11_104929_create_posts_table', 1),
(30, '2018_03_14_110623_create_cat_posts_table', 1),
(31, '2018_03_15_162400_add_role_id_into_users_table', 1),
(32, '2018_03_15_162522_create_roles_table', 1),
(33, '2018_03_16_080026_create_favorites_table', 1),
(34, '2018_03_16_102307_add_user_id_into_post', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amin66.karimi@gmail.com', '$2y$10$BZYDPGcW/1qM3NyXAaDizeNJCRTkgh7ruKvKYLCX4h/s0mxOd9E/6', '2018-03-16 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `desc`, `img`, `price`, `phone_number`, `address`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'S7 edge مشکی دوسیم', '<p>تتت</p>', '1521188172.jpg', 2800000, '098765456', 'تت', '2018-02-16 04:46:12', '2018-03-16 04:46:12', '2'),
(2, 'redmi note4x 32GB/RAM3', '<p>تتن</p>', '1521188208.jpg', 7777, '776776', 'تت', '2018-03-16 04:46:48', '2018-03-16 04:46:48', '2'),
(3, 'xbox one 1tr full', '<p>دد</p>', '1521188259.jpg', 700000, '098767867', 'دد', '2018-03-16 04:47:39', '2018-03-16 04:47:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'ادمین', 'admin@gmail.com', '$2y$10$k7h1SQosvwkb9Ejsdt9Pn.j/krDTBlaOLdQu4Oomk1CP7nUl6BnxS', 'tNdAyZRuqNa41M95u7e7AjDQLI2irq9JnVCFoWNJwjI0FmTntkKOUqeVN9Xy', '2018-03-16 04:37:06', '2018-03-16 04:37:06', '1'),
(2, 'امین', 'amin66.karimi@gmail.com', '$2y$10$cNI7YDY/efF6.ycP3tjGEOPC4DjzmscZCqPUYCSWQmXsPif3WQUC.', 'M7OGuvwmJRsPLRL5zfZv0iqR4G2MyP0kX67C0OHZYIbFwzIHe7x9IgjjBV21', '2018-03-16 04:48:51', '2018-03-16 04:48:51', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_posts`
--
ALTER TABLE `cat_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_post_id_unique` (`post_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cat_posts`
--
ALTER TABLE `cat_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
