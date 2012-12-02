-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2012 at 09:50 AM
-- Server version: 5.0.96
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `growple_fbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
  `id` int(11) NOT NULL auto_increment,
  `challengedetail_id` int(11) default NULL,
  `challengecategory_id` int(11) default NULL,
  `suggestedchallenge_id` int(11) default NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `challengecategory_id` (`challengecategory_id`),
  KEY `challengedetail_id` (`challengedetail_id`),
  KEY `suggestedchallenge_id` (`suggestedchallenge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `challengedetail_id`, `challengecategory_id`, `suggestedchallenge_id`, `name`) VALUES
(1, 1, NULL, NULL, 'celebrate our Growple! launch'),
(4, 4, NULL, NULL, 'í•˜ë£¨ 1ì‹œê°„ ê³¨í”„ì—°ìŠµí•˜ê¸°'),
(5, 5, NULL, NULL, 'ë³´ëžŒì´ëž‘ ë‹¬ë¦¬ê¸°í•´ì„œ ì´ê¸°ê¸°'),
(7, 7, 3, 45, 'Chug a beer at a bar'),
(8, 8, 3, 45, 'Chug a beer at a bar'),
(11, 11, 1, 38, 'Call parents or long lost friend'),
(12, 12, 1, 38, 'Call parents or long lost friend'),
(13, 13, NULL, NULL, 'Go for a 8km run today'),
(14, 14, NULL, NULL, 'Do something'),
(15, 15, NULL, NULL, 'Drinking 40 beers'),
(16, 16, NULL, NULL, 'Wearing nothing under a trenchcoat and flash ppl'),
(17, 17, NULL, NULL, 'Ace your econ exam'),
(18, 18, NULL, NULL, 'go to the gym today '),
(19, 19, NULL, NULL, 'spend less money today!'),
(23, 23, 1, 3, 'Meet someone new today'),
(24, 24, 1, 5, 'Go on a 5km run today'),
(25, 25, NULL, NULL, 'Build a WebWorks app for BlackBerry 10!'),
(26, 26, NULL, NULL, 'Meet some one new today'),
(27, 27, NULL, NULL, 'í•˜ë£¨ì— ì‹ ë¬¸ì‚¬ì„¤ 1íŽ¸ì´ìƒ ìš”ì•½í•˜ê¸° '),
(28, 28, NULL, NULL, 'finish prep for thursday'),
(29, 29, NULL, NULL, 'Fight me -_-'),
(30, 30, 1, 40, 'Pull an all-nighter'),
(32, 32, NULL, NULL, 'Finish studying for psych and strats tonight'),
(33, 33, NULL, NULL, 'eat more sushi than me!'),
(41, 41, NULL, NULL, 'To catch up on Tax this weekend'),
(44, 44, 1, 39, 'Finish assignment'),
(45, 45, 1, 39, 'Finish assignment'),
(46, 46, NULL, NULL, 'have a productive day today'),
(50, 50, NULL, NULL, 'buy me slippers so I don&#39;t sound like an elephant'),
(51, 51, NULL, NULL, 'Drink whatever your birthday beer fund can buy'),
(52, 52, NULL, NULL, 'a basketball game today'),
(53, 53, NULL, NULL, 'Meet someone new and post a pic to prove it'),
(54, 54, NULL, NULL, 'get me macaroons'),
(55, 55, NULL, NULL, 'skype with me ! (this weekend)'),
(56, 56, 1, 6, 'Not to smoke today'),
(57, 57, 1, 37, 'Hit the gym today'),
(58, 58, 1, 3, 'Meet someone new today'),
(59, 59, 1, 37, 'Hit the gym today'),
(60, 60, 1, 37, 'Hit the gym today'),
(61, 61, 1, 37, 'Hit the gym today'),
(62, 62, 1, 37, 'Hit the gym today'),
(63, 63, 1, 37, 'Hit the gym today'),
(64, 64, 1, 37, 'Hit the gym today'),
(65, 65, 1, 37, 'Hit the gym today'),
(66, 66, 1, 37, 'Hit the gym today'),
(67, 67, 1, 37, 'Hit the gym today'),
(68, 68, 1, 37, 'Hit the gym today'),
(69, 69, 1, 37, 'Hit the gym today'),
(70, 70, 1, 37, 'Hit the gym today'),
(71, 71, 1, 37, 'Hit the gym today'),
(72, 72, 1, 37, 'Hit the gym today'),
(73, 73, 1, 37, 'Hit the gym today'),
(74, 74, 1, 37, 'Hit the gym today'),
(75, 75, 1, 37, 'Hit the gym today'),
(76, 76, 1, 37, 'Hit the gym today'),
(77, 77, 1, 37, 'Hit the gym today'),
(78, 78, 1, 3, 'Meet someone new today'),
(79, 79, 1, 3, 'Meet someone new today'),
(80, 80, 3, 45, 'Chug a beer at a bar'),
(81, 81, 3, 45, 'Chug a beer at a bar'),
(82, 82, 1, 3, 'Meet someone new today'),
(83, 83, 1, 3, 'Meet someone new today'),
(84, 84, 1, 3, 'Meet someone new today'),
(85, 85, 1, 3, 'Meet someone new today'),
(86, 86, 3, 25, 'Get a girl''s/guy''s number tonight'),
(87, 87, NULL, NULL, 'Start pilot program'),
(88, 88, 1, 4, 'Be a vegetarian for a day'),
(89, 89, 1, 37, 'Hit the gym today'),
(90, 90, 1, 3, 'Meet someone new today');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_categories`
--

CREATE TABLE IF NOT EXISTS `challenge_categories` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `challenge_categories`
--

INSERT INTO `challenge_categories` (`id`, `type`) VALUES
(1, 'health'),
(2, 'games'),
(3, 'random');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_details`
--

CREATE TABLE IF NOT EXISTS `challenge_details` (
  `id` int(11) NOT NULL auto_increment,
  `challenger_id` int(11) default NULL,
  `challengee_id` int(11) default NULL,
  `challenger_bar` varchar(20) NOT NULL default '30,-10,316',
  `challengee_bar` varchar(20) NOT NULL default '30,-10,316',
  `challengetype_id` int(11) default NULL,
  `winner_id` int(11) default NULL,
  `loser_id` int(11) default NULL,
  `is_tie` tinyint(1) NOT NULL default '0',
  `player_start_time` datetime NOT NULL,
  `player_stop_time` datetime default NULL,
  `server_stop_time` datetime default NULL,
  `update_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `challenger_post` varchar(255) NOT NULL,
  `challengee_post` varchar(255) NOT NULL,
  `challenger_cheers` int(11) NOT NULL default '0',
  `challengee_cheers` int(11) NOT NULL default '0',
  `challenger_cheers_offline` int(11) NOT NULL default '0',
  `challengee_cheers_offline` int(11) NOT NULL default '0',
  `sent_expiry_notice` int(1) NOT NULL default '0',
  `expiry_notice_post` varchar(255) NOT NULL,
  `expiry_notice_time` datetime NOT NULL,
  `challenger_token` varchar(255) NOT NULL,
  `total_cheers` int(11) default NULL,
  `is_toxic` tinyint(1) NOT NULL default '0',
  `error_msg` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `winner_id` (`winner_id`),
  KEY `loser_id` (`loser_id`),
  KEY `challenger_id` (`challenger_id`),
  KEY `challengee_id` (`challengee_id`),
  KEY `challengetype_id` (`challengetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `challenge_details`
--

INSERT INTO `challenge_details` (`id`, `challenger_id`, `challengee_id`, `challenger_bar`, `challengee_bar`, `challengetype_id`, `winner_id`, `loser_id`, `is_tie`, `player_start_time`, `player_stop_time`, `server_stop_time`, `update_time`, `finish_time`, `status`, `challenger_post`, `challengee_post`, `challenger_cheers`, `challengee_cheers`, `challenger_cheers_offline`, `challengee_cheers_offline`, `sent_expiry_notice`, `expiry_notice_post`, `expiry_notice_time`, `challenger_token`, `total_cheers`, `is_toxic`, `error_msg`) VALUES
(1, 1, NULL, '30,-10,316', '30,-10,316', 1, 1, NULL, 0, '0000-00-00 00:00:00', '2012-06-11 05:00:00', '2012-06-11 09:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'finished', '502394825_10150954947649826', '', 11, 0, 0, 0, 1, '502394825_10150955633554826', '2012-06-12 09:00:02', 'AAAGB6oVtg0EBAMEyCdrgrsMIeURl3wLNviA0fI0jDHyqDv3O6x6rX8YUDQTUN5AqoX0OqHdYBBM4bYLVjnpnIry2GS51rSaOQdcMHwZDZD', 5, 0, ''),
(4, 4, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-11 21:00:00', '2012-06-11 12:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '578715246_10151809515495247', '', 4, 0, 0, 0, 1, '578715246_10151810685430247', '2012-06-12 12:00:03', 'AAAGB6oVtg0EBAGHGYFjHa7ZBSdoChFLij6euvWuoySUsdiYB0EccDmZACMZCwqst6nfnGcul1Xv4GC2U0PLaAUlL65ZC7yOStraLUTh9cgZDZD', 5, 0, ''),
(5, 4, 5, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 00:00:00', '2012-06-11 15:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '578715246_10151809520195247', '510751705_10150816684071706', 3, 0, 0, 0, 1, '578715246_10151811057005247', '2012-06-12 15:00:03', 'AAAGB6oVtg0EBAGHGYFjHa7ZBSdoChFLij6euvWuoySUsdiYB0EccDmZACMZCwqst6nfnGcul1Xv4GC2U0PLaAUlL65ZC7yOStraLUTh9cgZDZD', 5, 0, ''),
(7, 6, 8, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-11 03:00:00', '2012-06-11 07:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '501520438_10151040720325439', '', 5, 0, 0, 0, 1, '501520438_10151041245735439', '2012-06-12 07:00:03', 'AAAGB6oVtg0EBAN2IuLb0ZAw6JUaTfX80EYAnUz3WxwXE7zZCVokdasGtDERZBqvJdg25LeZBon05ipHzVP3hRo8n4cSHPhy1ltEL4MfkeAZDZD', 5, 0, ''),
(8, 10, 11, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-11 00:00:00', '2012-06-11 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '504560911_10150949972515912', '503069597_10150962792759598', 0, 0, 0, 0, 1, '504560911_10150950096305912', '2012-06-12 04:00:04', 'AAAGB6oVtg0EBABESkjJNfEpGjkbAklSACN1yND6rZBreZCTV8OTri5P2XcRbo4towqLTXhvNUn6exLl6dfpSN9zHgy7IQ5ysPfVzzabQZDZD', 5, 0, ''),
(11, 13, 14, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-13 00:00:00', '2012-06-12 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '500763742_10150909520403743', '100003098484654_249954018451212', 0, 1, 0, 0, 1, '500763742_10150911435368743', '2012-06-13 04:00:02', 'AAAGB6oVtg0EBAKgCMfbB947VXkowpXX0CTAiZBbX2v0j1xPZCSiCRRbZC5W5VT8aay7TDskMub0jn6dliDVaB78ZATliAywMDcrZA4yw19AZDZD', 5, 0, ''),
(12, 13, 14, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-13 00:00:00', '2012-06-12 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '500763742_10150909520543743', '100003098484654_249954061784541', 2, 1, 0, 0, 1, '500763742_10150911435378743', '2012-06-13 04:00:03', 'AAAGB6oVtg0EBAKgCMfbB947VXkowpXX0CTAiZBbX2v0j1xPZCSiCRRbZC5W5VT8aay7TDskMub0jn6dliDVaB78ZATliAywMDcrZA4yw19AZDZD', 5, 0, ''),
(13, 15, NULL, '30,-10,316', '30,-10,316', 1, 15, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 20:00:00', '2012-06-12 18:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'finished', '567466380_10150895442406381', '', 0, 0, 0, 0, 1, '567466380_10150896334231381', '2012-06-12 18:00:03', 'AAAGB6oVtg0EBAD7aiCKGHY8jFaZCDOZAGxQWC8vM70b2KNWu9jyNl9vCBUcvVsZCAmKhVRAZC663BHczk4ZBTKtVxhNsBaUzQRRJoYhuFFAZDZD', 5, 0, ''),
(14, 15, 16, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 20:00:00', '2012-06-12 18:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '567466380_10150895445681381', '715076506_10150845453911507', 1, 1, 0, 0, 1, '567466380_10150896334271381', '2012-06-12 18:00:03', 'AAAGB6oVtg0EBAD7aiCKGHY8jFaZCDOZAGxQWC8vM70b2KNWu9jyNl9vCBUcvVsZCAmKhVRAZC663BHczk4ZBTKtVxhNsBaUzQRRJoYhuFFAZDZD', 5, 0, ''),
(15, 17, 18, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 12:00:00', '2012-06-12 16:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '580335610_10151824068720611', '501793472_10150908408023473', 0, 0, 0, 0, 1, '580335610_10151827023265611', '2012-06-13 16:00:03', 'AAAGB6oVtg0EBAJ39ja6HoFYw7TPlV9ZAjCZBJMD9HlDZBvhh6jbmsxb4fWwALWbcZCp4MYsP7SZABBPyW25MfR33d6TPe2MBFOr0ga6JjTwZDZD', 5, 0, ''),
(16, 17, 18, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 12:00:00', '2012-06-12 16:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '580335610_10151824073310611', '501793472_10150908411173473', 0, 0, 0, 0, 1, '580335610_10151827023320611', '2012-06-13 16:00:03', 'AAAGB6oVtg0EBAJ39ja6HoFYw7TPlV9ZAjCZBJMD9HlDZBvhh6jbmsxb4fWwALWbcZCp4MYsP7SZABBPyW25MfR33d6TPe2MBFOr0ga6JjTwZDZD', 5, 0, ''),
(17, 19, 20, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 21:00:00', '2012-06-12 01:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '621235261_10151801507175262', '512742141_10150851283282142', 1, 2, 0, 0, 1, '621235261_10151802676955262', '2012-06-13 01:00:02', 'AAAGB6oVtg0EBAGjSoZBm1zYjI2fXImAP8nyXdQWgW7ZBgQzbF5lvdGdYNYBemH1cUSU6i02JXRzCJIV2muAEHHLEY1PSDZB8WNfKUQAFwZDZD', 5, 0, ''),
(18, 19, NULL, '30,-10,316', '30,-10,316', 1, 19, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 19:00:00', '2012-06-12 23:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'finished', '621235261_10151801508660262', '', 2, 0, 0, 0, 1, '621235261_10151802422260262', '2012-06-12 23:00:02', 'AAAGB6oVtg0EBAGjSoZBm1zYjI2fXImAP8nyXdQWgW7ZBgQzbF5lvdGdYNYBemH1cUSU6i02JXRzCJIV2muAEHHLEY1PSDZB8WNfKUQAFwZDZD', 5, 0, ''),
(19, 14, NULL, '30,-10,316', '30,-10,316', 1, 14, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 00:00:00', '2012-06-12 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'finished', '100003098484654_250221951757752', '', 4, 0, 0, 0, 1, '100003098484654_250460615067219', '2012-06-13 04:00:03', 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 5, 0, ''),
(23, 21, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 11:00:00', '2012-06-12 09:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '590744600_10150912615994601', '', 0, 0, 0, 0, 1, '590744600_10150913382664601', '2012-06-13 09:00:02', 'AAAGB6oVtg0EBAEE9291fuZAVvFZA8zhfXIBBJvRjqi5eC65RsxpDmqC3ZBMN3WZCOG7ZAOgNBzJEqDkNAnx99fqawj73z7qfHR3yhGcobMAZDZD', 5, 0, ''),
(24, 23, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 09:00:00', '2012-06-12 13:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '518075418_10150970585535419', '', 0, 0, 0, 0, 1, '518075418_10150971473780419', '2012-06-13 13:00:06', 'AAAGB6oVtg0EBABWZBBOtgm5KOwhKK4ZA3Jin1kWWjcdQPS4FLiVm46ovPVMcUUaGwsCoHbun7Rr6xgZCgXyjZCcF0dL6kmrZBQIItWmqcugZDZD', 5, 0, ''),
(25, 23, 24, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 09:00:00', '2012-06-12 13:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '518075418_10150970592920419', '187908552_10100157552811580', 3, 0, 0, 0, 1, '518075418_10150971473805419', '2012-06-13 13:00:06', 'AAAGB6oVtg0EBABWZBBOtgm5KOwhKK4ZA3Jin1kWWjcdQPS4FLiVm46ovPVMcUUaGwsCoHbun7Rr6xgZCgXyjZCcF0dL6kmrZBQIItWmqcugZDZD', 5, 0, ''),
(26, 25, 27, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 02:00:00', '2012-06-12 06:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '1520416660_4063670239695', '705380230_10151792855245231', 0, 2, 0, 0, 1, '1520416660_4064360216944', '2012-06-13 06:00:03', 'AAAGB6oVtg0EBAMX0KTUOw9NjWKR906w2KiGfGjkZBZCcqpS1rQCQmyMHztzxl7bytTCmHikcZBrO4rgVubSWP7oI05hdaUH4d1b2sQTnAZDZD', 5, 0, ''),
(27, 4, NULL, '30,-10,316', '30,-10,316', 1, 4, NULL, 0, '0000-00-00 00:00:00', '2012-06-13 00:00:00', '2012-06-12 15:00:00', '2012-06-19 00:35:54', '0000-00-00 00:00:00', 'finished', '578715246_10151812599200247', '', 4, 0, 0, 0, 1, '578715246_10151813977205247', '2012-06-13 15:00:02', 'AAAGB6oVtg0EBAGHGYFjHa7ZBSdoChFLij6euvWuoySUsdiYB0EccDmZACMZCwqst6nfnGcul1Xv4GC2U0PLaAUlL65ZC7yOStraLUTh9cgZDZD', 5, 0, ''),
(28, 29, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 02:00:00', '2012-06-12 06:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '28101022_10101226744117032', '', 1, 0, 0, 0, 1, '28101022_10101226864605572', '2012-06-13 06:00:04', 'AAAGB6oVtg0EBAFPGbfzlMsH2eIjSRGZC2OOP303BrStmeGLt5dIn5yS8U2rKLGDvOGW950tjiFvwb3cB0nIzgBZChm6eT13bn4XO88uwZDZD', 5, 0, ''),
(29, 10, 11, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-13 13:00:00', '2012-06-13 17:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '504560911_10150952197955912', '503069597_10150965220434598', 0, 0, 0, 0, 1, '504560911_10150953170950912', '2012-06-13 17:00:05', 'AAAGB6oVtg0EBABESkjJNfEpGjkbAklSACN1yND6rZBreZCTV8OTri5P2XcRbo4towqLTXhvNUn6exLl6dfpSN9zHgy7IQ5ysPfVzzabQZDZD', 5, 0, ''),
(30, 33, 34, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-12 22:00:00', '2012-06-13 02:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '591833364_10150873971503365', '100000834870198_397884400249386', 4, 0, 0, 0, 1, '591833364_10150875136083365', '2012-06-14 02:00:03', 'AAAGB6oVtg0EBAHCoZBG6CPgPq8UVx1yjZBLZBxjGbHh3S2TYqZAeMY3Q4wdCjVdZCq40bfqo9bAPhM51XJIZA7LG2OtOoVZA8StZAfQPGIKZBggZDZD', 5, 0, ''),
(32, 35, 36, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '0000-00-00 00:00:00', '2012-06-14 20:00:00', '2012-06-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '', '', 1, 0, 0, 0, 1, '1649130159_3192202017825', '2012-06-15 00:00:03', 'AAAGB6oVtg0EBAMQC2nvRdjN7lRvruIn0Xxcu7stmseY94lBtTUZAx2YjXSAG8OPMw5JcI1CUxDJHX0CDhA1iVtZAdFZAMPoYARPg66dBgZDZD', 5, 0, ''),
(33, 14, 19, '30,-10,316', '30,-10,316', 2, 14, NULL, 0, '0000-00-00 00:00:00', '2012-06-13 16:00:00', '2012-06-13 20:00:00', '2012-06-15 03:30:43', '0000-00-00 00:00:00', 'finished', '100003098484654_250731835040097', '621235261_10151804525790262', 2, 1, 0, 0, 1, '100003098484654_250800818366532', '2012-06-13 20:00:02', 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 5, 0, ''),
(41, 35, 36, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-14 20:14:48', '2012-06-14 04:00:00', '2012-06-14 08:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '1649130159_3191659284257', '100000343801239_438366656184791', 1, 0, 0, 0, 1, '1649130159_3193162001824', '2012-06-15 08:00:02', 'AAAGB6oVtg0EBAMQC2nvRdjN7lRvruIn0Xxcu7stmseY94lBtTUZAx2YjXSAG8OPMw5JcI1CUxDJHX0CDhA1iVtZAdFZAMPoYARPg66dBgZDZD', 5, 0, ''),
(44, 39, 40, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-15 02:11:17', '2012-06-14 01:00:00', '2012-06-14 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '504515436_10151834936825437', '500978438_10150920594298439', 1, 0, 0, 0, 1, '504515436_10151835318220437', '2012-06-15 05:00:05', 'AAAGB6oVtg0EBANHTx271KZCbf7ZAt1PnBR8yI7UTV3ZCJyF8AQIMdUZCZBXbBWazXuqBnXjWLud9qZBHD8LGd76e1oTZCTJMeSizHz0ZAPclOQZDZD', 5, 0, ''),
(45, 14, 42, '30,-10,316', '30,-10,316', 2, 14, NULL, 0, '2012-06-15 03:55:52', '2012-06-14 11:00:00', '2012-06-14 15:00:00', '2012-06-16 18:01:41', '2012-06-16 18:01:51', 'finished', '100003098484654_251543931625554', '562635042_10151818938450043', 2, 0, 0, 0, 1, '100003098484654_251748111605136', '2012-06-15 15:00:02', 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 5, 0, ''),
(46, 14, NULL, '30,-10,316', '30,-10,316', 1, NULL, 14, 0, '2012-06-18 13:22:53', '2012-06-18 21:00:00', '2012-06-18 01:00:00', '2012-06-19 13:52:59', '2012-06-19 13:53:11', 'finished', '100003098484654_253185908128023', '', 9, 0, 0, 0, 1, '100003098484654_253494851430462', '2012-06-19 01:00:02', 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 5, 0, ''),
(50, 19, 46, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-18 16:11:55', '2012-06-18 12:00:00', '2012-06-18 12:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '621235261_10151820213875262', '507290335_10151040769500336', 3, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGB6oVtg0EBAPa0izgbp78kqzKotb6Xbp0bRa8tWU5eTNUuH9bwMUZCHp7elqVIeXJ1bVIuj3lEss1IP0hLBwTlFqgiv9n1ZCLkSZCjwZDZD', 5, 0, ''),
(51, 1, NULL, '30,-10,316', '30,-10,316', 1, 1, NULL, 0, '2012-06-18 16:46:34', '2012-06-18 12:00:00', '2012-06-18 16:00:00', '2012-06-19 21:37:28', '2012-06-19 21:37:40', 'finished', '502394825_10150968882509826', '', 6, 0, 0, 0, 1, '502394825_10150971075004826', '2012-06-19 16:00:02', 'AAAGB6oVtg0EBAMEyCdrgrsMIeURl3wLNviA0fI0jDHyqDv3O6x6rX8YUDQTUN5AqoX0OqHdYBBM4bYLVjnpnIry2GS51rSaOQdcMHwZDZD', 5, 0, ''),
(52, 14, 58, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-20 19:13:09', '2012-06-20 00:00:00', '2012-06-20 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100003098484654_254427301337217', '513205068_10150869643495069', 8, 3, 0, 0, 1, '100003098484654_254645241315423', '2012-06-21 04:00:02', 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 5, 0, ''),
(53, 1, 62, '30,-10,316', '30,-10,316', 2, NULL, NULL, 1, '2012-06-21 18:35:19', '2012-06-21 02:00:00', '2012-06-21 06:00:00', '2012-06-23 00:04:14', '2012-06-23 00:05:40', 'finished', '502394825_10150975626929826', '500547575_10151218845222576', 2, 1, 0, 0, 1, '502394825_10150976734184826', '2012-06-22 06:00:02', 'AAAGB6oVtg0EBAMEyCdrgrsMIeURl3wLNviA0fI0jDHyqDv3O6x6rX8YUDQTUN5AqoX0OqHdYBBM4bYLVjnpnIry2GS51rSaOQdcMHwZDZD', 5, 0, ''),
(54, 20, 19, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-22 18:46:14', '2012-06-22 20:00:00', '2012-06-23 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '512742141_10150870287442142', '621235261_10151833040230262', 1, 2, 0, 0, 1, '512742141_10150870732117142', '2012-06-23 00:00:02', 'AAAGB6oVtg0EBAIbjnE4mZAJuh2XAQ7OQYlnJJEWZBZCxrRZAvVJLEGrNj1nvQK0dFzV35p37c8nOtOgpc3te6NF2rzUi2WchpwQ8zvEoMQZDZD', 5, 0, ''),
(55, 20, 64, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-22 18:49:31', '2012-06-22 02:00:00', '2012-06-22 06:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '512742141_10150870294057142', '532725601_10151874338875602', 0, 1, 0, 0, 1, '512742141_10150871138322142', '2012-06-23 06:00:02', 'AAAGB6oVtg0EBAIbjnE4mZAJuh2XAQ7OQYlnJJEWZBZCxrRZAvVJLEGrNj1nvQK0dFzV35p37c8nOtOgpc3te6NF2rzUi2WchpwQ8zvEoMQZDZD', 5, 0, ''),
(56, 66, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-06-23 21:30:20', '2012-06-23 22:00:00', '2012-06-23 02:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '515467707_10150973184147708', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGB6oVtg0EBANHmDuWr8YhLj4R05xXLjqXIpbH76P4CIF63zw7FDlKM7czG8HPqfzPydZACp3sgXHH9DB5NmuV7jn5pWWdHEdtMN7wZDZD', 5, 0, ''),
(57, 67, 68, '30,-10,316', '30,-10,316', 2, NULL, NULL, 1, '2012-06-24 04:03:35', '2012-06-24 01:00:00', '2012-06-24 05:00:00', '2012-06-24 04:09:11', '2012-06-24 04:09:20', 'finished', '100004053215694_101636049981502', '100004020756808_102167463260612', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBANEsEKawnpGrrsZCh8hs8kUkBzgBKWEPBRrp6d85bNR1dEmSXg6c7jF8rbbfJYMWh2wfTpJyBi2ZBq9ZCSw3vVa6L3L0Y5WFhdXyZAFV', 5, 0, ''),
(58, 67, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-06-24 04:07:09', '2012-06-24 01:00:00', '2012-06-24 05:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101637229981384', '', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBANC4uXXCoqBj170FOb6uiJrJ03X8GoaAtT7ZCBdVWLQ6gLpiRDEDuCvt2t7UmQvVygqWr7NmskNKCYCEzSsvRaTARqaqZAWVTbiiFo', 5, 0, ''),
(59, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:07:10', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(60, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:10:58', '2012-06-24 21:00:00', '2012-06-24 01:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(61, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:12:07', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(62, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:12:40', '2012-06-24 19:00:00', '2012-06-24 23:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(63, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:13:50', '2012-06-24 18:00:00', '2012-06-24 22:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101923203286120', '100004020756808_102485933228765', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(64, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:25:53', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101931753285265', '100004020756808_102496543227704', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(65, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:30:58', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101934583284982', '100004020756808_102499626560729', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(66, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:32:13', '2012-06-24 13:00:00', '2012-06-24 17:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101935179951589', '100004020756808_102500326560659', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(67, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:32:53', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101935673284873', '100004020756808_102500613227297', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(68, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:34:34', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101936836618090', '100004020756808_102501676560524', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(69, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:52:00', '2012-06-25 00:00:00', '2012-06-24 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101949006616873', '100004020756808_102514233225935', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(70, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 15:57:15', '2012-06-24 13:00:00', '2012-06-24 17:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101952133283227', '100004020756808_102518016558890', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAFHl7ZA0sMW7nsgdz5TZC6cRH5ZBcXysHAJ5hUErOZAGE6ih486rrdE22Gu7gxy2xKo3Fh8s2Bn7bRObiIEnXfHHP6mrpats7ajzZB2J6', 5, 0, ''),
(71, 67, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 16:19:08', '2012-06-24 13:00:00', '2012-06-24 17:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_101965943281846', '100004020756808_102530466557645', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAIND6FMsgxMzLYPsaMBgbaCyXGHIdOOXzUskp9Ak9Sy7xsiwgA7Es9BElEPSqI4ujvXwZCRgFejcsJmntpYBt7al3nXfjvHCiuKVK', 5, 0, ''),
(72, 69, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 23:15:58', '2012-06-24 20:00:00', '2012-06-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102212466590527', '100004020756808_102781619865863', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBADVQyTBaNra86ZC0CJM7dcSrvz4ZAwvRmOINyZBIDCZBDyPSxAKgmZBbvz4iN8ZBIsvVEmsDmIsJ5RaI3OfVtZAaTTSkirffjbuABZABifCo', 5, 0, ''),
(73, 70, 71, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 23:23:05', '2012-06-24 20:00:00', '2012-06-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102215676590206', '100004020756808_102785169865508', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBADVQyTBaNra86ZC0CJM7dcSrvz4ZAwvRmOINyZBIDCZBDyPSxAKgmZBbvz4iN8ZBIsvVEmsDmIsJ5RaI3OfVtZAaTTSkirffjbuABZABifCo', 5, 0, ''),
(74, 72, 73, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 23:29:34', '2012-06-24 20:00:00', '2012-06-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102218899923217', '100004020756808_102788169865208', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBADVQyTBaNra86ZC0CJM7dcSrvz4ZAwvRmOINyZBIDCZBDyPSxAKgmZBbvz4iN8ZBIsvVEmsDmIsJ5RaI3OfVtZAaTTSkirffjbuABZABifCo', 5, 0, ''),
(75, 74, 75, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-24 23:34:16', '2012-06-24 20:00:00', '2012-06-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102220996589674', '100004020756808_102790826531609', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBADVQyTBaNra86ZC0CJM7dcSrvz4ZAwvRmOINyZBIDCZBDyPSxAKgmZBbvz4iN8ZBIsvVEmsDmIsJ5RaI3OfVtZAaTTSkirffjbuABZABifCo', 5, 0, ''),
(76, 74, 75, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-25 00:11:46', '2012-06-25 21:00:00', '2012-06-25 01:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102238933254547', '100004020756808_102808503196508', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAAhFjK2hrLl3tERL91CeQgWqhzEKaryYQl1oZCOztPMUisQKIRi3cZAJbsScn43MUNudOwwLixi95o7fNwwZCoHZCZAbywpa2sVYWY9pW', 5, 0, ''),
(77, 74, 75, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-06-25 00:13:50', '2012-06-25 21:00:00', '2012-06-25 01:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004053215694_102240029921104', '100004020756808_102809529863072', 0, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGSOZCBOshgBAAhFjK2hrLl3tERL91CeQgWqhzEKaryYQl1oZCOztPMUisQKIRi3cZAJbsScn43MUNudOwwLixi95o7fNwwZCoHZCZAbywpa2sVYWY9pW', 5, 0, ''),
(78, 1, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-06-29 06:04:29', '2012-06-29 04:00:00', '2012-06-29 08:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_10150992166289826', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAAwWKSnnxkbaXguKZCR83GECQWAsqTzlpGdhYjy4hhWUHVbTKK44hmoslxJRqzrLdCZCtWzFIsRNaE0qUv6YM2er8oEAZDZD', 5, 0, ''),
(79, 1, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-06-29 06:54:44', '2012-06-29 02:54:43', '2012-06-29 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_10150992215049826', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAAwWKSnnxkbaXguKZCR83GECQWAsqTzlpGdhYjy4hhWUHVbTKK44hmoslxJRqzrLdCZCtWzFIsRNaE0qUv6YM2er8oEAZDZD', 5, 0, ''),
(80, 76, 77, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-07-02 01:30:51', '2012-07-01 16:00:00', '2012-07-01 20:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004051721080_107942309350826', '100004042510934_108075242670559', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAPQ2Ie3xw8wZBZAWB121iSsAq9n6zYF9OV51toC5ZBev5ertmkCMl98cwlvYCnZBL2DKgZBdsdRXIbYC4e7ZBOKmPrZBTbZB0PNTJ1aA8gNV', 5, 0, ''),
(81, 76, 77, '30,-10,316', '30,-10,316', 2, NULL, NULL, 1, '2012-07-02 01:31:31', '2012-07-01 16:00:00', '2012-07-01 20:00:00', '2012-07-02 03:08:14', '2012-07-02 03:10:24', 'finished', '100004051721080_107942652684125', '100004042510934_108075629337187', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAPQ2Ie3xw8wZBZAWB121iSsAq9n6zYF9OV51toC5ZBev5ertmkCMl98cwlvYCnZBL2DKgZBdsdRXIbYC4e7ZBOKmPrZBTbZB0PNTJ1aA8gNV', 5, 0, ''),
(82, 81, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-07-02 15:06:07', '2012-07-02 16:00:00', '2012-07-02 20:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004051721080_108421229302934', '', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAFqsnDGejkTgLfgyHTHp0upn9Y1ZCYjucqyPT0e3yJHoZAFVqBeJjZC3SK0CRPmwMx85s3vbw0ARYDAAmR9wMxWmZB4rvihl9mkYnpPR', 5, 0, ''),
(83, 82, NULL, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-07-02 15:42:10', '2012-07-02 16:00:00', '2012-07-02 20:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004051721080_108448459300211', '', 2, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAFqsnDGejkTgLfgyHTHp0upn9Y1ZCYjucqyPT0e3yJHoZAFVqBeJjZC3SK0CRPmwMx85s3vbw0ARYDAAmR9wMxWmZB4rvihl9mkYnpPR', 5, 0, ''),
(84, 82, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-07-02 16:11:56', '2012-07-02 16:00:00', '2012-07-02 20:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004051721080_108473705964353', '', 2, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAFYIFCfp6CfZAWsZBPTYFU6vT3k3y1e7Jrk1PfZCD4Ymvlt1Wxj2AijzIZBZC14Pp5qJJhb7ZBFDaPH8WZB8yjRgZA2fY6rQHx7vQAZCBK8xO', 5, 0, ''),
(85, 82, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-07-02 16:54:37', '2012-07-02 16:00:00', '2012-07-02 20:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '100004051721080_108504962627894', '', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAEbh5xsO9gBAFYIFCfp6CfZAWsZBPTYFU6vT3k3y1e7Jrk1PfZCD4Ymvlt1Wxj2AijzIZBZC14Pp5qJJhb7ZBFDaPH8WZB8yjRgZA2fY6rQHx7vQAZCBK8xO', 5, 0, ''),
(86, 1, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-11-08 21:40:17', '2012-11-08 17:00:00', '2012-11-08 22:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_295205790598987', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'l PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"\n   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml"\n   xml:lang="en" lang="en" id="facebook">\n  <head>\n    <title>Facebook | Error</title>\n    <meta http-equiv="Con', 5, 0, ''),
(87, 1, 3, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-11-08 22:43:00', '2012-11-08 18:00:00', '2012-11-08 23:00:00', '0000-00-00 00:00:00', '2012-11-08 22:47:29', 'finished', '502394825_556266924390082', '100003756514824_418497061549579', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 5, 0, ''),
(88, 1, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-11-08 23:16:38', '2012-11-08 19:00:00', '2012-11-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_127988867353836', '', 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 5, 0, ''),
(89, 1, 3, '30,-10,316', '30,-10,316', 2, NULL, NULL, 0, '2012-11-08 23:20:50', '2012-11-08 19:00:00', '2012-11-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_464000430317743', '100003756514824_320257254748665', 1, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 5, 0, ''),
(90, 1, NULL, '30,-10,316', '30,-10,316', 1, NULL, NULL, 0, '2012-11-08 23:24:57', '2012-11-08 19:00:00', '2012-11-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'started', '502394825_419468681440419', '', 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 5, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_types`
--

CREATE TABLE IF NOT EXISTS `challenge_types` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `challenge_types`
--

INSERT INTO `challenge_types` (`id`, `type`) VALUES
(1, 'solo'),
(2, 'multi');

-- --------------------------------------------------------

--
-- Table structure for table `cheers`
--

CREATE TABLE IF NOT EXISTS `cheers` (
  `access_token` varchar(255) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `fb_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `has_cheered` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`challenge_id`,`fb_id`),
  KEY `challenge_id` (`challenge_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheers`
--

INSERT INTO `cheers` (`access_token`, `challenge_id`, `fb_id`, `user_id`, `player_id`, `has_cheered`) VALUES
('', 84, 100004005169888, 80, 82, 1),
('', 85, 100004051721080, 82, 82, 1),
('', 86, 0, 0, 0, 0),
('', 86, 502394825, 0, 0, 0),
('', 87, 0, 0, 0, 0),
('', 87, 502394825, 0, 1, 1),
('', 88, 502394825, 0, 1, 1),
('', 89, 502394825, 0, 3, 1),
('', 90, 502394825, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL auto_increment,
  `challenge_id` int(11) default NULL,
  `mediumcategory_id` int(11) default NULL,
  `type` varchar(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mediumcategory_id` (`mediumcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medium_categories`
--

CREATE TABLE IF NOT EXISTS `medium_categories` (
  `id` int(11) NOT NULL auto_increment,
  `format` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggested_challenges`
--

CREATE TABLE IF NOT EXISTS `suggested_challenges` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `challengecategory_id` int(11) default NULL,
  `challengetype_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `challengecategory_id` (`challengecategory_id`),
  KEY `challengetype_id` (`challengetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `suggested_challenges`
--

INSERT INTO `suggested_challenges` (`id`, `name`, `challengecategory_id`, `challengetype_id`) VALUES
(3, 'Meet someone new today', 1, 1),
(4, 'Be a vegetarian for a day', 1, 1),
(5, 'Go on a 5km run today', 1, 1),
(6, 'Not to smoke today', 1, 1),
(11, 'Go to all my classes today', 2, 1),
(12, 'Go skydiving or bungee jumping', 2, 1),
(17, 'Travel to a random city today', 2, 1),
(24, 'Get off Facebook', 2, 1),
(25, 'Get a girl''s/guy''s number tonight', 3, 1),
(26, 'Party hard tonight', 3, 1),
(27, 'To try a new food/drink', 3, 1),
(28, 'Not to do anything today :P', 3, 1),
(37, 'Hit the gym today', 1, 2),
(38, 'Call parents or long lost friend', 1, 2),
(39, 'Finish assignment', 1, 2),
(40, 'Pull an all-nighter', 1, 2),
(41, 'A game of Facebook Tetris', 2, 2),
(42, 'Show up at a party & party hard tonight', 2, 2),
(43, 'An eating contest', 2, 2),
(44, 'Dress better', 2, 2),
(45, 'Chug a beer at a bar', 3, 2),
(46, 'Get a number at a bar tonight', 3, 2),
(47, 'Dance in front of a crowd', 3, 2),
(52, 'Go skinny dipping', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `fb_id` bigint(20) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `pic_small` varchar(100) NOT NULL,
  `pic_big` varchar(100) NOT NULL,
  `pic_square` varchar(100) NOT NULL,
  `wins` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `ties` int(11) NOT NULL,
  `total_challenges` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `invite_friends` int(11) NOT NULL,
  `active` int(1) NOT NULL default '0',
  `active_source` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `access_token`, `name`, `sex`, `pic_small`, `pic_big`, `pic_square`, `wins`, `losses`, `ties`, `total_challenges`, `source`, `invite_friends`, `active`, `active_source`) VALUES
(1, 502394825, 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 'Freddy Hidalgo-Monchez', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157876_502394825_1432600050_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157876_502394825_1432600050_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157876_502394825_1432600050_q.jpg', 2, 0, 1, 3, '', 88, 1, ''),
(2, 100003832260125, 'AAAGB6oVtg0EBAI3GO2OSIwpZBU22dcuc5AxctjLGPjbOSFeNfc4uYWnTgd0G8ABLZCdBoM1c9g3iQw73f1vNSrYLoC375Mn3aRnH8DpQZDZD', 'Grobo Moe', 'male', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yi/r/odA9sNLrE86.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yL/r/HsTZSDw4avx.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yo/r/UlIqmHJn-SK.gif', 3, 0, 0, 6, '', 0, 0, ''),
(3, 100003756514824, 'AAAGLQHaOorUBAFWFqwUGQiJ6Crv2TRo7wMuN8dCiyFGfrUbatAKuUhjlZCjOu7ZChSE66e2XtJT2ywuVBgJGnrwlcjwYxCcMurrBNBpQZDZD', 'Gro Bo', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41736_100003756514824_235439354_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41736_100003756514824_235439354_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41736_100003756514824_235439354_q.jpg', 5, 0, 0, 7, 'invite_box', 2, 0, ''),
(4, 578715246, 'AAAGB6oVtg0EBAGHGYFjHa7ZBSdoChFLij6euvWuoySUsdiYB0EccDmZACMZCwqst6nfnGcul1Xv4GC2U0PLaAUlL65ZC7yOStraLUTh9cgZDZD', 'ê¹€ì˜ìž¬', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157880_578715246_1486636214_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157880_578715246_1486636214_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157880_578715246_1486636214_q.jpg', 2, 0, 0, 2, '', 11, 0, ''),
(5, 510751705, 'AAAGB6oVtg0EBAGHGYFjHa7ZBSdoChFLij6euvWuoySUsdiYB0EccDmZACMZCwqst6nfnGcul1Xv4GC2U0PLaAUlL65ZC7yOStraLUTh9cgZDZD', 'Katie Boram Kim', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370908_510751705_378871201_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370908_510751705_378871201_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370908_510751705_378871201_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(6, 501520438, 'AAAGB6oVtg0EBAN2IuLb0ZAw6JUaTfX80EYAnUz3WxwXE7zZCVokdasGtDERZBqvJdg25LeZBon05ipHzVP3hRo8n4cSHPhy1ltEL4MfkeAZDZD', 'Garrett Gottlieb', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/161171_501520438_895775662_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/161171_501520438_895775662_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/161171_501520438_895775662_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(7, 503191477, 'AAAGB6oVtg0EBAN2IuLb0ZAw6JUaTfX80EYAnUz3WxwXE7zZCVokdasGtDERZBqvJdg25LeZBon05ipHzVP3hRo8n4cSHPhy1ltEL4MfkeAZDZD', 'Sean Sexton', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573201_503191477_1784176812_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573201_503191477_1784176812_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573201_503191477_1784176812_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(8, 531610443, 'AAAGB6oVtg0EBAN2IuLb0ZAw6JUaTfX80EYAnUz3WxwXE7zZCVokdasGtDERZBqvJdg25LeZBon05ipHzVP3hRo8n4cSHPhy1ltEL4MfkeAZDZD', 'Kevin Widmer', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/50078_531610443_685866484_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/50078_531610443_685866484_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/50078_531610443_685866484_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(9, 58020779, 'AAAGB6oVtg0EBAFFSU5YxM6ZBebG2BLJSEk9IDKUuZB4CijqMnIdU3Cbjrc5dZCZB1Je1jLZCXtpCkfpiOk6lJnObShErC2hZC6ZCccOu7nPPwZDZD', 'Swati Nikumb', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369513_58020779_579505603_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369513_58020779_579505603_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369513_58020779_579505603_q.jpg', 0, 0, 0, 0, 'invite_box', 2, 0, ''),
(10, 504560911, 'AAAGB6oVtg0EBABESkjJNfEpGjkbAklSACN1yND6rZBreZCTV8OTri5P2XcRbo4towqLTXhvNUn6exLl6dfpSN9zHgy7IQ5ysPfVzzabQZDZD', 'Yungoo Kim', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41562_504560911_1657429075_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41562_504560911_1657429075_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41562_504560911_1657429075_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(11, 503069597, 'AAAGB6oVtg0EBABESkjJNfEpGjkbAklSACN1yND6rZBreZCTV8OTri5P2XcRbo4towqLTXhvNUn6exLl6dfpSN9zHgy7IQ5ysPfVzzabQZDZD', 'Sung-Ho Brian Han', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/573944_503069597_71358738_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/573944_503069597_71358738_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/573944_503069597_71358738_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(12, 547130638, 'AAAGB6oVtg0EBACAOR5DLiAExTqtH9sQDUAxCtZCDZB1cOLw8yfsKKM7HM5rvGc2TvmPeohvtOqIYCxKuUFO2EJ6OxGDSA2EKuIsgczvgZDZD', 'Rene Veliz', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41682_547130638_1813128847_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41682_547130638_1813128847_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41682_547130638_1813128847_q.jpg', 0, 0, 0, 0, 'invite_box', 40, 0, ''),
(13, 500763742, 'AAAGB6oVtg0EBAKgCMfbB947VXkowpXX0CTAiZBbX2v0j1xPZCSiCRRbZC5W5VT8aay7TDskMub0jn6dliDVaB78ZATliAywMDcrZA4yw19AZDZD', 'Neo Yin', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370070_500763742_326613276_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370070_500763742_326613276_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370070_500763742_326613276_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(14, 100003098484654, 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 'Kevin DH Kim', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370700_100003098484654_1284130933_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370700_100003098484654_1284130933_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/370700_100003098484654_1284130933_q.jpg', 5, 1, 0, 6, '', 17, 0, ''),
(15, 567466380, 'AAAGB6oVtg0EBAD7aiCKGHY8jFaZCDOZAGxQWC8vM70b2KNWu9jyNl9vCBUcvVsZCAmKhVRAZC663BHczk4ZBTKtVxhNsBaUzQRRJoYhuFFAZDZD', 'Rafid Hoda', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/187333_567466380_466219227_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/187333_567466380_466219227_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/187333_567466380_466219227_q.jpg', 1, 0, 0, 1, '', 0, 0, ''),
(16, 715076506, 'AAAGB6oVtg0EBAD7aiCKGHY8jFaZCDOZAGxQWC8vM70b2KNWu9jyNl9vCBUcvVsZCAmKhVRAZC663BHczk4ZBTKtVxhNsBaUzQRRJoYhuFFAZDZD', 'Khallil Mangalji', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173173_715076506_1304184008_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173173_715076506_1304184008_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173173_715076506_1304184008_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(17, 580335610, 'AAAGB6oVtg0EBAJ39ja6HoFYw7TPlV9ZAjCZBJMD9HlDZBvhh6jbmsxb4fWwALWbcZCp4MYsP7SZABBPyW25MfR33d6TPe2MBFOr0ga6JjTwZDZD', 'Mary He', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371391_580335610_218616552_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371391_580335610_218616552_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371391_580335610_218616552_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(18, 501793472, 'AAAGB6oVtg0EBAJ39ja6HoFYw7TPlV9ZAjCZBJMD9HlDZBvhh6jbmsxb4fWwALWbcZCp4MYsP7SZABBPyW25MfR33d6TPe2MBFOr0ga6JjTwZDZD', 'Sid W', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41725_501793472_2120097384_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41725_501793472_2120097384_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41725_501793472_2120097384_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(19, 621235261, 'AAAGB6oVtg0EBAIbjnE4mZAJuh2XAQ7OQYlnJJEWZBZCxrRZAvVJLEGrNj1nvQK0dFzV35p37c8nOtOgpc3te6NF2rzUi2WchpwQ8zvEoMQZDZD', 'Elton Shehdula', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41676_621235261_1176836239_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41676_621235261_1176836239_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41676_621235261_1176836239_q.jpg', 1, 0, 0, 4, '', 0, 0, ''),
(20, 512742141, 'AAAGB6oVtg0EBAIbjnE4mZAJuh2XAQ7OQYlnJJEWZBZCxrRZAvVJLEGrNj1nvQK0dFzV35p37c8nOtOgpc3te6NF2rzUi2WchpwQ8zvEoMQZDZD', 'Michelle Au Yeung', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/157136_512742141_1165529117_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/157136_512742141_1165529117_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/157136_512742141_1165529117_q.jpg', 0, 0, 0, 0, '', 10, 0, ''),
(21, 590744600, 'AAAGB6oVtg0EBAEE9291fuZAVvFZA8zhfXIBBJvRjqi5eC65RsxpDmqC3ZBMN3WZCOG7ZAOgNBzJEqDkNAnx99fqawj73z7qfHR3yhGcobMAZDZD', 'Alberto Herreros Dominguez', '', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565118_590744600_1659555053_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565118_590744600_1659555053_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565118_590744600_1659555053_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(22, 505658819, 'AAAGB6oVtg0EBAB3JxQ4ZBGUDcZA3pEkzXG85VIBtcWmwooVCTz5CUpvYMuxHyjc3ZAggah9mYzxZBPEqcHxjSFoQbYQLZCT9jFZCU3QuCHnAZDZD', 'Vithushan Jeyakumaran', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/371917_505658819_161680979_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/371917_505658819_161680979_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/371917_505658819_161680979_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(23, 518075418, 'AAAGB6oVtg0EBABWZBBOtgm5KOwhKK4ZA3Jin1kWWjcdQPS4FLiVm46ovPVMcUUaGwsCoHbun7Rr6xgZCgXyjZCcF0dL6kmrZBQIItWmqcugZDZD', 'Alex Kinsella', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173243_518075418_1743535995_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173243_518075418_1743535995_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173243_518075418_1743535995_q.jpg', 0, 0, 0, 0, '', 1, 0, ''),
(24, 187908552, 'AAAGB6oVtg0EBABWZBBOtgm5KOwhKK4ZA3Jin1kWWjcdQPS4FLiVm46ovPVMcUUaGwsCoHbun7Rr6xgZCgXyjZCcF0dL6kmrZBQIItWmqcugZDZD', 'Luke Reimer', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/186253_187908552_1700865_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/186253_187908552_1700865_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/186253_187908552_1700865_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(25, 1520416660, 'AAAGB6oVtg0EBAMX0KTUOw9NjWKR906w2KiGfGjkZBZCcqpS1rQCQmyMHztzxl7bytTCmHikcZBrO4rgVubSWP7oI05hdaUH4d1b2sQTnAZDZD', 'Bo Liang', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41364_1520416660_6936_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41364_1520416660_6936_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41364_1520416660_6936_q.jpg', 0, 0, 0, 0, 'fb', 4, 0, ''),
(26, 72610318, 'AAAGB6oVtg0EBAFkKaykZCRPuL5aBlPYq4XpcbKCZCDbrdTdVKBPWhcFsgwDZCNkgvPQ5488WID81w2UYKIevPxDMZAdXVCAuIiqo4BWgNgZDZD', 'Srinithi Raghavan', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368919_72610318_1219532694_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368919_72610318_1219532694_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368919_72610318_1219532694_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(27, 705380230, 'AAAGB6oVtg0EBAMX0KTUOw9NjWKR906w2KiGfGjkZBZCcqpS1rQCQmyMHztzxl7bytTCmHikcZBrO4rgVubSWP7oI05hdaUH4d1b2sQTnAZDZD', 'Clarence Menezes', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/173689_705380230_593957371_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/173689_705380230_593957371_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/173689_705380230_593957371_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(28, 1668570456, 'AAAGB6oVtg0EBAEvRNi8LPhRbs2fXcrBvDq56ZBKpTZBSH3SzTt6ydnUsljQ1go28nwBuIl4LI4vgtiPJQC0kvBNI9kbe4XhvmJ7EdMJgZDZD', 'Phil Jacobson', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565211_1668570456_1122126565_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565211_1668570456_1122126565_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/565211_1668570456_1122126565_q.jpg', 0, 0, 0, 0, 'fb', 9, 0, ''),
(29, 28101022, 'AAAGB6oVtg0EBAFPGbfzlMsH2eIjSRGZC2OOP303BrStmeGLt5dIn5yS8U2rKLGDvOGW950tjiFvwb3cB0nIzgBZChm6eT13bn4XO88uwZDZD', 'Edward On', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/48984_28101022_1940_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/48984_28101022_1940_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/48984_28101022_1940_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(30, 100000053227878, 'AAAGB6oVtg0EBALDfKUlLlZBiElelIuVOjxZBvSdjZC1bqR1BSJopqFnuIx054WMvQV4G9VdYPR7ZC9qlXFyzx6oQFHzG1llZBc26ZC7KARYAZDZD', 'Ossie Vali', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/275605_100000053227878_4683101_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/275605_100000053227878_4683101_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/275605_100000053227878_4683101_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(31, 187906669, 'AAAGB6oVtg0EBAPpWXABZAxZBLYkYJL7lc8VDlHEdwZCdiqJND7buxnZBcDw7Y7i8waSsPINMeYXqH5PCZARuSfnBQWVrrJuhucBTI2m8DDQZDZD', 'Ammad Shaikh', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173813_187906669_1976068511_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173813_187906669_1976068511_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173813_187906669_1976068511_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(32, 690957435, 'AAAGB6oVtg0EBAI2ZBEC9zuewFavUweTCTbOcZASNesx3ANMMc9BVZCOUL1iSsYztyeZCXjE9Icrb18mavrWnicFOFUQ6WZBsKsgsQ02ZCQ1AZDZD', 'Daniel Praymayer', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157406_690957435_2050166518_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157406_690957435_2050166518_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157406_690957435_2050166518_q.jpg', 0, 0, 0, 0, 'fb', 1, 0, ''),
(33, 591833364, 'AAAGB6oVtg0EBAHCoZBG6CPgPq8UVx1yjZBLZBxjGbHh3S2TYqZAeMY3Q4wdCjVdZCq40bfqo9bAPhM51XJIZA7LG2OtOoVZA8StZAfQPGIKZBggZDZD', 'Aboyeji S Iyinoluwa', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/174274_591833364_221052895_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/174274_591833364_221052895_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/174274_591833364_221052895_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(34, 100000834870198, 'AAAGB6oVtg0EBAHCoZBG6CPgPq8UVx1yjZBLZBxjGbHh3S2TYqZAeMY3Q4wdCjVdZCq40bfqo9bAPhM51XJIZA7LG2OtOoVZA8StZAfQPGIKZBggZDZD', 'Tony Bui', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573725_100000834870198_1077265998_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573725_100000834870198_1077265998_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573725_100000834870198_1077265998_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(35, 1649130159, 'AAAGB6oVtg0EBAMQC2nvRdjN7lRvruIn0Xxcu7stmseY94lBtTUZAx2YjXSAG8OPMw5JcI1CUxDJHX0CDhA1iVtZAdFZAMPoYARPg66dBgZDZD', 'Janice Woo', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187402_1649130159_1730744677_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187402_1649130159_1730744677_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187402_1649130159_1730744677_q.jpg', 0, 0, 0, 0, 'fb', 1, 0, ''),
(36, 100000343801239, 'AAAGB6oVtg0EBAMQC2nvRdjN7lRvruIn0Xxcu7stmseY94lBtTUZAx2YjXSAG8OPMw5JcI1CUxDJHX0CDhA1iVtZAdFZAMPoYARPg66dBgZDZD', 'Esther Choi', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/260911_100000343801239_674229758_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/260911_100000343801239_674229758_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/260911_100000343801239_674229758_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(37, 24504994, 'AAAGB6oVtg0EBANAUPQxp5CjZAG4zj9DTyuZAZAPjvAJtuwBegidnrrTX8gP9g9rHlF1eEcEM5F5F8K9YS609uoKfd54HtJqKHRD90ZA4tQZDZD', 'Jason Davis', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565218_24504994_1832465771_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565218_24504994_1832465771_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565218_24504994_1832465771_q.jpg', 0, 0, 0, 0, 'finish', 0, 0, ''),
(38, 576145538, 'AAAGB6oVtg0EBAH37ETixBW88ANBrcTuPKDWjZBUTxxqhazdl20bUbjuLNcXyulxNWmZBOMCOZAfxjsRKjJiZA9JpeuP4Qh6ZCkCJyZBhTmXgZDZD', 'Ken Mathekal', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368906_576145538_1592444627_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368906_576145538_1592444627_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/368906_576145538_1592444627_q.jpg', 0, 0, 0, 0, 'header', 0, 0, ''),
(39, 504515436, 'AAAGB6oVtg0EBANHTx271KZCbf7ZAt1PnBR8yI7UTV3ZCJyF8AQIMdUZCZBXbBWazXuqBnXjWLud9qZBHD8LGd76e1oTZCTJMeSizHz0ZAPclOQZDZD', 'Stephen Lake', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157531_504515436_1304399865_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157531_504515436_1304399865_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/157531_504515436_1304399865_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(40, 500978438, 'AAAGB6oVtg0EBANHTx271KZCbf7ZAt1PnBR8yI7UTV3ZCJyF8AQIMdUZCZBXbBWazXuqBnXjWLud9qZBHD8LGd76e1oTZCTJMeSizHz0ZAPclOQZDZD', 'Matthew Bailey', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/572910_500978438_738328152_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/572910_500978438_738328152_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/572910_500978438_738328152_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(41, 502108136, 'AAAGB6oVtg0EBAF8jBoQzunZAiovOWzOnaZCXELhcZBjgJaCgadTkXTJZBOn1bzXTzmX0SaHsZCs3y4YWp5sGifEtXOV5TQcHjAC8nZAwpWOwZDZD', 'Frank Martinez', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/48713_502108136_2141014077_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/48713_502108136_2141014077_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/48713_502108136_2141014077_q.jpg', 0, 0, 0, 0, 'fb', 0, 0, ''),
(42, 562635042, 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 'Sooji Lee', 'female', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/370999_562635042_232557046_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/370999_562635042_232557046_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/370999_562635042_232557046_q.jpg', 0, 0, 0, 1, '', 0, 0, ''),
(43, 506933910, 'AAAGB6oVtg0EBAGZAZCfT5D85KrZCOin1B4AasiCDaNyoZCV4mqYrbPjjqb9oDi59I0jJmTIW5UpPZAq03NFL64FhyuEyCZAHjTeALFdiJLUAZDZD', 'Brian Han', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273801_506933910_1019498424_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273801_506933910_1019498424_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273801_506933910_1019498424_q.jpg', 0, 0, 0, 0, 'finish', 0, 0, ''),
(44, 517466115, 'AAAGB6oVtg0EBAFinAOzuFMa33NZAmoLagvQO4gzTZAbEgqjo4h8267oi5IgCzAVNm45Jqt3cGoNOq5WsVnPl3eX6dhzkyDMAIkWIK6bAZDZD', 'Amer Abu Khajil', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371479_517466115_663228418_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371479_517466115_663228418_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371479_517466115_663228418_q.jpg', 0, 0, 0, 0, 'header', 0, 0, ''),
(45, 122615925, 'AAAGB6oVtg0EBAMA9ZCj32K40qWJeKRqPHhUf9q1qvL7JLhfSWHFekTKyTQUfpCYjyFliwqTxzB6sfTdiTDwhvrEdhZCB8jovzShO97TAZDZD', 'Blyth Gill', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/173197_122615925_310667772_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/173197_122615925_310667772_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/173197_122615925_310667772_q.jpg', 0, 0, 0, 0, 'header', 0, 0, ''),
(46, 507290335, '', 'Lenka Baloghova', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/572646_507290335_1548133290_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/572646_507290335_1548133290_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/572646_507290335_1548133290_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(47, 510014941, 'AAAGB6oVtg0EBANWUbHwef3Uv5kSpQxDAZBF2uCTNP86yohRpjF5SldZAP92xdBNHETFZBi5L3ETNGCr5gcH2NXdk4wolHNVrXdsI1ZCCDwZDZD', 'Oscar Chow', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573656_510014941_1643963755_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573656_510014941_1643963755_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/573656_510014941_1643963755_q.jpg', 0, 0, 0, 0, 'header', 0, 0, ''),
(48, 540100458, 'AAAGB6oVtg0EBAOGBvfnGsbjkGuWRqvuBCCAhGfzvVfopZBpbUpfdMLRwtb2FP2fj2guTW3d2ytbQFmTGZCOdZBD8thhLEiCBBQIwFcGeQZDZD', 'Mathew Dotto', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41694_540100458_983740123_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41694_540100458_983740123_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/41694_540100458_983740123_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(49, 100003346847512, 'AAAGB6oVtg0EBAIA6xy6tltbi3OGQhdW7OpKY9jZCQjYZCqZAzddG4YHfZBqDTL38GDAZBbgivplMBO2qhW48VcNxVqQ1cWwdOiaNIPFQ1HgZDZD', 'Steven Armstrong', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369035_100003346847512_790686661_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369035_100003346847512_790686661_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369035_100003346847512_790686661_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(50, 510496791, 'AAAGB6oVtg0EBADpg7ZC8dERXZBXLS1ZAeEgAQWt5o9ZC5Jxv1N3QQaCgy6F5ovCvQgZBTzOfS3RDBcLmrZBrUi1yNPZCcnSwwT0k9ZCyMKxPbgZDZD', 'Ben Yung', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173807_510496791_234386689_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173807_510496791_234386689_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/173807_510496791_234386689_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(51, 509815036, 'AAAGB6oVtg0EBAEikwUXnVLTYG5ZB45Q9V1HVJaLo9H3TA7w8g3a16REATZBDjAl1dAN7HZCDZBMbOmZCwsWfatBb1r92RDYOWxqSHPRdNlAZDZD', 'John Park', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273754_509815036_1455566227_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273754_509815036_1455566227_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273754_509815036_1455566227_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(52, 502523061, 'AAAGB6oVtg0EBAG9vpL618GqzTAtZARXswFZAIErTVDnZAkZB4XBt9DRHrmwh85NZA0Qewi7UKYfftVs9fDmYy7Pr1eytu9OR5zXbO619IaAZDZD', 'Mindy Fraser', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369398_502523061_73507678_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369398_502523061_73507678_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369398_502523061_73507678_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(53, 518223527, 'AAAGB6oVtg0EBAGWaxrHyl36r2UQEoY20ZAvxexApZAZADFtjI7nCdhudH3YSFLDVvHIZCvxTb2GHKgmOXt1GemfUJx3WGcmvj2ZC85vmfSwZDZD', 'Brian Chan', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/369213_518223527_292334448_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/369213_518223527_292334448_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/369213_518223527_292334448_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(54, 1667040182, 'AAAGB6oVtg0EBAFU9h7A7UfZBgnvhuqcj9q3C483cf3dh1walZBFhzuT5CvoyxH6zkOGv41rq3rlSpodKsOFPtaz4cVfHeK8amZCnklahQZDZD', 'Derek Bennewies', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371681_1667040182_176364460_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371681_1667040182_176364460_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/371681_1667040182_176364460_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(55, 100002017505058, '', 'Ariane Claudepierre', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276152_100002017505058_1542150155_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276152_100002017505058_1542150155_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276152_100002017505058_1542150155_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(56, 506067650, 'AAAGB6oVtg0EBAH5gID1jQJFnZBXQTj3tIrWzED9x1I0X6HmnlMCO9svUIXTKiPy68BoXobE8pZCeHUvxfEcOhw6XVZCwL5x5Kr1S2097wZDZD', 'Jennifer Paiva', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/49015_506067650_203844759_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/49015_506067650_203844759_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/49015_506067650_203844759_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(57, 122610099, 'AAAGB6oVtg0EBAF0ZCczOmXg0stebZBlakjiLIX8koZBCaAgHTNRZBFfLrkS7BYRZBcH8SR2JPoLm3SEnuzNGTZAVCIT2l8P0boD2uNE5E5KAZDZD', 'Andrew Cross', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276109_122610099_1916299438_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276109_122610099_1916299438_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/276109_122610099_1916299438_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(58, 513205068, 'AAAGB6oVtg0EBAILUHcjDkcSyuZBnvZAirs33XDJtCADWNXaHrzWaveyrYnvbZC6oUtbs3GZC4NtZCsMuSd3K7FUj84aZAEyZBfxqJMmv6GiHgZDZD', 'Mark Wai', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565181_513205068_1049761391_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565181_513205068_1049761391_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/565181_513205068_1049761391_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(59, 508517078, 'AAAGB6oVtg0EBALvOaYTiZCjLVOKI1WpZCofKLL5wCuESGxw4PcPsTyXvpvqSWc5nkunjV3NJakExP5phr6yng2euTXkSLN5h5ZAXruZB7QZDZD', 'Matthew Liem', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/49044_508517078_896268510_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/49044_508517078_896268510_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/49044_508517078_896268510_q.jpg', 0, 0, 0, 0, 'header', 0, 0, ''),
(60, 712950520, 'AAAGB6oVtg0EBAKuuM9FK4LniiWegdlxkf1GBqCtYcMfz9BUnguXgM4lB5V5rt7wuW1Gt8t7D1dbeZAokVVI6A9WoI113SNU0nZBCNiJAZDZD', 'Justin Kim', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41738_712950520_354752907_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41738_712950520_354752907_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/41738_712950520_354752907_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(61, 1208063366, 'AAAGB6oVtg0EBAJ28ZA8QFNnQsh5qFfRyZA0bZAoWsHG5HTgpTafFmryQ8pA0zfDBBRZAhe51n0lJ33vMoWEo1aJP1INsWELGSJ4cmThVoQZDZD', 'Vinnie Pai', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/275083_1208063366_3263713_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/275083_1208063366_3263713_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/275083_1208063366_3263713_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(62, 500547575, 'AAAGB6oVtg0EBAMEyCdrgrsMIeURl3wLNviA0fI0jDHyqDv3O6x6rX8YUDQTUN5AqoX0OqHdYBBM4bYLVjnpnIry2GS51rSaOQdcMHwZDZD', 'Stefan Curtis', 'male', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/161108_500547575_981736_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/161661_500547575_7589977_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/161108_500547575_981736_q.jpg', 0, 0, 1, 1, '', 0, 0, ''),
(63, 609688641, 'AAAGB6oVtg0EBALh4Rc3wI4EyeMfTBYLl1QkR4x2unCLgh4VPvfIVHtOZChIgNrieW7fFeM9e1GWStFZA106bMQZBsOhr8KS3w8WOnWddAZDZD', 'Tejpal Sahota', 'male', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371378_609688641_1158966201_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371378_609688641_1158966201_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/371378_609688641_1158966201_q.jpg', 0, 0, 0, 0, 'msg', 0, 0, ''),
(64, 532725601, 'AAAGB6oVtg0EBAIbjnE4mZAJuh2XAQ7OQYlnJJEWZBZCxrRZAvVJLEGrNj1nvQK0dFzV35p37c8nOtOgpc3te6NF2rzUi2WchpwQ8zvEoMQZDZD', 'Jess Tsao', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157763_532725601_1875803978_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157763_532725601_1875803978_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/157763_532725601_1875803978_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(65, 824619132, 'AAAGB6oVtg0EBALOdQH1w8hYY5as5d0tjIJE5wQm7AVnbFAdnbt2j0tIZCldnRPE8Ijv6dBf4o5xhze0B0oBYUfOISEmGqbWbrQrSYrQZDZD', 'Flower Navarro', 'female', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187326_824619132_447299549_t.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187326_824619132_447299549_n.jpg', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187326_824619132_447299549_q.jpg', 0, 0, 0, 0, 'msg', 10, 0, ''),
(66, 515467707, 'AAAGB6oVtg0EBANHmDuWr8YhLj4R05xXLjqXIpbH76P4CIF63zw7FDlKM7czG8HPqfzPydZACp3sgXHH9DB5NmuV7jn5pWWdHEdtMN7wZDZD', 'Sarah Jay', 'female', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273990_515467707_1670263903_t.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273990_515467707_1670263903_n.jpg', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/273990_515467707_1670263903_q.jpg', 0, 0, 0, 0, '', 0, 0, ''),
(74, 100004053215694, 'AAAGSOZCBOshgBACH75ZCFJmivJy4IkevNJHDwMk91suLuwnRWEN8dM3O0U8uaZAxesXrTZCZB5ZARSfShAbFjJ2p0jMxloB7P1FaXq36B9q2mmha7PKRwO', 'Ruth Amdjecbaefid Panditsky', 'female', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yP/r/FdhqUFlRalU.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yp/r/yDnr5YfbJCH.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', 0, 0, 0, 0, '', 0, 1, ''),
(75, 100004020756808, 'AAAGSOZCBOshgBAAhFjK2hrLl3tERL91CeQgWqhzEKaryYQl1oZCOztPMUisQKIRi3cZAJbsScn43MUNudOwwLixi95o7fNwwZCoHZCZAbywpa2sVYWY9pW', 'Carol Amdjbjgefhjh Valtchanovstein', 'female', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yP/r/FdhqUFlRalU.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yp/r/yDnr5YfbJCH.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', 0, 0, 0, 0, '', 0, 1, ''),
(77, 100004042510934, 'AAAEbh5xsO9gBAPQ2Ie3xw8wZBZAWB121iSsAq9n6zYF9OV51toC5ZBev5ertmkCMl98cwlvYCnZBL2DKgZBdsdRXIbYC4e7ZBOKmPrZBTbZB0PNTJ1aA8gNV', 'Dorothy Amdjdbeajicd Wongman', 'female', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yP/r/FdhqUFlRalU.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yp/r/yDnr5YfbJCH.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', 0, 0, 0, 0, '', 0, 1, 'challengee vc'),
(80, 100004005169888, 'AAAEbh5xsO9gBAOvZBZBNfu5Bmz0Qs0qUZBkA4sLyXiVTfK0zsGvdgQHslTZCYszi1A0FotZAUVcSkdzery6XsP78mSdWlCpz3SO2TDvocLgZDZD', 'Joe Amdkeafihhh Valtchanovwitz', 'male', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yi/r/odA9sNLrE86.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yL/r/HsTZSDw4avx.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yo/r/UlIqmHJn-SK.gif', 0, 0, 0, 0, 'finish', 0, 1, 'cheerer'),
(82, 100004051721080, 'AAAEbh5xsO9gBAFqsnDGejkTgLfgyHTHp0upn9Y1ZCYjucqyPT0e3yJHoZAFVqBeJjZC3SK0CRPmwMx85s3vbw0ARYDAAmR9wMxWmZB4rvihl9mkYnpPR', 'Barbara Amdjeagbajhj Wongescu', 'female', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yP/r/FdhqUFlRalU.jpg', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yp/r/yDnr5YfbJCH.gif', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', 0, 0, 0, 0, 'start', 0, 1, 'challenger');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE IF NOT EXISTS `user_categories` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`id`, `type`) VALUES
(1, 'challenger'),
(2, 'challengee'),
(3, 'watcher');

-- --------------------------------------------------------

--
-- Table structure for table `user_challenges`
--

CREATE TABLE IF NOT EXISTS `user_challenges` (
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `usercategory_id` int(11) default NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`,`challenge_id`),
  KEY `usercategory_id` (`usercategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_challenges`
--

INSERT INTO `user_challenges` (`user_id`, `challenge_id`, `usercategory_id`, `state`) VALUES
(1, 1, 1, 'won'),
(1, 20, 1, 'started'),
(1, 51, 1, 'won'),
(1, 53, 1, 'tied'),
(1, 78, 1, 'started'),
(1, 79, 1, 'started'),
(1, 86, 1, 'started'),
(1, 87, 1, 'started'),
(1, 88, 1, 'started'),
(1, 89, 1, 'started'),
(1, 90, 1, 'started'),
(2, 2, 1, 'started'),
(3, 21, 1, 'started'),
(3, 22, 1, 'started'),
(3, 87, 2, 'started'),
(3, 89, 2, 'started'),
(4, 4, 1, 'started'),
(4, 5, 1, 'started'),
(4, 27, 1, 'won'),
(5, 5, 2, 'started'),
(6, 6, 1, 'started'),
(6, 7, 1, 'started'),
(7, 6, 2, 'started'),
(8, 7, 2, 'started'),
(10, 8, 1, 'started'),
(10, 29, 1, 'started'),
(11, 8, 2, 'started'),
(11, 29, 2, 'started'),
(12, 9, 1, 'started'),
(12, 10, 1, 'started'),
(13, 11, 1, 'started'),
(13, 12, 1, 'started'),
(14, 11, 2, 'started'),
(14, 12, 2, 'started'),
(14, 19, 1, 'won'),
(14, 33, 1, 'won'),
(14, 45, 1, 'won'),
(14, 46, 1, 'loss'),
(14, 52, 1, 'started'),
(15, 13, 1, 'won'),
(15, 14, 1, 'started'),
(16, 14, 2, 'started'),
(17, 15, 1, 'started'),
(17, 16, 1, 'started'),
(18, 15, 2, 'started'),
(18, 16, 2, 'started'),
(19, 17, 1, 'started'),
(19, 18, 1, 'won'),
(19, 33, 2, 'won'),
(19, 50, 1, 'started'),
(19, 54, 2, 'started'),
(20, 17, 2, 'started'),
(20, 54, 1, 'started'),
(20, 55, 1, 'started'),
(21, 23, 1, 'started'),
(23, 24, 1, 'started'),
(23, 25, 1, 'started'),
(24, 25, 2, 'started'),
(25, 26, 1, 'started'),
(27, 26, 2, 'started'),
(29, 28, 1, 'started'),
(33, 30, 1, 'started'),
(34, 30, 2, 'started'),
(35, 31, 1, 'started'),
(35, 32, 1, 'started'),
(35, 41, 1, 'started'),
(36, 31, 2, 'started'),
(36, 32, 2, 'started'),
(36, 41, 2, 'started'),
(39, 44, 1, 'started'),
(40, 44, 2, 'started'),
(42, 45, 2, 'won'),
(46, 50, 2, 'started'),
(58, 52, 2, 'started'),
(62, 53, 2, 'tied'),
(64, 55, 2, 'started'),
(66, 56, 1, 'started'),
(67, 57, 1, 'tied'),
(67, 58, 1, 'started'),
(67, 59, 1, 'started'),
(67, 60, 1, 'started'),
(67, 61, 1, 'started'),
(67, 62, 1, 'started'),
(67, 63, 1, 'started'),
(67, 64, 1, 'started'),
(67, 65, 1, 'started'),
(67, 66, 1, 'started'),
(67, 67, 1, 'started'),
(67, 68, 1, 'started'),
(67, 69, 1, 'started'),
(67, 70, 1, 'started'),
(67, 71, 1, 'started'),
(68, 57, 2, 'tied'),
(69, 72, 1, 'started'),
(70, 73, 1, 'started'),
(71, 73, 2, 'started'),
(72, 74, 1, 'started'),
(73, 74, 2, 'started'),
(74, 75, 1, 'started'),
(74, 76, 1, 'started'),
(74, 77, 1, 'started'),
(75, 75, 2, 'started'),
(75, 76, 2, 'started'),
(75, 77, 2, 'started'),
(76, 80, 1, 'started'),
(76, 81, 1, 'won'),
(77, 80, 2, 'started'),
(77, 81, 2, 'started'),
(81, 82, 1, 'started'),
(82, 83, 1, 'started'),
(82, 84, 1, 'started'),
(82, 85, 1, 'started');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`challengecategory_id`) REFERENCES `challenge_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `challenges_ibfk_3` FOREIGN KEY (`suggestedchallenge_id`) REFERENCES `suggested_challenges` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `challenge_details`
--
ALTER TABLE `challenge_details`
  ADD CONSTRAINT `challenge_details_ibfk_9` FOREIGN KEY (`challengetype_id`) REFERENCES `challenge_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`mediumcategory_id`) REFERENCES `medium_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `suggested_challenges`
--
ALTER TABLE `suggested_challenges`
  ADD CONSTRAINT `suggested_challenges_ibfk_1` FOREIGN KEY (`challengecategory_id`) REFERENCES `challenge_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `suggested_challenges_ibfk_2` FOREIGN KEY (`challengetype_id`) REFERENCES `challenge_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_challenges`
--
ALTER TABLE `user_challenges`
  ADD CONSTRAINT `user_challenges_ibfk_7` FOREIGN KEY (`usercategory_id`) REFERENCES `user_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
