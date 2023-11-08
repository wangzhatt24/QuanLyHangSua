-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2021 at 09:30 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Table structure for table `hang_sua`
--

CREATE TABLE `hang_sua` (
  `MAHS` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TENHS` varchar(20) collate utf8_unicode_ci default NULL,
  `DIACHI` varchar(50) collate utf8_unicode_ci default NULL,
  `DIENTHOAI` varchar(10) collate utf8_unicode_ci default NULL,
  `EMAIL` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MAHS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_sua`
--

INSERT INTO `hang_sua` (`MAHS`, `TENHS`, `DIACHI`, `DIENTHOAI`, `EMAIL`) VALUES
('AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', '8456321478', 'abbott@ab.com'),
('DL', 'Dutch Lady', 'Khu công nghiệp Biên Hòa - Đông Nai', '8463215698', 'dutchlady@dl.com'),
('DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '8465932156', 'dumex@dm.com'),
('DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương ', '8446632178', 'daisy@ds.com'),
('MJ', 'Mead JohnSon', 'Công ty nhập khẩu Việt Nam', '8462314569', 'meadjohn@mj.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '8465931256', 'nutifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP. HCM', '8452613987', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MAKH` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TENKH` varchar(50) collate utf8_unicode_ci default NULL,
  `GIOITINH` tinyint(1) default NULL,
  `DIACHI` varchar(100) collate utf8_unicode_ci default NULL,
  `SDT` varchar(10) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MAKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`MAKH`, `TENKH`, `GIOITINH`, `DIACHI`, `SDT`) VALUES
('kh001', 'Khuất Thùy Dương ', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '8456321025'),
('kh002', 'Đỗ Lâm Thiên', 0, '357 Lê Hồng Phong Q.10', '8456321025'),
('kh003', 'Phạm Thị Nhung', 1, '56 Đinh Tiên Hoàng quận 1', '8456987120'),
('kh004', 'Nguyễn Khắc Thiện', 0, '12bis Đường 3-2 quận 10', '8469632102'),
('kh005', 'Tô Trần Hồ Giảng', 0, '75 Nguyễn Kiệm quận Gò Vấp', '8456987532'),
('kh006 ', 'Nguyễn Kiến Thi', 1, '357 Lê Hồng Phong Q.10', '8465231057'),
('kh008', 'Nguyễn Anh Tuấn', 0, '1/2bis Nơ Trang Long Q.BT TP. HCM', '8456321047');

-- --------------------------------------------------------

--
-- Table structure for table `thong_tin_sua`
--

CREATE TABLE `thong_tin_sua` (`MAHS` varchar(10) collate utf8_unicode_ci default NULL,
  `TENSUA` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LOAISUA` varchar(20) collate utf8_unicode_ci default NULL,
  `TRONGLUONG` int(11) default NULL,
  `DONGIA` double default NULL,
  `ANHSUA` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`TENSUA`),
  KEY `MAHS` (`MAHS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thong_tin_sua`
--

INSERT INTO `thong_tin_sua` (`MAHS`, `TENSUA`, `LOAISUA`, `TRONGLUONG`, `DONGIA`, `ANHSUA`) VALUES
('VNM', 'Sữa Bột Dielac Grow ', 'Sữa non', 1400, 523.534, 'grow-plus-sua-non-1.jpg'),
('DM', 'Sữa bột Dumex Gold 3', 'Sữa bột', 1500, 661.123, '6CxrwovdGnqa.jpg'),
('DL', 'Sữa bột Fresland Cam', 'Sữa bột', 850, 199.123, '40f757727a2749e24d34a0560dbc4043_tn.jfif'),
('MJ', 'Sữa EnfaGrow A', 'Sữa bột', 900, 470.976, '500_fw__sua-enfa-grow-3-870g.jpg'),
('NTF', 'Sữa Famna số 1 ', 'Sữa bột', 400, 260.271, 'sua-famna-so-1-400g-250x250.jpg'),
('AB', 'Sữa similac neosure ', 'Sữa bột', 371, 395.435, 'dedcee52972f0550706f059de4d9ed66_tn.jfif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thong_tin_sua`
--
ALTER TABLE `thong_tin_sua`
  ADD CONSTRAINT `thong_tin_sua_ibfk_1` FOREIGN KEY (`MAHS`) REFERENCES `hang_sua` (`MAHS`) ON DELETE CASCADE ON UPDATE CASCADE;