-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-15 19:06:04
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `files`
--

-- --------------------------------------------------------

--
-- 資料表結構 `file_info`
--

CREATE TABLE `file_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album` tinyint(3) UNSIGNED NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `file_info`
--

INSERT INTO `file_info` (`id`, `filename`, `type`, `note`, `path`, `album`, `upload_time`) VALUES
(3, 'catzd20200713060424.jpg', 'Array', 'my_motto', 'img/catzd20200713060424.jpg', 1, '2020-07-12 22:04:24'),
(8, 'shark20200714103230.jpg', 'image/jpeg', 'cat', 'img/shark20200714103230.jpg', 2, '2020-07-14 00:11:44'),
(13, 'shark20200714103326.jpg', 'image/jpeg', '', 'img/shark20200714103326.jpg', 2, '2020-07-14 02:22:41'),
(14, 'shark20200714010518.jpg', 'image/jpeg', 'cat', 'img/shark20200714010518.jpg', 3, '2020-07-14 05:03:08'),
(17, 'dogzd20200715113042.jpg', 'image/jpeg', 'show', 'img/dogzd20200715113042.jpg', 2, '2020-07-15 15:30:42'),
(19, 'catzd20200716010241.jpg', 'image/jpeg', 'DanielSimon01', 'img/catzd20200716010241.jpg', 3, '2020-07-15 17:02:41');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `file_info`
--
ALTER TABLE `file_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
