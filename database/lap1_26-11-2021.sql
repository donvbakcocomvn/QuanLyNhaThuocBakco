-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2021 at 02:11 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lap1`
--

-- --------------------------------------------------------

--
-- Table structure for table `lap1_options`
--

DROP TABLE IF EXISTS `lap1_options`;
CREATE TABLE IF NOT EXISTS `lap1_options` (
  `Id` varchar(50) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Values` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_role`
--

DROP TABLE IF EXISTS `lap1_role`;
CREATE TABLE IF NOT EXISTS `lap1_role` (
  `Id` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Des` text NOT NULL,
  `IsNotDelete` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_role`
--

INSERT INTO `lap1_role` (`Id`, `Name`, `Des`, `IsNotDelete`) VALUES
('Admin', 'Quền  Admin', 'Quyền Admin', 1),
('QuanLy', 'Quền  Quản Ly', 'Admin', 1),
('QuanLySanPham', 'Quền lý Sản Pham', 'Admin', 0),
('1105cf0e39b7545e9d42bef90dc05624', 'Module Quản Lý Quyền Xem', 'Module Quản Lý Quyền', 0),
('QuanLyHangHoa', 'Quền Quản Lý Bài Viết', 'Admin', 0),
('e671f664561a9d02fbe8d1258a53218d', 'Module Quản Lý Quyền', 'Module Quản Lý Quyền', 0),
('808f95e6ce3e058a6796a7461ad3062d', 'Xem', 'Module Quản Lý Quyền', 0),
('ca0a1aa2435e7d66d2d624f269d9c600', 'Xóa', 'Module Quản Lý Quyền', 0),
('d9394bc8e6452776f570a7101152144e', 'Sửa', 'Module Quản Lý Quyền', 0),
('4e36c695c2aa19fa37e01361daf34f99', 'Thêm', 'Module Quản Lý Quyền', 0),
('60e4ef097e761fcd1a9a3b38b9052c04', 'Xem', 'Module Quản Lý Tài Khoản', 0),
('447fd8a0023fa3d090da20c4a306b106', 'Xóa', 'Module Quản Lý Tài Khoản', 0),
('8fd24d8c301a54452d9c68abfda91ab1', 'Sửa', 'Module Quản Lý Tài Khoản', 0),
('0a004f685981b48cd51c8318f116b09d', 'Thêm', 'Module Quản Lý Tài Khoản', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham`
--

DROP TABLE IF EXISTS `lap1_sanpham`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham` (
  `Id` varchar(50) NOT NULL DEFAULT '0',
  `Username` varchar(50) NOT NULL,
  `catID` int(11) NOT NULL,
  `nameProduct` varchar(255) NOT NULL,
  `Alias` varchar(200) NOT NULL,
  `Price` decimal(15,4) NOT NULL,
  `oldPrice` decimal(15,4) DEFAULT 0.0000,
  `Summary` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `UrlHinh` varchar(255) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `Number` int(11) DEFAULT 0,
  `Note` varchar(500) DEFAULT NULL,
  `BuyTimes` int(11) DEFAULT 0,
  `Views` int(11) DEFAULT 0,
  `isShow` tinyint(4) NOT NULL,
  `Serial` int(11) NOT NULL,
  `lang` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_danhmuc`
--

DROP TABLE IF EXISTS `lap1_sanpham_danhmuc`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_danhmuc` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Path` text NOT NULL,
  `Link` varchar(500) NOT NULL,
  `Note` varchar(200) DEFAULT NULL,
  `parentCatID` int(11) DEFAULT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `Public` int(11) NOT NULL,
  `Serial` int(11) NOT NULL,
  `Lang` varchar(4) NOT NULL DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options`
--

DROP TABLE IF EXISTS `lap1_sanpham_options`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_options` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Code` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options_soluong`
--

DROP TABLE IF EXISTS `lap1_sanpham_options_soluong`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_options_soluong` (
  `Id` varchar(50) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `IdOption` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users`
--

DROP TABLE IF EXISTS `lap1_users`;
CREATE TABLE IF NOT EXISTS `lap1_users` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `Password` varchar(250) NOT NULL,
  `KeyPassword` varchar(50) NOT NULL,
  `BOD` date NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `DateCreate` datetime NOT NULL,
  `TokenReset` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users`
--

INSERT INTO `lap1_users` (`Id`, `Name`, `Username`, `Email`, `Password`, `KeyPassword`, `BOD`, `Status`, `Active`, `DateCreate`, `TokenReset`) VALUES
('78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Adminas asdas', 'admin', 'namdong92@gmail.com', '95add5183f17f35f2770ffd42d8746f8b8bc60ac', '78f8420e-3e33-11ec-ad78-0cc47acc8ffc', '2021-11-24', 0, 1, '0000-00-00 00:00:00', ''),
('57193062-abd5-4dc2-a0cc-013f510ff38d', 'asdasdas', 'abc123', 'namdong91@gmail.com', 'd79cdf2cc38d064e37419b9722aa9e31e0d498af', '6f3ada33-23dd-415d-9b96-ec71459edc1c', '2021-11-22', 0, 1, '2021-11-22 13:46:39', ''),
('e5b5f45b-7447-4a99-9ee0-72806c141bf8', 'abc123', 'abc1231', 'namdong99@gmail.com', 'd94578c5155d4eb9d1c2d07588fb6cbf0bfefa4b', '99484c2d-eac4-476f-8dc7-07ccf3ce24d5', '2021-11-22', 0, 1, '2021-11-22 13:47:13', ''),
('a585dec5-9ded-47f4-bd78-33055d8c30de', 'Nguyễn Văn A', 'abcef', 'ASASDASsNguyenVanA@gmail.com', 'da174a019e46ae5db173be4bd0dcbd474e174f38', '0714b74a-5935-45e2-aa8d-ea5eeea30da5', '2021-11-22', 0, 0, '2021-11-22 13:51:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users_role`
--

DROP TABLE IF EXISTS `lap1_users_role`;
CREATE TABLE IF NOT EXISTS `lap1_users_role` (
  `Id` varchar(50) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `RoleId` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users_role`
--

INSERT INTO `lap1_users_role` (`Id`, `UserId`, `RoleId`) VALUES
('1803406e-2b19-409a-8e4b-d2b4d49970f6', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'e671f664561a9d02fbe8d1258a53218d'),
('f83692ef-92cb-45da-8489-276dce17975d', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QuanLySanPham'),
('279ab5e8-df67-4ef8-94cd-84ec54c1bfb5', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QuanLy'),
('801271a3-ad9b-4ebc-b4cf-f9d144319496', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin'),
('1f21a236-8d6f-4ee7-9c20-2365b4aa4d3e', 'a585dec5-9ded-47f4-bd78-33055d8c30de', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
