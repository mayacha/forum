-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 08 Septembre 2015 à 16:08
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
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(256) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `avatar` varchar(1024) NOT NULL DEFAULT 'avatar00.jpg',
  `birthdate` date NOT NULL DEFAULT '0000-00-00',
  `description` varchar(1024) NOT NULL,
  `id_permission` int(11) NOT NULL DEFAULT '3',
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_tchat_date` timestamp NOT NULL DEFAULT '2000-12-31 23:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`),
  KEY `id_permission` (`id_permission`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `avatar`, `birthdate`, `description`, `id_permission`, `date_register`, `log_tchat_date`) VALUES
(9, 'toto', 'toto@mail.com', '$2y$11$K5SOPlZ8yvOS0c0QzI0.2exQcPKiAHkNU8FB3Ry4.q3co6aNFvtPa', 'avatar04.png', '1982-11-06', 'Salut c''est toto,\r\nSi comme moi tu aimes les autres, montre le ! Et partage tes bonnes recettes et tes bons plans.', 3, '2015-09-02 11:30:02', '2015-09-08 09:08:22'),
(10, 'tutu', 'tutu@mail.com', '$2y$11$4yvu1INl3DsE7kP8Bod2puHx8lzylurxhRfQsjGQLdf1wxQ.cbm3C', 'avatar02.jpg', '1972-06-01', 'J''aime les poney et le Jazz.\r\nMais mon pÃ©chÃ© mignon c''est les autres :)... Ã  toutes les sauces', 3, '2015-09-02 12:22:39', '2000-12-31 23:00:00'),
(11, 'titi', 'titi@mail.com', '$2y$11$NHgg0mrT8IrjcKerAJV0teXfV7dPgc3gIZROyiPR3PSVm7WIrjWNi', 'avatar01.jpg', '0000-00-00', '', 3, '2015-09-03 08:51:38', '2000-12-31 23:00:00'),
(12, 'tata', 'tata@mail.com', '$2y$11$1u44dhtlI/avE8ncs0x/LeBZvirVvPT1Ut1rm1d32MxfCX5rnDu2O', 'avatar01.jpg2087006389', '1970-03-12', 'Bonjour, Tata pour les intimes. Souhaiterais mager ton tonton lol. Faites peter les invitations pour vos petites bouffes entre amis ou si decidez de les bouffer (vos amis) relol', 2, '2015-09-03 11:02:48', '2000-12-31 23:00:00'),
(13, 'pouic', 'pouic@mail.com', '$2y$11$i/H6MAlTd4Pi3rN2niEjSOwU7.VlcmEfE9Q2SwW75nF0GV/pfN48y', 'avatar05.png', '1980-07-17', 'Ma passion Ã  moi c''est les desserts !', 3, '2015-09-04 12:01:23', '2000-12-31 23:00:00'),
(14, 'plouc', 'plouc@mail.com', '$2y$11$/OZRaa./tlQuCTI0hJHm9u6Dw7.vV/Kx5eESzqVoggorFw2ypfI7C', 'avatar06.png', '1991-09-02', 'J''aime la natation, le vÃ©lo et la randonnÃ©e...et les autres. Je me suis inscrite sur ce forum parce que je dÃ©sire rencontrer des gens qui souhaiteraient me gouter...avec modÃ©ration bien sÃ»r ;)', 3, '2015-09-07 11:31:03', '2000-12-31 23:00:00'),
(15, 'patin', 'coufin@mail.com', '$2y$11$UF53ypaMhEpjR/CWZQkXu.UG9yF5vZTiNHRUtZNI/FoX5FMjvb5ru', 'avatar07.png', '1964-09-18', 'Hi,\r\nI love french food !\r\nand cook french also...', 3, '2015-09-07 11:33:21', '2000-12-31 23:00:00'),
(16, 'cestmoi', 'mail@mail.fr', '$2y$11$HPlxSyh7OOXbb6MF5h7HpeQnrbuBjWNnVsJMwa9R0G5BCm3Lrw4uK', 'avatar03.jpg', '0000-00-00', '', 1, '2015-09-07 13:35:03', '2015-09-07 13:35:29'),
(17, 'admin', 'admin@mail.com', '$2y$11$Enh3wM/Uk4jDX0iT7lrf..LKVgn57Zjf7a9NHM0bgri6GD6j129eO', 'avatar00.jpg', '1956-01-16', 'Bonjour Ã  tous !\r\nJ''ai crÃ©e ce site dans le but de rÃ©unir les grands esprits...et la bonne chair hÃ©hÃ©hÃ©.\r\nNous sommes bien plus nombreux qu''on le pense. Alors parlez en autour de vous. Legalize them ! ', 1, '2015-09-08 10:04:18', '2000-12-31 23:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
