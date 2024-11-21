-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 07:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id_carditem` int(10) NOT NULL,
  `id_user` int(6) NOT NULL,
  `soluong` int(3) NOT NULL,
  `id_option` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id_carditem`, `id_user`, `soluong`, `id_option`) VALUES
(1, 2, 17, 2),
(2, 2, 12, 1),
(3, 1, 1, 14),
(4, 1, 6, 19),
(5, 1, 5, 31),
(6, 1, 4, 30),
(7, 1, 1, 32),
(8, 1, 2, 39);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL,
  `mota_danhmuc` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`, `mota_danhmuc`, `img`) VALUES
(1, 'Chuột', 'Chuột gaming, chuột văn phòng hay những chú chuột không dây, có dây mới nhất bạn có thể tìm thấy tại Poly Computer sẽ xuất hiện tại đây.', 'Banner_danhmuc_1.webp'),
(2, 'Bàn phím cơ', 'Bàn phím cơ là thiết bị không thể thiếu giúp bạn sử dụng máy tính hàng giờ liền tại văn phòng, tại nhà mà không cảm thấy mệt mỏi. Không chỉ làm việc, bàn phím cơ còn là công cụ giúp bạn tự tin chiến thắng đối thủ với những pha highlight mãn nhãn.', 'Banner_danhmuc_2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `id_hang` int(5) NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `mota_hang` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id_hang`, `ten_hang`, `mota_hang`, `img`) VALUES
(1, 'Pulsar', 'Là thương hiệu rất nổi tại thị trường Mỹ và Nhật, Pulsar Gaming Gears là thương hiệu gaming gear đến từ Hàn Quốc nổi tiếng với các sản phẩm tuy đơn giản nhưng tương xứng với giá trị mà người dùng phải bỏ ra.', 'Banner_hang_1.webp'),
(2, 'Filco', 'Filco mechanical keyboards have been prized for years for their excellent longevity and superior typing experience.\r\nThe Japanese-designed Majestouch keyboards have been produced since 2004, but only around 2008 did they become popular when they were adop', 'Banner_hang_2.webp'),
(3, 'DrunkDeer', 'DrunkDeer được thành lập từ năm 2018 với đội ngũ kỹ sư nghiên cứu chuyên sâu vào thế giới bàn phím cơ.|Quá trình nghiên cứu của DrunkDeer được hoàn tất vào tháng 12/2022 với loại switch nam châm (magnetic switch) hoàn toàn mới đạt chuẩn sản xuất hàng loạt', 'Banner_hang_3.webp'),
(4, 'Lamzu', 'Lamzu là một thương hiệu gaming gear cao cấp được thành lập vào năm 2022. Với cam kết mang đến trải nghiệm chơi game tuyệt vời nhất cho người dùng, Lamzu đã tạo ra tiếng vang lớn trong cộng đồng game thủ FPS với sản phẩm đầu tiên là chuột Atlantis.|Sản ph', 'Banner_hang_4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id_img` varchar(255) NOT NULL,
  `id_sanpham` int(5) NOT NULL,
  `id_optioncontents` int(10) DEFAULT NULL,
  `isDefault` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id_img`, `id_sanpham`, `id_optioncontents`, `isDefault`) VALUES
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253636341.webp', 26, 14, b'1'),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253701877 (1).webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253701877.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253865717.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253931253.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253964021.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109254029557.webp', 26, 14, NULL),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719668469.webp', 25, 13, b'1'),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719734005.webp', 25, 13, NULL),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719799541.webp', 25, 13, NULL),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719832309.webp', 25, 13, NULL),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719930613.webp', 25, 13, NULL),
('chu-t-khong-day-sieu-nh-pulsar-x2-v2-medium-inosuke-pulsar-x-demon-slayer-limited-edition-40070719963381.webp', 25, 13, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (1).webp', 1, NULL, b'1'),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (2).webp', 1, 2, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (3).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (4).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (5).webp', 1, 1, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (6).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (7).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (8).webp', 1, NULL, NULL),
('Product_30_18__0.webp', 30, 18, b'1'),
('Product_30_18__1.webp', 30, 18, NULL),
('Product_30_18__2.webp', 30, 18, NULL),
('Product_30_19__0.webp', 30, 19, b'1'),
('Product_30_19__1.webp', 30, 19, NULL),
('Product_30_19__2.webp', 30, 19, NULL),
('Product_30_19__3.webp', 30, 19, NULL),
('Product_31_20__0.webp', 31, 20, b'1'),
('Product_31_20__1.webp', 31, 20, NULL),
('Product_31_20__2.webp', 31, 20, NULL),
('Product_31_20__3.webp', 31, 20, NULL),
('Product_31_20__4.webp', 31, 20, NULL),
('Product_31_20__5.webp', 31, 20, NULL),
('Product_31_20__6.webp', 31, 20, NULL),
('Product_31_21__0.webp', 31, 21, b'1'),
('Product_31_21__1.webp', 31, 21, NULL),
('Product_31_21__2.webp', 31, 21, NULL),
('Product_31_21__3.webp', 31, 21, NULL),
('Product_31_21__4.webp', 31, 21, NULL),
('Product_31_21__5.webp', 31, 21, NULL),
('Product_31_21__6.webp', 31, 21, NULL),
('Product_32_22__0.webp', 32, 22, b'1'),
('Product_32_22__1.webp', 32, 22, NULL),
('Product_32_22__2.webp', 32, 22, NULL),
('Product_32_22__3.webp', 32, 22, NULL),
('Product_32_22__4.webp', 32, 22, NULL),
('Product_32_22__5.webp', 32, 22, NULL),
('Product_32_22__6.webp', 32, 22, NULL),
('Product_32_23__0.webp', 32, 23, b'1'),
('Product_32_23__1.webp', 32, 23, NULL),
('Product_32_23__2.webp', 32, 23, NULL),
('Product_32_23__3.webp', 32, 23, NULL),
('Product_32_23__4.webp', 32, 23, NULL),
('Product_32_23__5.webp', 32, 23, NULL),
('Product_32_23__6.webp', 32, 23, NULL),
('Product_33_24__0.webp', 33, 24, b'1'),
('Product_33_24__1.webp', 33, 24, NULL),
('Product_33_24__2.webp', 33, 24, NULL),
('Product_33_24__3.webp', 33, 24, NULL),
('Product_33_24__4.webp', 33, 24, NULL),
('Product_33_24__5.webp', 33, 24, NULL),
('Product_33_24__6.webp', 33, 24, NULL),
('Product_33_25__0.webp', 33, 25, b'1'),
('Product_33_25__1.webp', 33, 25, NULL),
('Product_33_25__2.webp', 33, 25, NULL),
('Product_33_25__3.webp', 33, 25, NULL),
('Product_33_25__4.webp', 33, 25, NULL),
('Product_33_25__5.webp', 33, 25, NULL),
('Product_33_25__6.webp', 33, 25, NULL),
('Product_34_26__0.webp', 34, 26, b'1'),
('Product_34_26__1.webp', 34, 26, NULL),
('Product_34_26__2.webp', 34, 26, NULL),
('Product_34_26__3.webp', 34, 26, NULL),
('Product_34_26__4.webp', 34, 26, NULL),
('Product_34_26__5.webp', 34, 26, NULL),
('Product_34_26__6.webp', 34, 26, NULL),
('Product_34_26__7.webp', 34, 26, NULL),
('Product_34_26__8.webp', 34, 26, NULL),
('Product_36_28__0.webp', 36, 28, b'1'),
('Product_36_28__1.webp', 36, 28, NULL),
('Product_36_28__2.webp', 36, 28, NULL),
('Product_36_28__3.webp', 36, 28, NULL),
('Product_36_28__4.webp', 36, 28, NULL),
('Product_36_28__5.webp', 36, 28, NULL),
('Product_36_28__6.webp', 36, 28, NULL),
('Product_36_28__7.webp', 36, 28, NULL),
('Product_36_28__8.webp', 36, 28, NULL),
('Product_36_29__0.webp', 36, 29, b'1'),
('Product_36_29__1.webp', 36, 29, NULL),
('Product_36_29__2.webp', 36, 29, NULL),
('Product_36_29__3.webp', 36, 29, NULL),
('Product_36_29__4.webp', 36, 29, NULL),
('Product_36_29__5.webp', 36, 29, NULL),
('Product_36_29__6.webp', 36, 29, NULL),
('Product_36_29__7.webp', 36, 29, NULL),
('Product_36_29__8.webp', 36, 29, NULL),
('Product_36_29__9.webp', 36, 29, NULL),
('Product_37_30__0.webp', 37, 30, b'1'),
('Product_37_30__1.webp', 37, 30, NULL),
('Product_37_30__2.webp', 37, 30, NULL),
('Product_37_30__3.webp', 37, 30, NULL),
('Product_37_30__4.webp', 37, 30, NULL),
('Product_37_30__5.webp', 37, 30, NULL),
('Product_37_31__0.webp', 37, 31, b'1'),
('Product_37_31__1.webp', 37, 31, NULL),
('Product_37_31__2.webp', 37, 31, NULL),
('Product_37_31__3.webp', 37, 31, NULL),
('Product_37_31__4.webp', 37, 31, NULL),
('Product_37_31__5.webp', 37, 31, NULL),
('Product_38_32__0.webp', 38, 32, b'1'),
('Product_38_32__1.webp', 38, 32, NULL),
('Product_38_32__2.webp', 38, 32, NULL),
('Product_38_32__3.webp', 38, 32, NULL),
('Product_38_32__4.webp', 38, 32, NULL),
('Product_38_33__0.webp', 38, 33, b'1'),
('Product_38_33__1.webp', 38, 33, NULL),
('Product_38_33__2.webp', 38, 33, NULL),
('Product_38_33__3.webp', 38, 33, NULL),
('Product_38_33__4.webp', 38, 33, NULL),
('Product_38_34__0.webp', 38, 34, b'1'),
('Product_38_34__1.webp', 38, 34, NULL),
('Product_38_34__2.webp', 38, 34, NULL),
('Product_38_34__3.webp', 38, 34, NULL),
('Product_38_34__4.webp', 38, 34, NULL),
('Product_38_35__0.webp', 38, 35, b'1'),
('Product_38_35__1.webp', 38, 35, NULL),
('Product_38_35__2.webp', 38, 35, NULL),
('Product_38_35__3.webp', 38, 35, NULL),
('Product_38_35__4.webp', 38, 35, NULL),
('Product_39_36__0.webp', 39, 36, b'1'),
('Product_39_36__1.webp', 39, 36, NULL),
('Product_39_36__2.webp', 39, 36, NULL),
('Product_39_36__3.webp', 39, 36, NULL),
('Product_39_36__4.webp', 39, 36, NULL),
('Product_39_37__0.webp', 39, 37, b'1'),
('Product_39_37__1.webp', 39, 37, NULL),
('Product_39_37__2.webp', 39, 37, NULL),
('Product_39_37__3.webp', 39, 37, NULL),
('Product_39_37__4.webp', 39, 37, NULL),
('Product_40_38__0.webp', 40, 38, b'1'),
('Product_40_38__1.webp', 40, 38, NULL),
('Product_40_38__2.webp', 40, 38, NULL),
('Product_40_38__3.webp', 40, 38, NULL),
('Product_40_38__4.webp', 40, 38, NULL),
('Product_40_39__0.webp', 40, 39, b'1'),
('Product_40_39__1.webp', 40, 39, NULL),
('Product_40_39__2.webp', 40, 39, NULL),
('Product_40_39__3.webp', 40, 39, NULL),
('Product_40_39__4.webp', 40, 39, NULL),
('Product_40_39__5.webp', 40, 39, NULL),
('Product_41_40__0.webp', 41, 40, b'1'),
('Product_41_40__1.webp', 41, 40, NULL),
('Product_41_40__2.webp', 41, 40, NULL),
('Product_41_40__3.webp', 41, 40, NULL),
('Product_41_40__4.webp', 41, 40, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id_option` int(6) NOT NULL,
  `tieude_option` varchar(255) NOT NULL,
  `id_sanpham` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id_option`, `tieude_option`, `id_sanpham`) VALUES
(1, 'Màu', 1),
(13, 'Color', 25),
(14, 'Màu', 26),
(18, 'Color', 30),
(19, 'Border Color', 31),
(22, 'Color', 34),
(24, 'Color', 36),
(25, 'Color', 37),
(26, 'Color', 38),
(27, 'Color', 39),
(28, 'Color', 40),
(29, 'Color', 41);

-- --------------------------------------------------------

--
-- Table structure for table `option_contents`
--

CREATE TABLE `option_contents` (
  `id_optioncontents` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_option` int(6) NOT NULL,
  `isDefault` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_contents`
--

INSERT INTO `option_contents` (`id_optioncontents`, `noidung`, `id_option`, `isDefault`) VALUES
(1, 'Đen', 1, b'1'),
(2, 'Trắng', 1, NULL),
(13, 'Orginal', 13, b'1'),
(14, 'Original', 14, b'1'),
(18, 'White', 18, b'1'),
(19, 'Black', 18, NULL),
(20, 'White', 19, b'1'),
(21, 'Black', 19, NULL),
(26, 'Original', 22, b'1'),
(28, 'Black', 24, b'1'),
(29, 'White', 24, NULL),
(30, 'Black', 25, b'1'),
(31, 'White', 25, NULL),
(32, 'Purple', 26, b'1'),
(33, 'Black', 26, NULL),
(34, 'Grey', 26, NULL),
(35, 'White', 26, NULL),
(36, 'Pink', 27, b'1'),
(37, 'White', 27, NULL),
(38, 'White', 28, b'1'),
(39, 'Black', 28, NULL),
(40, 'Original', 29, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(5) NOT NULL,
  `id_hang` int(5) NOT NULL,
  `id_danhmuc` int(5) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `mota_sanpham` varchar(255) NOT NULL,
  `ngaydang` date NOT NULL DEFAULT current_timestamp(),
  `giamgia` float DEFAULT NULL,
  `gia_sanpham` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_hang`, `id_danhmuc`, `ten_sanpham`, `mota_sanpham`, `ngaydang`, `giamgia`, `gia_sanpham`) VALUES
(1, 1, 1, 'Chuột không dây siêu nhẹ Pulsar Xlite V4', 'Cảm biến Pulsar XS-1 - 32000 DPI, 750 IPS, LOD thấp nhất 0.7mm \n|Switch quang học. Cuộn chuột Pulsar chống bụi.\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn \n|Hỗ trợ report rate 8000Hz nhờ MCU Nordic (dongle 8000Hz bán rời)', '2024-11-09', 5, 2250000),
(25, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2 V2 Medium Inosuke - Pulsar x Demon Slayer Limited Edition', 'Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed ', '2024-11-19', 10, 2050000),
(26, 2, 2, 'Bàn phím cơ Filco Majestouch 2SC - Tenkeyless', 'Thiết kế Tenkeyless và Fullsize tiêu chuẩn dành cho bạn cần bàn phím cơ gọn gàng hoặc đầy đủ phím số để xử lý số liệu.\n|Kết nối cáp USB liền với độ trễ rất thấp giúp bạn chơi game hoặc gõ phím nhanh không độ trễ.\n|Chất liệu keycap PBT Doubleshot siêu bền ', '2024-11-19', 10, 3850000),
(30, 3, 2, 'Bàn phím từ HE DrunkDeer A75 | Magnetic Switch - Rapid Trigger', 'Ultra Response Speed: switch từ Hall Effect tốc độ phản hồi nhanh hơn 10 lần so với bàn phím cơ thông thường\r\n|Adjustable Actuation Distance: điều chỉnh điểm nhận phím từ 0.2mm đến 3.8mm, có thể điều chỉnh từng step 0.1mm\r\n|Rapid Trigger: phạm vi độ nhạy ', '2024-11-20', 10, 3850000),
(31, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 - Rapid Trigger', 'Switch nam châm Hall Effect Fuji, sản xuất bởi Gateron\r\n|20 mức độ nhạy phím từ 0.1mm đến 3.8mm\r\n|Rapid Trigger luôn được bật và hoạt động liên tục\r\n|Dual-shot PBT keycap (KOP profile)\r\n|Khung nhôm CNC\r\n|Stab PCB mount (Spacebar 6.25u)\r\n|Đèn LED RGB 16 hi', '2024-11-20', 0, 4520000),
(34, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 Calabera - Limited Edition - Rapid Trigger', 'Fuji Dual-Rail Magnetic Switches - 36g Linear\r\n|Điều chỉnh điểm nhận phím từ 0.1mm - 3.8mm\r\n|Rapid Trigger\r\n|Keycap custom Dye Sub PBT 5 mặt (Profile AOP)\r\n|Khung nhôm CNC\r\n|PCB Mounted with Screw-in Stabilizer (Spacebar 6.25u)\r\n|Khung nhôm CNC\r\n|Stab PCB', '2024-11-20', 0, 4740000),
(36, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 Phantom - Rapid Trigger', 'Fuji Dual-Rail Magnetic Switches - 36g Linear\r\n|Điều chỉnh điểm nhận phím từ 0.1mm - 3.8mm\r\n|Rapid Trigger\r\n|Phantom PC Clear Keycaps (Cherry Profile)\r\n|Khung nhôm CNC\r\n|PCB Mounted with Screw-in Stabilizer (Spacebar 6.25u)\r\n|Khung nhôm CNC\r\n|Stab PCB mou', '2024-11-20', 10, 4180000),
(37, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H V3 Wireless (Hỗ trợ 8K Polling Rate)', 'Cảm biến Pulsar XS-1 - 32000 DPI, 750 IPS, LOD thấp nhất 0.7mm\r\n|Thiết mới, trọng lượng chỉ còn 53 gram.\r\n|Hỗ trợ report rate 8000Hz nhờ MCU Nordic (dongle 8000Hz bán rời).\r\n|Switch quang học, không bao giờ double click.\r\n|Designed in Korea', '2024-11-20', 0, 2499000),
(38, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Maya X - Đi kèm dongle 8KHz', 'Kích thước to hơn so với Maya.\n|Tương thích phần mềm web Lamzu Aurora.\n|Hỗ trợ kết nối Wireless 8KHz Champion. Chip MCU Nordic.\n|Switch quang học Omron Optical.\n|Maya X thiết kế lưng gồ giữa, khác với Atlantis lưng gồ lùi sâu.\n|Trọng lượng siêu nhẹ', '2024-11-21', 20, 3135000),
(39, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Champion Edition - Hỗ trợ 8KHz', 'Cải tiến trên phiên bản Mini Champion:\r\n\r\n|Switch quang Omron Optical\r\n|Hỗ trợ kết nối Wireless tối đa 8KHz. Chip MCU Nordic.\r\n|Tương thích ngược với dongle 4KHz\r\n|Mua receiver Lamzu 4KHz tại đây.\r\n|Mua receiver Lamzu 8KHz', '2024-11-21', 20, 2750000),
(40, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Thorn - Hỗ trợ 8KHz', 'Hỗ trợ kết nối Wireless 8KHz (cần update firmware và Dongle 8KHz bán rời).\r\nChip MCU Nordic.\r\nThiết kế công thái học lưng lùi cao hoàn toàn mới.\r\nTrọng lượng siêu nhẹ chỉ 52 gram.', '2024-11-21', 30, 2499000),
(41, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Maya Doodle (Limited) - Hỗ trợ 8KHz', 'Kích thước nhỏ hơn so với Maya X.\r\n|Thiết kế giới hạn được thiết kế bởi NachoCustomz.\r\n|Hỗ trợ kết nối Wireless 8KHz Champion. Chip MCU Nordic.\r\n|Switch quang học Omron Optical.\r\n|Maya thiết kế lưng gồ giữa, khác với Atlantis lưng gồ lùi sâu.\r\n|Trọng lượn', '2024-11-21', 20, 2499000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `ten_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `ten_user`, `password`, `gmail`, `phonenumber`, `address`, `role`) VALUES
(1, 'admin_duan1', 'admin_duan1', 'admin_duan1@gamil.com', '0981237674', '', b'1'),
(2, 'User2123', 'Khanh09123@', 'user123123@gmail.com', '0918231234', '', NULL),
(3, 'use', 'Khanh083248', 'khanhsad@gmail.com', '0988998123', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_carditem`),
  ADD KEY `id_cart` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_option` (`id_option`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id_hang`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_optioncontents` (`id_optioncontents`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `option_contents`
--
ALTER TABLE `option_contents`
  ADD PRIMARY KEY (`id_optioncontents`),
  ADD KEY `id_option` (`id_option`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_hang` (`id_hang`,`id_danhmuc`),
  ADD KEY `danhmuc` (`id_danhmuc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id_carditem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `id_hang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id_option` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `option_contents`
--
ALTER TABLE `option_contents`
  MODIFY `id_optioncontents` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_cua_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`id_option`) REFERENCES `option_contents` (`id_optioncontents`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
