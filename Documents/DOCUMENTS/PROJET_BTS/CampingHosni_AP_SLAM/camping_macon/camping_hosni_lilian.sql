-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 mai 2021 à 00:07
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
-- Base de données : `camping_hosni_lilian`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idcli` int(11) NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(30) NOT NULL,
  `prenomcli` varchar(30) NOT NULL,
  `pseudo` tinytext,
  `adresse` varchar(100) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mail` tinytext,
  `motpasse` longtext,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcli`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idcli`, `nomcli`, `prenomcli`, `pseudo`, `adresse`, `cp`, `ville`, `telephone`, `mail`, `motpasse`, `reg_date`, `role_id`) VALUES
(53, '', '', 'admin', '', '0', 'admin', '0', '', '$2y$10$3hR5sAojmwuQVCULmafX.O0g2zOHZmA/kaKPltYho5kGNEHtWF0a6', '2021-05-02 20:53:00', 2),
(54, 'Meunier', 'Thibaut', 'Thibaut', '24, avenue Voltaire', '06520', 'MAGAGNOSC', '0424993677', 'ThibautMeunier@armyspy.com', '$2y$10$0sb9IXwQm9k9zf9qIuHJye3QrbxeAjDmDs6SVAOxWWa6nrMC3MwD6', '2021-05-02 20:55:39', 1),
(55, 'Grandpré', 'Jeanette', 'Jeanette', '99, Rue St Ferréol', '92360', 'MEUDON-LA-FORÊT', '0121568541', 'JeanetteGrandpre@rhyta.com', '$2y$10$tFgJB8kk0G6.RliXNhBppe0MQeh1oAUJzHqY.6YXj3Sp.J6QA5DEy', '2021-05-02 20:56:39', 1),
(56, 'Paradis', 'Andrée', 'Andree', '76, rue Petite Fusterie', '18000', 'BOURGES', '0244370887', 'AndreeParadis@rhyta.com', '$2y$10$VVmHBUlsOM6r9N55WK8JceHLo7Rn5L0rMnWzTZrj7jtKsLgdqWvNW', '2021-05-02 20:59:52', 1),
(57, 'Bazinet', 'Manon', 'Manon', '87, Quai des Belges', '59600', 'MAUBEUGE', '0338987003', 'ManonBazinet@jourrapide.com', '$2y$10$pSW5QXy4tEeVLvhveltyleDBBOlHrg6ND.f0G4n.6f/1Kn76KKoB2', '2021-05-02 21:02:43', 1),
(58, 'Brisay', 'Julien', 'Julien', '65, rue Victor Hugo', '91100', 'CORBEIL-ESSONNES', '0162087471', 'JuliendeBrisay@armyspy.com', '$2y$10$DxSJFJwgjSEKCbQBvstpbe8eAbyYR4lL2YarhUYtIVUwKS26V5/Dq', '2021-05-02 21:04:23', 1),
(59, 'Hiver', 'Iven', 'Iven', '37, rue Porte d\'Orange', '33150', 'CENON', '0559157870', 'IvenLHiver@rhyta.com', '$2y$10$XfLYZFYIKp07sDTJ3kY9Y..jANGM0wHi1Y7gwj2ngOdq/aMuzMuXq', '2021-05-02 21:05:50', 1),
(60, 'Duclos', 'Serge', 'Serge', '19, rue Descartes', '67200', 'STRASBOURG', '0331603512', 'SergeDuclos@dayrep.com', '$2y$10$j2gsxddlMIx/77rkwQtTfeR4PaDAkky1EAGeJ99inCyrtO4PgO9a.', '2021-05-02 21:06:58', 1),
(61, 'Perreault', 'Vick', 'Vick', '19, rue Pierre De Coubertin', '31300', 'TOULOUSE', '0584091552', 'VickPerreault@jourrapide.com', '$2y$10$lkuhTiKzLp9YVkFHwjImI.5cvUgs2Oi9NkXgFN/kVFO/Y5OjIoS4e', '2021-05-02 21:08:13', 1),
(62, 'Louineaux', 'Iva', 'Ivaa', '16, rue Jean Vilar', '90000', 'BELFORT', '0346253996', 'IvaLouineaux@teleworm.us', '$2y$10$V7aKbShwDbmKMypyneDZ6ubxbuZ9BT4LNDFF4tyrenDs96YPvgLFm', '2021-05-02 21:09:37', 1),
(63, 'Loiselle', 'Vallis', 'Vallis', '56, rue Saint Germain', '95140', 'GARGES-LÈS-GONESSE', '0163174047', 'VallisLoiselle@dayrep.com', '$2y$10$CCTxr3nekPYD./iFPQbd/Oh.N0dF.BsWjB3juuisbhNvWfaBrBZVm', '2021-05-02 21:10:47', 1),
(64, 'Covillon', 'Frontino', 'Frontino', '60, rue Lenotre', '51100', 'REIMS', '0354037070', 'FrontinoCovillon@jourrapide.co', '$2y$10$ZT2hLgRt9gSa0.9if8sU7uYIbG5IfVIcxiSe7FvL44a6ofiVApTTa', '2021-05-02 21:51:40', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mobilhome`
--

DROP TABLE IF EXISTS `mobilhome`;
CREATE TABLE IF NOT EXISTS `mobilhome` (
  `idmob` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `numemp` int(11) NOT NULL,
  `idtyp` int(11) NOT NULL,
  PRIMARY KEY (`idmob`),
  UNIQUE KEY `numemp` (`numemp`),
  KEY `idtyp` (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mobilhome`
--

INSERT INTO `mobilhome` (`idmob`, `nom`, `numemp`, `idtyp`) VALUES
(101, 'Van Gogh', 143, 11),
(102, 'Picasso', 163, 12),
(103, 'Monet', 144, 11),
(104, 'Cézanne', 159, 13),
(105, 'De Vinci', 149, 14),
(106, 'Manet', 162, 12),
(107, 'Degas', 145, 11),
(108, 'Dali', 158, 13),
(109, 'Rembrandt', 148, 14),
(110, 'Michel-Ange', 195, 19),
(111, 'Vermeer', 140, 19),
(112, 'Chagall', 114, 15),
(113, 'Courbet', 161, 12),
(114, 'Rubens', 146, 11),
(115, 'Boticelli', 110, 16),
(116, 'Raphaël', 113, 15),
(117, 'Kandinsky', 157, 13),
(118, 'Munch', 112, 15),
(119, 'Magritte', 139, 19),
(120, 'Goya', 138, 19),
(121, 'Miro', 109, 16),
(122, 'Pissaro', 156, 13),
(123, 'Seurat', 137, 18),
(124, 'Braque', 136, 18),
(125, 'Toulouse-Lautrec', 122, 17),
(126, 'Hopper', 155, 13),
(127, 'Warhol', 111, 15),
(128, 'Modigliani', 147, 11),
(129, 'Velasquez', 160, 12),
(130, 'Morisot', 196, 16),
(131, 'Ingres', 154, 13),
(132, 'Duchamp', 150, 14),
(133, 'Bacon', 151, 14),
(134, 'Brueghel', 121, 17),
(135, 'Bosch', 115, 19),
(136, 'Caillebotte', 135, 18),
(137, 'Cassat', 152, 14),
(138, 'Signac', 153, 13),
(139, 'David', 120, 17),
(140, 'Corrot', 116, 17),
(141, 'Wuhan', 174, 18);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `idphoto` int(11) NOT NULL AUTO_INCREMENT,
  `nomfichier` varchar(30) NOT NULL,
  `idtyp` int(11) DEFAULT NULL,
  PRIMARY KEY (`idphoto`),
  KEY `idtyp` (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idphoto`, `nomfichier`, `idtyp`) VALUES
(1, '01001.png', 11),
(2, '01002.jpg', 11),
(3, '01003.jpg', 11),
(4, '01004.jpg', 11),
(5, '01005.jpg', 11),
(6, '02001.jpg', 12),
(7, '02002.jpg', 12),
(8, '02003.jpg', 12),
(9, '02004.jpg', 12),
(10, '02005.jpg', 12),
(11, '02006.jpg', 12),
(12, '03001.jpg', 13),
(13, '03002.jpg', 13),
(14, '03003.jpg', 13),
(15, '03004.jpg', 13),
(16, '04001.jpg', 14),
(17, '04002.jpg', 14),
(18, '04003.jpg', 14),
(19, '04004.jpg', 14),
(20, '04005.jpg', 14),
(21, '05001.jpg', 15),
(22, '05002.jpg', 15),
(23, '05003.jpg', 15),
(24, '05004.jpg', 15),
(25, '06001.jpg', 16),
(26, '06002.jpg', 16),
(27, '06003.jpg', 16),
(28, '06004.jpg', 16),
(29, '07001.jpg', 17),
(30, '07002.jpg', 17),
(31, '07003.jpg', 17),
(32, '07004.jpg', 17),
(33, '08001.png', 18),
(34, '08002.jpg', 18),
(35, '08003.jpg', 18),
(36, '08004.jpg', 18),
(37, '08005.jpg', 18),
(38, '09001.png', 19),
(39, '09002.jpg', 19),
(40, '09003.jpg', 19),
(41, '09004.jpg', 19);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idres` int(11) NOT NULL AUTO_INCREMENT,
  `dateres` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `regleon` tinyint(1) NOT NULL DEFAULT '0',
  `idmob` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `commentaires` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idres`),
  KEY `idmob` (`idmob`),
  KEY `idcli` (`idcli`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idres`, `dateres`, `datedebut`, `datefin`, `regleon`, `idmob`, `idcli`, `prenom`, `nom`, `commentaires`) VALUES
(116, '2021-05-02 21:12:15', '2021-05-03', '2021-05-17', 0, 101, 54, 'Thibaut', 'Meunier', ''),
(118, '2021-05-02 21:26:01', '2021-05-15', '2021-05-29', 0, 124, 55, 'Jeanette', 'Grandpré', 'Allergique au pollen '),
(122, '2021-05-02 22:14:02', '2021-05-01', '2021-05-22', 0, 102, 64, 'Frontino', 'Covillon', ''),
(123, '2021-05-02 22:15:52', '2021-05-17', '2021-05-29', 0, 123, 56, 'Andrée', 'Paradis', ''),
(124, '2021-05-02 22:16:51', '2021-06-01', '2021-05-16', 0, 104, 57, 'Manon', 'Bazinet', '2 personnes'),
(125, '2021-05-02 22:17:26', '2021-06-07', '2021-05-17', 0, 110, 58, 'Julien', 'Brisay', ''),
(126, '2021-05-02 22:26:47', '2021-05-19', '2021-05-30', 0, 101, 59, 'Iven', 'Hiver', ''),
(127, '2021-05-02 22:27:18', '2021-06-14', '2021-05-30', 0, 116, 60, 'Serge', 'Duclos', ''),
(128, '2021-05-02 22:28:55', '2021-07-05', '2021-05-23', 0, 125, 61, 'Vick', 'Perreault', 'Avec enfants'),
(129, '2021-05-02 22:29:24', '2021-07-15', '2021-07-22', 0, 104, 62, 'Iva', 'Louineaux', ''),
(130, '2021-05-02 22:30:12', '2021-07-26', '2021-08-15', 0, 102, 63, 'Vallis', 'Loiselle', '');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `typemobil`
--

DROP TABLE IF EXISTS `typemobil`;
CREATE TABLE IF NOT EXISTS `typemobil` (
  `idtyp` int(11) NOT NULL AUTO_INCREMENT,
  `libtyp` varchar(60) NOT NULL,
  `nbpers` int(11) DEFAULT NULL,
  `descripcourte` text,
  `descriplongue` text,
  `tarifsemaine` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtyp`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typemobil`
--

INSERT INTO `typemobil` (`idtyp`, `libtyp`, `nbpers`, `descripcourte`, `descriplongue`, `tarifsemaine`) VALUES
(11, 'SweetFlower sur Pilotis 5 personnes', 5, '43m2 dont terrasse semi-couverte 11m2 - 2 chambres  - Longueur 10 m / largeur 5,25 m', 'Pour les amoureux de la nature avec tout le confort : 2 chambres séparées avec chauffage, coin repas avec cuisine, grande terrasse sur pilotis. Le + : le coin douche, vasque et wc séparé et chauffage dans chaque pièce. Découvrez notre cabane eco pour le plaisir de toute la famille. N\'hésitez plus réservez.... 1 chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190 et un lit superposé, chauffage dans chaque pièce, 5 couettes, 5 oreillers. Kitchenette équipée : frigo-congèle, 1 évier, plaque 4 feux, cafetière électrique, micro-onde, douche, vasque, WC, 1 salon de jardin (1 table + 6 chaises). , un kit vaisselle standard. TV inclus dans le tarif', 469),
(12, 'Eco-Lodge Sahari 5 personnes', 5, '2 chambres - Environ 34 m² dont Terrasse couverte. Longueur 7 m / largeur 4,25 m. Une autre façon de camper.', 'Pour les amoureux de la nature avec tout le confort : 2 chambres separees , coin repas avec cuisine, grande terrasse sur pilotis. Le + : le coin douche, vasque et wc. Découvrez notre tente eco pour le plaisir de toute la famille. N\'hésitez plus réservez.... 1 chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190 et un lit superposé, 5 couvertures, 5 oreillers. Kitchenette équipée : petit frigo, 1 évier, plaque 2 feux, cafetière électrique, micro-onde, douche, vasque et WC, 1 salon de jardin (1 table + 6 chaises). , un kit vaisselle standard.', 399),
(13, 'Mobil-Home 2-3 personnes', 3, 'Environ 19 m² + Terrasse bois 7,50 m² Longueur 5,30 m / largeur 4 m', 'Un salon avec banquette en L équipé d’un lit tiroir (140 x 190). Une cuisine équipée, frigo, plaque 2 feux, cafetière électrique, micro-onde. Une grande chambre  lit 2 personnes 140 x 190. Salle de bain et douche, WC, 1 salon de jardin (1 table + 4 chaises),  3 oreillers, 2 couettes, kit vaisselle standard.', 343),
(14, 'Mobil-Home Confort 4 personnes', 4, 'Environ 29  m²  avec Terrasse semi-couverte. Longueur 7,62 m / largeur 4 m ', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, cafetière électrique, micro-onde, salle de bain et douche, WC, 1 salon de jardin (1 table + 4 chaises). 4 couvertures, 4 oreillers, un kit vaisselle standard + TV', 439),
(15, 'Mobil-Home Grand Confort 4-6 personnes', 6, 'Environ 29 m² avec Terrasse bois couverte de 11 m² Longueur 8,10 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour comprenant dans le salon 1 couchage (140x190), coin repas et cuisine tout équipée : frigo-congélateur, plaque 4 feux, cafetière électrique, micro-onde, TV, salle de bain et douche, WC, 1 salon de jardin (1 table + 6 chaises). 6 couvertures, 6 oreillers, un kit vaisselle standard.', 420),
(16, 'Mobil-Home Grand Confort 6 personnes', 6, 'Environ 31 m² + terrasse bois semi-couverte 11 m² Longueur 8,62 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 2 chambres avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, cafetière électrique, micro-onde, TV, salle de bain et douche, WC, 1 salon de jardin (1 table + 6 chaises). 6 couvertures, 6 oreillers, un kit vaisselle standard.', 525),
(17, 'Mobil-Home Luxe 6 personnes', 6, 'Environ 37 m² + terrasse bois semi-couverte 15 m² Longueur 8,62 m / largeur 4 m', '1 grande chambre avec un lit de 140x190, 2 chambre avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, four ou lave-vaisselle, cafetière électrique, micro-onde, salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 Chiliennes. 5 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants. TV inclus.', 553),
(18, 'Chalet 4-6 personnes', 6, 'Environ 34 m²  avec terrasse couverte + terrasse ext. Longueur 6,67 m / largeur 6,67 m', '1 grande chambre avec un lit de 140x190, 1 chambre avec 2 lits de 80x190, un grand séjour comprenant 1 couchage (140x190), coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, lave-vaisselle, cafetière électrique, micro-onde. Salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 chiliennes. 6 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants.', 420),
(19, 'Chalet 6 personnes', 6, 'Environ 34 m²  avec terrasse couverte + terrasse ext. Longueur 7,2 m / largeur 6,67 m', '1 grande chambre avec un lit de 140x190, 2 chambres avec 2 lits de 80x190, un grand séjour, coin repas et cuisine toute équipée : frigo-congélateur, plaque 4 feux, lave-vaisselle, cafetière électrique, micro-onde. Salle de bain et douche, WC. 1 salon de jardin (1 table + 6 chaises) 2 chiliennes. 5 couettes, 6 oreillers, un kit vaisselle standard. Volets roulants.', 462);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mobilhome`
--
ALTER TABLE `mobilhome`
  ADD CONSTRAINT `mobilhome_ibfk_1` FOREIGN KEY (`idtyp`) REFERENCES `typemobil` (`idtyp`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idtyp`) REFERENCES `typemobil` (`idtyp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
