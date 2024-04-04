-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2024 lúc 12:18 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhakhoabm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
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
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`EMAILBN`, `MAQUYEN`, `SDTBN`, `HOTENBN`, `CCCDBN`, `GIOITINHBN`, `NAMSINHBN`, `DIACHIBN`, `PASSWORDBN`, `NHOMMAU`) VALUES
('dau@gmail.com', 3, '03272223445', 'Bé Dâu', '08930216657', 'Nữ', '1997-02-11', 'Hậu Giang', '202cb962ac59075b964b07152d234b70', ''),
('duy@gmail.com', 3, '0914567891', 'Yên Duy', '08330216628', 'Nữ', '1995-02-11', 'Vĩnh Long', '202cb962ac59075b964b07152d234b70', ''),
('kimhong@gmail.com', 3, '0934567891', 'Kim Hồng', '012345678910', 'Nữ', '2000-02-01', 'Cần Thơ', '250cf8b51c773f3f8dc8b4be867a9a02', 'O'),
('quan@gmail.com', 3, '0932019899', 'Quân', '08930216655', 'Nam', '2002-11-09', 'An Giang', '202cb962ac59075b964b07152d234b70', ''),
('thiendi@gmail.com', 3, '0312223447', 'Thiên Di ', '08930216657', 'Nữ', '1999-02-11', 'An Giang ', '202cb962ac59075b964b07152d234b70', ''),
('trang@gmail.com', 3, '0989789789', 'Kiều Trang ', '09122223445', 'Nữ', '2000-03-09', 'An Giang', '202cb962ac59075b964b07152d234b70', 'O');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calamviec`
--

CREATE TABLE `calamviec` (
  `MACLV` varchar(15) NOT NULL,
  `THOIGIANBATDAU` datetime NOT NULL,
  `THOIGIANKETTHUC` datetime NOT NULL,
  `XACNHAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `calamviec`
--

INSERT INTO `calamviec` (`MACLV`, `THOIGIANBATDAU`, `THOIGIANKETTHUC`, `XACNHAN`) VALUES
('CS1', '2024-04-01 08:00:00', '2024-04-01 13:00:00', 1),
('CS2', '2024-04-02 08:00:00', '2024-04-02 13:00:00', 1),
('CS3', '2024-04-03 08:00:00', '2024-04-03 13:00:00', 1),
('CS4', '2024-04-04 08:00:00', '2024-04-04 13:00:00', 1),
('CS5', '2024-03-09 08:00:00', '2024-03-09 13:00:00', 1),
('CS6', '2024-04-06 08:00:00', '2024-04-06 13:00:00', 1),
('CS7', '2024-04-07 08:00:00', '2024-04-07 13:00:00', 0),
('CT2', '2024-04-02 13:00:00', '2024-04-02 18:00:00', 0),
('CT3', '2024-04-03 13:00:00', '2024-04-03 18:00:00', 0),
('CT4', '2024-04-04 13:00:00', '2024-04-04 18:00:00', 0),
('CT5', '2024-04-05 13:00:00', '2024-04-05 18:00:00', 0),
('CT6', '2024-04-06 13:00:00', '2024-04-06 18:00:00', 0),
('CT7', '2024-04-07 13:00:00', '2024-04-07 18:00:00', 0),
('test', '2024-03-08 01:50:00', '2024-03-08 02:50:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettoathuoc`
--

CREATE TABLE `chitiettoathuoc` (
  `MATOA` varchar(15) NOT NULL,
  `MATHUOC` varchar(15) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONVITINH` varchar(10) NOT NULL,
  `LIEUDUNG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MADICHVU` varchar(20) NOT NULL,
  `TENDICHVU` varchar(70) NOT NULL,
  `GIADV` varchar(20) NOT NULL,
  `MOTADV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MADICHVU`, `TENDICHVU`, `GIADV`, `MOTADV`) VALUES
('DV1', 'Cạo vôi răng mức 1', '300.000', 'Cạo vôi răng (hay lấy cao răng) là làm sạch các mảng bám. '),
('DV10', 'Cấy ghép Implant ( NEO ACTIVE ) ', '15.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV11', 'Cấy ghép Implant ( HIOSSEN MỸ ) ', '18.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV12', 'Cấy ghép Implant ( MISC1 ĐỨC ) ', '20.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV13', 'Cấy ghép Implant ( ZIACOM TBN ) ', '22.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV14', 'Niềng răng ( Mắc cài Kim Loại Chuẩn )', '18.000.000', 'Được áp dụng cho các trường hợp răng hô, thưa'),
('DV15', 'Niềng răng ( Mắc cài Sứ tự buộc )', '30.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV16', 'Niềng răng ( Niềng răng trong suốt EXPRESS PACKAGE )', '22.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV17', 'Niềng răng ( Niềng răng trong suốt LITE PACKAGE ) ', '42.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV18', 'Niềng răng ( Niềng răng trong suốt MODERATE PACKAGE )', '72.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV19', 'Niềng răng ( Niềng răng trong suốt COMPREHENSIVE ) ', '82.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV2', 'Cạo vôi răng mức 2 ( Nhiều vôi )', '400.000', 'Cạo vôi răng (hay lấy cao răng) là làm sạch các mảng bám. '),
('DV20', 'Niềng răng ( Hàm Trainer trẻ em )', '4.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV21', 'Niềng răng ( Face Mask )', '10.000.000', 'Đây là một trong những chuyên ngành nha khoa hiện đại, được áp dụng cho các trường hợp răng hô, thưa'),
('DV22', 'Tẩy trắng răng ', '1.200.000', 'là sử dụng đèn tẩy trắng công nghệ tiên tiến kết hợp với thuốc tẩy trắng Pola Office nhập khẩu từ Úc'),
('DV23', 'Nhổ răng khôn ( Răng khôn hàm trên (Tùy mức độ) ) ', '1.500.000', 'Nhổ răng khôn là một cuộc tiểu phẫu không cần dùng đến gây mê mà chỉ gây tê tại chỗ. Quý khách cần p'),
('DV24', 'Nhổ răng khôn ( Răng khôn hàm dưới (Tùy mức độ) )', '2.500.000', 'Nhổ răng khôn là một cuộc tiểu phẫu không cần dùng đến gây mê mà chỉ gây tê tại chỗ. Quý khách cần p'),
('DV25', 'Nhổ răng thường ( Nhổ răng sữa chích tê )', '50.000', 'Nhổ răng thường được áp dụng cho những trường hợp răng bị hỏng do sâu hoặc do chấn thương nặng khó c'),
('DV26', 'Nhổ răng thường ( Nhổ răng không đau )', '250.000', 'Nhổ răng thường được áp dụng cho những trường hợp răng bị hỏng do sâu hoặc do chấn thương nặng khó c'),
('DV27', 'Nội soi chữa tủy ( Chữa tuỷ không đau - nhanh lẹ bằng MTA-2023 )', '2.000.000', 'Cần biết rằng viêm tủy răng là một bệnh lý phổ biến, gây ra nhiều đau nhức khó chịu cho người bệnh. '),
('DV28', 'Nội soi chữa tủy ( Lấy tủy răng sữa )', '300.000', 'Cần biết rằng viêm tủy răng là một bệnh lý phổ biến, gây ra nhiều đau nhức khó chịu cho người bệnh. '),
('DV29', 'Nội soi chữa tủy ( Lấy tủy trâm tay )', '500.000', 'Cần biết rằng viêm tủy răng là một bệnh lý phổ biến, gây ra nhiều đau nhức khó chịu cho người bệnh. '),
('DV3', 'Cạo vôi răng mức 3 ( VIP Không Đau với Máy Rung Siêu Âm )', '500.000', 'Cạo vôi răng (hay lấy cao răng) là làm sạch các mảng bám. '),
('DV30', 'Nội soi chữa tủy ( Lấy tủy bằng máy )', '1.500.000', 'Cần biết rằng viêm tủy răng là một bệnh lý phổ biến, gây ra nhiều đau nhức khó chịu cho người bệnh. '),
('DV4', 'Trám răng Composite (Mỹ)', '400.000', 'Trám răng là một kỹ thuật nha khoa sử dụng vật liệu nhân tạo '),
('DV5', 'Trám răng ( Đính hạt kim cương )', '300.000', 'Trám răng là một kỹ thuật nha khoa sử dụng vật liệu nhân tạo '),
('DV6', 'Trám răng ( Đắp kẽ răng/ mặt răng/ thẩm mỹ )', '800.000', 'Trám răng là một kỹ thuật nha khoa sử dụng vật liệu nhân tạo '),
('DV7', 'Cấy ghép Implant ( IMPLANT OTEX )', '2.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV8', 'Cấy ghép Implant ( IMPLANT MEDITECH ) ', '8.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi '),
('DV9', 'Cấy ghép Implant ( IMPLANT KUWOTECH )', '13.000.000', 'Trồng răng Implant từ lâu đã là giải pháp phục hình răng mang lại hiệu quả ăn nhai tốt nhất cho mọi ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `MACLV` varchar(15) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`MACLV`, `EMAILNV`) VALUES
('CS1', 'duy@gmail.com'),
('CS2', 'hong@gmail.com'),
('CS3', 'duy@gmail.com'),
('CS4', 'hong@gmail.com'),
('CS5', 'hong@gmail.com'),
('CS6', 'quan@gmail.com'),
('test', 'hong@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
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
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`EMAILNV`, `MAQUYEN`, `SDTNV`, `HOTENNV`, `GIOITINHNV`, `NAMSINHNV`, `DIACHINV`, `PASSWORDNV`, `NGAYVAOLAMVIEC`, `CHUNGCHIHANHNGHE`, `BANGCAPCHUYENMON`, `COSODAOTAO`, `SONAMKINHNGHIEM`) VALUES
('admin@gmail.com', 1, '0913398756', 'Admin', 'Nữ', '2002-07-24', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2024-02-01', '', '', '', ''),
('duy@gmail.com', 2, '0917654312', 'Yến Duy', 'Nữ', '1988-01-01', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2024-03-04', 'Bác sĩ', 'Bác sĩ', 'Cần Thơ', '1'),
('hong@gmail.com', 2, '099877625', 'Mỹ Hồng', 'Nữ', '1990-01-20', 'Cần Thơ', '250cf8b51c773f3f8dc8b4be867a9a02', '2024-02-10', 'Bác sĩ nha khoa', 'Bác sĩ Răng Hàm Mặt', 'Đại học Y Dược Cần Thơ', '2'),
('quan@gmail.com', 2, '0348788321', 'Minh Quân Đáng Yêu ', 'Nam ', '2002-11-09', 'Cần Thơ', '202cb962ac59075b964b07152d234b70', '2024-03-02', 'Bác sĩ', 'Bác sĩ', 'Cần Thơ', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pdldv`
--

CREATE TABLE `pdldv` (
  `IDPHIEU` varchar(15) NOT NULL,
  `MADICHVU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pdldv`
--

INSERT INTO `pdldv` (`IDPHIEU`, `MADICHVU`) VALUES
('ID108932783', 'DV22'),
('ID1117166224', 'DV26'),
('ID1591855174', 'DV26'),
('ID163860087', 'DV22'),
('ID1828237799', 'DV24'),
('ID1909602080', 'DV1'),
('ID476789701', 'DV22'),
('ID559570164', 'DV25'),
('ID592208180', 'DV26'),
('ID85427424', 'DV1'),
('ID988421476', 'DV22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MAQUYEN` int(11) NOT NULL,
  `TENQUYEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MAQUYEN`, `TENQUYEN`) VALUES
(1, 'Admin'),
(2, 'Bác sĩ'),
(3, 'Bệnh nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudatlich`
--

CREATE TABLE `phieudatlich` (
  `IDPHIEU` varchar(15) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL,
  `EMAILBN` varchar(40) NOT NULL,
  `NGAYDAT` date NOT NULL,
  `GIODAT` time NOT NULL,
  `TRANGTHAIPDL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudatlich`
--

INSERT INTO `phieudatlich` (`IDPHIEU`, `EMAILNV`, `EMAILBN`, `NGAYDAT`, `GIODAT`, `TRANGTHAIPDL`) VALUES
('ID108932783', 'quan@gmail.com', 'admin@gmail.com', '2024-03-24', '11:29:00', 0),
('ID1591855174', 'duy@gmail.com', 'admin@gmail.com', '2024-03-15', '11:01:00', 0),
('ID163860087', 'hong@gmail.com', 'quanb2011987@student.ctu.edu.vn', '2024-03-12', '11:03:00', 0),
('ID1909602080', 'duy@gmail.com', 'hong@gmail.com', '2024-03-09', '10:40:00', 1),
('ID476789701', 'hong@gmail.com', 'kimhong@gmail.com', '2024-03-28', '09:00:00', 1),
('ID559570164', 'duy@gmail.com', 'huynham2015@gmail.com', '2024-03-13', '11:16:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukhambenh`
--

CREATE TABLE `phieukhambenh` (
  `STT_PHIEUKHAM` varchar(10) NOT NULL,
  `EMAILBN` varchar(40) NOT NULL,
  `EMAILNV` varchar(40) NOT NULL,
  `NGAYKHAM` date NOT NULL,
  `GIOKHAM` time NOT NULL,
  `MOTA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukhambenh`
--

INSERT INTO `phieukhambenh` (`STT_PHIEUKHAM`, `EMAILBN`, `EMAILNV`, `NGAYKHAM`, `GIOKHAM`, `MOTA`) VALUES
('STT2134598', 'huynham2015@gmail.com', 'hong@gmail.com', '2024-03-13', '11:09:00', ''),
('STT5955735', 'admin@gmail.com', 'duy@gmail.com', '2024-03-22', '09:30:00', 'Bệnh nhân bị đau răng nhiều');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthu`
--

CREATE TABLE `phieuthu` (
  `MAPT` varchar(15) NOT NULL,
  `STT_PHIEUKHAM` int(11) NOT NULL,
  `NGAYLAPPT` datetime NOT NULL,
  `TONGGIA` varchar(20) NOT NULL,
  `LYDO` varchar(200) NOT NULL,
  `TRANGTHAI` int(5) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pkbdv`
--

CREATE TABLE `pkbdv` (
  `STT_PHIEUKHAM` varchar(10) NOT NULL,
  `MADICHVU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pkbdv`
--

INSERT INTO `pkbdv` (`STT_PHIEUKHAM`, `MADICHVU`) VALUES
('STT2134598', 'DV23'),
('STT5955735', 'DV25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pkbxn`
--

CREATE TABLE `pkbxn` (
  `STT_PHIEUKHAM` varchar(10) NOT NULL,
  `MALOAIXN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'c', 'c', '2024-03-08 09:02:00', '2024-03-08 09:02:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `MATHUOC` varchar(15) NOT NULL,
  `TENTHUOC` varchar(60) NOT NULL,
  `LOAITHUOC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
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
('KV3', 'Diclofenac', 'Kháng viêm ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toa_thuoc`
--

CREATE TABLE `toa_thuoc` (
  `MATOA` varchar(15) NOT NULL,
  `STT_PHIEUKHAM` int(11) NOT NULL,
  `TENBENH` varchar(50) NOT NULL,
  `PHUONGPHAPTRI` varchar(50) NOT NULL,
  `NGAYTAIKHAM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xetnghiem`
--

CREATE TABLE `xetnghiem` (
  `MALOAIXN` varchar(15) NOT NULL,
  `TENLOAIXN` varchar(50) NOT NULL,
  `GIAXN` varchar(25) NOT NULL,
  `MOTAXN` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`EMAILBN`),
  ADD KEY `BN_PQ_FK` (`MAQUYEN`);

--
-- Chỉ mục cho bảng `calamviec`
--
ALTER TABLE `calamviec`
  ADD PRIMARY KEY (`MACLV`);

--
-- Chỉ mục cho bảng `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD PRIMARY KEY (`MATOA`,`MATHUOC`),
  ADD KEY `TCTTT_FK` (`MATOA`),
  ADD KEY `CTTTT_FK` (`MATHUOC`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MADICHVU`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`MACLV`,`EMAILNV`),
  ADD KEY `LLVCLV_FK` (`MACLV`),
  ADD KEY `NV_LLV_FK` (`EMAILNV`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`EMAILNV`),
  ADD KEY `NVPQ_FK` (`MAQUYEN`);

--
-- Chỉ mục cho bảng `pdldv`
--
ALTER TABLE `pdldv`
  ADD PRIMARY KEY (`IDPHIEU`,`MADICHVU`),
  ADD KEY `PDLDV_FK` (`IDPHIEU`),
  ADD KEY `PDLDV2_FK` (`MADICHVU`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Chỉ mục cho bảng `phieudatlich`
--
ALTER TABLE `phieudatlich`
  ADD PRIMARY KEY (`IDPHIEU`),
  ADD KEY `BNPDL_FK` (`EMAILBN`),
  ADD KEY `NV_PDV_FK` (`EMAILNV`);

--
-- Chỉ mục cho bảng `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD PRIMARY KEY (`STT_PHIEUKHAM`),
  ADD KEY `BNPKB_FK` (`EMAILBN`),
  ADD KEY `NV_PKB_FK` (`EMAILNV`);

--
-- Chỉ mục cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD PRIMARY KEY (`MAPT`),
  ADD KEY `PKBPT_FK` (`STT_PHIEUKHAM`);

--
-- Chỉ mục cho bảng `pkbdv`
--
ALTER TABLE `pkbdv`
  ADD PRIMARY KEY (`STT_PHIEUKHAM`,`MADICHVU`),
  ADD KEY `PKBDV_FK` (`STT_PHIEUKHAM`),
  ADD KEY `PKBDV2_FK` (`MADICHVU`);

--
-- Chỉ mục cho bảng `pkbxn`
--
ALTER TABLE `pkbxn`
  ADD PRIMARY KEY (`STT_PHIEUKHAM`,`MALOAIXN`),
  ADD KEY `PKBXN_FK` (`STT_PHIEUKHAM`),
  ADD KEY `PKBXN2_FK` (`MALOAIXN`);

--
-- Chỉ mục cho bảng `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`MATHUOC`);

--
-- Chỉ mục cho bảng `toa_thuoc`
--
ALTER TABLE `toa_thuoc`
  ADD PRIMARY KEY (`MATOA`),
  ADD KEY `PKBTT_FK` (`STT_PHIEUKHAM`);

--
-- Chỉ mục cho bảng `xetnghiem`
--
ALTER TABLE `xetnghiem`
  ADD PRIMARY KEY (`MALOAIXN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `FK_BENHNHAN_BN_PQ_PHANQUYE` FOREIGN KEY (`MAQUYEN`) REFERENCES `phanquyen` (`MAQUYEN`);

--
-- Các ràng buộc cho bảng `chitiettoathuoc`
--
ALTER TABLE `chitiettoathuoc`
  ADD CONSTRAINT `FK_CHITIETT_CTTTT_THUOC` FOREIGN KEY (`MATHUOC`) REFERENCES `thuoc` (`MATHUOC`),
  ADD CONSTRAINT `FK_CHITIETT_TTCTTT_TOA_THUO` FOREIGN KEY (`MATOA`) REFERENCES `toa_thuoc` (`MATOA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
