-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2024 lúc 01:04 PM
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
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_card` int(6) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `id_carditem` int(10) NOT NULL,
  `id_cart` int(6) NOT NULL,
  `id_sanpham` int(5) NOT NULL,
  `soluong` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL,
  `mota_danhmuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id_hang` int(5) NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `mota_hang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id_img` int(5) NOT NULL,
  `id_sanpham` int(5) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option`
--

CREATE TABLE `option` (
  `id_option` int(6) NOT NULL,
  `tieude_option` varchar(255) NOT NULL,
  `id_sanpham` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option_contents`
--

CREATE TABLE `option_contents` (
  `id_optioncontents` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_option` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(5) NOT NULL,
  `id_hang` int(5) NOT NULL,
  `id_danhmuc` int(5) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `mota_sanpham` varchar(255) NOT NULL,
  `ngaydang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `ten_user` varchar(255) NOT NULL,
  `passwork` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `phonenumber` int(13) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id_card` (`id_card`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_carditem`),
  ADD KEY `id_cart` (`id_cart`,`id_sanpham`),
  ADD KEY `cartitems` (`id_sanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

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
  ADD KEY `id_sanpham` (`id_sanpham`);

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
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_cua_user` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_card`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cartitems` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_of_product` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `option_contents`
--
ALTER TABLE `option_contents`
  ADD CONSTRAINT `option_contents_ibfk_1` FOREIGN KEY (`id_option`) REFERENCES `option` (`id_option`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hang` FOREIGN KEY (`id_hang`) REFERENCES `hang` (`id_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `img` FOREIGN KEY (`id_sanpham`) REFERENCES `img` (`id_sanpham`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
