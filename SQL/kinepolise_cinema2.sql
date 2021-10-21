-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 oct. 2021 à 09:36
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kinepolise_cinema2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`adresse`) VALUES
('50 AV de Saintignon, 54400 Longwy ');

-- --------------------------------------------------------

--
-- Structure de la table `infos_cinema1`
--

CREATE TABLE `infos_cinema1` (
  `Id` int(11) NOT NULL,
  `SalleName` varchar(250) DEFAULT NULL,
  `Nombre_de_place` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `infos_cinema1`
--

INSERT INTO `infos_cinema1` (`Id`, `SalleName`, `Nombre_de_place`) VALUES
(12, 'Salle2', 25),
(14, 'Salle3', 50),
(15, 'Salle1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation_client`
--

CREATE TABLE `reservation_client` (
  `Id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `FilmName` varchar(250) NOT NULL,
  `DateSeanceBegin` datetime DEFAULT NULL,
  `DateSeanceEnd` datetime DEFAULT NULL,
  `SalleName` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation_client`
--

INSERT INTO `reservation_client` (`Id`, `username`, `password`, `FilmName`, `DateSeanceBegin`, `DateSeanceEnd`, `SalleName`) VALUES
(712, 'Mike', '05104chess', 'Grand_Torino', '2021-10-20 19:36:00', '2021-10-20 21:06:00', 'Salle2');

-- --------------------------------------------------------

--
-- Structure de la table `seance_cinema1`
--

CREATE TABLE `seance_cinema1` (
  `Id` int(11) NOT NULL,
  `FilmName` varchar(250) NOT NULL,
  `DateSeanceBegin` datetime DEFAULT NULL,
  `DateSeanceEnd` datetime DEFAULT NULL,
  `SalleName` varchar(250) DEFAULT NULL,
  `Nombre_de_reservation` int(11) DEFAULT NULL,
  `place_disponible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance_cinema1`
--

INSERT INTO `seance_cinema1` (`Id`, `FilmName`, `DateSeanceBegin`, `DateSeanceEnd`, `SalleName`, `Nombre_de_reservation`, `place_disponible`) VALUES
(710, 'Tron', '2021-10-17 18:34:00', '2021-10-17 19:34:00', 'Salle1', 0, 1),
(711, 'Oblivion', '2021-10-18 18:48:00', '2021-10-18 20:48:00', 'Salle1', 0, 1),
(712, 'Grand_Torino', '2021-10-20 19:36:00', '2021-10-20 21:06:00', 'Salle2', 1, 24);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `infos_cinema1`
--
ALTER TABLE `infos_cinema1`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `reservation_client`
--
ALTER TABLE `reservation_client`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `seance_cinema1`
--
ALTER TABLE `seance_cinema1`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `infos_cinema1`
--
ALTER TABLE `infos_cinema1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservation_client`
--
ALTER TABLE `reservation_client`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- AUTO_INCREMENT pour la table `seance_cinema1`
--
ALTER TABLE `seance_cinema1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=713;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
