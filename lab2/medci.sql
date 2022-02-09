-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2022 г., 09:54
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medci`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`ID`, `fio`) VALUES
(1, 'Гробовец Виталий Валерьевич'),
(2, 'Моргалов Игорь Ларионович'),
(3, 'Слухов Альберт Львович'),
(4, 'Криволапов Кирилл Иванович'),
(5, 'Моргалова Марина Анатольевна');

-- --------------------------------------------------------

--
-- Структура таблицы `sicklists`
--

CREATE TABLE `sicklists` (
  `ListID` int(11) UNSIGNED NOT NULL,
  `ListScan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DocID` int(11) UNSIGNED NOT NULL,
  `Diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IllnessDuration` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sicklists`
--

INSERT INTO `sicklists` (`ListID`, `ListScan`, `name`, `DocID`, `Diagnosis`, `IllnessDuration`) VALUES
(1, '1.png', 'Примаков Анатолий Михайлович', 2, 'Близорукость', 10),
(2, '2.png', 'Кириличева Анна Владимировна', 4, 'Плоскостопие', 31),
(3, '3.png', 'Лобачевский Фёдор Алексеевич', 3, 'Отит', 5),
(4, '4.png', 'Ширикова Дарья Александровна', 1, 'Острый Перитонит', 0),
(5, '5.png', 'Шкрябченко Виктор Данилович', 3, 'Гайморит', 13),
(6, '6.png', 'Ступчин Валерий Аккакиевич', 5, 'Дальнозоркость', 0),
(7, '7.png', 'Храмовченко Виолетта Михайловна', 4, 'Сколиоз', 2),
(8, '8.png', 'Зарубова Шарлотта Геннадиевна', 3, 'Хронический Синусит', 45),
(9, '9.png', 'Книголюбов Олег Витальевич', 2, 'Катаракта', 10),
(10, '10.png', 'Дмитриенко Валерия Дмитриевна', 1, 'Язва', 14),
(11, '11.png', 'Болотин Кирилл Шарикович', 1, 'Гастрит', 13),
(12, '12.png', 'Жердочкин Михаил Никитович', 3, 'Ангина', 7),
(13, '13.png', 'Хронов Алексей Александрович', 5, 'Синдром сухого глаза', 21),
(14, '14.png', 'Ковров Виталий Иннокентиевич', 1, 'Рак желудка', 35),
(15, '15.png', 'Лаврова Мария Валерьевна', 2, 'Блефарит', 8),
(16, '16.png', 'Щепетилов Андрей Кириллович', 5, 'Глаукома', 5),
(17, '17.png', 'Гоголева Яна Никифоровна', 4, 'Остеохондроз', 64),
(18, '18.png', 'Мироненко Яков Николаевич', 1, 'Острая Диарея', 3),
(19, '19.png', 'Черкасов Анатолий Андреевич', 3, 'Фарингит', 14),
(20, '20.png', 'Хорошев Зураб Абдуллаевич', 4, 'Плоскостопие', 78);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `sicklists`
--
ALTER TABLE `sicklists`
  ADD PRIMARY KEY (`ListID`),
  ADD KEY `foreign_key_1` (`DocID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sicklists`
--
ALTER TABLE `sicklists`
  MODIFY `ListID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sicklists`
--
ALTER TABLE `sicklists`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`DocID`) REFERENCES `doctors` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
