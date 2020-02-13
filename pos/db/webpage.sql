-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 09:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `pass`, `fullname`, `role`, `contact`) VALUES
(1, 'admin', 'admin', 'Kenneth Paul Junio', 'ADMINISTRATOR', '0923821321'),
(5, 'cashier', 'cashier', 'LAO', 'CASHIER', '0983401234'),
(6, 'user', 'user', 'MUNAR', 'CASHIER', '09123542623');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_by`, `date_time`) VALUES
(17, 'COFFEE', 'Kenneth Paul Junio', '08:52 AM | Tuesday | 2020-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `contact`, `product_name`, `due_date`, `note`) VALUES
(5, 'Kenneth Paul Junio', 'QC', '0983401234', 'COKE', '05/05/20', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `activity`, `date`) VALUES
(57, '(AMA) COMPANY HAS BEEN DELETED', '08:59 AM | Monday | 2020-01-06'),
(58, 'NEW SUPPLIERS ADDED::: AMA | KEN TORRES | 0928329232 | MANILA', '09:13 AM | Monday | 2020-01-06'),
(59, 'NEW CATEGORY ADDED::: LOTION', '09:15 AM | Monday | 2020-01-06'),
(60, '() HAS BEEN DELETED', '09:55 AM | Monday | 2020-01-06'),
(61, '(Paul) ACCOUNT HAS BEEN DELETED', '09:56 AM | Monday | 2020-01-06'),
(62, 'admin::admin::Kenneth Paul Junio::ADMINISTRATOR::0923821321 --ACCOUNT HAS BEEN CHANGED TO--ken::admin1::Kenneth Paul Junio::ADMINISTRATOR::0923821321', '10:03 AM | Monday | 2020-01-06'),
(64, 'CASHIER: (JUAN LUNA) ACCOUNT HAS BEEN DELETED', '10:09 AM | Monday | 2020-01-06'),
(65, 'NEW ACCOUNT ADDED:: cashier | user | JUAN LUNA | CASHIER | 0983401234', '10:09 AM | Monday | 2020-01-06'),
(66, 'NEW SUPPLIERS ADDED::: zxcxx | qqqqq | 999999 | MANILA', '06:44 AM | Tuesday | 2020-01-07'),
(67, 'NEW PRODUCT HAS BEEN ADDED:: 13123-12312312', ''),
(68, 'PRODUCT HAS BEEN DELETED:: -', '07:37 AM | Tuesday | 2020-01-07'),
(69, 'NEW PRODUCT HAS BEEN ADDED:: OB-0003-WALGREENS', ''),
(70, 'PRODUCT HAS BEEN DELETED:: -', '07:39 AM | Tuesday | 2020-01-07'),
(71, 'NEW PRODUCT HAS BEEN ADDED:: OB-0003-WALGREENS', ''),
(72, 'PRODUCT HAS BEEN DELETED:: OB-0003 WALGREENS', '07:41 AM | Tuesday | 2020-01-07'),
(73, 'NEW PRODUCT HAS BEEN ADDED:: OB-0003-WALGREENS', ''),
(74, 'NEW PRODUCT HAS BEEN ADDED:: OB-0003-WALGREENS', ''),
(75, 'NEW PRODUCT HAS BEEN ADDED:: OB-0003-WALGREENS', ''),
(76, 'zxcxx--999999--qqqqq--MANILA--weekly delivery--::SUPPLIER DETAILS HAS BEEN CHANGED TO::--YYTQWE--\r\n    qqqqq--999999--MANILA--weekly delivery--', '07:51 AM | Tuesday | 2020-01-07'),
(77, 'OB-0003--WALGREENS--LOTION--STA. MESA--2020-01-07--2020-01-22--12--1 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--xxx--ALCOHOL DRINKS--STA. MESA--2020-01-07--2020-01-22--12--1', '07:58 AM | Tuesday | 2020-01-07'),
(78, 'OB-0003--xxx--ALCOHOL DRINKS--STA. MESA--2020-01-07--2020-01-22--12--1 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--LOTION--STA. MESA--2020-01-07--2020-01-22--12--1', '07:58 AM | Tuesday | 2020-01-07'),
(79, 'OB-0003--WALGREENS--LOTION--STA. MESA--2020-01-07--2020-01-22--12--1 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-07--2020-01-22--12--0', '05:27 PM | Saturday | 2020-01-11'),
(80, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-07--2020-01-22--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-22--2020-01-22--12--0', '05:33 PM | Saturday | 2020-01-11'),
(81, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-22--2020-01-22--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-22--12--0', '05:34 PM | Saturday | 2020-01-11'),
(82, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-22--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-22--2020-01-22--12--0', '05:34 PM | Saturday | 2020-01-11'),
(83, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-22--2020-01-22--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-22--12--0', '05:39 PM | Saturday | 2020-01-11'),
(84, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-22--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-01--12--0', '05:39 PM | Saturday | 2020-01-11'),
(85, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-23--2020-01-01--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2019-12-31--2020-01-01--12--0', '05:39 PM | Saturday | 2020-01-11'),
(86, 'OB-0002--KOPEKO--COFFEE--SM--2020-01-18--2020-01-31--12--98 :: HAS BEEN CHANGED TO ::\r\n	OB-0002--KOPEKO--ALCOHOL DRINKS--AMA--2020-01-18--2020-01-31--12--98', '05:51 PM | Saturday | 2020-01-11'),
(87, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2019-12-31--2020-01-01--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-01--2020-01-01--12--0', '05:58 PM | Saturday | 2020-01-11'),
(88, 'Kenneth Paul Junio | DELETED A COKE PRODUCT', '06:49 PM | Saturday | 2020-01-11'),
(89, 'OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-01--2020-01-01--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--WALGREENS--ALCOHOL DRINKS--STA. MESA--2019-12-31--2020-01-01--12--0 | BY: Kenneth Paul Junio', '06:51 PM | Saturday | 2020-01-11'),
(90, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: COKE', '06:53 PM | Saturday | 2020-01-11'),
(91, 'Kenneth Paul Junio | DELETED A (COKE) PRODUCT', '07:20 PM | Saturday | 2020-01-11'),
(92, 'Kenneth Paul Junio | DELETED A (KOPEKO) PRODUCT', '07:20 PM | Saturday | 2020-01-11'),
(93, 'Kenneth Paul Junio | DELETED A (WALGREENS) PRODUCT', '07:20 PM | Saturday | 2020-01-11'),
(94, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: COKE', '07:20 PM | Saturday | 2020-01-11'),
(95, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: WALGREENS', '07:23 PM | Saturday | 2020-01-11'),
(96, 'Kenneth Paul Junio | DELETED A (WALGREENS) PRODUCT', '07:25 PM | Saturday | 2020-01-11'),
(97, 'Kenneth Paul Junio | DELETED A (COKE) PRODUCT', '07:25 PM | Saturday | 2020-01-11'),
(98, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: COKE', '07:26 PM | Saturday | 2020-01-11'),
(99, 'OB-90--COKE--SOFTDRINKS--STA. MESA--2020-01-11--2020-02-01--12--88 :: HAS BEEN CHANGED TO ::\r\n	OB-0001--COKE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--12--88 | BY: Kenneth Paul Junio', '07:30 PM | Saturday | 2020-01-11'),
(100, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: WALGREENS', '07:30 PM | Saturday | 2020-01-11'),
(101, 'Kenneth Paul Junio | ADDED A NEW PRODUCT: RED HORSE', '07:36 PM | Saturday | 2020-01-11'),
(102, 'OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--48--33 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-01-11--48--33 | BY: Kenneth Paul Junio', '07:37 PM | Saturday | 2020-01-11'),
(103, 'OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-01-11--48--33 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--48--33 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(104, 'OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--48--33 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--48--833 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(105, 'OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--48--833 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--488--833 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(106, 'OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--488--833 :: HAS BEEN CHANGED TO ::\r\n	OB-0003--RED HORSE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-01-11--488--833 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(107, 'OB-0002--WALGREENS--LOTION--STA. MESA--2020-01-11--2020-02-01--212--2 :: HAS BEEN CHANGED TO ::\r\n	OB-0002--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--212--52 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(108, 'OB-0001--COKE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--12--88 :: HAS BEEN CHANGED TO ::\r\n	OB-0001--COKE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--12--80 | BY: Kenneth Paul Junio', '12:48 PM | Sunday | 2020-01-12'),
(109, 'JUAN LUNA CHANGED THE |ALCOHOL DRINKS| TO ALCOHOL DRINKSs', '01:33 PM | Sunday | 2020-01-12'),
(110, 'JUAN LUNA CHANGED THE |ALCOHOL DRINKSs| TO ALCOHOL DRINKS', '01:33 PM | Sunday | 2020-01-12'),
(111, 'ken::admin1::Kenneth Paul Junio::ADMINISTRATOR::0923821321 --ACCOUNT HAS BEEN CHANGED TO--admin::admin::Kenneth Paul Junio::ADMINISTRATOR::0923821321', '01:35 PM | Sunday | 2020-01-12'),
(112, 'cashier::user::JUAN LUNA::CASHIER::0983401234 --ACCOUNT HAS BEEN CHANGED TO--cashier::user::JUAN LUNA::CASHIER::0983401234', '01:35 PM | Sunday | 2020-01-12'),
(113, 'OB-0002--WALGREENS--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--212--51 :: HAS BEEN CHANGED TO ::\r\n	OB-0002--WALGREENS--ALCOHOL DRINKS--AMA--2020-01-11--2020-02-01--212--51 | BY: Kenneth Paul Junio', '02:04 PM | Sunday | 2020-01-12'),
(114, 'admin::admin::Kenneth Paul Junio::ADMINISTRATOR::0923821321 --ACCOUNT HAS BEEN CHANGED TO--admin::admin::Kenneth Paul Junio::ADMINISTRATOR::0923821321', '06:33 PM | Sunday | 2020-01-12'),
(115, 'NEW ACCOUNT ADDED:: user | user | JUAN LAZY | CASHIER | 09123542623', '06:34 PM | Sunday | 2020-01-12'),
(116, 'YYTQWE--999999--qqqqq--MANILA--weekly delivery--::SUPPLIER DETAILS HAS BEEN CHANGED TO::--YYTQWE--\r\n    qqqqq--999999--MANILA--weekly delivery', '06:43 PM | Sunday | 2020-01-12'),
(117, 'Kenneth Paul Junio | ADDED NEW SUPPLIER: Grateful Goods | Geomancer | 09154687521 | PASIG', '07:06 PM | Sunday | 2020-01-12'),
(118, 'Kenneth Paul Junio | ADDED NEW SUPPLIER: Progro | David Handy | 1232323223 | Pasay', '07:07 PM | Sunday | 2020-01-12'),
(119, 'Kenneth Paul Junio | ADDED NEW SUPPLIER: Weproduce | Paul | 0983784384 | Quezon City', '07:09 PM | Sunday | 2020-01-12'),
(120, 'SALES REPORT: Customer: Tabs | Qty: 2 | Cash: <br />\r\n<b>Notice</b>:  Undefined variable: cash in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>234</b><br />\r\n | HANDLED BY:  ', ''),
(121, 'SALES REPORT: Customer: Tabs |Item: COKE | Qty: 1 | Cash:  | HANDLED BY: Kenneth Paul Junio ', '12:38 AM | Monday | 2020-01-13'),
(122, 'SALES REPORT: Customer: Tabs |Item: COKE | Qty: 2 | HANDLED BY: Kenneth Paul Junio ', '12:43 AM | Monday | 2020-01-13'),
(123, ' | Printed the receipt with a total of | : QUANTITY | :ITEMS', ''),
(124, 'SALES REPORT: Customer: Deda |Item: COKE | Qty: 1 | HANDLED BY: Kenneth Paul Junio ', '12:54 AM | Monday | 2020-01-13'),
(125, 'Kenneth Paul Junio | Printed the receipt with a total of | 1: QUANTITY | 1:ITEMS', '12:54 AM | Monday | 2020-01-13'),
(126, 'OB-0003RED HORSEALCOHOL DRINKS', '01:11 AM | Monday | 2020-01-13'),
(127, 'OB-0003RED HORSEALCOHOL DRINKS', '01:12 AM | Monday | 2020-01-13'),
(128, 'OB-0002WALGREENSALCOHOL DRINKS', '01:12 AM | Monday | 2020-01-13'),
(129, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA', '01:19 AM | Monday | 2020-01-13'),
(130, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA', '01:19 AM | Monday | 2020-01-13'),
(131, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA', '01:19 AM | Monday | 2020-01-13'),
(132, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:22 AM | Monday | 2020-01-13'),
(133, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '01:22 AM | Monday | 2020-01-13'),
(134, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '01:22 AM | Monday | 2020-01-13'),
(135, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:33 PM | Monday | 2020-01-13'),
(136, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '01:33 PM | Monday | 2020-01-13'),
(137, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '01:33 PM | Monday | 2020-01-13'),
(138, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:36 PM | Monday | 2020-01-13'),
(139, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '01:36 PM | Monday | 2020-01-13'),
(140, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '01:36 PM | Monday | 2020-01-13'),
(141, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:37 PM | Monday | 2020-01-13'),
(142, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '01:37 PM | Monday | 2020-01-13'),
(143, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '01:37 PM | Monday | 2020-01-13'),
(144, ' |  |  |  | ', '01:40 PM | Monday | 2020-01-13'),
(145, 'OB-0001COKEALCOHOL DRINKSSTA. MESA', '01:42 PM | Monday | 2020-01-13'),
(146, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:45 PM | Monday | 2020-01-13'),
(147, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:45 PM | Monday | 2020-01-13'),
(148, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:47 PM | Monday | 2020-01-13'),
(149, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '01:47 PM | Monday | 2020-01-13'),
(150, 'SALES REPORT: Customer: Gax |Item: WALGREENS | Qty: 2 | HANDLED BY: Kenneth Paul Junio ', '01:49 PM | Monday | 2020-01-13'),
(151, 'SALES REPORT: Customer: Gax |Item: COKE | Qty: 5 | HANDLED BY: Kenneth Paul Junio ', '01:50 PM | Monday | 2020-01-13'),
(152, 'SALES REPORT: Customer: Gax |Item: COKE | Qty: 57 | HANDLED BY: Kenneth Paul Junio ', '01:50 PM | Monday | 2020-01-13'),
(153, 'Kenneth Paul Junio | Printed the receipt with a total of | 3: QUANTITY | 3:ITEM PRODUCT(S)', '01:54 PM | Monday | 2020-01-13'),
(154, 'SALES REPORT: Customer: xxx |Item: WALGREENS | Qty: 1 | HANDLED BY: Kenneth Paul Junio ', '01:57 PM | Monday | 2020-01-13'),
(155, 'OB-0001--COKE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--12--0 :: HAS BEEN CHANGED TO ::\r\n	OB-0001--COKE--ALCOHOL DRINKS--STA. MESA--2020-01-11--2020-02-01--12--55 | BY: Kenneth Paul Junio', '02:08 PM | Monday | 2020-01-13'),
(156, 'SALES REPORT: Customer: barc |Item: COKE | Qty: 2 | HANDLED BY: Kenneth Paul Junio ', '02:09 PM | Monday | 2020-01-13'),
(157, 'COKE quantity has been reduced by:2 | HANDLED BY: Kenneth Paul Junio ', '02:09 PM | Monday | 2020-01-13'),
(158, 'Kenneth Paul Junio | Printed the receipt with a total of | 2: QUANTITY | 2:ITEM PRODUCT(S)', '02:09 PM | Monday | 2020-01-13'),
(159, 'SALES REPORT: Customer: Tabs |Item: WALGREENS | Qty: 3 | HANDLED BY: Kenneth Paul Junio ', '02:10 PM | Monday | 2020-01-13'),
(160, 'WALGREENS quantity has been reduced by:3 | HANDLED BY: Kenneth Paul Junio ', '02:10 PM | Monday | 2020-01-13'),
(161, 'Kenneth Paul Junio | Printed the receipt with a total of | 1: QUANTITY | 1:ITEM PRODUCT(S)', '02:10 PM | Monday | 2020-01-13'),
(162, 'SALES REPORT: Customer: Tabs |Item: COKE | Qty: 5 | HANDLED BY: Kenneth Paul Junio ', '02:11 PM | Monday | 2020-01-13'),
(163, 'COKE quantity has been reduced by:5 | HANDLED BY: Kenneth Paul Junio ', '02:11 PM | Monday | 2020-01-13'),
(164, 'Kenneth Paul Junio | Printed the receipt with a total of | Array: QUANTITY | 1:ITEM PRODUCT(S)', '02:13 PM | Monday | 2020-01-13'),
(165, 'SALES REPORT: Customer: Jz |Item: WALGREENS | Qty: 1 | HANDLED BY: Kenneth Paul Junio ', '02:13 PM | Monday | 2020-01-13'),
(166, 'WALGREENS quantity has been reduced by:1 | HANDLED BY: Kenneth Paul Junio ', '02:13 PM | Monday | 2020-01-13'),
(167, 'Kenneth Paul Junio | Printed the receipt with a total of | : QUANTITY | 1:ITEM PRODUCT(S)', '02:13 PM | Monday | 2020-01-13'),
(168, 'SALES REPORT: Customer: Gax |Item: WALGREENS | Qty: 3 | HANDLED BY: Kenneth Paul Junio ', '02:26 PM | Monday | 2020-01-13'),
(169, 'WALGREENS quantity has been reduced by:3 | HANDLED BY: Kenneth Paul Junio ', '02:26 PM | Monday | 2020-01-13'),
(170, 'Kenneth Paul Junio | Printed the receipt with a total of | 3: QUANTITY | 1:ITEM PRODUCT(S)', '02:26 PM | Monday | 2020-01-13'),
(171, 'YYTQWE--999999--qqqqq--MANILA--weekly delivery--::SUPPLIER DETAILS HAS BEEN CHANGED TO::--YYTQWE--\r\n    qqqqq--999999--MANILA--weekly delivery', '02:33 PM | Monday | 2020-01-13'),
(172, '(YYTQWE) COMPANY HAS BEEN DELETED BY: Kenneth Paul Junio', '02:33 PM | Monday | 2020-01-13'),
(173, 'Kenneth Paul Junio CHANGED THE |LOTION| TO LOTION', '02:34 PM | Monday | 2020-01-13'),
(174, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '07:16 AM | Tuesday | 2020-01-14'),
(175, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '07:16 AM | Tuesday | 2020-01-14'),
(176, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '07:16 AM | Tuesday | 2020-01-14'),
(177, 'OB-0001 | COKE | ALCOHOL DRINKS | STA. MESA | 12', '07:21 AM | Tuesday | 2020-01-14'),
(178, 'OB-0002 | WALGREENS | ALCOHOL DRINKS | AMA | 212', '07:21 AM | Tuesday | 2020-01-14'),
(179, 'OB-0003 | RED HORSE | ALCOHOL DRINKS | STA. MESA | 488', '07:21 AM | Tuesday | 2020-01-14'),
(180, 'Kenneth Paul Junio | ADDED NEW CATEGORY: NOODLES', '08:52 AM | Tuesday | 2020-01-14'),
(181, 'Kenneth Paul Junio CHANGED THE |NOODLES| TO COFFEE', '08:56 AM | Tuesday | 2020-01-14'),
(182, 'Kenneth Paul Junio CHANGED THE |COFFEE| TO COFFEE', '08:56 AM | Tuesday | 2020-01-14'),
(183, 'JUAN LUNA | ADDED NEW SUPPLIER:  |  |  | ', '02:20 PM | Tuesday | 2020-01-14'),
(184, 'cashier::user::JUAN LUNA::CASHIER::0983401234 --ACCOUNT HAS BEEN CHANGED TO--cashier::user::LAO::CASHIER::0983401234', '06:27 PM | Tuesday | 2020-01-14'),
(185, ': Request has been removed by: Kenneth Paul Junio', '06:34 PM | Tuesday | 2020-01-14'),
(186, ': Request has been removed by: Kenneth Paul Junio', '06:34 PM | Tuesday | 2020-01-14'),
(187, ': Request has been removed by: Kenneth Paul Junio', '06:34 PM | Tuesday | 2020-01-14'),
(188, ': Request has been removed by: Kenneth Paul Junio', '06:35 PM | Tuesday | 2020-01-14'),
(189, ': Request has been removed by: Kenneth Paul Junio', '06:36 PM | Tuesday | 2020-01-14'),
(190, ': Request has been removed by: Kenneth Paul Junio', '06:37 PM | Tuesday | 2020-01-14'),
(191, ': Request has been removed by: Kenneth Paul Junio', '06:37 PM | Tuesday | 2020-01-14'),
(192, ': Request has been removed by: Kenneth Paul Junio', '06:37 PM | Tuesday | 2020-01-14'),
(193, 'Kenneth Paul Junio | DELETED A () PRODUCT', '06:38 PM | Tuesday | 2020-01-14'),
(194, 'JUAN LUNA: Request has been removed by: Kenneth Paul Junio', '06:39 PM | Tuesday | 2020-01-14'),
(195, 'cashier::user::LAO::CASHIER::0983401234 --ACCOUNT HAS BEEN CHANGED TO--cashier::cashier::LAO::CASHIER::0983401234', '06:41 PM | Tuesday | 2020-01-14'),
(196, 'LAO: Request has been removed by: Kenneth Paul Junio', '07:43 PM | Tuesday | 2020-01-14'),
(197, 'LAO: Request has been removed by: Kenneth Paul Junio', '07:50 PM | Tuesday | 2020-01-14'),
(198, 'LAO: Request has been removed by: Kenneth Paul Junio', '07:52 PM | Tuesday | 2020-01-14'),
(199, 'LAO: Request has been confirmed by: Kenneth Paul Junio', '08:40 PM | Tuesday | 2020-01-14'),
(200, 'LAO: Request has been confirmed by: Kenneth Paul Junio', '08:45 PM | Tuesday | 2020-01-14'),
(201, 'LAO: Request has been removed by: Kenneth Paul Junio', '08:45 PM | Tuesday | 2020-01-14'),
(202, 'LAO: Request has been confirmed by: Kenneth Paul Junio', '08:50 PM | Tuesday | 2020-01-14'),
(203, 'user::user::JUAN LAZY::CASHIER::09123542623 --ACCOUNT HAS BEEN CHANGED TO--user::user::MUNAR::CASHIER::09123542623', '08:59 PM | Tuesday | 2020-01-14'),
(204, 'LAO: Request has been confirmed by: Kenneth Paul Junio', '08:59 PM | Tuesday | 2020-01-14'),
(205, 'LAO: Request has been removed by: Kenneth Paul Junio', '08:59 PM | Tuesday | 2020-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `requested_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`id`, `notes`, `requested_by`, `date`) VALUES
(107, 'awits', 'MUNAR', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `sukli` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `customer_name`, `cash`, `note`, `item_code`, `item_name`, `category`, `supplier`, `order_date`, `expiration_date`, `selling_price`, `qty`, `total`, `sukli`) VALUES
(96, 'Jako', '1000', '', 'RBH-0556', 'RH', 'SOFTDRINKS', 'Ken Torres', '2020-01-05', '2020-01-18', '22', 1, '22', 978),
(97, 'Jako', '999999999', '', 'OB-0004', 'BEER', 'Alcohol Drinks', 'Ken Torres', '2020-01-05', '2019-12-30', '6000', 1, '6000', 999993999),
(98, 'Jako', '1000', '', 'OB-0002', 'KOPEKO', 'COFFEE', 'SM', '2020-01-06', '2020-01-31', '12', 1, '12', 988),
(99, 'asda', '12', '', 'OB-0002', 'KOPEKO', 'COFFEE', 'SM', '2020-01-07', '2020-01-31', '12', 1, '12', 0),
(100, 'Paul', '999', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-12', '2020-02-01', '212', 1, '212', 787),
(101, 'Jz', '200', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-12', '2020-02-01', '12', 5, '60', 140),
(102, 'Jz', '<br />\r\n<b>Notice</b>:  Undefined variable: cash in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>231</b><br />\r\n', '<br />\r\n<b>Notice</b>:  Undefined variable: note in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>232</b><br />\r\n', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-11', '2020-02-01', '212', 2, '424', -424),
(103, 'Jz', '<br />\r\n<b>Notice</b>:  Undefined variable: cash in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>231</b><br />\r\n', '<br />\r\n<b>Notice</b>:  Undefined variable: note in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>232</b><br />\r\n', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 7, '84', -84),
(104, 'Tabs', '220', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 1, '212', 8),
(105, 'Tabs', '<br />\r\n<b>Notice</b>:  Undefined variable: cash in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>234</b><br />\r\n', '<br />\r\n<b>Notice</b>:  Undefined variable: note in <b>C:xampphtdocslatestmain\new_order_sales.php</b> on line <b>235</b><br />\r\n', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 2, '24', -24),
(106, 'Tabs', '', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 1, '12', -12),
(107, 'Tabs', '', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 2, '24', -24),
(108, 'Deda', '555', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-13', '2020-02-01', '12', 1, '12', 543),
(109, 'Gax', '678', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 2, '424', 254),
(110, 'Gax', '', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 5, '60', -60),
(111, 'Gax', '', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 57, '684', -684),
(112, 'xxx', '452', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 1, '212', 240),
(113, 'barc', '55', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-13', '2020-02-01', '12', 2, '24', 31),
(114, 'Tabs', '1255', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 3, '636', 619),
(115, 'Tabs', '200', '', 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-13', '2020-02-01', '12', 5, '60', 140),
(116, 'Jz', '222', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 1, '212', 10),
(117, 'Gax', '5555', '', 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-13', '2020-02-01', '212', 3, '636', 4919);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `date_recieved` varchar(255) NOT NULL,
  `expiration_date` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_code`, `item_name`, `category`, `supplier`, `date_recieved`, `expiration_date`, `selling_price`, `qty`) VALUES
(1, 'OB-0001', 'COKE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-02-01', '12', 48),
(2, 'OB-0002', 'WALGREENS', 'ALCOHOL DRINKS', 'AMA', '2020-01-11', '2020-02-01', '212', 38),
(3, 'OB-0003', 'RED HORSE', 'ALCOHOL DRINKS', 'STA. MESA', '2020-01-11', '2020-01-11', '488', 833);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`id`, `item_code`, `item_name`, `customer_name`, `category`, `date`, `selling_price`, `qty`, `total`) VALUES
(16, 'RBH-0556', 'WALGREENS', 'Jakoe', 'CATEGORY', '2019-12-28', '6000', 1, '6000'),
(17, 'RBH-0556', 'WALGREENS', 'Jakoe', 'CATEGORY', '2019-12-28', '6000', 1, '6000'),
(18, 'RBH-0556', 'WALGREENS', 'Jakoe', 'CATEGORY', '2019-12-28', '6000', 1, '6000'),
(19, 'OB-0004', 'BEER', 'Jakoe', 'Alcohol Drinks', '2019-12-29', '6000', 1, '6000'),
(20, 'OB-0004', 'BEER', 'Jako', 'Alcohol Drinks', '2020-01-04', '6000', 1, '6000'),
(21, 'RBH-0556', 'RH', 'Jako', 'SOFTDRINKS', '2020-01-05', '22', 1, '22'),
(22, 'OB-0004', 'BEER', 'Jako', 'Alcohol Drinks', '2020-01-05', '6000', 1, '6000'),
(23, 'OB-0002', 'KOPEKO', 'Jako', 'COFFEE', '2020-01-06', '12', 1, '12'),
(24, 'OB-0002', 'KOPEKO', 'asda', 'COFFEE', '2020-01-07', '12', 1, '12'),
(25, 'OB-0002', 'WALGREENS', 'Paul', 'ALCOHOL DRINKS', '2020-01-12', '212', 1, '212'),
(26, 'OB-0001', 'COKE', 'Jz', 'ALCOHOL DRINKS', '2020-01-12', '12', 5, '60'),
(27, 'OB-0002', 'WALGREENS', 'Jz', 'ALCOHOL DRINKS', '2020-01-11', '212', 2, '424'),
(28, 'OB-0001', 'COKE', 'Jz', 'ALCOHOL DRINKS', '2020-01-11', '12', 7, '84'),
(29, 'OB-0002', 'WALGREENS', 'Tabs', 'ALCOHOL DRINKS', '2020-01-13', '212', 1, '212'),
(30, 'OB-0001', 'COKE', 'Tabs', 'ALCOHOL DRINKS', '2020-01-11', '12', 2, '24'),
(31, 'OB-0001', 'COKE', 'Tabs', 'ALCOHOL DRINKS', '2020-01-11', '12', 1, '12'),
(32, 'OB-0001', 'COKE', 'Tabs', 'ALCOHOL DRINKS', '2020-01-11', '12', 2, '24'),
(33, 'OB-0001', 'COKE', 'Deda', 'ALCOHOL DRINKS', '2020-01-13', '12', 1, '12'),
(34, 'OB-0002', 'WALGREENS', 'Gax', 'ALCOHOL DRINKS', '2020-01-13', '212', 2, '424'),
(35, 'OB-0001', 'COKE', 'Gax', 'ALCOHOL DRINKS', '2020-01-11', '12', 5, '60'),
(36, 'OB-0001', 'COKE', 'Gax', 'ALCOHOL DRINKS', '2020-01-11', '12', 57, '684'),
(37, 'OB-0002', 'WALGREENS', 'xxx', 'ALCOHOL DRINKS', '2020-01-13', '212', 1, '212'),
(38, 'OB-0001', 'COKE', 'barc', 'ALCOHOL DRINKS', '2020-01-13', '12', 2, '24'),
(39, 'OB-0002', 'WALGREENS', 'Tabs', 'ALCOHOL DRINKS', '2020-01-13', '212', 3, '636'),
(40, 'OB-0001', 'COKE', 'Tabs', 'ALCOHOL DRINKS', '2020-01-13', '12', 5, '60'),
(41, 'OB-0002', 'WALGREENS', 'Jz', 'ALCOHOL DRINKS', '2020-01-13', '212', 1, '212'),
(42, 'OB-0002', 'WALGREENS', 'Gax', 'ALCOHOL DRINKS', '2020-01-13', '212', 3, '636');

-- --------------------------------------------------------

--
-- Table structure for table `send_request`
--

CREATE TABLE `send_request` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `cashier_req` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `handled_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_request`
--

INSERT INTO `send_request` (`id`, `note`, `cashier_req`, `status`, `handled_by`, `date`) VALUES
(3, 'sada', 'LAO', 'DENIED', 'Kenneth Paul Junio', '08:45 PM | Tuesday | 2020-01-14'),
(4, 'bcxv', 'LAO', 'CONFIRMED', 'Kenneth Paul Junio', '08:50 PM | Tuesday | 2020-01-14'),
(5, 'requesting to add some category', 'LAO', 'CONFIRMED', 'Kenneth Paul Junio', '08:59 PM | Tuesday | 2020-01-14'),
(6, 'requesting to update product item name = red horse', 'LAO', 'DENIED', 'Kenneth Paul Junio', '08:59 PM | Tuesday | 2020-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `contact_name`, `contact_number`, `address`, `added_by`, `note`) VALUES
(6, 'STA. MESA', 'KENNETH PAUL JUNIO', '0923289329', 'SAN ISIDRO QC', '', 'WEEKLY DELIVERY'),
(7, 'AMA', 'KEN TORRES', '0928329232', 'MANILA', '', 'WEEKLY DELIVERY'),
(9, 'Grateful Goods', 'Geomancer', '09154687521', 'PASIG', '', 'MONTHLY'),
(10, 'Progro', 'David Handy', '1232323223', 'Pasay', '', 'UNKNOWN'),
(11, 'Weproduce', 'Paul', '0983784384', 'Quezon City', '', 'UNKNOWN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_request`
--
ALTER TABLE `send_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `send_request`
--
ALTER TABLE `send_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
