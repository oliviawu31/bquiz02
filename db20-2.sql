-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-12-30 04:09:09
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- 資料庫： `db20-2`
--
-- --------------------------------------------------------
--
-- 資料表結構 `total`
--
CREATE TABLE `total` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--
INSERT INTO
  `total` (`id`, `day`, `total`)
VALUES
  (1, '0000-00-00', 1);

--
-- 已傾印資料表的索引
--
--
-- 資料表索引 `total`
--
ALTER TABLE
  `total`
ADD
  PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--
--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE
  `total`
MODIFY
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;