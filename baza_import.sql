-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for prognozavrijeme
CREATE DATABASE IF NOT EXISTS `prognozavrijeme` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prognozavrijeme`;

-- Dumping structure for table prognozavrijeme.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table prognozavrijeme.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.migrations: ~7 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_100000_create_password_resets_table', 2),
	(6, '2024_01_22_193426_create_user_groups_table', 3),
	(8, '2024_01_23_154355_create_weather_forecasts_table', 4);

-- Dumping structure for table prognozavrijeme.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.password_resets: ~0 rows (approximately)

-- Dumping structure for table prognozavrijeme.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table prognozavrijeme.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table prognozavrijeme.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_group_id_foreign` (`group_id`),
  CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `user_groups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.users: ~6 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `group_id`) VALUES
	(2, 'Eglosav', 'egl.seminar@gmail.com', NULL, '$2y$12$JO61/Z2.nbdKtQAlfcjj0eEZAHuqtMXb2dYLQzY7eQGWMQM6fqARG', NULL, '2024-01-22 19:10:32', '2024-01-23 18:59:11', 1),
	(3, 'Mislavko', 'miki@gmail.com', NULL, '$2y$12$jrHSgmQIYluYgFEo2er41uwCfoOmK8c5pb.e/VQe4.pHMQf/meb8S', NULL, '2024-01-22 19:19:46', '2024-01-23 19:07:02', 1),
	(4, 'Rikardo', 'riki@gmail.com', NULL, '$2y$12$Ji8u2GUBdcetLT4ApZTcTOqURS8XTCnc.DQnPW93PKpoE1wDQrC56', NULL, '2024-01-22 19:24:16', '2024-01-23 19:04:32', 1),
	(5, 'Dokisav', 'doki@gmail.com', NULL, '$2y$12$gsxLFXh9gCoBsnG3Anf5iOlafZvmRQI3eRUFlCkpqFcgKXD0rD.lC', NULL, '2024-01-22 19:30:49', '2024-01-23 19:07:17', 2),
	(6, 'Test User', 'test@example.com', NULL, '$2y$12$AJimzi1xPEzJWggq/jWxVuMMn8NGPnXxAv1fhHGylYiPfpQhDOL2m', NULL, '2024-01-22 19:37:18', '2024-01-22 19:37:18', 2),
	(10, 'Tester', 'tester@mail.com', NULL, '$2y$12$9GkiuAof0ml8EHdKVyWpV.BVCyeu4fgpE6p2baZeH8e4C3L59ifDm', NULL, '2024-01-23 19:04:00', '2024-01-23 19:04:00', 1);

-- Dumping structure for table prognozavrijeme.user_groups
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.user_groups: ~2 rows (approximately)
REPLACE INTO `user_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2024-01-22 18:47:20', '2024-01-22 18:47:20'),
	(2, 'User', '2024-01-22 18:47:20', '2024-01-22 18:47:20');

-- Dumping structure for table prognozavrijeme.weather_forecasts
CREATE TABLE IF NOT EXISTS `weather_forecasts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` decimal(8,2) NOT NULL,
  `humidity` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prognozavrijeme.weather_forecasts: ~5 rows (approximately)
REPLACE INTO `weather_forecasts` (`id`, `city_name`, `temperature`, `humidity`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Zagreb', -545.30, 72, 'cloudly', '2024-01-23 15:42:59', '2024-01-23 18:49:17'),
	(2, 'Split', 284.21, 62, 'clear sky', '2024-01-23 15:43:17', '2024-01-23 15:43:17'),
	(3, 'Makarska', 282.47, 74, 'clear sky', '2024-01-23 15:43:38', '2024-01-23 15:43:38'),
	(4, 'Zadar', 279.49, 87, 'few clouds', '2024-01-23 15:58:42', '2024-01-23 15:58:42'),
	(5, 'Dubrovnik', 283.95, 40, 'clear sky', '2024-01-23 18:09:12', '2024-01-23 18:09:12'),
	(7, 'Vukovar', 275.02, 87, 'clear sky', '2024-01-23 18:46:17', '2024-01-23 18:46:17'),
	(9, 'Osijek', 275.16, 87, 'clear sky', '2024-01-23 19:08:13', '2024-01-23 19:08:13'),
	(10, 'Šibenik', 280.03, 84, 'clear sky', '2024-01-23 19:09:50', '2024-01-23 19:09:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
