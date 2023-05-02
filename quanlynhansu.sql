-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2023 lúc 07:01 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `mabophan` varchar(10) NOT NULL COMMENT 'mã số bộ phận',
  `tenbophan` varchar(100) NOT NULL COMMENT 'tên bộ phận',
  `congviecphutrach` varchar(255) NOT NULL COMMENT 'công việc phụ trách',
  `makhuvuc` varchar(10) NOT NULL COMMENT 'mã số khu vực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`mabophan`, `tenbophan`, `congviecphutrach`, `makhuvuc`) VALUES
('KD001', 'Kinh doanh', '', 'CT'),
('KD002', 'Kinh doanh', '', 'NT'),
('KT001', 'Kế toán', '', 'CT'),
('KT002', 'Kế toán', '', 'NT'),
('NS001', 'Nhân sự', '', 'CT'),
('NS002', 'Nhân sự', '', 'NT'),
('TC001', 'Tài chính', '', 'CT'),
('TC002', 'Tài chính', '', 'NT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinhanh`
--

CREATE TABLE `chinhanh` (
  `machinhanh` varchar(10) NOT NULL COMMENT 'mã số chi nhánh',
  `tenchinhanh` varchar(50) NOT NULL COMMENT 'tên chi nhánh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chinhanh`
--

INSERT INTO `chinhanh` (`machinhanh`, `tenchinhanh`) VALUES
('HCM', 'Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkehoach`
--

CREATE TABLE `chitietkehoach` (
  `makehoach` varchar(10) NOT NULL COMMENT 'mã số kế hoạch',
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên nhận kế hoạch',
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu trong kế hoạch đó ',
  `level` varchar(5) NOT NULL COMMENT 'cấp bậc chỉnh sửa',
  `chitieucandat` int(10) NOT NULL COMMENT 'chỉ tiều cần đạt được trong kế hoạch',
  `chitieudatduoc` int(10) NOT NULL COMMENT 'chỉ tiêu đạt được sau khi kết thúc kế hoạch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkehoach`
--

INSERT INTO `chitietkehoach` (`makehoach`, `manhanvien`, `machitieu`, `level`, `chitieucandat`, `chitieudatduoc`) VALUES
('KH01', 'NV1', 'CT01', '1', 3, 3),
('KH02', 'NV2', 'CT02', '1', 4, 4),
('KH03', 'NV3', 'CT03', '2', 6, 6),
('KH04', 'NV4', 'CT04', '2', 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitieu`
--

CREATE TABLE `chitieu` (
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu',
  `tenchitieu` varchar(255) NOT NULL COMMENT 'tên chỉ tiêu',
  `mota` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'mô tả chỉ tiêu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitieu`
--

INSERT INTO `chitieu` (`machitieu`, `tenchitieu`, `mota`) VALUES
('CT01', 'Chỉ tiêu đầu tiên', 'Hoàn thành trong 2 tuần'),
('CT02', 'Chỉ tiêu thứ hai', 'Chỉnh sửa CT01, hoàn thành trong 1 tuần'),
('CT03', 'Chỉ tiêu thứ ba', 'Hoàn thành chỉ tiêu trong vòng 2 tuần'),
('CT04', 'Chỉ tiêu thứ tư', 'Hoàn thành chỉ tiêu trong 3 tháng'),
('CT05', 'Chỉ tiêu thứ năm', 'Hoàn thành trong 24h'),
('CT06', 'Chỉ tiêu thứ sáu', 'Chỉnh sửa CT06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `machucvu` varchar(10) NOT NULL COMMENT 'mã số chức vụ\r\n',
  `tenchucvu` varchar(50) NOT NULL COMMENT 'tên chức vụ',
  `motachucvu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'mô tả chức vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`machucvu`, `tenchucvu`, `motachucvu`) VALUES
('C1', 'Giám đốc', ''),
('C2', 'Phó giám đốc', ''),
('C3', 'Nhân viên văn phòng', ''),
('C4', 'Nhân viên marketing', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `macongviec` varchar(10) NOT NULL COMMENT 'mã số công việc',
  `tencongviec` varchar(100) NOT NULL COMMENT 'tên công việc',
  `motacongviec` varchar(255) NOT NULL COMMENT 'mô tả công việc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`macongviec`, `tencongviec`, `motacongviec`) VALUES
('CV1', 'Hoạt động kinh doanh', ''),
('CV2', 'Nguồn lực', ''),
('CV3', 'Lập trình', ''),
('CV4', 'Tester', ''),
('CV5', 'Marketing', ''),
('CV6', 'Tư vấn viên', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiakehoach`
--

CREATE TABLE `danhgiakehoach` (
  `madanhgia` varchar(10) NOT NULL COMMENT 'mã số đánh giá kế hoạch',
  `ketquadanhgia` varchar(100) NOT NULL COMMENT 'kết quả đánh giá',
  `truongphong` varchar(100) NOT NULL COMMENT 'tình trạng đánh giá của trưởng phòng ',
  `giamdoc` varchar(100) NOT NULL COMMENT 'tình trạng đánh giá của giám đốc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiakehoach`
--

INSERT INTO `danhgiakehoach` (`madanhgia`, `ketquadanhgia`, `truongphong`, `giamdoc`) VALUES
('DG01', 'Đạt', 'Đạt', 'Đạt'),
('DG02', 'Đạt', 'Đạt', 'Đạt'),
('DG03', 'Đạt', 'Đạt', 'Đạt'),
('DG04', 'Đạt', 'Chưa đạt', 'Chưa đạt'),
('DG05', 'Chưa đạt', 'Chưa đạt', 'Chưa đạt'),
('DG06', 'Đạt', 'Đạt', 'Chưa đạt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachgiaoviec`
--

CREATE TABLE `kehoachgiaoviec` (
  `makehoach` varchar(10) NOT NULL COMMENT 'mã số kế hoạch',
  `motakehoach` varchar(255) NOT NULL COMMENT 'mô tả kế hoạch',
  `thoigianbatdau` date NOT NULL COMMENT 'thời gian bắt đầu thực hiện kế hoạch',
  `thoigiandukien` date NOT NULL COMMENT 'thời gian dự kiến kết thúc kế hoạch',
  `thoigianketthuc` date NOT NULL COMMENT 'thời gian kết thúc kế hoạch',
  `tiendo` varchar(255) NOT NULL COMMENT 'tiến độ kế hoạch',
  `madanhgia` varchar(10) NOT NULL COMMENT 'kế hoạch có một bản đánh giá kế hoạch',
  `makhuvuc` varchar(10) NOT NULL COMMENT 'kế hoạch được đảm nhận bởi một khu vực',
  `mabophan` varchar(10) NOT NULL COMMENT 'kế hoạch được phân công cho một bộ phận đảm nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachgiaoviec`
--

INSERT INTO `kehoachgiaoviec` (`makehoach`, `motakehoach`, `thoigianbatdau`, `thoigiandukien`, `thoigianketthuc`, `tiendo`, `madanhgia`, `makhuvuc`, `mabophan`) VALUES
('KH01', 'Kế hoạch phòng Kinh doanh 001', '2023-05-09', '2023-05-10', '2023-05-12', 'Đã hoàn thành', 'DG01', 'CT', 'KD001'),
('KH02', 'Kế hoạch sửa kế hoạch 1 và kế hoạch cho phòng Kinh Doanh 002', '2023-04-04', '2023-05-19', '2023-05-25', 'Hoàn thành', 'DG02', 'CT', 'KD001'),
('KH03', 'Thực hiện kế hoạch cho phòng Kế toán 001', '2023-05-04', '2023-05-26', '2023-05-27', 'Hoàn thành', 'DG03', 'CT', 'NS002'),
('KH04', 'Thực hiện bổ sung kế hoạch Kinh Doanh 001, 002', '2023-05-12', '2023-06-02', '2023-06-02', 'Đang thực hiện', 'DG04', 'NT', 'KD001'),
('KH05', 'Thực hiện kế hoạch điều chỉnh phòng Nhân Sự 001', '2023-05-11', '2023-05-20', '2023-05-31', 'Chưa hoàn thành', 'DG05', 'CT', 'NS001'),
('KH06', 'Xem lại toàn bộ kế hoạch đã làm', '2023-05-19', '2023-05-20', '2023-05-21', 'Hoàn thành', 'DG06', 'CT', 'NS002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `makhuvuc` varchar(10) NOT NULL COMMENT 'mã số khu vực',
  `tenkhuvuc` varchar(100) NOT NULL COMMENT 'tên khu vực',
  `machinhanh` varchar(10) NOT NULL COMMENT 'khu vực có một mã chi nhánh quản lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`makhuvuc`, `tenkhuvuc`, `machinhanh`) VALUES
('CT', 'Cần Thơ', 'HCM'),
('NT', 'Nha Trang', 'HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên',
  `hoten` varchar(50) NOT NULL COMMENT 'họ và tên của nhân viên',
  `ngaysinh` date NOT NULL COMMENT 'ngày sinh của nhân viên',
  `gioitinh` varchar(5) NOT NULL COMMENT 'giới tính của nhân viên',
  `noisinh` varchar(255) NOT NULL COMMENT 'nơi sinh của nhân viên',
  `dantoc` varchar(50) NOT NULL COMMENT 'nhân viên thuộc dân tộc',
  `quequan` varchar(255) NOT NULL COMMENT 'quê quán của nhân viên',
  `sodienthoai` varchar(15) NOT NULL COMMENT 'số điện thoại của nhân viên',
  `hinhanh` varchar(255) NOT NULL COMMENT 'hình ảnh đại diện cho nhân viên',
  `macongviec` varchar(10) NOT NULL COMMENT 'mã số công việc nhân việc phụ trách',
  `mabophan` varchar(10) NOT NULL COMMENT 'mã số bộ phận nhân việc tiếp nhận làm việc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manhanvien`, `hoten`, `ngaysinh`, `gioitinh`, `noisinh`, `dantoc`, `quequan`, `sodienthoai`, `hinhanh`, `macongviec`, `mabophan`) VALUES
('NV1', 'Trần Văn A', '2000-02-20', 'Nam', 'Cần Thơ', 'Kinh', 'Cần thơ', '0780898586', '', 'CV1', 'KD001'),
('NV2', 'Trần Văn B', '2000-03-17', 'Nam', 'Cà Nau', 'Kinh', 'Cần thơ', '0780898586', '', 'CV4', 'NS002'),
('NV3', 'Trần Văn C', '2000-03-16', 'Nam', 'Vũng Tàu', 'Kinh', 'Cần thơ', '0780898586', '', 'CV5', 'NS001'),
('NV4', 'Trần Văn D', '2000-03-15', 'Nam', 'Nha Trang', 'Kinh', 'Cần thơ', '0780898586', '', 'CV6', 'NS002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` bigint(11) NOT NULL,
  `manv` varchar(10) NOT NULL,
  `tentk` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `level` int(10) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `manv`, `tentk`, `email`, `matkhau`, `level`, `trangthai`) VALUES
(13, 'NV1', 'giamdoc', 'giamdoc@gmail.com', '123', 2, 'hoạt động'),
(14, 'NV2', 'truongphong', 'truongphong@gmail.com', '123', 2, 'hoạt động'),
(15, 'NV3', 'ketoan', 'ketoan@gmail.com', '123', 1, 'hoạt động'),
(16, 'NV4', 'kinhdoanh', 'kinhdoanh@gmail.com', '123', 1, 'hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theodoikehoach`
--

CREATE TABLE `theodoikehoach` (
  `makehoach` varchar(10) NOT NULL COMMENT 'mã số kế hoạch',
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên',
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu',
  `thang` varchar(10) NOT NULL COMMENT 'tháng thực hiện ',
  `chitieuthangcandat` varchar(10) NOT NULL COMMENT 'chỉ tiêu trong tháng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theodoikehoach`
--

INSERT INTO `theodoikehoach` (`makehoach`, `manhanvien`, `machitieu`, `thang`, `chitieuthangcandat`) VALUES
('KH01', 'NV1', 'CT01', '4', '4'),
('KH02', 'NV2', 'CT02', '6', '6'),
('KH03', 'NV3', 'CT04', '5', '5'),
('KH04', 'NV4', 'CT04', '9', '9'),
('KH05', 'NV2', 'CT05', '4', '5'),
('KH06', 'NV3', 'CT06', '11', '11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigiannhanchuc`
--

CREATE TABLE `thoigiannhanchuc` (
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên nhận chức',
  `machucvu` varchar(10) NOT NULL COMMENT 'mã số chức vụ nhân viên đảm nhận',
  `thoigianbatdau` date NOT NULL COMMENT 'thời gian bắt đầu nhận hức',
  `thoigianketthuc` date NOT NULL COMMENT 'thời gian kết thúc nhận chức'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigiannhanchuc`
--

INSERT INTO `thoigiannhanchuc` (`manhanvien`, `machucvu`, `thoigianbatdau`, `thoigianketthuc`) VALUES
('NV1', 'C1', '2023-01-01', '0000-00-00'),
('NV2', 'C2', '2023-02-01', '0000-00-00'),
('NV3', 'C3', '2023-06-01', '0000-00-00'),
('NV4', 'C3', '2023-06-01', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`mabophan`),
  ADD KEY `fk_khuvuc` (`makhuvuc`);

--
-- Chỉ mục cho bảng `chinhanh`
--
ALTER TABLE `chinhanh`
  ADD PRIMARY KEY (`machinhanh`);

--
-- Chỉ mục cho bảng `chitietkehoach`
--
ALTER TABLE `chitietkehoach`
  ADD PRIMARY KEY (`makehoach`,`manhanvien`,`machitieu`),
  ADD KEY `fk_nhanvien2` (`manhanvien`),
  ADD KEY `fk_chitieu` (`machitieu`);

--
-- Chỉ mục cho bảng `chitieu`
--
ALTER TABLE `chitieu`
  ADD PRIMARY KEY (`machitieu`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`machucvu`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`macongviec`);

--
-- Chỉ mục cho bảng `danhgiakehoach`
--
ALTER TABLE `danhgiakehoach`
  ADD PRIMARY KEY (`madanhgia`);

--
-- Chỉ mục cho bảng `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD PRIMARY KEY (`makehoach`),
  ADD KEY `fk_danhgia` (`madanhgia`),
  ADD KEY `fk_khuvuc1` (`makhuvuc`),
  ADD KEY `fk_bophan1` (`mabophan`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`makhuvuc`),
  ADD KEY `fk_chinhanh` (`machinhanh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manhanvien`),
  ADD KEY `fk_congviec` (`macongviec`),
  ADD KEY `fk_bophan` (`mabophan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nhanvien` (`manv`);

--
-- Chỉ mục cho bảng `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  ADD PRIMARY KEY (`makehoach`,`manhanvien`,`machitieu`,`thang`),
  ADD KEY `fk_nhanvien3` (`manhanvien`),
  ADD KEY `fk_chitieu1` (`machitieu`);

--
-- Chỉ mục cho bảng `thoigiannhanchuc`
--
ALTER TABLE `thoigiannhanchuc`
  ADD PRIMARY KEY (`manhanvien`,`machucvu`),
  ADD KEY `fk_chucvu` (`machucvu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD CONSTRAINT `fk_khuvuc` FOREIGN KEY (`makhuvuc`) REFERENCES `khuvuc` (`makhuvuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietkehoach`
--
ALTER TABLE `chitietkehoach`
  ADD CONSTRAINT `fk_chitieu` FOREIGN KEY (`machitieu`) REFERENCES `chitieu` (`machitieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehoach` FOREIGN KEY (`makehoach`) REFERENCES `kehoachgiaoviec` (`makehoach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien2` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD CONSTRAINT `fk_bophan1` FOREIGN KEY (`mabophan`) REFERENCES `bophan` (`mabophan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_danhgia` FOREIGN KEY (`madanhgia`) REFERENCES `danhgiakehoach` (`madanhgia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_khuvuc1` FOREIGN KEY (`makhuvuc`) REFERENCES `khuvuc` (`makhuvuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD CONSTRAINT `fk_chinhanh` FOREIGN KEY (`machinhanh`) REFERENCES `chinhanh` (`machinhanh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_bophan` FOREIGN KEY (`mabophan`) REFERENCES `bophan` (`mabophan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_congviec` FOREIGN KEY (`macongviec`) REFERENCES `congviec` (`macongviec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  ADD CONSTRAINT `fk_chitieu1` FOREIGN KEY (`machitieu`) REFERENCES `chitieu` (`machitieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehoach1` FOREIGN KEY (`makehoach`) REFERENCES `kehoachgiaoviec` (`makehoach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien3` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thoigiannhanchuc`
--
ALTER TABLE `thoigiannhanchuc`
  ADD CONSTRAINT `fk_chucvu` FOREIGN KEY (`machucvu`) REFERENCES `chucvu` (`machucvu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien1` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
