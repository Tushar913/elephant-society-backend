-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table elephant_society.invoices
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `maintainance_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_tax_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electricity_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintaince_template_id` bigint unsigned DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `owner_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_maintaince_template_id_foreign` (`maintaince_template_id`),
  KEY `invoices_society_id_foreign` (`society_id`),
  KEY `invoices_wing_id_foreign` (`wing_id`),
  KEY `invoices_owner_id_foreign` (`owner_id`),
  CONSTRAINT `invoices_maintaince_template_id_foreign` FOREIGN KEY (`maintaince_template_id`) REFERENCES `maintaince_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoices_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoices_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoices_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.invoices: ~9 rows (approximately)
INSERT INTO `invoices` (`id`, `maintainance_cost`, `property_tax_cost`, `water_charges`, `electricity_charges`, `vehicle_charges`, `is_paid`, `payment_mode`, `bill_month`, `bill_date`, `bill_year`, `invoice_id`, `maintaince_template_id`, `society_id`, `wing_id`, `owner_id`, `created_at`, `updated_at`) VALUES
	(1, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 1, 1, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(2, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 1, 2, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(3, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 2, 3, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(4, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 2, 4, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(5, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 2, 5, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(6, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 2, 6, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(7, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 3, 7, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(8, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 4, 8, '2024-08-26 05:45:19', '2024-08-26 05:45:19'),
	(9, '320', '160', '1355.5555555556', NULL, NULL, NULL, NULL, 'Aug', '26-08-24', '2024', NULL, 1, 1, 4, 9, '2024-08-26 05:45:19', '2024-08-26 05:45:19');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
