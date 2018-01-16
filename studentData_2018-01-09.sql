# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: studentData
# Generation Time: 2018-01-09 11:17:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table academies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `academies`;

CREATE TABLE `academies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `name_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fill_out_sdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fill_out_edate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score_sdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score_edate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `academies` WRITE;
/*!40000 ALTER TABLE `academies` DISABLE KEYS */;

INSERT INTO `academies` (`id`, `year`, `name_id`, `pdf_url`, `fill_out_sdate`, `fill_out_edate`, `score_sdate`, `score_edate`, `created_at`, `updated_at`)
VALUES
	(1,107,'A','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31',NULL,NULL),
	(2,107,'B','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31',NULL,NULL),
	(3,107,'C','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31',NULL,NULL),
	(4,107,'D','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31',NULL,NULL),
	(5,107,'E','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31',NULL,NULL),
	(6,107,'F','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2018-01-04','2018-01-31','2018-01-01','2018-01-31',NULL,'2018-01-04 21:10:31'),
	(7,107,'G','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31',NULL,NULL),
	(8,107,'H','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31',NULL,NULL),
	(9,107,'I','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2018-01-05','2018-01-31',NULL,'2018-01-05 22:59:59'),
	(10,108,'A','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(11,108,'B','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(12,108,'C','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(13,108,'D','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(14,108,'E','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(15,108,'F','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(16,108,'G','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-15','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(17,108,'H','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29'),
	(18,108,'I','http://www.scu.edu.tw/entrance/anounce/107/E/E-book/700.pdf','2017-12-01','2017-12-31','2017-12-16','2017-12-31','2017-12-29 11:57:29','2017-12-29 11:57:29');

/*!40000 ALTER TABLE `academies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table academy_names
# ------------------------------------------------------------

DROP TABLE IF EXISTS `academy_names`;

CREATE TABLE `academy_names` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `academy_names` WRITE;
/*!40000 ALTER TABLE `academy_names` DISABLE KEYS */;

INSERT INTO `academy_names` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	('A','轉學考試',NULL,NULL),
	('B','轉系考試',NULL,NULL),
	('C','雙主修',NULL,NULL),
	('D','輔系',NULL,NULL),
	('E','學士後',NULL,NULL),
	('F','學程',NULL,NULL),
	('G','碩士考試',NULL,NULL),
	('H','碩士甄試',NULL,NULL),
	('I','碩士在職專班',NULL,NULL);

/*!40000 ALTER TABLE `academy_names` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table academy_teacher
# ------------------------------------------------------------

DROP TABLE IF EXISTS `academy_teacher`;

CREATE TABLE `academy_teacher` (
  `academy_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `academy_teacher_academy_id_teacher_id_index` (`academy_id`,`teacher_id`),
  CONSTRAINT `academy_teacher_academy_id_foreign` FOREIGN KEY (`academy_id`) REFERENCES `academies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `academy_teacher` WRITE;
/*!40000 ALTER TABLE `academy_teacher` DISABLE KEYS */;

INSERT INTO `academy_teacher` (`academy_id`, `teacher_id`, `created_at`, `updated_at`)
VALUES
	(4,3,NULL,NULL),
	(5,3,NULL,NULL),
	(6,3,NULL,NULL),
	(4,4,NULL,NULL),
	(5,4,NULL,NULL),
	(6,4,NULL,NULL),
	(7,4,NULL,NULL),
	(8,4,NULL,NULL),
	(9,4,NULL,NULL),
	(1,2,NULL,NULL),
	(2,2,NULL,NULL),
	(3,2,NULL,NULL),
	(6,2,NULL,NULL),
	(9,2,NULL,NULL);

/*!40000 ALTER TABLE `academy_teacher` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table academy_years
# ------------------------------------------------------------

DROP TABLE IF EXISTS `academy_years`;

CREATE TABLE `academy_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academy_years_year_unique` (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `academy_years` WRITE;
/*!40000 ALTER TABLE `academy_years` DISABLE KEYS */;

INSERT INTO `academy_years` (`id`, `year`, `created_at`, `updated_at`)
VALUES
	(1,'107',NULL,NULL);

/*!40000 ALTER TABLE `academy_years` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academy_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `academy_id`, `name`, `personal_id`, `mobile`, `email`, `pdf_path`, `transfer_grade`, `upload_time`, `created_at`, `updated_at`)
VALUES
	(9,6,'張學淵','476672','0916216703','c85645@gmail.com','public/6VD0jubhiD1ucsZHaeTneYer5IYwg660Pmph9te5.pdf',NULL,'2017-12-29 16:07:14','2017-12-29 16:07:14','2017-12-29 16:07:14'),
	(10,6,'黃閔慈','075570','0987654321','mintzuhuang@gmail.com','public/CQyVRedwFOswkTx1VdruSOBsWnsUg6KAjVOgEhPG.pdf',NULL,'2017-12-29 16:08:20','2017-12-29 16:08:20','2017-12-29 16:08:20'),
	(11,6,'胡宏林','088641','0987654321','test2@gmail.com','public/EIlsHkS3uQRaCBx82sY8vhqbJq2mp09qHPsctP4C.pdf',NULL,'2017-12-29 16:09:03','2017-12-29 16:09:03','2017-12-29 16:09:03'),
	(12,6,'陳寬瑀','729057','0987654321','test3@gmail.com','public/F86pCZ5QPlcNPOx2h9ugoLKUEURDwe9bMrT1nNaj.pdf',NULL,'2017-12-29 16:09:40','2017-12-29 16:09:40','2017-12-29 16:09:40'),
	(13,6,'簡毓漩','396645','0987654321','test4@gmail.com','public/gBXf2WUltz1SJRDdL1xwDT2WhpbdTdutRnGxyoR1.pdf',NULL,'2017-12-29 16:10:13','2017-12-29 16:10:13','2017-12-29 16:10:13'),
	(14,6,'謝宜君','327185','0987654321','test5@gmail.com','public/jLeFFqF9R1xofHhN0298PlZbA9HENJlEdEyamGqG.pdf',NULL,'2017-12-29 16:11:00','2017-12-29 16:11:00','2017-12-29 16:11:00'),
	(15,6,'不會通過人一','999001','0987654321','999001@gmail.com','public/oVth3TJP7dV5scc3ZSANmQJaAx8NEwmOmGI2nKSn.pdf',NULL,'2017-12-29 16:11:56','2017-12-29 16:11:56','2017-12-29 16:11:56'),
	(16,6,'不會通過人二','999002','098764321','999002@gmail.com','public/oxYjnPfT60eVh4qleLkF0KZZhb87PPvFDJPmF6UU.pdf',NULL,'2017-12-29 16:12:40','2017-12-29 16:12:40','2017-12-29 16:12:40'),
	(17,6,'不會通過人三','999003','0987654321','999003@gmail.com','public/REgsmrOPJt8m1aPaguPhSSYmM19Cb3vHCbwEAuYA.pdf',NULL,'2017-12-29 16:14:00','2017-12-29 16:14:00','2017-12-29 16:14:00'),
	(18,9,'張學淵','476672','0916216703','c85645@gmail.com','public/6VD0jubhiD1ucsZHaeTneYer5IYwg660Pmph9te5.pdf',NULL,'2017-12-29 16:07:14','2017-12-29 16:07:14','2017-12-29 16:07:14'),
	(19,9,'黃閔慈','075570','0987654321','mintzuhuang@gmail.com','public/CQyVRedwFOswkTx1VdruSOBsWnsUg6KAjVOgEhPG.pdf',NULL,'2017-12-29 16:08:20','2017-12-29 16:08:20','2017-12-29 16:08:20'),
	(20,9,'胡宏林','088641','0987654321','test2@gmail.com','public/EIlsHkS3uQRaCBx82sY8vhqbJq2mp09qHPsctP4C.pdf',NULL,'2017-12-29 16:09:03','2017-12-29 16:09:03','2017-12-29 16:09:03'),
	(21,9,'陳寬瑀','729057','0987654321','test3@gmail.com','public/F86pCZ5QPlcNPOx2h9ugoLKUEURDwe9bMrT1nNaj.pdf',NULL,'2017-12-29 16:09:40','2017-12-29 16:09:40','2017-12-29 16:09:40'),
	(22,9,'簡毓漩','396645','0987654321','test4@gmail.com','public/gBXf2WUltz1SJRDdL1xwDT2WhpbdTdutRnGxyoR1.pdf',NULL,'2017-12-29 16:10:13','2017-12-29 16:10:13','2017-12-29 16:10:13'),
	(23,9,'謝宜君','327185','0987654321','test5@gmail.com','public/jLeFFqF9R1xofHhN0298PlZbA9HENJlEdEyamGqG.pdf',NULL,'2017-12-29 16:11:00','2017-12-29 16:11:00','2017-12-29 16:11:00');

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table import_applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `import_applicants`;

CREATE TABLE `import_applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academy_id` int(11) DEFAULT NULL,
  `exam_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduated_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduated_department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equivalent_qualifications` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduated_school_classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pass` tinyint(1) NOT NULL DEFAULT '0',
  `import_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `import_applicants` WRITE;
/*!40000 ALTER TABLE `import_applicants` DISABLE KEYS */;

INSERT INTO `import_applicants` (`id`, `academy_id`, `exam_number`, `name`, `gender`, `graduated_school`, `graduated_department`, `equivalent_qualifications`, `identity`, `graduated_school_classification`, `birth`, `personal_id`, `address`, `mobile`, `email`, `is_pass`, `import_time`, `created_at`, `updated_at`)
VALUES
	(82,6,'EXAM_FN_107_001','張學淵','1','輔仁大學','資訊管理學系','大學','自然人','大學','1992-07-08','E124476672','新北市板橋區文化路','0916216703','c85645@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2018-01-06 17:54:43'),
	(83,6,'EXAM_FN_107_002','黃閔慈','2','東吳大學','巨量資料學系','大學','自然人','大學','1995-01-01','S261075570','台北市中正區北平東路30號7樓','0987654322','test1@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(84,6,'EXAM_FN_107_003','胡宏林','1','東吳大學','巨量資料學系','大學','自然人','大學','1995-02-08','A129088641','台北市中正區北平東路30號8樓','0987654323','test2@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(85,6,'EXAM_FN_107_004','陳寬瑀','1','東吳大學','巨量資料學系','大學','自然人','大學','1996-07-11','U122729057','台北市中正區北平東路30號9樓','0987654324','test3@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(86,6,'EXAM_FN_107_005','簡毓漩','2','東吳大學','巨量資料學系','大學','自然人','大學','1996-10-12','A290396645','台北市中正區北平東路30號10樓','0987654325','test4@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(87,6,'EXAM_FN_107_006','謝宜君','2','東吳大學','巨量資料學系','大學','自然人','大學','1996-12-13','A241327185','台北市中正區北平東路30號11樓','0987654326','test5@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(88,9,'EXAM_FN_107_001','張學淵','1','輔仁大學','資訊管理學系','大學','自然人','大學','1992-07-08','E124476672','新北市板橋區文化路','0916216703','c85645@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2018-01-06 17:46:28'),
	(89,9,'EXAM_FN_107_002','黃閔慈','2','東吳大學','巨量資料學系','大學','自然人','大學','1995-01-01','S261075570','台北市中正區北平東路30號7樓','0987654322','test1@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2018-01-06 17:47:38'),
	(90,9,'EXAM_FN_107_003','胡宏林','1','東吳大學','巨量資料學系','大學','自然人','大學','1995-02-08','A129088641','台北市中正區北平東路30號8樓','0987654323','test2@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(91,9,'EXAM_FN_107_004','陳寬瑀','1','東吳大學','巨量資料學系','大學','自然人','大學','1996-07-11','U122729057','台北市中正區北平東路30號9樓','0987654324','test3@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(92,9,'EXAM_FN_107_005','簡毓漩','2','東吳大學','巨量資料學系','大學','自然人','大學','1996-10-12','A290396645','台北市中正區北平東路30號10樓','0987654325','test4@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16'),
	(93,9,'EXAM_FN_107_006','謝宜君','2','東吳大學','巨量資料學系','大學','自然人','大學','1996-12-13','A241327185','台北市中正區北平東路30號11樓','0987654326','test5@gmail.com',0,'2017-12-29 16:15:16','2017-12-29 16:15:16','2017-12-29 16:15:16');

/*!40000 ALTER TABLE `import_applicants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `icon`, `order`, `created_at`, `updated_at`)
VALUES
	(1,0,'申請人資料管理','/studentData/admin/applicant','fa fa-file-text',1,NULL,NULL),
	(2,0,'學制管理','/studentData/admin/academy','fa fa-calendar',2,NULL,NULL),
	(3,0,'學制權限管理','/studentData/admin/academyPermission','fa fa-ban',3,NULL,NULL),
	(4,0,'考委評分管理','/studentData/admin/gradeManagement','fa fa-check-square',4,NULL,NULL);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_11_22_175752_create_menus_table',1),
	(4,'2017_11_22_180638_create_roles_table',1),
	(5,'2017_11_25_180528_create_role_user_table',1),
	(6,'2017_11_25_180556_create_role_permission_table',1),
	(7,'2017_12_02_122444_create_academies_table',1),
	(8,'2017_12_02_122516_create_applicants_table',1),
	(9,'2017_12_02_122534_create_score_item_data_table',1),
	(10,'2017_12_02_122556_create_academy_teacher_table',1),
	(11,'2017_12_02_122606_create_scores_table',1),
	(12,'2017_12_02_122630_create_import_applicants_table',1),
	(13,'2017_12_07_205609_create_academy_names_table',1),
	(14,'2017_12_16_150025_create_academy_year_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_permission`;

CREATE TABLE `role_permission` (
  `role_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `role_permission_role_id_menu_id_index` (`role_id`,`menu_id`),
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_permission` WRITE;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;

INSERT INTO `role_permission` (`role_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL),
	(1,2,NULL,NULL),
	(1,3,NULL,NULL),
	(1,4,NULL,NULL),
	(2,4,NULL,NULL),
	(2,2,NULL,NULL),
	(3,4,NULL,NULL);

/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `role_user_role_id_user_id_index` (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,NULL),
	(2,3,NULL,NULL),
	(3,2,NULL,NULL),
	(4,3,NULL,NULL);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_role_id_unique` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `role_id`, `role_name`, `created_name`, `updated_name`, `created_at`, `updated_at`)
VALUES
	(1,'administrator','最高管理員','admin','admin',NULL,NULL),
	(2,'manager','管理員','admin','admin',NULL,NULL),
	(3,'teacher','考試委員','admin','admin',NULL,NULL);

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table score_item_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `score_item_data`;

CREATE TABLE `score_item_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academy_id` int(11) NOT NULL,
  `step` int(11) NOT NULL DEFAULT '1',
  `no` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` decimal(5,0) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `score_item_data` WRITE;
/*!40000 ALTER TABLE `score_item_data` DISABLE KEYS */;

INSERT INTO `score_item_data` (`id`, `academy_id`, `step`, `no`, `name`, `percent`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,'基本資料',40,NULL,NULL),
	(2,1,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(3,1,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(4,1,1,4,'有利證照',10,NULL,NULL),
	(5,2,1,1,'基本資料',40,NULL,NULL),
	(6,2,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(7,2,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(8,2,1,4,'有利證照',10,NULL,NULL),
	(9,3,1,1,'基本資料',40,NULL,NULL),
	(10,3,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(11,3,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(12,3,1,4,'有利證照',10,NULL,NULL),
	(17,5,1,1,'基本資料',40,NULL,NULL),
	(18,5,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(19,5,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(20,5,1,4,'有利證照',10,NULL,NULL),
	(25,7,1,1,'基本資料',40,NULL,NULL),
	(26,7,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(27,7,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(28,7,1,4,'有利證照',10,NULL,NULL),
	(29,8,1,1,'基本資料',40,NULL,NULL),
	(30,8,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(31,8,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(32,8,1,4,'有利證照',10,NULL,NULL),
	(41,10,1,1,'基本資料',40,NULL,NULL),
	(42,10,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(43,10,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(44,10,1,4,'有利證照',10,NULL,NULL),
	(45,11,1,1,'基本資料',40,NULL,NULL),
	(46,11,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(47,11,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(48,11,1,4,'有利證照',10,NULL,NULL),
	(49,12,1,1,'基本資料',40,NULL,NULL),
	(50,12,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(51,12,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(52,12,1,4,'有利證照',10,NULL,NULL),
	(53,13,1,1,'基本資料',40,NULL,NULL),
	(54,13,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(55,13,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(56,13,1,4,'有利證照',10,NULL,NULL),
	(57,14,1,1,'基本資料',40,NULL,NULL),
	(58,14,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(59,14,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(60,14,1,4,'有利證照',10,NULL,NULL),
	(61,15,1,1,'基本資料',40,NULL,NULL),
	(62,15,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(63,15,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(64,15,1,4,'有利證照',10,NULL,NULL),
	(65,16,1,1,'基本資料',40,NULL,NULL),
	(66,16,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(67,16,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(68,16,1,4,'有利證照',10,NULL,NULL),
	(69,17,1,1,'基本資料',40,NULL,NULL),
	(70,17,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(71,17,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(72,17,1,4,'有利證照',10,NULL,NULL),
	(73,18,1,1,'基本資料',40,NULL,NULL),
	(74,18,1,2,'自傳與讀書計畫',30,NULL,NULL),
	(75,18,1,3,'工作與bigdata相關性',20,NULL,NULL),
	(76,18,1,4,'有利證照',10,NULL,NULL),
	(77,4,1,1,'基本資料',50,'2017-12-29 18:07:55','2017-12-29 18:07:55'),
	(78,4,1,2,'自傳與讀書計畫',20,'2017-12-29 18:07:55','2017-12-29 18:07:55'),
	(79,4,1,3,'工作與bigdata相關性',20,'2017-12-29 18:07:55','2017-12-29 18:07:55'),
	(80,4,1,4,'有利證照',10,'2017-12-29 18:07:55','2017-12-29 18:07:55'),
	(85,6,1,1,'基本資料',50,'2018-01-04 21:10:31','2018-01-04 21:10:31'),
	(86,6,1,2,'自傳與讀書計畫',20,'2018-01-04 21:10:31','2018-01-04 21:10:31'),
	(87,6,1,3,'工作與bigdata相關性',20,'2018-01-04 21:10:31','2018-01-04 21:10:31'),
	(88,6,1,4,'有利證照',10,'2018-01-04 21:10:31','2018-01-04 21:10:31'),
	(89,9,1,1,'基本資料',40,'2018-01-05 22:59:59','2018-01-05 22:59:59'),
	(90,9,1,2,'自傳與讀書計畫',30,'2018-01-05 22:59:59','2018-01-05 22:59:59'),
	(91,9,1,3,'工作與bigdata相關性',20,'2018-01-05 22:59:59','2018-01-05 22:59:59'),
	(92,9,1,4,'有利證照',10,'2018-01-05 22:59:59','2018-01-05 22:59:59');

/*!40000 ALTER TABLE `score_item_data` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `academy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `step` int(11) NOT NULL DEFAULT '1',
  `no` int(11) DEFAULT NULL,
  `score` decimal(5,0) NOT NULL DEFAULT '0',
  `score_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;

INSERT INTO `scores` (`academy_id`, `student_id`, `teacher_id`, `step`, `no`, `score`, `score_time`, `created_at`, `updated_at`)
VALUES
	(6,78,2,1,1,30,'2017-12-29 09:53:49','2017-12-29 09:53:49','2017-12-29 09:53:49'),
	(6,78,2,1,2,30,'2017-12-29 09:53:49','2017-12-29 09:53:49','2017-12-29 09:53:49'),
	(6,78,2,1,3,20,'2017-12-29 09:53:49','2017-12-29 09:53:49','2017-12-29 09:53:49'),
	(6,78,2,1,4,10,'2017-12-29 09:53:49','2017-12-29 09:53:49','2017-12-29 09:53:49'),
	(6,82,4,1,1,50,'2018-01-04 21:16:54','2018-01-04 21:16:54','2018-01-04 21:16:54'),
	(6,82,4,1,2,20,'2018-01-04 21:16:54','2018-01-04 21:16:54','2018-01-04 21:16:54'),
	(6,82,4,1,3,20,'2018-01-04 21:16:54','2018-01-04 21:16:54','2018-01-04 21:16:54'),
	(6,82,4,1,4,10,'2018-01-04 21:16:54','2018-01-04 21:16:54','2018-01-04 21:16:54'),
	(6,83,4,1,1,25,'2018-01-04 21:17:03','2018-01-04 21:17:03','2018-01-04 21:17:03'),
	(6,83,4,1,2,20,'2018-01-04 21:17:03','2018-01-04 21:17:03','2018-01-04 21:17:03'),
	(6,83,4,1,3,20,'2018-01-04 21:17:03','2018-01-04 21:17:03','2018-01-04 21:17:03'),
	(6,83,4,1,4,5,'2018-01-04 21:17:03','2018-01-04 21:17:03','2018-01-04 21:17:03'),
	(6,84,4,1,1,30,'2018-01-04 21:17:12','2018-01-04 21:17:12','2018-01-04 21:17:12'),
	(6,84,4,1,2,10,'2018-01-04 21:17:12','2018-01-04 21:17:12','2018-01-04 21:17:12'),
	(6,84,4,1,3,10,'2018-01-04 21:17:12','2018-01-04 21:17:12','2018-01-04 21:17:12'),
	(6,84,4,1,4,10,'2018-01-04 21:17:12','2018-01-04 21:17:12','2018-01-04 21:17:12'),
	(6,85,4,1,1,40,'2018-01-04 21:17:22','2018-01-04 21:17:22','2018-01-04 21:17:22'),
	(6,85,4,1,2,15,'2018-01-04 21:17:22','2018-01-04 21:17:22','2018-01-04 21:17:22'),
	(6,85,4,1,3,15,'2018-01-04 21:17:22','2018-01-04 21:17:22','2018-01-04 21:17:22'),
	(6,85,4,1,4,4,'2018-01-04 21:17:22','2018-01-04 21:17:22','2018-01-04 21:17:22'),
	(6,86,4,1,1,50,'2018-01-04 21:17:29','2018-01-04 21:17:29','2018-01-04 21:17:29'),
	(6,86,4,1,2,20,'2018-01-04 21:17:29','2018-01-04 21:17:29','2018-01-04 21:17:29'),
	(6,86,4,1,3,20,'2018-01-04 21:17:29','2018-01-04 21:17:29','2018-01-04 21:17:29'),
	(6,86,4,1,4,10,'2018-01-04 21:17:29','2018-01-04 21:17:29','2018-01-04 21:17:29'),
	(6,87,4,1,1,36,'2018-01-04 21:17:40','2018-01-04 21:17:40','2018-01-04 21:17:40'),
	(6,87,4,1,2,16,'2018-01-04 21:17:40','2018-01-04 21:17:40','2018-01-04 21:17:40'),
	(6,87,4,1,3,14,'2018-01-04 21:17:40','2018-01-04 21:17:40','2018-01-04 21:17:40'),
	(6,87,4,1,4,4,'2018-01-04 21:17:40','2018-01-04 21:17:40','2018-01-04 21:17:40'),
	(6,82,2,1,1,5,'2018-01-04 23:30:14','2018-01-04 23:30:14','2018-01-04 23:30:14'),
	(6,82,2,1,2,5,'2018-01-04 23:30:14','2018-01-04 23:30:14','2018-01-04 23:30:14'),
	(6,82,2,1,3,5,'2018-01-04 23:30:14','2018-01-04 23:30:14','2018-01-04 23:30:14'),
	(6,82,2,1,4,5,'2018-01-04 23:30:14','2018-01-04 23:30:14','2018-01-04 23:30:14'),
	(6,83,2,1,1,5,'2018-01-04 23:30:19','2018-01-04 23:30:19','2018-01-04 23:30:19'),
	(6,83,2,1,2,5,'2018-01-04 23:30:19','2018-01-04 23:30:19','2018-01-04 23:30:19'),
	(6,83,2,1,3,5,'2018-01-04 23:30:19','2018-01-04 23:30:19','2018-01-04 23:30:19'),
	(6,83,2,1,4,5,'2018-01-04 23:30:19','2018-01-04 23:30:19','2018-01-04 23:30:19'),
	(6,84,2,1,1,5,'2018-01-04 23:30:24','2018-01-04 23:30:24','2018-01-04 23:30:24'),
	(6,84,2,1,2,5,'2018-01-04 23:30:24','2018-01-04 23:30:24','2018-01-04 23:30:24'),
	(6,84,2,1,3,5,'2018-01-04 23:30:24','2018-01-04 23:30:24','2018-01-04 23:30:24'),
	(6,84,2,1,4,5,'2018-01-04 23:30:24','2018-01-04 23:30:24','2018-01-04 23:30:24'),
	(6,85,2,1,1,5,'2018-01-04 23:30:30','2018-01-04 23:30:30','2018-01-04 23:30:30'),
	(6,85,2,1,2,5,'2018-01-04 23:30:30','2018-01-04 23:30:30','2018-01-04 23:30:30'),
	(6,85,2,1,3,5,'2018-01-04 23:30:30','2018-01-04 23:30:30','2018-01-04 23:30:30'),
	(6,85,2,1,4,5,'2018-01-04 23:30:30','2018-01-04 23:30:30','2018-01-04 23:30:30'),
	(6,86,2,1,1,5,'2018-01-04 23:30:35','2018-01-04 23:30:35','2018-01-04 23:30:35'),
	(6,86,2,1,2,5,'2018-01-04 23:30:35','2018-01-04 23:30:35','2018-01-04 23:30:35'),
	(6,86,2,1,3,5,'2018-01-04 23:30:35','2018-01-04 23:30:35','2018-01-04 23:30:35'),
	(6,86,2,1,4,5,'2018-01-04 23:30:35','2018-01-04 23:30:35','2018-01-04 23:30:35'),
	(6,87,2,1,1,5,'2018-01-04 23:30:41','2018-01-04 23:30:41','2018-01-04 23:30:41'),
	(6,87,2,1,2,5,'2018-01-04 23:30:41','2018-01-04 23:30:41','2018-01-04 23:30:41'),
	(6,87,2,1,3,5,'2018-01-04 23:30:41','2018-01-04 23:30:41','2018-01-04 23:30:41'),
	(6,87,2,1,4,5,'2018-01-04 23:30:41','2018-01-04 23:30:41','2018-01-04 23:30:41'),
	(9,88,2,1,1,40,'2018-01-05 23:16:31','2018-01-05 23:16:31','2018-01-05 23:16:31'),
	(9,88,2,1,2,30,'2018-01-05 23:16:31','2018-01-05 23:16:31','2018-01-05 23:16:31'),
	(9,88,2,1,3,20,'2018-01-05 23:16:31','2018-01-05 23:16:31','2018-01-05 23:16:31'),
	(9,88,2,1,4,10,'2018-01-05 23:16:31','2018-01-05 23:16:31','2018-01-05 23:16:31'),
	(9,89,2,1,1,40,'2018-01-05 23:16:38','2018-01-05 23:16:38','2018-01-05 23:16:38'),
	(9,89,2,1,2,30,'2018-01-05 23:16:38','2018-01-05 23:16:38','2018-01-05 23:16:38'),
	(9,89,2,1,3,20,'2018-01-05 23:16:38','2018-01-05 23:16:38','2018-01-05 23:16:38'),
	(9,89,2,1,4,10,'2018-01-05 23:16:38','2018-01-05 23:16:38','2018-01-05 23:16:38'),
	(9,90,2,1,1,40,'2018-01-05 23:16:48','2018-01-05 23:16:48','2018-01-05 23:16:48'),
	(9,90,2,1,2,30,'2018-01-05 23:16:48','2018-01-05 23:16:48','2018-01-05 23:16:48'),
	(9,90,2,1,3,20,'2018-01-05 23:16:48','2018-01-05 23:16:48','2018-01-05 23:16:48'),
	(9,90,2,1,4,10,'2018-01-05 23:16:48','2018-01-05 23:16:48','2018-01-05 23:16:48'),
	(9,92,2,1,1,40,'2018-01-05 23:17:01','2018-01-05 23:17:01','2018-01-05 23:17:01'),
	(9,92,2,1,2,30,'2018-01-05 23:17:01','2018-01-05 23:17:01','2018-01-05 23:17:01'),
	(9,92,2,1,3,20,'2018-01-05 23:17:01','2018-01-05 23:17:01','2018-01-05 23:17:01'),
	(9,92,2,1,4,10,'2018-01-05 23:17:01','2018-01-05 23:17:01','2018-01-05 23:17:01'),
	(9,93,2,1,1,40,'2018-01-05 23:17:08','2018-01-05 23:17:08','2018-01-05 23:17:08'),
	(9,93,2,1,2,30,'2018-01-05 23:17:08','2018-01-05 23:17:08','2018-01-05 23:17:08'),
	(9,93,2,1,3,20,'2018-01-05 23:17:08','2018-01-05 23:17:08','2018-01-05 23:17:08'),
	(9,93,2,1,4,10,'2018-01-05 23:17:08','2018-01-05 23:17:08','2018-01-05 23:17:08'),
	(9,88,4,1,1,30,'2018-01-05 23:17:28','2018-01-05 23:17:28','2018-01-05 23:17:28'),
	(9,88,4,1,2,20,'2018-01-05 23:17:28','2018-01-05 23:17:28','2018-01-05 23:17:28'),
	(9,88,4,1,3,10,'2018-01-05 23:17:28','2018-01-05 23:17:28','2018-01-05 23:17:28'),
	(9,88,4,1,4,5,'2018-01-05 23:17:28','2018-01-05 23:17:28','2018-01-05 23:17:28'),
	(9,89,4,1,1,30,'2018-01-05 23:17:36','2018-01-05 23:17:36','2018-01-05 23:17:36'),
	(9,89,4,1,2,20,'2018-01-05 23:17:36','2018-01-05 23:17:36','2018-01-05 23:17:36'),
	(9,89,4,1,3,10,'2018-01-05 23:17:36','2018-01-05 23:17:36','2018-01-05 23:17:36'),
	(9,89,4,1,4,5,'2018-01-05 23:17:36','2018-01-05 23:17:36','2018-01-05 23:17:36'),
	(9,90,4,1,1,30,'2018-01-05 23:17:43','2018-01-05 23:17:43','2018-01-05 23:17:43'),
	(9,90,4,1,2,20,'2018-01-05 23:17:43','2018-01-05 23:17:43','2018-01-05 23:17:43'),
	(9,90,4,1,3,10,'2018-01-05 23:17:43','2018-01-05 23:17:43','2018-01-05 23:17:43'),
	(9,90,4,1,4,5,'2018-01-05 23:17:43','2018-01-05 23:17:43','2018-01-05 23:17:43'),
	(9,91,4,1,1,30,'2018-01-05 23:17:51','2018-01-05 23:17:51','2018-01-05 23:17:51'),
	(9,91,4,1,2,20,'2018-01-05 23:17:51','2018-01-05 23:17:51','2018-01-05 23:17:51'),
	(9,91,4,1,3,10,'2018-01-05 23:17:51','2018-01-05 23:17:51','2018-01-05 23:17:51'),
	(9,91,4,1,4,5,'2018-01-05 23:17:51','2018-01-05 23:17:51','2018-01-05 23:17:51'),
	(9,92,4,1,1,30,'2018-01-05 23:17:59','2018-01-05 23:17:59','2018-01-05 23:17:59'),
	(9,92,4,1,2,20,'2018-01-05 23:17:59','2018-01-05 23:17:59','2018-01-05 23:17:59'),
	(9,92,4,1,3,10,'2018-01-05 23:17:59','2018-01-05 23:17:59','2018-01-05 23:17:59'),
	(9,92,4,1,4,5,'2018-01-05 23:17:59','2018-01-05 23:17:59','2018-01-05 23:17:59'),
	(9,93,4,1,1,30,'2018-01-05 23:18:05','2018-01-05 23:18:05','2018-01-05 23:18:05'),
	(9,93,4,1,2,20,'2018-01-05 23:18:05','2018-01-05 23:18:05','2018-01-05 23:18:05'),
	(9,93,4,1,3,10,'2018-01-05 23:18:05','2018-01-05 23:18:05','2018-01-05 23:18:05'),
	(9,93,4,1,4,5,'2018-01-05 23:18:05','2018-01-05 23:18:05','2018-01-05 23:18:05'),
	(9,88,NULL,2,NULL,84,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,89,NULL,2,NULL,88,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,90,NULL,2,NULL,77,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,91,NULL,2,NULL,66,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,92,NULL,2,NULL,55,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,93,NULL,2,NULL,44,'2018-01-06 17:54:05','2018-01-06 17:54:05','2018-01-06 17:54:05'),
	(9,91,2,1,1,9,'2018-01-07 12:13:34','2018-01-07 12:13:34','2018-01-07 12:13:34'),
	(9,91,2,1,2,0,'2018-01-07 12:13:34','2018-01-07 12:13:34','2018-01-07 12:13:34'),
	(9,91,2,1,3,0,'2018-01-07 12:13:34','2018-01-07 12:13:34','2018-01-07 12:13:34'),
	(9,91,2,1,4,0,'2018-01-07 12:13:34','2018-01-07 12:13:34','2018-01-07 12:13:34');

/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_unique` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `account`, `name`, `password`, `status`, `remember_token`, `created_name`, `updated_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','傑夫','$2y$10$8XQBhda7E3b12DpaS61cQeKvc0wPtXtM3.CvlVTkvUmb4hDrGsbDK',1,NULL,'admin','admin',NULL,NULL),
	(2,'user','林老師','$2y$10$yQ1dzP4jjru7a7/q42m/Ze1BipPCsqgdAIRoOZBG2NB3xhkbfGRZK',1,'83DXZtEe9xjFGOm6VHV3gemDWPHP9O6GAYS3DTqnO3RHiq6EH8nIqTqs1mBr','admin','admin',NULL,'2018-01-05 20:34:35'),
	(3,'user2','管理員二','$2y$10$uEYOsUQCOhvkN6E5BcqEg.wZ260oUd3D1J1Fops9Ob7eVhZ1L/.7u',1,'56s9NOkJxzSVMdHP8mvtXwoMtMtmButUyRGWzKbxjJ5HFFUR2SnsVohhY21J',NULL,NULL,'2017-12-29 15:32:19','2017-12-29 15:34:21'),
	(4,'user3','張老師','$2y$10$9z6bMjTN3XqmLef5GPGohuNFb8ZVBX8bat2Lpe659Jpj22v5EA6sy',1,NULL,NULL,NULL,'2017-12-29 15:32:32','2018-01-05 20:34:42');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
