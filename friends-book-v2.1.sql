-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 09:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends-book-v0.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL COMMENT 'user_id of the user with admin perms'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores the user_id''s of admins';

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `post_id` bigint(20) NOT NULL COMMENT 'uniquely globally IDs parent post for a given comment id',
  `comment_id` int(11) NOT NULL COMMENT 'uniquely IDs comment with respect to a post',
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'time stamp of posting',
  `content` varchar(1024) NOT NULL COMMENT 'text contents',
  `commenter_id` int(11) DEFAULT NULL COMMENT 'user_id of the user who posted his comment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='store data for comments per comment/post combination';

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `friend1_id` int(11) NOT NULL COMMENT 'the id of the user who initiated the friend request',
  `friend2_id` int(11) NOT NULL COMMENT 'the id of the user who received the friend request',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `accepted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'whether or not this request has been accepted '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores the ids of users who are friends in pairs';

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`friend1_id`, `friend2_id`, `date_created`, `accepted`) VALUES
(24, 5, '2022-05-10 20:28:03', 0),
(24, 7, '2022-05-10 20:30:11', 0),
(43, 7, '2022-05-11 22:09:19', 0),
(44, 42, '2022-05-13 15:36:11', 1),
(44, 43, '2022-05-13 15:36:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `post_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL COMMENT 'uniquely identifies message globally and with a chat given 2 identical user ids',
  `sender_id` int(11) DEFAULT NULL COMMENT 'uniquely identifies chat along with recipient_id',
  `recipient_id` int(11) DEFAULT NULL COMMENT 'uniquely identifies chat along with sender_id',
  `content` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'timestamp of when the message was added to the db'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender_id`, `recipient_id`, `content`, `timestamp`) VALUES
(1, NULL, NULL, 'TEST', '2022-05-12 00:06:34'),
(2, NULL, NULL, 'TEST', '2022-05-12 00:07:19'),
(3, NULL, NULL, 'TEST', '2022-05-12 00:07:38'),
(4, NULL, NULL, 'TEST', '2022-05-12 00:07:41'),
(5, NULL, NULL, 'TEST', '2022-05-12 00:07:46'),
(6, NULL, 24, 'TEST', '2022-05-12 21:41:50'),
(7, NULL, NULL, 'TEST-RECIEVED', '2022-05-12 21:42:20'),
(8, NULL, NULL, 'TEST-RECIEVED', '2022-05-12 21:42:25'),
(9, NULL, NULL, 'TEST', '2022-05-12 22:13:07'),
(10, NULL, NULL, 'TEST', '2022-05-12 22:24:41'),
(11, NULL, NULL, 'TEST', '2022-05-12 22:24:44'),
(12, NULL, NULL, 'TEST', '2022-05-12 22:25:43'),
(13, NULL, NULL, 'TEST', '2022-05-12 22:25:44'),
(14, NULL, NULL, 'TEST', '2022-05-12 22:26:35'),
(15, NULL, NULL, 'asd', '2022-05-12 22:33:48'),
(16, NULL, NULL, 'asd', '2022-05-12 22:34:07'),
(17, NULL, NULL, 'asd', '2022-05-12 22:34:11'),
(18, NULL, NULL, 'asd', '2022-05-12 22:34:14'),
(19, NULL, NULL, 'asd', '2022-05-12 22:34:16'),
(20, NULL, NULL, 'TEST SENT VIA MESSENGER', '2022-05-12 22:36:51'),
(21, NULL, NULL, 'g', '2022-05-13 14:41:57'),
(22, NULL, NULL, 'send message', '2022-05-13 14:44:12'),
(23, NULL, NULL, 'amog', '2022-05-13 15:09:29'),
(24, NULL, NULL, 'asdasdas', '2022-05-13 15:22:07'),
(25, NULL, NULL, 'amogus', '2022-05-13 15:27:57'),
(26, NULL, NULL, 'amgus???', '2022-05-13 15:28:08'),
(27, 42, NULL, 'hgello', '2022-05-13 15:33:44'),
(28, 43, 44, 'hello mr', '2022-05-13 15:41:45'),
(29, 44, 43, 'can i buy this app?????????????', '2022-05-13 15:42:06'),
(30, 43, 44, 'no', '2022-05-13 15:42:11'),
(31, 44, 43, ':dies:', '2022-05-13 15:42:16'),
(32, 44, 43, 'pls sell it to me i beg u', '2022-05-13 16:07:32'),
(33, 43, 44, 'no lol', '2022-05-13 16:07:39'),
(34, 44, 43, 'im literally dying rn', '2022-05-13 16:10:24'),
(35, 44, 43, 'can i buy it now', '2022-05-13 16:23:03'),
(36, 43, 44, 'no', '2022-05-13 16:23:07'),
(37, 42, 44, 'hello lizard man', '2022-05-13 17:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) NOT NULL COMMENT 'globally unique post ID',
  `author_id` int(11) NOT NULL COMMENT 'user_id of the posts author',
  `content` varchar(4096) NOT NULL COMMENT 'text content of the post ',
  `post_timestamp` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'time of posting',
  `image` varchar(128) NOT NULL COMMENT 'URL of the image contained in the post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author_id`, `content`, `post_timestamp`, `image`) VALUES
(1, 5, 'asdasdasd', '2022-04-01 19:15:42', ''),
(2, 5, 'asdasdasd', '2022-04-01 19:15:46', ''),
(3, 5, 'asdasdasd', '2022-04-01 19:15:54', ''),
(4, 5, 'asdasdasd', '2022-04-01 19:15:57', ''),
(5, 7, 'DUMMY TEXT', '2022-04-01 19:16:20', ''),
(6, 7, 'DUMMY TEXT', '2022-04-01 19:16:24', ''),
(7, 12, 'asdd', '2022-04-01 20:39:40', ''),
(8, 12, 'DUMMY CONTENT', '2022-04-01 20:39:51', ''),
(10, 11, 'DUMMY CONTENT', '2022-04-01 20:40:04', ''),
(11, 7, 'DUMMY CONTENT', '2022-04-01 20:40:10', ''),
(13, 4, 'DUMMY CONTENT', '2022-04-01 20:40:23', ''),
(14, 5, 'DUMMY CONTENT', '2022-04-01 20:40:27', ''),
(15, 14, 'DUMMY CONTENT', '2022-04-01 20:40:32', ''),
(16, 13, 'DUMMY CONTENT', '2022-04-01 20:40:37', ''),
(17, 15, 'DUMMY CONTENT', '2022-04-01 20:40:41', ''),
(18, 16, 'DUMMY CONTENT', '2022-04-01 20:40:46', ''),
(19, 17, 'DUMMY CONTENT', '2022-04-01 20:40:51', ''),
(20, 12, 'DUMMY CONTENT', '2022-04-01 20:41:24', ''),
(21, 22, '', '2022-04-01 20:41:24', ''),
(22, 12, 'DUMMY CONTENT', '2022-04-01 20:42:28', ''),
(23, 22, '', '2022-04-01 20:42:28', ''),
(24, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(25, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(26, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(27, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(28, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(29, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(30, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(31, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(32, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(33, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(34, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(35, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(36, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(37, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(38, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(39, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(40, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(41, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(42, 14, 'CONTENT', '2022-04-01 20:42:28', ''),
(43, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(44, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(45, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(46, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(47, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(48, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(49, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(50, 16, 'CONTENT', '2022-04-01 20:42:28', ''),
(53, 26, 'this is content', '2022-05-07 14:07:54', ''),
(54, 26, 'TEST', '2022-05-07 14:07:58', ''),
(55, 26, 'TESTsadas updated tiwce ', '2022-05-07 14:08:00', ''),
(56, 26, 'TEST', '2022-05-07 14:08:03', ''),
(57, 26, 'TEST-updated', '2022-05-07 14:08:06', ''),
(58, 42, 'Wow! this is so much better than Facebook!\r\nIm going to delete Facebook now!\r\n#FriendsBookForLyfe', '2022-05-09 10:56:45', ''),
(59, 42, '@billgates you should try this site!!!!!!', '2022-05-09 10:59:53', ''),
(61, 26, 'adsada', '2022-05-10 17:30:07', ''),
(62, 26, 'new post added via the form', '2022-05-10 17:30:37', ''),
(64, 43, 'I should have bought this instead of Twitter!', '2022-05-11 22:09:58', ''),
(65, 24, 'post added via LAN', '2022-05-13 14:31:59', ''),
(66, 24, '     <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Sag_A%2A.jpg/140px-Sag_A%2A.jpg\" alt=\"Your image url\" width=\"500\" height=\"600\">', '2022-05-13 14:34:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'globally unique user ID',
  `email` varchar(256) NOT NULL COMMENT 'following RFC standards',
  `username` varchar(32) NOT NULL COMMENT 'globally unique user handle',
  `password` varchar(600) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'date of account creation',
  `address` int(11) NOT NULL COMMENT 'location ID',
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `image` varchar(128) DEFAULT NULL COMMENT 'image URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores user info';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `phone`, `date_joined`, `address`, `gender`, `fname`, `lname`, `image`) VALUES
(5, 'test@test.com', 'ahmad', '1bc1a361f17092bc7af4b2f82bf9194ea9ee2ca49eb2e53e39f555bc1eeaed74', '213123', '2022-04-01 19:01:39', 231313, 'prefer not to say', 'ahmad', 'ahmad', NULL),
(7, 'test2@test.com', 'mahmoud', '1bc1a361f17092bc7af4b2f82bf9194ea9ee2ca49eb2e53e39f555bc1eeaed74', '213123', '2022-04-01 19:02:13', 231313, 'prefer not to say', 'ahmad', 'ahmad', NULL),
(24, '1', '1', 'dc90cf07de907ccc64636ceddb38e552a1a0d984743b1f36a447b73877012c39', '', '2022-04-02 00:03:12', 1, 'female', '1', '1', '1'),
(25, 'test', 'TEST', '1bc1a361f17092bc7af4b2f82bf9194ea9ee2ca49eb2e53e39f555bc1eeaed74', 'asda', '2022-04-02 14:50:51', 213, 'male', '2war', 'asf2a', 'asdfa3'),
(41, 'ahmad2', 'ahmad2', '72937327697bf644548838e32b7922d6757a44654606d227826d9a01c3ce7fa7', 'ahmad2', '2022-04-02 15:26:39', 123, '', 'ahmad2', 'ahmad2', NULL),
(42, 'mark@mark.mark', 'lizard', 'fcea73f0c0a2e83b76956797b4b37ac2b41aadf27cdb59330a09b44166fc43cc', '1', '2022-05-09 10:54:30', 1, '', 'Mark', 'Zuckerberg', NULL),
(43, 'elon@musk.net', 'elon', '455a12103cb8d4070d632902ae80f2d9a951f4669c59dc63ea952dafcd892b4c', '1234567890', '2022-05-11 22:08:47', 0, '', 'Elon', 'Musk', NULL),
(44, 'yamen@yamen.yamen', 'yamen', '663d24d64190f1480305e35eccd3594a20f9e516ef0d811e91a2bcf5a76297f1', 'yamen', '2022-05-13 15:35:56', 0, '', 'Yamen', 'W', NULL),
(45, 'hashed', 'hashed', 'a29b98082456be50d4311a05add3543e45a43c29d079cbd621625786a4912fa6', 'hashed', '2022-05-13 22:21:51', 1, '', 'hashed', 'hashed', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD KEY `auto_update_admin_id` (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`,`post_id`),
  ADD KEY `sync_comment_with_author` (`commenter_id`),
  ADD KEY `auto_delete_with_post` (`post_id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`friend1_id`,`friend2_id`),
  ADD KEY `auto_delete_friendship2` (`friend2_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `delete_likes_with_post` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `null_sender_on_delete_msg` (`sender_id`),
  ADD KEY `null_recipient_on_delete_msg` (`recipient_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `null_user_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email_index` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uniquely IDs comment with respect to a post', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uniquely identifies message globally and with a chat given 2 identical user ids', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'globally unique post ID', AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'globally unique user ID', AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `auto_update_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `auto_delete_with_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sync_comment_with_author` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `auto_delete_friendship` FOREIGN KEY (`friend1_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_delete_friendship2` FOREIGN KEY (`friend2_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `delete_likes_with_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_likes_with_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `null_recipient_on_delete_msg` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `null_sender_on_delete_msg` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
