-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 06:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `owom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(20) NOT NULL,
  `a_number` varchar(200) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL,
  `a_dpic` varchar(200) NOT NULL,
  `a_bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_number`, `a_name`, `a_email`, `a_pwd`, `a_dpic`, `a_bio`) VALUES
(1, 'TKSJ1U', 'System Admin', 'sujan@sujan.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'WIN_20200817_14_45_02_Pro.jpg', '<ul>\r\n	<li>Fullstack Developer</li>\r\n	<li>Software Engineer</li>\r\n	<li>Bugs bounty hunter</li>\r\n	<li>Graphic Designer</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(20) NOT NULL,
  `b_date` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `b_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `c_id` varchar(200) NOT NULL,
  `a_id` varchar(200) NOT NULL,
  `cc_id` varchar(200) NOT NULL,
  `s_id` varchar(200) NOT NULL,
  `instrument_id` varchar(200) NOT NULL,
  `instrument_name` varchar(200) NOT NULL,
  `instrument_type` varchar(200) NOT NULL,
  `instrument_regno` varchar(200) NOT NULL,
  `b_duration` varchar(200) NOT NULL,
  `instrument_price` varchar(200) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_natidno` varchar(200) NOT NULL,
  `c_phone` varchar(200) NOT NULL,
  `b_number` varchar(200) NOT NULL,
  `b_payment` varchar(200) NOT NULL,
  `b_instrument_return_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `b_date`, `b_status`, `c_id`, `a_id`, `cc_id`, `s_id`, `instrument_id`, `instrument_name`, `instrument_type`, `instrument_regno`, `b_duration`, `instrument_price`, `c_name`, `c_natidno`, `c_phone`, `b_number`, `b_payment`, `b_instrument_return_status`) VALUES
(36, '2020-08-20 08:10:43.2654', 'Approved', '12', '', '1234', '', '34', 'Pearl', 'drums', '1232', '7', '4000', 'sujan raj nal', '147', '9851194675', 'RIBN-9427 ', 'Paid', 'Returned'),
(37, '2020-08-20 09:01:41.2156', 'Approved', '12', '', '1234', '', '34', 'Pearl', 'drums', '1232', '4', '4000', 'sujan raj nal', '147', '9851194675', 'YQLG-4273 ', '', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_natidno` varchar(200) NOT NULL,
  `c_phone` varchar(200) NOT NULL,
  `c_dob` varchar(200) NOT NULL,
  `c_adr` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_pwd` varchar(200) NOT NULL,
  `c_dpic` varchar(200) NOT NULL,
  `c_number` varchar(200) NOT NULL,
  `c_bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_name`, `c_natidno`, `c_phone`, `c_dob`, `c_adr`, `c_email`, `c_pwd`, `c_dpic`, `c_number`, `c_bio`) VALUES
(11, 'sujan', '1233', '9851194675', '20-3-2020', 'kathmandu', 'shrestha.sujan2222@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'WIN_20200817_14_45_03_Pro.jpg', 'CRMS-C-ZCHR-6270 ', ''),
(12, 'sujan raj nal', '147', '9851194675', '20-3-2020', 'kathmandu', 'sujan@sujan.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'WIN_20200817_14_45_03_Pro.jpg', 'CRMS-C-WUHI-8610 ', ''),
(13, 'sujan', '35575690', '9851194675', '20-3-2020', 'kathmandu', 'sujan@sujan.ap', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'header-241.jpg', 'YSJZ-4218 ', ''),
(14, 'John cena', '123', '9851194675', '20-3-2020', 'kathmandu', 'sajan@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '98f8af88d80dd95985efd0c710b883d0.jpg', 'OUHP-3516 ', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `f_id` int(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_number` varchar(200) NOT NULL,
  `feedback` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrument_id` int(20) NOT NULL,
  `instrument_cat_id` varchar(200) NOT NULL,
  `instrument_regno` varchar(200) NOT NULL,
  `instrument_name` varchar(200) NOT NULL,
  `instrument_type` varchar(200) NOT NULL,
  `instrument_price` varchar(200) NOT NULL,
  `instrument_features` longtext NOT NULL,
  `exterior_img` varchar(200) NOT NULL,
  `interior_img` varchar(200) NOT NULL,
  `rear_img` varchar(200) NOT NULL,
  `front_img` varchar(200) NOT NULL,
  `instrument_status` varchar(200) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `instrument_cat_id`, `instrument_regno`, `instrument_name`, `instrument_type`, `instrument_price`, `instrument_features`, `exterior_img`, `interior_img`, `rear_img`, `front_img`, `instrument_status`) VALUES
(32, 'asdsda', '123', 'jp majesty', 'guitar', '1200', '<p>Great guiatr of lord himself.</p>\r\n', 'JPM6EF-large.jpg', 'download.jpg', 'EBMM-john-petrucci-majesty-tiger-eye-hero@1400x1050.jpg', 'header-241.jpg', 'Available'),
(33, '123', '123', 'Abasi 32 ', 'guitar', '1200', '<p>Abasi guitars fresh in town.</p>\r\n', 'do6kx27l1ftj6ah0xsul.jpg', '98f8af88d80dd95985efd0c710b883d0.jpg', 'Abasi-Guitars-Larada-8-in-Olympic-White-.jpg', 'rZA9mrHQwnPDC6pmRUP4Sd.jpg', 'Available'),
(34, '1234', '1232', 'Pearl', 'drums', '4000', '<p>Pearl jam drums. Will make you rock on.</p>\r\n', '71rcLXxb9JL._AC_SL1500_.jpg', '14593933_800.jpg', 'Pearl-Roadshow-Pink-Metallic.jpg', 'roland-vad506-v-drum.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `instrument_categories`
--

CREATE TABLE `instrument_categories` (
  `instrument_cat_id` int(20) NOT NULL,
  `instrument_cat_name` varchar(200) NOT NULL,
  `instrument_cat_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instrument_categories`
--

INSERT INTO `instrument_categories` (`instrument_cat_id`, `instrument_cat_name`, `instrument_cat_desc`) VALUES
(1, 'guitar', 'Made up of strings can play beautifully.'),
(2, 'piano', 'going with the flow.'),
(3, 'bass', 'For proper timing.'),
(4, 'flute', 'classical music for emotional connection.'),
(5, 'violin ', 'classial note.'),
(6, 'drums', 'Best fro beats.\r\n'),
(7, 'cello', 'big violin for more vibrant sound.');

-- --------------------------------------------------------

--
-- Table structure for table `instrument_payments`
--

CREATE TABLE `instrument_payments` (
  `p_id` int(20) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `b_duration` varchar(200) NOT NULL,
  `p_amt` varchar(200) NOT NULL,
  `instrument_id` varchar(200) NOT NULL,
  `instrument_cat_id` varchar(200) NOT NULL,
  `instrument_regno` varchar(200) NOT NULL,
  `instrument_type` varchar(200) NOT NULL,
  `instrument_name` varchar(200) NOT NULL,
  `c_id` varchar(200) NOT NULL,
  `a_id` varchar(200) NOT NULL,
  `c_natidno` varchar(200) NOT NULL,
  `p_code` varchar(200) NOT NULL,
  `p_method` varchar(200) NOT NULL,
  `p_ref_number` varchar(200) NOT NULL,
  `p_date` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instrument_payments`
--

INSERT INTO `instrument_payments` (`p_id`, `c_name`, `b_duration`, `p_amt`, `instrument_id`, `instrument_cat_id`, `instrument_regno`, `instrument_type`, `instrument_name`, `c_id`, `a_id`, `c_natidno`, `p_code`, `p_method`, `p_ref_number`, `p_date`) VALUES
(23, 'sujan raj nal', '7', '28000', '34', '1234', '1232', 'drums', 'Pearl', '12', '', '147', 'QCXO-3940 ', 'Mpesa', '13123123123', '2020-08-20 08:10:26.0624');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_resets`
--

CREATE TABLE `pwd_resets` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(20) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_natidno` varchar(200) NOT NULL,
  `s_phone` varchar(200) NOT NULL,
  `s_adr` varchar(200) NOT NULL,
  `s_no` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_pwd` varchar(200) NOT NULL,
  `s_dpic` varchar(200) NOT NULL,
  `s_bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `s_natidno`, `s_phone`, `s_adr`, `s_no`, `s_email`, `s_pwd`, `s_dpic`, `s_bio`) VALUES
(9, 'sajan silwal12', '123123', '999154', 'kathmandu', 'CRMS-S-SCJP-9532', 'sujan@sujan.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'WIN_20200817_14_45_03_Pro.jpg', ''),
(10, 'sujan joshi raj', '123123', '9851194675', 'kritipur', 'CRMS-S-PZFV-9805', 'shrestha.sujan2222@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'header-241.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `instrument_categories`
--
ALTER TABLE `instrument_categories`
  ADD PRIMARY KEY (`instrument_cat_id`);

--
-- Indexes for table `instrument_payments`
--
ALTER TABLE `instrument_payments`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pwd_resets`
--
ALTER TABLE `pwd_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrument_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `instrument_categories`
--
ALTER TABLE `instrument_categories`
  MODIFY `instrument_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instrument_payments`
--
ALTER TABLE `instrument_payments`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pwd_resets`
--
ALTER TABLE `pwd_resets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
