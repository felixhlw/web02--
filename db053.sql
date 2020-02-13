-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-02-13 08:32:15
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db053`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影名稱',
  `level` tinyint(1) NOT NULL COMMENT '分級',
  `length` int(5) NOT NULL COMMENT '長度',
  `ondate` date NOT NULL COMMENT '放映日期',
  `publish` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '發行商',
  `director` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '導演',
  `trailer` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '預告影片',
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '預告海報',
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影介紹',
  `rank` int(5) NOT NULL COMMENT '排序',
  `sh` int(1) NOT NULL DEFAULT 1 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(2, '院線片02', 4, 90, '2020-01-16', '發行商2', '導演2', '03B02v.mp4', '03B02.png', '院線片2的劇情簡介,院線片2的劇情簡介,院線片2的劇情簡介', 8, 1),
(3, '院線片03', 4, 90, '2020-01-16', '發行商3', '導演3', '03B03v.mp4', '03B03.png', '院線片3的劇情簡介,院線片3的劇情簡介,院線片3的劇情簡介', 1, 1),
(4, '院線片04', 1, 90, '2020-01-15', '發行商4', '導演4', '03B04v.mp4', '03B04.png', '院線片4的劇情簡介,院線片4的劇情簡介,院線片4的劇情簡介', 2, 1),
(5, '院線片05', 3, 90, '2020-01-15', '發行商5', '導演5', '03B05v.mp4', '03B05.png', '院線片5的劇情簡介,院線片5的劇情簡介,院線片5的劇情簡介', 6, 1),
(6, '院線片06', 2, 90, '2020-01-15', '發行商6', '導演6', '03B06v.mp4', '03B06.png', '院線片6的劇情簡介,院線片6的劇情簡介,院線片6的劇情簡介', 5, 1),
(8, '院線片081', 2, 90, '2020-01-09', '發行商8', '導演8', '03B08v.mp4', '03B08.png', '院線片8的劇情簡介,院線片8的劇情簡介,院線片8的劇情簡介', 14, 1),
(9, '院線片09', 3, 90, '2020-01-16', '發行商9', '導演9', '03B09v.mp4', '03B09.png', '院線片9的劇情簡介,院線片9的劇情簡介,院線片9的劇情簡介', 7, 1),
(13, 'bbbbbb', 1, 50, '2020-01-08', 'bbbbbbbb', 'bbbbbbbbbbb', '03B08v.mp4', '03B24.png', 'bbbbbbbbbbbbbbbbbbbbbbbb', 4, 1),
(14, 'cccc', 1, 213, '2020-01-16', 'ccccc', 'ccccccc', '03B23v.mp4', '03B23.png', 'cccccccccccccccc', 9, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `no` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '訂單編號',
  `movie` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '電影名稱',
  `date` date NOT NULL COMMENT '觀影日期',
  `session` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '場次',
  `qt` int(1) NOT NULL COMMENT '票數',
  `seat` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '座位'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) VALUES
(32, '202001160032', '院線片05', '2020-01-16', '16:00 ~ 18:00', 4, 'a:4:{i:0;s:2:\"15\";i:1;s:2:\"16\";i:2;s:2:\"17\";i:3;s:2:\"18\";}'),
(34, '202001160034', '院線片03', '2020-01-16', '16:00 ~ 18:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:2:\"17\";}'),
(35, '202001160035', '院線片06', '2020-01-16', '16:00 ~ 18:00', 3, 'a:3:{i:0;s:2:\"15\";i:1;s:2:\"16\";i:2;s:2:\"17\";}'),
(36, '202001160036', '院線片06', '2020-01-16', '16:00 ~ 18:00', 3, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";}'),
(37, '202001160037', '院線片06', '2020-01-17', '14:00 ~ 16:00', 4, 'a:4:{i:0;s:1:\"5\";i:1;s:1:\"6\";i:2;s:1:\"7\";i:3;s:1:\"8\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔案路徑',
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '片名',
  `rank` int(5) NOT NULL COMMENT '排序',
  `sh` int(1) NOT NULL DEFAULT 1 COMMENT '顯示',
  `ani` int(1) NOT NULL DEFAULT 1 COMMENT '轉場動畫'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `poster`, `name`, `rank`, `sh`, `ani`) VALUES
(1, '03A01.jpg', '01', 6, 1, 2),
(2, '03A02.jpg', '02電影', 5, 0, 1),
(3, '03A03.jpg', '03', 4, 1, 3),
(4, '03A04.jpg', '04', 3, 1, 1),
(5, '03A05.jpg', '05', 1, 1, 1),
(7, '03A06.jpg', '06', 6, 1, 1),
(8, '03A07.jpg', '07123456', 8, 1, 1),
(9, '03A08.jpg', '08-1234', 9, 1, 1),
(10, '03A09.jpg', '09 預告片', 10, 1, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
