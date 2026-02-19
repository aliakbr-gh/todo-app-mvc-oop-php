-- Database backup
-- Database: todo_mvc
-- Generated at: 2026-02-19 07:30:35
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `app_logs`;
CREATE TABLE `app_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_app_logs_user_id` (`user_id`),
  KEY `idx_app_logs_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('1', NULL, '::1', 'GET', '/mvc/todos', '2026-02-18 17:52:23');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('2', NULL, '::1', 'POST', '/mvc/register', '2026-02-18 17:52:38');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('3', '1', '::1', 'POST', '/mvc/login', '2026-02-18 17:52:51');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('4', '1', '::1', 'GET', '/mvc/todos', '2026-02-18 17:52:51');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('5', NULL, '::1', 'GET', '/mvc/logout', '2026-02-18 17:53:16');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('6', NULL, '::1', 'POST', '/mvc/register', '2026-02-18 17:56:21');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('7', '2', '::1', 'POST', '/mvc/login', '2026-02-18 17:56:32');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('8', NULL, '::1', 'GET', '/mvc/logout', '2026-02-18 18:00:24');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('9', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:00:31');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('10', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:02:52');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('11', '2', '::1', 'POST', '/mvc/login', '2026-02-18 18:02:56');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('12', NULL, '::1', 'GET', '/mvc/todos', '2026-02-18 18:03:33');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('13', '2', '::1', 'POST', '/mvc/login', '2026-02-18 18:03:41');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('14', NULL, '::1', 'GET', '/mvc/todos/create', '2026-02-18 18:10:46');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('15', NULL, '::1', 'GET', '/mvc/todos', '2026-02-18 18:10:51');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('16', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:19:27');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('17', '2', '::1', 'GET', '/mvc/todos', '2026-02-18 18:19:28');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('18', NULL, '::1', 'GET', '/mvc/todos/create', '2026-02-18 18:19:38');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('19', NULL, '::1', 'GET', '/mvc/login', '2026-02-18 18:19:38');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('20', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:19:44');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('21', '2', '::1', 'GET', '/mvc/todos', '2026-02-18 18:19:44');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('22', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-18 18:19:45');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('23', NULL, '::1', 'POST', '/mvc/todos', '2026-02-18 18:19:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('24', NULL, '::1', 'GET', '/mvc/login', '2026-02-18 18:19:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('25', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:20:02');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('26', '2', '::1', 'GET', '/mvc/todos', '2026-02-18 18:20:03');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('27', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-18 18:20:04');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('28', '2', '::1', 'POST', '/mvc/todos', '2026-02-18 18:20:05');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('29', '2', '::1', 'GET', '/mvc/todos', '2026-02-18 18:20:05');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('30', NULL, '::1', 'POST', '/mvc/todos/delete', '2026-02-18 18:20:12');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('31', NULL, '::1', 'GET', '/mvc/login', '2026-02-18 18:20:12');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('32', NULL, '::1', 'POST', '/mvc/login', '2026-02-18 18:20:19');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('33', '2', '::1', 'GET', '/mvc/todos', '2026-02-18 18:20:20');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('34', NULL, '::1', 'POST', '/mvc/todos/delete', '2026-02-18 18:26:28');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('35', NULL, '::1', 'GET', '/mvc/login', '2026-02-18 18:26:28');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('36', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:38:32');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('37', NULL, '::1', 'GET', '/mvc/register', '2026-02-19 10:38:34');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('38', NULL, '::1', 'POST', '/mvc/register', '2026-02-19 10:38:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('39', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:38:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('40', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 10:38:43');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('41', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 10:38:43');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('42', NULL, '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:38:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('43', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:38:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('44', NULL, '::1', 'GET', '/mvc/logout', '2026-02-19 10:39:04');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('45', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:39:04');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('46', NULL, '::1', 'GET', '/mvc/todos', '2026-02-19 10:39:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('47', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:39:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('48', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 10:39:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('49', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 10:39:16');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('50', NULL, '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:39:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('51', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:39:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('52', NULL, '::1', 'GET', '/mvc/register', '2026-02-19 10:50:02');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('53', NULL, '::1', 'POST', '/mvc/register', '2026-02-19 10:50:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('54', NULL, '::1', 'GET', '/mvc/register', '2026-02-19 10:50:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('55', NULL, '::1', 'POST', '/mvc/register', '2026-02-19 10:50:14');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('56', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 10:50:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('57', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 10:50:19');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('58', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:50:20');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('59', '4', '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:50:21');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('60', '4', '::1', 'POST', '/mvc/todos', '2026-02-19 10:50:23');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('61', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:50:23');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('62', '4', '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:50:24');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('63', '4', '::1', 'POST', '/mvc/todos', '2026-02-19 10:50:26');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('64', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:50:26');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('65', '4', '::1', 'GET', '/mvc/todos/edit', '2026-02-19 10:50:27');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('66', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:50:29');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('67', '4', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 10:50:33');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('68', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:50:33');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('69', '4', '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:53:32');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('70', '4', '::1', 'POST', '/mvc/todos', '2026-02-19 10:53:34');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('71', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:53:34');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('72', '4', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 10:53:35');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('73', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:53:35');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('74', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:56:48');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('75', '4', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 10:56:51');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('76', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:56:51');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('77', '4', '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:57:37');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('78', '4', '::1', 'POST', '/mvc/todos', '2026-02-19 10:57:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('79', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:57:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('80', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:57:46');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('81', '4', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 10:58:40');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('82', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:58:40');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('83', '4', '::1', 'GET', '/mvc/todos/create', '2026-02-19 10:58:41');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('84', '4', '::1', 'POST', '/mvc/todos', '2026-02-19 10:58:43');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('85', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:58:43');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('86', '4', '::1', 'GET', '/mvc/todos/edit', '2026-02-19 10:58:44');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('87', '4', '::1', 'POST', '/mvc/todos/update', '2026-02-19 10:58:46');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('88', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 10:58:46');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('89', '4', '::1', 'GET', '/mvc/todos', '2026-02-19 11:04:26');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('90', '4', '::1', 'GET', '/mvc/logout', '2026-02-19 11:04:35');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('91', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 11:04:35');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('92', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 11:04:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('93', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:04:40');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('94', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:04');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('95', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:05');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('96', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:05');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('97', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:06');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('98', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:06');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('99', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:06');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('100', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:08');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('101', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:09:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('102', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('103', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('104', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:09:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('105', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('106', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:19');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('107', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:09:21');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('108', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:21');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('109', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:09:22');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('110', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:09:24');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('111', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:24');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('112', '3', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 11:09:59');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('113', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:09:59');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('114', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:16:52');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('115', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:17:44');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('116', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:17:45');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('117', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:17:52');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('118', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:17:52');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('119', '3', '::1', 'GET', '/mvc/todos/edit', '2026-02-19 11:18:16');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('120', '3', '::1', 'POST', '/mvc/todos/update', '2026-02-19 11:18:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('121', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:18:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('122', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:18:24');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('123', '3', '::1', 'POST', '/mvc/todos', '2026-02-19 11:18:37');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('124', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:18:37');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('125', '3', '::1', 'GET', '/mvc/todos/create', '2026-02-19 11:21:19');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('126', '3', '::1', 'GET', '/mvc/todos', '2026-02-19 11:21:35');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('127', NULL, '::1', 'GET', '/mvc/todos', '2026-02-19 11:49:03');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('128', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 11:49:03');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('129', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 11:49:07');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('130', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:49:08');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('131', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:50:36');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('132', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:51:58');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('133', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:53:40');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('134', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:53:50');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('135', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:53:57');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('136', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:53:58');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('137', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:54:03');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('138', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:54:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('139', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:54:25');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('140', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 11:59:01');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('141', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:01:31');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('142', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:01:39');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('143', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:01:40');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('144', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:01:53');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('145', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:02:46');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('146', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:02:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('147', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:03:17');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('148', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:05:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('149', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:05:47');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('150', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:06:05');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('151', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:06:12');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('152', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:06:13');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('153', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:07:07');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('154', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:09:02');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('155', '2', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 12:09:04');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('156', '2', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 12:09:22');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('157', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:09:22');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('158', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-19 12:14:11');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('159', '2', '::1', 'POST', '/mvc/todos', '2026-02-19 12:14:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('160', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:14:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('161', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-19 12:14:20');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('162', '2', '::1', 'POST', '/mvc/todos', '2026-02-19 12:14:23');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('163', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:14:23');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('164', '2', '::1', 'POST', '/mvc/todos/delete', '2026-02-19 12:14:26');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('165', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:14:26');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('166', '2', '::1', 'GET', '/mvc/todos/edit', '2026-02-19 12:14:27');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('167', '2', '::1', 'POST', '/mvc/todos/update', '2026-02-19 12:14:29');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('168', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:14:29');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('169', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-19 12:14:31');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('170', '2', '::1', 'POST', '/mvc/todos', '2026-02-19 12:14:36');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('171', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:14:36');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('172', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:15:10');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('173', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:15:11');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('174', '2', '::1', 'GET', '/mvc/todos/create', '2026-02-19 12:15:15');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('175', '2', '::1', 'GET', '/mvc/logout', '2026-02-19 12:15:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('176', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 12:15:18');
INSERT INTO `app_logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('177', NULL, '::1', 'GET', '/mvc/register', '2026-02-19 12:15:20');

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_logs_user_id` (`user_id`),
  KEY `idx_logs_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('1', NULL, '::1', 'GET', '/mvc/register', '2026-02-19 12:16:09');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('2', NULL, '::1', 'GET', '/mvc/todos', '2026-02-19 12:16:20');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('3', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 12:16:20');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('4', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 12:30:23');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('5', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 12:30:24');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('6', NULL, '::1', 'GET', '/mvc/admin/backup', '2026-02-19 12:30:28');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('7', NULL, '::1', 'GET', '/mvc/login', '2026-02-19 12:30:28');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('8', NULL, '::1', 'POST', '/mvc/login', '2026-02-19 12:30:32');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('9', '2', '::1', 'GET', '/mvc/todos', '2026-02-19 12:30:33');
INSERT INTO `logs` (`id`, `user_id`, `ip`, `method`, `path`, `created_at`) VALUES ('10', '2', '::1', 'GET', '/mvc/admin/backup', '2026-02-19 12:30:35');

DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('6', '4', 'saas', 'sassasa', NULL, '2026-02-19 10:58:43');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('7', '3', 'asdad', 'adaasd', NULL, '2026-02-19 11:09:10');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('8', '3', 'asdasd', 'asdasd', NULL, '2026-02-19 11:09:18');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('9', '3', 'asdasd', 'asdasd', NULL, '2026-02-19 11:09:21');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('11', '3', 'asas', 'sadasdad', NULL, '2026-02-19 11:17:52');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('12', '3', 'asad', 'asdasd', '/storage/uploads/todos/e125d1895f24c28cdce5b8da6771fdc3.png', '2026-02-19 11:18:37');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('13', '2', 'asdasdadasd', 'asdasd', NULL, '2026-02-19 12:14:15');
INSERT INTO `todos` (`id`, `user_id`, `title`, `description`, `image_path`, `created_at`) VALUES ('15', '2', 'asdasdsa', 'asdasd', '/storage/uploads/todos/712e2175791a51bd845ace5cab01581e.png', '2026-02-19 12:14:36');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','manager','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$bQq/tPR6y4jq3Remu48FY.Zz9nH6BI5oaR633l3684XYJ6AESFo2m', 'user', '2026-02-18 17:52:38');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES ('2', 'doctor', 'test@test.com', '$2y$10$Wfzf.C.wuD8u213EqVFgM.CSOigBE8Sb32xgBNkTGZGGG4.W/5wIS', 'admin', '2026-02-18 17:56:21');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES ('3', 'doctor', 'ali@ali.com', '$2y$10$cdJlSFY1iCcWPsexLOXcpOnjY9DPn4KlDTW/2PoI0gzVxV1le.Tbu', 'admin', '2026-02-19 10:38:39');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES ('4', 'asdasd', 'aliakbar.airsial@gmail.com', '$2y$10$yXRI6deiqRu4sNtB1dKu9edxvNVPMNIyUNisiL54ZuiseO6e7iu2W', 'admin', '2026-02-19 10:50:15');

SET FOREIGN_KEY_CHECKS=1;
