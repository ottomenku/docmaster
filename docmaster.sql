-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 11. 03:25
-- Kiszolgáló verziója: 10.3.16-MariaDB
-- PHP verzió: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `docmaster`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 1, 'App\\Roletime', NULL, NULL, '[]', '2019-07-29 14:22:18', '2019-07-29 14:22:18'),
(2, 'default', 'created', 2, 'App\\Roletime', NULL, NULL, '[]', '2019-07-29 14:23:16', '2019-07-29 14:23:16'),
(3, 'default', 'created', 3, 'App\\Roletime', NULL, NULL, '[]', '2019-07-29 14:24:18', '2019-07-29 14:24:18'),
(4, 'default', 'created', 4, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 12:52:47', '2019-07-30 12:52:47'),
(5, 'default', 'created', 5, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 12:53:11', '2019-07-30 12:53:11'),
(6, 'default', 'created', 6, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:28:27', '2019-07-30 13:28:27'),
(7, 'default', 'created', 7, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:30:39', '2019-07-30 13:30:39'),
(8, 'default', 'created', 8, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:36:32', '2019-07-30 13:36:32'),
(9, 'default', 'created', 9, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:36:32', '2019-07-30 13:36:32'),
(10, 'default', 'created', 10, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:39:49', '2019-07-30 13:39:49'),
(11, 'default', 'created', 11, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 13:39:49', '2019-07-30 13:39:49'),
(12, 'default', 'created', 12, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:04:00', '2019-07-30 14:04:00'),
(13, 'default', 'created', 13, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:04:00', '2019-07-30 14:04:00'),
(14, 'default', 'created', 14, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:04:00', '2019-07-30 14:04:00'),
(15, 'default', 'created', 15, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:05:53', '2019-07-30 14:05:53'),
(16, 'default', 'created', 16, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:05:53', '2019-07-30 14:05:53'),
(17, 'default', 'created', 17, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:05:53', '2019-07-30 14:05:53'),
(18, 'default', 'created', 18, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:07:11', '2019-07-30 14:07:11'),
(19, 'default', 'created', 19, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:07:11', '2019-07-30 14:07:11'),
(20, 'default', 'created', 20, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:07:11', '2019-07-30 14:07:11'),
(21, 'default', 'created', 21, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:09:10', '2019-07-30 14:09:10'),
(22, 'default', 'created', 22, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:09:10', '2019-07-30 14:09:10'),
(23, 'default', 'created', 23, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:09:10', '2019-07-30 14:09:10'),
(24, 'default', 'created', 24, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:21:38', '2019-07-30 14:21:38'),
(25, 'default', 'created', 25, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:21:38', '2019-07-30 14:21:38'),
(26, 'default', 'created', 26, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:21:58', '2019-07-30 14:21:58'),
(27, 'default', 'created', 27, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:21:58', '2019-07-30 14:21:58'),
(28, 'default', 'created', 28, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:23:38', '2019-07-30 14:23:38'),
(29, 'default', 'created', 29, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:23:38', '2019-07-30 14:23:38'),
(30, 'default', 'created', 30, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:24:49', '2019-07-30 14:24:49'),
(31, 'default', 'created', 31, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:24:49', '2019-07-30 14:24:49'),
(32, 'default', 'created', 32, 'App\\Roletime', NULL, NULL, '[]', '2019-07-30 14:24:49', '2019-07-30 14:24:49'),
(33, 'default', 'App\\Doc model has been created', 1, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:35:56', '2019-07-31 10:35:56'),
(34, 'default', 'App\\Doc model has been created', 2, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:35:56', '2019-07-31 10:35:56'),
(35, 'default', 'App\\Doc model has been created', 3, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:40:43', '2019-07-31 10:40:43'),
(36, 'default', 'App\\Doc model has been created', 4, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:40:43', '2019-07-31 10:40:43'),
(37, 'default', 'App\\Doc model has been created', 5, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:45:47', '2019-07-31 10:45:47'),
(38, 'default', 'App\\Doc model has been created', 6, 'App\\Doc', 1, 'App\\User', '[]', '2019-07-31 10:53:14', '2019-07-31 10:53:14'),
(39, 'default', 'App\\Category model has been created', 1, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:12:43', '2019-08-22 11:12:43'),
(40, 'default', 'App\\Category model has been created', 2, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:12:51', '2019-08-22 11:12:51'),
(41, 'default', 'App\\Category model has been created', 3, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:12:59', '2019-08-22 11:12:59'),
(42, 'default', 'App\\Category model has been created', 4, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:13:09', '2019-08-22 11:13:09'),
(43, 'default', 'App\\Category model has been created', 5, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:13:19', '2019-08-22 11:13:19'),
(44, 'default', 'App\\Category model has been updated', 1, 'App\\Category', 1, 'App\\User', '[]', '2019-08-22 11:13:26', '2019-08-22 11:13:26'),
(45, 'default', 'App\\Doc model has been updated', 6, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-22 16:34:59', '2019-08-22 16:34:59'),
(46, 'default', 'App\\Doc model has been updated', 5, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-23 14:29:22', '2019-08-23 14:29:22'),
(47, 'default', 'App\\Doc model has been updated', 5, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-23 15:00:51', '2019-08-23 15:00:51'),
(48, 'default', 'App\\Doc model has been updated', 5, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-23 15:50:44', '2019-08-23 15:50:44'),
(49, 'default', 'App\\Doc model has been created', 7, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 18:08:43', '2019-08-25 18:08:43'),
(50, 'default', 'App\\Doc model has been created', 8, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 18:08:43', '2019-08-25 18:08:43'),
(51, 'default', 'App\\Doc model has been created', 9, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 18:08:43', '2019-08-25 18:08:43'),
(52, 'default', 'App\\Doc model has been created', 10, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:45', '2019-08-25 19:58:45'),
(53, 'default', 'App\\Doc model has been created', 11, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:45', '2019-08-25 19:58:45'),
(54, 'default', 'App\\Doc model has been created', 12, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:45', '2019-08-25 19:58:45'),
(55, 'default', 'App\\Doc model has been created', 13, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:45', '2019-08-25 19:58:45'),
(56, 'default', 'App\\Doc model has been created', 14, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:46', '2019-08-25 19:58:46'),
(57, 'default', 'App\\Doc model has been created', 15, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:46', '2019-08-25 19:58:46'),
(58, 'default', 'App\\Doc model has been created', 16, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:46', '2019-08-25 19:58:46'),
(59, 'default', 'App\\Doc model has been created', 17, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:46', '2019-08-25 19:58:46'),
(60, 'default', 'App\\Doc model has been created', 18, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 19:58:46', '2019-08-25 19:58:46'),
(61, 'default', 'App\\Doc model has been updated', 15, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 20:09:33', '2019-08-25 20:09:33'),
(62, 'default', 'App\\Doc model has been updated', 14, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 20:40:59', '2019-08-25 20:40:59'),
(63, 'default', 'App\\Doc model has been updated', 17, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:06:55', '2019-08-25 22:06:55'),
(64, 'default', 'App\\Doc model has been updated', 16, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:26:55', '2019-08-25 22:26:55'),
(65, 'default', 'App\\Doc model has been deleted', 16, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:28:49', '2019-08-25 22:28:49'),
(66, 'default', 'App\\Doc model has been created', 19, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:38:27', '2019-08-25 22:38:27'),
(67, 'default', 'App\\Doc model has been created', 20, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:02', '2019-08-25 22:39:02'),
(68, 'default', 'App\\Doc model has been created', 21, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:02', '2019-08-25 22:39:02'),
(69, 'default', 'App\\Doc model has been created', 22, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:02', '2019-08-25 22:39:02'),
(70, 'default', 'App\\Doc model has been created', 23, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:03', '2019-08-25 22:39:03'),
(71, 'default', 'App\\Doc model has been created', 24, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:03', '2019-08-25 22:39:03'),
(72, 'default', 'App\\Doc model has been created', 25, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:03', '2019-08-25 22:39:03'),
(73, 'default', 'App\\Doc model has been deleted', 10, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:39:49', '2019-08-25 22:39:49'),
(74, 'default', 'App\\Doc model has been deleted', 13, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:40:14', '2019-08-25 22:40:14'),
(75, 'default', 'App\\Doc model has been deleted', 23, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:40:38', '2019-08-25 22:40:38'),
(76, 'default', 'App\\Doc model has been created', 26, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:46:31', '2019-08-25 22:46:31'),
(77, 'default', 'App\\Doc model has been created', 27, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:46:31', '2019-08-25 22:46:31'),
(78, 'default', 'App\\Doc model has been deleted', 26, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:46:55', '2019-08-25 22:46:55'),
(79, 'default', 'App\\Doc model has been deleted', 27, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:47:53', '2019-08-25 22:47:53'),
(80, 'default', 'App\\Doc model has been created', 28, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:50:23', '2019-08-25 22:50:23'),
(81, 'default', 'App\\Doc model has been created', 29, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:50:23', '2019-08-25 22:50:23'),
(82, 'default', 'App\\Doc model has been updated', 28, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:51:03', '2019-08-25 22:51:03'),
(83, 'default', 'App\\Doc model has been deleted', 28, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:52:21', '2019-08-25 22:52:21'),
(84, 'default', 'App\\Doc model has been deleted', 29, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:52:47', '2019-08-25 22:52:47'),
(85, 'default', 'App\\Doc model has been created', 30, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:54:40', '2019-08-25 22:54:40'),
(86, 'default', 'App\\Doc model has been updated', 30, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:55:31', '2019-08-25 22:55:31'),
(87, 'default', 'App\\Doc model has been deleted', 30, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:55:51', '2019-08-25 22:55:51'),
(88, 'default', 'App\\Doc model has been created', 31, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:58:05', '2019-08-25 22:58:05'),
(89, 'default', 'App\\Doc model has been updated', 31, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:58:18', '2019-08-25 22:58:18'),
(90, 'default', 'App\\Doc model has been deleted', 31, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-25 22:58:47', '2019-08-25 22:58:47'),
(91, 'default', 'App\\Doc model has been created', 32, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:07', '2019-08-27 17:50:07'),
(92, 'default', 'App\\Doc model has been created', 33, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:07', '2019-08-27 17:50:07'),
(93, 'default', 'App\\Doc model has been created', 34, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:07', '2019-08-27 17:50:07'),
(94, 'default', 'App\\Doc model has been created', 35, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:08', '2019-08-27 17:50:08'),
(95, 'default', 'App\\Doc model has been created', 36, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:08', '2019-08-27 17:50:08'),
(96, 'default', 'App\\Doc model has been created', 37, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 17:50:08', '2019-08-27 17:50:08'),
(97, 'default', 'App\\Doc model has been updated', 35, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 18:01:34', '2019-08-27 18:01:34'),
(98, 'default', 'App\\Doc model has been updated', 36, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 18:01:48', '2019-08-27 18:01:48'),
(99, 'default', 'App\\Doc model has been updated', 37, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 18:01:57', '2019-08-27 18:01:57'),
(100, 'default', 'App\\Doc model has been updated', 32, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 18:02:14', '2019-08-27 18:02:14'),
(101, 'default', 'App\\Doc model has been updated', 36, 'App\\Doc', 1, 'App\\User', '[]', '2019-08-27 20:31:53', '2019-08-27 20:31:53'),
(102, 'default', 'created', 1, 'App\\Roletime', 1, 'App\\User', '[]', '2019-08-28 01:23:16', '2019-08-28 01:23:16'),
(103, 'default', 'deleted', 1, 'App\\Roletime', 1, 'App\\User', '[]', '2019-08-28 01:39:52', '2019-08-28 01:39:52'),
(104, 'default', 'created', 2, 'App\\Roletime', 1, 'App\\User', '[]', '2019-08-28 01:40:07', '2019-08-28 01:40:07'),
(105, 'default', 'created', 3, 'App\\Roletime', NULL, NULL, '[]', '2019-08-28 20:57:26', '2019-08-28 20:57:26'),
(106, 'default', 'created', 4, 'App\\Roletime', NULL, NULL, '[]', '2019-08-28 21:07:43', '2019-08-28 21:07:43');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `billingdata`
--

CREATE TABLE `billingdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adosz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `role_id`, `name`, `note`) VALUES
(1, '2019-08-22 11:12:43', '2019-08-22 11:13:26', NULL, 'Kategória 1', 'dfghsg'),
(2, '2019-08-22 11:12:51', '2019-08-22 11:12:51', NULL, 'Kategória 2', NULL),
(3, '2019-08-22 11:12:59', '2019-08-22 11:12:59', NULL, 'Kategória 3', NULL),
(4, '2019-08-22 11:13:09', '2019-08-22 11:13:09', NULL, 'Kategória 4', NULL),
(5, '2019-08-22 11:13:19', '2019-08-22 11:13:19', NULL, 'Kategória 5', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `docs`
--

CREATE TABLE `docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `originalname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizekb` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `docs`
--

INSERT INTO `docs` (`id`, `created_at`, `updated_at`, `category_id`, `name`, `originalname`, `filename`, `type`, `prev`, `sizekb`, `note`) VALUES
(32, '2019-08-27 17:50:07', '2019-08-27 18:02:14', 1, 'dompdf_out.pdf', 'dompdf_out.pdf', '25221566935407.pdf', 'pdf', '25221566935407.pdf.jpg', 2869, NULL),
(33, '2019-08-27 17:50:07', '2019-08-27 17:50:07', NULL, 'naptar.pdf', 'naptar.pdf', '55861566935407.pdf', 'pdf', 'pdf.png', 4734, NULL),
(34, '2019-08-27 17:50:07', '2019-08-27 17:50:07', NULL, 'PHP5_24_ora_alatt.pdf', 'PHP5_24_ora_alatt.pdf', '44551566935407.pdf', 'pdf', 'pdf.png', 24309, NULL),
(35, '2019-08-27 17:50:08', '2019-08-27 18:01:34', 1, 'regexp_vagy_like,melyiket_szeressem.pdf', 'regexp_vagy_like,melyiket_szeressem.pdf', '34461566935408.pdf', 'pdf', 'pdf.png', 140809, NULL),
(36, '2019-08-27 17:50:08', '2019-08-27 20:31:52', 1, 'ebook.pdf', 'ebook.pdf', '68821566935408.pdf', 'pdf', 'pdf.png', 319505, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r'),
(37, '2019-08-27 17:50:08', '2019-08-27 18:01:57', 3, 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', '21741566935408.pdf', 'pdf', 'pdf.png', 1489218, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_193651_create_roles_permissions_tables', 1),
(4, '2018_08_01_183154_create_pages_table', 1),
(5, '2018_08_04_122319_create_settings_table', 1),
(6, '2019_05_30_045300_create_activity_log_table', 1),
(7, '2019_05_30_110002_create_categories_table', 1),
(8, '2019_05_31_141618_create_docs_table', 1),
(12, '2016_01_01_193650_create_roletimes_tables ', 2),
(15, '2019_09_05_172552_create_pays_table', 3),
(18, '2019_09_05_173358_create_billingdata_table', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `billingdata_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `nyugtaszam` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdmin', NULL, NULL),
(2, 'admin', 'Admin', NULL, NULL),
(3, 'alap', 'Alap', NULL, NULL),
(4, 'premium', 'Premium', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `roletimes`
--

CREATE TABLE `roletimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `roletimes`
--

INSERT INTO `roletimes` (`id`, `user_id`, `role_id`, `admin_id`, `pay_id`, `note`, `start`, `end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, NULL, 0, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r', '2019-08-28', '2019-09-27', '2019-08-28 01:23:16', '2019-08-28 01:39:52', '2019-08-28 01:39:52'),
(2, 1, 3, NULL, 0, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r', '2019-08-28', '2019-09-27', '2019-08-28 01:40:07', '2019-08-28 01:40:07', NULL),
(3, 3, 3, NULL, 0, 'a:0:{}', '2019-09-14', '2019-10-14', '2019-08-28 20:57:26', '2019-08-28 20:57:26', NULL),
(4, 3, 3, 21, 0, 'a:0:{}', '2019-09-14', '2019-10-14', '2019-08-28 21:07:43', '2019-08-28 21:07:43', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Szuperadmin', 'root@dolgozo.com', NULL, '$2y$10$nH.aGkwcq2kSAAySLzL6te5dwv6TpyS47.lr1TrCq4Ejo0pdRLysq', NULL, NULL, NULL),
(2, 'admin', 'manager@dolgozo.com', NULL, '$2y$10$/txTwH4lm.QwuVt6mw2TpePZhL5DaUBxA62KzcNnQZLCaDhwEclRq', NULL, NULL, NULL),
(3, 'baseuser1', 'baseuser1@dolgozo.com', NULL, '$2y$10$sI6xVQN5ORPNQggsQcytH.aIJaRr9madrjxTuairOXNdgXxgRIlNC', NULL, NULL, NULL),
(4, 'baseuser2', 'baseuser2@dolgozo.com', NULL, '$2y$10$eLfVb4nUlq9LE/6vrRWzOe1it4SJBFYN6cqQ/DcALAJ/vtDWKZlMS', NULL, NULL, NULL),
(5, 'premiunuser1', 'premiunuser1@dolgozo.com', NULL, '$2y$10$MVN0We451dd/0nNzy6OibuhJr/lG.XVjknFoVaFVqof7tVWJdDKau', NULL, NULL, NULL),
(6, 'premiunuser2', 'premiunuser2@dolgozo.com', NULL, '$2y$10$UTBEFXKyYx7CXaA68FeFWeMPACt5nOYiB9MwChW/tPcfRaMZ88Bp2', NULL, NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- A tábla indexei `billingdata`
--
ALTER TABLE `billingdata`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- A tábla indexei `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `roletimes`
--
ALTER TABLE `roletimes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- A tábla indexei `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT a táblához `billingdata`
--
ALTER TABLE `billingdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `roletimes`
--
ALTER TABLE `roletimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
