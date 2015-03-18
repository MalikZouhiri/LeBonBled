-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Mars 2015 à 08:57
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(300) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `proprietaire` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proprietaire` (`proprietaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `prix`, `date_publication`, `description`, `proprietaire`, `photo`, `active`) VALUES
(4, 'OneplusOne comme neuf', 200, '2015-03-11 10:48:53', 'Le nouveau tÃ©lÃ©phone ultraperformant ! Ã€ un prix battant toute concurrence ! Vous pouvez me contacter par mail ou par tÃ©lÃ©phone.', 'admin', 'Image/1.jpeg', 0),
(7, 'Audi a vendre', 20000, '2015-03-11 10:54:23', 'Magnifique audi Ã  vendre, urgent, me contacter par tÃ©l uniquement.', 'admin', 'Image/5.jpeg', 0),
(8, 'Nike a vendre', 15, '2015-03-11 10:57:16', 'Belles chaussures Ã  vendre, contact par mail.', 'admin', 'Image/8.jpeg', 0),
(9, 'VÃ©lo enfant', 10, '2015-03-11 10:58:00', 'Votre enfant sera content, un vÃ©lo magnifico.', 'admin', 'Image/9.jpeg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `tel`, `password`, `mail`, `admin`) VALUES
(4, 'admin', '0600000000', '21232f297a57a5a743894a0e4a801fc3', 'badara@admin.fr', 0),
(5, 'toto', '010000000', 'f71dbe52628a3f83a77ab494817525c6', 'toto@toto.fr', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
