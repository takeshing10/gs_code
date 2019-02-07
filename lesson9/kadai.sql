-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 2 月 07 日 14:22
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_book_review`
--

CREATE TABLE `gs_book_review` (
  `id` int(8) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `booksId` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `impression` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `userName` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `registDTM` datetime NOT NULL,
  `updateDTM` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_book_review`
--

INSERT INTO `gs_book_review` (`id`, `title`, `author`, `booksId`, `impression`, `rating`, `userName`, `registDTM`, `updateDTM`) VALUES
(9, '毎日が冒険', '高橋歩', 'XgOUjmmtQbsC', 'めっちゃおもろー！', 5, 'taro', '2019-02-07 22:19:56', '2019-02-07 22:19:56'),
(10, '自由帳', '高橋歩', 'kNYUywAACAAJ', 'この本サイコーです', 4, 'taro', '2019-02-07 22:20:19', '2019-02-07 22:20:19'),
(11, '自由人の脳みそ', '高橋歩', 'Q6_QoAEACAAJ', '自由になりたい！', 4, 'taro', '2019-02-07 22:20:38', '2019-02-07 22:20:38'),
(12, '毎日が冒険', '高橋歩', 'XgOUjmmtQbsC', '最高や', 3, 'jiro', '2019-02-07 22:21:23', '2019-02-07 22:21:23'),
(13, '毎日が冒険', '高橋歩', 'XgOUjmmtQbsC', 'エブリデー冒険！', 5, 'saburo', '2019-02-07 22:21:47', '2019-02-07 22:21:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(8) NOT NULL,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `registDTM` datetime NOT NULL,
  `updateDTM` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `registDTM`, `updateDTM`) VALUES
(10, '山田太郎', 'taro', '$2y$10$bdiYs0wHaJh43GwvxxvEXOfTffUMhMvF8DYSmlZKHgVzL/KKf3Ir6', 0, 0, '2019-02-07 22:18:26', '0000-00-00 00:00:00'),
(11, '山田二郎', 'jiro', '$2y$10$D7wtZ8iJOaomxLHJ8mwhue0/YnsXmuapm6hyucD1MDEkpBqxJdygi', 0, 0, '2019-02-07 22:18:39', '0000-00-00 00:00:00'),
(12, '山田三郎', 'saburo', '$2y$10$SWrrj6NXFlIWQJDXjp.5t.FAQcnDy7MfMWXGj3vMicLAeKpmuILOO', 0, 0, '2019-02-07 22:18:51', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_book_review`
--
ALTER TABLE `gs_book_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_book_review`
--
ALTER TABLE `gs_book_review`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
