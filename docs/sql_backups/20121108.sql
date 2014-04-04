-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 08 Novembre 2012 à 11:38
-- Version du serveur: 5.5.24
-- Version de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cmsrte`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `blocs`
--

INSERT INTO `blocs` (`id`, `code`, `position`, `revision_id`, `date_creation`, `date_modification`) VALUES
(18, 'bloc_texte', 2, 14, 1352308449, 1352308449),
(19, 'bloc_texte', 3, 14, 1352309261, 1352309261),
(20, 'bloc_texte', 4, 14, 1352309364, 1352309364),
(21, 'bloc_texte', 5, 14, 1352309430, 1352309430),
(22, 'bloc_texte', 6, 14, 1352309478, 1352309478);

-- --------------------------------------------------------

--
-- Structure de la table `blocs_chapo`
--

CREATE TABLE IF NOT EXISTS `blocs_chapo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `bloc_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `blocs_texte`
--

INSERT INTO `blocs_texte` (`id`, `titre`, `contenu`, `bloc_id`) VALUES
(1, 'Description', '<p>\r\n	Le Bilan de Comp&eacute;tence permet au salari&eacute; de faire le point sur ses aptitudes, ses potentiels et ses motivations personnelles et professionnelles pour l&rsquo;aider, le cas &eacute;ch&eacute;ant, dans la d&eacute;finition de son projet professionnel. Il permet &eacute;galement au salari&eacute; d&rsquo;&eacute;valuer la faisabilit&eacute; de son projet.</p>\r\n<p>\r\n	Le bilan de comp&eacute;tences ne permet pas, en soit, une modification de la situation professionnelle du salari&eacute;.<br />\r\n	Pendant l&rsquo;entretien de professionnalisation,&nbsp;le bilan de comp&eacute;tences peut &ecirc;tre propos&eacute;, soit par le salari&eacute;, soit par son manager.</p>\r\n<p>\r\n	A la demande du manager et avec le consentement du salari&eacute;, il peut &ecirc;tre r&eacute;alis&eacute; sur le plan de formation.<br />\r\n	A la demande du salari&eacute; et avec l&rsquo;accord de son manager il peut &ecirc;tre r&eacute;alis&eacute; sur le Droit Individuel &agrave; la Formation (DIF).</p>\r\n<p>\r\n	En cas de d&eacute;saccord du manager, le bilan de comp&eacute;tences peut &ecirc;tre r&eacute;alis&eacute; dans le cadre d&rsquo;un Cong&eacute; Individuel de Formation (CIF).</p>\r\n', 18),
(2, 'A qui s’adresse ce dispositif ?', '<p>\r\n	Ce dispositif s&rsquo;adresse &agrave; l&rsquo;ensemble des salari&eacute;s. En cas de recours au CIF, le salari&eacute; doit justifier de cinq ann&eacute;es d&rsquo;exp&eacute;rience et de douze mois d&rsquo;anciennet&eacute; dans l&rsquo;entreprise.</p>\r\n', 19),
(3, 'Procédure à suivre', '<p>\r\n	Lorsque le bilan de comp&eacute;tences est r&eacute;alis&eacute; dans le cadre du plan de formation,</p>\r\n<ul>\r\n	<li>\r\n		Le correspondant formation est en charge de l&rsquo;organisation de cette action et propose le prestataire.</li>\r\n	<li>\r\n		Le manager propose au salari&eacute; une convention tripartite (employeur, salari&eacute;, prestataire) pour recueillir son accord. Cette convention pr&eacute;cise les conditions d&rsquo;une &eacute;ventuelle transmission du document de synth&egrave;se par le salari&eacute; &agrave; l&rsquo;employeur. Le salari&eacute; dispose d&rsquo;un d&eacute;lai de 10 jours pour l&rsquo;accepter, en restituant &agrave; son manager le document sign&eacute;. L&rsquo;absence de r&eacute;ponse du salari&eacute; vaut refus de sa part.</li>\r\n</ul>\r\n<p>\r\n	Lorsque le bilan de comp&eacute;tences est r&eacute;alis&eacute; dans le cadre d&rsquo;un DIF,</p>\r\n<ul>\r\n	<li>\r\n		Apr&egrave;s accord verbal de son manager, le salari&eacute; doit confirmer sa demande par un formulaire de demande de DIF (lien vers proc&eacute;dure DIF).</li>\r\n	<li>\r\n		Le prestataire, pr&eacute;cis&eacute; dans une convention tripartite, est s&eacute;lectionn&eacute; apr&egrave;s concertation entre manager, salari&eacute; et RH.</li>\r\n	<li>\r\n		Le salari&eacute; est le seul b&eacute;n&eacute;ficiaire et propri&eacute;taire du document de synth&egrave;se &eacute;tabli par le prestataire.</li>\r\n</ul>\r\n<p>\r\n	Lorsque le bilan se fait dans le cadre d&rsquo;un CIF,</p>\r\n<ul>\r\n	<li>\r\n		Le salari&eacute; doit se rapprocher de l&rsquo;UNAGECIF pour conna&icirc;tre les conditions de mise en &oelig;uvre et les modalit&eacute;s pratiques de sa demande de prise en charge (voir descriptif du dispositif CIF).</li>\r\n	<li>\r\n		Le prestataire doit faire partie de la liste des prestataires agr&eacute;es par UNAGECIF.</li>\r\n	<li>\r\n		Le salari&eacute; est le seul b&eacute;n&eacute;ficiaire et propri&eacute;taire du document de synth&egrave;se &eacute;tabli par le prestataire.</li>\r\n</ul>\r\n', 20),
(4, 'Déroulement du bilan de compétences', '<p>\r\n	Le bilan de comp&eacute;tences se d&eacute;roule sur une dur&eacute;e totale de 24 heures, en trois &eacute;tapes&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		la phase pr&eacute;liminaire&nbsp;: elle est destin&eacute;e &agrave; la d&eacute;finition et &agrave; l&rsquo;analyse des besoins du salari&eacute; et &agrave; son information sur les conditions de d&eacute;roulement du bilan et les moyens utilis&eacute;s.</li>\r\n	<li>\r\n		la phase d&rsquo;investigation&nbsp;: elle est centr&eacute;e sur les comp&eacute;tences, aptitudes et &eacute;volutions professionnelles du salari&eacute;.</li>\r\n	<li>\r\n		la phase de conclusion&nbsp;: le bilan se termine par des entretiens personnalis&eacute;s durant lesquels les r&eacute;sultats du bilan sont expos&eacute;s au salari&eacute;. Ces r&eacute;sultats se pr&eacute;sentent sous la forme d&rsquo;un document de synth&egrave;se.</li>\r\n</ul>\r\n', 21),
(5, 'Liens utiles', '<p>\r\n	<a href="http://www.unagecif.com/" target="_blank">Site UNAGECIF (liste des prestataires agr&eacute;&eacute;s)</a></p>\r\n', 22);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `droits`
--

INSERT INTO `droits` (`id`, `droit`, `utilisateur_id`, `rubrique_id`, `page_id`, `date_creation`, `date_modification`) VALUES
(68, 'contributeur', 1, 0, NULL, 1351785695, 1351785695),
(82, 'contributeur', 1, 0, NULL, 1351787392, 1351787392);

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
('module', 'bloctexte', '001_create_blocs_textes');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `url`, `template`, `position`, `rubrique_id`, `date_creation`, `date_modification`) VALUES
(1, 'Accueil', 'Accueil', 'accueil', 1, 0, 1352126526, 1352369109),
(3, 'page 1.1.1', 'page-1-1-1', 'standard', 1, 2, 1352208752, 1352208752),
(5, 'Actualités des pôles', 'Actualites-des-poles', 'standard', 1, 11, 1352213568, 1352213568),
(6, 'Maintenance Courante Poste', 'Maintenance-Courante-Poste', 'standard', 2, 11, 1352213579, 1352213579),
(7, 'Exploitation', 'Exploitation', 'standard', 3, 11, 1352213598, 1352213598),
(8, 'Développement Ingénierie Réseau', 'Developpement-Ingenierie-Reseau', 'standard', 4, 11, 1352213613, 1352213613),
(9, 'Maintenance Courante Electrique', 'Maintenance-Courante-Electrique', 'standard', 5, 11, 1352213630, 1352213630),
(10, 'Maintenance Télécom et SI', 'Maintenance-Telecom-et-SI', 'standard', 6, 11, 1352213646, 1352213646),
(11, 'Maintenance Spécialisée Poste', 'Maintenance-Specialisee-Poste', 'standard', 7, 11, 1352213657, 1352213657),
(12, 'Management et métiers transverses', 'Management-et-metiers-transverses', 'standard', 8, 11, 1352213668, 1352213668),
(13, 'Innovation et Ingénierie de la Formation', 'Innovation-et-Inegnierie-de-la-Formation', 'standard', 9, 11, 1352213684, 1352213691),
(14, 'Bilan de compétences', 'Bilan-de-competence', 'standard', 2, 13, 1352213719, 1352217649),
(15, 'Validation des acquis (VAE)', 'Validation-des-acquis-de-lexperience', 'standard', 3, 13, 1352215042, 1352368750),
(16, 'Droit individuel à la formation (DIF)', 'Droits-individuels-a-la-formation-DIF', 'standard', 4, 13, 1352215058, 1352368763),
(17, 'Formation promotionnelle et accompagnement de la promotion', 'Formation-promotionnelle-et-accompagnement-de-la-promotion', 'standard', 5, 13, 1352215068, 1352217649),
(18, 'Congé individuel de formation (CIF)', 'Conge-individuel-de-formation-cif', 'standard', 6, 13, 1352215075, 1352217649),
(20, 'S''inscrire en formation', 'Inscription-mode-demploi', 'standard', 2, 14, 1352215099, 1352368810),
(21, 'Offres métiers techniques', 'Offres-metiers', 'standard', 1, 15, 1352215179, 1352217736),
(22, 'Offres management et métiers transverses', 'Offres-managements', 'standard', 2, 15, 1352215192, 1352217751),
(23, 'Infos pratiques, accès, contact', 'Infos-pratiques-acces-contact', 'standard', 1, 16, 1352215234, 1352368900),
(24, 'Zoom sur votre stage', 'Votre-stage-a-la-loupe', 'standard', 2, 16, 1352215245, 1352368946),
(26, 'Mission et valeurs', 'Mission-et-valeurs', 'standard', 1, 19, 1352215642, 1352217909),
(27, 'Livret d''accueil', 'Livret-daccueil', 'standard', 3, 19, 1352215655, 1352217909),
(31, 'Editos', 'Editorial', 'standard', 1, 10, 1352217595, 1352369109),
(32, 'Actus des projets', 'Dps-en-projets', 'standard', 2, 10, 1352217604, 1352369109),
(33, 'Choisir son dispositif', 'Quels-dispositifs-pour-quel-projet', 'standard', 1, 13, 1352217646, 1352368732),
(34, 'Chiffres clef', 'Chiffres-clef', 'standard', 2, 19, 1352217780, 1352217909),
(37, 'Accès infos pratiques', 'Acces-infos-pratiques', 'standard', 2, 6, 1352217876, 1352369048),
(38, 'Le métier de formateur', 'Le-metier-de-formateur', 'standard', 1, 6, 1352217889, 1352369048),
(43, 'redirection espace stagiaire', 'http://portail-formation/?redirect=espace_stagiaire', 'standard', 1, 7, 1352304406, 1352304406),
(44, 'redirection espaces reserves', 'http://portail-formation/?redirect=espaces_reserves', 'standard', 1, 24, 1352304857, 1352304857),
(45, 'Formations inscrites au Plan', 'Formations-inscrites-au-plan', 'standard', 7, 13, 1352368781, 1352368790),
(46, 'Actualité de l''offre', 'Actualite-de-loffre', 'standard', 1, 5, 1352368869, 1352368912),
(47, 'Métiers techniques', 'Metiers-techniques', 'standard', 2, 5, 1352368883, 1352368912),
(48, 'Management et métiers transverses', 'Management-et-metiers-transverses', 'standard', 3, 5, 1352368896, 1352368912),
(50, 'Contactez le DPS', 'contact', 'contact', 1, 25, 1352369181, 1352370331);

-- --------------------------------------------------------

--
-- Structure de la table `revisions`
--

CREATE TABLE IF NOT EXISTS `revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `page_id` smallint(5) unsigned NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `revisions`
--

INSERT INTO `revisions` (`id`, `type`, `intitule`, `page_id`, `date_creation`, `date_modification`) VALUES
(1, 'current', 'Etat initial', 1, 1352126526, 1352126526),
(3, 'current', 'Etat initial', 3, 1352208752, 1352208752),
(5, 'current', 'Etat initial', 5, 1352213568, 1352213568),
(6, 'current', 'Etat initial', 6, 1352213579, 1352213579),
(7, 'current', 'Etat initial', 7, 1352213598, 1352213598),
(8, 'current', 'Etat initial', 8, 1352213613, 1352213613),
(9, 'current', 'Etat initial', 9, 1352213630, 1352213630),
(10, 'current', 'Etat initial', 10, 1352213646, 1352213646),
(11, 'current', 'Etat initial', 11, 1352213657, 1352213657),
(12, 'current', 'Etat initial', 12, 1352213668, 1352213668),
(13, 'current', 'Etat initial', 13, 1352213684, 1352213684),
(14, 'current', 'Etat initial', 14, 1352213719, 1352213719),
(15, 'current', 'Etat initial', 15, 1352215042, 1352215042),
(16, 'current', 'Etat initial', 16, 1352215059, 1352215059),
(17, 'current', 'Etat initial', 17, 1352215068, 1352215068),
(18, 'current', 'Etat initial', 18, 1352215075, 1352215075),
(20, 'current', 'Etat initial', 20, 1352215099, 1352215099),
(21, 'current', 'Etat initial', 21, 1352215179, 1352215179),
(22, 'current', 'Etat initial', 22, 1352215192, 1352215192),
(23, 'current', 'Etat initial', 23, 1352215234, 1352215234),
(24, 'current', 'Etat initial', 24, 1352215245, 1352215245),
(26, 'current', 'Etat initial', 26, 1352215642, 1352215642),
(27, 'current', 'Etat initial', 27, 1352215656, 1352215656),
(31, 'current', 'Etat initial', 31, 1352217595, 1352217595),
(32, 'current', 'Etat initial', 32, 1352217604, 1352217604),
(33, 'current', 'Etat initial', 33, 1352217646, 1352217646),
(34, 'current', 'Etat initial', 34, 1352217780, 1352217780),
(37, 'current', 'Etat initial', 37, 1352217876, 1352217876),
(38, 'current', 'Etat initial', 38, 1352217889, 1352217889),
(43, 'current', 'Etat initial', 43, 1352304406, 1352304406),
(44, 'current', 'Etat initial', 44, 1352304857, 1352304857),
(45, 'current', 'Etat initial', 45, 1352368781, 1352368781),
(46, 'current', 'Etat initial', 46, 1352368869, 1352368869),
(47, 'current', 'Etat initial', 47, 1352368883, 1352368883),
(48, 'current', 'Etat initial', 48, 1352368896, 1352368896),
(50, 'current', 'Etat initial', 50, 1352369181, 1352369181);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `rubriques`
--

INSERT INTO `rubriques` (`id`, `intitule`, `position`, `parent_id`, `date_creation`, `date_modification`) VALUES
(3, 'Actualités', 1, 0, 1352213387, 1352216694),
(4, 'Se professionnaliser', 2, 0, 1352213393, 1352213393),
(5, 'L''offre du DPS', 3, 0, 1352213401, 1352213401),
(6, 'Connaître le DPS', 4, 0, 1352213409, 1352213409),
(7, 'Espace Stagiaire', 5, 0, 1352213416, 1352213416),
(10, 'Actualités du DPS', 1, 3, 1352213522, 1352213522),
(11, 'Actualités des pôles', 2, 3, 1352213527, 1352213527),
(13, 'Les dispositifs', 1, 4, 1352213711, 1352217625),
(14, 'S''inscrire en formation', 2, 4, 1352215145, 1352217676),
(16, 'Venir en formation au DPS', 2, 5, 1352215221, 1352215221),
(19, 'Présentation du département', 1, 6, 1352215625, 1352215978),
(24, 'Espace réservé', 6, 0, 1352216708, 1352369083),
(25, 'Contact', 7, 0, 1352369173, 1352369173);

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
  `is_admin` tinyint(1) NOT NULL,
  `date_creation` int(11) NOT NULL,
  `date_modification` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `password`, `is_admin`, `date_creation`, `date_modification`) VALUES
(1, 'Marguin', 'Eric', 'admin', 'IDTzqKoWxCp1Z4xLdab686oMQeqDlE3iqxLdABOMKes=', 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
