-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 14 2017 г., 12:55
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cactus`
--
CREATE DATABASE IF NOT EXISTS `cactus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cactus`;

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(16) NOT NULL,
  `idp` int(16) NOT NULL,
  `date` datetime NOT NULL,
  `geopos` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `idu` int(16) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `idp`, `date`, `geopos`, `description`, `idu`, `icon`) VALUES
(1, 0, '2017-05-16 00:00:00', '50.448069 30.529913', 'Hackaton Cactus', 4, '*'),
(2, 0, '2017-05-16 00:00:00', '50.467885 30.517541', 'Yanky go home', 4, '*'),
(3, 0, '2017-05-14 08:00:00', '35.448533 55.432134', 'Check project', 3, '*'),
(4, 0, '2017-05-20 00:00:00', '50.459279 30.512831', 'Kiev Fashion Marketing Forum', 1, 'null'),
(5, 0, '2017-05-20 00:00:00', '50.459279 30.512831', 'Kiev Fashion Marketing Forum', 1, 'null'),
(6, 0, '2017-05-14 00:00:00', '50.52593 30.46218', 'American Football Patriots Kiev vs Lumberjacks Uzhgorod !', 1, 'null'),
(7, 0, '2017-05-20 00:00:00', '50.459279 30.512831', 'Kiev Fashion Marketing Forum', 1, 'null'),
(8, 0, '2017-05-14 00:00:00', '50.52593 30.46218', 'American Football Patriots Kiev vs Lumberjacks Uzhgorod !', 1, 'null'),
(9, 0, '2017-05-19 00:00:00', '54.364472 18.648606', 'Kiev Office \\/ 19.05 \\/ Gda?sk B90 + Judy\'s Funeral, Castlings', 1, 'null'),
(10, 0, '2017-05-13 00:00:00', '50.446622 30.513132', 'Singing Kiev Free tour with Beinside Ukraine', 1, 'null'),
(11, 0, '2017-08-19 00:00:00', '-27.57735 -48.52586', 'Kiev Ballet apresenta tributo a Tchaikovsky', 1, 'null'),
(12, 0, '2017-06-02 00:00:00', '50.42136 30.522180', 'KISF-Kiev International Summer Festival June 2-4, 2017', 1, 'null'),
(13, 0, '2017-05-13 00:00:00', '50.42136 30.522180', '13.05.17 Kauan in Kiev (early years special set)', 1, 'null'),
(14, 0, '2017-08-27 00:00:00', '50.45 30.5233}', 'Kiev Turlar?', 1, 'null'),
(15, 0, '2017-06-20 00:00:00', '50.422300 30.520706', 'Kiev', 1, 'null'),
(16, 0, '2017-06-20 00:00:00', '50.439187 30.519976', 'Overkill Kiev', 1, 'null'),
(17, 0, '2017-05-12 00:00:00', '50.448380 30.520781', 'Thomas Mraz in Kiev', 1, 'null'),
(18, 0, '2017-05-30 00:00:00', '50.451337 30.522543', 'Aquatherm kiev', 1, 'null'),
(19, 0, '2017-05-20 00:00:00', '50.433117 30.516194', '????????? ?????????? #kievchgk', 1, 'null'),
(20, 0, '2017-09-23 00:00:00', '50.433331 30.520792', '2017-09-23T21', 1, 'null'),
(21, 0, '2017-05-20 00:00:00', '50.439108 30.520181', 'Enter Shikari. Kiev, Ukraine. May 2017', 1, 'null'),
(22, 0, '2017-10-03 00:00:00', '50.452093 30.590994', 'IOS Kiev 2017 - Intern. Orthodontic Symposium', 1, 'null'),
(23, 0, '2017-11-18 00:00:00', '50.45 30.5233}', 'Concert in KIEV, Ukraine ', 1, 'null'),
(24, 0, '2017-05-26 00:00:00', '50.539387 30.272151', 'Scrum Coaching Retreat Kiev 2017 by ScrumAlliance', 1, 'null'),
(25, 0, '2017-10-27 00:00:00', '50.421770 30.525445', 'Graciela Gonzalez a Kiev', 1, 'null'),
(26, 0, '2017-11-11 00:00:00', '50.45 30.5233}', 'Scorpions at Kiev, Ukraine', 1, 'null'),
(27, 0, '2017-07-19 00:00:00', '-6.217077 106.49126', 'Depeche Mode in Kiev', 1, 'null'),
(28, 0, '2017-08-02 00:00:00', '-6.217077 106.49126', 'Marilyn Manson in Kiev', 1, 'null'),
(29, 0, '2017-05-28 00:00:00', '50.05145 19.94325', 'Lost in Kiev (support', 1, 'null'),
(30, 0, '2017-05-13 00:00:00', '40.763118 -73.99292', 'Europhoria', 1, 'null'),
(31, 0, '2017-04-30 00:00:00', '50.434444 30.527777', 'KYIV ART FORT 2017. ?????????-?????????? ??????', 1, 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `events_tegs`
--

CREATE TABLE `events_tegs` (
  `id` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events_tegs`
--

INSERT INTO `events_tegs` (`id`, `ide`, `idi`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(64) NOT NULL,
  `icon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `interests`
--

INSERT INTO `interests` (`id`, `description`, `name`, `icon`) VALUES
(1, 'play bowling', 'bowling', '*'),
(2, 'Visit a cinema', 'movie', '*'),
(3, 'Ride a roler', 'Roler', '*');

-- --------------------------------------------------------

--
-- Структура таблицы `place_tags`
--

CREATE TABLE `place_tags` (
  `id` int(16) NOT NULL,
  `idp` int(16) NOT NULL,
  `idi` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `geopos` varchar(64) NOT NULL,
  `site` varchar(128) NOT NULL,
  `rank` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `preferences`
--

CREATE TABLE `preferences` (
  `id` int(16) NOT NULL,
  `idu` int(16) NOT NULL,
  `idi` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `preferences`
--

INSERT INTO `preferences` (`id`, `idu`, `idi`) VALUES
(1, 4, 1),
(2, 4, 3),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `id` int(16) NOT NULL,
  `idp` int(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `ranks`
--

CREATE TABLE `ranks` (
  `id` int(16) NOT NULL,
  `idp` int(16) NOT NULL,
  `idu` int(16) NOT NULL,
  `date` date NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `bd` date NOT NULL,
  `gender` int(1) NOT NULL,
  `number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `pass`, `bd`, `gender`, `number`) VALUES
(3, '', '', 'gopa1', '13cc7da091d7ca1741da9dea69ed43548caa85a6a7f4420efc754a734e97ab65', '0000-00-00', 0, ''),
(4, '', '', '123', '7e891e804dba67b0761b4a8b7789799b7d552ae0cf5a9a99ccc63ddb0761a477', '0000-00-00', 0, ''),
(5, '', '', 'dimon', '7e891e804dba67b0761b4a8b7789799b7d552ae0cf5a9a99ccc63ddb0761a477', '0000-00-00', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events_tegs`
--
ALTER TABLE `events_tegs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `place_tags`
--
ALTER TABLE `place_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `events_tegs`
--
ALTER TABLE `events_tegs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `place_tags`
--
ALTER TABLE `place_tags`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
