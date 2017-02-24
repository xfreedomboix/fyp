-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 06:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `comment` varchar(3000) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `username`, `title`, `comment`, `date`) VALUES
(15, 'Isaac', 'Class announcement 2/6', 'Class cancel on next week monday!', '2017-02-05'),
(16, 'Isaac', 'Replacement class 2/8', 'On coming wednesday 8pm night\r\nVenue to be announced', '2017-02-05'),
(17, 'Isaac', 'Quiz 3 uploaded!', 'Quiz 3 is uploaded,\r\nyou can now try it out under assessment tab.\r\nThank you', '2017-02-05'),
(18, 'Isaac', 'Rewards', 'Congratulates to Boon for having the highest login time and marks on January. Please come to my office to collect your reward', '2017-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('589781fcc6d25', '589781fcc9b1d'),
('589781fccf1b4', '589781fccf9a1'),
('589781fcd4510', '589781fcd5e83'),
('589781fcd9d6c', '589781fcda57b'),
('589781fce1890', '589781fce226c'),
('589781fce4f34', '589781fce58cb'),
('589781fce8b26', '589781fce934c'),
('589781fcebf78', '589781fcec806'),
('589781fcf12dc', '589781fcf1ad0'),
('589781fd0028c', '589781fd00af9'),
('589783ca581cc', '589783ca58c24'),
('589783ca5da1e', '589783ca5e2ed'),
('589783ca61a1d', '589783ca63daa'),
('589783ca677d9', '589783ca68f3c'),
('589783ca6b84e', '589783ca6c05d');

-- --------------------------------------------------------

--
-- Table structure for table `answer_record`
--

CREATE TABLE `answer_record` (
  `ses_id` varchar(255) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `qid` varchar(255) NOT NULL,
  `userans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `UserID` int(11) NOT NULL,
  `badge_id` int(5) NOT NULL,
  `badge_path` varchar(255) NOT NULL,
  `badge_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`UserID`, `badge_id`, `badge_path`, `badge_name`) VALUES
(1132701346, 1, 'top1mark.png', 'Top 1 Monthly Assessment Score'),
(1132701346, 2, 'top1login.png', 'Top 1 Monthly Login Time');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_time`, `page`) VALUES
(19, 'Boon', 'haha', '2017-01-05 18:12:18', '1'),
(20, 'Boon', 'hahaha', '2017-01-05 18:38:33', ''),
(21, 'Boon', 'lol', '2017-01-05 18:56:35', ''),
(22, 'Boon', 'hi', '2017-01-14 19:04:15', ''),
(23, 'Boon', 'work plz', '2017-01-14 19:06:34', 'lolxd'),
(26, 'Chew Yee Jian', 'hi', '2017-01-14 19:12:38', '/index1.php'),
(27, 'Boon', 'haha', '2017-01-17 15:27:19', '/dcn_1.1.php'),
(28, 'Boon', 'not bad uh this shit', '2017-01-17 15:33:27', '/dcn_1.1.php'),
(29, 'Boon', 'hahaha', '2017-01-18 07:05:23', '/dcn_1.0.php'),
(30, 'Boon', 'The guy in the video made some really good points. To top it off, he has a really nice voice too!', '2017-02-05 10:24:05', '/dcn_1.9.php'),
(31, 'Boon', 'haha', '2017-02-08 05:18:40', '/dcn_1.5.php');

-- --------------------------------------------------------

--
-- Table structure for table `dcn`
--

CREATE TABLE `dcn` (
  `chap` int(2) NOT NULL,
  `chap_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dcn`
--

INSERT INTO `dcn` (`chap`, `chap_name`) VALUES
(1, 'Introduction to DCN'),
(2, 'Transmission Media'),
(3, 'Data Communication Interface\r\n'),
(99, 'Lecturer Uploaded PDFs');

-- --------------------------------------------------------

--
-- Table structure for table `dcn_1`
--

CREATE TABLE `dcn_1` (
  `subchap` double(2,1) NOT NULL,
  `subchap_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dcn_1`
--

INSERT INTO `dcn_1` (`subchap`, `subchap_name`) VALUES
(1.0, 'Objectives'),
(1.1, 'Data Communications'),
(1.2, 'Networks'),
(1.3, 'Network Types'),
(1.4, 'TCP/IP Protocol Suite'),
(1.5, 'OSI Model'),
(1.9, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `dcn_2`
--

CREATE TABLE `dcn_2` (
  `subchap` double(2,1) NOT NULL,
  `subchap_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dcn_2`
--

INSERT INTO `dcn_2` (`subchap`, `subchap_name`) VALUES
(2.0, 'Outline'),
(2.1, 'Introduction'),
(2.2, 'Guided Media'),
(2.3, 'Unguided Media'),
(2.9, 'Videos');

-- --------------------------------------------------------

--
-- Table structure for table `dcn_3`
--

CREATE TABLE `dcn_3` (
  `subchap` double(2,1) NOT NULL,
  `subchap_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dcn_3`
--

INSERT INTO `dcn_3` (`subchap`, `subchap_name`) VALUES
(3.0, 'Outline'),
(3.1, 'Digital Transmission Modes'),
(3.2, 'Line Configurations'),
(3.3, 'DTE-DCE Interface\r\n'),
(3.4, 'Modems'),
(3.9, 'Videos');

-- --------------------------------------------------------

--
-- Table structure for table `dcn_99`
--

CREATE TABLE `dcn_99` (
  `subchap` int(2) NOT NULL,
  `subchap_name` varchar(255) NOT NULL,
  `pdfdescp` varchar(255) NOT NULL,
  `pdfpath` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dcn_99`
--

INSERT INTO `dcn_99` (`subchap`, `subchap_name`, `pdfdescp`, `pdfpath`, `UserID`) VALUES
(2, 'pdf number one', 'I think this description describe what the pdf contains lol xD', '38437.pdf', 1132701345),
(3, 'pdf number two', 'haha', '39403.pdf', 1132701345);

-- --------------------------------------------------------

--
-- Table structure for table `frei_banned_users`
--

CREATE TABLE `frei_banned_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `frei_chat`
--

CREATE TABLE `frei_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` double(15,4) NOT NULL,
  `GMT_time` bigint(20) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frei_chat`
--

INSERT INTO `frei_chat` (`id`, `from`, `from_name`, `to`, `to_name`, `message`, `sent`, `recd`, `time`, `GMT_time`, `message_type`, `room_id`) VALUES
(1, 1132701345, 'Isaac (Lecturer)', 1132701346, 'Boon', 'hi', '2016-12-22 22:55:18', 1, 14824473180.5864, 1482418518576, 0, -1),
(2, 1132701346, 'Boon', 1132701345, 'Isaac (Lecturer)', 'hi', '2016-12-22 22:55:25', 1, 14824473250.4890, 1482418525472, 0, -1),
(3, 1132701346, 'Boon', 1132701116, 'Chew Yee Jian', 'yo gay', '2016-12-23 12:24:22', 1, 14824958620.5062, 1482467062498, 0, -1),
(4, 1132701116, 'Chew Yee Jian', 1132701346, 'Boon', 'hi fuck', '2016-12-23 12:24:30', 1, 14824958700.5876, 1482467070577, 0, -1),
(5, 1132701345, 'Isaac (Lecturer)', 1132701346, 'Boon', 'yo', '2017-01-17 10:04:40', 1, 14846474800.4752, 1484618680467, 0, -1),
(6, 1132701346, 'Boon', 1132701345, 'Isaac (Lecturer)', 'hi', '2017-01-17 10:04:45', 1, 14846474850.6853, 1484618685670, 0, -1),
(7, 1132701345, 'Isaac (Lecturer)', 1132701346, 'Boon', 'hey', '2017-02-01 17:39:05', 1, 14859707450.4551, 1485941945445, 0, -1),
(8, 1132701346, 'Boon', 1132701345, 'Isaac (Lecturer)', 'wazzzap', '2017-02-01 17:39:16', 1, 14859707560.5718, 1485941956562, 0, -1),
(9, 1132701346, 'Boon', 1132701345, 'Isaac (Lecturer)', 'hey', '2017-02-04 09:47:43', 1, 14862016630.3027, 1486172863282, 0, -1),
(10, 1132701345, 'Isaac (Lecturer)', 1132701346, 'Boon', 'Hello', '2017-02-06 05:18:29', 1, 14863583090.0074, 1486329508999, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `frei_config`
--

CREATE TABLE `frei_config` (
  `id` int(11) NOT NULL,
  `key` varchar(30) DEFAULT 'NULL',
  `cat` varchar(20) DEFAULT 'NULL',
  `subcat` varchar(20) DEFAULT 'NULL',
  `val` varchar(500) DEFAULT 'NULL'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frei_config`
--

INSERT INTO `frei_config` (`id`, `key`, `cat`, `subcat`, `val`) VALUES
(1, 'PATH', 'NULL', 'NULL', 'freichat/'),
(2, 'show_name', 'NULL', 'NULL', 'guest'),
(3, 'displayname', 'NULL', 'NULL', 'username'),
(4, 'chatspeed', 'NULL', 'NULL', '5000'),
(5, 'fxval', 'NULL', 'NULL', 'true'),
(6, 'draggable', 'NULL', 'NULL', 'enable'),
(7, 'conflict', 'NULL', 'NULL', ''),
(8, 'msgSendSpeed', 'NULL', 'NULL', '1000'),
(9, 'show_avatar', 'NULL', 'NULL', 'block'),
(10, 'debug', 'NULL', 'NULL', 'false'),
(11, 'freichat_theme', 'NULL', 'NULL', 'basic'),
(12, 'lang', 'NULL', 'NULL', 'english'),
(13, 'load', 'NULL', 'NULL', 'show'),
(14, 'time', 'NULL', 'NULL', '7'),
(15, 'JSdebug', 'NULL', 'NULL', 'false'),
(16, 'busy_timeOut', 'NULL', 'NULL', '500'),
(17, 'offline_timeOut', 'NULL', 'NULL', '1000'),
(18, 'cache', 'NULL', 'NULL', 'enabled'),
(19, 'GZIP_handler', 'NULL', 'NULL', 'ON'),
(20, 'plugins', 'file_sender', 'show', 'true'),
(21, 'plugins', 'file_sender', 'file_size', '2000'),
(22, 'plugins', 'file_sender', 'expiry', '300'),
(23, 'plugins', 'file_sender', 'valid_exts', 'jpeg,jpg,png,gif,zip'),
(24, 'plugins', 'send_conv', 'show', 'true'),
(25, 'plugins', 'send_conv', 'mailtype', 'smtp'),
(26, 'plugins', 'send_conv', 'smtp_server', 'smtp.gmail.com'),
(27, 'plugins', 'send_conv', 'smtp_port', '465'),
(28, 'plugins', 'send_conv', 'smtp_protocol', 'ssl'),
(29, 'plugins', 'send_conv', 'from_address', 'you@domain.com'),
(30, 'plugins', 'send_conv', 'from_name', 'FreiChat'),
(31, 'playsound', 'NULL', 'NULL', 'true'),
(32, 'ACL', 'filesend', 'user', 'allow'),
(33, 'ACL', 'filesend', 'guest', 'noallow'),
(34, 'ACL', 'chatroom', 'user', 'allow'),
(35, 'ACL', 'chatroom', 'guest', 'allow'),
(36, 'ACL', 'mail', 'user', 'allow'),
(37, 'ACL', 'mail', 'guest', 'allow'),
(38, 'ACL', 'save', 'user', 'allow'),
(39, 'ACL', 'save', 'guest', 'allow'),
(40, 'ACL', 'smiley', 'user', 'allow'),
(41, 'ACL', 'smiley', 'guest', 'allow'),
(42, 'polling', 'NULL', 'NULL', 'disabled'),
(43, 'polling_time', 'NULL', 'NULL', '30'),
(44, 'link_profile', 'NULL', 'NULL', 'disabled'),
(46, 'sef_link_profile', 'NULL', 'NULL', 'disabled'),
(47, 'plugins', 'chatroom', 'location', 'left'),
(48, 'plugins', 'chatroom', 'autoclose', 'true'),
(49, 'content_height', 'NULL', 'NULL', '200px'),
(50, 'chatbox_status', 'NULL', 'NULL', 'false'),
(51, 'BOOT', 'NULL', 'NULL', 'yes'),
(52, 'exit_for_guests', 'NULL', 'NULL', 'no'),
(53, 'plugins', 'chatroom', 'offset', '50px'),
(54, 'plugins', 'chatroom', 'label_offset', '0.8%'),
(55, 'addedoptions_visibility', 'NULL', 'NULL', 'HIDDEN'),
(56, 'ug_ids', 'NULL', 'NULL', ''),
(57, 'ACL', 'chat', 'user', 'allow'),
(58, 'ACL', 'chat', 'guest', 'allow'),
(59, 'plugins', 'chatroom', 'override_positions', 'yes'),
(60, 'ACL', 'video', 'user', 'allow'),
(61, 'ACL', 'video', 'guest', 'allow'),
(62, 'ACL', 'chatroom_crt', 'user', 'allow'),
(63, 'ACL', 'chatroom_crt', 'guest', 'noallow'),
(64, 'plugins', 'chatroom', 'chatroom_expiry', '3600'),
(65, 'chat_time_shown_always', 'NULL', 'NULL', 'no'),
(66, 'allow_guest_name_change', 'NULL', 'NULL', 'yes'),
(67, 'ACL', 'groupchat', 'user', 'allow'),
(68, 'ACL', 'groupchat', 'guest', 'noallow');

-- --------------------------------------------------------

--
-- Table structure for table `frei_groupchat`
--

CREATE TABLE `frei_groupchat` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `group_author` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `group_created` int(11) NOT NULL,
  `group_participants` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frei_rooms`
--

CREATE TABLE `frei_rooms` (
  `id` int(11) NOT NULL,
  `room_author` varchar(100) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` tinyint(4) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `room_created` int(11) NOT NULL,
  `room_last_active` int(11) NOT NULL,
  `room_order` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frei_rooms`
--

INSERT INTO `frei_rooms` (`id`, `room_author`, `room_name`, `room_type`, `room_password`, `room_created`, `room_last_active`, `room_order`) VALUES
(1, 'admin', 'Fun Talk', 0, '', 1373557250, 1373557250, 1),
(2, 'admin', 'Crazy chat', 0, '', 1373557260, 1373557260, 5),
(3, 'admin', 'Think out loud', 0, '', 1373557872, 1373557872, 2),
(4, 'admin', 'Talk to me ', 0, '', 1373558017, 1373558017, 3),
(5, 'admin', 'Talk innovative', 0, '', 1373558039, 1373799404, 4);

-- --------------------------------------------------------

--
-- Table structure for table `frei_session`
--

CREATE TABLE `frei_session` (
  `id` int(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frei_session`
--

INSERT INTO `frei_session` (`id`, `username`, `time`, `session_id`, `permanent_id`, `status`, `status_mesg`, `guest`, `in_room`) VALUES
(164, 'Boon', 1486532436, '1132701346', 1486855804, 1, 'I am available', 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `frei_smileys`
--

CREATE TABLE `frei_smileys` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frei_smileys`
--

INSERT INTO `frei_smileys` (`id`, `symbol`, `image_name`) VALUES
(1, ':S', 'worried55231.gif'),
(2, '(wasntme)', 'itwasntme55198.gif'),
(3, 'x(', 'angry55174.gif'),
(4, '(doh)', 'doh55146.gif'),
(5, '|-()', 'yawn55117.gif'),
(6, ']:)', 'evilgrin55088.gif'),
(7, '|(', 'dull55062.gif'),
(8, '|-)', 'sleepy55036.gif'),
(9, '(blush)', 'blush54981.gif'),
(10, ':P', 'tongueout54953.gif'),
(11, '(:|', 'sweat54888.gif'),
(12, ';(', 'crying54854.gif'),
(13, ':)', 'smile54593.gif'),
(14, ':(', 'sad54749.gif'),
(15, ':D', 'bigsmile54781.gif'),
(16, '8)', 'cool54801.gif'),
(17, ':o', 'wink54827.gif'),
(18, '(mm)', 'mmm55255.gif'),
(19, ':x', 'lipssealed55304.gif');

-- --------------------------------------------------------

--
-- Table structure for table `frei_video_session`
--

CREATE TABLE `frei_video_session` (
  `id` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL COMMENT 'unique room id',
  `from_id` int(11) NOT NULL,
  `msg_type` varchar(10) NOT NULL,
  `msg_label` int(2) NOT NULL,
  `msg_data` varchar(3000) NOT NULL,
  `msg_time` decimal(15,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `frei_webrtc`
--

CREATE TABLE `frei_webrtc` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `UserID` int(11) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`UserID`, `eid`, `score`, `level`, `correct`, `wrong`, `date`) VALUES
(1132701346, '5897822544d88', 80, 5, 4, 1, '2017-02-06 05:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `identity` varchar(15) NOT NULL DEFAULT 'student',
  `totallog` double(100,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) NOT NULL,
  `mid` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `experience` int(4) NOT NULL,
  `level` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`UserID`, `Username`, `name`, `Password`, `email`, `identity`, `totallog`, `image`, `mid`, `gold`, `lastlogin`, `experience`, `level`) VALUES
(1132700000, 'Nicholas Lee', 'Nicholas Lee', '2a4a598478cc5e4f18637240590e9dbc', 'Leenico@hotmail.com', 'student', 0.00, '', 0, 0, '2017-02-04 14:45:38', 0, 1),
(1132701116, 'Chew Yee Jian', 'Chew Yee Jian', '2a4a598478cc5e4f18637240590e9dbc', 'chewchew@hotmail.com', 'student', 1302.12, 'dota___lina_inverse_by_yukionetwo-dapl03x.png', 0, 21, '2017-02-05 10:25:00', 0, 1),
(1132701333, 'testuser', 'testuser', '2a4a598478cc5e4f18637240590e9dbc', 'testtest@hotmail.com', 'student', 0.03, '', 0, 0, '2017-02-04 14:45:15', 0, 1),
(1132701343, 'Yee', 'Yee', '2a4a598478cc5e4f18637240590e9dbc', 'Yee@hotmail.com', 'student', 0.13, '', 0, 0, '2017-02-05 18:30:29', 0, 1),
(1132701344, 'Yao Yao', 'Yao Yao', '2a4a598478cc5e4f18637240590e9dbc', 'yao@hotmail.com', 'student', 9.25, '', 0, 9, '2017-02-05 15:49:35', 18, 1),
(1132701345, 'Isaac', 'Isaac (Lecturer)', '2a4a598478cc5e4f18637240590e9dbc', 'lol@email.com', 'teacher', 1223.87, '314606.jpg', 0, 637, '2017-02-08 05:50:13', 846, 1),
(1132701346, 'Boon', 'Boon', '2a4a598478cc5e4f18637240590e9dbc', 'boon_oby@hotmail.com', 'student', 12059.63, '192748.jpg', 1, 1465, '2017-02-07 21:46:12', 2, 4),
(1132701983, 'tan her ann', 'tan her ann', '2a4a598478cc5e4f18637240590e9dbc', 'ann@hotmail.com', 'student', 0.00, '', 0, 0, '2017-02-04 14:45:15', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `musicpurchase`
--

CREATE TABLE `musicpurchase` (
  `UserID` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musicpurchase`
--

INSERT INTO `musicpurchase` (`UserID`, `mid`, `mname`, `date`) VALUES
(1132701346, 1, 'Sad Music', '2017-02-01 20:11:57'),
(1132701346, 2, 'Relaxing Music', '2017-02-07 21:45:15'),
(1132701346, 4, 'Music Pack 2', '2017-02-04 09:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `music_db`
--

CREATE TABLE `music_db` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music_db`
--

INSERT INTO `music_db` (`id`, `name`, `path`, `price`) VALUES
(1, 'Sad Music', 'music/1.m4a', 500),
(2, 'Relaxing music', 'music/2.m4a', 600),
(3, 'Music Pack 1', 'music/3.m4a', 700),
(4, 'Music Pack 2', 'music/4.m4a', 600);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('589781fcc6d25', 'To talk', '589781fcc9b11'),
('589781fcc6d25', 'To send data', '589781fcc9b1a'),
('589781fcc6d25', 'To share information', '589781fcc9b1d'),
('589781fcc6d25', 'To listen', '589781fcc9b1e'),
('589781fccf1b4', 'Rule', '589781fccf9a1'),
('589781fccf1b4', 'Message', '589781fccf9a4'),
('589781fccf1b4', 'Sender', '589781fccf9a5'),
('589781fccf1b4', 'Transmission Medium', '589781fccf9a7'),
('589781fcd4510', 'Simplex', '589781fcd5e7c'),
('589781fcd4510', 'Full-duplex', '589781fcd5e81'),
('589781fcd4510', 'Half-duplex', '589781fcd5e82'),
('589781fcd4510', 'None of the above', '589781fcd5e83'),
('589781fcd9d6c', 'The interconnection of a set of devices capable of communication. ', '589781fcda57b'),
('589781fcd9d6c', 'Gateway to internet.', '589781fcda57e'),
('589781fcd9d6c', 'Connection to a device.', '589781fcda580'),
('589781fcd9d6c', 'The internet.', '589781fcda581'),
('589781fce1890', 'Reliability', '589781fce2266'),
('589781fce1890', 'Performance', '589781fce2269'),
('589781fce1890', 'Security', '589781fce226a'),
('589781fce1890', 'All of the above', '589781fce226c'),
('589781fce4f34', 'A LAN is normally limited in size; a WAN has a wider geographical span', '589781fce58c6'),
('589781fce4f34', 'A LAN is normally privately owned by the organization that uses it', '589781fce58c8'),
('589781fce4f34', 'A LAN interconnects hosts; a WAN interconnects connecting devices', '589781fce58c9'),
('589781fce4f34', 'A LAN interconnects many WANs together', '589781fce58cb'),
('589781fce8b26', 'Internet (uppercase i)', '589781fce934c'),
('589781fce8b26', 'internet (undercase i)', '589781fce9350'),
('589781fce8b26', 'Network', '589781fce9352'),
('589781fce8b26', 'LAN', '589781fce9353'),
('589781fcebf78', 'Physical', '589781fcec802'),
('589781fcebf78', 'Presentation', '589781fcec806'),
('589781fcebf78', 'Data Link', '589781fcec809'),
('589781fcebf78', 'Application', '589781fcec80b'),
('589781fcf12dc', 'Switch', '589781fcf1abe'),
('589781fcf12dc', 'Modem', '589781fcf1acd'),
('589781fcf12dc', 'Hub', '589781fcf1ad0'),
('589781fcf12dc', 'Router', '589781fcf1ad2'),
('589781fd0028c', 'Presentation', '589781fd00af3'),
('589781fd0028c', 'Application', '589781fd00af6'),
('589781fd0028c', 'Session', '589781fd00af7'),
('589781fd0028c', 'A and C', '589781fd00af9'),
('589783ca581cc', 'Coaxial cable', '589783ca58c1b'),
('589783ca581cc', 'Fiber-optic cable', '589783ca58c20'),
('589783ca581cc', 'Twisted-pair cable', '589783ca58c22'),
('589783ca581cc', 'All of the above', '589783ca58c24'),
('589783ca5da1e', 'One', '589783ca5e2ea'),
('589783ca5da1e', 'Two', '589783ca5e2ed'),
('589783ca5da1e', 'Three', '589783ca5e2ee'),
('589783ca5da1e', 'Two pairs', '589783ca5e2f9'),
('589783ca61a1d', 'No physical conductor involved.', '589783ca63da5'),
('589783ca61a1d', 'Uses physical conductor.', '589783ca63daa'),
('589783ca61a1d', 'Example of waves are radio waves and microwave.', '589783ca63dad'),
('589783ca61a1d', 'Is a type of transmission media.', '589783ca63dae'),
('589783ca677d9', 'between 1 and 300 GHz ', '589783ca68f3a'),
('589783ca677d9', 'between 3 kHz and 1 GHz ', '589783ca68f3c'),
('589783ca677d9', 'between 3 GHZ and 1 THZ', '589783ca68f3d'),
('589783ca677d9', 'between 300 GHZ and 400 THz', '589783ca68f3f'),
('589783ca6b84e', 'This advantageous characteristic prevents interference.', '589783ca6c05d'),
('589783ca6b84e', 'Infrared penetrates walls.', '589783ca6c05f'),
('589783ca6b84e', 'This does not affect interference between devices.', '589783ca6c061'),
('589783ca6b84e', '', '589783ca6c062');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('58977f9808315', '589781fcc6d25', 'To communicate, is :', 4, 1),
('58977f9808315', '589781fccf1b4', 'The followings are components of data communication system except:', 4, 2),
('58977f9808315', '589781fcd4510', 'The followings are type of data flows between two devices except:', 4, 3),
('58977f9808315', '589781fcd9d6c', 'What is a network?', 4, 4),
('58977f9808315', '589781fce1890', 'A network must be able to meet a certain number of criteria namely:', 4, 5),
('58977f9808315', '589781fce4f34', 'Which of the following statement is wrong?', 4, 6),
('58977f9808315', '589781fce8b26', '_____ is composed of thousands of interconnected networks. ', 4, 7),
('58977f9808315', '589781fcebf78', 'Which of the following is not a layer of TCP/IP protocol suite?', 4, 8),
('58977f9808315', '589781fcf12dc', 'Which of the following is example of device for Physical layer?', 4, 9),
('58977f9808315', '589781fd0028c', 'OSI model have extra layers than TCP/IP model.\r\nWhich of the following are those extra layers?', 4, 10),
('5897822544d88', '589783ca581cc', 'Which of the following is categorized under guided media?', 4, 1),
('5897822544d88', '589783ca5da1e', 'A twisted pair cable have how many conductors?', 4, 2),
('5897822544d88', '589783ca61a1d', 'Which of the following is wrong about Unguided media?', 4, 3),
('5897822544d88', '589783ca677d9', 'Which of the following is the frequency range of Radio Waves?', 4, 4),
('5897822544d88', '589783ca6b84e', 'Infrared cannot penetrate walls.\r\nWhich of the following statement is correct?', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `correct` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `eid`, `title`, `correct`, `total`, `tag`, `date`) VALUES
(19, '58977f9808315', 'Chapter 1 Assessment', 10, 10, 'ch1', '2017-02-05 19:40:08'),
(20, '5897822544d88', 'Chapter 2 Assessment', 20, 5, 'CH2', '2017-02-05 19:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `UserID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`UserID`, `score`, `time`, `count`) VALUES
(1132701346, 838, '2017-02-06 05:08:24', 28),
(1132700000, 500, '2017-02-05 12:15:46', 10),
(1132701983, 450, '2017-02-05 12:16:01', 15);

-- --------------------------------------------------------

--
-- Table structure for table `stud_prog`
--

CREATE TABLE `stud_prog` (
  `UserID` int(11) NOT NULL,
  `selected_subj` varchar(255) NOT NULL,
  `selected_chap` int(2) NOT NULL,
  `subchap` double(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stud_prog`
--

INSERT INTO `stud_prog` (`UserID`, `selected_subj`, `selected_chap`, `subchap`) VALUES
(1132700000, '', 0, 0.0),
(1132701116, 'dcn', 1, 1.9),
(1132701333, '', 0, 0.0),
(1132701343, '', 0, 0.0),
(1132701344, 'dcn', 1, 1.4),
(1132701345, '', 0, 0.0),
(1132701346, 'dcn', 3, 3.9),
(1132701983, '', 0, 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `stu_assess`
--

CREATE TABLE `stu_assess` (
  `UserID` int(11) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `score` int(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_assess`
--

INSERT INTO `stu_assess` (`UserID`, `eid`, `score`, `time`, `qid`) VALUES
(1132701346, 'haha', 1, '2017-01-31 21:48:19', 1),
(1132701346, 'hehe', 2, '2017-01-31 21:48:29', 1),
(1132701346, 'haha', 2, '2017-01-31 21:48:41', 2),
(1132701346, 'hehe', 1, '2017-01-31 21:48:49', 2),
(1132701346, 'hehe', 3, '2017-01-31 21:48:55', 3),
(1132701346, 'hehe', 4, '2017-01-31 21:48:59', 4),
(1132701346, 'hehe', 1, '2017-01-31 21:49:06', 4),
(1132701346, 'hahah', 8, '2017-01-31 21:49:10', 5),
(1132701346, 'hehehe', 10, '2017-01-31 21:49:17', 6),
(1132701346, '5589741f9ed52', 10, '2017-02-01 04:47:55', 6),
(1132701346, '55897338a6659', 2, '2017-02-01 04:48:30', 5),
(1132701116, 'hahaha', 10, '2017-02-01 05:34:27', 2),
(1132701116, 'hehehe', 7, '2017-02-01 05:34:38', 5),
(1132701346, '5589741f9ed52', 10, '2017-02-01 12:06:09', 6),
(1132701346, '558922ec03021', 2, '2017-02-01 12:07:13', 4),
(1132701346, '5891d14ff3186', 100, '2017-02-01 12:15:41', 9),
(1132701346, '5891d0ed8267c', 100, '2017-02-01 12:15:51', 8),
(1132701346, '5589741f9ed52', 8, '2017-02-01 14:24:12', 6),
(1132701346, '5589741f9ed52', 10, '2017-02-01 14:36:50', 6),
(1132701346, '5589741f9ed52', 8, '2017-02-02 14:26:44', 6),
(1132701346, '5589741f9ed52', 2, '2017-02-02 14:27:50', 6),
(1132701346, '5589741f9ed52', 4, '2017-02-02 14:35:15', 6),
(1132701346, '5589741f9ed52', 8, '2017-02-02 14:49:38', 6),
(1132701346, '5589741f9ed52', 8, '2017-02-02 14:50:34', 6),
(1132701346, '5589741f9ed52', 10, '2017-02-02 14:55:06', 6),
(1132701346, '5589741f9ed52', 10, '2017-02-02 14:57:36', 6),
(1132701346, '5894263665345', 40, '2017-02-04 05:50:37', 14),
(1132701346, '5894263665345', 20, '2017-02-04 06:01:32', 14),
(1132701346, '5894263665345', 60, '2017-02-04 07:14:18', 14),
(1132701346, '5894263665345', 40, '2017-02-04 07:23:34', 14),
(1132701346, '5894263665345', 20, '2017-02-04 07:27:24', 14),
(1132701346, '5894263665345', 60, '2017-02-04 07:36:08', 14),
(1132701346, '5894263665345', 20, '2017-02-04 07:51:02', 14),
(1132701346, '5894263665345', 0, '2017-02-04 08:09:54', 14),
(1132701346, '5894263665345', 40, '2017-02-04 09:33:45', 14),
(1132701346, '5894263665345', 0, '2017-02-04 09:49:19', 14),
(1132701346, '5894263665345', 60, '2017-02-04 20:21:17', 14),
(1132701346, '5897822544d88', 100, '2017-02-05 20:02:47', 20),
(1132701346, '5897822544d88', 80, '2017-02-06 05:08:24', 20);

-- --------------------------------------------------------

--
-- Table structure for table `stu_lesson`
--

CREATE TABLE `stu_lesson` (
  `UserID` int(11) NOT NULL,
  `chap` int(2) NOT NULL,
  `subchap` double(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_lesson`
--

INSERT INTO `stu_lesson` (`UserID`, `chap`, `subchap`) VALUES
(1132701346, 1, 1.1),
(1132701346, 1, 1.0),
(1132701346, 1, 1.2),
(1132701346, 1, 1.3),
(1132701346, 1, 1.4),
(1132701346, 1, 1.5),
(1132701346, 2, 2.0),
(1132701346, 1, 1.9),
(1132701346, 2, 2.1),
(1132701346, 2, 2.2),
(1132701346, 2, 2.3),
(1132701346, 3, 3.0),
(1132701346, 3, 3.1),
(1132701346, 3, 3.2),
(1132701346, 3, 3.3),
(1132701346, 3, 3.4),
(1132701346, 2, 2.9),
(1132701346, 3, 3.9);

-- --------------------------------------------------------

--
-- Table structure for table `subcomments`
--

CREATE TABLE `subcomments` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcomments`
--

INSERT INTO `subcomments` (`id`, `cid`, `name`, `comment`, `post_time`) VALUES
(1, 19, 'hahaha', 'hahaha', '2017-01-05 18:18:07'),
(19, 19, 'Boon', 'hahaha', '2017-01-05 18:42:04'),
(20, 20, 'Boon', 'lol', '2017-01-05 18:48:50'),
(21, 20, 'Boon', 'hehe', '2017-01-05 18:49:09'),
(22, 20, 'Boon', 'replaced lol', '2017-01-05 18:50:02'),
(23, 20, 'Chew Yee Jian', 'hi', '2017-01-12 18:08:46'),
(24, 21, 'Chew Yee Jian', 'hihi', '2017-01-12 18:15:10'),
(25, 21, 'Boon', 'hihhi', '2017-01-14 18:54:44'),
(26, 19, 'Boon', '123', '2017-01-14 19:03:07'),
(27, 24, 'Boon', 'hihi', '2017-01-14 19:09:52'),
(28, 25, 'Chew Yee Jian', 'can ma', '2017-01-14 19:10:23'),
(29, 27, 'Boon', 'hi', '2017-01-17 15:27:28'),
(30, 30, 'Chew Yee Jian', 'Yeah, he explains all the point really clearly. Props to him', '2017-02-05 10:24:42'),
(31, 29, 'Boon', 'haha', '2017-02-05 10:59:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcn`
--
ALTER TABLE `dcn`
  ADD PRIMARY KEY (`chap`);

--
-- Indexes for table `dcn_1`
--
ALTER TABLE `dcn_1`
  ADD PRIMARY KEY (`subchap`);

--
-- Indexes for table `dcn_2`
--
ALTER TABLE `dcn_2`
  ADD PRIMARY KEY (`subchap`);

--
-- Indexes for table `dcn_3`
--
ALTER TABLE `dcn_3`
  ADD PRIMARY KEY (`subchap`);

--
-- Indexes for table `dcn_99`
--
ALTER TABLE `dcn_99`
  ADD PRIMARY KEY (`subchap`);

--
-- Indexes for table `frei_banned_users`
--
ALTER TABLE `frei_banned_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `frei_chat`
--
ALTER TABLE `frei_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_config`
--
ALTER TABLE `frei_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_groupchat`
--
ALTER TABLE `frei_groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_rooms`
--
ALTER TABLE `frei_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`);

--
-- Indexes for table `frei_session`
--
ALTER TABLE `frei_session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permanent_id` (`permanent_id`);

--
-- Indexes for table `frei_smileys`
--
ALTER TABLE `frei_smileys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_video_session`
--
ALTER TABLE `frei_video_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_webrtc`
--
ALTER TABLE `frei_webrtc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `music_db`
--
ALTER TABLE `music_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stud_prog`
--
ALTER TABLE `stud_prog`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `subcomments`
--
ALTER TABLE `subcomments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dcn_99`
--
ALTER TABLE `dcn_99`
  MODIFY `subchap` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `frei_banned_users`
--
ALTER TABLE `frei_banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frei_chat`
--
ALTER TABLE `frei_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `frei_config`
--
ALTER TABLE `frei_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `frei_groupchat`
--
ALTER TABLE `frei_groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `frei_rooms`
--
ALTER TABLE `frei_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `frei_session`
--
ALTER TABLE `frei_session`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `frei_smileys`
--
ALTER TABLE `frei_smileys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `frei_video_session`
--
ALTER TABLE `frei_video_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frei_webrtc`
--
ALTER TABLE `frei_webrtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `music_db`
--
ALTER TABLE `music_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `subcomments`
--
ALTER TABLE `subcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stud_prog`
--
ALTER TABLE `stud_prog`
  ADD CONSTRAINT `stud_prog_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `logins` (`UserID`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `resetlogin1` ON SCHEDULE EVERY 1 MONTH STARTS '2017-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `logins` SET `totallog` = '0'$$

CREATE DEFINER=`root`@`localhost` EVENT `monthlyhighmark` ON SCHEDULE EVERY 1 MONTH STARTS '2017-02-05 20:16:42' ON COMPLETION NOT PRESERVE ENABLE DO update badge set UserID = (SELECT UserID FROM rank ORDER BY SCORE DESC LIMIT 1) where badge_id='1'$$

CREATE DEFINER=`root`@`localhost` EVENT `monthlyhighlogin` ON SCHEDULE EVERY 1 MONTH STARTS '2017-02-05 20:17:30' ON COMPLETION NOT PRESERVE ENABLE DO update badge set UserID = (SELECT UserID FROM logins ORDER BY totallog DESC LIMIT 1) where badge_id='2'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
