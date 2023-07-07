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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qui_quizz`
--
ALTER TABLE `qui_quizz`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`usr_id`) REFERENCES `usr_user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
