-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 12 mei 2022 om 08:30
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkeytravel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekingen`
--

DROP TABLE IF EXISTS `boekingen`;
CREATE TABLE IF NOT EXISTS `boekingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Startdatum` datetime(6) NOT NULL,
  `PINcode` int(11) NOT NULL,
  `TochtID` int(11) NOT NULL,
  `KlantID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TochtID` (`TochtID`),
  KEY `KlantID` (`KlantID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `herbergen`
--

DROP TABLE IF EXISTS `herbergen`;
CREATE TABLE IF NOT EXISTS `herbergen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL,
  `Gewijzigd` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overnachtingen`
--

DROP TABLE IF EXISTS `overnachtingen`;
CREATE TABLE IF NOT EXISTS `overnachtingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BoekingID` int(11) NOT NULL,
  `HerbergID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BoekingID` (`BoekingID`),
  KEY `HerbergID` (`HerbergID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pauzeplaatsen`
--

DROP TABLE IF EXISTS `pauzeplaatsen`;
CREATE TABLE IF NOT EXISTS `pauzeplaatsen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BoekingID` int(11) NOT NULL,
  `RestaurantID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BoekingID` (`BoekingID`),
  KEY `RestaurantID` (`RestaurantID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statussen`
--

DROP TABLE IF EXISTS `statussen`;
CREATE TABLE IF NOT EXISTS `statussen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Statuscode` tinyint(4) NOT NULL,
  `Status` varchar(40) NOT NULL,
  `Verwijderbaar` tinyint(4) NOT NULL,
  `PIN` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tochten`
--

DROP TABLE IF EXISTS `tochten`;
CREATE TABLE IF NOT EXISTS `tochten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Omschrijving` varchar(40) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `Dagen` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trackers`
--

DROP TABLE IF EXISTS `trackers`;
CREATE TABLE IF NOT EXISTS `trackers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINcode` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `Time` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
