-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2014 a las 17:02:53
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arunbakery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bakery`
--

CREATE TABLE IF NOT EXISTS `bakery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bakery`
--

INSERT INTO `bakery` (`id`, `name`, `address`, `register_number`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Arun Bakery', 'fake address dublin, irland', '234433228', '(439)4345543', 'sales@arunbakery.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `invoice_address`, `delivery_address`, `register_number`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Eliseo Streich', '214 Marisa Spring\nRalphtown, MA 27886', '3702 Eunice Lodge\nLake Kayside, CO 92576', '5464646456', '1-087-810-2135x01523', 'xmayert@gmail.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(2, 'Jordi Goodwin', '83695 Marilyne Isle Suite 598\nDahliashire, GU 61383-6581', '64377 Block Freeway Suite 933\nQuigleystad, NV 24724-6755', '', '153.311.3052x8181', 'adonis01@gmail.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(3, 'Darren Durgan', '535 Sherwood Spring Apt. 259\nPort Oswaldo, PW 88103', '762 Maryse Groves\nEast Bettieborough, MA 39999', '', '(848)119-6166x016', 'carroll.marie@yahoo.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(4, 'Ivory Walter', '175 Mueller Forest\nWest Myrtiebury, GU 37635-1866', '5561 Eli View\nNorth Marta, VA 41520', '', '665.610.6138', 'ivonrueden@marquardt.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(5, 'Paolo Crooks', '1729 Belle Lake Suite 245\nFarrellshire, NE 86355', '97158 Jennings Unions\nWeissnatside, LA 82801-1552', '', '1-085-648-2007x363', 'kerluke.darian@yahoo.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(6, 'Dr. Keenan Weissnat MD', '518 Hickle Skyway Apt. 827\nNorth Josiane, SC 28457', '87306 Karelle Passage Suite 800\nPort Emelieside, NH 86801', '', '478.656.0816x41746', 'morar.elyssa@robelprice.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(7, 'Samara Hamill Jr.', '1962 Cale Ford Suite 148\nBernardomouth, MI 73795-5687', '01727 Runolfsdottir Loaf\nBrycenfort, TN 21934-4122', '', '312-613-0561', 'robel.sophie@friesen.biz', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(8, 'Citlalli Rempel', '40317 Shirley Spurs Apt. 763\nWymanton, AE 29429-7982', '76147 Marks Alley Suite 965\nSouth Alvena, SC 77970', '', '440-402-1358', 'ford05@franecki.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(9, 'Mrs. Caleb Bartoletti', '595 Dickens Road\nLednerville, SC 19371', '946 Dickens Rest\nEast Viola, MI 62421-6005', '', '(784)578-1253', 'vesta.block@hodkiewicz.org', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(10, 'Lisandro Brown', '06898 Koepp Bypass\nWest Astridfurt, KY 70423-6565', '364 Ariane Rest Apt. 437\nKuhlmanstad, PW 99731-7088', '', '1-423-441-1612x82613', 'cole.mary@gmail.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(11, 'Peggie Bashirian DDS', '432 Rodriguez Crossroad Suite 970\nSouth Pasqualeview, VI 18564', '26335 Beer Landing Apt. 631\nElenormouth, AA 01873-7689', '', '508-283-8319x96262', 'laverna63@zemlakmante.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(12, 'Dr. Raymond Hettinger MD', '844 Hudson Roads Apt. 256\nJacobsberg, MN 68241-2920', '21186 Labadie Throughway Apt. 626\nRathfort, FL 41059', '', '(287)668-0042', 'elias.denesik@yahoo.com', '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(13, 'Dr. Nayeli Koepp', '117 Hudson Bridge Apt. 626\nNew Akeem, SC 13894-3119', '25305 Champlin Springs\nSouth Maximoburgh, TN 31115', '', '1-742-957-2543x698', 'sipes.grady@gmail.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(14, 'Kirstin Sporer', '175 Feest Club Apt. 895\nWest Kacey, CT 36632', '049 Art Port\nWildermanport, LA 95844', '', '04988677156', 'krice@connellyorn.biz', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(15, 'Kari Kihn', '77652 Hammes Ports\nCristalborough, WA 85595-9238', '95268 Nader Falls Apt. 890\nNaderfurt, NY 77752', '', '(600)783-5885', 'jonathan.mohr@yahoo.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(16, 'Dr. Sterling Grady DDS', '0169 Wehner Gardens\nAlisaberg, SC 93260', '02865 Roma Plaza\nPort Franciscoberg, VT 23316-7562', '', '(625)739-3481x885', 'slabadie@huel.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(17, 'Miss Burnice Sanford', '26674 Kuhlman Stravenue Apt. 803\nLake Marcelina, TN 58206-8524', '6847 Gage Vista Suite 036\nProhaskaborough, WA 27753', '', '652-204-8421x68012', 'stanley.crooks@yahoo.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(18, 'Elouise Kertzmann', '908 Destiney Ranch Suite 290\nEast Torrey, SC 96553', '774 Becker Cape Apt. 691\nLibbieton, DE 27412', '', '782.312.4579x59146', 'hgraham@mayertmayert.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(19, 'Moises Bogisich', '4434 Spencer Cove Suite 259\nNorth Durward, AZ 39696-1452', '898 Una Brooks Suite 474\nEast Anthony, MD 14176', '', '1-322-866-0142x180', 'linnie.ward@macejkovic.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(20, 'Joesph Dach DVM', '6821 Claire Village Apt. 182\nLake Tryciafurt, WA 09200-0704', '2848 Nettie Forge\nMagnoliafurt, IA 34991-1093', '', '(198)572-2500x10000', 'upton.vernie@kohler.net', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(21, 'Anabel Parker', '866 Pfannerstill Curve\nNorth Helene, HI 71344-8438', '487 Boehm Falls\nLakinfort, AA 02801', '', '02730569119', 'oda93@maggio.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(22, 'Peter Homenick', '974 Jessy Lane\nIssacside, SC 82640', '477 Melvin Stravenue\nMadieborough, MN 80947-5054', '', '(580)908-1634x862', 'porter.hahn@hotmail.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(23, 'Susie Hagenes', '84714 Bogisich Extension Apt. 009\nNikolauschester, GU 91244-9358', '133 Schumm Court Apt. 621\nSanfordstad, FM 03889-2229', '', '067-369-5288', 'ucarter@hotmail.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(24, 'Elaina Abbott', '2399 Rosetta Fall\nVonmouth, GU 68202', '3158 Beatty Corner\nShannahaven, KY 74836-6363', '', '1-523-915-9581x8805', 'christ40@hotmail.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(25, 'Miss Tristin Gusikowski DDS', '617 Abshire Mall\nHobartport, MP 41206-6635', '026 Avery Oval Apt. 574\nPort Jayda, AA 78995', '', '107.888.1503x52930', 'elowe@yahoo.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(26, 'Caesar Wintheiser', '5347 Annette Route Suite 180\nSouth Ardella, GU 54548-9072', '841 Heaney Turnpike\nRobertsborough, WY 43683', '', '(568)490-6711x3091', 'yboyer@bogisich.net', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(27, 'Annamarie Walsh', '47236 Trevion Burgs Apt. 128\nReggieshire, IN 33952-5897', '88640 Streich Route\nWest Nolanborough, MS 32689-4750', '', '+51(7)3223949108', 'katlynn.kautzer@ondrickamosciski.net', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(28, 'Dr. Estell Heaney V', '872 Veum Trace Suite 828\nCreminburgh, OK 72178', '283 Clare Course Apt. 934\nEast Daniellahaven, PR 08738-9478', '', '410.514.5544', 'swift.rodrigo@hotmail.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(29, 'Dale Bergnaum', '0218 Turcotte Station Suite 979\nPort Edwina, MN 80429', '60030 Brown Tunnel\nWest Maximillian, VI 08358', '', '07032412161', 'alejandrin90@yahoo.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(30, 'Berenice Lindgren', '13588 Eugene Forest\nTorphyshire, NJ 04622', '52632 Wuckert Village Suite 587\nEast Erwin, NH 93167-9944', '', '658.674.7336x180', 'idell.von@aufderhar.info', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(31, 'Martine Barrows', '68764 Ewell Roads\nNorth Gabriel, FL 74657-9996', '0412 Hadley Rue\nPort Arturomouth, TN 44133', '', '789-005-1339x7420', 'tvon@schuster.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(32, 'Connor Grady', '9375 Murray Springs Apt. 467\nNorth Antoninaview, WI 08760-0625', '58131 Olson Cape\nKuvalisfurt, OK 50680', '', '08480466280', 'adrianna91@swaniawskihuels.com', '2014-11-14 01:07:12', '2014-11-14 01:07:12'),
(33, 'Aniya Weissnat', '85974 Larson Plains\nNew Aidenburgh, MD 75530', '577 Jerad Parkway\nChesleyton, IN 81913', '', '06612448859', 'mwaters@yahoo.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(34, 'Alyce Shields', '1474 Purdy Spur\nTheafort, VT 34337', '95452 Waelchi Extensions\nVivianneburgh, CO 59336-3734', '', '1-913-943-2868x359', 'zackary41@schaefer.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(35, 'Blaze Gulgowski', '480 Nellie Lodge Apt. 430\nDavisland, ID 05509-1278', '6266 Nicolas Ridge Suite 547\nReingerbury, DC 30004-1897', '', '1-247-324-2052x659', 'sebastian.lindgren@altenwerth.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(36, 'Jevon Beatty', '1189 Gleason Gateway\nRuntefort, TN 85472-7669', '36004 Koch Springs\nEast Josie, VA 94301', '', '(145)694-9715x71906', 'cschuppe@kassulke.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(37, 'Eduardo Torphy', '282 O''Reilly Parks Apt. 717\nPort Vance, NH 12700-3501', '236 Cole Ridges\nHauckhaven, AZ 62700-0589', '', '1-811-825-7934', 'osinski.remington@gmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(38, 'Meta Krajcik', '927 Renner Mountain\nGottliebstad, NM 74801-2621', '3486 Berneice Burgs\nWilhelmstad, RI 49433', '', '546-317-8607', 'ikutch@hotmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(39, 'Mrs. Hallie Baumbach', '428 Frami Avenue\nLake Rossie, OK 04729-3167', '1105 Ernestine Keys Suite 319\nLake Auroremouth, WA 18424-3324', '', '620-171-9530', 'karlie07@hudson.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(40, 'Shaina Collier', '34241 Corwin Gardens\nEast Bernhard, FM 60692', '1552 West Canyon\nNorth Winonatown, HI 10816', '', '(480)777-6533x74336', 'ellie.hansen@abshire.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(41, 'Shea Greenholt II', '63698 Rohan Mills\nNorth Isacview, VT 76691-8935', '51821 Rylan Manor\nWest Dariana, PW 93003-8887', '', '+11(4)6146371819', 'lmcdermott@shields.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(42, 'Mr. Tremayne Bogan V', '021 Isabel Mission\nHodkiewiczfurt, FL 74605-1727', '7373 Precious Motorway Suite 709\nMaiyaborough, GA 67218', '', '477.369.1540x484', 'gregorio.boyer@yahoo.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(43, 'Berenice Robel I', '957 Shanahan Overpass Suite 537\nEast Kraig, WI 66878-1554', '5403 Daphne Place\nPort Gwendolynbury, NV 46201', '', '+54(1)4346742642', 'anastacio.ledner@hotmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(44, 'Jenifer Barrows', '001 Cormier Estate Apt. 745\nNew Syble, CA 83338-2124', '382 Genoveva Street Apt. 368\nAntwonbury, VT 45825-9845', '', '(318)633-6004x44328', 'ugusikowski@marvin.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(45, 'Olen Bode', '4289 Huel Roads\nLake Mustafa, GA 34197-3144', '3075 Jaunita Ferry Suite 759\nNorth Donavon, TN 77101', '', '(426)239-6794', 'cassandra18@yahoo.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(46, 'Adelle Gorczany', '18321 Bruen Ferry Apt. 827\nPort Isabell, NY 54532-6821', '21087 Heidi Courts Apt. 489\nGisselleport, OK 47696-9812', '', '165.049.3191x041', 'tcummings@hotmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(47, 'Ms. Maegan Murphy PhD', '34033 Ephraim Harbors\nNorth Amparo, AS 38683-2777', '729 Quitzon Bypass\nMikeltown, IN 21298-4598', '', '04819672284', 'douglas.jermaine@yahoo.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(48, 'Edd Rempel II', '187 Schuppe Ville\nPrudencestad, WA 82362', '6142 Christina River\nCasperhaven, ND 97258', '', '205.137.0259x976', 'ankunding.stewart@gmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(49, 'Ruthie Russel', '89916 Alia Plains\nJacobsonton, AZ 99572', '205 Nels Circles\nWolfville, CT 32944-9477', '', '405-622-4469x722', 'roger.macejkovic@hageneshahn.org', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(50, 'Kira Hilpert', '11275 Koss Greens\nWest Karleychester, OK 00932-2400', '351 Sallie Knolls\nAimeestad, WV 64142', '', '1-850-050-3705x04597', 'kbeer@yundtwuckert.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(51, 'Barney Mraz', '69013 Stark Harbors\nNorth Freemanberg, ND 08549', '767 Davis Roads Suite 145\nHodkiewiczland, DC 12234', '', '849.881.8861x23683', 'rosenbaum.rocio@gmail.com', '2014-11-14 01:07:13', '2014-11-14 01:07:13'),
(52, 'Ms. Cecil Hermann', '002 Friesen Village\nNorth Kennediburgh, IA 72575', '80897 Schuppe Ville Apt. 629\nKrajcikville, MS 33115-3483', '', '613.538.1559', 'camylle05@ritchie.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(53, 'Ms. Naomie Renner DDS', '155 Bill Loop\nWest Lilly, NC 49795', '4376 Welch Gardens\nJenkinsberg, ME 20402-2311', '', '+04(0)1796330266', 'kiarra.bernhard@yahoo.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(54, 'Miss Kris Hilpert', '1498 Vaughn Wall\nEast Lysanneport, AS 33057', '2930 Harmony Haven Suite 982\nRosashire, OR 51403-2221', '', '152-043-6980x3781', 'gorczany.ignacio@millerschinner.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(55, 'Friedrich Marks', '76799 Jaskolski Loaf Suite 532\nJuddberg, OK 28861', '911 Abbott Lake Suite 613\nCruickshankshire, MT 19400-0116', '', '1-454-567-8526', 'jeramie87@hettingerkoelpin.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(56, 'Rodger Murray', '561 Rosetta Pines Suite 271\nCristborough, TN 74518-2034', '304 Heaven Mews Suite 523\nLegroston, PA 11542', '', '748.198.4951x3565', 'emedhurst@medhursthahn.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(57, 'Franco Shanahan', '6168 Giovanna Cape Suite 257\nPort Bellemouth, PW 94700-7979', '09599 Leo Knolls Apt. 333\nPort Jeffry, CO 05965-2691', '', '979.578.6474x994', 'gibson.edwardo@moore.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(58, 'Rhea Johns', '0579 Koch Heights\nLake Edyth, ID 32574', '44465 Farrell Trace Suite 275\nSouth Chesterborough, UT 48596', '', '417-351-6905x382', 'wrippin@gmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(59, 'Dr. Fausto Christiansen', '10599 McDermott Forge Apt. 965\nHeaneyshire, MH 77370', '8491 Mercedes Knolls Suite 297\nNorth Florian, RI 91260', '', '637-570-6621x9659', 'lbednar@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(60, 'Hanna Fadel', '130 Padberg Neck\nLake Kiera, MD 11839-0274', '14636 Brekke Plains\nHarveyfort, PW 82996-1281', '', '537-178-8278x875', 'taya33@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(61, 'Gustave Dare', '602 Haven Drives\nNew Ines, WV 52740', '355 Adell Bridge\nPort Unique, VA 50705', '', '+51(1)9730707762', 'bmckenzie@gmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(62, 'Martine Heathcote', '16543 Hertha Station Suite 800\nLemuelland, AR 97765-2233', '2260 Ethyl Island\nSouth Shayleestad, FM 04203', '', '02948501925', 'hillard55@okunevalangosh.org', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(63, 'Fermin Roberts', '933 Chaz Squares Apt. 989\nStehrville, NM 46219', '55744 Armstrong Parks\nWest Porter, VA 09766-1076', '', '158.032.8885', 'veum.alene@walshkohler.org', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(64, 'Regan Connelly MD', '1113 Emard Crossroad Apt. 989\nNorth Meghanport, KY 05724-4706', '77461 Earnest Inlet\nNew Serenity, MS 42602-6698', '', '(079)508-3167x0466', 'blick.xzavier@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(65, 'Rocky Corkery', '21134 Weldon Falls\nKubview, CT 91556', '822 O''Hara Villages\nLake Brice, IL 53816-3790', '', '1-932-478-6540x96641', 'taylor10@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(66, 'Marco Kiehn', '5958 Tito Estate\nDaytonbury, SD 53621', '40898 Spinka Estates Apt. 521\nRusselville, UT 59206-4694', '', '08348780545', 'korey.franecki@yahoo.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(67, 'Jeff Greenholt', '1799 Jaime Brook\nPort Agnes, KS 38617-3189', '71587 Wilber Fields Apt. 443\nNew Ernestina, PW 55813-0553', '', '914.339.8947x731', 'casper71@cormier.biz', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(68, 'Miss Jewell Greenholt', '54485 Barrett Coves Suite 074\nEltashire, NJ 11840', '56238 Heathcote Terrace Suite 607\nNew Irvinghaven, IN 49991', '', '1-105-257-2208x78253', 'xrobel@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(69, 'Oswald Gibson', '9874 Alessia Mountains\nNew Jessie, GA 56243', '69067 Rosella Forge\nEast Modesto, ND 85247-9428', '', '013-246-1569x368', 'block.alanis@hotmail.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(70, 'Mervin Monahan', '3611 Sylvan Squares\nSouth German, NV 90613-4149', '1081 Hickle Squares Suite 388\nNorth Margaretborough, AP 17645-1537', '', '792-945-0066x67913', 'talia37@nikolaus.com', '2014-11-14 01:07:14', '2014-11-14 01:07:14'),
(71, 'Derick Runte', '0639 Hettinger Trace Suite 782\nWest Vadaport, VT 23939-0105', '6644 Moen Lodge\nNew Eulaliachester, IA 37532', '', '196-547-5542x36334', 'ines70@okeefe.biz', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(72, 'Jacques Weber', '596 Parker Fords Suite 099\nEast Misty, MA 53712-2053', '412 Donnelly Skyway Apt. 562\nStrackemouth, CO 53718', '', '185-294-7538x3522', 'vonrueden.lia@yahoo.com', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(73, 'Jan Lehner', '202 Lubowitz Row Apt. 101\nSouth Tyriqueborough, GA 74263-9524', '86092 Leonora Neck Apt. 747\nStiedemannfort, UT 75089', '', '1-787-397-4107x73695', 'rex.bergnaum@cremin.biz', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(74, 'Alek Hyatt V', '201 Irving Wells Apt. 940\nSwaniawskiburgh, NV 20300-6943', '911 Annetta Island Suite 659\nMcDermottmouth, AR 56553', '', '1-673-166-9666x51057', 'koch.toni@gmail.com', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(75, 'Shannon Wyman', '497 Allen Garden\nLake Aaliyah, AS 33680', '1338 Yvonne Summit\nNew Jordyn, GU 45547-9255', '', '590.692.9396x504', 'destiny95@yahoo.com', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(76, 'Mrs. Lamar Heller DVM', '616 Skye Mill\nVernermouth, OH 93718', '7749 Kian Via Apt. 128\nSouth Jess, PW 15474', '', '446-079-5053x71696', 'arempel@powlowski.biz', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(77, 'Miss Chelsea Wolf', '0191 Ondricka Loop Apt. 513\nLake Orpha, NJ 07831', '734 Steuber Burgs\nEast Michaleshire, MP 42182-6867', '', '(081)991-7756x0451', 'tavares80@halvorson.biz', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(78, 'Jensen Thiel', '80856 Little Manor Suite 676\nHilpertburgh, OR 26115', '814 Karson Port\nWest Ilastad, OH 64662-3713', '', '06183927740', 'joesph93@yahoo.com', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(79, 'Freeda Ortiz', '15675 Adrianna Common Apt. 424\nEast Kieran, MH 81504-1382', '1359 Renner Ranch Suite 745\nKleinstad, AA 52752-5562', '', '322.757.0776x6123', 'lenore.bauch@millsromaguera.org', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(80, 'Ayana Littel', '5663 Erica Ways\nVirgieburgh, IA 69298', '518 Gottlieb Walks Apt. 164\nWest Gretchen, VI 85549', '', '1-382-696-6509x0011', 'uo''keefe@abshire.info', '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(81, 'julio labrador', 'pueblo nuevo', 'venezuela tachira', '84848394', '938949', 'juliotelcel1982@gmail.com', '2014-11-15 20:15:48', '2014-11-15 21:02:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `single_price` float(8,2) NOT NULL,
  `total_price` float(8,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `quantity`, `single_price`, `total_price`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(16, 2, 2.35, 4.70, 6, 2, '2014-11-19 00:30:02', '2014-11-19 00:30:02'),
(17, 2, 263892.12, 527784.25, 6, 5, '2014-11-19 00:30:09', '2014-11-19 00:30:09'),
(18, 2, 500.00, 1000.00, 6, 9, '2014-11-19 00:30:17', '2014-11-19 00:35:03'),
(19, 3, 3832.28, 11496.84, 6, 6, '2014-11-19 00:39:06', '2014-11-19 00:39:06'),
(20, 4, 19.64, 78.56, 6, 7, '2014-11-19 00:50:28', '2014-11-19 00:50:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_13_143147_create_users_table', 1),
('2014_11_13_144035_create_status_table', 1),
('2014_11_13_144719_create_orders_table', 1),
('2014_11_13_145643_create_customers_table', 1),
('2014_11_13_150014_create_details_table', 1),
('2014_11_13_150525_create_products_table', 1),
('2014_11_13_150817_create_bakery_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `amount` float(8,2) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `delivery_address`, `delivery_date`, `amount`, `customer_id`, `order_id`, `created_at`, `updated_at`) VALUES
(6, '3702 Eunice Lodge\r\nLake Kayside, CO 92576', '2014-11-20', 540364.31, 1, 0, '2014-11-18 23:29:52', '2014-11-19 00:50:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `slug`, `price`, `created_at`, `updated_at`) VALUES
(1, 'updated products', 'Deleniti voluptas blanditiis voluptatibus et quo fugiat. Suscipit est vero eum quam sint sed cumque. Molestiae error veniam repellat cum. Dolores pariatur officiis velit vel nihil commodi.', '', 10000.00, '2014-11-14 01:07:15', '2014-11-15 22:07:46'),
(2, 'caja', 'Cumque voluptatem occaecati quo debitis aut. Dolorem molestiae eum corporis est repellendus. Deleniti error esse quia voluptatum esse. Sunt eum velit assumenda iusto veniam.', '', 2.35, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(3, 'manguera', 'Aliquid doloremque et consequatur sequi ut consequuntur tempora qui. Molestiae excepturi atque iste repellat incidunt tenetur itaque.', '', 13019.96, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(4, 'hamburguesa', 'Consequatur aut voluptas minima. Quasi ut tenetur quo ea eos voluptas.\nSint eum consequatur omnis voluptatem. Quia ab maxime ad impedit. Voluptates necessitatibus ea dolores consectetur.', '', 22.01, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(5, 'zapatos', 'Quo aut eligendi et. Nemo quaerat dolorem esse eum. Itaque natus voluptate commodi corporis. Ea consequuntur vel labore officia eveniet sed ea consequatur. Voluptas odit omnis ex magni.', '', 263892.12, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(6, 'telefono', 'Quibusdam atque omnis occaecati quaerat deserunt. Molestiae excepturi eligendi dignissimos illum. Voluptatibus unde voluptatum laudantium et excepturi expedita sunt veritatis.', '', 3832.28, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(7, 'ventilador', 'Consequatur sit consectetur architecto quia qui ipsam. Ea dolorum dolore molestias quaerat. Excepturi aliquam perferendis ut ea. Adipisci doloremque consequatur sunt ratione sunt ut dolores.', '', 19.64, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(8, 'moto', 'Dolorum enim dolor voluptas voluptatibus. Ipsam libero et atque voluptatum aut repellat.', '', 113.64, '2014-11-14 01:07:15', '2014-11-14 01:07:15'),
(9, 'laptop', 'Cumque officiis illum sunt. Est ex veritatis suscipit sit sunt. Consectetur eos facilis neque laboriosam quidem sed voluptatibus.', '', 10000.00, '2014-11-14 01:07:16', '2014-11-14 01:07:16'),
(10, 'empanada', 'Pariatur et soluta nesciunt id et numquam animi voluptatem. Quibusdam aut quos maxime aut repudiandae. Blanditiis quod nostrum eum aperiam.', '', 10000.00, '2014-11-14 01:07:16', '2014-11-14 01:07:16'),
(11, 'producto nuevo', 'descripcion del nuevo producto', '', 22.80, '2014-11-15 21:55:40', '2014-11-15 21:55:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('received','processing','out for delivery','delivered','cancelled','open') COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`, `order_id`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(3, 'open', 6, 83, '', '2014-11-18 23:29:52', '2014-11-18 23:29:52'),
(4, 'received', 6, 83, '', '2014-11-19 00:57:42', '2014-11-19 00:57:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('admin','delivery','manufacturer','saler','seller') COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_type`, `address`, `phone_number`, `register_number`, `bank_account`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carter Predovic', 'strosin.buck@yahoo.com', '$2y$10$7uRtXYAVprPtw10KRqkei.D2UUuVYbzfp6NE1CXieX8MRjVpbMHTW', 'delivery', '27391 Harber Plains Apt. 435West Rivermouth, CO 26597', '05320043142', '2432342342', '2342342342342', NULL, '2014-11-14 01:06:59', '2014-11-15 01:35:13'),
(2, 'Dr. Monique Walker DDS', 'dennis.shanahan@hotmail.com', '$2y$10$at8xuT4.dcoyUAcA53B0V.QxnVgwO6CLB115EUKSUvbQLb0/nUIxe', 'delivery', '4445 Maryse Trail Apt. 309\nEast Kylee, ID 50170-6416', '05231186410', '', '', NULL, '2014-11-14 01:06:59', '2014-11-14 01:06:59'),
(3, 'Ms. Kelley Zulauf DDS', 'xander51@yahoo.com', '$2y$10$5gSZ8jnOQcwcAbyo6EnrAOWg9jt1TJx9TOXuhJ9efmz3XVcALE7O2', 'delivery', '611 Nolan Gateway Suite 907\nEast Ayanaview, ME 56953-6384', '645-154-7189x939', '', '', NULL, '2014-11-14 01:06:59', '2014-11-14 01:06:59'),
(4, 'Dillon Kris Sr.', 'rbayer@yostweber.org', '$2y$10$nrDISrmcBpgTvWMEf/GHR.IEW3yyzunqZTDstxluggAxBMJximfaK', 'seller', '097 Lavina Ferry Suite 837\nNorth Chester, RI 59828-9243', '1-560-065-1164', '', '', NULL, '2014-11-14 01:06:59', '2014-11-14 01:06:59'),
(5, 'Mrs. Arnold Strosin', 'lueilwitz.fiona@purdy.com', '$2y$10$LEeAtcht0eGXCercliMC6uVy99eW37/NgNAmyZ5L/lteUK7LoZIjq', 'manufacturer', '92321 Eli Tunnel Apt. 366\nEast Raphael, NV 64466', '988-934-5870', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(6, 'Murray Kris MD', 'ghaley@hotmail.com', '$2y$10$b7PtnxMRvKU45yo3iIZVTuh7QO0MNyJG6H03ogDVBTfsi0z1BeTgG', 'seller', '8297 Rath Avenue\nCaesarfurt, GA 68402', '(926)418-2911', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(7, 'Mrs. Audrey Abbott', 'adalberto74@yahoo.com', '$2y$10$wLBqM5BgIddlwcD6q.qa5euFcfEMU.3oK84Fp3MwzFRLvrWlI2WUm', 'delivery', '603 Fahey Camp\nGutmannburgh, MI 64745', '1-168-950-5132x54222', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(8, 'Loma Auer Jr.', 'candace39@yahoo.com', '$2y$10$2tNipFKfFaHYwhpXQGRfIe7uEAFf.BAEEp.byXbm0LjbECotar4aO', 'manufacturer', '85971 Connie Villages\nEast Elmerborough, WY 08361-8962', '901-462-7338x01556', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(9, 'Mr. Lennie Roberts', 'carey18@hotmail.com', '$2y$10$5mABJOcl0jVU1lKlrtIGx.xuYCF.NdfbO1tA4YZ2WRkQCJKxh1p.K', 'delivery', '6977 Dulce Ports\nKarenport, MN 89858', '(365)264-2845x6598', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(10, 'Monte Lemke', 'hector46@ondricka.com', '$2y$10$uEF1rI8mS9G4JlxNWW5Rz.Phc2WRhrdKhAFFi9o8ABm4Nbe5dl5yO', 'delivery', '7784 Elfrieda Mission\nNew Chetburgh, FM 18253-5510', '1-300-045-4077x409', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(11, 'Beaulah O''Hara', 'hazle26@ortiz.org', '$2y$10$MVdSpANF5qOH9y55l8ZTJ.72pxbG7MiwTZBVifDMeZq64dPjDnRsa', 'delivery', '98593 Hagenes Forest Apt. 212\nNew Lauren, NV 62798', '(398)730-1751x6300', '', '', NULL, '2014-11-14 01:07:00', '2014-11-14 01:07:00'),
(12, 'Garfield Gibson', 'upacocha@balistrerithompson.com', '$2y$10$4lXuGzTxuWjQwAc.HCnpbuWFuqEWLNyePhfOTUfHtUj1A7fMZXo5a', 'seller', '424 Viva Square\nNorth Daishabury, SC 02895-8685', '658.199.0891x3558', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(13, 'Miss Rigoberto Moen PhD', 'sconsidine@treutelschiller.com', '$2y$10$mbC/XVF6THwQ5Ac9rLDsB.7WkWhqO9ugOAlH2Mb4.Yem5Lq5SkfGC', 'seller', '851 Filomena Valley Apt. 149\nKeshaunfort, AL 82932-8180', '1-852-033-8915x093', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(14, 'Donna Lemke', 'sbotsford@larkin.com', '$2y$10$GPmQLJG8FCvXic1lWZu59OUBRS1fLRoVamHDFsdn4pv0voJveuKyy', 'seller', '420 Rogahn Knoll Apt. 063\nNorth Andreane, CA 20728', '586.499.8357x00726', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(15, 'Mrs. Carol Vandervort V', 'florida49@cassin.com', '$2y$10$jreT5T44XZBqx7IvdGmluuOq0XbN3iMHPedPE5fuYm6kFynpHmhLe', 'admin', '14908 Bins Islands Apt. 325\nOndrickachester, WV 56126', '+24(8)4524794208', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(16, 'Kraig Mayert', 'wmedhurst@kuhic.com', '$2y$10$o1mpWNjLXcTFgUmnBeXX1uJoq/ahDETcz/EoGNTsUEOpks6sLbMFG', 'delivery', '5214 Trinity Passage Suite 858\nWelchland, DC 37877', '811.664.0835', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(17, 'Ayla Smitham', 'cletus.von@gmail.com', '$2y$10$7pvOLzkkwTsegHJl7dcj1.dzjJieO1O.UBWQtO7wF6kVRW.1iLYl.', 'seller', '79608 Neil Station\nSamanthachester, KS 62506-5524', '1-211-630-5917x282', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(18, 'Miss Tyrese Mohr DDS', 'zmclaughlin@cormier.biz', '$2y$10$brvJCGi9C4sJsMIhQjXNHuhppvgiPmjty9qxRNQRPtf30Lxi4rJvS', 'admin', '94974 Zemlak Drives Suite 723\nCleveport, IL 83813', '287-222-3625x8275', '', '', NULL, '2014-11-14 01:07:01', '2014-11-14 01:07:01'),
(19, 'Lina Feeney', 'tmaggio@gottlieb.org', '$2y$10$9J8qwbL6X9Hl0gSYaErxeObcbfCkgXacZfgQNueBh/gWwpk3AB9KC', 'seller', '55164 Weimann Drive Suite 486\nWest Rowanburgh, CT 34524-5036', '02574840039', '', '', NULL, '2014-11-14 01:07:02', '2014-11-14 01:07:02'),
(20, 'Jewell Cummerata', 'shyanne64@yahoo.com', '$2y$10$RmMd5Zukc0WiV5w2U8fFzOC7.pS92TFwdaXfVqA13jsXXd8AMkEme', 'seller', '091 Klein Ferry Apt. 960\nKaelafort, MN 63582-4646', '125.681.6456', '', '', NULL, '2014-11-14 01:07:02', '2014-11-14 01:07:02'),
(21, 'Shea Morissette', 'cmckenzie@yahoo.com', '$2y$10$II65JWrJwFR1yXTvK8NGgONjm.TdWnj6nvZSYPClG4d4b2fGMsAlm', 'delivery', '649 Carey Extensions Suite 492\nBergstrommouth, ND 22767-9747', '+25(2)5806086532', '', '', NULL, '2014-11-14 01:07:02', '2014-11-14 01:07:02'),
(22, 'Ashlynn Schoen', 'rquigley@gmail.com', '$2y$10$8Lwzu4.Y8orQIusCmRpOGOKCqP/iOQs8dO1U1PoO6SYb0vUH1aY8.', 'manufacturer', '3981 Salvador Streets Apt. 450\nSouth Darylbury, SC 93973-3528', '173.655.5146', '', '', NULL, '2014-11-14 01:07:02', '2014-11-14 01:07:02'),
(23, 'Mrs. Hanna Hudson', 'rconnelly@gmail.com', '$2y$10$vx1zbjdHHId2/aTlDZb0wekw.vNiYj3mhdV2LWP6jCVnDapF73CKC', 'delivery', '3670 Ludwig Route\nNorth Reese, PR 30177', '1-588-386-3508x07673', '', '', NULL, '2014-11-14 01:07:02', '2014-11-14 01:07:02'),
(24, 'Dr. Chaim Prosacco DDS', 'sigrid.haag@orn.com', '$2y$10$WGSlEhmoyQSwLlVcCNZlZOtL/8/x1OIXcEei9ctL8R95SThSaB5tG', 'delivery', '543 Stehr Loop Suite 552\nHaneville, MD 31339-1280', '169-464-2381', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(25, 'Ms. Aric Swift', 'leopold62@yahoo.com', '$2y$10$JYVytxx4QxNjxHHc5rF6sO6mYNVM./jhF3qUUO4zzY/51rtztZkFu', 'seller', '365 Larissa Field\nEast Jay, KS 35623', '(153)160-8997', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(26, 'Dr. Anna Lowe', 'theo27@danielwintheiser.com', '$2y$10$l/7ZR2smSFLZz2K2J6UD1uwOilXKbAM0eV7DWxJNDZuSj//BD2HeC', 'admin', '0155 McLaughlin Circle\nPaulinetown, DC 17694', '920-627-2923x84631', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(27, 'Milford Heathcote', 'rhowe@mclaughlin.com', '$2y$10$/S43RJLK4cmX/Wp/wSq1euK5AMN3ffG4uOp6oKP.73CGR9g.BuI1u', 'seller', '44766 Prosacco Trace\nRatkefurt, SD 90130', '134.985.6673', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(28, 'Mr. Juliet Senger', 'ratke.stacey@hotmail.com', '$2y$10$dZZ5RdDGQIxfTVhXjhyYjeGYPoYYpJ0rMVwKwCSnLKcFn3vfW1Rde', 'admin', '79437 Rogahn Fork Suite 263\nArnaldoland, UT 14980-8234', '1-196-353-6748', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(29, 'Jermaine Conn', 'vbergnaum@gmail.com', '$2y$10$daBluNEwjUtFQXbRYJDQIOBNFc33l4z8fejuK0tobnpPgFar5atS.', 'admin', '03908 Gleason Circles\nBlockchester, MP 38738', '(195)213-3667', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(30, 'Donny Kovacek', 'jillian01@hotmail.com', '$2y$10$A8WP4EZmwgaQKSYFcR1iJ.xdVLfYZl1RqETLvZ7KMd1E5HQeEL7dK', 'seller', '20953 Will Roads\nTrishashire, TN 57119-2941', '148.668.5562x91472', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(31, 'Phoebe Kihn', 'zulauf.katelin@hermistonrenner.com', '$2y$10$QCzAPuO2j62dU1pMRhsCW.LAJ1qvetu.T48Wwemb//fObWBIvRULG', 'admin', '4804 Jacques Path Suite 563\nSouth Metaside, PR 56408', '(603)199-0881x2363', '', '', NULL, '2014-11-14 01:07:03', '2014-11-14 01:07:03'),
(32, 'Emilie Gleason I', 'rkuhlman@kerlukehermann.com', '$2y$10$ZemR9cnZ1ImP8/SFouFN9.ktHzeC02O5SRt699GisXUOhZRJDImfO', 'admin', '3784 Mraz Plaza\nNew Averyberg, GA 84058-7819', '687-470-2886', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(33, 'Dr. Winston Stoltenberg Jr.', 'zoe.harris@hotmail.com', '$2y$10$H8/3oc8mbwa6azcFIV.eZO5KV0KXEx.yit7LouSNaaF/E19o4IM8m', 'manufacturer', '6756 Robb Plain\nWest Abbigail, VI 97712-7152', '1-338-811-2550', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(34, 'Mrs. Ike Bernhard', 'faye.toy@johns.com', '$2y$10$/6LCVuGJapxrBhpPrjgSYu.fIbLfSvMHE8VEfaj7AwEaAgBDJI62y', 'manufacturer', '638 Estelle Shores Apt. 753\nEast Keyshawnville, NV 29965', '05588795994', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(35, 'Dr. Janis Swaniawski', 'azboncak@hotmail.com', '$2y$10$7QLwc6XOCOEb30DoymVqk.jT69dli4aA.sjZMOd5Cx26qgpuTbo36', 'delivery', '8680 Stark Skyway\nNew Astridport, MO 46439-2913', '1-376-230-1318x3975', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(36, 'Reba Emard', 'ewolff@gmail.com', '$2y$10$fVEgLeJmSFxR86OiMbE0q.AhjxFspXiJ7tlqZqSmAR6BMG7Z7rdZK', 'admin', '4384 Audreanne Park\nRossiechester, NE 81980-4155', '083-316-2858', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(37, 'Olga Herzog', 'audreanne.erdman@jast.org', '$2y$10$32Q3gZ3sYM.sBPpAbj3OkOVA1tZLdbIKDRTfV0AfQlnIkBKENnQnW', 'delivery', '92700 Zora Meadows\nJakobfurt, DC 76099-7733', '501.984.3437x65348', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(38, 'Dr. Bill Volkman IV', 'albertha.abbott@hotmail.com', '$2y$10$YJRje6mgyNEqXANA8M2ML.Tv3JkNmTpoV0nED7bBm3QY9UWvHqJ7C', 'seller', '678 Stracke Drives Suite 001\nEzratown, NY 02575', '071.099.6586x8952', '', '', NULL, '2014-11-14 01:07:04', '2014-11-14 01:07:04'),
(39, 'Mr. Cleta Breitenberg', 'jparisian@rau.net', '$2y$10$MwJ8aAxh3NtrnqKyhY/S6eCPM7GheRUgAM5UziiZ9brrhos4p3JQy', 'seller', '252 Margarett Glens Suite 334\nPort Darrionland, AS 52228-3643', '832.258.2090x782', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(40, 'Elyssa Pfannerstill', 'zyost@cummeratabartell.com', '$2y$10$GORZ3SknsNLN5dZ.xqx7VeXWu/nw0JZu3KorAPshE7UNPhTg9hAfe', 'admin', '74998 Zetta Burg Suite 312\nReymundoborough, MO 01136-6429', '353.437.8084', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(41, 'Magali Champlin V', 'lavina06@hotmail.com', '$2y$10$hKkK2HmDWO3suIG6RNd9Q.7KS/PMwP0sP4ig7tEx3/ZR7TXOKC0I2', 'manufacturer', '0725 Ortiz Hill Suite 410\nTrantowburgh, TX 04035-7891', '02241239180', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(42, 'Mr. Okey Prohaska III', 'bettie.sporer@gmail.com', '$2y$10$KYZxxWTbwzEukqYmmBshiO429emOrvKf9nf6iXq.qO3ffbwdaH9O6', 'seller', '39766 Purdy Street Apt. 531\nSouth Cindyhaven, KY 75184-1567', '(109)009-4076', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(43, 'Dr. Gussie Monahan', 'laverne.torp@gmail.com', '$2y$10$3TCbrogQjzp2u47SQxkpDeJRjGhBjE1WYdAvK/YDMcyvgOFn34bRe', 'seller', '855 Hansen Summit Suite 201\nPort Ottoland, PR 16208-6831', '1-544-433-9323', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(44, 'Fletcher Brekke', 'stokes.josephine@jacobs.org', '$2y$10$WWjqjzy6Qs8uvBxXz4DwvemDX63.dOiLZe/Xj6cad7obyIgmMc8Bu', 'delivery', '1525 Aleen Brooks Apt. 205\nNorth Rasheedhaven, VI 58308', '+44(8)9982799424', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(45, 'Miss Francesco Treutel', 'marquardt.zola@hotmail.com', '$2y$10$CNxT3PZSuOr1ct1rFpATyer/Oov5bb2gVERdghwkdbF9e.OaRpTHe', 'manufacturer', '908 Mosciski Stravenue\nUptonshire, AA 69774', '+86(8)1030123202', '', '', NULL, '2014-11-14 01:07:05', '2014-11-14 01:07:05'),
(46, 'Haley Wisozk', 'mohr.willy@lowe.com', '$2y$10$4siQiJH6IxRIZcyJPkXvmuO7RSTzu1bElcYS55h0ZWT/trxu5Za4S', 'delivery', '488 Heber Crescent Suite 029\nWest Norval, NJ 17413-2039', '(927)775-7494x74518', '', '', NULL, '2014-11-14 01:07:06', '2014-11-14 01:07:06'),
(47, 'Mr. Ahmad Hauck III', 'curtis.emmerich@yahoo.com', '$2y$10$VV3kunjjmTbpQNqgQAOhd.0dKB25GtaOTmLXQL1zr20rrId76OHM.', 'admin', '30237 Raleigh Parkways Suite 965\nLebsackmouth, NJ 22152', '954.427.1618', '', '', NULL, '2014-11-14 01:07:06', '2014-11-14 01:07:06'),
(48, 'Alena Mills', 'adrienne.kautzer@hotmail.com', '$2y$10$KctxItIagLMspaYoWKE8TuKKgZKK9VNZQN4aBUUGKEqs0UiS/msKe', 'seller', '534 Alisha Turnpike\nTatyanahaven, NY 48699-9388', '(466)450-6663', '', '', NULL, '2014-11-14 01:07:06', '2014-11-14 01:07:06'),
(49, 'Ms. Bettie Marvin DDS', 'kuhic.issac@gmail.com', '$2y$10$1JZHo7ZljL7/MC.8DFDkKeIi1daoLzyNNQ7rSZ2nbZgXN8jnuTAAC', 'admin', '224 Davis Isle\nNeldaton, WV 12576', '1-828-565-0845x89359', '', '', NULL, '2014-11-14 01:07:06', '2014-11-14 01:07:06'),
(50, 'Hermina O''Connell', 'tschaefer@gmail.com', '$2y$10$MeI5wZAf3rZ6JWYbSDb3HOSuuMhuDS8FbFORXAN5zXRCzi6uEBXkS', 'delivery', '344 Itzel Causeway Suite 997\nPort Edythestad, UT 85392-0817', '(893)981-0705', '', '', NULL, '2014-11-14 01:07:06', '2014-11-14 01:07:06'),
(51, 'Reuben White DVM', 'afadel@yahoo.com', '$2y$10$2fWQeyVP8dq83K/2Oj4pVeJ399A1mEZXEg8WwMeBcPUNC/PYyGWFC', 'admin', '57247 Gottlieb Views Apt. 176\nMaggiotown, NV 33856', '766-526-2742', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(52, 'Muriel Leannon', 'zlemke@yahoo.com', '$2y$10$VIAJS0CdohNSlixO58rinuxqGRbLR8Y03GA/sLcJJ9cc7fqijxmIy', 'manufacturer', '10863 McGlynn Prairie\nWest Guillermoton, AK 46111-8317', '+75(2)1851380002', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(53, 'Christy Bradtke', 'kris.camren@kuhnconnelly.biz', '$2y$10$iLKb.8QxbgeDUkh.aHRb7eu80jdNaYTFG5ScKm4j99ZjyiV1WV3ci', 'seller', '1305 Senger Grove Apt. 251\nJermeyview, UT 97758', '1-975-202-3469x46546', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(54, 'Mollie Hauck', 'odell.franecki@gmail.com', '$2y$10$LEMZC5wRv/HNi6lbjr0aze6f3byFRPEhYVxyLH2H0XdDr9CeKTywG', 'seller', '992 Americo Wall Apt. 279\nNorth Jamelfurt, AL 57797', '1-509-654-0466', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(55, 'Fae Kuphal', 'xsmith@little.com', '$2y$10$dg6FV94FPxSEUfSumXRuveVNvNCfSa28EGOChN3dxqLT.aBAK0B1K', 'admin', '4231 Monahan Plains Apt. 691\nAbelardoburgh, UT 32306-6533', '(436)671-1487x677', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(56, 'Christelle Orn', 'rippin.kaylee@brekke.info', '$2y$10$42OmZx2zs1hcs8iabzHxcuqbqlvl98T4/fF8ImREDupV9wHGeBKk6', 'admin', '97245 Pascale Lane\nMcGlynntown, TX 62595-6153', '(373)736-4749', '', '', NULL, '2014-11-14 01:07:07', '2014-11-14 01:07:07'),
(57, 'Sam Kling', 'brunolfsdottir@schaden.net', '$2y$10$Zem7Ikqzsd2Z4WuiztxfGuTktnfI9NpIxJScV7uEDLCv/SYeXNXpG', 'admin', '46509 Candice Motorway\nSpinkamouth, WY 90110', '1-904-775-2302', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(58, 'Zula Klein V', 'ernser.adela@yahoo.com', '$2y$10$LHsyfIO3lROnRbPemNtDO.SciNCrSiG4ChtC49zV.o7yaoUM2WJlq', 'seller', '3285 Kshlerin Camp\nRicardoton, NV 12323-5121', '(960)236-0061', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(59, 'Niko Leffler', 'zbergnaum@gulgowski.com', '$2y$10$TmXmBMrTo.e.3zbf.vtUaOzErUDnKZpSbaDPe2/ya2fYswEmbyhTa', 'seller', '717 Stanford Ramp Suite 329\nLitzybury, HI 82283-0671', '(990)179-1254', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(60, 'Kris Larkin', 'guiseppe35@hotmail.com', '$2y$10$fV1GR8ogX278cJ4F1UrV8eI32YMdDZVa36mtWIvMKqq.E/jnbM3ky', 'manufacturer', '826 Lamont Circle Suite 344\nLeschville, NM 73334-4574', '1-767-467-2282x487', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(61, 'Dave Treutel', 'volkman.stan@gmail.com', '$2y$10$VawI57Cz5uc5YcnaHxed/OQwJZvQ.G84BoB/B552ARzR6yssfplWe', 'manufacturer', '7614 Shanahan Ford\nBradtkehaven, WV 55581-8096', '844.645.2505x54284', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(62, 'Crawford Quigley', 'cristian48@gmail.com', '$2y$10$luk.63JQxsVmMbS1JZa9FOVpavybNJlOpQ.DeNs5VTb234TB6SJOO', 'manufacturer', '15892 Berge Trafficway Suite 727\nKraigland, OR 74241', '(067)774-3482x19988', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(63, 'Paul Zemlak', 'sauer.arden@gmail.com', '$2y$10$spNcDOoVAey8CKGX7eP5OeE.iD2AYQKJKv6ogGMPifcdWmwPmEteW', 'admin', '311 Kassulke Court Apt. 895\nLailaville, AK 53647', '958-475-7017x91456', '', '', NULL, '2014-11-14 01:07:08', '2014-11-14 01:07:08'),
(64, 'Adela Hyatt', 'hilpert.robert@considine.com', '$2y$10$ohbXJnSajsg.VNjpF2Igo.RL/ZdcrNFKVQDzf.vN0O.tJU3d4xGNG', 'delivery', '838 Armstrong Bypass\nRempelburgh, IL 91934', '432-858-9967x2312', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(65, 'Ms. Verner Yundt', 'merritt.johnston@yahoo.com', '$2y$10$lPZAxA5FClv3ucLk4wwLUOd5mwAZnsBSHPZyDy6vkkggXQg2v7r0W', 'admin', '0940 Koss Burg Apt. 129\nLeonardomouth, WA 45160', '+42(7)3725424922', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(66, 'Conor Dibbert', 'adell.kiehn@hotmail.com', '$2y$10$7qqYop0osRIWcz21IwapSeGGAYs012tjhqed1M1nXKjJNl5VrqdOu', 'delivery', '683 Leannon Row\nRomaineburgh, DC 10784', '+92(4)2306619301', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(67, 'Samanta O''Connell', 'kautzer.brannon@green.com', '$2y$10$0dMkSRo/Bw.WPkez.S7/LeJnnlnFaGYyrWNYkmWMzIdgHtKJHqIyO', 'seller', '984 Frieda Stream Suite 008\nEast Tobinville, SC 23284', '031-882-1025x251', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(68, 'Sid Wolf III', 'mlangworth@hotmail.com', '$2y$10$4m4fXpcTRYEuOSVttsueQ.6/SSIWs4nz3aVFPrDhSCBZT/fh..Yh6', 'seller', '31040 Eloise Branch Apt. 587\nVeumville, AK 45938', '(162)094-8354x505', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(69, 'Allan Green', 'myron.baumbach@rutherford.info', '$2y$10$uc202cJx2kU.ZrsKxP.uaO5HGy9WTi10hy0sR4hVnORZWX1JXP7Oe', 'manufacturer', '067 Kassulke Islands\nNew Justice, TX 06749-0849', '1-240-134-1015x156', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(70, 'Dr. Everette Zboncak IV', 'dietrich.leatha@jones.com', '$2y$10$o/jap/9RjIr8yzioGWoba.VOpos8vwqBi6FpSj7zevZy.QUcY/5fO', 'admin', '2616 Schoen Terrace\nLaneberg, SD 92857', '1-149-268-6742', '', '', NULL, '2014-11-14 01:07:09', '2014-11-14 01:07:09'),
(71, 'Raul Bogan', 'ansley22@nitzsche.com', '$2y$10$U2lYCjzDrV8SqPev4YZYjO8SH9dnXBo6nyW6K9rMD/gWPwPnJEpti', 'seller', '896 Merle Vista\nSouth Richie, AE 92456', '+12(3)1567473524', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(72, 'Colt Kiehn', 'gchristiansen@gislasonkshlerin.com', '$2y$10$EmWX4G1rcysYOpoyJljj1OUk4dRNtxNoCB07TTK7jpwfvDRB9z3Be', 'admin', '153 Dominique Corners Suite 474\nYundtstad, OK 21205-4397', '(510)127-6476x5560', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(73, 'Alexie Harris', 'katrine69@gmail.com', '$2y$10$b8GaX.VtGcL4mmvOPIgq6u5NpE2N6g2PWXahrZ4Sw2iHXWeujKg12', 'delivery', '32337 Schmitt Coves\nBruenshire, KS 88983', '(815)380-7481', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(74, 'Joesph Ratke', 'ghilll@gerholdrobel.com', '$2y$10$RDKcv/brt3d4Teb8ZJmEou.Px4fPITJadtBx55NmQBSfF/PXTuKjy', 'delivery', '53186 Welch Highway Apt. 675\nShieldsborough, DC 43682', '(708)440-9167x774', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(75, 'Dr. Zoie Kirlin DVM', 'luis30@reichelritchie.com', '$2y$10$ETHc4w6Hu/TA0PWznd4auOcF4UEUlwPLPfOh5TedvMB5yb9Vw7XxG', 'seller', '708 Welch Club Apt. 837\nEast Mafaldaton, SC 17362', '1-427-617-5995x799', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(76, 'Ena Schmitt I', 'nina40@hintz.org', '$2y$10$q20OejMZi3k/6nQekBj3teCzLdOpCVZ8w64EtPDxzdPTxzxKx0f52', 'manufacturer', '55294 Brown Ports\nAbernathymouth, LA 27124-5347', '1-308-246-2024x714', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(77, 'Will Langworth', 'abigayle.veum@hane.com', '$2y$10$ZeyBjWgG7X3gntDY.mZs4u/yFbRNPkGIW/U8lb3mYZyv6LJ8v60Nq', 'delivery', '220 Bessie Bridge\nMetztown, AK 27346-4291', '738.860.0828x208', '', '', NULL, '2014-11-14 01:07:10', '2014-11-14 01:07:10'),
(78, 'Alice Grant', 'norene54@jones.net', '$2y$10$9vUsYxm2vqil6eQbMuSCD.ew186GiRe.r3Nq5E1OnqaZ22EIHIiD.', 'manufacturer', '50777 Einar Falls\nEast Caden, NE 39637', '373.887.8956x41346', '', '', NULL, '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(79, 'Clark Wiza', 'gibson.keira@frami.net', '$2y$10$2WSDpmIMN4bMR.JdgsFC4OnN4U.vD/zkq6MPF1GG9CTKp0RVXFIEW', 'admin', '672 Stamm Ranch Suite 509\nGeraldstad, AE 10295-2956', '1-636-792-7893x35063', '', '', NULL, '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(80, 'Karina Bernhard', 'jakubowski.alejandra@hotmail.com', '$2y$10$yNhnkCDkOXMmIVk9yUuOj.GP7R9B3E2oejsihf486SB3mlh9ytNmi', 'admin', '789 Freddie Knolls Apt. 107\nPaytonport, WV 74477', '160-933-6699', '', '', NULL, '2014-11-14 01:07:11', '2014-11-14 01:07:11'),
(83, 'luis mora ', 'lemorax@gmail.com', '$2y$10$PLmSguSQ407JaRL.rn7oo.As2T8U6FceCKLwXOTz2HucQoGVMWjdy', 'delivery', 'av principal de pueblo nuevo con avenida norte', '04246552690', '15862016', '9943999484777828787', 'mkd1Ogervoc2G4M7yNphiCJLbWLPkfSBb8ytkYgo6rJQtp9LIlx2Tc65MbWC', '2014-11-14 23:27:42', '2014-11-16 01:21:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
