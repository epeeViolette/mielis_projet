-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 11 juin 2023 à 11:03
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
-- Base de données : `mielis`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleve` int(11) NOT NULL,
  `nom_client` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_eleve` (`id_eleve`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_eleve`, `nom_client`) VALUES
(56, 1, 'Dylan oiknine');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommandes`
--

DROP TABLE IF EXISTS `detailscommandes`;
CREATE TABLE IF NOT EXISTS `detailscommandes` (
  `idDetailsCommandes` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_miel` int(11) NOT NULL,
  `Qte_miel` int(11) NOT NULL,
  PRIMARY KEY (`idDetailsCommandes`),
  KEY `id_commande` (`id_commande`),
  KEY `id_miel` (`id_miel`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailscommandes`
--

INSERT INTO `detailscommandes` (`idDetailsCommandes`, `id_commande`, `id_miel`, `Qte_miel`) VALUES
(22, 56, 2, 2),
(23, 56, 4, 6),
(24, 56, 5, 0),
(25, 56, 26, 8);

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

DROP TABLE IF EXISTS `directeur`;
CREATE TABLE IF NOT EXISTS `directeur` (
  `id_directeur` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` text NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`id_directeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`id_directeur`, `identifiant`, `mdp`) VALUES
(1, 'dylanoiknine@outlook.fr', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` text NOT NULL,
  `prenom_eleve` text NOT NULL,
  `classe_eleve` text NOT NULL,
  `identifiant_eleve` text NOT NULL,
  `mdp_eleve` text NOT NULL,
  PRIMARY KEY (`id_eleve`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `classe_eleve`, `identifiant_eleve`, `mdp_eleve`) VALUES
(1, 'OIKNINE', 'DYLAN', 'terminale', 'dylan98', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `miel`
--

DROP TABLE IF EXISTS `miel`;
CREATE TABLE IF NOT EXISTS `miel` (
  `id_miel` int(11) NOT NULL AUTO_INCREMENT,
  `nom_miel` text NOT NULL,
  `type_miel` text NOT NULL,
  `provenance_miel` text NOT NULL,
  `description_miel` text NOT NULL,
  `image` text NOT NULL,
  `prix` text NOT NULL,
  PRIMARY KEY (`id_miel`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `miel`
--

INSERT INTO `miel` (`id_miel`, `nom_miel`, `type_miel`, `provenance_miel`, `description_miel`, `image`, `prix`) VALUES
(2, 'Miel de fleurs sauvages', 'Miel multifloral', 'France (dans le Jura)', 'Le miel de fleurs sauvages peut avoir une couleur qui va du jaune jusqu’au beige, ou peut également être plus foncé et avoir une teinte plutôt brun ambrée. Son goût est doux et délicat, il se marie bien avec les fromages et est excellent pour être consommé seul, par exemple dans du yaourt ou du lait. Antitussif et anti-bactérien, ce miel est une excellente source d\'énergie pour les sportifs.', 'miel_fleurs_sauvages.jpg', '15.99'),
(4, 'Miel d\'eucalyptus', 'Miel monofloral', 'France (En Auvergne-Rhône-Alpes et en Occitanie)', 'Le miel d’eucalyptus a une couleur ambrée claire, une saveur très parfumée, aromatique et légèrement balsamique. Excellent pour la préparation de desserts ou en combinaison avec des fromages, y compris des fromages bleus. Ce miel est très riche en antioxydants et donc parfait pour lutter contre le vieillissement cellulaire.', 'miel_eucalyptus.jpg', '10.99'),
(5, 'Miel de Manuka', 'Miel monofloral', 'Nouvelle-Zélande', 'Fabriqué à partir d’arbres présents seulement en Nouvelle-Zélande, le miel de Manuka a une texture très épaisse et onctueuse. Sa couleur est jaune clair et il a une saveur forte et intense.', 'miel_manuka.jpg', '25.99'),
(26, 'Miel de tilleul', 'monofloral', 'France (dans le bassin parisien)', 'La couleur du miel de tilleul est jaune clair et sa saveur est agréablement aromatique et délicate. Parfait pour sucrer les boissons chaudes comme le thé et le café, mais aussi pour accompagner les fromages frais. Excellent remède contre les maux de tête et l\'insomnie, ce miel neutralise la tachycardie, l\'anxiété et le stress.\r\n', 'photo_26.png', '9.00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detailscommandes`
--
ALTER TABLE `detailscommandes`
  ADD CONSTRAINT `detailscommandes_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailscommandes_ibfk_2` FOREIGN KEY (`id_miel`) REFERENCES `miel` (`id_miel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
