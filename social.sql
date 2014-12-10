-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2012 at 09:58 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1acd0549579910157c89a52f23e5cc6d', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329459941, 'a:17:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";}'),
('2de9775f1ba85461eaa1ca14a8b96bba', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329472425, 'a:7:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('45ce55a73a908fa6beaaa93b32e84327', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329457125, 'a:7:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('4e51cff9fd4e48cc42a910313f2e6c58', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329390219, 'a:13:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";}'),
('5166d4089343be32900e7d994ac1dcc0', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329468568, 'a:7:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:8:"loggedin";s:1:"1";}'),
('9b170f8bda8fffd59827ad3bdff2402b', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329459942, ''),
('af14d366a7783d2be281bf9c76e4940a', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329390973, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('af708fb86e1690adb0c8e9b069159a80', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1329471053, 'a:17:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment`, `posted_by`) VALUES
(1, '4', 'no feedback', '3'),
(2, '4', 'no feedback', '3'),
(3, '3', 'rrr', '3'),
(4, '4', 'I thinnk we need to arrange a meeting to solve this problem', '3'),
(5, '6', 'excelent', '3'),
(6, '6', 'fine', '7'),
(7, '6', 't is a long established fact that a reader will be distracted by the readable content of a page when', '3'),
(8, '6', 'We want to arrange a annual meeting ', '3'),
(9, '6', 'Good morning my dr friends', '3'),
(10, '8', 'fine', '3');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_cost` decimal(10,2) NOT NULL,
  `letter_cost` decimal(10,2) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `sms_cost`, `letter_cost`, `package_name`) VALUES
(7, '33.00', '33.00', '11'),
(11, '4.00', '4.00', 'GlobalCost');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(50) NOT NULL,
  `sending_email` tinyint(10) NOT NULL,
  `sending_sms` tinyint(10) NOT NULL,
  `sending_post` tinyint(10) NOT NULL,
  `profile` tinyint(10) NOT NULL,
  `message` tinyint(10) NOT NULL,
  `org_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `group_id`, `sending_email`, `sending_sms`, `sending_post`, `profile`, `message`, `org_id`) VALUES
(4, 5, 1, 2, 1, 2, 1, 22),
(3, 6, 1, 1, 1, 1, 1, 22),
(5, 7, 1, 1, 1, 1, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_message` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `household_size` varchar(100) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `previlige_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `org_id`, `name`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`, `password`, `photo1`, `previlige_status`) VALUES
(3, 22, 'ahmed', '454', 455, 'nur2510@gmail.com', 'dd', 'dd', 'dd', 5, 'nur', 'MTIzNDU2', '', 1),
(4, 22, 'ahmed', 'jj', 0, 'nur25100@gmail.com', 'kk', 'kk', 'kk', 6, 'nur123', 'MTIzNDU2', '', 1),
(5, 22, 'kamal', 'jkk', 1777, 'k@gmail.com', 'kk', 'kkk', 'kkk', 5, 'kamal', 'MTIzNDU2', '', 1),
(6, 21, 'dd', '122/12/1', 172585698, 'k1@gmail.com', 'dkkk', '12222', '222', 5, 'kkk', 'MTIzNDU2Nzg=', '', 1),
(7, 22, 'nabil', '1222', 17777, 'kk@gmail.com', 'djfdf', 'jhjh', 'jhj', 5, 'nabil', 'MTIzNDU2', '', 0),
(8, 22, 'yeasin', 'djf', 0, 'h@gmail.com', 'dkfj', 'kjdfk', 'kjdkf', 5, 'yeasin', 'MTIzNDU2', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_post`
--

CREATE TABLE IF NOT EXISTS `member_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `validity` varchar(100) NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `importance` int(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `member_post`
--

INSERT INTO `member_post` (`id`, `title`, `text`, `validity`, `date_of_creation`, `created_by`, `importance`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(10, 'associatin', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle o', '', '2012-02-17', '3', 3, '2012-02-26', 3, 22, '5', 2),
(9, 'news', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle o', '', '2012-02-15', '3', 3, '2012-02-29', 3, 22, '5', 2),
(8, 'association', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', '', '2012-02-17', '3', 2, '2012-02-12', 3, 22, '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_previlige`
--

CREATE TABLE IF NOT EXISTS `member_previlige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `mainboard_access_main` int(20) DEFAULT NULL,
  `mainboard_send_proposal` int(20) DEFAULT NULL,
  `mainboard_change_article` int(20) DEFAULT NULL,
  `mainboard_send_notification` int(20) DEFAULT NULL,
  `mainboard_sending_out` int(20) DEFAULT NULL,
  `mainboard_manually_archive` int(20) DEFAULT NULL,
  `forum_access` int(20) DEFAULT NULL,
  `forum_comments` int(20) DEFAULT NULL,
  `forum_delete_won_comments` int(20) DEFAULT NULL,
  `forum_delete_any_coments` int(20) DEFAULT NULL,
  `forum_manual_comments` int(20) DEFAULT NULL,
  `member_login_logout` int(20) DEFAULT NULL,
  `member_change_profile` int(20) DEFAULT NULL,
  `member_change_password` int(20) DEFAULT NULL,
  `configuration_view_org` int(20) DEFAULT NULL,
  `configuration_change_org` int(20) DEFAULT NULL,
  `configuration_visibility` int(20) DEFAULT NULL,
  `configuration_switching` int(20) DEFAULT NULL,
  `configuration_create_address` int(20) DEFAULT NULL,
  `communication_send_email` int(20) DEFAULT NULL,
  `communication_send_sms` int(20) DEFAULT NULL,
  `communication_send_letters` int(20) DEFAULT NULL,
  `economics_register` int(20) DEFAULT NULL,
  `economics_send_payment` int(20) DEFAULT NULL,
  `economics_check_complete` int(20) DEFAULT NULL,
  `economics_watch_total_income` int(20) DEFAULT NULL,
  `economics_watch_total_cost` int(20) DEFAULT NULL,
  `economics_watch_statistics` int(20) DEFAULT NULL,
  `history_access_articles` int(20) DEFAULT NULL,
  `history_access_comments` int(20) DEFAULT NULL,
  `history_user_actions` int(20) DEFAULT NULL,
  `history_old_letters` int(20) DEFAULT NULL,
  `history_old_sms` int(20) DEFAULT NULL,
  `history_old_emails` int(20) DEFAULT NULL,
  `members_decide` int(20) DEFAULT NULL,
  `members_add_change` int(20) DEFAULT NULL,
  `members_c_group` int(20) DEFAULT NULL,
  `members_add_user` int(20) DEFAULT NULL,
  `members_user_types` int(20) DEFAULT NULL,
  `members_add_usertype` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member_previlige`
--

INSERT INTO `member_previlige` (`id`, `member_id`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manual_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_add_user`, `members_user_types`, `members_add_usertype`) VALUES
(1, 3, 22, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_cost`
--

CREATE TABLE IF NOT EXISTS `org_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(20) NOT NULL,
  `sms_cost` int(100) NOT NULL,
  `letter_cost` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `org_cost`
--

INSERT INTO `org_cost` (`id`, `org_id`, `sms_cost`, `letter_cost`) VALUES
(1, 17, 10, 10),
(4, 26, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `org_group`
--

CREATE TABLE IF NOT EXISTS `org_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `org_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `org_group`
--

INSERT INTO `org_group` (`id`, `group_name`, `org_id`) VALUES
(6, 'Doctor', 22),
(5, 'Friend', 22),
(4, 'Sss', 22),
(7, 'developer', 26);

-- --------------------------------------------------------

--
-- Table structure for table `org_previlige`
--

CREATE TABLE IF NOT EXISTS `org_previlige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `mainboard_access_main` int(20) DEFAULT NULL,
  `mainboard_send_proposal` int(20) DEFAULT NULL,
  `mainboard_change_article` int(20) DEFAULT NULL,
  `mainboard_send_notification` int(20) DEFAULT NULL,
  `mainboard_sending_out` int(20) DEFAULT NULL,
  `mainboard_manually_archive` int(20) DEFAULT NULL,
  `forum_access` int(20) DEFAULT NULL,
  `forum_comments` int(20) DEFAULT NULL,
  `forum_delete_won_comments` int(20) DEFAULT NULL,
  `forum_delete_any_coments` int(20) DEFAULT NULL,
  `forum_manual_comments` int(20) DEFAULT NULL,
  `member_login_logout` int(20) DEFAULT NULL,
  `member_change_profile` int(20) DEFAULT NULL,
  `member_change_password` int(20) DEFAULT NULL,
  `configuration_view_org` int(20) DEFAULT NULL,
  `configuration_change_org` int(20) DEFAULT NULL,
  `configuration_visibility` int(20) DEFAULT NULL,
  `configuration_switching` int(20) DEFAULT NULL,
  `configuration_create_address` int(20) DEFAULT NULL,
  `communication_send_email` int(20) DEFAULT NULL,
  `communication_send_sms` int(20) DEFAULT NULL,
  `communication_send_letters` int(20) DEFAULT NULL,
  `economics_register` int(20) DEFAULT NULL,
  `economics_send_payment` int(20) DEFAULT NULL,
  `economics_check_complete` int(20) DEFAULT NULL,
  `economics_watch_total_income` int(20) DEFAULT NULL,
  `economics_watch_total_cost` int(20) DEFAULT NULL,
  `economics_watch_statistics` int(20) DEFAULT NULL,
  `history_access_articles` int(20) DEFAULT NULL,
  `history_access_comments` int(20) DEFAULT NULL,
  `history_user_actions` int(20) DEFAULT NULL,
  `history_old_letters` int(20) DEFAULT NULL,
  `history_old_sms` int(20) DEFAULT NULL,
  `history_old_emails` int(20) DEFAULT NULL,
  `members_decide` int(20) DEFAULT NULL,
  `members_add_change` int(20) DEFAULT NULL,
  `members_c_group` int(20) DEFAULT NULL,
  `members_add_user` int(20) DEFAULT NULL,
  `members_user_types` int(20) DEFAULT NULL,
  `members_add_usertype` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `org_previlige`
--

INSERT INTO `org_previlige` (`id`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manual_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_add_user`, `members_user_types`, `members_add_usertype`) VALUES
(14, 21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(13, 22, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_type`
--

CREATE TABLE IF NOT EXISTS `org_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_type` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `org_type`
--

INSERT INTO `org_type` (`id`, `org_type`, `status`) VALUES
(15, 'Ddd', 2),
(12, 'Sports', 2),
(13, 'Game', 2),
(14, 'Games', 2),
(16, 'Rrrr', 1),
(17, 'Yyy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `no_of_member` int(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `duration` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package_name`, `no_of_member`, `amount`, `currency`, `duration`) VALUES
(13, 'Dbs', 50, 5, 'GBP', 5),
(16, 'Sls', 500, 20, 'GBP', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `roles_permissions_FK` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `data`) VALUES
(1, 7, 'a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}'),
(2, 1, 'a:3:{s:3:"uri";a:1:{i:0;s:9:"/backend/";}s:4:"edit";s:1:"1";s:6:"delete";s:0:"";}'),
(3, 5, 'a:3:{s:3:"uri";a:1:{i:0;s:1:"/";}s:4:"edit";s:1:"1";s:6:"delete";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `post_tbl`
--

CREATE TABLE IF NOT EXISTS `post_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_from` varchar(100) NOT NULL,
  `send_to` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `post_tbl`
--

INSERT INTO `post_tbl` (`id`, `send_from`, `send_to`, `post_id`, `status`) VALUES
(23, '3', '3', '10', 2),
(22, '3', '8', '10', 2),
(21, '3', '7', '10', 2),
(20, '3', '5', '10', 2),
(19, '3', '3', '8', 2),
(18, '3', '8', '8', 2),
(17, '3', '7', '8', 2),
(16, '3', '5', '8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'User'),
(5, 0, 'Admin'),
(7, 0, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `emp_name` varchar(300) COLLATE utf8_bin NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `roles_users_FK` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `emp_name`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 7, '', 'admin', '$1$MR1.l0/.$1WCjSW825zngPffCZ.YkL/', 'admin@aomeifootwerar.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-02-17 09:17:10', '2008-11-30 04:56:32', '2012-02-17 15:17:10'),
(31, 7, 'nur', 'nur', '$1$Fc5.qR3.$GOv2B9qgIWbPluryGF7EK/', 'nur2510@gmail.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2011-12-07 05:16:11', '2011-12-07 11:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('4e26e3eb15045de648fbf21fcdcd3491', 13, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.14) Gecko/2009082707 Dealio Toolbar 3.1 Firefox/3.0.14', '61.74.87.253', '2009-11-19 00:41:17'),
('6b942e62f46e4f6767001ff109bee59b', 20, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.22) Gecko/20110902 Firefox/3.6.22', '127.0.0.1', '2011-09-08 10:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_back`
--

CREATE TABLE IF NOT EXISTS `user_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_back`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_number` int(100) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `org_primary_address` varchar(100) NOT NULL,
  `org_optional_address` varchar(100) NOT NULL,
  `org_type` int(40) NOT NULL,
  `role_id` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `package_name` int(20) NOT NULL,
  `payment_amount` int(100) NOT NULL,
  `area_name` int(20) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `org_phone` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `credit_card_info` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `cvv2_no` int(100) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `chairman` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_receive_by` tinyint(10) NOT NULL,
  `payment_status` tinyint(10) NOT NULL,
  `approval_status` tinyint(10) NOT NULL,
  `login_status` tinyint(10) NOT NULL,
  `previlige_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `org_number`, `org_name`, `first_name`, `last_name`, `org_primary_address`, `org_optional_address`, `org_type`, `role_id`, `address`, `package_name`, `payment_amount`, `area_name`, `phone_no`, `org_phone`, `email`, `photo1`, `credit_card_info`, `card_no`, `expire_date`, `cvv2_no`, `name_on_card`, `bank_info`, `chairman`, `password`, `password_receive_by`, `payment_status`, `approval_status`, `login_status`, `previlige_status`) VALUES
(21, 25, 'sports society', 'ahmed', 'ahmed', '545', '54', 0, 7, '45', 13, 5, 33, '45', '54', 'nur@gmail.com', '', '', '454', '545', 45, '78', '', '', 'MTE3MDk=', 1, 1, 1, 2, 1),
(22, 56, 'rahid society', 'rahid', 'hasan', 'kdfjkdf', 'kjkj', 17, 7, '258/258', 16, 20, 32, '0172587', '017585', 'nur2510@gmail.com', 'ae3d914789f888beb991a1cae0be5cd9.jpg', '', '12', '2012-01-05', 4545, '45', 'dd', '', 'MTE3MDk=', 1, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `roles_usertemp_FK` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone`) VALUES
(32, 'Gulshan'),
(31, 'Nikaton');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
