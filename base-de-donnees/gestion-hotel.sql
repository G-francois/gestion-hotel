-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 mai 2023 à 08:40
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
-- Base de données : `gestion-hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnateur`
--

DROP TABLE IF EXISTS `accompagnateur`;
CREATE TABLE IF NOT EXISTS `accompagnateur` (
  `num_acc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acc` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
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
  `pu` int(11) NOT NULL,
  `lib_typ` varchar(255) NOT NULL,
  `statuts` tinyint(4) DEFAULT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `num_clt` int(11) NOT NULL AUTO_INCREMENT,
  `nom_clt` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `dat_cmd` datetime NOT NULL,
  `num_res` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_cmd`),
  KEY `num_res` (`num_res`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_res` int(11) NOT NULL,
  `num_acc` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `num_res` (`num_res`),
  KEY `num_acc` (`num_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `occupation`
--

DROP TABLE IF EXISTS `occupation`;
CREATE TABLE IF NOT EXISTS `occupation` (
  `num_res` int(11) NOT NULL,
  `num_chambre` int(11) NOT NULL,
  `deb_occ` datetime NOT NULL,
  `fin_occ` datetime NOT NULL,
  `est_actif` int(11) NOT NULL DEFAULT '0',
  `est_supprimer` int(11) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  KEY `num_res` (`num_res`),
  KEY `num_chambre` (`num_chambre`)
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
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  KEY `cod_repas` (`cod_repas`),
  KEY `num_cmd` (`num_cmd`),
  KEY `num_chambre` (`num_chambre`)
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
  `statuts` tinyint(4) DEFAULT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `num_res` int(11) NOT NULL AUTO_INCREMENT,
  `dat_res` datetime NOT NULL,
  `num_clt` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`num_res`),
  KEY `num_clt` (`num_clt`)
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `user_id`, `type`, `token`, `est_actif`, `est_supprimer`, `créer_le`, `maj_le`) VALUES
(26, 33, 'VALIDATION_COMPTE', '643e58829cb99', 1, 0, '2023-04-18 08:44:50', NULL),
(27, 34, 'VALIDATION_COMPTE', '643e5b86282a8', 1, 0, '2023-04-18 08:57:42', NULL),
(28, 35, 'VALIDATION_COMPTE', '643e5d82a8a64', 1, 0, '2023-04-18 09:06:10', NULL),
(29, 36, 'VALIDATION_COMPTE', '643e5e9c9d178', 1, 0, '2023-04-18 09:10:52', NULL),
(30, 37, 'VALIDATION_COMPTE', '643e5fc0dc0a5', 1, 0, '2023-04-18 09:15:44', NULL),
(31, 38, 'VALIDATION_COMPTE', '643e60ee6ac4e', 1, 0, '2023-04-18 09:20:46', NULL),
(32, 39, 'VALIDATION_COMPTE', '643e655ad5b10', 1, 0, '2023-04-18 09:39:38', NULL),
(33, 40, 'VALIDATION_COMPTE', '643e6582c73b2', 1, 0, '2023-04-18 09:40:18', NULL),
(34, 41, 'VALIDATION_COMPTE', '643e65d48c066', 0, 1, '2023-04-18 09:41:40', '2023-04-18 07:59:53'),
(35, 42, 'VALIDATION_COMPTE', '643e6d6dde6f4', 0, 1, '2023-04-18 10:14:05', '2023-04-18 08:14:43'),
(36, 43, 'VALIDATION_COMPTE', '643e7efe27349', 1, 0, '2023-04-18 11:29:02', NULL),
(37, 44, 'VALIDATION_COMPTE', '643e7f353ab3b', 0, 1, '2023-04-18 11:29:57', '2023-04-18 09:30:30'),
(38, 45, 'VALIDATION_COMPTE', '643e7fafe5036', 0, 1, '2023-04-18 11:31:59', '2023-04-18 09:32:21'),
(39, 46, 'VALIDATION_COMPTE', '643e824ab90c7', 0, 1, '2023-04-18 11:43:06', '2023-04-18 09:43:29'),
(40, 47, 'VALIDATION_COMPTE', '643e82bd67d93', 0, 1, '2023-04-18 11:45:01', '2023-04-18 09:45:19'),
(41, 48, 'VALIDATION_COMPTE', '643e85b231179', 1, 0, '2023-04-18 11:57:38', NULL),
(42, 49, 'VALIDATION_COMPTE', '643e868beeff4', 0, 1, '2023-04-18 12:01:16', '2023-04-19 10:43:43'),
(43, 49, 'NOUVEAU_MOT_DE_PASSE', '643fdc45a01d7', 0, 1, '2023-04-19 12:19:17', '2023-04-19 10:43:43'),
(44, 49, 'NOUVEAU_MOT_DE_PASSE', '643fddd1ef299', 0, 1, '2023-04-19 12:25:53', '2023-04-19 10:43:43'),
(45, 49, 'NOUVEAU_MOT_DE_PASSE', '643fddf383517', 0, 1, '2023-04-19 12:26:27', '2023-04-19 10:43:43'),
(46, 49, 'NOUVEAU_MOT_DE_PASSE', '643fe0f795353', 0, 1, '2023-04-19 12:39:19', '2023-04-19 10:43:43'),
(47, 49, 'NOUVEAU_MOT_DE_PASSE', '643fe16da2603', 0, 1, '2023-04-19 12:41:17', '2023-04-19 10:43:43'),
(48, 49, 'NOUVEAU_MOT_DE_PASSE', '643fe1e2c002d', 0, 1, '2023-04-19 12:43:14', '2023-04-19 10:43:43'),
(49, 49, 'NOUVEAU_MOT_DE_PASSE', '6440f80724119', 1, 0, '2023-04-20 08:29:59', NULL),
(50, 49, 'NOUVEAU_MOT_DE_PASSE', '644123ad9de21', 1, 0, '2023-04-20 11:36:13', NULL),
(51, 50, 'VALIDATION_COMPTE', '6448043cd62b8', 1, 0, '2023-04-25 16:47:56', NULL),
(52, 51, 'VALIDATION_COMPTE', '644804ec58f65', 1, 0, '2023-04-25 16:50:52', NULL),
(53, 52, 'VALIDATION_COMPTE', '64481bfc7d614', 1, 0, '2023-04-25 18:29:16', NULL),
(54, 53, 'VALIDATION_COMPTE', '64481d3d288e4', 1, 0, '2023-04-25 18:34:37', NULL),
(55, 54, 'VALIDATION_COMPTE', '64481d8269e54', 1, 0, '2023-04-25 18:35:46', NULL),
(56, 57, 'VALIDATION_COMPTE', '6448e8e8d0125', 1, 0, '2023-04-26 09:03:36', NULL),
(57, 58, 'VALIDATION_COMPTE', '6448e97b7e0f5', 1, 0, '2023-04-26 09:06:03', NULL),
(58, 59, 'VALIDATION_COMPTE', '6448ea4b9a38b', 1, 0, '2023-04-26 09:09:31', NULL),
(59, 60, 'VALIDATION_COMPTE', '644918da70667', 1, 0, '2023-04-26 12:28:10', NULL),
(60, 62, 'VALIDATION_COMPTE', '6458db264cf9a', 1, 0, '2023-05-08 11:21:10', NULL),
(61, 63, 'VALIDATION_COMPTE', '64590e59c7526', 1, 0, '2023-05-08 14:59:37', NULL),
(62, 64, 'VALIDATION_COMPTE', '64593a30866ef', 1, 0, '2023-05-08 18:06:40', NULL),
(63, 65, 'VALIDATION_COMPTE', '64593c614e33a', 1, 0, '2023-05-08 18:16:01', NULL),
(64, 66, 'VALIDATION_COMPTE', '64593ce3626d7', 1, 0, '2023-05-08 18:18:11', NULL),
(65, 67, 'VALIDATION_COMPTE', '64593db66b052', 1, 0, '2023-05-08 18:21:42', NULL),
(66, 68, 'VALIDATION_COMPTE', '64593f89122e9', 1, 0, '2023-05-08 18:29:29', NULL),
(67, 65, 'VALIDATION_COMPTE', '645a440445a0c', 1, 0, '2023-05-09 13:00:52', NULL),
(68, 66, 'VALIDATION_COMPTE', '645a482668002', 1, 0, '2023-05-09 13:18:30', NULL),
(69, 68, 'VALIDATION_COMPTE', '645a4c549ae80', 1, 0, '2023-05-09 13:36:20', NULL),
(70, 69, 'VALIDATION_COMPTE', '645a56561a5fd', 1, 0, '2023-05-09 14:19:02', NULL),
(71, 70, 'VALIDATION_COMPTE', '645b6b9529967', 1, 0, '2023-05-10 10:01:57', NULL),
(72, 71, 'VALIDATION_COMPTE', '645bd82ca5648', 1, 0, '2023-05-10 17:45:16', NULL),
(73, 71, 'NOUVEAU_MOT_DE_PASSE', '645c748f2d728', 1, 0, '2023-05-11 04:52:31', NULL),
(74, 70, 'NOUVEAU_MOT_DE_PASSE', '645c74d10340a', 1, 0, '2023-05-11 04:53:37', NULL),
(75, 70, 'NOUVEAU_MOT_DE_PASSE', '645c75752d677', 1, 0, '2023-05-11 04:56:21', NULL),
(76, 71, 'NOUVEAU_MOT_DE_PASSE', '645c7604ca527', 1, 0, '2023-05-11 04:58:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_names` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_valid_mail` int(11) NOT NULL,
  `is_valid_phone_number` int(11) NOT NULL,
  `user_profile` int(11) NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countrie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_the` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(11) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'no_image',
  `profil` varchar(255) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
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
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`num_clt`) REFERENCES `reservation` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`num_cmd`) REFERENCES `reservation` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`num_acc`) REFERENCES `accompagnateur` (`num_acc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`num_res`) REFERENCES `reservation` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `occupation_ibfk_1` FOREIGN KEY (`num_res`) REFERENCES `reservation` (`num_res`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `occupation_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `quantite_ibfk_1` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quantite_ibfk_2` FOREIGN KEY (`num_cmd`) REFERENCES `commande` (`num_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quantite_ibfk_3` FOREIGN KEY (`cod_repas`) REFERENCES `repas` (`cod_repas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
