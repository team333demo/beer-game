-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 05 日 13:05
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `beer game`
--

-- --------------------------------------------------------

--
-- 資料表結構 `wholesaler`
--

CREATE TABLE `wholesaler` (
  `wid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `word` int(11) NOT NULL,
  `arrival` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `wstat` int(10) NOT NULL,
  `wsale` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `wholesaler`
--

INSERT INTO `wholesaler` (`wid`, `tid`, `period`, `stock`, `word`, `arrival`, `cost`, `wstat`, `wsale`) VALUES
(1, 0, 0, 15, 0, 0, 15, 1, 0),
(2, 0, 1, 15, 0, 0, 15, 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `wholesaler`
--
ALTER TABLE `wholesaler`
  ADD PRIMARY KEY (`wid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `wholesaler`
--
ALTER TABLE `wholesaler`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
