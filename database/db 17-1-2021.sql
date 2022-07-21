CREATE TABLE `questions` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;


CREATE TABLE `questions_translations` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
  `language` VARCHAR(191) NOT NULL COLLATE 'utf8_unicode_ci',
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `questions_translations_question_id_foreign` (`question_id`) USING BTREE,
  CONSTRAINT `questions_translations_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;


CREATE TABLE `questions_answers` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` BIGINT(20) UNSIGNED NOT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `question_answers_question_id_foreign` (`question_id`) USING BTREE,
  CONSTRAINT `question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `question_answers_translations` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
  `language` VARCHAR(191) NOT NULL COLLATE 'utf8_unicode_ci',
  `questions_answer_id` BIGINT(20) UNSIGNED NOT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `question_answers_translations_questions_answer_id_foreign` (`questions_answer_id`) USING BTREE,
  CONSTRAINT `question_answers_translations_questions_answer_id_foreign` FOREIGN KEY (`questions_answer_id`) REFERENCES `questions_answers` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB

;

