-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:04 PM
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
('CTKD01', 'Kinh Doanh 1', '', 'CT'),
('CTKD02', 'Kinh Doanh 2', '', 'CT'),
('CTKT01', 'Kế Toán 1', '', 'CT'),
('CTKT02', 'Kế Toán 2', '', 'CT'),
('CTLT01', 'Lập Trình', 'Xây Dựng Và Phát Triển Phần Mềm, Ứng Dụng, Website', 'CT'),
('CTLT02', 'Lập Trình 2', '', 'CT'),
('CTNS01', 'Nhân Sự 1', '', 'CT'),
('CTNS02', 'Nhân Sự 2', '', 'CT'),
('CTQL01', 'Quản Lý 1', 'Quản lý khu vực phụ trách', 'CT'),
('CTTC01', 'Tài Chính 1', '', 'CT'),
('CTTT02', 'Tài Chính 2', '', 'CT'),
('NTKD01', 'Kinh Doanh 1', '', 'NT'),
('NTKD02', 'Kinh Doanh 2', '', 'NT'),
('NTKT01', 'Kế Toán 1', '', 'NT'),
('NTKT02', 'Kế Toán 2', '', 'NT'),
('NTLT01', 'Lập Trình 1', '', 'NT'),
('NTLT02', 'Lập Trình 2', 'Xây Dựng Và Phát Triển Phần Mềm, Ứng Dụng, Website', 'NT'),
('NTNS01', 'Nhân Sự 1', '', 'NT'),
('NTNS02', 'Nhân Sự 2', '', 'NT'),
('NTQL02', 'Quản Lý 2', 'Quản lý khu vực phụ trách', 'NT'),
('NTTC02', 'Tài Chính 2', '', 'NT'),
('NTTT001', 'Tài Chính 1', '', 'NT');

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
  `chitieucandat` int(11) NOT NULL COMMENT 'chỉ tiều cần đạt được trong kế hoạch',
  `chitieudatduoc` int(11) NOT NULL COMMENT 'chỉ tiêu đạt được sau khi kết thúc kế hoạch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('BE', 'Lập trình Backend', ''),
('FE', 'Lập trình Frontend', ''),
('HDKD', 'Hoạt động kinh doanh', 'Giao dịch sản phẩm giữa khách hàng và công ty'),
('KT', 'Kiểm Toán', ''),
('LT', 'Lập trình', 'Xây dựng phần mềm, website'),
('MKT', 'Marketing', 'Tuyên truyền, quảng cáo sản phẩm đến với khách hàng'),
('NL', 'Nguồn lực', 'Tuyển dụng nguồn lực chọn lọc cho công ty'),
('QL', 'Quản lý', 'Quản lý hoạt động của công ty'),
('TT', 'Tester', 'Kiểm thử phần mềm, website,...'),
('TVV', 'Tư vấn viên', 'Hỗ trợ sử dụng, giải đáp thắc mắc về  sản phẩm cho khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danhgiakehoach`
--

CREATE TABLE `danhgiakehoach` (
  `makehoach` varchar(10) NOT NULL,
  `nguoi_danh_gia` varchar(10) NOT NULL,
  `ketqua` varchar(100) NOT NULL,
  `noi_dung_chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `makhuvuc` varchar(10) NOT NULL COMMENT 'kế hoạch được đảm nhận bởi một khu vực',
  `mabophan` varchar(10) NOT NULL COMMENT 'kế hoạch được phân công cho một bộ phận đảm nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `dantoc` varchar(50) NOT NULL COMMENT 'nhân viên thuộc dân tộc',
  `quequan` varchar(255) NOT NULL COMMENT 'quê quán của nhân viên',
  `sodienthoai` varchar(15) NOT NULL COMMENT 'số điện thoại của nhân viên',
  `cccd` varchar(20) NOT NULL COMMENT 'Số căn cước công dân',
  `hinhanh` varchar(255) NOT NULL COMMENT 'hình ảnh đại diện cho nhân viên',
  `macongviec` varchar(10) NOT NULL COMMENT 'mã số công việc nhân việc phụ trách',
  `mabophan` varchar(10) NOT NULL COMMENT 'mã số bộ phận nhân việc tiếp nhận làm việc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manhanvien`, `hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `quequan`, `sodienthoai`, `cccd`, `hinhanh`, `macongviec`, `mabophan`) VALUES
('NV001', 'Vũ Kim Nga', '1998-11-15', 'Nữ', 'Kinh', 'Bạc Liêu', '0448328447', '05611676091', '1.jpg', 'HDKD', 'CTQL01'),
('NV0010', 'Đặng Hoàng My', '1997-04-28', 'Nam', 'Ô Đu', 'Hòa Bình', '0297898421', '07753583608', '1.jpg', 'HDKD', 'NTKD01'),
('NV0011', 'Đỗ Khánh Mai', '1999-10-07', 'Nam', 'Ba Na', 'Yên Bái', '0955288573', '08465953904', '1.jpg', 'TVV', 'CTLT01'),
('NV0012', 'Võ Khánh Kim', '1995-08-25', 'Nữ', 'Gia Rai', 'Quảng Ngãi', '0600996106', '01357584775', '1.jpg', 'KT', 'NTKT01'),
('NV0013', 'Đặng Hoàng Yến', '1996-11-21', 'Nữ', 'Mường', 'Bà Rịa-Vũng Tàu', '0213926330', '01986186679', '1.jpg', 'TVV', 'NTLT01'),
('NV0014', 'Dương Thanh Duyên', '1996-10-31', 'Nữ', 'Kinh', 'Tuyên Quang', '0235864446', '01671159379', '1.jpg', 'NL', 'CTNS01'),
('NV0015', 'Lê Kim Uyên', '2002-11-08', 'Nữ', 'Giáy', 'Bình Định', '0578814165', '01548219858', '1.jpg', 'MKT', 'CTTC01'),
('NV0016', 'Nguyễn Thanh Ánh', '1998-10-08', 'Nữ', 'Xơ Đăng', 'Kon Tum', '0241305270', '06521669389', '1.jpg', 'TVV', 'NTLT02'),
('NV0017', 'Huỳnh Thanh Xuân', '1999-10-25', 'Nữ', 'Gia Rai', 'Vĩnh Phúc', '0834406644', '02082760174', '1.jpg', 'HDKD', 'NTTT001'),
('NV0018', 'Huỳnh Thanh Hoài', '1996-04-06', 'Nam', 'Ba Na', 'Hải Dương', '0607523713', '09119629230', '1.jpg', 'KT', 'CTNS02'),
('NV0019', 'Lê Chí Nhi', '2000-01-22', 'Nam', 'Brâu', 'Bắc Kạn', '0749024365', '01979694853', '1.jpg', 'MKT', 'CTTC01'),
('NV002', 'Phạm Hoài Nga', '1995-08-20', 'Nam', 'Co Tu', 'Đồng Nai', '0941918367', '09718665254', '1.jpg', 'HDKD', 'CTKD02'),
('NV0020', 'Võ Khánh Châu', '1999-05-22', 'Nữ', 'Cơ Ho', 'Lâm Đồng', '0469491110', '03493355858', '1.jpg', 'MKT', 'NTTC02'),
('NV0021', 'Trương Thanh Châu', '1995-05-12', 'Nam', 'Co Tu', 'Bắc Kạn', '0347071919', '05024016705', '1.jpg', 'KT', 'NTKT01'),
('NV0022', 'Bùi Kim Hoài', '1997-07-16', 'Nữ', 'Khơ Me', 'Quảng Trị', '0386829453', '08216778516', '1.jpg', 'HDKD', 'CTKD01'),
('NV0023', 'Nguyễn Khánh Diễm', '1998-07-19', 'Nữ', 'Ba Na', 'Cà Mau', '0283356020', '02195430619', '1.jpg', 'KT', 'NTKT02'),
('NV0024', 'Đặng Hoài My', '1998-11-02', 'Nam', 'Thái', 'Bắc Kạn', '0816902917', '08218112790', '1.jpg', 'NL', 'NTNS02'),
('NV0025', 'Dương Thanh Diễm', '2000-01-06', 'Nam', 'Brâu', 'Bạc Liêu', '0639622478', '04399158403', '1.jpg', 'KT', 'NTKT01'),
('NV0026', 'Đinh Thanh Quỳnh', '1999-08-23', 'Nam', 'Tày', 'Trà Vinh', '0243259198', '04467382204', '1.jpg', 'HDKD', 'CTQL01'),
('NV0027', 'Đặng Chí Hồng', '1995-09-12', 'Nam', 'Khơ Me', 'Tuyên Quang', '0855275544', '03372668136', '1.jpg', 'HDKD', 'NTTT001'),
('NV0028', 'Lê Chí Châu', '2000-06-29', 'Nữ', 'Co Tu', 'Thái Nguyên', '0898953052', '07706373797', '1.jpg', 'KT', 'CTKT01'),
('NV0029', 'Đinh Thanh Xuân', '2002-03-06', 'Nữ', 'Mạ', 'Đắk Nông', '0445446697', '00197099957', '1.jpg', 'TT', 'NTLT02'),
('NV003', 'Đỗ Khánh Nga', '1995-11-22', 'Nam', 'Gia Rai', 'Hậu Giang', '0362177749', '01543385899', '1.jpg', 'KT', 'CTKT02'),
('NV0030', 'Võ Thanh Hà', '1996-11-04', 'Nữ', 'Co Tu', 'Bình Thuận', '0540356081', '06043702184', '1.jpg', 'KT', 'NTKT01'),
('NV0031', 'Dương Chí Xuân', '1995-06-11', 'Nam', 'Êđê', 'Thừa Thiên–Huế', '0201166848', '05467967098', '1.jpg', 'KT', 'CTKT02'),
('NV0032', 'Dương Hoàng Uyên', '2001-05-04', 'Nữ', 'Ô Đu', 'Bạc Liêu', '0930552881', '06367047848', '1.jpg', 'HDKD', 'CTKD02'),
('NV0033', 'Ngô Kim Uyên', '2002-10-02', 'Nam', 'Brâu', 'Bình Phước', '0714064135', '01022887441', '1.jpg', 'NL', 'CTNS01'),
('NV0034', 'Bùi Hoài Nhung', '2000-11-18', 'Nam', 'Co Tu', 'Nghệ An', '0222625772', '07418398815', '1.jpg', 'FE', 'NTLT01'),
('NV0035', 'Huỳnh Khánh Lan', '1999-03-12', 'Nữ', 'Mạ', 'Hải Phòng', '0404468076', '06223062611', '1.jpg', 'MKT', 'CTTC01'),
('NV0036', 'Vũ Hoài Chi', '1999-10-26', 'Nữ', 'Dao', 'Bà Rịa-Vũng Tàu', '0770956285', '01228221199', '1.jpg', 'TVV', 'CTLT02'),
('NV0037', 'Ngô Khánh Kim', '1996-12-29', 'Nữ', 'Giáy', 'TP Hồ Chí Minh', '0842603256', '02742546409', '1.jpg', 'NL', 'NTNS01'),
('NV0038', 'Hoàng Hoàng Xuân', '2000-04-01', 'Nam', 'Kinh', 'Khánh Hòa', '0652773511', '06438062434', '1.jpg', 'HDKD', 'CTQL01'),
('NV0039', 'Hồ Kim Quỳnh', '1996-02-25', 'Nữ', 'Co Tu', 'Bà Rịa-Vũng Tàu', '0600094021', '06982227807', '1.jpg', 'HDKD', 'CTKD02'),
('NV004', 'Đỗ Khánh Hà', '1999-10-06', 'Nữ', 'Xơ Đăng', 'TP Hồ Chí Minh', '0427400355', '01908222853', '1.jpg', 'NL', 'NTNS02'),
('NV0040', 'Đỗ Chí Duyên', '2000-05-02', 'Nam', 'Ô Đu', 'Lào Cai', '0387585685', '04729147621', '1.jpg', 'LT', 'NTLT02'),
('NV0041', 'Ngô Hoàng Yến', '1997-06-02', 'Nam', 'Mạ', 'Đà Nẵng', '0814202051', '09370880513', '1.jpg', 'HDKD', 'NTTT001'),
('NV0042', 'Lê Thanh Lý', '2000-08-23', 'Nam', 'Kinh', 'Quảng Bình', '0758558001', '09693786314', '1.jpg', 'KT', 'CTNS01'),
('NV0043', 'Nguyễn Kim Hạnh', '1996-11-15', 'Nam', 'Dao', 'Bình Định', '0504289739', '07141150341', '1.jpg', 'HDKD', 'CTKD01'),
('NV0044', 'Lê Hoàng Châu', '1997-09-14', 'Nam', 'Tày', 'Thái Nguyên', '0833926620', '02437814210', '1.jpg', 'NL', 'NTNS01'),
('NV0045', 'Phạm Thanh Hồng', '1995-01-31', 'Nữ', 'Chăm', 'Bến Tre', '0693759239', '08159803147', '1.jpg', 'HDKD', 'NTQL02'),
('NV0046', 'Đỗ Hoài Nhung', '1999-08-15', 'Nữ', 'Cơ Ho', 'Sơn La', '0464467749', '05590411824', '1.jpg', 'HDKD', 'CTKD02'),
('NV0047', 'Vũ Kim Duyên', '1995-02-06', 'Nam', 'Ô Đu', 'Hòa Bình', '0695090563', '03738120414', '1.jpg', 'HDKD', 'CTTT02'),
('NV0048', 'Vũ Hoàng Ngọc', '2001-01-26', 'Nữ', 'Tày', 'Thái Bình', '0609701439', '00317537935', '1.jpg', 'MKT', 'NTTC02'),
('NV0049', 'Nguyễn Hoàng Duyên', '2002-08-27', 'Nam', 'Chăm', 'Bình Dương', '0397183461', '08601861546', '1.jpg', 'HDKD', 'CTKD02'),
('NV005', 'Dương Hoàng Giang', '2002-02-10', 'Nữ', 'Mường', 'Ninh Bình', '0558938023', '03075728404', '1.jpg', 'NL', 'NTNS02'),
('NV0050', 'Hồ Thanh My', '1995-04-07', 'Nữ', 'Chăm', 'Hà Giang', '0474986574', '08434109830', '1.jpg', 'NL', 'NTNS02'),
('NV0051', 'Bùi Chí Ánh', '1995-07-06', 'Nam', 'Kinh', 'Trà Vinh', '0835171338', '06242534559', '1.jpg', 'HDKD', 'CTTT02'),
('NV0052', 'Hồ Hoàng Ngọc', '1995-04-05', 'Nam', 'Êđê', 'Bến Tre', '0886784272', '07960229573', '1.jpg', 'HDKD', 'CTQL01'),
('NV0053', 'Phạm Kim My', '1998-08-22', 'Nam', 'Giáy', 'Quảng Ngãi', '0809201638', '02983213243', '1.jpg', 'KT', 'CTNS02'),
('NV0054', 'Hoàng Kim My', '2000-09-19', 'Nữ', 'Tày', 'Lạng Sơn', '0974718982', '00565158558', '1.jpg', 'HDKD', 'NTKD01'),
('NV0055', 'Đỗ Chí Uyên', '1998-05-28', 'Nữ', 'Kinh', 'Vĩnh Phúc', '0770606239', '08726551523', '1.jpg', 'KT', 'NTNS02'),
('NV0056', 'Vũ Hoài Giang', '1996-03-31', 'Nam', 'Cơ Ho', 'Vĩnh Phúc', '0218496895', '02889087582', '1.jpg', 'KT', 'NTNS01'),
('NV0057', 'Lê Kim Ánh', '1996-04-02', 'Nam', 'Kinh', 'Trà Vinh', '0846846140', '01571372520', '1.jpg', 'TT', 'CTLT01'),
('NV0058', 'Đỗ Chí Duyên', '1999-01-10', 'Nữ', 'Brâu', 'Phú Yên', '0805125695', '07259370808', '1.jpg', 'HDKD', 'CTQL01'),
('NV0059', 'Vũ Hoàng Duyên', '2001-06-05', 'Nam', 'Kinh', 'Ninh Thuận', '0696497473', '08890264474', '1.jpg', 'HDKD', 'NTTT001'),
('NV006', 'Trương Thanh Hà', '1999-07-21', 'Nam', 'Ba Na', 'Hà Nội', '0409657255', '04006459474', '1.jpg', 'KT', 'NTKT01'),
('NV0060', 'Hồ Khánh Dung', '1997-03-03', 'Nữ', 'Xơ Đăng', 'Thừa Thiên–Huế', '0721925476', '06562183280', '1.jpg', 'NL', 'CTNS01'),
('NV0061', 'Lê Kim Ánh', '1996-07-09', 'Nữ', 'Kinh', 'Ninh Thuận', '0254950632', '09107111139', '1.jpg', 'MKT', 'CTTC01'),
('NV0062', 'Hồ Hoàng Lan', '1996-10-06', 'Nam', 'Brâu', 'Bắc Ninh', '0436953211', '00558927041', '1.jpg', 'HDKD', 'NTKD02'),
('NV0063', 'Võ Khánh Ánh', '1997-06-27', 'Nam', 'Ba Na', 'Đồng Tháp', '0477718669', '04295834876', '1.jpg', 'MKT', 'NTTC02'),
('NV0064', 'Nguyễn Chí Dung', '1995-08-07', 'Nam', 'Tày', 'Cần Thơ', '0558287265', '03476069618', '1.jpg', 'KT', 'NTNS01'),
('NV0065', 'Hồ Hoài Duyên', '2000-04-12', 'Nữ', 'Chăm', 'Hà Tĩnh', '0719672117', '04653284791', '1.jpg', 'HDKD', 'CTQL01'),
('NV0066', 'Ngô Khánh Ngọc', '2001-05-14', 'Nữ', 'Raglai', 'Kon Tum', '0919023267', '08141442622', '1.jpg', 'LT', 'NTLT02'),
('NV0067', 'Ngô Thanh Yến', '1995-09-29', 'Nữ', 'Ba Na', 'Cần Thơ', '0750266102', '05942078156', '1.jpg', 'NL', 'NTNS01'),
('NV0068', 'Ngô Hoài My', '1996-12-17', 'Nữ', 'Cơ Ho', 'Lâm Đồng', '0888275244', '04552523484', '1.jpg', 'KT', 'NTNS02'),
('NV0069', 'Nguyễn Hoàng Duyên', '1999-07-05', 'Nam', 'Ba Na', 'Bà Rịa-Vũng Tàu', '0990767150', '05392025941', '1.jpg', 'FE', 'CTLT02'),
('NV007', 'Ngô Chí Chi', '1998-04-30', 'Nam', 'Co Tu', 'Bắc Kạn', '0551484907', '08250942200', '1.jpg', 'HDKD', 'NTKD02'),
('NV0070', 'Võ Kim Ánh', '1996-05-18', 'Nam', 'Thái', 'Ninh Thuận', '0733484441', '02366123790', '1.jpg', 'MKT', 'NTTC02'),
('NV008', 'Hoàng Khánh Lý', '1995-09-28', 'Nữ', 'Khơ Me', 'Đồng Nai', '0803066532', '05831242181', '1.jpg', 'KT', 'CTKT01'),
('NV009', 'Bùi Thanh Kim', '1997-12-23', 'Nam', 'Thái', 'Kiên Giang', '0669255330', '02533486943', '1.jpg', 'TT', 'CTLT01');

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
  `level` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `manv`, `tentk`, `email`, `matkhau`, `level`) VALUES
(725, 'NV001', 'NV001', 'VuNga952gmailcom', '123456', 1),
(726, 'NV002', 'NV002', 'PhamNga855gmailcom', '123456', 1),
(727, 'NV003', 'NV003', 'DNga553gmailcom', '123456', 1),
(728, 'NV004', 'NV004', 'DHa146gmailcom', '123456', 1),
(729, 'NV005', 'NV005', 'DngGiang163gmailcom', '123456', 1),
(730, 'NV006', 'NV006', 'TrngHa717gmailcom', '123456', 1),
(731, 'NV007', 'NV007', 'NgoChi949gmailcom', '123456', 1),
(732, 'NV008', 'NV008', 'HoangLy287gmailcom', '123456', 1),
(733, 'NV009', 'NV009', 'BuiKim838gmailcom', '123456', 1),
(734, 'NV0010', 'NV0010', 'DngMy975gmailcom', '123456', 1),
(735, 'NV0011', 'NV0011', 'DMai542gmailcom', '123456', 1),
(736, 'NV0012', 'NV0012', 'VoKim122gmailcom', '123456', 1),
(737, 'NV0013', 'NV0013', 'DngYn695gmailcom', '123456', 1),
(738, 'NV0014', 'NV0014', 'DngDuyen661gmailcom', '123456', 1),
(739, 'NV0015', 'NV0015', 'LeUyen351gmailcom', '123456', 1),
(740, 'NV0016', 'NV0016', 'NguynAnh375gmailcom', '123456', 1),
(741, 'NV0017', 'NV0017', 'HuynhXuan672gmailcom', '123456', 1),
(742, 'NV0018', 'NV0018', 'HuynhHoai111gmailcom', '123456', 1),
(743, 'NV0019', 'NV0019', 'LeNhi721gmailcom', '123456', 1),
(744, 'NV0020', 'NV0020', 'VoChau393gmailcom', '123456', 1),
(745, 'NV0021', 'NV0021', 'TrngChau189gmailcom', '123456', 1),
(746, 'NV0022', 'NV0022', 'BuiHoai468gmailcom', '123456', 1),
(747, 'NV0023', 'NV0023', 'NguynDim296gmailcom', '123456', 1),
(748, 'NV0024', 'NV0024', 'DngMy433gmailcom', '123456', 1),
(749, 'NV0025', 'NV0025', 'DngDim949gmailcom', '123456', 1),
(750, 'NV0026', 'NV0026', 'DinhQuynh146gmailcom', '123456', 1),
(751, 'NV0027', 'NV0027', 'DngHng847gmailcom', '123456', 1),
(752, 'NV0028', 'NV0028', 'LeChau551gmailcom', '123456', 1),
(753, 'NV0029', 'NV0029', 'DinhXuan675gmailcom', '123456', 1),
(754, 'NV0030', 'NV0030', 'VoHa367gmailcom', '123456', 1),
(755, 'NV0031', 'NV0031', 'DngXuan229gmailcom', '123456', 1),
(756, 'NV0032', 'NV0032', 'DngUyen824gmailcom', '123456', 1),
(757, 'NV0033', 'NV0033', 'NgoUyen873gmailcom', '123456', 1),
(758, 'NV0034', 'NV0034', 'BuiNhung617gmailcom', '123456', 1),
(759, 'NV0035', 'NV0035', 'HuynhLan262gmailcom', '123456', 1),
(760, 'NV0036', 'NV0036', 'VuChi238gmailcom', '123456', 1),
(761, 'NV0037', 'NV0037', 'NgoKim247gmailcom', '123456', 1),
(762, 'NV0038', 'NV0038', 'HoangXuan738gmailcom', '123456', 1),
(763, 'NV0039', 'NV0039', 'HQuynh114gmailcom', '123456', 1),
(764, 'NV0040', 'NV0040', 'DDuyen935gmailcom', '123456', 1),
(765, 'NV0041', 'NV0041', 'NgoYn668gmailcom', '123456', 1),
(766, 'NV0042', 'NV0042', 'LeLy257gmailcom', '123456', 1),
(767, 'NV0043', 'NV0043', 'NguynHanh397gmailcom', '123456', 1),
(768, 'NV0044', 'NV0044', 'LeChau113gmailcom', '123456', 1),
(769, 'NV0045', 'NV0045', 'PhamHng443gmailcom', '123456', 1),
(770, 'NV0046', 'NV0046', 'DNhung124gmailcom', '123456', 1),
(771, 'NV0047', 'NV0047', 'VuDuyen526gmailcom', '123456', 1),
(772, 'NV0048', 'NV0048', 'VuNgoc543gmailcom', '123456', 1),
(773, 'NV0049', 'NV0049', 'NguynDuyen563gmailcom', '123456', 1),
(774, 'NV0050', 'NV0050', 'HMy451gmailcom', '123456', 1),
(775, 'NV0051', 'NV0051', 'BuiAnh123gmailcom', '123456', 1),
(776, 'NV0052', 'NV0052', 'HNgoc985gmailcom', '123456', 1),
(777, 'NV0053', 'NV0053', 'PhamMy349gmailcom', '123456', 1),
(778, 'NV0054', 'NV0054', 'HoangMy395gmailcom', '123456', 1),
(779, 'NV0055', 'NV0055', 'DUyen679gmailcom', '123456', 1),
(780, 'NV0056', 'NV0056', 'VuGiang582gmailcom', '123456', 1),
(781, 'NV0057', 'NV0057', 'LeAnh928gmailcom', '123456', 1),
(782, 'NV0058', 'NV0058', 'DDuyen286gmailcom', '123456', 1),
(783, 'NV0059', 'NV0059', 'VuDuyen182gmailcom', '123456', 1),
(784, 'NV0060', 'NV0060', 'HDung416gmailcom', '123456', 1),
(785, 'NV0061', 'NV0061', 'LeAnh199gmailcom', '123456', 1),
(786, 'NV0062', 'NV0062', 'HLan871gmailcom', '123456', 1),
(787, 'NV0063', 'NV0063', 'VoAnh751gmailcom', '123456', 1),
(788, 'NV0064', 'NV0064', 'NguynDung988gmailcom', '123456', 1),
(789, 'NV0065', 'NV0065', 'HDuyen127gmailcom', '123456', 1),
(790, 'NV0066', 'NV0066', 'NgoNgoc573gmailcom', '123456', 1),
(791, 'NV0067', 'NV0067', 'NgoYn569gmailcom', '123456', 1),
(792, 'NV0068', 'NV0068', 'NgoMy784gmailcom', '123456', 1),
(793, 'NV0069', 'NV0069', 'NguynDuyen984gmailcom', '123456', 1),
(794, 'NV0070', 'NV0070', 'VoAnh875gmailcom', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theodoikehoach`
--

CREATE TABLE `theodoikehoach` (
  `makehoach` varchar(10) NOT NULL COMMENT 'mã số kế hoạch',
  `manhanvien` varchar(10) NOT NULL COMMENT 'mã số nhân viên',
  `machitieu` varchar(10) NOT NULL COMMENT 'mã số chỉ tiêu',
  `thang` varchar(10) NOT NULL COMMENT 'tháng thực hiện ',
  `chitieuthangdatduoc` int(11) NOT NULL DEFAULT 0 COMMENT 'chỉ tiêu trong tháng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('NV001', 'C1', '2023-05-23', '0000-00-00'),
('NV0010', 'C1', '2023-05-23', '0000-00-00'),
('NV0011', 'C1', '2023-05-23', '0000-00-00'),
('NV0012', 'C1', '2023-05-23', '0000-00-00'),
('NV0013', 'C1', '2023-05-23', '0000-00-00'),
('NV0014', 'C1', '2023-05-23', '0000-00-00'),
('NV0015', 'C1', '2023-05-23', '0000-00-00'),
('NV0016', 'C1', '2023-05-23', '0000-00-00'),
('NV0017', 'C1', '2023-05-23', '0000-00-00'),
('NV0018', 'C1', '2023-05-23', '0000-00-00'),
('NV0019', 'C1', '2023-05-23', '0000-00-00'),
('NV002', 'C1', '2023-05-23', '0000-00-00'),
('NV0020', 'C1', '2023-05-23', '0000-00-00'),
('NV0021', 'C1', '2023-05-23', '0000-00-00'),
('NV0022', 'C1', '2023-05-23', '0000-00-00'),
('NV0023', 'C1', '2023-05-23', '0000-00-00'),
('NV0024', 'C1', '2023-05-23', '0000-00-00'),
('NV0025', 'C1', '2023-05-23', '0000-00-00'),
('NV0026', 'C1', '2023-05-23', '0000-00-00'),
('NV0027', 'C1', '2023-05-23', '0000-00-00'),
('NV0028', 'C1', '2023-05-23', '0000-00-00'),
('NV0029', 'C1', '2023-05-23', '0000-00-00'),
('NV003', 'C1', '2023-05-23', '0000-00-00'),
('NV0030', 'C1', '2023-05-23', '0000-00-00'),
('NV0031', 'C1', '2023-05-23', '0000-00-00'),
('NV0032', 'C1', '2023-05-23', '0000-00-00'),
('NV0033', 'C1', '2023-05-23', '0000-00-00'),
('NV0034', 'C1', '2023-05-23', '0000-00-00'),
('NV0035', 'C1', '2023-05-23', '0000-00-00'),
('NV0036', 'C1', '2023-05-23', '0000-00-00'),
('NV0037', 'C1', '2023-05-23', '0000-00-00'),
('NV0038', 'C1', '2023-05-23', '0000-00-00'),
('NV0039', 'C1', '2023-05-23', '0000-00-00'),
('NV004', 'C1', '2023-05-23', '0000-00-00'),
('NV0040', 'C1', '2023-05-23', '0000-00-00'),
('NV0041', 'C1', '2023-05-23', '0000-00-00'),
('NV0042', 'C1', '2023-05-23', '0000-00-00'),
('NV0043', 'C1', '2023-05-23', '0000-00-00'),
('NV0044', 'C1', '2023-05-23', '0000-00-00'),
('NV0045', 'C1', '2023-05-23', '0000-00-00'),
('NV0046', 'C1', '2023-05-23', '0000-00-00'),
('NV0047', 'C1', '2023-05-23', '0000-00-00'),
('NV0048', 'C1', '2023-05-23', '0000-00-00'),
('NV0049', 'C1', '2023-05-23', '0000-00-00'),
('NV005', 'C1', '2023-05-23', '0000-00-00'),
('NV0050', 'C1', '2023-05-23', '0000-00-00'),
('NV0051', 'C1', '2023-05-23', '0000-00-00'),
('NV0052', 'C1', '2023-05-23', '0000-00-00'),
('NV0053', 'C1', '2023-05-23', '0000-00-00'),
('NV0054', 'C1', '2023-05-23', '0000-00-00'),
('NV0055', 'C1', '2023-05-23', '0000-00-00'),
('NV0056', 'C1', '2023-05-23', '0000-00-00'),
('NV0057', 'C1', '2023-05-23', '0000-00-00'),
('NV0058', 'C1', '2023-05-23', '0000-00-00'),
('NV0059', 'C1', '2023-05-23', '0000-00-00'),
('NV006', 'C1', '2023-05-23', '0000-00-00'),
('NV0060', 'C1', '2023-05-23', '0000-00-00'),
('NV0061', 'C1', '2023-05-23', '0000-00-00'),
('NV0062', 'C1', '2023-05-23', '0000-00-00'),
('NV0063', 'C1', '2023-05-23', '0000-00-00'),
('NV0064', 'C1', '2023-05-23', '0000-00-00'),
('NV0065', 'C1', '2023-05-23', '0000-00-00'),
('NV0066', 'C1', '2023-05-23', '0000-00-00'),
('NV0067', 'C1', '2023-05-23', '0000-00-00'),
('NV0068', 'C1', '2023-05-23', '0000-00-00'),
('NV0069', 'C1', '2023-05-23', '0000-00-00'),
('NV007', 'C1', '2023-05-23', '0000-00-00'),
('NV0070', 'C1', '2023-05-23', '0000-00-00'),
('NV008', 'C1', '2023-05-23', '0000-00-00'),
('NV009', 'C1', '2023-05-23', '0000-00-00');

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
  ADD PRIMARY KEY (`makehoach`,`nguoi_danh_gia`) USING BTREE,
  ADD KEY `nguoi_danh_gia` (`nguoi_danh_gia`);

--
-- Indexes for table `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD PRIMARY KEY (`makehoach`),
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
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

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
-- Constraints for table `danhgiakehoach`
--
ALTER TABLE `danhgiakehoach`
  ADD CONSTRAINT `danhgiakehoach_ibfk_1` FOREIGN KEY (`makehoach`) REFERENCES `kehoachgiaoviec` (`makehoach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `danhgiakehoach_ibfk_2` FOREIGN KEY (`nguoi_danh_gia`) REFERENCES `nhanvien` (`manhanvien`);

--
-- Constraints for table `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD CONSTRAINT `fk_bophan1` FOREIGN KEY (`mabophan`) REFERENCES `bophan` (`mabophan`) ON DELETE CASCADE ON UPDATE CASCADE,
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
