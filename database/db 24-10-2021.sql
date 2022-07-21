ALTER TABLE `setting_translations`
  ADD COLUMN `why_content` LONGTEXT NULL DEFAULT NULL AFTER `terms_content`,
  ADD COLUMN `how_work_content` LONGTEXT NULL DEFAULT NULL AFTER `why_content`;

ALTER TABLE `users`
  ADD COLUMN `is_publish` TINYINT(1) NOT NULL DEFAULT '0' AFTER `is_active`;