-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 juin 2023 à 10:35
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

-- --------------------------------------------------------

--
-- Structure de la table `cho-choice`
--

DROP TABLE IF EXISTS `cho-choice`;
CREATE TABLE IF NOT EXISTS `cho-choice` (
  `cho_id` int NOT NULL AUTO_INCREMENT,
  `cho_label` varchar(100) NOT NULL,
  `cho_goodanswer` tinyint(1) NOT NULL,
  `que_id` int NOT NULL,
  PRIMARY KEY (`cho_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `rol_id` int NOT NULL,
  PRIMARY KEY (`usr_id`),
  KEY `role_id` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usr_user`
--

INSERT INTO `usr_user` (`usr_id`, `usr_pseudo`, `usr_email`, `usr_password`, `rol_id`) VALUES
(1, 'alex', 'alex@gmail.com', 'a', 1),
(3, 'zaki', 'zaki@gmail.com', 'a', 2);

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
