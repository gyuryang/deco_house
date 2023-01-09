-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-05-29 09:20
-- 서버 버전: 10.1.37-MariaDB
-- PHP 버전: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `c2020`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `grade`
--

CREATE TABLE `grade` (
  `idx` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `hidx` int(11) NOT NULL,
  `uidx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `house`
--

CREATE TABLE `house` (
  `idx` int(11) NOT NULL,
  `befor` text NOT NULL,
  `after` text NOT NULL,
  `uidx` int(11) NOT NULL,
  `today` date NOT NULL,
  `knowhow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `request`
--

CREATE TABLE `request` (
  `idx` int(11) NOT NULL,
  `uidx` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `response`
--

CREATE TABLE `response` (
  `idx` int(11) NOT NULL,
  `ridx` int(11) NOT NULL,
  `uidx` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `specialist`
--

CREATE TABLE `specialist` (
  `idx` int(11) NOT NULL,
  `uidx` int(11) NOT NULL,
  `sidx` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `idx` int(11) NOT NULL,
  `name` text NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` text NOT NULL,
  `images` text NOT NULL,
  `specialist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `grade`
--
ALTER TABLE `grade`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `house`
--
ALTER TABLE `house`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 테이블의 AUTO_INCREMENT `request`
--
ALTER TABLE `request`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `response`
--
ALTER TABLE `response`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `specialist`
--
ALTER TABLE `specialist`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
