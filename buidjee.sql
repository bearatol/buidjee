-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 23 2020 г., 15:12
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bearatol_buidjee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--
-- Создание: Май 20 2020 г., 16:06
-- Последнее обновление: Май 22 2020 г., 23:05
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `task_text` text NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `status`, `task_text`, `login`, `email`) VALUES
(4, 'active', 'Главный герой — 27-летний Илья Горюнов, семь лет отсидевший в тюрьме по ложному обвинению в распространении наркотиков. Когда Илья выходит на свободу, он понимает, что прежняя жизнь, по которой он тосковал, разрушена, и вернуться к ней он больше не сможет.', 'admin', 'admin@admin.ru'),
(5, 'active', '      Глный герой — 27-летний Илья Горюнов, семь лет отсидевший в тюрьме по ложному обвинению в распространении наркотиков. Когда Илья выходит на свободу, он понимает, что прежняя жизнь, по которой он тосковал, разрушена, и вернуться к ней он больше не сможет.                                                      ', 'test2', ''),
(6, 'close', 'Fishing is the activity of trying to catch fish. Fish are normally caught in the wild. Techniques for catching fish include hand gathering, spearing, netting, angling and trapping. “Fishing” may include catching aquatic animals other than fish, such as molluscs, cephalopods, crustaceans, and echinoderms. The term is not normally applied to catching farmed fish, or to aquatic mammals, such as whales where the term whaling is more appropriate. In addition to being caught to be eaten, fish are caught as recreational pastimes. Fishing tournaments are held, and caught fish are sometimes kept as preserved or living trophies. When bioblitzes occur, fish are typically caught, identified, and then released.', 'test2', 'test2@test2.ru'),
(8, 'close', 'qwewewqewq ewqe wqewqewqwdsadsadwqeqw ewqewq e wqewqewqe <script>alert(\'11\');</script>', 'test9', 'test9@test9.ew'),
(9, 'active', 'qwewe wqewqe', 'test9', 'test9@test9.ew');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Май 20 2020 г., 12:43
-- Последнее обновление: Май 22 2020 г., 20:31
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `str_access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `permissions`, `str_access`) VALUES
(1, 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'admin', 'XuQwJzHrwtmLRsQ3R2XcwsFG'),
(4, 'test', 'test@test.er', '098f6bcd4621d373cade4e832627b4f6', 'user', NULL),
(5, 'test2', 'test2@test2.test2', 'ad0234829205b9033196ba818f7a872b', 'user', 'nTzsPSkX3kxS7ed1aM6RjWm2'),
(6, 'test3', 'test3@test3.test3', '8ad8757baa8564dc136c1e07507f4a98', 'user', 'DusTjTACDPqPpWWfZy7rF2TI'),
(7, 'test4', 'test4@test4.test4', '86985e105f79b95d6bc918fb45ec7727', 'user', NULL),
(8, 'test5', 'test5@test5.test5', 'e3d704f3542b44a621ebed70dc0efe13', 'user', NULL),
(9, 'test6', 'test6@test6.er', '4cfad7076129962ee70c36839a1e3e15', 'user', NULL),
(10, 'test7', 'test7@test7.re', 'b04083e53e242626595e2b8ea327e525', 'user', NULL),
(11, 'test8', 'test8@test8.er', '5e40d09fa0529781afd1254a42913847', 'user', 'QLubbzpDpbbGU02g6srk1QH1'),
(12, 'test9', 'test9@test9.ew', '739969b53246b2c727850dbb3490ede6', 'user', '3MvOEK7HbIDABednSD61qlPF');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
