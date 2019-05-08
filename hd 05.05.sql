-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 05 2019 г., 17:20
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(50) NOT NULL,
  `id_ticket` int(50) NOT NULL,
  `id_autor` int(50) NOT NULL,
  `id_executor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `id_ticket`, `id_autor`, `id_executor`) VALUES
(1, 12, 2, 1),
(37, 30, 1, 6),
(44, 31, 5, 6),
(45, 32, 5, 6),
(46, 10, 2, 6),
(47, 33, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `chat_mess`
--

CREATE TABLE `chat_mess` (
  `id` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `mess` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_chat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat_mess`
--

INSERT INTO `chat_mess` (`id`, `id_user`, `mess`, `date`, `id_chat`) VALUES
(44, 1, 'Проверка чата', '2019-05-02 21:11:18', 1),
(48, 2, 'Я всё ещё Андрей\r\n', '2019-05-02 21:11:18', 1),
(51, 2, 'Женя, ну где ты там?\r\n', '2019-05-02 21:11:18', 1),
(52, 1, 'Я тут брат', '2019-05-02 21:11:18', 1),
(53, 1, 'Продолжаем диалог!', '2019-05-02 21:11:18', 1),
(74, 2, 'testmess', '2019-05-02 22:30:52', 1),
(76, 1, 'saas', '2019-05-02 23:10:22', 1),
(77, 1, 'ghndbdvs', '2019-05-02 23:11:48', 1),
(78, 1, 'ddd', '2019-05-02 23:21:42', 37),
(81, 1, 'jhgfd', '2019-05-02 23:25:12', 37),
(102, 5, '55', '2019-05-03 01:30:32', 38),
(103, 5, '55', '2019-05-03 01:32:06', 37),
(104, 5, 'sa', '2019-05-03 01:34:41', 37),
(105, 5, 'sa', '2019-05-03 01:35:29', 37),
(106, 5, 'олдждлорпа', '2019-05-03 09:22:23', 39),
(107, 5, 'олдждлорпа', '2019-05-03 09:25:06', 39),
(108, 1, 'asdasdasd', '2019-05-03 09:35:58', 39),
(109, 5, 'asdfghj', '2019-05-03 09:40:50', 39),
(114, 5, 'ыфффф', '2019-05-03 10:09:35', 44),
(115, 5, 'ыыыы', '2019-05-03 10:09:38', 44),
(116, 5, 'ывввф', '2019-05-03 10:09:55', 45),
(117, 5, 'фывфыв', '2019-05-03 10:09:57', 45),
(118, 5, 'фывфыв', '2019-05-03 12:13:46', 45),
(125, 2, 'Ответное сообщение', '2019-05-03 22:59:23', 46),
(126, 1, 'Андрей, не переживай, всё будет хорошо', '2019-05-03 23:00:40', 46),
(129, 6, 'Статус должен измениться', '2019-05-03 23:27:12', 47);

-- --------------------------------------------------------

--
-- Структура таблицы `priority`
--

CREATE TABLE `priority` (
  `id` int(50) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'Низкий'),
(2, 'Средний'),
(3, 'Высокий'),
(4, 'Беда!');

-- --------------------------------------------------------

--
-- Структура таблицы `problem`
--

CREATE TABLE `problem` (
  `id` int(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `problem`
--

INSERT INTO `problem` (`id`, `name`, `description`) VALUES
(1, 'Интернет', 'asd'),
(2, 'Принтер', '1'),
(3, 'Принтер', NULL),
(4, 'Не понимаю что случилось', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `description`) VALUES
(1, 'Не прочитано', 'asd'),
(2, 'Прочитано', 'asd'),
(3, 'Решено', '');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` int(50) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `autor` int(50) NOT NULL,
  `executor` int(50) NOT NULL,
  `problem` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(50) NOT NULL,
  `priority` int(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `subject`, `autor`, `executor`, `problem`, `date`, `status`, `priority`, `message`) VALUES
(10, 'Проблемка', 2, 6, 2, '2019-05-03 15:50:15', 2, 2, 'Принтер сломался'),
(11, 'Проблемыч', 2, 6, 2, '2019-05-03 14:48:34', 2, 3, 'Принтер сломался'),
(12, 'Туда сюда', 2, 1, 1, '2019-05-02 11:02:05', 2, 4, 'Текст сообщения хехе'),
(22, 'Гора', 2, 1, 1, '2019-05-03 15:49:05', 2, 2, 'POMOGITI'),
(30, 'saasas', 1, 6, 2, '2019-05-03 15:50:15', 2, 4, 'saasdasd'),
(31, 'NewMessage', 5, 1, 2, '2019-05-03 14:49:33', 2, 4, 'Проверка связи, пишет Ибрагим'),
(32, 'NewMessage2', 5, 6, 2, '2019-05-03 09:42:08', 2, 1, '21112'),
(33, 'Subject', 1, 6, 2, '2019-05-03 23:26:03', 1, 1, 'Test Status');

-- --------------------------------------------------------

--
-- Структура таблицы `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `middlename` varchar(225) NOT NULL,
  `user_group` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user1`
--

INSERT INTO `user1` (`id`, `username`, `password`, `email`, `surname`, `firstname`, `middlename`, `user_group`) VALUES
(1, 'lager8857', 'ae4f04861e1ec6b7711ecd871f8d0466', 'assa@aa.ru', 'Баранов', 'Evgeny', 'Михайлович', 1),
(2, 'test', 'ae4f04861e1ec6b7711ecd871f8d0466', '123@asd.ru', 'Проверов', 'Andrew', 'Проверович', 2),
(4, 'test1', 'ae4f04861e1ec6b7711ecd871f8d0466', '1213@asd.ru', 'Проверялович', 'Дима', 'Проверович', 2),
(5, 'ibr', 'ae4f04861e1ec6b7711ecd871f8d0466', 'ibr@ibr.ru', 'Ибрагимов', 'Ибрагим', 'Ибрагимович', 2),
(6, 'root', 'ae4f04861e1ec6b7711ecd871f8d0466', 'Executor@Executor.isa', 'Executor', 'Executor', 'Executor', 1),
(7, 'dimas', 'ae4f04861e1ec6b7711ecd871f8d0466', 'dimas@asd.ru', 'Петров', 'Дмитрий', 'Витальевич', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE `user_group` (
  `id` int(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `description`) VALUES
(1, 'Администратор', ''),
(2, 'Пользователь', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_executor` (`id_executor`);

--
-- Индексы таблицы `chat_mess`
--
ALTER TABLE `chat_mess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chat` (`id_chat`);

--
-- Индексы таблицы `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`),
  ADD KEY `executor` (`executor`),
  ADD KEY `problem` (`problem`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group` (`user_group`);

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `chat_mess`
--
ALTER TABLE `chat_mess`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT для таблицы `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
