-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Structuur van  tabel donkeytravel.boekingen wordt geschreven
CREATE TABLE IF NOT EXISTS `boekingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EindDatum` datetime(6) DEFAULT NULL,
  `StartDatum` datetime(6) NOT NULL,
  `PINcode` int(11) NOT NULL,
  `TochtID` int(11) NOT NULL,
  `KlantID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TochtID` (`TochtID`),
  KEY `KlantID` (`KlantID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.boekingen: 0 rows
/*!40000 ALTER TABLE `boekingen` DISABLE KEYS */;
/*!40000 ALTER TABLE `boekingen` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.herbergen wordt geschreven
CREATE TABLE IF NOT EXISTS `herbergen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.herbergen: 0 rows
/*!40000 ALTER TABLE `herbergen` DISABLE KEYS */;
/*!40000 ALTER TABLE `herbergen` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.klanten wordt geschreven
CREATE TABLE IF NOT EXISTS `klanten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL,
  `Gewijzigd` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.klanten: 0 rows
/*!40000 ALTER TABLE `klanten` DISABLE KEYS */;
INSERT INTO `klanten` (`ID`, `Naam`, `Email`, `Telefoon`, `Wachtwoord`, `Gewijzigd`) VALUES
	(1, 'Jovey', 'jovey@gmail.com', '0612345678', 'test', '2022-07-04 09:34:13');
/*!40000 ALTER TABLE `klanten` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.medewerkers wordt geschreven
CREATE TABLE IF NOT EXISTS `medewerkers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) DEFAULT NULL,
  `WachtwoordHash` text,
  `Gewijzigd` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.medewerkers: ~3 rows (ongeveer)
/*!40000 ALTER TABLE `medewerkers` DISABLE KEYS */;
INSERT INTO `medewerkers` (`ID`, `Email`, `WachtwoordHash`, `Gewijzigd`) VALUES
	(1, 'tom@test.nl', '$argon2id$v=19$m=65536,t=4,p=1$SkRtYkdlRk9aWHZjUGw5RQ$psouwcoQohhap/FukPBsT489OR3KRAVmsisDgX5IsY8', '2022-07-04 07:23:04');
/*!40000 ALTER TABLE `medewerkers` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.overnachtingen wordt geschreven
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

-- Dumpen data van tabel donkeytravel.overnachtingen: 0 rows
/*!40000 ALTER TABLE `overnachtingen` DISABLE KEYS */;
/*!40000 ALTER TABLE `overnachtingen` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.pauzeplaatsen wordt geschreven
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

-- Dumpen data van tabel donkeytravel.pauzeplaatsen: 0 rows
/*!40000 ALTER TABLE `pauzeplaatsen` DISABLE KEYS */;
/*!40000 ALTER TABLE `pauzeplaatsen` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.restaurants wordt geschreven
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

-- Dumpen data van tabel donkeytravel.restaurants: 0 rows
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.statussen wordt geschreven
CREATE TABLE IF NOT EXISTS `statussen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Statuscode` int(11) NOT NULL DEFAULT '0',
  `Status` varchar(40) NOT NULL,
  `Verwijderbaar` tinyint(4) NOT NULL,
  `PIN` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.statussen: 0 rows
/*!40000 ALTER TABLE `statussen` DISABLE KEYS */;
INSERT INTO `statussen` (`ID`, `Statuscode`, `Status`, `Verwijderbaar`, `PIN`) VALUES
	(1, 1234, 'Actief', 1, 5634);
/*!40000 ALTER TABLE `statussen` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.tochten wordt geschreven
CREATE TABLE IF NOT EXISTS `tochten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Omschrijving` varchar(40) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `Dagen` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.tochten: 0 rows
/*!40000 ALTER TABLE `tochten` DISABLE KEYS */;
INSERT INTO `tochten` (`ID`, `Omschrijving`, `Route`, `Dagen`) VALUES
	(1, 'Dit is een mooie tocht', 'Amsterdam', 6);
/*!40000 ALTER TABLE `tochten` ENABLE KEYS */;

-- Structuur van  tabel donkeytravel.trackers wordt geschreven
CREATE TABLE IF NOT EXISTS `trackers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINcode` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `Time` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumpen data van tabel donkeytravel.trackers: 0 rows
/*!40000 ALTER TABLE `trackers` DISABLE KEYS */;
/*!40000 ALTER TABLE `trackers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
