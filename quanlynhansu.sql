-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 09:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `mabophan` varchar(10) NOT NULL COMMENT 'mã số bộ phận',
  `tenbophan` varchar(100) NOT NULL COMMENT 'tên bộ phận',
  `congviecphutrach` varchar(255) NOT NULL COMMENT 'công việc phụ trách',
  `makhuvuc` varchar(10) NOT NULL COMMENT 'mã số khu vực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bophan`
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
-- Table structure for table `chinhanh`
--

CREATE TABLE `chinhanh` (
  `machinhanh` varchar(10) NOT NULL COMMENT 'mã số chi nhánh',
  `tenchinhanh` varchar(50) NOT NULL COMMENT 'tên chi nhánh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chinhanh`
--

INSERT INTO `chinhanh` (`machinhanh`, `tenchinhanh`) VALUES
('HCM', 'Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `chitietkehoach`
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
-- Dumping data for table `chitietkehoach`
--

INSERT INTO `chitietkehoach` (`makehoach`, `manhanvien`, `machitieu`, `level`, `chitieucandat`, `chitieudatduoc`) VALUES
('KH01', 'NV1', 'CT01', '2', 700000000, 0),
('KH01', 'NV1', 'CT02', '1', 250, 0),
('KH01', 'NV1', 'CT03', '2', 700000000, 0),
('KH01', 'NV2', 'CT01', '1', 700000000, 0),
('KH01', 'NV2', 'CT02', '1', 250, 0),
('KH01', 'NV2', 'CT03', '2', 700000000, 0),
('KH01', 'NV3', 'CT01', '', 700000000, 0),
('KH01', 'NV3', 'CT02', '', 250, 0),
('KH01', 'NV3', 'CT03', '', 700000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitieu`
--

CREATE TABLE `chitieu` (
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu',
  `tenchitieu` varchar(255) NOT NULL COMMENT 'tên chỉ tiêu',
  `mota` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'mô tả chỉ tiêu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitieu`
--

INSERT INTO `chitieu` (`machitieu`, `tenchitieu`, `mota`) VALUES
('CT01', 'Doanh số', 'Hoàn thành trong 2 tuần'),
('CT02', 'Xuất hóa đơn', 'Chỉnh sửa CT01, hoàn thành trong 1 tuần'),
('CT03', 'Thu hồi công nợ', 'Hoàn thành chỉ tiêu trong vòng 2 tuần'),
('CT04', 'Hỗ trợ khách hàng', 'Hoàn thành chỉ tiêu trong 3 tháng'),
('CT05', 'Phát triển khách hàng', 'Hoàn thành trong 24h'),
('CT06', 'Hiểu biết sản phẩm', 'Chỉnh sửa CT06');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `machucvu` varchar(10) NOT NULL COMMENT 'mã số chức vụ\r\n',
  `tenchucvu` varchar(50) NOT NULL COMMENT 'tên chức vụ',
  `motachucvu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'mô tả chức vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`machucvu`, `tenchucvu`, `motachucvu`) VALUES
('C1', 'Nhân viên', ''),
('C2', 'Trưởng phòng', ''),
('C3', 'Giám đốc', '');

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `macongviec` varchar(10) NOT NULL COMMENT 'mã số công việc',
  `tencongviec` varchar(100) NOT NULL COMMENT 'tên công việc',
  `motacongviec` varchar(255) NOT NULL COMMENT 'mô tả công việc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `congviec`
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
-- Table structure for table `danhgiakehoach`
--

CREATE TABLE `danhgiakehoach` (
  `madanhgia` varchar(10) NOT NULL COMMENT 'mã số đánh giá kế hoạch',
  `ketquadanhgia` varchar(100) NOT NULL COMMENT 'kết quả đánh giá',
  `truongphong` varchar(100) NOT NULL COMMENT 'tình trạng đánh giá của trưởng phòng ',
  `giamdoc` varchar(100) NOT NULL COMMENT 'tình trạng đánh giá của giám đốc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhgiakehoach`
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
-- Table structure for table `kehoachgiaoviec`
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
-- Dumping data for table `kehoachgiaoviec`
--

INSERT INTO `kehoachgiaoviec` (`makehoach`, `motakehoach`, `thoigianbatdau`, `thoigiandukien`, `thoigianketthuc`, `tiendo`, `madanhgia`, `makhuvuc`, `mabophan`) VALUES
('KH01', 'Kế hoạch phòng Kinh doanh 0011                                                                                       ', '2023-01-01', '2023-12-31', '2023-12-31', 'Đã hoàn thành', 'DG01', 'CT', 'KD001');

-- --------------------------------------------------------

--
-- Table structure for table `khuvuc`
--

CREATE TABLE `khuvuc` (
  `makhuvuc` varchar(10) NOT NULL COMMENT 'mã số khu vực',
  `tenkhuvuc` varchar(100) NOT NULL COMMENT 'tên khu vực',
  `machinhanh` varchar(10) NOT NULL COMMENT 'khu vực có một mã chi nhánh quản lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khuvuc`
--

INSERT INTO `khuvuc` (`makhuvuc`, `tenkhuvuc`, `machinhanh`) VALUES
('CT', 'Cần Thơ', 'HCM'),
('NT', 'Nha Trang', 'HCM');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
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
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manhanvien`, `hoten`, `ngaysinh`, `gioitinh`, `noisinh`, `dantoc`, `quequan`, `sodienthoai`, `hinhanh`, `macongviec`, `mabophan`) VALUES
('NV1', 'Trần Văn A', '2000-02-20', 'Nam', 'Cần Thơ', 'Kinh', 'Cần thơ', '0780898586', '', 'CV1', 'KD001'),
('NV2', 'Trần Văn B', '2000-03-17', 'Nam', 'Cà Nau', 'Kinh', 'Cần thơ', '0780898586', '', 'CV4', 'KD001'),
('NV3', 'Trần Văn C', '2000-03-16', 'Nam', 'Vũng Tàu', 'Kinh', 'Cần thơ', '0780898586', '', 'CV5', 'KD001'),
('NV4', 'Trần Văn D', '2000-03-15', 'Nam', 'Nha Trang', 'Kinh', 'Cần thơ', '0780898586', '', 'CV6', 'KD001');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
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
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `manv`, `tentk`, `email`, `matkhau`, `level`, `trangthai`) VALUES
(13, 'NV1', 'giamdoc', 'giamdoc@gmail.com', '123', 2, 'hoạt động'),
(14, 'NV2', 'truongphong', 'truongphong@gmail.com', '123', 2, 'hoạt động'),
(15, 'NV3', 'ketoan', 'ketoan@gmail.com', '123', 1, 'hoạt động'),
(16, 'NV4', 'kinhdoanh', 'kinhdoanh@gmail.com', '123', 1, 'hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `theodoikehoach`
--

CREATE TABLE `theodoikehoach` (
  `makehoach` varchar(10) NOT NULL COMMENT 'mã số kế hoạch',
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên',
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu',
  `thang` varchar(10) NOT NULL COMMENT 'tháng thực hiện ',
  `chitieuthangdatduoc` varchar(10) NOT NULL COMMENT 'chỉ tiêu trong tháng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theodoikehoach`
--

INSERT INTO `theodoikehoach` (`makehoach`, `manhanvien`, `machitieu`, `thang`, `chitieuthangdatduoc`) VALUES
('KH01', 'NV1', 'CT01', '1', '50000000'),
('KH01', 'NV1', 'CT01', '2', '60000000'),
('KH01', 'NV1', 'CT01', '3', '50000000'),
('KH01', 'NV1', 'CT02', '1', '20'),
('KH01', 'NV1', 'CT02', '2', '30'),
('KH01', 'NV1', 'CT02', '3', '25'),
('KH01', 'NV1', 'CT03', '1', '50000000'),
('KH01', 'NV1', 'CT03', '2', '60000000'),
('KH01', 'NV1', 'CT03', '3', '70000000'),
('KH01', 'NV2', 'CT01', '1', '50000000'),
('KH01', 'NV2', 'CT01', '2', '60000000'),
('KH01', 'NV2', 'CT01', '3', '50000000'),
('KH01', 'NV2', 'CT02', '1', '20'),
('KH01', 'NV2', 'CT02', '2', '30'),
('KH01', 'NV2', 'CT02', '3', '25'),
('KH01', 'NV2', 'CT03', '1', '50000000'),
('KH01', 'NV2', 'CT03', '2', '60000000'),
('KH01', 'NV2', 'CT03', '3', '70000000');

-- --------------------------------------------------------

--
-- Table structure for table `thoigiannhanchuc`
--

CREATE TABLE `thoigiannhanchuc` (
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên nhận chức',
  `machucvu` varchar(10) NOT NULL COMMENT 'mã số chức vụ nhân viên đảm nhận',
  `thoigianbatdau` date NOT NULL COMMENT 'thời gian bắt đầu nhận hức',
  `thoigianketthuc` date NOT NULL COMMENT 'thời gian kết thúc nhận chức'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thoigiannhanchuc`
--

INSERT INTO `thoigiannhanchuc` (`manhanvien`, `machucvu`, `thoigianbatdau`, `thoigianketthuc`) VALUES
('NV1', 'C1', '2023-01-01', '0000-00-00'),
('NV2', 'C2', '2023-02-01', '0000-00-00'),
('NV3', 'C3', '2023-06-01', '0000-00-00'),
('NV4', 'C3', '2023-06-01', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`mabophan`),
  ADD KEY `fk_khuvuc` (`makhuvuc`);

--
-- Indexes for table `chinhanh`
--
ALTER TABLE `chinhanh`
  ADD PRIMARY KEY (`machinhanh`);

--
-- Indexes for table `chitietkehoach`
--
ALTER TABLE `chitietkehoach`
  ADD PRIMARY KEY (`makehoach`,`manhanvien`,`machitieu`),
  ADD KEY `fk_nhanvien2` (`manhanvien`),
  ADD KEY `fk_chitieu` (`machitieu`);

--
-- Indexes for table `chitieu`
--
ALTER TABLE `chitieu`
  ADD PRIMARY KEY (`machitieu`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`machucvu`);

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`macongviec`);

--
-- Indexes for table `danhgiakehoach`
--
ALTER TABLE `danhgiakehoach`
  ADD PRIMARY KEY (`madanhgia`);

--
-- Indexes for table `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD PRIMARY KEY (`makehoach`),
  ADD KEY `fk_danhgia` (`madanhgia`),
  ADD KEY `fk_khuvuc1` (`makhuvuc`),
  ADD KEY `fk_bophan1` (`mabophan`);

--
-- Indexes for table `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`makhuvuc`),
  ADD KEY `fk_chinhanh` (`machinhanh`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manhanvien`),
  ADD KEY `fk_congviec` (`macongviec`),
  ADD KEY `fk_bophan` (`mabophan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nhanvien` (`manv`);

--
-- Indexes for table `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  ADD PRIMARY KEY (`makehoach`,`manhanvien`,`machitieu`,`thang`),
  ADD KEY `fk_nhanvien3` (`manhanvien`),
  ADD KEY `fk_chitieu1` (`machitieu`);

--
-- Indexes for table `thoigiannhanchuc`
--
ALTER TABLE `thoigiannhanchuc`
  ADD PRIMARY KEY (`manhanvien`,`machucvu`),
  ADD KEY `fk_chucvu` (`machucvu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bophan`
--
ALTER TABLE `bophan`
  ADD CONSTRAINT `fk_khuvuc` FOREIGN KEY (`makhuvuc`) REFERENCES `khuvuc` (`makhuvuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietkehoach`
--
ALTER TABLE `chitietkehoach`
  ADD CONSTRAINT `fk_chitieu` FOREIGN KEY (`machitieu`) REFERENCES `chitieu` (`machitieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehoach` FOREIGN KEY (`makehoach`) REFERENCES `kehoachgiaoviec` (`makehoach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien2` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD CONSTRAINT `fk_bophan1` FOREIGN KEY (`mabophan`) REFERENCES `bophan` (`mabophan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_danhgia` FOREIGN KEY (`madanhgia`) REFERENCES `danhgiakehoach` (`madanhgia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_khuvuc1` FOREIGN KEY (`makhuvuc`) REFERENCES `khuvuc` (`makhuvuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD CONSTRAINT `fk_chinhanh` FOREIGN KEY (`machinhanh`) REFERENCES `chinhanh` (`machinhanh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_bophan` FOREIGN KEY (`mabophan`) REFERENCES `bophan` (`mabophan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_congviec` FOREIGN KEY (`macongviec`) REFERENCES `congviec` (`macongviec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  ADD CONSTRAINT `fk_chitieu1` FOREIGN KEY (`machitieu`) REFERENCES `chitieu` (`machitieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehoach1` FOREIGN KEY (`makehoach`) REFERENCES `kehoachgiaoviec` (`makehoach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien3` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thoigiannhanchuc`
--
ALTER TABLE `thoigiannhanchuc`
  ADD CONSTRAINT `fk_chucvu` FOREIGN KEY (`machucvu`) REFERENCES `chucvu` (`machucvu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien1` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
