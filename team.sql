-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 03 日 20:03
-- 伺服器版本: 10.1.32-MariaDB
-- PHP 版本： 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `beergame`
--

-- --------------------------------------------------------

--
-- 資料表結構 `team`
--

CREATE TABLE `team` (
  `Tid` int(20) NOT NULL,
  `tname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `factory` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `distributor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `wholesaler` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `retailer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(20) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `team`
--

INSERT INTO `team` (`Tid`, `tname`, `factory`, `distributor`, `wholesaler`, `retailer`, `status`, `cost`, `score`) VALUES
(1, '777', '12', '', '34', '45', '完成', 158, 0),
(2, '555', '', '3333333', '', '', '結束', 0, 0),
(3, '666', '', '', '', '', '等待中', 0, 0),
(4, '456L', '55879', '', '', '', '遊戲中', 0, 0),
(5, '87545', 'amy', '', '', '', '等待中', 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Tid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `Tid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
