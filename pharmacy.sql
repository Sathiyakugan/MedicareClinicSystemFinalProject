-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 12:43 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_image` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `postal_address` longtext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`, `user_image`, `first_name`, `last_name`, `postal_address`, `phone`, `email`, `DOB`, `sex`, `address`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00', '16711838_10155681083333265_2801269500597607033_n-757873535.jpg', 'Admin', 'Kugan', 'k', '+94770760024', 'bsathiyakugan@gmail.', '2017-06-14', 'Male', 'Krishanbavanam Chavakachcheri North');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `dusername` varchar(150) NOT NULL,
  `pusername` varchar(150) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patientStatus` int(1) NOT NULL DEFAULT '0',
  `doctorStatus` int(1) NOT NULL DEFAULT '1',
  `rusername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `dusername`, `pusername`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `patientStatus`, `doctorStatus`, `rusername`) VALUES
(10, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-13', '06:00:00', '2017-07-04 11:25:13', 0, 0, ''),
(12, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-07', '07:00:00', '2017-07-04 11:27:19', 0, 0, ''),
(15, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-06 07:35:37', 1, 2, ''),
(16, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-06 07:38:19', 1, 2, ''),
(17, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-06 07:38:49', 1, 2, ''),
(18, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-06 09:22:00', 1, 2, ''),
(19, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-04', '06:00:00', '2017-07-06 11:42:58', 1, 2, ''),
(20, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-06 11:48:04', 0, 2, ''),
(21, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-06 11:51:22', 0, 0, ''),
(22, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-10', '06:00:00', '2017-07-06 11:52:29', 0, 0, ''),
(23, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-06 11:55:48', 0, 0, ''),
(24, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-07 04:54:25', 0, 2, ''),
(25, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-06', '07:00:00', '2017-07-07 12:21:58', 0, 2, ''),
(26, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-20', '06:00:00', '2017-07-07 12:31:03', 0, 1, ''),
(27, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-08', '06:00:00', '2017-07-07 12:45:41', 0, 1, ''),
(28, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-07 12:46:03', 0, 2, ''),
(29, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-07 12:46:12', 0, 1, ''),
(30, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-14', '06:00:00', '2017-07-07 12:51:56', 0, 1, ''),
(31, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-19', '06:00:00', '2017-07-07 12:54:57', 0, 1, ''),
(32, 'NEUROLOGIST', 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-07 14:58:41', 0, 1, ''),
(33, 'NEUROLOGIST', 'Nasriya', 'Nazriya', 800, '2017-07-13', '06:00:00', '2017-07-07 15:07:40', 0, 1, ''),
(34, 'NEUROLOGIST', 'Nasriya', 'anusan', 800, '2017-07-06', '06:00:00', '2017-07-07 15:09:17', 0, 1, ''),
(35, 'NEUROLOGIST', 'Nasriya', 'nayan', 800, '2017-07-20', '06:00:00', '2017-07-07 16:55:17', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(4, 'gfhf', 'ewdsc', '67hhtf', '45 nhyfg', '65424579', 'will@henry.com', 'gty', 'getty', '2013-11-23 12:54:49'),
(5, 'Sam', 'Osoro', 'Pharmacy/C', '76 nairobi', '09865468', 'samwel@pharmacy.com', 'sam', '1234', '2013-11-25 20:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `deleteddoctor`
--

CREATE TABLE `deleteddoctor` (
  `doctor_id` tinyint(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `field` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `staff_id` int(6) NOT NULL,
  `fees` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleteddoctor`
--

INSERT INTO `deleteddoctor` (`doctor_id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone`, `address`, `user_image`, `DOB`, `description`, `field`, `sex`, `staff_id`, `fees`) VALUES
(1, 'vSathiyakugan', 'vSathiyakugan', 'Kugan', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishnabavanam, Chavakachcheri North, Chavakachche, Chavakachcheri North, Chavakachcheri.', 'default.jpg', '2017-06-15', 'vdvsvsvsdvsdvdv', 'CARDIAC SURGEON', 'Male', 23, ''),
(2, 'Bala', 'Kirus', 'Pirasha', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishnabavanam, Chavakachcheri North, Chavakachche, Chavakachcheri North, Chavakachcheri.', 'nazriya-914978027.jpg', '2017-06-02', '', 'CARDIAC SURGEON', 'Male', 4, ''),
(3, 'vx', 'gf', 'Kugannin', '12345', 'bsathiyakugan@gmail.com', '770760024', 'ggg', 'img_20160825_074615-645935058.jpg', '2017-06-09', '', 'CARDIAC SURGEON', 'Male', 45, ''),
(4, '', '', 'Sathiyakugan', '12345', '', '', '', 'default.jpg', '0000-00-00', '', '', '', 12, ''),
(5, '', '', 'Sathiyakugan', '12345', '', '', '', 'default.jpg', '0000-00-00', '', '', '', 12, ''),
(10, 'pak', 'ind', 'juk', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'birthday-card-with-cake_23-2147501060-375244140.jpg', '2017-07-12', 'keishna', 'CARDIAC SURGEON', 'Male', 121, '800Rs'),
(11, 'hsdhsdhs', 'dhshdshd', 'dgdh', '12345', 'bsathiyakugan@gmail.com', '966', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'funny-happy-birthday-card_23-2147518533-309570312.jpg', '2017-07-12', 'Vsggvsgvsaga', 'CARDIAC SURGEON', 'Male', 5, '800Rs'),
(12, 'dsgdsgsd', 'dsdgdgsdgsd', 'gdgdg', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'hand-drawn-colored-birthday-elements-pack_23-2147554761-980682373.jpg', '2017-07-12', 'vdvdvddvsdsvddsv', 'CARDIAC SURGEON', 'Male', 23, '800Rs'),
(13, 'dsgdsgsd', 'dsdgdgsdgsd', 'gdgdgds', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'hand-drawn-colored-birthday-elements-pack_23-2147554761-615936279.jpg', '2017-07-12', 'vdvdvddvsdsvddsv', 'CARDIAC SURGEON', 'Male', 23, '800Rs'),
(14, 'sdgsdgds', 'dsgsdgsdg', 'sasadgd', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'happy-birthday-card-in-watercolor-style_23-2147520643-180603027.jpg', '2017-07-06', 'dsfbsfbfsbsf', 'CARDIAC SURGEON', 'Male', 14, '800Rs'),
(15, 'savasvasv', 'savsavasv', 'svavsv', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'default.jpg', '2017-08-07', 'cbsbsbdbs', 'CARDIAC SURGEON', 'Male', 12, '800Rs'),
(16, 'Kugan', 'Sathi', 'Sathiyakugan', '12345', 'bsathiyakugan@gmail.com', '0770760005', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'birthday-decoration-set_23-2147552574-898559570.jpg', '2017-07-20', 'DNJSNGSJGJSDGNSGKLSDNGLSGNLSDG', 'CARDIAC SURGEON', 'Male', 23, '800Rs'),
(17, 'dvdsv', 'dvdvdv', 'dvsdvsdvvdsv', '12345', 'bsathiyakugan@gmail.com', '0770760005', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'funny-happy-birthday-card_23-2147518533-336975097.jpg', '2017-07-06', 'sdvsdvdsvdsv', 'CARDIAC SURGEON', 'Male', 0, '800Rs'),
(18, 'Sathiyakugan', 'Bala', 'kugan', '12345', 'bsathiyakugan@gmail.com', '770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', 'happy-birthday-card-in-watercolor-style_23-2147520643-789367675.jpg', '2017-07-06', 'Kreieje', 'CARDIAC SURGEON', 'Male', 12, '1500Rs');

-- --------------------------------------------------------

--
-- Table structure for table `deletednurse`
--

CREATE TABLE `deletednurse` (
  `nurse_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(5) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletednurse`
--

INSERT INTO `deletednurse` (`nurse_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(5, 'Sam', 'Osoro', 'Pharmacy/1', '56 Kabu', '0789653412', 'sam@pharmacysys.com', 'osoro', '1234', '2013-11-24 17:18:51', '0000-00-00', '', ''),
(14, 'kugan', 'sathi', '12', 'krishnabavanam', '770760024', 'bsathiyakugan@gmail.', 'kugan', 'sathi', '2017-06-20 13:46:42', '0000-00-00', '', ''),
(15, 'fbsfbf', 'bfbsfb', '123', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'bsathiyaku', 'sathi', '2017-06-21 20:12:55', '0000-00-00', '', ''),
(16, 'bsdsd', 'sdsdsd', '11', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'Sathiyakug', 'sathi', '2017-06-21 20:38:51', '0000-00-00', '', ''),
(17, 'gdgdgd', 'gdgd', '23', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsfgsgsdg', 'sathi', '2017-06-21 20:39:18', '0000-00-00', '', ''),
(18, 'dgdsg', 'gsdgsd', '26', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsdgsd', 'sathi', '2017-06-21 20:39:38', '0000-00-00', '', ''),
(19, 'dsdsd', 'weweqweq', '87', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'dsdsd', 'sathi', '2017-06-21 20:39:59', '0000-00-00', '', ''),
(21, 'sdbbddb', 'dsbdsb', '15', 'bdbbsd', 'vvdvsvdsv', 'bsathiyakugan@gmail.', 'dbsbb', 'sathi', '0000-00-00 00:00:00', '2017-05-31', 'Male', '0'),
(22, 'dvsdvsdv', 'vdavadv', '15', 'advdvdvdv', '770760024', 'bsathiyakugan@gmail.', 'zvsdvsvds', 'sathi', '0000-00-00 00:00:00', '2017-06-08', 'Male', '0'),
(23, 'dsds', 'dsdsdsd', '55755', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'dsdsds', '12345', '0000-00-00 00:00:00', '2017-06-20', 'Male', '0'),
(24, 'hfshsfh', 'hdhds', 'dshds', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'kuganhfh', '12345', '0000-00-00 00:00:00', '2017-06-13', 'Male', '0'),
(25, 'asfasfasfas', 'sfasfasf', '3232', 'twwwtwywr', '770760024', 'bsathiyakugan@gmail.', 'fsafsafsaf', '12345', '0000-00-00 00:00:00', '2017-06-14', 'Male', '0'),
(26, 'dvsdvds', 'dvdsvsdv', '122', 'svsdvsdv', '770760024', 'bsathiyakugan@gmail.', 'dvdvds', '12345', '0000-00-00 00:00:00', '2017-06-29', 'Male', '0'),
(27, 'dvdvdv', 'dvdvdvd', '121', 'scdcsdc', '12212221121', 'bsathiyakugan@gmail.', 'davadvsdvd', '12345', '0000-00-00 00:00:00', '2017-06-07', 'Male', '0'),
(31, 'dbds', 'dbdsbd', '13313', 'egegeg', '12212221121', 'bsathiyakugan@gmail.', 'fdfdndfnfb', '12345', '0000-00-00 00:00:00', '2017-06-01', 'Male', '0'),
(32, 'gdgsdgsdgs', 'dsgsdgds', '23232', 'fbfbbfdb', '770760024', 'bsathiyakugan@gmail.', 'dgdgdgdgds', '12345', '0000-00-00 00:00:00', '2017-06-28', 'Male', '0'),
(34, 'bsdbdsbdb', 'dsbsdb', '2323', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'ccbffbbsb', '12345', '0000-00-00 00:00:00', '2017-06-21', 'Male', 'default.jpg'),
(35, 'sbsdbsdbsd', 'bsdbsdbs', 'gdgdv', 'dgdggd', '53535353535', 'bsathiyakugan@gmail.', 'dvdvvcnfdn', '12345', '0000-00-00 00:00:00', '2017-06-15', 'Male', '17835118_1037206193079096_3192553223089951569_o-332885742.jpg'),
(36, 'dsvsdvdv', 'dvdsvdsv', '21', 'bfbfbbfbdfbdfbfb', '333333333332', 'bsathiyakugan@gmail.', 'vdssfbsf', '12345', '0000-00-00 00:00:00', '2017-06-08', 'Male', '18582176_1972391289714177_5936661394781495135_n-905548095.jpg'),
(37, 'Dastre', 'dgd', '43', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.vomdsd', 'pirasanthy', '12345', '0000-00-00 00:00:00', '2017-06-09', 'Male', 'hand-drawn-colored-birthday-elements-pack_23-2147554761-149261474.jpg'),
(40, 'gsgsfgsgs', 'dsgsdgsdgds', '43', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gdgdgsgsfg', '12345', '0000-00-00 00:00:00', '2017-06-08', 'Male', 'default.jpg'),
(41, 'Sathiyakugangg', 'kugan', '54', 'Krishanbavanam Chava', '770760024', 'bsathiyakugan@gmail.', 'Admindgdgg', '12345', '0000-00-00 00:00:00', '2017-06-08', 'Male', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `deletedpatient`
--

CREATE TABLE `deletedpatient` (
  `patient_id` tinyint(6) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `BloodGroup` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedpatient`
--

INSERT INTO `deletedpatient` (`patient_id`, `user_image`, `first_name`, `last_name`, `sex`, `address`, `Password`, `Image`, `email`, `phone`, `DOB`, `BloodGroup`, `username`) VALUES
(1, 'nazriya-342163085.jpg', 'Sathiyakugan', 'Sathiyakugan', 'Male', 'Krishnabavanam, Chavakachcheri North, Chavakachche, Chavakachcheri North, Chavakachcheri.', '12345', '', 'bsathiyakugan@gmail.com', '770760024', '1994-12-29', '', 'Sathiyakugan'),
(2, 'default.jpg', 'vasvasvsa', 'vsavsav', 'Male', 'savasvasv', '12345', '', 'bsathiyakugan@gmail.com', '663', '2017-06-10', '', 'svasvsavs');

-- --------------------------------------------------------

--
-- Table structure for table `deletedpharmacist`
--

CREATE TABLE `deletedpharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedpharmacist`
--

INSERT INTO `deletedpharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(14, 'kugan', 'sathi', '12', 'krishnabavanam', '770760024', 'bsathiyakugan@gmail.', 'kugan', 'sathi', '2017-06-20 13:46:42', '0000-00-00', '0', ''),
(15, 'fbsfbf', 'bfbsfb', '123', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'bsathiyaku', 'sathi', '2017-06-21 20:12:55', '0000-00-00', '0', ''),
(17, 'gdgdgd', 'gdgd', '23', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsfgsgsdg', 'sathi', '2017-06-21 20:39:18', '0000-00-00', '0', ''),
(18, 'dgdsg', 'gsdgsd', '26', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsdgsd', 'sathi', '2017-06-21 20:39:38', '0000-00-00', '0', ''),
(19, 'dsdsd', 'weweqweq', '87', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'dsdsd', 'sathi', '2017-06-21 20:39:59', '0000-00-00', '0', ''),
(25, 'hfsddfh', 'hdfh', 'hdfhdf', 'jdjdg', '770760024', 'bsathiyakugan@gmail.', 'gdgdg', 'sathi', '0000-00-00 00:00:00', '2017-06-13', '0', '0'),
(26, 'DAtopara', 'Sabra', '16', 'Krishanbavanam Chava', '770760024', 'bsathiyakugan@gmail.', 'Sathiyakug', '12345', '0000-00-00 00:00:00', '2017-06-08', '0', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `deletedreceptionist`
--

CREATE TABLE `deletedreceptionist` (
  `receptionist_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `user_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedreceptionist`
--

INSERT INTO `deletedreceptionist` (`receptionist_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(5, 'Sam', 'Osoro', 'Pharmacy/1', '56 Kabu', '0789653412', 'sam@pharmacysys.com', 'osoro', '1234', '2013-11-24 17:18:51', '0000-00-00', '', ''),
(14, 'kugan', 'sathi', '12', 'krishnabavanam', '770760024', 'bsathiyakugan@gmail.', 'kugan', 'sathi', '2017-06-20 13:46:42', '0000-00-00', '', ''),
(15, 'fbsfbf', 'bfbsfb', '123', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'bsathiyaku', 'sathi', '2017-06-21 20:12:55', '0000-00-00', '', ''),
(16, 'bsdsd', 'sdsdsd', '11', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'Sathiyakug', 'sathi', '2017-06-21 20:38:51', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoists`
--

CREATE TABLE `diagnoists` (
  `id` tinyint(6) NOT NULL,
  `Date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UserName` varchar(255) NOT NULL,
  `Doctor` varchar(255) NOT NULL,
  `Report_type` varchar(255) NOT NULL,
  `Discription` varchar(25) NOT NULL,
  `Note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnoists`
--

INSERT INTO `diagnoists` (`id`, `Date`, `UserName`, `Doctor`, `Report_type`, `Discription`, `Note`) VALUES
(0, NULL, 'Anu', 'sageeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeee', 'ffffffffffffffff', 'eeeeeeeeeee');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `Patient_ID` tinyint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `RecordNo` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` tinyint(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `field` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `staff_id` int(6) NOT NULL,
  `fees` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone`, `address`, `user_image`, `DOB`, `description`, `field`, `sex`, `staff_id`, `fees`) VALUES
(19, 'uthay', 'Nasriya', 'Nasriya', '12345', 'kugan@gmail.com', '0770760024', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', '14520624_1306558012710381_5677096336788989108_n-230194091.jpg', '2017-07-12', 'kugan', 'NEUROLOGIST', 'Male', 234, '800Rs');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment_time`
--

CREATE TABLE `doctor_appointment_time` (
  `username` varchar(150) NOT NULL,
  `timeslot` time NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_appointment_time`
--

INSERT INTO `doctor_appointment_time` (`username`, `timeslot`, `id`) VALUES
('kugan', '06:00:00', 1),
('kugan', '08:00:00', 2),
('kugan', '09:00:00', 3),
('Nasriya', '06:00:00', 4),
('Nasriya', '07:00:00', 5),
('Nasriya', '08:00:00', 6),
('Nasriya', '09:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(5) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `served_by` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_name`, `served_by`, `status`, `date`) VALUES
(10, 'Sigar', 'osoro', 'Pending', '2013-12-10 11:19:42'),
(11, 'Jalas', 'osoro', 'Pending', '2013-12-10 11:28:59'),
(12, 'Abuto', 'osoro', 'Pending', '2013-12-10 12:19:02'),
(13, 'Andre', 'osoro', 'Pending', '2013-12-10 12:25:19'),
(14, 'William', 'osoro', 'Pending', '2013-12-10 12:29:38'),
(15, 'Osoro', 'osoro', 'Pending', '2013-12-10 12:39:51'),
(16, 'Sam Osoro', 'osoro', 'Pending', '2013-12-10 12:49:45'),
(17, 'Peter Nyaisa', 'osoro', 'Pending', '2013-12-10 12:51:48'),
(18, 'Gtyhd', 'osoro', 'Pending', '2013-12-12 19:20:44'),
(19, 'Jay-z', 'osoro', 'Pending', '2013-12-12 20:34:51');

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `tarehe` AFTER INSERT ON `invoice` FOR EACH ROW BEGIN
     SET @date=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` tinyint(5) NOT NULL,
  `invoice` int(5) NOT NULL,
  `drug` tinyint(5) NOT NULL,
  `cost` int(5) DEFAULT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice`, `drug`, `cost`, `quantity`) VALUES
(2, 10, 5, 5, 12),
(3, 11, 5, 5, 12),
(5, 11, 6, 120, 12),
(6, 12, 5, 5, 15),
(7, 12, 6, 120, 17),
(9, 12, 7, 250, 15),
(10, 12, 8, 15, 15),
(11, 12, 9, 1, 20),
(13, 13, 5, 5, 5),
(14, 13, 6, 120, 10),
(15, 13, 7, 250, 20),
(16, 13, 8, 15, 16),
(17, 13, 9, 1, 10),
(19, 14, 5, 5, 5),
(20, 15, 5, 5, 12),
(21, 16, 5, 5, 30),
(22, 16, 6, 120, 10),
(23, 17, 5, 5, 10),
(24, 17, 8, 15, 60),
(25, 18, 5, 5, 12),
(26, 18, 6, 120, 15),
(27, 19, 5, 5, 12),
(28, 19, 6, 120, 15),
(29, 19, 8, 15, 20),
(30, 19, 9, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(1, 'Samwel', 'Osoro', 'sam/pharm', '456 Kabu', '0789653417', 'samoso@pharmacy.com', 'samoso', '12345', '2013-12-10 14:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `notificationapprovedrecep`
--

CREATE TABLE `notificationapprovedrecep` (
  `id` int(6) NOT NULL,
  `referenceNo` int(6) NOT NULL,
  `rusername` varchar(250) NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationapprovedrecep`
--

INSERT INTO `notificationapprovedrecep` (`id`, `referenceNo`, `rusername`, `read`) VALUES
(1, 32, 'Umar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `reci_username` varchar(250) NOT NULL,
  `sender_username` varchar(250) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `parameters` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_read` int(11) NOT NULL DEFAULT '0',
  `patient_read` int(1) NOT NULL DEFAULT '0',
  `recep_read` int(11) NOT NULL DEFAULT '0',
  `nurse_read` int(1) NOT NULL DEFAULT '0',
  `pharm_read` int(1) NOT NULL DEFAULT '0',
  `doctor_read` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `reci_username`, `sender_username`, `type`, `parameters`, `created_at`, `admin_read`, `patient_read`, `recep_read`, `nurse_read`, `pharm_read`, `doctor_read`) VALUES
(1, 'kugan', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 15:06:26', 1, 1, 1, 0, 0, 1),
(2, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-04 16:31:02', 0, 0, 0, 0, 0, 1),
(3, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-04 16:40:54', 0, 0, 0, 0, 0, 1),
(4, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-04 16:40:54', 0, 0, 0, 0, 0, 1),
(5, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(6, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(7, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(8, 'kugan', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 15:06:26', 0, 1, 1, 0, 0, 1),
(9, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(10, 'kugan', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 15:06:26', 0, 1, 1, 0, 0, 1),
(11, 'kugan', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 15:06:26', 0, 1, 1, 0, 0, 1),
(12, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(13, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(14, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(15, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(16, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(17, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(18, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(19, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(20, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 06:18:02', 0, 0, 0, 0, 0, 1),
(21, '', '', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 0, 1, 0, 0, 0),
(22, '', '', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 0, 1, 0, 0, 0),
(23, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 1, 1, 0, 0, 0),
(24, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 1, 1, 0, 0, 0),
(25, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 1, 1, 0, 0, 0),
(26, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-07 10:24:48', 0, 0, 0, 0, 0, 1),
(27, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 1, 1, 0, 0, 0),
(28, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(29, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(30, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(31, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(32, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(33, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(34, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(35, 'Nasriya', 'kugan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(36, 'Nasriya', 'Nazriya', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(37, 'Nasriya', 'anusan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(38, 'Nasriya', 'nayan', 'appointment', 'wants Appointment with', '2017-07-08 14:48:18', 0, 0, 0, 0, 0, 1),
(39, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 05:56:24', 0, 0, 0, 0, 0, 0),
(40, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 05:57:18', 0, 0, 0, 0, 0, 0),
(41, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 05:59:22', 0, 0, 0, 0, 0, 0),
(42, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:00:48', 0, 0, 0, 0, 0, 0),
(43, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:02:07', 0, 0, 0, 0, 0, 0),
(44, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:04:14', 0, 0, 0, 0, 0, 0),
(45, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:09:20', 0, 0, 0, 0, 0, 0),
(46, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:09:36', 0, 0, 0, 0, 0, 0),
(47, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:16:34', 0, 0, 0, 0, 0, 0),
(48, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:16:43', 0, 0, 0, 0, 0, 0),
(49, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:18:38', 0, 0, 0, 0, 0, 0),
(50, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:20:00', 0, 0, 0, 0, 0, 0),
(51, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:21:05', 0, 0, 0, 0, 0, 0),
(52, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:27:29', 0, 0, 0, 0, 0, 0),
(53, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:32:02', 0, 0, 0, 0, 0, 0),
(54, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:32:57', 0, 0, 0, 0, 0, 0),
(55, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:33:34', 0, 0, 0, 0, 0, 0),
(56, 'Nasriya', 'kugan', 'paid_appointment', 'paid money', '2017-07-08 06:33:58', 0, 0, 0, 0, 0, 0),
(57, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 0, 1, 0, 0, 0),
(58, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 0, 1, 0, 0, 0),
(59, 'kugan', 'Nasriya', 'approved_appointment', 'Appointment Approved ', '2017-07-08 15:09:06', 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(5) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(38, 'Sathiyakugan', 'Selvakumar', '234', 'Shanatyhaania chava', '770760024', 'bsathiyakugan@gmail.com', 'Anusan', '12345', '0000-00-00 00:00:00', '2017-06-02', 'Male', 'birthday-card-with-white-and-golden-balloons_23-2147518135-99365234.jpg'),
(39, 'dsdsdsdsds', 'dsdsdsds', 'dsdsdsds', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.com', 'dsdsdsdsds', '12345', '0000-00-00 00:00:00', '2017-06-01', 'Male', 'happy-birthday-card-in-watercolor-style_23-2147520643-335601806.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paidpatients`
--

CREATE TABLE `paidpatients` (
  `id` tinyint(6) NOT NULL,
  `dusername` varchar(255) NOT NULL,
  `pusername` varchar(255) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentTime` time NOT NULL,
  `postingDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `viewed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paidpatients`
--

INSERT INTO `paidpatients` (`id`, `dusername`, `pusername`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `viewed`) VALUES
(6, 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-08 06:27:28', 0),
(7, 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-08 06:32:02', 0),
(8, 'Nasriya', 'kugan', 800, '2017-07-05', '06:00:00', '2017-07-08 06:32:56', 0),
(9, 'Nasriya', 'kugan', 800, '2017-07-12', '06:00:00', '2017-07-08 06:33:34', 0),
(10, 'Nasriya', 'kugan', 800, '2017-07-04', '06:00:00', '2017-07-08 06:33:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` tinyint(6) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `BloodGroup` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `user_image`, `first_name`, `last_name`, `sex`, `address`, `Password`, `Image`, `email`, `phone`, `DOB`, `BloodGroup`, `username`) VALUES
(1, '23-birthday-cake.w529.h529-488006591.jpg', 'Sathiyakugan', 'Sathiyakugan', 'Male', 'Krishnabavanam, Chavakachcheri North, Chavakachche, Chavakachcheri North, Chavakachcheri.', '1234', '', 'bsathiyakugan@gmail.com', '770760024', '1994-12-29', '', 'kugan'),
(3, 'nazriya-788238525.jpg', 'ahamad', 'Nazriya', 'Femal', 'Krishnabavanam, Chavakachcheri North, Chavakachche,', '12345', '', 'bsathiyakugan@gmail.com', '770760024', '2016-06-10', '', 'Nazriya'),
(4, 'vedhika-487304687.jpg', 'Vedhika', 'Sathiyakugan', 'Femal', 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', '12345', '', 'sathiyakugan.15@cse.mrt.ac.lk', '770760024', '2017-07-12', '', 'anusan'),
(5, 'nayanthara-906890869.jpg', 'Nayanthara', 'Prasanth', 'Male', 'Krishanbavanam Chavakachcheri North', '12345', '', 'sathiyakugan.15@cse.mrt.ac.lk', '0770760024', '2017-07-05', '', 'nayan');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` tinyint(5) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttypes`
--

INSERT INTO `paymenttypes` (`id`, `Name`) VALUES
(1, 'Cash'),
(2, 'Credit card'),
(3, 'Mobile Money'),
(4, 'Cheque'),
(5, '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(14, 'kugan', 'sathik', '12', 'krishnabavanam', '770760024', 'bsathiyakugan@gmail.com', 'kugan', '1234', '2017-06-20 13:46:42', '2017-06-09', 'Male', '16711838_10155681083333265_2801269500597607033_n-27038574.jpg'),
(15, 'fbsfbf', 'bfbsfb', '123', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'bsathiyaku', 'sathi', '2017-06-21 20:12:55', '0000-00-00', '0', ''),
(17, 'gdgdgd', 'gdgd', '23', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsfgsgsdg', 'sathi', '2017-06-21 20:39:18', '0000-00-00', '0', ''),
(18, 'dgdsg', 'gsdgsd', '26', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'gsdgsd', 'sathi', '2017-06-21 20:39:38', '0000-00-00', '0', ''),
(19, 'dsdsd', 'weweqweq', '87', 'Krishnabavanam, Chav', '770760024', 'bsathiyakugan@gmail.', 'dsdsd', 'sathi', '2017-06-21 20:39:59', '0000-00-00', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` tinyint(5) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Doctor` varchar(255) NOT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Case_Histroy` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `Note` varchar(255) NOT NULL,
  `ref_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `UserName`, `Doctor`, `Date`, `Case_Histroy`, `medication`, `Note`, `ref_number`) VALUES
(14, 'Anu', 'sathi', '2017-07-07 16:37:45', 'gfgf', 'fngnhn', 'fhbhrr', 0),
(15, 'Anu', 'sabngee', '0000-00-00 00:00:00', 'over ', 'panadoll', 'cuver ealryy', 11);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_details`
--

CREATE TABLE `prescription_details` (
  `id` tinyint(5) NOT NULL,
  `pres_id` int(5) NOT NULL,
  `drug_name` tinyint(5) NOT NULL,
  `strength` varchar(15) NOT NULL,
  `dose` varchar(15) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_details`
--

INSERT INTO `prescription_details` (`id`, `pres_id`, `drug_name`, `strength`, `dose`, `quantity`) VALUES
(2, 999, 5, '10 gms', '1x2', 12),
(3, 1000, 5, '10 gms', '1x2', 12),
(5, 1000, 6, '150 gms', '1x4', 12),
(6, 1001, 5, '20 gms', '2x3', 15),
(7, 1001, 6, '30 gms', '2x4', 17),
(9, 1001, 7, '50 gms', '1x3', 15),
(10, 1001, 8, '40 gms', '1x3', 15),
(11, 1001, 9, '15 gms', '2x3', 20),
(13, 1002, 5, '50 gms', '2X3', 5),
(14, 1002, 6, '150 gms', '2X3', 10),
(15, 1002, 7, '20 gms', '2X3', 20),
(16, 1002, 8, '15 gms', '2X3', 16),
(17, 1002, 9, '10 gms', '2X3', 10),
(19, 1003, 5, '50 gms', '1x2', 5),
(20, 1004, 5, '12', '1x2', 12),
(21, 1005, 5, '20 gms', '2x3', 30),
(22, 1005, 6, '40 gms', '1x3', 10),
(23, 1006, 5, '12 gms', '1x3', 10),
(24, 1006, 8, '15 gms', '1x3', 60),
(25, 1003, 5, '20 gms', '1x3', 12),
(26, 1003, 6, '30 gms', '1x2', 15),
(27, 1004, 5, '20 gms', '1x3', 12),
(28, 1004, 6, '150 gms', '1x4', 15),
(29, 1004, 8, '120 gms', '1x3', 20),
(30, 1004, 9, '10 gms', '2x3', 20);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `reciptNo` int(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payType` varchar(10) NOT NULL,
  `serialno` varchar(10) DEFAULT NULL,
  `served_by` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`reciptNo`, `customer_id`, `total`, `payType`, `serialno`, `served_by`, `date`) VALUES
(0, '', 1500, '', '', 'sam', '0000-00-00 00:00:00'),
(999, '', 1350, '', '', 'sam', '0000-00-00 00:00:00');

--
-- Triggers `receipts`
--
DELIMITER $$
CREATE TRIGGER `siku` AFTER INSERT ON `receipts` FOR EACH ROW BEGIN
     SET @date=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `receptionist_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` tinyint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `user_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`receptionist_id`, `first_name`, `last_name`, `staff_id`, `address`, `phone`, `email`, `username`, `password`, `date`, `DOB`, `sex`, `user_image`) VALUES
(25, 'Akmalvdv', 'kufh', 12, 'Krishanbavanam Chavakachcheri North, Chavakachcheri North, Chavakachcheri.', '770760024', 'bsathiyakugan@gmail.com', 'Umar', '12345', '0000-00-00 00:00:00', '2017-06-14', 'Male', 'birthday-label-with-gift-and-balloons_23-2147510614-590728759.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `company` varchar(20) NOT NULL,
  `supplier` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` enum('Available','Inavailable') NOT NULL,
  `date_supplied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `drug_name`, `category`, `description`, `company`, `supplier`, `quantity`, `cost`, `status`, `date_supplied`) VALUES
(5, 'Piriton', 'tablet', 'Painkiller', 'SB', 'SB', 1000, 5, 'Available', '2013-11-30'),
(6, 'Dual Cotexin', 'tablet', 'Malaria', 'GX', 'Clinix', 150, 120, 'Available', '2013-11-30'),
(7, 'Naproxen', 'Tablet', 'Reproductive', 'Family Health', 'Stopes', 250, 250, 'Available', '2013-11-30'),
(8, 'Flagi', 'talet', 'Digestive', 'GX', 'Clinix', 657, 15, 'Available', '2013-11-30'),
(9, 'Actal', 'Tablet', 'Stomach Reliev', 'GX', 'Clinix', 1000, 1, 'Available', '2013-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `tempprescri`
--

CREATE TABLE `tempprescri` (
  `id` tinyint(5) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `postal_address` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `drug_name` varchar(30) NOT NULL,
  `strength` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `username`, `userip`, `login`, `logout`, `status`, `type`) VALUES
(82, 'Admin', 0x3a3a3100000000000000000000000000, '2017-07-04 10:20:31', '04-07-2017 04:27:53 PM', 1, 'Admin'),
(83, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 10:57:57', '', 0, 'Patient'),
(84, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 10:58:06', '', 0, 'Admin'),
(85, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 10:58:16', '04-07-2017 04:29:32 PM', 1, 'Patient'),
(86, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 11:00:00', '', 1, 'Doctor'),
(87, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 11:00:14', '04-07-2017 04:30:30 PM', 1, 'Doctor'),
(88, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:00:57', '04-07-2017 04:38:09 PM', 1, 'Doctor'),
(89, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 11:08:35', '04-07-2017 04:39:29 PM', 1, 'Patient'),
(90, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:09:45', '', 0, 'Doctor'),
(91, 'Nazriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:09:55', '', 0, 'Doctor'),
(92, 'nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:10:09', '', 0, 'Admin'),
(93, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:10:30', '', 0, 'Admin'),
(94, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:10:49', '04-07-2017 04:43:48 PM', 1, 'Doctor'),
(95, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 11:16:55', '04-07-2017 04:58:18 PM', 1, 'Patient'),
(96, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 11:28:30', '', 1, 'Doctor'),
(97, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 18:09:48', '05-07-2017 12:23:12 AM', 1, 'Patient'),
(98, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-04 18:53:22', '', 0, 'Admin'),
(99, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-04 18:53:35', '05-07-2017 11:00:14 AM', 1, 'Doctor'),
(100, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 05:30:22', '', 0, 'Admin'),
(101, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 05:30:28', '05-07-2017 11:01:16 AM', 1, 'Patient'),
(102, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 05:31:24', '05-07-2017 02:51:14 PM', 1, 'Doctor'),
(103, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 09:21:32', '05-07-2017 02:52:02 PM', 1, 'Patient'),
(104, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 09:22:07', '', 0, 'Admin'),
(105, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 09:22:11', '05-07-2017 02:55:26 PM', 1, 'Patient'),
(106, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-05 09:25:29', '06-07-2017 08:27:28 AM', 1, 'Patient'),
(107, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 02:57:38', '', 0, 'Admin'),
(108, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 02:57:43', '06-07-2017 08:36:39 AM', 1, 'Doctor'),
(109, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 03:06:46', '', 0, 'Doctor'),
(110, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 03:06:52', '06-07-2017 05:00:13 PM', 1, 'Patient'),
(111, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 11:30:17', '06-07-2017 10:05:28 PM', 1, 'Patient'),
(112, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 16:35:34', '', 0, 'Doctor'),
(113, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-06 16:35:41', '', 0, 'Doctor'),
(114, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-06 16:35:50', '07-07-2017 07:53:51 AM', 1, 'Doctor'),
(115, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 02:26:15', '', 0, 'Patient'),
(116, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 02:26:19', '', 0, 'Doctor'),
(117, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 02:26:22', '07-07-2017 10:06:44 AM', 1, 'Patient'),
(118, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-07 04:37:07', '07-07-2017 10:10:01 AM', 1, 'Doctor'),
(119, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 04:40:35', '07-07-2017 10:24:29 AM', 1, 'Patient'),
(120, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-07 04:54:41', '07-07-2017 12:47:15 PM', 1, 'Doctor'),
(121, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 07:17:21', '', 0, 'Patient'),
(122, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 07:17:31', '07-07-2017 01:12:02 PM', 1, 'Patient'),
(123, 'Umar', 0x3a3a3100000000000000000000000000, '2017-07-07 08:40:21', '07-07-2017 03:34:31 PM', 1, 'Receptionist'),
(124, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 10:04:33', '', 0, 'Admin'),
(125, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-07 10:04:39', '07-07-2017 04:13:18 PM', 1, 'Patient'),
(126, 'Anusan', 0x3a3a3100000000000000000000000000, '2017-07-07 10:43:49', '07-07-2017 04:14:06 PM', 1, 'Nurse'),
(127, 'Umar', 0x3a3a3100000000000000000000000000, '2017-07-07 10:55:45', '08-07-2017 02:30:29 PM', 1, 'Receptionist'),
(128, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-08 09:00:38', '08-07-2017 02:31:16 PM', 1, 'Patient'),
(129, 'kugan', 0x3a3a3100000000000000000000000000, '2017-07-08 09:17:37', '', 0, 'Admin'),
(130, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-08 09:18:06', '08-07-2017 02:48:34 PM', 1, 'Doctor'),
(131, 'Umar', 0x3a3a3100000000000000000000000000, '2017-07-08 09:18:59', '08-07-2017 03:37:39 PM', 1, 'Receptionist'),
(132, 'Nasriya', 0x3a3a3100000000000000000000000000, '2017-07-08 10:20:42', '', 1, 'Doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `deleteddoctor`
--
ALTER TABLE `deleteddoctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `deletednurse`
--
ALTER TABLE `deletednurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `deletedpatient`
--
ALTER TABLE `deletedpatient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `deletedpharmacist`
--
ALTER TABLE `deletedpharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `deletedreceptionist`
--
ALTER TABLE `deletedreceptionist`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Indexes for table `diagnoists`
--
ALTER TABLE `diagnoists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_appointment_time`
--
ALTER TABLE `doctor_appointment_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks` (`drug`),
  ADD KEY `invoices` (`invoice`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `notificationapprovedrecep`
--
ALTER TABLE `notificationapprovedrecep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `paidpatients`
--
ALTER TABLE `paidpatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsfd` (`drug_name`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`reciptNo`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tempprescri`
--
ALTER TABLE `tempprescri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deleteddoctor`
--
ALTER TABLE `deleteddoctor`
  MODIFY `doctor_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `deletednurse`
--
ALTER TABLE `deletednurse`
  MODIFY `nurse_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `deletedpatient`
--
ALTER TABLE `deletedpatient`
  MODIFY `patient_id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deletedpharmacist`
--
ALTER TABLE `deletedpharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `deletedreceptionist`
--
ALTER TABLE `deletedreceptionist`
  MODIFY `receptionist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `doctor_appointment_time`
--
ALTER TABLE `doctor_appointment_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `paidpatients`
--
ALTER TABLE `paidpatients`
  MODIFY `id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `prescription_details`
--
ALTER TABLE `prescription_details`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `receptionist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tempprescri`
--
ALTER TABLE `tempprescri`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoices` FOREIGN KEY (`invoice`) REFERENCES `invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks` FOREIGN KEY (`drug`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD CONSTRAINT `dsfd` FOREIGN KEY (`drug_name`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
