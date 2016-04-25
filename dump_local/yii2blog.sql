-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 24 2016 г., 18:15
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii2blog`
--
CREATE DATABASE IF NOT EXISTS `yii2blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yii2blog`;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categoris_posts_table`
--

CREATE TABLE IF NOT EXISTS `blog_categoris_posts_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(10) unsigned NOT NULL,
  `id_category` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `blog_categoris_posts_table`
--

INSERT INTO `blog_categoris_posts_table` (`id`, `id_post`, `id_category`) VALUES
(32, 2, 1),
(34, 18, 1),
(38, 20, 1),
(46, 21, 1),
(48, 1, 2),
(49, 22, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categoris_table`
--

CREATE TABLE IF NOT EXISTS `blog_categoris_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `blog_categoris_table`
--

INSERT INTO `blog_categoris_table` (`id`, `alias`, `title`, `h1`, `descriptions`) VALUES
(1, 'cat1', 'Категория 1', 'Имя категории1', 'Описание категории 1'),
(2, 'cat2', 'Категория 2', 'Имя категории2', 'Описание категории 2');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_images`
--

CREATE TABLE IF NOT EXISTS `blog_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_blog` int(10) unsigned NOT NULL,
  `imgSrc` int(11) NOT NULL,
  `imgTitle` int(11) NOT NULL,
  `imgAlt` int(11) NOT NULL,
  `importance` enum('100','0') NOT NULL DEFAULT '100' COMMENT '1- для витрины статьи блога, 0 - для размещения в контенте',
  PRIMARY KEY (`id`),
  KEY `id_blog` (`id_blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_posts_table`
--

CREATE TABLE IF NOT EXISTS `blog_posts_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `content` text,
  `createdDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `blog_posts_table`
--

INSERT INTO `blog_posts_table` (`id`, `alias`, `title`, `description`, `h1`, `img`, `content`, `createdDate`) VALUES
(1, '1aliaspost', 'Кофе при беременности', 'Многих людей, среди которых и беременные женщины, привлекает аромат и вкус кофе. Но что можно сказать о пользе данного напитка? Почему необходимо снижать количество употребляемого кофе в период вынашивания ребенка?', 'Кофе при беременности h1', '215247.jpg', '<p>Многих людей, среди которых и беременные женщины, привлекает аромат и вкус кофе. Но что можно сказать о пользе данного напитка? Почему необходимо снижать количество употребляемого кофе в период вынашивания ребенка? Ответ на данный вопрос будет представлен далее.</p>\n<p><strong>Влияние кофе на беременности</strong></p>\n<p>Начнем с того, что из-за употребления кофе возбуждается вся нервная система будущей мамы, а значит происходят сбои в работе различных органов. В частности, почки начинают работать в 5 раз быстрее, увеличивается объем выделяемых желез, повышается показатель сердцебиения и учащается дыхание. Плюс ко всему из организма беременной женщины выводятся полезные микроэлементы, в частности: магний, фосфор, калий, натрий и железо, а также кальций. Однако это не самое опасное, ведь кофе негативно сказывается на репродуктивных функциях. По словам ученных, три чашки кофе в день - это как противозачаточное средство, а значит, беременная женщина рискует &laquo;заработать&raquo; выкидыш, если будет много пить кофе. Также кофе подавляет аппетит беременной женщины, а из-за этого плод не получает достаточного количества питательного объема витаминов.</p>\n<p>Можно подвести итог, что кофе в целом оказывает негативное влияние на самочувствие как самой беременной женщины, так и плода, который развивается у нее в животе. Но в небольших количествах, натуральный кофе безопасен, чего нельзя сказать о растворимых напитках.</p>\n<p><strong>Растворимый кофе при беременности</strong></p>\n<p>В растворимых кофейных напитках содержится 15% кофейных зерен, а все остальное &ndash; это всевозможные химические составляющие, благодаря которым напиток становится вкусным и</p>\n<p>ароматным. Рекомендуется отказаться от употребления растворимого кофе вообще во время беременности и вскармливания малыша.</p>\n<p><strong>А как же кофе без кофеина</strong></p>\n<p>И эта разновидность может быть опасна для беременных из-за проводящейся обработки кофейных зерен. Из-за этого могут появиться всевозможные аллергические реакции, а также</p>\n<p>образоваться атеросклеротические бляшки. Все это показывает, что кофе употреблять можно, но к выбору напитка нужно отнестись максимально серьезно. Вообще же, следует подумать а зачем беременной рисковать и &laquo;угощать&raquo; себя таким не совсем однозначным напитком.</p>\n<p><strong>Факты о кофеине при беременности</strong></p>\n<p>● Помимо кофе, кофеин находится в коле, чае, какао и шоколаде;</p>\n<p>● Если употребляется от 4 до 7 кружек кофе в день, то плод погибает в 33% всех случаев;</p>\n<p>● Из-за постоянного употребления кофе, вес новорожденного малыша снижается и влияет</p>\n<p>на его самочувствие;</p>\n<p>● В том случае, если будущая мама совсем не может без кофе, то употреблять можно лишь 2 чашки напитка в день. Это 200 миллиграмм кофеина, а этот объем содержится в 282 граммах кофе или 700 граммах чая.</p>\n<p>Правильная беременность &ndash; это гарантия здоровья как малыша, так и мамы, а значит залог хорошего настроения и самочувствия.</p>', '2016-04-20 00:00:00'),
(2, '2aliaspost', '​Причины появления кровянистых выделений на ранних сроках беременности', '1Насторожить беременную даму должны и появления болей внизу живота. Обычно они сопровождаются обильными кровянистыми выделениями.', '​Причины появления кровянистых выделений на ранних сроках беременности h1', '6.jpg', '<p style="text-align: justify;">Причины появления кровянистых выделений на ранних сроках беременности</p><p style="text-align: justify;">К сожалению, оказаться в руках хорошего гинеколога удается не всем. Поэтому в обычной женской консультации многие врачи забывают предупреждать о появлениях выделений в первые месяцы беременности. При этом многие секреции совершенно не требуют длительного/короткого медикаментозного лечения. И их невозможно отнести к патологиям. Именно об этом и не говорят гинекологи. А значит, страхи беременной женщины усиливаются в разы. Как же разобраться в этом вопросе?</p><p style="text-align: justify;">Стандартные выделения на первых порах беременности</p><p style="text-align: justify;">Уделите немного времени на осмотр прокладки. </p><ol><li>Перед вами:</li></ol><ul><li>Небольшое количество выделений;</li><li>Белесый цвет, практически прозрачные; </li><li>Отсутствие запахов?</li></ul><p style="text-align: justify;">Это реакция организма на изменения в гормональном фоне. Перед вами результат работы гормонов, которые отвечают за сохранность беременности. В этот период происходит прикрепление зародыша и формирование плаценты, слизистой пробки. В такой период разрешается использование прокладок ежедневного типа. Но помните, на весь период беременности категорически нельзя применять тампоны!</p><ol><li>Если вы наблюдаете следующие выделения:</li></ol><ul><li>Творожистая секреция;</li><li>Ярко выражен белый цвет;</li><li>Кисловатый запах;</li><li>Неприятные ощущения в промежности (зуд, жжение), то</li></ul><p style="text-align: justify;">Скорее всего, у вас развивается молочница. В медицинской сфере данное заболевание известно как вагинальный кандидоз. В этом случае требуется немедленно обратиться за консультацией к врачу. После некоторых анализов, будет предложено лечение медикаментозного типа. Заметим, что назначается курс препаратов одновременно супруге и супругу.</p><ol><li>Существуют выделения, подходящие под следующее описание:</li></ol><ul><li>Желтый цвет слизи;</li><li>Неприятный аромат.</li></ul><p style="text-align: justify;">Подобные симптомы достаточно опасны и должны вызывать желание отправиться на прием к гинекологу. Заметим, что подобные выделения характерны на первых неделях беременности. Они являются «сигналами» том, что в организме женщины начался воспалительный процесс. Если не провести вовремя осмотр и не выявить причину болезни, может произойти самопроизвольный выкидыш. </p><ol><li>В тех случаях, когда выделения имеют зеленоватые или ярко-желтые выделения, - предлагается осмыслить о прерывании беременности. Ведь столь яркие проявления говорят об инфекции, передающейся половым путем. </li><li>Кровянистые выделения также могут возникнуть в первом триместре беременности. Многие молодые мамочки ошибочно принимают их за менструацию. Как правило, цвет выделений красный или коричневый. Количество их небольшое. Обычно эти выделения возникают в привычные дни менструального кровотечения. Если при этом нет болей, значит, страшного в подобных проявлениях не наблюдается. Однако необходимо выяснить причины их появления.</li></ol><p style="text-align: justify;">Кровянистые выделения: причины появления</p><ol><li>Одной из самых распространенных причин кровянистых выделений является «имплантация плодного яйца». Ведь в течение первой недели беременности происходит следующее: в стенку матки стремится закрепиться плодное яйцо. В результате происходит разрыхление слизистой матки, развитие новых сосудов. </li></ol><p style="text-align: justify;">Подобный процесс вызывает вагинальные выделения. Обычно они не обильны, коричневатого, красного или бурого цветов. Порою чувствительные девушки испытывают незначительные спазмы в матке. </p><p style="text-align: justify;">Если описанные проявлений происходят в течение первой недели беременности – ничего страшного не происходит. Мы настоятельно рекомендуем обратиться в любом случае к врачу. Очень важно убедиться, что плод в безопасности. Ведь риск потерять эмбрион достаточно велик.</p><ol><li>Вторая причина появления кровянистых выделений – это появление эрозии шейки матки. В принципе, опасного в этом ничего нет. Во время первых дней беременности происходит резкий приток крови к матке. Это и провоцирует возникновение кровотечения слизистой. Как правило, основополагающей причиной появления эрозии является половой акт. </li><li>Полип в цервикальном канале также является одной из причин появления кровянистых мазков. Речь идет и о децидуальных полипах. Это безвредные опухоли в теле матке или на ее шейке. В таких случаях выделения бывают крайне незначительные и без симптомные.</li><li>Существует еще одна причины, которая может вызвать кровянистые выделения. Речь идет о варикозном расширении кровеносных сосудов. При этом данный диагноз ставят не для нижних конечностей. Изменения происходят в наружных половых органах. </li></ol><p style="text-align: justify;">Опасности кровянистых выделений во время беременности</p><p style="text-align: justify;">При первых проявлениях кровянистых выделений следует немедленно отправляться к врачу. Лишь после тщательного осмотра гинеколог сможет определить причины их появления. Помните, риск потерять будущего ребеночка велик.</p><p style="text-align: justify;">Итак, вы заметили на первых неделях беременности непонятные коричневые выделения. Подобный знак может говорить о небольшом отслоении от матки плодного яйца. Это также может являться признаком замершей/внематочной беременности. Еще одной причиной появления ржавых мазков является угроза выкидыша. </p><p style="text-align: justify;">Насторожить беременную даму должны и появления болей внизу живота. Обычно они сопровождаются обильными кровянистыми выделениями. Подобное часто происходит на 6…7 неделе беременности. Явной причиной возникновения подобных симптомов является шанс потерять малыша. </p>Если существует хоть малейшая угроза прерывания беременности - женщину немедленно госпитализируют. Одновременно с этим назначается целый курс лечения. Он направлен на снижение тонуса матки. Также прописывается строгий постельный режим.', '2016-04-03 00:00:00'),
(18, 'csacsacsacsa', 's', 'sxsa', 'xsax', 'top-10-chudessnyh-ozr-mira-taticaca.jpg', 'При разработке любого более-менее крупного проекта на Yii у программиста может возникнуть необходимость внедрения поиска. И если для интернет-магазина будет достаточно искать только по каталогу, то для информационного сайта нужно обеспечить сквозной поиск по нескольким сущностям сразу. В конце этого урока мы рассмотрим готовые решения по поиску, а в начале для образовательных целей напишем свой велосипед.', '2016-04-30 00:00:00'),
(20, 'cdscdsc', 'cdscdsc', 'cdscd', 'csdc', '6.jpg', 'При разработке любого более-менее крупного проекта на Yii у программиста может возникнуть необходимость внедрения поиска. И если для интернет-магазина будет достаточно искать только по каталогу, то для информационного сайта нужно обеспечить сквозной поиск по нескольким сущностям сразу. В конце этого урока мы рассмотрим готовые решения по поиску, а в начале для образовательных целей напишем свой велосипед.', '2016-04-30 00:00:00'),
(21, '5555555cdscdscdsc', '5555555555dscdscsc', '5555555555', '455353534534', '1213.jpg', '<p><strong>45435435345 gfgfdgdf</strong>fdvvf fvfdvf&nbsp;</p>\n<ul>При разработке любого более-менее крупного проекта на Yii у программиста может возникнуть необходимость внедрения поиска. И если для интернет-магазина будет достаточно искать только по каталогу, то для информационного сайта нужно обеспечить сквозной поиск по нескольким сущностям сразу. В конце этого урока мы рассмотрим готовые решения по поиску, а в начале для образовательных целей напишем свой велосипед.\n<li>empt what is needed. The c</li>\n<li>anonical solution is to use<code>chmod</code>. If you are logged into an ac<span style="background-color: #ff0000;">count that has sufficient permissi</span>on to change owner, then you are an administrato\n<blockquote><em>r, and can unlink any file. If permissions interfere with the unlink, then<span style="color: #ff9900;"> change the read/write/execute <strong>mode</strong> </span>of the file so that anyone can delete it: <code>chmod($Path, 0666);</code>. Note the leading<code>0</code>, since this i</em></blockquote>\ns an octal value. Of course, you must be logged in as administrator to make such a chang</li>\n</ul>\n<h1><code>chown</code> to an invalid user is a strange way to attempt what is needed.</h1>\n<h5>The canonical solution is to use<code>chmod</code>. If you are logged into an account that has sufficient permission to change owner, then you are an administrator, and can unlink any file. If permissions interfere with the unlink, then change the read/write/execute <strong>mode</strong> of the file so that anyone can delete it: <code>chmod($Path, 0666);</code>. Note the leading<code>0</code>, since this is an octal value. Of course, you must be logged in as administrator to make such a chang</h5>', '2016-04-29 00:00:00'),
(22, 'papi-i-beremennost', 'saxsax', 'sxax', 'saxax', '10.jpg', '<p>xssax<span id="transmark"></span></p>При разработке любого более-менее крупного проекта на Yii у программиста может возникнуть необходимость внедрения поиска. И если для интернет-магазина будет достаточно искать только по каталогу, то для информационного сайта нужно обеспечить сквозной поиск по нескольким сущностям сразу. В конце этого урока мы рассмотрим готовые решения по поиску, а в начале для образовательных целей напишем свой велосипед.', '2016-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1460291926),
('m130524_201442_init', 1460291939),
('m160410_135839_create_blog_posts_table', 1460298685),
('m160410_140024_create_blog_categoris_table', 1460298686),
('m160410_140058_create_blog_categoris_posts_table', 1460298686);

-- --------------------------------------------------------

--
-- Структура таблицы `ulogin_user`
--

CREATE TABLE IF NOT EXISTS `ulogin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned DEFAULT NULL COMMENT 'id пользователя из таблици user,если есть такой же емейл',
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL COMMENT 'страница профеля в соц сетях',
  `uid` int(10) unsigned NOT NULL,
  `signup_soc` enum('0','1') NOT NULL DEFAULT '0',
  `login_soc` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `ulogin_user`
--

INSERT INTO `ulogin_user` (`id`, `id_user`, `email`, `photo`, `first_name`, `last_name`, `network`, `identity`, `uid`, `signup_soc`, `login_soc`) VALUES
(15, 12, 'site4coder@gmail.com', 'http://graph.facebook.com/227972437573612/picture?type=large', 'Сергей', 'Фио', 'facebook', 'https://www.facebook.com/app_scoped_user_id/227972437573612/', 4294967295, '1', '1'),
(16, 12, 'site4coder@gmail.com', 'https://lh4.googleusercontent.com/-LGEpX9K6-GM/AAAAAAAAAAI/AAAAAAAAABY/JDrvw1VQev4/photo.jpg', 'Вася', 'Ветров', 'google', 'https://plus.google.com/u/0/104133576621447100773/', 4294967295, '0', '0'),
(17, 1, 'for-web@bigmir.net', 'http://pbs.twimg.com/profile_images/627883807178240002/ExXxyumT_normal.jpg', 'Мастер', 'Ремонт', 'twitter', 'http://twitter.com/masterremont1', 3373816222, '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `signup_tupe` enum('site','soc') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'site',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `signup_tupe`) VALUES
(1, 'admin', 'admin', 'cVBFrJjCqESGo_seyDTWoSpNTlwG7Mqt', '$2y$13$FMEh50/NPY9P1AHJZ84w3uaRzZPZmh8p9HlBKsJqm6DQToaUYtCCC', NULL, 'for-web@bigmir.net', 10, 1460314864, 1460314864, 'site'),
(12, 'user', 'Сергей Фио', 'bXFerEjlvDSzWAheZ7PPd8BtmfojSdWM', '$2y$13$DJxOpDk7IPlSH/VloGfEc.f6JkSbXXvCfEYg5xZGHHzgwlCx2YVwq', NULL, 'site4coder@gmail.com', 10, 1461405126, 1461405126, 'soc');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blog_categoris_posts_table`
--
ALTER TABLE `blog_categoris_posts_table`
  ADD CONSTRAINT `blog_categoris_posts_table_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `blog_categoris_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_categoris_posts_table_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `blog_posts_table` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blog_posts_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ulogin_user`
--
ALTER TABLE `ulogin_user`
  ADD CONSTRAINT `ulogin_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
