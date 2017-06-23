-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 05:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yustusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `ID_USER` int(255) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `IMAGE_URL` varchar(255) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `KOTA` varchar(30) NOT NULL,
  `UMUR` int(100) NOT NULL,
  `GENDER` varchar(40) NOT NULL,
  `LIKE` int(255) NOT NULL,
  `DISLIKE` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`ID_USER`, `USERNAME`, `EMAIL`, `PASSWORD`, `IMAGE_URL`, `NAMA`, `DESCRIPTION`, `KOTA`, `UMUR`, `GENDER`, `LIKE`, `DISLIKE`) VALUES
(1, 'alex77', 'alex@gmail.com', '12345', 'https://cdn.filepicker.io/api/file/pdhvDnVbSmuUBQm8x8GP', 'Alex Christopher', 'saya admin broh. kasih LIKE ya', 'surabaya', 20, 'male', 32, 9),
(2, 'kevin97', 'kevin@gmail.com', '123', 'http://eduvisi.com/wp-content/uploads/2016/01/willy.jpg', 'Kevin Willyan', 'none', 'surabaya', 20, 'male', 49, 54),
(3, 'jessica', 'jessica@gmail.com', '123', 'http://www.totpi.com/wp-content/uploads/2016/04/003-3.jpg', 'Jessica Alba', 'none', 'surabaya', 30, 'female', 150, 21),
(4, 'danis', 'danis@gmail.com', 'q', 'https://usatmmajunkie.files.wordpress.com/2017/04/dillon-danis-bellator-signee.jpg', 'dillion paris', 'none', 'surabaya', 26, 'male', 18, 1491),
(5, 'vivi', 'vivi@gmail.com', 'q', 'https://pbs.twimg.com/profile_images/568984204436717568/09Hl5VmJ_400x400.jpeg', 'vivi Indra', 'none', 'surabaya', 22, 'female', 45, 4),
(6, 'kemal', 'kemal@gmail.com', 'q', 'http://4.bp.blogspot.com/--SdIg5rHoK4/VmR1954bPSI/AAAAAAAACuQ/uIvLcvz9uOo/s1600/kemal-palevi.jpg', 'kemal palevi', 'none', 'jakarta', 24, 'male', 1046, 236),
(7, 'drake', 'drake@gmail.com', 'q', 'https://iscale.iheart.com/v3/url/aHR0cDovL2ltYWdlLmloZWFydC5jb20vaW1hZ2VzL3JvdmkvMTA4MC8wMDAzLzcyMy9NSTAwMDM3MjM4NDguanBn', 'Drake', 'none', 'denpasar', 33, 'male', 19037, 4510),
(8, 'justin', 'bieber@gmail.com', 'q', 'https://the-hollywood-gossip-res.cloudinary.com/iu/s--31Pp-TfS--/f_auto,q_auto/v1450093171/justin-bieber-profile-photo', 'Justin Bieber', 'none', 'denpasar', 23, 'male', 1080, 1122),
(9, 'malone', 'malone@gmail.com', 'q', 'http://www.xxlmag.com/files/2015/10/post-malone-shareif-ziyadat.jpg', 'Post Malone', 'none', 'denpasar', 24, 'male', 1036, 103),
(10, 'putri', 'putri@gmail.com', 'q', 'https://upload.wikimedia.org/wikipedia/commons/2/22/Putri_Ayu_Silaen_3.jpg', 'Putri Ayu', 'none', 'jakarta', 17, 'female', 1094, 379),
(11, 'regina', 'antoinnete@gmail.com', 'q', 'https://pbs.twimg.com/profile_images/636444180152107008/SxTI2ntL.jpg', 'Regina elise', 'none', 'surabaya', 22, 'female', 151, 108),
(12, 'natalia', 'manam@gmail.com', 'q', 'https://lh6.googleusercontent.com/-WyAjPm6zqaQ/AAAAAAAAAAI/AAAAAAAAABk/wHnEbmxbw8M/photo.jpg', 'Natalia Manampiring', 'none', 'jakarta', 28, 'female', 89, 43),
(13, 'ciutarno', 'ciutarno@gmail.com', 'q', 'https://akphoto1.ask.fm/839/893/263/-339996992-1sjd8hf-eabohhidiqg74hf/original/avatar.jpg', 'Natalia Ciutarno', 'none', 'bandung', 25, 'female', 324, 34),
(14, 'ratnasari', 'ratnasari@gmail.com', 'q', 'http://scontent-sea1-1.cdninstagram.com/t51.2885-15/s480x480/e35/c0.134.1080.1080/15538743_175118932957954_258613501449207808_n.jpg?ig_cache_key=MTQwNDMxMzEwNDI4ODAyOTAyOA%3D%3D.2.c', 'Nike Ratna', 'none', 'denpasar', 26, 'female', 107, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `ID_USER` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
