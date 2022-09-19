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
(89, 'Минеральные Воды', 1),
(91, 'Москва', 1),
(92, 'Мурманск', 1),
(93, 'Муром', 1),
(94, 'Мытищи', 1),
(95, 'Мышкин', 1),
(96, 'Набережные Челны', 1),
(98, 'Нальчик', 1),
(99, 'Находка', 1),
(100, 'Невьянск', 1),
(101, 'Неман', 1),
(102, 'Нерехта', 1),
(103, 'Нижневартовск', 1),
(104, 'Нижний Новгород', 1),
(106, 'Нижний Тагил', 1),
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
(135, 'Ростов Великий', 1),
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
(157, 'Старая Русса', 1),
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
(226, 'Новый Афон', 4),
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
(239, 'Кривой Рог', 5),
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

CREATE TABLE `city_coordinate` (
  `city_coordinate_id` int NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `city_id` int NOT NULL
);

INSERT INTO `city_coordinate` (`city_coordinate_id`, `latitude`, `longitude`, `city_id`) VALUES
(1, 53.7212, 91.4424, 1),
(2, 56.3978, 38.7276, 2),
(3, 44.421, 34.0473, 3),
(4, 44.6764, 34.4101, 4),
(5, 64.7333, 177.517, 5),
(6, 44.8857, 37.3199, 6),
(7, 52.55, 103.9, 7),
(8, 44.9984, 41.1247, 8),
(9, 64.5472, 40.5602, 9),
(10, 46.3491, 48.055, 10),
(11, 44.5049, 33.5982, 11),
(12, 52.0246, 47.7807, 12),
(13, 55.8167, 37.9667, 13),
(14, 55.8167, 37.9667, 14),
(15, 53.3548, 83.7698, 15),
(16, 44.7461, 33.8616, 16),
(17, 50.5954, 36.5873, 17),
(18, 51.9948, 84.9936, 18),
(19, 50.2728, 127.54, 19),
(20, 56.2233, 101.676, 20),
(21, 53.2635, 34.4161, 21),
(22, 57.9791, 33.2461, 22),
(23, 56.32, 30.52, 23),
(24, 56.3396, 30.5315, 24),
(25, 58.5213, 31.271, 25),
(26, 58.5266, 31.2738, 26),
(27, 60.7642, 46.2972, 28),
(28, 58.871, 60.754, 29),
(29, 43.1333, 131.9, 30),
(30, 43.023, 44.67, 31),
(31, 56.1376, 40.4134, 32),
(32, 48.6953, 44.4806, 33),
(33, 47.506, 42.1794, 34),
(34, 59.2181, 39.8978, 35),
(35, 67.494, 64.04, 36),
(36, 51.667, 39.2056, 37),
(37, 60.714, 28.7572, 38),
(38, 59.5625, 30.1065, 39),
(39, 44.5667, 38.0833, 40),
(40, 56.2022, 42.6926, 41),
(41, 43.3137, 45.6812, 42),
(42, 55.615, 40.6707, 43),
(43, 56.26, 62.94, 44),
(44, 42.059, 48.29, 45),
(45, 56.2333, 43.45, 46),
(46, 56.3428, 37.5288, 47),
(47, 55.9387, 37.5127, 48),
(48, 45.1904, 33.3669, 49),
(49, 46.7, 38.2833, 50),
(50, 56.8389, 60.6057, 51),
(51, 55.7667, 52.0833, 52),
(52, 44.0445, 42.8589, 53),
(53, 44.1394, 43.0169, 54),
(54, 52.3902, 38.9315, 55),
(55, 54.95, 20.483, 56),
(56, 57.0061, 40.9821, 57),
(57, 67.472, 86.5588, 58),
(58, 56.8333, 53.1833, 59),
(59, 52.2869, 104.305, 60),
(60, 55.9166, 36.8666, 61),
(61, 56.6333, 47.8666, 62),
(62, 55.7887, 49.1221, 63),
(63, 54.7104, 20.4522, 64),
(64, 54.5518, 36.285, 65),
(65, 57.2365, 37.8401, 66),
(66, 55.34, 86.09, 67),
(67, 45.3573, 36.4682, 68),
(68, 56.4241, 40.5223, 69),
(69, 55.9, 39.0667, 70),
(70, 58.6033, 49.6574, 71),
(71, 43.9166, 42.7166, 72),
(72, 56.3666, 41.3333, 73),
(73, 54.0368, 35.7869, 74),
(74, 55.0937, 38.7688, 75),
(75, 50.5498, 137.008, 76),
(76, 57.7774, 40.9698, 77),
(77, 45.0448, 38.976, 78),
(78, 56.0152, 92.8932, 79),
(79, 59.9959, 29.7655, 80),
(80, 55.4666, 65.35, 81),
(81, 51.7091, 36.1562, 82),
(82, 52.6121, 39.5981, 83),
(83, 59.5611, 150.83, 84),
(84, 53.4129, 59.0016, 85),
(85, 44.5984, 40.108, 86),
(86, 42.817, 47.6523, 87),
(87, 55.05, 60.1, 88),
(88, 44.2103, 43.1353, 89),
(89, 55.7522, 37.6156, 91),
(90, 68.9612, 33.0892, 92),
(91, 55.5666, 42.0333, 93),
(92, 55.9198, 37.7654, 94),
(93, 57.7868, 38.4503, 95),
(94, 55.7254, 52.4112, 96),
(95, 43.4833, 43.6166, 98),
(96, 42.8222, 132.883, 99),
(97, 57.4902, 60.212, 100),
(98, 55.0333, 22.0333, 101),
(99, 57.4572, 40.5773, 102),
(100, 60.9431, 76.5433, 103),
(101, 56.2965, 43.936, 104),
(102, 57.9232, 60.007, 106),
(103, 53.7595, 87.1215, 108),
(104, 44.7166, 37.75, 109),
(105, 55.0083, 82.9357, 110),
(106, 47.4166, 40.0833, 111),
(107, 69.3333, 88.2166, 112),
(108, 54.9833, 73.3666, 113),
(109, 44.9637, 35.3579, 114),
(110, 52.9751, 36.0642, 115),
(111, 51.7666, 55.1004, 116),
(112, 57.1402, 33.1285, 117),
(113, 56.8, 41.8583, 118),
(114, 53.2, 45.0166, 119),
(115, 56.747, 38.8902, 120),
(116, 58.0168, 56.2452, 121),
(117, 59.8742, 29.8938, 122),
(118, 61.7833, 34.3333, 123),
(119, 53.0166, 158.65, 124),
(120, 57.8156, 27.6293, 125),
(121, 61.5715, 31.4869, 126),
(122, 57.4579, 41.5119, 127),
(123, 55.4312, 37.5457, 128),
(124, 54.8666, 21.1, 129),
(125, 61.039, 30.1341, 130),
(126, 57.8, 28.348, 131),
(127, 59.7175, 30.406, 132),
(128, 44.05, 43.05, 133),
(129, 53.9531, 32.8638, 134),
(130, 57.1956, 39.4131, 135),
(131, 47.2358, 39.7176, 137),
(132, 58.0574, 38.8116, 138),
(133, 54.6095, 39.7125, 139),
(134, 66.558, 66.605, 140),
(135, 53.2027, 50.1408, 141),
(136, 59.9386, 30.3141, 142),
(137, 54.1954, 45.1886, 143),
(138, 51.5333, 46.0166, 144),
(139, 54.9394, 20.1584, 145),
(140, 44.596, 33.529, 146),
(141, 64.5688, 39.8364, 147),
(142, 69.0655, 33.4092, 148),
(143, 56.3242, 38.1452, 149),
(144, 56.3, 38.1333, 150),
(145, 44.9521, 34.1024, 151),
(146, 54.7903, 32.05, 152),
(147, 55.0833, 21.8833, 153),
(148, 61.7, 30.666, 154),
(149, 43.5852, 39.7202, 155),
(150, 45.05, 41.9833, 156),
(151, 57.9948, 31.3544, 157),
(152, 53.633, 55.9501, 159),
(153, 44.8384, 34.9837, 160),
(154, 56.4166, 40.45, 161),
(155, 61.25, 73.4167, 162),
(156, 53.1504, 48.3978, 163),
(157, 61.6666, 50.8166, 164),
(158, 47.2166, 38.9166, 165),
(159, 52.7166, 41.4333, 166),
(160, 56.8587, 35.9175, 167),
(161, 45.2757, 37.3743, 168),
(162, 58.1952, 68.258, 169),
(163, 53.5086, 49.4198, 170),
(164, 56.501, 84.9924, 171),
(165, 57.0359, 34.969, 172),
(166, 44.1018, 39.078, 173),
(167, 54.2048, 37.6184, 174),
(168, 57.174, 65.571, 175),
(169, 57.526, 38.326, 176),
(170, 51.8238, 107.607, 177),
(171, 54.3166, 48.3666, 178),
(172, 43.8, 131.967, 179),
(173, 54.7428, 55.9567, 180),
(174, 63.5666, 53.7, 181),
(175, 45.0319, 35.3824, 182),
(176, 44.3907, 33.7868, 183),
(177, 48.5027, 135.066, 184),
(178, 61.009, 69.0374, 185),
(179, 43.25, 46.5833, 186),
(180, 56.15, 47.2333, 187),
(181, 55.1644, 61.4368, 188),
(182, 59.1323, 37.9091, 189),
(183, 54.6312, 21.8311, 190),
(184, 52.05, 113.467, 191),
(185, 59.9418, 31.0343, 192),
(186, 45.428, 35.822, 193),
(187, 46.3154, 44.2794, 194),
(188, 51.5013, 46.1233, 195),
(189, 46.9666, 142.733, 196),
(190, 56.5, 39.6667, 197),
(191, 62.032, 129.706, 198),
(192, 44.4952, 34.1663, 199),
(193, 57.626, 39.8844, 200),
(194, 43.641, 51.1985, 201),
(195, 50.2839, 57.1669, 202),
(196, 43.222, 76.8512, 203),
(197, 51.1801, 71.446, 204),
(198, 49.8239, 73.1689, 205),
(199, 53.2198, 63.6354, 206),
(200, 52.2873, 76.9674, 207),
(201, 50.4233, 80.2508, 208),
(202, 42.8983, 71.3979, 209),
(203, 43.2973, 68.2517, 210),
(204, 49.9749, 82.6017, 211),
(205, 42.3416, 69.5901, 212),
(206, 53.1446, 29.2213, 213),
(207, 54.2333, 28.5, 214),
(208, 52.0976, 23.734, 215),
(209, 55.1848, 30.2016, 216),
(210, 52.4411, 30.9878, 217),
(211, 53.6724, 23.8266, 218),
(212, 52.4028, 23.8172, 219),
(213, 53.9073, 27.552, 220),
(214, 53.8946, 30.331, 221),
(215, 53.2226, 26.6766, 222),
(216, 55.4831, 28.799, 223),
(217, 43.2795, 40.2705, 224),
(218, 43.1019, 40.6249, 225),
(219, 43.0857, 40.8161, 226),
(220, 43.166, 40.333, 228),
(221, 43.018, 41.005, 229),
(222, 46.1833, 30.3333, 230),
(223, 49.2342, 28.4638, 231),
(224, 48.4647, 35.0461, 232),
(225, 48.0158, 37.8028, 233),
(226, 56.732, 37.1668, 234),
(227, 47.8388, 35.1395, 235),
(228, 49.806, 24.898, 236),
(229, 50.4547, 30.5238, 237),
(230, 48.5079, 32.2623, 238),
(231, 47.9104, 33.3917, 239),
(232, 51.55, 33.3833, 241),
(233, 48.574, 39.3078, 242),
(234, 50.7472, 25.3253, 243),
(235, 49.8396, 24.0297, 244),
(236, 48.049, 37.976, 245),
(237, 47.124, 37.579, 246),
(238, 46.975, 31.9945, 247),
(239, 46.4825, 30.7233, 248),
(240, 49.5937, 34.5407, 249),
(241, 50.619, 26.254, 250),
(242, 50.9077, 34.7981, 251),
(243, 49.566, 25.6, 252),
(244, 49.2805, 23.505, 253),
(245, 48.6208, 22.2878, 254),
(246, 49.9935, 36.2303, 255),
(247, 46.6332, 32.6021, 256),
(248, 48.506, 26.497, 257),
(249, 49.4444, 32.0597, 258),
(250, 51.4982, 31.2893, 259);

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
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `user` (`user_id`, `email`, `name`, `telephone`, `additional_telephone`, `about`, `avatar`, `activity_id`, `organization`, `last_online`, `is_online`, `is_banned`, `user_access_id`) VALUES
(17, 'rostik057@gmail.com', 'zajcevav30', '+79274768669', '+79274768669', 'Обо мне', NULL, 1, 'Организация', '2022-08-09 20:57:17', 0, 0, 1),
(18, 'zajcevav30@gmail.com', 'zajcevav301', '79999999', 'zajcevav301', 'zajcevav301', NULL, 1, 'zajcevav301', '2022-08-12 17:31:38', 0, 0, 1),
(19, 'zajcevav301@gmail.com', 'zajcevav301', '+79299999', '', '', NULL, 0, 'zajcevav301', '2022-08-12 18:16:54', 0, 0, 1),
(30, 'adel@gmail.com', 'Тестер', '+79299999', '', '', '1661644345278.png', 0, 'ADL', '2022-08-15 18:37:18', 0, 0, 1),
(31, 'email@email.com', 'login12345', '+7929999999', '', '', NULL, 0, 'ADL', '2022-08-17 20:13:05', 0, 0, 1),
(32, 'testtes3t33@gmail.com', 'testtest3333', '+777777', '', '', NULL, 0, '', '2022-09-07 22:57:26', 1, 0, 1),
(33, 'email@email.com', 'teeeeeet', '+792999992', '', '', NULL, 0, 'ADL', '2022-09-12 15:37:20', 0, 0, 1);

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

ALTER TABLE `city_coordinate`
  ADD PRIMARY KEY (`city_coordinate_id`),
  ADD KEY `city_id` (`city_id`);

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
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `application_info`
  MODIFY `application_info_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `application_type`
  MODIFY `application_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `authorization`
  MODIFY `authorization_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `authorization_session`
  MODIFY `authorization_session_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `certificate`
  MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `city`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

ALTER TABLE `city_coordinate`
  MODIFY `city_coordinate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;


ALTER TABLE `country`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `transport_upload`
  MODIFY `transport_upload_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

ALTER TABLE `upload_type`
  MODIFY `upload_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `user_access`
  MODIFY `user_access_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `user_activity`
  MODIFY `user_activity_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `user_messenger`
  MODIFY `user_messenger_id` int NOT NULL AUTO_INCREMENT;

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

ALTER TABLE `city_coordinate`
  ADD CONSTRAINT `city_coordinate_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_access_id`) REFERENCES `user_access` (`user_access_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user_messenger`
  ADD CONSTRAINT `user_messenger_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;