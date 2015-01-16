-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2015 um 12:31
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
  `categoryID` int(11) DEFAULT NULL,
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
(5, 'Schoner'),
(6, 'Zubehör');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articles`
--

INSERT INTO `articles` (`articleID`, `name`, `categoryID`, `picture`, `text`, `lead`, `price`, `brand`) VALUES
(1, 'CCM Handschuh 1', 4, '/images/handschuhe/ccm/CC2G-BKW-1HGC200.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy', '100', 'CCM'),
(2, 'Torspo Handschuh 1', 4, '/images/handschuhe/torspo/1.jpg', '', '', '60', 'Torspo'),
(3, 'Torspo Handschuh 2', 4, '/images/handschuhe/torspo/2.jpg', '', '', '150', 'Torspo'),
(4, 'Winnwell Handschuh 1', 4, '/images/handschuhe/winnwell/1.jpg', '', '', '200', 'Winnwell'),
(5, 'Winnwell Handschuh 2', 4, '/images/handschuhe/winnwell/2.jpg', '', '', '250', 'Winnwell'),
(8, 'Fischer Perfect Line', 0, '/images/Stoeck/Fischer/Stick_HX5.jpg', '', '', '160', 'Fischer'),
(9, 'Fischer Extreme', 0, '/images/Stoeck/Fischer/1216_0.jpg', '', '', '180', 'Fischer'),
(10, 'Graf Perfectline', 3, '/images/Schloef/Graf/61_0.jpg', '', '', '300', 'Graf'),
(11, 'Graf Guidance line', 3, '/images/Schloef/Graf/58_0.jpg', '', '', '280', 'Graf'),
(12, 'Graf Laydies', 3, '/images/Schloef/Graf/1501_0.jpg', '', '', '150', 'Graf'),
(13, 'Protect', 1, '/images/Helm/Warrior/hhkroc2_3.jpg', '', '', '160', 'Warrior'),
(14, 'Super Save', 1, '/images/Helm/Warrior/hhkroc2_3.jpg', '', '', '180', 'Warrior'),
(15, 'Head Protect', 1, '/images/Helm/Reebok/Reebok-HT-3K-Combo.jpg', '', '', '220', 'Reebok'),
(16, 'Graf super line', 3, '/images/Schloef/Graf/783_0.jpg', '', '', '450', 'Graf'),
(17, 'Graf Ultra f50', 3, '/images/Schloef/Graf/327_0.jpg', '', '', '190', 'Graf'),
(18, 'Graf F40', 3, '/images/Schloef/Graf/61_0.jpg', '', '', '190', 'Graf'),
(20, 'new article 1', 1, '/images/Helm/Warrior/hhkroc2_3.jpg', 'haupttext', 'leadtext', '10000000', 'Graf');

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
  `articleCategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`pageID`, `parent_pageID`, `title`, `naviText`, `templateID`, `content`, `languageID`, `path`, `articleCategoryID`) VALUES
(1, NULL, 'Home', 'home', 2, 'Welcome to the hockey-store :-)', 2, 'home', 12),
(3, 1, 'Schlöf', 'Schlöf', 3, '', 2, 'schloef', 3),
(5, 1, 'Trikots', 'Trikots', 3, '', 2, 'trikots', 2),
(6, 1, 'Zubehör', 'Zubehör', 3, '', 2, 'zubehoer', 6),
(7, 1, 'Schutzmaterial', 'Schutzmaterial', 3, '', 2, 'schutzmaterial', 5),
(8, 1, 'Handschuhe', 'Handschuhe', 3, '', 2, 'handschuhe', 4),
(18, 1, 'Stoecke', 'Stoecke', 3, '', 2, 'stoecke', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `name`, `firstname`, `adress`, `plz`, `city`, `email`) VALUES
(6, 'test', 'test', 'testermann', 'tester', 'testerplatz', 5000, 'teststadt', 'test@test.ch');

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
MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT für Tabelle `languages`
--
ALTER TABLE `languages`
MODIFY `languageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pages`
--
ALTER TABLE `pages`
MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
