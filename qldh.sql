-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 01:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qldh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `idEmployee` int(11) DEFAULT NULL,
  `idCustomer` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `idEmployee`, `idCustomer`, `amount`) VALUES
(5, NULL, 2, 3982660),
(6, NULL, 2, 3982660),
(7, NULL, 2, 3982660),
(8, NULL, 2, 3982660),
(9, NULL, 2, 3982660),
(10, NULL, 2, 3982660),
(11, NULL, 2, 2907960),
(12, NULL, 3, 1867800),
(13, NULL, 3, 2330900),
(14, NULL, 3, 4387020),
(15, NULL, 3, 3968360),
(16, NULL, 3, 5085080),
(17, NULL, 4, 1761760),
(18, NULL, 4, 5263060),
(19, NULL, 4, 7524660),
(20, NULL, 5, 1761760),
(21, NULL, 6, 544500),
(22, NULL, 7, 1217260),
(23, NULL, 8, 2416260),
(24, NULL, 2, 2979020),
(25, NULL, 2, 1776060),
(26, NULL, 2, 4302320),
(27, NULL, 2, 1327260),
(28, NULL, 5, 1871760),
(29, NULL, 5, 2879360),
(30, NULL, 8, 2306260),
(31, NULL, 8, 2544520),
(32, NULL, 8, 4650360),
(33, NULL, 2, 4170100);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `liked` int(11) NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `imageUrl`, `liked`, `discount`) VALUES
(1, 'Áo sơ mi dài tay nam ALS27609', 695000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als27309/ao-so-mi-aristino-ALS27309-02x500x500x4.jpg', 145, 12),
(2, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(3, 'Áo sơ mi dài tay nam ALS27610', 655000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15409/ao-so-mi-aristino-ALS15409-04x500x500x4.jpg', 92, 20),
(4, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(5, 'Áo sơ mi dài tay nam ALS27612', 495000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13209/ao-so-mi-aristino-ALS13209-05x500x500x4.jpg', 150, 0),
(6, 'Áo len dài tay ALS27699', 595000, 'https://aristino.com/data/ResizeImage/images/product/ao-len/awo006w9/ao-len-nam-aristino-AWO006W9-11x500x500x4.jpg', 94, 0),
(7, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(8, 'Áo thu đông đôi ALS27310', 635000, 'https://bucket.nhanh.vn/store/8921/ps/20191123/76972846_2632227506846730_3126855239391510528_o.jpg', 160, 20),
(9, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(10, 'Áo sơ thun nữ ALS27633', 295000, 'http://www.tashop.vn/templates/pictures/products/1487259134_ao-kieu-vat-xeo-tay-dai-0.png', 96, 0),
(11, 'Áo thun nữ trắng ALS27622', 595000, 'http://www.tashop.vn/templates/pictures/products/1481213720_ao-len-tay-dai-tphcm-0.png', 110, 0),
(12, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(13, 'Áo phông trắng cá tính ALS27310', 755000, 'http://www.tashop.vn/templates/pictures/products/1584371768_quan-jean-baggy-ong-rong-77.jpg', 98, 20),
(14, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(15, 'Áo sơ mi dài tay nam ALS27612', 495000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13209/ao-so-mi-aristino-ALS13209-05x500x500x4.jpg', 90, 0),
(16, 'Áo len dài tay ALS27613', 595000, 'https://aristino.com/data/ResizeImage/images/product/ao-len/awo006w9/ao-len-nam-aristino-AWO006W9-11x500x500x4.jpg', 90, 0),
(17, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(18, 'Đầm nữ đen duyên dáng ALS27555', 666000, 'http://www.tashop.vn/templates/pictures/products/1513151381_dam_co_yem_ren.png', 90, 20),
(19, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(20, 'Áo sơ mi dài tay nam ALS27612', 495000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13209/ao-so-mi-aristino-ALS13209-05x500x500x4.jpg', 90, 0),
(21, 'Áo len dài tay ALS27613', 595000, 'https://aristino.com/data/ResizeImage/images/product/ao-len/awo006w9/ao-len-nam-aristino-AWO006W9-11x500x500x4.jpg', 90, 0),
(22, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(23, 'Đầm nữ đỏ ALS27543', 653000, 'http://www.tashop.vn/templates/pictures/products/1484585428_dam-xoe-co-yem-0.png', 90, 20),
(24, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(25, 'Áo sơ mi dài tay nam ALS27612', 495000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13209/ao-so-mi-aristino-ALS13209-05x500x500x4.jpg', 90, 0),
(26, 'Áo len dài tay ALS27613', 595000, 'https://aristino.com/data/ResizeImage/images/product/ao-len/awo006w9/ao-len-nam-aristino-AWO006W9-11x500x500x4.jpg', 90, 0),
(27, 'Áo sơ mi dài tay nam ALS13509', 795000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13509/ao-so-mi-aristino-ALS13509-01x500x500x4.jpg', 60, 11),
(28, 'Đẫm nữ hồng ALS27688', 655000, 'http://www.tashop.vn/templates/pictures/products/1484277676_dam-rose-dress-1.png', 90, 20),
(29, 'Áo sơ mi dài tay nam ALS27611', 615, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als15909/ao-so-mi-aristino-ALS15909-05x500x500x4.jpg', 40, 0),
(30, 'Áo sơ mi dài tay nam ALS27612', 495000, 'https://aristino.com/data/ResizeImage/images/product/so-mi-dai-tay/als13209/ao-so-mi-aristino-ALS13209-05x500x500x4.jpg', 90, 0),
(31, 'Áo len dài tay ALS27613', 595000, 'https://aristino.com/data/ResizeImage/images/product/ao-len/awo006w9/ao-len-nam-aristino-AWO006W9-11x500x500x4.jpg', 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

CREATE TABLE `ordered_item` (
  `id` int(11) NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idBill` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_item`
--

INSERT INTO `ordered_item` (`id`, `idItem`, `idBill`, `amount`) VALUES
(1, 5, 5, 3),
(2, 1, 5, 1),
(3, 8, 5, 3),
(4, 5, 6, 3),
(5, 1, 6, 1),
(6, 8, 6, 3),
(7, 5, 7, 3),
(8, 1, 7, 1),
(9, 8, 7, 3),
(10, 5, 8, 3),
(11, 1, 8, 1),
(12, 8, 8, 3),
(13, 5, 9, 3),
(14, 1, 9, 1),
(15, 8, 9, 3),
(16, 5, 10, 3),
(17, 1, 10, 1),
(18, 8, 10, 3),
(19, 1, 11, 1),
(20, 8, 11, 4),
(21, 11, 12, 2),
(22, 8, 12, 1),
(23, 8, 13, 3),
(24, 11, 13, 1),
(25, 1, 14, 1),
(26, 11, 14, 1),
(27, 18, 14, 2),
(28, 13, 14, 2),
(29, 8, 14, 1),
(30, 8, 15, 2),
(31, 5, 15, 4),
(32, 1, 15, 1),
(33, 11, 16, 3),
(34, 1, 16, 3),
(35, 5, 16, 1),
(36, 8, 16, 1),
(37, 5, 17, 2),
(38, 1, 17, 1),
(39, 5, 18, 3),
(40, 10, 18, 3),
(41, 13, 18, 2),
(42, 1, 18, 1),
(43, 11, 18, 1),
(44, 8, 19, 1),
(45, 5, 19, 1),
(46, 1, 19, 1),
(47, 11, 19, 1),
(48, 13, 19, 2),
(49, 10, 19, 2),
(50, 6, 19, 3),
(51, 3, 19, 2),
(52, 5, 20, 2),
(53, 1, 20, 1),
(54, 5, 21, 1),
(55, 1, 22, 1),
(56, 5, 22, 1),
(57, 5, 23, 2),
(58, 1, 23, 1),
(59, 11, 23, 1),
(60, 5, 24, 3),
(61, 1, 24, 2),
(62, 5, 25, 1),
(63, 1, 25, 1),
(64, 8, 25, 1),
(65, 5, 26, 2),
(66, 1, 26, 2),
(67, 11, 26, 2),
(68, 8, 26, 1),
(69, 1, 27, 1),
(70, 11, 27, 1),
(71, 5, 28, 1),
(72, 1, 28, 1),
(73, 11, 28, 1),
(74, 8, 29, 2),
(75, 5, 29, 2),
(76, 1, 29, 1),
(77, 5, 30, 3),
(78, 1, 30, 1),
(79, 1, 31, 2),
(80, 11, 31, 1),
(81, 5, 31, 1),
(82, 8, 32, 1),
(83, 5, 32, 1),
(84, 1, 32, 1),
(85, 11, 32, 1),
(86, 13, 32, 1),
(87, 10, 32, 1),
(88, 6, 32, 1),
(89, 3, 32, 1),
(90, 8, 33, 2),
(91, 5, 33, 2),
(92, 11, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status_bill`
--

CREATE TABLE `status_bill` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `idBill` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_bill`
--

INSERT INTO `status_bill` (`id`, `status`, `idBill`, `date`) VALUES
(1, '1', 5, '2019-07-20 00:00:00'),
(2, '2', 5, '2019-07-21 00:00:00'),
(3, '1', 6, '2019-08-01 00:00:00'),
(4, '1', 7, '2020-01-09 00:00:00'),
(5, '2', 7, '2020-01-10 07:32:21'),
(6, '1', 8, '2020-02-17 00:13:18'),
(7, '1', 9, '2020-03-20 18:14:10'),
(8, '1', 10, '2020-04-20 18:14:45'),
(9, '1', 11, '2020-05-21 00:17:40'),
(10, '1', 12, '2020-06-21 00:20:39'),
(11, '1', 13, '2020-07-21 00:24:20'),
(12, '1', 14, '2020-08-21 00:27:03'),
(13, '3', 7, '2020-12-22 03:17:23'),
(14, '4', 7, '2020-12-22 03:17:48'),
(15, '2', 8, '2020-12-22 03:21:51'),
(16, '3', 8, '2020-12-22 03:22:05'),
(17, '4', 8, '2020-12-22 03:22:17'),
(18, '2', 9, '2020-12-22 03:24:35'),
(19, '3', 9, '2020-12-22 03:31:24'),
(20, '4', 9, '2020-12-22 03:31:35'),
(21, '2', 14, '2020-12-22 03:31:43'),
(22, '3', 14, '2020-12-22 03:31:57'),
(23, '4', 14, '2020-12-22 03:32:26'),
(24, '1', 15, '2020-09-22 07:48:27'),
(25, '1', 16, '2020-10-22 07:48:41'),
(26, '1', 17, '2020-11-22 07:48:52'),
(27, '1', 18, '2020-03-22 07:49:42'),
(28, '1', 19, '2020-11-22 07:50:12'),
(29, '1', 20, '2020-10-22 07:50:35'),
(30, '1', 21, '2020-08-22 07:51:01'),
(31, '1', 22, '2020-12-22 07:51:27'),
(32, '1', 23, '2020-12-22 07:51:55'),
(33, '1', 24, '2020-12-22 08:49:22'),
(34, '1', 25, '2020-12-22 08:49:34'),
(35, '1', 26, '2020-12-22 08:49:45'),
(36, '1', 27, '2020-12-22 08:49:55'),
(37, '1', 28, '2020-12-22 09:01:34'),
(38, '1', 29, '2020-12-22 09:01:45'),
(39, '1', 30, '2020-12-22 09:02:16'),
(40, '1', 31, '2020-12-22 09:02:27'),
(41, '1', 32, '2020-12-22 09:02:53'),
(42, '1', 33, '2020-12-22 13:01:00'),
(43, '2', 10, '2020-12-22 13:03:41'),
(44, '3', 10, '2020-12-22 13:03:52'),
(45, '4', 10, '2020-12-22 13:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `role` varchar(1000) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `role`, `email`, `phoneNumber`, `address`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL, NULL, NULL),
(2, 'okami', '12345', 'Minh Quốc', 'customer', 'qpham139@gmail.com', '0984620799', 'Nam Định'),
(3, 'lengan', '12345', 'Lê Ngân', 'customer', 'nganltptit@gmail.com', '0327877482', 'Hà Nam'),
(4, 'buiphuong', '12345', 'Bùi Phương', 'customer', 'phuongbuiptit@gmail.com', '03447877322', 'Thái Bình'),
(5, 'nguyenha', '12345', 'Nguyễn Hà', 'customer', 'nguyenha@gmail.com', '03272773382', 'Nam Định'),
(6, 'sontran', '12345', 'Trần Thanh Sơn', 'customer', 'sontran@gmail.com', '0367777382', 'Hà Nội'),
(7, 'huucanh', '12345', 'Đặng Hữu Cảnh', 'customer', 'huucanhptit@gmail.com', '0325823453', 'Đà Nẵng'),
(8, 'tuananh', '12345', 'Phạm Tuấn Anh', 'customer', 'tuananhptit@gmail.com', '0327565473', 'Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCustomer` (`idCustomer`),
  ADD KEY `idEmployee` (`idEmployee`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idItem` (`idItem`),
  ADD KEY `idBill` (`idBill`);

--
-- Indexes for table `status_bill`
--
ALTER TABLE `status_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBilll` (`idBill`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ordered_item`
--
ALTER TABLE `ordered_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `status_bill`
--
ALTER TABLE `status_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `idCustomer` FOREIGN KEY (`idCustomer`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `idEmployee` FOREIGN KEY (`idEmployee`) REFERENCES `user` (`id`);

--
-- Constraints for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD CONSTRAINT `idBill` FOREIGN KEY (`idBill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `idItem` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Constraints for table `status_bill`
--
ALTER TABLE `status_bill`
  ADD CONSTRAINT `idBilll` FOREIGN KEY (`idBill`) REFERENCES `bill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
