-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 09:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sieuthitructuyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `idbill` int(11) NOT NULL,
  `iduser` int(11) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(20) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1,
  `bill_ngaydathang` varchar(50) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới 1.Đang xử lý \r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`idbill`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `bill_ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(1, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:05:38am 10/08/2022', 471, 0, NULL, NULL, NULL),
(2, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:06:31am 10/08/2022', 471, 0, NULL, NULL, NULL),
(3, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:07:24am 10/08/2022', 471, 0, NULL, NULL, NULL),
(4, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:07:56am 10/08/2022', 471, 0, NULL, NULL, NULL),
(5, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:11:55am 10/08/2022', 471, 0, NULL, NULL, NULL),
(6, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:12:26am 10/08/2022', 471, 0, NULL, NULL, NULL),
(7, 0, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '11:13:23am 10/08/2022', 471, 0, NULL, NULL, NULL),
(8, 8, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '12:24:28pm 10/08/2022', 671, 0, NULL, NULL, NULL),
(10, 8, 'Trần Y Khoa Đẹp Trai', 'AG', '0397391424', 'ykhoalx123@gmail.com', 1, '02:41:43am 06/09/2022', 210, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `idbl` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`idbl`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(10, 'tui thích cái này', 8, 11, '05:26:11am 09/08/2022'),
(11, 'xịn xò quá', 8, 11, '05:26:18am 09/08/2022');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idcart`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 1),
(2, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 1),
(3, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 1),
(4, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 1),
(5, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 1),
(6, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 2),
(7, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 2),
(8, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 2),
(9, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 2),
(10, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 2),
(11, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 3),
(12, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 3),
(13, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 3),
(14, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 3),
(15, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 3),
(16, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 4),
(17, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 4),
(18, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 4),
(19, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 4),
(20, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 4),
(21, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 5),
(22, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 5),
(23, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 5),
(24, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 5),
(25, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 5),
(26, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 6),
(27, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 6),
(28, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 6),
(29, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 6),
(30, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 6),
(31, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 7),
(32, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 7),
(33, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 7),
(34, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 7),
(35, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 7),
(36, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 8),
(37, 8, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 8),
(38, 8, 19, 'h6.jpg', 'Balo Susan', 35, 1, 35, 8),
(39, 8, 16, 'gl18.jpg', 'Glock-18', 80, 1, 80, 8),
(40, 8, 5, 'h5.png', 'Tay nghe Gaming', 26, 1, 26, 8),
(41, 8, 13, 'h8.jpg', 'Găng tay Thanos', 200, 1, 200, 8),
(42, 0, 11, 'redmi-watch-2.jpg', 'Redmi Watch 2', 250, 1, 250, 9),
(43, 0, 21, 'xedap.jpg', 'Xe đạp Z18', 70, 1, 70, 9),
(44, 0, 22, 'dongho2.jpg', 'Apple Watch 2S', 75, 1, 75, 9),
(45, 8, 21, 'xedap.jpg', 'Xe đạp Z18', 70, 1, 70, 10),
(46, 8, 20, 'airpods.jpg', 'Air Pod', 60, 1, 60, 10),
(47, 8, 17, 'banner.jpg', 'Laptop Gaming S32', 80, 1, 80, 10);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(2, 'Đồng hồ'),
(5, 'Điện thoại'),
(6, 'Laptop'),
(7, 'Áo khoác'),
(8, 'Máy ảnh'),
(10, 'Nước hoa'),
(11, 'Tai nghe'),
(14, 'Xe Moto'),
(16, 'Găng tay'),
(17, 'Ba lô');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `namesp` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `namesp`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(3, 'Áo khoác Teelab', 38.00, 'h16.jpg', 'Áo siêu đẹp', 93, 7),
(5, 'Tay nghe Gaming', 26.00, 'h5.png', 'Tai nghe siêu xịn', 86, 11),
(8, 'Charme Guility', 60.00, 'h7.png', 'Nước hoa thơm', 0, 10),
(9, 'Xiaomi Redmi Note 11', 125.00, 'xiaomi-redmi-note-11.jpg', 'Phiên bản Redmi Note 11 này có các lựa chọn màu sắc với xám và xanh dương. Thiết kế thanh mảnh, các cạnh bo cong nhẹ tinh tế, điện thoại cho cảm giác cầm khá thoải mái.Redmi Note 11 có màn hình 6.43 inch, các cạnh viền mỏng kết hợp camera đục lỗ cho không gian trải nghiệm mở rộng. Màn hình AMOLED cho độ nét và màu sắc chi tiết tốt, tươi sáng, rực rỡ, độ phân giải đạt chuẩn Full HD+, chất lượng khung hình hiển thị rất tuyệt so với tầm giá của sản phẩm.Chip Snapdragon 680 cùng với chip đồ họa Adreno 610 và RAM 4 GB cho khả năng xử lý khá mạnh mẽ và mượt mà, các tác vụ lướt web, nghe nhạc, xem phim, chỉnh sửa ảnh,… đều trơn tru và ổn định, thậm chí bạn có thể với các tựa game mobile như: Liên Quân Mobile, PUBG Mobile cấu hình tầm trung trên máy.\r\n', 19, 5),
(10, ' Xiaomi Pad 5', 158.00, 'xiaomi-pad-5-grey.jpg', 'Máy tính bảng Xiaomi Pad 5 256 GB được trang bị một màn hình siêu ấn tượng với tấm nền IPS LCD kích thước lớn lên đến 11 inch, hỗ trợ độ phân giải WQHD+ cực nét, mang đến khả năng hiển thị sống động, cho bạn đắm chìm trong các không gian giải trí.Phần viền màn hình được làm mỏng đều cả 4 cạnh không chỉ nâng cao trải nghiệm xem, mà còn góp phần giúp máy tính bảng trở nên sang trọng và đẳng cấp hơn rất nhiều. Đặc biệt màn hình này còn có thể hiển thị hơn 1 tỷ màu sắc khác nhau. Hỗ trợ công nghệ hình ảnh Dolby Vision cùng tần số quét 120 Hz cho trải nghiệm hình ảnh mượt mà, đã mắt nhất là khi sử dụng để xem phim hay là chiến game.', 86, 5),
(11, 'Redmi Watch 2', 250.00, 'redmi-watch-2.jpg', 'Redmi Watch 2 Lite sở hữu thiết kế màn hình lớn với kích thước 1.55 inch, tăng 10% diện tích so với bản tiền nhiệm Mi Watch Lite là 1.4 inch, được trang bị công nghệ màn hình TFT cùng độ phân giải 320 x 360 pixels hiển thị đa dạng màu sắc, hình ảnh rõ ràng, thoả mãn thị giác của bạn. Đồng thời, bạn có thể thay đổi giữa hơn 100 giao diện được thiết kế trong mặt đồng hồ tạo nên sự linh hoạt và đa dạng để phù hợp với trang phục hoặc tâm trạng mỗi ngày của bạn.\r\n\r\n', 53, 2),
(12, 'IP MI Home', 80.00, 'camera-ip-mi.jpg', 'Camera giám sát quan sát với góc quay ngang 360 độ và góc quay dọc 108 độ quan sát toàn diện căn phòng hay khu vực lắp đặt, hạn chế tối đa các góc khuất, hỗ trợ theo dõi giám sát tốt hơn mà không cần lắp đặt hệ thống nhiều camera.Đảm bảo chất lượng hình ảnh và tính ổn định hoạt động nhờ hệ thống chống rung, động cơ êm ái, trơn tru.', 0, 8),
(13, 'Găng tay Thanos', 200.00, 'h8.jpg', 'Bút phát bay nữa vũ trụ', 1000, 16),
(14, 'Suzuki Ultraman', 400.00, 'h10.png', 'Chạy bao nhanh', 10004, 14),
(15, 'Gối Ôm Anime', 20.00, 'GoiOmAnime.jpg', 'Mua nó bạn sẽ trở thành 1 thằng wibu', 0, 16),
(16, 'Glock-18', 80.00, 'gl18.jpg', 'Sách võ công mua xog có thể cân 3 dễ dàng', 807, 16),
(17, 'Laptop Gaming S32', 80.00, 'banner.jpg', 'Siêu bền', 72, 6),
(19, 'Balo Susan', 35.00, 'h6.jpg', 'Đẹp', 688, 17),
(20, 'Air Pod', 60.00, 'airpods.jpg', 'Êm tai', 0, 11),
(21, 'Xe đạp Z18', 70.00, 'xedap.jpg', 'Nhanh', 0, 17),
(22, 'Apple Watch 2S', 75.30, 'dongho2.jpg', 'Bền', 877, 2),
(23, 'Găng tay Y KHOA', 40.00, 'n1.jpg', 'ÁDADAD', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtk` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`idtk`, `user`, `pass`, `fullname`, `email`, `address`, `tel`, `role`) VALUES
(8, 'ykhoa', '202cb962ac59075b964b07152d234b70', 'Trần Y Khoa Đẹp Trai', 'ykhoalx123@gmail.com', 'AG', '0397391424', 1),
(10, 'huynhhuy', '202cb962ac59075b964b07152d234b70', 'Huỳnh Văn Huy', 'huy@domain.com', 'AG', '3545645t4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idbill`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbl`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `idbill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
