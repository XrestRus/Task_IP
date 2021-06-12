-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2021 г., 11:22
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_ip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `city`, `street`, `house`, `room`) VALUES
(88, 'Ачинск', 'ул Набережная', '43', '3'),
(89, 'Ачинск', 'Льва Толстого', '22', '1'),
(90, 'Ачинск', 'Промышленная', '25', '3'),
(91, 'Ачинск', 'Дзержинское', '15', '5'),
(92, 'Ачинск', 'ул Набережная', '43', '1'),
(93, 'Ачинск', 'Промышленная', '22', '2'),
(94, 'Ачинск', 'Промышленная', '33', '1'),
(95, 'Ачинск', 'ул Набережная', '43', '3'),
(96, 'Ачинск', 'Дзержинское', '33', '3'),
(97, 'Ачинск', 'Промышленная', '43', '3'),
(98, 'Ачинск', 'Дзержинское', '1', '1'),
(99, 'Ачинск', 'ул Набережная', '43', '3'),
(100, 'Ачинск', 'ул Набережная', '43', '3'),
(101, 'Ачинск', 'Дзержинское', '22', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `tariff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `state` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `operator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `tariff_id`, `user_id`, `date`, `state`, `address_id`, `operator_id`) VALUES
(2, 5, 23, '2021-04-02 18:58:02', 'Обработано', 89, 26),
(3, 8, 24, '2021-04-02 18:58:06', 'Обработано', 90, 26),
(4, 8, 27, '2021-04-02 18:58:04', 'Отклонено', 91, 26),
(5, 8, 27, '2021-04-02 19:04:59', 'Обработано', 92, 26),
(6, 4, 22, '2021-04-02 19:00:55', 'Отклонено', 93, 25),
(8, 7, 22, '2021-04-02 19:04:41', 'Обработано', 95, 26),
(9, 6, 23, '2021-04-02 19:00:53', 'Отклонено', 96, 25),
(11, 7, 29, '2021-04-02 19:03:28', 'Ожидает обработки', 98, NULL),
(12, 4, 29, '2021-04-02 19:04:38', 'Обработано', 99, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `chat_message`
--

INSERT INTO `chat_message` (`id`, `text`, `author`, `client_id`, `date`, `role_id`, `status`) VALUES
(226, 'Диалог создан', 'Автоматически', 34, '2021-04-27 14:56:27', 5, 'Создано'),
(227, 'Тут проблема?', 'Юдашкин Юрий Русланович', 34, '2021-04-27 14:56:41', 2, 'Прочитано'),
(228, 'У меня', 'Юдашкин Юрий Русланович', 34, '2021-04-27 14:56:50', 2, 'Прочитано'),
(229, 'Да', 'Максимов Максим Сергеевич', 34, '2021-04-27 14:56:54', 3, 'Прочитано'),
(230, '\nКакая?', 'Максимов Максим Сергеевич', 34, '2021-04-27 14:56:58', 3, 'Прочитано'),
(231, '\nА не, решил', 'Юдашкин Юрий Русланович', 34, '2021-04-27 14:57:09', 2, 'Прочитано'),
(232, 'Ок\n', 'Максимов Максим Сергеевич', 34, '2021-04-27 14:57:21', 3, 'Прочитано'),
(233, '-', 'Юдашкин Юрий Русланович', 34, '2021-04-27 14:58:00', 2, 'Прочитано'),
(234, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:02:09', 5, 'Создано'),
(235, '\nуйцу', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:04:08', 2, 'Прочитано'),
(236, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:04:12', 5, 'Закрыт'),
(237, 'уйцуйцу', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:04:18', 2, 'Прочитано'),
(238, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:07:09', 5, 'Закрыт'),
(239, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:14', 2, 'Прочитано'),
(240, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:07:16', 5, 'Закрыт'),
(241, 'e', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:35', 2, 'Прочитано'),
(242, 'eqw', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:07:39', 3, 'Прочитано'),
(243, 'eqwe', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:41', 2, 'Прочитано'),
(244, 'eqwe', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:07:43', 3, 'Прочитано'),
(245, 'ee', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:44', 2, 'Прочитано'),
(246, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:07:46', 5, 'Закрыт'),
(247, 'eee', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:52', 2, 'Прочитано'),
(248, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:54', 2, 'Прочитано'),
(249, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:07:56', 2, 'Прочитано'),
(250, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:12:08', 5, 'Закрыт'),
(251, 'e', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:12:11', 2, 'Прочитано'),
(252, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:14:04', 5, 'Закрыт'),
(253, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:14:35', 5, 'Закрыт'),
(254, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:14:38', 2, 'Прочитано'),
(255, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:14:39', 5, 'Закрыт'),
(256, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:14:41', 2, 'Прочитано'),
(257, 'eqwew', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:14:49', 2, 'Прочитано'),
(258, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:14:50', 5, 'Закрыт'),
(259, 'eqweqw', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:14:51', 2, 'Прочитано'),
(260, 'eqwe', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:15:13', 2, 'Прочитано'),
(261, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:15:13', 5, 'Закрыт'),
(262, 'eqweqweqweqwe', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:15:16', 2, 'Прочитано'),
(263, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:15:19', 5, 'Закрыт'),
(264, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:17:26', 5, 'Создано'),
(265, 'уйцу', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:26', 2, 'Прочитано'),
(266, 'уйцуй', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:32', 2, 'Прочитано'),
(267, 'уйцу', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:34', 2, 'Прочитано'),
(268, 'у', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:17:37', 3, 'Прочитано'),
(269, 'й', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:17:38', 3, 'Прочитано'),
(270, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:17:39', 5, 'Закрыт'),
(271, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:17:44', 5, 'Создано'),
(272, 'уйуц', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:44', 2, 'Прочитано'),
(273, 'уйц', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:46', 2, 'Прочитано'),
(274, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:17:52', 5, 'Закрыт'),
(275, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:17:54', 5, 'Создано'),
(276, ' у', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:17:54', 3, 'Прочитано'),
(277, 'уй', 'Юдашкин Юрий Русланович', 34, '2021-04-27 15:17:56', 2, 'Прочитано'),
(278, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:17:57', 5, 'Закрыт'),
(279, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:18:05', 5, 'Создано'),
(280, 'уйцуйц', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:18:05', 3, 'Прочитано'),
(281, 'уйцуйц', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:18:07', 3, 'Прочитано'),
(282, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:18:10', 5, 'Закрыт'),
(283, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:18:16', 5, 'Создано'),
(284, 'уйцу', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:18:16', 3, 'Прочитано'),
(285, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:18:20', 5, 'Закрыт'),
(286, 'Диалог создан', 'Автоматически', 34, '2021-04-27 15:19:45', 5, 'Создано'),
(287, 'e', 'Максимов Максим Сергеевич', 34, '2021-04-27 15:19:45', 3, 'Прочитано'),
(288, 'Диалог закрыт', 'Автоматически', 34, '2021-04-27 15:19:48', 5, 'Закрыт'),
(289, 'Диалог создан', 'Автоматически', 23, '2021-04-27 15:20:20', 5, 'Создано'),
(290, 'eувйцу', 'Иванов Иван Иваныч', 23, '2021-04-27 15:20:24', 2, 'Прочитано'),
(291, 'уйцуйц', 'Иванов Иван Иваныч', 23, '2021-04-27 15:20:34', 2, 'Прочитано'),
(292, 'уйцу', 'Иванов Иван Иваныч', 23, '2021-04-27 15:20:37', 2, 'Прочитано'),
(293, 'Диалог закрыт', 'Автоматически', 23, '2021-04-27 15:21:01', 5, 'Закрыт');

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `state` varchar(255) NOT NULL,
  `operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`id`, `app_id`, `date`, `state`, `operator_id`) VALUES
(22, 8, '2021-04-02 19:08:08', 'Активный', 26),
(23, 2, '2021-04-02 19:01:03', 'Активный', 25),
(24, 3, '2021-04-02 19:07:43', 'Активный', 26),
(27, 5, '2021-04-02 19:04:59', 'Ожидает оплаты', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `contract_id`, `operator_id`, `state`, `price`, `date`) VALUES
(1, 22, 26, 'Оплачено', '288.00', '2021-04-02 18:59:44'),
(2, 23, 26, 'Оплачено', '1000.00', '2021-04-02 19:00:24'),
(3, 24, 26, 'Оплачено', '350.00', '2021-04-02 19:06:53'),
(6, 22, 26, 'Оплачено', '2222.00', '2021-04-02 19:05:33'),
(8, 27, 26, 'Не оплачено', '350.00', '2021-04-02 19:04:59');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'гость'),
(2, 'клиент'),
(3, 'оператор'),
(4, 'администратор'),
(5, 'бот');

-- --------------------------------------------------------

--
-- Структура таблицы `state_type`
--

CREATE TABLE `state_type` (
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `state_type`
--

INSERT INTO `state_type` (`title`) VALUES
('Активный'),
('Не оплачено'),
('Обработано'),
('Ожидает обработки'),
('Ожидает оплаты'),
('Оплачено'),
('Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE `tariff` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `relevance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tariff`
--

INSERT INTO `tariff` (`id`, `title`, `description`, `price`, `relevance`) VALUES
(4, 'Технологии контроля', 'Интернет до 1200 Мбит/с\r\nИнтерактивное ТВ\r\nКомплект оборудования', '2500.00', 1),
(5, 'Технологии развлечения+', 'Интернет до 50 Мбит/с', '1000.00', 1),
(6, 'Общения в открытии+', 'Интернет до 200 Мбит/с\r\nИнтерактивное ТВ\r\nКомплект оборудования\r\nWink в приложении', '350.00', 1),
(7, 'Выгоды в году', 'Интернет до 300 Мбит/с\r\nИнтерактивное ТВ\r\nWink в приложении', '2222.00', 1),
(8, 'Технологии контроля+', 'Интернет до 20 Мбит/с\r\nИнтерактивное ТВ', '350.00', 1),
(9, 'Технологии выгоды+2', '', '3.00', 1),
(10, '1312312', '', '3123122.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `surname`, `name`, `patronymic`, `phone`, `email`, `role_id`) VALUES
(6, 'admin', 'admin', 'Петренко', 'Иван', 'Олегович', '+78884756934', 'admin@e.w', 4),
(22, 'ivan', 'invan', 'Иваныч', 'Сергей', 'Олегович', '+79233552871', 'ivan@ro.ru', 4),
(23, 'vlastilin', '352vsvc1', 'Иванов', 'Иван', 'Иваныч', '+73554245876', 'ivan@gmail.com', 2),
(24, 'petr', 'petr242', 'Канистров', 'Петр', 'Николаевич', '+73545434343', 'rty@ro.ru', 2),
(25, 'srg', '441jyfs', 'Максимов', 'Максим', 'Сергеевич', '+76557664255', 'sergo@ro.ru', 3),
(26, 'alec', '07a5f9d4f', 'Байдавлетов', 'Александр', 'Иванович', '+79679698134', 'aleksandr1962@hotmail.com', 3),
(27, 'alena07021983', '2aed60b9d', 'Квартальнова', 'Алена', 'Лукьяновна', '+79653487860', 'alena07021983@yandex.ru', 2),
(28, 'arkadiy20', '8bb9722d3', 'Каверин', 'Аркадий', 'Васильевич', '+79967727075', 'arkadiy20@ya.ru', 2),
(29, 'roman9027', '84910bd13', 'Каиров', 'Роман', 'Гаврннлович', '+79334391010', 'roman9027@outlook.com', 2),
(30, 'srg3', '3', 'Максимов', 'Максим', 'Сергеевич', '+76557664255', 'serg3o@ro.ru', 2),
(31, 'ы', 'ы', 'Максимов', 'Максим', 'Сергеевич', '+76557664255', 'sergo@ro.ru', 2),
(32, 'operator2', '2', 'Иванов', 'Иван', 'Иваныч', '+71233304422', 'ivan@gmail.com', 2),
(33, '3', '3', 'Максимов', 'Максим', 'Сергеевич', '+76557664255', 'sergo@ro.ru', 2),
(34, 't', 't', 'Юдашкин', 'Юрий', 'Русланович', '89233604433', 'ad22m@a.a', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tariff_id` (`tariff_id`,`user_id`,`address_id`,`operator_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `operator_id` (`operator_id`),
  ADD KEY `state` (`state`);

--
-- Индексы таблицы `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_id` (`app_id`),
  ADD KEY `state` (`state`),
  ADD KEY `operator_id` (`operator_id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`,`operator_id`),
  ADD KEY `operator_id` (`operator_id`),
  ADD KEY `state` (`state`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `state_type`
--
ALTER TABLE `state_type`
  ADD PRIMARY KEY (`title`);

--
-- Индексы таблицы `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_5` FOREIGN KEY (`state`) REFERENCES `state_type` (`title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `chat_message`
--
ALTER TABLE `chat_message`
  ADD CONSTRAINT `chat_message_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_message_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `application` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`state`) REFERENCES `state_type` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`state`) REFERENCES `state_type` (`title`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
