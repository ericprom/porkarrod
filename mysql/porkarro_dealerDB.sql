-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2016 at 07:45 AM
-- Server version: 5.6.29
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porkarro_dealerDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 1, NULL, NULL),
(2, 'Honda', 1, NULL, NULL),
(3, 'Nissan', 1, NULL, NULL),
(4, 'Mitsubishi', 1, NULL, NULL),
(5, 'Isuzu', 1, NULL, NULL),
(6, 'Benz', 1, NULL, NULL),
(7, 'BMW', 1, NULL, NULL),
(8, 'Mazda', 1, NULL, NULL),
(9, 'Ford', 1, NULL, NULL),
(10, 'Chevrolet', 1, NULL, NULL),
(11, 'Volvo', 1, NULL, NULL),
(12, 'Alfa Romeo', 1, NULL, NULL),
(13, 'Aston Martin', 1, NULL, NULL),
(14, 'Audi', 1, NULL, NULL),
(15, 'Austin', 1, NULL, NULL),
(16, 'Bentley', 1, NULL, NULL),
(17, 'Cadillac', 1, NULL, NULL),
(18, 'Chrysler', 1, NULL, NULL),
(19, 'Citroen', 1, NULL, NULL),
(20, 'Daewoo', 1, NULL, NULL),
(21, 'Daihatsu', 1, NULL, NULL),
(22, 'DFM', 1, NULL, NULL),
(23, 'Ferrari', 1, NULL, NULL),
(24, 'Fiat', 1, NULL, NULL),
(25, 'GMC', 1, NULL, NULL),
(26, 'Hummer', 1, NULL, NULL),
(27, 'Hyundai', 1, NULL, NULL),
(28, 'Jaguar', 1, NULL, NULL),
(29, 'Jeep', 1, NULL, NULL),
(30, 'Kia', 1, NULL, NULL),
(31, 'Lamborghini', 1, NULL, NULL),
(32, 'Lancia', 1, NULL, NULL),
(33, 'Land Rover', 1, NULL, NULL),
(34, 'Lexus', 1, NULL, NULL),
(35, 'Lotus', 1, NULL, NULL),
(36, 'Maserati', 1, NULL, NULL),
(37, 'MG', 1, NULL, NULL),
(38, 'Mini', 1, NULL, NULL),
(39, 'Opel', 1, NULL, NULL),
(40, 'Peugeot', 1, NULL, NULL),
(41, 'Porsche', 1, NULL, NULL),
(42, 'Proton', 1, NULL, NULL),
(43, 'Renault', 1, NULL, NULL),
(44, 'Rolls-Royce', 1, NULL, NULL),
(45, 'Rover', 1, NULL, NULL),
(46, 'SAAB', 1, NULL, NULL),
(47, 'Skoda', 1, NULL, NULL),
(48, 'Smart', 1, NULL, NULL),
(49, 'Ssangyong', 1, NULL, NULL),
(50, 'Subaru', 1, NULL, NULL),
(51, 'Suzuki', 1, NULL, NULL),
(52, 'Tesla', 1, NULL, NULL),
(53, 'Volkswagen', 1, NULL, NULL),
(54, 'ยี่ห้ออื่นๆ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gear` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `repair` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `bought_at` date NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `cash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_at` date DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `title`, `brand_id`, `model_id`, `type_id`, `year`, `gear`, `color`, `license`, `detail`, `budget`, `repair`, `price`, `owner`, `bought_at`, `sold`, `cash`, `commission`, `sold_at`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ขาย TOYOTA CAMRY, CAMRY 2.4 G โฉม ปี07', 1, 10, NULL, '2007', 1, 'น้ำตาล', 'ชญ 7412', 'ขาย TOYOTA CAMRY, CAMRY 2.4 G โฉม ปี07\n\nปี2007 สีน้ำตาล\nทะเบียน ชย 7412 กรุงเทพฯ\nเครือง 2400\nเกียร์ออโต้\nวิทยุ CD MP3\nABS AIRBAG\nภายในลายไม้\nเบาะหนังแท้\nกระจก ปรับไฟฟ้า\nพวงมาลัยพาวเวอร์	\nไฟตัดหมอก	\nเซ็นเซอร์ถอยหลัง 4 จุด\nเอกสารพร้อมโอน\n\nราคา 488,000 บาท\n\nกรณีจัดไฟแนนซ์ เอกสารที่ต้องใช้\n1. สำเนาบัตรประชาชน\n2. สำเนาทะเบียนบ้าน\n3. สลิปเงินเดือน หรือ หนังสือรับรองเงินเดือน\n4. สมุดบัญชีเงินฝากย้อนหลัง 6 เดือน หรือสเตทเม้น\n5. แผนที่บ้านพักและที่ทำงานปัจจุบัน\n6.รอ 1-3 วันรู้ผล\n\n:: สนใจติดต่อ ::\nTel ::  0875588500 \n Line ID ::  tor9771', '425000', '0', '488000', 2, '2016-08-01', 0, NULL, NULL, NULL, 1, '2016-08-01 04:04:18', '2016-08-01 04:13:42'),
(2, 'HONDA CIVIC FD 09   1.8  E AS', 2, 96, NULL, '2009', 1, 'ดำ', 'ฌศ 7080', 'HONDA CIVIC FD 09   1.8  E AS\n\nทะเบียน ฌศ 7080\nเครื่อง 1.8\nเกียร์ออโต้ \nไมล์ 9 หมื่นกว่าโล\nABS/Arback 2 ใบ\nวิทยุ 2 Din\nฟิล์มเขียว\nล้อแม็ค 17 ยาง 215/45/zr17 ยางดอกเพียบ ปี 15\nเบาะหนัง ดำด้ายแดง (ใหม่)\nค้ำโช๊คหน้า\nกล่อง e drive\nท่อแต่ง\nซับเฟรม (ตัวแต่งสวย)\nแบ็ต(ใหม่)\nยางแท่นเครื่อง(ใหม่)\nยางแท่นเกียร์(ใหม่)\n\nราคา 408000 ปรับราคา จัดแนนซ์ได้เต็ม\n\n!!! หมายเหตุเงื่อนไข  ผู้เช่าชื้อไม่ติดประวัติเครดิต !!!\n## เตรียมเอกสารนะครับ ##\nสำเนาบัตรประชาชน 3 ชุด\nสำเนาทะเบียนบ้าน  3 ชุด\nสลิปเงินเดือนย้อนหลัง 3 เดือน\nสเตสเม้นย้อนหลัง 6 เดือน \n\n////\\\\\\\\ สนใจติดต่อ  ////\\\\\\\\\n\n', '360000', '0', '408000', 2, '2016-08-04', 0, NULL, NULL, NULL, 1, '2016-08-03 19:20:32', '2016-08-03 19:20:32'),
(3, 'HONDA CITY สีขาว รุ่น V AS ปี 2011 เครื่อง 1.5', 2, 95, NULL, '2011', 1, 'ขาว', 'ญน 4978', 'HONDA CITY สีขาว รุ่น V AS ปี 2011 เครื่อง 1.5  \nทะเบียน ญน 4978\nเครื่อง 1.5 เบนซิน \nไมล์ 170000 กว่าโล\nABS/Arback 2 ใบ\nวิทยุ 2 Din\nเกียร์ออโต้ \nเบาะหนังสีครีม\nไฟตัดหมอก\nล้อแม็ค 15 ยางดอกเพียบ\n\nราคา 388000 ปรับราคา จัดแนนซ์ได้เต็ม\n\n!!! หมายเหตุเงื่อนไข  ผู้เช่าชื้อไม่ติดประวัติเครดิต !!!\n\n## เตรียมเอกสารนะครับ ##\n\nสำเนาบัตรประชาชน 3 ชุด\nสำเนาทะเบียนบ้าน  3 ชุด\nสลิปเงินเดือนย้อนหลัง 3 เดือน\nสเตสเม้นย้อนหลัง 6 เดือน \n\n--------------------------------------\nสนใจติดต่อ \n', '330000', '0', '388000', 2, '2016-08-04', 0, NULL, NULL, NULL, 1, '2016-08-03 19:26:50', '2016-08-03 19:30:38'),
(4, 'NISSAN TEANA โฉมปี (09-13) 200 XL  ปี 09', 3, 170, NULL, '2009', 1, 'ขาว', 'ญท 1275', 'NISSAN TEANA โฉมปี (09-13) 200 XL  ปี 09 \n\nทะเบียน ญท 1275\nเครื่อง 2.0 เบนซิน \nไมล์ 100000 กว่าโล\nเกียร์ AUTO \nมีNavigation \nABS/Arback 2 ใบ\nวิทยุ 2 Din\nเบาะหนังสีครีม\nไฟตัดหมอก\nล้อแม็ค 18 ยางดอกเพียบ\n\nราคา 518000 ปรับราคา จัดแนนซ์ได้เต็ม\n\n!!! หมายเหตุเงื่อนไข  ผู้เช่าชื้อไม่ติดประวัติเครดิต !!!\n\n## เตรียมเอกสารนะครับ ##\n\nสำเนาบัตรประชาชน 3 ชุด\nสำเนาทะเบียนบ้าน  3 ชุด\nสลิปเงินเดือนย้อนหลัง 3 เดือน\nสเตสเม้นย้อนหลัง 6 เดือน \n\n--------------------------------------\nสนใจติดต่อ \n', '430000', '0', '518000', 2, '2016-08-04', 0, NULL, NULL, NULL, 1, '2016-08-03 19:30:18', '2016-08-03 19:30:18'),
(5, 'Toyota Yaris MC 2012 E สีขาว ปี 12', 1, 86, NULL, '2012', 1, 'ขาว', 'ฆฌ 4819', 'Toyota Yaris MC 2012 E สีขาว ปี 12\n\nทะเบียน  ฆฌ 4819\nไมล์ 65,xxx กม\nเกียร์ ออโต้\nABS/AirBack 2  ใบ\nล้อ Project D 15 195/55/15\nค้ำหน้า\nค้ำล่าง ซับเฟรม\nX bar\nกราววาย 6 จุด\nวันรอบ  3 ตัว\nกล่อง Pivot Mega RAIZIN กล่องม่วง\n2 Din Pioneer\nท่อ Hyper\nหูลากหน้า\nโช๊คหน้าสตรัสปรับเกลียว+สปริงโหลด\nไฟหน้าโปรเจ็คเตอร์ ซีน่อน\nไฟตัดหมอก\n\nราคา 378000 ปรับราคา จัดแนนซ์ได้ 350000\n\n!!! หมายเหตุเงื่อนไข  ผู้เช่าชื้อไม่ติดประวัติเครดิต !!!\n\n## เตรียมเอกสารนะครับ ##\n\nสำเนาบัตรประชาชน 3 ชุด\nสำเนาทะเบียนบ้าน  3 ชุด\nสลิปเงินเดือนย้อนหลัง 3 เดือน\nสเตสเม้นย้อนหลัง 6 เดือน \n\n--------------------------------------\nสนใจติดต่อ \n', '310000', '65000', '378000', 2, '2016-08-04', 0, NULL, NULL, NULL, 1, '2016-08-03 19:42:30', '2016-08-03 19:42:30'),
(6, 'BMW 520d E60  ปี  08', 7, 275, NULL, '2008', 1, 'เทา', 'ฌน 3894', 'BMW 520d  08 ปลายปี งดงาม\n\nทะเบียน ฌน 3894\npush start \nเครื่อง ดีเซล 2.0\nม่านหลัง\nม่านข้าง\nภายใน สวยกริ๊ป\n\n\nดูรถถูกใจ ต่อหน้ารถเลยครัชช เอาจริงจัดให้ \nพ่อค้าหลังไมล์มาครับ\n\nสนใจสอบถามข้อมูลได้ที่\nT. 0875588500\nLine tor9771\n\n‪#‎เงื่อนไขการจัดไฟแน้น‬\n- ผู้ซื้อต้องมีอายุ 20 ปี บริบูรณ์\n- ต้องมีอายุงาน 1 ปีขึ้นไป\n- รายได้รับรวม ควรเป็น 2 เท่าของค่างวดรถ\n- ต้องไม่ติดแบล็คลิส\n- คนค้ำ 1 คน (ติดแบล็คลิสค้ำได้)\n‪#‎เอกสารการจัดไฟแน้น‬\n- สำเนาบัตรประชาชน 3\n- สำเนาทะเบียนบ้าน 3\n- สลิปเงินเดือนย้อนหลัง 3 เดือน \n- สเตสเม้นธนาคารย้อนหลัง 6 เดือน\n- คนค้ำประกันใช้เอกสารเหมือนผู้ซื้อทุกประการ\n\n#รถมือสอง #รถมือสองฟรีดาวน์ #รถมือสองราคาถูก #รถมือสองรถบ้าน #ซื้อรถมือสอง #รถบ้าน #จัดไฟแนนซ์รถบ้าน #รถยนต์ฟรีดาวส์ #รถบ้านฟรีดาวส์ #รถสวยราคาถูก #ซื้อขายรถยนต์มือสอง #ขายรถ #รถสวย #ขายแล้ว #รถวันนี้ #usecar #ณนคร  #NanakornLeasing', '730000', '0', '789000', 2, '2016-08-05', 0, NULL, NULL, NULL, 1, '2016-08-04 23:37:03', '2016-08-04 23:37:03'),
(7, 'Fotuner 2.7 V เกียร ออโต้ ปี 2009', 1, 25, NULL, '2009', 1, 'น้ำตาล', 'ฌฟ 164', 'Fotuner 2.7 V เกียร ออโต้ ปี 2009\n\nทะเบียน ฌฟ 164\nเครื่องยนต์ 2700 เบนซิน + LPG (ไม่ลงเล่ม)\nไมล์ 124,xxx กม\nเกียร์ ออโต้\nAIRBAG คู่ เบรค ABS\nล้อแม็ค 16\nในเบาะหนังปรับไฟฟ้า\nคอนโซลลายไม้ \nไฟฟ้าทุกจุดครบ\nแอร์เพดานเย็นหนาว\n\n\nราคา 588000 ปรับราคา จัดแนนซ์ได้ 550000\n\n!!! หมายเหตุเงื่อนไข  ผู้เช่าชื้อไม่ติดประวัติเครดิต !!!\n\n## เตรียมเอกสารนะครับ ##\n\nสำเนาบัตรประชาชน 3 ชุด\nสำเนาทะเบียนบ้าน  3 ชุด\nสลิปเงินเดือนย้อนหลัง 3 เดือน\nสเตสเม้นย้อนหลัง 6 เดือน \n\n--------------------------------------\nสนใจติดต่อ \nTel ::  0875588500\nLine ::  tor9771\n\n\n#รถมือสอง #รถมือสองฟรีดาวน์ #รถมือสองราคาถูก #รถมือสองรถบ้าน #ซื้อรถมือสอง #รถบ้าน #จัดไฟแนนซ์รถบ้าน #รถยนต์ฟรีดาวส์ #รถบ้านฟรีดาวส์ #รถสวยราคาถูก #ซื้อขายรถยนต์มือสอง #ขายรถ #รถสวย #ขายแล้ว #รถวันนี้ #useca #fortuner', '460000', '0', '588000', 2, '2016-08-05', 0, NULL, NULL, NULL, 1, '2016-08-05 01:51:47', '2016-08-05 02:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) NOT NULL,
  `car_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `car_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2016-08-03 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `sender_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipient_id` int(10) UNSIGNED NOT NULL,
  `recipient_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(11) NOT NULL,
  `investor_id` int(11) NOT NULL,
  `share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bonus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_04_095300_create_friendships_table', 1),
('2016_07_05_065414_create_brands_table', 1),
('2016_07_05_065606_create_models_table', 1),
('2016_07_12_062742_create_roles_table', 1),
('2016_07_12_063344_create_investors_table', 1),
('2016_07_14_053642_create_cars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `title`, `brand_id`, `active`, `created_at`, `updated_at`) VALUES
(1, '4RUNNER', 1, 1, NULL, NULL),
(2, '86GT', 1, 1, NULL, NULL),
(3, 'ALPHARD', 1, 1, NULL, NULL),
(4, 'ALTEZZA', 1, 1, NULL, NULL),
(5, 'ALTIS', 1, 1, NULL, NULL),
(6, 'ARISTO', 1, 1, NULL, NULL),
(7, 'AVANZA', 1, 1, NULL, NULL),
(8, 'BB', 1, 1, NULL, NULL),
(9, 'CALDINA', 1, 1, NULL, NULL),
(10, 'CAMRY', 1, 1, NULL, NULL),
(11, 'CARIB', 1, 1, NULL, NULL),
(12, 'CARINA', 1, 1, NULL, NULL),
(13, 'CAVALIER', 1, 1, NULL, NULL),
(14, 'CELICA', 1, 1, NULL, NULL),
(15, 'CENTURY', 1, 1, NULL, NULL),
(16, 'COMMUTER', 1, 1, NULL, NULL),
(17, 'COROLLA', 1, 1, NULL, NULL),
(18, 'CORONA', 1, 1, NULL, NULL),
(19, 'CRESSIDA', 1, 1, NULL, NULL),
(20, 'CROWN', 1, 1, NULL, NULL),
(21, 'DYNA', 1, 1, NULL, NULL),
(22, 'EMINA', 1, 1, NULL, NULL),
(23, 'ESQUIRE', 1, 1, NULL, NULL),
(24, 'ESTIMA', 1, 1, NULL, NULL),
(25, 'FORTUNER', 1, 1, NULL, NULL),
(26, 'GAIA', 1, 1, NULL, NULL),
(27, 'GLANZA', 1, 1, NULL, NULL),
(28, 'GRAND HIACE', 1, 1, NULL, NULL),
(29, 'GRANVIA', 1, 1, NULL, NULL),
(30, 'HARRIER', 1, 1, NULL, NULL),
(31, 'HIACE', 1, 1, NULL, NULL),
(32, 'HILUX HERO', 1, 1, NULL, NULL),
(33, 'HILUX MIGHTY-X', 1, 1, NULL, NULL),
(34, 'HILUX SPORT RIDER', 1, 1, NULL, NULL),
(35, 'HILUX TIGER', 1, 1, NULL, NULL),
(36, 'HILUX TIGER D4D', 1, 1, NULL, NULL),
(37, 'HILUX VIGO', 1, 1, NULL, NULL),
(38, 'HILUX VIGO D4D', 1, 1, NULL, NULL),
(39, 'INNOVA', 1, 1, NULL, NULL),
(40, 'IPSUM', 1, 1, NULL, NULL),
(41, 'IQ', 1, 1, NULL, NULL),
(42, 'IST', 1, 1, NULL, NULL),
(43, 'KLUGER', 1, 1, NULL, NULL),
(44, 'LAND CRUISER', 1, 1, NULL, NULL),
(45, 'Landcruiser Prado', 1, 1, NULL, NULL),
(46, 'LEVIN', 1, 1, NULL, NULL),
(47, 'LIACE', 1, 1, NULL, NULL),
(48, 'LITEAC', 1, 1, NULL, NULL),
(49, 'LN', 1, 1, NULL, NULL),
(50, 'LUCIDA', 1, 1, NULL, NULL),
(51, 'MARINO', 1, 1, NULL, NULL),
(52, 'MARK II', 1, 1, NULL, NULL),
(53, 'MARK X', 1, 1, NULL, NULL),
(54, 'MR-S', 1, 1, NULL, NULL),
(55, 'MR2', 1, 1, NULL, NULL),
(56, 'NOAH', 1, 1, NULL, NULL),
(57, 'PASEO', 1, 1, NULL, NULL),
(58, 'PORTE', 1, 1, NULL, NULL),
(59, 'PREVIA', 1, 1, NULL, NULL),
(60, 'PRIUS', 1, 1, NULL, NULL),
(61, 'AV 4', 1, 1, NULL, NULL),
(62, 'REGIUS', 1, 1, NULL, NULL),
(63, 'SERA', 1, 1, NULL, NULL),
(64, 'SIENNA', 1, 1, NULL, NULL),
(65, 'SOARER', 1, 1, NULL, NULL),
(66, 'SOLUNA', 1, 1, NULL, NULL),
(67, 'SPACIO', 1, 1, NULL, NULL),
(68, 'SPORT CRUISER', 1, 1, NULL, NULL),
(69, 'SPORT RIDER', 1, 1, NULL, NULL),
(70, 'SR5', 1, 1, NULL, NULL),
(71, 'STARLET', 1, 1, NULL, NULL),
(72, 'SUPER CUSTOM', 1, 1, NULL, NULL),
(73, 'SUPRA', 1, 1, NULL, NULL),
(74, 'SURF', 1, 1, NULL, NULL),
(75, 'TERCEL', 1, 1, NULL, NULL),
(76, 'TOYOPET', 1, 1, NULL, NULL),
(77, 'TUNNO', 1, 1, NULL, NULL),
(78, 'VELLFIRE', 1, 1, NULL, NULL),
(79, 'VENTURY', 1, 1, NULL, NULL),
(80, 'VIOS', 1, 1, NULL, NULL),
(81, 'VISTA', 1, 1, NULL, NULL),
(82, 'VITZ', 1, 1, NULL, NULL),
(83, 'VOLTZ', 1, 1, NULL, NULL),
(84, 'VOXY', 1, 1, NULL, NULL),
(85, 'WISH', 1, 1, NULL, NULL),
(86, 'YARIS', 1, 1, NULL, NULL),
(87, 'รุ่นอื่นๆ', 1, 1, NULL, NULL),
(88, '600', 2, 1, NULL, NULL),
(89, 'ACCORD', 2, 1, NULL, NULL),
(90, 'ADANCIER', 2, 1, NULL, NULL),
(91, 'AIRWAVE', 2, 1, NULL, NULL),
(92, 'AMAZE', 2, 1, NULL, NULL),
(93, 'ASCOT', 2, 1, NULL, NULL),
(94, 'BRIO', 2, 1, NULL, NULL),
(95, 'CITY', 2, 1, NULL, NULL),
(96, 'CIVIC', 2, 1, NULL, NULL),
(97, 'CR-V', 2, 1, NULL, NULL),
(98, 'CRX', 2, 1, NULL, NULL),
(99, 'DOMANI', 2, 1, NULL, NULL),
(100, 'DUNK', 2, 1, NULL, NULL),
(101, 'EDIX', 2, 1, NULL, NULL),
(102, 'ELYSION', 2, 1, NULL, NULL),
(103, 'FREED', 2, 1, NULL, NULL),
(104, 'HR-V', 2, 1, NULL, NULL),
(105, 'INSIGHT', 2, 1, NULL, NULL),
(106, 'INSPIRE', 2, 1, NULL, NULL),
(107, 'INTEGRA', 2, 1, NULL, NULL),
(108, 'JAZZ', 2, 1, NULL, NULL),
(109, 'LEGEND', 2, 1, NULL, NULL),
(110, 'MOBILIO', 2, 1, NULL, NULL),
(111, 'NSX', 2, 1, NULL, NULL),
(112, 'ODYSSEY', 2, 1, NULL, NULL),
(113, 'PRELUDE', 2, 1, NULL, NULL),
(114, 'S2000', 2, 1, NULL, NULL),
(115, 'STEPWGN', 2, 1, NULL, NULL),
(116, 'STREAM', 2, 1, NULL, NULL),
(117, 'TOURMASTER', 2, 1, NULL, NULL),
(118, 'VIGOR', 2, 1, NULL, NULL),
(119, 'รุ่นอื่นๆ', 2, 1, NULL, NULL),
(120, '180 SX', 3, 1, NULL, NULL),
(121, '200 SX', 3, 1, NULL, NULL),
(122, '300 ZX', 3, 1, NULL, NULL),
(123, '350Z', 3, 1, NULL, NULL),
(124, '370Z', 3, 1, NULL, NULL),
(125, 'Almera', 3, 1, NULL, NULL),
(126, 'ATLAS', 3, 1, NULL, NULL),
(127, 'IG-M', 3, 1, NULL, NULL),
(128, 'BIG-M FRONTIER 1-2', 3, 1, NULL, NULL),
(129, 'BIG-M FRONTIER NAVARA', 3, 1, NULL, NULL),
(130, 'BLUEBIRD', 3, 1, NULL, NULL),
(131, 'CARAVAN', 3, 1, NULL, NULL),
(132, 'CEDRIC', 3, 1, NULL, NULL),
(133, 'CEFIRO', 3, 1, NULL, NULL),
(134, 'CIMA', 3, 1, NULL, NULL),
(135, 'CUBE', 3, 1, NULL, NULL),
(136, 'DATSUNS', 3, 1, NULL, NULL),
(137, 'ELGRAND', 3, 1, NULL, NULL),
(138, 'FAIRLADY', 3, 1, NULL, NULL),
(139, 'FAIRLADY-Z', 3, 1, NULL, NULL),
(140, 'FUGA', 3, 1, NULL, NULL),
(141, 'GLORIA', 3, 1, NULL, NULL),
(142, 'GTR', 3, 1, NULL, NULL),
(143, 'INFINITI', 3, 1, NULL, NULL),
(144, 'Juke', 3, 1, NULL, NULL),
(145, 'LARGO', 3, 1, NULL, NULL),
(146, 'LAUREL', 3, 1, NULL, NULL),
(147, 'LEAF', 3, 1, NULL, NULL),
(148, 'LEOPARD', 3, 1, NULL, NULL),
(149, 'MARCH', 3, 1, NULL, NULL),
(150, 'MAXIMA', 3, 1, NULL, NULL),
(151, 'MURANO', 3, 1, NULL, NULL),
(152, 'NP300', 3, 1, NULL, NULL),
(153, 'NV', 3, 1, NULL, NULL),
(154, 'NX', 3, 1, NULL, NULL),
(155, 'PATROL', 3, 1, NULL, NULL),
(156, 'PRAIRE', 3, 1, NULL, NULL),
(157, 'PRESEA', 3, 1, NULL, NULL),
(158, 'PRESIDENT', 3, 1, NULL, NULL),
(159, 'PRIMERA', 3, 1, NULL, NULL),
(160, 'PULSAR', 3, 1, NULL, NULL),
(161, 'SAFARI', 3, 1, NULL, NULL),
(162, 'SD', 3, 1, NULL, NULL),
(163, 'SENTRA', 3, 1, NULL, NULL),
(164, 'SERENA', 3, 1, NULL, NULL),
(165, 'SILVIA', 3, 1, NULL, NULL),
(166, 'SKYLINE', 3, 1, NULL, NULL),
(167, 'STANZA', 3, 1, NULL, NULL),
(168, 'SUNNY', 3, 1, NULL, NULL),
(169, 'SYLPHY', 3, 1, NULL, NULL),
(170, 'TEANA', 3, 1, NULL, NULL),
(171, 'TERRANO', 3, 1, NULL, NULL),
(172, 'TIIDA', 3, 1, NULL, NULL),
(173, 'URVAN', 3, 1, NULL, NULL),
(174, 'VANETTE', 3, 1, NULL, NULL),
(175, 'VIOLET', 3, 1, NULL, NULL),
(176, 'X-TRAIL', 3, 1, NULL, NULL),
(177, 'รุ่นอื่นๆ', 3, 1, NULL, NULL),
(178, '3000 GTO', 4, 1, NULL, NULL),
(179, 'AEROBODY', 4, 1, NULL, NULL),
(180, 'AIRTREK', 4, 1, NULL, NULL),
(181, 'ASTRON', 4, 1, NULL, NULL),
(182, 'ATTRAGE', 4, 1, NULL, NULL),
(183, 'CHAMP', 4, 1, NULL, NULL),
(184, 'COLT', 4, 1, NULL, NULL),
(185, 'CYCLONE', 4, 1, NULL, NULL),
(186, 'DELICA', 4, 1, NULL, NULL),
(187, 'DIAMANTE', 4, 1, NULL, NULL),
(188, 'ECLIPSE', 4, 1, NULL, NULL),
(189, 'EVOLUTION', 4, 1, NULL, NULL),
(190, 'FTO', 4, 1, NULL, NULL),
(191, 'G-WAGON', 4, 1, NULL, NULL),
(192, 'GALANT', 4, 1, NULL, NULL),
(193, 'Jeep', 4, 1, NULL, NULL),
(194, 'L200-CYCLONE', 4, 1, NULL, NULL),
(195, 'L200-STRADA', 4, 1, NULL, NULL),
(196, 'L300', 4, 1, NULL, NULL),
(197, 'LANCER', 4, 1, NULL, NULL),
(198, 'Mirage', 4, 1, NULL, NULL),
(199, 'OUTLANDER', 4, 1, NULL, NULL),
(200, 'PAJERO', 4, 1, NULL, NULL),
(201, 'SPACE RUNNER', 4, 1, NULL, NULL),
(202, 'SPACE WAGON', 4, 1, NULL, NULL),
(203, 'STRADA G WAGON', 4, 1, NULL, NULL),
(204, 'STRADA GRANDIS', 4, 1, NULL, NULL),
(205, 'TRITON', 4, 1, NULL, NULL),
(206, 'ULTIMA', 4, 1, NULL, NULL),
(207, 'รุ่นอื่นๆ', 4, 1, NULL, NULL),
(208, 'ASKA', 5, 1, NULL, NULL),
(209, 'BUDDY', 5, 1, NULL, NULL),
(210, 'CAB 4', 5, 1, NULL, NULL),
(211, 'CAMEO', 5, 1, NULL, NULL),
(212, 'D-MAX', 5, 1, NULL, NULL),
(213, 'DRAGON EYE', 5, 1, NULL, NULL),
(214, 'DRAGON POWER', 5, 1, NULL, NULL),
(215, 'GEMINI', 5, 1, NULL, NULL),
(216, 'GEO STORM', 5, 1, NULL, NULL),
(217, 'HENO', 5, 1, NULL, NULL),
(218, 'HI-LANDER', 5, 1, NULL, NULL),
(219, 'IMPULSE', 5, 1, NULL, NULL),
(220, 'KB ปี 84-90', 5, 1, NULL, NULL),
(221, 'MU', 5, 1, NULL, NULL),
(222, 'MU-7', 5, 1, NULL, NULL),
(223, 'RODEO', 5, 1, NULL, NULL),
(224, 'SPACECAB', 5, 1, NULL, NULL),
(225, 'SPARK EX', 5, 1, NULL, NULL),
(226, 'SUPREME', 5, 1, NULL, NULL),
(227, 'TFR ปี 91-97', 5, 1, NULL, NULL),
(228, 'TROOPER', 5, 1, NULL, NULL),
(229, 'V-CROSS', 5, 1, NULL, NULL),
(230, 'VEGA', 5, 1, NULL, NULL),
(231, 'VERTEX', 5, 1, NULL, NULL),
(232, 'รุ่นอื่นๆ', 5, 1, NULL, NULL),
(233, '190', 6, 1, NULL, NULL),
(234, '200', 6, 1, NULL, NULL),
(235, '212', 6, 1, NULL, NULL),
(236, '220', 6, 1, NULL, NULL),
(237, '230', 6, 1, NULL, NULL),
(238, '240', 6, 1, NULL, NULL),
(239, '250', 6, 1, NULL, NULL),
(240, '280', 6, 1, NULL, NULL),
(241, '300', 6, 1, NULL, NULL),
(242, '350', 6, 1, NULL, NULL),
(243, '380', 6, 1, NULL, NULL),
(244, '400', 6, 1, NULL, NULL),
(245, '450', 6, 1, NULL, NULL),
(246, '500', 6, 1, NULL, NULL),
(247, '560', 6, 1, NULL, NULL),
(248, '600', 6, 1, NULL, NULL),
(249, 'A-CLASS', 6, 1, NULL, NULL),
(250, 'B-CLASS', 6, 1, NULL, NULL),
(251, 'C-CLASS', 6, 1, NULL, NULL),
(252, 'CL-CLASS', 6, 1, NULL, NULL),
(253, 'CLK-CLASS', 6, 1, NULL, NULL),
(254, 'CLS-CLASS', 6, 1, NULL, NULL),
(255, 'E-CLASS', 6, 1, NULL, NULL),
(256, 'G-CLASS', 6, 1, NULL, NULL),
(257, 'MB-CLASS', 6, 1, NULL, NULL),
(258, 'ML-CLASS', 6, 1, NULL, NULL),
(259, 'R-CLAS', 6, 1, NULL, NULL),
(260, 'S-CLASS', 6, 1, NULL, NULL),
(261, 'SL-CLASS', 6, 1, NULL, NULL),
(262, 'SLK-CLASS', 6, 1, NULL, NULL),
(263, 'SMART', 6, 1, NULL, NULL),
(264, 'V-CLASS', 6, 1, NULL, NULL),
(265, 'VITO', 6, 1, NULL, NULL),
(266, 'รุ่นอื่นๆ', 6, 1, NULL, NULL),
(267, 'Classic-Car', 7, 1, NULL, NULL),
(268, 'L7', 7, 1, NULL, NULL),
(269, 'M3', 7, 1, NULL, NULL),
(270, 'M5', 7, 1, NULL, NULL),
(271, 'M6', 7, 1, NULL, NULL),
(272, 'MINI', 7, 1, NULL, NULL),
(273, 'SERIES 1', 7, 1, NULL, NULL),
(274, 'SERIES 3', 7, 1, NULL, NULL),
(275, 'SERIES 5', 7, 1, NULL, NULL),
(276, 'SERIES 6', 7, 1, NULL, NULL),
(277, 'SERIES 7', 7, 1, NULL, NULL),
(278, 'SERIES 8', 7, 1, NULL, NULL),
(279, 'X1', 7, 1, NULL, NULL),
(280, 'X2', 7, 1, NULL, NULL),
(281, 'X3', 7, 1, NULL, NULL),
(282, 'X4', 7, 1, NULL, NULL),
(283, 'X5', 7, 1, NULL, NULL),
(284, 'X6', 7, 1, NULL, NULL),
(285, 'Z3', 7, 1, NULL, NULL),
(286, 'Z4', 7, 1, NULL, NULL),
(287, 'รุ่นอื่นๆ', 7, 1, NULL, NULL),
(288, '121', 8, 1, NULL, NULL),
(289, '323', 8, 1, NULL, NULL),
(290, '323-ASTINA', 8, 1, NULL, NULL),
(291, '626', 8, 1, NULL, NULL),
(292, '808', 8, 1, NULL, NULL),
(293, '929', 8, 1, NULL, NULL),
(294, 'B2000', 8, 1, NULL, NULL),
(295, 'B2500', 8, 1, NULL, NULL),
(296, 'BT-50', 8, 1, NULL, NULL),
(297, 'CAPELLA', 8, 1, NULL, NULL),
(298, 'CRONOS', 8, 1, NULL, NULL),
(299, 'CX-7', 8, 1, NULL, NULL),
(300, 'FAMILI', 8, 1, NULL, NULL),
(301, 'FAMILIA COUPE', 8, 1, NULL, NULL),
(302, 'FIGHTER', 8, 1, NULL, NULL),
(303, 'LANTIS', 8, 1, NULL, NULL),
(304, 'MARATHON', 8, 1, NULL, NULL),
(305, 'MAXNUM', 8, 1, NULL, NULL),
(306, 'MAZDA 2 elegance', 8, 1, NULL, NULL),
(307, 'MAZDA 2 sport', 8, 1, NULL, NULL),
(308, 'MAZDA 3', 8, 1, NULL, NULL),
(309, 'MAZDA 5', 8, 1, NULL, NULL),
(310, 'MAZDA 6', 8, 1, NULL, NULL),
(311, 'MPV', 8, 1, NULL, NULL),
(312, 'MX5', 8, 1, NULL, NULL),
(313, 'RX3', 8, 1, NULL, NULL),
(314, 'RX7', 8, 1, NULL, NULL),
(315, 'RX8', 8, 1, NULL, NULL),
(316, 'THUNDER', 8, 1, NULL, NULL),
(317, 'TRIBUTE', 8, 1, NULL, NULL),
(318, 'XEDOS 9', 8, 1, NULL, NULL),
(319, 'รุ่นอื่นๆ', 8, 1, NULL, NULL),
(320, 'ASPIRE', 9, 1, NULL, NULL),
(321, 'CADILAC HEETWOOD', 9, 1, NULL, NULL),
(322, 'CAPRI', 9, 1, NULL, NULL),
(323, 'CORTINA', 9, 1, NULL, NULL),
(324, 'Ecosport', 9, 1, NULL, NULL),
(325, 'ESCAPE', 9, 1, NULL, NULL),
(326, 'EVEREST', 9, 1, NULL, NULL),
(327, 'EXPLORER', 9, 1, NULL, NULL),
(328, 'FALCON', 9, 1, NULL, NULL),
(329, 'FESTIVA', 9, 1, NULL, NULL),
(330, 'FIESTA', 9, 1, NULL, NULL),
(331, 'FOCUS', 9, 1, NULL, NULL),
(332, 'GT', 9, 1, NULL, NULL),
(333, 'LASER', 9, 1, NULL, NULL),
(334, 'LINCOLN', 9, 1, NULL, NULL),
(335, 'MARATHON', 9, 1, NULL, NULL),
(336, 'MONDEO', 9, 1, NULL, NULL),
(337, 'MUSTANG', 9, 1, NULL, NULL),
(338, 'RANGER', 9, 1, NULL, NULL),
(339, 'SIERRA', 9, 1, NULL, NULL),
(340, 'TELSTAR', 9, 1, NULL, NULL),
(341, 'TERRITORY', 9, 1, NULL, NULL),
(342, 'THUNDERBIRD', 9, 1, NULL, NULL),
(343, 'ALLROADER', 10, 1, NULL, NULL),
(344, 'ASTRO', 10, 1, NULL, NULL),
(345, 'AVEO', 10, 1, NULL, NULL),
(346, 'CAMARO', 10, 1, NULL, NULL),
(347, 'CAPTIVA', 10, 1, NULL, NULL),
(348, 'CHEVY VAN', 10, 1, NULL, NULL),
(349, 'COLORADO', 10, 1, NULL, NULL),
(350, 'CORVETTE', 10, 1, NULL, NULL),
(351, 'CRUZE', 10, 1, NULL, NULL),
(352, 'EXPRESS', 10, 1, NULL, NULL),
(353, 'IMPALA', 10, 1, NULL, NULL),
(354, 'LUMINA', 10, 1, NULL, NULL),
(355, 'OPTR', 10, 1, NULL, NULL),
(356, 'S10', 10, 1, NULL, NULL),
(357, 'SAVANA', 10, 1, NULL, NULL),
(358, 'SONIC', 10, 1, NULL, NULL),
(359, 'SPIN', 10, 1, NULL, NULL),
(360, 'TRAILBLAZER', 10, 1, NULL, NULL),
(361, 'ZAFIRA', 10, 1, NULL, NULL),
(362, '440', 11, 1, NULL, NULL),
(363, '460', 11, 1, NULL, NULL),
(364, '480', 11, 1, NULL, NULL),
(365, '740', 11, 1, NULL, NULL),
(366, '850', 11, 1, NULL, NULL),
(367, '940', 11, 1, NULL, NULL),
(368, '960', 11, 1, NULL, NULL),
(369, 'C30', 11, 1, NULL, NULL),
(370, 'C70', 11, 1, NULL, NULL),
(371, 'CLASSIC CAR', 11, 1, NULL, NULL),
(372, 'S40', 11, 1, NULL, NULL),
(373, 'S60', 11, 1, NULL, NULL),
(374, 'S70', 11, 1, NULL, NULL),
(375, 'S80', 11, 1, NULL, NULL),
(376, 'S90', 11, 1, NULL, NULL),
(377, 'V40', 11, 1, NULL, NULL),
(378, 'V50', 11, 1, NULL, NULL),
(379, 'V70', 11, 1, NULL, NULL),
(380, 'XC70', 11, 1, NULL, NULL),
(381, 'XC90', 11, 1, NULL, NULL),
(382, 'ALFA ROMEO 155', 12, 1, NULL, NULL),
(383, 'ALFA ROMEO 156', 12, 1, NULL, NULL),
(384, 'ALFA ROMEO 166', 12, 1, NULL, NULL),
(385, 'ALFA ROMEO 1750', 12, 1, NULL, NULL),
(386, 'GIULIETTA', 12, 1, NULL, NULL),
(387, 'GT', 12, 1, NULL, NULL),
(388, 'GTV', 12, 1, NULL, NULL),
(389, 'SPIDER', 12, 1, NULL, NULL),
(390, 'SPIDER 2000', 12, 1, NULL, NULL),
(391, 'CYGNET', 13, 1, NULL, NULL),
(392, 'DB 7 VANTAGE', 13, 1, NULL, NULL),
(393, 'DB 9', 13, 1, NULL, NULL),
(394, 'RAPIDE', 13, 1, NULL, NULL),
(395, 'V12 VANTAGE', 13, 1, NULL, NULL),
(396, 'V8 VANTAGE', 13, 1, NULL, NULL),
(397, 'VANTAGE S', 13, 1, NULL, NULL),
(398, 'VIRAGE', 13, 1, NULL, NULL),
(399, '100', 14, 1, NULL, NULL),
(400, '80', 14, 1, NULL, NULL),
(401, 'A1', 14, 1, NULL, NULL),
(402, 'A3', 14, 1, NULL, NULL),
(403, 'A4', 14, 1, NULL, NULL),
(404, 'A5', 14, 1, NULL, NULL),
(405, 'A6', 14, 1, NULL, NULL),
(406, 'A7', 14, 1, NULL, NULL),
(407, 'A8', 14, 1, NULL, NULL),
(408, 'Q3', 14, 1, NULL, NULL),
(409, 'Q5', 14, 1, NULL, NULL),
(410, 'Q7', 14, 1, NULL, NULL),
(411, 'R8', 14, 1, NULL, NULL),
(412, 'RS3', 14, 1, NULL, NULL),
(413, 'RS5', 14, 1, NULL, NULL),
(414, 'RS6', 14, 1, NULL, NULL),
(415, 'S3', 14, 1, NULL, NULL),
(416, 'S4', 14, 1, NULL, NULL),
(417, 'S5', 14, 1, NULL, NULL),
(418, 'S6', 14, 1, NULL, NULL),
(419, 'TT', 14, 1, NULL, NULL),
(420, 'TT RS', 14, 1, NULL, NULL),
(421, 'TTS', 14, 1, NULL, NULL),
(422, 'FX4', 15, 1, NULL, NULL),
(423, 'ARNAGE', 16, 1, NULL, NULL),
(424, 'BROOKLANDS', 16, 1, NULL, NULL),
(425, 'CONTINENTAL', 16, 1, NULL, NULL),
(426, 'FLYING SPUR', 16, 1, NULL, NULL),
(427, 'TURBO', 16, 1, NULL, NULL),
(428, 'CTS-V', 17, 1, NULL, NULL),
(429, 'ELDORADO', 17, 1, NULL, NULL),
(430, 'ESCALADE', 17, 1, NULL, NULL),
(431, 'FLEETWOOD', 17, 1, NULL, NULL),
(432, 'SEDAN DEVILLE', 17, 1, NULL, NULL),
(433, 'SEVILLE', 17, 1, NULL, NULL),
(434, 'STS', 17, 1, NULL, NULL),
(435, '300C', 18, 1, NULL, NULL),
(436, '300M', 18, 1, NULL, NULL),
(437, 'NEON', 18, 1, NULL, NULL),
(438, 'PT CRUISER', 18, 1, NULL, NULL),
(439, 'VOYAGER', 18, 1, NULL, NULL),
(440, 'AX', 19, 1, NULL, NULL),
(441, 'Berlingo', 19, 1, NULL, NULL),
(442, 'C5', 19, 1, NULL, NULL),
(443, 'C8', 19, 1, NULL, NULL),
(444, 'CX20', 19, 1, NULL, NULL),
(445, 'DS3', 19, 1, NULL, NULL),
(446, 'JUMPER', 19, 1, NULL, NULL),
(447, 'XANTIA', 19, 1, NULL, NULL),
(448, 'XSARA', 19, 1, NULL, NULL),
(449, 'ESPERO', 20, 1, NULL, NULL),
(450, 'NEXIA', 20, 1, NULL, NULL),
(451, 'ATRAI', 21, 1, NULL, NULL),
(452, 'ATRAI WAGON', 21, 1, NULL, NULL),
(453, 'COPEN', 21, 1, NULL, NULL),
(454, 'HIJET', 21, 1, NULL, NULL),
(455, 'MIDGET II', 21, 1, NULL, NULL),
(456, 'MIRA', 21, 1, NULL, NULL),
(457, 'MOVE', 21, 1, NULL, NULL),
(458, 'OPTI', 21, 1, NULL, NULL),
(459, 'TERIOS', 21, 1, NULL, NULL),
(460, 'YRV', 21, 1, NULL, NULL),
(461, 'MINI TRUCK', 22, 1, NULL, NULL),
(462, 'MINI VAN', 22, 1, NULL, NULL),
(463, 'V27', 22, 1, NULL, NULL),
(464, '360 MODENA', 23, 1, NULL, NULL),
(465, '360 SPIDER', 23, 1, NULL, NULL),
(466, '360 STRADALE', 23, 1, NULL, NULL),
(467, '365 DAYTONA', 23, 1, NULL, NULL),
(468, '430 SCUDERIA', 23, 1, NULL, NULL),
(469, '458 ITALIA ', 23, 1, NULL, NULL),
(470, '512 TR', 23, 1, NULL, NULL),
(471, '575M MARANELLO', 23, 1, NULL, NULL),
(472, '599 GTB', 23, 1, NULL, NULL),
(473, '612 SCAGLIETTI', 23, 1, NULL, NULL),
(474, 'CALIFORNIA', 23, 1, NULL, NULL),
(475, 'F355 BERLINITTA', 23, 1, NULL, NULL),
(476, 'F430', 23, 1, NULL, NULL),
(477, 'F430 CHALLENGE', 23, 1, NULL, NULL),
(478, 'F430 SPIDER', 23, 1, NULL, NULL),
(479, 'FERRARI 348', 23, 1, NULL, NULL),
(480, '695 FERRARI', 24, 1, NULL, NULL),
(481, 'FIAT 1100', 24, 1, NULL, NULL),
(482, 'FIAT 13', 24, 1, NULL, NULL),
(483, 'FIAT 1500', 24, 1, NULL, NULL),
(484, 'FIAT 500', 24, 1, NULL, NULL),
(485, 'PUNTO', 24, 1, NULL, NULL),
(486, 'SAVANA', 25, 1, NULL, NULL),
(487, 'HUMMER H2', 26, 1, NULL, NULL),
(488, 'HUMMER H3', 26, 1, NULL, NULL),
(489, 'ACCENT', 27, 1, NULL, NULL),
(490, 'ELANTRA', 27, 1, NULL, NULL),
(491, 'EXCEL', 27, 1, NULL, NULL),
(492, 'GRAND STAREX', 27, 1, NULL, NULL),
(493, 'H-1', 27, 1, NULL, NULL),
(494, 'SONATA', 27, 1, NULL, NULL),
(495, 'SPRINT', 27, 1, NULL, NULL),
(496, 'TIBURON', 27, 1, NULL, NULL),
(497, 'TUCSON', 27, 1, NULL, NULL),
(498, 'DAIMLER', 28, 1, NULL, NULL),
(499, 'MK2', 28, 1, NULL, NULL),
(500, 'S-TYPE', 28, 1, NULL, NULL),
(501, 'OVEREIGN', 28, 1, NULL, NULL),
(502, 'X-TYPE', 28, 1, NULL, NULL),
(503, 'XF-SERIES', 28, 1, NULL, NULL),
(504, 'XJ-SERIES', 28, 1, NULL, NULL),
(505, 'XJL-SERIES', 28, 1, NULL, NULL),
(506, 'XJR', 28, 1, NULL, NULL),
(507, 'XK-SERIES', 28, 1, NULL, NULL),
(508, 'XK140', 28, 1, NULL, NULL),
(509, 'XKR', 28, 1, NULL, NULL),
(510, 'CHEROKEE', 29, 1, NULL, NULL),
(511, 'GRAND CHEROKEE', 29, 1, NULL, NULL),
(512, 'WILLY', 29, 1, NULL, NULL),
(513, 'WRANGLER', 29, 1, NULL, NULL),
(514, 'CARENS', 30, 1, NULL, NULL),
(515, 'CARNIVAL', 30, 1, NULL, NULL),
(516, 'GRAND CARNIVAL', 30, 1, NULL, NULL),
(517, 'GRAND SPORTAGE', 30, 1, NULL, NULL),
(518, 'UMBO', 30, 1, NULL, NULL),
(519, 'PICANT', 30, 1, NULL, NULL),
(520, 'PREGIO', 30, 1, NULL, NULL),
(521, 'SORENTO', 30, 1, NULL, NULL),
(522, 'SOUL', 30, 1, NULL, NULL),
(523, 'SPORTAGE', 30, 1, NULL, NULL),
(524, 'AVENTADOR', 31, 1, NULL, NULL),
(525, 'DIABIO', 31, 1, NULL, NULL),
(526, 'GALLARDO', 31, 1, NULL, NULL),
(527, 'MURCIELAGO', 31, 1, NULL, NULL),
(528, 'BETA', 32, 1, NULL, NULL),
(529, 'DEFENDER', 33, 1, NULL, NULL),
(530, 'DISCOVERY', 33, 1, NULL, NULL),
(531, 'FREELANDER', 33, 1, NULL, NULL),
(532, 'RANGE ROVER', 33, 1, NULL, NULL),
(533, 'SERIES 1', 33, 1, NULL, NULL),
(534, 'ARISTO', 34, 1, NULL, NULL),
(535, 'CT200h', 34, 1, NULL, NULL),
(536, 'ES300', 34, 1, NULL, NULL),
(537, 'GS250', 34, 1, NULL, NULL),
(538, 'GS300', 34, 1, NULL, NULL),
(539, 'GS350', 34, 1, NULL, NULL),
(540, 'IS F', 34, 1, NULL, NULL),
(541, 'IS200', 34, 1, NULL, NULL),
(542, 'IS250', 34, 1, NULL, NULL),
(543, 'IS250C', 34, 1, NULL, NULL),
(544, 'LS400', 34, 1, NULL, NULL),
(545, 'LS430', 34, 1, NULL, NULL),
(546, 'LS460', 34, 1, NULL, NULL),
(547, 'LS460L', 34, 1, NULL, NULL),
(548, 'LS600hl', 34, 1, NULL, NULL),
(549, 'LX460', 34, 1, NULL, NULL),
(550, 'LX470 CYGNUS', 34, 1, NULL, NULL),
(551, 'LX570', 34, 1, NULL, NULL),
(552, 'Nx300h', 34, 1, NULL, NULL),
(553, 'X270', 34, 1, NULL, NULL),
(554, 'RX300', 34, 1, NULL, NULL),
(555, 'RX330', 34, 1, NULL, NULL),
(556, 'RX350', 34, 1, NULL, NULL),
(557, 'RX450h', 34, 1, NULL, NULL),
(558, 'SC430', 34, 1, NULL, NULL),
(559, 'SOARER', 34, 1, NULL, NULL),
(560, 'ELISE', 35, 1, NULL, NULL),
(561, 'ESPRIT', 35, 1, NULL, NULL),
(562, 'EVORA', 35, 1, NULL, NULL),
(563, 'EXIGE', 35, 1, NULL, NULL),
(564, 'SPORT', 35, 1, NULL, NULL),
(565, 'GHIBLI', 36, 1, NULL, NULL),
(566, 'GRANTURISMO', 36, 1, NULL, NULL),
(567, 'GT COUPE', 36, 1, NULL, NULL),
(568, 'QUATTROPORTE', 36, 1, NULL, NULL),
(569, 'SPYDER', 36, 1, NULL, NULL),
(570, 'MGB', 37, 1, NULL, NULL),
(571, 'MGF', 37, 1, NULL, NULL),
(572, 'MIDGET MARK', 37, 1, NULL, NULL),
(573, 'AUSTIN Classic', 38, 1, NULL, NULL),
(574, 'AUSTIN MINI', 38, 1, NULL, NULL),
(575, 'COOPER', 38, 1, NULL, NULL),
(576, 'ONE', 38, 1, NULL, NULL),
(577, 'ASTRA', 39, 1, NULL, NULL),
(578, 'CALIBRA', 39, 1, NULL, NULL),
(579, 'COMMODORE', 39, 1, NULL, NULL),
(580, 'CORSA', 39, 1, NULL, NULL),
(581, 'KAPITAN', 39, 1, NULL, NULL),
(582, 'OMEGA', 39, 1, NULL, NULL),
(583, 'VECTRA', 39, 1, NULL, NULL),
(584, 'BIPPER', 40, 1, NULL, NULL),
(585, 'PARTNER', 40, 1, NULL, NULL),
(586, 'PEUGEOT 1007', 40, 1, NULL, NULL),
(587, 'PEUGEOT 205', 40, 1, NULL, NULL),
(588, 'PEUGEOT 206', 40, 1, NULL, NULL),
(589, 'PEUGEOT 207', 40, 1, NULL, NULL),
(590, 'PEUGEOT 305', 40, 1, NULL, NULL),
(591, 'PEUGEOT 306', 40, 1, NULL, NULL),
(592, 'PEUGEOT 307', 40, 1, NULL, NULL),
(593, 'PEUGEOT 308', 40, 1, NULL, NULL),
(594, 'PEUGEOT 405', 40, 1, NULL, NULL),
(595, 'PEUGEOT 406', 40, 1, NULL, NULL),
(596, 'PEUGEOT 407', 40, 1, NULL, NULL),
(597, 'PEUGEOT 504', 40, 1, NULL, NULL),
(598, 'PEUGEOT 505', 40, 1, NULL, NULL),
(599, 'PEUGEOT 605', 40, 1, NULL, NULL),
(600, 'PEUGEOT 607', 40, 1, NULL, NULL),
(601, 'PEUGEOT 807', 40, 1, NULL, NULL),
(602, 'RCZ', 40, 1, NULL, NULL),
(603, '911 CARRERA', 41, 1, NULL, NULL),
(604, '911 CARRERA S', 41, 1, NULL, NULL),
(605, '911 CARRERA 4', 41, 1, NULL, NULL),
(606, '911 GT2', 41, 1, NULL, NULL),
(607, '911 SPORT Classic', 41, 1, NULL, NULL),
(608, '911 TARGA 4S', 41, 1, NULL, NULL),
(609, '911 TURBO', 41, 1, NULL, NULL),
(610, '928', 41, 1, NULL, NULL),
(611, '993 CARRERA', 41, 1, NULL, NULL),
(612, '993 TARGA', 41, 1, NULL, NULL),
(613, '996 CARRERA', 41, 1, NULL, NULL),
(614, '996 GT3', 41, 1, NULL, NULL),
(615, '997 CARRERA', 41, 1, NULL, NULL),
(616, 'BOXSTER', 41, 1, NULL, NULL),
(617, 'CARRERA', 41, 1, NULL, NULL),
(618, 'CAYENNE', 41, 1, NULL, NULL),
(619, 'CAYMAN', 41, 1, NULL, NULL),
(620, 'PANAMERA', 41, 1, NULL, NULL),
(621, 'EXORA', 42, 1, NULL, NULL),
(622, 'GEN2', 42, 1, NULL, NULL),
(623, 'NEO', 42, 1, NULL, NULL),
(624, 'PERSONA', 42, 1, NULL, NULL),
(625, 'SAGA', 42, 1, NULL, NULL),
(626, 'SATRIA', 42, 1, NULL, NULL),
(627, 'SAVVY', 42, 1, NULL, NULL),
(628, 'WAJA', 42, 1, NULL, NULL),
(629, 'R-19', 43, 1, NULL, NULL),
(630, 'CORNICHE II', 44, 1, NULL, NULL),
(631, 'GHOST', 44, 1, NULL, NULL),
(632, 'PHANTOM', 44, 1, NULL, NULL),
(633, 'SILVER SHADOW II', 44, 1, NULL, NULL),
(634, 'SILVER SPIRIT II', 44, 1, NULL, NULL),
(635, 'SILVER SPUR II', 44, 1, NULL, NULL),
(636, 'SILVER SPUR III', 44, 1, NULL, NULL),
(637, '220 COUPE', 45, 1, NULL, NULL),
(638, '623', 45, 1, NULL, NULL),
(639, '75', 45, 1, NULL, NULL),
(640, '827 STERLING', 45, 1, NULL, NULL),
(641, 'MINI', 45, 1, NULL, NULL),
(642, '9-5', 46, 1, NULL, NULL),
(643, '900', 46, 1, NULL, NULL),
(644, '9000', 46, 1, NULL, NULL),
(645, 'FABIA', 47, 1, NULL, NULL),
(646, 'OCTAVIA', 47, 1, NULL, NULL),
(647, 'SMART', 48, 1, NULL, NULL),
(648, 'ACTYON', 49, 1, NULL, NULL),
(649, 'CHAIRMAN', 49, 1, NULL, NULL),
(650, 'KYRON', 49, 1, NULL, NULL),
(651, 'MUSSO', 49, 1, NULL, NULL),
(652, 'REXTON', 49, 1, NULL, NULL),
(653, 'STAVIC', 49, 1, NULL, NULL),
(654, 'BRZ', 50, 1, NULL, NULL),
(655, 'FORESTER', 50, 1, NULL, NULL),
(656, 'GLT', 50, 1, NULL, NULL),
(657, 'IMPREZA', 50, 1, NULL, NULL),
(658, 'LEGACY', 50, 1, NULL, NULL),
(659, 'OUTBACK', 50, 1, NULL, NULL),
(660, 'R2', 50, 1, NULL, NULL),
(661, 'Xv', 50, 1, NULL, NULL),
(662, 'ALTO', 51, 1, NULL, NULL),
(663, 'APV', 51, 1, NULL, NULL),
(664, 'CAPPUCCINO', 51, 1, NULL, NULL),
(665, 'CARIBIAN', 51, 1, NULL, NULL),
(666, 'CARRY', 51, 1, NULL, NULL),
(667, 'Celerio', 51, 1, NULL, NULL),
(668, 'CERVO', 51, 1, NULL, NULL),
(669, 'ERTIGA', 51, 1, NULL, NULL),
(670, 'ESTEEM', 51, 1, NULL, NULL),
(671, 'GRAND VITARA', 51, 1, NULL, NULL),
(672, 'JIMNY', 51, 1, NULL, NULL),
(673, 'SWIFT', 51, 1, NULL, NULL),
(674, 'VITARA', 51, 1, NULL, NULL),
(675, 'WAGON R', 51, 1, NULL, NULL),
(676, 'WAGON R PLUS', 51, 1, NULL, NULL),
(677, 'MODEL-S', 52, 1, NULL, NULL),
(678, 'BEETLE', 53, 1, NULL, NULL),
(679, 'CARAVELLE', 53, 1, NULL, NULL),
(680, 'CLASSIC CAR', 53, 1, NULL, NULL),
(681, 'CORRADO', 53, 1, NULL, NULL),
(682, 'GOLF', 53, 1, NULL, NULL),
(683, 'NEW BEETLE', 53, 1, NULL, NULL),
(684, 'PASSAT', 53, 1, NULL, NULL),
(685, 'POLO', 53, 1, NULL, NULL),
(686, 'SCIROCCO', 53, 1, NULL, NULL),
(687, 'SHARAN', 53, 1, NULL, NULL),
(688, 'TOUAREG', 53, 1, NULL, NULL),
(689, 'TRANSPORTER', 53, 1, NULL, NULL),
(690, 'VENTO', 53, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('surasak@promrat.com', '7be1e17b77e8f753262f48c004cf7a78cb521b4e061bfbf397950af4f38d3fbe', '2016-07-31 23:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'เต้น', 1, NULL, NULL),
(2, 'ผู้ดำเนินการ', 1, NULL, NULL),
(3, 'ผู้ลงทุน', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://porkarrod.com/uploads/avatars/default.png',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `line`, `email`, `username`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eric Prom', '0880666933', '3ricprom', 'surasak@promrat.com', 'ericprom', 'http://porkarrod.com/uploads/avatars/4d70b992ed1d4bc48e5d11744c1993e1d35c59b9/1ff51d89af63e4f2a3a0c8c812f295d17aa11125.jpg', '$2y$10$uNnPogWQlMmu45AZnPx7X.4hco/4gJCOpjUmxOQc/6IKoCrqCGc1S', 'hHOY1LE6e18c3LPfO4xaAtAChGYiHILA5uIjHm395RqkxqJsJKeLEtpbACVU', '2016-07-29 03:31:24', '2016-08-02 22:11:08'),
(2, 'Surachet Prasertsopa', '0875588500 ', 'tor9771', 'surachet.tor@gmail.com', 'candyman', 'http://porkarrod.com/uploads/avatars/c640107ee50f844061f3b19e26fbfea6e8ee2968/5d9e9b7be1aabe6a5ec130971c9b8995d91550a1.png', '$2y$10$4lywwLqdETJ7wnhFdwwMQegQI6jgo/7gDPFsApFJ2CxVYELnjXcKe', 'UDIMBmkXEXORuD2SyX7nDPnRcGbOX5N2sjinBOQuWXivnadO4Ac3dmqI2tek', '2016-08-01 03:47:24', '2016-08-01 04:28:10'),
(3, 'Kajonsak T', NULL, NULL, 'kajonsakt@gmail.com', NULL, 'http://porkarrod.com/uploads/avatars/default.png', '$2y$10$WGqiLIEdF8tVji7TMMhise/R.uLX9gj63NyeJiRZvupvoBgLJMBu.', NULL, '2016-08-03 04:19:05', '2016-08-03 04:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friendships_sender_id_sender_type_index` (`sender_id`,`sender_type`),
  ADD KEY `friendships_recipient_id_recipient_type_index` (`recipient_id`,`recipient_type`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=691;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
