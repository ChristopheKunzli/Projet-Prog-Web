-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.9.2-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour leakcode
CREATE DATABASE IF NOT EXISTS `leakcode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `leakcode`;

-- Listage de la structure de la table leakcode. difficulty
CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.difficulty : ~3 rows (environ)
/*!40000 ALTER TABLE `difficulty` DISABLE KEYS */;
INSERT INTO `difficulty` (`id`, `name`) VALUES
	(1, 'easy'),
	(2, 'medium'),
	(3, 'hard');
/*!40000 ALTER TABLE `difficulty` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. example
CREATE TABLE IF NOT EXISTS `example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `example_input` varchar(200) NOT NULL,
  `example_output` varchar(200) NOT NULL,
  `explanation` varchar(500) DEFAULT ' ',
  `image` varbinary(64) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `powershell_input` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `idexample_UNIQUE` (`id`) USING BTREE,
  KEY `fk_example_question1_idx` (`question_id`) USING BTREE,
  CONSTRAINT `fk_example_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.example : ~7 rows (environ)
/*!40000 ALTER TABLE `example` DISABLE KEYS */;
INSERT INTO `example` (`id`, `example_input`, `example_output`, `explanation`, `image`, `question_id`, `powershell_input`) VALUES
	(2, 'n = 2', '2', 'There are two ways to climb to the top.', NULL, 3, 2),
	(3, 'n = 3', '3', 'There are three ways to climb to the top.\r\n1. 1 step + 1 step + 1 step\r\n2. 1 step + 2 steps\r\n3. 2 steps + 1 step', NULL, 3, 3),
	(4, 'n = 4', '5', '', NULL, 3, 4),
	(5, 'n = 45', '1836311903', '', NULL, 3, 45),
	(17, 'no input', 'Hello Word', 'Says Hello Word', NULL, 6, 5),
	(18, 'n = 99', '9', '9+9 =18\r\n1+8 = 9 \r\nand there\'s only one digit so 9', NULL, 9, 99),
	(19, 'n = 165', '3', '1+6+5 = 12\r\n1+2= 3', NULL, 9, 165),
	(20, 'n = 721', '1', ' ', NULL, 9, 721),
	(21, 'n = 123', '3', 'The highest digit is 3', NULL, 8, 123),
	(22, 'n = 991', '9', 'the  highest digit is 9', NULL, 8, 991),
	(23, 'n = 1000', '4', 'there\'s 4 digits', NULL, 7, 1000),
	(24, 'n = 7', '1', 'there\'s 1 digit', NULL, 7, 7),
	(25, '721', '3', ' ', NULL, 7, 721);
/*!40000 ALTER TABLE `example` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. inputs
CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `example_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_example` (`example_id`),
  CONSTRAINT `FK_example` FOREIGN KEY (`example_id`) REFERENCES `example` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table leakcode.inputs : ~5 rows (environ)
/*!40000 ALTER TABLE `inputs` DISABLE KEYS */;
INSERT INTO `inputs` (`id`, `value`, `example_id`) VALUES
	(1, 2, 2),
	(2, 3, 3),
	(3, 4, 4),
	(4, 45, 5),
	(5, 1, 17),
	(6, 99, 18),
	(7, 165, 19),
	(8, 721, 20),
	(9, 123, 21),
	(10, 991, 22),
	(11, 1000, 23),
	(12, 7, 24),
	(13, 721, 25);
/*!40000 ALTER TABLE `inputs` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `constraints` varchar(300) NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `is_accepted` tinyint(2) NOT NULL,
  `Difficulty_id` int(11) NOT NULL,
  `preload` varchar(500) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `idquestions_UNIQUE` (`id`) USING BTREE,
  KEY `fk_question_user1_idx` (`author_user_id`) USING BTREE,
  KEY `fk_question_Difficulty1_idx` (`Difficulty_id`) USING BTREE,
  CONSTRAINT `fk_question_Difficulty1` FOREIGN KEY (`Difficulty_id`) REFERENCES `difficulty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_user1` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.question : ~5 rows (environ)
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `name`, `description`, `constraints`, `author_user_id`, `creation_date`, `is_accepted`, `Difficulty_id`, `preload`) VALUES
	(3, 'Climbing Stairs', 'You are climbing a staircase. It takes n steps to reach the top.\r\nEach time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?', '1 <= n <= 45', 1, '2022-12-05', 1, 2, 'public class Main{\r\npublic static void main(String[] args) {\r\n//dont touch this section\r\nint myvar = "exemple input";\r\n//\r\n}\r\n}'),
	(6, 'Hello Word', 'Try to print the sentence hello word', 'none ', 1, '2023-01-19', 1, 1, 'public class Main{\r\npublic static void main(String[] args) {\r\n//dont touch this section\r\nint myvar = "exemple input";\r\n//\r\n}\r\n}'),
	(7, 'Number Length', 'Find out the number Length', '1<=n<=10000', 2, '2023-01-20', 1, 1, 'public class Main{\r\npublic static void main(String[] args) {\r\n//dont touch this section\r\nint myvar = "exemple input";\r\n//\r\n}\r\n}'),
	(8, 'Find the Highest', 'Find the Highest digit of a given number', '1<=n <=999', 2, '2023-01-20', 1, 2, 'public class Main{\r\npublic static void main(String[] args) {\r\n//dont touch this section\r\nint myvar = "exemple input";\r\n//\r\n}\r\n}'),
	(9, 'Add Digits', 'Given an integer num, repeatedly add all its digits until the result has only one digit, and return it.', '1<=n<=400', 3, '2023-01-20', 1, 3, 'public class Main{\r\npublic static void main(String[] args) {\r\n//dont touch this section\r\nint myvar = "exemple input";\r\n//\r\n}\r\n}');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. rank
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `rank_name_UNIQUE` (`rank_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.rank : ~3 rows (environ)
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` (`id`, `rank_name`) VALUES
	(1, 'beginner'),
	(2, 'experienced'),
	(3, 'pro');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `registration_date` date NOT NULL,
  `rank_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `FK_user_rank` (`rank_id`) USING BTREE,
  CONSTRAINT `FK_user_rank` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.user : ~3 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email_address`, `password`, `registration_date`, `rank_id`) VALUES
	(1, 'chri', 'Christophe.kunzli@cpnv.ch', 'Pa$$w0rd', '2022-11-29', 2),
	(2, 'blo', 'Pablo-Fernando.ZUBIETA-RODRIGUEZ@cpnv.ch', 'Pa$$w0rd', '2022-11-28', 3),
	(3, 'jcl', 'Jean.Claude@cpnv.ch', 'jcl', '2022-12-06', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. user_anwers_example
CREATE TABLE IF NOT EXISTS `user_anwers_example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_anwers_question_id` int(11) NOT NULL DEFAULT 0,
  `example_id` int(11) NOT NULL DEFAULT 0,
  `error` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `output` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user_anwers_question` (`user_anwers_question_id`),
  KEY `FK__example` (`example_id`),
  CONSTRAINT `FK__example` FOREIGN KEY (`example_id`) REFERENCES `example` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__user_anwers_question` FOREIGN KEY (`user_anwers_question_id`) REFERENCES `user_anwers_question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table leakcode.user_anwers_example : ~0 rows (environ)
/*!40000 ALTER TABLE `user_anwers_example` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_anwers_example` ENABLE KEYS */;

-- Listage de la structure de la table leakcode. user_anwers_question
CREATE TABLE IF NOT EXISTS `user_anwers_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `code` varchar(2000) NOT NULL,
  `answer_date` date NOT NULL,
  `succeed` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_user_has_question_question1_idx` (`question_id`) USING BTREE,
  KEY `fk_user_has_question_user1_idx` (`user_id`) USING BTREE,
  CONSTRAINT `fk_user_has_question_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_question_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.user_anwers_question : ~0 rows (environ)
/*!40000 ALTER TABLE `user_anwers_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_anwers_question` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
