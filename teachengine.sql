-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 07 2018 г., 23:24
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
  `category` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `states`
--

INSERT INTO `states` (`id`, `title`, `tags`, `primary_text`, `text`, `category`, `create_date`) VALUES
(1, 'dfbfb', 'dfbfbdfb', 'dfbfbfdbdbdfb', 'dfbfdbdfnfdfddfbdfdnfdb', 'News', '2018-03-31 23:34:35'),
(2, 'regerg', 'ergrgerg', 'ergrgreg', 'ergergergregergergergegrg', 'News', '2018-04-01 00:15:21'),
(3, 'fwefwefwef', 'wefef', 'wefwefwefewgegwefwf', 'fwefwegewgewfwefwegwefewg', 'IT', '2018-04-04 00:00:00'),
(4, 'wegwegweg', 'wegwegwegweg', 'wegewgwegweg', 'wegwegwegwegwegwegwegwegg', 'IT', '2018-04-03 00:00:00'),
(5, 'ergrehreherh', 'erherhregergerh', 'erhergregrehe', 'wegieuWGHEHEWUIGHUIWGHEGHEUWIGHUWEGHWUGHEUWGWEGHWUHGWUGH', 'Computer', '0000-00-00 00:00:00'),
(7, 'ergrehreherh', 'erherhregergerh', 'erhergregrehe', 'wegieuWGHEHEWUIGHUIWGHEGHEUWIGHUWEGHWUGHEUWGWEGHWUHGWUGH', 'Computer', '0000-00-00 00:00:00'),
(9, 'Привет', 'проверка', 'бла бла бла', 'Статья об IT', 'IT', '2018-04-01 13:45:47'),
(10, 'Ура!', 'Ура', 'Сайт уже работает!', 'Ликуйте люди! Сайт уже находится в альфе, и им уже можно пользоваться!', 'News', '2018-04-01 17:16:15');

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
  `root_rules` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `nickname`, `reg_date`, `root_rules`) VALUES
(11, 'Antropophagus', 'fomka@hook.ru', 'd4dd15a648a8fad75c6759f01c3fd042', 'Donald', '2018-04-07 00:33:14', 3),
(12, 'Lol', 'lol@hyper.ru', '25f9e794323b453885f5181f1b624d0b', 'Lalka', '2018-04-07 20:34:28', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
