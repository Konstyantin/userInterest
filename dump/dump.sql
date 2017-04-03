-- --------------------------------------------------------
-- Хост:                         dcodeit.net
-- Версия сервера:               10.1.21-MariaDB - MariaDB Server
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных kostya.nagula
CREATE DATABASE IF NOT EXISTS `kostya.nagula` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kostya.nagula`;

-- Дамп структуры для таблица kostya.nagula.interest
CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kostya.nagula.interest: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` (`id`, `name`) VALUES
	(1, 'football'),
	(2, 'hokey'),
	(3, 'chess'),
	(4, 'paint'),
	(5, 'swim'),
	(6, 'driving'),
	(7, 'running'),
	(8, 'asd'),
	(9, 'f1');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;

-- Дамп структуры для таблица kostya.nagula.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(45) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kostya.nagula.post: ~74 rows (приблизительно)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `content`, `author`, `created_at`) VALUES
	(30, 'test', 'new content for update post', 'author', 1489760686),
	(31, 'new title for update  post', 'new content for update post', 'author', 1489761133),
	(33, 'update title', 'update content', 'author', 1490019426),
	(34, 'test title', 'new content for update post', 'author', 1490020443),
	(35, 'test title', 'new content for update post', 'author', 1490020571),
	(36, 'test title', 'new content for update post', 'author', 1490020611),
	(37, 'test title', 'new content for update post', 'author', 1490020692),
	(38, 'test title', 'new content for update post', 'author', 1490021636),
	(39, 'test titlassadasde', 'new content for update posasdasdasdt', '1', 1490027518),
	(40, 'content title', 'post contant', '1', 1490028210),
	(41, 'content title', 'post contant', '1', 1490028265),
	(42, 'content title', 'post contant', '1', 1490028326),
	(43, 'content title', 'post contant', '1', 1490028347),
	(44, 'content title', 'post contant', '1', 1490028460),
	(45, 'new title for update  post', 'new content for update post', '1', 1490028754),
	(46, 'new title for update  post', 'new content for update post', '1', 1490028994),
	(47, 'new title for update  post', 'new content for update post', '1', 1490081170),
	(49, 'update title', 'update content', '1', 1490081628),
	(50, 'update title', 'update content', '1', 1490087612),
	(51, 'curl title update', 'curl content update', '1', 1490089739),
	(52, 'update title', 'update content', '1', 1490090641),
	(53, 'curl title update', 'curl content update', '1', 1490090662),
	(55, 'curl test title', 'curl test content', '1', 1490098424),
	(60, 'curl testasdasd title', 'curl testasdsa content', '1', 1490099862),
	(61, 'curl testasdasd title', 'curl testasdsa content', '1', 1490099868),
	(62, 'curl testasdasd title', 'curl testasdsa content', '1', 1490099967),
	(63, 'curl testasdasd title', 'curl testasdsa content', '1', 1490099968),
	(64, 'curl testasdasd title', 'curl testasdsa content', '1', 1490100014),
	(65, 'curl update title', 'curl update content', '1', 1490100015),
	(67, 'curl update title', 'curl update content', '1', 1490110745),
	(68, 'curl update title', 'curl update content', '1', 1490111083),
	(69, 'update title', 'update content', '1', 1490172533),
	(70, 'update title', 'update content', '1', 1490172556),
	(71, 'update title', 'update content', '1', 1490172578),
	(72, 'update title', 'update content', '1', 1490172816),
	(73, 'update title', 'update content', '1', 1490173272),
	(74, 'curl title', 'curl content', '1', 1490173403),
	(75, 'curl update title', 'curl update content', '1', 1490173421),
	(76, 'curl update title', 'curl update content', '1', 1490175284),
	(77, 'curl title', 'curl content', '1', 1490175376),
	(78, 'curl update title', 'curl update content', '1', 1490176564),
	(79, 'curl update title', 'curl update content', '1', 1490176570),
	(80, 'curl update title', 'curl update content', '1', 1490180875),
	(81, 'curl update title', 'curl update content', '1', 1490180875),
	(82, 'curl update title', 'curl update content', '1', 1490180889),
	(83, 'curl update title', 'curl update content', '1', 1490180889),
	(84, 'curl update title', 'curl update content', '1', 1490180896),
	(85, 'curl update title', 'curl update content', '1', 1490180896),
	(86, 'curl update title', 'curl update content', '1', 1490180901),
	(87, 'curl update title', 'curl update content', '1', 1490180901),
	(88, 'curl update title', 'curl update content', '1', 1490180909),
	(89, 'curl update title', 'curl update content', '1', 1490180909),
	(90, 'curl update title', 'curl update content', '1', 1490180986),
	(91, 'curl update title', 'curl update content', '1', 1490180986),
	(92, 'curl update title', 'curl update content', '1', 1490180993),
	(93, 'curl update title', 'curl update content', '1', 1490180993),
	(95, 'update title', 'update content', '1', 1490181081),
	(96, 'curl update title', 'curl update content', '1', 1490181139),
	(97, 'curl update title', 'curl update content', '1', 1490181618),
	(98, 'curl update title', 'curl update content', '1', 1490181631),
	(100, 'update title', 'update content', '1', 1490266976),
	(102, 'update title test update', 'update content', '1', 1490268726),
	(104, 'curl update title', 'curl update content', '1', 1490270957),
	(105, 'curl update title', 'curl update content', '1', 1490270975),
	(106, 'update title test updaasdte', 'update contadsent', '1', 1490271460),
	(108, 'curl update title', 'curl update content', '1', 1490271533),
	(109, 'curl update title', 'curl update content', '1', 1490271546),
	(110, 'curl update title', 'curl update content', '1', 1490271553),
	(111, 'curl update title', 'curl update content', '1', 1490271558),
	(112, 'curl update title', 'curl update content', '1', 1490271599),
	(113, 'update title test updaasdte', 'update contadsent', '1', 1490271605),
	(115, 'update title test updaasdte', 'update contadsent', '1', 1490276535),
	(116, 'update title test updaasdte', 'update contadsent', '1', 1490276542),
	(117, 'update title test updaasdte', 'update contadsent', '1', 1490278101),
	(118, 'update title test updaasdte', 'update contadsent', '1', 1490626869),
	(119, 'update title test updaasdte', 'update contadsent', '1', 1490627171),
	(120, 'curl update title', 'curl update content', '1', 1490627816),
	(121, 'curl update title', 'curl update content', '1', 1490627840),
	(122, 'curl update title', 'curl update content', '1', 1490627846),
	(123, 'curl update title', 'curl update content', '1', 1490627853);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Дамп структуры для таблица kostya.nagula.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kostya.nagula.user: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `age`, `created_at`) VALUES
	(1, 'kostya', 'nagula', 'kostya@mail', 21, 1490968930),
	(2, 'jenya', 'borovoy', 'jenya@mail', 23, 1490969604),
	(4, 'ivan', 'ivanov', 'ivan@mail', 23, 1490968930),
	(5, 'vasya', 'vasiliev', 'vasya@mail', 22, 1491214650),
	(7, 'roman', 'kovalenko', 'roman@mail', 23, 1491216612),
	(8, 'roman', 'kovalenko', 'roman@mail', 23, 1491216688),
	(9, 'roman', 'kovalenko', 'roman@mail', 23, 1491217128),
	(10, 'test', 'test', 'test@mail', 22, 1491217791),
	(11, 'asd', 'asd', 'ads', 23, 1491217832),
	(12, 'vasya', 'pupkin', 'pupkin@mail.asd', 22, 1491219425),
	(13, 'sergey', 'sergey', 'sergey@mail.ua', 18, 1491220408),
	(16, 'roman', 'nagula', 'roman@mail', 25, 1491225120),
	(17, 'kolya', 'plaschenko', 'kolya@mail', 25, 1491225698),
	(18, 'petya', 'patrov', 'petrov@Gmail.com', 17, 1491232110);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Дамп структуры для таблица kostya.nagula.user_interest
CREATE TABLE IF NOT EXISTS `user_interest` (
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  KEY `interest_id` (`interest_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kostya.nagula.user_interest: ~20 rows (приблизительно)
/*!40000 ALTER TABLE `user_interest` DISABLE KEYS */;
INSERT INTO `user_interest` (`user_id`, `interest_id`) VALUES
	(1, 1),
	(1, 3),
	(2, 2),
	(2, 3),
	(1, 5),
	(8, 2),
	(9, 2),
	(10, 2),
	(1, 4),
	(1, 6),
	(12, 1),
	(12, 5),
	(13, 1),
	(13, 5),
	(16, 1),
	(16, 4),
	(17, 1),
	(17, 7),
	(18, 1),
	(18, 4);
/*!40000 ALTER TABLE `user_interest` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
