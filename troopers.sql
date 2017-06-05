-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Juin 2017 à 17:55
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `troopers`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `upgrade` tinyint(1) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id`, `start_date`, `end_date`, `creation_date`, `upgrade`, `car_id`, `client_id`) VALUES
(1, '2017-06-01 00:00:00', '2017-06-10 00:00:00', '2017-06-05 17:47:50', 0, 2, 3),
(2, '2017-06-02 00:00:00', '2017-06-10 00:00:00', '2017-06-05 17:48:21', 0, 12, 2),
(3, '2017-06-05 00:00:00', '2017-06-15 00:00:00', '2017-06-05 17:49:06', 0, 4, 4),
(4, '2017-06-06 00:00:00', '2017-06-12 00:00:00', '2017-06-05 17:49:34', 0, 1, 3),
(5, '2017-06-07 00:00:00', '2017-06-14 00:00:00', '2017-06-05 17:52:37', 0, 3, 3),
(6, '2017-06-10 00:00:00', '2017-06-11 00:00:00', '2017-06-05 17:53:29', 1, 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `car_range_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `car`
--

INSERT INTO `car` (`id`, `name`, `available`, `color_id`, `car_range_id`) VALUES
(1, 'Voiture 1', 0, 3, 1),
(2, 'Voiture 2', 0, 4, 1),
(3, 'Voiture 3', 0, 3, 1),
(4, 'Voiture 4', 0, 5, 1),
(5, 'Voiture 5', 1, 1, 1),
(6, 'Voiture 6', 1, 5, 1),
(7, 'Voiture 7', 1, 4, 1),
(8, 'Voiture 8', 1, 5, 1),
(9, 'Voiture 9', 1, 1, 1),
(10, 'Voiture 10', 1, 3, 1),
(11, 'Bolide 1', 0, 4, 2),
(12, 'Bolide 2', 0, 3, 2),
(13, 'Bolide 3', 1, 1, 2),
(14, 'Bolide 4', 1, 3, 2),
(15, 'Bolide 5', 1, 4, 2),
(16, 'Bolide 6', 1, 5, 2),
(17, 'Bolide 7', 1, 5, 2),
(18, 'Bolide 8', 1, 3, 2),
(19, 'Bolide 9', 1, 5, 2),
(20, 'Bolide 10', 1, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `car_range`
--

CREATE TABLE `car_range` (
  `id` int(11) NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `car_range`
--

INSERT INTO `car_range` (`id`, `name`) VALUES
(2, 'TieFighter'),
(1, 'X-Wing');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`) VALUES
(1, 'Han', 'Solo'),
(2, 'Boba', 'Fett'),
(3, 'Padme', 'Amidala'),
(4, 'Leia', 'Organa'),
(5, 'Jar Jar', 'Binks'),
(6, 'Dark', 'Maul');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Bleu'),
(4, 'Gris'),
(5, 'Noir'),
(3, 'Rouge');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E00CEDDEC3C6F69F` (`car_id`),
  ADD KEY `IDX_E00CEDDE19EB6921` (`client_id`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_773DE69D7ADA1FB5` (`color_id`),
  ADD KEY `IDX_773DE69DA5B4E5B5` (`car_range_id`);

--
-- Index pour la table `car_range`
--
ALTER TABLE `car_range`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4C2CDF9E5E237E06` (`name`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_665648E95E237E06` (`name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `car_range`
--
ALTER TABLE `car_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDE19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_E00CEDDEC3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69D7ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_773DE69DA5B4E5B5` FOREIGN KEY (`car_range_id`) REFERENCES `car_range` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
