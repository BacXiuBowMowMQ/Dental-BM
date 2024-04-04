-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 11:40 AM
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
-- Database: `nhakhoabm`
--

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `EMAILBN` varchar(40) NOT NULL,
  `MAQUYEN` int(11) NOT NULL,
  `SDTBN` varchar(20) DEFAULT NULL,
  `HOTENBN` varchar(70) NOT NULL,
  `CCCDBN` varchar(25) NOT NULL,
  `GIOITINHBN` varchar(10) NOT NULL,
  `NAMSINHBN` date NOT NULL,
  `DIACHIBN` varchar(100) NOT NULL,
  `PASSWORDBN` varchar(50) NOT NULL,
  `NHOMMAU` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`EMAILBN`, `MAQUYEN`, `SDTBN`, `HOTENBN`, `CCCDBN`, `GIOITINHBN`, `NAMSINHBN`, `DIACHIBN`, `PASSWORDBN`, `NHOMMAU`) VALUES
('dau@gmail.com', 3, '03272223445', 'Bé Dâu', '08930216657', 'Nữ', '1997-02-11', 'Hậu Giang', '202cb962ac59075b964b07152d234b70', 'A'),
('duy@gmail.com', 3, '0914567891', 'Yên Duy', '08330216628', 'Nữ', '1995-02-11', 'Vĩnh Long', '202cb962ac59075b964b07152d234b70', 'B'),
('kimhong@gmail.com', 3, '0934567891', 'Kim Hồng', '012345678910', 'Nữ', '2000-02-01', 'Cần Thơ', '250cf8b51c773f3f8dc8b4be867a9a02', 'O'),
('ngoc@gmail.com', 3, '0312223447', 'Minh Ngọc', '08930216657', 'Nữ', '2002-03-15', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', 'O'),
('thiendi@gmail.com', 3, '0312223447', 'Thiên Di ', '08930216657', 'Nữ', '1999-02-11', 'An Giang ', '202cb962ac59075b964b07152d234b70', 'A'),
('trang@gmail.com', 3, '0989789789', 'Kiều Trang', '09122223445', 'Nữ', '2000-03-09', 'An Giang', '202cb962ac59075b964b07152d234b70', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `calamviec`
--

CREATE TABLE `calamviec` (
  `MACLV` varchar(15) NOT NULL,
  `THOIGIANBATDAU` datetime NOT NULL,
  `THOIGIANKETTHUC` datetime NOT NULL,
  `XACNHAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calamviec`
--

INSERT INTO `calamviec` (`MACLV`, `THOIGIANBATDAU`, `THOIGIANKETTHUC`, `XACNHAN`) VALUES
('CS1', '2024-05-01 08:00:00', '2024-05-01 13:00:00', 1),
('CS2', '2024-05-02 08:00:00', '2024-05-02 13:00:00', 1),
('CS3', '2024-05-03 08:00:00', '2024-05-03 13:00:00', 1),
('CS4', '2024-05-04 08:00:00', '2024-05-04 13:00:00', 1),
('CS5', '2024-05-05 08:00:00', '2024-05-05 13:00:00', 0),
('CS6', '2024-05-06 08:00:00', '2024-05-06 13:00:00', 0),
('CS7', '2024-05-07 08:00:00', '2024-05-07 13:00:00', 0),
('CS8', '2024-05-18 08:00:00', '2024-05-08 13:00:00', 0),
('CT1', '2024-05-01 13:00:00', '2024-05-01 20:00:00', 1),
('CT2', '2024-05-02 13:00:00', '2024-05-02 20:00:00', 1),
('CT3', '2024-05-03 13:00:00', '2024-05-03 20:00:00', 1),
('CT4', '2024-05-04 13:00:00', '2024-05-04 20:00:00', 0),
('CT5', '2024-05-05 13:00:00', '2024-05-05 20:00:00', 0),
('CT6', '2024-05-06 13:00:00', '2024-05-06 20:00:00', 0),
('CT7', '2024-05-07 13:00:00', '2024-05-07 20:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiettoathuoc`
--

CREATE TABLE `chitiettoathuoc` (
  `MATOA` varchar(15) NOT NULL,
  `MATHUOC` varchar(15) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONVITINH` varchar(10) NOT NULL,
  `LIEUDUNG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiettoathuoc`
--

INSERT INTO `chitiettoathuoc` (`MATOA`, `MATHUOC`, `SOLUONG`, `DONVITINH`, `LIEUDUNG`) VALUES
('m1', 'GD1', 7, 'Viên', 'Buổi sáng trước khi ăn'),
('MT01', 'GD1', 1, 'Vien', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `MADICHVU` varchar(20) NOT NULL,
  `TENDICHVU` varchar(70) NOT NULL,
  `GIADV` varchar(20) NOT NULL,
  `MOTADV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`MADICHVU`, `TENDICHVU`, `GIADV`, `MOTADV`) VALUES
('DV1', 'Cạo vôi - đánh bóng', '100.000', 'Cạo vôi răng là làm sạch các mảng bám. '),
('DV10', 'Răng sứ cố định', '1.500.000', 'Phương pháp nha khoa khắc phục những tình trạng răng bị mất bằng cách trồng răng giả để thay thế'),
('DV11', 'Răng sứ cao cấp', '4.000.000', 'Bọc răng sứ cao cấp được thực hiện dựa trên dòng răng được làm hoàn toàn từ chất liệu sứ nguyên chất'),
('DV2', 'Trám răng thẩm mỹ', '300.000', 'Trám răng là một kỹ thuật nha khoa sử dụng vật liệu nhân tạo để bổ sung vào phần mô răng bị thiếu.'),
('DV3', 'Chữa tỷ - lấy chỉ màu', '400.000', 'Nha sĩ sẽ tiến hành làm sạch, tạo dạng và hàn kín lại hệ thống ống tủy'),
('DV4', 'Cấm chốt tái tạo', '100.000', 'Ứng dụng cắm chốt để tái tạo răng, làm đẹp'),
('DV5', 'Nhổ răng sữa', '60.000', 'Nhổ răng sữa cho trẻ em là một giải pháp nha khoa phổ biến và tối ưu để khắc phục các vấn đề về răng'),
('DV6', 'Nhổ răng vĩnh viễn', '200.000', 'Sâu răng đã quá trầm trọng, răng bị sâu hoàn toàn, không thể hàn răng.'),
('DV7', 'Nhổ răng khó', '500.000', 'Nhổ răng khó là những răng mọc lệch, răng ngầm, răng khôn bị tai biến, răng bị gẫy chân, răng dính k'),
('DV8', 'Tiểu phẩu răng khôn', '800.000', 'Nhổ răng khôn là một tiểu phẫu để lấy bỏ một hoặc nhiều răng số 8'),
('DV9', 'Răng tháo lắp', '600.000', 'Răng giả tháo lắp là răng thay thế được cố định trên một đế nhựa.');

-- --------------------------------------------------------

--
-- Table structure for table `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `MACLV` varchar(15) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichlamviec`
--

INSERT INTO `lichlamviec` (`MACLV`, `EMAILNV`) VALUES
('CS1', 'bshua@gmail.com'),
('CS2', 'bshua@gmail.com'),
('CS3', 'bsthy@gmail.com'),
('CS4', 'bstuan@gmail.com'),
('CT1', 'bshua@gmail.com'),
('CT2', 'bshua@gmail.com'),
('CT3', 'bsthy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `EMAILNV` varchar(40) NOT NULL,
  `MAQUYEN` int(11) NOT NULL,
  `SDTNV` varchar(20) NOT NULL,
  `HOTENNV` varchar(70) NOT NULL,
  `GIOITINHNV` varchar(10) NOT NULL,
  `NAMSINHNV` date NOT NULL,
  `DIACHINV` varchar(100) NOT NULL,
  `PASSWORDNV` varchar(50) NOT NULL,
  `NGAYVAOLAMVIEC` date NOT NULL,
  `CHUNGCHIHANHNGHE` varchar(100) NOT NULL,
  `BANGCAPCHUYENMON` varchar(60) NOT NULL,
  `COSODAOTAO` varchar(100) NOT NULL,
  `SONAMKINHNGHIEM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`EMAILNV`, `MAQUYEN`, `SDTNV`, `HOTENNV`, `GIOITINHNV`, `NAMSINHNV`, `DIACHINV`, `PASSWORDNV`, `NGAYVAOLAMVIEC`, `CHUNGCHIHANHNGHE`, `BANGCAPCHUYENMON`, `COSODAOTAO`, `SONAMKINHNGHIEM`) VALUES
('admin@gmail.com', 1, '0913398756', 'Admin nè', 'nu', '2002-07-24', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2024-02-01', '', '', '', ''),
('bshua@gmail.com', 2, '0348788321', 'BS. Cố Hứa', 'Nam', '1986-05-22', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2020-03-21', 'Có chứng chỉ hành nghề', 'Bằng cử nhân', 'Trường Đại học Y Dược TP. Cần Thơ', '4 năm'),
('bsthy@gmail.com', 2, '0312223447', 'BS. Bích Thủy', 'Nữ', '1987-01-22', 'An Giang', '99b2ab7d7022136a8f09bb7afe001279', '2017-03-21', 'Có chứng chỉ hành nghề', 'Bằng cử nhân', 'Trường Đại học Y Dược TP. Cần Thơ', '7 năm'),
('bstuan@gmail.com', 2, '0932019899', 'BS. Minh Tuấn', 'Nam', '1887-03-22', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2015-03-21', 'Có chứng chỉ hành nghề', 'Bằng tiến sĩ', 'Trường Đại học Y Dược TP. Cần Thơ', '9 năm');

-- --------------------------------------------------------

--
-- Table structure for table `pdldv`
--

CREATE TABLE `pdldv` (
  `IDPHIEU` varchar(15) NOT NULL,
  `MADICHVU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdldv`
--

INSERT INTO `pdldv` (`IDPHIEU`, `MADICHVU`) VALUES
('ID1207217803', 'DV7'),
('ID1687314331', 'DV1'),
('ID1711465169-tr', 'DV1'),
('ID1711465169-tr', 'DV10'),
('ID2056875811', 'DV8'),
('ID328231330', 'DV2'),
('ID330054538', 'DV5'),
('ID660976296', 'DV2');

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MAQUYEN` int(11) NOT NULL,
  `TENQUYEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`MAQUYEN`, `TENQUYEN`) VALUES
(1, 'Admin'),
(2, 'Bác sĩ'),
(3, 'Bệnh nhân');

-- --------------------------------------------------------

--
-- Table structure for table `phieudatlich`
--

CREATE TABLE `phieudatlich` (
  `IDPHIEU` varchar(15) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL,
  `EMAILBN` varchar(40) NOT NULL,
  `NGAYDAT` date NOT NULL,
  `GIODAT` time NOT NULL,
  `TRANGTHAIPDL` int(11) NOT NULL,
  `XULY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieudatlich`
--

INSERT INTO `phieudatlich` (`IDPHIEU`, `EMAILNV`, `EMAILBN`, `NGAYDAT`, `GIODAT`, `TRANGTHAIPDL`, `XULY`) VALUES
('ID1207217803', 'bshua@gmail.com', 'ngoc@gmail.com', '2024-05-01', '13:00:00', 1, 1),
('ID1687314331', 'bshua@gmail.com', 'trang@gmail.com', '2024-05-01', '08:00:00', 1, 1),
('ID1711386633-tr', 'bshua@gmail.com', 'trang@gmail.com', '2024-04-05', '17:00:00', 0, 0),
('ID1711465169-tr', 'bshua@gmail.com', 'trang@gmail.com', '2024-03-29', '12:00:00', 0, 0),
('ID2056875811', 'bsthy@gmail.com', 'trang@gmail.com', '2024-03-31', '11:00:00', 0, 0),
('ID328231330', 'bsthy@gmail.com', 'trang@gmail.com', '2024-03-02', '10:00:00', 0, 0),
('ID330054538', 'bstuan@gmail.com', 'trang@gmail.com', '2024-04-13', '16:00:00', 0, 0),
('ID660976296', 'bstuan@gmail.com', 'trang@gmail.com', '2024-03-30', '15:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phieukhambenh`
--

CREATE TABLE `phieukhambenh` (
  `STT_PHIEUKHAM` varchar(11) NOT NULL,
  `EMAILBN` varchar(40) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL,
  `NGAYKHAM` date NOT NULL,
  `GIOKHAM` time NOT NULL,
  `MOTA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieukhambenh`
--

INSERT INTO `phieukhambenh` (`STT_PHIEUKHAM`, `EMAILBN`, `EMAILNV`, `NGAYKHAM`, `GIOKHAM`, `MOTA`) VALUES
('STT66063970', 'trang@gmail.com', 'bshua@gmail.com', '2024-04-01', '09:00:00', '- Kiểm tra sức khỏe rang miệng\r\n- Cạo voi\r\n- Đánh bóngTrám răng\r\n- Hướng dẫn về chăm sóc ');

-- --------------------------------------------------------

--
-- Table structure for table `phieuthu`
--

CREATE TABLE `phieuthu` (
  `MAPT` varchar(15) NOT NULL,
  `STT_PHIEUKHAM` varchar(11) NOT NULL,
  `NGAYLAPPT` datetime NOT NULL,
  `TONGGIA` varchar(20) NOT NULL,
  `LYDO` varchar(200) NOT NULL,
  `TRANGTHAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieuthu`
--

INSERT INTO `phieuthu` (`MAPT`, `STT_PHIEUKHAM`, `NGAYLAPPT`, `TONGGIA`, `LYDO`, `TRANGTHAI`) VALUES
('pzPktzXQEo', 'STT66063970', '2024-03-29 04:52:04', '400', 'Thanh toán chi phí khám bệnh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pkbdv`
--

CREATE TABLE `pkbdv` (
  `STT_PHIEUKHAM` varchar(11) NOT NULL,
  `MADICHVU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkbdv`
--

INSERT INTO `pkbdv` (`STT_PHIEUKHAM`, `MADICHVU`) VALUES
('STT66063970', 'DV1'),
('STT66063970', 'DV2');

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `MATHUOC` varchar(15) NOT NULL,
  `TENTHUOC` varchar(60) NOT NULL,
  `LOAITHUOC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`MATHUOC`, `TENTHUOC`, `LOAITHUOC`) VALUES
('GD1', 'Paracetamol', 'Giảm Đau 1'),
('GD2', 'Codein', 'Giảm Đau 2'),
('GD3', 'Tramadol', 'Giảm Đau 2'),
('GD4', 'Morphin', 'Giảm Đau 3'),
('GD5', 'Buprenorphin', 'Giảm Đau 3'),
('GD6', 'Nalbuphin', 'Giảm Đau 3'),
('KV1', 'Aspirin', 'Kháng viêm '),
('KV2', 'Ibuprofen', 'Kháng viêm '),
('KV3', 'Diclofenac', 'Kháng viêm '),
('T001', 'Kem đánh răng Fluoride', 'Kem đánh răng'),
('T002', 'Nước Súc Miệng', 'Vệ sinh miệng'),
('T003', 'Chỉ Nha khoa', 'Vệ sinh miệng'),
('T004', 'Gel Tê Lành', 'Thuốc tê'),
('T005', 'Kháng sinh uống', 'Kháng sinh');

-- --------------------------------------------------------

--
-- Table structure for table `toa_thuoc`
--

CREATE TABLE `toa_thuoc` (
  `MATOA` varchar(15) NOT NULL,
  `STT_PHIEUKHAM` varchar(11) NOT NULL,
  `CHUANDOAN` varchar(50) NOT NULL,
  `NGAYTAIKHAM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toa_thuoc`
--

INSERT INTO `toa_thuoc` (`MATOA`, `STT_PHIEUKHAM`, `CHUANDOAN`, `NGAYTAIKHAM`) VALUES
('m1', 'STT66063970', 'Đau răng', '2024-03-31'),
('MT01', 'STT66063970', 'Viêm nứu', '2024-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`EMAILBN`),
  ADD KEY `FK_BENHNHAN_CO_Q_PHANQUYE` (`MAQUYEN`);

--
-- Indexes for table `calamviec`
--
ALTER TABLE `calamviec`
  ADD PRIMARY KEY (`MACLV`);

--
-- Indexes for table `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD PRIMARY KEY (`MATOA`,`MATHUOC`),
  ADD KEY `TCTTT_FK` (`MATOA`),
  ADD KEY `CTTTT_FK` (`MATHUOC`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MADICHVU`);

--
-- Indexes for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`MACLV`,`EMAILNV`),
  ADD KEY `LLVCLV_FK` (`MACLV`),
  ADD KEY `NV_LLV_FK` (`EMAILNV`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`EMAILNV`),
  ADD KEY `NVPQ_FK` (`MAQUYEN`);

--
-- Indexes for table `pdldv`
--
ALTER TABLE `pdldv`
  ADD PRIMARY KEY (`IDPHIEU`,`MADICHVU`),
  ADD KEY `PDLDV_FK` (`IDPHIEU`),
  ADD KEY `PDLDV2_FK` (`MADICHVU`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Indexes for table `phieudatlich`
--
ALTER TABLE `phieudatlich`
  ADD PRIMARY KEY (`IDPHIEU`),
  ADD KEY `BNPDL_FK` (`EMAILBN`),
  ADD KEY `NV_PDV_FK` (`EMAILNV`);

--
-- Indexes for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD PRIMARY KEY (`STT_PHIEUKHAM`),
  ADD KEY `BNPKB_FK` (`EMAILBN`),
  ADD KEY `NV_PKB_FK` (`EMAILNV`);

--
-- Indexes for table `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD PRIMARY KEY (`MAPT`),
  ADD KEY `PKBPT_FK` (`STT_PHIEUKHAM`);

--
-- Indexes for table `pkbdv`
--
ALTER TABLE `pkbdv`
  ADD PRIMARY KEY (`STT_PHIEUKHAM`,`MADICHVU`),
  ADD KEY `PKBDV_FK` (`STT_PHIEUKHAM`),
  ADD KEY `PKBDV2_FK` (`MADICHVU`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`MATHUOC`);

--
-- Indexes for table `toa_thuoc`
--
ALTER TABLE `toa_thuoc`
  ADD PRIMARY KEY (`MATOA`),
  ADD KEY `PKBTT_FK` (`STT_PHIEUKHAM`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `FK_BENHNHAN_CO_Q_PHANQUYE` FOREIGN KEY (`MAQUYEN`) REFERENCES `phanquyen` (`MAQUYEN`);

--
-- Constraints for table `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD CONSTRAINT `FK_CHITIETT_CTTTT_THUOC` FOREIGN KEY (`MATHUOC`) REFERENCES `thuoc` (`MATHUOC`),
  ADD CONSTRAINT `FK_CHITIETT_TTCTTT_TOA_THUO` FOREIGN KEY (`MATOA`) REFERENCES `toa_thuoc` (`MATOA`);

--
-- Constraints for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `FK_LICHLAMV_CO_LICHLA_NHANVIEN` FOREIGN KEY (`EMAILNV`) REFERENCES `nhanvien` (`EMAILNV`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LICHLAMV_THUOC_CLV_CALAMVIE` FOREIGN KEY (`MACLV`) REFERENCES `calamviec` (`MACLV`) ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NHANVIEN_CO_PQ_PHANQUYE` FOREIGN KEY (`MAQUYEN`) REFERENCES `phanquyen` (`MAQUYEN`);

--
-- Constraints for table `pdldv`
--
ALTER TABLE `pdldv`
  ADD CONSTRAINT `FK_THUOC_DV_THUOC_DV2_DICHVU` FOREIGN KEY (`MADICHVU`) REFERENCES `dichvu` (`MADICHVU`),
  ADD CONSTRAINT `FK_THUOC_DV_THUOC_DV_PHIEUDAT` FOREIGN KEY (`IDPHIEU`) REFERENCES `phieudatlich` (`IDPHIEU`);

--
-- Constraints for table `phieudatlich`
--
ALTER TABLE `phieudatlich`
  ADD CONSTRAINT `FK_PHIEUDAT_CO_PDL_BENHNHAN` FOREIGN KEY (`EMAILBN`) REFERENCES `benhnhan` (`EMAILBN`),
  ADD CONSTRAINT `FK_PHIEUDAT_TAO_PHIEU_NHANVIEN` FOREIGN KEY (`EMAILNV`) REFERENCES `nhanvien` (`EMAILNV`);

--
-- Constraints for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD CONSTRAINT `FK_PHIEUKHA_CO_PKB_BENHNHAN` FOREIGN KEY (`EMAILBN`) REFERENCES `benhnhan` (`EMAILBN`),
  ADD CONSTRAINT `FK_PHIEUKHA_LAP_PKB_NHANVIEN` FOREIGN KEY (`EMAILNV`) REFERENCES `nhanvien` (`EMAILNV`);

--
-- Constraints for table `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD CONSTRAINT `FK_PHIEUTHU_LAP_PHIEU_PHIEUKHA` FOREIGN KEY (`STT_PHIEUKHAM`) REFERENCES `phieukhambenh` (`STT_PHIEUKHAM`);

--
-- Constraints for table `pkbdv`
--
ALTER TABLE `pkbdv`
  ADD CONSTRAINT `FK_PKBDV_PKBDV2_DICHVU` FOREIGN KEY (`MADICHVU`) REFERENCES `dichvu` (`MADICHVU`),
  ADD CONSTRAINT `FK_PKBDV_PKBDV_PHIEUKHA` FOREIGN KEY (`STT_PHIEUKHAM`) REFERENCES `phieukhambenh` (`STT_PHIEUKHAM`);

--
-- Constraints for table `toa_thuoc`
--
ALTER TABLE `toa_thuoc`
  ADD CONSTRAINT `FK_TOA_THUO_TAO_TT_PHIEUKHA` FOREIGN KEY (`STT_PHIEUKHAM`) REFERENCES `phieukhambenh` (`STT_PHIEUKHAM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
