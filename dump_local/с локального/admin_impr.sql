-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2016 г., 10:33
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_impr`
--
CREATE DATABASE IF NOT EXISTS `admin_impr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admin_impr`;

-- --------------------------------------------------------

--
-- Структура таблицы `raits`
--

CREATE TABLE IF NOT EXISTS `raits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id рейтинга',
  `materialType` varchar(255) NOT NULL COMMENT 'Тип контента, который прокомментировали (пост блока или страница сайта). От этого значения зависит, к какому виду материалов относится materialId. Если materialType = ''blogPost'', то используется id поста из таблицы постов.blog_posts_table',
  `materialId` int(10) unsigned NOT NULL COMMENT 'id материала, который прокомментировали (поста в блоге или страницы сайта)',
  `userId` int(10) unsigned NOT NULL COMMENT 'id зарегестрированного пользователя из таблицы users ',
  `rateNum` int(11) DEFAULT NULL COMMENT 'Оценка пользователя по 10 бальной шкале',
  `rateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `raits`
--

INSERT INTO `raits` (`id`, `materialType`, `materialId`, `userId`, `rateNum`, `rateDate`) VALUES
(4, 'geo_institutions', 1, 25, 4, '2016-06-03 21:01:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
