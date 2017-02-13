-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2017 at 12:35 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tabibuco_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile_picture`, `status`, `user_type`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'http://dev.tabibu.co.ke/admin/assets/uploads/profile_pic/admin/1486315745_untitled.png', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `affilliated_hospitals`
--

CREATE TABLE IF NOT EXISTS `affilliated_hospitals` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affilliated_hospitals`
--

INSERT INTO `affilliated_hospitals` (`id`, `hospital_name`, `image`) VALUES
(1, 'Burdenko General Military Clinical Hospital', ''),
(2, 'City Clinical Hospital No. 50', ''),
(3, 'European Medical Centre Group', ''),
(4, 'Russian Children''s Clinical Hospital', ''),
(5, 'American Clinic', ''),
(6, 'Amrita Institute of Medical Sciences', ''),
(7, 'Aster Medcity', ''),
(8, 'Lakeshore Hospital', ''),
(9, 'Medical Trust Hospital', ''),
(10, 'Lisie Hospital', ''),
(11, 'Rajagiri Hospital', ''),
(12, 'Renai medicity', ''),
(13, 'Lourdes Hospital', ''),
(14, 'Sunrise Hospital', ''),
(15, 'Chettinad Health City', ''),
(16, 'Cloudnine Hospitals', ''),
(17, 'Dr. Mohan’s Diabetes Specialities Centre', ''),
(18, 'Fortis Malar Hospital', ''),
(19, 'Global Hospitals & Health City', ''),
(20, 'Government General Hospital', '');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_categories`
--

CREATE TABLE IF NOT EXISTS `amenities_categories` (
  `id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities_categories`
--

INSERT INTO `amenities_categories` (`id`, `facility_name`) VALUES
(1, 'Cafeterias'),
(2, 'Chapel'),
(3, 'Gardens and Outdoor Spaces'),
(4, 'Gifts, Flowers & Salons'),
(5, 'Libraries & Learning Resources'),
(6, 'Media & Technology Services'),
(7, 'Museum'),
(8, 'ATM & Banking'),
(9, 'Cell Phones'),
(10, 'E-Mail'),
(11, 'Electrical Appliances'),
(12, 'Fire Safety'),
(13, 'Fitness & Wellness Center'),
(14, 'Housekeeping Services'),
(15, 'Public Restrooms'),
(16, 'Interpreter Service'),
(17, 'Mail and Flowers'),
(18, 'Television'),
(19, 'Wi-Fi Wireless Internet Service'),
(20, 'Notary Public');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `ill_reason` varchar(5000) NOT NULL,
  `appointment_time` varchar(500) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `patient_id`, `appointment_date`, `status`, `ill_reason`, `appointment_time`, `insurance`, `end_time`) VALUES
(130, '65 ', '1', '2017-01-06', '0', '2', '11:00 AM', '13', '11:00 AM'),
(132, '65 ', '1', '2017-01-02', '0', '17', '11:15 AM', '2', '11:30 AM'),
(133, '65 ', '1', '2017-01-03', '0', '17', '11:00 AM', '2', '11:15 AM'),
(135, '65 ', '53', '2017-01-04', '0', '', '11:15 AM', '', '11:30 AM'),
(136, '64 ', '1', '2017-01-04', '0', '17', '10:00 AM', '2', '10:15 AM'),
(137, '1 ', '1', '2017-01-07', '1', '17', '01:00 AM', '2', '01:15 AM'),
(139, '64 ', '56', '2017-01-10', '0', '3', '09:15 AM', '7', '09:30 AM'),
(141, '65 ', '56', '2017-01-13', '0', '20', '10:00 AM', '15', '10:15 AM'),
(142, '69 ', '56', '2017-01-11', '1', '16', '07:30 AM', '21', '07:45 AM'),
(143, '65 ', '56', '2017-01-10', '1', '20', '01:30 AM', '13', '01:45 AM'),
(144, '65 ', '56', '2017-01-10', '1', '21', '01:00 AM', '15', '01:15 AM'),
(145, '69 ', '56', '2017-01-11', '1', '21', '07:30 AM', '1', '07:45 AM'),
(146, '2', '42', '2017-01-10', '0', '1', '06:15 PM', '', ''),
(147, '64 ', '56', '2017-01-10', '1', '3', '09:30 AM', '21', '09:45 AM'),
(148, '69 ', '56', '2017-01-11', '1', '20', '07:15 AM', '', '07:30 AM'),
(149, '64 ', '56', '2017-01-11', '1', '20', '10:15 AM', '', '10:30 AM'),
(151, '69 ', '56', '2017-01-12', '1', '17', '09:15 AM', '21', '09:30 AM'),
(152, '9 ', '56', '2017-01-12', '0', '20', '08:00 AM', '10', '08:15 AM'),
(153, '69 ', '56', '2017-01-19', '1', '7', '09:30 AM', '12', '09:45 AM'),
(154, '76 ', '66', '2017-01-12', '1', '7', '07:00 AM', '10', '07:15 AM'),
(155, '8 ', '56', '2017-01-14', '1', '15', '09:15 AM', '15', '09:30 AM'),
(156, '1 ', '56', '2017-01-14', '1', '15', '01:30 AM', '15', '01:45 AM'),
(159, '64 ', '56', '2017-01-16', '1', '20', '09:15 AM', '13', '09:30 AM'),
(160, '69 ', '56', '2017-01-17', '1', '15', '01:15 AM', '', '01:30 AM'),
(161, '76 ', '71', '2017-01-15', '1', '20', '00:30 AM', '21', '01:15 AM'),
(162, '76 ', '71', '2017-01-15', '1', '20', '00:30 AM', '21', '01:15 AM'),
(163, '64 ', '1', '2017-01-16', '1', '17', '09:00 AM', '2', '09:15 AM'),
(164, '10 ', '1', '2017-01-16', '0', '17', '05:30 AM', '2', '05:45 AM'),
(165, '10 ', '1', '2017-01-17', '0', '17', '05:30 AM', '2', '05:45 AM'),
(166, '9 ', '1', '2017-01-16', '0', '17', '08:00 AM', '2', '08:15 AM'),
(167, '10 ', '1', '2017-01-17', '0', '17', '05:45 AM', '2', '06:00 AM'),
(168, '9 ', '56', '2017-01-21', '0', '16', '08:15 AM', '1', '08:30 AM'),
(169, '10 ', '74', '2017-01-16', '1', '16', '05:45 AM', '', '06:00 AM'),
(170, '10 ', '71', '2017-01-17', '1', '7', '06:00 AM', '11', '06:15 AM'),
(171, '9 ', '76', '2017-01-17', '0', '7', '08:30 AM', '21', '08:45 AM'),
(172, '8 ', '56', '2017-01-18', '1', '', '09:30 AM', '', '09:45 AM'),
(173, '10 ', '56', '2017-01-17', '1', '', '06:15 AM', '', '06:30 AM'),
(174, '10 ', '56', '2017-01-18', '1', '16', '07:30 AM', '7', '07:45 AM'),
(175, '12 ', '75', '2017-01-17', '0', '', '13:00 PM', '2', '01:15 AM'),
(177, '12 ', '75', '2017-01-18', '0', '', '15:45 PM', '2', '01:15 AM'),
(178, '12 ', '77', '2017-01-18', '1', '2', '11:45 AM', '7', '12:00 PM'),
(179, '12 ', '75', '2017-01-18', '1', '21', '12:15 PM', '11', '12:30 PM'),
(180, '10 ', '1', '2017-01-18', '1', '17', '05:30 AM', '2', '05:45 AM'),
(181, '10 ', '56', '2017-01-17', '1', '20', '07:15 AM', '1', '07:30 AM'),
(182, '10 ', '56', '2017-01-18', '1', '20', '05:45 AM', '1', '06:00 AM'),
(183, '1 ', '56', '2017-01-20', '1', '2', '01:00 AM', '1', '01:15 AM'),
(184, '12 ', '56', '2017-01-18', '1', '10', '11:30 AM', '1', '11:45 AM');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `package_id`, `doctor_id`) VALUES
(11, '7', '2'),
(12, '7', '7'),
(13, '8', '2'),
(44, '7', '1');

-- --------------------------------------------------------

--
-- Table structure for table `center_packages`
--

CREATE TABLE IF NOT EXISTS `center_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` varchar(255) NOT NULL,
  `package_period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_packages`
--

INSERT INTO `center_packages` (`id`, `package_name`, `package_price`, `package_period`) VALUES
(1, 'silver', '$50', '45 days'),
(2, 'gold', '$100', '4 months'),
(3, 'diamond', '$1000', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `city_categories`
--

CREATE TABLE IF NOT EXISTS `city_categories` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_categories`
--

INSERT INTO `city_categories` (`id`, `city_name`, `country_id`, `state_id`) VALUES
(1, 'guwahati', '1', '1'),
(2, 'Gurugram', '1', '2'),
(3, 'kolkata', '1', '3'),
(4, 'new delhi', '1', '4'),
(5, 'kochi', '1', '5'),
(6, 'thiruvananthapuram', '1', '5'),
(7, 'palakad', '1', '5'),
(8, 'chennai', '1', '6'),
(9, 'madurai', '1', '6'),
(10, 'coimbatore', '1', '6'),
(11, 'thirunalveli', '1', '6'),
(12, 'jaipur', '1', '7'),
(13, 'mumbai', '1', '8'),
(14, 'kanpur', '1', '9'),
(15, 'gandhi nagar', '1', '10'),
(16, 'srinagar', '1', '11'),
(17, 'puri', '1', '12'),
(18, 'patiala', '1', '13'),
(19, 'vishakapatnam', '1', '14'),
(20, 'hyderabad', '1', '15'),
(21, 'colombo', '2', '16'),
(22, 'zhejiang', '3', '17'),
(23, 'islamabad', '4', '18'),
(24, 'chittagong', '5', '19'),
(25, 'simei', '6', '20'),
(26, 'hanoi', '7', '21'),
(27, 'kuala lampur', '8', '22'),
(28, 'moscow', '9', '23'),
(29, 'ulsan', '10', '24'),
(30, 'rason', '11', '25'),
(31, 'glasgow', '12', '26'),
(32, 'kabul', '13', '27'),
(33, 'pyay', '14', '28'),
(34, 'pattaya', '15', '29'),
(35, 'bangkok', '15', '30'),
(36, 'austin', '16', '31'),
(37, 'london', '17', '32'),
(38, 'central', '18', '33'),
(39, 'zurich', '19', '34'),
(40, 'baltimore', '16', '35'),
(41, 'johannesburg', '20', '36'),
(42, 'solna', '21', '37'),
(53, 'Thrissur', '1', '5'),
(54, 'Ponta Grossa', '21', '43');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `id` int(11) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `clinic_address` varchar(255) NOT NULL,
  `clinic_country` varchar(255) NOT NULL,
  `clinic_state` varchar(255) NOT NULL,
  `clinic_city` varchar(255) NOT NULL,
  `clinic_zip` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `visitation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `clinic_languages` varchar(255) NOT NULL,
  `clinic_awards` varchar(255) NOT NULL,
  `clinic_memberships` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `about_clinic` varchar(5000) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `clinic_website` varchar(255) NOT NULL,
  `clinic_established_date` varchar(255) NOT NULL,
  `clinic_affilliations` varchar(500) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type_selection` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `profile_status` int(11) NOT NULL,
  `features_status` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL,
  `trial_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `clinic_name`, `clinic_address`, `clinic_country`, `clinic_state`, `clinic_city`, `clinic_zip`, `specialty`, `insurance`, `visitation`, `email`, `display_image`, `clinic_languages`, `clinic_awards`, `clinic_memberships`, `password`, `terms`, `status`, `latitude`, `longitude`, `about_clinic`, `phone`, `clinic_website`, `clinic_established_date`, `clinic_affilliations`, `amenities`, `username`, `type_selection`, `parent_id`, `profile_status`, `features_status`, `gallery_status`, `trial_date`, `end_date`) VALUES
(1, 'Kumaran Dental Clinic', 'No.92, Pensioner Street, Dindigul. Landmark: Opposite Gomath Towers, Dindigul, Dindigul, Tamil N?du', '1', '6', '9', '625020', '7', '9', '6', 'kumaran.dental@gmail.com', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', '1,8', 'Hispanics awards in 2013', 'International Society of Clinic Association ', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '9.928', '78.119', 'NIZ', '', '', '', '4', '2', '', 'clinic', 2, 1, 1, 1, '2017-01-08', '2017-01-24'),
(2, 'appollo sugar clinics', ' 50, Second Ave, B Block, Annanagar East, Chennai, Tamil Nadu 600102', '1', '6', '8', '600001', '16', '1,3,4', '21,22', 'appollo.clinic@live.com', 'http://dev.tabibu.co.ke/uploads/clinic1.jpg', '1,2,8', 'maya awards for healthcare service', 'international clinical association', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '13.062', '80.269', 'k', '', '', '', '3', '4', '', 'clinic', 1, 1, 1, 1, '2017-01-24', '2017-01-24'),
(3, 'kaya clinics', '49/24, A1, 1st Floor, Sunny Side, 1st Main Road, Above Nuts & Spices, Gandhi Nagar, Adyar, Chennai, Tamil Nadu 600020', '1', '6', '8', '600001', '5,6', '3', '11', 'kaya@gmail.com', 'http://dev.tabibu.co.ke/uploads/clinic2.jpg', '13', 'taminadu best clinic award', 'tamilnadu clinic association', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '12.757', '80.222', 'n', '', '', '', '6', '9', '', '', 1, 1, 1, 1, '2017-01-24', '2017-01-24'),
(4, 'medlilly clinics', ' NH17, Kaipamangalam, Kerala 680681', '1', '5', '53', '680307', '3,4,5', '1,2,3', '3,5,8,9,10,11,12,13', 'medlilly@gmail.com', 'http://dev.tabibu.co.ke/uploads/clinic3.jpg', '1,6,8', 'srilanka best clinic award', 'srilanka clinic association', '63286e2b6695149359a0bd46f501fc77', 'agreed', '1', '10.329', '76.158', 'aa', '', '', '', '2', '2', '', 'clinic', 2, 1, 1, 1, '2017-01-24', '2017-01-24'),
(5, 'enhance clinics', 'E-84, Ground Floor, Greater Kailash Part I, Near Spectra Eye Clinic, New Delhi, Delhi 110048', '1', '4', '4', '110001', '1,2,3,4,5,6,7,8,9,10', '1,2,3,4,5,6', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', 'enhance@gmail.com', 'http://dev.tabibu.co.ke/uploads/clinic4.jpg', '2', 'singapore best clinic award', 'singapore clinic association', '03265faca14f06be8156135b57d4ccf9', 'agreed', '1', '28.612', '77.218', 'At Enhance, we feel everyone aspires to be beautiful! Our Mission is to provide unparalleled aesthetic results to all our customers keeping in mind the safety and efficacy of all our treatments. We strive hard to give meaning & value to our business and to the working lives of our employees. We are proud of our work.', '', '', '', '2', '3', '', 'clinic', 3, 1, 1, 1, '2017-01-24', '2017-01-24'),
(0, 'sdfsd', '', '', '', '', '99501', '', '', '', 'singhrupinder823@gmail.com', '', '', '', '', '0192023a7bbd73250516f069df18b500', 'agreed', '1', '', '', '', '9780671767', '', '', '', '', '', '', 0, 0, 0, 0, '2017-02-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_gallery`
--

CREATE TABLE IF NOT EXISTS `clinic_gallery` (
  `id` int(11) NOT NULL,
  `clinic_id` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_gallery`
--

INSERT INTO `clinic_gallery` (`id`, `clinic_id`, `image`, `user_id`) VALUES
(2, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968190_1-2.JPG', 1),
(5, '4', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(6, '4', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(7, '4', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(8, '2', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(9, '2', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(10, '2', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(11, '2', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1),
(12, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968371_1-8.jpg', 1),
(13, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/saas.jpg', 1),
(14, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/sdsd.jpg', 1),
(15, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968398_1-9.jpg', 1),
(17, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968802_1-4.jpg', 1),
(18, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/KayaSkin.jpg', 1),
(19, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968815_1-splash3.jpg', 1),
(20, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968824_1-kaya-skin-clinic-office.jpg', 1),
(21, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968831_1-index1.jpg', 1),
(22, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968838_1-mo1_6161.jpg', 1),
(23, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968844_1-330414673.jpg', 1),
(24, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968850_1-image1.jpg', 1),
(25, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476968855_1-kaya-skin-clinic-hyderabad-1453292358-569f7b46a867c.jpg', 1),
(27, '4', 'http://dev.tabibu.co.ke/uploads/kumaran.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_categories`
--

CREATE TABLE IF NOT EXISTS `country_categories` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_categories`
--

INSERT INTO `country_categories` (`id`, `country_name`) VALUES
(1, 'india'),
(2, 'srilanka'),
(3, 'china'),
(4, 'pakistan'),
(5, 'bangladesh'),
(6, 'singapore'),
(7, 'vietnam'),
(8, 'malaysia'),
(9, 'russia'),
(10, 'south korea'),
(11, 'north korea'),
(12, 'england'),
(13, 'afghanistan '),
(14, 'burma'),
(15, 'thailand'),
(16, 'United States'),
(17, 'United Kingdom'),
(18, 'hong kong'),
(19, 'switzerland'),
(20, 'south africa'),
(21, 'Brasil'),
(33, 'Georgia'),
(34, 'France'),
(35, 'toto'),
(36, 'Italia');

-- --------------------------------------------------------

--
-- Table structure for table `degree_categories`
--

CREATE TABLE IF NOT EXISTS `degree_categories` (
  `id` int(11) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree_categories`
--

INSERT INTO `degree_categories` (`id`, `degree_name`, `description`) VALUES
(1, 'MBBS', ''),
(2, 'BMBS', ''),
(3, 'MBChB', ''),
(4, 'MBBCh', ''),
(5, 'DO', ''),
(6, 'MD', ''),
(7, 'Dr.MuD', ''),
(8, 'Dr.Med', ''),
(9, 'MCM', ''),
(10, 'MMSc', ''),
(11, 'MMedSc', ''),
(12, 'MM', ''),
(13, 'MMed', ''),
(14, 'MPhil', ''),
(15, 'MS', ''),
(16, 'MSurg', ''),
(17, 'MChir', ''),
(18, 'MCh', ''),
(19, 'ChM', ''),
(20, 'CM', ''),
(21, 'MSc', ''),
(22, 'DCM', ''),
(23, 'DClinSurg', ''),
(24, 'DMSc', ''),
(25, 'DMedSc', ''),
(26, 'PhD', ''),
(27, 'DPhil', ''),
(28, 'DPhil', ''),
(29, 'DS', ''),
(30, 'DSurg', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_firstname` varchar(255) NOT NULL,
  `doctor_lastname` varchar(255) NOT NULL,
  `doctor_sex` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_age` int(11) NOT NULL,
  `doctor_degree` varchar(255) NOT NULL,
  `doctor_affiliations` varchar(255) NOT NULL,
  `doctor_languages` varchar(255) NOT NULL,
  `doctor_awards` varchar(255) NOT NULL,
  `doctor_memberships` varchar(255) NOT NULL,
  `doctor_office_country` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `doctor_office_address` varchar(255) NOT NULL,
  `doctor_office_state` varchar(255) NOT NULL,
  `doctor_office_city` varchar(255) NOT NULL,
  `doctor_office_zip` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `terms` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `display_image` varchar(255) NOT NULL,
  `visitation` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `doctor_experience` varchar(255) NOT NULL,
  `about_doctor` varchar(1000) NOT NULL,
  `clinic_id` varchar(255) NOT NULL,
  `hospital_id` varchar(255) NOT NULL,
  `medical_id` varchar(255) NOT NULL,
  `working_time` varchar(1000) NOT NULL,
  `break_time` varchar(1000) NOT NULL,
  `vacation_time` varchar(1000) DEFAULT NULL,
  `cost_duration` varchar(255) NOT NULL,
  `time_duration` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type_selection` varchar(255) NOT NULL,
  `profile_status` int(11) NOT NULL,
  `features_status` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `trial_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `time_duration` (`time_duration`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_firstname`, `doctor_lastname`, `doctor_sex`, `email`, `doctor_age`, `doctor_degree`, `doctor_affiliations`, `doctor_languages`, `doctor_awards`, `doctor_memberships`, `doctor_office_country`, `password`, `doctor_office_address`, `doctor_office_state`, `doctor_office_city`, `doctor_office_zip`, `specialty`, `terms`, `status`, `display_image`, `visitation`, `insurance`, `latitude`, `longitude`, `doctor_experience`, `about_doctor`, `clinic_id`, `hospital_id`, `medical_id`, `working_time`, `break_time`, `vacation_time`, `cost_duration`, `time_duration`, `phone`, `username`, `type_selection`, `profile_status`, `features_status`, `gallery_status`, `end_date`, `trial_date`) VALUES
(1, 'xxc', 'xczxc', 'male', 'xzcxx@gmail.com', 0, '', '', '', '', '', '', 'c121a8f3c5ece6134c429e098f461274', '', '', '', '99501', '', 'agreed', '1', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '9780671867', '', '', 0, 0, 0, '', '2017-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_gallery`
--

CREATE TABLE IF NOT EXISTS `doctor_gallery` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_gallery`
--

INSERT INTO `doctor_gallery` (`id`, `doctor_id`, `image`, `user_id`) VALUES
(2, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476966692_1-dr-vijay-ramachandran.jpg', 1),
(5, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476966840_1-praveen_gupta.JPG', 1),
(6, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476966844_1-Praveen-Dadireddy.jpg', 1),
(7, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476966852_1-dr-praveen-raj.jpg', 1),
(8, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476966858_1-pi_image1_78.jpg', 1),
(9, '7', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967030_1-Dr-Neeraj-Sharma.jpg', 1),
(10, '7', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967076_1-Dr__Reyaz_Ahmed.jpg', 1),
(11, '7', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967100_1-Dr__Inderpal.jpg', 1),
(12, '7', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967128_1-Dr__Suhail_M_Marfani.jpg', 1),
(13, '8', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967230_1-Anil-Kumar-Nandamuri.jpg', 1),
(14, '8', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967237_1-Obalon_Balloon.jpg', 1),
(15, '8', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967243_1-0_19692000_1475140426_dr-arun-kochar.jpg', 1),
(17, '8', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967255_1-photo6.JPG', 1),
(18, '9', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967414_1-our-doctors-gorseli.png', 1),
(19, '9', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967420_1-checkup-img-2_0.png', 1),
(20, '9', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967432_1-R-1.jpg', 1),
(21, '9', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967437_1-doctores.png', 1),
(22, '10', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967561_1-doctor_page_v4.png', 1),
(23, '10', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967571_1-Doctors.png', 1),
(24, '10', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967578_1-doctorsdf.png', 1),
(25, '10', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967585_1-sdsd.png', 1),
(27, '10', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476967660_1-1.png', 1),
(32, '1', 'uploads/1044750-FAWAD-1455170009-405-640x480.jpg', 0),
(33, '1', 'uploads/1544958_929514980447557_6987021719070589591_n1.jpg', 0),
(34, '1', 'uploads/1044750-FAWAD-1455170009-405-640x480.jpg', 0),
(41, '63', 'uploads/2000.jpg', 0),
(44, '1', 'uploads/2000.jpg', 0),
(45, '1', 'uploads/foot1.jpg', 0),
(46, '71', 'uploads/Screen_Shot_2017-01-10_at_13.55.25.png', 0),
(47, '76', 'uploads/2-021.jpg', 0),
(48, '69', 'uploads/about-us-background.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_package`
--

CREATE TABLE IF NOT EXISTS `doctor_package` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_date` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `payment_gross` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_package`
--

INSERT INTO `doctor_package` (`id`, `doctor_id`, `package_id`, `status`, `created_date`, `confirmed_date`, `payment_date`, `txn_id`, `currency_code`, `payment_gross`, `client_email`, `payment_status`, `end_date`) VALUES
(4, 1, 2, '1', '2017-01-06 16:45:02', '2017-01-06', '2017-01-06 12:07:24', '36063593K2155684U', 'USD', '100.00', 'oliviajohn11@gmail.com', 'Completed', ''),
(6, 1, 9, '1', '2017-01-06 17:11:04', '2017-01-06', '2017-01-06 12:23:23', '0DC26081PV566445P', 'USD', '300.00', 'oliviajohn11@gmail.com', 'Completed', ''),
(9, 1, 2, '1', '2017-01-09 12:41:43', '2017-01-09', '2017-01-09 07:54:00', '3WB7500482147673A', 'USD', '100.00', 'oliviajohn11@gmail.com', 'Completed', '2017-04-09'),
(10, 1, 9, '1', '2017-01-09 12:43:45', '2017-01-09', '2017-01-09 07:56:11', '5L9230238A886592C', 'USD', '300.00', 'oliviajohn11@gmail.com', 'Completed', '2018-01-09'),
(11, 1, 9, '1', '2017-01-09 13:03:48', '2017-01-09', '2017-01-09 08:16:06', '59V73434TR666131L', 'USD', '300.00', 'oliviajohn11@gmail.com', 'Completed', '2018-01-09'),
(12, 1, 1, '1', '2017-01-09 17:03:09', '2017-01-09', '2017-01-09 12:15:26', '79K214554E4903701', 'USD', '50.00', 'oliviajohn11@gmail.com', 'Completed', '2017-02-08'),
(13, 1, 9, '0', '2017-01-10 15:40:34', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(1, 'Internet of Things World Forum', '2016-11-01', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(2, 'The Future of Money and Technology Summit', '2016-11-01', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(3, 'Chrome Dev Summit', '2015-11-26', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(4, 'The Lean Startup Conference', '2015-11-17', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(5, 'Web Submit for Developers', '2015-11-17', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `hospital_country` varchar(255) NOT NULL,
  `hospital_state` varchar(255) NOT NULL,
  `hospital_city` varchar(255) NOT NULL,
  `hospital_zip` varchar(255) NOT NULL,
  `visitation` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `hospital_awards` varchar(255) NOT NULL,
  `hospital_memberships` varchar(255) NOT NULL,
  `hospital_languages` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `about_hospital` varchar(255) NOT NULL,
  `hospital_affilliations` varchar(500) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `hospital_website` varchar(255) NOT NULL,
  `hospital_established_date` varchar(255) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `type_selection` varchar(255) NOT NULL,
  `profile_status` int(11) NOT NULL,
  `features_status` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL,
  `trial_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_name`, `hospital_address`, `hospital_country`, `hospital_state`, `hospital_city`, `hospital_zip`, `visitation`, `insurance`, `specialty`, `hospital_awards`, `hospital_memberships`, `hospital_languages`, `email`, `display_image`, `password`, `terms`, `status`, `latitude`, `longitude`, `about_hospital`, `hospital_affilliations`, `amenities`, `username`, `phone`, `hospital_website`, `hospital_established_date`, `parent_id`, `type_selection`, `profile_status`, `features_status`, `gallery_status`, `trial_date`, `end_date`) VALUES
(1, 'johns hopkins hospital', ' 1800 Orleans St, Baltimore, MD 21287, USA', '16', '35', '40', '21287', '12', '2', '2', 'State best hospital award', 'international hospital association', '9', 'johns@gmail.com', 'http://dev.tabibu.co.ke/uploads/hospital1.jpg', 'c33367701511b4f6020ec61ded352059', 'agreed', '1', '39.318', '-76.616', 'dd', '6', '1', '', '', '', '', 3, 'hospital', 1, 1, 1, '2017-01-08', '2017-01-08'),
(2, 'chris hani baragwanath hospital', '26 Chris Hani Rd, Johannesburg, 1860, South Africa', '20', '36', '41', '1860', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'State best hospital award', 'international hospital association', '8,28,29,30,31', 'chris@gmail.com', 'http://dev.tabibu.co.ke/uploads/hospital2.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '-26.258', '27.951', 'aa', '2', '3', '', '', '', '', 1, 'hospital', 1, 1, 1, '2017-01-24', '2017-01-24'),
(3, 'great ormond street hospital', 'Great Ormond St, London WC1N 3JH, UK', '17', '32', '37', '18605', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'State best hospital award', 'international hospital association', '8', 'ormond@gmail.com', 'http://dev.tabibu.co.ke/uploads/hospital3.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '51.403', '-0.101', 'aa', '2', '1', '', '', '', '', 0, 'individual', 1, 1, 1, '2017-01-24', '2017-01-24'),
(4, 'karolinska hospital', 'Karolinska Universitetssjukhuset, Karolinska vägen, 171 76 Solna, Sweden', '21', '37', '42', '17176', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'State best hospital award', 'international hospital association', '8,27', 'karolinska@gmail.com', 'http://dev.tabibu.co.ke/uploads/hospital4.jpg', 'b64efb80aea1a96478309adcc003a26f', 'agreed', '1', '59.369', '18.018', 'aa', '2', '2', '', '', '', '', 0, 'individual', 1, 1, 1, '2017-01-24', '2017-01-24'),
(5, 'fortis memorial research institute and hospital', 'Sector - 44, Opposite HUDA City Centre, Gurugram, Haryana 122002', '1', '2', '2', '122002', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'State best hospital award', 'international hospital association', '4,8', 'fortis@gmail.com', 'http://dev.tabibu.co.ke/uploads/hospital5.jpg', '205afb9453ee1a66449ea6564410f6d6', 'agreed', '1', '28.479', '77.034', 'aa', '3', '4', '', '', '', '', 0, 'individual', 1, 1, 1, '2017-01-24', '2017-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_gallery`
--

CREATE TABLE IF NOT EXISTS `hospital_gallery` (
  `id` int(11) NOT NULL,
  `hospital_id` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_gallery`
--

INSERT INTO `hospital_gallery` (`id`, `hospital_id`, `image`, `user_id`) VALUES
(5, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033006_1-Johns-Hopkins-Hospital.jpg', 1),
(6, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033011_1-ncb.jpg', 1),
(10, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033151_1-DSC04887.JPG', 1),
(11, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033158_1-endocrine_surgeons640.jpg', 1),
(12, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033166_1-Morgan_OHare.jpg', 1),
(13, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033495_1-BaragwanathHospitalThumbnail.jpg', 1),
(14, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033500_1-Chris-Hani-Gate.jpg', 1),
(15, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033508_1-thumbnail6b.png', 1),
(16, '2', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477033575_1-baragwanath_traumaslide2.jpg', 1),
(17, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034028_1-gosh1.jpg', 1),
(18, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034035_1-2127949f-9b5c-4477-95f4-8f764593c468.jpg', 1),
(19, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034040_1-gos-hospital-05-entrance.jpg', 1),
(20, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034044_1-p01hf5ky.jpg', 1),
(21, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034050_1-52086671_4f33ec27aa792.jpg', 1),
(22, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034056_1-image1.gif', 1),
(23, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034206_1-PA-26165720_778x436.jpg', 1),
(24, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034211_1-greatormond.jpg', 1),
(25, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034398_1-media_52709.jpg', 1),
(27, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034412_1-entrehall-u1_norr_2.jpg', 1),
(31, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477034512_1-ECMO-babypatient_2.jpg', 1),
(32, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035770_1-0_13666800_1457958401_fmri_fortis.jpg', 1),
(33, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035776_1-487606094.jpg', 1),
(34, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035781_1-FMRI.jpg', 1),
(35, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035789_1-large.jpg', 1),
(36, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035797_1-_1405155374972581659_140416534e1b9135d54fmri-logo-ed.jpg', 1),
(37, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035806_1-welcome.jpg', 1),
(38, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477035850_1-60374395875362488737982.jpg', 1),
(39, '1', 'http://dev.tabibu.co.ke/uploads/healthy-selfie_0.jpg', 0),
(40, '30', 'http://dev.tabibu.co.ke/uploads/healthy-selfie_0.jpg', 0),
(41, '30', 'http://dev.tabibu.co.ke/uploads/bB2.jpg', 0),
(43, '31', 'http://dev.tabibu.co.ke/uploads/1950.jpg', 0),
(44, '31', 'http://dev.tabibu.co.ke/uploads/2000.jpg', 0),
(45, '31', 'http://dev.tabibu.co.ke/uploads/foot1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_package`
--

CREATE TABLE IF NOT EXISTS `hospital_package` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL COMMENT 'hospital/medical/clinic',
  `package_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_date` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `payment_gross` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `hospital_type` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_package`
--

INSERT INTO `hospital_package` (`id`, `hospital_id`, `package_id`, `status`, `created_date`, `confirmed_date`, `payment_date`, `txn_id`, `currency_code`, `payment_gross`, `client_email`, `payment_status`, `hospital_type`, `end_date`) VALUES
(2, 31, 2, '1', '2017-01-09 11:26:06', '2017-01-09', '2017-01-09 06:38:30', '70N54925D04418050', 'USD', '500.00', 'oliviajohn11@gmail.com', 'Completed', 'hospital', ''),
(4, 2, 3, '1', '2017-01-09 11:47:50', '2017-01-09', '2017-01-09 07:00:28', '21V21856V96610505', 'USD', '1000.00', 'oliviajohn11@gmail.com', 'Completed', 'clinic', ''),
(9, 31, 3, '1', '2017-01-09 17:04:32', '2017-01-09', '2017-01-09 12:17:28', '86L94422RH5043142', 'USD', '1000.00', 'oliviajohn11@gmail.com', 'Completed', 'hospital', '2018-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_categories`
--

CREATE TABLE IF NOT EXISTS `insurance_categories` (
  `id` int(255) NOT NULL,
  `insurance_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_categories`
--

INSERT INTO `insurance_categories` (`id`, `insurance_name`) VALUES
(1, 'Aetna'),
(2, 'Aflac'),
(3, 'Berkshire Hathaway'),
(4, 'CareSource'),
(5, 'Combined Insurance'),
(6, 'Esurance'),
(7, 'Hanover Insurance'),
(8, 'Ironshore'),
(9, 'MetLife'),
(10, 'Mutual of Omaha'),
(11, 'Omega'),
(12, 'Pacific Life'),
(13, 'Apollo Munich Health Insurance'),
(14, 'Cholamandalam MS General Insurance'),
(15, 'Religare'),
(18, 'dth'),
(19, 'Religare'),
(21, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `language_categories`
--

CREATE TABLE IF NOT EXISTS `language_categories` (
  `id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_categories`
--

INSERT INTO `language_categories` (`id`, `language_name`) VALUES
(1, 'tamil'),
(2, 'malayalam'),
(3, 'telugu'),
(4, 'hindi'),
(5, 'kannada'),
(6, 'sinhala'),
(7, 'malay'),
(8, 'english'),
(9, 'bengali'),
(10, 'vietnamese'),
(11, 'russian'),
(12, 'korean'),
(13, 'burmese'),
(14, 'thai'),
(15, 'malaysian'),
(16, 'urdu'),
(17, 'marathi'),
(18, 'sindhi'),
(19, 'sanskrit'),
(20, 'nepali'),
(21, 'german'),
(22, 'french'),
(23, 'italian'),
(24, 'romansh'),
(25, 'cantonesse chinese'),
(26, 'mandarin chinese'),
(27, 'swedish'),
(28, 'afrikaans'),
(29, 'xhosa'),
(30, 'zulu'),
(31, 'venda'),
(32, 'abc'),
(38, 'malayalam');

-- --------------------------------------------------------

--
-- Table structure for table `language_set`
--

CREATE TABLE IF NOT EXISTS `language_set` (
  `id` int(11) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_set`
--

INSERT INTO `language_set` (`id`, `languages`, `code`, `created_date`) VALUES
(0, 'default', '', '2017-01-13 19:50:25'),
(5, 'tamil', '', '2017-01-13 10:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `medical_center`
--

CREATE TABLE IF NOT EXISTS `medical_center` (
  `id` int(11) NOT NULL,
  `medical_name` varchar(255) NOT NULL,
  `medical_address` varchar(255) NOT NULL,
  `medical_country` varchar(255) NOT NULL,
  `medical_state` varchar(255) NOT NULL,
  `medical_city` varchar(255) NOT NULL,
  `medical_zip` varchar(255) NOT NULL,
  `visitation` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_image` varchar(255) NOT NULL,
  `medical_languages` varchar(255) NOT NULL,
  `medical_awards` varchar(255) NOT NULL,
  `medical_memberships` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `about_medical` varchar(255) NOT NULL,
  `medical_affilliations` varchar(255) NOT NULL,
  `amenities` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `medical_established_date` varchar(255) NOT NULL,
  `medical_website` varchar(255) NOT NULL,
  `type_selection` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `profile_status` int(11) NOT NULL,
  `features_status` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL,
  `trial_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_center`
--

INSERT INTO `medical_center` (`id`, `medical_name`, `medical_address`, `medical_country`, `medical_state`, `medical_city`, `medical_zip`, `visitation`, `insurance`, `specialty`, `email`, `display_image`, `medical_languages`, `medical_awards`, `medical_memberships`, `password`, `terms`, `status`, `latitude`, `longitude`, `about_medical`, `medical_affilliations`, `amenities`, `username`, `phone`, `medical_established_date`, `medical_website`, `type_selection`, `parent_id`, `profile_status`, `features_status`, `gallery_status`, `trial_date`, `end_date`) VALUES
(1, 'kovai medical center', 'indira nagar,civil aerodrome', '1', '6', '10', '641001', '12', '13', '5', 'kmch@gmail.com', 'http://dev.tabibu.co.ke/uploads/medical1.jpg', '13', 'State best healthcare center award', 'tamilnadu healthcenter ', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '11.047', '77.043', 'niz', '6', '9', '', '', '', '', 'individual', 2, 1, 1, 1, '2017-01-24', '2017-01-24'),
(2, 'texas medical center', '145 W UNIV PKWY', '16', '31', '36', '73301 ', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'texamed@gmail.com', 'http://dev.tabibu.co.ke/uploads/medical2.jpg', '8', 'State best healthcare center award', 'US healthcenter association', 'ffb6c58fc852939c463fe99cc80a06e8', 'agreed', '1', '29.751', '-95.309', 'saa', '3', '13', '', '', '', '', 'individual', 3, 1, 1, 1, '2017-01-24', '2017-01-24'),
(3, 'Bumrungrad International medical center', '33 soi sukhumuit 3,khlong toei nuea,watthana', '15', '30', '35', '10160', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'bum@gmail.com', 'http://dev.tabibu.co.ke/uploads/medical3.jpg', '8,14', 'State best healthcare center award', 'Thailand healthcenter association', 'e10adc3949ba59abbe56e057f20f883e', 'agreed', '1', '13.752', '100.560', 'goood', '5', '5', '', '', '', '', 'individual', 1, 1, 1, 1, '2017-01-24', '2017-01-24'),
(4, 'Klinik Hirslanden ', 'Witellikerstrasse 40, 8032 Zürich, Switzerland', '19', '34', '39', '8000', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'klinik@gmail.com', 'http://dev.tabibu.co.ke/uploads/medical4.jpg', '8,21,22,23,24', 'State best healthcare center award', 'Switzerland health center association', 'b9e6bea049953ede220418fef3ae1baa', 'agreed', '1', '47.378', '8.546', 'aa', '3', '2', '', '', '', '', 'individual', 2, 1, 1, 1, '2017-01-24', '2017-01-24'),
(5, 'Matilda medical center(central)', '502, Prosperity Tower, 39 Queen''s Road Central, Central, Hong Kong', '18', '33', '38', '852', '1,2,3,5,6,8,9,10,11,12,13,16,17,18,19', '1,2,3,4,5,6', '1,2,3,4,5,6,7,8,9,10', 'matilda@gmail.com', 'http://dev.tabibu.co.ke/uploads/medical5.jpg', '8,25,26', 'State best healthcare center award', 'hongkong health center association', '91f2b7dfd8fc3d900133c356f92c4e20', 'agreed', '0', '22.361', '114.157', 'gud', '4', '5', '', '', '', '', 'individual', 3, 1, 1, 1, '2017-01-24', '2017-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `medical_gallery`
--

CREATE TABLE IF NOT EXISTS `medical_gallery` (
  `id` int(11) NOT NULL,
  `medical_id` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_gallery`
--

INSERT INTO `medical_gallery` (`id`, `medical_id`, `image`, `user_id`) VALUES
(5, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476969865_1-2.jpg', 1),
(6, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476969877_1-banner3.jpg', 1),
(7, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476969882_1-chairman.jpg', 1),
(8, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476969888_1-slide_1.jpg', 1),
(9, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1476969977_1-1418636227coimbatore-medical.jpg', 1),
(10, '1', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028344_1-slide_1.jpg', 1),
(11, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028863_1-bumrungrad.jpg', 1),
(12, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028870_1-surgery_thailand1a.jpg', 1),
(13, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028877_1-bangkok-health-care.jpg', 1),
(14, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028883_1-bumrungrad1.jpg', 1),
(15, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028892_1-Tour-of-Bumrungrad-International-Hospital-Header-1000px.jpg', 1),
(17, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028906_1-photo_3.JPG', 1),
(18, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477028912_1-PR-26.png', 1),
(19, '3', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477029518_1-AIMC-Clinic-Enters-Agreement-With-Thai-International-Hospital1.jpg', 1),
(20, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477029723_1-Klinik_Hirslanden_Zuerich_2009.jpg', 1),
(21, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477029728_1-teaserbreit.jpg', 1),
(22, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477030394_1-best_clinic_hirslanden_zurich_entrance-942.jpg', 1),
(23, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477030409_1-enzenbuehltrakt2.JPG', 1),
(24, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477030419_1-privatklinik_hirslanden_08.jpg', 1),
(25, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477030430_1-2136951_0_20adb1d8.jpg', 1),
(27, '4', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477030455_1-hirslanden-eingang.jpg', 1),
(31, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477032270_1-120310_main.jpg', 1),
(32, '5', 'http://192.168.138.31/Immanuel/BMD/CI-admin-structure-adminLTE/assets/uploads/img/1477032277_1-Matilda_International_Hospital.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otptable`
--

CREATE TABLE IF NOT EXISTS `otptable` (
  `type` varchar(23) NOT NULL,
  `id` varchar(23) NOT NULL,
  `otp` varchar(23) NOT NULL,
  `lastupdate` datetime NOT NULL,
  UNIQUE KEY `phone` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otptable`
--

INSERT INTO `otptable` (`type`, `id`, `otp`, `lastupdate`) VALUES
('doctor', '1', '123', '0000-00-00 00:00:00'),
('patient', '0', '123', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` varchar(255) NOT NULL,
  `package_period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_price`, `package_period`) VALUES
(1, 'silver', '$50', '25 days'),
(2, 'gold', '$100', '3 months'),
(9, 'diamond', '$300', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL,
  `patient_firstname` varchar(255) NOT NULL,
  `patient_lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `patient_sex` varchar(255) NOT NULL,
  `terms` varchar(11) NOT NULL,
  `patient_display_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `visitation` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `profile_status` int(11) NOT NULL,
  `features_status` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL,
  `trial_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_firstname`, `patient_lastname`, `email`, `password`, `patient_sex`, `terms`, `patient_display_image`, `username`, `marital_status`, `dob`, `phone`, `country`, `state`, `city`, `zip`, `address`, `languages`, `insurance`, `age`, `visitation`, `status`, `profile_status`, `features_status`, `gallery_status`, `trial_date`, `end_date`) VALUES
(0, 'Dharmandar', 'Verma', 'dharmandarjob@gmail.com', '0192023a7bbd73250516f069df18b500', 'male', 'agreed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', ''),
(0, 'Rupinder', 'Singh', 'dev@gmail.com', '59d986bbc1343a73e0fa1cc591740a62', 'male', 'agreed', '', '', '', '', '1486949654', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', ''),
(0, 'Rupinder', 'Singh', 'singhrupinder823@gmail.com', '1c483a8086a59f84385a879b9c5e60b2', 'male', 'agreed', '', '', '', '', '1486961433', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', ''),
(0, 'dharmandar', 'kumar', 'dharmandarjob@gmail.com', 'cd84d683cc5612c69efe115c80d0b7dc', 'male', 'agreed', '', '', '', '', '8699018898', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating_clinic`
--

CREATE TABLE IF NOT EXISTS `rating_clinic` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `clinic_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_clinic`
--

INSERT INTO `rating_clinic` (`id`, `review`, `rating`, `clinic_id`, `patient_id`, `date`) VALUES
(1, 'good', '4', '1', '1', '26-09-2016');

-- --------------------------------------------------------

--
-- Table structure for table `rating_doctor`
--

CREATE TABLE IF NOT EXISTS `rating_doctor` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_doctor`
--

INSERT INTO `rating_doctor` (`id`, `review`, `rating`, `doctor_id`, `patient_id`, `date`) VALUES
(1, 'good', '4', '1', '1', '26-09-2016'),
(2, 'ok', '3', '1', '1', '26-09-2016'),
(3, 'ok', '3', '2', '1', '26-09-2016'),
(4, 'really good', '3', '7', '1', '26-09-2016'),
(5, 'very good', '5', '9', '1', '26-09-2016'),
(6, 'good', '5', '9', '1', '26-09-2016'),
(8, 'good', '5', '2', '2', '03-12-2016'),
(9, 'good', '3', '2', '1', '17-01-02'),
(10, 'gfgfg', '3', '65', '1', '17-01-03'),
(11, 'worst', '1', '9', '1', '17-01-03'),
(12, 'super', '4', '9', '1', '17-01-03'),
(13, 'sds', '5', '9', '1', '17-01-03'),
(14, 'asadd', '3', '76', '66', '17-01-12'),
(15, 'qqq\r\n', '', '10', '71', '17-01-13'),
(16, 'qqq\r\n', '', '10', '71', '17-01-13'),
(17, 'ok', '5', '64', '56', '17-01-14'),
(18, 'test', '4', '69', '56', '17-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `rating_hospital`
--

CREATE TABLE IF NOT EXISTS `rating_hospital` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `hospital_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_hospital`
--

INSERT INTO `rating_hospital` (`id`, `review`, `rating`, `hospital_id`, `patient_id`, `date`) VALUES
(1, 'good', '5', '1', '1', '26-09-2016'),
(2, 'worst', '4', '2', '40', '26-09-2016');

-- --------------------------------------------------------

--
-- Table structure for table `rating_medical`
--

CREATE TABLE IF NOT EXISTS `rating_medical` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `medical_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_medical`
--

INSERT INTO `rating_medical` (`id`, `review`, `rating`, `medical_id`, `patient_id`, `date`) VALUES
(4, 'bad', '5', '2', '1', '2016-12-3'),
(8, 'worst', '5', '4', '1', '2016-12-3');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `sender_id` varchar(250) NOT NULL,
  `sms_username` varchar(250) NOT NULL,
  `sms_password` varchar(250) NOT NULL,
  `paypal` varchar(250) NOT NULL,
  `paypalid` varchar(251) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `favicon`, `smtp_username`, `smtp_host`, `smtp_password`, `sender_id`, `sms_username`, `sms_password`, `paypal`, `paypalid`, `admin_email`, `languages`) VALUES
(1, 'Bookmydoc', 'http://dev.tabibu.co.ke/admin//assets/uploads/logo/1486315870_1486263158_ultrasom.png', 'http://dev.tabibu.co.ke/admin//assets/uploads/favicons/1484548460_fav__icon.png', 'no-reply@techware.in', 'mail.techware.in', 'Golden@reply', '101', 'manu', '676', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'shajeermhmmd@gmail.com', 'no-reply@techware.in', '0');

-- --------------------------------------------------------

--
-- Table structure for table `specialty_categories`
--

CREATE TABLE IF NOT EXISTS `specialty_categories` (
  `id` int(11) NOT NULL,
  `specialty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialty_categories`
--

INSERT INTO `specialty_categories` (`id`, `specialty_name`) VALUES
(1, 'Pediatrics'),
(2, 'Audiology'),
(3, 'General Medicine'),
(4, 'Family Medicine'),
(5, 'Cardiology'),
(6, 'Chemical Pathology'),
(7, 'Dentistry'),
(8, 'Diagnostic Radiology'),
(9, 'Electrodiagnostic Medicine'),
(10, 'Gastroenterology'),
(11, 'Hematology'),
(12, 'Massage Therapy'),
(13, 'Maternal-Fetal Medicine'),
(14, 'Nephrology'),
(15, 'Neurology'),
(16, 'Diabetology'),
(23, 'manu manu'),
(24, 'rajkumar'),
(33, 'Diabetologyy'),
(35, 'sdf'),
(36, 'zsdds');

-- --------------------------------------------------------

--
-- Table structure for table `state_categories`
--

CREATE TABLE IF NOT EXISTS `state_categories` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_categories`
--

INSERT INTO `state_categories` (`id`, `state_name`, `country_id`) VALUES
(1, 'assam', '1'),
(2, 'haryana', '1'),
(3, 'west bengal', '1'),
(4, 'delhi', '1'),
(5, 'kerala', '1'),
(6, 'tamilnadu', '1'),
(7, 'rajasthan', '1'),
(8, 'maharastra', '1'),
(9, 'utter pradesh', '1'),
(10, 'gujarat', '1'),
(11, 'jammu and kashmir', '1'),
(12, 'odisha', '1'),
(13, 'punjab', '1'),
(14, 'andhra pradesh', '1'),
(15, 'telangana', '1'),
(16, 'colombo', '2'),
(17, 'zhejiang', '3'),
(18, 'Islamabad', '4'),
(19, 'chittagong', '5'),
(20, 'simei', '6'),
(21, 'hanoi', '7'),
(22, 'kuala lampur', '8'),
(23, 'moscow', '9'),
(24, 'ulsan', '10'),
(25, 'rason', '11'),
(26, 'glasgow', '12'),
(27, 'kabul', '13'),
(28, 'pyay', '14'),
(29, 'pattaya', '15'),
(30, 'bangkok', '15'),
(31, 'texas', '16'),
(32, 'london', '17'),
(33, 'central', '18'),
(34, 'zurich', '19'),
(35, 'missouri', '16'),
(36, 'johannesburg', '20'),
(37, 'solna', '21'),
(40, 'kashmir', '1'),
(42, 'keralaa', '1'),
(43, 'Parana', '21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`) VALUES
(1, 'facebook', '1833727043562902', 'Rupinder', 'Singh', 'singhrupinder823@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/15032193_1794020657533541_6826374796240114949_n.jpg?oh=eb37690183859ce78628d195a442ba36&oe=593572EA', 'https://www.facebook.com/1833727043562902', '2017-02-06 08:09:35', '2017-02-11 07:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `visit_categories`
--

CREATE TABLE IF NOT EXISTS `visit_categories` (
  `id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `specialty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit_categories`
--

INSERT INTO `visit_categories` (`id`, `reason`, `specialty_id`) VALUES
(1, 'Pregnency Problems', '1'),
(2, 'Hearing Problems', '2'),
(3, 'Heart Problems', '5'),
(4, 'Brain damages', '15'),
(5, 'Aches, Pain, Fever', '4'),
(6, 'Tooth Problems ', '7'),
(7, 'High Risk Pregnencies', '13'),
(8, 'Acne', '4'),
(9, 'Tuberclosis(TB)', '3'),
(10, 'Adolescents (Teenagers)', '4'),
(11, 'AIDS (Acquired Immunodeficiency Syndrome (AIDS))', '3'),
(12, 'Alcohol Abuse and Alcoholism', '4'),
(13, 'Alcohol Poisoning in Teens (Alcohol and Teens)', '3'),
(14, 'Blood disorder', '11'),
(15, 'Pain Relief', '12'),
(16, 'Diarrhea', '10'),
(17, 'Abdominal pain or bloating', '10'),
(18, 'X-Ray', '8'),
(19, 'cardiovascular risk', '6'),
(20, 'Kidney Problems', '14'),
(21, 'High blood pressure', '16'),
(22, 'Blood suagr and kidney pain ', '16'),
(24, 'errrer', '2'),
(25, 'errrer', '2'),
(26, 'sseerr', '2'),
(27, 'sseerr', '2'),
(28, 'sseerr', '2'),
(29, 'sseerr', '2'),
(30, 'sseerr', '2'),
(31, 'sseerr', '2'),
(32, 'sseerr', '2'),
(33, 'sseerr', '2'),
(34, 'sseerr', '2'),
(35, 'sseerr', '2'),
(36, 'sseerr', '2'),
(37, 'errrer', '2'),
(38, 'errrer', '2'),
(39, 'errrer', '2'),
(40, 'errrer', '2'),
(41, 'errrer', '2'),
(42, 'errrer', '2'),
(43, 'errrer', '2'),
(44, 'errrer', '2'),
(45, 'errrerde', '2'),
(46, 'sdcd', '1'),
(47, 'sdsa', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
