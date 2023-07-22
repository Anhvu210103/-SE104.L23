-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 05:28 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `token`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'lê minh thảo', 'dĩ an , bình duong', 'minhthaodev@gmail', '57837a14c1abe81ebf0100ffd577255e', '01229650824', 1, NULL, 2, NULL, NULL, NULL),
(2, 'Lê Minh Thảo', 'Bình Dương', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0898485596', 1, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Dell', 'dell', NULL, NULL, 1, 1, '2018-04-09 03:31:08', '2018-04-11 03:57:26'),
(15, 'Hp', 'hp', NULL, NULL, 0, 1, '2018-04-09 03:31:15', '2018-04-13 15:25:00'),
(16, 'Asus', 'asus', NULL, NULL, 1, 1, '2018-04-09 03:31:21', '2018-04-10 17:14:55'),
(17, 'Lenovo', 'lenovo', NULL, NULL, 0, 1, '2018-04-09 03:31:33', '2018-04-10 17:14:51'),
(18, 'MSI', 'msi', NULL, NULL, 0, 1, '2018-04-09 03:31:42', '2018-04-13 15:25:03'),
(19, 'Acer', 'acer', NULL, NULL, 0, 1, '2018-04-09 03:31:52', '2018-04-09 08:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 2, 4500000, NULL, NULL),
(2, 2, 16, 1, 4500000, NULL, NULL),
(3, 2, 21, 1, 677777, NULL, NULL),
(4, 3, 20, 1, 40000, NULL, NULL),
(5, 3, 16, 1, 4500000, NULL, NULL),
(6, 3, 19, 1, 70000, NULL, NULL),
(7, 4, 16, 2, 4500000, NULL, NULL),
(8, 5, 19, 1, 70000, NULL, NULL),
(9, 6, 20, 1, 40000, NULL, NULL),
(10, 7, 19, 1, 70000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(15, 'MSI GV62 7RD-1882XVN', 'msi-gv62-7rd-1882xvn', 7000000, 11, 'asus rog scar gl703vd ee057t_lager.png', 18, 'Tại triển lãm Computex 2017 đang diễn ra ở Đài Loan, bên cạnh các dòng gaming laptop cao cấp, MSI còng tung ra dòng Series mới là GV62 ở phân khúc tầm trung, dễ dàng tiếp cận game thủ hơn.', 600, 0, 0, 0, 0, NULL, '2018-04-11 08:44:25'),
(16, 'HERO GL503VD-GZ119T', 'hero-gl503vd-gz119t', 5000000, 10, 'asus ux430ua gv261t_lager.png', 16, 'à một trong những Series mới và ấn tượng nhất lấp đầy vào khoảng trống của những dòng Laptop Gaming Trung cho tới Cao cấp của ASUS. ROG Strix GL503/GL703 sẽ là những ứng cử viên sáng giá trong phân khúc Laptop Gaming từ nay cho đến tận năm sau bởi những nâng cấp ấn tượng không chỉ về ngoại hình bên ngoài, mà cả cấu hình, sức mạnh và nội thất bên trong. Thật sự mà nói trong bài viết này, chúng ta sẽ phải đi rất nhiều qua những vấn đề nổi cộm của các dòng sản phẩm GL503 / GL703 mới. Nên người viết bài sẽ cố gắng tóm tắt và lướt nhanh nhất có thể để đỡ rối..', 56, 0, 0, 0, 0, NULL, '2018-04-12 07:26:12'),
(19, 'x557', 'x557', 70000, 0, 'dell vostro 7570 70138771_lager.png', 16, 'ok', 80, 0, 0, 0, 0, NULL, '2018-04-11 08:44:39'),
(20, 'cv12', 'cv12', 40000, 0, 'msi gv62 7rd 1882xvn_lager.png', 16, 'ok', 56, 0, 0, 0, 0, NULL, '2018-04-11 08:44:46'),
(21, 'ccv', 'ccv', 677777, 0, 'asus rog hero gl503vd gz119t_lager.png', 16, 'ok', 67, 0, 0, 0, 0, NULL, '2018-04-11 08:45:28'),
(22, 'Dell XPS 13 9370 (415PX2)', 'dell-xps-13-9370-415px2', 53990000, 0, 'dell xps 13 9370 415px2_lager.png', 14, 'CPU	Intel Core i7-8550U 1.8GHz up to 4.0GHz 8MB\r\nRAM	16GB LPDDR3 1866MHz\r\nĐĩa cứng	512GB SSD\r\nCard đồ họa	Intel UHD Graphics 620\r\nMàn hình	13.3 inch UHD (3840 x 2160) IPS + Touch\r\nCổng giao tiếp USB	2x Thunderbolt 3 with PowerShare, DC-in & DisplayPort; 1x USB-C 3.1 with DC-in & DisplayPort', 80, 0, 0, 0, 0, NULL, '2018-04-13 15:27:38'),
(23, 'Dell Inspiron 7570', 'dell-inspiron-7570', 28990000, 0, 'dell inspiron 7570 782p81_lager.png', 14, 'ok', 56, 0, 0, 0, 0, NULL, '2018-04-13 15:29:06'),
(24, 'Dell Inspiron 7373', 'dell-inspiron-7373', 28490000, 0, 'dell inspiron 7373 t7373a_lager.png', 14, 'Hãng CPU	Intel\r\nCông nghệ CPU	Core i7\r\nLoại CPU	8550U\r\nTốc độ CPU	1.8GHz up to 4.0GHz', 67, 0, 0, 0, 0, NULL, NULL),
(25, 'Dell Inspiron 7577', 'dell-inspiron-7577', 22990000, 0, 'dell inspiron 7577 70138769_lager.png', 14, 'Tóm tắt thông số Dell Inspiron 7577 (70138769)', 56, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 9900000, 1, 1, 'giao hàng tận nơi', NULL, '2018-04-12 07:26:12'),
(2, 5695555, 1, 1, 'ok', NULL, NULL),
(3, 5071000, 2, 1, '', NULL, NULL),
(4, 9900000, 2, 1, '', NULL, NULL),
(5, 77000, 2, 1, 'ok 123', NULL, NULL),
(6, 44000, 2, 1, '', NULL, NULL),
(7, 77000, 2, 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'minhthaodev01', 'minhthaodev01@gmail.com', '0898485596', 'sai gòn', '57837a14c1abe81ebf0100ffd577255e', NULL, 1, NULL, NULL, NULL),
(2, 'Thảo lê', 'admin@gmail.com', '0898485597', 'sài gòn', '25d55ad283aa400af464c76d713c07ad', NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
