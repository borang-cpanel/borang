-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 06:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borang_pori2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1634478425),
('admin', '2', 1634317012),
('user', '1', 1634478429);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/default/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/default/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/update', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/menu/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/update', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/permission/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/assign', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/remove', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/update', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/role/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/assign', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/route/remove', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/update', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/rule/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/activate', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/login', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/logout', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/signup', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/admin/user/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/api/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/default/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/default/index', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/create', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/index', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/options', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/update', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/api/survey/view', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/bulk-delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/create', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/delete-image', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/index', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/update', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/article/view', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/debug/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/default/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/user/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/action', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/diff', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/preview', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gii/default/view', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/gridview/*', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/gridview/export/*', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/gridview/export/download', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/media/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/bulk-delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/create', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/delete-image', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/index', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/update', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/media/view', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/questionnaire/*', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/questionnaire/bulk-delete', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/questionnaire/create', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/questionnaire/delete', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/questionnaire/delete-image', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/questionnaire/index', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/questionnaire/update', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/questionnaire/view', 2, NULL, NULL, NULL, 1634316977, 1634316977),
('/research/*', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/bulk-delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/create', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/delete-image', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/index', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/update', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/research/view', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/site/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/about', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/captcha', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/contact', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/error', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/login', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/site/logout', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/survey/*', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/survey/bulk-delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/create', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/delete', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/delete-image', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/index', 2, NULL, NULL, NULL, 1634478191, 1634478191),
('/survey/summary', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/update', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/survey/view', 2, NULL, NULL, NULL, 1634486525, 1634486525),
('/user/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/assignments', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/block', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/confirm', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/create', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/delete', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/info', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/update', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/admin/update-profile', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/profile/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/profile/index', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/profile/show', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/recovery/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/recovery/request', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/recovery/reset', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/registration/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/registration/confirm', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/registration/connect', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/registration/register', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/registration/resend', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/security/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/security/auth', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/security/login', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/security/logout', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/*', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/account', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/confirm', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/disconnect', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/networks', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('/user/settings/profile', 2, NULL, NULL, NULL, 1634317046, 1634317046),
('admin', 1, NULL, NULL, NULL, 1634316993, 1634316993),
('user', 1, NULL, NULL, NULL, 1634317000, 1634317000);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('admin', '/admin/*'),
('admin', '/admin/assignment/*'),
('admin', '/admin/assignment/assign'),
('admin', '/admin/assignment/index'),
('admin', '/admin/assignment/revoke'),
('admin', '/admin/assignment/view'),
('admin', '/admin/default/*'),
('admin', '/admin/default/index'),
('admin', '/admin/menu/*'),
('admin', '/admin/menu/create'),
('admin', '/admin/menu/delete'),
('admin', '/admin/menu/index'),
('admin', '/admin/menu/update'),
('admin', '/admin/menu/view'),
('admin', '/admin/permission/*'),
('admin', '/admin/permission/assign'),
('admin', '/admin/permission/create'),
('admin', '/admin/permission/delete'),
('admin', '/admin/permission/get-users'),
('admin', '/admin/permission/index'),
('admin', '/admin/permission/remove'),
('admin', '/admin/permission/update'),
('admin', '/admin/permission/view'),
('admin', '/admin/role/*'),
('admin', '/admin/role/assign'),
('admin', '/admin/role/create'),
('admin', '/admin/role/delete'),
('admin', '/admin/role/get-users'),
('admin', '/admin/role/index'),
('admin', '/admin/role/remove'),
('admin', '/admin/role/update'),
('admin', '/admin/role/view'),
('admin', '/admin/route/*'),
('admin', '/admin/route/assign'),
('admin', '/admin/route/create'),
('admin', '/admin/route/index'),
('admin', '/admin/route/refresh'),
('admin', '/admin/route/remove'),
('admin', '/admin/rule/*'),
('admin', '/admin/rule/create'),
('admin', '/admin/rule/delete'),
('admin', '/admin/rule/index'),
('admin', '/admin/rule/update'),
('admin', '/admin/rule/view'),
('admin', '/admin/user/*'),
('admin', '/admin/user/activate'),
('admin', '/admin/user/change-password'),
('admin', '/admin/user/delete'),
('admin', '/admin/user/index'),
('admin', '/admin/user/login'),
('admin', '/admin/user/logout'),
('admin', '/admin/user/request-password-reset'),
('admin', '/admin/user/reset-password'),
('admin', '/admin/user/signup'),
('admin', '/admin/user/view'),
('admin', '/api/*'),
('admin', '/api/default/*'),
('admin', '/api/default/index'),
('admin', '/api/survey/*'),
('admin', '/api/survey/create'),
('admin', '/api/survey/delete'),
('admin', '/api/survey/index'),
('admin', '/api/survey/options'),
('admin', '/api/survey/update'),
('admin', '/api/survey/view'),
('admin', '/article/*'),
('admin', '/article/bulk-delete'),
('admin', '/article/create'),
('admin', '/article/delete'),
('admin', '/article/delete-image'),
('admin', '/article/index'),
('admin', '/article/update'),
('admin', '/article/view'),
('admin', '/debug/*'),
('admin', '/debug/default/*'),
('admin', '/debug/default/db-explain'),
('admin', '/debug/default/download-mail'),
('admin', '/debug/default/index'),
('admin', '/debug/default/toolbar'),
('admin', '/debug/default/view'),
('admin', '/debug/user/*'),
('admin', '/debug/user/reset-identity'),
('admin', '/debug/user/set-identity'),
('admin', '/gii/*'),
('admin', '/gii/default/*'),
('admin', '/gii/default/action'),
('admin', '/gii/default/diff'),
('admin', '/gii/default/index'),
('admin', '/gii/default/preview'),
('admin', '/gii/default/view'),
('admin', '/gridview/*'),
('admin', '/gridview/export/*'),
('admin', '/gridview/export/download'),
('admin', '/media/*'),
('admin', '/media/bulk-delete'),
('admin', '/media/create'),
('admin', '/media/delete'),
('admin', '/media/delete-image'),
('admin', '/media/index'),
('admin', '/media/update'),
('admin', '/media/view'),
('admin', '/questionnaire/*'),
('admin', '/questionnaire/bulk-delete'),
('admin', '/questionnaire/create'),
('admin', '/questionnaire/delete'),
('admin', '/questionnaire/delete-image'),
('admin', '/questionnaire/index'),
('admin', '/questionnaire/update'),
('admin', '/questionnaire/view'),
('admin', '/research/*'),
('admin', '/research/bulk-delete'),
('admin', '/research/create'),
('admin', '/research/delete'),
('admin', '/research/delete-image'),
('admin', '/research/index'),
('admin', '/research/update'),
('admin', '/research/view'),
('admin', '/site/*'),
('admin', '/site/about'),
('admin', '/site/captcha'),
('admin', '/site/contact'),
('admin', '/site/error'),
('admin', '/site/index'),
('admin', '/site/login'),
('admin', '/site/logout'),
('admin', '/survey/*'),
('admin', '/survey/bulk-delete'),
('admin', '/survey/create'),
('admin', '/survey/delete'),
('admin', '/survey/delete-image'),
('admin', '/survey/index'),
('admin', '/survey/summary'),
('admin', '/survey/update'),
('admin', '/survey/view'),
('admin', '/user/*'),
('admin', '/user/admin/*'),
('admin', '/user/admin/assignments'),
('admin', '/user/admin/block'),
('admin', '/user/admin/confirm'),
('admin', '/user/admin/create'),
('admin', '/user/admin/delete'),
('admin', '/user/admin/index'),
('admin', '/user/admin/info'),
('admin', '/user/admin/update'),
('admin', '/user/admin/update-profile'),
('admin', '/user/profile/*'),
('admin', '/user/profile/index'),
('admin', '/user/profile/show'),
('admin', '/user/recovery/*'),
('admin', '/user/recovery/request'),
('admin', '/user/recovery/reset'),
('admin', '/user/registration/*'),
('admin', '/user/registration/confirm'),
('admin', '/user/registration/connect'),
('admin', '/user/registration/register'),
('admin', '/user/registration/resend'),
('admin', '/user/security/*'),
('admin', '/user/security/auth'),
('admin', '/user/security/login'),
('admin', '/user/security/logout'),
('admin', '/user/settings/*'),
('admin', '/user/settings/account'),
('admin', '/user/settings/confirm'),
('admin', '/user/settings/disconnect'),
('admin', '/user/settings/networks'),
('admin', '/user/settings/profile'),
('admin', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brachiterapy`
--

CREATE TABLE `brachiterapy` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `3d_brachitherapy` varchar(300) DEFAULT NULL,
  `radiation_source` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `usguided` varchar(100) NOT NULL,
  `carm` varchar(100) NOT NULL,
  `technique` varchar(100) NOT NULL,
  `total_hours_per_day` varchar(100) NOT NULL,
  `total_hours_per_week` varchar(100) NOT NULL,
  `valid_period` date NOT NULL,
  `tps` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brachiterapy`
--

INSERT INTO `brachiterapy` (`id`, `institution_id`, `type`, `3d_brachitherapy`, `radiation_source`, `year`, `usguided`, `carm`, `technique`, `total_hours_per_day`, `total_hours_per_week`, `valid_period`, `tps`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, '[\"2D\"]', NULL, 'Iridium 192', 2015, 'Yes', 'Yes', '[\"Intracavitary\"]', '8', '40', '2021-11-30', '[{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"}]', '2021-11-24 08:25:08', 1, '2021-11-29 10:31:11', 1, 0),
(2, 1, '[\"2D\",\"3D\"]', 'null', 'Iodium 125', 2001, 'Yes', 'Yes', '[\"Intracavitary\",\"Interstitial\"]', '6', '30', '2019-08-21', '[{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"}]', '2021-12-08 17:09:06', 1, '2021-12-08 17:09:06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pori_num` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `education_doctor` varchar(200) DEFAULT NULL,
  `education_master` varchar(200) DEFAULT NULL,
  `education_consultant` varchar(200) DEFAULT NULL,
  `education_phd` varchar(200) DEFAULT NULL,
  `certificate_num` varchar(200) NOT NULL,
  `str_num` varchar(200) NOT NULL,
  `sip_num` varchar(200) NOT NULL,
  `birthplace` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `institution_id`, `type`, `name`, `pori_num`, `education`, `education_doctor`, `education_master`, `education_consultant`, `education_phd`, `certificate_num`, `str_num`, `sip_num`, `birthplace`, `birthdate`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 'Specialist', 'dr Xxx, Sp.Onk.Rad', '120092', 'Doktor(S3)', 'MIT', '', '', '', '2081028082', '9309230832', 'A380d803', 'Jakarta', '1989-12-17', 'Jln ABC', '2021-11-25 05:58:34', 1, '2021-11-29 10:35:58', 1, 0),
(2, 1, 'Consultant', 'Prof. dr. dr Yyy, Sp.Onk.Rad(K)', '120093', 'Profesor', 'BioMed', '', 'Keganasan Abdomino-Pelvik', '', '09309230', 'A808208', '83082038', 'Jakarta', '1948-01-20', 'Jln. DEF', '2021-11-25 05:59:36', 1, '2021-11-29 10:38:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_machine`
--

CREATE TABLE `equipment_machine` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `machine` varchar(200) NOT NULL,
  `model` varchar(200) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `technique` varchar(200) NOT NULL,
  `feature` varchar(200) NOT NULL,
  `photon_energy` varchar(200) NOT NULL,
  `photon_energy_note` varchar(500) NOT NULL,
  `verification` varchar(200) NOT NULL,
  `electron` varchar(10) NOT NULL,
  `electron_note` varchar(500) NOT NULL,
  `operating_hours_per_day` varchar(10) NOT NULL,
  `operating_hours_per_week` varchar(10) NOT NULL,
  `license_validity` date NOT NULL,
  `tps` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` datetime NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment_machine`
--

INSERT INTO `equipment_machine` (`id`, `institution_id`, `machine`, `model`, `year`, `technique`, `feature`, `photon_energy`, `photon_energy_note`, `verification`, `electron`, `electron_note`, `operating_hours_per_day`, `operating_hours_per_week`, `license_validity`, `tps`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 'TOMOTHERAPY', NULL, 2001, '2D', 'Standard', 'Single Energy', 'Energy 20', 'Film (Gamagrafi,dll)', 'Ya-Yes', 'Energy 20 Joule', '6', '30', '2022-01-25', NULL, '2021-11-24 06:22:01', 1, 2147483647, '0000-00-00 00:00:00', 0),
(2, 1, 'LINAC', NULL, 2001, 'IMRT', 'FFF', 'Multi Energy', 'Tipe  Varian HD', 'EPID', 'Ya-Yes', 'Nano', '6', '30', '2022-10-31', '[{\"name\":\"A\",\"year\":\"2010\"},{\"name\":\"D\",\"year\":\"2009\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"},{\"name\":\"\",\"year\":\"\"}]', '2021-11-24 06:38:18', 1, 2147483647, '0000-00-00 00:00:00', 0),
(3, 1, 'LINAC', NULL, 2019, 'VMAT', 'FFF', 'Single Energy', 'Tipe Halcyon Varian ', 'EPID', 'Tidak-No', '-', '6', '30', '2025-02-28', 'null', '2021-11-29 10:27:31', 1, 2147483647, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_tps`
--

CREATE TABLE `equipment_tps` (
  `id` int(11) NOT NULL,
  `equipment_machine_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `externa`
--

CREATE TABLE `externa` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `period_type` varchar(300) NOT NULL,
  `period` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `case` text NOT NULL,
  `radiation_2d` int(11) NOT NULL,
  `radiation_3d` int(11) NOT NULL,
  `radiation_imrt` int(11) NOT NULL,
  `radiation_vmat` int(11) NOT NULL,
  `radiation_srt` int(11) NOT NULL,
  `radiation_srs` int(11) NOT NULL,
  `radiation_sbrt` int(11) NOT NULL,
  `radiation_igrt` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `externa`
--

INSERT INTO `externa` (`id`, `institution_id`, `period_type`, `period`, `total`, `case`, `radiation_2d`, `radiation_3d`, `radiation_imrt`, `radiation_vmat`, `radiation_srt`, `radiation_srs`, `radiation_sbrt`, `radiation_igrt`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 'Monthly', '2021-12', 20, '[]', 5, 9, 10, 12, 20, 12, 0, 1, '2021-11-25 10:26:28', 1, '2021-11-25 10:56:08', 1, 0),
(2, 1, 'Yearly', '2022', 20, '[]', 1, 1, 18, 0, 0, 0, 0, 0, '2021-11-25 10:56:41', 1, '2021-11-25 10:56:41', 1, 0),
(3, 1, 'Monthly', '2021-11', 12, '[]', 10, 5, 3, 4, 1, 4, 1, 1, '2021-11-26 05:18:12', 1, '2021-11-26 05:18:40', 1, 0),
(4, 1, '3 Monthly', '2021-Q1', 20, '[{\"name\":\"D\",\"percentage\":\"10\"},{\"name\":\"E\",\"percentage\":\"20\"},{\"name\":\"F\",\"percentage\":\"70\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 1, 1, 18, 4, 1, 19, 0, 1, '2021-11-29 05:46:29', 1, '2021-11-29 06:03:15', 1, 0),
(5, 1, '6 Monthly', '2021-S1', 10, '[{\"name\":\"A\",\"percentage\":\"20\"},{\"name\":\"B\",\"percentage\":\"30\"},{\"name\":\"C\",\"percentage\":\"50\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 1, 1, 18, 4, 1, 19, 0, 1, '2021-11-29 06:04:39', 1, '2021-11-29 06:04:39', 1, 0),
(6, 1, 'Monthly', '2021-09', 10, '[{\"name\":\"A\",\"percentage\":\"30\"},{\"name\":\"B\",\"percentage\":\"50\"},{\"name\":\"C\",\"percentage\":\"20\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 10, 20, 30, 10, 10, 20, 30, 10, '2021-12-09 09:42:01', 1, '2021-12-09 09:42:01', 1, 0),
(7, 1, 'Monthly', '2021-10', 20, '[{\"name\":\"D\",\"percentage\":\"20\"},{\"name\":\"A\",\"percentage\":\"30\"},{\"name\":\"B\",\"percentage\":\"50\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 1, 1, 3, 4, 3, 2, 3, 4, '2021-12-09 09:45:24', 1, '2021-12-09 10:03:19', 1, 0),
(8, 1, '3 Monthly', '2021-Q2', 12, '[{\"name\":\"A\",\"percentage\":\"10\"},{\"name\":\"B\",\"percentage\":\"50\"},{\"name\":\"C\",\"percentage\":\"40\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 5, 5, 2, 9, 2, 8, 8, 1, '2021-12-09 10:06:59', 1, '2021-12-09 10:08:49', 1, 0),
(9, 1, '3 Monthly', '2021-Q3', 15, '[{\"name\":\"C\",\"percentage\":\"100\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 1, 4, 5, 1, 0, 0, 0, 0, '2021-12-09 10:09:14', 1, '2021-12-09 10:09:21', 1, 0),
(10, 1, '6 Monthly', '2021-S2', 120, '[{\"name\":\"A\",\"percentage\":\"60\"},{\"name\":\"B\",\"percentage\":\"40\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 1, 8, 10, 8, 8, 7, 7, 7, '2021-12-09 10:42:19', 1, '2021-12-09 10:42:19', 1, 0),
(11, 1, 'Yearly', '2021', 120, '[{\"name\":\"A\",\"percentage\":\"80\"},{\"name\":\"B\",\"percentage\":\"20\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 5, 4, 2, 8, 7, 1, 2, 2, '2021-12-09 10:46:51', 1, '2021-12-09 10:46:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `referral_type` varchar(200) NOT NULL,
  `insurance_status` varchar(200) NOT NULL,
  `accreditation` varchar(200) NOT NULL,
  `quatro_audit` varchar(200) NOT NULL,
  `quatro_audit_year` int(11) DEFAULT NULL,
  `quatro_audit_process` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `name`, `address`, `city`, `province`, `email`, `zipcode`, `phone`, `status`, `class`, `referral_type`, `insurance_status`, `accreditation`, `quatro_audit`, `quatro_audit_year`, `quatro_audit_process`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 'RSCM Radioterapi', 'Jln. Diponegoro', 'Jakarta Selatan', 'DKI Jakarta', 'info@pori.or.id', '10360', '021-102908', 'RS Pendidikan - Teaching Hospital Hospital', 'Tipe/Type A', 'I', 'BPJS/JKN', 'ISO', 'Yes/Ya', 2001, '', '2021-11-23 06:28:11', 1, '2021-11-29 06:14:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `interna`
--

CREATE TABLE `interna` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `period` varchar(200) NOT NULL,
  `case` text NOT NULL,
  `radiation_2d` int(11) NOT NULL,
  `radiation_3d` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interna`
--

INSERT INTO `interna` (`id`, `institution_id`, `period`, `case`, `radiation_2d`, `radiation_3d`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, '2021-12', '[{\"name\":\"A\",\"percentage\":\"10\"},{\"name\":\"B\",\"percentage\":\"10\"},{\"name\":\"C\",\"percentage\":\"80\"},{\"name\":\"\",\"percentage\":\"\"},{\"name\":\"\",\"percentage\":\"\"}]', 12, 20, '2021-11-25 10:52:40', 1, '2021-11-29 06:06:21', 1, 0),
(2, 1, '2022-01', '[]', 10, 5, '2021-11-25 10:54:17', 1, '2021-11-26 09:03:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Questionnaire', NULL, '/questionnaire/index', NULL, NULL),
(2, 'Survey', NULL, '/survey/index', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634236740),
('m140209_132017_init', 1634313522),
('m140403_174025_create_account_table', 1634313522),
('m140504_113157_update_tables', 1634313523),
('m140504_130429_create_token_table', 1634313523),
('m140506_102106_rbac_init', 1634237142),
('m140602_111327_create_menu_table', 1634237440),
('m140830_171933_fix_ip_field', 1634313523),
('m140830_172703_change_account_table_name', 1634313523),
('m141222_110026_update_ip_field', 1634313523),
('m141222_135246_alter_username_length', 1634313523),
('m150614_103145_update_social_account_table', 1634313523),
('m150623_212711_fix_username_notnull', 1634313523),
('m160312_050000_create_user', 1634237440),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1634237142),
('m180523_151638_rbac_updates_indexes_without_prefix', 1634237142),
('m200409_110543_rbac_update_mssql_trigger', 1634237142);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `medical_physics_s1` int(11) NOT NULL,
  `medical_physics_s2` int(11) NOT NULL,
  `ppr` int(11) NOT NULL,
  `ppr_level` varchar(200) NOT NULL,
  `rtt` int(11) NOT NULL,
  `rtt_level` varchar(200) NOT NULL,
  `nurse` int(11) NOT NULL,
  `nurse_level` varchar(200) NOT NULL,
  `technician` int(11) NOT NULL,
  `technician_level` varchar(200) NOT NULL,
  `security` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_profile`
--

INSERT INTO `staff_profile` (`id`, `institution_id`, `medical_physics_s1`, `medical_physics_s2`, `ppr`, `ppr_level`, `rtt`, `rtt_level`, `nurse`, `nurse_level`, `technician`, `technician_level`, `security`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 3, 1, 1, 'Dokter', 2, 'S1', 10, 'S1', 4, 'D3', 2, '2021-11-25 06:38:22', 1, '2021-11-25 06:44:04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting`
--

CREATE TABLE `supporting` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `fixation_thermoplastic_mask` varchar(100) NOT NULL,
  `mouldroom_blue_bag` varchar(100) NOT NULL,
  `mouldroom_leksell` varchar(100) NOT NULL,
  `mouldroom_headfix` varchar(100) NOT NULL,
  `mouldroom_alpha_cradle` varchar(100) NOT NULL,
  `mouldroom_other` varchar(100) NOT NULL,
  `fixation_thermoplastic_mask_year` int(11) NOT NULL,
  `mouldroom_blue_bag_year` int(11) NOT NULL,
  `mouldroom_leksell_year` int(11) NOT NULL,
  `mouldroom_headfix_year` int(11) NOT NULL,
  `mouldroom_alpha_cradle_year` int(11) NOT NULL,
  `mouldroom_other_year` int(11) NOT NULL,
  `individual_block` varchar(100) NOT NULL,
  `individual_block_year` int(11) NOT NULL,
  `styrofoam_cutter` varchar(100) NOT NULL,
  `styrofoam_cutter_year` int(11) NOT NULL,
  `styrofoam_cutter_number` int(11) NOT NULL,
  `tin_smelter` varchar(100) NOT NULL,
  `tin_smelter_year` int(11) NOT NULL,
  `tin_smelter_number` int(11) NOT NULL,
  `water_bath` varchar(100) NOT NULL,
  `water_bath_year` int(11) NOT NULL,
  `water_bath_number` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supporting_ctsimulator`
--

CREATE TABLE `supporting_ctsimulator` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `valid_period` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_ctsimulator`
--

INSERT INTO `supporting_ctsimulator` (`id`, `institution_id`, `type`, `year`, `valid_period`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 'TX-123', 2005, '2021-11-30', '2021-11-24 06:52:22', 1, '2021-11-24 06:52:22', 1, 0),
(2, 0, 'Siemen 4D CT', 2019, '0000-00-00', '2021-11-29 10:11:56', 1, '2021-11-29 10:11:56', 1, 0),
(3, 1, 'Siemen 4D CT', 2019, '2025-08-21', '2021-11-29 10:17:07', 1, '2021-11-29 10:17:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_dosimeter`
--

CREATE TABLE `supporting_dosimeter` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `valid_period` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_dosimeter`
--

INSERT INTO `supporting_dosimeter` (`id`, `institution_id`, `year`, `valid_period`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 2009, '2021-09-09', '2021-11-24 06:54:39', 1, '2021-11-24 06:54:39', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_mouldroom`
--

CREATE TABLE `supporting_mouldroom` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `immobilization` varchar(500) DEFAULT NULL,
  `thermoplastic_mask` varchar(500) DEFAULT NULL,
  `thermoplastic_mask_year` int(11) DEFAULT NULL,
  `blue_bag` varchar(500) DEFAULT NULL,
  `blue_bag_year` int(11) DEFAULT NULL,
  `leksell_g_grame` varchar(500) DEFAULT NULL,
  `leksell_g_grame_year` int(11) DEFAULT NULL,
  `headfix` varchar(500) DEFAULT NULL,
  `headfix_year` int(11) DEFAULT NULL,
  `alpha_cradle` varchar(500) DEFAULT NULL,
  `alpha_cradle_year` int(11) DEFAULT NULL,
  `other_fixation` varchar(500) DEFAULT NULL,
  `other_fixation_note` varchar(500) DEFAULT NULL,
  `other_fixation_year` int(11) DEFAULT NULL,
  `individual_block` varchar(500) DEFAULT NULL,
  `individual_block_year` int(11) DEFAULT NULL,
  `styrofoam_cutter` varchar(500) DEFAULT NULL,
  `styrofoam_cutter_total` int(11) DEFAULT NULL,
  `styrofoam_cutter_year` int(11) DEFAULT NULL,
  `tin_smelter` varchar(500) DEFAULT NULL,
  `tin_smelter_total` int(11) DEFAULT NULL,
  `tin_smelter_year` int(11) DEFAULT NULL,
  `water_bath` varchar(500) DEFAULT NULL,
  `water_bath_total` int(11) DEFAULT NULL,
  `water_bath_year` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_mouldroom`
--

INSERT INTO `supporting_mouldroom` (`id`, `institution_id`, `immobilization`, `thermoplastic_mask`, `thermoplastic_mask_year`, `blue_bag`, `blue_bag_year`, `leksell_g_grame`, `leksell_g_grame_year`, `headfix`, `headfix_year`, `alpha_cradle`, `alpha_cradle_year`, `other_fixation`, `other_fixation_note`, `other_fixation_year`, `individual_block`, `individual_block_year`, `styrofoam_cutter`, `styrofoam_cutter_total`, `styrofoam_cutter_year`, `tin_smelter`, `tin_smelter_total`, `tin_smelter_year`, `water_bath`, `water_bath_total`, `water_bath_year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, '{\"thermo\":\"on\",\"pillow\":\"on\",\"footrest\":\"on\",\"anzai\":\"on\",\"vacuum2\":\"on\",\"other\":\"on\",\"other_note\":\"Fixation name\",\"mouldroom\":\"on\",\"otherroom_note\":\"   \"}', 'Testing Whole', 2018, 'Linting', 2004, 'Alphredo', 2005, 'textile', 2017, 'Omon', 2005, 'Juno', '', 2001, '', 2001, '', NULL, 2001, '', NULL, 2001, '', NULL, 2001, '2021-11-24 06:55:47', 1, '2021-12-09 14:27:35', 1, 0),
(2, 1, '{\"thermo\":\"on\",\"pillow\":\"on\",\"footrest\":\"on\",\"knee\":\"on\",\"breast\":\"on\",\"vacuum\":\"on\",\"alpha\":\"on\",\"headfix\":\"on\",\"leksell\":\"on\",\"abc\":\"on\",\"anzai\":\"on\",\"vacuum2\":\"on\",\"other\":\"on\",\"other_note\":\"Fixation name\",\"mouldroom\":\"on\",\"otherroom\":\"on\",\"otherroom_note\":\"Other Room \"}', '', 2001, '', 2001, '', 2001, '', 2001, '', 2001, '', '', 2001, '', 2001, '', NULL, 2001, '', NULL, 2001, '', NULL, 2001, '2021-12-09 12:00:39', 1, '2021-12-09 14:18:31', 1, 0),
(3, 1, '{\"thermo\":\"on\",\"leksell\":\"on\",\"other_note\":\"\",\"mouldroom\":\"on\",\"otherroom_note\":\" \"}', 'Metro20', 2020, '', 2001, 'Andromeda', 2017, '', 2001, '', 2001, '', '', 2001, '', 2001, '', NULL, 2001, '', NULL, 2001, '', NULL, 2001, '2021-12-09 14:32:00', 1, '2021-12-09 14:32:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_simulator`
--

CREATE TABLE `supporting_simulator` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `valid_period` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_simulator`
--

INSERT INTO `supporting_simulator` (`id`, `institution_id`, `type`, `year`, `valid_period`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, '20902', 2018, '2022-09-29', '2021-11-24 06:51:12', 1, '2021-11-24 06:51:12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_surveymeter`
--

CREATE TABLE `supporting_surveymeter` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `valid_period` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_surveymeter`
--

INSERT INTO `supporting_surveymeter` (`id`, `institution_id`, `year`, `valid_period`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, 2001, '2021-11-30', '2021-11-24 06:52:51', 1, '2021-11-24 06:52:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_ups`
--

CREATE TABLE `supporting_ups` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_ups`
--

INSERT INTO `supporting_ups` (`id`, `institution_id`, `capacity`, `year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `publish`) VALUES
(1, 1, '3000 Mha', 2001, '2021-11-24 07:18:45', 1, '2021-11-24 07:18:45', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `status`) VALUES
(1, 'admin', 'admin@captivatebrand.com', '$2y$10$/w1mdiiGuNnQk1FQD5RmBOWtY1WRuscjGgCZjkP9hWkqg1ew39I7S', '', 1634315007, NULL, NULL, NULL, 0, 0, 1, 0),
(2, 'garry', 'garry@captivatebrand.com', '$2y$10$Sm7goojvWMjv8GS3BMyW8uqRdI2hHSr9/gWb7RF.HTW.ozKLsEkJ.', 'pPX_E0bBo-s8YLGnSuhMqlzdBP-fST7Y', 1634314985, NULL, NULL, '127.0.0.1', 1634314986, 1634314986, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waiting_list`
--

CREATE TABLE `waiting_list` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `period` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `brachiterapy`
--
ALTER TABLE `brachiterapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_machine`
--
ALTER TABLE `equipment_machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_tps`
--
ALTER TABLE `equipment_tps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `externa`
--
ALTER TABLE `externa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interna`
--
ALTER TABLE `interna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting`
--
ALTER TABLE `supporting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_ctsimulator`
--
ALTER TABLE `supporting_ctsimulator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_dosimeter`
--
ALTER TABLE `supporting_dosimeter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_mouldroom`
--
ALTER TABLE `supporting_mouldroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_simulator`
--
ALTER TABLE `supporting_simulator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_surveymeter`
--
ALTER TABLE `supporting_surveymeter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_ups`
--
ALTER TABLE `supporting_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD UNIQUE KEY `user_unique_username` (`username`);

--
-- Indexes for table `waiting_list`
--
ALTER TABLE `waiting_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brachiterapy`
--
ALTER TABLE `brachiterapy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment_machine`
--
ALTER TABLE `equipment_machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment_tps`
--
ALTER TABLE `equipment_tps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `externa`
--
ALTER TABLE `externa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interna`
--
ALTER TABLE `interna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supporting`
--
ALTER TABLE `supporting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supporting_ctsimulator`
--
ALTER TABLE `supporting_ctsimulator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supporting_dosimeter`
--
ALTER TABLE `supporting_dosimeter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supporting_mouldroom`
--
ALTER TABLE `supporting_mouldroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supporting_simulator`
--
ALTER TABLE `supporting_simulator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supporting_surveymeter`
--
ALTER TABLE `supporting_surveymeter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supporting_ups`
--
ALTER TABLE `supporting_ups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waiting_list`
--
ALTER TABLE `waiting_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
