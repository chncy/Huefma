-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: mysqlsvr74.world4you.com
-- Erstellungszeit: 16. Mrz 2020 um 13:47
-- Server-Version: 5.7.27-log
-- PHP-Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `7888212db10`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Helfer`
--

CREATE TABLE `Helfer` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `beschreibung` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Hilfe`
--

CREATE TABLE `Hilfe` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `beschreibung` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Person`
--

CREATE TABLE `Person` (
  `id` int(11) NOT NULL,
  `vorname` varchar(80) NOT NULL,
  `nachname` varchar(80) NOT NULL,
  `stadt` varchar(200) NOT NULL,
  `plz` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleteKey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Helfer`
--
ALTER TABLE `Helfer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `Hilfe`
--
ALTER TABLE `Hilfe`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Helfer`
--
ALTER TABLE `Helfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Hilfe`
--
ALTER TABLE `Hilfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `Person`
--
ALTER TABLE `Person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
