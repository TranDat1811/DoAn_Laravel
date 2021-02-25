-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 06:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusc_chi_tiet_don_hang`
--

CREATE TABLE `cusc_chi_tiet_don_hang` (
  `dh_ma` bigint(20) NOT NULL COMMENT 'Đơn hàng # dh_ma # dh_ma # Mã đơn hàng',
  `sp_ma` bigint(20) NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `ctdh_soLuong` int(11) NOT NULL DEFAULT 1 COMMENT 'Số lượng # Số lượng sản phẩm đặt mua',
  `ctdh_donGia` decimal(19,4) NOT NULL COMMENT 'Đơn giá # Giá bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_chi_tiet_don_hang`
--

INSERT INTO `cusc_chi_tiet_don_hang` (`dh_ma`, `sp_ma`, `ctdh_soLuong`, `ctdh_donGia`) VALUES
(8, 5, 9, '838514.9842'),
(9, 29, 3, '1246602.2724'),
(3, 1, 1, '1069116.2360'),
(9, 28, 4, '1641792.4159'),
(9, 21, 8, '778421.6994'),
(10, 15, 9, '1207983.0458'),
(9, 7, 4, '1492227.9546'),
(9, 5, 7, '1053625.9081'),
(8, 30, 1, '1920590.0847'),
(3, 10, 3, '201305.2276');

-- --------------------------------------------------------

--
-- Table structure for table `cusc_don_hang`
--

CREATE TABLE `cusc_don_hang` (
  `dh_ma` bigint(20) NOT NULL COMMENT 'Mã đơn hàng',
  `kh_ma` bigint(20) NOT NULL COMMENT 'Mã khách hàng #Mã khách hàng',
  `dh_thoiGianDatHang` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian đặt hàng #Thời gian đặt hàng',
  `dh_thoiGianNhanHang` datetime NOT NULL COMMENT 'Thời gian nhận hàng #Thời gian nhận hàng',
  `dh_nguoiNhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người nhận #Họ tên người nhận',
  `dh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận #Địa chỉ người nhận',
  `dh_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại người nhận #Điện thoại người nhận',
  `dh_nguoiGui` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người gửi #Họ tên người gửi',
  `dh_loiChuc` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Lời chúc #Lời chúc ghi trên thiệp',
  `dh_daThanhToan` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Đã thanh toán #Đã thanh toán tiền #0: chưa, #1: đã thanh toán',
  `nv_xuLy` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Mã nhân viên xử lý #Xử lý đơn hàng, #0 : chưa phân công',
  `dh_ngayXuLy` datetime DEFAULT NULL COMMENT 'Thời điểm xử lý #Thời điểm xử lý đơn hàng',
  `nv_giaoHang` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 0-chưa phân công',
  `dh_ngayLapPhieuGiao` datetime DEFAULT NULL COMMENT 'Thời điểm lập phiếu giao # Thời điểm lập phiếu giao',
  `dh_ngayGiaoHang` datetime DEFAULT NULL COMMENT 'Thời điểm khách nhận được hàng # Thời điểm khách nhận được hàng',
  `dh_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng',
  `dh_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất',
  `dh_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái đơn hàng: 1-khóa, 2-khả dụng',
  `vc_ma` bigint(20) NOT NULL COMMENT 'Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng',
  `tt_ma` bigint(20) NOT NULL COMMENT 'Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_don_hang`
--

INSERT INTO `cusc_don_hang` (`dh_ma`, `kh_ma`, `dh_thoiGianDatHang`, `dh_thoiGianNhanHang`, `dh_nguoiNhan`, `dh_diaChi`, `dh_dienThoai`, `dh_nguoiGui`, `dh_loiChuc`, `dh_daThanhToan`, `nv_xuLy`, `dh_ngayXuLy`, `nv_giaoHang`, `dh_ngayLapPhieuGiao`, `dh_ngayGiaoHang`, `dh_taoMoi`, `dh_capNhat`, `dh_trangThai`, `vc_ma`, `tt_ma`) VALUES
(1, 22, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 1', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 2, '2021-01-23 04:14:32', 5, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(2, 7, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 2', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 4, '2021-01-23 04:14:32', 1, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(3, 30, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 3', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 5, '2021-01-23 04:14:32', 3, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(4, 29, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 4', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 2, '2021-01-23 04:14:32', 2, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(5, 17, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 5', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 3, '2021-01-23 04:14:32', 1, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(6, 21, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 6', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 1, '2021-01-23 04:14:32', 5, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(7, 27, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 7', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 5, '2021-01-23 04:14:32', 1, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(8, 7, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 8', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 1, '2021-01-23 04:14:32', 1, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(9, 14, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 9', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 4, '2021-01-23 04:14:32', 1, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1),
(10, 14, '2021-01-23 04:14:32', '2021-01-23 04:14:32', 'Người nhận 10', 'CẦN THƠ', '0123214214', 'HIHI SHOP', 'Chúc mừng !!!', 0, 3, '2021-01-23 04:14:32', 3, '2021-01-23 04:14:32', '2021-01-23 04:14:32', '2021-01-22 21:14:32', '2021-01-22 21:14:32', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_giam_gia_san_pham`
--

CREATE TABLE `cusc_giam_gia_san_pham` (
  `gg_ma` bigint(20) NOT NULL COMMENT 'Stt giảm giá',
  `sp_ma` bigint(20) NOT NULL COMMENT 'Mã sản phẩm',
  `gg_ten` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chương trình giảm giá',
  `gg_soTien` double NOT NULL COMMENT 'Số tiền giảm giá',
  `gg_macDinh` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Có giảm giá hay không #0 : không giảm giá, 1: giảm giá',
  `gg_batDau` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo giảm giá',
  `gg_ketThuc` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật giảm giá gần nhất'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cusc_hinh_anh_san_pham`
--

CREATE TABLE `cusc_hinh_anh_san_pham` (
  `ha_ma` bigint(20) NOT NULL COMMENT 'STT',
  `sp_ma` bigint(20) NOT NULL COMMENT 'Sản phẩm mã',
  `ha_ten` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình ảnh liên quan sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cusc_khach_hang`
--

CREATE TABLE `cusc_khach_hang` (
  `kh_ma` bigint(20) NOT NULL COMMENT 'Mã khách hàng',
  `kh_taiKhoan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tài khoản đăng nhập của khách hàng',
  `kh_matKhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập của khách hàng',
  `kh_hoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên của khách hàng',
  `kh_gioiTinh` tinyint(4) NOT NULL COMMENT 'Giới tính của khách hàng',
  `kh_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email của khách hàng',
  `kh_ngaySinh` datetime NOT NULL COMMENT 'Ngày sinh của khách hàng',
  `kh_hinhDaiDien` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình đại diện của khách hàng',
  `kh_dienThoai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại của khách hàng',
  `kh_diaChi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ của khách hàng',
  `kh_ghiNhoDangNhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ghi nhớ đăng nhập của khách hàng',
  `kh_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng',
  `kh_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất',
  `kh_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái khách hàng: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_khach_hang`
--

INSERT INTO `cusc_khach_hang` (`kh_ma`, `kh_taiKhoan`, `kh_matKhau`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_ngaySinh`, `kh_hinhDaiDien`, `kh_dienThoai`, `kh_diaChi`, `kh_ghiNhoDangNhap`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES
(1, 'binh85', '$2y$10$pyCaRF.Go4tWxCv7YL0Sru/9AyW70XrSYkBgLLIObjxNsG1LEALRS', 'Nguyễn Phan Hướng Bình\n', 1, 'binh-nguyenphan_huong.1985_12_06@yahoo.com.vn', '1985-12-06 00:00:00', 'khachhang-1.jpg', '01258391371', '32 Mậu Thân, P. An Hòa, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-01-22 21:13:15', '2021-01-22 21:13:15', 2),
(2, 'chi-kimthipham_nguyen-94_02_05', '$2y$10$SHsW/Do5uGcp6Cu55DirPOuRsoRGrQfFOFG1AtNYTDqlrn0SwCNqu', 'Nguyễn Phạm Thị Kim Chi\n', 0, 'N.PT.KChi.1994@hotmail.com', '1994-02-05 00:00:00', 'khachhang-2.jpg', '01693031197', '35 Xô Viết Nghệ Tĩnh, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-01-23 00:06:42', '2021-01-23 00:06:42', 2),
(3, 'n_b_thu_23.01', '$2y$10$9QyE5qqkjioZ7BiI9ZMz2.H1Y/in7Cj0E6o2/GyIsv1avo90l9Hau', 'Nguyễn Bích Thu\n', 0, 'thu-23-01-02@yahoo.com', '2002-01-23 00:00:00', 'khachhang-3.jpg', '01651873494', '245 Ngô Quyền, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-02-14 00:06:42', '2021-02-14 00:06:42', 2),
(4, 'NGUYENTRUC.1301', '$2y$10$nCdEIMgyBJi1.0hHsFbb3eb1zM46MxNMNDEPcekjfFgJuyhfQoYEa', 'Nguyễn Trúc', 1, 'Truc_13.01.67@yahoo.com', '1967-01-13 00:00:00', 'khachhang-4.jpg', '01634170168', '45 Bùi Hữu Nghĩa, P. Long Tuyền, Q. Bình Thủy, TP. Cần Thơ', '1', '2021-02-14 00:06:42', '2021-02-14 00:06:42', 2),
(5, 'VTSuong2606', '$2y$10$hUxLSS78/9rfPstciUSd6uDxiAXeAVqUNpc3NHu88qlVTN7aCARN2', 'Võ Tú Sương\n', 0, 'SUONGVOTU26061988@gmail.com', '1988-06-26 00:00:00', 'khachhang-5.jpg', '01245461688', '89/377 Bùi Hữu Nghĩa, P. Bình Thủy, Q. Bình Thủy, TP. Cần Thơ', '1', '2021-02-16 00:06:42', '2021-02-16 00:06:42', 2),
(6, 'ManTranDang.Minh25.11.1998', '$2y$10$n8grFCv8KykNx.DLE1zZw.//joaKLBUIlGocRedmGxJtu.qC4oXkS', 'Trần Đặng Minh Mẫn\n', 1, 'minhman2511@gmail.com.vn', '1998-11-25 00:00:00', 'khachhang-6.jpg', '0894999419', '256 Nguyễn Văn Linh, P. Long Tuyền , Q. Bình Thủy, TP. Cần Thơ', '1', '2021-03-10 00:06:42', '2021-03-10 00:06:42', 2),
(7, 'DoMinh_Ngoc_1956_12_07', '$2y$10$jbzqaJOqX6Grvr7Gc5e0cejuBcX6RBEL2U2IE0MaJqUgyahhPCbkS', 'Đỗ Minh Ngọc\n', 0, 'Do-Minh_Ngoc_07-12-56@yahoo.com', '1956-12-07 00:00:00', 'khachhang-7.jpg', '0978726066', '103 Ngô Quyền, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-03-10 00:06:42', '2021-03-10 00:06:42', 2),
(8, 'vansinh85', '$2y$10$Z1Ju4IzflteoAn3gnRAmgOzYiUnfc1u5WtiTwYrgOG8nrsiUfXeOu', 'Trần Văn Sinh\n', 1, 'vansinh85@gmail.com', '1985-08-01 00:00:00', 'khachhang-8.jpg', '01650662198', '143B/117 Mậu Thân, P. An Nghiệp, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-03-14 00:06:42', '2021-03-14 00:06:42', 2),
(9, 'PHONG_2510', '$2y$10$L3YNWFaziSneNTOTrYDdZelxrw6aMAQK2ewy10qCvjWCr2CSe4dcy', 'Phạm Thuận Phong\n', 1, 'ptphong25101984@outlook.com', '1984-10-25 00:00:00', 'khachhang-9.jpg', '01682412443', '388 Nguyễn Văn Linh, P. Long Hòa, Q. Bình Thủy, TP. Cần Thơ', '1', '2021-03-23 00:06:42', '2021-03-23 00:06:42', 2),
(10, 'phuocdiemthinguyen20030406', '$2y$10$mPTZb6dM7TXTd0xsBpn7wujYD.8ujZx9oqiWd9l1qzCn7ymIZ2KHC', 'Nguyễn Thị Diễm Phước\n', 0, 'PHUOCDIEMTHINGUYEN03@outlook.com', '2003-04-06 00:00:00', 'khachhang-10.jpg', '01887278811', '90/201 3/2, P. An Bình, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-03-23 05:03:38', '2021-03-23 05:03:38', 2),
(11, 'hoankhanhdang1111', '$2y$10$e0caU5DoALBbOFfLmQZ5EOHHjVuMYMdEcGmE69o0vH68kG3hVNz72', 'Đặng Khánh Hoàn\n', 1, 'D_KHoan.1984@hotmail.com', '1984-11-11 00:00:00', 'khachhang-11.jpg', '01291546563', '358 Thái Thị Hạnh, P. Long Hưng, Q. Ô Môn, TP. Cần Thơ', '1', '2021-03-29 05:03:38', '2021-03-29 05:03:38', 2),
(12, 'nhavan.banh.le11.08', '$2y$10$xg4YNeXfs5LrvckrVLa7QeDk6d5.O75nv57JYAY/WDpQ1O6kraLGK', 'Lê Bành Văn Nhã\n', 1, 'NHA89@gmail.com.vn', '1989-08-11 00:00:00', 'khachhang-12.jpg', '0926491553', '83/64 Trần Hưng Đạo, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-03-29 06:57:30', '2021-03-29 06:57:30', 2),
(13, 'tien.huong.tran.140282', '$2y$10$yk0RP9ZvAzcXJT0O8r61HeKuoedFhLeJl8XO1gYARHBH9Ikp/T78q', 'Trần Hướng Tiền\n', 1, 'tien-huong_tran-82@ymail.com', '1982-02-14 00:00:00', 'khachhang-13.jpg', '0975762335', '310 Đinh Công Chánh, P. Long Hòa, Q. Bình Thủy, TP. Cần Thơ', '1', '2021-04-19 06:57:30', '2021-04-19 06:57:30', 2),
(14, 'tranvietcuong18', '$2y$10$LS.Gng5IUkPU6xsOY1lV8Oywz1VbDxWnsDxJYQ/lUvkNOVdJztG7C', 'Trần Việt Cường\n', 1, 'Vietcuong190718@yahoo.com', '1918-07-19 00:00:00', 'khachhang-14.jpg', '0980639479', '153/23 Thái Thị Hạnh, P. Long Hưng, Q. Ô Môn, TP. Cần Thơ', '1', '2021-04-19 06:57:30', '2021-04-19 06:57:30', 2),
(15, 'nuong-my_thi-trinh_1995-12-10', '$2y$10$DCnH1onkTre3BE0gs2Y.geSkcxTH7OyqBPyIMgpvSqbOQIVG9qsFG', 'Trịnh Thị Mỹ Nương\n', 0, 'NUONG19951210@outlook.com', '1995-12-10 00:00:00', 'khachhang-15.jpg', '01997216883', '189 Nguyễn Thị Minh Khai, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-04-24 06:57:30', '2021-04-24 06:57:30', 2),
(16, 'NhuongDuyNguyenTran20080103', '$2y$10$YcDvlgrlKkBZeJMHxKD7Ye98R82GjSXuMuXGbiNqr/oUTIpFzNVZC', 'Trần Nguyễn Duy Nhượng\n', 1, 'nhuong03_01_2008@gmail.com', '2008-01-03 00:00:00', 'khachhang-16.jpg', '01658452069', '9 Hòa Bình, P. An Hội, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-05-12 06:57:30', '2021-05-12 06:57:30', 2),
(17, 'Huynh04', '$2y$10$ROz5.1s5PxfcQPPOmtRU1eVrtxh44gk6vph2jSN4RH/VQej7Hdomm', 'Nguyễn Văn Huynh\n', 1, 'nvhuynh270904@ymail.com', '2004-09-27 00:00:00', 'khachhang-17.jpg', '01672933958', '114 Hai Bà Trưng, P. Tân An, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-05-12 07:31:43', '2021-05-12 07:31:43', 2),
(18, 'TUYET-XUAN\n_890121', '$2y$10$rcqh1HC0tp7NI/.g75Sg8.MGRguwz.3j0TDvQiAG/6p7q.hO9pPii', 'Ngô Thị Tuyết Xuân\n', 0, 'Tuyetxuan890121@ymail.com', '1989-01-21 00:00:00', 'khachhang-18.jpg', '0941722962', '40 Nguyễn Văn Linh, P. An Khánh, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-05-28 07:31:43', '2021-05-28 07:31:43', 2),
(19, 'huynhcong_hai970114', '$2y$10$rHxWkwqMT56ra3iE10btROgJtDF2HGucMGgl5jEyQi0Ky9j8i4KMe', 'Huỳnh Công Hải\n', 1, 'haiconghuynh-14_01_1997@yahoo.com', '1997-01-14 00:00:00', 'khachhang-19.jpg', '0894377597', '161/145 Võ Văn Kiệt, P. Bình Thủy , Q. Bình Thủy, TP. Cần Thơ', '1', '2021-05-28 07:31:43', '2021-05-28 07:31:43', 2),
(20, 'NghiaVanLe820816', '$2y$10$G3kWKAkQAEvekA8Mu6IE/eTfdDmAp8bFsDdUqdJrgHWgfLrJRbItG', 'Lê Văn Nghĩa\n', 1, 'NGHIA820816@yahoo.com.vn', '1982-08-16 00:00:00', 'khachhang-20.jpg', '01287854688', '17 CMT8, P. Cái Khế, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-05-28 09:05:30', '2021-05-28 09:05:30', 2),
(21, 'thonglehieu-82', '$2y$10$sc3TSLoMjnCHiA6.B9RJzOHG7eHd3T/Q5qEjaxQ76m5amghYmksyq', 'Lê Hiếu Thông\n', 1, 'THONG.18121982@ymail.com', '1982-12-18 00:00:00', 'khachhang-21.jpg', '0972625184', '74/136 Thái Thị Hạnh, P. Thới Long, Q. Ô Môn, TP. Cần Thơ', '1', '2021-05-28 09:05:30', '2021-05-28 09:05:30', 2),
(22, 'THuy29121999', '$2y$10$T53a1huIhlylIdeJUQhk6uV6NiEYO.r1Hyi5sYqPNeX5WZWs0vdfC', 'Trần Huy', 1, 'tranhuy1999@outlook.com', '1999-12-29 00:00:00', 'khachhang-22.jpg', '01666306795', '298 30/4, P. An Lạc, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-05-29 09:05:30', '2021-05-29 09:05:30', 2),
(23, 'NU.THITANG.2006', '$2y$10$PIwcYgtUbPpzMLc1/2s39uuhdi5ISANUvqducM6MV7pgI7eXp27Wi', 'Tăng Thị Nữ\n', 0, 'NU14.01@ymail.com', '2006-01-14 00:00:00', 'khachhang-23.jpg', '01867473310', '270 Trần Hưng Đạo, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-06-11 09:05:30', '2021-06-11 09:05:30', 2),
(24, 'NGUYENTHAICHI300989', '$2y$10$AkEC4i1SYvpV3K88JL8jKuP6wPCxWWBrGPbO4y9exV6L/wtubIpeq', 'Nguyễn Thái Chi\n', 0, 'CHI1989@outlook.com', '1989-09-30 00:00:00', 'khachhang-24.jpg', '01669552420', '123 Ngô Quyền, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-06-14 09:05:30', '2021-06-14 09:05:30', 2),
(25, 'n_pt_tdung_0704', '$2y$10$MOzAxfnsMBQDtZMG3kLoTOMzwEM4Vc8YQCSKOZ9bhnzTUraRJL0Km', 'Nguyễn Phan Thị Từ Dung\n', 0, 'N.PT.T.DUNG_07.04.2005@gmail.com.vn', '2005-04-07 00:00:00', 'khachhang-25.jpg', '09973333546', '138 Nguyễn Văn Cừ, P. Cái Khế, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-06-14 09:05:30', '2021-06-14 09:05:30', 2),
(26, 'Ha_Do_Van290441', '$2y$10$FPKv3oP38hrUddjz2W.iSOR.JXcRsKWU0josLwL0CIP2KI61Hrr9m', 'Đỗ Vân Hà\n', 0, 'HADOVAN1941@yahoo.com', '1941-04-29 00:00:00', 'khachhang-26.jpg', '01636040198', '135 Mậu Thân, P. An Hòa, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-07-05 09:05:30', '2021-07-05 09:05:30', 2),
(27, 'diem12021989', '$2y$10$TuYpVIjZ/Ah0GE.alWkaGeQpg/keoOenbdl6.yL4v5kR1bDtF39TS', 'Nguyễn Hồng Diễm\n', 0, 'Diem890212@hotmail.com', '1989-02-12 00:00:00', 'khachhang-27.jpg', '01690539815', '350 Bùi Hữu Nghĩa, P. Long Hòa , Q. Bình Thủy, TP. Cần Thơ', '1', '2021-07-10 09:05:30', '2021-07-10 09:05:30', 2),
(28, 'NTNGUYET1985', '$2y$10$.UA5q0L3VtohjewoKVdZIe8zZ1BfexbRG8n3gR3CnyXBJZ6wor2U6', 'Nguyễn Thu Nguyệt\n', 0, 'NTNguyet850811@yahoo.com.vn', '1985-08-11 00:00:00', 'khachhang-28.jpg', '01692558777', '63/371 Phan Đình Phùng, P. An Lạc, Q. Ninh Kiều, TP. Cần Thơ', '1', '2021-07-10 13:08:27', '2021-07-10 13:08:27', 3),
(29, 'DP-TNhu-1990', '$2y$10$tWuDcebza1jop7mgenibHeF4wu0DyxcmSNpPY.cQdHiDgFm/Bp4Du', 'Đặng Phạm Tâm Như\n', 0, 'tamnhu\n-90-10-08@hotmail.com', '1990-10-08 00:00:00', 'khachhang-29.jpg', '01881050205', '198/253 Huỳnh Phan Hộ, P. Bình Thủy , Q. Bình Thủy, TP. Cần Thơ', '1', '2021-07-13 13:08:27', '2021-07-13 13:08:27', 3),
(30, 'Bui.ThiPhuongChau.20010120', '$2y$10$iE4FT0AdgXfhctPfVCV4g.PxHbX2QMr2q7Qsf1VZC53KEbFp/e8Fq', 'Bùi Thị Phương Châu\n', 0, 'BUITHI.PHUONG-CHAU.010120@ymail.com', '2001-01-20 00:00:00', 'khachhang-30.jpg', '0939965449', '165D/196 QL1, P. Ba Láng, Q. Cái Răng, TP. Cần Thơ', '1', '2021-07-16 13:08:27', '2021-07-16 13:08:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_loai`
--

CREATE TABLE `cusc_loai` (
  `l_ma` bigint(20) NOT NULL COMMENT 'Mã loại sản phẩm',
  `l_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên loại #Tên loại sản phẩm',
  `l_moTa` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả về nhà loại sản phẩm #Mô tả về loại sản phẩm ',
  `l_hinhAnh` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh về loại sản phẩm #Hình ảnh về loại sản phẩm',
  `l_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm',
  `l_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất',
  `l_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_loai`
--

INSERT INTO `cusc_loai` (`l_ma`, `l_ten`, `l_moTa`, `l_hinhAnh`, `l_taoMoi`, `l_capNhat`, `l_trangThai`) VALUES
(1, 'HUAWEI', 'Mô tả 1', 'loai-1.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(2, 'IPHONE', 'Mô tả 2', 'loai-2.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(3, 'NOKIA', 'Mô tả 3', 'loai-3.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(4, 'OPPO', 'Mô tả 4', 'loai-4.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(5, 'REALME', 'Mô tả 5', 'loai-5.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(6, 'SAMSUNG', 'Mô tả 6', 'loai-6.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(7, 'VIVO', 'Mô tả 7', 'loai-7.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(8, 'VSMART', 'Mô tả 8', 'loai-8.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2),
(9, 'XIAOMI', 'Mô tả 9', 'loai-9.jpg', '2021-01-22 21:12:46', '2021-01-22 21:12:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_nhan_vien`
--

CREATE TABLE `cusc_nhan_vien` (
  `nv_ma` bigint(20) NOT NULL COMMENT 'Mã nhân viên',
  `nv_taiKhoan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tài khoản đăng nhập của nhân viên',
  `nv_matKhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập của nhân viên',
  `nv_hoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên của nhân viên',
  `nv_gioiTinh` tinyint(4) NOT NULL COMMENT 'Giới tính của nhân viên',
  `nv_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email của nhân viên',
  `nv_ngaySinh` datetime NOT NULL COMMENT 'Ngày sinh của nhân viên',
  `nv_hinhDaiDien` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình đại diện của nhân viên',
  `q_ma` bigint(20) NOT NULL COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `nv_dienThoai` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại của nhân viên',
  `nv_diaChi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ 1 của nhân viên',
  `nv_ghiNhoDangNhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ghi nhớ đăng nhập của nhân viên',
  `nv_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên',
  `nv_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất',
  `nv_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_nhan_vien`
--

INSERT INTO `cusc_nhan_vien` (`nv_ma`, `nv_taiKhoan`, `nv_matKhau`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_ngaySinh`, `nv_hinhDaiDien`, `q_ma`, `nv_dienThoai`, `nv_diaChi`, `nv_ghiNhoDangNhap`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`) VALUES
(1, 'nthong', '$2y$10$UP.8qXQNwSMQtdesNCvB6OYwcyI0sit4sY1//nKnZaSoJKgBJeQmi', 'Nguyễn Thủy Hồng\n', 0, 'nthong@hihi.com', '1987-10-17 00:00:00', 'nhanvien-0.jpg', 1, '01202562768', '154 30/4, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(2, 'nhnam', '$2y$10$CkGFuwjYdWic8JB6idXHCOq7FJxjfEAp5PH5CRHfB63KaBHBu13Ai', 'Nguyễn Hữu Nam\n', 1, 'nhnam@hihi.com', '1988-04-13 00:00:00', 'nhanvien-1.jpg', 2, '01264286168', '63C/339 QL1, P. Ba Láng, Q. Cái Răng, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(3, 'pktrong', '$2y$10$2BVrnxh8l4ExIHNtQcmxteT3bE343IAh7EVjtWpL0GmZXifIxEmzu', 'Phạm Khắc Trọng\n', 1, 'pktrong@hihi.com', '1990-09-28 00:00:00', 'nhanvien-2.jpg', 3, '0940853730', '46 Huỳnh Phan Hộ, P. Trà An, Q. Bình Thủy, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(4, 'ptmchau', '$2y$10$XflNlsmETwxY4CGKbgB/7Odq2kWnkTrhXSj7eAGzuWF1bT/Xcm5ne', 'Phan Thị Mai Châu\n', 0, 'ptmchau@hihi.com', '1985-09-21 00:00:00', 'nhanvien-3.jpg', 4, '01886763477', '49/263 QL91, P. Châu Văn Liêm, Q. Ô Môn, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(5, 'pntpngoc', '$2y$10$L8VrPMUTzsm2p0abkW8yVe7Dw9h7yHKwOxQJU.QhbBF3FLwDmZnGW', 'Phạm Nguyễn Thị Phương Ngọc\n', 0, 'pntpngoc@hihi.com', '1999-09-01 00:00:00', 'nhanvien-4.jpg', 5, '0910602907', '98 Châu Văn Liêm, P. An Lạc, Q. Ninh Kiều, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(6, 'nbtien', '$2y$10$d/j7oxpjAGEOcKxEtAizPuDfY8DYX2jqTDPM.r8p2Or/YxVCH/cA6', 'Nguyễn Bảo Tiên\n', 0, 'nbtien@hihi.com', '2002-10-18 00:00:00', 'nhanvien-4.jpg', 5, '01869798441', '80/395 Lê Hồng Phong, P. Bình Thủy, Q. Bình Thủy, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(7, 'ttdquynh', '$2y$10$kkyD38jBWSGmt5Dojjm/BuCsn3H.CjaWzf3GJNujlxMqyG3v.U2mi', 'Trần Thị Diễm Quỳnh\n', 0, 'ttdquynh@hihi.com', '1985-04-11 00:00:00', 'nhanvien-5.jpg', 6, '01623767875', '83 Võ Văn Kiệt, P. An Hòa, Q. Ninh Kiều, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2),
(8, 'ptvngoc', '$2y$10$tHQQC5mxgpzf7gFUIdLGceJcndqctCRn0j4JJItGj1gu98mvjxoRe', 'Phan Trần Vân Ngọc\n', 0, 'ptvngoc@hihi.com', '1986-08-16 00:00:00', 'nhanvien-5.jpg', 6, '01679160404', '192/135 Nguyễn Chí Thanh, P. Thới An Đông, Q. Bình Thủy, TP. Cần Thơ', '0', '2021-01-22 21:13:39', '2021-01-22 21:13:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_nhan_xet_san_pham`
--

CREATE TABLE `cusc_nhan_xet_san_pham` (
  `nx_ma` bigint(20) NOT NULL COMMENT 'STT Nhận xét',
  `sp_ma` bigint(20) NOT NULL COMMENT 'Mã sản phẩm',
  `kh_ma` bigint(20) NOT NULL COMMENT 'Mã khách hàng',
  `nx_danhGia` double(8,2) NOT NULL COMMENT 'Xếp hạnh đánh giá sản phẩm',
  `nx_binhLuan` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Bình luận về sản phẩm',
  `nx_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhận xét',
  `nx_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhận xét gần nhất'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cusc_nha_cung_cap`
--

CREATE TABLE `cusc_nha_cung_cap` (
  `ncc_ma` bigint(20) NOT NULL COMMENT 'Mã nhà cung cấp',
  `ncc_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhà cung cấp #Tên nhà cung cấp',
  `ncc_moTa` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả về nhà cung cấp #Mô tả về nhà cung cấp',
  `ncc_hinhAnh` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình ảnh về nhà cung cấp #Hình ảnh về nhà cung cấp',
  `ncc_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhà cung cấp',
  `ncc_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhà cung cấp gần nhất',
  `ncc_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái nhà cung cấp: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_nha_cung_cap`
--

INSERT INTO `cusc_nha_cung_cap` (`ncc_ma`, `ncc_ten`, `ncc_moTa`, `ncc_hinhAnh`, `ncc_taoMoi`, `ncc_capNhat`, `ncc_trangThai`) VALUES
(1, 'APPLE', 'Mô tả 1', 'ncc-1.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(2, 'HUAWEI VN', 'Mô tả 2', 'ncc-2.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(3, 'NOKIA VN', 'Mô tả 3', 'ncc-3.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(4, 'OPPO VN', 'Mô tả 4', 'ncc-4.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(5, 'REALME VN', 'Mô tả 5', 'ncc-5.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(6, 'SAMSUNG VN', 'Mô tả 6', 'ncc-6.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(7, 'VINGROUP', 'Mô tả 7', 'ncc-7.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(8, 'VIVO VN', 'Mô tả 8', 'ncc-8.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2),
(9, 'XIAOMI VN', 'Mô tả 9', 'ncc-9.jpg', '2021-01-22 21:12:53', '2021-01-22 21:12:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_quyen`
--

CREATE TABLE `cusc_quyen` (
  `q_ma` bigint(20) NOT NULL COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `q_ten` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên quyền # Tên quyền',
  `q_dienGiai` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Diễn giải # Diễn giải về quyền',
  `q_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo quyền',
  `q_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất',
  `q_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_quyen`
--

INSERT INTO `cusc_quyen` (`q_ma`, `q_ten`, `q_dienGiai`, `q_taoMoi`, `q_capNhat`, `q_trangThai`) VALUES
(1, 'Giám đốc', 'Diễn giải 1', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2),
(2, 'Kế toán', 'Diễn giải 2', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2),
(3, 'Nhân viên bán hàng', 'Diễn giải 3', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2),
(4, 'Nhân viên giao hàng', 'Diễn giải 4', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2),
(5, 'Quản lí kho', 'Diễn giải 5', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2),
(6, 'Quản trị', 'Diễn giải 6', '2021-01-22 21:13:36', '2021-01-22 21:13:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_san_pham`
--

CREATE TABLE `cusc_san_pham` (
  `sp_ma` bigint(20) NOT NULL COMMENT 'Mã sản phẩm',
  `sp_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm #Tên sản phẩm',
  `sp_hinhAnh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hình đại diện sản phẩm #Hình đại diện sản phẩm',
  `sp_moTa_ngan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả ngắn về sản phẩm #Mô tả ngắn về sản phẩm',
  `sp_moTa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả về sản phẩm #Mô tả về sản phẩm',
  `sp_giaNhap` decimal(19,4) NOT NULL COMMENT 'Giá nhập sản phẩm #Giá nhập sản phẩm',
  `sp_giaBan` decimal(19,4) NOT NULL COMMENT 'Giá bán sản phẩm #Giá bán sản phẩm',
  `sp_soLuong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số lượng mỗi sản phẩm #Số lượng mỗi sản phẩm',
  `sp_noiBat` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Sản phẩm nổi bật',
  `sp_moi` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Sản phẩm mới',
  `l_ma` bigint(20) NOT NULL COMMENT 'Mã loại sản phẩm',
  `ncc_ma` bigint(20) NOT NULL COMMENT 'Mã nhà cung cấp sản phẩm',
  `sp_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm',
  `sp_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất',
  `sp_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_san_pham`
--

INSERT INTO `cusc_san_pham` (`sp_ma`, `sp_ten`, `sp_hinhAnh`, `sp_moTa_ngan`, `sp_moTa`, `sp_giaNhap`, `sp_giaBan`, `sp_soLuong`, `sp_noiBat`, `sp_moi`, `l_ma`, `ncc_ma`, `sp_taoMoi`, `sp_capNhat`, `sp_trangThai`) VALUES
(1, 'Iphone 12 promax 512gb', 'iphone-12-pro-max-vang-new-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-1', 'Mô tả sản phẩm 1', '584059.6500', '1422293.5800', '61', 1, 1, 2, 1, '2021-01-22 21:13:48', '2021-01-23 01:26:48', 2),
(2, 'Điện thoại iPhone 12 mini 64GB', 'iphone-mini-do-new-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-2', 'Thông số kỹ thuật\r\nMàn hình:	OLED, 5.4\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 5G\r\nDung lượng pin:	2227 mAh, có sạc nhanh', '19000000.0000', '21000000.0000', '20', 1, 1, 2, 1, '2021-01-22 21:13:48', '2021-01-23 01:30:56', 2),
(3, 'Điện thoại iPhone 12 Pro 512GB', 'iphone-12-pro-xanh-duong-new-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-3', 'Màn hình:	OLED, 6.1\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	3 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	512 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 5G\r\nDung lượng pin:	2815 mAh, có sạc nhanh', '36999000.0000', '38999000.0000', '20', 1, 1, 2, 1, '2021-01-22 21:13:48', '2021-01-23 01:32:54', 2),
(4, 'Điện thoại iPhone SE 256GB (2020)', 'iphone-se-128gb-2020-den-600x600.jpg', 'Mô tả ngắn sản phẩm-4', 'Màn hình:	IPS LCD, 4.7\"\r\nHệ điều hành:	iOS 14\r\nCamera sau:	12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A13 Bionic 6 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 4G\r\nDung lượng pin:	1821 mAh, có sạc nhanh', '13999000.0000', '16999000.0000', '20', 1, 1, 2, 1, '2021-01-22 21:13:48', '2021-01-23 01:35:01', 2),
(5, 'Điện thoại iPhone XR 64GB', 'iphone-xr-hopmoi-den-600x600-2-600x600.jpg', 'Mô tả ngắn sản phẩm-5', 'Màn hình:	IPS LCD, 6.1\", Liquid Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A12 Bionic 6 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 4G\r\nDung lượng pin:	2942 mAh, có sạc nhanh', '12450000.0000', '13450000.0000', '20', 1, 1, 2, 1, '2021-01-22 21:13:48', '2021-01-23 01:41:17', 2),
(6, 'Điện thoại Samsung Galaxy Z Fold2 5G Đặc Biệt', 'samsung-galaxy-z-fold-2-vang-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-6', 'Màn hình:	Chính: Dynamic AMOLED, Phụ: Super AMOLED, Chính 7.59\" & Phụ 6.23\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	3 camera 12 MP\r\nCamera trước:	10 MP\r\nCPU:	Snapdragon 865+ 8 nhân\r\nRAM:	12 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 5G\r\nDung lượng pin:	4500 mAh, có sạc nhanh', '48000000.0000', '50000000.0000', '15', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:44:18', 2),
(7, 'Điện thoại Samsung Galaxy A12 (6GB/128GB)', 'samsung-galaxy-a12-trang-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-7', 'Màn hình:	PLS TFT LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 5 MP, 2 MP, 2 MP\r\nCamera trước:	8 MP\r\nCPU:	MediaTek Helio G35 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '3500000.0000', '4200000.0000', '20', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:46:07', 2),
(8, 'Điện thoại Samsung Galaxy Note 20 Ultra 5G Trắng', 'samsunggalaxynote20ultratrangnew-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-8', 'Màn hình:	Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	12 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB\r\nThẻ SIM:	2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G\r\nDung lượng pin:	4500 mAh, có sạc nhanh', '28999000.0000', '32999000.0000', '11', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:48:09', 2),
(9, 'Điện thoại Samsung Galaxy A21s (6GB/64GB)', 'samsung-galaxy-a21s-xanh-600x600-1-600x600.jpg', 'Mô tả ngắn sản phẩm-9', 'Màn hình:	TFT LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	13 MP\r\nCPU:	Exynos 850 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '4750000.0000', '5590000.0000', '20', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:50:29', 2),
(10, 'Điện thoại Samsung Galaxy A51 (8GB/128GB)', 'samsung-galaxy-a51-8gb-xanh-600x600.jpg', 'Mô tả ngắn sản phẩm-10', 'Màn hình:	Super AMOLED, 6.5\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP\r\nCamera trước:	32 MP\r\nCPU:	Exynos 9611 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4000 mAh, có sạc nhanh', '6890000.0000', '7890000.0000', '10', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:52:08', 2),
(11, 'Điện thoại Samsung Galaxy A11', 'samsung-galaxy-a11-(16).jpg', 'Mô tả ngắn sản phẩm-11', 'Màn hình:	PLS TFT LCD, 6.4\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 13 MP & Phụ 5 MP, 2 MP\r\nCamera trước:	8 MP\r\nCPU:	Snapdragon 450 8 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4000 mAh, có sạc nhanh', '2730000.0000', '3250000.0000', '20', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:54:40', 2),
(12, 'Điện thoại Samsung Galaxy Z Flip', 'samsung-galaxy-z-flip-600x600-1-600x600.jpg', 'Mô tả ngắn sản phẩm-12', 'Màn hình:	Chính: Dynamic AMOLED, Phụ: Super AMOLED, 6.7\", Quad HD (2K)\r\nHệ điều hành:	Android 10\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:	10 MP\r\nCPU:	Snapdragon 855+ 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ SIM:	1 Nano SIM & 1 eSIM, Hỗ trợ 4G\r\nDung lượng pin:	3300 mAh, có sạc nhanh', '32000000.0000', '36000000.0000', '10', 1, 1, 6, 6, '2021-01-22 21:13:48', '2021-01-23 01:57:11', 2),
(13, 'Điện thoại OPPO Reno5', 'oppo-reno5-trang-600x600-1-600x600.jpg', 'Mô tả ngắn sản phẩm-13', 'Màn hình:	AMOLED, 6.43\", Full HD+\r\nHệ điều hành:	Android 11\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	44 MP\r\nCPU:	Snapdragon 720G 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4310 mAh, có sạc nhanh', '7690000.0000', '8690000.0000', '10', 1, 1, 4, 4, '2021-01-22 21:13:48', '2021-01-23 01:58:36', 2),
(14, 'Điện thoại OPPO A15', 'oppo-a15-black-600x600-2-600x600.jpg', 'Mô tả ngắn sản phẩm-14', 'Màn hình:	IPS LCD, 6.52\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:	8 MP\r\nCPU:	MediaTek Helio P35 8 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4230 mAh', '2790000.0000', '3300000.0000', '20', 1, 1, 4, 4, '2021-01-22 21:13:48', '2021-01-23 02:01:32', 2),
(15, 'Điện thoại OPPO A93', 'oppo-a93-(2).jpg', 'Mô tả ngắn sản phẩm-15', 'Màn hình:	AMOLED, 6.43\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	Chính 16 MP & Phụ 2 MP\r\nCPU:	MediaTek Helio P95 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4000 mAh, có sạc nhanh', '6590000.0000', '7290000.0000', '10', 1, 1, 4, 4, '2021-01-22 21:13:48', '2021-01-23 02:03:30', 2),
(16, 'Điện thoại OPPO A53 (2020)', 'oppo-a53-2020-xanh-600x600.jpg', 'Mô tả ngắn sản phẩm-16', 'Màn hình:	IPS LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:	16 MP\r\nCPU:	Snapdragon 460 8 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '3890000.0000', '4390000.0000', '15', 1, 1, 4, 4, '2021-01-22 21:13:48', '2021-01-23 02:04:46', 2),
(17, 'Điện thoại Vivo Y51 (2020)', 'vivo-y51-bac-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-17', 'Màn hình:	IPS LCD, 6.58\", Full HD+\r\nHệ điều hành:	Android 11\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 2 MP\r\nCamera trước:	16 MP\r\nCPU:	Snapdragon 662 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB\r\nThẻ SIM:	2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '4990000.0000', '5990000.0000', '10', 1, 1, 7, 8, '2021-01-22 21:13:48', '2021-01-23 02:07:14', 2),
(18, 'Điện thoại Vivo V20 (2021)', 'vivov202021den-600x600.jpg', 'Mô tả ngắn sản phẩm-18', 'Màn hình:	AMOLED, 6.44\", Full HD+\r\nHệ điều hành:	Android 11\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:	44 MP\r\nCPU:	Snapdragon 730 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4000 mAh, có sạc nhanh', '6990000.0000', '7990000.0000', '10', 1, 1, 7, 8, '2021-01-22 21:13:48', '2021-01-23 02:08:21', 2),
(19, 'Điện thoại Vivo Y12s (4GB/128GB)', 'vivo-y12s-4gb-128gb.jpg', 'Mô tả ngắn sản phẩm-19', 'Màn hình:	IPS LCD, 6.51\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 13 MP & Phụ 2 MP\r\nCamera trước:	8 MP\r\nCPU:	MediaTek Helio P35 8 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh', '3070000.0000', '3770000.0000', '15', 1, 1, 7, 8, '2021-01-22 21:13:48', '2021-01-23 02:09:26', 2),
(20, 'Điện thoại Vivo Y1s', 'vivo-y1s-(6).jpg', 'Mô tả ngắn sản phẩm-20', 'Màn hình:	IPS LCD, 6.22\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	13 MP\r\nCamera trước:	5 MP\r\nCPU:	MediaTek Helio P35 8 nhân\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	4030 mAh', '2290000.0000', '2890000.0000', '15', 1, 1, 7, 8, '2021-01-22 21:13:48', '2021-01-23 02:11:09', 2),
(21, 'Điện thoại Xiaomi Redmi 9T (4GB/64GB)', 'redmi-9t-den-600x600-600x600.jpg', 'Mô tả ngắn sản phẩm-21', 'Màn hình:	IPS LCD, 6.53\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	8 MP\r\nCPU:	Snapdragon 662 8 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:	2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	6000 mAh, có sạc nhanh', '3080000.0000', '3880000.0000', '15', 1, 1, 9, 9, '2021-01-22 21:13:48', '2021-01-23 02:18:15', 2),
(22, 'Điện thoại Xiaomi Mi 10T Pro 5G', 'xiaomi-mi-10t-pro-(2).jpg', 'Mô tả ngắn sản phẩm-22', 'Màn hình:	IPS LCD, 6.67\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 108 MP & Phụ 13 MP, 5 MP\r\nCamera trước:	20 MP\r\nCPU:	Snapdragon 865 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 5G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '11290000.0000', '12290000.0000', '15', 1, 1, 9, 9, '2021-01-22 21:13:48', '2021-01-23 02:20:17', 2),
(23, 'Điện thoại Xiaomi POCO X3 NFC', 'xiaomi-poco-x3-(6).jpg', 'Mô tả ngắn sản phẩm-23', 'Màn hình:	IPS LCD, 6.67\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 64 MP & Phụ 13 MP, 2 MP, 2 MP\r\nCamera trước:	20 MP\r\nCPU:	Snapdragon 732G 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM (SIM 1 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	5160 mAh, có sạc nhanh', '5890000.0000', '6490000.0000', '10', 1, 1, 9, 9, '2021-01-22 21:13:48', '2021-01-23 02:27:14', 2),
(24, 'Điện thoại Realme C20', 'realme-c20-xanh-600x600-1-200x200.jpg', 'Mô tả ngắn sản phẩm-24', 'Màn hình:	LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	8 MP\r\nCamera trước:	5 MP\r\nCPU:	MediaTek Helio G35 8 nhân\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh', '2090000.0000', '2490000.0000', '10', 1, 1, 5, 5, '2021-01-22 21:13:48', '2021-01-23 02:33:24', 2),
(25, 'Điện thoại Realme C17', 'realme-c17-green-600x600-1-600x600.jpg', 'Mô tả ngắn sản phẩm-25', 'Màn hình:	IPS LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 13 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	8 MP\r\nCPU:	Snapdragon 460 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '4590000.0000', '5290000.0000', '10', 1, 1, 5, 5, '2021-01-22 21:13:48', '2021-01-23 02:41:52', 2),
(26, 'Điện thoại Realme 7', 'realme-7-blue-600x600.jpg', 'Mô tả ngắn sản phẩm-26', 'Màn hình:	IPS LCD, 6.5\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	16 MP\r\nCPU:	MediaTek Helio G95 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '6070000.0000', '6870000.0000', '10', 1, 1, 5, 5, '2021-01-22 21:13:48', '2021-01-23 02:44:37', 2),
(27, 'Điện thoại Realme C3 (3GB/64GB)', 'realme-c3-64gb-xanh-duong-600x600.jpg', 'Mô tả ngắn sản phẩm-27', 'Màn hình:	IPS LCD, 6.5\", HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 12 MP & Phụ 2 MP, 2 MP\r\nCamera trước:	5 MP\r\nCPU:	MediaTek Helio G70 8 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh', '2990000.0000', '3590000.0000', '15', 1, 1, 5, 5, '2021-01-22 21:13:48', '2021-01-23 03:36:22', 2),
(28, 'Điện thoại Vsmart Joy 4 (6GB/64GB)', 'vsmart-joy-4-6gb.jpg', 'Mô tả ngắn sản phẩm-28', 'Màn hình:	LTPS IPS LCD, 6.53\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 16 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	13 MP\r\nCPU:	Snapdragon 665 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:	2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	5000 mAh, có sạc nhanh', '3090000.0000', '3690000.0000', '10', 1, 1, 8, 7, '2021-01-22 21:13:48', '2021-01-23 03:40:07', 2),
(29, 'sp_ten-29', 'sp-29.jpg', 'Mô tả ngắn sản phẩm-29', 'Mô tả sản phẩm 29', '228949.9161', '1347867.1653', '88', 1, 1, 2, 9, '2021-01-22 21:13:48', '2021-01-22 21:13:48', 1),
(30, 'sp_ten-30', 'sp-30.jpg', 'Mô tả ngắn sản phẩm-30', 'Mô tả sản phẩm 30', '1856172.2503', '1904534.7404', '87', 1, 1, 4, 4, '2021-01-22 21:13:48', '2021-01-22 21:13:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_thanh_toan`
--

CREATE TABLE `cusc_thanh_toan` (
  `tt_ma` bigint(20) NOT NULL COMMENT 'Mã phương thức thanh toán',
  `tt_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên phương thức thanh toán',
  `tt_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin về phương thức thanh toán',
  `tt_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán',
  `tt_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán',
  `tt_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_thanh_toan`
--

INSERT INTO `cusc_thanh_toan` (`tt_ma`, `tt_ten`, `tt_dienGiai`, `tt_taoMoi`, `tt_capNhat`, `tt_trangThai`) VALUES
(1, 'Chuyển khoản ngân hàng', 'Chuyển khoản ngân hàng', '2021-01-22 21:14:27', '2021-01-22 21:14:27', 2),
(2, 'Tiền mặt', 'Tiền mặt', '2021-01-22 21:14:27', '2021-01-22 21:14:27', 2),
(3, 'VISA', 'VISA', '2021-01-22 21:14:27', '2021-01-22 21:14:27', 2),
(4, 'Ví AirPay', 'Ví AirPay', '2021-01-22 21:14:27', '2021-01-22 21:14:27', 2),
(5, 'Ví MOMO', 'Ví MOMO', '2021-01-22 21:14:27', '2021-01-22 21:14:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_van_chuyen`
--

CREATE TABLE `cusc_van_chuyen` (
  `vc_ma` bigint(20) NOT NULL COMMENT 'Mã dịch vụ giao hàng',
  `vc_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên dịch vụ #Tên dịch vụ giao hàng',
  `vc_chiPhi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phí giao hàng #Phí giao hàng',
  `vc_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin #Thông tin về dịch vụ giao hàng',
  `vc_taoMoi` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo dịch vụ giao hàng',
  `vc_capNhat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật dịch vụ giao hàng gần nhất',
  `vc_trangThai` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái # Trạng thái dịch vụ giao hàng: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cusc_van_chuyen`
--

INSERT INTO `cusc_van_chuyen` (`vc_ma`, `vc_ten`, `vc_chiPhi`, `vc_dienGiai`, `vc_taoMoi`, `vc_capNhat`, `vc_trangThai`) VALUES
(1, 'Bưu điện', '20000', 'Diễn giải 1', '2021-01-22 21:14:08', '2021-01-22 21:14:08', 2),
(2, 'Express', '20000', 'Diễn giải 2', '2021-01-22 21:14:08', '2021-01-22 21:14:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_01_12_084836_create_cusc_loai_table', 1),
(4, '2021_01_13_063735_create_cusc_nha_cung_cap_table', 1),
(5, '2021_01_13_071406_create_cusc_san_pham_table', 1),
(6, '2021_01_14_063327_create_cusc_hinh_anh_san_pham_table', 1),
(7, '2021_01_14_072102_create_cusc_giam_gia_san_pham_table', 1),
(8, '2021_01_14_085144_create_cusc_khach_hang_table', 1),
(9, '2021_01_14_094219_create_cusc_nhan_xet_san_pham_table', 1),
(10, '2021_01_19_084144_create_cusc_quyen_table', 1),
(11, '2021_01_19_084145_create_cusc_nhan_vien_table', 1),
(12, '2021_01_21_093816_create_cusc_thanh_toan_table', 1),
(13, '2021_01_21_094250_create_cusc_van_chuyen_table', 1),
(14, '2021_01_21_095130_create_cusc_don_hang_table', 1),
(15, '2021_01_21_111330_create_cusc_chi_tiet_don_hang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusc_chi_tiet_don_hang`
--
ALTER TABLE `cusc_chi_tiet_don_hang`
  ADD KEY `cusc_chi_tiet_don_hang_dh_ma_foreign` (`dh_ma`),
  ADD KEY `cusc_chi_tiet_don_hang_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_don_hang`
--
ALTER TABLE `cusc_don_hang`
  ADD PRIMARY KEY (`dh_ma`),
  ADD KEY `cusc_don_hang_kh_ma_foreign` (`kh_ma`),
  ADD KEY `cusc_don_hang_nv_xuly_foreign` (`nv_xuLy`),
  ADD KEY `cusc_don_hang_nv_giaohang_foreign` (`nv_giaoHang`),
  ADD KEY `cusc_don_hang_vc_ma_foreign` (`vc_ma`),
  ADD KEY `cusc_don_hang_tt_ma_foreign` (`tt_ma`);

--
-- Indexes for table `cusc_giam_gia_san_pham`
--
ALTER TABLE `cusc_giam_gia_san_pham`
  ADD PRIMARY KEY (`sp_ma`,`gg_ma`);

--
-- Indexes for table `cusc_hinh_anh_san_pham`
--
ALTER TABLE `cusc_hinh_anh_san_pham`
  ADD PRIMARY KEY (`sp_ma`,`ha_ma`);

--
-- Indexes for table `cusc_khach_hang`
--
ALTER TABLE `cusc_khach_hang`
  ADD PRIMARY KEY (`kh_ma`);

--
-- Indexes for table `cusc_loai`
--
ALTER TABLE `cusc_loai`
  ADD PRIMARY KEY (`l_ma`),
  ADD UNIQUE KEY `cusc_loai_l_ten_unique` (`l_ten`);

--
-- Indexes for table `cusc_nhan_vien`
--
ALTER TABLE `cusc_nhan_vien`
  ADD PRIMARY KEY (`nv_ma`),
  ADD UNIQUE KEY `cusc_nhan_vien_nv_taikhoan_nv_email_nv_dienthoai_unique` (`nv_taiKhoan`,`nv_email`,`nv_dienThoai`),
  ADD KEY `cusc_nhan_vien_q_ma_foreign` (`q_ma`);

--
-- Indexes for table `cusc_nhan_xet_san_pham`
--
ALTER TABLE `cusc_nhan_xet_san_pham`
  ADD PRIMARY KEY (`nx_ma`),
  ADD KEY `cusc_nhan_xet_san_pham_sp_ma_foreign` (`sp_ma`),
  ADD KEY `cusc_nhan_xet_san_pham_kh_ma_foreign` (`kh_ma`);

--
-- Indexes for table `cusc_nha_cung_cap`
--
ALTER TABLE `cusc_nha_cung_cap`
  ADD PRIMARY KEY (`ncc_ma`);

--
-- Indexes for table `cusc_quyen`
--
ALTER TABLE `cusc_quyen`
  ADD PRIMARY KEY (`q_ma`);

--
-- Indexes for table `cusc_san_pham`
--
ALTER TABLE `cusc_san_pham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD KEY `cusc_san_pham_l_ma_foreign` (`l_ma`),
  ADD KEY `cusc_san_pham_ncc_ma_foreign` (`ncc_ma`);

--
-- Indexes for table `cusc_thanh_toan`
--
ALTER TABLE `cusc_thanh_toan`
  ADD PRIMARY KEY (`tt_ma`);

--
-- Indexes for table `cusc_van_chuyen`
--
ALTER TABLE `cusc_van_chuyen`
  ADD PRIMARY KEY (`vc_ma`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusc_don_hang`
--
ALTER TABLE `cusc_don_hang`
  MODIFY `dh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cusc_khach_hang`
--
ALTER TABLE `cusc_khach_hang`
  MODIFY `kh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cusc_loai`
--
ALTER TABLE `cusc_loai`
  MODIFY `l_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại sản phẩm', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cusc_nhan_vien`
--
ALTER TABLE `cusc_nhan_vien`
  MODIFY `nv_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhân viên', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cusc_nhan_xet_san_pham`
--
ALTER TABLE `cusc_nhan_xet_san_pham`
  MODIFY `nx_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'STT Nhận xét';

--
-- AUTO_INCREMENT for table `cusc_nha_cung_cap`
--
ALTER TABLE `cusc_nha_cung_cap`
  MODIFY `ncc_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhà cung cấp', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cusc_quyen`
--
ALTER TABLE `cusc_quyen`
  MODIFY `q_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cusc_san_pham`
--
ALTER TABLE `cusc_san_pham`
  MODIFY `sp_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cusc_thanh_toan`
--
ALTER TABLE `cusc_thanh_toan`
  MODIFY `tt_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã phương thức thanh toán', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cusc_van_chuyen`
--
ALTER TABLE `cusc_van_chuyen`
  MODIFY `vc_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã dịch vụ giao hàng', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cusc_chi_tiet_don_hang`
--
ALTER TABLE `cusc_chi_tiet_don_hang`
  ADD CONSTRAINT `cusc_chi_tiet_don_hang_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `cusc_don_hang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chi_tiet_don_hang_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_san_pham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_don_hang`
--
ALTER TABLE `cusc_don_hang`
  ADD CONSTRAINT `cusc_don_hang_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `cusc_khach_hang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_don_hang_nv_giaohang_foreign` FOREIGN KEY (`nv_giaoHang`) REFERENCES `cusc_nhan_vien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_don_hang_nv_xuly_foreign` FOREIGN KEY (`nv_xuLy`) REFERENCES `cusc_nhan_vien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_don_hang_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `cusc_thanh_toan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_don_hang_vc_ma_foreign` FOREIGN KEY (`vc_ma`) REFERENCES `cusc_van_chuyen` (`vc_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_giam_gia_san_pham`
--
ALTER TABLE `cusc_giam_gia_san_pham`
  ADD CONSTRAINT `cusc_giam_gia_san_pham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_san_pham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_hinh_anh_san_pham`
--
ALTER TABLE `cusc_hinh_anh_san_pham`
  ADD CONSTRAINT `cusc_hinh_anh_san_pham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_san_pham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_nhan_vien`
--
ALTER TABLE `cusc_nhan_vien`
  ADD CONSTRAINT `cusc_nhan_vien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `cusc_quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_nhan_xet_san_pham`
--
ALTER TABLE `cusc_nhan_xet_san_pham`
  ADD CONSTRAINT `cusc_nhan_xet_san_pham_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `cusc_khach_hang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_nhan_xet_san_pham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_san_pham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_san_pham`
--
ALTER TABLE `cusc_san_pham`
  ADD CONSTRAINT `cusc_san_pham_l_ma_foreign` FOREIGN KEY (`l_ma`) REFERENCES `cusc_loai` (`l_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_san_pham_ncc_ma_foreign` FOREIGN KEY (`ncc_ma`) REFERENCES `cusc_nha_cung_cap` (`ncc_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
