-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.epizy.com
-- Generation Time: Aug 29, 2021 at 08:30 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29329584_eailio`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(250) NOT NULL,
  `name` varchar(60) NOT NULL,
  `user` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(60) NOT NULL,
  `one` text NOT NULL,
  `one_name` varchar(60) NOT NULL,
  `two` text NOT NULL,
  `two_name` varchar(60) NOT NULL,
  `three` text NOT NULL,
  `three_name` varchar(60) NOT NULL,
  `four` text NOT NULL,
  `four_name` varchar(60) NOT NULL,
  `five` text NOT NULL,
  `five_name` varchar(60) NOT NULL,
  `six` text NOT NULL,
  `six_name` varchar(60) NOT NULL,
  `seven` text NOT NULL,
  `seven_name` varchar(60) NOT NULL,
  `eight` text NOT NULL,
  `eight_name` varchar(60) NOT NULL,
  `nine` text NOT NULL,
  `nine_name` varchar(60) NOT NULL,
  `ten` text NOT NULL,
  `ten_name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(24) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `user_by` varchar(50) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `code` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(24) NOT NULL,
  `post_id` int(24) NOT NULL,
  `comment_user` varchar(24) NOT NULL,
  `comment_body` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_user`, `comment_body`, `date`) VALUES
(1, 1, 'George5000', 'Nice car', '2021-08-05'),
(2, 1, 'Martin', 'Nice Car', '2021-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `friends_requests`
--

CREATE TABLE `friends_requests` (
  `id` int(250) NOT NULL,
  `user_from` text NOT NULL,
  `user_to` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_requests`
--

INSERT INTO `friends_requests` (`id`, `user_from`, `user_to`) VALUES
(3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(24) NOT NULL,
  `post_id` int(24) NOT NULL,
  `user_like` varchar(24) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_like`) VALUES
(3, 1, 'George5000'),
(4, 1, 'Martin');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(250) NOT NULL,
  `subject` text NOT NULL,
  `user_from` text NOT NULL,
  `user_to` text NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` text NOT NULL,
  `trash` text NOT NULL,
  `album` varchar(60) NOT NULL,
  `photo` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `user_from`, `user_to`, `msg_body`, `date`, `opened`, `trash`, `album`, `photo`) VALUES
(1, 'Math', 'Martin', 'George5000', 'YAA', '2021-08-05', 'no', 'no', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `photoes`
--

CREATE TABLE `photoes` (
  `id` int(24) NOT NULL,
  `name` varchar(24) NOT NULL,
  `category` varchar(24) NOT NULL,
  `url` varchar(200) NOT NULL,
  `user` varchar(24) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photoes`
--

INSERT INTO `photoes` (`id`, `name`, `category`, `url`, `user`, `date`) VALUES
(1, 'Car', 'Cars', 'users/Martin/Car/Car.jpg', 'Martin', '2021-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(250) NOT NULL,
  `body` text NOT NULL,
  `date_added` date NOT NULL,
  `added_by` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `album` varchar(24) DEFAULT NULL,
  `photo` varchar(24) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `likes`, `album`, `photo`) VALUES
(1, 'An awesom car', '2021-08-05', 'Martin', 2, 'none', 'Car');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date` date NOT NULL,
  `activated` int(1) NOT NULL DEFAULT '0',
  `country` text,
  `gender` text,
  `address` text,
  `About` text,
  `avatar` text NOT NULL,
  `friends_array` text,
  `user_pos` varchar(25) NOT NULL DEFAULT 'nor',
  `avalabile` varchar(24) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `date`, `activated`, `country`, `gender`, `address`, `About`, `avatar`, `friends_array`, `user_pos`, `avalabile`, `place`) VALUES
(12, 'George', 'Joseph', 'George5000', 'georgejoseph5000@gmail.com', 'Ge24112003', '2020-06-20', 1, 'Egypt', 'Male', 'I did not write my address.', 'I did not write my about paragraph.', 'users/George5000/proimages/75829.jpg', ',Martin', 'admin', 'true', 'Sahara'),
(14, 'Martin', 'Sherif', 'Martin', 'martin@gmail.com', '1234', '2021-08-05', 1, 'Egypt', 'Male', 'I did not write my address.', 'I did not write my about paragraph.', 'users/Martin/proimages/52597.jpeg', ',George5000', 'mod', 'true', 'Sahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends_requests`
--
ALTER TABLE `friends_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photoes`
--
ALTER TABLE `photoes`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `friends_requests`
--
ALTER TABLE `friends_requests`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photoes`
--
ALTER TABLE `photoes`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
