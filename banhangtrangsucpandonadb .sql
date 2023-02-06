-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2023 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhangtrangsucpandonadb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idad` int(11) NOT NULL,
  `tenad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idad`, `tenad`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `matkhau`) VALUES
(3, 'Hoang', 399206626, 'Nam', '2002-09-28', 'hn', 'hoangk0202@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idctdh` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `dhcode` int(11) NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idctdh`, `idsp`, `dhcode`, `gia`, `soluong`, `tongtien`) VALUES
(102, 92, 1413, 9000000, 1, 9000000),
(103, 89, 1413, 5000000, 1, 5000000),
(104, 89, 28064, 5000000, 1, 5000000),
(105, 80, 28064, 12000000, 1, 12000000),
(110, 92, 94790, 9000000, 3, 27000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `iddh` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `dhcode` int(11) NOT NULL,
  `sdt` int(10) DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `tongtien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`iddh`, `idkh`, `dhcode`, `sdt`, `diachi`, `ngaydathang`, `trangthai`, `tongtien`) VALUES
(10020, 89, 1413, 399206626, 'gg', '2023-02-02', 0, 14000000),
(10021, 89, 28064, 399206626, 'gg', '2023-02-02', 0, 17000000),
(10029, 89, 94790, 399206626, 'gg', '2023-02-02', 0, 27000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idgh` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `idloai` int(11) NOT NULL,
  `gia` double NOT NULL,
  `soluong` int(50) NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonggia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkh` int(11) NOT NULL,
  `tenkh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` int(10) DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkh`, `tenkh`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `matkhau`) VALUES
(70, 'long02', 1234567890, 'nữ', '2002-12-12', 'phúc thọ hà nội', 'baokhanhvietnam00@gmail.com', 'b0cf85c184abb668c8e30c7ebf8753ea'),
(72, 'viet11', 1234567890, 'Nữ', '2001-12-20', 'ha nam', 'hoangj82@gmail.com', '5abefbdcf990a8df6baedca3eecf84f1'),
(73, 'hoang', 1234567890, 'Nam', '2022-11-17', 'eee', 'hoangk0202@gmail.com', '5abefbdcf990a8df6baedca3eecf84f1'),
(89, 'long555', 399206626, 'nam', '2023-01-22', 'gg', 'hoanghai44@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(91, 'minh', 372079879, 'Nam', '2023-02-08', 'ha noi', 'baokhanh1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(92, 'Hùng', 372079879, 'Nam', '2023-02-08', 'ha noi', 'hhhddk776@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(93, 'Mai', 372079879, 'Nam', '2023-02-08', 'ha noi', 'hkt999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `idloai` int(11) NOT NULL,
  `tenloai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`idloai`, `tenloai`, `mota`) VALUES
(14, 'Nhẫn', 'Nhẫn đến từ châu âu'),
(15, 'Bông tai', 'Bông tai nhập khẩu Hàn Quốc'),
(16, 'Vòng tay', 'Vòng tay Pháp sang trọng'),
(17, 'Vòng cổ', 'Vòng cổ Hà Lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `idloai` int(11) DEFAULT NULL,
  `tensp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int(30) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `anh` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `ngaycapnhat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `idloai`, `tensp`, `soluong`, `gia`, `anh`, `mota`, `ngaytao`, `ngaycapnhat`) VALUES
(58, 15, 'Bông tai đính ngọc trai', 0, 4500000, '5.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL),
(80, 16, 'Vòng tay vàng 24k', 1, 12000000, '10.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL),
(81, 17, 'Vòng cổ kim cương', 1, 1000000, '14.png', 'Lấy cảm hứng từ vẻ đẹp kiến trúc cổ kính Châu Âu hòa cùng phong cách của những quý cô Pháp hiện đại, các thiết kế trang sức thời trang với họa tiết màu sắc tươi tắn nhưng không lòe loẹt giúp toát lên tinh thần tự chủ, phóng khoáng, thanh tao và thời thượng của các cô gái. Thương hiệu trang sức bạc PNJSilver vừa ra mắt bộ sưu tập nhẫn bạc Enamel được ứng dụng kỹ nghệ Enamel đã thêm vào dòng sản phẩm bạc với chiếc nhẫn có nhiều màu sắc mới lạ độc đáo, tô điểm thêm nét đẹp tinh tế của các cô gái.', '2022-12-02', NULL),
(84, 16, 'Vòng tay vàng mỹ kí', 15, 900000, '9.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL),
(86, 14, 'Nhẫn Vàng 18K đính đá CZ', 10, 12000000, '1.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2022-12-02', NULL),
(88, 16, 'Vòng tay bạc', 7, 3000000, '12.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL),
(89, 14, 'Nhẫn bạc PNJSilver Enamel', 12, 5000000, '3.png', 'Lấy cảm hứng từ vẻ đẹp kiến trúc cổ kính Châu Âu hòa cùng phong cách của những quý cô Pháp hiện đại, các thiết kế trang sức thời trang với họa tiết màu sắc tươi tắn nhưng không lòe loẹt giúp toát lên tinh thần tự chủ, phóng khoáng, thanh tao và thời thượng của các cô gái. Thương hiệu trang sức bạc PNJSilver vừa ra mắt bộ sưu tập nhẫn bạc Enamel được ứng dụng kỹ nghệ Enamel đã thêm vào dòng sản phẩm bạc với chiếc nhẫn có nhiều màu sắc mới lạ độc đáo, tô điểm thêm nét đẹp tinh tế của các cô gái.', '2022-12-02', NULL),
(92, 14, 'Nhẫn vàng 14k', 10, 9000000, 'ring-3.jpg', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2022-12-23', NULL),
(93, 17, 'Vòng cổ bạc 999', 10, 1200000, '13.png', 'Lấy cảm hứng từ vẻ đẹp kiến trúc cổ kính Châu Âu hòa cùng phong cách của những quý cô Pháp hiện đại, các thiết kế trang sức thời trang với họa tiết màu sắc tươi tắn nhưng không lòe loẹt giúp toát lên tinh thần tự chủ, phóng khoáng, thanh tao và thời thượng của các cô gái. Thương hiệu trang sức bạc PNJSilver vừa ra mắt bộ sưu tập nhẫn bạc Enamel được ứng dụng kỹ nghệ Enamel đã thêm vào dòng sản phẩm bạc với chiếc nhẫn có nhiều màu sắc mới lạ độc đáo, tô điểm thêm nét đẹp tinh tế của các cô gái.', '2023-02-02', NULL),
(106, 15, 'Bông tai ngôi sao', 5, 6000000, '8.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL),
(107, 16, 'Vòng tay vàng 18k', 30, 9000000, '20.png', 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng và đá, chiếc nhẫn CZ ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', '2023-02-02', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idad`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idctdh`),
  ADD KEY `idsp` (`idsp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddh`),
  ADD KEY `donhang_ibfk_1` (`idkh`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idgh`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `idloai` (`idloai`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkh`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `sanpham_ibfk_1` (`idloai`),
  ADD KEY `tensp` (`tensp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `idctdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10030;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idgh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idkh`) REFERENCES `khachhang` (`idkh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idloai`) REFERENCES `loaisp` (`idloai`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idloai`) REFERENCES `loaisp` (`idloai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
