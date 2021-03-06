-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-09-21 11:45:10
-- 伺服器版本: 5.6.25
-- PHP 版本： 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `eyecandle`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2015-08-25 00:00:00', '2015-08-25 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `send_option` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `order_name`, `total`, `name`, `send_option`, `address`, `tel`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 8, '55fb8b5c0cde0', 1350, '123', 'address', '1231', '123', 'paid', 1, '2015-09-18 11:56:12', '2015-09-18 11:56:12'),
(2, 1, '55fb94d7a5f2a', 1900, 'Ariel', 'address', 'Neigh', '0926', 'paid', 1, '2015-09-18 12:36:39', '2015-09-18 12:36:39'),
(3, 1, '55fbaa1fa2f5c', 550, 'Ariel', 'address', 'Neigh', '0926', 'paid', 1, '2015-09-18 14:07:27', '2015-09-18 14:07:27'),
(4, 6, '55fbb1fca40bf', 400, '恬恬', 'address', 'sadsadas', 'dsad', 'paid', 1, '2015-09-18 14:41:00', '2015-09-18 14:41:00'),
(5, 6, '55fbb284bb282', 550, '恬恬', 'address', 'sadsadas', 'dsad', 'paid', 1, '2015-09-18 14:43:16', '2015-09-18 14:43:16'),
(6, 6, '55ff6af616f1f', 1350, '恬恬', 'address', '台北市內湖區', '0926', 'paid', 1, '2015-09-21 10:27:02', '2015-09-21 10:27:02'),
(7, 9, '55ff6bcf83b1c', 1250, '西西', 'address', '內湖', '0926', 'paid', 1, '2015-09-21 10:30:39', '2015-09-21 10:30:39'),
(8, 10, '55ff6caacaa0b', 600, '123', 'address', '123', '123', 'paid', 1, '2015-09-21 10:34:18', '2015-09-21 10:34:18'),
(9, 11, '55ff6ed760dfd', 1050, '123', 'address', '123', '123', 'paid', 1, '2015-09-21 10:43:35', '2015-09-21 10:43:35'),
(10, 12, '55ff6f770ab98', 600, '123', 'address', '131', '123', 'paid', 1, '2015-09-21 10:46:15', '2015-09-21 10:46:15'),
(11, 12, '55ff717b6b4a8', 550, '123', 'address', '131', '123', 'paid', 1, '2015-09-21 10:54:51', '2015-09-21 10:54:51'),
(12, 12, '55ff7451952b7', 550, '123', 'address', '131', '123', 'paid', 1, '2015-09-21 11:06:57', '2015-09-21 11:06:57'),
(13, 12, '55ff74bb19278', 450, '123', 'address', '131', '123', 'paid', 1, '2015-09-21 11:08:43', '2015-09-21 11:08:43'),
(14, 12, '55ff75913f0e9', 550, '123', 'address', '131', '123', 'paid', 1, '2015-09-21 11:12:17', '2015-09-21 11:12:17'),
(15, 10, '55ff75dc7af21', 600, 'ariel', 'address', 'neihu', '09421', 'paid', 1, '2015-09-21 11:13:32', '2015-09-21 11:13:32'),
(16, 13, '55ff76198f15f', 800, 'ariel', 'address', 'ne', '02', 'paid', 1, '2015-09-21 11:14:33', '2015-09-21 11:14:33'),
(17, 14, '55ff77169d1e1', 1200, 'brian', 'address', 'taipei', '0926', 'paid', 1, '2015-09-21 11:18:46', '2015-09-21 11:18:46'),
(18, 5, '55ff7c7c65762', 400, '江博伊', 'address', '秘密', '秘密', 'paid', 1, '2015-09-21 11:41:48', '2015-09-21 11:41:48'),
(19, 2, '55ff7cdc0811f', 2850, 'ZZZ', 'address', 'GHOST ISLAND', '0912345678', 'paid', 1, '2015-09-21 11:43:24', '2015-09-21 11:43:24'),
(20, 4, '55ff8c063c159', 1200, '吳敏豪', 'address', '新北市新莊區7-11', '0980774597', 'paid', 1, '2015-09-21 12:48:06', '2015-09-21 12:48:06'),
(21, 15, '55ff9a9415c7b', 600, 'Brian Shih', 'address', 'cxzcxz', 'cxzcxzcxz', 'paid', 1, '2015-09-21 13:50:12', '2015-09-21 13:50:12'),
(22, 16, '55ffc48305e96', 4400, 'ariel', 'address', '內胡區', '0926665556', 'paid', 1, '2015-09-21 16:49:07', '2015-09-21 16:49:07'),
(23, 17, '55ffc50a199ec', 450, 'Senkou Syuu', 'address', '台诶市', '0945454545', 'send', 1, '2015-09-21 16:51:22', '2015-09-21 16:54:20');

-- --------------------------------------------------------

--
-- 資料表結構 `cart_list`
--

CREATE TABLE IF NOT EXISTS `cart_list` (
  `id` bigint(20) NOT NULL,
  `cart_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `color_id` bigint(20) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cart_list`
--

INSERT INTO `cart_list` (`id`, `cart_id`, `product_id`, `color_id`, `num`, `total`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 6, 1, 550, 1, '2015-09-18 11:56:12', '2015-09-18 11:56:12'),
(2, 1, 1, 3, 2, 800, 1, '2015-09-18 11:56:12', '2015-09-18 11:56:12'),
(3, 2, 8, 6, 2, 1100, 1, '2015-09-18 12:36:39', '2015-09-18 12:36:39'),
(4, 2, 1, 3, 2, 800, 1, '2015-09-18 12:36:39', '2015-09-18 12:36:39'),
(5, 3, 7, 11, 1, 550, 1, '2015-09-18 14:07:27', '2015-09-18 14:07:27'),
(6, 4, 4, 11, 1, 400, 1, '2015-09-18 14:41:00', '2015-09-18 14:41:00'),
(7, 5, 8, 11, 1, 550, 1, '2015-09-18 14:43:16', '2015-09-18 14:43:16'),
(8, 6, 6, 11, 1, 450, 1, '2015-09-21 10:27:02', '2015-09-21 10:27:02'),
(9, 6, 6, 9, 2, 900, 1, '2015-09-21 10:27:02', '2015-09-21 10:27:02'),
(10, 7, 4, 9, 2, 800, 1, '2015-09-21 10:30:39', '2015-09-21 10:30:39'),
(11, 7, 6, 9, 1, 450, 1, '2015-09-21 10:30:39', '2015-09-21 10:30:39'),
(12, 8, 2, 5, 1, 600, 1, '2015-09-21 10:34:18', '2015-09-21 10:34:18'),
(13, 9, 2, 5, 1, 600, 1, '2015-09-21 10:43:35', '2015-09-21 10:43:35'),
(14, 9, 6, 9, 1, 450, 1, '2015-09-21 10:43:35', '2015-09-21 10:43:35'),
(15, 10, 2, 5, 1, 600, 1, '2015-09-21 10:46:15', '2015-09-21 10:46:15'),
(16, 11, 7, 7, 1, 550, 1, '2015-09-21 10:54:51', '2015-09-21 10:54:51'),
(17, 12, 7, 7, 1, 550, 1, '2015-09-21 11:06:57', '2015-09-21 11:06:57'),
(18, 13, 6, 9, 1, 450, 1, '2015-09-21 11:08:43', '2015-09-21 11:08:43'),
(19, 14, 5, 10, 1, 550, 1, '2015-09-21 11:12:17', '2015-09-21 11:12:17'),
(20, 15, 2, 5, 1, 600, 1, '2015-09-21 11:13:32', '2015-09-21 11:13:32'),
(21, 16, 4, 9, 1, 400, 1, '2015-09-21 11:14:33', '2015-09-21 11:14:33'),
(22, 16, 1, 3, 1, 400, 1, '2015-09-21 11:14:33', '2015-09-21 11:14:33'),
(23, 17, 3, 8, 2, 1200, 1, '2015-09-21 11:18:46', '2015-09-21 11:18:46'),
(24, 18, 1, 11, 1, 400, 1, '2015-09-21 11:41:48', '2015-09-21 11:41:48'),
(25, 19, 11, 11, 1, 550, 1, '2015-09-21 11:43:24', '2015-09-21 11:43:24'),
(26, 19, 15, 2, 1, 2300, 1, '2015-09-21 11:43:24', '2015-09-21 11:43:24'),
(27, 20, 3, 8, 2, 1200, 1, '2015-09-21 12:48:06', '2015-09-21 12:48:06'),
(28, 21, 3, 11, 1, 600, 1, '2015-09-21 13:50:12', '2015-09-21 13:50:12'),
(29, 22, 4, 9, 2, 800, 1, '2015-09-21 16:49:07', '2015-09-21 16:49:07'),
(30, 22, 5, 10, 3, 1650, 1, '2015-09-21 16:49:07', '2015-09-21 16:49:07'),
(31, 22, 10, 10, 1, 600, 1, '2015-09-21 16:49:07', '2015-09-21 16:49:07'),
(32, 22, 12, 5, 3, 1350, 1, '2015-09-21 16:49:07', '2015-09-21 16:49:07'),
(33, 23, 6, 11, 1, 450, 1, '2015-09-21 16:51:22', '2015-09-21 16:51:22');

-- --------------------------------------------------------

--
-- 資料表結構 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `collect`
--

INSERT INTO `collect` (`id`, `user_id`, `product_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 1, '2015-09-21 11:40:51', '2015-09-21 11:40:51'),
(2, 17, 7, 1, '2015-09-21 16:49:54', '2015-09-21 16:49:54'),
(3, 1, 7, 1, '2015-09-21 16:52:57', '2015-09-21 16:52:57');

-- --------------------------------------------------------

--
-- 資料表結構 `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `smell` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `color`
--

INSERT INTO `color` (`id`, `name`, `color_code`, `smell`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '無', '', '', 1, '2015-08-25 15:00:47', '2015-08-25 15:00:47'),
(2, '白', 'fff', '白桃 + 蕨類', 1, '2015-08-25 15:01:17', '2015-08-25 15:50:38'),
(3, '藍', '236282', '薄荷 + 蕨類', 1, '2015-08-25 15:01:35', '2015-08-25 15:01:35'),
(4, '綠', '649833', '檸檬 + 橘子 + 密瓜', 1, '2015-08-25 15:01:54', '2015-08-25 15:01:54'),
(5, '桃紅', 'DE4078', '苺果 + 薰衣草 + 白桃', 1, '2015-08-25 15:02:09', '2015-08-25 15:02:09'),
(6, '紅', 'DE2F32', '櫻桃糖果', 1, '2015-08-25 15:02:23', '2015-08-25 15:50:30'),
(7, '深紅', '632025', '紅醋栗 + 軟木橘子', 1, '2015-08-25 15:02:38', '2015-08-25 15:02:38'),
(8, '墨綠', '024226', '蕨類 + 橘子', 1, '2015-08-25 15:02:58', '2015-08-25 15:02:58'),
(9, '深咖啡', '2B1E23', '軟木橘子 + 橘子 + 香草 膚色', 1, '2015-08-25 15:03:15', '2015-08-25 15:03:15'),
(10, '膚色', 'F3C49A', '亞麻 + 蜜柑', 1, '2015-08-25 15:03:29', '2015-08-25 15:03:29'),
(11, '黑', '000', '香草焦糖', 1, '2015-08-25 15:15:06', '2015-08-25 15:18:47');

-- --------------------------------------------------------

--
-- 資料表結構 `color_pic`
--

CREATE TABLE IF NOT EXISTS `color_pic` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `color_id` bigint(20) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  `big_pic` varchar(100) DEFAULT NULL,
  `is_cover` tinyint(4) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `color_pic`
--

INSERT INTO `color_pic` (`id`, `product_id`, `color_id`, `small_pic`, `big_pic`, `is_cover`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 11, '1_s_c1.jpg', '1_b_c1.jpg', 1, 1, '2015-09-04 11:42:35', '2015-09-04 11:45:02'),
(2, 1, 3, '1_s_c2.jpg', '1_b_c2.jpg', 0, 0, '2015-09-04 11:42:35', '2015-09-07 10:43:23'),
(3, 2, 11, '2_s_c1.jpg', '2_b_c1.jpg', 1, 1, '2015-09-04 11:49:19', '2015-09-04 11:49:19'),
(4, 2, 10, '2_s_c2.jpg', '2_b_c2.jpg', 0, 1, '2015-09-04 11:49:19', '2015-09-04 11:49:19'),
(5, 2, 5, '2_s_c3.jpg', '2_b_c3.jpg', 0, 1, '2015-09-04 11:49:19', '2015-09-04 11:49:19'),
(6, 3, 11, '3_s_c1.jpg', '3_b_c1.jpg', 1, 1, '2015-09-04 11:50:39', '2015-09-04 11:50:39'),
(7, 3, 8, '3_s_c2.jpg', '3_b_c2.jpg', 0, 1, '2015-09-04 11:50:39', '2015-09-04 11:50:39'),
(8, 3, 3, '3_s_c3.jpg', '3_b_c3.jpg', 0, 1, '2015-09-04 11:50:39', '2015-09-04 11:50:39'),
(9, 4, 11, '4_s_c1.jpg', '4_b_c1.jpg', 1, 1, '2015-09-04 11:52:59', '2015-09-04 11:52:59'),
(10, 4, 9, '4_s_c2.jpg', '4_b_c2.jpg', 0, 1, '2015-09-04 11:52:59', '2015-09-04 11:52:59'),
(11, 5, 11, '5_s_c1.jpg', '5_b_c1.jpg', 1, 1, '2015-09-04 12:10:06', '2015-09-04 12:10:06'),
(12, 5, 10, '5_s_c2.jpg', '5_b_c2.jpg', 0, 1, '2015-09-04 12:10:06', '2015-09-04 12:10:06'),
(13, 6, 11, '6_s_c1.jpg', '6_b_c1.jpg', 1, 1, '2015-09-04 12:11:40', '2015-09-04 12:11:40'),
(14, 6, 9, '6_s_c2.jpg', '6_b_c2.jpg', 0, 1, '2015-09-04 12:11:40', '2015-09-04 12:11:40'),
(15, 7, 11, '7_s_c1.jpg', '7_b_c1.jpg', 1, 1, '2015-09-04 12:12:56', '2015-09-04 12:12:56'),
(16, 7, 7, '7_s_c2.jpg', '7_b_c2.jpg', 0, 1, '2015-09-04 12:12:56', '2015-09-04 12:12:56'),
(17, 8, 11, '8_s_c1.jpg', '8_b_c1.jpg', 1, 1, '2015-09-04 12:14:43', '2015-09-04 12:14:43'),
(18, 8, 3, '8_s_c2.jpg', '8_b_c2.jpg', 0, 1, '2015-09-04 12:14:43', '2015-09-04 12:14:43'),
(19, 8, 6, '8_s_c3.jpg', '8_b_c3.jpg', 0, 1, '2015-09-04 12:14:43', '2015-09-04 12:14:43'),
(20, 8, 10, '8_s_c4.jpg', '8_b_c4.jpg', 0, 1, '2015-09-04 12:14:43', '2015-09-04 12:14:43'),
(21, 9, 11, '9_s_c1.jpg', '9_b_c1.jpg', 1, 1, '2015-09-04 12:15:42', '2015-09-04 12:15:42'),
(22, 10, 10, '10_s_c1.jpg', '10_b_c1.jpg', 1, 1, '2015-09-04 13:49:17', '2015-09-04 13:49:17'),
(23, 11, 11, '11_s_c1.jpg', '11_b_c1.jpg', 1, 1, '2015-09-04 13:50:54', '2015-09-04 13:50:54'),
(24, 11, 3, '11_s_c2.jpg', '11_b_c2.jpg', 0, 1, '2015-09-04 13:50:54', '2015-09-04 13:50:54'),
(25, 11, 4, '11_s_c3.jpg', '11_b_c3.jpg', 0, 1, '2015-09-04 13:50:54', '2015-09-04 13:50:54'),
(26, 11, 5, '11_s_c4.jpg', '11_b_c4.jpg', 0, 1, '2015-09-04 13:50:54', '2015-09-04 13:50:54'),
(27, 12, 11, '12_s_c1.jpg', '12_b_c1.jpg', 1, 1, '2015-09-04 14:04:44', '2015-09-04 14:04:44'),
(28, 12, 4, '12_s_c2.jpg', '12_b_c2.jpg', 0, 1, '2015-09-04 14:04:44', '2015-09-04 14:04:44'),
(29, 12, 5, '12_s_c3.jpg', '12_b_c3.jpg', 0, 1, '2015-09-04 14:04:44', '2015-09-04 14:04:44'),
(30, 12, 2, '12_s_c4.jpg', '12_b_c4.jpg', 0, 1, '2015-09-04 14:04:44', '2015-09-04 14:04:44'),
(31, 13, 2, '13_s_c1.jpg', '13_b_c1.jpg', 1, 1, '2015-09-04 14:05:52', '2015-09-04 14:05:52'),
(32, 14, 2, '14_s_c1.jpg', '14_b_c1.jpg', 1, 1, '2015-09-04 14:06:58', '2015-09-04 14:06:58'),
(33, 15, 2, '15_s_c1.jpg', '15_b_c1.jpg', 1, 1, '2015-09-04 14:07:57', '2015-09-04 14:07:57'),
(34, 16, 3, '16_s_c1.jpg', '16_b_c1.jpg', 1, 1, '2015-09-04 14:08:51', '2015-09-04 14:08:51'),
(35, 16, 6, '16_s_c2.jpg', '16_b_c2.jpg', 0, 1, '2015-09-04 14:08:51', '2015-09-04 14:08:51'),
(36, 17, 2, '17_s_c1.jpg', '17_b_c1.jpg', 1, 1, '2015-09-04 14:09:48', '2015-09-04 14:09:48'),
(37, 18, 4, '18_s_c1.jpg', '18_b_c1.jpg', 1, 1, '2015-09-04 14:10:41', '2015-09-04 14:10:41'),
(38, 19, 1, '19_s_c1.jpg', '19_b_c1.jpg', 1, 1, '2015-09-04 14:16:21', '2015-09-04 14:16:21'),
(39, 20, 1, '20_s_c1.jpg', '20_b_c1.jpg', 1, 1, '2015-09-04 14:18:55', '2015-09-04 14:18:55'),
(40, 21, 1, '21_s_c1.jpg', '21_b_c1.jpg', 1, 1, '2015-09-04 14:20:31', '2015-09-04 14:20:31'),
(41, 22, 1, '22_s_c1.jpg', '22_b_c1.jpg', 1, 1, '2015-09-04 14:21:58', '2015-09-04 14:21:58'),
(42, 23, 1, '23_s_c1.jpg', '23_b_c1.jpg', 1, 1, '2015-09-04 14:25:49', '2015-09-04 14:25:49'),
(43, 24, 6, '24_s_c1.jpg', '24_b_c1.jpg', 0, 0, '2015-09-04 14:28:39', '2015-09-07 10:41:15'),
(44, 24, 9, '24_s_c2.jpg', '24_b_c2.jpg', 1, 1, '2015-09-04 14:28:39', '2015-09-04 15:16:10'),
(45, 24, 2, '24_s_c3.jpg', '24_b_c3.jpg', 0, 1, '2015-09-04 14:28:39', '2015-09-04 14:28:39'),
(46, 25, 1, '25_s_c1.jpg', '25_b_c1.jpg', 1, 1, '2015-09-04 14:29:44', '2015-09-04 14:30:07'),
(47, 24, 6, '24_s_c6.jpg', '24_b_c6.jpg', 0, 1, '2015-09-07 10:41:32', '2015-09-07 10:41:32'),
(48, 1, 3, '1_s_c3.jpg', '1_b_c3.jpg', 0, 1, '2015-09-07 10:43:40', '2015-09-07 10:43:40');

-- --------------------------------------------------------

--
-- 資料表結構 `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `user_id`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 4, 'YcQIb2U4rwBufkdqLKFRBsfeNENAW6Hi', 0, '2015-09-18 14:44:32', '2015-09-18 14:46:40'),
(2, 4, 'CYnD6rA7nWy9eQGLP14FVJ4QIUGWVQq3', 0, '2015-09-18 16:21:39', '2015-09-18 16:22:25'),
(3, 1, 'pc9Xd4UXfMzeb8pk1ih8r2zcrw5qFubi', 0, '2015-09-21 10:31:47', '2015-09-21 10:32:02'),
(4, 1, 'TSRxIBXSiYw7VQuNgxn5ASavAhgbsxGH', 0, '2015-09-21 16:52:27', '2015-09-21 16:52:43'),
(5, 1, 'kQwUVSPfGpXjPjVL4W8FE7CzgbPDaYIp', 0, '2015-09-21 17:00:53', '2015-09-21 17:00:56'),
(6, 1, 'H4v2Bi9ifyWIJZDeDnBn1TF4vedKbG3u', 1, '2015-09-21 17:00:56', '2015-09-21 17:00:56');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cover_sticker` varchar(255) DEFAULT NULL,
  `sticker` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `burning` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `is_soldout` tinyint(4) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`id`, `name`, `cover_sticker`, `sticker`, `detail`, `price`, `weight`, `size`, `burning`, `material`, `method`, `type_id`, `is_soldout`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Rabbit', '1_cover_sticker.png', '1_sticker.png', '單純的顏色襯托出兔子撟捷的氣質，配上淡淡優雅的茉莉花香，簡單的美感。', 400, '300', '10', '8', '蠟', '1.剪去過長的蠟蕊1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(燃燒一陣子耳朵會慢慢垂下)<br />\r\n5.燃燒過程中散發出微微的香氛', 1, 0, 1, '2015-09-04 11:42:35', '2015-09-14 10:57:26'),
(2, 'Frenchbulldog', '2_cover_sticker.png', '2_sticker.png', '此款法國鬥牛犬蠟燭造型，份量十足表情憨厚，燃燒後也能保持臉部造型。', 600, '450', '13', '12', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(法鬥狗的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過12小時', 1, 0, 1, '2015-09-04 11:49:19', '2015-09-14 10:57:16'),
(3, 'Deer', '3_cover_sticker.png', '3_sticker.png', '小鹿蠟燭造型，自然生動的表情，連耳朵裡的細毛都刻畫細膩，搭配微翹的鼻子，充分表現幼鹿的樣貌。', 600, '300', '13', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(小鹿的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過8小時', 1, 0, 1, '2015-09-04 11:50:38', '2015-09-14 10:57:09'),
(4, 'Cocker', '4_cover_sticker.png', '4_sticker.png', '可卡犬造型蠟燭，細緻雕工配上長長捲捲的毛髮生動自然，濃郁而清爽的味道自然可愛。', 400, '300', '8', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過8小時', 1, 0, 1, '2015-09-04 11:52:59', '2015-09-14 10:57:00'),
(5, 'Pugdog', '5_cover_sticker.png', '5_sticker.png', '巴哥臉上帶著無辜哀怨的表情使人憐愛，在重點部位塗上特殊蠟燭漆，凸現巴哥的黑色小臉與水汪汪眼睛，可愛的巴哥配上甜甜的香氛，居家送禮最佳良品。', 550, '400', '9.5', '10', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(巴哥狗的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過10小時', 1, 0, 1, '2015-09-04 12:10:06', '2015-09-14 10:56:50'),
(6, 'Brownbear', '6_cover_sticker.png', '6_sticker.png', '棕熊造型蠟燭呈現棕熊該有的特徵有著毛茸茸的毛皮和圓而大的頭，有著靈性剛正不阿的表情，配上甜而不膩的香氛是房間擺飾或送禮的最佳選擇。', 450, '350', '8.5', '10', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(熊的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過10小時', 1, 0, 1, '2015-09-04 12:11:39', '2015-09-14 10:56:42'),
(7, 'Mouflon', '7_cover_sticker.png', '7_sticker.png', '充滿氣勢的羊角為主要特色，不同顏色配上不同特色的香氛，精緻的雕刻將盤羊帥氣的神韻完整呈現出來。', 550, '400', '10.5', '10', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(動物的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過10小時', 1, 0, 1, '2015-09-04 12:12:56', '2015-09-14 10:56:27'),
(8, 'The ape', '8_cover_sticker.png', '8_sticker.png', '侏儒黑猩猩造型蠟燭，噘起的嘴巴代表親吻之意，毛髮描寫自然，不同顏色配上不同特色的香氛，羞于表達情感或許用黑猩猩來給對方一個Kiss。', 550, '400', '9', '10', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(動物的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過10小時', 1, 0, 1, '2015-09-04 12:14:42', '2015-09-14 10:56:19'),
(9, 'Unicorn', '9_cover_sticker.png', '9_sticker.png', '大獨角獸的鬃毛浪漫飄逸，肌肉紋理等等細節刻畫栩栩如生，充滿動態的即視感，不同顏色配上不同特色的香氛，造型華麗裝飾性極高。', 600, '450', '12.5', '8', '蠟', '1.打開外盒後，請用剪刀小心拆開內襯緩衝材質，不碰撞拉扯蠟燭本身<br />\r\n2.剪去過長的蠟蕊<br />\r\n3.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n4.點燃(剛開始會有微微的黑煙)<br />\r\n5.享受蠟燭溫暖的光線(獨角獸的臉不會馬上被融壞)<br />\r\n6.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過4小時，獨角獸以造型取勝，並不適合長時間燃燒，放置1尺之內不需點燃也可以感到到淡淡的香味。', 1, 0, 1, '2015-09-04 12:15:42', '2015-09-11 10:05:23'),
(10, 'BostonTerrier', '10_cover_sticker.png', '', '利用彩噴技術強調出波士頓梗黑白配色的特點， 加上善解人意的大眼睛，<br />\r\n還有短短翹翹的鼻頭和招風耳， 怎麼能不把小巧可愛的牠帶回家收藏！', 600, '450', '10', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(波士頓梗的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過12小時<br />\r\n', 1, 0, 1, '2015-09-04 13:49:17', '2015-09-14 10:55:59'),
(11, 'Dino', '11_cover_sticker.png', NULL, '有別於其他動物造型系列蠟燭一向注重髮流、毛皮在視覺上的細致蓬鬆感，我們在霸王龍蠟燭出模後再加一道烘熱的手續，使蠟面更平滑光亮，完整重現爬蟲類皮膚特有的疙瘩光澤。', 550, '450', '11', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(可搭配eye Kiln 系列大小瓷盤，上釉盤面好清理)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(動物的臉不會馬上被融壞)<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過8小時', 1, 0, 1, '2015-09-04 13:50:54', '2015-09-14 10:55:22'),
(12, 'Baby', '12_cover_sticker.png', NULL, '燃燒靈魂血淚嬰兒，在嬰兒無辜的雙眼透出淡淡的血色，在嬰兒的側面脖子上也露出粉色微血管，配上淡淡甜甜的櫻桃香味，可愛與暴力的完美結合。', 450, '300', '11', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線(嬰兒的臉不會馬上被融壞)<br />\r\n5.經過約8-10小時baby開始流淚<br />\r\n(注意這時火會變大)<br />\r\n(使用蠟燭的環境及燭蕊方向都會影響baby的流淚狀況)<br />\r\n6.燭台接住流下的蠟油，baby臉上留下美麗的淚痕<br />\r\n7.燃燒過程中散發出微微的香氛', 2, 0, 1, '2015-09-04 14:04:44', '2015-09-14 10:55:13'),
(13, 'BabySitting', '13_cover_sticker.png', '13_sticker.png', '750ml耐燒大容量＋經典玫瑰香氛，培養液裡的baby在銀河的環繞下慢慢成長，呱呱落地重量級登場！', 1800, '750', '18.5', '25', '蠟', '*使用方法：<br />\r\n1.剪去過長的蠟蕊<br />\r\n2.點燃(剛開始會有微微的黑煙)<br />\r\n3.燭光讓baby更富立體感(在黑暗中)<br />\r\n4.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間保守估計超過25小時(總而言之就是很耐燒！)<br />\r\n（每兩小時吹熄後半小時後繼續燃燒，確保燃燒品質）', 2, 0, 1, '2015-09-04 14:05:52', '2015-09-14 10:55:03'),
(14, 'BackBone', '14_cover_sticker.png', '14_sticker.png', 'EYE LAB實驗室系列以瓶裝蠟燭為主軸,結合造型蠟燭與果凍蠟,把博物館 <br />\r\n中的標本轉化成具實用性的香氛蠟燭同時也兼具裝飾性,罐裝在保存香芬更 <br />\r\n持久,點燃後的光源經由瓶子折射在造型蠟燭上更具立體感。', 680, '150', '11', '15', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.點燃(剛開始會有微微的黑煙)<br />\r\n3.燭光讓脊椎更富立體感(在黑暗中)<br />\r\n4.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過15小時（每兩小時吹熄後半小時後繼續燃燒，確保燃燒品質）', 2, 0, 1, '2015-09-04 14:06:58', '2015-09-14 10:54:54'),
(15, 'HalfHead', '15_cover_sticker.png', '15_sticker.png', '泡皺的眼角、嘴脣，腦部的紋理和剖面的構造，再加上繁複的上色工法只為呈現出標本嬰兒特有的另類慘白粉嫩，如同EYE LAB系列一直以來堅持的擬真度，一個細節也不放過。', 2300, '700', '18.5', '25', '蠟', '1.剪去過長的蠟蕊(修剪燭蕊至1-1.5cm)<br />\r\n2.點燃(剛開始會有微微的黑煙)<br />\r\n3.燭光讓baby臉部更富立體感(暗房效果極佳)<br />\r\n4.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過25小時（每兩小時吹熄後半小時後繼續燃燒，確保燃燒品質）', 2, 0, 1, '2015-09-04 14:07:57', '2015-09-14 11:03:28'),
(16, 'Heart', '16_cover_sticker.png', NULL, 'EYE LAB實驗室系列以瓶裝蠟燭為主軸，結合造型蠟燭與果凍蠟，把博物館中的標本轉化成具實用性的香氛蠟燭，同時也兼具裝飾性。罐裝容器在保存香氛這點能夠更為持久，點燃後的光源經由瓶子折射在造型蠟燭上更具立體感。', 680, '150', '11', '15', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.點燃(剛開始會有微微的黑煙)<br />\r\n3.燭光讓心臟更富立體感(在黑暗中)<br />\r\n4.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過15小時（每兩小時吹熄後半小時後繼續燃燒，確保燃燒品質）', 2, 0, 1, '2015-09-04 14:08:51', '2015-09-14 10:54:18'),
(17, 'Skull', '17_cover_sticker.png', '17_sticker.png', 'EYE LAB實驗室系列以瓶裝蠟燭為主軸，結合造型蠟燭與果凍蠟，把博物館中的標本轉化成具實用性的香氛蠟燭，同時也兼具裝飾性。罐裝容器在保存香氛更持久，點燃後的光源經由瓶子折射在造型蠟燭上更具立體感。', 980, '300', '14.5', '20', '蠟', '1.剪去過長的蠟蕊(修剪燭蕊至1-1.5cm)<br />\r\n2.點燃(剛開始會有微微的黑煙)<br />\r\n3.燭光讓骷髏頭更富立體感(在黑暗中)<br />\r\n4.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過20小時（每兩小時吹熄後半小時後繼續燃燒，確保燃燒品質）', 2, 0, 1, '2015-09-04 14:09:47', '2015-09-14 10:53:51'),
(18, 'Trees', '18_cover_sticker.png', NULL, '小松樹是動物造型蠟燭最好的配角，打造一座屬於自己的小森林！', 500, '300', '15', '8', '蠟', '1.修剪蠟蕊至適當的長度(1cm-1.5cm)<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛<br />\r\nps:最佳燃燒時間超過8小時', 2, 0, 1, '2015-09-04 14:10:41', '2015-09-14 10:53:00'),
(19, 'Bird', '19_cover_sticker.png', NULL, 'eye蠟燭與腳踏車品牌Sense30合作款bookishbird，eye 的動物造型小鳥與代表Sense30精神的紳士帽相互結合，小鳥與書的造型凸顯復古精神，限量發售。', 500, '400', '10', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:16:21', '2015-09-14 11:01:48'),
(20, 'Drama', '20_cover_sticker.png', NULL, '炎亞綸DRAMA造型蠟燭由華研唱片與eye candle studio蠟燭工作室協力設計製作推出。有別於市面上的容器香氛蠟燭，eye candle以造型和顏色做為設計的出發點， 在市場上製造出多種熱銷的有趣造型香氛蠟燭。此次和華研合作推出炎亞綸在{ 這不是我MV} 中的擬真紅色憂鬱貴族造型\r\n香氛蠟燭。以DRAMA專輯造型3 D 精雕開模， 全手工精心製作，外型細緻、品質講究，既可作為珍藏品用於案頭擺飾，亦可作為香氛蠟燭使用。包裝外盒設計精美，大膽撞色設計，完美延續DRAMA與CUT專輯的視覺美學風格。', 500, '400', '10', '10', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:18:55', '2015-09-04 16:28:18'),
(21, 'EslitElephant', '21_cover_sticker.png', NULL, '2013年底受勤美誠品綠園道之托，設計了兩款造形蠟燭作為滿額禮，在盒子包裝方面也利用eye candle的版型再設計， eye candle studio的設計造型多變，可以滿足各種造型需求，包括造型蠟燭人像動物、瓶裝蠟燭、陶瓷造型容器等， 運用範圍廣泛包括企業員工贈禮、百貨贈禮、流行產業週邊商品。客定製不只是商品主體也包括香味的調製、包裝設計、顏色調製都有豐富的經驗可以滿足需求。', 600, '400', '8', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:20:31', '2015-09-14 11:02:19'),
(22, 'EslitRabbit', '22_cover_sticker.png', NULL, '2014年底受勤美誠品綠園道之托，設計了兩款造形蠟燭作為滿額禮，在盒子包裝方面也利用eye candle的版型再設計，eye candle studio的設計造型多變，可以滿足各種造型需求，包括造型蠟燭人像動物、瓶裝蠟燭、陶瓷造型容器等，運用範圍廣泛包括企業員工贈禮、百貨贈禮、流行產業週邊商品。客定製不只是商品主體也包括香味的調製、包裝設計、顏色調製都有豐富的經驗可以滿足需求。', 600, '400', '8', '8', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:21:58', '2015-09-14 11:02:47'),
(23, 'MrRock', '23_cover_sticker.png', NULL, 'eye candle studio為2014 TRIPLE_JAM＿蕭敬騰世界巡迴演唱會-台北站所打造的專屬精油蠟燭。有別於一般演場會周邊商品，將演唱會的視覺形象立體化搭配香味來傳遞歌曲的概念，分別是THE SONG 、MARRY ME 、KISS ME三首歌，一首歌一種顏色一種香味。<br />\r\n', 1000, '450', '12', '12', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:25:49', '2015-09-14 11:02:33'),
(24, 'OldMan', '24_cover_sticker.png', NULL, '2013 eye candle與wisdom聯名商品，100%融合度限量商品，以wisdom的形象打造出造型蠟燭商品。outdoor紳士的香氛蠟燭，配上木質眼鏡配件，成為了蠟燭的亮點之一，盒裝的蠟燭商品外面套上wisdom的萬用袋成了最佳包裝。商品包含：造型蠟燭-蠟燭配件木質眼鏡-胚布萬用袋-牛皮包裝盒-手繪赤牛皮貼紙。', 1200, '400', '15', '12', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:28:39', '2015-09-14 11:01:27'),
(25, 'Rimowa', '25_cover_sticker.png', NULL, 'eye candle studio成爲德國行李箱指定配合廠商，爲RIMOWA打造VIP贈禮專屬陶瓷杯香氛蠟燭，商品經過層層把關，從蠟燭的原料到香精油，內附的配件也相當講究，包括說明書、防塵蓋、盒內支撐內襯。RIMOWA玫瑰香氛蠟燭陶瓷杯，在燃燒時陶瓷杯會微微透光，經過燭光凸顯陶瓷LOGO立體感。', 1000, '300', '12', '16', '蠟', '1.剪去過長的蠟蕊<br />\r\n2.準備可愛的燭台(建議使用蠟燭時都應使用燭台)<br />\r\n3.點燃(剛開始會有微微的黑煙)<br />\r\n4.享受蠟燭溫暖的光線<br />\r\n5.燃燒過程中散發出微微的香氛', 3, 1, 1, '2015-09-04 14:28:57', '2015-09-21 16:55:02');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `type`
--

INSERT INTO `type` (`id`, `name`, `banner`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Eyenimal', 'eyenimal.jpg', 1, '2015-08-25 11:22:30', '2015-09-03 15:40:50'),
(2, 'Eye Lab', 'eye_lab.jpg', 1, '2015-08-25 11:34:28', '2015-09-03 15:40:41'),
(3, 'Eye Feature', 'eye_feature.jpg', 1, '2015-08-25 15:57:36', '2015-09-03 15:40:24');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `social` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `tel`, `address`, `social`, `social_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'heyimariel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Ariel', '0926', 'Neigh', 'website', NULL, 1, '2015-09-14 17:09:09', '2015-09-21 10:32:02'),
(2, 'Zzz@gmail.com', '202cb962ac59075b964b07152d234b70', 'ZZZ', '0912345678', 'GHOST ISLAND', 'website', NULL, 1, '2015-09-14 19:58:58', '2015-09-21 11:43:23'),
(3, 'heyimariel@yahoo.com.tw', '202cb962ac59075b964b07152d234b70', '123', '123', '123', 'website', NULL, 1, '2015-09-15 18:26:27', '2015-09-15 18:26:27'),
(4, 'f127813302@gmail.com', 'c33367701511b4f6020ec61ded352059', '吳敏豪', '0980774597', '新北市新莊區7-11', 'website', NULL, 1, '2015-09-15 18:41:19', '2015-09-18 16:23:14'),
(5, 'vickus113@gmail.com', 'd4b70eba43abb93a9cfd2bfd8cd9b361', '江博伊', '秘密', '秘密', 'website', NULL, 1, '2015-09-15 18:43:03', '2015-09-15 18:43:03'),
(6, 'queen_ariel515@yahoo.com.tw', NULL, '恬恬', '0926', '台北市內湖區', 'fb', '475448805949454', 1, '2015-09-15 21:40:26', '2015-09-21 10:27:02'),
(8, 'heyimariel@gmail.ce', '202cb962ac59075b964b07152d234b70', '123', '123', '1231', 'website', NULL, 1, '2015-09-18 11:56:11', '2015-09-18 11:56:12'),
(9, 'sdsa@gmail.com', '202cb962ac59075b964b07152d234b70', '西西', '0926', '內湖', 'website', NULL, 1, '2015-09-21 10:30:39', '2015-09-21 10:30:39'),
(10, 'sdsa@gmail.com.tw', '202cb962ac59075b964b07152d234b70', 'ariel', '09421', 'neihu', 'website', NULL, 1, '2015-09-21 10:34:18', '2015-09-21 11:13:32'),
(11, 'heyimariel@gmail.com.tw', '202cb962ac59075b964b07152d234b70', '123', '123', '123', 'website', NULL, 1, '2015-09-21 10:43:35', '2015-09-21 10:43:35'),
(12, 'heyimariel@gmail.com.gg', '202cb962ac59075b964b07152d234b70', '123', '123', '131', 'website', NULL, 1, '2015-09-21 10:46:14', '2015-09-21 10:46:15'),
(13, 'f1272322@yahoo.com.tw', '202cb962ac59075b964b07152d234b70', 'ariel', '02', 'ne', 'website', NULL, 1, '2015-09-21 11:14:33', '2015-09-21 11:14:33'),
(14, 'brianshih01@yahoo.com.tw', '9a7efc76e89a47d4dd37369c4069c811', 'brian', '0926', 'taipei', 'website', NULL, 1, '2015-09-21 11:18:46', '2015-09-21 11:18:46'),
(15, 'brianshih01@hotmail.com', NULL, 'Brian Shih', 'cxzcxzcxz', 'cxzcxz', 'fb', '10153218241631985', 1, '2015-09-21 11:25:41', '2015-09-21 13:50:12'),
(16, 'heyimariel@gmail.com.ee', '202cb962ac59075b964b07152d234b70', 'ariel', '0926665556', '內胡區', 'website', NULL, 1, '2015-09-21 16:49:06', '2015-09-21 16:49:07'),
(17, 'terry314418@gmail.com', NULL, '西西子', '09454545455', '台诶市', 'fb', '1497321390585436', 1, '2015-09-21 16:49:54', '2015-09-21 16:52:01');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- 資料表索引 `cart_list`
--
ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id_idx` (`cart_id`),
  ADD KEY `product_id_idx` (`product_id`),
  ADD KEY `color_id_idx` (`color_id`);

--
-- 資料表索引 `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `product_id_idx` (`product_id`);

--
-- 資料表索引 `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `color_pic`
--
ALTER TABLE `color_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_idx` (`product_id`),
  ADD KEY `color_id_idx` (`color_id`);

--
-- 資料表索引 `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id_idx` (`type_id`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- 使用資料表 AUTO_INCREMENT `cart_list`
--
ALTER TABLE `cart_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- 使用資料表 AUTO_INCREMENT `collect`
--
ALTER TABLE `collect`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `color_pic`
--
ALTER TABLE `color_pic`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- 使用資料表 AUTO_INCREMENT `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- 使用資料表 AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 資料表的 Constraints `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `cart_list_cart_id_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_list_color_id_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `cart_list_product_id_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- 資料表的 Constraints `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_product_id_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `collect_user_id_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 資料表的 Constraints `color_pic`
--
ALTER TABLE `color_pic`
  ADD CONSTRAINT `color_pic_color_id_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `color_pic_product_id_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- 資料表的 Constraints `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_user_id_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 資料表的 Constraints `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_type_id_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
