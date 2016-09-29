-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2016 at 04:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ankit', 'ankit24007@gmail.com', 'ankit', '2016-09-21 05:58:53', '2016-09-21 05:58:53'),
(2, 'bharat', 'a@b.com', 'ankit', '2016-09-21 06:51:24', '2016-09-21 06:51:24'),
(3, 'manu', 'manu@gmail.com', 'manu', '2016-09-27 05:04:27', '2016-09-27 05:04:27'),
(5, 'tanu', 'tanu@gmail.com', 'tanu', '2016-09-29 00:52:07', '2016-09-29 00:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `adv_type` varchar(40) NOT NULL,
  `adv_date` date NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `movie_name` varchar(40) NOT NULL,
  `b_date` date NOT NULL,
  `origin` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Movies', 'Movies, also known as films, are a type of visual communication which use moving pictures and sound to tell stories or inform (help people to learn).', '2016-09-29 04:58:01'),
(2, 'Songs', 'A song is a piece of music which contains words.\r\nSongs can be made in many ways. Some people form bands which write and record songs to make money from it.', '2016-09-29 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `actor` varchar(50) NOT NULL,
  `banner` text NOT NULL,
  `image` text NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `title`, `genre`, `director`, `actor`, `banner`, `image`, `rating`, `description`, `created_at`) VALUES
(13, 'Insurgent', 'Action', '', '', 'mfiles/insurgent.jpg', 'mfiles/insurgentImage.jpg', 0, '', '2016-09-23 05:40:05'),
(14, 'Divergent', 'Action', '', '', 'mfiles/divergentposter.jpg', 'mfiles/Divergent.jpg', 0, '', '2016-09-23 05:40:21'),
(15, 'The Maze Runner', 'Science Fiction', '', '', 'mfiles/mazebanner.jpg', 'mfiles/maze.jpg', 0, '', '2016-09-23 05:56:27'),
(16, 'Finding Dory', 'Adventure', '', '', 'mfiles/fdDory.jpg', 'mfiles/fdDoryImage.jpg', 0, 'Dory (Ellen DeGeneres) is a wide-eyed, blue tang fish who suffers from memory loss every 10 seconds or so. The one thing she can remember is that she somehow became separated from her parents as a child. With help from her friends Nemo and Marlin, Dory embarks on an epic adventure to find them.', '2016-09-23 06:38:15'),
(17, 'Finding Nemo', 'Adventure', '', '', 'mfiles/nemobanner.jpg', 'mfiles/nemoimage.jpg', 0, 'After his son gets abducted in the Great Barrier Reef and is despatched to Sydney, a meek clownfish embarks on a journey to bring him home.', '2016-09-23 06:57:06'),
(18, 'Suicide Squad', 'Fantasy', '', 'Margot Robbie, Jared Leto', 'mfiles/ssbanner.jpg', 'mfiles/ssimage.jpg', 0, 'Figuring they are all expendable, a U.S. intelligence officer decides to assemble a team of dangerous, incarcerated supervillains for a top-secret mission. Now armed with government weapons, Deadshot (Will Smith), Harley Quinn (Margot Robbie), Captain Boomerang, Killer Croc and other despicable.', '2016-09-22 22:31:53'),
(19, 'The Jungle Book', 'Drama', '', 'Neel Sethi', 'mfiles/tjbposter.jpg', 'mfiles/tjbimage.jpg', 0, 'Raised by a family of wolves since birth, Mowgli (Neel Sethi) must leave the only home he is ever known when the fearsome tiger Shere Khan (Idris Elba) unleashes his mighty roar. Guided by a no-nonsense panther (Ben Kingsley) and a free-spirited bear (Bill Murray), the young boy meets an array of jungle animals, including a slithery python and a smooth-talking ape. Along the way, Mowgli learns valuable life lessons as his epic journey of self-discovery leads to fun and adventure.', '2016-09-22 22:53:12'),
(20, 'Zootopia', 'Mystery/Crime', '', 'Jason Bateman, Ginnifer Goodwin', 'mfiles/zootpos.jpg', 'mfiles/zootopia.jpg', 0, 'From the largest elephant to the smallest shrew, the city of Zootopia is a mammal metropolis where various animals live and thrive. When Judy Hopps (Ginnifer Goodwin) becomes the first rabbit to join the police force, she quickly learns how tough it is to enforce the law. Determined to prove herself, Judy jumps at the opportunity to solve a mysterious case. Unfortunately, that means working with Nick Wilde (Jason Bateman), a wily fox who makes her job even harder.', '2016-09-23 23:27:32'),
(21, 'Moana', 'Fantasy', '', 'Dwayne Johnson, Auliâ€™i Cravalho', 'mfiles/moanapos.jpg', 'mfiles/moana.jpg', 0, 'An adventurous teenager sails out on a daring mission to save her people. During her journey, Moana meets the once-mighty demigod Maui, who guides her in her quest to become a master way-finder. Together they sail across the open ocean on an action-packed voyage, encountering enormous monsters and impossible odds. Along the way, Moana fulfills the ancient quest of her ancestors and discovers the one thing she always sought: her own identity.', '2016-09-23 23:30:28'),
(22, 'Star Trek Beyond', 'Science Fiction', '', '', 'mfiles/trelpos.jpg', 'mfiles/trek.jpg', 0, 'A surprise attack in outer space forces the Enterprise to crash-land on a mysterious world. The assault came from Krall (Idris Elba), a lizard-like dictator who derives his energy by sucking the life out of his victims. Krall needs an ancient and valuable artifact that is aboard the badly damaged starship. Left stranded in a rugged wilderness, Kirk (Chris Pine), Spock (Zachary Quinto) and the rest of the crew must now battle a deadly alien race while trying to find a way off their hostile planet.', '2016-09-23 23:35:27'),
(23, 'Warcraft', 'Action', 'Duncan Jones', 'Paula Patton', 'mfiles/war.jpg', 'mfiles/warc.jpg', 0, 'Looking to escape from his dying world, the orc shaman Guldan utilizes dark magic to open a portal to the human realm of Azeroth. Supported by the fierce fighter Blackhand, Guldan organizes the orc clans into a conquering army called the Horde. Uniting to protect Azeroth from these hulking invaders are King Llane, the mighty warrior Anduin Lothar (Travis Fimmel) and the powerful wizard Medivh. As the two races collide, leaders from each side start to question if war is the only answer.', '2016-09-29 09:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_email` int(11) NOT NULL,
  `feedback` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `rating` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(9, 'ankit', 'ankit24007@gmail.com', '447d2c8dc25efbc493788a322f1a00e7', '2016-09-28 23:55:48', '2016-09-28 23:38:27'),
(10, 'bharat', 'bharat@gmail.com', 'dfb57b2e5f36c1f893dbc12dd66897d4', '2016-09-28 23:57:36', '2016-09-28 23:57:36');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
