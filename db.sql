SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `application` (
  `application_id` int NOT NULL,
  `price` int DEFAULT NULL,
  `from` int NOT NULL,
  `to` int NOT NULL,
  `transport_id` int DEFAULT NULL,
  `transport_upload_id` int NOT NULL,
  `upload_type_id` int NOT NULL,
  `application_type_id` int NOT NULL,
  `is_any_direction` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `is_hide` tinyint(1) NOT NULL DEFAULT '0',
  `is_finally` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
);

CREATE TABLE `application_info` (
  `application_info_id` int NOT NULL,
  `volume` int NOT NULL,
  `weight` int NOT NULL,
  `length` int NOT NULL,
  `width` int NOT NULL,
  `height` int NOT NULL,
  `description` text,
  `type` varchar(255) DEFAULT NULL,
  `application_id` int NOT NULL
);


CREATE TABLE `application_type` (
  `application_type` int NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `application_type` (`application_type`, `name`) VALUES
(1, 'Груз'),
(2, 'Транспорт');

CREATE TABLE `authorization` (
  `authorization_id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `user_id` int NOT NULL
);

CREATE TABLE `authorization_session` (
  `authorization_session_id` int NOT NULL,
  `ip` varchar(255) NOT NULL,
  `agent` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
);


CREATE TABLE `certificate` (
  `certificate_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `user_id` int NOT NULL
);

CREATE TABLE `city` (
  `city_id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `country_id` int NOT NULL
);

INSERT INTO `city` (`city_id`, `name`, `country_id`) VALUES
(1, 'Абакан', 1),
(2, 'Александров', 1),
(3, 'Алупка', 1),
(4, 'Алушта', 1),
(5, 'Анадырь', 1),
(6, 'Анапа', 1),
(7, 'Ангарск', 1),
(8, 'Армавир', 1),
(9, 'Архангельск', 1),
(10, 'Астрахань', 1),
(11, 'Балаклава', 1),
(12, 'Балаково', 1),
(13, 'Балашиха', 1),
(14, 'Балтийск', 1),
(15, 'Барнаул', 1),
(16, 'Бахчисарай', 1),
(17, 'Белгород', 1),
(18, 'Белокуриха', 1),
(19, 'Благовещенск', 1),
(20, 'Братск', 1),
(21, 'Брянск', 1),
(22, 'Валдай', 1),
(23, 'Великие', 1),
(24, 'Луки', 1),
(25, 'Великий', 1),
(26, 'Новгород', 1),
(27, 'Великий', 1),
(28, 'Устюг', 1),
(29, 'Верхотурье', 1),
(30, 'Владивосток', 1),
(31, 'Владикавказ', 1),
(32, 'Владимир', 1),
(33, 'Волгоград', 1),
(34, 'Волгодонск', 1),
(35, 'Вологда', 1),
(36, 'Воркута', 1),
(37, 'Воронеж', 1),
(38, 'Выборг', 1),
(39, 'Гатчина', 1),
(40, 'Геленджик', 1),
(41, 'Гороховец', 1),
(42, 'Грозный', 1),
(43, 'Гусь-Хрустальный', 1),
(44, 'Далматово', 1),
(45, 'Дербент', 1),
(46, 'Дзержинск', 1),
(47, 'Дмитров', 1),
(48, 'Долгопрудный', 1),
(49, 'Евпатория', 1),
(50, 'Ейск', 1),
(51, 'Екатеринбург', 1),
(52, 'Елабуга', 1),
(53, 'Ессентуки', 1),
(54, 'Железноводск', 1),
(55, 'Задонск', 1),
(56, 'Зеленоградск', 1),
(57, 'Иваново', 1),
(58, 'Игарка', 1),
(59, 'Ижевск', 1),
(60, 'Иркутск', 1),
(61, 'Истра', 1),
(62, 'Йошкар-Ола', 1),
(63, 'Казань', 1),
(64, 'Калининград', 1),
(65, 'Калуга', 1),
(66, 'Калязин', 1),
(67, 'Кемерово', 1),
(68, 'Керчь', 1),
(69, 'Кидекша', 1),
(70, 'Киржач', 1),
(71, 'Киров', 1),
(72, 'Кисловодск', 1),
(73, 'Ковров', 1),
(74, 'Козельск', 1),
(75, 'Коломна', 1),
(76, 'Комсомольск-на-Амуре', 1),
(77, 'Кострома', 1),
(78, 'Краснодар', 1),
(79, 'Красноярск', 1),
(80, 'Кронштадт', 1),
(81, 'Курган', 1),
(82, 'Курск', 1),
(83, 'Липецк', 1),
(84, 'Магадан', 1),
(85, 'Магнитогорск', 1),
(86, 'Майкоп', 1),
(87, 'Махачкала', 1),
(88, 'Миасс', 1),
(89, 'Минеральные', 1),
(90, 'Воды', 1),
(91, 'Москва', 1),
(92, 'Мурманск', 1),
(93, 'Муром', 1),
(94, 'Мытищи', 1),
(95, 'Мышкин', 1),
(96, 'Набережные', 1),
(97, 'Челны', 1),
(98, 'Нальчик', 1),
(99, 'Находка', 1),
(100, 'Невьянск', 1),
(101, 'Неман', 1),
(102, 'Нерехта', 1),
(103, 'Нижневартовск', 1),
(104, 'Нижний', 1),
(105, 'Новгород', 1),
(106, 'Нижний', 1),
(107, 'Тагил', 1),
(108, 'Новокузнецк', 1),
(109, 'Новороссийск', 1),
(110, 'Новосибирск', 1),
(111, 'Новочеркасск', 1),
(112, 'Норильск', 1),
(113, 'Омск', 1),
(114, 'Орджоникидзе', 1),
(115, 'Орёл', 1),
(116, 'Оренбург', 1),
(117, 'Осташков', 1),
(118, 'Палех', 1),
(119, 'Пенза', 1),
(120, 'Переславль-Залесский', 1),
(121, 'Пермь', 1),
(122, 'Петергоф', 1),
(123, 'Петрозаводск', 1),
(124, 'Петропавловск-Камчатский', 1),
(125, 'Печоры', 1),
(126, 'Питкяранта', 1),
(127, 'Плес', 1),
(128, 'Подольск', 1),
(129, 'Полесск', 1),
(130, 'Приозерск', 1),
(131, 'Псков', 1),
(132, 'Пушкин', 1),
(133, 'Пятигорск', 1),
(134, 'Рославль', 1),
(135, 'Ростов', 1),
(136, 'Великий', 1),
(137, 'Ростов-на-Дону', 1),
(138, 'Рыбинск', 1),
(139, 'Рязань', 1),
(140, 'Салехард', 1),
(141, 'Самара', 1),
(142, 'Санкт-Петербург', 1),
(143, 'Саранск', 1),
(144, 'Саратов', 1),
(145, 'Светлогорск', 1),
(146, 'Севастополь', 1),
(147, 'Северодвинск', 1),
(148, 'Североморск', 1),
(149, 'Сергиев', 1),
(150, 'Посад', 1),
(151, 'Симферополь', 1),
(152, 'Смоленск', 1),
(153, 'Советск', 1),
(154, 'Сортавала', 1),
(155, 'Сочи', 1),
(156, 'Ставрополь', 1),
(157, 'Старая', 1),
(158, 'Русса', 1),
(159, 'Стерлитамак', 1),
(160, 'Судак', 1),
(161, 'Суздаль', 1),
(162, 'Сургут', 1),
(163, 'Сызрань', 1),
(164, 'Сыктывкар', 1),
(165, 'Таганрог', 1),
(166, 'Тамбов', 1),
(167, 'Тверь', 1),
(168, 'Темрюк', 1),
(169, 'Тобольск', 1),
(170, 'Тольятти', 1),
(171, 'Томск', 1),
(172, 'Торжок', 1),
(173, 'Туапсе', 1),
(174, 'Тула', 1),
(175, 'Тюмень', 1),
(176, 'Углич', 1),
(177, 'Улан-Удэ', 1),
(178, 'Ульяновск', 1),
(179, 'Уссурийск', 1),
(180, 'Уфа', 1),
(181, 'Ухта', 1),
(182, 'Феодосия', 1),
(183, 'Форос', 1),
(184, 'Хабаровск', 1),
(185, 'Ханты-Мансийск', 1),
(186, 'Хасавюрт', 1),
(187, 'Чебоксары', 1),
(188, 'Челябинск', 1),
(189, 'Череповец', 1),
(190, 'Черняховск', 1),
(191, 'Чита', 1),
(192, 'Шлиссельбург', 1),
(193, 'Щёлкино', 1),
(194, 'Элиста', 1),
(195, 'Энгельс', 1),
(196, 'Южно-Сахалинск', 1),
(197, 'Юрьев-Польский', 1),
(198, 'Якутск', 1),
(199, 'Ялта', 1),
(200, 'Ярославль', 1),
(201, 'Актау', 2),
(202, 'Актобе', 2),
(203, 'Алматы', 2),
(204, 'Астана', 2),
(205, 'Караганда', 2),
(206, 'Костанай', 2),
(207, 'Павлодар', 2),
(208, 'Семей', 2),
(209, 'Тараз', 2),
(210, 'Туркестан', 2),
(211, 'Усть-Каменогорск', 2),
(212, 'Шымкент', 2),
(213, 'Бобруйск', 3),
(214, 'Борисов', 3),
(215, 'Брест', 3),
(216, 'Витебск', 3),
(217, 'Гомель', 3),
(218, 'Гродно', 3),
(219, 'Каменец', 3),
(220, 'Минск', 3),
(221, 'Могилев', 3),
(222, 'Несвиж', 3),
(223, 'Полоцк', 3),
(224, 'Гагра', 4),
(225, 'Гудаута', 4),
(226, 'Новый', 4),
(227, 'Афон', 4),
(228, 'Пицунда', 4),
(229, 'Сухум', 4),
(230, 'Белгород-Днестровский', 5),
(231, 'Винница', 5),
(232, 'Днепропетровск', 5),
(233, 'Донецк', 5),
(234, 'Дубно', 5),
(235, 'Запорожье', 5),
(236, 'Золочев', 5),
(237, 'Киев', 5),
(238, 'Кировоград', 5),
(239, 'Кривой', 5),
(240, 'Рог', 5),
(241, 'Кролевец', 5),
(242, 'Луганск', 5),
(243, 'Луцк', 5),
(244, 'Львов', 5),
(245, 'Макеевка', 5),
(246, 'Мариуполь', 5),
(247, 'Николаев', 5),
(248, 'Одесса', 5),
(249, 'Полтава', 5),
(250, 'Ровно', 5),
(251, 'Сумы', 5),
(252, 'Тернополь', 5),
(253, 'Трускавец', 5),
(254, 'Ужгород', 5),
(255, 'Харьков', 5),
(256, 'Херсон', 5),
(257, 'Хотин', 5),
(258, 'Черкассы', 5),
(259, 'Чернигов', 5);

CREATE TABLE `country` (
  `country_id` int NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `country` (`country_id`, `name`) VALUES
(1, 'Россия'),
(2, 'Казахстан'),
(3, 'Белорусия'),
(4, 'Абхазия'),
(5, 'Украина');

CREATE TABLE `message` (
  `message_id` int NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_from` int NOT NULL,
  `user_to` int NOT NULL,
  `is_hide` tinyint(1) DEFAULT '0'
);


CREATE TABLE `transport_upload` (
  `transport_upload_id` int NOT NULL,
  `name` varchar(255) NOT NULL
);


INSERT INTO `transport_upload` (`transport_upload_id`, `name`) VALUES
(1, 'Тент'),
(2, 'Цельномет'),
(3, 'Бус'),
(4, 'Контейнер'),
(5, 'Одеждовоз'),
(6, 'Изотерм'),
(7, 'Реф.'),
(8, 'Автовоз'),
(9, 'Автовышка'),
(10, 'Бетоновоз'),
(11, 'Зерновоз'),
(12, 'Лесовоз'),
(13, 'Коневоз'),
(14, 'Кран'),
(15, 'Мусоровоз'),
(16, 'Погрузчик'),
(17, 'Птицевоз'),
(18, 'Скотовоз'),
(19, 'Стекловоз'),
(20, 'Трубовоз'),
(21, 'Тягач'),
(22, 'Щеповоз'),
(23, 'Эвакуатор'),
(24, 'Яхтовоз'),
(25, 'Платформа'),
(26, 'Манипулятор'),
(27, 'Контейнеровоз'),
(28, 'Плитовоз'),
(29, 'Самосвал'),
(30, 'Микроавтобус'),
(31, 'Автобус'),
(32, 'Молоковоз'),
(33, 'Битумовоз'),
(34, 'Бензовоз'),
(35, 'Газовоз'),
(36, 'Кормовоз'),
(37, 'Муковоз'),
(38, 'Автоцистерна'),
(39, 'Цементовоз'),
(40, 'Реф. - тушевоз'),
(41, 'Бортовая / Открытая'),
(42, 'Ломовоз / Меналловоз'),
(43, 'Трал / Негабарит'),
(44, 'Реф. - тушевоз'),
(45, 'Бортовая / Открытая'),
(46, 'Ломовоз / Меналловоз'),
(47, 'Трал / Негабарит');

CREATE TABLE `upload_type` (
  `upload_type_id` int NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `upload_type` (`upload_type_id`, `name`) VALUES
(1, 'Верхняя загрузка'),
(2, 'Боковая загрузка'),
(3, 'Задняя загрузка');

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `additional_telephone` varchar(255) DEFAULT NULL,
  `about` text,
  `avatar` varchar(255) DEFAULT NULL,
  `activity_id` int DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `last_online` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `user_access_id` int NOT NULL DEFAULT '1'
);

CREATE TABLE `user_access` (
  `user_access_id` int NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `user_access` (`user_access_id`, `name`) VALUES
(1, 'user'),
(2, 'support'),
(3, 'moderator'),
(4, 'admin');


CREATE TABLE `user_activity` (
  `user_activity_id` int NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `user_activity` (`user_activity_id`, `name`) VALUES
(1, 'Частное лицо');

CREATE TABLE `user_messenger` (
  `user_messenger_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `user_id` int NOT NULL
);

ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `application_type_id` (`application_type_id`),
  ADD KEY `transport_upload_id` (`transport_upload_id`),
  ADD KEY `from` (`from`),
  ADD KEY `to` (`to`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `upload_type` (`upload_type_id`);

ALTER TABLE `application_info`
  ADD PRIMARY KEY (`application_info_id`),
  ADD KEY `application_id` (`application_id`);

ALTER TABLE `application_type`
  ADD PRIMARY KEY (`application_type`);

ALTER TABLE `authorization`
  ADD PRIMARY KEY (`authorization_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `authorization_session`
  ADD PRIMARY KEY (`authorization_session_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_from` (`user_from`),
  ADD KEY `user_to` (`user_to`);

ALTER TABLE `transport_upload`
  ADD PRIMARY KEY (`transport_upload_id`);

ALTER TABLE `upload_type`
  ADD PRIMARY KEY (`upload_type_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `activity_id` (`activity_id`),
  ADD KEY `user_access_id` (`user_access_id`);

ALTER TABLE `user_access`
  ADD PRIMARY KEY (`user_access_id`);

ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`user_activity_id`);

ALTER TABLE `user_messenger`
  ADD PRIMARY KEY (`user_messenger_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `application`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `application_info`
--
ALTER TABLE `application_info`
  MODIFY `application_info_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `application_type`
--
ALTER TABLE `application_type`
  MODIFY `application_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `authorization`
--
ALTER TABLE `authorization`
  MODIFY `authorization_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `authorization_session`
--
ALTER TABLE `authorization_session`
  MODIFY `authorization_session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `transport_upload`
--
ALTER TABLE `transport_upload`
  MODIFY `transport_upload_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `upload_type`
--
ALTER TABLE `upload_type`
  MODIFY `upload_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT для таблицы `user_access`
--
ALTER TABLE `user_access`
  MODIFY `user_access_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `user_activity`
  MODIFY `user_activity_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `user_messenger`
  MODIFY `user_messenger_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`application_type_id`) REFERENCES `application_type` (`application_type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`transport_upload_id`) REFERENCES `transport_upload` (`transport_upload_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`from`) REFERENCES `city` (`city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_5` FOREIGN KEY (`to`) REFERENCES `city` (`city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_7` FOREIGN KEY (`upload_type_id`) REFERENCES `upload_type` (`upload_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `application_info`
  ADD CONSTRAINT `application_info_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `authorization`
  ADD CONSTRAINT `authorization_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `authorization_session`
  ADD CONSTRAINT `authorization_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_access_id`) REFERENCES `user_access` (`user_access_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user_messenger`
  ADD CONSTRAINT `user_messenger_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;