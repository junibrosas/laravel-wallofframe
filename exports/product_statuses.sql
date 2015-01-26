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

-- Dumping structure for table db_wallofframe.product_statuses
CREATE TABLE IF NOT EXISTS `product_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_statuses: ~4 rows (approximately)
/*!40000 ALTER TABLE `product_statuses` DISABLE KEYS */;
INSERT INTO `product_statuses` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sold Out', 'sold-out', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(2, 'Available', 'available', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(3, 'Feature', 'feature', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(4, 'New', 'new', '2014-12-18 07:56:31', '2014-12-18 07:56:31', NULL),
	(5, 'Unpublished', 'unpublished', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(6, 'Published', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `product_statuses` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
