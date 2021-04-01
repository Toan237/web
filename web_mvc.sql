-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 11:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `username`, `password`, `level`) VALUES
(0, 't', 't', 'admin', '202cb962ac59075b964b07152d234b70', 0),
(0, 't', 't', 'admin', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(7, 'dell'),
(8, 'lenovo'),
(9, 'hp'),
(14, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, '124'),
(5, '123'),
(6, 'abc'),
(7, 'laptop'),
(8, 'đâsdasd'),
(9, 'dấdads'),
(10, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`) VALUES
(7, 'Tran Chau Hai', '0120', 'sl4mdunk1999@gmail.com', '96ea7f8d9956f91a3575eda46802a888', '123 Nguyen Van CU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`) VALUES
(3, '2263', '30/12/2020 08:44:19am', 0),
(4, '3212', '30/12/2020 08:44:28am', 1),
(5, '3410', '30/12/2020 05:11:03pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`, `customer_id`) VALUES
(32, '2263', 17, 1, 7),
(33, '3212', 18, 1, 7),
(34, '3410', 16, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `body`) VALUES
(33, 'helloaaa', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `catId` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `brandId` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(12, 'Laptop Dell Inspiron N3493 i3', '5', '7', 'Laptop Dell Inspiron N3493 i3 1005G1/4GB/256GB/14.0\"FHD/Win 10', 0, '39.99', '637189395687155128_dell-inspiron-n3493-den-11606224370.png'),
(13, 'Laptop Dell Inspiron 5593 i5 1035G1/8GB/256GB/2GB MX230/Win10 (N5I5513W)', '5', '7', 'CPU:	Intel Core i5 Ice Lake, 1035G1, 1.00 GHz\r\nRAM:	8 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa rời, NVIDIA GeForce MX230 2GB\r\nCổng kết nối:	2 x USB 3.1, HDMI, LAN (RJ45), USB 2.0, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.90 mm, 2.05 kg\r\nThời điểm ra mắt:	2019', 0, '39.99', 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-213570-600x6001606224882.jpg'),
(14, 'Laptop Dell Vostro 3491 i3', '5', '7', 'CPU:	Intel Core i3 Ice Lake, 1005G1, 1.20 GHz\r\nRAM:	4 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.1, HDMI, LAN (RJ45), USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 21 mm, 1.66 kg\r\nThời điểm ra mắt:	2020', 0, '12.99', 'dell-vostro-3491-i3-70223127-103120-103142-600x6001606230722.jpg'),
(15, 'Laptop Lenovo IdeaPad S145 15IIL', '5', '7', 'CPU:	Intel Core i3 Ice Lake, 1005G1, 1.20 GHz\r\nRAM:	4 GB, DDR4 (On board +1 khe), 2666 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.0, HDMI, USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày17.9 mm, 1.79kg\r\nThời điểm ra mắt:	2019', 0, '39.99', 'lenovo-ideapad-s145-81w8001xvn-a4-216292-600x6001606230770.jpg'),
(16, 'Laptop HP 348 G7 i3 8130U', '5', '-------Select Brand-------', 'CPU:	Intel Core i3 Coffee Lake, 8130U, 2.20 GHz\r\nRAM:	4 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® UHD Graphics 620\r\nCổng kết nối:	3 x USB 3.1, HDMI, LAN (RJ45), USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 1.99 mm, 1.5 kg\r\nThời điểm ra mắt:	2019', 0, '33.5', 'hp-348-g7-i3-9pg83pa-221511-600x6001606230873.jpg'),
(17, 'Laptop HP 348 G7 i5', '5', '9', 'CPU:	Intel Core i5 Comet Lake, 10210U, 1.60 GHz\r\nRAM:	8 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	3 x USB 3.1, HDMI, LAN (RJ45), USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.9 mm, 1.5 kg\r\nThời điểm ra mắt:	2019', 0, '39.99', 'hp-348-g7-i5-9ph06pa-kg2-1-218439-600x6001606230931.jpg'),
(18, 'Laptop HP 15s du1103TU i5 10210U/8GB/512GB', '6', '9', 'CPU:	Intel Core i5 Comet Lake, 10210U, 1.60 GHz\r\nRAM:	8 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.1, HDMI, LAN (RJ45), USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.9 mm, 1.7 kg\r\nThời điểm ra mắt:	2020', 1, '19.99', 'hp-15s-du1103tu-i5-2w7j7pa-600x6001608292789.jpg'),
(19, 'HP Pavilion x360 14 dw0060TU i3 1005G1/4GB/256GB', '7', '9', 'CPU:	Intel Core i3 Ice Lake, 1005G1, 1.20 GHz\r\nRAM:	4 GB, DDR4 (2 khe), 3200 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.1, HDMI, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL + Office Home&Student 2019 vĩnh viễn\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19 m, 1.65 kg\r\nThời điểm ra mắt:	2020', 1, '39.99', 'hp-pavilion-x360-dw0060tu-i3-195m8pa-225695-600x6001608292991.jpg'),
(20, 'Lenovo IdeaPad S340 15IIL i3 1005G1/8GB/512GB', '7', '8', 'CPU:	Intel Core i3 Ice Lake, 1005G1, 1.20 GHz\r\nRAM:	8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz\r\nỔ cứng:	SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.1, HDMI, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa - nắp lưng bằng kim loại, PIN liền\r\nKích thước:	Dày 17.9 mm, 1.79 kg\r\nThời điểm ra mắt:	2019', 1, '49.99', 'lenovo-ideapad-s340-15iil-i3-1005g1-8gb-512gb-win1-xam-6-213528-600x6001608293064.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(15, 'Slider1', 'slider11609323391.png', 0),
(16, 'Slider2', 'slider21609323396.png', 0),
(17, 'Slider3', 'slider31609323401.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
