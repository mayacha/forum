-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 08 Septembre 2015 à 16:09
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` varchar(4096) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(5, 'MarchÃ©s du monde', 'OÃ¹ trouver les meilleurs piÃ¨ces ? Comment ne pas finir par consommer de l''humain avariÃ© ? Des morceaux les plus prisÃ©s aux nationalitÃ©s les plus savoureuses...c''est ici que vous trouverez les meilleures adresses et de fameuses idÃ©es !'),
(6, 'Grillades', 'Haaa les grillades ! Faire simple pour goÃ»ter toute la complexitÃ© des saveurs de l''Homme... BÃ©bÃ© rosi, fesse bleue ou encore bedaine Ã  point, rien ne vaut ce doux fumet d''homme grillÃ© Ã  souhait. BientÃ´t l''Ã©tÃ© ?! Vive l''hommeburger, vive le barbiecue !!!'),
(7, 'RagoÃ»t', 'Rien de tel qu''un bon plat en sauce, mieux, un bon dodu en sauce ! De bon petits plats mijotÃ©s qui nous rappellent nos grands mÃ¨res (la mienne Ã©tait dÃ©licieuse)...\nChoisissez de bon morceaux, prenez votre mÃ¢le en patience et laissÃ© donc mijotÃ© tout Ã§a avec quelques aromates !'),
(8, 'CruditÃ©s', 'Voici une catÃ©gorie pour les vrais de vrais. Ceux qui n''ont pas peur de goÃ»ter les autres tels qu''ils sont. Un peu d''assaisonnement et le tour est jouÃ© !'),
(9, 'Desserts', 'Quelle meilleure faÃ§on de retrouver le goÃ»t de l''enfance ? Des chairs tendres et dÃ©licates ?... Ã” Madeleine, que tu est dÃ©licieuse !');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `id_user`, `date`, `message`) VALUES
(1, 9, '2015-09-07 13:18:35', 'coucou'),
(2, 9, '2015-09-07 13:18:44', 'il y a qqun ???'),
(3, 16, '2015-09-07 13:35:29', 'oui'),
(4, 9, '2015-09-08 09:08:22', 'c''est qui ?');

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `title` varchar(1024) NOT NULL,
  `content` varchar(8192) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `reported` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `id_topic`, `id_user`, `reported`, `deleted`) VALUES
(13, 'Fesses bleues', 'IngrÃ©dients :\r\nune belle paire de fesse\r\nun bouquet de thym\r\nun bon citron\r\nun filet d''huile d''olive\r\n... et pi c''est tout !\r\n\r\nFaire mariner les fesses dans le jus de citron et l''huile d''olive. RÃ©duire le thym en miettes dans la marinade et laisser le tout poser au moins 3 heures.\r\nFaire griller tel que. A consommer presque bleu. Bon appÃ©tit !', 13, 9, 0, 0),
(14, 'BÃ©bÃ© rosi aux ananas', 'IngrÃ©dients\r\nun beau bÃ©bÃ© bien jouflu\r\nun ananas\r\ndu romarin\r\nle jus d''un citron\r\nhuile d''olive\r\nEntier ou en brochettes en alternant bÃ©bÃ© et ananas, ce fameux mÃ©lange vous ravira ! A cuisiner Ã  la plancha bien entendu', 14, 17, 0, 0),
(15, 'Elevage en Argentine', 'C''est Ã  Avellaneda, Ã  moins de 200 km de Buenos Aires que se trouve El Rancho NiÃ±o, un prestigieux Ã©levage Argentin. Une de leur spÃ©cialitÃ© el niÃ±o abraz, miam !\r\nPour des coordonnÃ©es prÃ©cises, retrouvez-moi sur le tchat.', 15, 17, 0, 0),
(17, 'Boudin de ViÃªt aux noix', 'C''est chez Bob, qui se fait aujourd''hui appeler Robert, Ã  Paris, que vous trouverez, parmi d''autres, ce dÃ©licieux produit.\r\nCet ancien vÃ©tÃ©ran Ã  quelques talents pour accommoder et revisiter les grands classique de la charcuterie...', 17, 14, 0, 0),
(18, 'Pot aux grosses', 'Temps de prÃ©paration : 30 minutes\r\nTemps de cuisson : 240 minutes\r\n\r\nIngrÃ©dients (pour 4 personnes) :\r\n- 1 Kg de viande de grasse\r\n- 500 g de viande de maigre\r\n- 1 os Ã  moelle\r\n- 4 poireaux\r\n- 4 carottes\r\n- 1 branche de cÃ©leri\r\n- 2 oignons\r\n- 1 gousse dâ€™ail\r\n- 1 bouquet garni (persil, thym, laurier) \r\n- 2 clous de girofle\r\n- gros sel\r\n- poivre noir en grains\r\n\r\nFicelez les morceaux de viande pour qu''ils se maintiennent en forme pendant la cuisson. S''il s''agit d''un gros, coupez la queue en tronÃ§ons. \r\nPrenez la gousse d''ail et les oignons. Piquez-en un avec les clous de girofle. Faites dorer le second, Ã  sec, au four: il colorera le bouillon. \r\nMettez dans un faitout tous les morceaux de viande et lâ€™os Ã  moelle, prÃ©alablement enveloppÃ© dans une mousseline pour Ã©viter que la moelle ne se rÃ©pande. Mouillez avec 5 litres d''eau froide. \r\nSalez au gros sel. Portez Ã  Ã©bullition et laissez bouillir.\r\nAjoutez-y les oignons, les carottes, les poireaux (liÃ©s en botte), le cÃ©leri branche, lâ€™ail et le bouquet garni, prÃ©alablement ficelÃ©. Ajoutez 12 grains de poivre. \r\nPortez de nouveau Ã  Ã©bullition, puis laissez cuire, Ã  couvert, sur feu trÃ¨s doux, pendant au moins 4 heures. \r\nDÃ©graisser en cours de cuisson avec une petite louche. \r\nServez avec des cornichons, du gros sel et de la moutarde forte.', 18, 17, 0, 0),
(19, 'Bouillon d''Angliches aux cÃ¨pes', '1 kg d''Angliches (viande reconnue pour sa grande qualitÃ©, due Ã  la consommation excessive de biÃ¨re)\r\n300 g de cÃ¨pes\r\n1,5 l de bouillon de lÃ©gumes ou de marmaille\r\n16 carrÃ©s de pÃ¢tes Ã  ravioles chinoises ou pÃ¢te fraÃ®che classique (si vous souhaitez consommer l''angliche en raviole)\r\n3 Ã©chalotes et 1 carotte\r\n2 petites pincÃ©es de thym effeuillÃ©\r\nUn peu de beurre, sel et poivre et 1 oeuf battu pour coller les ravioles\r\n\r\nPrÃ©paration des cÃ¨pes..RÃ©server les tÃªtes et tailler les pieds en brunoise. Diviser la brunoise en 2. RÃ©server.\r\n\r\nDans une casserole, Ã  feu moyen, faire fondre les Ã©chalotes hachÃ©es finement dans une noisette de beurre, lorsqu''elles ont transparentes, ajouter la carotte taillÃ©e en brunoise. Incorporer une moitiÃ© des cÃ¨pe rÃ©servÃ©s .Remuer, couvrir avec le bouillon, Ã©mietter le thym, saler, poivrer et porter Ã  Ã©bullition. Baisser le feu et laisser cuire Ã  petits bouillons pendant une vingtaine de minutes. Filtrer et rÃ©server.\r\nA feu assez vif, dans un peu de beurre, faire revenir les dÃ©s de champignon pendant 3 mn pour qu''ils prennent un peu de couleur, saler, poivrer, rÃ©server.\r\n\r\nLes ravioles\r\nCouper l''angliche en lamelles d''environ 15 g chacune. Poser un carrÃ© de pÃ¢te Ã  plat, au pinceau, badigeonner le tour sur 1 cm de large environ. Au milieu de ce carrÃ©, Ã  la petite cuillÃ¨re, dÃ©poser un peu de brunoise de cÃ¨pes et un lamelle de foie gras, saler lÃ©gÃ¨rement avant de recouvrir avec une 2 Ã¨me feuille de pÃ¢te. Fermer hermÃ©tiquement en appuyant avec la pulpe du pouce. Recouper Ã©ventuellement la pÃ¢te avec un emporte-piÃ¨ce pour avoir des ravioles rondes mais ce n''est pas indispensable. \r\nAssemblez, servez !\r\n\r\n', 19, 9, 0, 0),
(20, 'Croustillant de Yougo ', '...aux cornichons bien sÃ»r !\r\nJ''ai dÃ©couvert cette prÃ©paration en Allemagne. C''Ã©tait dÃ©licieux !\r\nQuelqu''un aurait la recette ???', 20, 17, 0, 0),
(21, 'Salade de pouces de routards', 'C''est pas compliquÃ©...\r\nDe la salade, des pouces de routards et un petit assaisonnement.\r\nPerso, j''aime mettre des graines de sÃ©same avec !', 21, 15, 0, 0),
(22, 'Compote de vieux', 'A mettre en conserve pour l''hiver,\r\nIngrÃ©dients :\r\n1 vieux\r\nle quart de son poids en sucre\r\ncitron\r\npÃ©pin de pommes (pour gÃ©lifier)\r\nde l''eau\r\nEt surtout, une grande marmite !\r\nMettre le tout dans la marmite couvrir Ã  moitiÃ© d''eau et laisser compoter le vieux Ã  feu doux pendant 3 bonnes heures.\r\nIl est possible d''ajouter des fruits selon le gout mais ce n''est pas indispensable.\r\n', 22, 13, 0, 0),
(23, 'Madeleines', 'IngrÃ©dients (pour 32 madeleines) :\r\n- 3 oeufs\r\n- 300 g de Madeleine confite (J''ai testÃ© avec Emilie Ã§a marche aussi)\r\n- 150 g de sucre\r\n- 200 g de farine\r\n- 2 cuillÃ¨res Ã  soupe d''eau de fleur d''oranger\r\n- 8 g de levure chimique\r\n- 100 g de beurre fondu\r\n- 50 g de lait\r\n\r\nPrÃ©paration de la recette :\r\n\r\nFaire fondre le beurre dans une casserole Ã  feu doux, rÃ©server.\r\n\r\nMÃ©langer les oeufs avec le sucre, jusqu''Ã  ce que le mÃ©lange blanchisse. Ajouter ensuite la fleur d''oranger et 40 g de lait. \r\nAjouter la farine et la levure chimique. Puis le beurre, le restant du lait et Madeleine; laisser reposer 15 min. \r\nBeurrer les moules Ã  madeleines, et verser la prÃ©paration dedans (mais pas jusqu''en haut, Madeleine va gonfler !). \r\nEnfourner Ã  240Â°C (thermostat 8), et baisser au bout de 5 min Ã  200Â°C (thermostat 6-7); laisser encore 10 min. Surveiller bien la cuisson!\r\nDÃ©mouler dÃ¨s la sortie du four.\r\n', 23, 13, 0, 0),
(24, '', 'Ooooh oui !\r\nEt tu as goutÃ© son confit de foies russes ????', 17, 9, 0, 0),
(25, '', 'Vraiment tentant, je vais l''essayer et je vous en dirai des nouvelles !\r\nUn conseil pour se fournir en grosse ?', 18, 9, 0, 0),
(26, '', 'Miam et miam !', 23, 9, 0, 0),
(27, '', 'HÃ© mais tu es jamais connectÃ©...\r\nOn fait comment ???', 15, 9, 0, 0),
(28, '', 'Ouais pareil... Je veux bien l''adresse moi !\r\n', 15, 10, 0, 0),
(29, '', 'Trop bon !!!! J''ai mis des cerise de mon jardin avec c''Ã©tait au top !', 22, 10, 0, 0),
(30, '', 'Mama ne m''en parlez pas Ã§a me fait baver. Il fait une terrine de con c''est de la tuerie <3\r\n', 17, 10, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `id_category`, `id_user`) VALUES
(13, 'Fesses bleues', 6, 9),
(14, 'BÃ©bÃ© rosi aux ananas', 6, 17),
(15, 'Elevage en Argentine', 5, 17),
(17, 'Boudin de ViÃªt aux noix', 5, 14),
(18, 'Pot aux grosses', 7, 17),
(19, 'Bouillon d''Angliches aux cÃ¨pes', 7, 9),
(20, 'Croustillant de Yougo ', 8, 17),
(21, 'Salade de pouces de routards', 8, 15),
(22, 'Compote de vieux', 9, 13),
(23, 'Madeleines', 9, 13);

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
