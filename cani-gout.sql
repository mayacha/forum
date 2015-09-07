-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 04 Septembre 2015 à 16:58
-- Version du serveur: 5.5.43-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cani-gout`
--

-- --------------------------------------------------------

--
-- Structure de la table `ban`
--

CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `ban`
--

INSERT INTO `ban` (`id`, `id_user`, `date`, `time`) VALUES
(2, 3, '2015-09-02 12:32:58', 3),
(3, 4, '2015-09-03 12:41:24', 168),
(4, 3, '2015-09-04 07:22:10', 1),
(5, 3, '2015-09-04 07:35:04', 3),
(6, 5, '2015-09-04 09:33:00', 1),
(7, 7, '2015-09-04 11:42:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET latin1 NOT NULL,
  `description` varchar(4096) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Ragout', 'Un bon ragout Ã©Ã Ã©Ã Ã©Ã Ã©Ã Ã Ã©Ã©Ã Ã©Ã Ã©Ã Ã Ã©'),
(2, 'MarchÃ© du monde', 'Avec personne'),
(3, 'Grillades', 'Des bonnes grillades'),
(4, 'CruditÃ©s', 'Pour les lapins.');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(2048) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `permission`
--

INSERT INTO `permission` (`id`, `name`) VALUES
(1, 'admin'),
(4, 'deleted'),
(3, 'membre'),
(2, 'moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `content` varchar(8192) CHARACTER SET latin1 NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `reported` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `id_topic`, `id_user`, `reported`, `deleted`) VALUES
(1, 'mess 1', 'content 1 azetzeghrhteh', 8, 3, 0, 0),
(2, 'mess 2', 'content 2', 4, 3, 0, 0),
(3, 'mess 3', 'content 3', 1, 2, 1, 0),
(4, 'mess 4', 'content 4 mod', 1, 2, 0, 0),
(5, 'mess 5', 'content 5 mod', 3, 2, 1, 1),
(6, 'test 776 ajout', '', 20, 1, 0, 0),
(7, 'test 987 ajout', 'rhzrggrgrgrggrgrgrgrg', 21, 1, 0, 0),
(8, 'test ajout 1255', 'esettttrdtrrrrrrrrrrrrrrrrrrrrrrrrrrrt', 22, 1, 0, 0),
(9, 'test ajout 1255', 'esettttrdtrrrrrrrrrrrrrrrrrrrrrrrrrrrt', 23, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `id_category`, `id_user`) VALUES
(1, 'Confit de foies russes', 1, 1),
(2, 'Brandade de Pygmes', 3, 1),
(3, 'boudin de Viet laque aux noix', 1, 1),
(4, 'Elevage de Cherubins du Bresil', 2, 1),
(5, 'Compote de vieux', 2, 1),
(6, 'Farfouillades de rescapés', 3, 1),
(7, 'Bouillons d Angliches aux cepes', 1, 1),
(8, 'Croustillant de Yougo aux cornichons', 4, 1),
(9, 'Salade de pouces de routards', 4, 1),
(11, 'ryhhre', 1, 1),
(12, 'ryhhre', 1, 1),
(13, 'ryhhre', 1, 1),
(14, 'ryhhre', 1, 1),
(15, 'test ajout', 1, 1),
(16, 'rhetjtrjtrj', 1, 1),
(17, 'tryjyteuliryllyi', 1, 1),
(18, 'test 315 ajout', 1, 1),
(19, 'ezrehthtror', 1, 1),
(20, 'test 776 ajout', 1, 1),
(21, 'test 987 ajout', 1, 1),
(22, 'test ajout 1255', 1, 1),
(23, 'test ajout 1255', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(256) CHARACTER SET latin1 NOT NULL,
  `email` varchar(512) CHARACTER SET latin1 NOT NULL,
  `password` varchar(512) CHARACTER SET latin1 NOT NULL,
  `avatar` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `birthdate` timestamp NULL DEFAULT NULL,
  `description` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `id_permission` int(11) NOT NULL DEFAULT '3',
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`),
  KEY `id_permission` (`id_permission`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `avatar`, `birthdate`, `description`, `id_permission`, `date_register`) VALUES
(1, 'admin', 'admin@mail.fr', '$2y$10$ej7EKOAUmdJ5/ATF.BqbReZpg.hahocZB9z0noW5s/29sxqKvvgtu', '749038953avatar00.jpg', '0000-00-00 00:00:00', '', 1, '0000-00-00 00:00:00'),
(2, 'toto', 'toto@mail.fr', 'ztrztzrtrz', 'avatar01.jpg', '0000-00-00 00:00:00', '', 2, '2015-09-01 14:25:18'),
(3, 'tata', 'tata@mail.fr', 'erzetezt', 'avatar02.jpg', '0000-00-00 00:00:00', '', 3, '2015-09-01 14:25:18'),
(4, 'titi', 'titi@mail.fr', '$2y$11$r4.4tfFBp1EIfi9.CpB5H./kNcApwBswRkdkqsRBoj8O/Dgt6EJkG', '', '0000-00-00 00:00:00', '', 3, '2015-09-03 09:27:12'),
(5, 'tyty', 'tyty@mail.fr', '$2y$11$GClxlxP6hvtNLDhgBiLsk.JoSHwxR3A1lKLe3B2pXilYIqFeuLCDS', '', '0000-00-00 00:00:00', '', 2, '2015-09-04 08:15:52'),
(6, 'aeterhte', 'ertgreghregh@mail.fr', '$2y$11$yv90zGCQsi0SMJWUcgXgMue0/xNNyV4NSH6CIQy1tp6BcKvtCaWtK', '', NULL, '', 3, '2015-09-04 11:19:43'),
(7, 'testlog', 'test@mail.frr', '$2y$11$6JP2fpf8W2WTBj9hUHmcXeVVBpeIGvs5GAwqnttJIN0qDbGV3Fb3m', '', NULL, '', 3, '2015-09-04 11:41:28');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
