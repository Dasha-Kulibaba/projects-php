-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 11 2025 г., 14:47
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vmfk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `format` int NOT NULL,
  `date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `link`, `format`, `date`, `create_date`, `upd_date`) VALUES
(1, 'назва курсу', 'посилання', 0, '2025-06-07', '2025-06-09', NULL),
(2, 'інший курс', 'посилання2', 0, '2025-07-25', '2025-06-09', '2025-06-11');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int DEFAULT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `years` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `section_id` bigint UNSIGNED DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `title`, `link`, `type`, `author_id`, `years`, `section_id`, `create_date`, `upd_date`) VALUES
(1, 'Бланки планів занять', 'public/young/Бланки_планів_занять_6846ce5791203.pdf', 3, NULL, NULL, 1, '2025-06-09', '2025-06-09'),
(2, 'Поради молодому викладачу', 'public/young/Поради_молодому_викладачу_6846ce751fe0d.docx', 3, NULL, NULL, 1, '2025-06-09', NULL),
(3, 'Пам\'ятка викладачеві (КОМАР)', 'public/young/Пам_ятка_викладачеві(ї_КОМАР)_6846ce874648d.doc', 1, NULL, NULL, 1, '2025-06-09', '2025-06-11'),
(4, 'Поради молодим викладачам', 'public/young/Поради_молодим_викладачам_6846ced6c022c.doc', 3, NULL, NULL, 1, '2025-06-09', NULL),
(5, 'Орієнтовний план ПК  МК СумДУ 2025 рік', 'public/qualify/Орієнтовний_план_ПК__МК_СумДУ_2025_рік_6846cf183c364.docx', NULL, NULL, NULL, 3, '2025-06-09', NULL),
(6, 'Підвищення кваліфікації 2023 рік', 'public/qualify/Підвищення_кваліфікації_2023_рік_6846cf43b2294.docx', NULL, NULL, NULL, 3, '2025-06-09', NULL),
(7, 'Графік ОМО І І семестр 24-25', 'public/planner/Графік_ОМО_І_І_семестр_24-25_6846d01345a84.pdf', 1, NULL, NULL, 5, '2025-06-09', NULL),
(8, 'Планування ОМО І семестр 2024-2025', 'public/planner/Планування_ОМО_І_семестр_2024-2025_6846d01f3f88f.pdf', 1, NULL, NULL, 5, '2025-06-09', NULL),
(9, 'Рекомендації по написанню планів роботи кабінетів', 'public/planner/Рекомендації_по_написанню_планів_роботи_кабінетів_6846d042c9779.doc', 2, NULL, NULL, 5, '2025-06-09', NULL),
(10, 'Положення про атестацію МФК СумДУ', 'public/sertification/Положення_про_атестацію_МФК_СумДУ_6846d069e1e5e.docx', 1, NULL, '2022-2023', 2, '2025-06-09', NULL),
(11, 'Наказ МОН 1277', 'public/sertification/Наказ_МОН_1277_6846d0875140a.pdf', 1, NULL, '2025-2026', 2, '2025-06-09', NULL),
(12, 'Перпективний план атестації на 2023-2024', 'public/sertification/Перпективний_план_атестації_на_2023-2024_6846d0a285926.doc', 1, NULL, '2023-2024', 2, '2025-06-09', NULL),
(13, 'Графік засідань атест комісії - 2024-2025', 'public/sertification/Графік_засідань_атест_комісії_-_2024-2025_6846d0bd279a8.doc', 2, NULL, '2024-2025', 2, '2025-06-09', NULL),
(14, 'Атестація кваліметрія 2024 ', 'public/sertification/Атестація_кваліметрія_v2024__6846d0de1920b.xlsx', 4, NULL, NULL, 2, '2025-06-09', '2025-06-11'),
(15, 'робота 1', 'public/exhibition/робота_1_68496a7a23dab.pdf', NULL, 1, NULL, 4, '2025-06-11', NULL),
(16, 'Робота A', 'public/exhibition/Робота_68496a9bcfa1c.pdf', NULL, 2, NULL, 4, '2025-06-11', '2025-06-11'),
(17, 'Робота зображення', 'public/exhibition/Робота_зображення_68496ac510798.png', NULL, 3, NULL, 4, '2025-06-11', NULL),
(18, 'Робота N', 'public/exhibition/Робота_N_68496bad4de5e.png', NULL, 2, NULL, 4, '2025-06-11', NULL),
(19, 'Напрямки підвищення кваліфікації', 'public/qualify/Напрямки_підвищення_кваліфікації_68496c91be6cf.docx', NULL, NULL, NULL, 3, '2025-06-11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `frequency` int NOT NULL,
  `time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `frequency`, `time`, `create_date`, `upd_date`) VALUES
(1, 'Адміннарада', '2025-06-02', 3, '14:00:00', '2025-06-09', NULL),
(2, 'Засідання завідувачів відділень з класними керівниками', '2025-06-12', 1, '15:00:00', '2025-06-09', NULL),
(3, 'Захід до Дня вишиванки', '2025-06-12', 1, '15:00:00', '2025-06-09', NULL),
(5, 'Засідання стипендіальної комісії', '2025-03-31', 1, '13:30:00', '2025-06-09', NULL),
(6, 'ОМО  викладачів економічних дисциплін   (Крамінська Г.В)', '2025-04-16', 1, '10:30:00', '2025-06-09', NULL),
(7, 'Засідання ЦК', '2025-06-04', 1, '15:00:00', '2025-06-09', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `psychology`
--

CREATE TABLE `psychology` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` year NOT NULL,
  `create_date` date DEFAULT NULL,
  `upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `psychology`
--

INSERT INTO `psychology` (`id`, `title`, `month`, `year`, `create_date`, `upd_date`) VALUES
(1, 'Супровід студентів, які перебувають на обліку. Індивідуальні консультації зі студентами та їх батьками.  Просвітницькі заходи з нагоди Місяця обізнаності про ментальне здоров’я - “Сенсотека”. Діагностика психологічних станів студентів  за запитом керівників груп або студентів.', '06', 2025, '2025-06-09', '2025-06-09');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Ім\'я Прізвище', 'email1@gmail.com'),
(2, 'Ім\'я2 Прізвище', 'email2@gmail.com'),
(3, 'Ім\'я3 Прізвище', 'email3@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` year NOT NULL,
  `week_number` int NOT NULL,
  `create_date` date DEFAULT NULL,
  `upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `weeks`
--

INSERT INTO `weeks` (`id`, `title`, `month`, `year`, `week_number`, `create_date`, `upd_date`) VALUES
(1, 'Методична виставка', '06', 2025, 4, '2025-06-09', NULL),
(2, 'Тиждень ЦК природничих дисциплін', '04', 2025, 2, '2025-06-09', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_ibfk_1` (`author_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `psychology`
--
ALTER TABLE `psychology`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `psychology`
--
ALTER TABLE `psychology`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
