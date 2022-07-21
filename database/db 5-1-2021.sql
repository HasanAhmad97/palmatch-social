CREATE TABLE `views` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` BIGINT(20) UNSIGNED NOT NULL,
	`viewer` BIGINT(20) UNSIGNED NOT NULL,
	`deleted_at` TIMESTAMP NULL DEFAULT NULL,
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `views_user_id_foreign` (`user_id`) USING BTREE,
	INDEX `views_viewer_foreign` (`viewer`) USING BTREE,
	CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `palmatch`.`users` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE,
	CONSTRAINT `views_viewer_foreign` FOREIGN KEY (`viewer`) REFERENCES `palmatch`.`users` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
