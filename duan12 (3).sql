-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2024 lúc 09:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan12`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `id_carditem` int(10) NOT NULL,
  `id_user` int(6) NOT NULL,
  `soluong` int(3) NOT NULL,
  `id_donhang` int(10) DEFAULT NULL,
  `id_option` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_item`
--

INSERT INTO `cart_item` (`id_carditem`, `id_user`, `soluong`, `id_donhang`, `id_option`) VALUES
(1, 2, 17, NULL, 2),
(2, 2, 12, NULL, 1),
(20, 1, 1, 3, 43),
(21, 1, 1, 1, 34),
(22, 1, 11, 2, 41),
(23, 1, 2, 3, 31),
(24, 1, 5, 3, 30),
(25, 1, 2, NULL, 20),
(26, 1, 4, 4, 38),
(27, 1, 10, 11, 39),
(28, 1, 1, 10, 38),
(29, 1, 1, 10, 32),
(30, 2, 1, 6, 41),
(31, 2, 1, NULL, 32),
(32, 2, 1, NULL, 33),
(33, 2, 1, 8, 34),
(34, 2, 1, 8, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL,
  `mota_danhmuc` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`, `mota_danhmuc`, `img`) VALUES
(1, 'Chuột', 'Chuột gaming, chuột văn phòng hay những chú chuột không dây, có dây mới nhất bạn có thể tìm thấy tại Poly Computer sẽ xuất hiện tại đây.', 'Banner_danhmuc_1tmp.webp'),
(2, 'Bàn phím cơ', 'Bàn phím cơ là thiết bị không thể thiếu giúp bạn sử dụng máy tính hàng giờ liền tại văn phòng, tại nhà mà không cảm thấy mệt mỏi. Không chỉ làm việc, bàn phím cơ còn là công cụ giúp bạn tự tin chiến thắng đối thủ với những pha highlight mãn nhãn.', 'Banner_danhmuc_2tmp.webp'),
(3, 'Lót chuột', 'Lót chuột giúp bảo vệ feet chuột của bạn và đảm bảo mỗi cú lướt chuột điều nhanh và chính xác, không bị tình trạng giật cục.  |Chỉ cần thay một lót chuột với bề mặt khác, cảm giác lướt chuột của bạn sẽ control hoặc speed tùy theo loại pad bạn chọn để phù ', 'Banner_danhmuc_3.webp'),
(4, 'Tai nghe và Tai nghe có dây và không dây ', 'Các dòng tai nghe có dây và không dây chất lượng cao chính hãng. | Âm thanh là thứ cực kỳ quan trọng trong các tựa game khi mỗi tiếng bước chân, tiếng động nhỏ đều là những thông tin quý giá. |Hãy để những chiếc tai nghe chất lượng cao đến từ các thương h', 'Banner_danhmuc_4.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` text NOT NULL,
  `NgayTaoDon` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_user`, `status`, `NgayTaoDon`) VALUES
(1, 1, 'giaohangthanhcong', '2024-12-11'),
(2, 1, 'huydonhang', '2024-12-11'),
(3, 1, 'giaohangthanhcong', '2024-11-08'),
(4, 1, 'huydonhang', '2024-12-11'),
(6, 2, 'huydonhang', '2024-12-11'),
(8, 2, 'choxacnhan', '2024-12-11'),
(10, 1, 'giaohangthanhcong', '2024-12-11'),
(11, 1, 'giaohangthanhcong', '2024-11-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id_hang` int(5) NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `mota_hang` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`id_hang`, `ten_hang`, `mota_hang`, `img`) VALUES
(1, 'Pulsar', 'Là thương hiệu rất nổi tại thị trường Mỹ và Nhật, Pulsar Gaming Gears là thương hiệu gaming gear đến từ Hàn Quốc nổi tiếng với các sản phẩm tuy đơn giản nhưng tương xứng với giá trị mà người dùng phải bỏ ra.', 'Banner_hang_1tmp.webp'),
(2, 'Filco', 'Filco mechanical keyboards have been prized for years for their excellent longevity and superior typing experience.\r\nThe Japanese-designed Majestouch keyboards have been produced since 2004, but only around 2008 did they become popular when they were adop', 'Banner_hang_2.webp'),
(3, 'DrunkDeer', 'DrunkDeer được thành lập từ năm 2018 với đội ngũ kỹ sư nghiên cứu chuyên sâu vào thế giới bàn phím cơ.|Quá trình nghiên cứu của DrunkDeer được hoàn tất vào tháng 12/2022 với loại switch nam châm (magnetic switch) hoàn toàn mới đạt chuẩn sản xuất hàng loạt', 'Banner_hang_3.webp'),
(4, 'Lamzu', 'Lamzu là một thương hiệu gaming gear cao cấp được thành lập vào năm 2022. Với cam kết mang đến trải nghiệm chơi game tuyệt vời nhất cho người dùng, Lamzu đã tạo ra tiếng vang lớn trong cộng đồng game thủ FPS với sản phẩm đầu tiên là chuột Atlantis.|Sản ph', 'Banner_hang_4.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id_img` varchar(255) NOT NULL,
  `id_sanpham` int(5) NOT NULL,
  `id_optioncontents` int(10) DEFAULT NULL,
  `isDefault` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img`
--

INSERT INTO `img` (`id_img`, `id_sanpham`, `id_optioncontents`, `isDefault`) VALUES
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253636341.webp', 26, 14, b'1'),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253701877 (1).webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253701877.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253865717.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253931253.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109253964021.webp', 26, 14, NULL),
('ban-phim-c-filco-majestouch-2sc-tkl-full-37109254029557.webp', 26, 14, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (1).webp', 1, NULL, b'1'),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (2).webp', 1, 2, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (3).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (4).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (5).webp', 1, 1, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (6).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (7).webp', 1, NULL, NULL),
('Chuột không dây siêu nhẹ Pulsar Xlite V4 (8).webp', 1, NULL, NULL),
('Product_25_13__0_tmp.webp', 25, 13, b'1'),
('Product_25_13__1_tmp.webp', 25, 13, NULL),
('Product_25_13__2_tmp.webp', 25, 13, NULL),
('Product_25_13__3_tmp.webp', 25, 13, NULL),
('Product_25_13__4_tmp.webp', 25, 13, NULL),
('Product_25_13__5_tmp.webp', 25, 13, NULL),
('Product_25_13__6_tmp.webp', 25, 13, NULL),
('Product_25_13__7_tmp.webp', 25, 13, NULL),
('Product_25_13__8_tmp.webp', 25, 13, NULL),
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
('Product_39_36__0_tmp.webp', 39, 36, b'1'),
('Product_39_36__1_tmp.webp', 39, 36, NULL),
('Product_39_36__2_tmp.webp', 39, 36, NULL),
('Product_39_36__3_tmp.webp', 39, 36, NULL),
('Product_39_36__4_tmp.webp', 39, 36, NULL),
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
('Product_41_40__4.webp', 41, 40, NULL),
('Product_42_41__0.webp', 42, 41, b'1'),
('Product_42_41__1.webp', 42, 41, NULL),
('Product_42_41__10.webp', 42, 41, NULL),
('Product_42_41__2.webp', 42, 41, NULL),
('Product_42_41__3.webp', 42, 41, NULL),
('Product_42_41__4.webp', 42, 41, NULL),
('Product_42_41__5.webp', 42, 41, NULL),
('Product_42_41__6.webp', 42, 41, NULL),
('Product_42_41__7.webp', 42, 41, NULL),
('Product_42_41__8.webp', 42, 41, NULL),
('Product_42_41__9.webp', 42, 41, NULL),
('Product_43_42__0.webp', 43, 42, b'1'),
('Product_43_42__1.webp', 43, 42, NULL),
('Product_43_42__2.webp', 43, 42, NULL),
('Product_43_42__3.webp', 43, 42, NULL),
('Product_43_42__4.webp', 43, 42, NULL),
('Product_43_42__5.webp', 43, 42, NULL),
('Product_43_42__6.webp', 43, 42, NULL),
('Product_43_42__7.webp', 43, 42, NULL),
('Product_43_42__8.webp', 43, 42, NULL),
('Product_44_43__0.webp', 44, 43, b'1'),
('Product_44_43__1.webp', 44, 43, NULL),
('Product_44_43__10.webp', 44, 43, NULL),
('Product_44_43__11.webp', 44, 43, NULL),
('Product_44_43__12.webp', 44, 43, NULL),
('Product_44_43__13.webp', 44, 43, NULL),
('Product_44_43__14.webp', 44, 43, NULL),
('Product_44_43__15.webp', 44, 43, NULL),
('Product_44_43__2.webp', 44, 43, NULL),
('Product_44_43__3.webp', 44, 43, NULL),
('Product_44_43__4.webp', 44, 43, NULL),
('Product_44_43__5.webp', 44, 43, NULL),
('Product_44_43__6.webp', 44, 43, NULL),
('Product_44_43__7.webp', 44, 43, NULL),
('Product_44_43__8.webp', 44, 43, NULL),
('Product_44_43__9.webp', 44, 43, NULL),
('Product_45_44__0.webp', 45, 44, b'1'),
('Product_45_44__1.webp', 45, 44, NULL),
('Product_45_44__2.webp', 45, 44, NULL),
('Product_45_44__3.webp', 45, 44, NULL),
('Product_45_44__4.webp', 45, 44, NULL),
('Product_45_44__5.webp', 45, 44, NULL),
('Product_45_44__6.webp', 45, 44, NULL),
('Product_45_44__7.webp', 45, 44, NULL),
('Product_46_45__0.webp', 46, 45, b'1'),
('Product_46_45__1.webp', 46, 45, NULL),
('Product_46_45__2.webp', 46, 45, NULL),
('Product_46_45__3.webp', 46, 45, NULL),
('Product_46_45__4.webp', 46, 45, NULL),
('Product_46_45__5.webp', 46, 45, NULL),
('Product_46_45__6.webp', 46, 45, NULL),
('Product_46_45__7.webp', 46, 45, NULL),
('Product_46_45__8.webp', 46, 45, NULL),
('Product_47_46__0.webp', 47, 46, b'1'),
('Product_47_46__1.webp', 47, 46, NULL),
('Product_47_46__10.webp', 47, 46, NULL),
('Product_47_46__2.webp', 47, 46, NULL),
('Product_47_46__3.webp', 47, 46, NULL),
('Product_47_46__4.webp', 47, 46, NULL),
('Product_47_46__5.webp', 47, 46, NULL),
('Product_47_46__6.webp', 47, 46, NULL),
('Product_47_46__7.webp', 47, 46, NULL),
('Product_47_46__8.webp', 47, 46, NULL),
('Product_47_46__9.webp', 47, 46, NULL),
('Product_48_47__0.webp', 48, 47, b'1'),
('Product_48_47__1.webp', 48, 47, NULL),
('Product_48_47__10.webp', 48, 47, NULL),
('Product_48_47__11.webp', 48, 47, NULL),
('Product_48_47__12.webp', 48, 47, NULL),
('Product_48_47__13.webp', 48, 47, NULL),
('Product_48_47__2.webp', 48, 47, NULL),
('Product_48_47__3.webp', 48, 47, NULL),
('Product_48_47__4.webp', 48, 47, NULL),
('Product_48_47__5.webp', 48, 47, NULL),
('Product_48_47__6.webp', 48, 47, NULL),
('Product_48_47__7.webp', 48, 47, NULL),
('Product_48_47__8.webp', 48, 47, NULL),
('Product_48_47__9.webp', 48, 47, NULL),
('Product_49_48__0.webp', 49, 48, b'1'),
('Product_49_48__1.webp', 49, 48, NULL),
('Product_49_48__2.webp', 49, 48, NULL),
('Product_49_48__3.webp', 49, 48, NULL),
('Product_49_48__4.webp', 49, 48, NULL),
('Product_49_48__5.webp', 49, 48, NULL),
('Product_49_48__6.webp', 49, 48, NULL),
('Product_49_48__7.webp', 49, 48, NULL),
('Product_49_48__8.webp', 49, 48, NULL),
('Product_49_48__9.webp', 49, 48, NULL),
('Product_49_49__0.webp', 49, 49, b'1'),
('Product_49_49__1.webp', 49, 49, NULL),
('Product_49_49__2.webp', 49, 49, NULL),
('Product_49_49__3.webp', 49, 49, NULL),
('Product_49_49__4.webp', 49, 49, NULL),
('Product_49_49__5.webp', 49, 49, NULL),
('Product_49_49__6.webp', 49, 49, NULL),
('Product_49_49__7.webp', 49, 49, NULL),
('Product_49_49__8.webp', 49, 49, NULL),
('Product_49_49__9.webp', 49, 49, NULL),
('Product_50_50__0.webp', 50, 50, b'1'),
('Product_50_50__1.webp', 50, 50, NULL),
('Product_50_50__2.webp', 50, 50, NULL),
('Product_50_50__3.webp', 50, 50, NULL),
('Product_50_50__4.webp', 50, 50, NULL),
('Product_50_50__5.webp', 50, 50, NULL),
('Product_50_50__6.webp', 50, 50, NULL),
('Product_50_50__7.webp', 50, 50, NULL),
('Product_51_51__0.webp', 51, 51, b'1'),
('Product_51_51__1.webp', 51, 51, NULL),
('Product_51_51__2.webp', 51, 51, NULL),
('Product_51_51__3.webp', 51, 51, NULL),
('Product_51_51__4.webp', 51, 51, NULL),
('Product_51_51__5.webp', 51, 51, NULL),
('Product_51_51__6.webp', 51, 51, NULL),
('Product_52_52__0.webp', 52, 52, b'1'),
('Product_52_52__1.webp', 52, 52, NULL),
('Product_52_52__2.webp', 52, 52, NULL),
('Product_52_52__3.webp', 52, 52, NULL),
('Product_52_52__4.webp', 52, 52, NULL),
('Product_52_52__5.webp', 52, 52, NULL),
('Product_52_52__6.webp', 52, 52, NULL),
('Product_53_53__0.webp', 53, 53, b'1'),
('Product_53_53__1.webp', 53, 53, NULL),
('Product_53_53__2.webp', 53, 53, NULL),
('Product_53_53__3.webp', 53, 53, NULL),
('Product_53_53__4.webp', 53, 53, NULL),
('Product_53_53__5.webp', 53, 53, NULL),
('Product_53_53__6.webp', 53, 53, NULL),
('Product_54_54__0.webp', 54, 54, b'1'),
('Product_54_54__1.webp', 54, 54, NULL),
('Product_54_54__10.webp', 54, 54, NULL),
('Product_54_54__11.webp', 54, 54, NULL),
('Product_54_54__12.webp', 54, 54, NULL),
('Product_54_54__13.webp', 54, 54, NULL),
('Product_54_54__2.webp', 54, 54, NULL),
('Product_54_54__3.webp', 54, 54, NULL),
('Product_54_54__4.webp', 54, 54, NULL),
('Product_54_54__5.webp', 54, 54, NULL),
('Product_54_54__6.webp', 54, 54, NULL),
('Product_54_54__7.webp', 54, 54, NULL),
('Product_54_54__8.webp', 54, 54, NULL),
('Product_54_54__9.webp', 54, 54, NULL),
('Product_57_55__0_tmp.webp', 57, 55, b'1'),
('Product_57_55__1_tmp.webp', 57, 55, NULL),
('Product_57_55__2_tmp.webp', 57, 55, NULL),
('Product_57_55__3_tmp.webp', 57, 55, NULL),
('Product_57_55__4_tmp.webp', 57, 55, NULL),
('Product_58_56__0_tmp.jpg', 58, 56, b'1'),
('Product_58_57__0_tmp.webp', 58, 57, b'1'),
('Product_59_58__0.webp', 59, 58, b'1'),
('Product_59_58__1.webp', 59, 58, NULL),
('Product_59_58__2.webp', 59, 58, NULL),
('Product_59_58__3.webp', 59, 58, NULL),
('Product_59_58__4.webp', 59, 58, NULL),
('Product_60_59__0.webp', 60, 59, b'1'),
('Product_60_59__1.webp', 60, 59, NULL),
('Product_60_59__2.webp', 60, 59, NULL),
('Product_60_59__3.webp', 60, 59, NULL),
('Product_60_59__4.webp', 60, 59, NULL),
('Product_61_60__0.webp', 61, 60, b'1'),
('Product_61_60__1.webp', 61, 60, NULL),
('Product_61_60__2.webp', 61, 60, NULL),
('Product_61_60__3.webp', 61, 60, NULL),
('Product_61_60__4.webp', 61, 60, NULL),
('Product_62_61__0_tmp.webp', 62, 61, b'1'),
('Product_62_61__1_tmp.jpg', 62, 61, NULL),
('Product_62_61__2_tmp.jpg', 62, 61, NULL),
('Product_62_61__3_tmp.webp', 62, 61, NULL),
('Product_62_61__4_tmp.jpg', 62, 61, NULL),
('Product_62_61__5_tmp.webp', 62, 61, NULL),
('Product_62_61__6_tmp.jpg', 62, 61, NULL),
('Product_62_61__7_tmp.webp', 62, 61, NULL),
('Product_63_62__0.webp', 63, 62, b'1'),
('Product_63_62__1.webp', 63, 62, NULL),
('Product_63_62__2.webp', 63, 62, NULL),
('Product_63_62__3.webp', 63, 62, NULL),
('Product_63_62__4.jpg', 63, 62, NULL),
('Product_64_63__0.webp', 64, 63, b'1'),
('Product_64_63__1.webp', 64, 63, NULL),
('Product_64_63__2.webp', 64, 63, NULL),
('Product_64_63__3.webp', 64, 63, NULL),
('Product_64_63__4.webp', 64, 63, NULL),
('Product_64_63__5.webp', 64, 63, NULL),
('Product_64_63__6.webp', 64, 63, NULL),
('Product_65_64__0.webp', 65, 64, b'1'),
('Product_65_64__1.webp', 65, 64, NULL),
('Product_65_64__2.webp', 65, 64, NULL),
('Product_65_65__0.webp', 65, 65, b'1'),
('Product_65_65__1.webp', 65, 65, NULL),
('Product_65_65__2.webp', 65, 65, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option`
--

CREATE TABLE `option` (
  `id_option` int(6) NOT NULL,
  `tieude_option` varchar(255) NOT NULL,
  `id_sanpham` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `option`
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
(29, 'Color', 41),
(30, 'Color', 42),
(31, 'Color', 43),
(32, 'Color', 44),
(33, 'Color', 45),
(34, 'Size', 46),
(35, 'Size', 47),
(36, 'Color', 48),
(37, 'Color', 49),
(38, 'Color', 50),
(39, 'Color', 51),
(40, 'Color', 52),
(41, 'Color', 53),
(42, 'Color', 54),
(45, 'Color', 57),
(46, 'Color', 58),
(47, 'Color', 59),
(48, 'Color', 60),
(49, 'Color', 61),
(50, 'Color', 62),
(51, 'Color', 63),
(52, 'Color', 64),
(53, 'màu', 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option_contents`
--

CREATE TABLE `option_contents` (
  `id_optioncontents` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_option` int(6) NOT NULL,
  `isDefault` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `option_contents`
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
(40, 'Original', 29, b'1'),
(41, 'Orginal', 30, b'1'),
(42, 'Original', 31, b'1'),
(43, 'Orginal', 32, b'1'),
(44, 'Orginal', 33, b'1'),
(45, 'Mini', 34, b'1'),
(46, 'Mini', 35, b'1'),
(47, 'Original', 36, b'1'),
(48, 'White', 37, b'1'),
(49, 'Black', 37, NULL),
(50, 'Orginal', 38, b'1'),
(51, 'Original', 39, b'1'),
(52, 'Original', 40, b'1'),
(53, 'Original', 41, b'1'),
(54, 'Original', 42, b'1'),
(55, 'White', 45, b'1'),
(56, 'White 564', 46, b'1'),
(57, 'Grey876', 46, NULL),
(58, 'Original', 47, b'1'),
(59, 'Original', 48, b'1'),
(60, 'Original', 49, b'1'),
(61, 'Original', 50, b'1'),
(62, 'Original', 51, b'1'),
(63, 'Black', 52, b'1'),
(64, 'tráng ', 53, b'1'),
(65, 'ádasd', 53, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(5) NOT NULL,
  `id_hang` int(5) NOT NULL,
  `id_danhmuc` int(5) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `mota_sanpham` text NOT NULL,
  `ngaydang` date NOT NULL DEFAULT current_timestamp(),
  `giamgia` float DEFAULT NULL,
  `gia_sanpham` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_hang`, `id_danhmuc`, `ten_sanpham`, `mota_sanpham`, `ngaydang`, `giamgia`, `gia_sanpham`) VALUES
(25, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2 V2 Medium Inosuke - Pulsar x Demon Slayer Limited Edition', 'Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed                     ', '2024-11-19', 10, 2050000),
(26, 2, 2, 'Bàn phím cơ Filco Majestouch 2SC - Tenkeyless', 'Thiết kế Tenkeyless và Fullsize tiêu chuẩn dành cho bạn cần bàn phím cơ gọn gàng hoặc đầy đủ phím số để xử lý số liệu.\n|Kết nối cáp USB liền với độ trễ rất thấp giúp bạn chơi game hoặc gõ phím nhanh không độ trễ.\n|Chất liệu keycap PBT Doubleshot siêu bền ', '2024-11-19', 10, 3850000),
(30, 3, 2, 'Bàn phím từ HE DrunkDeer A75 | Magnetic Switch - Rapid Trigger', 'Ultra Response Speed: switch từ Hall Effect tốc độ phản hồi nhanh hơn 10 lần so với bàn phím cơ thông thường\r\n|Adjustable Actuation Distance: điều chỉnh điểm nhận phím từ 0.2mm đến 3.8mm, có thể điều chỉnh từng step 0.1mm\r\n|Rapid Trigger: phạm vi độ nhạy ', '2024-11-20', 10, 3850000),
(31, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 - Rapid Trigger', 'Switch nam châm Hall Effect Fuji, sản xuất bởi Gateron\n|20 mức độ nhạy phím từ 0.1mm đến 3.8mm\n|Rapid Trigger luôn được bật và hoạt động liên tục\n|Dual-shot PBT keycap (KOP profile)\n|Khung nhôm CNC\n|Stab PCB mount (Spacebar 6.25u)', '2024-11-20', 0, 4520000),
(34, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 Calabera - Limited Edition - Rapid Trigger', 'Fuji Dual-Rail Magnetic Switches - 36g Linear\n|Điều chỉnh điểm nhận phím từ 0.1mm - 3.8mm\n|Rapid Trigger\n|Keycap custom Dye Sub PBT 5 mặt (Profile AOP)\n|Khung nhôm CNC\n|PCB Mounted with Screw-in Stabilizer (Spacebar 6.25u)\n|Stab PCB', '2024-11-20', 0, 4740000),
(36, 3, 2, 'Bàn phím từ HE Arbiter Studio Polar 65 Phantom - Rapid Trigger', 'Fuji Dual-Rail Magnetic Switches - 36g Linear\n|Điều chỉnh điểm nhận phím từ 0.1mm - 3.8mm\n|Rapid Trigger\n|Phantom PC Clear Keycaps (Cherry Profile)\n|Khung nhôm CNC\n|PCB Mounted with Screw-in Stabilizer (Spacebar 6.25u)\n|Stab PCB mou', '2024-11-20', 10, 4180000),
(37, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H V3 Wireless (Hỗ trợ 8K Polling Rate)', 'Cảm biến Pulsar XS-1 - 32000 DPI, 750 IPS, LOD thấp nhất 0.7mm\r\n|Thiết mới, trọng lượng chỉ còn 53 gram.\r\n|Hỗ trợ report rate 8000Hz nhờ MCU Nordic (dongle 8000Hz bán rời).\r\n|Switch quang học, không bao giờ double click.\r\n|Designed in Korea', '2024-11-20', 0, 2499000),
(38, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Maya X - Đi kèm dongle 8KHz', 'Kích thước to hơn so với Maya.\n|Tương thích phần mềm web Lamzu Aurora.\n|Hỗ trợ kết nối Wireless 8KHz Champion. Chip MCU Nordic.\n|Switch quang học Omron Optical.\n|Maya X thiết kế lưng gồ giữa, khác với Atlantis lưng gồ lùi sâu.\n|Trọng lượng siêu nhẹ', '2024-11-21', 20, 3135000),
(39, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Champion Edition - Hỗ trợ 8KHz', 'Cải tiến trên phiên bản Mini Champion:\r\n\r\n|Switch quang Omron Optical\r\n|Hỗ trợ kết nối Wireless tối đa 8KHz. Chip MCU Nordic.\r\n|Tương thích ngược với dongle 4KHz\r\n|Mua receiver Lamzu 4KHz tại đây.\r\n|Mua receiver Lamzu 8KHz ', '2024-11-21', 20, 2750000),
(40, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Thorn - Hỗ trợ 8KHz', 'Hỗ trợ kết nối Wireless 8KHz (cần update firmware và Dongle 8KHz bán rời).\n|Chip MCU Nordic.\n|Thiết kế công thái học lưng lùi cao hoàn toàn mới.\n|Trọng lượng siêu nhẹ chỉ 52 gram.', '2024-11-21', 30, 2499000),
(41, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Maya Doodle (Limited) - Hỗ trợ 8KHz', 'Kích thước nhỏ hơn so với Maya X.\n|Thiết kế giới hạn được thiết kế bởi NachoCustomz.\n|Hỗ trợ kết nối Wireless 8KHz Champion. Chip MCU Nordic.\n|Switch quang học Omron Optical.\n|Maya thiết kế lưng gồ giữa, khác với Atlantis lưng gồ lùi sâu.', '2024-11-21', 20, 2499000),
(42, 2, 2, 'Bàn phím cơ Filco Majestouch Convertible 3X Matcha - Fullsize', 'Màu xanh Matcha tươi mát đậm chất Nhật Bản đã có phiên bản Convertible 3X - Mẫu bàn phím cơ Bluetooth mới nhất từ Filco!\n\n|Kết nối - Làm việc - Chuyển thiết bị - Lặp lại mỗi ngày.\n\n|Chỉ một bàn phím Filco duy nhất, bạn có thể làm việc đồng thời với 4 thiết bị không dây qua Bluetooth chuẩn 5.1 và thêm 1 máy tính qua cáp USB-C có thể tháo rời. Ngoài ra, Filco Majestouch Convertible 3 tương thích với hai hệ điều hành thông dụng nhất hiện nay là Windows và macOS, hệ điều hành được đa số lập trình viên sử dụng Linux cũng như tương thích với các hệ điều hành di động như iOS, Android.', '2024-11-21', 30, 4510000),
(43, 2, 2, 'Bàn phím cơ Filco Majestouch Convertible 3 Hakua - Tenkeyless', 'Trắng hơn cả trắng, Hakua có nghĩa là Chalk trong tiếng Anh, phấn trắng trong tiếng Việt là một màu trắng tinh tươm, tinh tế với sắc độ trắng và độ tương phản cao như màu phấn trắng trên bản đen hay những nét bút đen trên nền vở trắng.\r\n\r\n|Kết nối - Làm việc - Chuyển thiết bị - Lặp lại mỗi ngày.\r\n\r\n|Chỉ một bàn phím Filco duy nhất, bạn có thể làm việc đồng thời với 4 thiết bị không dây qua Bluetooth chuẩn 5.1 và thêm 1 máy tính qua cáp USB-C có thể tháo rời. Ngoài ra, Filco Majestouch Convertible 3 tương thích với hai hệ điều hành thông dụng nhất hiện nay là Windows và macOS, hệ điều hành được đa số lập trình viên sử dụng Linux cũng như tương thích với các hệ điều hành di động như iOS, Android.\r\n\r\n|Designed in Japan', '2024-11-21', 30, 4290000),
(44, 2, 2, 'Bàn phím cơ Filco Majestouch Minila-R Convertible', 'Mẫu bàn phím cơ vô cùng đặc biệt từ Filco Nhật Bản khi có thể sử dụng như bàn phím cơ Tenkeyless 87 phím trong kích thước của bàn phím cơ Mini chỉ 63 phím.\r\n\r\n|Thiết kế nhỏ gọn và thông minh giúp cho việc gõ phím dễ dàng hơn, giảm thiểu sự di chuyển tay và cảm giác thoải mái hơn khi sử dụng.\r\n|Khả năng chuyển đổi thiết bị kết nối giữa 4 kết nối Bluetooth và 1 kết nối USB, giúp người dùng linh hoạt kết nối với nhiều thiết bị khác nhau.\r\n|Bảo hành dài hạn lên đến 5 năm, đảm bảo chất lượng và sự tin tưởng của người dùng vào sản phẩm.\r\n|Tương thích với tất cả các hệ điều hành như Windows, MacOS, Android và iOS, mang lại tính đa dụng và tiện lợi cho người dùng.\r\n|Chất lượng sản phẩm đến từ thương hiệu bàn phím nổi tiếng Filco, với hơn 30 năm kinh nghiệm trong lĩnh vực bàn phím.\r\n|Designed in Japan', '2024-11-21', 20, 4180000),
(45, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H Medium Rengoku Kyojuro - Pulsar x Demon Slayer Limited Edition', 'Phiên bản mới nhất của chuột Pulsar X2 cực kỳ thành công của Pulsar. X2H là phiên bản sử dụng thiết kế mới nhất cùng form chuột thay đổi lưng cao và lùi sâu hơn dành cho các bạn thích kiểu cầm chuột claw grip.\r\n\r\n|Thiết kế hông hẹp, lưng lùi cao hoàn toàn mới.\r\n|Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed in Korea', '2024-11-21', 20, 2728000),
(46, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H Mini Muichiro Tokito - Pulsar x Demon Slayer Limited Edition', 'Phiên bản mới nhất của chuột Pulsar X2 cực kỳ thành công của Pulsar. X2H là phiên bản sử dụng thiết kế mới nhất cùng form chuột thay đổi lưng cao và lùi sâu hơn dành cho các bạn thích kiểu cầm chuột claw grip.\r\n\r\n|Thiết kế hông hẹp, lưng lùi cao hoàn toàn mới.\r\n|Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed in Korea', '2024-11-21', 20, 2728000),
(47, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H Mini Mitsuri - Pulsar x Demon Slayer Limited Edition', 'Phiên bản mới nhất của chuột Pulsar X2 cực kỳ thành công của Pulsar. X2H là phiên bản sử dụng thiết kế mới nhất cùng form chuột thay đổi lưng cao và lùi sâu hơn dành cho các bạn thích kiểu cầm chuột claw grip.\r\n\r\n|Thiết kế hông hẹp, lưng lùi cao hoàn toàn mới.\r\n|Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed in Korea', '2024-11-21', 20, 3350000),
(48, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H #FR2 Edition (Hỗ trợ 4K Polling Rate) - Limited Edition', 'Phiên bản mới nhất của chuột Pulsar X2 cực kỳ thành công của Pulsar. X2H là phiên bản sử dụng thiết kế mới nhất cùng form chuột thay đổi lưng cao và lùi sâu hơn dành cho các bạn thích kiểu cầm chuột claw grip.\r\n\r\n|Thiết kế hông hẹp, lưng lùi cao hoàn toàn mới.\r\n|Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed in Korea', '2024-11-21', 20, 2499000),
(49, 1, 1, 'Chuột không dây siêu nhẹ Pulsar X2H Super Clear (Hỗ trợ 4K Polling Rate) - Limited Edition', 'Phiên bản mới nhất của chuột Pulsar X2 cực kỳ thành công của Pulsar. X2H là phiên bản sử dụng thiết kế mới nhất cùng form chuột thay đổi lưng cao và lùi sâu hơn dành cho các bạn thích kiểu cầm chuột claw grip.\r\n\r\n|Thiết kế hông hẹp, lưng lùi cao hoàn toàn mới.\r\n|Switch quang học. Cuộn chuột Pulsar chống bụi.\r\n|Thay đổi cấu trúc bên trong, giảm trọng lượng, tăng độ chắc chắn.\r\n|Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz bán rời).\r\n|Và một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.\r\n|Designed in Korea', '2024-11-21', 20, 1875000),
(50, 2, 2, 'Bàn phím cơ tách đôi Filco Majestouch Xacro M10SP', 'Hướng tới trải nghiệm công thái học và bảo vệ sức khỏe đôi tay vàng, Filco Majestouch Xacro M10SP sử dụng thiết kế tách đôi bàn phím giúp mọi tạng người, cỡ vai và độ nghiêng tự nhiên của đôi tay khác nhau đều có thể sử dụng mẫu bàn phím thú vị này từ Filco Nhật Bản.\r\n\r\n|Hỗ trợ 4 layer để gán macro / custom keymap.\r\n|Hỗ trợ nhiều kiểu nâng truyền thống và kiểu tent (dựng lều).\r\n|Kết nối dây rời qua cổng USB Type-C.\r\n|Kết nối hai mảnh qua cáp USB-C.\r\n|Layout 70% tách đôi.\r\n|Tích hợp đệm tiêu âm PCB.\r\n|Designed in Japan', '2024-11-21', 20, 4070000),
(51, 2, 2, 'Bàn phím cơ Filco Majestouch 2SS Edition - Tenkeyless', 'Là bàn phím cơ Filco duy nhất sử dụng switch Cherry MX Speed Silver, Majestouch 2SS là chiếc bàn phím cơ với tốc độ gõ phím nhanh nhất, nhạy nhất của Filco dành cho các game thủ hay những bạn có tốc độ gõ phím siêu nhanh.\r\n\r\nLà một biến thể của Red switch, switch Cherry MX Speed Silver cảm giác gõ đanh gọn, dứt khoát và nhạy hơn cực phù hợp với gõ văn bản và chơi game trong thời gian dài.\r\n\r\n|Hành trình phím suôn mượt kiểu linear\r\n|Hành trình 3.4mm\r\n|Nhận phím tại 1.2mm\r\n|Designed in Japan', '2024-11-21', 20, 3850000),
(54, 2, 2, 'Bàn phím cơ Filco Majestouch Convertible 3X - Fullsize', 'Hãy để bàn phím cơ Filco Majestouch Convertible 3X có thể giúp bạn làm việc đồng thời trên 5 thiết bị khác nhau.\r\n\r\n|Chỉ một bàn phím Filco duy nhất, bạn có thể làm việc đồng thời với 4 thiết bị không dây qua Bluetooth chuẩn 5.1 và thêm 1 máy tính qua cáp USB-C có thể tháo rời. Ngoài ra, Filco Majestouch Convertible 3 tương thích với hai hệ điều hành thông dụng nhất hiện nay là Windows và macOS, hệ điều hành được đa số lập trình viên sử dụng Linux cũng như tương thích với các hệ điều hành di động như iOS, Android.\r\n\r\n|Designed in Japan', '2024-11-21', 20, 4510000),
(57, 4, 1, 'Chuột không dây siêu nhẹ Lamzu Paro - Hỗ trợ 8KHz', ' Kết nối không dây hỗ trợ tối đa 8KHz Polling Rate.\r\n|MCU Nordic 52840.\r\n|Trọng lượng chỉ 48 gram.\r\n|Switch quang học.\r\n|Cuộn chuột quang học.\r\n|Vỏ chuột kín không lỗ.                                            ', '2024-11-28', 10, 2499000),
(58, 4, 1, 'Bàn phím cơ Filco Majestouch 3 Ninja - Fullsize uppdate 5', ' Kết nối không dây hỗ trợ tối đa 8KHz Polling Rate.\r\n|MCU Nordic 52840.\r\n|Trọng lượng chỉ 48 gram.\r\n|Switch quang học.\r\n|Cuộn chuột quang học.\r\n|Vỏ chuột kín không lỗ.  ', '2024-11-28', 20, 384885),
(59, 1, 3, 'Lót chuột Pulsar eS2 Zenitsu - Pulsar x Demon Slayer Limited Edition', ' Bề mặt vải Microfiber\r\n|Tốc độ Medium Speed\r\n|Đế vật liệu Alpha Cell siêu bám bàn.\r\n|Bo viền 360 độ.\r\n|Tối ưu cho chơi game FPS.\r\n|Designed in Korea', '2024-11-28', 20, 1100000),
(60, 1, 3, 'Lót chuột Pulsar eS2 Tanjiro - Pulsar x Demon Slayer Limited Edition', ' Phiên bản đặc biệt hợp tác giữa Pulsar và Demon Slayer\r\n|Bề mặt vải Microfiber\r\n|Tốc độ Medium Speed\r\n|Đế vật liệu Alpha Cell siêu bám bàn.\r\n|Bo viền 360 độ.\r\n|Tối ưu cho chơi game FPS.\r\n|Designed in Korea', '2024-11-28', 20, 1100000),
(61, 1, 3, 'Lót chuột Pulsar eS2 Nezuko - Pulsar x Demon Slayer Limited Edition', ' Phiên bản đặc biệt hợp tác giữa Pulsar và Demon Slayer\r\n|Bề mặt vải Microfiber\r\n|Tốc độ Medium Speed\r\n|Đế vật liệu Alpha Cell siêu bám bàn.\r\n|Bo viền 360 độ.\r\n|Tối ưu cho chơi game FPS.\r\n|Designed in Korea', '2024-11-28', 20, 1100000),
(62, 1, 3, 'Lót chuột Pulsar ParaSpeed V2 (High Speed) - XL đến XXL ', ' Mềm hơn, giảm cảm giác nhám khi di chuột.\r\n|Chống nước.\r\n|Chống sờn.\r\n|Tốc độ nhanh như lót chuột cứng nhưng vẫn dễ dừng chuột như lót chuột mềm.\r\n|Bo viền 360 độ.\r\n|Đế cao su chống trượt.\r\n|Tối ưu cho chơi game FPS.\r\n|Designed in Korea     ', '2024-11-28', 10, 792000),
(63, 2, 4, 'Tai nghe IEM Razer Moray', ' ÂM THANH ĐƯỢC CHỨNG NHẬN THX®\r\n|THIẾT KẾ ÂM THANH ĐIỀU KHIỂN KÉP HYBRID\r\n|CÁCH LY TIẾNG ỒN THỤ ĐỘNG VƯỢT TRỘI\r\n|TIP TAI TÙY CHỈNH VÀ HỘP ĐỰNG\r\n\r\n', '2024-11-28', 20, 3500000),
(64, 2, 4, 'Tai nghe Fnatic REACT+ | 7.1 Virtual Surround USB soundcard', ' Đi kèm USB soundcard: hỗ trợ giả lập âm thanh 7.1\r\n|Kích thước driver 53mm.\r\n|Âm thanh giả lập 7.1.\r\n|Kết nối: có dây, cổng 3.5mm.\r\n|Chất liệu đệm tai: da protein, velour.', '2024-11-28', 10, 2500000),
(65, 3, 2, 'sanpham test 1123', ' mota 1\r\n|mota2\r\n|mota3', '2024-12-10', 10, 2500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `ten_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `ten_user`, `password`, `gmail`, `phonenumber`, `address`, `role`) VALUES
(1, 'admin_duan1', 'admin_duan1', 'admin_duan1@gamil.com', '0981237674', 'phú yên', b'1'),
(2, 'User2123', 'Khanh09123@', 'user123123@gmail.com', '0918231234', 'ádsad', NULL),
(3, 'use', 'Khanh083248', 'khanhsad@gmail.com', '0988998123', NULL, NULL),
(4, 'cuongpham', 'Cuong123@', 'cuongpham@gmaiil.com', '099123123123', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_carditem`),
  ADD KEY `id_cart` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_option` (`id_option`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id_hang`);

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_optioncontents` (`id_optioncontents`);

--
-- Chỉ mục cho bảng `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `option_contents`
--
ALTER TABLE `option_contents`
  ADD PRIMARY KEY (`id_optioncontents`),
  ADD KEY `id_option` (`id_option`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_hang` (`id_hang`,`id_danhmuc`),
  ADD KEY `danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id_carditem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `id_hang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `option`
--
ALTER TABLE `option`
  MODIFY `id_option` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `option_contents`
--
ALTER TABLE `option_contents`
  MODIFY `id_optioncontents` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_cua_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`id_option`) REFERENCES `option_contents` (`id_optioncontents`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
