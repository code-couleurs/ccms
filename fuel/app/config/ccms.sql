-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Avril 2014 à 17:37
-- Version du serveur: 5.5.35-0ubuntu0.13.10.2
-- Version de PHP: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ccms`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocs`
--

CREATE TABLE IF NOT EXISTS `blocs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `position` int(11) unsigned NOT NULL,
  `revision_id` int(11) unsigned NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  `pagebox_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagebox_id` (`pagebox_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `blocs`
--

INSERT INTO `blocs` (`id`, `code`, `position`, `revision_id`, `date_creation`, `date_modification`, `pagebox_id`) VALUES
(1, 'bloc_texte', 1, 4, 1396537827, 1396537827, NULL),
(2, 'bloc_chapo', 1, 5, 1396537948, 1396537948, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `blocs_caroussel`
--

CREATE TABLE IF NOT EXISTS `blocs_caroussel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` text,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `blocs_caroussel_image`
--

CREATE TABLE IF NOT EXISTS `blocs_caroussel_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `path` varchar(100) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `bloccaroussel_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `blocs_chapo`
--

CREATE TABLE IF NOT EXISTS `blocs_chapo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `blocs_chapo`
--

INSERT INTO `blocs_chapo` (`id`, `contenu`, `bloc_id`) VALUES
(1, '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">\n<html><body><p>\r\n	Bienvenue sur le CMS</p></body></html>\n', 2);

-- --------------------------------------------------------

--
-- Structure de la table `blocs_image`
--

CREATE TABLE IF NOT EXISTS `blocs_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` text,
  `path` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `blocs_texte`
--

CREATE TABLE IF NOT EXISTS `blocs_texte` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `blocs_texte`
--

INSERT INTO `blocs_texte` (`id`, `titre`, `contenu`, `bloc_id`) VALUES
(1, '', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">\n<html><body><p>\r\n	CCMS est un CMS d&eacute;velopp&eacute; pour RTE par Code Couleurs</p></body></html>\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `blocs_texte_media`
--

CREATE TABLE IF NOT EXISTS `blocs_texte_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `media` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `blocs_video`
--

CREATE TABLE IF NOT EXISTS `blocs_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `caption` text,
  `path` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `droit` varchar(100) NOT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  `rubrique_id` smallint(5) unsigned DEFAULT NULL,
  `page_id` smallint(5) unsigned DEFAULT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  KEY `droit` (`droit`),
  KEY `rubrique_id` (`rubrique_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_utilisateurs'),
('app', 'default', '002_create_pages'),
('app', 'default', '003_create_rubriques'),
('app', 'default', '004_create_droits'),
('app', 'default', '005_insertion_utilisateurs'),
('app', 'default', '006_create_revisions'),
('app', 'default', '007_create_blocs'),
('module', 'blocimage', '001_create_image'),
('module', 'bloctexte', '001_create_blocs_textes'),
('module', 'blocvideo', '001_create_video');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `template` varchar(100) NOT NULL DEFAULT 'standard',
  `position` smallint(5) unsigned NOT NULL,
  `rubrique_id` smallint(5) unsigned NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `url`, `template`, `position`, `rubrique_id`, `date_creation`, `date_modification`) VALUES
(2, 'Accueil', 'Accueil', 'accueil', 1, 0, 1396536000, 1396536000),
(4, 'CCMS ?', 'A-propos', 'standard', 1, 1, 1396537773, 1396537787);

-- --------------------------------------------------------

--
-- Structure de la table `pages_box`
--

CREATE TABLE IF NOT EXISTS `pages_box` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `bloc_parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `revisions`
--

CREATE TABLE IF NOT EXISTS `revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `page_id` smallint(5) unsigned NOT NULL,
  `contributeur_id` int(10) unsigned DEFAULT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `revisions`
--

INSERT INTO `revisions` (`id`, `type`, `intitule`, `page_id`, `contributeur_id`, `date_creation`, `date_modification`) VALUES
(1, 'archive', 'Etat initial', 2, NULL, 1396536000, 1396537952),
(3, 'archive', 'Etat initial', 4, NULL, 1396537773, 1396537982),
(4, 'current', 'Brouillon 03/04/2014', 4, NULL, 1396537800, 1396537982),
(5, 'current', 'Brouillon 03/04/2014', 2, NULL, 1396537869, 1396537952);

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE IF NOT EXISTS `rubriques` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) NOT NULL,
  `position` smallint(5) unsigned NOT NULL,
  `parent_id` smallint(5) unsigned NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `rubriques`
--

INSERT INTO `rubriques` (`id`, `intitule`, `position`, `parent_id`, `date_creation`, `date_modification`) VALUES
(1, 'A propos', 2, 0, 1396537768, 1396537768);

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE IF NOT EXISTS `temoignages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL DEFAULT '',
  `contenu` text,
  `path_image` varchar(100) NOT NULL,
  `path_pdf` varchar(100) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `bloctemoignage_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `password`, `email`, `is_admin`, `date_creation`, `date_modification`) VALUES
(1, 'Hanin', 'Roger', 'admin', 'IDTzqKoWxCp1Z4xLdab686oMQeqDlE3iqxLdABOMKes=', '', 1, 0, 1396537577);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
