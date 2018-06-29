-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Juin 2018 à 16:49
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` smallint(5) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idAuteur` smallint(5) NOT NULL,
  `idCategorie` smallint(5) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `modifierPar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date`, `idAuteur`, `idCategorie`, `image`, `description`, `modifierPar`) VALUES
(3, 'Ready player one', 'Ready player one le film ', '2018-06-26 15:27:58', 2, 4, 'ready.jpg', 'affiche du film Ready player one', 'Marine'),
(31, 'jeux videoshghfgfj', 'jeux videos', '2018-06-29 14:20:49', 7, 1, '', '', 'Géraud'),
(32, 'Musique', 'Musique', '2018-06-29 14:22:11', 7, 5, '', '', ''),
(33, 'voyages', 'voyages voyages !!', '2018-06-29 14:22:26', 7, 2, '', '', ''),
(34, 'Le gateau au chocolat3', 'miamcwxcwx', '2018-06-29 14:22:39', 7, 3, '', '', 'admin'),
(35, 'SQL', 'j\'aime pas les requetes qui beugues', '2018-06-29 14:23:11', 2, 6, '', '', 'Marine');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` smallint(5) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `mdp`) VALUES
(2, 'Géraud', '$2y$10$x0hXB7E8MspcUGyFz/dtxuu4wAO/rNtdgyaCI4O3tLRc3Q7pKoYK2'),
(5, 'admin', '$2y$10$k861Rh9HEH7bVmCbY6QACucrcxJmy6Ld0d6sxvDKNVvAiIA2T4ckW'),
(7, 'Marine', '$2y$10$CPb84OIrYfw2ajLbWu6xNOXIn3v3I3j98Sp3cDQ3W.4bWrZdnO0VG');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` smallint(5) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `img`) VALUES
(1, 'Jeux Vidéo', '<i class="fas fa-gamepad"></i>'),
(2, 'Voyages', '<i class="fas fa-plane-departure"></i>'),
(3, 'Recettes', '<i class="fas fa-utensils"></i>'),
(4, 'Films', '<i class="fas fa-film"></i>'),
(5, 'Musique', '<i class="fas fa-music"></i>'),
(6, 'Développement', '<i class="fas fa-code"></i>');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` smallint(5) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idArticle` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `contenu`, `date`, `idArticle`) VALUES
(1, 'pseudo', 'ldmqskcdfkqjcfkjnq', '2018-06-27 13:45:38', 3),
(2, 'dfeqsgfrez', 'grezgreq', '2018-06-27 13:57:27', 3),
(3, 'gfrszqg', 'grqezgre', '2018-06-27 13:57:59', 3),
(5, 'hackerman', '&lt;script&gt;alert(\'Bouhhhhh\')&lt;/script&gt;', '2018-06-28 12:26:45', 3),
(14, 'fana de chocolat', 'yes meilleur recette', '2018-06-29 14:48:20', 34);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkAuteur` (`idAuteur`),
  ADD KEY `fkCateg` (`idCategorie`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkArticle` (`idArticle`),
  ADD KEY `idArticle` (`idArticle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fkAuteur` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `fkCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fkArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
