-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2016 at 02:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ankit', 'ankit24007@gmail.com', 'ankit', '2016-09-21 05:58:53', '2016-09-21 05:58:53'),
(2, 'bharat', 'a@b.com', 'ankit', '2016-09-21 06:51:24', '2016-09-21 06:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `actor` varchar(50) NOT NULL,
  `banner` text NOT NULL,
  `image` text NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `genre`, `actor`, `banner`, `image`, `rating`, `description`, `created_at`) VALUES
(13, 'Insurgent', 'Action', '', 'mfiles/insurgent.jpg', 'mfiles/insurgentImage.jpg', 0, '', '2016-09-23 05:40:05'),
(14, 'Divergent', 'Action', '', 'mfiles/divergentposter.jpg', 'mfiles/Divergent.jpg', 0, '', '2016-09-23 05:40:21'),
(15, 'The Maze Runner', 'Science Fiction', '', 'mfiles/mazebanner.jpg', 'mfiles/maze.jpg', 0, '', '2016-09-23 05:56:27'),
(16, 'Finding Dory', 'Adventure', '', 'mfiles/fdDory.jpg', 'mfiles/fdDoryImage.jpg', 0, 'Dory (Ellen DeGeneres) is a wide-eyed, blue tang fish who suffers from memory loss every 10 seconds or so. The one thing she can remember is that she somehow became separated from her parents as a child. With help from her friends Nemo and Marlin, Dory embarks on an epic adventure to find them.', '2016-09-23 06:38:15'),
(17, 'Finding Nemo', 'Adventure', '', 'mfiles/nemobanner.jpg', 'mfiles/nemoimage.jpg', 0, 'After his son gets abducted in the Great Barrier Reef and is despatched to Sydney, a meek clownfish embarks on a journey to bring him home.', '2016-09-23 06:57:06'),
(18, 'Suicide Squad', 'Fantasy', 'Margot Robbie, Jared Leto', 'mfiles/ssbanner.jpg', 'mfiles/ssimage.jpg', 0, 'Figuring they are all expendable, a U.S. intelligence officer decides to assemble a team of dangerous, incarcerated supervillains for a top-secret mission. Now armed with government weapons, Deadshot (Will Smith), Harley Quinn (Margot Robbie), Captain Boomerang, Killer Croc and other despicable.', '2016-09-22 22:31:53'),
(19, 'The Jungle Book', 'Drama', 'Neel Sethi', 'mfiles/tjbposter.jpg', 'mfiles/tjbimage.jpg', 0, 'Raised by a family of wolves since birth, Mowgli (Neel Sethi) must leave the only home he is ever known when the fearsome tiger Shere Khan (Idris Elba) unleashes his mighty roar. Guided by a no-nonsense panther (Ben Kingsley) and a free-spirited bear (Bill Murray), the young boy meets an array of jungle animals, including a slithery python and a smooth-talking ape. Along the way, Mowgli learns valuable life lessons as his epic journey of self-discovery leads to fun and adventure.', '2016-09-22 22:53:12'),
(20, 'Zootopia', 'Mystery/Crime', 'Jason Bateman, Ginnifer Goodwin', 'mfiles/zootpos.jpg', 'mfiles/zootopia.jpg', 0, 'From the largest elephant to the smallest shrew, the city of Zootopia is a mammal metropolis where various animals live and thrive. When Judy Hopps (Ginnifer Goodwin) becomes the first rabbit to join the police force, she quickly learns how tough it is to enforce the law. Determined to prove herself, Judy jumps at the opportunity to solve a mysterious case. Unfortunately, that means working with Nick Wilde (Jason Bateman), a wily fox who makes her job even harder.', '2016-09-23 23:27:32'),
(21, 'Moana', 'Fantasy', 'Dwayne Johnson, Auliâ€™i Cravalho', 'mfiles/moanapos.jpg', 'mfiles/moana.jpg', 0, 'An adventurous teenager sails out on a daring mission to save her people. During her journey, Moana meets the once-mighty demigod Maui, who guides her in her quest to become a master way-finder. Together they sail across the open ocean on an action-packed voyage, encountering enormous monsters and impossible odds. Along the way, Moana fulfills the ancient quest of her ancestors and discovers the one thing she always sought: her own identity.', '2016-09-23 23:30:28'),
(22, 'Star Trek Beyond', 'Science Fiction', '', 'mfiles/trelpos.jpg', 'mfiles/trek.jpg', 0, 'A surprise attack in outer space forces the Enterprise to crash-land on a mysterious world. The assault came from Krall (Idris Elba), a lizard-like dictator who derives his energy by sucking the life out of his victims. Krall needs an ancient and valuable artifact that is aboard the badly damaged starship. Left stranded in a rugged wilderness, Kirk (Chris Pine), Spock (Zachary Quinto) and the rest of the crew must now battle a deadly alien race while trying to find a way off their hostile planet.', '2016-09-23 23:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ankit', 'ankit24007@gmail.com', 'ankit', '2016-09-15 21:43:45', '2016-09-15 21:43:45'),
(2, 'ankit', 'a@b.com', 'ankit', '2016-09-15 21:45:59', '2016-09-15 21:45:59'),
(4, 'ankit', 'ab@b.com', 'ankit', '2016-09-15 22:17:49', '2016-09-15 22:17:49'),
(5, 'ankit', 'ankti@a.com', 'ankit', '2016-09-15 22:55:36', '2016-09-15 22:55:36'),
(6, 'ankit', 'ankti@aaa.com', 'ankit', '2016-09-15 22:56:02', '2016-09-15 22:56:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
