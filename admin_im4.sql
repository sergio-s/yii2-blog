-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 21 2016 г., 08:50
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_im4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_blogs`
--

CREATE TABLE IF NOT EXISTS `yii2_start_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `snippet` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `preview_url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `status_id` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `views` (`views`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `yii2_start_blogs`
--

INSERT INTO `yii2_start_blogs` (`id`, `title`, `alias`, `snippet`, `content`, `image_url`, `preview_url`, `views`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 'Кофе при беременности', 'kofe-pri-beremennosti', '<p>Многих людей, среди которых и беременные женщины, привлекает аромат и вкус кофе. Но что можно сказать о пользе данного напитка? Почему необходимо снижать количество употребляемого кофе в период вынашивания ребенка? Ответ на данный вопрос будет представлен далее.</p><p>Начнем с того, что из-за употребления кофе возбуждается вся нервная система будущей мамы, а значит происходят сбои в работе различных органов. В частности, почки начинают работать в 5 раз быстрее, увеличивается объем выделяемых желез, повышается показатель сердцебиения и учащается дыхание. Плюс ко всему из организма беременной женщины выводятся полезные микроэлементы, в частности: магний, фосфор, калий, натрий и железо, а также кальций. Однако это не самое опасное, ведь кофе негативно сказывается на репродуктивных функциях. По словам ученных, три чашки кофе в день - это как противозачаточное средство, а значит, беременная женщина рискует «заработать» выкидыш, если будет много пить кофе. Также кофе подавляет аппетит беременной женщины, а из-за этого плод не получает достаточного количества питательного объема витаминов.<br></p>', '<p>Многих людей, среди которых и беременные женщины, привлекает аромат и вкус кофе. Но что можно сказать о пользе данного напитка? Почему необходимо снижать количество употребляемого кофе в период вынашивания ребенка? Ответ на данный вопрос будет представлен далее.</p><p><strong>Влияние кофе на беременности</strong></p><p>Начнем с того, что из-за употребления кофе возбуждается вся нервная система будущей мамы, а значит происходят сбои в работе различных органов. В частности, почки начинают работать в 5 раз быстрее, увеличивается объем выделяемых желез, повышается показатель сердцебиения и учащается дыхание. Плюс ко всему из организма беременной женщины выводятся полезные микроэлементы, в частности: магний, фосфор, калий, натрий и железо, а также кальций. Однако это не самое опасное, ведь кофе негативно сказывается на репродуктивных функциях. По словам ученных, три чашки кофе в день - это как противозачаточное средство, а значит, беременная женщина рискует «заработать» выкидыш, если будет много пить кофе. Также кофе подавляет аппетит беременной женщины, а из-за этого плод не получает достаточного количества питательного объема витаминов.</p><p>Можно подвести итог, что кофе в целом оказывает негативное влияние на самочувствие как самой беременной женщины, так и плода, который развивается у нее в животе. Но в небольших количествах, натуральный кофе безопасен, чего нельзя сказать о растворимых напитках.</p><p><strong>Растворимый кофе при беременности</strong></p><p>В растворимых кофейных напитках содержится 15% кофейных зерен, а все остальное – это всевозможные химические составляющие, благодаря которым напиток становится вкусным и</p><p>ароматным. Рекомендуется отказаться от употребления растворимого кофе вообще во время беременности и вскармливания малыша.</p><p><strong>А как же кофе без кофеина</strong></p><p>И эта разновидность может быть опасна для беременных из-за проводящейся обработки кофейных зерен. Из-за этого могут появиться всевозможные аллергические реакции, а также</p><p>образоваться атеросклеротические бляшки. Все это показывает, что кофе употреблять можно, но к выбору напитка нужно отнестись максимально серьезно. Вообще же, следует подумать а зачем беременной рисковать и «угощать» себя таким не совсем однозначным напитком.</p><p><strong>Факты о кофеине при беременности</strong></p><p>● Помимо кофе, кофеин находится в коле, чае, какао и шоколаде;</p><p>● Если употребляется от 4 до 7 кружек кофе в день, то плод погибает в 33% всех случаев;</p><p>● Из-за постоянного употребления кофе, вес новорожденного малыша снижается и влияет</p><p>на его самочувствие;</p><p>● В том случае, если будущая мама совсем не может без кофе, то употреблять можно лишь 2 чашки напитка в день. Это 200 миллиграмм кофеина, а этот объем содержится в 282 граммах кофе или 700 граммах чая.</p><p>Правильная беременность – это гарантия здоровья как малыша, так и мамы, а значит залог хорошего настроения и самочувствия.<span></span></p>', '57002788a4b98.jpg', '570027838fd98.jpg', 11, 1, 1459555200, 1459555200),
(3, '​Причины появления кровянистых выделений на ранних сроках беременности', 'priciny-poavlenia-krovanistyh-vydelenij-na-rannih-srokah-beremennosti', '<p>К сожалению, оказаться в руках хорошего гинеколога удается не всем. Поэтому в обычной женской консультации многие врачи забывают предупреждать о появлениях выделений в первые месяцы беременности. При этом многие секреции совершенно не требуют длительного/короткого медикаментозного лечения. И их невозможно отнести к патологиям. Именно об этом и не говорят гинекологи. А значит, страхи беременной женщины усиливаются в разы. Как же разобраться в этом вопросе?</p>', '<p style="text-align: justify;">Причины появления кровянистых выделений на ранних сроках беременности</p><p style="text-align: justify;">К сожалению, оказаться в руках хорошего гинеколога удается не всем. Поэтому в обычной женской консультации многие врачи забывают предупреждать о появлениях выделений в первые месяцы беременности. При этом многие секреции совершенно не требуют длительного/короткого медикаментозного лечения. И их невозможно отнести к патологиям. Именно об этом и не говорят гинекологи. А значит, страхи беременной женщины усиливаются в разы. Как же разобраться в этом вопросе?</p><p style="text-align: justify;">Стандартные выделения на первых порах беременности</p><p style="text-align: justify;">Уделите немного времени на осмотр прокладки. </p><ol><li>Перед вами:</li></ol><ul><li>Небольшое количество выделений;</li><li>Белесый цвет, практически прозрачные; </li><li>Отсутствие запахов?</li></ul><p style="text-align: justify;">Это реакция организма на изменения в гормональном фоне. Перед вами результат работы гормонов, которые отвечают за сохранность беременности. В этот период происходит прикрепление зародыша и формирование плаценты, слизистой пробки. В такой период разрешается использование прокладок ежедневного типа. Но помните, на весь период беременности категорически нельзя применять тампоны!</p><ol><li>Если вы наблюдаете следующие выделения:</li></ol><ul><li>Творожистая секреция;</li><li>Ярко выражен белый цвет;</li><li>Кисловатый запах;</li><li>Неприятные ощущения в промежности (зуд, жжение), то</li></ul><p style="text-align: justify;">Скорее всего, у вас развивается молочница. В медицинской сфере данное заболевание известно как вагинальный кандидоз. В этом случае требуется немедленно обратиться за консультацией к врачу. После некоторых анализов, будет предложено лечение медикаментозного типа. Заметим, что назначается курс препаратов одновременно супруге и супругу.</p><ol><li>Существуют выделения, подходящие под следующее описание:</li></ol><ul><li>Желтый цвет слизи;</li><li>Неприятный аромат.</li></ul><p style="text-align: justify;">Подобные симптомы достаточно опасны и должны вызывать желание отправиться на прием к гинекологу. Заметим, что подобные выделения характерны на первых неделях беременности. Они являются «сигналами» том, что в организме женщины начался воспалительный процесс. Если не провести вовремя осмотр и не выявить причину болезни, может произойти самопроизвольный выкидыш. </p><ol><li>В тех случаях, когда выделения имеют зеленоватые или ярко-желтые выделения, - предлагается осмыслить о прерывании беременности. Ведь столь яркие проявления говорят об инфекции, передающейся половым путем. </li><li>Кровянистые выделения также могут возникнуть в первом триместре беременности. Многие молодые мамочки ошибочно принимают их за менструацию. Как правило, цвет выделений красный или коричневый. Количество их небольшое. Обычно эти выделения возникают в привычные дни менструального кровотечения. Если при этом нет болей, значит, страшного в подобных проявлениях не наблюдается. Однако необходимо выяснить причины их появления.</li></ol><p style="text-align: justify;">Кровянистые выделения: причины появления</p><ol><li>Одной из самых распространенных причин кровянистых выделений является «имплантация плодного яйца». Ведь в течение первой недели беременности происходит следующее: в стенку матки стремится закрепиться плодное яйцо. В результате происходит разрыхление слизистой матки, развитие новых сосудов. </li></ol><p style="text-align: justify;">Подобный процесс вызывает вагинальные выделения. Обычно они не обильны, коричневатого, красного или бурого цветов. Порою чувствительные девушки испытывают незначительные спазмы в матке. </p><p style="text-align: justify;">Если описанные проявлений происходят в течение первой недели беременности – ничего страшного не происходит. Мы настоятельно рекомендуем обратиться в любом случае к врачу. Очень важно убедиться, что плод в безопасности. Ведь риск потерять эмбрион достаточно велик.</p><ol><li>Вторая причина появления кровянистых выделений – это появление эрозии шейки матки. В принципе, опасного в этом ничего нет. Во время первых дней беременности происходит резкий приток крови к матке. Это и провоцирует возникновение кровотечения слизистой. Как правило, основополагающей причиной появления эрозии является половой акт. </li><li>Полип в цервикальном канале также является одной из причин появления кровянистых мазков. Речь идет и о децидуальных полипах. Это безвредные опухоли в теле матке или на ее шейке. В таких случаях выделения бывают крайне незначительные и без симптомные.</li><li>Существует еще одна причины, которая может вызвать кровянистые выделения. Речь идет о варикозном расширении кровеносных сосудов. При этом данный диагноз ставят не для нижних конечностей. Изменения происходят в наружных половых органах. </li></ol><p style="text-align: justify;">Опасности кровянистых выделений во время беременности</p><p style="text-align: justify;">При первых проявлениях кровянистых выделений следует немедленно отправляться к врачу. Лишь после тщательного осмотра гинеколог сможет определить причины их появления. Помните, риск потерять будущего ребеночка велик.</p><p style="text-align: justify;">Итак, вы заметили на первых неделях беременности непонятные коричневые выделения. Подобный знак может говорить о небольшом отслоении от матки плодного яйца. Это также может являться признаком замершей/внематочной беременности. Еще одной причиной появления ржавых мазков является угроза выкидыша. </p><p style="text-align: justify;">Насторожить беременную даму должны и появления болей внизу живота. Обычно они сопровождаются обильными кровянистыми выделениями. Подобное часто происходит на 6…7 неделе беременности. Явной причиной возникновения подобных симптомов является шанс потерять малыша. </p>Если существует хоть малейшая угроза прерывания беременности - женщину немедленно госпитализируют. Одновременно с этим назначается целый курс лечения. Он направлен на снижение тонуса матки. Также прописывается строгий постельный режим.', '57002d8fba702.jpg', '57002d89b6ab3.jpg', 7, 1, 1459641600, 1459641600);

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_comments`
--

CREATE TABLE IF NOT EXISTS `yii2_start_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model_class` int(11) unsigned NOT NULL,
  `model_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status_id` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `FK_comment_parent` (`parent_id`),
  KEY `FK_comment_author` (`author_id`),
  KEY `FK_comment_model_class` (`model_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_comments_models`
--

CREATE TABLE IF NOT EXISTS `yii2_start_comments_models` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `status_id` (`status_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_migration`
--

CREATE TABLE IF NOT EXISTS `yii2_start_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii2_start_migration`
--

INSERT INTO `yii2_start_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1459023424),
('m140418_204054_create_module_tbl', 1459023429),
('m140526_193056_create_module_tbl', 1459023439),
('m140911_074715_create_module_tbl', 1459023446);

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_profiles`
--

CREATE TABLE IF NOT EXISTS `yii2_start_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar_url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `yii2_start_profiles`
--

INSERT INTO `yii2_start_profiles` (`user_id`, `name`, `surname`, `avatar_url`) VALUES
(1, 'Administration', 'Site', ''),
(2, 'test', 'test', ''),
(3, 'Williamhemo', 'Williamhemo', '');

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_users`
--

CREATE TABLE IF NOT EXISTS `yii2_start_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(53) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `status_id` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`role`),
  KEY `status_id` (`status_id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `yii2_start_users`
--

INSERT INTO `yii2_start_users` (`id`, `username`, `email`, `password_hash`, `auth_key`, `token`, `role`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@demo.com', '$2y$13$DK9oA1Be2UJ6O4nJFa6HvuxAyB0zMZykR..iNsUqM4EoN7TbIcWZO', '6SwV0X6C3Kw4htjGoffUaF8AkpYi30Xz', 'N7OJwvtu4sfdgJR_82sYxH_RsdkzABND_1459023429', 'superadmin', 1, 1459023427, 1459023427),
(2, 'test', 'dmvsergeev@gmail.com', '$2y$13$Mz7nx8anA7Q8cfYh9GVyP.PBJfj4gbWuiX/tTNyiOW0/jo6ocG21O', '5wimgV6G15rgYvZjlJuCFaKqRbtCvME8', 'rGQH2z2BF5Ngi1xMBcE5DqFQSOuE3mD9_1460131237', 'user', 1, 1460131193, 1460131237),
(3, 'Williamhemo', 'cherednichenko@lds.net.ua', '$2y$13$OMiAziTq6a79PWHKc9FBDeGmwkOCInf3sAfl5fO5nfvR/LqepKpRm', 'Pp6v3kwk1yxafu_CgoU32Jsf1vYO4kHx', '1EwxzXvtaWBnCDTgEYlubAxUIBUKguJp_1460243051', 'user', 1, 1460238681, 1460243051);

-- --------------------------------------------------------

--
-- Структура таблицы `yii2_start_user_email`
--

CREATE TABLE IF NOT EXISTS `yii2_start_user_email` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(53) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `yii2_start_comments`
--
ALTER TABLE `yii2_start_comments`
  ADD CONSTRAINT `FK_comment_model_class` FOREIGN KEY (`model_class`) REFERENCES `yii2_start_comments_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_author` FOREIGN KEY (`author_id`) REFERENCES `yii2_start_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_parent` FOREIGN KEY (`parent_id`) REFERENCES `yii2_start_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `yii2_start_profiles`
--
ALTER TABLE `yii2_start_profiles`
  ADD CONSTRAINT `FK_profile_user` FOREIGN KEY (`user_id`) REFERENCES `yii2_start_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `yii2_start_user_email`
--
ALTER TABLE `yii2_start_user_email`
  ADD CONSTRAINT `FK_user_email_user` FOREIGN KEY (`user_id`) REFERENCES `yii2_start_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
