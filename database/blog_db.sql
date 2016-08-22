-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 06:24 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments_table`
--

CREATE TABLE `comments_table` (
  `comment_id` int(11) NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_message` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_table`
--

INSERT INTO `comments_table` (`comment_id`, `comment_author`, `comment_message`, `post_id`) VALUES
(2, 'Sanchit', 'This post is very helpful.', 4),
(3, 'Sanchit', '        This post is good', 4),
(5, 'Sanchit', '        I like the post very much', 4),
(6, 'Sanchit', '        This post is good', 5),
(7, 'Sanchit', '        GOod Topic', 2),
(12, 'Sanchit', '				Leave your mark here....\r\n				', 10),
(13, 'Sanchit', 'whatever\r\n				', 10),
(14, 'Sanchit', 'with some quite full glithes\r\n				', 10),
(15, 'Sanchit', 'a wonderful gaming experience\r\n				', 10),
(16, 'tins nagar', 'This article is very helpful.', 14),
(17, 'Sanchit', 'This post is good', 15),
(18, 'sanchit', 'This post is good.', 23);

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_by` varchar(150) NOT NULL,
  `post_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_tag` varchar(150) NOT NULL,
  `post_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `post_title`, `post_by`, `post_on`, `post_tag`, `post_message`) VALUES
(1, 'HTML Introduction', 'Sanchit', '2016-07-21 18:20:12', 'html', 'With HTML you can create your own Web site.\r\nThis tutorial teaches you everything about HTML.\r\nHTML is easy to learn - You will enjoy it.'),
(2, 'CSS Introduction', 'Sanchit', '2016-07-21 21:42:58', 'css', 'CSS is a stylesheet language that describes the presentation of an HTML (or XML) document.\r\n\r\nCSS describes how elements must be rendered on screen, on paper, or in other media.\r\n\r\nThis tutorial will teach you CSS from basic to advanced.'),
(3, 'HTML Basics', 'Sanchit', '2016-07-21 21:57:56', 'html', 'HTML is a markup language for describing web documents (web pages).\r\n\r\nHTML stands for Hyper Text Markup Language\r\nA markup language is a set of markup tags\r\nHTML documents are described by HTML tags\r\nEach HTML tag describes different document content\r\n'),
(4, 'PHP Introduction', 'Sanchit', '2016-07-21 22:09:09', 'php', 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.\r\n\r\nPHP is a widely-used, free, and efficient alternative to competitors such as Microsoft''s ASP.'),
(5, 'HTML Syntax', 'Sanchit', '2016-07-21 23:31:56', 'html', 'HTML can be edited by using professional HTML editors like:\r\n\r\nMicrosoft WebMatrix\r\nSublime Text\r\nHowever, for learning HTML we recommend a text editor like Notepad (PC) or TextEdit (Mac).\r\n\r\nWe believe using a simple text editor is a good way to learn HTML.\r\n\r\nFollow the 4 steps below to create your first web page with Notepad.\r\n\r\n'),
(6, 'PHP Basics', 'Sanchit', '2016-07-22 14:56:05', 'php', 'PHP is an acronym for "PHP: Hypertext Preprocessor"\r\nPHP is a widely-used, open source scripting language\r\nPHP scripts are executed on the server\r\nPHP is free to download and use\r\n'),
(7, 'PHP syntax', 'Jack', '2016-07-22 15:03:04', 'php', 'PHP files can contain text, HTML, CSS, JavaScript, and PHP code\r\nPHP code are executed on the server, and the result is returned to the browser as plain HTML'),
(8, 'Understanding PHP', 'Jack', '2016-07-22 15:03:38', 'php', 'PHP files can contain text, HTML, CSS, JavaScript, and PHP code\r\nPHP code are executed on the server, and the result is returned to the browser as plain HTML'),
(9, 'Javascript Introduction', 'Sanchit', '2016-07-22 19:44:09', 'jscript', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nProgramming makes computers do what you want them to do.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.'),
(10, 'Pokemon Go!', 'Sanchit', '2016-07-22 19:47:24', 'pokego', 'go 4 pokemon go'),
(11, 'Blog App', 'Sanchit', '2016-07-24 14:35:47', 'blogapp', 'A blog application should be able to show multiple posts.'),
(12, 'SQL Basics', 'Sanchit', '2016-07-24 14:37:28', 'sql', 'SQL is a standard language for accessing databases.\r\n\r\nOur SQL tutorial will teach you how to use SQL to access and manipulate data in: MySQL, SQL Server, Access, Oracle, Sybase, DB2, and other database systems.'),
(13, 'Bootstrap', 'Sanchit', '2016-07-24 14:39:06', 'bootstrap', 'Bootstrap is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first web sites.\r\n\r\nBootstrap is completely free to download and use!'),
(14, 'CSS padding', 'Sanchit', '2016-07-24 15:18:24', 'css', 'The CSS padding properties define the white space between the element content and the element border.\r\n\r\nThe padding clears an area around the content (inside the border) of an element.\r\n\r\nNote	Note: The padding is affected by the background color of the element!\r\nWith CSS, you have full control over the padding. There are CSS properties for setting the padding for each side of an element (top, right, bottom, and left).The CSS padding properties define the white space between the element content and the element border.\r\n\r\nThe padding clears an area around the content (inside the border) of an element.\r\n\r\nNote	Note: The padding is affected by the background color of the element!\r\nWith CSS, you have full control over the padding. There are CSS properties for setting the padding for each side of an element (top, right, bottom, and left).The CSS padding properties define the white space between the element content and the element border.\r\n\r\nThe padding clears an area around the content (inside the border) of an element.\r\n\r\nNote	Note: The padding is affected by the background color of the element!\r\nWith CSS, you have full control over the padding. There are CSS properties for setting the padding for each side of an element (top, right, bottom, and left).'),
(21, 'ducat', 'ducat', '2016-07-26 10:37:30', 'ducat', 'DucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucatDucat'),
(22, 'hack', 'sanchit', '2016-08-18 01:14:56', 'hacking', ''';'),
(23, 'New article', 'sanchit', '2016-08-20 00:08:40', 'newtag', 'New article body');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'Sanchit', 'wolf'),
(2, 'Jack', 'blackperl'),
(3, 'tins', 'tinsgreat'),
(5, 'knight', 'alpha'),
(8, 'alpha', 'knight'),
(10, 'beta', 'b'),
(11, 'victory', 'v'),
(12, 'user', 'pass'),
(15, 'new', 'pass'),
(16, 'new user', 'pass'),
(17, 'hello', 'sd'),
(78, 'tins nagar', 'snapdragon'),
(79, 'anuj', 'anuj'),
(80, 'ducat', 'ducat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments_table`
--
ALTER TABLE `comments_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_table`
--
ALTER TABLE `comments_table`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
