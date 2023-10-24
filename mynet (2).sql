-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 03:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emp` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `package` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `name`, `emp`, `date`, `package`, `amount`) VALUES
(54, '11', '8', '2022-10-27 13:24:02', '5', '100'),
(57, '11', '6', '2022-10-27 13:30:11', '5', '0'),
(58, '27', '9', '2022-10-27 14:18:52', '5', '500'),
(59, '27', '7', '2022-10-27 14:21:18', '5', '100'),
(60, '27', '9', '2022-10-27 14:26:11', '5', '100'),
(61, '9', '6', '2022-10-28 06:26:30', '6', '10'),
(62, '9', '1', '2022-10-28 06:27:43', '6', '100');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `name`) VALUES
(2, 'ceod'),
(4, 'founder');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `joining` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `name`, `designation`, `salary`, `joining`, `password`) VALUES
(1, 'Uzair', 'ceod', '800000', '2022-10-11', ''),
(6, 'Kashan', 'Manager', '800000', '2022-09-29', '123'),
(7, 'ali', 'ceod', '2000', '2022-10-14', ''),
(9, 'faraz', 'ceod', '5000', '2022-10-12', ''),
(10, 'Uzair', 'ceod', '800000', '2022-10-07', '123');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ID` int(11) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Orderby` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ID`, `Item`, `Orderby`, `Date`, `Amount`) VALUES
(2, 'Table', 'Haris', '2022-10-14', 1000),
(3, 'Chair', 'Salman', '2022-10-21', 100),
(4, 'chai', 'haris', '2022-10-14', 200000000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `name`, `password`, `role`) VALUES
(1, 'Uzair', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`ID`, `name`, `price`) VALUES
(5, '50mbps', '2500'),
(6, '20Mbps', '2000'),
(9, '100mbps', '1200'),
(13, 'hhh', '43');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `remaining` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `name`, `designation`, `salary`, `remaining`, `date`) VALUES
(2, 'Uzair Ahmed', 'CEO', '9999', '12', '2022-10-06'),
(3, 'Kashan', 'Co-Founder', '8000', '4343', '2022-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `bpic` varchar(100) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `Remaining` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `address`, `cnic`, `pic`, `bpic`, `reg`, `package`, `price`, `Remaining`, `phone`, `status`, `date`) VALUES
(9, 'Uzair', 'Ahmed', 'uzair@jasa', 'adda527', '5612712821921', 'pk.jpg', 'pk.jpg', '123', '6', '500', 900, '090078601', 2, '2022-10-28 06:27:43'),
(11, 'haris', 'Baba', 'haris@gmail.com', 'mehmoodabad', '423102102912102012', 'pk.jpg', 'pk.jpg', '222', '5', '500', 0, '020030201]', 1, '2022-10-28 05:54:56'),
(19, 'Salman', 'Khan', 'salman@gmail.com', 'Lahore', '2929226232325352362', '271022113746deevlooper.png', 'pk.jpg', '322', '5', '5000', 10100, '12345678', 2, '2022-10-28 05:54:50'),
(27, 'Ali', 'Ahmed', 'ali@gmail.com', 'Liyari', '3672829192818', '271022141532pexels-cottonbro-4659806.jpg', 'pk.jpg', 'ali123', '5', '200', 100, '12011111', 1, '2022-10-28 05:54:44'),
(29, 'Salman', 'ahs', 'uzair@gmail.com', 'Lahore', '3232323', '281022074924pexels-marcelo-moreira-1926620.jpg', '281022074924restore.png', 'aaaaaa', '9', '110', 110, 'aaaaaaaa', 1, '2022-10-28 05:49:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
