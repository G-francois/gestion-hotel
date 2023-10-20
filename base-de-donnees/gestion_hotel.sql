-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 oct. 2023 à 12:26
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
-- Base de données : `gestion_hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnateur`
--

DROP TABLE IF EXISTS `accompagnateur`;
CREATE TABLE IF NOT EXISTS `accompagnateur` (
  `num_acc` int NOT NULL AUTO_INCREMENT,
  `nom_acc` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `num_chambre` int NOT NULL AUTO_INCREMENT,
  `cod_typ` int NOT NULL,
  `lib_typ` varchar(255) NOT NULL,
  `details` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Aucune_informations',
  `personnes` varchar(11) DEFAULT '0',
  `superficies` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Aucune_informations',
  `pu` int NOT NULL,
  `photos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Aucune_image',
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`num_chambre`, `cod_typ`, `lib_typ`, `details`, `personnes`, `superficies`, `pu`, `photos`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo.jpg', 1, 0, '2023-10-13 17:47:09', '2023-10-16 08:38:12'),
(2, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles.jpg', 1, 0, '2023-10-13 17:53:03', '2023-10-20 08:55:07'),
(3, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples.jpg', 0, 1, '2023-10-13 17:53:23', '2023-10-20 08:38:25'),
(4, 4, 'Suite', 'Il possède généralement une salle de bain attenante, un salon et la plupart du temps, un coin repas avec une vue imprenable. Elle a une superficie de 100m² et peut accueillir jusqu\'à cinq voyageurs.', '5', '100m²', 50000, '/soutenance/public/images/upload/Suite/Suites.jpg', 1, 0, '2023-10-13 17:53:36', '2023-10-17 15:12:01'),
(5, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo2.jpg', 1, 0, '2023-10-13 17:55:01', NULL),
(6, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles2.jpg', 1, 0, '2023-10-13 17:55:15', NULL),
(7, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples3.jpg', 1, 0, '2023-10-13 17:57:14', '2023-10-16 11:36:09'),
(8, 4, 'Suite', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '5', '100m²', 50000, '/soutenance/public/images/upload/Triples/Suites3.jpg', 1, 0, '2023-10-13 17:57:29', '2023-10-13 17:06:05'),
(9, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo3.jpg', 1, 0, '2023-10-13 17:58:35', '2023-10-16 07:58:57'),
(10, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles3.jpg', 1, 0, '2023-10-13 17:59:56', NULL),
(11, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples3.jpg', 1, 0, '2023-10-13 18:00:21', NULL),
(12, 4, 'Suite', 'Il possède généralement une salle de bain attenante, un salon et la plupart du temps, un coin repas avec une vue imprenable. Elle a une superficie de 100m² et peut accueillir jusqu\'à cinq voyageurs.', '5', '100m²', 50000, '/soutenance/public/images/upload/Suite/Suites3.jpg', 1, 0, '2023-10-13 18:00:34', NULL),
(13, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo4.jpg', 1, 0, '2023-10-13 18:00:47', NULL),
(14, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles5.jpg', 1, 0, '2023-10-13 18:10:34', NULL),
(15, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples4.jpg', 1, 0, '2023-10-13 18:10:54', NULL),
(16, 4, 'Suite', 'Il possède généralement une salle de bain attenante, un salon et la plupart du temps, un coin repas avec une vue imprenable. Elle a une superficie de 100m² et peut accueillir jusqu\'à cinq voyageurs.', '5', '100m²', 50000, '/soutenance/public/images/upload/Suite/Suites4.jpg', 1, 0, '2023-10-13 18:11:15', NULL),
(17, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo5.jpg', 1, 0, '2023-10-13 18:11:30', NULL),
(18, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles6.jpg', 1, 0, '2023-10-13 18:11:50', NULL),
(19, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples5.jpg', 1, 0, '2023-10-13 18:12:09', NULL),
(20, 4, 'Suite', 'Il possède généralement une salle de bain attenante, un salon et la plupart du temps, un coin repas avec une vue imprenable. Elle a une superficie de 100m² et peut accueillir jusqu\'à cinq voyageurs.', '5', '100m²', 50000, '/soutenance/public/images/upload/Suite/Suite5.jpg', 1, 0, '2023-10-13 18:12:28', NULL),
(21, 1, 'Solo', 'La chambre solo allie confort et fonctionnalité dans un esprit simple et chaleureux. La taille de la chambre et la vue sur la petite cour pavée rappellent Paris et ses ruelles d’antan. Devant le pupitre, le solitaire peut prendre la plume… Rien ne viendra le perturber. Elle a une superficie de 30m² et ne peut accueillir qu\'un seul voyageur.', '1', '30m²', 15000, '/soutenance/public/images/upload/Solo/Solo6.jpg', 1, 0, '2023-10-13 18:13:43', NULL),
(22, 2, 'Doubles', 'Profitez du balcon et de la vue sur l\'esplanade. Cette chambre est conçue pour héberger deux personnes et est équipée d\'un grand lit standard (140-160*200) ou de deux lits simples (90*200) et a une superficie de 50m².', '2', '50m²', 25000, '/soutenance/public/images/upload/Doubles/Doubles4 (2).jpg', 1, 0, '2023-10-13 18:16:05', NULL),
(23, 3, 'Triples', 'Idéal pour les excursions en petits groupes. Elle est équipée de 3 couchages et peut donc accueillir 3 personnes. La configuration peut être 3 lits d\'une personne ou bien 1 lit double de 2 personnes et 1 d\'une personne avec un canapé et a une superficie de 70m².', '3', '70m²', 35000, '/soutenance/public/images/upload/Triples/Triples 5.jpg', 1, 0, '2023-10-13 18:17:01', NULL),
(24, 4, 'Suite', 'Il possède généralement une salle de bain attenante, un salon et la plupart du temps, un coin repas avec une vue imprenable. Elle a une superficie de 100m² et peut accueillir jusqu\'à cinq voyageurs.', '5', '100m²', 50000, '/soutenance/public/images/upload/Suite/Suites5.jpg', 1, 0, '2023-10-13 18:17:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_cmd` int NOT NULL AUTO_INCREMENT,
  `num_res` int NOT NULL,
  `prix_total` int NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_cmd`),
  KEY `num_res` (`num_res`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `listes_accompagnateurs_reservation`
--

DROP TABLE IF EXISTS `listes_accompagnateurs_reservation`;
CREATE TABLE IF NOT EXISTS `listes_accompagnateurs_reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_res` int NOT NULL,
  `num_acc` int NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `num_res` (`num_res`),
  KEY `num_acc` (`num_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `plaintes`
--

DROP TABLE IF EXISTS `plaintes`;
CREATE TABLE IF NOT EXISTS `plaintes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_clt` int NOT NULL,
  `type_sujet` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantes _utilisateur_id` (`num_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
CREATE TABLE IF NOT EXISTS `quantite` (
  `cod_repas` int NOT NULL,
  `num_cmd` int NOT NULL,
  `num_chambre` int NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  KEY `quantite_chambre _num_chambre` (`num_chambre`),
  KEY `quantite_commande _num_cmd` (`num_cmd`),
  KEY `quantite_repas_cod_repas` (`cod_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `cod_repas` int NOT NULL AUTO_INCREMENT,
  `nom_repas` varchar(255) NOT NULL,
  `pu_repas` int NOT NULL,
  `photos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Aucune image',
  `details` varchar(2000) DEFAULT 'Aucune information ',
  `est_actif` tinyint NOT NULL DEFAULT '0',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_repas`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`cod_repas`, `nom_repas`, `pu_repas`, `photos`, `details`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 'Attiéké', 3500, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:03:58', NULL),
(2, 'Baril de pain', 4250, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:05:04', NULL),
(3, 'Gâtaeu au Crabe', 5000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:05:32', NULL),
(4, 'Selection de caesar', 5500, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:05:53', NULL),
(5, 'Grillarde Toscanes', 6200, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:06:17', NULL),
(6, 'Baton de Mozzarella', 3000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:07:01', NULL),
(7, 'Salade Grecque', 4200, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:07:30', NULL),
(8, 'Salade d\'épinards', 3000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:07:41', NULL),
(9, 'Rouleau de homard', 8000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:08:08', NULL),
(10, 'Riz Frit avec Côtelettes de Poulet aux Œufs Salés', 3000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:08:40', NULL),
(11, 'Les Nouilles', 2500, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:09:14', NULL),
(12, 'Plat de fruits', 4500, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:09:35', NULL),
(13, 'Dîner de Noël', 2000, 'no_image', 'Aucune information ', 1, 0, '2023-09-22 16:25:19', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `num_res` int NOT NULL AUTO_INCREMENT,
  `num_clt` int NOT NULL,
  `num_chambre` int NOT NULL,
  `deb_occ` date NOT NULL,
  `fin_occ` date NOT NULL,
  `prix_total` int NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num_res`),
  KEY `reservations_chambre_num_chambre` (`num_chambre`) USING BTREE,
  KEY `reservations_utilisateur_id` (`num_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `est_actif` tinyint NOT NULL DEFAULT '1',
  `est_supprimer` tinyint DEFAULT '0',
  `créer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(11) DEFAULT NULL,
  `telephone` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Aucune_image',
  `profil` varchar(255) NOT NULL,
  `mot_passe` varchar(255) DEFAULT NULL,
  `est_actif` tinyint(1) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(1) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `email`, `nom_utilisateur`, `avatar`, `profil`, `mot_passe`, `est_actif`, `est_supprimer`, `creer_le`, `maj_le`) VALUES
(1, 'GNONHOUE', 'Fran&ccedil;ois', NULL, NULL, 'francois.gnonhoue@gmail.co', 'neon_229', 'Aucune_image', 'CLIENT', '6c3a4053dcac0b7068bff91cc765475ae7256801', 1, 0, '2023-10-20 11:56:52', NULL),
(2, 'GNONHOUE', 'François ', 'Masculin', '62929439', 'francois.gnonhoue@gmail.com', 'FRANCHESCO', 'Aucune_image', 'ADMINISTRATEUR', 'f840a916ffd473dd637aa23000691527d1d2231c', 1, 0, '2023-10-20 12:03:07', NULL);

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
