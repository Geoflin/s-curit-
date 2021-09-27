-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 sep. 2021 à 09:27
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
-- Base de données : `kinepolise`
--

-- --------------------------------------------------------

--
-- Structure de la table `seance_cinema1`
--

CREATE TABLE `seance_cinema1` (
  `Id` int(11) NOT NULL,
  `FilmName` varchar(250) NOT NULL,
  `DateOfNewSeance` time DEFAULT NULL,
  `HourBegin` time DEFAULT NULL,
  `HourEnd` time DEFAULT NULL,
  `SalleName` varchar(250) DEFAULT NULL,
  `Nombre_de_place` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance_cinema1`
--

INSERT INTO `seance_cinema1` (`Id`, `FilmName`, `DateOfNewSeance`, `HourBegin`, `HourEnd`, `SalleName`, `Nombre_de_place`) VALUES
(1, 'Avatar', '00:00:00', '20:00:00', '21:00:00', 'Salle1', 50),
(2, 'Titanic', '00:00:00', '19:00:00', '20:00:00', 'Salle2', 50),
(3, 'Oblivion', '00:00:00', '18:00:00', '19:00:00', 'Salle3', 50);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `seance_cinema1`
--
ALTER TABLE `seance_cinema1`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `seance_cinema1`
--
ALTER TABLE `seance_cinema1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
