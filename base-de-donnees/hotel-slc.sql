-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 sep. 2023 à 21:19
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
-- Base de données : `xxx`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accompagnateur`
--

INSERT INTO `accompagnateur` (`num_acc`, `nom_acc`, `contact`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 'a', '1', 1, 0, '2023-09-06 10:41:53', NULL),
(2, 'b', '2', 1, 0, '2023-09-06 10:49:38', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`num_chambre`, `cod_typ`, `lib_typ`, `pu`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 1, 'Solo', 15000, 1, 0, '2023-08-23 12:27:02', '2023-09-06 08:40:49'),
(2, 2, 'Doubles', 25000, 1, 0, '2023-08-23 12:27:17', '2023-09-08 00:36:58'),
(3, 2, 'Doubles', 25000, 1, 0, '2023-08-23 12:27:29', '2023-09-04 16:31:03'),
(4, 1, 'Solo', 15000, 1, 0, '2023-08-23 12:27:41', '2023-09-06 08:32:53'),
(5, 4, 'Suite', 50000, 1, 0, '2023-08-23 12:27:54', '2023-09-04 16:42:24'),
(6, 3, 'Triples', 35000, 0, 1, '2023-08-23 12:58:05', '2023-09-06 08:58:34'),
(7, 4, 'Suite', 50000, 1, 0, '2023-08-23 13:17:20', '2023-09-01 07:44:14'),
(8, 3, 'Triples', 35000, 0, 1, '2023-09-08 02:48:44', '2023-09-08 00:49:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_cmd`, `num_res`, `prix_total`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 6, 0, 1, 0, '2023-09-08 08:06:22', NULL),
(2, 6, 0, 1, 0, '2023-09-08 08:09:12', NULL),
(3, 6, 0, 1, 0, '2023-09-08 08:10:10', NULL),
(4, 6, 0, 1, 0, '2023-09-08 08:13:37', NULL),
(5, 6, 6, 1, 0, '2023-09-08 14:44:21', NULL),
(6, 6, 2000, 1, 0, '2023-09-14 19:42:16', NULL),
(7, 6, 2000, 1, 0, '2023-09-14 20:20:42', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listes_accompagnateurs_reservation`
--

INSERT INTO `listes_accompagnateurs_reservation` (`id`, `num_res`, `num_acc`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(2, 3, 2, 0, 0, '2023-09-06 10:49:38', '2023-09-06 08:49:38'),
(3, 4, 2, 1, 0, '2023-09-06 10:58:34', NULL),
(4, 5, 1, 1, 0, '2023-09-08 02:36:58', NULL),
(5, 6, 1, 1, 0, '2023-09-08 02:49:22', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`cod_repas`, `nom_repas`, `pu_repas`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(6, 'Coucous + Poulets ', 1000, 1, 0, '2023-06-07 17:41:32', '2023-06-16 11:11:01'),
(7, 'Spaghettis + Œuf ', 300, 1, 0, '2023-06-07 18:20:36', '2023-06-16 10:22:10'),
(20, 'Pâte blanche + Poulet', 1000, 1, 0, '2023-06-14 19:56:39', '2023-06-16 12:50:15'),
(22, 'Attiéké + Alloco', 1000, 1, 0, '2023-06-16 00:18:18', NULL),
(23, 'Pâte blanche + sauce Gombo', 800, 1, 0, '2023-06-16 14:48:36', NULL),
(24, 'Akassa + Fromage', 500, 1, 0, '2023-06-17 03:35:39', NULL),
(25, 'Attasi + Poisson', 500, 0, 1, '2023-06-17 03:36:24', NULL),
(26, 'Croissant ', 2000, 0, 1, '2023-06-17 03:37:01', NULL),
(27, 'Agbéli + Man', 2000, 0, 1, '2023-06-17 03:38:12', NULL),
(28, 'Agbéli + Man + Poisson', 2000, 1, 0, '2023-06-17 03:38:32', NULL),
(29, 'Pâte rouge + Viande', 2000, 1, 0, '2023-06-17 03:39:21', NULL),
(30, 'Pâte rouge + Viande de chien', 2000, 1, 0, '2023-06-17 03:47:53', NULL),
(31, 'Pâte rouge + Viande de ,mouton ', 2000, 1, 0, '2023-06-17 03:48:07', NULL),
(32, 'Tchachanga(viande de cochon)', 2000, 1, 0, '2023-06-17 03:48:36', NULL),
(33, 'COCOTI', 6, 1, 0, '2023-08-03 10:00:19', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`num_res`, `num_clt`, `num_chambre`, `deb_occ`, `fin_occ`, `prix_total`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 3, 1, '2023-08-28', '2023-08-30', 45000, 0, 1, '2023-09-06 10:39:06', '2023-09-07 07:44:06'),
(2, 3, 1, '2023-09-07', '2023-09-10', 60000, 1, 0, '2023-09-06 10:40:49', NULL),
(3, 3, 2, '2023-09-06', '2023-09-08', 75000, 0, 0, '2023-09-06 10:41:53', NULL),
(4, 3, 6, '2023-09-06', '2023-09-10', 175000, 1, 0, '2023-09-06 10:58:33', NULL),
(5, 11, 2, '2023-09-08', '2023-09-10', 75000, 1, 0, '2023-09-08 02:36:58', NULL),
(6, 11, 8, '2023-09-08', '2023-09-10', 105000, 1, 0, '2023-09-08 02:49:22', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `user_id`, `type`, `token`, `est_actif`, `est_supprimer`, `créer_le`, `maj_le`) VALUES
(1, 1, 'VALIDATION_COMPTE', '6473931271a10', 1, 0, '2023-05-28 17:44:50', NULL),
(2, 2, 'VALIDATION_COMPTE', '64761d328bad4', 1, 0, '2023-05-30 15:58:42', NULL),
(3, 8, 'VALIDATION_COMPTE', '6478ab808e668', 1, 0, '2023-06-01 14:30:24', NULL),
(4, 3, 'VALIDATION_COMPTE', '647fb8ae6cddc', 1, 0, '2023-06-06 22:52:30', NULL),
(5, 6, 'VALIDATION_COMPTE', '64b030ddc01a0', 0, 1, '2023-07-13 17:14:05', '2023-07-13 15:41:19'),
(6, 6, 'NOUVEAU_MOT_DE_PASSE', '64b03149934ce', 0, 1, '2023-07-13 17:15:53', '2023-07-13 15:41:19'),
(7, 6, 'NOUVEAU_MOT_DE_PASSE', '64b035b5e3d5f', 0, 1, '2023-07-13 17:34:45', '2023-07-13 15:41:19'),
(8, 6, 'NOUVEAU_MOT_DE_PASSE', '64b036107ea37', 0, 1, '2023-07-13 17:36:16', '2023-07-13 15:41:19'),
(9, 6, 'NOUVEAU_MOT_DE_PASSE', '64b0368613594', 0, 1, '2023-07-13 17:38:14', '2023-07-13 15:41:19'),
(10, 6, 'NOUVEAU_MOT_DE_PASSE', '64b037254601e', 0, 1, '2023-07-13 17:40:53', '2023-07-13 15:41:19'),
(11, 11, 'VALIDATION_COMPTE', '64e494da6a3e7', 1, 0, '2023-08-22 10:58:34', NULL),
(12, 13, 'VALIDATION_COMPTE', '64edbe20ca1e1', 1, 0, '2023-08-29 09:45:04', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `email`, `nom_utilisateur`, `avatar`, `profil`, `mot_passe`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 'GNONHOUE', 'Fran&ccedil;ois Rom&eacute;o', 'Masculin', '62929439', 'franois.gnonhoue@gmail.com', 'FRANCHESCO', '/soutenance/public/images/upload/FRANCHESCO/profile.jpg', 'ADMINISTRATEUR', '7898552a15e06e86d529e573fef684a1b45f4f40', 1, 0, '2023-06-06 22:13:38', '2023-06-15 22:29:33'),
(2, 'GNONHOUE', 'Christelle ', 'Feminin', '12345678', 'christine@gmail.com', 'G. Christina', '/soutenance/public/images/upload/G. Christina/640px-WhatsApp.svg.png', 'RECEPTIONNISTE', 'b41238934314fae676bb84c941f013a42e36ae68', 1, 0, '2023-06-06 22:15:45', '2023-06-15 22:42:47'),
(3, 'DUPONT', 'L&eacute;onard ', NULL, '12345678', 'neon@gmail.com', 'neon_229', '/soutenance/public/images/upload/neon_229/2fedf831-b60e-4b57-90d5-88331627646c.jpeg', 'CLIENT', '6c3a4053dcac0b7068bff91cc765475ae7256801', 1, 0, '2023-06-06 22:52:30', '2023-08-12 17:03:26'),
(4, 'YEHOUENOU', 'Déborah', 'Féminin', '24681012', 'deboyehouenou@gmail.com', 'Débowê', 'no_image', 'RECEPTIONNISTE', 'f840a916ffd473dd637aa23000691527d1d2231c', 1, 0, '2023-06-16 13:20:26', '2023-06-16 11:20:59'),
(11, 'BESS', 'JOW ', NULL, '1234', 'jow@gmail.com', 'neon_228', 'no_image', 'CLIENT', '29596ef73246afe32d6f5275e3f88575d73de0e8', 1, 0, '2023-08-22 10:58:34', NULL),
(12, 'DUPONT', 'JOW ', NULL, '123400', 'jown@gmail.com', 'NULL', 'no_image', 'CLIENT', 'eef19c54306daa69eda49c0272623bdb5e2b341f', 0, 0, '2023-08-25 10:54:25', NULL),
(13, 'NOUVEAU ', 'contact ', NULL, '12345', 'ranco@gmail.com', 'nouv', 'no_image', 'CLIENT', 'b4f635f6ed19f35fe3a0737c61e480b8ccc1d6f3', 1, 0, '2023-08-29 09:45:04', '2023-08-29 07:46:07'),
(14, 'GNONHOUE', 'Léonard ', NULL, '555455', 'ro@gmail.vom', 'NULL', 'no_image', 'CLIENT', 'eef19c54306daa69eda49c0272623bdb5e2b341f', 0, 0, '2023-09-01 08:09:03', NULL);

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
