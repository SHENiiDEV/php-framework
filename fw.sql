-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 15 2018 г., 15:31
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fw`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent`) VALUES
(685, 'Комплектующие к Apple', 0),
(691, 'Запчасти iPad', 685),
(692, 'Запчасти iPhone', 685),
(693, 'Запчасти iPod', 685),
(694, 'Запчасти Mac', 685),
(695, 'iPad', 691),
(696, 'iPad 2', 691),
(697, 'iPad NEW (iPad 3)', 691),
(698, 'iPad 4', 691),
(699, 'iPad mini', 691),
(700, 'iPhone', 692),
(701, 'iPhone 3G/3GS', 692),
(702, 'iPhone 4', 692),
(703, 'iPhone 4S', 692),
(704, 'iPhone 5', 692),
(705, 'Микросхемы Apple', 685),
(836, 'Защитные плёнки на Apple', 0),
(840, 'iPad', 836),
(841, 'iPhone', 836),
(842, 'iPod', 836),
(843, 'Mac', 836),
(853, 'Оборудование для ремонта Apple', 0),
(876, 'Аксессуары для Apple', 0),
(877, 'Аксессуары iPad', 876),
(878, 'Аксессуары iPhone', 876),
(879, 'Аксессуары iPod', 876),
(880, 'Аксессуары Mac', 876),
(881, 'iPad', 877),
(882, 'iPad 2', 877),
(883, 'iPad NEW 3 / iPad 4', 877),
(884, 'iPad mini', 877),
(885, 'iPhone 3G / 3GS', 878),
(886, 'iPhone 4 / 4S', 878),
(887, 'iPhone 5', 878),
(888, 'Аксессуары для Apple', 876),
(895, 'iPhone 5 Lamborghini', 878);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Категория 1'),
(2, 'Категория 2'),
(3, 'Категория 3');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `base` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `code`, `title`, `base`) VALUES
(1, 'ru', 'Русский', '1'),
(2, 'en', 'English', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `lang_code`, `category_id`, `title`, `excerpt`, `text`, `keywords`, `description`) VALUES
(1, 'ru', 2, 'Адаптивный дизайн сайта и основные стратегии по его внедрению', 'Адаптивный дизайн сайта — это совершенно новый подход к дизайну, который привлекает к себе все больше внимания, но, учитывая, насколько сильно он отличается от традиционных методов разработки, вначале он может показаться заоблачно сложным для начинающих в', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', 'адаптивный дизайн', 'Адаптивный дизайн сайта и основные стратегии по его внедрению'),
(2, 'ru', 2, 'Советы по выравниванию иконок в тексте', 'Иконки сейчас очень популярны, они дополняют контент (в большинстве случаев). Но с другой стороны они могут доставить немало хлопот. Если вы определились с форматом (SVG или шрифты-иконки?) и создали сами иконки, все равно по мере разработки будут всплыва', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', 'ключевики', 'мета-описание'),
(3, 'ru', 1, 'Редко используемые селекторы JQuery', 'Селекторы в JQuery играют главенствующую роль. Большинство методов в JQuery работают только на каких-то элементах, поэтому перед их использованием необходимо выбрать какой-либо тег. К примеру, чтобы прикрепить событие click к кнопке, эту кнопку сначала не', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', NULL, NULL),
(4, 'ru', 4, 'Тестовый пост', 'lorem ipsum...', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', '', ''),
(5, 'ru', 4, 'Тестовый пост 2', 'Краткое описание статьи \"Тестовый пост\"', '42342', '', ''),
(10, 'en', 4, 'Some English Title', 'Some English excert', 'Some English text', 'Some English keywords', 'Some English description');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(255) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `role`) VALUES
(3, 'user1', '$2y$10$OlSwwCQXhck7KkL/i0J/K.Op0oqiE/dYU3xosD7mnOHOBaE6v.Poe', 'user1@inbox.ru', 'user1', 'user'),
(5, 'user2', '$2y$10$WGUUluaykL80Tt/NBmZC/..FXqOob/nv0vFE/5W2SbVe2LehVq2Xi', 'user2@inbox.ru', 'user2', 'user'),
(6, 'user4', '$2y$10$.EWekeF5tBuROOFTzh.QG.6VTUd3IdqfisX8Le0Iq0CK2TpaHcqFG', 'user4@inbox.ru', 'user4', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=896;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
