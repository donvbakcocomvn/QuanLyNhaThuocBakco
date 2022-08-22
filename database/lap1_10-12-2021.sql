-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 10, 2021 lúc 02:13 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lap1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_lang`
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
-- Đang đổ dữ liệu cho bảng `lap1_lang`
--

INSERT INTO `lap1_lang` (`Id`, `Name`, `Des`, `Code`) VALUES
('vi', 'Việt Nam', 'Việt Nam', 'VN-vi'),
('en', 'English', 'English', 'EN-En');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_options`
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
-- Cấu trúc bảng cho bảng `lap1_role`
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
-- Đang đổ dữ liệu cho bảng `lap1_role`
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
-- Cấu trúc bảng cho bảng `lap1_sanpham`
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

--
-- Đang đổ dữ liệu cho bảng `lap1_sanpham`
--

INSERT INTO `lap1_sanpham` (`Id`, `Name`, `Des`, `Keyword`, `Title`, `DanhMucId`, `Alias`, `Username`, `Price`, `oldPrice`, `Summary`, `Content`, `UrlImages`, `DateCreate`, `Number`, `Note`, `BuyTimes`, `Views`, `isShow`, `STT`, `Lang`) VALUES
('0', 'Áo Thun Cổ Lọ', 'Áo Thun Cổ Lọ', 'Áo Thun Cổ Lọ', 'Áo Thun Cổ Lọ', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-co-lo', 'admin', '0.0000', '0.0000', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL),
('10', 'Abc asdasdasa sasd asdasdasdasa sdasdasdas dsadsdas sdasdas sdasdasdas asdasdas', 'asdasdaasdas\r\nas\r\nda\r\nsdas', 'dassdasasdas\r\na\r\nsd\r\nasdas', 'asdasasdaasdasd\r\na\r\nsd\r\nasdsa', 'f98ee1f2-a0df-4998-8c07-acb1e57ff1c1', 'abc-asdasdasa-sasd-asdasdasdasa-sdasdasdas-dsadsdas-sdasdas-sdasdasdas-asdasdas', 'admin', '12000000.0000', '13000000.0000', 'asdasdasas asdasdas\r\nd\r\nas\r\ndas', '&lt;p&gt;asdasd&lt;/p&gt;\r\n\r\n&lt;p&gt;as&lt;/p&gt;\r\n\r\n&lt;p&gt;da&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;sd&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;as&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;das&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;as&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;d&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;asd&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;as&lt;br /&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;/public/userfiles/admin/images/ed3b2988-5054-4e3e-8f8b-da93a7169346-bieumau-0.jpg&quot; style=&quot;height:342px; width:400px&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;das&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '/public/userfiles/admin/images/ed3b2988-5054-4e3e-8f8b-da93a7169346-bieumau-0.jpg', NULL, 1000, NULL, 23423, 23423, 0, 1638539269, 'vi'),
('1a373bfb-5817-49b5-a8e0-24f2f4726923', 'Áo Thun a321sa asd asdas', 'sd', 'asdas', 'asd', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'ao-thun-a321sa-asd-asdas', 'admin', '0.0000', '0.0000', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL),
('495e3b0c-270d-48ef-8897-f21a9a88f882', 'asdas', 'dasda', 'asda', 'sdas', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'asdas', 'admin', '0.0000', '0.0000', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL),
('dca27a1c-e83a-44f5-abb0-128d98692169', 'asd asdas dasd asdas', 'asdas', 'asdas', 'asd', '44bc0a10-295c-46c5-92fd-a789d76d8808', 'asd-asdas-dasd-asdas', 'admin', '0.0000', '0.0000', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_danhmuc`
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
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_danhmuc`
--

INSERT INTO `lap1_sanpham_danhmuc` (`Id`, `Name`, `keyword`, `des`, `title`, `Path`, `Link`, `Note`, `parentsId`, `Banner`, `IsPublic`, `STT`, `Lang`) VALUES
('44bc0a10-295c-46c5-92fd-a789d76d8808', 'Áo aaa', 'asd', 'asdas', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi'),
('f98ee1f2-a0df-4998-8c07-acb1e57ff1c1', 'Quần', 'sa', 'dasdas', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_options`
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
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_options`
--

INSERT INTO `lap1_sanpham_options` (`Id`, `Code`, `Name`, `Des`) VALUES
('1', '9740b6128e99865cbecf69577ad04dcace43cbb9', 'Size Xl Màu Đỏ', 'Size Xl Màu Đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_options_soluong`
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

--
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_options_soluong`
--

INSERT INTO `lap1_sanpham_options_soluong` (`Id`, `IdSanPham`, `Option1`, `Option2`, `SoLuong`, `Gia`) VALUES
('704a93af-dae7-4653-bee8-ed66ab1e5811', '10', '98b227dd-7a07-4e75-9746-1d0c8750a771', '12758ce8-bd83-44f8-af28-0bed2d2444c0', 1, '1'),
('2bb6f958-7e3f-48d4-8ff0-01333e76ec35', '10', '98b227dd-7a07-4e75-9746-1d0c8750a771', '426ce790-719c-4ee3-a61c-37ae776fd3de', 1, '1'),
('22171699-2a16-4f9f-a9a6-fe1ada8ea3b3', '10', '98b227dd-7a07-4e75-9746-1d0c8750a771', 'd2e0a9a1-c24c-46da-bdcb-428cd98e46ce', 1, '1'),
('9b995018-fc76-4271-b24f-e3e06dd3b4c8', '10', '64812e6f-a692-475f-a152-bc477c386a6f', '3061db27-84de-4404-bd28-8f14fbfcf522', 1, '1'),
('3d26e397-b1b3-4e66-a446-190dcadc74f0', '10', '64812e6f-a692-475f-a152-bc477c386a6f', '12758ce8-bd83-44f8-af28-0bed2d2444c0', 1, '1'),
('6b1d4343-b960-4931-bdf4-a6194d336f6a', '10', '64812e6f-a692-475f-a152-bc477c386a6f', '426ce790-719c-4ee3-a61c-37ae776fd3de', 1, '1'),
('1c16d0be-212c-49fa-b9e9-403e6b5d96f8', '10', '64812e6f-a692-475f-a152-bc477c386a6f', 'd2e0a9a1-c24c-46da-bdcb-428cd98e46ce', 1, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_options_type`
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
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_options_type`
--

INSERT INTO `lap1_sanpham_options_type` (`Id`, `Name`, `Code`, `Parents`) VALUES
('Size', 'Kích Thước', 'Size', ''),
('MauSac', 'Màu Sắc', 'MauSac', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_thuoctinh`
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

--
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_thuoctinh`
--

INSERT INTO `lap1_sanpham_thuoctinh` (`Id`, `OptionsTypeId`, `Options`, `IdSanPham`, `GhiChu`) VALUES
('c986277f-6b59-479c-b109-d19755f6bd34', 'Size', 2, '10', ''),
('ff25ca90-4a36-4125-a04a-547fdfa56b9d', 'MauSac', 1, '10', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_sanpham_thuoctinh_chitiet`
--

DROP TABLE IF EXISTS `lap1_sanpham_thuoctinh_chitiet`;
CREATE TABLE IF NOT EXISTS `lap1_sanpham_thuoctinh_chitiet` (
  `Id` varchar(50) NOT NULL,
  `IdThuocTinh` varchar(50) NOT NULL,
  `Name` varchar(500) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lap1_sanpham_thuoctinh_chitiet`
--

INSERT INTO `lap1_sanpham_thuoctinh_chitiet` (`Id`, `IdThuocTinh`, `Name`) VALUES
('98b227dd-7a07-4e75-9746-1d0c8750a771', 'ff25ca90-4a36-4125-a04a-547fdfa56b9d', 'Xanh'),
('3061db27-84de-4404-bd28-8f14fbfcf522', 'c986277f-6b59-479c-b109-d19755f6bd34', 'XXL'),
('12758ce8-bd83-44f8-af28-0bed2d2444c0', 'c986277f-6b59-479c-b109-d19755f6bd34', 'XL'),
('426ce790-719c-4ee3-a61c-37ae776fd3de', 'c986277f-6b59-479c-b109-d19755f6bd34', 'M'),
('d2e0a9a1-c24c-46da-bdcb-428cd98e46ce', 'c986277f-6b59-479c-b109-d19755f6bd34', 'L'),
('11572f71-909f-48d6-9105-33c284885c69', 'd25dcfb7-5bca-4264-8937-ca12a1aaf43f', 'asdasdas'),
('5ba3ccf0-0309-4150-b5f5-0e2fbecfe0bc', 'c129c007-d911-4762-bc2f-e1dba3a914f5', 'asdasdas'),
('64812e6f-a692-475f-a152-bc477c386a6f', 'ff25ca90-4a36-4125-a04a-547fdfa56b9d', 'Đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_users`
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
-- Đang đổ dữ liệu cho bảng `lap1_users`
--

INSERT INTO `lap1_users` (`Id`, `Name`, `Username`, `Email`, `Password`, `KeyPassword`, `BOD`, `Status`, `Active`, `DateCreate`, `TokenReset`) VALUES
('78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Adminas asdas', 'admin', 'namdong92@gmail.com', '95add5183f17f35f2770ffd42d8746f8b8bc60ac', '78f8420e-3e33-11ec-ad78-0cc47acc8ffc', '2021-11-24', 0, 1, '0000-00-00 00:00:00', ''),
('57193062-abd5-4dc2-a0cc-013f510ff38d', 'asdasdas', 'abc123', 'namdong91@gmail.com', 'd79cdf2cc38d064e37419b9722aa9e31e0d498af', '6f3ada33-23dd-415d-9b96-ec71459edc1c', '2021-11-22', 0, 1, '2021-11-22 13:46:39', ''),
('e5b5f45b-7447-4a99-9ee0-72806c141bf8', 'abc123', 'abc1231', 'namdong99@gmail.com', 'd94578c5155d4eb9d1c2d07588fb6cbf0bfefa4b', '99484c2d-eac4-476f-8dc7-07ccf3ce24d5', '2021-11-22', 0, 1, '2021-11-22 13:47:13', ''),
('a585dec5-9ded-47f4-bd78-33055d8c30de', 'Nguyễn Văn A', 'abcef', 'ASASDASsNguyenVanA@gmail.com', 'da174a019e46ae5db173be4bd0dcbd474e174f38', '0714b74a-5935-45e2-aa8d-ea5eeea30da5', '2021-11-22', 0, 0, '2021-11-22 13:51:45', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_users_role`
--

DROP TABLE IF EXISTS `lap1_users_role`;
CREATE TABLE IF NOT EXISTS `lap1_users_role` (
  `Id` varchar(50) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `RoleId` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lap1_users_role`
--

INSERT INTO `lap1_users_role` (`Id`, `UserId`, `RoleId`) VALUES
('83253ada-757d-41c7-90f7-9dc002ca0fdf', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Admin'),
('25b4a53e-a868-482f-9451-c96c05c67ace', '78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'QuanLy'),
('f8382573-cc6f-478e-9ccf-21722dce0e6b', 'a585dec5-9ded-47f4-bd78-33055d8c30de', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
