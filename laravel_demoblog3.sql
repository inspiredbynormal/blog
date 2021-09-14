-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2021 at 02:20 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_demoblog3`
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
(1, 'Technology', 'technology', '1631353382418821495118.jpg', 'active', '2021-09-11 03:25:56', '2021-09-11 04:13:02', NULL),
(2, 'Marketing', 'marketing', '1631353411998417484372.jpg', 'active', '2021-09-11 03:26:13', '2021-09-11 04:13:31', NULL),
(3, 'Travel', 'travel', '1631353392663174730012.jpg', 'active', '2021-09-11 03:26:25', '2021-09-11 04:13:12', NULL),
(4, 'Food', 'food', '163135397853869742467.jpg', 'active', '2021-09-11 03:26:35', '2021-09-11 04:22:58', NULL),
(5, 'Design', 'design', '163135418298418891672.jpg', 'active', '2021-09-11 03:26:48', '2021-09-11 04:26:22', NULL),
(6, 'Health', 'health', '1631353325119158774097.jpg', 'active', '2021-09-11 03:33:11', '2021-09-11 04:12:05', NULL);

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
(1, 'Test Comment It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged.', 'active', 4, 2, '2021-09-13 01:03:34', '2021-09-13 01:03:34', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_31_144604_create_categories_table', 1),
(6, '2021_09_01_102924_create_posts_table', 1),
(7, '2021_09_03_064705_create_comments_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_short_desc` text COLLATE utf8mb4_unicode_ci,
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
(1, 'Make your store stand out from the others by converting more shoppers into buyers!', 'make-your-store-stand-out-from-the-others-by-converting-more-shoppers-into-buyers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631351110108423534959.jpg', 6, 1, 'publish', '2021-09-11 03:35:10', '2021-09-11 03:35:10', NULL),
(2, 'All of these amazing features come at an affordable price!', 'all-of-these-amazing-features-come-at-an-affordable-price', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631351247575245311560.jpg', 2, 1, 'publish', '2021-09-11 03:37:27', '2021-09-11 03:37:27', NULL),
(3, 'Hic soluta animi nulla.', 'hic-soluta-animi-nulla', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358845309794066309.jpg', 1, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:44:05', NULL),
(4, 'Provident et totam qui.', 'provident-et-totam-qui', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358835807516332844.jpg', 1, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:55', NULL),
(5, 'Provident dicta amet magnam.', 'provident-dicta-amet-magnam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358820888981923323.jpg', 4, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:40', NULL),
(6, 'Suscipit sint qui a id vero.', 'suscipit-sint-qui-a-id-vero', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358812994131883208.jpg', 5, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:32', NULL),
(7, 'Ex magnam provident sequi.', 'ex-magnam-provident-sequi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358802524088237597.jpg', 3, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:22', NULL),
(8, 'Culpa dolor quo quis.', 'culpa-dolor-quo-quis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358794686486356381.jpg', 3, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:14', NULL),
(9, 'Recusandae et vero iure.', 'recusandae-et-vero-iure', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358786173332573070.jpg', 4, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:43:06', NULL),
(10, 'Sit nobis et ratione rem.', 'sit-nobis-et-ratione-rem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358779283322648093.jpg', 4, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:42:59', NULL),
(11, 'Architecto aut ut odit et.', 'architecto-aut-ut-odit-et', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358770445388072337.jpg', 1, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:42:50', NULL),
(12, 'Sapiente qui ut ex sed omnis.', 'sapiente-qui-ut-ex-sed-omnis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '163135867459216821420.jpg', 1, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:41:14', NULL),
(13, 'Eum quam qui exercitationem.', 'eum-quam-qui-exercitationem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '163135866567418917362.jpg', 4, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:41:05', NULL),
(14, 'Quaerat id magnam et et.', 'quaerat-id-magnam-et-et', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indu stry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scramb led it to make a type specimen book.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown printer took a galley of type and scrambled it to make a type specimen book. It has and survived not only five centuries, but also the leap into electronic typesetting, remaining essentially and unchanged. It was popularsed in the 1960 with release containing Lorem Ipsum passages desktop publishing software.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when anden unknown', '1631358658780284325326.jpg', 6, 1, 'publish', '2021-09-11 05:38:23', '2021-09-11 05:40:58', NULL),
(15, 'Service workers now have another thankless job: Checking vaccine statuses', 'service-workers-now-have-another-thankless-job-checking-vaccine-statuses', 'As the delta variant prolongs the Covid-19 pandemic, three major US cities — San Francisco, New Orleans, and New York City — have started rolling out vaccine requirements for anyone visiting indoor public spaces like restaurants, cinemas, and gyms. And other localities may soon follow suit: Honolulu will institute a vaccine passport system this month (patrons can also submit a recent negative Covid-19 test), while the Los Angeles City Council is considering a similar program. But these new proof of vaccination rules are already creating new problems for venues and workers, who have largely been left on their own to figure out how to enforce the requirements and how to respond when angry customers push back.\r\n\r\nIt all fits into the bigger pattern of how the United States has handled the pandemic. The US rollout of different vaccination and mask requirements has been patchwork. The White House has said it will not establish a national vaccine passport system, meaning that states, cities, and even private companies have built their own versions of vaccine passport apps (while some states, like Florida, have banned vaccine passports entirely). This checkered approach means that despite the wide availability of vaccine record apps, the only standardized way in the US to prove your vaccination status is the flimsy and easy-to-lose paper card with the CDC insignia that doesn’t quite fit in the average person’s wallet.\r\n\r\n“A guy came in here and told the bartender, ‘I wanna see your hepatitis and your AIDS vaccine,’” Candace Hutchinson, a manager at Beachcorner Bar and Grill in New Orleans who often greets customers, told Recode. Business has been down at least a quarter since the New Orleans indoor vaccine mandate went into effect on August 16, another Beachcorner manager, Gina Perrett, told Recode, and some customers are rebelling. One customer recently threw a drink in an employee’s face over the new rules.\r\n\r\nOne effect of these vaccine rules is that they seem to be incentivizing some people to get the vaccine. Last month, 99 attendees at a New Orleans Saints game got vaccinated on-site just so they could enter the arena. In some regions in Italy, vaccination rates surged as high as 200 percent after the country instituted its national Green Pass system, which requires that people present proof of vaccination to enter indoor venues like restaurants and museums, using either a digital or paper version of their vaccine record. And France, which recently began requiring proof of vaccination for indoor and outdoor dining, domestic flights, and other indoor activities, has seen a similar boost in vaccinations.', 'Several US cities have instituted vaccine passport systems for indoor dining.', '1631515895221419242717.jpg', 1, 2, 'publish', '2021-09-13 01:21:35', '2021-09-13 01:21:42', NULL);

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
(1, 'Amal Jana', 'amal-jana', 'amal@smsolutions.in', NULL, '$2y$10$uEzSh.69Lk2ogryiPKaXP.zIlGVWd2Lc9/ZMvUtgTEb4M9nZc6Tny', 'admin', '1631367057471839900818.png', 'active', NULL, '2021-09-11 02:01:03', '2021-09-11 08:00:57', NULL),
(2, 'Amit Kr. Saha', 'amit-kr-saha', 'amitsaha.sm@gmail.com', NULL, '$2y$10$IEWjjeF60IlN0XWy13or8OQqqwlLcqD9QLv1dn5A2imPgOGNH5HyS', 'editor', NULL, 'active', NULL, '2021-09-13 00:45:29', '2021-09-13 00:45:29', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
