/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL-LAPTOP
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : complexdb

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 18/07/2024 11:57:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (21, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (22, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (23, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (24, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (25, '2024_07_16_104345_create_posts_table', 1);
INSERT INTO `migrations` VALUES (26, '2024_07_18_015223_create_users_role_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (1, 'App\\Models\\User', 7, 'API TOKEN', '7a339ec648688537d19609c00c04f95f53b798cc35bbf9974e1bcd1ab3679b1c', '[\"*\"]', NULL, NULL, '2024-07-18 04:27:12', '2024-07-18 04:27:12');
INSERT INTO `personal_access_tokens` VALUES (2, 'App\\Models\\User', 7, 'API Token', '200a603f8396499ce976f55ff84fc3da77f37ccd184347063920b9d5b419dcf8', '[\"*\"]', NULL, NULL, '2024-07-18 04:45:57', '2024-07-18 04:45:57');
INSERT INTO `personal_access_tokens` VALUES (3, 'App\\Models\\User', 7, 'API Token', 'b4b525b9d4f1dd8dc3e29dfc808436d0aceab3e68212594636cdb3224c36459e', '[\"*\"]', NULL, NULL, '2024-07-18 04:47:34', '2024-07-18 04:47:34');
INSERT INTO `personal_access_tokens` VALUES (4, 'App\\Models\\User', 8, 'API TOKEN', '51063a43d718cf983e248710c3de28360f896501f3e2b7a9749b4afad1160de1', '[\"*\"]', NULL, NULL, '2024-07-18 04:48:14', '2024-07-18 04:48:14');
INSERT INTO `personal_access_tokens` VALUES (5, 'App\\Models\\User', 7, 'API Token', '876c60bbcfcd07252c00fd83737709abcd26eb1da66af479b672844132d1e984', '[\"*\"]', NULL, NULL, '2024-07-18 04:48:28', '2024-07-18 04:48:28');
INSERT INTO `personal_access_tokens` VALUES (6, 'App\\Models\\User', 7, 'API Token', 'a00cf49993000ea6972df2b84deaa78b45f334f97f035470fff89590058a0bce', '[\"*\"]', NULL, NULL, '2024-07-18 04:49:11', '2024-07-18 04:49:11');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (5, 'Tes Programming', 'Membuat aplikasi', 2, '2024-07-18 02:58:16', '2024-07-18 02:58:16');
INSERT INTO `posts` VALUES (7, 'Tes Prog', 'buat query', 2, '2024-07-18 02:59:05', '2024-07-18 02:59:05');
INSERT INTO `posts` VALUES (9, 'Tes', 'Tes 2', 7, '2024-07-18 04:47:08', '2024-07-18 04:47:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin Tes', 'admintes@gmail.com', '$2y$12$14QGWgbomCqa8XMpRWqls.KmmLLqZhoAGpi/jGlslgHegn8AGqb9K', '1', '2024-07-18 02:05:22', '2024-07-18 02:05:22');
INSERT INTO `users` VALUES (2, 'Anggi Dwi', 'anggiburox@gmail.com', '$2y$12$SP4oKmpnnyZkW2zJkxZ.neCSOLh5yT0oc2mxSPeBgqMgUcKNvUGSC', '2', '2024-07-18 02:35:34', '2024-07-18 02:35:34');
INSERT INTO `users` VALUES (3, 'Agung', 'agung@gmail.com', '$2y$12$CWabTnjl28ulrWH.1jjdruyshnsdQ7ewrS85IqAyRVZXMBH6KZ.ym', '2', '2024-07-18 02:36:52', '2024-07-18 02:36:52');
INSERT INTO `users` VALUES (4, 'Dwi', 'dwi1@gmail.com', '$2y$12$mayqdTdVk15VNFgQE7cwxe0RCRy5YLtSoq0V4IMr6PR67seK8sEQG', '2', '2024-07-18 02:37:44', '2024-07-18 02:37:44');
INSERT INTO `users` VALUES (5, 'Agung1', 'agung1@gmail.com', '$2y$12$.vTm5OZt5jI8hnPIIlqx/.nqV9kPanEROkhUtqYkMNcQC3nH1mukm', '2', '2024-07-18 04:14:53', '2024-07-18 04:14:53');
INSERT INTO `users` VALUES (7, 'Bambang', 'bambang@gmail.com', '$2y$12$6lDwRkMM/ObSpOAT5UB61uinPld0.lcabYN/aAm1v4uAAUbEORhga', '2', '2024-07-18 04:27:12', '2024-07-18 04:27:12');
INSERT INTO `users` VALUES (8, 'Agus', 'agus@gmail.com', '$2y$12$wtwvcqlSeB9doCcGYMxu4..B3t8s3giHwqZrLzD7UBV6RYzJTazJ2', '2', '2024-07-18 04:48:14', '2024-07-18 04:48:14');

-- ----------------------------
-- Table structure for users_role
-- ----------------------------
DROP TABLE IF EXISTS `users_role`;
CREATE TABLE `users_role`  (
  `id_user_roles` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_roles`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_role
-- ----------------------------
INSERT INTO `users_role` VALUES (1, 'Admin', NULL, NULL);
INSERT INTO `users_role` VALUES (2, 'User', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
