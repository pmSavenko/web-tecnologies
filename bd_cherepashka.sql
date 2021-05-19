-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.19 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных bd
CREATE DATABASE IF NOT EXISTS `bd` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd`;

-- Дамп структуры для таблица bd.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` enum('Мужской','Женский') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `num_pass` varchar(20) DEFAULT NULL,
  `avatar` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы bd.users: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `login`, `password`, `first_name`, `last_name`, `email`, `birthdate`, `sex`, `country`, `city`, `mobile`, `num_pass`, `avatar`) VALUES
	(1, 'test', 'test', 'Иван', 'Иванов', 'ivan_ov@mail.ru', '1986-01-02', 'Мужской', 'РФ', 'Астрахань', '+7-934-654-34-22', '4612-543365', NULL),
	(2, 'test2', 'test2', 'Ольга', 'Иванова', 'ivan_ova@yandex.ru', '2001-03-13', 'Женский', 'Казахстан', 'Нур-Султан', '+7-916-421-43-43', '4655597', '1506024.jpg'),
	(3, 'test3', '000000', 'Наталья', 'Антонова', 'cherepashka@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'test100', 'test100', 'Абра', 'Кадабра', 'test100@test.ru', '1991-04-01', 'Мужской', 'Лумумбия', 'Гондурас', '+7-123-111-11-11', '201776', NULL),
	(5, 'test6', '666666', 'Артемий', 'Привалов', 'testovii_6@mail.ew', '1989-05-30', 'Мужской', 'Украина', 'Полтава', '+7-923-235-34-34', 'PH154321', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
