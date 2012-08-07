-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2012 at 02:40 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dephub_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `adodb_logsql`
--

CREATE TABLE `adodb_logsql` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `sql0` varchar(250) NOT NULL DEFAULT '',
  `sql1` text,
  `params` text,
  `tracer` text,
  `timer` decimal(16,6) NOT NULL DEFAULT '0.000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to save some logs from ADOdb' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `adodb_logsql`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_assignment`
--

CREATE TABLE `mdl_assignment` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `format` smallint(4) unsigned NOT NULL DEFAULT '0',
  `assignmenttype` varchar(50) NOT NULL DEFAULT '',
  `resubmit` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `preventlate` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `emailteachers` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `var1` bigint(10) DEFAULT '0',
  `var2` bigint(10) DEFAULT '0',
  `var3` bigint(10) DEFAULT '0',
  `var4` bigint(10) DEFAULT '0',
  `var5` bigint(10) DEFAULT '0',
  `maxbytes` bigint(10) unsigned NOT NULL DEFAULT '100000',
  `timedue` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeavailable` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` bigint(10) NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_assi_cou_ix` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Defines assignments' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_assignment`
--

INSERT INTO `mdl_assignment` VALUES(2, 5, 'tes', 'tes', 0, 'upload', 1, 0, 0, 3, 0, 0, 1, 0, 1048576, 1344543000, 1343938200, 100, 1343938284);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_assignment_submissions`
--

CREATE TABLE `mdl_assignment_submissions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignment` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `numfiles` bigint(10) unsigned NOT NULL DEFAULT '0',
  `data1` text,
  `data2` text,
  `grade` bigint(11) NOT NULL DEFAULT '0',
  `submissioncomment` text NOT NULL,
  `format` smallint(4) unsigned NOT NULL DEFAULT '0',
  `teacher` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemarked` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mailed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_assisubm_use_ix` (`userid`),
  KEY `mdl_assisubm_mai_ix` (`mailed`),
  KEY `mdl_assisubm_tim_ix` (`timemarked`),
  KEY `mdl_assisubm_ass_ix` (`assignment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about submitted assignments' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_assignment_submissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_backup_config`
--

CREATE TABLE `mdl_backup_config` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_backconf_nam_uix` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='To store backup configuration variables' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mdl_backup_config`
--

INSERT INTO `mdl_backup_config` VALUES(1, 'backup_sche_modules', '0');
INSERT INTO `mdl_backup_config` VALUES(2, 'backup_sche_withuserdata', '0');
INSERT INTO `mdl_backup_config` VALUES(3, 'backup_sche_metacourse', '0');
INSERT INTO `mdl_backup_config` VALUES(4, 'backup_sche_users', '0');
INSERT INTO `mdl_backup_config` VALUES(5, 'backup_sche_logs', '0');
INSERT INTO `mdl_backup_config` VALUES(6, 'backup_sche_userfiles', '0');
INSERT INTO `mdl_backup_config` VALUES(7, 'backup_sche_coursefiles', '0');
INSERT INTO `mdl_backup_config` VALUES(8, 'backup_sche_sitefiles', '0');
INSERT INTO `mdl_backup_config` VALUES(9, 'backup_sche_gradebook_history', '0');
INSERT INTO `mdl_backup_config` VALUES(10, 'backup_sche_messages', '0');
INSERT INTO `mdl_backup_config` VALUES(11, 'backup_sche_blogs', '0');
INSERT INTO `mdl_backup_config` VALUES(12, 'backup_sche_keep', '1');
INSERT INTO `mdl_backup_config` VALUES(13, 'backup_sche_active', '0');
INSERT INTO `mdl_backup_config` VALUES(14, 'backup_sche_weekdays', '0000000');
INSERT INTO `mdl_backup_config` VALUES(15, 'backup_sche_hour', '0');
INSERT INTO `mdl_backup_config` VALUES(16, 'backup_sche_minute', '0');
INSERT INTO `mdl_backup_config` VALUES(17, 'backup_sche_destination', '');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_backup_courses`
--

CREATE TABLE `mdl_backup_courses` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `laststarttime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastendtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `laststatus` varchar(1) NOT NULL DEFAULT '0',
  `nextstarttime` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_backcour_cou_uix` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To store every course backup status' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_backup_courses`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_backup_files`
--

CREATE TABLE `mdl_backup_files` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `backup_code` bigint(10) unsigned NOT NULL DEFAULT '0',
  `file_type` varchar(10) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `old_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `new_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_backfile_bacfilpat_uix` (`backup_code`,`file_type`,`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To store and recode ids to user and course files' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_backup_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_backup_ids`
--

CREATE TABLE `mdl_backup_ids` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `backup_code` bigint(12) unsigned NOT NULL DEFAULT '0',
  `table_name` varchar(30) NOT NULL DEFAULT '',
  `old_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `new_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `info` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_backids_bactabold_uix` (`backup_code`,`table_name`,`old_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To store and convert ids in backup/restore' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_backup_ids`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_backup_log`
--

CREATE TABLE `mdl_backup_log` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `laststarttime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `info` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_backlog_cou_ix` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To store every course backup log info' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_backup_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_block`
--

CREATE TABLE `mdl_block` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `version` bigint(10) unsigned NOT NULL DEFAULT '0',
  `cron` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastcron` bigint(10) unsigned NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `multiple` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='to store installed blocks' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `mdl_block`
--

INSERT INTO `mdl_block` VALUES(1, 'activity_modules', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(2, 'admin', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(3, 'admin_bookmarks', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(4, 'admin_tree', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(5, 'blog_menu', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(6, 'blog_tags', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(7, 'calendar_month', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(8, 'calendar_upcoming', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(9, 'course_list', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(10, 'course_summary', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(11, 'glossary_random', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(12, 'html', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(13, 'loancalc', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(14, 'login', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(15, 'mentees', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(16, 'messages', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(17, 'mnet_hosts', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(18, 'news_items', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(19, 'online_users', 2007101510, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(20, 'participants', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(21, 'quiz_results', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(22, 'recent_activity', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(23, 'rss_client', 2007101511, 300, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(24, 'search', 2008031500, 1, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(25, 'search_forums', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(26, 'section_links', 2007101511, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(27, 'site_main_menu', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(28, 'social_activities', 2007101509, 0, 0, 1, 0);
INSERT INTO `mdl_block` VALUES(29, 'tag_flickr', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(30, 'tag_youtube', 2007101509, 0, 0, 1, 1);
INSERT INTO `mdl_block` VALUES(31, 'tags', 2007101509, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_block_instance`
--

CREATE TABLE `mdl_block_instance` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `blockid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pagetype` varchar(20) NOT NULL DEFAULT '',
  `position` varchar(10) NOT NULL DEFAULT '',
  `weight` smallint(3) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `configdata` text,
  PRIMARY KEY (`id`),
  KEY `mdl_blocinst_pag_ix` (`pageid`),
  KEY `mdl_blocinst_pag2_ix` (`pagetype`),
  KEY `mdl_blocinst_blo_ix` (`blockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='to store block instances in pages' AUTO_INCREMENT=217 ;

--
-- Dumping data for table `mdl_block_instance`
--

INSERT INTO `mdl_block_instance` VALUES(1, 27, 1, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(2, 4, 1, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(3, 10, 1, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(4, 7, 1, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(5, 4, 0, 'admin', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(6, 3, 0, 'admin', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(15, 19, 1, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(16, 20, 3, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(17, 1, 3, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(18, 25, 3, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(19, 2, 3, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(20, 9, 3, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(21, 18, 3, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(22, 8, 3, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(23, 22, 3, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(24, 20, 4, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(25, 1, 4, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(26, 25, 4, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(27, 2, 4, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(28, 9, 4, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(29, 18, 4, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(30, 8, 4, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(31, 22, 4, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(32, 20, 5, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(33, 1, 5, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(34, 25, 5, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(35, 2, 5, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(36, 9, 5, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(37, 18, 5, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(38, 8, 5, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(39, 22, 5, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(40, 20, 6, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(41, 1, 6, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(42, 25, 6, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(43, 2, 6, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(44, 9, 6, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(45, 18, 6, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(46, 8, 6, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(47, 22, 6, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(48, 20, 7, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(49, 1, 7, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(50, 25, 7, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(51, 2, 7, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(52, 9, 7, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(53, 18, 7, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(54, 8, 7, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(55, 22, 7, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(56, 20, 8, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(57, 1, 8, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(58, 25, 8, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(59, 2, 8, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(60, 9, 8, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(61, 18, 8, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(62, 8, 8, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(63, 22, 8, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(64, 20, 9, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(65, 1, 9, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(66, 25, 9, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(67, 2, 9, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(68, 9, 9, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(69, 18, 9, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(70, 8, 9, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(71, 22, 9, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(72, 20, 10, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(73, 1, 10, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(74, 25, 10, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(75, 2, 10, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(76, 9, 10, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(77, 18, 10, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(78, 8, 10, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(79, 22, 10, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(80, 20, 11, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(81, 1, 11, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(82, 25, 11, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(83, 2, 11, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(84, 9, 11, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(85, 18, 11, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(86, 8, 11, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(87, 22, 11, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(88, 20, 12, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(89, 1, 12, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(90, 25, 12, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(91, 2, 12, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(92, 9, 12, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(93, 18, 12, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(94, 8, 12, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(95, 22, 12, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(96, 20, 13, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(97, 1, 13, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(98, 25, 13, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(99, 2, 13, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(100, 9, 13, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(101, 18, 13, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(102, 8, 13, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(103, 22, 13, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(104, 20, 14, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(105, 1, 14, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(106, 25, 14, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(107, 2, 14, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(108, 9, 14, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(109, 18, 14, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(110, 8, 14, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(111, 22, 14, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(112, 20, 15, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(113, 1, 15, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(114, 25, 15, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(115, 2, 15, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(116, 9, 15, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(117, 18, 15, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(118, 8, 15, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(119, 22, 15, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(120, 20, 16, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(121, 1, 16, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(122, 25, 16, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(123, 2, 16, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(124, 9, 16, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(125, 18, 16, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(126, 8, 16, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(127, 22, 16, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(128, 20, 17, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(129, 1, 17, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(130, 25, 17, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(131, 2, 17, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(132, 9, 17, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(133, 18, 17, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(134, 8, 17, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(135, 22, 17, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(136, 20, 18, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(137, 1, 18, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(138, 25, 18, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(139, 2, 18, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(140, 9, 18, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(141, 18, 18, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(142, 8, 18, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(143, 22, 18, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(144, 20, 19, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(145, 1, 19, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(146, 25, 19, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(147, 2, 19, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(148, 9, 19, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(149, 18, 19, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(150, 8, 19, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(151, 22, 19, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(152, 20, 20, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(153, 1, 20, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(154, 25, 20, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(155, 2, 20, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(156, 9, 20, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(157, 18, 20, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(158, 8, 20, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(159, 22, 20, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(160, 20, 21, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(161, 1, 21, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(162, 25, 21, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(163, 2, 21, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(164, 9, 21, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(165, 18, 21, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(166, 8, 21, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(167, 22, 21, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(168, 20, 22, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(169, 1, 22, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(170, 25, 22, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(171, 2, 22, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(172, 9, 22, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(173, 18, 22, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(174, 8, 22, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(175, 22, 22, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(176, 20, 23, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(177, 1, 23, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(178, 25, 23, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(179, 2, 23, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(180, 9, 23, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(181, 18, 23, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(182, 8, 23, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(183, 22, 23, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(184, 20, 24, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(185, 1, 24, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(186, 25, 24, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(187, 2, 24, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(188, 9, 24, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(189, 18, 24, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(190, 8, 24, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(191, 22, 24, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(192, 20, 25, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(193, 1, 25, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(194, 25, 25, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(195, 2, 25, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(196, 9, 25, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(197, 18, 25, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(198, 8, 25, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(199, 22, 25, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(200, 20, 26, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(201, 1, 26, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(202, 25, 26, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(203, 2, 26, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(204, 9, 26, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(205, 18, 26, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(206, 8, 26, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(207, 22, 26, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(208, 20, 27, 'course-view', 'l', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(209, 1, 27, 'course-view', 'l', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(210, 25, 27, 'course-view', 'l', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(211, 2, 27, 'course-view', 'l', 3, 1, '');
INSERT INTO `mdl_block_instance` VALUES(212, 9, 27, 'course-view', 'l', 4, 1, '');
INSERT INTO `mdl_block_instance` VALUES(213, 18, 27, 'course-view', 'r', 0, 1, '');
INSERT INTO `mdl_block_instance` VALUES(214, 8, 27, 'course-view', 'r', 1, 1, '');
INSERT INTO `mdl_block_instance` VALUES(215, 22, 27, 'course-view', 'r', 2, 1, '');
INSERT INTO `mdl_block_instance` VALUES(216, 8, 1, 'course-view', 'l', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_block_pinned`
--

CREATE TABLE `mdl_block_pinned` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `blockid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pagetype` varchar(20) NOT NULL DEFAULT '',
  `position` varchar(10) NOT NULL DEFAULT '',
  `weight` smallint(3) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `configdata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_blocpinn_pag_ix` (`pagetype`),
  KEY `mdl_blocpinn_blo_ix` (`blockid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to pin blocks' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_block_pinned`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_block_rss_client`
--

CREATE TABLE `mdl_block_rss_client` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `preferredtitle` varchar(64) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `shared` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Remote news feed information. Contains the news feed id, the' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_block_rss_client`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_block_search_documents`
--

CREATE TABLE `mdl_block_search_documents` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `docid` varchar(32) NOT NULL DEFAULT '',
  `doctype` varchar(32) NOT NULL DEFAULT 'none',
  `itemtype` varchar(32) NOT NULL DEFAULT 'standard',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `docdate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `updated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_blocseardocu_doc_ix` (`docid`),
  KEY `mdl_blocseardocu_doc2_ix` (`doctype`),
  KEY `mdl_blocseardocu_ite_ix` (`itemtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table to store search index backups' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_block_search_documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_cache_filters`
--

CREATE TABLE `mdl_cache_filters` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `filter` varchar(32) NOT NULL DEFAULT '',
  `version` bigint(10) unsigned NOT NULL DEFAULT '0',
  `md5key` varchar(32) NOT NULL DEFAULT '',
  `rawtext` text NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_cachfilt_filmd5_ix` (`filter`,`md5key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='For keeping information about cached data' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_cache_filters`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_cache_flags`
--

CREATE TABLE `mdl_cache_flags` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `flagtype` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `value` mediumtext NOT NULL,
  `expiry` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_cachflag_fla_ix` (`flagtype`),
  KEY `mdl_cachflag_nam_ix` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Cache of time-sensitive flags' AUTO_INCREMENT=48 ;

--
-- Dumping data for table `mdl_cache_flags`
--

INSERT INTO `mdl_cache_flags` VALUES(1, 'accesslib/dirtycontexts', '/1', 1343935970, '1', 1343943170);
INSERT INTO `mdl_cache_flags` VALUES(2, 'accesslib/dirtycontexts', '/1/3/11', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(3, 'accesslib/dirtycontexts', '/1/3/11/21', 1343935965, '1', 1343943165);
INSERT INTO `mdl_cache_flags` VALUES(4, 'accesslib/dirtycontexts', '/1/3/11/18', 1343935965, '1', 1343943165);
INSERT INTO `mdl_cache_flags` VALUES(5, 'accesslib/dirtycontexts', '/1/3/11/12', 1343935965, '1', 1343943165);
INSERT INTO `mdl_cache_flags` VALUES(6, 'accesslib/dirtycontexts', '/1/3/11/13', 1343935965, '1', 1343943165);
INSERT INTO `mdl_cache_flags` VALUES(7, 'accesslib/dirtycontexts', '/1/3/11/14', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(8, 'accesslib/dirtycontexts', '/1/3/11/15', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(9, 'accesslib/dirtycontexts', '/1/3/11/16', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(10, 'accesslib/dirtycontexts', '/1/3/11/17', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(11, 'accesslib/dirtycontexts', '/1/3/11/19', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(12, 'accesslib/dirtycontexts', '/1/3/11/20', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(13, 'accesslib/dirtycontexts', '/1/3', 1343935966, '1', 1343943166);
INSERT INTO `mdl_cache_flags` VALUES(14, 'accesslib/dirtycontexts', '/1/24', 1343936023, '1', 1343943223);
INSERT INTO `mdl_cache_flags` VALUES(15, 'accesslib/dirtycontexts', '/1/25', 1343936037, '1', 1343943237);
INSERT INTO `mdl_cache_flags` VALUES(16, 'accesslib/dirtycontexts', '/1/23/26', 1343936072, '1', 1343943272);
INSERT INTO `mdl_cache_flags` VALUES(17, 'accesslib/dirtycontexts', '/1/24/27', 1343936088, '1', 1343943288);
INSERT INTO `mdl_cache_flags` VALUES(18, 'accesslib/dirtycontexts', '/1/24/28', 1343936106, '1', 1343943306);
INSERT INTO `mdl_cache_flags` VALUES(19, 'accesslib/dirtycontexts', '/1/25/29', 1343936125, '1', 1343943325);
INSERT INTO `mdl_cache_flags` VALUES(20, 'accesslib/dirtycontexts', '/1/25/30', 1343936139, '1', 1343943339);
INSERT INTO `mdl_cache_flags` VALUES(21, 'accesslib/dirtycontexts', '/1/23/31', 1343936229, '1', 1343943429);
INSERT INTO `mdl_cache_flags` VALUES(22, 'accesslib/dirtycontexts', '/1/23/41', 1343936264, '1', 1343943464);
INSERT INTO `mdl_cache_flags` VALUES(23, 'accesslib/dirtycontexts', '/1/23/51', 1343936289, '1', 1343943489);
INSERT INTO `mdl_cache_flags` VALUES(24, 'accesslib/dirtycontexts', '/1/24/27/61', 1343936347, '1', 1343943547);
INSERT INTO `mdl_cache_flags` VALUES(25, 'accesslib/dirtycontexts', '/1/24/27/71', 1343936384, '1', 1343943584);
INSERT INTO `mdl_cache_flags` VALUES(26, 'accesslib/dirtycontexts', '/1/24/27/81', 1343936400, '1', 1343943600);
INSERT INTO `mdl_cache_flags` VALUES(27, 'accesslib/dirtycontexts', '/1/24/28/92', 1343937108, '1', 1343944308);
INSERT INTO `mdl_cache_flags` VALUES(28, 'accesslib/dirtycontexts', '/1/24/28/93', 1343937120, '1', 1343944320);
INSERT INTO `mdl_cache_flags` VALUES(29, 'accesslib/dirtycontexts', '/1/24/28/92/94', 1343937158, '1', 1343944358);
INSERT INTO `mdl_cache_flags` VALUES(30, 'accesslib/dirtycontexts', '/1/24/28/92/104', 1343937183, '1', 1343944383);
INSERT INTO `mdl_cache_flags` VALUES(31, 'accesslib/dirtycontexts', '/1/24/28/92/114', 1343937207, '1', 1343944407);
INSERT INTO `mdl_cache_flags` VALUES(32, 'accesslib/dirtycontexts', '/1/24/28/92/124', 1343937224, '1', 1343944424);
INSERT INTO `mdl_cache_flags` VALUES(33, 'accesslib/dirtycontexts', '/1/24/28/92/134', 1343937243, '1', 1343944443);
INSERT INTO `mdl_cache_flags` VALUES(34, 'accesslib/dirtycontexts', '/1/24/28/92/144', 1343937262, '1', 1343944462);
INSERT INTO `mdl_cache_flags` VALUES(35, 'accesslib/dirtycontexts', '/1/24/28/92/154', 1343937283, '1', 1343944483);
INSERT INTO `mdl_cache_flags` VALUES(36, 'accesslib/dirtycontexts', '/1/24/28/92/164', 1343937298, '1', 1343944498);
INSERT INTO `mdl_cache_flags` VALUES(37, 'accesslib/dirtycontexts', '/1/24/28/92/174', 1343937315, '1', 1343944515);
INSERT INTO `mdl_cache_flags` VALUES(38, 'accesslib/dirtycontexts', '/1/24/28/92/184', 1343937330, '1', 1343944530);
INSERT INTO `mdl_cache_flags` VALUES(39, 'accesslib/dirtycontexts', '/1/24/28/93/194', 1343937346, '1', 1343944546);
INSERT INTO `mdl_cache_flags` VALUES(40, 'accesslib/dirtycontexts', '/1/24/28/93/204', 1343937366, '1', 1343944566);
INSERT INTO `mdl_cache_flags` VALUES(41, 'accesslib/dirtycontexts', '/1/24/28/93/214', 1343937391, '1', 1343944591);
INSERT INTO `mdl_cache_flags` VALUES(42, 'accesslib/dirtycontexts', '/1/24/28/93/224', 1343937411, '1', 1343944611);
INSERT INTO `mdl_cache_flags` VALUES(43, 'accesslib/dirtycontexts', '/1/24/28/93/234', 1343937472, '1', 1343944672);
INSERT INTO `mdl_cache_flags` VALUES(44, 'accesslib/dirtycontexts', '/1/24/28/93/244', 1343937488, '1', 1343944688);
INSERT INTO `mdl_cache_flags` VALUES(45, 'accesslib/dirtycontexts', '/1/24/28/93/254', 1343937529, '1', 1343944729);
INSERT INTO `mdl_cache_flags` VALUES(46, 'accesslib/dirtycontexts', '/1/24/28/93/264', 1343937557, '1', 1343944757);
INSERT INTO `mdl_cache_flags` VALUES(47, 'accesslib/dirtycontexts', '/1/24/28/93/274', 1343937579, '1', 1343944779);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_cache_text`
--

CREATE TABLE `mdl_cache_text` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `md5key` varchar(32) NOT NULL DEFAULT '',
  `formattedtext` longtext NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_cachtext_md5_ix` (`md5key`),
  KEY `mdl_cachtext_tim_ix` (`timemodified`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='For storing temporary copies of processed texts' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mdl_cache_text`
--

INSERT INTO `mdl_cache_text` VALUES(1, '12b155d261cf6d996f88cac9831857ce', '<p>tse</p>', 1343925863);
INSERT INTO `mdl_cache_text` VALUES(2, '78a4ce173d91c7da46906fb706e6b2e4', '<p>General news and announcements</p>', 1343936458);
INSERT INTO `mdl_cache_text` VALUES(3, '852ce679e27fb83349d35513989205c7', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.', 1343936581);
INSERT INTO `mdl_cache_text` VALUES(4, '45199e7c126d32aa8f033100c14d1a1c', 'General news and announcements', 1343936582);
INSERT INTO `mdl_cache_text` VALUES(5, 'c2496941531ae9a0a1accdd8397a3df9', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.', 1343978436);
INSERT INTO `mdl_cache_text` VALUES(6, '78a4daf61540f886f92d4c007349f40a', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.', 1343978436);
INSERT INTO `mdl_cache_text` VALUES(7, '90b50446abca9d9adfbc0ca7e3346099', '<p>tes</p>', 1343938289);
INSERT INTO `mdl_cache_text` VALUES(8, 'b7b614290902b1155235fce3f667af88', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n', 1343978466);
INSERT INTO `mdl_cache_text` VALUES(9, 'f49b3c67669b0a1159f7b56594062c01', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n', 1343978466);
INSERT INTO `mdl_cache_text` VALUES(10, 'ef66c9adfec5e6536aca8104ec73bf12', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n\r\n', 1344234185);
INSERT INTO `mdl_cache_text` VALUES(11, '8a42dbb0daf327e77f8def968f7bfd15', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n\r\n', 1344234187);
INSERT INTO `mdl_cache_text` VALUES(12, 'a0654e4162562a8462ce2b421f60836f', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n\r\n', 1343978491);
INSERT INTO `mdl_cache_text` VALUES(13, '80872f37d4c19ae5c91368d800fa0a38', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n\r\n', 1343978491);
INSERT INTO `mdl_cache_text` VALUES(14, 'c0fcd612a32a0b8bb80ea82708a85d2a', '<div>Dasar Hukum</div><div>Sesuai Peraturan Pemerintah Nomor : 101 Tahun 2000 tentang Pendidikan dan Pelatihan Jabatan Pegawai Negeri (Lembaga Negara Tahun 2000 Nomor : 198, Tambahan Lembaran negara Nomor 4910) dan Surat Keputusan Kepala Lembaga Administrasi Negara Nomor : 540/XIII/10/6/2001 tentang <i><b>Pedoman Penyelenggaraan Pendidikan dan Pelatihan Kepemimpinan Tingkat III</b></i></div>', 1344226907);
INSERT INTO `mdl_cache_text` VALUES(15, '0b3f6d13ba5c8cc2a8632c6defa8c709', '<br /><p class="category">Category: <a href="category.php?id=2">DIKLAT PRAJABATAN</a></p>', 1344231447);
INSERT INTO `mdl_cache_text` VALUES(16, '20432cedb11f8cb18fd4401be0c1345f', '<br /><p class="category">Category: <a href="category.php?id=2">DIKLAT PRAJABATAN</a></p>', 1344231447);
INSERT INTO `mdl_cache_text` VALUES(17, 'b5a13be4f581c14150d0ae6975c8e8ef', '<div>Dasar Hukum</div><div>Sesuai Peraturan Pemerintah Nomor : 101 Tahun 2000 tentang Pendidikan dan Pelatihan Jabatan Pegawai Negeri (Lembaga Negara Tahun 2000 Nomor : 198, Tambahan Lembaran negara Nomor 4910) dan Surat Keputusan Kepala Lembaga Administrasi Negara Nomor : 540/XIII/10/6/2001 tentang <i><b>Pedoman Penyelenggaraan Pendidikan dan Pelatihan Kepemimpinan Tingkat III</b></i></div><br /><p class="category">Category: <a href="category.php?id=2">DIKLAT PRAJABATAN</a></p>', 1344231447);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_capabilities`
--

CREATE TABLE `mdl_capabilities` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `captype` varchar(50) NOT NULL DEFAULT '',
  `contextlevel` bigint(10) unsigned NOT NULL DEFAULT '0',
  `component` varchar(100) NOT NULL DEFAULT '',
  `riskbitmask` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_capa_nam_uix` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this defines all capabilities' AUTO_INCREMENT=231 ;

--
-- Dumping data for table `mdl_capabilities`
--

INSERT INTO `mdl_capabilities` VALUES(1, 'moodle/site:doanything', 'admin', 10, 'moodle', 62);
INSERT INTO `mdl_capabilities` VALUES(2, 'moodle/legacy:guest', 'legacy', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(3, 'moodle/legacy:user', 'legacy', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(4, 'moodle/legacy:student', 'legacy', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(5, 'moodle/legacy:teacher', 'legacy', 10, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(6, 'moodle/legacy:editingteacher', 'legacy', 10, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(7, 'moodle/legacy:coursecreator', 'legacy', 10, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(8, 'moodle/legacy:admin', 'legacy', 10, 'moodle', 62);
INSERT INTO `mdl_capabilities` VALUES(9, 'moodle/site:config', 'write', 10, 'moodle', 62);
INSERT INTO `mdl_capabilities` VALUES(10, 'moodle/site:readallmessages', 'read', 10, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(11, 'moodle/site:sendmessage', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(12, 'moodle/site:approvecourse', 'write', 10, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(13, 'moodle/site:import', 'write', 50, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(14, 'moodle/site:backup', 'write', 50, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(15, 'moodle/backup:userinfo', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(16, 'moodle/site:restore', 'write', 50, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(17, 'moodle/restore:createuser', 'write', 10, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(18, 'moodle/restore:userinfo', 'write', 50, 'moodle', 30);
INSERT INTO `mdl_capabilities` VALUES(19, 'moodle/restore:rolldates', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(20, 'moodle/site:manageblocks', 'write', 80, 'moodle', 20);
INSERT INTO `mdl_capabilities` VALUES(21, 'moodle/site:accessallgroups', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(22, 'moodle/site:viewfullnames', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(23, 'moodle/site:viewreports', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(24, 'moodle/site:trustcontent', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(25, 'moodle/site:uploadusers', 'write', 10, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(26, 'moodle/site:langeditmaster', 'write', 10, 'moodle', 6);
INSERT INTO `mdl_capabilities` VALUES(27, 'moodle/site:langeditlocal', 'write', 10, 'moodle', 6);
INSERT INTO `mdl_capabilities` VALUES(28, 'moodle/user:create', 'write', 10, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(29, 'moodle/user:delete', 'write', 10, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(30, 'moodle/user:update', 'write', 10, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(31, 'moodle/user:viewdetails', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(32, 'moodle/user:viewhiddendetails', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(33, 'moodle/user:loginas', 'write', 50, 'moodle', 30);
INSERT INTO `mdl_capabilities` VALUES(34, 'moodle/role:assign', 'write', 50, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(35, 'moodle/role:override', 'write', 50, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(36, 'moodle/role:safeoverride', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(37, 'moodle/role:manage', 'write', 10, 'moodle', 28);
INSERT INTO `mdl_capabilities` VALUES(38, 'moodle/role:unassignself', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(39, 'moodle/role:viewhiddenassigns', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(40, 'moodle/role:switchroles', 'read', 50, 'moodle', 12);
INSERT INTO `mdl_capabilities` VALUES(41, 'moodle/category:manage', 'write', 40, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(42, 'moodle/category:viewhiddencategories', 'read', 40, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(43, 'moodle/course:create', 'write', 40, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(44, 'moodle/course:request', 'write', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(45, 'moodle/course:delete', 'write', 50, 'moodle', 32);
INSERT INTO `mdl_capabilities` VALUES(46, 'moodle/course:update', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(47, 'moodle/course:view', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(48, 'moodle/course:bulkmessaging', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(49, 'moodle/course:viewhiddenuserfields', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(50, 'moodle/course:viewhiddencourses', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(51, 'moodle/course:visibility', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(52, 'moodle/course:managefiles', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(53, 'moodle/course:manageactivities', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(54, 'moodle/course:managemetacourse', 'write', 50, 'moodle', 12);
INSERT INTO `mdl_capabilities` VALUES(55, 'moodle/course:activityvisibility', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(56, 'moodle/course:viewhiddenactivities', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(57, 'moodle/course:viewparticipants', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(58, 'moodle/course:changefullname', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(59, 'moodle/course:changeshortname', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(60, 'moodle/course:changeidnumber', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(61, 'moodle/course:changecategory', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(62, 'moodle/course:changesummary', 'write', 50, 'moodle', 4);
INSERT INTO `mdl_capabilities` VALUES(63, 'moodle/site:viewparticipants', 'read', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(64, 'moodle/course:viewscales', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(65, 'moodle/course:managescales', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(66, 'moodle/course:managegroups', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(67, 'moodle/course:reset', 'write', 50, 'moodle', 32);
INSERT INTO `mdl_capabilities` VALUES(68, 'moodle/blog:view', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(69, 'moodle/blog:create', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(70, 'moodle/blog:manageentries', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(71, 'moodle/calendar:manageownentries', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(72, 'moodle/calendar:managegroupentries', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(73, 'moodle/calendar:manageentries', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(74, 'moodle/user:editprofile', 'write', 30, 'moodle', 24);
INSERT INTO `mdl_capabilities` VALUES(75, 'moodle/user:editownprofile', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(76, 'moodle/user:changeownpassword', 'write', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(77, 'moodle/user:readuserposts', 'read', 30, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(78, 'moodle/user:readuserblogs', 'read', 30, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(79, 'moodle/user:viewuseractivitiesreport', 'read', 30, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(80, 'moodle/question:managecategory', 'write', 50, 'moodle', 20);
INSERT INTO `mdl_capabilities` VALUES(81, 'moodle/question:add', 'write', 50, 'moodle', 20);
INSERT INTO `mdl_capabilities` VALUES(82, 'moodle/question:editmine', 'write', 50, 'moodle', 20);
INSERT INTO `mdl_capabilities` VALUES(83, 'moodle/question:editall', 'write', 50, 'moodle', 20);
INSERT INTO `mdl_capabilities` VALUES(84, 'moodle/question:viewmine', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(85, 'moodle/question:viewall', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(86, 'moodle/question:usemine', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(87, 'moodle/question:useall', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(88, 'moodle/question:movemine', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(89, 'moodle/question:moveall', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(90, 'moodle/question:config', 'write', 10, 'moodle', 2);
INSERT INTO `mdl_capabilities` VALUES(91, 'moodle/site:doclinks', 'read', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(92, 'moodle/course:sectionvisibility', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(93, 'moodle/course:useremail', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(94, 'moodle/course:viewhiddensections', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(95, 'moodle/course:setcurrentsection', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(96, 'moodle/site:mnetlogintoremote', 'read', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(97, 'moodle/grade:viewall', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(98, 'moodle/grade:view', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(99, 'moodle/grade:viewhidden', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(100, 'moodle/grade:import', 'write', 50, 'moodle', 12);
INSERT INTO `mdl_capabilities` VALUES(101, 'moodle/grade:export', 'read', 50, 'moodle', 8);
INSERT INTO `mdl_capabilities` VALUES(102, 'moodle/grade:manage', 'write', 50, 'moodle', 12);
INSERT INTO `mdl_capabilities` VALUES(103, 'moodle/grade:edit', 'write', 50, 'moodle', 12);
INSERT INTO `mdl_capabilities` VALUES(104, 'moodle/grade:manageoutcomes', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(105, 'moodle/grade:manageletters', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(106, 'moodle/grade:hide', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(107, 'moodle/grade:lock', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(108, 'moodle/grade:unlock', 'write', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(109, 'moodle/my:manageblocks', 'write', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(110, 'moodle/notes:view', 'read', 50, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(111, 'moodle/notes:manage', 'write', 50, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(112, 'moodle/tag:manage', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(113, 'moodle/tag:create', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(114, 'moodle/tag:edit', 'write', 10, 'moodle', 16);
INSERT INTO `mdl_capabilities` VALUES(115, 'moodle/tag:editblocks', 'write', 10, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(116, 'moodle/block:view', 'read', 80, 'moodle', 0);
INSERT INTO `mdl_capabilities` VALUES(117, 'mod/assignment:view', 'read', 70, 'mod/assignment', 0);
INSERT INTO `mdl_capabilities` VALUES(118, 'mod/assignment:submit', 'write', 70, 'mod/assignment', 0);
INSERT INTO `mdl_capabilities` VALUES(119, 'mod/assignment:grade', 'write', 70, 'mod/assignment', 4);
INSERT INTO `mdl_capabilities` VALUES(120, 'mod/chat:chat', 'write', 70, 'mod/chat', 16);
INSERT INTO `mdl_capabilities` VALUES(121, 'mod/chat:readlog', 'read', 70, 'mod/chat', 0);
INSERT INTO `mdl_capabilities` VALUES(122, 'mod/chat:deletelog', 'write', 70, 'mod/chat', 0);
INSERT INTO `mdl_capabilities` VALUES(123, 'mod/choice:choose', 'write', 70, 'mod/choice', 0);
INSERT INTO `mdl_capabilities` VALUES(124, 'mod/choice:readresponses', 'read', 70, 'mod/choice', 0);
INSERT INTO `mdl_capabilities` VALUES(125, 'mod/choice:deleteresponses', 'write', 70, 'mod/choice', 0);
INSERT INTO `mdl_capabilities` VALUES(126, 'mod/choice:downloadresponses', 'read', 70, 'mod/choice', 0);
INSERT INTO `mdl_capabilities` VALUES(127, 'mod/data:viewentry', 'read', 70, 'mod/data', 0);
INSERT INTO `mdl_capabilities` VALUES(128, 'mod/data:writeentry', 'write', 70, 'mod/data', 16);
INSERT INTO `mdl_capabilities` VALUES(129, 'mod/data:comment', 'write', 70, 'mod/data', 16);
INSERT INTO `mdl_capabilities` VALUES(130, 'mod/data:viewrating', 'read', 70, 'mod/data', 0);
INSERT INTO `mdl_capabilities` VALUES(131, 'mod/data:rate', 'write', 70, 'mod/data', 0);
INSERT INTO `mdl_capabilities` VALUES(132, 'mod/data:approve', 'write', 70, 'mod/data', 16);
INSERT INTO `mdl_capabilities` VALUES(133, 'mod/data:manageentries', 'write', 70, 'mod/data', 16);
INSERT INTO `mdl_capabilities` VALUES(134, 'mod/data:managecomments', 'write', 70, 'mod/data', 16);
INSERT INTO `mdl_capabilities` VALUES(135, 'mod/data:managetemplates', 'write', 70, 'mod/data', 20);
INSERT INTO `mdl_capabilities` VALUES(136, 'mod/data:viewalluserpresets', 'read', 70, 'mod/data', 0);
INSERT INTO `mdl_capabilities` VALUES(137, 'mod/data:manageuserpresets', 'write', 70, 'mod/data', 20);
INSERT INTO `mdl_capabilities` VALUES(138, 'mod/forum:viewdiscussion', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(139, 'mod/forum:viewhiddentimedposts', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(140, 'mod/forum:startdiscussion', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(141, 'mod/forum:replypost', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(142, 'mod/forum:addnews', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(143, 'mod/forum:replynews', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(144, 'mod/forum:viewrating', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(145, 'mod/forum:viewanyrating', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(146, 'mod/forum:rate', 'write', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(147, 'mod/forum:createattachment', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(148, 'mod/forum:deleteownpost', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(149, 'mod/forum:deleteanypost', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(150, 'mod/forum:splitdiscussions', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(151, 'mod/forum:movediscussions', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(152, 'mod/forum:editanypost', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(153, 'mod/forum:viewqandawithoutposting', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(154, 'mod/forum:viewsubscribers', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(155, 'mod/forum:managesubscriptions', 'read', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(156, 'mod/forum:initialsubscriptions', 'read', 70, 'mod/forum', 0);
INSERT INTO `mdl_capabilities` VALUES(157, 'mod/forum:throttlingapplies', 'write', 70, 'mod/forum', 16);
INSERT INTO `mdl_capabilities` VALUES(158, 'mod/glossary:write', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(159, 'mod/glossary:manageentries', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(160, 'mod/glossary:managecategories', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(161, 'mod/glossary:comment', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(162, 'mod/glossary:managecomments', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(163, 'mod/glossary:import', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(164, 'mod/glossary:export', 'read', 70, 'mod/glossary', 0);
INSERT INTO `mdl_capabilities` VALUES(165, 'mod/glossary:approve', 'write', 70, 'mod/glossary', 16);
INSERT INTO `mdl_capabilities` VALUES(166, 'mod/glossary:rate', 'write', 70, 'mod/glossary', 0);
INSERT INTO `mdl_capabilities` VALUES(167, 'mod/glossary:viewrating', 'read', 70, 'mod/glossary', 0);
INSERT INTO `mdl_capabilities` VALUES(168, 'mod/hotpot:attempt', 'read', 70, 'mod/hotpot', 0);
INSERT INTO `mdl_capabilities` VALUES(169, 'mod/hotpot:viewreport', 'read', 70, 'mod/hotpot', 0);
INSERT INTO `mdl_capabilities` VALUES(170, 'mod/hotpot:grade', 'read', 70, 'mod/hotpot', 0);
INSERT INTO `mdl_capabilities` VALUES(171, 'mod/hotpot:deleteattempt', 'read', 70, 'mod/hotpot', 0);
INSERT INTO `mdl_capabilities` VALUES(172, 'mod/lams:participate', 'write', 70, 'mod/lams', 0);
INSERT INTO `mdl_capabilities` VALUES(173, 'mod/lams:manage', 'write', 70, 'mod/lams', 0);
INSERT INTO `mdl_capabilities` VALUES(174, 'mod/lesson:edit', 'write', 70, 'mod/lesson', 4);
INSERT INTO `mdl_capabilities` VALUES(175, 'mod/lesson:manage', 'write', 70, 'mod/lesson', 0);
INSERT INTO `mdl_capabilities` VALUES(176, 'mod/quiz:view', 'read', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(177, 'mod/quiz:attempt', 'write', 70, 'mod/quiz', 16);
INSERT INTO `mdl_capabilities` VALUES(178, 'mod/quiz:reviewmyattempts', 'read', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(179, 'mod/quiz:manage', 'write', 70, 'mod/quiz', 16);
INSERT INTO `mdl_capabilities` VALUES(180, 'mod/quiz:preview', 'write', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(181, 'mod/quiz:grade', 'write', 70, 'mod/quiz', 16);
INSERT INTO `mdl_capabilities` VALUES(182, 'mod/quiz:viewreports', 'read', 70, 'mod/quiz', 8);
INSERT INTO `mdl_capabilities` VALUES(183, 'mod/quiz:deleteattempts', 'write', 70, 'mod/quiz', 32);
INSERT INTO `mdl_capabilities` VALUES(184, 'mod/quiz:ignoretimelimits', 'read', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(185, 'mod/quiz:emailconfirmsubmission', 'read', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(186, 'mod/quiz:emailnotifysubmission', 'read', 70, 'mod/quiz', 0);
INSERT INTO `mdl_capabilities` VALUES(187, 'mod/scorm:viewreport', 'read', 70, 'mod/scorm', 0);
INSERT INTO `mdl_capabilities` VALUES(188, 'mod/scorm:skipview', 'write', 70, 'mod/scorm', 0);
INSERT INTO `mdl_capabilities` VALUES(189, 'mod/scorm:savetrack', 'write', 70, 'mod/scorm', 0);
INSERT INTO `mdl_capabilities` VALUES(190, 'mod/scorm:viewscores', 'read', 70, 'mod/scorm', 0);
INSERT INTO `mdl_capabilities` VALUES(191, 'mod/scorm:deleteresponses', 'read', 70, 'mod/scorm', 0);
INSERT INTO `mdl_capabilities` VALUES(192, 'mod/survey:participate', 'read', 70, 'mod/survey', 0);
INSERT INTO `mdl_capabilities` VALUES(193, 'mod/survey:readresponses', 'read', 70, 'mod/survey', 0);
INSERT INTO `mdl_capabilities` VALUES(194, 'mod/survey:download', 'read', 70, 'mod/survey', 0);
INSERT INTO `mdl_capabilities` VALUES(195, 'mod/wiki:participate', 'write', 70, 'mod/wiki', 16);
INSERT INTO `mdl_capabilities` VALUES(196, 'mod/wiki:manage', 'write', 70, 'mod/wiki', 16);
INSERT INTO `mdl_capabilities` VALUES(197, 'mod/wiki:overridelock', 'write', 70, 'mod/wiki', 0);
INSERT INTO `mdl_capabilities` VALUES(198, 'mod/workshop:participate', 'write', 70, 'mod/workshop', 16);
INSERT INTO `mdl_capabilities` VALUES(199, 'mod/workshop:manage', 'write', 70, 'mod/workshop', 16);
INSERT INTO `mdl_capabilities` VALUES(200, 'block/online_users:viewlist', 'read', 80, 'block/online_users', 0);
INSERT INTO `mdl_capabilities` VALUES(201, 'block/rss_client:createprivatefeeds', 'write', 80, 'block/rss_client', 0);
INSERT INTO `mdl_capabilities` VALUES(202, 'block/rss_client:createsharedfeeds', 'write', 80, 'block/rss_client', 16);
INSERT INTO `mdl_capabilities` VALUES(203, 'block/rss_client:manageownfeeds', 'write', 80, 'block/rss_client', 0);
INSERT INTO `mdl_capabilities` VALUES(204, 'block/rss_client:manageanyfeeds', 'write', 80, 'block/rss_client', 16);
INSERT INTO `mdl_capabilities` VALUES(205, 'enrol/authorize:managepayments', 'write', 10, 'enrol/authorize', 8);
INSERT INTO `mdl_capabilities` VALUES(206, 'enrol/authorize:uploadcsv', 'write', 10, 'enrol/authorize', 4);
INSERT INTO `mdl_capabilities` VALUES(207, 'gradeexport/ods:view', 'read', 50, 'gradeexport/ods', 8);
INSERT INTO `mdl_capabilities` VALUES(208, 'gradeexport/ods:publish', 'read', 50, 'gradeexport/ods', 8);
INSERT INTO `mdl_capabilities` VALUES(209, 'gradeexport/txt:view', 'read', 50, 'gradeexport/txt', 8);
INSERT INTO `mdl_capabilities` VALUES(210, 'gradeexport/txt:publish', 'read', 50, 'gradeexport/txt', 8);
INSERT INTO `mdl_capabilities` VALUES(211, 'gradeexport/xls:view', 'read', 50, 'gradeexport/xls', 8);
INSERT INTO `mdl_capabilities` VALUES(212, 'gradeexport/xls:publish', 'read', 50, 'gradeexport/xls', 8);
INSERT INTO `mdl_capabilities` VALUES(213, 'gradeexport/xml:view', 'read', 50, 'gradeexport/xml', 8);
INSERT INTO `mdl_capabilities` VALUES(214, 'gradeexport/xml:publish', 'read', 50, 'gradeexport/xml', 8);
INSERT INTO `mdl_capabilities` VALUES(215, 'gradeimport/csv:view', 'write', 50, 'gradeimport/csv', 0);
INSERT INTO `mdl_capabilities` VALUES(216, 'gradeimport/xml:view', 'write', 50, 'gradeimport/xml', 0);
INSERT INTO `mdl_capabilities` VALUES(217, 'gradeimport/xml:publish', 'write', 50, 'gradeimport/xml', 0);
INSERT INTO `mdl_capabilities` VALUES(218, 'gradereport/grader:view', 'read', 50, 'gradereport/grader', 8);
INSERT INTO `mdl_capabilities` VALUES(219, 'gradereport/outcomes:view', 'read', 50, 'gradereport/outcomes', 8);
INSERT INTO `mdl_capabilities` VALUES(220, 'gradereport/overview:view', 'read', 50, 'gradereport/overview', 8);
INSERT INTO `mdl_capabilities` VALUES(221, 'gradereport/user:view', 'read', 50, 'gradereport/user', 8);
INSERT INTO `mdl_capabilities` VALUES(222, 'coursereport/log:view', 'read', 50, 'coursereport/log', 8);
INSERT INTO `mdl_capabilities` VALUES(223, 'coursereport/log:viewlive', 'read', 50, 'coursereport/log', 8);
INSERT INTO `mdl_capabilities` VALUES(224, 'coursereport/log:viewtoday', 'read', 50, 'coursereport/log', 8);
INSERT INTO `mdl_capabilities` VALUES(225, 'coursereport/outline:view', 'read', 50, 'coursereport/outline', 8);
INSERT INTO `mdl_capabilities` VALUES(226, 'coursereport/participation:view', 'read', 50, 'coursereport/participation', 8);
INSERT INTO `mdl_capabilities` VALUES(227, 'coursereport/stats:view', 'read', 50, 'coursereport/stats', 8);
INSERT INTO `mdl_capabilities` VALUES(228, 'report/courseoverview:view', 'read', 10, 'report/courseoverview', 8);
INSERT INTO `mdl_capabilities` VALUES(229, 'report/security:view', 'read', 10, 'report/security', 2);
INSERT INTO `mdl_capabilities` VALUES(230, 'report/unittest:view', 'read', 10, 'report/unittest', 32);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_chat`
--

CREATE TABLE `mdl_chat` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `keepdays` bigint(11) NOT NULL DEFAULT '0',
  `studentlogs` smallint(4) NOT NULL DEFAULT '0',
  `chattime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `schedule` smallint(4) NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_chat_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Each of these is a chat room' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_chat_messages`
--

CREATE TABLE `mdl_chat_messages` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatid` bigint(10) NOT NULL DEFAULT '0',
  `userid` bigint(10) NOT NULL DEFAULT '0',
  `groupid` bigint(10) NOT NULL DEFAULT '0',
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `timestamp` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_chatmess_use_ix` (`userid`),
  KEY `mdl_chatmess_gro_ix` (`groupid`),
  KEY `mdl_chatmess_timcha_ix` (`timestamp`,`chatid`),
  KEY `mdl_chatmess_cha_ix` (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all the actual chat messages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_chat_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_chat_users`
--

CREATE TABLE `mdl_chat_users` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatid` bigint(11) NOT NULL DEFAULT '0',
  `userid` bigint(11) NOT NULL DEFAULT '0',
  `groupid` bigint(11) NOT NULL DEFAULT '0',
  `version` varchar(16) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `firstping` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastping` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastmessageping` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sid` varchar(32) NOT NULL DEFAULT '',
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lang` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_chatuser_use_ix` (`userid`),
  KEY `mdl_chatuser_las_ix` (`lastping`),
  KEY `mdl_chatuser_gro_ix` (`groupid`),
  KEY `mdl_chatuser_cha_ix` (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keeps track of which users are in which chat rooms' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_chat_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_choice`
--

CREATE TABLE `mdl_choice` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `format` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `publish` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `showresults` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `display` smallint(4) unsigned NOT NULL DEFAULT '0',
  `allowupdate` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `showunanswered` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `limitanswers` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `timeopen` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeclose` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_choi_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Available choices are stored here' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_choice`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_choice_answers`
--

CREATE TABLE `mdl_choice_answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `choiceid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `optionid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_choiansw_use_ix` (`userid`),
  KEY `mdl_choiansw_cho_ix` (`choiceid`),
  KEY `mdl_choiansw_opt_ix` (`optionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='choices performed by users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_choice_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_choice_options`
--

CREATE TABLE `mdl_choice_options` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `choiceid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `text` text,
  `maxanswers` bigint(10) unsigned DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_choiopti_cho_ix` (`choiceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='available options to choice' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_choice_options`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_config`
--

CREATE TABLE `mdl_config` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_conf_nam_uix` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Moodle configuration variables' AUTO_INCREMENT=432 ;

--
-- Dumping data for table `mdl_config`
--

INSERT INTO `mdl_config` VALUES(1, 'unicodedb', '1');
INSERT INTO `mdl_config` VALUES(2, 'statsrolesupgraded', '1343876371');
INSERT INTO `mdl_config` VALUES(3, 'auth', 'email');
INSERT INTO `mdl_config` VALUES(4, 'auth_pop3mailbox', 'INBOX');
INSERT INTO `mdl_config` VALUES(5, 'enrol', 'manual');
INSERT INTO `mdl_config` VALUES(6, 'enrol_plugins_enabled', 'manual');
INSERT INTO `mdl_config` VALUES(7, 'style', 'default');
INSERT INTO `mdl_config` VALUES(8, 'template', 'default');
INSERT INTO `mdl_config` VALUES(9, 'theme', 'dephub');
INSERT INTO `mdl_config` VALUES(10, 'filter_multilang_converted', '1');
INSERT INTO `mdl_config` VALUES(12, 'guestloginbutton', '1');
INSERT INTO `mdl_config` VALUES(13, 'alternateloginurl', '');
INSERT INTO `mdl_config` VALUES(14, 'forgottenpasswordurl', '');
INSERT INTO `mdl_config` VALUES(15, 'auth_instructions', '');
INSERT INTO `mdl_config` VALUES(16, 'allowemailaddresses', '');
INSERT INTO `mdl_config` VALUES(17, 'denyemailaddresses', '');
INSERT INTO `mdl_config` VALUES(18, 'verifychangedemail', '1');
INSERT INTO `mdl_config` VALUES(19, 'recaptchapublickey', '');
INSERT INTO `mdl_config` VALUES(20, 'recaptchaprivatekey', '');
INSERT INTO `mdl_config` VALUES(21, 'nodefaultuserrolelists', '0');
INSERT INTO `mdl_config` VALUES(22, 'autologinguests', '0');
INSERT INTO `mdl_config` VALUES(23, 'hiddenuserfields', '');
INSERT INTO `mdl_config` VALUES(24, 'allowuserswitchrolestheycantassign', '0');
INSERT INTO `mdl_config` VALUES(25, 'enablecourserequests', '0');
INSERT INTO `mdl_config` VALUES(26, 'courserequestnotify', '');
INSERT INTO `mdl_config` VALUES(27, 'timezone', '7.0');
INSERT INTO `mdl_config` VALUES(28, 'forcetimezone', '99');
INSERT INTO `mdl_config` VALUES(29, 'country', '0');
INSERT INTO `mdl_config` VALUES(30, 'geoipfile', '/Applications/MAMP/htdocs/dephub/assets/moodledata/geoip/GeoLiteCity.dat');
INSERT INTO `mdl_config` VALUES(31, 'googlemapkey', '');
INSERT INTO `mdl_config` VALUES(32, 'autolang', '1');
INSERT INTO `mdl_config` VALUES(33, 'lang', 'en_utf8');
INSERT INTO `mdl_config` VALUES(34, 'langmenu', '1');
INSERT INTO `mdl_config` VALUES(35, 'langlist', '');
INSERT INTO `mdl_config` VALUES(36, 'langcache', '1');
INSERT INTO `mdl_config` VALUES(37, 'locale', '');
INSERT INTO `mdl_config` VALUES(38, 'latinexcelexport', '0');
INSERT INTO `mdl_config` VALUES(39, 'cachetext', '60');
INSERT INTO `mdl_config` VALUES(40, 'filteruploadedfiles', '0');
INSERT INTO `mdl_config` VALUES(41, 'filtermatchoneperpage', '0');
INSERT INTO `mdl_config` VALUES(42, 'filtermatchonepertext', '0');
INSERT INTO `mdl_config` VALUES(43, 'filterall', '0');
INSERT INTO `mdl_config` VALUES(44, 'filter_multilang_force_old', '0');
INSERT INTO `mdl_config` VALUES(45, 'filter_mediaplugin_enable_mp3', '1');
INSERT INTO `mdl_config` VALUES(46, 'filter_mediaplugin_enable_swf', '0');
INSERT INTO `mdl_config` VALUES(47, 'filter_mediaplugin_enable_mov', '1');
INSERT INTO `mdl_config` VALUES(48, 'filter_mediaplugin_enable_wmv', '1');
INSERT INTO `mdl_config` VALUES(49, 'filter_mediaplugin_enable_mpg', '1');
INSERT INTO `mdl_config` VALUES(50, 'filter_mediaplugin_enable_avi', '1');
INSERT INTO `mdl_config` VALUES(51, 'filter_mediaplugin_enable_flv', '1');
INSERT INTO `mdl_config` VALUES(52, 'filter_mediaplugin_enable_ram', '1');
INSERT INTO `mdl_config` VALUES(53, 'filter_mediaplugin_enable_rpm', '1');
INSERT INTO `mdl_config` VALUES(54, 'filter_mediaplugin_enable_rm', '1');
INSERT INTO `mdl_config` VALUES(55, 'filter_mediaplugin_enable_youtube', '0');
INSERT INTO `mdl_config` VALUES(56, 'filter_mediaplugin_enable_ogg', '1');
INSERT INTO `mdl_config` VALUES(57, 'filter_mediaplugin_enable_ogv', '1');
INSERT INTO `mdl_config` VALUES(58, 'filter_tex_latexpreamble', '\\usepackage[latin1]{inputenc}\n\\usepackage{amsmath}\n\\usepackage{amsfonts}\n\\RequirePackage{amsmath,amssymb,latexsym}\n');
INSERT INTO `mdl_config` VALUES(59, 'filter_tex_latexbackground', '#FFFFFF');
INSERT INTO `mdl_config` VALUES(60, 'filter_tex_density', '120');
INSERT INTO `mdl_config` VALUES(61, 'filter_tex_pathlatex', '/sw/bin/latex');
INSERT INTO `mdl_config` VALUES(62, 'filter_tex_pathdvips', '/sw/bin/dvips');
INSERT INTO `mdl_config` VALUES(63, 'filter_tex_pathconvert', '/sw/bin/convert');
INSERT INTO `mdl_config` VALUES(64, 'filter_tex_convertformat', 'gif');
INSERT INTO `mdl_config` VALUES(65, 'filter_censor_badwords', '');
INSERT INTO `mdl_config` VALUES(66, 'protectusernames', '1');
INSERT INTO `mdl_config` VALUES(67, 'forcelogin', '0');
INSERT INTO `mdl_config` VALUES(68, 'forceloginforprofiles', '1');
INSERT INTO `mdl_config` VALUES(69, 'forceloginforprofileimage', '0');
INSERT INTO `mdl_config` VALUES(70, 'opentogoogle', '0');
INSERT INTO `mdl_config` VALUES(71, 'maxbytes', '0');
INSERT INTO `mdl_config` VALUES(72, 'messaging', '1');
INSERT INTO `mdl_config` VALUES(73, 'allowobjectembed', '0');
INSERT INTO `mdl_config` VALUES(74, 'enabletrusttext', '0');
INSERT INTO `mdl_config` VALUES(75, 'maxeditingtime', '1800');
INSERT INTO `mdl_config` VALUES(76, 'fullnamedisplay', 'language');
INSERT INTO `mdl_config` VALUES(77, 'extendedusernamechars', '0');
INSERT INTO `mdl_config` VALUES(78, 'sitepolicy', '');
INSERT INTO `mdl_config` VALUES(79, 'bloglevel', '4');
INSERT INTO `mdl_config` VALUES(80, 'usetags', '1');
INSERT INTO `mdl_config` VALUES(81, 'keeptagnamecase', '1');
INSERT INTO `mdl_config` VALUES(82, 'profilesforenrolledusersonly', '1');
INSERT INTO `mdl_config` VALUES(83, 'cronclionly', '0');
INSERT INTO `mdl_config` VALUES(84, 'cronremotepassword', '');
INSERT INTO `mdl_config` VALUES(85, 'passwordpolicy', '1');
INSERT INTO `mdl_config` VALUES(86, 'minpasswordlength', '4');
INSERT INTO `mdl_config` VALUES(87, 'minpassworddigits', '0');
INSERT INTO `mdl_config` VALUES(88, 'minpasswordlower', '0');
INSERT INTO `mdl_config` VALUES(89, 'minpasswordupper', '0');
INSERT INTO `mdl_config` VALUES(90, 'minpasswordnonalphanum', '0');
INSERT INTO `mdl_config` VALUES(91, 'disableuserimages', '0');
INSERT INTO `mdl_config` VALUES(92, 'emailchangeconfirmation', '1');
INSERT INTO `mdl_config` VALUES(93, 'enablenotes', '1');
INSERT INTO `mdl_config` VALUES(94, 'loginhttps', '0');
INSERT INTO `mdl_config` VALUES(95, 'cookiesecure', '0');
INSERT INTO `mdl_config` VALUES(96, 'cookiehttponly', '0');
INSERT INTO `mdl_config` VALUES(97, 'regenloginsession', '1');
INSERT INTO `mdl_config` VALUES(98, 'excludeoldflashclients', '10.0.12');
INSERT INTO `mdl_config` VALUES(99, 'loginpasswordautocomplete', '0');
INSERT INTO `mdl_config` VALUES(100, 'restrictmodulesfor', 'none');
INSERT INTO `mdl_config` VALUES(101, 'restrictbydefault', '0');
INSERT INTO `mdl_config` VALUES(102, 'displayloginfailures', '');
INSERT INTO `mdl_config` VALUES(103, 'notifyloginfailures', '');
INSERT INTO `mdl_config` VALUES(104, 'notifyloginthreshold', '10');
INSERT INTO `mdl_config` VALUES(105, 'runclamonupload', '0');
INSERT INTO `mdl_config` VALUES(106, 'pathtoclam', '');
INSERT INTO `mdl_config` VALUES(107, 'quarantinedir', '');
INSERT INTO `mdl_config` VALUES(108, 'clamfailureonupload', 'donothing');
INSERT INTO `mdl_config` VALUES(109, 'themelist', '');
INSERT INTO `mdl_config` VALUES(110, 'allowuserthemes', '0');
INSERT INTO `mdl_config` VALUES(111, 'allowcoursethemes', '0');
INSERT INTO `mdl_config` VALUES(112, 'allowcategorythemes', '0');
INSERT INTO `mdl_config` VALUES(113, 'allowuserblockhiding', '1');
INSERT INTO `mdl_config` VALUES(114, 'showblocksonmodpages', '0');
INSERT INTO `mdl_config` VALUES(115, 'hideactivitytypenavlink', '0');
INSERT INTO `mdl_config` VALUES(116, 'calendar_adminseesall', '0');
INSERT INTO `mdl_config` VALUES(117, 'calendar_site_timeformat', '0');
INSERT INTO `mdl_config` VALUES(118, 'calendar_startwday', '0');
INSERT INTO `mdl_config` VALUES(119, 'calendar_weekend', '65');
INSERT INTO `mdl_config` VALUES(120, 'calendar_lookahead', '21');
INSERT INTO `mdl_config` VALUES(121, 'calendar_maxevents', '10');
INSERT INTO `mdl_config` VALUES(122, 'enablecalendarexport', '1');
INSERT INTO `mdl_config` VALUES(123, 'calendar_exportsalt', 'byaP8YlxV0DWdIX5hi9ZBKewZFRQaFGSnsvWqY199s26NOP6IA7cyGrarhKT');
INSERT INTO `mdl_config` VALUES(124, 'htmleditor', '1');
INSERT INTO `mdl_config` VALUES(125, 'editorbackgroundcolor', '#ffffff');
INSERT INTO `mdl_config` VALUES(126, 'editorfontfamily', 'Trebuchet MS,Verdana,Arial,Helvetica,sans-serif');
INSERT INTO `mdl_config` VALUES(127, 'editorfontsize', '10pt');
INSERT INTO `mdl_config` VALUES(128, 'editorfontlist', 'Trebuchet:Trebuchet MS,Verdana,Arial,Helvetica,sans-serif;Arial:arial,helvetica,sans-serif;Courier New:courier new,courier,monospace;Georgia:georgia,times new roman,times,serif;Tahoma:tahoma,arial,helvetica,sans-serif;Times New Roman:times new roman,times,serif;Verdana:verdana,arial,helvetica,sans-serif;Impact:impact;Wingdings:wingdings');
INSERT INTO `mdl_config` VALUES(129, 'editorkillword', '1');
INSERT INTO `mdl_config` VALUES(130, 'editorhidebuttons', '');
INSERT INTO `mdl_config` VALUES(131, 'emoticons', ':-){:}smiley{;}:){:}smiley{;}:-D{:}biggrin{;};-){:}wink{;}:-/{:}mixed{;}V-.{:}thoughtful{;}:-P{:}tongueout{;}B-){:}cool{;}^-){:}approve{;}8-){:}wideeyes{;}:o){:}clown{;}:-({:}sad{;}:({:}sad{;}8-.{:}shy{;}:-I{:}blush{;}:-X{:}kiss{;}8-o{:}surprise{;}P-|{:}blackeye{;}8-[{:}angry{;}xx-P{:}dead{;}|-.{:}sleepy{;}}-]{:}evil{;}(h){:}heart{;}(heart){:}heart{;}(y){:}yes{;}(n){:}no{;}(martin){:}martin{;}( ){:}egg');
INSERT INTO `mdl_config` VALUES(132, 'formatstringstriptags', '1');
INSERT INTO `mdl_config` VALUES(133, 'docroot', 'http://docs.moodle.org');
INSERT INTO `mdl_config` VALUES(134, 'doctonewwindow', '0');
INSERT INTO `mdl_config` VALUES(135, 'mymoodleredirect', '0');
INSERT INTO `mdl_config` VALUES(136, 'mycoursesperpage', '21');
INSERT INTO `mdl_config` VALUES(137, 'enableajax', '1');
INSERT INTO `mdl_config` VALUES(138, 'disablecourseajax', '1');
INSERT INTO `mdl_config` VALUES(139, 'gdversion', '2');
INSERT INTO `mdl_config` VALUES(140, 'zip', '');
INSERT INTO `mdl_config` VALUES(141, 'unzip', '');
INSERT INTO `mdl_config` VALUES(142, 'pathtodu', '');
INSERT INTO `mdl_config` VALUES(143, 'aspellpath', '');
INSERT INTO `mdl_config` VALUES(144, 'smtphosts', '');
INSERT INTO `mdl_config` VALUES(145, 'smtpuser', '');
INSERT INTO `mdl_config` VALUES(146, 'smtppass', '');
INSERT INTO `mdl_config` VALUES(147, 'smtpmaxbulk', '1');
INSERT INTO `mdl_config` VALUES(148, 'noreplyaddress', 'noreply@localhost');
INSERT INTO `mdl_config` VALUES(149, 'digestmailtime', '17');
INSERT INTO `mdl_config` VALUES(150, 'sitemailcharset', '0');
INSERT INTO `mdl_config` VALUES(151, 'allowusermailcharset', '0');
INSERT INTO `mdl_config` VALUES(152, 'mailnewline', 'LF');
INSERT INTO `mdl_config` VALUES(153, 'supportpage', '');
INSERT INTO `mdl_config` VALUES(154, 'dbsessions', '0');
INSERT INTO `mdl_config` VALUES(155, 'sessiontimeout', '7200');
INSERT INTO `mdl_config` VALUES(156, 'sessioncookie', '');
INSERT INTO `mdl_config` VALUES(157, 'sessioncookiepath', '/');
INSERT INTO `mdl_config` VALUES(158, 'sessioncookiedomain', '');
INSERT INTO `mdl_config` VALUES(159, 'enablerssfeeds', '0');
INSERT INTO `mdl_config` VALUES(160, 'debug', '0');
INSERT INTO `mdl_config` VALUES(161, 'debugdisplay', '1');
INSERT INTO `mdl_config` VALUES(162, 'xmlstrictheaders', '0');
INSERT INTO `mdl_config` VALUES(163, 'debugsmtp', '0');
INSERT INTO `mdl_config` VALUES(164, 'perfdebug', '7');
INSERT INTO `mdl_config` VALUES(165, 'enablestats', '0');
INSERT INTO `mdl_config` VALUES(166, 'statsfirstrun', 'none');
INSERT INTO `mdl_config` VALUES(167, 'statsmaxruntime', '0');
INSERT INTO `mdl_config` VALUES(168, 'statsruntimedays', '31');
INSERT INTO `mdl_config` VALUES(169, 'statsruntimestarthour', '0');
INSERT INTO `mdl_config` VALUES(170, 'statsruntimestartminute', '0');
INSERT INTO `mdl_config` VALUES(171, 'statsuserthreshold', '0');
INSERT INTO `mdl_config` VALUES(172, 'statscatdepth', '1');
INSERT INTO `mdl_config` VALUES(173, 'framename', '_top');
INSERT INTO `mdl_config` VALUES(174, 'slasharguments', '1');
INSERT INTO `mdl_config` VALUES(175, 'getremoteaddrconf', '0');
INSERT INTO `mdl_config` VALUES(176, 'proxyhost', '');
INSERT INTO `mdl_config` VALUES(177, 'proxyport', '0');
INSERT INTO `mdl_config` VALUES(178, 'proxytype', 'HTTP');
INSERT INTO `mdl_config` VALUES(179, 'proxyuser', '');
INSERT INTO `mdl_config` VALUES(180, 'proxypassword', '');
INSERT INTO `mdl_config` VALUES(181, 'longtimenosee', '120');
INSERT INTO `mdl_config` VALUES(182, 'deleteunconfirmed', '168');
INSERT INTO `mdl_config` VALUES(183, 'deleteincompleteusers', '0');
INSERT INTO `mdl_config` VALUES(184, 'loglifetime', '0');
INSERT INTO `mdl_config` VALUES(185, 'disablegradehistory', '0');
INSERT INTO `mdl_config` VALUES(186, 'gradehistorylifetime', '0');
INSERT INTO `mdl_config` VALUES(187, 'extramemorylimit', '128M');
INSERT INTO `mdl_config` VALUES(188, 'cachetype', '');
INSERT INTO `mdl_config` VALUES(189, 'rcache', '0');
INSERT INTO `mdl_config` VALUES(190, 'rcachettl', '10');
INSERT INTO `mdl_config` VALUES(191, 'intcachemax', '10');
INSERT INTO `mdl_config` VALUES(192, 'memcachedhosts', '');
INSERT INTO `mdl_config` VALUES(193, 'memcachedpconn', '0');
INSERT INTO `mdl_config` VALUES(194, 'enableglobalsearch', '0');
INSERT INTO `mdl_config` VALUES(195, 'smartpix', '0');
INSERT INTO `mdl_config` VALUES(196, 'enablehtmlpurifier', '0');
INSERT INTO `mdl_config` VALUES(197, 'enablegroupings', '0');
INSERT INTO `mdl_config` VALUES(198, 'experimentalsplitrestore', '0');
INSERT INTO `mdl_config` VALUES(199, 'enableimsccimport', '0');
INSERT INTO `mdl_config` VALUES(200, 'enablesafebrowserintegration', '0');
INSERT INTO `mdl_config` VALUES(201, 'mnet_dispatcher_mode', 'off');
INSERT INTO `mdl_config` VALUES(202, 'mnet_localhost_id', '1');
INSERT INTO `mdl_config` VALUES(203, 'mnet_all_hosts_id', '2');
INSERT INTO `mdl_config` VALUES(204, 'version', '2007101592');
INSERT INTO `mdl_config` VALUES(205, 'release', '1.9.19 (Build: 20120706)');
INSERT INTO `mdl_config` VALUES(206, 'assignment_type_online_version', '2005042900');
INSERT INTO `mdl_config` VALUES(207, 'hotpot_showtimes', '0');
INSERT INTO `mdl_config` VALUES(208, 'hotpot_excelencodings', '');
INSERT INTO `mdl_config` VALUES(209, 'hotpot_initialdisable', '1');
INSERT INTO `mdl_config` VALUES(210, 'journal_showrecentactivity', '1');
INSERT INTO `mdl_config` VALUES(211, 'journal_initialdisable', '1');
INSERT INTO `mdl_config` VALUES(212, 'lams_initialdisable', '1');
INSERT INTO `mdl_config` VALUES(213, 'quiz_review', '16777215');
INSERT INTO `mdl_config` VALUES(214, 'quiz_attemptonlast', '0');
INSERT INTO `mdl_config` VALUES(215, 'quiz_attempts', '0');
INSERT INTO `mdl_config` VALUES(216, 'quiz_grademethod', '');
INSERT INTO `mdl_config` VALUES(217, 'quiz_decimalpoints', '2');
INSERT INTO `mdl_config` VALUES(218, 'quiz_maximumgrade', '10');
INSERT INTO `mdl_config` VALUES(219, 'quiz_password', '');
INSERT INTO `mdl_config` VALUES(220, 'quiz_popup', '0');
INSERT INTO `mdl_config` VALUES(221, 'quiz_questionsperpage', '0');
INSERT INTO `mdl_config` VALUES(222, 'quiz_shuffleanswers', '1');
INSERT INTO `mdl_config` VALUES(223, 'quiz_shufflequestions', '0');
INSERT INTO `mdl_config` VALUES(224, 'quiz_subnet', '');
INSERT INTO `mdl_config` VALUES(225, 'quiz_timelimit', '0');
INSERT INTO `mdl_config` VALUES(226, 'quiz_optionflags', '1');
INSERT INTO `mdl_config` VALUES(227, 'quiz_penaltyscheme', '1');
INSERT INTO `mdl_config` VALUES(228, 'quiz_delay1', '0');
INSERT INTO `mdl_config` VALUES(229, 'quiz_delay2', '0');
INSERT INTO `mdl_config` VALUES(230, 'quiz_fix_review', '0');
INSERT INTO `mdl_config` VALUES(231, 'quiz_fix_attemptonlast', '0');
INSERT INTO `mdl_config` VALUES(232, 'quiz_fix_attempts', '0');
INSERT INTO `mdl_config` VALUES(233, 'quiz_fix_grademethod', '0');
INSERT INTO `mdl_config` VALUES(234, 'quiz_fix_decimalpoints', '0');
INSERT INTO `mdl_config` VALUES(235, 'quiz_fix_password', '0');
INSERT INTO `mdl_config` VALUES(236, 'quiz_fix_popup', '0');
INSERT INTO `mdl_config` VALUES(237, 'quiz_fix_questionsperpage', '0');
INSERT INTO `mdl_config` VALUES(238, 'quiz_fix_shuffleanswers', '0');
INSERT INTO `mdl_config` VALUES(239, 'quiz_fix_shufflequestions', '0');
INSERT INTO `mdl_config` VALUES(240, 'quiz_fix_subnet', '0');
INSERT INTO `mdl_config` VALUES(241, 'quiz_fix_timelimit', '0');
INSERT INTO `mdl_config` VALUES(242, 'quiz_fix_adaptive', '0');
INSERT INTO `mdl_config` VALUES(243, 'quiz_fix_penaltyscheme', '0');
INSERT INTO `mdl_config` VALUES(244, 'quiz_fix_delay1', '0');
INSERT INTO `mdl_config` VALUES(245, 'quiz_fix_delay2', '0');
INSERT INTO `mdl_config` VALUES(246, 'resource_hide_repository', '1');
INSERT INTO `mdl_config` VALUES(247, 'workshop_initialdisable', '1');
INSERT INTO `mdl_config` VALUES(248, 'qtype_calculated_version', '2006032200');
INSERT INTO `mdl_config` VALUES(249, 'qtype_essay_version', '2006032200');
INSERT INTO `mdl_config` VALUES(250, 'qtype_match_version', '2006032200');
INSERT INTO `mdl_config` VALUES(251, 'qtype_multianswer_version', '2008050800');
INSERT INTO `mdl_config` VALUES(252, 'qtype_multichoice_version', '2007081700');
INSERT INTO `mdl_config` VALUES(253, 'qtype_numerical_version', '2006121500');
INSERT INTO `mdl_config` VALUES(254, 'qtype_randomsamatch_version', '2006042800');
INSERT INTO `mdl_config` VALUES(255, 'qtype_shortanswer_version', '2006032200');
INSERT INTO `mdl_config` VALUES(256, 'qtype_truefalse_version', '2006032200');
INSERT INTO `mdl_config` VALUES(257, 'backup_version', '2009111300');
INSERT INTO `mdl_config` VALUES(258, 'backup_release', '1.9.7');
INSERT INTO `mdl_config` VALUES(259, 'blocks_version', '2007081300');
INSERT INTO `mdl_config` VALUES(260, 'enrol_authorize_version', '2006112903');
INSERT INTO `mdl_config` VALUES(261, 'enrol_paypal_version', '2006092200');
INSERT INTO `mdl_config` VALUES(262, 'gradeexport_ods_version', '2007092701');
INSERT INTO `mdl_config` VALUES(263, 'gradeexport_txt_version', '2007092700');
INSERT INTO `mdl_config` VALUES(264, 'gradeexport_xls_version', '2007092700');
INSERT INTO `mdl_config` VALUES(265, 'gradeexport_xml_version', '2007092700');
INSERT INTO `mdl_config` VALUES(266, 'gradeimport_csv_version', '2007072500');
INSERT INTO `mdl_config` VALUES(267, 'gradeimport_xml_version', '2007092700');
INSERT INTO `mdl_config` VALUES(268, 'gradereport_grader_version', '2007091700');
INSERT INTO `mdl_config` VALUES(269, 'gradereport_outcomes_version', '2007073000');
INSERT INTO `mdl_config` VALUES(270, 'gradereport_overview_version', '2009022500');
INSERT INTO `mdl_config` VALUES(271, 'gradereport_user_version', '2007092500');
INSERT INTO `mdl_config` VALUES(272, 'coursereport_log_version', '2007101504');
INSERT INTO `mdl_config` VALUES(273, 'coursereport_outline_version', '2007101501');
INSERT INTO `mdl_config` VALUES(274, 'coursereport_participation_version', '2007101501');
INSERT INTO `mdl_config` VALUES(275, 'coursereport_stats_version', '2007101501');
INSERT INTO `mdl_config` VALUES(276, 'report_courseoverview_version', '2007101503');
INSERT INTO `mdl_config` VALUES(277, 'report_security_version', '2007101500');
INSERT INTO `mdl_config` VALUES(278, 'report_unittest_version', '2007101501');
INSERT INTO `mdl_config` VALUES(279, 'adminblocks_initialised', '1');
INSERT INTO `mdl_config` VALUES(280, 'siteidentifier', 'LY0wUGEwXnZNW3mGYhJvh6bGvKcsbypDlocalhost');
INSERT INTO `mdl_config` VALUES(281, 'rolesactive', '1');
INSERT INTO `mdl_config` VALUES(282, 'guestroleid', '6');
INSERT INTO `mdl_config` VALUES(283, 'creatornewroleid', '3');
INSERT INTO `mdl_config` VALUES(284, 'notloggedinroleid', '6');
INSERT INTO `mdl_config` VALUES(285, 'defaultuserroleid', '7');
INSERT INTO `mdl_config` VALUES(286, 'defaultcourseroleid', '5');
INSERT INTO `mdl_config` VALUES(287, 'nonmetacoursesyncroleids', '');
INSERT INTO `mdl_config` VALUES(289, 'gradebookroles', '5');
INSERT INTO `mdl_config` VALUES(290, 'enableoutcomes', '0');
INSERT INTO `mdl_config` VALUES(291, 'grade_profilereport', 'user');
INSERT INTO `mdl_config` VALUES(292, 'grade_aggregationposition', '1');
INSERT INTO `mdl_config` VALUES(293, 'grade_includescalesinaggregation', '1');
INSERT INTO `mdl_config` VALUES(294, 'grade_hiddenasdate', '0');
INSERT INTO `mdl_config` VALUES(295, 'gradepublishing', '0');
INSERT INTO `mdl_config` VALUES(296, 'grade_export_displaytype', '1');
INSERT INTO `mdl_config` VALUES(297, 'grade_export_decimalpoints', '2');
INSERT INTO `mdl_config` VALUES(298, 'grade_navmethod', '0');
INSERT INTO `mdl_config` VALUES(299, 'gradeexport', '');
INSERT INTO `mdl_config` VALUES(300, 'unlimitedgrades', '0');
INSERT INTO `mdl_config` VALUES(301, 'grade_hideforcedsettings', '1');
INSERT INTO `mdl_config` VALUES(302, 'grade_aggregation', '11');
INSERT INTO `mdl_config` VALUES(303, 'grade_aggregation_flag', '0');
INSERT INTO `mdl_config` VALUES(304, 'grade_aggregations_visible', '0,10,11,12,2,4,6,8,13');
INSERT INTO `mdl_config` VALUES(305, 'grade_aggregateonlygraded', '1');
INSERT INTO `mdl_config` VALUES(306, 'grade_aggregateonlygraded_flag', '2');
INSERT INTO `mdl_config` VALUES(307, 'grade_aggregateoutcomes', '0');
INSERT INTO `mdl_config` VALUES(308, 'grade_aggregateoutcomes_flag', '2');
INSERT INTO `mdl_config` VALUES(309, 'grade_aggregatesubcats', '0');
INSERT INTO `mdl_config` VALUES(310, 'grade_aggregatesubcats_flag', '2');
INSERT INTO `mdl_config` VALUES(311, 'grade_keephigh', '0');
INSERT INTO `mdl_config` VALUES(312, 'grade_keephigh_flag', '3');
INSERT INTO `mdl_config` VALUES(313, 'grade_droplow', '0');
INSERT INTO `mdl_config` VALUES(314, 'grade_droplow_flag', '2');
INSERT INTO `mdl_config` VALUES(315, 'grade_displaytype', '1');
INSERT INTO `mdl_config` VALUES(316, 'grade_decimalpoints', '2');
INSERT INTO `mdl_config` VALUES(317, 'grade_item_advanced', 'iteminfo,idnumber,gradepass,plusfactor,multfactor,display,decimals,hiddenuntil,locktime');
INSERT INTO `mdl_config` VALUES(318, 'grade_report_studentsperpage', '100');
INSERT INTO `mdl_config` VALUES(319, 'grade_report_quickgrading', '1');
INSERT INTO `mdl_config` VALUES(320, 'grade_report_showquickfeedback', '0');
INSERT INTO `mdl_config` VALUES(321, 'grade_report_fixedstudents', '0');
INSERT INTO `mdl_config` VALUES(322, 'grade_report_meanselection', '1');
INSERT INTO `mdl_config` VALUES(323, 'grade_report_showcalculations', '0');
INSERT INTO `mdl_config` VALUES(324, 'grade_report_showeyecons', '0');
INSERT INTO `mdl_config` VALUES(325, 'grade_report_showaverages', '1');
INSERT INTO `mdl_config` VALUES(326, 'grade_report_showlocks', '0');
INSERT INTO `mdl_config` VALUES(327, 'grade_report_showranges', '0');
INSERT INTO `mdl_config` VALUES(328, 'grade_report_showuserimage', '1');
INSERT INTO `mdl_config` VALUES(329, 'grade_report_showuseridnumber', '0');
INSERT INTO `mdl_config` VALUES(330, 'grade_report_showactivityicons', '1');
INSERT INTO `mdl_config` VALUES(331, 'grade_report_shownumberofgrades', '0');
INSERT INTO `mdl_config` VALUES(332, 'grade_report_averagesdisplaytype', 'inherit');
INSERT INTO `mdl_config` VALUES(333, 'grade_report_rangesdisplaytype', 'inherit');
INSERT INTO `mdl_config` VALUES(334, 'grade_report_averagesdecimalpoints', 'inherit');
INSERT INTO `mdl_config` VALUES(335, 'grade_report_rangesdecimalpoints', 'inherit');
INSERT INTO `mdl_config` VALUES(336, 'grade_report_overview_showrank', '0');
INSERT INTO `mdl_config` VALUES(337, 'grade_report_overview_showtotalsifcontainhidden', '0');
INSERT INTO `mdl_config` VALUES(338, 'grade_report_user_showrank', '0');
INSERT INTO `mdl_config` VALUES(339, 'grade_report_user_showpercentage', '2');
INSERT INTO `mdl_config` VALUES(340, 'grade_report_user_showhiddenitems', '1');
INSERT INTO `mdl_config` VALUES(341, 'grade_report_user_showtotalsifcontainhidden', '0');
INSERT INTO `mdl_config` VALUES(342, 'assignment_maxbytes', '1048576');
INSERT INTO `mdl_config` VALUES(343, 'assignment_itemstocount', '1');
INSERT INTO `mdl_config` VALUES(344, 'assignment_showrecentsubmissions', '1');
INSERT INTO `mdl_config` VALUES(345, 'chat_method', 'header_js');
INSERT INTO `mdl_config` VALUES(346, 'chat_refresh_userlist', '10');
INSERT INTO `mdl_config` VALUES(347, 'chat_old_ping', '35');
INSERT INTO `mdl_config` VALUES(348, 'chat_refresh_room', '5');
INSERT INTO `mdl_config` VALUES(349, 'chat_normal_updatemode', 'jsupdate');
INSERT INTO `mdl_config` VALUES(350, 'chat_serverhost', 'localhost');
INSERT INTO `mdl_config` VALUES(351, 'chat_serverip', '127.0.0.1');
INSERT INTO `mdl_config` VALUES(352, 'chat_serverport', '9111');
INSERT INTO `mdl_config` VALUES(353, 'chat_servermax', '100');
INSERT INTO `mdl_config` VALUES(354, 'data_enablerssfeeds', '0');
INSERT INTO `mdl_config` VALUES(355, 'forum_displaymode', '3');
INSERT INTO `mdl_config` VALUES(356, 'forum_replytouser', '1');
INSERT INTO `mdl_config` VALUES(357, 'forum_shortpost', '300');
INSERT INTO `mdl_config` VALUES(358, 'forum_longpost', '600');
INSERT INTO `mdl_config` VALUES(359, 'forum_manydiscussions', '100');
INSERT INTO `mdl_config` VALUES(360, 'forum_maxbytes', '512000');
INSERT INTO `mdl_config` VALUES(361, 'forum_trackreadposts', '1');
INSERT INTO `mdl_config` VALUES(362, 'forum_oldpostdays', '14');
INSERT INTO `mdl_config` VALUES(363, 'forum_usermarksread', '0');
INSERT INTO `mdl_config` VALUES(364, 'forum_cleanreadtime', '2');
INSERT INTO `mdl_config` VALUES(365, 'forum_enablerssfeeds', '0');
INSERT INTO `mdl_config` VALUES(366, 'forum_enabletimedposts', '0');
INSERT INTO `mdl_config` VALUES(367, 'forum_logblocked', '1');
INSERT INTO `mdl_config` VALUES(368, 'forum_ajaxrating', '0');
INSERT INTO `mdl_config` VALUES(369, 'glossary_entbypage', '10');
INSERT INTO `mdl_config` VALUES(370, 'glossary_dupentries', '0');
INSERT INTO `mdl_config` VALUES(371, 'glossary_allowcomments', '0');
INSERT INTO `mdl_config` VALUES(372, 'glossary_linkbydefault', '1');
INSERT INTO `mdl_config` VALUES(373, 'glossary_defaultapproval', '1');
INSERT INTO `mdl_config` VALUES(374, 'glossary_enablerssfeeds', '0');
INSERT INTO `mdl_config` VALUES(375, 'glossary_linkentries', '0');
INSERT INTO `mdl_config` VALUES(376, 'glossary_casesensitive', '0');
INSERT INTO `mdl_config` VALUES(377, 'glossary_fullmatch', '0');
INSERT INTO `mdl_config` VALUES(378, 'lams_serverurl', '');
INSERT INTO `mdl_config` VALUES(379, 'lams_serverid', '');
INSERT INTO `mdl_config` VALUES(380, 'lams_serverkey', '');
INSERT INTO `mdl_config` VALUES(381, 'resource_framesize', '130');
INSERT INTO `mdl_config` VALUES(382, 'resource_websearch', 'http://google.com/');
INSERT INTO `mdl_config` VALUES(383, 'resource_defaulturl', 'http://');
INSERT INTO `mdl_config` VALUES(384, 'resource_secretphrase', '9nz69Ez4up6QZMi8ERLp');
INSERT INTO `mdl_config` VALUES(385, 'resource_popup', '');
INSERT INTO `mdl_config` VALUES(386, 'resource_popupresizable', 'checked');
INSERT INTO `mdl_config` VALUES(387, 'resource_popupscrollbars', 'checked');
INSERT INTO `mdl_config` VALUES(388, 'resource_popupdirectories', 'checked');
INSERT INTO `mdl_config` VALUES(389, 'resource_popuplocation', 'checked');
INSERT INTO `mdl_config` VALUES(390, 'resource_popupmenubar', 'checked');
INSERT INTO `mdl_config` VALUES(391, 'resource_popuptoolbar', 'checked');
INSERT INTO `mdl_config` VALUES(392, 'resource_popupstatus', 'checked');
INSERT INTO `mdl_config` VALUES(393, 'resource_popupwidth', '620');
INSERT INTO `mdl_config` VALUES(394, 'resource_popupheight', '450');
INSERT INTO `mdl_config` VALUES(395, 'resource_autofilerename', '1');
INSERT INTO `mdl_config` VALUES(396, 'resource_blockdeletingfile', '1');
INSERT INTO `mdl_config` VALUES(397, 'scorm_grademethod', '1');
INSERT INTO `mdl_config` VALUES(398, 'scorm_maxgrade', '100');
INSERT INTO `mdl_config` VALUES(399, 'scorm_maxattempts', '0');
INSERT INTO `mdl_config` VALUES(400, 'scorm_whatgrade', '0');
INSERT INTO `mdl_config` VALUES(401, 'scorm_framewidth', '100%');
INSERT INTO `mdl_config` VALUES(402, 'scorm_frameheight', '500');
INSERT INTO `mdl_config` VALUES(403, 'scorm_popup', '0');
INSERT INTO `mdl_config` VALUES(404, 'scorm_resizable', '0');
INSERT INTO `mdl_config` VALUES(405, 'scorm_scrollbars', '0');
INSERT INTO `mdl_config` VALUES(406, 'scorm_directories', '0');
INSERT INTO `mdl_config` VALUES(407, 'scorm_location', '0');
INSERT INTO `mdl_config` VALUES(408, 'scorm_menubar', '0');
INSERT INTO `mdl_config` VALUES(409, 'scorm_toolbar', '0');
INSERT INTO `mdl_config` VALUES(410, 'scorm_status', '0');
INSERT INTO `mdl_config` VALUES(411, 'scorm_skipview', '0');
INSERT INTO `mdl_config` VALUES(412, 'scorm_hidebrowse', '0');
INSERT INTO `mdl_config` VALUES(413, 'scorm_hidetoc', '0');
INSERT INTO `mdl_config` VALUES(414, 'scorm_hidenav', '0');
INSERT INTO `mdl_config` VALUES(415, 'scorm_auto', '0');
INSERT INTO `mdl_config` VALUES(416, 'scorm_updatefreq', '0');
INSERT INTO `mdl_config` VALUES(417, 'block_course_list_adminview', 'all');
INSERT INTO `mdl_config` VALUES(418, 'block_course_list_hideallcourseslink', '0');
INSERT INTO `mdl_config` VALUES(419, 'block_online_users_timetosee', '5');
INSERT INTO `mdl_config` VALUES(420, 'defaultallowedmodules', '');
INSERT INTO `mdl_config` VALUES(421, 'coursemanager', '3');
INSERT INTO `mdl_config` VALUES(422, 'frontpage', '2');
INSERT INTO `mdl_config` VALUES(423, 'frontpageloggedin', '2');
INSERT INTO `mdl_config` VALUES(424, 'maxcategorydepth', '0');
INSERT INTO `mdl_config` VALUES(425, 'coursesperpage', '20');
INSERT INTO `mdl_config` VALUES(426, 'allowvisiblecoursesinhiddencategories', '0');
INSERT INTO `mdl_config` VALUES(427, 'defaultfrontpageroleid', '0');
INSERT INTO `mdl_config` VALUES(428, 'supportname', 'Admin Diklat');
INSERT INTO `mdl_config` VALUES(429, 'supportemail', 'admin@local.net');
INSERT INTO `mdl_config` VALUES(430, 'registerauth', '');
INSERT INTO `mdl_config` VALUES(431, 'sendcoursewelcomemessage', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_config_plugins`
--

CREATE TABLE `mdl_config_plugins` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `plugin` varchar(100) NOT NULL DEFAULT 'core',
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_confplug_plunam_uix` (`plugin`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Moodle modules and plugins configuration variables' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mdl_config_plugins`
--

INSERT INTO `mdl_config_plugins` VALUES(1, 'moodlecourse', 'format', 'weeks');
INSERT INTO `mdl_config_plugins` VALUES(2, 'moodlecourse', 'numsections', '10');
INSERT INTO `mdl_config_plugins` VALUES(3, 'moodlecourse', 'hiddensections', '0');
INSERT INTO `mdl_config_plugins` VALUES(4, 'moodlecourse', 'newsitems', '5');
INSERT INTO `mdl_config_plugins` VALUES(5, 'moodlecourse', 'showgrades', '1');
INSERT INTO `mdl_config_plugins` VALUES(6, 'moodlecourse', 'showreports', '0');
INSERT INTO `mdl_config_plugins` VALUES(7, 'moodlecourse', 'maxbytes', '33554432');
INSERT INTO `mdl_config_plugins` VALUES(8, 'moodlecourse', 'metacourse', '0');
INSERT INTO `mdl_config_plugins` VALUES(9, 'qtype_random', 'selectmanual', '0');
INSERT INTO `mdl_config_plugins` VALUES(10, 'blocks/section_links', 'numsections1', '22');
INSERT INTO `mdl_config_plugins` VALUES(11, 'blocks/section_links', 'incby1', '2');
INSERT INTO `mdl_config_plugins` VALUES(12, 'blocks/section_links', 'numsections2', '40');
INSERT INTO `mdl_config_plugins` VALUES(13, 'blocks/section_links', 'incby2', '5');
INSERT INTO `mdl_config_plugins` VALUES(14, 'mnet', 'openssl_history', 'a:0:{}');
INSERT INTO `mdl_config_plugins` VALUES(15, 'mnet', 'openssl_generations', '3');
INSERT INTO `mdl_config_plugins` VALUES(16, 'mnet', 'openssl', '-----BEGIN CERTIFICATE-----\nMIID+jCCA2OgAwIBAgIBADANBgkqhkiG9w0BAQQFADCBtTELMAkGA1UEBhMCSUQx\nDjAMBgNVBAgTBUJvZ29yMQ4wDAYDVQQHEwVCb2dvcjEpMCcGA1UEChMgUHVzYmFu\nZyBTRE0gQXBhcmF0dXIgUGVyaHVidW5nYW4xDzANBgNVBAsTBk1vb2RsZTEqMCgG\nA1UEAxMhaHR0cDovL2xvY2FsaG9zdC9kZXBodWIvZWxlYXJuaW5nMR4wHAYJKoZI\nhvcNAQkBFg9hZG1pbkBsb2NhbC5uZXQwHhcNMTIwODAyMTgxNzQ2WhcNMTIwODMw\nMTgxNzQ2WjCBtTELMAkGA1UEBhMCSUQxDjAMBgNVBAgTBUJvZ29yMQ4wDAYDVQQH\nEwVCb2dvcjEpMCcGA1UEChMgUHVzYmFuZyBTRE0gQXBhcmF0dXIgUGVyaHVidW5n\nYW4xDzANBgNVBAsTBk1vb2RsZTEqMCgGA1UEAxMhaHR0cDovL2xvY2FsaG9zdC9k\nZXBodWIvZWxlYXJuaW5nMR4wHAYJKoZIhvcNAQkBFg9hZG1pbkBsb2NhbC5uZXQw\ngZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMgSxekXFsGtF7re2NZ0LOCK0mDw\nRAtCCwvHhf3967+4QlutS+7tw2ZLV4pTjQTsg2XmybUVoTjjVVqqSevTSNPl4ZRy\nYcDFyu01cvSRKbJndBI6APxlTkcDsboIk3UQP9h4EhTYI8j26qMYdA6p+Ec8lB+K\nFthWmhuDcqLaKGF7AgMBAAGjggEWMIIBEjAdBgNVHQ4EFgQUMnZy7flIB813RWf0\nMXW3+VeHEH0wgeIGA1UdIwSB2jCB14AUMnZy7flIB813RWf0MXW3+VeHEH2hgbuk\ngbgwgbUxCzAJBgNVBAYTAklEMQ4wDAYDVQQIEwVCb2dvcjEOMAwGA1UEBxMFQm9n\nb3IxKTAnBgNVBAoTIFB1c2JhbmcgU0RNIEFwYXJhdHVyIFBlcmh1YnVuZ2FuMQ8w\nDQYDVQQLEwZNb29kbGUxKjAoBgNVBAMTIWh0dHA6Ly9sb2NhbGhvc3QvZGVwaHVi\nL2VsZWFybmluZzEeMBwGCSqGSIb3DQEJARYPYWRtaW5AbG9jYWwubmV0ggEAMAwG\nA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEEBQADgYEALq2EpDIhPPjOGR4Lt153eC4I\nZ+B5DEeMfy/mdP0PCvBif1wpYBQNa+QvRAietEWH8h2VbM32KyIr98nSZLY30AnK\n1pk1LqLcEcRqfdrFjpxk/U7JmEp83o6apmrrcXkd7uQZkAa5HtCQC+ENTTnbfgFm\nJ4KiFgO1x8Y1HabYhJA=\n-----END CERTIFICATE-----\n@@@@@@@@-----BEGIN RSA PRIVATE KEY-----\nMIICWwIBAAKBgQDIEsXpFxbBrRe63tjWdCzgitJg8EQLQgsLx4X9/eu/uEJbrUvu\n7cNmS1eKU40E7INl5sm1FaE441Vaqknr00jT5eGUcmHAxcrtNXL0kSmyZ3QSOgD8\nZU5HA7G6CJN1ED/YeBIU2CPI9uqjGHQOqfhHPJQfihbYVpobg3Ki2ihhewIDAQAB\nAoGAWYPcvJ8x9VGGjntqNPkhow05d1nId+kCnDCXCL71HYBJYE827B3BESGgdylO\nrOdNGuiZUsXsrlE4PSp3jGWp7SipK7cTqHA5lJt73RqPUHvvLm7aXOPwzYw2DTMR\nqeyvD9txcGt7HaCxkdIW1s+/9s2deblOfe584qsE2LdF2rECQQD/gqgPGpwvO8F2\n5Uoc1dkjek6uwYi7KXM+q5eRZByakmmsbUrSIa/E6sG8TMOBxdNRrnMehEbtZb3L\n9YAOza/FAkEAyHTr3J80VtfEhXfi8B/beOLi53Q42jMzzEGl2hzzO8jgkaBAGyzi\n6Onf5W2sFFqyPZdmexx3a4UP5IIdXOOgPwJAXk9dtOV/jLejuzz61BXi5gN5E2wA\nCgVMsm8nrNSk8jDkrG5S1aj1dduo0tYKu9XHIDkh6LuuamXJXoUpVU16eQJBAIOO\nkJj7dzsjYluB4dNb5QsCRI5IbWNuxSjhULrD0zJCVHfeZxQuskDP9Nw6zPuSxnW7\nnktf1FQhQNvkNOcYkLsCP3QREoRmWhvEPGOvM1nfSPfX52MBIDB2VWXGgSDK7k2T\nlqZPpMsvoi3SevdYf5rHG4KnkQf8XBRcX5sdRoxu/g==\n-----END RSA PRIVATE KEY-----\n');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_context`
--

CREATE TABLE `mdl_context` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `contextlevel` bigint(10) unsigned NOT NULL DEFAULT '0',
  `instanceid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `depth` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_cont_conins_uix` (`contextlevel`,`instanceid`),
  KEY `mdl_cont_ins_ix` (`instanceid`),
  KEY `mdl_cont_pat_ix` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='one of these must be set' AUTO_INCREMENT=286 ;

--
-- Dumping data for table `mdl_context`
--

INSERT INTO `mdl_context` VALUES(1, 10, 0, '/1', 1);
INSERT INTO `mdl_context` VALUES(2, 50, 1, '/1/2', 2);
INSERT INTO `mdl_context` VALUES(4, 80, 1, '/1/2/4', 3);
INSERT INTO `mdl_context` VALUES(5, 80, 2, '/1/2/5', 3);
INSERT INTO `mdl_context` VALUES(6, 80, 3, '/1/2/6', 3);
INSERT INTO `mdl_context` VALUES(7, 80, 4, '/1/2/7', 3);
INSERT INTO `mdl_context` VALUES(8, 80, 5, '/1/8', 2);
INSERT INTO `mdl_context` VALUES(9, 80, 6, '/1/9', 2);
INSERT INTO `mdl_context` VALUES(10, 30, 2, '/1/10', 2);
INSERT INTO `mdl_context` VALUES(22, 80, 15, '/1/2/22', 3);
INSERT INTO `mdl_context` VALUES(23, 40, 2, '/1/23', 2);
INSERT INTO `mdl_context` VALUES(24, 40, 3, '/1/24', 2);
INSERT INTO `mdl_context` VALUES(25, 40, 4, '/1/25', 2);
INSERT INTO `mdl_context` VALUES(27, 40, 6, '/1/24/27', 3);
INSERT INTO `mdl_context` VALUES(28, 40, 7, '/1/24/28', 3);
INSERT INTO `mdl_context` VALUES(29, 40, 8, '/1/25/29', 3);
INSERT INTO `mdl_context` VALUES(30, 40, 9, '/1/25/30', 3);
INSERT INTO `mdl_context` VALUES(31, 50, 3, '/1/23/31', 3);
INSERT INTO `mdl_context` VALUES(32, 80, 16, '/1/23/31/32', 4);
INSERT INTO `mdl_context` VALUES(33, 80, 17, '/1/23/31/33', 4);
INSERT INTO `mdl_context` VALUES(34, 80, 18, '/1/23/31/34', 4);
INSERT INTO `mdl_context` VALUES(35, 80, 19, '/1/23/31/35', 4);
INSERT INTO `mdl_context` VALUES(36, 80, 20, '/1/23/31/36', 4);
INSERT INTO `mdl_context` VALUES(37, 80, 21, '/1/23/31/37', 4);
INSERT INTO `mdl_context` VALUES(38, 70, 3, '/1/23/31/38', 4);
INSERT INTO `mdl_context` VALUES(39, 80, 22, '/1/23/31/39', 4);
INSERT INTO `mdl_context` VALUES(40, 80, 23, '/1/23/31/40', 4);
INSERT INTO `mdl_context` VALUES(41, 50, 4, '/1/23/41', 3);
INSERT INTO `mdl_context` VALUES(42, 80, 24, '/1/23/41/42', 4);
INSERT INTO `mdl_context` VALUES(43, 80, 25, '/1/23/41/43', 4);
INSERT INTO `mdl_context` VALUES(44, 80, 26, '/1/23/41/44', 4);
INSERT INTO `mdl_context` VALUES(45, 80, 27, '/1/23/41/45', 4);
INSERT INTO `mdl_context` VALUES(46, 80, 28, '/1/23/41/46', 4);
INSERT INTO `mdl_context` VALUES(47, 80, 29, '/1/23/41/47', 4);
INSERT INTO `mdl_context` VALUES(48, 70, 4, '/1/23/41/48', 4);
INSERT INTO `mdl_context` VALUES(49, 80, 30, '/1/23/41/49', 4);
INSERT INTO `mdl_context` VALUES(50, 80, 31, '/1/23/41/50', 4);
INSERT INTO `mdl_context` VALUES(51, 50, 5, '/1/23/51', 3);
INSERT INTO `mdl_context` VALUES(52, 80, 32, '/1/23/51/52', 4);
INSERT INTO `mdl_context` VALUES(53, 80, 33, '/1/23/51/53', 4);
INSERT INTO `mdl_context` VALUES(54, 80, 34, '/1/23/51/54', 4);
INSERT INTO `mdl_context` VALUES(55, 80, 35, '/1/23/51/55', 4);
INSERT INTO `mdl_context` VALUES(56, 80, 36, '/1/23/51/56', 4);
INSERT INTO `mdl_context` VALUES(57, 80, 37, '/1/23/51/57', 4);
INSERT INTO `mdl_context` VALUES(58, 70, 5, '/1/23/51/58', 4);
INSERT INTO `mdl_context` VALUES(59, 80, 38, '/1/23/51/59', 4);
INSERT INTO `mdl_context` VALUES(60, 80, 39, '/1/23/51/60', 4);
INSERT INTO `mdl_context` VALUES(61, 50, 6, '/1/24/27/61', 4);
INSERT INTO `mdl_context` VALUES(62, 80, 40, '/1/24/27/61/62', 5);
INSERT INTO `mdl_context` VALUES(63, 80, 41, '/1/24/27/61/63', 5);
INSERT INTO `mdl_context` VALUES(64, 80, 42, '/1/24/27/61/64', 5);
INSERT INTO `mdl_context` VALUES(65, 80, 43, '/1/24/27/61/65', 5);
INSERT INTO `mdl_context` VALUES(66, 80, 44, '/1/24/27/61/66', 5);
INSERT INTO `mdl_context` VALUES(67, 80, 45, '/1/24/27/61/67', 5);
INSERT INTO `mdl_context` VALUES(68, 70, 6, '/1/24/27/61/68', 5);
INSERT INTO `mdl_context` VALUES(69, 80, 46, '/1/24/27/61/69', 5);
INSERT INTO `mdl_context` VALUES(70, 80, 47, '/1/24/27/61/70', 5);
INSERT INTO `mdl_context` VALUES(71, 50, 7, '/1/24/27/71', 4);
INSERT INTO `mdl_context` VALUES(72, 80, 48, '/1/24/27/71/72', 5);
INSERT INTO `mdl_context` VALUES(73, 80, 49, '/1/24/27/71/73', 5);
INSERT INTO `mdl_context` VALUES(74, 80, 50, '/1/24/27/71/74', 5);
INSERT INTO `mdl_context` VALUES(75, 80, 51, '/1/24/27/71/75', 5);
INSERT INTO `mdl_context` VALUES(76, 80, 52, '/1/24/27/71/76', 5);
INSERT INTO `mdl_context` VALUES(77, 80, 53, '/1/24/27/71/77', 5);
INSERT INTO `mdl_context` VALUES(78, 70, 7, '/1/24/27/71/78', 5);
INSERT INTO `mdl_context` VALUES(79, 80, 54, '/1/24/27/71/79', 5);
INSERT INTO `mdl_context` VALUES(80, 80, 55, '/1/24/27/71/80', 5);
INSERT INTO `mdl_context` VALUES(81, 50, 8, '/1/24/27/81', 4);
INSERT INTO `mdl_context` VALUES(82, 80, 56, '/1/24/27/81/82', 5);
INSERT INTO `mdl_context` VALUES(83, 80, 57, '/1/24/27/81/83', 5);
INSERT INTO `mdl_context` VALUES(84, 80, 58, '/1/24/27/81/84', 5);
INSERT INTO `mdl_context` VALUES(85, 80, 59, '/1/24/27/81/85', 5);
INSERT INTO `mdl_context` VALUES(86, 80, 60, '/1/24/27/81/86', 5);
INSERT INTO `mdl_context` VALUES(87, 80, 61, '/1/24/27/81/87', 5);
INSERT INTO `mdl_context` VALUES(88, 70, 8, '/1/24/27/81/88', 5);
INSERT INTO `mdl_context` VALUES(89, 80, 62, '/1/24/27/81/89', 5);
INSERT INTO `mdl_context` VALUES(90, 80, 63, '/1/24/27/81/90', 5);
INSERT INTO `mdl_context` VALUES(91, 70, 9, '/1/2/91', 3);
INSERT INTO `mdl_context` VALUES(92, 40, 10, '/1/24/28/92', 4);
INSERT INTO `mdl_context` VALUES(93, 40, 11, '/1/24/28/93', 4);
INSERT INTO `mdl_context` VALUES(94, 50, 9, '/1/24/28/92/94', 5);
INSERT INTO `mdl_context` VALUES(95, 80, 64, '/1/24/28/92/94/95', 6);
INSERT INTO `mdl_context` VALUES(96, 80, 65, '/1/24/28/92/94/96', 6);
INSERT INTO `mdl_context` VALUES(97, 80, 66, '/1/24/28/92/94/97', 6);
INSERT INTO `mdl_context` VALUES(98, 80, 67, '/1/24/28/92/94/98', 6);
INSERT INTO `mdl_context` VALUES(99, 80, 68, '/1/24/28/92/94/99', 6);
INSERT INTO `mdl_context` VALUES(100, 80, 69, '/1/24/28/92/94/100', 6);
INSERT INTO `mdl_context` VALUES(101, 70, 10, '/1/24/28/92/94/101', 6);
INSERT INTO `mdl_context` VALUES(102, 80, 70, '/1/24/28/92/94/102', 6);
INSERT INTO `mdl_context` VALUES(103, 80, 71, '/1/24/28/92/94/103', 6);
INSERT INTO `mdl_context` VALUES(104, 50, 10, '/1/24/28/92/104', 5);
INSERT INTO `mdl_context` VALUES(105, 80, 72, '/1/24/28/92/104/105', 6);
INSERT INTO `mdl_context` VALUES(106, 80, 73, '/1/24/28/92/104/106', 6);
INSERT INTO `mdl_context` VALUES(107, 80, 74, '/1/24/28/92/104/107', 6);
INSERT INTO `mdl_context` VALUES(108, 80, 75, '/1/24/28/92/104/108', 6);
INSERT INTO `mdl_context` VALUES(109, 80, 76, '/1/24/28/92/104/109', 6);
INSERT INTO `mdl_context` VALUES(110, 80, 77, '/1/24/28/92/104/110', 6);
INSERT INTO `mdl_context` VALUES(111, 70, 11, '/1/24/28/92/104/111', 6);
INSERT INTO `mdl_context` VALUES(112, 80, 78, '/1/24/28/92/104/112', 6);
INSERT INTO `mdl_context` VALUES(113, 80, 79, '/1/24/28/92/104/113', 6);
INSERT INTO `mdl_context` VALUES(114, 50, 11, '/1/24/28/92/114', 5);
INSERT INTO `mdl_context` VALUES(115, 80, 80, '/1/24/28/92/114/115', 6);
INSERT INTO `mdl_context` VALUES(116, 80, 81, '/1/24/28/92/114/116', 6);
INSERT INTO `mdl_context` VALUES(117, 80, 82, '/1/24/28/92/114/117', 6);
INSERT INTO `mdl_context` VALUES(118, 80, 83, '/1/24/28/92/114/118', 6);
INSERT INTO `mdl_context` VALUES(119, 80, 84, '/1/24/28/92/114/119', 6);
INSERT INTO `mdl_context` VALUES(120, 80, 85, '/1/24/28/92/114/120', 6);
INSERT INTO `mdl_context` VALUES(121, 70, 12, '/1/24/28/92/114/121', 6);
INSERT INTO `mdl_context` VALUES(122, 80, 86, '/1/24/28/92/114/122', 6);
INSERT INTO `mdl_context` VALUES(123, 80, 87, '/1/24/28/92/114/123', 6);
INSERT INTO `mdl_context` VALUES(124, 50, 12, '/1/24/28/92/124', 5);
INSERT INTO `mdl_context` VALUES(125, 80, 88, '/1/24/28/92/124/125', 6);
INSERT INTO `mdl_context` VALUES(126, 80, 89, '/1/24/28/92/124/126', 6);
INSERT INTO `mdl_context` VALUES(127, 80, 90, '/1/24/28/92/124/127', 6);
INSERT INTO `mdl_context` VALUES(128, 80, 91, '/1/24/28/92/124/128', 6);
INSERT INTO `mdl_context` VALUES(129, 80, 92, '/1/24/28/92/124/129', 6);
INSERT INTO `mdl_context` VALUES(130, 80, 93, '/1/24/28/92/124/130', 6);
INSERT INTO `mdl_context` VALUES(131, 70, 13, '/1/24/28/92/124/131', 6);
INSERT INTO `mdl_context` VALUES(132, 80, 94, '/1/24/28/92/124/132', 6);
INSERT INTO `mdl_context` VALUES(133, 80, 95, '/1/24/28/92/124/133', 6);
INSERT INTO `mdl_context` VALUES(134, 50, 13, '/1/24/28/92/134', 5);
INSERT INTO `mdl_context` VALUES(135, 80, 96, '/1/24/28/92/134/135', 6);
INSERT INTO `mdl_context` VALUES(136, 80, 97, '/1/24/28/92/134/136', 6);
INSERT INTO `mdl_context` VALUES(137, 80, 98, '/1/24/28/92/134/137', 6);
INSERT INTO `mdl_context` VALUES(138, 80, 99, '/1/24/28/92/134/138', 6);
INSERT INTO `mdl_context` VALUES(139, 80, 100, '/1/24/28/92/134/139', 6);
INSERT INTO `mdl_context` VALUES(140, 80, 101, '/1/24/28/92/134/140', 6);
INSERT INTO `mdl_context` VALUES(141, 70, 14, '/1/24/28/92/134/141', 6);
INSERT INTO `mdl_context` VALUES(142, 80, 102, '/1/24/28/92/134/142', 6);
INSERT INTO `mdl_context` VALUES(143, 80, 103, '/1/24/28/92/134/143', 6);
INSERT INTO `mdl_context` VALUES(144, 50, 14, '/1/24/28/92/144', 5);
INSERT INTO `mdl_context` VALUES(145, 80, 104, '/1/24/28/92/144/145', 6);
INSERT INTO `mdl_context` VALUES(146, 80, 105, '/1/24/28/92/144/146', 6);
INSERT INTO `mdl_context` VALUES(147, 80, 106, '/1/24/28/92/144/147', 6);
INSERT INTO `mdl_context` VALUES(148, 80, 107, '/1/24/28/92/144/148', 6);
INSERT INTO `mdl_context` VALUES(149, 80, 108, '/1/24/28/92/144/149', 6);
INSERT INTO `mdl_context` VALUES(150, 80, 109, '/1/24/28/92/144/150', 6);
INSERT INTO `mdl_context` VALUES(151, 70, 15, '/1/24/28/92/144/151', 6);
INSERT INTO `mdl_context` VALUES(152, 80, 110, '/1/24/28/92/144/152', 6);
INSERT INTO `mdl_context` VALUES(153, 80, 111, '/1/24/28/92/144/153', 6);
INSERT INTO `mdl_context` VALUES(154, 50, 15, '/1/24/28/92/154', 5);
INSERT INTO `mdl_context` VALUES(155, 80, 112, '/1/24/28/92/154/155', 6);
INSERT INTO `mdl_context` VALUES(156, 80, 113, '/1/24/28/92/154/156', 6);
INSERT INTO `mdl_context` VALUES(157, 80, 114, '/1/24/28/92/154/157', 6);
INSERT INTO `mdl_context` VALUES(158, 80, 115, '/1/24/28/92/154/158', 6);
INSERT INTO `mdl_context` VALUES(159, 80, 116, '/1/24/28/92/154/159', 6);
INSERT INTO `mdl_context` VALUES(160, 80, 117, '/1/24/28/92/154/160', 6);
INSERT INTO `mdl_context` VALUES(161, 70, 16, '/1/24/28/92/154/161', 6);
INSERT INTO `mdl_context` VALUES(162, 80, 118, '/1/24/28/92/154/162', 6);
INSERT INTO `mdl_context` VALUES(163, 80, 119, '/1/24/28/92/154/163', 6);
INSERT INTO `mdl_context` VALUES(164, 50, 16, '/1/24/28/92/164', 5);
INSERT INTO `mdl_context` VALUES(165, 80, 120, '/1/24/28/92/164/165', 6);
INSERT INTO `mdl_context` VALUES(166, 80, 121, '/1/24/28/92/164/166', 6);
INSERT INTO `mdl_context` VALUES(167, 80, 122, '/1/24/28/92/164/167', 6);
INSERT INTO `mdl_context` VALUES(168, 80, 123, '/1/24/28/92/164/168', 6);
INSERT INTO `mdl_context` VALUES(169, 80, 124, '/1/24/28/92/164/169', 6);
INSERT INTO `mdl_context` VALUES(170, 80, 125, '/1/24/28/92/164/170', 6);
INSERT INTO `mdl_context` VALUES(171, 70, 17, '/1/24/28/92/164/171', 6);
INSERT INTO `mdl_context` VALUES(172, 80, 126, '/1/24/28/92/164/172', 6);
INSERT INTO `mdl_context` VALUES(173, 80, 127, '/1/24/28/92/164/173', 6);
INSERT INTO `mdl_context` VALUES(174, 50, 17, '/1/24/28/92/174', 5);
INSERT INTO `mdl_context` VALUES(175, 80, 128, '/1/24/28/92/174/175', 6);
INSERT INTO `mdl_context` VALUES(176, 80, 129, '/1/24/28/92/174/176', 6);
INSERT INTO `mdl_context` VALUES(177, 80, 130, '/1/24/28/92/174/177', 6);
INSERT INTO `mdl_context` VALUES(178, 80, 131, '/1/24/28/92/174/178', 6);
INSERT INTO `mdl_context` VALUES(179, 80, 132, '/1/24/28/92/174/179', 6);
INSERT INTO `mdl_context` VALUES(180, 80, 133, '/1/24/28/92/174/180', 6);
INSERT INTO `mdl_context` VALUES(181, 70, 18, '/1/24/28/92/174/181', 6);
INSERT INTO `mdl_context` VALUES(182, 80, 134, '/1/24/28/92/174/182', 6);
INSERT INTO `mdl_context` VALUES(183, 80, 135, '/1/24/28/92/174/183', 6);
INSERT INTO `mdl_context` VALUES(184, 50, 18, '/1/24/28/92/184', 5);
INSERT INTO `mdl_context` VALUES(185, 80, 136, '/1/24/28/92/184/185', 6);
INSERT INTO `mdl_context` VALUES(186, 80, 137, '/1/24/28/92/184/186', 6);
INSERT INTO `mdl_context` VALUES(187, 80, 138, '/1/24/28/92/184/187', 6);
INSERT INTO `mdl_context` VALUES(188, 80, 139, '/1/24/28/92/184/188', 6);
INSERT INTO `mdl_context` VALUES(189, 80, 140, '/1/24/28/92/184/189', 6);
INSERT INTO `mdl_context` VALUES(190, 80, 141, '/1/24/28/92/184/190', 6);
INSERT INTO `mdl_context` VALUES(191, 70, 19, '/1/24/28/92/184/191', 6);
INSERT INTO `mdl_context` VALUES(192, 80, 142, '/1/24/28/92/184/192', 6);
INSERT INTO `mdl_context` VALUES(193, 80, 143, '/1/24/28/92/184/193', 6);
INSERT INTO `mdl_context` VALUES(194, 50, 19, '/1/24/28/93/194', 5);
INSERT INTO `mdl_context` VALUES(195, 80, 144, '/1/24/28/93/194/195', 6);
INSERT INTO `mdl_context` VALUES(196, 80, 145, '/1/24/28/93/194/196', 6);
INSERT INTO `mdl_context` VALUES(197, 80, 146, '/1/24/28/93/194/197', 6);
INSERT INTO `mdl_context` VALUES(198, 80, 147, '/1/24/28/93/194/198', 6);
INSERT INTO `mdl_context` VALUES(199, 80, 148, '/1/24/28/93/194/199', 6);
INSERT INTO `mdl_context` VALUES(200, 80, 149, '/1/24/28/93/194/200', 6);
INSERT INTO `mdl_context` VALUES(201, 70, 20, '/1/24/28/93/194/201', 6);
INSERT INTO `mdl_context` VALUES(202, 80, 150, '/1/24/28/93/194/202', 6);
INSERT INTO `mdl_context` VALUES(203, 80, 151, '/1/24/28/93/194/203', 6);
INSERT INTO `mdl_context` VALUES(204, 50, 20, '/1/24/28/93/204', 5);
INSERT INTO `mdl_context` VALUES(205, 80, 152, '/1/24/28/93/204/205', 6);
INSERT INTO `mdl_context` VALUES(206, 80, 153, '/1/24/28/93/204/206', 6);
INSERT INTO `mdl_context` VALUES(207, 80, 154, '/1/24/28/93/204/207', 6);
INSERT INTO `mdl_context` VALUES(208, 80, 155, '/1/24/28/93/204/208', 6);
INSERT INTO `mdl_context` VALUES(209, 80, 156, '/1/24/28/93/204/209', 6);
INSERT INTO `mdl_context` VALUES(210, 80, 157, '/1/24/28/93/204/210', 6);
INSERT INTO `mdl_context` VALUES(211, 70, 21, '/1/24/28/93/204/211', 6);
INSERT INTO `mdl_context` VALUES(212, 80, 158, '/1/24/28/93/204/212', 6);
INSERT INTO `mdl_context` VALUES(213, 80, 159, '/1/24/28/93/204/213', 6);
INSERT INTO `mdl_context` VALUES(214, 50, 21, '/1/24/28/93/214', 5);
INSERT INTO `mdl_context` VALUES(215, 80, 160, '/1/24/28/93/214/215', 6);
INSERT INTO `mdl_context` VALUES(216, 80, 161, '/1/24/28/93/214/216', 6);
INSERT INTO `mdl_context` VALUES(217, 80, 162, '/1/24/28/93/214/217', 6);
INSERT INTO `mdl_context` VALUES(218, 80, 163, '/1/24/28/93/214/218', 6);
INSERT INTO `mdl_context` VALUES(219, 80, 164, '/1/24/28/93/214/219', 6);
INSERT INTO `mdl_context` VALUES(220, 80, 165, '/1/24/28/93/214/220', 6);
INSERT INTO `mdl_context` VALUES(221, 70, 22, '/1/24/28/93/214/221', 6);
INSERT INTO `mdl_context` VALUES(222, 80, 166, '/1/24/28/93/214/222', 6);
INSERT INTO `mdl_context` VALUES(223, 80, 167, '/1/24/28/93/214/223', 6);
INSERT INTO `mdl_context` VALUES(224, 50, 22, '/1/24/28/93/224', 5);
INSERT INTO `mdl_context` VALUES(225, 80, 168, '/1/24/28/93/224/225', 6);
INSERT INTO `mdl_context` VALUES(226, 80, 169, '/1/24/28/93/224/226', 6);
INSERT INTO `mdl_context` VALUES(227, 80, 170, '/1/24/28/93/224/227', 6);
INSERT INTO `mdl_context` VALUES(228, 80, 171, '/1/24/28/93/224/228', 6);
INSERT INTO `mdl_context` VALUES(229, 80, 172, '/1/24/28/93/224/229', 6);
INSERT INTO `mdl_context` VALUES(230, 80, 173, '/1/24/28/93/224/230', 6);
INSERT INTO `mdl_context` VALUES(231, 70, 23, '/1/24/28/93/224/231', 6);
INSERT INTO `mdl_context` VALUES(232, 80, 174, '/1/24/28/93/224/232', 6);
INSERT INTO `mdl_context` VALUES(233, 80, 175, '/1/24/28/93/224/233', 6);
INSERT INTO `mdl_context` VALUES(234, 50, 23, '/1/24/28/93/234', 5);
INSERT INTO `mdl_context` VALUES(235, 80, 176, '/1/24/28/93/234/235', 6);
INSERT INTO `mdl_context` VALUES(236, 80, 177, '/1/24/28/93/234/236', 6);
INSERT INTO `mdl_context` VALUES(237, 80, 178, '/1/24/28/93/234/237', 6);
INSERT INTO `mdl_context` VALUES(238, 80, 179, '/1/24/28/93/234/238', 6);
INSERT INTO `mdl_context` VALUES(239, 80, 180, '/1/24/28/93/234/239', 6);
INSERT INTO `mdl_context` VALUES(240, 80, 181, '/1/24/28/93/234/240', 6);
INSERT INTO `mdl_context` VALUES(241, 70, 24, '/1/24/28/93/234/241', 6);
INSERT INTO `mdl_context` VALUES(242, 80, 182, '/1/24/28/93/234/242', 6);
INSERT INTO `mdl_context` VALUES(243, 80, 183, '/1/24/28/93/234/243', 6);
INSERT INTO `mdl_context` VALUES(244, 50, 24, '/1/24/28/93/244', 5);
INSERT INTO `mdl_context` VALUES(245, 80, 184, '/1/24/28/93/244/245', 6);
INSERT INTO `mdl_context` VALUES(246, 80, 185, '/1/24/28/93/244/246', 6);
INSERT INTO `mdl_context` VALUES(247, 80, 186, '/1/24/28/93/244/247', 6);
INSERT INTO `mdl_context` VALUES(248, 80, 187, '/1/24/28/93/244/248', 6);
INSERT INTO `mdl_context` VALUES(249, 80, 188, '/1/24/28/93/244/249', 6);
INSERT INTO `mdl_context` VALUES(250, 80, 189, '/1/24/28/93/244/250', 6);
INSERT INTO `mdl_context` VALUES(251, 70, 25, '/1/24/28/93/244/251', 6);
INSERT INTO `mdl_context` VALUES(252, 80, 190, '/1/24/28/93/244/252', 6);
INSERT INTO `mdl_context` VALUES(253, 80, 191, '/1/24/28/93/244/253', 6);
INSERT INTO `mdl_context` VALUES(254, 50, 25, '/1/24/28/93/254', 5);
INSERT INTO `mdl_context` VALUES(255, 80, 192, '/1/24/28/93/254/255', 6);
INSERT INTO `mdl_context` VALUES(256, 80, 193, '/1/24/28/93/254/256', 6);
INSERT INTO `mdl_context` VALUES(257, 80, 194, '/1/24/28/93/254/257', 6);
INSERT INTO `mdl_context` VALUES(258, 80, 195, '/1/24/28/93/254/258', 6);
INSERT INTO `mdl_context` VALUES(259, 80, 196, '/1/24/28/93/254/259', 6);
INSERT INTO `mdl_context` VALUES(260, 80, 197, '/1/24/28/93/254/260', 6);
INSERT INTO `mdl_context` VALUES(261, 70, 26, '/1/24/28/93/254/261', 6);
INSERT INTO `mdl_context` VALUES(262, 80, 198, '/1/24/28/93/254/262', 6);
INSERT INTO `mdl_context` VALUES(263, 80, 199, '/1/24/28/93/254/263', 6);
INSERT INTO `mdl_context` VALUES(264, 50, 26, '/1/24/28/93/264', 5);
INSERT INTO `mdl_context` VALUES(265, 80, 200, '/1/24/28/93/264/265', 6);
INSERT INTO `mdl_context` VALUES(266, 80, 201, '/1/24/28/93/264/266', 6);
INSERT INTO `mdl_context` VALUES(267, 80, 202, '/1/24/28/93/264/267', 6);
INSERT INTO `mdl_context` VALUES(268, 80, 203, '/1/24/28/93/264/268', 6);
INSERT INTO `mdl_context` VALUES(269, 80, 204, '/1/24/28/93/264/269', 6);
INSERT INTO `mdl_context` VALUES(270, 80, 205, '/1/24/28/93/264/270', 6);
INSERT INTO `mdl_context` VALUES(271, 70, 27, '/1/24/28/93/264/271', 6);
INSERT INTO `mdl_context` VALUES(272, 80, 206, '/1/24/28/93/264/272', 6);
INSERT INTO `mdl_context` VALUES(273, 80, 207, '/1/24/28/93/264/273', 6);
INSERT INTO `mdl_context` VALUES(274, 50, 27, '/1/24/28/93/274', 5);
INSERT INTO `mdl_context` VALUES(275, 80, 208, '/1/24/28/93/274/275', 6);
INSERT INTO `mdl_context` VALUES(276, 80, 209, '/1/24/28/93/274/276', 6);
INSERT INTO `mdl_context` VALUES(277, 80, 210, '/1/24/28/93/274/277', 6);
INSERT INTO `mdl_context` VALUES(278, 80, 211, '/1/24/28/93/274/278', 6);
INSERT INTO `mdl_context` VALUES(279, 80, 212, '/1/24/28/93/274/279', 6);
INSERT INTO `mdl_context` VALUES(280, 80, 213, '/1/24/28/93/274/280', 6);
INSERT INTO `mdl_context` VALUES(281, 70, 28, '/1/24/28/93/274/281', 6);
INSERT INTO `mdl_context` VALUES(282, 80, 214, '/1/24/28/93/274/282', 6);
INSERT INTO `mdl_context` VALUES(283, 80, 215, '/1/24/28/93/274/283', 6);
INSERT INTO `mdl_context` VALUES(284, 70, 29, '/1/23/51/284', 4);
INSERT INTO `mdl_context` VALUES(285, 80, 216, '/1/2/285', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_context_temp`
--

CREATE TABLE `mdl_context_temp` (
  `id` bigint(10) unsigned NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '',
  `depth` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used by build_context_path() in upgrade and cron to keep con';

--
-- Dumping data for table `mdl_context_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_course`
--

CREATE TABLE `mdl_course` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '',
  `fullname` varchar(254) NOT NULL DEFAULT '',
  `shortname` varchar(100) NOT NULL DEFAULT '',
  `idnumber` varchar(100) NOT NULL DEFAULT '',
  `summary` text,
  `format` varchar(10) NOT NULL DEFAULT 'topics',
  `showgrades` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `modinfo` longtext,
  `newsitems` mediumint(5) unsigned NOT NULL DEFAULT '1',
  `teacher` varchar(100) NOT NULL DEFAULT 'Teacher',
  `teachers` varchar(100) NOT NULL DEFAULT 'Teachers',
  `student` varchar(100) NOT NULL DEFAULT 'Student',
  `students` varchar(100) NOT NULL DEFAULT 'Students',
  `guest` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `startdate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `enrolperiod` bigint(10) unsigned NOT NULL DEFAULT '0',
  `numsections` mediumint(5) unsigned NOT NULL DEFAULT '1',
  `marker` bigint(10) unsigned NOT NULL DEFAULT '0',
  `maxbytes` bigint(10) unsigned NOT NULL DEFAULT '0',
  `showreports` smallint(4) unsigned NOT NULL DEFAULT '0',
  `visible` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `hiddensections` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `groupmode` smallint(4) unsigned NOT NULL DEFAULT '0',
  `groupmodeforce` smallint(4) unsigned NOT NULL DEFAULT '0',
  `defaultgroupingid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lang` varchar(30) NOT NULL DEFAULT '',
  `theme` varchar(50) NOT NULL DEFAULT '',
  `cost` varchar(10) NOT NULL DEFAULT '',
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `metacourse` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `requested` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `restrictmodules` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `expirynotify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `expirythreshold` bigint(10) unsigned NOT NULL DEFAULT '0',
  `notifystudents` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enrollable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enrolstartdate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `enrolenddate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `enrol` varchar(20) NOT NULL DEFAULT '',
  `defaultrole` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_cour_cat_ix` (`category`),
  KEY `mdl_cour_idn_ix` (`idnumber`),
  KEY `mdl_cour_sho_ix` (`shortname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Central course table' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mdl_course`
--

INSERT INTO `mdl_course` VALUES(1, 0, 0, '', 'E-Learning Pusbang SDM Aparatur Perhubungan', 'E-Learning', '', 'Selamat datang di E-Learning Pusbang SDM Aparatur Perhubungan.\r\n\r\n', 'site', 1, 'a:1:{i:9;O:8:"stdClass":10:{s:2:"id";s:1:"8";s:2:"cm";i:9;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:9:"Site+news";}}', 3, 'Teacher', 'Teachers', 'Student', 'Students', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 0, 1343978479, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(3, 2, 100, '', 'Diklat Prajabatan Tingkat I', 'Prajab-I', '', '', 'weeks', 1, 'a:1:{i:3;O:8:"stdClass":10:{s:2:"id";s:1:"2";s:2:"cm";i:3;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936229, 1343936229, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(4, 2, 99, '', 'Diklat Prajabatan Tingkat II', 'Prajab-II', '', '', 'weeks', 1, 'a:1:{i:4;O:8:"stdClass":10:{s:2:"id";s:1:"3";s:2:"cm";i:4;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936264, 1343936264, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(5, 2, 98, '', 'Diklat Prajabatan Tingkat III', 'Prajab-III', '', '<div>Dasar Hukum</div><div>Sesuai Peraturan Pemerintah Nomor : 101 Tahun 2000 tentang Pendidikan dan Pelatihan Jabatan Pegawai Negeri (Lembaga Negara Tahun 2000 Nomor : 198, Tambahan Lembaran negara Nomor 4910) dan Surat Keputusan Kepala Lembaga Administrasi Negara Nomor : 540/XIII/10/6/2001 tentang <i><b>Pedoman Penyelenggaraan Pendidikan dan Pelatihan Kepemimpinan Tingkat III</b></i></div>', 'weeks', 1, 'a:2:{i:5;O:8:"stdClass":10:{s:2:"id";s:1:"4";s:2:"cm";i:5;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}i:29;O:8:"stdClass":10:{s:2:"id";s:1:"2";s:2:"cm";i:29;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:3:"tes";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936289, 1343937008, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(6, 6, 100, '', 'Diklat Kepemimpinan Tingkat IV', 'PIM-IV', '', '', 'weeks', 1, 'a:1:{i:6;O:8:"stdClass":10:{s:2:"id";s:1:"5";s:2:"cm";i:6;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936347, 1343936347, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(7, 6, 99, '', 'Diklat Kepemimpinan Tingkat III', 'PIM-III', '', '', 'weeks', 1, 'a:1:{i:7;O:8:"stdClass":10:{s:2:"id";s:1:"6";s:2:"cm";i:7;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936384, 1343936384, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(8, 6, 98, '', 'Diklat Kepemimpinan Tingkat II', 'PIM-II', '', '', 'weeks', 1, 'a:1:{i:8;O:8:"stdClass":10:{s:2:"id";s:1:"7";s:2:"cm";i:8;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343936400, 1343936400, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(9, 10, 100, '', 'Analisis Kepegawaian (Trampil, Penyelia, Ahli)', 'AK', '', '', 'weeks', 1, 'a:1:{i:10;O:8:"stdClass":10:{s:2:"id";s:1:"9";s:2:"cm";i:10;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937158, 1343937158, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(10, 10, 99, '', 'Arsiparis (Trampil, Penyelia, Ahli)', 'AR', '', '', 'weeks', 1, 'a:1:{i:11;O:8:"stdClass":10:{s:2:"id";s:2:"10";s:2:"cm";i:11;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937183, 1343937183, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(11, 10, 98, '', 'Pranata Komputer', 'PK', '', '', 'weeks', 1, 'a:1:{i:12;O:8:"stdClass":10:{s:2:"id";s:2:"11";s:2:"cm";i:12;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937207, 1343937207, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(12, 10, 97, '', 'Pranata Humas', 'PH', '', '', 'weeks', 1, 'a:1:{i:13;O:8:"stdClass":10:{s:2:"id";s:2:"12";s:2:"cm";i:13;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937224, 1343937224, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(13, 10, 96, '', 'Peneliti', 'PEN', '', '', 'weeks', 1, 'a:1:{i:14;O:8:"stdClass":10:{s:2:"id";s:2:"13";s:2:"cm";i:14;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937242, 1343937242, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(14, 10, 95, '', 'Pustakawan', 'PUS', '', '', 'weeks', 1, 'a:1:{i:15;O:8:"stdClass":10:{s:2:"id";s:2:"14";s:2:"cm";i:15;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937262, 1343937262, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(15, 10, 94, '', 'Analisis Keuangan', 'AKEU', '', '', 'weeks', 1, 'a:1:{i:16;O:8:"stdClass":10:{s:2:"id";s:2:"15";s:2:"cm";i:16;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937282, 1343937282, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(16, 10, 93, '', 'Analisis Kinerja', 'AKI', '', '', 'weeks', 1, 'a:1:{i:17;O:8:"stdClass":10:{s:2:"id";s:2:"16";s:2:"cm";i:17;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937298, 1343937298, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(17, 10, 92, '', 'Perencana', 'PER', '', '', 'weeks', 1, 'a:1:{i:18;O:8:"stdClass":10:{s:2:"id";s:2:"17";s:2:"cm";i:18;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937315, 1343937315, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(18, 10, 91, '', 'Statistik', 'STAT', '', '', 'weeks', 1, 'a:1:{i:19;O:8:"stdClass":10:{s:2:"id";s:2:"18";s:2:"cm";i:19;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937330, 1343937330, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(19, 11, 100, '', 'Training of Trainer (TOT)', 'TOT', '', '', 'weeks', 1, 'a:1:{i:20;O:8:"stdClass":10:{s:2:"id";s:2:"19";s:2:"cm";i:20;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937346, 1343937346, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(20, 11, 99, '', 'Management of Training (MOT)', 'MOT', '', '', 'weeks', 1, 'a:1:{i:21;O:8:"stdClass":10:{s:2:"id";s:2:"20";s:2:"cm";i:21;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937366, 1343937366, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(21, 11, 98, '', 'Teknis Alanisis Kebutuhan Diklat', 'TAKD', '', '', 'weeks', 1, 'a:1:{i:22;O:8:"stdClass":10:{s:2:"id";s:2:"21";s:2:"cm";i:22;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937391, 1343937391, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(22, 11, 97, '', 'Teknis Perancangan Kebutuhan Diklat', 'TPKD', '', '', 'weeks', 1, 'a:1:{i:23;O:8:"stdClass":10:{s:2:"id";s:2:"22";s:2:"cm";i:23;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937411, 1343937411, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(23, 11, 96, '', 'Teknis Pengembangan Modul Diklat', 'TPMD', '', '', 'weeks', 1, 'a:1:{i:24;O:8:"stdClass":10:{s:2:"id";s:2:"23";s:2:"cm";i:24;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937472, 1343937472, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(24, 11, 95, '', 'Manajemen Kearsipan', 'MKA', '', '', 'weeks', 1, 'a:1:{i:25;O:8:"stdClass":10:{s:2:"id";s:2:"24";s:2:"cm";i:25;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937487, 1343937507, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(25, 11, 94, '', 'Manajemen Keprotokolan', 'MKEP', '', '', 'weeks', 1, 'a:1:{i:26;O:8:"stdClass":10:{s:2:"id";s:2:"25";s:2:"cm";i:26;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937529, 1343937529, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(26, 11, 93, '', 'Manajemen Kehumasan dan Promosi', 'MKP', '', '', 'weeks', 1, 'a:1:{i:27;O:8:"stdClass":10:{s:2:"id";s:2:"26";s:2:"cm";i:27;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937557, 1343937557, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `mdl_course` VALUES(27, 11, 92, '', 'Manajemen Audit', 'MAU', '', '', 'weeks', 1, 'a:1:{i:28;O:8:"stdClass":10:{s:2:"id";s:2:"27";s:2:"cm";i:28;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:7:"visible";s:1:"1";s:9:"groupmode";s:1:"0";s:10:"groupingid";s:1:"0";s:16:"groupmembersonly";s:1:"0";s:5:"extra";s:0:"";s:4:"name";s:10:"News+forum";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1344013200, 0, 10, 0, 33554432, 0, 1, 0, 0, 0, 0, '', '', '', 'USD', 1343937579, 1343937579, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_allowed_modules`
--

CREATE TABLE `mdl_course_allowed_modules` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `module` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_courallomodu_cou_ix` (`course`),
  KEY `mdl_courallomodu_mod_ix` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='allowed modules foreach course' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_course_allowed_modules`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_categories`
--

CREATE TABLE `mdl_course_categories` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `parent` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  `coursecount` bigint(10) unsigned NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `depth` bigint(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `theme` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_courcate_par_ix` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Course categories' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mdl_course_categories`
--

INSERT INTO `mdl_course_categories` VALUES(2, 'DIKLAT PRAJABATAN', '', 0, 0, 3, 1, 0, 1, '/2', NULL);
INSERT INTO `mdl_course_categories` VALUES(3, 'DIKLAT DALAM JABATAN', '', 0, 999, 0, 1, 0, 1, '/3', NULL);
INSERT INTO `mdl_course_categories` VALUES(4, 'DIKLAT TEKNIS', '', 0, 999, 0, 1, 0, 1, '/4', NULL);
INSERT INTO `mdl_course_categories` VALUES(6, 'Diklat Kepemimpinan', '', 3, 999, 3, 1, 0, 2, '/3/6', NULL);
INSERT INTO `mdl_course_categories` VALUES(7, 'Diklat Fungsional', '', 3, 999, 0, 1, 0, 2, '/3/7', NULL);
INSERT INTO `mdl_course_categories` VALUES(8, 'Diklat Teknis Umum', '', 4, 999, 0, 1, 0, 2, '/4/8', NULL);
INSERT INTO `mdl_course_categories` VALUES(9, 'Diklat Teknis Manajemen', '', 4, 999, 0, 1, 0, 2, '/4/9', NULL);
INSERT INTO `mdl_course_categories` VALUES(10, 'Diklat Fungsional Keahlian', '', 7, 999, 10, 1, 0, 3, '/3/7/10', NULL);
INSERT INTO `mdl_course_categories` VALUES(11, 'Diklat Teknis Fungsional', '', 7, 999, 9, 1, 0, 3, '/3/7/11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_display`
--

CREATE TABLE `mdl_course_display` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `display` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_courdisp_couuse_ix` (`course`,`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Stores info about how to display the course' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `mdl_course_display`
--

INSERT INTO `mdl_course_display` VALUES(1, 2, 2, 0);
INSERT INTO `mdl_course_display` VALUES(2, 3, 2, 0);
INSERT INTO `mdl_course_display` VALUES(3, 4, 2, 0);
INSERT INTO `mdl_course_display` VALUES(4, 5, 2, 0);
INSERT INTO `mdl_course_display` VALUES(5, 6, 2, 0);
INSERT INTO `mdl_course_display` VALUES(6, 7, 2, 0);
INSERT INTO `mdl_course_display` VALUES(7, 8, 2, 0);
INSERT INTO `mdl_course_display` VALUES(8, 9, 2, 0);
INSERT INTO `mdl_course_display` VALUES(9, 10, 2, 0);
INSERT INTO `mdl_course_display` VALUES(10, 11, 2, 0);
INSERT INTO `mdl_course_display` VALUES(11, 12, 2, 0);
INSERT INTO `mdl_course_display` VALUES(12, 13, 2, 0);
INSERT INTO `mdl_course_display` VALUES(13, 14, 2, 0);
INSERT INTO `mdl_course_display` VALUES(14, 15, 2, 0);
INSERT INTO `mdl_course_display` VALUES(15, 16, 2, 0);
INSERT INTO `mdl_course_display` VALUES(16, 17, 2, 0);
INSERT INTO `mdl_course_display` VALUES(17, 18, 2, 0);
INSERT INTO `mdl_course_display` VALUES(18, 19, 2, 0);
INSERT INTO `mdl_course_display` VALUES(19, 20, 2, 0);
INSERT INTO `mdl_course_display` VALUES(20, 21, 2, 0);
INSERT INTO `mdl_course_display` VALUES(21, 22, 2, 0);
INSERT INTO `mdl_course_display` VALUES(22, 23, 2, 0);
INSERT INTO `mdl_course_display` VALUES(23, 24, 2, 0);
INSERT INTO `mdl_course_display` VALUES(24, 25, 2, 0);
INSERT INTO `mdl_course_display` VALUES(25, 26, 2, 0);
INSERT INTO `mdl_course_display` VALUES(26, 27, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_meta`
--

CREATE TABLE `mdl_course_meta` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `child_course` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_courmeta_par_ix` (`parent_course`),
  KEY `mdl_courmeta_chi_ix` (`child_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to store meta-courses relations' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_course_meta`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_modules`
--

CREATE TABLE `mdl_course_modules` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `module` bigint(10) unsigned NOT NULL DEFAULT '0',
  `instance` bigint(10) unsigned NOT NULL DEFAULT '0',
  `section` bigint(10) unsigned NOT NULL DEFAULT '0',
  `idnumber` varchar(100) DEFAULT NULL,
  `added` bigint(10) unsigned NOT NULL DEFAULT '0',
  `score` smallint(4) NOT NULL DEFAULT '0',
  `indent` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `visibleold` tinyint(1) NOT NULL DEFAULT '1',
  `groupmode` smallint(4) NOT NULL DEFAULT '0',
  `groupingid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupmembersonly` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_courmodu_vis_ix` (`visible`),
  KEY `mdl_courmodu_cou_ix` (`course`),
  KEY `mdl_courmodu_mod_ix` (`module`),
  KEY `mdl_courmodu_ins_ix` (`instance`),
  KEY `mdl_courmodu_idncou_ix` (`idnumber`,`course`),
  KEY `mdl_courmodu_gro_ix` (`groupingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='course_modules table retrofitted from MySQL' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `mdl_course_modules`
--

INSERT INTO `mdl_course_modules` VALUES(3, 3, 5, 2, 13, NULL, 1343936233, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(4, 4, 5, 3, 24, NULL, 1343936270, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(5, 5, 5, 4, 35, NULL, 1343936291, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(6, 6, 5, 5, 46, NULL, 1343936350, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(7, 7, 5, 6, 57, NULL, 1343936386, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(8, 8, 5, 7, 68, NULL, 1343936402, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(9, 1, 5, 8, 1, NULL, 1343936451, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(10, 9, 5, 9, 79, NULL, 1343937161, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(11, 10, 5, 10, 90, NULL, 1343937185, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(12, 11, 5, 11, 101, NULL, 1343937209, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(13, 12, 5, 12, 112, NULL, 1343937226, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(14, 13, 5, 13, 123, NULL, 1343937245, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(15, 14, 5, 14, 134, NULL, 1343937264, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(16, 15, 5, 15, 145, NULL, 1343937284, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(17, 16, 5, 16, 156, NULL, 1343937300, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(18, 17, 5, 17, 167, NULL, 1343937317, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(19, 18, 5, 18, 178, NULL, 1343937331, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(20, 19, 5, 19, 189, NULL, 1343937348, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(21, 20, 5, 20, 200, NULL, 1343937368, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(22, 21, 5, 21, 211, NULL, 1343937393, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(23, 22, 5, 22, 222, NULL, 1343937414, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(24, 23, 5, 23, 233, NULL, 1343937473, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(25, 24, 5, 24, 244, NULL, 1343937492, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(26, 25, 5, 25, 255, NULL, 1343937531, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(27, 26, 5, 26, 266, NULL, 1343937558, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(28, 27, 5, 27, 277, NULL, 1343937580, 0, 0, 1, 1, 0, 0, 0);
INSERT INTO `mdl_course_modules` VALUES(29, 5, 1, 2, 36, '', 1343938284, 0, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_request`
--

CREATE TABLE `mdl_course_request` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(254) NOT NULL DEFAULT '',
  `shortname` varchar(15) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `reason` text NOT NULL,
  `requester` bigint(10) unsigned NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_courrequ_sho_ix` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='course requests' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_course_request`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_course_sections`
--

CREATE TABLE `mdl_course_sections` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `section` bigint(10) unsigned NOT NULL DEFAULT '0',
  `summary` text,
  `sequence` text,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_coursect_cousec_ix` (`course`,`section`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='to define the sections for each course' AUTO_INCREMENT=288 ;

--
-- Dumping data for table `mdl_course_sections`
--

INSERT INTO `mdl_course_sections` VALUES(1, 1, 0, '', '9', 1);
INSERT INTO `mdl_course_sections` VALUES(13, 3, 0, NULL, '3', 1);
INSERT INTO `mdl_course_sections` VALUES(14, 3, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(15, 3, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(16, 3, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(17, 3, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(18, 3, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(19, 3, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(20, 3, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(21, 3, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(22, 3, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(23, 3, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(24, 4, 0, NULL, '4', 1);
INSERT INTO `mdl_course_sections` VALUES(25, 4, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(26, 4, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(27, 4, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(28, 4, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(29, 4, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(30, 4, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(31, 4, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(32, 4, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(33, 4, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(34, 4, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(35, 5, 0, NULL, '5', 1);
INSERT INTO `mdl_course_sections` VALUES(36, 5, 1, '', '29', 1);
INSERT INTO `mdl_course_sections` VALUES(37, 5, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(38, 5, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(39, 5, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(40, 5, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(41, 5, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(42, 5, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(43, 5, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(44, 5, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(45, 5, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(46, 6, 0, NULL, '6', 1);
INSERT INTO `mdl_course_sections` VALUES(47, 6, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(48, 6, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(49, 6, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(50, 6, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(51, 6, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(52, 6, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(53, 6, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(54, 6, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(55, 6, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(56, 6, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(57, 7, 0, NULL, '7', 1);
INSERT INTO `mdl_course_sections` VALUES(58, 7, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(59, 7, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(60, 7, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(61, 7, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(62, 7, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(63, 7, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(64, 7, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(65, 7, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(66, 7, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(67, 7, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(68, 8, 0, NULL, '8', 1);
INSERT INTO `mdl_course_sections` VALUES(69, 8, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(70, 8, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(71, 8, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(72, 8, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(73, 8, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(74, 8, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(75, 8, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(76, 8, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(77, 8, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(78, 8, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(79, 9, 0, NULL, '10', 1);
INSERT INTO `mdl_course_sections` VALUES(80, 9, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(81, 9, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(82, 9, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(83, 9, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(84, 9, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(85, 9, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(86, 9, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(87, 9, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(88, 9, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(89, 9, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(90, 10, 0, NULL, '11', 1);
INSERT INTO `mdl_course_sections` VALUES(91, 10, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(92, 10, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(93, 10, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(94, 10, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(95, 10, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(96, 10, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(97, 10, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(98, 10, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(99, 10, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(100, 10, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(101, 11, 0, NULL, '12', 1);
INSERT INTO `mdl_course_sections` VALUES(102, 11, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(103, 11, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(104, 11, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(105, 11, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(106, 11, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(107, 11, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(108, 11, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(109, 11, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(110, 11, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(111, 11, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(112, 12, 0, NULL, '13', 1);
INSERT INTO `mdl_course_sections` VALUES(113, 12, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(114, 12, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(115, 12, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(116, 12, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(117, 12, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(118, 12, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(119, 12, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(120, 12, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(121, 12, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(122, 12, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(123, 13, 0, NULL, '14', 1);
INSERT INTO `mdl_course_sections` VALUES(124, 13, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(125, 13, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(126, 13, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(127, 13, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(128, 13, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(129, 13, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(130, 13, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(131, 13, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(132, 13, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(133, 13, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(134, 14, 0, NULL, '15', 1);
INSERT INTO `mdl_course_sections` VALUES(135, 14, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(136, 14, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(137, 14, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(138, 14, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(139, 14, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(140, 14, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(141, 14, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(142, 14, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(143, 14, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(144, 14, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(145, 15, 0, NULL, '16', 1);
INSERT INTO `mdl_course_sections` VALUES(146, 15, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(147, 15, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(148, 15, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(149, 15, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(150, 15, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(151, 15, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(152, 15, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(153, 15, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(154, 15, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(155, 15, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(156, 16, 0, NULL, '17', 1);
INSERT INTO `mdl_course_sections` VALUES(157, 16, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(158, 16, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(159, 16, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(160, 16, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(161, 16, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(162, 16, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(163, 16, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(164, 16, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(165, 16, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(166, 16, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(167, 17, 0, NULL, '18', 1);
INSERT INTO `mdl_course_sections` VALUES(168, 17, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(169, 17, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(170, 17, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(171, 17, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(172, 17, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(173, 17, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(174, 17, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(175, 17, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(176, 17, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(177, 17, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(178, 18, 0, NULL, '19', 1);
INSERT INTO `mdl_course_sections` VALUES(179, 18, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(180, 18, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(181, 18, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(182, 18, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(183, 18, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(184, 18, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(185, 18, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(186, 18, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(187, 18, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(188, 18, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(189, 19, 0, NULL, '20', 1);
INSERT INTO `mdl_course_sections` VALUES(190, 19, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(191, 19, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(192, 19, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(193, 19, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(194, 19, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(195, 19, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(196, 19, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(197, 19, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(198, 19, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(199, 19, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(200, 20, 0, NULL, '21', 1);
INSERT INTO `mdl_course_sections` VALUES(201, 20, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(202, 20, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(203, 20, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(204, 20, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(205, 20, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(206, 20, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(207, 20, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(208, 20, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(209, 20, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(210, 20, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(211, 21, 0, NULL, '22', 1);
INSERT INTO `mdl_course_sections` VALUES(212, 21, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(213, 21, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(214, 21, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(215, 21, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(216, 21, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(217, 21, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(218, 21, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(219, 21, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(220, 21, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(221, 21, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(222, 22, 0, NULL, '23', 1);
INSERT INTO `mdl_course_sections` VALUES(223, 22, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(224, 22, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(225, 22, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(226, 22, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(227, 22, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(228, 22, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(229, 22, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(230, 22, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(231, 22, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(232, 22, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(233, 23, 0, NULL, '24', 1);
INSERT INTO `mdl_course_sections` VALUES(234, 23, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(235, 23, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(236, 23, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(237, 23, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(238, 23, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(239, 23, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(240, 23, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(241, 23, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(242, 23, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(243, 23, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(244, 24, 0, NULL, '25', 1);
INSERT INTO `mdl_course_sections` VALUES(245, 24, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(246, 24, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(247, 24, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(248, 24, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(249, 24, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(250, 24, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(251, 24, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(252, 24, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(253, 24, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(254, 24, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(255, 25, 0, NULL, '26', 1);
INSERT INTO `mdl_course_sections` VALUES(256, 25, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(257, 25, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(258, 25, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(259, 25, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(260, 25, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(261, 25, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(262, 25, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(263, 25, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(264, 25, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(265, 25, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(266, 26, 0, NULL, '27', 1);
INSERT INTO `mdl_course_sections` VALUES(267, 26, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(268, 26, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(269, 26, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(270, 26, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(271, 26, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(272, 26, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(273, 26, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(274, 26, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(275, 26, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(276, 26, 10, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(277, 27, 0, NULL, '28', 1);
INSERT INTO `mdl_course_sections` VALUES(278, 27, 1, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(279, 27, 2, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(280, 27, 3, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(281, 27, 4, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(282, 27, 5, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(283, 27, 6, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(284, 27, 7, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(285, 27, 8, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(286, 27, 9, '', NULL, 1);
INSERT INTO `mdl_course_sections` VALUES(287, 27, 10, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_data`
--

CREATE TABLE `mdl_data` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `comments` smallint(4) unsigned NOT NULL DEFAULT '0',
  `timeavailablefrom` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeavailableto` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeviewfrom` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeviewto` bigint(10) unsigned NOT NULL DEFAULT '0',
  `requiredentries` int(8) unsigned NOT NULL DEFAULT '0',
  `requiredentriestoview` int(8) unsigned NOT NULL DEFAULT '0',
  `maxentries` int(8) unsigned NOT NULL DEFAULT '0',
  `rssarticles` smallint(4) unsigned NOT NULL DEFAULT '0',
  `singletemplate` text,
  `listtemplate` text,
  `listtemplateheader` text,
  `listtemplatefooter` text,
  `addtemplate` text,
  `rsstemplate` text,
  `rsstitletemplate` text,
  `csstemplate` text,
  `jstemplate` text,
  `asearchtemplate` text,
  `approval` smallint(4) unsigned NOT NULL DEFAULT '0',
  `scale` bigint(10) NOT NULL DEFAULT '0',
  `assessed` bigint(10) unsigned NOT NULL DEFAULT '0',
  `defaultsort` bigint(10) unsigned NOT NULL DEFAULT '0',
  `defaultsortdir` smallint(4) unsigned NOT NULL DEFAULT '0',
  `editany` smallint(4) unsigned NOT NULL DEFAULT '0',
  `notification` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_data_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='all database activities' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_data_comments`
--

CREATE TABLE `mdl_data_comments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `recordid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `format` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `created` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_datacomm_rec_ix` (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to comment data records' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_data_content`
--

CREATE TABLE `mdl_data_content` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `fieldid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `recordid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `content` longtext,
  `content1` longtext,
  `content2` longtext,
  `content3` longtext,
  `content4` longtext,
  PRIMARY KEY (`id`),
  KEY `mdl_datacont_rec_ix` (`recordid`),
  KEY `mdl_datacont_fie_ix` (`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='the content introduced in each record/fields' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data_content`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_data_fields`
--

CREATE TABLE `mdl_data_fields` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `dataid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `param1` text,
  `param2` text,
  `param3` text,
  `param4` text,
  `param5` text,
  `param6` text,
  `param7` text,
  `param8` text,
  `param9` text,
  `param10` text,
  PRIMARY KEY (`id`),
  KEY `mdl_datafiel_typdat_ix` (`type`,`dataid`),
  KEY `mdl_datafiel_dat_ix` (`dataid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='every field available' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_data_ratings`
--

CREATE TABLE `mdl_data_ratings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `recordid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rating` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_datarati_rec_ix` (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to rate data records' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data_ratings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_data_records`
--

CREATE TABLE `mdl_data_records` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `dataid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `approved` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_datareco_dat_ix` (`dataid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='every record introduced' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_data_records`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_enrol_authorize`
--

CREATE TABLE `mdl_enrol_authorize` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `paymentmethod` enum('cc','echeck') NOT NULL DEFAULT 'cc',
  `refundinfo` smallint(4) unsigned NOT NULL DEFAULT '0',
  `ccname` varchar(255) NOT NULL DEFAULT '',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `transid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `status` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `settletime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `amount` varchar(10) NOT NULL DEFAULT '',
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  PRIMARY KEY (`id`),
  KEY `mdl_enroauth_cou_ix` (`courseid`),
  KEY `mdl_enroauth_use_ix` (`userid`),
  KEY `mdl_enroauth_sta_ix` (`status`),
  KEY `mdl_enroauth_tra_ix` (`transid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Holds all known information about authorize.net transactions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_enrol_authorize`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_enrol_authorize_refunds`
--

CREATE TABLE `mdl_enrol_authorize_refunds` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `amount` varchar(10) NOT NULL DEFAULT '',
  `transid` bigint(20) unsigned DEFAULT '0',
  `settletime` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_enroauthrefu_tra_ix` (`transid`),
  KEY `mdl_enroauthrefu_ord_ix` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Authorize.net refunds' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_enrol_authorize_refunds`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_enrol_paypal`
--

CREATE TABLE `mdl_enrol_paypal` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `business` varchar(255) NOT NULL DEFAULT '',
  `receiver_email` varchar(255) NOT NULL DEFAULT '',
  `receiver_id` varchar(255) NOT NULL DEFAULT '',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `memo` varchar(255) NOT NULL DEFAULT '',
  `tax` varchar(255) NOT NULL DEFAULT '',
  `option_name1` varchar(255) NOT NULL DEFAULT '',
  `option_selection1_x` varchar(255) NOT NULL DEFAULT '',
  `option_name2` varchar(255) NOT NULL DEFAULT '',
  `option_selection2_x` varchar(255) NOT NULL DEFAULT '',
  `payment_status` varchar(255) NOT NULL DEFAULT '',
  `pending_reason` varchar(255) NOT NULL DEFAULT '',
  `reason_code` varchar(30) NOT NULL DEFAULT '',
  `txn_id` varchar(255) NOT NULL DEFAULT '',
  `parent_txn_id` varchar(255) NOT NULL DEFAULT '',
  `payment_type` varchar(30) NOT NULL DEFAULT '',
  `timeupdated` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Holds all known information about PayPal transactions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_enrol_paypal`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_event`
--

CREATE TABLE `mdl_event` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `format` smallint(4) unsigned NOT NULL DEFAULT '0',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `repeatid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modulename` varchar(20) NOT NULL DEFAULT '',
  `instance` bigint(10) unsigned NOT NULL DEFAULT '0',
  `eventtype` varchar(20) NOT NULL DEFAULT '',
  `timestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeduration` bigint(10) unsigned NOT NULL DEFAULT '0',
  `visible` smallint(4) NOT NULL DEFAULT '1',
  `uuid` varchar(36) NOT NULL DEFAULT '',
  `sequence` bigint(10) unsigned NOT NULL DEFAULT '1',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_even_cou_ix` (`courseid`),
  KEY `mdl_even_use_ix` (`userid`),
  KEY `mdl_even_tim_ix` (`timestart`),
  KEY `mdl_even_tim2_ix` (`timeduration`),
  KEY `mdl_even_grocouvisuse_ix` (`groupid`,`courseid`,`visible`,`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='For everything with a time associated to it' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_event`
--

INSERT INTO `mdl_event` VALUES(2, 'tes', 'tes', 0, 5, 0, 0, 0, 'assignment', 2, 'due', 1344543000, 0, 1, '', 1, 1343938284);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_events_handlers`
--

CREATE TABLE `mdl_events_handlers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventname` varchar(166) NOT NULL DEFAULT '',
  `handlermodule` varchar(166) NOT NULL DEFAULT '',
  `handlerfile` varchar(255) NOT NULL DEFAULT '',
  `handlerfunction` mediumtext,
  `schedule` varchar(255) DEFAULT NULL,
  `status` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_evenhand_evehan_uix` (`eventname`,`handlermodule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table is for storing which components requests what typ' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_events_handlers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_events_queue`
--

CREATE TABLE `mdl_events_queue` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventdata` longtext NOT NULL,
  `stackdump` mediumtext,
  `userid` bigint(10) unsigned DEFAULT NULL,
  `timecreated` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_evenqueu_use_ix` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table is for storing queued events. It stores only one ' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_events_queue`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_events_queue_handlers`
--

CREATE TABLE `mdl_events_queue_handlers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `queuedeventid` bigint(10) unsigned NOT NULL,
  `handlerid` bigint(10) unsigned NOT NULL,
  `status` bigint(10) DEFAULT NULL,
  `errormessage` mediumtext,
  `timemodified` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_evenqueuhand_que_ix` (`queuedeventid`),
  KEY `mdl_evenqueuhand_han_ix` (`handlerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This is the list of queued handlers for processing. The even' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_events_queue_handlers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum`
--

CREATE TABLE `mdl_forum` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `type` enum('single','news','general','social','eachuser','teacher','qanda') NOT NULL DEFAULT 'general',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `assessed` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assesstimestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assesstimefinish` bigint(10) unsigned NOT NULL DEFAULT '0',
  `scale` bigint(10) NOT NULL DEFAULT '0',
  `maxbytes` bigint(10) unsigned NOT NULL DEFAULT '0',
  `forcesubscribe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `trackingtype` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `rsstype` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `rssarticles` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `warnafter` bigint(10) unsigned NOT NULL DEFAULT '0',
  `blockafter` bigint(10) unsigned NOT NULL DEFAULT '0',
  `blockperiod` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_foru_cou_ix` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Forums contain and structure discussion' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mdl_forum`
--

INSERT INTO `mdl_forum` VALUES(2, 3, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936233, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(3, 4, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936270, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(4, 5, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936291, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(5, 6, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936350, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(6, 7, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936386, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(7, 8, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343936402, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(8, 1, 'news', 'Site news', 'General news and announcements', 0, 0, 0, 0, 0, 0, 1, 0, 0, 1343936451, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(9, 9, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937161, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(10, 10, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937185, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(11, 11, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937209, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(12, 12, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937226, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(13, 13, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937245, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(14, 14, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937264, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(15, 15, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937284, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(16, 16, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937300, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(17, 17, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937317, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(18, 18, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937331, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(19, 19, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937348, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(20, 20, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937368, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(21, 21, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937393, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(22, 22, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937414, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(23, 23, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937473, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(24, 24, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937492, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(25, 25, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937531, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(26, 26, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937558, 0, 0, 0);
INSERT INTO `mdl_forum` VALUES(27, 27, 'news', 'News forum', 'General news and announcements', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1343937580, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_discussions`
--

CREATE TABLE `mdl_forum_discussions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `forum` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `firstpost` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) NOT NULL DEFAULT '-1',
  `assessed` tinyint(1) NOT NULL DEFAULT '1',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_forudisc_use_ix` (`userid`),
  KEY `mdl_forudisc_for_ix` (`forum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Forums are composed of discussions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_discussions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_posts`
--

CREATE TABLE `mdl_forum_posts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `discussion` bigint(10) unsigned NOT NULL DEFAULT '0',
  `parent` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `created` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mailed` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `format` tinyint(2) NOT NULL DEFAULT '0',
  `attachment` varchar(100) NOT NULL DEFAULT '',
  `totalscore` smallint(4) NOT NULL DEFAULT '0',
  `mailnow` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_forupost_use_ix` (`userid`),
  KEY `mdl_forupost_cre_ix` (`created`),
  KEY `mdl_forupost_mai_ix` (`mailed`),
  KEY `mdl_forupost_dis_ix` (`discussion`),
  KEY `mdl_forupost_par_ix` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All posts are stored in this table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_queue`
--

CREATE TABLE `mdl_forum_queue` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `discussionid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `postid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_foruqueu_use_ix` (`userid`),
  KEY `mdl_foruqueu_dis_ix` (`discussionid`),
  KEY `mdl_foruqueu_pos_ix` (`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='For keeping track of posts that will be mailed in digest for' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_queue`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_ratings`
--

CREATE TABLE `mdl_forum_ratings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `post` bigint(10) unsigned NOT NULL DEFAULT '0',
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rating` smallint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_forurati_use_ix` (`userid`),
  KEY `mdl_forurati_pos_ix` (`post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='forum_ratings table retrofitted from MySQL' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_ratings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_read`
--

CREATE TABLE `mdl_forum_read` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `forumid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `discussionid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `postid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `firstread` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastread` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_foruread_usefor_ix` (`userid`,`forumid`),
  KEY `mdl_foruread_usedis_ix` (`userid`,`discussionid`),
  KEY `mdl_foruread_usepos_ix` (`userid`,`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tracks each users read posts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_read`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_subscriptions`
--

CREATE TABLE `mdl_forum_subscriptions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `forum` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_forusubs_use_ix` (`userid`),
  KEY `mdl_forusubs_for_ix` (`forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keeps track of who is subscribed to what forum' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mdl_forum_subscriptions`
--

INSERT INTO `mdl_forum_subscriptions` VALUES(1, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_forum_track_prefs`
--

CREATE TABLE `mdl_forum_track_prefs` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `forumid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_forutracpref_usefor_ix` (`userid`,`forumid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tracks each users untracked forums' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_forum_track_prefs`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary`
--

CREATE TABLE `mdl_glossary` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `allowduplicatedentries` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `displayformat` varchar(50) NOT NULL DEFAULT 'dictionary',
  `mainglossary` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `showspecial` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `showalphabet` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `showall` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `allowcomments` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `allowprintview` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `usedynalink` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `defaultapproval` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `globalglossary` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `entbypage` smallint(3) unsigned NOT NULL DEFAULT '10',
  `editalways` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `rsstype` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `rssarticles` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `assessed` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assesstimestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assesstimefinish` bigint(10) unsigned NOT NULL DEFAULT '0',
  `scale` bigint(10) NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_glos_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='all glossaries' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_alias`
--

CREATE TABLE `mdl_glossary_alias` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `entryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_glosalia_ent_ix` (`entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='entries alias' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_alias`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_categories`
--

CREATE TABLE `mdl_glossary_categories` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `glossaryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `usedynalink` tinyint(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_gloscate_glo_ix` (`glossaryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='all categories for glossary entries' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_comments`
--

CREATE TABLE `mdl_glossary_comments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `entryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `entrycomment` text NOT NULL,
  `format` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_gloscomm_use_ix` (`userid`),
  KEY `mdl_gloscomm_ent_ix` (`entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='comments on glossary entries' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_entries`
--

CREATE TABLE `mdl_glossary_entries` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `glossaryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `concept` varchar(255) NOT NULL DEFAULT '',
  `definition` text NOT NULL,
  `format` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `attachment` varchar(100) NOT NULL DEFAULT '',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `teacherentry` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `sourceglossaryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `usedynalink` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `casesensitive` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `fullmatch` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `approved` tinyint(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_glosentr_use_ix` (`userid`),
  KEY `mdl_glosentr_con_ix` (`concept`),
  KEY `mdl_glosentr_glo_ix` (`glossaryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='all glossary entries' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_entries_categories`
--

CREATE TABLE `mdl_glossary_entries_categories` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `entryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_glosentrcate_cat_ix` (`categoryid`),
  KEY `mdl_glosentrcate_ent_ix` (`entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='categories of each glossary entry' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_entries_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_formats`
--

CREATE TABLE `mdl_glossary_formats` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `popupformatname` varchar(50) NOT NULL DEFAULT '',
  `visible` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `showgroup` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `defaultmode` varchar(50) NOT NULL DEFAULT '',
  `defaulthook` varchar(50) NOT NULL DEFAULT '',
  `sortkey` varchar(50) NOT NULL DEFAULT '',
  `sortorder` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Setting of the display formats' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mdl_glossary_formats`
--

INSERT INTO `mdl_glossary_formats` VALUES(1, 'continuous', 'continuous', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(2, 'dictionary', 'dictionary', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(3, 'encyclopedia', 'encyclopedia', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(4, 'entrylist', 'entrylist', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(5, 'faq', 'faq', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(6, 'fullwithauthor', 'fullwithauthor', 1, 1, '', '', '', '');
INSERT INTO `mdl_glossary_formats` VALUES(7, 'fullwithoutauthor', 'fullwithoutauthor', 1, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_glossary_ratings`
--

CREATE TABLE `mdl_glossary_ratings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `entryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rating` smallint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_glosrati_use_ix` (`userid`),
  KEY `mdl_glosrati_ent_ix` (`entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains user ratings for entries' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_glossary_ratings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_categories`
--

CREATE TABLE `mdl_grade_categories` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL,
  `parent` bigint(10) unsigned DEFAULT NULL,
  `depth` bigint(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `aggregation` bigint(10) NOT NULL DEFAULT '0',
  `keephigh` bigint(10) NOT NULL DEFAULT '0',
  `droplow` bigint(10) NOT NULL DEFAULT '0',
  `aggregateonlygraded` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `aggregateoutcomes` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `aggregatesubcats` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_gradcate_cou_ix` (`courseid`),
  KEY `mdl_gradcate_par_ix` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='This table keeps information about categories, used for grou' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_grade_categories`
--

INSERT INTO `mdl_grade_categories` VALUES(2, 5, NULL, 1, '/2/', '?', 11, 0, 0, 1, 0, 0, 1343938234, 1343938234);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_categories_history`
--

CREATE TABLE `mdl_grade_categories_history` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldid` bigint(10) unsigned NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `loggeduser` bigint(10) unsigned DEFAULT NULL,
  `courseid` bigint(10) unsigned NOT NULL,
  `parent` bigint(10) unsigned DEFAULT NULL,
  `depth` bigint(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `aggregation` bigint(10) NOT NULL DEFAULT '0',
  `keephigh` bigint(10) NOT NULL DEFAULT '0',
  `droplow` bigint(10) NOT NULL DEFAULT '0',
  `aggregateonlygraded` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `aggregateoutcomes` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `aggregatesubcats` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_gradcatehist_act_ix` (`action`),
  KEY `mdl_gradcatehist_old_ix` (`oldid`),
  KEY `mdl_gradcatehist_cou_ix` (`courseid`),
  KEY `mdl_gradcatehist_par_ix` (`parent`),
  KEY `mdl_gradcatehist_log_ix` (`loggeduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='History of grade_categories' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mdl_grade_categories_history`
--

INSERT INTO `mdl_grade_categories_history` VALUES(1, 1, 1, 'system', 1343925852, 2, 2, NULL, 0, NULL, '?', 11, 0, 0, 1, 0, 0);
INSERT INTO `mdl_grade_categories_history` VALUES(2, 2, 1, 'system', 1343925852, 2, 2, NULL, 1, '/1/', '?', 11, 0, 0, 1, 0, 0);
INSERT INTO `mdl_grade_categories_history` VALUES(3, 3, 1, 'coursedelete', 1343935966, 2, 2, NULL, 1, '/1/', '?', 11, 0, 0, 1, 0, 0);
INSERT INTO `mdl_grade_categories_history` VALUES(4, 1, 2, 'system', 1343938234, 2, 5, NULL, 0, NULL, '?', 11, 0, 0, 1, 0, 0);
INSERT INTO `mdl_grade_categories_history` VALUES(5, 2, 2, 'system', 1343938234, 2, 5, NULL, 1, '/2/', '?', 11, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_grades`
--

CREATE TABLE `mdl_grade_grades` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint(10) unsigned NOT NULL,
  `userid` bigint(10) unsigned NOT NULL,
  `rawgrade` decimal(10,5) DEFAULT NULL,
  `rawgrademax` decimal(10,5) NOT NULL DEFAULT '100.00000',
  `rawgrademin` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `rawscaleid` bigint(10) unsigned DEFAULT NULL,
  `usermodified` bigint(10) unsigned DEFAULT NULL,
  `finalgrade` decimal(10,5) DEFAULT NULL,
  `hidden` bigint(10) unsigned NOT NULL DEFAULT '0',
  `locked` bigint(10) unsigned NOT NULL DEFAULT '0',
  `locktime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `exported` bigint(10) unsigned NOT NULL DEFAULT '0',
  `overridden` bigint(10) unsigned NOT NULL DEFAULT '0',
  `excluded` bigint(10) unsigned NOT NULL DEFAULT '0',
  `feedback` mediumtext,
  `feedbackformat` bigint(10) unsigned NOT NULL DEFAULT '0',
  `information` mediumtext,
  `informationformat` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_gradgrad_useite_uix` (`userid`,`itemid`),
  KEY `mdl_gradgrad_locloc_ix` (`locked`,`locktime`),
  KEY `mdl_gradgrad_ite_ix` (`itemid`),
  KEY `mdl_gradgrad_use_ix` (`userid`),
  KEY `mdl_gradgrad_raw_ix` (`rawscaleid`),
  KEY `mdl_gradgrad_use2_ix` (`usermodified`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='grade_grades  This table keeps individual grades for each us' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_grades`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_grades_history`
--

CREATE TABLE `mdl_grade_grades_history` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldid` bigint(10) unsigned NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `loggeduser` bigint(10) unsigned DEFAULT NULL,
  `itemid` bigint(10) unsigned NOT NULL,
  `userid` bigint(10) unsigned NOT NULL,
  `rawgrade` decimal(10,5) DEFAULT NULL,
  `rawgrademax` decimal(10,5) NOT NULL DEFAULT '100.00000',
  `rawgrademin` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `rawscaleid` bigint(10) unsigned DEFAULT NULL,
  `usermodified` bigint(10) unsigned DEFAULT NULL,
  `finalgrade` decimal(10,5) DEFAULT NULL,
  `hidden` bigint(10) unsigned NOT NULL DEFAULT '0',
  `locked` bigint(10) unsigned NOT NULL DEFAULT '0',
  `locktime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `exported` bigint(10) unsigned NOT NULL DEFAULT '0',
  `overridden` bigint(10) unsigned NOT NULL DEFAULT '0',
  `excluded` bigint(10) unsigned NOT NULL DEFAULT '0',
  `feedback` mediumtext,
  `feedbackformat` bigint(10) unsigned NOT NULL DEFAULT '0',
  `information` mediumtext,
  `informationformat` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_gradgradhist_act_ix` (`action`),
  KEY `mdl_gradgradhist_old_ix` (`oldid`),
  KEY `mdl_gradgradhist_ite_ix` (`itemid`),
  KEY `mdl_gradgradhist_use_ix` (`userid`),
  KEY `mdl_gradgradhist_raw_ix` (`rawscaleid`),
  KEY `mdl_gradgradhist_use2_ix` (`usermodified`),
  KEY `mdl_gradgradhist_log_ix` (`loggeduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='History table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_grades_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_import_newitem`
--

CREATE TABLE `mdl_grade_import_newitem` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemname` varchar(255) NOT NULL DEFAULT '',
  `importcode` bigint(10) unsigned NOT NULL,
  `importer` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_gradimponewi_imp_ix` (`importer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='temporary table for storing new grade_item names from grade ' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_import_newitem`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_import_values`
--

CREATE TABLE `mdl_grade_import_values` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint(10) unsigned DEFAULT NULL,
  `newgradeitem` bigint(10) unsigned DEFAULT NULL,
  `userid` bigint(10) unsigned NOT NULL,
  `finalgrade` decimal(10,5) DEFAULT NULL,
  `feedback` mediumtext,
  `importcode` bigint(10) unsigned NOT NULL,
  `importer` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_gradimpovalu_ite_ix` (`itemid`),
  KEY `mdl_gradimpovalu_new_ix` (`newgradeitem`),
  KEY `mdl_gradimpovalu_imp_ix` (`importer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Temporary table for importing grades' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_import_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_items`
--

CREATE TABLE `mdl_grade_items` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned DEFAULT NULL,
  `categoryid` bigint(10) unsigned DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `itemtype` varchar(30) NOT NULL DEFAULT '',
  `itemmodule` varchar(30) DEFAULT NULL,
  `iteminstance` bigint(10) unsigned DEFAULT NULL,
  `itemnumber` bigint(10) unsigned DEFAULT NULL,
  `iteminfo` mediumtext,
  `idnumber` varchar(255) DEFAULT NULL,
  `calculation` mediumtext,
  `gradetype` smallint(4) NOT NULL DEFAULT '1',
  `grademax` decimal(10,5) NOT NULL DEFAULT '100.00000',
  `grademin` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `scaleid` bigint(10) unsigned DEFAULT NULL,
  `outcomeid` bigint(10) unsigned DEFAULT NULL,
  `gradepass` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `multfactor` decimal(10,5) NOT NULL DEFAULT '1.00000',
  `plusfactor` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `aggregationcoef` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `sortorder` bigint(10) NOT NULL DEFAULT '0',
  `display` bigint(10) NOT NULL DEFAULT '0',
  `decimals` tinyint(1) unsigned DEFAULT NULL,
  `hidden` bigint(10) NOT NULL DEFAULT '0',
  `locked` bigint(10) NOT NULL DEFAULT '0',
  `locktime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `needsupdate` bigint(10) NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_graditem_locloc_ix` (`locked`,`locktime`),
  KEY `mdl_graditem_itenee_ix` (`itemtype`,`needsupdate`),
  KEY `mdl_graditem_gra_ix` (`gradetype`),
  KEY `mdl_graditem_idncou_ix` (`idnumber`,`courseid`),
  KEY `mdl_graditem_cou_ix` (`courseid`),
  KEY `mdl_graditem_cat_ix` (`categoryid`),
  KEY `mdl_graditem_sca_ix` (`scaleid`),
  KEY `mdl_graditem_out_ix` (`outcomeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='This table keeps information about gradeable items (ie colum' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mdl_grade_items`
--

INSERT INTO `mdl_grade_items` VALUES(3, 5, NULL, NULL, 'course', NULL, 2, NULL, NULL, NULL, NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 1, 0, NULL, 0, 0, 0, 0, 1343938234, 1343938234);
INSERT INTO `mdl_grade_items` VALUES(4, 5, 2, 'tes', 'mod', 'assignment', 2, 0, NULL, '', NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 2, 0, NULL, 0, 0, 0, 0, 1343938284, 1343938284);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_items_history`
--

CREATE TABLE `mdl_grade_items_history` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldid` bigint(10) unsigned NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `loggeduser` bigint(10) unsigned DEFAULT NULL,
  `courseid` bigint(10) unsigned DEFAULT NULL,
  `categoryid` bigint(10) unsigned DEFAULT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `itemtype` varchar(30) NOT NULL DEFAULT '',
  `itemmodule` varchar(30) DEFAULT NULL,
  `iteminstance` bigint(10) unsigned DEFAULT NULL,
  `itemnumber` bigint(10) unsigned DEFAULT NULL,
  `iteminfo` mediumtext,
  `idnumber` varchar(255) DEFAULT NULL,
  `calculation` mediumtext,
  `gradetype` smallint(4) NOT NULL DEFAULT '1',
  `grademax` decimal(10,5) NOT NULL DEFAULT '100.00000',
  `grademin` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `scaleid` bigint(10) unsigned DEFAULT NULL,
  `outcomeid` bigint(10) unsigned DEFAULT NULL,
  `gradepass` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `multfactor` decimal(10,5) NOT NULL DEFAULT '1.00000',
  `plusfactor` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `aggregationcoef` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `sortorder` bigint(10) NOT NULL DEFAULT '0',
  `hidden` bigint(10) NOT NULL DEFAULT '0',
  `locked` bigint(10) NOT NULL DEFAULT '0',
  `locktime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `needsupdate` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_graditemhist_act_ix` (`action`),
  KEY `mdl_graditemhist_old_ix` (`oldid`),
  KEY `mdl_graditemhist_cou_ix` (`courseid`),
  KEY `mdl_graditemhist_cat_ix` (`categoryid`),
  KEY `mdl_graditemhist_sca_ix` (`scaleid`),
  KEY `mdl_graditemhist_out_ix` (`outcomeid`),
  KEY `mdl_graditemhist_log_ix` (`loggeduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='History of grade_items' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mdl_grade_items_history`
--

INSERT INTO `mdl_grade_items_history` VALUES(1, 1, 1, 'system', 1343925852, 2, 2, NULL, NULL, 'course', NULL, 1, NULL, NULL, NULL, NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 1, 0, 0, 0, 1);
INSERT INTO `mdl_grade_items_history` VALUES(2, 1, 2, NULL, 1343925859, 2, 2, 1, 'ts', 'mod', 'assignment', 1, 0, NULL, '', NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 2, 0, 0, 0, 1);
INSERT INTO `mdl_grade_items_history` VALUES(3, 3, 2, 'mod/assignment', 1343935965, 2, 2, 1, 'ts', 'mod', 'assignment', 1, 0, NULL, '', NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 2, 0, 0, 0, 1);
INSERT INTO `mdl_grade_items_history` VALUES(4, 3, 1, 'coursedelete', 1343935966, 2, 2, NULL, NULL, 'course', NULL, 1, NULL, NULL, NULL, NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 1, 0, 0, 0, 1);
INSERT INTO `mdl_grade_items_history` VALUES(5, 1, 3, 'system', 1343938234, 2, 5, NULL, NULL, 'course', NULL, 2, NULL, NULL, NULL, NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 1, 0, 0, 0, 1);
INSERT INTO `mdl_grade_items_history` VALUES(6, 1, 4, NULL, 1343938284, 2, 5, 2, 'tes', 'mod', 'assignment', 2, 0, NULL, '', NULL, 1, 100.00000, 0.00000, NULL, NULL, 0.00000, 1.00000, 0.00000, 0.00000, 2, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_letters`
--

CREATE TABLE `mdl_grade_letters` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint(10) unsigned NOT NULL,
  `lowerboundary` decimal(10,5) NOT NULL,
  `letter` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_gradlett_conlow_ix` (`contextid`,`lowerboundary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Repository for grade letters, for courses and other moodle e' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_letters`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_outcomes`
--

CREATE TABLE `mdl_grade_outcomes` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned DEFAULT NULL,
  `shortname` varchar(255) NOT NULL DEFAULT '',
  `fullname` text NOT NULL,
  `scaleid` bigint(10) unsigned DEFAULT NULL,
  `description` text,
  `timecreated` bigint(10) unsigned DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `usermodified` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_gradoutc_cousho_uix` (`courseid`,`shortname`),
  KEY `mdl_gradoutc_cou_ix` (`courseid`),
  KEY `mdl_gradoutc_sca_ix` (`scaleid`),
  KEY `mdl_gradoutc_use_ix` (`usermodified`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table describes the outcomes used in the system. An out' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_outcomes`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_outcomes_courses`
--

CREATE TABLE `mdl_grade_outcomes_courses` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL,
  `outcomeid` bigint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_gradoutccour_couout_uix` (`courseid`,`outcomeid`),
  KEY `mdl_gradoutccour_cou_ix` (`courseid`),
  KEY `mdl_gradoutccour_out_ix` (`outcomeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='stores what outcomes are used in what courses.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_outcomes_courses`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_outcomes_history`
--

CREATE TABLE `mdl_grade_outcomes_history` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldid` bigint(10) unsigned NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `loggeduser` bigint(10) unsigned DEFAULT NULL,
  `courseid` bigint(10) unsigned DEFAULT NULL,
  `shortname` varchar(255) NOT NULL DEFAULT '',
  `fullname` text NOT NULL,
  `scaleid` bigint(10) unsigned DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `mdl_gradoutchist_act_ix` (`action`),
  KEY `mdl_gradoutchist_old_ix` (`oldid`),
  KEY `mdl_gradoutchist_cou_ix` (`courseid`),
  KEY `mdl_gradoutchist_sca_ix` (`scaleid`),
  KEY `mdl_gradoutchist_log_ix` (`loggeduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='History table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_outcomes_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_grade_settings`
--

CREATE TABLE `mdl_grade_settings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_gradsett_counam_uix` (`courseid`,`name`),
  KEY `mdl_gradsett_cou_ix` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gradebook settings' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_grade_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_groupings`
--

CREATE TABLE `mdl_groupings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `configdata` text,
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_grou_cou2_ix` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='A grouping is a collection of groups. WAS: groups_groupings' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_groupings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_groupings_groups`
--

CREATE TABLE `mdl_groupings_groups` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupingid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeadded` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_grougrou_gro_ix` (`groupingid`),
  KEY `mdl_grougrou_gro2_ix` (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Link a grouping to a group (note, groups can be in multiple ' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_groupings_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_groups`
--

CREATE TABLE `mdl_groups` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL,
  `name` varchar(254) NOT NULL DEFAULT '',
  `description` text,
  `enrolmentkey` varchar(50) DEFAULT NULL,
  `picture` bigint(10) unsigned NOT NULL DEFAULT '0',
  `hidepicture` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_grou_cou_ix` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Each record represents a group.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_groups_members`
--

CREATE TABLE `mdl_groups_members` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeadded` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_groumemb_gro_ix` (`groupid`),
  KEY `mdl_groumemb_use_ix` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Link a user to a group.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_groups_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot`
--

CREATE TABLE `mdl_hotpot` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `timeopen` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeclose` bigint(10) unsigned NOT NULL DEFAULT '0',
  `location` smallint(4) unsigned NOT NULL DEFAULT '0',
  `reference` varchar(255) NOT NULL DEFAULT '',
  `outputformat` smallint(4) unsigned NOT NULL DEFAULT '1',
  `navigation` smallint(4) unsigned NOT NULL DEFAULT '1',
  `studentfeedback` smallint(4) unsigned NOT NULL DEFAULT '0',
  `studentfeedbackurl` varchar(255) NOT NULL DEFAULT '',
  `forceplugins` smallint(4) unsigned NOT NULL DEFAULT '0',
  `shownextquiz` smallint(4) unsigned NOT NULL DEFAULT '0',
  `review` smallint(4) NOT NULL DEFAULT '0',
  `grade` bigint(10) NOT NULL DEFAULT '0',
  `grademethod` smallint(4) NOT NULL DEFAULT '1',
  `attempts` mediumint(6) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  `subnet` varchar(255) NOT NULL DEFAULT '',
  `clickreporting` smallint(4) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='details about Hot Potatoes quizzes' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot_attempts`
--

CREATE TABLE `mdl_hotpot_attempts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotpot` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `starttime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `endtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `score` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `penalties` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `attempt` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `timestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timefinish` bigint(10) unsigned NOT NULL DEFAULT '0',
  `status` smallint(4) unsigned NOT NULL DEFAULT '1',
  `clickreportid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_hotpatte_use_ix` (`userid`),
  KEY `mdl_hotpatte_hot_ix` (`hotpot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='details about Hot Potatoes quiz attempts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot_details`
--

CREATE TABLE `mdl_hotpot_details` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `attempt` bigint(10) unsigned NOT NULL DEFAULT '0',
  `details` text,
  PRIMARY KEY (`id`),
  KEY `mdl_hotpdeta_att_ix` (`attempt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='raw details (as XML) of Hot Potatoes quiz attempts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot_questions`
--

CREATE TABLE `mdl_hotpot_questions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `type` smallint(4) unsigned NOT NULL DEFAULT '0',
  `text` bigint(10) unsigned NOT NULL DEFAULT '0',
  `hotpot` bigint(10) unsigned NOT NULL DEFAULT '0',
  `md5key` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_hotpques_md5_ix` (`md5key`),
  KEY `mdl_hotpques_hot_ix` (`hotpot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='details about questions in Hot Potatoes quiz attempts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot_questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot_responses`
--

CREATE TABLE `mdl_hotpot_responses` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `attempt` bigint(10) unsigned NOT NULL DEFAULT '0',
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `score` mediumint(6) NOT NULL DEFAULT '0',
  `weighting` mediumint(6) NOT NULL DEFAULT '0',
  `correct` varchar(255) NOT NULL DEFAULT '',
  `wrong` varchar(255) NOT NULL DEFAULT '',
  `ignored` varchar(255) NOT NULL DEFAULT '',
  `hints` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `clues` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `checks` mediumint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_hotpresp_att_ix` (`attempt`),
  KEY `mdl_hotpresp_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='details about responses in Hot Potatoes quiz attempts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot_responses`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_hotpot_strings`
--

CREATE TABLE `mdl_hotpot_strings` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `string` text NOT NULL,
  `md5key` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_hotpstri_md5_ix` (`md5key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='strings used in Hot Potatoes questions and responses' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_hotpot_strings`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_journal`
--

CREATE TABLE `mdl_journal` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `introformat` tinyint(2) NOT NULL DEFAULT '0',
  `days` mediumint(5) unsigned NOT NULL DEFAULT '7',
  `assessed` bigint(10) NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_jour_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='data for each journal' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_journal`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_journal_entries`
--

CREATE TABLE `mdl_journal_entries` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `journal` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `format` tinyint(2) NOT NULL DEFAULT '0',
  `rating` bigint(10) DEFAULT '0',
  `entrycomment` text,
  `teacher` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemarked` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mailed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_jourentr_use_ix` (`userid`),
  KEY `mdl_jourentr_jou_ix` (`journal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All the journal entries of all people' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_journal_entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_label`
--

CREATE TABLE `mdl_label` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_labe_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines labels' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_label`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lams`
--

CREATE TABLE `mdl_lams` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `introduction` text NOT NULL,
  `learning_session_id` bigint(20) DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_lams_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='LAMS activity' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lams`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson`
--

CREATE TABLE `mdl_lesson` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `practice` smallint(3) unsigned NOT NULL DEFAULT '0',
  `modattempts` smallint(3) unsigned NOT NULL DEFAULT '0',
  `usepassword` smallint(3) unsigned NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '',
  `dependency` bigint(10) unsigned NOT NULL DEFAULT '0',
  `conditions` text NOT NULL,
  `grade` smallint(3) NOT NULL DEFAULT '0',
  `custom` smallint(3) unsigned NOT NULL DEFAULT '0',
  `ongoing` smallint(3) unsigned NOT NULL DEFAULT '0',
  `usemaxgrade` smallint(3) NOT NULL DEFAULT '0',
  `maxanswers` smallint(3) unsigned NOT NULL DEFAULT '4',
  `maxattempts` smallint(3) unsigned NOT NULL DEFAULT '5',
  `review` smallint(3) unsigned NOT NULL DEFAULT '0',
  `nextpagedefault` smallint(3) unsigned NOT NULL DEFAULT '0',
  `feedback` smallint(3) unsigned NOT NULL DEFAULT '1',
  `minquestions` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxpages` smallint(3) unsigned NOT NULL DEFAULT '0',
  `timed` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `retake` smallint(3) unsigned NOT NULL DEFAULT '1',
  `activitylink` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mediafile` varchar(255) NOT NULL DEFAULT '',
  `mediaheight` bigint(10) unsigned NOT NULL DEFAULT '100',
  `mediawidth` bigint(10) unsigned NOT NULL DEFAULT '650',
  `mediaclose` smallint(3) unsigned NOT NULL DEFAULT '0',
  `slideshow` smallint(3) unsigned NOT NULL DEFAULT '0',
  `width` bigint(10) unsigned NOT NULL DEFAULT '640',
  `height` bigint(10) unsigned NOT NULL DEFAULT '480',
  `bgcolor` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  `displayleft` smallint(3) unsigned NOT NULL DEFAULT '0',
  `displayleftif` smallint(3) unsigned NOT NULL DEFAULT '0',
  `progressbar` smallint(3) unsigned NOT NULL DEFAULT '0',
  `highscores` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxhighscores` bigint(10) unsigned NOT NULL DEFAULT '0',
  `available` bigint(10) unsigned NOT NULL DEFAULT '0',
  `deadline` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_less_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_answers`
--

CREATE TABLE `mdl_lesson_answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `jumpto` bigint(11) NOT NULL DEFAULT '0',
  `grade` smallint(3) unsigned NOT NULL DEFAULT '0',
  `score` bigint(10) NOT NULL DEFAULT '0',
  `flags` smallint(3) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answer` text,
  `response` text,
  PRIMARY KEY (`id`),
  KEY `mdl_lessansw_les_ix` (`lessonid`),
  KEY `mdl_lessansw_pag_ix` (`pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson_answers' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_attempts`
--

CREATE TABLE `mdl_lesson_attempts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answerid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `retry` smallint(3) unsigned NOT NULL DEFAULT '0',
  `correct` bigint(10) unsigned NOT NULL DEFAULT '0',
  `useranswer` text,
  `timeseen` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_lessatte_use_ix` (`userid`),
  KEY `mdl_lessatte_les_ix` (`lessonid`),
  KEY `mdl_lessatte_pag_ix` (`pageid`),
  KEY `mdl_lessatte_ans_ix` (`answerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson_attempts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_branch`
--

CREATE TABLE `mdl_lesson_branch` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `retry` bigint(10) unsigned NOT NULL DEFAULT '0',
  `flag` smallint(3) unsigned NOT NULL DEFAULT '0',
  `timeseen` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_lessbran_use_ix` (`userid`),
  KEY `mdl_lessbran_les_ix` (`lessonid`),
  KEY `mdl_lessbran_pag_ix` (`pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='branches for each lesson/user' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_branch`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_default`
--

CREATE TABLE `mdl_lesson_default` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `practice` smallint(3) unsigned NOT NULL DEFAULT '0',
  `modattempts` smallint(3) unsigned NOT NULL DEFAULT '0',
  `usepassword` smallint(3) unsigned NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '',
  `conditions` text NOT NULL,
  `grade` smallint(3) NOT NULL DEFAULT '0',
  `custom` smallint(3) unsigned NOT NULL DEFAULT '0',
  `ongoing` smallint(3) unsigned NOT NULL DEFAULT '0',
  `usemaxgrade` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxanswers` smallint(3) unsigned NOT NULL DEFAULT '4',
  `maxattempts` smallint(3) unsigned NOT NULL DEFAULT '5',
  `review` smallint(3) unsigned NOT NULL DEFAULT '0',
  `nextpagedefault` smallint(3) unsigned NOT NULL DEFAULT '0',
  `feedback` smallint(3) unsigned NOT NULL DEFAULT '1',
  `minquestions` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxpages` smallint(3) unsigned NOT NULL DEFAULT '0',
  `timed` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxtime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `retake` smallint(3) unsigned NOT NULL DEFAULT '1',
  `mediaheight` bigint(10) unsigned NOT NULL DEFAULT '100',
  `mediawidth` bigint(10) unsigned NOT NULL DEFAULT '650',
  `mediaclose` smallint(3) unsigned NOT NULL DEFAULT '0',
  `slideshow` smallint(3) unsigned NOT NULL DEFAULT '0',
  `width` bigint(10) unsigned NOT NULL DEFAULT '640',
  `height` bigint(10) unsigned NOT NULL DEFAULT '480',
  `bgcolor` varchar(7) DEFAULT '#FFFFFF',
  `displayleft` smallint(3) unsigned NOT NULL DEFAULT '0',
  `displayleftif` smallint(3) unsigned NOT NULL DEFAULT '0',
  `progressbar` smallint(3) unsigned NOT NULL DEFAULT '0',
  `highscores` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxhighscores` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson_default' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_default`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_grades`
--

CREATE TABLE `mdl_lesson_grades` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` double unsigned NOT NULL DEFAULT '0',
  `late` smallint(3) unsigned NOT NULL DEFAULT '0',
  `completed` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_lessgrad_use_ix` (`userid`),
  KEY `mdl_lessgrad_les_ix` (`lessonid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson_grades' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_grades`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_high_scores`
--

CREATE TABLE `mdl_lesson_high_scores` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `gradeid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `nickname` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_lesshighscor_use_ix` (`userid`),
  KEY `mdl_lesshighscor_les_ix` (`lessonid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='high scores for each lesson' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_high_scores`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_pages`
--

CREATE TABLE `mdl_lesson_pages` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `prevpageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `nextpageid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `qtype` smallint(3) unsigned NOT NULL DEFAULT '0',
  `qoption` smallint(3) unsigned NOT NULL DEFAULT '0',
  `layout` smallint(3) unsigned NOT NULL DEFAULT '1',
  `display` smallint(3) unsigned NOT NULL DEFAULT '1',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_lesspage_les_ix` (`lessonid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines lesson_pages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_lesson_timer`
--

CREATE TABLE `mdl_lesson_timer` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `starttime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lessontime` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_lesstime_use_ix` (`userid`),
  KEY `mdl_lesstime_les_ix` (`lessonid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='lesson timer for each lesson' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_lesson_timer`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_log`
--

CREATE TABLE `mdl_log` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL DEFAULT '',
  `cmid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `action` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `info` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_log_coumodact_ix` (`course`,`module`,`action`),
  KEY `mdl_log_tim_ix` (`time`),
  KEY `mdl_log_act_ix` (`action`),
  KEY `mdl_log_usecou_ix` (`userid`,`course`),
  KEY `mdl_log_cmi_ix` (`cmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Every action is logged as far as possible' AUTO_INCREMENT=362 ;

--
-- Dumping data for table `mdl_log`
--

INSERT INTO `mdl_log` VALUES(1, 1343876519, 2, '0.0.0.0', 1, 'user', 0, 'update', 'view.php?id=2&course=1', '');
INSERT INTO `mdl_log` VALUES(2, 1343876545, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(3, 1343888141, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(4, 1343888184, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(5, 1343889121, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(6, 1343892577, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(7, 1343892713, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(8, 1343892739, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(9, 1343892855, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(10, 1343892858, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(11, 1343892887, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(12, 1343892907, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(13, 1343893597, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(14, 1343893685, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(15, 1343893816, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(16, 1343893899, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(17, 1343893947, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(18, 1343893977, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(19, 1343896395, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(20, 1343896722, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(21, 1343896756, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(22, 1343896805, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(23, 1343899163, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(24, 1343899225, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(25, 1343918424, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(26, 1343918431, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(27, 1343918442, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(28, 1343918514, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(29, 1343918613, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(30, 1343918796, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(31, 1343918993, 2, '0.0.0.0', 1, 'user', 0, 'view', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(32, 1343919003, 2, '0.0.0.0', 1, 'user', 0, 'view', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(33, 1343919019, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(34, 1343919059, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(35, 1343919804, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(36, 1343919899, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(37, 1343919962, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(38, 1343920003, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(39, 1343920034, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(40, 1343920045, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(41, 1343922053, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(42, 1343922053, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(43, 1343922431, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(44, 1343922432, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(45, 1343922438, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(46, 1343922438, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(47, 1343922796, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(48, 1343922915, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(49, 1343922969, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(50, 1343923010, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(51, 1343923156, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(52, 1343923167, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(53, 1343923167, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(54, 1343923172, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(55, 1343923172, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(56, 1343923474, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(57, 1343923541, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(58, 1343923930, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(59, 1343923982, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(60, 1343924368, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(61, 1343924422, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(62, 1343925786, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(63, 1343925786, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(64, 1343925802, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=2', 'Course Fullname 101 (ID 2)');
INSERT INTO `mdl_log` VALUES(77, 1343925869, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(79, 1343925910, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(81, 1343925935, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(95, 1343926448, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(96, 1343927001, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(97, 1343927062, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(107, 1343927740, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(108, 1343928065, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(109, 1343928084, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(110, 1343928123, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(111, 1343928161, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(112, 1343928180, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(113, 1343928250, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(114, 1343928299, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(115, 1343928438, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(116, 1343928463, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(117, 1343928489, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(118, 1343928564, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(119, 1343928570, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(120, 1343928601, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(133, 1343929266, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(134, 1343929285, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(136, 1343929337, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(140, 1343929679, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(141, 1343931636, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(142, 1343932680, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(143, 1343932680, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(144, 1343934683, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(149, 1343935278, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(150, 1343935283, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(151, 1343935283, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(152, 1343935338, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(153, 1343935438, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(156, 1343935753, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(158, 1343935803, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(159, 1343935909, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(160, 1343935929, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(161, 1343935929, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(162, 1343935934, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(163, 1343935934, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(165, 1343935950, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(166, 1343936156, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(167, 1343936166, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(168, 1343936229, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=3', 'Diklat Prajabatan Tingkat I (ID 3)');
INSERT INTO `mdl_log` VALUES(169, 1343936233, 2, '0.0.0.0', 3, 'course', 0, 'view', 'view.php?id=3', '3');
INSERT INTO `mdl_log` VALUES(170, 1343936236, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(171, 1343936264, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=4', 'Diklat Prajabatan Tingkat II (ID 4)');
INSERT INTO `mdl_log` VALUES(172, 1343936270, 2, '0.0.0.0', 4, 'course', 0, 'view', 'view.php?id=4', '4');
INSERT INTO `mdl_log` VALUES(173, 1343936272, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(174, 1343936289, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=5', 'Diklat Prajabatan Tingkat III (ID 5)');
INSERT INTO `mdl_log` VALUES(175, 1343936291, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(176, 1343936299, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(177, 1343936347, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=6', 'Diklat Kepemimpinan Tingkat IV (ID 6)');
INSERT INTO `mdl_log` VALUES(178, 1343936350, 2, '0.0.0.0', 6, 'course', 0, 'view', 'view.php?id=6', '6');
INSERT INTO `mdl_log` VALUES(179, 1343936351, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(180, 1343936364, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(181, 1343936384, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=7', 'Diklat Kepemimpinan Tingkat III (ID 7)');
INSERT INTO `mdl_log` VALUES(182, 1343936386, 2, '0.0.0.0', 7, 'course', 0, 'view', 'view.php?id=7', '7');
INSERT INTO `mdl_log` VALUES(183, 1343936387, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(184, 1343936400, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=8', 'Diklat Kepemimpinan Tingkat II (ID 8)');
INSERT INTO `mdl_log` VALUES(185, 1343936402, 2, '0.0.0.0', 8, 'course', 0, 'view', 'view.php?id=8', '8');
INSERT INTO `mdl_log` VALUES(186, 1343936414, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(187, 1343936451, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(188, 1343936470, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(189, 1343936474, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(190, 1343936474, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(191, 1343936478, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(192, 1343936478, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(193, 1343936505, 2, '0.0.0.0', 1, 'forum', 9, 'add discussion', 'discuss.php?d=1', '1');
INSERT INTO `mdl_log` VALUES(194, 1343936506, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(195, 1343936564, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(196, 1343936582, 2, '0.0.0.0', 1, 'forum', 9, 'delete discussion', 'view.php?id=9', '8');
INSERT INTO `mdl_log` VALUES(197, 1343936582, 2, '0.0.0.0', 1, 'forum', 9, 'view forum', 'view.php?id=9', '8');
INSERT INTO `mdl_log` VALUES(198, 1343936585, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(199, 1343936587, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(200, 1343936587, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(201, 1343936590, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(202, 1343936590, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(203, 1343936591, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(204, 1343936602, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(205, 1343936602, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(206, 1343936691, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(207, 1343936739, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(208, 1343936747, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(209, 1343936831, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(210, 1343936834, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(211, 1343936836, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(212, 1343936837, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(213, 1343936841, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(214, 1343936859, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(215, 1343936862, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(216, 1343937008, 2, '0.0.0.0', 5, 'course', 0, 'update', 'edit.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(217, 1343937009, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(218, 1343937012, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(219, 1343937087, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(220, 1343937089, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(221, 1343937089, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(222, 1343937126, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(223, 1343937158, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=9', 'Analisis Kepegawaian (Trampil, Penyelia, Ahli) (ID 9)');
INSERT INTO `mdl_log` VALUES(224, 1343937161, 2, '0.0.0.0', 9, 'course', 0, 'view', 'view.php?id=9', '9');
INSERT INTO `mdl_log` VALUES(225, 1343937162, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(226, 1343937183, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=10', 'Arsiparis (Trampil, Penyelia, Ahli) (ID 10)');
INSERT INTO `mdl_log` VALUES(227, 1343937185, 2, '0.0.0.0', 10, 'course', 0, 'view', 'view.php?id=10', '10');
INSERT INTO `mdl_log` VALUES(228, 1343937189, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(229, 1343937207, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=11', 'Pranata Komputer (ID 11)');
INSERT INTO `mdl_log` VALUES(230, 1343937209, 2, '0.0.0.0', 11, 'course', 0, 'view', 'view.php?id=11', '11');
INSERT INTO `mdl_log` VALUES(231, 1343937213, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(232, 1343937224, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=12', 'Pranata Humas (ID 12)');
INSERT INTO `mdl_log` VALUES(233, 1343937226, 2, '0.0.0.0', 12, 'course', 0, 'view', 'view.php?id=12', '12');
INSERT INTO `mdl_log` VALUES(234, 1343937227, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(235, 1343937243, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=13', 'Peneliti (ID 13)');
INSERT INTO `mdl_log` VALUES(236, 1343937245, 2, '0.0.0.0', 13, 'course', 0, 'view', 'view.php?id=13', '13');
INSERT INTO `mdl_log` VALUES(237, 1343937248, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(238, 1343937262, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=14', 'Pustakawan (ID 14)');
INSERT INTO `mdl_log` VALUES(239, 1343937264, 2, '0.0.0.0', 14, 'course', 0, 'view', 'view.php?id=14', '14');
INSERT INTO `mdl_log` VALUES(240, 1343937265, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(241, 1343937283, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=15', 'Analisis Keuangan (ID 15)');
INSERT INTO `mdl_log` VALUES(242, 1343937284, 2, '0.0.0.0', 15, 'course', 0, 'view', 'view.php?id=15', '15');
INSERT INTO `mdl_log` VALUES(243, 1343937287, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(244, 1343937298, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=16', 'Analisis Kinerja (ID 16)');
INSERT INTO `mdl_log` VALUES(245, 1343937300, 2, '0.0.0.0', 16, 'course', 0, 'view', 'view.php?id=16', '16');
INSERT INTO `mdl_log` VALUES(246, 1343937302, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(247, 1343937315, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=17', 'Perencana (ID 17)');
INSERT INTO `mdl_log` VALUES(248, 1343937317, 2, '0.0.0.0', 17, 'course', 0, 'view', 'view.php?id=17', '17');
INSERT INTO `mdl_log` VALUES(249, 1343937319, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(250, 1343937330, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=18', 'Statistik (ID 18)');
INSERT INTO `mdl_log` VALUES(251, 1343937331, 2, '0.0.0.0', 18, 'course', 0, 'view', 'view.php?id=18', '18');
INSERT INTO `mdl_log` VALUES(252, 1343937332, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(253, 1343937346, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=19', 'Training of Trainer (TOT) (ID 19)');
INSERT INTO `mdl_log` VALUES(254, 1343937348, 2, '0.0.0.0', 19, 'course', 0, 'view', 'view.php?id=19', '19');
INSERT INTO `mdl_log` VALUES(255, 1343937350, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(256, 1343937366, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=20', 'Management of Training (MOT) (ID 20)');
INSERT INTO `mdl_log` VALUES(257, 1343937368, 2, '0.0.0.0', 20, 'course', 0, 'view', 'view.php?id=20', '20');
INSERT INTO `mdl_log` VALUES(258, 1343937370, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(259, 1343937372, 2, '0.0.0.0', 9, 'course', 0, 'view', 'view.php?id=9', '9');
INSERT INTO `mdl_log` VALUES(260, 1343937391, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=21', 'Teknis Alanisis Kebutuhan Diklat (ID 21)');
INSERT INTO `mdl_log` VALUES(261, 1343937393, 2, '0.0.0.0', 21, 'course', 0, 'view', 'view.php?id=21', '21');
INSERT INTO `mdl_log` VALUES(262, 1343937394, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(263, 1343937411, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=22', 'Teknis Perancangan Kebutuhan Diklat (ID 22)');
INSERT INTO `mdl_log` VALUES(264, 1343937414, 2, '0.0.0.0', 22, 'course', 0, 'view', 'view.php?id=22', '22');
INSERT INTO `mdl_log` VALUES(265, 1343937416, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(266, 1343937450, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(267, 1343937472, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=23', 'Teknis Pengembangan Modul Diklat (ID 23)');
INSERT INTO `mdl_log` VALUES(268, 1343937473, 2, '0.0.0.0', 23, 'course', 0, 'view', 'view.php?id=23', '23');
INSERT INTO `mdl_log` VALUES(269, 1343937474, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(270, 1343937488, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=24', 'Manajemen Kearsipan (ID 24)');
INSERT INTO `mdl_log` VALUES(271, 1343937492, 2, '0.0.0.0', 24, 'course', 0, 'view', 'view.php?id=24', '24');
INSERT INTO `mdl_log` VALUES(272, 1343937507, 2, '0.0.0.0', 24, 'course', 0, 'update', 'edit.php?id=24', '24');
INSERT INTO `mdl_log` VALUES(273, 1343937507, 2, '0.0.0.0', 24, 'course', 0, 'view', 'view.php?id=24', '24');
INSERT INTO `mdl_log` VALUES(274, 1343937511, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(275, 1343937529, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=25', 'Manajemen Keprotokolan (ID 25)');
INSERT INTO `mdl_log` VALUES(276, 1343937531, 2, '0.0.0.0', 25, 'course', 0, 'view', 'view.php?id=25', '25');
INSERT INTO `mdl_log` VALUES(277, 1343937533, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(278, 1343937557, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=26', 'Manajemen Kehumasan dan Promosi (ID 26)');
INSERT INTO `mdl_log` VALUES(279, 1343937558, 2, '0.0.0.0', 26, 'course', 0, 'view', 'view.php?id=26', '26');
INSERT INTO `mdl_log` VALUES(280, 1343937560, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(281, 1343937579, 2, '0.0.0.0', 1, 'course', 0, 'new', 'view.php?id=27', 'Manajemen Audit (ID 27)');
INSERT INTO `mdl_log` VALUES(282, 1343937580, 2, '0.0.0.0', 27, 'course', 0, 'view', 'view.php?id=27', '27');
INSERT INTO `mdl_log` VALUES(283, 1343937582, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(284, 1343937586, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(285, 1343937588, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(286, 1343937589, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(287, 1343937609, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(288, 1343937611, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(289, 1343938221, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(290, 1343938221, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(291, 1343938227, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(292, 1343938252, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(293, 1343938266, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(294, 1343938284, 2, '0.0.0.0', 5, 'course', 0, 'add mod', '../mod/assignment/view.php?id=29', 'assignment 2');
INSERT INTO `mdl_log` VALUES(295, 1343938284, 2, '0.0.0.0', 5, 'assignment', 29, 'add', 'view.php?id=29', '2');
INSERT INTO `mdl_log` VALUES(296, 1343938285, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(297, 1343938286, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(298, 1343938289, 2, '0.0.0.0', 5, 'assignment', 29, 'view', 'view.php?id=29', '2');
INSERT INTO `mdl_log` VALUES(299, 1343938294, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(300, 1343964641, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(301, 1343964645, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(302, 1343965135, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(303, 1343965166, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(304, 1343977607, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(305, 1343977635, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(306, 1343977855, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(307, 1343977855, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(308, 1343977866, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(309, 1343977880, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(310, 1343977880, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(311, 1343977996, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(312, 1343978050, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(313, 1343978074, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(314, 1343978108, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(315, 1343978115, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(316, 1343978258, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(317, 1343978328, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(318, 1343978436, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(319, 1343978466, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(320, 1343978480, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(321, 1343978491, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(322, 1343978497, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(323, 1343978511, 2, '0.0.0.0', 1, 'user', 0, 'view', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(324, 1343978525, 2, '0.0.0.0', 1, 'user', 0, 'view', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(325, 1343978542, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(326, 1343978679, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(327, 1343978685, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(328, 1343978685, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(329, 1343978698, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(330, 1343978698, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(331, 1343978707, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(332, 1343978707, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(333, 1343978719, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(334, 1343978719, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(335, 1343988171, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(336, 1343988174, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(337, 1343994580, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(338, 1343994580, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(339, 1343994586, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(340, 1343994856, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(341, 1343994856, 2, '0.0.0.0', 3, 'course', 0, 'view', 'view.php?id=3', '3');
INSERT INTO `mdl_log` VALUES(342, 1343994882, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(343, 1343994901, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(344, 1343994901, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(345, 1343994910, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(346, 1343994989, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(347, 1343994989, 2, '0.0.0.0', 8, 'course', 0, 'view', 'view.php?id=8', '8');
INSERT INTO `mdl_log` VALUES(348, 1344015768, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(349, 1344018256, 2, '0.0.0.0', 1, 'user', 0, 'logout', 'view.php?id=2&course=1', '2');
INSERT INTO `mdl_log` VALUES(350, 1344018304, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(351, 1344018304, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(352, 1344087682, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(353, 1344089180, 2, '0.0.0.0', 12, 'course', 0, 'view', 'view.php?id=12', '12');
INSERT INTO `mdl_log` VALUES(354, 1344089471, 2, '0.0.0.0', 8, 'course', 0, 'view', 'view.php?id=8', '8');
INSERT INTO `mdl_log` VALUES(355, 1344090374, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(356, 1344091933, 2, '0.0.0.0', 7, 'course', 0, 'view', 'view.php?id=7', '7');
INSERT INTO `mdl_log` VALUES(357, 1344226891, 2, '0.0.0.0', 1, 'user', 0, 'login', 'view.php?id=0&course=1', '2');
INSERT INTO `mdl_log` VALUES(358, 1344226892, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(359, 1344226944, 2, '0.0.0.0', 5, 'course', 0, 'view', 'view.php?id=5', '5');
INSERT INTO `mdl_log` VALUES(360, 1344231456, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');
INSERT INTO `mdl_log` VALUES(361, 1344234185, 2, '0.0.0.0', 1, 'course', 0, 'view', 'view.php?id=1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_log_display`
--

CREATE TABLE `mdl_log_display` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL DEFAULT '',
  `action` varchar(40) NOT NULL DEFAULT '',
  `mtable` varchar(30) NOT NULL DEFAULT '',
  `field` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_logdisp_modact_uix` (`module`,`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='For a particular module/action, specifies a moodle table/fie' AUTO_INCREMENT=113 ;

--
-- Dumping data for table `mdl_log_display`
--

INSERT INTO `mdl_log_display` VALUES(1, 'user', 'view', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(2, 'course', 'user report', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(3, 'course', 'view', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(4, 'course', 'update', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(5, 'course', 'enrol', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(6, 'course', 'unenrol', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(7, 'course', 'report log', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(8, 'course', 'report live', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(9, 'course', 'report outline', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(10, 'course', 'report participation', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(11, 'course', 'report stats', 'course', 'fullname');
INSERT INTO `mdl_log_display` VALUES(12, 'message', 'write', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(13, 'message', 'read', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(14, 'message', 'add contact', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(15, 'message', 'remove contact', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(16, 'message', 'block contact', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(17, 'message', 'unblock contact', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(18, 'group', 'view', 'groups', 'name');
INSERT INTO `mdl_log_display` VALUES(19, 'tag', 'update', 'tag', 'name');
INSERT INTO `mdl_log_display` VALUES(20, 'assignment', 'view', 'assignment', 'name');
INSERT INTO `mdl_log_display` VALUES(21, 'assignment', 'add', 'assignment', 'name');
INSERT INTO `mdl_log_display` VALUES(22, 'assignment', 'update', 'assignment', 'name');
INSERT INTO `mdl_log_display` VALUES(23, 'assignment', 'view submission', 'assignment', 'name');
INSERT INTO `mdl_log_display` VALUES(24, 'assignment', 'upload', 'assignment', 'name');
INSERT INTO `mdl_log_display` VALUES(25, 'chat', 'view', 'chat', 'name');
INSERT INTO `mdl_log_display` VALUES(26, 'chat', 'add', 'chat', 'name');
INSERT INTO `mdl_log_display` VALUES(27, 'chat', 'update', 'chat', 'name');
INSERT INTO `mdl_log_display` VALUES(28, 'chat', 'report', 'chat', 'name');
INSERT INTO `mdl_log_display` VALUES(29, 'chat', 'talk', 'chat', 'name');
INSERT INTO `mdl_log_display` VALUES(30, 'choice', 'view', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(31, 'choice', 'update', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(32, 'choice', 'add', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(33, 'choice', 'report', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(34, 'choice', 'choose', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(35, 'choice', 'choose again', 'choice', 'name');
INSERT INTO `mdl_log_display` VALUES(36, 'data', 'view', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(37, 'data', 'add', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(38, 'data', 'update', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(39, 'data', 'record delete', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(40, 'data', 'fields add', 'data_fields', 'name');
INSERT INTO `mdl_log_display` VALUES(41, 'data', 'fields update', 'data_fields', 'name');
INSERT INTO `mdl_log_display` VALUES(42, 'data', 'templates saved', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(43, 'data', 'templates def', 'data', 'name');
INSERT INTO `mdl_log_display` VALUES(44, 'forum', 'add', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(45, 'forum', 'update', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(46, 'forum', 'add discussion', 'forum_discussions', 'name');
INSERT INTO `mdl_log_display` VALUES(47, 'forum', 'add post', 'forum_posts', 'subject');
INSERT INTO `mdl_log_display` VALUES(48, 'forum', 'update post', 'forum_posts', 'subject');
INSERT INTO `mdl_log_display` VALUES(49, 'forum', 'user report', 'user', 'CONCAT(firstname,'' '',lastname)');
INSERT INTO `mdl_log_display` VALUES(50, 'forum', 'move discussion', 'forum_discussions', 'name');
INSERT INTO `mdl_log_display` VALUES(51, 'forum', 'view subscribers', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(52, 'forum', 'view discussion', 'forum_discussions', 'name');
INSERT INTO `mdl_log_display` VALUES(53, 'forum', 'view forum', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(54, 'forum', 'subscribe', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(55, 'forum', 'unsubscribe', 'forum', 'name');
INSERT INTO `mdl_log_display` VALUES(56, 'glossary', 'add', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(57, 'glossary', 'update', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(58, 'glossary', 'view', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(59, 'glossary', 'view all', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(60, 'glossary', 'add entry', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(61, 'glossary', 'update entry', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(62, 'glossary', 'add category', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(63, 'glossary', 'update category', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(64, 'glossary', 'delete category', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(65, 'glossary', 'add comment', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(66, 'glossary', 'update comment', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(67, 'glossary', 'delete comment', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(68, 'glossary', 'approve entry', 'glossary', 'name');
INSERT INTO `mdl_log_display` VALUES(69, 'glossary', 'view entry', 'glossary_entries', 'concept');
INSERT INTO `mdl_log_display` VALUES(70, 'journal', 'view', 'journal', 'name');
INSERT INTO `mdl_log_display` VALUES(71, 'journal', 'add entry', 'journal', 'name');
INSERT INTO `mdl_log_display` VALUES(72, 'journal', 'update entry', 'journal', 'name');
INSERT INTO `mdl_log_display` VALUES(73, 'journal', 'view responses', 'journal', 'name');
INSERT INTO `mdl_log_display` VALUES(74, 'label', 'add', 'label', 'name');
INSERT INTO `mdl_log_display` VALUES(75, 'label', 'update', 'label', 'name');
INSERT INTO `mdl_log_display` VALUES(76, 'lesson', 'start', 'lesson', 'name');
INSERT INTO `mdl_log_display` VALUES(77, 'lesson', 'end', 'lesson', 'name');
INSERT INTO `mdl_log_display` VALUES(78, 'lesson', 'view', 'lesson_pages', 'title');
INSERT INTO `mdl_log_display` VALUES(79, 'quiz', 'add', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(80, 'quiz', 'update', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(81, 'quiz', 'view', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(82, 'quiz', 'report', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(83, 'quiz', 'attempt', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(84, 'quiz', 'submit', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(85, 'quiz', 'review', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(86, 'quiz', 'editquestions', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(87, 'quiz', 'preview', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(88, 'quiz', 'start attempt', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(89, 'quiz', 'close attempt', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(90, 'quiz', 'continue attempt', 'quiz', 'name');
INSERT INTO `mdl_log_display` VALUES(91, 'resource', 'view', 'resource', 'name');
INSERT INTO `mdl_log_display` VALUES(92, 'resource', 'update', 'resource', 'name');
INSERT INTO `mdl_log_display` VALUES(93, 'resource', 'add', 'resource', 'name');
INSERT INTO `mdl_log_display` VALUES(94, 'scorm', 'view', 'scorm', 'name');
INSERT INTO `mdl_log_display` VALUES(95, 'scorm', 'review', 'scorm', 'name');
INSERT INTO `mdl_log_display` VALUES(96, 'scorm', 'update', 'scorm', 'name');
INSERT INTO `mdl_log_display` VALUES(97, 'scorm', 'add', 'scorm', 'name');
INSERT INTO `mdl_log_display` VALUES(98, 'survey', 'add', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(99, 'survey', 'update', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(100, 'survey', 'download', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(101, 'survey', 'view form', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(102, 'survey', 'view graph', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(103, 'survey', 'view report', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(104, 'survey', 'submit', 'survey', 'name');
INSERT INTO `mdl_log_display` VALUES(105, 'workshop', 'assessments', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(106, 'workshop', 'close', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(107, 'workshop', 'display', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(108, 'workshop', 'resubmit', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(109, 'workshop', 'set up', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(110, 'workshop', 'submissions', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(111, 'workshop', 'view', 'workshop', 'name');
INSERT INTO `mdl_log_display` VALUES(112, 'workshop', 'update', 'workshop', 'name');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_message`
--

CREATE TABLE `mdl_message` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` bigint(10) unsigned NOT NULL DEFAULT '0',
  `useridto` bigint(10) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `format` smallint(4) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) NOT NULL DEFAULT '0',
  `messagetype` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_mess_use_ix` (`useridfrom`),
  KEY `mdl_mess_use2_ix` (`useridto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all unread messages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_message`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_message_contacts`
--

CREATE TABLE `mdl_message_contacts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `contactid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `blocked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_messcont_usecon_uix` (`userid`,`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maintains lists of relationships between users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_message_contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_message_read`
--

CREATE TABLE `mdl_message_read` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `useridfrom` bigint(10) unsigned NOT NULL DEFAULT '0',
  `useridto` bigint(10) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `format` smallint(4) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) NOT NULL DEFAULT '0',
  `timeread` bigint(10) NOT NULL DEFAULT '0',
  `messagetype` varchar(50) NOT NULL DEFAULT '',
  `mailed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_messread_use_ix` (`useridfrom`),
  KEY `mdl_messread_use2_ix` (`useridto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores all messages that have been read' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_message_read`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_application`
--

CREATE TABLE `mdl_mnet_application` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `display_name` varchar(50) NOT NULL DEFAULT '',
  `xmlrpc_server_url` varchar(255) NOT NULL DEFAULT '',
  `sso_land_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Information about applications on remote hosts' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_mnet_application`
--

INSERT INTO `mdl_mnet_application` VALUES(1, 'moodle', 'Moodle', '/mnet/xmlrpc/server.php', '/auth/mnet/land.php');
INSERT INTO `mdl_mnet_application` VALUES(2, 'mahara', 'Mahara', '/api/xmlrpc/server.php', '/auth/xmlrpc/land.php');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_enrol_assignments`
--

CREATE TABLE `mdl_mnet_enrol_assignments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `hostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rolename` varchar(255) NOT NULL DEFAULT '',
  `enroltime` bigint(10) unsigned NOT NULL DEFAULT '0',
  `enroltype` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_mnetenroassi_hoscou_ix` (`hostid`,`courseid`),
  KEY `mdl_mnetenroassi_use_ix` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information about enrolments on courses on remote hosts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_enrol_assignments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_enrol_course`
--

CREATE TABLE `mdl_mnet_enrol_course` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `hostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `remoteid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `cat_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `cat_description` mediumtext NOT NULL,
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  `fullname` varchar(254) NOT NULL DEFAULT '',
  `shortname` varchar(15) NOT NULL DEFAULT '',
  `idnumber` varchar(100) NOT NULL DEFAULT '',
  `summary` mediumtext NOT NULL,
  `startdate` bigint(10) unsigned NOT NULL DEFAULT '0',
  `cost` varchar(10) NOT NULL DEFAULT '',
  `currency` varchar(3) NOT NULL DEFAULT '',
  `defaultroleid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `defaultrolename` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_mnetenrocour_hosrem_uix` (`hostid`,`remoteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information about courses on remote hosts' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_enrol_course`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_host`
--

CREATE TABLE `mdl_mnet_host` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wwwroot` varchar(255) NOT NULL DEFAULT '',
  `ip_address` varchar(39) NOT NULL DEFAULT '',
  `name` varchar(80) NOT NULL DEFAULT '',
  `public_key` mediumtext NOT NULL,
  `public_key_expires` bigint(10) unsigned NOT NULL DEFAULT '0',
  `transport` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `portno` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `last_connect_time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `last_log_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `force_theme` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `theme` varchar(100) DEFAULT NULL,
  `applicationid` bigint(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_mnethost_app_ix` (`applicationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Information about the local and remote hosts for RPC' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_mnet_host`
--

INSERT INTO `mdl_mnet_host` VALUES(1, 0, 'http://localhost/dephub/elearning', '::1', '', '-----BEGIN CERTIFICATE-----\nMIID+jCCA2OgAwIBAgIBADANBgkqhkiG9w0BAQQFADCBtTELMAkGA1UEBhMCSUQx\nDjAMBgNVBAgTBUJvZ29yMQ4wDAYDVQQHEwVCb2dvcjEpMCcGA1UEChMgUHVzYmFu\nZyBTRE0gQXBhcmF0dXIgUGVyaHVidW5nYW4xDzANBgNVBAsTBk1vb2RsZTEqMCgG\nA1UEAxMhaHR0cDovL2xvY2FsaG9zdC9kZXBodWIvZWxlYXJuaW5nMR4wHAYJKoZI\nhvcNAQkBFg9hZG1pbkBsb2NhbC5uZXQwHhcNMTIwODAyMTgxNzQ2WhcNMTIwODMw\nMTgxNzQ2WjCBtTELMAkGA1UEBhMCSUQxDjAMBgNVBAgTBUJvZ29yMQ4wDAYDVQQH\nEwVCb2dvcjEpMCcGA1UEChMgUHVzYmFuZyBTRE0gQXBhcmF0dXIgUGVyaHVidW5n\nYW4xDzANBgNVBAsTBk1vb2RsZTEqMCgGA1UEAxMhaHR0cDovL2xvY2FsaG9zdC9k\nZXBodWIvZWxlYXJuaW5nMR4wHAYJKoZIhvcNAQkBFg9hZG1pbkBsb2NhbC5uZXQw\ngZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMgSxekXFsGtF7re2NZ0LOCK0mDw\nRAtCCwvHhf3967+4QlutS+7tw2ZLV4pTjQTsg2XmybUVoTjjVVqqSevTSNPl4ZRy\nYcDFyu01cvSRKbJndBI6APxlTkcDsboIk3UQP9h4EhTYI8j26qMYdA6p+Ec8lB+K\nFthWmhuDcqLaKGF7AgMBAAGjggEWMIIBEjAdBgNVHQ4EFgQUMnZy7flIB813RWf0\nMXW3+VeHEH0wgeIGA1UdIwSB2jCB14AUMnZy7flIB813RWf0MXW3+VeHEH2hgbuk\ngbgwgbUxCzAJBgNVBAYTAklEMQ4wDAYDVQQIEwVCb2dvcjEOMAwGA1UEBxMFQm9n\nb3IxKTAnBgNVBAoTIFB1c2JhbmcgU0RNIEFwYXJhdHVyIFBlcmh1YnVuZ2FuMQ8w\nDQYDVQQLEwZNb29kbGUxKjAoBgNVBAMTIWh0dHA6Ly9sb2NhbGhvc3QvZGVwaHVi\nL2VsZWFybmluZzEeMBwGCSqGSIb3DQEJARYPYWRtaW5AbG9jYWwubmV0ggEAMAwG\nA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEEBQADgYEALq2EpDIhPPjOGR4Lt153eC4I\nZ+B5DEeMfy/mdP0PCvBif1wpYBQNa+QvRAietEWH8h2VbM32KyIr98nSZLY30AnK\n1pk1LqLcEcRqfdrFjpxk/U7JmEp83o6apmrrcXkd7uQZkAa5HtCQC+ENTTnbfgFm\nJ4KiFgO1x8Y1HabYhJA=\n-----END CERTIFICATE-----\n', 1346350666, 0, 0, 0, 0, 0, '', 1);
INSERT INTO `mdl_mnet_host` VALUES(2, 0, '', '', 'All Hosts', '', 0, 0, 0, 0, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_host2service`
--

CREATE TABLE `mdl_mnet_host2service` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `hostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `serviceid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subscribe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_mnethost_hosser_uix` (`hostid`,`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information about the services for a given host' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_host2service`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_log`
--

CREATE TABLE `mdl_mnet_log` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `hostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `remoteid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `coursename` varchar(40) NOT NULL DEFAULT '',
  `module` varchar(20) NOT NULL DEFAULT '',
  `cmid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `action` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `info` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_mnetlog_hosusecou_ix` (`hostid`,`userid`,`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Store session data from users migrating to other sites' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_rpc`
--

CREATE TABLE `mdl_mnet_rpc` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `function_name` varchar(40) NOT NULL DEFAULT '',
  `xmlrpc_path` varchar(80) NOT NULL DEFAULT '',
  `parent_type` varchar(6) NOT NULL DEFAULT '',
  `parent` varchar(20) NOT NULL DEFAULT '',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `help` mediumtext NOT NULL,
  `profile` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_mnetrpc_enaxml_ix` (`enabled`,`xmlrpc_path`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Functions or methods that we may publish or subscribe to' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mdl_mnet_rpc`
--

INSERT INTO `mdl_mnet_rpc` VALUES(1, 'user_authorise', 'auth/mnet/auth.php/user_authorise', 'auth', 'mnet', 0, 'Return user data for the provided token, compare with user_agent string.', 'a:3:{i:0;a:2:{s:4:"type";s:5:"array";s:11:"description";s:44:"$userdata Array of user info for remote host";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:45:"token - The unique ID provided by remotehost.";}i:2;a:2:{s:4:"type";s:6:"string";s:11:"description";s:30:"useragent - User Agent string.";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(2, 'keepalive_server', 'auth/mnet/auth.php/keepalive_server', 'auth', 'mnet', 0, 'Receives an array of usernames from a remote machine and prods their\\n sessions to keep them alive', 'a:2:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";s:30:"\\"All ok\\" or an error message";}i:1;a:2:{s:4:"type";s:5:"array";s:11:"description";s:29:"array - An array of usernames";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(3, 'kill_children', 'auth/mnet/auth.php/kill_children', 'auth', 'mnet', 0, 'The IdP uses this function to kill child sessions on other hosts', 'a:3:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";s:39:"A plaintext report of what has happened";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:39:"username - Username for session to kill";}i:2;a:2:{s:4:"type";s:6:"string";s:11:"description";s:47:"useragent - SHA1 hash of user agent to look for";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(4, 'refresh_log', 'auth/mnet/auth.php/refresh_log', 'auth', 'mnet', 0, 'Receives an array of log entries from an SP and adds them to the mnet_log\\n table', 'a:2:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";s:30:"\\"All ok\\" or an error message";}i:1;a:2:{s:4:"type";s:5:"array";s:11:"description";s:29:"array - An array of usernames";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(5, 'fetch_user_image', 'auth/mnet/auth.php/fetch_user_image', 'auth', 'mnet', 0, 'Returns the user''s image as a base64 encoded string.', 'a:2:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";s:17:"The encoded image";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:29:"username - The id of the user";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(6, 'fetch_theme_info', 'auth/mnet/auth.php/fetch_theme_info', 'auth', 'mnet', 0, 'Returns the theme information and logo url as strings.', 'a:1:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";s:14:"The theme info";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(7, 'update_enrolments', 'auth/mnet/auth.php/update_enrolments', 'auth', 'mnet', 0, 'Invoke this function _on_ the IDP to update it with enrolment info local to\\n the SP right after calling user_authorise()\\n \\n Normally called by the SP after calling', 'a:3:{i:0;a:2:{s:4:"type";s:7:"boolean";s:11:"description";N;}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:23:"username - The username";}i:2;a:2:{s:4:"type";s:6:"string";s:11:"description";s:77:"courses - Assoc array of courses following the structure of mnet_enrol_course";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(8, 'keepalive_client', 'auth/mnet/auth.php/keepalive_client', 'auth', 'mnet', 0, 'Poll the IdP server to let it know that a user it has authenticated is still\\n online', 'a:1:{i:0;a:2:{s:4:"type";s:6:"string";s:11:"description";N;}}');
INSERT INTO `mdl_mnet_rpc` VALUES(9, 'kill_child', 'auth/mnet/auth.php/kill_child', 'auth', 'mnet', 0, 'TODO:Untested When the IdP requests that child sessions are terminated,\\n this function will be called on each of the child hosts. The machine that\\n calls the function (over xmlrpc) provides us with the mnethostid we need.', 'a:3:{i:0;a:2:{s:4:"type";s:7:"boolean";s:11:"description";s:15:"True on success";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:39:"username - Username for session to kill";}i:2;a:2:{s:4:"type";s:6:"string";s:11:"description";s:47:"useragent - SHA1 hash of user agent to look for";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(10, 'available_courses', 'enrol/mnet/enrol.php/available_courses', 'enrol', 'mnet', 0, 'Does Foo', 'a:1:{i:0;a:2:{s:4:"type";s:7:"boolean";s:11:"description";s:47:"Whether the user can login from the remote host";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(11, 'user_enrolments', 'enrol/mnet/enrol.php/user_enrolments', 'enrol', 'mnet', 0, 'No description given.', 'a:2:{i:0;a:2:{s:4:"type";s:4:"void";s:11:"description";s:0:"";}i:1;s:6:"userid";}');
INSERT INTO `mdl_mnet_rpc` VALUES(12, 'enrol_user', 'enrol/mnet/enrol.php/enrol_user', 'enrol', 'mnet', 0, 'Enrols user to course with the default role', 'a:3:{i:0;a:2:{s:4:"type";s:7:"boolean";s:11:"description";s:41:"Whether the enrolment has been successful";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:37:"user - The username of the remote use";}i:2;a:2:{s:4:"type";s:3:"int";s:11:"description";s:37:"courseid - The id of the local course";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(13, 'unenrol_user', 'enrol/mnet/enrol.php/unenrol_user', 'enrol', 'mnet', 0, 'Unenrol a user from a course', 'a:3:{i:0;a:2:{s:4:"type";s:7:"boolean";s:11:"description";s:47:"Whether the user can login from the remote host";}i:1;a:2:{s:4:"type";s:6:"string";s:11:"description";s:23:"username - The username";}i:2;a:2:{s:4:"type";s:3:"int";s:11:"description";s:37:"courseid - The id of the local course";}}');
INSERT INTO `mdl_mnet_rpc` VALUES(14, 'course_enrolments', 'enrol/mnet/enrol.php/course_enrolments', 'enrol', 'mnet', 0, 'Get a list of users from the client server who are enrolled in a course', 'a:3:{i:0;a:2:{s:4:"type";s:5:"array";s:11:"description";s:39:"Array of usernames who are homed on the";}i:1;a:2:{s:4:"type";s:3:"int";s:11:"description";s:24:"courseid - The Course ID";}i:2;a:2:{s:4:"type";s:6:"string";s:11:"description";s:47:"roles - Comma-separated list of role shortnames";}}');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_service`
--

CREATE TABLE `mdl_mnet_service` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `description` varchar(40) NOT NULL DEFAULT '',
  `apiversion` varchar(10) NOT NULL DEFAULT '',
  `offer` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='A service is a group of functions' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mdl_mnet_service`
--

INSERT INTO `mdl_mnet_service` VALUES(1, 'sso_idp', '', '1', 1);
INSERT INTO `mdl_mnet_service` VALUES(2, 'sso_sp', '', '1', 1);
INSERT INTO `mdl_mnet_service` VALUES(3, 'mnet_enrol', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_service2rpc`
--

CREATE TABLE `mdl_mnet_service2rpc` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rpcid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_mnetserv_rpcser_uix` (`rpcid`,`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Group functions or methods under a service' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mdl_mnet_service2rpc`
--

INSERT INTO `mdl_mnet_service2rpc` VALUES(1, 1, 1);
INSERT INTO `mdl_mnet_service2rpc` VALUES(2, 1, 2);
INSERT INTO `mdl_mnet_service2rpc` VALUES(3, 1, 3);
INSERT INTO `mdl_mnet_service2rpc` VALUES(4, 1, 4);
INSERT INTO `mdl_mnet_service2rpc` VALUES(5, 1, 5);
INSERT INTO `mdl_mnet_service2rpc` VALUES(6, 1, 6);
INSERT INTO `mdl_mnet_service2rpc` VALUES(7, 1, 7);
INSERT INTO `mdl_mnet_service2rpc` VALUES(8, 2, 8);
INSERT INTO `mdl_mnet_service2rpc` VALUES(9, 2, 9);
INSERT INTO `mdl_mnet_service2rpc` VALUES(10, 3, 10);
INSERT INTO `mdl_mnet_service2rpc` VALUES(11, 3, 11);
INSERT INTO `mdl_mnet_service2rpc` VALUES(12, 3, 12);
INSERT INTO `mdl_mnet_service2rpc` VALUES(13, 3, 13);
INSERT INTO `mdl_mnet_service2rpc` VALUES(14, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_session`
--

CREATE TABLE `mdl_mnet_session` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `token` varchar(40) NOT NULL DEFAULT '',
  `mnethostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `useragent` varchar(40) NOT NULL DEFAULT '',
  `confirm_timeout` bigint(10) unsigned NOT NULL DEFAULT '0',
  `session_id` varchar(40) NOT NULL DEFAULT '',
  `expires` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_mnetsess_tok_uix` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Store session data from users migrating to other sites' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_session`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_mnet_sso_access_control`
--

CREATE TABLE `mdl_mnet_sso_access_control` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `mnet_host_id` bigint(10) unsigned NOT NULL DEFAULT '0',
  `accessctrl` varchar(20) NOT NULL DEFAULT 'allow',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_mnetssoaccecont_mneuse_uix` (`mnet_host_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users by host permitted (or not) to login from a remote prov' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_mnet_sso_access_control`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_modules`
--

CREATE TABLE `mdl_modules` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `version` bigint(10) NOT NULL DEFAULT '0',
  `cron` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastcron` bigint(10) unsigned NOT NULL DEFAULT '0',
  `search` varchar(255) NOT NULL DEFAULT '',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_modu_nam_ix` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='modules available in the site' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mdl_modules`
--

INSERT INTO `mdl_modules` VALUES(1, 'assignment', 2007101511, 60, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(2, 'chat', 2009031100, 300, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(3, 'choice', 2007101509, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(4, 'data', 2007101515, 60, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(5, 'forum', 2007101513, 60, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(6, 'glossary', 2007101509, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(7, 'hotpot', 2007101513, 0, 0, '', 0);
INSERT INTO `mdl_modules` VALUES(8, 'journal', 2007101509, 60, 0, '', 0);
INSERT INTO `mdl_modules` VALUES(9, 'label', 2007101510, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(10, 'lams', 2007101509, 0, 0, '', 0);
INSERT INTO `mdl_modules` VALUES(11, 'lesson', 2008112601, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(12, 'quiz', 2007101511, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(13, 'resource', 2007101511, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(14, 'scorm', 2007110503, 300, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(15, 'survey', 2007101509, 0, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(16, 'wiki', 2007101509, 3600, 0, '', 1);
INSERT INTO `mdl_modules` VALUES(17, 'workshop', 2007101510, 60, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_post`
--

CREATE TABLE `mdl_post` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL DEFAULT '',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `moduleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `coursemoduleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(128) NOT NULL DEFAULT '',
  `summary` longtext,
  `content` longtext,
  `uniquehash` varchar(128) NOT NULL DEFAULT '',
  `rating` bigint(10) unsigned NOT NULL DEFAULT '0',
  `format` bigint(10) unsigned NOT NULL DEFAULT '0',
  `attachment` varchar(100) DEFAULT NULL,
  `publishstate` enum('draft','site','public') NOT NULL DEFAULT 'draft',
  `lastmodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `created` bigint(10) unsigned NOT NULL DEFAULT '0',
  `usermodified` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_post_iduse_uix` (`id`,`userid`),
  KEY `mdl_post_las_ix` (`lastmodified`),
  KEY `mdl_post_mod_ix` (`module`),
  KEY `mdl_post_sub_ix` (`subject`),
  KEY `mdl_post_use_ix` (`usermodified`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Generic post table to hold data blog entries etc in differen' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_post`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question`
--

CREATE TABLE `mdl_question` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint(10) NOT NULL DEFAULT '0',
  `parent` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `questiontext` text NOT NULL,
  `questiontextformat` tinyint(2) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '',
  `generalfeedback` text NOT NULL,
  `defaultgrade` bigint(10) unsigned NOT NULL DEFAULT '1',
  `penalty` double NOT NULL DEFAULT '0.1',
  `qtype` varchar(20) NOT NULL DEFAULT '',
  `length` bigint(10) unsigned NOT NULL DEFAULT '1',
  `stamp` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(255) NOT NULL DEFAULT '',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `createdby` bigint(10) unsigned DEFAULT NULL,
  `modifiedby` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_ques_cat_ix` (`category`),
  KEY `mdl_ques_par_ix` (`parent`),
  KEY `mdl_ques_cre_ix` (`createdby`),
  KEY `mdl_ques_mod_ix` (`modifiedby`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The questions themselves' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_answers`
--

CREATE TABLE `mdl_question_answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `fraction` double NOT NULL DEFAULT '0',
  `feedback` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_quesansw_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Answers, with a fractional grade (0-1) and feedback' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_attempts`
--

CREATE TABLE `mdl_question_attempts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `modulename` varchar(20) NOT NULL DEFAULT 'quiz',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student attempts. This table gets extended by the modules' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_calculated`
--

CREATE TABLE `mdl_question_calculated` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answer` bigint(10) unsigned NOT NULL DEFAULT '0',
  `tolerance` varchar(20) NOT NULL DEFAULT '0.0',
  `tolerancetype` bigint(10) NOT NULL DEFAULT '1',
  `correctanswerlength` bigint(10) NOT NULL DEFAULT '2',
  `correctanswerformat` bigint(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `mdl_quescalc_ans_ix` (`answer`),
  KEY `mdl_quescalc_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for questions of type calculated' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_calculated`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_categories`
--

CREATE TABLE `mdl_question_categories` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contextid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  `stamp` varchar(255) NOT NULL DEFAULT '',
  `parent` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`),
  KEY `mdl_quescate_con_ix` (`contextid`),
  KEY `mdl_quescate_par_ix` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Categories are for grouping questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_datasets`
--

CREATE TABLE `mdl_question_datasets` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `datasetdefinition` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quesdata_quedat_ix` (`question`,`datasetdefinition`),
  KEY `mdl_quesdata_que_ix` (`question`),
  KEY `mdl_quesdata_dat_ix` (`datasetdefinition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Many-many relation between questions and dataset definitions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_datasets`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_dataset_definitions`
--

CREATE TABLE `mdl_question_dataset_definitions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` bigint(10) NOT NULL DEFAULT '0',
  `options` varchar(255) NOT NULL DEFAULT '',
  `itemcount` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quesdatadefi_cat_ix` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Organises and stores properties for dataset items' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_dataset_definitions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_dataset_items`
--

CREATE TABLE `mdl_question_dataset_items` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `definition` bigint(10) unsigned NOT NULL DEFAULT '0',
  `itemnumber` bigint(10) unsigned NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_quesdataitem_def_ix` (`definition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Individual dataset items' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_dataset_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_match`
--

CREATE TABLE `mdl_question_match` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `subquestions` varchar(255) NOT NULL DEFAULT '',
  `shuffleanswers` smallint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mdl_quesmatc_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines fixed matching questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_match`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_match_sub`
--

CREATE TABLE `mdl_question_match_sub` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` bigint(10) unsigned NOT NULL DEFAULT '0',
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `questiontext` text NOT NULL,
  `answertext` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_quesmatcsub_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines the subquestions that make up a matching question' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_match_sub`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_multianswer`
--

CREATE TABLE `mdl_question_multianswer` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sequence` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_quesmult_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for multianswer questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_multianswer`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_multichoice`
--

CREATE TABLE `mdl_question_multichoice` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `layout` smallint(4) NOT NULL DEFAULT '0',
  `answers` varchar(255) NOT NULL DEFAULT '',
  `single` smallint(4) NOT NULL DEFAULT '0',
  `shuffleanswers` smallint(4) NOT NULL DEFAULT '1',
  `correctfeedback` text NOT NULL,
  `partiallycorrectfeedback` text NOT NULL,
  `incorrectfeedback` text NOT NULL,
  `answernumbering` varchar(10) NOT NULL DEFAULT 'abc',
  PRIMARY KEY (`id`),
  KEY `mdl_quesmult_que2_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for multiple choice questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_multichoice`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_numerical`
--

CREATE TABLE `mdl_question_numerical` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answer` bigint(10) unsigned NOT NULL DEFAULT '0',
  `tolerance` varchar(255) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`id`),
  KEY `mdl_quesnume_ans_ix` (`answer`),
  KEY `mdl_quesnume_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for numerical questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_numerical`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_numerical_units`
--

CREATE TABLE `mdl_question_numerical_units` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `multiplier` decimal(40,20) NOT NULL DEFAULT '1.00000000000000000000',
  `unit` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_quesnumeunit_queuni_uix` (`question`,`unit`),
  KEY `mdl_quesnumeunit_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Optional unit options for numerical questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_numerical_units`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_randomsamatch`
--

CREATE TABLE `mdl_question_randomsamatch` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `choose` bigint(10) unsigned NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  KEY `mdl_quesrand_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about a random short-answer matching question' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_randomsamatch`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_sessions`
--

CREATE TABLE `mdl_question_sessions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `attemptid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `questionid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `newest` bigint(10) unsigned NOT NULL DEFAULT '0',
  `newgraded` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sumpenalty` double NOT NULL DEFAULT '0',
  `manualcomment` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_quessess_attque_uix` (`attemptid`,`questionid`),
  KEY `mdl_quessess_att_ix` (`attemptid`),
  KEY `mdl_quessess_que_ix` (`questionid`),
  KEY `mdl_quessess_new_ix` (`newest`),
  KEY `mdl_quessess_new2_ix` (`newgraded`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Gives ids of the newest open and newest graded states' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_shortanswer`
--

CREATE TABLE `mdl_question_shortanswer` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answers` varchar(255) NOT NULL DEFAULT '',
  `usecase` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quesshor_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for short answer questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_shortanswer`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_states`
--

CREATE TABLE `mdl_question_states` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `attempt` bigint(10) unsigned NOT NULL DEFAULT '0',
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `originalquestion` bigint(10) unsigned NOT NULL DEFAULT '0',
  `seq_number` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `timestamp` bigint(10) unsigned NOT NULL DEFAULT '0',
  `event` smallint(4) unsigned NOT NULL DEFAULT '0',
  `grade` double NOT NULL DEFAULT '0',
  `raw_grade` double NOT NULL DEFAULT '0',
  `penalty` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quesstat_att_ix` (`attempt`),
  KEY `mdl_quesstat_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores user responses to an attempt, and percentage grades' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_states`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_question_truefalse`
--

CREATE TABLE `mdl_question_truefalse` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `trueanswer` bigint(10) unsigned NOT NULL DEFAULT '0',
  `falseanswer` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_questrue_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Options for True-False questions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_question_truefalse`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz`
--

CREATE TABLE `mdl_quiz` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `timeopen` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeclose` bigint(10) unsigned NOT NULL DEFAULT '0',
  `optionflags` bigint(10) unsigned NOT NULL DEFAULT '0',
  `penaltyscheme` smallint(4) unsigned NOT NULL DEFAULT '0',
  `attempts` mediumint(6) NOT NULL DEFAULT '0',
  `attemptonlast` smallint(4) NOT NULL DEFAULT '0',
  `grademethod` smallint(4) NOT NULL DEFAULT '1',
  `decimalpoints` smallint(4) NOT NULL DEFAULT '2',
  `review` bigint(10) unsigned NOT NULL DEFAULT '0',
  `questionsperpage` bigint(10) NOT NULL DEFAULT '0',
  `shufflequestions` smallint(4) NOT NULL DEFAULT '0',
  `shuffleanswers` smallint(4) NOT NULL DEFAULT '0',
  `questions` text NOT NULL,
  `sumgrades` bigint(10) NOT NULL DEFAULT '0',
  `grade` bigint(10) NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timelimit` bigint(10) unsigned NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '',
  `subnet` varchar(255) NOT NULL DEFAULT '',
  `popup` smallint(4) NOT NULL DEFAULT '0',
  `delay1` bigint(10) NOT NULL DEFAULT '0',
  `delay2` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quiz_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Main information about each quiz' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz_attempts`
--

CREATE TABLE `mdl_quiz_attempts` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `quiz` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `attempt` mediumint(6) NOT NULL DEFAULT '0',
  `sumgrades` double NOT NULL DEFAULT '0',
  `timestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timefinish` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `layout` text NOT NULL,
  `preview` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_quizatte_uni_uix` (`uniqueid`),
  KEY `mdl_quizatte_use_ix` (`userid`),
  KEY `mdl_quizatte_qui_ix` (`quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores various attempts on a quiz' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz_feedback`
--

CREATE TABLE `mdl_quiz_feedback` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `quizid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `feedbacktext` text NOT NULL,
  `mingrade` double NOT NULL DEFAULT '0',
  `maxgrade` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quizfeed_qui_ix` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Feedback given to students based on their overall score on t' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz_feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz_grades`
--

CREATE TABLE `mdl_quiz_grades` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` double NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quizgrad_use_ix` (`userid`),
  KEY `mdl_quizgrad_qui_ix` (`quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Final quiz grade (may be best of several attempts)' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz_grades`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz_question_instances`
--

CREATE TABLE `mdl_quiz_question_instances` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint(10) unsigned NOT NULL DEFAULT '0',
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` mediumint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quizquesinst_qui_ix` (`quiz`),
  KEY `mdl_quizquesinst_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The grade for a question in a quiz' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz_question_instances`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_quiz_question_versions`
--

CREATE TABLE `mdl_quiz_question_versions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `quiz` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldquestion` bigint(10) unsigned NOT NULL DEFAULT '0',
  `newquestion` bigint(10) unsigned NOT NULL DEFAULT '0',
  `originalquestion` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timestamp` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_quizquesvers_qui_ix` (`quiz`),
  KEY `mdl_quizquesvers_old_ix` (`oldquestion`),
  KEY `mdl_quizquesvers_new_ix` (`newquestion`),
  KEY `mdl_quizquesvers_ori_ix` (`originalquestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='quiz_question_versions table retrofitted from MySQL' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_quiz_question_versions`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_resource`
--

CREATE TABLE `mdl_resource` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  `reference` varchar(255) NOT NULL DEFAULT '',
  `summary` text,
  `alltext` mediumtext NOT NULL,
  `popup` text NOT NULL,
  `options` varchar(255) NOT NULL DEFAULT '',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_reso_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='each record is one resource and its config data' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_role`
--

CREATE TABLE `mdl_role` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `shortname` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_role_sor_uix` (`sortorder`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='moodle roles' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mdl_role`
--

INSERT INTO `mdl_role` VALUES(1, 'Administrator', 'admin', 'Administrators can usually do anything on the site, in all courses.', 0);
INSERT INTO `mdl_role` VALUES(2, 'Course creator', 'coursecreator', 'Course creators can create new courses.', 1);
INSERT INTO `mdl_role` VALUES(3, 'Teacher', 'editingteacher', 'Teachers can do anything within a course, including changing the activities and grading students.', 2);
INSERT INTO `mdl_role` VALUES(4, 'Non-editing teacher', 'teacher', 'Non-editing teachers can teach in courses and grade students, but may not alter activities.', 3);
INSERT INTO `mdl_role` VALUES(5, 'Student', 'student', 'Students generally have fewer privileges within a course.', 4);
INSERT INTO `mdl_role` VALUES(6, 'Guest', 'guest', 'Guests have minimal privileges and usually can not enter text anywhere.', 5);
INSERT INTO `mdl_role` VALUES(7, 'Authenticated user', 'user', 'All logged in users.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_allow_assign`
--

CREATE TABLE `mdl_role_allow_assign` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `allowassign` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_rolealloassi_rolall_uix` (`roleid`,`allowassign`),
  KEY `mdl_rolealloassi_rol_ix` (`roleid`),
  KEY `mdl_rolealloassi_all_ix` (`allowassign`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this defines what role can assign what role' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mdl_role_allow_assign`
--

INSERT INTO `mdl_role_allow_assign` VALUES(1, 1, 1);
INSERT INTO `mdl_role_allow_assign` VALUES(2, 1, 2);
INSERT INTO `mdl_role_allow_assign` VALUES(4, 1, 3);
INSERT INTO `mdl_role_allow_assign` VALUES(3, 1, 4);
INSERT INTO `mdl_role_allow_assign` VALUES(5, 1, 5);
INSERT INTO `mdl_role_allow_assign` VALUES(6, 1, 6);
INSERT INTO `mdl_role_allow_assign` VALUES(8, 2, 3);
INSERT INTO `mdl_role_allow_assign` VALUES(7, 2, 4);
INSERT INTO `mdl_role_allow_assign` VALUES(9, 2, 5);
INSERT INTO `mdl_role_allow_assign` VALUES(10, 2, 6);
INSERT INTO `mdl_role_allow_assign` VALUES(11, 3, 4);
INSERT INTO `mdl_role_allow_assign` VALUES(12, 3, 5);
INSERT INTO `mdl_role_allow_assign` VALUES(13, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_allow_override`
--

CREATE TABLE `mdl_role_allow_override` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `allowoverride` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_rolealloover_rolall_uix` (`roleid`,`allowoverride`),
  KEY `mdl_rolealloover_rol_ix` (`roleid`),
  KEY `mdl_rolealloover_all_ix` (`allowoverride`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this defines what role can override what role' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mdl_role_allow_override`
--

INSERT INTO `mdl_role_allow_override` VALUES(1, 1, 1);
INSERT INTO `mdl_role_allow_override` VALUES(2, 1, 2);
INSERT INTO `mdl_role_allow_override` VALUES(4, 1, 3);
INSERT INTO `mdl_role_allow_override` VALUES(3, 1, 4);
INSERT INTO `mdl_role_allow_override` VALUES(5, 1, 5);
INSERT INTO `mdl_role_allow_override` VALUES(6, 1, 6);
INSERT INTO `mdl_role_allow_override` VALUES(7, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_assignments`
--

CREATE TABLE `mdl_role_assignments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `contextid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `timestart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modifierid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `enrol` varchar(20) NOT NULL DEFAULT '',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_roleassi_conroluse_uix` (`contextid`,`roleid`,`userid`),
  KEY `mdl_roleassi_sor_ix` (`sortorder`),
  KEY `mdl_roleassi_rol_ix` (`roleid`),
  KEY `mdl_roleassi_con_ix` (`contextid`),
  KEY `mdl_roleassi_use_ix` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='assigning roles to different context' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mdl_role_assignments`
--

INSERT INTO `mdl_role_assignments` VALUES(1, 1, 1, 2, 0, 0, 0, 1343876477, 0, 'manual', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_capabilities`
--

CREATE TABLE `mdl_role_capabilities` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `contextid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `capability` varchar(255) NOT NULL DEFAULT '',
  `permission` bigint(10) NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modifierid` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_rolecapa_rolconcap_uix` (`roleid`,`contextid`,`capability`),
  KEY `mdl_rolecapa_rol_ix` (`roleid`),
  KEY `mdl_rolecapa_con_ix` (`contextid`),
  KEY `mdl_rolecapa_mod_ix` (`modifierid`),
  KEY `mdl_rolecapa_cap_ix` (`capability`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='permission has to be signed, overriding a capability for a p' AUTO_INCREMENT=561 ;

--
-- Dumping data for table `mdl_role_capabilities`
--

INSERT INTO `mdl_role_capabilities` VALUES(1, 1, 1, 'moodle/legacy:admin', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(2, 1, 2, 'moodle/legacy:coursecreator', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(3, 1, 3, 'moodle/legacy:editingteacher', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(4, 1, 4, 'moodle/legacy:teacher', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(5, 1, 5, 'moodle/legacy:student', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(6, 1, 6, 'moodle/legacy:guest', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(7, 1, 7, 'moodle/legacy:user', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(8, 1, 1, 'moodle/site:doanything', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(9, 1, 1, 'moodle/site:config', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(10, 1, 1, 'moodle/site:readallmessages', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(11, 1, 3, 'moodle/site:readallmessages', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(12, 1, 1, 'moodle/site:sendmessage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(13, 1, 7, 'moodle/site:sendmessage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(14, 1, 1, 'moodle/site:approvecourse', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(15, 1, 3, 'moodle/site:import', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(16, 1, 1, 'moodle/site:import', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(17, 1, 3, 'moodle/site:backup', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(18, 1, 1, 'moodle/site:backup', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(19, 1, 1, 'moodle/backup:userinfo', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(20, 1, 3, 'moodle/site:restore', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(21, 1, 1, 'moodle/site:restore', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(22, 1, 1, 'moodle/restore:createuser', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(23, 1, 1, 'moodle/restore:userinfo', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(24, 1, 2, 'moodle/restore:rolldates', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(25, 1, 1, 'moodle/restore:rolldates', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(26, 1, 3, 'moodle/site:manageblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(27, 1, 1, 'moodle/site:manageblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(28, 1, 4, 'moodle/site:accessallgroups', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(29, 1, 3, 'moodle/site:accessallgroups', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(30, 1, 1, 'moodle/site:accessallgroups', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(31, 1, 4, 'moodle/site:viewfullnames', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(32, 1, 3, 'moodle/site:viewfullnames', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(33, 1, 1, 'moodle/site:viewfullnames', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(34, 1, 4, 'moodle/site:viewreports', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(35, 1, 3, 'moodle/site:viewreports', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(36, 1, 1, 'moodle/site:viewreports', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(37, 1, 3, 'moodle/site:trustcontent', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(38, 1, 1, 'moodle/site:trustcontent', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(39, 1, 1, 'moodle/site:uploadusers', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(40, 1, 1, 'moodle/site:langeditmaster', -1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(41, 1, 1, 'moodle/site:langeditlocal', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(42, 1, 1, 'moodle/user:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(43, 1, 1, 'moodle/user:delete', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(44, 1, 1, 'moodle/user:update', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(45, 1, 6, 'moodle/user:viewdetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(46, 1, 5, 'moodle/user:viewdetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(47, 1, 4, 'moodle/user:viewdetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(48, 1, 3, 'moodle/user:viewdetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(49, 1, 1, 'moodle/user:viewdetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(50, 1, 4, 'moodle/user:viewhiddendetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(51, 1, 3, 'moodle/user:viewhiddendetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(52, 1, 1, 'moodle/user:viewhiddendetails', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(53, 1, 1, 'moodle/user:loginas', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(54, 1, 3, 'moodle/role:assign', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(55, 1, 1, 'moodle/role:assign', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(56, 1, 1, 'moodle/role:override', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(57, 1, 3, 'moodle/role:safeoverride', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(58, 1, 1, 'moodle/role:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(59, 1, 4, 'moodle/role:unassignself', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(60, 1, 3, 'moodle/role:unassignself', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(61, 1, 2, 'moodle/role:unassignself', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(62, 1, 1, 'moodle/role:unassignself', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(63, 1, 4, 'moodle/role:viewhiddenassigns', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(64, 1, 3, 'moodle/role:viewhiddenassigns', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(65, 1, 1, 'moodle/role:viewhiddenassigns', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(66, 1, 3, 'moodle/role:switchroles', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(67, 1, 1, 'moodle/role:switchroles', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(68, 1, 1, 'moodle/category:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(69, 1, 2, 'moodle/category:viewhiddencategories', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(70, 1, 1, 'moodle/category:viewhiddencategories', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(71, 1, 2, 'moodle/course:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(72, 1, 1, 'moodle/course:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(73, 1, 7, 'moodle/course:request', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(74, 1, 1, 'moodle/course:delete', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(75, 1, 3, 'moodle/course:update', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(76, 1, 1, 'moodle/course:update', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(77, 1, 6, 'moodle/course:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(78, 1, 5, 'moodle/course:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(79, 1, 4, 'moodle/course:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(80, 1, 3, 'moodle/course:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(81, 1, 4, 'moodle/course:bulkmessaging', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(82, 1, 3, 'moodle/course:bulkmessaging', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(83, 1, 1, 'moodle/course:bulkmessaging', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(84, 1, 4, 'moodle/course:viewhiddenuserfields', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(85, 1, 3, 'moodle/course:viewhiddenuserfields', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(86, 1, 1, 'moodle/course:viewhiddenuserfields', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(87, 1, 2, 'moodle/course:viewhiddencourses', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(88, 1, 4, 'moodle/course:viewhiddencourses', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(89, 1, 3, 'moodle/course:viewhiddencourses', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(90, 1, 1, 'moodle/course:viewhiddencourses', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(91, 1, 3, 'moodle/course:visibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(92, 1, 1, 'moodle/course:visibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(93, 1, 3, 'moodle/course:managefiles', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(94, 1, 1, 'moodle/course:managefiles', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(95, 1, 3, 'moodle/course:manageactivities', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(96, 1, 1, 'moodle/course:manageactivities', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(97, 1, 3, 'moodle/course:managemetacourse', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(98, 1, 1, 'moodle/course:managemetacourse', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(99, 1, 3, 'moodle/course:activityvisibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(100, 1, 1, 'moodle/course:activityvisibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(101, 1, 4, 'moodle/course:viewhiddenactivities', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(102, 1, 3, 'moodle/course:viewhiddenactivities', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(103, 1, 1, 'moodle/course:viewhiddenactivities', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(104, 1, 5, 'moodle/course:viewparticipants', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(105, 1, 4, 'moodle/course:viewparticipants', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(106, 1, 3, 'moodle/course:viewparticipants', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(107, 1, 1, 'moodle/course:viewparticipants', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(108, 1, 3, 'moodle/course:changefullname', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(109, 1, 1, 'moodle/course:changefullname', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(110, 1, 3, 'moodle/course:changeshortname', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(111, 1, 1, 'moodle/course:changeshortname', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(112, 1, 3, 'moodle/course:changeidnumber', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(113, 1, 1, 'moodle/course:changeidnumber', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(114, 1, 3, 'moodle/course:changecategory', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(115, 1, 1, 'moodle/course:changecategory', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(116, 1, 3, 'moodle/course:changesummary', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(117, 1, 1, 'moodle/course:changesummary', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(118, 1, 1, 'moodle/site:viewparticipants', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(119, 1, 5, 'moodle/course:viewscales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(120, 1, 4, 'moodle/course:viewscales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(121, 1, 3, 'moodle/course:viewscales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(122, 1, 1, 'moodle/course:viewscales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(123, 1, 3, 'moodle/course:managescales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(124, 1, 1, 'moodle/course:managescales', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(125, 1, 3, 'moodle/course:managegroups', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(126, 1, 1, 'moodle/course:managegroups', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(127, 1, 3, 'moodle/course:reset', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(128, 1, 1, 'moodle/course:reset', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(129, 1, 6, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(130, 1, 7, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(131, 1, 5, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(132, 1, 4, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(133, 1, 3, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(134, 1, 1, 'moodle/blog:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(135, 1, 7, 'moodle/blog:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(136, 1, 1, 'moodle/blog:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(137, 1, 4, 'moodle/blog:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(138, 1, 3, 'moodle/blog:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(139, 1, 1, 'moodle/blog:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(140, 1, 7, 'moodle/calendar:manageownentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(141, 1, 1, 'moodle/calendar:manageownentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(142, 1, 4, 'moodle/calendar:managegroupentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(143, 1, 3, 'moodle/calendar:managegroupentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(144, 1, 1, 'moodle/calendar:managegroupentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(145, 1, 4, 'moodle/calendar:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(146, 1, 3, 'moodle/calendar:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(147, 1, 1, 'moodle/calendar:manageentries', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(148, 1, 1, 'moodle/user:editprofile', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(149, 1, 6, 'moodle/user:editownprofile', -1000, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(150, 1, 7, 'moodle/user:editownprofile', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(151, 1, 1, 'moodle/user:editownprofile', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(152, 1, 6, 'moodle/user:changeownpassword', -1000, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(153, 1, 7, 'moodle/user:changeownpassword', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(154, 1, 1, 'moodle/user:changeownpassword', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(155, 1, 5, 'moodle/user:readuserposts', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(156, 1, 4, 'moodle/user:readuserposts', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(157, 1, 3, 'moodle/user:readuserposts', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(158, 1, 1, 'moodle/user:readuserposts', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(159, 1, 5, 'moodle/user:readuserblogs', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(160, 1, 4, 'moodle/user:readuserblogs', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(161, 1, 3, 'moodle/user:readuserblogs', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(162, 1, 1, 'moodle/user:readuserblogs', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(163, 1, 3, 'moodle/question:managecategory', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(164, 1, 1, 'moodle/question:managecategory', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(165, 1, 3, 'moodle/question:add', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(166, 1, 1, 'moodle/question:add', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(167, 1, 3, 'moodle/question:editmine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(168, 1, 1, 'moodle/question:editmine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(169, 1, 3, 'moodle/question:editall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(170, 1, 1, 'moodle/question:editall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(171, 1, 3, 'moodle/question:viewmine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(172, 1, 1, 'moodle/question:viewmine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(173, 1, 3, 'moodle/question:viewall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(174, 1, 1, 'moodle/question:viewall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(175, 1, 3, 'moodle/question:usemine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(176, 1, 1, 'moodle/question:usemine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(177, 1, 3, 'moodle/question:useall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(178, 1, 1, 'moodle/question:useall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(179, 1, 3, 'moodle/question:movemine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(180, 1, 1, 'moodle/question:movemine', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(181, 1, 3, 'moodle/question:moveall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(182, 1, 1, 'moodle/question:moveall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(183, 1, 1, 'moodle/question:config', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(184, 1, 4, 'moodle/site:doclinks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(185, 1, 3, 'moodle/site:doclinks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(186, 1, 1, 'moodle/site:doclinks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(187, 1, 3, 'moodle/course:sectionvisibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(188, 1, 1, 'moodle/course:sectionvisibility', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(189, 1, 3, 'moodle/course:useremail', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(190, 1, 1, 'moodle/course:useremail', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(191, 1, 3, 'moodle/course:viewhiddensections', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(192, 1, 1, 'moodle/course:viewhiddensections', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(193, 1, 3, 'moodle/course:setcurrentsection', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(194, 1, 1, 'moodle/course:setcurrentsection', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(195, 1, 1, 'moodle/site:mnetlogintoremote', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(196, 1, 4, 'moodle/grade:viewall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(197, 1, 3, 'moodle/grade:viewall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(198, 1, 1, 'moodle/grade:viewall', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(199, 1, 5, 'moodle/grade:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(200, 1, 4, 'moodle/grade:viewhidden', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(201, 1, 3, 'moodle/grade:viewhidden', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(202, 1, 1, 'moodle/grade:viewhidden', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(203, 1, 3, 'moodle/grade:import', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(204, 1, 1, 'moodle/grade:import', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(205, 1, 4, 'moodle/grade:export', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(206, 1, 3, 'moodle/grade:export', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(207, 1, 1, 'moodle/grade:export', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(208, 1, 3, 'moodle/grade:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(209, 1, 1, 'moodle/grade:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(210, 1, 3, 'moodle/grade:edit', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(211, 1, 1, 'moodle/grade:edit', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(212, 1, 3, 'moodle/grade:manageoutcomes', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(213, 1, 1, 'moodle/grade:manageoutcomes', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(214, 1, 3, 'moodle/grade:manageletters', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(215, 1, 1, 'moodle/grade:manageletters', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(216, 1, 3, 'moodle/grade:hide', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(217, 1, 1, 'moodle/grade:hide', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(218, 1, 3, 'moodle/grade:lock', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(219, 1, 1, 'moodle/grade:lock', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(220, 1, 3, 'moodle/grade:unlock', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(221, 1, 1, 'moodle/grade:unlock', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(222, 1, 7, 'moodle/my:manageblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(223, 1, 4, 'moodle/notes:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(224, 1, 3, 'moodle/notes:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(225, 1, 1, 'moodle/notes:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(226, 1, 4, 'moodle/notes:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(227, 1, 3, 'moodle/notes:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(228, 1, 1, 'moodle/notes:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(229, 1, 4, 'moodle/tag:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(230, 1, 3, 'moodle/tag:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(231, 1, 1, 'moodle/tag:manage', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(232, 1, 1, 'moodle/tag:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(233, 1, 7, 'moodle/tag:create', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(234, 1, 1, 'moodle/tag:edit', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(235, 1, 7, 'moodle/tag:edit', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(236, 1, 4, 'moodle/tag:editblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(237, 1, 3, 'moodle/tag:editblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(238, 1, 1, 'moodle/tag:editblocks', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(239, 1, 6, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(240, 1, 7, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(241, 1, 5, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(242, 1, 4, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(243, 1, 3, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(244, 1, 2, 'moodle/block:view', 1, 1343876371, 0);
INSERT INTO `mdl_role_capabilities` VALUES(245, 1, 6, 'mod/assignment:view', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(246, 1, 5, 'mod/assignment:view', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(247, 1, 4, 'mod/assignment:view', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(248, 1, 3, 'mod/assignment:view', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(249, 1, 1, 'mod/assignment:view', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(250, 1, 5, 'mod/assignment:submit', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(251, 1, 4, 'mod/assignment:grade', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(252, 1, 3, 'mod/assignment:grade', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(253, 1, 1, 'mod/assignment:grade', 1, 1343876374, 0);
INSERT INTO `mdl_role_capabilities` VALUES(254, 1, 5, 'mod/chat:chat', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(255, 1, 4, 'mod/chat:chat', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(256, 1, 3, 'mod/chat:chat', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(257, 1, 1, 'mod/chat:chat', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(258, 1, 5, 'mod/chat:readlog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(259, 1, 4, 'mod/chat:readlog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(260, 1, 3, 'mod/chat:readlog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(261, 1, 1, 'mod/chat:readlog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(262, 1, 4, 'mod/chat:deletelog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(263, 1, 3, 'mod/chat:deletelog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(264, 1, 1, 'mod/chat:deletelog', 1, 1343876377, 0);
INSERT INTO `mdl_role_capabilities` VALUES(265, 1, 5, 'mod/choice:choose', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(266, 1, 4, 'mod/choice:choose', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(267, 1, 3, 'mod/choice:choose', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(268, 1, 1, 'mod/choice:choose', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(269, 1, 4, 'mod/choice:readresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(270, 1, 3, 'mod/choice:readresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(271, 1, 1, 'mod/choice:readresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(272, 1, 4, 'mod/choice:deleteresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(273, 1, 3, 'mod/choice:deleteresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(274, 1, 1, 'mod/choice:deleteresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(275, 1, 4, 'mod/choice:downloadresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(276, 1, 3, 'mod/choice:downloadresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(277, 1, 1, 'mod/choice:downloadresponses', 1, 1343876379, 0);
INSERT INTO `mdl_role_capabilities` VALUES(278, 1, 6, 'mod/data:viewentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(279, 1, 5, 'mod/data:viewentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(280, 1, 4, 'mod/data:viewentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(281, 1, 3, 'mod/data:viewentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(282, 1, 1, 'mod/data:viewentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(283, 1, 5, 'mod/data:writeentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(284, 1, 4, 'mod/data:writeentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(285, 1, 3, 'mod/data:writeentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(286, 1, 1, 'mod/data:writeentry', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(287, 1, 5, 'mod/data:comment', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(288, 1, 4, 'mod/data:comment', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(289, 1, 3, 'mod/data:comment', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(290, 1, 1, 'mod/data:comment', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(291, 1, 4, 'mod/data:viewrating', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(292, 1, 3, 'mod/data:viewrating', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(293, 1, 1, 'mod/data:viewrating', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(294, 1, 4, 'mod/data:rate', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(295, 1, 3, 'mod/data:rate', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(296, 1, 1, 'mod/data:rate', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(297, 1, 4, 'mod/data:approve', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(298, 1, 3, 'mod/data:approve', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(299, 1, 1, 'mod/data:approve', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(300, 1, 4, 'mod/data:manageentries', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(301, 1, 3, 'mod/data:manageentries', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(302, 1, 1, 'mod/data:manageentries', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(303, 1, 4, 'mod/data:managecomments', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(304, 1, 3, 'mod/data:managecomments', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(305, 1, 1, 'mod/data:managecomments', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(306, 1, 3, 'mod/data:managetemplates', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(307, 1, 1, 'mod/data:managetemplates', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(308, 1, 4, 'mod/data:viewalluserpresets', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(309, 1, 3, 'mod/data:viewalluserpresets', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(310, 1, 1, 'mod/data:viewalluserpresets', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(311, 1, 1, 'mod/data:manageuserpresets', 1, 1343876383, 0);
INSERT INTO `mdl_role_capabilities` VALUES(312, 1, 6, 'mod/forum:viewdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(313, 1, 5, 'mod/forum:viewdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(314, 1, 4, 'mod/forum:viewdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(315, 1, 3, 'mod/forum:viewdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(316, 1, 1, 'mod/forum:viewdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(317, 1, 4, 'mod/forum:viewhiddentimedposts', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(318, 1, 3, 'mod/forum:viewhiddentimedposts', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(319, 1, 1, 'mod/forum:viewhiddentimedposts', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(320, 1, 5, 'mod/forum:startdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(321, 1, 4, 'mod/forum:startdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(322, 1, 3, 'mod/forum:startdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(323, 1, 1, 'mod/forum:startdiscussion', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(324, 1, 5, 'mod/forum:replypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(325, 1, 4, 'mod/forum:replypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(326, 1, 3, 'mod/forum:replypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(327, 1, 1, 'mod/forum:replypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(328, 1, 4, 'mod/forum:addnews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(329, 1, 3, 'mod/forum:addnews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(330, 1, 1, 'mod/forum:addnews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(331, 1, 4, 'mod/forum:replynews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(332, 1, 3, 'mod/forum:replynews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(333, 1, 1, 'mod/forum:replynews', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(334, 1, 5, 'mod/forum:viewrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(335, 1, 4, 'mod/forum:viewrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(336, 1, 3, 'mod/forum:viewrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(337, 1, 1, 'mod/forum:viewrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(338, 1, 4, 'mod/forum:viewanyrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(339, 1, 3, 'mod/forum:viewanyrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(340, 1, 1, 'mod/forum:viewanyrating', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(341, 1, 4, 'mod/forum:rate', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(342, 1, 3, 'mod/forum:rate', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(343, 1, 1, 'mod/forum:rate', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(344, 1, 5, 'mod/forum:createattachment', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(345, 1, 4, 'mod/forum:createattachment', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(346, 1, 3, 'mod/forum:createattachment', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(347, 1, 1, 'mod/forum:createattachment', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(348, 1, 5, 'mod/forum:deleteownpost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(349, 1, 4, 'mod/forum:deleteownpost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(350, 1, 3, 'mod/forum:deleteownpost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(351, 1, 1, 'mod/forum:deleteownpost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(352, 1, 4, 'mod/forum:deleteanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(353, 1, 3, 'mod/forum:deleteanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(354, 1, 1, 'mod/forum:deleteanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(355, 1, 4, 'mod/forum:splitdiscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(356, 1, 3, 'mod/forum:splitdiscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(357, 1, 1, 'mod/forum:splitdiscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(358, 1, 4, 'mod/forum:movediscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(359, 1, 3, 'mod/forum:movediscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(360, 1, 1, 'mod/forum:movediscussions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(361, 1, 4, 'mod/forum:editanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(362, 1, 3, 'mod/forum:editanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(363, 1, 1, 'mod/forum:editanypost', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(364, 1, 4, 'mod/forum:viewqandawithoutposting', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(365, 1, 3, 'mod/forum:viewqandawithoutposting', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(366, 1, 1, 'mod/forum:viewqandawithoutposting', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(367, 1, 4, 'mod/forum:viewsubscribers', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(368, 1, 3, 'mod/forum:viewsubscribers', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(369, 1, 1, 'mod/forum:viewsubscribers', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(370, 1, 4, 'mod/forum:managesubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(371, 1, 3, 'mod/forum:managesubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(372, 1, 1, 'mod/forum:managesubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(373, 1, 4, 'mod/forum:initialsubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(374, 1, 3, 'mod/forum:initialsubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(375, 1, 5, 'mod/forum:initialsubscriptions', 1, 1343876390, 0);
INSERT INTO `mdl_role_capabilities` VALUES(376, 1, 5, 'mod/glossary:write', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(377, 1, 4, 'mod/glossary:write', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(378, 1, 3, 'mod/glossary:write', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(379, 1, 1, 'mod/glossary:write', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(380, 1, 4, 'mod/glossary:manageentries', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(381, 1, 3, 'mod/glossary:manageentries', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(382, 1, 1, 'mod/glossary:manageentries', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(383, 1, 4, 'mod/glossary:managecategories', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(384, 1, 3, 'mod/glossary:managecategories', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(385, 1, 1, 'mod/glossary:managecategories', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(386, 1, 5, 'mod/glossary:comment', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(387, 1, 4, 'mod/glossary:comment', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(388, 1, 3, 'mod/glossary:comment', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(389, 1, 1, 'mod/glossary:comment', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(390, 1, 4, 'mod/glossary:managecomments', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(391, 1, 3, 'mod/glossary:managecomments', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(392, 1, 1, 'mod/glossary:managecomments', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(393, 1, 4, 'mod/glossary:import', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(394, 1, 3, 'mod/glossary:import', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(395, 1, 1, 'mod/glossary:import', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(396, 1, 4, 'mod/glossary:export', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(397, 1, 3, 'mod/glossary:export', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(398, 1, 1, 'mod/glossary:export', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(399, 1, 4, 'mod/glossary:approve', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(400, 1, 3, 'mod/glossary:approve', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(401, 1, 1, 'mod/glossary:approve', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(402, 1, 4, 'mod/glossary:rate', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(403, 1, 3, 'mod/glossary:rate', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(404, 1, 1, 'mod/glossary:rate', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(405, 1, 4, 'mod/glossary:viewrating', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(406, 1, 3, 'mod/glossary:viewrating', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(407, 1, 1, 'mod/glossary:viewrating', 1, 1343876396, 0);
INSERT INTO `mdl_role_capabilities` VALUES(408, 1, 5, 'mod/hotpot:attempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(409, 1, 4, 'mod/hotpot:attempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(410, 1, 3, 'mod/hotpot:attempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(411, 1, 1, 'mod/hotpot:attempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(412, 1, 4, 'mod/hotpot:viewreport', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(413, 1, 3, 'mod/hotpot:viewreport', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(414, 1, 1, 'mod/hotpot:viewreport', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(415, 1, 4, 'mod/hotpot:grade', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(416, 1, 3, 'mod/hotpot:grade', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(417, 1, 1, 'mod/hotpot:grade', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(418, 1, 3, 'mod/hotpot:deleteattempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(419, 1, 1, 'mod/hotpot:deleteattempt', 1, 1343876399, 0);
INSERT INTO `mdl_role_capabilities` VALUES(420, 1, 5, 'mod/lams:participate', 1, 1343876401, 0);
INSERT INTO `mdl_role_capabilities` VALUES(421, 1, 4, 'mod/lams:manage', 1, 1343876401, 0);
INSERT INTO `mdl_role_capabilities` VALUES(422, 1, 3, 'mod/lams:manage', 1, 1343876401, 0);
INSERT INTO `mdl_role_capabilities` VALUES(423, 1, 1, 'mod/lams:manage', 1, 1343876401, 0);
INSERT INTO `mdl_role_capabilities` VALUES(424, 1, 3, 'mod/lesson:edit', 1, 1343876407, 0);
INSERT INTO `mdl_role_capabilities` VALUES(425, 1, 1, 'mod/lesson:edit', 1, 1343876407, 0);
INSERT INTO `mdl_role_capabilities` VALUES(426, 1, 4, 'mod/lesson:manage', 1, 1343876407, 0);
INSERT INTO `mdl_role_capabilities` VALUES(427, 1, 3, 'mod/lesson:manage', 1, 1343876407, 0);
INSERT INTO `mdl_role_capabilities` VALUES(428, 1, 1, 'mod/lesson:manage', 1, 1343876407, 0);
INSERT INTO `mdl_role_capabilities` VALUES(429, 1, 6, 'mod/quiz:view', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(430, 1, 5, 'mod/quiz:view', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(431, 1, 4, 'mod/quiz:view', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(432, 1, 3, 'mod/quiz:view', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(433, 1, 1, 'mod/quiz:view', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(434, 1, 5, 'mod/quiz:attempt', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(435, 1, 5, 'mod/quiz:reviewmyattempts', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(436, 1, 3, 'mod/quiz:manage', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(437, 1, 1, 'mod/quiz:manage', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(438, 1, 4, 'mod/quiz:preview', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(439, 1, 3, 'mod/quiz:preview', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(440, 1, 1, 'mod/quiz:preview', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(441, 1, 4, 'mod/quiz:grade', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(442, 1, 3, 'mod/quiz:grade', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(443, 1, 1, 'mod/quiz:grade', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(444, 1, 4, 'mod/quiz:viewreports', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(445, 1, 3, 'mod/quiz:viewreports', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(446, 1, 1, 'mod/quiz:viewreports', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(447, 1, 3, 'mod/quiz:deleteattempts', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(448, 1, 1, 'mod/quiz:deleteattempts', 1, 1343876423, 0);
INSERT INTO `mdl_role_capabilities` VALUES(449, 1, 4, 'mod/scorm:viewreport', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(450, 1, 3, 'mod/scorm:viewreport', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(451, 1, 1, 'mod/scorm:viewreport', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(452, 1, 5, 'mod/scorm:skipview', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(453, 1, 5, 'mod/scorm:savetrack', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(454, 1, 4, 'mod/scorm:savetrack', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(455, 1, 3, 'mod/scorm:savetrack', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(456, 1, 1, 'mod/scorm:savetrack', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(457, 1, 5, 'mod/scorm:viewscores', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(458, 1, 4, 'mod/scorm:viewscores', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(459, 1, 3, 'mod/scorm:viewscores', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(460, 1, 1, 'mod/scorm:viewscores', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(461, 1, 4, 'mod/scorm:deleteresponses', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(462, 1, 3, 'mod/scorm:deleteresponses', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(463, 1, 1, 'mod/scorm:deleteresponses', 1, 1343876433, 0);
INSERT INTO `mdl_role_capabilities` VALUES(464, 1, 5, 'mod/survey:participate', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(465, 1, 4, 'mod/survey:participate', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(466, 1, 3, 'mod/survey:participate', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(467, 1, 1, 'mod/survey:participate', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(468, 1, 4, 'mod/survey:readresponses', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(469, 1, 3, 'mod/survey:readresponses', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(470, 1, 1, 'mod/survey:readresponses', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(471, 1, 4, 'mod/survey:download', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(472, 1, 3, 'mod/survey:download', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(473, 1, 1, 'mod/survey:download', 1, 1343876435, 0);
INSERT INTO `mdl_role_capabilities` VALUES(474, 1, 5, 'mod/wiki:participate', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(475, 1, 4, 'mod/wiki:participate', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(476, 1, 3, 'mod/wiki:participate', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(477, 1, 1, 'mod/wiki:participate', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(478, 1, 4, 'mod/wiki:manage', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(479, 1, 3, 'mod/wiki:manage', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(480, 1, 1, 'mod/wiki:manage', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(481, 1, 4, 'mod/wiki:overridelock', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(482, 1, 3, 'mod/wiki:overridelock', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(483, 1, 1, 'mod/wiki:overridelock', 1, 1343876443, 0);
INSERT INTO `mdl_role_capabilities` VALUES(484, 1, 5, 'mod/workshop:participate', 1, 1343876451, 0);
INSERT INTO `mdl_role_capabilities` VALUES(485, 1, 4, 'mod/workshop:manage', 1, 1343876451, 0);
INSERT INTO `mdl_role_capabilities` VALUES(486, 1, 3, 'mod/workshop:manage', 1, 1343876451, 0);
INSERT INTO `mdl_role_capabilities` VALUES(487, 1, 1, 'mod/workshop:manage', 1, 1343876451, 0);
INSERT INTO `mdl_role_capabilities` VALUES(488, 1, 7, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(489, 1, 6, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(490, 1, 5, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(491, 1, 4, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(492, 1, 3, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(493, 1, 1, 'block/online_users:viewlist', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(494, 1, 4, 'block/rss_client:createprivatefeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(495, 1, 3, 'block/rss_client:createprivatefeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(496, 1, 1, 'block/rss_client:createprivatefeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(497, 1, 3, 'block/rss_client:createsharedfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(498, 1, 1, 'block/rss_client:createsharedfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(499, 1, 4, 'block/rss_client:manageownfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(500, 1, 3, 'block/rss_client:manageownfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(501, 1, 1, 'block/rss_client:manageownfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(502, 1, 1, 'block/rss_client:manageanyfeeds', 1, 1343876464, 0);
INSERT INTO `mdl_role_capabilities` VALUES(503, 1, 1, 'enrol/authorize:managepayments', 1, 1343876470, 0);
INSERT INTO `mdl_role_capabilities` VALUES(504, 1, 1, 'enrol/authorize:uploadcsv', 1, 1343876470, 0);
INSERT INTO `mdl_role_capabilities` VALUES(505, 1, 4, 'gradeexport/ods:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(506, 1, 3, 'gradeexport/ods:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(507, 1, 1, 'gradeexport/ods:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(508, 1, 1, 'gradeexport/ods:publish', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(509, 1, 4, 'gradeexport/txt:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(510, 1, 3, 'gradeexport/txt:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(511, 1, 1, 'gradeexport/txt:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(512, 1, 1, 'gradeexport/txt:publish', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(513, 1, 4, 'gradeexport/xls:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(514, 1, 3, 'gradeexport/xls:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(515, 1, 1, 'gradeexport/xls:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(516, 1, 1, 'gradeexport/xls:publish', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(517, 1, 4, 'gradeexport/xml:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(518, 1, 3, 'gradeexport/xml:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(519, 1, 1, 'gradeexport/xml:view', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(520, 1, 1, 'gradeexport/xml:publish', 1, 1343876473, 0);
INSERT INTO `mdl_role_capabilities` VALUES(521, 1, 3, 'gradeimport/csv:view', 1, 1343876474, 0);
INSERT INTO `mdl_role_capabilities` VALUES(522, 1, 1, 'gradeimport/csv:view', 1, 1343876474, 0);
INSERT INTO `mdl_role_capabilities` VALUES(523, 1, 3, 'gradeimport/xml:view', 1, 1343876474, 0);
INSERT INTO `mdl_role_capabilities` VALUES(524, 1, 1, 'gradeimport/xml:view', 1, 1343876474, 0);
INSERT INTO `mdl_role_capabilities` VALUES(525, 1, 1, 'gradeimport/xml:publish', 1, 1343876474, 0);
INSERT INTO `mdl_role_capabilities` VALUES(526, 1, 4, 'gradereport/grader:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(527, 1, 3, 'gradereport/grader:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(528, 1, 1, 'gradereport/grader:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(529, 1, 4, 'gradereport/outcomes:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(530, 1, 3, 'gradereport/outcomes:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(531, 1, 1, 'gradereport/outcomes:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(532, 1, 5, 'gradereport/overview:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(533, 1, 1, 'gradereport/overview:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(534, 1, 5, 'gradereport/user:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(535, 1, 4, 'gradereport/user:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(536, 1, 3, 'gradereport/user:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(537, 1, 1, 'gradereport/user:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(538, 1, 4, 'coursereport/log:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(539, 1, 3, 'coursereport/log:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(540, 1, 1, 'coursereport/log:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(541, 1, 4, 'coursereport/log:viewlive', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(542, 1, 3, 'coursereport/log:viewlive', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(543, 1, 1, 'coursereport/log:viewlive', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(544, 1, 4, 'coursereport/log:viewtoday', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(545, 1, 3, 'coursereport/log:viewtoday', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(546, 1, 1, 'coursereport/log:viewtoday', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(547, 1, 4, 'coursereport/outline:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(548, 1, 3, 'coursereport/outline:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(549, 1, 1, 'coursereport/outline:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(550, 1, 4, 'coursereport/participation:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(551, 1, 3, 'coursereport/participation:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(552, 1, 1, 'coursereport/participation:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(553, 1, 4, 'coursereport/stats:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(554, 1, 3, 'coursereport/stats:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(555, 1, 1, 'coursereport/stats:view', 1, 1343876475, 0);
INSERT INTO `mdl_role_capabilities` VALUES(556, 1, 4, 'report/courseoverview:view', 1, 1343876476, 0);
INSERT INTO `mdl_role_capabilities` VALUES(557, 1, 3, 'report/courseoverview:view', 1, 1343876476, 0);
INSERT INTO `mdl_role_capabilities` VALUES(558, 1, 1, 'report/courseoverview:view', 1, 1343876476, 0);
INSERT INTO `mdl_role_capabilities` VALUES(559, 1, 1, 'report/security:view', 1, 1343876476, 0);
INSERT INTO `mdl_role_capabilities` VALUES(560, 1, 1, 'report/unittest:view', 1, 1343876476, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_names`
--

CREATE TABLE `mdl_role_names` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `contextid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_rolename_rolcon_uix` (`roleid`,`contextid`),
  KEY `mdl_rolename_rol_ix` (`roleid`),
  KEY `mdl_rolename_con_ix` (`contextid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='role names in native strings' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_role_names`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_role_sortorder`
--

CREATE TABLE `mdl_role_sortorder` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL,
  `roleid` bigint(10) unsigned NOT NULL,
  `contextid` bigint(10) unsigned NOT NULL,
  `sortoder` bigint(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_rolesort_userolcon_uix` (`userid`,`roleid`,`contextid`),
  KEY `mdl_rolesort_use_ix` (`userid`),
  KEY `mdl_rolesort_rol_ix` (`roleid`),
  KEY `mdl_rolesort_con_ix` (`contextid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='sort order of course managers in a course' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_role_sortorder`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scale`
--

CREATE TABLE `mdl_scale` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `scale` text NOT NULL,
  `description` text NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_scal_cou_ix` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Defines grading scales' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mdl_scale`
--

INSERT INTO `mdl_scale` VALUES(1, 0, 0, 'Separate and Connected ways of knowing', 'Mostly Separate Knowing,Separate and Connected,Mostly Connected Knowing', '<h1> Ratings </h1>\n\n<p>Individual posts can be rated using a scale based on the theory of <strong>separate and connected knowing</strong>.\n\nThis theory may help you to look at human interactions in a new way. It describes two different ways that we can evaluate and learn about the things we see and hear.\n\nAlthough each of us may use these two methods in different amounts at different times, it may be useful to imagine two people as examples, one who is a mostly separate knower (Jim) and the other a mostly connected knower (Mary).\n</p>\n\n<ul>\n\n  <li>Jim likes to remain as ''objective'' as possible without including his feelings and emotions. When in a discussion with other people who may have different ideas, he likes to defend his own ideas, using logic to find holes in his opponent''s ideas. He is critical of new ideas unless they are proven facts from reputable sources such as textbooks, respected teachers or his own direct experience. Jim is a very <strong>separate knower</strong>.\n\n  </li>\n\n  <li>Mary is more sensitive to other people. She is skilled at empathy and tends to listen and ask questions until she feels she can connect and &quot;understand things from their point of view&quot;. She learns by trying to share the experiences that led to the knowledge she finds in other people. When talking to others, she avoids confrontation and will often try to help the other person if she can see a way to do so, using logical suggestions. Mary is a very <strong>connected knower</strong>.</li>\n\n</ul>\n\n<p>Did you notice in these examples that the separate knower is male and the connected knower is female? Some studies have shown that statistically this tends to be the case, however individual people can be anywhere in the spectrum between these two extremes.\n\nFor a collaborative and effective group of learners it may be best if everyone were able to use BOTH ways of knowing.\n\nIn a particular situation like an online forum, a single post by a person may exhibit either of these characteristics, or even both. Someone who is generally very connected may post a very separate-sounding message, and vice versa. The purpose of rating each post using this scale is to:\n</p>\n\n<ol style="list-style:lower-alpha">\n\n  <li> help you think about these issues when reading other posts </li>\n\n  <li> provide feedback to each author on how they are being seen by others </li>\n\n</ol>\n\nThe results are not used towards student assessment in any way, they are just to help improve communication and learning.\n\n<hr />\n<p>\nIn case you''re interested, here are some references to papers by the authors who originally developed these ideas:\n</p>\n\n<ul>\n  <li>Belenky, M.F., Clinchy, B.M., Goldberger, N.R., &amp; Tarule, J.M. (1986). \n\n    Women''s ways of knowing: the development of self, voice, and mind. New York, \n\n    NY: Basic Books.</li>\n\n  <li>Clinchy, B.M. (1989a). The development of thoughtfulness in college women: \n\n    Integrating reason and care. American Behavioural Scientist, 32(6), 647-657.</li>\n\n  <li>Clinchy, B.M. (1989b). On critical thinking &amp; connected knowing. Liberal \n\n    education, 75(5), 14-19.</li>\n\n  <li>Clinchy, B.M. (1996). Connected and separate knowing; Toward a marriage \n\n    of two minds. In N.R. Goldberger, Tarule, J.M., Clinchy, B.M. &amp;</li>\n\n  <li>Belenky, M.F. (Eds.), Knowledge, Difference, and Power; Essays inspired \n\n    by &#8220;Women&#8217;s Ways of Knowing&#8221; (pp. 205-247). New York, NY: \n\n    Basic Books.</li>\n\n  <li>Galotti, K. M., Clinchy, B. M., Ainsworth, K., Lavin, B., &amp; Mansfield, \n\n    A. F. (1999). A New Way of Assessing Ways of Knowing: The Attitudes Towards \n\n    Thinking and Learning Survey (ATTLS). Sex Roles, 40(9/10), 745-766.</li>\n\n  <li>Galotti, K. M., Reimer, R. L., &amp; Drebus, D. W. (2001). Ways of knowing \n\n    as learning styles: Learning MAGIC with a partner. Sex Roles, 44(7/8), 419-436. \n\n  </li>\n\n</ul>\n\n', 1343925852);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_scale_history`
--

CREATE TABLE `mdl_scale_history` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` bigint(10) unsigned NOT NULL DEFAULT '0',
  `oldid` bigint(10) unsigned NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  `loggeduser` bigint(10) unsigned DEFAULT NULL,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `scale` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_scalhist_act_ix` (`action`),
  KEY `mdl_scalhist_old_ix` (`oldid`),
  KEY `mdl_scalhist_cou_ix` (`courseid`),
  KEY `mdl_scalhist_log_ix` (`loggeduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='History table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scale_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm`
--

CREATE TABLE `mdl_scorm` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `reference` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `version` varchar(9) NOT NULL DEFAULT '',
  `maxgrade` double NOT NULL DEFAULT '0',
  `grademethod` tinyint(2) NOT NULL DEFAULT '0',
  `whatgrade` bigint(10) NOT NULL DEFAULT '0',
  `maxattempt` bigint(10) NOT NULL DEFAULT '1',
  `updatefreq` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `md5hash` varchar(32) NOT NULL DEFAULT '',
  `launch` bigint(10) unsigned NOT NULL DEFAULT '0',
  `skipview` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `hidebrowse` tinyint(1) NOT NULL DEFAULT '0',
  `hidetoc` tinyint(1) NOT NULL DEFAULT '0',
  `hidenav` tinyint(1) NOT NULL DEFAULT '0',
  `auto` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `popup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `options` varchar(255) NOT NULL DEFAULT '',
  `width` bigint(10) unsigned NOT NULL DEFAULT '100',
  `height` bigint(10) unsigned NOT NULL DEFAULT '600',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_scor_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='each table is one SCORM module and its configuration' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_scoes`
--

CREATE TABLE `mdl_scorm_scoes` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scorm` bigint(10) unsigned NOT NULL DEFAULT '0',
  `manifest` varchar(255) NOT NULL DEFAULT '',
  `organization` varchar(255) NOT NULL DEFAULT '',
  `parent` varchar(255) NOT NULL DEFAULT '',
  `identifier` varchar(255) NOT NULL DEFAULT '',
  `launch` varchar(255) NOT NULL DEFAULT '',
  `scormtype` varchar(5) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_scorscoe_sco_ix` (`scorm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='each SCO part of the SCORM module' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_scoes`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_scoes_data`
--

CREATE TABLE `mdl_scorm_scoes_data` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_scorscoedata_sco_ix` (`scoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains variable data get from packages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_scoes_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_scoes_track`
--

CREATE TABLE `mdl_scorm_scoes_track` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `scormid` bigint(10) NOT NULL DEFAULT '0',
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `attempt` bigint(10) unsigned NOT NULL DEFAULT '1',
  `element` varchar(255) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorscoetrac_usescosco_uix` (`userid`,`scormid`,`scoid`,`attempt`,`element`),
  KEY `mdl_scorscoetrac_use_ix` (`userid`),
  KEY `mdl_scorscoetrac_ele_ix` (`element`),
  KEY `mdl_scorscoetrac_sco_ix` (`scormid`),
  KEY `mdl_scorscoetrac_sco2_ix` (`scoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to track SCOes' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_scoes_track`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_mapinfo`
--

CREATE TABLE `mdl_scorm_seq_mapinfo` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `objectiveid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `targetobjectiveid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `readsatisfiedstatus` tinyint(1) NOT NULL DEFAULT '1',
  `readnormalizedmeasure` tinyint(1) NOT NULL DEFAULT '1',
  `writesatisfiedstatus` tinyint(1) NOT NULL DEFAULT '0',
  `writenormalizedmeasure` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqmapi_scoidobj_uix` (`scoid`,`id`,`objectiveid`),
  KEY `mdl_scorseqmapi_sco_ix` (`scoid`),
  KEY `mdl_scorseqmapi_obj_ix` (`objectiveid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 objective mapinfo description' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_mapinfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_objective`
--

CREATE TABLE `mdl_scorm_seq_objective` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `primaryobj` tinyint(1) NOT NULL DEFAULT '0',
  `objectiveid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `satisfiedbymeasure` tinyint(1) NOT NULL DEFAULT '1',
  `minnormalizedmeasure` float(11,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqobje_scoid_uix` (`scoid`,`id`),
  KEY `mdl_scorseqobje_sco_ix` (`scoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 objective description' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_objective`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_rolluprule`
--

CREATE TABLE `mdl_scorm_seq_rolluprule` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `childactivityset` varchar(15) NOT NULL DEFAULT '',
  `minimumcount` bigint(10) unsigned NOT NULL DEFAULT '0',
  `minimumpercent` float(11,4) unsigned NOT NULL DEFAULT '0.0000',
  `conditioncombination` varchar(3) NOT NULL DEFAULT 'all',
  `action` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqroll_scoid_uix` (`scoid`,`id`),
  KEY `mdl_scorseqroll_sco_ix` (`scoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 sequencing rule' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_rolluprule`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_rolluprulecond`
--

CREATE TABLE `mdl_scorm_seq_rolluprulecond` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rollupruleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `operator` varchar(5) NOT NULL DEFAULT 'noOp',
  `cond` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqroll_scorolid_uix` (`scoid`,`rollupruleid`,`id`),
  KEY `mdl_scorseqroll_sco2_ix` (`scoid`),
  KEY `mdl_scorseqroll_rol_ix` (`rollupruleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 sequencing rule' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_rolluprulecond`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_rulecond`
--

CREATE TABLE `mdl_scorm_seq_rulecond` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `ruleconditionsid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `refrencedobjective` varchar(255) NOT NULL DEFAULT '',
  `measurethreshold` float(11,4) NOT NULL DEFAULT '0.0000',
  `operator` varchar(5) NOT NULL DEFAULT 'noOp',
  `cond` varchar(30) NOT NULL DEFAULT 'always',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqrule_idscorul_uix` (`id`,`scoid`,`ruleconditionsid`),
  KEY `mdl_scorseqrule_sco2_ix` (`scoid`),
  KEY `mdl_scorseqrule_rul_ix` (`ruleconditionsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 rule condition' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_rulecond`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_scorm_seq_ruleconds`
--

CREATE TABLE `mdl_scorm_seq_ruleconds` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `scoid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `conditioncombination` varchar(3) NOT NULL DEFAULT 'all',
  `ruletype` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `action` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_scorseqrule_scoid_uix` (`scoid`,`id`),
  KEY `mdl_scorseqrule_sco_ix` (`scoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SCORM2004 rule conditions' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_scorm_seq_ruleconds`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_sessions2`
--

CREATE TABLE `mdl_sessions2` (
  `sesskey` varchar(64) NOT NULL DEFAULT '',
  `expiry` datetime NOT NULL,
  `expireref` varchar(250) DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `sessdata` longtext,
  PRIMARY KEY (`sesskey`),
  KEY `mdl_sess_exp_ix` (`expiry`),
  KEY `mdl_sess_exp2_ix` (`expireref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Optional database session storage in new format, not used by';

--
-- Dumping data for table `mdl_sessions2`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_daily`
--

CREATE TABLE `mdl_stats_daily` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` enum('enrolments','activity','logins') NOT NULL DEFAULT 'activity',
  `stat1` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stat2` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_statdail_cou_ix` (`courseid`),
  KEY `mdl_statdail_tim_ix` (`timeend`),
  KEY `mdl_statdail_rol_ix` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to accumulate daily stats' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_daily`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_monthly`
--

CREATE TABLE `mdl_stats_monthly` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` enum('enrolments','activity','logins') NOT NULL DEFAULT 'activity',
  `stat1` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stat2` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_statmont_cou_ix` (`courseid`),
  KEY `mdl_statmont_tim_ix` (`timeend`),
  KEY `mdl_statmont_rol_ix` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To accumulate monthly stats' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_monthly`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_user_daily`
--

CREATE TABLE `mdl_stats_user_daily` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statsreads` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statswrites` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_statuserdail_cou_ix` (`courseid`),
  KEY `mdl_statuserdail_use_ix` (`userid`),
  KEY `mdl_statuserdail_rol_ix` (`roleid`),
  KEY `mdl_statuserdail_tim_ix` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To accumulate daily stats per course/user' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_user_daily`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_user_monthly`
--

CREATE TABLE `mdl_stats_user_monthly` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statsreads` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statswrites` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_statusermont_cou_ix` (`courseid`),
  KEY `mdl_statusermont_use_ix` (`userid`),
  KEY `mdl_statusermont_rol_ix` (`roleid`),
  KEY `mdl_statusermont_tim_ix` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To accumulate monthly stats per course/user' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_user_monthly`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_user_weekly`
--

CREATE TABLE `mdl_stats_user_weekly` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statsreads` bigint(10) unsigned NOT NULL DEFAULT '0',
  `statswrites` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_statuserweek_cou_ix` (`courseid`),
  KEY `mdl_statuserweek_use_ix` (`userid`),
  KEY `mdl_statuserweek_rol_ix` (`roleid`),
  KEY `mdl_statuserweek_tim_ix` (`timeend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To accumulate weekly stats per course/user' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_user_weekly`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_stats_weekly`
--

CREATE TABLE `mdl_stats_weekly` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `roleid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stattype` enum('enrolments','activity','logins') NOT NULL DEFAULT 'activity',
  `stat1` bigint(10) unsigned NOT NULL DEFAULT '0',
  `stat2` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_statweek_cou_ix` (`courseid`),
  KEY `mdl_statweek_tim_ix` (`timeend`),
  KEY `mdl_statweek_rol_ix` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To accumulate weekly stats' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_stats_weekly`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_survey`
--

CREATE TABLE `mdl_survey` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `template` bigint(10) unsigned NOT NULL DEFAULT '0',
  `days` mediumint(6) NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `intro` text NOT NULL,
  `questions` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_surv_cou_ix` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Each record is one SURVEY module with its configuration' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mdl_survey`
--

INSERT INTO `mdl_survey` VALUES(1, 0, 0, 0, 985017600, 985017600, 'collesaname', 'collesaintro', '25,26,27,28,29,30,43,44');
INSERT INTO `mdl_survey` VALUES(2, 0, 0, 0, 985017600, 985017600, 'collespname', 'collespintro', '31,32,33,34,35,36,43,44');
INSERT INTO `mdl_survey` VALUES(3, 0, 0, 0, 985017600, 985017600, 'collesapname', 'collesapintro', '37,38,39,40,41,42,43,44');
INSERT INTO `mdl_survey` VALUES(4, 0, 0, 0, 985017600, 985017600, 'attlsname', 'attlsintro', '65,67,68');
INSERT INTO `mdl_survey` VALUES(5, 0, 0, 0, 985017600, 985017600, 'ciqname', 'ciqintro', '69,70,71,72,73');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_survey_analysis`
--

CREATE TABLE `mdl_survey_analysis` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `survey` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_survanal_use_ix` (`userid`),
  KEY `mdl_survanal_sur_ix` (`survey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='text about each survey submission' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_survey_analysis`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_survey_answers`
--

CREATE TABLE `mdl_survey_answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `survey` bigint(10) unsigned NOT NULL DEFAULT '0',
  `question` bigint(10) unsigned NOT NULL DEFAULT '0',
  `time` bigint(10) unsigned NOT NULL DEFAULT '0',
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_survansw_use_ix` (`userid`),
  KEY `mdl_survansw_sur_ix` (`survey`),
  KEY `mdl_survansw_que_ix` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='the answers to each questions filled by the users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_survey_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_survey_questions`
--

CREATE TABLE `mdl_survey_questions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL DEFAULT '',
  `shorttext` varchar(30) NOT NULL DEFAULT '',
  `multi` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(50) NOT NULL DEFAULT '',
  `type` smallint(3) NOT NULL DEFAULT '0',
  `options` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='the questions conforming one survey' AUTO_INCREMENT=74 ;

--
-- Dumping data for table `mdl_survey_questions`
--

INSERT INTO `mdl_survey_questions` VALUES(1, 'colles1', 'colles1short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(2, 'colles2', 'colles2short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(3, 'colles3', 'colles3short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(4, 'colles4', 'colles4short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(5, 'colles5', 'colles5short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(6, 'colles6', 'colles6short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(7, 'colles7', 'colles7short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(8, 'colles8', 'colles8short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(9, 'colles9', 'colles9short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(10, 'colles10', 'colles10short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(11, 'colles11', 'colles11short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(12, 'colles12', 'colles12short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(13, 'colles13', 'colles13short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(14, 'colles14', 'colles14short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(15, 'colles15', 'colles15short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(16, 'colles16', 'colles16short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(17, 'colles17', 'colles17short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(18, 'colles18', 'colles18short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(19, 'colles19', 'colles19short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(20, 'colles20', 'colles20short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(21, 'colles21', 'colles21short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(22, 'colles22', 'colles22short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(23, 'colles23', 'colles23short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(24, 'colles24', 'colles24short', '', '', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(25, 'collesm1', 'collesm1short', '1,2,3,4', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(26, 'collesm2', 'collesm2short', '5,6,7,8', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(27, 'collesm3', 'collesm3short', '9,10,11,12', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(28, 'collesm4', 'collesm4short', '13,14,15,16', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(29, 'collesm5', 'collesm5short', '17,18,19,20', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(30, 'collesm6', 'collesm6short', '21,22,23,24', 'collesmintro', 1, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(31, 'collesm1', 'collesm1short', '1,2,3,4', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(32, 'collesm2', 'collesm2short', '5,6,7,8', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(33, 'collesm3', 'collesm3short', '9,10,11,12', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(34, 'collesm4', 'collesm4short', '13,14,15,16', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(35, 'collesm5', 'collesm5short', '17,18,19,20', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(36, 'collesm6', 'collesm6short', '21,22,23,24', 'collesmintro', 2, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(37, 'collesm1', 'collesm1short', '1,2,3,4', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(38, 'collesm2', 'collesm2short', '5,6,7,8', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(39, 'collesm3', 'collesm3short', '9,10,11,12', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(40, 'collesm4', 'collesm4short', '13,14,15,16', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(41, 'collesm5', 'collesm5short', '17,18,19,20', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(42, 'collesm6', 'collesm6short', '21,22,23,24', 'collesmintro', 3, 'scaletimes5');
INSERT INTO `mdl_survey_questions` VALUES(43, 'howlong', '', '', '', 1, 'howlongoptions');
INSERT INTO `mdl_survey_questions` VALUES(44, 'othercomments', '', '', '', 0, NULL);
INSERT INTO `mdl_survey_questions` VALUES(45, 'attls1', 'attls1short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(46, 'attls2', 'attls2short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(47, 'attls3', 'attls3short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(48, 'attls4', 'attls4short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(49, 'attls5', 'attls5short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(50, 'attls6', 'attls6short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(51, 'attls7', 'attls7short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(52, 'attls8', 'attls8short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(53, 'attls9', 'attls9short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(54, 'attls10', 'attls10short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(55, 'attls11', 'attls11short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(56, 'attls12', 'attls12short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(57, 'attls13', 'attls13short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(58, 'attls14', 'attls14short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(59, 'attls15', 'attls15short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(60, 'attls16', 'attls16short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(61, 'attls17', 'attls17short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(62, 'attls18', 'attls18short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(63, 'attls19', 'attls19short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(64, 'attls20', 'attls20short', '', '', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(65, 'attlsm1', 'attlsm1', '45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64', 'attlsmintro', 1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(66, '-', '-', '-', '-', 0, '-');
INSERT INTO `mdl_survey_questions` VALUES(67, 'attlsm2', 'attlsm2', '63,62,59,57,55,49,52,50,48,47', 'attlsmintro', -1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(68, 'attlsm3', 'attlsm3', '46,54,45,51,60,53,56,58,61,64', 'attlsmintro', -1, 'scaleagree5');
INSERT INTO `mdl_survey_questions` VALUES(69, 'ciq1', 'ciq1short', '', '', 0, NULL);
INSERT INTO `mdl_survey_questions` VALUES(70, 'ciq2', 'ciq2short', '', '', 0, NULL);
INSERT INTO `mdl_survey_questions` VALUES(71, 'ciq3', 'ciq3short', '', '', 0, NULL);
INSERT INTO `mdl_survey_questions` VALUES(72, 'ciq4', 'ciq4short', '', '', 0, NULL);
INSERT INTO `mdl_survey_questions` VALUES(73, 'ciq5', 'ciq5short', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_tag`
--

CREATE TABLE `mdl_tag` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `rawname` varchar(255) NOT NULL DEFAULT '',
  `tagtype` varchar(255) DEFAULT NULL,
  `description` text,
  `descriptionformat` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `flag` smallint(4) unsigned DEFAULT '0',
  `timemodified` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_tag_nam_uix` (`name`),
  KEY `mdl_tag_use_ix` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tag table - this generic table will replace the old "tags" t' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_tag`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_tag_correlation`
--

CREATE TABLE `mdl_tag_correlation` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` bigint(10) unsigned NOT NULL,
  `correlatedtags` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_tagcorr_tag_ix` (`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The rationale for the ''tag_correlation'' table is performance' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_tag_correlation`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_tag_instance`
--

CREATE TABLE `mdl_tag_instance` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` bigint(10) unsigned NOT NULL,
  `itemtype` varchar(255) NOT NULL DEFAULT '',
  `itemid` bigint(10) unsigned NOT NULL,
  `ordering` bigint(10) unsigned DEFAULT NULL,
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_taginst_iteitetag_uix` (`itemtype`,`itemid`,`tagid`),
  KEY `mdl_taginst_tag_ix` (`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tag_instance table holds the information of associations bet' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_tag_instance`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_timezone`
--

CREATE TABLE `mdl_timezone` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `year` bigint(11) NOT NULL DEFAULT '0',
  `tzrule` varchar(20) NOT NULL DEFAULT '',
  `gmtoff` bigint(11) NOT NULL DEFAULT '0',
  `dstoff` bigint(11) NOT NULL DEFAULT '0',
  `dst_month` tinyint(2) NOT NULL DEFAULT '0',
  `dst_startday` smallint(3) NOT NULL DEFAULT '0',
  `dst_weekday` smallint(3) NOT NULL DEFAULT '0',
  `dst_skipweeks` smallint(3) NOT NULL DEFAULT '0',
  `dst_time` varchar(6) NOT NULL DEFAULT '00:00',
  `std_month` tinyint(2) NOT NULL DEFAULT '0',
  `std_startday` smallint(3) NOT NULL DEFAULT '0',
  `std_weekday` smallint(3) NOT NULL DEFAULT '0',
  `std_skipweeks` smallint(3) NOT NULL DEFAULT '0',
  `std_time` varchar(6) NOT NULL DEFAULT '00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Rules for calculating local wall clock time for users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_timezone`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_user`
--

CREATE TABLE `mdl_user` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth` varchar(20) NOT NULL DEFAULT 'manual',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `policyagreed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `mnethostid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `idnumber` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `emailstop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `icq` varchar(15) NOT NULL DEFAULT '',
  `skype` varchar(50) NOT NULL DEFAULT '',
  `yahoo` varchar(50) NOT NULL DEFAULT '',
  `aim` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `phone1` varchar(20) NOT NULL DEFAULT '',
  `phone2` varchar(20) NOT NULL DEFAULT '',
  `institution` varchar(40) NOT NULL DEFAULT '',
  `department` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(70) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `country` varchar(2) NOT NULL DEFAULT '',
  `lang` varchar(30) NOT NULL DEFAULT 'en_utf8',
  `theme` varchar(50) NOT NULL DEFAULT '',
  `timezone` varchar(100) NOT NULL DEFAULT '99',
  `firstaccess` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastaccess` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastlogin` bigint(10) unsigned NOT NULL DEFAULT '0',
  `currentlogin` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(15) NOT NULL DEFAULT '',
  `secret` varchar(15) NOT NULL DEFAULT '',
  `picture` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `mailformat` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `maildigest` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `maildisplay` tinyint(2) unsigned NOT NULL DEFAULT '2',
  `htmleditor` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ajax` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `autosubscribe` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `trackforums` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `trustbitmask` bigint(10) unsigned NOT NULL DEFAULT '0',
  `imagealt` varchar(255) DEFAULT NULL,
  `screenreader` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_user_mneuse_uix` (`mnethostid`,`username`),
  KEY `mdl_user_del_ix` (`deleted`),
  KEY `mdl_user_con_ix` (`confirmed`),
  KEY `mdl_user_fir_ix` (`firstname`),
  KEY `mdl_user_las_ix` (`lastname`),
  KEY `mdl_user_cit_ix` (`city`),
  KEY `mdl_user_cou_ix` (`country`),
  KEY `mdl_user_las2_ix` (`lastaccess`),
  KEY `mdl_user_ema_ix` (`email`),
  KEY `mdl_user_aut_ix` (`auth`),
  KEY `mdl_user_idn_ix` (`idnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='One record for each person' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdl_user`
--

INSERT INTO `mdl_user` VALUES(1, 'manual', 1, 0, 0, 1, 'guest', '1e3b35e3b4fb146bee15730d54722c5c', '', 'Guest User', ' ', 'root@localhost', 0, '', '', '', '', '', '', '', '', '', '', '', '', 'en_utf8', '', '99', 0, 0, 0, 0, '', '', 0, '', 'This user is a special user that allows read-only access to some courses.', 1, 0, 2, 1, 1, 1, 0, 1343876477, 0, NULL, 0);
INSERT INTO `mdl_user` VALUES(2, 'manual', 1, 0, 0, 1, 'admin', 'df9d1412f7d891d15910779c38c307ef', '', 'Admin', 'Diklat', 'admin@local.net', 0, '', '', '', '', '', '', '', '', '', '', 'Bogor', 'ID', 'en_utf8', '', '99', 1343876519, 1344234185, 1344018304, 1344226891, '0.0.0.0', '', 0, '', '', 1, 0, 0, 1, 1, 1, 0, 1343876519, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_info_category`
--

CREATE TABLE `mdl_user_info_category` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customisable fields categories' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_user_info_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_info_data`
--

CREATE TABLE `mdl_user_info_data` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `fieldid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `data` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_userinfodata_usefie_ix` (`userid`,`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Data for the customisable user fields' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_user_info_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_info_field`
--

CREATE TABLE `mdl_user_info_field` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(255) NOT NULL DEFAULT 'shortname',
  `name` longtext NOT NULL,
  `datatype` varchar(255) NOT NULL DEFAULT '',
  `description` longtext,
  `categoryid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `sortorder` bigint(10) unsigned NOT NULL DEFAULT '0',
  `required` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `locked` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `visible` smallint(4) unsigned NOT NULL DEFAULT '0',
  `forceunique` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `signup` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `defaultdata` longtext,
  `param1` longtext,
  `param2` longtext,
  `param3` longtext,
  `param4` longtext,
  `param5` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customisable user profile fields' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_user_info_field`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_lastaccess`
--

CREATE TABLE `mdl_user_lastaccess` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `courseid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeaccess` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_userlast_usecou_uix` (`userid`,`courseid`),
  KEY `mdl_userlast_use_ix` (`userid`),
  KEY `mdl_userlast_cou_ix` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='To keep track of course page access times, used in online pa' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `mdl_user_lastaccess`
--

INSERT INTO `mdl_user_lastaccess` VALUES(2, 2, 3, 1343994856);
INSERT INTO `mdl_user_lastaccess` VALUES(3, 2, 4, 1343936264);
INSERT INTO `mdl_user_lastaccess` VALUES(4, 2, 5, 1344226944);
INSERT INTO `mdl_user_lastaccess` VALUES(5, 2, 6, 1343936347);
INSERT INTO `mdl_user_lastaccess` VALUES(6, 2, 7, 1344091933);
INSERT INTO `mdl_user_lastaccess` VALUES(7, 2, 8, 1344089471);
INSERT INTO `mdl_user_lastaccess` VALUES(8, 2, 9, 1343937372);
INSERT INTO `mdl_user_lastaccess` VALUES(9, 2, 10, 1343937183);
INSERT INTO `mdl_user_lastaccess` VALUES(10, 2, 11, 1343937207);
INSERT INTO `mdl_user_lastaccess` VALUES(11, 2, 12, 1344089180);
INSERT INTO `mdl_user_lastaccess` VALUES(12, 2, 13, 1343937243);
INSERT INTO `mdl_user_lastaccess` VALUES(13, 2, 14, 1343937262);
INSERT INTO `mdl_user_lastaccess` VALUES(14, 2, 15, 1343937283);
INSERT INTO `mdl_user_lastaccess` VALUES(15, 2, 16, 1343937298);
INSERT INTO `mdl_user_lastaccess` VALUES(16, 2, 17, 1343937315);
INSERT INTO `mdl_user_lastaccess` VALUES(17, 2, 18, 1343937330);
INSERT INTO `mdl_user_lastaccess` VALUES(18, 2, 19, 1343937346);
INSERT INTO `mdl_user_lastaccess` VALUES(19, 2, 20, 1343937366);
INSERT INTO `mdl_user_lastaccess` VALUES(20, 2, 21, 1343937391);
INSERT INTO `mdl_user_lastaccess` VALUES(21, 2, 22, 1343937411);
INSERT INTO `mdl_user_lastaccess` VALUES(22, 2, 23, 1343937472);
INSERT INTO `mdl_user_lastaccess` VALUES(23, 2, 24, 1343937488);
INSERT INTO `mdl_user_lastaccess` VALUES(24, 2, 25, 1343937529);
INSERT INTO `mdl_user_lastaccess` VALUES(25, 2, 26, 1343937557);
INSERT INTO `mdl_user_lastaccess` VALUES(26, 2, 27, 1343937579);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_preferences`
--

CREATE TABLE `mdl_user_preferences` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_userpref_usenam_uix` (`userid`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Allows modules to store arbitrary user preferences' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mdl_user_preferences`
--

INSERT INTO `mdl_user_preferences` VALUES(1, 2, 'auth_forcepasswordchange', '0');
INSERT INTO `mdl_user_preferences` VALUES(2, 2, 'email_bounce_count', '1');
INSERT INTO `mdl_user_preferences` VALUES(3, 2, 'email_send_count', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_user_private_key`
--

CREATE TABLE `mdl_user_private_key` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `script` varchar(128) NOT NULL DEFAULT '',
  `value` varchar(128) NOT NULL DEFAULT '',
  `userid` bigint(10) unsigned NOT NULL,
  `instance` bigint(10) unsigned DEFAULT NULL,
  `iprestriction` varchar(255) DEFAULT NULL,
  `validuntil` bigint(10) unsigned DEFAULT NULL,
  `timecreated` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_userprivkey_scrval_ix` (`script`,`value`),
  KEY `mdl_userprivkey_use_ix` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='access keys used in cookieless scripts - rss, etc.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_user_private_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_webdav_locks`
--

CREATE TABLE `mdl_webdav_locks` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `expiry` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `recursive` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `exclusivelock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` bigint(10) unsigned NOT NULL DEFAULT '0',
  `modified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `owner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_webdlock_tok_uix` (`token`),
  KEY `mdl_webdlock_pat_ix` (`path`),
  KEY `mdl_webdlock_exp_ix` (`expiry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Resource locks for WebDAV users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_webdav_locks`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_wiki`
--

CREATE TABLE `mdl_wiki` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `pagename` varchar(255) NOT NULL DEFAULT '',
  `wtype` enum('teacher','group','student') NOT NULL DEFAULT 'group',
  `ewikiprinttitle` smallint(4) unsigned NOT NULL DEFAULT '1',
  `htmlmode` smallint(4) unsigned NOT NULL DEFAULT '0',
  `ewikiacceptbinary` smallint(4) unsigned NOT NULL DEFAULT '0',
  `disablecamelcase` smallint(4) unsigned NOT NULL DEFAULT '0',
  `setpageflags` smallint(4) unsigned NOT NULL DEFAULT '1',
  `strippages` smallint(4) unsigned NOT NULL DEFAULT '1',
  `removepages` smallint(4) unsigned NOT NULL DEFAULT '1',
  `revertchanges` smallint(4) unsigned NOT NULL DEFAULT '1',
  `initialcontent` varchar(255) NOT NULL DEFAULT '',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_wiki_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Main wik table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_wiki`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_wiki_entries`
--

CREATE TABLE `mdl_wiki_entries` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `wikiid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `groupid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `pagename` varchar(255) NOT NULL DEFAULT '',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_wikientr_cou_ix` (`course`),
  KEY `mdl_wikientr_gro_ix` (`groupid`),
  KEY `mdl_wikientr_use_ix` (`userid`),
  KEY `mdl_wikientr_pag_ix` (`pagename`),
  KEY `mdl_wikientr_wik_ix` (`wikiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Holds entries for each wiki start instance' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_wiki_entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_wiki_locks`
--

CREATE TABLE `mdl_wiki_locks` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `wikiid` bigint(10) unsigned NOT NULL,
  `pagename` varchar(160) NOT NULL DEFAULT '',
  `lockedby` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lockedsince` bigint(10) unsigned NOT NULL DEFAULT '0',
  `lockedseen` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_wikilock_wikpag_uix` (`wikiid`,`pagename`),
  KEY `mdl_wikilock_loc_ix` (`lockedseen`),
  KEY `mdl_wikilock_wik_ix` (`wikiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores editing locks on Wiki pages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_wiki_locks`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_wiki_pages`
--

CREATE TABLE `mdl_wiki_pages` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `pagename` varchar(160) NOT NULL DEFAULT '',
  `version` bigint(10) unsigned NOT NULL DEFAULT '0',
  `flags` bigint(10) unsigned DEFAULT '0',
  `content` mediumtext,
  `author` varchar(100) DEFAULT 'ewiki',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `created` bigint(10) unsigned DEFAULT '0',
  `lastmodified` bigint(10) unsigned DEFAULT '0',
  `refs` mediumtext,
  `meta` mediumtext,
  `hits` bigint(10) unsigned DEFAULT '0',
  `wiki` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mdl_wikipage_pagverwik_uix` (`pagename`,`version`,`wiki`),
  KEY `mdl_wikipage_wik_ix` (`wiki`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Holds the Wiki-Pages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_wiki_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop`
--

CREATE TABLE `mdl_workshop` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `course` bigint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `wtype` smallint(3) unsigned NOT NULL DEFAULT '0',
  `nelements` smallint(3) unsigned NOT NULL DEFAULT '1',
  `nattachments` smallint(3) unsigned NOT NULL DEFAULT '0',
  `phase` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `format` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `gradingstrategy` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `resubmit` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `agreeassessments` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `hidegrades` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `anonymous` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `includeself` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `maxbytes` bigint(10) unsigned NOT NULL DEFAULT '100000',
  `submissionstart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assessmentstart` bigint(10) unsigned NOT NULL DEFAULT '0',
  `submissionend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assessmentend` bigint(10) unsigned NOT NULL DEFAULT '0',
  `releasegrades` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` smallint(3) NOT NULL DEFAULT '0',
  `gradinggrade` smallint(3) NOT NULL DEFAULT '0',
  `ntassessments` smallint(3) unsigned NOT NULL DEFAULT '0',
  `assessmentcomps` smallint(3) unsigned NOT NULL DEFAULT '2',
  `nsassessments` smallint(3) unsigned NOT NULL DEFAULT '0',
  `overallocation` smallint(3) unsigned NOT NULL DEFAULT '0',
  `timemodified` bigint(10) unsigned NOT NULL DEFAULT '0',
  `teacherweight` smallint(3) unsigned NOT NULL DEFAULT '1',
  `showleaguetable` smallint(3) unsigned NOT NULL DEFAULT '0',
  `usepassword` smallint(3) unsigned NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mdl_work_cou_ix` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines workshop' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_assessments`
--

CREATE TABLE `mdl_workshop_assessments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `submissionid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timegraded` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timeagreed` bigint(10) unsigned NOT NULL DEFAULT '0',
  `grade` double NOT NULL DEFAULT '0',
  `gradinggrade` smallint(3) NOT NULL DEFAULT '0',
  `teachergraded` smallint(3) unsigned NOT NULL DEFAULT '0',
  `mailed` smallint(3) unsigned NOT NULL DEFAULT '0',
  `resubmission` smallint(3) unsigned NOT NULL DEFAULT '0',
  `donotuse` smallint(3) unsigned NOT NULL DEFAULT '0',
  `generalcomment` text,
  `teachercomment` text,
  PRIMARY KEY (`id`),
  KEY `mdl_workasse_use_ix` (`userid`),
  KEY `mdl_workasse_mai_ix` (`mailed`),
  KEY `mdl_workasse_wor_ix` (`workshopid`),
  KEY `mdl_workasse_sub_ix` (`submissionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about assessments by teacher and students' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_assessments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_comments`
--

CREATE TABLE `mdl_workshop_comments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assessmentid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mailed` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_workcomm_use_ix` (`userid`),
  KEY `mdl_workcomm_mai_ix` (`mailed`),
  KEY `mdl_workcomm_wor_ix` (`workshopid`),
  KEY `mdl_workcomm_ass_ix` (`assessmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines comments' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_elements`
--

CREATE TABLE `mdl_workshop_elements` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `elementno` smallint(3) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `scale` smallint(3) unsigned NOT NULL DEFAULT '0',
  `maxscore` smallint(3) unsigned NOT NULL DEFAULT '1',
  `weight` smallint(3) unsigned NOT NULL DEFAULT '11',
  `stddev` double NOT NULL DEFAULT '0',
  `totalassessments` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_workelem_wor_ix` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about marking scheme of assignment' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_elements`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_grades`
--

CREATE TABLE `mdl_workshop_grades` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `assessmentid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `elementno` bigint(10) unsigned NOT NULL DEFAULT '0',
  `feedback` text NOT NULL,
  `grade` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_workgrad_wor_ix` (`workshopid`),
  KEY `mdl_workgrad_ass_ix` (`assessmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about individual grades given to each element' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_grades`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_rubrics`
--

CREATE TABLE `mdl_workshop_rubrics` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `elementno` bigint(10) unsigned NOT NULL DEFAULT '0',
  `rubricno` smallint(3) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_workrubr_wor_ix` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about the rubrics marking scheme' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_rubrics`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_stockcomments`
--

CREATE TABLE `mdl_workshop_stockcomments` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `elementno` bigint(10) unsigned NOT NULL DEFAULT '0',
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_workstoc_wor_ix` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about the teacher comment bank' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_stockcomments`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdl_workshop_submissions`
--

CREATE TABLE `mdl_workshop_submissions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `workshopid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `mailed` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `gradinggrade` smallint(3) unsigned NOT NULL DEFAULT '0',
  `finalgrade` smallint(3) unsigned NOT NULL DEFAULT '0',
  `late` smallint(3) unsigned NOT NULL DEFAULT '0',
  `nassessments` bigint(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mdl_worksubm_use_ix` (`userid`),
  KEY `mdl_worksubm_mai_ix` (`mailed`),
  KEY `mdl_worksubm_wor_ix` (`workshopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info about submitted work from teacher and students' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdl_workshop_submissions`
--

