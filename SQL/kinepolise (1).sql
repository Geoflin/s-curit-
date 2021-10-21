DROP SCHEMA IF EXISTS kinepolise2;
CREATE SCHEMA kinepolise2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE kinepolise2.info_film (
  `Id` int(11) NOT NULL,
  `FilmName` varchar(250) NOT NULL,
  `Duree` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `info_film`
--

INSERT INTO kinepolise2.info_film (`Id`, `FilmName`, `Duree`) VALUES
(2, 'Tron', '02:00:00'),
(3, 'Grand_Torino', '01:30:00'),
(15, 'Oblivion', '02:00:00'),
(19, 'test', '19:37:00');

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE kinepolise2.password (
  `Id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `password`
--

INSERT INTO kinepolise2.password (`Id`, `username`, `password`) VALUES
(1, 'john', 'ripples1947'),
(3, 'Billy', 'billy1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info_film`
--
ALTER TABLE kinepolise2.info_film
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `password`
--
ALTER TABLE kinepolise2.password
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info_film`
--
ALTER TABLE kinepolise2.info_film
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `password`
--
ALTER TABLE kinepolise2.password
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;