-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.9.2-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6541
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour leakcode
CREATE DATABASE IF NOT EXISTS `leakcode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `leakcode`;

-- Listage de la structure de table leakcode. difficulty
CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.difficulty : ~3 rows (environ)
INSERT INTO `difficulty` (`id`, `name`) VALUES
	(1, 'easy'),
	(2, 'medium'),
	(3, 'hard');

-- Listage de la structure de table leakcode. example
CREATE TABLE IF NOT EXISTS `example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `example_input` varchar(200) NOT NULL,
  `example_output` varchar(200) NOT NULL,
  `explanation` varchar(500) DEFAULT NULL,
  `image` varbinary(64) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `idexample_UNIQUE` (`id`) USING BTREE,
  KEY `fk_example_question1_idx` (`question_id`) USING BTREE,
  CONSTRAINT `fk_example_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.example : ~15 rows (environ)
INSERT INTO `example` (`id`, `example_input`, `example_output`, `explanation`, `image`, `question_id`) VALUES
	(2, 'n = 2', '2', 'There are two ways to climb to the top.', NULL, 3),
	(3, 'n = 3', '3', 'There are three ways to climb to the top.\r\n1. 1 step + 1 step + 1 step\r\n2. 1 step + 2 steps\r\n3. 2 steps + 1 step', NULL, 3),
	(4, 'n = 4', '5', '', NULL, 3),
	(5, 'n = 45', '1836311903', '', NULL, 3),
	(6, 'num1 = "2", num2 = "3"', '"6"', '', NULL, 4),
	(7, 'num1 = "123", num2 = "456"', '"56088"', '', NULL, 4),
	(8, 'head = [3,2,0,-4]', 'true', 'There is a cycle in the linked list, where the tail connects to the 1st node (0-indexed).', NULL, 1),
	(9, 'head = [1,2], pos = 0', 'true', 'There is a cycle in the linked list, where the tail connects to the 0th node.', NULL, 1),
	(10, 'head = [1], pos = -1', 'false', 'There is no cycle in the linked list.', NULL, 1),
	(11, ' [[1,4,5],[1,3,4],[2,6]]', '[1,1,2,3,4,4,5,6]', '', NULL, 5),
	(12, ' []', '[]', '', NULL, 5),
	(13, '[[]]', '[]', '', NULL, 5),
	(14, 's = "aa", p = "a"', 'false', '"a" does not match the entire string "aa".', NULL, 2),
	(15, 's = "aa", p = "a*"', 'true', '"*" means zero or more of the preceding element, "a". Therefore, by repeating "a" once, it becomes "aa".', NULL, 2),
	(16, 's = "ab", p = ".*"', 'true', '".*" means "zero or more (*) of any character (.)".', NULL, 2);

-- Listage de la structure de table leakcode. inputs
CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `example_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_example` (`example_id`),
  CONSTRAINT `FK_example` FOREIGN KEY (`example_id`) REFERENCES `example` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table leakcode.inputs : ~4 rows (environ)
INSERT INTO `inputs` (`id`, `value`, `example_id`) VALUES
	(1, 2, 2),
	(2, 3, 3),
	(3, 4, 4),
	(4, 45, 5);

-- Listage de la structure de table leakcode. question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `constraints` varchar(300) NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `is_accepted` tinyint(2) NOT NULL,
  `Difficulty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `idquestions_UNIQUE` (`id`) USING BTREE,
  KEY `fk_question_user1_idx` (`author_user_id`) USING BTREE,
  KEY `fk_question_Difficulty1_idx` (`Difficulty_id`) USING BTREE,
  CONSTRAINT `fk_question_Difficulty1` FOREIGN KEY (`Difficulty_id`) REFERENCES `difficulty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_user1` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.question : ~5 rows (environ)
INSERT INTO `question` (`id`, `name`, `description`, `constraints`, `author_user_id`, `creation_date`, `is_accepted`, `Difficulty_id`) VALUES
	(1, 'Linked List Cycle', 'Given head, the head of a linked list, determine if the linked list has a cycle in it.\r\nThere is a cycle in a linked list if there is some node in the list that can be reached again by continuously following the next pointer. Internally, pos is used to denote the index of the node that tail\'s next pointer is connected to. Note that pos is not passed as a parameter.\r\nReturn true if there is a cycle in the linked list. Otherwise, return false.', 'The number of the nodes in the list is in the range [0, 104].\r\n-105 <= Node.val <= 105\r\npos is -1 or a valid index in the linked-list.', 1, '2022-11-29', 0, 1),
	(2, 'Regular Expression Matching', 'Given an input string s and a pattern p, implement regular expression matching with support for \'.\' and \'*\' where:\r\n\'.\' Matches any single character.​​​​\r\n\'*\' Matches zero or more of the preceding element.\r\nThe matching should cover the entire input string (not partial).', '1 <= s.length <= 20\r\n1 <= p.length <= 30\r\ns contains only lowercase English letters.\r\np contains only lowercase English letters, \'.\', and \'*\'.\r\nIt is guaranteed for each appearance of the character \'*\', there will be a previous valid character to match.', 2, '2022-11-30', 0, 3),
	(3, 'Climbing Stairs', 'You are climbing a staircase. It takes n steps to reach the top.\r\nEach time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?', '1 <= n <= 45', 1, '2022-12-05', 1, 1),
	(4, 'Multiply Strings', 'Given two integers num1 and num2 represented as strings, return the product of num1 and num2, also represented as a string.', '1 <= num1.length, num2.length <= 200,\r\nnum1 and num2 consist of digits only.\r\nBoth num1 and num2 do not contain any leading zero except the number 0 itself.', 3, '2022-12-06', 0, 2),
	(5, 'Merge k Sorted Lists', 'You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.', 'k == lists.length\r\n0 <= k <= 104\r\n0 <= lists[i].length <= 500\r\n-104 <= lists[i][j] <= 104\r\nlists[i] is sorted in ascending order.\r\nThe sum of lists[i].length will not exceed 104.', 1, '2022-12-06', 0, 3);

-- Listage de la structure de table leakcode. rank
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `rank_name_UNIQUE` (`rank_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.rank : ~3 rows (environ)
INSERT INTO `rank` (`id`, `rank_name`) VALUES
	(1, 'beginner'),
	(2, 'experienced'),
	(3, 'pro');

-- Listage de la structure de table leakcode. user
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.user : ~3 rows (environ)
INSERT INTO `user` (`id`, `username`, `email_address`, `password`, `registration_date`, `rank_id`) VALUES
	(1, 'chri', 'Christophe.kunzli@cpnv.ch', 'Pa$$w0rd', '2022-11-29', 2),
	(2, 'blo', 'Pablo-Fernando.ZUBIETA-RODRIGUEZ@cpnv.ch', 'Pa$$w0rd', '2022-11-28', 3),
	(3, 'jcl', 'Jean.Claude@cpnv.ch', 'jcl', '2022-12-06', 1);

-- Listage de la structure de table leakcode. user_anwers_question
CREATE TABLE IF NOT EXISTS `user_anwers_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `answer_date` date NOT NULL,
  `succeed` tinyint(4) DEFAULT 0,
  `error_message` varchar(600) DEFAULT NULL,
  `program_output` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_user_has_question_question1_idx` (`question_id`) USING BTREE,
  KEY `fk_user_has_question_user1_idx` (`user_id`) USING BTREE,
  CONSTRAINT `fk_user_has_question_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_question_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table leakcode.user_anwers_question : ~7 rows (environ)
INSERT INTO `user_anwers_question` (`id`, `user_id`, `question_id`, `code`, `answer_date`, `succeed`, `error_message`, `program_output`) VALUES
	(1, 1, 1, 'public class Main{public static void main(String[] args) {System.out.println("Hello, World!"); }}', '2022-11-29', 1, '', 'Hello, World!'),
	(21, 2, 1, 'hfhghmgh', '2022-12-21', 0, NULL, NULL),
	(22, 2, 1, 'public class Main{public static void main(String[] args) {System.out.println("Hello, World!"); }}', '2022-12-21', 0, NULL, NULL),
	(23, 2, 1, '$_POST', '2022-12-21', 0, NULL, NULL),
	(24, 2, 1, '$_POST', '2022-12-21', 0, NULL, NULL),
	(25, 2, 1, '$_POST', '2022-12-21', 0, NULL, NULL),
	(26, 2, 1, '$_POST', '2022-12-21', 0, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

CREATE USER admin_leakcode@localhost IDENTIFIED BY 'Pa$$w0rd';
GRANT ALL PRIVILEGES ON leakcode.* TO admin_leakcode@localhost;