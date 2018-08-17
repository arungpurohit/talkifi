-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2018 at 10:48 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addevent`
--

CREATE TABLE IF NOT EXISTS `addevent` (
  `addevent_id` int(20) NOT NULL AUTO_INCREMENT,
  `what` varchar(255) NOT NULL,
  `start_date` varchar(45) NOT NULL,
  `start_hour` varchar(45) NOT NULL,
  `start_minute` varchar(45) NOT NULL,
  `startam/pm` varchar(45) NOT NULL,
  `end_date` varchar(45) NOT NULL,
  `end_hour` varchar(45) NOT NULL,
  `end_minute` varchar(45) NOT NULL,
  `end_am/pm` varchar(45) NOT NULL,
  `backg_color` varchar(45) NOT NULL,
  `text_color` varchar(45) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`addevent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `addevent`
--


-- --------------------------------------------------------

--
-- Table structure for table `adevents`
--

CREATE TABLE IF NOT EXISTS `adevents` (
  `adevent_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `start_date` varchar(45) NOT NULL,
  `end_date` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `webaddress` varchar(45) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`adevent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `adevents`
--


-- --------------------------------------------------------

--
-- Table structure for table `autoresponder`
--

CREATE TABLE IF NOT EXISTS `autoresponder` (
  `autoresponder_id` int(15) NOT NULL AUTO_INCREMENT,
  `autoresponder_name` varchar(50) NOT NULL,
  `autoresponder_subject` varchar(255) NOT NULL,
  `autoresponder_body` text NOT NULL,
  `autoresponder_created_date` varchar(255) NOT NULL,
  `autoresponder_created_by` int(10) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`autoresponder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `autoresponder`
--

INSERT INTO `autoresponder` (`autoresponder_id`, `autoresponder_name`, `autoresponder_subject`, `autoresponder_body`, `autoresponder_created_date`, `autoresponder_created_by`, `cmp_unique_id`) VALUES
(1, 'welcome', 'Welcome to CompanyName', '<p>Dear FirstName,</p>\n<p>Welcome to our company CompanyName,</p>\n<p>&nbsp;</p>\n<p>Thanks and Regards,</p>\n<p>RepName,</p>\n<p>CompanyName</p>', '1371712509', 1, 'adcs123'),
(2, 'Thank you', 'auto responder', '<p>test</p>', '1372930899', 1, 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `autorespondersms`
--

CREATE TABLE IF NOT EXISTS `autorespondersms` (
  `autorespondersms_id` int(15) NOT NULL AUTO_INCREMENT,
  `autorespondersms_name` varchar(50) NOT NULL,
  `autorespondersms_subject` varchar(255) NOT NULL,
  `autorespondersms_body` text NOT NULL,
  `autorespondersms_created_by` varchar(10) NOT NULL,
  `autorespondersms_created_date` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`autorespondersms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `autorespondersms`
--

INSERT INTO `autorespondersms` (`autorespondersms_id`, `autorespondersms_name`, `autorespondersms_subject`, `autorespondersms_body`, `autorespondersms_created_by`, `autorespondersms_created_date`, `cmp_unique_id`) VALUES
(1, 'prabhakara', 'welcome to techflyte', '<p>hello sir........</p>', '1', '1373355106', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e072caca90a3322f569834399fc59d22', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1500477159, 'a:2:{s:9:"user_data";s:0:"";s:17:"flash:old:message";s:30:"<p>Logged Out Successfully</p>";}'),
('51ef1e85bca3ae6402908b2ef11d7378', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1500552388, '');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_username` varchar(255) DEFAULT NULL,
  `client_password` varchar(45) DEFAULT 'password',
  `client_fname` varchar(255) DEFAULT NULL,
  `client_lname` varchar(45) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `client_group_id` int(11) DEFAULT NULL,
  `client_creation_date` varchar(45) DEFAULT NULL,
  `client_modification_date` varchar(45) DEFAULT NULL,
  `client_created_by` varchar(45) DEFAULT NULL,
  `client_created_via` int(11) DEFAULT NULL,
  `client_merge_id` int(11) DEFAULT NULL,
  `client_updated_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `client_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  KEY `cmp_client_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_username`, `client_password`, `client_fname`, `client_lname`, `client_email`, `client_phone`, `cmp_unique_id`, `client_group_id`, `client_creation_date`, `client_modification_date`, `client_created_by`, `client_created_via`, `client_merge_id`, `client_updated_flag`, `client_status`) VALUES
(1, 'prabhu', 'prabhu', 'prabhu', 'kar', 'prabhuu@talkifi.com', '9080808033', 'adcs123', NULL, '1374049213', NULL, NULL, 1, NULL, 'Y', NULL),
(2, '918884111615', 'password', NULL, NULL, NULL, '918884111615', 'adcs123', NULL, '1374054558', NULL, NULL, 2, NULL, 'N', NULL),
(3, '9845064027', 'password', NULL, NULL, NULL, '9845064027', 'adcs123', NULL, '1374054862', NULL, NULL, 2, NULL, 'N', NULL),
(4, 'siri', 'siri', 'SIRI', 'Simha', 'siri@gmail.com', '9880694144', 'adcs123', NULL, '1416920049', NULL, NULL, NULL, NULL, 'Y', NULL),
(5, 'subramanya', 'iii', 'subramanya', 'subramanya', 'subramanya.smg@gmail.com', '9880694144', 'f13e1b7ac393b4a91c9f', NULL, '1420368883', NULL, NULL, NULL, NULL, 'Y', NULL),
(6, 'praveen@gmail.com', 'password', 'praveen', 'p', 'praveen@gmail.com', '5', '8741b1904b6660235097', NULL, '1434796661', NULL, NULL, NULL, NULL, 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `ccmp_id` int(15) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(15) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `contactemail` varchar(50) NOT NULL,
  `contactphone` varchar(25) NOT NULL,
  `referred` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `cpass` varchar(25) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `noofusers` varchar(10) NOT NULL,
  `nooftelephonyusers` varchar(10) NOT NULL,
  `cmp_unique_id` varchar(255) NOT NULL,
  PRIMARY KEY (`ccmp_id`),
  KEY `company_name` (`company_name`),
  KEY `company_name_2` (`company_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ccmp_id`, `company_name`, `address`, `city`, `state`, `zip`, `phone`, `contactperson`, `contactemail`, `contactphone`, `referred`, `pass`, `cpass`, `industry`, `noofusers`, `nooftelephonyusers`, `cmp_unique_id`) VALUES
(1, 'ashwini travels', '23 , 9th cross , rt nagar , bangalore-566032', 'bangalore', 'KA', 560032, '123456789', 'ashwini', 'rajaraniadekins@gmail.com', '123456789', 'VJ', 'raja', 'raja', 'travels', '2', '3', 'cf7e4f36023cb9f9cb6b'),
(2, 'Talkifi', 'Talkifi .Bangalore\n  hebbal', 'Bangalore', 'KA', 560032, '9845064027', 'vijay kumar', 'vijay@talkifi.com', '9845064027', 'VJ', '99025458', '99025458', 'software', '3', '3', '45409653944da15ee832'),
(3, 'Rangesh enterpraises', 'Bangalore cholanagar', 'Bangalore', 'KA', 560032, '9845064027', 'kumar', 'kumar@rangesh.com', '9845064027', 'VJ', '99025458', '99025458', 'services', '4', '3', '173dbb5a2bc82a623c8b'),
(4, 'NISARGA TRADERS', '112, CHINTHAMANI MAIN ROAD, KOLAR', 'CHITHAMANI', 'KA', 560012, '9916573687', 'RAJESH', 'RAJESH@TALKIFI.COM', '9916573687', 'VJ', 'talkifi', 'talkifi', 'TRADERS', '4', '4', 'f2b233fa9d80a8cbbb1f'),
(5, 'ambhag technologies', 'bangalore', 'bangalore', 'KA', 560032, '9964319141', 'rohan', 'rohan@gmail.com', '9964319141', 'VJ', 'password', 'password', 'jewellary', '4', '3', 'f13e1b7ac393b4a91c9f'),
(7, 'SIRI', 'banglore', 'banglore', 'KA', 560032, '98012365479', 'prabhu', 'prabhu@gmail.com', '4569871230', 'VJ', 'password', 'password', 'software', '4', '4', '498809745ad381e28cb8');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `company_address` varchar(45) DEFAULT NULL,
  `company_state` varchar(45) DEFAULT NULL,
  `company_city` varchar(45) DEFAULT NULL,
  `company_zip` varchar(45) DEFAULT NULL,
  `company_phone` varchar(15) DEFAULT NULL,
  `company_fax` varchar(45) DEFAULT NULL,
  `company_contact_person` varchar(45) DEFAULT NULL,
  `company_contact_phone` varchar(45) DEFAULT NULL,
  `company_contact_email` varchar(255) NOT NULL,
  `company_starting_date` char(30) NOT NULL,
  `company_modification_date` char(30) NOT NULL,
  `company_mini_logo` varchar(255) NOT NULL,
  `company_medium_logo` varchar(255) NOT NULL,
  `modules_purchased` text NOT NULL,
  `active_status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `cmp_unique_id_UNIQUE` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `cmp_unique_id`, `company_name`, `company_address`, `company_state`, `company_city`, `company_zip`, `company_phone`, `company_fax`, `company_contact_person`, `company_contact_phone`, `company_contact_email`, `company_starting_date`, `company_modification_date`, `company_mini_logo`, `company_medium_logo`, `modules_purchased`, `active_status`) VALUES
(1, 'adcs123', 'Rangesh Enterprises', 'banglore hebbal', 'karnataka', 'Bangalore', '560035551', '8884111615', '22336615', 'Rajesh', '9845064027', 'rajesh@talkifi.com', '15/07/2013', '12/07/2013', 'talkifi6.png', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Repreports:Autoresponder:Emails:Emaillist:Graphs:Repreports:Autorespondersms:client_upload:', 1),
(2, 'cf7e4f36023cb9f9cb6b', 'ashwini travels', '23 , 9th cross , rt nagar , bangalore-566032', 'KA', 'bangalore', '560032', '123456789', NULL, 'ashwini', '123456789', 'rajaraniadekins@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1),
(3, '45409653944da15ee832', 'Talkifi', 'Talkifi .Bangalore\n  hebbal', 'KA', 'Bangalore', '560032', '9845064027', NULL, 'vijay kumar', '9845064027', 'vijay@talkifi.com', '15/07/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:Reps:Client_upload:', 1),
(4, '173dbb5a2bc82a623c8b', 'Rangesh enterpraises', 'Bangalore cholanagar', 'KA', 'Bangalore', '560032', '9845064027', NULL, 'kumar', '9845064027', 'kumar@rangesh.com', '15/07/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:Reps:Client_upload:', 1),
(5, 'f2b233fa9d80a8cbbb1f', 'NISARGA TRADERS', '112, CHINTHAMANI MAIN ROAD, KOLAR', 'KA', 'CHITHAMANI', '560012', '9916573687', NULL, 'RAJESH', '9916573687', 'RAJESH@TALKIFI.COM', '15/07/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Repreports:Emailconf:Autoresponder:Emails:Emaillist:Graphs:Repreports:Autorespondersms:Client_upload:', 1),
(6, 'f13e1b7ac393b4a91c9f', 'ambhag technologies', 'bangalore', 'KA', 'bangalore', '560032', '9964319141', NULL, 'rohan', '9964319141', 'rohan@gmail.com', '04/01/2015', '', '', '', '', 1),
(7, '8741b1904b6660235097', 'advaanz', 'banglore', 'KA', 'banglore', '560032', '98012365479', NULL, 'prabhu', '4569871230', 'prabhu@gmail.com', '19/06/2015', '', '', '', '', 1),
(8, '498809745ad381e28cb8', 'SIRI', 'banglore', 'KA', 'banglore', '560032', '98012365479', NULL, 'prabhu', '4569871230', 'prabhu@gmail.com', '20/06/2015', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE IF NOT EXISTS `corporates` (
  `corp_id` int(20) NOT NULL AUTO_INCREMENT,
  `corp_name` varchar(25) NOT NULL,
  `cmp_unique_id` varchar(25) NOT NULL,
  PRIMARY KEY (`corp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `corporates`
--


-- --------------------------------------------------------

--
-- Table structure for table `cti_event`
--

CREATE TABLE IF NOT EXISTS `cti_event` (
  `tbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_num` varchar(20) NOT NULL,
  `rep_num` varchar(20) NOT NULL,
  `b_sim` varchar(20) NOT NULL,
  `pri_no` varchar(20) NOT NULL,
  `ivrmenu` int(11) NOT NULL,
  `call_duration` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_of_insert` varchar(20) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `Event_done` int(11) NOT NULL,
  `creation_time` varchar(255) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `client_updated_flag` enum('Y','N') NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`tbl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cti_event`
--

INSERT INTO `cti_event` (`tbl_id`, `customer_num`, `rep_num`, `b_sim`, `pri_no`, `ivrmenu`, `call_duration`, `status`, `status_of_insert`, `unique_id`, `Event_done`, `creation_time`, `lead_id`, `client_updated_flag`, `cmp_unique_id`) VALUES
(1, '918884111615', '9620388336', '', '49257605', 1, '0', 'NOANSWER', '2', '1374045519.1', 2, '1374054558', 2, 'Y', 'adcs123'),
(2, '918884111615', '9620388336', '', '49257605', 1, '6', 'ANSWERED', '2', '1374045597.4', 3, '1374054636', 3, 'Y', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `email_conf`
--

CREATE TABLE IF NOT EXISTS `email_conf` (
  `email_conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_conf_emailaddr` varchar(45) DEFAULT NULL,
  `email_conf_emailid` varchar(45) DEFAULT NULL,
  `email_conf_emailpass` varchar(45) DEFAULT NULL,
  `email_conf_pop` varchar(255) DEFAULT NULL,
  `email_conf_emailport` int(11) DEFAULT NULL,
  `email_conf_emailserviceflag` varchar(45) DEFAULT NULL,
  `email_conf_last_downloaded` varchar(45) DEFAULT NULL,
  `email_conf_messageid` text,
  `email_status_id` int(11) NOT NULL,
  `email_types_id` varchar(11) NOT NULL,
  `email_channels_id` varchar(11) NOT NULL,
  `email_conf_categoryid` int(11) DEFAULT NULL,
  `email_conf_priorityid` int(11) DEFAULT NULL,
  `emai_conf_repgroupid` int(11) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email_conf_id`),
  UNIQUE KEY `email_conf_emailaddr_UNIQUE` (`email_conf_emailaddr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_conf`
--

INSERT INTO `email_conf` (`email_conf_id`, `email_conf_emailaddr`, `email_conf_emailid`, `email_conf_emailpass`, `email_conf_pop`, `email_conf_emailport`, `email_conf_emailserviceflag`, `email_conf_last_downloaded`, `email_conf_messageid`, `email_status_id`, `email_types_id`, `email_channels_id`, `email_conf_categoryid`, `email_conf_priorityid`, `emai_conf_repgroupid`, `cmp_unique_id`) VALUES
(1, 'rajaraniadekins@gmail.com', 'rajaraniadekins@gmail.com', 'rajaadekins', 'imap.gmail.com', 993, '/imap/ssl', NULL, '<CAO9Mczc+ujjZC9SGNp6oD+gh_77Q=VsH8YqS3ZP3Rf=CB0xsgg@mail.gmail.com><CNDlhfLS6rcCFbRKtAodfSsAAA@plus.google.com><CA+ZhQhyJPf8_yjJpHZiihCZ=ygKf3w4ejvwJWbRYyJPMpo-v6g@mail.gmail.com><CA+ZhQhxLACJoOfLGqXhzQzT33OBSRJxzb-CLBs7DQgULs_-DLg@mail.gmail.com><CA+ZhQhwAVE75tv7Ahq=jLjaBahJUvZAi3ffdmY-QqzSb8H4e2Q@mail.gmail.com>', 2, '2', '2', 2, 2, 3, 'cf7e4f36023cb9f9cb6b');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `page_perm` text NOT NULL,
  `category_perm` varchar(255) NOT NULL,
  `types_perm` varchar(255) NOT NULL,
  `priority_perm` varchar(255) NOT NULL,
  `status_perm` varchar(255) NOT NULL,
  `channels_perm` varchar(255) NOT NULL,
  `assign_perm` varchar(255) NOT NULL,
  `other_leads_view` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `page_perm`, `category_perm`, `types_perm`, `priority_perm`, `status_perm`, `channels_perm`, `assign_perm`, `other_leads_view`, `cmp_unique_id`) VALUES
(1, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Repreports:Emailconf:Autoresponder:Emails:Emaillist:Graphs:Repreports:Autorespondersms:Client_upload:Roleofemp:', '1,4,6,7', '1,3', '1,3', '1,3,4,5', '1,3,4,5,6', '1,2,5', '1,2', 'adcs123'),
(2, 'members', 'General User', 'Dashboard:Compose:Inbox:Sms:Company:Tasks:Roleofemp:', '1', '', '', '', '', '1', '1,2', 'adcs123'),
(3, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Repreports:Emailconf:Roleofemp:', '2', '2', '2', '2', '2', '3,4', '3,4', 'cf7e4f36023cb9f9cb6b'),
(4, 'rep role', '', 'Dashboard:Compose:Inbox:Sms:Clients:Roleofemp:', '2', '2', '2', '2', '2', '4', '4', 'cf7e4f36023cb9f9cb6b'),
(5, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:Reps:Client_upload:', '8', '4', '4', '8', '7', '7', '7', '45409653944da15ee832'),
(6, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:Reps:Client_upload:', '9', '5', '5', '9', '8', '8', '8', '173dbb5a2bc82a623c8b'),
(7, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:Reps:Client_upload:', '10', '6', '6', '10', '9', '9', '9', 'f2b233fa9d80a8cbbb1f'),
(8, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '11', '7', '7', '11', '10', '11', '11', 'f13e1b7ac393b4a91c9f'),
(9, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '12', '8', '8', '12', '11', '12', '12', '8741b1904b6660235097'),
(10, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '13', '9', '9', '13', '12', '14', '14', '498809745ad381e28cb8');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `lead_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_unique_id` int(11) DEFAULT NULL,
  `lead_creation_date` varchar(45) DEFAULT NULL,
  `lead_priority_id` int(11) DEFAULT NULL,
  `lead_type_id` int(11) DEFAULT NULL,
  `client_id` varchar(45) DEFAULT NULL,
  `lead_subject` varchar(255) NOT NULL,
  `lead_status_id` int(11) NOT NULL,
  `lead_category_id` int(11) NOT NULL,
  `lead_subcategory_id` int(11) NOT NULL,
  `lead_channel_id` int(11) NOT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `rep_id` int(11) DEFAULT NULL,
  `voice_path` varchar(255) NOT NULL,
  `lead_read_flag` enum('Y','N') DEFAULT NULL,
  `due_by` varchar(45) NOT NULL DEFAULT '1371686400',
  `flag` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lead_id`),
  KEY `cmp_lead_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `lead_unique_id`, `lead_creation_date`, `lead_priority_id`, `lead_type_id`, `client_id`, `lead_subject`, `lead_status_id`, `lead_category_id`, `lead_subcategory_id`, `lead_channel_id`, `cmp_unique_id`, `rep_id`, `voice_path`, `lead_read_flag`, `due_by`, `flag`) VALUES
(1, 1, '1374049226', 1, 1, '1', 'first lead', 1, 1, 0, 1, 'adcs123', 1, '', 'Y', '1374019200', 1),
(2, 2, '1374054558', 1, 1, '2', 'Enquiry from telphone', 1, 0, 0, 1, 'adcs123', 2, '', 'N', '1374054558', 1),
(3, 3, '1374054636', 1, 1, '2', 'Enquiry from telphone', 1, 0, 0, 1, 'adcs123', 2, '/var/www/html/RECORDINGS/asterisk_RECORDINGS/20130717/918884111615_1374045597.wav', 'N', '1374054636', 1),
(4, 4, '1374054862', 1, 1, '3', 'Enquiry from telphone', 1, 0, 0, 1, 'adcs123', 2, '', 'N', '1374054862', 1),
(5, 5, '1374054890', 1, 1, '3', 'Enquiry from telphone', 1, 0, 0, 1, 'adcs123', 2, '/var/www/html/RECORDINGS/asterisk_RECORDINGS/20130717/9845064027_1374045804.wav', 'N', '1374054890', 1),
(6, 6, '1374059180', 1, 1, '3', 'Enquiry from telphone', 1, 0, 0, 1, 'adcs123', 2, '', 'N', '1374059180', 1),
(7, 7, '1416489377', 1, 1, '1', 'test', 1, 1, 0, 1, 'adcs123', 1, '', 'Y', '1416438000', 1),
(8, 8, '1416920082', 1, 1, '4', 'test', 1, 1, 0, 1, 'adcs123', 1, '', 'Y', '1416870000', 1),
(9, 9, '1420123013', 1, 1, '3', 'dddddddddd', 1, 1, 0, 1, 'adcs123', 1, '', 'Y', '1420066800', 1),
(10, 1, '1420368986', 7, 7, '5', 'welcome', 11, 11, 0, 10, 'f13e1b7ac393b4a91c9f', 11, '', 'Y', '1420326000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lead_category`
--

CREATE TABLE IF NOT EXISTS `lead_category` (
  `lead_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_category_name` varchar(45) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `lead_primary_id` varchar(45) DEFAULT NULL,
  `category_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lead_category_id`),
  KEY `cmp_category_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lead_category`
--

INSERT INTO `lead_category` (`lead_category_id`, `lead_category_name`, `cmp_unique_id`, `lead_primary_id`, `category_status`) VALUES
(1, 'Residential', 'adcs123', NULL, 'Active'),
(2, 'HelpDesk', 'cf7e4f36023cb9f9cb6b', NULL, 'ACTIVE'),
(3, '2bhk', 'adcs123', '1', 'Active'),
(4, 'Land', 'adcs123', NULL, 'Active'),
(5, 'Conversion land', 'adcs123', '4', 'Active'),
(6, 'commerical', 'adcs123', NULL, 'Active'),
(7, 'Office spaced', 'adcs123', NULL, 'Active'),
(8, 'HelpDesk', '45409653944da15ee832', NULL, 'ACTIVE'),
(9, 'HelpDesk', '173dbb5a2bc82a623c8b', NULL, 'ACTIVE'),
(10, 'HelpDesk', 'f2b233fa9d80a8cbbb1f', NULL, 'ACTIVE'),
(11, 'HelpDesk', 'f13e1b7ac393b4a91c9f', NULL, 'ACTIVE'),
(12, 'HelpDesk', '8741b1904b6660235097', NULL, 'ACTIVE'),
(13, 'HelpDesk', '498809745ad381e28cb8', NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `lead_channels`
--

CREATE TABLE IF NOT EXISTS `lead_channels` (
  `lead_channel_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_channel_name` varchar(45) DEFAULT NULL,
  `lead_channel_color` varchar(45) DEFAULT NULL,
  `cmp_unique_id` varchar(45) DEFAULT NULL,
  `channel_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lead_channel_id`),
  KEY `cmp_channel_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lead_channels`
--

INSERT INTO `lead_channels` (`lead_channel_id`, `lead_channel_name`, `lead_channel_color`, `cmp_unique_id`, `channel_status`) VALUES
(1, 'Email', '#615273', 'adcs123', 'Active'),
(2, 'Voice', '#fff', 'cf7e4f36023cb9f9cb6b', 'ACTIVE'),
(3, 'Television ', '0', 'adcs123', 'Active'),
(4, 'Voice', '0', 'adcs123', 'Active'),
(5, 'Print Ad', '0', 'adcs123', 'Active'),
(6, 'Print add', '0', 'adcs123', 'Active'),
(7, 'Voice', '#fff', '45409653944da15ee832', 'ACTIVE'),
(8, 'Voice', '#fff', '173dbb5a2bc82a623c8b', 'ACTIVE'),
(9, 'Voice', '#fff', 'f2b233fa9d80a8cbbb1f', 'ACTIVE'),
(10, 'Voice', '#fff', 'f13e1b7ac393b4a91c9f', 'ACTIVE'),
(11, 'Voice', '#fff', '8741b1904b6660235097', 'ACTIVE'),
(12, 'Voice', '#fff', '498809745ad381e28cb8', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `lead_clients_threads`
--

CREATE TABLE IF NOT EXISTS `lead_clients_threads` (
  `lead_client_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_unique_id` int(11) DEFAULT NULL,
  `attach_flag` int(11) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `creation_date` varchar(45) DEFAULT NULL,
  `modification_date` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `msgBody` text NOT NULL,
  `lead_status_id` int(11) DEFAULT NULL,
  `lead_attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lead_client_thread_id`),
  KEY `cmp_clients_thread_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lead_clients_threads`
--


-- --------------------------------------------------------

--
-- Table structure for table `lead_priority`
--

CREATE TABLE IF NOT EXISTS `lead_priority` (
  `lead_priority_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_priority_name` varchar(45) DEFAULT NULL,
  `lead_priority_color` varchar(45) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `priority_status` varchar(45) NOT NULL,
  PRIMARY KEY (`lead_priority_id`),
  KEY `cmp_priority_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lead_priority`
--

INSERT INTO `lead_priority` (`lead_priority_id`, `lead_priority_name`, `lead_priority_color`, `cmp_unique_id`, `priority_status`) VALUES
(1, 'High', '#ffffff', 'adcs123', 'Active'),
(2, 'High', '#fff', 'cf7e4f36023cb9f9cb6b', 'ACTIVE'),
(3, 'low', '#000000', 'adcs123', 'Active'),
(4, 'High', '#fff', '45409653944da15ee832', 'ACTIVE'),
(5, 'High', '#fff', '173dbb5a2bc82a623c8b', 'ACTIVE'),
(6, 'High', '#fff', 'f2b233fa9d80a8cbbb1f', 'ACTIVE'),
(7, 'High', '#fff', 'f13e1b7ac393b4a91c9f', 'ACTIVE'),
(8, 'High', '#fff', '8741b1904b6660235097', 'ACTIVE'),
(9, 'High', '#fff', '498809745ad381e28cb8', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `lead_rep_threads`
--

CREATE TABLE IF NOT EXISTS `lead_rep_threads` (
  `lead_rep_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_unique_id` int(11) DEFAULT NULL,
  `attach_flag` int(11) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `creation_date` varchar(45) DEFAULT NULL,
  `modification_date` varchar(45) NOT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `msgBody` text NOT NULL,
  `lead_status_id` int(11) DEFAULT NULL,
  `lead_attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lead_rep_thread_id`),
  KEY `cmp_rep_thread_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lead_rep_threads`
--

INSERT INTO `lead_rep_threads` (`lead_rep_thread_id`, `lead_unique_id`, `attach_flag`, `cmp_unique_id`, `creation_date`, `modification_date`, `created_by`, `msgBody`, `lead_status_id`, `lead_attachment`) VALUES
(1, 1, 0, 'adcs123', '1374049226', '', '1', '<p>first lead</p>', 1, ''),
(2, 2, 0, 'adcs123', '1374054558', '', '2', 'Enquiry from telphone', 1, NULL),
(3, 3, 0, 'adcs123', '1374054636', '', '2', 'Enquiry from telphone', 1, NULL),
(4, 4, 0, 'adcs123', '1374054862', '', '2', 'Enquiry from telphone', 1, NULL),
(5, 5, 0, 'adcs123', '1374054890', '', '2', 'Enquiry from telphone', 1, NULL),
(6, 6, 0, 'adcs123', '1374059180', '', '2', 'Enquiry from telphone', 1, NULL),
(7, 7, 0, 'adcs123', '1416489377', '', '1', '<p>hello</p>', 1, ''),
(8, 8, 0, 'adcs123', '1416920082', '', '1', '<p>hi</p>', 1, ''),
(9, 9, 0, 'adcs123', '1420123013', '', '1', '<p>ddd</p>', 1, ''),
(10, 1, 0, 'f13e1b7ac393b4a91c9f', '1420368986', '', '11', '<p>sdger</p>', 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE IF NOT EXISTS `lead_status` (
  `lead_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_status_name` varchar(255) NOT NULL,
  `lead_status_type` varchar(45) DEFAULT NULL,
  `lead_status_color` varchar(45) DEFAULT NULL,
  `lead_status_rep_display` varchar(45) DEFAULT NULL,
  `lead_status_client_display` varchar(45) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`lead_status_id`),
  KEY `cmp_status_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`lead_status_id`, `lead_status_name`, `lead_status_type`, `lead_status_color`, `lead_status_rep_display`, `lead_status_client_display`, `cmp_unique_id`) VALUES
(1, 'Initial', 'Active', '#ffffff', 'Initial', 'Initial', 'adcs123'),
(2, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'cf7e4f36023cb9f9cb6b'),
(3, 'Fixed', 'Active', '#ffffff', 'Fixed', 'Fixed', 'adcs123'),
(4, 'Closed', 'Active', '0', 'Closed', 'Closed', 'adcs123'),
(5, 'Cancelled', 'Active', '0', 'Cancelled', 'Cancelled', 'adcs123'),
(6, 'Cancelledd', 'Active', '0', 'Cancelledd', 'Cancelledd', 'adcs123'),
(7, '', 'Active', '0', '', '', 'adcs123'),
(8, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '45409653944da15ee832'),
(9, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '173dbb5a2bc82a623c8b'),
(10, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'f2b233fa9d80a8cbbb1f'),
(11, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'f13e1b7ac393b4a91c9f'),
(12, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '8741b1904b6660235097'),
(13, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '498809745ad381e28cb8');

-- --------------------------------------------------------

--
-- Table structure for table `lead_types`
--

CREATE TABLE IF NOT EXISTS `lead_types` (
  `lead_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_type_name` varchar(45) DEFAULT NULL,
  `lead_type_color` varchar(45) DEFAULT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `types_status` varchar(45) NOT NULL,
  PRIMARY KEY (`lead_type_id`),
  KEY `lead_types_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lead_types`
--

INSERT INTO `lead_types` (`lead_type_id`, `lead_type_name`, `lead_type_color`, `cmp_unique_id`, `types_status`) VALUES
(1, 'Sale', '0', 'adcs123', 'Active'),
(2, 'Service', '#fff', 'cf7e4f36023cb9f9cb6b', 'ACTIVE'),
(3, 'Services', '0', 'adcs123', 'Active'),
(4, 'Service', '#fff', '45409653944da15ee832', 'ACTIVE'),
(5, 'Service', '#fff', '173dbb5a2bc82a623c8b', 'ACTIVE'),
(6, 'Service', '#fff', 'f2b233fa9d80a8cbbb1f', 'ACTIVE'),
(7, 'Service', '#fff', 'f13e1b7ac393b4a91c9f', 'ACTIVE'),
(8, 'Service', '#fff', '8741b1904b6660235097', 'ACTIVE'),
(9, 'Service', '#fff', '498809745ad381e28cb8', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `repsinfos`
--

CREATE TABLE IF NOT EXISTS `repsinfos` (
  `repsinfo_id` int(20) NOT NULL AUTO_INCREMENT,
  `repsinfo_username` varchar(45) NOT NULL,
  `repsinfo_password` varchar(45) NOT NULL,
  `repsinfo_fname` varchar(45) NOT NULL,
  `repsinfo_lname` varchar(45) NOT NULL,
  `repsinfo_email` varchar(45) NOT NULL,
  `repsinfo_phone` varchar(45) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  PRIMARY KEY (`repsinfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `repsinfos`
--


-- --------------------------------------------------------

--
-- Table structure for table `rep_notes`
--

CREATE TABLE IF NOT EXISTS `rep_notes` (
  `rep_notes_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_notes_created_date` varchar(45) DEFAULT NULL,
  `rep_notes_created_by` varchar(45) DEFAULT NULL,
  `rep_internal_note` text,
  `rep_external_note` text NOT NULL,
  `cmp_unique_id` varchar(20) DEFAULT NULL,
  `lead_unique_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rep_notes_id`),
  KEY `lead_unique_id_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rep_notes`
--

INSERT INTO `rep_notes` (`rep_notes_id`, `rep_notes_created_date`, `rep_notes_created_by`, `rep_internal_note`, `rep_external_note`, `cmp_unique_id`, `lead_unique_id`) VALUES
(1, '1371040763', '1', 'something to add', 'something more', 'adcs123', 1),
(2, '1371218548', '1', 'Hi this is new lead ', ' hot lead ', 'adcs123', 2),
(3, '1371825464', '1', '	hi ', 'hello ', 'adcs123', 13),
(4, '1371890383', '1', 'no use', '', 'adcs123', 3),
(5, '1371891742', '1', 'no use', '', 'adcs123', 8),
(6, '1371908919', '1', 'need to open this lead', '', 'adcs123', 3),
(7, '1371908995', '1', 'no use', '', 'adcs123', 13),
(8, '1371909050', '1', 'some imp', '', 'adcs123', 13),
(9, '1372139209', '1', 'this is internal Notes not to be viewed by others', 'this is external notes to be viewed by others', 'adcs123', 13),
(10, '1372590299', '1', 'by default', '', 'adcs123', 8),
(11, '1373007814', '1', '	hot lead', 'plse do assign to pradeep ', 'adcs123', 8),
(12, '1373037756', '1', 'checking again', 'yup checking again', 'adcs123', 8),
(13, '1373094680', '1', 'client was good , definitely needs a apparent ', 'follow must required ', 'adcs123', 9),
(14, '1373291366', '1', '	', '', 'adcs123', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sms_id` int(20) NOT NULL AUTO_INCREMENT,
  `mobile_numbers` varchar(45) NOT NULL,
  `sms_content` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  `smstemplate_name` varchar(45) NOT NULL,
  `newsms_content` varchar(255) NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `mobile_numbers`, `sms_content`, `cmp_unique_id`, `smstemplate_name`, `newsms_content`) VALUES
(1, '9686265006', 'adgg', 'adcs123', '0', '0'),
(2, '918884111615', 'fdgb', 'adcs123', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `IsAllDayEvent` smallint(6) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `RecurringRule` varchar(500) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(45) NOT NULL,
  `modified_date` varchar(45) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `assigned_group` int(11) NOT NULL,
  `reference_field` int(11) NOT NULL,
  `reference_value` varchar(255) NOT NULL,
  `reminder_via` int(11) NOT NULL,
  `reminder_when` varchar(255) NOT NULL,
  `event_status` smallint(2) NOT NULL DEFAULT '1',
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Id`, `Subject`, `Location`, `Description`, `StartTime`, `EndTime`, `IsAllDayEvent`, `Color`, `RecurringRule`, `created_by`, `created_date`, `modified_date`, `assigned_to`, `assigned_group`, `reference_field`, `reference_value`, `reminder_via`, `reminder_when`, `event_status`, `cmp_unique_id`) VALUES
(1, 'todayevent', 'testing event', 'testing event		', '2013-07-17 01:45:00', '2013-07-17 02:30:00', 1, '', '', 1, '1374047893', '', 0, 0, 0, '', 0, '', 1, 'adcs123'),
(2, 'appointment', 'vijay nagar', '	appointment at 10 o clock		', '2013-07-19 00:00:00', '2013-07-20 00:00:00', 1, '', '', 1, '1374144049', '', 1, 1, 2, '23', 0, '10', 1, 'adcs123'),
(3, 'call from event', '', '', '2014-12-30 01:00:00', '2014-12-30 02:00:00', 1, '', '', 1, '1420122854', '1420122960', 0, 2, 2, 'vinahy', 1, '5', 1, 'adcs123'),
(4, 'dee', '', '', '2015-05-21 01:30:00', '2015-05-21 04:30:00', 0, '', '', 1, '1432089700', '1432089703', 0, 0, 0, '', 0, '', 1, 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `temp_id` int(20) NOT NULL AUTO_INCREMENT,
  `smstemplate_name` varchar(45) NOT NULL,
  `newsms_content` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `template`
--


-- --------------------------------------------------------

--
-- Table structure for table `tfimodules`
--

CREATE TABLE IF NOT EXISTS `tfimodules` (
  `tfimodule_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `module_display_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`tfimodule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tfimodules`
--

INSERT INTO `tfimodules` (`tfimodule_id`, `module_name`, `module_display_name`, `description`) VALUES
(1, 'Dashboard', 'Dashboard', ''),
(2, 'Compose', 'Compose', ''),
(3, 'Inbox', 'Inbox', ''),
(4, 'Sms', 'SMS', ''),
(5, 'Reports', 'Reports', ''),
(6, 'Company', 'Company Details', ''),
(7, 'Tasks', 'Task and Reminder', ''),
(8, 'Category', 'Category Details', ''),
(9, 'Channel', 'Channels', ''),
(10, 'Types', 'Types', ''),
(11, 'Priority', 'Priority Details', ''),
(12, 'Status', 'Status Details', ''),
(13, 'Leadview', 'Update Lead', ''),
(14, 'Reps', 'Rep Details', ''),
(15, 'Clients', 'Client Details', ''),
(16, 'Repdashboard', 'Rep Dashboard', ''),
(17, 'Repreports', 'Rep Vs Status', ''),
(18, 'Emailconf', 'Email Configur', ''),
(19, 'Autoresponder', 'Auto Responder', ''),
(20, 'Emails', 'Email ', ''),
(21, 'Emaillist', 'Email List', ''),
(22, 'Graphs', 'Graphs', ''),
(23, 'Repreports', 'Rep Reports', ''),
(24, 'Autorespondersms', 'Auto Responder Sms', ''),
(25, 'Client_upload', 'Client Upload', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `mofication_date` varchar(45) NOT NULL,
  `created_via` varchar(45) NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `mofication_date`, `created_via`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `cmp_unique_id`) VALUES
(1, '\0\0', 'administrator', '2e69c096aefc60eda8e2d5750048c2be9e44f62b', '9462e8eee0', 'admin@admin.com', '', '0f0236258522386c710c8aa42e1d348df2da3cdd', 1371824896, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1268889823, '', '', 1500483943, 1, 'Admin', '', '', '9880694144', 'adcs123'),
(2, '', 'demo@talkify.com', '6f738b9c7b3def029cace28a58989032e209e261', '9462e8eee0', 'scoolmani@gmail.com', NULL, NULL, NULL, NULL, 1370951328, '', 'HD', 1373526929, 1, 'demouser', 'demouser', '', '9620388336', 'adcs123'),
(3, '', 'ashwini', 'b303e6c444171e7ea195e54cfce7969413227ab4', NULL, 'rajaraniadekins@gmail.com', NULL, NULL, NULL, NULL, 1371464149, '', 'HD', 1371474301, 1, 'ashwini', '', 'ashwini travels', '123456789', 'cf7e4f36023cb9f9cb6b'),
(4, '', 'abc@gmail.com', '90fc428ac4eac8c3e71a3b4b3f9bab7c6d5605d6', NULL, 'abc@gmail.com', NULL, NULL, NULL, NULL, 1371473469, '', 'HD', 1371474189, 1, 'abc', 'abc', '', '1212121212', 'cf7e4f36023cb9f9cb6b'),
(5, '', 'rep@rep.com', 'c383769c088ac06e78c97fa0c8f73837933f3883', NULL, 'rep@rep.com', NULL, NULL, NULL, NULL, 1372140042, '', 'HD', 1372140052, 1, 'repfname', 'replname', '', '9833444432', 'adcs123'),
(6, '', 'superadmin@talkifi.com', 'e5feaa97713ed64f303564d38e694cd3e5e0e510', NULL, 'superadmin@talkifi.com', NULL, NULL, NULL, NULL, 1373522078, '', 'HD', 1373890067, 1, 'superadmin', 'admin', '', '9008857075', 'adcs123'),
(7, '', 'vijay kumar', 'a1c96a25e7445e3304ebac043f62bbec5d93b16c', NULL, 'vijay@talkifi.com', NULL, NULL, NULL, NULL, 1373884661, '', 'HD', 1373891041, 1, 'vijay kumar', '', '', '9845064027', '45409653944da15ee832'),
(8, '', 'kumar', 'f1ed8b036e502055557ed8baac7555db02995b81', NULL, 'kumar@rangesh.com', NULL, NULL, NULL, NULL, 1373884840, '', 'HD', 1373888277, 1, 'kumar', '', 'Rangesh enterpraises', '9845064027', '173dbb5a2bc82a623c8b'),
(9, '', 'RAJESH', 'b60853ee49aad2bfae28d77a3f1274e4886de78b', NULL, 'RAJESH@TALKIFI.COM', NULL, NULL, NULL, NULL, 1373890479, '', 'HD', 1373893940, 1, 'RAJESH', '', 'NISARGA TRADERS', '9916573687', 'f2b233fa9d80a8cbbb1f'),
(10, '', 'siri@siri.com', 'd27c4089ff9303930c351f4a36dd7df9da26689f', NULL, 'siri@gmail.com', NULL, NULL, NULL, NULL, 1416919937, '', 'HD', 1416919937, 1, 'SIRI', 'Simha', '', '9880694144', 'adcs123'),
(11, '', 'rohan', '1142c9cd00515da1b51435ae068c7b1adfa6e846', NULL, 'rohan@gmail.com', NULL, NULL, NULL, NULL, 1420368759, '', 'HD', 1420475053, 1, 'rohan', '', 'ambhag technologies', '9964319141', 'f13e1b7ac393b4a91c9f'),
(14, '', 'prabhu', '4bb23f37b2b05c5f76d9024a3935faae6021d347', NULL, 'prabhu@gmail.com', NULL, NULL, NULL, NULL, 1434809276, '', 'HD', 1434809314, 1, 'prabhu', '', 'SIRI', '4569871230', '498809745ad381e28cb8'),
(15, '', 'ssss@gmail.com', 'e800b9b995a7daeab6408c0210c4402259d131d3', NULL, 'simha1@gmail.com', NULL, NULL, NULL, NULL, 1434809491, '', 'HD', 1434809491, 1, 'pppp', 'll', '', '989799446', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`, `cmp_unique_id`) VALUES
(1, 1, 1, 'adcs123'),
(2, 2, 2, 'adcs123'),
(3, 3, 3, 'cf7e4f36023cb9f9cb6b'),
(4, 4, 4, 'cf7e4f36023cb9f9cb6b'),
(5, 5, 2, 'adcs123'),
(6, 6, 1, 'adcs123'),
(7, 7, 5, '45409653944da15ee832'),
(8, 8, 6, '173dbb5a2bc82a623c8b'),
(9, 9, 7, 'f2b233fa9d80a8cbbb1f'),
(10, 11, 8, 'f13e1b7ac393b4a91c9f'),
(13, 14, 10, '498809745ad381e28cb8');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `cmp_client_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `cmp_lead_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_category`
--
ALTER TABLE `lead_category`
  ADD CONSTRAINT `cmp_category_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_channels`
--
ALTER TABLE `lead_channels`
  ADD CONSTRAINT `cmp_channel_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_priority`
--
ALTER TABLE `lead_priority`
  ADD CONSTRAINT `cmp_priority_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_rep_threads`
--
ALTER TABLE `lead_rep_threads`
  ADD CONSTRAINT `cmp_rep_thread_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD CONSTRAINT `cmp_status_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lead_types`
--
ALTER TABLE `lead_types`
  ADD CONSTRAINT `lead_types_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rep_notes`
--
ALTER TABLE `rep_notes`
  ADD CONSTRAINT `cmp_rep_notes_fk` FOREIGN KEY (`cmp_unique_id`) REFERENCES `company_details` (`cmp_unique_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
