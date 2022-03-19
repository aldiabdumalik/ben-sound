-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table comprof_bensound.company_abouts: ~1 rows (approximately)
/*!40000 ALTER TABLE `company_abouts` DISABLE KEYS */;
INSERT INTO `company_abouts` (`id`, `about`, `image`, `created_at`, `updated_at`) VALUES
	(1, '<span style="color: rgb(106, 124, 146); font-family: &quot;Sofia Pro&quot;; font-size: 16px;"><b><i>Lorem ipsum </i></b>dolor sit amet, consectetur adipisicing elit. Iure ex doloremque molestiae esse porro quia delectus alias architecto ducimus modi maxime eveniet deleniti, temporibus nulla veritatis iusto quas maiores id.</span>', '1647683389.png', '2022-03-19 08:00:54', '2022-03-19 16:49:49');
/*!40000 ALTER TABLE `company_abouts` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.company_banners: ~1 rows (approximately)
/*!40000 ALTER TABLE `company_banners` DISABLE KEYS */;
INSERT INTO `company_banners` (`id`, `title`, `desc`, `img`, `yt_link`, `created_at`, `updated_at`) VALUES
	(1, 'We build and transform businesse strategy', 'Faff about only a quid blower I don\'t want no agro bleeding chim pot burke tosser cras nice one boot fanny.', 'banner.png', 'youtube.com/watch?v=b1AnskePzFc', '2022-03-19 08:00:54', '2022-03-19 16:49:04');
/*!40000 ALTER TABLE `company_banners` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.company_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `company_clients` DISABLE KEYS */;
INSERT INTO `company_clients` (`id`, `client_name`, `image`, `created_at`, `updated_at`) VALUES
	(2, 'Gojek', '1647706694.png', '2022-03-19 23:18:14', '2022-03-19 23:18:14'),
	(3, 'Grab', '1647706730.png', '2022-03-19 23:18:50', '2022-03-19 23:18:50'),
	(4, 'Shoope', '1647706763.png', '2022-03-19 23:19:23', '2022-03-19 23:19:23');
/*!40000 ALTER TABLE `company_clients` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.company_profiles: ~1 rows (approximately)
/*!40000 ALTER TABLE `company_profiles` DISABLE KEYS */;
INSERT INTO `company_profiles` (`id`, `name`, `icon`, `logo`, `address`, `facebook`, `instagram`, `linkedin`, `youtube`, `whatsapp`, `created_at`, `updated_at`) VALUES
	(1, 'Ben Sound & Production', 'company.png', '1647654623.jpg', 'Jakarta', 'facebook.com', 'instagram.com', NULL, 'youtube.com', '8123456789', '2022-03-19 08:00:54', '2022-03-19 08:50:23');
/*!40000 ALTER TABLE `company_profiles` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.contacts: ~2 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(2, 'Telp', '021xxx', '2022-03-19 09:06:44', '2022-03-19 09:06:51'),
	(3, 'Email', 'email@gmail.com', '2022-03-19 09:07:06', '2022-03-19 09:07:06');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.contact_messages: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
	(1, 'Abdu', 'emailadmin@gmail.com', 'Hai', 'a', '2022-03-19 23:07:14', '2022-03-19 23:07:14'),
	(2, 'Kiki', 'kii@gmail.com', 'Hai', 'Haloo geys', '2022-03-19 23:08:26', '2022-03-19 23:08:26');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.migrations: ~16 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(58, '2014_10_12_000000_create_users_table', 1),
	(59, '2014_10_12_100000_create_password_resets_table', 1),
	(60, '2019_08_19_000000_create_failed_jobs_table', 1),
	(61, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(62, '2022_03_12_002316_create_permission_tables', 1),
	(63, '2022_03_12_202859_create_schedules_table', 1),
	(64, '2022_03_12_203203_create_tracks_table', 1),
	(65, '2022_03_12_204319_add_image_to_tracks_table', 1),
	(66, '2022_03_13_090451_add_icon_to_tracks_table', 1),
	(67, '2022_03_15_040240_create_company_profiles_table', 1),
	(68, '2022_03_15_040714_create_contacts_table', 1),
	(69, '2022_03_15_040929_create_contact_messages_table', 1),
	(70, '2022_03_15_041015_create_company_banners_table', 1),
	(71, '2022_03_15_041031_create_company_abouts_table', 1),
	(72, '2022_03_15_041056_create_company_clients_table', 1),
	(73, '2022_03_15_041219_create_reviews_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.reviews: ~0 rows (approximately)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2022-03-19 08:00:54', '2022-03-19 08:00:54'),
	(2, 'driver', 'web', '2022-03-19 08:00:54', '2022-03-19 08:00:54'),
	(3, 'user', 'web', '2022-03-19 08:00:54', '2022-03-19 08:00:54');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.schedules: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.tracks: ~0 rows (approximately)
/*!40000 ALTER TABLE `tracks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracks` ENABLE KEYS */;

-- Dumping data for table comprof_bensound.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `gid`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Admin Ganteng', 'emailadmin@gmail.com', NULL, '$2y$10$1SEiRx0xlfm3OsFsMAy6YeR6clUsOnJXWLCOtGCh/v/H.pCZMGGDG', NULL, '2022-03-19 08:00:54', '2022-03-19 08:00:54'),
	(2, NULL, 'Driver 1', 'driver1@gmail.com', NULL, '$2y$10$mCnCAyHVBHjH9kucI19uRunBDMfEb9v6/acEfCKhVKKw6AfkN4HsW', NULL, '2022-03-19 08:00:54', '2022-03-19 08:00:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
