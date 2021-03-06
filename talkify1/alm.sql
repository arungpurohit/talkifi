-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2013 at 06:53 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

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

CREATE TABLE `addevent` (
  `addevent_id` int(20) NOT NULL auto_increment,
  `what` varchar(255) NOT NULL,
  `start_date` varchar(45) NOT NULL,
  `start_hour` varchar(45) NOT NULL,
  `start_minute` varchar(45) NOT NULL,
  `startampm` varchar(45) NOT NULL,
  `end_date` varchar(45) NOT NULL,
  `end_hour` varchar(45) NOT NULL,
  `end_minute` varchar(45) NOT NULL,
  `end_ampm` varchar(45) NOT NULL,
  `backg_color` varchar(45) NOT NULL,
  `text_color` varchar(45) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`addevent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `addevent`
--

INSERT INTO `addevent` (`addevent_id`, `what`, `start_date`, `start_hour`, `start_minute`, `startampm`, `end_date`, `end_hour`, `end_minute`, `end_ampm`, `backg_color`, `text_color`, `cmp_unique_id`) VALUES
(1, 'asdfasd', '2013-6-4', '12', '00', 'AM', '2013-6-4', '12', '00', '', '', '', 'adcs123'),
(2, 'dfdsf', '2013-6-18', '12', '00', 'AM', '2013-6-18', '12', '00', '', '', '', 'adcs123'),
(3, 'aridam viswas', '2013-6-12', '12', '00', 'AM', '2013-6-12', '12', '00', '', '', '', 'adcs123'),
(4, 'asd', '2013-6-4', '12', '00', 'AM', '2013-6-4', '12', '00', '', '', '', 'adcs123'),
(5, 'asdf', '2013-6-11', '12', '00', 'AM', '2013-6-11', '12', '00', '', '', '', 'adcs123'),
(6, 'adsfasd', '2013-6-10', '12', '00', 'AM', '2013-6-10', '12', '00', '', '', '', 'adcs123'),
(7, 'dfasdf', '2013-6-24', '12', '00', 'AM', '2013-6-24', '12', '00', '', '', '', 'adcs123'),
(8, 'adfsasdf', '2013-6-3', '12', '00', 'AM', '2013-6-3', '12', '00', '', '', '', 'adcs123'),
(9, 'asdfasdf', '2013-6-11', '12', '00', 'AM', '2013-6-11', '12', '00', '', '', '', 'adcs123'),
(10, 'asdfasd', '2013-6-12', '12', '00', 'AM', '2013-6-12', '12', '00', '', '', '', 'adcs123'),
(11, 'trs', '2013-7-15', '12', '00', 'AM', '2013-7-15', '12', '00', '', '', '', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `adevents`
--

CREATE TABLE `adevents` (
  `adevent_id` int(20) NOT NULL auto_increment,
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
  PRIMARY KEY  (`adevent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `adevents`
--


-- --------------------------------------------------------

--
-- Table structure for table `autoresponder`
--

CREATE TABLE `autoresponder` (
  `autoresponder_id` int(15) NOT NULL auto_increment,
  `autoresponder_name` varchar(50) NOT NULL,
  `autoresponder_subject` varchar(255) NOT NULL,
  `autoresponder_body` text NOT NULL,
  `autoresponder_created_date` varchar(255) NOT NULL,
  `autoresponder_created_by` int(10) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`autoresponder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `autoresponder`
--

INSERT INTO `autoresponder` (`autoresponder_id`, `autoresponder_name`, `autoresponder_subject`, `autoresponder_body`, `autoresponder_created_date`, `autoresponder_created_by`, `cmp_unique_id`) VALUES
(1, 'welcome prabhu', 'Welcome to CompanyName', '<p>Dear FirstName,</p>\r\n<p>Welcome to our company CompanyName,</p>\r\n<p>&nbsp;</p>\r\n<p>Thanks and Regards,</p>\r\n<p>RepName,</p>\r\n<p>CompanyName</p>\r\n<p>&nbsp;</p>', '1371712509', 1, 'adcs123'),
(23, 'arindam', 'congrats', '<p>hello.......</p>', '1372769062', 1, 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `autorespondersms`
--

CREATE TABLE `autorespondersms` (
  `autorespondersms_id` int(15) NOT NULL auto_increment,
  `autorespondersms_name` varchar(50) NOT NULL,
  `autorespondersms_subject` varchar(255) NOT NULL,
  `autorespondersms_body` text NOT NULL,
  `autorespondersms_created_by` varchar(10) NOT NULL,
  `autorespondersms_created_date` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`autorespondersms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `autorespondersms`
--

INSERT INTO `autorespondersms` (`autorespondersms_id`, `autorespondersms_name`, `autorespondersms_subject`, `autorespondersms_body`, `autorespondersms_created_by`, `autorespondersms_created_date`, `cmp_unique_id`) VALUES
(1, 'prabhakara', 'business mail', '<p>hello sir.................</p>', '1', '1372765947', 'adcs123'),
(2, 'subramanya', 'welcome', '<p>hi bro.........</p>\r\n<p>we r inviting u to vijay marrige......</p>', '1', '1372766332', 'adcs123'),
(3, 'vijay kumar', 'test', '<p>hello...........</p>', '1', '1372766720', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2b9d90a3f46d36400df360b25138b20b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0', 1374929806, 'a:6:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1374763977";}');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL auto_increment,
  `client_username` varchar(255) default NULL,
  `client_password` varchar(45) default 'password',
  `client_fname` varchar(255) default NULL,
  `client_lname` varchar(45) default NULL,
  `client_email` varchar(255) default NULL,
  `client_phone` varchar(20) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `client_group_id` int(11) default NULL,
  `client_creation_date` varchar(45) default NULL,
  `client_modification_date` varchar(45) default NULL,
  `client_created_by` varchar(45) default NULL,
  `client_created_via` int(11) default NULL,
  `client_merge_id` int(11) default NULL,
  `client_status` int(11) default NULL,
  PRIMARY KEY  (`client_id`),
  KEY `cmp_client_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_username`, `client_password`, `client_fname`, `client_lname`, `client_email`, `client_phone`, `cmp_unique_id`, `client_group_id`, `client_creation_date`, `client_modification_date`, `client_created_by`, `client_created_via`, `client_merge_id`, `client_status`) VALUES
(1, 'subbutre', '******', 'subbu', 'manya', 'subbu@gmail.com', '34343434', 'adcs123', NULL, '1371022602', '1371561253', NULL, NULL, NULL, NULL),
(2, 'scoolmani@gmail.com', '******', 'subere', 'subere', 'scoolmani@gmail.com', '123412341234', 'adcs123', NULL, '1371537227', '1371726981', NULL, NULL, NULL, NULL),
(3, 'viji@gmail.com', '123456', 'viji', 'viji', 'viji@gmail.com', '213421341234', 'adcs123', NULL, '1371537542', NULL, NULL, NULL, NULL, NULL),
(4, 'jtje@gmail.com', '1212121', 'jtje', 'jee', 'jtje@gmail.com', '123123213', 'adcs123', NULL, '1371538036', NULL, NULL, NULL, NULL, NULL),
(5, 'jeue', 'jajd', 'jejej', 'jejej', 'jdjdl@lee.com', '123213213', 'adcs123', NULL, '1371538146', NULL, NULL, NULL, NULL, NULL),
(6, 'sdfasd', 'asdf', 'asdf', 'asdf', 'asdf@gfm.com', '123213213', 'adcs123', NULL, '1371538234', NULL, NULL, NULL, NULL, NULL),
(7, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf@gedm.com', '12312321', 'adcs123', NULL, '1371538477', NULL, NULL, NULL, NULL, NULL),
(8, 'asdfd', 'asdf', 'asdf', 'asdf', 'asdf@gmail.com', '12321323', 'adcs123', NULL, '1371538663', NULL, NULL, NULL, NULL, NULL),
(9, 'working@gmail.com', 'asdfasdfd', 'adfwere', 'adred', 'working@gmail.com', '123123123', 'adcs123', NULL, '1371538767', NULL, NULL, NULL, NULL, NULL),
(10, 'jejue@eee.com', 'dc575cdf692c4164e0c8e2a9183b6f9e', 'sjeje', 'see', 'jejue@eee.com', '232132132', 'adcs123', NULL, '1371540773', NULL, NULL, 3, NULL, NULL),
(11, 'asddsf@md.com', 'dc575cdf692c4164e0c8e2a9183b6f9e', 'dfasdf', 'sdf', 'asddsf@md.com', '1232132', 'adcs123', NULL, '1371540773', NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `ccmp_id` int(15) NOT NULL auto_increment,
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
  PRIMARY KEY  (`ccmp_id`),
  KEY `company_name` (`company_name`),
  KEY `company_name_2` (`company_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ccmp_id`, `company_name`, `address`, `city`, `state`, `zip`, `phone`, `contactperson`, `contactemail`, `contactphone`, `referred`, `pass`, `cpass`, `industry`, `noofusers`, `nooftelephonyusers`, `cmp_unique_id`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'AS', 23423, '23423423434', 'asdf', 'asdf@adfa.comn', '3432432', 'VJ', '123456', '123456', 'drffg', '2', '3', 'eea988d3490d1e012f1b'),
(2, 'asdf', 'asdf', 'asdf', 'AS', 23423, '23423423434', 'asdf', 'asdf@adfa.comn', '3432432', 'VJ', '123456', '123456', 'drffg', '2', '2', 'eef603e40be2a82cc7a4'),
(3, 'asdf', 'asdf', 'asdf', 'AS', 23423, '23423423434', 'asdf', 'asdf@adfa.comn', '3432432', 'VJ', '123456', '123456', 'drffg', '2', '5', 'dd302353348b319a620a'),
(4, 'prabhu', 'prabhu raj', 'bangalore', 'KA', 213234213, '23434525435', 'prabhu', 'prabhu@gmail.com', '234235412341324', 'VJ', '123456', '123456', 'service', '4', '3', '2bc8f7c8ff15ea2bab0c'),
(5, 'prabhu', 'prabhu raj', 'bangalore', 'KA', 213234213, '23434525435', 'prabhu', 'prabhu@gmail.com', '234235412341324', 'VJ', '123456', '123456', 'service', '4', '3', 'e52642cb5efea24a4214'),
(6, 'prabhu', 'prabhu raj', 'bangalore', 'KA', 213234213, '23434525435', 'prabhu', 'prabhu@gmail.com', '234235412341324', 'VJ', '123456', '123456', 'service', '4', '3', 'e8c6aa6ed64cb977f4aa'),
(7, 'techflyte', 'techflyte cil layout', 'bangalore', 'KA', 560032, '9880694144', 'subbu', 'subbu@gmail.com', 'subbu', 'VJ', '123456', '123456', 'service', '2', '4', 'f0ba2ab2c53322e67c3d'),
(8, 'suni', 'sunicompany', 'bangalore', 'KA', 566534, '737378383', 'sunil', 'sunil@gmail.com', '443434343434', 'VJ', 'password', 'password', 'service', '4', '4', '82a70e085b921d8d2de3');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(11) NOT NULL auto_increment,
  `cmp_unique_id` varchar(20) default NULL,
  `company_name` varchar(45) default NULL,
  `company_address` varchar(45) default NULL,
  `company_state` varchar(45) default NULL,
  `company_city` varchar(45) default NULL,
  `company_zip` varchar(45) default NULL,
  `company_phone` varchar(15) default NULL,
  `company_fax` varchar(45) default NULL,
  `company_contact_person` varchar(45) default NULL,
  `company_contact_phone` varchar(45) default NULL,
  `company_contact_email` varchar(255) NOT NULL,
  `company_starting_date` char(30) NOT NULL,
  `company_modification_date` char(30) NOT NULL,
  `company_mini_logo` varchar(255) NOT NULL,
  `company_medium_logo` varchar(255) NOT NULL,
  `modules_purchased` text NOT NULL,
  `active_status` int(2) NOT NULL default '1',
  `no_of_emails_provided` int(15) NOT NULL,
  `no_of_emails_used` int(15) NOT NULL,
  PRIMARY KEY  (`company_id`),
  UNIQUE KEY `cmp_unique_id_UNIQUE` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `cmp_unique_id`, `company_name`, `company_address`, `company_state`, `company_city`, `company_zip`, `company_phone`, `company_fax`, `company_contact_person`, `company_contact_phone`, `company_contact_email`, `company_starting_date`, `company_modification_date`, `company_mini_logo`, `company_medium_logo`, `modules_purchased`, `active_status`, `no_of_emails_provided`, `no_of_emails_used`) VALUES
(1, 'adcs123', 'Adekins', 'bangloreds', 'karnataka', 'Bangalore', '560035551', '8884111615', '2233661', 'Vijayakumar.R', '9591747437', 'vijaykumar@adekins.com', '06/10/2012', '12/10/2012', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:chat:Autorespondersms:Client_upload:Emailconf:', 1, 1000, 2147483647),
(2, 'eea988d3490d1e012f1b', 'asdf', 'asdf', 'AS', 'asdf', '23423', '23423423434', NULL, 'asdf', '3432432', 'asdf@adfa.comn', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1, 0, 0),
(3, 'eef603e40be2a82cc7a4', 'asdf', 'asdf', 'AS', 'asdf', '23423', '23423423434', NULL, 'asdf', '3432432', 'asdf@adfa.comn', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Autorespondersms:', 1, 0, 0),
(4, 'dd302353348b319a620a', 'asdf', 'asdf', 'AS', 'asdf', '23423', '23423423434', NULL, 'asdf', '3432432', 'asdf@adfa.comn', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:', 1, 0, 0),
(5, '2bc8f7c8ff15ea2bab0c', 'prabhu', 'prabhu raj', 'KA', 'bangalore', '213234213', '23434525435', NULL, 'prabhu', '234235412341324', 'prabhu@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1, 0, 0),
(6, 'e52642cb5efea24a4214', 'prabhu', 'prabhu raj', 'KA', 'bangalore', '213234213', '23434525435', NULL, 'prabhu', '234235412341324', 'prabhu@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1, 0, 0),
(7, 'e8c6aa6ed64cb977f4aa', 'prabhu', 'prabhu raj', 'KA', 'bangalore', '213234213', '23434525435', NULL, 'prabhu', '234235412341324', 'prabhu@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1, 0, 0),
(8, 'f0ba2ab2c53322e67c3d', 'techflyte', 'techflyte cil layout', 'KA', 'bangalore', '560032', '9880694144', NULL, 'subbu', 'subbu', 'subbu@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Roleofemp:', 1, 0, 0),
(9, '82a70e085b921d8d2de3', 'suni', 'sunicompany', 'KA', 'bangalore', '566534', '737378383', NULL, 'sunil', '443434343434', 'sunil@gmail.com', '17/06/2013', '', '', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE `corporates` (
  `corp_id` int(20) NOT NULL auto_increment,
  `corp_name` varchar(25) NOT NULL,
  `cmp_unique_id` varchar(25) NOT NULL,
  PRIMARY KEY  (`corp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `corporates`
--


-- --------------------------------------------------------

--
-- Table structure for table `cti_event`
--

CREATE TABLE `cti_event` (
  `tbl_id` int(11) NOT NULL auto_increment,
  `customer_num` varchar(20) NOT NULL,
  `rep_num` varchar(20) NOT NULL,
  `b_sim` varchar(20) NOT NULL,
  `call_duration` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_of_insert` varchar(20) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`tbl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cti_event`
--

INSERT INTO `cti_event` (`tbl_id`, `customer_num`, `rep_num`, `b_sim`, `call_duration`, `status`, `status_of_insert`, `unique_id`, `cmp_unique_id`) VALUES
(1, '84848484', '9990694144', '', '19', 'ANSWERED', '1', '2134523452345', 'adcs123'),
(2, '9591747437', '9880694144', '', '25', 'answered', '1', '2134523452345', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `email_conf`
--

CREATE TABLE `email_conf` (
  `email_conf_id` int(11) NOT NULL auto_increment,
  `email_conf_emailaddr` varchar(45) default NULL,
  `email_conf_emailid` varchar(45) default NULL,
  `email_conf_emailpass` varchar(45) default NULL,
  `email_conf_pop` varchar(255) default NULL,
  `email_conf_emailport` int(11) default NULL,
  `email_conf_emailserviceflag` varchar(45) default NULL,
  `email_conf_last_downloaded` varchar(45) default NULL,
  `email_conf_messageid` text,
  `email_status_id` int(11) NOT NULL,
  `email_types_id` varchar(11) NOT NULL,
  `email_channels_id` varchar(11) NOT NULL,
  `email_conf_categoryid` int(11) default NULL,
  `email_conf_priorityid` int(11) default NULL,
  `emai_conf_repgroupid` int(11) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  PRIMARY KEY  (`email_conf_id`),
  UNIQUE KEY `email_conf_emailaddr_UNIQUE` (`email_conf_emailaddr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_conf`
--

INSERT INTO `email_conf` (`email_conf_id`, `email_conf_emailaddr`, `email_conf_emailid`, `email_conf_emailpass`, `email_conf_pop`, `email_conf_emailport`, `email_conf_emailserviceflag`, `email_conf_last_downloaded`, `email_conf_messageid`, `email_status_id`, `email_types_id`, `email_channels_id`, `email_conf_categoryid`, `email_conf_priorityid`, `emai_conf_repgroupid`, `cmp_unique_id`) VALUES
(1, 'talkifidemo@gmail.com', 'talkifidemo@gmail.com', 'vj12best', 'imap.gmail.com', 993, '/imap/ssl', NULL, '<CABGg7ysOgUOTHCU6PcemKM7dwmMDs3p23+v29QS-t8HdEG+dng@mail.gmail.com><CABGg7yuC45C4tpj73JH=5oOmNQWvFUhFbCSrHhd8xog5U9YzwQ@mail.gmail.com><CABGg7yv+0Aav5_NotojcSsHycZvap7Keb0HjRhzyRPk-JGAViA@mail.gmail.com>', 1, '4', '4', 1, 1, NULL, 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `page_perm`, `category_perm`, `types_perm`, `priority_perm`, `status_perm`, `channels_perm`, `assign_perm`, `other_leads_view`, `cmp_unique_id`) VALUES
(1, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Autoresponder:Emails:Emaillist:Graphs:Repreports:Autorespondersms:Client_upload:Emailconf:Roleofemp:', '1,11,14,17', '1,10', '1,10', '1,10', '1', '1,2', '1,2', 'adcs123'),
(2, 'members', 'General User', 'Dashboard:Compose:Inbox:Sms:Company:Tasks:Repdashboard', '1', '', '', '', '', '1', '1,2', 'adcs123'),
(3, 'admin', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '6', '6', '6', '6', '6', '', '', 'e52642cb5efea24a4214'),
(4, 'admin', '', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '7', '7', '7', '7', '7', '3', '3', 'e8c6aa6ed64cb977f4aa'),
(5, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '8', '8', '8', '8', '8', '', '', 'f0ba2ab2c53322e67c3d'),
(6, 'admin', 'Administrator', 'Dashboard:Compose:Inbox:Sms:Reports:Company:Tasks:Category:Channel:Types:Priority:Status:Leadview:Reps:Clients:Repdashboard:Roleofemp:', '9', '9', '9', '9', '9', '', '', '82a70e085b921d8d2de3'),
(7, 'manager', '', 'Dashboard:Compose:Category:Clients:Repdashboard:Autoresponder:Roleofemp:', '1,11,14', '1', '1', '1', '1', '1,2', '1,2', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL auto_increment,
  `lead_unique_id` int(11) default NULL,
  `lead_creation_date` varchar(45) default NULL,
  `lead_priority_id` int(11) default NULL,
  `lead_type_id` int(11) default NULL,
  `client_id` varchar(45) default NULL,
  `lead_subject` varchar(255) NOT NULL,
  `lead_status_id` int(11) NOT NULL,
  `lead_category_id` int(11) NOT NULL,
  `lead_channel_id` int(11) NOT NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `rep_id` int(11) default NULL,
  `voice_path` varchar(255) NOT NULL,
  `lead_read_flag` enum('Y','N') default NULL,
  `due_by` varchar(45) NOT NULL,
  `flag` int(5) NOT NULL default '1',
  PRIMARY KEY  (`lead_id`),
  KEY `cmp_lead_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `lead_unique_id`, `lead_creation_date`, `lead_priority_id`, `lead_type_id`, `client_id`, `lead_subject`, `lead_status_id`, `lead_category_id`, `lead_channel_id`, `cmp_unique_id`, `rep_id`, `voice_path`, `lead_read_flag`, `due_by`, `flag`) VALUES
(1, 1, '1371022655', 1, 1, '1', 'first lead', 10, 1, 1, 'adcs123', 1, '', 'Y', '', 1),
(2, 2, '1371192028', 1, 1, '1', 'testing graphs', 1, 1, 1, 'adcs123', 2, '', 'Y', '', 2),
(3, 3, '1371451565', 1, 1, '1', 'one more lead', 1, 1, 1, 'adcs123', 1, '', 'Y', '', 1),
(4, 4, '1371538507', 1, 1, '7', 'testing more', 1, 1, 1, 'adcs123', 1, '', 'Y', '', 2),
(5, 5, '1371714934', 1, 1, '10', 'testing ticket', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371686400', 1),
(6, 6, '1371727008', 1, 1, '2', 'this is just a testing message', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371686400', 2),
(7, 7, '1371727097', 1, 1, '2', 'asdf', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371686400', 2),
(8, 8, '1371727247', 1, 1, '2', 'asdf', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371686400', 1),
(9, 9, '1371727320', 1, 1, '2', 'asdf', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371686400', 1),
(10, 10, '1371815190', 1, 1, '2', 'asdf', 1, 1, 1, 'adcs123', 1, '', 'Y', '1371772800', 1),
(11, 11, '1371880730', 1, 1, '11', 'sdfg', 1, 1, 1, 'adcs123', 2, '', 'Y', '1371859200', 1),
(12, 12, '1372423353', 1, 1, '3', 'hh', 1, 11, 1, 'adcs123', 1, '', 'Y', '1372377600', 1),
(13, 13, '1372483458', 10, 1, '11', 'hh', 10, 1, 1, 'adcs123', 1, '', 'Y', '1372464000', 1),
(14, 14, '1373372731', 1, 1, '11', 'ssssss', 1, 1, 1, 'adcs123', 1, '', 'Y', '1373328000', 1),
(15, 15, '1373376985', 1, 1, '5', 'w', 1, 1, 1, 'adcs123', 1, '', 'Y', '1373328000', 1),
(16, 16, '1373377049', 1, 1, '2', 'wre', 1, 1, 1, 'adcs123', 1, '', 'Y', '1373328000', 1),
(17, 17, '1373528247', 1, 1, '11', 'test mail', 1, 1, 1, 'adcs123', 1, '', 'Y', '1373500800', 1),
(18, 18, '1373723414', 1, 1, '11', 'dw', 1, 1, 1, 'adcs123', 1, '', 'Y', '1373673600', 1),
(19, 19, '1374040467', 1, 1, '11', '', 1, 1, 1, 'adcs123', 1, '', 'Y', '1374019200', 1),
(20, 20, '1374040476', 10, 1, '11', '', 1, 1, 1, 'adcs123', 1, '', 'Y', '1374019200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lead_category`
--

CREATE TABLE `lead_category` (
  `lead_category_id` int(11) NOT NULL auto_increment,
  `lead_category_name` varchar(45) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `lead_primary_id` varchar(45) default NULL,
  `category_status` varchar(45) default NULL,
  PRIMARY KEY  (`lead_category_id`),
  KEY `cmp_category_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `lead_category`
--

INSERT INTO `lead_category` (`lead_category_id`, `lead_category_name`, `cmp_unique_id`, `lead_primary_id`, `category_status`) VALUES
(1, 'Residential', 'adcs123', NULL, 'ACTIVE'),
(2, 'HelpDesk', 'eea988d3490d1e012f1b', NULL, 'ACTIVE'),
(3, 'HelpDesk', 'eef603e40be2a82cc7a4', NULL, 'ACTIVE'),
(4, 'HelpDesk', 'dd302353348b319a620a', NULL, 'ACTIVE'),
(5, 'HelpDesk', '2bc8f7c8ff15ea2bab0c', NULL, 'ACTIVE'),
(6, 'HelpDesk', 'e52642cb5efea24a4214', NULL, 'ACTIVE'),
(7, 'HelpDesk', 'e8c6aa6ed64cb977f4aa', NULL, 'ACTIVE'),
(8, 'HelpDesk', 'f0ba2ab2c53322e67c3d', NULL, 'ACTIVE'),
(9, 'HelpDesk', '82a70e085b921d8d2de3', NULL, 'ACTIVE'),
(10, '3bhk', 'adcs123', '1', 'Active'),
(11, 'office', 'adcs123', NULL, 'Active'),
(12, '2bhk', 'adcs123', '11', 'Active'),
(13, '3bhk', 'adcs123', '11', 'Active'),
(14, 'asde', 'adcs123', NULL, 'Active'),
(15, '4bhk', 'adcs123', '11', 'Active'),
(16, '5de', 'adcs123', '11', 'Active'),
(17, 'home', 'adcs123', NULL, 'Active'),
(18, '3bhk', 'adcs123', '17', 'Active'),
(19, 'subbu', 'adcs123', NULL, 'Active'),
(20, 'siri', 'adcs123', '19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `lead_channels`
--

CREATE TABLE `lead_channels` (
  `lead_channel_id` int(11) NOT NULL auto_increment,
  `lead_channel_name` varchar(45) default NULL,
  `lead_channel_color` varchar(45) default NULL,
  `cmp_unique_id` varchar(45) default NULL,
  `channel_status` varchar(45) default NULL,
  PRIMARY KEY  (`lead_channel_id`),
  KEY `cmp_channel_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lead_channels`
--

INSERT INTO `lead_channels` (`lead_channel_id`, `lead_channel_name`, `lead_channel_color`, `cmp_unique_id`, `channel_status`) VALUES
(1, 'Voice', '#ffffff', 'adcs123', 'Active'),
(2, 'Voice', '#fff', 'eea988d3490d1e012f1b', 'ACTIVE'),
(3, 'Voice', '#fff', 'eef603e40be2a82cc7a4', 'ACTIVE'),
(4, 'Voice', '#fff', 'dd302353348b319a620a', 'ACTIVE'),
(5, 'Voice', '#fff', '2bc8f7c8ff15ea2bab0c', 'ACTIVE'),
(6, 'Voice', '#fff', 'e52642cb5efea24a4214', 'ACTIVE'),
(7, 'Voice', '#fff', 'e8c6aa6ed64cb977f4aa', 'ACTIVE'),
(8, 'Voice', '#fff', 'f0ba2ab2c53322e67c3d', 'ACTIVE'),
(9, 'Voice', '#fff', '82a70e085b921d8d2de3', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `lead_clients_threads`
--

CREATE TABLE `lead_clients_threads` (
  `lead_client_thread_id` int(11) NOT NULL auto_increment,
  `lead_unique_id` int(11) default NULL,
  `attach_flag` int(11) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `creation_date` varchar(45) default NULL,
  `modification_date` varchar(45) NOT NULL,
  `created_by` varchar(45) default NULL,
  `subject` varchar(255) default NULL,
  `msgBody` text NOT NULL,
  `lead_status_id` int(11) default NULL,
  `lead_attachment` varchar(255) default NULL,
  PRIMARY KEY  (`lead_client_thread_id`),
  KEY `cmp_clients_thread_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lead_clients_threads`
--


-- --------------------------------------------------------

--
-- Table structure for table `lead_priority`
--

CREATE TABLE `lead_priority` (
  `lead_priority_id` int(11) NOT NULL auto_increment,
  `lead_priority_name` varchar(45) default NULL,
  `lead_priority_color` varchar(45) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `priority_status` varchar(45) NOT NULL,
  PRIMARY KEY  (`lead_priority_id`),
  KEY `cmp_priority_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lead_priority`
--

INSERT INTO `lead_priority` (`lead_priority_id`, `lead_priority_name`, `lead_priority_color`, `cmp_unique_id`, `priority_status`) VALUES
(1, 'High', '#ffffff', 'adcs123', 'Active'),
(2, 'High', '#fff', 'eea988d3490d1e012f1b', 'ACTIVE'),
(3, 'High', '#fff', 'eef603e40be2a82cc7a4', 'ACTIVE'),
(4, 'High', '#fff', 'dd302353348b319a620a', 'ACTIVE'),
(5, 'High', '#fff', '2bc8f7c8ff15ea2bab0c', 'ACTIVE'),
(6, 'High', '#fff', 'e52642cb5efea24a4214', 'ACTIVE'),
(7, 'High', '#fff', 'e8c6aa6ed64cb977f4aa', 'ACTIVE'),
(8, 'High', '#fff', 'f0ba2ab2c53322e67c3d', 'ACTIVE'),
(9, 'High', '#fff', '82a70e085b921d8d2de3', 'ACTIVE'),
(10, 'low', '#ffffff', 'adcs123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `lead_rep_threads`
--

CREATE TABLE `lead_rep_threads` (
  `lead_rep_thread_id` int(11) NOT NULL auto_increment,
  `lead_unique_id` int(11) default NULL,
  `attach_flag` int(11) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `creation_date` varchar(45) default NULL,
  `modification_date` varchar(45) NOT NULL,
  `created_by` varchar(45) default NULL,
  `msgBody` text NOT NULL,
  `lead_status_id` int(11) default NULL,
  `lead_attachment` varchar(255) default NULL,
  PRIMARY KEY  (`lead_rep_thread_id`),
  KEY `cmp_rep_thread_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `lead_rep_threads`
--

INSERT INTO `lead_rep_threads` (`lead_rep_thread_id`, `lead_unique_id`, `attach_flag`, `cmp_unique_id`, `creation_date`, `modification_date`, `created_by`, `msgBody`, `lead_status_id`, `lead_attachment`) VALUES
(1, 1, 0, 'adcs123', '1371022655', '', '1', '<p>first lead test</p>', 1, ''),
(2, 2, 0, 'adcs123', '1371192028', '', '1', '<p>testing graphs</p>', 1, ''),
(3, 3, 0, 'adcs123', '1371451565', '', '1', '<p>this is just one more lead....</p>', 1, ''),
(4, 1, 0, 'adcs123', NULL, '1371470386', '1', 'sdfasdfasdf as', 1, ''),
(5, 1, 0, 'adcs123', NULL, '1371534418', '1', '<p>another test</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-06-17 11:06:46<br />sdfasdfasdf as<br /><br /><strong>administrator</strong> 2013-06-12 07:06:35<br />\r\n<p>first lead test</p>\r\n<br /><br /></div>', 1, ''),
(6, 4, 0, 'adcs123', '1371538507', '', '1', '<p>testing more</p>', 1, ''),
(7, 5, 0, 'adcs123', '1371714934', '', '1', '<p>ok testing ticket</p>', 1, ''),
(8, 6, 0, 'adcs123', '1371727008', '', '1', '<p>hopefully its a testing message</p>', 1, ''),
(9, 7, 0, 'adcs123', '1371727097', '', '1', '<p>asdfaasdfasdf</p>', 1, ''),
(10, 8, 0, 'adcs123', '1371727247', '', '1', '<p>asdfasdfa s</p>', 1, ''),
(11, 9, 0, 'adcs123', '1371727320', '', '1', '<p>asdf asdf</p>', 1, ''),
(12, 10, 0, 'adcs123', '1371815190', '', '1', '<p>asdfasdf</p>', 1, ''),
(13, 11, 0, 'adcs123', '1371880730', '', '1', '<p>sdfg</p>', 1, ''),
(14, 12, 0, 'adcs123', '1372423353', '', '1', '<p>hh</p>', 1, ''),
(15, 13, 0, 'adcs123', '1372483458', '', '1', '<p>hh</p>', 10, ''),
(16, 13, 0, 'adcs123', NULL, '1373095904', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-06-29 05:06:18<br />\r\n<p>hh</p>\r\n<br /><br /></div>', 10, ''),
(17, 14, 0, 'adcs123', '1373372731', '', '1', '<p>sdada</p>', 1, ''),
(18, 15, 0, 'adcs123', '1373376985', '', '1', '<p>eww</p>', 1, ''),
(19, 16, 0, 'adcs123', '1373377049', '', '1', '<p>frwr</p>', 1, ''),
(20, 1, 0, 'adcs123', NULL, '1373377124', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-06-18 05:06:58<br />\r\n<p>another test</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-06-17 11:06:46<br />sdfasdfasdf as<br /><br /><strong>administrator</strong> 2013-06-12 07:06:35<br />\r\n<p>first lead test</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-06-17 11:06:46<br />sdfasdfasdf as<br /><br /><strong>administrator</strong> 2013-06-12 07:06:35<br />\r\n<p>first lead test</p>\r\n<br /><br /></div>', 10, ''),
(21, 16, 0, 'adcs123', NULL, '1373377153', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>', 1, ''),
(22, 16, 0, 'adcs123', NULL, '1373377172', '1', '<p>hello</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>', 1, ''),
(23, 16, 0, 'adcs123', NULL, '1373377222', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:32<br />\r\n<p>hello</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>', 1, ''),
(24, 17, 0, 'adcs123', '1373528247', '', '1', '<p>dasdsdsddsa</p>', 1, ''),
(25, 16, 0, 'adcs123', NULL, '1373528699', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:22<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:32<br />\r\n<p>hello</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:32<br />\r\n<p>hello</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:13<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>hi sir...........</p>\r\n<br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-09 01:07:29<br />\r\n<p>frwr</p>\r\n<br /><br /></div>', 1, ''),
(26, 18, 0, 'adcs123', '1373723414', '', '1', '<p>s</p>', 1, ''),
(27, 19, 0, 'adcs123', '1374040467', '', '1', '', 1, ''),
(28, 20, 0, 'adcs123', '1374040476', '', '1', '', 1, ''),
(29, 20, 0, 'adcs123', NULL, '1374928425', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-17 05:07:36<br /><br /><br /></div>', 1, ''),
(30, 20, 0, 'adcs123', NULL, '1374928438', '1', '<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-27 12:07:45<br />\r\n<p>&nbsp;</p>\r\n<div class="bdisp"><strong>administrator</strong> 2013-07-17 05:07:36<br /><br /><br /></div>\r\n<br /><br /><strong>administrator</strong> 2013-07-17 05:07:36<br /><br /><br /></div>', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `lead_status_id` int(11) NOT NULL auto_increment,
  `lead_status_name` varchar(255) NOT NULL,
  `lead_status_type` varchar(45) default NULL,
  `lead_status_color` varchar(45) default NULL,
  `lead_status_rep_display` varchar(45) default NULL,
  `lead_status_client_display` varchar(45) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  PRIMARY KEY  (`lead_status_id`),
  KEY `cmp_status_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`lead_status_id`, `lead_status_name`, `lead_status_type`, `lead_status_color`, `lead_status_rep_display`, `lead_status_client_display`, `cmp_unique_id`) VALUES
(1, 'Initial', 'Active', '#ffffff', 'Initial', 'Initial', 'adcs123'),
(2, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'eea988d3490d1e012f1b'),
(3, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'eef603e40be2a82cc7a4'),
(4, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'dd302353348b319a620a'),
(5, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '2bc8f7c8ff15ea2bab0c'),
(6, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'e52642cb5efea24a4214'),
(7, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'e8c6aa6ed64cb977f4aa'),
(8, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', 'f0ba2ab2c53322e67c3d'),
(9, 'Initial', 'ACTIVE', '#fff', 'Initial', 'Initial', '82a70e085b921d8d2de3'),
(10, 'closed', 'Active', '#4a0b4a', 'closed', 'closed', 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `lead_types`
--

CREATE TABLE `lead_types` (
  `lead_type_id` int(11) NOT NULL auto_increment,
  `lead_type_name` varchar(45) default NULL,
  `lead_type_color` varchar(45) default NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `types_status` varchar(45) NOT NULL,
  PRIMARY KEY  (`lead_type_id`),
  KEY `lead_types_fk_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lead_types`
--

INSERT INTO `lead_types` (`lead_type_id`, `lead_type_name`, `lead_type_color`, `cmp_unique_id`, `types_status`) VALUES
(1, 'Enquiry', '#ffffff', 'adcs123', 'Active'),
(2, 'Service', '#fff', 'eea988d3490d1e012f1b', 'ACTIVE'),
(3, 'Service', '#fff', 'eef603e40be2a82cc7a4', 'ACTIVE'),
(4, 'Service', '#fff', 'dd302353348b319a620a', 'ACTIVE'),
(5, 'Service', '#fff', '2bc8f7c8ff15ea2bab0c', 'ACTIVE'),
(6, 'Service', '#fff', 'e52642cb5efea24a4214', 'ACTIVE'),
(7, 'Service', '#fff', 'e8c6aa6ed64cb977f4aa', 'ACTIVE'),
(8, 'Service', '#fff', 'f0ba2ab2c53322e67c3d', 'ACTIVE'),
(9, 'Service', '#fff', '82a70e085b921d8d2de3', 'ACTIVE'),
(10, 'asdadad', '#ffffff', 'adcs123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `repsinfos`
--

CREATE TABLE `repsinfos` (
  `repsinfo_id` int(20) NOT NULL auto_increment,
  `repsinfo_username` varchar(45) NOT NULL,
  `repsinfo_password` varchar(45) NOT NULL,
  `repsinfo_fname` varchar(45) NOT NULL,
  `repsinfo_lname` varchar(45) NOT NULL,
  `repsinfo_email` varchar(45) NOT NULL,
  `repsinfo_phone` varchar(45) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  PRIMARY KEY  (`repsinfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `repsinfos`
--


-- --------------------------------------------------------

--
-- Table structure for table `rep_notes`
--

CREATE TABLE `rep_notes` (
  `rep_notes_id` int(11) NOT NULL auto_increment,
  `rep_notes_created_date` varchar(45) default NULL,
  `rep_notes_created_by` varchar(45) default NULL,
  `rep_internal_note` text,
  `rep_external_note` text NOT NULL,
  `cmp_unique_id` varchar(20) default NULL,
  `lead_unique_id` int(11) default NULL,
  PRIMARY KEY  (`rep_notes_id`),
  KEY `lead_unique_id_idx` (`cmp_unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `rep_notes`
--

INSERT INTO `rep_notes` (`rep_notes_id`, `rep_notes_created_date`, `rep_notes_created_by`, `rep_internal_note`, `rep_external_note`, `cmp_unique_id`, `lead_unique_id`) VALUES
(1, '1371450247', '1', 'testing notes', 'testing notes', 'adcs123', 1),
(2, '1371450629', '1', 'test', 'teste', 'adcs123', 1),
(3, '1371450642', '1', 'test', 'te', 'adcs123', 1),
(4, '1371450686', '1', 'tete	', 'errer', 'adcs123', 1),
(5, '1371450942', '1', 'tees', 'tese', 'adcs123', 1),
(6, '1371451443', '1', 'teerer', 'tererer', 'adcs123', 1),
(7, '1371451511', '1', 'arindam', 'arindam biswas', 'adcs123', 1),
(8, '1371451590', '1', 'internal notes', 'this is extenal notes', 'adcs123', 3),
(9, '1371881612', '1', '	adf', 'asdf', 'adcs123', 11),
(10, '1371886886', '1', 'sadf', '', 'adcs123', 3),
(11, '1371886946', '1', 'no use', '', 'adcs123', 3),
(12, '1371887062', '1', 'asdf', '', 'adcs123', 4),
(13, '1371887175', '1', 'asdf', '', 'adcs123', 5),
(14, '1371887302', '1', 'asdf', '', 'adcs123', 6),
(15, '1371887366', '1', 'no use', '', 'adcs123', 7),
(16, '1371906670', '1', 'no use', '', 'adcs123', 8),
(17, '1371908041', '1', 'this is viji''s lead, dont over ride it.', '', 'adcs123', 9),
(18, '1371908372', '1', 'some reasons', '', 'adcs123', 3),
(19, '1371908585', '1', 'some reason ', '', 'adcs123', 5),
(20, '1372590763', '1', 'no use', '', 'adcs123', 1),
(21, '1372590780', '1', 'dsfsf', '', 'adcs123', 1),
(22, '1373360077', '1', 'f', '', 'adcs123', 9),
(23, '1373360083', '1', 'f', '', 'adcs123', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(20) NOT NULL auto_increment,
  `mobile_numbers` varchar(45) NOT NULL,
  `sms_content` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  `smstemplate_name` varchar(45) NOT NULL,
  `newsms_content` varchar(255) NOT NULL,
  PRIMARY KEY  (`sms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `mobile_numbers`, `sms_content`, `cmp_unique_id`, `smstemplate_name`, `newsms_content`) VALUES
(1, 'asddsf@md.com', 'hello sir................', 'adcs123', 'hh', '0hh'),
(2, 'scoolmani@gmail.com', 'hi.........', 'adcs123', '0', '0'),
(3, 'asddsf@md.com', 'sadada', 'adcs123', '0', '0'),
(4, 'jtje@gmail.com', 'wqeeeq', 'adcs123', '0', '0'),
(5, 'asddsf@md.com', 'wqeqw', 'adcs123', '0', '0'),
(6, 'jtje@gmail.com', 'prabhu', 'adcs123', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Id` int(11) NOT NULL auto_increment,
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
  `event_status` smallint(2) NOT NULL default '1',
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Id`, `Subject`, `Location`, `Description`, `StartTime`, `EndTime`, `IsAllDayEvent`, `Color`, `RecurringRule`, `created_by`, `created_date`, `modified_date`, `assigned_to`, `assigned_group`, `reference_field`, `reference_value`, `reminder_via`, `reminder_when`, `event_status`, `cmp_unique_id`) VALUES
(1, 'ppp', 'sdz', 'dsfsfs', '2013-07-10 05:30:00', '2013-07-10 06:00:00', 1, '', '', 1, '1373458003', '1373464724', 1, 1, 1, '', 0, '5', 0, 'adcs123'),
(2, 'rtet', 'dfs', '			fsdff', '2013-07-10 06:00:00', '0000-00-00 00:00:00', 1, '', '', 1, '1373458061', '1373464729', 1, 0, 1, '', 0, '5', 0, 'adcs123'),
(3, 'prabhakara', 'banglore', 'meeting ll be 6o clk', '2013-07-11 06:00:00', '2013-07-11 06:30:00', 1, '', '', 1, '1373458233', '1373519948', 1, 0, 1, '', 0, '10', 1, 'adcs123'),
(4, 'subramanya', 'll meet u in morning', 'some important issue', '2013-07-11 07:30:00', '2013-07-13 08:00:00', 1, '', '', 1, '1373464515', '1373528108', 1, 0, 1, '', 0, '5', 0, 'adcs123'),
(5, 'subbu', 'honnali', 'ffsfsfsfsfsf', '2013-07-11 01:30:00', '2013-07-11 02:00:00', 1, '', '', 1, '1373526233', '', 1, 1, 1, '1', 0, '5', 1, 'adcs123'),
(6, 'vijay', 'banglore', 'meet me			', '2013-07-11 01:00:00', '2013-07-11 01:30:00', 1, '', '', 1, '1373526381', '1373528091', 1, 1, 1, '1', 0, '5', 0, 'adcs123'),
(7, 'sdasdadaddd', 'ad', '			dasddadd', '2013-07-11 01:00:00', '2013-07-11 01:30:00', 1, '', '', 1, '1373527052', '1373528097', 1, 1, 1, '2', 0, '5', 0, 'adcs123'),
(8, 'saddaddadsad', 'sd', 'ffsfsfsfsfsf', '2013-07-11 01:00:00', '2013-07-11 01:30:00', 1, '', '', 1, '1373528060', '1373528094', 1, 1, 1, '', 0, '5', 0, 'adcs123'),
(9, 'raju', 'ggg', 'ggg', '2013-07-11 01:00:00', '2013-07-11 01:30:00', 1, '', '', 1, '1373528246', '', 1, 1, 1, '', 0, '10', 1, 'adcs123'),
(10, 'subbu', 'd', '			d', '2013-07-11 01:30:00', '2013-07-11 02:00:00', 1, '', '', 1, '1373528770', '', 1, 1, 1, '', 0, '5', 1, 'adcs123'),
(11, 'aaa', 'a', '			d', '2013-07-11 02:00:00', '2013-07-11 02:30:00', 1, '', '', 1, '1373528805', '', 1, 1, 1, '', 0, '5', 1, 'adcs123'),
(12, 'arindam', 'bbb', 'banglore', '2013-07-11 01:30:00', '2013-07-11 02:00:00', 1, '', '', 1, '1373529542', '1373529575', 2, 2, 1, '1', 1, '10', 1, 'adcs123'),
(13, 'prabhu', 'banglore', 'meeting ll be 7am			', '2013-07-13 07:30:00', '2013-07-13 08:00:00', 1, '', '', 1, '1373723405', '1373723433', 1, 1, 1, '18', 0, '5', 1, 'adcs123');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `temp_id` int(20) NOT NULL auto_increment,
  `smstemplate_name` varchar(45) NOT NULL,
  `newsms_content` varchar(255) NOT NULL,
  `cmp_unique_id` varchar(45) NOT NULL,
  PRIMARY KEY  (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `template`
--


-- --------------------------------------------------------

--
-- Table structure for table `tfimodules`
--

CREATE TABLE `tfimodules` (
  `tfimodule_id` int(11) NOT NULL auto_increment,
  `module_name` varchar(255) NOT NULL,
  `module_display_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`tfimodule_id`)
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
(17, 'Autoresponder', 'Auto Responder', ''),
(18, 'Emails', 'Emails', ''),
(19, 'Emaillist', 'Email List', ''),
(20, 'Graphs', 'Graphs', ''),
(21, 'Repreports', 'Reports', ''),
(22, 'chat', 'chat', ''),
(23, 'Autorespondersms', 'Auto Responder Sms', ''),
(24, 'Client_upload', 'Client Upload', ''),
(25, 'Emailconf', 'Email Conf', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) default NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) default NULL,
  `forgotten_password_code` varchar(40) default NULL,
  `forgotten_password_time` int(11) unsigned default NULL,
  `remember_code` varchar(40) default NULL,
  `created_on` int(11) unsigned NOT NULL,
  `mofication_date` varchar(45) NOT NULL,
  `created_via` varchar(45) NOT NULL,
  `last_login` int(11) unsigned default NULL,
  `active` tinyint(1) unsigned default NULL,
  `first_name` varchar(50) default NULL,
  `last_name` varchar(50) default NULL,
  `company` varchar(100) default NULL,
  `phone` varchar(20) default NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  `no_of_emails_sent` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `mofication_date`, `created_via`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `cmp_unique_id`, `no_of_emails_sent`) VALUES
(1, '\0\0', 'administrator', '2e69c096aefc60eda8e2d5750048c2be9e44f62b', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, '', '', 1374916520, 1, 'Admin', '', 'Techflyte', '988756576', 'adcs123', 11),
(2, '', 'demo@talkify.com', '2e69c096aefc60eda8e2d5750048c2be9e44f62b', '9462e8eee0', 'demouser@talkify.com', NULL, NULL, NULL, NULL, 1370951328, '', 'HD', 1372423718, 1, 'demouser', 'demouser', '', '9880694144', 'adcs123', 0),
(3, '', 'prabhu', '05b75381a2e7a4c7757c1698e221f558cb71d149', NULL, 'scoolmani@gmail.com', NULL, 'ac37c383caa8e1b73a9fd758ab3f9f70cf02ed72', 1371813067, NULL, 1371456861, '', 'HD', 1371812795, 1, 'prabhu', '', 'prabhu', '234235412341324', 'e52642cb5efea24a4214', 0),
(4, '', 'subbu', '6724308bfe8d44d45dea77af7551996b1dc6c297', NULL, 'subbu@gmail.com', NULL, NULL, NULL, NULL, 1371458192, '', 'HD', 1371462131, 1, 'subbu', '', 'techflyte', 'subbu', 'f0ba2ab2c53322e67c3d', 0),
(5, '', 'sunil', '2833eed4a834d568904d515cadfd857a7d3e293c', NULL, 'sunil@gmail.com', NULL, NULL, NULL, NULL, 1371462262, '', 'HD', 1371462548, 1, 'sunil', '', 'suni', '443434343434', '82a70e085b921d8d2de3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  `cmp_unique_id` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`, `cmp_unique_id`) VALUES
(1, 1, 1, 'adcs123'),
(2, 2, 2, 'adcs123'),
(3, 3, 3, 'e52642cb5efea24a4214'),
(4, 4, 5, 'f0ba2ab2c53322e67c3d'),
(5, 5, 6, '82a70e085b921d8d2de3');

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
