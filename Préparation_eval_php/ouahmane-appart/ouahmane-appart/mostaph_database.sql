-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 jan. 2022 à 17:25
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
-- Base de données : `cbs_php_inter_mostapha`
--
CREATE DATABASE IF NOT EXISTS `cbs_php_inter_mostapha` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cbs_php_inter_mostapha`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `zip_code` int(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `zip_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'Location appartement 3 pièces 69 m²', 'Une pièce à vivre de 28 m² avec une cuisine moderne ', 73011, 'Paris', 'location', 2900, 'Pour le dossier : nous ne prendrons pas de caution solidaire mais nous souscrirons une assurance ‘’Loyers impayés’'),
(2, 'Location meublée appartement 4 pièces 78 m² Paris ', 'Ternes / Niel. Au dernier étage d\'un bel immeuble haussmannien au calme à proximité des commerces et des transports, appartement meublé très ensoleillé ', 75017, 'paris', 'location', 895, 'moulures et cheminée donnant sur un grand balcon/terrasse, cuisine séparée, deux chambres, salle de bains, wc séparés'),
(3, 'vente meublée studio 19 m² Paris 13E', ' Transports (bus, métro ligne 14,7 et T3)\r\n– Commerces\r\n– Inalco\r\n– École technique supérieure du laboratoire (ETSL)\r\n– Réseau des Instituts Supérieurs de l\'Entreprise (RISE)', 75013, 'Paris', 'vente', 150392, 'appel mois au 0766397744 '),
(4, 'appartement à vendre ', '40 m à Pantin plus proche de gare métro 7', 93500, 'Pantin', 'vente', 2505587, 'APP à 11 rue barbara 93500 '),
(5, 'Location meublée appartement 2 pièces 49 m² Paris ', 'Location meublée appartement 2 pièces 49 m² Paris 01E ', 75001, 'paris', 'location', 1500, 'Location meublée appartement 2 pièces 49 m² Paris 01E'),
(6, 'Location meublée studio 22 m² Paris 18E (75018)', 'Studio meublé de 22m2 situé à la frontière du 18ème et du 10ème arrondissement, à deux pas des gares du Nord et de l\'Est, avec toutes les commodités de déplacements, à quelques minutes de Montmartre à pied.', 75018, 'Paris', 'location', 700, 'N:0766937744\r\nemail:ouhman.mostapha@gmail.com'),
(7, 'Location meublée studio 25 m² Paris 18E 900 €', 'Proche métro La Fourche. Voie privée fleurie ,ensoleillée .Studio meublé, calme, environ 25 m2. Coin cuisine, grande salle de bains\r\nInternet inclus, machine à laver.', 73018, 'Paris', 'location', 900, 'Loyer : 900€ /mois charges comprises.'),
(8, 'appartement', 'Une pièce à vivre de 28 m² avec une cuisine moderne ', 91500, 'Paray-Viei', 'location', 900, 'Loyer : 900€ /mois charges comprises.'),
(9, 'Location meublée studio 31 m² Issy-Les-Moulineaux ', 'L\'appartement se compose d\'une entrée, d\'un couloir avec fenêtre, d\'une chambre séjour équipée d\'un canapé lit convertible avec coffre-chauffeuse (état neuf)', 92130, 'Issy-Les-M', 'location', 950, 'Issy-Les-Moulineaux - Rue Foucher Lepelletier - Entre le métro Corentin Celton et la ligne T2 (5min à pied) et proche de toutes les commodités. Grand studio de 31 m² situé au 5ème et dernier étage... '),
(10, 'Location studio 27 m² Boulogne-Billancourt (92100)', 'Studio 27 m², grand balcon, entrée (placard), séjour parquet avec dégagement pour coin nuit, grandes baies vitrées, cuisine équipée indépendante, salle de bains et wc. Cave.\r\nVue sur jardin intérieur, très calme. Chauffage collectif.\r\n', 92100, 'Boulogne-B', 'location', 950, 'Nord. 4 mn à pied métro Jean-Jaurès. Résidence standing, arborée, gardienne.\r\nAu 1er étage, ascenseur.'),
(12, 'Location appartement 3 pièces 69 m² Puteaux 1.740 ', '9m²- clair et ensoleillé, vue dégagée, 6ème étage avec ascenseur. Une entrée avec placard. Séjour sur rue avec balcon, d', 92803, 'Puteaux ', 'location', 1740, 'EF et EC avec compteurs individuels. Chauffage individuel électrique. Cave. Résidence très calme et sécurisée, digicode sur la rue, interphone à l’entrée de l’immeuble. Centre-ville près de tous commerces et moyens de transport.\r\n'),
(13, 'Location meublée studio 30 m² Paris 13E (75013) 1.', 'Place Jeanne d\'Arc.\r\nGrand studio 30 m2, meublé + 6 m2 balcon, immeuble récent.\r\nProche nouveau quartier Rive Gauche, BFM, université Paris VII, transports (bus 27 et 62, métro lignes 6 et 14), commerces et toutes commodités', 75013, 'Paris', 'location', 1080, '\r\nLoyer 1.080€ par mois, forfait charges compris (chauffage central, eau chaude et froide inclus).\r\n\r\nDisponible au 16/02/2022.\r\n\r\nDépôt de garantie : 1.860 €'),
(14, 'Location meublée studio 12 m² Paris 15E 695 €', 'Limite 7ème.\r\nMétro Dupleix, proche Champs de Mars, quartier résidentiel.\r\n\r\nStudette 12 m² environ entièrement équipée avec décoration raffinée.\r\n', 75007, 'Paris', 'location', 694, 'Dans immeuble de grand standing, au 6ème étage avec ascenseur.\r\nVue Tour Eiffel.\r\n\r\nCuisinette équipée, salle de bains avec wc, convertible 2 places, rangements.\r\n'),
(15, 'vente studio 30 m² Paris 13E (75013) ', 'Place Jeanne d\'Arc.\r\nGrand studio 30 m2, meublé + 6 m2 balcon, immeuble récent.\r\nP', 75013, 'Paris', 'vente', 265778, 'Disponible au 16/02/2022.'),
(16, 'Location meublée studio 25 m² Paris 9E 1.050 €', 'étro Anvers. Au pied de la Butte Montmartre.\r\n\r\nBel immeuble haussmannien avec digicode, studio meublé 25 m2, au 1er étage, entièrement rénové. Coin cuisine équipé, salle d\'eau séparée (wc, douche, lavabo), pièce principale avec canapé.\r\n\r\nLoyer charges comprises.', 75009, 'Paris', 'location', 1050, ' Appeler le propriétaire : 06.80.80.44.44\r\n');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
