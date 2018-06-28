-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Juin 2018 à 16:47
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
  `image` varchar(200) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date`, `idAuteur`, `idCategorie`, `image`, `description`) VALUES
(3, 'Ready player one', 'Ready player one le film ', '2018-06-26 15:27:58', 2, 4, 'ready.jpg', 'affiche du film Ready player one'),
(14, 'gfsgd', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus interdum, eros ut ullamcorper lacinia, mi risus imperdiet ex, non dignissim dui quam nec augue. Phasellus dignissim mattis libero vitae fermentum. Suspendisse bibendum felis et enim venenatis ultrices. Pellentesque vel arcu vitae ligula congue laoreet eu sit amet magna. Vivamus eu pharetra odio. In eleifend, augue vel porttitor lacinia, neque elit cursus est, sit amet semper justo nulla vitae erat. Nunc tincidunt erat tristique semper feugiat. Praesent ante lectus, sollicitudin eu laoreet nec, accumsan nec ex. Maecenas id suscipit justo, ac pulvinar libero. Nunc a ullamcorper urna, in vestibulum justo. Duis in orci quis lacus fermentum ultricies. Cras tincidunt dui at lectus semper, vitae laoreet mi interdum.\r\n\r\nAenean sapien quam, finibus in dolor et, rutrum ultrices lectus. Proin ornare ligula faucibus neque sodales, in aliquet elit sodales. Proin fringilla volutpat ante, sit amet rutrum ligula pulvinar et. Sed a tortor sed arcu sollicitudin dictum in sit amet nunc. Ut at felis posuere, condimentum sem sed, imperdiet risus. Morbi fringilla nibh sed nulla condimentum interdum. Pellentesque eget mauris et enim pulvinar varius vel ut lorem. Quisque sodales erat vitae mi fermentum feugiat non non felis. Ut id libero fringilla, hendrerit tortor sed, vehicula sem. Fusce lobortis orci lacus, quis consequat purus eleifend nec. Nulla placerat diam odio, id viverra nulla fermentum non.\r\n\r\nVivamus pellentesque nisi cursus velit eleifend, at feugiat felis fermentum. Aenean faucibus lorem non urna molestie, eget vestibulum massa bibendum. Praesent dapibus nisi et mauris malesuada, quis auctor metus sagittis. Mauris nec aliquet justo, id.', '2018-06-27 11:51:56', 1, 1, '', '0'),
(20, 'Ori', 'un petit jeu tout beau et tout mignon !', '2018-06-28 14:31:29', 1, 1, 'ori.jpg', 'image de présentation du jeu '),
(21, 'Le développement web', 'le développement web c\'est fantastique !!', '2018-06-28 16:31:55', 1, 6, '', '');

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
(1, 'Marine', '$2y$10$x0hXB7E8MspcUGyFz/dtxuu4wAO/rNtdgyaCI4O3tLRc3Q7pKoYK2'),
(2, 'Géraud', '$2y$10$x0hXB7E8MspcUGyFz/dtxuu4wAO/rNtdgyaCI4O3tLRc3Q7pKoYK2'),
(5, 'admin', '$2y$10$jfV4CW3Xl.3eChOwVdZLdODAtkqXVfGTyF.gqoynRUzmya9//kxbi');

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
(9, 'bouh', 'bouh', '2018-06-28 16:08:26', 20);

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
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
