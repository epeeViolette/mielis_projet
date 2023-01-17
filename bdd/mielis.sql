-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 jan. 2023 à 13:31
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
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` text NOT NULL,
  `prenom_client` text NOT NULL,
  `adresse_client` text NOT NULL,
  `cp_client` text NOT NULL,
  `ville_client` text NOT NULL,
  `tel_client` text NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleve` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_miel` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `miel`
--

INSERT INTO `miel` (`id_miel`, `nom_miel`, `type_miel`, `provenance_miel`, `description_miel`, `image`, `prix`) VALUES
(2, 'Miel de fleurs sauvages', 'Miel multifloral', 'France (dans le Jura)', 'Le miel de fleurs sauvages peut avoir une couleur qui va du jaune jusqu’au beige, ou peut également être plus foncé et avoir une teinte plutôt brun ambrée. Son goût est doux et délicat, il se marie bien avec les fromages et est excellent pour être consommé seul, par exemple dans du yaourt ou du lait. Antitussif et anti-bactérien, ce miel est une excellente source d\'énergie pour les sportifs.', 'miel_fleurs_sauvages.jpg', ''),
(3, 'Miel de châtaignier', 'Miel monofloral', 'Italie', 'De couleur ambrée plus ou moins claire, le miel de châtaignier a un goût très intense et parfois légèrement amer. Il est excellent en accord avec des fromages de caractère. Anti-bactérien et anti-inflammatoire, ce miel est parfait pour calmer les symptômes de la grippe.', 'miel_chataignier.jpg', ''),
(4, 'Miel d\'eucalyptus', 'Miel monofloral', 'France (En Auvergne-Rhône-Alpes et en Occitanie)', 'Le miel d’eucalyptus a une couleur ambrée claire, une saveur très parfumée, aromatique et légèrement balsamique. Excellent pour la préparation de desserts ou en combinaison avec des fromages, y compris des fromages bleus. Ce miel est très riche en antioxydants et donc parfait pour lutter contre le vieillissement cellulaire.', 'miel_eucalyptus.jpg', ''),
(5, 'Miel de Manuka', 'Miel monofloral', 'Nouvelle-Zélande', 'Fabriqué à partir d’arbres présents seulement en Nouvelle-Zélande, le miel de Manuka a une texture très épaisse et onctueuse. Sa couleur est jaune clair et il a une saveur forte et intense.', 'miel_manuka.jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
