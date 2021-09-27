-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 sep. 2021 à 09:19
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
  `Id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
(0, '[value-2]', '00:00:00', '00:00:00', '00:00:00', '[value-6]', 50),
(0, '[value-2]', '00:00:00', '00:00:00', '00:00:00', '[value-6]', 50),
(0, '[value-2]', '00:00:00', '00:00:00', '00:00:00', '[value-6]', 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
