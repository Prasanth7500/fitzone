-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221113.0eded7bb43
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 07:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'First comment!!!', 'praba_karan', '', '2022-07-30 01:26:48', 'no', 0),
(5, 'nice test', 'praba_karan', 'praba_karan', '2022-08-07 16:03:09', 'no', 15),
(6, 'what are these dots', 'praba_karan', 'prasanth_rm', '2022-08-07 16:16:16', 'no', 22),
(7, 'tell me', 'praba_karan', 'prasanth_rm', '2022-08-07 16:18:10', 'no', 22);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` text NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, 'This is the first post', 'praba_karan', 'none', '2022-05-13 07:41:07', 'no', 'no', 0),
(2, 'hello', 'praba_karan', 'none', '2022-05-13 07:46:19', 'no', 'no', 0),
(3, 'hello', 'praba_karan', 'none', '2022-05-13 07:48:28', 'no', 'no', 0),
(4, 'hi', 'praba_karan', 'none', '2022-05-13 07:48:34', 'no', 'no', 0),
(5, 'hello', 'albert_raj', 'none', '2022-05-19 03:09:28', 'no', 'no', 0),
(6, 'hello albert', 'prasanth_rm', 'none', '2022-05-19 14:22:14', 'no', 'no', 0),
(7, 'hello prasanth', 'albert_raj', 'none', '2022-05-19 14:22:40', 'no', 'no', 0),
(8, 'hi', 'praba_karan', 'none', '2022-05-19 16:51:58', 'no', 'no', 0),
(9, 'hello', 'albert_raj', 'none', '2022-05-19 16:52:34', 'no', 'no', 0),
(10, 'hi', 'praba_karan', 'none', '2022-07-15 04:02:00', 'no', 'no', 0),
(11, 'how are you', 'praba_karan', 'none', '2022-07-15 04:10:46', 'no', 'no', 0),
(12, 'test', 'praba_karan', 'none', '2022-07-15 04:11:11', 'no', 'no', 0),
(13, 'test1', 'praba_karan', 'none', '2022-07-15 04:11:17', 'no', 'no', 0),
(14, 'test2', 'praba_karan', 'none', '2022-07-15 04:11:21', 'no', 'no', 0),
(15, 'test3', 'praba_karan', 'none', '2022-07-15 04:11:25', 'no', 'no', 0),
(16, 'hello', 'prasanth_rm', 'none', '2022-07-15 04:27:05', 'no', 'no', 0),
(17, '.', 'prasanth_rm', 'none', '2022-07-15 04:41:08', 'no', 'no', 0),
(18, '..', 'prasanth_rm', 'none', '2022-07-15 04:41:10', 'no', 'no', 0),
(19, '....', 'prasanth_rm', 'none', '2022-07-15 04:41:12', 'no', 'no', 0),
(20, '......', 'prasanth_rm', 'none', '2022-07-15 04:41:13', 'no', 'no', 0),
(21, '..........', 'prasanth_rm', 'none', '2022-07-15 04:41:17', 'no', 'no', 0),
(22, '..........', 'prasanth_rm', 'none', '2022-07-15 04:41:21', 'no', 'no', 0),
(23, 'hello', 'prasanth_rm', 'none', '2022-10-19 07:37:34', 'no', 'no', 0),
(24, 'hello', 'prasanth_rm', 'none', '2022-10-19 07:37:36', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Praba', 'Karan', 'praba_karan', 'Praba1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-04-22', 'assets/images/profile_pics/defaults/head_deep_blue.png', 11, 0, 'no', ',prasanth_rm,albert_raj,'),
(16, 'Albert', 'Raj', 'albert_raj', 'Albertraj@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-05-19', 'assets/images/profile_pics/defaults/head_deep_blue.png', 3, 0, 'no', ','),
(17, 'Prasanth', 'Rm', 'prasanth_rm', 'Prasanth@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-05-19', 'assets/images/profile_pics/defaults/head_emerald.png', 10, 0, 'no', ',praba_karan,albert_raj,'),
(19, '12', '23', '12_23', 'Praba2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-07-27', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
