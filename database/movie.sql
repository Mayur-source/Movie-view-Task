-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 09:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `value`) VALUES
(1, 'language', 'English'),
(2, 'genre', 'Action'),
(3, 'language', 'Hindi'),
(4, 'genre', 'Comedy'),
(5, 'grnre', 'Thriller'),
(6, 'grnre', 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `length` int(5) NOT NULL COMMENT 'in minutes',
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image`, `length`, `release_date`) VALUES
(1, 'Jurassic World', 'A movie about dinosaurs', 'images/jurassic-world.jpg', 90, '2015-06-14'),
(2, 'Kick', 'Salman Khan movie', 'images/kick.jpg', 120, '2014-04-12'),
(3, 'Udaan', 'Vikramaditya Motwane\'s directorial debut', 'images/udan.jpg', 180, '2013-03-08'),
(4, 'Bachchhan Paandey', 'Bachchhan Paandey is an upcoming Indian Hindi-language action comedy film', 'images/bachchhan-paandey.jpg', 120, '2022-03-18'),
(5, 'The Adam Project', 'Ryan Reynolds stars in a comfortable, conventional time travel film', 'images/the-adam-project.jpg', 110, '2022-03-11'),
(6, 'Turning Red', 'Turning Red focuses on Mei Lee, a Chinese Canadian middle schooler living in Toronto in the early 2000s', 'images/turning-red.jpg', 130, '2022-03-11'),
(7, 'The Batman', 'The Batman is the superhero protector of Gotham City, a tortured, brooding vigilante dressed as a bat who fights against evil', 'images/the-batman.jpg\r\n', 140, '2022-03-04'),
(8, 'K.G.F - Chapter 2', 'upcoming Indian Kannada-language period action film written and directed by Prashanth Neel, and produced by Vijay Kiragandur under the banner Hombale Films.', 'images/kgf-chapter-2.jpg', 160, '2022-04-14'),
(9, 'RRR', 'It is a fictional story about two Indian revolutionaries, Alluri Sitarama Raju (Charan) and Komaram Bheem (Rama Rao), who fought against the British Raj', 'images/rrr.jpg', 135, '2022-03-11'),
(10, 'Attack (2022)', 'Attack is a race against time story of rescue by an Attack team led by a lone ranger played by John', 'images/Attack-Movie-2022.jpg', 140, '2022-03-06'),
(11, 'Jhund', 'Indian Hindi-language biographical-sports film based on the life of Vijay Barse, the founder of NGO Slum Soccer.', 'images/jhund.jpg', 160, '2022-06-09'),
(13, 'Prithviraj', 'Prithviraj is an upcoming Indian Hindi-language historical action drama film directed by Chandraprakash Dwivedi and produced by Yash Raj Films. The film is based on Prithviraj Raso, a Braj Bhasha epic poem about the life of Prithviraj Chauhan, a king from the Chahamana dynasty.\r\n', 'images/pritvirajI.jpg', 120, '2022-03-26'),
(14, 'Heropanti 2', 'Heropanti 2 is about a guy who helps people at night. Whether that be saving someone from a robbery or kidnapping this guy is always there. The Indian government finds out about this and sends him to Russia where he has the mission of killing Russian troops at night.', 'images/h2.jpg', 140, '2022-04-13'),
(15, 'Anek', 'Anek ( transl. Many) is an upcoming Indian Hindi-language political thriller film written and directed by Anubhav Sinha and produced by him and T-Series. The film features Ayushmann Khurrana in the lead role. The film is scheduled to release on 13 May 2022.', 'images/run.jpg', 160, '2022-03-16'),
(16, 'Mission Majnu', 'The untold story of India\'s most audacious and daring covert operation in the heart of Pakistan. The untold story of India\'s most audacious and daring covert operation in the heart of Pakistan. The untold story of India\'s most audacious and daring covert operation in the heart of Pakistan.', 'images/mm.jpg', 90, '2022-03-26'),
(17, 'Maidaan', 'Maidaan is a sports biographical drama set in the golden era of Indian football (1952–62). It is based on the life of the popular football coach Syed Abdul Rahim, who managed the Indian football team for 13 years and laid the foundation of modern Indian football', 'images/mai.jpg', 120, '2022-05-14'),
(18, 'Doctor G', 'Three siblings, with only a father in common, meet for the first time at their grandmother\'s funeral in India. Three siblings, with only a father in common, meet for the first time at their grandmother\'s funeral in India', 'images/D.jpg', 120, '2022-04-20'),
(19, 'Jug Jugg Jeeyo', 'Jug Jugg Jeeyo ( transl. May you live long) is an upcoming Indian Hindi-language comedy-drama film directed by Raj Mehta and produced by Hiroo Yash Johar, Karan Johar and Apoorva Mehta. The film stars Anil Kapoor, Neetu Kapoor, Varun Dhawan and Kiara Advani in the lead roles alongside Prajakta Koli and Manish Paul.', 'images/jjj.jpg', 120, '2022-03-10'),
(20, 'Rocketry: The Nambi Effect', 'Actor R Madhavan on Monday announced that his directorial debut \"Rocketry: The Nambi Effect\" will release worldwide in theatres on July 1. The film is based on the life of Nambi Narayanan, a former scientist and aerospace engineer of the Indian Space Research Organisation who was accused of espionage.', 'images/roc.jpg', 130, '2022-03-11'),
(21, 'Ek Villain 2', 'He had said that while Ek Villain was about a conflict between hero and a villain, Ek Villain Returns will essentially be about two villains. “It is essentially villain versus villain. Both Adi and John are playing negative characters,” he had said when Aditya Roy Kapur was supposed to do the film.', 'images/ek.jpg', 90, '2020-02-02'),
(22, 'Shamshera', 'Set in 1890\'s pre-Independence India, a dacoit leads a rebellion and fight for freedom from tyrannical British rule. Set in 1890\'s pre-Independence India, a dacoit leads a rebellion and fight for freedom from tyrannical British rule', 'images/ss.jpg', 120, '2022-03-10'),
(23, 'Adipurush', 'The first man) is an upcoming Indian Hindu mythological film based on the epic Ramayana. The film is directed by Om Raut and produced by T-Series Films and Retrophiles. Shot simultaneously in Hindi and Telugu languages, the film stars Prabhas as Raghava, Kriti Sanon as Janaki, and Saif Ali Khan as Lankesh.', 'images/adi.jpg', 130, '0000-00-00'),
(24, 'Brahmāstra', 'Part One of the planned trilogy centers on Shiva (Kapoor), a young man on the brink of an epic love story with Isha (Bhatt). But their world is turned upside down when Shiva learns he has a mysterious connection to the Brahmāstra, and a great power within him that he doesn\'t understand just yet — the power of fire.', 'images/br.jpg', 140, '2022-03-28'),
(25, 'Ram Setu', 'Ram Setu is a Hindi drama film about an archaeologist who is on an exploratory spree to find out whether the Ram Setu bridge mentioned in Ramayana is a myth or reality. The film has been written and directed by Abhishek Sharma, and stars Akshay Kumar, Nushrat Bharucha and Jacqueline Fernandez as leading characters.', 'images/rs.jpg', 150, '2022-03-26'),
(26, 'Bhediya', 'Bhediya ( transl. Wolf) is an upcoming Indian Hindi-language comedy horror film directed by Amar Kaushik and produced by Dinesh Vijan, featuring Varun Dhawan and Kriti Sanon in the lead roles with Janhvi Kapoor and Flora Saini reprising their roles from the previous installments Roohi and Stree.', 'images/bh.jpg', 120, '2022-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `movies_to_category`
--

CREATE TABLE `movies_to_category` (
  `id` int(11) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_to_category`
--

INSERT INTO `movies_to_category` (`id`, `movie_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 3),
(6, 3, 2),
(7, 4, 3),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 3),
(12, 6, 4),
(13, 7, 3),
(14, 7, 2),
(15, 8, 3),
(16, 8, 2),
(17, 9, 3),
(18, 9, 4),
(19, 10, 3),
(20, 10, 2),
(21, 11, 3),
(22, 11, 2),
(23, 13, 3),
(24, 13, 5),
(25, 14, 3),
(26, 14, 4),
(27, 15, 3),
(28, 15, 2),
(29, 16, 3),
(30, 16, 2),
(31, 17, 3),
(32, 17, 4),
(33, 18, 1),
(34, 18, 2),
(35, 19, 3),
(36, 19, 4),
(37, 20, 1),
(38, 20, 2),
(39, 21, 3),
(40, 21, 6),
(41, 22, 1),
(42, 22, 2),
(43, 23, 3),
(44, 23, 2),
(45, 24, 1),
(46, 24, 2),
(47, 25, 3),
(48, 25, 6),
(49, 26, 2),
(50, 26, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_to_category`
--
ALTER TABLE `movies_to_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `movies_to_category`
--
ALTER TABLE `movies_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
