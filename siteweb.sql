-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 mars 2024 à 01:34
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `userAdmin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `userAdmin`, `password`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Structure de la table `scpi`
--

DROP TABLE IF EXISTS `scpi`;
CREATE TABLE IF NOT EXISTS `scpi` (
  `idScpi` int NOT NULL AUTO_INCREMENT,
  `idSdg` int DEFAULT NULL,
  `nomScpi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datecScpi` date NOT NULL,
  `prixpartScpi` int NOT NULL,
  PRIMARY KEY (`idScpi`),
  KEY `Etrangère` (`idSdg`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `scpi`
--

INSERT INTO `scpi` (`idScpi`, `idSdg`, `nomScpi`, `datecScpi`, `prixpartScpi`) VALUES
(1, 3, 'SCPI Activi', '2019-06-24', 610),
(2, NULL, 'ATREAM', '2016-02-20', 1000),
(3, NULL, 'Eurion', '2020-01-21', 215),
(4, NULL, 'Origin', '2012-02-28', 1135),
(5, NULL, 'Iroko Zen', '2010-10-29', 200),
(6, NULL, 'SCPI Pierre', '2018-04-11', 331),
(7, NULL, 'Pierval', '2014-01-02', 204),
(8, NULL, 'Remake Live', '2022-02-09', 304);

-- --------------------------------------------------------

--
-- Structure de la table `sdg`
--

DROP TABLE IF EXISTS `sdg`;
CREATE TABLE IF NOT EXISTS `sdg` (
  `idSdg` int NOT NULL AUTO_INCREMENT,
  `nomSdg` text NOT NULL,
  `datecSdg` date NOT NULL,
  `effectif` int NOT NULL,
  `infoSdg` varchar(1000) NOT NULL,
  `adrSdg` varchar(255) NOT NULL,
  PRIMARY KEY (`idSdg`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sdg`
--

INSERT INTO `sdg` (`idSdg`, `nomSdg`, `datecSdg`, `effectif`, `infoSdg`, `adrSdg`) VALUES
(1, 'AESTIAM', '2002-11-05', 20, 'Grand entreprise française, leader en france de la gestion immobiliére.', '9 Rue de tehran,Paris'),
(2, 'COURM AM', '2011-05-15', 20, 'Grande société de gestion, totalement indépendante.', '1 Rue Euler,Paris,France'),
(3, 'ARTH', '2015-01-15', 60, 'Filiale du groupe irlandais Greenman', '1 Rue de la paix, Paris, France'),
(7, 'ALDERAN', '2015-08-09', 15, 'Grande société de gestion de portefeuille immobilier, appartenant au groupe Ojirel. ', '22 Rue de Courcelles,Paris,France'),
(8, 'ADVENIS ', '1995-03-06', 500, 'Société de gestion leader des solutions d\'investissement.', '12 rue Mederic 75017,PARIS'),
(9, 'AMUNDI', '0000-00-00', 4725, 'Plus de 45 ans d\'expérience, elle est aujourd\'hui l\'un des deux acteurs majeurs de la gestion scpi\r\n', 'Boulevard pasteur, Paris, France'),
(10, 'UNOFI', '2002-12-20', 320, 'UNOFI gère actuellement la SCPI Notapierre. ', 'Rue Montesquieu, Paris,France'),
(11, 'ATLAND', '1968-00-00', 30, 'Société de gestion voisin de GROUPE ATLAND', 'Place Grangier, Dijon, France');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `scpi`
--
ALTER TABLE `scpi`
  ADD CONSTRAINT `scpi_ibfk_1` FOREIGN KEY (`idSdg`) REFERENCES `sdg` (`idSdg`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
