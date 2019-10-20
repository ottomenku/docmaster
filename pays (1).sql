-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2019. Okt 18. 23:33
-- Kiszolgáló verziója: 5.6.45-cll-lve
-- PHP verzió: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mottoweb_docmaster`
--

--
-- A tábla adatainak kiíratása `pays`
--

INSERT INTO `pays` (`id`, `user_id`, `admin_id`, `action_id`, `billingdata_id`, `order_id`, `type`, `total`, `days`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 8, 1, '38', 2, 'min', 'barion', 400, 30, NULL, '2019-10-01 20:13:38', '2019-10-01 20:13:38', NULL),
(4, 9, 1, '39', 5, 'base', 'barion', 800, 190, NULL, '2019-10-09 23:39:21', '2019-10-09 23:39:21', NULL),
(5, 12, 1, '40', 6, 'min', 'barion', 400, 30, NULL, '2019-10-10 13:12:52', '2019-10-10 13:12:52', NULL),
(6, 12, 1, '41', 6, 'base', 'barion', 800, 190, NULL, '2019-10-10 13:27:32', '2019-10-10 13:27:32', NULL),
(7, 12, 1, '42', 6, 'max', 'barion', 1000, 370, NULL, '2019-10-10 13:49:50', '2019-10-10 13:49:50', NULL),
(8, 12, 1, '43', 6, 'min', 'barion', 400, 30, NULL, '2019-10-10 14:00:57', '2019-10-10 14:00:57', NULL),
(9, 12, 1, '44', 6, 'min', 'barion', 400, 30, NULL, '2019-10-10 14:14:54', '2019-10-10 14:14:54', NULL),
(10, 0, 1, '45', 6, 'min', 'barion', 400, 30, NULL, '2019-10-10 14:22:32', '2019-10-10 14:22:32', NULL),
(11, 0, 1, '48', 8, 'min', 'barion', 400, 30, NULL, '2019-10-11 09:18:38', '2019-10-11 09:18:38', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
