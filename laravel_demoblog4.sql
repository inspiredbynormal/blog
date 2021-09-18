-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2021 at 06:10 AM
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
-- Database: `laravel_demoblog4`
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
(1, 'Plants', 'plants', '16316261546673371394.jpg', 'active', '2021-09-14 07:59:14', '2021-09-14 07:59:14', NULL),
(2, 'Lifestyle', 'lifestyle', '1631626173639642056725.jpg', 'active', '2021-09-14 07:59:33', '2021-09-14 07:59:33', NULL),
(3, 'Food', 'food', '1631626185585963247754.jpg', 'active', '2021-09-14 07:59:45', '2021-09-14 07:59:45', NULL),
(4, 'Interior', 'interior', '163162619731717396512.jpg', 'active', '2021-09-14 07:59:57', '2021-09-14 07:59:57', NULL),
(5, 'Fashion', 'fashion', '1631626208609783028742.jpg', 'active', '2021-09-14 08:00:08', '2021-09-14 08:07:15', NULL),
(6, 'Photography', 'photography', '1631626236517229944140.jpg', 'active', '2021-09-14 08:00:36', '2021-09-14 08:00:36', NULL),
(7, 'Travel', 'travel', '1631626251995205127216.jpg', 'active', '2021-09-14 08:00:51', '2021-09-14 08:00:51', NULL),
(8, 'Art &  Design', 'art-design', '1631626267844555816312.jpg', 'active', '2021-09-14 08:01:07', '2021-09-14 08:01:07', NULL),
(9, 'Cooking', 'cooking', '1631683804241416721457.jpg', 'inactive', '2021-09-15 00:00:04', '2021-09-15 00:07:03', NULL);

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
(1, 'Test comments', 'active', 6, 2, '2021-09-16 02:00:34', '2021-09-16 02:00:34', NULL),
(2, 'Test new Comments', 'active', 1, 2, '2021-09-16 02:03:12', '2021-09-16 02:03:12', NULL);

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
(1, 'Qui et at quo placeat sed.', 'qui-et-at-quo-placeat-sed', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682574867194289740.jpg', 8, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:39:34', NULL),
(2, 'Sit cumque ipsa accusamus in.', 'sit-cumque-ipsa-accusamus-in', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '163168255934293268627.jpg', 7, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:39:19', NULL),
(3, 'Sed maxime et ad quod non.', 'sed-maxime-et-ad-quod-non', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682532668887332350.jpg', 6, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:38:52', NULL),
(4, 'Id et libero earum corrupti.', 'id-et-libero-earum-corrupti', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682521546941847817.jpg', 1, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:38:41', NULL),
(5, 'Quo sint et in dolorem.', 'quo-sint-et-in-dolorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682510862568872501.jpg', 4, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:38:30', NULL),
(6, 'Nam maiores totam natus vero.', 'nam-maiores-totam-natus-vero', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682498208320495203.jpg', 8, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:38:18', NULL),
(7, 'Provident qui sunt molestiae.', 'provident-qui-sunt-molestiae', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682487624806575796.jpg', 3, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:38:07', NULL),
(8, 'Sit rerum quo quo error.', 'sit-rerum-quo-quo-error', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682476735167512182.jpg', 4, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:37:56', NULL),
(9, 'Qui nisi eligendi doloremque.', 'qui-nisi-eligendi-doloremque', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682459333788910071.jpg', 3, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:37:39', NULL);
INSERT INTO `posts` (`id`, `post_title`, `post_slug`, `post_desc`, `post_short_desc`, `post_image`, `category_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Design is more important than technology  in most consumer applications', 'design-is-more-important-than-technology-in-most-consumer-applications', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit. Inventore repellendus dignissimos earum doloribus provident nostrum libero laudantium quisquam! Facere nesciunt molestias excepturi enim distinctio at iste nam, ut, corrupti dicta quos! Cumque assumenda doloremque dolore quas placeat aspernatur reprehenderit at fugit voluptate, accusantium neque ab, perspiciatis debitis doloribus. Quis, accusantium? Ex similique molestiae amet totam voluptas porro atque provident quo sed accusamus! Libero consequuntur sunt quaerat obcaecati perspiciatis tenetur quasi at nulla sint minima quibusdam beatae dolor iste eveniet velit eos inventore, nihil modi dolorum? Omnis maiores placeat tempora nesciunt accusantium nostrum eius vel.\r\n\r\nTempora officiis inventore sequi blanditiis accusamus optio alias, quis nulla repellat est nostrum nobis sunt suscipit, eos repellendus laborum quisquam minima facere maxime quos quo quas quidem consectetur fugit. Expedita debitis dolorum saepe optio aliquid dignissimos sapiente molestiae alias iure. Modi tempore quos doloribus expedita sit natus optio? Quas laboriosam iusto debitis rem consequuntur doloremque quam eligendi, tempora soluta praesentium. Ad optio ab repellendus, accusamus nisi perferendis. Atque, exercitationem repellendus neque nesciunt dolor provident officia quos aliquid laborum quis illum sed numquam labore mollitia nostrum, corporis sint ratione quasi explicabo perferendis sequi maiores nemo? Exercitationem voluptas harum cumque quis enim. Nisi, temporibus vero aliquam corrupti in illum odio illo exercitationem voluptate ab porro dicta autem? Accusantium iste similique in ad, minus velit quo qui modi totam laudantium molestias eos, inventore culpa consequatur facilis voluptas architecto expedita. \r\n\r\nSimilique porro vitae omnis magnam laudantium commodi consequatur. Ea harum optio aliquid corrupti dolore? Corporis rem repudiandae sequi qui laborum. Vero impedit, voluptatem est tempora hic cupiditate ipsum architecto ut. Laborum eum quidem odit blanditiis. Perspiciatis, totam iste dolorem corporis quasi ipsam ducimus earum consequatur nulla quia quos magnam laudantium dolor, necessitatibus debitis animi, explicabo unde repellendus. Dicta, in quidem! Recusandae voluptate eaque, aliquam eius amet suscipit repellat? Tempora saepe laudantium reiciendis enim unde vero maxime molestias, sit mollitia voluptas dolorem ut assumenda porro natus quasi similique culpa optio dolore aliquam. Accusantium suscipit quos, facere quas unde, ab rem consequuntur dolorem ipsum quidem molestias. Explicabo harum tenetur molestiae a perspiciatis totam deleniti quod rerum perferendis maxime reiciendis aspernatur maiores, labore odit temporibus voluptas repellat nihil, tempore cumque suscipit iusto. Doloribus aliquid nostrum omnis. At, sequi pariatur. Amet eius odio animi quam sapiente, illum ad corporis adipisci qui non libero cum, incidunt modi repellat repudiandae aliquam perspiciatis harum dolorem dolor nemo, maiores eos! Aliquid, sapiente quam quis facere error provident voluptate esse perspiciatis magnam aliquam quia ullam quod, explicabo nisi neque quos itaque molestiae consequatur libero sed, quaerat aperiam iure. Provident, dolore. Vero, magni culpa dolores animi quas officia accusamus sequi et obcaecati quidem, minus dolorem veritatis similique, saepe ipsam qui aut necessitatibus facilis! Veniam ipsa odit tempora unde fugit maiores. Voluptatum expedita veniam quaerat, aliquid enim recusandae accusantium. Excepturi dolores impedit soluta hic quos ipsum nostrum sapiente, assumenda iste totam architecto deleniti necessitatibus repudiandae consectetur recusandae tempore, debitis similique exercitationem praesentium eveniet veritatis libero? Dolores illo voluptas voluptates incidunt et blanditiis quas eligendi. Ea recusandae magnam, accusamus repudiandae nobis eaque suscipit quas sed iure reiciendis in optio doloremque iste quia. Delectus saepe tenetur molestiae doloribus in possimus, eius eos, culpa odio tempore minus, recusandae quae. Id dicta iusto fuga ea, enim quibusdam modi quod laudantium repellat necessitatibus quo cupiditate eos distinctio veritatis, eligendi aliquid odit minima, dolorum possimus? Voluptatum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia eligendi, neque dolorem explicabo incidunt voluptatum quis ratione doloremque tenetur autem distinctio! Sunt illo mollitia animi magni qui sed possimus culpa maiores, quisquam praesentium autem dicta? Dicta nisi ipsa ea deserunt quibusdam neque dignissimos. Modi, fugit.', '1631682249934844418226.jpg', 5, 1, 'publish', '2021-09-14 08:09:00', '2021-09-14 23:34:09', NULL);

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
(1, 'Blog Admin', 'blog-admin', 'admin@gmail.com', '2021-09-14 05:42:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, 'active', '3qJzFpAD03', '2021-09-14 05:42:41', '2021-09-14 05:42:41', NULL),
(2, 'Blog Editor', 'blog-editor', 'editor@gmail.com', NULL, '$2y$10$Gt.CtgCbZPkdeAEJ.tVLyOSe1V/bb2ux/bPmOzsD5QLeOLOBJzOhq', 'editor', NULL, 'active', NULL, '2021-09-16 00:27:25', '2021-09-16 00:27:25', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
