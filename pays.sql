-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2019. Okt 11. 04:23
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

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `action_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billingdata_id` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 0, 1, '45', 6, 'min', 'barion', 400, 30, NULL, '2019-10-10 14:22:32', '2019-10-10 14:22:32', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
