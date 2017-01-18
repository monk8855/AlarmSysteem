-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 18 jan 2017 om 13:11
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `alarmsysteem`
--
CREATE DATABASE IF NOT EXISTS `alarmsysteem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alarmsysteem`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `alarm_overzicht`
--

CREATE TABLE IF NOT EXISTS `alarm_overzicht` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sensor_id` text NOT NULL,
  `tijd` datetime NOT NULL,
  `verberg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_controller`
--

CREATE TABLE IF NOT EXISTS `login_controller` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session` text NOT NULL,
  `time` text NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sensor`
--

CREATE TABLE IF NOT EXISTS `sensor` (
  `id` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `locatie` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `telefoon` text NOT NULL,
  `email` text NOT NULL,
  `adres` text NOT NULL,
  `woonplaats` text NOT NULL,
  `postcode` text NOT NULL,
  `iban` varchar(34) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `abonnement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`id`, `name`, `telefoon`, `email`, `adres`, `woonplaats`, `postcode`, `iban`, `username`, `password`, `abonnement`) VALUES
(6, 'Administrator', '0639842732', 'jos-vanginkel@hotmail.com', 'Kamperfoelielaan 12', 'Ede', '6713 EE', '', 'jos-vanginkel@hotmail.com', '1c82bd44291d2e6853f6ff6e009001d7fa5f0f3a502b11256569f752a2dea651181e547419645019c68fd07f94a01ea49a8d9f708b45c7ca8c503e2038ed557e', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
