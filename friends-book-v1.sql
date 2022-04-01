-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 03:13 PM
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
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores the ids of users who are friends in pairs';

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'globally unique user ID',
  `email` varchar(256) NOT NULL COMMENT 'following RFC standards',
  `username` varchar(32) NOT NULL COMMENT 'globally unique user handle',
  `password` varchar(64) NOT NULL,
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
(4, 'sdadsad', 'asdasd', 'asdad', 'asda', '2022-04-01 00:00:00', 12, 'female', 'ahmad', 'ahamd', NULL);

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
  ADD KEY `sync_comments_with_post` (`post_id`),
  ADD KEY `sync_comment_with_author` (`commenter_id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`friend1_id`,`friend2_id`),
  ADD KEY `auto_delete_friendship2` (`friend2_id`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'globally unique user ID', AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `sync_comment_with_author` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sync_comments_with_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `auto_delete_friendship` FOREIGN KEY (`friend1_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_delete_friendship2` FOREIGN KEY (`friend2_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `null_user_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
