-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 14 Novembre 2012 à 11:21
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `blocs`
--

INSERT INTO `blocs` (`id`, `code`, `position`, `revision_id`, `date_creation`, `date_modification`) VALUES
(18, 'bloc_texte', 4, 14, 1352308449, 1352308449),
(19, 'bloc_texte', 8, 14, 1352309261, 1352309261),
(20, 'bloc_texte', 8, 14, 1352309364, 1352309364),
(21, 'bloc_texte', 8, 14, 1352309430, 1352309430),
(22, 'bloc_texte', 8, 14, 1352309478, 1352309478),
(23, 'bloc_texte', 3, 15, 1352373530, 1352373530),
(24, 'bloc_texte', 4, 15, 1352373609, 1352373609),
(25, 'bloc_texte', 8, 15, 1352373731, 1352373731),
(26, 'bloc_texte', 8, 15, 1352373816, 1352373816),
(27, 'bloc_texte', 3, 16, 1352373931, 1352373931),
(28, 'bloc_texte', 4, 16, 1352373965, 1352373965),
(29, 'bloc_texte', 8, 16, 1352374011, 1352374011),
(31, 'bloc_texte', 8, 16, 1352374127, 1352374127),
(32, 'bloc_texte', 1, 17, 1352374276, 1352881773),
(33, 'bloc_texte', 3, 17, 1352374336, 1352881766),
(35, 'bloc_texte', 7, 17, 1352374424, 1352881842),
(36, 'bloc_texte', 3, 18, 1352374497, 1352374497),
(37, 'bloc_texte', 4, 18, 1352374521, 1352374521),
(38, 'bloc_texte', 8, 18, 1352374588, 1352374588),
(39, 'bloc_texte', 8, 18, 1352374681, 1352374681),
(46, 'bloc_texte', 3, 51, 1352879811, 1352879811),
(47, 'bloc_texte', 4, 51, 1352879826, 1352879826),
(48, 'bloc_texte', 8, 51, 1352879850, 1352879850),
(49, 'bloc_image', 2, 15, 1352880193, 1352880197),
(50, 'bloc_texte', 4, 17, 1352881752, 1352881755),
(51, 'bloc_texte', 5, 17, 1352881807, 1352881814),
(52, 'bloc_texte', 6, 17, 1352881840, 1352881856);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `blocs_image`
--

INSERT INTO `blocs_image` (`id`, `caption`, `path`, `bloc_id`) VALUES
(2, '', 'vae.jpg', 49);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `blocs_texte`
--

INSERT INTO `blocs_texte` (`id`, `titre`, `contenu`, `bloc_id`) VALUES
(1, 'Description', '<p>\r\n	Le Bilan de Comp&eacute;tence permet au salari&eacute; de faire le point sur ses aptitudes, ses potentiels et ses motivations personnelles et professionnelles pour l&rsquo;aider, le cas &eacute;ch&eacute;ant, dans la d&eacute;finition de son projet professionnel. Il permet &eacute;galement au salari&eacute; d&rsquo;&eacute;valuer la faisabilit&eacute; de son projet et d&rsquo;envisager les modalit&eacute;s de r&eacute;alisation et d&rsquo;accompagnement de ce projet.</p>\r\n<p>\r\n	Le bilan de comp&eacute;tences ne permet pas, en soit, une modification de la situation professionnelle du salari&eacute;.<br />\r\n	Pendant l&rsquo;entretien de professionnalisation,&nbsp;le bilan de comp&eacute;tences peut &ecirc;tre propos&eacute; soit par le salari&eacute;, soit par son manager. Dans tous les cas, il est conseill&eacute; de se rapprocher de son conseiller carri&egrave;re.<br />\r\n	A l&rsquo;initiative du manager et avec le consentement du salari&eacute;, il peut &ecirc;tre r&eacute;alis&eacute; sur le Plan de Formation d&rsquo;Entreprise (<a href="/plan-de-formation">PFE</a>).</p>\r\n<p>\r\n	A la demande du salari&eacute; et avec l&rsquo;accord de son manager il peut &ecirc;tre r&eacute;alis&eacute; sur le Droit Individuel &agrave; la Formation (<a href="/Droits-individuels-a-la-formation-DIF">DIF</a>).</p>\r\n<p>\r\n	Sans n&eacute;cessiter l&rsquo;accord du manager sur son principe, le bilan de comp&eacute;tences peut &ecirc;tre r&eacute;alis&eacute; par le salari&eacute; dans le cadre d&rsquo;un Cong&eacute; Individuel de Formation (<a href="/conge-individuel-de-formation-cif">CIF</a>).</p>\r\n', 18),
(2, 'A qui s’adresse ce dispositif ?', '<p>\r\n	Ce dispositif s&rsquo;adresse &agrave; l&rsquo;ensemble des salari&eacute;s. En cas de recours au CIF, le salari&eacute; doit justifier de cinq ann&eacute;es d&rsquo;exp&eacute;rience et de douze mois d&rsquo;anciennet&eacute; dans l&rsquo;entreprise.</p>\r\n', 19),
(3, 'Procédure à suivre', '<p>\r\n	Lorsque le bilan de comp&eacute;tences est r&eacute;alis&eacute; dans le cadre du plan de formation,</p>\r\n<ul>\r\n	<li>\r\n		Le correspondant formation est en charge de l&rsquo;organisation de cette action et propose le prestataire.</li>\r\n	<li>\r\n		Le manager propose au salari&eacute; une convention tripartite (employeur, salari&eacute;, prestataire) pour recueillir son accord. Cette convention pr&eacute;cise les conditions d&rsquo;une &eacute;ventuelle transmission du document de synth&egrave;se par le salari&eacute; &agrave; l&rsquo;employeur. Le salari&eacute; dispose d&rsquo;un d&eacute;lai de 10 jours pour l&rsquo;accepter, en restituant &agrave; son manager le document sign&eacute;. L&rsquo;absence de r&eacute;ponse du salari&eacute; vaut refus de sa part.</li>\r\n</ul>\r\n<p>\r\n	Lorsque le bilan de comp&eacute;tences est r&eacute;alis&eacute; dans le cadre d&rsquo;un DIF,</p>\r\n<ul>\r\n	<li>\r\n		Apr&egrave;s accord verbal de son manager, le salari&eacute; doit confirmer sa demande par un formulaire de demande de DIF (lien vers proc&eacute;dure DIF).</li>\r\n	<li>\r\n		Le prestataire, pr&eacute;cis&eacute; dans une convention tripartite, est s&eacute;lectionn&eacute; apr&egrave;s concertation entre manager, salari&eacute; et RH.</li>\r\n	<li>\r\n		Le salari&eacute; est le seul b&eacute;n&eacute;ficiaire et propri&eacute;taire du document de synth&egrave;se &eacute;tabli par le prestataire.</li>\r\n</ul>\r\n<p>\r\n	Lorsque le bilan se fait dans le cadre d&rsquo;un CIF,</p>\r\n<ul>\r\n	<li>\r\n		Le salari&eacute; doit se rapprocher de l&rsquo;UNAGECIF pour conna&icirc;tre les conditions de mise en &oelig;uvre et les modalit&eacute;s pratiques de sa demande de prise en charge (voir descriptif du dispositif CIF).</li>\r\n	<li>\r\n		Le prestataire doit faire partie de la liste des prestataires agr&eacute;es par UNAGECIF.</li>\r\n	<li>\r\n		Le salari&eacute; est le seul b&eacute;n&eacute;ficiaire et propri&eacute;taire du document de synth&egrave;se &eacute;tabli par le prestataire.</li>\r\n</ul>\r\n', 20),
(4, 'Déroulement du bilan de compétences', '<p>\r\n	Le bilan de comp&eacute;tences se d&eacute;roule sur une dur&eacute;e totale de 24 heures, en trois &eacute;tapes&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		la phase pr&eacute;liminaire&nbsp;: elle est destin&eacute;e &agrave; la d&eacute;finition et &agrave; l&rsquo;analyse des besoins du salari&eacute; et &agrave; son information sur les conditions de d&eacute;roulement du bilan et les moyens utilis&eacute;s.</li>\r\n	<li>\r\n		la phase d&rsquo;investigation&nbsp;: elle est centr&eacute;e sur les comp&eacute;tences, aptitudes et &eacute;volutions professionnelles du salari&eacute;.</li>\r\n	<li>\r\n		la phase de conclusion&nbsp;: le bilan se termine par des entretiens personnalis&eacute;s durant lesquels les r&eacute;sultats du bilan sont expos&eacute;s au salari&eacute;. Ces r&eacute;sultats se pr&eacute;sentent sous la forme d&rsquo;un document de synth&egrave;se.</li>\r\n</ul>\r\n', 21),
(5, 'Liens utiles', '<p>\r\n	<a href="http://www.unagecif.com/" target="_blank">Site UNAGECIF (liste des prestataires agr&eacute;&eacute;s)</a></p>\r\n', 22),
(6, 'Description', '<p>\r\n	La Validation des Acquis de l&rsquo;Exp&eacute;rience (VAE) est une d&eacute;marche volontaire d&rsquo;un salari&eacute; qui, dans le cadre de son projet professionnel, a besoin d&rsquo;une reconnaissance officielle de l&rsquo;exp&eacute;rience qu&rsquo;il a acquise dans le cadre de ses activit&eacute;s professionnelles ou extra-professionnelles. Cette reconnaissance officielle passe par tout ou partie d&rsquo;une certification enregistr&eacute;e au r&eacute;pertoire national des certifications professionnelles (RNCP), d&rsquo;un dipl&ocirc;me, d&rsquo;un titre &agrave; finalit&eacute; professionnelle ou d&rsquo;un certificat de qualification professionnelle (CQP) &eacute;tabli par la branche professionnelle.</p>\r\n<p>\r\n	L&rsquo;obtention du dipl&ocirc;me ou de la certification vis&eacute;s ne permet pas, en soit, une modification de la situation professionnelle du salari&eacute;.</p>\r\n<p>\r\n	En r&egrave;gle g&eacute;n&eacute;rale, l&rsquo;accompagnement du projet professionnel par une VAE est d&eacute;cid&eacute; dans le cadre de l&rsquo;entretien de professionnalisation. Cette VAE peut &ecirc;tre r&eacute;alis&eacute;e :</p>\r\n<ul>\r\n	<li>\r\n		Dans le cadre du plan de formation lorsqu&rsquo;il s&rsquo;agit d&rsquo;une d&eacute;marche concert&eacute;e entre le salari&eacute; et son manager,</li>\r\n	<li>\r\n		Dans le cadre du Droit Individuel &agrave; la Formation (<a href="/validation-des-acquis-vae">DIF</a>)&nbsp;si elle se fait &agrave; l&rsquo;initiative du salari&eacute; avec l&rsquo;accord du manager,</li>\r\n	<li>\r\n		Dans le cadre du Cong&eacute; Individuel de Formation (<a href="http://conge-individuel-de-formation-cif">CIF</a>) &agrave; l&rsquo;initiative du salari&eacute; sans besoin d&rsquo;accord du manager.</li>\r\n</ul>\r\n<p>\r\n	Les dur&eacute;es accord&eacute;es au salari&eacute; pour la d&eacute;marche de VAE sont respectivement de 35 heures lorsque cette action est r&eacute;alis&eacute;e dans le cadre du plan de formation et de 24 heures lorsqu&rsquo;elle est r&eacute;alis&eacute;e dans le cadre du DIF ou d&rsquo;un CIF.</p>\r\n<p>\r\n	Lorsque plusieurs salari&eacute;s souhaitent faire reconnaitre leur exp&eacute;rience au travers du m&ecirc;me dipl&ocirc;me ou de dipl&ocirc;mes voisins et que cette d&eacute;marche int&eacute;resse l&rsquo;entreprise, RTE pourra proposer aux salari&eacute;s concern&eacute;s un accompagnement par un organisme externe, dans le cadre d&rsquo;une <a class="fancyvideo" href="/files/video-vae.mp4">VAE accompagn&eacute;e</a>. Cet accompagnement porte essentiellement sur la phase de constitution du dossier de VAE et sur la pr&eacute;paration de l&rsquo;entretien devant le jury de VAE.</p>\r\n', 23),
(7, 'A qui s’adresse ce dispositif ?', '<p>\r\n	A tous les salari&eacute;s justifiant de trois ans d&rsquo;exp&eacute;rience dans un domaine correspondant au contenu du dipl&ocirc;me vis&eacute;.</p>\r\n', 24),
(8, 'Déroulement d’une VAE', '<p>\r\n	<strong>Constitution du dossier</strong></p>\r\n<p>\r\n	Pour le salari&eacute;, il est important de viser un dipl&ocirc;me correspondant au mieux &agrave; son exp&eacute;rience. Dans ce but, le salari&eacute; pourra utilement demander conseil&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		A son manager, son correspondant formation ou encore son conseiller carri&egrave;re,</li>\r\n	<li>\r\n		Le cas &eacute;ch&eacute;ant, au Dispositif Acad&eacute;mique de Validation des Acquis (DAVA) de son acad&eacute;mie, ainsi que</li>\r\n	<li>\r\n		Au Centre Acad&eacute;mique de Validation des Acquis (CAVA) &eacute;galement pr&eacute;sent dans chaque acad&eacute;mie.</li>\r\n	<li>\r\n		Et enfin &agrave; un conseiller de l&rsquo;UNAGECIF.</li>\r\n</ul>\r\n<p>\r\n	Apr&egrave;s retrait du dossier aupr&egrave;s de l&rsquo;institution qui dispense le dipl&ocirc;me, le salari&eacute; constitue un dossier en r&eacute;unissant les justificatifs correspondant au dipl&ocirc;me vis&eacute;. Son exp&eacute;rience doit &ecirc;tre analys&eacute;e et d&eacute;crite en lien avec le dipl&ocirc;me vis&eacute;.<br />\r\n	Le salari&eacute; ne peut d&eacute;poser qu&rsquo;un seul dossier de VAE par ann&eacute;e civile pour le m&ecirc;me dipl&ocirc;me.<br />\r\n	<br />\r\n	<strong>Validation des acquis</strong></p>\r\n<p>\r\n	La demande de VAE et les documents qui l&rsquo;accompagnent sont soumis au jury de l&rsquo;organisme dispensateur du dipl&ocirc;me ; celui-ci est constitu&eacute; d&rsquo;un quart de professionnels. Le processus de validation est g&eacute;r&eacute; par l&rsquo;organisme sollicit&eacute;.</p>\r\n<p>\r\n	Le jury va comparer les comp&eacute;tences acquises par le salari&eacute; et celles d&eacute;crites dans le r&eacute;f&eacute;rentiel du dipl&ocirc;me. A l&rsquo;issue de cette &eacute;tape, le jury peut d&eacute;cider&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		De valider l&rsquo;int&eacute;gralit&eacute; du dipl&ocirc;me,</li>\r\n	<li>\r\n		De ne valider qu&rsquo;une partie du dipl&ocirc;me&nbsp;: dans ce cas la d&eacute;cision s&rsquo;accompagne d&rsquo;une prescription d&rsquo;activit&eacute;s professionnelles ou de formation &agrave; r&eacute;aliser dans les 5 ans,</li>\r\n	<li>\r\n		De refuser la validation&nbsp;: ce cas met en &eacute;vidence que le dipl&ocirc;me vis&eacute; ne correspondait pas &agrave; l&rsquo;exp&eacute;rience acquise.</li>\r\n</ul>\r\n<p>\r\n	<strong>A l&rsquo;issue de la d&eacute;marche</strong></p>\r\n<p>\r\n	A son retour de VAE, le salari&eacute; peut demander &agrave; son manager un entretien de professionnalisation afin d&rsquo;examiner avec lui la suite de l&rsquo;accompagnement de son projet professionnel. Le cas &eacute;ch&eacute;ant, cet accompagnement peut inclure les formations prescrites par le jury.</p>\r\n', 25),
(9, 'Liens utiles', '<ul>\r\n	<li>\r\n		<a href="http://www.rncp.cncp.gouv.fr/" target="_blank">RPNC : R&eacute;pertoire National des Certifications Professionnelles</a></li>\r\n	<li>\r\n		<a class="fancyvideo" href="/files/video-vae.mp4">La VAE accompagn&eacute;e &agrave; RTE</a></li>\r\n	<li>\r\n		<a href="http://eduscol.education.fr/pid23196-cid47044/vae-coordonnees-des-dava.html" target="_blank">Coordonn&eacute;es des DAVA</a></li>\r\n</ul>\r\n', 26),
(10, 'Description', '<p>\r\n	Le projet professionnel du salari&eacute; est discut&eacute; lors de l&rsquo;entretien de professionnalisation avec son manager. Le manager peut alors proposer au salari&eacute; un accompagnement de ce projet par un certain nombre d&rsquo;actions. Les actions de formation&nbsp; pourront &ecirc;tre r&eacute;alis&eacute;es&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		A la demande du manager, dans le cadre du plan de formation, notamment lorsque ces actions visent directement l&rsquo;adaptation du salari&eacute; &agrave; son poste de travail,</li>\r\n	<li>\r\n		A la demande du salari&eacute;, en l&rsquo;absence d&rsquo;accord de son manager, dans le cadre d&rsquo;un Cong&eacute; Individuel de Formation (<a href="/conge-individuel-de-formation-cif">CIF</a>).</li>\r\n	<li>\r\n		A la demande du salari&eacute;, avec l&rsquo;accord de son manager, dans le cadre de son Droit Individuel &agrave; la Formation (DIF) lorsque ces actions ne sont pas indispensables &agrave; la tenue de l&rsquo;emploi occup&eacute; mais pr&eacute;sentent un int&eacute;r&ecirc;t pour l&rsquo;entreprise ou la branche des IEG.</li>\r\n</ul>\r\n<p>\r\n	Sont par ailleurs &eacute;ligibles au DIF les d&eacute;marches de <a href="/validation-des-acquis-de-lexperience">Validation des Acquis de l&rsquo;Exp&eacute;rience</a> et de <a href="/bilan-de-competences">Bilan de Comp&eacute;tences</a> (dans la limite d&rsquo;un bilan tous les cinq ans).</p>\r\n<p>\r\n	Sauf exception, la dur&eacute;e des actions de formation que peut suivre un salari&eacute; dans le cadre de son DIF n&rsquo;exc&egrave;de pas son &laquo;&nbsp;compteur DIF&nbsp;&raquo;. Chaque ann&eacute;e, ce compteur est augment&eacute; de vingt heures et diminu&eacute; des &eacute;ventuelles actions de formation suivies par le salari&eacute;. Ce compteur est toutefois plafonn&eacute; &agrave; cent vingt heures, &agrave; l&rsquo;exception de d&eacute;rogations concernant les tuteurs.</p>\r\n', 27),
(11, 'A qui s’adresse ce dispositif ?', '<p>\r\n	Peut demander &agrave; suivre une action de formation dans le cadre de son DIF&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		Tout salari&eacute; sous Contrat &agrave; Dur&eacute;e Ind&eacute;termin&eacute;e (CDI) avec un an d&rsquo;anciennet&eacute; dans l&rsquo;entreprise,</li>\r\n	<li>\r\n		Tout salari&eacute; sous Contrat &agrave; Dur&eacute;e D&eacute;termin&eacute;e (CDD) &agrave; l&rsquo;issue d&rsquo;une dur&eacute;e de quatre mois, cons&eacute;cutifs ou non, sur une p&eacute;riode de douze mois.</li>\r\n</ul>\r\n<p>\r\n	Sont exclus de ce dispositif les salari&eacute;s sous contrat d&rsquo;apprentissage ou sous contrat de professionnalisation, ainsi que les int&eacute;rimaires (le DIF est alors g&eacute;r&eacute; par l&#39;entreprise d&#39;int&eacute;rim).</p>\r\n', 28),
(12, 'Déroulement', '<p>\r\n	Le lancement d&rsquo;une action dans le cadre du DIF s&rsquo;effectue &agrave; l&rsquo;initiative du salari&eacute;, par l&rsquo;envoi d&rsquo;une demande &agrave; son manager. Cette demande doit :</p>\r\n<ul>\r\n	<li>\r\n		Rappeler le lien entre cette action et le projet professionnel du salari&eacute;,</li>\r\n	<li>\r\n		Mentionner le nombre d&rsquo;heures du compteur DIF &agrave; utiliser,</li>\r\n	<li>\r\n		Indiquer les horaires souhait&eacute;s des actions de formation concern&eacute;es, Hors Temps de Travail (HTT) ou Sur Temps de Travail (STT).</li>\r\n</ul>\r\n<p>\r\n	La demande devra &ecirc;tre accompagn&eacute;e d&rsquo;un descriptif d&eacute;taill&eacute; de&nbsp;la formation.</p>\r\n<p>\r\n	La demande est alors examin&eacute;e par le manager, aid&eacute; en cela par le correspondant formation de l&rsquo;&eacute;tablissement et le gestionnaire formation. Le manager dispose d&rsquo;un d&eacute;lai d&rsquo;un mois apr&egrave;s r&eacute;ception de la demande pour r&eacute;pondre par &eacute;crit au salari&eacute;. En cas de refus de sa part, le manager explique au salari&eacute; les raisons de ce refus. Le cas &eacute;ch&eacute;ant, d&rsquo;autres voies de professionnalisation pourront &ecirc;tre recherch&eacute;es.</p>\r\n<p>\r\n	Les actions de formation suivies dans le cadre du DIF peuvent se d&eacute;rouler hors temps de travail. Elles donnent alors syst&eacute;matiquement lieu au versement au salari&eacute; d&rsquo;une allocation formation d&rsquo;un montant &eacute;gal &agrave; 50 % de sa r&eacute;mun&eacute;ration nette de r&eacute;f&eacute;rence.</p>\r\n<p>\r\n	Ces actions peuvent &eacute;galement se d&eacute;rouler sur le temps de travail. Dans ce cas, la r&eacute;mun&eacute;ration du salari&eacute; est maintenue, mais aucune allocation formation ne lui est vers&eacute;e.</p>\r\n', 29),
(13, 'Liens ou documents utiles', '<p>\r\n	<a href="/files/formulaire_demande_dif.pdf" target="_blank">Formulaire de demande d&rsquo;utilisation du DIF</a></p>\r\n', 31),
(14, 'Description', '<p>\r\n	Lorsque le projet professionnel du salari&eacute; int&egrave;gre un changement de coll&egrave;ge (d&rsquo;ex&eacute;cution &agrave; ma&icirc;trise ou de ma&icirc;trise &agrave; cadre), le salari&eacute; et son manager disposent de plusieurs moyens pour accompagner ce projet&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		La postulation du salari&eacute; sur des offres de formation promotionnelle,</li>\r\n	<li>\r\n		Une formation dipl&ocirc;mante adapt&eacute;e &agrave; la situation du salari&eacute;,</li>\r\n	<li>\r\n		Un changement de coll&egrave;ge accompagn&eacute; par des formations.</li>\r\n</ul>\r\n<p>\r\n	Les offres de formation promotionnelle concernent l&rsquo;ensemble des entreprises de la branche des IEG et l&rsquo;ensemble des salari&eacute;s de ces entreprises. Par ces offres, et apr&egrave;s s&eacute;lection des candidats, les entreprises permettent aux salari&eacute;s retenus de suivre une formation dipl&ocirc;mante de niveau Bac+2 (passage ma&icirc;trise) ou Bac+5 (passage cadre), &agrave; l&rsquo;issue de laquelle, sous condition d&#39;obtention du dipl&ocirc;me, un emploi correspondant &agrave; leur nouvelle qualification leur sera propos&eacute;.</p>\r\n<p>\r\n	Une formation dipl&ocirc;mante peut &eacute;galement &ecirc;tre propos&eacute;e &agrave; un salari&eacute; dans le cadre du plan de formation pour accompagner son projet professionnel.</p>\r\n<p>\r\n	Enfin, le changement de coll&egrave;ge peut &ecirc;tre d&eacute;cid&eacute; sans condition d&rsquo;obtention de dipl&ocirc;me. Dans ce cas, RTE peut accompagner le salari&eacute; nouvellement promu par des formations cibl&eacute;es, concert&eacute;es entre le salari&eacute; et son manager sur la base de ses comp&eacute;tences actuelles et des comp&eacute;tences qui seront attendues dans son nouvel emploi, ou par un dispositif complet de formation (de type ARCADRE). Ces formations permettront au salari&eacute; de s&rsquo;adapter plus rapidement &agrave; son nouvel emploi et seront, le cas &eacute;ch&eacute;ant, regroup&eacute;es dans une p&eacute;riode de professionnalisation.</p>\r\n<p>\r\n	Dans tous les cas, le passage de coll&egrave;ge sera accompagn&eacute; par une formation de quelques jours (ATOUT CADRE ou ATOUT MAITRISE) permettant au salari&eacute; de mieux conna&icirc;tre les enjeux de RTE, les acteurs du march&eacute; de l&rsquo;&eacute;lectricit&eacute; et l&rsquo;ensemble de l&rsquo;environnement de l&rsquo;entreprise.</p>\r\n', 32),
(15, 'A qui s’adressent les offres de formation promotionnelle ?', '<p>\r\n	Les offres de formation promotionnelle accessibles aux salari&eacute;s de RTE sont :</p>\r\n<ul>\r\n	<li>\r\n		La FPCAE Formation Promotionnelle Cadre Associ&eacute;e &agrave; un Emploi,</li>\r\n	<li>\r\n		La FPMAE Formation Promotionnelle Ma&icirc;trise Associ&eacute;e &agrave; un Emploi,</li>\r\n	<li>\r\n		Le CIC Cap Initiative Cadre,</li>\r\n	<li>\r\n		Le CIM Cap Initiative Ma&icirc;trise.</li>\r\n</ul>\r\n<p>\r\n	Ces offres sont accessibles &agrave; tous les salari&eacute;s dont le profil correspond aux offres de formation propos&eacute;es.</p>\r\n<p>\r\n	Les salari&eacute;s de RTE peuvent postuler sur des offres &eacute;mises par l&rsquo;ensemble des entreprises de la branche des IEG.&nbsp; De mani&egrave;re r&eacute;ciproque, les salari&eacute;s des autres entreprises de la branche sont en capacit&eacute; de postuler sur des offres &eacute;mises par RTE.</p>\r\n', 33),
(17, 'Liens ou documents utiles', '<ul>\r\n	<li>\r\n		<a href="http://www.rte-france.com/fr/nous-connaitre/talents-carrieres/defi-formation-offres-de-formations-promotionnelles" target="_blank">Offres de formation promotionnelle RTE</a></li>\r\n	<li>\r\n		Bourse de l&#39;emploi</li>\r\n</ul>\r\n', 35),
(18, 'Description', '<p>\r\n	Lorsque certaines actions de formation li&eacute;es au projet professionnel d&rsquo;un salari&eacute; ne sont pas prises en charge par l&rsquo;entreprise, ni dans le cadre du plan de formation, ni dans le cadre du DIF, celui-ci peut, &agrave; son initiative et &agrave; titre individuel, demander &agrave; b&eacute;n&eacute;ficier d&rsquo;un Cong&eacute; Individuel de Formation (CIF) qui lui permettra&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		De suivre ces actions de formation, qui peuvent notamment lui permettre de changer d&rsquo;activit&eacute; ou de profession, d&rsquo;acc&eacute;der &agrave; un niveau sup&eacute;rieur de qualification ou de s&rsquo;ouvrir &agrave; la culture, &agrave; la vie sociale et &agrave; l&rsquo;exercice de responsabilit&eacute;s,</li>\r\n	<li>\r\n		De b&eacute;n&eacute;ficier de la prise en charge financi&egrave;re de cette formation par un organisme externe&nbsp;: l&rsquo;UNAGECIF. La prise en charge concerne alors les frais p&eacute;dagogiques vers&eacute;s &agrave; l&rsquo;organisme de formation (n&eacute;anmoins plafonn&eacute;s), la r&eacute;mun&eacute;ration du salari&eacute; (r&eacute;mun&eacute;ration nette de r&eacute;f&eacute;rence), et, sous conditions, le remboursement des &eacute;ventuels frais de d&eacute;placement et d&rsquo;h&eacute;bergement.</li>\r\n</ul>\r\n<p>\r\n	La formation peut se d&eacute;rouler en tout ou partie sur le temps de travail, ou en totalit&eacute; hors temps de travail. La dur&eacute;e d&rsquo;un CIF d&eacute;pend de la formation choisie mais ne peut exc&eacute;der un an pour une formation &agrave; temps plein et 1&nbsp;200 heures pour une formation &agrave; temps partiel.</p>\r\n<p>\r\n	Durant le cong&eacute; individuel de formation, le contrat de travail du salari&eacute; est suspendu. Le salari&eacute; continue &agrave; percevoir sa r&eacute;mun&eacute;ration nette de r&eacute;f&eacute;rence sous r&eacute;serve de justifier de sa pr&eacute;sence en formation durant toute la dur&eacute;e du cong&eacute;.</p>\r\n<p>\r\n	A l&rsquo;issue de sa formation, le salari&eacute; r&eacute;int&egrave;gre son poste de&nbsp; travail ou un poste &eacute;quivalent, sans changement de r&eacute;mun&eacute;ration.</p>\r\n<p>\r\n	Si le salari&eacute; a obtenu durant son CIF un dipl&ocirc;me susceptible d&rsquo;int&eacute;resser l&rsquo;entreprise, il peut, &agrave; sa demande, figurer dans un &laquo; vivier &raquo; qui sera utilis&eacute; par le management pour l&rsquo;aider &agrave; acc&eacute;der &agrave; un emploi correspondant &agrave; sa nouvelle qualification.</p>\r\n<p>\r\n	A la demande du salari&eacute;, les actions de formation qu&rsquo;il aura suivies dans le cadre d&rsquo;un CIF pourront &ecirc;tre mentionn&eacute;es dans son passeport formation.</p>\r\n', 36),
(19, 'A qui s’adresse ce dispositif ?', '<p>\r\n	Pour b&eacute;n&eacute;ficier d&rsquo;un CIF, le salari&eacute; doit justifier d&rsquo;une anciennet&eacute; de 24 mois cons&eacute;cutifs.</p>\r\n<p>\r\n	Le cas &eacute;ch&eacute;ant, il doit &eacute;galement respecter un d&eacute;lai de franchise entre deux CIF, &eacute;gal &agrave; la dur&eacute;e du premier CIF (en heures) divis&eacute; par douze. Ce d&eacute;lai de franchise ne peut &ecirc;tre inf&eacute;rieur &agrave; six mois ou exc&eacute;der six ans. Il court &agrave; partir du dernier jour du premier CIF jusqu&rsquo;&agrave; la date de d&eacute;marrage du nouveau CIF.</p>\r\n', 37),
(20, 'Déroulement', '<p>\r\n	Le salari&eacute; qui souhaite b&eacute;n&eacute;ficier d&rsquo;un CIF doit se rapprocher de l&rsquo;UNAGECIF afin de conna&icirc;tre les modalit&eacute;s pratiques et les conditions de sa demande, et se faire remettre ou adresser un dossier de demande de CIF.</p>\r\n<p>\r\n	<strong>L&rsquo;autorisation d&rsquo;absence</strong></p>\r\n<p>\r\n	D&egrave;s lors que sa formation se fait en partie sur son temps de travail, le salari&eacute; doit faire signer par son manager une autorisation d&rsquo;absence, qui pr&eacute;cise l&rsquo;intitul&eacute; de la formation, la date de d&eacute;but de formation, l&rsquo;agenda de la formation, sa dur&eacute;e et l&rsquo;organisme de formation. Le salari&eacute; doit adresser &agrave; son manager sa demande d&rsquo;absence au plus tard 120 jours &agrave; l&rsquo;avance pour une absence de plus de six mois et au plus tard 60 jours &agrave; l&rsquo;avance pour une formation de moins de six mois.<br />\r\n	Cette autorisation d&rsquo;absence se mat&eacute;rialise sur un document fourni par l&rsquo;UNAGECIF.<br />\r\n	Le manager b&eacute;n&eacute;ficie d&rsquo;un d&eacute;lai de 30 jours pour donner son autorisation d&rsquo;absence. Il lui est possible de reporter l&rsquo;autorisation d&rsquo;absence pour des raisons de service. Dans ce cas, le report maximum est de neuf mois.</p>\r\n<p>\r\n	<strong>La demande de prise en charge</strong></p>\r\n<p>\r\n	Le salari&eacute; doit ensuite recontacter l&rsquo;UNAGECIF pour la prise en charge financi&egrave;re de sa formation. Un dossier lui est alors transmis soit par courrier, soit directement dans les locaux de l&rsquo;UNAGECIF. L&rsquo;attention du salari&eacute; est attir&eacute;e sur le fait que les co&ucirc;ts p&eacute;dagogiques de formation sont plafonn&eacute;s.</p>\r\n<p>\r\n	Apr&egrave;s v&eacute;rification de sa compl&eacute;tude et de sa recevabilit&eacute;, le dossier est transmis au comit&eacute; paritaire professionnel de l&rsquo;UNAGECIF (CPP), selon le calendrier disponible sur le site internet de l&rsquo;organisme. Un premier courrier est adress&eacute; par l&rsquo;UNAGECIF au salari&eacute;, lui pr&eacute;cisant que son dossier a &eacute;t&eacute; transmis au comit&eacute; paritaire.</p>\r\n<p>\r\n	Apr&egrave;s r&eacute;union du comit&eacute; paritaire, un courrier est envoy&eacute; au salari&eacute; et &agrave; son employeur, pr&eacute;cisant l&rsquo;acceptation ou le refus de prise en charge.<br />\r\n	En cas de refus, le courrier en pr&eacute;cise les motifs. L&rsquo;autorisation d&rsquo;absence sign&eacute;e par le manager est alors caduque.</p>\r\n<p>\r\n	En cas d&rsquo;acceptation de la prise en charge, le courrier pr&eacute;cise, le cas &eacute;ch&eacute;ant, la part des frais p&eacute;dagogiques qui devra &ecirc;tre financ&eacute;e par le salari&eacute;.</p>\r\n', 38),
(21, 'Liens ou documents utiles', '<ul>\r\n	<li>\r\n		<a href="http://www.unagecif.com/" target="_blank">http://www.unagecif.com/</a></li>\r\n</ul>\r\n', 39),
(22, 'Description', '<p>\r\n	Le projet professionnel du salari&eacute; est discut&eacute; lors de l&rsquo;entretien de professionnalisation avec son manager. Le salari&eacute; et son manager peuvent alors convenir de l&rsquo;accompagnement de ce projet par des actions de formation.</p>\r\n<p>\r\n	Lorsque celles-ci sont indispensables &agrave; l&rsquo;adaptation du salari&eacute; &agrave; son poste de travail ou au maintien du salari&eacute; dans son emploi, les actions de formation sont r&eacute;alis&eacute;es dans le cadre du plan de formation, en cat&eacute;gorie 1 (adaptation et maintien dans l&rsquo;emploi).<br />\r\n	L&rsquo;&eacute;laboration de ce volet du plan de formation rel&egrave;ve ainsi de la responsabilit&eacute; de l&rsquo;employeur et les formations qu&rsquo;il contient rev&ecirc;tent pour le salari&eacute; un caract&egrave;re obligatoire. Elles sont r&eacute;alis&eacute;es sur le temps de travail et r&eacute;mun&eacute;r&eacute;es.</p>\r\n<p>\r\n	Le manager peut &eacute;galement proposer au salari&eacute; d&rsquo;accompagner son projet professionnel par des actions de formation qui lui permettront de d&eacute;velopper ses comp&eacute;tences. Ces actions, non indispensables &agrave; la tenue du poste mais qui permettent a minima au salari&eacute; d&rsquo;am&eacute;liorer son efficacit&eacute; professionnelle sont r&eacute;alis&eacute;es dans le cadre du plan de formation, en cat&eacute;gorie 2 (d&eacute;veloppement des comp&eacute;tences).</p>\r\n<p>\r\n	Cette partie du plan de formation rel&egrave;ve &eacute;galement de la responsabilit&eacute; de l&rsquo;employeur mais ne porte aucun caract&egrave;re obligatoire pour le salari&eacute;. Une convention entre salari&eacute; et employeur est &eacute;tablie pour les formations de ce type, qui peuvent se d&eacute;rouler en partie en dehors du temps de travail.</p>\r\n', 46),
(23, 'Qui est concerné par le plan de formation ?', '<p>\r\n	Tous les salari&eacute;s de l&rsquo;entreprise sont concern&eacute;s par le plan de formation. L&rsquo;employeur est n&eacute;anmoins libre de choisir les salari&eacute;s qui b&eacute;n&eacute;ficieront d&rsquo;actions de formation dans le cadre du plan, sous r&eacute;serve notamment du principe de non-discrimination.</p>\r\n', 47),
(24, 'Construction du plan de formation', '<p>\r\n	Le Plan de Formation d&rsquo;Entreprise RTE (PFE) et les Plans de Formation d&rsquo;Unit&eacute;s (PFU) dont il fait la synth&egrave;se correspondent &agrave; l&rsquo;ensemble des actions de formation retenues par RTE et r&eacute;sultent &agrave; la fois d&rsquo;une d&eacute;marche &laquo;&nbsp;collective&nbsp;&raquo;, li&eacute;e aux besoins de l&rsquo;entreprise, et d&rsquo;une d&eacute;marche &laquo;&nbsp;individuelle&nbsp;&raquo; li&eacute;e aux souhaits de professionnalisation des salari&eacute;s.</p>\r\n<p>\r\n	Le plan de formation de l&rsquo;ann&eacute;e n+1 se construit entre janvier et avril de l&rsquo;ann&eacute;e n, au fil des entretiens de professionnalisation saisis dans l&rsquo;outil @rtesis. Il est ensuite adapt&eacute; par chaque Unit&eacute; en fonction de ses besoins sp&eacute;cifiques, puis discut&eacute; au sein des instances repr&eacute;sentatives du personnel entre octobre et d&eacute;cembre de l&rsquo;ann&eacute;e n.</p>\r\n<p>\r\n	Des actions de formation non planifi&eacute;es l&rsquo;ann&eacute;e pr&eacute;c&eacute;dente peuvent n&eacute;anmoins &ecirc;tre d&eacute;cid&eacute;es par les managers, pour r&eacute;pondre &agrave; des besoins non pr&eacute;visibles l&rsquo;ann&eacute;e pr&eacute;c&eacute;dente&nbsp; &agrave; l&rsquo;occasion par exemple de mutations ou recrutements.</p>\r\n', 48),
(25, 'A qui s’adressent les formations accompagnant la promotion ?', '<p>\r\n	Les formations d&rsquo;accompagnement de la promotion concernent les salari&eacute;s nouvellement promus dans les coll&egrave;ges Ma&icirc;trise ou Cadre.</p>\r\n', 50),
(26, 'Le détail des offres de FPCAE et FPMAE', '<p>\r\n	Les offres propos&eacute;es sur ce dispositif correspondent &agrave; un besoin en comp&eacute;tences pr&eacute;cis, au sein d&rsquo;une unit&eacute;. La publication d&rsquo;un emploi maitrise ou cadre dans la Bourse de l&rsquo;Emploi (Branche des IEG) est assortie de la formation promotionnelle n&eacute;cessaire pour y acc&eacute;der. Pour postuler, le salari&eacute; doit obtenir l&rsquo;accord de son manager via le mod&egrave;le 6. La s&eacute;lection du candidat est&nbsp;faite par l&rsquo;unit&eacute; d&rsquo;accueil. Apr&egrave;s une &eacute;ventuelle p&eacute;riode de pr&eacute;paration, l&rsquo;&eacute;cole confirmera ou non l&rsquo;admission du candidat &agrave; son cursus dipl&ocirc;mant.</p>\r\n', 51),
(27, 'Le détail des offres de CIC et CIM', '<p>\r\n	Les offres propos&eacute;es ciblent un emploi g&eacute;n&eacute;rique, elles sont diffus&eacute;es sur le site internet de RTE (offres de RTE) et dans la Bourse de l&#39;emploi (offres de l&rsquo;ensemble des entreprises du groupe EDF).. La candidature des salari&eacute;s est libre et ne n&eacute;cessite pas de validation manag&eacute;riale. La s&eacute;lection se d&eacute;roule en deux temps&nbsp;: une &eacute;preuve de synth&egrave;se (phase 1) puis un entretien devant un comit&eacute; de s&eacute;lection de l&rsquo;entreprise d&rsquo;accueil (phase 2). Apr&egrave;s une &eacute;ventuelle p&eacute;riode de pr&eacute;paration, l&rsquo;&eacute;cole confirmera ou non l&rsquo;admission du candidat &agrave; son cursus dipl&ocirc;mant.</p>\r\n', 52);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `url`, `template`, `position`, `rubrique_id`, `date_creation`, `date_modification`) VALUES
(1, 'Accueil', 'Accueil', 'accueil', 8, 0, 1352126526, 1352372065),
(5, 'Actualités des pôles', 'Actualites-des-poles', 'standard', 1, 11, 1352213568, 1352373287),
(6, 'Maintenance Courante Poste', 'Maintenance-Courante-Poste', 'standard', 2, 11, 1352213579, 1352373288),
(7, 'Exploitation', 'Exploitation', 'standard', 3, 11, 1352213598, 1352373288),
(8, 'Développement Ingénierie Réseau', 'Developpement-Ingenierie-Reseau', 'standard', 4, 11, 1352213613, 1352373288),
(9, 'Maintenance Courante Electrique', 'Maintenance-Courante-Electrique', 'standard', 5, 11, 1352213630, 1352373288),
(10, 'Maintenance Télécom et SI', 'Maintenance-Telecom-et-SI', 'standard', 6, 11, 1352213646, 1352373288),
(11, 'Maintenance Spécialisée Poste', 'Maintenance-Specialisee-Poste', 'standard', 7, 11, 1352213657, 1352373288),
(12, 'Management et métiers transverses', 'Management-et-metiers-transverses', 'standard', 8, 11, 1352213668, 1352373288),
(13, 'Innovation et Ingénierie de la Formation', 'Innovation-et-Inegnierie-de-la-Formation', 'standard', 9, 11, 1352213684, 1352373288),
(14, 'Bilan de compétences', 'Bilan-de-competences', 'standard', 2, 13, 1352213719, 1352470583),
(15, 'Validation des acquis de l''expérience (VAE)', 'Validation-des-acquis-de-lexperience', 'standard', 3, 13, 1352215042, 1352880217),
(16, 'Droit individuel à la formation (DIF)', 'Droits-individuels-a-la-formation-DIF', 'standard', 4, 13, 1352215058, 1352470583),
(17, 'Formations promotionnelles et accompagnement de la promotion', 'Formation-promotionnelle-et-accompagnement-de-la-promotion', 'standard', 5, 13, 1352215068, 1352822768),
(18, 'Congé individuel de formation (CIF)', 'Conge-individuel-de-formation-cif', 'standard', 6, 13, 1352215075, 1352470583),
(20, 'S''inscrire en formation', 'Inscription-mode-demploi', 'standard', 1, 14, 1352215099, 1352372064),
(21, 'Offres métiers techniques', 'Offres-metiers', 'standard', 1, 15, 1352215179, 1352217736),
(22, 'Offres management et métiers transverses', 'Offres-managements', 'standard', 2, 15, 1352215192, 1352217751),
(23, 'Infos pratiques, accès, contact', 'Infos-pratiques-acces-contact', 'standard', 1, 16, 1352215234, 1352372065),
(24, 'Zoom sur votre stage', 'Votre-stage-a-la-loupe', 'standard', 2, 16, 1352215245, 1352372065),
(26, 'Mission et valeurs', 'Mission-et-valeurs', 'standard', 1, 19, 1352215642, 1352372065),
(27, 'Livret d''accueil', 'Livret-daccueil', 'standard', 3, 19, 1352215655, 1352372065),
(31, 'Editorial', 'Editorial', 'standard', 1, 10, 1352217595, 1352822658),
(32, 'Actualités des projets', 'Dps-en-projets', 'standard', 3, 10, 1352217604, 1352822665),
(34, 'Chiffres clef', 'Chiffres-clef', 'standard', 2, 19, 1352217780, 1352372065),
(37, 'Accès infos pratiques', 'Acces-infos-pratiques', 'standard', 3, 6, 1352217876, 1352372065),
(38, 'Le métier de formateur', 'Le-metier-de-formateur', 'standard', 2, 6, 1352217889, 1352372065),
(43, 'redirection espace stagiaire', 'http://portail-formation/?redirect=espace_stagiaire', 'standard', 1, 26, 1352304406, 1352822853),
(44, 'redirection espaces reserves', 'http://portail-formation/?redirect=espaces_reserves', 'standard', 1, 24, 1352304857, 1352372065),
(46, 'Actualité de l''offre', 'Actualite-de-loffre', 'standard', 1, 5, 1352368869, 1352822798),
(47, 'Métiers techniques', 'Metiers-techniques', 'offre', 2, 5, 1352368883, 1352822798),
(48, 'Management et métiers transverses', 'Offre-management-et-metiers-transverses', 'offre', 3, 5, 1352368896, 1352822798),
(50, 'Contactez le DPS', 'contact', 'contact', 1, 25, 1352369181, 1352372065),
(51, 'Plan de formation', 'Plan-de-formation', 'standard', 1, 13, 1352452222, 1352470583),
(52, 'Actualités du DPS', 'Actualites-du-DPS', 'standard', 2, 10, 1352822652, 1352822658),
(53, 'redirection espace stagiaire 2', 'http://portail-formation/?redirect=espace_stagiaire', 'standard', 1, 27, 1352822882, 1352822882),
(54, 'redirection espace stagiaire 3', 'http://portail-formation/?redirect=espace_stagiaire', 'standard', 1, 28, 1352822910, 1352822910),
(55, 'redirection espace stagiaire 4', 'http://portail-formation/?redirect=espace_stagiaire', 'standard', 1, 29, 1352822987, 1352822987);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

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
(34, 'current', 'Etat initial', 34, 1352217780, 1352217780),
(37, 'current', 'Etat initial', 37, 1352217876, 1352217876),
(38, 'current', 'Etat initial', 38, 1352217889, 1352217889),
(43, 'current', 'Etat initial', 43, 1352304406, 1352304406),
(44, 'current', 'Etat initial', 44, 1352304857, 1352304857),
(46, 'current', 'Etat initial', 46, 1352368869, 1352368869),
(47, 'current', 'Etat initial', 47, 1352368883, 1352368883),
(48, 'current', 'Etat initial', 48, 1352368896, 1352368896),
(50, 'current', 'Etat initial', 50, 1352369181, 1352369181),
(51, 'current', 'Etat initial', 51, 1352452222, 1352452222),
(52, 'current', 'Etat initial', 52, 1352822652, 1352822652),
(53, 'current', 'Etat initial', 53, 1352822882, 1352822882),
(54, 'current', 'Etat initial', 54, 1352822910, 1352822910),
(55, 'current', 'Etat initial', 55, 1352822987, 1352822987);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `rubriques`
--

INSERT INTO `rubriques` (`id`, `intitule`, `position`, `parent_id`, `date_creation`, `date_modification`) VALUES
(3, 'Actualités', 1, 0, 1352213387, 1352372063),
(4, 'Se professionnaliser', 2, 0, 1352213393, 1352372064),
(5, 'L''offre du DPS', 3, 0, 1352213401, 1352372064),
(6, 'Connaître le DPS', 4, 0, 1352213409, 1352372065),
(7, 'Espace Stagiaire', 5, 0, 1352213416, 1352372065),
(10, 'Actualités du DPS', 1, 3, 1352213522, 1352372063),
(13, 'Les dispositifs', 1, 4, 1352213711, 1352372064),
(14, 'S''inscrire en formation', 2, 4, 1352215145, 1352372064),
(16, 'Venir en formation au DPS', 1, 7, 1352215221, 1352822853),
(19, 'Présentation du département', 1, 6, 1352215625, 1352372065),
(24, 'Espace réservé', 6, 0, 1352216708, 1352372065),
(25, 'Contact', 7, 0, 1352369173, 1352372065),
(26, 'Ressources stages', 2, 7, 1352822849, 1352822854),
(27, 'Evaluation des prérequis', 3, 7, 1352822865, 1352822865),
(28, 'Formation elearning', 4, 7, 1352822894, 1352822894),
(29, 'Enquête satisfaction', 5, 7, 1352822978, 1352822978);

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
