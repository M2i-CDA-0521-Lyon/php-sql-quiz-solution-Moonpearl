-- Adminer 4.7.7 MySQL dump

DROP DATABASE IF EXISTS `quiz`;
CREATE DATABASE `quiz`;
USE `quiz`;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `answer` (`id`, `text`, `question_id`) VALUES
(2,	'5',	1),
(3,	'7',	1),
(4,	'11',	1),
(5,	'235',	1),
(6,	'15 secondes',	2),
(7,	'8 minutes',	2),
(8,	'2 heures',	2),
(9,	'3 mois',	2),
(10,	'Janvier',	3),
(11,	'Février',	3),
(12,	'Mars',	3),
(13,	'Avril',	3),
(14,	'Le Verseau',	4),
(15,	'Le Cancer',	4),
(16,	'Le Scorpion',	4),
(17,	'Les Poissons',	4),
(18,	'2',	5),
(19,	'3',	5),
(20,	'4',	5),
(21,	'5, comme tout le monde',	5);

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `right_answer_id` int(10) unsigned DEFAULT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rank` (`rank`),
  KEY `right_answer_id` (`right_answer_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`right_answer_id`) REFERENCES `answer` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `question` (`id`, `text`, `right_answer_id`, `rank`) VALUES
(1,	'Combien de joueurs y a-t-il dans une équipe de football?',	4,	1),
(2,	'Combien de temps la lumière du soleil met-elle pour nous parvenir?',	7,	2),
(3,	'En 1582, le pape Grégoire XIII a décidé de réformer le calendrier instauré par Jules César. Mais quel était le premier mois du calendrier julien?',	12,	3),
(4,	'Lequel de ces signes du zodiaque n\'est pas un signe d\'Eau?',	14,	4),
(5,	'Combien de doigts ai-je dans mon dos?',	21,	5);

ALTER TABLE `answer`
ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE

-- 2021-07-21 08:41:47
