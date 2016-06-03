-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2016 г., 13:30
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
-- Структура таблицы `geo_cities`
--

CREATE TABLE IF NOT EXISTS `geo_cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_code` varchar(10) NOT NULL COMMENT 'телефонный код города',
  `country_id` int(10) unsigned NOT NULL,
  `id_center` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'id регионального или другого центра, к которому пернадлежит город. 0 - является региональным центром',
  `name` varchar(255) NOT NULL COMMENT 'название города',
  `address` varchar(255) NOT NULL COMMENT 'адрессгорода, например: Люберцы, Московская область, Россия',
  `lat` decimal(10,8) NOT NULL COMMENT 'широта',
  `lng` decimal(11,8) NOT NULL COMMENT 'долгота',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `geo_cities`
--

INSERT INTO `geo_cities` (`id`, `phone_code`, `country_id`, `id_center`, `name`, `address`, `lat`, `lng`, `description`) VALUES
(1, '495', 1, 0, 'Москва', 'Москва', '55.74279280', '37.61540090', NULL),
(2, '3812', 1, 0, 'Омск', 'Омск', '54.98848040', '73.32423620', NULL),
(5, '057', 1, 0, 'киев', 'киев', '50.45010000', '30.52340000', 'описание');

-- --------------------------------------------------------

--
-- Структура таблицы `geo_countries`
--

CREATE TABLE IF NOT EXISTS `geo_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_code` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'название',
  `lat` decimal(10,8) NOT NULL COMMENT 'долгота',
  `lng` decimal(11,8) NOT NULL COMMENT 'широта',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `geo_countries`
--

INSERT INTO `geo_countries` (`id`, `phone_code`, `name`, `lat`, `lng`) VALUES
(1, '+7', 'Россия', '61.52401000', '105.31875600');

-- --------------------------------------------------------

--
-- Структура таблицы `geo_institutions`
--

CREATE TABLE IF NOT EXISTS `geo_institutions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL COMMENT 'образец - Малая Балканская ул., д. 54 ',
  `lat` decimal(10,8) NOT NULL COMMENT 'широта',
  `lng` decimal(11,8) NOT NULL COMMENT 'долгота',
  `description` text NOT NULL COMMENT 'краткое описание',
  `rating` decimal(3,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `geo_institutions`
--

INSERT INTO `geo_institutions` (`id`, `country_id`, `city_id`, `name`, `address`, `lat`, `lng`, `description`, `rating`) VALUES
(1, 1, 1, 'Роддом № 26', 'ул. Сосновая, 11,Москва', '55.80633500', '37.47830700', 'описание роддома Роддом № 26', '4.2'),
(2, 1, 1, 'ГКБ № 67, РОДИЛЬНЫЙ ДОМ № 1', 'Вилиса Лациса ул., 4,Москва', '55.86593900', '37.43099100', 'описание роддома Роддом № 67\n', '3.5'),
(3, 1, 2, 'РОДИЛЬНЫЙ ДОМ № 2, женская консультация № 1', 'ул. Энергетиков, 15,Омск,Омская обл.,644029', '55.03454620', '73.28011030', 'описание роддома Роддом № 2\n', '5.0'),
(4, 1, 2, 'Клинический родильный дом № 1', 'ул. Герцена, 69,Омск,Омская обл.,644007', '55.00308700', '73.37196900', 'описание роддома Роддом № 1\n', '2.0');

-- --------------------------------------------------------

--
-- Структура таблицы `geo_institutions_phones`
--

CREATE TABLE IF NOT EXISTS `geo_institutions_phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL COMMENT 'id учреждения',
  `phone_char` varchar(50) NOT NULL COMMENT 'номер телефона в местном формате, так с возможными тире и пробелами(так, как будет выводиться на сайт) Телеон в полном формате',
  `significance` int(11) DEFAULT NULL COMMENT 'значимость номера. 1- основной, 2- второстипенный и т.п.',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Дамп данных таблицы `geo_institutions_phones`
--

INSERT INTO `geo_institutions_phones` (`id`, `country_id`, `city_id`, `institution_id`, `phone_char`, `significance`) VALUES
(1, 1, 1, 2, '8 (495) 494-83-30', 1),
(2, 1, 1, 1, '8 (499) 190-52-80', 1),
(5, 1, 2, 4, '8 (381) 223-37-90', 1),
(6, 1, 2, 3, '8 (381) 267-35-13', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `geo_institutions_photos`
--

CREATE TABLE IF NOT EXISTS `geo_institutions_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) unsigned NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `queue` int(11) NOT NULL DEFAULT '0' COMMENT '0 - первый в очереди, очередь вывода, по умолчанию -1',
  PRIMARY KEY (`id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `geo_institutions_photos`
--

INSERT INTO `geo_institutions_photos` (`id`, `institution_id`, `img`, `title`, `queue`) VALUES
(1, 1, '1258023.jpg', NULL, 0),
(2, 1, 'nojshvanshtajn.jpg', NULL, 1),
(3, 1, 'vDkraC_Mk2g.jpg', NULL, 1),
(4, 1, 'Zamok-Noyshvanshtayn-Germaniya-10.jpg', NULL, 1),
(5, 2, '400px-Mir_Zamok.jpg', NULL, 0),
(6, 2, '1406659592_zamok-5.jpg', NULL, 1),
(7, 2, 'BritGot9.png', NULL, 2),
(8, 2, 'original23843386.jpg', NULL, 1),
(10, 3, '21.jpg', NULL, 0),
(11, 3, 'zamok-0007.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `materialType` varchar(255) NOT NULL COMMENT 'Тип контента, который прокомментировали (пост блока или страница сайта). От этого значения зависит, к какому виду материалов относится materialId. Если materialType = ''blogPost'', то используется id поста из таблицы постов.blog_posts_table',
  `materialId` int(10) unsigned NOT NULL COMMENT 'id материала, который прокомментировали (поста в блоге или страницы сайта)',
  `userId` int(10) unsigned NOT NULL COMMENT 'id зарегестрированного пользователя из таблицы users ',
  `likeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `materialType`, `materialId`, `userId`, `likeDate`) VALUES
(29, 'geo_institutions', 1, 1, '2016-05-25 17:54:02'),
(30, 'geo_institutions', 1, 25, '2016-05-25 17:59:31'),
(31, 'geo_institutions', 2, 1, '2016-05-30 12:51:00'),
(32, 'geo_institutions', 5, 1, '2016-06-01 17:42:41'),
(33, 'geo_institutions', 24, 1, '2016-06-02 08:33:54'),
(34, 'geo_institutions', 23, 1, '2016-06-02 08:47:05');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `geo_cities`
--
ALTER TABLE `geo_cities`
  ADD CONSTRAINT `geo_cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `geo_countries` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `geo_institutions`
--
ALTER TABLE `geo_institutions`
  ADD CONSTRAINT `geo_institutions_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `geo_cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `geo_institutions_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `geo_countries` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `geo_institutions_phones`
--
ALTER TABLE `geo_institutions_phones`
  ADD CONSTRAINT `geo_institutions_phones_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `geo_countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `geo_institutions_phones_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `geo_cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `geo_institutions_phones_ibfk_3` FOREIGN KEY (`institution_id`) REFERENCES `geo_institutions` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `geo_institutions_photos`
--
ALTER TABLE `geo_institutions_photos`
  ADD CONSTRAINT `geo_institutions_photos_ibfk_1` FOREIGN KEY (`institution_id`) REFERENCES `geo_institutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
