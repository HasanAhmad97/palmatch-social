

CREATE TABLE `plane_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privilege_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `plane_privileges` (`id`, `privilege_id`, `subscription_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 1, NULL, NULL, NULL),
(4, 6, 1, NULL, NULL, NULL),
(6, 1, 2, NULL, NULL, NULL),
(7, 6, 2, NULL, NULL, NULL),
(9, 1, 3, NULL, NULL, NULL),
(10, 6, 3, NULL, NULL, NULL),
(11, 1, 4, NULL, NULL, NULL),
(12, 6, 4, NULL, NULL, NULL),
(13, 1, 5, NULL, NULL, NULL),
(14, 6, 6, NULL, NULL, NULL),
(15, 5, 6, NULL, NULL, NULL),
(16, 2, 6, NULL, NULL, NULL),
(17, 2, 7, NULL, NULL, NULL),
(18, 4, 7, NULL, NULL, NULL),
(19, 2, 8, NULL, NULL, NULL),
(20, 4, 8, NULL, NULL, NULL),
(21, 2, 9, NULL, NULL, NULL),
(22, 4, 9, NULL, NULL, NULL),
(23, 2, 10, NULL, NULL, NULL),
(24, 4, 10, NULL, NULL, NULL),
(25, 2, 11, NULL, NULL, NULL),
(26, 5, 11, NULL, NULL, NULL),
(27, 2, 12, NULL, NULL, NULL),
(28, 5, 12, NULL, NULL, NULL),
(29, 2, 13, NULL, NULL, NULL),
(30, 5, 13, NULL, NULL, NULL),
(31, 2, 14, NULL, NULL, NULL),
(32, 5, 14, NULL, NULL, NULL);


ALTER TABLE `plane_privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plane_privileges_privilege_id_foreign` (`privilege_id`),
  ADD KEY `plane_privileges_subscription_id_foreign` (`subscription_id`);


ALTER TABLE `plane_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `plane_privileges`
  ADD CONSTRAINT `plane_privileges_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plane_privileges_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;



CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `privileges` (`id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '2021-01-05 11:40:30', '2021-01-05 11:40:31'),
(2, NULL, '2021-01-05 11:50:51', '2021-01-05 11:50:53'),
(3, NULL, '2021-01-05 12:13:37', '2021-01-05 12:13:38'),
(4, NULL, '2021-01-05 12:13:58', '2021-01-05 12:13:59'),
(5, NULL, '2021-01-05 12:14:02', '2021-01-05 12:14:02'),
(6, NULL, '2021-01-06 10:14:18', '2021-01-06 10:14:19');


ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


CREATE TABLE `privileges_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `privilege_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `privileges_translations` (`id`, `text`, `language`, `privilege_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Upload up to 5 pictures to your profile', 'en', 6, NULL, NULL, NULL),
(7, 'Upload up to 5 pictures to your profile', 'ar', 6, NULL, NULL, NULL),
(8, 'Upload up to 5 pictures to your profile', 'es', 6, NULL, NULL, NULL),
(9, '10 pictures upload', 'ar', 3, NULL, NULL, NULL),
(10, '10 pictures upload', 'en', 3, NULL, NULL, NULL),
(11, '10 pictures upload', 'es', 3, NULL, NULL, NULL),
(15, '15 pictures upload', 'en', 4, NULL, NULL, NULL),
(16, '15 pictures upload', 'ar', 4, NULL, NULL, NULL),
(17, '15 pictures upload', 'es', 4, NULL, NULL, NULL),
(18, 'Unlimited pictures upload', 'en', 5, NULL, NULL, NULL),
(19, 'Unlimited pictures upload', 'ar', 5, NULL, NULL, NULL),
(20, 'Unlimited pictures upload', 'es', 5, NULL, NULL, NULL),
(21, 'Send Unlimited messages to 10 new members everyday', 'en', 1, NULL, NULL, NULL),
(22, 'Send Unlimited messages to 10 new members everyday', 'es', 1, NULL, NULL, NULL),
(23, 'Send Unlimited messages to 10 new members everyday', 'ar', 1, NULL, NULL, NULL),
(24, 'Send Unlimited messages to new members everyday', 'ar', 2, NULL, NULL, NULL),
(25, 'Send Unlimited messages to new members everyday', 'es', 2, NULL, NULL, NULL),
(26, 'Send Unlimited messages to new members everyday', 'en', 2, NULL, NULL, NULL);

ALTER TABLE `privileges_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_privileges_translations_privilege_id_foreign` (`privilege_id`);

ALTER TABLE `privileges_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `privileges_translations`
  ADD CONSTRAINT `subscription_privileges_translations_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE;



ALTER TABLE `subscriptions`
  CHANGE COLUMN `duration_type` `duration_type` ENUM('month','year','week') NOT NULL COLLATE 'utf8_unicode_ci';
UPDATE `subscriptions` SET `duration_type`='week' WHERE  `id`= 1;

ALTER TABLE `social_media`
  ADD COLUMN `link` VARCHAR(255) NULL DEFAULT NULL AFTER `name`;