-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2022 at 06:17 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u289937012_cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_login`
--

CREATE TABLE `daily_login` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `datee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_login`
--

INSERT INTO `daily_login` (`id`, `u_id`, `datee`, `week_start`, `week_end`) VALUES
(151, 1, '30/06/2022', '27/06/2022', '03/07/2022'),
(152, 38, '03/07/2022', '27/06/2022', '03/07/2022'),
(153, 38, '05/07/2022', '04/07/2022', '10/07/2022'),
(154, 38, '06/07/2022', '04/07/2022', '10/07/2022'),
(155, 38, '08/07/2022', '04/07/2022', '10/07/2022'),
(156, 38, '20/07/2022', '18/07/2022', '24/07/2022'),
(157, 38, '22/07/2022', '18/07/2022', '24/07/2022'),
(158, 44, '22/07/2022', '18/07/2022', '24/07/2022'),
(159, 43, '23/07/2022', '18/07/2022', '24/07/2022'),
(160, 38, '23/07/2022', '18/07/2022', '24/07/2022'),
(161, 43, '24/07/2022', '18/07/2022', '24/07/2022'),
(162, 43, '26/07/2022', '25/07/2022', '31/07/2022');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `image`, `game`) VALUES
(1, 'Moto x3 war', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/MotoX3mPoolPartyTeaser.jpg?v=0.2-c9592375', 'https://play.famobi.com/moto-x3m-pool-party'),
(2, 'Archery world', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/ArcheryWorldTourTeaser.jpg?v=0.2-c9592375', 'https://play.famobi.com/archery-world-tour'),
(3, 'Totemia: cursed', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/TotemiaCursedMarblesTeaser.jpg?v=0.2-c9592375', 'https://play.famobi.com/totemia-cursed-marbles'),
(4, 'Jetpack joyride', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/JetpackJoyrideTeaser.jpg?v=0.2-c9592375', 'https://play.famobi.com/jetpack-joyride'),
(6, 'Zoo boom', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/ZooBoomTeaser.jpg?v=0.2-6ecdaa3e', 'https://play.famobi.com/zoo-boom'),
(7, 'Tower crash ', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/TowerCrash3dTeaser.jpg?v=0.2-6ecdaa3e', 'https://play.famobi.com/tower-crash-3d'),
(8, 'CANNON BALLS 3D', 'https://img.cdn.famobi.com/portal/html5games/images/tmp/CannonBalls3dTeaser.jpg?v=0.2-fb5e3a79', 'https://play.famobi.com/cannon-balls-3d');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `package_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_blocked` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `package_name`, `license`, `is_blocked`) VALUES
(1, '0', '0', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `image`, `date`) VALUES
(96, 'test', 'tested', '', '2022-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `is_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `image`, `title`, `sub`, `offer_name`, `status`, `type`, `is_offer`) VALUES
(16, 'https://ugameleague.link/walletjoy/img/20220730_231533.png66876341', 'AdGetMedia', 'Adgetmedia', 'adget', 0, 0, 0),
(17, 'https://ugameleague.link/walletjoy/img/20220730_231244.png1062101139', 'Offer toro', 'Win Coins', 'toro', 0, 0, 0),
(18, 'https://ugameleague.link/walletjoy/img/20220730_231709.png1507155721', 'Ayet Studios', 'Win Coins', 'ayet', 0, 0, 0),
(19, 'https://ugameleague.link/walletjoy/img/20220731_212659.png1715258823', 'Facebook', 'Get Coins', 'fb', 1, 0, 1),
(21, 'https://ugameleague.link/walletjoy/img/20220731_155704.png1495473517', 'Unity', 'Get Coins', 'unity', 0, 0, 1),
(34, 'https://cash.hdcbbackground.com/img/telegram.png2012229406', 'Join Telegram', 'Join telegram for payment proof', 'https://google.com/', 0, 1, 0),
(36, 'https://ugameleague.link/walletjoy/img/20220731_213557.png1894272609', 'IronSource', 'Reward AD', 'iron', 0, 0, 1),
(37, 'https://ugameleague.link/walletjoy/img/20220731_213557.png1092590758', 'IronSource', 'IronSource', 'iron_offer', 0, 0, 0),
(38, 'https://ugameleague.link/walletjoy/img/20220731_213244.png809566955', 'Adcolony', 'Adcolony', 'colony', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_achi`
--

CREATE TABLE `ref_achi` (
  `id` int(11) NOT NULL,
  `invites` int(11) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_achi`
--

INSERT INTO `ref_achi` (`id`, `invites`, `points`) VALUES
(2, 5, 5000),
(3, 10, 1000),
(6, 20, 2000),
(8, 50, 5000),
(9, 100, 10000),
(10, 150, 15000),
(11, 200, 20000),
(12, 250, 25000),
(13, 300, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `ref_claim`
--

CREATE TABLE `ref_claim` (
  `id` int(11) NOT NULL,
  `achi_id` int(11) NOT NULL DEFAULT 0,
  `u_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_claim`
--

INSERT INTO `ref_claim` (`id`, `achi_id`, `u_id`) VALUES
(18, 1, 396),
(19, 2, 396),
(20, 3, 396),
(21, 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'More Details here...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `name`, `image`, `symbol`, `hint`, `input_type`, `details`) VALUES
(12, 'Paytm', 'https://ugameleague.link/walletjoy/img/20220823_221014.png1683210542', '₹', 'Enter Paytm Number', 'text', 'This is the demo detail text for this redeem'),
(14, 'Amazon Gift', 'https://ugameleague.link/walletjoy/img/20220823_221424.png779940240', '$', 'Enter Redeem Info', 'text', 'This is the demo detail text for this redeem'),
(15, 'Paypal', 'https://ugameleague.link/walletjoy/img/20220823_222000.png1333040116', '$', 'Enter paypal email', 'text', 'This is the demo detail text for this redeem');

-- --------------------------------------------------------

--
-- Table structure for table `reward_amounts`
--

CREATE TABLE `reward_amounts` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `coins` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_amounts`
--

INSERT INTO `reward_amounts` (`id`, `r_id`, `amount`, `coins`) VALUES
(1, 6, 1000, 10000),
(2, 6, 100, 150),
(3, 12, 250, 300),
(4, 13, 450, 450),
(5, 12, 1000, 101),
(6, 12, 650, 650),
(7, 12, 1500, 1500),
(9, 15, 1, 10),
(10, 15, 5, 50),
(11, 0, 500, 500),
(12, 12, 500, 500),
(13, 12, 1200, 1200),
(14, 15, 20, 100),
(15, 15, 10, 200),
(16, 15, 20, 500),
(18, 14, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `reward_list`
--

CREATE TABLE `reward_list` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coins_used` int(11) NOT NULL DEFAULT 0,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_list`
--

INSERT INTO `reward_list` (`id`, `u_id`, `package_name`, `p_details`, `coins_used`, `symbol`, `amount`, `date`, `time`, `status`, `package_id`) VALUES
(106, 55, 'Amazon Gift', 'test@gmail.com', 100, '$', '100', '2022-08-23', '10:21 pm', 3, 14),
(108, 59, 'Paytm', '8585858585', 101, '₹', '1000', '2022-08-26', '09:08 am', 1, 12),
(109, 59, 'Paypal', 'test@gmail.com', 50, '$', '5', '2022-08-26', '09:09 am', 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `daily_b_points` int(11) NOT NULL DEFAULT 20,
  `invited_user_bonus` int(11) NOT NULL DEFAULT 0,
  `referral_bonus` int(11) NOT NULL DEFAULT 0,
  `daily_spins` int(11) NOT NULL DEFAULT 0,
  `games` int(11) NOT NULL DEFAULT 0,
  `refer_msg` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `OT_PUB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OT_APP_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `OT_KEY` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `PF_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AG_WALLCODE` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fb_ad_id` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fb_ad_time` int(11) NOT NULL DEFAULT 1,
  `vpn` int(11) NOT NULL DEFAULT 0,
  `os_app_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `os_rest_api` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `daily_b_points`, `invited_user_bonus`, `referral_bonus`, `daily_spins`, `games`, `refer_msg`, `OT_PUB`, `OT_APP_ID`, `OT_KEY`, `PF_ID`, `AG_WALLCODE`, `fb_ad_id`, `fb_ad_time`, `vpn`, `os_app_id`, `os_rest_api`) VALUES
(1, 20, 20, 30, 10, 10, 'Its Just Wow! The Cash King App is best way to play games and earn rewards.', '30145', '14706', '2ae98ec02ae92e7c495823b50548b16e', '', 'n6aVrg', '505', 1000, 1, '79e8150d-6ad3-4e58-8193-3ed6c03bd665', 'MTJjOGZjZTctMDQ4Yy00YmUxLTlmYWItMTVhZTBmYTMwNjg5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_add` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`, `email`, `status`, `payment_add`, `company`, `profile`, `entry_date`, `update_date`) VALUES
(3, 'AA Developers', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'aadevelopers963@gmail.com', 0, '0', 'AADevelopers', 'https://cash.hdcbbackground.com/img/profile.png103700665', '0000-00-00', '2020-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`id`, `username`, `points`, `type`, `date`, `transation`, `time`) VALUES
(1, 'vortexrahul', '15', 'Spin & Win Reward', '2022-08-28', '', '01:30 pm'),
(2, 'mazatvapp', '1', 'Spin & Win Reward', '2022-11-08', '', '09:40 pm'),
(3, 'mazatvapp', '5', 'Video credit', '2022-11-08', '', '09:41 pm'),
(4, 'mazatvapp', '5', 'Video credit', '2022-11-08', '', '09:41 pm'),
(5, 'mazatvapp', '10', 'Daily checkin bonus', '2022-11-08', '', '09:42 pm'),
(6, 'freecbbackground', '10', 'Daily checkin bonus', '2022-11-08', '', '09:56 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fcm_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `points` bigint(255) NOT NULL DEFAULT 0,
  `refer` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_ref` int(11) NOT NULL DEFAULT 0,
  `task` int(11) NOT NULL DEFAULT 0,
  `ip_address` char(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(10) UNSIGNED DEFAULT 0,
  `refer_status` int(11) NOT NULL,
  `social_status` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `badge` int(11) NOT NULL,
  `device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `streak` int(11) NOT NULL DEFAULT 0,
  `long_streak` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `fcm_id`, `points`, `refer`, `total_ref`, `task`, `ip_address`, `status`, `refer_status`, `social_status`, `date_registered`, `phone`, `image`, `badge`, `device`, `streak`, `long_streak`) VALUES
(61, 'Maza Tv', 'mazatvapp', '', 'mazatvapp@gmail.com', 'FirebaseInstanceId.getInstance().getToken()', 21, 'RU2N16CN', 0, 0, '', 0, 0, '', '2022-11-08 16:06:20', '0000000000', 'https://lh3.googleusercontent.com/a/ALm5wu3LRxdIHTpWs3lccDO-IV6LoJ2Q8vMqs4kpDUPr=s96-c', 1, '4f273021d446fa90', 0, 0),
(62, 'Big Loot', 'freecbbackground', '', 'freecbbackground@gmail.com', 'FirebaseInstanceId.getInstance().getToken()', 10, 'BCCYOXU5', 0, 0, '', 0, 0, '', '2022-11-08 16:25:14', '0000000000', 'https://lh3.googleusercontent.com/a/ALm5wu32QFhf3K9mflU2rVTxTRBTAdAZmBnVZRBdbIZ-=s96-c', 1, 'acc39dfacdfc58f9', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_login`
--
ALTER TABLE `daily_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_achi`
--
ALTER TABLE `ref_achi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_claim`
--
ALTER TABLE `ref_claim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_amounts`
--
ALTER TABLE `reward_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_list`
--
ALTER TABLE `reward_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_login`
--
ALTER TABLE `daily_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ref_achi`
--
ALTER TABLE `ref_achi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_claim`
--
ALTER TABLE `ref_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reward_amounts`
--
ALTER TABLE `reward_amounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reward_list`
--
ALTER TABLE `reward_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
