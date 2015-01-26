-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.38-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_wallofframe.assigned_roles
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.assigned_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.contacts: ~2 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `number`, `email`, `company`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Jayde', 'Guevarra', '', 'powerlogic1992@gmail.com', 'Iboostme', '', 'Hello, this is a test.', '2015-01-06 06:08:13', '2015-01-06 06:08:13', NULL),
	(2, 'NEMO', 'NEMO', '', 'cabanlit@gmail.com', 'CJNET Solutions', '', 'test tett tests', '2015-01-07 13:27:07', '2015-01-07 13:27:07', NULL);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `capital` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  `calling_code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.countries: ~239 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `capital`, `citizenship`, `country_code`, `currency`, `currency_code`, `currency_sub_unit`, `full_name`, `iso_3166_2`, `iso_3166_3`, `name`, `region_code`, `sub_region_code`, `eea`, `calling_code`) VALUES
	(4, 'Kabul', 'Afghan', '004', 'afghani', 'AFN', 'pul', 'Islamic Republic of Afghanistan', 'AF', 'AFG', 'Afghanistan', '142', '034', 0, '93'),
	(8, 'Tirana', 'Albanian', '008', 'lek', 'ALL', '(qindar (pl. qindarka))', 'Republic of Albania', 'AL', 'ALB', 'Albania', '150', '039', 0, '355'),
	(10, 'Antartica', 'of Antartica', '010', '', '', '', 'Antarctica', 'AQ', 'ATA', 'Antarctica', '', '', 0, '672'),
	(12, 'Algiers', 'Algerian', '012', 'Algerian dinar', 'DZD', 'centime', 'People’s Democratic Republic of Algeria', 'DZ', 'DZA', 'Algeria', '002', '015', 0, '213'),
	(16, 'Pago Pago', 'American Samoan', '016', 'US dollar', 'USD', 'cent', 'Territory of American', 'AS', 'ASM', 'American Samoa', '009', '061', 0, '1'),
	(20, 'Andorra la Vella', 'Andorran', '020', 'euro', 'EUR', 'cent', 'Principality of Andorra', 'AD', 'AND', 'Andorra', '150', '039', 0, '376'),
	(24, 'Luanda', 'Angolan', '024', 'kwanza', 'AOA', 'cêntimo', 'Republic of Angola', 'AO', 'AGO', 'Angola', '002', '017', 0, '244'),
	(28, 'St John’s', 'of Antigua and Barbuda', '028', 'East Caribbean dollar', 'XCD', 'cent', 'Antigua and Barbuda', 'AG', 'ATG', 'Antigua and Barbuda', '019', '029', 0, '1'),
	(31, 'Baku', 'Azerbaijani', '031', 'Azerbaijani manat', 'AZN', 'kepik (inv.)', 'Republic of Azerbaijan', 'AZ', 'AZE', 'Azerbaijan', '142', '145', 0, '994'),
	(32, 'Buenos Aires', 'Argentinian', '032', 'Argentine peso', 'ARS', 'centavo', 'Argentine Republic', 'AR', 'ARG', 'Argentina', '019', '005', 0, '54'),
	(36, 'Canberra', 'Australian', '036', 'Australian dollar', 'AUD', 'cent', 'Commonwealth of Australia', 'AU', 'AUS', 'Australia', '009', '053', 0, '61'),
	(40, 'Vienna', 'Austrian', '040', 'euro', 'EUR', 'cent', 'Republic of Austria', 'AT', 'AUT', 'Austria', '150', '155', 1, '43'),
	(44, 'Nassau', 'Bahamian', '044', 'Bahamian dollar', 'BSD', 'cent', 'Commonwealth of the Bahamas', 'BS', 'BHS', 'Bahamas', '019', '029', 0, '1'),
	(48, 'Manama', 'Bahraini', '048', 'Bahraini dinar', 'BHD', 'fils (inv.)', 'Kingdom of Bahrain', 'BH', 'BHR', 'Bahrain', '142', '145', 0, '973'),
	(50, 'Dhaka', 'Bangladeshi', '050', 'taka (inv.)', 'BDT', 'poisha (inv.)', 'People’s Republic of Bangladesh', 'BD', 'BGD', 'Bangladesh', '142', '034', 0, '880'),
	(51, 'Yerevan', 'Armenian', '051', 'dram (inv.)', 'AMD', 'luma', 'Republic of Armenia', 'AM', 'ARM', 'Armenia', '142', '145', 0, '374'),
	(52, 'Bridgetown', 'Barbadian', '052', 'Barbados dollar', 'BBD', 'cent', 'Barbados', 'BB', 'BRB', 'Barbados', '019', '029', 0, '1'),
	(56, 'Brussels', 'Belgian', '056', 'euro', 'EUR', 'cent', 'Kingdom of Belgium', 'BE', 'BEL', 'Belgium', '150', '155', 1, '32'),
	(60, 'Hamilton', 'Bermudian', '060', 'Bermuda dollar', 'BMD', 'cent', 'Bermuda', 'BM', 'BMU', 'Bermuda', '019', '021', 0, '1'),
	(64, 'Thimphu', 'Bhutanese', '064', 'ngultrum (inv.)', 'BTN', 'chhetrum (inv.)', 'Kingdom of Bhutan', 'BT', 'BTN', 'Bhutan', '142', '034', 0, '975'),
	(68, 'Sucre (BO1)', 'Bolivian', '068', 'boliviano', 'BOB', 'centavo', 'Plurinational State of Bolivia', 'BO', 'BOL', 'Bolivia, Plurinational State of', '019', '005', 0, '591'),
	(70, 'Sarajevo', 'of Bosnia and Herzegovina', '070', 'convertible mark', 'BAM', 'fening', 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina', '150', '039', 0, '387'),
	(72, 'Gaborone', 'Botswanan', '072', 'pula (inv.)', 'BWP', 'thebe (inv.)', 'Republic of Botswana', 'BW', 'BWA', 'Botswana', '002', '018', 0, '267'),
	(74, 'Bouvet island', 'of Bouvet island', '074', '', '', '', 'Bouvet Island', 'BV', 'BVT', 'Bouvet Island', '', '', 0, '47'),
	(76, 'Brasilia', 'Brazilian', '076', 'real (pl. reais)', 'BRL', 'centavo', 'Federative Republic of Brazil', 'BR', 'BRA', 'Brazil', '019', '005', 0, '55'),
	(84, 'Belmopan', 'Belizean', '084', 'Belize dollar', 'BZD', 'cent', 'Belize', 'BZ', 'BLZ', 'Belize', '019', '013', 0, '501'),
	(86, 'Diego Garcia', 'Changosian', '086', 'US dollar', 'USD', 'cent', 'British Indian Ocean Territory', 'IO', 'IOT', 'British Indian Ocean Territory', '', '', 0, '246'),
	(90, 'Honiara', 'Solomon Islander', '090', 'Solomon Islands dollar', 'SBD', 'cent', 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands', '009', '054', 0, '677'),
	(92, 'Road Town', 'British Virgin Islander;', '092', 'US dollar', 'USD', 'cent', 'British Virgin Islands', 'VG', 'VGB', 'Virgin Islands, British', '019', '029', 0, '1'),
	(96, 'Bandar Seri Begawan', 'Bruneian', '096', 'Brunei dollar', 'BND', 'sen (inv.)', 'Brunei Darussalam', 'BN', 'BRN', 'Brunei Darussalam', '142', '035', 0, '673'),
	(100, 'Sofia', 'Bulgarian', '100', 'lev (pl. leva)', 'BGN', 'stotinka', 'Republic of Bulgaria', 'BG', 'BGR', 'Bulgaria', '150', '151', 1, '359'),
	(104, 'Yangon', 'Burmese', '104', 'kyat', 'MMK', 'pya', 'Union of Myanmar/', 'MM', 'MMR', 'Myanmar', '142', '035', 0, '95'),
	(108, 'Bujumbura', 'Burundian', '108', 'Burundi franc', 'BIF', 'centime', 'Republic of Burundi', 'BI', 'BDI', 'Burundi', '002', '014', 0, '257'),
	(112, 'Minsk', 'Belarusian', '112', 'Belarusian rouble', 'BYR', 'kopek', 'Republic of Belarus', 'BY', 'BLR', 'Belarus', '150', '151', 0, '375'),
	(116, 'Phnom Penh', 'Cambodian', '116', 'riel', 'KHR', 'sen (inv.)', 'Kingdom of Cambodia', 'KH', 'KHM', 'Cambodia', '142', '035', 0, '855'),
	(120, 'Yaoundé', 'Cameroonian', '120', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Cameroon', 'CM', 'CMR', 'Cameroon', '002', '017', 0, '237'),
	(124, 'Ottawa', 'Canadian', '124', 'Canadian dollar', 'CAD', 'cent', 'Canada', 'CA', 'CAN', 'Canada', '019', '021', 0, '1'),
	(132, 'Praia', 'Cape Verdean', '132', 'Cape Verde escudo', 'CVE', 'centavo', 'Republic of Cape Verde', 'CV', 'CPV', 'Cape Verde', '002', '011', 0, '238'),
	(136, 'George Town', 'Caymanian', '136', 'Cayman Islands dollar', 'KYD', 'cent', 'Cayman Islands', 'KY', 'CYM', 'Cayman Islands', '019', '029', 0, '1'),
	(140, 'Bangui', 'Central African', '140', 'CFA franc (BEAC)', 'XAF', 'centime', 'Central African Republic', 'CF', 'CAF', 'Central African Republic', '002', '017', 0, '236'),
	(144, 'Colombo', 'Sri Lankan', '144', 'Sri Lankan rupee', 'LKR', 'cent', 'Democratic Socialist Republic of Sri Lanka', 'LK', 'LKA', 'Sri Lanka', '142', '034', 0, '94'),
	(148, 'N’Djamena', 'Chadian', '148', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Chad', 'TD', 'TCD', 'Chad', '002', '017', 0, '235'),
	(152, 'Santiago', 'Chilean', '152', 'Chilean peso', 'CLP', 'centavo', 'Republic of Chile', 'CL', 'CHL', 'Chile', '019', '005', 0, '56'),
	(156, 'Beijing', 'Chinese', '156', 'renminbi-yuan (inv.)', 'CNY', 'jiao (10)', 'People’s Republic of China', 'CN', 'CHN', 'China', '142', '030', 0, '86'),
	(158, 'Taipei', 'Taiwanese', '158', 'new Taiwan dollar', 'TWD', 'fen (inv.)', 'Republic of China, Taiwan (TW1)', 'TW', 'TWN', 'Taiwan, Province of China', '142', '030', 0, '886'),
	(162, 'Flying Fish Cove', 'Christmas Islander', '162', 'Australian dollar', 'AUD', 'cent', 'Christmas Island Territory', 'CX', 'CXR', 'Christmas Island', '', '', 0, '61'),
	(166, 'Bantam', 'Cocos Islander', '166', 'Australian dollar', 'AUD', 'cent', 'Territory of Cocos (Keeling) Islands', 'CC', 'CCK', 'Cocos (Keeling) Islands', '', '', 0, '61'),
	(170, 'Santa Fe de Bogotá', 'Colombian', '170', 'Colombian peso', 'COP', 'centavo', 'Republic of Colombia', 'CO', 'COL', 'Colombia', '019', '005', 0, '57'),
	(174, 'Moroni', 'Comorian', '174', 'Comorian franc', 'KMF', '', 'Union of the Comoros', 'KM', 'COM', 'Comoros', '002', '014', 0, '269'),
	(175, 'Mamoudzou', 'Mahorais', '175', 'euro', 'EUR', 'cent', 'Departmental Collectivity of Mayotte', 'YT', 'MYT', 'Mayotte', '002', '014', 0, '262'),
	(178, 'Brazzaville', 'Congolese', '178', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of the Congo', 'CG', 'COG', 'Congo', '002', '017', 0, '242'),
	(180, 'Kinshasa', 'Congolese', '180', 'Congolese franc', 'CDF', 'centime', 'Democratic Republic of the Congo', 'CD', 'COD', 'Congo, the Democratic Republic of the', '002', '017', 0, '243'),
	(184, 'Avarua', 'Cook Islander', '184', 'New Zealand dollar', 'NZD', 'cent', 'Cook Islands', 'CK', 'COK', 'Cook Islands', '009', '061', 0, '682'),
	(188, 'San José', 'Costa Rican', '188', 'Costa Rican colón (pl. colones)', 'CRC', 'céntimo', 'Republic of Costa Rica', 'CR', 'CRI', 'Costa Rica', '019', '013', 0, '506'),
	(191, 'Zagreb', 'Croatian', '191', 'kuna (inv.)', 'HRK', 'lipa (inv.)', 'Republic of Croatia', 'HR', 'HRV', 'Croatia', '150', '039', 1, '385'),
	(192, 'Havana', 'Cuban', '192', 'Cuban peso', 'CUP', 'centavo', 'Republic of Cuba', 'CU', 'CUB', 'Cuba', '019', '029', 0, '53'),
	(196, 'Nicosia', 'Cypriot', '196', 'euro', 'EUR', 'cent', 'Republic of Cyprus', 'CY', 'CYP', 'Cyprus', '142', '145', 1, '357'),
	(203, 'Prague', 'Czech', '203', 'Czech koruna (pl. koruny)', 'CZK', 'halér', 'Czech Republic', 'CZ', 'CZE', 'Czech Republic', '150', '151', 1, '420'),
	(204, 'Porto Novo (BJ1)', 'Beninese', '204', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Benin', 'BJ', 'BEN', 'Benin', '002', '011', 0, '229'),
	(208, 'Copenhagen', 'Danish', '208', 'Danish krone', 'DKK', 'øre (inv.)', 'Kingdom of Denmark', 'DK', 'DNK', 'Denmark', '150', '154', 1, '45'),
	(212, 'Roseau', 'Dominican', '212', 'East Caribbean dollar', 'XCD', 'cent', 'Commonwealth of Dominica', 'DM', 'DMA', 'Dominica', '019', '029', 0, '1'),
	(214, 'Santo Domingo', 'Dominican', '214', 'Dominican peso', 'DOP', 'centavo', 'Dominican Republic', 'DO', 'DOM', 'Dominican Republic', '019', '029', 0, '1'),
	(218, 'Quito', 'Ecuadorian', '218', 'US dollar', 'USD', 'cent', 'Republic of Ecuador', 'EC', 'ECU', 'Ecuador', '019', '005', 0, '593'),
	(222, 'San Salvador', 'Salvadoran', '222', 'Salvadorian colón (pl. colones)', 'SVC', 'centavo', 'Republic of El Salvador', 'SV', 'SLV', 'El Salvador', '019', '013', 0, '503'),
	(226, 'Malabo', 'Equatorial Guinean', '226', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Equatorial Guinea', 'GQ', 'GNQ', 'Equatorial Guinea', '002', '017', 0, '240'),
	(231, 'Addis Ababa', 'Ethiopian', '231', 'birr (inv.)', 'ETB', 'cent', 'Federal Democratic Republic of Ethiopia', 'ET', 'ETH', 'Ethiopia', '002', '014', 0, '251'),
	(232, 'Asmara', 'Eritrean', '232', 'nakfa', 'ERN', 'cent', 'State of Eritrea', 'ER', 'ERI', 'Eritrea', '002', '014', 0, '291'),
	(233, 'Tallinn', 'Estonian', '233', 'euro', 'EUR', 'cent', 'Republic of Estonia', 'EE', 'EST', 'Estonia', '150', '154', 1, '372'),
	(234, 'Tórshavn', 'Faeroese', '234', 'Danish krone', 'DKK', 'øre (inv.)', 'Faeroe Islands', 'FO', 'FRO', 'Faroe Islands', '150', '154', 0, '298'),
	(238, 'Stanley', 'Falkland Islander', '238', 'Falkland Islands pound', 'FKP', 'new penny', 'Falkland Islands', 'FK', 'FLK', 'Falkland Islands (Malvinas)', '019', '005', 0, '500'),
	(239, 'King Edward Point (Grytviken)', 'of South Georgia and the South Sandwich Islands', '239', '', '', '', 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', '', 0, '44'),
	(242, 'Suva', 'Fijian', '242', 'Fiji dollar', 'FJD', 'cent', 'Republic of Fiji', 'FJ', 'FJI', 'Fiji', '009', '054', 0, '679'),
	(246, 'Helsinki', 'Finnish', '246', 'euro', 'EUR', 'cent', 'Republic of Finland', 'FI', 'FIN', 'Finland', '150', '154', 1, '358'),
	(248, 'Mariehamn', 'Åland Islander', '248', 'euro', 'EUR', 'cent', 'Åland Islands', 'AX', 'ALA', 'Åland Islands', '150', '154', 0, '358'),
	(250, 'Paris', 'French', '250', 'euro', 'EUR', 'cent', 'French Republic', 'FR', 'FRA', 'France', '150', '155', 1, '33'),
	(254, 'Cayenne', 'Guianese', '254', 'euro', 'EUR', 'cent', 'French Guiana', 'GF', 'GUF', 'French Guiana', '019', '005', 0, '594'),
	(258, 'Papeete', 'Polynesian', '258', 'CFP franc', 'XPF', 'centime', 'French Polynesia', 'PF', 'PYF', 'French Polynesia', '009', '061', 0, '689'),
	(260, 'Port-aux-Francais', 'of French Southern and Antarctic Lands', '260', 'euro', 'EUR', 'cent', 'French Southern and Antarctic Lands', 'TF', 'ATF', 'French Southern Territories', '', '', 0, '33'),
	(262, 'Djibouti', 'Djiboutian', '262', 'Djibouti franc', 'DJF', '', 'Republic of Djibouti', 'DJ', 'DJI', 'Djibouti', '002', '014', 0, '253'),
	(266, 'Libreville', 'Gabonese', '266', 'CFA franc (BEAC)', 'XAF', 'centime', 'Gabonese Republic', 'GA', 'GAB', 'Gabon', '002', '017', 0, '241'),
	(268, 'Tbilisi', 'Georgian', '268', 'lari', 'GEL', 'tetri (inv.)', 'Georgia', 'GE', 'GEO', 'Georgia', '142', '145', 0, '995'),
	(270, 'Banjul', 'Gambian', '270', 'dalasi (inv.)', 'GMD', 'butut', 'Republic of the Gambia', 'GM', 'GMB', 'Gambia', '002', '011', 0, '220'),
	(275, NULL, 'Palisitnean', '275', NULL, NULL, NULL, NULL, 'PS', 'PSE', 'Palestinian Territory, Occupied', '142', '145', 0, '970'),
	(276, 'Berlin', 'German', '276', 'euro', 'EUR', 'cent', 'Federal Republic of Germany', 'DE', 'DEU', 'Germany', '150', '155', 1, '49'),
	(288, 'Accra', 'Ghanaian', '288', 'Ghana cedi', 'GHS', 'pesewa', 'Republic of Ghana', 'GH', 'GHA', 'Ghana', '002', '011', 0, '233'),
	(292, 'Gibraltar', 'Gibraltarian', '292', 'Gibraltar pound', 'GIP', 'penny', 'Gibraltar', 'GI', 'GIB', 'Gibraltar', '150', '039', 0, '350'),
	(296, 'Tarawa', 'Kiribatian', '296', 'Australian dollar', 'AUD', 'cent', 'Republic of Kiribati', 'KI', 'KIR', 'Kiribati', '009', '057', 0, '686'),
	(300, 'Athens', 'Greek', '300', 'euro', 'EUR', 'cent', 'Hellenic Republic', 'GR', 'GRC', 'Greece', '150', '039', 1, '30'),
	(304, 'Nuuk', 'Greenlander', '304', 'Danish krone', 'DKK', 'øre (inv.)', 'Greenland', 'GL', 'GRL', 'Greenland', '019', '021', 0, '299'),
	(308, 'St George’s', 'Grenadian', '308', 'East Caribbean dollar', 'XCD', 'cent', 'Grenada', 'GD', 'GRD', 'Grenada', '019', '029', 0, '1'),
	(312, 'Basse Terre', 'Guadeloupean', '312', 'euro', 'EUR ', 'cent', 'Guadeloupe', 'GP', 'GLP', 'Guadeloupe', '019', '029', 0, '590'),
	(316, 'Agaña (Hagåtña)', 'Guamanian', '316', 'US dollar', 'USD', 'cent', 'Territory of Guam', 'GU', 'GUM', 'Guam', '009', '057', 0, '1'),
	(320, 'Guatemala City', 'Guatemalan', '320', 'quetzal (pl. quetzales)', 'GTQ', 'centavo', 'Republic of Guatemala', 'GT', 'GTM', 'Guatemala', '019', '013', 0, '502'),
	(324, 'Conakry', 'Guinean', '324', 'Guinean franc', 'GNF', '', 'Republic of Guinea', 'GN', 'GIN', 'Guinea', '002', '011', 0, '224'),
	(328, 'Georgetown', 'Guyanese', '328', 'Guyana dollar', 'GYD', 'cent', 'Cooperative Republic of Guyana', 'GY', 'GUY', 'Guyana', '019', '005', 0, '592'),
	(332, 'Port-au-Prince', 'Haitian', '332', 'gourde', 'HTG', 'centime', 'Republic of Haiti', 'HT', 'HTI', 'Haiti', '019', '029', 0, '509'),
	(334, 'Territory of Heard Island and McDonald Islands', 'of Territory of Heard Island and McDonald Islands', '334', '', '', '', 'Territory of Heard Island and McDonald Islands', 'HM', 'HMD', 'Heard Island and McDonald Islands', '', '', 0, '61'),
	(336, 'Vatican City', 'of the Holy See/of the Vatican', '336', 'euro', 'EUR', 'cent', 'the Holy See/ Vatican City State', 'VA', 'VAT', 'Holy See (Vatican City State)', '150', '039', 0, '39'),
	(340, 'Tegucigalpa', 'Honduran', '340', 'lempira', 'HNL', 'centavo', 'Republic of Honduras', 'HN', 'HND', 'Honduras', '019', '013', 0, '504'),
	(344, '(HK3)', 'Hong Kong Chinese', '344', 'Hong Kong dollar', 'HKD', 'cent', 'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)', 'HK', 'HKG', 'Hong Kong', '142', '030', 0, '852'),
	(348, 'Budapest', 'Hungarian', '348', 'forint (inv.)', 'HUF', '(fillér (inv.))', 'Republic of Hungary', 'HU', 'HUN', 'Hungary', '150', '151', 1, '36'),
	(352, 'Reykjavik', 'Icelander', '352', 'króna (pl. krónur)', 'ISK', '', 'Republic of Iceland', 'IS', 'ISL', 'Iceland', '150', '154', 1, '354'),
	(356, 'New Delhi', 'Indian', '356', 'Indian rupee', 'INR', 'paisa', 'Republic of India', 'IN', 'IND', 'India', '142', '034', 0, '91'),
	(360, 'Jakarta', 'Indonesian', '360', 'Indonesian rupiah (inv.)', 'IDR', 'sen (inv.)', 'Republic of Indonesia', 'ID', 'IDN', 'Indonesia', '142', '035', 0, '62'),
	(364, 'Tehran', 'Iranian', '364', 'Iranian rial', 'IRR', '(dinar) (IR1)', 'Islamic Republic of Iran', 'IR', 'IRN', 'Iran, Islamic Republic of', '142', '034', 0, '98'),
	(368, 'Baghdad', 'Iraqi', '368', 'Iraqi dinar', 'IQD', 'fils (inv.)', 'Republic of Iraq', 'IQ', 'IRQ', 'Iraq', '142', '145', 0, '964'),
	(372, 'Dublin', 'Irish', '372', 'euro', 'EUR', 'cent', 'Ireland (IE1)', 'IE', 'IRL', 'Ireland', '150', '154', 1, '353'),
	(376, '(IL1)', 'Israeli', '376', 'shekel', 'ILS', 'agora', 'State of Israel', 'IL', 'ISR', 'Israel', '142', '145', 0, '972'),
	(380, 'Rome', 'Italian', '380', 'euro', 'EUR', 'cent', 'Italian Republic', 'IT', 'ITA', 'Italy', '150', '039', 1, '39'),
	(384, 'Yamoussoukro (CI1)', 'Ivorian', '384', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Côte d’Ivoire', 'CI', 'CIV', 'Côte d\'Ivoire', '002', '011', 0, '225'),
	(388, 'Kingston', 'Jamaican', '388', 'Jamaica dollar', 'JMD', 'cent', 'Jamaica', 'JM', 'JAM', 'Jamaica', '019', '029', 0, '1'),
	(392, 'Tokyo', 'Japanese', '392', 'yen (inv.)', 'JPY', '(sen (inv.)) (JP1)', 'Japan', 'JP', 'JPN', 'Japan', '142', '030', 0, '81'),
	(398, 'Astana', 'Kazakh', '398', 'tenge (inv.)', 'KZT', 'tiyn', 'Republic of Kazakhstan', 'KZ', 'KAZ', 'Kazakhstan', '142', '143', 0, '7'),
	(400, 'Amman', 'Jordanian', '400', 'Jordanian dinar', 'JOD', '100 qirsh', 'Hashemite Kingdom of Jordan', 'JO', 'JOR', 'Jordan', '142', '145', 0, '962'),
	(404, 'Nairobi', 'Kenyan', '404', 'Kenyan shilling', 'KES', 'cent', 'Republic of Kenya', 'KE', 'KEN', 'Kenya', '002', '014', 0, '254'),
	(408, 'Pyongyang', 'North Korean', '408', 'North Korean won (inv.)', 'KPW', 'chun (inv.)', 'Democratic People’s Republic of Korea', 'KP', 'PRK', 'Korea, Democratic People\'s Republic of', '142', '030', 0, '850'),
	(410, 'Seoul', 'South Korean', '410', 'South Korean won (inv.)', 'KRW', '(chun (inv.))', 'Republic of Korea', 'KR', 'KOR', 'Korea, Republic of', '142', '030', 0, '82'),
	(414, 'Kuwait City', 'Kuwaiti', '414', 'Kuwaiti dinar', 'KWD', 'fils (inv.)', 'State of Kuwait', 'KW', 'KWT', 'Kuwait', '142', '145', 0, '965'),
	(417, 'Bishkek', 'Kyrgyz', '417', 'som', 'KGS', 'tyiyn', 'Kyrgyz Republic', 'KG', 'KGZ', 'Kyrgyzstan', '142', '143', 0, '996'),
	(418, 'Vientiane', 'Lao', '418', 'kip (inv.)', 'LAK', '(at (inv.))', 'Lao People’s Democratic Republic', 'LA', 'LAO', 'Lao People\'s Democratic Republic', '142', '035', 0, '856'),
	(422, 'Beirut', 'Lebanese', '422', 'Lebanese pound', 'LBP', '(piastre)', 'Lebanese Republic', 'LB', 'LBN', 'Lebanon', '142', '145', 0, '961'),
	(426, 'Maseru', 'Basotho', '426', 'loti (pl. maloti)', 'LSL', 'sente', 'Kingdom of Lesotho', 'LS', 'LSO', 'Lesotho', '002', '018', 0, '266'),
	(428, 'Riga', 'Latvian', '428', 'lats (pl. lati)', 'LVL', 'santims', 'Republic of Latvia', 'LV', 'LVA', 'Latvia', '150', '154', 1, '371'),
	(430, 'Monrovia', 'Liberian', '430', 'Liberian dollar', 'LRD', 'cent', 'Republic of Liberia', 'LR', 'LBR', 'Liberia', '002', '011', 0, '231'),
	(434, 'Tripoli', 'Libyan', '434', 'Libyan dinar', 'LYD', 'dirham', 'Socialist People’s Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libya', '002', '015', 0, '218'),
	(438, 'Vaduz', 'Liechtensteiner', '438', 'Swiss franc', 'CHF', 'centime', 'Principality of Liechtenstein', 'LI', 'LIE', 'Liechtenstein', '150', '155', 1, '423'),
	(440, 'Vilnius', 'Lithuanian', '440', 'litas (pl. litai)', 'LTL', 'centas', 'Republic of Lithuania', 'LT', 'LTU', 'Lithuania', '150', '154', 1, '370'),
	(442, 'Luxembourg', 'Luxembourger', '442', 'euro', 'EUR', 'cent', 'Grand Duchy of Luxembourg', 'LU', 'LUX', 'Luxembourg', '150', '155', 1, '352'),
	(446, 'Macao (MO3)', 'Macanese', '446', 'pataca', 'MOP', 'avo', 'Macao Special Administrative Region of the People’s Republic of China (MO2)', 'MO', 'MAC', 'Macao', '142', '030', 0, '853'),
	(450, 'Antananarivo', 'Malagasy', '450', 'ariary', 'MGA', 'iraimbilanja (inv.)', 'Republic of Madagascar', 'MG', 'MDG', 'Madagascar', '002', '014', 0, '261'),
	(454, 'Lilongwe', 'Malawian', '454', 'Malawian kwacha (inv.)', 'MWK', 'tambala (inv.)', 'Republic of Malawi', 'MW', 'MWI', 'Malawi', '002', '014', 0, '265'),
	(458, 'Kuala Lumpur (MY1)', 'Malaysian', '458', 'ringgit (inv.)', 'MYR', 'sen (inv.)', 'Malaysia', 'MY', 'MYS', 'Malaysia', '142', '035', 0, '60'),
	(462, 'Malé', 'Maldivian', '462', 'rufiyaa', 'MVR', 'laari (inv.)', 'Republic of Maldives', 'MV', 'MDV', 'Maldives', '142', '034', 0, '960'),
	(466, 'Bamako', 'Malian', '466', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Mali', 'ML', 'MLI', 'Mali', '002', '011', 0, '223'),
	(470, 'Valletta', 'Maltese', '470', 'euro', 'EUR', 'cent', 'Republic of Malta', 'MT', 'MLT', 'Malta', '150', '039', 1, '356'),
	(474, 'Fort-de-France', 'Martinican', '474', 'euro', 'EUR', 'cent', 'Martinique', 'MQ', 'MTQ', 'Martinique', '019', '029', 0, '596'),
	(478, 'Nouakchott', 'Mauritanian', '478', 'ouguiya', 'MRO', 'khoum', 'Islamic Republic of Mauritania', 'MR', 'MRT', 'Mauritania', '002', '011', 0, '222'),
	(480, 'Port Louis', 'Mauritian', '480', 'Mauritian rupee', 'MUR', 'cent', 'Republic of Mauritius', 'MU', 'MUS', 'Mauritius', '002', '014', 0, '230'),
	(484, 'Mexico City', 'Mexican', '484', 'Mexican peso', 'MXN', 'centavo', 'United Mexican States', 'MX', 'MEX', 'Mexico', '019', '013', 0, '52'),
	(492, 'Monaco', 'Monegasque', '492', 'euro', 'EUR', 'cent', 'Principality of Monaco', 'MC', 'MCO', 'Monaco', '150', '155', 0, '377'),
	(496, 'Ulan Bator', 'Mongolian', '496', 'tugrik', 'MNT', 'möngö (inv.)', 'Mongolia', 'MN', 'MNG', 'Mongolia', '142', '030', 0, '976'),
	(498, 'Chisinau', 'Moldovan', '498', 'Moldovan leu (pl. lei)', 'MDL', 'ban', 'Republic of Moldova', 'MD', 'MDA', 'Moldova, Republic of', '150', '151', 0, '373'),
	(499, 'Podgorica', 'Montenegrin', '499', 'euro', 'EUR', 'cent', 'Montenegro', 'ME', 'MNE', 'Montenegro', '150', '039', 0, '382'),
	(500, 'Plymouth (MS2)', 'Montserratian', '500', 'East Caribbean dollar', 'XCD', 'cent', 'Montserrat', 'MS', 'MSR', 'Montserrat', '019', '029', 0, '1'),
	(504, 'Rabat', 'Moroccan', '504', 'Moroccan dirham', 'MAD', 'centime', 'Kingdom of Morocco', 'MA', 'MAR', 'Morocco', '002', '015', 0, '212'),
	(508, 'Maputo', 'Mozambican', '508', 'metical', 'MZN', 'centavo', 'Republic of Mozambique', 'MZ', 'MOZ', 'Mozambique', '002', '014', 0, '258'),
	(512, 'Muscat', 'Omani', '512', 'Omani rial', 'OMR', 'baiza', 'Sultanate of Oman', 'OM', 'OMN', 'Oman', '142', '145', 0, '968'),
	(516, 'Windhoek', 'Namibian', '516', 'Namibian dollar', 'NAD', 'cent', 'Republic of Namibia', 'NA', 'NAM', 'Namibia', '002', '018', 0, '264'),
	(520, 'Yaren', 'Nauruan', '520', 'Australian dollar', 'AUD', 'cent', 'Republic of Nauru', 'NR', 'NRU', 'Nauru', '009', '057', 0, '674'),
	(524, 'Kathmandu', 'Nepalese', '524', 'Nepalese rupee', 'NPR', 'paisa (inv.)', 'Nepal', 'NP', 'NPL', 'Nepal', '142', '034', 0, '977'),
	(528, 'Amsterdam (NL2)', 'Dutch', '528', 'euro', 'EUR', 'cent', 'Kingdom of the Netherlands', 'NL', 'NLD', 'Netherlands', '150', '155', 1, '31'),
	(531, 'Willemstad', 'Curaçaoan', '531', 'Netherlands Antillean guilder (CW1)', 'ANG', 'cent', 'Curaçao', 'CW', 'CUW', 'Curaçao', '019', '029', 0, '599'),
	(533, 'Oranjestad', 'Aruban', '533', 'Aruban guilder', 'AWG', 'cent', 'Aruba', 'AW', 'ABW', 'Aruba', '019', '029', 0, '297'),
	(534, 'Philipsburg', 'Sint Maartener', '534', 'Netherlands Antillean guilder (SX1)', 'ANG', 'cent', 'Sint Maarten', 'SX', 'SXM', 'Sint Maarten (Dutch part)', '019', '029', 0, '721'),
	(535, NULL, 'of Bonaire, Sint Eustatius and Saba', '535', 'US dollar', 'USD', 'cent', NULL, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', '019', '029', 0, '599'),
	(540, 'Nouméa', 'New Caledonian', '540', 'CFP franc', 'XPF', 'centime', 'New Caledonia', 'NC', 'NCL', 'New Caledonia', '009', '054', 0, '687'),
	(548, 'Port Vila', 'Vanuatuan', '548', 'vatu (inv.)', 'VUV', '', 'Republic of Vanuatu', 'VU', 'VUT', 'Vanuatu', '009', '054', 0, '678'),
	(554, 'Wellington', 'New Zealander', '554', 'New Zealand dollar', 'NZD', 'cent', 'New Zealand', 'NZ', 'NZL', 'New Zealand', '009', '053', 0, '64'),
	(558, 'Managua', 'Nicaraguan', '558', 'córdoba oro', 'NIO', 'centavo', 'Republic of Nicaragua', 'NI', 'NIC', 'Nicaragua', '019', '013', 0, '505'),
	(562, 'Niamey', 'Nigerien', '562', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Niger', 'NE', 'NER', 'Niger', '002', '011', 0, '227'),
	(566, 'Abuja', 'Nigerian', '566', 'naira (inv.)', 'NGN', 'kobo (inv.)', 'Federal Republic of Nigeria', 'NG', 'NGA', 'Nigeria', '002', '011', 0, '234'),
	(570, 'Alofi', 'Niuean', '570', 'New Zealand dollar', 'NZD', 'cent', 'Niue', 'NU', 'NIU', 'Niue', '009', '061', 0, '683'),
	(574, 'Kingston', 'Norfolk Islander', '574', 'Australian dollar', 'AUD', 'cent', 'Territory of Norfolk Island', 'NF', 'NFK', 'Norfolk Island', '009', '053', 0, '672'),
	(578, 'Oslo', 'Norwegian', '578', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Kingdom of Norway', 'NO', 'NOR', 'Norway', '150', '154', 1, '47'),
	(580, 'Saipan', 'Northern Mariana Islander', '580', 'US dollar', 'USD', 'cent', 'Commonwealth of the Northern Mariana Islands', 'MP', 'MNP', 'Northern Mariana Islands', '009', '057', 0, '1'),
	(581, 'United States Minor Outlying Islands', 'of United States Minor Outlying Islands', '581', 'US dollar', 'USD', 'cent', 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Minor Outlying Islands', '', '', 0, '1'),
	(583, 'Palikir', 'Micronesian', '583', 'US dollar', 'USD', 'cent', 'Federated States of Micronesia', 'FM', 'FSM', 'Micronesia, Federated States of', '009', '057', 0, '691'),
	(584, 'Majuro', 'Marshallese', '584', 'US dollar', 'USD', 'cent', 'Republic of the Marshall Islands', 'MH', 'MHL', 'Marshall Islands', '009', '057', 0, '692'),
	(585, 'Melekeok', 'Palauan', '585', 'US dollar', 'USD', 'cent', 'Republic of Palau', 'PW', 'PLW', 'Palau', '009', '057', 0, '680'),
	(586, 'Islamabad', 'Pakistani', '586', 'Pakistani rupee', 'PKR', 'paisa', 'Islamic Republic of Pakistan', 'PK', 'PAK', 'Pakistan', '142', '034', 0, '92'),
	(591, 'Panama City', 'Panamanian', '591', 'balboa', 'PAB', 'centésimo', 'Republic of Panama', 'PA', 'PAN', 'Panama', '019', '013', 0, '507'),
	(598, 'Port Moresby', 'Papua New Guinean', '598', 'kina (inv.)', 'PGK', 'toea (inv.)', 'Independent State of Papua New Guinea', 'PG', 'PNG', 'Papua New Guinea', '009', '054', 0, '675'),
	(600, 'Asunción', 'Paraguayan', '600', 'guaraní', 'PYG', 'céntimo', 'Republic of Paraguay', 'PY', 'PRY', 'Paraguay', '019', '005', 0, '595'),
	(604, 'Lima', 'Peruvian', '604', 'new sol', 'PEN', 'céntimo', 'Republic of Peru', 'PE', 'PER', 'Peru', '019', '005', 0, '51'),
	(608, 'Manila', 'Filipino', '608', 'Philippine peso', 'PHP', 'centavo', 'Republic of the Philippines', 'PH', 'PHL', 'Philippines', '142', '035', 0, '63'),
	(612, 'Adamstown', 'Pitcairner', '612', 'New Zealand dollar', 'NZD', 'cent', 'Pitcairn Islands', 'PN', 'PCN', 'Pitcairn', '009', '061', 0, '649'),
	(616, 'Warsaw', 'Polish', '616', 'zloty', 'PLN', 'grosz (pl. groszy)', 'Republic of Poland', 'PL', 'POL', 'Poland', '150', '151', 1, '48'),
	(620, 'Lisbon', 'Portuguese', '620', 'euro', 'EUR', 'cent', 'Portuguese Republic', 'PT', 'PRT', 'Portugal', '150', '039', 1, '351'),
	(624, 'Bissau', 'Guinea-Bissau national', '624', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Guinea-Bissau', 'GW', 'GNB', 'Guinea-Bissau', '002', '011', 0, '245'),
	(626, 'Dili', 'East Timorese', '626', 'US dollar', 'USD', 'cent', 'Democratic Republic of East Timor', 'TL', 'TLS', 'Timor-Leste', '142', '035', 0, '670'),
	(630, 'San Juan', 'Puerto Rican', '630', 'US dollar', 'USD', 'cent', 'Commonwealth of Puerto Rico', 'PR', 'PRI', 'Puerto Rico', '019', '029', 0, '1'),
	(634, 'Doha', 'Qatari', '634', 'Qatari riyal', 'QAR', 'dirham', 'State of Qatar', 'QA', 'QAT', 'Qatar', '142', '145', 0, '974'),
	(638, 'Saint-Denis', 'Reunionese', '638', 'euro', 'EUR', 'cent', 'Réunion', 'RE', 'REU', 'Réunion', '002', '014', 0, '262'),
	(642, 'Bucharest', 'Romanian', '642', 'Romanian leu (pl. lei)', 'RON', 'ban (pl. bani)', 'Romania', 'RO', 'ROU', 'Romania', '150', '151', 1, '40'),
	(643, 'Moscow', 'Russian', '643', 'Russian rouble', 'RUB', 'kopek', 'Russian Federation', 'RU', 'RUS', 'Russian Federation', '150', '151', 0, '7'),
	(646, 'Kigali', 'Rwandan; Rwandese', '646', 'Rwandese franc', 'RWF', 'centime', 'Republic of Rwanda', 'RW', 'RWA', 'Rwanda', '002', '014', 0, '250'),
	(652, 'Gustavia', 'of Saint Barthélemy', '652', 'euro', 'EUR', 'cent', 'Collectivity of Saint Barthélemy', 'BL', 'BLM', 'Saint Barthélemy', '019', '029', 0, '590'),
	(654, 'Jamestown', 'Saint Helenian', '654', 'Saint Helena pound', 'SHP', 'penny', 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', '002', '011', 0, '290'),
	(659, 'Basseterre', 'Kittsian; Nevisian', '659', 'East Caribbean dollar', 'XCD', 'cent', 'Federation of Saint Kitts and Nevis', 'KN', 'KNA', 'Saint Kitts and Nevis', '019', '029', 0, '1'),
	(660, 'The Valley', 'Anguillan', '660', 'East Caribbean dollar', 'XCD', 'cent', 'Anguilla', 'AI', 'AIA', 'Anguilla', '019', '029', 0, '1'),
	(662, 'Castries', 'Saint Lucian', '662', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Lucia', 'LC', 'LCA', 'Saint Lucia', '019', '029', 0, '1'),
	(663, 'Marigot', 'of Saint Martin', '663', 'euro', 'EUR', 'cent', 'Collectivity of Saint Martin', 'MF', 'MAF', 'Saint Martin (French part)', '019', '029', 0, '590'),
	(666, 'Saint-Pierre', 'St-Pierrais; Miquelonnais', '666', 'euro', 'EUR', 'cent', 'Territorial Collectivity of Saint Pierre and Miquelon', 'PM', 'SPM', 'Saint Pierre and Miquelon', '019', '021', 0, '508'),
	(670, 'Kingstown', 'Vincentian', '670', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Saint Vincent and the Grenadines', '019', '029', 0, '1'),
	(674, 'San Marino', 'San Marinese', '674', 'euro', 'EUR ', 'cent', 'Republic of San Marino', 'SM', 'SMR', 'San Marino', '150', '039', 0, '378'),
	(678, 'São Tomé', 'São Toméan', '678', 'dobra', 'STD', 'centavo', 'Democratic Republic of São Tomé and Príncipe', 'ST', 'STP', 'Sao Tome and Principe', '002', '017', 0, '239'),
	(682, 'Riyadh', 'Saudi Arabian', '682', 'riyal', 'SAR', 'halala', 'Kingdom of Saudi Arabia', 'SA', 'SAU', 'Saudi Arabia', '142', '145', 0, '966'),
	(686, 'Dakar', 'Senegalese', '686', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Senegal', 'SN', 'SEN', 'Senegal', '002', '011', 0, '221'),
	(688, 'Belgrade', 'Serb', '688', 'Serbian dinar', 'RSD', 'para (inv.)', 'Republic of Serbia', 'RS', 'SRB', 'Serbia', '150', '039', 0, '381'),
	(690, 'Victoria', 'Seychellois', '690', 'Seychelles rupee', 'SCR', 'cent', 'Republic of Seychelles', 'SC', 'SYC', 'Seychelles', '002', '014', 0, '248'),
	(694, 'Freetown', 'Sierra Leonean', '694', 'leone', 'SLL', 'cent', 'Republic of Sierra Leone', 'SL', 'SLE', 'Sierra Leone', '002', '011', 0, '232'),
	(702, 'Singapore', 'Singaporean', '702', 'Singapore dollar', 'SGD', 'cent', 'Republic of Singapore', 'SG', 'SGP', 'Singapore', '142', '035', 0, '65'),
	(703, 'Bratislava', 'Slovak', '703', 'euro', 'EUR', 'cent', 'Slovak Republic', 'SK', 'SVK', 'Slovakia', '150', '151', 1, '421'),
	(704, 'Hanoi', 'Vietnamese', '704', 'dong', 'VND', '(10 hào', 'Socialist Republic of Vietnam', 'VN', 'VNM', 'Viet Nam', '142', '035', 0, '84'),
	(705, 'Ljubljana', 'Slovene', '705', 'euro', 'EUR', 'cent', 'Republic of Slovenia', 'SI', 'SVN', 'Slovenia', '150', '039', 1, '386'),
	(706, 'Mogadishu', 'Somali', '706', 'Somali shilling', 'SOS', 'cent', 'Somali Republic', 'SO', 'SOM', 'Somalia', '002', '014', 0, '252'),
	(710, 'Pretoria (ZA1)', 'South African', '710', 'rand', 'ZAR', 'cent', 'Republic of South Africa', 'ZA', 'ZAF', 'South Africa', '002', '018', 0, '27'),
	(716, 'Harare', 'Zimbabwean', '716', 'Zimbabwe dollar (ZW1)', 'ZWL', 'cent', 'Republic of Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe', '002', '014', 0, '263'),
	(724, 'Madrid', 'Spaniard', '724', 'euro', 'EUR', 'cent', 'Kingdom of Spain', 'ES', 'ESP', 'Spain', '150', '039', 1, '34'),
	(728, 'Juba', 'South Sudanese', '728', 'South Sudanese pound', 'SSP', 'piaster', 'Republic of South Sudan', 'SS', 'SSD', 'South Sudan', '002', '015', 0, '211'),
	(729, 'Khartoum', 'Sudanese', '729', 'Sudanese pound', 'SDG', 'piastre', 'Republic of the Sudan', 'SD', 'SDN', 'Sudan', '002', '015', 0, '249'),
	(732, 'Al aaiun', 'Sahrawi', '732', 'Moroccan dirham', 'MAD', 'centime', 'Western Sahara', 'EH', 'ESH', 'Western Sahara', '002', '015', 0, '212'),
	(740, 'Paramaribo', 'Surinamese', '740', 'Surinamese dollar', 'SRD', 'cent', 'Republic of Suriname', 'SR', 'SUR', 'Suriname', '019', '005', 0, '597'),
	(744, 'Longyearbyen', 'of Svalbard', '744', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Svalbard and Jan Mayen', 'SJ', 'SJM', 'Svalbard and Jan Mayen', '150', '154', 0, '47'),
	(748, 'Mbabane', 'Swazi', '748', 'lilangeni', 'SZL', 'cent', 'Kingdom of Swaziland', 'SZ', 'SWZ', 'Swaziland', '002', '018', 0, '268'),
	(752, 'Stockholm', 'Swedish', '752', 'krona (pl. kronor)', 'SEK', 'öre (inv.)', 'Kingdom of Sweden', 'SE', 'SWE', 'Sweden', '150', '154', 1, '46'),
	(756, 'Berne', 'Swiss', '756', 'Swiss franc', 'CHF', 'centime', 'Swiss Confederation', 'CH', 'CHE', 'Switzerland', '150', '155', 1, '41'),
	(760, 'Damascus', 'Syrian', '760', 'Syrian pound', 'SYP', 'piastre', 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Arab Republic', '142', '145', 0, '963'),
	(762, 'Dushanbe', 'Tajik', '762', 'somoni', 'TJS', 'diram', 'Republic of Tajikistan', 'TJ', 'TJK', 'Tajikistan', '142', '143', 0, '992'),
	(764, 'Bangkok', 'Thai', '764', 'baht (inv.)', 'THB', 'satang (inv.)', 'Kingdom of Thailand', 'TH', 'THA', 'Thailand', '142', '035', 0, '66'),
	(768, 'Lomé', 'Togolese', '768', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Togolese Republic', 'TG', 'TGO', 'Togo', '002', '011', 0, '228'),
	(772, '(TK2)', 'Tokelauan', '772', 'New Zealand dollar', 'NZD', 'cent', 'Tokelau', 'TK', 'TKL', 'Tokelau', '009', '061', 0, '690'),
	(776, 'Nuku’alofa', 'Tongan', '776', 'pa’anga (inv.)', 'TOP', 'seniti (inv.)', 'Kingdom of Tonga', 'TO', 'TON', 'Tonga', '009', '061', 0, '676'),
	(780, 'Port of Spain', 'Trinidadian; Tobagonian', '780', 'Trinidad and Tobago dollar', 'TTD', 'cent', 'Republic of Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago', '019', '029', 0, '1'),
	(784, 'Abu Dhabi', 'Emirian', '784', 'UAE dirham', 'AED', 'fils (inv.)', 'United Arab Emirates', 'AE', 'ARE', 'United Arab Emirates', '142', '145', 0, '971'),
	(788, 'Tunis', 'Tunisian', '788', 'Tunisian dinar', 'TND', 'millime', 'Republic of Tunisia', 'TN', 'TUN', 'Tunisia', '002', '015', 0, '216'),
	(792, 'Ankara', 'Turk', '792', 'Turkish lira (inv.)', 'TRY', 'kurus (inv.)', 'Republic of Turkey', 'TR', 'TUR', 'Turkey', '142', '145', 0, '90'),
	(795, 'Ashgabat', 'Turkmen', '795', 'Turkmen manat (inv.)', 'TMT', 'tenge (inv.)', 'Turkmenistan', 'TM', 'TKM', 'Turkmenistan', '142', '143', 0, '993'),
	(796, 'Cockburn Town', 'Turks and Caicos Islander', '796', 'US dollar', 'USD', 'cent', 'Turks and Caicos Islands', 'TC', 'TCA', 'Turks and Caicos Islands', '019', '029', 0, '1'),
	(798, 'Funafuti', 'Tuvaluan', '798', 'Australian dollar', 'AUD', 'cent', 'Tuvalu', 'TV', 'TUV', 'Tuvalu', '009', '061', 0, '688'),
	(800, 'Kampala', 'Ugandan', '800', 'Uganda shilling', 'UGX', 'cent', 'Republic of Uganda', 'UG', 'UGA', 'Uganda', '002', '014', 0, '256'),
	(804, 'Kiev', 'Ukrainian', '804', 'hryvnia', 'UAH', 'kopiyka', 'Ukraine', 'UA', 'UKR', 'Ukraine', '150', '151', 0, '380'),
	(807, 'Skopje', 'of the former Yugoslav Republic of Macedonia', '807', 'denar (pl. denars)', 'MKD', 'deni (inv.)', 'the former Yugoslav Republic of Macedonia', 'MK', 'MKD', 'Macedonia, the former Yugoslav Republic of', '150', '039', 0, '389'),
	(818, 'Cairo', 'Egyptian', '818', 'Egyptian pound', 'EGP', 'piastre', 'Arab Republic of Egypt', 'EG', 'EGY', 'Egypt', '002', '015', 0, '20'),
	(826, 'London', 'British', '826', 'pound sterling', 'GBP', 'penny (pl. pence)', 'United Kingdom of Great Britain and Northern Ireland', 'GB', 'GBR', 'United Kingdom', '150', '154', 1, '44'),
	(831, 'St Peter Port', 'of Guernsey', '831', 'Guernsey pound (GG2)', 'GGP (GG2)', 'penny (pl. pence)', 'Bailiwick of Guernsey', 'GG', 'GGY', 'Guernsey', '150', '154', 0, '44'),
	(832, 'St Helier', 'of Jersey', '832', 'Jersey pound (JE2)', 'JEP (JE2)', 'penny (pl. pence)', 'Bailiwick of Jersey', 'JE', 'JEY', 'Jersey', '150', '154', 0, '44'),
	(833, 'Douglas', 'Manxman; Manxwoman', '833', 'Manx pound (IM2)', 'IMP (IM2)', 'penny (pl. pence)', 'Isle of Man', 'IM', 'IMN', 'Isle of Man', '150', '154', 0, '44'),
	(834, 'Dodoma (TZ1)', 'Tanzanian', '834', 'Tanzanian shilling', 'TZS', 'cent', 'United Republic of Tanzania', 'TZ', 'TZA', 'Tanzania, United Republic of', '002', '014', 0, '255'),
	(840, 'Washington DC', 'American', '840', 'US dollar', 'USD', 'cent', 'United States of America', 'US', 'USA', 'United States', '019', '021', 0, '1'),
	(850, 'Charlotte Amalie', 'US Virgin Islander', '850', 'US dollar', 'USD', 'cent', 'United States Virgin Islands', 'VI', 'VIR', 'Virgin Islands, U.S.', '019', '029', 0, '1'),
	(854, 'Ouagadougou', 'Burkinabe', '854', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Burkina Faso', 'BF', 'BFA', 'Burkina Faso', '002', '011', 0, '226'),
	(858, 'Montevideo', 'Uruguayan', '858', 'Uruguayan peso', 'UYU', 'centésimo', 'Eastern Republic of Uruguay', 'UY', 'URY', 'Uruguay', '019', '005', 0, '598'),
	(860, 'Tashkent', 'Uzbek', '860', 'sum (inv.)', 'UZS', 'tiyin (inv.)', 'Republic of Uzbekistan', 'UZ', 'UZB', 'Uzbekistan', '142', '143', 0, '998'),
	(862, 'Caracas', 'Venezuelan', '862', 'bolívar fuerte (pl. bolívares fuertes)', 'VEF', 'céntimo', 'Bolivarian Republic of Venezuela', 'VE', 'VEN', 'Venezuela, Bolivarian Republic of', '019', '005', 0, '58'),
	(876, 'Mata-Utu', 'Wallisian; Futunan; Wallis and Futuna Islander', '876', 'CFP franc', 'XPF', 'centime', 'Wallis and Futuna', 'WF', 'WLF', 'Wallis and Futuna', '009', '061', 0, '681'),
	(882, 'Apia', 'Samoan', '882', 'tala (inv.)', 'WST', 'sene (inv.)', 'Independent State of Samoa', 'WS', 'WSM', 'Samoa', '009', '061', 0, '685'),
	(887, 'San’a', 'Yemenite', '887', 'Yemeni rial', 'YER', 'fils (inv.)', 'Republic of Yemen', 'YE', 'YEM', 'Yemen', '142', '145', 0, '967'),
	(894, 'Lusaka', 'Zambian', '894', 'Zambian kwacha (inv.)', 'ZMW', 'ngwee (inv.)', 'Republic of Zambia', 'ZM', 'ZMB', 'Zambia', '002', '014', 0, '260');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageable_id` int(10) unsigned NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.images: ~0 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.migrations: ~21 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_11_18_081028_create_profile_table', 1),
	('2014_11_22_013719_confide_setup_users_table', 1),
	('2014_11_22_133839_create_image_table', 1),
	('2014_12_13_143521_setup_countries_table', 1),
	('2014_12_13_143522_charify_countries_table', 1),
	('2014_12_13_144706_entrust_setup_tables', 1),
	('2014_12_13_155453_create_contact_table', 1),
	('2014_12_18_030745_create_product_table', 1),
	('2014_12_18_061633_create_product_category_table', 1),
	('2014_12_18_064013_create_product_brand_table', 1),
	('2014_12_18_065521_create_product_status_table', 1),
	('2014_12_18_070839_create_product_type_table', 1),
	('2014_12_18_080813_create_product_view_table', 2),
	('2014_12_21_114333_create_wishlist_table', 3),
	('2014_12_22_062056_create_shipping_addresses_table', 4),
	('2014_12_26_072802_create_transactions_table', 5),
	('2014_12_26_145419_create_payment_methods_table', 5),
	('2014_12_27_055435_create_transaction_statuses_table', 6),
	('2015_01_09_111340_create_user_types_table', 7),
	('2015_01_15_021731_create_product_backgrounds', 7),
	('2015_01_15_021941_create_product_frames_table', 7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.password_reminders
CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.password_reminders: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.payment_methods
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.payment_methods: ~1 rows (approximately)
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
INSERT INTO `payment_methods` (`id`, `slug`, `name`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(2, 'paypal', 'Paypal', 'paypal.png', NULL, '2014-12-26 15:12:12', '2014-12-26 15:12:12');
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `image_type` enum('square','horizontal','vertical') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'square',
  `image_original_type` enum('square','horizontal','vertical') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'square',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.products: ~23 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `status_id`, `type_id`, `category_id`, `brand_id`, `title`, `content`, `excerpt`, `slug`, `price`, `width`, `height`, `is_available`, `views`, `image`, `image_type`, `image_original_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 4, 1, 2, 5, 'Edited Title 2', 'Cupiditate error quaerat recusandae id dolores rerum aliquam. Nihil placeat libero enim magnam nulla placeat neque. Quos et explicabo aliquid dolores ut. Hic maxime quas nulla possimus aut ex maiores aspernatur. Asperiores rerum hic vel molestias.\nSed quisquam et nobis in ad est aut. Debitis perspiciatis eum voluptas est inventore ab. Est expedita soluta qui similique. Optio eligendi facere odit ea. Rerum sed consequatur voluptatum nam.', 'Fugit quis recusandae ut quis et harum autem. Corporis qui veniam minus necessitatibus et eveniet ut', 'quis', 466.89, '32', '53', 1, 18, '21.jpg\r\n', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-14 00:53:06', NULL),
	(3, 3, 3, 1, 2, 'Vel Ipsa', 'Accusamus et neque sequi et dolore tempore. Reiciendis beatae quia quas ut eos qui itaque. Et ut in ipsum. Tempora ut ipsa architecto id omnis qui et. Harum et consequatur delectus rerum ipsa.\nSed doloribus aut adipisci consectetur unde consequatur. Id quidem aspernatur molestiae. Possimus dolorem quidem doloribus inventore et aut. Autem et eligendi quia sunt voluptates sequi.', 'Voluptates perspiciatis corporis est molestias odio ducimus. Ex atque harum nesciunt iste enim. Quia', 'vel-ipsa', 468.23, '490', '992', 1, 7, '1.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-13 06:15:39', NULL),
	(4, 3, 2, 1, 5, 'Illo Ut', 'Minus velit recusandae provident adipisci. Minus ut iste similique praesentium ea. Dolore quos qui aliquam id.\nIn aliquam inventore perferendis cum. Dolore voluptatum repellendus est omnis ea commodi. Cupiditate eius dolor dolor et. Porro blanditiis est doloremque et.\nExercitationem consequatur cumque recusandae optio. Odit vitae tempora aut cupiditate praesentium. Sunt id iure voluptatem occaecati quos. Tempora sit dignissimos quia perferendis explicabo dolor iste qui.', 'Corporis aliquam culpa hic. Aperiam sit qui illo est atque odio doloremque. Voluptatem labore minus', 'illo-ut', 149.48, '32', '248', 1, 4, '2.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-13 06:15:48', NULL),
	(5, 4, 2, 1, 5, 'Recusandae consequatur.', 'Illo expedita eligendi quibusdam ut incidunt assumenda doloremque. Eaque ab eaque nam quibusdam fuga enim voluptatem ducimus. Consequatur dolorem rerum vel enim exercitationem qui aspernatur. Officia occaecati non rerum sit temporibus officiis iure omnis.\nNostrum aliquid autem sed et. Cum nobis doloremque a aperiam. Qui consequatur iusto dolores et amet voluptatibus.\nEos natus sit temporibus ut. Aperiam reprehenderit quidem ex.', 'Ea dolorem sint ab vitae aut. Soluta voluptas voluptas ab rerum porro et. Doloribus id natus vel fuga et rem iusto.', 'recusandae-consequatur', 388.53, '485', '620', 1, 3, '3.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(6, 3, 1, 1, 3, 'Consequatur itaque.', 'Est quia reiciendis et fugiat officiis voluptatem modi. Ea ducimus veritatis aut vel sint facere sed doloremque. Quo temporibus voluptatem culpa unde beatae dicta. Iure beatae ab ut porro totam rerum.\nDolore quibusdam qui beatae nemo. Modi exercitationem consequatur quam qui aut. Qui veniam exercitationem molestiae rem est. Qui voluptate aut suscipit nisi et vitae corrupti. Rem excepturi soluta dolor necessitatibus.', 'Consequatur quod nihil fugiat. Modi eum ducimus ipsam fugit praesentium nesciunt maiores. Corrupti eligendi suscipit quisquam ipsam tenetur veniam.', 'consequatur-itaque', 196.42, '211', '957', 1, 2, '4.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(7, 4, 1, 3, 1, 'Qui Recusandaee', 'Inventore ut quae accusamus. Ut perferendis aut eius optio a. Vel velit rem consequatur labore praesentium dolores. Hic occaecati itaque quasi beatae porro ut.\nMinus dolorem ea quam harum. Consequatur in officiis et dolorum sunt non ipsa atque.\nA nobis ut voluptatem aut aut excepturi aut autem. Cumque tempore aut itaque qui ducimus reiciendis. Ut asperiores non voluptatum at deleniti.', 'Provident facilis reiciendis iure quo repellendus similique accusantium. Iusto sunt aspernatur ex il', 'qui-recusandae', 239.78, '261', '126', 1, 2, '22.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-13 19:22:29', NULL),
	(8, 4, 1, 3, 2, 'Maiores.', 'Facere nihil sed nulla totam sequi atque quis. Odit delectus voluptates atque temporibus aut ad et.\nOfficia est accusantium dolor debitis voluptas quae. Modi impedit cum id voluptatem est rerum.\nQuis et possimus quae magni voluptatem aut reprehenderit. Et ullam enim porro libero. Dolore non dolor esse id accusantium quia.\nEst natus fugiat aut sed voluptas minus architecto. Animi odit delectus et. Aut at doloremque quae ratione. Quia earum dolor consequatur in fugiat et repellat.', 'Quia sit et alias possimus commodi animi voluptatum. Laborum quia possimus modi. Tempore maxime provident beatae odio. Provident et debitis quibusdam.', 'maiores', 293.26, '874', '874', 1, 6, '23.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 03:40:20', NULL),
	(9, 3, 2, 3, 5, 'Illo earum.', 'Voluptatem porro reprehenderit voluptatem veniam rerum id vitae. Dolorem voluptatem aut ratione non aperiam. Molestiae officiis qui et recusandae. Voluptas fugit omnis illo.\nVeniam harum quis aut eum aut qui accusamus optio. Beatae officia dolorem cumque excepturi. Autem maiores est fugiat qui. Illum aut nihil omnis est velit.\nUt voluptatem suscipit et et qui. Consequatur tenetur in aliquam repudiandae et. Vero iure maiores ut expedita. Error molestiae delectus nulla aut.', 'Omnis aut et qui eius ab vel. In impedit eius omnis alias dolores dolor delectus. Velit aspernatur nemo necessitatibus quis quas dolorum.', 'illo-earum', 111.09, '276', '76', 1, 3, '24.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-05 03:26:14', NULL),
	(13, 4, 2, 1, 5, 'Nulla.', 'Ea et aut alias earum deleniti. Tempora illum libero fugit quis eum natus est. Fugiat nobis nisi omnis aut eos qui.\nEius mollitia id in sed. Velit voluptas earum recusandae reprehenderit quo. Ut quis dolores nisi. Nam rem vero est et omnis temporibus. Ipsa quaerat dolores alias.\nConsequatur sint voluptatem accusamus. Rerum repudiandae nihil tenetur incidunt dolores id. Voluptate beatae laborum tenetur cumque nesciunt vitae.', 'Distinctio iure expedita quas libero earum voluptatem. Omnis et enim autem veniam aut quas deleniti. Deleniti perspiciatis aut tenetur doloribus.', 'nulla', 447.53, '168', '718', 1, 4, '5.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(15, 4, 3, 1, 4, 'Odit.', 'Qui et optio impedit qui minima rerum. Qui tempora soluta aliquam nemo error.\nVoluptatem harum dolorem dignissimos reprehenderit et necessitatibus. Quasi eos dolore ad earum. Fugit officiis amet et possimus distinctio et necessitatibus. Aut nam ut dolor corrupti culpa.\nQuis repellendus harum quae et officiis qui dolore. Officia omnis qui fuga explicabo molestiae. Consequatur sint quam est molestiae.', 'Magni officiis repudiandae fuga expedita sed. Qui voluptatem necessitatibus in iste quia deserunt saepe. Quis earum et quia labore suscipit eius sed quo.', 'odit', 316.76, '963', '968', 1, 1, '6.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(19, 3, 3, 1, 2, 'Et enim.', 'Minus autem eveniet doloremque molestiae. Adipisci consequuntur odio veniam saepe ea vitae. Aut ab suscipit error est. Maxime temporibus excepturi repudiandae voluptatem ut. Voluptas sit sunt praesentium adipisci cupiditate ut.\nUllam eos suscipit natus aut architecto facere. Consequatur temporibus quis blanditiis commodi corrupti. Earum nesciunt hic non veritatis repellat.', 'Debitis tempora natus inventore et placeat. Eum ut nostrum explicabo dolorem omnis occaecati.', 'et-enim', 350.57, '265', '692', 1, 0, '7.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(20, 4, 2, 1, 4, 'In Aspernatur', 'Cupiditate consectetur iure et consequatur. Dolores unde et sunt. Aut doloribus quas est hic neque aliquid beatae.\nEnim quod blanditiis in velit eligendi. Omnis quia quisquam suscipit magni omnis saepe quia. Dolor deleniti asperiores sit autem sit.\nLaudantium cupiditate laboriosam optio cumque rerum eum omnis. In error necessitatibus debitis sit. Alias incidunt occaecati blanditiis dolores aut consectetur. Architecto exercitationem rerum deserunt atque velit eveniet voluptate illum.', 'Qui facere sed et placeat dolores. Aut qui tempora possimus. Rerum dolorem beatae repellat unde quo.', 'in-aspernatur', 393.32, '438', '971', 1, 3, '8.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-13 06:15:55', NULL),
	(21, 4, 3, 1, 4, 'Odit.', 'Qui et optio impedit qui minima rerum. Qui tempora soluta aliquam nemo error.\nVoluptatem harum dolorem dignissimos reprehenderit et necessitatibus. Quasi eos dolore ad earum. Fugit officiis amet et possimus distinctio et necessitatibus. Aut nam ut dolor corrupti culpa.\nQuis repellendus harum quae et officiis qui dolore. Officia omnis qui fuga explicabo molestiae. Consequatur sint quam est molestiae.', 'Magni officiis repudiandae fuga expedita sed. Qui voluptatem necessitatibus in iste quia deserunt saepe. Quis earum et quia labore suscipit eius sed quo.', 'odit', 316.76, '963', '968', 1, 1, '9.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(22, 3, 3, 1, 6, 'Vel ipsa.', 'Accusamus et neque sequi et dolore tempore. Reiciendis beatae quia quas ut eos qui itaque. Et ut in ipsum. Tempora ut ipsa architecto id omnis qui et. Harum et consequatur delectus rerum ipsa.\nSed doloribus aut adipisci consectetur unde consequatur. Id quidem aspernatur molestiae. Possimus dolorem quidem doloribus inventore et aut. Autem et eligendi quia sunt voluptates sequi.', 'Voluptates perspiciatis corporis est molestias odio ducimus. Ex atque harum nesciunt iste enim. Quia hic et voluptatem voluptate fugit.', 'vel-ipsa', 468.23, '490', '992', 1, 5, '10.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 05:22:19', NULL),
	(23, 4, 2, 1, 6, 'In aspernatur.', 'Cupiditate consectetur iure et consequatur. Dolores unde et sunt. Aut doloribus quas est hic neque aliquid beatae.\nEnim quod blanditiis in velit eligendi. Omnis quia quisquam suscipit magni omnis saepe quia. Dolor deleniti asperiores sit autem sit.\nLaudantium cupiditate laboriosam optio cumque rerum eum omnis. In error necessitatibus debitis sit. Alias incidunt occaecati blanditiis dolores aut consectetur. Architecto exercitationem rerum deserunt atque velit eveniet voluptate illum.', 'Qui facere sed et placeat dolores. Aut qui tempora possimus. Rerum dolorem beatae repellat unde quo. Quia sit beatae et vitae dolor.', 'in-aspernatur', 393.32, '438', '971', 1, 2, '11.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 08:47:14', NULL),
	(24, 4, 2, 1, 6, 'In aspernatur.', 'Cupiditate consectetur iure et consequatur. Dolores unde et sunt. Aut doloribus quas est hic neque aliquid beatae.\nEnim quod blanditiis in velit eligendi. Omnis quia quisquam suscipit magni omnis saepe quia. Dolor deleniti asperiores sit autem sit.\nLaudantium cupiditate laboriosam optio cumque rerum eum omnis. In error necessitatibus debitis sit. Alias incidunt occaecati blanditiis dolores aut consectetur. Architecto exercitationem rerum deserunt atque velit eveniet voluptate illum.', 'Qui facere sed et placeat dolores. Aut qui tempora possimus. Rerum dolorem beatae repellat unde quo. Quia sit beatae et vitae dolor.', 'in-aspernatur', 393.32, '438', '971', 1, 2, '12.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 07:01:48', NULL),
	(25, 4, 2, 1, 6, 'In aspernatur.', 'Cupiditate consectetur iure et consequatur. Dolores unde et sunt. Aut doloribus quas est hic neque aliquid beatae.\nEnim quod blanditiis in velit eligendi. Omnis quia quisquam suscipit magni omnis saepe quia. Dolor deleniti asperiores sit autem sit.\nLaudantium cupiditate laboriosam optio cumque rerum eum omnis. In error necessitatibus debitis sit. Alias incidunt occaecati blanditiis dolores aut consectetur. Architecto exercitationem rerum deserunt atque velit eveniet voluptate illum.', 'Qui facere sed et placeat dolores. Aut qui tempora possimus. Rerum dolorem beatae repellat unde quo. Quia sit beatae et vitae dolor.', 'in-aspernatur', 393.32, '438', '971', 1, 1, '13.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 06:20:21', NULL),
	(26, 4, 2, 1, 5, 'Recusandae consequatur.', 'Illo expedita eligendi quibusdam ut incidunt assumenda doloremque. Eaque ab eaque nam quibusdam fuga enim voluptatem ducimus. Consequatur dolorem rerum vel enim exercitationem qui aspernatur. Officia occaecati non rerum sit temporibus officiis iure omnis.\nNostrum aliquid autem sed et. Cum nobis doloremque a aperiam. Qui consequatur iusto dolores et amet voluptatibus.\nEos natus sit temporibus ut. Aperiam reprehenderit quidem ex.', 'Ea dolorem sint ab vitae aut. Soluta voluptas voluptas ab rerum porro et. Doloribus id natus vel fuga et rem iusto.', 'recusandae-consequatur', 388.53, '485', '620', 1, 3, '14.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-06 11:20:30', NULL),
	(27, 3, 2, 1, 10, 'Illo ut.', 'Minus velit recusandae provident adipisci. Minus ut iste similique praesentium ea. Dolore quos qui aliquam id.\nIn aliquam inventore perferendis cum. Dolore voluptatum repellendus est omnis ea commodi. Cupiditate eius dolor dolor et. Porro blanditiis est doloremque et.\nExercitationem consequatur cumque recusandae optio. Odit vitae tempora aut cupiditate praesentium. Sunt id iure voluptatem occaecati quos. Tempora sit dignissimos quia perferendis explicabo dolor iste qui.', 'Corporis aliquam culpa hic. Aperiam sit qui illo est atque odio doloremque. Voluptatem labore minus in eos tempora explicabo assumenda debitis.', 'illo-ut', 149.48, '32', '248', 1, 1, '15.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(28, 4, 2, 1, 5, 'Nulla.', 'Ea et aut alias earum deleniti. Tempora illum libero fugit quis eum natus est. Fugiat nobis nisi omnis aut eos qui.\nEius mollitia id in sed. Velit voluptas earum recusandae reprehenderit quo. Ut quis dolores nisi. Nam rem vero est et omnis temporibus. Ipsa quaerat dolores alias.\nConsequatur sint voluptatem accusamus. Rerum repudiandae nihil tenetur incidunt dolores id. Voluptate beatae laborum tenetur cumque nesciunt vitae.', 'Distinctio iure expedita quas libero earum voluptatem. Omnis et enim autem veniam aut quas deleniti. Deleniti perspiciatis aut tenetur doloribus.', 'nulla', 447.53, '168', '718', 1, 1, '16.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 08:19:26', NULL),
	(29, 4, 2, 1, 5, 'Nulla.', 'Ea et aut alias earum deleniti. Tempora illum libero fugit quis eum natus est. Fugiat nobis nisi omnis aut eos qui.\nEius mollitia id in sed. Velit voluptas earum recusandae reprehenderit quo. Ut quis dolores nisi. Nam rem vero est et omnis temporibus. Ipsa quaerat dolores alias.\nConsequatur sint voluptatem accusamus. Rerum repudiandae nihil tenetur incidunt dolores id. Voluptate beatae laborum tenetur cumque nesciunt vitae.', 'Distinctio iure expedita quas libero earum voluptatem. Omnis et enim autem veniam aut quas deleniti. Deleniti perspiciatis aut tenetur doloribus.', 'nulla', 447.53, '168', '718', 1, 0, '17.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(30, 3, 1, 1, 3, 'Consequatur itaque.', 'Est quia reiciendis et fugiat officiis voluptatem modi. Ea ducimus veritatis aut vel sint facere sed doloremque. Quo temporibus voluptatem culpa unde beatae dicta. Iure beatae ab ut porro totam rerum.\nDolore quibusdam qui beatae nemo. Modi exercitationem consequatur quam qui aut. Qui veniam exercitationem molestiae rem est. Qui voluptate aut suscipit nisi et vitae corrupti. Rem excepturi soluta dolor necessitatibus.', 'Consequatur quod nihil fugiat. Modi eum ducimus ipsam fugit praesentium nesciunt maiores. Corrupti eligendi suscipit quisquam ipsam tenetur veniam.', 'consequatur-itaque', 196.42, '211', '957', 1, 1, '18.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 08:15:37', NULL),
	(31, 3, 1, 1, 3, 'Consequatur itaque.', 'Est quia reiciendis et fugiat officiis voluptatem modi. Ea ducimus veritatis aut vel sint facere sed doloremque. Quo temporibus voluptatem culpa unde beatae dicta. Iure beatae ab ut porro totam rerum.\nDolore quibusdam qui beatae nemo. Modi exercitationem consequatur quam qui aut. Qui veniam exercitationem molestiae rem est. Qui voluptate aut suscipit nisi et vitae corrupti. Rem excepturi soluta dolor necessitatibus.', 'Consequatur quod nihil fugiat. Modi eum ducimus ipsam fugit praesentium nesciunt maiores. Corrupti eligendi suscipit quisquam ipsam tenetur veniam.', 'consequatur-itaque', 196.42, '211', '957', 1, 0, '19.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 04:10:02', NULL),
	(32, 3, 3, 1, 2, 'Et enim.', 'Minus autem eveniet doloremque molestiae. Adipisci consequuntur odio veniam saepe ea vitae. Aut ab suscipit error est. Maxime temporibus excepturi repudiandae voluptatem ut. Voluptas sit sunt praesentium adipisci cupiditate ut.\nUllam eos suscipit natus aut architecto facere. Consequatur temporibus quis blanditiis commodi corrupti. Earum nesciunt hic non veritatis repellat.', 'Debitis tempora natus inventore et placeat. Eum ut nostrum explicabo dolorem omnis occaecati.', 'et-enim', 350.57, '265', '692', 1, 1, '20.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-05 08:17:33', NULL),
	(33, 3, 2, 3, 5, 'Illo earum.', 'Voluptatem porro reprehenderit voluptatem veniam rerum id vitae. Dolorem voluptatem aut ratione non aperiam. Molestiae officiis qui et recusandae. Voluptas fugit omnis illo.\nVeniam harum quis aut eum aut qui accusamus optio. Beatae officia dolorem cumque excepturi. Autem maiores est fugiat qui. Illum aut nihil omnis est velit.\nUt voluptatem suscipit et et qui. Consequatur tenetur in aliquam repudiandae et. Vero iure maiores ut expedita. Error molestiae delectus nulla aut.', 'Omnis aut et qui eius ab vel. In impedit eius omnis alias dolores dolor delectus. Velit aspernatur nemo necessitatibus quis quas dolorum.', 'illo-earum', 111.09, '276', '76', 1, 3, '25.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-05 03:26:14', NULL),
	(34, 4, 1, 3, 1, 'Qui recusandae.', 'Inventore ut quae accusamus. Ut perferendis aut eius optio a. Vel velit rem consequatur labore praesentium dolores. Hic occaecati itaque quasi beatae porro ut.\nMinus dolorem ea quam harum. Consequatur in officiis et dolorum sunt non ipsa atque.\nA nobis ut voluptatem aut aut excepturi aut autem. Cumque tempore aut itaque qui ducimus reiciendis. Ut asperiores non voluptatum at deleniti.', 'Provident facilis reiciendis iure quo repellendus similique accusantium. Iusto sunt aspernatur ex illo soluta et aut. Et consequatur rerum provident sint.', 'qui-recusandae', 239.78, '261', '126', 1, 2, '26.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-04 12:17:00', NULL),
	(35, 4, 1, 3, 2, 'Maiores.', 'Facere nihil sed nulla totam sequi atque quis. Odit delectus voluptates atque temporibus aut ad et.\nOfficia est accusantium dolor debitis voluptas quae. Modi impedit cum id voluptatem est rerum.\nQuis et possimus quae magni voluptatem aut reprehenderit. Et ullam enim porro libero. Dolore non dolor esse id accusantium quia.\nEst natus fugiat aut sed voluptas minus architecto. Animi odit delectus et. Aut at doloremque quae ratione. Quia earum dolor consequatur in fugiat et repellat.', 'Quia sit et alias possimus commodi animi voluptatum. Laborum quia possimus modi. Tempore maxime provident beatae odio. Provident et debitis quibusdam.', 'maiores', 293.26, '874', '874', 1, 6, '27.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-05 03:40:20', NULL),
	(36, 3, 2, 3, 5, 'Illo earum.', 'Voluptatem porro reprehenderit voluptatem veniam rerum id vitae. Dolorem voluptatem aut ratione non aperiam. Molestiae officiis qui et recusandae. Voluptas fugit omnis illo.\nVeniam harum quis aut eum aut qui accusamus optio. Beatae officia dolorem cumque excepturi. Autem maiores est fugiat qui. Illum aut nihil omnis est velit.\nUt voluptatem suscipit et et qui. Consequatur tenetur in aliquam repudiandae et. Vero iure maiores ut expedita. Error molestiae delectus nulla aut.', 'Omnis aut et qui eius ab vel. In impedit eius omnis alias dolores dolor delectus. Velit aspernatur nemo necessitatibus quis quas dolorum.', 'illo-earum', 111.09, '276', '76', 1, 3, '28.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-05 03:26:14', NULL),
	(37, 4, 1, 3, 1, 'Qui recusandae.', 'Inventore ut quae accusamus. Ut perferendis aut eius optio a. Vel velit rem consequatur labore praesentium dolores. Hic occaecati itaque quasi beatae porro ut.\nMinus dolorem ea quam harum. Consequatur in officiis et dolorum sunt non ipsa atque.\nA nobis ut voluptatem aut aut excepturi aut autem. Cumque tempore aut itaque qui ducimus reiciendis. Ut asperiores non voluptatum at deleniti.', 'Provident facilis reiciendis iure quo repellendus similique accusantium. Iusto sunt aspernatur ex illo soluta et aut. Et consequatur rerum provident sint.', 'qui-recusandae', 239.78, '261', '126', 1, 2, '29.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-04 12:17:00', NULL),
	(38, 4, 1, 3, 2, 'Maiores.', 'Facere nihil sed nulla totam sequi atque quis. Odit delectus voluptates atque temporibus aut ad et.\nOfficia est accusantium dolor debitis voluptas quae. Modi impedit cum id voluptatem est rerum.\nQuis et possimus quae magni voluptatem aut reprehenderit. Et ullam enim porro libero. Dolore non dolor esse id accusantium quia.\nEst natus fugiat aut sed voluptas minus architecto. Animi odit delectus et. Aut at doloremque quae ratione. Quia earum dolor consequatur in fugiat et repellat.', 'Quia sit et alias possimus commodi animi voluptatum. Laborum quia possimus modi. Tempore maxime provident beatae odio. Provident et debitis quibusdam.', 'maiores', 293.26, '874', '874', 1, 7, '30.jpg', 'square', 'vertical', '2014-12-18 07:56:32', '2015-01-08 08:10:05', NULL),
	(39, 4, 1, 3, 1, 'Qui recusandae.', 'Inventore ut quae accusamus. Ut perferendis aut eius optio a. Vel velit rem consequatur labore praesentium dolores. Hic occaecati itaque quasi beatae porro ut.\nMinus dolorem ea quam harum. Consequatur in officiis et dolorum sunt non ipsa atque.\nA nobis ut voluptatem aut aut excepturi aut autem. Cumque tempore aut itaque qui ducimus reiciendis. Ut asperiores non voluptatum at deleniti.', 'Provident facilis reiciendis iure quo repellendus similique accusantium. Iusto sunt aspernatur ex illo soluta et aut. Et consequatur rerum provident sint.', 'qui-recusandae', 239.78, '261', '126', 1, 3, '31.jpg', 'square', 'horizontal', '2014-12-18 07:56:32', '2015-01-08 08:06:46', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_backgrounds
CREATE TABLE IF NOT EXISTS `product_backgrounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_backgrounds: ~6 rows (approximately)
/*!40000 ALTER TABLE `product_backgrounds` DISABLE KEYS */;
INSERT INTO `product_backgrounds` (`id`, `name`, `slug`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(25, 'Background 1', 'background-1', 'bg1.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 02:57:49', NULL),
	(26, 'Background 2', 'background-2', 'bg2.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 11:20:35', NULL),
	(27, 'Background 3', 'background-3', 'bg3.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 02:57:49', NULL),
	(28, 'Background 4', 'background-4', 'bg4.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 02:57:49', NULL),
	(29, 'Background 5', 'background-5', 'bg5.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 02:57:49', NULL),
	(30, 'Background 6', 'background-6', 'bg6.jpg', 1, '2015-01-15 02:57:49', '2015-01-15 02:57:49', NULL);
/*!40000 ALTER TABLE `product_backgrounds` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_brands
CREATE TABLE IF NOT EXISTS `product_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_brands: ~6 rows (approximately)
/*!40000 ALTER TABLE `product_brands` DISABLE KEYS */;
INSERT INTO `product_brands` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dior', 'dior', '', 'dior.jpg', '2015-01-05 10:03:14', '2015-01-05 10:03:14', NULL),
	(2, 'Louis Vitton', 'louis-vitton', '', 'louis-vuitton.jpg', '2015-01-05 10:03:14', '2015-01-05 10:03:14', NULL),
	(3, 'Versace', 'versace', '', 'versace.jpg', '2015-01-05 10:03:14', '2015-01-05 10:03:14', NULL),
	(4, 'Hermes', 'hermes', '', 'hermes.jpg', '2015-01-05 10:03:14', '2015-01-05 10:03:14', NULL),
	(5, 'Prada', 'prada', '', 'prada.jpg', '2015-01-05 10:03:14', '2015-01-05 10:03:14', NULL),
	(6, 'Chanel', 'chanel', '', 'chanel.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `product_brands` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Cosmic Quotes', 'cosmic-quotes', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(2, 'Ego Driven', 'ego-driven', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(3, 'Exclusivity', 'exclusivity', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_frames
CREATE TABLE IF NOT EXISTS `product_frames` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_frames: ~6 rows (approximately)
/*!40000 ALTER TABLE `product_frames` DISABLE KEYS */;
INSERT INTO `product_frames` (`id`, `name`, `slug`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Frame 1', 'frame-1', '1.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 08:49:49', NULL),
	(2, 'Frame 2', 'frame-2', '2.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 11:32:35', NULL),
	(3, 'Frame 3', 'frame-3', '3.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(4, 'Frame 4', 'frame-4', '4.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(5, 'Frame 5', 'frame-5', '5.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(6, 'Frame 6', 'frame-6', '6.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL);
/*!40000 ALTER TABLE `product_frames` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_statuses
CREATE TABLE IF NOT EXISTS `product_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Column 6` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_statuses: ~6 rows (approximately)
/*!40000 ALTER TABLE `product_statuses` DISABLE KEYS */;
INSERT INTO `product_statuses` (`id`, `name`, `slug`, `created_at`, `updated_at`, `Column 6`, `deleted_at`) VALUES
	(1, 'Sold Out', 'sold-out', '2014-12-18 07:56:31', '2014-12-18 07:56:31', '0000-00-00 00:00:00', NULL),
	(2, 'Available', 'available', '2014-12-18 07:56:31', '2014-12-18 07:56:31', '0000-00-00 00:00:00', NULL),
	(3, 'Feature', 'feature', '2014-12-18 07:56:31', '2014-12-18 07:56:31', '0000-00-00 00:00:00', NULL),
	(4, 'New', 'new', '2014-12-18 07:56:31', '2014-12-18 07:56:31', '0000-00-00 00:00:00', NULL),
	(5, 'Unpublished', 'unpublished', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(6, 'Published', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `product_statuses` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_types
CREATE TABLE IF NOT EXISTS `product_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_types: ~3 rows (approximately)
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;
INSERT INTO `product_types` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Canvas', 'canvas', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(2, 'Art', 'art', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(3, 'Collections', 'collections', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL);
/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.product_views
CREATE TABLE IF NOT EXISTS `product_views` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_views: ~1 rows (approximately)
/*!40000 ALTER TABLE `product_views` DISABLE KEYS */;
INSERT INTO `product_views` (`id`, `user_id`, `product_id`, `ip_address`, `info`, `created_at`, `updated_at`) VALUES
	(5, NULL, 10, '10.0.2.2', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '2014-12-18 12:41:47', '2014-12-18 12:41:47');
/*!40000 ALTER TABLE `product_views` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `uid` bigint(20) unsigned NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.profiles: ~11 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `uid`, `access_token`, `access_token_secret`, `first_name`, `last_name`, `mobile_number`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 0, '', '', 'Reneagan', 'Kling', '10109250852', '14593 Walker Pines Apt. 699\nGertrudehaven, AA 73402', '2014-12-18 07:56:32', '2014-12-22 13:25:53', NULL),
	(2, 2, 0, '', '', 'Khalid', 'Reichel', '41994851082', '819 Wiza Heights Suite 870\nKiehnton, NV 94657', '2014-12-18 07:56:32', '2014-12-18 07:56:32', NULL),
	(3, 3, 0, '', '', 'Percival', 'Zboncak', '54379968438', '769 Eugene Plaza Apt. 975\nRyleehaven, MN 09512', '2014-12-18 07:56:32', '2014-12-18 07:56:32', NULL),
	(5, 5, 0, '', '', 'Juni', 'Brosas', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-12-23 14:02:27'),
	(7, 13, 0, '', '', 'Jesa', 'Brosas', '2311511235', 'Bulicon Turno, Dipolog city', '2014-12-31 01:15:53', '2014-12-31 01:15:53', NULL),
	(8, 14, 976336342379361, 'CAAFZCPrKckXQBAHcFGECZAhJwlxyNm6OOPQZBgZAtvN0del6lNBdiAYDqemCeZBsx1uMLluZCYOqAwyysKkeZCVXL2HFayQZBmMlJxF3pTorbmXTzIV82jxOvOLu6lOC57vGSVYi8J8sKitpXTPDmsWtGil4RXdZBIh8m946ZC6yNXr0Ewl6aR8dikx4suGU6nEYtd5jmhFagZARFXklFKGnt3a', '', 'Inuj', 'Sasorb', '', '', '2015-01-06 04:25:57', '2015-01-12 06:26:08', NULL),
	(9, 15, 0, '', '', 'jayde', 'guevarra', '', '', '2015-01-06 04:45:07', '2015-01-06 04:45:07', NULL),
	(10, 16, 10203096045112700, 'CAAFZCPrKckXQBAIQo0ZATXqD3X7ZBG8kHASQHh2LQzLHTwaphcCBMv03ZBYklhRcJKfGxQ4ZCQvo5UXXW5KlgZBa0BOQvyEOs7gF6wtZCvqTYT4BY6EPS75t1YWwG1nOXEfMoc5YEVpO6MzENLptPh2xrXgGzbEvEcYjyNwIhdr5XSuKfAQAWhUdncCUZCh35CZAYZAiKLjAmEe2KB8IewuSGa', '', 'Abraham', 'Zerna', '', '', '2015-01-06 04:53:27', '2015-01-06 04:53:27', NULL),
	(11, 17, 10203598602945933, 'CAAFZCPrKckXQBAA6WRCJPh5HZAzScoWil9I54OS3rV2qJ5TEl76av4dFN8Wrunau91zG7hvqPsqjB2erwJyyOwMXgsmfZC9vas0CcALfFi2ZC7FV8iKsgKMqNbZB9QjfEZBr7utwLOS81UrWZBDhhiryMDfhaVqxJMMxyS0hZCan9FnX63ZBi7SZBWMOpi6UzdxESWHXZAovFEA99jAIppLZCTaI', '', 'Nimrod', 'Cabanlit', '', '', '2015-01-07 09:17:55', '2015-01-07 12:30:09', NULL),
	(12, 18, 0, '', '', 'Max', 'Nocete', '1232356436', 'Daro,Dumaguete City', '2015-01-07 14:00:11', '2015-01-07 14:00:11', NULL),
	(13, 19, 0, '', '', 'Max', 'Nocete', '1232356436', 'Daro,Dumaguete City', '2015-01-07 14:02:48', '2015-01-07 14:02:48', NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.shipping_addresses
CREATE TABLE IF NOT EXISTS `shipping_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `landmark` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.shipping_addresses: ~5 rows (approximately)
/*!40000 ALTER TABLE `shipping_addresses` DISABLE KEYS */;
INSERT INTO `shipping_addresses` (`id`, `user_id`, `first_name`, `last_name`, `mobile_number`, `address`, `landmark`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(8, 1, 'Juni', 'Brosas', '09263396034', 'National Highway, Daro, Dumaguete City', '', NULL, '2014-12-22 12:01:48', '2014-12-22 12:07:30'),
	(9, 5, 'Jayde', 'Guevarra', '09066498372', 'Colon City, Cebu ', 'Near City Savings Bank', NULL, '2014-12-22 12:09:12', '2014-12-22 12:09:35'),
	(10, 13, 'Jesa', 'Brosas', '2311511235', 'Bulicon Turno, Dipolog city', '', NULL, '2014-12-31 01:15:53', '2014-12-31 01:15:53'),
	(11, 18, 'Max', 'Nocete', '1232356436', 'Daro,Dumaguete City', '', NULL, '2015-01-07 14:00:11', '2015-01-07 14:00:11'),
	(12, 19, 'Max', 'Nocete', '1232356436', 'Daro,Dumaguete City', '', NULL, '2015-01-07 14:02:48', '2015-01-07 14:02:48');
/*!40000 ALTER TABLE `shipping_addresses` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tracking_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `transaction_status_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `total_amount` decimal(9,2) NOT NULL,
  `products` text COLLATE utf8_unicode_ci NOT NULL,
  `payment_response` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.transactions: ~4 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `tracking_number`, `user_id`, `shipping_address_id`, `transaction_status_id`, `payment_method_id`, `total_amount`, `products`, `payment_response`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'NYFWPHUXAUOJEHQSLLATCXZMT', 1, 8, 1, 2, 933.78, '[2,2]', '{"id":"PAY-665442808Y145322UKSOYF3I","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","state":"approved","intent":"sale","payer":{"payment_method":"paypal","payer_info":{"email":"powerlogic1992-buyer@gmail.com","first_name":"Test","last_name":"Buyer","payer_id":"APXRU9FUWZG52","shipping_address":{"line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US","recipient_name":"Test Buyer"}}},"transactions":[{"amount":{"total":"933.78","currency":"USD","details":{"subtotal":"933.78"}},"description":"Your transaction description","item_list":{"items":[{"name":"Quis Frame","sku":"2","price":"466.89","currency":"USD","quantity":"2"}],"shipping_address":{"recipient_name":"Test Buyer","line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US"}},"related_resources":[{"sale":{"id":"233366299Y546012J","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","amount":{"total":"933.78","currency":"USD"},"payment_mode":"INSTANT_TRANSFER","state":"completed","protection_eligibility":"ELIGIBLE","protection_eligibility_type":"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE","parent_payment":"PAY-665442808Y145322UKSOYF3I","links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J","rel":"self","method":"GET"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J\\/refund","rel":"refund","method":"POST"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"parent_payment","method":"GET"}]}}]}],"links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"self","method":"GET"}]}', NULL, '2014-12-26 15:47:37', '2014-12-26 15:47:37'),
	(2, 'NYFWPHUXAUOJEHQSLLATCXZMT', 1, 8, 1, 2, 933.78, '[2,5]', '{"id":"PAY-665442808Y145322UKSOYF3I","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","state":"approved","intent":"sale","payer":{"payment_method":"paypal","payer_info":{"email":"powerlogic1992-buyer@gmail.com","first_name":"Test","last_name":"Buyer","payer_id":"APXRU9FUWZG52","shipping_address":{"line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US","recipient_name":"Test Buyer"}}},"transactions":[{"amount":{"total":"933.78","currency":"USD","details":{"subtotal":"933.78"}},"description":"Your transaction description","item_list":{"items":[{"name":"Quis Frame","sku":"2","price":"466.89","currency":"USD","quantity":"2"}],"shipping_address":{"recipient_name":"Test Buyer","line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US"}},"related_resources":[{"sale":{"id":"233366299Y546012J","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","amount":{"total":"933.78","currency":"USD"},"payment_mode":"INSTANT_TRANSFER","state":"completed","protection_eligibility":"ELIGIBLE","protection_eligibility_type":"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE","parent_payment":"PAY-665442808Y145322UKSOYF3I","links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J","rel":"self","method":"GET"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J\\/refund","rel":"refund","method":"POST"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"parent_payment","method":"GET"}]}}]}],"links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"self","method":"GET"}]}', NULL, '2014-12-26 15:47:37', '2014-12-26 15:47:37'),
	(3, 'NYFWPHUXAUOJEHQSLLATCXZMT', 1, 8, 1, 2, 933.78, '[2,5]', '{"id":"PAY-665442808Y145322UKSOYF3I","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","state":"approved","intent":"sale","payer":{"payment_method":"paypal","payer_info":{"email":"powerlogic1992-buyer@gmail.com","first_name":"Test","last_name":"Buyer","payer_id":"APXRU9FUWZG52","shipping_address":{"line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US","recipient_name":"Test Buyer"}}},"transactions":[{"amount":{"total":"933.78","currency":"USD","details":{"subtotal":"933.78"}},"description":"Your transaction description","item_list":{"items":[{"name":"Quis Frame","sku":"2","price":"466.89","currency":"USD","quantity":"2"}],"shipping_address":{"recipient_name":"Test Buyer","line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US"}},"related_resources":[{"sale":{"id":"233366299Y546012J","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","amount":{"total":"933.78","currency":"USD"},"payment_mode":"INSTANT_TRANSFER","state":"completed","protection_eligibility":"ELIGIBLE","protection_eligibility_type":"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE","parent_payment":"PAY-665442808Y145322UKSOYF3I","links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J","rel":"self","method":"GET"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J\\/refund","rel":"refund","method":"POST"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"parent_payment","method":"GET"}]}}]}],"links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"self","method":"GET"}]}', NULL, '2014-12-26 15:47:37', '2014-12-26 15:47:37'),
	(4, 'NYFWPHUXAUOJEHQSLLATCXZMT', 1, 8, 1, 2, 933.78, '[2,3]', '{"id":"PAY-665442808Y145322UKSOYF3I","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","state":"approved","intent":"sale","payer":{"payment_method":"paypal","payer_info":{"email":"powerlogic1992-buyer@gmail.com","first_name":"Test","last_name":"Buyer","payer_id":"APXRU9FUWZG52","shipping_address":{"line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US","recipient_name":"Test Buyer"}}},"transactions":[{"amount":{"total":"933.78","currency":"USD","details":{"subtotal":"933.78"}},"description":"Your transaction description","item_list":{"items":[{"name":"Quis Frame","sku":"2","price":"466.89","currency":"USD","quantity":"2"}],"shipping_address":{"recipient_name":"Test Buyer","line1":"1 Main St","city":"San Jose","state":"CA","postal_code":"95131","country_code":"US"}},"related_resources":[{"sale":{"id":"233366299Y546012J","create_time":"2014-12-26T15:46:53Z","update_time":"2014-12-26T15:47:52Z","amount":{"total":"933.78","currency":"USD"},"payment_mode":"INSTANT_TRANSFER","state":"completed","protection_eligibility":"ELIGIBLE","protection_eligibility_type":"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE","parent_payment":"PAY-665442808Y145322UKSOYF3I","links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J","rel":"self","method":"GET"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/233366299Y546012J\\/refund","rel":"refund","method":"POST"},{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"parent_payment","method":"GET"}]}}]}],"links":[{"href":"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAY-665442808Y145322UKSOYF3I","rel":"self","method":"GET"}]}', NULL, '2014-12-26 15:47:37', '2014-12-26 15:47:37');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.transaction_statuses
CREATE TABLE IF NOT EXISTS `transaction_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.transaction_statuses: ~3 rows (approximately)
/*!40000 ALTER TABLE `transaction_statuses` DISABLE KEYS */;
INSERT INTO `transaction_statuses` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'In Delivery', 'in-delivery', '2014-12-27 08:47:53', '2014-12-27 08:47:53', NULL),
	(2, 'Completed', 'completed', '2014-12-27 08:47:54', '2014-12-27 08:47:54', NULL),
	(3, 'Failed', 'failed', '2014-12-27 08:47:54', '2014-12-27 08:47:54', NULL);
/*!40000 ALTER TABLE `transaction_statuses` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.users: ~11 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `type_id`, `username`, `email`, `photo`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', 'admin@gmail.com', '', '$2y$10$IjVbkrtt88h31ZFNYDpXsus5XuWNmvKY1loBewR4d5HMHGcc3Jpiu', '33d450254053f8499427a3a3c8ac3f62', 'QnadNdUn9tysSvWuxLeTkEhNKinvw724oUSVs3W6GJeMlSO26u6SQTBJwO4F', 1, '2014-12-18 07:56:31', '2015-01-14 12:32:02'),
	(2, 2, 'ihowell', 'letitia.collier@daugherty.info', '', '$2y$10$vAmvO2nZKeej0Tsa0Ebx1eLhBrrL4U3pbNuwWKvJ97C.CAhDWNB42', 'aba9960dbf551927a0ab06b7c3a92aac', NULL, 1, '2014-12-18 07:56:31', '2014-12-18 07:56:31'),
	(3, 2, 'jconnelly', 'bschiller@cummeratadenesik.com', '', '$2y$10$zGFarJIJArQcXaWMd5mmTOzofc6PF3OFH6gGGtDPjAVIR8P.PVdaO', 'ff5869a497004e7ffb7b4643522f84f4', NULL, 1, '2014-12-18 07:56:32', '2014-12-18 07:56:32'),
	(5, 2, 'juni_brosas', 'powerlogic1992@gmail.com', '', '$2y$10$EM3ivQ3inMhTWmkicn0hC.PuDe5QVtLjq888mICb79AxGRYVzfSbW', '47e614bf93ada2191d14c087720f7315', NULL, 1, '2014-12-23 05:32:54', '2014-12-23 05:32:54'),
	(13, 2, 'bebe', 'bebe@bebe.com', '', '$2y$10$Rx1F9CLTekt6CA33dJeFIO0CxCxNQ4L0y/3WkYSaEQoH24DBrpxIi', 'd7ab0df4292fad43dc0b020a9ac19b71', NULL, 1, '2014-12-31 01:15:53', '2014-12-31 01:15:53'),
	(14, 2, 'Inuj_Sasorb', 'justignite1992@gmail.com', 'https://graph.facebook.com/976336342379361/picture?type=large', '$2y$10$RSQ8kEE95W.eEgYkPfnqXecS73cS/IUk7.nalvYb043Gn0pj3ffvO', '39f051c7c08adcc795b63e444a1a1f8e', 'CVawlYnjMDCzWjzjz5wLSDUGqmKnIZal7UAeC9nVoojp4tztUBRe6rRzlGN8', 1, '2015-01-06 04:25:57', '2015-01-12 06:26:20'),
	(15, 2, 'jaydeguevarra', 'jayde@jayde.com', '', '$2y$10$dRlRAjOjv3YYrr4bWH45L.smsAAVwNb2uDb9cBTRj3Dfhw882qzSu', '298daad9cd2cb5152774f257c19633fd', 'VCZVOg1hrzhGevN4rSSQ4VtRqfJ84GsEQIphTfH6RdDCWD7UhphUtFi1TJ7k', 1, '2015-01-06 04:45:07', '2015-01-06 04:45:45'),
	(16, 2, 'Abraham_Zerna', 'zernabobby@yahoo.com', 'https://graph.facebook.com/10203096045112700/picture?type=large', '$2y$10$kb1UNlcQRLwfqRRt0r9Qwe2OAi2K2ocduhTP80bORYmYFzqVIpNIq', '6d04b09f4246c3088b7d4394a21de4b1', NULL, 1, '2015-01-06 04:53:27', '2015-01-06 04:53:27'),
	(17, 2, 'Nimrod_Cabanlit', 'skywalker639@yahoo.com', 'https://graph.facebook.com/10203598602945933/picture?type=large', '$2y$10$yP1pIMDZrJVsClK1D12gq.qus.BXSpDQNonxJePHPixO.bhWHZKIS', '5ca734999fb16ce38bf30ae1c1dd4068', 'nUnJFOrEUGEnZRAmR0unHTyeUUz8LQdi1I20eDvS270vVt3tP3U8DTj81b8l', 1, '2015-01-07 09:17:55', '2015-01-07 13:28:26'),
	(18, 2, 'max', 'max@gmail.com', '', '$2y$10$DtRpaOu9OAV1pYXfECa0q.OOosnQK28IyOVujVFm/18/NHrz6f72.', 'c236ce68eaada625d6634cc24a96667f', NULL, 1, '2015-01-07 14:00:11', '2015-01-07 14:00:11'),
	(19, 2, 'maxnocz', 'maxnocz@gmail.com', '', '$2y$10$4Dgn/2196y.Lxry7ljd3O.90ko/j6Z8SXboVvCIXnhUyHL2qph86e', '3bb2773e8f027cf895b8428987bb17b8', NULL, 1, '2015-01-07 14:02:48', '2015-01-07 14:02:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.user_types
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.user_types: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', '', NULL, '2015-01-15 02:30:30', '2015-01-15 02:30:30'),
	(2, 'Customer', 'customer', '', NULL, '2015-01-15 02:30:30', '2015-01-15 02:30:30');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;


-- Dumping structure for table db_wallofframe.wishlists
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.wishlists: ~3 rows (approximately)
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(11, 14, 4, NULL, '2015-01-07 12:35:10', '2015-01-07 12:35:10'),
	(12, 1, 2, NULL, '2015-01-07 13:55:31', '2015-01-07 13:55:31'),
	(13, 1, 3, NULL, '2015-01-07 13:55:47', '2015-01-07 13:55:47');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
