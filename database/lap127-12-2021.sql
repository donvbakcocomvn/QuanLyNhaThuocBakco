-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2021 at 02:06 PM
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
-- Table structure for table `lap1_lang`
--

DROP TABLE IF EXISTS `lap1_lang`;
CREATE TABLE IF NOT EXISTS `lap1_lang` (
  `Id` varchar(10) NOT NULL,
  `Name` text NOT NULL,
  `Des` text NOT NULL,
  `Code` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_lang`
--

INSERT INTO `lap1_lang` (`Id`, `Name`, `Des`, `Code`) VALUES
('vi', 'Việt Nam', 'Việt Nam', 'VN-vi'),
('en', 'English', 'English', 'EN-En');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_locations`
--

DROP TABLE IF EXISTS `lap1_locations`;
CREATE TABLE IF NOT EXISTS `lap1_locations` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `ParentsId` int(11) NOT NULL,
  `IsPublic` int(11) NOT NULL,
  `Note` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=783 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_locations`
--

INSERT INTO `lap1_locations` (`Id`, `Name`, `ParentsId`, `IsPublic`, `Note`) VALUES
(1, 'Hà Nội', 0, 1, ''),
(2, 'Ba Đình', 1, 1, ''),
(3, 'Ba Vì', 1, 1, ''),
(4, 'Bắc Từ Liêm', 1, 1, ''),
(5, 'Cầu Giấy', 1, 1, ''),
(6, 'Chương Mỹ', 1, 1, ''),
(7, 'Đan Phượng', 1, 1, ''),
(8, 'Đông Anh', 1, 1, ''),
(9, 'Đống Đa', 1, 1, ''),
(10, 'Gia Lâm', 1, 1, ''),
(11, 'Hà Đông', 1, 1, ''),
(12, 'Hai Bà Trưng', 1, 1, ''),
(13, 'Hoài Đức', 1, 1, ''),
(14, 'Hoàn Kiếm', 1, 1, ''),
(15, 'Hoàng Mai', 1, 1, ''),
(16, 'Long Biên', 1, 1, ''),
(17, 'Mê Linh', 1, 1, ''),
(18, 'Mỹ Đức', 1, 1, ''),
(19, 'Nam Từ Liêm', 1, 1, ''),
(20, 'Phú Xuyên', 1, 1, ''),
(21, 'Phúc Thọ', 1, 1, ''),
(22, 'Quốc Oai', 1, 1, ''),
(23, 'Sóc Sơn', 1, 1, ''),
(24, 'Tây Hồ', 1, 1, ''),
(25, 'Thạch Thất', 1, 1, ''),
(26, 'Thanh Oai', 1, 1, ''),
(27, 'Thanh Trì', 1, 1, ''),
(28, 'Thanh Xuân', 1, 1, ''),
(29, 'Thị xã Sơn Tây', 1, 1, ''),
(30, 'Thường Tín', 1, 1, ''),
(31, 'Ứng Hòa', 1, 1, ''),
(32, 'Hồ Chí Minh', 0, 1, ''),
(33, 'Bình Tân', 32, 1, ''),
(34, 'Bình Thạnh', 32, 1, ''),
(35, 'Củ Chi', 32, 1, ''),
(36, 'Gò Vấp', 32, 1, ''),
(37, 'Hóc Môn', 32, 1, ''),
(38, 'Huyện Bình Chánh', 32, 1, ''),
(39, 'Huyện Cần Giờ', 32, 1, ''),
(40, 'Huyện Nhà Bè', 32, 1, ''),
(41, 'Phú Nhuận', 32, 1, ''),
(42, 'Quận 1', 32, 1, ''),
(43, 'Quận 10', 32, 1, ''),
(44, 'Quận 11', 32, 1, ''),
(45, 'Quận 12', 32, 1, ''),
(46, 'Quận 2', 32, 1, ''),
(47, 'Quận 3', 32, 1, ''),
(48, 'Quận 4', 32, 1, ''),
(49, 'Quận 5', 32, 1, ''),
(50, 'Quận 6', 32, 1, ''),
(51, 'Quận 7', 32, 1, ''),
(52, 'Quận 8', 32, 1, ''),
(53, 'Quận 9', 32, 1, ''),
(54, 'Tân Bình', 32, 1, ''),
(55, 'Tân Phú', 32, 1, ''),
(56, 'Thủ Đức', 32, 1, ''),
(57, 'Đà Nẵng', 0, 1, ''),
(58, 'Huyện Hòa Vang', 57, 1, ''),
(59, 'Huyện đảo Hoàng Sa', 57, 1, ''),
(60, 'Quận Cẩm Lệ', 57, 1, ''),
(61, 'Quận Hải Châu', 57, 1, ''),
(62, 'Quận Liên Chiểu', 57, 1, ''),
(63, 'Quận Ngũ Hành Sơn', 57, 1, ''),
(64, 'Quận Sơn Trà', 57, 1, ''),
(65, 'Quận Thanh Khê', 57, 1, ''),
(66, 'An Gian', 0, 1, ''),
(67, 'Huyện An Phú', 66, 1, ''),
(68, 'Huyện Châu Phú', 66, 1, ''),
(69, 'Huyện Châu Thành', 66, 1, ''),
(70, 'Huyện Chợ Mới', 66, 1, ''),
(71, 'Huyện Thoại Sơn', 66, 1, ''),
(72, 'Huyện Tịnh Biên', 66, 1, ''),
(73, 'Huyện Tri Tôn', 66, 1, ''),
(74, 'Phú Tân', 66, 1, ''),
(75, 'Thành Phố Châu Đốc', 66, 1, ''),
(76, 'Thành phố Long Xuyên', 66, 1, ''),
(77, 'Thị xã Tân Châu', 66, 1, ''),
(78, 'Vũng Tàu', 0, 1, ''),
(79, 'Huyện Châu Đức', 78, 1, ''),
(80, 'Huyện Côn Đảo', 78, 1, ''),
(81, 'Huyện Đất Đỏ', 78, 1, ''),
(82, 'Huyện Long Điền', 78, 1, ''),
(83, 'Huyện Tân Thành', 78, 1, ''),
(84, 'Huyện Xuyên Mộc', 78, 1, ''),
(85, 'Thành phố Vũng Tàu', 78, 1, ''),
(86, 'Thị xã Bà Rịa', 78, 1, ''),
(87, 'Bắc Cạn', 0, 1, ''),
(88, 'Huyện Ba Bể', 87, 1, ''),
(89, 'Huyện Bạch Thông', 87, 1, ''),
(90, 'Huyện Chợ Đồn', 87, 1, ''),
(91, 'Huyện Chợ Mới', 87, 1, ''),
(92, 'Huyện Na Rì', 87, 1, ''),
(93, 'Huyện Ngân Sơn', 87, 1, ''),
(94, 'Huyện Pác Nặm', 87, 1, ''),
(95, 'Thị xã Bắc Kạn', 87, 1, ''),
(96, 'Bắc Giang', 0, 1, ''),
(97, 'Huyện Hiệp Hòa', 96, 1, ''),
(98, 'Huyện Lạng Giang', 96, 1, ''),
(99, 'Huyện Lục Nam', 96, 1, ''),
(100, 'Huyện Lục Ngạn', 96, 1, ''),
(101, 'Huyện Sơn Động', 96, 1, ''),
(102, 'Huyện Tân Yên', 96, 1, ''),
(103, 'Huyện Việt Yên', 96, 1, ''),
(104, 'Huyện Yên Dũng', 96, 1, ''),
(105, 'Huyện Yên Thế', 96, 1, ''),
(106, 'Thành phố Bắc Giang', 96, 1, ''),
(107, 'Bạc Liêu', 0, 1, ''),
(108, 'Huyện Đông Hải', 107, 1, ''),
(109, 'Huyện Giá Rai', 107, 1, ''),
(110, 'Huyện Hoà Bình', 107, 1, ''),
(111, 'Huyện Hồng Dân', 107, 1, ''),
(112, 'Huyện Phước Long', 107, 1, ''),
(113, 'Huyện Vĩnh Lợi', 107, 1, ''),
(114, 'Thành phố Bạc Liêu', 107, 1, ''),
(115, 'Bắc Ninh', 0, 1, ''),
(116, 'Huyện Gia Bình', 115, 1, ''),
(117, 'Huyện Lương Tài', 115, 1, ''),
(118, 'Huyện Quế Võ', 115, 1, ''),
(119, 'Huyện Thuận Thành', 115, 1, ''),
(120, 'Huyện Tiên Du', 115, 1, ''),
(121, 'Huyện Yên Phong', 115, 1, ''),
(122, 'Thành phố Bắc Ninh', 115, 1, ''),
(123, 'Thị xã Từ Sơn', 115, 1, ''),
(124, 'Bến Tre', 0, 1, ''),
(125, 'Huyện Ba Tri', 124, 1, ''),
(126, 'Huyện Bình Đại', 124, 1, ''),
(127, 'Huyện Châu Thành', 124, 1, ''),
(128, 'Huyện Chợ Lách', 124, 1, ''),
(129, 'Huyện Giồng Trôm', 124, 1, ''),
(130, 'Huyện Mỏ Cày Bắc', 124, 1, ''),
(131, 'Huyện Mỏ Cày Nam', 124, 1, ''),
(132, 'Huyện Thạnh Phú', 124, 1, ''),
(133, 'Thành phố Bến Tre', 124, 1, ''),
(134, 'Bình Định', 0, 1, ''),
(135, 'Huyện An Lão', 134, 1, ''),
(136, 'Huyện An Nhơn', 134, 1, ''),
(137, 'Huyện Hoài Ân', 134, 1, ''),
(138, 'Huyện Hoài Nhơn', 134, 1, ''),
(139, 'Huyện Phù Cát', 134, 1, ''),
(140, 'Huyện Phù Mỹ', 134, 1, ''),
(141, 'Huyện Tây Sơn', 134, 1, ''),
(142, 'Huyện Tuy Phước', 134, 1, ''),
(143, 'Huyện Vân Canh', 134, 1, ''),
(144, 'Huyện Vĩnh Thạnh', 134, 1, ''),
(145, 'Thành phố Qui Nhơn', 134, 1, ''),
(146, 'Bình Dương', 0, 1, ''),
(147, 'Huyện Bắc Tân Uyên', 146, 1, ''),
(148, 'Huyện Bàu Bàng', 146, 1, ''),
(149, 'Huyện Dầu Tiếng', 146, 1, ''),
(150, 'Huyện Phú Giáo', 146, 1, ''),
(151, 'Thành phố Thủ Dầu Một', 146, 1, ''),
(152, 'Thị xã Bến Cát', 146, 1, ''),
(153, 'Thị xã Dĩ An', 146, 1, ''),
(154, 'Thị xã Tân Uyên', 146, 1, ''),
(155, 'Thị xã Thuận An', 146, 1, ''),
(156, 'Bình Phước', 0, 1, ''),
(157, 'Huyện Bù Đăng', 156, 1, ''),
(158, 'Huyện Bù Đốp', 156, 1, ''),
(159, 'Huyện Bù Gia Mập', 156, 1, ''),
(160, 'Huyện Chơn Thành', 156, 1, ''),
(161, 'Huyện Đồng Phú', 156, 1, ''),
(162, 'Huyện Hớn Quản', 156, 1, ''),
(163, 'Huyện Lộc Ninh', 156, 1, ''),
(164, 'Huyện Phú Riềng', 156, 1, ''),
(165, 'Thị xã Bình Long', 156, 1, ''),
(166, 'Thị xã Đồng Xoài', 156, 1, ''),
(167, 'Thị xã Phước Long', 156, 1, ''),
(168, 'Bình Thuận', 0, 1, ''),
(169, 'Huyện Bắc Bình', 168, 1, ''),
(170, 'Huyện Đức Linh', 168, 1, ''),
(171, 'Huyện Hàm Tân', 168, 1, ''),
(172, 'Huyện Hàm Thuận Bắc', 168, 1, ''),
(173, 'Huyện Hàm Thuận Nam', 168, 1, ''),
(174, 'Huyện Tánh Linh', 168, 1, ''),
(175, 'Huyện Tuy Phong', 168, 1, ''),
(176, 'Huyện đảo Phú Quý', 168, 1, ''),
(177, 'Thành phố Phan Thiết', 168, 1, ''),
(178, 'Thị xã La Gi', 168, 1, ''),
(179, 'Cà Mau', 0, 1, ''),
(180, 'Huyện Cái Nước', 179, 1, ''),
(181, 'Huyện Đầm Dơi', 179, 1, ''),
(182, 'Huyện Năm Căn', 179, 1, ''),
(183, 'Huyện Ngọc Hiển', 179, 1, ''),
(184, 'Huyện Phú Tân', 179, 1, ''),
(185, 'Huyện Thới Bình', 179, 1, ''),
(186, 'Huyện Trần Văn Thời', 179, 1, ''),
(187, 'Huyện U Minh', 179, 1, ''),
(188, 'Thành phố Cà Mau', 179, 1, ''),
(189, 'Cần Thơ', 0, 1, ''),
(190, 'Huyện Cờ Đỏ', 189, 1, ''),
(191, 'Huyện Phong Điền', 189, 1, ''),
(192, 'Huyện Thới Lai', 189, 1, ''),
(193, 'Huyện Vĩnh Thạnh', 189, 1, ''),
(194, 'Quận Bình Thủy', 189, 1, ''),
(195, 'Quận Cái Răng', 189, 1, ''),
(196, 'Quận Ninh Kiều', 189, 1, ''),
(197, 'Quận Ô Môn', 189, 1, ''),
(198, 'Quận Thốt Nốt', 189, 1, ''),
(199, 'Cao Bằng', 0, 1, ''),
(200, 'Huyện Bảo Lạc', 199, 1, ''),
(201, 'Huyện Bảo Lâm', 199, 1, ''),
(202, 'Huyện Hạ Lang', 199, 1, ''),
(203, 'Huyện Hà Quảng', 199, 1, ''),
(204, 'Huyện Hòa An', 199, 1, ''),
(205, 'Huyện Nguyên Bình', 199, 1, ''),
(206, 'Huyện Phục Hòa', 199, 1, ''),
(207, 'Huyện Quảng Uyên', 199, 1, ''),
(208, 'Huyện Thạch An', 199, 1, ''),
(209, 'Huyện Thông Nông', 199, 1, ''),
(210, 'Huyện Trà Lĩnh', 199, 1, ''),
(211, 'Huyện Trùng Khánh', 199, 1, ''),
(212, 'Thị xã Cao Bằng', 199, 1, ''),
(213, 'Đắc Lắc', 0, 1, ''),
(214, 'Huyện Buôn Đôn', 213, 1, ''),
(215, 'Huyện Cư Kuin', 213, 1, ''),
(216, 'Huyện Cư Mgar', 213, 1, ''),
(218, 'Huyện Ea Kar', 213, 1, ''),
(219, 'Huyện Ea Súp', 213, 1, ''),
(220, 'Huyện Krông Ana', 213, 1, ''),
(221, 'Huyện Krông Bông', 213, 1, ''),
(222, 'Huyện Krông Búk', 213, 1, ''),
(223, 'Huyện Krông Năng', 213, 1, ''),
(224, 'Huyện Krông Pắk', 213, 1, ''),
(225, 'Huyện Lăk', 213, 1, ''),
(227, 'Thành phố Buôn Ma Thuột', 213, 1, ''),
(228, 'Thị xã Buôn Hồ', 213, 1, ''),
(229, 'Đắc Nông', 0, 1, ''),
(230, 'Huyện Cư Jút', 229, 1, ''),
(231, 'Huyện Đăk Glong', 229, 1, ''),
(232, 'Huyện Đăk Mil', 229, 1, ''),
(234, 'Huyện Đăk Song', 229, 1, ''),
(235, 'Huyện Krông Nô', 229, 1, ''),
(236, 'Huyện Tuy Đức', 229, 1, ''),
(237, 'Thị xã Gia Nghĩa', 229, 1, ''),
(238, 'Điện Biên', 0, 1, ''),
(239, 'Huyện Điện Biên', 238, 1, ''),
(240, 'Huyện Điện Biên Đông', 238, 1, ''),
(241, 'Huyện Mường Ảng', 238, 1, ''),
(242, 'Huyện Mường Chà', 238, 1, ''),
(243, 'Huyện Mường Nhé', 238, 1, ''),
(244, 'Huyện Nậm Pồ', 238, 1, ''),
(245, 'Huyện Tủa Chùa', 238, 1, ''),
(246, 'Huyện Tuần Giáo', 238, 1, ''),
(247, 'Thành phố Điện Biên Phủ', 238, 1, ''),
(248, 'Thị xã Mường Lay', 238, 1, ''),
(249, 'Đồng Nai', 0, 1, ''),
(250, 'Huyện Cẩm Mỹ', 249, 1, ''),
(251, 'Huyện Định Quán', 249, 1, ''),
(252, 'Huyện Long Thành', 249, 1, ''),
(253, 'Huyện Nhơn Trạch', 249, 1, ''),
(254, 'Huyện Tân Phú', 249, 1, ''),
(255, 'Huyện Thống Nhất', 249, 1, ''),
(256, 'Huyện Trảng Bom', 249, 1, ''),
(257, 'Huyện Vĩnh Cửu', 249, 1, ''),
(258, 'Huyện Xuân Lộc', 249, 1, ''),
(259, 'Thành phố Biên Hòa', 249, 1, ''),
(260, 'Thị xã Long Khánh', 249, 1, ''),
(261, 'Đồng Tháp', 0, 1, ''),
(262, 'Huyện Cao Lãnh', 261, 1, ''),
(263, 'Huyện Châu Thành', 261, 1, ''),
(264, 'Huyện Hồng Ngự', 261, 1, ''),
(265, 'Huyện Lai Vung', 261, 1, ''),
(266, 'Huyện Lấp Vò', 261, 1, ''),
(267, 'Huyện Tam Nông', 261, 1, ''),
(268, 'Huyện Tân Hồng', 261, 1, ''),
(269, 'Huyện Thanh Bình', 261, 1, ''),
(270, 'Huyện Tháp Mười', 261, 1, ''),
(271, 'Thành phố Cao Lãnh', 261, 1, ''),
(272, 'Thị xã Hồng Ngự', 261, 1, ''),
(273, 'Thị xã Sa Đéc', 261, 1, ''),
(274, 'Gia Lai', 0, 1, ''),
(275, 'Huyện Chư Păh', 274, 1, ''),
(276, 'Huyện Chư Prông', 274, 1, ''),
(277, 'Huyện Chư Pưh', 274, 1, ''),
(278, 'Huyện Chư Sê', 274, 1, ''),
(279, 'Huyện Đăk Đoa', 274, 1, ''),
(280, 'Huyện Đắk Pơ', 274, 1, ''),
(281, 'Huyện Đức Cơ', 274, 1, ''),
(282, 'Huyện Ia Grai', 274, 1, ''),
(283, 'Huyện Ia Pa', 274, 1, ''),
(284, 'Huyện Kbang', 274, 1, ''),
(285, 'Huyện Kông Chro', 274, 1, ''),
(286, 'Huyện Krông Pa', 274, 1, ''),
(287, 'Huyện Mang Yang', 274, 1, ''),
(288, 'Huyện Phú Thiện', 274, 1, ''),
(289, 'Thành phố Pleiku', 274, 1, ''),
(290, 'Thị xã An Khê', 274, 1, ''),
(291, 'Thị xã Ayun Pa', 274, 1, ''),
(292, 'Hà Giang', 0, 1, ''),
(293, 'Huyện Bắc Mê', 292, 1, ''),
(294, 'Huyện Bắc Quang', 292, 1, ''),
(295, 'Huyện Đồng Văn', 292, 1, ''),
(296, 'Huyện Hoàng Su Phì', 292, 1, ''),
(297, 'Huyện Mèo Vạc', 292, 1, ''),
(298, 'Huyện Quản Bạ', 292, 1, ''),
(299, 'Huyện Quang Bình', 292, 1, ''),
(300, 'Huyện Vị Xuyên', 292, 1, ''),
(301, 'Huyện Xín Mần', 292, 1, ''),
(302, 'Huyện Yên Minh', 292, 1, ''),
(303, 'Thành phố Hà Giang', 292, 1, ''),
(304, 'Hà Nam', 0, 1, ''),
(305, 'Huyện Bình Lục', 304, 1, ''),
(306, 'Huyện Duy Tiên', 304, 1, ''),
(307, 'Huyện Kim Bảng', 304, 1, ''),
(308, 'Huyện Lý Nhân', 304, 1, ''),
(309, 'Huyện Thanh Liêm', 304, 1, ''),
(310, 'Thành phố Phủ Lý', 304, 1, ''),
(311, 'Hà Tĩnh', 0, 1, ''),
(312, 'Huyện Cẩm Xuyên', 311, 1, ''),
(313, 'Huyện Can Lộc', 311, 1, ''),
(314, 'Huyện Đức Thọ', 311, 1, ''),
(315, 'Huyện Hương Khê', 311, 1, ''),
(316, 'Huyện Hương Sơn', 311, 1, ''),
(317, 'Huyện Kỳ Anh', 311, 1, ''),
(318, 'Huyện Lộc Hà', 311, 1, ''),
(319, 'Huyện Nghi Xuân', 311, 1, ''),
(320, 'Huyện Thạch Hà', 311, 1, ''),
(321, 'Huyện Vũ Quang', 311, 1, ''),
(322, 'Thành phố Hà Tĩnh', 311, 1, ''),
(323, 'Thị xã Hồng Lĩnh', 311, 1, ''),
(324, 'Thị xã Kỳ Anh', 311, 1, ''),
(325, 'Hải Dương', 0, 1, ''),
(326, 'Huyện Bình Giang', 325, 1, ''),
(327, 'Huyện Cẩm Giàng', 325, 1, ''),
(328, 'Huyện Gia Lộc', 325, 1, ''),
(329, 'Huyện Kim Thành', 325, 1, ''),
(330, 'Huyện Kinh Môn', 325, 1, ''),
(331, 'Huyện Nam Sách', 325, 1, ''),
(332, 'Huyện Ninh Giang', 325, 1, ''),
(333, 'Huyện Thanh Hà', 325, 1, ''),
(334, 'Huyện Thanh Miện', 325, 1, ''),
(335, 'Huyện Tứ Kỳ', 325, 1, ''),
(336, 'Thành phố Hải Dương', 325, 1, ''),
(337, 'Thị xã Chí Linh', 325, 1, ''),
(338, 'Hải Phòng', 0, 1, ''),
(339, 'Huyện An Dương', 338, 1, ''),
(340, 'Huyện An Lão', 338, 1, ''),
(341, 'Huyện Kiến Thụy', 338, 1, ''),
(342, 'Huyện Thuỷ Nguyên', 338, 1, ''),
(343, 'Huyện Tiên Lãng', 338, 1, ''),
(344, 'Huyện Vĩnh Bảo', 338, 1, ''),
(345, 'Huyện đảo Bạch Long Vĩ', 338, 1, ''),
(346, 'Huyện đảo Cát Hải', 338, 1, ''),
(347, 'Quận Đồ Sơn', 338, 1, ''),
(348, 'Quận Dương Kinh', 338, 1, ''),
(349, 'Quận Hải An', 338, 1, ''),
(350, 'Quận Hồng Bàng', 338, 1, ''),
(351, 'Quận Kiến An', 338, 1, ''),
(352, 'Quận Lê Chân', 338, 1, ''),
(353, 'Quận Ngô Quyền', 338, 1, ''),
(354, 'Hậu Giang', 0, 1, ''),
(355, 'Huyện Châu Thành', 354, 1, ''),
(356, 'Huyện Châu Thành A', 354, 1, ''),
(357, 'Huyện Long Mỹ', 354, 1, ''),
(358, 'Huyện Phụng Hiệp', 354, 1, ''),
(359, 'Huyện Vị Thủy', 354, 1, ''),
(360, 'Thành phố Vị Thanh', 354, 1, ''),
(361, 'Thị xã Long Mỹ', 354, 1, ''),
(362, 'Thị xã Ngã Bảy', 354, 1, ''),
(363, 'HòaBình', 0, 1, ''),
(364, 'Huyện Cao Phong', 363, 1, ''),
(365, 'Huyện Đà Bắc', 363, 1, ''),
(366, 'Huyện Kim Bôi', 363, 1, ''),
(367, 'Huyện Kỳ Sơn', 363, 1, ''),
(368, 'Huyện Lạc Sơn', 363, 1, ''),
(369, 'Huyện Lạc Thủy', 363, 1, ''),
(370, 'Huyện Lương Sơn', 363, 1, ''),
(371, 'Huyện Mai Châu', 363, 1, ''),
(372, 'Huyện Tân Lạc', 363, 1, ''),
(373, 'Huyện Yên Thủy', 363, 1, ''),
(374, 'Thành phố Hoà Bình', 363, 1, ''),
(375, 'Hưng Yên', 0, 1, ''),
(376, 'Huyện Ân Thi', 375, 1, ''),
(377, 'Huyện Khoái Châu', 375, 1, ''),
(378, 'Huyện Kim Động', 375, 1, ''),
(379, 'Huyện Mỹ Hào', 375, 1, ''),
(380, 'Huyện Phù Cừ', 375, 1, ''),
(381, 'Huyện Tiên Lữ', 375, 1, ''),
(382, 'Huyện Văn Giang', 375, 1, ''),
(383, 'Huyện Văn Lâm', 375, 1, ''),
(384, 'Huyện Yên Mỹ', 375, 1, ''),
(385, 'Thành phố Hưng Yên', 375, 1, ''),
(386, 'Khánh Hòa', 0, 1, ''),
(387, 'Huyện Cam Lâm', 386, 1, ''),
(388, 'Huyện Diên Khánh', 386, 1, ''),
(389, 'Huyện Khánh Sơn', 386, 1, ''),
(390, 'Huyện Khánh Vĩnh', 386, 1, ''),
(391, 'Huyện Vạn Ninh', 386, 1, ''),
(392, 'Huyện đảo Trường Sa', 386, 1, ''),
(393, 'Thành phố Cam Ranh', 386, 1, ''),
(394, ' Nha Trang', 386, 1, ''),
(395, 'Thị xã Ninh Hòa', 386, 1, ''),
(396, 'Kiên Giang', 0, 1, ''),
(397, 'Huyện An Biên', 396, 1, ''),
(398, 'Huyện An Minh', 396, 1, ''),
(399, 'Huyện Châu Thành', 396, 1, ''),
(400, 'Huyện Giang Thành', 396, 1, ''),
(401, 'Huyện Giồng Riềng', 396, 1, ''),
(402, 'Huyện Gò Quao', 396, 1, ''),
(403, 'Huyện Hòn Đất', 396, 1, ''),
(404, 'Huyện Kiên Lương', 396, 1, ''),
(405, 'Huyện Tân Hiệp', 396, 1, ''),
(406, 'Huyện U Minh Thượng', 396, 1, ''),
(407, 'Huyện Vĩnh Thuận', 396, 1, ''),
(408, 'Huyện đảo Kiên Hải', 396, 1, ''),
(409, 'Huyện đảo Phú Quốc', 396, 1, ''),
(410, 'Thành phố Rạch Giá', 396, 1, ''),
(411, 'Thị xã Hà Tiên', 396, 1, ''),
(412, 'Kom Tum', 0, 1, ''),
(413, 'Huyện Đắk Glei', 412, 1, ''),
(414, 'Huyện Đắk Hà', 412, 1, ''),
(415, 'Huyện Đăk Tô', 412, 1, ''),
(417, 'Huyện Kon Plông', 412, 1, ''),
(418, 'Huyện Kon Rẫy', 412, 1, ''),
(419, 'Huyện Ngọc Hồi', 412, 1, ''),
(420, 'Huyện Sa Thầy', 412, 1, ''),
(421, 'Huyện Tu Mơ Rông', 412, 1, ''),
(422, 'Thành phố Kon Tum', 412, 1, ''),
(423, 'Lai Châu', 0, 1, ''),
(424, 'Huyện Mường Tè', 423, 1, ''),
(425, 'Huyện Nậm Nhùn', 423, 1, ''),
(426, 'Huyện Phong Thổ', 423, 1, ''),
(427, 'Huyện Sìn Hồ', 423, 1, ''),
(428, 'Huyện Tam Đường', 423, 1, ''),
(429, 'Huyện Tân Uyên', 423, 1, ''),
(430, 'Huyện Than Uyên', 423, 1, ''),
(431, 'Thị xã Lai Châu', 423, 1, ''),
(432, 'Lâm Đồng', 0, 1, ''),
(433, 'Huyện Bảo Lâm', 432, 1, ''),
(434, 'Huyện Cát Tiên', 432, 1, ''),
(435, 'Huyện Đạ Huoai', 432, 1, ''),
(436, 'Huyện Đạ Tẻh', 432, 1, ''),
(437, 'Huyện Đam Rông', 432, 1, ''),
(438, 'Huyện Di Linh', 432, 1, ''),
(439, 'Huyện Đức Trọng', 432, 1, ''),
(440, 'Huyện Lạc Dương', 432, 1, ''),
(441, 'Huyện Lâm Hà', 432, 1, ''),
(442, 'Thành phố Bảo Lộc', 432, 1, ''),
(443, 'Thành phố Đà Lạt', 432, 1, ''),
(444, 'Huyện Đơn Dương', 432, 1, ''),
(445, 'Lạng Sơn', 0, 1, ''),
(446, 'Huyện Bắc Sơn', 445, 1, ''),
(447, 'Huyện Bình Gia', 445, 1, ''),
(448, 'Huyện Cao Lộc', 445, 1, ''),
(449, 'Huyện Chi Lăng', 445, 1, ''),
(450, 'Huyện Đình Lập', 445, 1, ''),
(451, 'Huyện Hữu Lũng', 445, 1, ''),
(452, 'Huyện Lộc Bình', 445, 1, ''),
(453, 'Huyện Văn Lãng', 445, 1, ''),
(454, 'Huyện Văn Quan', 445, 1, ''),
(455, 'Thành phố Lạng Sơn', 445, 1, ''),
(456, 'Huyện Tràng Định', 445, 1, ''),
(457, 'Lào Cai', 0, 1, ''),
(458, 'Huyện Bắc Hà', 457, 1, ''),
(459, 'Huyện Bảo Thắng', 457, 1, ''),
(460, 'Huyện Bảo Yên', 457, 1, ''),
(461, 'Huyện Bát Xát', 457, 1, ''),
(462, 'Huyện Mường Khương', 457, 1, ''),
(463, 'Huyện Sa Pa', 457, 1, ''),
(464, 'Huyện Si Ma Cai', 457, 1, ''),
(465, 'Huyện Văn Bàn', 457, 1, ''),
(466, 'Thành phố Lào Cai', 457, 1, ''),
(467, 'Long An', 0, 1, ''),
(468, 'Huyện Bến Lức', 467, 1, ''),
(469, 'Huyện Cần Đước', 467, 1, ''),
(470, 'Huyện Cần Giuộc', 467, 1, ''),
(471, 'Huyện Châu Thành', 467, 1, ''),
(472, 'Huyện Đức Hòa', 467, 1, ''),
(473, 'Huyện Đức Huệ', 467, 1, ''),
(474, 'Huyện Mộc Hóa', 467, 1, ''),
(475, 'Huyện Tân Hưng', 467, 1, ''),
(476, 'Huyện Tân Thạnh', 467, 1, ''),
(477, 'Huyện Tân Trụ', 467, 1, ''),
(478, 'Huyện Thạnh Hóa', 467, 1, ''),
(479, 'Huyện Thủ Thừa', 467, 1, ''),
(480, 'Huyện Vĩnh Hưng', 467, 1, ''),
(481, 'Thành phố Tân An', 467, 1, ''),
(482, 'Thị xã Kiến Tường', 467, 1, ''),
(483, 'Nam Định', 0, 1, ''),
(484, 'Huyện Giao Thủy', 483, 1, ''),
(485, 'Huyện Hải Hậu', 483, 1, ''),
(486, 'Huyện Mỹ Lộc', 483, 1, ''),
(487, 'Huyện Nam Trực', 483, 1, ''),
(488, 'Huyện Nghĩa Hưng', 483, 1, ''),
(489, 'Huyện Trực Ninh', 483, 1, ''),
(490, 'Huyện Vụ Bản', 483, 1, ''),
(491, 'Huyện Xuân Trường', 483, 1, ''),
(492, 'Huyện Ý Yên', 483, 1, ''),
(493, 'Thành phố Nam Định', 483, 1, ''),
(494, 'Nghệ An', 0, 1, ''),
(495, 'Huyện Anh Sơn', 494, 1, ''),
(496, 'Huyện Con Cuông', 494, 1, ''),
(497, 'Huyện Diễn Châu', 494, 1, ''),
(498, 'Huyện Đô Lương', 494, 1, ''),
(499, 'Huyện Hưng Nguyên', 494, 1, ''),
(500, 'Huyện Kỳ Sơn', 494, 1, ''),
(501, 'Huyện Nam Đàn', 494, 1, ''),
(502, 'Huyện Nghi Lộc', 494, 1, ''),
(503, 'Huyện Nghĩa Đàn', 494, 1, ''),
(504, 'Huyện Quế Phong', 494, 1, ''),
(505, 'Huyện Quỳ Châu', 494, 1, ''),
(506, 'Huyện Quỳ Hợp', 494, 1, ''),
(507, 'Huyện Quỳnh Lưu', 494, 1, ''),
(508, 'Huyện Tân Kỳ', 494, 1, ''),
(509, 'Huyện Thanh Chương', 494, 1, ''),
(510, 'Huyện Tương Dương', 494, 1, ''),
(511, 'Huyện Yên Thành', 494, 1, ''),
(512, 'Thành phố Vinh', 494, 1, ''),
(513, 'Thị xã Cửa Lò', 494, 1, ''),
(514, 'Thị xã Hoàng Mai', 494, 1, ''),
(515, 'Thị xã Thái Hòa', 494, 1, ''),
(516, 'Ninh Bình', 0, 1, ''),
(517, 'Huyện Gia Viễn', 516, 1, ''),
(518, 'Huyện Hoa Lư', 516, 1, ''),
(519, 'Huyện Kim Sơn', 516, 1, ''),
(520, 'Huyện Nho Quan', 516, 1, ''),
(521, 'Huyện Yên Khánh', 516, 1, ''),
(522, 'Huyện Yên Mô', 516, 1, ''),
(523, 'Thành phố Ninh Bình', 516, 1, ''),
(524, 'Thị xã Tam Điệp', 516, 1, ''),
(525, 'Ninh Thuận', 0, 1, ''),
(526, 'Huyện Bác Ái', 525, 1, ''),
(527, 'Huyện Ninh Hải', 525, 1, ''),
(528, 'Huyện Ninh Phước', 525, 1, ''),
(529, 'Huyện Ninh Sơn', 525, 1, ''),
(530, 'Huyện Thuận Bắc', 525, 1, ''),
(531, 'Huyện Thuận Nam', 525, 1, ''),
(532, 'Thành phố Phan Rang-Tháp Chàm', 525, 1, ''),
(533, 'Phú Thọ', 0, 1, ''),
(534, 'Huyện Cẩm Khê', 533, 1, ''),
(535, 'Huyện Đoan Hùng', 533, 1, ''),
(536, 'Huyện Hạ Hòa', 533, 1, ''),
(537, 'Huyện Lâm Thao', 533, 1, ''),
(538, 'Huyện Phù Ninh', 533, 1, ''),
(539, 'Huyện Tam Nông', 533, 1, ''),
(540, 'Huyện Tân Sơn', 533, 1, ''),
(541, 'Huyện Thanh Ba', 533, 1, ''),
(542, 'Huyện Thanh Sơn', 533, 1, ''),
(543, 'Huyện Thanh Thủy', 533, 1, ''),
(544, 'Huyện Yên Lập', 533, 1, ''),
(545, 'Thành phố Việt Trì', 533, 1, ''),
(546, 'Thị xã Phú Thọ', 533, 1, ''),
(547, 'Phú Yên', 0, 1, ''),
(548, 'Huyện Đông Hòa', 547, 1, ''),
(549, 'Huyện Đồng Xuân', 547, 1, ''),
(550, 'Huyện Phú Hòa', 547, 1, ''),
(551, 'Huyện Sơn Hòa', 547, 1, ''),
(552, 'Huyện Sông Hin', 547, 1, ''),
(553, 'Huyện Tây Hòa', 547, 1, ''),
(554, 'Huyện Tuy An', 547, 1, ''),
(555, 'Thành phố Tuy Hòa', 547, 1, ''),
(556, 'Thị xã Sông Cầu', 547, 1, ''),
(557, 'Quảng Bình', 0, 1, ''),
(558, 'Huyện Bố Trạch', 557, 1, ''),
(559, 'Huyện Lệ Thủy', 557, 1, ''),
(560, 'Huyện Minh Hóa', 557, 1, ''),
(561, 'Huyện Quảng Ninh', 557, 1, ''),
(562, 'Huyện Quảng Trạch', 557, 1, ''),
(563, 'Huyện Tuyên Hóa', 557, 1, ''),
(564, 'Thành phố Đồng Hới', 557, 1, ''),
(565, 'Thị xã Ba Đồn', 557, 1, ''),
(566, 'Quảng Nam', 0, 1, ''),
(567, 'Huyện Bắc Trà My', 566, 1, ''),
(568, 'Huyện Đại Lộc', 566, 1, ''),
(569, 'Huyện Điện Bàn', 566, 1, ''),
(570, 'Huyện Đông Giang', 566, 1, ''),
(571, 'Huyện Duy Xuyên', 566, 1, ''),
(572, 'Huyện Hiệp Đức', 566, 1, ''),
(573, 'Huyện Nam Giang', 566, 1, ''),
(574, 'Huyện Nam Trà My', 566, 1, ''),
(575, 'Huyện Nông Sơn', 566, 1, ''),
(576, 'Huyện Núi Thành', 566, 1, ''),
(577, 'Huyện Phú Ninh', 566, 1, ''),
(578, 'Huyện Phước Sơn', 566, 1, ''),
(579, 'Huyện Quế Sơn', 566, 1, ''),
(580, 'Huyện Tây Giang', 566, 1, ''),
(581, 'Huyện Thăng Bình', 566, 1, ''),
(582, 'Huyện Tiên Phước', 566, 1, ''),
(583, 'Thành phố Hội An', 566, 1, ''),
(584, 'Thành phố Tam Kỳ', 566, 1, ''),
(585, 'Quảng Nam', 0, 1, ''),
(586, 'Huyện Bắc Trà My', 585, 1, ''),
(587, 'Huyện Đại Lộc', 585, 1, ''),
(588, 'Huyện Điện Bàn', 585, 1, ''),
(589, 'Huyện Đông Giang', 585, 1, ''),
(590, 'Huyện Duy Xuyên', 585, 1, ''),
(591, 'Huyện Hiệp Đức', 585, 1, ''),
(592, 'Huyện Nam Giang', 585, 1, ''),
(593, 'Huyện Nam Trà My', 585, 1, ''),
(594, 'Huyện Nông Sơn', 585, 1, ''),
(595, 'Huyện Núi Thành', 585, 1, ''),
(596, 'Huyện Phú Ninh', 585, 1, ''),
(597, 'Huyện Phước Sơn', 585, 1, ''),
(598, 'Huyện Quế Sơn', 585, 1, ''),
(599, 'Huyện Tây Giang', 585, 1, ''),
(600, 'Huyện Thăng Bình', 585, 1, ''),
(601, 'Huyện Tiên Phước', 585, 1, ''),
(602, 'Thành phố Hội An', 585, 1, ''),
(603, 'Thành phố Tam Kỳ', 585, 1, ''),
(604, 'Quảng Ninh', 0, 1, ''),
(605, 'Huyện Ba Chẽ', 604, 1, ''),
(606, 'Huyện Bình Liêu', 604, 1, ''),
(607, 'Huyện Đầm Hà', 604, 1, ''),
(608, 'Huyện Đông Triều', 604, 1, ''),
(609, 'Huyện Hải Hà', 604, 1, ''),
(610, 'Huyện Hoành Bồ', 604, 1, ''),
(611, 'Huyện Tiên Yên', 604, 1, ''),
(612, 'Huyện Tư Nghĩa', 604, 1, ''),
(613, 'Huyện Vân Đồn', 604, 1, ''),
(614, 'Huyện Yên Hưng', 604, 1, ''),
(615, 'Huyện đảo Cô Tô', 604, 1, ''),
(616, 'Thành phố Cẩm Phả', 604, 1, ''),
(617, 'Thành phố Hạ Long', 604, 1, ''),
(618, 'Thành phố Móng Cái', 604, 1, ''),
(619, 'Thành phố Uông Bí', 604, 1, ''),
(620, 'Thị Xã Quảng Yên', 604, 1, ''),
(621, 'Quảng Trị', 0, 1, ''),
(622, 'Huyện Cam Lộ', 621, 1, ''),
(623, 'Huyện Đa Krông', 621, 1, ''),
(624, 'Huyện Gio Linh', 621, 1, ''),
(625, 'Huyện Hải Lăng', 621, 1, ''),
(626, 'Huyện Hướng Hóa', 621, 1, ''),
(627, 'Huyện Triệu Phong', 621, 1, ''),
(628, 'Huyện Vĩnh Linh', 621, 1, ''),
(629, 'Huyện đảo Cồn Cỏ', 621, 1, ''),
(630, 'Thành phố Đông Hà', 621, 1, ''),
(631, 'Thị xã Quảng Trị', 621, 1, ''),
(632, 'Sóc Trăng', 0, 1, ''),
(633, 'Huyện Châu Thành', 632, 1, ''),
(634, 'Huyện Cù Lao Dung', 632, 1, ''),
(635, 'Huyện Kế Sách', 632, 1, ''),
(636, 'uyện Long Phú', 632, 1, ''),
(637, 'Huyện Mỹ Tú', 632, 1, ''),
(638, 'Huyện Mỹ Xuyên', 632, 1, ''),
(639, 'Huyện Ngã Năm', 632, 1, ''),
(640, 'Huyện Thạnh Trị', 632, 1, ''),
(641, 'Huyện Trần Đề', 632, 1, ''),
(642, 'Huyện Vĩnh Châu', 632, 1, ''),
(643, 'Thành phố Sóc Trăng', 632, 1, ''),
(644, 'Sơn La', 0, 1, ''),
(645, 'Huyện Bắc Yên', 644, 1, ''),
(646, 'Huyện Mai Sơn', 644, 1, ''),
(647, 'Huyện Mộc Châu', 644, 1, ''),
(648, 'Huyện Mường La', 644, 1, ''),
(649, 'Huyện Phù Yên', 644, 1, ''),
(650, 'Huyện Quỳnh Nhai', 644, 1, ''),
(651, 'Huyện Sông Mã', 644, 1, ''),
(652, 'Huyện Sốp Cộp', 644, 1, ''),
(653, 'Huyện Thuận Châu', 644, 1, ''),
(654, 'Huyện Vân Hồ', 644, 1, ''),
(655, 'Huyện Yên Châu', 644, 1, ''),
(656, 'Thành phố Sơn La', 644, 1, ''),
(657, 'Tây Ninh', 0, 1, ''),
(658, 'Huyện Bến Cầu', 657, 1, ''),
(659, 'Huyện Châu Thành', 657, 1, ''),
(660, 'Huyện Dương Minh Châu', 657, 1, ''),
(661, 'Huyện Gò Dầu', 657, 1, ''),
(662, 'Huyện Hòa Thành', 657, 1, ''),
(663, 'Huyện Tân Biên', 657, 1, ''),
(664, 'Huyện Tân Châu', 657, 1, ''),
(665, 'Huyện Trảng Bàng', 657, 1, ''),
(666, 'Thị xã Tây Ninh', 657, 1, ''),
(667, 'Thái Bình', 0, 1, ''),
(668, 'Huyện Đông Hưng', 667, 1, ''),
(669, 'Huyện Hưng Hà', 667, 1, ''),
(670, 'Huyện Kiến Xương', 667, 1, ''),
(671, 'Huyện Quỳnh Phụ', 667, 1, ''),
(672, 'Huyện Thái Thụy', 667, 1, ''),
(673, 'Huyện Tiền Hải', 667, 1, ''),
(674, 'Huyện Vũ Thư', 667, 1, ''),
(675, 'Thành phố Thái Bình', 667, 1, ''),
(676, 'Thái Nguyên', 0, 1, ''),
(677, 'Huyện Đại Từ', 676, 1, ''),
(678, 'Huyện Định Hóa', 676, 1, ''),
(679, 'Huyện Đồng Hỷ', 676, 1, ''),
(680, 'Huyện Phổ Yên', 676, 1, ''),
(681, 'Huyện Phú Bình', 676, 1, ''),
(682, 'Huyện Phú Lương', 676, 1, ''),
(683, 'Huyện Võ Nhai', 676, 1, ''),
(684, 'Thành phố Thái Nguyên', 676, 1, ''),
(685, 'Thị xã Sông Công', 676, 1, ''),
(686, 'Thanh Hóa', 0, 1, ''),
(687, 'Huyện Bá Thước', 686, 1, ''),
(688, 'Huyện Cẩm Thủy', 686, 1, ''),
(689, 'Huyện Đông Sơn', 686, 1, ''),
(690, 'Huyện Hà Trung', 686, 1, ''),
(691, 'Huyện Hậu Lộc', 686, 1, ''),
(692, 'Huyện Hoằng Hóa', 686, 1, ''),
(693, 'Huyện Lang Chánh', 686, 1, ''),
(694, 'Huyện Mường Lát', 686, 1, ''),
(695, 'Huyện Nga Sơn', 686, 1, ''),
(696, 'Huyện Ngọc Lặc', 686, 1, ''),
(697, 'Huyện Như Thanh', 686, 1, ''),
(698, 'Huyện Như Xuân', 686, 1, ''),
(699, 'Huyện Nông Cống', 686, 1, ''),
(700, 'Huyện Quan Hóa', 686, 1, ''),
(701, 'Huyện Quan Sơn', 686, 1, ''),
(702, 'Huyện Quảng Xương', 686, 1, ''),
(703, 'Huyện Thạch Thành', 686, 1, ''),
(704, 'Huyện Thiệu Hóa', 686, 1, ''),
(705, 'Huyện Thọ Xuân', 686, 1, ''),
(706, 'Huyện Thường Xuân', 686, 1, ''),
(707, 'Huyện Tĩnh Gia', 686, 1, ''),
(708, 'Huyện Triệu Sơn', 686, 1, ''),
(709, 'Huyện Vĩnh Lộc', 686, 1, ''),
(710, 'Huyện Yên Định', 686, 1, ''),
(711, 'Thành phố Thanh Hóa', 686, 1, ''),
(712, 'Thị xã Bỉm Sơn', 686, 1, ''),
(713, 'Thị xã Sầm Sơn', 686, 1, ''),
(714, 'Thừa Thiên Huế', 0, 1, ''),
(715, 'Huyện A Lưới', 714, 1, ''),
(716, 'Huyện Nam Đông', 714, 1, ''),
(717, 'Huyện Phong Điền', 714, 1, ''),
(718, 'Huyện Phú Lộc', 714, 1, ''),
(719, 'Huyện Phú Vang', 714, 1, ''),
(720, 'Huyện Quảng Điền', 714, 1, ''),
(721, 'Thành phố Huế', 714, 1, ''),
(722, 'Thị xã Hương Thủy', 714, 1, ''),
(723, 'Thị xã Hương Trà', 714, 1, ''),
(724, 'Tiền Giang', 0, 1, ''),
(725, 'Huyện Cái Bè', 724, 1, ''),
(726, 'Huyện Cai Lậy', 724, 1, ''),
(727, 'Huyện Châu Thành', 724, 1, ''),
(728, 'Huyện Chợ Gạo', 724, 1, ''),
(729, 'Huyện Gò Công Đông', 724, 1, ''),
(730, 'Huyện Gò Công Tây', 724, 1, ''),
(731, 'Huyện Tân Phú Đông', 724, 1, ''),
(732, 'Huyện Tân Phước', 724, 1, ''),
(733, 'Thành phố Mỹ Tho', 724, 1, ''),
(734, 'Thị xã Cai Lậy', 724, 1, ''),
(735, 'Thị xã Gò Công', 724, 1, ''),
(736, 'Trà Vinh', 0, 1, ''),
(737, 'Huyện Càng Long', 736, 1, ''),
(738, 'Huyện Cầu Kè', 736, 1, ''),
(739, 'Huyện Cầu Ngang', 736, 1, ''),
(740, 'Huyện Châu Thành', 736, 1, ''),
(741, 'Huyện Duyên Hải', 736, 1, ''),
(742, 'Huyện Tiểu Cần', 736, 1, ''),
(743, 'Huyện Trà Cú', 736, 1, ''),
(744, 'Thành phố Trà Vinh', 736, 1, ''),
(745, 'Thị xã Duyên Hải', 736, 1, ''),
(746, 'Tuyên Quang', 0, 1, ''),
(747, 'Huyện Chiêm Hóa', 746, 1, ''),
(748, 'Huyện Hàm Yên', 746, 1, ''),
(749, 'Huyện Lâm Bình', 746, 1, ''),
(750, 'Huyện Na Hang', 746, 1, ''),
(751, 'Huyện Sơn Dương', 746, 1, ''),
(752, 'Huyện Yên Sơn', 746, 1, ''),
(753, 'Thành phố Tuyên Quang', 746, 1, ''),
(754, 'Vĩnh Long', 0, 1, ''),
(755, 'Huyện Bình Minh', 754, 1, ''),
(756, 'Huyện Bình Tân', 754, 1, ''),
(757, 'Huyện Long Hồ', 754, 1, ''),
(758, 'Huyện Mang Thít', 754, 1, ''),
(759, 'Huyện Tam Bình', 754, 1, ''),
(760, 'Huyện Trà Ôn', 754, 1, ''),
(761, 'Huyện Vũng Liêm', 754, 1, ''),
(762, 'Thành phố Vĩnh Long', 754, 1, ''),
(763, 'Vĩnh Phúc', 0, 1, ''),
(764, 'Huyện Bình Xuyên', 763, 1, ''),
(765, 'Huyện Lập Thạch', 763, 1, ''),
(766, 'Huyện Sông Lô', 763, 1, ''),
(767, 'Huyện Tam Đảo', 763, 1, ''),
(768, 'Huyện Tam Dương', 763, 1, ''),
(769, 'Huyện Vĩnh Tường', 763, 1, ''),
(770, 'Huyện Yên Lạc', 763, 1, ''),
(771, 'Thành phố Vĩnh Yên', 763, 1, ''),
(772, 'Thị xã Phúc Yên', 763, 1, ''),
(773, 'Yên Bái', 0, 1, ''),
(774, 'Huyện Lục Yên', 773, 1, ''),
(775, 'Huyện Mù Căng Chải', 773, 1, ''),
(776, 'Huyện Trạm Tấu', 773, 1, ''),
(777, 'Huyện Trấn Yên', 773, 1, ''),
(778, 'Huyện Văn Chấn', 773, 1, ''),
(779, 'Huyện Văn Yên', 773, 1, ''),
(780, 'Huyện Yên Bình', 773, 1, ''),
(781, 'Thành phố Yên Bái', 773, 1, ''),
(782, 'Thị xã Nghĩa Lộ', 773, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_menu`
--

DROP TABLE IF EXISTS `lap1_menu`;
CREATE TABLE IF NOT EXISTS `lap1_menu` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Link` text NOT NULL,
  `ParentsId` varchar(50) NOT NULL,
  `Icon` text DEFAULT NULL,
  `Images` longtext DEFAULT NULL,
  `GroupsId` varchar(50) NOT NULL,
  `STT` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_menu`
--

INSERT INTO `lap1_menu` (`Id`, `Name`, `Link`, `ParentsId`, `Icon`, `Images`, `GroupsId`, `STT`) VALUES
('73fc4183-7546-43d8-9eb1-b6140870afbe', 'HOme', '', '', '', '', 'MainMenu', 0),
('0043b3c3-decb-4e49-be79-4113aa5a027f', 'Liên Hệ', '/', '', '', '', 'MainMenu', 2),
('054bc8a2-e50f-448d-bc4c-6e71f7588fa6', 'Giới Thiệu', '/', '', '', '', 'MainMenu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_news`
--

DROP TABLE IF EXISTS `lap1_news`;
CREATE TABLE IF NOT EXISTS `lap1_news` (
  `Id` varchar(50) NOT NULL DEFAULT '0',
  `Name` text NOT NULL,
  `Des` text DEFAULT NULL,
  `Keyword` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `DanhMucId` varchar(50) NOT NULL,
  `Alias` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Summary` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `UrlImages` text DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `Views` int(11) DEFAULT 0,
  `isShow` tinyint(4) DEFAULT 0,
  `STT` int(11) DEFAULT 0,
  `Lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_news_duan`
--

DROP TABLE IF EXISTS `lap1_news_duan`;
CREATE TABLE IF NOT EXISTS `lap1_news_duan` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Images` text NOT NULL,
  `Alias` text NOT NULL,
  `Title` text DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Keyword` text DEFAULT NULL,
  `Sumary` text DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `Tinh` int(11) DEFAULT NULL,
  `Huyen` int(11) DEFAULT NULL,
  `Xa` int(11) DEFAULT NULL,
  `DiaChi` text DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Alias` (`Alias`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_news_duan`
--

INSERT INTO `lap1_news_duan` (`Id`, `Name`, `Images`, `Alias`, `Title`, `Des`, `Keyword`, `Sumary`, `Content`, `Tinh`, `Huyen`, `Xa`, `DiaChi`) VALUES
('1', 'asdas', '', '01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b56cc5a9-9f91-46f9-9354-61345edc38e7', 'asd asdas dasdas', '', '03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('210ba2b5-acb5-47f4-9cd6-3f7f24b8d167', 'asdas dasd', '', '02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b20245f8-3995-492f-ac89-76f4dd029665', 's asdasdasdasdas a as das das', '', 's-asdasdasdasdas-a-as-das-das', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2d4e825b-579b-40a5-8d82-fbcbd9c8fedd', 'as a sdasd as das asdas dasds asdasdasas das dad as', '/public/userfiles/admin/images/2012081710.jpg', 'as-a-sdasd-as-d', 'fsdfasd', 'sdfsdasdasdasd', 'sdfsdasdas asdasd', 'ngẳn', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2009202042.jpg&quot; style=&quot;height:410px; width:660px&quot; /&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2012081710.jpg&quot; style=&quot;height:600px; width:863px&quot; /&gt;as as dasdasasdasdas&lt;/p&gt;\r\n\r\n&lt;p&gt;d&lt;/p&gt;\r\n\r\n&lt;p&gt;as&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;as asdas das&lt;/p&gt;\r\n\r\n&lt;p&gt;sd&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;asdas&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2009202042.jpg&quot; style=&quot;height:410px; width:660px&quot; /&gt;&lt;/p&gt;', 1, 4, 0, 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_options`
--

DROP TABLE IF EXISTS `lap1_options`;
CREATE TABLE IF NOT EXISTS `lap1_options` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Val` text NOT NULL,
  `GroupsId` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Val` (`Val`,`GroupsId`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_pages`
--

DROP TABLE IF EXISTS `lap1_pages`;
CREATE TABLE IF NOT EXISTS `lap1_pages` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Images` text NOT NULL,
  `Content` longtext NOT NULL,
  `Des` text NOT NULL,
  `Keyword` text NOT NULL,
  `Title` text NOT NULL,
  `Alias` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_pages`
--

INSERT INTO `lap1_pages` (`Id`, `Name`, `Images`, `Content`, `Des`, `Keyword`, `Title`, `Alias`) VALUES
('1105cf0e39b7545e9d42bef90dc05624', 'Giới Thiệu', '/public/userfiles/admin/images/2012081710.jpg', '<h1>Giới thi&ecirc;̣u v&ecirc;̀ shop Thời Trang Ciao.</h1>\r\n\r\n<h2>Đ&ocirc;i lời giới thi&ecirc;̣u v&ecirc;̀ shop:</h2>\r\n\r\n<p>Shop Thời Trang Ciao chúng t&ocirc;i kh&ocirc;ng đơn thu&acirc;̀n là cái đẹp thời trang, chúng t&ocirc;i khao khát ki&ecirc;́n tạo những giá trị xã h&ocirc;̣i nh&acirc;n văn, trở thành m&ocirc;̣t l&ocirc;́i s&ocirc;́ng đ&ecirc;̉ đ&ocirc;̀ng hành cùng phụ nữ tr&ecirc;n hành trình th&acirc;́u cảm vẻ đẹp của chính mình.</p>\r\n\r\n<p>Shop Thời Trang Ciao là k&ecirc;nh mua sắm online uy tín hàng đ&acirc;̀u, cùng với đ&ocirc;̣i ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghi&ecirc;̣p, chúng t&ocirc;i cam k&ecirc;́t đem những sản ph&acirc;̉m t&ocirc;́t nh&acirc;́t, với giá cả phải chăng, uy tín và ch&acirc;́t lượng với dịch vụ t&ocirc;́t nh&acirc;́t đ&ecirc;́n với mọi người.</p>\r\n\r\n<h2>Mục ti&ecirc;u của chúng t&ocirc;i.</h2>\r\n\r\n<p>Shop thời trang Ciao &ndash; Ch&acirc;́t Lượng &ndash; Uy Tín &ndash; Chuy&ecirc;n nghi&ecirc;̣p</p>\r\n\r\n<ul>\r\n	<li>Ti&ecirc;́p tục trở thành shop bán lẻ hàng đ&acirc;̀u.</li>\r\n	<li>Mở r&ocirc;̣ng phạm vi bán hàng ra toàn qu&ocirc;́c.</li>\r\n	<li>Mang đ&ecirc;́n cho khách hàng sự y&ecirc;n t&acirc;m và hài lòng khi mua sắm tại nhà.</li>\r\n	<li>Kh&ocirc;ng ngừng t&igrave;m kiếm v&agrave; cập nhật c&aacute;c mẫu quần &aacute;o, c&aacute;c hot trend tr&ecirc;n thị trường để đ&aacute;p ứng nhu cầu của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Nơi cung c&acirc;́p th&ocirc;ng tin và tư v&acirc;́n sản ph&acirc;̉m t&ocirc;́t nh&acirc;́t cho khách hàng.</li>\r\n	<li>Đ&ocirc;́i tác ti&ecirc;̀m năng và uy tín của các nhà cung c&acirc;́p.</li>\r\n</ul>\r\n\r\n<h2>Cơ sở v&acirc;̣t ch&acirc;́t.</h2>\r\n\r\n<ul>\r\n	<li>Đội ngũ nh&acirc;n sự chuy&ecirc;n nghiệp, tận t&igrave;nh v&agrave; trung thực</li>\r\n	<li>Bộ phận Tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Bộ phận Nhận diện thương hiệu.</li>\r\n	<li>Bộ phận Video v&agrave; h&igrave;nh ảnh</li>\r\n	<li>Bộ phận Giao nhận</li>\r\n	<li>C&aacute;c bộ phận kh&aacute;c: H&agrave;nh ch&iacute;nh, Kế to&aacute;n &hellip;</li>\r\n	<li>Cơ sở vật chất&nbsp; đầy đủ v&agrave; hiện đại</li>\r\n	<li>Kho lưu giữ h&agrave;ng h&oacute;a, đặt ngay tại trung t&acirc;m th&agrave;nh phố.</li>\r\n	<li>Xe vận chuyển h&agrave;ng h&oacute;a v&agrave; sắp xếp h&agrave;ng h&oacute;a</li>\r\n</ul>\r\n\r\n<h2>Hình thức bán hàng.</h2>\r\n\r\n<ul>\r\n	<li>Mọi sản phẩm đều được b&aacute;n qua k&ecirc;nh Online.</li>\r\n	<li>Đặt h&agrave;ng trực tuyến tr&ecirc;n&nbsp;<a href=\"https://www.facebook.com/VayXinh.ReDep.ThoiTrangCiao/\" rel=\"noreferrer noopener\" target=\"_blank\">Fanpage Facebook của Shop chúng t&ocirc;i</a>.</li>\r\n	<li>Đưa sản phẩm l&ecirc;n website:&nbsp;<a href=\"https://thoitrangciao.com/\">Trang chủ &ndash; thoitrangciao.com</a>.</li>\r\n	<li>H&agrave;ng th&aacute;ng ph&aacute;t h&agrave;nh 500 m&atilde; giảm gi&aacute; tặng k&egrave;m khi kh&aacute;ch h&agrave;ng mua h&agrave;ng tại shop.</li>\r\n	<li>Hai th&aacute;ng ph&aacute;t h&agrave;nh 100 qu&agrave; tặng d&agrave;nh cho kh&aacute;ch h&agrave;ng th&acirc;n thiết.</li>\r\n</ul>\r\n\r\n<h2>Sản ph&acirc;̉m kinh doanh.</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i chuy&ecirc;n kinh doanh thời trang nữ dành cho mọi lứa tu&ocirc;̉i, sản phẩm chủ yếu l&agrave;&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/ao/\" rel=\"noreferrer noopener\" target=\"_blank\">&Aacute;o Thời Trang Nữ</a>,&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/chan-vay/\" rel=\"noreferrer noopener\" target=\"_blank\">Ch&acirc;n V&aacute;y Nữ</a>,&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/dam/\" rel=\"noreferrer noopener\" target=\"_blank\">Đầm Nữ Đẹp</a>.</p>\r\n\r\n<p>Những sản phẩm tại Thời Trang Ciao được ch&iacute;nh chủ Shop t&igrave;m kiếm tuyển chọn mẫu m&atilde; đa dạng phong ph&uacute; theo xu hướng thời trang &ldquo;HOT&rdquo; nhất tr&ecirc;n thị trường.&nbsp;</p>\r\n\r\n<p>C&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i được lựa chọn vải v&agrave; đặt may tại Việt Nam với ti&ecirc;u ch&iacute; &ldquo;Kh&ocirc;ng qua trung gian &ndash; Gi&aacute; cả hợp l&yacute; &ndash; Chất lượng đảm bảo&rdquo;&nbsp;</p>\r\n\r\n<h2>Hành trình phát tri&ecirc;̉n Thời Trang Ciao.</h2>\r\n\r\n<p>Chúng t&ocirc;i ra đời tr&ecirc;n phương di&ecirc;̣n lắng nghe mong ước của những người phụ nữ, dựa tr&ecirc;n thực t&ecirc;́ nhi&ecirc;̀u người mong mu&ocirc;́n được mặc đẹp hơn, khoác l&ecirc;n người những b&ocirc;̣ cánh làm t&ocirc;n l&ecirc;n vẻ đẹp của bản th&acirc;n với m&ocirc;̣t mức giá phù hợp nh&acirc;́t.</p>\r\n\r\n<p>T&acirc;́t cả những sản ph&acirc;̉m của chúng t&ocirc;i được nh&acirc;̣p v&ecirc;̀ tr&ecirc;n ti&ecirc;u chí b&ecirc;̀n rẻ đẹp, c&ocirc;́ gắng t&ocirc;́t nh&acirc;́t đ&ecirc;̉ làm hài lòng mọi người, tr&ecirc;n phương di&ecirc;̣n g&acirc;̀n gũi hơn nhưng v&acirc;̃n giữ nguy&ecirc;n vẻ thanh lịch, t&ocirc;́i giản và sang trọng.</p>\r\n\r\n<p>Chi&ecirc;́n lực phát tri&ecirc;̉n của thời trang Ciao chúng t&ocirc;i là lu&ocirc;n lu&ocirc;n đ&ocirc;̉i mới, c&ocirc;́ gắng tìm tòi những cách thức phục vụ t&ocirc;́t nh&acirc;́t cho nhu c&acirc;̀u làm đẹp chính đáng của mọi người.</p>\r\n\r\n<h2>Chúng t&ocirc;i cam k&ecirc;́t.</h2>\r\n\r\n<ul>\r\n	<li>Giá cả phù hợp, tư v&acirc;́n nhi&ecirc;̣t tình.</li>\r\n	<li>Giao hàng nhanh chóng, mi&ecirc;̃n phí tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n	<li>H&acirc;̣u mãi chu đáo.</li>\r\n	<li>Nhi&ecirc;̀u chương trình khuy&ecirc;́n mãi h&acirc;́p d&acirc;̃n.</li>\r\n</ul>\r\n', 'asdas a', 'asds das das', 'ass das', 'gioi-thieu'),
('5e536ad7-007e-4bbe-98ee-5c4039dca653', 'Liên Hệ', '/public/userfiles/admin/images/2012081710.jpg', '<p><strong>3.&nbsp;Gửi email</strong><strong>&nbsp;theo&nbsp;</strong><a href=\"https://help.shopee.vn/vn/s/contactusform\" target=\"_blank\"><strong>hướng dẫn</strong></a><br />\r\n<br />\r\n<strong>4. Gọi điện thoại:&nbsp;</strong><strong>19001221</strong><strong>&nbsp;</strong>(cước ph&iacute; l&agrave; 1.000đ / ph&uacute;t)<br />\r\n<br />\r\n<strong>Lưu &yacute;:</strong>&nbsp;Thời gian nhận được kết quả xử l&yacute;<br />\r\n- Ngay lập tức: d&agrave;nh cho những y&ecirc;u cầu về tư vấn v&agrave; giải đ&aacute;p th&ocirc;ng tin<br />\r\n- Từ 1-2 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu hỗ trợ cần c&aacute;c bộ phận li&ecirc;n quan xử l&yacute;<br />\r\n- Từ 3-5 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu khiếu nại</p>\r\n', 'asd', 'asdasdas', 'asd', 'lien-he');

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
('16a2b0020b29f36c96878e339c102d78', 'Xem', 'Module Quản Lý Tài Khoản', 0),
('354db8167472d6a6ee16913dd12a412b', 'Xóa', 'Module Quản Lý Tài Khoản', 0),
('d7f32ba04bc9ac241757c81661775233', 'Sửa', 'Module Quản Lý Tài Khoản', 0),
('c9eff42a820d3dc2e4ad02501c6564da', 'Thêm', 'Module Quản Lý Tài Khoản', 0),
('1105cf0e39b7545e9d42bef90dc05624', 'Xem', 'Module Quản Lý Quyền', 0),
('57fb0a4d2b7be7c61994e9ed8472884e', 'Xóa', 'Module Quản Lý Quyền', 0),
('539ea50343b23cc5333b23658bf047ee', 'Sửa', 'Module Quản Lý Quyền', 0),
('69ca69493b57952dcf5cbf8f19e595d7', 'Thêm', 'Module Quản Lý Quyền', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham`
--

DROP TABLE IF EXISTS `lap1_sanpham`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham` (
  `Id` varchar(50) NOT NULL DEFAULT '0',
  `Name` text NOT NULL,
  `Des` text DEFAULT NULL,
  `Keyword` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `DanhMucId` varchar(50) NOT NULL,
  `Alias` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Price` decimal(15,4) DEFAULT 0.0000,
  `oldPrice` decimal(15,4) DEFAULT 0.0000,
  `Summary` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `UrlImages` text DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `Number` int(11) DEFAULT 0,
  `Note` text DEFAULT NULL,
  `BuyTimes` int(11) DEFAULT 0,
  `Views` int(11) DEFAULT 0,
  `isShow` tinyint(4) DEFAULT 0,
  `STT` int(11) DEFAULT 0,
  `Lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_danhmuc`
--

DROP TABLE IF EXISTS `lap1_sanpham_danhmuc`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_danhmuc` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `keyword` text NOT NULL,
  `des` text NOT NULL,
  `title` text NOT NULL,
  `Path` text DEFAULT NULL,
  `Link` text DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `parentsId` varchar(50) DEFAULT NULL,
  `Banner` text DEFAULT NULL,
  `IsPublic` int(11) DEFAULT NULL,
  `STT` int(11) DEFAULT NULL,
  `Lang` varchar(4) NOT NULL DEFAULT 'vi',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_danhmuc`
--

INSERT INTO `lap1_sanpham_danhmuc` (`Id`, `Name`, `keyword`, `des`, `title`, `Path`, `Link`, `Note`, `parentsId`, `Banner`, `IsPublic`, `STT`, `Lang`) VALUES
('44bc0a10-295c-46c5-92fd-a789d76d8808', 'Áo aaa', 'asd', 'asdas', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi'),
('f98ee1f2-a0df-4998-8c07-acb1e57ff1c1', 'Quần', 'sa', 'dasdas', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options`
--

DROP TABLE IF EXISTS `lap1_sanpham_options`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_options` (
  `Id` varchar(50) NOT NULL,
  `Code` varchar(200) NOT NULL,
  `Name` text NOT NULL,
  `Des` text NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_options`
--

INSERT INTO `lap1_sanpham_options` (`Id`, `Code`, `Name`, `Des`) VALUES
('1', '9740b6128e99865cbecf69577ad04dcace43cbb9', 'Size Xl Màu Đỏ', 'Size Xl Màu Đỏ');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options_soluong`
--

DROP TABLE IF EXISTS `lap1_sanpham_options_soluong`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_options_soluong` (
  `Id` varchar(50) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `Option1` varchar(50) NOT NULL,
  `Option2` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(15,0) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `IdSanPham` (`IdSanPham`,`Option1`,`Option2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options_type`
--

DROP TABLE IF EXISTS `lap1_sanpham_options_type`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_options_type` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Parents` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_options_type`
--

INSERT INTO `lap1_sanpham_options_type` (`Id`, `Name`, `Code`, `Parents`) VALUES
('Size', 'Kích Thước', 'Size', ''),
('MauSac', 'Màu Sắc', 'MauSac', '');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_thuoctinh`
--

DROP TABLE IF EXISTS `lap1_sanpham_thuoctinh`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_thuoctinh` (
  `Id` varchar(50) NOT NULL,
  `OptionsTypeId` varchar(50) NOT NULL,
  `Options` int(11) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `GhiChu` text NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `OptionsTypeId` (`OptionsTypeId`,`IdSanPham`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_thuoctinh_chitiet`
--

DROP TABLE IF EXISTS `lap1_sanpham_thuoctinh_chitiet`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_thuoctinh_chitiet` (
  `Id` varchar(50) NOT NULL,
  `IdThuocTinh` varchar(50) NOT NULL,
  `Name` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_slider`
--

DROP TABLE IF EXISTS `lap1_slider`;
CREATE TABLE IF NOT EXISTS `lap1_slider` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Content` longtext NOT NULL,
  `Images` text NOT NULL,
  `GroupsId` varchar(50) NOT NULL,
  `IsPublic` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_slider`
--

INSERT INTO `lap1_slider` (`Id`, `Name`, `Content`, `Images`, `GroupsId`, `IsPublic`) VALUES
('1', 'asd asdas', '&lt;h1&gt;E-SHOPPER&lt;/h1&gt;\r\n\r\n&lt;h2&gt;Free E-Commerce Template&lt;/h2&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a class=&quot;btn  btn-primary&quot; href=&quot;/lien-he.html&quot;&gt;Chi Tiết&lt;/a&gt;&lt;/p&gt;', '/public/userfiles/admin/images/2009202042.jpg', 'HomeSlide', 1),
('3630fa9f-b718-4fb4-b831-9d1ba4955cda', 'asda sdasdas', '<p>asd asdasdasdas</p>\r\n', '/public/userfiles/admin/images/2012081710.jpg', 'HomeSlide', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_slider_img`
--

DROP TABLE IF EXISTS `lap1_slider_img`;
CREATE TABLE IF NOT EXISTS `lap1_slider_img` (
  `Id` int(50) NOT NULL,
  `Images` text NOT NULL,
  `SliderId` varchar(50) NOT NULL,
  `ClassImgase` text NOT NULL,
  `Note` longtext NOT NULL
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
('83253ada-757d-41c7-90f7-9dc002ca0fdf', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin'),
('25b4a53e-a868-482f-9451-c96c05c67ace', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QuanLy'),
('f8382573-cc6f-478e-9ccf-21722dce0e6b', 'a585dec5-9ded-47f4-bd78-33055d8c30de', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
