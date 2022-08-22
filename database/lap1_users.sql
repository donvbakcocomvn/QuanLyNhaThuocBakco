-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 11, 2022 lúc 03:11 AM
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
-- Cơ sở dữ liệu: `vietthang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lap1_users`
--

DROP TABLE IF EXISTS `lap1_users`;
CREATE TABLE IF NOT EXISTS `lap1_users` (
  `Id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `KeyPassword` varchar(50) NOT NULL,
  `BOD` date NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `DateCreate` datetime NOT NULL,
  `TokenReset` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lap1_users`
--

INSERT INTO `lap1_users` (`Id`, `Name`, `Username`, `Email`, `Password`, `KeyPassword`, `BOD`, `Status`, `Active`, `DateCreate`, `TokenReset`) VALUES
('78f8358e-3e33-11ec-ad78-0cc47acc8ffc', 'Adminas asdas', 'admin', 'namdong92@gmail.com', '95add5183f17f35f2770ffd42d8746f8b8bc60ac', '78f8420e-3e33-11ec-ad78-0cc47acc8ffc', '2021-11-24', 0, 1, '0000-00-00 00:00:00', ''),
('57193062-abd5-4dc2-a0cc-013f510ff38d', 'asdasdas', 'abc123', 'namdong91@gmail.com', 'd79cdf2cc38d064e37419b9722aa9e31e0d498af', '6f3ada33-23dd-415d-9b96-ec71459edc1c', '2021-11-22', 0, 0, '2021-11-22 13:46:39', ''),
('e5b5f45b-7447-4a99-9ee0-72806c141bf8', 'abc123', 'abc1231', 'namdong99@gmail.com', 'd94578c5155d4eb9d1c2d07588fb6cbf0bfefa4b', '99484c2d-eac4-476f-8dc7-07ccf3ce24d5', '2021-11-22', 0, 0, '2021-11-22 13:47:13', ''),
('a585dec5-9ded-47f4-bd78-33055d8c30de', 'Nguyễn Văn A', 'abcef', 'ASASDASsNguyenVanA@gmail.com', 'da174a019e46ae5db173be4bd0dcbd474e174f38', '0714b74a-5935-45e2-aa8d-ea5eeea30da5', '2021-11-22', 0, 0, '2021-11-22 13:51:45', ''),
('72ce0ced-48e1-48c1-abbb-56d02558cb6b', 'NGUYỄN MINH QUÂN', '0829998911', '0829998911@gmail.com', '5b6e1ffafcc2118f1c10b4e4d856e08a74f625d2', 'a1a491d3-4daa-488c-b82e-d18462fd6fca', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('8617047a-b6e8-4971-8c73-7872c7c69ff5', 'ĐẶNG THÀNH NAM', '0987927033', '0987927033@gmail.com', '55d86f681e87677361e6908c5ba9afead2e78350', 'ed18d629-6371-4753-b855-bbe05ee6ff36', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('4710854b-8fef-4b7e-923c-eb1c3e3798fc', 'NGUYỄN ANH KIỆT', '0706567579', '0706567579@gmail.com', 'caa05f4ea5e98fdd95bf0117643fd85bd5b46ca3', 'e6189c6f-32ba-4776-baa5-1122a4fcc65b', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('f145a11e-ffe3-43bd-9705-7a3d9c9cc16b', 'TRẦN TẤN CÔNG', '0901418499', '0901418499@gmail.com', 'b3bd071b2a474f7b11ec9870b254baccf2d1204e', 'b380b851-0ce5-42b9-9f24-51afa255f6a3', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('3c4c57dd-0d1f-4ebf-89df-4e3eb8788924', 'LÊ ĐỨC TUẤN', '0975569149', '0975569149@gmail.com', '4decb06ace7509e9590c9dbfaaed0ebf7de4ebc1', '41a41662-885a-4837-99f8-4ddf502bd2ac', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('c297b68c-fafa-4c39-95b6-02777c96874f', 'NGUYỄN HOÀNG NHẬT DUY', '0946706143', '0946706143@gmail.com', '3a0e140bf06685d6b5a9b29b570e4021c9e12c94', '75d9ab45-f6d7-411a-94ca-bb146f7e38ed', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('06186c8d-1386-4b72-b15d-22b1403f11ef', 'ĐOÀN THANH HOÀNG', '0988108342', '0988108342@gmail.com', '621e4e78f8eb33e773e5f56ee451af92452ca576', 'aff8cd9e-6d9a-4fcd-9341-c1a95844ce62', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('dacaf8fd-ea40-4368-b7f9-ee01061e8dd9', 'TRƯƠNG TOÀN PHƯƠNG', '0793772747', '0793772747@gmail.com', 'fc670bcf63a07433f70cb2e6b181b0ebf5bb5b4e', '346d52d4-70db-4296-9fed-c9f3db2fffa6', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('8bbf2408-7654-49a6-aa98-c163247a4ad5', 'LÊ QUANG HUY', '0377692378', '0377692378@gmail.com', 'aeb76c2da5f4a3c1de4b2b296b59ca55b132fae5', 'cec6ba88-092b-41e8-bac6-6853c9e17165', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('b52c93a8-1241-43af-9cd2-fc9b117b78f9', 'NGUYỄN MÙA THÁI NGÂN', '0902869475', '0902869475@gmail.com', '84d81620f5462a605e7b4793be5d88a81fa9a8aa', '29d78875-0fb7-4e72-9767-e0e2e7ed78fc', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('f1e89b1d-3a63-4500-a20e-837698a9f58d', 'LÂM CAO SÁNG', '0332450207', '0332450207@gmail.com', '2622b72f5030b53083547ace9043c2ae1e9511f2', '8855c5cc-3ab7-4f2f-96ae-7e7df3c6a083', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('ca175457-2bdb-4f1f-ac5a-ddc035efebf9', 'PHẠM HẢI DƯƠNG', '0326261307', '0326261307@gmail.com', '5b6944bb9b617bc8f446d5f6092afaada695f967', 'f2876c80-43be-40ef-a46b-29b41cbfd788', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('bcc18499-5a6c-41b9-80c9-57865041b3e4', 'TRẦN THANH SANG', '0909193923', '0909193923@gmail.com', '68f23a1f95d50f9158396d40628543ba5890bdd0', '914de98b-e01a-40bd-8b60-cf3081b42268', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('5ea593f0-861c-4f5f-81d7-233536e892bb', 'BÙI THỊ KIM THÁP', '0844440999', '0844440999@gmail.com', '02312ac822fd1a1533c27bdab1bd806a873f0231', 'db7f5cc9-159c-460e-a869-6dc6524cda24', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('b469027e-90ee-4f14-8b6b-e4cfe55e68f0', 'NGUYỄN MINH QUANG', '0935992326', '0935992326@gmail.com', '7dc96643ba89bb0c0c364f3d6c2b98284370c110', 'af7e0336-705f-4806-b789-44a72d3a2006', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('cf965fa3-4aeb-4c4c-b0af-cd047f06f4a8', 'TRƯƠNG HOÀNG MINH ĐAN', '0775476374', '0775476374@gmail.com', 'd3be7315b1f8b1ba6d14556acececc83f4a9e261', '64a0ae19-f7fa-4acb-b1e4-dcd64e677ed1', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('3672bbc5-9ee7-4c80-8e6d-5a58fac34c5c', 'HOÀNG ĐẠI THIÊN LONG', '0972101144', '0972101144@gmail.com', '422a6e800c0c843dea6e06caa4e0e7b9d32dccc4', '5c20cd8c-ff9a-4b37-9949-575bb80cbb1b', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('ddd63811-d993-4e1e-a0f7-61150c00245b', 'TRẦN ANH TUẤN', '0973389133', '0973389133@gmail.com', '8387c66add02f84fd699dbed5ae19ac17334b521', '681ab480-c2b3-4402-9c83-b3bb8031755b', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('4ef540ca-44a9-4a06-88a3-da4da8212613', 'NGUYỄN VĂN ĐỘ', '0372779917', '0372779917@gmail.com', 'b2ecd7dcfa0a8d53dcf00937fa683578a78a68fd', 'c888fc39-f15b-4567-931c-447bd8c53bb4', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('0e593ca0-a798-4357-89ea-0fbd16b4e34a', 'BÙI QUANG VINH', '0979397790', '0979397790@gmail.com', '1f5823b44e591c82b25a2214c76d045436a68b73', '126331e1-497c-4688-9138-157883b1d0fc', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('82b99fd7-96ce-4282-98b9-d31ae7ed1a89', 'TRẦN THANH HUY', '0933976511', '0933976511@gmail.com', '197bef45233edc7f5cdf55e7dd8d8ccff2beac2a', '047ebb8e-18ec-41f1-8858-c8511323ced0', '2022-01-04', 0, 1, '2022-01-04 00:00:00', ''),
('d57007b7-4b8a-446a-a5eb-a95593b3bbd9', 'ĐẶNG VÕ QUANG LIÊU', '0961370519', '0961370519@gmail.com', 'fc58a005e4ad5d05eecbba1756e4b396a52d398c', '9f3c32e3-54d0-4199-8147-24449697394f', '2022-01-04', 0, 1, '2022-01-04 00:00:00', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
