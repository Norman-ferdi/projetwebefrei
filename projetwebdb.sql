-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 juil. 2020 à 12:26
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetwebdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `sexe`, `type`) VALUES
(1, 'ferdinand.norman@hotmail.fr', 'admin', 'admin', 'H', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `administrer`
--

DROP TABLE IF EXISTS `administrer`;
CREATE TABLE IF NOT EXISTS `administrer` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_admin`),
  KEY `administrer_admin0_FK` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `username`, `password`, `sexe`, `type`) VALUES
(1, 'ferdinand.norman@hotmail.fr', 'client', 'client', 'F', 'C'),
(2, 'ferdinand.nono@hotmail.fr', 'jerome', 'jerome', 'H', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `gerer`
--

DROP TABLE IF EXISTS `gerer`;
CREATE TABLE IF NOT EXISTS `gerer` (
  `id` int(11) NOT NULL,
  `id_techniciens` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_techniciens`),
  KEY `gerer_techniciens0_FK` (`id_techniciens`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `intitule`) VALUES
(1, 'upgrade');

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

DROP TABLE IF EXISTS `techniciens`;
CREATE TABLE IF NOT EXISTS `techniciens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `email`, `username`, `password`, `sexe`, `type`) VALUES
(1, 'ferdinand.norman@hotmail.fr', 'tech', 'tech', 'F', 'T');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreation` date NOT NULL,
  `criticite` varchar(255) NOT NULL,
  `referent` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `id_projets` int(11) NOT NULL,
  `id_techniciens` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_projets_FK` (`id_projets`),
  KEY `tickets_techniciens0_FK` (`id_techniciens`),
  KEY `tickets_clients1_FK` (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `dateCreation`, `criticite`, `referent`, `client`, `objet`, `description`, `etat`, `id_projets`, `id_techniciens`, `id_clients`) VALUES
(1, '2020-05-06', 'critique', 'tech', '', 'droit', 'papappaap', 'ouvert', 1, 1, 1),
(2, '2020-05-06', 'moyenne', 'tech', '', 'droit', 'salut', 'ouvert', 1, 1, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrer`
--
ALTER TABLE `administrer`
  ADD CONSTRAINT `administrer_admin0_FK` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `administrer_techniciens_FK` FOREIGN KEY (`id`) REFERENCES `techniciens` (`id`);

--
-- Contraintes pour la table `gerer`
--
ALTER TABLE `gerer`
  ADD CONSTRAINT `gerer_clients_FK` FOREIGN KEY (`id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `gerer_techniciens0_FK` FOREIGN KEY (`id_techniciens`) REFERENCES `techniciens` (`id`);

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_clients1_FK` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `tickets_projets_FK` FOREIGN KEY (`id_projets`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `tickets_techniciens0_FK` FOREIGN KEY (`id_techniciens`) REFERENCES `techniciens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
