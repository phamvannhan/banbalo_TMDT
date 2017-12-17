-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2017 lúc 04:39 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mywebsite`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kh` int(10) UNSIGNED DEFAULT NULL,
  `id_nd` int(10) UNSIGNED DEFAULT NULL,
  `id_sp` int(10) UNSIGNED DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caidat`
--

CREATE TABLE `caidat` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `caidat`
--

INSERT INTO `caidat` (`id`, `ten`, `mota`, `keywords`, `trangthai`, `diachi`, `mail`, `sdt1`, `sdt2`, `sdt3`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Balo Sky', '\'Balo Hàng Hiệu là hệ thống cửa hàng  Ba lô, vali kéo, túi xách, phụ kiện chính hãng uy tín tại TPHCM ✅ +2000 mẫu balô, vali kéo SALE OFF 50% ✅ Đổi trả 365 ngày ✅ Free Ship', 'balo, shop, nhom8, shopbalo, mrt', 1, '572/19/41 Âu Cơ P10 QTB TPHCM', 'tanthanhdev96@gmail.com', '0909515240', '0909515250', '0909515260', NULL, '2017-10-10 02:10:25', '2017-12-09 04:42:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `id_dh` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_sp`, `soluong`, `dongia`, `id_dh`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, NULL, 0, 0, NULL, NULL, NULL, NULL),
(28, NULL, 0, 0, NULL, NULL, NULL, NULL),
(29, 45, 2, 212500, 33, NULL, '2017-12-09 06:18:38', '2017-12-09 06:18:38'),
(30, 44, 1, 630000, 33, NULL, '2017-12-09 06:18:38', '2017-12-09 06:18:38'),
(31, 45, 1, 212500, 34, NULL, '2017-12-09 06:38:11', '2017-12-09 06:38:11'),
(32, 45, 1, 212500, 35, NULL, '2017-12-09 06:41:53', '2017-12-09 06:41:53'),
(33, 44, 1, 630000, 36, NULL, '2017-12-09 08:30:53', '2017-12-09 08:30:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` double NOT NULL,
  `id_pn` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`id`, `id_sp`, `soluong`, `gianhap`, `id_pn`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 42, 10, 100000, 20, NULL, '2017-12-09 05:53:21', '2017-12-09 05:53:21'),
(24, 46, 10, 120000, 21, NULL, '2017-12-09 05:55:41', '2017-12-09 05:55:41'),
(25, 44, 10, 115000, 22, NULL, '2017-12-09 05:56:01', '2017-12-09 05:56:01'),
(26, 45, 10, 90000, 23, NULL, '2017-12-09 05:56:29', '2017-12-09 05:56:29'),
(27, 47, 10, 85000, 24, NULL, '2017-12-09 05:57:09', '2017-12-09 05:57:09'),
(28, 48, 10, 95000, 25, NULL, '2017-12-09 05:57:33', '2017-12-09 05:57:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitri` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`id`, `ten`, `slug`, `vitri`, `remember_token`, `created_at`, `updated_at`) VALUES
(56, 'Giới Thiệu', 'gioi-thieu', 1, NULL, '2017-12-09 04:31:56', '2017-12-09 04:31:56'),
(57, 'Balo Nam', 'balo-nam', 2, NULL, '2017-12-09 04:32:10', '2017-12-09 04:32:10'),
(58, 'Balo Nữ', 'balo-nu', 3, NULL, '2017-12-09 04:32:16', '2017-12-10 02:09:12'),
(59, 'Balo Học Sinh', 'balo', 4, NULL, '2017-12-09 04:32:31', '2017-12-09 04:32:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stripe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonggia` double NOT NULL,
  `dchigiaohang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `id_kh` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `id_stripe`, `tonggia`, `dchigiaohang`, `trangthai`, `id_kh`, `remember_token`, `created_at`, `updated_at`) VALUES
(33, 'ch_1BX1fWLPuKRrnhODUlk5taj4', 1055000, 'Đường: 572/19/41 AU CO TP: HO CHI MINH', 2, 11, NULL, '2017-12-09 06:18:38', '2017-12-09 06:30:47'),
(34, 'ch_1BX1yRLPuKRrnhODLePcI1Y7', 212500, 'Đường: cmt8 TP: HCM', 0, 11, NULL, '2017-12-09 06:38:11', '2017-12-09 06:38:11'),
(35, 'ch_1BX221LPuKRrnhODT8bpVcbX', 212500, 'Đường: an duong vuong TP: HCM', 0, 11, NULL, '2017-12-09 06:41:53', '2017-12-09 06:41:53'),
(36, 'ch_1BX3jULPuKRrnhODXwGAW4Xw', 630000, 'Đường: cmt8 TP: HCM', 0, 11, NULL, '2017-12-09 08:30:53', '2017-12-09 08:30:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci,
  `sodienthoai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaikh` int(11) NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `username`, `password`, `ten`, `diachi`, `sodienthoai`, `mail`, `loaikh`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'tanthanh', '$2y$10$MWeEVgHLH4CDZawUEzhGpe5OikERNLVqZ8FdqDIBhgSq3NV7u6fby', 'Nguyễn Tấn Thành', 'Âu Cơ', '0909515240', 'tanthanhdev96@gmail.com', 1, NULL, 'fYbzxfzc57HFf57qqCYKcddCp7DhVbTcEmpZ18nhZQiAAyp717X6OnT5s4qE', '2017-12-09 06:04:13', '2017-12-09 08:36:10'),
(12, 'minhtuan', '$2y$10$lba9pF.DHE6oOfW2XGrtluG5eIk8OkyK95HMAxYEOZSbjxUZrdnUG', 'Phan Minh Tuan', 'au co', '0909515240', 'abc@gmail.com', 1, NULL, NULL, '2017-12-09 07:06:36', '2017-12-09 07:06:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitri` int(11) NOT NULL,
  `id_cm` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `ten`, `slug`, `vitri`, `id_cm`, `remember_token`, `created_at`, `updated_at`) VALUES
(38, 'Loại A', 'loai-a', 1, 57, NULL, '2017-12-09 04:33:15', '2017-12-09 04:33:15'),
(39, 'Loại B', 'loai-b', 2, 57, NULL, '2017-12-09 04:33:23', '2017-12-09 04:33:23'),
(40, 'Loại C', 'loai-c', 3, 58, NULL, '2017-12-09 04:33:32', '2017-12-09 04:33:32'),
(41, 'Loại D', 'loai-d', 4, 58, NULL, '2017-12-09 04:33:50', '2017-12-09 04:33:50'),
(42, 'Loại E', 'loai-e', 5, 59, NULL, '2017-12-09 04:33:59', '2017-12-09 04:33:59'),
(43, 'Loại F', 'loai-f', 6, 59, NULL, '2017-12-09 04:34:12', '2017-12-09 04:34:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_10_083827_chuyenmuc', 1),
(4, '2017_10_10_083840_loaisanpham', 1),
(5, '2017_10_10_083847_nhacungcap', 1),
(6, '2017_10_10_083903_slides', 1),
(7, '2017_10_10_083917_caidat', 1),
(8, '2017_10_10_083931_nguoidung', 1),
(9, '2017_10_10_083940_khachhang', 1),
(10, '2017_10_10_083948_quanliquangcao', 1),
(11, '2017_10_10_083956_quangcao', 1),
(12, '2017_10_10_084009_sanpham', 1),
(13, '2017_10_10_084024_phieunhap', 1),
(14, '2017_10_10_084033_chitietphieunhap', 1),
(15, '2017_10_10_084045_binhluan', 1),
(16, '2017_10_10_084054_donhang', 1),
(17, '2017_10_10_084059_chitietdonhang', 1),
(18, '2017_11_18_211259_traloibinhluan', 2),
(19, '2017_11_19_141933_facebook_account', 3),
(20, '2017_11_19_153330_social_provider', 4),
(21, '2017_11_20_182345_create_jobs_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` int(11) NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `username`, `password`, `ten`, `chucvu`, `diachi`, `sdt1`, `sdt2`, `sdt3`, `mail`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'root', '$2y$10$lSsafbOpKiSUsVt9KZZmLeJJ3I55hI2OCtfDcpQ.vwEBC6jHplu8.', 'Thành', 1, 'au co', '0909515240123', '0909515240', '0909515240', 'tanthanhnguyen979797@gmail.com', 1, 'P8qEuN6gfjkCPkOQdFPkBwBRybvL5fvB8oj1jGJJ9S72RzmFkPHOyUkHrPfX', '2017-10-19 04:33:47', '2017-10-26 05:52:01'),
(22, 'tanthanh', '$2y$10$P58bk2zNHLBnpwoUipLX8ugr6EPv/0ZLztmVVjaxn.BBK9BTAnLUa', 'Nguyễn Tấn Thành', 1, 'Âu Cơ', '0909515240', '0909515250', '0909515260', 'tanthanhdev96@gmail.com', 1, 'hAFlS4okVD0mAy3kI18ofX4O6bzaFN70rjdYAAA2hQL4WeXGwWingbT20qqp', '2017-12-09 04:38:47', '2017-12-09 04:38:47'),
(23, 'ngoctrong', '$2y$10$YaIHNk0udZ8MMLO5VWbu.OoZgKP7Q/lVJd0fvbxAdtrvjQCvqX7Sa', 'Lê Ngọc Trọng', 2, 'CMT8', '0909515240', '0909515250', '0909515260', 'tanthanhnet96@gmail.com', 1, NULL, '2017-12-09 04:39:42', '2017-12-09 04:39:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `ten`, `sdt`, `diachi`, `mail`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'NCC1', '0909515240', 'Âu Cơ', 'ncc1@gmail.com', NULL, '2017-12-09 04:34:50', '2017-12-09 04:34:50'),
(16, 'NCC2', '0909515240', 'CMT8', 'ncc2@gmail.com', NULL, '2017-12-09 04:35:09', '2017-12-09 04:35:09'),
(17, 'NCC3', '0909515240', 'Trường Chinh', 'ncc3@gmail.com', NULL, '2017-12-09 04:36:15', '2017-12-09 04:36:15'),
(18, 'NCC4', '0909515240', 'Lạc Long Quân', 'ncc4@gmail.com', NULL, '2017-12-09 04:36:36', '2017-12-09 04:36:36'),
(19, 'NCC5', '0909515240', 'An Dương Vương', 'ncc5@gmail.com', NULL, '2017-12-09 04:37:03', '2017-12-09 04:37:03'),
(20, 'NCC6', '0909515240', 'Nguyễn Chí Thanh', 'ncc6@gmail.com', NULL, '2017-12-09 04:37:25', '2017-12-09 04:37:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ncc` int(10) UNSIGNED DEFAULT NULL,
  `tonggia` double NOT NULL,
  `ngaydat` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_ncc`, `tonggia`, `ngaydat`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 15, 100000, '2017-12-09', NULL, '2017-12-09 05:53:21', '2017-12-09 05:53:21'),
(21, 16, 120000, '2017-12-08', NULL, '2017-12-09 05:55:41', '2017-12-09 05:55:41'),
(22, 17, 115000, '2017-12-07', NULL, '2017-12-09 05:56:01', '2017-12-09 05:56:01'),
(23, 18, 90000, '2017-12-09', NULL, '2017-12-09 05:56:29', '2017-12-09 05:56:29'),
(24, 19, 85000, '2017-12-09', NULL, '2017-12-09 05:57:09', '2017-12-09 05:57:09'),
(25, 20, 95000, '2017-12-09', NULL, '2017-12-09 05:57:33', '2017-12-09 05:57:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stripe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayconlai` datetime NOT NULL,
  `id_kh` int(10) UNSIGNED DEFAULT NULL,
  `id_qc` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`id`, `id_stripe`, `anh`, `href`, `mota`, `ngayconlai`, `id_kh`, `id_qc`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'ch_1BX1e6LPuKRrnhODQ6vFdxYX', 'upload/quangcao/2017/12/9/jIM_chelsea.jpg', 'https://www.chelseafc.com/', 'chelsea', '1970-01-31 00:00:00', 11, 16, NULL, '2017-12-09 06:17:10', '2017-12-09 06:17:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanliquangcao`
--

CREATE TABLE `quanliquangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `gia` double NOT NULL,
  `vitri` int(11) NOT NULL,
  `thoigian` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanliquangcao`
--

INSERT INTO `quanliquangcao` (`id`, `gia`, `vitri`, `thoigian`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 10000000, 123, 30, NULL, '2017-12-08 17:00:00', '2017-12-08 17:00:00'),
(17, 8000000, 123, 30, NULL, '2017-12-08 17:00:00', '2017-12-08 17:00:00'),
(18, 5000000, 1, 30, NULL, '2017-12-08 17:00:45', '2017-12-08 17:00:00'),
(19, 3000000, 1, 30, NULL, '2017-12-08 17:00:00', '2017-12-08 17:00:00'),
(20, 2000000, 1, 30, NULL, '2017-12-08 17:00:00', '2017-12-08 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tukhoa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhdaidien` text COLLATE utf8mb4_unicode_ci,
  `tacgia` int(10) UNSIGNED DEFAULT NULL,
  `dongia` double NOT NULL,
  `khuyenmai` double NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT '0',
  `id_loai` int(10) UNSIGNED DEFAULT NULL,
  `id_ncc` int(10) UNSIGNED DEFAULT NULL,
  `trangthai` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `slug`, `tukhoa`, `mota`, `noidung`, `anhdaidien`, `tacgia`, `dongia`, `khuyenmai`, `soluong`, `id_loai`, `id_ncc`, `trangthai`, `luotxem`, `remember_token`, `created_at`, `updated_at`) VALUES
(42, 'Balo A', 'balo', 'balo a', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Crumpler Doozie backpack M Grey/Orange</strong>&nbsp;l&agrave; d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi thiết kế ngăn laptop, ngăn đựng phụ kiện hợp l&yacute;. Balo c&ograve;n nổi bật về chất liệu 1000D Checken Tex chống nước tốt, bền m&agrave;u với thời gian.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/IMG20171125142251.jpg\" style=\"height:960px; width:960px\" /></p>', 'upload/sanpham/2017/12/9/pN4_IMG20171125142251.jpg', 22, 600000, 2, 10, 38, 15, 1, 32, NULL, '2017-12-09 05:11:20', '2017-12-10 03:37:48'),
(44, 'Balo C', 'balo-c', 'balo c', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Kakashi Mowa Sling S D.Grey</strong>&nbsp;l&agrave; d&ograve;ng sản phẩm balo một quai cao cấp, thời trang ph&ugrave; hợp cho iPad, Tablet. Balo một quai c&oacute; 4 m&agrave;u sắc thời trang, thiết kế tiện lợi với d&acirc;y quai to bản thay đổi chiều d&agrave;i linh hoạt, ngăn iPad ri&ecirc;ng biệt. Balo một quai Kakashi Mowa Sling S được l&agrave;m từ chất liệu Tarpaulin bền m&agrave;u, khả năng kh&aacute;ng nước tốt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/1510541691-kakashi-mowa-sling-s-d-grey.jpg\" style=\"height:960px; width:960px\" /></p>', 'upload/sanpham/2017/12/9/KPI_1510541691-kakashi-mowa-sling-s-d-grey.jpg', 22, 700000, 10, 8, 40, 17, 1, 20, NULL, '2017-12-09 05:17:53', '2017-12-10 02:35:53'),
(45, 'Balo D', 'balo-d', 'balo d', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Seliux M4 Sherman S Multicam</strong>&nbsp;kết hợp giữa t&ocirc;ng m&agrave;u l&iacute;nh c&ugrave;ng điếm nhấn l&agrave; logo m&agrave;u đỏ nổi bật, sắc n&eacute;t đang l&agrave; sản phẩm được d&acirc;n phượt &quot;săn l&ugrave;ng&quot; nhiều nhất hiện nay. Sự phối hợp m&agrave;u sắc,&nbsp;<a href=\"https://balohanghieu.com/balo/balo-mot-quai\" target=\"_blank\">thiết kế một quai</a>&nbsp;đ&atilde; g&acirc;y ấn tượng về phong c&aacute;ch cho người d&ugrave;ng từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/1499939908-seliux-m4-sherman-ar387_1024.jpg\" style=\"height:960px; width:960px\" /></p>', 'upload/sanpham/2017/12/9/maU_1499939908-seliux-m4-sherman-ar387_1024.jpg', 22, 250000, 15, 6, 41, 18, 1, 54, NULL, '2017-12-09 05:24:29', '2017-12-09 14:01:24'),
(46, 'Balo B', 'balo-b', 'balo b', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>- D&acirc;y đeo c&oacute; bản lớn v&agrave; đệm lưng &ecirc;m &aacute;i gi&uacute;p chịu lực tốt v&agrave; ph&acirc;n chia lực đều khắp v&ugrave;ng lưng, vai n&ecirc;n kh&ocirc;ng l&agrave;m bạn nhức mỏi c&aacute;nh tay, vai, lưng trong suốt h&agrave;nh tr&igrave;nh mang v&aacute;c đồ đạc.</p>\r\n\r\n<p>- C&oacute; thể điều chỉnh độ d&agrave;i để ph&ugrave; hợp với chiều cao của người sử dụng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/1512619315-seliux-g2-lightning-backpack-m-black.jpg\" style=\"height:961px; width:960px\" /></p>', 'upload/sanpham/2017/12/9/smI_1512619315-seliux-g2-lightning-backpack-m-black.jpg', 22, 300000, 10, 10, 39, 16, 1, 0, NULL, '2017-12-09 05:44:28', '2017-12-10 02:36:18'),
(47, 'Balo E', 'balo-e', 'balo e', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>Ba l&ocirc;&nbsp;<strong>Y3 Yamamoto Qasa Backpack</strong>&nbsp;l&agrave; một sản phẩm độc đ&aacute;o của thương hiệu Y3. Sản phẩm c&oacute; trẻ trung năng động c&ugrave;ng thiết kế kh&oacute;a ẩn chống tr&ocirc;m độc đ&aacute;o sẽ gi&uacute;p bạn giữ g&igrave;n đồ đạc an to&agrave;n v&agrave; hiệu quả.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/1506915114-y3-yamamoto-qasa-backpack-m-black-3_1024%20-%20Copy%20(1).jpg\" style=\"height:750px; width:750px\" /></p>', 'upload/sanpham/2017/12/9/GQU_1506915114-y3-yamamoto-qasa-backpack-m-black-3_1024 - Copy (1).jpg', 22, 350000, 10, 10, 42, 19, 1, 2, NULL, '2017-12-09 05:47:27', '2017-12-10 02:36:33'),
(48, 'Balo F', 'balo-f', 'balo f', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Seliux F6 Skyray Backpack M Red</strong>&nbsp;l&agrave; sản phẩm balo thời trang, sự đổi mới trong thiết kế của d&ograve;ng Seliux F6 Skyray. Balo c&oacute; thể sử dụng để đến trường, đi l&agrave;m hay c&aacute;c hoạt động kh&aacute;c. Balo c&oacute; nhiều ngăn dễ d&agrave;ng sắp xếp đồ đạc, đặc biệt ngăn laptop l&ecirc;n đến 15.6&rsquo;&rsquo;. Chất liệu 1000D Chicken Tex kết hợp vải l&oacute;t 420D RipStop đem đến cho bạn một chiếc balo c&oacute; khả năng hạn chế tốt, bền m&agrave;u.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/1511319906-seliux-f6-skyray-backpack-m-red.jpg\" style=\"height:960px; width:960px\" /></p>', 'upload/sanpham/2017/12/9/EDC_1511319906-seliux-f6-skyray-backpack-m-red.jpg', 22, 450000, 0, 10, 43, 20, 1, 7, NULL, '2017-12-09 05:50:09', '2017-12-09 06:43:31'),
(49, 'BALO G', 'balo-g', 'balo g', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Adidas Prforincine Backpack M Navy&nbsp;</strong>l&agrave; d&ograve;ng sản phẩm balo cao cấp, thời trang của thương hiệu Adidas, thể hiện r&otilde; n&eacute;t phong c&aacute;ch, c&aacute; t&iacute;nh ri&ecirc;ng của người sử dụng. Balo c&oacute; thiết kế h&igrave;nh hộp rộng r&atilde;i, ph&ugrave; hợp cho những chuyến du lịch hoặc hoạt động ngoại kh&oacute;a, thể thao kh&aacute;c. Chất liệu Polyester đặc trưng của Adidas hạn chế thấm nước tốt, bền m&agrave;u khiến chiếc balo trở th&agrave;nh &ldquo;bạn đồng h&agrave;nh&rdquo; l&yacute; tưởng c&ugrave;ng bạn trong c&aacute;c điều kiện thời tiết thất thường.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/balo-nam-han-quoc-laza-bl221-den-1508158803-8110852-b215fc60c4174d9f9f51d8df70d67a13-catalog_233.jpg\" style=\"height:233px; width:233px\" /></p>', 'upload/sanpham/2017/12/9/UPM_balo-nam-han-quoc-laza-bl221-den-1508158803-8110852-b215fc60c4174d9f9f51d8df70d67a13-catalog_233.jpg', 22, 300000, 0, 0, 43, 20, 1, 0, NULL, '2017-12-09 09:33:03', '2017-12-09 09:33:03'),
(50, 'Balo V', 'balo-v', 'balo v', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Seliux M4 Sherman S Multicam</strong>&nbsp;kết hợp giữa t&ocirc;ng m&agrave;u l&iacute;nh c&ugrave;ng điếm nhấn l&agrave; logo m&agrave;u đỏ nổi bật, sắc n&eacute;t đang l&agrave; sản phẩm được d&acirc;n phượt &quot;săn l&ugrave;ng&quot; nhiều nhất hiện nay. Sự phối hợp m&agrave;u sắc,&nbsp;<a href=\"https://balohanghieu.com/balo/balo-mot-quai\" target=\"_blank\">thiết kế một quai</a>&nbsp;đ&atilde; g&acirc;y ấn tượng về phong c&aacute;ch cho người d&ugrave;ng từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.<img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/dc-detention-ii-backpack-edybp03028-m-black_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/hAB_dc-detention-ii-backpack-edybp03028-m-black_100.jpg', 22, 450000, 0, 0, 38, 15, 1, 0, NULL, '2017-12-09 09:40:04', '2017-12-09 09:40:04'),
(51, 'Balo J', 'balo-j', 'balo J', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Seliux M4 Sherman S Multicam</strong>&nbsp;kết hợp giữa t&ocirc;ng m&agrave;u l&iacute;nh c&ugrave;ng điếm nhấn l&agrave; logo m&agrave;u đỏ nổi bật, sắc n&eacute;t đang l&agrave; sản phẩm được d&acirc;n phượt &quot;săn l&ugrave;ng&quot; nhiều nhất hiện nay. Sự phối hợp m&agrave;u sắc,&nbsp;<a href=\"https://balohanghieu.com/balo/balo-mot-quai\" target=\"_blank\">thiết kế một quai</a>&nbsp;đ&atilde; g&acirc;y ấn tượng về phong c&aacute;ch cho người d&ugrave;ng từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.<img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/timberland-crofton-22l-backpack-m-camo_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/Ioh_timberland-crofton-22l-backpack-m-camo_100.jpg', 22, 500000, 0, 0, 42, 20, 1, 0, NULL, '2017-12-09 09:41:48', '2017-12-09 09:41:48'),
(52, 'Balo Z', 'balo-z', 'balo z', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p><strong>Seliux M4 Sherman S Multicam</strong>&nbsp;kết hợp giữa t&ocirc;ng m&agrave;u l&iacute;nh c&ugrave;ng điếm nhấn l&agrave; logo m&agrave;u đỏ nổi bật, sắc n&eacute;t đang l&agrave; sản phẩm được d&acirc;n phượt &quot;săn l&ugrave;ng&quot; nhiều nhất hiện nay. Sự phối hợp m&agrave;u sắc,&nbsp;<a href=\"https://balohanghieu.com/balo/balo-mot-quai\" target=\"_blank\">thiết kế một quai</a>&nbsp;đ&atilde; g&acirc;y ấn tượng về phong c&aacute;ch cho người d&ugrave;ng từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/simplecarry-easy-open-3-m-black_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/iW7_simplecarry-easy-open-3-m-black_100.jpg', 22, 600000, 0, 0, 39, 15, 1, 0, NULL, '2017-12-09 09:43:38', '2017-12-09 09:43:38'),
(53, 'Balo X', 'balo-x', 'balo x', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/simplecarry-easy-open-2-m-navy-blue_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/OZv_simplecarry-easy-open-2-m-navy-blue_100.jpg', 22, 350000, 0, 0, 38, 15, 1, 0, NULL, '2017-12-09 09:45:16', '2017-12-10 03:33:46'),
(54, 'Balo N', 'balo-n', 'balo N', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/crumpler-doozie-backpack-m-navy-brown_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/B9l_crumpler-doozie-backpack-m-navy-brown_100.jpg', 22, 420000, 2, 0, 38, 15, 1, 0, NULL, '2017-12-09 09:47:26', '2017-12-10 03:34:29'),
(55, 'Balo M', 'balo-m', 'balo m', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/ikea-starttid-backpack-m-yellow_100.JPG\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/6n4_ikea-starttid-backpack-m-yellow_100.JPG', 22, 300000, 2, 0, 38, 15, 1, 0, NULL, '2017-12-09 09:49:24', '2017-12-10 03:34:29'),
(56, 'Balo L', 'balo-l', 'balo l', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/seliux-f4-phantom-ii-backpack-m-red_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/Zp0_seliux-f4-phantom-ii-backpack-m-red_100.jpg', 22, 460000, 2, 0, 42, 15, 1, 2, NULL, '2017-12-09 09:50:53', '2017-12-10 03:34:29'),
(57, 'Balo K', 'balo-k', 'balo k', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/simplecarry-h3-m-d-red-grey_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/MiF_simplecarry-h3-m-d-red-grey_100.jpg', 22, 250000, 0, 0, 40, 18, 1, 0, NULL, '2017-12-09 09:52:43', '2017-12-09 09:52:43'),
(58, 'Balo H', 'balo-h', 'balo h', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/timberland-crofton-22l-backpack-m-camo_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/9UR_kakashi-uba-04-backpack-s-in-web_100.jpg', 22, 380000, 0, 0, 38, 15, 1, 0, NULL, '2017-12-09 09:54:28', '2017-12-09 09:54:28'),
(59, 'Balo S', 'balo-s', 'balo s', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/kakashi-ladybug-backpack-s-turquoise_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/nhy_kakashi-ladybug-backpack-s-turquoise_100.jpg', 22, 400000, 0, 0, 43, 17, 1, 0, NULL, '2017-12-09 09:56:03', '2017-12-09 09:56:03'),
(60, 'Balo Q', 'balo-q', 'balo q', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/kakashi-beetle-backpack-s-yellow_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/V5o_kakashi-beetle-backpack-s-yellow_100.jpg', 22, 250000, 0, 0, 40, 17, 1, 0, NULL, '2017-12-09 09:57:41', '2017-12-09 09:57:41'),
(61, 'Balo W', 'balo-w', 'balo w', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/cabinzero-classic-36l-cz171602-backpack-m-jungle-camo-1_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/eWL_cabinzero-classic-36l-cz171602-backpack-m-jungle-camo-1_100.jpg', 22, 7000000, 0, 0, 41, 17, 1, 0, NULL, '2017-12-09 09:59:08', '2017-12-09 09:59:08'),
(62, 'Balo R', 'balo-r', 'balo r', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/cabinzero-classic-28l-cz081603-backpack-s-grey-camo-1_100.JPG\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/W6H_cabinzero-classic-28l-cz081603-backpack-s-grey-camo-1_100.JPG', 22, 800000, 0, 0, 38, 15, 1, 0, NULL, '2017-12-09 10:00:11', '2017-12-09 10:00:11'),
(63, 'Balo T', 'balo-t', 'balo T', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/mikkor-the-ives-backpack-tib-005-m-red_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/jq0_mikkor-the-ives-backpack-tib-005-m-red_100.jpg', 22, 2350000, 0, 0, 38, 19, 1, 0, NULL, '2017-12-09 10:01:59', '2017-12-09 10:01:59'),
(64, 'Balo Y', 'balo-y', 'balo y', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/herschel-city-backpack-mid-volume-10089-01144-os-l-in-web_100.jpg\" style=\"height:100px; width:100px\" /></p>', 'upload/sanpham/2017/12/9/3Oq_herschel-city-backpack-mid-volume-10089-01144-os-l-in-web_100.jpg', 22, 400000, 0, 0, 42, 17, 1, 2, NULL, '2017-12-09 10:04:34', '2017-12-09 11:10:00'),
(65, 'Balo U', 'balo-u', 'balo u', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/1500533684-seliux-f4-phantom-ii-backpack-m-red-5.jpg\" style=\"height:749px; width:750px\" /></p>', 'upload/sanpham/2017/12/9/Cb5_1500533684-seliux-f4-phantom-ii-backpack-m-red-5.jpg', 22, 350000, 0, 0, 42, 15, 1, 4, NULL, '2017-12-09 10:05:50', '2017-12-09 11:42:07'),
(66, 'Balo I', 'balo-i', 'balo i', 'dòng sản phẩm balo thời trang, kiểu dáng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ là một sự lựa chọn đáng tin cậy, phù hợp với nhiều đối tượng người sử dụng bởi', '<p>d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi&nbsp;d&ograve;ng sản phẩm balo thời trang, kiểu d&aacute;ng hiện đại của thương hiệu Crumpler. Balo Crumpler sẽ l&agrave; một sự lựa chọn đ&aacute;ng tin cậy, ph&ugrave; hợp với nhiều đối tượng người sử dụng bởi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/upload/sanpham/images/abc/a2/eastpak-wyoming-ek81166n-m-dalston-rose_100.jpg\" style=\"height:101px; width:101px\" /></p>', 'upload/sanpham/2017/12/9/06f_eastpak-wyoming-ek81166n-m-dalston-rose_100.jpg', 22, 650000, 0, 0, 43, 18, 1, 4, NULL, '2017-12-09 10:07:15', '2017-12-09 13:29:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `anh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `anh`, `href`, `created_at`, `updated_at`) VALUES
(21, 'upload/slide/2017/12/9/O6j_slide-balo-tui-xach.jpg', 'http://localhost:8000/balo-nam/loai-a.html', '2017-12-09 05:59:22', '2017-12-09 05:59:22'),
(22, 'upload/slide/2017/12/9/Wji_Slide 1(1).jpg', 'http://localhost:8000/', '2017-12-09 05:59:52', '2017-12-09 05:59:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socialprovider`
--

CREATE TABLE `socialprovider` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_id_kh_foreign` (`id_kh`),
  ADD KEY `binhluan_id_sp_foreign` (`id_sp`);

--
-- Chỉ mục cho bảng `caidat`
--
ALTER TABLE `caidat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_id_sp_foreign` (`id_sp`),
  ADD KEY `chitietdonhang_id_dh_foreign` (`id_dh`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietphieunhap_id_sp_foreign` (`id_sp`),
  ADD KEY `chitietphieunhap_id_pn_foreign` (`id_pn`);

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id_kh_foreign` (`id_kh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisanpham_id_cm_foreign` (`id_cm`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieunhap_id_ncc_foreign` (`id_ncc`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quangcao_id_kh_foreign` (`id_kh`),
  ADD KEY `quangcao_id_qc_foreign` (`id_qc`);

--
-- Chỉ mục cho bảng `quanliquangcao`
--
ALTER TABLE `quanliquangcao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_tacgia_foreign` (`tacgia`),
  ADD KEY `sanpham_id_loai_foreign` (`id_loai`),
  ADD KEY `sanpham_id_ncc_foreign` (`id_ncc`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `socialprovider`
--
ALTER TABLE `socialprovider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `caidat`
--
ALTER TABLE `caidat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `quanliquangcao`
--
ALTER TABLE `quanliquangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `socialprovider`
--
ALTER TABLE `socialprovider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_id_kh_foreign` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_id_dh_foreign` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_id_pn_foreign` FOREIGN KEY (`id_pn`) REFERENCES `phieunhap` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphieunhap_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_id_kh_foreign` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_id_cm_foreign` FOREIGN KEY (`id_cm`) REFERENCES `chuyenmuc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_id_ncc_foreign` FOREIGN KEY (`id_ncc`) REFERENCES `nhacungcap` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD CONSTRAINT `quangcao_id_kh_foreign` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `quangcao_id_qc_foreign` FOREIGN KEY (`id_qc`) REFERENCES `quanliquangcao` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_loai_foreign` FOREIGN KEY (`id_loai`) REFERENCES `loaisanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_id_ncc_foreign` FOREIGN KEY (`id_ncc`) REFERENCES `nhacungcap` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_tacgia_foreign` FOREIGN KEY (`tacgia`) REFERENCES `nguoidung` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
