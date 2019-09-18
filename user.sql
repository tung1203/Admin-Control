-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 05:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `user_level`, `status`) VALUES
(158, 'Tùng', 'Thanh', 'tung120320@gmail.com', '$2y$10$ovzEkFxSxrChy6N/8APyeeqbk/ZuYfSV5sVKXzlFKe86XC9S9e1Cm', '2019-09-18 01:58:16', 2, 0),
(159, 'Tùng', 'Thanh', 't@gmail.com', '$2y$10$gXeoIeqj8kmQ8xON9mhW4uOrhvAZFl/GrAy5kHVivu7M//PWmDcW2', '2019-09-17 04:19:04', 2, 0),
(161, 'test', 'test', 'test@gmail.com', '$2y$10$0UiVrHvxH2BhdE1YskuQK.QIdQ7IFgO6MyFL8/ulMLm6KlPHTrHMe', '2019-09-16 04:43:02', 2, 0),
(162, 'admin', 'tung', 'admin@gmail.com', '$2y$10$CK.L0C42hzlvRxKYqOYoHO6Ojzbrk8pKb2yBtkZuBhJHOYfF/owPq', '2019-09-17 03:07:33', 1, 1),
(167, 'Tùng', 'Thanh', 'thanhtung120300@hotmail.com', '$2y$10$P14TKOJhxKw75UJpk4ebMe0P90klzeONqR4cESp4oeoEPZUm/zgMi', '2019-09-17 03:50:03', 1, 1),
(219, 'Tùng', 'Thanh', 'qwe@gmail.com', '$2y$10$xkoLQKtyB4.GRu6RwCT7eOaQhJGTa7DIigGiZjDZ06MIK8ilcGSky', '2019-09-18 02:14:35', 0, 0),
(221, 'Tùng', 'Thanh', 'abc120320@gmail.com', '$2y$10$tO/1A6cNavx/i/0EkBb.1O68KprZJ78nCbLankEPq6/AZU3wlDGb6', '2019-09-17 07:45:25', 1, 1),
(223, 'abc1', 'abc1', 'abc@gmail.com', '$2y$10$3hh36sVDHUu7nx1UIrX.cuWLKp8YP4n9V.dVCvYdFe/JFR4v9zf8m', '2019-09-18 02:11:12', 2, 0),
(224, 'abcd', 'abcd', 'abcd@gmail.com', '$2y$10$P/EYoqq90EC2JwTxG9tF1eVtxQntQXFlZUcyB4etCqehGgVd7Fttm', '2019-09-17 07:50:34', 2, 0),
(225, 'a', 'a', 'a', '$2y$10$GuQkr9mxtkzBVW.ouWY7NO6WbFKE4Q.pzKxoF/viNi6xy0Jrzwni2', '2019-09-18 02:10:50', 2, 0),
(241, 'test1@gmail.com', 'test1@gmail.com', 'test1@gmail.com', '$2y$10$t/pH3nJBezmCsWtj.wrvsObnkaiPOw0MBIT4yCi49lDKAE5JzQsyy', '2019-09-18 02:11:43', 2, 0),
(242, 'test2@gmail.com', 'test2@gmail.com', 'test2@gmail.com', '$2y$10$wKHbI4vbvcVZgbyl9v.V5OD/cHMwpQdFuiKJPZXL6xmzIGPyu7QMC', '2019-09-18 02:13:01', 2, 0),
(243, 'test3@gmail.com', 'test3@gmail.com', 'test3@gmail.com', '$2y$10$CBxW1Ma5OrW33U6Al1v/peMFogukVsr/8j5eG3d3xRXBo45wZVplO', '2019-09-18 02:16:18', 2, 0),
(244, 'test4@gmail.com', 'test4@gmail.com', 'test4@gmail.com', '$2y$10$rGogB84xodPYu5sZp.RCyeyg1pUlYcTgv6uE8tW6BxEFUPST2UafK', '2019-09-18 02:19:19', 2, 0),
(245, 'test5@gmail.com', 'test5@gmail.com', 'test5@gmail.com', '$2y$10$UaVsl.VxIp1s2kiHiIgNsO8FpxlANq.QhvYxFAciK/GUGrASodj7.', '2019-09-18 02:19:51', 2, 0),
(246, 'test6@gmail.com', 'test6@gmail.com', 'test6@gmail.com', '$2y$10$ZSmlKLvO2j1Jpuo.E38e3u3CR9zn6g8zz4DeQxWy5mFELUYdk1Hle', '2019-09-18 02:20:19', 2, 0),
(248, 'test7@gmail.com', 'test7@gmail.com', 'test7@gmail.com', '$2y$10$fqFjTSSGr36rcMxkAay4Q.vRFa70MARaKRwt/nRUBYSqXC1keFdWm', '2019-09-18 02:21:09', 2, 1),
(249, 'test8@gmail.com', 'test8@gmail.com', 'test8@gmail.com', '$2y$10$6d60FOOwn.pGiusJilzdMuTqdHSuMQboFXlMU82igwxv50iyiyYGm', '2019-09-18 02:25:14', 2, 0),
(251, 'test9@gmail.com', 'test9@gmail.com', 'test9@gmail.com', '$2y$10$m.iFwLAA7PaJDjCtrHOQfeJaINdo53xZQKgbmGJTXYXCgVQEHX0V.', '2019-09-18 02:25:44', 2, 1),
(252, 'test10@gmail.com', 'test10@gmail.com', 'test10@gmail.com', '$2y$10$2PUeFEiqF0YZschKuHTYtuv12I1DpgqZEVFn.RVspZ8zmNQ7ovr3G', '2019-09-18 02:25:59', 2, 1),
(253, 'test11@gmail.com', 'test11@gmail.com', 'test11@gmail.com', '$2y$10$V5EHyaMWY.KXv/XVDZVa6.StrmYqcProqsYo/libdY5HIqlb08I7C', '2019-09-18 02:26:10', 2, 1),
(254, 'test12@gmail.com', 'test12@gmail.com', 'test12@gmail.com', '$2y$10$pI19JtvnFaFjmkXtyviuJu065.PdGHWkapiMgwgJx0iP9xqZ/72BK', '2019-09-18 02:26:21', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
