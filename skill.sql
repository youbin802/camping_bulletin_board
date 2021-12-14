-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-03-15 16:01
-- 서버 버전: 10.4.8-MariaDB
-- PHP 버전: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `skill`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `writer` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `cnt` int(11) NOT NULL,
  `img` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `delCheck` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `boards`
--

INSERT INTO `boards` (`id`, `title`, `content`, `writer`, `date`, `cnt`, `img`, `email`, `delCheck`) VALUES
(1, 'sdfsd', 'fsdfsdf', '유빈', '2021-03-15', 0, 'tent-1208201_1920.jpg', '', '삭제'),
(2, 'sdfsd', 'fsdfsdf', '유빈', '2021-03-15', 0, 'people-2598902_1920.jpg', '', ''),
(6, '000000000', '000000000000000000000000000', 'zz', '2021-03-15', 1, 'backgroud.png', '', ''),
(7, '9999999999', '9999999999999999999999999', 'zz', '2021-03-15', 0, 'tent-5441144_1920.jpg', '', '삭제'),
(8, '444', '444444444444444444444', 'zz', '2021-03-15', 0, ' invest.jpg', '', ''),
(9, '3', '333333333333333', 'zz', '2021-03-15', 0, 'camping-691424_1920.jpg', '', ''),
(10, '222222', '222222222222222222222', 'zz', '2021-03-15', 0, 'adult-2178440_1920.jpg', '', ''),
(11, '12', '111111111111', 'zz', '2021-03-15', 0, 'bedroom-1006526_1920.jpg', '', ''),
(12, '2', '2', 'zz', '2021-03-15', 0, '', '', ''),
(13, '234', '234234234234', 'zz', '2021-03-15', 0, 'child-1871104_1920.jpg', '', ''),
(14, 'qqqqqqqq', 'qqqqqqqqqqqqqqq', 'zz', '2021-03-15', 1, 'candil-4125241_1920.jpg', '', ''),
(15, 'sdfsd', 'fsdfsdf', 'j', '2021-03-15', 0, 'apartment-lounge-3147892_1920.jpg', '', ''),
(16, '프로그래밍', 'zzzzzz', 'j', '2021-03-15', 0, 'brick-wall-1834784_1920.jpg', 'j@11', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `name` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `enoTe` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`name`, `date`, `enoTe`, `id`, `email`, `idx`) VALUES
('유빈', '2021-03-13 10:37:30', 'd', 2, '', 1),
('유빈', '2021-03-13 10:41:37', 'd', 2, '', 2),
('유빈', '2021-03-13 15:48:16', 'ㅇ', 7, '', 3),
('유빈', '2021-03-13 15:48:17', 'ㅇ', 7, '', 4),
('유빈', '2021-03-13 15:49:28', 'ㅇ', 7, '', 5),
('유빈', '2021-03-15 09:49:12', 'sdfsdf', 15, '', 6),
('유빈', '2021-03-15 10:06:32', '234234234', 15, '', 7),
('유빈', '2021-03-15 10:40:36', 'sdfsdf', 6, '', 8),
('유빈', '2021-03-15 10:52:30', 'd', 1, '', 9),
('유빈', '2021-03-15 12:34:08', 'd', 4, '', 13),
('zz', '2021-03-15 18:07:42', 'dfg', 8, '', 14),
('j', '2021-03-15 18:52:43', 'd', 16, '', 15),
('관리자', '2021-03-15 22:27:59', 'sdfsdf', 6, '', 16);

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `img` text NOT NULL,
  `delCheck` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `img`, `delCheck`) VALUES
('admin', '관리자', '1234', 'y2010109@y-y.hs.kr', '', ''),
('123', '123', '123', '123@13', 'apartment-lounge-3147892_1920.jpg', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
