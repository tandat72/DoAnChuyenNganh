-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2023 at 12:12 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category_id`) VALUES
(17, 'I5', 17),
(15, 'Asus', 18),
(16, 'I3', 17);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(19, 'PSU'),
(17, 'CPU'),
(18, 'MAINBOARD');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

DROP TABLE IF EXISTS `galery`;
CREATE TABLE IF NOT EXISTS `galery` (
  `galery_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `galery_thumbnail` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`galery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`galery_id`, `product_id`, `galery_thumbnail`) VALUES
(35, 25, ''),
(33, 24, 'Screenshot 2023-03-09 191731.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_discount` int NOT NULL,
  `product_amount` int NOT NULL,
  `product_thumnail` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_created_at` datetime NOT NULL,
  `product_update_at` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_price`, `product_discount`, `product_amount`, `product_thumnail`, `product_description`, `product_created_at`, `product_update_at`) VALUES
(24, 17, 16, 'I3 9100f', 16, 16, 2890000, '92f39f3c91.png', '<p><strong>Giới thiệu CPU&nbsp;<strong><a href=\"https://www.intel.com/\" target=\"_blank\">Intel</a>&nbsp;</strong>Core i3-9100F (3.6GHz Turbo 4.2GHz, 4 nh&acirc;n 4 luồng, 6MB Cache, 65W) &ndash; SK LGA 1151-v2</strong></p>\r\n\r\n<p>Kh&ocirc;ng giống như&nbsp;<strong>CPU Intel Core i3 9100</strong>&nbsp;th&ocirc;ng thường,&nbsp;<a href=\"https://songphuong.vn/product/cpu-intel-core-i3-9100f/\" target=\"_blank\"><strong>CPU Intel Core i3 9100F</strong></a>&nbsp;kh&ocirc;ng c&oacute; cho m&igrave;nh&nbsp;<a href=\"https://songphuong.vn/vga/\" target=\"_blank\"><strong>VGA &ndash; card m&agrave;n h&igrave;nh</strong></a>&nbsp;onboard n&ecirc;n gi&aacute; sẽ thấp hơn, ph&ugrave; hợp với dẫn chơi game hơn, đ&aacute;p ứng mọi nhu cầu giải tr&iacute; hiện nay</p>\r\n\r\n<h2><strong>TỔNG QUAN</strong></h2>\r\n\r\n<ul>\r\n	<li>Intel core i3 9100F</li>\r\n	<li><a href=\"https://songphuong.vn/cpu-intel-9th/\" target=\"_blank\"><strong>CPU Intel thế hệ 9</strong></a></li>\r\n	<li>Tiến tr&igrave;nh sản xuất 14 nm</li>\r\n	<li>4 nh&acirc;n, 4 luồng</li>\r\n	<li>Xung nhịp cơ bản 3.6 GHz</li>\r\n	<li>Xung nhịp Boost tối đa 4.2 GHz</li>\r\n	<li>Hỗ trợ RAM DDR4, Bus tối đa 2400 MHz</li>\r\n	<li>C&oacute; đi k&egrave;m quạt tản nhiệt</li>\r\n</ul>\r\n\r\n<h2><strong>ĐẶC ĐIỂM NỔI BẬT</strong></h2>\r\n\r\n<h3><strong>CPU HIỆU QUẢ VỚI MỨC GI&Aacute; THẤP CỦA INTEL</strong></h3>\r\n\r\n<p>Ph&acirc;n kh&uacute;c 2 đến 3 triệu vẫn l&agrave; s&acirc;n chơi của ri&ecirc;ng Intel. Khi kh&ocirc;ng một sản phẩm n&agrave;o của đối thủ c&oacute; thể s&aacute;nh ngang với<strong>&nbsp;i3 9100F.</strong>&nbsp;Hiệu năng m&agrave; n&oacute; mang lại vượt ngo&agrave;i những mong đợi của game thủ. Đồng thời y&ecirc;u cầu về những<a href=\"https://songphuong.vn/linh-kien/\" target=\"_blank\"><strong>&nbsp;linh kiện m&aacute;y t&iacute;nh</strong></a>&nbsp;đi k&egrave;m cũng kh&ocirc;ng qu&aacute; khắt khe. Việc bị cắt giảm nh&acirc;n đồ họa t&iacute;ch hợp kh&ocirc;ng ảnh hưởng đến khả năng t&iacute;nh to&aacute;n của<strong>&nbsp;CPU Intel core i3 9100F</strong>. Khi phần lớn trong tầm gi&aacute; n&agrave;y, người d&ugrave;ng chỉ quan t&acirc;m đến gaming.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>GAMING L&Agrave; CH&Iacute;NH? L&Agrave;M VIỆC L&Agrave; PHỤ?</strong></h3>\r\n\r\n<p>L&agrave; nền tảng lu&ocirc;n được c&aacute;c nh&agrave; sản xuất game tối ưu h&oacute;a kỹ c&agrave;ng nhất. Việc chơi game tr&ecirc;n những hệ thống sử dụng<strong>&nbsp;CPU Intel</strong>&nbsp;lu&ocirc;n đem lại sự mượt m&agrave; nhất định. Những lỗi như kh&ocirc;ng tương th&iacute;ch phần cứng hay crash khi chạy phần mềm rất hiếm khi xảy ra. Nếu đề cao t&iacute;nh ổn định trong qu&aacute; tr&igrave;nh sử dụng. Đ&acirc;y l&agrave; phương &aacute;n kh&ocirc;ng thể tốt hơn d&agrave;nh cho bạn khi mua&nbsp;<a href=\"https://songphuong.vn/pc-song-phuong/\" target=\"_blank\"><strong>PC &ndash; M&aacute;y t&iacute;nh để b&agrave;n</strong></a></p>\r\n\r\n<p><a href=\"https://songphuong.vn/product/cpu-intel-core-i3-9100f/\"><img alt=\"songphuong.vn\" src=\"https://songphuong.vn/Content/uploads/2020/04/1-intel-core-i3-9100f-songphuong.vn_.jpg\" style=\"height:500px; width:500px\" /></a></p>\r\n\r\n<h3><strong>CPU D&Agrave;NH CHO E-SPORT</strong></h3>\r\n\r\n<p>Với 4 nh&acirc;n / 4 luồng tương tự như những chiếc Core i5 đời trước.&nbsp;<strong>CPU Intel Core i3-9100F</strong>&nbsp;sẽ kh&ocirc;ng chỉ đ&aacute;p ứng đủ nhu cầu. M&agrave; sẽ c&ograve;n ho&agrave;n th&agrave;nh xuất sắc mọi y&ecirc;u cầu của bạn. Điều m&agrave; những chiếc Core i3 trước đ&acirc;y kh&ocirc;ng thể so s&aacute;nh được.&nbsp;Kh&aacute;c với thế hệ trước m&agrave; cụ thể l&agrave; m&atilde; Core i3 8100 chỉ hoạt động duy nhất ở mức 3,6 GHz. Th&igrave; mức đạt được khi hoạt động của 9100f c&oacute; thể l&ecirc;n được mức 4.0GHz ở to&agrave;n bộ 4 nh&acirc;n v&agrave; tối đa l&agrave; 4.2GHz ở 1 nh&acirc;n.&nbsp;Thực tế qua qu&aacute; tr&igrave;nh sử dụng cũng đều giữ ở mức 4.0GHz rất đ&aacute;ng gi&aacute; cho c&aacute;c tựa game hiện nay. Đ&ocirc;i khi chưa thực sự tận dụng đa nh&acirc;n m&agrave; y&ecirc;u cầu sức mạnh đơn nh&acirc;n tốt.</p>\r\n\r\n<p><a href=\"https://songphuong.vn/product/cpu-intel-core-i3-9100f/\"><img alt=\"songphuong.vn\" src=\"https://songphuong.vn/Content/uploads/2020/04/11780-cpu-intel-core-i3-9100F-songphuong.vn_.jpg\" style=\"height:500px; width:500px\" /></a></p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 17, 17, 'I5 10400', 3400000, 10, 15, 'i5.png', '<h3><strong>Đ&aacute;nh gi&aacute; chi tiết Bộ vi xử l&yacute;/&nbsp;</strong><a href=\"https://phongvu.vn/cpu-bo-vi-xu-ly-scat.02-N003\"><strong>CPU</strong></a><strong>&nbsp;Intel Comet Lake Core i5-10400</strong></h3>\r\n\r\n<p>Nếu bạn đang cần đầu tư cho một chiếc PC thuộc tầm trung đủ mạnh mang t&iacute;nh đột ph&aacute;. Th&igrave;&nbsp;<strong>Bộ vi xử l&yacute;/ CPU Intel Comet Lake Core i5-10400&nbsp;</strong>l&agrave; lựa chọn ho&agrave;n hảo với khả năng xử l&yacute; mạnh mẽ, khắc phục ho&agrave;n to&agrave;n những hạn chế m&agrave; phi&ecirc;n bản tiền nhiệm c&ograve;n mắc phải.</p>\r\n\r\n<p><img src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2020/12/15/20201215_dd33e9fe-db81-4300-a96e-b304d246686e.jpg\" /></p>\r\n\r\n<p><strong>CPU Intel Core i5 thế hệ thứ 10 với 6 nh&acirc;n 12 luồng</strong></p>\r\n\r\n<p>Bộ vi xử l&yacute; Core i5 thế hệ thứ 10 của h&atilde;ng Intel ra đời mang t&iacute;nh cạnh tranh cực kỳ cao so với đối thủ. Với mức gi&aacute; trung b&igrave;nh nhưng được trang bị t&iacute;nh năng mạnh mẽ, tốc độ xử l&yacute; l&ecirc;n đến 4.30 GHz nhờ c&ocirc;ng nghệ Turbo Boost 2.0, sở hữu 6 nh&acirc;n 12 luồng.</p>\r\n\r\n<p><img src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2020/12/15/20201215_c0eab225-3760-4544-9f75-80f0e17cd5c6.jpg\" /></p>\r\n\r\n<p><strong>Đ&aacute;p ứng mọi nhu cầu c&ocirc;ng việc hay chơi game</strong></p>\r\n\r\n<p>D&ugrave; c&ocirc;ng việc của bạn mang đặc th&ugrave; ri&ecirc;ng đ&ograve;i hỏi sự mạnh mẽ, hay chơi game một c&aacute;ch trơn tru, mượt m&agrave;. Th&igrave;&nbsp;<strong>CPU Intel Comet Lake Core i5-10400&nbsp;</strong>vẫn đảm bảo mọi thứ được xử l&yacute; tốt với bộ nhớ đệm 12MB v&agrave; t&iacute;ch hợp đồ họa Intel UHD Graphics 630. Sản phẩm đ&atilde; được trải qua qu&aacute; tr&igrave;nh kiểm tra nghi&ecirc;m ngặt của h&atilde;ng Intel, nhằm mang đến cho người d&ugrave;ng sản phẩm ho&agrave;n hảo nhất.&nbsp;</p>\r\n\r\n<p><img src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2020/12/15/20201215_ee4dc986-1ab4-4e79-bb20-35acd0739c6c.jpg\" /></p>\r\n\r\n<p>Nếu chiếc PC nh&agrave; bạn đang gặp vấn đề cần phải n&acirc;ng cấp, Intel core i5-10400 với xung nhịp cơ bản v&agrave; boot rất ổn sẽ l&agrave; lựa chọn ph&ugrave; hợp để bạn lựa chọn. N&oacute; giải quyết được vấn đề m&agrave; Core i5-9400f c&ograve;n hạn chế về khả năng stream, hứa hẹn mang đến cho bạn một sự trải nghiệm ho&agrave;n to&agrave;n mới với tốc độ ngạc nhi&ecirc;n.</p>\r\n\r\n<p><strong>Mua CPU Intel Comet Lake Core i5-10400 ch&iacute;nh h&atilde;ng tại Phong Vũ</strong></p>\r\n\r\n<p>Đối với những sản phẩm c&ocirc;ng nghệ, mua đ&uacute;ng h&agrave;ng ch&iacute;nh h&atilde;ng nhằm đảm bảo được chất lượng xứng đ&aacute;ng với đồng tiền bạn bỏ ra. Phong Vũ l&agrave; đơn vị chuy&ecirc;n cung cấp h&agrave;ng ch&iacute;nh h&atilde;ng đ&atilde; c&oacute; uy t&iacute;n vững chắc trong l&ograve;ng kh&aacute;ch h&agrave;ng. Ch&uacute;ng t&ocirc;i lu&ocirc;n phấn đấu kh&ocirc;ng ngừng để c&oacute; thể mang đến cho kh&aacute;ch h&agrave;ng những sản phẩm, dịch vụ c&oacute; chất lượng tốt nhất.&nbsp;</p>\r\n\r\n<p><img src=\"https://storage.googleapis.com/teko-gae.appspot.com/media/image/2020/12/15/20201215_6d4ad28e-9889-4d32-9e55-798be7337f1e.jpg\" /></p>\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `role_id`) VALUES
(1, 'Khanh', 'khanh@gmail.com', '1234', '01234567889', 0),
(3, 'Khoi', 'khoi@gmail.com', '1234', '0123456', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
