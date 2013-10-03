-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Octobre 2013 à 18:49
-- Version du serveur: 5.5.20-log
-- Version de PHP: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lifetest`
--
CREATE DATABASE IF NOT EXISTS `lifetest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lifetest`;

-- --------------------------------------------------------

--
-- Structure de la table `betalife`
--

CREATE TABLE IF NOT EXISTS `betalife` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `betalife`
--

INSERT INTO `betalife` (`id`, `mail`, `stamp`) VALUES
(1, 'david.lassagne@gmail.com', 1380824938);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
