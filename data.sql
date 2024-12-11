-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2024 at 05:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_san_pham` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `id_binh_luan` int NOT NULL,
  `danh_gia` int NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `thoi_gian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int NOT NULL,
  `id_tai_khoan` int DEFAULT '0',
  `ten_don_hang` varchar(255) NOT NULL,
  `dia_chi_don_hang` varchar(255) NOT NULL,
  `so_dien_thoai_don_hang` varchar(50) NOT NULL,
  `email_don_hang` varchar(100) NOT NULL,
  `thanh_toan_don_hang` int NOT NULL DEFAULT '1' COMMENT '1.Thanh toán trực tiếp 2.Chuyển khoản 3.Thanh toán online	',
  `tong_tien_don_hang` int NOT NULL DEFAULT '0',
  `trang_thai_don_hang` int DEFAULT '0' COMMENT '0.Đơn hàng mới 1.Đang chờ 2.Đang giao hàng 3.Đã giao hàng',
  `ten_nhan` varchar(255) DEFAULT NULL,
  `dia_chi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `so_dien_thoai_nhan` varchar(10) DEFAULT NULL,
  `ngay_dat_hang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_tai_khoan`, `ten_don_hang`, `dia_chi_don_hang`, `so_dien_thoai_don_hang`, `email_don_hang`, `thanh_toan_don_hang`, `tong_tien_don_hang`, `trang_thai_don_hang`, `ten_nhan`, `dia_chi_nhan`, `so_dien_thoai_nhan`, `ngay_dat_hang`) VALUES
(27, 3, 'admin', 'Bắc Giang', '0582883633', 'giapvietkhoa@gmail.com', 1, 2460, 0, 'admin', 'Bắc Giang', '0582883633', '04:42:19pm 11/12/2024'),
(28, 6, '1111', 'sdsgsegseg', '0582883655', 'giapvietkhoa1@gmail.com', 1, 1000, 0, '1111', 'sdsgsegseg', '0582883655', '04:43:59pm 11/12/2024'),
(29, 6, '1111', 'Bắc Giang', '0582883655', 'giapvietkhoa1@gmail.com', 1, 1000, 0, '1111', 'Bắc Giang', '0582883655', '04:51:22pm 11/12/2024');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gio_hang` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1',
  `ten_san_pham` varchar(255) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `gia` varchar(255) NOT NULL,
  `thanhtien` int NOT NULL,
  `id_don_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_gio_hang`, `id_tai_khoan`, `id_san_pham`, `so_luong`, `ten_san_pham`, `hinh`, `gia`, `thanhtien`, `id_don_hang`) VALUES
(29, 3, 21, 1, 'Dior Oblique Relaxed-Fit T-Shirt', '8.webp', '1000', 1000, 27),
(30, 3, 28, 1, 'T-Shirt', '22.webp', '1460', 1460, 27),
(31, 6, 21, 1, 'Dior Oblique Relaxed-Fit T-Shirt', '8.webp', '1000', 1000, 28),
(32, 6, 21, 1, 'Dior Oblique Relaxed-Fit T-Shirt', '8.webp', '1000', 1000, 29);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `mo_ta` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gia` varchar(255) NOT NULL,
  `id_danh_muc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `hinh`, `mo_ta`, `gia`, `id_danh_muc`) VALUES
(14, 'Dior Oblique Hooded Sweatshirt', '1.webp', 'The Dior Oblique hooded sweatshirt combines sportswear with elegance. Crafted in black cotton-blend jersey, it is distinguished by an allover quilted Dior Oblique motif and relaxed fit. The sweatshirt can be teamed with jeans or track pants.\r\n', '1250', 1),
(15, 'Dior Charm T-Shirt, Relaxed Fit', '2.webp', 'The Dior Charm T-shirt revisits the iconic Dior signature with a graphic design. Crafted in white cotton jersey, it is distinguished by a contrasting Dior Charm patch on the chest and relaxed fit. The T-shirt will pair well with wide-leg Bermuda shorts for a summery look.', '1000', 1),
(16, 'Dior Archives Labels T-Shirt, Relaxed Fit', '3.webp', 'The T-shirt features a Dior Archives Labels signature with a 3D-printed variation on the Houses tags. Crafted in white cotton jersey, it is distinguished by a flocked signature on the chest and relaxed fit. The T-shirt will be a perfect match for wide-leg Bermuda shorts.', '1000', 1),
(17, 'CD Icon Relaxed-Fit T-Shirt, Relaxed Fit', '4.webp', 'The white T-shirt is a timeless and relaxed piece. Crafted in compact cotton jersey, it is embellished with a tonal CD Icon embroidery on the chest. The style has a relaxed fit with a ribbed crew neck and pairs easily with any jeans or sportswear attire.', '890', 1),
(18, 'Christian Dior Couture T-Shirt', '5.webp', 'The T-shirt is crafted in black slub cotton jersey. It is adorned with a gray Christian Dior Couture print on the chest and features a distressed effect. The relaxed fit and ribbed crew neck will make the T-shirt easy to pair with any jeans or casual attire.\r\n', '1350', 1),
(19, 'Christian Dior Couture Polo Shirt', '6.webp', 'The polo shirt offers a fresh variation of a House staple. Made in black virgin wool jersey, it is adorned with a tonal Christian Dior Couture embroidery on the chest, while ribbed knit detailing accents the collar and sleeves. The timeless polo shirt will elevate casual and Modern Tailoring looks alike.\r\n', '1800', 1),
(20, 'Dior Oblique Polo Shirt', '7.webp', 'The knit polo shirt highlights the House is hallmark Dior Oblique motif. Crafted in beige, blue and black cotton jacquard, the design has a straight cut, completed by a button closure and ribbed detailing. The polo shirt will elevate any outfit with a graphic touch.\r\n', '1450', 1),
(21, 'Dior Oblique Relaxed-Fit T-Shirt', '8.webp', 'The navy blue terry cotton T-shirt pays tribute to the hallmark Dior Oblique motif with a tonal jacquard. The ribbed crew neck has a V-topstitching detail for a casual effect. The relaxed T-shirt may be paired with jeans or track pants for an elevated look.\r\n', '1000', 1),
(22, 'Embroidered T-Shirt', '11.webp', 'The white cotton and linen jersey T-shirt is embroidered with Pietro Ruffo is Dior Around the World motif in gold-tone metallic thread, showcasing a star decorated with flowers in honor of Scottish heritage, the collection is hallmark theme. The classic crew neck design is embellished with a bee and CD signature on the back. The T-shirt can be worn with other Dior Around the World creations.\r\n', '1680', 2),
(23, 'T-Shirt', '22.webp', 'The white cotton and linen jersey T-shirt features Pietro Ruffo is black Dior Cabinet de Curiosités motif, showcasing the lion and a multitude of animals within a floral design. The classic crew neck silhouette is embellished with silver-finish metal stud detailing on the front, as well as the Christian Dior signature on the back. The T-shirt can be worn with other Dior Cabinet de Curiosités creations.\r\n', '1460', 2),
(24, 'T-Shirt', '33.webp', 'The T-shirt in white cotton and linen jersey features Pietro Ruffo is black Toile de Jouy Scotland motif, capturing the essence of the collection is Scottish inspiration by showcasing Scottish folklore through emblematic animals, historic symbols and castles. The classic crew-neck design is elevated by the bee and CD signature on the back. The T-shirt can be paired with other Toile de Jouy Scotland creations.\r\n', '1220', 2),
(25, 'Polo Shirt', '44.jpg', 'The polo shirt is an elegant creation with sportswear details. Crafted in white cotton jersey, the design is embellished with a navy blue contrasting band with the Christian Dior signature on the front. The polo shirt can be paired with other Dioriviera creations.\r\n', '1460', 2),
(26, 'T-Shirt', '55.webp', 'The T-shirt is an elegant creation with sportswear appeal. Crafted in white cotton jersey, the design is embellished with a navy blue contrasting band with the Christian Dior signature on the front. The garment may be coordinated with other Dioriviera creations.\r\n', '1190', 2),
(27, 'Tank Top', '66.jpg', 'The white ribbed cotton jersey tank top is a timeless piece. Its fitted silhouette features the hallmark black embroidered bee and CD signature on the front, thin straps and the Christian Dior Paris signature on the back. The tank top will pair with any attire throughout the seasons.\r\n', '1190', 2),
(28, 'T-Shirt', '22.webp', 'The white cotton and linen jersey T-shirt features Pietro Ruffo is black Dior Cabinet de Curiosités motif, showcasing the lion and a multitude of animals within a floral design. The classic crew neck silhouette is embellished with silver-finish metal stud detailing on the front, as well as the Christian Dior signature on the back. The T-shirt can be worn with other Dior Cabinet de Curiosités creations.\r\n', '1460', 2),
(29, 'Embroidered T-Shirt', '77.webp', 'The T-shirt is a refined creation demonstrating the House is exceptional savoir-faire. Crafted in ecru cotton and linen jersey, the classic design is embellished with embroidered beadwork at the neckline. The T-shirt can be paired with any wardrobe piece for an elegant look.\r\n', '2960', 2),
(30, 'Dior Hit the Road Messenger Bag with Flap', '111.webp', 'The messenger bag with flap expands the Dior Hit the Road line with a modern design that embodies the House is couture spirit. Displaying the virtuosity of the Dior ateliers, the gradient Dior Gravity leather showcases the iconic motif delicately embossed on calfskin. A subtle interplay of gray and black hues is created using a hand-sprayed technique. Featuring a flap with aluminum CD mini buckles and two Christian Dior nylon jacquard straps, the style has a spacious compartment to accommodate essentials, as well as an adjustable shoulder strap. The practical bag will add the finishing touch to casual attire.\r\n', '4600', 3),
(31, 'Small Saddle Messenger Bag with Flap', '222.webp', 'The Saddle messenger bag is a compact and modern creation. Crafted in black Dior Oblique jacquard, it features a tonal grained calfskin Saddle flap enhanced by an aluminum buckle. Its spacious interior is completed by a rear slip pocket to house all the essentials. Thanks to its adjustable leather and Christian Dior jacquard strap, the small style can be worn over the shoulder or crossbody.\r\n', '2840', 3),
(32, 'Rider Backpack', '333.webp', 'The Rider backpack has a pared-down silhouette, reminiscent of a classic school backpack. The modernized design is crafted in black jacquard covered with the Dior Oblique motif. A two-way zip closure, a large zip pocket in front as well as adjustable padded straps are key details that make this a quintessential bag for daily use.\r\n', '3380', 3),
(34, 'Saddle Card Holder', '444.webp', 'The Saddle card holder is a refined accessory that demonstrates the House is savoir-faire in leather marquetry. Crafted in navy blue grained calfskin and Dior Oblique jacquard, highlighting the iconic Saddle lines, it features three card slots on either side and a central slot on the top for personal effects. Further embellished with a Dior signature on the front, the elegant card holder will slip easily into any pocket.\r\n', '500', 3),
(35, 'Christian Dior Couture Baseball Cap', '555.webp', 'The baseball cap presents a timeless silhouette. Crafted in black cotton canvas, it boasts a tonal Christian Dior Couture embroidery on the front. The modern and relaxed cap will elevate any casual outfit.\r\n', '860', 3),
(36, 'Dior Oblique Ring', '666.webp', 'The luminous silver ring showcases the House is iconic Dior Oblique motif engraved on its surface. The wide design unveils a contemporary look and stylish silhouette. The ring can be worn with other Dior Oblique pieces from the collection.\r\n', '600', 3),
(37, 'Dior Oblique Bangle Set', '777.jpg', 'New for Spring 2025, the bangle set is distinguished by its hallmark details. One bracelet, crafted in ruthenium-finish brass, showcases the engraved Dior Oblique motif, while the other features a streamlined design in silver-finish brass enhanced by the openwork CD Icon signature. The bangle set can be paired with other Dior Oblique creations to complete the look.\r\n', '790', 3),
(38, 'Cannage Chain Link Necklace', '888.webp', 'New for Spring 2025, the silver necklace pays homage to House codes. The chain links create a modern silhouette, punctuated by plates engraved with the Cannage motif. An adjustable clasp embellished with the Dior signature allows it to be worn at different lengths. The necklace can be coordinated with the bracelet to complete the look.\r\n', '2000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tai_khoan` int NOT NULL,
  `ten_dang_nhap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dia_chi` text,
  `vai_tro` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tai_khoan`, `ten_dang_nhap`, `mat_khau`, `email`, `so_dien_thoai`, `dia_chi`, `vai_tro`) VALUES
(1, 'giapvietkhoa', '1', 'giapvietkhoa@gmail.com', '0582883633', 'Bắc Giang', 1),
(3, 'admin', '1', 'giapvietkhoa@gmail.com', '0582883633', 'Bắc Giang', 0),
(4, 'admin1', '1', 'giapvietkhoa@gmail.com', '0582883633', 'Bắc Giang', 0),
(6, '1111', '1', 'giapvietkhoa1@gmail.com', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `binhluan_sanpham` (`id_san_pham`),
  ADD KEY `binhluan_taikhoan` (`id_tai_khoan`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `donhang_taikhoan` (`id_tai_khoan`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gio_hang`),
  ADD KEY `giohang_taikhoan` (`id_tai_khoan`),
  ADD KEY `giohang_sanpham` (`id_san_pham`),
  ADD KEY `giohang_donhang` (`id_don_hang`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `lk_sanpham_danhmuc` (`id_danh_muc`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tai_khoan`),
  ADD UNIQUE KEY `uni` (`ten_dang_nhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binh_luan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gio_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tai_khoan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binhluan_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `binhluan_taikhoan` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id_tai_khoan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `donhang_taikhoan` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id_tai_khoan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `giohang_donhang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `giohang_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `giohang_taikhoan` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id_tai_khoan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
