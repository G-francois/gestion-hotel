-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 23 sep. 2023 à 23:24
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel-slc`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnateur`
--

DROP TABLE IF EXISTS `accompagnateur`;
CREATE TABLE IF NOT EXISTS `accompagnateur` (
  `num_acc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acc` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `num_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `cod_typ` int(11) NOT NULL,
  `lib_typ` varchar(255) NOT NULL,
  `pu` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`num_chambre`, `cod_typ`, `lib_typ`, `pu`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 1, 'Solo', 15000, 1, 0, '2023-09-22 18:56:20', NULL),
(2, 2, 'Doubles', 25000, 1, 0, '2023-09-22 18:56:41', NULL),
(3, 3, 'Triples', 35000, 1, 0, '2023-09-22 18:56:55', NULL),
(4, 4, 'Suite', 50000, 1, 0, '2023-09-22 18:57:05', NULL),
(5, 1, 'Solo', 15000, 1, 0, '2023-09-22 18:57:15', NULL),
(6, 2, 'Doubles', 25000, 1, 0, '2023-09-22 18:57:24', NULL),
(7, 3, 'Triples', 35000, 1, 0, '2023-09-22 18:57:32', NULL),
(8, 4, 'Suite', 50000, 1, 0, '2023-09-22 18:57:41', NULL),
(9, 1, 'Solo', 15000, 1, 0, '2023-09-22 18:57:52', NULL),
(10, 2, 'Doubles', 25000, 1, 0, '2023-09-22 18:58:02', NULL),
(11, 3, 'Triples', 35000, 1, 0, '2023-09-22 18:58:11', NULL),
(12, 4, 'Suite', 50000, 1, 0, '2023-09-22 18:58:19', NULL),
(13, 1, 'Solo', 15000, 1, 0, '2023-09-22 18:58:28', NULL),
(14, 2, 'Doubles', 25000, 1, 0, '2023-09-22 18:58:38', NULL),
(15, 3, 'Triples', 35000, 1, 0, '2023-09-22 18:58:47', NULL),
(16, 4, 'Suite', 50000, 1, 0, '2023-09-22 18:58:57', NULL),
(17, 1, 'Solo', 15000, 1, 0, '2023-09-22 18:59:06', NULL),
(18, 2, 'Doubles', 25000, 1, 0, '2023-09-22 18:59:55', NULL),
(19, 3, 'Triples', 35000, 1, 0, '2023-09-22 19:00:04', NULL),
(20, 4, 'Suite', 50000, 1, 0, '2023-09-22 19:00:14', NULL),
(21, 1, 'Solo', 15000, 1, 0, '2023-09-22 19:00:28', NULL),
(22, 2, 'Doubles', 25000, 1, 0, '2023-09-22 19:00:36', NULL),
(23, 3, 'Triples', 35000, 1, 0, '2023-09-22 19:00:46', NULL),
(24, 4, 'Suite', 50000, 1, 0, '2023-09-22 19:00:54', NULL),
(25, 1, 'Solo', 15000, 1, 0, '2023-09-22 19:01:02', NULL),
(26, 2, 'Doubles', 25000, 1, 0, '2023-09-22 19:01:11', NULL),
(27, 3, 'Triples', 35000, 1, 0, '2023-09-22 19:01:20', NULL),
(28, 4, 'Suite', 50000, 1, 0, '2023-09-22 19:01:29', NULL),
(29, 1, 'Solo', 15000, 1, 0, '2023-09-22 19:01:39', NULL),
(30, 2, 'Doubles', 25000, 1, 0, '2023-09-22 19:01:51', NULL),
(31, 3, 'Triples', 35000, 1, 0, '2023-09-22 19:02:00', NULL),
(32, 4, 'Suite', 50000, 1, 0, '2023-09-22 19:02:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `num_res` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_cmd`),
  KEY `num_res` (`num_res`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `listes_accompagnateurs_reservation`
--

DROP TABLE IF EXISTS `listes_accompagnateurs_reservation`;
CREATE TABLE IF NOT EXISTS `listes_accompagnateurs_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_res` int(11) NOT NULL,
  `num_acc` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `num_res` (`num_res`),
  KEY `num_acc` (`num_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plaintes`
--

DROP TABLE IF EXISTS `plaintes`;
CREATE TABLE IF NOT EXISTS `plaintes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_clt` int(11) NOT NULL,
  `type_sujet` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantes _utilisateur_id` (`num_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
CREATE TABLE IF NOT EXISTS `quantite` (
  `cod_repas` int(11) NOT NULL,
  `num_cmd` int(11) NOT NULL,
  `num_chambre` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  KEY `quantite_chambre _num_chambre` (`num_chambre`),
  KEY `quantite_commande _num_cmd` (`num_cmd`),
  KEY `quantite_repas_cod_repas` (`cod_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `cod_repas` int(11) NOT NULL AUTO_INCREMENT,
  `nom_repas` varchar(255) NOT NULL,
  `pu_repas` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_repas`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`cod_repas`, `nom_repas`, `pu_repas`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 'Attiéké', 3500, 1, 0, '2023-09-22 16:03:58', NULL),
(2, 'Baril de pain', 4250, 1, 0, '2023-09-22 16:05:04', NULL),
(3, 'Gâtaeu au Crabe', 5000, 1, 0, '2023-09-22 16:05:32', NULL),
(4, 'Selection de caesar', 5500, 1, 0, '2023-09-22 16:05:53', NULL),
(5, 'Grillarde Toscanes', 6200, 1, 0, '2023-09-22 16:06:17', NULL),
(6, 'Baton de Mozzarella', 3000, 1, 0, '2023-09-22 16:07:01', NULL),
(7, 'Salade Grecque', 4200, 1, 0, '2023-09-22 16:07:30', NULL),
(8, 'Salade d\'épinards', 3000, 1, 0, '2023-09-22 16:07:41', NULL),
(9, 'Rouleau de homard', 8000, 1, 0, '2023-09-22 16:08:08', NULL),
(10, 'Riz Frit avec Côtelettes de Poulet aux Œufs Salés', 3000, 1, 0, '2023-09-22 16:08:40', NULL),
(11, 'Les Nouilles', 2500, 1, 0, '2023-09-22 16:09:14', NULL),
(12, 'Plat de fruits', 4500, 1, 0, '2023-09-22 16:09:35', NULL),
(13, 'Dîner de Noël', 2000, 1, 0, '2023-09-22 16:25:19', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `num_res` int(11) NOT NULL AUTO_INCREMENT,
  `num_clt` int(11) NOT NULL,
  `num_chambre` int(11) NOT NULL,
  `deb_occ` date NOT NULL,
  `fin_occ` date NOT NULL,
  `prix_total` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num_res`),
  KEY `reservations_chambre_num_chambre` (`num_chambre`) USING BTREE,
  KEY `reservations_utilisateur_id` (`num_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) DEFAULT '0',
  `créer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(11) DEFAULT NULL,
  `telephone` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'no_image',
  `profil` varchar(255) NOT NULL,
  `mot_passe` varchar(255) DEFAULT NULL,
  `est_actif` tinyint(1) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(1) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_reservations_num_res` FOREIGN KEY (`num_res`) REFERENCES `reservations` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `listes_accompagnateurs_reservation`
--
ALTER TABLE `listes_accompagnateurs_reservation`
  ADD CONSTRAINT `liste_accompagnateurs_reservations_num_acc` FOREIGN KEY (`num_acc`) REFERENCES `accompagnateur` (`num_acc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_accompagnateurs_reservations_num_res` FOREIGN KEY (`num_res`) REFERENCES `reservations` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `plaintes`
--
ALTER TABLE `plaintes`
  ADD CONSTRAINT `plantes _utilisateur_id` FOREIGN KEY (`num_clt`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `quantite_chambre _num_chambre` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quantite_commande _num_cmd` FOREIGN KEY (`num_cmd`) REFERENCES `commande` (`num_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quantite_repas_cod_repas` FOREIGN KEY (`cod_repas`) REFERENCES `repas` (`cod_repas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_chambre_num_chambre` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_utilisateur_id` FOREIGN KEY (`num_clt`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
