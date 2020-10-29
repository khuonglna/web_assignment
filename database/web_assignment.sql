-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 02:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `a_id` int(3) NOT NULL,
  `q_id` int(3) NOT NULL,
  `a_text` varchar(200) NOT NULL,
  `a_correct_flag` int(1) NOT NULL COMMENT 'correct answer flag'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `q_id`, `a_text`, `a_correct_flag`) VALUES
(1, 1, 'aunt ', 0),
(2, 1, 'cousin ', 0),
(3, 1, 'sister ', 1),
(4, 2, 'auntie', 0),
(5, 2, 'great aunt', 0),
(6, 2, 'grandmother', 1),
(7, 3, 'uncle', 0),
(8, 3, 'brother', 1),
(9, 3, 'cousin', 0),
(10, 4, 'step-brother', 1),
(11, 4, 'brother-in-law', 0),
(12, 4, 'step-son', 0),
(13, 5, 'nephew', 0),
(14, 5, 'niece', 1),
(15, 5, 'cousin', 0),
(16, 6, 'step-children', 0),
(17, 6, 'cousins', 1),
(18, 6, 'nephews and nieces', 0),
(19, 7, 'great uncle', 0),
(20, 7, 'great grandpa', 1),
(21, 7, 'great great grandpa', 0),
(22, 8, 'uncle', 1),
(23, 8, 'cousin', 0),
(24, 8, 'brother-in-law', 0),
(25, 9, 'brother-in-law', 1),
(26, 9, 'sibling', 0),
(27, 9, 'husband-in-law', 0),
(28, 10, 'grandmother', 0),
(29, 10, 'mother-in-law', 0),
(30, 10, 'wife', 1),
(31, 11, 'is sleeping', 1),
(32, 11, 'sleep', 0),
(33, 11, 'sleeps ', 0),
(34, 12, 'never watch', 0),
(35, 12, 'watch never ', 0),
(36, 12, 'never watches', 1),
(37, 13, 'is boiling ', 0),
(38, 13, 'boil', 0),
(39, 13, 'boils ', 1),
(40, 14, 'usually has', 1),
(41, 14, 'usually have', 0),
(42, 14, 'has usually', 0),
(43, 15, 'don\'t do', 0),
(44, 15, 'am not doing', 1),
(45, 15, 'doesn\'t do', 0),
(46, 16, 'sold', 1),
(47, 16, 'sell', 0),
(48, 16, 'selled ', 0),
(49, 17, 'didn\'t drink', 1),
(50, 17, 'didn\'t drank ', 0),
(51, 17, 'not drank', 0),
(52, 18, 'didn\'t won', 0),
(53, 18, 'not won', 0),
(54, 18, 'didn\'t win', 1),
(55, 19, 'start - finish', 0),
(56, 19, 'starts - finishs', 0),
(57, 19, 'starts - finishes', 1),
(58, 20, 'stay ', 0),
(59, 20, 'stayed ', 1),
(60, 20, 'stays ', 0),
(61, 21, 'will rain', 0),
(62, 21, 'is raining', 0),
(63, 21, 'is going to rain', 1),
(64, 22, 'has already watch', 0),
(65, 22, 'has already watches', 0),
(66, 22, 'has already watched', 1),
(67, 23, 'do ', 0),
(68, 23, 'am doing ', 0),
(69, 23, 'will do ', 1),
(70, 24, 'will wash', 1),
(71, 24, 'wash', 0),
(72, 24, 'am going to wash', 0),
(73, 25, 'delayed ', 1),
(74, 25, 'delay', 0),
(75, 25, 'was delaying', 0),
(76, 26, 'don\'t wear ', 0),
(77, 26, 'am not wearing', 1),
(78, 26, 'not wearing', 0),
(79, 27, 'takes off', 1),
(80, 27, 'take off', 0),
(81, 27, 'is going to take off', 0),
(82, 28, 'don\'t finish', 0),
(83, 28, 'won\'t finish', 1),
(84, 28, 'am not finishing ', 0),
(85, 29, 'work', 0),
(86, 29, 'was working', 0),
(87, 29, 'worked ', 1),
(88, 30, 'passes ', 0),
(89, 30, 'will pass ', 1),
(90, 30, 'pass ', 0),
(91, 31, 'got - already did', 0),
(92, 31, 'got - had already done', 1),
(93, 31, 'had got - had already done', 0),
(94, 32, 'have lost', 1),
(95, 32, 'has lost ', 0),
(96, 32, 'lost ', 0),
(97, 33, 'will mount', 0),
(98, 33, 'will have mounted', 1),
(99, 33, 'mounts', 0),
(100, 34, 'has ', 0),
(101, 34, 'has have', 0),
(102, 34, 'has had', 1),
(103, 35, 'was working', 1),
(104, 35, 'worked', 0),
(105, 35, 'work', 0),
(106, 36, 'was cooking - was ringing', 0),
(107, 36, 'was cooking - \rrang ', 1),
(108, 36, 'cooked - was ringing', 0),
(109, 37, 'made ', 0),
(110, 37, 'was making', 0),
(111, 37, 'had made', 1),
(112, 38, 'is - teaches', 0),
(113, 38, 'has been - has taught', 1),
(114, 38, 'has been - has been teaching', 0),
(115, 39, 'will stop', 0),
(116, 39, 'stops ', 1),
(117, 39, 'is stopping  ', 0),
(118, 40, 'will have eaten', 1),
(119, 40, 'eat ', 0),
(120, 40, 'will eat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(3) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Family'),
(2, 'Tense');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(3) NOT NULL COMMENT 'question id',
  `q_level` int(1) NOT NULL COMMENT 'question level/difficulty',
  `q_category` int(3) NOT NULL COMMENT 'question category',
  `q_text` varchar(200) NOT NULL COMMENT 'question text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_level`, `q_category`, `q_text`) VALUES
(1, 2, 1, 'My mother\'s daughter is my'),
(2, 2, 1, 'My mother\'s mother is my'),
(3, 2, 1, 'My father\'s son is my'),
(4, 2, 1, 'My step-mother\'s son is my'),
(5, 2, 1, 'My brother\'s daughter is my'),
(6, 2, 1, 'My aunt\'s children are my'),
(7, 2, 1, 'My grandpa\'s father is my'),
(8, 2, 1, 'My dad\'s brother is my'),
(9, 2, 1, 'My sister\'s husband is my'),
(10, 2, 1, 'My female spouse is my'),
(11, 1, 2, 'He ... (sleep) at the momement.'),
(12, 1, 2, 'Marry ... (never/watch) TV at night.'),
(13, 1, 2, 'Water ... (boil) at degrees Celcius '),
(14, 1, 2, 'Our school ... (usually/have) breaks in the morning and afternoon'),
(15, 1, 2, 'I ... (not do) my homework now.'),
(16, 1, 2, 'She ... (sell) the house two days ago.'),
(17, 1, 2, 'They ... (not drink) milk for breakfast yesterday.'),
(18, 1, 2, 'Unfortunately, our team ... (not win) any games last year.'),
(19, 1, 2, 'School .. (start) in September and ... (finish) in June.'),
(20, 1, 2, 'Amy ... (stay) at her friend\'s house last night.'),
(21, 2, 2, 'Look at those dark clouds. It ... (rain).'),
(22, 2, 2, 'Jack ... (already/watch) this film.'),
(23, 2, 2, 'I promise I ... (do) it today.'),
(24, 2, 2, 'I know my clothes are dirty. I ... (wash) them tomorrow.'),
(25, 2, 2, 'Bad weather ... (delay) our flight to Madagascar last summer.'),
(26, 2, 2, 'I ... (not wear) my watch becaues it is being fixed.'),
(27, 2, 2, 'My plane ... (take off) at 6 tomorrow morning.'),
(28, 2, 2, 'I\'m afriad I ... (not/finish) this essay tomorrow.'),
(29, 2, 2, 'My uncle ... (work) in Dublin from 2002-2008.'),
(30, 2, 2, 'I think he ... (pass) the exam.'),
(31, 3, 2, 'By the time Monica ... (get) to the librabry, Elena ... (already/do) all the research.'),
(32, 3, 2, 'I ... (lose) my keys and now I can\'t go outside!'),
(33, 3, 2, 'By the end of the day, Aaron ... (mount) about 80 tyers.'),
(34, 3, 2, 'It is the first time she ... (have) a car accident.'),
(35, 3, 2, 'I ... (work) in the garden all day yesterday.'),
(36, 3, 2, 'While I ... (cook) dinner, the phone .... (ring).'),
(37, 3, 2, 'I was angry that I ... (make) such a stupid mistake.'),
(38, 3, 2, 'She ... (be) a music teacher for twelve years and ... (teach) here since 2004.'),
(39, 3, 2, 'They have decided to go home by bus, which ... (stop) in front of the garage every hour.'),
(40, 3, 2, 'I am afraid they ... (eat) everything by the time we arrive.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('tienanh', 'ea985e09f5a56a18df47f0b3262a47da'),
('tienanh2', 'ea985e09f5a56a18df47f0b3262a47da'),
('tienanh3', '202cb962ac59075b964b07152d234b70'),
('tien', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'question id', AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
