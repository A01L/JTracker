-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2023 г., 21:32
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `analytics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `key`, `email`) VALUES
(1, 'Just Adil', 'admin', 'justadil@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `redirect` varchar(150) NOT NULL,
  `timer` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `device` varchar(30) NOT NULL,
  `model_device` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `other` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `date`, `redirect`, `timer`, `country`, `region`, `device`, `model_device`, `browser`, `os`, `sex`, `age`, `other`) VALUES
(1, '2022-10-10 11:58:38', '1', '0', 'China', 'null', 'PC', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(2, '2022-10-10 12:00:03', '1', '0', 'Kazahstan', 'Almaty', 'PC', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(3, '2022-10-10 12:02:13', '2', '0', 'Kazahstan', 'null', 'PC', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(4, '2022-10-10 17:37:34', '3', '0', 'China', 'Hargos', 'Phone', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(5, '2022-10-10 17:39:16', '3', '0', 'Germany', 'Grayfurg', 'PC', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(6, '2022-10-10 17:39:43', '3', '0', 'Germany', 'null', 'PC', 'null', 'Chrome', 'Windows OS', '0', 0, '0'),
(7, '2022-10-11 11:10:43', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(8, '2022-10-11 11:10:44', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(9, '2022-10-11 11:10:44', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(10, '2022-10-11 11:10:44', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(11, '2022-10-11 11:10:44', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(12, '2022-10-11 11:11:24', '4', '0', 'null', 'null', 'PC', 'null', 'Opera', 'Windows OS', '0', 0, '0'),
(13, '2022-10-11 11:14:15', '4', '0', 'null', 'null', 'PC', 'null', 'Yandex', 'Windows OS', '0', 0, '0'),
(14, '2022-11-14 08:22:34', '', '0', 'null', 'null', 'PC', 'null', 'null', 'Windows OS', '0', 0, '0'),
(15, '2023-01-19 19:02:12', '', '0', 'null', 'null', 'PC', 'null', 'null', 'Windows OS', '0', 0, '0'),
(16, '2023-02-08 13:01:41', '', '0', 'null', 'null', 'PC', 'null', 'null', 'Windows OS', '0', 0, '0'),
(17, '2023-02-28 09:34:43', '', '0', 'null', 'null', 'PC', 'null', 'null', 'Windows OS', '0', 0, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `redirect`
--

CREATE TABLE `redirect` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `redirect`
--

INSERT INTO `redirect` (`id`, `data`, `link`, `title`) VALUES
(3, 'jcs', 'https://jcode.space/de', 'Test'),
(4, 'insta', 'https://instagram.com', 'Instagram');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
