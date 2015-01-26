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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
