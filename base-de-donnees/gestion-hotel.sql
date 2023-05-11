-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 11 mai 2023 à 12:10
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

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

CREATE TABLE `accompagnateur` (
  `num_acc` int(11) NOT NULL,
  `nom_acc` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `num_chambre` int(11) NOT NULL,
  `cod_typ` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `lib_typ` varchar(255) NOT NULL,
  `statuts` tinyint(4) DEFAULT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `num_clt` int(11) NOT NULL,
  `nom_clt` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `num_cmd` int(11) NOT NULL,
  `dat_cmd` datetime NOT NULL,
  `num_res` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `id` int(11) NOT NULL,
  `num_res` int(11) NOT NULL,
  `num_acc` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `occupation`
--

CREATE TABLE `occupation` (
  `num_res` int(11) NOT NULL,
  `num_chambre` int(11) NOT NULL,
  `deb_occ` datetime NOT NULL,
  `fin_occ` datetime NOT NULL,
  `est_actif` int(11) NOT NULL DEFAULT '0',
  `est_supprimer` int(11) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE `quantite` (
  `cod_repas` int(11) NOT NULL,
  `num_cmd` int(11) NOT NULL,
  `num_chambre` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE `repas` (
  `cod_repas` int(11) NOT NULL,
  `nom_repas` varchar(255) NOT NULL,
  `pu_repas` int(11) NOT NULL,
  `statuts` tinyint(4) DEFAULT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `num_res` int(11) NOT NULL,
  `dat_res` datetime NOT NULL,
  `num_clt` int(11) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '0',
  `est_supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `est_actif` tinyint(4) NOT NULL DEFAULT '1',
  `est_supprimer` tinyint(4) DEFAULT '0',
  `créer_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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
  `updated_on` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
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
  `maj_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accompagnateur`
--
ALTER TABLE `accompagnateur`
  ADD PRIMARY KEY (`num_acc`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`num_chambre`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`num_clt`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_cmd`),
  ADD KEY `num_res` (`num_res`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_res` (`num_res`),
  ADD KEY `num_acc` (`num_acc`);

--
-- Index pour la table `occupation`
--
ALTER TABLE `occupation`
  ADD KEY `num_res` (`num_res`),
  ADD KEY `num_chambre` (`num_chambre`);

--
-- Index pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD KEY `cod_repas` (`cod_repas`),
  ADD KEY `num_cmd` (`num_cmd`),
  ADD KEY `num_chambre` (`num_chambre`);

--
-- Index pour la table `repas`
--
ALTER TABLE `repas`
  ADD PRIMARY KEY (`cod_repas`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`num_res`),
  ADD KEY `num_clt` (`num_clt`);

--
-- Index pour la table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accompagnateur`
--
ALTER TABLE `accompagnateur`
  MODIFY `num_acc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `num_chambre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `num_clt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `num_cmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `repas`
--
ALTER TABLE `repas`
  MODIFY `cod_repas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `num_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
