-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviemingle4`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_topic` varchar(50) NOT NULL,
  `article_title` varchar(50) NOT NULL,
  `publish_date` date NOT NULL,
  `article_pic` varchar(255) DEFAULT NULL,
  `article_filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `film_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_beli` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`film_id`, `user_id`, `tanggal_beli`) VALUES
(5, 1, '2024-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `reply_id` int(11) NOT NULL,
  `discuss_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reply_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discuss`
--

CREATE TABLE `discuss` (
  `discuss_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discuss`
--

INSERT INTO `discuss` (`discuss_id`, `user_id`, `topic`, `description`) VALUES
(2, 3, 'saran film', 'saran film comedy');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `film_name` varchar(100) DEFAULT NULL,
  `sinopsis` varchar(255) DEFAULT NULL,
  `durasi` varchar(10) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `actor` varchar(50) DEFAULT NULL,
  `production` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `pic_film` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `path_film` varchar(255) DEFAULT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `film_name`, `sinopsis`, `durasi`, `genre`, `actor`, `production`, `tahun`, `pic_film`, `price`, `path_film`, `video`) VALUES
(1, 'Ready Player One', 'When the creator of a virtual reality called the OASIS\r\n                                        dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg,\r\n                                        which will give the finder his fortun', '1 jam', 'Fantasy', 'Juan Vincent', 'SN Production', '2018', 'imgMov/ready_player_one_land.webp', 10, 'imgMov/ready_playe_one_cov.jpg', 'https://www.youtube.com/embed/cSp1dM2Vj48?si=iqmzaqI1L0w-k6zo'),
(2, 'Kaiju no 8', 'Kafka Hibino, a 32-year-old man, is unsatisfied with his job as a sweeper. From a young age, he has aspired to join the Defense Corps and kill kaijuus for a living.', '24 minute', 'Action,Sci-Fi', 'Steven Nicholas Saputra', 'SN Production', '2019', 'imgMov/kaijuno8_landscape.jpg', 3, 'imgMov/Kaijuno8.jpg', 'https://www.youtube.com/embed/V0OZWzTAqHg?si=YUjHAU-32GN55zfL'),
(3, 'Adam Project', 'Time-travelling fighter pilot Adam Reed teams up with his 12-year-old self for a mission to save the future after unintentionally crash landing in 2022.\r\n', '2 jam', 'Action,Comedy', 'Hery Heryanto', 'SN Production', '2022', 'imgMov/adam_project_landscape.jpg', 11, 'imgMov/adam_project_cover.jpg', 'https://www.youtube.com/embed/IE8HIsIrq4o?si=ykH-P8j-kR0MYMe0'),
(4, 'Cars', 'In a world where the towns are peopled with cars, and even the bugs are mini motors, a young ambitious racing car called Lightning McQueen is a star. On his way to an important event he has to stop in the little town of Radiator Springs after he accidenta', '1 jam', 'Animation,Sports,Comedy', 'Vincent Nathanael Candra', 'SN Production', '2018', 'imgMov/cars_land.jpeg', 10, 'imgMov/cars_cov.jpg', 'https://www.youtube.com/embed/W_H7_tDHFE8?si=GmODFQSbyEYxUJRw'),
(5, 'Exhuma', 'A shaman is offered a large amount of money to move a tomb. He moves with his companion, Ji Gwan.\r\n', '1 jam', 'Horror,Thriller,Mystery', 'Jonathan Marvel Sena', 'SN Production', '2019', 'imgMov/exhuma.jpg', 7, 'imgMov/exhuma_potrait.jpg', 'https://www.youtube.com/embed/H2O193v3jkM?si=ko4WRBM8I3PJCkHx'),
(6, 'Interstellar', 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand (Michael Caine), a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home v', '1 jam', 'Drama,Sci-Fi', 'Steven Nicholas Saputra', 'SN Production', '2020', 'imgMov/interstellar_land.jpg', 14, 'imgMov/interstellar.jpg', 'https://www.youtube.com/embed/zSWdZVtXT7E?si=R7gKM1fvlGtTSvos'),
(7, 'Naruto', 'Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, atau juga disebut pemimpin dan ninja terkuat di desanya.\r\n', '24 minute', 'Adventure,Comedy,Fantasy', 'Jonathan Marvel Sena', 'SN Production', '2021', 'imgMov/naruto_landscape.jpg', 7, 'imgMov/naruto_potrait.jpg', 'https://www.youtube.com/embed/tA3yE4_t6SY?si=e47AtNOmXqBkbP1S');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `profile_picture`) VALUES
(1, 'dea', '202cb962ac59075b964b07152d234b70', 'deanursyakinah@gmail.com', 'pfp.jpg'),
(3, 'heeseung', '202cb962ac59075b964b07152d234b70', 'deanursyakinah@gmail.com', 'hisenk melet.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `discuss_id` (`discuss_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `discuss`
--
ALTER TABLE `discuss`
  ADD PRIMARY KEY (`discuss_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discuss`
--
ALTER TABLE `discuss`
  MODIFY `discuss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`discuss_id`) REFERENCES `discuss` (`discuss_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `discuss`
--
ALTER TABLE `discuss`
  ADD CONSTRAINT `discuss_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
