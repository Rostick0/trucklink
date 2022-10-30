
CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transport_type` int(11) NOT NULL,
  `user_fullname` varchar(60) NOT NULL,
  `user_telephone` int(30) DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `loading_method` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mass` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comment` text,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
);

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`application_id`, `from`, `to`, `date`, `date_created`, `date_edited`, `transport_type`, `user_fullname`, `user_telephone`, `user_email`, `user_id`, `status`, `loading_method`, `size`, `height`, `photo`, `mass`, `price`, `comment`, `is_deleted`) VALUES
(1, 'Россия', 'Россия', '2022-10-20', '2022-10-21 13:06:37', '2022-10-21 13:06:37', 1, 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, 1, 1, 1, 1, NULL, 1, 3221, NULL, 0),
(2, 'Россия', 'Россия', '2022-10-07', '2022-10-23 12:26:36', '2022-10-23 12:26:36', 1, 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, 1, NULL, NULL, NULL, '16665171969845.jpeg', NULL, NULL, 'Срочный заказ', 0),
(3, 'Рязань', 'Ленинский проспект', '2022-10-30', '2022-10-26 20:41:47', '2022-10-26 20:41:47', 1, 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Теско Екстра', 'Санкт-Петербург', '2022-10-29', '2022-10-26 20:42:47', '2022-10-26 20:42:47', 5, 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, 1, NULL, NULL, NULL, '16668061677057.jpeg', NULL, 154, 'Срочный заказ', 0),
(7, 'Украина', 'Bibigon', '2022-11-20', '2022-10-29 03:05:15', '2022-10-29 03:05:15', 31, 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `height`
--

CREATE TABLE `height` (
  `height_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

--
-- Дамп данных таблицы `height`
--

INSERT INTO `height` (`height_id`, `name`) VALUES
(1, '1.5'),
(2, '2'),
(3, '2.5');

-- --------------------------------------------------------

--
-- Структура таблицы `loading_method`
--

CREATE TABLE `loading_method` (
  `loading_method_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

--
-- Дамп данных таблицы `loading_method`
--

INSERT INTO `loading_method` (`loading_method_id`, `name`) VALUES
(1, 'With the removal of crossbars'),
(2, 'Without a gate'),
(3, 'With the removal of racks'),
(4, 'Upper'),
(5, 'Side'),
(6, 'Rear'),
(7, 'With full rastentovka'),
(8, 'Hydroboard');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`size_id`, `name`) VALUES
(1, '48 X 48'),
(2, '48 X 45'),
(3, '48 X 40'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
);

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status_id`, `name`) VALUES
(1, 'Posted'),
(2, 'In Search'),
(3, 'Posted'),
(4, 'In Search'),
(5, 'Looked'),
(6, 'On the way to pickup'),
(7, 'Carrier loading'),
(8, 'On the way to destination'),
(9, 'Unloading'),
(10, 'Delivered'),
(11, 'Awaiting quote'),
(12, 'Quoted');

-- --------------------------------------------------------

--
-- Структура таблицы `transport_type`
--

CREATE TABLE `transport_type` (
  `transport_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
);

--
-- Дамп данных таблицы `transport_type`
--

INSERT INTO `transport_type` (`transport_type_id`, `name`) VALUES
(1, 'Awning'),
(2, 'Celomyant'),
(3, 'Beads'),
(4, 'Container'),
(5, 'Clothing truck'),
(6, 'Isotherm'),
(7, 'Ref.'),
(8, 'Ref.-tushevoz'),
(9, 'Car carrier'),
(10, 'Concrete truck'),
(11, 'Grain carrier'),
(12, 'Logging truck'),
(13, 'Horse carrier'),
(14, 'Crane'),
(15, 'Garbage truck'),
(16, 'Loader'),
(17, 'Poultry truck'),
(18, 'Cattle truck'),
(19, 'Pipe carrier'),
(20, 'Tractor'),
(21, 'Woodchip truck'),
(22, 'Tow truck'),
(23, 'Yacht carrier'),
(24, 'Onboard/Open'),
(25, 'Platform'),
(26, 'Manipulator'),
(27, 'Scrap truck/Metal truck'),
(28, 'Container ship'),
(29, 'Trawl/Oversized'),
(30, 'Plitovoz'),
(31, 'Dump truck'),
(32, 'Minibus'),
(33, 'Bus'),
(34, 'Milk truck'),
(35, 'Bitumen truck'),
(36, 'Fuel tanker'),
(37, 'Gas carrier'),
(38, 'Feed truck'),
(39, 'Flour truck'),
(40, 'Tanker truck'),
(41, 'Cement truck'),
(42, 'Maslovoz');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(63) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `password` varchar(131) NOT NULL,
  `name` varchar(63) NOT NULL,
  `surname` varchar(63) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type_id` int(11) NOT NULL DEFAULT '1',
  `last_online` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_online` int(11) NOT NULL DEFAULT '1',
  `is_banned` int(11) NOT NULL DEFAULT '0'
);

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `email`, `telephone`, `password`, `name`, `surname`, `avatar`, `created`, `user_type_id`, `last_online`, `is_online`, `is_banned`) VALUES
(1, 'rostik057@gmail.com', '79999999', '$2y$10$bsQTdXVTQ0Q46j8ljpKPXOfluHPuF3pXoS.BudiL0voc2GEX6SdqS', 'Ростислав', 'Фамилия', '16668247037096.jpeg', '2022-10-15 22:27:42', 1, '2022-10-15 22:27:42', 1, 0),
(2, 'zajcevav30@gmail.com', '79999999999', '$2y$10$HPWufvrFTHNVH.iqJm3wb.p1KIgQK9Bx1RN2B0MrkpyBy3RestyTy', 'zajcevav301', 'zajcevav301', NULL, '2022-10-17 16:00:48', 2, '2022-10-17 16:00:48', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_session`
--

CREATE TABLE `user_session` (
  `user_session_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
);

--
-- Дамп данных таблицы `user_session`
--

INSERT INTO `user_session` (`user_session_id`, `token`, `date`, `user_id`) VALUES
(1, 'b5365908c694777ed8292ffd99ac9049', '2022-10-15 22:27:42', 1),
(2, 'e3c38c6c4e8e4e078a0b8646778edcda', '2022-10-17 16:00:48', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `name` varchar(63) NOT NULL,
  `power` int(11) NOT NULL
);

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `name`, `power`) VALUES
(1, 'user', 1),
(2, 'moderator', 10),
(3, 'admin', 25);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loading_method` (`loading_method`),
  ADD KEY `size` (`size`),
  ADD KEY `height` (`height`),
  ADD KEY `transport_type` (`transport_type`);

--
-- Индексы таблицы `height`
--
ALTER TABLE `height`
  ADD PRIMARY KEY (`height_id`);

--
-- Индексы таблицы `loading_method`
--
ALTER TABLE `loading_method`
  ADD PRIMARY KEY (`loading_method_id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `transport_type`
--
ALTER TABLE `transport_type`
  ADD PRIMARY KEY (`transport_type_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Индексы таблицы `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`user_session_id`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `height`
--
ALTER TABLE `height`
  MODIFY `height_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `loading_method`
--
ALTER TABLE `loading_method`
  MODIFY `loading_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `transport_type`
--
ALTER TABLE `transport_type`
  MODIFY `transport_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_session`
--
ALTER TABLE `user_session`
  MODIFY `user_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`loading_method`) REFERENCES `loading_method` (`loading_method_id`),
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`size`) REFERENCES `size` (`size_id`),
  ADD CONSTRAINT `application_ibfk_5` FOREIGN KEY (`height`) REFERENCES `height` (`height_id`),
  ADD CONSTRAINT `application_ibfk_6` FOREIGN KEY (`transport_type`) REFERENCES `transport_type` (`transport_type_id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
