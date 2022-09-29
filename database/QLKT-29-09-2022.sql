-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 10:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakcoerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `lap1_benhnhan`
--

CREATE TABLE `lap1_benhnhan` (
  `Id` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gioitinh` varchar(100) NOT NULL,
  `Ngaysinh` varchar(50) NOT NULL,
  `CMND` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `TinhThanh` varchar(50) NOT NULL,
  `QuanHuyen` varchar(50) NOT NULL,
  `PhuongXa` varchar(50) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_benhnhan`
--

INSERT INTO `lap1_benhnhan` (`Id`, `Name`, `Gioitinh`, `Ngaysinh`, `CMND`, `Address`, `TinhThanh`, `QuanHuyen`, `PhuongXa`, `Phone`, `CreateRecord`, `UpdateRecord`, `isDelete`) VALUES
('BN2209290001', 'Phùng Văn Nghị', '1', '2001-08-08', '298387732', 'Công viên Phần Mềm Quang Trung', '1', '', '', '0852147963', '2022-09-29 14:31:23', '2022-09-29 14:31:23', 0),
('BN2209290002', 'Châu Thị A Lài', '2', '1970-01-01', '264653789', 'Công viên Phần Mềm Quang Trung', '', '', '', '0887644467', '2022-09-29 14:37:16', '2022-09-29 14:37:16', 0),
('BN2209290003', 'Châu Thị A Lài', '2', '2022-09-29', '264653789', 'Công viên Phần Mềm Quang Trung', '', '', '', '0887644467', '2022-09-29 14:46:13', '2022-09-29 14:46:13', 0),
('BN2209290004', 'Châu Thị A Lài', '2', '1999-01-01', '264653789', 'Công viên Phần Mềm Quang Trung', '', '', '', '0887644467', '2022-09-29 14:48:49', '2022-09-29 14:48:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_lang`
--

CREATE TABLE `lap1_lang` (
  `Id` varchar(10) NOT NULL,
  `Name` text NOT NULL,
  `Des` text NOT NULL,
  `Code` varchar(50) NOT NULL
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

CREATE TABLE `lap1_locations` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `ParentsId` int(11) NOT NULL,
  `IsPublic` int(11) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `lap1_menu` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Link` text NOT NULL,
  `ParentsId` varchar(50) NOT NULL,
  `Icon` text DEFAULT NULL,
  `Images` longtext DEFAULT NULL,
  `GroupsId` varchar(50) NOT NULL,
  `STT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_menu`
--

INSERT INTO `lap1_menu` (`Id`, `Name`, `Link`, `ParentsId`, `Icon`, `Images`, `GroupsId`, `STT`) VALUES
('73fc4183-7546-43d8-9eb1-b6140870afbe', 'Trang Chủ', '/', '', '', '', 'MainMenu', 0),
('0043b3c3-decb-4e49-be79-4113aa5a027f', 'Liên Hệ', '/lien-he.html', '', '', '', 'MainMenu', 2),
('054bc8a2-e50f-448d-bc4c-6e71f7588fa6', 'Giới Thiệu', '/gioi-thieu.html', '', '', '', 'MainMenu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_news`
--

CREATE TABLE `lap1_news` (
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
  `Lang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_news_duan`
--

CREATE TABLE `lap1_news_duan` (
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
  `DiaChi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_news_duan`
--

INSERT INTO `lap1_news_duan` (`Id`, `Name`, `Images`, `Alias`, `Title`, `Des`, `Keyword`, `Sumary`, `Content`, `Tinh`, `Huyen`, `Xa`, `DiaChi`) VALUES
('1', 'asdas', '', '01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b56cc5a9-9f91-46f9-9354-61345edc38e7', 'asd asdas dasdas', '', '03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('210ba2b5-acb5-47f4-9cd6-3f7f24b8d167', 'asdas dasd', '', '02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b20245f8-3995-492f-ac89-76f4dd029665', 's asdasdasdasdas a as das das', '', 's-asdasdasdasdas-a-as-das-das', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2d4e825b-579b-40a5-8d82-fbcbd9c8fedd', 'as a sdasd as das asdas dasds asdasdasas das dad as', '/public/userfiles/admin/images/2012081710.jpg', 'as-a-sdasd-as-d', 'fsdfasd', 'sdfsdasdasdasd', 'sdfsdasdas asdasd', 'ngẳn', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2009202042.jpg&quot; style=&quot;height:410px; width:660px&quot; /&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2012081710.jpg&quot; style=&quot;height:600px; width:863px&quot; /&gt;as as dasdasasdasdas&lt;/p&gt;\r\n\r\n&lt;p&gt;d&lt;/p&gt;\r\n\r\n&lt;p&gt;as&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;as asdas das&lt;/p&gt;\r\n\r\n&lt;p&gt;sd&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;asdas&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/2009202042.jpg&quot; style=&quot;height:410px; width:660px&quot; /&gt;&lt;/p&gt;', 1, 4, 0, 'asdasdas'),
('4970ad8b-ac76-45de-a772-7c8167e0b135', 'Hello', '', 'hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_nhanvien_lichlamviec`
--

CREATE TABLE `lap1_nhanvien_lichlamviec` (
  `Id` varchar(50) NOT NULL,
  `Ngay` date NOT NULL,
  `IdNhanVien` varchar(50) NOT NULL,
  `CaLamViec` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_nhanvien_lichlamviec`
--

INSERT INTO `lap1_nhanvien_lichlamviec` (`Id`, `Ngay`, `IdNhanVien`, `CaLamViec`) VALUES
('30d67512-f14a-4dc9-b1f9-bbe5e49446fc', '2022-01-03', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('94103a63-51b1-468a-ba94-d58e2dea3b08', '2022-01-04', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('7ef4552a-9f14-4964-9f02-92837ad5ef03', '2022-01-05', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('0f69e950-4d55-4fe6-9096-ea7796a4d91e', '2022-01-06', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('57fd9332-ad62-4061-8cd5-617c053e1e1b', '2022-01-07', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('bab00566-4fe7-47fa-b63c-fdd5cf7fe29d', '2022-01-10', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('8cfc7369-f35b-47c1-8f24-1a7fff19cbcb', '2022-01-11', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('85bec121-48fb-4b2f-b4ed-b802ef476f36', '2022-01-12', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('155e2626-76cf-449e-8957-1c03adac6cb2', '2022-01-13', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('1a8f5e38-e118-483d-96bb-043d51ab9db0', '2022-01-14', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('77ab36c5-8237-4ae6-8c79-2bad3280f0e7', '2022-01-17', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('ea6a5032-e11c-4d9f-95af-4cce33f55dd5', '2022-01-18', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('2fdcf3ce-a020-4154-83e2-302b1748e8ad', '2022-01-19', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('f22c31fc-2e73-4b2d-bcbc-792bb802c8e5', '2022-01-20', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('cf9a5849-d0ad-49bc-a474-b6846ee99dd3', '2022-01-21', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('f27838d6-2266-4364-ab61-b54c0201a1cc', '2022-01-24', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('58111e64-0b9d-4c71-ac52-90b7eaa1eaa8', '2022-01-25', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('db72434a-6be6-4a28-90ff-bdaf3b1f37a1', '2022-01-26', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('a5e8ba06-e5ef-4af7-a085-466dd5e634bd', '2022-01-27', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('65ad6502-a07a-4a74-b726-505d482659ce', '2022-01-28', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('36503b1e-e7a7-48f6-ac7e-092d7aee7cc0', '2022-01-31', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('3fd04b90-55ac-4baa-bc6b-c17cca5b2af2', '2022-01-03', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('4894a255-aa94-4c4e-a016-eed7af9aa630', '2022-01-02', '4ef540ca-44a9-4a06-88a3-da4da8212613', ''),
('cfbb88e6-b67d-4bf6-951e-eab78e16920e', '2022-01-01', '4ef540ca-44a9-4a06-88a3-da4da8212613', ''),
('050df661-d6dd-4220-b5c5-1cde8a02351e', '2022-01-03', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('c7a2d69f-f5b7-4eb5-9791-6cd9839b47c8', '2022-01-04', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', ''),
('2a9c6cb2-388d-4d91-b7ae-126842b7fe50', '2022-01-05', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', ''),
('198c3b94-1861-4116-99d1-4483c9fc29ea', '2022-01-06', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', ''),
('b4d4f501-1a8d-4e06-ac41-f633ee2cc67a', '2022-01-07', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', ''),
('03e6bc1d-1970-4ecc-8f7e-12b4229a7b08', '2022-01-08', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', ''),
('a3f596ff-e82a-4e57-bf40-c882dee4ab03', '2022-01-03', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'TTPMHC'),
('55838b15-6900-41f6-b373-90837aa2a078', '2022-01-04', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'TTPMHC'),
('fe014876-1069-4b7b-986b-06c93978205e', '2022-01-04', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('530bede5-1ca4-456c-8767-5bf505b7815e', '2022-01-05', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('9b6a6a08-9cca-4c4b-95c4-64e05474851f', '2022-01-06', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('5cdce899-582f-4978-ae1b-53b20cc43853', '2022-01-07', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('186bd1c9-a5eb-4be3-af92-1ef371415c35', '2022-01-10', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('c7261ab7-f7d3-432e-80eb-a9b70c788fa0', '2022-01-11', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('14f35aa5-24ea-46f8-887f-1051701ef987', '2022-01-12', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('55d08b42-c346-47f8-b671-14632eb4568c', '2022-01-13', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('ed6dbc5f-dbe2-42b4-8aac-58022db030b2', '2022-01-14', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('7ce812c1-56a1-4f17-bd4d-a5e688d9b8e9', '2022-01-17', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('2fa233cb-efc0-40e1-8dd7-8dfe3571f76e', '2022-01-18', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('cfc0877e-88f3-4fd4-997a-0de092fcbd38', '2022-01-19', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('e8f21f78-313b-4ace-9030-67709bf7a535', '2022-01-20', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('d7534dca-dfcf-47b3-b8db-3fac316c6c86', '2022-01-21', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('03971958-fa07-46b7-8b88-8b9607b7fd3e', '2022-01-24', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('deb11c6a-782c-4d4d-8a66-4d7027c16189', '2022-01-25', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('d0433e02-bbed-42cd-8a04-cdd3ed182fb6', '2022-01-26', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('49393088-53c9-490f-b7b3-e7d8150fa287', '2022-01-27', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('107d8d79-f8fe-4225-8928-98101f8778d9', '2022-01-28', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('0b76971c-a910-413c-90df-0fd74a0027af', '2022-01-31', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TTPMHC'),
('83c7f1d1-b2b0-4b4e-81b7-3e0c6fd6aa3d', '2022-01-01', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('308a1a8f-f3b4-4e6f-9f9a-4b2cf4774a43', '2022-01-02', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('e0c7bdce-01e8-491c-ba67-a34e0c22a44f', '2022-01-08', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('8739e19a-9413-4968-a0cd-1a944e26e5d2', '2022-01-09', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('975622c2-849d-4b6d-85d2-4918f8d2c25e', '2022-01-15', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('79112b86-93b1-4a75-a555-1ded291460ff', '2022-01-16', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('a2d177a0-73f8-4389-8d8a-c6e0f2c8b985', '2022-01-22', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('d5768ba5-2215-43ff-9b8c-4a901776ee2a', '2022-01-23', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('c4f053a8-694a-472a-b80f-7de5cd73e95a', '2022-01-29', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('ab83c24c-b9e9-4441-89ab-17a2dea6fa8e', '2022-01-30', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', ''),
('d22bc462-e5fb-411f-9a67-1f2a0b8a23c7', '2022-01-03', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('525f5137-de1e-4f2c-8786-14466cc3cadb', '2022-01-04', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('db60bb12-b719-407e-8107-e129eb1d3404', '2022-01-05', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('597409ba-2f72-40f8-b833-46a9b899f2ac', '2022-01-06', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('eb65eb13-576e-4486-9a74-18b65c52479f', '2022-01-07', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('bd3d12a5-6604-4542-9e71-42a0e4d7ffee', '2022-01-10', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('90498432-530b-4205-8a9c-d12f11bb0923', '2022-01-11', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('88345615-a04f-45c7-88bb-4334a2832435', '2022-01-12', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('e765d847-4211-429c-8d7a-d8cf5fb0c687', '2022-01-13', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('f284498f-e8d3-47f7-b5a0-6d75c661e653', '2022-01-14', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('881a2296-94f3-401d-9f6c-9e2539c9154b', '2022-01-17', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('1c79da24-7c30-4adc-af74-292afb7b600a', '2022-01-18', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('7d1fc14a-8f81-44c7-a78c-077c2dec45b7', '2022-01-19', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('ac819ec5-c46e-4afc-a0f1-be436859a776', '2022-01-20', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('a8c8a342-eeb2-48c5-8608-64b62d6f0503', '2022-01-21', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('39d8d012-2ef2-4374-9561-65f40f106475', '2022-01-24', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('09e111fd-524d-4fc7-8481-b89cd6621f08', '2022-01-25', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('0ce93ed8-3b70-4ac8-82d6-240e87e5f650', '2022-01-26', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('476ecde2-3772-4f65-80fe-37fe1ce1c412', '2022-01-27', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('ebec499c-a158-47ed-927a-2772872eda30', '2022-01-28', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('8e800899-c5dd-403f-a815-f97c70793a2d', '2022-01-31', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TTPMHC'),
('2b3f22f9-e6d9-44de-bc61-17145d88a973', '2022-01-01', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('98f9e3cf-9a49-42f0-ab8d-456eb0c58543', '2022-01-02', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('6b2aedf2-c3f4-4247-a422-9bda6581ec56', '2022-01-08', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('f44c8246-f5f0-437a-8f84-25a6be177d11', '2022-01-09', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('99ee51f9-4ff9-4fbe-bba9-8dc17131ab04', '2022-01-15', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('1e6ef0bb-91fe-42e1-bb2f-5e670eab3311', '2022-01-16', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('78897473-43ce-4aa2-ada1-088093d5f2e0', '2022-01-22', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('9016a6e9-bc2b-4cb5-9bb3-5477e601fdb7', '2022-01-23', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('d5f0b359-b20b-4a80-8d13-77ed589bbdba', '2022-01-29', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('a7811ed7-3377-40ba-a4da-b8967c2810d4', '2022-01-30', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', ''),
('61527b2e-14eb-4ebf-9cba-57b4aea5874c', '2022-01-01', '8617047a-b6e8-4971-8c73-7872c7c69ff5', ''),
('00b2cac0-a44f-412d-826a-266809cf84bf', '2022-01-02', '8617047a-b6e8-4971-8c73-7872c7c69ff5', ''),
('c7da68dd-2d6a-4cfb-947e-b223a56cd886', '2022-01-03', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'TTPMHC'),
('76c7b144-1518-4f63-8d58-f3072ee37eaf', '2022-01-04', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'TTPMHC'),
('ed1b7980-389e-4c13-822e-c044626dbbf5', '2022-01-05', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('f4a836ab-8821-4639-a682-d79541294429', '2022-01-06', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('215e01ac-f33f-49f2-9afe-5cac1c087ec5', '2022-01-10', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('8fcb7542-1146-4563-8a96-e39408b934dd', '2022-01-12', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('409a4fa0-21d9-486f-8ee7-37087de9bd6a', '2022-01-13', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('a21d0c1a-70d1-47aa-8102-4f81b438d527', '2022-01-17', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('74ef3502-30f4-45c9-b820-109fcc5d5455', '2022-01-19', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('2d71fbb8-af32-4ff1-a70e-869344264ec6', '2022-01-20', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('5c8b9c0d-4f90-40a3-9ad2-ddc55f6c6345', '2022-01-24', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('d5b66c66-322c-4d21-9d48-bc3b1cf9124e', '2022-01-26', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('5750885c-184d-4c70-9ac0-0b5c889c0fd1', '2022-01-27', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('da90c693-8399-4582-9c86-81ce6947279f', '2022-01-31', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TTPMHC'),
('96ff3b98-2f5e-4e58-ac85-135e24c2f9c2', '2022-05-02', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('92c05ee2-f929-477c-a8c2-7f5f6c692f0d', '2022-05-03', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('d5147271-3b00-430a-904a-bfed7715f7b3', '2022-05-04', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('47e5dfc8-f7ef-4673-b89f-2320d346a5de', '2022-05-05', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('427241e2-64ea-4ffd-ab60-a80153969f07', '2022-05-06', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('33ab0e18-91b0-4dbf-9f75-d1a532d47757', '2022-05-09', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('6dfbaa36-54f4-4b74-b3e4-42b361b1c904', '2022-05-10', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('0d1cb1ff-8fea-4b95-afec-99f254606299', '2022-05-11', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('157f569f-dfbc-498f-a683-2450ba20cc83', '2022-05-12', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('f4375352-4a46-40db-8dfd-05c5943db040', '2022-05-13', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('31e93a05-2731-46c0-b4d0-b4aa1ebbdde5', '2022-05-16', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('e30c2b51-5b83-42cd-b87a-dae9f639ab54', '2022-05-17', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('c969154a-a018-4fdf-88c5-a152a36cb234', '2022-05-18', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('c8fbf52b-3fcf-4ed3-b0f9-26c2ceb9d33a', '2022-05-19', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('a8235f54-7f0e-4224-8633-bb332751c4f5', '2022-05-20', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('ceea9572-82dc-4576-89d8-33fff0315a22', '2022-05-23', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('18d6fadb-fe2c-402b-bf86-06dc1bc4742f', '2022-05-24', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('51b92d4b-66d2-462e-afe8-9dc44c014120', '2022-05-25', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('8b33a597-9307-4242-a4e6-abcc02b60447', '2022-05-26', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('07cc0771-aff7-40cb-a563-3d05742db722', '2022-05-27', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('e925fc98-a4ff-4b0a-b047-075606964743', '2022-05-30', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('3934ed94-73a0-4b0c-bc4f-278d196d6862', '2022-05-31', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HC'),
('c562c340-72e7-47c0-9923-076880f46368', '2022-04-01', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('1be9c1fd-2567-446a-a61e-ad1db3544357', '2022-04-04', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('92e3856e-4170-4f23-b6e9-2e796a53ee33', '2022-04-05', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('07c44221-8eb6-46f2-99e3-0067783c63f3', '2022-04-06', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('c67aa9e5-05ea-41e3-b2ce-ed7813bebb54', '2022-04-07', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('10be1df1-8728-431b-8381-515897e63a77', '2022-04-08', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('e62d89e8-f221-46e9-812b-265f7337589e', '2022-04-11', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('13473ebf-690c-4507-b0b2-a380adf443f9', '2022-04-12', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('7e64ee7d-bb9c-464e-86ff-05379dbbff3c', '2022-04-13', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('f8bcff78-47c2-4a1b-81e1-3afacf05b4bf', '2022-04-14', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('857db522-c629-405e-ae90-233477189280', '2022-04-15', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('edff6ef9-7509-40dd-9a51-2fb8ad6bdca4', '2022-04-18', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('1bd2b72b-fa17-4f74-9ff7-90c2cbca67a1', '2022-04-19', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('c5e5e511-a62f-46e5-86d8-b8e7a602aeef', '2022-04-20', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('72d2b7ba-b4f8-4cf1-a6ad-979fd64e3fee', '2022-04-21', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('552100b6-989b-44cc-8e8e-07bd7dd9830e', '2022-04-22', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('1d414214-c2b4-45e6-8371-3e8e94d39994', '2022-04-25', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('229e9ba8-f0e3-4e23-8856-fa12696e8e14', '2022-04-26', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('0fa67348-57dd-44f1-8e93-3961b8f0a610', '2022-04-27', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('bb209c8f-e1da-4b32-8794-f499eda8a496', '2022-04-28', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('9787e914-9c0d-404a-b6ae-6fbae5a1fd8d', '2022-04-29', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('952f4116-fd84-4ed5-a7f8-997b75fed7a0', '2022-04-01', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('83fe359b-513a-4f3f-9a56-7bf4024818af', '2022-04-04', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('d9d6f2cf-19ae-40a6-a1a8-78b16bd5fa90', '2022-04-05', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('c16fbd52-5b5e-4ead-9e8d-45473cd8269a', '2022-04-06', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('b64266d2-df9b-44e8-8b47-31a4275586aa', '2022-04-07', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('5b1ddc14-fe51-46fd-a686-d50ead1ac666', '2022-04-08', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('fbef2da5-afac-4cb0-a091-599cca750c3f', '2022-04-11', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('120880f7-7175-4263-ae3e-a1dbe2b63938', '2022-04-12', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('36c00b43-4cf7-4c76-a291-73fdb1b1a99c', '2022-04-13', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('c8206720-b8a5-451c-83e3-40b314c2fe44', '2022-04-14', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('a9a24dd6-36e3-4aaf-9587-27483b8b57da', '2022-04-15', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('f73d4ea7-7baa-488e-a17f-2f15cbad49a3', '2022-04-18', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('a65cbee8-e8a3-421a-84c2-f2fc8e930fcc', '2022-04-19', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('8453f1b2-ac62-4559-aa84-401e4d2d4b13', '2022-04-20', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('5faa636e-1264-4e67-82d3-e3413d390952', '2022-04-21', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('e60b071a-6089-4582-bdcc-e7012648d5a2', '2022-04-22', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('51a3b013-fb44-4105-802f-a28bcf24e244', '2022-04-25', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('5b6fa18e-d2dc-4214-a1d1-a0c57c0e712d', '2022-04-26', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('eb27fe86-6bad-43fe-a2d1-4903af4735f7', '2022-04-27', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('98fe0ddd-43d2-4b51-a4ac-9fbcec0b7990', '2022-04-28', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('559e3698-bd84-4ae7-aceb-aa4b10c4bdaf', '2022-04-29', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TTPMHC'),
('7a883f9f-5c30-4452-b62b-5629b28606e8', '2022-06-01', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('f6fe3e13-23ef-440e-a049-a79c14c1891b', '2022-06-02', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('b32f69b0-d370-4f9e-ada2-ba36822a0a2a', '2022-06-03', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('3c81744b-16d5-4941-b037-8a06dbfa6e61', '2022-06-06', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('abd336a0-4e78-4a1a-b7a1-f90840db5344', '2022-06-07', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('bfcf4aca-6347-4f38-a6f2-7468f7c4c98f', '2022-06-08', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('300c4d58-9c89-4577-a735-7a5d28eba6c0', '2022-06-09', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('ca1e0320-2dc0-4455-892e-291b2d1c4cbe', '2022-06-10', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('3dfa3f40-435b-4371-8e4d-caaf542d708b', '2022-06-13', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('a1eacf28-aa14-4a8a-acf8-0d65ad2ce9f5', '2022-06-14', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('d2b48c30-571d-4e6c-af7c-4de06bd91f68', '2022-06-15', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('36ce5f6c-d1c6-4ee2-96d9-a3144c321696', '2022-06-16', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('cfa66978-0206-4876-bed6-ad76e9e17a3c', '2022-06-17', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('41bcb443-80e6-4cca-a143-8253b4d4482d', '2022-06-20', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('dfc7be29-4041-486d-9119-1f6ed7a62f92', '2022-06-21', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('d763ad75-fd92-4bc7-b5d2-22c27d772b1a', '2022-06-22', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('4c6cbe23-f851-4e2f-8e5b-c265bd95088e', '2022-06-23', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('96f20737-fe9d-4ed3-9883-b222cebec601', '2022-06-24', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('fbcac272-0881-48f0-acce-812d5f92c13f', '2022-06-27', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('3d26226d-2c87-48c2-97e7-0f83e6ea550a', '2022-06-28', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('b4317793-d6b4-4eed-98df-9f80fb52557d', '2022-06-29', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('2b3b04b5-6bb5-4835-a477-3da8024e9630', '2022-06-30', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TTPMHC'),
('704e0360-8fb4-406d-8282-2e9234feacd3', '2022-07-01', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('836e9ca8-7c9a-491a-9164-8930ff15213f', '2022-07-04', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('9fe28ab6-c27d-41d9-a202-b823ad835395', '2022-07-05', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('e67d2e5a-a4b8-440b-afd1-ec3078f9584d', '2022-07-06', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('f80a5e61-2331-4071-8f88-8707b2f4513d', '2022-07-07', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('ea7bf174-63de-4061-be16-8cb9a19e5750', '2022-07-08', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('272601ef-9e99-42a6-92a5-9c3a681a22ce', '2022-07-11', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('cb59b341-5f58-4946-80ec-18df50fb7030', '2022-07-12', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('c5e6ddbc-f31e-406d-83f4-0516ef98ddcb', '2022-07-13', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('207884f3-ae1e-4782-b3c3-fb17d303e205', '2022-07-14', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('5c8fb7a4-a4f2-4b71-907c-d150fed17f4b', '2022-07-15', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('e726faee-1935-4d94-897a-de1fa6354ae2', '2022-07-18', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('0f03f8ed-77dd-4887-8764-ca0aaa3d27b4', '2022-07-19', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('5f9ec3c2-40f4-4e9a-b3c4-57055a62a75a', '2022-07-20', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('f64b8752-2394-4107-b5d6-543e6740e5e7', '2022-07-21', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('4ccacaaa-64b6-4563-aef6-580f8c280b5c', '2022-07-22', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('4f2476dc-f7fa-4270-8dfe-7fc62106a6ec', '2022-07-25', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('40008378-5f8f-4901-916e-da7774b5053a', '2022-07-26', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('7776ae62-6c18-48a0-a4fe-700dfb38618b', '2022-07-27', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('3fe9f0f1-a772-4756-a3f5-fc4df908113b', '2022-07-28', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC'),
('b97929b0-021b-498c-9b06-89fb5ac5cc42', '2022-07-29', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TTPMHC');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_nhanvien_lichlamviec_calamviec`
--

CREATE TABLE `lap1_nhanvien_lichlamviec_calamviec` (
  `Id` varchar(50) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Des` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_nhanvien_lichlamviec_calamviec`
--

INSERT INTO `lap1_nhanvien_lichlamviec_calamviec` (`Id`, `Name`, `Code`, `Des`) VALUES
('d5c857af-735d-11ec-9f32-4ccc6ae31235', 'Ca Hành Chính Trung Tâm Phầm Mềm', 'TTPMHC', ''),
('d5c857af-735d-11ec-9f32-4ccc6ae31236', 'Ca Hành Chính', 'HC', '');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_options`
--

CREATE TABLE `lap1_options` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Val` text NOT NULL,
  `Des` longtext NOT NULL,
  `GroupsId` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_options`
--

INSERT INTO `lap1_options` (`Id`, `Name`, `Val`, `Des`, `GroupsId`) VALUES
('270e7062-96ef-43f9-907b-3e0bd942a0c8', 'Công Ty TNHH giải pháp Phần mềm Bách Khoa', 'Bak', 'Công Ty TNHH giải pháp Phần mềm Bách Khoa', 'congty'),
('0090ecfb-61ed-44db-a9be-aba245e8607a', 'Việt Nhật', 'VN', 'Việt Nhật', 'congty'),
('b9d289ff-1793-4e17-9336-82ce2486adca', 'RUBI', 'RUBI', 'RUBI', 'congty'),
('c55aea64-4de0-4d20-91aa-bf77dcc75254', 'TEDCOM', 'TEDCOM', 'TEDCOM\r\n', 'congty'),
('40269f40-faaf-420a-8c92-267c8e6a3d00', 'Chính Thức', 'ChinhThuc', 'Chính Thức', 'hopdong'),
('3ecd426f-3b33-407f-9b90-4fd8319f0312', 'Cộng Tác Viên', 'CTV', '', 'hopdong'),
('5717f736-e970-44db-9fc5-9420f9dec288', 'Nam', '1', '', 'gioitinh'),
('641c5021-4c3b-451f-83a1-47b4905be327', 'Nữ', '2', 'Nữ', 'gioitinh'),
('10df07d8-8bd0-4a1b-8f32-53b575f8c842', 'Vô Thời Hạn', '1', '', 'hinhthuchd'),
('eb5169ba-df7e-4983-ba34-25f3b99aeac5', '3 Năm', '2', '', 'hinhthuchd'),
('16570553-0b41-4914-adef-424c8bac42bd', '1 Năm', '3', '', 'hinhthuchd'),
('18223f29-0ecc-4f85-ace6-f517a745dd2f', 'Thử Việc', '4', '', 'hinhthuchd'),
('ea729a6a-446d-40ac-be6b-b5b96427a89d', 'Chính Thức', '1', '', 'tinhtrang'),
('2e206060-e5a7-42bf-9310-f22ec1260d55', 'Thử Việc', '2', '', 'tinhtrang'),
('5c382344-434d-4e72-a422-ce30282bcbaa', 'Thôi Việc', '3', '', 'tinhtrang'),
('041aacb3-a439-4bd2-b15e-909e78c46c5d', 'Giám Đốc', '1', '', 'chucvu'),
('9fd294d6-2f3b-4da7-8155-38a6e469f155', 'Phó Giám Đốc', '2', '', 'chucvu'),
('69ee53aa-d22b-4dbb-872f-e69689753fd3', 'Kế Toán Trưởng', '3', '', 'chucvu'),
('70bf7402-20e6-4a2e-bd37-eb43884623c0', 'Kế toán', '4', '', 'chucvu'),
('4ec1bb5a-6828-4375-b573-96358b1de709', 'NV Kinh doanh', '5', '', 'chucvu'),
('c009fbc9-621f-4666-80c1-2cfdc08e704f', 'Khác', '3', 'Giới Tính Khác', 'gioitinh'),
('b5d09907-7e45-4726-bbc7-565f87222308', 'Nhân Viên', 'NV', 'Nhân Viên', 'chucvu'),
('249ecdcc-963f-4818-b9d9-7b1481764c60', 'Tuýp', '1', 'Tuýp\r\n', 'donvitinh'),
('9a0ca999-5683-4afe-895c-d1df5e9e7949', 'Chai', '3', 'Chai', 'donvitinh'),
('c6a6b1ff-a526-452d-b140-b06fdcf0068e', 'Tên Thuốc', '1', 'Tên Thuốc', 'timkiemtheoboloc'),
('ba0f3f54-4ec5-49c7-a8ce-c1868dae2dc5', 'Gói', '5', 'Gói', 'donvitinh'),
('b62e32ad-57c3-42ca-b67c-233bd7e72bbb', 'Viên', '4', 'Viên', 'donvitinh'),
('65cc9996-98af-4f55-bc85-6366ec26cc6f', 'Lọ', '5', 'Lọ', '65cc9996-98af-4f55-bc85-6366ec26cc6f'),
('a04d5a0f-94a2-4b5d-b5c7-967db2b7f58c', 'Tên Biệt Dược', '2', 'Tên Biệt Dược', 'timkiemtheoboloc'),
('9c2b2178-5f7d-4801-aba6-78fd478aec6d', 'Ống', '2', 'Ống', 'donvitinh'),
('78ed3d3d-577e-433e-9d33-9a4307e2b4a2', '1', '1', '1', 'donviquydoi'),
('bc356ab1-27a5-44b8-8e41-0976b336c21d', '1/2', '0.5', '1/2', 'donviquydoi'),
('b9c06c11-1d52-4f0f-bda3-9e3e293b4e9b', '1/3', '0.3333', '1/3', 'donviquydoi'),
('b123e530-894e-4cb6-9829-eaf5b0cec49f', '1/4', '0.25', '1/4', 'donviquydoi'),
('11e31d45-def7-4f9e-bc04-a0aebfcfcad2', '1/5', '0.2', '1/5', 'donviquydoi'),
('cdd13c6d-8427-40c2-8937-a43687b14321', '1/6', '0.16667', '1/6', 'donviquydoi'),
('fa99e741-d0c0-46a5-95f9-260a346e47ee', '1/7', '0.1428571428571429', '1/7', 'donviquydoi'),
('217cc299-61f5-41cf-9b66-0c72b8d3e682', '1/8', '0.125', '1/8', 'donviquydoi'),
('613a1961-eb6e-4bbc-ad27-e0b2436f1c47', '3', '3', '3', 'donviquydoi'),
('e1eb9686-2648-4b2a-818a-677a8af3d53c', '2', '2', '2', 'donviquydoi'),
('1648414e-9dfa-45fc-8a54-cdcb719277f4', 'Thuốc Kê Toa', '1', 'Thuốc Kê Toa', 'optiontoathuoc'),
('d2290737-e827-4434-8638-40191eeb9be2', 'Thuốc Không Kê Toa', '2', 'Thuốc Không Kê Toa', 'optiontoathuoc'),
('25162d5a-cd59-4e23-a73c-0a267fe56655', 'Hủ', '6', 'Hủ', 'donvitinh'),
('389ff02b-2fab-4bcd-82c0-c833efd12673', 'Miếng', '7', 'Miếng', 'donvitinh'),
('e98f6ade-0520-478b-8a86-d65e9e9f556d', 'Ngày', '8', 'Ngày', 'donvitinh'),
('317c7d9b-e178-4781-a5d5-fdceee2351df', 'Lần', '9', 'Lần', 'donvitinh'),
('cdd083f6-5959-49fc-b9dc-fbadccc7ae0a', 'Túi', '10', 'Túi', 'donvitinh'),
('fd7a8277-e6ad-40ec-b594-4d61bdedf249', 'Vỉ', '11', 'Vỉ', 'donvitinh'),
('0d73290d-065d-466b-abf8-77f07c5e59da', 'Nhát', '12', 'Nhát', 'donvitinh'),
('a4435f65-6733-431b-b582-b86cbe7dedd9', 'Lọ', '13', 'Lọ', 'donvitinh'),
('71b8256d-ef1c-4b68-9998-8c3defbadd84', 'Ly', '14', 'Ly', 'donvitinh'),
('a21407be-62ac-4f04-98a1-bc283fcb638c', 'Hộp', '15', 'Hộp', 'donvitinh'),
('7a8a5173-f724-4d42-b598-b3fae4f20f12', 'Uống', '1', 'Uống', 'cachdungthuoc'),
('0d045989-ac1a-46a2-bb51-6c37c703ed8c', 'Tiêm', '2', 'Tiêm', 'cachdungthuoc'),
('6e0bde0d-da82-4122-a1b3-8f70b0ab7cb6', 'Nhai', '3', 'Nhai', 'cachdungthuoc'),
('65eb7677-9b78-46ec-9f97-f33cf57bb8bc', 'Truyền', '4', 'Truyền', 'cachdungthuoc'),
('77afcf2c-ad6c-4c04-ae77-fb50b15a7159', 'Đơn lưu cố định', '1', 'Đơn lưu cố định', 'optiondonthuoc'),
('fd57f77c-02d7-4708-8182-c91addd28632', 'Đơn in cho bệnh nhân', '2', 'Đơn in cho bệnh nhân', 'optiondonthuoc'),
('88f8cd47-fe1b-448b-88b9-edac6811aa33', 'Đơn in cho nhà thuốc', '3', 'Đơn in cho nhà thuốc', 'optiondonthuoc'),
('73916D76-C7D3-D2B3-44A9-9FD169C32A5D', 'Chưa lấy thuốc', '1', 'Chưa lấy thuốc', 'trangthai'),
('AD608BF0-E24A-C285-9AD1-02B8D196CBAF', '0', '0', '0', 'donviquydoi'),
('DA7891B1-D55F-3AEC-BE7E-1CE0FB9F1887', 'Đang soạn thuốc', '2', 'Đang soạn thuốc', 'trangthai'),
('2CA8C55C-9C63-5529-F809-DB92DF369D15', 'Đã soạn thuốc xong', '3', 'Đã soạn thuốc xong', 'trangthai');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_pages`
--

CREATE TABLE `lap1_pages` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Images` text NOT NULL,
  `Content` longtext NOT NULL,
  `Des` text NOT NULL,
  `Keyword` text NOT NULL,
  `Title` text NOT NULL,
  `Alias` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_pages`
--

INSERT INTO `lap1_pages` (`Id`, `Name`, `Images`, `Content`, `Des`, `Keyword`, `Title`, `Alias`) VALUES
('1105cf0e39b7545e9d42bef90dc05624', 'Giới Thiệu', '/public/userfiles/admin/images/2012081710.jpg', '<h1>Giới thi&ecirc;̣u v&ecirc;̀ shop Thời Trang Ciao.</h1>\r\n\r\n<h2>Đ&ocirc;i lời giới thi&ecirc;̣u v&ecirc;̀ shop:</h2>\r\n\r\n<p>Shop Thời Trang Ciao chúng t&ocirc;i kh&ocirc;ng đơn thu&acirc;̀n là cái đẹp thời trang, chúng t&ocirc;i khao khát ki&ecirc;́n tạo những giá trị xã h&ocirc;̣i nh&acirc;n văn, trở thành m&ocirc;̣t l&ocirc;́i s&ocirc;́ng đ&ecirc;̉ đ&ocirc;̀ng hành cùng phụ nữ tr&ecirc;n hành trình th&acirc;́u cảm vẻ đẹp của chính mình.</p>\r\n\r\n<p>Shop Thời Trang Ciao là k&ecirc;nh mua sắm online uy tín hàng đ&acirc;̀u, cùng với đ&ocirc;̣i ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghi&ecirc;̣p, chúng t&ocirc;i cam k&ecirc;́t đem những sản ph&acirc;̉m t&ocirc;́t nh&acirc;́t, với giá cả phải chăng, uy tín và ch&acirc;́t lượng với dịch vụ t&ocirc;́t nh&acirc;́t đ&ecirc;́n với mọi người.</p>\r\n\r\n<h2>Mục ti&ecirc;u của chúng t&ocirc;i.</h2>\r\n\r\n<p>Shop thời trang Ciao &ndash; Ch&acirc;́t Lượng &ndash; Uy Tín &ndash; Chuy&ecirc;n nghi&ecirc;̣p</p>\r\n\r\n<ul>\r\n	<li>Ti&ecirc;́p tục trở thành shop bán lẻ hàng đ&acirc;̀u.</li>\r\n	<li>Mở r&ocirc;̣ng phạm vi bán hàng ra toàn qu&ocirc;́c.</li>\r\n	<li>Mang đ&ecirc;́n cho khách hàng sự y&ecirc;n t&acirc;m và hài lòng khi mua sắm tại nhà.</li>\r\n	<li>Kh&ocirc;ng ngừng t&igrave;m kiếm v&agrave; cập nhật c&aacute;c mẫu quần &aacute;o, c&aacute;c hot trend tr&ecirc;n thị trường để đ&aacute;p ứng nhu cầu của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Nơi cung c&acirc;́p th&ocirc;ng tin và tư v&acirc;́n sản ph&acirc;̉m t&ocirc;́t nh&acirc;́t cho khách hàng.</li>\r\n	<li>Đ&ocirc;́i tác ti&ecirc;̀m năng và uy tín của các nhà cung c&acirc;́p.</li>\r\n</ul>\r\n\r\n<h2>Cơ sở v&acirc;̣t ch&acirc;́t.</h2>\r\n\r\n<ul>\r\n	<li>Đội ngũ nh&acirc;n sự chuy&ecirc;n nghiệp, tận t&igrave;nh v&agrave; trung thực</li>\r\n	<li>Bộ phận Tư vấn v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Bộ phận Nhận diện thương hiệu.</li>\r\n	<li>Bộ phận Video v&agrave; h&igrave;nh ảnh</li>\r\n	<li>Bộ phận Giao nhận</li>\r\n	<li>C&aacute;c bộ phận kh&aacute;c: H&agrave;nh ch&iacute;nh, Kế to&aacute;n &hellip;</li>\r\n	<li>Cơ sở vật chất&nbsp; đầy đủ v&agrave; hiện đại</li>\r\n	<li>Kho lưu giữ h&agrave;ng h&oacute;a, đặt ngay tại trung t&acirc;m th&agrave;nh phố.</li>\r\n	<li>Xe vận chuyển h&agrave;ng h&oacute;a v&agrave; sắp xếp h&agrave;ng h&oacute;a</li>\r\n</ul>\r\n\r\n<h2>Hình thức bán hàng.</h2>\r\n\r\n<ul>\r\n	<li>Mọi sản phẩm đều được b&aacute;n qua k&ecirc;nh Online.</li>\r\n	<li>Đặt h&agrave;ng trực tuyến tr&ecirc;n&nbsp;<a href=\"https://www.facebook.com/VayXinh.ReDep.ThoiTrangCiao/\" rel=\"noreferrer noopener\" target=\"_blank\">Fanpage Facebook của Shop chúng t&ocirc;i</a>.</li>\r\n	<li>Đưa sản phẩm l&ecirc;n website:&nbsp;<a href=\"https://thoitrangciao.com/\">Trang chủ &ndash; thoitrangciao.com</a>.</li>\r\n	<li>H&agrave;ng th&aacute;ng ph&aacute;t h&agrave;nh 500 m&atilde; giảm gi&aacute; tặng k&egrave;m khi kh&aacute;ch h&agrave;ng mua h&agrave;ng tại shop.</li>\r\n	<li>Hai th&aacute;ng ph&aacute;t h&agrave;nh 100 qu&agrave; tặng d&agrave;nh cho kh&aacute;ch h&agrave;ng th&acirc;n thiết.</li>\r\n</ul>\r\n\r\n<h2>Sản ph&acirc;̉m kinh doanh.</h2>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i chuy&ecirc;n kinh doanh thời trang nữ dành cho mọi lứa tu&ocirc;̉i, sản phẩm chủ yếu l&agrave;&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/ao/\" rel=\"noreferrer noopener\" target=\"_blank\">&Aacute;o Thời Trang Nữ</a>,&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/chan-vay/\" rel=\"noreferrer noopener\" target=\"_blank\">Ch&acirc;n V&aacute;y Nữ</a>,&nbsp;<a href=\"https://thoitrangciao.com/danh-muc/dam/\" rel=\"noreferrer noopener\" target=\"_blank\">Đầm Nữ Đẹp</a>.</p>\r\n\r\n<p>Những sản phẩm tại Thời Trang Ciao được ch&iacute;nh chủ Shop t&igrave;m kiếm tuyển chọn mẫu m&atilde; đa dạng phong ph&uacute; theo xu hướng thời trang &ldquo;HOT&rdquo; nhất tr&ecirc;n thị trường.&nbsp;</p>\r\n\r\n<p>C&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i được lựa chọn vải v&agrave; đặt may tại Việt Nam với ti&ecirc;u ch&iacute; &ldquo;Kh&ocirc;ng qua trung gian &ndash; Gi&aacute; cả hợp l&yacute; &ndash; Chất lượng đảm bảo&rdquo;&nbsp;</p>\r\n\r\n<h2>Hành trình phát tri&ecirc;̉n Thời Trang Ciao.</h2>\r\n\r\n<p>Chúng t&ocirc;i ra đời tr&ecirc;n phương di&ecirc;̣n lắng nghe mong ước của những người phụ nữ, dựa tr&ecirc;n thực t&ecirc;́ nhi&ecirc;̀u người mong mu&ocirc;́n được mặc đẹp hơn, khoác l&ecirc;n người những b&ocirc;̣ cánh làm t&ocirc;n l&ecirc;n vẻ đẹp của bản th&acirc;n với m&ocirc;̣t mức giá phù hợp nh&acirc;́t.</p>\r\n\r\n<p>T&acirc;́t cả những sản ph&acirc;̉m của chúng t&ocirc;i được nh&acirc;̣p v&ecirc;̀ tr&ecirc;n ti&ecirc;u chí b&ecirc;̀n rẻ đẹp, c&ocirc;́ gắng t&ocirc;́t nh&acirc;́t đ&ecirc;̉ làm hài lòng mọi người, tr&ecirc;n phương di&ecirc;̣n g&acirc;̀n gũi hơn nhưng v&acirc;̃n giữ nguy&ecirc;n vẻ thanh lịch, t&ocirc;́i giản và sang trọng.</p>\r\n\r\n<p>Chi&ecirc;́n lực phát tri&ecirc;̉n của thời trang Ciao chúng t&ocirc;i là lu&ocirc;n lu&ocirc;n đ&ocirc;̉i mới, c&ocirc;́ gắng tìm tòi những cách thức phục vụ t&ocirc;́t nh&acirc;́t cho nhu c&acirc;̀u làm đẹp chính đáng của mọi người.</p>\r\n\r\n<h2>Chúng t&ocirc;i cam k&ecirc;́t.</h2>\r\n\r\n<ul>\r\n	<li>Giá cả phù hợp, tư v&acirc;́n nhi&ecirc;̣t tình.</li>\r\n	<li>Giao hàng nhanh chóng, mi&ecirc;̃n phí tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n	<li>H&acirc;̣u mãi chu đáo.</li>\r\n	<li>Nhi&ecirc;̀u chương trình khuy&ecirc;́n mãi h&acirc;́p d&acirc;̃n.</li>\r\n</ul>\r\n', 'asdas a', 'asds das das', 'ass das', 'gioi-thieu'),
('5e536ad7-007e-4bbe-98ee-5c4039dca653', 'Liên Hệ', '/public/userfiles/admin/images/2012081710.jpg', '<p><strong>3.&nbsp;Gửi email</strong><strong>&nbsp;theo&nbsp;</strong><a href=\"https://help.shopee.vn/vn/s/contactusform\" target=\"_blank\"><strong>hướng dẫn</strong></a><br />\r\n<br />\r\n<strong>4. Gọi điện thoại:&nbsp;</strong><strong>19001221</strong><strong>&nbsp;</strong>(cước ph&iacute; l&agrave; 1.000đ / ph&uacute;t)<br />\r\n<br />\r\n<strong>Lưu &yacute;:</strong>&nbsp;Thời gian nhận được kết quả xử l&yacute;<br />\r\n- Ngay lập tức: d&agrave;nh cho những y&ecirc;u cầu về tư vấn v&agrave; giải đ&aacute;p th&ocirc;ng tin<br />\r\n- Từ 1-2 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu hỗ trợ cần c&aacute;c bộ phận li&ecirc;n quan xử l&yacute;<br />\r\n- Từ 3-5 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu khiếu nại</p>\r\n', 'asd', 'asdasdas', 'asd', 'lien-he');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_qlthuoc_danhmuc`
--

CREATE TABLE `lap1_qlthuoc_danhmuc` (
  `Id` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `GhiChu` longtext NOT NULL,
  `IsDelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_qlthuoc_danhmuc`
--

INSERT INTO `lap1_qlthuoc_danhmuc` (`Id`, `Name`, `Link`, `GhiChu`, `IsDelete`) VALUES
('DMT-001', 'Thuốc ghi toa', 'thuoc-ghi-toa', 'Thuốc ghi toa', 0),
('DMT-002', 'Thuốc cấp cứu', 'thuoc-cap-cuu', 'Thuốc cấp cứu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_qlthuoc_phieuxuatnhap`
--

CREATE TABLE `lap1_qlthuoc_phieuxuatnhap` (
  `Id` int(11) NOT NULL,
  `IdPhieu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TongTien` decimal(15,0) NOT NULL,
  `DoViCungCap` text CHARACTER SET utf8 NOT NULL,
  `XuatNhap` int(11) NOT NULL,
  `NoiDungPhieu` longtext CHARACTER SET utf8 NOT NULL,
  `GhiChu` text CHARACTER SET utf8 NOT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `IsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_qlthuoc_phieuxuatnhap`
--

INSERT INTO `lap1_qlthuoc_phieuxuatnhap` (`Id`, `IdPhieu`, `TongTien`, `DoViCungCap`, `XuatNhap`, `NoiDungPhieu`, `GhiChu`, `NgayNhap`, `CreateRecord`, `UpdateRecord`, `IsDelete`) VALUES
(61, 'P2209-00001', '900000', '', -1, 'Đơn thuốc Viêm Gan của Phùng Văn Nghị', 'Đơn thuốc Viêm Gan của Phùng Văn Nghị', '2022-09-29 14:31:24', '2022-09-29 14:31:24', '2022-09-29 14:31:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_qlthuoc_phieuxuatnhap_chitiet`
--

CREATE TABLE `lap1_qlthuoc_phieuxuatnhap_chitiet` (
  `Id` int(11) NOT NULL,
  `IdPhieu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `IdThuoc` varchar(50) CHARACTER SET utf8 NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `SoLo` text CHARACTER SET utf8 NOT NULL,
  `NhaSanXuat` text CHARACTER SET utf8 NOT NULL,
  `NuocSanXuat` text CHARACTER SET utf8 NOT NULL,
  `Price` decimal(15,0) NOT NULL,
  `HanSuDung` date NOT NULL,
  `XuatNhap` int(11) NOT NULL,
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `GhiChu` text CHARACTER SET utf8 NOT NULL,
  `IsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_qlthuoc_phieuxuatnhap_chitiet`
--

INSERT INTO `lap1_qlthuoc_phieuxuatnhap_chitiet` (`Id`, `IdPhieu`, `IdThuoc`, `SoLuong`, `SoLo`, `NhaSanXuat`, `NuocSanXuat`, `Price`, `HanSuDung`, `XuatNhap`, `CreateRecord`, `UpdateRecord`, `GhiChu`, `IsDelete`) VALUES
(105, 'P2209-00001', 'MT-0001', 60, '', '', '', '5000', '0000-00-00', -1, '2022-09-29 14:31:24', '2022-09-29 14:31:24', 'Uống sau khi ăn', 0),
(106, 'P2209-00001', 'MT-0002', 60, '', '', '', '5000', '0000-00-00', -1, '2022-09-29 14:31:24', '2022-09-29 14:31:24', 'Uống sau khi ăn', 0),
(107, 'P2209-00001', 'MT-0003', 60, '', '', '', '5000', '0000-00-00', -1, '2022-09-29 14:31:24', '2022-09-29 14:31:24', 'Uống sau khi ăn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_qlthuoc_thuoc`
--

CREATE TABLE `lap1_qlthuoc_thuoc` (
  `Id` varchar(50) NOT NULL,
  `Idloaithuoc` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Namebietduoc` varchar(100) NOT NULL,
  `Solo` varchar(50) NOT NULL,
  `Gianhap` decimal(15,0) NOT NULL,
  `Giaban` decimal(15,0) NOT NULL,
  `DVT` varchar(50) NOT NULL,
  `Ngaysx` date NOT NULL,
  `HSD` date NOT NULL,
  `DVQuyDoi` varchar(50) NOT NULL,
  `Tacdung` text NOT NULL,
  `Cochetacdung` text NOT NULL,
  `Ghichu` text NOT NULL,
  `Soluong` bigint(20) NOT NULL,
  `NhaSX` varchar(50) NOT NULL,
  `NuocSX` varchar(50) NOT NULL,
  `IsDelete` int(11) NOT NULL DEFAULT 0,
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp(),
  `CachDung` text NOT NULL,
  `Canhbao` bigint(20) NOT NULL,
  `SLXuat` bigint(20) NOT NULL DEFAULT 0,
  `SLNhap` bigint(20) NOT NULL DEFAULT 0,
  `SLHienTai` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_qlthuoc_thuoc`
--

INSERT INTO `lap1_qlthuoc_thuoc` (`Id`, `Idloaithuoc`, `Name`, `Namebietduoc`, `Solo`, `Gianhap`, `Giaban`, `DVT`, `Ngaysx`, `HSD`, `DVQuyDoi`, `Tacdung`, `Cochetacdung`, `Ghichu`, `Soluong`, `NhaSX`, `NuocSX`, `IsDelete`, `CreateRecord`, `CachDung`, `Canhbao`, `SLXuat`, `SLNhap`, `SLHienTai`) VALUES
('MT-0001', 'DMT-001', 'Acemuc 100mg', 'Acemuc 100mg', '0', '3000', '5000', '4', '2020-02-23', '2022-09-30', '1', 'Không', 'Không', 'Không', 100, 'Không', 'ci', 0, '2022-09-21 15:36:37', '1', 60, 0, 100, 200),
('MT-0002', '', 'Acemuc 200mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', 'Uống trước khi ăn', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 100, 100, 100),
('MT-0003', '', 'Acetylcysteine 200mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', 'Uống sau khi ăn', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 100, 0, 0),
('MT-0004', '', 'Amlordipin 5mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 100, 100, 100),
('MT-0005', '', 'Amlor 5mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0006', '', 'Atorvastatin 20 mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0007', '', 'Aprovel 300mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 30),
('MT-0008', '', 'Betaloc 50mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0009', '', 'Betaloczok 50mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0010', '', 'Betaserc 16mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0011', '', 'Betaserc 24mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0012', '', 'Buscopan 10mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0013', '', 'Calci D 500mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0014', '', 'Cetirizin 10 mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0015', '', 'Clopheniramin 4 mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0016', '', 'Daflon 500mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 100, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0017', '', 'Diamicron  MR 30mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0018', '', 'Flagyl 250mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0019', '', 'Galvus 50mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0020', '', 'Nexium 40mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0021', '', 'Medrol 4mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:37', '1', 60, 0, 0, 55),
('MT-0022', '', 'Myvita', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0023', '', 'Procoralan', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0024', '', 'Siofor 1000mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0025', '', 'Sucrafate', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0026', '', 'Vastarel MR 30mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0027', '', 'Adrenalin 1mg', '', '0', '3000', '5000', '2', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0028', '', 'Efferalgan 80mg', '', '0', '3000', '5000', '5', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0029', '', 'Efferalgan 150mg', '', '0', '3000', '5000', '5', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0030', '', 'Efferalgan 250mg', '', '0', '3000', '5000', '5', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0031', '', 'Efferalgan 500mg', '', '0', '3000', '5000', '5', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0032', '', 'Efferalgan 80mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0033', '', 'Efferalgan 150mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0034', '', 'Panadol 500mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0035', '', 'Captopril 25mg', '', '0', '3000', '5000', '4', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0036', '', 'Ventolin 2.5mg', '', '0', '3000', '5000', '', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0037', '', 'Ventolin  5mg', '', '0', '3000', '5000', '', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0038', '', 'Natriclorua 0,9% 100mL', '', '0', '3000', '5000', '3', '2020-02-23', '2020-02-23', '1', 'Không', '', '', 0, '', 'VietNam', 0, '2022-09-21 15:36:38', '1', 60, 0, 0, 55),
('MT-0039', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0040', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0041', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0042', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0043', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0044', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0045', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0046', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0047', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0048', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0049', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0050', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0051', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:38', '', 60, 0, 0, 55),
('MT-0052', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0053', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0054', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0055', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 1, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0056', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0057', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0058', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0059', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0060', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0061', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0062', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0063', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0064', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0065', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0066', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0067', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0068', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0069', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0070', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0071', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0072', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0073', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0074', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0075', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0076', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0077', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0078', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0079', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0080', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0081', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0082', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0083', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0084', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:39', '', 60, 0, 0, 55),
('MT-0085', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0086', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0087', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0088', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0089', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0090', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0091', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0092', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0093', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0094', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0095', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0096', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0097', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0098', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0099', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0100', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0101', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0102', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0103', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0104', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0105', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0106', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0107', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0108', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0109', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0110', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0111', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0112', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0113', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:40', '', 60, 0, 0, 55),
('MT-0114', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0115', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0116', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0117', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0118', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0119', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0120', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0121', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0122', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0123', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0124', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0125', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0126', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0127', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0128', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0129', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0130', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0131', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0132', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0133', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0134', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0135', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0136', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0137', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0138', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:41', '', 60, 0, 0, 55),
('MT-0139', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0140', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0141', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0142', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0143', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0144', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0145', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0146', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0147', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0148', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0149', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0150', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0151', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0152', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0153', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0154', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0155', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0156', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0157', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0158', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0159', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0160', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0161', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0162', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0163', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0164', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0165', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0166', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0167', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0168', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:42', '', 60, 0, 0, 55),
('MT-0169', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0170', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0171', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0172', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0173', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0174', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0175', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0176', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0177', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0178', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0179', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0180', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0181', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0182', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0183', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0184', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0185', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0186', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0187', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0188', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0189', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0190', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0191', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0192', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0193', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0194', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0195', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0196', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0197', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0198', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0199', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0200', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:43', '', 60, 0, 0, 55),
('MT-0201', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:44', '', 60, 0, 0, 55),
('MT-0202', '', '', '', '', '0', '0', '', '1970-01-01', '1970-01-01', '', '', '', '', 0, '', '', 0, '2022-09-21 15:36:44', '', 60, 0, 0, 55);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_role`
--

CREATE TABLE `lap1_role` (
  `Id` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Des` text NOT NULL,
  `IsNotDelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_role`
--

INSERT INTO `lap1_role` (`Id`, `Name`, `Des`, `IsNotDelete`) VALUES
('Admin', 'Quyền  Admin', 'Quyền Admin', 1),
('QuanLy', 'Quyền  Quản Lý', 'Admin Quản Lý', 1),
('QLT_DonThuoc_DS', 'Danh Sách Đơn Thuốc', 'Danh Sách Đơn Thuốc', 0),
('QLT_Phieu_Detail', 'Chi Tiết Phiếu', 'Chi Tiết Phiếu', 0),
('QLT_Phieu_Delete', 'Xoá Phiếu', 'Xoá Phiếu', 0),
('QLT_Phieu_Put', 'Sửa Phiếu', 'Sửa Phiếu', 0),
('QLT_Phieu_Post', 'Thêm Phiếu', 'Thêm Phiếu', 0),
('QLT_Phieu_DS', 'Danh Sách Phiếu Xuất Nhập', 'Danh Sách Phiếu Xuất Nhập', 0),
('QLT_DanhMuc_Delete', 'Xoá Loại Thuốc', 'Xoá Loại Thuốc', 0),
('QLT_DanhMuc_Put', 'Sửa Loại Thuốc', 'Sửa Loại Thuốc', 0),
('QLT_DanhMuc_Post', 'Thêm Loại Thuốc', 'Thêm Loại Thuốc', 0),
('QLT_DanhMuc_DS', 'Danh Sách Loại Thuốc', 'Danh Sách Loại Thuốc', 0),
('QLT_Thuoc_Import', 'Import Thuốc', 'Import Thuốc', 0),
('QLT_Thuoc_Export', 'Export Thuốc', 'Export Thuốc', 0),
('QLT_Thuoc_Delete', 'Xoá Thuốc', 'Xoá Thuốc', 0),
('QLT_Thuoc_Put', 'Sửa Thuốc', 'Sửa Thuốc', 0),
('QLT_Thuoc_Post', 'Thêm Thuốc', 'Thêm Thuốc', 0),
('QLT_Thuoc_DS', 'Danh Sách Thuốc', 'Danh Sách Thuốc', 0),
('QLT_BenhNhan_Delete', 'Xoá Bệnh Nhân', 'Xoá Bệnh Nhân', 0),
('QLT_BenhNhan_Put', 'Sửa Bệnh Nhân', 'Sửa Bệnh Nhân', 0),
('QLT_BenhNhan_Post', 'Thêm Bệnh Nhân', 'Thêm Bệnh Nhân', 0),
('QLT_BenhNhan_Detail', 'Danh Sách Chi Tiết Bệnh Nhân', 'Danh Sách Chi Tiết Bệnh Nhân', 0),
('QLT_BenhNhan_View', 'Danh Sách Bệnh Nhân', 'Danh Sách Bệnh Nhân', 0),
('QLT_DonThuoc_Post', 'Thêm Đơn Thuốc', 'Thêm Đơn Thuốc', 0),
('QLT_DonThuoc_Put', 'Sửa Đơn Thuốc', 'Sửa Đơn Thuốc', 0),
('QLT_DonThuoc_Delete', 'Xoá Đơn Thuốc', 'Xoá Đơn Thuốc', 0),
('QLT_DonThuoc_Export', 'Export Đơn Thuốc', 'Export Đơn Thuốc', 0),
('QLT_DonThuoc_Copy', 'Copy Đơn Thuốc', 'Copy Đơn Thuốc', 0),
('QLT_DonThuoc_Detail', 'Đơn Thuốc Chi Tiết', 'Đơn Thuốc Chi Tiết', 0),
('QLT_Thuoc_Detail', 'Chi Tiết Thuốc', 'Chi Tiết Thuốc', 0),
('c9eff42a820d3dc2e4ad02501c6564da', 'Thêm', 'Module Quản Lý Tài Khoản', 0),
('d7f32ba04bc9ac241757c81661775233', 'Sửa', 'Module Quản Lý Tài Khoản', 0),
('354db8167472d6a6ee16913dd12a412b', 'Xóa', 'Module Quản Lý Tài Khoản', 0),
('16a2b0020b29f36c96878e339c102d78', 'Xem', 'Module Quản Lý Tài Khoản', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham`
--

CREATE TABLE `lap1_sanpham` (
  `Id` varchar(50) NOT NULL DEFAULT '0',
  `Code` varchar(50) DEFAULT NULL,
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
  `Lang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham`
--

INSERT INTO `lap1_sanpham` (`Id`, `Code`, `Name`, `Des`, `Keyword`, `Title`, `DanhMucId`, `Alias`, `Username`, `Price`, `oldPrice`, `Summary`, `Content`, `UrlImages`, `DateCreate`, `Number`, `Note`, `BuyTimes`, `Views`, `isShow`, `STT`, `Lang`) VALUES
('0240658b-010b-4b8f-bbf7-54ffe3e7a4ae', '0001', 'Áo Thun 4', '', '', '', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-4', 'admin', '200000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product9.jpg', NULL, 0, NULL, 0, 0, -1, 0, 'vi'),
('16fa2b9d-238c-4ba0-ac23-59f9cbd29d37', NULL, 'Easy Polo Black Edition', 'http://lap1.dev1:8080/', 'http://lap1.dev1:8080/', 'http://lap1.dev1:8080/', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'easy-polo-black-edition', 'admin', '200000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product10.jpg', NULL, 0, NULL, 0, 0, 1, 0, 'vi'),
('3a7cc06e-88e4-4fac-a9c7-c4d0fc1e6710', NULL, 'Áo Thun 3', '', '', '', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-3', 'admin', '300000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product8.jpg', NULL, 0, NULL, 0, 0, 1, 0, 'vi'),
('9ad93796-eb47-4c7e-bb2d-64b1c3e50257', NULL, 'Áo Thun 1', 'Áo Thun 1', 'Áo Thun 1', 'Áo Thun 1', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-1', 'admin', '500000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product12.jpg', NULL, 0, NULL, 0, 0, -1, 0, 'vi'),
('d0eaa907-a0b9-47cc-97dc-f005a3cb9da7', NULL, 'Áo Thun 99', '', '', '', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-99', 'admin', '1200000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product11.jpg', NULL, 0, NULL, 0, 0, 0, 0, 'vi'),
('f7056705-4381-444b-915b-3b0fd9735ccc', NULL, 'Áo Thun 2', '', '', '', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-2', 'admin', '700000.0000', '0.0000', '', '', '/public/userfiles/admin/images/product7.jpg', NULL, 0, NULL, 0, 0, 0, 0, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_danhmuc`
--

CREATE TABLE `lap1_sanpham_danhmuc` (
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
  `Lang` varchar(4) NOT NULL DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_danhmuc`
--

INSERT INTO `lap1_sanpham_danhmuc` (`Id`, `Name`, `keyword`, `des`, `title`, `Path`, `Link`, `Note`, `parentsId`, `Banner`, `IsPublic`, `STT`, `Lang`) VALUES
('44bc0a10-295c-46c5-92fd-a789d76d8808', 'Áo Thể Thao', 'Áo Thể Thao', 'Áo Thể Thao', 'Áo Thể Thao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi'),
('74fbb23b-0fa9-4a4e-abad-39fd0bb74681', 'Đồ Thể Thao', 'Đồ Thể Thao', 'Đồ Thể Thao', 'Đồ Thể Thao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_donhang`
--

CREATE TABLE `lap1_sanpham_donhang` (
  `Id` varchar(50) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `HoTen` varchar(500) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `NgayGiaoHang` datetime NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `SoSP` int(11) NOT NULL,
  `TinhThanh` int(11) NOT NULL,
  `QuanHuyen` int(11) NOT NULL,
  `PhuongXa` int(11) DEFAULT NULL,
  `DiaChiChiTiet` text NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_donhang`
--

INSERT INTO `lap1_sanpham_donhang` (`Id`, `Code`, `SDT`, `Email`, `HoTen`, `NgayTao`, `NgayGiaoHang`, `TongTien`, `SoSP`, `TinhThanh`, `QuanHuyen`, `PhuongXa`, `DiaChiChiTiet`, `GhiChu`) VALUES
('726f7e83-bc1f-4317-a599-847b036fc629', 'DH-2022-01-2', '23423423423', NULL, 'asdasda sdasdas', '2022-01-03 20:48:41', '2022-01-05 20:48:41', '900000', 3, 32, 33, NULL, 'asdasdasd', 'asdasdas'),
('c9d38dca-5665-4360-8613-b05c919af35f', 'DH-2022-01-1', '0123456789', NULL, 'asdasda sdasdas', '2022-01-03 20:46:31', '2022-01-07 00:00:00', '900000', 3, 32, 33, NULL, 'asdasdasd', 'asdasda'),
('9fd2e1c4-36ee-4887-836d-9245786b0afc', 'DH-2022-01-4', '23423423423', NULL, 'asdasda sdasdas', '2022-01-03 20:50:55', '2022-01-05 20:50:55', '600000', 1, 32, 33, NULL, 'asdasdasd', 'ASDasdas');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_donhang_chitiet`
--

CREATE TABLE `lap1_sanpham_donhang_chitiet` (
  `Id` varchar(50) NOT NULL,
  `IdDonHang` varchar(50) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_sanpham_donhang_chitiet`
--

INSERT INTO `lap1_sanpham_donhang_chitiet` (`Id`, `IdDonHang`, `IdSanPham`, `SoLuong`, `Gia`) VALUES
('76aa55b5-30c0-4d5c-b45c-fe27a4ef5050', 'c9d38dca-5665-4360-8613-b05c919af35f', '0240658b-010b-4b8f-bbf7-54ffe3e7a4ae', 2, '200000'),
('fd2151f9-e66d-439f-8d13-d91524064c43', 'c9d38dca-5665-4360-8613-b05c919af35f', '16fa2b9d-238c-4ba0-ac23-59f9cbd29d37', 1, '200000'),
('87c3e082-7d6a-47ae-9f3b-1bba8de94b64', 'c9d38dca-5665-4360-8613-b05c919af35f', '3a7cc06e-88e4-4fac-a9c7-c4d0fc1e6710', 1, '300000'),
('538e8a41-9e0e-44f5-a728-5cf5d16581b6', '726f7e83-bc1f-4317-a599-847b036fc629', '0240658b-010b-4b8f-bbf7-54ffe3e7a4ae', 2, '200000'),
('3efea744-132b-4a7b-ba83-2c67e7d0a7e0', '726f7e83-bc1f-4317-a599-847b036fc629', '16fa2b9d-238c-4ba0-ac23-59f9cbd29d37', 1, '200000'),
('4a1e9a48-d0df-4f2e-ad68-76bfb6ab0502', '726f7e83-bc1f-4317-a599-847b036fc629', '3a7cc06e-88e4-4fac-a9c7-c4d0fc1e6710', 1, '300000'),
('5e88f2f0-9639-4a1a-9802-8e67a7f5f2b5', '9fd2e1c4-36ee-4887-836d-9245786b0afc', '0240658b-010b-4b8f-bbf7-54ffe3e7a4ae', 3, '200000');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options`
--

CREATE TABLE `lap1_sanpham_options` (
  `Id` varchar(50) NOT NULL,
  `Code` varchar(200) NOT NULL,
  `Name` text NOT NULL,
  `Des` text NOT NULL
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

CREATE TABLE `lap1_sanpham_options_soluong` (
  `Id` varchar(50) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `Option1` varchar(50) NOT NULL,
  `Option2` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(15,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_options_type`
--

CREATE TABLE `lap1_sanpham_options_type` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Parents` varchar(50) NOT NULL
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

CREATE TABLE `lap1_sanpham_thuoctinh` (
  `Id` varchar(50) NOT NULL,
  `OptionsTypeId` varchar(50) NOT NULL,
  `Options` int(11) NOT NULL,
  `IdSanPham` varchar(50) NOT NULL,
  `GhiChu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_sanpham_thuoctinh_chitiet`
--

CREATE TABLE `lap1_sanpham_thuoctinh_chitiet` (
  `Id` varchar(50) NOT NULL,
  `IdThuocTinh` varchar(50) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_slider`
--

CREATE TABLE `lap1_slider` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Content` longtext NOT NULL,
  `Images` text NOT NULL,
  `GroupsId` varchar(50) NOT NULL,
  `IsPublic` int(11) DEFAULT NULL
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

CREATE TABLE `lap1_slider_img` (
  `Id` int(50) NOT NULL,
  `Images` text NOT NULL,
  `SliderId` varchar(50) NOT NULL,
  `ClassImgase` text NOT NULL,
  `Note` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lap1_toathuoc`
--

CREATE TABLE `lap1_toathuoc` (
  `Id` varchar(20) NOT NULL,
  `IdBenhNhan` varchar(20) NOT NULL,
  `NameBN` varchar(50) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `NgaySinh` varchar(50) NOT NULL,
  `ThoiGianKham` datetime NOT NULL DEFAULT current_timestamp(),
  `ChanDoanBenh` varchar(100) NOT NULL,
  `ThuocLoaiDon` varchar(50) NOT NULL,
  `TongNgayDung` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_toathuoc`
--

INSERT INTO `lap1_toathuoc` (`Id`, `IdBenhNhan`, `NameBN`, `GioiTinh`, `NgaySinh`, `ThoiGianKham`, `ChanDoanBenh`, `ThuocLoaiDon`, `TongNgayDung`, `Status`, `CreateRecord`) VALUES
('TT2209290001', 'BN2209290001', 'Phùng Văn Nghị', 1, '2001-08-08', '2022-09-29 14:31:23', 'Viêm Gan', '3', '20', 1, '2022-09-29 14:31:23'),
('TT2209290002', 'BN2209290002', 'Châu Thị A Lài', 2, '1970-01-01', '2022-09-29 14:37:17', 'Viêm phế quản', '2', '20', 1, '2022-09-29 14:37:17'),
('TT2209290003', 'BN2209290003', 'Châu Thị A Lài', 2, '2022-09-29', '2022-09-29 14:46:14', 'Viêm phế quản', '2', '20', 0, '2022-09-29 14:46:14'),
('TT2209290004', 'BN2209290004', 'Châu Thị A Lài', 2, '1999-01-01', '2022-09-29 14:48:49', 'Viêm phế quản', '2', '20', 1, '2022-09-29 14:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_toathuoc_detail`
--

CREATE TABLE `lap1_toathuoc_detail` (
  `IdDetail` varchar(50) NOT NULL,
  `IdDonThuoc` varchar(20) NOT NULL,
  `IdThuoc` varchar(20) NOT NULL,
  `SoNgaySDThuoc` varchar(20) NOT NULL,
  `DVT` varchar(50) NOT NULL,
  `SoLuong` varchar(20) NOT NULL,
  `CachDung` text NOT NULL,
  `Sang` varchar(10) NOT NULL,
  `Trua` varchar(10) NOT NULL,
  `Chieu` varchar(10) NOT NULL,
  `GiaBan` decimal(15,0) NOT NULL,
  `GhiChu` longtext NOT NULL,
  `CreateRecord` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap1_toathuoc_detail`
--

INSERT INTO `lap1_toathuoc_detail` (`IdDetail`, `IdDonThuoc`, `IdThuoc`, `SoNgaySDThuoc`, `DVT`, `SoLuong`, `CachDung`, `Sang`, `Trua`, `Chieu`, `GiaBan`, `GhiChu`, `CreateRecord`) VALUES
('1D249BF8-6616-C821-CD74-7DBD6521E396', 'TT2209290004', 'MT-0031', '20', 'Gói', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 15:01:30'),
('45609C83-7786-C07A-D151-93E545402BA5', 'TT2209290002', 'MT-0031', '20', 'Gói', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:38:30'),
('496A8521-5C33-F5F3-C63C-AF55A6F6F7E4', 'TT2209290004', 'MT-0017', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 15:01:30'),
('64BC6327-25B3-983D-C34E-F8B2DAAC5BB5', 'TT2209290004', 'MT-0021', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 15:01:30'),
('AE560648-BFAC-BC97-EAE1-5D4BEC460A40', 'TT2209290002', 'MT-0017', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:38:30'),
('AF6579E5-DD01-F9C9-E0AD-C364F78AE1FE', 'TT2209290001', 'MT-0002', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', 'Uống trước khi ăn', '2022-09-29 14:31:24'),
('C98A6249-D71A-4B8E-636E-EE57CF8D2133', 'TT2209290002', 'MT-0021', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:38:30'),
('CEF4A64F-6348-A9E2-9DFC-09AE47A39F48', 'TT2209290001', 'MT-0001', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', 'Không', '2022-09-29 14:31:23'),
('D80938EB-3D66-7579-61BA-7BA7DC38171A', 'TT2209290003', 'MT-0021', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:46:14'),
('DD4857A5-6098-9D83-FBE9-AAB7F3C1173D', 'TT2209290003', 'MT-0017', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:46:14'),
('E83DB3AA-3DC6-F07E-51AC-B4317349FBA2', 'TT2209290001', 'MT-0003', '20', 'Viên', '60', 'Uống', '1', '1', '1', '5000', 'Uống sau khi ăn', '2022-09-29 14:31:24'),
('FC67C504-4CAE-56C8-0C4E-9798FDD24288', 'TT2209290003', 'MT-0031', '20', 'Gói', '60', 'Uống', '1', '1', '1', '5000', '', '2022-09-29 14:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users`
--

CREATE TABLE `lap1_users` (
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
  `TokenReset` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users`
--

INSERT INTO `lap1_users` (`Id`, `Name`, `Username`, `Email`, `Password`, `KeyPassword`, `BOD`, `Status`, `Active`, `DateCreate`, `TokenReset`) VALUES
('78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin', 'admin', 'namdong921@gmail.com', '95add5183f17f35f2770ffd42d8746f8b8bc60ac', '78f8420e-3e33-11ec-ad78-0cc47acc8ffc', '1992-01-01', 0, 1, '1992-01-01 00:00:00', ''),
('00F04EBB-314F-1E44-9444-5C52892E16E4', 'Phan Thị Thúy Uyên', 'phanuyen', 'bsuyen115@gmail.com', 'd91325a84b1211cbf92b69d026bf3e5e0e3598f4', 'CAAE00F9-B43D-359C-A491-4F80B8B52F68', '2022-09-20', 0, 1, '2022-09-20 00:00:00', '797951'),
('903924AE-E5F0-9280-30B1-8B6D0748B611', 'Bác Sỹ', 'bacsy', 'bacsy@gmail.com', 'd504e61b86bb3a88fe3a1a99195c567663961b57', 'D163CAD2-8AF1-3676-721C-0CBC8AA69EEB', '2022-09-15', 0, 1, '2022-09-15 00:00:00', ''),
('3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'Quản Lý Kho', 'quanlykho', 'quanlykhoa@gmail.com', 'f64d1d480fcac2b29a028234e58a9bbc8e1b19b0', 'CFAE3D39-4DFE-7EE8-5D3C-D9E69DD21040', '2022-09-15', 0, 1, '2022-09-15 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users_baocao`
--

CREATE TABLE `lap1_users_baocao` (
  `Id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `IdUser` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Name` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `Content` longtext NOT NULL,
  `DateReport` date NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users_baocao`
--

INSERT INTO `lap1_users_baocao` (`Id`, `IdUser`, `Name`, `Content`, `DateReport`, `CreateDate`, `UpdateDate`, `Type`) VALUES
('1ca4dcec-64f5-4638-b277-a52a18bed792', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Báo Cáo: Ngày 2022-01-26 ', '&lt;p&gt;Traing deploy từ chỗ Long&lt;/p&gt;\r\n\r\n&lt;p&gt;Deploy c&amp;aacute;c trang cho Viện Tim TP.HCM&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a href=&quot;https://bakcovn.sharepoint.com/:w:/s/Project_VinTim/ET1QAhsAuptPuGKu75Zdvr4BU-LiJZ0BDbH5jMHc9zBdyQ?e=FBn8h1&quot;&gt;VienTim_Th&amp;ocirc;ng Tin Chung.docx&lt;/a&gt;&lt;/p&gt;', '2022-01-26', '2022-01-26 08:23:02', '2022-01-26 16:50:39', 1),
('57b189d2-bc8c-4f86-8c43-6a694204d505', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'Báo Cáo: Ngày 2022-01-21 ', '&lt;p&gt;B&amp;aacute;o c&amp;aacute;o ng&amp;agrave;y&amp;nbsp;&lt;/p&gt;', '2022-01-21', '2022-01-21 12:31:59', '2022-01-21 12:32:01', 1),
('57d2a229-df01-40fa-812a-f2b63545f7ac', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'Báo Cáo: Ngày 2022-01-22 ', '&lt;p&gt;Viết t&amp;agrave;i liệu kế hoạch viện tim&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Booking&lt;/li&gt;\r\n	&lt;li&gt;Quản l&amp;yacute; ph&amp;ograve;ng kh&amp;aacute;m&lt;/li&gt;\r\n	&lt;li&gt;&amp;nbsp;thanh to&amp;aacute;n&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Trước mắt sẽ viết t&amp;agrave;i liệu booking v&amp;agrave; quản l&amp;yacute; ph&amp;ograve;ng kh&amp;aacute;m phần booking sẽ triển khai trong tuần tới Khi v&amp;agrave;o một tuần trước tết. sau tết 1 tuần triển khai c&amp;aacute;c hạng mục quản l&amp;yacute; ph&amp;ograve;ng kh&amp;aacute;m&lt;/p&gt;', '2022-01-22', '2022-01-22 11:26:28', '2022-01-22 11:26:28', 1),
('8f4ff098-af2d-49d5-8deb-aa5d2a66249f', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'Báo Cáo: Ngày 2022-01-07 ', '&lt;p&gt;Tool điểm danh bằng QR code đ&amp;atilde; viết xong.&lt;/p&gt;\r\n\r\n&lt;p&gt;chuyển qua triển khai.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tool b&amp;aacute;o c&amp;aacute;o: tạo b&amp;aacute;o c&amp;aacute;o ng&amp;agrave;y đ&amp;atilde; xong&lt;/p&gt;', '2022-01-07', '2022-01-07 16:53:25', '2022-01-07 17:08:27', 1),
('d7ee9425-469e-4530-907a-af0394f9fd82', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Báo Cáo: Ngày 2022-04-27 ', '', '2022-04-27', '2022-04-27 08:30:44', '2022-04-27 08:30:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users_infor`
--

CREATE TABLE `lap1_users_infor` (
  `Id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `IdUser` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Keyword` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Val` text CHARACTER SET utf8 DEFAULT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `isDelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `lap1_users_infor`
--

INSERT INTO `lap1_users_infor` (`Id`, `IdUser`, `Keyword`, `Val`, `CreateDate`, `UpdateDate`, `isDelete`) VALUES
('f41131eb-fbe3-4236-bc97-becca32a344e', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Phone', '0123456789', '2022-01-05 00:16:50', '2022-09-13 13:04:30', 0),
('38af34dd-fd2a-434b-b0b1-626a311a8dd5', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'Phone', '0372779917', '2022-01-05 01:05:54', '2022-06-07 09:31:36', 0),
('5a761ea0-7bee-434d-80c6-36aefceb1d3d', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'CongTy', 'Bak', '2022-01-05 02:29:12', '2022-09-13 13:04:30', 0),
('c1a25c0b-bdc0-4d7b-9b5e-18a7caa860e5', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'HopDong', 'ChinhThuc', '2022-01-05 02:48:09', '2022-01-05 03:18:11', 0),
('68a5939f-c6fc-43bf-bf13-a0904005c7aa', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'GioiTinh', '1', '2022-01-05 02:56:21', '2022-09-13 13:04:30', 0),
('0f2f4a16-d7e0-4766-bb32-2be6f05fc7b7', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'CCCD', '067898745', '2022-01-05 02:57:44', '2022-09-13 13:04:30', 0),
('2e69c2ae-2a70-480c-8159-83c11f289988', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'NgayVaoLam', '2018-08-01', '2022-01-05 02:59:29', '2022-09-13 13:04:30', 0),
('c547ea58-565c-45cc-8406-4b33c82ba7d4', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'NgayNghiViec', '', '2022-01-05 03:01:11', '2022-01-05 03:18:11', 0),
('355a84c3-12d1-4cfd-b012-57003debeb81', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'SoHopDong', '12312312312', '2022-01-05 03:12:40', '2022-09-13 13:04:30', 0),
('cda54283-ee57-44a9-aac0-fe754680c8c0', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'ThoiHangHopDong', '1', '2022-01-05 03:12:40', '2022-09-13 13:04:30', 0),
('b7f3c9bf-f483-4eef-a4ab-1df858f2e6d9', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'NgayKyHopDong', '2022-01-01', '2022-01-05 03:12:40', '2022-09-13 13:04:30', 0),
('fed45495-0f11-496c-9420-b8345af2066d', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'TinhTrangHD', '1', '2022-01-05 03:17:59', '2022-09-13 13:04:30', 0),
('dabdf46f-8c25-456c-a186-3746429f904a', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'CCCD', '25184522', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('9793f698-8971-4bf9-bde1-ea3046a5da7f', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'NgayVaoLam', '2022-02-19', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('c2b7a3f0-acf9-4870-83bf-a1463cf09ed5', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'NgayNghiViec', '', '2022-01-05 07:26:15', '2022-01-05 07:28:06', 0),
('22fdb8b9-1bda-4bf9-ad13-20188b566b24', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'CongTy', 'Bak', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('6df0fca2-a936-46a2-9a30-28c982fdfb19', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'GioiTinh', '1', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('1a561c4f-5dc9-4878-9cdc-1575ed2bf77c', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'SoHopDong', '', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('dcf0ee99-913f-4edc-97b7-8678e76bf33b', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'ThoiHangHopDong', '2', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('2a509268-48d0-49bb-a669-7dc806299e68', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HopDong', 'ChinhThuc', '2022-01-05 07:26:15', '2022-01-06 14:10:31', 0),
('fe63adac-3819-4afa-855b-1b1c4e1fd6a3', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'TinhTrangHD', '1', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('48c6a713-2704-4901-bdf8-1e9d51a6e283', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'NgayKyHopDong', '2022-01-03', '2022-01-05 07:26:15', '2022-06-07 09:31:36', 0),
('737d8fdd-36cb-4d10-9799-98a6be27db05', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HoChieu', '', '2022-01-06 15:41:28', '2022-06-07 09:31:36', 0),
('828a8241-24cf-4d17-a062-b3f7ec6baff8', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'CMND', '245184522', '2022-01-06 15:41:28', '2022-06-07 09:31:36', 0),
('a2771da0-f58b-431c-a216-e64cc19beb45', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'HoChieu', 'Việt Nam', '2022-01-11 03:55:18', '2022-09-13 13:04:30', 0),
('a526a8a3-a81a-4565-a84f-ff368a3d9cff', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'HoChieu', 'a', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('e2bdb073-c188-4e40-b0b3-61594218843d', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'CCCD', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('9109d6d9-221e-4848-bfce-121b7366cfeb', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'CMND', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('18c307b4-dc0c-4d9c-bc54-e6978d0a7d34', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'Phone', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('f52a6994-4a55-47a0-a110-cfe0b872449f', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'NgayVaoLam', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('cd721a86-13a5-4ad3-88df-ead7ab2a910a', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'CongTy', 'Bak', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('a695a035-4fa8-4695-a314-24e3ec47a7a9', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'GioiTinh', '1', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('5a3feaaa-bf9a-464d-8c6e-2b20af4331d5', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'SoHopDong', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('a87089eb-e07e-4cf0-8cfc-ae348acd0b8f', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'ThoiHangHopDong', '1', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('31facbeb-c13e-4980-86c3-a9f0e07d1360', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'NgayKyHopDong', '', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('299691c0-5592-4ff0-8f03-b0f9bf62bad5', '57193062-abd5-4dc2-a0cc-013f510ff38d', 'TinhTrangHD', '1', '2022-01-11 03:55:50', '2022-01-11 04:00:23', 0),
('cd3d39ac-9e07-457f-b268-cfb1a9d957e9', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'CMND', '247859558', '2022-01-11 04:45:54', '2022-09-13 13:04:30', 0),
('34b261de-5d5a-4aac-9159-5c1877297333', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'HinhNhanVien', '/public/userfiles/0372779917/images/nguyenvando_300x405.png', '2022-01-11 04:57:41', '2022-06-07 09:31:36', 0),
('f123e2fc-664e-4e8c-a2a0-bd041448d0f4', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'HinhNhanVien', '', '2022-01-11 05:12:26', '2022-01-11 09:37:30', 0),
('8eda1379-7659-4544-8f05-7c7789be2975', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'HoChieu', '', '2022-01-11 05:12:26', '2022-01-11 09:37:30', 0),
('fb0ac6ed-d5d6-4106-a819-3844970419dc', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'CCCD', '', '2022-01-11 05:12:26', '2022-01-11 09:37:30', 0),
('ca753957-dc4d-4e7e-a6f6-2f0ab0821f3d', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'CMND', '', '2022-01-11 05:12:26', '2022-01-11 09:37:30', 0),
('4a6e5aeb-9fbd-48c3-bf1b-24c963e69c53', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'Phone', '0829998911', '2022-01-11 05:12:26', '2022-01-11 09:37:30', 0),
('62f370a8-0156-498e-a071-68ab471eef9b', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'NgayVaoLam', '', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('4f266faa-b104-482a-8883-7a006f647ffd', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'CongTy', 'Bak', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('cb18664f-b38e-437f-9be8-ff73d49dc7c8', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'GioiTinh', '1', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('d36b342c-7d87-4e1b-8369-20997be4447e', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'SoHopDong', '', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('7d002616-9776-4d23-b9c9-85bc654e84ae', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'ThoiHangHopDong', '1', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('478e5b4a-f6b6-447f-bd41-60a4132209e8', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'NgayKyHopDong', '', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('e18d7036-b29d-47b2-b46c-c0c152cb89b2', '72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'TinhTrangHD', '1', '2022-01-11 05:12:26', '2022-01-11 05:12:26', 0),
('ba60e9a5-706e-4e14-8bec-1937f630abc2', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'HinhNhanVien', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('bc0b237f-bf27-4b6f-bb36-085ec3fe80c4', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'HoChieu', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('4afee522-2aec-42f1-a00a-b8023eb159ed', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'CCCD', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('35432fcb-1b5f-4a56-ba0a-1aac5211e588', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'CMND', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('15453694-ca0e-4ef8-b9d2-71c7500bc948', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'Phone', '0987927033', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('caaa7faf-24f2-4a47-823a-4df2ef2e1210', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'NgayVaoLam', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('41b1794b-1afd-4c12-a049-595373410128', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'CongTy', 'Bak', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('19b9f290-b8fe-4866-b4c5-c9a03192126c', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'GioiTinh', '1', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('9097b3fc-76d7-45ad-a976-adfb134fa8e6', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'SoHopDong', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('044b5953-1a3a-4b42-a759-530624d29c51', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'ThoiHangHopDong', '1', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('8e0e5be1-57a1-48e7-a55e-fd55c5a04228', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'NgayKyHopDong', '', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('8d4ea532-d1ce-4671-855b-7921ccaae282', '8617047a-b6e8-4971-8c73-7872c7c69ff5', 'TinhTrangHD', '1', '2022-01-11 05:12:40', '2022-01-11 05:12:40', 0),
('dfa279df-9d66-41eb-87ca-2bde5c9a441c', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'HinhNhanVien', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('ae9376b5-63d8-483f-a080-e4661db216d0', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'HoChieu', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('8293d52f-fff2-420c-9d1e-fa19735d7863', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'CCCD', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('ef3b1fc5-afed-47d6-b205-d926ab633274', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'CMND', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('a09dc53f-2e7a-4480-93cd-7c340ada43e0', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'Phone', '0706567579', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('858b0a35-a680-4db4-ad3c-1b6be875cc39', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'NgayVaoLam', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('69c4a6d5-3a5d-45e0-bd5b-3aba4377f3a3', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'CongTy', 'Bak', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('562952e5-5ec1-4a83-8212-a9c987ed1823', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'GioiTinh', '1', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('00010b51-2d32-4fd8-84b3-fb6203ce56e2', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'SoHopDong', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('bd62eec7-6c56-45d9-b70a-12cd96343c33', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'ThoiHangHopDong', '1', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('c236dcf9-529f-406b-a5b6-77cc5debb077', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'NgayKyHopDong', '', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('449588c0-6ea7-4264-993f-76f172a35cdb', '4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'TinhTrangHD', '1', '2022-01-11 05:12:52', '2022-01-11 05:12:52', 0),
('67272e93-e77b-4611-a64d-1ae50b7c6249', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'HinhNhanVien', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('4ac96acb-258e-452e-9a8c-cd90f1485bac', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'HoChieu', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('9542e6c5-e5d1-44be-a18b-c91c6a55b9bc', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'CCCD', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('e2cb5b78-3b32-4bc5-bbb3-c9c45dfecddc', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'CMND', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('826105d8-2a92-42ad-ad99-1419a44286a9', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'Phone', '0901418499', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('21a19199-73c6-418e-bb12-76361ef05e7f', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'NgayVaoLam', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('78f6ef69-f71e-4a8d-869f-f292929f1307', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'CongTy', 'Bak', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('d9bd06b5-b3a2-4b48-ae7e-02aa9058df60', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'GioiTinh', '1', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('fead1bbc-c9a3-4636-8084-4b25cb33135f', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'SoHopDong', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('3b744a49-4a40-4504-81b8-f6bc153b8b91', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'ThoiHangHopDong', '1', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('ce262fef-f74c-4018-b090-afd34dae5b16', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'NgayKyHopDong', '', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('67cd56b7-4aa9-4fe1-b8ae-69554b4a9191', 'f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'TinhTrangHD', '1', '2022-01-11 05:13:02', '2022-01-11 05:13:02', 0),
('f1f6451b-b0c1-4e2b-a34e-df485c119a00', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'HinhNhanVien', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('dc835b53-cd11-44d8-a7cd-bc963f3e9da7', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'HoChieu', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('5eebaac4-d3c1-41b2-9526-acc3b7d5696f', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'CCCD', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('c6b9f49a-f2c0-42ef-b8d1-3993399e0d9b', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'CMND', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('3fecb528-debd-4699-b54d-8e3f69c1ce5d', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'Phone', '0975569149', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('403c47d9-eee1-4b7e-8678-12e17ce2225a', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'NgayVaoLam', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('f985e89c-9554-4de9-bbfd-8a9c44f71506', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'CongTy', 'Bak', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('d605e8e8-f6ac-47c4-adbd-7372c7d46b58', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'GioiTinh', '1', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('190ba6c1-0558-4a5b-ac93-6ff9f0082c57', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'SoHopDong', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('86016cf4-763b-4cee-825c-ebbed338d772', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'ThoiHangHopDong', '1', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('cb0d62ed-5ef5-4014-bf0f-0dd185ae9784', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'NgayKyHopDong', '', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('ba30b1f8-fd10-4d24-8e81-938b43ce8ac6', '3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'TinhTrangHD', '1', '2022-01-11 05:13:16', '2022-01-11 05:13:16', 0),
('29c7fb4c-08c6-496d-9e4a-b099d78f9bd3', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'HinhNhanVien', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('5ff96fee-5617-4aa9-9061-0a57ac5a70a0', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'HoChieu', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('c5071b67-c1c2-4746-92c5-6f11f3a7cd68', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'CCCD', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('0a20aea0-b658-4bb9-95f6-530ea258a945', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'CMND', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('92c8e10f-733b-4f36-9c48-8cd1a4c746be', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'Phone', '0946706143', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('323935ec-65d3-42b2-a4f6-9221078426ce', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'NgayVaoLam', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('c690b885-44c7-4f1e-a9e8-601a10950407', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'CongTy', 'Bak', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('5a46ec79-0f09-4bee-a66b-0c3bb7ebe80d', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'GioiTinh', '1', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('3bf14843-b2cd-49ef-a869-3223b71025c2', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'SoHopDong', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('fdd932e3-0828-4e8b-b050-4e45a3ace63d', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'ThoiHangHopDong', '1', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('ce8871d9-6401-4056-99b8-30b758f07004', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'NgayKyHopDong', '', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('6375a710-8ca0-47a3-a84f-94a4891d9e3d', 'c297b68c-fafa-4c39-95b6-02777c96874f', 'TinhTrangHD', '1', '2022-01-11 05:13:29', '2022-01-11 05:13:29', 0),
('2374ee3f-5346-4dc9-9bbf-f90c42014ffa', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'HinhNhanVien', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('11b657fc-71c5-4104-b85b-cc1f7f30c7d5', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'HoChieu', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('b94c9473-d885-402e-ab29-fcb547a061fa', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'CCCD', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('ae444095-5815-4467-994f-05a8d409dce2', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'CMND', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('98843293-19f6-46af-b9d3-d543d9a23ca1', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'Phone', '0988108342', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('85a26a2c-641d-4c83-87fd-bd5c1a7e1fec', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'NgayVaoLam', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('74e6f9b6-1a4f-4e21-83a4-9b72f178ab29', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'CongTy', 'Bak', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('db925802-60a9-4bd3-b803-0f4a8b417bf7', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'GioiTinh', '1', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('2a083125-de58-4916-a7c1-00134854e8d3', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'SoHopDong', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('ddafc5c1-db10-4554-a17b-252df927eddf', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'ThoiHangHopDong', '1', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('200df178-b67a-4f11-96c0-6bd6e6724cf1', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'NgayKyHopDong', '', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('1ac1ec19-a604-4a73-9518-f8d688c3b4f2', '06186c8d-1386-4b72-b15d-22b1403f11ef', 'TinhTrangHD', '1', '2022-01-11 05:13:50', '2022-01-11 05:13:50', 0),
('19274b32-60b9-4569-9e9c-964cfc48cb53', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'HinhNhanVien', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('8d36c09f-fd76-472d-8866-c7008168e11c', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'HoChieu', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('442077bb-6c4b-407e-ba0a-0e190825b84e', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'CCCD', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('7985ef87-df92-47cf-99ee-8569f781e22b', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'CMND', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('0bd43b05-3d66-45ef-b6bf-0de56c54dab7', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'Phone', '0793772747', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('ea8d8d1d-b3c9-4bb4-91fb-aee009c458b7', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'NgayVaoLam', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('d9d44ed8-d1c4-4caf-a0e7-070ea2b63a86', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'CongTy', 'Bak', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('4d55c3b7-4143-4f98-9e10-d28a5073101b', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'GioiTinh', '1', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('9767082d-b2ec-48f7-8812-07eb2aa9c5bb', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'SoHopDong', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('241deec0-1e57-4ef6-94eb-8f49718b23a3', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'ThoiHangHopDong', '1', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('19bedeea-28ce-4743-9b9c-608fb995cbfc', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'NgayKyHopDong', '', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('3fbed94e-a8b2-41cb-ad91-3441115c3acf', 'dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'TinhTrangHD', '1', '2022-01-11 05:14:21', '2022-01-11 05:14:21', 0),
('149d2c55-2abc-4a4a-9b30-6ee7db48d8c6', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'HinhNhanVien', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('4de3568b-7f97-46eb-a2cf-87352c3958b5', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'HoChieu', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('7172332b-46c4-4d39-b4bd-d4d8735a4e7c', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'CCCD', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('24f5b352-1355-4740-a36a-b12836a75124', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'CMND', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('d59bc3d7-3cc0-47b0-8826-fb8e8a9a64c4', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'Phone', '0377692378', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('cf73b435-f4b5-410f-9466-9374957c75eb', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'NgayVaoLam', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('1af963c0-5fd4-43e4-bf7e-18de3c8f0ace', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'CongTy', 'Bak', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('dea93fa8-0b9d-4eab-ad62-84c6f2f5e469', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'GioiTinh', '1', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('1ed0f344-159a-415c-96ac-10418b0e2435', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'SoHopDong', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('81096e1a-9a72-41e0-ab89-682093071e3d', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'ThoiHangHopDong', '1', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('6e94b824-ac45-419c-a164-e693780853b0', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'NgayKyHopDong', '', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('3779376f-dae1-4aa6-8588-b3d58278e17b', '8bbf2408-7654-49a6-aa98-c163247a4ad5', 'TinhTrangHD', '1', '2022-01-11 05:14:27', '2022-01-11 05:14:27', 0),
('fa3a0911-bf7d-4448-a49a-42868f8bbe61', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'HinhNhanVien', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('a6017104-1987-4815-bb8a-1a7beb1883bf', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'HoChieu', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('8cae3156-5d9c-4b6d-ad13-8f20be7a4f9a', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'CCCD', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('79a8c32a-edc8-423a-8b9a-7b17bc60dec7', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'CMND', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('55c22200-d7af-4d48-9516-b96bff81b212', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'Phone', '0902869475', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('aa45f080-281e-48c0-8e0e-31e8cb105d68', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'NgayVaoLam', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('62fd5e7f-2649-4d83-90f3-ad514dfdb94f', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'CongTy', 'Bak', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('3991adcc-a0a1-4704-a711-f2e0d9bcbe51', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'GioiTinh', '1', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('243c5d1d-2a45-4aa2-a5b0-a9cfd16876eb', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'SoHopDong', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('103910c9-b128-429a-9084-8d3588e3ffe0', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'ThoiHangHopDong', '1', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('70eb5e63-4cfc-4d2d-b142-649af4664115', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'NgayKyHopDong', '', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('4b314065-1c36-46e8-8d11-1248ae75b367', 'b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'TinhTrangHD', '1', '2022-01-11 05:14:36', '2022-01-11 05:14:36', 0),
('6d2a0707-4893-40ff-aa72-660f079cbe96', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'HinhNhanVien', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('c9e2b945-d188-431c-ad13-d3d9fc3ba1b3', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'HoChieu', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('34067dae-7f13-4ec6-b577-baacdecab02d', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'CCCD', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('a649ed34-a888-4a84-bdbf-9305680a49ab', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'CMND', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('54a5d07c-a35e-406c-b169-28d0d521d622', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'Phone', '0332450207', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('e0643033-6520-4c48-9cf7-b6f9d115cbb0', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'NgayVaoLam', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('29e2eb9d-1fab-4a58-bc89-5524c10f9faf', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'CongTy', 'Bak', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('20097b6e-ddee-43cc-b1a2-de2ef3201ad2', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'GioiTinh', '1', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('171dcfe9-7e75-41a0-ad17-c6c308344bb1', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'SoHopDong', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('7aa10388-8229-4d99-b605-7ffd13762642', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'ThoiHangHopDong', '1', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('f0ff16f0-a05e-4983-b08f-23bdc3ace480', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'NgayKyHopDong', '', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('f06ff0c1-8547-4575-b7c5-c70898a243e0', 'f1e89b1d-3a63-4500-a20e-837698a9f58d', 'TinhTrangHD', '1', '2022-01-11 05:14:43', '2022-01-11 05:14:43', 0),
('c9220861-aabe-4640-85c0-904c899ee6c6', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'HinhNhanVien', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('6240bee2-e915-462d-9308-462d274ffe7c', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'HoChieu', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('9ff54986-5c3b-45c3-87f1-d8379f131221', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'CCCD', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('5ef461d1-45d4-47bf-947b-0247b3d19987', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'CMND', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('d18419b6-7c03-4aee-9fca-994289888315', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'Phone', '0326261307', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('fcf49387-5c23-4150-8dc3-41fb39cd3c7a', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'NgayVaoLam', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('0970da5c-5cdc-49a5-915b-085ec4e8ab49', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'CongTy', 'Bak', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('df2e4c0b-568c-40fa-889b-2df93bb5baa0', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'GioiTinh', '1', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('340e0783-c9cf-48ef-95f3-09594f695a69', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'SoHopDong', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('d25b28a7-9514-4854-863e-846ae0b94a58', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'ThoiHangHopDong', '1', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('1f3830f7-ff0d-4084-82b8-9b3c9a04a664', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'NgayKyHopDong', '', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('7dd5c264-db05-47d0-9747-f825f22d316c', 'ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'TinhTrangHD', '1', '2022-01-11 05:14:50', '2022-01-11 05:14:50', 0),
('d292059e-6012-4514-b5df-ab9352f9aa60', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'HinhNhanVien', '', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('cac65d7b-ee05-45f3-aae6-11ed97efc4f0', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'HoChieu', '', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('ad83e00c-8e36-486c-85f1-677d22bc40c1', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'CCCD', '', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('c7a45c76-37d9-4fdd-95ee-87097918a12b', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'CMND', '', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('9dea8bf5-db6f-4ec4-857f-c3f2972cfece', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'Phone', '0844440999', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('12b4f7a4-bc83-4a0f-a4ed-7d54938d2e2e', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'NgayVaoLam', '', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('b32f287a-fb9e-4318-a99c-aed94be5b1df', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'CongTy', 'Bak', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('b6e62556-52f0-4e93-b6b2-e728ba76604a', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'GioiTinh', '1', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('47cd5736-9135-4fcb-b0e4-8140da752809', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'SoHopDong', '147856932', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('a6c1f247-2d63-423e-bc1c-01470c1bacd1', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'ThoiHangHopDong', '2', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('798cc49a-4d29-4a31-8ad0-55a7aeed4666', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'NgayKyHopDong', '2022-01-01', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('4c19b36b-700c-493b-8e03-76435402bc46', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'TinhTrangHD', '1', '2022-01-11 05:14:59', '2022-01-11 07:54:33', 0),
('abc11c04-c462-41b8-974d-a03c54f4f67f', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'HinhNhanVien', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('791fa201-3dbf-4c44-aa41-103a411d748e', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'HoChieu', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('2fa4375f-4ea6-4ba0-97d6-52a08a3c468e', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'CCCD', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('cf98b323-116d-49a9-8e0e-db17781e735f', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'CMND', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('9422b325-ab78-4081-a853-57be4de378b1', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'Phone', '0935992326', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('e6054025-aa85-417f-898e-f88bc3587a1e', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'NgayVaoLam', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('0874076a-0ee9-4a11-995c-059000e31460', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'CongTy', 'Bak', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('db7526c5-fa28-4b2b-8761-9c15e55bf210', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'GioiTinh', '1', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('40f7513a-3333-4c06-8718-809c37ebb09e', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'SoHopDong', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('a4c7f467-4f51-4da7-a418-de5781d23e47', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'ThoiHangHopDong', '1', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('d590c535-17d9-488c-afed-9bdf907e2b68', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'NgayKyHopDong', '', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('b41b8f2b-ae29-4138-9404-c90964aa30ee', 'b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'TinhTrangHD', '1', '2022-01-11 05:15:14', '2022-01-11 05:15:14', 0),
('ff9f59a7-7e25-48e3-a4ef-c5f9aa7044a0', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'HinhNhanVien', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('3a7096fc-6a2f-4099-b27a-d5e64a155efd', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'HoChieu', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('2e222395-fa22-441a-ba51-4ba166564a85', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'CCCD', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('2ae87abc-b682-4b53-80ae-8a952083aac0', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'CMND', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('3c9d518d-7089-4dc7-807c-8ea0f4f30340', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'Phone', '0775476374', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('8aeb6132-4d92-466b-a7cf-525cc3992ec6', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'NgayVaoLam', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('872f06b3-0098-46c7-ae58-147b319a5bfc', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'CongTy', 'Bak', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('54bb2bd5-e51a-451a-9887-04b32e7b76cc', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'GioiTinh', '1', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('99026ed1-e719-4c81-8a34-1e7c6e31b82b', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'SoHopDong', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('0c8cc603-12bf-4b73-864f-604a1ce8cfe9', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'ThoiHangHopDong', '1', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('e161ca0b-19b1-4552-b644-e06113d71d59', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'NgayKyHopDong', '', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('19f6bb4c-f070-4fdc-bf88-318126708c0d', 'cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'TinhTrangHD', '1', '2022-01-11 05:15:22', '2022-01-11 05:15:22', 0),
('dd3de6c2-2972-486c-b642-316270659aac', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'HinhNhanVien', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('db8e14a2-cc95-4f69-8952-5ca825c6e386', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'HoChieu', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('af1775d2-92de-4b87-8724-a200f0834636', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'CCCD', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('9f22558f-9937-45ec-98ac-573be157db4f', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'CMND', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('dd6c33a1-0998-4c34-94d9-1387c3c2e3e1', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'Phone', '0909193923', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('4f990ca8-cc15-4b7d-b859-203a9971ce1e', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'NgayVaoLam', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('c79579fb-7139-4b17-86e2-185406aff312', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'CongTy', 'Bak', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('ec32f380-820b-461d-bda0-ece7e403a04f', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'GioiTinh', '1', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('8edbcdb1-0269-44dc-91f2-385088980c80', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'SoHopDong', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('f9105039-3427-49d0-9536-0d14faaaf051', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'ThoiHangHopDong', '1', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('1475194f-f694-4de9-a879-936841c6d03e', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'NgayKyHopDong', '', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('85e5766e-c26a-48d9-bc9c-10178a5d2bf1', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'TinhTrangHD', '1', '2022-01-11 05:15:41', '2022-01-11 09:27:20', 0),
('362cb2fc-460f-4416-b7a9-9c0b628fe6df', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'HinhNhanVien', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('d628e0fd-efec-42f0-a5ba-d9107d8a16d6', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'HoChieu', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('bb8edb6c-1968-45e4-9543-66c348732d5a', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'CCCD', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('d15a9bef-c355-4a4f-b8aa-fa2321f0a758', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'CMND', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('2d647b37-9398-4166-a832-4b5e7e40f333', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'Phone', '0972101144', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('d2dbc071-da12-4280-8dcf-6b398c877a0e', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'NgayVaoLam', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('28049445-8944-42ed-9aff-9149a75e7295', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'CongTy', 'Bak', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('e69e3c1d-7f5b-4d47-a475-5546319aee33', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'GioiTinh', '1', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('8c6acdc1-5afe-4a56-be06-d61d3e431965', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'SoHopDong', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('f3fb6220-c1a5-4371-a6c3-de877e3fd7f9', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'ThoiHangHopDong', '1', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('678d1ce0-e7bd-44de-b2c5-8f9bbf7c2a15', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'NgayKyHopDong', '', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('e08f6881-3194-4578-8425-df7bd8021bb6', '3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'TinhTrangHD', '1', '2022-01-11 05:15:58', '2022-01-11 05:15:58', 0),
('1adba935-e740-4565-9bbe-1836b857028e', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'HinhNhanVien', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('d5b9803c-e298-44b7-a229-5d70540d840e', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'HoChieu', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('62a21de0-f8e7-424a-8ed4-202a3b00a544', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'CCCD', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('ae3e7546-75f9-49b6-9ba9-78dd6817178e', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'CMND', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('2337738c-057d-4857-a9d6-5f653b5ec529', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'Phone', '0973389133', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('8d96c0a7-c7b6-4cbf-afed-8fdea485b783', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'NgayVaoLam', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('5ffefd76-68a5-469f-bcd3-dc65c82fa957', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'CongTy', 'Bak', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('8f608010-5427-476c-ab20-07c08327729c', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'GioiTinh', '1', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('fe1bdd1c-017c-4a5d-9bae-422d0f3db0e2', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'SoHopDong', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('eba26216-620e-4e3b-a6a7-32cb676913e6', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'ThoiHangHopDong', '1', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('04ff72f3-eba5-45c7-bae1-8e2f28bb4f07', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'NgayKyHopDong', '', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('4e1ff8be-224e-4451-9696-e0608f23c62b', 'ddd63811-d993-4e1e-a0f7-61150c00245b', 'TinhTrangHD', '1', '2022-01-11 05:16:12', '2022-01-11 05:16:12', 0),
('cd7e5eeb-5cae-4fff-8c2c-4a9c815c8f5a', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'HinhNhanVien', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('bca1ec0a-aa01-4c92-aeaa-38c49cfa6d86', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'HoChieu', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('6c8888c3-7c41-4730-b1b9-29b943d069e8', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'CCCD', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('269149c2-e3e7-4d33-91c3-edea170fab38', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'CMND', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('9a35a98c-9a71-4b33-8e68-e2181b9d736d', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'Phone', '0979397790', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('2f6dd966-b4ca-4ca3-b59b-bdd357f4cda3', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'NgayVaoLam', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('7da3eff7-b7d6-4273-936f-3410688e48aa', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'CongTy', 'Bak', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('859a0620-06b3-4bcb-a626-8cf482b9ceab', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'GioiTinh', '1', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('756f5df1-daf5-47b1-8be9-869c6f8f9d26', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'SoHopDong', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('be8ba1c9-04e1-40c6-9e25-b49e1500a6cb', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'ThoiHangHopDong', '1', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('66c6d1a9-27ae-4091-860e-5922049ff14b', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'NgayKyHopDong', '', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('bb1e9dd8-a96f-4ce1-bca5-3204a33dd75c', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'TinhTrangHD', '1', '2022-01-11 05:16:28', '2022-01-12 07:21:28', 0),
('c1fe0b90-2592-4c73-9922-c8d3adaeccf5', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'HinhNhanVien', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('2db5c170-6976-44da-82ec-ab36b2def62e', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'HoChieu', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('025a2dc5-8587-4eb3-989d-8423ce8d88ae', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'CCCD', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('71a4df2b-1000-453d-b87c-cfbed9ad0cdf', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'CMND', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('e176cf05-03b6-4b26-ba4e-f1a7890631f6', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'Phone', '0933976511', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('743dab45-1e7d-4cce-827e-3fc32ce78074', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'NgayVaoLam', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('7e782030-df6f-4e8e-9713-4932a1d8c9a1', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'CongTy', 'Bak', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('16ce9627-b58f-4929-a430-fa57ddc554e7', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'GioiTinh', '1', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('ba5509a3-540e-4b35-8b2e-0163bad24109', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'SoHopDong', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('19293185-5f08-4cb9-b649-e9b547acca5f', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'ThoiHangHopDong', '1', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('be1d6048-ebd7-453d-a34f-14b63bdaaec0', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'NgayKyHopDong', '', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('8e5f9771-5b65-489d-8327-2de87131001e', '82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'TinhTrangHD', '1', '2022-01-11 05:16:47', '2022-01-11 05:16:47', 0),
('d7037411-9e5e-4c96-810b-43348a9a129a', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'HinhNhanVien', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('3f4bece7-6253-4f29-90bb-e36e6dc46ff1', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'HoChieu', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('bdf9d46d-82fc-4200-9ac4-31eecfc38f32', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'CCCD', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('1e83b7af-a0be-4d29-95fb-424b7a772254', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'CMND', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('6ee540d0-04e5-493b-9fc4-75134723c53f', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'Phone', '0961370519', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('9e3b0ca1-97c9-42ca-a41b-cf60d33477c2', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'NgayVaoLam', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('9e791dd1-327a-422a-a4e5-61ab2af3c4c0', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'CongTy', 'Bak', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('c43ab5c6-dcf2-4bbf-9520-6afe882e35bd', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'GioiTinh', '1', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('c952645c-ef5d-4032-b226-ba2f0cf4a39c', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'SoHopDong', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('5123ba98-1355-410e-8c2e-9e21898621a5', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'ThoiHangHopDong', '1', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('274c7e15-c30e-487e-ae65-edadf77a71ef', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'NgayKyHopDong', '', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('bbfa9423-a031-4e9e-91ce-30ef5d2e8074', 'd57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'TinhTrangHD', '1', '2022-01-11 05:16:54', '2022-01-11 05:16:54', 0),
('e86bb516-99e1-44e5-aed3-378dddf071bd', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'MaNhanVien', '6666666', '2022-01-11 07:53:33', '2022-06-07 09:31:36', 0),
('6eccc2ca-955b-4ff8-a3b6-82c8640f96de', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'MaNhanVien', '', '2022-01-11 07:54:24', '2022-01-11 07:54:33', 0),
('db29dd5a-56dd-4b28-a0ed-067ddfb325e9', 'bcc18499-5a6c-41b9-80c9-57865041b3e4', 'MaNhanVien', '', '2022-01-11 09:27:20', '2022-01-11 09:27:20', 0),
('2a08a346-e832-4f0f-808a-ca818d5f47f1', '0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'MaNhanVien', '', '2022-01-12 07:21:14', '2022-01-12 07:21:28', 0),
('448e4376-0047-4532-baee-ce6e35a4f842', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'HinhNhanVien', '/public/userfiles/admin/images/2009202042.jpg', '2022-04-27 08:26:51', '2022-09-13 13:04:30', 0),
('44065390-6234-4ace-b43d-333b52625acb', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'MaNhanVien', '123456', '2022-04-27 08:26:51', '2022-09-13 13:04:30', 0),
('156bc8aa-ca65-4639-b485-9e9d27e79907', '2076d431-95f1-4c1a-9d29-129757967c68', 'HinhNhanVien', '/public/userfiles/teonguyen/files/13%20s%E1%BB%ADa.jpg', '2022-08-23 06:23:35', '2022-08-23 06:23:35', 0),
('7da7b620-60e1-409b-b8f3-6f57255adbc9', '2076d431-95f1-4c1a-9d29-129757967c68', 'HoChieu', '', '2022-08-23 06:23:35', '2022-08-23 06:23:35', 0),
('840bdac9-6881-4a18-ba90-026c22499f71', '2076d431-95f1-4c1a-9d29-129757967c68', 'CCCD', '', '2022-08-23 06:23:35', '2022-08-23 06:23:35', 0),
('d0715f67-2b95-410a-9bca-cd570e2a6998', '2076d431-95f1-4c1a-9d29-129757967c68', 'CMND', '', '2022-08-23 06:23:35', '2022-08-23 06:23:35', 0),
('2e4a72bc-602a-4e2d-9d54-804faad56f16', '2076d431-95f1-4c1a-9d29-129757967c68', 'Phone', '', '2022-08-23 06:23:35', '2022-08-23 06:23:35', 0),
('3B02CBC2-666B-C278-D591-99C2B3B57897', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'HinhNhanVien', '', '2022-09-15 21:22:39', '2022-09-15 21:22:39', 0),
('16CC31C8-EF24-7F6F-79C0-0728D7668ACE', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'HoChieu', '', '2022-09-15 21:22:39', '2022-09-15 21:22:39', 0),
('5792036E-7843-A60D-2112-2D515EC09480', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'CCCD', '', '2022-09-15 21:22:39', '2022-09-15 21:22:39', 0),
('9FA78551-70E0-7E36-86C9-A974BA44DF52', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'CMND', '', '2022-09-15 21:22:39', '2022-09-15 21:22:39', 0),
('C708934A-0464-173D-578D-D35B9D2B5017', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'Phone', '', '2022-09-15 21:22:39', '2022-09-15 21:22:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lap1_users_role`
--

CREATE TABLE `lap1_users_role` (
  `Id` varchar(50) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `RoleId` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lap1_users_role`
--

INSERT INTO `lap1_users_role` (`Id`, `UserId`, `RoleId`) VALUES
('7C450378-97CB-9A81-A093-C9C9778523A0', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Phieu_Detail'),
('026F6995-9709-976C-A6AC-CC0B04F95465', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QuanLy'),
('f8382573-cc6f-478e-9ccf-21722dce0e6b', 'a585dec5-9ded-47f4-bd78-33055d8c30de', 'Admin'),
('8f9d11af-b40b-4447-ae94-74d04dfd3391', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'NhanVienView'),
('6961f8b9-70e5-4af6-aa75-a5dbfe716f2d', '4ef540ca-44a9-4a06-88a3-da4da8212613', 'NhanVienSua'),
('4692f847-70df-4078-9382-3083353a53da', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'NhanVienSua'),
('58a970a3-9087-491c-8ff5-a1eff4f6fae3', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'NhanVienView'),
('25560f54-3c3e-46bb-b122-43038e8400b9', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'QuanLyNhanSu'),
('267129ab-56a6-456c-8201-c01a4d13264d', '5ea593f0-861c-4f5f-81d7-233536e892bb', 'NhanVienPost'),
('ebb02a88-8c8a-4a59-b178-f66286d32ccd', '2076d431-95f1-4c1a-9d29-129757967c68', 'QuanLyToaThuoc'),
('721E1AFC-F11B-3717-7936-1B4ACD7389CA', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin'),
('A35E7E85-FF58-B087-BB3A-A7CAD7502C24', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Detail'),
('09FA4D00-BEA7-513F-659C-626CD201B771', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_DS'),
('6E5A723B-AB75-7FD5-11FD-871BEA174F17', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_DonThuoc_Put'),
('006638B7-E133-32D4-1081-75840BF4467E', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_DonThuoc_Copy'),
('CB37D80A-0DFF-FABC-A7DF-2542CB58A98F', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Phieu_Delete'),
('B65E5EC6-2124-531F-6F8C-972FB126E9AB', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Phieu_Put'),
('5CDCE923-EE0E-F00F-0D16-1D032A1F0E91', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Phieu_Post'),
('2978DD21-9747-B69C-A4A7-BA4B0114F92F', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Phieu_DS'),
('256FB89F-2B17-6F8D-B7B5-8A3A70CB5D7C', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_DanhMuc_Delete'),
('433E328F-273B-0323-4892-2C1F8F4791B6', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_DanhMuc_Put'),
('109CD119-D0CF-312C-7BFC-65ED8ED3038F', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_DanhMuc_Post'),
('9C346FCC-CB92-2C52-1376-0AC1C4E68E49', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_DanhMuc_DS'),
('2C2D3D8E-819E-09DE-5320-B3FF5DD14293', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_Import'),
('86DEEB24-F3F5-5642-61F1-83933057C454', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_Export'),
('BFACECF8-7C38-5E5A-3CBB-4DB3FE330359', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_Delete'),
('66C31E61-7498-78A8-2361-53A273BD72AE', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_Put'),
('4627B40C-B348-CCDE-636B-6BB0F92CF437', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_Post'),
('CB0D4C87-0A68-BF62-668A-A7B5DC95CFA3', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_Thuoc_DS'),
('56CA6864-4C79-E7AB-7ABE-1515DF5981B1', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_BenhNhan_Delete'),
('D536CBAF-554A-B0CE-D64A-90CD22B89780', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_BenhNhan_Put'),
('1C893E82-8256-A381-FD69-7730FA87F3AF', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_BenhNhan_Post'),
('1BA77DDC-06F3-1683-C2F4-4F68AF97649E', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_BenhNhan_Detail'),
('EE198635-C9A3-46FC-F39E-30FA01E98469', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QLT_BenhNhan_View'),
('6AF87113-29FA-3C0D-5601-F614968E674C', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_DonThuoc_Detail'),
('5291D69D-ABA3-05C5-FF2F-7EA57282204A', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Post'),
('75B08F62-56F3-A510-7DDD-EBDD8FDE5530', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Put'),
('7F1F7B4A-884D-CDF9-B7AE-4A8B34ABD817', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Delete'),
('40B7E45C-A449-BDF3-F69E-3B45AB87A7B6', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Export'),
('36EFA959-F11F-5D0C-D28D-AD7B6805A0C4', 'bfce475f-1f3b-4de0-8d26-4f1e168eac36', 'QLT_Thuoc_Import'),
('27755C77-0264-DDB6-0149-32D8495FA238', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Detail'),
('27B624A8-B4E5-F3B6-6A95-813FA01E834E', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Copy'),
('2152A0C9-FD39-ADC6-DB7A-5800D6D5B4E0', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Export'),
('0FF6145B-C231-50DC-270B-949CD3378DB2', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Delete'),
('FE82467D-4141-ABEB-2D71-DD018F60AD01', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Put'),
('B543C911-1EA5-EEED-3380-CEB9D7936066', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_Post'),
('29DB1094-C677-8DB6-B275-F2CED109E2D5', '903924AE-E5F0-9280-30B1-8B6D0748B611', 'QLT_DonThuoc_DS'),
('CBB6C21D-5675-9DCA-B991-F3CF7C1A066D', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Phieu_Detail'),
('C47392BF-F2AF-B75B-B1C2-52520B773EE1', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Phieu_Delete'),
('B564B0BD-DF91-1F90-48B1-D7496DFEC176', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Phieu_Put'),
('F4DC7CD1-5734-146E-BFD1-65EE73A961AB', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Phieu_Post'),
('EC4BCF03-EF30-EF58-371F-881230A6620E', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Phieu_DS'),
('3C9875C4-669E-23E8-DF3A-5A893E94E915', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_DanhMuc_Delete'),
('E3E38919-7039-C72A-C477-783623AA7BD3', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_DanhMuc_Put'),
('531DD8C1-D8DE-485B-E9E7-8631D4D44799', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_DanhMuc_Post'),
('9CBBBB78-5C76-3160-CD97-B933D5B405C8', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_DanhMuc_DS'),
('DE152D42-599C-6821-4BBE-F5D95A0B2C85', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Import'),
('630763A9-614E-39E8-04B8-0CF68D1944E1', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Export'),
('A4AB66CF-1D8C-C265-73A7-4ACE8C8F6A91', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Delete'),
('18318221-0487-824B-3402-D48A4507F47F', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Put'),
('F72410AF-147A-E00A-30C5-0E0E42718FD8', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Post'),
('C3CC2DD1-4854-9C07-79D5-48F799358A6E', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_DS'),
('9031353B-7608-79BA-23D7-29CA089BACDA', '3C99AF7A-C58F-FDB0-0841-F7F30FC4F9AC', 'QLT_Thuoc_Detail'),
('F739452F-D18C-0E45-3B96-CA3EF4F26FC2', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'Admin'),
('AD07D3B5-3D85-9947-B500-B0BCC840784A', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QuanLy'),
('2ED31E5C-B1C3-6691-C16B-F6117A5A0D43', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_DS'),
('889F69CA-B359-7374-7BCC-A7C60F2B6D03', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Phieu_Detail'),
('B5AEAF4D-2733-12F7-6172-B83D0AB3DE09', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Phieu_Delete'),
('AD5AC647-8A7A-7751-439E-7FDAAF4E0DF7', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Phieu_Put'),
('200B4EBF-2AE2-DAF5-39A7-51D2475C9A32', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Phieu_Post'),
('E2222425-2C30-6179-F952-AABA949327A7', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Phieu_DS'),
('470AAECB-39A6-142A-6173-0FA21F8C1F12', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DanhMuc_Delete'),
('4A2A48B7-983E-5F64-052B-EE2114B646CA', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DanhMuc_Put'),
('A31A4937-E87B-5329-7C41-EEC2330F233E', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DanhMuc_Post'),
('20878A46-1BA5-38F7-9ADA-93B631D3F8DB', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DanhMuc_DS'),
('C250C0EC-8389-3AD8-F8CC-FD3A07DF5DB2', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Import'),
('A5F71F55-E2F2-F56C-F8FF-B77103063C11', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Export'),
('D1E6A46C-BE7B-40D4-1A1E-98F62111A81B', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Delete'),
('E695D4E1-15C2-A619-924E-D7FA81CA3CCF', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Put'),
('7CE6525A-9A70-4032-C4B9-5CE0AC9C990F', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Post'),
('DDD40B77-16D7-1B67-3789-64CF41082522', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_DS'),
('571066BB-6E89-4F56-4233-CF3473C9A344', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_BenhNhan_Delete'),
('F394BEBC-461B-6779-EB0D-5E02B9F8B64E', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_BenhNhan_Put'),
('9FBCA6B4-66EE-6B20-BB43-972EF21CBE2A', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_BenhNhan_Post'),
('CD8F291E-BE82-F9E4-5311-098C8420D949', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_BenhNhan_Detail'),
('4510F5E0-97F1-EE4A-2717-598AB84AD8B7', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_BenhNhan_View'),
('5136B743-9EE2-612E-0ACC-4D9CE55AC65D', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Post'),
('8FC8D9A8-FFC3-CD34-8A8A-7ED232717CA9', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Put'),
('CB5D99CA-9C3B-0F0A-35F6-7BDF52315695', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Delete'),
('10F83B62-2131-8011-F9B2-527B3C1E1B16', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Export'),
('85411E97-E690-4668-5992-1BDAF9EE92B7', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Copy'),
('5EF380DF-D0EE-89AF-BAD3-21316D3B3060', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_DonThuoc_Detail'),
('64C9E488-2BE3-FF7A-03A8-77ECA7E4158F', '00F04EBB-314F-1E44-9444-5C52892E16E4', 'QLT_Thuoc_Detail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap1_benhnhan`
--
ALTER TABLE `lap1_benhnhan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_lang`
--
ALTER TABLE `lap1_lang`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_locations`
--
ALTER TABLE `lap1_locations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_menu`
--
ALTER TABLE `lap1_menu`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_news`
--
ALTER TABLE `lap1_news`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_news_duan`
--
ALTER TABLE `lap1_news_duan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_nhanvien_lichlamviec`
--
ALTER TABLE `lap1_nhanvien_lichlamviec`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Ngay` (`Ngay`,`IdNhanVien`);

--
-- Indexes for table `lap1_nhanvien_lichlamviec_calamviec`
--
ALTER TABLE `lap1_nhanvien_lichlamviec_calamviec`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_options`
--
ALTER TABLE `lap1_options`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_pages`
--
ALTER TABLE `lap1_pages`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_qlthuoc_danhmuc`
--
ALTER TABLE `lap1_qlthuoc_danhmuc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_qlthuoc_phieuxuatnhap`
--
ALTER TABLE `lap1_qlthuoc_phieuxuatnhap`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_qlthuoc_phieuxuatnhap_chitiet`
--
ALTER TABLE `lap1_qlthuoc_phieuxuatnhap_chitiet`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_qlthuoc_thuoc`
--
ALTER TABLE `lap1_qlthuoc_thuoc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_role`
--
ALTER TABLE `lap1_role`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_sanpham`
--
ALTER TABLE `lap1_sanpham`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_sanpham_danhmuc`
--
ALTER TABLE `lap1_sanpham_danhmuc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_slider`
--
ALTER TABLE `lap1_slider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_toathuoc`
--
ALTER TABLE `lap1_toathuoc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_toathuoc_detail`
--
ALTER TABLE `lap1_toathuoc_detail`
  ADD PRIMARY KEY (`IdDetail`);

--
-- Indexes for table `lap1_users`
--
ALTER TABLE `lap1_users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_users_baocao`
--
ALTER TABLE `lap1_users_baocao`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_users_infor`
--
ALTER TABLE `lap1_users_infor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lap1_users_role`
--
ALTER TABLE `lap1_users_role`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lap1_qlthuoc_phieuxuatnhap`
--
ALTER TABLE `lap1_qlthuoc_phieuxuatnhap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `lap1_qlthuoc_phieuxuatnhap_chitiet`
--
ALTER TABLE `lap1_qlthuoc_phieuxuatnhap_chitiet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
