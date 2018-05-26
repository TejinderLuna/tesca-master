-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 03:31 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesca`
--
CREATE DATABASE IF NOT EXISTS `tesca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tesca`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(100) NOT NULL,
  `announcement_type` varchar(100) NOT NULL,
  `announcement_desc` text NOT NULL,
  `announcement_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `announcement_by_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_type`, `announcement_desc`, `announcement_date`, `announcement_by_user_id`) VALUES
(1, 'highimp', 'why terriefied', '2017-12-17 21:35:19', 1),
(4, 'critical', 'fireeeeeeeeeeeeeee', '2018-01-04 09:56:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `apt_id` int(100) NOT NULL,
  `apt_number` int(11) NOT NULL,
  `apt_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`apt_id`, `apt_number`, `apt_status`) VALUES
(2, 8600, 'underrenovation'),
(3, 89000, 'tolet');

-- --------------------------------------------------------

--
-- Table structure for table `apt_ownership_history`
--

CREATE TABLE `apt_ownership_history` (
  `ownership_history_id` int(100) NOT NULL,
  `apt_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_lease_started` datetime NOT NULL,
  `date_lease_ended` datetime NOT NULL,
  `is_current_tenant` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apt_ownership_history`
--

INSERT INTO `apt_ownership_history` (`ownership_history_id`, `apt_id`, `user_id`, `date_lease_started`, `date_lease_ended`, `is_current_tenant`, `date_created`, `date_modified`) VALUES
(1, 2, 11, '2018-01-15 00:00:00', '2018-01-15 00:00:00', 1, '2018-01-14 12:10:37', '2018-01-14 12:10:37'),
(2, 3, 11, '2018-01-14 00:00:00', '2018-01-15 00:00:00', 0, '2018-01-14 12:10:37', '2018-01-14 12:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `apt_rental_dues`
--

CREATE TABLE `apt_rental_dues` (
  `dues_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `apt_id` int(100) NOT NULL,
  `date_rent_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nature_of_due` varchar(100) NOT NULL,
  `due_desc` text NOT NULL,
  `due_amt` int(11) NOT NULL,
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(100) NOT NULL,
  `asset_type` varchar(100) NOT NULL,
  `asset_name` varchar(100) NOT NULL,
  `asset_qty` varchar(100) NOT NULL,
  `asset_purchase_date` varchar(100) NOT NULL,
  `asset_vendor_name` varchar(100) NOT NULL,
  `asset_unit_price` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asset_unit_of_measure` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset_type`, `asset_name`, `asset_qty`, `asset_purchase_date`, `asset_vendor_name`, `asset_unit_price`, `date_created`, `date_modified`, `asset_unit_of_measure`) VALUES
(1, 'electronics', 'pc', '3', '2017-12-12', 'electra', '34', '2017-12-17 21:18:56', '2017-12-17 21:18:56', 'lbs'),
(4, 'Furniture', 'chair', '5', '2018-01-04', 'hi life', '68', '2018-01-04 09:56:12', '2018-01-04 09:56:12', 'lbs');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `dept_id` varchar(100) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `apt_id` int(100) NOT NULL,
  `complaints_dept` varchar(100) NOT NULL,
  `complaint_severity` varchar(100) NOT NULL,
  `complaint_desc` text NOT NULL,
  `complaint_img` varchar(500) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complaint_status` varchar(100) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `user_id`, `apt_id`, `complaints_dept`, `complaint_severity`, `complaint_desc`, `complaint_img`, `date_created`, `date_modified`, `complaint_status`) VALUES
(2, 11, 2, 'Maintenance', 'high', 'asdqaAX', 'noimgavailable.jpg', '2018-01-14 14:09:07', '2018-01-14 14:09:07', 'open'),
(5, 11, 2, 'Administration', 'low', 'sdfdsf', 'noimgavailable.jpg', '2018-01-14 14:29:31', '2018-01-14 14:29:31', 'open'),
(6, 11, 2, 'Security', 'low', 'sdfsdf', 'noimgavailable.jpg', '2018-01-14 14:31:03', '2018-01-14 14:31:03', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_escalations`
--

CREATE TABLE `complaint_escalations` (
  `complaint_esc_id` int(100) NOT NULL,
  `complaint_id` int(100) NOT NULL,
  `dept_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `comments` text,
  `date_escalated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `dept_desc`) VALUES
(1, 'computer', 'it department'),
(3, 'Accountant', 'hui'),
(4, 'ci9', 'sfsdsd'),
(5, '7777', 'sdahsdasd');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `thread_id` int(100) NOT NULL,
  `thread_created_by_user_id` int(100) NOT NULL,
  `thread_topic` varchar(100) NOT NULL,
  `thread_created_date` datetime NOT NULL,
  `thread_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(100) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_type` varchar(100) NOT NULL,
  `doc_img` longblob,
  `user_id` int(100) NOT NULL,
  `apt_id` int(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `feedback_desc` text NOT NULL,
  `feedback_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `first_name`, `last_name`, `email_id`, `contact_num`, `feedback_desc`, `feedback_date`) VALUES
(1, 'hkhjjjkjnmmmnmnn', '-', 'tajinderluna@gmail.com', '4379966414', 'jlkjljlj', '2017-12-17 19:15:32'),
(2, 'sASas', 'ASs', 'tajinderluna@gmail.com', '4379966414', 'ssdad', '2017-12-17 21:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `inv_id` int(100) NOT NULL,
  `inv_name` varchar(100) NOT NULL,
  `inv_qty` int(11) NOT NULL,
  `inv_purchase_date` datetime NOT NULL,
  `inv_vendor_name` varchar(100) NOT NULL,
  `inv_unit_prce` int(11) NOT NULL,
  `inv_unit_of_measure` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(100) NOT NULL,
  `notice_sub` varchar(100) NOT NULL,
  `notice_desc` varchar(100) NOT NULL,
  `issued_by_user_id` int(100) NOT NULL,
  `raised_to_user_id` int(100) NOT NULL,
  `notice_issue_date` datetime NOT NULL,
  `notice_deadline_date` datetime NOT NULL,
  `notice_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parking_permits`
--

CREATE TABLE `parking_permits` (
  `permit_id` int(100) NOT NULL,
  `permit_type` varchar(100) NOT NULL,
  `permit_holder_user_id` int(100) NOT NULL,
  `permit_holder_name` varchar(100) NOT NULL,
  `permit_valid_from_date` varchar(20) NOT NULL,
  `permit_valid_till_date` varchar(20) NOT NULL,
  `permit_issue_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_permits`
--

INSERT INTO `parking_permits` (`permit_id`, `permit_type`, `permit_holder_user_id`, `permit_holder_name`, `permit_valid_from_date`, `permit_valid_till_date`, `permit_issue_date`) VALUES
(1, 'visitor', 1, 'asdasd', '2016-12-02', '2019-02-02', '2018-01-14 11:00:38'),
(3, 'tenant', 1, 'voui', '2018-01-14', '2018-01-15', '2018-01-14 11:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `rental_payment_details`
--

CREATE TABLE `rental_payment_details` (
  `payment_txn_id` int(100) NOT NULL,
  `apt_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `payment_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(50) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rental_payment_details`
--

INSERT INTO `rental_payment_details` (`payment_txn_id`, `apt_id`, `user_id`, `payment_date_time`, `payment_month`, `payment_mode`, `payment_amt`) VALUES
(1, 2, 11, '2018-01-14 17:48:59', 'January', 'Mastercard', 500);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(100) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `sub_cat_desc` text NOT NULL,
  `cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `home_phone` varchar(12) NOT NULL DEFAULT '-',
  `alternate_phone` varchar(12) NOT NULL DEFAULT '-',
  `cell_phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  `user_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `home_phone`, `alternate_phone`, `cell_phone`, `email`, `address_line1`, `address_line2`, `city`, `province`, `zipcode`, `country`, `user_name`, `password`, `date_created`, `date_modified`, `is_active`, `user_category`) VALUES
(1, 'sachin', NULL, 'dudhara', '-', '-', '6477138690', 'sachin@fas.com', '2hskjdfk', 'sfhksjfh', 'sdfhnskjf', 'sfdkjsdkjf', '325878', 'sdhfkjsdf', 'sachin', '827ccb0eea8a706c4c34a16891f84e7b', '2017-12-12 20:19:48', '2017-12-12 20:19:48', 1, 'staff'),
(3, 'Amos', 'Yoshi ', 'Roth', '97', '50', '467856745645', 'noviha@yahoo.com', 'Architecto sit amet ducimus ', 'Molestias mollit dolor dolor ', 'OTTAWA', 'BC', 'M9L2C3', 'canada', 'Bertha', '12345', '2017-12-15 11:14:18', '2017-12-15 11:14:18', 1, 'user'),
(4, 'Alfonso Collier', 'Whoopi Navarro', 'Kelsey Berg', '81', '72', '73', 'gahu@hotmail.com', 'Quisquam maiores odit deserunt commodo proident velit magni qui', 'Aut quae a et lorem amet qui dolore recusandae Accusamus molestiae laudantium iusto beatae do non in', 'OTTAWA', 'Odit explicabo Nam accusantium numquam reprehenderit culpa non nihil quod rerum maiores lorem exerci', '72550', 'canada', 'Claire White', 'Pa$$w0rd!', '2017-12-15 12:29:40', '2017-12-15 12:29:40', 0, 'staff'),
(5, 'nitish', 'singh', 'luna', '4379966414', '4379966414', '4379966414', 'nitishluna@ymail.com', '43 Sultan Pool drive, main floor', 'dASsSsASsAS', 'TORONTO', 'ON', 'M9V4H3', 'canada', 'Tejinder', '0260202860349098b8636d022014e4ba', '2017-12-17 21:05:50', '2017-12-17 21:05:50', 1, 'staff'),
(6, 'jenelia', 'hunro', 'susan', '1234552890', '1234567873', '1234567883', 'tajinderluna@gmail.com', '43 Sultan Pool drive, main floor', 'aasasasas', 'TORONTO', 'ON', 'M9V4H3', 'canada', 'Tejinder', '123456', '2018-01-01 15:54:40', '2018-01-01 15:54:40', 1, 'user'),
(8, 'samsung', '', 'luna', '4379966414', '4379966414', '4379966414', 'tajinderluna@gmail.com', '43 Sultan Pool drive, main floor', '', 'TORONTO', 'ON', 'M9V4H3', 'canada', 'Tejinder', '46378', '2018-01-01 18:16:24', '2018-01-01 18:16:24', 1, 'user'),
(9, 'sachin', 'asas', 'dudhara', '123456789', '123456789', '4168871454', 'sachin.dudhara@gmail.com', '145 Richwood cres', '', 'TORONTO', 'Ontario', 'L6X4N3', 'canada', 'sachin123', '123456', '2018-01-02 11:26:50', '2018-01-02 11:26:50', 1, 'user'),
(10, 'sdfsdfsfd', 'sdfsdfsdfssdfsd', 'sdfsdfs3232', '31212', '23232323', '32342325', 'tajinderluna@gmail.com', '43 Sultan Pool drive, main floor', 'dasdasd', 'TORONTO', 'ON', 'M9V4H3', 'canada', 'Tejinder', '1234', '2018-01-02 22:05:48', '2018-01-02 22:05:48', 1, 'user'),
(11, 'tejinder', 'ZXZX', 'ZXZxZX', '192837465', '123123', '123095', 'tejinderluna@outlook.com', 'adasdasdadas', 'zdzcxdasdasd', 'MONTREAL', 'ON', 'asASas', 'canada', 'teji', '827ccb0eea8a706c4c34a16891f84e7b', '2018-01-04 03:52:12', '2018-01-04 03:52:12', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(100) NOT NULL,
  `visitor_date` datetime NOT NULL,
  `visitor_in_time` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `visitor_out_time` timestamp(4) NOT NULL DEFAULT '0000-00-00 00:00:00.0000',
  `visitor_name` varchar(100) NOT NULL,
  `visit_reason` text NOT NULL,
  `total_visitors` int(11) NOT NULL,
  `visitor_for_user_id` int(100) NOT NULL,
  `visitor_logged_by_user_id` int(100) NOT NULL,
  `visitor_img` varchar(500) NOT NULL,
  `visitor_authorization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `announcements_user_id_fk` (`announcement_by_user_id`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`apt_id`),
  ADD UNIQUE KEY `apt_number` (`apt_number`);

--
-- Indexes for table `apt_ownership_history`
--
ALTER TABLE `apt_ownership_history`
  ADD PRIMARY KEY (`ownership_history_id`),
  ADD KEY `apt_ow_hist_user_id_fk` (`user_id`),
  ADD KEY `apt_ow_hist_apt_id_fk` (`apt_id`);

--
-- Indexes for table `apt_rental_dues`
--
ALTER TABLE `apt_rental_dues`
  ADD PRIMARY KEY (`dues_id`),
  ADD KEY `apt_rental_dues_user_id_fk` (`user_id`),
  ADD KEY `apt_rental_dues_apt_id_fk` (`apt_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_UNIQUE` (`cat_name`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `complaints_user_id_fk` (`user_id`),
  ADD KEY `complaints_apt_id_fk` (`apt_id`);

--
-- Indexes for table `complaint_escalations`
--
ALTER TABLE `complaint_escalations`
  ADD PRIMARY KEY (`complaint_esc_id`),
  ADD KEY `dept_id_idx` (`dept_id`),
  ADD KEY `comp_esc_user_id_fk` (`user_id`),
  ADD KEY `comp_esc_comp_id_fk` (`complaint_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_name_UNIQUE` (`dept_name`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `disc_thread_created_by_user_id` (`thread_created_by_user_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `user_id_idx` (`user_id`) USING BTREE,
  ADD KEY `docs_apt_id_fk` (`apt_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `notices_raised_to_uid_fk` (`raised_to_user_id`),
  ADD KEY `notices_raised_by_uid_fk` (`issued_by_user_id`);

--
-- Indexes for table `parking_permits`
--
ALTER TABLE `parking_permits`
  ADD PRIMARY KEY (`permit_id`),
  ADD KEY `pp_permit_for_user_fk` (`permit_holder_user_id`);

--
-- Indexes for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  ADD PRIMARY KEY (`payment_txn_id`),
  ADD KEY `rpd_apt_id_fk` (`apt_id`),
  ADD KEY `usr_apt_if_fk` (`user_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `sub_cat_cat_id_fk` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`),
  ADD KEY `visitors_visitor_for_uid_fk` (`visitor_for_user_id`),
  ADD KEY `visitors_visitor_logged_by_uid_fk` (`visitor_logged_by_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `apt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apt_ownership_history`
--
ALTER TABLE `apt_ownership_history`
  MODIFY `ownership_history_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaint_escalations`
--
ALTER TABLE `complaint_escalations`
  MODIFY `complaint_esc_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `thread_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inv_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parking_permits`
--
ALTER TABLE `parking_permits`
  MODIFY `permit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  MODIFY `payment_txn_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_user_id_fk` FOREIGN KEY (`announcement_by_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `apt_ownership_history`
--
ALTER TABLE `apt_ownership_history`
  ADD CONSTRAINT `apt_ow_hist_apt_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`apt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `apt_ow_hist_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `apt_rental_dues`
--
ALTER TABLE `apt_rental_dues`
  ADD CONSTRAINT `apt_rental_dues_apt_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`apt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `apt_rental_dues_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_apt_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`apt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaints_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint_escalations`
--
ALTER TABLE `complaint_escalations`
  ADD CONSTRAINT `comp_esc_comp_id_fk` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`complaint_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comp_esc_dept_id_fk` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comp_esc_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `disc_thread_created_by_user_id` FOREIGN KEY (`thread_created_by_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `docs_apt_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`apt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `docs_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_raised_by_uid_fk` FOREIGN KEY (`issued_by_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notices_raised_to_uid_fk` FOREIGN KEY (`raised_to_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parking_permits`
--
ALTER TABLE `parking_permits`
  ADD CONSTRAINT `pp_permit_for_user_fk` FOREIGN KEY (`permit_holder_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rental_payment_details`
--
ALTER TABLE `rental_payment_details`
  ADD CONSTRAINT `rpd_apt_id_fk` FOREIGN KEY (`apt_id`) REFERENCES `apartments` (`apt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usr_apt_if_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_cat_cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_visitor_for_uid_fk` FOREIGN KEY (`visitor_for_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visitors_visitor_logged_by_uid_fk` FOREIGN KEY (`visitor_logged_by_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
