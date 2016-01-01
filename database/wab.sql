-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2015 at 01:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wab`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_list`
--

CREATE TABLE IF NOT EXISTS `address_list` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `address_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `address_list`
--

INSERT INTO `address_list` (`id`, `org_id`, `member_id`, `address_title`, `address`) VALUES
(1, 22, 0, 'MD kamal hossain', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(4, 22, 0, 'Md Imran hossain', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(3, 22, 0, 'MD kamal ahmed', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(6, 22, 0, 'MD Abdur karim', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(8, 22, 3, 'MD Hasan ahmed', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(11, 22, 0, 'v?gen', 'v?gen'),
(13, 22, 34, 'imran hossain', 'Test ddress');

-- --------------------------------------------------------

--
-- Table structure for table `admin_communicate_org_email`
--

CREATE TABLE IF NOT EXISTS `admin_communicate_org_email` (
`communication_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `send_from` text NOT NULL,
  `receiver_id` bigint(12) DEFAULT NULL,
  `email_subject` text NOT NULL,
  `email_message` text NOT NULL,
  `attached_files` text,
  `uploaded_dir` text,
  `message_read` int(1) NOT NULL DEFAULT '0',
  `reply_of` bigint(12) DEFAULT NULL,
  `receiver_email` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `admin_communicate_org_email`
--

INSERT INTO `admin_communicate_org_email` (`communication_id`, `sender_id`, `send_from`, `receiver_id`, `email_subject`, `email_message`, `attached_files`, `uploaded_dir`, `message_read`, `reply_of`, `receiver_email`, `add_date`, `update_date`) VALUES
(7, 41, 'BTH', 107, 'This is Subject Test', 'This is message for testing....', 'Extra Document for Sweden.docx|Motivation letter for Software Engineering of Distributed System KTH.doc|', '1_40', 1, NULL, 'tahersumonabu@gmail.com', '2012-12-12 01:37:40', '2012-12-12 00:37:40'),
(8, 41, 'BTH', 106, 'This is Subject Test', 'This is message for testing....', 'Extra Document for Sweden.docx|Motivation letter for Software Engineering of Distributed System KTH.doc|', '1_40', 1, NULL, 'krishna12@yahoo.com', '2012-12-12 01:37:40', '2012-12-12 00:37:40'),
(9, 41, 'Adminscentral', 107, 'This is Subject Test', 'ssssssss', '', '9_03', 0, NULL, 'tahersumonabu@gmail.com', '2012-12-12 01:48:03', '2012-12-12 00:48:03'),
(10, 41, 'Adminscentral', 107, 'This is Subject Test', 'This is Subject TestThis is Subject TestThis is Subject Test', '', '10_45', 1, NULL, 'tahersumonabu@gmail.com', '2012-12-12 01:49:45', '2012-12-12 00:49:45'),
(11, 41, 'KTH', 106, 'This is Subject Test', 'This is Subject TestThis is Subject TestThis is Subject Test', '', '10_45', 1, NULL, 'krishna12@yahoo.com', '2012-12-12 01:49:45', '2012-12-12 00:49:46'),
(12, 41, 'Adminscentral', 107, 'This is Subject Test', 'This is Subject Test', '', '', 0, NULL, 'tahersumonabu@gmail.com', '2012-12-12 01:54:20', '2012-12-12 00:54:20'),
(13, 41, 'Adminscentral', 106, 'This is Subject Test', 'This is Subject Test', '', '', 0, NULL, 'krishna12@yahoo.com', '2012-12-12 01:54:20', '2012-12-12 00:54:20'),
(14, 106, 'CPH', NULL, 'This is Subject Test', 'This is Subject Test', 'Extra Document for Sweden.docx|Recommandation Letter.doc|', '14_24', 1, NULL, 'tahersumonabu@gmail.com', '2012-12-12 01:56:24', '2012-12-12 00:56:24'),
(15, 41, 'Adminscentral', 106, 'This is Subject Test', 'This is Message from Adminscentral', 'Extra Document for Sweden.docx|Recommandation Letter.doc|', '14_24', 0, NULL, 'krishna12@yahoo.com', '2012-12-12 01:56:24', '2012-12-12 00:56:25'),
(16, 41, 'TRENTO', NULL, 'This is Subject Test', 'This is Subject Test', 'Extra Document for Sweden.docx|', '16_17', 1, NULL, 'tahersumonabu@gmail.com', '2012-12-12 02:01:17', '2012-12-12 01:01:17'),
(18, 106, 'KTHOO', NULL, 'Re : This is Subject Test', 'Hi! Admin\r\n\r\nI am from KTHOO', NULL, NULL, 1, 15, NULL, '2012-12-06 00:00:00', '2012-12-12 18:44:15'),
(19, 41, 'Adminscentral', 106, 'Re : This is Subject Test', 'It''s just Testing', NULL, NULL, 0, 15, NULL, '2012-12-06 00:00:00', '2012-12-12 19:33:36'),
(20, 106, 'KTHOO', NULL, 'Re : This is Subject Test', 'HI! \r\n\r\nI am KTHOO', 'Extra Document for Sweden.docx|Recommandation Letter.doc|', '14_24', 1, 15, NULL, '0000-00-00 00:00:00', '2012-12-12 20:45:56'),
(21, 106, 'KTHOO', NULL, 'Re:\r\nThis is Subject Test', 'Hi!\r\n\r\nI am from KTHOO', NULL, NULL, 1, 15, NULL, '2012-12-13 00:00:00', '2012-12-12 20:47:09'),
(23, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'Hi! Org_Admin\n\nI am from Adminscentral', '', '', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:20:02', '2012-12-16 00:20:02'),
(24, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'Hi! Org Admin\n\nI am here to see you', 'Recommandation Letter.doc|Motivation letter for Security Engineering BTH.doc|Motivation letter for Software Engineering of Distributed System KTH.doc|', '24_20', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:39:20', '2012-12-16 00:39:20'),
(25, 41, 'Adminscentral', 41, 'Re:This is Subject Test', 'This is message for testing....', 'Recommandation Letter.doc|', '25_45', 0, 7, NULL, '2012-12-16 01:45:45', '2012-12-16 00:45:45'),
(26, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is Subject Test', 'Recommandation Letter.doc|', '26_40', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:47:40', '2012-12-16 00:47:40'),
(27, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is Subject Test', 'Motivation letter for Software Engineering of Distributed System KTH.doc|', '27_38', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:48:38', '2012-12-16 00:48:38'),
(28, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is Subject Test', '', '', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:53:14', '2012-12-16 00:53:14'),
(29, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is Subject Test', '', '', 0, 14, 'krishna12@yahoo.com', '2012-12-16 01:56:48', '2012-12-16 00:56:48'),
(30, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is Subject Test', '', '', 0, 14, 'krishna12@yahoo.com', '2012-12-16 02:03:14', '2012-12-16 01:03:14'),
(31, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is for Individual', 'Recommandation Letter.doc|', '31_07', 0, 14, 'krishna12@yahoo.com', '2012-12-16 02:04:07', '2012-12-16 01:04:07'),
(32, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is for Individual', 'Recommandation Letter.doc|', '31_07', 0, 14, 'taher@technobd.com', '2012-12-16 02:04:07', '2012-12-16 01:04:07'),
(33, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is for Individual', 'Recommandation Letter.doc|', '31_07', 0, 14, 'aiub@boch.com', '2012-12-16 02:04:07', '2012-12-16 01:04:07'),
(34, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is for Individual', 'Recommandation Letter.doc|', '31_07', 0, 14, 'bockachoda@halabalchoda.com', '2012-12-16 02:04:07', '2012-12-16 01:04:07'),
(35, 41, 'Adminscentral', 106, 'Re:This is Subject Test', 'This is to org', 'Extra Document for Sweden.docx|', '35_35', 0, 14, 'krishna12@yahoo.com', '2012-12-16 02:05:35', '2012-12-16 01:05:35'),
(36, 41, 'Adminscentral', 107, 'Re:This is Subject Test', 'This is to org', 'Extra Document for Sweden.docx|', '35_35', 0, 14, 'tahersumonabu@gmail.com', '2012-12-16 02:05:35', '2012-12-16 01:05:35'),
(37, 41, 'Adminscentral', 41, 'Re:This is Subject Test', 'This is message for testing....', 'Extra Document for Sweden.docx|', '37_16', 0, 8, NULL, '2012-12-16 02:09:16', '2012-12-16 01:09:16'),
(38, 41, 'Adminscentral', 41, 'Re:This is Subject Test', 'This is message for testing....', 'Motivation letter for Software Engineering of Distributed System KTH.doc|', '38_47', 0, 8, NULL, '2012-12-16 02:09:47', '2012-12-16 01:09:47'),
(39, 41, 'Adminscentral', 41, 'Re:This is Subject Test', 'This is message for testing....', 'Motivation letter for Software Engineering of Distributed System KTH.doc|', '38_47', 0, 8, 'tahersumonabu@gmail.com', '2012-12-16 02:09:47', '2012-12-16 01:09:47'),
(40, 41, 'Adminscentral', NULL, 'This is Subject', 'zzzzzzzzzz', '', '', 0, NULL, 'tahersumonabu@gmail.com', '2012-12-16 23:56:16', '2012-12-16 22:56:16'),
(41, 41, 'Adminscentral', NULL, 'This is Subject', 'aaaaaaaaaaaaaa', '', '', 0, NULL, 'tahersumonabu@gmail.com', '2012-12-16 23:57:42', '2012-12-16 22:57:42'),
(42, 41, 'Adminscentral', 41, 'Re:This is Subject Test', 'This is Subject Test', '', '', 1, 16, NULL, '2012-12-16 23:57:52', '2012-12-16 22:57:52'),
(43, 41, 'Adminscentral', NULL, 'This is Subject', 'sssssssssssssss', '', '', 1, NULL, 'taher@technobd.com', '2012-12-19 00:04:22', '2012-12-18 23:04:22'),
(44, 41, 'Adminscentral', NULL, 'This is Subject', 'sssssssssssssss', '', '', 1, NULL, 'aiub@boch.com', '2012-12-19 00:04:22', '2012-12-18 23:04:22'),
(45, 41, 'Adminscentral', NULL, 'This is Subject', 'sssssssssssssss', '', '', 1, NULL, 'bockachoda@halabalchoda.com', '2012-12-19 00:04:22', '2012-12-18 23:04:22'),
(46, 41, 'Adminscentral', 111, 'jkkjkjnmnm', 'GFFGFGFG', '', '', 0, NULL, 'usama@kmail.com', '2013-03-16 15:35:25', '2013-03-16 14:35:25'),
(47, 41, 'Adminscentral', 110, 'jkkjkjnmnm', 'GFFGFGFG', '', '', 0, NULL, 'faham@kmail.com', '2013-03-16 15:35:25', '2013-03-16 14:35:25'),
(48, 41, 'Adminscentral', 109, 'jkkjkjnmnm', 'GFFGFGFG', '', '', 0, NULL, 'tahersum@disi.unitn', '2013-03-16 15:35:25', '2013-03-16 14:35:25'),
(49, 41, 'Adminscentral', 107, 'jkkjkjnmnm', 'GFFGFGFG', '', '', 0, NULL, 'tahersumonabu@disi.unitn', '2013-03-16 15:35:25', '2013-03-16 14:35:25'),
(50, 41, 'Adminscentral', 106, 'jkkjkjnmnm', 'GFFGFGFG', '', '', 0, NULL, 'krishna12@yahoo.com', '2013-03-16 15:35:25', '2013-03-16 14:35:25'),
(51, 41, 'Adminscentral', 111, 'mmj', 'ggg', 'photo.JPG|', '51_50', 0, NULL, 'usama@kmail.com', '2013-03-16 15:36:50', '2013-03-16 14:36:50'),
(52, 41, 'Adminscentral', 110, 'mmj', 'ggg', 'photo.JPG|', '51_50', 0, NULL, 'faham@kmail.com', '2013-03-16 15:36:50', '2013-03-16 14:36:50'),
(53, 41, 'Adminscentral', 109, 'mmj', 'ggg', 'photo.JPG|', '51_50', 0, NULL, 'tahersum@disi.unitn', '2013-03-16 15:36:50', '2013-03-16 14:36:50'),
(54, 41, 'Adminscentral', 107, 'mmj', 'ggg', 'photo.JPG|', '51_50', 0, NULL, 'tahersumonabu@disi.unitn', '2013-03-16 15:36:50', '2013-03-16 14:36:50'),
(55, 41, 'Adminscentral', 106, 'mmj', 'ggg', 'photo.JPG|', '51_50', 1, NULL, 'krishna12@yahoo.com', '2013-03-16 15:36:50', '2013-03-16 14:36:50'),
(56, 46, 'Adminscentral', 109, 'This is testing message', 'This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message This is testing message', 'annonstext_the_local-2_.pdf|06337580 (1).pdf|', '56_10', 0, NULL, 'tahersum@disi.unitn', '2013-07-21 16:46:10', '2013-07-21 14:46:10'),
(57, 46, 'Adminscentral', 109, 'This is testing message', 'This is testing message', '06337580 (1).pdf|', '57_56', 0, NULL, 'tahersum@disi.unitn', '2013-07-21 16:50:56', '2013-07-21 14:50:56'),
(58, 41, 'Adminscentral', NULL, 'tahersumonabu@gmail.com', 'this is testing', '', '', 1, NULL, 'tahersumonabu@gmail.com', '2013-09-15 12:11:49', '2013-09-15 10:11:49'),
(59, 41, 'Adminscentral', 41, 'Re:tahersumonabu@gmail.com', 'this is testing\n\nhi! this is reply', '', '', 1, 58, NULL, '2013-09-20 01:30:17', '2013-09-19 23:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_communicate_org_letter`
--

CREATE TABLE IF NOT EXISTS `admin_communicate_org_letter` (
`letter_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `letter_title` text NOT NULL,
  `letter_text` text,
  `uploaded_letter` text,
  `letter_footer` int(1) NOT NULL DEFAULT '1' COMMENT '1=It has footer, 0= It has no footer',
  `letter_status` int(1) NOT NULL DEFAULT '0' COMMENT '0= Pending, 1= Delivered',
  `letter_individual_address` text COMMENT 'Each address Seperated by (|)',
  `receiver_org_ids` text COMMENT 'each org_id seperated by (|)',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `admin_communicate_org_letter`
--

INSERT INTO `admin_communicate_org_letter` (`letter_id`, `sender_id`, `letter_title`, `letter_text`, `uploaded_letter`, `letter_footer`, `letter_status`, `letter_individual_address`, `receiver_org_ids`, `add_date`, `update_date`) VALUES
(53, 41, 'Upload Letter', '', NULL, 0, 1, 'C/O: Faham Hossain, Kungsmarken 67 LGH 1501, 37144 Karlskrona, Sweden | C/O: Abu Taher, Kungsmarken 95 LGH 1801, 37144 Karlskrona, Sweden', '', '2012-12-23 02:45:05', '2012-12-23 02:12:31'),
(54, 41, 'Second Upload', '', NULL, 0, 1, NULL, '106,107', '2012-12-23 02:51:15', '2012-12-23 02:12:27'),
(55, 41, 'Second Upload', 'In computability theory, a set of natural numbers is called recursive, computable or decidable if there is an algorithm which terminates after a finite amount of time and correctly decides whether or not a given number belongs to the set.\nA more general class of sets consists of the recursively enumerable sets, also called semidecidable sets. For these sets, it is only required that there is an algorithm that correctly decides when a number is in the set; the algorithm may give no answer (but not the wrong answer) for numbers not in the set.\nA set which is not computable is called noncomputable or undecidable.\n', NULL, 1, 1, NULL, '106,107', '2012-12-23 02:55:31', '2012-12-23 02:12:22'),
(56, 41, 'This is create', 'In computability theory, a set of natural numbers is called recursive, computable or decidable if there is an algorithm which terminates after a finite amount of time and correctly decides whether or not a given number belongs to the set.\nA more general class of sets consists of the recursively enumerable sets, also called semidecidable sets. For these sets, it is only required that there is an algorithm that correctly decides when a number is in the set; the algorithm may give no answer (but not the wrong answer) for numbers not in the set.\nA set which is not computable is called noncomputable or undecidable.\n', NULL, 1, 1, NULL, '106,107', '2012-12-23 02:56:15', '2012-12-23 02:12:11'),
(57, 41, 'New Upload', '', NULL, 0, 1, NULL, '106,107', '2012-12-23 02:57:32', '2012-12-23 02:11:59'),
(58, 41, 'Test Today', 'We are here', NULL, 1, 0, NULL, '106,107,109,110,111,112', '2013-03-16 22:34:20', '2013-03-16 21:34:20'),
(59, 41, 'Test For To night', 'Test For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\nTest For To night Test For To night Test For To night Test For To night Test For To night\n\n', NULL, 1, 0, NULL, '106,107,109,110,111,112', '2013-03-16 22:47:49', '2013-03-16 21:47:49'),
(60, 46, 'This is testing', '', NULL, 0, 1, NULL, '109', '2013-07-21 17:03:18', '2013-07-21 15:07:02'),
(61, 46, 'testing', 'testing testing', NULL, 1, 0, NULL, '109', '2013-07-21 17:08:16', '2013-07-21 15:08:16'),
(62, 41, 'Test footer', 'Test footer Test footer Test footer Test footer Test footer Test footer Test footer\nTest footer Test footer Test footer Test footer Test footer Test footer Test footer\nTest footer Test footer Test footer Test footer Test footer Test footer Test footer\nTest footer Test footer Test footer Test footer Test footer Test footer Test footer', NULL, 1, 1, NULL, '109', '2013-10-16 19:20:07', '2014-04-02 09:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_communicate_org_sms`
--

CREATE TABLE IF NOT EXISTS `admin_communicate_org_sms` (
`sms_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `send_from` text NOT NULL,
  `sender_contact_no` text,
  `receiver_id` bigint(12) DEFAULT NULL,
  `receiver_contact_no` varchar(100) NOT NULL,
  `sms_content` text,
  `sms_read` tinyint(1) NOT NULL DEFAULT '0',
  `reply_of` bigint(12) DEFAULT NULL,
  `total_sms_sent` bigint(20) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '1=internal,2=external'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `admin_communicate_org_sms`
--

INSERT INTO `admin_communicate_org_sms` (`sms_id`, `sender_id`, `send_from`, `sender_contact_no`, `receiver_id`, `receiver_contact_no`, `sms_content`, `sms_read`, `reply_of`, `total_sms_sent`, `add_date`, `update_date`) VALUES
(177, 41, 'Adminscentral', NULL, 110, '6677777', 'z<z<<<z', 0, NULL, 6, '2013-03-16 17:44:58', '2013-03-16 16:44:58'),
(178, 41, 'Adminscentral', NULL, 109, '66787878', 'z<z<<<z', 0, NULL, 6, '2013-03-16 17:44:58', '2013-03-16 16:44:58'),
(179, 41, 'Adminscentral', NULL, 107, '6767787887', 'z<z<<<z', 0, NULL, 6, '2013-03-16 17:44:58', '2013-03-16 16:44:58'),
(180, 41, 'Adminscentral', NULL, NULL, '333333333333', 'ass', 0, NULL, 10, '2013-03-16 17:47:57', '2013-03-16 16:47:57'),
(181, 41, 'Adminscentral', NULL, NULL, '3333333333333', 'ass', 0, NULL, 10, '2013-03-16 17:47:57', '2013-03-16 16:47:57'),
(182, 41, 'Adminscentral', NULL, NULL, '44444444444444', 'ass', 0, NULL, 10, '2013-03-16 17:47:57', '2013-03-16 16:47:57'),
(183, 41, 'Adminscentral', NULL, NULL, '555555555555555', 'ass', 0, NULL, 10, '2013-03-16 17:47:57', '2013-03-16 16:47:57'),
(184, 46, 'Adminscentral', NULL, NULL, '+46707448223', 'tESTING', 0, NULL, 1, '2013-07-21 16:53:32', '2013-07-21 14:53:32'),
(174, 41, 'Adminscentral', '+393280088301', 41, '', 'Hi! \n\nThis is from YKK', 1, NULL, 2, '2012-12-20 00:00:00', '2012-12-18 23:38:41'),
(170, 104, 'BHUYYT', '+393280088301', 41, '', 'Hi! \n\nThis is from YKK', 1, NULL, 2, '2012-12-20 00:00:00', '2012-12-18 23:39:10'),
(169, 105, 'BHUYYT', '+393280088301', 41, '', 'Hi! \n\nThis is from YKK', 1, NULL, 2, '2012-12-20 00:00:00', '2012-12-18 23:39:21'),
(175, 106, 'Sweden', '+393280088301', 41, '', 'Hi! \n\nThis is from YKK', 1, NULL, 2, '2012-12-20 00:00:00', '2012-12-18 23:48:15'),
(176, 41, 'Adminscentral', NULL, 111, '33333333', 'z<z<<<z', 0, NULL, 6, '2013-03-16 17:44:58', '2013-03-16 16:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(300) COLLATE utf8_bin NOT NULL,
  `person_number` varchar(256) COLLATE utf8_bin NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone_no` text COLLATE utf8_bin,
  `user_type_id` bigint(10) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `blocked` int(11) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=42 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `person_number`, `username`, `password`, `email`, `phone_no`, `user_type_id`, `last_login`, `blocked`, `add_date`, `update_date`) VALUES
(41, 'hossain khan', '789889', 'taheradmin', 'pljdQVJ5fjqCow/4spVBtEATCxrfNozF+Mwt/BJ3aw4=', 'info@logic-coder.info', NULL, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2015-12-13 16:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_previlize`
--

CREATE TABLE IF NOT EXISTS `admin_user_previlize` (
`id` bigint(10) NOT NULL,
  `user_type_id` bigint(10) NOT NULL,
  `order_view_letters` int(1) NOT NULL DEFAULT '0',
  `order_deliver_letters` int(1) NOT NULL DEFAULT '0',
  `order_archieve_letters` int(1) NOT NULL DEFAULT '0',
  `order_view_new_customer` int(1) NOT NULL DEFAULT '0',
  `order_approve_new_customer` int(1) NOT NULL DEFAULT '0',
  `order_deny_new_customer` int(1) NOT NULL DEFAULT '0',
  `order_view_package_order` int(1) NOT NULL DEFAULT '0',
  `order_approve_package_order` int(1) NOT NULL DEFAULT '0',
  `order_deny_package_order` int(1) NOT NULL DEFAULT '0',
  `configuration_access` int(1) NOT NULL DEFAULT '0',
  `customer_view_registered_customer` int(1) NOT NULL DEFAULT '0',
  `customer_create_new_customer` int(1) NOT NULL DEFAULT '0',
  `customer_view_customer_details` int(1) NOT NULL DEFAULT '0',
  `customer_edit_customer_details` int(1) NOT NULL DEFAULT '0',
  `customer_view_bank_details` int(1) NOT NULL DEFAULT '0',
  `customer_restriction_on_sms_letter` int(1) NOT NULL DEFAULT '0',
  `customer_activate_deactivate_customer` int(1) NOT NULL DEFAULT '0',
  `customer_previlization_settings` int(1) NOT NULL DEFAULT '0',
  `billing_view_billing` int(1) NOT NULL DEFAULT '0',
  `billing_edit_invoice` int(1) NOT NULL DEFAULT '0',
  `billing_view_invoice_receipt` int(1) NOT NULL DEFAULT '0',
  `billing_send_invoice_receipt` int(1) NOT NULL DEFAULT '0',
  `billing_send_reminder` int(1) NOT NULL DEFAULT '0',
  `billing_change_paid_unpaid_status` int(1) NOT NULL DEFAULT '0',
  `users_view_users` int(1) NOT NULL DEFAULT '0',
  `users_edit_users` int(1) NOT NULL DEFAULT '0',
  `users_delete_users` int(1) NOT NULL DEFAULT '0',
  `users_create_new_users` int(1) NOT NULL DEFAULT '0',
  `users_block_unblock_user` int(1) NOT NULL DEFAULT '0',
  `user_types_view_user_types` int(1) NOT NULL DEFAULT '0',
  `user_types_edit_user_types` int(1) NOT NULL DEFAULT '0',
  `user_types_delete_user_types` int(1) NOT NULL DEFAULT '0',
  `user_types_previlization_settings` int(1) NOT NULL DEFAULT '0',
  `user_types_create_new_user_types` int(1) NOT NULL DEFAULT '0',
  `communication_email_view_inbox` int(1) NOT NULL DEFAULT '0',
  `communication_email_compose_new` int(1) NOT NULL DEFAULT '0',
  `communication_email_view_sent` int(1) NOT NULL DEFAULT '0',
  `communication_sms_view_inbox` int(1) NOT NULL DEFAULT '0',
  `communication_sms_write_new` int(1) NOT NULL DEFAULT '0',
  `communication_sms_view_sent` int(1) NOT NULL DEFAULT '0',
  `letter_write_new` int(1) NOT NULL DEFAULT '0',
  `letter_view_sent` int(1) NOT NULL DEFAULT '0',
  `tracking_access` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_user_previlize`
--

INSERT INTO `admin_user_previlize` (`id`, `user_type_id`, `order_view_letters`, `order_deliver_letters`, `order_archieve_letters`, `order_view_new_customer`, `order_approve_new_customer`, `order_deny_new_customer`, `order_view_package_order`, `order_approve_package_order`, `order_deny_package_order`, `configuration_access`, `customer_view_registered_customer`, `customer_create_new_customer`, `customer_view_customer_details`, `customer_edit_customer_details`, `customer_view_bank_details`, `customer_restriction_on_sms_letter`, `customer_activate_deactivate_customer`, `customer_previlization_settings`, `billing_view_billing`, `billing_edit_invoice`, `billing_view_invoice_receipt`, `billing_send_invoice_receipt`, `billing_send_reminder`, `billing_change_paid_unpaid_status`, `users_view_users`, `users_edit_users`, `users_delete_users`, `users_create_new_users`, `users_block_unblock_user`, `user_types_view_user_types`, `user_types_edit_user_types`, `user_types_delete_user_types`, `user_types_previlization_settings`, `user_types_create_new_user_types`, `communication_email_view_inbox`, `communication_email_compose_new`, `communication_email_view_sent`, `communication_sms_view_inbox`, `communication_sms_write_new`, `communication_sms_view_sent`, `letter_write_new`, `letter_view_sent`, `tracking_access`, `add_date`, `update_date`) VALUES
(1, 6, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2012-09-18 23:04:09', '2012-10-03 19:53:14'),
(2, 4, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2012-09-18 23:40:24', '2012-09-18 22:14:42'),
(3, 7, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-03 21:33:51', '2012-10-20 18:08:48'),
(4, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2013-07-21 15:33:01', '2014-04-20 22:25:41'),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-03-29 12:47:36', NULL),
(6, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-04-08 16:20:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_types`
--

CREATE TABLE IF NOT EXISTS `admin_user_types` (
`id` bigint(10) NOT NULL,
  `type_name` varchar(256) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin_user_types`
--

INSERT INTO `admin_user_types` (`id`, `type_name`, `add_date`, `update_date`) VALUES
(6, 'Customer audit updated', '2012-09-18 02:51:05', '2012-09-18 19:08:27'),
(7, 'Admin medium', '2012-10-03 21:33:42', '2012-10-03 19:33:42'),
(8, 'New', '2013-07-21 15:32:57', '2013-07-21 13:32:57'),
(9, 'Chk', '2015-04-08 16:20:31', '2015-04-08 14:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `archive_article`
--

CREATE TABLE IF NOT EXISTS `archive_article` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `heading` text NOT NULL,
  `article_category` int(20) NOT NULL,
  `article_type` int(20) NOT NULL COMMENT '1=public,2=private',
  `post_id` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `validity` varchar(100) NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `importance` int(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `archive_article`
--

INSERT INTO `archive_article` (`id`, `title`, `heading`, `article_category`, `article_type`, `post_id`, `text`, `validity`, `date_of_creation`, `created_by`, `importance`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(7, 'news', 'news', 5, 1, '9', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle o', '', '2012-02-15', '3', 2, '2012-02-29', 3, 22, '5', 2),
(8, 'Annual Meeting', 'Annual Meeting', 5, 1, '13', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '', '2012-02-18', '3', 1, '2012-02-29', 3, 22, '5', 1),
(9, 'paragraphs', 'paragraphs', 5, 1, '12', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable', '', '2012-02-18', '3', 3, '2012-02-29', 3, 22, '5', 1),
(26, 'summer vacation', 'summer vacation', 4, 1, '35', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop', '', '2012-05-01', '3', 1, '2012-05-31', 3, 22, '5', 2),
(22, 'This is a test POst', 'This is a test POst', 4, 1, '27', 'This is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POst', '', '2012-04-21', '3', 3, '2012-04-30', 3, 22, '5', 2),
(23, 'test', 'test', 5, 1, '28', 'android app', '', '2012-04-23', '3', 4, '2012-04-30', 3, 22, '5', 2),
(27, 'GIT - Deleting a branch after merging', '<p><span style="font-size: medium;"><em><strong>GIT - Deleting a branch after merging</strong></em><', 5, 2, '45', '<p>It is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable English. Many desktop publishing packages and web  page editors now use Lorem Ipsum as their default model text, and a  search for ''lorem ipsum'' will uncover many web sites still in their  infanc</p>', '', '2012-05-26', '3', 0, '2012-06-30', 3, 22, '5', 2),
(28, 'The Importance of Thinking Big!', '', 0, 0, '48', '<p>hink about this: Most people, and I do mean most people, when things  get strange, tough or both strange and tough, quit or fear thoughts get  the best of them. But most of the best people, and that is very few  people: they fail seemingly endlessly and then get over with genuine  success once or a few times and <em>then </em>become legends. It is like  George Herman "Babe" Ruth and his home run record versus his baseball  hitting attempt records. He had more attempts at home run hitting than  he made actual successful home run hitting. But, what do we remember a  record of? We remember a record of all the successful home run hitting.</p>\n<p>This  is a better example: Thomas Edison and his assistants reportedly failed  over ten thousand times with many of the inventions before they worked  fully successfully once and always through a fixed formula that would  work repeatedly, but <strong>the full success of that one fixed formula  versus the many failures before it, made Thomas Edison and those  associated with him, legends.</strong> My point? A legend becomes a  legend through big goals, and gigantic seeming failures, and then  ultimate success through persistence. After all, what was the real point  of "The Odyssey of Homer" and "Beowulf" as the epic ancient poems that  they were? These stories showed this reality of massive failure, then  even greater success fully. Although, they had many seeming myths, and  seeming silly and antiquated concepts that can be misunderstood, the  successful fully understand what those myths represented in reality.  Life is an obstacle course with all those monsters, wars and <em>active </em>obstacles at a deeply subliminal level or a not at all overt level.</p>', '', '2012-06-12', '3', 0, '2012-06-11', 3, 22, '5', 2),
(29, 'Hopefully this information has helped you understand the initial steps required to write a successfu', '', 0, 0, '47', '<div id="article-content">\n<p>I''ve chosen an unusual title for this article. It''s a title that  is somewhat subjective since the definition of success is not the same  for everyone. In this article I will explain why there really only  should be one primary definition for success for the aspiring eBook  author. I''ll also provide helpful information about choosing a niche.</p>\n<p>To answer the question posed in this title, I will provide a couple actions in this article. Okay, lets dive in.</p>\n<p><strong>Determine that your definition of success will be to help others</strong>.  If your only goal for writing eBooks is to make money then you will  probably fail. Most markets are just too competitive. You may make a few  sales here and there with this mindset, but it won''t change your life.  On the other hand, if you truly desire to add value to others by  providing information via your eBook that will solve their problem,  relieve their pain or help them get unstuck, then you can probably sell  your eBook even in competitive niches.</p>\n<p>How do you determine to  change lives with your eBook? By making the content as valuable as  possible and by connecting with your prospects through relationships and  accessibility. The benefit of having this mindset tremendous. People  will trust you and will be more likely to buy from you.</p>\n<p><strong>Decide on a topic (niche)</strong>.  What do you want to write about? Is there a topic in which you are an  expert? Perhaps you are currently a professional (e.g., doctor,  counselor, trainer, etc.) and you want to help more people by packaging  your knowledge in an eBook.</p>\n<p>Perhaps you don''t have knowledge in a  particular area that can be used for an eBook. If this is the case, then  you''ll need to get an education in a particular area first. This isn''t  as hard as it seems. It''s not like you''ll need a four-year degree to  learn enough information to write an eBook. Actually, you could find  four or five good books on a specific topic, study them and use this  newly acquired knowledge to create your eBook. Just make sure that  you''re learning about a topic in which a demand already exists.</p>\n<p>Hopefully  this information has helped you understand the initial steps required  to write a successful eBook. If you desire to use your knowledge for the  purpose of truly helping others, then writing an eBook is a fantastic  way to accomplish this goal.</p>\n</div>\n<div style="overflow: hidden;"><br /> Article Source: http://EzineArticles.com/7106777</div>', '', '2012-06-12', '3', 0, '2012-06-15', 3, 22, '5', 2),
(30, 'This is public artilce', '<p>This is public artilce Heading...</p>', 5, 1, '53', '<p>This is public artilce Text...</p>', '', '2012-06-02', '34', 0, '2012-06-30', 34, 22, '12', 2),
(31, 'This is private artilce', '<p>This is private artilce Heading</p>', 5, 2, '54', '<p>This is private artilce Text</p>', '', '2012-06-02', '34', 0, '2012-06-30', 34, 22, '12', 2),
(32, 'This is private artilce', '<p>This is private artilce</p>', 5, 2, '55', '<p>This is private artilce</p>', '', '2012-06-02', '34', 0, '2012-06-30', 34, 22, '12', 2),
(33, 'I am public two', '<p>I am public two Heading</p>', 5, 1, '60', '<p>I am public two Text</p>', '', '2012-06-01', '34', 0, '2012-06-26', 34, 22, '12', 2),
(34, 'I am private two', '<p>I am private two Heading</p>', 5, 2, '61', '<p>I am private two Text</p>', '', '2012-06-02', '34', 0, '2012-06-26', 34, 22, '12', 2),
(35, 'I am public two', '', 0, 0, '58', '<p>I am public two Text</p>', '', '2012-06-02', '34', 0, '2012-06-25', 34, 22, '12', 2),
(36, 'I am private', '', 0, 0, '57', '<p>I am private Text</p>', '', '2012-06-01', '34', 0, '2012-06-25', 34, 22, '12', 2),
(37, 'I am public two', '', 0, 0, '59', '<p>I am public two Text</p>', '', '2012-06-01', '34', 0, '2012-06-25', 34, 22, '12', 2),
(38, 'I am public', '', 0, 0, '56', '<p>I am public Text</p>', '', '2012-06-09', '34', 0, '2012-06-26', 34, 22, '12', 2),
(39, 'SMS notification Testing Two', '', 0, 0, '66', '<p>SMS notification Testing text</p>', '', '2012-06-09', '34', 0, '2012-06-27', 34, 22, '12', 2),
(40, 'SMS notification Testing', '', 0, 0, '65', '<p>SMS notification Testing Text</p>', '', '2012-06-02', '34', 0, '2012-06-27', 34, 22, '12', 2),
(41, 'I am public three', '', 0, 0, '62', '<p>I am public three Text</p>', '', '2012-06-02', '34', 0, '2012-06-27', 34, 22, '12', 2),
(42, 'I am public four', '', 0, 0, '63', '<p>I am public four Text</p>', '', '2012-06-01', '34', 0, '2012-06-27', 34, 22, '12', 2),
(43, 'Email notification Testing', '', 0, 0, '64', '<p>Email notification Testing Text</p>', '', '2012-06-02', '34', 0, '2012-06-27', 34, 22, '12', 2),
(44, 'SMS notification Testing three', '', 0, 0, '67', '<p>SMS notification Testing</p>', '', '2012-06-08', '34', 0, '2012-06-28', 34, 22, '12', 2),
(45, 'This is public artilce', '', 0, 0, '73', '<p>Hello</p>', '', '2012-07-20', '1', 0, '2012-07-21', 1, 4, '20', 2),
(46, 'This is test', '', 0, 0, '74', '<p>This is test</p>', '', '2012-07-14', '2', 0, '2012-07-29', 2, 4, '20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
`art_cat_id` bigint(12) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `org_id` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`art_cat_id`, `category_name`, `org_id`, `add_date`, `update_date`) VALUES
(4, 'Sports', '7', '2014-03-24 13:59:24', '0000-00-00 00:00:00'),
(3, 'News', '7', '2014-03-24 13:59:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE IF NOT EXISTS `article_comment` (
`id` int(11) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id`, `post_id`, `comment`, `comment_time`, `comment_date`, `posted_by`) VALUES
(1, '27', 'nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(2, '27', 'good', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(3, '28', 'nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(4, '28', 'we will develope android app', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4'),
(5, '29', 'fine', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(6, '29', 'very nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(20, '42', 'fine\n', '0000-00-00 00:00:00', '2012-06-18', '3'),
(19, '41', 'nice idea', '0000-00-00 00:00:00', '2012-06-13', '3'),
(18, '34', 'good', '0000-00-00 00:00:00', '2012-05-20', '3'),
(17, '35', 'fine', '0000-00-00 00:00:00', '2012-05-20', '3'),
(21, '49', 'test', '0000-00-00 00:00:00', '2012-06-20', '3'),
(22, '43', 'test2', '0000-00-00 00:00:00', '2012-06-20', '3'),
(23, '44', 'This is first comment', '0000-00-00 00:00:00', '2012-06-25', '34'),
(24, '44', 'Thus is second comments', '0000-00-00 00:00:00', '2012-06-25', '34'),
(25, '44', 'This is third comments', '0000-00-00 00:00:00', '2012-06-25', '34'),
(26, '67', 'This is testing', '0000-00-00 00:00:00', '2012-06-26', '34'),
(27, '43', 'Hi\n\nThis is comments...', '0000-00-00 00:00:00', '2012-06-29', '33');

-- --------------------------------------------------------

--
-- Table structure for table `bill_faktura`
--

CREATE TABLE IF NOT EXISTS `bill_faktura` (
`fak_id` bigint(20) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `package_assigned_id` bigint(12) NOT NULL,
  `fak_active_date` text NOT NULL,
  `fak_expire_date` text NOT NULL,
  `org_name` text NOT NULL,
  `org_number` text,
  `bill_street_address` text NOT NULL,
  `bill_zip` varchar(256) NOT NULL,
  `bill_city` varchar(256) NOT NULL,
  `bill_country` varchar(256) NOT NULL,
  `bill_mobile_phone` varchar(256) NOT NULL,
  `fak_reference_name` text NOT NULL,
  `fak_description` text NOT NULL COMMENT 'Package_Description',
  `fak_quantity` bigint(10) NOT NULL COMMENT 'Package_Quantity',
  `fak_unit_price` decimal(10,2) NOT NULL COMMENT 'Package_Unit_Price',
  `fak_invoice_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sms_unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `letter_unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_sms_sent` int(10) NOT NULL DEFAULT '0',
  `total_letter_sent` int(10) NOT NULL DEFAULT '0',
  `fak_sms_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_letter_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_price_exclusive_vat` decimal(10,2) NOT NULL,
  `fak_vat_rate` decimal(10,2) NOT NULL,
  `fak_vat_price` decimal(10,2) NOT NULL,
  `fak_rounding_price` decimal(10,2) NOT NULL,
  `fak_total_price` decimal(10,2) NOT NULL,
  `fak_currency` varchar(20) NOT NULL,
  `fak_expired` int(1) NOT NULL DEFAULT '0',
  `fak_paid` int(1) NOT NULL DEFAULT '0',
  `fak_paid_date` date DEFAULT NULL,
  `fak_sent_by` text,
  `fak_letter_delivered` int(1) NOT NULL DEFAULT '0',
  `reminder_sent_by` text,
  `admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `no_of_admin_cost` bigint(12) DEFAULT NULL,
  `total_admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `no_of_fak_invoice_sent_by_letter` int(10) NOT NULL DEFAULT '0',
  `invoice_sent_by_letter_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bill_faktura`
--

INSERT INTO `bill_faktura` (`fak_id`, `org_id`, `mem_id`, `package_assigned_id`, `fak_active_date`, `fak_expire_date`, `org_name`, `org_number`, `bill_street_address`, `bill_zip`, `bill_city`, `bill_country`, `bill_mobile_phone`, `fak_reference_name`, `fak_description`, `fak_quantity`, `fak_unit_price`, `fak_invoice_cost`, `sms_unit_price`, `letter_unit_price`, `total_sms_sent`, `total_letter_sent`, `fak_sms_cost`, `fak_letter_cost`, `fak_price_exclusive_vat`, `fak_vat_rate`, `fak_vat_price`, `fak_rounding_price`, `fak_total_price`, `fak_currency`, `fak_expired`, `fak_paid`, `fak_paid_date`, `fak_sent_by`, `fak_letter_delivered`, `reminder_sent_by`, `admin_cost`, `no_of_admin_cost`, `total_admin_cost`, `no_of_fak_invoice_sent_by_letter`, `invoice_sent_by_letter_cost`, `add_date`, `update_date`) VALUES
(1, 1, 0, 1, '1398036097', '1398900097', 'Uplands-Bro', '897', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Mergim WebDice', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-04-21 01:21:37', '2014-04-20 23:21:37'),
(2, 1, 3, 2, '1398036661', '1398900661', 'Uplands-Bro', '897', 'xxxxxxxxxx', '545', '33', 'SWEDEN', '544545', 'Mergim WebDice', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-04-21 01:31:01', '2014-04-20 23:31:01'),
(3, 2, 0, 3, '1398281963', '1399145963', 'INMID', '5568298995', 'Test road 1', '16435', 'Kista', 'SWEDEN', '0707448223', 'inmid com', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-04-23 21:39:23', '2014-04-23 19:39:23'),
(4, 3, 0, 4, '1398288806', '1399152806', 'ABCD', '435', 'Lindblomsvagen 98 , LGH 1204', '37233', 'Ronneby', 'SWEDEN', '46767459847', 'abu taher', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-04-23 23:33:26', '2014-04-23 21:33:26'),
(5, 4, 0, 5, '1398367230', '1399231230', 'Test Organization', '757575', 'Testgatan 1', '155 55', 'Kista', 'SWEDEN', '0000000', 'Anders Borg', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-04-24 21:20:30', '2014-04-24 19:20:30'),
(6, 12, 33, 6, '1399246887', '1400110887', 'Lindblomsvagen 98', '1205', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Salman Aleem', 'Package: Free Tier_4', 1, '10.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '10.00', '25.00', '2.50', '0.50', '13.00', 'EUR', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 01:41:27', '2014-05-04 23:41:27'),
(7, 12, 34, 7, '1399247480', '1400111480', 'Lindblomsvagen 98', '1205', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Salman Aleem', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 01:51:20', '2014-05-04 23:51:20'),
(8, 12, 35, 8, '1399247942', '1400111942', 'Lindblomsvagen 98', '1205', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Salman Aleem', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 01:59:02', '2014-05-04 23:59:02'),
(9, 12, 36, 9, '1399248579', '1400112579', 'Lindblomsvagen 98', '1205', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Salman Aleem', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 02:09:39', '2014-05-05 00:09:39'),
(10, 12, 37, 10, '1399248772', '1400112772', 'Lindblomsvagen 98', '1205', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', 'SWEDEN', '+46767459847', 'Salman Aleem', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 02:12:52', '2014-05-05 00:12:52'),
(11, 12, 38, 11, '1399249031', '1400113031', 'Lindblomsvagen 98', '1205', 'karlskrona', '371 44', 'karlskrona', 'SWEDEN', '46767459847', 'Salman Aleem', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-05-05 02:17:11', '2014-05-05 00:17:11'),
(12, 16, 0, 39, '1409577816', '1410441816', 'INMID', '12345678955', 'Österögatan 1', '16440 ', 'Kista', 'SWEDEN', '0704443162', 'Rameen Grameen', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2014-09-01 15:23:36', '2014-09-01 13:23:36'),
(13, 17, 0, 40, '1428320578', '1429184578', 'Developer', '344', 'AD', '7777', 'st', 'GERMAN', '444444444', 'Petric Pats', 'Package: Premium_3', 1, '299.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '299.00', '25.00', '74.75', '0.25', '374.00', 'USD', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2015-04-06 13:42:58', '2015-04-06 11:42:58'),
(14, 18, 0, 41, '1450018747', '1450882747', 'Logic coder it', '6865', 'Stockholm', '17444', 'Stockholm', 'SWEDEN', '076 918 2819', 'abu taher', 'Package: Basic_1', 1, '60.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '0.00', '60.00', '25.00', '15.00', '0.00', '75.00', 'EUR', 0, 0, NULL, NULL, 0, NULL, '0.00', NULL, '0.00', 0, '0.00', '2015-12-13 14:59:07', '2015-12-13 14:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0080dfbbecc816ecb4ee4725e877c00c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1429727592, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:22:"admina@logic-coder.com";s:6:"mem_id";s:2:"46";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('057725aee4b5b7ea0b6ca387c07bf1b6', '88.131.41.25', 'Mozilla/5.0 (Windows NT 6.1; rv:28.0) Gecko/201001', 1397462259, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('06f6f5af52f0746f2895efb166ad8c28', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1440709736, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('07c047dcf67885326f8b078e58a27fea', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395623535, 'a:8:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('091d6978f6a3effdf44c467c5414d8d9', '85.228.56.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) Ap', 1415234115, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('0a384c053ad8f4a45f499d5c30087b06', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1402131757, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('0e58ef9a1a0aee995ff030059dc871a8', '85.228.56.228', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1410726100, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('0f4984723db9223351fe8bd88f2b4827', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034392, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('0fff0c59179078676ec18e6becb43601', '46.162.108.215', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1449678801, 'a:2:{s:9:"lang_file";s:2:"sv";s:17:"flash:old:message";s:24:"<div id="message"></div>";}'),
('10260c29440f28f49e2c051a54c52b9e', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1418172939, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('10408bc322ed9459b9fcc2ea6de14993', '213.89.17.47', 'Mozilla/5.0 (Windows NT 6.1; rv:27.0) Gecko/201001', 1395834611, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('13b75d47222f34f37d0b2906e5fcc2f5', '212.247.170.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396259844, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";s:9:"user_name";s:3:"hos";s:6:"mem_id";s:2:"11";s:8:"loggedin";s:1:"1";s:12:"logged_in_as";s:12:"organization";}'),
('145f6fea97b2178dc87f1af01e98af24', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1429176666, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:22:"admina@logic-coder.com";s:6:"mem_id";s:2:"46";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('1499c34e6360d7fff0d933cfdd2c67d8', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1441134107, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('16d9798791354327459f6e0398c80a30', '85.228.59.135', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS', 1400699420, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('1856dcad8b19743fa8a57b14c8924fba', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1450105336, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:10:"taheradmin";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:8:"loggedin";s:1:"1";}'),
('1d060c20875063db8aeb878b90742139', '109.228.165.53', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko', 1403041985, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('1ebd848a4a679dfcf3a4ed6dc83e4cb0', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', 1403951516, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('1fe3d5579fef0f6f53eec78e584718c7', '83.250.66.157', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko', 1409693368, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('21d08f34c96c6a33daa5cac4e25377ee', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1410208098, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('2513aed5a30d74ede5d40e8d705d4cfe', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) App', 1396205746, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('25ed2bdbe913e457500f6dafae5bef59', '77.218.242.40', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1407580092, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('293817b01db9b2cc7b94d08198e94835', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450035593, 'a:6:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:10:"taheradmin";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";}'),
('296d9083c9af86894c0b02ec7410cb4b', '85.228.56.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) Ap', 1417043935, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('2a404f84146ec63ae774ff5826d10f1c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395626545, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('2b99d3f6076b9cc16b858c884a46faff', '66.102.9.105', 'Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/2011081', 1450025058, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('2ecffc252eba640891613f46de74e659', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1413466140, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('32f22ed7950665fba99c940a7a39d44a', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1435139806, 'a:6:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:17:"flash:new:message";s:56:"<div id="message1">Faktura created successfully!!!</div>";}'),
('34b68d50bc4d2f7774200c647f8923c8', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450028293, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('37955ff6b517b6aeedb8f8aa74ad4f23', '81.229.87.52', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS', 1400608312, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('3ec4f6e3d45d284d3971a5634d7ba2fd', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396181251, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('3ec9653a69754eb22c863fe65b252bd7', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1411389470, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('416a841f9032c8dff262bcc7ba8e43d2', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1429727587, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:22:"admina@logic-coder.com";s:6:"mem_id";s:2:"46";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('43ddcf52002362e2bd37a58b2fbd90a8', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400677305, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('445703c0b5e5eb128a8bd16cf80d5e8b', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400546907, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('44a2236ace5b579062255f233f80aafa', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1418172625, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('4662212bac98c0493c34f27b751cddf7', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1407788797, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('47e4064f221856cee7ebd432da2adfee', '66.102.9.95', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1450025058, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('485e7b3440b7914751f96437bd8c81c5', '109.228.159.143', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1399248950, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:28:"thesisbth2014cloud@gmail.com";s:6:"mem_id";s:2:"16";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('48e1aa65e489f018d1ca23091221d928', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1414004499, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('4b896e04bc15d3742d6f2fa3cd2aaf0d', '212.247.170.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1408529647, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('4ba1d1a2f0322db1e68dd260f8e9cd5c', '77.218.170.174', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS', 1395850257, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('4c40c76c77eab87e3e83d96805f0a1ac', '109.228.159.143', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko', 1398289160, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:23:"thesisbth2014@gmail.com";s:6:"mem_id";s:1:"5";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('4cf4b40f06537c5df4d6f8c18d9c316a', '83.250.70.20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:31.0) G', 1406855212, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('4efac7237cc7b44d0392e90bbcacc17a', '83.250.66.157', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;', 1409693359, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('4f2fefdd8c13891498c029ffa455f985', '212.247.170.134', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1409578940, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:9:"siteowner";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('52125e3cf097c773eb002d16a9f6d592', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400752596, 'a:5:{s:9:"lang_file";s:2:"sv";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('56b487543f4623b047cdaa2505de3a32', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395624438, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('573a14420db2de3532fa15d44ff1a9d9', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400625427, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('58ba83d4aa5ad9433c92f98a43776aca', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400755631, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('5ba851bec128c3655e145a9ba342fe2e', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1409759226, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('5c3f7adab094eb64e5e28a1d535d4754', '46.162.108.215', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1449677884, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('5c763e75b771fc8ec153f35b93837ecd', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400839055, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('5d839ae889a3bb3c3f1a7f30554a56f0', '77.218.242.158', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_1 like Mac ', 1402323852, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:28:"thesisbth2014cloud@gmail.com";s:6:"mem_id";s:2:"16";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('5edfca063990bcf197841313812736d4', '109.228.159.143', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1399248528, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:28:"thesisbth2014cloud@gmail.com";s:6:"mem_id";s:2:"16";s:12:"logged_in_as";s:9:"siteowner";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";s:3:"uid";s:2:"41";}'),
('60cf51062d3867e61c3eaf658d44c476', '213.89.9.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1413726217, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('636aebffd7a5e55f3be66e34231895a5', '85.228.56.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) Ap', 1417043935, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('666a8c653354e452c7d791e06fd32cbd', '77.218.242.40', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1407176771, 'a:6:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";}'),
('6749b929db0dadd9e2b505f8d519aa2c', '109.228.159.143', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko', 1398788462, 'a:6:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";}'),
('6750ceea2e42cbe55a76f5683263e796', '89.145.95.2', 'Mozilla/5.0 (compatible; GrapeshotCrawler/2.0; +ht', 1398308522, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('68b82af6789fd55735cbe7380fe268a9', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395624137, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('6962fc463e058b05f3e85f0b66f25ea7', '212.247.170.134', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1409674193, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('6c0558f04e6bb545f6c4d2f207ed9885', '83.250.70.20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:31.0) G', 1406855218, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('6e9ec32ae199179c69c8c765cf28fbef', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; r', 1401023145, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('6ebb809ff55a8b14b8a1d5f8c3e19741', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1429003380, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:22:"admina@logic-coder.com";s:6:"mem_id";s:2:"46";s:8:"loggedin";s:1:"1";}'),
('70aff41e045355f620070094e005a858', '89.145.95.2', 'Mozilla/5.0 (compatible; GrapeshotCrawler/2.0; +ht', 1398306974, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('72fbdfd4f3cfb1fb73b017e8a6b120d6', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1401023051, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('7500e11f59697a97ff5d554da8c9f751', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1395739789, 'a:4:{s:9:"lang_file";s:5:"engus";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('76b1587e2759964c9812d93417a786eb', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400546907, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('772b0483a157de0e4c35f837d40e9fae', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1411389469, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('77b802e49dd3fb5cbfc49cfd276397dc', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1418180130, 'a:6:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:17:"flash:old:message";s:52:"<div id="message1">Faktura Sent Successfully!!</div>";}'),
('7ae170ea3d1f1d2bc55e44f8d1e19109', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1397497596, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('7e032c5224d8c4468788c9f12aecec1f', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1416394820, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('836983dca42b12a9a645869316a2b082', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1397859110, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('8472cf9f9eef93db019c6d5c04c9a481', '2.70.1.183', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS', 1399569656, 'a:6:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";}'),
('8970de9cb708919bba78ee1fc16e9b59', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395526423, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('8a7a32069b8fbc29550709e485e59a4f', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1397148231, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('8c7df455186d94754fcd2077c6edccb0', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1414028215, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('8e2a84030c601c5c4fe989219f1172d3', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1398372845, 'a:6:{s:9:"lang_file";s:2:"sv";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";}'),
('8f45bb9b9f01433cbab026c23f6721be', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1394180240, 'a:10:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:7:"tahertn";s:7:"user_id";s:3:"109";s:6:"mem_id";s:3:"104";s:10:"member_org";s:3:"109";s:12:"member_group";s:2:"16";s:12:"package_name";s:2:"30";s:8:"mem_type";s:5:"Admin";s:5:"mname";s:6:"Ahamed";s:8:"loggedin";s:1:"1";}'),
('90922184e48fc5cd5d2516f77131aa3c', '85.228.59.135', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS', 1400712586, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('90b50fb0f2c797687b448520d67b8eeb', '88.131.41.25', 'Mozilla/5.0 (Windows NT 6.1; rv:28.0) Gecko/201001', 1396420584, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('9307c9b2c82e1472b98d629041ea0ebb', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1419117143, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('93a916cf3ea1d191d308efa6abb008c4', '66.249.81.35', 'Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/2011081', 1409916595, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('947b618199d8832559167bb51a1069b3', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1393875059, 'a:10:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:7:"tahertn";s:7:"user_id";s:3:"109";s:6:"mem_id";s:3:"104";s:10:"member_org";s:3:"109";s:12:"member_group";s:2:"16";s:12:"package_name";s:2:"30";s:8:"mem_type";s:5:"Admin";s:5:"mname";s:6:"Ahamed";s:8:"loggedin";s:1:"1";}'),
('956bd71f5e34ff9de044bc4abe589477', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1433519879, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('97e193aa5d928f9c95bb967474c358a8', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400578534, 'a:5:{s:9:"lang_file";s:3:"swe";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('981b72fa63e3ad38a16310dd27da38ab', '83.250.70.20', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:31.0) G', 1406855212, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('99229e260742d1e2c8a92481e8eeb552', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034385, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('995a85db80a783f0e1ee5c8955eb7f48', '88.131.41.25', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/201001', 1413974712, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('9bbf96cf18cbd76fd8501315eeff7339', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396431098, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('9cf652631d84048a71c4fd397be978d4', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1418238746, 'a:6:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:17:"flash:new:message";s:56:"<div id="message1">Faktura created successfully!!!</div>";}'),
('9d2a5d5dd5f4e2edf5abdf32ae2d5332', '88.131.41.25', 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/201001', 1408961889, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('9f2525ab49b56f8633286dc6d4b7b66d', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1407963707, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('9f603de097388570c4502071b27a8c43', '46.162.108.215', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1449678212, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('9fa01c26f26851e606243bf7d0833be3', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', 1396275254, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('a15b58a1d3fa4641d52da72b6f8d8dfb', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1428329847, 'a:6:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";s:3:"uid";s:2:"41";}'),
('a2caeae0e7069d8d14a2a3321d552cb6', '109.228.165.53', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:22.0) G', 1400635342, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:22:"mdta11x@student.bth.se";s:6:"mem_id";s:2:"41";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('a39a4d8ebda9e0b7deadd2605139ff16', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400619364, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('a3d50b07ea25cdef8b63a1f2c83a2841', '89.145.95.42', 'Mozilla/5.0 (compatible; GrapeshotCrawler/2.0; +ht', 1401334966, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('a6b01af3e734b683647ac6d743a60199', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1393429730, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('a72f20aee7ac777c32b0d086ec8b0f6e', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1418236328, 'a:6:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:17:"flash:old:message";s:56:"<div id="message1">Faktura created successfully!!!</div>";}'),
('a7687c837b83a54bfda1d5bb1d60835a', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396899812, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:3:"hos";s:6:"mem_id";s:2:"11";s:12:"logged_in_as";s:9:"siteowner";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('ac85e19728b74d8254d015f3f8bf063a', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400629073, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('acfbdd0bfb1c81fa867e19889d41c573', '213.89.10.177', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400987127, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('ad231b8ce9723dc4f59bea1cf4405b01', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034387, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('adad9a788f14e51424209337d931f2d8', '109.228.159.143', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1399248530, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('ae760995032ead741830143809fcc567', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1397343877, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('b0e450e55162737b405ab09e6e58a68d', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1395758805, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('b2c92664def8984e28c26c0be9e15923', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1397600778, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('b5348be1709222930c7c10dcc411459a', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1398376692, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('b6d4bf4d2ed4ee75c4f8ce2de9cc166c', '85.228.59.135', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1401492098, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";s:12:"logged_in_as";s:12:"organization";}'),
('b7f2c59d94931bea8041b24375f7e02c', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450035712, 'a:5:{s:9:"lang_file";s:2:"sv";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('b83fd5a660cdbcd33eb160057a8665b7', '66.249.81.35', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1413797627, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('ba1224d5c41d22c917d863438c5b670b', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1393429730, 'a:14:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:7:"tahertn";s:7:"user_id";s:3:"109";s:6:"mem_id";s:3:"104";s:10:"member_org";s:3:"109";s:12:"member_group";s:0:"";s:12:"package_name";s:2:"30";s:8:"mem_type";s:5:"Admin";s:5:"mname";s:6:"Ahamed";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('bafeb812be7b5c9ceaf086c6aa063d39', '213.89.9.97', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1415376185, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('bc420da4f2c961f1807973d76925c51c', '212.247.170.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; M', 1396260744, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:3:"hos";s:6:"mem_id";s:2:"11";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('bd0a4b5698c259ccf0e467e8b2405b23', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034384, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('bd865b232e4ce120f03bd007ae086199', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1411389467, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:17:"support@vassit.se";s:6:"mem_id";s:2:"42";s:8:"loggedin";s:1:"1";}'),
('c083c3edfdc85d34b52ff3a597a7ec87', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450035315, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('c2f19c22ebd45e1797f90881ba280edb', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) App', 1396304059, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('c615c1d2abea50b4731ded1ad64c62e8', '194.47.153.55', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', 1402498007, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:9:"siteowner";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('c6635835f2f2ee719c12f77ef718d2fd', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034389, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('c745e8cec93e42c154662a601a0c60c5', '66.249.93.35', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1409916595, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('c94a372d782fe2aef523e2550354625d', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1394879024, 'a:14:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:7:"tahertn";s:7:"user_id";s:3:"109";s:6:"mem_id";s:3:"104";s:10:"member_org";s:3:"109";s:12:"member_group";s:2:"16";s:12:"package_name";s:2:"30";s:8:"mem_type";s:5:"Admin";s:5:"mname";s:6:"Ahamed";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('cdbcf0d02d7ff26c166b4e23ff3c81a7', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400718834, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('ce1737a220bf77fbaf17831166e672e8', '212.247.170.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1409668073, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('ce7551f80b9f988248012c1032d6233c', '83.177.75.172', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1403042102, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('cf791f0911cc396bcb4c0aa5d916cd2b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034382, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('d02f333257e97847b837ada1d8d28266', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400541585, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('d0640a1174cef323d1463debe5209f94', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1398368056, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('d153d1025dfdeaa237461b06d1735f8a', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034383, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('d1a796c580d40dd72abd953b8a4ae3a2', '46.162.108.215', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450025468, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:12:"logged_in_as";s:9:"siteowner";s:8:"loggedin";s:1:"1";s:8:"username";s:10:"taheradmin";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('d22dc16daf0124aa67ab089a95022503', '212.247.11.226', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) App', 1396112912, 'a:5:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('d3475e25010b2ab5f841bbd087c10560', '213.89.9.97', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1415039695, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('d4284170520151cc6fb71ec6728717fd', '83.177.75.172', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;', 1403041979, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('d9a55c526f9d2d676b75b019763c3a79', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400676420, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('db0f62af29aedb1f3c064942e31be94c', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:22.0) G', 1395679088, 'a:4:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:3:"hos";s:6:"mem_id";s:2:"11";s:8:"loggedin";s:1:"1";}'),
('dbaac196577fba349444fc67198c656f', '46.162.108.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1450018755, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:21:"info@logic-coder.info";s:6:"mem_id";s:2:"48";s:8:"loggedin";s:1:"1";}'),
('dc3a2d310e4b3b315192761843eef81d', '85.228.56.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1412597637, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('dde0a17aa57749d55dec90874fe2b48d', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1399326009, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";}'),
('e291a78977d6487e231700fa135cc90f', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1429020091, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:22:"admina@logic-coder.com";s:6:"mem_id";s:2:"46";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('e492ac8defaa62e56f556fe9b71a451b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034392, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('e678a3761af9da61a4e4cbe907c2c4f5', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1422660893, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('e7a0230b62fc35d28c2a53c461af6739', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396618954, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('e84d3e9e0a574444d3e9375fb07ae8b3', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (', 1421012302, 'a:6:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:17:"flash:new:message";s:56:"<div id="message1">Faktura created successfully!!!</div>";}'),
('e8fa3769ba31e87fdee2390c54e93a2e', '212.247.11.226', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1398285094, 'a:8:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:9:"siteowner";s:9:"logged_in";s:1:"1";s:9:"user_name";s:12:"ac@inmid.com";s:6:"mem_id";s:1:"4";s:8:"loggedin";s:1:"1";}'),
('ec0f2f6066e2d0699274ff4e4bfbaa74', '109.228.165.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1401399992, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:28:"thesisbth2014cloud@gmail.com";s:6:"mem_id";s:2:"16";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('ec3348f600bdd7fc51eb46723d799ba2', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1407175555, 'a:9:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('ee06367cf7eaf6420ca0b1bfcd48b21f', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400546898, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('ee818ab525c9ea7fb61d746bdf85cacc', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.31', 1395683696, 'a:8:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('ee9d754e55385b35fd27b0c51a9f1399', '212.247.170.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1395765160, 'a:8:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:3:"hos";s:6:"mem_id";s:2:"11";s:8:"loggedin";s:1:"1";s:8:"username";s:7:"hossain";s:3:"uid";s:2:"41";s:12:"user_type_id";s:1:"0";s:9:"logged_in";s:1:"1";}'),
('ef1210fe5ef8e342b31e938dc988be5e', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396447017, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('f4267497d90decb58059e87f30702818', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1400603446, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('f51dba4a040256b7b3a64194c319f01e', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:31.0) Gec', 1450034390, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('f63d6ecb2440d0c2f844a50b659df8b5', '85.228.59.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) App', 1400973627, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('f88a28e86b998d6ff135169a6ee664b7', '81.229.87.52', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1396790878, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('f9cd3a6b9ea48e0365a722b32b4cba09', '85.228.56.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) Ap', 1414889353, 'a:5:{s:9:"lang_file";s:5:"enguk";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:12:"logged_in_as";s:12:"organization";s:8:"loggedin";s:1:"1";}'),
('fe4e14fd1b6b93070a3a7c25ab91f936', '88.131.41.25', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/201001', 1400065502, 'a:1:{s:9:"lang_file";s:2:"sv";}'),
('ff35c55cec583367b1264d0f1c4e2de9', '109.228.159.143', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1413833868, 'a:9:{s:9:"lang_file";s:5:"enguk";s:8:"username";s:7:"hossain";s:12:"user_type_id";s:1:"0";s:12:"logged_in_as";s:12:"organization";s:9:"logged_in";s:1:"1";s:9:"user_name";s:6:"mergim";s:6:"mem_id";s:1:"7";s:8:"loggedin";s:1:"1";s:3:"uid";s:2:"41";}');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
(10, '8', 'fine', '3'),
(11, '10', 'fine', '3'),
(12, '10', 'If you are going to use a passage of Lorem Ipsum', '3'),
(13, '11', 'fine', '3'),
(14, '11', 'uruuuuu', '3'),
(15, '14', 'fine', '3'),
(16, '14', 'tesrt', '3');

-- --------------------------------------------------------

--
-- Table structure for table `comment_on_article_tbl`
--

CREATE TABLE IF NOT EXISTS `comment_on_article_tbl` (
`comment_id` bigint(20) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_on_forum_topic`
--

CREATE TABLE IF NOT EXISTS `comment_on_forum_topic` (
`comment_id` bigint(12) NOT NULL,
  `organization_id` bigint(12) NOT NULL,
  `topic_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `comment_on_forum_topic`
--

INSERT INTO `comment_on_forum_topic` (`comment_id`, `organization_id`, `topic_id`, `comment_on_member_id`, `comment_member_id`, `comment`, `comment_date`, `add_date`, `update_date`) VALUES
(31, 109, 11, 114, 114, 'Comment', '1371992446', '1371992446', '0000-00-00 00:00:00'),
(32, 109, 12, 114, 114, '\n                                                                                                        \n                                                                                                        This is comments edited                                                                                                   \n                                                                                                                                                                                                                       \n                                                                                                                                                                                                                  \n                                                                                                                                                                                                                       \n                                                                                                         ', '1372588763', '1372588763', '2013-06-30 10:42:27'),
(39, 7, 20, 11, 7, '<p>heeyeyey</p>', '1396181367', '1396181367', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment_on_forum_topic_archieve`
--

CREATE TABLE IF NOT EXISTS `comment_on_forum_topic_archieve` (
`archieve_comment_id` bigint(12) NOT NULL,
  `comment_id` bigint(12) NOT NULL,
  `organization_id` bigint(12) NOT NULL,
  `topic_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `comment_archieve_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment_on_forum_topic_archieve`
--

INSERT INTO `comment_on_forum_topic_archieve` (`archieve_comment_id`, `comment_id`, `organization_id`, `topic_id`, `comment_on_member_id`, `comment_member_id`, `comment`, `comment_date`, `add_date`, `update_date`, `comment_archieve_date`) VALUES
(1, 24, 109, 4, 114, 114, 'this is comment1', '1371931181', '1371931181', '0000-00-00 00:00:00', '2013-06-22 22:04:53'),
(2, 25, 109, 4, 114, 114, 'This is comment2', '1371931190', '1371931190', '0000-00-00 00:00:00', '2013-06-22 22:04:53'),
(3, 26, 109, 4, 114, 114, 'This is comment trew', '1371931199', '1371931199', '0000-00-00 00:00:00', '2013-06-22 22:04:53'),
(4, 27, 109, 7, 114, 114, 'This is for new one', '1371931836', '1371931836', '0000-00-00 00:00:00', '2013-06-22 22:10:40'),
(5, 30, 109, 9, 114, 114, 'hi', '1371932243', '1371932243', '0000-00-00 00:00:00', '2013-06-23 15:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `comment_on_main_board_article_archieve`
--

CREATE TABLE IF NOT EXISTS `comment_on_main_board_article_archieve` (
`archieve_comment_id` bigint(12) NOT NULL,
  `comment_id` bigint(12) NOT NULL,
  `organization_id` bigint(12) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `comment_archieve_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_on_main_board_article_tbl`
--

CREATE TABLE IF NOT EXISTS `comment_on_main_board_article_tbl` (
`comment_id` bigint(12) NOT NULL,
  `organization_id` bigint(12) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `comment_on_main_board_article_tbl`
--

INSERT INTO `comment_on_main_board_article_tbl` (`comment_id`, `organization_id`, `article_id`, `comment_on_member_id`, `comment_member_id`, `comment`, `comment_date`, `add_date`, `update_date`) VALUES
(15, 109, 8, 104, 104, 'QWERTY keyboard', '1367444108', '1367444108', '0000-00-00 00:00:00'),
(17, 109, 12, 104, 104, 'Hello', '1369998045', '1369998045', '0000-00-00 00:00:00'),
(18, 109, 56, 104, 104, 'HI', '1394543276', '1394543276', '0000-00-00 00:00:00'),
(25, 7, 7, 7, 7, 'asdasdadssda\n                                                                                                        <p>asadsdasdas</p>                                                                                                         \n                                                                                                        ', '1396181379', '1396181379', '2014-03-30 12:09:44'),
(26, 7, 14, 7, 7, '<p>hi<br></p>', '1422654000', '1422654000', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `receiver_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `message_date` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `flag` int(20) NOT NULL COMMENT '1=admin,2=member',
  `message_status` int(10) NOT NULL COMMENT '1=read,2=unread',
  `sender_status` int(10) NOT NULL COMMENT '1=reg_member,2=internet user'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE IF NOT EXISTS `contact_list` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `contact_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contact_list`
--

INSERT INTO `contact_list` (`id`, `org_id`, `member_id`, `name`, `contact_no`) VALUES
(5, 22, 0, 'ahmed', '8801922686268'),
(6, 22, 0, 'nur', '3258788787'),
(7, 22, 3, 'nur', '8801922686268'),
(10, 22, 0, 'masum', '8801673176511'),
(11, 22, 0, 'MD. ABU TAHER', '46767459847'),
(12, 22, 34, 'abu Taher', '46767459847'),
(13, 4, 1, 'TAhu', '588095454'),
(14, 4, 1, 'Ekramian', '534335');

-- --------------------------------------------------------

--
-- Table structure for table `contact_with_site_admin`
--

CREATE TABLE IF NOT EXISTS `contact_with_site_admin` (
`contact_id` bigint(12) NOT NULL,
  `sender_name` varchar(300) NOT NULL,
  `sender_email` varchar(300) NOT NULL,
  `contact_subject` text NOT NULL,
  `contact_message` text NOT NULL,
  `attached_files` text,
  `uploaded_dir` text,
  `message_read` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contact_with_site_admin`
--

INSERT INTO `contact_with_site_admin` (`contact_id`, `sender_name`, `sender_email`, `contact_subject`, `contact_message`, `attached_files`, `uploaded_dir`, `message_read`, `add_date`) VALUES
(1, 'abu', 'taher@kmail.com', 'xxxxxxxxxx', 'zzzzzzzzzzzz', 'pregnant.jpg', '1_10', 1, '2013-02-10 02:12:10'),
(3, 'TAHER', 'yk@kmail.com', 'We are here', 'I am here', 'Eduroam-Win7_eng.pdf', '2_58', 1, '2013-02-10 02:18:58'),
(4, 'TAHER', 'taher@kmail.com', 'xxxxxxxxxx', 'bbbbbbbbbb', '', '', 1, '2013-02-10 02:43:47'),
(5, 'TAHER', 'taher@kmail.com', 'xxxxxxxxxx', 'zzzzzzzzzzzzzzz', 'Eduroam-Mac_eng.pdf', '5_17', 1, '2013-02-10 02:44:17'),
(6, 'Salman', 'salman@kmail.com', 'This is our ronneby', 'This is our ronneby This is our ronneby This is our ronneby This is our ronneby This is our ronneby', 'Eduroam-Win7_eng.pdf', '6_46', 1, '2013-02-10 17:27:46'),
(7, 'Kutub', 'kutub@hmail.com', 'Kutta uddin', 'I am kutta uddin ahmed...', '', '', 1, '2013-02-10 18:39:48'),
(9, 'Usama', 'usamam@kmail.com', 'I am usamaBin Laden', '<p>I am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin LadenI am usamaBin Laden</p>', 'pregnant.jpg', '8_54', 1, '2013-02-10 21:38:54'),
(10, 'TAHER', 'taher@kmail.com', 'xxxxxxxxxx', '<p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>', '', '', 1, '2013-02-10 22:00:43'),
(11, 'Faham', 'fahma@kmail.com', 'I am in Security Lab', '<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab I am in Security Lab</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 'Eduroam-Win7_eng.pdf', '11_09', 1, '2013-02-11 13:11:09'),
(12, 'Ahamed', 'ahamed@gmail.com', 'We are here', '<p>We are here We are here We are here</p>', '06337580.pdf', '12_59', 1, '2013-06-23 13:40:59'),
(13, 'abu', 'taher@gmail.com', 'tESTING', '<p>tESTING</p>', '', '', 1, '2013-07-21 16:49:17'),
(14, 'ABU TAHER', 'taher@technobd.com', 'cxxcc', '<p>czx</p>', 'custom_invoice_TestFinal_897_3 (2).pdf', '14_33', 0, '2014-03-23 00:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `add_date`, `update_date`) VALUES
(9, 'EUR', '0000-00-00 00:00:00', '2012-11-08 22:17:30'),
(12, 'USD', '0000-00-00 00:00:00', '2012-11-08 22:17:04'),
(5, 'SEK', '0000-00-00 00:00:00', '2012-08-09 14:58:21'),
(13, 'BDT', '0000-00-00 00:00:00', '2013-07-21 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `custom_faktura`
--

CREATE TABLE IF NOT EXISTS `custom_faktura` (
`custom_faktura_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `fak_invoice_no` text NOT NULL,
  `fak_invoice_date` text,
  `fak_expire_date` text,
  `fak_invoice_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_invoice_cost_applied` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_total_price` decimal(10,2) NOT NULL,
  `fak_send_to_external_customer` text,
  `fak_send_to_org_customer` text,
  `fak_terms_of_payment` varchar(10) NOT NULL,
  `fak_notes` text,
  `fak_customer_notification` text,
  `fak_status` int(1) NOT NULL DEFAULT '0' COMMENT '1=paid_invoice, 0=not_paid',
  `fak_sent_by` text,
  `fak_reminder_by` text,
  `no_of_custom_invoice_sent_by_letter` int(10) NOT NULL DEFAULT '0',
  `custom_invoice_sent_by_letter_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_letter_delivered` int(1) NOT NULL DEFAULT '0',
  `admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `no_of_admin_cost` int(10) NOT NULL DEFAULT '0',
  `total_admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fak_draft` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `custom_faktura`
--

INSERT INTO `custom_faktura` (`custom_faktura_id`, `org_id`, `mem_id`, `fak_invoice_no`, `fak_invoice_date`, `fak_expire_date`, `fak_invoice_cost`, `fak_invoice_cost_applied`, `fak_total_price`, `fak_send_to_external_customer`, `fak_send_to_org_customer`, `fak_terms_of_payment`, `fak_notes`, `fak_customer_notification`, `fak_status`, `fak_sent_by`, `fak_reminder_by`, `no_of_custom_invoice_sent_by_letter`, `custom_invoice_sent_by_letter_cost`, `fak_letter_delivered`, `admin_cost`, `no_of_admin_cost`, `total_admin_cost`, `fak_draft`, `add_date`, `update_date`) VALUES
(26, 7, 7, '20141', '1418166000', '1419030000', '2.00', '0.00', '7500.00', '0', '45', '10', '', '', 1, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2014-12-10 20:16:34', '2015-03-05 13:39:21'),
(27, 7, 7, '20151', '1421017200', '1421881200', '2.00', '0.00', '7500.00', '0', '45', '10', '', '', 1, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2015-01-11 22:41:13', '2015-06-04 23:12:18'),
(28, 7, 7, '20152', '1425510000', '1426374000', '2.00', '0.00', '15000.00', '0', '45', '10', 'Please Pay Me Asap.', '', 1, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2015-03-05 14:49:41', '2015-06-04 23:12:20'),
(29, 17, 46, '1', '1428271200', '1429567200', '2.00', '0.00', '12720.00', '0', '46', '15', '', '', 0, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2015-04-06 16:05:54', '2015-04-06 14:05:55'),
(31, 7, 7, '20153', '1435096800', '1435960800', '2.00', '0.00', '500.00', '0', '45', '10', 'System Support: Anitacare', '', 0, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2015-06-24 12:01:04', '2015-06-24 10:01:05'),
(32, 7, 7, '20154', '1440626400', '1441490400', '2.00', '0.00', '2500.00', '0', '45', '10', '', '', 0, NULL, NULL, 0, '0.00', 0, '0.00', 0, '0.00', 0, '2015-08-27 16:50:39', '2015-08-27 14:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `custom_faktura_assigned_product`
--

CREATE TABLE IF NOT EXISTS `custom_faktura_assigned_product` (
`custom_faktura_assigned_product_id` bigint(12) NOT NULL,
  `custom_faktura_id` bigint(12) NOT NULL,
  `product_name` text NOT NULL,
  `no_of_products` decimal(12,0) NOT NULL,
  `price_ex_vat` decimal(10,2) NOT NULL,
  `vat_rate` decimal(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `custom_faktura_assigned_product`
--

INSERT INTO `custom_faktura_assigned_product` (`custom_faktura_assigned_product_id`, `custom_faktura_id`, `product_name`, `no_of_products`, `price_ex_vat`, `vat_rate`, `add_date`, `update_date`) VALUES
(1, 1, 'BTH_Tution', '2', '200.00', '12.00', '2014-03-11 03:38:09', '0000-00-00 00:00:00'),
(2, 2, 'BTH_Tution', '2', '200.00', '12.00', '2014-03-11 03:38:44', '0000-00-00 00:00:00'),
(3, 2, 'movile', '2', '200.00', '12.00', '2014-03-11 03:38:44', '0000-00-00 00:00:00'),
(7, 4, 'BTH_Tution', '2', '200.00', '12.00', '2014-03-11 03:41:13', '0000-00-00 00:00:00'),
(8, 5, 'Bra', '2', '200.00', '6.00', '2014-03-11 03:41:59', '0000-00-00 00:00:00'),
(9, 5, 'Panty', '2', '200.00', '12.00', '2014-03-11 03:41:59', '0000-00-00 00:00:00'),
(10, 5, 'Dildo', '4', '500.00', '25.00', '2014-03-11 03:41:59', '0000-00-00 00:00:00'),
(11, 3, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:32:44', '0000-00-00 00:00:00'),
(12, 3, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:32:44', '0000-00-00 00:00:00'),
(13, 3, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:32:44', '0000-00-00 00:00:00'),
(14, 6, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:50:35', '0000-00-00 00:00:00'),
(15, 6, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:50:35', '0000-00-00 00:00:00'),
(16, 6, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:50:35', '0000-00-00 00:00:00'),
(17, 7, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:51:28', '0000-00-00 00:00:00'),
(18, 7, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:51:28', '0000-00-00 00:00:00'),
(19, 7, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:51:28', '0000-00-00 00:00:00'),
(20, 8, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:54:19', '0000-00-00 00:00:00'),
(21, 8, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:54:19', '0000-00-00 00:00:00'),
(22, 8, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:54:19', '0000-00-00 00:00:00'),
(23, 9, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:55:28', '0000-00-00 00:00:00'),
(24, 9, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:55:28', '0000-00-00 00:00:00'),
(25, 9, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:55:28', '0000-00-00 00:00:00'),
(26, 10, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:56:48', '0000-00-00 00:00:00'),
(27, 10, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:56:48', '0000-00-00 00:00:00'),
(28, 10, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:56:48', '0000-00-00 00:00:00'),
(29, 11, 'Bra', '2', '200.00', '6.00', '2014-03-11 04:58:20', '0000-00-00 00:00:00'),
(30, 11, 'Panty', '2', '200.00', '12.00', '2014-03-11 04:58:20', '0000-00-00 00:00:00'),
(31, 11, 'Dildo', '4', '500.00', '25.00', '2014-03-11 04:58:20', '0000-00-00 00:00:00'),
(32, 12, 'movile', '2', '200.00', '12.00', '2014-03-11 15:22:12', '0000-00-00 00:00:00'),
(33, 13, 'Laptop', '1', '200.00', '12.00', '2014-03-12 06:15:53', '0000-00-00 00:00:00'),
(34, 14, 'Laptop', '1', '200.00', '25.00', '2014-04-14 23:18:37', '0000-00-00 00:00:00'),
(35, 14, 'Mobile', '11', '200.00', '25.00', '2014-04-14 23:18:37', '0000-00-00 00:00:00'),
(36, 14, 'Telivision', '1', '200.00', '25.00', '2014-04-14 23:18:37', '0000-00-00 00:00:00'),
(37, 15, 'Laptop', '1', '200.00', '25.00', '2014-04-19 01:13:54', '0000-00-00 00:00:00'),
(38, 15, 'Mobile', '11', '200.00', '25.00', '2014-04-19 01:13:54', '0000-00-00 00:00:00'),
(39, 15, 'Telivision', '1', '200.00', '25.00', '2014-04-19 01:13:54', '0000-00-00 00:00:00'),
(40, 16, 'kebab', '1', '67.00', '25.00', '2014-04-29 18:18:35', '0000-00-00 00:00:00'),
(41, 16, 'Salad', '1', '70.00', '25.00', '2014-04-29 18:18:35', '0000-00-00 00:00:00'),
(42, 17, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:02:37', '0000-00-00 00:00:00'),
(43, 18, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:15:49', '0000-00-00 00:00:00'),
(44, 19, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:18:13', '0000-00-00 00:00:00'),
(45, 20, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:20:06', '0000-00-00 00:00:00'),
(46, 21, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:22:24', '0000-00-00 00:00:00'),
(47, 22, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 03:24:10', '0000-00-00 00:00:00'),
(48, 23, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 19:29:16', '0000-00-00 00:00:00'),
(49, 24, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 19:44:04', '0000-00-00 00:00:00'),
(50, 25, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 20:13:18', '0000-00-00 00:00:00'),
(51, 26, 'Web Solutions', '1', '6000.00', '25.00', '2014-12-10 20:16:34', '0000-00-00 00:00:00'),
(52, 27, 'Web Solutions', '1', '6000.00', '25.00', '2015-01-11 22:41:13', '0000-00-00 00:00:00'),
(53, 28, 'Web Solutions', '1', '12000.00', '25.00', '2015-03-05 14:49:41', '0000-00-00 00:00:00'),
(54, 29, 'Web Solutions', '1', '12000.00', '6.00', '2015-04-06 16:05:54', '0000-00-00 00:00:00'),
(55, 30, 'System Support: Anitacare', '1', '400.00', '25.00', '2015-06-05 01:17:36', '0000-00-00 00:00:00'),
(56, 31, 'System Support: Anitacare', '1', '400.00', '25.00', '2015-06-24 12:01:05', '0000-00-00 00:00:00'),
(57, 32, 'System Support', '1', '2000.00', '25.00', '2015-08-27 16:50:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_faktura_customer`
--

CREATE TABLE IF NOT EXISTS `custom_faktura_customer` (
`faktura_customer_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `fak_customer_type` varchar(15) NOT NULL,
  `fak_customer_or_company_name` text NOT NULL,
  `fak_customer_care_of` text NOT NULL,
  `fak_customer_billing_address` text NOT NULL,
  `fak_customer_zip` varchar(10) NOT NULL,
  `fak_customer_city` text NOT NULL,
  `fak_customer_state` text,
  `fak_customer_country` text NOT NULL,
  `fak_customer_email` text NOT NULL,
  `fak_customer_no` varchar(100) DEFAULT NULL,
  `fak_customer_reg_no` varchar(100) DEFAULT NULL,
  `fak_customer_to` text,
  `fak_customer_contact_no` text,
  `admin_notes` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `custom_faktura_customer`
--

INSERT INTO `custom_faktura_customer` (`faktura_customer_id`, `org_id`, `mem_id`, `fak_customer_type`, `fak_customer_or_company_name`, `fak_customer_care_of`, `fak_customer_billing_address`, `fak_customer_zip`, `fak_customer_city`, `fak_customer_state`, `fak_customer_country`, `fak_customer_email`, `fak_customer_no`, `fak_customer_reg_no`, `fak_customer_to`, `fak_customer_contact_no`, `admin_notes`, `add_date`, `update_date`) VALUES
(1, 109, 104, 'Individual', 'BTH-new', 'Salman Aleem', '0000-00-00', '371 44', 'karlskrona', '', 'SWE', 'tahersumonabutt@gmail.com', '420', '450', 'ABCD', '+46707448223', 'vvvvvvvvb', '2013-11-01 01:48:09', '2014-03-06 12:29:35'),
(4, 109, 114, 'Company', 'BTH', 'Salman Aleem', 'karlskrona', '371 44', 'karlskrona', 'Blekinge lan', 'SWE', 'tahersumonabu111@gmail.com', '420', '450', 'ABCD', '0767459847', '', '2013-11-05 15:59:41', '2014-02-28 14:26:25'),
(5, 109, 104, 'Company', 'BTHooo', 'SDESSS', 'karlskrona', '371 44', 'karlskrona', '', 'SWE', 'tahersumonabu999@gmail.com', '', '89987', 'uuuu', '009888', '', '2013-12-01 12:47:42', '2013-12-01 12:00:47'),
(6, 109, 104, 'Company', 'BTHmm', 'SDESSS', 'karlskrona', '371 44', 'karlskrona', 'Blekinge lan', 'SWE', 'tahersumonabu@gmail.com', '', '', '', '+46767459847', '', '2013-12-08 21:11:33', '2014-02-28 14:28:10'),
(7, 109, 104, 'Company', 'AIUB', 'Hasan Takla', 'Banani 21/B', '371 44', 'Dhaka', '', 'SWE', 'taklahasan@gmail.com', '420', '450', 'Hasna Takla', '+46767459847', 'This is Hasan Takla: Upgraded', '2014-03-06 09:32:26', '2014-03-06 08:38:38'),
(8, 109, 104, 'Company', 'Walrus', 'JEdidia', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', '', 'SWE', 'jed@kmail.com', '420', '450', 'ABCD', '+46767459847', 'This is Ulluk-a-pathha-Upgraded-Version', '2014-03-06 09:51:55', '2014-03-06 08:54:12'),
(9, 109, 104, 'Company', 'Hammid', 'Salman Aleem', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', '', 'SWE', 'hamiid@kmail.com', '', '', '', '', '', '2014-03-06 13:01:45', '2014-03-06 12:30:02'),
(11, 7, 7, 'Company', 'Företag AB', 'Företagsadressen 1', 'Företagsadressen 1', '18400', 'Stockholm', '', 'SWE', 'email@info.com', '', '', '', '', '', '2014-05-20 22:58:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_faktura_products`
--

CREATE TABLE IF NOT EXISTS `custom_faktura_products` (
`faktura_product_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `fak_product_name` text NOT NULL,
  `fak_product_price` decimal(10,2) NOT NULL,
  `fak_product_vat_rate` decimal(2,0) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `custom_faktura_products`
--

INSERT INTO `custom_faktura_products` (`faktura_product_id`, `org_id`, `mem_id`, `fak_product_name`, `fak_product_price`, `fak_product_vat_rate`, `add_date`, `update_date`) VALUES
(1, 109, 104, 'IP-Settings', '10.00', '12', '2014-02-26 11:22:44', '0000-00-00 00:00:00'),
(2, 0, 7, 'Testproduct', '150.00', '25', '2014-05-20 01:09:47', '0000-00-00 00:00:00'),
(3, 0, 7, 'Test2', '300.00', '25', '2014-05-20 12:31:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_faktura_settings`
--

CREATE TABLE IF NOT EXISTS `custom_faktura_settings` (
`fak_settings_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `fak_no_of_records_per_page` int(3) NOT NULL,
  `fak_payment_days` int(3) NOT NULL,
  `fak_tax_rate` int(3) NOT NULL,
  `fak_invoice_no` varchar(3) NOT NULL,
  `fak_org_bank_payment_type` varchar(256) NOT NULL COMMENT 'Preferred Payment account for SMS Faktura ',
  `fak_logo_include` varchar(3) NOT NULL,
  `fak_email_cc` varchar(3) NOT NULL,
  `fak_payment_details` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `custom_faktura_settings`
--

INSERT INTO `custom_faktura_settings` (`fak_settings_id`, `org_id`, `mem_id`, `fak_no_of_records_per_page`, `fak_payment_days`, `fak_tax_rate`, `fak_invoice_no`, `fak_org_bank_payment_type`, `fak_logo_include`, `fak_email_cc`, `fak_payment_details`, `add_date`, `update_date`) VALUES
(4, 7, 7, 10, 30, 25, 'No', '', 'No', 'No', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 17, 46, 10, 30, 25, 'No', '', 'No', 'No', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 18, 48, 10, 30, 25, 'No', '', 'No', 'No', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
`topic_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `topic_title` text NOT NULL,
  `topic_text` text NOT NULL,
  `publish_date` text NOT NULL,
  `expire_date` text NOT NULL,
  `topic_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`topic_id`, `org_id`, `member_id`, `topic_title`, `topic_text`, `publish_date`, `expire_date`, `topic_status`, `add_date`, `update_date`) VALUES
(8, 109, 114, 'We are testing...', '<p>We are testing... We are testing... We are testing... We are testing... We are testing... We are testing...</p>\n<p>We are testing... We are testing... We are testing... We are testing... We are testing... We are testing...</p>', '1372024800', '1372543200', 1, '2013-06-22 22:10:24', '0000-00-00 00:00:00'),
(11, 109, 114, 'Testing', '<p>Testing</p>', '1371938400', '1372543200', 1, '2013-06-23 15:00:39', '0000-00-00 00:00:00'),
(12, 109, 114, 'This is Testing', '<p>This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing</p>\n<p>This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing</p>\n<p>This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing</p>\n<p>This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing&nbsp;This is Testing</p>', '1372543200', '1373580000', 1, '2013-06-30 12:36:57', '0000-00-00 00:00:00'),
(13, 109, 114, 'I am going to Stockholm today', '<p>I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today&nbsp;I am going to Stockholm today</p>', '1372543200', '1374876000', 1, '2013-06-30 12:37:37', '0000-00-00 00:00:00'),
(14, 109, 114, 'Fuck the system', '<p>Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system</p>\n<p>Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;</p>\n<p>Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system</p>\n<p>Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system</p>\n<p>Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system&nbsp;Fuck the system</p>', '1372543200', '1372975200', 1, '2013-06-30 12:38:37', '0000-00-00 00:00:00'),
(15, 109, 104, 'Fuck the system', '<p>Fuck the system</p>', '1385938800', '1386975600', 1, '2013-12-02 20:11:10', '0000-00-00 00:00:00'),
(20, 7, 11, 'This is a Forum message', '<p>Whats up everybody?</p>', '1396047600', '1396216800', 1, '2014-03-29 14:54:34', '0000-00-00 00:00:00'),
(21, 7, 7, 'test', '<p>dasadsdasdsadsa</p>', '1396134000', '1396216800', 1, '2014-03-30 21:37:36', '0000-00-00 00:00:00'),
(22, 7, 7, 'eyeyeyeyey', '<p>sdfadsdsdsadasdas</p>', '1396134000', '1396216800', 1, '2014-03-30 21:38:00', '0000-00-00 00:00:00'),
(23, 7, 7, 'When is AC done?', '<p>Lorem ipsum dolor</p>', '1400104800', '1404079200', 1, '2014-05-15 17:48:26', '0000-00-00 00:00:00'),
(24, 7, 7, 'Question', '<p>asdlkdajsklasjkdasjadslkj</p>', '1400104800', '1406757600', 1, '2014-05-15 17:48:47', '0000-00-00 00:00:00'),
(25, 7, 7, 'say hello', '<p style="text-align: center;"><font color="#8db3e2">Wassup everybody</font></p>', '1400536800', '1401487200', 1, '2014-05-20 22:35:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum_archieve`
--

CREATE TABLE IF NOT EXISTS `forum_archieve` (
`archieve_topic_id` bigint(12) NOT NULL,
  `topic_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `topic_title` text NOT NULL,
  `topic_text` text NOT NULL,
  `publish_date` text NOT NULL,
  `expire_date` text NOT NULL,
  `topic_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `topic_archieve_date` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forum_archieve`
--

INSERT INTO `forum_archieve` (`archieve_topic_id`, `topic_id`, `org_id`, `member_id`, `topic_title`, `topic_text`, `publish_date`, `expire_date`, `topic_status`, `add_date`, `update_date`, `topic_archieve_date`) VALUES
(1, 4, 109, 114, 'We are testing...', '<p>We are testing We are testing We are testing We are testing We are testing We are testing We are testing</p>\n<p>We are testing We are testing We are testing We are testing We are testing We are testing We are testing</p>\n<p>&nbsp;</p>', '1371852000', '1372543200', 1, '2013-06-22 16:24:33', '2013-06-22 15:21:33', '2013-06-22 22:04:53'),
(2, 7, 109, 114, 'This is title', '<p>This is title This is title This is title This is title This is title This is title This is title</p>\n<p>This is title This is title This is title This is title This is title This is title This is title</p>\n<p>This is title This is title This is title This is title This is title This is title This is title</p>\n<p>This is title This is title This is title This is title This is title This is title This is title</p>\n<p>This is title This is title This is title This is title This is title This is title This is title</p>', '1371852000', '1372543200', 1, '2013-06-22 22:09:56', '0000-00-00 00:00:00', '2013-06-22 22:10:40'),
(3, 9, 109, 114, 'We are testing...tt', '<p>We are testing... We are testing... We are testing...<strong> </strong><br />We are testing... We are testing... We are testing... We are testing...</p>\n<p>We are testing...</p>', '1371852000', '1372543200', 1, '2013-06-22 22:12:37', '2013-06-22 20:12:50', '2013-06-23 15:00:18'),
(4, 17, 7, 7, 'Second test', '<p>Second test<br></p>', '1395615600', '1396216800', 1, '2014-03-24 17:59:43', '0000-00-00 00:00:00', '2014-03-24 18:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE IF NOT EXISTS `forum_comment` (
`id` int(11) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_date` varchar(100) NOT NULL,
  `comment_time` time NOT NULL,
  `posted_by` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`id`, `post_id`, `comment`, `comment_date`, `comment_time`, `posted_by`) VALUES
(25, '11', 'fine', '2012-06-18', '00:00:00', '3'),
(24, '8', 'nice', '2012-05-20', '00:00:00', '3'),
(26, '8', 'kqbqkqkb q', '2012-06-26', '00:00:00', '34'),
(31, '21', 'hdchjcn', '2012-07-13', '00:00:00', '1'),
(28, '18', 'this test is bogus', '2012-06-28', '00:00:00', '3'),
(29, '18', 'i hate testing', '2012-06-28', '00:00:00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE IF NOT EXISTS `global_settings` (
`id` int(11) NOT NULL,
  `per_sms_cost` decimal(10,2) NOT NULL,
  `per_letter_cost` decimal(10,2) NOT NULL,
  `per_invoice_cost` decimal(10,2) NOT NULL,
  `allowed_sms_per_month` bigint(10) NOT NULL,
  `allowed_letter_per_month` bigint(10) NOT NULL,
  `admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`id`, `per_sms_cost`, `per_letter_cost`, `per_invoice_cost`, `allowed_sms_per_month`, `allowed_letter_per_month`, `admin_cost`, `add_date`, `update_date`) VALUES
(1, '15.00', '6.00', '2.00', 1000, 1000, '13.50', '2012-12-06 17:55:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE IF NOT EXISTS `group_permission` (
`id` int(11) NOT NULL,
  `group_id` tinyint(50) NOT NULL,
  `sending_email` tinyint(10) NOT NULL,
  `sending_sms` tinyint(10) NOT NULL,
  `sending_post` tinyint(10) NOT NULL,
  `profile` tinyint(10) NOT NULL,
  `message` tinyint(10) NOT NULL,
  `org_id` int(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `group_id`, `sending_email`, `sending_sms`, `sending_post`, `profile`, `message`, `org_id`) VALUES
(4, 5, 1, 2, 1, 2, 1, 22),
(5, 7, 1, 1, 1, 1, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE IF NOT EXISTS `letter` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `letter_header` text NOT NULL,
  `letter_footer` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `admin_status` int(20) NOT NULL,
  `superadmin_status` int(20) NOT NULL,
  `letter_status` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id`, `org_id`, `member_group`, `title`, `text`, `letter_header`, `letter_footer`, `sender_name`, `sending_date`, `admin_status`, `superadmin_status`, `letter_status`) VALUES
(105, 109, 110, 'From Me', 'Testing tonight Testing tonight Testing tonight Testing tonight Testing tonight\r\nTesting tonight Testing tonight Testing tonight Testing tonight Testing tonight\r\nTesting tonight Testing tonight Testing tonight Testing tonight Testing tonight\r\nTesting tonight Testing tonight Testing tonight Testing tonight Testing tonight', 'Letter Header', 'Letter footer', '104', '3333333', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `letter_archive`
--

CREATE TABLE IF NOT EXISTS `letter_archive` (
`id` int(11) NOT NULL,
  `letter_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `admin_status` int(20) NOT NULL,
  `superadmin_status` int(20) NOT NULL,
  `letter_status` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `letter_archive`
--

INSERT INTO `letter_archive` (`id`, `letter_id`, `org_id`, `member_group`, `title`, `text`, `sender_name`, `sending_date`, `admin_status`, `superadmin_status`, `letter_status`) VALUES
(24, 76, 22, 5, '<p>ddf</p>', '<p>dfdf</p>', '3', '2012-04-05', 2, 1, 0),
(25, 81, 22, 0, '<p><span style="text-decoration: underline;"><em><strong><span style="color: #ffcc00;">web portal</span></strong></em></span></p>', '<p><strong><span style="color: #00ffff;">There are many variations of passages of Lorem Ipsum available, but the  majority have suffered alteration in some form, by injected humour, or  randomised words which don''t look even slightly believable. If you are  going to use a passage of Lorem Ipsum, you need to be sure there isn''t  anything embarrassing hidden in the middle of text. All the Lorem Ipsum  generators on the Internet tend to repeat predefined chunks as  necessary, making this the first true generator</span></strong></p>', '', '2012-05-29', 2, 1, 0),
(26, 79, 22, 5, 'ere', 'rere', '3', '2012-05-20', 2, 1, 0),
(27, 77, 22, 0, '<p>test</p>', '<p>here are many variations of passages of Lorem Ipsum available, but the  majority have suffered alteration in some form, by injected humour, or  randomised words which don''t look even slightly believable. If you are  going to use a passage of Lorem Ipsum, you need to be sure there isn''t  anything embarrassing hidden in the middle of text. All the Lorem Ipsum  generators on the Internet tend to repeat predefined chunks as  necessary, making this the first true generator on the Internet. It uses  a dictionary of over 200 Latin words, combined with a handful of model  sentence structures, to generate Lorem Ipsum which looks reasonable. The  generated Lorem Ipsum is therefore always free from repetition,  injected humour, or non-characteristic words etc.</p>', '', '2012-05-19', 2, 1, 0),
(28, 84, 22, 0, '<p>ci</p>', '<p>dfdfdf</p>', '', '2012-05-29', 2, 1, 0),
(29, 86, 22, 12, '<p>this is testuing</p>', '<p>This is testing</p>', '34', '2012-06-27', 2, 1, 0),
(30, 96, 6, 0, '<p>This is from Org_Admin</p>', '<p>This is from Org_Admin</p>', '', '2012-08-01', 2, 1, 0),
(31, 103, 6, 0, '<p>This is Title2&sect;</p>', '<h3>This is Text2</h3>', '', '2012-08-03', 2, 2, 0),
(32, 102, 6, 0, '<p>This is Title</p>', '<p>This is Text</p>', '', '2012-08-03', 2, 2, 0),
(33, 104, 6, 21, '<p>This is from member</p>', '<p>This is from member</p>', '', '2012-08-03', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter_footer`
--

CREATE TABLE IF NOT EXISTS `letter_footer` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `letter_footer`
--

INSERT INTO `letter_footer` (`id`, `org_id`, `member_id`, `title`, `text`) VALUES
(9, 22, 3, 'custoom footer', '<p>powered by: ndjfkdf</p>'),
(4, 22, 0, 'standard footer', '<p><span style="color: #ff0000;">Sincerly,</span></p>\n<p><span style="color: #339966;">Date: 2011/12/12</span></p>\n<p>&nbsp;</p>'),
(10, 4, 1, 'This is footer', '<p>This is footer</p>'),
(11, 4, 2, 'standard footer', '<p>ABC 87343837838377837389 Bangiro(8835838583) phone: 59893589893</p>'),
(12, 6, 0, 'standard', '<p>standard</p>');

-- --------------------------------------------------------

--
-- Table structure for table `letter_header`
--

CREATE TABLE IF NOT EXISTS `letter_header` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `letter_header`
--

INSERT INTO `letter_header` (`id`, `org_id`, `member_id`, `title`, `text`) VALUES
(14, 22, 0, 'dfdf', '<p>dfd</p>'),
(6, 22, 0, 'Standard Header', '<p><span style="color: #ff0000;">Organization name: r society</span></p>\n<p><span style="color: #00ff00;">Date:2011/12/03</span></p>'),
(10, 22, 4, 'dd', '<p>dd</p>'),
(13, 22, 3, 'custoom header', '<p>organization name: sports society</p>'),
(15, 22, 0, 'dfdf', '<p>hjyyjjdjhy</p>'),
(16, 4, 1, 'This is header', '<p>HiI</p>'),
(17, 6, 0, 'standard', '<p>standard</p>');

-- --------------------------------------------------------

--
-- Table structure for table `letter_send_request`
--

CREATE TABLE IF NOT EXISTS `letter_send_request` (
`id` int(11) NOT NULL,
  `letter_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `admin_status` int(100) NOT NULL,
  `superadmin_status` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `letter_status` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=447 ;

--
-- Dumping data for table `letter_send_request`
--

INSERT INTO `letter_send_request` (`id`, `letter_id`, `member_id`, `org_id`, `admin_status`, `superadmin_status`, `sender_id`, `letter_status`) VALUES
(446, 103, 3, 6, 2, 2, 0, 0),
(445, 102, 3, 6, 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` bigint(20) unsigned NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `main_board_article`
--

CREATE TABLE IF NOT EXISTS `main_board_article` (
`article_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `article_title` text NOT NULL,
  `uploaded_article` text,
  `article_text` text NOT NULL,
  `article_color_code` text,
  `article_category` varchar(100) DEFAULT 'Default',
  `article_type` varchar(8) NOT NULL COMMENT '1=public,2=private',
  `importance` int(1) NOT NULL,
  `publish_date` text NOT NULL,
  `expire_date` text NOT NULL,
  `send_article_by` text,
  `send_notification_by` text,
  `send_to_group` text,
  `send_to_member` text,
  `article_reminder_email_time` text,
  `article_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1= Active',
  `article_proposal` int(1) NOT NULL DEFAULT '0' COMMENT '0= Not a proposal, 1= Its proposal',
  `proposal_approved` int(1) NOT NULL DEFAULT '0' COMMENT '0= Not approved, 1= Approved',
  `proposal_denied` int(1) NOT NULL DEFAULT '0' COMMENT '0= Not denied, 1= Denied',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `main_board_article`
--

INSERT INTO `main_board_article` (`article_id`, `org_id`, `member_id`, `article_title`, `uploaded_article`, `article_text`, `article_color_code`, `article_category`, `article_type`, `importance`, `publish_date`, `expire_date`, `send_article_by`, `send_notification_by`, `send_to_group`, `send_to_member`, `article_reminder_email_time`, `article_status`, `article_proposal`, `proposal_approved`, `proposal_denied`, `add_date`, `update_date`) VALUES
(4, 7, 7, 'I am not alive anymore', 'article_I am not alive anymore_1.pdf', '', '', '4', '1', 3, '1395615600', '1396216800', NULL, 'Email', '2', '', '5-Hour', 1, 0, 0, 0, '2014-03-24 17:03:16', NULL),
(8, 7, 11, 'This years revenue', '', '<p>Bla bla bl,a<br></p>', '#1a46ed', '3', '2', 5, '1396216800', '1398808800', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-03-31 12:01:40', NULL),
(6, 7, 11, 'This is proposal Upload', 'article_This is proposal Upload_6.pdf', '', '', '4', 'Public', 3, '1395615600', '1396216800', 'Email', NULL, NULL, '8', NULL, 0, 0, 0, 1, '2014-03-24 17:25:09', '2014-03-24 16:40:35'),
(7, 7, 7, 'This is proposal', 'article_This is proposal_7.pdf', '', '', '4', '1', 4, '1395615600', '1396216800', 'Email', NULL, '3', '', NULL, 1, 0, 1, 0, '2014-03-24 17:46:23', '2014-03-25 09:28:41'),
(9, 7, 7, 'test', '', '<p>asdlksdadsaklasdk</p>', '', '3', '2', 1, '1397858400', '1398808800', 'Email', NULL, '', '', NULL, 1, 0, 0, 0, '2014-04-19 00:23:01', NULL),
(10, 7, 7, 'dsadasdsa', '', '<p>sdadsadas</p>', '', '4', '1', 2, '1397858400', '1398808800', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-04-19 00:23:35', NULL),
(12, 1, 1, 'saddsadsa', '', '<p>saddsa</p>', '', '0', '2', 2, '1398031200', '1398808800', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-04-21 23:17:45', NULL),
(13, 7, 7, 'dsadasads', '', '<p>sadasd</p>', '', '4', '2', 2, '1400536800', '1401487200', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-05-20 22:39:02', '2014-05-20 20:39:02'),
(14, 7, 7, 'Test', '', '<p>adsasdasads</p>', '', 'Default', '1', 1, '1400536800', '1471644000', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-05-20 23:00:44', NULL),
(15, 7, 7, 'Whats more important than quality', '', '<p>We have to engage our coders</p>', '', '3', '2', 5, '1413669600', '1414450800', NULL, NULL, '', '', NULL, 1, 0, 0, 0, '2014-10-19 15:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_board_article_archieve`
--

CREATE TABLE IF NOT EXISTS `main_board_article_archieve` (
`archieve_article_id` bigint(12) NOT NULL,
  `article_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `article_title` text NOT NULL,
  `uploaded_article` text,
  `article_text` text NOT NULL,
  `article_color_code` text,
  `article_category` varchar(100) DEFAULT 'Default',
  `article_type` varchar(8) NOT NULL COMMENT '1=public,2=private',
  `importance` int(1) NOT NULL,
  `publish_date` text NOT NULL,
  `expire_date` text NOT NULL,
  `send_article_by` text,
  `send_notification_by` text,
  `send_to_group` text,
  `send_to_member` text,
  `article_reminder_email_time` text,
  `article_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1= Active',
  `article_proposal` int(1) NOT NULL DEFAULT '0' COMMENT '0= Not a proposal, 1= Its proposal',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `article_archieve_date` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `main_board_article_archieve`
--

INSERT INTO `main_board_article_archieve` (`archieve_article_id`, `article_id`, `org_id`, `member_id`, `article_title`, `uploaded_article`, `article_text`, `article_color_code`, `article_category`, `article_type`, `importance`, `publish_date`, `expire_date`, `send_article_by`, `send_notification_by`, `send_to_group`, `send_to_member`, `article_reminder_email_time`, `article_status`, `article_proposal`, `add_date`, `update_date`, `article_archieve_date`) VALUES
(3, 11, 7, 7, 'test', '', '<p>asddsadsdsaads</p>', '', '4', '1', 3, '1397858400', '1398808800', NULL, NULL, '', '', NULL, 1, 0, '2014-04-19 00:23:53', NULL, '2014-04-20 23:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`mem_id` bigint(12) NOT NULL,
  `org_id` bigint(50) NOT NULL,
  `mem_type_id` varchar(10) DEFAULT 'Superadmin',
  `customer_type` text NOT NULL COMMENT 'Government, Company, Organization',
  `customer_no` text,
  `first_name` varchar(500) DEFAULT NULL,
  `last_name` varchar(500) DEFAULT NULL,
  `member_sex` varchar(6) DEFAULT NULL,
  `dept_or_company_or_org_name` text,
  `dept_or_org_no` text,
  `username` text,
  `password` text,
  `email` text,
  `mobile_phone` text,
  `land_line_phone` text,
  `street_address` text,
  `zip` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `member_position` text,
  `ssn_or_person_no` text,
  `gender` varchar(256) DEFAULT NULL,
  `profile_message` text,
  `profile_picture` text,
  `bank_acc_no_one` text,
  `bank_acc_type_one` text,
  `bank_acc_no_two` text,
  `bank_acc_type_two` text,
  `bank_acc_no_three` text,
  `bank_acc_type_three` text,
  `bank_name` text,
  `custom_label_one` text,
  `custom_label_two` text,
  `custom_label_three` text,
  `custom_label_four` text,
  `custom_label_five` text,
  `custom_label_sex` text,
  `custom_label_seven` text,
  `custom_label_eight` text,
  `custom_label_nine` text,
  `custom_label_ten` text,
  `password_receive_by_email` int(1) DEFAULT '0',
  `password_receive_by_sms` int(1) DEFAULT '0',
  `activation_date` text,
  `expire_date` varchar(100) DEFAULT NULL,
  `membership_duration` bigint(10) DEFAULT NULL,
  `member_group` varchar(256) NOT NULL DEFAULT 'default',
  `vat_no` text,
  `attention` text,
  `your_reference` text,
  `our_reference` text,
  `ean_no` text,
  `credit_limit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `web` text,
  `blocked` int(1) NOT NULL DEFAULT '0',
  `non_ac_member` int(1) NOT NULL DEFAULT '0' COMMENT '0=AC Member,1= Non-Ac Member',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `org_id`, `mem_type_id`, `customer_type`, `customer_no`, `first_name`, `last_name`, `member_sex`, `dept_or_company_or_org_name`, `dept_or_org_no`, `username`, `password`, `email`, `mobile_phone`, `land_line_phone`, `street_address`, `zip`, `city`, `country`, `member_position`, `ssn_or_person_no`, `gender`, `profile_message`, `profile_picture`, `bank_acc_no_one`, `bank_acc_type_one`, `bank_acc_no_two`, `bank_acc_type_two`, `bank_acc_no_three`, `bank_acc_type_three`, `bank_name`, `custom_label_one`, `custom_label_two`, `custom_label_three`, `custom_label_four`, `custom_label_five`, `custom_label_sex`, `custom_label_seven`, `custom_label_eight`, `custom_label_nine`, `custom_label_ten`, `password_receive_by_email`, `password_receive_by_sms`, `activation_date`, `expire_date`, `membership_duration`, `member_group`, `vat_no`, `attention`, `your_reference`, `our_reference`, `ean_no`, `credit_limit`, `discount`, `web`, `blocked`, `non_ac_member`, `add_date`, `update_date`) VALUES
(1, 1, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', 'BTH', 'hossain098', '51OmEpWqI8s8jsbi//j3GD0Ge+zVLToKWRJxmXj5zBo=', 'tahersumonabufff@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-20 16:54:22', '2014-03-21 09:45:13'),
(2, 2, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', 'BTH', 'uplands', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'uplands-test@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-21 10:39:52', '2014-03-21 09:45:29'),
(3, 3, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', '110', 'uplands22', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'tahersumonabuvv@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-21 11:10:45', NULL),
(20, 12, '22', 'Government', NULL, 'Hamid', 'Khalil', NULL, 'Lindblomsvagen', '1205', 'tahersumonabu999@gmail.com ', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'tahersumonabxdddu@gmail.com ', '+46767459847', '+46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '1397601040', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', '2014-12-10 00:59:42'),
(9, 7, 'Admin', '', NULL, 'Sharup', 'Barua', NULL, NULL, NULL, 'sharup', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'mdta11@student.bth.se', '46767459847', NULL, 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '798998', NULL, 'xxxxxxxxxx', NULL, '66667', 'Bankgiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '1395431646', '1411164000', 6, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-24 02:03:13', '2015-03-07 14:41:16'),
(5, 5, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', 'd10', 'salman', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'tahersumonabu4@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1395418794', '1426522794', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-21 17:19:15', '2014-03-21 16:19:54'),
(6, 6, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', 'd10', 'elli', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'tahersumonabunnjk@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1395419344', '1426523344', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-21 17:24:17', '2014-03-21 16:29:04'),
(7, 7, 'Superadmin', 'Government', NULL, 'mergim', 'WebDice', NULL, 'Web Development', '33', 'mergim', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'info@webdice.com', '46767459847', '46767459847', 'Uplands', '371 44', 'Stockholm', 'SWE', 'Developer', '798998', '', 'UplandsUplandsUplandsUplandsUplandsUplandsUplandsUplandsUplandsUplandsUplandsUplands', '', '777987789', 'Bankgiro', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1395431646', '1459424605', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-21 20:23:09', '2015-06-04 23:11:30'),
(46, 17, 'Superadmin', 'Government', NULL, 'Petric', 'Pats', '', 'Developer', '344', 'admina@logic-coder.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'admina@logic-coder.com', '444444444', '', 'AD', '7777', 'st', 'DEU', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1428320605', '1459424605', NULL, 'default', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2015-04-06 13:42:50', '2015-04-06 11:43:25'),
(11, 7, '21', '', NULL, 'Hos', 'Khan', NULL, NULL, NULL, 'hos', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'hos@kmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '798998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '1395663640', '1411215640', 6, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-24 13:20:40', NULL),
(12, 8, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', 'BTH', 'free', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'freem@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1395834700', '1398426700', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-26 12:51:23', '2014-03-26 11:51:41'),
(13, 9, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', '110', 'tahertndd', 'BHXdpveBIK35cU5urVqYzY9rhCH9jVA+AgAx7z+C6uo=', 'tahersumonabucc@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1396054311', '1427158311', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-03-29 00:06:47', '2014-03-29 00:51:51'),
(14, 10, 'Superadmin', 'Government', NULL, 'abu', 'taher', NULL, 'BTH', '110', 'mergimdd', 'U97nsG/yq8x+/8Opls400jATrGlrcLEpHWScTRdie6A=', 'tahersumoddnabu@gmail.com', '46767459847', '', 'folksparksvegan 16 lgh 1702', '37233', 'ronneby', 'DEU', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-04-07 03:43:22', NULL),
(15, 11, 'Superadmin', 'Private person', NULL, 'abu', 'taher', NULL, '', '', 'hossain098ccc', '7EwysDLuP+vvpaouaMnbLKUejgEES9g/MK+fjxG4+hE=', 'tahersumonacccbu@gmail.com', '46767459847', '', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '7989986', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-04-07 03:49:40', NULL),
(16, 12, 'Superadmin', 'Government', '123456', 'Salman', 'Aleem', NULL, 'Lindblomsvagen', '1205', 'thesisbth2014cloud@gmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'thesisbth2014cloud@gmail.com', '+46767459847', '', 'folksparksvegan 16 lgh 1702', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1397303808', '1428407808', 0, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-04-12 13:55:36', '2014-04-30 23:46:28'),
(17, 7, '21', '', NULL, 'abu', 'taher', NULL, NULL, NULL, 'mergimvv', '6tx+yDYmcEbMx43/XlLiM8t6UlSTaXcup5scv12dPeI=', 'tahersumonabvucc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '1397510096', '1413062096', 6, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-04-14 23:14:56', NULL),
(21, 12, '22', 'Private person', NULL, 'Sharup', 'Barua', NULL, '', '', 'sharup@webdice.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'sharup@webdice.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '798998', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '1397601426', '1413324000', NULL, '', NULL, NULL, NULL, NULL, '1234', '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', '2014-05-01 01:21:53'),
(22, 12, '22', 'Government', '123456', 'abu', 'taher', NULL, 'Lindblomsvagen', '1205', 'tahersumonabcccccu@gmail.com', 'KR0QvosDUERevpniWKD03UpqMT3YdD478Euf2Dn5Xd0=', 'tahersumonabcccccu@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', '1234', NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', '2014-05-01 01:04:00'),
(23, 12, '22', 'Government', NULL, 'abu', 'taher', NULL, 'Lindblomsvagen', '1205', 'tahersumonabcccccu@gmail.com', 'KR0QvosDUERevpniWKD03UpqMT3YdD478Euf2Dn5Xd0=', 'tahersumonabcccccu@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', NULL),
(24, 12, '22', 'Government', NULL, 'Hamid', 'Khalil', NULL, 'Lindblomsvagen', '1205', 'hamidali@kmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'hamidali@kmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', NULL),
(25, 12, '22', 'Government', NULL, 'Chotmarani', 'Magi', NULL, 'Lindblomsvagen', '1205', 'Chotmarani@gmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'Chotmarani@gmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 1, 0, '0000-00-00 00:00:00', NULL),
(26, 12, '22', 'Government', NULL, 'Kuttar', 'Bachha', NULL, 'Lindblomsvagen', '1205', 'kutta@kmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'kutta@kmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 1, 0, '0000-00-00 00:00:00', NULL),
(27, 12, '22', 'Government', NULL, 'Fakinner POOOOO', 'POOOOO', NULL, 'Lindblomsvagen', '1205', 'mdta11cccc@student.bth.se', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'mdta11cccc@student.bth.se', '46767459847', '', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 1, 0, '0000-00-00 00:00:00', NULL),
(28, 12, '22', 'Government', NULL, 'Elli', 'Ekramian', NULL, 'Lindblomsvagen', '1205', 'elli@kmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'elli@kmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 1, 0, '0000-00-00 00:00:00', NULL),
(38, 12, '', 'Government', '877788', NULL, NULL, NULL, 'Lindblomsvagen', '1205', NULL, NULL, '', '467674598477', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'Elli', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', NULL),
(37, 12, '', 'Government', '908877', NULL, NULL, NULL, 'Lindblomsvagen', '1205', NULL, NULL, '', '+4699009847', '', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'Ahmed', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', '2014-05-11 13:28:08'),
(31, 12, '', 'Private person', '123454688', NULL, NULL, NULL, '', '', NULL, NULL, 'tahersumonabfvvvu@gmail.com', '4676745984744', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '798998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '12342244', 'Tahu', 'ME', 'You', '1234444', '4544.99', '3.00', '', 1, 1, '0000-00-00 00:00:00', NULL),
(32, 12, '22', 'Government', NULL, 'Jes', 'Winder', NULL, 'Lindblomsvagen', '1205', 'jese@kmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'jese@kmail.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'Developer', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 1, 0, '0000-00-00 00:00:00', NULL),
(33, 12, '22', 'Government', NULL, 'billu', 'ahmed', NULL, 'Lindblomsvagen', '1205', 'billu@gmail.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'billu@gmail.com', '46767459847', '', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1399243262', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', NULL),
(36, 12, '', 'Government', '998765', NULL, NULL, NULL, 'Lindblomsvagen', '1205', NULL, NULL, 'tahersumonabuiokjhuy@gmail.com', '409459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'Hoosain', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', NULL),
(35, 12, '', 'Government', '09876', NULL, NULL, NULL, 'Lindblomsvagen', '1205', NULL, NULL, 'tahersumonabuiopkui@gmail.com', '490987776', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'Kahu', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', NULL),
(39, 12, '22', 'Government', NULL, 'abu', 'taher', NULL, 'Lindblomsvagen', '1205', 'taher_abu2007@yahoo.com', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'taher_abu2007@yahoo.com', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1400622887', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', NULL),
(40, 12, '', 'Government', '1234546', NULL, NULL, NULL, 'Lindblomsvagen', '1205', NULL, NULL, 'tahersumonabnujjjj@gmail.com', '467674598476', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'Ahmed', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', '2014-12-10 00:58:29'),
(41, 12, '30', 'Government', NULL, 'Sharup', 'Barua', NULL, 'Lindblomsvagen', '1205', 'mdta11x@student.bth.se', '6DrMqM8BtQnq9zgmjDklbWgcMbdCSgSvThe03Y5ZcRs=', 'mdta11x@student.bth.se', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1400635332', '1428357600', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', NULL),
(42, 16, 'Superadmin', 'Company', NULL, 'Rameen', 'Grameen', 'Male', 'INMID', '12345678955', 'support@vassit.se', 'XLldR6pr0ZgJjsQtv7zLvnvOPJdtrLo2vR+YkHjMAwI=', 'simon@vassit.se', '0704443162', '', 'Österögatan 1', '16440 ', 'Kista', 'SWE', 'Marketing man', '', '', 'test', '', '5555', 'Bankaccount', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1409577863', '1440681863', NULL, 'default', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2014-09-01 15:23:19', '2014-09-01 13:38:26'),
(43, 7, 'Admin', 'Government', NULL, 'ab', 'zaa', NULL, 'vvbv', '66', 'tayer@tech.com', 'IHuj9uRS4MbTj/Z9mxUPFWMRx1QD6C36pkL6Tba8h+o=', 'tayer@tech.com', 'xxvxv', 'xxvxv', '  dvdvv', 'vxdvx', 'xcvxcv', 'SWE', 'cbc', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1414002205', '1426460400', NULL, '', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '0000-00-00 00:00:00', '2015-03-07 14:41:32'),
(44, 7, '', 'Government', '66767', NULL, NULL, NULL, 'vvbv', '66', NULL, NULL, 'taynner@tech.com', '565557', 'bbbb', 'bccvb', 'bcbc', 'cbcbc', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', 'bbb', 'taher2', 'vassit', 'bbb', 'bbb', '66.00', '0.00', 'bbbb', 1, 1, '0000-00-00 00:00:00', NULL),
(45, 7, '', 'Company', '01', NULL, NULL, NULL, 'VASS IT AB', '556829-8995', NULL, NULL, 'tahersumonabu@gmail.com', '0767459847', '', 'Österögatan 1', '164 40', 'Stockholm', 'SWE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', 'SE860609533201', 'Hossain', 'Hossain', 'Abu Taher', '', '20000.00', '0.00', 'www.logic-coder.com', 1, 1, '0000-00-00 00:00:00', NULL),
(47, 17, '', 'Government', '888', NULL, NULL, NULL, 'Developer', '344', NULL, NULL, 'goodbabyme15@gmail.com', '44444', '', 'xxxxxxxxxxxxxx', '16364', 'stockholm', 'DEU', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'default', '', 'tttt', '', '', '', '0.00', '0.00', '', 1, 1, '0000-00-00 00:00:00', NULL),
(48, 18, 'Superadmin', 'Organization', NULL, 'abu', 'taher', '', 'Logic', '6865', 'info@logic-coder.info', '7YNxGseSANpgVpLpWYXooPJiLgHzOKAtyZLSygOInBg=', 'info@logic-coder.info', '076 918 2819', '', 'Stockholm', '17444', 'Stockholm', 'SWE', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1450018811', '1481122811', NULL, 'default', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, 0, 0, '2015-12-13 14:58:56', '2015-12-13 15:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `member_assigned_to_groups`
--

CREATE TABLE IF NOT EXISTS `member_assigned_to_groups` (
`matg_id` bigint(12) NOT NULL,
  `assigned_mem_id` text NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `member_assigned_to_groups`
--

INSERT INTO `member_assigned_to_groups` (`matg_id`, `assigned_mem_id`, `group_id`, `add_date`, `update_date`) VALUES
(1, ',43,44,', 2, '2014-03-24 13:24:13', '2014-10-22 18:42:54'),
(3, ',21,20,19,', 6, '2014-03-29 11:38:55', '0000-00-00 00:00:00'),
(4, ',17,13,12,11,', 5, '2014-03-29 11:39:13', '2014-03-29 10:39:38'),
(5, ',11,', 7, '2014-03-29 11:39:57', '2014-05-25 03:04:50'),
(6, ',17,16,15,', 4, '2014-03-29 11:40:13', '0000-00-00 00:00:00'),
(7, ',43,44,', 9, '2014-05-11 15:50:58', '2014-10-22 18:42:38'),
(8, ',39,33,24,23,22,21,20,40,38,37,36,35,31,', 10, '2014-05-21 03:10:44', '0000-00-00 00:00:00'),
(9, ',39,33,22,21,20,40,38,35,31,', 11, '2014-05-21 03:13:32', '0000-00-00 00:00:00'),
(10, ',45,', 12, '2014-05-21 23:58:31', '2015-03-07 14:50:30'),
(11, ',47,', 14, '2015-04-07 17:20:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member_common_profile`
--

CREATE TABLE IF NOT EXISTS `member_common_profile` (
`id` int(11) NOT NULL,
  `org_id` int(50) NOT NULL,
  `member_title` varchar(100) NOT NULL COMMENT '1=required,2=not required',
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_message` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `household_size` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `member_common_profile`
--

INSERT INTO `member_common_profile` (`id`, `org_id`, `member_title`, `name`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `photo1`) VALUES
(2, 22, '1', '1', '1', '1', '1', '1', '1', '1', ''),
(3, 22, '1', '1', '2', '2', '1', '2', '1', '2', ''),
(4, 22, '1', '1', '1', '2', '1', '2', '1', '2', ''),
(5, 22, '1', '1', '1', '2', '1', '1', '1', '1', ''),
(6, 22, '1', '1', '1', '1', '1', '1', '1', '1', ''),
(7, 22, '1', '1', '1', '1', '1', '1', '1', '1', ''),
(8, 22, '2', '2', '2', '2', '2', '2', '2', '2', ''),
(9, 22, '2', '2', '2', '2', '2', '2', '2', '2', ''),
(10, 22, '2', '2', '2', '1', '2', '2', '2', '2', ''),
(11, 22, '1', '1', '2', '1', '2', '2', '2', '2', ''),
(12, 22, '1', '1', '2', '1', '2', '2', '2', '2', ''),
(13, 22, '1', '2', '2', '1', '2', '2', '2', '2', ''),
(14, 22, '2', '2', '2', '2', '2', '2', '2', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_communicate_member_email`
--

CREATE TABLE IF NOT EXISTS `member_communicate_member_email` (
`communication_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `sender_name` text NOT NULL,
  `email_subject` text NOT NULL,
  `email_message` text NOT NULL,
  `attached_files` text,
  `uploaded_dir` text,
  `message_read` int(1) NOT NULL DEFAULT '0',
  `reply_of` bigint(12) DEFAULT NULL,
  `send_to_individual_email` text,
  `send_to_external_list` text,
  `send_to_member` text,
  `send_to_group` text,
  `send_to_admin_member` text,
  `send_to_admin_group` text,
  `sending_time` text,
  `email_as_draft` int(1) NOT NULL DEFAULT '0' COMMENT '1=Draft, 0=Not Draft',
  `email_sent` int(1) NOT NULL DEFAULT '0' COMMENT '1=sent, 0=Not sent',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `member_communicate_member_email`
--

INSERT INTO `member_communicate_member_email` (`communication_id`, `sender_id`, `org_id`, `sender_name`, `email_subject`, `email_message`, `attached_files`, `uploaded_dir`, `message_read`, `reply_of`, `send_to_individual_email`, `send_to_external_list`, `send_to_member`, `send_to_group`, `send_to_admin_member`, `send_to_admin_group`, `sending_time`, `email_as_draft`, `email_sent`, `add_date`, `update_date`) VALUES
(24, 114, 109, 'Abu Zar', 'Modern Infrastructure E-Zine: August/September 2013', ' Modern Infrastructure E-Zine: August/September 2013\nThe Rocky Road to Hybrid Cloud\n\nJust a few years ago, hybrid clouds were seen as mere stepping stones on a journey that could ultimately end in the public cloud. But as enterprises put cloud computing to real-world use, some industry observers are beginning to see the hybrid cloud model as the way forward.\n\nBut just because hybrid cloud is in IT?s future doesn?t mean it?s a perfect solution.\n\nThe newest issue of Modern Infrastructure examines the very real trend of hybrid cloud, how to overcome the inevitable stumbling blocks and provides some conjecture for the future state of the cloud.\n\nSee what our experts have to say by downloading your issue today.\n\nAlong with the cover story, other features in this issue include:\n\nSocial Networking Helps IT Make Friends: The social and collaborative technologies that have been percolating in the parallel universe of consumer technology are finding their way to IT, writes Jim Furbush, chipping away at the wall that?s existed between IT and end users since time immemorial.\n\nDCIM: Is It For You? If your organization maintains its own data center, you?ve probably heard of data center infrastructure management, or DCIM. But many IT professionals don?t fully understand how DCIM can help with day-to-day operations and capacity planning.\n\nDownload your complimentary copy today and find out why hybrid cloud may be the final destination along the road to the cloud.', '4.jpg|5.jpg|', '1_24', 1, NULL, 'taher@kmail.com, taher@ymail.com', NULL, NULL, ',12,', NULL, 'Admins', NULL, 0, 0, '2013-09-19 21:58:24', '2013-09-19 19:58:24'),
(27, 114, 109, 'Abu Zar', 'Re:Modern Infrastructure E-Zine: August/September 2013', ' Modern Infrastructure E-Zine: August/September 2013\nThe Rocky Road to Hybrid Cloud\n\nJust a few years ago, hybrid clouds were seen as mere stepping stones on a journey that could ultimately end in the public cloud. But as enterprises put cloud computing to real-world use, some industry observers are beginning to see the hybrid cloud model as the way forward.\n\nBut just because hybrid cloud is in IT?s future doesn?t mean it?s a perfect solution.\n\nThe newest issue of Modern Infrastructure examines the very real trend of hybrid cloud, how to overcome the inevitable stumbling blocks and provides some conjecture for the future state of the cloud.\n\nSee what our experts have to say by downloading your issue today.\n\nAlong with the cover story, other features in this issue include:\n\nSocial Networking Helps IT Make Friends: The social and collaborative technologies that have been percolating in the parallel universe of consumer technology are finding their way to IT, writes Jim Furbush, chipping away at the wall that?s existed between IT and end users since time immemorial.\n\nDCIM: Is It For You? If your organization maintains its own data center, you?ve probably heard of data center infrastructure management, or DCIM. But many IT professionals don?t fully understand how DCIM can help with day-to-day operations and capacity planning.\n\nDownload your complimentary copy today and find out why hybrid cloud may be the final destination along the road to the cloud.\n\n\nThis is from reply', 'preference_1-4.jpg|', '25_09', 1, 24, NULL, NULL, ',114,', NULL, NULL, NULL, NULL, 0, 0, '2013-09-20 02:37:09', '2013-09-20 00:37:09'),
(28, 114, 109, 'Abu Zar', 'This is testing message', 'This is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message', 'preference_1-4.jpg|', '28_49', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admins', NULL, 0, 0, '2013-09-21 00:15:49', '2013-09-20 22:15:49'),
(29, 104, 109, 'Abu Zar', 'Re:This is testing message', 'This is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message\nThis is testing message This is testing message This is testing message This is testing message This is testing message\n\nHi! This is reply', '1537.5.png-350x0.png|', '29_47', 1, 28, NULL, NULL, ',114,', NULL, NULL, NULL, NULL, 0, 0, '2013-09-21 00:17:47', '2013-09-20 22:17:47'),
(30, 104, 109, 'Ahamed Mustafa', 'HI! this is testing', 'HI! this is testing HI! this is testing HI! this is testing HI! this is testing', '4.jpg|', '30_17', 1, NULL, NULL, ',2,', NULL, ',15,', NULL, NULL, NULL, 0, 0, '2013-09-21 00:25:17', '2013-09-20 22:25:17'),
(31, 104, 109, 'Ahamed Mustafa', 'tahersumonabu@gmail.com', 'lll', '4.jpg|', '31_25', 1, NULL, NULL, NULL, ',114,', NULL, NULL, NULL, NULL, 0, 0, '2013-09-21 00:43:25', '2013-09-20 22:43:25'),
(32, 114, 109, 'Abu Zar', 'subject', 'xx', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admins', NULL, 0, 0, '2013-09-21 00:44:33', '2013-09-20 22:44:33'),
(33, 114, 109, 'Abu Zar', 'aWDQDFQ', 'lll', '', '', 1, NULL, NULL, NULL, NULL, NULL, ',104,', NULL, NULL, 0, 0, '2013-09-21 00:46:39', '2013-09-20 22:46:39'),
(34, 114, 109, 'Abu Zar', 'subject', 'xxxxxxxxxxxxx', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admins', NULL, 0, 0, '2013-09-21 00:49:42', '2013-09-20 22:49:42'),
(35, 114, 109, 'Abu Zar', 'subject', 'xxxxxxxxxxxx', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admins', '1378475040', 0, 0, '2013-09-21 00:50:02', '2013-09-20 22:50:02'),
(36, 16, 12, 'Salman Aleem', 'This is testing', '<p>This is testing<br></p>', '', '', 1, NULL, 'tahersumonabu@gmail.com', NULL, ',20,21,22,33,39,31,35,40,23,24,36,9,', NULL, NULL, NULL, NULL, 0, 0, '2014-05-21 03:14:23', '2014-05-21 01:14:23'),
(37, 16, 12, 'Salman Aleem', 'This is testing', '<p>This is testingThis is testing<br></p>', '', '', 1, NULL, NULL, NULL, ',41,', NULL, NULL, NULL, NULL, 0, 0, '2014-05-21 03:22:56', '2014-05-21 01:22:56'),
(38, 41, 12, 'Sharup Barua', 'Re:This is testing', '<p>This is testingThis is testing<br></p>', '', '', 1, 37, NULL, NULL, ',39,16,', NULL, NULL, NULL, NULL, 0, 0, '2014-05-21 03:23:25', '2014-05-21 01:23:25'),
(39, 11, 7, 'Hos Khan', 'wassup', '<p>waassup</p>', '', '', 1, NULL, NULL, NULL, ',11,7,', NULL, NULL, NULL, NULL, 0, 0, '2014-05-25 05:03:11', '2014-05-25 03:03:11'),
(40, 7, 7, 'mergim WebDice', 'cc', '<p>zxzxz</p>', '', '', 1, NULL, 'taher@technobd.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2014-08-28 09:45:08', '2014-08-28 07:45:08'),
(41, 7, 7, 'mergim WebDice', 'test mail from AC', '<p>test mail that is going to be sent about 10min auto.</p>', 'ubnt access.txt|', '41_41', 1, NULL, 'hossain@vassit.se', NULL, ',17,11,', NULL, NULL, NULL, '1409575500', 0, 0, '2014-09-01 14:33:41', '2014-09-01 12:33:41'),
(42, 7, 7, 'mergim WebDice', 'test', '<p>test mail.</p>', '', '', 1, NULL, 'mergim.s@live.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2014-09-02 16:13:58', '2014-09-02 14:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `member_communicate_member_letter`
--

CREATE TABLE IF NOT EXISTS `member_communicate_member_letter` (
`letter_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `sender_name` text NOT NULL,
  `letter_title` text NOT NULL,
  `letter_text` text,
  `uploaded_letter` text,
  `letter_footer` int(1) NOT NULL DEFAULT '1' COMMENT '1=It has footer, 0= It has no footer',
  `letter_status` int(1) NOT NULL DEFAULT '0' COMMENT '0= Pending, 1= Delivered',
  `send_to_external_list` text COMMENT 'Each address Seperated by (|)',
  `send_to_member` text COMMENT 'each org_id seperated by (|)',
  `send_to_group` text,
  `letter_type` varchar(10) NOT NULL DEFAULT 'normal',
  `sending_time` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `member_communicate_member_letter`
--

INSERT INTO `member_communicate_member_letter` (`letter_id`, `sender_id`, `org_id`, `sender_name`, `letter_title`, `letter_text`, `uploaded_letter`, `letter_footer`, `letter_status`, `send_to_external_list`, `send_to_member`, `send_to_group`, `letter_type`, `sending_time`, `add_date`, `update_date`) VALUES
(79, 114, 109, 'Abu Zar', 'Checking', 'CheckingCheckingCheckingCheckingCheckingCheckingCheckingCheckingCheckingChecking', NULL, 1, 0, ',1,', NULL, ',14,13,', 'normal', 'standard', '2013-10-21 05:59:51', '2013-10-21 03:59:51'),
(80, 114, 109, 'Abu Zar', 'this is upload', '', NULL, 0, 0, ',1,', NULL, ',14,13,', 'normal', 'standard', '2013-10-21 06:00:35', '2013-10-21 04:00:35'),
(81, 104, 109, 'Ahamed Mustafa', 'Testing Letter Today', 'Testing Letter Today', NULL, 1, 0, ',8,', NULL, NULL, 'normal', 'standard', '2014-01-31 15:17:47', '2014-01-31 14:17:47'),
(82, 104, 109, 'Ahamed Mustafa', 'I dont like you', 'I dont like you', NULL, 1, 0, ',9,', NULL, NULL, 'normal', 'standard', '2014-01-31 15:19:42', '2014-01-31 14:19:42'),
(83, 104, 109, 'Ahamed Mustafa', 'I dont like you', 'jjjj', NULL, 1, 0, ',8,', NULL, NULL, 'normal', 'standard', '2014-03-11 15:26:44', '2014-03-11 14:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `member_communicate_member_sms`
--

CREATE TABLE IF NOT EXISTS `member_communicate_member_sms` (
`sms_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_contact_no` text NOT NULL,
  `sms_content` text,
  `send_to_individual_cell_no` text,
  `send_to_external_list` int(11) DEFAULT NULL,
  `send_to_member` text,
  `send_to_group` text,
  `send_to_admin_member` text,
  `send_to_admin_group` text,
  `sending_time` text,
  `sms_read` tinyint(1) NOT NULL DEFAULT '0',
  `reply_of` bigint(12) DEFAULT NULL,
  `total_sms_sent` bigint(20) NOT NULL,
  `sms_as_draft` int(1) NOT NULL DEFAULT '0' COMMENT '1=Draft, 0=Not Draft',
  `sms_sent` int(1) NOT NULL DEFAULT '0' COMMENT '1=sent, 0=Not sent',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '1=internal,2=external'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_old`
--

CREATE TABLE IF NOT EXISTS `member_old` (
`mem_id` int(11) NOT NULL,
  `org_id` bigint(50) NOT NULL,
  `member_title` varchar(100) DEFAULT 'Default',
  `mem_type_id` varchar(10) DEFAULT 'Admin',
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `member_sex` varchar(10) DEFAULT NULL,
  `phone_no` varchar(256) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `username` varchar(256) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `primary_address` text,
  `optional_address` text,
  `zip` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `state` text,
  `password_receive_by_email` int(1) NOT NULL DEFAULT '0',
  `password_receive_by_sms` int(1) NOT NULL DEFAULT '0',
  `admin_user` int(1) NOT NULL DEFAULT '0',
  `expire_date` varchar(100) DEFAULT NULL,
  `membership_duration` bigint(10) NOT NULL DEFAULT '0',
  `profile_message` text,
  `member_group` int(20) DEFAULT NULL,
  `member_photo` longblob,
  `mem_bank_acc_no` varchar(100) DEFAULT NULL,
  `mem_bank_acc_type` varchar(100) DEFAULT NULL,
  `mem_house_hold_size` varchar(100) DEFAULT NULL,
  `blocked` int(1) NOT NULL DEFAULT '0',
  `admin_notes` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `member_old`
--

INSERT INTO `member_old` (`mem_id`, `org_id`, `member_title`, `mem_type_id`, `first_name`, `last_name`, `member_sex`, `phone_no`, `email`, `username`, `person_number`, `password`, `primary_address`, `optional_address`, `zip`, `city`, `country`, `state`, `password_receive_by_email`, `password_receive_by_sms`, `admin_user`, `expire_date`, `membership_duration`, `profile_message`, `member_group`, `member_photo`, `mem_bank_acc_no`, `mem_bank_acc_type`, `mem_house_hold_size`, `blocked`, `admin_notes`, `add_date`, `update_date`) VALUES
(53, 57, 'Default', 'Admin', 'Abu', 'Taher', NULL, '6767787887', 'tahersumonabujkkk@gmail.com', '7789hjjk', 'hjhjjkkkk', 'zu6O5SEB8cRBkUKnZU3l/Hkkhmd/c3nt1WeTsdFmPDI=', 'jkjkkj', 'kjk', 'kjkj', 'Karlskrona', 'SWE', 'Trentino', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-06 01:50:57', '2013-02-24 19:38:05'),
(103, 108, 'Default', 'Admin', 'Abu', 'Taher', NULL, '6767787887', 'krishna18982@yahoo.com', 'krishna12330', '8797797', 'yw9Aqo2a+kglBvK6sEEYEgk9PLbyVDMYq3SquVBIY8s=', 'ss', '', '37141', 'Karlskrona', 'SWE', 'Trentino', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-20 20:31:45', '2013-02-24 19:38:05'),
(99, 104, 'Default', 'Admin', 'Elnaz', 'Ekramian', NULL, '6767787887', 'tahersumonffabu@gmail.com', 'taherbth12', '7890905098', '2aeZrWrpOlgdJQkLczj+xmiPzPy+kKP5w8R4mYR6sAQ=', 'nnn', '', '37141', 'Karlskrona', 'DEU', 'Trentino', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-12 22:55:12', '2013-02-24 19:38:05'),
(100, 105, 'Default', 'Admin', 'Abu', 'Taher', NULL, '6767787887', 'krishnabth12@yahoo.com', 'tuhin12', '778999', 'zEo3UXakhiLha66TRQ/bqK/j2yJEVKGOK55OUDH2dgM=', 'jj', '', '37141', 'Karlskrona', 'SWE', 'Trentino', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-12 22:59:05', '2013-02-24 19:38:05'),
(101, 106, 'Default', 'Admin', 'Abu', 'Taher', NULL, '6767787887', 'krishna12@yahoo.com', 'elnaz2', '78909050989', 'nIDwMxoju0JrNrpvcKIdZsIy4eqDBLzNWFaNFvMbfYM=', 'jjj', '', '37141', 'Karlskrona', 'SWE', 'Trentino', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-12 23:07:22', '2013-02-24 19:38:05'),
(102, 107, 'Default', 'Admin', 'Abu', 'Taher', NULL, '6767787887', 'tahersumonabu@disi.unitn', 'tahertntt', 'hjjjjj', 'Rl1U3o4FOsOF7Iox00jKq4+mFWgLqcrlMbUuWz5WBP4=', 'jj', '', '37141', 'Karlskrona', 'DEU', 'Trentino', 1, 0, 1, '1410097738', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2012-11-20 20:26:05', '2013-09-23 23:50:37'),
(104, 109, 'Default', 'Admin', 'Ahamed', 'Mustafa', 'Male', '+46767459847', 'tahersum@disi.unitn', 'tahertn', '67677878875', 'J0FlYAYhq8gzqsmg0rs6sDrJXYXtTjRkIYAgI1qY7BA=', 'Stockholm', 'Stockholm lan', '37144', 'Karlskrona', 'SWE', 'Blekinge', 1, 0, 1, '1410097738', 3, 'We can do everything for our better life.', 0, NULL, '77777777', 'Bankgiro', '12', 0, NULL, '2013-01-21 19:33:45', '2014-02-26 16:20:03'),
(105, 110, 'Default', 'Admin', 'Faham', 'Hossain', NULL, '6677777', 'faham@kmail.com', 'fahambth', '567890', '/YUh5SL5K+xAKKlMtPD2HVyrUYRfjOTtHLE2ojXVD74=', 'Kunsmarksken', '', '37144', 'Karlskrona', 'SWE', 'Blekinge', 1, 0, 1, '1369510549', 3, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-12 18:22:03', '2013-02-24 19:38:05'),
(106, 109, 'Bodai', 'Admin', 'ABU', 'TAHER', NULL, NULL, 'taher_abu200711@yahoo.com', 'tahertn12', '879779733', 'ssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1369510549', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-20 19:19:31', '2013-09-22 09:16:56'),
(108, 109, 'Bodai', 'Admin', 'ABU', 'TAHER', NULL, '1222', 'taher_abu200aa7@yahoo.com', 'hossain222', '456789009872', 'ssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1369510549', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-20 20:09:54', '2013-09-22 09:16:50'),
(109, 109, 'Koppa Samshu', 'Admin', 'Salman', 'Aleem', NULL, NULL, 'salman@kmail.com', 'salman', '77899998', 'Eu2Q1fcszww5a71swMk5p70XSF68ILCGA3vN9cnRc4M=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1369510549', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-23 22:26:47', '2013-09-22 09:16:46'),
(110, 109, 'Kadri', 'Admin', 'Kadeer', 'abdul', NULL, '222222222222222', 'kader@kmail.com', 'kader', '7777789', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'Karlskrona', '', '37144', 'Karlskrona', 'SWE', 'Blekinge', 0, 0, 0, '1369510549', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-23 22:33:32', '2013-09-22 09:16:41'),
(111, 111, 'Default', 'Admin', 'Usama', 'laden', NULL, '33333333', 'usama@kmail.com', '22222222', '87977973344', 'W1lRNIrh7hut+PbkIIvheRYrJ7lKjUfxqgWGjIa9gpg=', 'aaaaaaaa', 'aaaaaa', '37144', 'Karlskrona', 'DEU', 'Blekinge', 1, 0, 1, '1369510549', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-23 23:09:01', '2013-02-24 19:38:05'),
(112, 109, 'Programmer', 'Admin', 'Aida', 'Ehshani', NULL, '+46767459847', 'aida@student.bth.se', 'aida', '9876555558', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1410097738', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-24 18:52:53', '2013-09-15 13:46:27'),
(113, 109, 'Developer', 'Admin', 'Mehernaz', 'Ekramian', NULL, NULL, 'meher@irmail.com', 'meher', '0098888888', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1410097738', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-02-24 18:54:57', '2013-09-22 09:17:02'),
(114, 109, 'Coocker', '14', 'Abu', 'Zar', 'Male', '+46767459847', 'abuzar@kmail.com', 'abuzar', '99888889', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'Ronneby', '', '37144', 'Karlskrona', 'SWE', 'Blekinge', 0, 0, 0, '1410040800', 3, 'we are here', NULL, NULL, '33333333333', 'PlusGiro', '23', 0, NULL, '2013-02-24 20:35:49', '2013-12-21 14:14:49'),
(116, 109, 'Chairman', '12', 'Sharup', 'Barua', 'Male', '46767459847', 'sharup@gmjail.com', 'sharup', '877567778', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'll', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 0, 0, 0, '1405461600', 12, 'This is', NULL, NULL, '77777777', 'PlusGiro', '12', 0, NULL, '2013-07-21 15:13:10', '2013-12-21 14:15:08'),
(117, 113, 'Default', 'Admin', 'James', 'Bond', NULL, '876567788', 'bond@gmail.com', 'bond', '956789990', '/U4n/arL7+SjIPVRPCBBXMvmaai/u7IGvLFdPNPivkw=', 'wghghhj', '', '545', '33', 'DEU', 'stockholm', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-07-21 16:02:24', NULL),
(115, 112, 'Default', 'Admin', 'abu', 'taher', NULL, '+46767459847', 'taher@soft.com', 'tahersoft', '322222334', 'JUTY2pEAO1hSRylJoj8J1pSBfuSkZHTLXui3vAZFV3Q=', 'ccc', '', '37144', 'Karlskrona', 'SWE', 'Blekinge', 0, 1, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-03-16 20:38:40', NULL),
(118, 109, 'Chudur Budur', '16', 'Chotmarani', 'Magi', 'Male', '46767459847', 'chudurbudur@kmail.com', 'chudur', '897777998', 'eVuVQmbWC27gg1fjCT/AdRuEGuBVyxUwQei0DVqPV4E=', 'nbhuyt', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 0, 0, 0, '1395356400', 12, 'This is salman', NULL, NULL, '77777777', 'Bankgiro', '7878', 0, NULL, '2013-09-12 15:48:58', '2014-03-11 14:36:14'),
(119, 114, 'Default', NULL, 'James', 'Bond', NULL, '876567788', 'bond90@gmail.com', 'elnaz999', '956789990999', 'XQrJXnJvXFR5JdGFHt8D5bKDm2OJSSAeBF8Tb5rJCqs=', 'jjj', '', '545', '33', 'DEU', 'stockholm', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-10-11 02:39:31', NULL),
(120, 115, 'Default', NULL, 'Ahamed', 'Mustafa', NULL, '876567788', 'bond9099@gmail.com', 'james89', '95678999054', 'xGSGScCB4BT5s628ZM4DynUsa8Onq5jYmDEZP0cckZw=', 'jjj', '', '545', '33', 'SWE', 'stockholm', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-10-11 02:44:25', NULL),
(121, 116, 'Default', NULL, 'James', 'Bond', NULL, '876567788', 'bond909987@gmail.com', 'billu', '900099054', 'Xw9GvOoR4gAUVZP5vcGNwbTPVTve0Qi9MFtdLMbi/Gc=', 'jjjjjjjjjjjj', '', '545', '33', 'SWE', 'stockholm', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-11-05 16:19:04', NULL),
(127, 123, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumonabu@gmail.com', 'mergim', '768999866', 'xy7LDIYBpXjvePssep8rr74Vtdwj5PUDBKLHKH+7JpQ=', 'HHHHHH', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-02-28 10:52:03', '2014-02-28 10:09:49'),
(122, 117, 'Default', NULL, 'abu', 'taher', NULL, '46767459847', 'tahersumonaburtttyty@gmail.com', 'wasssss', '88766899999', 'vjRygIBFo5znTL0BX7MDmbVyO5mQ6JXf/A4aVzqmWNo=', 'SDDDDDDDDDDDDDDDD', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-12-01 11:24:37', NULL),
(123, 119, 'Default', NULL, 'abu', 'taher', NULL, '46767459847', 'tahersumonabu890@gmail.com', 'UHTERWWQ', '44555', '+DyjG23bkXack7KC2VOjj91nsu2TFUnW2tMvd4N05QY=', 'xxx', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-12-01 11:26:46', NULL),
(124, 120, 'Default', NULL, 'abu', 'taher', NULL, '46767459847', 'tahersumonabu888@gmail.com', 'YTREE', '978968686887', 'kyKfKRq90wO5qSBFeD5RQAZR2F78hUaHHPtQDogWgTA=', 'aaaaaaaaaa', '', '371 44', 'karlskrona', 'SWE', 'Blekingelan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-12-01 11:39:36', NULL),
(125, 121, 'Default', NULL, 'abu', 'taher', NULL, '46767459847', 'tahersumonabu9087@gmail.com', 'abutahertna', '8976454', 'Mb3OHZgniMXfUuyRGW4I+XdfRd9pW37U+wn6tYYd5aQ=', 'OWASP', '', '371 44', 'karlskrona', 'SWE', 'Blekinge', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-12-13 09:31:18', NULL),
(126, 122, 'Default', NULL, 'abu', 'taher', NULL, '46767459847', 'tahersumonabu8900@gmail.com', 'abuzar87uy', '6767787834551', 'pkYSjm8vc6Db2WBQz5K+ddFkyFzR4s+l4Kdyd+qORKk=', 'SOFTSEC', '', '371 44', 'karlskrona', 'SWE', 'Blekinge', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2013-12-13 09:57:58', NULL),
(128, 124, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'sal@gmail.com', 'salman4', '968999564', 'Y0oUbjOM+gipfAtJdAVbDms/0bKsigFAGoWZIbYN6vs=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-02-28 13:27:30', NULL),
(129, 125, 'Default', 'Admin', 'Test', 'Man', NULL, '46767459847', 'testman@gmail.com', 'testman', '097665656', 'QpN3argMvy6cywEdfrh39Lh3xTt84teTO5B7tS87QSs=', 'TestTest', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-02-28 14:45:55', NULL),
(130, 126, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'faktura@bth.se', 'faktura', '879090', 'SB50sEtHKZXDhmG72uGIjWKuF6t5Ab3A3GL51HtCsu4=', 'Faktura Testing', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-03 12:37:56', NULL),
(131, 127, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'kbm@gmail.com', 'aminew', '789000000', 'lWSO8YeVB+w8gK8gszW9bQ2yGOEYd8UEfQ763Zz3dVQ=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-03 13:28:18', NULL),
(132, 128, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumonjhknabu@gmail.com', 'tahertniou', '968999', '4JZX0Al31bm8eSqXN+jBDIlbONI/Y35FshwmN0yvgWM=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-12 15:28:38', NULL),
(142, 137, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumorthyu@gmail.com', 'abuzarpk', '8777889989', '2EFM4/P0LALsN44YgFm/AyVAUDYKdW2/DrRWAHbU6Pc=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 10:51:29', NULL),
(141, 136, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'uplands2@gmail.com', 'uplands2', '78098777', 'ybuaFgtLTUr76cdB4DPgSu+p6Qk3wgMdj3VBwJdVH/0=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 10:42:53', NULL),
(140, 135, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumonabdddu@gmail.com', 'hossain334', '453535353', 'YEnWtu6+bZVeaYaCIN6eHQgCUOzeoVPvKYPvioCx/fs=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-14 16:45:12', NULL),
(139, 134, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumonaddbu@gmail.com', 'tahertnddd', '968999333', '2yzz1c8dBKH+fvQkI5Ykmlh5XJ32MZYprfnixfUDvZc=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-14 16:41:44', NULL),
(138, 133, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'uplands@gmail.com', 'uplands', '298778', 'ZzeWKj7S0/+HieoWRvOYI+3DjF9Qc67fVO2lQ+yva/c=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-14 14:53:16', NULL),
(143, 138, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'salamnhgth@gmail.com', 'salmanwpk', '90900090', 'yEXd4l18Xp9QIB4hpCqQvlxbobKaYX3AANwtfnK42pI=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:12:58', NULL),
(144, 139, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'premium@gmail.com', 'premium', '9099990', 'iMo+Ij2SuNxCA8TSjaAtLYxwbTpS3JALdgVrW69msQQ=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:16:31', NULL),
(145, 140, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'free@gmail.com', 'free', '90000877', 'G1m1nPMOiTr6SaDcq2em/L3lklLgkaOGDsxlil4sKoI=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:19:48', NULL),
(146, 141, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'testtette@gmail.com', 'testour', '968999890', 'ACy4+cWJTsTD1izdvxBuAts4+DTDOiDIYzTRURR+vJo=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:34:23', NULL),
(147, 143, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'testtt@gmail.com', 'TESTTT', '64545464', 'pbEUMJ2Kt4CSZEasuJe/orDr1iIl8OLohJ+GOeixLaQ=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:42:17', NULL),
(148, 145, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'tahersumonabuddd@gmail.com', 'testmanmn', '98787889', 'TycCQyPzHejfH0ohyXDXjodqUd35SMoErtA3qu1R2eA=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge l', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 11:53:24', NULL),
(149, 146, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'vass20@gmail.com', 'vassit420', '9000799564', 'gdKe/NgyAheTzJ0dPbgVFUuCkLWqhEfdCgVulnTUTug=', 'vassit.se', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 15:33:53', NULL),
(150, 147, 'Default', 'Admin', 'abu', 'taher', NULL, '46767459847', 'uplandstest@gmail.com', 'uplandsnn', '09876665', 'Fu9JnT13vbUMw7+CT97+nbgj2SOI0WW1m7elZJofwt8=', 'www.linksys.net', '', '371 44', 'karlskrona', 'SWE', 'Blekinge lan', 1, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-03-17 15:39:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_post_back`
--

CREATE TABLE IF NOT EXISTS `member_post_back` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `validity` varchar(100) NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `creation_time` varchar(100) NOT NULL,
  `heading` text NOT NULL,
  `article_category` varchar(100) NOT NULL,
  `article_type` varchar(100) NOT NULL COMMENT '1=public,2=private',
  `created_by` varchar(100) NOT NULL,
  `importance` int(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `member_post_back`
--

INSERT INTO `member_post_back` (`id`, `title`, `text`, `validity`, `date_of_creation`, `creation_time`, `heading`, `article_category`, `article_type`, `created_by`, `importance`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(44, 'Summer vacation', '<p>It is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable English. Many desktop publishing packages and web  page editors now use Lorem Ipsum as their default model text, and a  search for ''lorem ipsum'' will uncover many web sites still in their  infanc</p>', '', '2012-05-26', '13:20 PM', '<p><span style="font-size: medium;"><span style="color: #ff00ff;">Summer vacation</span></span></p>', '5', '1', '3', 2, '2012-06-30', 3, 22, '5', 2),
(43, 'association board', '<p>is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable Englis</p>', '', '2012-05-03', '15:00 PM', '<p><span style="color: #00ff00;"><em><strong>association board</strong></em></span></p>', '7', '1', '3', 2, '2012-06-30', 3, 22, '5', 2),
(41, 'Android Application', '<p>is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable Englis</p>', '', '2012-05-26', '09:20 AM', '<p><span style="color: #993366;"><em><strong>Android Application</strong></em></span></p>', '5', '1', '3', 1, '2012-06-30', 3, 22, '5', 2),
(42, 'Mobile Application', '<p>is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable Englis</p>', '', '2012-05-26', '10:50 AM', '<p><span style="font-size: medium;"><strong><span style="color: #993366;">Mobile Application</span><', '5', '1', '3', 2, '2012-06-30', 3, 22, '5', 2),
(49, 'ActionButton instead of AnctionLink', '<p>It is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable English. Many desktop publishing packages and web  page editors now use Lorem Ipsum as their default model text, and a  search for ''lorem ipsum''</p>', '', '2012-06-01', '17:01 PM', '<h3><a title="I want to create a button which when clicked calls an action.  I have used Html.ActionLink to create a link which does exactly that but there is no Htmnl.ActionButton.  Is there some other way?  ..." href="http://stackoverflow.com/questions/11080601/actionbutton-instead-of-anctionlink">ActionButton instead of AnctionLink</a></h3>', '5', '2', '3', 2, '2013-06-30', 3, 22, '5', 2),
(50, 'Why java is not using pointers', '<p>It is a long established fact that a reader will be distracted by the  readable content of a page when looking at its layout. The point of  using Lorem Ipsum is that it has a more-or-less normal distribution of  letters, as opposed to using ''Content here, content here'', making it  look like readable English. Many desktop publishing packages and web  page editors now use Lorem Ipsum as their default model text, and a  search for ''lorem ipsum''</p>', '', '2012-06-01', '17:53 PM', '<h3><a title="Why java is not using pointer though C# and other language using it explicitly?  As i think due to some safety reason it does''t allow user to access it memory allocations " href="http://stackoverflow.com/questions/11081336/why-java-is-not-using-pointers">Why java is not using pointers</a></h3>', '5', '1', '4', 3, '2012-06-30', 4, 22, '5', 2),
(51, 'Calling d code from an interactive shell', '<h1><a href="http://stackoverflow.com/questions/11081333/calling-d-code-from-an-interactive-shell">Calling d code from an interactive shell</a></h1>', '', '2012-06-01', '18:10 PM', '<h1><a href="http://stackoverflow.com/questions/11081333/calling-d-code-from-an-interactive-shell">Calling d code from an interactive shell</a></h1>', '5', '1', '4', 3, '2012-06-30', 4, 22, '5', 2),
(52, 'Testing Title', '<p>This is Testing Text...</p>', '', '2012-06-09', '00:20 AM', '<p>This is Testing Heading...</p>', '5', '1', '33', 6, '2012-06-30', 33, 22, '5', 2),
(69, 'This is Testing  Idag...', '<p>This is Testing &nbsp;Idag...</p>', '', '2012-06-02', '21:28 PM', '<p>This is Testing &nbsp;Idag...</p>', '5', '1', '36', 6, '2012-06-29', 36, 22, '12', 2),
(70, 'This is Public', '<p>This is Public</p>', '', '2012-06-02', '21:35 PM', '<p>This is PublicThis is Public</p>', '5', '1', '33', 7, '2012-06-29', 33, 22, '5', 2),
(71, 'Standard Header ddss', '<p>acecev</p>', '', '2012-06-30', '22:50 PM', '<p>cqcq</p>', '5', '1', '38', 4, '2012-06-30', 38, 22, '12', 2),
(72, 'To day', '<p>To day</p>', '', '2012-06-08', '22:56 PM', '<p>To day</p>', '5', '1', '38', 5, '2012-06-29', 38, 22, '12', 2),
(75, 'I am public two', '<p>I am public two</p>', '', '2012-07-14', '19:51 PM', '<p>I am public two</p>', '10', '1', '1', 6, '2012-07-31', 1, 4, '20', 1),
(68, 'Standard Header', '<p>This is Testing</p>', '', '2012-06-09', '21:04 PM', '<p>This is testing</p>', '5', '1', '36', 3, '2012-06-30', 36, 22, '12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_previlige_backup`
--

CREATE TABLE IF NOT EXISTS `member_previlige_backup` (
`id` int(11) NOT NULL,
  `user_type` int(100) NOT NULL,
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
  `external_mainboard` int(20) NOT NULL,
  `external_presentation` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `member_previlige_backup`
--

INSERT INTO `member_previlige_backup` (`id`, `user_type`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manual_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_add_user`, `members_user_types`, `members_add_usertype`, `external_mainboard`, `external_presentation`) VALUES
(9, 4, 22, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(10, 5, 22, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(11, 6, 22, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(12, 9, 4, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(13, 10, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_profile_settings_by_admin`
--

CREATE TABLE IF NOT EXISTS `member_profile_settings_by_admin` (
`id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `member_title` int(1) NOT NULL,
  `person_number` int(1) NOT NULL,
  `name` int(1) NOT NULL DEFAULT '1',
  `expire_date` int(1) NOT NULL,
  `address` int(1) NOT NULL,
  `phone` int(1) NOT NULL,
  `email` int(1) NOT NULL,
  `profile_message` int(1) NOT NULL,
  `bank_info` int(1) NOT NULL,
  `household_size` int(1) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` int(1) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member_profile_settings_by_admin`
--

INSERT INTO `member_profile_settings_by_admin` (`id`, `org_id`, `member_id`, `member_title`, `person_number`, `name`, `expire_date`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`, `add_date`, `update_date`) VALUES
(2, 109, 114, 1, 0, 1, 2, 3, 1, 3, 2, 0, 3, 1, 3, '2013-09-23 20:04:52', '2013-09-23 18:05:47'),
(3, 109, 118, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2013-09-23 20:19:05', NULL),
(4, 0, 9, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2014-03-24 02:29:25', NULL),
(5, 0, 11, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2014-03-24 19:15:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_profile_settings_by_member`
--

CREATE TABLE IF NOT EXISTS `member_profile_settings_by_member` (
`id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `member_title` int(1) NOT NULL,
  `person_number` int(1) NOT NULL,
  `name` int(1) NOT NULL DEFAULT '1',
  `expire_date` int(1) NOT NULL,
  `address` int(1) NOT NULL,
  `phone` int(1) NOT NULL,
  `email` int(1) NOT NULL,
  `profile_message` int(1) NOT NULL,
  `bank_info` int(1) NOT NULL,
  `household_size` int(1) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` int(1) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member_profile_settings_by_member`
--

INSERT INTO `member_profile_settings_by_member` (`id`, `org_id`, `member_id`, `member_title`, `person_number`, `name`, `expire_date`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`, `add_date`, `update_date`) VALUES
(2, 109, 114, 1, 0, 1, 2, 3, 1, 3, 2, 0, 3, 1, 3, '2013-09-23 20:04:52', '2013-09-23 18:05:47'),
(3, 109, 118, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2013-09-23 20:19:05', NULL),
(4, 0, 7, 3, 0, 1, 3, 3, 0, 3, 3, 0, 3, 3, 3, '2014-03-23 00:59:00', NULL),
(5, 0, 9, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2014-03-24 02:29:25', NULL),
(6, 0, 11, 3, 0, 1, 3, 3, 3, 3, 3, 0, 3, 3, 3, '2014-03-24 19:15:48', NULL),
(7, 0, 4, 3, 0, 1, 3, 3, 0, 3, 3, 0, 3, 3, 3, '2014-04-23 22:16:44', NULL),
(8, 0, 42, 2, 0, 1, 2, 2, 0, 2, 2, 0, 1, 3, 3, '2014-09-01 15:40:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `description` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `description`, `name`, `date`) VALUES
(20, 'This is first', 'taher', '2013-04-05 00:00:00'),
(21, 'This is second', 'abu', '2013-04-05 00:00:00'),
(22, 'This is third', 'Faham', '2013-04-06 00:00:00'),
(23, 'This is fourth', 'Gazzi', '2013-04-03 00:00:00'),
(24, 'This is not a News', 'Salman', '2013-04-08 00:00:00'),
(25, 'This is our party time', 'Arman', '2013-04-04 00:00:00'),
(26, 'This are boys', 'Faham', '2013-04-09 00:00:00'),
(27, 'We are not friend', 'Elnaz', '2013-04-02 00:00:00'),
(28, 'We are not here', 'shohib', '2013-04-05 00:00:00'),
(29, 'We fuck you', 'Rochi', '2013-04-05 00:00:00'),
(30, 'We make our life', 'Robin', '2013-04-05 00:00:00'),
(31, 'We tho ', 'ekramul', '2013-04-19 00:00:00'),
(32, 'No body knows where i am', 'Elli', '2013-04-06 00:00:00'),
(33, 'We booked a time', 'Ullok', '2013-04-02 00:00:00'),
(34, 'Thi sis', 'scac', '2013-03-01 00:00:00'),
(35, 'cacsa', 'ascaac', '2013-03-01 00:00:00'),
(36, 'ascacac', 'ascascsac', '2013-03-03 00:00:00'),
(37, 'cascac', 'sacsaac', '2013-04-11 00:00:00'),
(38, 'saccacaasca', 'ascac', '2013-03-04 00:00:00'),
(39, 'aasca', 'acsasac', '2013-03-05 00:00:00'),
(40, 'This is nes', 'abu', '2013-04-05 18:35:39'),
(41, 'Toblerone', 'Toblerone', '2013-03-08 00:00:00'),
(42, 'Toblerone', 'Toblerone', '2013-03-04 00:00:00'),
(43, 'Toblerone', 'Toblerone', '2013-04-06 00:00:00'),
(44, 'Toblerone', 'Toblerone', '2013-03-19 00:00:00'),
(45, 'Toblerone', 'Toblerone', '2013-03-07 00:00:00'),
(46, 'Toblerone', 'Toblerone', '2013-04-08 00:00:00'),
(47, 'awef', 'vdsds', '2013-04-06 19:00:07'),
(48, 'awef', 'vdsds', '2013-04-06 19:00:10'),
(49, 'fwffwe', 'adaf', '2013-04-06 19:00:26'),
(50, 'fwffwe', 'adaf', '2013-04-06 19:00:28'),
(51, 'rabush', 'rabush', '2013-04-06 19:00:51'),
(52, 'xx', 'abu taher', '2014-03-11 14:32:20'),
(53, 'xx', 'abu taher', '2014-03-11 14:32:22'),
(54, 'xx', 'abu taher', '2014-03-11 14:32:32'),
(55, 'xx', 'abu taher', '2014-03-11 14:32:32'),
(56, 'xx', 'abu taher', '2014-03-11 14:32:32'),
(57, 'xx', 'abu taher', '2014-03-11 14:32:33'),
(58, 'xx', 'abu taher', '2014-03-11 14:32:33'),
(59, 'xx', 'abu taher', '2014-03-11 14:32:33'),
(60, 'xx', 'abu taher', '2014-03-11 14:32:33'),
(61, 'hyhyuu', 'abu taher', '2014-03-11 15:05:48'),
(62, 'hyhyuu', 'abu taher', '2014-03-11 15:05:52'),
(63, 'hyhyuu', 'abu taher', '2014-03-11 15:05:53'),
(64, 'hyhyuu', 'abu taher', '2014-03-11 15:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `organization_info`
--

CREATE TABLE IF NOT EXISTS `organization_info` (
`id` bigint(20) NOT NULL,
  `org_type` text NOT NULL,
  `org_category` bigint(10) DEFAULT NULL,
  `org_number` varchar(256) NOT NULL,
  `org_name` varchar(500) NOT NULL,
  `org_description` text,
  `org_email` text NOT NULL,
  `org_web` text,
  `org_mobile_phone` text,
  `org_land_phone` text,
  `org_street_address` text NOT NULL,
  `org_zip` varchar(10) NOT NULL,
  `org_city` varchar(400) NOT NULL,
  `org_country` varchar(256) NOT NULL,
  `org_bank_acc_no_one` varchar(256) NOT NULL,
  `org_bank_acc_type_one` varchar(256) NOT NULL,
  `org_bank_acc_no_two` varchar(256) DEFAULT NULL,
  `org_bank_acc_type_two` varchar(256) DEFAULT NULL,
  `org_bank_acc_no_three` varchar(256) DEFAULT NULL,
  `org_bank_acc_type_three` varchar(256) DEFAULT NULL,
  `org_bank_acc_no_four` text,
  `org_bank_acc_type_four` text,
  `org_bank_acc_no_five` text NOT NULL,
  `org_bank_acc_type_five` text,
  `org_logo` longblob,
  `payment_status` int(1) NOT NULL DEFAULT '0',
  `approval_status` int(1) NOT NULL DEFAULT '0',
  `org_blocked` int(1) NOT NULL DEFAULT '0',
  `expired` int(1) NOT NULL DEFAULT '0',
  `activation_date` text,
  `expire_date` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `organization_info`
--

INSERT INTO `organization_info` (`id`, `org_type`, `org_category`, `org_number`, `org_name`, `org_description`, `org_email`, `org_web`, `org_mobile_phone`, `org_land_phone`, `org_street_address`, `org_zip`, `org_city`, `org_country`, `org_bank_acc_no_one`, `org_bank_acc_type_one`, `org_bank_acc_no_two`, `org_bank_acc_type_two`, `org_bank_acc_no_three`, `org_bank_acc_type_three`, `org_bank_acc_no_four`, `org_bank_acc_type_four`, `org_bank_acc_no_five`, `org_bank_acc_type_five`, `org_logo`, `payment_status`, `approval_status`, `org_blocked`, `expired`, `activation_date`, `expire_date`, `add_date`, `update_date`) VALUES
(1, '', 21, '787878', 'Boby_homes', 'zxz', 'bony@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'Bankgiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395330918', '1426434918', '2014-03-20 16:54:03', '2014-03-20 15:55:18'),
(2, '', 21, '4202', 'Test FinalLPO', 'www.linksys.net', 'uplands-test@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'Bankgiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395396355', '1426500355', '2014-03-21 10:36:51', '2014-03-21 10:05:55'),
(3, '', 21, '897098', 'UplandsQ-Bro', 'aaaaaaaaa', 'uplands-q@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'Bankgiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395397367', '1426501367', '2014-03-21 11:09:57', '2014-03-21 10:22:47'),
(5, '', 21, '897867', 'Salman_pk', 'dvdvds', 'tahersumonabu888@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'Bankgiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395418794', '1426522794', '2014-03-21 17:18:36', '2014-03-21 16:19:54'),
(6, '', 21, '879', 'GHYTN', ' zxzczzc', 'hossain3333333333@vassit.se', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'PlusGiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395419344', '1426523344', '2014-03-21 17:23:20', '2014-03-21 16:29:04'),
(7, '', 21, '7899', 'Logic-coder IT', 'Uplands', 'mergim@kmail.com', 'www.logic-coder.com', '46767459847', '46767459847', 'Duvbergsvägen 38 LGH 1001 \r\n', '143 44', 'Stockholm', 'SWE', '81695 , 924 271 392-4 ', 'BankAccount', '', '', '', '', NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395431646', '1426535646', '2014-03-21 20:21:58', '2015-06-04 23:15:50'),
(8, '', 21, '960', 'Free', 'This is for Listing', 'frefe@kmail.com', 'free.com', '89000000', '676877878', 'Kistavagen', '371 44', 'Stockholm', 'SWE', '6754321', 'Bankaccount', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1395834700', '1398426700', '2014-03-26 12:50:46', '2014-03-26 11:51:40'),
(9, '', 21, '8978678', 'Boby_homesM', 'www.linksys.net', 'uplandsffff@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '6754321', 'PlusGiro', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1396054311', '1427158311', '2014-03-29 00:06:26', '2014-03-29 00:51:51'),
(10, 'Government', 21, '89786755', 'Uplands-Brodd', 'xd', 'hossain33333333@vassit.se', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '2014-04-07 03:42:23', '2014-04-07 01:45:29'),
(11, 'Company', 21, '897867555', 'BHYUJUJJd', 'xxx', 'uplandcccs@gmail.com', 'www.linksys.net', '46767459847', '46767459847', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '2014-04-07 03:49:00', '2014-04-07 01:49:45'),
(12, 'Government', 21, '1205', 'Lindblomsvagen 98', 'We are going to die very soon.', 'thesisbth2014cloud@gmail.com', 'www.lindblomsvagen98.com', '+46767459847', '46767459847', 'folksparksvegan 16 lgh 1702', '371 44', 'karlskrona', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1397303808', '1428407808', '2014-04-12 13:54:39', '2014-04-12 11:56:48'),
(13, 'Company', 33, '5568298995', 'VASS IT', 'IT company', 'info@vassit.se', 'www.vassit.se', '0707448223', '0850164494', 'Österögatan 1', '16440 ', 'Kista', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '2014-09-01 15:05:07', '2014-09-01 13:08:38'),
(14, 'Government', 21, '7788888', 'HHHH VAS', 'assfwe', 'tahersumonabdddu@gmail.com', 'BTH', '467674598474', '467674598475', 'karlskrona', '371 44', 'karlskrona', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0, NULL, NULL, '2014-09-01 15:14:10', '2014-09-01 13:15:13'),
(16, 'Company', 33, '12345678955', 'INMID', 'it company', 'CV@VASSIT.SE', 'inmid.com', '0707448223', '0850164494', 'Österögatan 1', '16440 ', 'Kista', 'SWE', '6980700', 'Bankgiro', '', '', '', '', NULL, NULL, '', NULL, NULL, 1, 1, 1, 0, '1409577863', '1440681863', '2014-09-01 15:22:25', '2015-03-07 14:42:21'),
(17, 'Government', 21, '344', 'Developer', 'ASDDDDDDDDDDDDD', 'dept@gmail.com', 'www.dept.com', '46466648', '649464', 'AD', '7777', 'st', 'DEU', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1428320605', '1459424605', '2015-04-06 13:41:56', '2015-04-06 11:43:25'),
(18, 'Organization', 34, '6865', 'Logic coder it', 'Hello', 'info@logic-coder.info', 'www.logic-coder.info', '076 918 28 19', '', 'Stockholm', '17444', 'Stockholm', 'SWE', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 1, 0, 0, '1450018811', '1481122811', '2015-12-13 14:57:18', '2015-12-13 15:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `org_billing_failure`
--

CREATE TABLE IF NOT EXISTS `org_billing_failure` (
`id` bigint(20) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `org_bill_id` bigint(12) NOT NULL,
  `timestamp` text,
  `correlationid` text,
  `ack` varchar(10) NOT NULL,
  `l_errodcode0` text,
  `l_shortmessage0` text,
  `l_longmessage0` text,
  `l_severitycode0` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `org_billing_failure`
--

INSERT INTO `org_billing_failure` (`id`, `org_id`, `mem_id`, `org_bill_id`, `timestamp`, `correlationid`, `ack`, `l_errodcode0`, `l_shortmessage0`, `l_longmessage0`, `l_severitycode0`, `add_date`, `update_date`) VALUES
(11, 104, 0, 125, '2012-11-12T21:55:44Z', '582df13b5829', 'Failure', '11549', 'Start Date is required', 'Subscription start date is required', 'Error', '2012-11-12 22:55:43', NULL),
(12, 105, 0, 126, '2012-11-12T21:59:38Z', '9e71a1f420365', 'Failure', '11549', 'Start Date is required', 'Subscription start date is required', 'Error', '2012-11-12 22:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_billing_info`
--

CREATE TABLE IF NOT EXISTS `org_billing_info` (
`org_bill_id` bigint(10) NOT NULL,
  `org_id` bigint(10) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `bill_profileid` text,
  `payment_method` varchar(20) NOT NULL,
  `bill_first_name` varchar(256) NOT NULL,
  `bill_last_name` varchar(256) NOT NULL,
  `bill_street_address` text NOT NULL,
  `bill_zip` varchar(50) NOT NULL,
  `bill_city` varchar(300) NOT NULL,
  `bill_country` varchar(300) NOT NULL,
  `bill_email` varchar(300) NOT NULL,
  `bill_mobile_phone` varchar(40) NOT NULL,
  `billing_terms_condition` varchar(3) NOT NULL DEFAULT 'Yes',
  `credit_card_no` text,
  `name_on_credit_card` text,
  `credit_card_type` text,
  `credit_card_expire_month` text,
  `credit_card_expire_year` text,
  `credit_card_verification_code` text,
  `active` int(1) NOT NULL DEFAULT '0' COMMENT '1=Active Payment Profile, 0=Inactive Payment Profile',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `org_billing_info`
--

INSERT INTO `org_billing_info` (`org_bill_id`, `org_id`, `mem_id`, `bill_profileid`, `payment_method`, `bill_first_name`, `bill_last_name`, `bill_street_address`, `bill_zip`, `bill_city`, `bill_country`, `bill_email`, `bill_mobile_phone`, `billing_terms_condition`, `credit_card_no`, `name_on_credit_card`, `credit_card_type`, `credit_card_expire_month`, `credit_card_expire_year`, `credit_card_verification_code`, `active`, `add_date`, `update_date`) VALUES
(1, 1, 0, NULL, 'invoice', 'Mergim', 'WebDice', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'tahersumonabu@gmail.com', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-04-21 01:21:37', NULL),
(2, 1, 3, NULL, 'invoice', 'Hossain', 'BOX', 'xxxxxxxxxx', '545', '33', 'SWE', 'bond9099@gmail.com', '544545', 'Yes', '', '', '', '', '', '', 0, '2014-04-21 01:31:01', NULL),
(3, 2, 0, NULL, 'invoice', 'inmid', 'com', 'Test road 1', '16435', 'Kista', 'SWE', 'ac@inmid.com', '0707448223', 'Yes', '', '', '', '', '', '', 0, '2014-04-23 21:39:23', NULL),
(4, 3, 0, NULL, 'invoice', 'abu', 'taher', 'Lindblomsvagen 98 , LGH 1204', '37233', 'Ronneby', 'SWE', 'thesisbth2014@gmail.com', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-04-23 23:33:26', NULL),
(5, 4, 0, NULL, 'invoice', 'Anders', 'Borg', 'Testgatan 1', '155 55', 'Kista', 'SWE', 'ac1@inmid.com', '0000000', 'Yes', '', '', '', '', '', '', 0, '2014-04-24 21:20:30', NULL),
(6, 12, 33, NULL, 'invoice', 'abu', 'taher', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'tahersumonabu@gmail.com', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 01:41:27', NULL),
(7, 12, 34, NULL, 'invoice', 'test', 'XYZ', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'mdta11@student.bth.se', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 01:51:20', NULL),
(8, 12, 35, NULL, 'invoice', 'abu', 'taher', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'tahersumonabu@gmail.com', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 01:59:02', NULL),
(9, 12, 36, NULL, 'invoice', 'abu', 'taher', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'tahersumonabu@gmail.com ', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 02:09:39', NULL),
(10, 12, 37, NULL, 'invoice', 'Hamid', 'umer', 'folksparksvegan 16 lgh 1702', '37240', 'ronneby', 'SWE', 'mdta11@student.bth.se', '+46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 02:12:52', NULL),
(11, 12, 38, NULL, 'invoice', 'abu', 'taher', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'tahersumonabu@gmail.com ', '46767459847', 'Yes', '', '', '', '', '', '', 0, '2014-05-05 02:17:11', NULL),
(12, 12, 40, NULL, 'creditcard', 'Hamid', 'Barua', 'karlskrona', '371 44', 'karlskrona', 'SWE', 'mdta11@student.bth.se', '46767459847', 'Yes', '5330787598543165', 'taher', 'MasterCard', '0', '0', '987', 0, '2014-05-05 02:26:24', NULL),
(13, 16, 0, NULL, 'invoice', 'Rameen', 'Grameen', 'Österögatan 1', '16440 ', 'Kista', 'SWE', 'support@vassit.se', '0704443162', 'Yes', '', '', '', '', '', '', 0, '2014-09-01 15:23:36', NULL),
(14, 17, 0, NULL, 'invoice', 'Petric', 'Pats', 'AD', '7777', 'st', 'DEU', 'admina@logic-coder.com', '444444444', 'Yes', '', '', '', '', '', '', 0, '2015-04-06 13:42:58', NULL),
(15, 18, 0, NULL, 'invoice', 'abu', 'taher', 'Stockholm', '17444', 'Stockholm', 'SWE', 'info@logic-coder.info', '076 918 2819', 'Yes', '', '', '', '', '', '', 0, '2015-12-13 14:59:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_billing_success`
--

CREATE TABLE IF NOT EXISTS `org_billing_success` (
`id` bigint(20) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(20) NOT NULL,
  `profileid` text NOT NULL,
  `profilestatus` varchar(30) DEFAULT NULL,
  `transactionid` text,
  `timestamp` text,
  `correlationid` text,
  `ack` varchar(10) DEFAULT NULL,
  `next_scheduled_billing_date` text,
  `total_billing_cycle` bigint(10) NOT NULL,
  `no_of_billing_cycle_completed` bigint(10) NOT NULL DEFAULT '0',
  `no_of_billing_cycle_remaining` bigint(20) NOT NULL,
  `current_outstanding_balance` decimal(10,2) DEFAULT NULL,
  `amount_of_last_successful_payment` decimal(10,2) DEFAULT NULL,
  `total_paid_amount` decimal(10,2) DEFAULT NULL,
  `date_of_last_successful_payment` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `org_billing_success`
--

INSERT INTO `org_billing_success` (`id`, `org_id`, `mem_id`, `profileid`, `profilestatus`, `transactionid`, `timestamp`, `correlationid`, `ack`, `next_scheduled_billing_date`, `total_billing_cycle`, `no_of_billing_cycle_completed`, `no_of_billing_cycle_remaining`, `current_outstanding_balance`, `amount_of_last_successful_payment`, `total_paid_amount`, `date_of_last_successful_payment`, `add_date`, `update_date`) VALUES
(22, 109, 0, 'I-VBFVA5NB8XJD', 'ActiveProfile', NULL, '2012-11-12T22:07:59Z', '8d8430f1114ec', 'Success', '2012-11-13T10:00:00', 3, 1, 2, '0.00', '10.00', '10.00', '2012-11-12T12:26:56', '2012-11-12 23:07:52', '2014-03-13 12:35:38'),
(23, 4, 0, 'I-C9J5LN5PRGFS', 'ActiveProfile', NULL, '2014-03-21T10:17:56Z', 'b767ccb1f0ff', 'Success', NULL, 12, 0, 12, NULL, NULL, NULL, NULL, '2014-03-21 11:17:53', '2014-03-21 10:17:57'),
(24, 6, 0, 'I-U1VR2JXY9LNE', 'ActiveProfile', NULL, '2014-03-21T16:26:08Z', '78941f4c8c9b9', 'Success', NULL, 12, 0, 12, NULL, NULL, NULL, NULL, '2014-03-21 17:26:04', '2014-03-21 16:26:09'),
(25, 12, 40, 'I-GLWDCJF0Y26E', 'ActiveProfile', NULL, '2014-05-05T00:26:27Z', '2aeff4f14387a', 'Success', NULL, 12, 0, 12, NULL, NULL, NULL, NULL, '2014-05-05 02:26:24', '2014-05-05 00:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `org_category`
--

CREATE TABLE IF NOT EXISTS `org_category` (
`id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `org_category`
--

INSERT INTO `org_category` (`id`, `category_name`, `status`, `add_date`, `update_date`) VALUES
(21, 'New Test', 2, '0000-00-00 00:00:00', '2012-08-10 03:36:12'),
(27, 'admin_cat_test', 2, '0000-00-00 00:00:00', '2014-04-02 09:31:04'),
(23, 'New Cat', 0, '2012-08-10 04:46:51', '2012-08-10 03:15:08'),
(24, 'SPORTS', 0, '2012-09-04 20:01:31', NULL),
(25, 'CULTURE', 0, '2012-09-04 20:01:42', NULL),
(28, 'KomunType', 2, '0000-00-00 00:00:00', '2015-03-09 14:10:55'),
(29, 'SchoolOrgs', 2, '0000-00-00 00:00:00', '2015-04-14 10:24:37'),
(30, 'Tick tick', 1, '0000-00-00 00:00:00', NULL),
(31, 'REKLAMATION', 1, '0000-00-00 00:00:00', NULL),
(32, 'webbasedsystems', 1, '0000-00-00 00:00:00', NULL),
(33, 'IT company', 1, '0000-00-00 00:00:00', NULL),
(34, 'Software / IT', 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_cost`
--

CREATE TABLE IF NOT EXISTS `org_cost` (
`id` int(11) NOT NULL,
  `org_id` int(20) NOT NULL,
  `sms_cost` int(100) NOT NULL,
  `letter_cost` int(100) NOT NULL,
  `currency` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `org_cost`
--

INSERT INTO `org_cost` (`id`, `org_id`, `sms_cost`, `letter_cost`, `currency`) VALUES
(1, 17, 10, 10, ''),
(4, 26, 3, 3, ''),
(6, 22, 3, 3, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `org_external_previlige`
--

CREATE TABLE IF NOT EXISTS `org_external_previlige` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `external_mainboard` int(100) NOT NULL,
  `external_presentation` int(100) NOT NULL,
  `external_contact` int(10) NOT NULL,
  `external_archive_article` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `org_external_previlige`
--

INSERT INTO `org_external_previlige` (`id`, `org_id`, `external_mainboard`, `external_presentation`, `external_contact`, `external_archive_article`) VALUES
(4, 22, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_group`
--

CREATE TABLE IF NOT EXISTS `org_group` (
`id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `org_id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `org_member`
--

CREATE TABLE IF NOT EXISTS `org_member` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `org_member_groups`
--

CREATE TABLE IF NOT EXISTS `org_member_groups` (
`group_id` bigint(12) NOT NULL,
  `group_name` text NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `org_member_groups`
--

INSERT INTO `org_member_groups` (`group_id`, `group_name`, `org_id`, `mem_id`, `add_date`, `update_date`) VALUES
(2, 'XYZ-updated', 7, 7, '2014-03-24 12:45:55', '2014-03-24 11:47:46'),
(4, 'SmsReceivers', 7, 11, '2014-03-29 11:15:17', '2014-03-29 10:16:01'),
(5, 'LetterReceivers', 7, 11, '2014-03-29 11:15:28', '2014-03-29 10:15:51'),
(6, 'BillReceivers', 7, 11, '2014-03-29 11:15:38', '0000-00-00 00:00:00'),
(7, 'ACmembers', 7, 11, '2014-03-29 11:16:24', '0000-00-00 00:00:00'),
(8, 'Default', 2, 4, '2014-04-23 22:15:46', '0000-00-00 00:00:00'),
(9, 'ABC', 7, 7, '2014-05-11 15:50:53', '0000-00-00 00:00:00'),
(10, 'ABC', 12, 16, '2014-05-21 03:09:17', '0000-00-00 00:00:00'),
(11, 'XYZ', 12, 16, '2014-05-21 03:13:22', '0000-00-00 00:00:00'),
(12, 'New group', 7, 7, '2014-05-21 23:58:26', '0000-00-00 00:00:00'),
(13, 'We', 17, 46, '2015-04-07 15:31:39', '0000-00-00 00:00:00'),
(14, 'Wettt', 17, 46, '2015-04-07 15:37:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `org_member_letter`
--

CREATE TABLE IF NOT EXISTS `org_member_letter` (
`letter_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `letter_title` text NOT NULL,
  `letter_text` text,
  `uploaded_letter` text,
  `letter_footer` tinyint(1) NOT NULL DEFAULT '1',
  `letter_status` tinyint(1) NOT NULL DEFAULT '0',
  `receiver_ids` text NOT NULL,
  `total_org_letter` decimal(10,0) DEFAULT NULL,
  `total_mem_letter` decimal(10,0) DEFAULT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `org_member_letter`
--

INSERT INTO `org_member_letter` (`letter_id`, `org_id`, `sender_id`, `letter_title`, `letter_text`, `uploaded_letter`, `letter_footer`, `letter_status`, `receiver_ids`, `total_org_letter`, `total_mem_letter`, `add_date`, `update_date`) VALUES
(1, 109, 104, 'Uploaded Article', '', 'letter_Uploaded Article_1.pdf', 1, 1, '108,114', '2', '2', '2013-03-17 15:05:04', '2013-03-17 14:48:08'),
(2, 110, 105, 'Org_BTH', '', 'letter_Org_BTH_2.pdf', 1, 1, '105', '1', '1', '2013-03-17 15:36:30', '2013-03-17 14:47:13'),
(3, 109, 104, 'this is title_letter', '<p>this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter</p>\n<p>this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter</p>\n<p>this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter</p>\n<p>this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter this is title_letter</p>', NULL, 1, 0, '110,112', '4', '4', '2013-05-31 13:44:36', '0000-00-00 00:00:00'),
(4, 109, 104, '?Article Post_upload', '', 'letter_?Article Post_upload_4.pdf', 1, 0, '104', '5', '5', '2013-05-31 19:57:36', '0000-00-00 00:00:00'),
(5, 109, 104, 'Article Post_upload', '', 'letter_Article Post_upload_4.pdf', 1, 0, '108,114', '7', '7', '2013-05-31 19:59:39', '0000-00-00 00:00:00'),
(6, 109, 104, 'Article Proposal', '', 'letter_Article Proposal_6.pdf', 1, 0, '104', '8', '8', '2013-05-31 20:08:46', '0000-00-00 00:00:00'),
(7, 109, 104, 'Article Proposal', '', 'letter_Article Proposal_7.doc', 1, 0, '104', '9', '9', '2013-05-31 20:14:07', '0000-00-00 00:00:00'),
(8, 109, 104, 'Article Proposal', '', 'letter_Article Proposal_7.pdf', 1, 0, '104', '10', '10', '2013-05-31 20:25:36', '0000-00-00 00:00:00'),
(9, 109, 104, 'Article Proposal', '', 'letter_Article Proposal_9.pdf', 1, 0, '104', '11', '11', '2013-05-31 20:30:47', '0000-00-00 00:00:00'),
(10, 109, 104, 'Proposal_uploaded', '', 'letter_Proposal_uploaded_16.pdf', 1, 0, '104,106,108,109,110,112,113,114', '19', '19', '2013-06-01 20:37:15', '0000-00-00 00:00:00'),
(11, 109, 104, 'Proposal_uploaded_letter', '', 'letter_Proposal_uploaded_letter_17.pdf', 1, 0, '104,106,108,109,110,112,113,114', '27', '27', '2013-06-02 14:28:21', '0000-00-00 00:00:00'),
(12, 109, 104, 'This is for text', '<p>This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text</p>\n<p>This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text</p>\n<p>This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text</p>\n<p>This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text</p>\n<p>This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text&nbsp;This is for text</p>', 'letter', 1, 0, '104,106,108,109,110,112,113,114', '35', '35', '2013-06-02 14:34:37', '0000-00-00 00:00:00'),
(13, 109, 104, 'This is second version_Text', '<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>\n<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>\n<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>\n<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>\n<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>\n<p>This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text&nbsp;This is second version_Text</p>', '', 1, 0, '104,106,108,109,110,112,113,114', '43', '43', '2013-06-02 14:48:52', '0000-00-00 00:00:00'),
(14, 109, 104, 'Check_leeter', '<p>Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter</p>\n<p>Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter</p>\n<p>Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter</p>\n<p>Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter</p>\n<p>Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter Check_leeter</p>', NULL, 1, 0, '104', '44', '44', '2013-06-02 15:40:03', '0000-00-00 00:00:00'),
(15, 109, 104, 'This is text_Letter', '<p>This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter</p>\n<p>This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter</p>\n<p>This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter</p>\n<p>This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter This is text_Letter</p>', 'letter_This is text_Letter_21.pdf', 1, 0, '104', '45', '45', '2013-06-02 16:03:16', '0000-00-00 00:00:00'),
(16, 109, 104, 'This is text_Letter_check', '<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>\n<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>\n<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>\n<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>\n<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>\n<p>This is text_Letter_check This is text_Letter_check This is text_Letter_check This is text_Letter_check</p>', NULL, 1, 0, '104', '46', '46', '2013-06-02 16:09:30', '0000-00-00 00:00:00'),
(17, 109, 104, 'This our Hobby_Text', '<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>\n<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>\n<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>\n<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>\n<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>\n<p>This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text This our Hobby_Text</p>', NULL, 1, 0, '104', '47', '47', '2013-06-02 16:51:35', '0000-00-00 00:00:00'),
(18, 109, 104, 'This is for text_letter', '<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>\n<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>\n<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>\n<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>\n<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>\n<p>This is for text_letter This is for text_letter This is for text_letter This is for text_letter This is for text_letter</p>', 'letter_This is for text_letter_24.pdf', 1, 0, '104', '48', '48', '2013-06-02 16:58:37', '0000-00-00 00:00:00'),
(19, 109, 104, 'This is for_upload_letter', '', 'letter_This is for_upload_letter_25.pdf', 1, 0, '104', '49', '49', '2013-06-02 16:59:58', '0000-00-00 00:00:00'),
(20, 109, 104, 'Article_proposal_letter', '<p>Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter</p>\n<p>Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter</p>\n<p>Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter&nbsp;Article_proposal_letter</p>', 'letter_Article_proposal_letter_26.pdf', 1, 0, '104,106,108,109,110,112,113,114', '57', '57', '2013-06-02 17:22:26', '0000-00-00 00:00:00'),
(21, 109, 104, 'Artilce_proposal_upload_letter', '', 'letter_Artilce_proposal_upload_letter_27.pdf', 1, 0, '104,106,108,109,110,112,113,114', '65', '65', '2013-06-02 17:24:29', '0000-00-00 00:00:00'),
(22, 109, 104, 'Proposal_uploaded_letter_new', '', 'letter_Proposal_uploaded_letter_new_28.pdf', 1, 0, '104,106,108,109,110,112,113,114', '73', '73', '2013-06-02 17:29:12', '0000-00-00 00:00:00'),
(23, 109, 104, 'Another day_text_proposal', '<p>Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal</p>\n<p>Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal</p>\n<p>Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal</p>\n<p>Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal&nbsp;Another day_text_proposal</p>', 'letter_Another day_text_proposal_29.pdf', 1, 0, '104,106,108,109,110,112,113,114', '81', '81', '2013-06-02 17:31:15', '0000-00-00 00:00:00'),
(24, 109, 104, 'This is going to hell_proposal_upload', '<p>This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload</p>\n<p>This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload</p>\n<p>This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload</p>\n<p>This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload&nbsp;This is going to hell_proposal_upload</p>', 'letter_This is going to hell_proposal_upload_12.pdf', 1, 0, '104,106,108,109,110,112,113,114', '89', '89', '2013-06-10 01:11:34', '0000-00-00 00:00:00'),
(25, 109, 104, 'Hej hej, Friend', '<p>Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend</p>\n<p>Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend</p>\n<p>Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend</p>\n<p>Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend&nbsp;Hej hej, Friend</p>', 'letter_Hej hej, Friend_13.pdf', 1, 0, '104,106,108,109,110,112,113,114', '97', '97', '2013-06-10 01:12:08', '0000-00-00 00:00:00'),
(26, 109, 104, 'Proposal_uploaded_letter', '<p>hi</p>', 'letter_Proposal_uploaded_letter_1.pdf', 1, 0, '104,106,108,109,110,112,113,114', '105', '105', '2013-06-10 01:13:10', '0000-00-00 00:00:00'),
(27, 109, 104, 'We are not for posting_but_proposal', '', 'letter_We are not for posting_but_proposal_11.docx', 1, 0, '104,106,108,109,110,112,113,114', '113', '113', '2013-06-10 01:14:08', '0000-00-00 00:00:00'),
(28, 109, 104, 'Article Proposal', '<p>article_default_check&nbsp; article_default_check article_default_check article_default_check</p>\n<p>article_default_check&nbsp; article_default_check article_default_check article_default_check</p>\n<p>article_default_check&nbsp; article_default_check article_default_check article_default_check</p>', 'letter_Article Proposal_48.pdf', 1, 1, '104,106,108,109,110,112,113,114', '121', '121', '2013-06-10 03:17:34', '2013-10-10 23:24:54'),
(29, 109, 114, 'Testing_Vassit', '', 'letter_Testing_Vassit_52.pdf', 1, 1, '104,106,108,109,110,112,113,114', '129', '8', '2013-06-23 14:00:33', '2013-10-11 01:03:39'),
(30, 109, 114, 'Checking for color', '<p>Checking for color Checking for color Checking for color</p>', 'letter_Checking for color_52.pdf', 1, 1, '104,106,108,109,110,112,113,114', '137', '16', '2013-06-23 14:19:51', '2013-07-21 13:41:35'),
(31, 109, 104, 'I am not alive anymore', '<p>I am not alive anymoreI am not alive anymoreI am not alive anymore</p>', 'letter_I am not alive anymore_55.pdf', 1, 0, '104,112,113,114,116', '142', '126', '2014-01-31 15:23:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `org_member_previlige`
--

CREATE TABLE IF NOT EXISTS `org_member_previlige` (
`id` bigint(11) NOT NULL,
  `org_id` bigint(100) NOT NULL,
  `mem_type_id` bigint(12) NOT NULL,
  `mainboard_access_main` tinyint(1) NOT NULL DEFAULT '0',
  `mainboard_send_proposal` tinyint(1) NOT NULL DEFAULT '0',
  `mainboard_change_article` tinyint(1) NOT NULL DEFAULT '0',
  `mainboard_send_notification` tinyint(1) DEFAULT '0',
  `mainboard_sending_out` tinyint(1) DEFAULT '0',
  `mainboard_manually_archive` tinyint(1) DEFAULT '0',
  `forum_access` tinyint(1) NOT NULL DEFAULT '0',
  `forum_comments` tinyint(1) NOT NULL DEFAULT '0',
  `forum_delete_won_comments` tinyint(1) NOT NULL DEFAULT '1',
  `forum_delete_any_coments` tinyint(1) DEFAULT '0',
  `forum_manually_archive_comments` tinyint(1) DEFAULT '0',
  `member_login_logout` tinyint(1) NOT NULL DEFAULT '1',
  `member_change_profile` tinyint(1) NOT NULL DEFAULT '1',
  `member_change_password` tinyint(1) NOT NULL DEFAULT '1',
  `configuration_view_org` tinyint(1) NOT NULL DEFAULT '1',
  `configuration_change_org` tinyint(1) NOT NULL DEFAULT '0',
  `configuration_visibility` tinyint(1) DEFAULT '0',
  `configuration_switching` tinyint(1) DEFAULT '0',
  `configuration_create_address` tinyint(1) DEFAULT '0',
  `communication_send_email` tinyint(1) DEFAULT '0',
  `communication_send_sms` tinyint(1) DEFAULT '0',
  `communication_send_letters` tinyint(1) DEFAULT '0',
  `economics_register` tinyint(1) DEFAULT '0',
  `economics_send_payment` tinyint(1) DEFAULT '0',
  `economics_check_complete` tinyint(1) DEFAULT '0',
  `economics_watch_total_income` tinyint(1) DEFAULT '0',
  `economics_watch_total_cost` tinyint(1) DEFAULT '0',
  `economics_watch_statistics` tinyint(1) DEFAULT '0',
  `history_access_articles` tinyint(1) DEFAULT '0',
  `history_access_comments` tinyint(1) DEFAULT '0',
  `history_user_actions` tinyint(1) DEFAULT '0',
  `history_old_letters` tinyint(1) DEFAULT '0',
  `history_old_sms` tinyint(1) DEFAULT '0',
  `history_old_emails` tinyint(1) DEFAULT '0',
  `members_decide` tinyint(1) DEFAULT '0',
  `members_add_change` tinyint(1) DEFAULT '0',
  `members_c_group` tinyint(1) NOT NULL DEFAULT '0',
  `members_view_group` int(1) NOT NULL DEFAULT '0',
  `members_change_or_delete_group` int(1) NOT NULL DEFAULT '0',
  `members_add_group` tinyint(1) NOT NULL DEFAULT '0',
  `members_user_types` tinyint(1) DEFAULT '0',
  `members_add_usertype` tinyint(1) DEFAULT '0',
  `external_mainboard` tinyint(1) NOT NULL DEFAULT '0',
  `external_presentation` tinyint(1) NOT NULL DEFAULT '0',
  `access_faktura` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `org_member_previlige`
--

INSERT INTO `org_member_previlige` (`id`, `org_id`, `mem_type_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manually_archive_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_view_group`, `members_change_or_delete_group`, `members_add_group`, `members_user_types`, `members_add_usertype`, `external_mainboard`, `external_presentation`, `access_faktura`, `add_date`, `update_date`) VALUES
(1, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-03-24 01:33:32', NULL),
(2, 7, 20, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-03-24 01:51:10', NULL),
(3, 7, 21, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-03-24 02:03:38', NULL),
(4, 7, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-03-29 11:22:17', NULL),
(5, 7, 22, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-03-29 11:23:01', NULL),
(6, 7, 24, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-03-29 11:36:50', NULL),
(7, 1, 25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-04-21 01:25:53', NULL),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-04-21 01:25:55', NULL),
(9, 3, 27, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-04-23 23:42:15', NULL),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-04-23 23:42:17', NULL),
(11, 4, 28, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-04-24 21:23:50', NULL),
(12, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-04-24 21:23:51', NULL),
(13, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-05-05 01:39:14', NULL),
(14, 12, 30, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2014-05-05 01:40:33', NULL),
(15, 17, 31, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '2015-04-14 11:21:36', NULL),
(16, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-04-14 11:21:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_member_sms`
--

CREATE TABLE IF NOT EXISTS `org_member_sms` (
`sms_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `sender_id` bigint(12) NOT NULL,
  `receiver_ids` text,
  `external_receiver_ids` text COMMENT 'External customer',
  `receiver_contact_nos` text NOT NULL,
  `sms_content` text NOT NULL,
  `total_org_sms` decimal(10,0) DEFAULT NULL,
  `total_mem_sms` decimal(10,0) DEFAULT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `org_member_sms`
--

INSERT INTO `org_member_sms` (`sms_id`, `org_id`, `sender_id`, `receiver_ids`, `external_receiver_ids`, `receiver_contact_nos`, `sms_content`, `total_org_sms`, `total_mem_sms`, `add_date`, `update_date`) VALUES
(4, 109, 104, '110,114', NULL, '222222222222222,123456789', 'Dear Member,<br/>A new article is posted on (Test Final)''s Main Board With : \n<p style=''font-weight:bold;font-size:14px;''>Title: <a style=''font-weight:bold;font-size:14px;'' href=''http://localhost/adminscentral_new/organization/info/view_mainboard/62''>Uploaded Article</a></p>\n<p><b>Expire Date: </b>2013-03-17</p>\n', '2', '2', '2013-03-16 20:17:00', '0000-00-00 00:00:00'),
(5, 109, 104, '104,108,110,114', NULL, '66787878,1222,222222222222222,123456789', 'Dear Member,<br/>A new article is posted on (Test Final)''s Main Board With : \n<p style=''font-weight:bold;font-size:14px;''>Title: <a style=''font-weight:bold;font-size:14px;'' href=''http://localhost/adminscentral_new/organization/info/view_mainboard/63''>today</a></p>\n<p><b>Expire Date: </b>2013-03-23</p>\n', '6', '6', '2013-03-16 20:19:17', '0000-00-00 00:00:00'),
(6, 109, 104, '104', NULL, '+46767459847', 'Dear Member,<br/>A new article is posted on (Test Final)''s Main Board With : \n<p style=''font-weight:bold;font-size:14px;''>Title: <a style=''font-weight:bold;font-size:14px;'' href=''http://localhost/adminscentral_new/organization/info/view_mainboard/64''>This is my no</a></p>\n<p><b>Expire Date: </b>2013-03-22</p>\n', '7', '7', '2013-03-16 20:24:16', '0000-00-00 00:00:00'),
(7, 109, 104, '104', NULL, '+46767459847', 'Dear Member,<br/>A new article is posted on (Test Final)''s Main Board With : \n<p style=''font-weight:bold;font-size:14px;''>Title: <a style=''font-weight:bold;font-size:14px;'' href=''http://localhost/adminscentral_new/organization/info/view_mainboard/65''>This is my no</a></p>\n<p><b>Expire Date: </b>2013-03-22</p>\n', '8', '8', '2013-03-16 20:24:51', '0000-00-00 00:00:00'),
(8, 109, 104, '104', NULL, '+46767459847', 'Dear Member,\nA new article is posted on (Test Final)''s Main Board With : \nTitle: Uploaded Article\nExpire Date: 2013-03-23\n', '9', '9', '2013-03-16 20:42:29', '0000-00-00 00:00:00'),
(9, 109, 104, '112', NULL, '+46767459847', 'Dear Member,\nA new article is posted on (Test Final)''s Main Board With : \nTitle: Proposal_SMS\nExpire Date: 2013-06-22\n', '10', '10', '2013-06-02 18:19:28', '0000-00-00 00:00:00'),
(10, 109, 104, '112', NULL, '+46767459847', 'Dear Member,\nA new article is posted on (Test Final)''s Main Board With : \nTitle: Testing_SMS\nExpire Date: 2013-06-30\n', '11', '11', '2013-06-23 14:47:59', '0000-00-00 00:00:00'),
(11, 109, 104, NULL, '6', '+46767459847', 'Invoice no: 21508875 , Total Price: 452.00 SEK , Payable to: PlusGiro', '12', NULL, '2014-02-27 17:04:00', '0000-00-00 00:00:00'),
(12, 109, 104, NULL, '6', '0767459847', 'Invoice no: 21508875 , Total Price: 452.00 SEK , Payable to: PlusGiro', '13', NULL, '2014-02-27 17:10:01', '0000-00-00 00:00:00'),
(13, 109, 104, NULL, '6', '+46767459847', 'Invoice no: 21508875 , Total Price: 452.00 SEK , Payable to: PlusGiro 9999999999', '14', NULL, '2014-02-28 08:46:54', '0000-00-00 00:00:00'),
(14, 109, 104, NULL, '1', '+46707448223', 'Invoice no: 58902906 , Total Price: 448.00 SEK , Payable to: PlusGiro 9999999999', '15', NULL, '2014-02-28 15:49:59', '0000-00-00 00:00:00'),
(15, 0, 7, '', NULL, '', 'Dear Member,\nA new article is posted on (Mergim)''s Main Board With : \nTitle: sms test\nExpire Date: 2014-03-31\n', '1', '1', '2014-03-24 14:16:19', '0000-00-00 00:00:00'),
(16, 0, 7, '45', NULL, '0767459847', 'Invoice no: 20144 , Total Price: 7500.00 SEK , Payable to: ', '2', NULL, '2014-12-10 03:46:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `org_member_type`
--

CREATE TABLE IF NOT EXISTS `org_member_type` (
`mem_type_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `type_name` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `org_member_type`
--

INSERT INTO `org_member_type` (`mem_type_id`, `org_id`, `type_name`, `add_date`, `update_date`) VALUES
(10, 110, 'Bth_mem_type', '2013-02-12 18:52:38', '0000-00-00 00:00:00'),
(11, 109, 'Test_mem_type', '2013-02-12 18:53:25', '0000-00-00 00:00:00'),
(12, 109, 'New zone', '2013-02-12 18:55:17', '2013-02-12 17:55:59'),
(13, 110, 'Game zone', '2013-02-12 18:55:29', '2013-02-12 17:56:35'),
(14, 109, 'Board', '2013-02-12 18:56:17', '0000-00-00 00:00:00'),
(15, 110, 'President', '2013-02-12 18:56:47', '0000-00-00 00:00:00'),
(16, 109, 'President', '2013-02-12 19:13:03', '0000-00-00 00:00:00'),
(17, 0, 'ABC', '2014-03-23 23:56:35', '0000-00-00 00:00:00'),
(18, 0, 'XYZ', '2014-03-23 23:56:52', '0000-00-00 00:00:00'),
(20, 7, 'XYZUP', '2014-03-24 00:00:35', '2014-03-23 23:05:15'),
(21, 7, 'ABC', '2014-03-24 02:03:30', '0000-00-00 00:00:00'),
(22, 7, 'Financialusers', '2014-03-29 11:19:18', '0000-00-00 00:00:00'),
(23, 7, 'Mainboardviewers', '2014-03-29 11:19:32', '0000-00-00 00:00:00'),
(24, 7, 'Ac-admins', '2014-03-29 11:36:45', '0000-00-00 00:00:00'),
(25, 1, 'Custom', '2014-04-21 01:25:48', '0000-00-00 00:00:00'),
(26, 2, 'Normal', '2014-04-23 22:15:24', '0000-00-00 00:00:00'),
(27, 3, 'Abc', '2014-04-23 23:42:10', '0000-00-00 00:00:00'),
(28, 4, 'Default', '2014-04-24 21:23:46', '0000-00-00 00:00:00'),
(29, 12, 'ABC', '2014-05-05 01:38:35', '0000-00-00 00:00:00'),
(30, 12, 'XYZUP', '2014-05-05 01:40:30', '0000-00-00 00:00:00'),
(31, 17, 'Asd', '2015-04-07 15:28:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `org_mem_external_contact`
--

CREATE TABLE IF NOT EXISTS `org_mem_external_contact` (
`ext_contact_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `member_id` bigint(12) NOT NULL,
  `ext_contact_name` varchar(256) NOT NULL,
  `ext_contact_cell` varchar(256) DEFAULT NULL,
  `ext_contact_email` varchar(300) DEFAULT NULL,
  `ext_contact_address` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `org_mem_external_contact`
--

INSERT INTO `org_mem_external_contact` (`ext_contact_id`, `org_id`, `member_id`, `ext_contact_name`, `ext_contact_cell`, `ext_contact_email`, `ext_contact_address`, `add_date`, `update_date`) VALUES
(1, 109, 114, 'ABU TAHER', '+46767459847', 'taher@techvellay.com', 'Lindsblomsvagen', '2013-06-13 00:00:00', '0000-00-00 00:00:00'),
(2, 109, 114, 'Salman Zallem', '+467659988', 'salman@ymail.com', 'Karlskrona', '2013-06-13 00:00:00', '0000-00-00 00:00:00'),
(3, 109, 114, 'Sharup Barua', '+467898766', 'sharup@yahoo.com', 'Kungsangen 18 , 5 TR ', '2013-06-30 19:09:04', '0000-00-00 00:00:00'),
(4, 109, 114, 'Sallu Kallu', '+46789876600', 'sallu@kmail.com', 'Lindsblomsvagen 98, LGH 1205', '2013-06-30 19:12:57', '0000-00-00 00:00:00'),
(8, 109, 104, 'Sharup Barua', '+467898766', 'taher@tech.com', ' Kungsangen 18TR ', '2013-08-31 16:00:04', '2013-09-11 23:33:44'),
(9, 109, 104, 'Ulluka Pathha', '+46767459847', 'sharup@yahoo.com', ' Pakistan-Gulistan', '2013-08-31 16:00:29', '0000-00-00 00:00:00'),
(10, 109, 104, 'abu taher Mia', '+46767459847', 'sallu@kmail.com', ' ', '2013-08-31 16:03:07', '0000-00-00 00:00:00'),
(11, 7, 7, 'asddsadsa', '070070', 'adsasdsadads@asd.se', 'asdasdsdaads  ', '2014-05-15 18:25:51', '2014-05-15 16:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `org_previlige`
--

CREATE TABLE IF NOT EXISTS `org_previlige` (
`id` bigint(11) NOT NULL,
  `org_id` bigint(100) NOT NULL,
  `mainboard_access_main` tinyint(1) NOT NULL DEFAULT '1',
  `mainboard_send_proposal` tinyint(1) NOT NULL DEFAULT '1',
  `mainboard_change_article` tinyint(1) NOT NULL DEFAULT '1',
  `mainboard_send_notification` tinyint(1) DEFAULT '0',
  `mainboard_sending_out` tinyint(1) DEFAULT '0',
  `mainboard_manually_archive` tinyint(1) DEFAULT '0',
  `forum_access` tinyint(1) NOT NULL DEFAULT '1',
  `forum_comments` tinyint(1) NOT NULL DEFAULT '1',
  `forum_delete_won_comments` tinyint(1) NOT NULL DEFAULT '1',
  `forum_delete_any_coments` tinyint(1) DEFAULT '0',
  `forum_manually_archive_comments` tinyint(1) DEFAULT '0',
  `member_login_logout` tinyint(1) NOT NULL DEFAULT '1',
  `member_change_profile` tinyint(1) NOT NULL DEFAULT '1',
  `member_change_password` tinyint(1) NOT NULL DEFAULT '1',
  `configuration_view_org` tinyint(1) NOT NULL DEFAULT '1',
  `configuration_change_org` tinyint(1) NOT NULL DEFAULT '1',
  `configuration_visibility` tinyint(1) DEFAULT '0',
  `configuration_switching` tinyint(1) DEFAULT '0',
  `configuration_create_address` tinyint(1) DEFAULT '0',
  `communication_send_email` tinyint(1) DEFAULT '0',
  `communication_send_sms` tinyint(1) DEFAULT '0',
  `communication_send_letters` tinyint(1) DEFAULT '0',
  `economics_register` tinyint(1) DEFAULT '0',
  `economics_send_payment` tinyint(1) DEFAULT '0',
  `economics_check_complete` tinyint(1) DEFAULT '0',
  `economics_watch_total_income` tinyint(1) DEFAULT '0',
  `economics_watch_total_cost` tinyint(1) DEFAULT '0',
  `economics_watch_statistics` tinyint(1) DEFAULT '0',
  `history_access_articles` tinyint(1) DEFAULT '0',
  `history_access_comments` tinyint(1) DEFAULT '0',
  `history_user_actions` tinyint(1) DEFAULT '0',
  `history_old_letters` tinyint(1) DEFAULT '0',
  `history_old_sms` tinyint(1) DEFAULT '0',
  `history_old_emails` tinyint(1) DEFAULT '0',
  `members_decide` tinyint(1) DEFAULT '0',
  `members_add_change` tinyint(1) DEFAULT '0',
  `members_c_group` tinyint(1) NOT NULL DEFAULT '1',
  `members_view_group` int(1) NOT NULL DEFAULT '1',
  `members_change_or_delete_group` int(1) NOT NULL DEFAULT '1',
  `members_add_group` tinyint(1) NOT NULL DEFAULT '1',
  `members_user_types` tinyint(1) DEFAULT '0',
  `members_add_usertype` tinyint(1) DEFAULT '0',
  `external_mainboard` tinyint(1) NOT NULL DEFAULT '0',
  `external_presentation` tinyint(1) NOT NULL DEFAULT '1',
  `access_faktura` int(1) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `org_previlige`
--

INSERT INTO `org_previlige` (`id`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manually_archive_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_view_group`, `members_change_or_delete_group`, `members_add_group`, `members_user_types`, `members_add_usertype`, `external_mainboard`, `external_presentation`, `access_faktura`, `add_date`, `update_date`) VALUES
(41, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2014-03-24 01:49:52', NULL),
(43, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, '2014-03-24 01:50:37', NULL),
(44, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2014-04-21 01:25:05', NULL),
(45, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2014-04-23 23:38:49', NULL),
(46, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2014-04-24 21:22:56', NULL),
(47, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2014-05-05 01:39:13', NULL),
(48, 16, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, '2015-03-07 14:16:41', NULL),
(49, 17, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, '2015-04-06 19:04:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_profile_previlize`
--

CREATE TABLE IF NOT EXISTS `org_profile_previlize` (
`id` int(11) NOT NULL,
  `org_id` int(100) NOT NULL,
  `org_number` int(10) NOT NULL,
  `org_name` int(10) NOT NULL,
  `first_name` int(10) NOT NULL,
  `last_name` int(10) NOT NULL,
  `org_primary_address` int(10) NOT NULL,
  `org_optional_address` int(10) NOT NULL,
  `description` int(10) NOT NULL,
  `org_type` int(10) NOT NULL,
  `address` int(10) NOT NULL,
  `package_name` int(10) NOT NULL,
  `no_of_member` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `area_name` int(10) NOT NULL,
  `org_phone` int(10) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` int(10) NOT NULL,
  `photo1` int(10) NOT NULL,
  `credit_card_info` int(10) NOT NULL,
  `card_no` int(10) NOT NULL,
  `expire_date` int(10) NOT NULL,
  `person_number` int(10) NOT NULL,
  `cvv2_no` int(10) NOT NULL,
  `name_on_card` int(10) NOT NULL,
  `bank_info` int(10) NOT NULL,
  `username` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `org_system_configuration`
--

CREATE TABLE IF NOT EXISTS `org_system_configuration` (
`org_system_conf_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `default_preffered_lang` varchar(256) NOT NULL,
  `name_for_customer_or_members` text NOT NULL,
  `custom_label1` text,
  `custom_label2` text,
  `custom_label3` text,
  `custom_label4` text,
  `custom_label5` text,
  `custom_label6` text,
  `custom_label7` text,
  `custom_label8` text,
  `custom_label9` text,
  `custom_label10` text,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `org_system_configuration`
--

INSERT INTO `org_system_configuration` (`org_system_conf_id`, `org_id`, `default_preffered_lang`, `name_for_customer_or_members`, `custom_label1`, `custom_label2`, `custom_label3`, `custom_label4`, `custom_label5`, `custom_label6`, `custom_label7`, `custom_label8`, `custom_label9`, `custom_label10`, `add_date`, `update_date`) VALUES
(1, 1, 'sv', 'members', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-21 01:31:23', '0000-00-00 00:00:00'),
(2, 2, 'sv', 'Guys', 'Skype', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-23 21:42:13', '2014-04-23 19:42:44'),
(3, 7, 'enguk', 'Douchebags', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-15 14:49:54', '2014-09-15 19:43:34'),
(4, 12, 'enguk', 'members', 'Test', 'Wzup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-05-28 20:04:08', '2014-05-28 18:05:13'),
(5, 16, 'enguk', 'Medlemmar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-09-01 15:25:53', '2014-09-01 13:26:06'),
(6, 17, 'sv', 'members', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-04-06 13:48:06', '0000-00-00 00:00:00'),
(7, 18, 'sv', 'members', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-13 15:03:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`id` bigint(12) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `no_of_member` int(50) NOT NULL,
  `duration` int(10) NOT NULL,
  `billing_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `letter_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sms_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `member_fee_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `full_package_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `per_sms_cost` decimal(10,2) NOT NULL,
  `per_letter_cost` decimal(10,2) NOT NULL,
  `allowed_sms_per_month` bigint(12) DEFAULT NULL,
  `allowed_letter_per_month` bigint(12) DEFAULT NULL,
  `per_invoice_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package_name`, `no_of_member`, `duration`, `billing_module_cost`, `letter_module_cost`, `sms_module_cost`, `member_fee_module_cost`, `full_package_cost`, `per_sms_cost`, `per_letter_cost`, `allowed_sms_per_month`, `allowed_letter_per_month`, `per_invoice_cost`, `admin_cost`, `currency_id`, `active`, `add_date`, `update_date`) VALUES
(1, 'Basic', 100, 12, '20.00', '40.00', '60.00', '80.00', '100.00', '15.00', '6.00', 1000, 1000, '2.00', '13.50', 9, 1, '0000-00-00 00:00:00', '2014-03-11 11:38:04'),
(3, 'Premium', 100, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, 1000, '2.00', '13.50', 12, 1, '0000-00-00 00:00:00', '2014-03-11 12:11:27'),
(4, 'Free Tier', 5, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, 1000, '2.00', '13.50', 9, 1, '0000-00-00 00:00:00', '2014-03-12 08:33:03'),
(5, 'Delux', 100, 12, '10.00', '20.00', '30.00', '50.00', '90.00', '15.00', '6.00', 1000, 1000, '2.00', '13.50', 5, 1, '2015-04-06 17:12:04', '2015-04-06 15:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `package_assigned_to_org_member`
--

CREATE TABLE IF NOT EXISTS `package_assigned_to_org_member` (
`package_assigned_id` bigint(12) NOT NULL,
  `org_id` bigint(12) NOT NULL,
  `mem_id` bigint(12) NOT NULL,
  `package_id` bigint(12) NOT NULL,
  `package_name` text NOT NULL,
  `used_module` text NOT NULL COMMENT 'Currently Which modules using by this organization',
  `no_of_member` int(50) NOT NULL,
  `total_registered_member` bigint(12) DEFAULT NULL,
  `duration` int(10) NOT NULL,
  `billing_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `letter_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sms_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `member_fee_module_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `full_package_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `per_sms_cost` decimal(10,2) NOT NULL,
  `per_letter_cost` decimal(10,2) NOT NULL,
  `allowed_sms_per_month` bigint(12) DEFAULT NULL,
  `total_sms_sent` bigint(12) DEFAULT NULL,
  `allowed_letter_per_month` bigint(12) DEFAULT NULL,
  `total_letter_sent` bigint(12) DEFAULT NULL,
  `per_invoice_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `admin_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency_name` text NOT NULL,
  `activation_date` text,
  `expire_date` text,
  `active` int(1) NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive',
  `ordered` int(1) NOT NULL DEFAULT '1' COMMENT '1= Just Ordered, 0= Order Process finished',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `package_assigned_to_org_member`
--

INSERT INTO `package_assigned_to_org_member` (`package_assigned_id`, `org_id`, `mem_id`, `package_id`, `package_name`, `used_module`, `no_of_member`, `total_registered_member`, `duration`, `billing_module_cost`, `letter_module_cost`, `sms_module_cost`, `member_fee_module_cost`, `full_package_cost`, `per_sms_cost`, `per_letter_cost`, `allowed_sms_per_month`, `total_sms_sent`, `allowed_letter_per_month`, `total_letter_sent`, `per_invoice_cost`, `admin_cost`, `currency_name`, `activation_date`, `expire_date`, `active`, `ordered`, `add_date`, `update_date`) VALUES
(23, 6, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-21 16:26:05'),
(22, 5, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-21 16:19:21'),
(21, 4, 0, 1, 'Basic', 'letter_module_cost|sms_module_cost', 100, NULL, 12, '20.00', '40.00', '60.00', '80.00', '0.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-21 10:17:53'),
(20, 3, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-21 10:10:50'),
(17, 3, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-20 15:45:39'),
(18, 1, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-20 15:54:27'),
(19, 2, 0, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-03-21 09:39:59'),
(24, 7, 7, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', '1395431646', '1426535646', 1, 0, '0000-00-00 00:00:00', '2014-03-21 19:23:17'),
(25, 8, 12, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 1, 0, '0000-00-00 00:00:00', '2014-03-26 11:51:28'),
(26, 9, 13, 1, 'Basic', 'billing_module_cost|letter_module_cost|sms_module_cost|member_fee_module_cost', 100, NULL, 12, '20.00', '40.00', '60.00', '80.00', '0.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', '1396054311', '1427158311', 1, 0, '0000-00-00 00:00:00', '2014-03-28 23:06:52'),
(27, 10, 14, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-07 01:45:29'),
(28, 11, 15, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-07 01:49:45'),
(29, 12, 16, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', '1397303808', '1428407808', 1, 0, '0000-00-00 00:00:00', '2014-04-12 11:55:42'),
(30, 12, 1, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 00:18:50'),
(31, 12, 1, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 00:26:13'),
(32, 12, 1, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 00:36:44'),
(33, 12, 1, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 00:49:32'),
(34, 12, 1, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 00:57:23'),
(35, 12, 27, 4, 'Free Tier', 'Free Tier', 5, NULL, 1, '0.00', '0.00', '20.00', '0.00', '10.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 01:03:29'),
(36, 12, 28, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-04-20 01:23:44'),
(37, 12, 32, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-05-04 21:41:33'),
(38, 12, 33, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', NULL, NULL, 0, 1, '0000-00-00 00:00:00', '2014-05-04 22:41:14'),
(39, 16, 42, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', '1409577863', '1440681863', 1, 0, '0000-00-00 00:00:00', '2014-09-01 13:23:36'),
(40, 17, 46, 3, 'Premium', 'Premium', 100, NULL, 12, '0.00', '0.00', '0.00', '0.00', '299.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'USD', '1428320605', '1459424605', 1, 0, '0000-00-00 00:00:00', '2015-04-06 11:42:58'),
(41, 18, 48, 1, 'Basic', 'billing_module_cost|letter_module_cost', 100, NULL, 12, '20.00', '40.00', '60.00', '80.00', '100.00', '15.00', '6.00', 1000, NULL, 1000, NULL, '2.00', '13.50', 'EUR', '1450018811', '1481122811', 1, 0, '0000-00-00 00:00:00', '2015-12-13 14:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` bigint(20) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8_bin
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
`id` int(11) NOT NULL,
  `send_from` varchar(100) NOT NULL,
  `send_to` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `send_by_email` int(20) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `post_tbl`
--

INSERT INTO `post_tbl` (`id`, `send_from`, `send_to`, `post_id`, `send_by_email`, `status`) VALUES
(47, '10', '10', '17', 1, 2),
(46, '10', '9', '17', 1, 2),
(45, '10', '8', '17', 1, 2),
(44, '10', '7', '17', 1, 2),
(43, '10', '5', '17', 1, 2),
(42, '10', '4', '17', 1, 2),
(41, '10', '3', '17', 1, 2),
(40, '3', '3', '15', 1, 1),
(39, '3', '9', '15', 1, 1),
(38, '3', '8', '15', 1, 1),
(37, '3', '7', '15', 1, 1),
(36, '3', '5', '15', 1, 1),
(48, '4', '3', '31', 1, 2),
(49, '4', '5', '31', 1, 2),
(50, '4', '7', '31', 1, 2),
(51, '4', '8', '31', 1, 2),
(52, '4', '9', '31', 1, 2),
(53, '4', '10', '31', 1, 2),
(54, '4', '11', '31', 1, 2),
(55, '4', '21', '31', 1, 2),
(56, '4', '22', '31', 1, 2),
(57, '4', '32', '31', 1, 2),
(58, '4', '4', '31', 1, 2),
(59, '4', '3', '32', 1, 2),
(60, '4', '5', '32', 1, 2),
(61, '4', '7', '32', 1, 2),
(62, '4', '8', '32', 1, 2),
(63, '4', '9', '32', 1, 2),
(64, '4', '10', '32', 1, 2),
(65, '4', '11', '32', 1, 2),
(66, '4', '21', '32', 1, 2),
(67, '4', '22', '32', 1, 2),
(68, '4', '32', '32', 1, 2),
(69, '4', '4', '32', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL
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
-- Table structure for table `signature`
--

CREATE TABLE IF NOT EXISTS `signature` (
`id` int(11) NOT NULL,
  `org_id` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `org_id`, `content`) VALUES
(3, '22', 'Rs_Me');

-- --------------------------------------------------------

--
-- Table structure for table `sms_backup`
--

CREATE TABLE IF NOT EXISTS `sms_backup` (
`id` int(11) NOT NULL,
  `sms_id` varchar(100) NOT NULL,
  `sms_content` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_contact_no` varchar(100) NOT NULL,
  `receiver_contact_no` varchar(100) NOT NULL,
  `sender_status` int(50) NOT NULL COMMENT '1=org , 2=member',
  `org_id` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '1=internal,2=external'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `sms_backup`
--

INSERT INTO `sms_backup` (`id`, `sms_id`, `sms_content`, `sender_name`, `sender_contact_no`, `receiver_contact_no`, `sender_status`, `org_id`, `receiver_name`, `sending_date`, `status`) VALUES
(131, '121', 'ddd', '3', '8801922686268', '8801922686268', 2, '22', '3', '2012-04-03', 1),
(130, '120', 's', '3', '8801922686268', '8801922686268', 2, '22', '7', '2012-04-03', 2),
(129, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '3', '2012-04-03', 1),
(128, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '22', '2012-04-03', 1),
(127, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '21', '2012-04-03', 1),
(126, '118', 'dddd', '22', '46707448223', '8801922686268', 1, '22', '5', '2012-04-03', 2),
(125, '', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '3', '2012-04-03', 1),
(124, '117', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '22', '2012-04-03', 1),
(123, '117', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '21', '2012-04-03', 1),
(132, '123', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-04-23', 2),
(133, '124', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-04-23', 2),
(134, '125', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '3', '2012-04-23', 1),
(135, '126', 'hellow', '22', 'rsociety', '8801673176511', 1, '22', '10', '2012-05-17', 2),
(136, '127', 'hellow', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-05-17', 2),
(137, '127', 'hellow', '22', 'rsociety', '3258788787', 1, '22', '6', '2012-05-17', 2),
(138, '127', 'hellow', '22', 'rsociety', '8801673176511', 1, '22', '10', '2012-05-17', 2),
(139, '128', 'Hi! Taher\n\nThis is testing...', '22', 'rsociety', '46767459847', 1, '22', '11', '2012-06-21', 2),
(140, '129', 'Hi!\n\nI am here', '22', 'rsocieti', '46767459847', 1, '22', '11', '2012-06-21', 2),
(141, '130', 'hi\n\nim testing...', '22', 'rsocieti', '46767459847', 1, '22', '12', '2012-06-26', 2),
(142, '131', 'Hi!\n\nFrom user end', '34', 'rsocieti', '767459847', 2, '22', '33', '2012-06-26', 1),
(143, '132', 'Hi!\n\nIt''s From Ekramian!', '34', 'Rs_Me', '767459847', 2, '22', '33', '2012-06-27', 1),
(144, '133', 'Hi!\n\nI am Ekramian', '34', 'Rs_Me', '+46767459847', 2, '22', '33', '2012-06-27', 1),
(145, '134', 'Hi! \n\nI am here', '34', 'Rs_Me', '46767459847', 2, '22', '12', '2012-06-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sms_request`
--

CREATE TABLE IF NOT EXISTS `sms_request` (
`id` int(11) NOT NULL,
  `sms_id` text NOT NULL,
  `sms_content` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_contact_no` varchar(100) NOT NULL,
  `receiver_contact_no` varchar(100) NOT NULL,
  `sender_status` int(50) NOT NULL COMMENT '1=org , 2=member',
  `org_id` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '1=internal,2=external'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `sms_request`
--

INSERT INTO `sms_request` (`id`, `sms_id`, `sms_content`, `sender_name`, `sender_contact_no`, `receiver_contact_no`, `sender_status`, `org_id`, `receiver_name`, `sending_date`, `status`) VALUES
(119, '', 'dfdf', '', '', '', 0, '', '', '', 0),
(118, '', 'dddd', '', '', '', 0, '', '', '', 0),
(117, '', 'welcome to association board', '', '', '', 0, '', '', '', 0),
(120, '', 's', '', '', '', 0, '', '', '', 0),
(121, '', 'ddd', '', '', '', 0, '', '', '', 0),
(122, '', 'hi', '', '', '', 0, '', '', '', 0),
(123, '', 'hi', '', '', '', 0, '', '', '', 0),
(124, '', 'hi', '', '', '', 0, '', '', '', 0),
(125, '', 'hi', '', '', '', 0, '', '', '', 0),
(126, '', 'hellow', '', '', '', 0, '', '', '', 0),
(127, '', 'hellow', '', '', '', 0, '', '', '', 0),
(128, '', 'Hi! Taher\n\nThis is testing...', '', '', '', 0, '', '', '', 0),
(129, '', 'Hi!\n\nI am here', '', '', '', 0, '', '', '', 0),
(130, '', 'hi\n\nim testing...', '', '', '', 0, '', '', '', 0),
(131, '', 'Hi!\n\nFrom user end', '', '', '', 0, '', '', '', 0),
(132, '', 'Hi!\n\nIt''s From Ekramian!', '', '', '', 0, '', '', '', 0),
(133, '', 'Hi!\n\nI am Ekramian', '', '', '', 0, '', '', '', 0),
(134, '', 'Hi! \n\nI am here', '', '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_letter`
--

CREATE TABLE IF NOT EXISTS `total_letter` (
`id` int(11) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `sender_name` int(100) NOT NULL,
  `no_of_letter` int(100) NOT NULL,
  `letter_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `status` int(10) NOT NULL COMMENT '1=member,2=org'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `total_letter`
--

INSERT INTO `total_letter` (`id`, `sending_date`, `sender_name`, `no_of_letter`, `letter_id`, `org_id`, `status`) VALUES
(52, '2012-08-03', 3, 1, 104, 6, 1),
(51, '2012-08-03', 0, 2, 103, 6, 2),
(50, '2012-08-03', 0, 2, 102, 6, 2),
(49, '2012-08-03', 3, 1, 101, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_sms`
--

CREATE TABLE IF NOT EXISTS `total_sms` (
`id` int(11) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `sender_name` int(100) NOT NULL,
  `no_of_sms` int(100) NOT NULL,
  `sms_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `status` int(10) NOT NULL COMMENT '1=member,2=org'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `total_sms`
--

INSERT INTO `total_sms` (`id`, `sending_date`, `sender_name`, `no_of_sms`, `sms_id`, `org_id`, `status`) VALUES
(4, '2012-04-03', 0, 1, 118, 22, 2),
(3, '2012-04-03', 0, 3, 117, 22, 2),
(5, '2012-04-03', 3, 3, 119, 22, 1),
(6, '2012-04-03', 3, 1, 120, 22, 1),
(7, '2012-04-03', 3, 1, 121, 22, 1),
(8, '2012-04-23', 0, 1, 123, 22, 2),
(9, '2012-04-23', 0, 1, 124, 22, 2),
(10, '2012-04-23', 0, 1, 125, 22, 2),
(11, '2012-05-17', 0, 1, 126, 22, 2),
(12, '2012-05-17', 0, 3, 127, 22, 2),
(13, '2012-05-20', 3, 3, 0, 22, 1),
(14, '2012-06-21', 0, 1, 128, 22, 2),
(15, '2012-06-21', 0, 1, 129, 22, 2),
(16, '2012-06-26', 34, 1, 0, 22, 1),
(17, '2012-06-26', 34, 1, 0, 22, 1),
(18, '2012-06-26', 34, 1, 0, 22, 1),
(19, '2012-06-26', 34, 1, 0, 22, 1),
(20, '2012-06-26', 34, 1, 0, 22, 1),
(21, '2012-06-26', 0, 1, 130, 22, 2),
(22, '2012-06-26', 34, 1, 131, 22, 1),
(23, '2012-06-27', 34, 1, 132, 22, 1),
(24, '2012-06-27', 34, 1, 133, 22, 1),
(25, '2012-06-27', 34, 1, 134, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE IF NOT EXISTS `users_old` (
`id` bigint(20) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `name` varchar(300) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
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
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=41 ;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `role_id`, `name`, `last_name`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(40, 1, 'Hossain Khan', 'Khan', 'hossain', '0329f2f57c59b353e7441c236f84fc10', 'info@vaccit.se', 0, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2012-07-05 15:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_back`
--

CREATE TABLE IF NOT EXISTS `user_back` (
`id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
`id` int(11) NOT NULL,
  `org_number` int(100) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `org_primary_address` varchar(100) NOT NULL,
  `org_optional_address` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `org_category` int(40) NOT NULL,
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
  `person_number` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL,
  `cvv2_no` int(100) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_receive_by` tinyint(10) NOT NULL,
  `payment_status` tinyint(10) NOT NULL,
  `approval_status` tinyint(10) NOT NULL,
  `login_status` tinyint(10) NOT NULL,
  `previlige_status` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `org_number`, `org_name`, `first_name`, `last_name`, `org_primary_address`, `org_optional_address`, `description`, `org_category`, `role_id`, `address`, `package_name`, `payment_amount`, `area_name`, `phone_no`, `org_phone`, `email`, `photo1`, `credit_card_info`, `card_no`, `expire_date`, `person_number`, `flag`, `cvv2_no`, `name_on_card`, `bank_info`, `password`, `username`, `password_receive_by`, `payment_status`, `approval_status`, `login_status`, `previlige_status`) VALUES
(4, 450, 'VASSIT', 'abu', 'Taher', 'Adcbkcbscjds', '', 'wwfvwvwve', 21, 7, 'kbsbkksks', 31, 300, 31, '46727607048', '46727607048', 'tahersumonabu@gmail.com', '', '', '', '', '4433433', 0, 0, '', '', 'YWhtZWQxMjM0NTY3ODk=', 'ahmed', 1, 2, 2, 2, 2),
(5, 420, 'BTH', 'ABU', 'TAHER', 'acascsa', '', 'cascacaacca', 23, 7, 'scssgvsgsg', 30, 300, 32, '4564664', '2332324', 'tahersumonxabu@gmail.com', '', '', '', '', '342243', 0, 0, '', '', 'QUIxMDc4MTU3NjY2', 'taher', 1, 1, 2, 1, 0),
(6, 34, 'KTH', 'Elnaz', 'Ekramian', 'dvsdvvdvsdvs', 'sddvsd', 'asdasa', 0, 7, 'scaa', 37, 300, 32, '4564664', '2332324', 'dm_aiub@yahoo.com', '', '', '', '', '3352523', 0, 0, '', '', 'dGFoZXJAYnRoMTM=', 'elnaz', 1, 2, 2, 2, 2),
(7, 528, 'Annebo', 'abu', 'taher', 'scascs', 'dcsccs', 'dfdfdfffffffffffffffffffffffff', 0, 7, 'fd df d', 30, 3, 0, '24422', '32322', 'tahersumonabdddu@gmail.com', '', '', '33232', '2012-08-10', '2222', 0, 34343, '3433', '', 'YWIxMjA5ODY3MzQ0', 'rajuchora', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE IF NOT EXISTS `user_temp` (
`id` bigint(20) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
`id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `org_id` int(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `org_id`) VALUES
(4, 'Anonyms', 22),
(5, 'Administrative', 22),
(6, 'Software', 22),
(8, 'Admin', 1),
(9, 'Soft', 4),
(10, 'Normal', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_list`
--
ALTER TABLE `address_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_communicate_org_email`
--
ALTER TABLE `admin_communicate_org_email`
 ADD PRIMARY KEY (`communication_id`);

--
-- Indexes for table `admin_communicate_org_letter`
--
ALTER TABLE `admin_communicate_org_letter`
 ADD PRIMARY KEY (`letter_id`);

--
-- Indexes for table `admin_communicate_org_sms`
--
ALTER TABLE `admin_communicate_org_sms`
 ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_previlize`
--
ALTER TABLE `admin_user_previlize`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_types`
--
ALTER TABLE `admin_user_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_article`
--
ALTER TABLE `archive_article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
 ADD PRIMARY KEY (`art_cat_id`);

--
-- Indexes for table `article_comment`
--
ALTER TABLE `article_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_faktura`
--
ALTER TABLE `bill_faktura`
 ADD PRIMARY KEY (`fak_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_on_article_tbl`
--
ALTER TABLE `comment_on_article_tbl`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `comment_on_article_tbl_organization_id_fk` (`organization_id`), ADD KEY `comment_on_article_tbl_article_id_fk` (`article_id`), ADD KEY `comment_on_article_tbl_comment_on_member_id_fk` (`comment_on_member_id`), ADD KEY `comment_on_article_tbl_comment_member_id_fk` (`comment_member_id`);

--
-- Indexes for table `comment_on_forum_topic`
--
ALTER TABLE `comment_on_forum_topic`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_on_forum_topic_archieve`
--
ALTER TABLE `comment_on_forum_topic_archieve`
 ADD PRIMARY KEY (`archieve_comment_id`);

--
-- Indexes for table `comment_on_main_board_article_archieve`
--
ALTER TABLE `comment_on_main_board_article_archieve`
 ADD PRIMARY KEY (`archieve_comment_id`);

--
-- Indexes for table `comment_on_main_board_article_tbl`
--
ALTER TABLE `comment_on_main_board_article_tbl`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_with_site_admin`
--
ALTER TABLE `contact_with_site_admin`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_faktura`
--
ALTER TABLE `custom_faktura`
 ADD PRIMARY KEY (`custom_faktura_id`);

--
-- Indexes for table `custom_faktura_assigned_product`
--
ALTER TABLE `custom_faktura_assigned_product`
 ADD PRIMARY KEY (`custom_faktura_assigned_product_id`);

--
-- Indexes for table `custom_faktura_customer`
--
ALTER TABLE `custom_faktura_customer`
 ADD PRIMARY KEY (`faktura_customer_id`);

--
-- Indexes for table `custom_faktura_products`
--
ALTER TABLE `custom_faktura_products`
 ADD PRIMARY KEY (`faktura_product_id`);

--
-- Indexes for table `custom_faktura_settings`
--
ALTER TABLE `custom_faktura_settings`
 ADD PRIMARY KEY (`fak_settings_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
 ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `forum_archieve`
--
ALTER TABLE `forum_archieve`
 ADD PRIMARY KEY (`archieve_topic_id`);

--
-- Indexes for table `forum_comment`
--
ALTER TABLE `forum_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_archive`
--
ALTER TABLE `letter_archive`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_footer`
--
ALTER TABLE `letter_footer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_header`
--
ALTER TABLE `letter_header`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_send_request`
--
ALTER TABLE `letter_send_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_board_article`
--
ALTER TABLE `main_board_article`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `main_board_article_archieve`
--
ALTER TABLE `main_board_article_archieve`
 ADD PRIMARY KEY (`archieve_article_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `member_assigned_to_groups`
--
ALTER TABLE `member_assigned_to_groups`
 ADD PRIMARY KEY (`matg_id`);

--
-- Indexes for table `member_common_profile`
--
ALTER TABLE `member_common_profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_communicate_member_email`
--
ALTER TABLE `member_communicate_member_email`
 ADD PRIMARY KEY (`communication_id`);

--
-- Indexes for table `member_communicate_member_letter`
--
ALTER TABLE `member_communicate_member_letter`
 ADD PRIMARY KEY (`letter_id`);

--
-- Indexes for table `member_communicate_member_sms`
--
ALTER TABLE `member_communicate_member_sms`
 ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `member_old`
--
ALTER TABLE `member_old`
 ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `member_post_back`
--
ALTER TABLE `member_post_back`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_previlige_backup`
--
ALTER TABLE `member_previlige_backup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_profile_settings_by_admin`
--
ALTER TABLE `member_profile_settings_by_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_profile_settings_by_member`
--
ALTER TABLE `member_profile_settings_by_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_info`
--
ALTER TABLE `organization_info`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `org_number` (`org_number`,`org_name`);

--
-- Indexes for table `org_billing_failure`
--
ALTER TABLE `org_billing_failure`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_billing_info`
--
ALTER TABLE `org_billing_info`
 ADD PRIMARY KEY (`org_bill_id`);

--
-- Indexes for table `org_billing_success`
--
ALTER TABLE `org_billing_success`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_category`
--
ALTER TABLE `org_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_cost`
--
ALTER TABLE `org_cost`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_external_previlige`
--
ALTER TABLE `org_external_previlige`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_group`
--
ALTER TABLE `org_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_member`
--
ALTER TABLE `org_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_member_groups`
--
ALTER TABLE `org_member_groups`
 ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `org_member_letter`
--
ALTER TABLE `org_member_letter`
 ADD PRIMARY KEY (`letter_id`);

--
-- Indexes for table `org_member_previlige`
--
ALTER TABLE `org_member_previlige`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_member_sms`
--
ALTER TABLE `org_member_sms`
 ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `org_member_type`
--
ALTER TABLE `org_member_type`
 ADD PRIMARY KEY (`mem_type_id`);

--
-- Indexes for table `org_mem_external_contact`
--
ALTER TABLE `org_mem_external_contact`
 ADD PRIMARY KEY (`ext_contact_id`);

--
-- Indexes for table `org_previlige`
--
ALTER TABLE `org_previlige`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_profile_previlize`
--
ALTER TABLE `org_profile_previlize`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_system_configuration`
--
ALTER TABLE `org_system_configuration`
 ADD PRIMARY KEY (`org_system_conf_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_assigned_to_org_member`
--
ALTER TABLE `package_assigned_to_org_member`
 ADD PRIMARY KEY (`package_assigned_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `roles_permissions_FK` (`role_id`);

--
-- Indexes for table `post_tbl`
--
ALTER TABLE `post_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_backup`
--
ALTER TABLE `sms_backup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_request`
--
ALTER TABLE `sms_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_letter`
--
ALTER TABLE `total_letter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_sms`
--
ALTER TABLE `total_sms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_old`
--
ALTER TABLE `users_old`
 ADD PRIMARY KEY (`id`), ADD KEY `roles_users_FK` (`role_id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_back`
--
ALTER TABLE `user_back`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_temp`
--
ALTER TABLE `user_temp`
 ADD PRIMARY KEY (`id`), ADD KEY `roles_usertemp_FK` (`role_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_list`
--
ALTER TABLE `address_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admin_communicate_org_email`
--
ALTER TABLE `admin_communicate_org_email`
MODIFY `communication_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `admin_communicate_org_letter`
--
ALTER TABLE `admin_communicate_org_letter`
MODIFY `letter_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `admin_communicate_org_sms`
--
ALTER TABLE `admin_communicate_org_sms`
MODIFY `sms_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `admin_user_previlize`
--
ALTER TABLE `admin_user_previlize`
MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin_user_types`
--
ALTER TABLE `admin_user_types`
MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `archive_article`
--
ALTER TABLE `archive_article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
MODIFY `art_cat_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article_comment`
--
ALTER TABLE `article_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `bill_faktura`
--
ALTER TABLE `bill_faktura`
MODIFY `fak_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comment_on_article_tbl`
--
ALTER TABLE `comment_on_article_tbl`
MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_on_forum_topic`
--
ALTER TABLE `comment_on_forum_topic`
MODIFY `comment_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `comment_on_forum_topic_archieve`
--
ALTER TABLE `comment_on_forum_topic_archieve`
MODIFY `archieve_comment_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comment_on_main_board_article_archieve`
--
ALTER TABLE `comment_on_main_board_article_archieve`
MODIFY `archieve_comment_id` bigint(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_on_main_board_article_tbl`
--
ALTER TABLE `comment_on_main_board_article_tbl`
MODIFY `comment_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contact_with_site_admin`
--
ALTER TABLE `contact_with_site_admin`
MODIFY `contact_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `custom_faktura`
--
ALTER TABLE `custom_faktura`
MODIFY `custom_faktura_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `custom_faktura_assigned_product`
--
ALTER TABLE `custom_faktura_assigned_product`
MODIFY `custom_faktura_assigned_product_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `custom_faktura_customer`
--
ALTER TABLE `custom_faktura_customer`
MODIFY `faktura_customer_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `custom_faktura_products`
--
ALTER TABLE `custom_faktura_products`
MODIFY `faktura_product_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `custom_faktura_settings`
--
ALTER TABLE `custom_faktura_settings`
MODIFY `fak_settings_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
MODIFY `topic_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `forum_archieve`
--
ALTER TABLE `forum_archieve`
MODIFY `archieve_topic_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `letter_archive`
--
ALTER TABLE `letter_archive`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `letter_footer`
--
ALTER TABLE `letter_footer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `letter_header`
--
ALTER TABLE `letter_header`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `letter_send_request`
--
ALTER TABLE `letter_send_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=447;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_board_article`
--
ALTER TABLE `main_board_article`
MODIFY `article_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `main_board_article_archieve`
--
ALTER TABLE `main_board_article_archieve`
MODIFY `archieve_article_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `mem_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `member_assigned_to_groups`
--
ALTER TABLE `member_assigned_to_groups`
MODIFY `matg_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `member_common_profile`
--
ALTER TABLE `member_common_profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `member_communicate_member_email`
--
ALTER TABLE `member_communicate_member_email`
MODIFY `communication_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `member_communicate_member_letter`
--
ALTER TABLE `member_communicate_member_letter`
MODIFY `letter_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `member_communicate_member_sms`
--
ALTER TABLE `member_communicate_member_sms`
MODIFY `sms_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `member_old`
--
ALTER TABLE `member_old`
MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `member_post_back`
--
ALTER TABLE `member_post_back`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `member_previlige_backup`
--
ALTER TABLE `member_previlige_backup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member_profile_settings_by_admin`
--
ALTER TABLE `member_profile_settings_by_admin`
MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member_profile_settings_by_member`
--
ALTER TABLE `member_profile_settings_by_member`
MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `organization_info`
--
ALTER TABLE `organization_info`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `org_billing_failure`
--
ALTER TABLE `org_billing_failure`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `org_billing_info`
--
ALTER TABLE `org_billing_info`
MODIFY `org_bill_id` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `org_billing_success`
--
ALTER TABLE `org_billing_success`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `org_category`
--
ALTER TABLE `org_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `org_cost`
--
ALTER TABLE `org_cost`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `org_external_previlige`
--
ALTER TABLE `org_external_previlige`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `org_group`
--
ALTER TABLE `org_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `org_member`
--
ALTER TABLE `org_member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `org_member_groups`
--
ALTER TABLE `org_member_groups`
MODIFY `group_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `org_member_letter`
--
ALTER TABLE `org_member_letter`
MODIFY `letter_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `org_member_previlige`
--
ALTER TABLE `org_member_previlige`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `org_member_sms`
--
ALTER TABLE `org_member_sms`
MODIFY `sms_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `org_member_type`
--
ALTER TABLE `org_member_type`
MODIFY `mem_type_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `org_mem_external_contact`
--
ALTER TABLE `org_mem_external_contact`
MODIFY `ext_contact_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `org_previlige`
--
ALTER TABLE `org_previlige`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `org_profile_previlize`
--
ALTER TABLE `org_profile_previlize`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `org_system_configuration`
--
ALTER TABLE `org_system_configuration`
MODIFY `org_system_conf_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `package_assigned_to_org_member`
--
ALTER TABLE `package_assigned_to_org_member`
MODIFY `package_assigned_id` bigint(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_tbl`
--
ALTER TABLE `post_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sms_backup`
--
ALTER TABLE `sms_backup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `sms_request`
--
ALTER TABLE `sms_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `total_letter`
--
ALTER TABLE `total_letter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `total_sms`
--
ALTER TABLE `total_sms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_old`
--
ALTER TABLE `users_old`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_back`
--
ALTER TABLE `user_back`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_temp`
--
ALTER TABLE `user_temp`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
