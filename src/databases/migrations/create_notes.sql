CREATE TABLE `notes` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(100) COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `author` varchar(100) COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `rate` tinyint NOT NULL,
  `cover_link` varchar(255) COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `intro` text COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `body` text COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE='InnoDB' COLLATE 'utf8mb4_unicode_ci';