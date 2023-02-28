-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 12:16 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

CREATE DATABASE ttkmovie;
use ttkmovie;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ttkmovie`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `MaTK` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT 'User',
  `XuKhoa` int(11) NOT NULL DEFAULT 0,
  `Point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`MaTK`, `Name`, `Username`, `Password`, `Role`, `XuKhoa`, `Point`) VALUES
(1, 'Admin', 'Admin', 'admin', 'Admin', 999999, 0),
(2, 'Thụy', 'Nhoxsox', '123456', 'Admin', 0, 0),
(6, 'Tài', 'rongcao', '123456', 'User', 1125, 720),
(7, 'Thử Cho Vui', 'Test01', '123456', 'User', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `ThongTinBL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaPhim` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `ThongTinBL`, `MaPhim`, `MaTK`) VALUES
(1, 'a', 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietthanhtoan`
--

CREATE TABLE `chitietthanhtoan` (
  `MaChiTiet` int(11) NOT NULL,
  `MaThanhToan` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaPhim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietthanhtoan`
--

INSERT INTO `chitietthanhtoan` (`MaChiTiet`, `MaThanhToan`, `MaTK`, `MaPhim`) VALUES
(3, 1, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `PhanTram` int(11) NOT NULL,
  `UseCode` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKhuyenMai`, `PhanTram`, `UseCode`) VALUES
('Halloween', 30, 1),
('Lover', 30, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nap`
--

CREATE TABLE `nap` (
  `MaTK` int(11) NOT NULL,
  `GiaNap` int(11) NOT NULL,
  `NgayNap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `MaPhim` int(11) NOT NULL,
  `TenPhim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `VideoImg` varchar(255) NOT NULL,
  `MoTa` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Chưa có mô tả nào!',
  `Trailer` varchar(255) NOT NULL DEFAULT 'NoTrailer',
  `NamPhatHanh` varchar(10) NOT NULL,
  `MaTheLoai` int(11) NOT NULL,
  `SoTapPhim` int(11) NOT NULL DEFAULT 0,
  `GiaMua` int(11) NOT NULL DEFAULT 0,
  `MaKhuyenMai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `LuotLike` int(11) NOT NULL DEFAULT 0,
  `LuotView` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`MaPhim`, `TenPhim`, `VideoImg`, `MoTa`, `Trailer`, `NamPhatHanh`, `MaTheLoai`, `SoTapPhim`, `GiaMua`, `MaKhuyenMai`, `LuotLike`, `LuotView`) VALUES
(1, 'The Conjuring', 'img6.jpg', 'Phim về một gia đình gặp rắc rối khi chuyển nhà', '2022-10-27 19-32-57.mkv', '2016', 1, 2, 20, 'Halloween', 1, 6),
(2, 'Fast n Furious 7', 'sidebar14.png', 'Phim về cuộc đua xe của Dom', '2022-10-27 19-32-57.mkv', '2015', 2, 1, 50, NULL, 0, 0),
(3, 'She-Hulk', 'film2.png', 'Phim  xoay quanh câu chuyện về cô nàng Jennifer Walters ở độ tuổi 30', '2022-10-27 19-32-57.mkv', '2022', 3, 1, 40, NULL, 0, 0),
(4, 'Blue rock', 'film7.png', 'Phim xoay quanh câu chuyện về chân sút tài năng Yoichi Isagi', '2022-10-27 19-32-57.mkv', '2022', 4, 2, 0, NULL, 0, 3),
(5, 'Thor 4', 'itachi.jpg', 'Phim xoay quanh cô nàng tình cũ của anh chàng Thor là Jane Foster', '2022-10-27 19-32-57.mkv', '2022', 5, 1, 50, NULL, 0, 0),
(6, 'Băng đường nhất hạ', 'china.jpg', 'Phim xoay quanh câu chuyện về nữ sinh Lại Đối Đối', '2022-10-27 19-32-57.mkv', '2022', 6, 4, 0, NULL, 0, 0),
(7, 'The Ring', 'film21.png', 'Phim xoay quanh Rachel Keller là một nhà báo điều tra, người không tin tưởng nhiều vào những gì cô coi là một loại truyền thuyết đô thị', '2022-10-27 19-32-57.mkv', '2002', 1, 1, 20, 'Halloween', 0, 0),
(9, 'New file', 'film1.png', 'Test thử', 'videodemo.mkv', '1990', 6, 0, 0, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `MaQC` int(11) NOT NULL,
  `Banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CongTy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ChiPhi` int(11) NOT NULL,
  `ThuNhap` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`MaQC`, `Banner`, `CongTy`, `Link`, `ChiPhi`, `ThuNhap`) VALUES
(2, 'Shopee15.4.jpg', 'Shopee', 'https://shopee.vn/', 10000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tapphim`
--

CREATE TABLE `tapphim` (
  `MaTapPhim` int(11) NOT NULL,
  `FilePhim` varchar(255) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `MaPhim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tapphim`
--

INSERT INTO `tapphim` (`MaTapPhim`, `FilePhim`, `ThuTu`, `MaPhim`) VALUES
(1, 'The Conjuring', 1, 1),
(2, 'Fast n Furious 7', 1, 2),
(3, 'She-Hulk', 1, 3),
(4, 'Blue rock', 1, 4),
(5, 'Thor 4', 1, 5),
(6, 'Băng đường nhất hạ', 1, 6),
(7, 'The Ring', 1, 7),
(8, 'videodemo.mkv', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `MaThanhToan` int(11) NOT NULL,
  `NgayThanhToan` varchar(255) NOT NULL,
  `SoTienThanhToan` int(11) NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`MaThanhToan`, `NgayThanhToan`, `SoTienThanhToan`, `TrangThai`) VALUES
(1, '17/12/2022', 20, 'Done');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `MaTheLoai` int(11) NOT NULL,
  `TenTheLoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`MaTheLoai`, `TenTheLoai`) VALUES
(1, 'Kinh dị'),
(2, 'Hành động'),
(3, 'Hài hước'),
(4, 'Hoạt hình Anime'),
(5, 'Phiêu lưu'),
(6, 'Tình cảm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` int(11) NOT NULL,
  `ThongTin` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TieuDe` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `AnhTin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT 'Không có ảnh mô tả!',
  `ThoiGian` varchar(255) NOT NULL,
  `LuotXem` int(11) NOT NULL DEFAULT 0,
  `LuotThich` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTinTuc`, `ThongTin`, `TieuDe`, `AnhTin`, `ThoiGian`, `LuotXem`, `LuotThich`) VALUES
(1, 'Thông báo phim mới cập nhật', 'Phim mới cập nhật', 'MatBiec.jpg', '30/10/2022', 2, 12),
(3, 'Thống kê số phim được xem nhiều nhất trong tháng ', 'Danh sách phim được xem nhiều nhất', 'MatBiec.jpg', '30/10/2022', 0, 0),
(6, 'dùng để thử coi update được không', 'Thử xem', 'km02.jpg', '08/11/2022', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthich`
--

CREATE TABLE `yeuthich` (
  `MaYT` int(11) NOT NULL,
  `MaPhim` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `yeuthich`
--

INSERT INTO `yeuthich` (`MaYT`, `MaPhim`, `MaTK`) VALUES
(1, 1, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`MaTK`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`),
  ADD KEY `MaPhim` (`MaPhim`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `chitietthanhtoan`
--
ALTER TABLE `chitietthanhtoan`
  ADD PRIMARY KEY (`MaChiTiet`),
  ADD KEY `MaThanhToan` (`MaThanhToan`),
  ADD KEY `MaPhim` (`MaPhim`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `nap`
--
ALTER TABLE `nap`
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`MaPhim`),
  ADD KEY `MaTheLoai` (`MaTheLoai`),
  ADD KEY `MaKhuyenMai` (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`MaQC`);

--
-- Chỉ mục cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  ADD PRIMARY KEY (`MaTapPhim`),
  ADD KEY `MaPhim` (`MaPhim`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaThanhToan`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- Chỉ mục cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`MaYT`),
  ADD KEY `MaPhim` (`MaPhim`),
  ADD KEY `MaTK` (`MaTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietthanhtoan`
--
ALTER TABLE `chitietthanhtoan`
  MODIFY `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `MaPhim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `MaQC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  MODIFY `MaTapPhim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `MaThanhToan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `MaTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `MaYT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `account` (`MaTK`);

--
-- Các ràng buộc cho bảng `chitietthanhtoan`
--
ALTER TABLE `chitietthanhtoan`
  ADD CONSTRAINT `chitietthanhtoan_ibfk_1` FOREIGN KEY (`MaThanhToan`) REFERENCES `thanhtoan` (`MaThanhToan`),
  ADD CONSTRAINT `chitietthanhtoan_ibfk_2` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`),
  ADD CONSTRAINT `chitietthanhtoan_ibfk_3` FOREIGN KEY (`MaTK`) REFERENCES `account` (`MaTK`);

--
-- Các ràng buộc cho bảng `nap`
--
ALTER TABLE `nap`
  ADD CONSTRAINT `nap_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `account` (`MaTK`);

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`MaTheLoai`) REFERENCES `theloai` (`MaTheLoai`),
  ADD CONSTRAINT `phim_ibfk_2` FOREIGN KEY (`MaKhuyenMai`) REFERENCES `khuyenmai` (`MaKhuyenMai`);

--
-- Các ràng buộc cho bảng `tapphim`
--
ALTER TABLE `tapphim`
  ADD CONSTRAINT `tapphim_ibfk_1` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`);

--
-- Các ràng buộc cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `yeuthich_ibfk_1` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`),
  ADD CONSTRAINT `yeuthich_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `account` (`MaTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
