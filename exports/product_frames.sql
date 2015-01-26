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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_wallofframe.product_frames: ~18 rows (approximately)
/*!40000 ALTER TABLE `product_frames` DISABLE KEYS */;
INSERT INTO `product_frames` (`id`, `name`, `slug`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Frame 1', 'frame-1', '1.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 08:49:49', NULL),
	(2, 'Frame 2', 'frame-2', '2.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 11:32:35', NULL),
	(3, 'Frame 3', 'frame-3', '3.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(4, 'Frame 4', 'frame-4', '4.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(5, 'Frame 5', 'frame-5', '5.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL),
	(6, 'Frame 6', 'frame-6', '6.jpg', 1, '2015-01-15 02:57:57', '2015-01-15 02:57:57', NULL);
/*!40000 ALTER TABLE `product_frames` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
