-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2021 at 05:16 AM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appssmso_demobLog21`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Javascript', 'javascript', '1630742355595324824020.png', 'active', '2021-09-04 11:45:53', '2021-09-04 11:59:15', NULL),
(2, 'Node JS', 'node-js', '1630742487924957075888.png', 'active', '2021-09-04 12:01:27', '2021-09-04 12:01:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_msg`, `status`, `post_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sample response', 'active', 2, 1, '2021-09-04 12:17:11', '2021-09-04 12:17:11', NULL),
(2, 'node is good 12', 'active', 2, 2, '2021-09-04 12:21:40', '2021-09-04 12:22:06', NULL),
(3, 'nice', 'active', 1, 2, '2021-09-04 12:22:38', '2021-09-04 12:22:38', NULL);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_08_31_144604_create_categories_table', 1),
(9, '2021_09_01_102924_create_posts_table', 1),
(10, '2021_09_03_064705_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('publish','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_slug`, `post_desc`, `post_short_desc`, `post_image`, `category_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '10 Top JavaScript Blogs to Improve Coding Skills', '10-top-javascript-blogs-to-improve-coding-skills', 'I old enough to remember when we thought XML was going to change the programming world...then JSON saved us from that hell. Parsing and querying JSON data is fundamental task we\'ve all coded for, but sometimes I just want to get some data locally with minimal fuss. I just learned of a really awesome library to do so: jq. Let\'s have a look at some cool things we can do with jq! \r\n\r\nCSS and JavaScript:  the lines seemingly get blurred by each browser release.  They have always done a very different job but in the end they are both front-end technologies so they need do need to work closely.  We have our .js files and our .css, but that doesn\'t mean that CSS and JS can\'t interact more closely than the basic JavaScript frameworks will allow.  Here are five ways that JavaScript and CSS work together that you may not know about!', 'I old enough to remember when we thought XML was going to change the programming world...then JSON saved us from that hell. Parsing and querying JSON data is fundamental task we\'ve all coded for', '1630742153161325751854.jpg', 1, 1, 'publish', '2021-09-04 11:55:53', '2021-09-04 11:55:53', NULL),
(2, 'CPU Profiles as a Diagnostics tool in Node.js', 'cpu-profiles-as-a-diagnostics-tool-in-nodejs', 'With Node.js applications and services, spotting the performance bottlenecks in your applications is deciding to take real advantage of the speed and reliability that Node.js has to offer.\r\n\r\nA CPU profile is a way to understand how your application is executed, what functions devour what percent of CPU time, and provides enough information for a more precise application diagnostic.\r\n\r\nNode.js provides a way to run a CPU profile, but it is important to consider the cost of profiling your application (at the time of this blogpost publish date). The CPU profile option in Node.js will profile the application from the startup until the process exits, which is an experimental feature and not recommended in production environments.\r\n\r\nN|Solid runtime is a production-ready drop-in alternative to Node.js. With N|Solid, organizations are not obligated to the profiling tools limitations of Node.js runtime. N|Solid can start and stop a CPU profile on-demand or programmatically with various instruments like command-line tools, custom views, JavaScript API, or C++ API. After that said, the performance hit of taking CPU profiles in N|Solid is a lot cheaper than in Node.js or any other traditional APM.\r\n\r\nA pretty usual and not healthy pattern in Node.js is the callback hell. In the image shown down below, we ran a CPU profile using N|Solid in a simple application that uses recursion to simulate a callback hell (the recreation of an appreciable call stack tower is complicated, and it does represent the opposite of our Node.js code ideals here at NodeSource).', 'With Node.js applications and services, spotting the performance bottlenecks in your applications is deciding to take real advantage of the speed and reliability that Node.js has to offer.', '1630742594305693377562.png', 2, 1, 'publish', '2021-09-04 12:03:14', '2021-09-04 12:03:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin User', 'admin-user', 'admin@gmail.com', NULL, '$2y$10$ksFUezJ9NcOyWBA5fd8AsOcLSCNSiuTEYnFdKmZZ/f9lpaoCBfkEq', 'admin', '1630742628775566433381.jpg', 'active', NULL, '2021-09-04 01:58:54', '2021-09-04 12:03:48', NULL),
(2, 'amit kumar saha', 'amit-kumar-saha', 'amitsaha.sm@gmail.com', NULL, '$2y$10$s0gTfEEsIyOOEGmvghGFh.teYU5LRCmDV2IA108Tnz.x1NhQyhCYO', 'editor', NULL, 'active', NULL, '2021-09-04 12:20:34', '2021-09-04 12:20:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
