CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transport_type` varchar(255) NOT NULL,
  `user_fullname` varchar(60) NOT NULL,
  `user_telephone` int(30) DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body_type` int(11) DEFAULT NULL,
  `loading_method` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `mass` float DEFAULT NULL,
  `price` float NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
);

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`application_id`, `from`, `to`, `date`, `date_created`, `date_edited`, `transport_type`, `user_fullname`, `user_telephone`, `user_email`, `user_id`, `body_type`, `loading_method`, `size`, `height`, `mass`, `price`, `is_deleted`) VALUES
(1, 'Россия', 'Россия', '2022-10-20', '2022-10-21 13:06:37', '2022-10-21 13:06:37', 'Тяжелая', 'Ростислав Фамилия', 79999999, 'rostik057@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, 3221, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `body_type`
--

CREATE TABLE `body_type` (
  `body_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Структура таблицы `height`
--

CREATE TABLE `height` (
  `height_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Структура таблицы `loading_method`
--

CREATE TABLE `loading_method` (
  `loading_method_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
);

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
(1, 'Small straight'),
(2, 'Large Straight'),
(3, 'Cargo Van');

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type_id` int(11) NOT NULL DEFAULT '1',
  `last_online` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_online` int(11) NOT NULL DEFAULT '1',
  `is_banned` int(11) NOT NULL DEFAULT '0'
);

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `email`, `telephone`, `password`, `name`, `surname`, `created`, `user_type_id`, `last_online`, `is_online`, `is_banned`) VALUES
(1, 'rostik057@gmail.com', '79999999', '$2y$10$bsQTdXVTQ0Q46j8ljpKPXOfluHPuF3pXoS.BudiL0voc2GEX6SdqS', 'Ростислав', 'Фамилия', '2022-10-15 22:27:42', 1, '2022-10-15 22:27:42', 1, 0),
(2, 'zajcevav30@gmail.com', '79999999999', '$2y$10$HPWufvrFTHNVH.iqJm3wb.p1KIgQK9Bx1RN2B0MrkpyBy3RestyTy', 'zajcevav301', 'zajcevav301', '2022-10-17 16:00:48', 1, '2022-10-17 16:00:48', 1, 0);

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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Индексы таблицы `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`body_type_id`);

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
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`user_session_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `body_type`
--
ALTER TABLE `body_type`
  MODIFY `body_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `height`
--
ALTER TABLE `height`
  MODIFY `height_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `loading_method`
--
ALTER TABLE `loading_method`
  MODIFY `loading_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;