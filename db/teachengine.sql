-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 12 2018 г., 00:26
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `teachengine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'it'),
(2, 'news'),
(3, 'games');

-- --------------------------------------------------------

--
-- Структура таблицы `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `primary_text` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `states`
--

INSERT INTO `states` (`id`, `title`, `primary_text`, `text`, `category_id`, `create_date`) VALUES
(1, 'dfbfb', 'dfbfbfdbdbdfb', 'dfbfdbdfnfdfddfbdfdnfdb', 1, '2018-03-31'),
(2, 'regerg', 'ergrgreg', 'ergergergregergergergegrg', 1, '2018-04-01'),
(3, 'fwefwefwef', 'wefwefwefewgegwefwf', 'fwefwegewgewfwefwegwefewg', 2, '2018-04-04'),
(4, 'wegwegweg', 'wegewgwegweg', 'wegwegwegwegwegwegwegwegg', 2, '2018-04-03'),
(5, 'ergrehreherh', 'erhergregrehe', 'wegieuWGHEHEWUIGHUIWGHEGHEUWIGHUWEGHWUGHEUWGWEGHWUHGWUGH', 2, '2018-04-03'),
(7, 'ergrehreherh', 'erhergregrehe', 'wegieuWGHEHEWUIGHUIWGHEGHEUWIGHUWEGHWUGHEUWGWEGHWUHGWUGH', 1, '2018-04-04'),
(9, 'Привет', 'бла бла бла', 'Статья об IT', 1, '2018-04-01'),
(10, 'Ура!', 'Сайт уже работает!', 'Ликуйте люди! Сайт уже находится в альфе, и им уже можно пользоваться!', 2, '2018-04-01');

-- --------------------------------------------------------

--
-- Структура таблицы `tags/states`
--

CREATE TABLE `tags/states` (
  `id_state` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `root_rules` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `nickname`, `reg_date`, `root_rules`) VALUES
(11, 'Antropophagus', 'fomka@hook.ru', 'd4dd15a648a8fad75c6759f01c3fd042', 'Donald', '2018-04-07', 3),
(12, 'Lol', 'lol@hyper.ru', '25f9e794323b453885f5181f1b624d0b', 'Lalka', '2018-04-07', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
