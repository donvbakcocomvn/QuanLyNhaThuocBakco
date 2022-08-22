-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 07:12 PM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oetkpjhosting_lap1`
--

-- --------------------------------------------------------

--
-- Table structure for table `lap1_options`
--

CREATE TABLE `lap1_options` (
  `Id` varchar(50) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Values` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users`
--

CREATE TABLE `lap1_users` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `KeyPassword` varchar(50) NOT NULL,
  `BOD` date NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `DateCreate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users`
--

INSERT INTO `lap1_users` (`Id`, `Name`, `Username`, `Password`, `KeyPassword`, `BOD`, `Status`, `Active`, `DateCreate`) VALUES
('78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin', 'admin', 'fd4d48481b06c1c5f99ca92323ed7a4ea78e2bb8', '78f8420e-3e33-11ec-ad78-0cc47acc8ffc', '0000-00-00', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap1_options`
--
ALTER TABLE `lap1_options`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_users`
--
ALTER TABLE `lap1_users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
