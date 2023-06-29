-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 juin 2023 à 08:28
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ipssi_quizzeo`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `usrAddScore`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `usrAddScore` (IN `i_usr_id` INT, IN `i_qui_id` INT, IN `i_usr_qui_score` INT)   begin 

    DECLARE  nbr INT;
 
    iNSERT INTO usr_qui(usr_id,qui_id,usr_qui_score)
    VALUES (i_usr_id,i_qui_id, i_usr_qui_score);

   

 
    
   
    if  (   select   count(*)   from  usr_qui where usr_id = i_usr_id ) >  10  then 
    
        update 
        	usr_user 
        set 
        	rol_id = 2
        where 
        	usr_id = i_usr_id 
        and 
           	rol_id = 1 ;
    END   IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `cho_choice`
--

DROP TABLE IF EXISTS `cho_choice`;
CREATE TABLE IF NOT EXISTS `cho_choice` (
  `cho_id` int NOT NULL AUTO_INCREMENT,
  `cho_label` varchar(100) NOT NULL,
  `cho_goodanswer` tinyint(1) NOT NULL,
  `que_id` int NOT NULL,
  PRIMARY KEY (`cho_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cho_choice`
--

INSERT INTO `cho_choice` (`cho_id`, `cho_label`, `cho_goodanswer`, `que_id`) VALUES
(1, '1 ballon d \'or', 0, 1),
(2, '7 ballon d \'or', 1, 1),
(3, '99 ballon d \'or', 0, 1),
(4, 'bresil', 0, 2),
(5, 'argentine ', 1, 2),
(6, 'France ', 0, 2),
(7, 'paris', 0, 3),
(8, 'real madrid ', 0, 3),
(9, 'manchester city', 1, 3),
(10, '100 ans', 0, 4),
(11, '116 ans', 1, 4),
(12, '99 ans', 0, 4),
(13, '10 ans', 0, 5),
(14, '8 ans', 0, 5),
(15, '6 ans', 1, 5),
(16, 'charle I stuart', 1, 6),
(17, 'louis XVI', 0, 6),
(18, 'Charles X', 0, 6),
(19, 'jul', 1, 7),
(20, 'naps ', 0, 7),
(21, 'iam', 0, 7),
(22, 'celine dion', 1, 8),
(23, 'leonardo di caprio ', 0, 8),
(24, 'beyonce', 0, 8),
(25, 'doc gyneco', 0, 9),
(26, 'snoop dogg', 0, 9),
(27, 'Mickael jackson', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `que_question`
--

DROP TABLE IF EXISTS `que_question`;
CREATE TABLE IF NOT EXISTS `que_question` (
  `que_id` int NOT NULL AUTO_INCREMENT,
  `que_label` varchar(100) NOT NULL,
  `que_difficulte` int NOT NULL,
  `que_datecreation` date NOT NULL,
  `qui_id` int NOT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `que_question`
--

INSERT INTO `que_question` (`que_id`, `que_label`, `que_difficulte`, `que_datecreation`, `qui_id`) VALUES
(1, 'combien de ballon d\'or a messi?', 1, '2023-06-27', 1),
(2, 'qui a gagné la dernière coupe du monde ?', 1, '2023-06-27', 1),
(3, 'qui a gagné la ligue des champions cette année?', 1, '2023-06-28', 1),
(4, 'combien de temps  dur la guerre de 100 ans?', 2, '2023-06-28', 2),
(5, 'combien de temps dur la seconde guerre mondial?', 1, '2023-06-28', 2),
(6, 'qui fut le premier roi exécuté en Europe?  ', 3, '2023-06-28', 2),
(7, 'qui est le rappeur le plus connu de marseille?', 1, '2023-06-28', 3),
(8, 'qui interprète Titanic ?', 1, '2023-06-28', 3),
(9, 'qui est le roi de la pop ?', 1, '2023-06-28', 3);

-- --------------------------------------------------------

--
-- Structure de la table `qui_quizz`
--

DROP TABLE IF EXISTS `qui_quizz`;
CREATE TABLE IF NOT EXISTS `qui_quizz` (
  `qui_id` int NOT NULL AUTO_INCREMENT,
  `qui_title` varchar(50) NOT NULL,
  `qui_difficulte` int NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`qui_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qui_quizz`
--

INSERT INTO `qui_quizz` (`qui_id`, `qui_title`, `qui_difficulte`, `date_creation`) VALUES
(1, 'Sport', 2, '2023-06-27'),
(2, 'histoire', 2, '2023-06-27'),
(3, 'musique', 2, '2023-06-27');

-- --------------------------------------------------------

--
-- Structure de la table `rol_role`
--

DROP TABLE IF EXISTS `rol_role`;
CREATE TABLE IF NOT EXISTS `rol_role` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(50) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rol_role`
--

INSERT INTO `rol_role` (`rol_id`, `rol_name`) VALUES
(1, 'Utilisateur'),
(2, 'Quizzeur'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `usr_qui`
--

DROP TABLE IF EXISTS `usr_qui`;
CREATE TABLE IF NOT EXISTS `usr_qui` (
  `usr_id` int NOT NULL,
  `qui_id` int NOT NULL,
  `usr_qui_score` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usr_qui`
--

INSERT INTO `usr_qui` (`usr_id`, `qui_id`, `usr_qui_score`) VALUES
(1, 1, 10),
(1, 1, 10),
(1, 1, 30),
(1, 2, 15),
(1, 3, 34),
(1, 2, 34),
(1, 2, 24),
(1, 1, 145),
(1, 3, 13),
(1, 1, 145),
(1, 1, 30),
(1, 2, 5),
(1, 1, 10),
(1, 2, 12),
(0, 0, 30),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(0, 0, 0),
(1, 1, 11),
(0, 0, 0),
(0, 0, 0),
(1, 1, 11),
(1, 1, 15656),
(1, 1, 11),
(1, 1, 123445566);

-- --------------------------------------------------------

--
-- Structure de la table `usr_user`
--

DROP TABLE IF EXISTS `usr_user`;
CREATE TABLE IF NOT EXISTS `usr_user` (
  `usr_id` int NOT NULL AUTO_INCREMENT,
  `usr_pseudo` varchar(50) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_password` varchar(100) NOT NULL,
  `rol_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`usr_id`),
  KEY `role_id` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usr_user`
--

INSERT INTO `usr_user` (`usr_id`, `usr_pseudo`, `usr_email`, `usr_password`, `rol_id`) VALUES
(1, 'alex', 'alex@gmail.com', 'a', 2),
(3, 'zaki', 'zaki@gmail.com', 'a', 2),
(23, '$username', '$email', '$password', 1),
(24, 'zeedfeferoot', 'zegfzefzegezg@zefezf', 'ouizef', 1),
(25, 'rootzeczedf', 'dqrfjbpiubfpiubuq@ehfbezifuez', 'ouizefezfez', 1),
(26, 'usertest', 'usertest@test', 'usertest', 1),
(27, 'solal', 'soloal@gmail', 'solo', 1),
(28, 'zakaria', 'zakaria@refvre', 'zakaria', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `usr_user`
--
ALTER TABLE `usr_user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`rol_id`) REFERENCES `rol_role` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
