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

-- Dumping structure for table elephant_society.assets
DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciation_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assets_society_id_foreign` (`society_id`),
  KEY `assets_wing_id_foreign` (`wing_id`),
  CONSTRAINT `assets_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `assets_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.assets: ~0 rows (approximately)

-- Dumping structure for table elephant_society.bookings
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `start_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `facility_id` bigint unsigned DEFAULT NULL,
  `owner_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_society_id_foreign` (`society_id`),
  KEY `bookings_facility_id_foreign` (`facility_id`),
  KEY `bookings_owner_id_foreign` (`owner_id`),
  CONSTRAINT `bookings_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookings_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bookings_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.bookings: ~0 rows (approximately)

-- Dumping structure for table elephant_society.commities
DROP TABLE IF EXISTS `commities`;
CREATE TABLE IF NOT EXISTS `commities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenure_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `owner_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commities_society_id_foreign` (`society_id`),
  KEY `commities_wing_id_foreign` (`wing_id`),
  KEY `commities_owner_id_foreign` (`owner_id`),
  CONSTRAINT `commities_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `commities_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `commities_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.commities: ~0 rows (approximately)

-- Dumping structure for table elephant_society.complaints
DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_resolution_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `owner_id` bigint unsigned DEFAULT NULL,
  `tenant_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complaints_society_id_foreign` (`society_id`),
  KEY `complaints_wing_id_foreign` (`wing_id`),
  KEY `complaints_owner_id_foreign` (`owner_id`),
  KEY `complaints_tenant_id_foreign` (`tenant_id`),
  CONSTRAINT `complaints_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `complaints_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `complaints_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `complaints_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.complaints: ~0 rows (approximately)

-- Dumping structure for table elephant_society.expenses
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `commitie_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_society_id_foreign` (`society_id`),
  KEY `expenses_wing_id_foreign` (`wing_id`),
  KEY `expenses_commitie_id_foreign` (`commitie_id`),
  CONSTRAINT `expenses_commitie_id_foreign` FOREIGN KEY (`commitie_id`) REFERENCES `commities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `expenses_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `expenses_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.expenses: ~0 rows (approximately)

-- Dumping structure for table elephant_society.facilities
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facilities_society_id_foreign` (`society_id`),
  CONSTRAINT `facilities_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.facilities: ~0 rows (approximately)

-- Dumping structure for table elephant_society.guards
DROP TABLE IF EXISTS `guards`;
CREATE TABLE IF NOT EXISTS `guards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guards_society_id_foreign` (`society_id`),
  KEY `guards_wing_id_foreign` (`wing_id`),
  CONSTRAINT `guards_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guards_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.guards: ~0 rows (approximately)

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

-- Dumping structure for table elephant_society.maintaince_templates
DROP TABLE IF EXISTS `maintaince_templates`;
CREATE TABLE IF NOT EXISTS `maintaince_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `per_sqrft_maintaince_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `per_sqrft_property_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `water_charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `electricity_charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `per_two_wheeler_charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `per_four_wheeler_charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `repair_fund` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `event_fund` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `billed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintaince_templates_society_id_foreign` (`society_id`),
  CONSTRAINT `maintaince_templates_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.maintaince_templates: ~1 rows (approximately)
INSERT INTO `maintaince_templates` (`id`, `per_sqrft_maintaince_cost`, `per_sqrft_property_tax`, `water_charges`, `electricity_charges`, `per_two_wheeler_charges`, `per_four_wheeler_charges`, `repair_fund`, `event_fund`, `billed_date`, `due_day`, `society_id`, `created_at`, `updated_at`) VALUES
	(1, '4', '2', '12200', '0', '200', '400', '0', '0', NULL, '2', 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18');

-- Dumping structure for table elephant_society.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.migrations: ~19 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(22, '2024_08_13_103156_create_societies_table', 1),
	(23, '2024_08_13_104409_create_wings_table', 1),
	(24, '2024_08_13_105922_create_owners_table', 1),
	(25, '2024_08_13_106000_create_users_table', 1),
	(26, '2024_08_13_111421_create_parkings_table', 1),
	(27, '2024_08_13_111716_create_commities_table', 1),
	(28, '2024_08_13_113058_create_complaints_table', 1),
	(29, '2024_08_13_113241_create_notices_table', 1),
	(30, '2024_08_13_113408_create_guards_table', 1),
	(31, '2024_08_13_113458_create_expenses_table', 1),
	(32, '2024_08_13_113653_create_facilities_table', 1),
	(33, '2024_08_13_113741_create_bookings_table', 1),
	(34, '2024_08_13_113852_create_assets_table', 1),
	(35, '2024_08_13_114108_create_maintaince_templates_table', 1),
	(36, '2024_08_13_120808_create_invoices_table', 1),
	(37, '2024_08_13_120816_create_visitors_table', 1),
	(38, '2024_08_19_105256_create_visitor_management_table', 1);

-- Dumping structure for table elephant_society.notices
DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_event` tinyint(1) NOT NULL DEFAULT '0',
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notices_society_id_foreign` (`society_id`),
  KEY `notices_wing_id_foreign` (`wing_id`),
  CONSTRAINT `notices_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notices_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.notices: ~0 rows (approximately)

-- Dumping structure for table elephant_society.owners
DROP TABLE IF EXISTS `owners`;
CREATE TABLE IF NOT EXISTS `owners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhaar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_sqrft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_docs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned DEFAULT NULL,
  `wing_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owners_society_id_foreign` (`society_id`),
  KEY `owners_wing_id_foreign` (`wing_id`),
  CONSTRAINT `owners_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `owners_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.owners: ~14 rows (approximately)
INSERT INTO `owners` (`id`, `name`, `email`, `phone`, `flat_no`, `adhaar`, `pan`, `agreement`, `photo`, `flat_sqrft`, `other_docs`, `society_id`, `wing_id`, `created_at`, `updated_at`) VALUES
	(1, 'Laura Kerluke', 'walker.iliana@example.com', '1-386-597-1135', '1', '103008502444', NULL, NULL, NULL, '80', NULL, 1, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(2, 'Miss Pattie Brown', 'kessler.stefan@example.org', '(425) 344-0447', '2', '234617165844', NULL, NULL, NULL, '80', NULL, 1, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(3, 'Mrs. Claudia Bashirian Jr.', 'ugrady@example.net', '+12798799738', '1', '477225896470', NULL, NULL, NULL, '80', NULL, 1, 2, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(4, 'Blaise Davis', 'vergie92@example.net', '781.655.7071', '2', '583853998808', NULL, NULL, NULL, '80', NULL, 1, 2, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(5, 'Prof. Adalberto Feeney PhD', 'flatley.vivien@example.org', '+1-209-300-3408', '3', '571550481742', NULL, NULL, NULL, '80', NULL, 1, 2, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(6, 'Cecelia Grimes IV', 'shanelle55@example.com', '1-680-626-4218', '4', '391823710353', NULL, NULL, NULL, '80', NULL, 1, 2, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(7, 'Jeramy Heathcote', 'haley.grady@example.com', '+1.936.407.3213', '1', '932798211035', NULL, NULL, NULL, '80', NULL, 1, 3, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(8, 'Elinore O\'Connell', 'ggibson@example.net', '646-723-6243', '1', '163898791973', NULL, NULL, NULL, '80', NULL, 1, 4, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(9, 'Ms. Hertha Berge DVM', 'lang.maximillia@example.net', '+1-938-547-1228', '2', '102187692534', NULL, NULL, NULL, '80', NULL, 1, 4, '2024-08-26 05:45:18', '2024-08-26 05:45:18');

-- Dumping structure for table elephant_society.parkings
DROP TABLE IF EXISTS `parkings`;
CREATE TABLE IF NOT EXISTS `parkings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_billable` tinyint(1) NOT NULL DEFAULT '0',
  `owner_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parkings_owner_id_foreign` (`owner_id`),
  CONSTRAINT `parkings_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.parkings: ~0 rows (approximately)

-- Dumping structure for table elephant_society.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table elephant_society.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table elephant_society.societies
DROP TABLE IF EXISTS `societies`;
CREATE TABLE IF NOT EXISTS `societies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `no_wings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_car_parks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bike_parks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_shops` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gardens` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renewal_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.societies: ~1 rows (approximately)
INSERT INTO `societies` (`id`, `name`, `registration_no`, `address`, `no_wings`, `no_car_parks`, `no_bike_parks`, `no_shops`, `gardens`, `logo`, `oc`, `cc`, `renewal_date`, `created_at`, `updated_at`) VALUES
	(1, 'Gokuldham Society', '123456', 'Powder Gali, Film City Road, Goregaon, Mumbai, Maharashtra', '4', '0', '10', NULL, '1', NULL, NULL, NULL, NULL, '2024-08-26 05:45:18', '2024-08-26 05:45:18');

-- Dumping structure for table elephant_society.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_google_login` tinyint(1) NOT NULL DEFAULT '0',
  `owner_id` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_owner_id_foreign` (`owner_id`),
  CONSTRAINT `users_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `gender`, `relation`, `photo`, `email_verified_at`, `is_google_login`, `owner_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Udit Takwani', 'admin@elephant-society.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'admin', NULL, NULL, NULL, '2024-08-26 05:45:18', 0, NULL, 'ODIvFbHyPy', '2024-08-26 05:45:18', '2024-08-26 05:45:18');

-- Dumping structure for table elephant_society.visitors
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` datetime NOT NULL,
  `leaving_time` datetime DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.visitors: ~0 rows (approximately)

-- Dumping structure for table elephant_society.visitor_management
DROP TABLE IF EXISTS `visitor_management`;
CREATE TABLE IF NOT EXISTS `visitor_management` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.visitor_management: ~0 rows (approximately)

-- Dumping structure for table elephant_society.wings
DROP TABLE IF EXISTS `wings`;
CREATE TABLE IF NOT EXISTS `wings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_floors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_flats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_lifts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_extinguisher_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wings_society_id_foreign` (`society_id`),
  CONSTRAINT `wings_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elephant_society.wings: ~4 rows (approximately)
INSERT INTO `wings` (`id`, `wing_name`, `no_floors`, `no_flats`, `no_lifts`, `fire_extinguisher_date`, `society_id`, `created_at`, `updated_at`) VALUES
	(1, 'A', '3', '6', NULL, NULL, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(2, 'B', '3', '6', NULL, NULL, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(3, 'C', '3', '6', NULL, NULL, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18'),
	(4, 'D', '3', '6', NULL, NULL, 1, '2024-08-26 05:45:18', '2024-08-26 05:45:18');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
