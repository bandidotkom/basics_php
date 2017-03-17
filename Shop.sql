-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Mrz 2013 um 09:40
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Artikel`
--

CREATE TABLE IF NOT EXISTS `Artikel` (
  `ArtikelNr` int(4) NOT NULL AUTO_INCREMENT,
  `Artikelname` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `LieferantenNr` int(4) DEFAULT NULL,
  `KategorieNr` int(4) DEFAULT NULL,
  `Liefereinheit` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Einzelpreis` double(8,2) DEFAULT '0.00',
  `Lagerbestand` smallint(2) DEFAULT '0',
  `BestellteEinheiten` smallint(2) DEFAULT NULL,
  `Mindestbestand` smallint(2) DEFAULT NULL,
  `Auslaufartikel` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ArtikelNr`),
  KEY `LieferantenNr` (`LieferantenNr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=81 ;

--
-- Daten für Tabelle `Artikel`
--

INSERT INTO `Artikel` (`ArtikelNr`, `Artikelname`, `LieferantenNr`, `KategorieNr`, `Liefereinheit`, `Einzelpreis`, `Lagerbestand`, `BestellteEinheiten`, `Mindestbestand`, `Auslaufartikel`) VALUES
(1, 'Chai', 1, 1, '10 Kartons x 20 Beutel', 18.00, 39, 0, 10, 0),
(2, 'Chang', 1, 1, '24 x 12-oz-Flaschen', 19.00, 17, 40, 25, 0),
(3, 'Aniseed Syrup', 1, 2, '12 x 550-ml-Flaschen', 10.00, 13, 70, 25, 0),
(4, 'Chef Anton''s Cajun Seasoning', 2, 2, '48 x 6-oz-Gläser', 22.00, 53, 0, 0, 0),
(5, 'Chef Anton''s Gumbo Mix', 2, 2, '36 Kartons', 21.00, 0, 0, 0, 1),
(6, 'Grandma''s Boysenberry Spread', 3, 2, '12 x 8-oz-Gläser', 25.00, 120, 0, 25, 0),
(7, 'Uncle Bob''s Organic Dried Pears', 3, 7, '12 x 1-lb-Packungen', 30.00, 15, 0, 10, 0),
(8, 'Northwoods Cranberry Sauce', 3, 2, '12 x 12-oz-Gläser', 40.00, 6, 0, 0, 0),
(9, 'Mishi Kobe Niku', 4, 6, '18 x 500-g-Packungen', 97.00, 29, 0, 0, 1),
(10, 'Ikura', 4, 8, '12 x 200-ml-Gläser', 31.00, 31, 0, 0, 0),
(11, 'Queso Cabrales', 5, 4, '1-kg-Paket', 21.00, 22, 30, 30, 0),
(12, 'Queso Manchego La Pastora', 5, 4, '10 x 500-g-Packungen', 38.00, 86, 0, 0, 0),
(13, 'Konbu', 6, 8, '2-kg-Karton', 6.00, 24, 0, 5, 0),
(14, 'Tofu', 6, 7, '40 x 100-g-Packungen', 23.00, 35, 0, 0, 0),
(15, 'Genen Shouyu', 6, 2, '24 x 250-ml-Flaschen', 15.00, 39, 0, 5, 0),
(16, 'Pavlova', 7, 3, '32 x 500-g-Kartons', 17.00, 29, 0, 10, 0),
(17, 'Alice Mutton', 7, 6, '20 x 1-kg-Dosen', 39.00, 0, 0, 0, 1),
(18, 'Carnarvon Tigers', 7, 8, '16-kg-Paket', 62.00, 42, 0, 0, 0),
(19, 'Teatime Chocolate Biscuits', 8, 3, '10 Kartons x 12 Stück', 9.00, 25, 0, 5, 0),
(20, 'Sir Rodney''s Marmalade', 8, 3, '30 Geschenkkartons', 81.00, 40, 0, 0, 0),
(21, 'Sir Rodney''s Scones', 8, 3, '24 Packungen x 4 Stück', 10.00, 3, 40, 5, 0),
(22, 'Gustaf''s Knäckebröd', 9, 5, '24 x 500-g-Packungen', 21.00, 104, 0, 25, 0),
(23, 'Tunnbröd', 9, 5, '12 x 250-g-Packungen', 9.00, 61, 0, 25, 0),
(24, 'Guaraná Fantástica', 10, 1, '12 x 355-ml-Dosen', 4.00, 20, 0, 0, 1),
(25, 'NuNuCa Nuß-Nougat-Creme', 11, 3, '20 x 450-g-Gläser', 15.00, 76, 0, 30, 0),
(26, 'Gumbär Gummibärchen', 11, 3, '100 x 250-g-Beutel', 32.00, 15, 0, 0, 0),
(27, 'Schoggi Schokolade', 11, 3, '100 x 100-g-Stück', 44.00, 49, 0, 30, 0),
(28, 'Rössle Sauerkraut', 12, 7, '25 x 825-g-Dosen', 46.00, 26, 0, 0, 1),
(29, 'Thüringer Rostbratwurst', 12, 6, '50 Beutel x 30 Würstchen', 124.00, 0, 0, 0, 1),
(30, 'Nord-Ost Matjeshering', 13, 8, '10 x 200-g-Gläser', 26.00, 10, 0, 15, 0),
(31, 'Gorgonzola Telino', 14, 4, '12 x 100-g-Packungen', 12.00, 0, 70, 20, 0),
(32, 'Mascarpone Fabioli', 14, 4, '24 x 200-g-Packungen', 32.00, 9, 40, 25, 0),
(33, 'Geitost', 15, 4, '500-g-Packung', 2.00, 112, 0, 20, 0),
(34, 'Sasquatch Ale', 16, 1, '24 x 12-oz-Flaschen', 14.00, 111, 0, 15, 0),
(35, 'Steeleye Stout', 16, 1, '24 x 12-oz-Flaschen', 18.00, 20, 0, 15, 0),
(36, 'Inlagd Sill', 17, 8, '24 x 250-g -Gläser', 19.00, 112, 0, 20, 0),
(37, 'Gravad lax', 17, 8, '12 x 500-g-Packungen', 26.00, 11, 50, 25, 0),
(38, 'Côte de Blaye', 18, 1, '12 x 75-cl-Flaschen', 263.00, 17, 0, 15, 0),
(39, 'Chartreuse verte', 18, 1, '750-ml-Flasche', 18.00, 69, 0, 5, 0),
(40, 'Boston Crab Meat', 19, 8, '24 x 4-oz-Dosen', 18.00, 123, 0, 30, 0),
(41, 'Jack''s New England Clam Chowder', 19, 8, '12 x 12-oz-Dosen', 9.00, 85, 0, 10, 0),
(42, 'Singaporean Hokkien Fried Mee', 20, 5, '32 x 1-kg-Packungen', 14.00, 26, 0, 0, 1),
(43, 'Ipoh Coffee', 20, 1, '16 x 500-g-Dosen', 46.00, 17, 10, 25, 0),
(44, 'Gula Malacca', 20, 2, '20 x 2-kg-Beutel', 19.00, 27, 0, 15, 0),
(45, 'Røgede sild', 21, 8, '1-kg-Paket', 9.00, 5, 70, 15, 0),
(46, 'Spegesild', 21, 8, '4 x 450-g-Gläser', 12.00, 95, 0, 0, 0),
(47, 'Zaanse koeken', 22, 3, '10 x 4-oz-Kartons', 9.00, 36, 0, 0, 0),
(48, 'Chocolade', 22, 3, '10 Packungen', 12.00, 15, 70, 25, 0),
(49, 'Maxilaku', 23, 3, '24 x 50-g-Packungen', 20.00, 10, 60, 15, 0),
(50, 'Valkoinen suklaa', 23, 3, '12 x 100-g-Riegel', 16.00, 65, 0, 30, 0),
(51, 'Manjimup Dried Apples', 24, 7, '50 x 300-g-Packungen', 53.00, 20, 0, 10, 0),
(52, 'Filo Mix', 24, 5, '16 x 2-kg-Kartons', 7.00, 38, 0, 25, 0),
(53, 'Perth Pasties', 24, 6, '48 Stück', 32.00, 0, 0, 0, 1),
(54, 'Tourtière', 25, 6, '16 Pasteten', 7.00, 21, 0, 10, 0),
(55, 'Pâté chinois', 25, 6, '24 Kartons x 2 Pasteten', 24.00, 115, 0, 20, 0),
(56, 'Gnocchi di nonna Alice', 26, 5, '24 x 250-g-Packungen', 38.00, 21, 10, 30, 0),
(57, 'Ravioli Angelo', 26, 5, '24 x 250-g-Packungen', 19.00, 36, 0, 20, 0),
(58, 'Escargots de Bourgogne', 27, 8, '24 Stück', 13.00, 62, 0, 20, 0),
(59, 'Raclette Courdavault', 28, 4, '5-kg-Packung', 55.00, 79, 0, 0, 0),
(60, 'Camembert Pierrot', 28, 4, '15 x 300-g-Stücke', 34.00, 19, 0, 0, 0),
(61, 'Sirop d''érable', 29, 2, '24 x 500-ml-Flaschen', 28.00, 113, 0, 25, 0),
(62, 'Tarte au sucre', 29, 3, '48 Törtchen', 49.00, 17, 0, 0, 0),
(63, 'Vegie-spread', 7, 2, '15 x 625-g-Gläser', 43.00, 24, 0, 5, 0),
(64, 'Wimmers gute Semmelknödel', 12, 5, '20 Beutel x 4 Stück', 34.00, 22, 80, 30, 0),
(65, 'Louisiana Fiery Hot Pepper Sauce', 2, 2, '32 x 8-oz-Flaschen', 21.00, 76, 0, 0, 0),
(66, 'Louisiana Hot Spiced Okra', 2, 2, '24 x 8-oz-Gläser', 17.00, 4, 100, 20, 0),
(67, 'Laughing Lumberjack Lager', 16, 1, '24 x 12-oz-Flaschen', 14.00, 52, 0, 10, 0),
(68, 'Scottish Longbreads', 8, 3, '10 Kartons x 8 Stück', 12.00, 6, 10, 15, 0),
(69, 'Gudbrandsdalsost', 15, 4, '10-kg-Paket', 36.00, 26, 0, 15, 0),
(70, 'Outback Lager', 7, 1, '24 x 355-ml-Flaschen', 15.00, 15, 10, 30, 0),
(71, 'Fløtemysost', 15, 4, '10 x 500-g-Packungen', 21.00, 26, 0, 0, 0),
(72, 'Mozzarella di Giovanni', 14, 4, '24 x 200 g-Packungen', 34.00, 14, 0, 0, 0),
(73, 'Röd Kaviar', 17, 8, '24 x 150-g-Gläser', 15.00, 101, 0, 5, 0),
(74, 'Longlife Tofu', 4, 7, '5-kg-Paket', 10.00, 4, 20, 5, 0),
(75, 'Rhönbräu Klosterbier', 12, 1, '24 x 0,5-l-Flaschen', 8.00, 125, 0, 25, 0),
(76, 'Lakkalikööri', 23, 1, '500-ml-Flasche', 18.00, 57, 0, 20, 0),
(77, 'Original Frankfurter grüne Soße', 12, 2, '12 Kartons', 14.00, 64, 0, 15, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kunden`
--

CREATE TABLE IF NOT EXISTS `Kunden` (
  `KundenCode` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Firma` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Kontaktperson` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Position` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Strasse` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ort` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Region` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PLZ` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Land` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefon` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`KundenCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `Kunden`
--

INSERT INTO `Kunden` (`KundenCode`, `Firma`, `Kontaktperson`, `Position`, `Strasse`, `Ort`, `Region`, `PLZ`, `Land`, `Telefon`, `Fax`) VALUES
('ALFKI', 'Alfreds Futterkiste', 'Maria Anders', 'Vertriebsmitarbeiterin', 'Obere Str. 57', 'Berlin', '', '12209', 'Deutschland', '030-0074321', '030-0076545'),
('ANATR', 'Ana Trujillo Emparedados y helados', 'Ana Trujillo', 'Inhaberin', 'Avda. de la Constitución 2222', 'México D.F.', '', '05021', 'Mexiko', '(5) 555-4729', '(5) 555-3745'),
('ANTON', 'Antonio Moreno Taquería', 'Antonio Moreno', 'Inhaber', 'Mataderos  2312', 'México D.F.', '', '05023', 'Mexiko', '(5) 555-3932', ''),
('AROUT', 'Around the Horn', 'Thomas Hardy', 'Vertriebsmitarbeiter', '120 Hanover Sq.', 'London', '', 'WA1 1DP', 'Großbritannien', '(71) 555-7788', '(71) 555-6750'),
('BERGS', 'Berglunds snabbköp', 'Christina Berglund', 'Einkaufsleitung', 'Berguvsvägen  8', 'Luleå', '', 'S-958 22', 'Schweden', '0921-12 34 65', '0921-12 34 67'),
('BLAUS', 'Blauer See Delikatessen', 'Hanna Moos', 'Vertriebsmitarbeiterin', 'Forsterstr. 57', 'Mannheim', '', '68306', 'Deutschland', '0621-08460', '0621-08924'),
('BLONP', 'Blondel père et fils', 'Frédérique Citeaux', 'Marketingmanager', '24, place Kléber', 'Strasbourg', '', '67000', 'Frankreich', '88.60.15.31', '88.60.15.32'),
('BOLID', 'Bólido Comidas preparadas', 'Martín Sommer', 'Inhaber', 'C/ Araquil, 67', 'Madrid', '', '28023', 'Spanien', '(91) 555 22 82', '(91) 555 91 99'),
('BONAP', 'Bon app''', 'Laurence Lebihan', 'Inhaber', '12, rue des Bouchers', 'Marseille', '', '13008', 'Frankreich', '91.24.45.40', '91.24.45.41'),
('BOTTM', 'Bottom-Dollar Markets', 'Elizabeth Lincoln', 'Buchhalterin', '23 Tsawassen Blvd.', 'Tsawassen', 'BC', 'T2F 8M4', 'Kanada', '(604) 555-4729', '(604) 555-3745'),
('BSBEV', 'B''s Beverages', 'Victoria Ashworth', 'Vertriebsmitarbeiterin', 'Fauntleroy Circus', 'London', '', 'EC2 5NT', 'Großbritannien', '(71) 555-1212', ''),
('CACTU', 'Cactus Comidas para llevar', 'Patricio Simpson', 'Vertriebsagent', 'Cerrito 333', 'Buenos Aires', '', '1010', 'Argentinien', '(1) 135-5555', '(1) 135-4892'),
('CENTC', 'Centro comercial Moctezuma', 'Francisco Chang', 'Marketingmanager', 'Sierras de Granada 9993', 'México D.F.', '', '05022', 'Mexiko', '(5) 555-3392', '(5) 555-7293'),
('CHOPS', 'Chop-suey Chinese', 'Yang Wang', 'Inhaber', 'Hauptstr. 29', 'Bern', '', '3012', 'Schweiz', '0452-076545', ''),
('COMMI', 'Comércio Mineiro', 'Pedro Afonso', 'Vertriebsassistent', 'Av. dos Lusíadas, 23', 'São Paulo', 'SP', '05432-043', 'Brasilien', '(11) 555-7647', ''),
('CONSH', 'Consolidated Holdings', 'Elizabeth Brown', 'Vertriebsmitarbeiterin', 'Berkeley Gardens\r\n12  Brewery ', 'London', '', 'WX1 6LT', 'Großbritannien', '(71) 555-2282', '(71) 555-9199'),
('DRACD', 'Drachenblut Delikatessen', 'Sven Ottlieb', 'Einkaufsleitung', 'Walserweg 21', 'Aachen', '', '52066', 'Deutschland', '0241-039123', '0241-059428'),
('DUMON', 'Du monde entier', 'Janine Labrune', 'Inhaberin', '67, rue des Cinquante Otages', 'Nantes', '', '44000', 'Frankreich', '40.67.88.88', '40.67.89.89'),
('EASTC', 'Eastern Connection', 'Ann Devon', 'Vertriebsagent', '35 King George', 'London', '', 'WX3 6FW', 'Großbritannien', '(71) 555-0297', '(71) 555-3373'),
('ERNSH', 'Ernst Handel', 'Roland Mendel', 'Vertriebsmanager', 'Kirchgasse 6', 'Graz', '', '8010', 'Österreich', '7675-3425', '7675-3426'),
('FAMIA', 'Familia Arquibaldo', 'Aria Cruz', 'Marketingassistentin', 'Rua Orós, 92', 'São Paulo', 'SP', '05442-030', 'Brasilien', '(11) 555-9857', ''),
('FISSA', 'FISSA Fabrica Inter. Salchichas S.A.', 'Diego Roel', 'Buchhalter', 'C/ Moralzarzal, 86', 'Madrid', '', '28034', 'Spanien', '(91) 555 94 44', '(91) 555 55 93'),
('FOLIG', 'Folies gourmandes', 'Martine Rancé', 'Vertriebsagentassistent', '184, chaussée de Tournai', 'Lille', '', '59000', 'Frankreich', '20.16.10.16', '20.16.10.17'),
('FOLKO', 'Folk och fä HB', 'Maria Larsson', 'Inhaberin', 'Åkergatan 24', 'Bräcke', '', 'S-844 67', 'Schweden', '0695-34 67 21', ''),
('FRANK', 'Frankenversand', 'Peter Franken', 'Marketingmanager', 'Berliner Platz 43', 'München', '', '80805', 'Deutschland', '089-0877310', '089-0877451'),
('FRANR', 'France restauration', 'Carine Schmitt', 'Marketingmanager', '54, rue Royale', 'Nantes', '', '44000', 'Frankreich', '40.32.21.21', '40.32.21.20'),
('FRANS', 'Franchi S.p.A.', 'Paolo Accorti', 'Vertriebsmitarbeiterin', 'Via Monte Bianco 34', 'Torino', '', '10100', 'Italien', '011-4988260', '011-4988261'),
('FURIB', 'Furia Bacalhau e Frutos do Mar', 'Lino Rodriguez ', 'Vertriebsmanager', 'Jardim das rosas n. 32', 'Lisboa', '', '1675', 'Portugal', '(1) 354-2534', '(1) 354-2535'),
('GALED', 'Galería del gastrónomo', 'Eduardo Saavedra', 'Marketingmanager', 'Rambla de Cataluña, 23', 'Barcelona', '', '08022', 'Spanien', '(93) 203 4560', '(93) 203 4561'),
('GODOS', 'Godos Cocina Típica', 'José Pedro Freyre', 'Vertriebsmanager', 'C/ Romero, 33', 'Sevilla', '', '41101', 'Spanien', '(95) 555 82 82', ''),
('GOURL', 'Gourmet Lanchonetes', 'André Fonseca', 'Vertriebsassistent', 'Av. Brasil, 442', 'Campinas', 'SP', '04876-786', 'Brasilien', '(11) 555-9482', ''),
('GREAL', 'Great Lakes Food Market', 'Howard Snyder', 'Marketingmanager', '2732 Baker Blvd.', 'Eugene', 'OR', '97403', 'USA', '(503) 555-7555', ''),
('GROSR', 'GROSELLA-Restaurante', 'Manuel Pereira', 'Inhaber', '5ª Ave. Los Palos Grandes', 'Caracas', 'DF', '1081', 'Venezuela', '(2) 283-2951', '(2) 283-3397'),
('HANAR', 'Hanari Carnes', 'Mario Pontes', 'Buchhalter', 'Rua do Paço, 67', 'Rio de Janeiro', 'RJ', '05454-876', 'Brasilien', '(21) 555-0091', '(21) 555-8765'),
('HILAA', 'HILARIÓN-Abastos', 'Carlos Hernández', 'Vertriebsmitarbeiter', 'Carrera 22 con Ave. Carlos Soublette #8-35', 'San Cristóbal', 'Táchira', '5022', 'Venezuela', '(5) 555-1340', '(5) 555-1948'),
('HUNGC', 'Hungry Coyote Import Store', 'Yoshi Latimer', 'Vertriebsmitarbeiter', 'City Center Plaza\r\n516 Main St.', 'Elgin', 'OR', '97827', 'USA', '(503) 555-6874', '(503) 555-2376'),
('HUNGO', 'Hungry Owl All-Night Grocers', 'Patricia McKenna', 'Vertriebsassistentin', '8 Johnstown Road', 'Cork', 'Co. Cork', '', 'Irland', '2967 542', '2967 3333'),
('ISLAT', 'Island Trading', 'Helen Bennett', 'Marketingmanager', 'Garden House\r\nCrowther Way', 'Hedge End', 'Lancashire', 'LA9 PX8', 'Großbritannien', '(24) 555-8888', ''),
('KOENE', 'Königlich Essen', 'Philip Cramer', 'Vertriebsassistent', 'Maubelstr. 90', 'Brandenburg', '', '14776', 'Deutschland', '0555-09876', ''),
('LACOR', 'La corne d''abondance', 'Daniel Tonini', 'Vertriebsmitarbeiter', '67, avenue de l''Europe', 'Versailles', '', '78000', 'Frankreich', '30.59.84.10', '30.59.85.11'),
('LAMAI', 'La maison d''Asie', 'Annette Roulet', 'Vertriebsmanager', '1 rue Alsace-Lorraine', 'Toulouse', '', '31000', 'Frankreich', '61.77.61.10', '61.77.61.11'),
('LAUGB', 'Laughing Bacchus Wine Cellars', 'Yoshi Tannamuri', 'Marketingassistent', '1900 Oak St.', 'Vancouver', 'BC', 'V3F 2K1', 'Kanada', '(604) 555-3392', '(604) 555-7293'),
('LAZYK', 'Lazy K Kountry Store', 'John Steel', 'Marketingmanager', '12 Orchestra Terrace', 'Walla Walla', 'WA', '99362', 'USA', '(509) 555-7969', '(509) 555-6221'),
('LEHMS', 'Lehmanns Marktstand', 'Renate Messner', 'Vertriebsmitarbeiterin', 'Magazinweg 7', 'Frankfurt a.M. ', '', '60528', 'Deutschland', '069-0245984', '069-0245874'),
('LETSS', 'Let''s Stop N Shop', 'Jaime Yorres', 'Inhaber', '87 Polk St.\r\nSuite 5', 'San Francisco', 'CA', '94117', 'USA', '(415) 555-5938', ''),
('LILAS', 'LILA-Supermercado', 'Carlos González', 'Buchhalter', 'Carrera 52 con Ave. Bolívar #65-98 Llano Largo', 'Barquisimeto', 'Lara', '3508', 'Venezuela', '(9) 331-6954', '(9) 331-7256'),
('LINOD', 'LINO-Delicateses', 'Felipe Izquierdo', 'Inhaber', 'Ave. 5 de Mayo Porlamar', 'I. de Margarita', 'Nueva Esparta', '4980', 'Venezuela', '(8) 34-56-12', '(8) 34-93-93'),
('LONEP', 'Lonesome Pine Restaurant', 'Fran Wilson', 'Vertriebsmanager', '89 Chiaroscuro Rd.', 'Portland', 'OR', '97219', 'USA', '(503) 555-9573', '(503) 555-9646'),
('MAGAA', 'Magazzini Alimentari Riuniti', 'Giovanni Rovelli', 'Marketingmanager', 'Via Ludovico il Moro 22', 'Bergamo', '', '24100', 'Italien', '035-640230', '035-640231'),
('MAISD', 'Maison Dewey', 'Catherine Dewey', 'Vertriebsagent', 'Rue Joseph-Bens 532', 'Bruxelles', '', 'B-1180', 'Belgien', '(02) 201 24 67', '(02) 201 24 68'),
('MEREP', 'Mère Paillarde', 'Jean Fresnière', 'Marketingassistent', '43 rue St. Laurent', 'Montréal', 'Québec', 'H1J 1C3', 'Kanada', '(514) 555-8054', '(514) 555-8055'),
('MORGK', 'Morgenstern Gesundkost', 'Alexander Feuer', 'Marketingassistent', 'Heerstr. 22', 'Leipzig', '', '04179', 'Deutschland', '0342-023176', ''),
('NORTS', 'North/South', 'Simon Crowther', 'Vertriebsassistent', 'South House\r\n300 Queensbridge', 'London', '', 'SW7 1RZ', 'Großbritannien', '(71) 555-7733', '(71) 555-2530'),
('OCEAN', 'Océano Atlántico Ltda.', 'Yvonne Moncada', 'Vertriebsagentin', 'Ing. Gustavo Moncada 8585\r\nPiso 20-A', 'Buenos Aires', '', '1010', 'Argentinien', '(1) 135-5333', '(1) 135-5535'),
('OLDWO', 'Old World Delicatessen', 'Rene Phillips', 'Vertriebsmitarbeiter', '2743 Bering St.', 'Anchorage', 'AK', '99508', 'USA', '(907) 555-7584', '(907) 555-2880'),
('OTTIK', 'Ottilies Käseladen', 'Henriette Pfalzheim', 'Inhaberin', 'Mehrheimerstr. 369', 'Köln', '', '50739', 'Deutschland', '0221-0644327', '0221-0765721'),
('PARIS', 'Paris spécialités ', 'Marie Bertrand', 'Inhaberin', '265, boulevard Charonne', 'Paris', '', '75012', 'Frankreich', '(1) 42.34.22.66', '(1) 42.34.22.77'),
('PERIC', 'Pericles Comidas clásicas', 'Guillermo Fernández', 'Vertriebsmitarbeiter', 'Calle Dr. Jorge Cash 321', 'México D.F.', '', '05033', 'Mexiko', '(5) 552-3745', '(5) 545-3745'),
('PICCO', 'Piccolo und mehr', 'Georg Pipps', 'Vertriebsmanager', 'Geislweg 14', 'Salzburg', '', '5020', 'Österreich', '6562-9722', '6562-9723'),
('PRINI', 'Princesa Isabel Vinhos', 'Isabel de Castro', 'Vertriebsmitarbeiterin', 'Estrada da saúde n. 58', 'Lisboa', '', '1756', 'Portugal', '(1) 356-5634', ''),
('QUEDE', 'Que Delícia', 'Bernardo Batista', 'Buchhalter', 'Rua da Panificadora, 12', 'Rio de Janeiro', 'RJ', '02389-673', 'Brasilien', '(21) 555-4252', '(21) 555-4545'),
('QUEEN', 'Queen Cozinha', 'Lúcia Carvalho', 'Marketingassistentin', 'Alameda dos Canàrios, 891', 'São Paulo', 'SP', '05487-020', 'Brasilien', '(11) 555-1189', ''),
('QUICK', 'QUICK-Stop', 'Horst Kloss', 'Buchhalter', 'Taucherstraße 10', 'Cunewalde', '', '01307', 'Deutschland', '0372-035188', ''),
('RANCH', 'Rancho grande', 'Sergio Gutiérrez', 'Vertriebsmitarbeiter', 'Av. del Libertador 900', 'Buenos Aires', '', '1010', 'Argentinien', '(1) 123-5555', '(1) 123-5556'),
('RATTC', 'Rattlesnake Canyon Grocery', 'Paula Wilson', 'Vertriebsassistentin', '2817 Milton Dr.', 'Albuquerque', 'NM', '87110', 'USA', '(505) 555-5939', '(505) 555-3620'),
('REGGC', 'Reggiani Caseifici', 'Maurizio Moroni', 'Vertriebsassistent', 'Strada Provinciale 124', 'Reggio Emilia', '', '42100', 'Italien', '0522-556721', '0522-556722'),
('RICAR', 'Ricardo Adocicados', 'Janete Limeira', 'Vertriebsagentassistentin', 'Av. Copacabana, 267', 'Rio de Janeiro', 'RJ', '02389-890', 'Brasilien', '(21) 555-3412', ''),
('RICSU', 'Richter Supermarkt', 'Michael Holz', 'Vertriebsmanager', 'Grenzacherweg 237', 'Genève', '', '1203', 'Schweiz', '0897-034214', ''),
('ROMEY', 'Romero y tomillo', 'Alejandra Camino', 'Buchhalterin', 'Gran Vía, 1', 'Madrid', '', '28001', 'Spanien', '(91) 745 6200', '(91) 745 6210'),
('SANTG', 'Santé Gourmet', 'Jonas Bergulfsen', 'Inhaber', 'Erling Skakkes gate 78', 'Stavern', '', '4110', 'Norwegen', '07-98 92 35', '07-98 92 47'),
('SAVEA', 'Save-a-lot Markets', 'Jose Pavarotti', 'Vertriebsmitarbeiter', '187 Suffolk Ln.', 'Boise', 'ID', '83720', 'USA', '(208) 555-8097', ''),
('SEVES', 'Seven Seas Imports', 'Hari Kumar', 'Vertriebsmanager', '90 Wadhurst Rd.', 'London', '', 'OX15 4NB', 'Großbritannien', '(71) 555-1717', '(71) 555-5646'),
('SIMOB', 'Simons bistro', 'Jytte Petersen', 'Inhaberin', 'Vinbæltet 34', 'København', '', '1734', 'Dänemark', '31 12 34 56', '31 13 35 57'),
('SPECD', 'Spécialités du monde', 'Dominique Perrier', 'Marketingmanager', '25, rue Lauriston', 'Paris', '', '75016', 'Frankreich', '(1) 47.55.60.10', '(1) 47.55.60.20'),
('SPLIR', 'Split Rail Beer & Ale', 'Art Braunschweiger', 'Vertriebsmanager', 'P.O. Box 555', 'Lander', 'WY', '82520', 'USA', '(307) 555-4680', '(307) 555-6525'),
('SUPRD', 'Suprêmes délices', 'Pascale Cartrain', 'Buchhalterin', 'Boulevard Tirou, 255', 'Charleroi', '', 'B-6000', 'Belgien', '(071) 23 67 22 20', '(071) 23 67 22 21'),
('THEBI', 'The Big Cheese', 'Liz Nixon', 'Marketingmanager', '89 Jefferson Way\r\nSuite 2', 'Portland', 'OR', '97201', 'USA', '(503) 555-3612', ''),
('THECR', 'The Cracker Box', 'Liu Wong', 'Marketingassistent', '55 Grizzly Peak Rd.', 'Butte', 'MT', '59801', 'USA', '(406) 555-5834', '(406) 555-8083'),
('TOMSP', 'Toms Spezialitäten', 'Karin Josephs', 'Marketingmanager', 'Luisenstr. 48', 'Münster', '', '44087', 'Deutschland', '0251-031259', '0251-035695'),
('TORTU', 'Tortuga Restaurante', 'Miguel Angel Paolino', 'Inhaber', 'Avda. Azteca 123', 'México D.F.', '', '05033', 'Mexiko', '(5) 555-2933', ''),
('TRADH', 'Tradição Hipermercados', 'Anabela Domingues', 'Vertriebsmitarbeiterin', 'Av. Inês de Castro, 414', 'São Paulo', 'SP', '05634-030', 'Brasilien', '(11) 555-2167', '(11) 555-2168'),
('TRAIH', 'Trail''s Head Gourmet Provisioners', 'Helvetius Nagy', 'Vertriebsassistent', '722 DaVinci Blvd.', 'Kirkland', 'WA', '98034', 'USA', '(206) 555-8257', '(206) 555-2174'),
('VAFFE', 'Vaffeljernet', 'Palle Ibsen', 'Vertriebsmanager', 'Smagsløget 45', 'Århus', '', '8200', 'Dänemark', '86 21 32 43', '86 22 33 44'),
('VICTE', 'Victuailles en stock', 'Mary Saveley', 'Vertriebsagent', '2, rue du Commerce', 'Lyon', '', '69004', 'Frankreich', '78.32.54.86', '78.32.54.87'),
('VINET', 'Vins et alcools Chevalier', 'Paul Henriot', 'Buchhalter', '59 rue de l''Abbaye', 'Reims', '', '51100', 'Frankreich', '26.47.15.10', '26.47.15.11'),
('WANDK', 'Die Wandernde Kuh', 'Rita Müller', 'Vertriebsmitarbeiterin', 'Adenauerallee 900', 'Stuttgart', '', '70563', 'Deutschland', '0711-020361', '0711-035428'),
('WARTH', 'Wartian Herkku', 'Pirkko Koskitalo', 'Buchhalterin', 'Torikatu 38', 'Oulu', '', '90110', 'Finnland', '981-443655', '981-443655'),
('WELLI', 'Wellington Importadora', 'Paula Parente', 'Vertriebsmanager', 'Rua do Mercado, 12', 'Resende', 'SP', '08737-363', 'Brasilien', '(14) 555-8122', ''),
('WHITC', 'White Clover Markets', 'Karl Jablonski', 'Inhaber', '305 - 14th Ave. S.\r\nSuite 3B', 'Seattle', 'WA', '98128', 'USA', '(206) 555-4112', '(206) 555-4115'),
('WILMK', 'Wilman Kala', 'Matti Karttunen', 'Inhaber/Marketingassistent', 'Keskuskatu 45', 'Helsinki', '', '21240', 'Finnland', '90-224 8858', '90-224 8858'),
('WOLZA', 'Wolski  Zajazd', 'Zbyszek Piestrzeniewicz', 'Inhaber', 'ul. Filtrowa 68', 'Warszawa', '', '01-012', 'Polen', '(26) 642-7012', '(26) 642-7012');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lieferanten`
--

CREATE TABLE IF NOT EXISTS `Lieferanten` (
  `LieferantenNr` int(4) NOT NULL AUTO_INCREMENT,
  `Firma` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Kontaktperson` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Position` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Strasse` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ort` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Region` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PLZ` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Land` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefon` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Webseite` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`LieferantenNr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Daten für Tabelle `Lieferanten`
--

INSERT INTO `Lieferanten` (`LieferantenNr`, `Firma`, `Kontaktperson`, `Position`, `Strasse`, `Ort`, `Region`, `PLZ`, `Land`, `Telefon`, `Fax`, `Webseite`) VALUES
(1, 'Exotic Liquids', 'Charlotte Cooper', 'Einkaufsmanager', '49 Gilbert St.', 'London', '', 'EC1 4SD', 'Großbritannien', '(71) 555-2222', '', ''),
(2, 'New Orleans Cajun Delights', 'Shelley Burke', 'Bestellungen-Sachbearbeiterin', 'P.O. Box 78934', 'New Orleans', 'LA', '70117', 'USA', '(100) 555-4822', '', '#CAJUN.HTM#'),
(3, 'Grandma Kelly''s Homestead', 'Regina Murphy', 'Vertriebsmitarbeiterin', '707 Oxford Rd.', 'Ann Arbor', 'MI', '48104', 'USA', '(313) 555-5735', '(313) 555-3349', ''),
(4, 'Tokyo Traders', 'Yoshi Nagase', 'Marketingmanager', '9-8 Sekimai\r\nMusashino-shi', 'Tokyo', '', '100', 'Japan', '(03) 3555-5011', '', ''),
(5, 'Cooperativa de Quesos ''Las Cabras''', 'Antonio del Valle Saavedra ', 'Exportadministrator', 'Calle del Rosal 4', 'Oviedo', 'Asturias', '33007', 'Spanien', '(98) 598 76 54', '', ''),
(6, 'Mayumi''s', 'Mayumi Ohno', 'Marketingrepräsentant', '92 Setsuko\r\nChuo-ku', 'Osaka', '', '545', 'Japan', '(06) 431-7877', '', 'Mayumi''s (im World Wide Web)#http://www.microsoft.'),
(7, 'Pavlova, Ltd.', 'Ian Devling', 'Marketingmanager', '74 Rose St.\r\nMoonie Ponds', 'Melbourne', 'Victoria', '3058', 'Australien', '(03) 444-2343', '(03) 444-6588', ''),
(8, 'Specialty Biscuits, Ltd.', 'Peter Wilson', 'Vertriebsmitarbeiter', '29 King''s Way', 'Manchester', '', 'M14 GSD', 'Großbritannien', '(26) 555-4448', '', ''),
(9, 'PB Knäckebröd AB', 'Lars Peterson', 'Vertriebsagent', 'Kaloadagatan 13', 'Göteborg', '', 'S-345 67', 'Schweden', '031-987 65 43', '031-987 65 91', ''),
(10, 'Refrescos Americanas LTDA', 'Carlos Diaz', 'Marketingmanager', 'Av. das Americanas 12.890', 'São Paulo', '', '5442', 'Brasilien', '(11) 555 4640', '', ''),
(11, 'Heli Süßwaren GmbH & Co. KG', 'Petra Winkler', 'Vertriebsmanager', 'Tiergartenstraße 5', 'Berlin', '', '10785', 'Deutschland', '(010) 9984510', '', ''),
(12, 'Plutzer Lebensmittelgroßmärkte AG', 'Martin Bein', 'Marketingmanager International', 'Bogenallee 51', 'Frankfurt', '', '60439', 'Deutschland', '(069) 992755', '', 'Plutzer (im World Wide Web)#http://www.microsoft.c'),
(13, 'Nord-Ost-Fisch Handelsgesellschaft mbH', 'Sven Petersen', 'Koordinator Auslandsmärkte', 'Frahmredder 112a', 'Cuxhaven', '', '27478', 'Deutschland', '(04721) 8713', '(04721) 8714', ''),
(14, 'Formaggi Fortini s.r.l.', 'Elio Rossi', 'Vertriebsmitarbeiter', 'Viale Dante, 75', 'Ravenna', '', '48100', 'Italien', '(0544) 60323', '(0544) 60603', '#FORMAGGI.HTM#'),
(15, 'Norske Meierier', 'Beate Vileid', 'Marketingmanager', 'Hatlevegen 5', 'Sandvika', '', '1320', 'Norwegen', '(0)2-953010', '', ''),
(16, 'Bigfoot Breweries', 'Cheryl Saylor', 'Regionalvertreterin', '3400 - 8th Avenue\r\nSuite 210', 'Bend', 'OR', '97101', 'USA', '(503) 555-9931', '', ''),
(17, 'Svensk Sjöföda AB', 'Michael Björn', 'Vertriebsmitarbeiter', 'Brovallavägen 231', 'Stockholm', '', 'S-123 45', 'Schweden', '08-123 45 67', '', ''),
(18, 'Aux joyeux ecclésiastiques', 'Guylène Nodier', 'Vertriebsmanager', '203, Rue des Francs-Bourgeois', 'Paris', '', '75004', 'Frankreich', '(1) 03.83.00.68', '(1) 03.83.00.62', ''),
(19, 'New England Seafood Cannery', 'Robb Merchant', 'Großhandelsvertreter', 'Order Processing Dept.\r\n2100 Paul Revere Blvd.', 'Boston', 'MA', '02134', 'USA', '(617) 555-3267', '(617) 555-3389', ''),
(20, 'Leka Trading', 'Chandra Leka', 'Inhaberin', '471 Serangoon Loop, Suite #402', 'Singapore', '', '0512', 'Singapur', '555-8787', '', ''),
(21, 'Lyngbysild', 'Niels Petersen', 'Vertriebsmanager', 'Lyngbysild\r\nFiskebakken 10', 'Lyngby', '', '2800', 'Dänemark', '43844108', '43844115', ''),
(22, 'Zaanse Snoepfabriek', 'Dirk Luchte', 'Buchhaltung-Sachbearbeiter', 'Verkoop\r\nRijnweg 22', 'Zaandam', '', '9999 ZZ', 'Niederlande', '(12345) 1212', '(12345) 1210', ''),
(23, 'Karkki Oy', 'Anne Heikkonen', 'Produktmanager', 'Valtakatu 12', 'Lappeenranta', '', '53120', 'Finnland', '(953) 10956', '', ''),
(24, 'G''day, Mate', 'Wendy Mackenzie', 'Vertriebsmitarbeiterin', '170 Prince Edward Parade\r\nHunter''s Hill', 'Sydney', 'NSW', '2042', 'Australien', '(02) 555-5914', '(02) 555-4873', 'G''day Mate (im World Wide Web)#http://www.microsof'),
(25, 'Ma Maison', 'Jean-Guy Lauzon', 'Marketingmanager', '2960 Rue St. Laurent', 'Montréal', 'Québec', 'H1J 1C3', 'Kanada', '(514) 555-9022', '', ''),
(26, 'Pasta Buttini s.r.l.', 'Giovanni Giudici', 'Bestellungen-Sachbearbeiter', 'Via dei Gelsomini, 153', 'Salerno', '', '84100', 'Italien', '(089) 6547665', '(089) 6547667', ''),
(27, 'Escargots Nouveaux', 'Marie Delamare', 'Vertriebsmanager', '22, rue H. Voiron', 'Montceau', '', '71300', 'Frankreich', '85.57.00.07', '', ''),
(28, 'Gai pâturage', 'Eliane Noz', 'Vertriebsmitarbeiterin', 'Bat. B\r\n3, rue des Alpes', 'Annecy', '', '74000', 'Frankreich', '38.76.98.06', '38.76.98.58', ''),
(29, 'Forêts d''érables', 'Chantal Goulet', 'Buchhaltung-Sachbearbeiterin', '148 rue Chasseur', 'Ste-Hyacinthe', 'Québec', 'J2S 7S8', 'Kanada', '(514) 555-2955', '(514) 555-2921', '');

CREATE TABLE IF NOT EXISTS `bestellungen` (
  `BestellNr` int(4) NOT NULL AUTO_INCREMENT,
  `ArtikelNr` int(4) NOT NULL,
  `KundenCode` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Stueckzahl` int(4) DEFAULT '1',
  `Zeitstempel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Gesamtpreis` double(8,2) NOT NULL,
  PRIMARY KEY (`BestellNr`,`ArtikelNr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`BestellNr`, `ArtikelNr`, `KundenCode`, `Stueckzahl`, `Zeitstempel`, `Gesamtpreis`) VALUES
(1, 3, 'ALFKI', 10, '2010-02-26 20:36:08', 100.00),
(2, 1, 'GALED', 3, '2010-06-07 09:23:27', 54.00),
(3, 19, 'QUICK', 2, '2010-11-02 16:41:27', 18.00),
(4, 3, 'ALFKI', 4, '2011-05-21 12:29:00', 40.00),
(4, 13, 'ALFKI', 1, '2011-05-21 12:29:00', 6.00),
(4, 26, 'ALFKI', 3, '2011-05-21 12:29:00', 96.00),
(5, 29, 'PARIS', 2, '2011-06-22 13:35:00', 248.00),
(6, 11, 'LACOR', 10, '2011-07-10 14:28:00', 210.00),
(6, 12, 'LACOR', 5, '2011-07-10 14:28:00', 190.00),
(7, 54, 'DUMON', 15, '2011-07-10 08:17:00', 105.00),
(8, 38, 'GALED', 5, '2011-07-11 08:38:00', 3945.00),
(9, 5, 'ANTON', 1, '2011-07-15 15:07:00', 21.00),
(10, 14, 'CACTU', 3, '2011-07-17 11:59:00', 69.00),
(10, 27, 'CACTU', 1, '2011-07-17 11:59:00', 44.00),
(11, 28, 'WOLZA', 10, '2012-01-17 06:52:00', 460.00),
(11, 29, 'WOLZA', 1, '2012-01-17 06:52:00', 124.00),
(11, 30, 'WOLZA', 4, '2012-01-17 06:52:00', 104.00),
(11, 77, 'WOLZA', 6, '2012-01-17 06:52:00', 84.00),
(12, 67, 'ALFKI', 2, '2012-04-29 07:11:00', 28.00),
(13, 39, 'QUEEN', 2, '2012-04-29 20:01:02', 36.00),
(13, 73, 'QUEEN', 2, '2012-04-29 20:01:02', 30.00),
(14, 43, 'OCEAN', 4, '2012-04-30 11:51:05', 184.00),
(15, 40, 'PARIS', 1, '2012-04-30 17:34:05', 18.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
