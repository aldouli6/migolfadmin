-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2022 at 07:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`id`, `user_id`, `name`, `classification`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 8, 'Liga Mx', '5', '2021-10-08 02:01:18', '2021-10-08 02:02:54', '2021-10-08 02:02:54'),
(47, 14, 'Estandard', '5', '2021-10-13 03:34:59', '2021-10-13 03:34:59', NULL),
(48, 12, 'Estándard', '5', '2021-10-15 22:20:52', '2022-01-07 06:51:38', NULL),
(49, 8, 'Estandard2', '5', '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(50, 14, 'Estandard', '0', '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(51, 14, 'Estandard', '0', '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(52, 12, 'Otra', '0', '2021-10-21 00:40:55', '2022-01-07 03:12:02', '2022-01-07 03:12:02'),
(53, 12, 'Intento', '0', '2021-10-21 00:43:40', '2022-01-07 03:12:02', '2022-01-07 03:12:02'),
(54, 12, 'Estánd', '0', '2021-10-22 03:25:02', '2021-10-22 03:25:02', NULL),
(55, 12, 'Estánd', '0', '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(56, 12, 'Estándard', '0', '2021-10-22 05:57:18', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(57, 12, 'Estándard', '0', '2021-11-28 13:58:57', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(58, 12, 'Estándard', '0', '2021-12-04 02:27:10', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(59, 12, 'Estándard', '0', '2021-12-30 00:55:49', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(60, 12, 'Es', '0', '2021-12-30 00:59:43', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(61, 12, 'Es', '0', '2021-12-30 01:00:04', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(62, 12, 'Es', '0', '2021-12-30 01:07:24', '2021-12-30 01:23:14', '2021-12-30 01:23:14'),
(63, 12, 'Esta', '0', '2021-12-30 01:07:58', '2021-12-30 01:22:58', '2021-12-30 01:22:58'),
(64, 12, 'Esta', '0', '2021-12-30 01:23:36', '2021-12-30 01:46:53', NULL),
(65, 12, 'Estándard', '0', '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_greens`
--

CREATE TABLE `bet_greens` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet` double DEFAULT NULL,
  `condicion1` text COLLATE utf8mb4_unicode_ci,
  `condicion2` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_greens`
--

INSERT INTO `bet_greens` (`id`, `bet_id`, `enabled`, `bet`, `condicion1`, `condicion2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 47, 0, 10, 'uno_gana', 'acumula_empates', '2021-10-13 03:34:59', '2021-10-19 02:14:12', NULL),
(30, 48, 1, 10, 'uno_gana', 'acumula_empates', '2021-10-15 22:20:52', '2022-01-07 03:30:04', NULL),
(31, 49, 1, 10, 'uno_gana', 'acumula_empates', '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(32, 50, 1, NULL, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(33, 51, 1, NULL, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(34, 52, 1, NULL, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(35, 53, 1, NULL, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(36, 54, 0, 10, 'uno_gana', 'acumula_empates', '2021-10-22 03:25:02', '2021-10-22 03:25:02', NULL),
(37, 55, 0, 10, 'uno_gana', 'acumula_empates', '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(38, 56, 1, 10, 'uno_gana', 'acumula_empates', '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(39, 57, 1, 10, 'varios_ganan', 'no_acumula', '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(40, 58, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(41, 59, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-30 00:55:49', '2021-12-30 00:55:49', NULL),
(42, 60, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(43, 61, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(44, 62, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(45, 63, 1, 10, 'varios_ganan', 'no_acumula', '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(46, 64, 0, 10, 'uno_gana', 'acumula_empates', '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(47, 65, 1, 10, 'uno_gana', 'acumula_empates', '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_match_individuals`
--

CREATE TABLE `bet_match_individuals` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet1_9` double DEFAULT NULL,
  `bet10_18` double DEFAULT NULL,
  `bet_total` double DEFAULT NULL,
  `press` tinyint(1) NOT NULL DEFAULT '1',
  `press_bet` double DEFAULT NULL,
  `press_every` int(11) DEFAULT NULL,
  `carrry` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_match_individuals`
--

INSERT INTO `bet_match_individuals` (`id`, `bet_id`, `enabled`, `bet1_9`, `bet10_18`, `bet_total`, `press`, `press_bet`, `press_every`, `carrry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 47, 0, 5, 5, 10, 1, 20, 3, 1, '2021-10-13 03:34:59', '2021-10-13 03:34:59', NULL),
(23, 48, 1, 51, 53, 101, 1, 20, 4, 1, '2021-10-15 22:20:52', '2022-01-07 03:21:30', NULL),
(24, 49, 0, 5, 5, 10, 1, 20, 3, 1, '2021-10-18 00:48:47', '2021-10-18 21:17:07', NULL),
(25, 50, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(26, 51, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(27, 52, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(28, 53, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(29, 54, 0, 5, 5, 10, 1, 20, 3, 1, '2021-10-22 03:25:02', '2021-10-22 03:25:02', NULL),
(30, 55, 1, 5, 5, 10, 1, 20, 3, 1, '2021-10-22 05:04:06', '2022-01-07 03:11:06', NULL),
(31, 56, 1, 5, 5, 10, 1, 20, 3, 1, '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(32, 57, 1, 5, 5, 10, 1, 20, 3, 1, '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(33, 58, 1, 5, 5, 10, 1, 20, 3, 1, '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(34, 59, 1, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 00:55:49', '2021-12-30 00:55:49', NULL),
(35, 60, 1, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(36, 61, 1, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(37, 62, 1, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(38, 63, 0, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(39, 64, 0, 5, 5, 10, 1, 20, 3, 1, '2021-12-30 01:23:36', '2021-12-30 01:43:01', NULL),
(40, 65, 1, 51, 53, 101, 1, 20, 4, 1, '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_match_parejas`
--

CREATE TABLE `bet_match_parejas` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet1_9` double DEFAULT NULL,
  `bet10_18` double DEFAULT NULL,
  `bet_total` double DEFAULT NULL,
  `press` tinyint(1) NOT NULL DEFAULT '1',
  `press_bet` double DEFAULT NULL,
  `press_every` text COLLATE utf8mb4_unicode_ci,
  `carrry` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_match_parejas`
--

INSERT INTO `bet_match_parejas` (`id`, `bet_id`, `enabled`, `bet1_9`, `bet10_18`, `bet_total`, `press`, `press_bet`, `press_every`, `carrry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 47, 0, 5, 5, 10, 1, 20, '4', 1, '2021-10-13 03:34:59', '2021-10-19 02:14:37', NULL),
(20, 48, 1, 5, 5, 10, 1, 20, '5', 1, '2021-10-15 22:20:52', '2021-12-04 02:13:39', NULL),
(21, 49, 1, 5, 5, 10, 1, 20, '4', 1, '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(22, 50, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(23, 51, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(24, 52, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(25, 53, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(26, 54, 1, 5, 5, 10, 1, 20, '4', 1, '2021-10-22 03:25:02', '2022-03-03 00:57:23', NULL),
(27, 55, 0, 5, 5, 10, 1, 20, '4', 1, '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(28, 56, 1, 5, 5, 10, 1, 20, '4', 1, '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(29, 57, 1, 5, 5, 10, 1, 20, '4', 1, '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(30, 58, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(31, 59, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 00:55:49', '2021-12-30 00:55:49', NULL),
(32, 60, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(33, 61, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(34, 62, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(35, 63, 1, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(36, 64, 0, 5, 5, 10, 1, 20, '4', 1, '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(37, 65, 1, 5, 5, 10, 1, 20, '5', 1, '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_medal_plays`
--

CREATE TABLE `bet_medal_plays` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet1_9` double DEFAULT NULL,
  `bet10_18` double DEFAULT NULL,
  `bet_total` double DEFAULT NULL,
  `empate` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_medal_plays`
--

INSERT INTO `bet_medal_plays` (`id`, `bet_id`, `enabled`, `bet1_9`, `bet10_18`, `bet_total`, `empate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 47, 0, 5, 5, 10, 'divide', '2021-10-13 03:34:59', '2021-10-13 03:34:59', NULL),
(18, 48, 1, 11, 5, 10, 'divide', '2021-10-15 22:20:52', '2022-01-07 03:30:04', NULL),
(19, 49, 1, 5, 5, 10, 'divide', '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(20, 50, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(21, 51, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(22, 52, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(23, 53, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(24, 54, 0, 5, 5, 10, 'divide', '2021-10-22 03:25:02', '2022-01-07 08:04:05', NULL),
(25, 55, 0, 5, 5, 10, 'divide', '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(26, 56, 1, 5, 5, 10, 'divide', '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(27, 57, 1, 5, 5, 10, 'divide', '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(28, 58, 1, 5, 5, 10, 'divide', '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(29, 59, 1, 5, 5, 10, 'divide', '2021-12-30 00:55:50', '2021-12-30 00:55:50', NULL),
(30, 60, 1, 5, 5, 10, 'divide', '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(31, 61, 1, 5, 5, 10, 'divide', '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(32, 62, 1, 5, 5, 10, 'divide', '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(33, 63, 1, 5, 5, 10, 'divide', '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(34, 64, 0, 5, 5, 10, 'divide', '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(35, 65, 1, 11, 5, 10, 'divide', '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_raya_puntos`
--

CREATE TABLE `bet_raya_puntos` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet` double DEFAULT NULL,
  `birdie` double DEFAULT NULL,
  `aguila` double DEFAULT NULL,
  `albatros` double DEFAULT NULL,
  `hoyo_uno` double DEFAULT NULL,
  `exceso` double DEFAULT NULL,
  `mas_golpes` text COLLATE utf8mb4_unicode_ci,
  `label1` text COLLATE utf8mb4_unicode_ci,
  `value1` double DEFAULT NULL,
  `label2` text COLLATE utf8mb4_unicode_ci,
  `value2` double DEFAULT NULL,
  `label3` text COLLATE utf8mb4_unicode_ci,
  `value3` double DEFAULT NULL,
  `label4` text COLLATE utf8mb4_unicode_ci,
  `value4` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_raya_puntos`
--

INSERT INTO `bet_raya_puntos` (`id`, `bet_id`, `enabled`, `bet`, `birdie`, `aguila`, `albatros`, `hoyo_uno`, `exceso`, `mas_golpes`, `label1`, `value1`, `label2`, `value2`, `label3`, `value3`, `label4`, `value4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 47, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-13 03:34:59', '2021-10-13 03:34:59', NULL),
(12, 48, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-15 22:20:52', '2021-12-03 02:00:59', NULL),
(13, 49, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(14, 50, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(15, 51, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(16, 52, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(17, 53, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(18, 54, 0, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-22 03:25:02', '2021-10-22 03:25:02', NULL),
(19, 55, 0, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(20, 56, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(21, 57, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(22, 58, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(23, 59, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 00:55:50', '2021-12-30 00:55:50', NULL),
(24, 60, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(25, 61, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(26, 62, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(27, 63, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(28, 64, 0, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(29, 65, 1, 60, 10, 10, 10, 100, -1, '2', 'o\' yes', 1, 'Sandy par/birdie', 1, 'Hole-out', 1, 'Exceso de putts', 1, '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_rompe_handicaps`
--

CREATE TABLE `bet_rompe_handicaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet1_9` double DEFAULT NULL,
  `bet10_18` double DEFAULT NULL,
  `bet_total` double DEFAULT NULL,
  `opcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_rompe_handicaps`
--

INSERT INTO `bet_rompe_handicaps` (`id`, `bet_id`, `enabled`, `bet1_9`, `bet10_18`, `bet_total`, `opcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 47, 0, 5, 5, 10, '1', '2021-10-13 03:34:59', '2021-10-18 21:19:30', NULL),
(11, 48, 1, 5, 5, 10, '1', '2021-10-15 22:20:52', '2021-12-03 01:45:44', NULL),
(12, 49, 1, 5, 5, 10, '1', '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(13, 50, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(14, 51, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(15, 52, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(16, 53, 1, NULL, NULL, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(17, 54, 0, 5, 5, 10, '1', '2021-10-22 03:25:02', '2022-01-07 22:28:35', NULL),
(18, 55, 0, 5, 5, 10, '1', '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(19, 56, 1, 5, 5, 10, '1', '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(20, 57, 1, 5, 5, 10, '1', '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(21, 58, 1, 5, 5, 10, '1', '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(22, 59, 1, 5, 5, 10, '1', '2021-12-30 00:55:50', '2021-12-30 00:55:50', NULL),
(23, 60, 1, 5, 5, 10, '1', '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(24, 61, 1, 5, 5, 10, '1', '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(25, 62, 1, 5, 5, 10, '1', '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(26, 63, 1, 5, 5, 10, '1', '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(27, 64, 0, 5, 5, 10, '1', '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(28, 65, 1, 5, 5, 10, '1', '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_skins`
--

CREATE TABLE `bet_skins` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet` double DEFAULT NULL,
  `ventaja` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_skins`
--

INSERT INTO `bet_skins` (`id`, `bet_id`, `enabled`, `bet`, `ventaja`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 47, 0, 5, 'de_campo', '2021-10-13 03:34:59', '2021-10-19 02:14:47', NULL),
(10, 48, 1, 5, 'menor_hcp', '2021-10-15 22:20:52', '2022-03-03 00:57:32', NULL),
(11, 49, 1, 5, 'de_campo', '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(12, 50, 1, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(13, 51, 1, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(14, 52, 1, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(15, 53, 1, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(16, 54, 0, 5, 'de_campo', '2021-10-22 03:25:02', '2022-03-03 00:57:23', NULL),
(17, 55, 0, 5, 'de_campo', '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(18, 56, 1, 5, 'individual', '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(19, 57, 1, 5, 'individual', '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(20, 58, 1, 5, 'individual', '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(21, 59, 1, 5, 'individual', '2021-12-30 00:55:50', '2021-12-30 00:55:50', NULL),
(22, 60, 1, 5, 'individual', '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(23, 61, 1, 5, 'individual', '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(24, 62, 1, 5, 'individual', '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(25, 63, 1, 5, 'individual', '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(26, 64, 0, 5, 'de_campo', '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(27, 65, 1, 5, 'de_campo', '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bet_stablefords`
--

CREATE TABLE `bet_stablefords` (
  `id` int(10) UNSIGNED NOT NULL,
  `bet_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `bet1_9` double DEFAULT NULL,
  `bet10_18` double DEFAULT NULL,
  `bet_total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bet_stablefords`
--

INSERT INTO `bet_stablefords` (`id`, `bet_id`, `enabled`, `bet1_9`, `bet10_18`, `bet_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 47, 0, 5, 5, 10, '2021-10-13 03:34:59', '2021-10-18 21:19:14', NULL),
(11, 48, 1, 5, 5, 10, '2021-10-15 22:20:53', '2021-10-22 05:56:57', NULL),
(12, 49, 1, 5, 5, 10, '2021-10-18 00:48:47', '2021-10-18 00:48:47', NULL),
(13, 50, 1, NULL, NULL, NULL, '2021-10-21 00:33:06', '2021-10-21 00:33:06', NULL),
(14, 51, 1, NULL, NULL, NULL, '2021-10-21 00:34:06', '2021-10-21 00:34:06', NULL),
(15, 52, 1, NULL, NULL, NULL, '2021-10-21 00:40:55', '2021-10-21 00:40:55', NULL),
(16, 53, 1, NULL, NULL, NULL, '2021-10-21 00:43:40', '2021-10-21 00:43:40', NULL),
(17, 54, 0, 5, 8, 10, '2021-10-22 03:25:02', '2022-01-07 09:33:32', NULL),
(18, 55, 0, 5, 5, 10, '2021-10-22 05:04:06', '2021-10-22 05:04:06', NULL),
(19, 56, 1, 5, 5, 10, '2021-10-22 05:57:18', '2021-10-22 05:57:18', NULL),
(20, 57, 1, 5, 5, 10, '2021-11-28 13:58:57', '2021-11-28 13:58:57', NULL),
(21, 58, 1, 5, 5, 10, '2021-12-04 02:27:10', '2021-12-04 02:27:10', NULL),
(22, 59, 1, 5, 5, 10, '2021-12-30 00:55:50', '2021-12-30 00:55:50', NULL),
(23, 60, 1, 5, 5, 10, '2021-12-30 00:59:43', '2021-12-30 00:59:43', NULL),
(24, 61, 1, 5, 5, 10, '2021-12-30 01:00:04', '2021-12-30 01:00:04', NULL),
(25, 62, 1, 5, 5, 10, '2021-12-30 01:07:24', '2021-12-30 01:07:24', NULL),
(26, 63, 1, 5, 5, 10, '2021-12-30 01:07:58', '2021-12-30 01:07:58', NULL),
(27, 64, 0, 5, 5, 10, '2021-12-30 01:23:36', '2021-12-30 01:23:36', NULL),
(28, 65, 1, 5, 5, 10, '2022-01-07 06:50:42', '2022-01-07 06:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `country_id`, `state_id`, `city`, `email`, `created_at`, `updated_at`, `deleted_at`, `enabled`) VALUES
(1, 'Club 1', 2, 2, 'Amarillo', NULL, '2021-08-13 21:43:01', '2021-09-06 03:44:35', NULL, 1),
(2, 'Club 2', 1, 1, 'SLP', 'aldouli6@gmail.com', '2021-08-16 22:26:09', '2021-09-06 03:44:22', NULL, 1),
(3, 'Club 3', 1, 1, 'Qro', NULL, '2021-09-06 03:24:34', '2021-09-06 03:38:10', NULL, 1),
(4, 'Club 4', 2, 2, 'Dallas', NULL, '2021-09-06 03:39:25', '2021-09-06 03:39:25', NULL, 1),
(5, 'Club 5', 1, 3, 'Zibatá', NULL, '2021-09-06 03:40:31', '2021-09-06 03:40:31', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`, `deleted_at`, `enabled`) VALUES
(1, 'MX', 'México', '2021-08-13 21:42:29', '2021-08-13 21:42:29', NULL, 1),
(2, 'US', 'Estados Unidos', '2021-08-18 21:37:49', '2021-08-25 09:10:02', NULL, 1),
(3, 'CA', 'Canada', '2021-08-22 03:41:35', '2021-08-31 02:01:28', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `description`, `alias`, `club_id`, `created_at`, `updated_at`, `deleted_at`, `enabled`) VALUES
(1, NULL, 'Campo C', 2, '2021-08-13 21:43:15', '2021-09-06 03:42:30', NULL, 1),
(2, 'Descripción del pago', 'Campo D', 2, '2021-08-16 22:45:56', '2021-09-06 03:42:42', NULL, 1),
(3, NULL, 'Campo A', 1, '2021-09-06 03:38:40', '2021-09-06 03:42:02', NULL, 1),
(4, 'CSSE', 'Course E', 3, '2021-09-06 03:41:05', '2021-10-28 22:26:11', NULL, 1),
(5, NULL, 'Course G', 4, '2021-09-06 03:41:26', '2021-09-06 03:43:17', NULL, 1),
(6, NULL, 'Campo B', 1, '2021-09-06 03:42:16', '2021-09-06 03:42:16', NULL, 1),
(7, 'CF', 'Campo F', 3, '2021-09-06 03:43:08', '2021-10-28 22:26:23', NULL, 1),
(8, NULL, 'Campo H', 4, '2021-09-06 03:43:30', '2021-09-06 03:43:30', NULL, 1),
(9, NULL, 'Campo I', 5, '2021-09-06 03:43:49', '2021-09-06 03:43:49', NULL, 1),
(10, NULL, 'Campo J', 5, '2021-09-06 03:43:58', '2021-09-06 03:43:58', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_tee_defaults`
--

CREATE TABLE `course_tee_defaults` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_tee_defaults`
--

INSERT INTO `course_tee_defaults` (`id`, `course_id`, `gender`, `tee_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'F', 1, '2021-08-13 22:11:28', '2021-08-13 22:11:28', NULL),
(2, 4, 'M', 4, '2021-09-07 00:26:57', '2021-09-07 00:58:30', NULL),
(3, 7, 'M', 5, '2021-09-07 00:54:06', '2021-09-07 00:54:06', NULL),
(4, 7, 'F', 7, '2021-09-07 00:59:42', '2021-09-07 00:59:42', NULL),
(5, 4, 'F', 6, '2021-09-07 01:00:09', '2021-09-07 01:00:09', NULL);

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
-- Table structure for table `holes`
--

CREATE TABLE `holes` (
  `id` int(10) UNSIGNED NOT NULL,
  `hole_number` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `par` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hole_raiting_male` double NOT NULL,
  `hole_raiting_female` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holes`
--

INSERT INTO `holes` (`id`, `hole_number`, `course_id`, `par`, `created_at`, `updated_at`, `deleted_at`, `hole_raiting_male`, `hole_raiting_female`) VALUES
(1, 1, 1, 4, '2021-08-13 22:11:43', '2022-02-23 00:36:37', NULL, 3, 7),
(2, 2, 1, 3, '2021-09-14 01:44:58', '2022-02-23 00:36:31', NULL, 13, 15),
(3, 3, 1, 4, '2021-09-14 01:44:58', '2022-02-23 00:37:14', NULL, 15, 17),
(4, 4, 1, 4, '2021-09-14 01:44:58', '2022-02-23 00:38:05', NULL, 7, 9),
(5, 5, 1, 4, '2021-09-14 01:44:58', '2022-02-23 00:39:45', NULL, 5, 5),
(6, 6, 1, 4, '2021-08-13 22:11:43', '2022-02-23 00:40:01', NULL, 1, 1),
(7, 7, 1, 5, '2021-09-14 01:44:58', '2022-02-23 00:40:44', NULL, 17, 11),
(8, 8, 1, 3, '2021-09-14 01:44:58', '2022-02-23 00:42:05', NULL, 11, 13),
(9, 9, 1, 5, '2021-09-14 01:44:58', '2022-02-23 00:42:23', NULL, 9, 3),
(10, 10, 1, 5, '2021-09-14 01:44:58', '2022-02-23 00:42:41', NULL, 4, 2),
(11, 11, 1, 3, '2021-08-13 22:11:43', '2022-02-23 01:05:07', NULL, 12, 10),
(14, 12, 1, 4, '2022-02-23 01:05:58', '2022-02-23 01:05:58', NULL, 6, 14),
(15, 13, 1, 4, '2022-02-23 01:07:37', '2022-02-23 01:07:37', NULL, 14, 8),
(16, 14, 1, 4, '2022-02-23 01:07:58', '2022-02-23 01:07:58', NULL, 18, 18),
(17, 15, 1, 3, '2022-02-23 01:08:54', '2022-02-23 01:08:54', NULL, 8, 12),
(18, 16, 1, 4, '2022-02-23 01:09:08', '2022-02-23 01:09:08', NULL, 2, 4),
(19, 17, 1, 4, '2022-02-23 01:09:29', '2022-02-23 01:09:29', NULL, 16, 16),
(20, 18, 1, 5, '2022-02-23 01:09:44', '2022-02-23 01:09:44', NULL, 10, 6);

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
(159, '2014_10_12_000000_create_users_table', 1),
(160, '2014_10_12_100000_create_password_resets_table', 1),
(161, '2019_08_19_000000_create_failed_jobs_table', 1),
(162, '2021_08_04_171938_create_permission_tables', 1),
(163, '2021_08_13_155403_create_countries_table', 1),
(164, '2021_08_13_160051_create_states_table', 1),
(165, '2021_08_13_160052_add_field_to_user', 1),
(166, '2021_08_13_161222_create_clubs_table', 1),
(167, '2021_08_13_162107_create_courses_table', 1),
(168, '2021_08_13_163729_create_tee_colors_table', 2),
(169, '2021_08_13_164032_create_tees_table', 3),
(170, '2021_08_13_170319_create_course_tee_defaults_table', 4),
(171, '2021_08_13_170943_create_holes_table', 5),
(172, '2021_08_13_171452_create_user_clubs_table', 6),
(173, '2021_08_13_174335_create_user_players_table', 7),
(174, '2021_08_13_174635_create_user_courses_table', 8),
(175, '2021_08_13_175435_create_user_scores_table', 9),
(176, '2021_08_16_160002_create_user_handicap_indices_table', 10),
(177, '2021_08_16_160012_create_user_hole_raitings_table', 11),
(178, '2021_08_16_175551_create_user_courses_table', 12),
(179, '2021_08_16_180117_create_user_courses_table', 13),
(180, '2016_06_01_000001_create_oauth_auth_codes_table', 14),
(181, '2016_06_01_000002_create_oauth_access_tokens_table', 14),
(182, '2016_06_01_000003_create_oauth_refresh_tokens_table', 14),
(183, '2016_06_01_000004_create_oauth_clients_table', 14),
(184, '2016_06_01_000005_create_oauth_personal_access_clients_table', 14),
(185, '2021_08_23_195235_add_enable_to_tables', 15),
(187, '2021_09_24_165557_create_user_groups_table', 16),
(188, '2021_10_07_193409_create_bets_table', 17),
(201, '2021_10_08_174410_create_bet_match_individuals_table', 18),
(202, '2021_10_08_174421_create_bet_medal_plays_table', 19),
(203, '2021_10_08_174440_create_bet_stablefords_table', 20),
(204, '2021_10_08_174448_create_bet_rompe_handicaps_table', 21),
(205, '2021_10_08_174456_create_bet_match_parejas_table', 22),
(206, '2021_10_08_174504_create_bet_skins_table', 23),
(207, '2021_10_08_174511_create_bet_greens_table', 24),
(208, '2021_10_08_174519_create_bet_raya_puntos_table', 25),
(209, '2022_02_22_182104_add_male_female_to_holes', 26),
(210, '2022_02_22_185050_add_course_id_to_holes', 27);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 36),
(3, 'App\\Models\\User', 37),
(3, 'App\\Models\\User', 39),
(3, 'App\\Models\\User', 41),
(3, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 44),
(3, 'App\\Models\\User', 48),
(1, 'App\\Models\\User', 49),
(1, 'App\\Models\\User', 50),
(1, 'App\\Models\\User', 51),
(3, 'App\\Models\\User', 52),
(3, 'App\\Models\\User', 53),
(3, 'App\\Models\\User', 54);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('095ae30df1cef496c0bc527abfdff89c8c452da56a510e5f6246609fcd4cb4c95a608532ab9dfd76', 10, 1, 'authToken', '[]', 0, '2021-08-18 01:45:32', '2021-08-18 01:45:32', '2022-08-17 20:45:32'),
('14175ff6e5559b5188c7ad15ed057c9d69843e2c90d08cd3c3698060f138f8890d7271b1583f5851', 12, 1, 'authToken', '[]', 0, '2021-12-27 06:56:26', '2021-12-27 06:56:26', '2022-12-27 00:56:26'),
('18f8e4984c4b441c0408a9b962abd395a15e2df9a1138f4fbb8437e12b15b8a368b56ce88567bb24', 10, 1, 'authToken', '[]', 0, '2021-08-18 07:33:55', '2021-08-18 07:33:55', '2022-08-18 02:33:55'),
('23602de51bef9e74e3b874bbe499ade01b571946dce7a7de6760facbeed8410ce57d2f7b67c39881', 12, 1, 'authToken', '[]', 0, '2021-10-15 22:20:10', '2021-10-15 22:20:10', '2022-10-15 17:20:10'),
('237ae395832869422227c2c1b7b0d0f93c1ca426cf3338742728a2f0fe6f8307b1b12913e4bbaad1', 11, 1, 'authToken', '[]', 0, '2021-08-17 02:44:10', '2021-08-17 02:44:10', '2022-08-16 21:44:10'),
('24be19d9060eed775fc7eb690aaf73c0bc62a23e2843fc410d622d2bdf41bd5515c346297b593cec', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:07:17', '2021-08-18 23:07:17', '2022-08-18 18:07:17'),
('26113fe4c9406811d49f55786256fb0a178d2845d661afa43c83ff050141b10d012a40e175dc2bef', 10, 1, 'authToken', '[]', 0, '2021-08-19 22:09:28', '2021-08-19 22:09:28', '2022-08-19 17:09:28'),
('26481ac42b35d6de178a8479c31b44476ec90abdad72bceb1f333cfc55a2404e49c4330764e8659b', 10, 1, 'authToken', '[]', 0, '2021-08-18 23:11:22', '2021-08-18 23:11:22', '2022-08-18 18:11:22'),
('33f8850d86a87f3a5f02065f3492a75496435845dfa992741ecd0283e0a7b5530d9a771e56ae6862', 44, 1, 'authToken', '[]', 0, '2021-09-28 02:49:17', '2021-09-28 02:49:17', '2022-09-27 21:49:17'),
('3b53228a9ea2805343c207dcb7344dfd5d3a9e75aff8b83a31c361c88a5aa90dfeaa41b8e9b1f0e2', 12, 1, 'authToken', '[]', 0, '2021-12-25 06:21:19', '2021-12-25 06:21:19', '2022-12-25 00:21:19'),
('3d41d23b081c00d3f126e04f26257a593974befa5ba0002f6dbaed4868510361b7c9a51e7ea60658', 14, 1, 'authToken', '[]', 0, '2021-08-31 02:32:56', '2021-08-31 02:32:56', '2022-08-30 21:32:56'),
('3fcdba33638a3ee68437b5464ccbd71c95eed00efeb2a2d7186e802afd52a15ae99cf367ce1a8c1f', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:07:07', '2021-08-18 23:07:07', '2022-08-18 18:07:07'),
('40ccca44cdb179a37686e74b3d93b12f18b9320941bfa972ba01c520b7b941299ae3ff0eb0dfee7f', 44, 1, 'authToken', '[]', 0, '2021-09-28 02:48:57', '2021-09-28 02:48:57', '2022-09-27 21:48:57'),
('4a19ff812e3d9fed43f3aada1f78b168fafa3371ae3bb4be351be5cf653feb53e3806ba3330b00ff', 12, 1, 'authToken', '[]', 0, '2021-12-26 05:22:12', '2021-12-26 05:22:12', '2022-12-25 23:22:12'),
('4ff008b5f054830f4daeee0e876e4cb552b6c7e0a872c2f41829835e4169bbbb43cec28e8d32a181', 10, 1, 'authToken', '[]', 0, '2021-08-18 02:18:00', '2021-08-18 02:18:00', '2022-08-17 21:18:00'),
('55e1ba7e68fbd69d07e93f876664ffba245cb4a551386718c651a553c91ddefdf231cc4626d54cf3', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:10:06', '2021-08-18 23:10:06', '2022-08-18 18:10:06'),
('5f76ca5aa823fc1b34557eec55c04d8ebafc254c25256040fe6b5ff4f3bf8f7cafa5c83338608a7e', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:07:34', '2021-08-18 23:07:34', '2022-08-18 18:07:34'),
('6f168a77dc59d4ef5b8166d4b8bdbb100e7f7d54533e6d5fdbd0d96cae0a9920273a5645f440cfaf', 10, 1, 'authToken', '[]', 0, '2021-08-19 20:56:46', '2021-08-19 20:56:46', '2022-08-19 15:56:46'),
('75a6f05a41b8eb522eacc4d28ee86437b884df4a6715fd2e520fddc00fc8e5d821ab9a473420715b', 12, 1, 'authToken', '[]', 0, '2021-11-17 04:33:46', '2021-11-17 04:33:46', '2022-11-16 22:33:46'),
('79fa5a76a0dd656ca7866d2d37cde2df99b137cfeaddfd74ce3a3b36611c87e71c5f07b2b415b8df', 12, 1, 'authToken', '[]', 0, '2021-12-26 05:15:56', '2021-12-26 05:15:56', '2022-12-25 23:15:56'),
('7a2cca4fee6bb145d003810177d7d6635e5f77a73cedea567240a17e789ef183c79aad6c00272f25', 11, 1, 'authToken', '[]', 0, '2021-08-17 00:49:52', '2021-08-17 00:49:52', '2022-08-16 19:49:52'),
('7f5c9314097094cedc3293794e5bae82f45860c84cc7af8bd58746d0f61f2e04aeeb76ab51257d93', 12, 1, 'authToken', '[]', 0, '2021-12-26 05:14:16', '2021-12-26 05:14:16', '2022-12-25 23:14:16'),
('8299a1b9b5cb4df49f2fd3d39b06d4125804687d628ecb7d99c3c6544068282c37d4fd6a758ee50f', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:09:48', '2021-08-18 23:09:48', '2022-08-18 18:09:48'),
('84c5951a922f7317afebc6db9dcd6a2771a555dede91278edde8f7d851f66e39aa79649e7917c176', 14, 1, 'authToken', '[]', 0, '2021-09-12 23:09:30', '2021-09-12 23:09:30', '2022-09-12 18:09:30'),
('85e92f49122ebda219f011d9b729f16c70130932fe252e0a410a7be3e6e0d6b59cbedb54517c7483', 12, 1, 'authToken', '[]', 0, '2021-12-26 05:24:03', '2021-12-26 05:24:03', '2022-12-25 23:24:03'),
('907747dc03da54375facca895b2fc1e64830884d01a886e2adaf2fb43b13087e054267b8c0d10431', 12, 1, 'authToken', '[]', 0, '2021-08-18 07:54:58', '2021-08-18 07:54:58', '2022-08-18 02:54:58'),
('919d1a1b7fa100d4cb4fbde10b8b3854b6e93c230091198ea29de1d64772807e3da323ecf558009c', 14, 1, 'authToken', '[]', 0, '2021-08-22 02:35:25', '2021-08-22 02:35:25', '2022-08-21 21:35:25'),
('9220e1078a563572946937588a7f03e35ea8fe5dcf2bad479a21bb19e40cf7cc71661165025c53ad', 12, 1, 'authToken', '[]', 0, '2021-10-21 00:38:23', '2021-10-21 00:38:23', '2022-10-20 19:38:23'),
('948ae7e3b96ec15592dec375f925c220bd76065b7b50452eb8377eb712a90ea5730ca366305920b4', 12, 1, 'authToken', '[]', 0, '2021-08-18 07:47:32', '2021-08-18 07:47:32', '2022-08-18 02:47:32'),
('956f47b976747e5c2904b415f84a4a299dcd70df6cfa0a5b6917f62ea62ae7c80e844262aa35edf0', 44, 1, 'authToken', '[]', 0, '2021-09-28 02:49:03', '2021-09-28 02:49:03', '2022-09-27 21:49:03'),
('95773b641769aaa9498064938735a462fc41f184be448ac42e9f633bb531f002e871bee58d82a187', 12, 1, 'authToken', '[]', 0, '2021-12-27 01:53:28', '2021-12-27 01:53:28', '2022-12-26 19:53:28'),
('964b260a92ecdb203cbae75265d5f1d055936c6a7fa940d151f66cdc65a830f19a8324c299ebca9e', 10, 1, 'authToken', '[]', 0, '2021-08-18 20:39:04', '2021-08-18 20:39:04', '2022-08-18 15:39:04'),
('979a79a96732f1b167f32e4ffe91b0f6cf22697d9b5a6b71a21381e987d28239c6fd542bcb586410', 11, 1, 'authToken', '[]', 0, '2021-08-17 00:50:23', '2021-08-17 00:50:23', '2022-08-16 19:50:23'),
('9bce17866ff8efc014bdbd1e9039a603e4bd92330c737ade6d4919e623a9d30856c5f1f7670f2ca9', 12, 1, 'authToken', '[]', 0, '2021-12-28 01:20:31', '2021-12-28 01:20:31', '2022-12-27 19:20:31'),
('a067e9a3f8a3cc6892bd5251274005f8a43af8029115bb1cd7e9df206274899988b6fc8b4c4c2e76', 10, 1, 'authToken', '[]', 0, '2021-08-18 02:35:26', '2021-08-18 02:35:26', '2022-08-17 21:35:26'),
('a123c2925f6655e5fd6aa356c17ef9b778fbb1eeb201072485cb39686706365ae1b036f0da7e9d73', 14, 1, 'authToken', '[]', 0, '2021-08-22 02:34:01', '2021-08-22 02:34:01', '2022-08-21 21:34:01'),
('ab1eea917796de82584b5c1e5714002050f722166abadff7165cbc7958869396d4bc3249b2df282b', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:11:58', '2021-08-18 23:11:58', '2022-08-18 18:11:58'),
('af25375b4d6c622780049666b4aeae27cba39e2cad735302690b8bda62e9beca14895f6a0a2b0a1b', 12, 1, 'authToken', '[]', 0, '2021-11-15 07:59:48', '2021-11-15 07:59:48', '2022-11-15 01:59:48'),
('b2dd6b696228f7fdb0856dfd7d6aefa77a8d5473df08c2d12feba7cc30d31c6002556ae466ebecd3', 10, 1, 'authToken', '[]', 0, '2021-08-18 01:42:40', '2021-08-18 01:42:40', '2022-08-17 20:42:40'),
('b3487de7e2c6c735c5d7d90275dc1e2fb571b4923ba268f2be4a4ca0a0c856b4793897e57ee8b619', 10, 1, 'authToken', '[]', 0, '2021-08-18 01:33:47', '2021-08-18 01:33:47', '2022-08-17 20:33:47'),
('b37234ad4bc0303d75c64d0e3f606692bc157e7072f6fba2cfe7415ab91e421a3abe955b7ed336b5', 14, 1, 'authToken', '[]', 0, '2021-09-05 23:57:43', '2021-09-05 23:57:43', '2022-09-05 18:57:43'),
('bf1a5131df0b310e9b937b183a051f53d0291ffd8a8a1312e7c61ccb732084bde253fbd0d937e721', 11, 1, 'authToken', '[]', 0, '2021-08-17 02:29:31', '2021-08-17 02:29:31', '2022-08-16 21:29:31'),
('c3a39507bfc47974bdb4b54bfa9bacbb703ca5952252a7d5c8267043e4185333329890f23d842ef9', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:06:56', '2021-08-18 23:06:56', '2022-08-18 18:06:56'),
('c4d87443f74510cc4c9ca321c7e3b1a3163f38f96e84c4333d59929a12e436acb796463606057476', 12, 1, 'authToken', '[]', 0, '2021-12-17 23:55:20', '2021-12-17 23:55:20', '2022-12-17 17:55:20'),
('c85b8efbc24625411b3edd1f9326491fb71bb7707f2df6c34f3134c4b6411a1424f5d52b7c891647', 12, 1, 'authToken', '[]', 0, '2022-01-07 22:28:11', '2022-01-07 22:28:11', '2023-01-07 16:28:11'),
('c8729561479c4465300c9c757ed86d590e1d6528eb0c7e6ab0fab93e488607a73254f9071d719fc2', 12, 1, 'authToken', '[]', 0, '2022-01-08 01:31:59', '2022-01-08 01:31:59', '2023-01-07 19:31:59'),
('ceb49e4ca16e4aae6e8c60c3d7023da6d3ab43543fdd6759e4de2706b3a9cf27ccb74c1202654643', 10, 1, 'authToken', '[]', 0, '2021-08-18 03:21:08', '2021-08-18 03:21:08', '2022-08-17 22:21:08'),
('d1fd20860f4e85ded638f149769f2f45afcfc9354a3cb2de475cf9f3f726483a7b53f75094a27ee9', 12, 1, 'authToken', '[]', 0, '2021-10-21 00:40:37', '2021-10-21 00:40:37', '2022-10-20 19:40:37'),
('d2a2bfba194811c2638700df221dda7bc89a9e188797a5d51d527993a1a2ac49b171e25c289c9c41', 10, 1, 'authToken', '[]', 0, '2021-08-19 21:48:12', '2021-08-19 21:48:12', '2022-08-19 16:48:12'),
('d51eb78b46cb55517957e54bb3b6dadb9525d670f41b06b21615e0fc49a9339aea9e3fff4ea3f315', 14, 1, 'authToken', '[]', 0, '2021-09-03 07:27:31', '2021-09-03 07:27:31', '2022-09-03 02:27:31'),
('d741a4e5496c881d4fe627e961554984423688d6cfe3108d606106ecdbf0346a15cd82596fb9ccfd', 12, 1, 'authToken', '[]', 0, '2022-03-05 02:06:24', '2022-03-05 02:06:24', '2023-03-04 20:06:24'),
('da3fc096b9fbf0209300dec12e1aa998158e6288ebcec0bc34c8ed0974238cb8d7a4c4d8b317e947', 14, 1, 'authToken', '[]', 0, '2021-08-22 03:39:15', '2021-08-22 03:39:15', '2022-08-21 22:39:15'),
('de64291a181ca5b4216f0c79f40f0ddf35a7f9572c3ccbf6378304ebe295785860178fd9f3c811c9', 14, 1, 'authToken', '[]', 0, '2021-08-31 01:50:38', '2021-08-31 01:50:38', '2022-08-30 20:50:38'),
('e0b2684e1ebd39a37aa005a2d917e016d928ffdd0b1c5983c5056f7165df07aae67e99e30123e7a5', 12, 1, 'authToken', '[]', 0, '2021-12-26 05:14:55', '2021-12-26 05:14:55', '2022-12-25 23:14:55'),
('e4f8450155cd2c4d78225187d1f3a27de0b1df09e50844cc51a2fb17417b077acb5738019a5068ea', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:08:40', '2021-08-18 23:08:40', '2022-08-18 18:08:40'),
('eae4e0943e4a2669c4345009ba2ebc22cc61f880a0a687eb5e422cda76c9f06ca747eb7bf7500b02', 16, 1, 'authToken', '[]', 0, '2021-08-28 21:33:57', '2021-08-28 21:33:57', '2022-08-28 16:33:57'),
('f5d859a01f7aef5aab9d3ebe4f0d5803995d5ce796aa720f25f27e7532b3befb5eec42a41062f6ad', 14, 1, 'authToken', '[]', 0, '2021-09-01 23:06:30', '2021-09-01 23:06:30', '2022-09-01 18:06:30'),
('f791d8ff4f2b21c257796e7c4382d6dbaf0570461bed24ce491d814b42a7c8912f9300046227021e', 13, 1, 'authToken', '[]', 0, '2021-08-18 23:06:59', '2021-08-18 23:06:59', '2022-08-18 18:06:59'),
('fb7bf971ddff9e459ba858ccaef90fe2e488aa786f510fe6b5136788fb9184da77d3d5281e3fc35d', 10, 1, 'authToken', '[]', 0, '2021-08-18 07:37:21', '2021-08-18 07:37:21', '2022-08-18 02:37:21'),
('fd76e61a01fab43fa0f7b9558ca8cdc58f171fa54baff221b4aa85ad7eeb190253849b4db0a00081', 10, 1, 'authToken', '[]', 0, '2021-08-18 02:31:45', '2021-08-18 02:31:45', '2022-08-17 21:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'lGvYOdlXlCQY2niVe3qb7E3vFcYBxx015CPjVqKI', NULL, 'http://localhost', 1, 0, 0, '2021-08-17 00:49:48', '2021-08-17 00:49:48'),
(2, NULL, 'Laravel Password Grant Client', 'NBP2fRHY5WUTSGGNtnskpQF5aQAZaAZyGqGJJqzK', 'users', 'http://localhost', 0, 1, 0, '2021-08-17 00:49:48', '2021-08-17 00:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-17 00:49:48', '2021-08-17 00:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'web', '2021-08-13 22:38:19', '2021-08-13 22:38:19', NULL),
(2, 'usuario', 'web', '2021-08-16 04:55:03', '2021-08-16 04:55:03', NULL),
(3, 'jugador', 'web', '2021-08-16 04:55:16', '2021-08-16 04:55:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `code`, `name`, `created_at`, `updated_at`, `deleted_at`, `enabled`) VALUES
(1, 1, 'SLP', 'San Luis Potosi', '2021-08-13 21:42:41', '2021-08-13 21:42:41', NULL, 1),
(2, 2, 'TX', 'Texas', '2021-08-25 08:35:00', '2021-08-25 08:35:00', NULL, 1),
(3, 1, 'Qro', 'Querétaro', '2021-09-06 03:25:36', '2021-09-06 03:36:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tees`
--

CREATE TABLE `tees` (
  `id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(4) NOT NULL DEFAULT '0',
  `course_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teecolor_id` int(10) UNSIGNED NOT NULL,
  `slope` double NOT NULL,
  `rating` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tees`
--

INSERT INTO `tees` (`id`, `enabled`, `default`, `course_id`, `gender`, `teecolor_id`, `slope`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'F', 2, 133, 71.8, '2021-08-13 21:43:34', '2022-02-23 01:37:29', NULL),
(2, 1, 0, 1, 'M', 1, 132, 71, '2021-08-16 03:58:16', '2022-02-23 02:23:17', NULL),
(3, 1, 1, 1, 'M', 5, 132, 69.8, '2021-08-22 03:19:26', '2022-02-23 01:39:40', NULL),
(4, 1, 0, 1, 'M', 6, 124, 66, '2021-09-06 23:35:50', '2022-02-23 02:23:24', NULL),
(5, 1, 1, 7, 'M', 4, 12, 12, '2021-09-07 00:53:39', '2021-12-08 23:32:46', NULL),
(6, 1, 1, 4, 'F', 3, 23, 23, '2021-09-07 00:59:06', '2021-12-08 23:33:00', NULL),
(7, 1, 1, 7, 'F', 4, 23, 23, '2021-09-07 00:59:23', '2021-12-08 23:33:09', NULL),
(8, 1, 1, 2, 'F', 1, 20, 3, '2021-11-10 02:00:21', '2021-11-10 02:04:08', NULL),
(9, 1, 1, 2, 'M', 2, 12, 21, '2021-11-10 02:04:46', '2021-11-10 02:04:57', NULL),
(10, 1, 0, 2, 'F', 4, 4, 4, '2021-11-10 02:05:19', '2021-11-10 02:05:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tee_colors`
--

CREATE TABLE `tee_colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tee_colors`
--

INSERT INTO `tee_colors` (`id`, `name`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Azules', '#152e7a', '2021-08-13 21:41:47', '2021-08-25 04:29:56', NULL),
(2, 'Rojas', '#ff0000', '2021-08-16 03:57:33', '2022-02-23 01:32:03', NULL),
(3, 'Rosa', '#d312a0', '2021-08-25 04:30:19', '2021-08-25 04:30:19', NULL),
(4, 'Verde', '#669c35', '2021-08-31 02:07:47', '2021-08-31 02:07:47', NULL),
(5, 'Blancas', '#ffffff', '2022-02-23 01:31:38', '2022-02-23 01:32:07', NULL),
(6, 'Doradas', '#e2c63c', '2022-02-23 01:32:44', '2022-02-23 01:32:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` tinyint(1) NOT NULL DEFAULT '0',
  `privacy_notice` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `api_token`, `created_at`, `updated_at`, `enabled`, `alias`, `lastname`, `gender`, `country_id`, `state_id`, `fcm_token`, `phone_code`, `phone`, `terms`, `privacy_notice`) VALUES
(1, 'Super Admin', 'aldouli6@gmail.com', NULL, '$2y$10$h5PhAcsTxew4FzRZyTtO.e/Buzl5R..IOawaOgCbBcjYwc/TxP.xS', NULL, NULL, '2021-08-13 22:41:17', '2021-08-25 09:10:16', 1, 'admin', 'Admin', 'M', 1, 1, NULL, NULL, '4531318574', 0, 0),
(8, 'uno', 'aldouli@admin.com', NULL, '$2y$10$ygWWgJtOBWQSCxoXzhzWBuGnk/qa3hCb1iqGAQ6Z2ClJLA3.PsGNG', NULL, NULL, '2021-08-16 23:25:42', '2021-08-16 23:25:42', 1, '12', 'dos', 'M', 1, 1, NULL, NULL, '1234567890', 0, 0),
(9, 'otro', 'aldouli6@yandex.comm', NULL, '$2y$10$7pfFUF8Esd7/iPmazit5Zehbv.CfN/gUfeOoX7CF6n9y237IKwrAO', NULL, NULL, '2021-08-16 23:43:56', '2021-08-16 23:43:56', 1, 'otro', 'orro', 'M', 1, 1, NULL, NULL, '1234567899', 0, 0),
(11, 'aldo', 'alalal@admin.com', '2021-08-16 19:25:50', '$2y$10$pqu./QaqA6GIFn93gYwkoOXivSHBwuevkTMipQ1oxiYTQEyCbhRbG', NULL, NULL, '2021-08-16 23:53:04', '2021-08-16 23:53:04', 1, 'aliaaa', 'Ulises', 'M', 1, 1, NULL, NULL, '4564564564', 0, 0),
(12, 'Aldo', 'aldo@admin.com', '2021-08-18 02:47:26', '$2y$10$7LkWwJ88qyauagvQrC79RuCjho4Hi14Eg.KgfV8mViFPi.oSHFJJO', NULL, NULL, '2021-08-18 07:46:40', '2021-12-02 23:56:30', 1, '123', 'Ulises', 'M', 1, 1, NULL, 'MX', 'MX1234563334', 0, 0),
(13, 'Admin', 'admin@admin.com', '2021-08-17 18:06:45', '$2y$10$rIcFv1eoBKpxpQakGeyI6Ob84Xgq1Iml8IRQWhhycs9TTTpCkIPu2', NULL, NULL, '2021-08-18 23:06:17', '2021-08-18 23:06:17', 1, 'velez', 'Velez', 'F', 1, 1, NULL, NULL, '1234567898', 0, 0),
(14, 'Aldo', 'asf@sdf.cooo', '2021-08-21 21:33:25', '$2y$10$2pC3NTvW012tCSjqCk.DJePxilob0ngYPAtabq4ZbnlUjk74RUwka', NULL, NULL, '2021-08-22 02:33:11', '2021-10-06 22:13:53', 1, '234', 'safa', 'M', 1, 3, NULL, 'MX', '+520987654321', 0, 0),
(15, 'Aldo', 'a@a.com', NULL, '$2y$10$S364Sp7GUtbpMk20GHLSlevwQyMqupN2HEYKoFz6De8nz06G5xZKC', NULL, NULL, '2021-08-22 03:21:04', '2021-08-22 03:21:04', 1, 'aldo', 'Velez', 'M', 1, 1, NULL, 'MX', '+521234567898', 0, 0),
(16, 'dos', 'aldouli6@yandex.com', '2021-08-27 16:33:48', '$2y$10$LOGIIUjJyWLSPUtIcFBYquWMHxuCBwyeHowwLbNxN3QI74yY9AyfC', NULL, NULL, '2021-08-27 06:44:47', '2021-08-27 06:44:47', 1, 'uno', 'tres', 'M', 1, 1, NULL, 'MX', '+521234567890', 0, 0),
(26, 'uno', 'a@w.com', NULL, 'ffxx4YnFG3', NULL, NULL, '2021-09-22 00:12:42', '2021-09-22 00:12:42', 1, 'qeerty', 'do', 'M', NULL, 3, NULL, 'MX', '+521233567890', 0, 0),
(36, 'uno', 'aa@w.com', NULL, '3buFfQx3Wn', NULL, NULL, '2021-09-22 01:02:19', '2021-09-22 01:02:19', 1, 'qeearty', 'do', 'M', 1, 3, NULL, 'MX', '+521333567890', 0, 0),
(37, 'uno', 'aa@3w.com', NULL, 'H9sTqqZ5tb', NULL, NULL, '2021-09-22 01:04:55', '2021-09-22 01:04:55', 1, 'qeea3rty', 'do', 'M', 1, 3, NULL, 'MX', '+521333563890', 0, 0),
(39, 'uno', 'aa@3w4.com', NULL, 'JoBRTt5fOZ', NULL, NULL, '2021-09-22 01:06:57', '2021-09-22 01:06:57', 1, 'qeea3rt4y', 'do', 'M', 1, 3, NULL, 'MX', '+521334563890', 0, 0),
(41, 'Aldooo', 'asf@sdf.co', NULL, 'Yw8o2rbiFY', NULL, NULL, '2021-09-22 06:36:44', '2021-09-24 02:16:37', 1, '2344', 'safas', 'M', 1, 3, NULL, 'MX', '+520987655321', 0, 0),
(42, 'Guillermo', 'direccion@gmail.com', NULL, '7XxQi5fkyR', NULL, NULL, '2021-09-22 23:20:40', '2021-09-25 01:05:09', 1, 'Alias', 'Palazuelos Figueroa', 'M', 1, 1, NULL, 'US', '+11111111111', 0, 0),
(43, 'Carl0s', 'carla@lopez.com', NULL, 'XORjbniJ9d', NULL, NULL, '2021-09-23 00:25:46', '2021-10-04 22:56:50', 1, 'unosss', 'Lopez Pedroza', 'F', 2, 2, NULL, 'MX', '+529874563210', 0, 0),
(44, 'Rrwerr', 'a@f.com', '2021-09-27 21:48:29', '$2y$10$4ggiclumQNDNQ5mcWeyPueld8lxKxwg9VshdnRJFUbsHqc/5JmuhS', NULL, NULL, '2021-09-28 02:31:23', '2021-09-28 21:05:25', 1, 'ser', 'dsfgds', 'F', 1, 3, NULL, 'MX', '+520987098709', 0, 0),
(48, 'aaf', 'asd@sdf.com', NULL, 'dQvZTKQ08H', NULL, NULL, '2021-10-06 21:53:33', '2021-10-06 21:53:33', 1, 'sdf', 'asd', 'F', 1, 3, NULL, 'MX', '+521231234567', 0, 0),
(49, 'gpf', 'sfssfddf@fjgh.comm', NULL, 'EwEgAaP2oA', NULL, NULL, '2021-10-31 08:49:17', '2022-03-02 03:09:52', 1, 'gpf', 'dsdfssdf', 'M', 1, 1, NULL, 'MX', '+521234567894', 0, 0),
(50, 'Ricardo', 'hg@5.comd', NULL, 'JpvmaSkYFo', NULL, NULL, '2021-10-31 08:51:17', '2022-03-02 03:09:52', 1, 'Ricardo', 'rdez', 'M', 1, 1, NULL, 'US', '+10987654322', 0, 0),
(51, 'kjhbjbklnn', 'jvvv@kjg.cooo', NULL, 'kTnxnk075e', NULL, NULL, '2021-10-31 08:52:21', '2022-02-23 05:12:20', 1, 'benito', 'jjgcggjh', 'M', 2, 2, NULL, 'MX', '+521231231234', 0, 0),
(52, 'luiis', 'alfo@we.cooom', NULL, 'C21V3GAsRp', NULL, NULL, '2021-11-02 04:24:17', '2022-03-02 03:09:52', 1, 'luis', 'ddss', 'M', 1, 1, NULL, 'MX', '+528765676543', 0, 0),
(53, 'mariia', 'lll@rr.com', NULL, 'hN0zncpe77', NULL, NULL, '2021-11-02 04:28:25', '2022-02-23 02:07:25', 1, 'maria', 'jugadora', 'F', 1, 3, NULL, 'MX', '+529889878765', 0, 0),
(54, 'francisco', 'sex@e.com', NULL, 'rwAjc6Zkri', NULL, NULL, '2021-11-06 03:07:02', '2022-03-02 03:09:52', 1, 'francisco', 'jugador', 'M', 2, 2, NULL, 'MX', '+520943112345', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_clubs`
--

CREATE TABLE `user_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` int(10) UNSIGNED NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_clubs`
--

INSERT INTO `user_clubs` (`id`, `user_id`, `club_id`, `classification`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '1', '2021-08-13 22:42:27', '2021-08-16 21:59:10', '2021-08-16 21:59:10'),
(2, 1, 1, '2', '2021-08-16 22:10:30', '2021-09-03 03:16:35', '2021-09-03 03:16:35'),
(4, 1, 1, '1', '2021-08-16 22:20:05', '2021-08-16 22:25:39', '2021-08-16 22:25:39'),
(6, 8, 1, '1', '2021-08-16 23:25:42', '2021-09-03 03:16:38', '2021-09-03 03:16:38'),
(7, 9, 1, '1', '2021-08-16 23:43:56', '2021-09-03 03:16:42', '2021-09-03 03:16:42'),
(9, 11, 1, '1', '2021-08-16 23:53:04', '2021-09-03 03:16:33', '2021-09-03 03:16:33'),
(10, 12, 1, '1', '2021-08-18 07:46:40', '2021-09-03 03:16:29', '2021-09-03 03:16:29'),
(11, 14, 2, '1', '2021-08-18 23:06:17', '2021-10-02 01:28:25', '2021-10-02 01:28:25'),
(12, 14, 1, '1', '2021-08-22 02:33:11', '2021-09-11 00:34:18', '2021-09-11 00:34:18'),
(13, 15, 1, '1', '2021-08-22 03:21:04', '2021-09-03 03:16:23', '2021-09-03 03:16:23'),
(14, 16, 2, '1', '2021-08-27 06:44:47', '2021-09-03 03:16:19', '2021-09-03 03:16:19'),
(15, 14, 3, '3', '2021-09-06 07:54:35', '2021-09-06 08:30:32', '2021-09-06 08:30:32'),
(16, 14, 5, '3', '2021-09-06 08:28:46', '2021-09-06 08:30:34', '2021-09-06 08:30:34'),
(17, 14, 3, '3', '2021-09-06 08:38:58', '2021-09-06 08:40:06', '2021-09-06 08:40:06'),
(18, 14, 5, '3', '2021-09-06 08:39:23', '2021-09-06 08:40:07', '2021-09-06 08:40:07'),
(19, 14, 3, '3', '2021-09-06 08:40:18', '2021-09-06 08:43:30', '2021-09-06 08:43:30'),
(20, 14, 5, '3', '2021-09-06 08:41:15', '2021-09-06 08:43:31', '2021-09-06 08:43:31'),
(21, 14, 4, '3', '2021-09-06 08:42:47', '2021-09-06 08:43:32', '2021-09-06 08:43:32'),
(22, 14, 4, '3', '2021-09-06 08:52:41', '2021-09-07 01:51:31', '2021-09-07 01:51:31'),
(23, 14, 3, '3', '2021-09-06 22:42:14', '2021-09-06 22:55:03', '2021-09-06 22:55:03'),
(24, 14, 3, '3', '2021-09-06 23:02:47', '2021-09-06 23:33:46', '2021-09-06 23:33:46'),
(25, 14, 3, '3', '2021-09-06 23:36:37', '2021-09-06 23:36:37', '2021-09-06 23:36:37'),
(26, 14, 3, '3', '2021-09-07 00:27:05', '2021-09-07 00:27:05', '2021-09-07 00:27:05'),
(27, 14, 3, '3', '2021-09-07 00:32:24', '2021-09-07 00:42:17', '2021-09-07 00:42:17'),
(28, 14, 3, '3', '2021-09-07 00:43:19', '2021-09-07 00:52:26', '2021-09-07 00:52:26'),
(29, 14, 3, '3', '2021-09-07 00:53:12', '2021-09-07 00:53:12', '2021-09-07 00:53:12'),
(30, 14, 3, '3', '2021-09-07 00:54:11', '2021-09-07 00:54:11', '2021-09-07 00:54:11'),
(31, 14, 3, '3', '2021-09-07 00:54:29', '2021-09-07 00:58:17', '2021-09-07 00:58:17'),
(32, 14, 3, '3', '2021-09-07 00:58:44', '2021-09-07 00:58:44', '2021-09-07 00:58:44'),
(33, 14, 3, '1', '2021-09-07 01:00:15', '2021-09-07 01:51:54', '2021-09-07 01:51:54'),
(36, 14, 3, '3', '2021-09-07 01:52:10', '2021-10-02 21:42:50', '2021-10-02 21:42:50'),
(39, 14, 3, '3', '2021-09-11 00:48:33', '2021-10-02 21:42:50', '2021-10-02 21:42:50'),
(40, 44, 2, '1', '2021-09-28 02:31:23', '2021-09-28 02:31:23', NULL),
(42, 14, 3, '3', '2021-10-02 21:43:10', '2021-10-02 21:43:56', '2021-10-02 21:43:56'),
(43, 14, 3, '3', '2021-10-02 21:54:09', '2021-10-02 22:01:24', '2021-10-02 22:01:24'),
(44, 14, 3, '1', '2021-10-02 22:01:33', '2021-10-28 22:24:55', NULL),
(46, 12, 3, '2', '2021-10-15 22:20:25', '2021-12-08 23:32:16', '2021-12-08 23:32:16'),
(61, 12, 2, '3', '2021-11-10 02:16:43', '2021-11-10 02:20:47', '2021-11-10 02:20:47'),
(62, 12, 2, '3', '2021-11-10 04:49:14', '2021-11-10 05:23:50', '2021-11-10 05:23:50'),
(63, 12, 2, '3', '2021-11-10 05:24:01', '2021-11-10 05:29:45', '2021-11-10 05:29:45'),
(64, 12, 2, '3', '2021-11-10 05:32:47', '2021-11-10 05:34:00', '2021-11-10 05:34:00'),
(65, 12, 2, '3', '2021-11-10 05:34:10', '2021-11-10 05:34:46', '2021-11-10 05:34:46'),
(66, 12, 2, '3', '2021-11-10 05:34:54', '2021-11-10 05:36:37', '2021-11-10 05:36:37'),
(67, 12, 2, '3', '2021-11-10 05:36:58', '2021-11-10 05:37:52', '2021-11-10 05:37:52'),
(68, 12, 2, '3', '2021-11-10 05:38:02', '2021-11-10 05:38:32', '2021-11-10 05:38:32'),
(69, 12, 2, '3', '2021-11-10 05:38:39', '2021-11-10 05:39:52', '2021-11-10 05:39:52'),
(70, 12, 2, '3', '2021-11-10 05:40:03', '2021-11-10 05:41:36', '2021-11-10 05:41:36'),
(71, 12, 2, '3', '2021-11-10 05:41:45', '2021-11-10 05:42:32', '2021-11-10 05:42:32'),
(72, 12, 2, '3', '2021-11-10 05:42:40', '2021-11-10 05:43:25', '2021-11-10 05:43:25'),
(73, 12, 2, '3', '2021-11-10 05:47:57', '2021-11-10 07:50:27', '2021-11-10 07:50:27'),
(74, 12, 2, '3', '2021-11-10 07:56:48', '2021-11-10 07:58:15', '2021-11-10 07:58:15'),
(75, 12, 2, '3', '2021-11-10 07:58:29', '2021-11-10 08:00:23', '2021-11-10 08:00:23'),
(76, 12, 2, '3', '2021-11-10 08:00:35', '2021-11-10 08:01:06', '2021-11-10 08:01:06'),
(77, 12, 2, '3', '2021-11-10 08:01:13', '2021-11-10 08:03:08', '2021-11-10 08:03:08'),
(78, 12, 2, '3', '2021-11-10 08:03:24', '2021-11-10 08:37:54', '2021-11-10 08:37:54'),
(79, 12, 2, '3', '2021-11-10 08:38:22', '2021-11-10 08:39:17', '2021-11-10 08:39:17'),
(80, 12, 2, '2', '2021-11-10 08:39:45', '2021-11-15 07:28:22', '2021-11-15 07:28:22'),
(81, 12, 2, '3', '2021-11-15 07:33:27', '2021-11-15 07:47:53', '2021-11-15 07:47:53'),
(82, 12, 2, '3', '2021-11-15 07:49:29', '2021-11-15 07:50:54', '2021-11-15 07:50:54'),
(83, 12, 2, '3', '2021-11-15 07:52:18', '2021-11-15 07:55:59', '2021-11-15 07:55:59'),
(84, 12, 2, '3', '2021-11-15 07:56:27', '2021-11-15 07:57:00', '2021-11-15 07:57:00'),
(85, 12, 2, '3', '2021-11-15 08:01:13', '2021-11-15 08:03:07', '2021-11-15 08:03:07'),
(86, 12, 2, '3', '2021-11-15 08:03:59', '2021-11-15 08:05:45', '2021-11-15 08:05:45'),
(87, 12, 2, '3', '2021-11-15 08:08:35', '2021-11-15 08:11:50', '2021-11-15 08:11:50'),
(88, 12, 2, '3', '2021-11-15 08:14:10', '2021-11-15 08:14:39', '2021-11-15 08:14:39'),
(89, 12, 2, '3', '2021-11-15 08:16:32', '2021-11-15 08:17:25', '2021-11-15 08:17:25'),
(90, 12, 2, '3', '2021-11-15 08:17:35', '2021-11-28 13:55:46', '2021-11-28 13:55:46'),
(91, 12, 2, '3', '2021-11-28 13:56:04', '2021-12-03 00:10:28', '2021-12-03 00:10:28'),
(92, 12, 2, '2', '2021-12-03 00:10:49', '2022-01-10 03:49:24', '2022-01-10 03:49:24'),
(94, 12, 3, '3', '2021-12-08 23:33:16', '2022-01-10 03:36:55', '2022-01-10 03:36:55'),
(95, 12, 3, '3', '2022-01-10 03:44:36', '2022-01-10 03:46:04', '2022-01-10 03:46:04'),
(96, 12, 3, '1', '2022-01-10 03:49:08', '2022-01-10 03:49:16', NULL),
(97, 12, 2, '3', '2022-01-10 03:49:30', '2022-01-10 03:49:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `tee_default_male` int(10) UNSIGNED DEFAULT NULL,
  `tee_default_female` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `user_id`, `course_id`, `tee_default_male`, `tee_default_female`, `created_at`, `updated_at`, `deleted_at`, `classification`) VALUES
(1, 1, 2, 2, 1, '2021-08-16 23:02:09', '2021-09-16 23:01:35', '2021-09-16 23:01:35', '1'),
(2, 8, 1, 2, 1, '2021-08-16 23:25:42', '2021-09-16 23:01:38', '2021-09-16 23:01:38', NULL),
(4, 11, 1, 2, 3, '2021-08-16 23:53:04', '2021-09-16 23:01:50', '2021-09-16 23:01:50', '1'),
(5, 12, 1, 2, 1, '2021-08-18 07:46:40', '2021-09-16 23:01:46', '2021-09-16 23:01:46', NULL),
(6, 13, 1, NULL, NULL, '2021-08-18 23:06:17', '2021-09-16 23:01:54', '2021-09-16 23:01:54', NULL),
(7, 14, 1, 2, 1, '2021-08-22 02:33:11', '2021-10-02 21:10:47', '2021-10-02 21:10:47', '2'),
(8, 15, 1, 2, 1, '2021-08-22 03:21:04', '2021-09-16 23:01:59', '2021-09-16 23:01:59', '3'),
(9, 14, 1, 2, 3, '2021-08-27 06:44:47', '2021-10-02 01:24:42', '2021-10-02 01:24:42', '1'),
(10, 14, 4, 4, 6, '2021-09-07 01:08:47', '2021-10-02 21:42:17', '2021-10-02 21:42:17', '3'),
(11, 14, 7, 5, 7, '2021-09-07 01:08:47', '2021-10-02 21:42:49', '2021-10-02 21:42:49', '3'),
(12, 14, 4, 4, 6, '2021-09-11 00:48:33', '2021-10-02 21:42:49', '2021-10-02 21:42:49', '3'),
(13, 14, 7, 5, 7, '2021-09-11 00:48:33', '2021-10-02 21:28:07', '2021-10-02 21:28:07', '3'),
(14, 44, 1, 2, 3, '2021-09-28 02:31:23', '2021-10-02 22:00:59', NULL, '2'),
(15, 14, 4, 4, 6, '2021-10-02 21:43:10', '2021-10-02 21:43:56', '2021-10-02 21:43:56', '3'),
(16, 14, 7, 5, 7, '2021-10-02 21:43:10', '2021-10-02 21:43:56', '2021-10-02 21:43:56', '3'),
(17, 14, 4, 4, 6, '2021-10-02 21:54:09', '2021-10-02 22:01:24', '2021-10-02 22:01:24', '2'),
(18, 14, 7, 5, 7, '2021-10-02 21:54:09', '2021-10-02 21:59:22', '2021-10-02 21:59:22', '3'),
(19, 14, 4, 4, 6, '2021-10-02 22:01:33', '2021-10-04 22:47:29', '2021-10-04 22:47:29', '3'),
(20, 14, 7, 5, 7, '2021-10-02 22:01:33', '2021-10-04 22:43:43', NULL, '1'),
(21, 12, 4, 4, 6, '2021-10-15 22:20:25', '2021-12-08 23:32:16', '2021-12-08 23:32:16', '2'),
(22, 12, 7, 5, 7, '2021-10-15 22:20:25', '2021-12-08 23:32:16', '2021-12-08 23:32:16', '2'),
(23, 12, 1, 2, 1, '2021-11-10 02:16:43', '2021-11-10 02:20:03', '2021-11-10 02:20:03', '3'),
(24, 12, 2, 9, 8, '2021-11-10 02:16:43', '2021-11-10 02:20:03', '2021-11-10 02:20:03', '3'),
(25, 12, 1, 2, 1, '2021-11-10 04:49:14', '2021-11-10 04:50:37', '2021-11-10 04:50:37', '3'),
(26, 12, 2, 9, 8, '2021-11-10 04:49:14', '2021-11-10 04:50:39', '2021-11-10 04:50:39', '3'),
(27, 12, 1, 2, 1, '2021-11-10 05:24:01', '2021-11-10 05:29:35', '2021-11-10 05:29:35', '3'),
(28, 12, 2, 9, 8, '2021-11-10 05:24:01', '2021-11-10 05:29:35', '2021-11-10 05:29:35', '3'),
(29, 12, 1, 2, 1, '2021-11-10 05:32:47', '2021-11-10 05:36:53', '2021-11-10 05:36:53', '3'),
(30, 12, 2, 9, 8, '2021-11-10 05:32:47', '2021-11-10 05:36:53', '2021-11-10 05:36:53', '3'),
(31, 12, 1, 2, 1, '2021-11-10 05:36:58', '2021-11-15 07:26:38', '2021-11-15 07:26:38', '2'),
(32, 12, 2, 9, 8, '2021-11-10 05:36:58', '2021-11-15 07:26:38', '2021-11-15 07:26:38', '2'),
(33, 12, 1, 2, 1, '2021-11-15 07:33:27', '2021-11-15 07:47:53', '2021-11-15 07:47:53', '3'),
(34, 12, 2, 9, 8, '2021-11-15 07:33:27', '2021-11-15 07:47:53', '2021-11-15 07:47:53', '3'),
(35, 12, 1, 2, 1, '2021-11-15 07:49:29', '2021-11-15 07:50:54', '2021-11-15 07:50:54', '3'),
(36, 12, 2, 9, 8, '2021-11-15 07:49:29', '2021-11-15 07:50:54', '2021-11-15 07:50:54', '3'),
(37, 12, 1, 2, 1, '2021-11-15 07:52:18', '2021-11-15 07:55:59', '2021-11-15 07:55:59', '3'),
(38, 12, 2, 9, 8, '2021-11-15 07:52:18', '2021-11-15 07:55:59', '2021-11-15 07:55:59', '3'),
(39, 12, 1, 2, 1, '2021-11-15 07:56:27', '2021-11-15 07:57:00', '2021-11-15 07:57:00', '3'),
(40, 12, 2, 9, 8, '2021-11-15 07:56:27', '2021-11-15 07:57:00', '2021-11-15 07:57:00', '3'),
(41, 12, 1, 2, 1, '2021-11-15 08:01:13', '2021-11-15 08:03:06', '2021-11-15 08:03:06', '3'),
(42, 12, 2, 9, 8, '2021-11-15 08:01:13', '2021-11-15 08:03:07', '2021-11-15 08:03:07', '3'),
(43, 12, 1, 2, 1, '2021-11-15 08:03:59', '2021-11-15 08:05:45', '2021-11-15 08:05:45', '3'),
(44, 12, 2, 9, 8, '2021-11-15 08:03:59', '2021-11-15 08:05:45', '2021-11-15 08:05:45', '3'),
(45, 12, 1, 2, 1, '2021-11-15 08:08:35', '2021-11-15 08:11:50', '2021-11-15 08:11:50', '3'),
(46, 12, 2, 9, 8, '2021-11-15 08:08:35', '2021-11-15 08:11:50', '2021-11-15 08:11:50', '3'),
(47, 12, 1, 2, 1, '2021-11-15 08:14:10', '2021-11-15 08:14:39', '2021-11-15 08:14:39', '3'),
(48, 12, 2, 9, 8, '2021-11-15 08:14:10', '2021-11-15 08:14:31', '2021-11-15 08:14:31', '3'),
(49, 12, 1, 2, 1, '2021-11-15 08:16:32', '2021-11-15 08:17:25', '2021-11-15 08:17:25', '3'),
(50, 12, 2, 9, 8, '2021-11-15 08:16:32', '2021-11-15 08:17:25', '2021-11-15 08:17:25', '3'),
(51, 12, 1, 2, 1, '2021-11-15 08:17:35', '2021-11-28 13:55:46', '2021-11-28 13:55:46', '3'),
(52, 12, 2, 9, 8, '2021-11-15 08:17:35', '2021-11-28 13:55:46', '2021-11-28 13:55:46', '3'),
(53, 12, 1, 2, 1, '2021-11-28 13:56:04', '2021-12-03 00:10:28', '2021-12-03 00:10:28', '3'),
(54, 12, 2, 9, 8, '2021-11-28 13:56:04', '2021-12-03 00:10:28', '2021-12-03 00:10:28', '3'),
(55, 12, 1, 2, 1, '2021-12-03 00:10:49', '2022-01-10 03:49:24', '2022-01-10 03:49:24', '2'),
(56, 12, 2, 9, 8, '2021-12-03 00:10:49', '2022-01-10 03:36:55', '2022-01-10 03:36:55', '3'),
(57, 12, 4, 4, 6, '2021-12-08 23:33:16', '2022-01-10 03:36:55', '2022-01-10 03:36:55', '3'),
(58, 12, 7, 5, 7, '2021-12-08 23:33:16', '2022-01-10 03:36:55', '2022-01-10 03:36:55', '3'),
(59, 12, 4, 4, 6, '2022-01-10 03:44:36', '2022-01-10 03:46:04', '2022-01-10 03:46:04', '3'),
(60, 12, 7, 5, 7, '2022-01-10 03:44:36', '2022-01-10 03:46:04', '2022-01-10 03:46:04', '3'),
(61, 12, 4, 4, 6, '2022-01-10 03:49:08', '2022-01-10 03:49:16', NULL, '1'),
(62, 12, 7, 5, 7, '2022-01-10 03:49:08', '2022-02-23 02:46:05', '2022-02-23 02:46:05', '3'),
(63, 12, 1, 2, 1, '2022-01-10 03:49:30', '2022-01-10 03:49:30', NULL, '3'),
(64, 12, 2, 9, 8, '2022-01-10 03:49:30', '2022-02-23 02:46:05', '2022-02-23 02:46:05', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `players` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `user_id`, `name`, `classification`, `players`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'user', '2', '1,2,3', '2021-09-24 21:56:37', '2021-09-30 00:36:24', '2021-09-30 00:36:24'),
(2, 14, 'Prueba', '3', '41,42', '2021-09-25 00:23:04', '2021-09-30 00:39:11', '2021-09-30 00:39:11'),
(3, 14, 'Otro', '2', '42,43,41', '2021-09-25 00:26:42', '2021-09-25 01:02:58', NULL),
(4, 14, 'El 3', '3', '41,42,43', '2021-09-29 04:35:49', '2021-09-30 01:10:08', '2021-09-30 01:10:08'),
(5, 14, 'sdf', '2', '41,42', '2021-09-30 01:10:20', '2021-09-30 01:11:21', '2021-09-30 01:11:21'),
(6, 14, 'nuevo', '3', '41', '2021-09-30 01:11:12', '2021-09-30 01:11:12', NULL),
(7, 14, 'prueba', '2', '42,43', '2021-10-04 22:45:56', '2021-10-06 22:10:59', '2021-10-06 22:10:59'),
(8, 12, 'Principal', '2', '49,50,51,52,53', '2021-10-31 08:52:42', '2022-02-23 02:06:40', NULL),
(9, 12, 'Secundarios', '3', '49,53,52,51,50', '2021-10-31 08:52:55', '2022-03-02 03:09:52', NULL),
(10, 12, 'pruebas', '2', '50,49,52,53,54', '2022-03-02 03:10:37', '2022-03-02 03:10:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_handicap_indices`
--

CREATE TABLE `user_handicap_indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `handicap_index` double(3,1) DEFAULT NULL,
  `date_handicap_index` timestamp NULL DEFAULT NULL,
  `ghin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_handicap_indices`
--

INSERT INTO `user_handicap_indices` (`id`, `player_id`, `handicap_index`, `date_handicap_index`, `ghin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1.0, NULL, 'ee', '2021-08-16 21:38:01', '2021-09-01 06:12:20', NULL),
(3, 14, 0.2, '2021-10-06 22:13:53', '13', '2021-08-16 23:25:42', '2021-10-06 22:13:53', NULL),
(5, 15, 15.0, '2021-08-21 05:00:00', NULL, '2021-08-22 03:21:04', '2021-08-22 03:21:04', NULL),
(6, 16, 12.0, '2021-08-27 05:00:00', NULL, '2021-08-27 06:44:47', '2021-08-27 06:44:47', NULL),
(8, 26, 0.0, '2021-09-22 00:12:42', NULL, '2021-09-22 00:12:42', '2021-09-22 00:12:42', NULL),
(11, 36, 0.0, '2021-09-22 01:02:19', NULL, '2021-09-22 01:02:19', '2021-09-22 01:02:19', NULL),
(12, 37, 0.2, '2021-09-22 01:04:55', NULL, '2021-09-22 01:04:55', '2021-09-22 01:04:55', NULL),
(14, 39, 0.2, '2021-09-22 01:06:57', NULL, '2021-09-22 01:06:57', '2021-09-22 01:06:57', NULL),
(16, 41, 50.0, '2021-09-24 02:16:37', NULL, '2021-09-22 06:36:44', '2021-10-02 00:27:03', '2021-10-02 00:27:03'),
(17, 42, 0.2, '2021-10-06 22:22:15', NULL, '2021-09-22 23:20:40', '2021-10-06 22:22:15', NULL),
(18, 43, 0.2, '2021-10-04 22:59:02', NULL, '2021-09-23 00:25:46', '2021-10-04 22:59:02', NULL),
(19, 44, 12.0, '2021-09-28 21:05:30', NULL, '2021-09-28 02:31:23', '2021-09-28 21:05:30', NULL),
(20, 48, 0.0, '2021-10-06 21:53:33', NULL, '2021-10-06 21:53:33', '2021-10-06 21:53:33', NULL),
(21, 49, 14.8, '2022-03-02 03:09:52', NULL, '2021-10-31 08:49:17', '2022-03-02 03:09:52', NULL),
(22, 50, 33.3, '2022-03-17 04:17:48', NULL, '2021-10-31 08:51:17', '2022-03-17 04:17:48', NULL),
(23, 51, 10.7, '2022-03-02 03:09:52', NULL, '2021-10-31 08:52:21', '2022-03-02 03:09:52', NULL),
(24, 52, 4.5, '2022-03-02 03:09:52', NULL, '2021-11-02 04:24:17', '2022-03-02 03:09:52', NULL),
(25, 53, 17.1, '2022-03-02 03:09:52', NULL, '2021-11-02 04:28:25', '2022-03-02 03:09:52', NULL),
(26, 12, 10.5, '2022-03-05 02:07:06', NULL, '2021-11-06 03:07:02', '2022-03-05 02:07:06', NULL),
(27, 54, -1.2, '2022-03-02 03:09:52', NULL, '2021-11-06 03:07:02', '2022-03-02 03:09:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_hole_raitings`
--

CREATE TABLE `user_hole_raitings` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `hole_raiting_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NIGUNA',
  `hole_raitinig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_hole_raiting` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_hole_raitings`
--

INSERT INTO `user_hole_raitings` (`id`, `player_id`, `hole_raiting_type`, `hole_raitinig`, `date_hole_raiting`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'DIFHAND', '12', NULL, '2021-08-18 22:13:30', '2021-08-18 22:13:30', NULL),
(3, 26, 'NIGUNA', NULL, NULL, '2021-09-22 00:12:42', '2021-09-22 00:12:42', NULL),
(4, 36, 'F', NULL, NULL, '2021-09-22 01:02:19', '2021-09-22 01:02:19', NULL),
(5, 37, 'NIGUNA', '2', NULL, '2021-09-22 01:04:55', '2021-09-22 01:05:19', NULL),
(6, 39, 'F', '2', NULL, '2021-09-22 01:06:57', '2021-09-22 01:06:57', NULL),
(7, 41, 'MANUAL', '3', NULL, '2021-09-22 06:36:44', '2021-10-02 00:27:03', '2021-10-02 00:27:03'),
(8, 54, 'HIST', '04', NULL, '2021-09-22 23:20:40', '2021-12-26 04:41:55', NULL),
(9, 43, 'DIFHAND', '12', NULL, '2021-09-23 00:25:46', '2021-09-23 00:25:46', NULL),
(10, 48, 'MANUAL', '1', NULL, '2021-10-06 21:53:33', '2021-10-06 21:53:33', NULL),
(11, 49, 'HIST', '04', NULL, '2021-10-31 08:49:17', '2022-02-23 05:11:51', NULL),
(12, 50, 'DIFHAND', NULL, NULL, '2021-10-31 08:51:17', '2022-03-17 04:17:48', NULL),
(13, 51, 'HIST', '03', NULL, '2021-10-31 08:52:21', '2021-12-10 03:15:53', NULL),
(14, 52, 'MANUAL', '04', NULL, '2021-11-02 04:24:17', '2021-11-02 04:24:17', NULL),
(15, 53, 'HIST', '04', NULL, '2021-11-02 04:28:25', '2021-11-02 04:28:25', NULL),
(16, 54, 'HIST', '03', NULL, '2021-11-06 03:07:02', '2021-12-10 02:48:18', NULL),
(17, 12, 'DIFHAND', '3', '2021-12-07', '2021-11-06 03:07:02', '2021-11-06 03:07:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_players`
--

CREATE TABLE `user_players` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `tee_color_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_players`
--

INSERT INTO `user_players` (`id`, `user_id`, `player_id`, `frequency`, `tee_color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'USER', 1, '2021-08-13 22:50:35', '2021-08-13 22:50:35', NULL),
(5, 1, 26, 'USER', 2, '2021-09-22 00:12:42', '2021-09-22 00:12:42', NULL),
(8, 1, 36, 'USER', 2, '2021-09-22 01:02:19', '2021-09-22 01:02:19', NULL),
(9, 1, 37, 'USER', 2, '2021-09-22 01:04:55', '2021-09-22 01:04:55', NULL),
(11, 1, 39, 'USER', 2, '2021-09-22 01:06:57', '2021-09-22 01:06:57', NULL),
(13, 14, 41, 'EVNT', 2, '2021-09-22 06:36:44', '2021-10-02 00:27:03', '2021-10-02 00:27:03'),
(14, 14, 42, 'RGLR', 1, '2021-09-22 23:20:40', '2021-09-22 23:20:40', NULL),
(15, 14, 43, 'NRML', 3, '2021-09-23 00:25:46', '2021-10-06 22:07:23', '2021-10-06 22:07:23'),
(16, 44, 44, 'USER', 3, '2021-09-28 02:46:56', '2021-09-28 21:05:25', NULL),
(17, 14, 48, 'RGLR', 3, '2021-10-06 21:53:33', '2021-10-06 22:07:23', '2021-10-06 22:07:23'),
(18, 14, 14, 'USER', 1, '2021-10-06 22:13:23', '2021-10-06 22:13:23', NULL),
(19, 12, 49, 'NRML', 5, '2021-10-31 08:49:17', '2022-03-02 03:09:52', NULL),
(20, 12, 50, 'RGLR', 5, '2021-10-31 08:51:17', '2022-03-02 03:09:52', NULL),
(21, 12, 51, 'NRML', 6, '2021-10-31 08:52:21', '2022-02-23 05:12:20', NULL),
(22, 12, 52, 'RGLR', 1, '2021-11-02 04:24:17', '2022-03-02 03:09:52', NULL),
(23, 12, 53, 'RGLR', 2, '2021-11-02 04:28:25', '2022-02-23 02:59:02', NULL),
(24, 12, 54, 'EVNT', 1, '2021-11-06 03:07:02', '2022-02-23 05:11:22', NULL),
(25, 12, 12, 'USER', 1, '2021-12-01 01:29:52', '2021-12-28 03:50:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `hole_raiting_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NIGUNA',
  `hole_raitinig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_hole_raiting` date DEFAULT NULL,
  `handicap_index` double DEFAULT NULL,
  `date_handicap_index` date DEFAULT NULL,
  `ghin` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`id`, `player_id`, `hole_raiting_type`, `hole_raitinig`, `date_hole_raiting`, `handicap_index`, `date_handicap_index`, `ghin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'NIGUNA', NULL, NULL, 3, NULL, 3, '2021-08-13 22:55:03', '2021-08-13 22:55:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bet_greens`
--
ALTER TABLE `bet_greens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_greens_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_match_individuals`
--
ALTER TABLE `bet_match_individuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_match_individuals_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_match_parejas`
--
ALTER TABLE `bet_match_parejas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_match_parejas_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_medal_plays`
--
ALTER TABLE `bet_medal_plays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_medal_plays_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_raya_puntos`
--
ALTER TABLE `bet_raya_puntos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_raya_puntos_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_rompe_handicaps`
--
ALTER TABLE `bet_rompe_handicaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_rompe_handicaps_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_skins`
--
ALTER TABLE `bet_skins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_skins_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `bet_stablefords`
--
ALTER TABLE `bet_stablefords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bet_stablefords_bet_id_foreign` (`bet_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubs_country_id_foreign` (`country_id`),
  ADD KEY `clubs_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_club_id_foreign` (`club_id`);

--
-- Indexes for table `course_tee_defaults`
--
ALTER TABLE `course_tee_defaults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_tee_defaults_course_id_foreign` (`course_id`),
  ADD KEY `course_tee_defaults_tee_id_foreign` (`tee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holes`
--
ALTER TABLE `holes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holes_course_id_foreign` (`course_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `tees`
--
ALTER TABLE `tees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tees_course_id_foreign` (`course_id`),
  ADD KEY `tees_teecolor_id_foreign` (`teecolor_id`);

--
-- Indexes for table `tee_colors`
--
ALTER TABLE `tee_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`id`),
  ADD UNIQUE KEY `users_alias_unique` (`alias`) USING BTREE,
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_state_id_foreign` (`state_id`);

--
-- Indexes for table `user_clubs`
--
ALTER TABLE `user_clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_clubs_user_id_foreign` (`user_id`),
  ADD KEY `user_clubs_club_id_foreign` (`club_id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_courses_user_id_foreign` (`user_id`),
  ADD KEY `user_courses_course_id_foreign` (`course_id`),
  ADD KEY `user_courses_tee_default_male_foreign` (`tee_default_male`),
  ADD KEY `user_courses_tee_default_female_foreign` (`tee_default_female`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_groups_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_handicap_indices`
--
ALTER TABLE `user_handicap_indices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_handicap_indices_player_id_foreign` (`player_id`);

--
-- Indexes for table `user_hole_raitings`
--
ALTER TABLE `user_hole_raitings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_hole_raitings_player_id_foreign` (`player_id`);

--
-- Indexes for table `user_players`
--
ALTER TABLE `user_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_players_user_id_foreign` (`user_id`),
  ADD KEY `user_players_player_id_foreign` (`player_id`),
  ADD KEY `user_players_tee_color_id_foreign` (`tee_color_id`) USING BTREE;

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_scores_player_id_foreign` (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bet_greens`
--
ALTER TABLE `bet_greens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `bet_match_individuals`
--
ALTER TABLE `bet_match_individuals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bet_match_parejas`
--
ALTER TABLE `bet_match_parejas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `bet_medal_plays`
--
ALTER TABLE `bet_medal_plays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bet_raya_puntos`
--
ALTER TABLE `bet_raya_puntos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bet_rompe_handicaps`
--
ALTER TABLE `bet_rompe_handicaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bet_skins`
--
ALTER TABLE `bet_skins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bet_stablefords`
--
ALTER TABLE `bet_stablefords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_tee_defaults`
--
ALTER TABLE `course_tee_defaults`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holes`
--
ALTER TABLE `holes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tees`
--
ALTER TABLE `tees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tee_colors`
--
ALTER TABLE `tee_colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_clubs`
--
ALTER TABLE `user_clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_handicap_indices`
--
ALTER TABLE `user_handicap_indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_hole_raitings`
--
ALTER TABLE `user_hole_raitings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_players`
--
ALTER TABLE `user_players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bet_greens`
--
ALTER TABLE `bet_greens`
  ADD CONSTRAINT `bet_greens_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_match_individuals`
--
ALTER TABLE `bet_match_individuals`
  ADD CONSTRAINT `bet_match_individuals_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_match_parejas`
--
ALTER TABLE `bet_match_parejas`
  ADD CONSTRAINT `bet_match_parejas_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_medal_plays`
--
ALTER TABLE `bet_medal_plays`
  ADD CONSTRAINT `bet_medal_plays_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_raya_puntos`
--
ALTER TABLE `bet_raya_puntos`
  ADD CONSTRAINT `bet_raya_puntos_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_rompe_handicaps`
--
ALTER TABLE `bet_rompe_handicaps`
  ADD CONSTRAINT `bet_rompe_handicaps_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_skins`
--
ALTER TABLE `bet_skins`
  ADD CONSTRAINT `bet_skins_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_stablefords`
--
ALTER TABLE `bet_stablefords`
  ADD CONSTRAINT `bet_stablefords_bet_id_foreign` FOREIGN KEY (`bet_id`) REFERENCES `bets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `clubs_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `course_tee_defaults`
--
ALTER TABLE `course_tee_defaults`
  ADD CONSTRAINT `course_tee_defaults_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_tee_defaults_tee_id_foreign` FOREIGN KEY (`tee_id`) REFERENCES `tees` (`id`);

--
-- Constraints for table `holes`
--
ALTER TABLE `holes`
  ADD CONSTRAINT `holes_tee_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `tees` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `tees`
--
ALTER TABLE `tees`
  ADD CONSTRAINT `tees_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `tees_teecolor_id_foreign` FOREIGN KEY (`teecolor_id`) REFERENCES `tee_colors` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `user_clubs`
--
ALTER TABLE `user_clubs`
  ADD CONSTRAINT `user_clubs_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `user_clubs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `user_courses_tee_default_female_foreign` FOREIGN KEY (`tee_default_female`) REFERENCES `tees` (`id`),
  ADD CONSTRAINT `user_courses_tee_default_male_foreign` FOREIGN KEY (`tee_default_male`) REFERENCES `tees` (`id`),
  ADD CONSTRAINT `user_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_handicap_indices`
--
ALTER TABLE `user_handicap_indices`
  ADD CONSTRAINT `user_handicap_indices_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_hole_raitings`
--
ALTER TABLE `user_hole_raitings`
  ADD CONSTRAINT `user_hole_raitings_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_players`
--
ALTER TABLE `user_players`
  ADD CONSTRAINT `user_players_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_players_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD CONSTRAINT `user_scores_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
