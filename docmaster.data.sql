-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Okt 14. 23:56
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
(106, 'default', 'created', 4, 'App\\Roletime', NULL, NULL, '[]', '2019-08-28 21:07:43', '2019-08-28 21:07:43'),
(107, 'default', 'App\\Billingdata model has been created', 1, 'App\\Billingdata', 7, 'App\\User', '[]', '2019-09-17 15:40:18', '2019-09-17 15:40:18'),
(108, 'default', 'App\\Doc model has been updated', 35, 'App\\Doc', 1, 'App\\User', '[]', '2019-09-20 16:25:44', '2019-09-20 16:25:44'),
(109, 'default', 'App\\Barion model has been created', 1, 'App\\Barion', NULL, NULL, '[]', '2019-09-23 00:26:06', '2019-09-23 00:26:06'),
(110, 'default', 'App\\Doc model has been created', 38, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 18:55:02', '2019-10-02 18:55:02'),
(111, 'default', 'App\\Doc model has been created', 39, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 19:18:29', '2019-10-02 19:18:29'),
(112, 'default', 'App\\Doc model has been created', 40, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 19:26:07', '2019-10-02 19:26:07'),
(113, 'default', 'App\\Doc model has been updated', 39, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 19:50:12', '2019-10-02 19:50:12'),
(114, 'default', 'App\\Doc model has been updated', 39, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 19:57:38', '2019-10-02 19:57:38'),
(115, 'default', 'App\\Doc model has been updated', 40, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 20:20:07', '2019-10-02 20:20:07'),
(116, 'default', 'App\\Doc model has been created', 41, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 21:47:03', '2019-10-02 21:47:03'),
(117, 'default', 'App\\Doc model has been created', 42, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 21:51:59', '2019-10-02 21:51:59'),
(118, 'default', 'App\\Doc model has been created', 43, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 22:25:50', '2019-10-02 22:25:50'),
(119, 'default', 'App\\Doc model has been created', 44, 'App\\Doc', 1, 'App\\User', '[]', '2019-10-02 22:25:51', '2019-10-02 22:25:51'),
(120, 'default', 'App\\Billingdata model has been created', 2, 'App\\Billingdata', 1, 'App\\User', '[]', '2019-10-09 23:32:19', '2019-10-09 23:32:19'),
(121, 'default', 'App\\Bariontransaction model has been created', 1, 'App\\Bariontransaction', 1, 'App\\User', '[]', '2019-10-09 23:32:19', '2019-10-09 23:32:19'),
(122, 'default', 'App\\Bariontransaction model has been created', 2, 'App\\Bariontransaction', 1, 'App\\User', '[]', '2019-10-10 21:19:49', '2019-10-10 21:19:49'),
(123, 'default', 'App\\Barion model has been created', 1, 'App\\Barion', 1, 'App\\User', '[]', '2019-10-10 21:19:49', '2019-10-10 21:19:49'),
(124, 'default', 'App\\Bariontransaction model has been created', 3, 'App\\Bariontransaction', 1, 'App\\User', '[]', '2019-10-10 21:19:51', '2019-10-10 21:19:51'),
(125, 'default', 'App\\Barion model has been created', 2, 'App\\Barion', 1, 'App\\User', '[]', '2019-10-10 21:19:52', '2019-10-10 21:19:52');

--
-- A tábla adatainak kiíratása `barions`
--

INSERT INTO `barions` (`id`, `payment_id`, `bariontransaction_id`, `script`, `status`, `fulljson`, `errors`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '54a092e6cd7e45dc9e0048e49bfe47b5', '2', 'store', 'Prepared', '{\"PaymentId\":\"54a092e6cd7e45dc9e0048e49bfe47b5\",\"PaymentRequestId\":null,\"Status\":\"Prepared\",\"QRUrl\":\"https:\\/\\/api.test.barion.com\\/qr\\/generate?paymentId=54a092e6-cd7e-45dc-9e00-48e49bfe47b5&size=Large\",\"Transactions\":[{\"POSTransactionId\":\"2-1570749589\",\"TransactionId\":\"f56847c6bbf1446f86b6b9cbdabc2e45\",\"Status\":\"Prepared\",\"Currency\":\"HUF\",\"TransactionTime\":\"2019-10-10T23:19:50.872\",\"RelatedId\":null},{\"POSTransactionId\":null,\"TransactionId\":\"a510d2ceb5d24f96866306925f69ee26\",\"Status\":\"Prepared\",\"Currency\":\"HUF\",\"TransactionTime\":\"2019-10-10T23:19:50.887\",\"RelatedId\":null}],\"RecurrenceResult\":\"None\",\"GatewayUrl\":\"https:\\/\\/secure.test.barion.com\\/Pay?Id=54a092e6cd7e45dc9e0048e49bfe47b5&lang=hu_HU\",\"RedirectUrl\":\"https:\\/\\/doc.mottoweb.hu\\/barionredirect?paymentId=54a092e6cd7e45dc9e0048e49bfe47b5\",\"CallbackUrl\":\"https:\\/\\/doc.mottoweb.hu\\/api\\/barioncallback?paymentId=54a092e6cd7e45dc9e0048e49bfe47b5\",\"Errors\":[]}', '[]', '2019-10-10 21:19:49', '2019-10-10 21:19:49', NULL),
(2, '2935f0d98a764d4da58a8f6cdea4a30c', '3', 'store', 'Prepared', '{\"PaymentId\":\"2935f0d98a764d4da58a8f6cdea4a30c\",\"PaymentRequestId\":null,\"Status\":\"Prepared\",\"QRUrl\":\"https:\\/\\/api.test.barion.com\\/qr\\/generate?paymentId=2935f0d9-8a76-4d4d-a58a-8f6cdea4a30c&size=Large\",\"Transactions\":[{\"POSTransactionId\":\"3-1570749591\",\"TransactionId\":\"52865f9fb2aa461299e859dc02c88554\",\"Status\":\"Prepared\",\"Currency\":\"HUF\",\"TransactionTime\":\"2019-10-10T23:19:53.405\",\"RelatedId\":null},{\"POSTransactionId\":null,\"TransactionId\":\"ead592ef3fb746b8b79a97105dee0f95\",\"Status\":\"Prepared\",\"Currency\":\"HUF\",\"TransactionTime\":\"2019-10-10T23:19:53.405\",\"RelatedId\":null}],\"RecurrenceResult\":\"None\",\"GatewayUrl\":\"https:\\/\\/secure.test.barion.com\\/Pay?Id=2935f0d98a764d4da58a8f6cdea4a30c&lang=hu_HU\",\"RedirectUrl\":\"https:\\/\\/doc.mottoweb.hu\\/barionredirect?paymentId=2935f0d98a764d4da58a8f6cdea4a30c\",\"CallbackUrl\":\"https:\\/\\/doc.mottoweb.hu\\/api\\/barioncallback?paymentId=2935f0d98a764d4da58a8f6cdea4a30c\",\"Errors\":[]}', '[]', '2019-10-10 21:19:52', '2019-10-10 21:19:52', NULL);

--
-- A tábla adatainak kiíratása `bariontransactions`
--

INSERT INTO `bariontransactions` (`time`, `id`, `user_id`, `billingdata_id`, `order_id`, `total`, `days`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1570671139, 1, 1, 2, 'base', 800, 190, '2019-10-09 23:32:19', '2019-10-09 23:32:19', NULL),
(1570749589, 2, 1, 2, 'max', 1000, 370, '2019-10-10 21:19:49', '2019-10-10 21:19:49', NULL),
(1570749591, 3, 1, 2, 'max', 1000, 370, '2019-10-10 21:19:51', '2019-10-10 21:19:51', NULL);

--
-- A tábla adatainak kiíratása `billingdata`
--

INSERT INTO `billingdata` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `fullname`, `cardname`, `city`, `zip`, `address`, `tel`, `adosz`) VALUES
(1, '2019-09-17 15:40:18', '2019-09-17 15:40:18', NULL, 7, 'Ottó Ménkű', 'Ottó Ménkű', 'Jászfelsőszentgyörgy', 5111, 'Attila u.31', '706135422', 'JNKSZ'),
(2, '2019-10-09 23:32:19', '2019-10-09 23:32:19', NULL, 1, 'hnfgnf', 'ghnfgh', 'jászberény', 5100, '13 lll', '5456465465', '165465456');

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `role_id`, `name`, `note`) VALUES
(1, '2019-08-22 11:12:43', '2019-08-22 11:13:26', NULL, 'Kategória 1', 'dfghsg'),
(2, '2019-08-22 11:12:51', '2019-08-22 11:12:51', NULL, 'Kategória 2', NULL),
(3, '2019-08-22 11:12:59', '2019-08-22 11:12:59', NULL, 'Kategória 3', NULL),
(4, '2019-08-22 11:13:09', '2019-08-22 11:13:09', NULL, 'Kategória 4', NULL),
(5, '2019-08-22 11:13:19', '2019-08-22 11:13:19', NULL, 'Kategória 5', NULL);

--
-- A tábla adatainak kiíratása `docs`
--

INSERT INTO `docs` (`id`, `created_at`, `updated_at`, `category_id`, `name`, `originalname`, `filename`, `type`, `prev`, `sizekb`, `note`) VALUES
(32, '2019-08-27 17:50:07', '2019-08-27 18:02:14', 1, 'dompdf_out.pdf', 'dompdf_out.pdf', '25221566935407.pdf', 'pdf', '25221566935407.pdf.jpg', 2869, NULL),
(33, '2019-08-27 17:50:07', '2019-08-27 17:50:07', NULL, 'naptar.pdf', 'naptar.pdf', '55861566935407.pdf', 'pdf', 'pdf.png', 4734, NULL),
(34, '2019-08-27 17:50:07', '2019-08-27 17:50:07', NULL, 'PHP5_24_ora_alatt.pdf', 'PHP5_24_ora_alatt.pdf', '44551566935407.pdf', 'pdf', 'pdf.png', 24309, NULL),
(35, '2019-08-27 17:50:08', '2019-09-20 16:25:44', 1, 'regexp_vagydfasd_like,melyiket_szeressem.pdf', 'regexp_vagy_like,melyiket_szeressem.pdf', '34461566935408.pdf', 'pdf', 'pdf.png', 140809, NULL),
(36, '2019-08-27 17:50:08', '2019-08-27 20:31:52', 1, 'ebook.pdf', 'ebook.pdf', '68821566935408.pdf', 'pdf', 'pdf.png', 319505, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r'),
(37, '2019-08-27 17:50:08', '2019-08-27 18:01:57', 3, 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', '21741566935408.pdf', 'pdf', 'pdf.png', 1489218, NULL),
(38, '2019-10-02 18:55:02', '2019-10-02 18:55:02', NULL, 'adsense.pdf', 'adsense.pdf', '91011570049702.pdf', 'pdf', 'pdf.png', 657015, NULL),
(39, '2019-10-02 19:18:29', '2019-10-02 19:57:38', 2, 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', 'Kovacs_Denes_-_Webdesign_2003_95_oldal.pdf', '88571570051109.pdf', 'pdf', '88571570051109.pdf.jpg', 1489218, 'jm,jm'),
(40, '2019-10-02 19:26:07', '2019-10-02 20:20:07', 1, 'PHP5_24_ora_alatt.pdf', 'PHP5_24_ora_alatt.pdf', '58191570051567.pdf', 'pdf', '58191570051567.pdf.jpg', 24309, NULL),
(41, '2019-10-02 21:47:03', '2019-10-02 21:47:03', NULL, 'cikk_47_68_71.pdf', 'cikk_47_68_71.pdf', '37871570060023.pdf', 'pdf', 'pdf.png', 174489, NULL),
(42, '2019-10-02 21:51:59', '2019-10-02 21:51:59', 11, 'vtk_beszerelesi_ut0.pdf', 'vtk_beszerelesi_ut0.pdf', '32521570060319.pdf', 'pdf', 'pdf.png', 894835, NULL),
(43, '2019-10-02 22:25:50', '2019-10-02 22:25:50', 5, 'dompdf_out.pdf', 'dompdf_out.pdf', '11271570062350.pdf', 'pdf', 'pdf.png', 2869, NULL),
(44, '2019-10-02 22:25:51', '2019-10-02 22:25:51', 5, 'ebook.pdf', 'ebook.pdf', '18331570062351.pdf', 'pdf', 'pdf.png', 319505, NULL);

--
-- A tábla adatainak kiíratása `migrations`
--
--
-- A tábla adatainak kiíratása `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdmin', NULL, NULL),
(2, 'admin', 'Admin', NULL, NULL),
(3, 'alap', 'Alap', NULL, NULL),
(4, 'premium', 'Premium', NULL, NULL);

--
-- A tábla adatainak kiíratása `roletimes`
--

INSERT INTO `roletimes` (`id`, `user_id`, `role_id`, `admin_id`, `pay_id`, `note`, `start`, `end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, NULL, 0, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r', '2019-08-28', '2019-09-27', '2019-08-28 01:23:16', '2019-08-28 01:39:52', '2019-08-28 01:39:52'),
(2, 1, 3, NULL, 0, 'warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r warfgergwergw  ewfbvwre t4z z46z 454werte3rg352tv t5t35t4 34rt 3 4r 4r 4r 3124r', '2019-08-28', '2019-09-27', '2019-08-28 01:40:07', '2019-08-28 01:40:07', NULL),
(3, 3, 3, NULL, 0, 'a:0:{}', '2019-09-14', '2019-10-14', '2019-08-28 20:57:26', '2019-08-28 20:57:26', NULL),
(4, 3, 3, 21, 0, 'a:0:{}', '2019-09-14', '2019-10-14', '2019-08-28 21:07:43', '2019-08-28 21:07:43', NULL);

--
-- A tábla adatainak kiíratása `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1);

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Szuperadmin', 'root@dolgozo.com', NULL, '$2y$10$nH.aGkwcq2kSAAySLzL6te5dwv6TpyS47.lr1TrCq4Ejo0pdRLysq', NULL, NULL, NULL),
(2, 'admin', 'manager@dolgozo.com', NULL, '$2y$10$/txTwH4lm.QwuVt6mw2TpePZhL5DaUBxA62KzcNnQZLCaDhwEclRq', NULL, NULL, NULL),
(3, 'baseuser1', 'baseuser1@dolgozo.com', NULL, '$2y$10$sI6xVQN5ORPNQggsQcytH.aIJaRr9madrjxTuairOXNdgXxgRIlNC', 'VQc13Dt74Dv5pHX4fjZkzvj1fQHAJypLOm1Fkgicft7BTOYsH2VSx72Lzg4W', NULL, NULL),
(4, 'baseuser2', 'baseuser2@dolgozo.com', NULL, '$2y$10$eLfVb4nUlq9LE/6vrRWzOe1it4SJBFYN6cqQ/DcALAJ/vtDWKZlMS', NULL, NULL, NULL),
(5, 'premiunuser1', 'premiunuser1@dolgozo.com', NULL, '$2y$10$MVN0We451dd/0nNzy6OibuhJr/lG.XVjknFoVaFVqof7tVWJdDKau', NULL, NULL, NULL),
(6, 'premiunuser2', 'premiunuser2@dolgozo.com', NULL, '$2y$10$UTBEFXKyYx7CXaA68FeFWeMPACt5nOYiB9MwChW/tPcfRaMZ88Bp2', NULL, NULL, NULL),
(7, 'Ottó Ménkű', 'menkuotto@gmail.com', NULL, '$2y$10$Z7tcTh.LTdaG.GFLVGeJ9.MF3P0eTjxlupA9YfQ6paokXpeUc.z9e', NULL, '2019-09-16 22:26:28', '2019-09-16 22:26:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
