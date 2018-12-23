-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 23 日 16:15
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
-- 資料表結構 `demand`
--

CREATE TABLE `demand` (
  `Rid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `1` int(10) NOT NULL,
  `2` int(10) NOT NULL,
  `3` int(10) NOT NULL,
  `4` int(10) NOT NULL,
  `5` int(10) NOT NULL,
  `6` int(10) NOT NULL,
  `7` int(10) NOT NULL,
  `8` int(10) NOT NULL,
  `9` int(10) NOT NULL,
  `10` int(10) NOT NULL,
  `11` int(10) NOT NULL,
  `12` int(10) NOT NULL,
  `13` int(10) NOT NULL,
  `14` int(10) NOT NULL,
  `15` int(10) NOT NULL,
  `16` int(10) NOT NULL,
  `17` int(10) NOT NULL,
  `18` int(10) NOT NULL,
  `19` int(10) NOT NULL,
  `20` int(10) NOT NULL,
  `21` int(10) NOT NULL,
  `22` int(10) NOT NULL,
  `23` int(10) NOT NULL,
  `24` int(10) NOT NULL,
  `25` int(10) NOT NULL,
  `26` int(10) NOT NULL,
  `27` int(10) NOT NULL,
  `28` int(10) NOT NULL,
  `29` int(10) NOT NULL,
  `30` int(10) NOT NULL,
  `31` int(10) NOT NULL,
  `32` int(10) NOT NULL,
  `33` int(10) NOT NULL,
  `34` int(10) NOT NULL,
  `35` int(10) NOT NULL,
  `36` int(10) NOT NULL,
  `37` int(10) NOT NULL,
  `38` int(10) NOT NULL,
  `39` int(10) NOT NULL,
  `40` int(10) NOT NULL,
  `41` int(10) NOT NULL,
  `42` int(10) NOT NULL,
  `43` int(10) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `team`
--

INSERT INTO `team` (`Tid`, `tname`, `factory`, `distributor`, `wholesaler`, `retailer`, `status`, `cost`) VALUES
(1, '777', '12', '', '34', '45', '完成', 158),
(2, '555', '', '', '', '', '結束', 0),
(3, '666', '', '', '', '', '等待中', 0),
(4, '456L', '55879', '', '', '', '遊戲中', 0),
(5, '87545', '', '', '', '', '等待中', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `teammember`
--

CREATE TABLE `teammember` (
  `TMid` int(11) NOT NULL,
  `Tid` int(10) NOT NULL,
  `player` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uid` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `teammember`
--

INSERT INTO `teammember` (`TMid`, `Tid`, `player`, `uid`) VALUES
(1, 1, 'factory', '111'),
(2, 3, 'distributor', '999'),
(3, 2, 'distributor', '888'),
(4, 1, 'distributor', '444');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`Rid`);

--
-- 資料表索引 `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Tid`);

--
-- 資料表索引 `teammember`
--
ALTER TABLE `teammember`
  ADD PRIMARY KEY (`TMid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `demand`
--
ALTER TABLE `demand`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `Tid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `teammember`
--
ALTER TABLE `teammember`
  MODIFY `TMid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
