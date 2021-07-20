-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `right_answer` tinyint(4) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `question` (`id`, `text`, `answer1`, `answer2`, `answer3`, `answer4`, `right_answer`, `rank`) VALUES
(1,	'Combien de joueurs y a-t-il dans une équipe de football?',	'5',	'7',	'11',	'235',	3,	1),
(2,	'Combien de temps la lumière du soleil met-elle pour nous parvenir?',	'15 secondes',	'8 minutes',	'2 heures',	'3 mois',	2,	2),
(3,	'En 1582, le pape Grégoire XIII a décidé de réformer le calendrier instauré par Jules César. Mais quel était le premier mois du calendrier julien?',	'Janvier',	'Février',	'Mars',	'Avril',	3,	3),
(4,	'Lequel de ces signes du zodiaque n\'est pas un signe d\'Eau?',	'Le Verseau',	'Le Cancer',	'Le Scorpion',	'Les Poissons',	1,	4),
(5,	'Combien de doigts ai-je dans mon dos?',	'2',	'3',	'4',	'5, comme tout le monde',	4,	5);

-- 2021-07-20 13:46:25