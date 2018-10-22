-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le :  lun. 22 oct. 2018 à 13:29
-- Version du serveur :  10.3.10-MariaDB-1:10.3.10+maria~bionic
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timeline`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `date` year(4) NOT NULL,
  `event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `theme_id`, `date`, `event`) VALUES
(1, 2, 1977, 'Sortie du 1er Star Wars '),
(2, 2, 1997, 'Titanic'),
(3, 2, 1994, 'Pulp Fiction '),
(4, 2, 1981, 'Premier Indiana Jones'),
(5, 2, 1968, '2001, l\'Odyssée de l\'espace'),
(6, 2, 1927, 'Metropolis'),
(7, 2, 1982, 'Blade Runner'),
(8, 2, 1993, 'La liste de Schindler'),
(9, 2, 1972, 'Le Parrain'),
(10, 2, 1936, 'Les Temps Modernes '),
(11, 2, 1979, 'Apocalypse Now '),
(12, 2, 1971, 'Orange Mécanique'),
(13, 2, 1999, 'Fight Club'),
(14, 2, 1939, 'Autant en emporte le vent'),
(15, 2, 1988, 'Le Tombeau des Lucioles'),
(16, 1, 1912, 'Naufrage du Titanic'),
(17, 1, 1914, 'Début de la 1ère Guerre Mondiale'),
(18, 1, 1929, 'Grande Dépression'),
(19, 1, 1917, 'Révolutions russes'),
(20, 1, 1933, 'Hitler au pouvoir'),
(21, 1, 1940, 'Occupation de la France par l\'Allemagne nazie'),
(22, 1, 1944, 'Débarquement en Normandie '),
(23, 1, 1945, 'Hiroshima et Nagasaki'),
(24, 1, 1953, 'Mort de Staline'),
(25, 1, 1948, 'Création d\'Israël '),
(26, 1, 1958, 'Cinquième République'),
(27, 1, 1957, 'Spoutnik !'),
(28, 1, 1969, 'Premier Homme sur la Lune '),
(29, 1, 1961, 'Premier Homme dans l\'espace '),
(30, 1, 1968, 'Mort de Martin Luther King'),
(31, 1, 1974, 'Watergate'),
(32, 1, 1986, 'Tchernobyl'),
(33, 1, 1989, 'Chute du mur de Berlin'),
(34, 1, 1991, 'Chute de l\'URSS '),
(35, 1, 2001, 'Attentat du World Trade Center '),
(36, 1, 2008, 'Election d\'Obama'),
(37, 3, 1919, 'Création du Maillot Jaune sur le Tour de France '),
(38, 3, 1904, 'Création de la FIFA '),
(39, 3, 1930, 'Première coupe du monde de football en Uruguay'),
(40, 3, 1936, 'JO dans le Berlin nazie '),
(41, 3, 1960, 'Les Jeux olympiques de Rome sont les premiers retransmis intégralement à la télévision '),
(42, 3, 1974, 'A la Coupe du monde de football en RFA, la RFA et la RDA s’affrontent en match de poule '),
(43, 3, 1987, 'Première Coupe du monde de rugby en Nouvelle-Zélande '),
(44, 3, 1998, 'La France remporte la Coupe du Monde pour la première fois'),
(45, 3, 2007, 'La France organise la Coupe du monde de rugby '),
(46, 3, 2010, 'Première Coupe du monde de football en Afrique '),
(47, 3, 2012, 'JO de Londres '),
(48, 3, 2018, 'LA FRANCE REMPORTE LA COUPE DU MONDE EN RUSSIE ');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`) VALUES
(1, 'Général'),
(2, 'Cinéma'),
(3, 'Sport');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_theme` (`theme_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `foreign_key_theme` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
