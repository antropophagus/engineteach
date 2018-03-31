-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 01 2018 г., 02:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `teachengine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `primary_text` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `states`
--

INSERT INTO `states` (`id`, `title`, `tags`, `primary_text`, `text`, `create_date`) VALUES
(1, 'dfbfb', 'dfbfbdfb', 'dfbfbfdbdbdfb', 'dfbfdbdfnfdfddfbdfdnfdb', '2018-03-31 23:34:35'),
(2, 'regerg', 'ergrgerg', 'ergrgreg', 'ergergergregergergergegrg', '2018-04-01 00:15:21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `nickname`, `reg_date`) VALUES
(7, 'awdwad', 'fwefwef@fwwef.ru', '25d55ad283aa400af464c76d713c07ad', 'blblblbl', '2018-03-30 22:28:38'),
(8, 'efwegwegweg', 'wegwegwwg@ewrgerg.ru', '25d55ad283aa400af464c76d713c07ad', 'ergerherg', '2018-03-30 22:32:34'),
(9, 'gewgweg', 'wegweg@fwegewg.ru', '25d55ad283aa400af464c76d713c07ad', 'awdawf', '2018-03-31 17:00:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
