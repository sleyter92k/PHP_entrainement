-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 jan. 2022 à 17:24
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cbs_php_inter_rachid`
--
CREATE DATABASE IF NOT EXISTS `cbs_php_inter_rachid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cbs_php_inter_rachid`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `price` int(5) NOT NULL,
  `reservation_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `zip_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'Appartement 50 m2 - 75015 Paris', 'Vente appartement 50 m2', 75015, 'Paris', 'vente', 200000, NULL),
(2, 'Appartement 20 m2 - 75017 Paris', 'Location appartement 20 m2', 75017, 'Paris', 'location', 700, NULL),
(3, 'Appartement 100 m2 - 75001 Paris', 'Vente appartement 100 m2', 75001, 'Paris', 'vente', 280000, NULL),
(4, 'Appartement 150 m2 - 75015 Paris', 'Location appartement 150 m2', 75015, 'Paris', 'location', 1300, NULL),
(5, 'Appartement 75 m2 - 75002 Paris', 'Vente appartement 75 m2', 75002, 'Paris', 'vente', 225000, NULL),
(6, 'Appartement 150 m2 - 75003 Paris', 'Location appartement 150 m2', 75003, 'Paris', 'location', 3000, NULL),
(7, 'Appartement 25 m2 - 75004 Paris', 'Vente appartement 25 m2', 75004, 'Paris', 'vente', 175000, NULL),
(8, 'Appartement 50 m2 - 75004 Paris', 'Location appartement 50 m2', 75004, 'Paris', 'location', 2200, NULL),
(9, 'Appartement 45 m2 - 75015 Paris', 'Vente appartement 45 m2', 75015, 'Paris', 'vente', 150000, NULL),
(10, 'Appartement 35 m2 - 75002 Paris', 'Location appartement 35 m2', 75002, 'Paris', 'location', 2000, NULL),
(11, 'Appartement 225 m2 - 75015 Paris', 'Vente appartement 225 m2', 75015, 'Paris', 'vente', 850000, NULL),
(12, 'Appartement 40 m2 - 75018 Paris', 'Location appartement 40 m2', 75018, 'Paris', 'location', 2200, NULL),
(13, 'Appartement 135 m2 - 75005 Paris', 'Vente appartement 135 m2', 75005, 'Paris', 'vente', 600000, NULL),
(14, 'Appartement 50 m2 - 75006 Paris', 'Location appartement 50 m2', 75006, 'Paris', 'location', 200000, NULL),
(15, 'Appartement 75 m2 - 75015 Paris', 'Vente appartement 75 m2', 75015, 'Paris', 'vente', 250000, NULL),
(16, 'Appartement 12 m2 - 75007 Paris', 'Location appartement 12 m2', 75007, 'Paris', 'location', 550, NULL),
(17, 'Appartement 110 m2 - 75008 Paris', 'Vente appartement 110 m2', 75008, 'Paris', 'vente', 750000, NULL),
(18, 'Appartement 35 m2 - 75008 Paris', 'Location appartement 35 m2', 75009, 'Paris', 'location', 900, NULL),
(19, 'Appartement 30 m2 - 75011 Paris', 'Vente appartement 30 m2', 75011, 'Paris', 'vente', 22000, NULL),
(20, 'Appartement 25 m2 - 75014 Paris', 'Location appartement 25 m2', 75014, 'Paris', 'location', 700, NULL),
(21, 'Appartement 47 m2 - 75017 Paris', 'Vente appartement 47 m2', 75017, 'Paris', 'vente', 175000, NULL),
(22, 'Appartement 20 m2 - 75019 Paris', 'Location appartement 20 m2', 75019, 'Paris', 'location', 500, NULL),
(23, 'Appartement 70 m2 - 75020 Paris', 'Vente appartement 70 m2', 75020, 'Paris', 'vente', 195000, NULL),
(24, 'Appartement 40 m2 - 75016 Paris', 'Location appartement 40 m2', 75016, 'Paris', 'location', 750, NULL),
(25, 'Appartement 80 m2 - 75017 Paris', 'Vente appartement 80 m2', 75017, 'Paris', 'vente', 1850000, NULL),
(26, 'Appartement 40 m2 - 75019 Paris', 'Location appartement 40 m2', 75019, 'Paris', 'location', 750, NULL),
(27, 'Appartement 125 m2 - 75002 Paris', 'Vente appartement 125 m2', 75002, 'Paris', 'vente', 750000, NULL),
(28, 'Appartement 57 m2 - 75004 Paris', 'Location appartement 57 m2', 75004, 'Paris', 'location', 1800, NULL),
(29, 'Appartement 90 m2 - 75005 Paris', 'Vente appartement 90 m2', 75005, 'Paris', 'vente', 825000, NULL),
(30, 'Appartement 38 m2 - 75006 Paris', 'Location appartement 38 m2', 75006, 'Paris', 'location', 2200, NULL),
(31, 'Appartement 70 m2', 'Location apprartement 70 m2', 75015, '', 'location', 1500, 'Je souhaite réservé'),
(32, 'Appartement 80 m2', 'Vente apprartement 80 m2', 75020, 'Paris', 'vente', 175000, 'Je souhaite réservé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
