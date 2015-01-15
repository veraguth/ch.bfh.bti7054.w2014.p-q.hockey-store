-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2015 um 23:16
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hockey-store_ch`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articlecategories`
--

CREATE TABLE IF NOT EXISTS `articlecategories` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articlecategories`
--

INSERT INTO `articlecategories` (`categoryID`, `name`) VALUES
(0, 'Stöcke'),
(1, 'Helme'),
(2, 'Trikots'),
(3, 'Schlittschuhe'),
(4, 'Handschuhe'),
(5, 'Schoner');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`articleID` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `categoryID` int(11) NOT NULL,
  `picture` varchar(50) CHARACTER SET latin1 NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL,
  `lead` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articles`
--

INSERT INTO `articles` (`articleID`, `name`, `categoryID`, `picture`, `text`, `lead`, `price`, `brand`) VALUES
(1, 'CCM Handschuh 1', 4, 'images/handschuhe/ccm/1.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy', '100', 'CCM'),
(2, 'Torspo Handschuh 1', 4, '/images/handschuhe/torspo/1.jpg', '', '', '60', 'Torspo'),
(3, 'Torspo Handschuh 2', 4, '/images/handschuhe/torspo/2.jpg', '', '', '150', 'Torspo'),
(4, 'Winnwell Handschuh 1', 4, '/images/handschuhe/winnwell/1.jpg', '', '', '200', 'Winnwell'),
(5, 'Winnwell Handschuh 2', 4, '/images/handschuhe/winnwell/2.jpg', '', '', '250', 'Winnwell');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`languageID` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`pageID` int(11) NOT NULL,
  `parent_pageID` int(11) DEFAULT NULL,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `naviText` varchar(20) NOT NULL,
  `templateID` int(11) NOT NULL,
  `content` text CHARACTER SET latin1,
  `languageID` int(11) NOT NULL,
  `path` varchar(20) CHARACTER SET latin1 NOT NULL,
  `articleCategoryID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`pageID`, `parent_pageID`, `title`, `naviText`, `templateID`, `content`, `languageID`, `path`, `articleCategoryID`) VALUES
(1, NULL, 'Home', 'home', 2, 'Welcome to the hockey-store :-)', 2, 'home', 0),
(2, 1, 'Stöcke', 'Stöcke', 3, 'Grosse Stöcke, kleine Stöcke, dicke Stöcke, dünne Stöcke, krumme Stöcke, gerade Stöcke, rote Stöcke, blaue Stöcke, schwarze Stöcke, Stöcke für Amatuere, Stöcke für Profis, Stöcke mit...\r\nadf', 2, 'stoecke', 0),
(3, 1, 'Schlöf', 'Schlöf', 3, 'Test', 2, 'schloef', 3),
(4, 1, 'Helme test', 'helme', 3, 'Helme Helme Helme', 2, 'helme', 1),
(5, 1, 'Trikots', 'Trikots', 3, 'Trikots', 2, 'trikots', 2),
(6, 1, 'Zubehör', 'Zubehör', 3, 'Zubehör Zubehör', 2, 'zubehoer', 0),
(7, 1, 'Schutzmaterial', 'Schutzmaterial', 3, 'schutzmaterial schutzmaterial schutzmaterial', 2, 'schutzmaterial', 5),
(8, 1, 'Handschuhe', 'Handschuhe', 3, 'Handschuhe Handschuhe Handschuhe', 2, 'handschuhe', 4),
(12, 1, 'new page', 'new page', 3, '', 2, 'path123', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `templateID` int(11) NOT NULL,
  `path` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Name` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `templates`
--

INSERT INTO `templates` (`templateID`, `path`, `Name`) VALUES
(1, '/templates/default/index.php', 'Default'),
(2, '/templates/redirect/index.php', 'Redirect'),
(3, '/templates/articels/index.php', 'Articels');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userID` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(15) CHARACTER SET latin1 NOT NULL,
  `name` varchar(15) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(15) CHARACTER SET latin1 NOT NULL,
  `adress` varchar(20) CHARACTER SET latin1 NOT NULL,
  `plz` int(11) NOT NULL,
  `city` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `name`, `firstname`, `adress`, `plz`, `city`, `email`) VALUES
(1, 'hm', 'password', 'Meier', 'Hans', 'Hansstrasse 25', 1111, 'Musterstadt', 'muster@dinimer.com'),
(2, 'test', 'test', 'test', 'dave', 'test', 3000, 'test', 'test@test.ch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`articleID`);

--
-- Indizes für die Tabelle `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`languageID`), ADD UNIQUE KEY `name` (`name`);

--
-- Indizes für die Tabelle `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`pageID`), ADD UNIQUE KEY `path` (`path`);

--
-- Indizes für die Tabelle `templates`
--
ALTER TABLE `templates`
 ADD PRIMARY KEY (`templateID`), ADD UNIQUE KEY `path` (`path`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `languages`
--
ALTER TABLE `languages`
MODIFY `languageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pages`
--
ALTER TABLE `pages`
MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
