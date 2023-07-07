-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 juil. 2023 à 22:09
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
DROP PROCEDURE IF EXISTS `addquizz`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addquizz` (IN `i_titre` VARCHAR(50), IN `i_difficulte` INT, IN `i_NameQuestion` VARCHAR(50), IN `i_Namereponse1` VARCHAR(50), IN `i_Namereponse2` VARCHAR(50), IN `i_Namereponse3` VARCHAR(50))   BEGIN 
 DECLARE last_id_in_quizz INT ;
 DECLARE last_id_in_question   int ;
 INSERT INTO `qui_quizz` ( `usr_id`, `qui_title`, `qui_difficulte`, `date_creation`) 
                 VALUES ( '1', i_titre, i_difficulte,CURRENT_DATE() ) ;


SET last_id_in_quizz = LAST_INSERT_ID();
                         
  INSERT INTO `que_question` (  `que_label`, `que_difficulte`, `que_datecreation`, `qui_id`) 
     VALUES (i_NameQuestion, i_difficulte,CURRENT_DATE() ,  last_id_in_quizz);

                         
SET last_id_in_question = LAST_INSERT_ID();       


INSERT INTO `cho_choice` (  `cho_label`, `que_id`, `cho_goodanswer`)
VALUES ( i_Namereponse1,last_id_in_question , 1);
     
INSERT INTO `cho_choice` (  `cho_label`, `que_id`, `cho_goodanswer`)
VALUES ( i_Namereponse2,last_id_in_question , 0 );

INSERT INTO `cho_choice` (  `cho_label`, `que_id`, `cho_goodanswer`)
VALUES ( i_Namereponse3,last_id_in_question , 0 );

end$$

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
  `que_id` int NOT NULL,
  `cho_goodanswer` tinyint(1) NOT NULL,
  PRIMARY KEY (`cho_id`),
  KEY `que_id` (`que_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cho_choice`
--

INSERT INTO `cho_choice` (`cho_id`, `cho_label`, `que_id`, `cho_goodanswer`) VALUES
(1, '1 ballon d \'or', 1, 0),
(2, '7 ballon d \'or', 1, 1),
(3, '99 ballon d \'or', 1, 0),
(4, 'bresil', 2, 0),
(5, 'argentine ', 2, 1),
(6, 'France ', 2, 0),
(7, 'paris', 3, 0),
(8, 'real madrid ', 3, 0),
(9, 'manchester city', 3, 1),
(10, '100 ans', 4, 0),
(11, '116 ans', 4, 1),
(12, '99 ans', 4, 0),
(13, '10 ans', 5, 0),
(14, '8 ans', 5, 0),
(15, '6 ans', 5, 1),
(16, 'charle I stuart', 6, 1),
(17, 'louis XVI', 6, 0),
(18, 'Charles X', 6, 0),
(210, 'dfberd', 42, 1),
(211, ' sezdvez', 42, 0),
(212, ' sevez', 42, 0),
(213, 'sdvezv', 43, 1),
(214, ' zesf', 43, 0),
(215, ' xsdv', 43, 0);

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
  PRIMARY KEY (`que_id`),
  KEY `qui_id` (`qui_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(42, 'zervgrev', 1, '2023-07-07', 34),
(43, 'sdves', 2, '2023-07-07', 35);

-- --------------------------------------------------------

--
-- Structure de la table `qui_quizz`
--

DROP TABLE IF EXISTS `qui_quizz`;
CREATE TABLE IF NOT EXISTS `qui_quizz` (
  `qui_id` int NOT NULL AUTO_INCREMENT,
  `usr_id` int DEFAULT NULL,
  `qui_title` varchar(50) NOT NULL,
  `qui_difficulte` int NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`qui_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qui_quizz`
--

INSERT INTO `qui_quizz` (`qui_id`, `usr_id`, `qui_title`, `qui_difficulte`, `date_creation`) VALUES
(1, NULL, 'Sport', 2, '2023-06-27'),
(2, NULL, 'histoire', 2, '2023-06-27'),
(3, 29, 'histoire', 2, '2023-06-27'),
(34, 1, 'ergerger', 1, '2023-07-07'),
(35, 1, 'erberr', 2, '2023-07-07');

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
  `id_score` int NOT NULL AUTO_INCREMENT,
  `usr_id` int NOT NULL,
  `qui_id` int NOT NULL,
  `usr_qui_score` int NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `usr_id` (`usr_id`,`qui_id`),
  KEY `usr_qui_ibfk_22` (`qui_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usr_qui`
--

INSERT INTO `usr_qui` (`id_score`, `usr_id`, `qui_id`, `usr_qui_score`) VALUES
(49, 1, 2, 300),
(50, 29, 1, 300),
(51, 29, 1, 0),
(52, 1, 1, 0),
(53, 1, 1, 0),
(54, 1, 1, 0),
(55, 1, 1, 0),
(56, 1, 1, 2),
(57, 1, 1, 2),
(58, 1, 1, 2),
(59, 1, 2, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usr_user`
--

INSERT INTO `usr_user` (`usr_id`, `usr_pseudo`, `usr_email`, `usr_password`, `rol_id`) VALUES
(1, 'alex', 'millon.alex@gmail', 'a', 3),
(29, 'zaki', 'zaki.mela@gmail.com', 'z', 2),
(30, 'mathis', 'test@test', 'm', 2),
(31, 'nico', 'nic@dfgsdegs', 'n', 1),
(32, 'wili', 'wili@jgedj', 'w', 1),
(33, 'babacar', 'test@test', 'b', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cho_choice`
--
ALTER TABLE `cho_choice`
  ADD CONSTRAINT `cho_choice_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `que_question` (`que_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `que_question`
--
ALTER TABLE `que_question`
  ADD CONSTRAINT `que_question_ibfk_1` FOREIGN KEY (`qui_id`) REFERENCES `qui_quizz` (`qui_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `qui_quizz`
--
ALTER TABLE `qui_quizz`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`usr_id`) REFERENCES `usr_user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `usr_qui`
--
ALTER TABLE `usr_qui`
  ADD CONSTRAINT `usr_qui_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `usr_user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_qui_ibfk_22` FOREIGN KEY (`qui_id`) REFERENCES `qui_quizz` (`qui_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `usr_user`
--
ALTER TABLE `usr_user`
  ADD CONSTRAINT `usr_user_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol_role` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
