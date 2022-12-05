-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2021 at 09:13 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfctb`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualifications`
--

DROP TABLE IF EXISTS `academic_qualifications`;
CREATE TABLE IF NOT EXISTS `academic_qualifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `exam_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_university` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_qualifications`
--

INSERT INTO `academic_qualifications` (`id`, `user_id`, `exam_title`, `board_university`, `major`, `institute`, `result`, `passing_year`, `created_at`, `updated_at`) VALUES
(1, 1, 'Masters', 'National University', 'Accounting', 'National University', '1st Class', 2011, '2020-10-07 07:34:15', '2020-10-08 01:57:09'),
(2, 1, 'Honors', 'National University', 'Accounting', 'National University', '2nd Class', 2010, '2020-10-07 07:40:27', '2020-10-07 14:36:58'),
(3, 1, 'HSC', 'Dhaka', 'Business Studies', 'Safiuddin Sarker Academy and Collage', '4.20', 2005, '2020-10-12 15:15:15', '2020-10-12 15:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=MyISAM AUTO_INCREMENT=560 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-10-02 06:56:33', '2020-10-02 06:56:33'),
(2, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 8, 'App\\User', 1, '{\"old\": {\"name\": \"permission-delete\"}, \"attributes\": {\"name\": \"permission-deletes\"}}', '2020-10-02 06:57:13', '2020-10-02 06:57:13'),
(3, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 8, 'App\\User', 1, '{\"old\": {\"name\": \"permission-deletes\"}, \"attributes\": {\"name\": \"permission-delete\"}}', '2020-10-02 06:58:38', '2020-10-02 06:58:38'),
(4, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-10-02 06:59:19', '2020-10-02 06:59:19'),
(5, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-10-02 07:02:39', '2020-10-02 07:02:39'),
(6, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 11, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-list\"}}', '2020-10-02 08:07:23', '2020-10-02 08:07:23'),
(7, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 12, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-create\"}}', '2020-10-02 08:08:04', '2020-10-02 08:08:04'),
(8, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 13, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-edit\"}}', '2020-10-02 08:08:35', '2020-10-02 08:08:35'),
(9, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 14, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-delete\"}}', '2020-10-02 08:08:58', '2020-10-02 08:08:58'),
(10, 'Role', 'Role has been created By the User.', 'Spatie\\Permission\\Models\\Role', 4, 'App\\User', 1, '{\"attributes\": {\"name\": \"Admin\"}}', '2020-10-02 08:58:37', '2020-10-02 08:58:37'),
(11, 'User', 'User has been created By the User.', 'App\\User', 3, 'App\\User', 1, '{\"attributes\": {\"name\": \"Faizul Islam\", \"email\": \"sohelrana8206@gmail.com\"}}', '2020-10-02 09:20:03', '2020-10-02 09:20:03'),
(12, 'User', 'User has been updated By the User.', 'App\\User', 3, 'App\\User', 1, '{\"old\": {\"name\": \"Faizul Islam\"}, \"attributes\": {\"name\": \"Md. Faizul Islam\"}}', '2020-10-02 09:24:15', '2020-10-02 09:24:15'),
(13, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 15, 'App\\User', 1, '{\"attributes\": {\"name\": \"activity-log\"}}', '2020-10-02 14:00:32', '2020-10-02 14:00:32'),
(14, 'User', 'User has been created By the User.', 'App\\User', 4, NULL, NULL, '{\"attributes\": {\"name\": \"Md. Sohel Rana\", \"email\": \"sohel.rana@wub.edu.bd\"}}', '2020-10-04 08:14:27', '2020-10-04 08:14:27'),
(15, 'User', 'User has been created By the User.', 'App\\User', 5, NULL, NULL, '{\"attributes\": {\"name\": \"Md. Faizul Islam\", \"email\": \"sohel.rana1@wub.edu.bd\"}}', '2020-10-04 08:39:44', '2020-10-04 08:39:44'),
(16, 'User', 'User has been created By the User.', 'App\\User', 6, NULL, NULL, '{\"attributes\": {\"name\": \"Anisur Rahman\", \"email\": \"sohel.rana2@wub.edu.bd\"}}', '2020-10-04 08:43:07', '2020-10-04 08:43:07'),
(17, 'User', 'User has been created By the User.', 'App\\User', 7, NULL, NULL, '{\"attributes\": {\"name\": \"Taslima Khatun\", \"email\": \"sohel.rana3@wub.edu.bd\"}}', '2020-10-04 08:47:24', '2020-10-04 08:47:24'),
(18, 'User', 'User has been created By the User.', 'App\\User', 8, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohel.rana4@wub.edu.bd\"}}', '2020-10-04 08:48:40', '2020-10-04 08:48:40'),
(19, 'User', 'User has been created By the User.', 'App\\User', 9, NULL, NULL, '{\"attributes\": {\"name\": \"Maisura Ahmed\", \"email\": \"sohel.rana5@wub.edu.bd\"}}', '2020-10-04 08:52:55', '2020-10-04 08:52:55'),
(20, 'User', 'User has been updated By the User.', 'App\\User', 4, 'App\\User', 4, '{\"old\": [], \"attributes\": []}', '2020-10-04 13:21:48', '2020-10-04 13:21:48'),
(21, 'User', 'User has been updated By the User.', 'App\\User', 4, 'App\\User', 4, '{\"old\": [], \"attributes\": []}', '2020-10-04 13:21:48', '2020-10-04 13:21:48'),
(22, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-10-04 13:27:34', '2020-10-04 13:27:34'),
(23, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 16, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-user-list\"}}', '2020-10-04 14:19:42', '2020-10-04 14:19:42'),
(24, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 17, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-approve\"}}', '2020-10-04 14:27:35', '2020-10-04 14:27:35'),
(25, 'User', 'User has been created By the User.', 'App\\User', 10, 'App\\User', 1, '{\"attributes\": {\"name\": \"Md. Raju Ahmed\", \"email\": \"sohelrana82006@gmail.com\"}}', '2020-10-04 15:22:19', '2020-10-04 15:22:19'),
(26, 'User', 'User has been created By the User.', 'App\\User', 11, 'App\\User', 1, '{\"attributes\": {\"name\": \"Md. Jahid Alam\", \"email\": \"sohelrana8260@gmail.com\"}}', '2020-10-05 07:49:19', '2020-10-05 07:49:19'),
(27, 'User', 'User has been created By the User.', 'App\\User', 12, 'App\\User', 1, '{\"attributes\": {\"name\": \"Md. Hasan Ali\", \"email\": \"sohelrana82600@gmail.com\"}}', '2020-10-05 07:54:36', '2020-10-05 07:54:36'),
(28, 'User', 'User has been created By the User.', 'App\\User', 13, 'App\\User', 1, '{\"attributes\": {\"name\": \"Md. Masud Rana\", \"email\": \"masud@gmail.com\"}}', '2020-10-05 11:23:43', '2020-10-05 11:23:43'),
(29, 'User', 'User has been created By the User.', 'App\\User', 14, 'App\\User', 1, '{\"attributes\": {\"name\": \"Md. Hasinur Rahman\", \"email\": \"hasin@gmail.com\"}}', '2020-10-05 11:28:46', '2020-10-05 11:28:46'),
(30, 'User', 'User has been created By the User.', 'App\\User', 15, 'App\\User', 1, '{\"attributes\": {\"name\": \"Taslima Khatun\", \"email\": \"taslima.khatun@gmail.com\"}}', '2020-10-05 11:32:03', '2020-10-05 11:32:03'),
(31, 'User', 'User has been created By the User.', 'App\\User', 16, 'App\\User', 1, '{\"attributes\": {\"name\": \"Jannatul Mawaya\", \"email\": \"majibul.haque@science.wub.edu.bd\"}}', '2020-10-05 11:33:19', '2020-10-05 11:33:19'),
(32, 'User', 'User has been created By the User.', 'App\\User', 19, 'App\\User', 1, '{\"attributes\": {\"name\": \"Taslima Khatun\", \"email\": \"taslima.khatun@gmail.com\"}}', '2020-10-05 11:42:35', '2020-10-05 11:42:35'),
(33, 'User', 'User has been created By the User.', 'App\\User', 20, 'App\\User', 1, '{\"attributes\": {\"name\": \"Jannatul Mawaya\", \"email\": \"jamal.uddin@gmail.com\"}}', '2020-10-05 11:45:15', '2020-10-05 11:45:15'),
(34, 'User', 'User has been created By the User.', 'App\\User', 21, NULL, NULL, '{\"attributes\": {\"name\": \"Md. Khairul Islam\", \"email\": \"khairul@gmail.com\"}}', '2020-10-06 05:44:09', '2020-10-06 05:44:09'),
(35, 'User', 'User has been created By the User.', 'App\\User', 22, NULL, NULL, '{\"attributes\": {\"name\": \"Md. Alamgir Hossain\", \"email\": \"alamgir@gmail.com\"}}', '2020-10-06 05:53:40', '2020-10-06 05:53:40'),
(36, 'Personal Information', 'Personal Information has been created By the User.', 'App\\Personal_information', 2, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Nandil\", \"religion\": null, \"birth_date\": \"1975-06-26\", \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Chadpur\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-06 05:53:40', '2020-10-06 05:53:40'),
(37, 'Academic Qualification', 'Academic Qualification has been created', 'App\\Academic_qualification', 1, 'App\\User', 1, '{\"attributes\": {\"major\": \"Accounting\", \"result\": \"1st Class\", \"institute\": \"National University\", \"exam_title\": \"Masters\", \"passing_year\": 2011}}', '2020-10-07 07:34:16', '2020-10-07 07:34:16'),
(38, 'Academic Qualification', 'Academic Qualification has been created', 'App\\Academic_qualification', 2, 'App\\User', 1, '{\"attributes\": {\"major\": \"Accounting\", \"result\": \"1st Class\", \"institute\": \"National University\", \"exam_title\": \"Honors\", \"passing_year\": 2010}}', '2020-10-07 07:40:27', '2020-10-07 07:40:27'),
(39, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"mobile\": \"1676152714\", \"birth_date\": \"1980-01-01\"}, \"attributes\": {\"mobile\": \"01738451191\", \"birth_date\": \"1970-01-01\"}}', '2020-10-07 14:14:26', '2020-10-07 14:14:26'),
(40, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": {\"name\": \"Md. Sohel Rana\"}, \"attributes\": {\"name\": \"Md Sohel Rana\"}}', '2020-10-07 14:22:42', '2020-10-07 14:22:42'),
(41, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"gender\": null, \"religion\": null, \"nationality\": null, \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"permanent_address\": null}, \"attributes\": {\"gender\": \"Man\", \"religion\": \"Islam\", \"nationality\": \"Bangladeshi\", \"marital_status\": \"Married\", \"national_id_no\": \"1483607626\", \"current_location\": \"Mohammadpur\", \"permanent_address\": \"Japan Garden City, Mohammadpur\"}}', '2020-10-07 14:27:25', '2020-10-07 14:27:25'),
(42, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": {\"name\": \"Md Sohel Rana\"}, \"attributes\": {\"name\": \"Md. Sohel Rana\"}}', '2020-10-07 14:27:25', '2020-10-07 14:27:25'),
(43, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-10-07 14:29:07', '2020-10-07 14:29:07'),
(44, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"birth_date\": \"1970-01-01\"}, \"attributes\": {\"birth_date\": \"1987-11-01\"}}', '2020-10-07 14:30:27', '2020-10-07 14:30:27'),
(45, 'Academic Qualification', 'Academic Qualification has been updated', 'App\\Academic_qualification', 1, 'App\\User', 1, '{\"old\": {\"result\": \"1st Class\"}, \"attributes\": {\"result\": \"2nd Class\"}}', '2020-10-07 14:35:23', '2020-10-07 14:35:23'),
(46, 'Academic Qualification', 'Academic Qualification has been updated', 'App\\Academic_qualification', 2, 'App\\User', 1, '{\"old\": {\"result\": \"1st Class\"}, \"attributes\": {\"result\": \"2nd Class\"}}', '2020-10-07 14:36:58', '2020-10-07 14:36:58'),
(47, 'Training Information', 'Training Information has been created', 'App\\Training_information', 1, 'App\\User', 1, '{\"attributes\": {\"year\": 2013, \"topic\": \"WPSI\", \"country\": \"Bangladesh\", \"duration\": \"2 Years\", \"location\": \"Agargaw\", \"institute\": \"IDB-BISEW\", \"training_title\": \"IDB Scholarship\"}}', '2020-10-08 00:48:31', '2020-10-08 00:48:31'),
(48, 'Training Information', 'Training Information has been updated', 'App\\Training_information', 1, 'App\\User', 1, '{\"old\": {\"topic\": \"WPSI\"}, \"attributes\": {\"topic\": \"Web Present Solution and Implementation\"}}', '2020-10-08 01:11:54', '2020-10-08 01:11:54'),
(49, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"upazila\": \"Khairul\"}, \"attributes\": {\"upazila\": \"Khairul Shab\"}}', '2020-10-08 01:56:39', '2020-10-08 01:56:39'),
(50, 'Academic Qualification', 'Academic Qualification has been updated', 'App\\Academic_qualification', 1, 'App\\User', 1, '{\"old\": {\"result\": \"2nd Class\"}, \"attributes\": {\"result\": \"1st Class\"}}', '2020-10-08 01:57:09', '2020-10-08 01:57:09'),
(51, 'Special Qualification', 'Special Qualification has been created', 'App\\Special_qualification', 1, 'App\\User', 1, '{\"attributes\": {\"qualification_name\": \"Php\", \"qualification_details\": \"I am mid level php programmer.\"}}', '2020-10-08 05:58:19', '2020-10-08 05:58:19'),
(52, 'Special Qualification', 'Special Qualification has been updated', 'App\\Special_qualification', 1, 'App\\User', 1, '{\"old\": {\"qualification_name\": \"Php\", \"qualification_details\": \"I am mid level php programmer.\"}, \"attributes\": {\"qualification_name\": \"Php7\", \"qualification_details\": \"I am mid level php7 programmer.\"}}', '2020-10-08 05:59:50', '2020-10-08 05:59:50'),
(53, 'Employment History', 'Employment History has been created', 'App\\Employment_history', 1, 'App\\User', 1, '{\"attributes\": {\"end_date\": null, \"department\": \"Software\", \"start_date\": \"2014-05-05\", \"designation\": \"Programmer\", \"company_name\": \"Kakatuwa Media Ltd\", \"responsibility\": \"Maintenance Web Application\", \"company_address\": \"Dhanmondi, Dhaka\", \"company_business\": \"Kakatuwa Media Ltd\"}}', '2020-10-08 06:38:11', '2020-10-08 06:38:11'),
(54, 'Employment History', 'Employment History has been updated', 'App\\Employment_history', 1, 'App\\User', 1, '{\"old\": {\"company_address\": \"Dhanmondi, Dhaka\"}, \"attributes\": {\"company_address\": \"Dhanmondi, Dhaka -1207\"}}', '2020-10-08 06:44:58', '2020-10-08 06:44:58'),
(55, 'Professional Qualification', 'Professional Qualification has been created', 'App\\Professional_qualification', 1, 'App\\User', 1, '{\"attributes\": {\"to_date\": \"2013-09-08\", \"location\": \"Agargaw\", \"form_date\": \"2011-03-01\", \"institute\": \"IDB-BISEW\", \"certificate_name\": \"WPSI\"}}', '2020-10-08 08:10:02', '2020-10-08 08:10:02'),
(56, 'Professional Qualification', 'Professional Qualification has been updated', 'App\\Professional_qualification', 1, 'App\\User', 1, '{\"old\": {\"location\": \"Agargaw\"}, \"attributes\": {\"location\": \"Agargawn\"}}', '2020-10-08 08:11:25', '2020-10-08 08:11:25'),
(57, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"cover_image\": null}, \"attributes\": {\"cover_image\": \"public/uploads/cover-photo/thumbnail/1602235943.jpg\"}}', '2020-10-09 03:32:23', '2020-10-09 03:32:23'),
(58, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"cover_image\": null}, \"attributes\": {\"cover_image\": \"public/uploads/cover-photo/thumbnail/1602236089.jpg\"}}', '2020-10-09 03:34:49', '2020-10-09 03:34:49'),
(59, 'Personal Information', 'Personal Information has been updated', 'App\\Personal_information', 1, 'App\\User', 1, '{\"old\": {\"image\": null}, \"attributes\": {\"image\": \"public/uploads/profile-photo/thumbnail/1602236420.jpg\"}}', '2020-10-09 03:40:20', '2020-10-09 03:40:20'),
(60, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 18, 'App\\User', 1, '{\"attributes\": {\"name\": \"dashboard\"}}', '2020-10-09 06:57:36', '2020-10-09 06:57:36'),
(61, 'Role', 'Role has been created By the User.', 'Spatie\\Permission\\Models\\Role', 5, 'App\\User', 1, '{\"attributes\": {\"name\": \"Teacher\"}}', '2020-10-09 06:58:40', '2020-10-09 06:58:40'),
(62, 'Role', 'Role has been created By the User.', 'Spatie\\Permission\\Models\\Role', 6, 'App\\User', 1, '{\"attributes\": {\"name\": \"Agent\"}}', '2020-10-09 06:59:01', '2020-10-09 06:59:01'),
(63, 'Role', 'Role has been created By the User.', 'Spatie\\Permission\\Models\\Role', 7, 'App\\User', 1, '{\"attributes\": {\"name\": \"Student\"}}', '2020-10-09 06:59:29', '2020-10-09 06:59:29'),
(64, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 16, 'App\\User', 1, '{\"old\": {\"name\": \"pending-user-list\"}, \"attributes\": {\"name\": \"pending-teacher-list\"}}', '2020-10-09 08:04:28', '2020-10-09 08:04:28'),
(65, 'User', 'User has been created By the User.', 'App\\User', 23, NULL, NULL, '{\"attributes\": {\"name\": \"Faizul Islam\", \"email\": \"faizul.islam@wub.edu.bd\"}}', '2020-10-09 08:58:05', '2020-10-09 08:58:05'),
(66, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 3, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Nandil\", \"religion\": null, \"birth_date\": \"1991-06-13\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Dinajput\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-09 08:58:06', '2020-10-09 08:58:06'),
(67, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 19, 'App\\User', 1, '{\"attributes\": {\"name\": \"teacher-list\"}}', '2020-10-10 06:39:55', '2020-10-10 06:39:55'),
(68, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 20, 'App\\User', 1, '{\"attributes\": {\"name\": \"suspend-approve\"}}', '2020-10-10 07:02:21', '2020-10-10 07:02:21'),
(69, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 20, 'App\\User', 1, '{\"old\": {\"name\": \"suspend-approve\"}, \"attributes\": {\"name\": \"suspend-user\"}}', '2020-10-10 08:30:45', '2020-10-10 08:30:45'),
(70, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 21, 'App\\User', 1, '{\"attributes\": {\"name\": \"suspended-teacher-list\"}}', '2020-10-10 08:34:03', '2020-10-10 08:34:03'),
(71, 'User', 'User has been created By the User.', 'App\\User', 24, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"faiza@gmail.com\"}}', '2020-10-10 08:57:08', '2020-10-10 08:57:08'),
(72, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 4, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2001-03-10\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-10 08:57:09', '2020-10-10 08:57:09'),
(73, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 22, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-student-list\"}}', '2020-10-10 13:07:27', '2020-10-10 13:07:27'),
(74, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 23, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-list\"}}', '2020-10-10 13:07:39', '2020-10-10 13:07:39'),
(75, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 24, 'App\\User', 1, '{\"attributes\": {\"name\": \"suspended-student-list\"}}', '2020-10-10 13:07:57', '2020-10-10 13:07:57'),
(76, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 25, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-agent-list\"}}', '2020-10-10 13:18:23', '2020-10-10 13:18:23'),
(77, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 26, 'App\\User', 1, '{\"attributes\": {\"name\": \"agent-list\"}}', '2020-10-10 13:18:40', '2020-10-10 13:18:40'),
(78, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 27, 'App\\User', 1, '{\"attributes\": {\"name\": \"suspended-agent-list\"}}', '2020-10-10 13:19:03', '2020-10-10 13:19:03'),
(79, 'User', 'User has been created By the User.', 'App\\User', 25, NULL, NULL, '{\"attributes\": {\"name\": \"MD. SAIFUL ISLAM\", \"email\": \"saifulislam6414@gmail.com\"}}', '2020-10-10 13:28:00', '2020-10-10 13:28:00'),
(80, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 5, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Burichang\", \"religion\": null, \"birth_date\": \"1974-06-19\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Chadpur\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-10 13:28:00', '2020-10-10 13:28:00'),
(81, 'User', 'User has been updated By the User.', 'App\\User', 23, 'App\\User', 1, '{\"old\": {\"is_active\": 2}, \"attributes\": {\"is_active\": 1}}', '2020-10-10 13:50:55', '2020-10-10 13:50:55'),
(82, 'User', 'User has been updated By the User.', 'App\\User', 23, 'App\\User', 1, '{\"old\": {\"is_active\": 1}, \"attributes\": {\"is_active\": 2}}', '2020-10-10 13:52:12', '2020-10-10 13:52:12'),
(83, 'User', 'User has been updated By the User.', 'App\\User', 23, 'App\\User', 1, '{\"old\": {\"is_active\": 2}, \"attributes\": {\"is_active\": 1}}', '2020-10-10 14:13:39', '2020-10-10 14:13:39'),
(84, 'default', 'Look mum, I logged something', NULL, NULL, 'App\\User', 1, '[]', '2020-10-10 14:16:23', '2020-10-10 14:16:23'),
(85, 'Projects', 'The subject name is :subject.name, the causer name is Md. Sohel Rana and Laravel is awesome', 'App\\User', NULL, 'App\\User', 1, '{\"laravel\": \"awesome\"}', '2020-10-10 14:21:53', '2020-10-10 14:21:53'),
(86, 'User', 'User has been created By the User.', 'App\\User', 26, NULL, NULL, '{\"attributes\": {\"name\": \"Faizul Islam\", \"email\": \"faizul.islam@wub.edu.bd\", \"is_active\": 0}}', '2020-10-10 14:33:00', '2020-10-10 14:33:00'),
(87, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 6, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Burichang\", \"religion\": null, \"birth_date\": \"2009-12-28\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Dinajput\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-10 14:33:00', '2020-10-10 14:33:00'),
(88, 'User', 'This user is approved by the admin', 'App\\User', NULL, 'App\\User', 1, '{\"is_active\": \"1\"}', '2020-10-10 14:33:52', '2020-10-10 14:33:52'),
(89, 'User', 'User has been updated By the User.', 'App\\User', 26, 'App\\User', 1, '{\"old\": {\"is_active\": 1}, \"attributes\": {\"is_active\": 2}}', '2020-10-10 14:37:26', '2020-10-10 14:37:26'),
(90, 'User', 'User has been updated By the User.', 'App\\User', 26, 'App\\User', 1, '{\"old\": {\"is_active\": 2}, \"attributes\": {\"is_active\": 1}}', '2020-10-10 14:37:53', '2020-10-10 14:37:53'),
(91, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 28, 'App\\User', 1, '{\"attributes\": {\"name\": \"user-profile\"}}', '2020-10-12 15:10:50', '2020-10-12 15:10:50'),
(92, 'Academic Qualification', 'Academic Qualification has been created', 'App\\Academic_qualification', 3, 'App\\User', 1, '{\"attributes\": {\"major\": \"Business Studies\", \"result\": \"4.20\", \"institute\": \"Safiuddin Sarker Akademy and Collage\", \"exam_title\": \"HSC\", \"passing_year\": 2005, \"board_university\": \"Dhaka\"}}', '2020-10-12 15:15:15', '2020-10-12 15:15:15'),
(93, 'Academic Qualification', 'Academic Qualification has been updated', 'App\\Academic_qualification', 3, 'App\\User', 1, '{\"old\": {\"institute\": \"Safiuddin Sarker Akademy and Collage\"}, \"attributes\": {\"institute\": \"Safiuddin Sarker Academy and Collage\"}}', '2020-10-12 15:15:49', '2020-10-12 15:15:49'),
(94, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 29, 'App\\User', 1, '{\"attributes\": {\"name\": \"referral-package-list\"}}', '2020-10-14 12:40:27', '2020-10-14 12:40:27'),
(95, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 30, 'App\\User', 1, '{\"attributes\": {\"name\": \"referral-agent-list\"}}', '2020-10-14 12:40:42', '2020-10-14 12:40:42'),
(96, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 31, 'App\\User', 1, '{\"attributes\": {\"name\": \"referred-student-list\"}}', '2020-10-14 12:40:55', '2020-10-14 12:40:55'),
(97, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 32, 'App\\User', 1, '{\"attributes\": {\"name\": \"referral-package-create\"}}', '2020-10-14 13:19:57', '2020-10-14 13:19:57'),
(98, 'Referral Package', 'Referral Package has been created', 'App\\Referral_package', 1, 'App\\User', 1, '{\"attributes\": {\"price\": 15000, \"title\": \"Gold Package\", \"status\": 1, \"details\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"duration\": 24}}', '2020-10-14 14:30:03', '2020-10-14 14:30:03'),
(99, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 33, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-package\"}}', '2020-10-15 07:29:14', '2020-10-15 07:29:14'),
(100, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 34, 'App\\User', 1, '{\"attributes\": {\"name\": \"delete-package\"}}', '2020-10-15 07:29:25', '2020-10-15 07:29:25'),
(101, 'Referral Package', 'Referral Package has been updated', 'App\\Referral_package', 1, 'App\\User', 1, '{\"old\": {\"details\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\"}, \"attributes\": {\"details\": \"<ol>\\r\\n\\t<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\\r\\n\\t<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\\r\\n\\t<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\\r\\n\\t<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\\r\\n</ol>\"}}', '2020-10-15 08:52:16', '2020-10-15 08:52:16'),
(102, 'Referral Package', 'Referral Package has been created', 'App\\Referral_package', 2, 'App\\User', 1, '{\"attributes\": {\"price\": 10000, \"title\": \"Silver Package\", \"status\": 1, \"details\": \"<ol>\\r\\n\\t<li>The core principle in IAS 36 is that an asset must not be carried in the financial statements at more than the highest amount to be recovered through its use or sale.</li>\\r\\n\\t<li>If the carrying amount exceeds the recoverable amount, the asset is described as impaired.</li>\\r\\n\\t<li>The entity must reduce the carrying amount of the asset to its recoverable amount, and recognise an impairment loss.</li>\\r\\n</ol>\", \"duration\": 12}}', '2020-10-15 09:05:20', '2020-10-15 09:05:20'),
(103, 'Referral Package', 'Referral Package has been deleted', 'App\\Referral_package', 2, 'App\\User', 1, '{\"attributes\": {\"price\": 10000, \"title\": \"Silver Package\", \"status\": 1, \"details\": \"<ol>\\r\\n\\t<li>The core principle in IAS 36 is that an asset must not be carried in the financial statements at more than the highest amount to be recovered through its use or sale.</li>\\r\\n\\t<li>If the carrying amount exceeds the recoverable amount, the asset is described as impaired.</li>\\r\\n\\t<li>The entity must reduce the carrying amount of the asset to its recoverable amount, and recognise an impairment loss.</li>\\r\\n</ol>\", \"duration\": 12}}', '2020-10-15 09:05:38', '2020-10-15 09:05:38'),
(104, 'User', 'User has been created By the User.', 'App\\User', 27, NULL, NULL, '{\"attributes\": {\"name\": \"Md. Anisur Rahman\", \"email\": \"anis.rahman@gmail.com\", \"is_active\": 0}}', '2020-10-15 13:37:55', '2020-10-15 13:37:55'),
(105, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 7, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Muradnagar\", \"religion\": null, \"birth_date\": \"1988-06-07\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Comillah\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-15 13:37:56', '2020-10-15 13:37:56'),
(106, 'User', 'User has been updated By the User.', 'App\\User', 27, 'App\\User', 1, '{\"old\": {\"is_active\": 0}, \"attributes\": {\"is_active\": 1}}', '2020-10-15 13:39:14', '2020-10-15 13:39:14'),
(107, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 1, 'App\\User', 27, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8afe867ab23\", \"user_id\": 27, \"referral_code\": \"FTCB5f8afe867aa85\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-17 08:24:07', '2020-10-17 08:24:07'),
(108, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8b00d0d677c\", \"user_id\": 27, \"referral_code\": \"FTCB5f8b00d0eefc6\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-17 08:33:53', '2020-10-17 08:33:53'),
(109, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b00d0d677c\"}, \"attributes\": {\"tran_id\": \"5f8b0515d4c77\"}}', '2020-10-17 08:52:05', '2020-10-17 08:52:05'),
(110, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0515d4c77\"}, \"attributes\": {\"tran_id\": \"5f8b0710678d8\"}}', '2020-10-17 09:00:32', '2020-10-17 09:00:32'),
(111, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0710678d8\"}, \"attributes\": {\"tran_id\": \"5f8b0821bf09d\"}}', '2020-10-17 09:05:05', '2020-10-17 09:05:05'),
(112, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0821bf09d\"}, \"attributes\": {\"tran_id\": \"5f8b08985d493\"}}', '2020-10-17 09:07:04', '2020-10-17 09:07:04'),
(113, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b08985d493\"}, \"attributes\": {\"tran_id\": \"5f8b0b242272d\"}}', '2020-10-17 09:17:56', '2020-10-17 09:17:56'),
(114, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0b242272d\"}, \"attributes\": {\"tran_id\": \"5f8b0b64cbd45\"}}', '2020-10-17 09:19:01', '2020-10-17 09:19:01'),
(115, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0b64cbd45\"}, \"attributes\": {\"tran_id\": \"5f8b0daa3d025\"}}', '2020-10-17 09:28:42', '2020-10-17 09:28:42'),
(116, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0daa3d025\"}, \"attributes\": {\"tran_id\": \"5f8b0e108eaa1\"}}', '2020-10-17 09:30:24', '2020-10-17 09:30:24'),
(117, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 27, '{\"old\": {\"tran_id\": \"5f8b0e108eaa1\"}, \"attributes\": {\"tran_id\": \"5f8b0f77da1a0\"}}', '2020-10-17 09:36:24', '2020-10-17 09:36:24'),
(118, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 3, 'App\\User', 1, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8b5bd45e180\", \"user_id\": 1, \"referral_code\": \"FTCB5f8b5bd48962e\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-17 15:02:12', '2020-10-17 15:02:12'),
(119, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 4, 'App\\User', 1, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8b5d22a7c8f\", \"user_id\": 1, \"referral_code\": \"FTCB5f8b5d22cb624\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-17 15:07:46', '2020-10-17 15:07:46'),
(120, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 5, 'App\\User', 1, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8b5dc3eb4db\", \"user_id\": 1, \"referral_code\": \"FTCB5F8B5DC46DD51\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-17 15:10:28', '2020-10-17 15:10:28'),
(121, 'User', 'User has been created By the User.', 'App\\User', 28, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 0}}', '2020-10-18 08:30:22', '2020-10-18 08:30:22'),
(122, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 8, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2003-06-19\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 08:30:22', '2020-10-18 08:30:22'),
(123, 'User', 'User has been created By the User.', 'App\\User', 29, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 0}}', '2020-10-18 08:33:30', '2020-10-18 08:33:30'),
(124, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 9, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2005-06-07\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 08:33:30', '2020-10-18 08:33:30'),
(125, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 1, NULL, NULL, '{\"attributes\": {\"user_id\": 29, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 08:33:30', '2020-10-18 08:33:30'),
(126, 'User', 'User has been created By the User.', 'App\\User', 30, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 1}}', '2020-10-18 08:50:51', '2020-10-18 08:50:51'),
(127, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 10, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2005-02-01\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 08:50:51', '2020-10-18 08:50:51'),
(128, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 2, NULL, NULL, '{\"attributes\": {\"user_id\": 30, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 08:50:51', '2020-10-18 08:50:51'),
(129, 'User', 'User has been created By the User.', 'App\\User', 31, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 1}}', '2020-10-18 08:53:33', '2020-10-18 08:53:33'),
(130, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 11, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2005-03-02\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 08:53:33', '2020-10-18 08:53:33'),
(131, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 3, NULL, NULL, '{\"attributes\": {\"user_id\": 31, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 08:53:33', '2020-10-18 08:53:33'),
(132, 'User', 'User has been created By the User.', 'App\\User', 32, NULL, NULL, '{\"attributes\": {\"name\": \"Md.Jakir Hossain\", \"email\": \"jakir@gmail.com\", \"is_active\": 0}}', '2020-10-18 09:00:31', '2020-10-18 09:00:31'),
(133, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 12, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Nandil\", \"religion\": null, \"birth_date\": \"2017-02-10\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Chadpur\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 09:00:31', '2020-10-18 09:00:31'),
(134, 'User', 'User has been updated By the User.', 'App\\User', 32, 'App\\User', 1, '{\"old\": {\"is_active\": 0}, \"attributes\": {\"is_active\": 1}}', '2020-10-18 09:03:06', '2020-10-18 09:03:06'),
(135, 'User', 'User has been created By the User.', 'App\\User', 33, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 1}}', '2020-10-18 09:21:21', '2020-10-18 09:21:21'),
(136, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 13, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2010-02-17\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 09:21:22', '2020-10-18 09:21:22'),
(137, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 4, NULL, NULL, '{\"attributes\": {\"user_id\": 33, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 09:21:22', '2020-10-18 09:21:22'),
(138, 'User', 'User has been created By the User.', 'App\\User', 34, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 1}}', '2020-10-18 09:26:29', '2020-10-18 09:26:29'),
(139, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 14, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2010-01-19\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 09:26:29', '2020-10-18 09:26:29'),
(140, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 5, NULL, NULL, '{\"attributes\": {\"user_id\": 34, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 09:26:29', '2020-10-18 09:26:29'),
(141, 'User', 'User has been created By the User.', 'App\\User', 35, NULL, NULL, '{\"attributes\": {\"name\": \"Sidratul Muntaha Faiza\", \"email\": \"sohelrana82006@gmail.com\", \"is_active\": 1}}', '2020-10-18 09:29:43', '2020-10-18 09:29:43'),
(142, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 15, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2013-02-20\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-18 09:29:43', '2020-10-18 09:29:43'),
(143, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 6, NULL, NULL, '{\"attributes\": {\"user_id\": 35, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-18 09:29:43', '2020-10-18 09:29:43'),
(144, 'User', 'User has been created By the User.', 'App\\User', 36, NULL, NULL, '{\"attributes\": {\"name\": \"Maisura Ahmed\", \"email\": \"sohelrana820006@gmail.com\", \"is_active\": 1}}', '2020-10-19 06:18:14', '2020-10-19 06:18:14'),
(145, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 16, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2012-02-02\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-19 06:18:16', '2020-10-19 06:18:16'),
(146, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 7, NULL, NULL, '{\"attributes\": {\"user_id\": 36, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-19 06:18:16', '2020-10-19 06:18:16'),
(147, 'User', 'User has been created By the User.', 'App\\User', 37, NULL, NULL, '{\"attributes\": {\"name\": \"Hafsa Khatun\", \"email\": \"sohelrana8200006@gmail.com\", \"is_active\": 1}}', '2020-10-19 06:21:43', '2020-10-19 06:21:43'),
(148, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 17, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2011-07-06\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-19 06:21:44', '2020-10-19 06:21:44'),
(149, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 8, NULL, NULL, '{\"attributes\": {\"user_id\": 37, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-19 06:21:44', '2020-10-19 06:21:44'),
(150, 'User', 'User has been created By the User.', 'App\\User', 38, NULL, NULL, '{\"attributes\": {\"name\": \"Afnan Chowdhury\", \"email\": \"sohelrana8216@gmail.com\", \"is_active\": 1}}', '2020-10-19 06:26:30', '2020-10-19 06:26:30'),
(151, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 18, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2015-01-13\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-19 06:26:30', '2020-10-19 06:26:30'),
(152, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 9, NULL, NULL, '{\"attributes\": {\"user_id\": 38, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-19 06:26:30', '2020-10-19 06:26:30'),
(153, 'User', 'User has been created By the User.', 'App\\User', 39, NULL, NULL, '{\"attributes\": {\"name\": \"Farzan Ahmed\", \"email\": \"sohelrana8226@gmail.com\", \"is_active\": 1}}', '2020-10-19 06:34:09', '2020-10-19 06:34:09'),
(154, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 19, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1738451191\", \"upazila\": \"Burichang\", \"religion\": null, \"birth_date\": \"2001-02-13\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Chadpur\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-10-19 06:34:10', '2020-10-19 06:34:10'),
(155, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 10, NULL, NULL, '{\"attributes\": {\"user_id\": 39, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-10-19 06:34:10', '2020-10-19 06:34:10'),
(156, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 1, '{\"old\": {\"commission_rate\": 0}, \"attributes\": {\"commission_rate\": 30}}', '2020-10-19 09:06:28', '2020-10-19 09:06:28'),
(157, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 2, 'App\\User', 1, '{\"old\": {\"commission_rate\": 30}, \"attributes\": {\"commission_rate\": 25}}', '2020-10-19 09:07:28', '2020-10-19 09:07:28'),
(158, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5f8df6d892c40\", \"user_id\": 26, \"referral_code\": \"FTCB5F8DF6D8C8F96\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-10-19 14:28:09', '2020-10-19 14:28:09'),
(159, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"old\": {\"tran_id\": \"5f8df6d892c40\"}, \"attributes\": {\"tran_id\": \"5f8df706c93bf\"}}', '2020-10-19 14:28:54', '2020-10-19 14:28:54'),
(160, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 1, '{\"old\": {\"commission_rate\": 0}, \"attributes\": {\"commission_rate\": 10}}', '2020-10-22 12:48:13', '2020-10-22 12:48:13'),
(161, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 35, 'App\\User', 1, '{\"attributes\": {\"name\": \"notification-list\"}}', '2020-10-23 07:23:59', '2020-10-23 07:23:59'),
(162, 'Notification', 'Notification has been created', 'App\\Notification', 1, 'App\\User', 1, '{\"attributes\": {\"status\": 1, \"role_id\": 4, \"publish_date\": \"2020-10-23\", \"notification_title\": \"Class Time Schedule\", \"notification_details\": \"<h2>What is Lorem Ipsum?</h2>\\r\\n\\r\\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\\r\\n\\r\\n<h2>Why do we use it?</h2>\\r\\n\\r\\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\"}}', '2020-10-23 08:09:21', '2020-10-23 08:09:21');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(163, 'Notification', 'Notification has been created', 'App\\Notification', 2, 'App\\User', 1, '{\"attributes\": {\"status\": 1, \"role_id\": 5, \"publish_date\": \"2020-10-23\", \"notification_title\": \"Class Time Schedule\", \"notification_details\": \"<h2>What is Lorem Ipsum?</h2>\\r\\n\\r\\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\\r\\n\\r\\n<h2>Why do we use it?</h2>\\r\\n\\r\\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\"}}', '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(164, 'Notification', 'Notification has been created', 'App\\Notification', 3, 'App\\User', 1, '{\"attributes\": {\"status\": 1, \"role_id\": 6, \"publish_date\": \"2020-10-23\", \"notification_title\": \"Class Time Schedule\", \"notification_details\": \"<h2>What is Lorem Ipsum?</h2>\\r\\n\\r\\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\\r\\n\\r\\n<h2>Why do we use it?</h2>\\r\\n\\r\\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\"}}', '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(165, 'Notification', 'Notification has been created', 'App\\Notification', 4, 'App\\User', 1, '{\"attributes\": {\"status\": 1, \"role_id\": 7, \"publish_date\": \"2020-10-23\", \"notification_title\": \"Class Time Schedule\", \"notification_details\": \"<h2>What is Lorem Ipsum?</h2>\\r\\n\\r\\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\\r\\n\\r\\n<h2>Why do we use it?</h2>\\r\\n\\r\\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\"}}', '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(166, 'Notification', 'Notification has been created', 'App\\Notification', 5, 'App\\User', 1, '{\"attributes\": {\"status\": 1, \"role_id\": \"4,5,6,7\", \"publish_date\": \"2020-10-23\", \"notification_title\": \"Class Time Re-schedule\", \"notification_details\": \"<h2>What is Lorem Ipsum?</h2>\\r\\n\\r\\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\"}}', '2020-10-23 08:47:45', '2020-10-23 08:47:45'),
(167, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 36, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-notification\"}}', '2020-10-23 09:01:01', '2020-10-23 09:01:01'),
(168, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 37, 'App\\User', 1, '{\"attributes\": {\"name\": \"close-notification\"}}', '2020-10-23 09:01:16', '2020-10-23 09:01:16'),
(169, 'Notification', 'Notification has been updated', 'App\\Notification', 5, 'App\\User', 1, '{\"old\": {\"role_id\": \"4,5,6,7\"}, \"attributes\": {\"role_id\": \"4,5,6\"}}', '2020-10-23 09:26:01', '2020-10-23 09:26:01'),
(170, 'Notification', 'Notification has been updated', 'App\\Notification', 1, 'App\\User', 1, '{\"old\": {\"status\": 1}, \"attributes\": {\"status\": 0}}', '2020-10-23 09:36:37', '2020-10-23 09:36:37'),
(171, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 38, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-primary-category-list\"}}', '2020-10-26 09:00:33', '2020-10-26 09:00:33'),
(172, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 39, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-secondary-category-list\"}}', '2020-10-26 09:00:50', '2020-10-26 09:00:50'),
(173, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 40, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-sub-category-list\"}}', '2020-10-26 09:01:07', '2020-10-26 09:01:07'),
(174, 'Course Primary Category', ' Primary Category has been created', 'App\\Course_primary_category', 1, 'App\\User', 1, '{\"attributes\": {\"primary_category_name\": \"Academic\"}}', '2020-10-26 09:41:13', '2020-10-26 09:41:13'),
(175, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 41, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-primary-category\"}}', '2020-10-26 09:41:59', '2020-10-26 09:41:59'),
(176, 'Course Primary Category', ' Primary Category has been updated', 'App\\Course_primary_category', 1, 'App\\User', 1, '{\"old\": {\"primary_category_name\": \"Academic\"}, \"attributes\": {\"primary_category_name\": \"Academic Course\"}}', '2020-10-26 09:42:44', '2020-10-26 09:42:44'),
(177, 'Course Primary Category', ' Primary Category has been created', 'App\\Course_primary_category', 2, 'App\\User', 1, '{\"attributes\": {\"primary_category_name\": \"Professional Course\"}}', '2020-10-26 09:43:16', '2020-10-26 09:43:16'),
(178, 'Course Secondary Category', 'Course Secondary Category has been created', 'App\\Course_secondary_category', 1, 'App\\User', 1, '{\"attributes\": {\"secondary_category_name\": \"Class One\", \"course_primary_category_id\": 1}}', '2020-10-26 13:38:56', '2020-10-26 13:38:56'),
(179, 'Course Secondary Category', 'Course Secondary Category has been updated', 'App\\Course_secondary_category', 1, 'App\\User', 1, '{\"old\": {\"secondary_category_name\": \"Class One\"}, \"attributes\": {\"secondary_category_name\": \"Class Five\"}}', '2020-10-26 13:40:06', '2020-10-26 13:40:06'),
(180, 'Course Secondary Category', 'Course Secondary Category has been created', 'App\\Course_secondary_category', 2, 'App\\User', 1, '{\"attributes\": {\"secondary_category_name\": \"Software Development\", \"course_primary_category_id\": 2}}', '2020-10-26 13:41:34', '2020-10-26 13:41:34'),
(181, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 42, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-secondary-category\"}}', '2020-10-26 13:55:11', '2020-10-26 13:55:11'),
(182, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 43, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-Sub-category\"}}', '2020-10-26 13:55:28', '2020-10-26 13:55:28'),
(183, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 1, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"Math\", \"course_secondary_category_id\": 1}}', '2020-10-26 14:04:15', '2020-10-26 14:04:15'),
(184, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 2, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"Html\", \"course_secondary_category_id\": 2}}', '2020-10-26 14:28:33', '2020-10-26 14:28:33'),
(185, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 44, 'App\\User', 1, '{\"attributes\": {\"name\": \"institutionType\"}}', '2020-10-27 09:29:15', '2020-10-27 09:29:15'),
(186, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 44, 'App\\User', 1, '{\"old\": {\"name\": \"institutionType\"}, \"attributes\": {\"name\": \"institution-type-list\"}}', '2020-10-27 09:29:35', '2020-10-27 09:29:35'),
(187, 'Institution Type', 'Institution Type has been created', 'App\\Institution_type', 1, 'App\\User', 1, '{\"attributes\": {\"institution_type_name\": \"Bangla Version\"}}', '2020-10-27 09:45:02', '2020-10-27 09:45:02'),
(188, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 45, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-institution-type\"}}', '2020-10-27 13:14:59', '2020-10-27 13:14:59'),
(189, 'Institution Type', 'Institution Type has been updated', 'App\\Institution_type', 1, 'App\\User', 1, '{\"old\": {\"institution_type_name\": \"Bangla Version\"}, \"attributes\": {\"institution_type_name\": \"English Version\"}}', '2020-10-27 13:36:30', '2020-10-27 13:36:30'),
(190, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 46, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-list\"}}', '2020-10-28 10:33:14', '2020-10-28 10:33:14'),
(191, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 47, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course\"}}', '2020-10-28 12:50:00', '2020-10-28 12:50:00'),
(192, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 48, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-create\"}}', '2020-10-28 12:53:22', '2020-10-28 12:53:22'),
(193, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 49, 'App\\User', 1, '{\"attributes\": {\"name\": \"view-course\"}}', '2020-10-28 12:58:24', '2020-10-28 12:58:24'),
(194, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 50, 'App\\User', 1, '{\"attributes\": {\"name\": \"delete-course\"}}', '2020-10-28 12:58:39', '2020-10-28 12:58:39'),
(195, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 51, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-cost\"}}', '2020-10-28 12:59:07', '2020-10-28 12:59:07'),
(196, 'Course', 'Course has been created', 'App\\Course', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_image\": \"public/uploads/course-photo/thumbnail/1603986199.jpg\", \"course_title\": \"Certificate course on “New VAT Act 2012 & Customs Management’’ (10 Days Evening)\", \"course_benefit\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_content\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\\r\\n\\r\\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_details\": \"<ul>\\r\\n\\t<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\\r\\n\\t<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\\r\\n\\t<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\\r\\n\\t<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\\r\\n</ul>\", \"course_duration\": \"15 Days\", \"course_component\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\\r\\n\\r\\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\\r\\n\\r\\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_sub_title\": \"Certificate course on “New VAT Act 2012 & Customs Management’’\", \"course_requirement\": \"<ol>\\r\\n\\t<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\\r\\n\\t<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\\r\\n\\t<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\\r\\n\\t<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\\r\\n</ol>\", \"is_course_verified\": 0, \"institution_type_id\": 1, \"course_sub_category_id\": 1}}', '2020-10-29 09:43:19', '2020-10-29 09:43:19'),
(197, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 52, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-cost\"}}', '2020-10-30 00:54:58', '2020-10-30 00:54:58'),
(198, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 1, 'App\\User', 26, '{\"attributes\": {\"course_id\": 1, \"course_fee\": 15000, \"course_discount_rate\": 15, \"course_discounted_cost\": 12750, \"course_registration_last_date\": \"2020-11-07\"}}', '2020-10-30 07:20:42', '2020-10-30 07:20:42'),
(199, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 2, 'App\\User', 26, '{\"attributes\": {\"course_id\": 1, \"course_fee\": 17000, \"course_discount_rate\": 0, \"course_discounted_cost\": 17000, \"course_registration_last_date\": \"1970-01-01\"}}', '2020-10-30 07:25:51', '2020-10-30 07:25:51'),
(200, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 3, 'App\\User', 26, '{\"attributes\": {\"course_id\": 1, \"course_fee\": 20000, \"course_discount_rate\": 0, \"course_discounted_cost\": 20000, \"course_registration_last_date\": \"0000-00-00\"}}', '2020-10-30 07:35:00', '2020-10-30 07:35:00'),
(201, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 4, 'App\\User', 26, '{\"attributes\": {\"course_id\": 1, \"course_fee\": 12000, \"course_discount_rate\": 0, \"course_discounted_cost\": 12000, \"course_registration_last_date\": \"0000-00-00\"}}', '2020-10-30 07:36:45', '2020-10-30 07:36:45'),
(202, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 5, 'App\\User', 26, '{\"attributes\": {\"course_id\": 1, \"course_fee\": 10000, \"course_discount_rate\": 0, \"course_discounted_cost\": 10000, \"course_registration_last_date\": \"0000-00-00\"}}', '2020-10-30 07:43:20', '2020-10-30 07:43:20'),
(203, 'Course Cost', 'Course Cost has been updated', 'App\\Course_cost', 5, 'App\\User', 26, '{\"old\": {\"course_discount_rate\": 0, \"course_discounted_cost\": 10000, \"course_registration_last_date\": \"0000-00-00\"}, \"attributes\": {\"course_discount_rate\": 12, \"course_discounted_cost\": 8800, \"course_registration_last_date\": \"2020-11-25\"}}', '2020-10-30 08:15:50', '2020-10-30 08:15:50'),
(204, 'Course', 'Course has been created', 'App\\Course', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_image\": \"public/uploads/course-photo/thumbnail/1604069157.jpg\", \"course_title\": \"Certificate Course on “Banking, L/C, Customs & Shipping Procedures of Export-Import Business”(6 Days Evening)\", \"course_benefit\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"course_content\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"course_details\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"course_duration\": \"15 Days\", \"course_component\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"course_sub_title\": \"Certificate Course on “Banking, L/C, Customs & Shipping Procedures of Export-Import Business”\", \"course_requirement\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"is_course_verified\": 0, \"institution_type_id\": 1, \"course_sub_category_id\": 2}}', '2020-10-30 08:45:58', '2020-10-30 08:45:58'),
(205, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 6, 'App\\User', 26, '{\"attributes\": {\"course_id\": 2, \"course_fee\": 20000, \"course_discount_rate\": 10, \"course_discounted_cost\": 18000, \"course_registration_last_date\": \"2020-11-18\"}}', '2020-10-30 08:47:33', '2020-10-30 08:47:33'),
(206, 'Course Secondary Category', 'Course Secondary Category has been created', 'App\\Course_secondary_category', 3, 'App\\User', 1, '{\"attributes\": {\"secondary_category_name\": \"Class Six\", \"course_primary_category_id\": 1}}', '2020-10-30 09:54:19', '2020-10-30 09:54:19'),
(207, 'Course Secondary Category', 'Course Secondary Category has been created', 'App\\Course_secondary_category', 4, 'App\\User', 1, '{\"attributes\": {\"secondary_category_name\": \"Database Administrator\", \"course_primary_category_id\": 2}}', '2020-10-30 09:54:56', '2020-10-30 09:54:56'),
(208, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 3, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"English\", \"course_secondary_category_id\": 1}}', '2020-10-30 09:56:03', '2020-10-30 09:56:03'),
(209, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 4, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"Bangla\", \"course_secondary_category_id\": 3}}', '2020-10-30 09:56:32', '2020-10-30 09:56:32'),
(210, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 5, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"Database Structure\", \"course_secondary_category_id\": 4}}', '2020-10-30 09:57:16', '2020-10-30 09:57:16'),
(211, 'Course Sub Category', 'Course Sub Category has been created', 'App\\Course_sub_category', 6, 'App\\User', 1, '{\"attributes\": {\"sub_category_name\": \"Software Architecture\", \"course_secondary_category_id\": 2}}', '2020-10-30 09:58:42', '2020-10-30 09:58:42'),
(212, 'Course', 'Course has been updated', 'App\\Course', 2, 'App\\User', 26, '{\"old\": {\"course_title\": \"Certificate Course on “Banking, L/C, Customs & Shipping Procedures of Export-Import Business”(6 Days Evening)\", \"course_details\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\\r\\n\\r\\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>\", \"course_sub_category_id\": 2}, \"attributes\": {\"course_title\": \"Certificate Course on “Banking, Customs & Shipping Procedures of Export-Import Business”(6 Days Evening)\", \"course_details\": \"<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\\\"https://laravel.com/docs/5.3/homestead\\\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\", \"course_sub_category_id\": 6}}', '2020-10-30 10:32:44', '2020-10-30 10:32:44'),
(213, 'Course Cost', 'Course Cost has been updated', 'App\\Course_cost', 6, 'App\\User', 26, '{\"old\": {\"course_start_date\": null}, \"attributes\": {\"course_start_date\": \"1970-01-01\"}}', '2020-10-30 14:08:46', '2020-10-30 14:08:46'),
(214, 'Course Cost', 'Course Cost has been updated', 'App\\Course_cost', 6, 'App\\User', 26, '{\"old\": {\"course_start_date\": \"1970-01-01\"}, \"attributes\": {\"course_start_date\": \"2020-11-22\"}}', '2020-10-30 14:10:44', '2020-10-30 14:10:44'),
(215, 'Course Cost', 'Course Cost has been created', 'App\\Course_cost', 7, 'App\\User', 26, '{\"attributes\": {\"course_id\": 2, \"course_fee\": 17000, \"course_start_date\": \"2020-12-10\", \"course_discount_rate\": 20, \"course_discounted_cost\": 13600, \"course_registration_last_date\": \"2020-12-04\"}}', '2020-10-30 14:11:26', '2020-10-30 14:11:26'),
(216, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 53, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-lesson\"}}', '2020-10-30 14:15:38', '2020-10-30 14:15:38'),
(217, 'Course Lesson', 'Course Lesson has been created', 'App\\Course_lesson', 1, 'App\\User', 26, '{\"attributes\": {\"course_id\": 2, \"lesson_title\": \"Introduction of Software Architecture\", \"lesson_duration\": \"10 Hours\", \"lesson_start_date\": null, \"lesson_description\": \"<p>I have solved it. The issue was that I had to check for the instances of CKEDITOR in the&nbsp;<code>for loop</code>&nbsp;which I had not checked. So I added the&nbsp;<code>for loop</code>&nbsp;to check the instances, and everything works completely fine.</p>\"}}', '2020-10-30 15:20:51', '2020-10-30 15:20:51'),
(218, 'Course Lesson', 'Course Lesson has been updated', 'App\\Course_lesson', 1, 'App\\User', 26, '{\"old\": {\"lesson_start_date\": null}, \"attributes\": {\"lesson_start_date\": \"2020-11-25\"}}', '2020-10-30 15:23:32', '2020-10-30 15:23:32'),
(219, 'Course Lesson', 'Course Lesson has been created', 'App\\Course_lesson', 2, 'App\\User', 26, '{\"attributes\": {\"course_id\": 2, \"lesson_title\": \"Software Architecture Development\", \"lesson_duration\": \"8 Hours\", \"lesson_start_date\": \"2020-11-26\", \"lesson_description\": \"<p>I have solved it. The issue was that I had to check for the instances of CKEDITOR in the&nbsp;<code>for loop</code>&nbsp;which I had not checked. So I added the&nbsp;<code>for loop</code>&nbsp;to check the instances, and everything works completely fine.</p>\"}}', '2020-10-30 15:25:19', '2020-10-30 15:25:19'),
(220, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 54, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-lesson\"}}', '2020-10-30 15:26:51', '2020-10-30 15:26:51'),
(221, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 55, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-list\"}}', '2020-10-31 13:00:31', '2020-10-31 13:00:31'),
(222, 'User', 'User has been created By the User.', 'App\\User', 40, NULL, NULL, '{\"attributes\": {\"name\": \"Afnan Chowdhury\", \"email\": \"arafat.uddin@wub.edu.bd\", \"is_active\": 0}}', '2020-11-01 13:32:47', '2020-11-01 13:32:47'),
(223, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 20, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Nandil\", \"religion\": null, \"birth_date\": \"1974-06-04\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Chadpur\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-11-01 13:32:47', '2020-11-01 13:32:47'),
(224, 'User', 'User has been updated By the User.', 'App\\User', 40, 'App\\User', 1, '{\"old\": {\"is_active\": 0}, \"attributes\": {\"is_active\": 1}}', '2020-11-01 13:33:25', '2020-11-01 13:33:25'),
(225, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 56, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-create\"}}', '2020-11-01 14:26:38', '2020-11-01 14:26:38'),
(226, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 57, 'App\\User', 1, '{\"attributes\": {\"name\": \"view-course-package\"}}', '2020-11-01 14:27:07', '2020-11-01 14:27:07'),
(227, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 58, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-package\"}}', '2020-11-01 14:27:29', '2020-11-01 14:27:29'),
(228, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 59, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-cost\"}}', '2020-11-01 14:27:48', '2020-11-01 14:27:48'),
(229, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 60, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-lesson\"}}', '2020-11-01 14:28:10', '2020-11-01 14:28:10'),
(230, 'Course Package', 'Course Package has been created', 'App\\Course_package', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"user_id\": 26, \"package_image\": \"public/uploads/course-photo/thumbnail/1604264449.jpg\", \"package_title\": \"xbvbvcbcvb\", \"package_benefit\": \"fdbhdggdhdh\", \"package_content\": \"xbdfddfgdfg\", \"package_details\": \"xbvbvcbcv\", \"package_duration\": \"1 Month\", \"package_subtitle\": \"\", \"package_component\": \"xffgfgfgf\", \"institution_type_id\": 1, \"is_package_verified\": 0, \"package_requirements\": null, \"course_sub_category_id\": \"\"}}', '2020-11-01 15:00:50', '2020-11-01 15:00:50'),
(231, 'Course Package Cost', 'Course Package Cost has been created', 'App\\Course_package_cost', 1, 'App\\User', 26, '{\"attributes\": {\"package_fee\": 32000, \"course_package_id\": 2, \"package_start_date\": \"2020-11-15\", \"package_discount_rate\": 15, \"package_discounted_cost\": 27200, \"package_registration_last_date\": \"2020-11-11\"}}', '2020-11-01 15:18:47', '2020-11-01 15:18:47'),
(232, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 61, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-package-cost\"}}', '2020-11-01 15:24:11', '2020-11-01 15:24:11'),
(233, 'Course Package Cost', 'Course Package Cost has been updated', 'App\\Course_package_cost', 1, 'App\\User', 26, '{\"old\": {\"package_discount_rate\": 15, \"package_discounted_cost\": 27200}, \"attributes\": {\"package_discount_rate\": 12, \"package_discounted_cost\": 28160}}', '2020-11-01 15:26:40', '2020-11-01 15:26:40'),
(234, 'Course Package Cost', 'Course Package Cost has been created', 'App\\Course_package_cost', 2, 'App\\User', 26, '{\"attributes\": {\"package_fee\": 25000, \"course_package_id\": 1, \"package_start_date\": \"2020-11-20\", \"package_discount_rate\": 10, \"package_discounted_cost\": 22500, \"package_registration_last_date\": \"2020-11-18\"}}', '2020-11-02 07:11:21', '2020-11-02 07:11:21'),
(235, 'Course Package Cost', 'Course Package Cost has been updated', 'App\\Course_package_cost', 2, 'App\\User', 26, '{\"old\": {\"package_discount_rate\": 10, \"package_discounted_cost\": 22500}, \"attributes\": {\"package_discount_rate\": 20, \"package_discounted_cost\": 20000}}', '2020-11-02 07:11:37', '2020-11-02 07:11:37'),
(236, 'Course Package Lesson', 'Course Package Lesson has been created', 'App\\Course_package_lesson', 1, 'App\\User', 26, '{\"attributes\": {\"course_package_id\": 0, \"package_lesson_title\": \"fbgdfgfd\", \"package_lesson_duration\": \"10 Days\", \"package_lesson_start_date\": \"2020-11-26\", \"package_lesson_description\": \"<p>dghgfjfzhjfhjf thrtrryru</p>\"}}', '2020-11-02 09:06:08', '2020-11-02 09:06:08'),
(237, 'Course Package Lesson', 'Course Package Lesson has been created', 'App\\Course_package_lesson', 2, 'App\\User', 26, '{\"attributes\": {\"course_package_id\": 2, \"package_lesson_title\": \"fbgdfgfd\", \"package_lesson_duration\": \"10 Days\", \"package_lesson_start_date\": \"2020-11-26\", \"package_lesson_description\": \"<p>XNcbnbzncadh ryeyettyteyrty</p>\"}}', '2020-11-02 09:07:40', '2020-11-02 09:07:40'),
(238, 'Course Package Lesson', 'Course Package Lesson has been updated', 'App\\Course_package_lesson', 2, 'App\\User', 26, '{\"old\": {\"package_lesson_title\": \"fbgdfgfd\", \"package_lesson_description\": \"<p>XNcbnbzncadh ryeyettyteyrty</p>\"}, \"attributes\": {\"package_lesson_title\": \"fbgdfgfd hjgdh\", \"package_lesson_description\": \"<p>XNcbnbzncadh ryeyettyteyrty jgfhfjh</p>\"}}', '2020-11-02 09:12:55', '2020-11-02 09:12:55'),
(239, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 2, 'App\\User', 26, '{\"old\": {\"package_benefit\": \"fdbhdggdhdh\", \"package_content\": \"xbdfddfgdfg\", \"package_details\": \"xbvbvcbcv\", \"package_duration\": \"1 Month\", \"package_component\": \"xffgfgfgf\"}, \"attributes\": {\"package_benefit\": \"<p>fdbhdggdhdh</p>\", \"package_content\": \"<p>xbdfddfgdfg</p>\", \"package_details\": \"<p>xbvbvcbcv</p>\", \"package_duration\": \"2 Month\", \"package_component\": \"<p>xffgfgfgf</p>\"}}', '2020-11-02 14:08:01', '2020-11-02 14:08:01'),
(240, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 2, 'App\\User', 26, '{\"old\": {\"package_subtitle\": \"\", \"package_requirements\": null}, \"attributes\": {\"package_subtitle\": \"CXvcXCvxcv\", \"package_requirements\": \"sdgsfgs WRGRGEGER\"}}', '2020-11-02 14:12:32', '2020-11-02 14:12:32'),
(241, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-03 07:55:43', '2020-11-03 07:55:43'),
(242, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-03 08:13:27', '2020-11-03 08:13:27'),
(243, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-03 08:16:15', '2020-11-03 08:16:15'),
(244, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 62, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-batch\"}}', '2020-11-03 08:30:32', '2020-11-03 08:30:32'),
(245, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 63, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-batch-student-mapping\"}}', '2020-11-03 08:30:48', '2020-11-03 08:30:48'),
(246, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 64, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-batch\"}}', '2020-11-03 08:31:06', '2020-11-03 08:31:06'),
(247, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 65, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-package-batch-student-mapping\"}}', '2020-11-03 08:31:25', '2020-11-03 08:31:25'),
(248, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 66, 'App\\User', 1, '{\"attributes\": {\"name\": \"pdf-library\"}}', '2020-11-03 08:31:42', '2020-11-03 08:31:42'),
(249, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 67, 'App\\User', 1, '{\"attributes\": {\"name\": \"video-library\"}}', '2020-11-03 08:31:59', '2020-11-03 08:31:59'),
(250, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 68, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-course-list\"}}', '2020-11-03 08:32:16', '2020-11-03 08:32:16'),
(251, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 69, 'App\\User', 1, '{\"attributes\": {\"name\": \"active-course-list\"}}', '2020-11-03 08:32:33', '2020-11-03 08:32:33'),
(252, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 70, 'App\\User', 1, '{\"attributes\": {\"name\": \"inactive-course-list\"}}', '2020-11-03 08:32:52', '2020-11-03 08:32:52'),
(253, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 71, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-course-package-list\"}}', '2020-11-03 08:33:09', '2020-11-03 08:33:09'),
(254, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 72, 'App\\User', 1, '{\"attributes\": {\"name\": \"active-course-package-list\"}}', '2020-11-03 08:33:27', '2020-11-03 08:33:27'),
(255, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 73, 'App\\User', 1, '{\"attributes\": {\"name\": \"inactive-course-package-list\"}}', '2020-11-03 08:33:45', '2020-11-03 08:33:45'),
(256, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 74, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-cost\"}}', '2020-11-03 09:24:17', '2020-11-03 09:24:17'),
(257, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 75, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-lesson\"}}', '2020-11-03 09:24:33', '2020-11-03 09:24:33'),
(258, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 76, 'App\\User', 1, '{\"attributes\": {\"name\": \"approve-course\"}}', '2020-11-03 09:32:26', '2020-11-03 09:32:26'),
(259, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 77, 'App\\User', 1, '{\"attributes\": {\"name\": \"reject-course\"}}', '2020-11-03 09:32:45', '2020-11-03 09:32:45'),
(260, 'Course', 'Course has been updated', 'App\\Course', 2, 'App\\User', 1, '{\"old\": {\"is_course_verified\": 0}, \"attributes\": {\"is_course_verified\": 1}}', '2020-11-03 09:48:06', '2020-11-03 09:48:06'),
(261, 'Course', 'Course has been updated', 'App\\Course', 1, 'App\\User', 1, '{\"old\": {\"is_course_verified\": 0}, \"attributes\": {\"is_course_verified\": 2}}', '2020-11-03 12:58:35', '2020-11-03 12:58:35'),
(262, 'Course', 'Course has been updated', 'App\\Course', 1, 'App\\User', 1, '{\"old\": {\"is_course_verified\": 0}, \"attributes\": {\"is_course_verified\": 2}}', '2020-11-03 13:04:48', '2020-11-03 13:04:48'),
(263, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 78, 'App\\User', 1, '{\"attributes\": {\"name\": \"inactivate-course\"}}', '2020-11-03 13:10:49', '2020-11-03 13:10:49'),
(264, 'Course', 'Course has been updated', 'App\\Course', 2, 'App\\User', 1, '{\"old\": {\"status\": 1}, \"attributes\": {\"status\": 0}}', '2020-11-03 13:16:59', '2020-11-03 13:16:59'),
(265, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 79, 'App\\User', 1, '{\"attributes\": {\"name\": \"activate-course\"}}', '2020-11-03 13:29:46', '2020-11-03 13:29:46'),
(266, 'Course', 'Course has been updated', 'App\\Course', 2, 'App\\User', 1, '{\"old\": {\"status\": 0}, \"attributes\": {\"status\": 1}}', '2020-11-03 13:36:19', '2020-11-03 13:36:19'),
(267, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 80, 'App\\User', 1, '{\"attributes\": {\"name\": \"approve-course-package\"}}', '2020-11-03 14:11:42', '2020-11-03 14:11:42'),
(268, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 81, 'App\\User', 1, '{\"attributes\": {\"name\": \"reject-course-package\"}}', '2020-11-03 14:11:57', '2020-11-03 14:11:57'),
(269, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 82, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-package-cost\"}}', '2020-11-03 14:15:21', '2020-11-03 14:15:21'),
(270, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 83, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-package-lesson\"}}', '2020-11-03 14:16:42', '2020-11-03 14:16:42'),
(271, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 84, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-package-lesson\"}}', '2020-11-03 14:17:27', '2020-11-03 14:17:27'),
(272, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 2, 'App\\User', 1, '{\"old\": {\"is_package_verified\": 0}, \"attributes\": {\"is_package_verified\": 1}}', '2020-11-03 14:21:24', '2020-11-03 14:21:24'),
(273, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 1, 'App\\User', 1, '{\"old\": {\"is_package_verified\": 0}, \"attributes\": {\"is_package_verified\": 2}}', '2020-11-03 14:21:38', '2020-11-03 14:21:38'),
(274, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 85, 'App\\User', 1, '{\"attributes\": {\"name\": \"inactivate-course-package\"}}', '2020-11-03 14:25:52', '2020-11-03 14:25:52'),
(275, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 86, 'App\\User', 1, '{\"attributes\": {\"name\": \"activate-course-package\"}}', '2020-11-03 14:26:52', '2020-11-03 14:26:52'),
(276, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 2, 'App\\User', 1, '{\"old\": {\"status\": 1}, \"attributes\": {\"status\": 0}}', '2020-11-03 14:28:08', '2020-11-03 14:28:08'),
(277, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 2, 'App\\User', 1, '{\"old\": {\"status\": 0}, \"attributes\": {\"status\": 1}}', '2020-11-03 14:35:45', '2020-11-03 14:35:45'),
(278, 'Course Package', 'Course Package has been updated', 'App\\Course_package', 1, 'App\\User', 1, '{\"old\": {\"is_package_verified\": 2}, \"attributes\": {\"is_package_verified\": 1}}', '2020-11-03 14:35:53', '2020-11-03 14:35:53'),
(279, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 13:09:04', '2020-11-04 13:09:04'),
(280, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 87, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-batch\"}}', '2020-11-04 13:52:20', '2020-11-04 13:52:20'),
(281, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 88, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-student-batch\"}}', '2020-11-04 13:52:36', '2020-11-04 13:52:36'),
(282, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 89, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-batch\"}}', '2020-11-04 13:52:54', '2020-11-04 13:52:54'),
(283, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 13:53:47', '2020-11-04 13:53:47'),
(284, 'Course Batch', 'Course Batch has been created', 'App\\Course_batch', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_id\": \"2\", \"course_batch_title\": \"01A\"}}', '2020-11-04 14:02:48', '2020-11-04 14:02:48'),
(285, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 90, 'App\\User', 1, '{\"attributes\": {\"name\": \"close-course-batch\"}}', '2020-11-04 14:10:57', '2020-11-04 14:10:57'),
(286, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 14:11:37', '2020-11-04 14:11:37'),
(287, 'Course Batch', 'Course Batch has been updated', 'App\\Course_batch', 1, 'App\\User', 26, '{\"old\": {\"course_batch_title\": \"01A\"}, \"attributes\": {\"course_batch_title\": \"01B\"}}', '2020-11-04 14:20:16', '2020-11-04 14:20:16'),
(288, 'Course Batch', 'Course Batch has been updated', 'App\\Course_batch', 1, 'App\\User', 26, '{\"old\": {\"status\": 1}, \"attributes\": {\"status\": 0}}', '2020-11-04 14:25:24', '2020-11-04 14:25:24'),
(289, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 14:42:19', '2020-11-04 14:42:19'),
(290, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 91, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-package-batch\"}}', '2020-11-04 15:03:24', '2020-11-04 15:03:24'),
(291, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 92, 'App\\User', 1, '{\"attributes\": {\"name\": \"close-package-batch\"}}', '2020-11-04 15:03:49', '2020-11-04 15:03:49'),
(292, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 93, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-package-batch\"}}', '2020-11-04 15:04:06', '2020-11-04 15:04:06'),
(293, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 15:04:45', '2020-11-04 15:04:45'),
(294, 'Course Package Batch', 'Course Package Batch has been created', 'App\\Course_package_batch', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_package_id\": \"2\", \"course_package_batch_title\": \"01A\"}}', '2020-11-04 15:07:59', '2020-11-04 15:07:59'),
(295, 'Course Package Batch', 'Course Package Batch has been updated', 'App\\Course_package_batch', 1, 'App\\User', 26, '{\"old\": {\"course_package_batch_title\": \"01A\"}, \"attributes\": {\"course_package_batch_title\": \"02A\"}}', '2020-11-04 15:08:15', '2020-11-04 15:08:15'),
(296, 'Course Package Batch', 'Course Package Batch has been updated', 'App\\Course_package_batch', 1, 'App\\User', 26, '{\"old\": {\"status\": 1}, \"attributes\": {\"status\": 0}}', '2020-11-04 15:08:24', '2020-11-04 15:08:24'),
(297, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-04 15:09:45', '2020-11-04 15:09:45'),
(298, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-05 13:46:33', '2020-11-05 13:46:33'),
(299, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 94, 'App\\User', 1, '{\"attributes\": {\"name\": \"create-pdf-library\"}}', '2020-11-05 14:15:55', '2020-11-05 14:15:55'),
(300, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 95, 'App\\User', 1, '{\"attributes\": {\"name\": \"view-pdf\"}}', '2020-11-05 14:16:14', '2020-11-05 14:16:14');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(301, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 96, 'App\\User', 1, '{\"attributes\": {\"name\": \"delete-pdf\"}}', '2020-11-05 14:16:27', '2020-11-05 14:16:27'),
(302, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-05 14:16:59', '2020-11-05 14:16:59'),
(303, 'PDF Library', 'PDF Library has been created', 'App\\Pdf_library', 1, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"pdf_location\": \"F:\\\\wampp\\\\www\\\\fctb_academy\\\\public\\\\/uploads/pdf-library/1604608685.pdf\", \"course_sub_category_id\": 2}}', '2020-11-05 14:38:05', '2020-11-05 14:38:05'),
(304, 'PDF Library', 'PDF Library has been deleted', 'App\\Pdf_library', 1, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"pdf_location\": \"public\\\\/uploads/pdf-library/1604608685.pdf\", \"course_sub_category_id\": 2}}', '2020-11-05 14:47:47', '2020-11-05 14:47:47'),
(305, 'PDF Library', 'PDF Library has been created', 'App\\Pdf_library', 2, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"pdf_location\": \"public/uploads/course-photo/1604609298.pdf\", \"course_sub_category_id\": 6}}', '2020-11-05 14:48:18', '2020-11-05 14:48:18'),
(306, 'PDF Library', 'PDF Library has been deleted', 'App\\Pdf_library', 2, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"pdf_location\": \"public/uploads/course-photo/1604609298.pdf\", \"course_sub_category_id\": 6}}', '2020-11-05 14:49:02', '2020-11-05 14:49:02'),
(307, 'PDF Library', 'PDF Library has been created', 'App\\Pdf_library', 3, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"pdf_location\": \"public/uploads/pdf-library/1604609360.pdf\", \"course_sub_category_id\": 6}}', '2020-11-05 14:49:20', '2020-11-05 14:49:20'),
(308, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 97, 'App\\User', 1, '{\"attributes\": {\"name\": \"create-video-library\"}}', '2020-11-06 13:12:32', '2020-11-06 13:12:32'),
(309, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 98, 'App\\User', 1, '{\"attributes\": {\"name\": \"delete-Video\"}}', '2020-11-06 13:12:50', '2020-11-06 13:12:50'),
(310, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-06 13:13:34', '2020-11-06 13:13:34'),
(311, 'Video Library', 'Video Library has been created', 'App\\Video_library', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"https://www.youtube.com/watch?v=JoVkReLGpBk\", \"video_title\": \"Advance Html 5\", \"course_sub_category_id\": 2}}', '2020-11-06 13:16:50', '2020-11-06 13:16:50'),
(312, 'Video Library', 'Video Library has been deleted', 'App\\Video_library', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"https://www.youtube.com/watch?v=JoVkReLGpBk\", \"video_title\": \"Advance Html 5\", \"course_sub_category_id\": 2}}', '2020-11-06 13:17:06', '2020-11-06 13:17:06'),
(313, 'Video Library', 'Video Library has been created', 'App\\Video_library', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"https://www.youtube.com/watch?v=JoVkReLGpBk\", \"video_title\": \"Advance Html 5\", \"course_sub_category_id\": 2}}', '2020-11-06 13:17:23', '2020-11-06 13:17:23'),
(314, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 99, 'App\\User', 1, '{\"attributes\": {\"name\": \"library-pdf-admin\"}}', '2020-11-06 13:33:03', '2020-11-06 13:33:03'),
(315, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 100, 'App\\User', 1, '{\"attributes\": {\"name\": \"library-video-admin\"}}', '2020-11-06 13:33:15', '2020-11-06 13:33:15'),
(316, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-06 13:44:06', '2020-11-06 13:44:06'),
(317, 'Video Library', 'Video Library has been created', 'App\\Video_library', 3, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"X-CKZCqH6IQ\", \"video_title\": \"Database Design Part - 1\", \"course_sub_category_id\": 5}}', '2020-11-06 14:44:26', '2020-11-06 14:44:26'),
(318, 'Video Library', 'Video Library has been created', 'App\\Video_library', 4, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"gDOFDwgXrew\", \"video_title\": \"Advance Html 5\", \"course_sub_category_id\": 2}}', '2020-11-06 14:45:22', '2020-11-06 14:45:22'),
(319, 'Video Library', 'Video Library has been deleted', 'App\\Video_library', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"video_url\": \"https://www.youtube.com/watch?v=JoVkReLGpBk\", \"video_title\": \"Advance Html 5\", \"course_sub_category_id\": 2}}', '2020-11-06 14:45:27', '2020-11-06 14:45:27'),
(320, 'User', 'User has been created By the User.', 'App\\User', 41, NULL, NULL, '{\"attributes\": {\"name\": \"Tanisha Islam\", \"email\": \"tanisha@gmail.com\", \"is_active\": 1}}', '2020-11-11 09:27:26', '2020-11-11 09:27:26'),
(321, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 21, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2013-01-01\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-11-11 09:27:28', '2020-11-11 09:27:28'),
(322, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 11, NULL, NULL, '{\"attributes\": {\"user_id\": 41, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-11-11 09:27:28', '2020-11-11 09:27:28'),
(323, 'User', 'User has been created By the User.', 'App\\User', 42, NULL, NULL, '{\"attributes\": {\"name\": \"Tanisha Islam\", \"email\": \"tanisha@gmail.com\", \"is_active\": 1}}', '2020-11-11 09:36:00', '2020-11-11 09:36:00'),
(324, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 22, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"2002-01-15\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-11-11 09:36:00', '2020-11-11 09:36:00'),
(325, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 12, NULL, NULL, '{\"attributes\": {\"user_id\": 42, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-11-11 09:36:00', '2020-11-11 09:36:00'),
(326, 'User', 'User has been created By the User.', 'App\\User', 43, NULL, NULL, '{\"attributes\": {\"name\": \"Aysha Khatun\", \"email\": \"aysha@gmail.com\", \"is_active\": 1}}', '2020-11-11 13:52:23', '2020-11-11 13:52:23'),
(327, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 23, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"1993-02-26\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-11-11 13:52:25', '2020-11-11 13:52:25'),
(328, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 13, NULL, NULL, '{\"attributes\": {\"user_id\": 43, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-11-11 13:52:25', '2020-11-11 13:52:25'),
(329, 'User', 'User has been created By the User.', 'App\\User', 44, NULL, NULL, '{\"attributes\": {\"name\": \"Aysha Khatun\", \"email\": \"aysha@gmail.com\", \"is_active\": 1}}', '2020-11-11 13:53:31', '2020-11-11 13:53:31'),
(330, 'Personal Information', 'Personal Information has been created', 'App\\Personal_information', 24, NULL, NULL, '{\"attributes\": {\"image\": null, \"gender\": null, \"mobile\": \"1676152714\", \"upazila\": \"Boraigram\", \"religion\": null, \"birth_date\": \"1993-02-26\", \"cover_image\": null, \"nationality\": null, \"fathers_name\": null, \"mothers_name\": null, \"home_district\": \"Natore\", \"marital_status\": null, \"national_id_no\": null, \"current_location\": null, \"present_address\\t\": null, \"permanent_address\": null}}', '2020-11-11 13:53:31', '2020-11-11 13:53:31'),
(331, 'Referred Student', 'Referred Student has been created', 'App\\Referred_student', 14, NULL, NULL, '{\"attributes\": {\"user_id\": 44, \"referred_code\": \"FTCB5F8B00D0EEFC6\"}}', '2020-11-11 13:53:31', '2020-11-11 13:53:31'),
(332, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 1, NULL, NULL, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2020-11-11 13:53:31', '2020-11-11 13:53:31'),
(333, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 1, 'App\\User', 44, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fac5923bc599\"}}', '2020-11-11 15:35:31', '2020-11-11 15:35:31'),
(334, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 1, 'App\\User', 44, '{\"old\": {\"tran_id\": \"5fac5923bc599\"}, \"attributes\": {\"tran_id\": \"5facc7a6beb06\"}}', '2020-11-11 23:27:02', '2020-11-11 23:27:02'),
(335, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 1, 'App\\User', 44, '{\"old\": {\"tran_id\": \"5facc7a6beb06\"}, \"attributes\": {\"tran_id\": \"5facc835d9c95\"}}', '2020-11-11 23:29:26', '2020-11-11 23:29:26'),
(336, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 1, 'App\\User', 44, '{\"old\": {\"tran_id\": \"5facc835d9c95\"}, \"attributes\": {\"tran_id\": \"5facc89bb64d1\"}}', '2020-11-11 23:31:07', '2020-11-11 23:31:07'),
(337, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 1, 'App\\User', 44, '{\"old\": {\"tran_id\": \"5facc89bb64d1\"}, \"attributes\": {\"tran_id\": \"5facc963a5cee\"}}', '2020-11-11 23:34:27', '2020-11-11 23:34:27'),
(338, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 2, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 1, \"is_payment\": 0, \"enrollment_end_date\": \"2020-11-27\", \"enrollment_start_date\": \"1970-01-01\"}}', '2020-11-12 06:41:10', '2020-11-12 06:41:10'),
(339, 'Course Enrollment', 'Course Enrollment has been deleted', 'App\\Course_enrollment', 2, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 1, \"is_payment\": 0, \"enrollment_end_date\": \"2020-11-27\", \"enrollment_start_date\": \"1970-01-01\"}}', '2020-11-12 06:41:36', '2020-11-12 06:41:36'),
(340, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 3, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 1, \"is_payment\": 0, \"enrollment_end_date\": \"2020-11-27\", \"enrollment_start_date\": \"1970-01-01\"}}', '2020-11-12 06:42:15', '2020-11-12 06:42:15'),
(341, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 3, 'App\\User', 44, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fad3487206f3\"}}', '2020-11-12 07:11:35', '2020-11-12 07:11:35'),
(342, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 4, 'App\\User', 36, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 36, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2020-11-12 07:44:05', '2020-11-12 07:44:05'),
(343, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 4, 'App\\User', 36, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fad3c2b11b06\"}}', '2020-11-12 07:44:11', '2020-11-12 07:44:11'),
(344, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 5, 'App\\User', 44, '{\"attributes\": {\"type\": \"package\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2020-11-13 07:08:28', '2020-11-13 07:08:28'),
(345, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 5, 'App\\User', 44, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fae88b4dcbfc\"}}', '2020-11-13 07:23:01', '2020-11-13 07:23:01'),
(346, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 101, 'App\\User', 1, '{\"attributes\": {\"name\": \"free-quiz-setting\"}}', '2020-11-13 09:46:58', '2020-11-13 09:46:58'),
(347, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 102, 'App\\User', 1, '{\"attributes\": {\"name\": \"create-free-quiz\"}}', '2020-11-13 09:47:21', '2020-11-13 09:47:21'),
(348, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 103, 'App\\User', 1, '{\"attributes\": {\"name\": \"free-quiz-questions\"}}', '2020-11-13 09:47:38', '2020-11-13 09:47:38'),
(349, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 104, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-free-quiz\"}}', '2020-11-13 09:47:51', '2020-11-13 09:47:51'),
(350, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-13 09:48:53', '2020-11-13 09:48:53'),
(351, 'Free Quiz Setting', 'Free Quiz Setting has been created', 'App\\Free_quiz_setting', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"user_id\": 26, \"quiz_name\": \"Software Development Quiz - 1\", \"time_duration\": 60, \"course_sub_category\": {\"id\": 2, \"created_at\": \"2020-10-26T20:28:33.000000Z\", \"updated_at\": \"2020-10-26T20:28:33.000000Z\", \"sub_category_name\": \"Html\", \"course_secondary_category_id\": 2}}}', '2020-11-14 05:42:35', '2020-11-14 05:42:35'),
(352, 'Free Quiz Setting', 'Free Quiz Setting has been updated', 'App\\Free_quiz_setting', 1, 'App\\User', 26, '{\"old\": {\"quiz_name\": \"Software Development Quiz - 1\"}, \"attributes\": {\"quiz_name\": \"Software Development Quiz - One\"}}', '2020-11-14 06:12:24', '2020-11-14 06:12:24'),
(353, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 105, 'App\\User', 1, '{\"attributes\": {\"name\": \"create-free-quiz-questions\"}}', '2020-11-14 06:36:48', '2020-11-14 06:36:48'),
(354, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 106, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-free-quiz-questions\"}}', '2020-11-14 06:37:08', '2020-11-14 06:37:08'),
(355, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-14 06:39:41', '2020-11-14 06:39:41'),
(356, 'Free Quiz', 'Free Quiz has been created', 'App\\Free_quiz', 1, 'App\\User', 26, '{\"attributes\": {\"answer\": \"Option One\", \"questions\": \"What is Software Developer?\", \"option_one\": \"Option One\", \"option_two\": \"Option Two\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"free_quiz_setting_id\": 1}}', '2020-11-14 07:09:37', '2020-11-14 07:09:37'),
(357, 'Free Quiz', 'Free Quiz has been updated', 'App\\Free_quiz', 1, 'App\\User', 26, '{\"old\": {\"questions\": \"What is Software Developer?\"}, \"attributes\": {\"questions\": \"What is the Software Development Life Cycle?\"}}', '2020-11-14 07:52:24', '2020-11-14 07:52:24'),
(358, 'Free Quiz Setting', 'Free Quiz Setting has been created', 'App\\Free_quiz_setting', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"user_id\": 26, \"quiz_name\": \"Software Development Quiz - Two\", \"time_duration\": 30, \"course_sub_category\": {\"id\": 6, \"created_at\": \"2020-10-30T15:58:42.000000Z\", \"updated_at\": \"2020-10-30T15:58:42.000000Z\", \"sub_category_name\": \"Software Architecture\", \"course_secondary_category_id\": 2}}}', '2020-11-14 08:04:57', '2020-11-14 08:04:57'),
(359, 'Free Quiz', 'Free Quiz has been created', 'App\\Free_quiz', 2, 'App\\User', 26, '{\"attributes\": {\"answer\": \"Option Two\", \"questions\": \"What is Software Life Cycle:\", \"option_one\": \"Option One\", \"option_two\": \"Option Two\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"free_quiz_setting_id\": 2}}', '2020-11-14 08:06:21', '2020-11-14 08:06:21'),
(360, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 107, 'App\\User', 1, '{\"attributes\": {\"name\": \"free-quiz-admin\"}}', '2020-11-15 06:02:08', '2020-11-15 06:02:08'),
(361, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-15 06:19:35', '2020-11-15 06:19:35'),
(362, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 108, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-batch-student\"}}', '2020-11-15 08:38:18', '2020-11-15 08:38:18'),
(363, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-15 08:39:04', '2020-11-15 08:39:04'),
(364, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-15 09:23:51', '2020-11-15 09:23:51'),
(365, 'Course Batch', 'Course Batch has been created', 'App\\Course_batch', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_id\": \"1\", \"course_batch_title\": \"01A\"}}', '2020-11-15 09:37:56', '2020-11-15 09:37:56'),
(366, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 1, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_batch_id\": 1}}', '2020-11-15 09:38:34', '2020-11-15 09:38:34'),
(367, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 2, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"36\", \"course_batch_id\": 1}}', '2020-11-15 09:47:23', '2020-11-15 09:47:23'),
(368, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 3, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_batch_id\": 1}}', '2020-11-15 09:50:38', '2020-11-15 09:50:38'),
(369, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 4, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_batch_id\": 1}}', '2020-11-15 09:51:11', '2020-11-15 09:51:11'),
(370, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 5, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"36\", \"course_batch_id\": 1}}', '2020-11-15 09:51:40', '2020-11-15 09:51:40'),
(371, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 6, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_batch_id\": 1}}', '2020-11-15 09:51:41', '2020-11-15 09:51:41'),
(372, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-15 12:55:48', '2020-11-15 12:55:48'),
(373, 'Course Batch', 'Course Batch has been created', 'App\\Course_batch', 3, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"course_id\": \"2\", \"course_batch_title\": \"01A\"}}', '2020-11-15 13:39:29', '2020-11-15 13:39:29'),
(374, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 7, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"36\", \"course_batch_id\": 3}}', '2020-11-15 13:54:07', '2020-11-15 13:54:07'),
(375, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been deleted', 'App\\Course_batch_student_mapping', 7, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"36\", \"course_batch_id\": 3}}', '2020-11-15 14:01:08', '2020-11-15 14:01:08'),
(376, 'Course Batch Student Mapping', 'Course Batch Student Mapping has been created', 'App\\Course_batch_student_mapping', 8, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"36\", \"course_batch_id\": 1}}', '2020-11-15 14:01:33', '2020-11-15 14:01:33'),
(377, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 109, 'App\\User', 1, '{\"attributes\": {\"name\": \"remove-student-batch\"}}', '2020-11-15 14:26:29', '2020-11-15 14:26:29'),
(378, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 110, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-package-batch-student\"}}', '2020-11-15 14:26:48', '2020-11-15 14:26:48'),
(379, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-15 14:28:14', '2020-11-15 14:28:14'),
(380, 'Course Package Batch Student Mapping', 'Course Package Batch Student Mapping has been created', 'App\\Course_package_batch_student_mapping', 1, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_package_batch_id\": 1}}', '2020-11-15 14:34:38', '2020-11-15 14:34:38'),
(381, 'Course Package Batch Student Mapping', 'Course Package Batch Student Mapping has been deleted', 'App\\Course_package_batch_student_mapping', 1, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_package_batch_id\": 1}}', '2020-11-15 14:38:40', '2020-11-15 14:38:40'),
(382, 'Course Package Batch Student Mapping', 'Course Package Batch Student Mapping has been created', 'App\\Course_package_batch_student_mapping', 2, 'App\\User', 26, '{\"attributes\": {\"user_id\": \"44\", \"course_package_batch_id\": 1}}', '2020-11-15 14:38:57', '2020-11-15 14:38:57'),
(383, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 111, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-quiz\"}}', '2020-11-16 01:41:42', '2020-11-16 01:41:42'),
(384, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 112, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-assignment\"}}', '2020-11-16 01:41:55', '2020-11-16 01:41:55'),
(385, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-16 01:42:54', '2020-11-16 01:42:54'),
(386, 'Course Quiz Setting', 'Course Quiz Setting has been created', 'App\\Course_quiz_setting', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"quiz_name\": \"Quiz 1\", \"time_duration\": 30, \"course_batch_id\": 3}}', '2020-11-16 14:09:27', '2020-11-16 14:09:27'),
(387, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 113, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-quiz-questions\"}}', '2020-11-16 14:12:06', '2020-11-16 14:12:06'),
(388, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 114, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-quiz\"}}', '2020-11-16 14:12:22', '2020-11-16 14:12:22'),
(389, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-16 14:13:05', '2020-11-16 14:13:05'),
(390, 'Course Quiz Setting', 'Course Quiz Setting has been updated', 'App\\Course_quiz_setting', 1, 'App\\User', 26, '{\"old\": {\"quiz_name\": \"Quiz 1\"}, \"attributes\": {\"quiz_name\": \"Quiz One\"}}', '2020-11-16 14:24:39', '2020-11-16 14:24:39'),
(391, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 115, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-quiz\"}}', '2020-11-16 14:34:56', '2020-11-16 14:34:56'),
(392, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 116, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-quiz-questions\"}}', '2020-11-16 14:35:15', '2020-11-16 14:35:15'),
(393, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 117, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-quiz-question\"}}', '2020-11-16 14:35:29', '2020-11-16 14:35:29'),
(394, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-16 14:36:09', '2020-11-16 14:36:09'),
(395, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 1, 'App\\User', 26, '{\"attributes\": {\"answer\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"question\": \"\", \"option_one\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"option_two\": \"tests based on multiple choice items can typically focus on a relatively broad representation of course material, thus increasing the validity of the assessment.\", \"option_four\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 1}}', '2020-11-16 14:47:49', '2020-11-16 14:47:49'),
(396, 'Course Quiz Question', 'Course Quiz Question has been updated', 'App\\Course_quiz_question', 1, 'App\\User', 26, '{\"old\": {\"question\": \"\"}, \"attributes\": {\"question\": \"What is Software Life Cycle?\"}}', '2020-11-16 14:57:48', '2020-11-16 14:57:48'),
(397, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 118, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-course-assignment\"}}', '2020-11-17 06:09:11', '2020-11-17 06:09:11'),
(398, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 119, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-course-assignment\"}}', '2020-11-17 06:09:28', '2020-11-17 06:09:28'),
(399, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-17 06:10:13', '2020-11-17 06:10:13'),
(400, 'Course Assignment', 'Course Assignment has been created', 'App\\Course_assignment', 1, 'App\\User', 26, '{\"attributes\": {\"title\": \"Assignment 1\", \"status\": 1, \"details\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_batch_id\": 1, \"submit_last_date\": \"2020-11-30\"}}', '2020-11-17 06:35:03', '2020-11-17 06:35:03'),
(401, 'Course Assignment', 'Course Assignment has been updated', 'App\\Course_assignment', 1, 'App\\User', 26, '{\"old\": {\"title\": \"Assignment 1\", \"submit_last_date\": \"2020-11-30\"}, \"attributes\": {\"title\": \"Assignment One\", \"submit_last_date\": \"2020-11-29\"}}', '2020-11-17 06:43:10', '2020-11-17 06:43:10'),
(402, 'Course Quiz Setting', 'Course Quiz Setting has been created', 'App\\Course_quiz_setting', 2, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"quiz_name\": \"Software Development Quiz - One\", \"time_duration\": 20, \"course_batch_id\": 1}}', '2020-11-17 06:43:45', '2020-11-17 06:43:45'),
(403, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 2, 'App\\User', 26, '{\"attributes\": {\"answer\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"question\": \"What is Software Life Cycle?\", \"option_one\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"option_two\": \"tests based on multiple choice items can typically focus on a relatively broad representation of course material, thus increasing the validity of the assessment.\", \"option_four\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 2}}', '2020-11-17 06:44:15', '2020-11-17 06:44:15'),
(404, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 3, 'App\\User', 26, '{\"attributes\": {\"answer\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry.\", \"question\": \"What is Lorem Ipsum?\", \"option_one\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry.\", \"option_two\": \"Lorem Ipsum has been the industry\'s standard dummy text\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 2}}', '2020-11-17 07:51:32', '2020-11-17 07:51:32'),
(405, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 4, 'App\\User', 26, '{\"attributes\": {\"answer\": \"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,\", \"question\": \"Where does it come from?\", \"option_one\": \"The standard chunk of Lorem Ipsum used since the 1500s\", \"option_two\": \"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 2}}', '2020-11-17 07:52:49', '2020-11-17 07:52:49'),
(406, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 1, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The standard chunk of Lorem Ipsum used since the 1500s\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 08:43:51', '2020-11-17 08:43:51'),
(407, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 2, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Lorem Ipsum has been the industry\'s standard dummy text\", \"user_id\": 44, \"course_quiz_question_id\": 2}}', '2020-11-17 08:43:51', '2020-11-17 08:43:51'),
(408, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 3, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The standard chunk of Lorem Ipsum used since the 1500s\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 09:52:20', '2020-11-17 09:52:20'),
(409, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 4, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 13:10:47', '2020-11-17 13:10:47'),
(410, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 5, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Lorem Ipsum has been the industry\'s standard dummy text\", \"user_id\": 44, \"course_quiz_question_id\": 4}}', '2020-11-17 13:10:48', '2020-11-17 13:10:48'),
(411, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 6, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"course_quiz_question_id\": 2}}', '2020-11-17 13:15:03', '2020-11-17 13:15:03'),
(412, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 7, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry.\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 13:15:03', '2020-11-17 13:15:03'),
(413, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 8, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The standard chunk of Lorem Ipsum used since the 1500s\", \"user_id\": 44, \"course_quiz_question_id\": 4}}', '2020-11-17 13:15:03', '2020-11-17 13:15:03'),
(414, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 9, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"course_quiz_question_id\": 2}}', '2020-11-17 13:16:26', '2020-11-17 13:16:26'),
(415, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 10, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Lorem Ipsum has been the industry\'s standard dummy text\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 13:16:26', '2020-11-17 13:16:26'),
(416, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 11, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"course_quiz_question_id\": 2}}', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(417, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 12, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Lorem Ipsum has been the industry\'s standard dummy text\", \"user_id\": 44, \"course_quiz_question_id\": 3}}', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(418, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 13, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,\", \"user_id\": 44, \"course_quiz_question_id\": 4}}', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(419, 'Course Quiz Setting', 'Course Quiz Setting has been created', 'App\\Course_quiz_setting', 3, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"quiz_name\": \"Software Development Quiz - One\", \"time_duration\": 10, \"course_batch_id\": 1}}', '2020-11-17 13:28:44', '2020-11-17 13:28:44'),
(420, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 5, 'App\\User', 26, '{\"attributes\": {\"answer\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"question\": \"What is Software Life Cycle?\", \"option_one\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"option_two\": \"Option Two\", \"option_four\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 3}}', '2020-11-17 13:29:20', '2020-11-17 13:29:20'),
(421, 'Course Quiz Question', 'Course Quiz Question has been created', 'App\\Course_quiz_question', 6, 'App\\User', 26, '{\"attributes\": {\"answer\": \"A journal is a record of transactions listed as they occur that shows the specific accounts affected by the transaction.\", \"question\": \"Where does it come from?\", \"option_one\": \"A journal is a record of transactions listed as they occur that shows the specific accounts affected by the transaction.\", \"option_two\": \"Option Two\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"course_quiz_setting_id\": 3}}', '2020-11-17 13:30:08', '2020-11-17 13:30:08'),
(422, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 14, 'App\\User', 44, '{\"attributes\": {\"answer\": \"A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.\", \"user_id\": 44, \"course_quiz_setting_id\": 0, \"course_quiz_question_id\": 5}}', '2020-11-17 14:48:48', '2020-11-17 14:48:48'),
(423, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 15, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Option Three\", \"user_id\": 44, \"course_quiz_setting_id\": 0, \"course_quiz_question_id\": 6}}', '2020-11-17 14:48:48', '2020-11-17 14:48:48'),
(424, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 16, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"course_quiz_setting_id\": 3, \"course_quiz_question_id\": 5}}', '2020-11-17 14:52:01', '2020-11-17 14:52:01'),
(425, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 17, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Option Three\", \"user_id\": 44, \"course_quiz_setting_id\": 3, \"course_quiz_question_id\": 6}}', '2020-11-17 14:52:01', '2020-11-17 14:52:01'),
(426, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 18, 'App\\User', 44, '{\"attributes\": {\"answer\": \"Option Three\", \"user_id\": 44, \"course_quiz_setting_id\": 3, \"course_quiz_question_id\": 5}}', '2020-11-17 14:52:28', '2020-11-17 14:52:28'),
(427, 'Student Course Quiz Answer', 'Student Course Quiz Answer has been created', 'App\\Student_course_quiz_answer', 19, 'App\\User', 44, '{\"attributes\": {\"answer\": \"A journal is a record of transactions listed as they occur that shows the specific accounts affected by the transaction.\", \"user_id\": 44, \"course_quiz_setting_id\": 3, \"course_quiz_question_id\": 6}}', '2020-11-17 14:52:29', '2020-11-17 14:52:29'),
(428, 'Student Course Assignment', 'Student Course Assignment has been created', 'App\\Student_course_assignment', 1, 'App\\User', 44, '{\"attributes\": {\"user_id\": 44, \"assignment\": \"public/uploads/assignment/11605649513.pdf\", \"course_assignment_id\": 1}}', '2020-11-17 15:45:13', '2020-11-17 15:45:13'),
(429, 'Student Course Assignment', 'Student Course Assignment has been created', 'App\\Student_course_assignment', 2, 'App\\User', 44, '{\"attributes\": {\"user_id\": 44, \"assignment\": \"public/uploads/assignment/11605649701.pdf\", \"course_assignment_id\": 1}}', '2020-11-17 15:48:21', '2020-11-17 15:48:21'),
(430, 'Student Course Assignment', 'Student Course Assignment has been created', 'App\\Student_course_assignment', 3, 'App\\User', 44, '{\"attributes\": {\"user_id\": 44, \"assignment\": \"public/uploads/assignment/1/1605649794.pdf\", \"course_assignment_id\": 1}}', '2020-11-17 15:49:54', '2020-11-17 15:49:54'),
(431, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 120, 'App\\User', 1, '{\"attributes\": {\"name\": \"package-quiz\"}}', '2020-11-18 08:09:09', '2020-11-18 08:09:09'),
(432, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 121, 'App\\User', 1, '{\"attributes\": {\"name\": \"package-assignment\"}}', '2020-11-18 08:09:35', '2020-11-18 08:09:35'),
(433, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-18 08:16:34', '2020-11-18 08:16:34'),
(434, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 122, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-package-assignment\"}}', '2020-11-18 14:20:51', '2020-11-18 14:20:51'),
(435, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 123, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-package-assignment\"}}', '2020-11-18 14:21:06', '2020-11-18 14:21:06'),
(436, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 124, 'App\\User', 1, '{\"attributes\": {\"name\": \"package-quiz-questions\"}}', '2020-11-18 14:21:23', '2020-11-18 14:21:23'),
(437, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 125, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-package-quiz\"}}', '2020-11-18 14:21:39', '2020-11-18 14:21:39'),
(438, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 126, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-package-quiz\"}}', '2020-11-18 14:21:55', '2020-11-18 14:21:55'),
(439, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 127, 'App\\User', 1, '{\"attributes\": {\"name\": \"edit-package-quiz-questions\"}}', '2020-11-18 14:22:12', '2020-11-18 14:22:12'),
(440, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 128, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-package-quiz-question\"}}', '2020-11-18 14:22:30', '2020-11-18 14:22:30'),
(441, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-18 14:23:21', '2020-11-18 14:23:21'),
(442, 'Package Quiz Setting', 'Package Quiz Setting has been created', 'App\\Package_quiz_setting', 1, 'App\\User', 26, '{\"attributes\": {\"status\": 1, \"quiz_name\": \"Quiz One\", \"time_duration\": 10, \"course_package_batch_id\": 1}}', '2020-11-18 14:24:08', '2020-11-18 14:24:08'),
(443, 'Package Quiz Question', 'Package Quiz Question has been created', 'App\\Package_quiz_question', 1, 'App\\User', 26, '{\"attributes\": {\"answer\": \"Option Two\", \"question\": \"What is Software Life Cycle?\", \"option_one\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"option_two\": \"Option Two\", \"option_four\": \"Option Four\", \"option_three\": \"Option Three\", \"package_quiz_setting_id\": 1}}', '2020-11-18 14:24:48', '2020-11-18 14:24:48'),
(444, 'Package Quiz Setting', 'Package Quiz Setting has been updated', 'App\\Package_quiz_setting', 1, 'App\\User', 26, '{\"old\": {\"time_duration\": 10}, \"attributes\": {\"time_duration\": 15}}', '2020-11-18 14:25:08', '2020-11-18 14:25:08'),
(445, 'Package Quiz Question', 'Package Quiz Question has been updated', 'App\\Package_quiz_question', 1, 'App\\User', 26, '{\"old\": {\"answer\": \"Option Two\"}, \"attributes\": {\"answer\": \"Option Three\"}}', '2020-11-18 14:25:34', '2020-11-18 14:25:34'),
(446, 'Package Assignment', 'Package Assignment has been created', 'App\\Package_assignment', 1, 'App\\User', 26, '{\"attributes\": {\"title\": \"Online Education System\", \"status\": 1, \"details\": \"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\", \"submit_last_date\": \"2020-11-26\", \"course_package_batch_id\": 1}}', '2020-11-18 14:26:36', '2020-11-18 14:26:36'),
(447, 'Course Assignment', 'Course Assignment has been updated', 'App\\Course_assignment', 1, 'App\\User', 26, '{\"old\": {\"title\": \"Assignment One\", \"details\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"submit_last_date\": \"2020-11-29\"}, \"attributes\": {\"title\": \"Online Education System\", \"details\": \"<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\", \"submit_last_date\": \"2020-11-30\"}}', '2020-11-18 14:26:55', '2020-11-18 14:26:55'),
(448, 'Package Assignment', 'Package Assignment has been updated', 'App\\Package_assignment', 1, 'App\\User', 26, '{\"old\": {\"submit_last_date\": \"2020-11-26\"}, \"attributes\": {\"submit_last_date\": \"2020-11-30\"}}', '2020-11-18 14:31:15', '2020-11-18 14:31:15'),
(449, 'Course Assignment', 'Course Assignment has been updated', 'App\\Course_assignment', 1, 'App\\User', 26, '{\"old\": {\"submit_last_date\": \"2020-11-30\"}, \"attributes\": {\"submit_last_date\": \"2020-12-10\"}}', '2020-11-18 14:32:15', '2020-11-18 14:32:15'),
(450, 'Student Package Quiz Answer', 'Student Package Quiz Answer has been created', 'App\\Student_package_quiz_answer', 1, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"package_quiz_setting_id\": 1, \"package_quiz_question_id\": 0}}', '2020-11-18 14:39:18', '2020-11-18 14:39:18'),
(451, 'Student Package Assignment', 'Student Package Assignment has been created', 'App\\Student_package_assignment', 1, 'App\\User', 44, '{\"attributes\": {\"user_id\": 44, \"assignment\": \"public/uploads/package-assignment/1/1605731993.pdf\", \"package_assignment_id\": 1}}', '2020-11-18 14:39:53', '2020-11-18 14:39:53'),
(452, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 129, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-quiz-answer\"}}', '2020-11-21 08:56:31', '2020-11-21 08:56:31'),
(453, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 130, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-assignment\"}}', '2020-11-21 08:56:57', '2020-11-21 08:56:57'),
(454, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-21 08:58:00', '2020-11-21 08:58:00'),
(455, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 131, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-marks-list\"}}', '2020-11-21 13:24:13', '2020-11-21 13:24:13'),
(456, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 132, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-student-mark\"}}', '2020-11-21 13:24:30', '2020-11-21 13:24:30');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(457, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-21 13:25:12', '2020-11-21 13:25:12'),
(458, 'Student Result', 'Student Result has been created', 'App\\Student_result', 1, 'App\\User', 26, '{\"attributes\": {\"type\": \"course\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Software Development Quiz - One\", \"full_marks\": 20, \"obtained_marks\": 13}}', '2020-11-21 13:45:04', '2020-11-21 13:45:04'),
(459, 'Student Result', 'Student Result has been created', 'App\\Student_result', 2, 'App\\User', 26, '{\"attributes\": {\"type\": \"course\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Software Development Quiz - Two\", \"full_marks\": 10, \"obtained_marks\": 8}}', '2020-11-21 13:45:47', '2020-11-21 13:45:47'),
(460, 'Student Result', 'Student Result has been created', 'App\\Student_result', 3, 'App\\User', 26, '{\"attributes\": {\"type\": \"course\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Assignment\", \"full_marks\": 50, \"obtained_marks\": 40}}', '2020-11-21 13:49:50', '2020-11-21 13:49:50'),
(461, 'Student Result', 'Student Result has been created', 'App\\Student_result', 4, 'App\\User', 26, '{\"attributes\": {\"type\": \"course\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Presentation\", \"full_marks\": 10, \"obtained_marks\": 10}}', '2020-11-21 13:50:32', '2020-11-21 13:50:32'),
(462, 'Student Result', 'Student Result has been created', 'App\\Student_result', 5, 'App\\User', 26, '{\"attributes\": {\"type\": \"course\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Class Attendance\", \"full_marks\": 10, \"obtained_marks\": 9}}', '2020-11-21 13:51:08', '2020-11-21 13:51:08'),
(463, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 133, 'App\\User', 1, '{\"attributes\": {\"name\": \"add-student-package-mark\"}}', '2020-11-21 14:44:52', '2020-11-21 14:44:52'),
(464, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 134, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-package-quiz-answer\"}}', '2020-11-21 14:45:09', '2020-11-21 14:45:09'),
(465, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 135, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-package-assignment\"}}', '2020-11-21 14:45:27', '2020-11-21 14:45:27'),
(466, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 136, 'App\\User', 1, '{\"attributes\": {\"name\": \"student-package-marks-list\"}}', '2020-11-21 14:45:45', '2020-11-21 14:45:45'),
(467, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 137, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-quiz-answers\"}}', '2020-11-21 14:49:13', '2020-11-21 14:49:13'),
(468, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 138, 'App\\User', 1, '{\"attributes\": {\"name\": \"package-quiz-answers\"}}', '2020-11-21 14:49:36', '2020-11-21 14:49:36'),
(469, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-21 14:50:22', '2020-11-21 14:50:22'),
(470, 'Student Result', 'Student Result has been created', 'App\\Student_result', 6, 'App\\User', 26, '{\"attributes\": {\"type\": \"package\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Quiz One\", \"full_marks\": 30, \"obtained_marks\": 24}}', '2020-11-21 15:10:47', '2020-11-21 15:10:47'),
(471, 'Student Result', 'Student Result has been created', 'App\\Student_result', 7, 'App\\User', 26, '{\"attributes\": {\"type\": \"package\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Assignment\", \"full_marks\": 50, \"obtained_marks\": 45}}', '2020-11-21 15:11:13', '2020-11-21 15:11:13'),
(472, 'Student Result', 'Student Result has been created', 'App\\Student_result', 8, 'App\\User', 26, '{\"attributes\": {\"type\": \"package\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Presentation\", \"full_marks\": 10, \"obtained_marks\": 8}}', '2020-11-21 15:11:35', '2020-11-21 15:11:35'),
(473, 'Student Result', 'Student Result has been created', 'App\\Student_result', 9, 'App\\User', 26, '{\"attributes\": {\"type\": \"package\", \"user_id\": 44, \"course_id\": 2, \"exam_name\": \"Class Attendance\", \"full_marks\": 10, \"obtained_marks\": 9}}', '2020-11-21 15:11:56', '2020-11-21 15:11:56'),
(474, 'Student Package Quiz Answer', 'Student Package Quiz Answer has been created', 'App\\Student_package_quiz_answer', 2, 'App\\User', 44, '{\"attributes\": {\"answer\": \"The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.\", \"user_id\": 44, \"package_quiz_setting_id\": 1, \"package_quiz_question_id\": 1}}', '2020-11-21 15:16:58', '2020-11-21 15:16:58'),
(475, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-21 15:24:36', '2020-11-21 15:24:36'),
(476, 'Course Student Review', 'Course Student Review has been created', 'App\\Course_student_review', 1, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"rating\": 5, \"user_id\": 44, \"comments\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_id\": 2}}', '2020-11-22 04:35:09', '2020-11-22 04:35:09'),
(477, 'Course Student Review', 'Course Student Review has been created', 'App\\Course_student_review', 2, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"rating\": 5, \"user_id\": 44, \"comments\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_id\": 2}}', '2020-11-22 04:36:20', '2020-11-22 04:36:20'),
(478, 'Teacher Evaluation', 'Teacher Evaluation has been created', 'App\\Teacher_evaluation', 1, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"rating\": 5, \"user_id\": 44, \"comments\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\", \"course_id\": 2}}', '2020-11-22 04:58:41', '2020-11-22 04:58:41'),
(479, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 139, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-review\"}}', '2020-11-23 01:20:36', '2020-11-23 01:20:36'),
(480, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 140, 'App\\User', 1, '{\"attributes\": {\"name\": \"teacher-review\"}}', '2020-11-23 01:21:01', '2020-11-23 01:21:01'),
(481, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 141, 'App\\User', 1, '{\"attributes\": {\"name\": \"live-chat\"}}', '2020-11-25 13:54:47', '2020-11-25 13:54:47'),
(482, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-25 13:55:56', '2020-11-25 13:55:56'),
(483, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 6, 'App\\User', 35, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 35, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2020-11-26 14:16:29', '2020-11-26 14:16:29'),
(484, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 6, 'App\\User', 35, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fc00e0667919\"}}', '2020-11-26 14:20:22', '2020-11-26 14:20:22'),
(485, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 7, 'App\\User', 39, '{\"attributes\": {\"type\": \"package\", \"status\": 0, \"tran_id\": null, \"user_id\": 39, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2021-01-14\", \"enrollment_start_date\": \"2020-11-15\"}}', '2020-11-26 15:29:16', '2020-11-26 15:29:16'),
(486, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 8, 'App\\User', 39, '{\"attributes\": {\"type\": \"package\", \"status\": 0, \"tran_id\": null, \"user_id\": 39, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2021-01-14\", \"enrollment_start_date\": \"2020-11-15\"}}', '2020-11-26 15:31:35', '2020-11-26 15:31:35'),
(487, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 8, 'App\\User', 39, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fc01ebd6dbb6\"}}', '2020-11-26 15:31:41', '2020-11-26 15:31:41'),
(488, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 9, 'App\\User', 38, '{\"attributes\": {\"type\": \"package\", \"status\": 0, \"tran_id\": null, \"user_id\": 38, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2020-11-26 15:35:32', '2020-11-26 15:35:32'),
(489, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 9, 'App\\User', 38, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fc01fb2a7ed7\"}}', '2020-11-26 15:35:46', '2020-11-26 15:35:46'),
(490, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 10, 'App\\User', 38, '{\"attributes\": {\"type\": \"package\", \"status\": 0, \"tran_id\": null, \"user_id\": 38, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2021-01-14\", \"enrollment_start_date\": \"2020-11-15\"}}', '2020-11-26 15:43:03', '2020-11-26 15:43:03'),
(491, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 10, 'App\\User', 38, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"5fc0216e7dd5f\"}}', '2020-11-26 15:43:10', '2020-11-26 15:43:10'),
(492, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 7, 'App\\User', 40, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5fc0fe03a12bf\", \"user_id\": 40, \"referral_code\": \"FTCB5FC0FE03B8E06\", \"commission_rate\": 0, \"referral_package_id\": 1}}', '2020-11-27 07:24:19', '2020-11-27 07:24:19'),
(493, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 7, 'App\\User', 40, '{\"old\": {\"tran_id\": \"5fc0fe03a12bf\"}, \"attributes\": {\"tran_id\": \"5fc10022410e2\"}}', '2020-11-27 07:33:22', '2020-11-27 07:33:22'),
(494, 'Referral Agent', 'Referral Agent has been created', 'App\\Referral_agent', 8, 'App\\User', 40, '{\"attributes\": {\"status\": 0, \"tran_id\": \"5fc1011f6cd90\", \"user_id\": 40, \"referral_code\": \"FTCB5FC1011F81669\", \"commission_rate\": 0, \"package_end_date\": \"2022-11-27\", \"package_start_date\": \"2020-11-27\", \"referral_package_id\": 1}}', '2020-11-27 07:37:35', '2020-11-27 07:37:35'),
(495, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"old\": {\"tran_id\": \"5f8df706c93bf\"}, \"attributes\": {\"tran_id\": \"5fc113dd92405\"}}', '2020-11-27 08:57:33', '2020-11-27 08:57:33'),
(496, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"old\": {\"tran_id\": \"5fc113dd92405\"}, \"attributes\": {\"tran_id\": \"5fc1145fd43df\"}}', '2020-11-27 08:59:44', '2020-11-27 08:59:44'),
(497, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"old\": {\"tran_id\": \"5fc1145fd43df\"}, \"attributes\": {\"tran_id\": \"5fc145f4eb0f4\"}}', '2020-11-27 12:31:17', '2020-11-27 12:31:17'),
(498, 'Referral Agent', 'Referral Agent has been updated', 'App\\Referral_agent', 6, 'App\\User', 26, '{\"old\": {\"tran_id\": \"5fc145f4eb0f4\", \"package_end_date\": \"2020-11-26\"}, \"attributes\": {\"tran_id\": \"5fc1472f51fdb\", \"package_end_date\": \"2022-11-27\"}}', '2020-11-27 12:36:31', '2020-11-27 12:36:31'),
(499, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 142, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-commission\"}}', '2020-11-27 13:24:46', '2020-11-27 13:24:46'),
(500, 'Teachers Commission', 'Teachers Commission has been created', 'App\\Teachers_commission', 1, 'App\\User', 1, '{\"attributes\": {\"user_id\": 26, \"commission_rate\": 30}}', '2020-11-27 15:23:10', '2020-11-27 15:23:10'),
(501, 'Teachers Commission', 'Teachers Commission has been created', 'App\\Teachers_commission', 2, 'App\\User', 1, '{\"attributes\": {\"user_id\": 26, \"commission_rate\": 35}}', '2020-11-27 15:23:24', '2020-11-27 15:23:24'),
(502, 'Teachers Commission', 'Teachers Commission has been created', 'App\\Teachers_commission', 3, 'App\\User', 1, '{\"attributes\": {\"user_id\": 26, \"commission_rate\": 30}}', '2020-11-27 15:26:40', '2020-11-27 15:26:40'),
(503, 'Teachers Commission', 'Teachers Commission has been updated', 'App\\Teachers_commission', 3, 'App\\User', 1, '{\"old\": {\"commission_rate\": 30}, \"attributes\": {\"commission_rate\": 35}}', '2020-11-27 15:26:53', '2020-11-27 15:26:53'),
(504, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 142, 'App\\User', 1, '{\"old\": {\"name\": \"course-commission\"}, \"attributes\": {\"name\": \"teachers-commission\"}}', '2020-11-27 15:28:42', '2020-11-27 15:28:42'),
(505, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-27 15:29:11', '2020-11-27 15:29:11'),
(506, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-28 14:26:27', '2020-11-28 14:26:27'),
(507, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 143, 'App\\User', 1, '{\"attributes\": {\"name\": \"accounts-finance\"}}', '2020-11-29 09:44:01', '2020-11-29 09:44:01'),
(508, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-29 09:45:30', '2020-11-29 09:45:30'),
(509, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 144, 'App\\User', 1, '{\"attributes\": {\"name\": \"account-summery-agent\"}}', '2020-11-29 13:46:31', '2020-11-29 13:46:31'),
(510, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-29 13:47:14', '2020-11-29 13:47:14'),
(511, 'Payment', 'Payment has been created', 'App\\Payment', 6, 'App\\User', 27, '{\"attributes\": {\"amount\": 6000, \"user_id\": 27, \"is_withdraw\": 0}}', '2020-11-30 10:02:09', '2020-11-30 10:02:09'),
(512, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 145, 'App\\User', 1, '{\"attributes\": {\"name\": \"incomplete-course\"}}', '2020-11-30 12:09:13', '2020-11-30 12:09:13'),
(513, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 146, 'App\\User', 1, '{\"attributes\": {\"name\": \"complete-course\"}}', '2020-11-30 12:09:35', '2020-11-30 12:09:35'),
(514, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 147, 'App\\User', 1, '{\"attributes\": {\"name\": \"incomplete-package\"}}', '2020-11-30 12:09:58', '2020-11-30 12:09:58'),
(515, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 148, 'App\\User', 1, '{\"attributes\": {\"name\": \"complete-package\"}}', '2020-11-30 12:10:17', '2020-11-30 12:10:17'),
(516, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 149, 'App\\User', 1, '{\"attributes\": {\"name\": \"account-summery-teacher\"}}', '2020-11-30 12:10:40', '2020-11-30 12:10:40'),
(517, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2020-11-30 12:12:18', '2020-11-30 12:12:18'),
(518, 'Course Cost', 'Course Cost has been updated', 'App\\Course_cost', 1, 'App\\User', 26, '{\"old\": [], \"attributes\": []}', '2020-11-30 13:19:49', '2020-11-30 13:19:49'),
(519, 'Course Cost', 'Course Cost has been updated', 'App\\Course_cost', 2, 'App\\User', 26, '{\"old\": [], \"attributes\": []}', '2020-11-30 13:25:08', '2020-11-30 13:25:08'),
(520, 'Course Package Cost', 'Course Package Cost has been updated', 'App\\Course_package_cost', 1, 'App\\User', 26, '{\"old\": [], \"attributes\": []}', '2020-11-30 13:32:38', '2020-11-30 13:32:38'),
(521, 'Payment', 'Payment has been created', 'App\\Payment', 7, 'App\\User', 26, '{\"attributes\": {\"amount\": 59850, \"user_id\": 26, \"is_withdraw\": 0}}', '2020-12-01 08:46:31', '2020-12-01 08:46:31'),
(522, 'Payment', 'Payment has been updated', 'App\\Payment', 6, 'App\\User', 1, '{\"old\": {\"is_withdraw\": 0}, \"attributes\": {\"is_withdraw\": 1}}', '2020-12-02 05:28:31', '2020-12-02 05:28:31'),
(523, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 150, 'App\\User', 1, '{\"attributes\": {\"name\": \"pending-payment-request\"}}', '2020-12-02 05:35:20', '2020-12-02 05:35:20'),
(524, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 151, 'App\\User', 1, '{\"attributes\": {\"name\": \"approve-payment-request\"}}', '2020-12-02 05:35:43', '2020-12-02 05:35:43'),
(525, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 152, 'App\\User', 1, '{\"attributes\": {\"name\": \"teachers-payment-history\"}}', '2020-12-02 05:42:27', '2020-12-02 05:42:27'),
(526, 'Permission', 'Permission has been updated By the User.', 'Spatie\\Permission\\Models\\Permission', 152, 'App\\User', 1, '{\"old\": {\"name\": \"teachers-payment-history\"}, \"attributes\": {\"name\": \"payment-history\"}}', '2020-12-02 05:52:04', '2020-12-02 05:52:04'),
(527, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 153, 'App\\User', 1, '{\"attributes\": {\"name\": \"referred-student\"}}', '2020-12-02 07:48:49', '2020-12-02 07:48:49'),
(528, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 154, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-completed-student\"}}', '2020-12-02 13:50:08', '2020-12-02 13:50:08'),
(529, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 155, 'App\\User', 1, '{\"attributes\": {\"name\": \"approve-complete-course\"}}', '2020-12-02 13:59:19', '2020-12-02 13:59:19'),
(530, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 156, 'App\\User', 1, '{\"attributes\": {\"name\": \"approve-complete-package\"}}', '2020-12-02 13:59:41', '2020-12-02 13:59:41'),
(531, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 157, 'App\\User', 1, '{\"attributes\": {\"name\": \"course-status\"}}', '2020-12-02 14:06:07', '2020-12-02 14:06:07'),
(532, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 158, 'App\\User', 1, '{\"attributes\": {\"name\": \"package-status\"}}', '2020-12-02 14:06:21', '2020-12-02 14:06:21'),
(533, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 159, 'App\\User', 1, '{\"attributes\": {\"name\": \"account-summery\"}}', '2020-12-03 07:00:34', '2020-12-03 07:00:34'),
(534, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 160, 'App\\User', 1, '{\"attributes\": {\"name\": \"total-payment\"}}', '2020-12-03 09:00:14', '2020-12-03 09:00:14'),
(535, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 161, 'App\\User', 1, '{\"attributes\": {\"name\": \"total-income\"}}', '2020-12-03 09:00:44', '2020-12-03 09:00:44'),
(536, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 162, 'App\\User', 1, '{\"attributes\": {\"name\": \"income-summery\"}}', '2020-12-03 09:01:07', '2020-12-03 09:01:07'),
(537, 'Permission', 'Permission has been created By the User.', 'Spatie\\Permission\\Models\\Permission', 163, 'App\\User', 1, '{\"attributes\": {\"name\": \"payment-summery\"}}', '2020-12-03 09:01:27', '2020-12-03 09:01:27'),
(538, 'Payment', 'Payment has been created', 'App\\Payment', 8, 'App\\User', 1, '{\"attributes\": {\"amount\": 3200, \"user_id\": 1, \"is_withdraw\": 0}}', '2020-12-03 09:04:24', '2020-12-03 09:04:24'),
(539, 'Course', 'Course has been updated', 'App\\Course', 2, 'App\\User', 1, '{\"old\": {\"is_course_verified\": 0}, \"attributes\": {\"is_course_verified\": 1}}', '2021-05-02 02:38:56', '2021-05-02 02:38:56'),
(540, 'Payment', 'Payment has been updated', 'App\\Payment', 7, 'App\\User', 1, '{\"old\": {\"is_withdraw\": 0, \"paid_amount\": 0}, \"attributes\": {\"is_withdraw\": 1, \"paid_amount\": 10000}}', '2021-05-07 12:30:42', '2021-05-07 12:30:42'),
(541, 'Payment', 'Payment has been updated', 'App\\Payment', 8, 'App\\User', 1, '{\"old\": {\"is_withdraw\": 0}, \"attributes\": {\"is_withdraw\": 1}}', '2021-05-07 12:36:36', '2021-05-07 12:36:36'),
(542, 'Payment', 'Payment has been updated', 'App\\Payment', 8, 'App\\User', 1, '{\"old\": {\"is_withdraw\": 0, \"paid_amount\": 0}, \"attributes\": {\"is_withdraw\": 1, \"paid_amount\": 1000}}', '2021-05-07 12:39:47', '2021-05-07 12:39:47'),
(543, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 12:40:30', '2021-05-07 12:40:30'),
(544, 'Payment', 'Payment has been created', 'App\\Payment', 9, 'App\\User', 26, '{\"attributes\": {\"amount\": 49850, \"user_id\": 26, \"is_withdraw\": 0, \"paid_amount\": 0}}', '2021-05-07 12:48:19', '2021-05-07 12:48:19'),
(545, 'Payment', 'Payment has been created', 'App\\Payment', 10, 'App\\User', 27, '{\"attributes\": {\"amount\": 9000, \"user_id\": 27, \"is_withdraw\": 0, \"paid_amount\": 0}}', '2021-05-07 12:55:25', '2021-05-07 12:55:25'),
(546, 'Payment', 'Payment has been created', 'App\\Payment', 11, 'App\\User', 1, '{\"attributes\": {\"amount\": 2200, \"user_id\": 1, \"is_withdraw\": 0, \"paid_amount\": 0}}', '2021-05-07 12:57:37', '2021-05-07 12:57:37'),
(547, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 13:28:52', '2021-05-07 13:28:52'),
(548, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 13:29:57', '2021-05-07 13:29:57'),
(549, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 14:13:03', '2021-05-07 14:13:03'),
(550, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 14:49:43', '2021-05-07 14:49:43'),
(551, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 14:50:37', '2021-05-07 14:50:37'),
(552, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 15:05:02', '2021-05-07 15:05:02'),
(553, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 15:22:25', '2021-05-07 15:22:25'),
(554, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-07 15:23:53', '2021-05-07 15:23:53'),
(555, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 11, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2020-12-25\", \"enrollment_start_date\": \"2020-12-10\"}}', '2021-05-08 00:26:54', '2021-05-08 00:26:54'),
(556, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 11, 'App\\User', 44, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"60962f5899103\"}}', '2021-05-08 00:27:39', '2021-05-08 00:27:39'),
(557, 'Course Enrollment', 'Course Enrollment has been created', 'App\\Course_enrollment', 12, 'App\\User', 44, '{\"attributes\": {\"type\": \"course\", \"status\": 0, \"tran_id\": null, \"user_id\": 44, \"course_id\": 2, \"is_payment\": 0, \"enrollment_end_date\": \"2021-06-24\", \"enrollment_start_date\": \"2021-06-09\"}}', '2021-05-08 01:04:39', '2021-05-08 01:04:39'),
(558, 'Course Enrollment', 'Course Enrollment has been updated', 'App\\Course_enrollment', 12, 'App\\User', 44, '{\"old\": {\"tran_id\": null}, \"attributes\": {\"tran_id\": \"6096380f3384e\"}}', '2021-05-08 01:04:47', '2021-05-08 01:04:47'),
(559, 'User', 'User has been updated By the User.', 'App\\User', 1, 'App\\User', 1, '{\"old\": [], \"attributes\": []}', '2021-05-08 03:10:58', '2021-05-08 03:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sub_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sub_category_id` bigint NOT NULL,
  `institution_type_id` bigint DEFAULT NULL,
  `course_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_requirement` text COLLATE utf8mb4_unicode_ci,
  `course_component` text COLLATE utf8mb4_unicode_ci,
  `course_benefit` text COLLATE utf8mb4_unicode_ci,
  `course_content` text COLLATE utf8mb4_unicode_ci,
  `course_duration` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_course_verified` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Approve, 2 = Rejected',
  `approved_by` int NOT NULL DEFAULT '0',
  `user_id` bigint NOT NULL COMMENT 'Course Creator',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = Active, 1 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_sub_title`, `course_sub_category_id`, `institution_type_id`, `course_details`, `course_requirement`, `course_component`, `course_benefit`, `course_content`, `course_duration`, `course_image`, `is_course_verified`, `approved_by`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Certificate course on “New VAT Act 2012 & Customs Management’’ (10 Days Evening)', 'Certificate course on “New VAT Act 2012 & Customs Management’’', 1, 1, '<ul>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n	<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\r\n	<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\r\n</ul>', '<ol>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n	<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\r\n	<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\r\n</ol>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '15', 'public/uploads/course-photo/thumbnail/1603986199.jpg', 1, 1, 26, 1, '2020-10-29 09:43:19', '2020-11-03 13:04:48'),
(2, 'Certificate Course on “Banking, Customs & Shipping Procedures of Export-Import Business”(6 Days Evening)', 'Certificate Course on “Banking, L/C, Customs & Shipping Procedures of Export-Import Business”', 6, 1, '<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\"https://laravel.com/docs/5.3/homestead\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>', '<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\"https://laravel.com/docs/5.3/homestead\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\r\n\r\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>', '<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\"https://laravel.com/docs/5.3/homestead\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\r\n\r\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>', '<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\"https://laravel.com/docs/5.3/homestead\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\r\n\r\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>', '<p>Hmmm....definitely sounds like a Windows 10 thing to me. You will end up having troubles with this down the road IMO if you&#39;re coding your app to expect null instead of&nbsp;<code>0000-00-00</code>. You might wanna try using a VM like&nbsp;<a href=\"https://laravel.com/docs/5.3/homestead\">Homestead</a>&nbsp;if your machine can handle it. That way you won&#39;t run into those &quot;it works on my machine&quot; errors since you will essentially have a great production matched setup as your dev environment.</p>\r\n\r\n<p>As for whether there is an actual fix for that, I&#39;m not sure since I don&#39;t use Windows 10. Perhaps someone else does, but I would recommend going down the Homestead (or other VM) path.</p>', '15', 'public/uploads/course-photo/thumbnail/1604069157.jpg', 1, 1, 26, 1, '2020-10-30 08:45:58', '2021-05-02 02:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

DROP TABLE IF EXISTS `course_assignments`;
CREATE TABLE IF NOT EXISTS `course_assignments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_last_date` date NOT NULL,
  `course_batch_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_assignments`
--

INSERT INTO `course_assignments` (`id`, `title`, `details`, `submit_last_date`, `course_batch_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Online Education System', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2020-12-10', 1, 1, '2020-11-17 06:35:03', '2020-11-18 14:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `course_batches`
--

DROP TABLE IF EXISTS `course_batches`;
CREATE TABLE IF NOT EXISTS `course_batches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_batch_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_batches`
--

INSERT INTO `course_batches` (`id`, `course_batch_title`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '01B', '2', 1, '2020-11-04 14:02:48', '2020-11-04 14:25:24'),
(2, '01A', '1', 1, '2020-11-15 09:37:56', '2020-11-15 09:37:56'),
(3, '01A', '2', 1, '2020-11-15 13:39:29', '2020-11-15 13:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `course_batch_student_mappings`
--

DROP TABLE IF EXISTS `course_batch_student_mappings`;
CREATE TABLE IF NOT EXISTS `course_batch_student_mappings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_batch_id` bigint NOT NULL,
  `user_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_batch_student_mappings`
--

INSERT INTO `course_batch_student_mappings` (`id`, `course_batch_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 1, '36', '2020-11-15 14:01:33', '2020-11-15 14:01:33'),
(6, 1, '44', '2020-11-15 09:51:41', '2020-11-15 09:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `course_costs`
--

DROP TABLE IF EXISTS `course_costs`;
CREATE TABLE IF NOT EXISTS `course_costs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_fee` double NOT NULL,
  `course_discount_rate` int NOT NULL DEFAULT '0',
  `course_discounted_cost` double NOT NULL DEFAULT '0',
  `course_registration_last_date` date DEFAULT NULL,
  `course_start_date` date DEFAULT NULL,
  `course_id` bigint NOT NULL,
  `course_complete_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_costs`
--

INSERT INTO `course_costs` (`id`, `course_fee`, `course_discount_rate`, `course_discounted_cost`, `course_registration_last_date`, `course_start_date`, `course_id`, `course_complete_status`, `created_at`, `updated_at`) VALUES
(5, 10000, 12, 8800, '2020-11-25', '2020-12-01', 1, 0, '2020-10-30 07:43:20', '2020-10-30 08:15:50'),
(7, 17000, 20, 13600, '2021-05-26', '2021-06-09', 2, 0, '2020-10-30 14:11:26', '2020-10-30 14:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

DROP TABLE IF EXISTS `course_enrollments`;
CREATE TABLE IF NOT EXISTS `course_enrollments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint NOT NULL,
  `type` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL COMMENT 'Student',
  `enrollment_start_date` date DEFAULT NULL,
  `enrollment_end_date` date DEFAULT NULL,
  `is_payment` tinyint(1) NOT NULL DEFAULT '0',
  `tran_id` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`id`, `course_id`, `type`, `user_id`, `enrollment_start_date`, `enrollment_end_date`, `is_payment`, `tran_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'course', 44, '2020-12-10', '2020-12-25', 1, '5facc963a5cee', 1, '2020-10-10 20:43:31', '2020-10-11 23:34:27'),
(3, 1, 'course', 44, '1970-01-01', '2020-11-27', 1, '5fad3487206f3', 1, '2020-10-11 20:36:49', '2020-10-12 07:11:35'),
(4, 2, 'course', 36, '2020-12-10', '2020-12-25', 1, '5fad3c2b11b06', 1, '2020-11-12 07:44:05', '2020-11-12 07:44:11'),
(5, 2, 'package', 44, '2020-12-10', '2020-12-25', 1, '5fae88b4dcbfc', 1, '2020-11-13 07:08:28', '2020-11-13 07:23:00'),
(6, 2, 'course', 35, '2020-12-10', '2020-12-25', 1, '5fc00e0667919', 1, '2020-11-26 14:16:28', '2020-11-26 14:20:22'),
(8, 2, 'package', 39, '2020-11-15', '2021-01-14', 1, '5fc01ebd6dbb6', 1, '2020-11-26 15:31:35', '2020-11-26 15:31:41'),
(10, 2, 'package', 38, '2020-11-15', '2021-01-14', 1, '5fc0216e7dd5f', 1, '2020-11-26 15:43:03', '2020-11-26 15:43:10'),
(11, 2, 'course', 44, '2020-12-10', '2020-12-25', 1, '60962f5899103', 1, '2021-05-08 00:26:53', '2021-05-08 00:27:38'),
(12, 2, 'course', 44, '2021-06-09', '2021-06-24', 1, '6096380f3384e', 1, '2021-05-08 01:04:39', '2021-05-08 01:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `course_lessons`
--

DROP TABLE IF EXISTS `course_lessons`;
CREATE TABLE IF NOT EXISTS `course_lessons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_duration` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_start_date` date DEFAULT NULL,
  `course_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lessons`
--

INSERT INTO `course_lessons` (`id`, `lesson_title`, `lesson_description`, `lesson_duration`, `lesson_start_date`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Introduction of Software Architecture', '<p>I have solved it. The issue was that I had to check for the instances of CKEDITOR in the&nbsp;<code>for loop</code>&nbsp;which I had not checked. So I added the&nbsp;<code>for loop</code>&nbsp;to check the instances, and everything works completely fine.</p>', '10 Hours', '2020-11-25', 2, '2020-10-30 15:20:51', '2020-10-30 15:23:32'),
(2, 'Software Architecture Development', '<p>I have solved it. The issue was that I had to check for the instances of CKEDITOR in the&nbsp;<code>for loop</code>&nbsp;which I had not checked. So I added the&nbsp;<code>for loop</code>&nbsp;to check the instances, and everything works completely fine.</p>', '8 Hours', '2020-11-26', 2, '2020-10-30 15:25:19', '2020-10-30 15:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `course_packages`
--

DROP TABLE IF EXISTS `course_packages`;
CREATE TABLE IF NOT EXISTS `course_packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_subtitle` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sub_category_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_type_id` bigint DEFAULT NULL,
  `package_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_requirements` text COLLATE utf8mb4_unicode_ci,
  `package_component` text COLLATE utf8mb4_unicode_ci,
  `package_benefit` text COLLATE utf8mb4_unicode_ci,
  `package_content` text COLLATE utf8mb4_unicode_ci,
  `package_duration` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_image` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_package_verified` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Approve, 2 = Rejected',
  `approved_by` int NOT NULL DEFAULT '0',
  `user_id` bigint NOT NULL COMMENT 'Package Creator',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = Active, 1 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_packages`
--

INSERT INTO `course_packages` (`id`, `package_title`, `package_subtitle`, `course_sub_category_id`, `institution_type_id`, `package_details`, `package_requirements`, `package_component`, `package_benefit`, `package_content`, `package_duration`, `package_image`, `is_package_verified`, `approved_by`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dghgfhhhghgf', 'xncggngc', '1,3', 1, '', NULL, NULL, NULL, NULL, '1', 'public/uploads/course-photo/thumbnail/1604264449.jpg', 1, 1, 26, 1, NULL, '2020-11-03 14:35:53'),
(2, 'xbvbvcbcvb', 'CXvcXCvxcv', '2,6', 1, '<p>xbvbvcbcv</p>', 'sdgsfgs WRGRGEGER', '<p>xffgfgfgf</p>', '<p>fdbhdggdhdh</p>', '<p>xbdfddfgdfg</p>', '2', 'public/uploads/course-photo/thumbnail/1604264449.jpg', 1, 1, 26, 1, '2020-11-01 15:00:50', '2020-11-03 14:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `course_package_batches`
--

DROP TABLE IF EXISTS `course_package_batches`;
CREATE TABLE IF NOT EXISTS `course_package_batches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_package_batch_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_package_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_package_batches`
--

INSERT INTO `course_package_batches` (`id`, `course_package_batch_title`, `course_package_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '02A', '2', 1, '2020-11-04 15:07:59', '2020-11-04 15:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `course_package_batch_student_mappings`
--

DROP TABLE IF EXISTS `course_package_batch_student_mappings`;
CREATE TABLE IF NOT EXISTS `course_package_batch_student_mappings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_package_batch_id` bigint NOT NULL,
  `user_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_package_batch_student_mappings`
--

INSERT INTO `course_package_batch_student_mappings` (`id`, `course_package_batch_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, '44', '2020-11-15 14:38:57', '2020-11-15 14:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_package_costs`
--

DROP TABLE IF EXISTS `course_package_costs`;
CREATE TABLE IF NOT EXISTS `course_package_costs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_fee` double NOT NULL,
  `package_discount_rate` int NOT NULL DEFAULT '0',
  `package_discounted_cost` double NOT NULL DEFAULT '0',
  `package_registration_last_date` date DEFAULT NULL,
  `package_start_date` date DEFAULT NULL,
  `course_package_id` bigint NOT NULL,
  `package_complete_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_package_costs`
--

INSERT INTO `course_package_costs` (`id`, `package_fee`, `package_discount_rate`, `package_discounted_cost`, `package_registration_last_date`, `package_start_date`, `course_package_id`, `package_complete_status`, `created_at`, `updated_at`) VALUES
(1, 32000, 12, 28160, '2020-11-11', '2020-11-15', 2, 0, '2020-11-01 15:18:47', '2020-11-30 13:32:38'),
(2, 25000, 20, 20000, '2021-05-27', '2021-06-16', 1, 0, '2020-11-02 07:11:21', '2020-11-02 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_package_lessons`
--

DROP TABLE IF EXISTS `course_package_lessons`;
CREATE TABLE IF NOT EXISTS `course_package_lessons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_lesson_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_lesson_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_lesson_duration` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_lesson_start_date` date DEFAULT NULL,
  `course_package_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_package_lessons`
--

INSERT INTO `course_package_lessons` (`id`, `package_lesson_title`, `package_lesson_description`, `package_lesson_duration`, `package_lesson_start_date`, `course_package_id`, `created_at`, `updated_at`) VALUES
(1, 'fbgdfgfd', '<p>dghgfjfzhjfhjf thrtrryru</p>', '10 Days', '2020-11-26', 0, '2020-11-02 09:06:08', '2020-11-02 09:06:08'),
(2, 'fbgdfgfd hjgdh', '<p>XNcbnbzncadh ryeyettyteyrty jgfhfjh</p>', '10 Days', '2020-11-26', 2, '2020-11-02 09:07:40', '2020-11-02 09:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `course_primary_categories`
--

DROP TABLE IF EXISTS `course_primary_categories`;
CREATE TABLE IF NOT EXISTS `course_primary_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `primary_category_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_primary_categories`
--

INSERT INTO `course_primary_categories` (`id`, `primary_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Academic Course', '2020-10-26 09:41:13', '2020-10-26 09:42:44'),
(2, 'Professional Course', '2020-10-26 09:43:16', '2020-10-26 09:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `course_quiz_questions`
--

DROP TABLE IF EXISTS `course_quiz_questions`;
CREATE TABLE IF NOT EXISTS `course_quiz_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_one` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_two` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_three` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_four` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_quiz_setting_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_quiz_questions`
--

INSERT INTO `course_quiz_questions` (`id`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `answer`, `course_quiz_setting_id`, `created_at`, `updated_at`) VALUES
(1, 'What is Software Life Cycle?', 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', 'tests based on multiple choice items can typically focus on a relatively broad representation of course material, thus increasing the validity of the assessment.', 'Option Three', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 1, '2020-11-16 14:47:49', '2020-11-16 14:57:48'),
(2, 'What is Software Life Cycle?', 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', 'tests based on multiple choice items can typically focus on a relatively broad representation of course material, thus increasing the validity of the assessment.', 'Option Three', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 2, '2020-11-17 06:44:15', '2020-11-17 06:44:15'),
(3, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text', 'Option Three', 'Option Four', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2020-11-17 07:51:32', '2020-11-17 07:51:32'),
(4, 'Where does it come from?', 'The standard chunk of Lorem Ipsum used since the 1500s', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,', 'Option Three', 'Option Four', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,', 2, '2020-11-17 07:52:49', '2020-11-17 07:52:49'),
(5, 'What is Software Life Cycle?', 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', 'Option Two', 'Option Three', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 'A multiple choice item consists of a problem, known as the stem, and a list of suggested solutions, known as alternatives.', 3, '2020-11-17 13:29:20', '2020-11-17 13:29:20'),
(6, 'Where does it come from?', 'A journal is a record of transactions listed as they occur that shows the specific accounts affected by the transaction.', 'Option Two', 'Option Three', 'Option Four', 'A journal is a record of transactions listed as they occur that shows the specific accounts affected by the transaction.', 3, '2020-11-17 13:30:08', '2020-11-17 13:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_quiz_settings`
--

DROP TABLE IF EXISTS `course_quiz_settings`;
CREATE TABLE IF NOT EXISTS `course_quiz_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_duration` bigint NOT NULL,
  `course_batch_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_quiz_settings`
--

INSERT INTO `course_quiz_settings` (`id`, `quiz_name`, `time_duration`, `course_batch_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quiz One', 30, 3, 1, '2020-11-16 14:09:27', '2020-11-16 14:24:39'),
(2, 'Software Development Quiz - One', 20, 1, 1, '2020-11-17 06:43:45', '2020-11-17 06:43:45'),
(3, 'Software Development Quiz - Two', 10, 1, 1, '2020-11-17 13:28:44', '2020-11-17 13:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `course_secondary_categories`
--

DROP TABLE IF EXISTS `course_secondary_categories`;
CREATE TABLE IF NOT EXISTS `course_secondary_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `secondary_category_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_primary_category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_secondary_categories`
--

INSERT INTO `course_secondary_categories` (`id`, `secondary_category_name`, `course_primary_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Class Five', 1, '2020-10-26 13:38:56', '2020-10-26 13:40:06'),
(2, 'Software Development', 2, '2020-10-26 13:41:34', '2020-10-26 13:41:34'),
(3, 'Class Six', 1, '2020-10-30 09:54:18', '2020-10-30 09:54:18'),
(4, 'Database Administrator', 2, '2020-10-30 09:54:56', '2020-10-30 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `course_student_reviews`
--

DROP TABLE IF EXISTS `course_student_reviews`;
CREATE TABLE IF NOT EXISTS `course_student_reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `course_id` bigint NOT NULL,
  `type` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_student_reviews`
--

INSERT INTO `course_student_reviews` (`id`, `user_id`, `course_id`, `type`, `rating`, `comments`, `created_at`, `updated_at`) VALUES
(2, 44, 2, 'course', 5, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2020-11-22 04:36:20', '2020-11-22 04:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_categories`
--

DROP TABLE IF EXISTS `course_sub_categories`;
CREATE TABLE IF NOT EXISTS `course_sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_secondary_category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sub_categories`
--

INSERT INTO `course_sub_categories` (`id`, `sub_category_name`, `course_secondary_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Math', 1, '2020-10-26 14:04:15', '2020-10-26 14:04:15'),
(2, 'Html', 2, '2020-10-26 14:28:33', '2020-10-26 14:28:33'),
(3, 'English', 1, '2020-10-30 09:56:03', '2020-10-30 09:56:03'),
(4, 'Bangla', 3, '2020-10-30 09:56:32', '2020-10-30 09:56:32'),
(5, 'Database Structure', 4, '2020-10-30 09:57:16', '2020-10-30 09:57:16'),
(6, 'Software Architecture', 2, '2020-10-30 09:58:42', '2020-10-30 09:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `employment_histories`
--

DROP TABLE IF EXISTS `employment_histories`;
CREATE TABLE IF NOT EXISTS `employment_histories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `company_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_business` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_histories`
--

INSERT INTO `employment_histories` (`id`, `user_id`, `company_name`, `company_business`, `designation`, `department`, `responsibility`, `start_date`, `end_date`, `company_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kakatuwa Media Ltd', 'Kakatuwa Media Ltd', 'Programmer', 'Software', 'Maintenance Web Application', '2014-05-05', NULL, 'Dhanmondi, Dhaka -1207', '2020-10-08 06:38:10', '2020-10-08 06:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `free_quizzes`
--

DROP TABLE IF EXISTS `free_quizzes`;
CREATE TABLE IF NOT EXISTS `free_quizzes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `questions` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_one` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_two` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_three` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_four` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_quiz_setting_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `free_quizzes`
--

INSERT INTO `free_quizzes` (`id`, `questions`, `option_one`, `option_two`, `option_three`, `option_four`, `answer`, `free_quiz_setting_id`, `created_at`, `updated_at`) VALUES
(1, 'What is the Software Development Life Cycle?', 'Option One', 'Option Two', 'Option Three', 'Option Four', 'Option One', 1, '2020-11-14 07:09:37', '2020-11-14 07:52:24'),
(2, 'What is Software Life Cycle:', 'Option One', 'Option Two', 'Option Three', 'Option Four', 'Option Two', 2, '2020-11-14 08:06:21', '2020-11-14 08:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `free_quiz_settings`
--

DROP TABLE IF EXISTS `free_quiz_settings`;
CREATE TABLE IF NOT EXISTS `free_quiz_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_duration` bigint NOT NULL,
  `course_sub_category_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `free_quiz_settings`
--

INSERT INTO `free_quiz_settings` (`id`, `quiz_name`, `time_duration`, `course_sub_category_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Software Development Quiz - One', 60, 2, 26, 1, '2020-11-14 05:42:35', '2020-11-14 06:12:23'),
(2, 'Software Development Quiz - Two', 30, 6, 26, 1, '2020-11-14 08:04:57', '2020-11-14 08:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `institution_types`
--

DROP TABLE IF EXISTS `institution_types`;
CREATE TABLE IF NOT EXISTS `institution_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_type_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution_types`
--

INSERT INTO `institution_types` (`id`, `institution_type_name`, `created_at`, `updated_at`) VALUES
(1, 'English Version', '2020-10-27 09:45:02', '2020-10-27 13:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint NOT NULL,
  `type` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1661372959, 'user', 38, 26, 'Hello', NULL, 1, '2020-11-28 14:03:52', '2021-05-07 23:39:00'),
(2045118681, 'user', 35, 26, 'Hello Sir', NULL, 1, '2020-11-28 13:51:17', '2020-11-28 14:11:10'),
(1897506356, 'user', 26, 44, 'Hi', NULL, 0, '2020-11-28 14:17:43', '2020-11-28 14:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_22_195714_create_permission_tables', 2),
(5, '2020_10_01_120816_create_login_logs_table', 3),
(6, '2020_10_01_135401_add_login_fields_to_users_table', 4),
(7, '2020_10_02_124304_create_activity_log_table', 5),
(8, '2020_10_04_151832_add_is_active_to_users_table', 6),
(9, '2020_10_06_110422_create_personal_informations_table', 7),
(10, '2020_10_06_194016_create_academic_qualifications_table', 8),
(11, '2020_10_06_194628_create_training_informations_table', 8),
(12, '2020_10_06_194747_create_special_qualifications_table', 8),
(13, '2020_10_06_194832_create_employment_histories_table', 8),
(14, '2020_10_06_194937_create_professional_qualifications_table', 8),
(15, '2020_10_06_200735_change_column_type_in_personal_informations_table', 8),
(16, '2020_10_08_104248_add_column_in_special_qualifications_table', 9),
(17, '2020_10_08_104958_add_column_in_special_qualification_table', 10),
(18, '2020_10_08_105354_add_column_in_special_qualifications_table', 11),
(19, '2020_10_08_105601_add_column_in_special_qualifications_table', 12),
(20, '2020_10_09_063715_add_column_in_personal_informations_table', 13),
(21, '2020_10_10_135908_add_comments_in_users_table', 14),
(22, '2020_10_12_202436_add_column_in_academic_qualifications_table', 15),
(23, '2020_10_14_144109_create_referral_packages_table', 16),
(24, '2020_10_14_144456_create_referral_agents_table', 16),
(25, '2020_10_14_144621_create_referred_students_table', 16),
(26, '2020_10_14_185907_rename_column_in_referral_agents_table', 17),
(27, '2020_10_17_122015_create_transactions_table', 18),
(28, '2020_10_23_130531_create_notifications_table', 19),
(29, '2020_10_23_131830_change_column_in_notifications_table', 20),
(30, '2020_10_23_143148_change_column_type_in_notifications_table', 21),
(31, '2020_10_25_145802_create_course_primary_categories_table', 22),
(32, '2020_10_25_150123_create_course_secondary_categories_table', 22),
(33, '2020_10_25_150151_create_course_sub_categories_table', 22),
(34, '2020_10_25_150213_create_courses_table', 22),
(35, '2020_10_25_205102_create_pdf_libraries_table', 23),
(36, '2020_10_25_205403_create_video_libraries_table', 23),
(37, '2020_10_25_205438_create_course_packages_table', 23),
(38, '2020_10_25_205508_create_course_batches_table', 23),
(39, '2020_10_25_205540_create_course_package_batches_table', 23),
(40, '2020_10_25_205619_create_course_enrollments_table', 23),
(41, '2020_10_25_205659_create_course_batch_student_mappings_table', 23),
(42, '2020_10_25_205814_create_course_package_batch_student_mappings_table', 23),
(43, '2020_10_25_205941_create_teacher_course_evaluations_table', 23),
(44, '2020_10_25_213226_create_course_packages_table', 24),
(45, '2020_10_26_203037_add_column_in_courses_table', 25),
(46, '2020_10_26_204033_add_column_in_course_packages_table', 25),
(47, '2020_10_26_204505_create_institution_types_table', 25),
(48, '2020_10_28_170341_create_course_costs_table', 26),
(49, '2020_10_28_172157_create_course_package_costs_table', 26),
(50, '2020_10_28_172549_remove_column_in_courses_table', 27),
(51, '2020_10_28_172633_remove_column_in_course_packages_table', 27),
(52, '2020_10_30_193045_add_column_in_course_costs_table', 28),
(53, '2020_10_30_194513_add_column_in_course_package_costs_table', 28),
(54, '2020_10_30_194802_create_course_lessons_table', 28),
(55, '2020_10_30_194852_create_course_package_lessons_table', 28),
(56, '2020_11_04_192300_change_column_type_in_course_batch_student_mappings_table', 29),
(57, '2020_11_04_192639_change_column_type_in_course_package_batch_student_mappings_table', 29),
(58, '2020_11_05_195716_add_column_in_pdf_libraries_table', 30),
(59, '2020_11_05_200041_add_column_in_video_libraries_table', 30),
(60, '2020_11_13_143913_create_free_quizzes_table', 31),
(61, '2020_11_13_150440_create_free_quiz_settings_table', 31),
(62, '2020_11_16_130150_create_course_quiz_settings_table', 32),
(63, '2020_11_16_130820_create_course_quiz_questions_table', 33),
(64, '2020_11_16_130911_create_course_assignments_table', 33),
(65, '2020_11_16_131522_create_student_course_quiz_answers_table', 33),
(66, '2020_11_16_131702_create_student_course_assignments_table', 33),
(67, '2020_11_16_145157_create_student_package_assignments_table', 33),
(68, '2020_11_16_145336_create_package_quiz_settings_table', 33),
(69, '2020_11_16_145407_create_package_quiz_questions_table', 33),
(70, '2020_11_16_145437_create_package_assignments_table', 33),
(71, '2020_11_16_145605_create_student_package_quiz_answers_table', 33),
(72, '2020_11_21_152511_create_student_results_table', 34),
(73, '2020_11_22_102008_create_course_student_reviews_table', 35),
(74, '2020_11_22_104851_create_teacher_evaluations_table', 36),
(75, '2019_09_22_192348_create_messages_table', 37),
(76, '2019_10_16_211433_create_favorites_table', 37),
(77, '2019_10_18_223259_add_avatar_to_users', 37),
(78, '2019_10_20_211056_add_messenger_color_to_users', 37),
(79, '2019_10_22_000539_add_dark_mode_to_users', 37),
(80, '2019_10_25_214038_add_active_status_to_users', 37),
(81, '2020_11_27_193421_create_teachers_commissions_table', 38),
(82, '2020_11_29_143138_create_payments_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 11),
(1, 'App\\User', 14),
(1, 'App\\User', 15),
(1, 'App\\User', 19),
(4, 'App\\User', 3),
(4, 'App\\User', 4),
(4, 'App\\User', 5),
(4, 'App\\User', 6),
(4, 'App\\User', 7),
(4, 'App\\User', 8),
(4, 'App\\User', 9),
(4, 'App\\User', 10),
(4, 'App\\User', 12),
(4, 'App\\User', 13),
(4, 'App\\User', 20),
(4, 'App\\User', 21),
(4, 'App\\User', 22),
(5, 'App\\User', 23),
(5, 'App\\User', 26),
(5, 'App\\User', 40),
(6, 'App\\User', 25),
(6, 'App\\User', 27),
(6, 'App\\User', 32),
(7, 'App\\User', 24),
(7, 'App\\User', 28),
(7, 'App\\User', 29),
(7, 'App\\User', 30),
(7, 'App\\User', 31),
(7, 'App\\User', 33),
(7, 'App\\User', 34),
(7, 'App\\User', 35),
(7, 'App\\User', 36),
(7, 'App\\User', 37),
(7, 'App\\User', 38),
(7, 'App\\User', 39),
(7, 'App\\User', 41),
(7, 'App\\User', 42),
(7, 'App\\User', 43),
(7, 'App\\User', 44);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `notification_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_title`, `publish_date`, `notification_details`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Class Time Schedule', '2020-10-23', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '4', 0, '2020-10-23 08:09:21', '2020-10-23 09:36:37'),
(2, 'Class Time Schedule', '2020-10-23', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '5', 1, '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(3, 'Class Time Schedule', '2020-10-23', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '6', 1, '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(4, 'Class Time Schedule', '2020-10-23', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '7', 1, '2020-10-23 08:09:21', '2020-10-23 08:09:21'),
(5, 'Class Time Re-schedule', '2020-10-23', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '4,5,6', 1, '2020-10-23 08:47:45', '2020-10-23 09:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `package_assignments`
--

DROP TABLE IF EXISTS `package_assignments`;
CREATE TABLE IF NOT EXISTS `package_assignments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_last_date` date NOT NULL,
  `course_package_batch_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_assignments`
--

INSERT INTO `package_assignments` (`id`, `title`, `details`, `submit_last_date`, `course_package_batch_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Online Education System', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2020-11-30', 1, 1, '2020-11-18 14:26:36', '2020-11-18 14:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_quiz_questions`
--

DROP TABLE IF EXISTS `package_quiz_questions`;
CREATE TABLE IF NOT EXISTS `package_quiz_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_one` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_two` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_three` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_four` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_quiz_setting_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_quiz_questions`
--

INSERT INTO `package_quiz_questions` (`id`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `answer`, `package_quiz_setting_id`, `created_at`, `updated_at`) VALUES
(1, 'What is Software Life Cycle?', 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', 'Option Two', 'Option Three', 'Option Four', 'Option Three', 1, '2020-11-18 14:24:48', '2020-11-18 14:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `package_quiz_settings`
--

DROP TABLE IF EXISTS `package_quiz_settings`;
CREATE TABLE IF NOT EXISTS `package_quiz_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_duration` bigint NOT NULL,
  `course_package_batch_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_quiz_settings`
--

INSERT INTO `package_quiz_settings` (`id`, `quiz_name`, `time_duration`, `course_package_batch_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quiz One', 15, 1, 1, '2020-11-18 14:24:08', '2020-11-18 14:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `is_withdraw` tinyint(1) NOT NULL DEFAULT '0',
  `amount` double NOT NULL,
  `paid_amount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `is_withdraw`, `amount`, `paid_amount`, `created_at`, `updated_at`) VALUES
(1, 27, 1, 1000, 1000, '2020-08-15 19:32:06', '2020-08-15 19:32:21'),
(2, 27, 1, 2000, 2000, '2020-10-02 19:32:29', '2020-10-02 19:32:36'),
(3, 27, 1, 3000, 1000, '2020-10-13 19:50:38', '2020-10-13 19:50:38'),
(4, 27, 1, 7000, 4000, '2020-11-14 19:50:38', '2020-11-14 19:50:38'),
(6, 27, 1, 6000, 2000, '2020-11-30 10:02:08', '2020-12-02 05:28:31'),
(7, 26, 1, 59850, 10000, '2020-12-01 08:46:31', '2021-05-07 12:30:41'),
(8, 1, 1, 3200, 1000, '2020-12-03 09:04:23', '2021-05-07 12:39:47'),
(9, 26, 0, 49850, 0, '2021-05-07 12:48:19', '2021-05-07 12:48:19'),
(10, 27, 0, 9000, 0, '2021-05-07 12:55:25', '2021-05-07 12:55:25'),
(11, 1, 0, 2200, 0, '2021-05-07 12:57:37', '2021-05-07 12:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_libraries`
--

DROP TABLE IF EXISTS `pdf_libraries`;
CREATE TABLE IF NOT EXISTS `pdf_libraries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_location` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sub_category_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_libraries`
--

INSERT INTO `pdf_libraries` (`id`, `title`, `pdf_location`, `course_sub_category_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Online Education System', 'public/uploads/pdf-library/1604609360.pdf', 6, 1, 26, '2020-11-05 14:49:20', '2020-11-05 14:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-09-28 14:01:01', '2020-09-28 14:01:01'),
(2, 'role-create', 'web', '2020-09-28 14:05:15', '2020-09-28 14:05:15'),
(3, 'role-edit', 'web', '2020-09-28 14:05:28', '2020-09-28 14:05:28'),
(4, 'role-delete', 'web', '2020-09-28 14:05:43', '2020-09-28 14:05:43'),
(5, 'permission-list', 'web', '2020-09-28 14:06:33', '2020-09-28 14:06:33'),
(6, 'permission-create', 'web', '2020-09-28 14:06:56', '2020-09-28 14:06:56'),
(7, 'permission-edit', 'web', '2020-09-28 14:07:14', '2020-09-28 14:07:14'),
(8, 'permission-delete', 'web', '2020-09-29 12:45:08', '2020-10-02 06:58:38'),
(10, 'role-details', 'web', '2020-10-01 01:53:10', '2020-10-01 01:53:10'),
(11, 'user-list', 'web', '2020-10-02 08:07:23', '2020-10-02 08:07:23'),
(12, 'user-create', 'web', '2020-10-02 08:08:04', '2020-10-02 08:08:04'),
(13, 'user-edit', 'web', '2020-10-02 08:08:35', '2020-10-02 08:08:35'),
(14, 'user-delete', 'web', '2020-10-02 08:08:58', '2020-10-02 08:08:58'),
(15, 'activity-log', 'web', '2020-10-02 14:00:31', '2020-10-02 14:00:31'),
(16, 'pending-teacher-list', 'web', '2020-10-04 14:19:42', '2020-10-09 08:04:28'),
(17, 'user-approve', 'web', '2020-10-04 14:27:35', '2020-10-04 14:27:35'),
(18, 'dashboard', 'web', '2020-10-09 06:57:35', '2020-10-09 06:57:35'),
(19, 'teacher-list', 'web', '2020-10-10 06:39:55', '2020-10-10 06:39:55'),
(20, 'suspend-user', 'web', '2020-10-10 07:02:21', '2020-10-10 08:30:45'),
(21, 'suspended-teacher-list', 'web', '2020-10-10 08:34:03', '2020-10-10 08:34:03'),
(22, 'pending-student-list', 'web', '2020-10-10 13:07:27', '2020-10-10 13:07:27'),
(23, 'student-list', 'web', '2020-10-10 13:07:39', '2020-10-10 13:07:39'),
(24, 'suspended-student-list', 'web', '2020-10-10 13:07:57', '2020-10-10 13:07:57'),
(25, 'pending-agent-list', 'web', '2020-10-10 13:18:23', '2020-10-10 13:18:23'),
(26, 'agent-list', 'web', '2020-10-10 13:18:40', '2020-10-10 13:18:40'),
(27, 'suspended-agent-list', 'web', '2020-10-10 13:19:03', '2020-10-10 13:19:03'),
(28, 'user-profile', 'web', '2020-10-12 15:10:50', '2020-10-12 15:10:50'),
(29, 'referral-package-list', 'web', '2020-10-14 12:40:27', '2020-10-14 12:40:27'),
(30, 'referral-agent-list', 'web', '2020-10-14 12:40:42', '2020-10-14 12:40:42'),
(31, 'referred-student-list', 'web', '2020-10-14 12:40:55', '2020-10-14 12:40:55'),
(32, 'referral-package-create', 'web', '2020-10-14 13:19:57', '2020-10-14 13:19:57'),
(33, 'edit-package', 'web', '2020-10-15 07:29:13', '2020-10-15 07:29:13'),
(34, 'delete-package', 'web', '2020-10-15 07:29:25', '2020-10-15 07:29:25'),
(35, 'notification-list', 'web', '2020-10-23 07:23:59', '2020-10-23 07:23:59'),
(36, 'edit-notification', 'web', '2020-10-23 09:01:01', '2020-10-23 09:01:01'),
(37, 'close-notification', 'web', '2020-10-23 09:01:16', '2020-10-23 09:01:16'),
(38, 'course-primary-category-list', 'web', '2020-10-26 09:00:32', '2020-10-26 09:00:32'),
(39, 'course-secondary-category-list', 'web', '2020-10-26 09:00:50', '2020-10-26 09:00:50'),
(40, 'course-sub-category-list', 'web', '2020-10-26 09:01:07', '2020-10-26 09:01:07'),
(41, 'edit-course-primary-category', 'web', '2020-10-26 09:41:59', '2020-10-26 09:41:59'),
(42, 'edit-course-secondary-category', 'web', '2020-10-26 13:55:11', '2020-10-26 13:55:11'),
(43, 'edit-course-Sub-category', 'web', '2020-10-26 13:55:28', '2020-10-26 13:55:28'),
(44, 'institution-type-list', 'web', '2020-10-27 09:29:15', '2020-10-27 09:29:35'),
(45, 'edit-institution-type', 'web', '2020-10-27 13:14:59', '2020-10-27 13:14:59'),
(46, 'course-list', 'web', '2020-10-28 10:33:13', '2020-10-28 10:33:13'),
(47, 'edit-course', 'web', '2020-10-28 12:50:00', '2020-10-28 12:50:00'),
(48, 'course-create', 'web', '2020-10-28 12:53:22', '2020-10-28 12:53:22'),
(49, 'view-course', 'web', '2020-10-28 12:58:24', '2020-10-28 12:58:24'),
(50, 'delete-course', 'web', '2020-10-28 12:58:39', '2020-10-28 12:58:39'),
(51, 'course-cost', 'web', '2020-10-28 12:59:07', '2020-10-28 12:59:07'),
(52, 'edit-course-cost', 'web', '2020-10-30 00:54:57', '2020-10-30 00:54:57'),
(53, 'course-lesson', 'web', '2020-10-30 14:15:38', '2020-10-30 14:15:38'),
(54, 'edit-course-lesson', 'web', '2020-10-30 15:26:51', '2020-10-30 15:26:51'),
(55, 'course-package-list', 'web', '2020-10-31 13:00:31', '2020-10-31 13:00:31'),
(56, 'course-package-create', 'web', '2020-11-01 14:26:38', '2020-11-01 14:26:38'),
(57, 'view-course-package', 'web', '2020-11-01 14:27:07', '2020-11-01 14:27:07'),
(58, 'edit-course-package', 'web', '2020-11-01 14:27:29', '2020-11-01 14:27:29'),
(59, 'course-package-cost', 'web', '2020-11-01 14:27:48', '2020-11-01 14:27:48'),
(60, 'course-package-lesson', 'web', '2020-11-01 14:28:10', '2020-11-01 14:28:10'),
(61, 'edit-course-package-cost', 'web', '2020-11-01 15:24:11', '2020-11-01 15:24:11'),
(62, 'course-batch', 'web', '2020-11-03 08:30:32', '2020-11-03 08:30:32'),
(63, 'course-batch-student-mapping', 'web', '2020-11-03 08:30:48', '2020-11-03 08:30:48'),
(64, 'course-package-batch', 'web', '2020-11-03 08:31:05', '2020-11-03 08:31:05'),
(65, 'course-package-batch-student-mapping', 'web', '2020-11-03 08:31:25', '2020-11-03 08:31:25'),
(66, 'pdf-library', 'web', '2020-11-03 08:31:42', '2020-11-03 08:31:42'),
(67, 'video-library', 'web', '2020-11-03 08:31:59', '2020-11-03 08:31:59'),
(68, 'pending-course-list', 'web', '2020-11-03 08:32:16', '2020-11-03 08:32:16'),
(69, 'active-course-list', 'web', '2020-11-03 08:32:33', '2020-11-03 08:32:33'),
(70, 'inactive-course-list', 'web', '2020-11-03 08:32:52', '2020-11-03 08:32:52'),
(71, 'pending-course-package-list', 'web', '2020-11-03 08:33:09', '2020-11-03 08:33:09'),
(72, 'active-course-package-list', 'web', '2020-11-03 08:33:27', '2020-11-03 08:33:27'),
(73, 'inactive-course-package-list', 'web', '2020-11-03 08:33:45', '2020-11-03 08:33:45'),
(74, 'add-course-cost', 'web', '2020-11-03 09:24:17', '2020-11-03 09:24:17'),
(75, 'add-course-lesson', 'web', '2020-11-03 09:24:33', '2020-11-03 09:24:33'),
(76, 'approve-course', 'web', '2020-11-03 09:32:26', '2020-11-03 09:32:26'),
(77, 'reject-course', 'web', '2020-11-03 09:32:45', '2020-11-03 09:32:45'),
(78, 'inactivate-course', 'web', '2020-11-03 13:10:49', '2020-11-03 13:10:49'),
(79, 'activate-course', 'web', '2020-11-03 13:29:46', '2020-11-03 13:29:46'),
(80, 'approve-course-package', 'web', '2020-11-03 14:11:42', '2020-11-03 14:11:42'),
(81, 'reject-course-package', 'web', '2020-11-03 14:11:57', '2020-11-03 14:11:57'),
(82, 'add-course-package-cost', 'web', '2020-11-03 14:15:21', '2020-11-03 14:15:21'),
(83, 'add-course-package-lesson', 'web', '2020-11-03 14:16:42', '2020-11-03 14:16:42'),
(84, 'edit-course-package-lesson', 'web', '2020-11-03 14:17:27', '2020-11-03 14:17:27'),
(85, 'inactivate-course-package', 'web', '2020-11-03 14:25:52', '2020-11-03 14:25:52'),
(86, 'activate-course-package', 'web', '2020-11-03 14:26:52', '2020-11-03 14:26:52'),
(87, 'edit-course-batch', 'web', '2020-11-04 13:52:19', '2020-11-04 13:52:19'),
(88, 'add-student-batch', 'web', '2020-11-04 13:52:36', '2020-11-04 13:52:36'),
(89, 'add-course-batch', 'web', '2020-11-04 13:52:54', '2020-11-04 13:52:54'),
(90, 'close-course-batch', 'web', '2020-11-04 14:10:57', '2020-11-04 14:10:57'),
(91, 'edit-package-batch', 'web', '2020-11-04 15:03:24', '2020-11-04 15:03:24'),
(92, 'close-package-batch', 'web', '2020-11-04 15:03:49', '2020-11-04 15:03:49'),
(93, 'add-package-batch', 'web', '2020-11-04 15:04:06', '2020-11-04 15:04:06'),
(94, 'create-pdf-library', 'web', '2020-11-05 14:15:55', '2020-11-05 14:15:55'),
(95, 'view-pdf', 'web', '2020-11-05 14:16:14', '2020-11-05 14:16:14'),
(96, 'delete-pdf', 'web', '2020-11-05 14:16:27', '2020-11-05 14:16:27'),
(97, 'create-video-library', 'web', '2020-11-06 13:12:32', '2020-11-06 13:12:32'),
(98, 'delete-Video', 'web', '2020-11-06 13:12:50', '2020-11-06 13:12:50'),
(99, 'library-pdf-admin', 'web', '2020-11-06 13:33:03', '2020-11-06 13:33:03'),
(100, 'library-video-admin', 'web', '2020-11-06 13:33:15', '2020-11-06 13:33:15'),
(101, 'free-quiz-setting', 'web', '2020-11-13 09:46:58', '2020-11-13 09:46:58'),
(102, 'create-free-quiz', 'web', '2020-11-13 09:47:21', '2020-11-13 09:47:21'),
(103, 'free-quiz-questions', 'web', '2020-11-13 09:47:38', '2020-11-13 09:47:38'),
(104, 'edit-free-quiz', 'web', '2020-11-13 09:47:51', '2020-11-13 09:47:51'),
(105, 'create-free-quiz-questions', 'web', '2020-11-14 06:36:48', '2020-11-14 06:36:48'),
(106, 'edit-free-quiz-questions', 'web', '2020-11-14 06:37:08', '2020-11-14 06:37:08'),
(107, 'free-quiz-admin', 'web', '2020-11-15 06:02:08', '2020-11-15 06:02:08'),
(108, 'add-course-batch-student', 'web', '2020-11-15 08:38:18', '2020-11-15 08:38:18'),
(109, 'remove-student-batch', 'web', '2020-11-15 14:26:29', '2020-11-15 14:26:29'),
(110, 'add-package-batch-student', 'web', '2020-11-15 14:26:48', '2020-11-15 14:26:48'),
(111, 'course-quiz', 'web', '2020-11-16 01:41:42', '2020-11-16 01:41:42'),
(112, 'course-assignment', 'web', '2020-11-16 01:41:55', '2020-11-16 01:41:55'),
(113, 'course-quiz-questions', 'web', '2020-11-16 14:12:06', '2020-11-16 14:12:06'),
(114, 'edit-course-quiz', 'web', '2020-11-16 14:12:22', '2020-11-16 14:12:22'),
(115, 'add-course-quiz', 'web', '2020-11-16 14:34:56', '2020-11-16 14:34:56'),
(116, 'edit-course-quiz-questions', 'web', '2020-11-16 14:35:15', '2020-11-16 14:35:15'),
(117, 'add-course-quiz-question', 'web', '2020-11-16 14:35:29', '2020-11-16 14:35:29'),
(118, 'edit-course-assignment', 'web', '2020-11-17 06:09:11', '2020-11-17 06:09:11'),
(119, 'add-course-assignment', 'web', '2020-11-17 06:09:28', '2020-11-17 06:09:28'),
(120, 'package-quiz', 'web', '2020-11-18 08:09:09', '2020-11-18 08:09:09'),
(121, 'package-assignment', 'web', '2020-11-18 08:09:35', '2020-11-18 08:09:35'),
(122, 'edit-package-assignment', 'web', '2020-11-18 14:20:50', '2020-11-18 14:20:50'),
(123, 'add-package-assignment', 'web', '2020-11-18 14:21:06', '2020-11-18 14:21:06'),
(124, 'package-quiz-questions', 'web', '2020-11-18 14:21:23', '2020-11-18 14:21:23'),
(125, 'edit-package-quiz', 'web', '2020-11-18 14:21:39', '2020-11-18 14:21:39'),
(126, 'add-package-quiz', 'web', '2020-11-18 14:21:55', '2020-11-18 14:21:55'),
(127, 'edit-package-quiz-questions', 'web', '2020-11-18 14:22:12', '2020-11-18 14:22:12'),
(128, 'add-package-quiz-question', 'web', '2020-11-18 14:22:30', '2020-11-18 14:22:30'),
(129, 'student-quiz-answer', 'web', '2020-11-21 08:56:31', '2020-11-21 08:56:31'),
(130, 'student-assignment', 'web', '2020-11-21 08:56:57', '2020-11-21 08:56:57'),
(131, 'student-marks-list', 'web', '2020-11-21 13:24:12', '2020-11-21 13:24:12'),
(132, 'add-student-mark', 'web', '2020-11-21 13:24:30', '2020-11-21 13:24:30'),
(133, 'add-student-package-mark', 'web', '2020-11-21 14:44:52', '2020-11-21 14:44:52'),
(134, 'student-package-quiz-answer', 'web', '2020-11-21 14:45:09', '2020-11-21 14:45:09'),
(135, 'student-package-assignment', 'web', '2020-11-21 14:45:27', '2020-11-21 14:45:27'),
(136, 'student-package-marks-list', 'web', '2020-11-21 14:45:45', '2020-11-21 14:45:45'),
(137, 'course-quiz-answers', 'web', '2020-11-21 14:49:13', '2020-11-21 14:49:13'),
(138, 'package-quiz-answers', 'web', '2020-11-21 14:49:36', '2020-11-21 14:49:36'),
(139, 'course-review', 'web', '2020-11-23 01:20:36', '2020-11-23 01:20:36'),
(140, 'teacher-review', 'web', '2020-11-23 01:21:01', '2020-11-23 01:21:01'),
(141, 'live-chat', 'web', '2020-11-25 13:54:46', '2020-11-25 13:54:46'),
(142, 'teachers-commission', 'web', '2020-11-27 13:24:45', '2020-11-27 15:28:42'),
(143, 'accounts-finance', 'web', '2020-11-29 09:44:01', '2020-11-29 09:44:01'),
(144, 'account-summery-agent', 'web', '2020-11-29 13:46:31', '2020-11-29 13:46:31'),
(145, 'incomplete-course', 'web', '2020-11-30 12:09:13', '2020-11-30 12:09:13'),
(146, 'complete-course', 'web', '2020-11-30 12:09:35', '2020-11-30 12:09:35'),
(147, 'incomplete-package', 'web', '2020-11-30 12:09:58', '2020-11-30 12:09:58'),
(148, 'complete-package', 'web', '2020-11-30 12:10:17', '2020-11-30 12:10:17'),
(149, 'account-summery-teacher', 'web', '2020-11-30 12:10:40', '2020-11-30 12:10:40'),
(150, 'pending-payment-request', 'web', '2020-12-02 05:35:20', '2020-12-02 05:35:20'),
(151, 'approve-payment-request', 'web', '2020-12-02 05:35:43', '2020-12-02 05:35:43'),
(152, 'payment-history', 'web', '2020-12-02 05:42:27', '2020-12-02 05:52:04'),
(153, 'referred-student', 'web', '2020-12-02 07:48:48', '2020-12-02 07:48:48'),
(154, 'course-completed-student', 'web', '2020-12-02 13:50:08', '2020-12-02 13:50:08'),
(155, 'approve-complete-course', 'web', '2020-12-02 13:59:19', '2020-12-02 13:59:19'),
(156, 'approve-complete-package', 'web', '2020-12-02 13:59:41', '2020-12-02 13:59:41'),
(157, 'course-status', 'web', '2020-12-02 14:06:07', '2020-12-02 14:06:07'),
(158, 'package-status', 'web', '2020-12-02 14:06:21', '2020-12-02 14:06:21'),
(159, 'account-summery', 'web', '2020-12-03 07:00:34', '2020-12-03 07:00:34'),
(160, 'total-payment', 'web', '2020-12-03 09:00:14', '2020-12-03 09:00:14'),
(161, 'total-income', 'web', '2020-12-03 09:00:44', '2020-12-03 09:00:44'),
(162, 'income-summery', 'web', '2020-12-03 09:01:07', '2020-12-03 09:01:07'),
(163, 'payment-summery', 'web', '2020-12-03 09:01:27', '2020-12-03 09:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_informations`
--

DROP TABLE IF EXISTS `personal_informations`;
CREATE TABLE IF NOT EXISTS `personal_informations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `mobile` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `fathers_name` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_no` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `home_district` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `upazila` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_location` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_informations`
--

INSERT INTO `personal_informations` (`id`, `user_id`, `mobile`, `birth_date`, `fathers_name`, `mothers_name`, `gender`, `marital_status`, `nationality`, `national_id_no`, `religion`, `permanent_address`, `home_district`, `present_address`, `upazila`, `current_location`, `image`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 1, '1738451191', '1987-11-01', 'Md. Osman Patawary', 'Laily Pervin', 'Man', 'Married', 'Bangladeshi', '1483607626', 'Islam', 'Japan Garden City, Mohammadpur', 'Chadpur', 'Japan Garden City, Mohammadpur', 'Khairul Shab', 'Mohammadpur', 'public/uploads/profile-photo/thumbnail/1602236420.jpg', 'public/uploads/cover-photo/thumbnail/1602236089.jpg', '2020-10-06 05:44:10', '2020-10-09 03:40:20'),
(2, 4, '1738451191', '1975-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chadpur', NULL, 'Nandil', NULL, NULL, NULL, '2020-10-06 05:53:40', '2020-10-06 05:53:40'),
(3, 23, '1676152714', '1991-06-13', 'sdfsdfsdfdf', 'sdsdfdfd', 'dfdff', 'cvsfs', 'dfsddf', '2442343', 'dfsdf', 'dfgfgfddfgfgfggfdgg', 'Dinajput', 'dfgdfgf', 'Nandil', 'dfgdfgfd', NULL, NULL, '2020-10-09 08:58:06', '2020-10-09 08:58:06'),
(4, 24, '1676152714', '2001-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-10-10 08:57:08', '2020-10-10 08:57:08'),
(5, 25, '1676152714', '1974-06-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chadpur', NULL, 'Burichang', NULL, NULL, NULL, '2020-10-10 13:28:00', '2020-10-10 13:28:00'),
(6, 26, '1676152714', '2009-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dinajput', NULL, 'Burichang', NULL, NULL, NULL, '2020-10-10 14:33:00', '2020-10-10 14:33:00'),
(7, 27, '1738451191', '1988-06-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Comillah', NULL, 'Muradnagar', NULL, NULL, NULL, '2020-10-15 13:37:56', '2020-10-15 13:37:56'),
(15, 35, '1738451191', '2013-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-10-18 09:29:43', '2020-10-18 09:29:43'),
(12, 32, '1738451191', '2017-02-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chadpur', NULL, 'Nandil', NULL, NULL, NULL, '2020-10-18 09:00:31', '2020-10-18 09:00:31'),
(16, 36, '1738451191', '2012-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-10-19 06:18:16', '2020-10-19 06:18:16'),
(17, 37, '1738451191', '2011-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-10-19 06:21:43', '2020-10-19 06:21:43'),
(18, 38, '1738451191', '2015-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-10-19 06:26:30', '2020-10-19 06:26:30'),
(19, 39, '1738451191', '2001-02-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chadpur', NULL, 'Burichang', NULL, NULL, NULL, '2020-10-19 06:34:10', '2020-10-19 06:34:10'),
(20, 40, '1676152714', '1974-06-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chadpur', NULL, 'Nandil', NULL, NULL, NULL, '2020-11-01 13:32:47', '2020-11-01 13:32:47'),
(22, 42, '1676152714', '2002-01-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-11-11 09:36:00', '2020-11-11 09:36:00'),
(24, 44, '1676152714', '1993-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Natore', NULL, 'Boraigram', NULL, NULL, NULL, '2020-11-11 13:53:31', '2020-11-11 13:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `professional_qualifications`
--

DROP TABLE IF EXISTS `professional_qualifications`;
CREATE TABLE IF NOT EXISTS `professional_qualifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `certificate_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_qualifications`
--

INSERT INTO `professional_qualifications` (`id`, `user_id`, `certificate_name`, `institute`, `location`, `form_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'WPSI', 'IDB-BISEW', 'Agargawn', '2011-03-01', '2013-09-08', '2020-10-08 08:10:02', '2020-10-08 08:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `referral_agents`
--

DROP TABLE IF EXISTS `referral_agents`;
CREATE TABLE IF NOT EXISTS `referral_agents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `referral_package_id` bigint NOT NULL,
  `referral_code` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission_rate` int NOT NULL DEFAULT '0',
  `package_start_date` date DEFAULT NULL,
  `package_end_date` date DEFAULT NULL,
  `tran_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referral_agents_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_agents`
--

INSERT INTO `referral_agents` (`id`, `user_id`, `referral_package_id`, `referral_code`, `commission_rate`, `package_start_date`, `package_end_date`, `tran_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 27, 1, 'FTCB5F8B00D0EEFC6', 25, '2020-10-17', '2022-10-17', '5f8b0f77da1a0', 1, '2020-10-17 08:33:52', '2020-10-19 09:07:28'),
(5, 1, 1, 'FTCB5F8B5DC46DD51', 10, '2020-10-17', '2022-10-17', '5f8b5dc3eb4db', 1, '2020-10-17 15:10:28', '2020-10-17 15:10:28'),
(6, 26, 1, 'FTCB5F8DF6D8C8F96', 10, '2020-10-19', '2022-11-27', '5fc1472f51fdb', 1, '2020-10-19 14:28:08', '2020-11-27 12:36:31'),
(8, 40, 1, 'FTCB5FC1011F81669', 10, '2020-11-27', '2022-11-27', '5fc1011f6cd90', 1, '2020-11-27 07:37:35', '2020-11-27 07:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `referral_packages`
--

DROP TABLE IF EXISTS `referral_packages`;
CREATE TABLE IF NOT EXISTS `referral_packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `duration` int NOT NULL COMMENT 'Number of month',
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_packages`
--

INSERT INTO `referral_packages` (`id`, `title`, `price`, `duration`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold Package', 15000, 24, '<ol>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n	<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\r\n	<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\r\n</ol>', 1, '2020-10-14 14:30:03', '2020-10-15 08:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `referred_students`
--

DROP TABLE IF EXISTS `referred_students`;
CREATE TABLE IF NOT EXISTS `referred_students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `referred_code` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referred_students_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referred_students`
--

INSERT INTO `referred_students` (`id`, `user_id`, `referred_code`, `created_at`, `updated_at`) VALUES
(6, 35, 'FTCB5F8B00D0EEFC6', '2020-10-18 09:29:43', '2020-10-18 09:29:43'),
(7, 36, 'FTCB5F8DF6D8C8F96', '2020-10-19 06:18:16', '2020-10-19 06:18:16'),
(8, 37, 'FTCB5F8B00D0EEFC6', '2020-10-19 06:21:44', '2020-10-19 06:21:44'),
(9, 38, 'FTCB5F8B5DC46DD51', '2020-10-19 06:26:30', '2020-10-19 06:26:30'),
(10, 39, 'FTCB5F8DF6D8C8F96', '2020-10-19 06:34:10', '2020-10-19 06:34:10'),
(12, 42, 'FTCB5F8B00D0EEFC6', '2020-11-11 09:36:00', '2020-11-11 09:36:00'),
(14, 44, 'FTCB5F8B00D0EEFC6', '2020-11-11 20:42:58', '2020-11-11 13:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2020-09-28 14:28:45', '2020-09-28 14:28:45'),
(4, 'Admin', 'web', '2020-10-02 08:58:37', '2020-10-02 08:58:37'),
(5, 'Teacher', 'web', '2020-10-09 06:58:40', '2020-10-09 06:58:40'),
(6, 'Agent', 'web', '2020-10-09 06:59:00', '2020-10-09 06:59:00'),
(7, 'Student', 'web', '2020-10-09 06:59:29', '2020-10-09 06:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 5),
(47, 5),
(48, 5),
(49, 1),
(49, 5),
(50, 5),
(51, 1),
(51, 5),
(52, 5),
(53, 1),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 1),
(57, 5),
(58, 5),
(59, 1),
(59, 5),
(60, 1),
(60, 5),
(61, 5),
(62, 1),
(62, 5),
(63, 1),
(63, 5),
(64, 1),
(64, 5),
(65, 1),
(65, 5),
(66, 5),
(67, 5),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 5),
(75, 5),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 5),
(83, 5),
(84, 5),
(85, 1),
(86, 1),
(87, 5),
(88, 5),
(89, 5),
(90, 5),
(91, 5),
(92, 5),
(93, 5),
(94, 5),
(95, 5),
(96, 5),
(97, 5),
(98, 5),
(99, 1),
(100, 1),
(101, 5),
(102, 5),
(103, 5),
(104, 5),
(105, 5),
(106, 5),
(107, 1),
(108, 5),
(109, 5),
(110, 5),
(111, 5),
(112, 5),
(113, 5),
(114, 5),
(115, 5),
(116, 5),
(117, 5),
(118, 5),
(119, 5),
(120, 5),
(121, 5),
(122, 5),
(123, 5),
(124, 5),
(125, 5),
(126, 5),
(127, 5),
(128, 5),
(129, 5),
(130, 5),
(131, 1),
(131, 5),
(132, 5),
(133, 5),
(134, 5),
(135, 5),
(136, 1),
(136, 5),
(137, 5),
(138, 5),
(139, 1),
(140, 1),
(141, 5),
(142, 1),
(143, 1),
(143, 5),
(143, 6),
(144, 6),
(145, 1),
(145, 5),
(146, 5),
(147, 1),
(147, 5),
(148, 5),
(149, 5),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 5),
(156, 5),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1);

-- --------------------------------------------------------

--
-- Table structure for table `special_qualifications`
--

DROP TABLE IF EXISTS `special_qualifications`;
CREATE TABLE IF NOT EXISTS `special_qualifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `qualification_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_qualifications`
--

INSERT INTO `special_qualifications` (`id`, `user_id`, `qualification_name`, `qualification_details`, `created_at`, `updated_at`) VALUES
(1, 1, 'Php7', 'I am mid level php7 programmer.', '2020-10-08 05:58:19', '2020-10-08 05:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_assignments`
--

DROP TABLE IF EXISTS `student_course_assignments`;
CREATE TABLE IF NOT EXISTS `student_course_assignments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `course_assignment_id` bigint NOT NULL,
  `assignment` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_course_assignments`
--

INSERT INTO `student_course_assignments` (`id`, `user_id`, `course_assignment_id`, `assignment`, `created_at`, `updated_at`) VALUES
(3, 44, 1, 'public/uploads/course-assignment/1/1605649794.pdf', '2020-11-17 15:49:54', '2020-11-17 15:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_quiz_answers`
--

DROP TABLE IF EXISTS `student_course_quiz_answers`;
CREATE TABLE IF NOT EXISTS `student_course_quiz_answers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `course_quiz_question_id` bigint NOT NULL,
  `course_quiz_setting_id` int NOT NULL,
  `answer` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_course_quiz_answers`
--

INSERT INTO `student_course_quiz_answers` (`id`, `user_id`, `course_quiz_question_id`, `course_quiz_setting_id`, `answer`, `created_at`, `updated_at`) VALUES
(12, 44, 3, 2, 'Lorem Ipsum has been the industry\'s standard dummy text', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(13, 44, 4, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(11, 44, 2, 2, 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', '2020-11-17 13:17:08', '2020-11-17 13:17:08'),
(16, 44, 5, 3, 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', '2020-11-17 14:52:01', '2020-11-17 14:52:01'),
(17, 44, 6, 3, 'Option Three', '2020-11-17 14:52:01', '2020-11-17 14:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_package_assignments`
--

DROP TABLE IF EXISTS `student_package_assignments`;
CREATE TABLE IF NOT EXISTS `student_package_assignments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `package_assignment_id` bigint NOT NULL,
  `assignment` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_package_assignments`
--

INSERT INTO `student_package_assignments` (`id`, `user_id`, `package_assignment_id`, `assignment`, `created_at`, `updated_at`) VALUES
(1, 44, 1, 'public/uploads/package-assignment/1/1605731993.pdf', '2020-11-18 14:39:53', '2020-11-18 14:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_package_quiz_answers`
--

DROP TABLE IF EXISTS `student_package_quiz_answers`;
CREATE TABLE IF NOT EXISTS `student_package_quiz_answers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `package_quiz_question_id` bigint NOT NULL,
  `package_quiz_setting_id` int NOT NULL,
  `answer` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_package_quiz_answers`
--

INSERT INTO `student_package_quiz_answers` (`id`, `user_id`, `package_quiz_question_id`, `package_quiz_setting_id`, `answer`, `created_at`, `updated_at`) VALUES
(2, 44, 1, 1, 'The alternatives consist of one correct or best alternative, which is the answer, and incorrect or inferior alternatives, known as distractors.', '2020-11-21 15:16:58', '2020-11-21 15:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

DROP TABLE IF EXISTS `student_results`;
CREATE TABLE IF NOT EXISTS `student_results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `course_id` bigint NOT NULL,
  `type` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_marks` int NOT NULL,
  `obtained_marks` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `user_id`, `course_id`, `type`, `exam_name`, `full_marks`, `obtained_marks`, `created_at`, `updated_at`) VALUES
(1, 44, 2, 'course', 'Software Development Quiz - One', 20, 13, '2020-11-21 13:45:04', '2020-11-21 13:45:04'),
(2, 44, 2, 'course', 'Software Development Quiz - Two', 10, 8, '2020-11-21 13:45:47', '2020-11-21 13:45:47'),
(3, 44, 2, 'course', 'Assignment', 50, 40, '2020-11-21 13:49:50', '2020-11-21 13:49:50'),
(4, 44, 2, 'course', 'Presentation', 10, 10, '2020-11-21 13:50:32', '2020-11-21 13:50:32'),
(5, 44, 2, 'course', 'Class Attendance', 10, 9, '2020-11-21 13:51:08', '2020-11-21 13:51:08'),
(6, 44, 2, 'package', 'Quiz One', 30, 24, '2020-11-21 15:10:47', '2020-11-21 15:10:47'),
(7, 44, 2, 'package', 'Assignment', 50, 45, '2020-11-21 15:11:13', '2020-11-21 15:11:13'),
(8, 44, 2, 'package', 'Presentation', 10, 8, '2020-11-21 15:11:35', '2020-11-21 15:11:35'),
(9, 44, 2, 'package', 'Class Attendance', 10, 9, '2020-11-21 15:11:56', '2020-11-21 15:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_commissions`
--

DROP TABLE IF EXISTS `teachers_commissions`;
CREATE TABLE IF NOT EXISTS `teachers_commissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `commission_rate` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_commissions`
--

INSERT INTO `teachers_commissions` (`id`, `user_id`, `commission_rate`, `created_at`, `updated_at`) VALUES
(3, 26, 35, '2020-11-27 15:26:40', '2020-11-27 15:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_evaluations`
--

DROP TABLE IF EXISTS `teacher_evaluations`;
CREATE TABLE IF NOT EXISTS `teacher_evaluations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `course_id` bigint NOT NULL,
  `type` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_evaluations`
--

INSERT INTO `teacher_evaluations` (`id`, `user_id`, `course_id`, `type`, `rating`, `comments`, `created_at`, `updated_at`) VALUES
(1, 44, 2, 'course', 5, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2020-11-22 04:58:41', '2020-11-22 04:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `training_informations`
--

DROP TABLE IF EXISTS `training_informations`;
CREATE TABLE IF NOT EXISTS `training_informations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `training_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `duration` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_informations`
--

INSERT INTO `training_informations` (`id`, `user_id`, `training_title`, `topic`, `institute`, `country`, `location`, `year`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'IDB Scholarship', 'Web Present Solution and Implementation', 'IDB-BISEW', 'Bangladesh', 'Agargaw', 2013, '2 Years', '2020-10-08 00:48:31', '2020-10-08 01:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `origin_cost` double NOT NULL DEFAULT '0',
  `status` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tran_id` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `phone`, `amount`, `origin_cost`, `status`, `tran_id`, `currency`, `created_at`, `updated_at`) VALUES
(4, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0515d4c77', 'BDT', '2020-10-17 08:52:05', NULL),
(3, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b00d0d677c', 'BDT', '2020-10-17 08:33:52', NULL),
(5, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0672603c7', 'BDT', '2020-10-17 08:57:54', NULL),
(6, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b06ac849bf', 'BDT', '2020-10-17 08:58:52', NULL),
(7, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b06cb653ea', 'BDT', '2020-10-17 08:59:23', NULL),
(8, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0710678d8', 'BDT', '2020-10-17 09:00:32', NULL),
(9, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0821bf09d', 'BDT', '2020-10-17 09:05:05', NULL),
(10, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b08985d493', 'BDT', '2020-10-17 09:07:04', NULL),
(11, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0b242272d', 'BDT', '2020-10-17 09:17:56', NULL),
(12, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b0b64cbd45', 'BDT', '2020-10-17 09:19:00', NULL),
(13, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b0daa3d025', 'BDT', '2020-10-17 09:28:42', '2020-10-17 09:29:01'),
(14, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b0e108eaa1', 'BDT', '2020-10-17 09:30:24', '2020-10-17 09:30:42'),
(15, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b0f77da1a0', 'BDT', '2020-10-17 09:36:23', '2020-10-17 09:36:49'),
(16, 'Md. Sohel Rana', 'sohelrana826@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b5bd45e180', 'BDT', '2020-10-17 15:02:12', '2020-10-17 15:03:18'),
(17, 'Md. Sohel Rana', 'sohelrana826@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b5d22a7c8f', 'BDT', '2020-10-17 15:07:46', '2020-10-17 15:08:08'),
(18, 'Md. Sohel Rana', 'sohelrana826@gmail.com', '01738451191', 15000, 0, 'Pending', '5f8b5d866edac', 'BDT', '2020-10-17 15:09:26', NULL),
(19, 'Md. Sohel Rana', 'sohelrana826@gmail.com', '01738451191', 15000, 15000, 'Complete', '5f8b5dc3eb4db', 'BDT', '2020-10-17 15:10:27', '2020-10-17 15:10:48'),
(20, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 0, 'Pending', '5f8df6d892c40', 'BDT', '2020-10-19 14:28:08', NULL),
(21, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 15000, 'Complete', '5f8df706c93bf', 'BDT', '2020-10-19 14:28:54', NULL),
(22, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 0, 'Pending', '5fac5923bc599', 'BDT', '2020-11-11 15:35:31', NULL),
(23, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '5facc7a6beb06', 'BDT', '2020-11-11 23:27:02', '2020-11-11 23:27:44'),
(24, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '5facc835d9c95', 'BDT', '2020-11-11 23:29:25', '2020-11-11 23:29:47'),
(25, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '5facc89bb64d1', 'BDT', '2020-11-11 23:31:07', '2020-11-11 23:31:26'),
(26, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '5facc963a5cee', 'BDT', '2020-11-11 23:34:27', '2020-11-11 23:34:46'),
(27, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 8800, 10000, 'Complete', '5fad3487206f3', 'BDT', '2020-11-12 07:11:35', '2020-11-12 07:11:57'),
(28, 'Maisura Ahmed', 'sohelrana820006@gmail.com', '01738451191', 13600, 17000, 'Complete', '5fad3c2b11b06', 'BDT', '2020-11-12 07:44:11', '2020-11-12 07:44:34'),
(29, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 28160, 32000, 'Complete', '5fae88b4dcbfc', 'BDT', '2020-11-13 07:23:00', '2020-11-13 07:23:23'),
(30, 'Sidratul Muntaha Faiza', 'sohelrana82006@gmail.com', '01738451191', 13600, 17000, 'Complete', '5fc00e0667919', 'BDT', '2020-11-26 14:20:22', '2020-11-26 14:20:50'),
(31, 'Farzan Ahmed', 'sohelrana8226@gmail.com', '01738451191', 28160, 32000, 'Complete', '5fc01ebd6dbb6', 'BDT', '2020-11-26 15:31:41', '2020-11-26 15:32:05'),
(32, 'Afnan Chowdhury', 'sohelrana8216@gmail.com', '01738451191', 28160, 32000, 'Complete', '5fc01fb2a7ed7', 'BDT', '2020-11-26 15:35:46', '2020-11-26 15:36:06'),
(33, 'Afnan Chowdhury', 'sohelrana8216@gmail.com', '01738451191', 28160, 32000, 'Complete', '5fc0216e7dd5f', 'BDT', '2020-11-26 15:43:10', '2020-11-26 15:44:05'),
(34, 'Afnan Chowdhury', 'arafat.uddin@wub.edu.bd', '01738451191', 15000, 0, 'Pending', '5fc0fe03a12bf', 'BDT', '2020-11-27 07:24:19', NULL),
(35, 'Afnan Chowdhury', 'arafat.uddin@wub.edu.bd', '01738451191', 15000, 0, 'Failed', '5fc10022410e2', 'BDT', '2020-11-27 07:33:22', '2020-11-27 07:34:31'),
(36, 'Afnan Chowdhury', 'arafat.uddin@wub.edu.bd', '01738451191', 15000, 15000, 'Complete', '5fc1011f6cd90', 'BDT', '2020-11-27 07:37:35', '2020-11-27 07:38:20'),
(37, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 15000, 'Complete', '5fc113dd92405', 'BDT', '2020-11-27 08:57:33', '2020-11-27 08:58:05'),
(38, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 0, 'Pending', '5fc1145fd43df', 'BDT', '2020-11-27 08:59:43', NULL),
(39, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 15000, 'Complete', '5fc145f4eb0f4', 'BDT', '2020-11-27 12:31:17', '2020-11-27 12:32:18'),
(40, 'Faizul Islam', 'faizul.islam@wub.edu.bd', '01738451191', 15000, 15000, 'Complete', '5fc1472f51fdb', 'BDT', '2020-11-27 12:36:31', '2020-11-27 12:37:07'),
(41, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '60962f5899103', 'BDT', '2021-05-08 00:27:36', '2021-05-08 00:28:22'),
(42, 'Aysha Khatun', 'aysha@gmail.com', '01738451191', 13600, 17000, 'Complete', '6096380f3384e', 'BDT', '2021-05-08 01:04:47', '2021-05-08 01:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `avatar` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(233) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = inactive, 1 = active, 2 = suspended',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `active_status`, `dark_mode`, `messenger_color`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`, `is_active`) VALUES
(1, 'Md. Sohel Rana', 'sohelrana826@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$sB5KJn/t10Gm5vtDNZUfW.brvilO0xG7Ps7kIKCdeGcvzhVOd3DkC', 'FCPbFXJWJJKItpfUQ4qz6NkDtHrFIOeZMuPM7tn2O3ooRt2ffRTV8woyAfqc', '2020-09-24 13:37:00', '2021-05-08 01:32:07', '2021-05-08 07:32:07', '::1', 1),
(4, 'Md. Sohel Rana', 'sohel.rana@wub.edu.bd', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$7Ut8X9SGZysuq90ro23i4ukgpaD895R4INencdS8lIinzElJaRLte', 'gXVrzujMkNXVu3XGMkRUUJzCmvnChQq2Ni5cjzcvsM5s6ukOulz0Xc7fUsfa', '2020-10-04 08:14:27', '2020-10-10 06:45:52', '2020-10-10 12:45:52', '::1', 1),
(40, 'Afnan Chowdhury', 'arafat.uddin@wub.edu.bd', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$f3Gk4LXrstFKAvkzIFQwBu1A.UhjnsWHhCYFUMviwfErXnlsio.EC', NULL, '2020-11-01 13:32:47', '2020-11-27 07:16:40', '2020-11-27 13:16:40', '::1', 1),
(42, 'Tanisha Islam', 'tanisha@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$peTQ1N1vMuz8UIDpQ6aQXuk8L.9WITrz0WCn3q1VEBR6yHuphryZa', NULL, '2020-11-11 09:36:00', '2020-11-27 07:14:02', '2020-11-27 13:14:02', '::1', 1),
(44, 'Aysha Khatun', 'aysha@gmail.com', 0, 0, '#2180f3', 'd1bc2283-6862-4d38-939f-0483a61b502a.jpg', NULL, '$2y$10$rKM8P6yZcEuTwULMgQyVNuO2rXDND/UmFXmKNaZxa0PuZw0/jBNqu', NULL, '2020-11-11 13:53:31', '2021-05-08 01:04:38', '2021-05-08 07:04:38', '::1', 1),
(35, 'Sidratul Muntaha Faiza', 'sohelrana82006@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$HicWxxXextQXcxSUNABWr.X9LMZRaXhK.DnLkxp/2hEoOW/oIxpQO', NULL, '2020-10-18 09:29:43', '2020-11-28 14:26:37', '2020-11-28 20:26:37', '::1', 1),
(32, 'Md.Jakir Hossain', 'jakir@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$LZuz72z5t/bWqrSCSabjkeYjdxEIzkmbXfs4DafTlM2WyBmP9Xti.', NULL, '2020-10-18 09:00:31', '2020-11-27 08:12:19', '2020-11-27 14:12:19', '::1', 1),
(36, 'Maisura Ahmed', 'sohelrana820006@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$RiQbnqykbvebR4NqJyOlMewbPBjEHM54IJLbSeOLAbuQBwihYKiCe', NULL, '2020-10-19 06:18:13', '2020-11-26 14:25:02', '2020-11-26 20:25:02', '::1', 1),
(37, 'Hafsa Khatun', 'sohelrana8200006@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$rQ721gQ85h9M71UnfoOkney6IS6CJjCxz0CDtQSoX2HLmSkI60Pru', NULL, '2020-10-19 06:21:43', '2020-10-19 06:21:43', NULL, NULL, 1),
(38, 'Afnan Chowdhury', 'sohelrana8216@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$yjTJsuBmwQFdafq4NrAsu.Jj.zEFJWOoxVDCy4SMY8JFcS.AfDEUa', NULL, '2020-10-19 06:26:30', '2020-11-28 13:51:52', '2020-11-28 19:51:52', '::1', 1),
(26, 'Faizul Islam', 'faizul.islam@wub.edu.bd', 0, 0, '#4CAF50', '6134e6b9-d305-4bb1-bf09-7ac1a519e1fb.jpg', NULL, '$2y$10$5vLJqI/HuIjy4W3HUN1N/Ojp9MFrcBPRus0Skq.IKMLzMM7xYXTDq', NULL, '2020-10-10 14:33:00', '2021-05-07 23:37:19', '2021-05-08 05:37:19', '::1', 1),
(27, 'Md. Anisur Rahman', 'anis.rahman@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$e6QoD9B0iDvFQolycdG44uXZS.pPKF79dIzQcduf6d6tSIM5jqySO', NULL, '2020-10-15 13:37:55', '2021-05-07 13:30:39', '2021-05-07 19:30:39', '::1', 1),
(39, 'Farzan Ahmed', 'sohelrana8226@gmail.com', 0, 0, '#2180f3', 'avatar.png', NULL, '$2y$10$aXSJE5wo1SEQ2URpyF1SIOHv9rL63wDXEJLra5bM7pNZjVrpA0G2q', NULL, '2020-10-19 06:34:09', '2020-11-26 14:30:00', '2020-11-26 20:30:00', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_libraries`
--

DROP TABLE IF EXISTS `video_libraries`;
CREATE TABLE IF NOT EXISTS `video_libraries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_title` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sub_category_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_libraries`
--

INSERT INTO `video_libraries` (`id`, `video_title`, `video_url`, `course_sub_category_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Database Design Part - 1', 'X-CKZCqH6IQ', 5, 1, 26, '2020-11-06 14:44:26', '2020-11-06 14:44:26'),
(4, 'Advance Html 5', 'gDOFDwgXrew', 2, 1, 26, '2020-11-06 14:45:22', '2020-11-06 14:45:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
