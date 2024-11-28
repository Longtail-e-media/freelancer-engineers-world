-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 07:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `few`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `linktype` int(1) NOT NULL,
  `linksrc` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `advertisement` int(1) NOT NULL,
  `added_date` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sortorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`id`, `title`, `image`, `linktype`, `linksrc`, `status`, `advertisement`, `added_date`, `sortorder`) VALUES
(1, 'become a member', 'TIMkH-download.png', 0, '', 1, 1, '2021-09-24 11:59:08', 2),
(2, 'room', '9yhly-logo.svg', 1, '', 1, 0, '2021-09-24 12:05:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicants`
--

CREATE TABLE `tbl_applicants` (
  `id` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `current_address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `myfile` varchar(50) NOT NULL,
  `qualification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_applicants`
--

INSERT INTO `tbl_applicants` (`id`, `parent`, `fullname`, `current_address`, `mobile`, `phone`, `email`, `sortorder`, `position`, `myfile`, `qualification`) VALUES
(1, '', 'Swarna Shakya', 'KTM', '9849482842', '', 'swarna@longtail.info', 1, '1', 'family-fun-1.jpg', 'test'),
(2, '', 'asdasd', 'Chettrapati, Dhobichaur a', '9861369900', '', 'asdasd@gmail.com', 2, '11', '', 'asdasd'),
(3, '', 'sahas', 'Chettrapati, Dhobichaur a', '9861369900', '', 'statshakya@gmail.com', 3, '13', 'IMG-20231018-WA0009.jpg', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE `tbl_articles` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `content` text NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `linksrc` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `meta_title` tinytext NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `type` int(1) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `modified_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `homepage` int(1) NOT NULL DEFAULT 0,
  `image` blob NOT NULL,
  `date` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_gal` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`id`, `parent_id`, `slug`, `title`, `sub_title`, `content`, `linktype`, `linksrc`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `type`, `added_date`, `modified_date`, `sortorder`, `homepage`, `image`, `date`, `category`, `image_gal`) VALUES
(11, 0, 'about-us-home', 'About Us home', 'About Us home', '<section>\r\n	<div class=\"container-xxl\">\r\n		<div class=\"text-center fs-5 fw-light lh-base w-75 mx-auto\">\r\n			<span class=\"text-decoration-underline\">Architectural Engineering</span> is a term that stands for different specialties of engineering related to the design and construction of buildings. An Architectural Engineer is an expert in creating practical building designs based on a combination of extensive knowledge in engineering, architecture, and materials - all using the latest in software and other technology tools. They make sure that the plans for a building both meet the needs of the client, as well as adhere to all local ordinances and building codes.</div>\r\n	</div>\r\n</section>\r\n', 0, '', 1, '', '', '', 0, '2023-09-03 15:53:53', '2024-11-27 12:04:07', 2, 1, 0x613a303a7b7d, '', '', 0x613a303a7b7d),
(2, 0, 'about-freelancer-engineers-world', 'About Freelancer Engineers World', 'About Freelancer Engineers World', '<p>\r\n	Freelancer Engineers World is a platform that connects clients with licensed engineers. The platform provides a secure environment for clients to post projects and for freelancers to bid on them. Clients can choose from a pool of qualified freelancers based on their ratings and reviews. Freelancers can increase their chances of securing projects by completing the online verification process and earning stars based on their performance. The platform charges a 5% service fee for each project, with the remaining 95% going directly to the freelancer. Taxes will be applied in accordance with government regulations, and freelancers are responsible for paying their own taxes. The platform encourages communication through written messages within the platform or via the official Viber number. Email communication is also supported. The platform features a rating system for both freelancers and clients, with higher ratings increasing the likelihood of attracting more opportunities. The platform is not responsible for any payments made to freelancers or services provided to clients. While the platform will attempt to mediate disputes, freelancers and clients have the option to pursue legal action independently.</p>\r\n<h2 class=\"mt-5 pt-5\">\r\n	Meet our Team</h2>\r\n<div class=\"mt-5 row text-center\">\r\n	<div class=\"col-md-3 col-sm-6 col-xs-12 wow fadeInUp\" data-wow-delay=\"0.1s\" data-wow-duration=\"1s\" data-wow-offset=\"0\">\r\n		<div class=\"our-team\">\r\n			<div class=\"team_img\">\r\n				<img alt=\"team-image\" src=\"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png\" />\r\n				<ul class=\"social\">\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\r\n				</ul>\r\n			</div>\r\n			<div class=\"team-content p-4 px-3 text-start\">\r\n				<h3 class=\"title fs-5\">\r\n					Purna Shrestha</h3>\r\n				<span class=\"post\">Designer</span></div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-3 col-sm-6 col-xs-12 wow fadeInUp\" data-wow-delay=\"0.2s\" data-wow-duration=\"1s\" data-wow-offset=\"0\">\r\n		<div class=\"our-team\">\r\n			<div class=\"team_img\">\r\n				<img alt=\"team-image\" src=\"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png\" />\r\n				<ul class=\"social\">\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\r\n				</ul>\r\n			</div>\r\n			<div class=\"team-content p-4 px-3 text-start\">\r\n				<h3 class=\"title fs-5\">\r\n					Purna Shrestha</h3>\r\n				<span class=\"post\">Developer</span></div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-3 col-sm-6 col-xs-12 wow fadeInUp\" data-wow-delay=\"0.3s\" data-wow-duration=\"1s\" data-wow-offset=\"0\">\r\n		<div class=\"our-team\">\r\n			<div class=\"team_img\">\r\n				<img alt=\"team-image\" src=\"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png\" />\r\n				<ul class=\"social\">\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\r\n				</ul>\r\n			</div>\r\n			<div class=\"team-content p-4 px-3 text-start\">\r\n				<h3 class=\"title fs-5\">\r\n					Purna Shrestha</h3>\r\n				<span class=\"post\">Marketer</span></div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-3 col-sm-6 col-xs-12 wow fadeInUp\" data-wow-delay=\"0.4s\" data-wow-duration=\"1s\" data-wow-offset=\"0\">\r\n		<div class=\"our-team\">\r\n			<div class=\"team_img\">\r\n				<img alt=\"team-image\" src=\"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png\" />\r\n				<ul class=\"social\">\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-facebook-f\"></i></a></li>\r\n					<li>\r\n						<a href=\"#\"><i class=\"fa-brands fa-linkedin-in\"></i></a></li>\r\n				</ul>\r\n			</div>\r\n			<div class=\"team-content p-4 px-3 text-start\">\r\n				<h3 class=\"title fs-5\">\r\n					Purna Shrestha</h3>\r\n				<span class=\"post\">Co-founder</span></div>\r\n		</div>\r\n	</div>\r\n</div>\r\n', 0, '', 1, '', '', '', 0, '2023-06-05 13:41:34', '2024-11-28 09:54:58', 1, 0, 0x613a303a7b7d, '', '', 0x613a353a7b693a303b733a31363a2249715449712d61626f7574312e6a7067223b693a313b733a31363a2277504e45762d61626f7574352e6a7067223b693a323b733a31363a224a6661626e2d61626f7574332e6a7067223b693a333b733a31363a2269413679642d61626f7574322e6a7067223b693a343b733a31363a22463430486c2d61626f7574342e6a7067223b7d),
(18, 0, 'few-policy', 'FEW Policy', 'FEW Policy', '<h3 class=\"fs-5 fw-semibold\">\r\n	Privacy Policy</h3>\r\n<p class=\"mt-3\">\r\n	Freelancer Engineers World is committed to protecting the privacy of its users. This Privacy Policy outlines the information we collect, how we use it, and how we protect it. By using our platform, you agree to the terms outlined in this Privacy Policy.</p>\r\n<h3 class=\"fs-5 fw-semibold mt-5\">\r\n	Information We Collect</h3>\r\n<p class=\"mt-3\">\r\n	We collect personal information from users who register on our platform. This information includes your name, email address, phone number, and payment details. We also collect information about your projects, bids, and ratings on the platform. We use this information to provide our services and improve the user experience.</p>\r\n<h3 class=\"fs-5 fw-semibold mt-5\">\r\n	How We Use Your Information</h3>\r\n<p class=\"mt-3\">\r\n	We use your personal information to verify your identity, process payments, and communicate with you about your projects. We may also use your information to send you promotional emails and updates about our platform. You can opt out of these emails at any time by updating your email preferences in your account settings.</p>\r\n<h3 class=\"fs-5 fw-semibold mt-5\">\r\n	How We Protect Your Information</h3>\r\n<p class=\"mt-3\">\r\n	We take the security of your personal information seriously and have implemented measures to protect it. We use encryption to secure your data and restrict access to authorized personnel only. We also regularly monitor our systems for potential security threats and vulnerabilities.</p>\r\n<h3 class=\"fs-5 fw-semibold mt-5\">\r\n	Changes to This Privacy Policy</h3>\r\n<p class=\"mt-3\">\r\n	We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. We will notify you of any changes by posting the new Privacy Policy on this page. We encourage you to review this Privacy Policy periodically for any updates.</p>\r\n', 0, '', 1, '', '', '', 0, '2024-09-09 14:51:57', '2024-11-28 09:57:47', 3, 0, 0x613a303a7b7d, '', '', 0x613a303a7b7d);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `blog_date` date NOT NULL,
  `archive_date` date NOT NULL,
  `sortorder` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `image` varchar(50) NOT NULL,
  `source` mediumtext NOT NULL,
  `type` int(10) NOT NULL,
  `viewcount` int(11) NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `linksrc` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linktype` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `slug`, `title`, `author`, `brief`, `content`, `blog_date`, `archive_date`, `sortorder`, `status`, `image`, `source`, `type`, `viewcount`, `meta_keywords`, `meta_description`, `added_date`, `linksrc`, `linktype`, `other_upload`) VALUES
(14, 'our-doors-are-now-open', 'Our doors are now open.                       ', 'Haven O\'Ganga                ', 'Dear all, Oh what a joy to share this news! Haven O’Ganga is now fully in operation. Guess what? We have had bookings and enquiries even before we official opened our doors for general bookings. Isn’t that amazing?', '<p>\r\n	Haven O Ganga! Our doors are wide open, inviting you to experience unparalleled hospitality. Step inside and immerse yourself in comfort, elegance, and warm smiles. Whether you&rsquo;re here for leisure or business, we&rsquo;re thrilled to be your home away from home.</p>\r\n', '2024-09-19', '0000-00-00', 1, 1, 'AbJjb-3.jpg', '', 0, 0, '', '', '2023-09-04 11:54:01', '', '0', 'Ke73j-building-2-1024x683.jpeg'),
(15, 'happy-dashain', 'Happy Dashain!                     ', 'Haven O\'Ganga                ', 'It’s Dashain today. Dashain is one of the biggest festivals celebrated in Nepal. You may have noticed that Nepal looks more vibrant and people look more relaxed now. At this is the time of the year, family come together to celebrate.', '<p>\r\n	Dashain, also known as Vijaya Dashami, is a 15-day-long festival with immense religious and social importance in Nepal. It symbolizes the victory of good over evil and is a time for Nepalese communities to come together, rejoice, and pay homage to the goddess Durga and other deities</p>\r\n', '2017-10-26', '0000-00-00', 2, 1, '6njrz-3.jpg', '', 0, 0, '', '', '2023-09-04 11:54:38', '', '0', 'eDCce-building-2-1024x683.jpeg'),
(16, 'we-are-on-tripadvisor', 'We are on Tripadvisor', 'Haven O\'Ganga                ', 'We are now listed on tripadvisor . Yay! Tripadvisor is the world’s largest travel site, helping over 60 million visitors every month plan the perfect trip. The joyous part is that good reviews have already begun to land on our page.', '<p>\r\n	Tripadvisor is the largest travel site globally, boasting over 630 million reviews and opinions covering approximately 7.5 million accommodations, airlines, attractions, and restaurants. Travelers rely on Tripadvisor&rsquo;s collective wisdom to make informed decisions about where to stay, how to fly, what to do, and where to dine</p>\r\n', '2024-10-26', '0000-00-00', 3, 1, 'mktIs-2.jpg', '', 0, 0, '', '', '2023-09-04 11:55:59', '', '0', 'y21Tm-building-2-1024x683.jpeg'),
(17, '60-days-of-joy-in-pokhara', '60 Days of Joy in Pokhara      ', 'Haven O\'Ganga                ', 'October 10, 2017, marked the first sixty days of our hustle and bustle at Haven O’Ganga. These sixty days have passed in total peace. Hustle and bustle and total peace sound a little contradicting, yes? Here’s how it went.', '<p>\r\n	<span style=\"color: rgb(59, 59, 59); font-family: Outfit, sans-serif; font-size: 16px; background-color: rgb(248, 245, 240);\">October 10, 2017, marked the first sixty days of our hustle and bustle at Haven O&rsquo;Ganga. These sixty days have passed in total peace. Hustle and bustle and total peace sound a little contradicting, yes? Here&rsquo;s how it went.</span></p>\r\n', '2017-10-26', '0000-00-00', 4, 1, 'a3OpT-1.jpg', '', 0, 0, '', '', '2023-09-04 11:56:28', '', '0', 'TvJtJ-news-banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conbined_news`
--

CREATE TABLE `tbl_conbined_news` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `brief` tinytext NOT NULL,
  `content` text NOT NULL,
  `image` mediumtext NOT NULL,
  `home_image` text NOT NULL,
  `gallery` text NOT NULL,
  `status` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `display` varchar(250) NOT NULL,
  `event_stdate` date NOT NULL,
  `event_endate` date NOT NULL,
  `type` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `banner_image` varchar(300) NOT NULL,
  `source` mediumtext NOT NULL,
  `meta_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configs`
--

CREATE TABLE `tbl_configs` (
  `id` int(11) NOT NULL,
  `sitetitle` varchar(200) NOT NULL,
  `icon_upload` varchar(200) NOT NULL,
  `logo_upload` varchar(200) NOT NULL,
  `fb_upload` varchar(255) NOT NULL,
  `twitter_upload` varchar(255) NOT NULL,
  `gallery_upload` varchar(255) NOT NULL,
  `contact_upload` varchar(255) NOT NULL,
  `other_upload` text NOT NULL,
  `facility_upload` varchar(240) NOT NULL,
  `offer_upload` varchar(255) NOT NULL,
  `sitename` varchar(50) NOT NULL,
  `location_type` tinyint(1) NOT NULL DEFAULT 1,
  `location_map` mediumtext NOT NULL,
  `location_image` varchar(250) NOT NULL,
  `fiscal_address` tinytext NOT NULL,
  `mail_address` tinytext NOT NULL,
  `contact_info` tinytext NOT NULL,
  `address` varchar(100) NOT NULL,
  `email_address` tinytext NOT NULL,
  `breif` text NOT NULL,
  `copyright` varchar(200) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `site_keywords` tinytext NOT NULL,
  `site_description` tinytext NOT NULL,
  `fb_messenger` text NOT NULL,
  `google_anlytics` text NOT NULL,
  `linksrc` varchar(255) NOT NULL,
  `robot_txt` text NOT NULL,
  `schema_code` tinytext NOT NULL,
  `book_type` tinyint(4) NOT NULL DEFAULT 1,
  `hotel_page` varchar(200) NOT NULL,
  `hotel_code` tinytext NOT NULL,
  `booking_code` tinytext NOT NULL,
  `template` varchar(100) NOT NULL,
  `admin_template` varchar(100) NOT NULL,
  `headers` text DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `search_box` text DEFAULT NULL,
  `search_result` text DEFAULT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0,
  `contact_info2` varchar(100) NOT NULL,
  `pobox` varchar(50) NOT NULL,
  `pixel_code` mediumtext NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `whatsapp_a` varchar(100) NOT NULL,
  `logo_upload2` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_configs`
--

INSERT INTO `tbl_configs` (`id`, `sitetitle`, `icon_upload`, `logo_upload`, `fb_upload`, `twitter_upload`, `gallery_upload`, `contact_upload`, `other_upload`, `facility_upload`, `offer_upload`, `sitename`, `location_type`, `location_map`, `location_image`, `fiscal_address`, `mail_address`, `contact_info`, `address`, `email_address`, `breif`, `copyright`, `meta_title`, `site_keywords`, `site_description`, `fb_messenger`, `google_anlytics`, `linksrc`, `robot_txt`, `schema_code`, `book_type`, `hotel_page`, `hotel_code`, `booking_code`, `template`, `admin_template`, `headers`, `footer`, `search_box`, `search_result`, `action`, `contact_info2`, `pobox`, `pixel_code`, `whatsapp`, `whatsapp_a`, `logo_upload2`) VALUES
(1, 'Freelancer Engineers World', '3xtqA-logo.svg', 'Q9qqw-logo.svg', '', '', '', '', '', 'a:3:{i:0;s:19:\"xb8UP-facility3.jpg\";i:1;s:19:\"w4gFw-facility1.jpg\";i:2;s:19:\"S0giB-facility2.jpg\";}', '', 'Freelancer Engineers World', 1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.2931668836013!2d85.31337347545293!3d27.677332526814677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb196760d68d39%3A0xcff5b96bdc5c0764!2sLongtail%20e-media!5e0!3m2!1sen!2snp!4v1732531176400!5m2!1sen!2snp', 'aHQyy-map.jpg', 'Pulchowk, Lalitpur, Nepal', 'Kholagal Marg, Uttardhoka, Kathmandu', '+977-9801234567', '+1 800 889 9898', 'info@freelancer.com', '', '© Copyright {year}. All Rights Reserved.', 'Freelancer Engineers World', 'Freelancer Engineers World', 'Freelancer Engineers World', '', '', '#', 'User-agent: *\r\nDisallow: /cgi-bin/', '', 2, 'result.php', '47KNJw4', '7K5LqJ2', 'web', 'blue', '', '', 'Develop By Amit prajapati', 'Develop By Amit prajapati', 0, 'sales@hotelsevenstar.com.np', '+977-01-4547990', '', '+977-9855080268/ +977-9851161915', '', '3SZGg-logo_w.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(3) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `country_name`, `status`) VALUES
(1, 'United States', 1),
(2, 'Canada', 1),
(3, 'Mexico', 1),
(4, 'Afghanistan', 1),
(5, 'Albania', 1),
(6, 'Algeria', 1),
(7, 'Andorra', 1),
(8, 'Angola', 1),
(9, 'Anguilla', 1),
(10, 'Antarctica', 1),
(11, 'Antigua and Barbuda', 1),
(12, 'Argentina', 1),
(13, 'Armenia', 1),
(14, 'Aruba', 1),
(15, 'Ascension Island', 1),
(16, 'Australia', 1),
(17, 'Austria', 1),
(18, 'Azerbaijan', 1),
(19, 'Bahamas', 1),
(20, 'Bahrain', 1),
(21, 'Bangladesh', 1),
(22, 'Barbados', 1),
(23, 'Belarus', 1),
(24, 'Belgium', 1),
(25, 'Belize', 1),
(26, 'Benin', 1),
(27, 'Bermuda', 1),
(28, 'Bhutan', 1),
(29, 'Bolivia', 1),
(30, 'Bophuthatswana', 1),
(31, 'Bosnia-Herzegovina', 1),
(32, 'Botswana', 1),
(33, 'Bouvet Island', 1),
(34, 'Brazil', 1),
(35, 'British Indian Ocean', 1),
(36, 'British Virgin Islands', 1),
(37, 'Brunei Darussalam', 1),
(38, 'Bulgaria', 1),
(39, 'Burkina Faso', 1),
(40, 'Burundi', 1),
(41, 'Cambodia', 1),
(42, 'Cameroon', 1),
(44, 'Cape Verde Island', 1),
(45, 'Cayman Islands', 1),
(46, 'Central Africa', 1),
(47, 'Chad', 1),
(48, 'Channel Islands', 1),
(49, 'Chile', 1),
(50, 'China, Peoples Republic', 1),
(51, 'Christmas Island', 1),
(52, 'Cocos (Keeling) Islands', 1),
(53, 'Colombia', 1),
(54, 'Comoros Islands', 1),
(55, 'Congo', 1),
(56, 'Cook Islands', 1),
(57, 'Costa Rica', 1),
(58, 'Croatia', 1),
(59, 'Cuba', 1),
(60, 'Cyprus', 1),
(61, 'Czech Republic', 1),
(62, 'Denmark', 1),
(63, 'Djibouti', 1),
(64, 'Dominica', 1),
(65, 'Dominican Republic', 1),
(66, 'Easter Island', 1),
(67, 'Ecuador', 1),
(68, 'Egypt', 1),
(69, 'El Salvador', 1),
(70, 'England', 1),
(71, 'Equatorial Guinea', 1),
(72, 'Estonia', 1),
(73, 'Ethiopia', 1),
(74, 'Falkland Islands', 1),
(75, 'Faeroe Islands', 1),
(76, 'Fiji', 1),
(77, 'Finland', 1),
(78, 'France', 1),
(79, 'French Guyana', 1),
(80, 'French Polynesia', 1),
(81, 'Gabon', 1),
(82, 'Gambia', 1),
(83, 'Georgia Republic', 1),
(84, 'Germany', 1),
(85, 'Gibraltar', 1),
(86, 'Greece', 1),
(87, 'Greenland', 1),
(88, 'Grenada', 1),
(89, 'Guadeloupe (French)', 1),
(90, 'Guatemala', 1),
(91, 'Guernsey Island', 1),
(92, 'Guinea Bissau', 1),
(93, 'Guinea', 1),
(94, 'Guyana', 1),
(95, 'Haiti', 1),
(96, 'Heard and McDonald Isls', 1),
(97, 'Honduras', 1),
(98, 'Hong Kong', 1),
(99, 'Hungary', 1),
(100, 'Iceland', 1),
(101, 'India', 1),
(102, 'Iran', 1),
(103, 'Iraq', 1),
(104, 'Ireland', 1),
(105, 'Isle of Man', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Ivory Coast', 1),
(109, 'Jamaica', 1),
(110, 'Japan', 1),
(111, 'Jersey Island', 1),
(112, 'Jordan', 1),
(113, 'Kazakhstan', 1),
(114, 'Kenya', 1),
(115, 'Kiribati', 1),
(116, 'Kuwait', 1),
(117, 'Laos', 1),
(118, 'Latvia', 1),
(119, 'Lebanon', 1),
(120, 'Lesotho', 1),
(121, 'Liberia', 1),
(122, 'Libya', 1),
(123, 'Liechtenstein', 1),
(124, 'Lithuania', 1),
(125, 'Luxembourg', 1),
(126, 'Macao', 1),
(127, 'Macedonia', 1),
(128, 'Madagascar', 1),
(129, 'Malawi', 1),
(130, 'Malaysia', 1),
(131, 'Maldives', 1),
(132, 'Mali', 1),
(133, 'Malta', 1),
(134, 'Martinique (French)', 1),
(135, 'Mauritania', 1),
(136, 'Mauritius', 1),
(137, 'Mayotte', 1),
(139, 'Micronesia', 1),
(140, 'Moldavia', 1),
(141, 'Monaco', 1),
(142, 'Mongolia', 1),
(143, 'Montenegro', 1),
(144, 'Montserrat', 1),
(145, 'Morocco', 1),
(146, 'Mozambique', 1),
(147, 'Myanmar', 1),
(148, 'Namibia', 1),
(149, 'Nauru', 1),
(150, 'Nepal', 1),
(151, 'Netherlands Antilles', 1),
(152, 'Netherlands', 1),
(153, 'New Caledonia (French)', 1),
(154, 'New Zealand', 1),
(155, 'Nicaragua', 1),
(156, 'Niger', 1),
(157, 'Niue', 1),
(158, 'Norfolk Island', 1),
(159, 'North Korea', 1),
(160, 'Northern Ireland', 1),
(161, 'Norway', 1),
(162, 'Oman', 1),
(163, 'Pakistan', 1),
(164, 'Panama', 1),
(165, 'Papua New Guinea', 1),
(166, 'Paraguay', 1),
(167, 'Peru', 1),
(168, 'Philippines', 1),
(169, 'Pitcairn Island', 1),
(170, 'Poland', 1),
(171, 'Polynesia (French)', 1),
(172, 'Portugal', 1),
(173, 'Qatar', 1),
(174, 'Reunion Island', 1),
(175, 'Romania', 1),
(176, 'Russia', 1),
(177, 'Rwanda', 1),
(178, 'S.Georgia Sandwich Isls', 1),
(179, 'Sao Tome, Principe', 1),
(180, 'San Marino', 1),
(181, 'Saudi Arabia', 1),
(182, 'Scotland', 1),
(183, 'Senegal', 1),
(184, 'Serbia', 1),
(185, 'Seychelles', 1),
(186, 'Shetland', 1),
(187, 'Sierra Leone', 1),
(188, 'Singapore', 1),
(189, 'Slovak Republic', 1),
(190, 'Slovenia', 1),
(191, 'Solomon Islands', 1),
(192, 'Somalia', 1),
(193, 'South Africa', 1),
(194, 'South Korea', 1),
(195, 'Spain', 1),
(196, 'Sri Lanka', 1),
(197, 'St. Helena', 1),
(198, 'St. Lucia', 1),
(199, 'St. Pierre Miquelon', 1),
(200, 'St. Martins', 1),
(201, 'St. Kitts Nevis Anguilla', 1),
(202, 'St. Vincent Grenadines', 1),
(203, 'Sudan', 1),
(204, 'Suriname', 1),
(205, 'Svalbard Jan Mayen', 1),
(206, 'Swaziland', 1),
(207, 'Sweden', 1),
(208, 'Switzerland', 1),
(209, 'Syria', 1),
(210, 'Tajikistan', 1),
(211, 'Taiwan', 1),
(212, 'Tahiti', 1),
(213, 'Tanzania', 1),
(214, 'Thailand', 1),
(215, 'Togo', 1),
(216, 'Tokelau', 1),
(217, 'Tonga', 1),
(218, 'Trinidad and Tobago', 1),
(219, 'Tunisia', 1),
(220, 'Turkmenistan', 1),
(221, 'Turks and Caicos Isls', 1),
(222, 'Tuvalu', 1),
(223, 'Uganda', 1),
(224, 'Ukraine', 1),
(225, 'United Arab Emirates', 1),
(226, 'Uruguay', 1),
(227, 'Uzbekistan', 1),
(228, 'Vanuatu', 1),
(229, 'Vatican City State', 1),
(230, 'Venezuela', 1),
(231, 'Vietnam', 1),
(232, 'Virgin Islands (Brit,1)', 1),
(233, 'Wales', 1),
(234, 'Wallis Futuna Islands', 1),
(235, 'Western Sahara', 1),
(236, 'Western Samoa', 1),
(237, 'Yemen', 1),
(238, 'Yugoslavia', 1),
(239, 'Zaire', 1),
(240, 'Zambia', 1),
(241, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE `tbl_download` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `image` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_download`
--

INSERT INTO `tbl_download` (`id`, `slug`, `title`, `status`, `sortorder`, `image`) VALUES
(1, 'asdasd', 'asdasd', 1, 1, 'T8z6W-abs.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `brief` tinytext NOT NULL,
  `content` text NOT NULL,
  `image` mediumtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `event_stdate` date NOT NULL,
  `event_endate` date NOT NULL,
  `type` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_gr` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_gr` text NOT NULL,
  `status` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `title`, `title_gr`, `content`, `content_gr`, `status`, `sortorder`, `added_date`) VALUES
(18, 'Can anyone be a member of the Freelancer Engineers World platform?', '', '<p>\r\n	Yes, anyone can join the Freelancer Engineers World platform. However, only licensed engineers are eligible to provide services on the platform. Certain fields closely related to engineering, such as engineering geology or sanitary engineering, may not require a license, but individuals will need to provide appropriate academic credentials to offer their services. Generally, those authorized to provide services must upload their valid credentials to work on the platform.</p>\r\n', '', 1, 1, '2024-11-28 09:42:57'),
(19, 'What service charge is applicable to work through the platform?', '', '<p>\r\n	The platform charges a 5% service fee for each project. The client is responsible for paying the remaining 95% directly to the freelancer.</p>\r\n', '', 1, 2, '2024-11-28 09:43:16'),
(20, 'What tax applies to the work?', '', '<p>\r\n	Taxes will be applied in accordance with government regulations. The platform is not responsible for any taxes related to freelancer payments. Freelancers are responsible for paying their own taxes. The platform&#39;s role is to connect clients and freelancers.</p>\r\n', '', 1, 3, '2024-11-28 09:43:36'),
(21, 'How can a freelancer increase their chances of securing more projects?', '', '<p>\r\n	The platform features a rating system for freelancers, based on a five-star scale. Freelancers can earn:</p>\r\n<ul>\r\n	<li>\r\n		1 star for online verification of documents.</li>\r\n	<li>\r\n		2 additional stars when the client makes a 5% deposit at the start of the project.</li>\r\n	<li>\r\n		2 more stars if the client finds the work satisfactory.</li>\r\n</ul>\r\n<p>\r\n	Freelancers with higher ratings are more likely to be viewed as trustworthy and attract more project opportunities.</p>\r\n', '', 1, 4, '2024-11-28 09:44:01'),
(22, 'What is online verification for a freelancer?', '', '<p>\r\n	To complete the online verification process, freelancers must provide the required information, which generally includes academic credentials, professional license, address, contact number, and other relevant details as requested by the platform.</p>\r\n', '', 1, 5, '2024-11-28 09:44:19'),
(23, 'How can a client find trustworthy freelancers for their published projects?', '', '<p>\r\n	The platform also has a five-star rating system for clients. Clients can earn:</p>\r\n<ul>\r\n	<li>\r\n		3 stars for making a 5% deposit when publishing a project.</li>\r\n	<li>\r\n		2 additional stars from the freelancer upon final payment.</li>\r\n</ul>\r\n<p>\r\n	Clients with higher ratings are likely to attract more freelancers. Freelancers may choose to bid on projects from clients with higher ratings.</p>\r\n', '', 1, 6, '2024-11-28 09:44:39'),
(24, 'Can a freelancer withdraw from a project before completing it?', '', '<p>\r\n	Freelancers are expected to honor their commitments once a project is awarded. If there is a genuine reason for withdrawal, the freelancer must arrange for another qualified individual to take over the project at the agreed price. Failure to do so may result in account suspension or the freelancer being placed on a blacklist.</p>\r\n', '', 1, 7, '2024-11-28 09:45:01'),
(25, 'How will freelancers communicate with the platform?', '', '<p>\r\n	The platform encourages communication through written messages within the platform or via the official Viber number. Email communication is also supported.</p>\r\n', '', 1, 8, '2024-11-28 09:45:18'),
(26, 'How will freelancers and clients communicate with each other?', '', '<p>\r\n	The platform encourages written communication between freelancers and clients, which serves as a record in case of any future disputes.</p>\r\n', '', 1, 9, '2024-11-28 09:45:45'),
(27, 'How will clients communicate with the platform?', '', '<p>\r\n	Clients can communicate with the platform through written messages on the platform or the official Viber number. Email is also an option.</p>\r\n', '', 1, 10, '2024-11-28 09:46:15'),
(28, 'What happens if a freelancer does not deliver the agreed service to the client?', '', '<p>\r\n	If a freelancer fails to deliver the agreed-upon service within a reasonable time, the platform may take action, such as account suspension or blacklisting. The platform is not responsible for any payments made to the freelancer. While the platform will attempt to mediate the situation, the client has the option to pursue legal action independently.</p>\r\n', '', 1, 11, '2024-11-28 09:46:34'),
(29, 'What if the client does not pay the agreed amount after the project is completed?', '', '<p>\r\n	If the client fails to pay the agreed amount within a reasonable time, the platform may take action, such as account suspension or blacklisting. The platform is not responsible for any services provided to the client. While the platform will try to mediate the issue, the freelancer has the option to pursue legal action independently.</p>\r\n', '', 1, 12, '2024-11-28 09:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `parentId` int(1) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`id`, `title`, `parentId`, `image`, `brief`, `icon`, `status`, `sortorder`, `added_date`) VALUES
(121, 'Mini Refrigerator', 119, 'x6MJ7-minifreeze.png', '', '', 1, 5, '2024-08-23 10:34:07'),
(123, 'Toiletries', 119, 'aADpw-toiletries.png', '', '', 1, 7, '2024-08-23 10:34:43'),
(125, 'Shower Gel', 119, 'ft4Xc-soap.png', '', '', 1, 8, '2024-08-23 10:35:23'),
(119, 'Room Amenities', 0, '8JHLK-C-Fold Leaflet.png', '', '', 1, 2, '2024-08-23 10:32:59'),
(129, 'Water Bottles', 119, 'TEhTv-bottle.png', '', '', 1, 1, '2024-08-23 10:36:37'),
(130, 'Safety Locker', 119, 'JiLpk-locker.png', '', '', 1, 3, '2024-08-23 10:36:48'),
(131, 'LED TV', 119, 'MZMnu-tv.png', '', '', 1, 9, '2024-08-23 10:37:00'),
(134, 'Towels', 119, 'zl2Fw-towel.png', '', '', 1, 4, '2024-09-09 16:40:34'),
(136, 'Slippers', 119, 'JjaTQ-slippers.png', '', '', 1, 6, '2024-09-09 16:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galleries`
--

CREATE TABLE `tbl_galleries` (
  `id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(50) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_galleries`
--

INSERT INTO `tbl_galleries` (`id`, `slug`, `title`, `image`, `detail`, `status`, `sortorder`, `registered`, `type`) VALUES
(20, 'restaurant', 'Restaurant', 'pdOdU-restaurant1.jpg', '', 1, 0, '2024-09-13 16:46:26', 1),
(19, 'exterior', 'Exterior', 'kMK0g-exterior2.jpg', '', 1, 1, '2024-09-13 16:45:48', 1),
(18, 'rooms', 'Rooms', 'JrbYq-18.jpg', '', 1, 2, '2024-09-13 16:43:54', 1),
(14, 'homepage', 'HOMEPAGE', '0BsMY-9.jpg', '', 1, 3, '2024-09-06 08:19:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_images`
--

CREATE TABLE `tbl_gallery_images` (
  `id` int(11) NOT NULL,
  `galleryid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `detail` varchar(200) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_gallery_images`
--

INSERT INTO `tbl_gallery_images` (`id`, `galleryid`, `title`, `image`, `status`, `detail`, `sortorder`, `registered`) VALUES
(302, 20, 'restaurant2', 'e9kIN-restaurant2.jpg', 1, '', 3, '2024-09-13 16:46:45'),
(301, 20, 'restaurant1', 'c6Qzm-restaurant3.jpg', 1, '', 2, '2024-09-13 16:46:45'),
(300, 20, 'restaurant', 'K23VE-restaurant1.jpg', 1, '', 1, '2024-09-13 16:46:45'),
(299, 19, 'exterior 2', '5O4ML-exterior3.jpg', 1, '', 3, '2024-09-13 16:46:14'),
(298, 19, 'exterior1', 'jhtfL-exterior2.jpg', 1, '', 2, '2024-09-13 16:46:14'),
(297, 19, 'exterior', 'N54nv-exterior1.jpg', 1, '', 1, '2024-09-13 16:46:14'),
(296, 18, 'room 3', 'GbkUf-room3.jpg', 1, '', 3, '2024-09-13 16:45:36'),
(295, 18, 'room 2', 'vDdOm-room1.jpg', 1, '', 2, '2024-09-13 16:45:36'),
(294, 18, 'rooms 1', 'nB5M5-room2.jpg', 1, '', 1, '2024-09-13 16:45:36'),
(288, 14, 'room1', 'nRrFm-16.jpg', 1, '', 1, '2024-09-11 22:44:22'),
(289, 14, 'room2', 'iQleA-20.jpg', 1, '', 2, '2024-09-11 22:44:22'),
(290, 14, 'room3', '9QCsV-15.jpg', 1, '', 3, '2024-09-11 22:44:22'),
(291, 14, 'room4', '47TID-17.jpg', 1, '', 4, '2024-09-11 22:44:22'),
(292, 14, 'room5', '76NUT-18.jpg', 1, '', 5, '2024-09-11 22:44:22'),
(293, 14, 'room6', 'LQh6G-19.jpg', 1, '', 6, '2024-09-11 22:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_type`
--

CREATE TABLE `tbl_group_type` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_type` varchar(20) NOT NULL,
  `authority` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Frontend,2=>Personality,3=>Backend,4=>Both',
  `description` tinytext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `permission` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_group_type`
--

INSERT INTO `tbl_group_type` (`id`, `group_name`, `group_type`, `authority`, `description`, `status`, `permission`) VALUES
(1, 'Administrator', '1', 1, '', 1, 'a:15:{i:0;s:2:\"74\";i:1;s:3:\"306\";i:2;s:1:\"1\";i:3;s:1:\"2\";i:4;s:1:\"3\";i:5;s:1:\"4\";i:6;s:1:\"8\";i:7;s:2:\"11\";i:8;s:3:\"300\";i:9;s:3:\"310\";i:10;s:2:\"12\";i:11;s:2:\"16\";i:12;s:2:\"15\";i:13;s:2:\"14\";i:14;s:2:\"13\";}'),
(2, 'General Admin', '1', 1, '', 1, 'a:22:{i:0;s:2:\"74\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:2:\"25\";i:5;s:2:\"23\";i:6;s:2:\"24\";i:7;s:1:\"4\";i:8;s:3:\"302\";i:9;s:3:\"303\";i:10;s:1:\"5\";i:11;s:2:\"27\";i:12;s:3:\"300\";i:13;s:3:\"301\";i:14;s:2:\"11\";i:15;s:2:\"17\";i:16;s:2:\"20\";i:17;s:2:\"19\";i:18;s:2:\"28\";i:19;s:2:\"12\";i:20;s:2:\"14\";i:21;s:2:\"13\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobtitle`
--

CREATE TABLE `tbl_jobtitle` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobtitle`
--

INSERT INTO `tbl_jobtitle` (`id`, `title`, `content`, `status`, `sortorder`, `added_date`) VALUES
(1, 'I.T', '', 1, 1, '2024-11-28 09:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `registered` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `user_action` int(11) NOT NULL,
  `ip_track` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `action`, `registered`, `userid`, `user_action`, `ip_track`) VALUES
(1, 'Log has been cleared.', '2023-06-22 16:11:02', 1, 6, '::1'),
(2, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-06-22 16:25:42', 1, 4, '::1'),
(3, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-06-22 16:26:17', 1, 4, '::1'),
(4, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-06-22 16:30:56', 1, 4, '::1'),
(5, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-06-22 16:32:30', 1, 4, '::1'),
(6, 'Login: Hotel Shangrila Blu   logged in.', '2023-08-28 12:01:38', 1, 1, '::1'),
(7, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-08-28 12:05:23', 1, 4, '::1'),
(8, 'Menu [ROOMS & SUITES] Edit Successfully', '2023-08-29 11:03:06', 1, 4, '::1'),
(9, 'Menu [mice] Edit Successfully', '2023-08-29 11:03:42', 1, 4, '::1'),
(10, 'Menu [MICE] Edit Successfully', '2023-08-29 11:03:51', 1, 4, '::1'),
(11, 'Menu [HOME] Edit Successfully', '2023-08-29 11:04:00', 1, 4, '::1'),
(12, 'Menu [ABOUT US] Edit Successfully', '2023-08-29 11:04:08', 1, 4, '::1'),
(13, 'Menu [RESTAURANTS & SHOPS] Edit Successfully', '2023-08-29 11:04:43', 1, 4, '::1'),
(14, 'Menu [FACILITIES] Edit Successfully', '2023-08-29 11:04:56', 1, 4, '::1'),
(15, 'Menu [GALLERY] Edit Successfully', '2023-08-29 11:05:11', 1, 4, '::1'),
(16, 'Menu [CAREER] CreatedData has added successfully.', '2023-08-29 11:05:42', 1, 3, '::1'),
(17, 'Menu [CONTACT US] Edit Successfully', '2023-08-29 11:06:03', 1, 4, '::1'),
(18, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-08-29 11:18:34', 1, 4, '::1'),
(19, 'Changes on Article \'About Us\' has been saved successfully.', '2023-08-29 12:02:58', 1, 4, '::1'),
(20, 'Menu [MICE] Edit Successfully', '2023-08-29 12:05:39', 1, 4, '::1'),
(21, 'Menu [RESTAURANTS & SHOPS] Edit Successfully', '2023-08-29 12:05:45', 1, 4, '::1'),
(22, 'Package [Mice]Data has added successfully.', '2023-08-29 12:22:54', 1, 3, '::1'),
(23, 'Menu [MICE] Edit Successfully', '2023-08-29 12:24:54', 1, 4, '::1'),
(24, 'Sub Package \'Bhaktapur Hall\' has added successfully.', '2023-08-29 13:03:28', 1, 3, '::1'),
(25, 'Changes on Sub Package \'Bhaktapur Hall\' has been saved successfully.', '2023-08-29 13:05:03', 1, 4, '::1'),
(26, 'Login: Hotel Shangrila Blu   logged in.', '2023-08-29 13:16:34', 1, 1, '::1'),
(27, 'Sub Package Image [b]Data has added successfully.', '2023-08-29 13:16:58', 1, 3, '::1'),
(28, 'Sub Package Image [bb]Data has added successfully.', '2023-08-29 13:16:58', 1, 3, '::1'),
(29, 'Sub Package Image [b]Data has added successfully.', '2023-08-29 13:16:58', 1, 3, '::1'),
(30, 'Package [Other Services]Data has deleted successfully.', '2023-08-29 14:31:10', 1, 6, '::1'),
(31, 'Package [Dining]Data has added successfully.', '2023-08-29 14:33:04', 1, 3, '::1'),
(32, 'Sub Package \'Kantipur Restaurant\' has added successfully.', '2023-08-29 14:35:35', 1, 3, '::1'),
(33, 'Sub Package Image [k]Data has added successfully.', '2023-08-29 14:36:06', 1, 3, '::1'),
(34, 'Sub Package Image [k]Data has added successfully.', '2023-08-29 14:36:06', 1, 3, '::1'),
(35, 'Sub Package Image [k]Data has added successfully.', '2023-08-29 14:36:06', 1, 3, '::1'),
(36, 'Sub Package \'Nagarkot Hall\' has added successfully.', '2023-08-29 14:53:38', 1, 3, '::1'),
(37, 'Sub Package Image [n]Data has added successfully.', '2023-08-29 14:54:22', 1, 3, '::1'),
(38, 'Sub Package Image [nn]Data has added successfully.', '2023-08-29 14:54:22', 1, 3, '::1'),
(39, 'Sub Package Image [n]Data has added successfully.', '2023-08-29 14:54:22', 1, 3, '::1'),
(40, 'Menu [yfty] CreatedData has added successfully.', '2023-08-29 15:05:34', 1, 3, '::1'),
(41, 'Menu  [yfty]Data has deleted successfully.', '2023-08-29 15:05:49', 1, 6, '::1'),
(42, 'Changes on Sub Package \'Deluxe Premium\' has been saved successfully.', '2023-08-30 12:48:44', 1, 4, '::1'),
(43, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:04:50', 1, 6, '::1'),
(44, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:04:56', 1, 6, '::1'),
(45, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:05:15', 1, 6, '::1'),
(46, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:17', 1, 6, '::1'),
(47, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:05:17', 1, 6, '::1'),
(48, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:21', 1, 6, '::1'),
(49, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:21', 1, 6, '::1'),
(50, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:05:21', 1, 6, '::1'),
(51, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:25', 1, 6, '::1'),
(52, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:25', 1, 6, '::1'),
(53, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:25', 1, 6, '::1'),
(54, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:05:25', 1, 6, '::1'),
(55, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:27', 1, 6, '::1'),
(56, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:27', 1, 6, '::1'),
(57, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:27', 1, 6, '::1'),
(58, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-08-30 13:05:27', 1, 6, '::1'),
(59, 'SubPackage Gallery Image [Super Deluxe King Room]Data has deleted successfully.', '2023-08-30 13:05:27', 1, 6, '::1'),
(60, 'Sub Package Image [del]Data has added successfully.', '2023-08-30 13:05:51', 1, 3, '::1'),
(61, 'Sub Package Image [del]Data has added successfully.', '2023-08-30 13:05:51', 1, 3, '::1'),
(62, 'Sub Package Image [del]Data has added successfully.', '2023-08-30 13:05:51', 1, 3, '::1'),
(63, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2023-08-30 13:06:31', 1, 4, '::1'),
(64, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2023-08-30 13:07:26', 1, 4, '::1'),
(65, 'Login: Hotel Shangrila Blu   logged in.', '2023-08-31 17:26:22', 1, 1, '::1'),
(66, 'Blog  [asdasd]Data has deleted successfully.', '2023-08-31 17:53:51', 1, 6, '::1'),
(67, 'Blog [test 1]Data has added successfully.', '2023-08-31 17:54:29', 1, 3, '::1'),
(68, 'Blog  [Options and basic details about Atithi Suites or Things to know about Atithi Suites]Data has ', '2023-08-31 18:14:39', 1, 6, '::1'),
(69, 'User [Hotel Shangrila Blu  ] Edit Successfully', '2023-08-31 18:56:24', 1, 4, '::1'),
(70, 'Changes on FAQ \'Do you have any discount code\' has been saved successfully.', '2023-08-31 18:56:39', 1, 4, '::1'),
(71, 'User [Hotel Shangrila Blu  ] Edit Successfully', '2023-09-01 07:52:37', 1, 4, '::1'),
(72, 'Changes on Article \'Pashupatinath Temple\' has been saved successfully.', '2023-09-01 07:52:56', 1, 4, '::1'),
(73, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-09-01 07:56:06', 1, 4, '::1'),
(74, 'User [Hotel Shangrila Blu  ] Edit Successfully', '2023-09-01 08:35:19', 1, 4, '::1'),
(75, 'Menu [CAREER] Edit Successfully', '2023-09-01 08:37:21', 1, 4, '::1'),
(76, 'Login: Hotel Shangrila Blu   logged in.', '2023-09-01 18:31:39', 1, 1, '::1'),
(77, 'Slideshow  [Bedroom]Data has deleted successfully.', '2023-09-01 18:31:54', 1, 6, '::1'),
(78, 'Slideshow  [Dining]Data has deleted successfully.', '2023-09-01 18:31:54', 1, 6, '::1'),
(79, 'Slideshow  [Food]Data has deleted successfully.', '2023-09-01 18:31:54', 1, 6, '::1'),
(80, 'Package [What\'s New]Data has deleted successfully.', '2023-09-01 18:39:41', 1, 6, '::1'),
(81, 'Login: Hotel Shangrila Blu   logged in.', '2023-09-01 19:28:56', 1, 1, '::1'),
(82, 'User [Hotel Shangrila Blu  ] Edit Successfully', '2023-09-01 19:29:05', 1, 4, '::1'),
(83, 'Article \'test 1\' has added successfully.', '2023-09-01 19:31:43', 1, 3, '::1'),
(84, 'Article \'Spa\' has added successfully.', '2023-09-03 12:16:37', 1, 3, '::1'),
(85, 'Articles  [Spa]Data has deleted successfully.', '2023-09-03 12:16:48', 1, 6, '::1'),
(86, 'Article \'spa \' has added successfully.', '2023-09-03 12:17:00', 1, 3, '::1'),
(87, 'Articles  [spa ]Data has deleted successfully.', '2023-09-03 12:17:08', 1, 6, '::1'),
(88, 'Article \'asd\' has added successfully.', '2023-09-03 12:18:50', 1, 3, '::1'),
(89, 'Articles  [asd]Data has deleted successfully.', '2023-09-03 12:18:58', 1, 6, '::1'),
(90, 'Article \'AS\' has added successfully.', '2023-09-03 12:26:04', 1, 3, '::1'),
(91, 'Articles  [AS]Data has deleted successfully.', '2023-09-03 12:26:15', 1, 6, '::1'),
(92, 'Article \'sda\' has added successfully.', '2023-09-03 12:28:59', 1, 3, '::1'),
(93, 'Articles  [sda]Data has deleted successfully.', '2023-09-03 12:29:11', 1, 6, '::1'),
(94, 'Article \'asdasd\' has added successfully.', '2023-09-03 12:33:54', 1, 3, '::1'),
(95, 'Articles  [asdasd]Data has deleted successfully.', '2023-09-03 12:34:03', 1, 6, '::1'),
(96, 'Article \'asd\' has added successfully.', '2023-09-03 12:36:50', 1, 3, '::1'),
(97, 'Article \'asdasd\' has added successfully.', '2023-09-03 12:37:51', 1, 3, '::1'),
(98, 'Articles  []Data has deleted successfully.', '2023-09-03 12:39:32', 1, 6, '::1'),
(99, 'Article \'asd\' has added successfully.', '2023-09-03 12:39:41', 1, 3, '::1'),
(100, 'Article \'asdas\' has added successfully.', '2023-09-03 12:42:56', 1, 3, '::1'),
(101, 'Articles  []Data has deleted successfully.', '2023-09-03 12:46:54', 1, 6, '::1'),
(102, 'Article \'awwesxwe\' has added successfully.', '2023-09-03 12:47:20', 1, 3, '::1'),
(103, 'Article \'wszxe\' has added successfully.', '2023-09-03 12:47:40', 1, 3, '::1'),
(104, 'Articles  []Data has deleted successfully.', '2023-09-03 12:49:36', 1, 6, '::1'),
(105, 'Article \'asdasd\' has added successfully.', '2023-09-03 12:49:59', 1, 3, '::1'),
(106, 'Changes on Article \'asdasdasdasd\' has been saved successfully.', '2023-09-03 12:50:07', 1, 4, '::1'),
(107, 'Article \'asdasd\' has added successfully.', '2023-09-03 12:50:28', 1, 3, '::1'),
(108, 'Articles  [Experience Hospitality The Nepalese Way]Data has deleted successfully.', '2023-09-03 12:51:20', 1, 6, '::1'),
(109, 'Changes on Article \'asdasdasdasd\' has been saved successfully.', '2023-09-03 13:08:55', 1, 4, '::1'),
(110, 'Changes on Article \'SPA\' has been saved successfully.', '2023-09-03 13:22:04', 1, 4, '::1'),
(111, 'Article \'Pool & Jacuzzi\' has added successfully.', '2023-09-03 14:08:35', 1, 3, '::1'),
(112, 'Articles  [test 1]Data has deleted successfully.', '2023-09-03 14:23:22', 1, 6, '::1'),
(113, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 14:24:04', 1, 4, '::1'),
(114, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 14:24:27', 1, 4, '::1'),
(115, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 14:25:06', 1, 4, '::1'),
(116, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-09-03 14:26:56', 1, 4, '::1'),
(117, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-09-03 14:29:42', 1, 4, '::1'),
(118, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-09-03 14:30:17', 1, 4, '::1'),
(119, 'Changes on Config \'Hotel Shangrila Blu\' has been saved successfully.', '2023-09-03 14:31:29', 1, 4, '::1'),
(120, 'Login: Hotel Shangrila Blu   logged in.', '2023-09-03 15:02:51', 1, 1, '::1'),
(121, 'Vacency [backend]Data has added successfully.', '2023-09-03 15:03:21', 1, 3, '::1'),
(122, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 15:33:53', 1, 4, '::1'),
(123, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 15:34:30', 1, 4, '::1'),
(124, 'Menu [ABOUT US] Edit Successfully', '2023-09-03 15:40:48', 1, 4, '::1'),
(125, 'Menu [ABOUT US] Edit Successfully', '2023-09-03 15:42:22', 1, 4, '::1'),
(126, 'Changes on Article \'About Us\' has been saved successfully.', '2023-09-03 15:44:15', 1, 4, '::1'),
(127, 'Articles  [About Us]Data has deleted successfully.', '2023-09-03 15:53:17', 1, 6, '::1'),
(128, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 15:53:38', 1, 4, '::1'),
(129, 'Article \'about us\' has added successfully.', '2023-09-03 15:53:53', 1, 3, '::1'),
(130, 'Changes on Article \'about us\' has been saved successfully.', '2023-09-03 15:58:02', 1, 4, '::1'),
(131, 'Changes on Article \'about us\' has been saved successfully.', '2023-09-03 16:47:36', 1, 4, '::1'),
(132, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 16:48:20', 1, 4, '::1'),
(133, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-03 16:51:46', 1, 4, '::1'),
(134, 'User [Hotel Shangrila Blu  ] Edit Successfully', '2023-09-03 17:44:39', 1, 4, '::1'),
(135, 'Popup \'sdad\' has added successfully.', '2023-09-03 17:44:58', 1, 3, '::1'),
(136, 'Slideshow [Exterior] Edit Successfully', '2023-09-03 17:53:20', 1, 4, '::1'),
(137, 'Slideshow [Exterior] Edit Successfully', '2023-09-03 17:54:35', 1, 4, '::1'),
(138, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-09-03 17:55:07', 1, 4, '::1'),
(139, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-09-03 17:56:34', 1, 4, '::1'),
(140, 'Changes on Sub Package \'Kantipur Restaurant\' has been saved successfully.', '2023-09-03 20:17:48', 1, 4, '::1'),
(141, 'Changes on Sub Package \'Bhaktapur Hall\' has been saved successfully.', '2023-09-03 20:22:12', 1, 4, '::1'),
(142, 'Gallery Image  [Home page]Data has deleted successfully.', '2023-09-03 20:26:24', 1, 6, '::1'),
(143, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:26', 1, 6, '::1'),
(144, 'Gallery Image  [Hotel]Data has deleted successfully.', '2023-09-03 20:26:26', 1, 6, '::1'),
(145, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:28', 1, 6, '::1'),
(146, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:28', 1, 6, '::1'),
(147, 'Gallery Image  [Rooms]Data has deleted successfully.', '2023-09-03 20:26:28', 1, 6, '::1'),
(148, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:30', 1, 6, '::1'),
(149, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:30', 1, 6, '::1'),
(150, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:30', 1, 6, '::1'),
(151, 'Gallery Image  [Dining]Data has deleted successfully.', '2023-09-03 20:26:30', 1, 6, '::1'),
(152, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:32', 1, 6, '::1'),
(153, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:32', 1, 6, '::1'),
(154, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:32', 1, 6, '::1'),
(155, 'Gallery Image  []Data has deleted successfully.', '2023-09-03 20:26:32', 1, 6, '::1'),
(156, 'Gallery Image  [Event Hall]Data has deleted successfully.', '2023-09-03 20:26:32', 1, 6, '::1'),
(157, 'Blog  [test 1]Data has deleted successfully.', '2023-09-03 20:26:38', 1, 6, '::1'),
(158, 'Blog  []Data has deleted successfully.', '2023-09-03 20:26:40', 1, 6, '::1'),
(159, 'Blog  [Festivals in Lalitpur]Data has deleted successfully.', '2023-09-03 20:26:40', 1, 6, '::1'),
(160, 'Blog  []Data has deleted successfully.', '2023-09-03 20:26:42', 1, 6, '::1'),
(161, 'Blog  []Data has deleted successfully.', '2023-09-03 20:26:42', 1, 6, '::1'),
(162, 'Blog  [History of Shangrila Blu]Data has deleted successfully.', '2023-09-03 20:26:42', 1, 6, '::1'),
(163, 'User [ClubHimalaya  ] Edit Successfully', '2023-09-03 20:27:05', 1, 4, '::1'),
(164, 'Login: ClubHimalaya   logged in.', '2023-09-03 20:27:10', 1, 1, '::1'),
(165, 'Services [Panoramic Views]Data has added successfully.', '2023-09-03 20:41:45', 1, 3, '::1'),
(166, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2023-09-03 20:44:24', 1, 4, '::1'),
(167, 'Sub Package \'asd\' has added successfully.', '2023-09-03 20:51:34', 1, 3, '::1'),
(168, 'Sub Package [asd]Data has deleted successfully.', '2023-09-03 20:51:50', 1, 6, '::1'),
(169, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2023-09-03 20:51:54', 1, 4, '::1'),
(170, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-09-03 21:04:29', 1, 4, '::1'),
(171, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-09-03 21:06:24', 1, 4, '::1'),
(172, 'Login: ClubHimalaya   logged in.', '2023-09-04 10:28:34', 1, 1, '27.34.84.147'),
(173, 'Login: ClubHimalaya   logged in.', '2023-09-04 11:53:03', 1, 1, '27.34.84.147'),
(174, 'Blog [Brief On Club Himalaya]Data has added successfully.', '2023-09-04 11:54:01', 1, 3, '27.34.84.147'),
(175, 'Blog [Excursions to nearby places]Data has added successfully.', '2023-09-04 11:54:38', 1, 3, '27.34.84.147'),
(176, 'Blog [Places-of-interest]Data has added successfully.', '2023-09-04 11:55:59', 1, 3, '27.34.84.147'),
(177, 'Blog [test 1]Data has added successfully.', '2023-09-04 11:56:28', 1, 3, '27.34.84.147'),
(178, 'Blog [qwseasdas]Data has added successfully.', '2023-09-04 12:25:01', 1, 3, '27.34.84.147'),
(179, 'Services  [All Cards Accepted]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(180, 'Services  [Doctor on Call]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(181, 'Services  [Currency Exchange]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(182, 'Services  [Event Halls]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(183, 'Services  [Electricity Backup]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(184, 'Services  [Hot & Cold Water]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(185, 'Services  [Safe Locker]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(186, 'Services  [Laundry Service]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(187, 'Services  [International Standard A/C Rooms]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(188, 'Services  [Daily House Keeping]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(189, 'Services  [Mini-Bar<br>on request]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(190, 'Services  [Underground Parking]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(191, 'Services  [Multi Cuisine Restaurant]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(192, 'Services  [Healthy Breakfast]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(193, 'Services  [Luggage Storage]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(194, 'Services  [24hrs Reception]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(195, 'Services  [Fire extinguisher]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(196, 'Services  [Free WiFi]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(197, 'Services  [Garden View]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(198, 'Services  [Elevator]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(199, 'Services  [Room Service]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(200, 'Services  [24hrs Checkin]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(201, 'Services  [Airport pickup]Data has deleted successfully.', '2023-09-04 12:29:40', 1, 6, '27.34.84.147'),
(202, 'Services [Breakfast]Data has added successfully.', '2023-09-04 12:30:30', 1, 3, '27.34.84.147'),
(203, 'Services [Room Services]Data has added successfully.', '2023-09-04 12:30:46', 1, 3, '27.34.84.147'),
(204, 'Services [Free WiFi]Data has added successfully.', '2023-09-04 12:31:01', 1, 3, '27.34.84.147'),
(205, 'Services [Air-Conditioner]Data has added successfully.', '2023-09-04 12:31:18', 1, 3, '27.34.84.147'),
(206, 'Services [Bathtub]Data has added successfully.', '2023-09-04 12:31:39', 1, 3, '27.34.84.147'),
(207, 'Services [Coffee Maker]Data has added successfully.', '2023-09-04 12:31:56', 1, 3, '27.34.84.147'),
(208, 'Services [24hrs Front-desk]Data has added successfully.', '2023-09-04 12:32:09', 1, 3, '27.34.84.147'),
(209, 'Services [Safety Deposite Box]Data has added successfully.', '2023-09-04 12:32:28', 1, 3, '27.34.84.147'),
(210, 'Services [Free Parking]Data has added successfully.', '2023-09-04 12:32:53', 1, 3, '27.34.84.147'),
(211, 'Services [Spa]Data has added successfully.', '2023-09-04 12:33:08', 1, 3, '27.34.84.147'),
(212, 'Services [Pool/Hot Tub]Data has added successfully.', '2023-09-04 12:33:33', 1, 3, '27.34.84.147'),
(213, 'Services [EV Charging station]Data has added successfully.', '2023-09-04 12:33:47', 1, 3, '27.34.84.147'),
(214, 'Services [Iron/Iron Boar]Data has added successfully.', '2023-09-04 12:34:10', 1, 3, '27.34.84.147'),
(215, 'Services [Pick/Drop]Data has added successfully.', '2023-09-04 12:34:43', 1, 3, '27.34.84.147'),
(216, 'Services [Meeting Hall]Data has added successfully.', '2023-09-04 12:35:00', 1, 3, '27.34.84.147'),
(217, 'Services [Mini-bar In Suites]Data has added successfully.', '2023-09-04 12:35:15', 1, 3, '27.34.84.147'),
(218, 'Services [Room Slippers]Data has added successfully.', '2023-09-04 12:35:29', 1, 3, '27.34.84.147'),
(219, 'Services [Hair Dryer]Data has added successfully.', '2023-09-04 12:35:46', 1, 3, '27.34.84.147'),
(220, 'Services [LED Tv]Data has added successfully.', '2023-09-04 12:35:57', 1, 3, '27.34.84.147'),
(221, 'Changes on Sub Package \'Junior Suite\' has been saved successfully.', '2023-09-04 12:38:43', 1, 4, '27.34.84.147'),
(222, 'SubPackage Gallery Image [del]Data has deleted successfully.', '2023-09-04 12:39:18', 1, 6, '27.34.84.147'),
(223, 'SubPackage Gallery Image [del]Data has deleted successfully.', '2023-09-04 12:39:21', 1, 6, '27.34.84.147'),
(224, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:39:21', 1, 6, '27.34.84.147'),
(225, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:39:24', 1, 6, '27.34.84.147'),
(226, 'SubPackage Gallery Image [del]Data has deleted successfully.', '2023-09-04 12:39:24', 1, 6, '27.34.84.147'),
(227, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:39:24', 1, 6, '27.34.84.147'),
(228, 'Sub Package Image [j]Data has added successfully.', '2023-09-04 12:39:46', 1, 3, '27.34.84.147'),
(229, 'Sub Package Image [j]Data has added successfully.', '2023-09-04 12:39:46', 1, 3, '27.34.84.147'),
(230, 'Sub Package Image [j]Data has added successfully.', '2023-09-04 12:39:46', 1, 3, '27.34.84.147'),
(231, 'Menu [Junior Suite] Edit Successfully', '2023-09-04 12:41:15', 1, 4, '27.34.84.147'),
(232, 'SubPackage Gallery Image [Deluxe Queen Room]Data has deleted successfully.', '2023-09-04 12:41:59', 1, 6, '27.34.84.147'),
(233, 'SubPackage Gallery Image [Deluxe Queen Room]Data has deleted successfully.', '2023-09-04 12:42:09', 1, 6, '27.34.84.147'),
(234, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:09', 1, 6, '27.34.84.147'),
(235, 'SubPackage Gallery Image [Deluxe Queen Room]Data has deleted successfully.', '2023-09-04 12:42:12', 1, 6, '27.34.84.147'),
(236, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:12', 1, 6, '27.34.84.147'),
(237, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:12', 1, 6, '27.34.84.147'),
(238, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:15', 1, 6, '27.34.84.147'),
(239, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:15', 1, 6, '27.34.84.147'),
(240, 'SubPackage Gallery Image [Deluxe Queen Room]Data has deleted successfully.', '2023-09-04 12:42:15', 1, 6, '27.34.84.147'),
(241, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:15', 1, 6, '27.34.84.147'),
(242, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:18', 1, 6, '27.34.84.147'),
(243, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:18', 1, 6, '27.34.84.147'),
(244, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:18', 1, 6, '27.34.84.147'),
(245, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 12:42:18', 1, 6, '27.34.84.147'),
(246, 'SubPackage Gallery Image [Deluxe Queen Room]Data has deleted successfully.', '2023-09-04 12:42:18', 1, 6, '27.34.84.147'),
(247, 'Sub Package Image [dep]Data has added successfully.', '2023-09-04 12:42:45', 1, 3, '27.34.84.147'),
(248, 'Sub Package Image [dep]Data has added successfully.', '2023-09-04 12:42:45', 1, 3, '27.34.84.147'),
(249, 'Sub Package Image [dep]Data has added successfully.', '2023-09-04 12:42:45', 1, 3, '27.34.84.147'),
(250, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2023-09-04 12:44:20', 1, 4, '27.34.84.147'),
(251, 'Menu [Deluxe premium Room] Edit Successfully', '2023-09-04 12:45:01', 1, 4, '27.34.84.147'),
(252, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2023-09-04 12:45:32', 1, 4, '27.34.84.147'),
(253, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2023-09-04 12:49:30', 1, 4, '27.34.84.147'),
(254, 'Sub Package \'Standard Room\' has added successfully.', '2023-09-04 12:51:09', 1, 3, '27.34.84.147'),
(255, 'Features [Coffee/ Tea Maker] Edit Successfully', '2023-09-04 12:52:15', 1, 4, '27.34.84.147'),
(256, 'Features [Bathrobe & slippers] Edit Successfully', '2023-09-04 12:52:49', 1, 4, '27.34.84.147'),
(257, 'Features [House Keeping] Edit Successfully', '2023-09-04 12:53:04', 1, 4, '27.34.84.147'),
(258, 'Features [Flat screen TV] Edit Successfully', '2023-09-04 12:53:24', 1, 4, '27.34.84.147'),
(259, 'Features [Shower-bathtub combination] Edit Successfully', '2023-09-04 12:53:41', 1, 4, '27.34.84.147'),
(260, 'Features [In Room Safe (Locker)] Edit Successfully', '2023-09-04 12:54:01', 1, 4, '27.34.84.147'),
(261, 'Features [Free Wi-Fi] Edit Successfully', '2023-09-04 12:54:19', 1, 4, '27.34.84.147'),
(262, 'Features [No Smoking] Edit Successfully', '2023-09-04 12:54:36', 1, 4, '27.34.84.147'),
(263, 'Features [Toiletriesi] Edit Successfully', '2023-09-04 12:55:06', 1, 4, '27.34.84.147'),
(264, 'Changes on Sub Package \'Nagarkot Hall\' has been saved successfully.', '2023-09-04 12:56:46', 1, 4, '27.34.84.147'),
(265, 'Sub Package \'Lalitpur Hall\' has added successfully.', '2023-09-04 12:57:42', 1, 3, '27.34.84.147'),
(266, 'Sub Package Image [a]Data has added successfully.', '2023-09-04 12:58:24', 1, 3, '27.34.84.147'),
(267, 'Sub Package Image [a]Data has added successfully.', '2023-09-04 12:58:24', 1, 3, '27.34.84.147'),
(268, 'Sub Package \'Indrawati Bar\' has added successfully.', '2023-09-04 12:59:53', 1, 3, '27.34.84.147'),
(269, 'Sub Package Image [s]Data has added successfully.', '2023-09-04 13:00:16', 1, 3, '27.34.84.147'),
(270, 'Sub Package Image [s]Data has added successfully.', '2023-09-04 13:00:16', 1, 3, '27.34.84.147'),
(271, 'SubPackage Gallery Image [k]Data has deleted successfully.', '2023-09-04 13:00:23', 1, 6, '27.34.84.147'),
(272, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 13:00:26', 1, 6, '27.34.84.147'),
(273, 'SubPackage Gallery Image [k]Data has deleted successfully.', '2023-09-04 13:00:26', 1, 6, '27.34.84.147'),
(274, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 13:00:29', 1, 6, '27.34.84.147'),
(275, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-04 13:00:29', 1, 6, '27.34.84.147'),
(276, 'SubPackage Gallery Image [k]Data has deleted successfully.', '2023-09-04 13:00:29', 1, 6, '27.34.84.147'),
(277, 'Sub Package Image [a]Data has added successfully.', '2023-09-04 13:00:44', 1, 3, '27.34.84.147'),
(278, 'Sub Package Image [a]Data has added successfully.', '2023-09-04 13:00:44', 1, 3, '27.34.84.147'),
(279, 'Gallery [rooms]Data has added successfully.', '2023-09-04 13:01:57', 1, 3, '27.34.84.147'),
(280, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(281, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(282, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(283, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(284, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(285, 'Sub Gallery Image [a]Data has added successfully.', '2023-09-04 13:02:18', 1, 3, '27.34.84.147'),
(286, 'Gallery [restaurant]Data has added successfully.', '2023-09-04 13:02:43', 1, 3, '27.34.84.147'),
(287, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:03:18', 1, 3, '27.34.84.147'),
(288, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:03:18', 1, 3, '27.34.84.147'),
(289, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:03:18', 1, 3, '27.34.84.147'),
(290, 'Gallery [hall]Data has added successfully.', '2023-09-04 13:03:45', 1, 3, '27.34.84.147'),
(291, 'Sub Gallery Image [d]Data has added successfully.', '2023-09-04 13:03:57', 1, 3, '27.34.84.147'),
(292, 'Sub Gallery Image [d]Data has added successfully.', '2023-09-04 13:03:57', 1, 3, '27.34.84.147'),
(293, 'Sub Gallery Image [d]Data has added successfully.', '2023-09-04 13:03:57', 1, 3, '27.34.84.147'),
(294, 'Gallery [Recreation]Data has added successfully.', '2023-09-04 13:04:17', 1, 3, '27.34.84.147'),
(295, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:04:35', 1, 3, '27.34.84.147'),
(296, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:04:35', 1, 3, '27.34.84.147'),
(297, 'Sub Gallery Image [e]Data has added successfully.', '2023-09-04 13:04:35', 1, 3, '27.34.84.147'),
(298, 'Vacency [Painter / Plumber] Edit Successfully', '2023-09-04 13:06:56', 1, 4, '27.34.84.147'),
(299, 'Vacency [Asst. Laundry Manager] Edit Successfully', '2023-09-04 13:07:16', 1, 4, '27.34.84.147'),
(300, 'Vacency  [Intern]Data has deleted successfully.', '2023-09-04 13:07:21', 1, 6, '27.34.84.147'),
(301, 'Vacency [Sales Executive] Edit Successfully', '2023-09-04 13:07:33', 1, 4, '27.34.84.147'),
(302, 'Changes on Sub Package \'Standard Room\' has been saved successfully.', '2023-09-04 13:09:33', 1, 4, '27.34.84.147'),
(303, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2023-09-04 13:10:08', 1, 4, '27.34.84.147'),
(304, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2023-09-04 13:10:45', 1, 4, '27.34.84.147'),
(305, 'Changes on Sub Package \'Junior Suite\' has been saved successfully.', '2023-09-04 13:11:12', 1, 4, '27.34.84.147'),
(306, 'Article \'Children Play Area Indoor & Outdoor\' has added successfully.', '2023-09-04 13:12:47', 1, 3, '27.34.84.147'),
(307, 'Changes on Article \'Children Play Area Indoor & Outdoor\' has been saved successfully.', '2023-09-04 13:18:43', 1, 4, '27.34.84.147'),
(308, 'Testimonial [Rebecca] Edit Successfully', '2023-09-04 13:21:07', 1, 4, '27.34.84.147'),
(309, 'Testimonial [WIRAEN - MALAYSIA] Edit Successfully', '2023-09-04 13:21:41', 1, 4, '27.34.84.147'),
(310, 'Testimonial [WIRAEN - MALAYSIA] Edit Successfully', '2023-09-04 13:22:19', 1, 4, '27.34.84.147'),
(311, 'Article \'Nagarkot View Tower\' has added successfully.', '2023-09-04 13:25:10', 1, 3, '27.34.84.147'),
(312, 'Article \'Mahankal Temple\' has added successfully.', '2023-09-04 13:26:09', 1, 3, '27.34.84.147'),
(313, 'Article \'Santi stupa\' has added successfully.', '2023-09-04 13:26:55', 1, 3, '27.34.84.147'),
(314, 'Article \'Changu Narayan Temple\' has added successfully.', '2023-09-04 13:27:35', 1, 3, '27.34.84.147'),
(315, 'Article \'Dhulikhel\' has added successfully.', '2023-09-04 13:28:02', 1, 3, '27.34.84.147'),
(316, 'Article \'Bhaktapur\' has added successfully.', '2023-09-04 13:28:33', 1, 3, '27.34.84.147'),
(317, 'Changes on Article \'Bhaktapur\' has been saved successfully.', '2023-09-04 13:29:17', 1, 4, '27.34.84.147'),
(318, 'Login: ClubHimalaya   logged in.', '2023-09-04 14:52:09', 1, 1, '27.34.2.119'),
(319, 'Login: ClubHimalaya   logged in.', '2023-09-04 17:33:42', 1, 1, '27.34.2.119'),
(320, 'Menu [ABOUT US] Edit Successfully', '2023-09-04 17:33:54', 1, 4, '27.34.2.119'),
(321, 'Menu [ABOUT US] Edit Successfully', '2023-09-04 17:34:22', 1, 4, '27.34.2.119'),
(322, 'Login: ClubHimalaya   logged in.', '2023-09-06 15:41:32', 1, 1, '27.34.64.16'),
(323, 'Login: ClubHimalaya   logged in.', '2023-09-15 11:20:48', 1, 1, '103.10.29.84'),
(324, 'FAQ [test]Data has deleted successfully.', '2023-09-15 11:21:12', 1, 6, '103.10.29.84'),
(325, 'Changes on FAQ \'What are the amenities and facilities in the hotel?\' has been saved successfully.', '2023-09-15 11:21:34', 1, 4, '103.10.29.84'),
(326, 'Changes on FAQ \'What are the activities guests can enjoy?\' has been saved successfully.', '2023-09-15 11:22:01', 1, 4, '103.10.29.84'),
(327, 'Changes on FAQ \'What are the services available?\' has been saved successfully.', '2023-09-15 11:22:25', 1, 4, '103.10.29.84'),
(328, 'FAQ \'Internet\' has added successfully.', '2023-09-15 11:22:44', 1, 3, '103.10.29.84'),
(329, 'FAQ \'Parking\' has added successfully.', '2023-09-15 11:23:01', 1, 3, '103.10.29.84'),
(330, 'FAQ \'How do I get to the hotel?\' has added successfully.', '2023-09-15 11:23:55', 1, 3, '103.10.29.84'),
(331, 'FAQ \'What are the things to do in Nagarkot?\' has added successfully.', '2023-09-15 11:24:12', 1, 3, '103.10.29.84'),
(332, 'FAQ \'We guarantee\' has added successfully.', '2023-09-15 11:24:26', 1, 3, '103.10.29.84'),
(333, 'FAQ \'What are the accepted credit cards?\' has added successfully.', '2023-09-15 11:24:38', 1, 3, '103.10.29.84'),
(334, 'FAQ \'Pets\' has added successfully.', '2023-09-15 11:24:49', 1, 3, '103.10.29.84'),
(335, 'FAQ \'What are the Hotel Policies?\' has added successfully.', '2023-09-15 11:25:00', 1, 3, '103.10.29.84'),
(336, 'FAQ \'When is the best time to visit?\' has added successfully.', '2023-09-15 11:25:11', 1, 3, '103.10.29.84'),
(337, 'FAQ \'What is the weather in Nagarkot like ?\' has added successfully.', '2023-09-15 11:25:23', 1, 3, '103.10.29.84'),
(338, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:27:35', 1, 4, '103.10.29.84'),
(339, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:28:20', 1, 4, '103.10.29.84'),
(340, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:29:40', 1, 4, '103.10.29.84'),
(341, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:30:43', 1, 4, '103.10.29.84'),
(342, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:31:45', 1, 4, '103.10.29.84'),
(343, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:33:30', 1, 4, '103.10.29.84'),
(344, 'Changes on FAQ \'What are the Hotel Policies?\' has been saved successfully.', '2023-09-15 11:34:04', 1, 4, '103.10.29.84'),
(345, 'Menu [Deluxe Room] Edit Successfully', '2023-09-15 11:38:50', 1, 4, '103.10.29.84'),
(346, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:18', 1, 6, '103.10.29.84'),
(347, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:21', 1, 6, '103.10.29.84'),
(348, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:21', 1, 6, '103.10.29.84'),
(349, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:24', 1, 6, '103.10.29.84'),
(350, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:24', 1, 6, '103.10.29.84'),
(351, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:24', 1, 6, '103.10.29.84'),
(352, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:27', 1, 6, '103.10.29.84'),
(353, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:28', 1, 6, '103.10.29.84'),
(354, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:28', 1, 6, '103.10.29.84'),
(355, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:28', 1, 6, '103.10.29.84'),
(356, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:30', 1, 6, '103.10.29.84'),
(357, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:30', 1, 6, '103.10.29.84'),
(358, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:30', 1, 6, '103.10.29.84'),
(359, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:30', 1, 6, '103.10.29.84'),
(360, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:30', 1, 6, '103.10.29.84'),
(361, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(362, 'SubPackage Gallery Image [Deluxe Twin Room]Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(363, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(364, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(365, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(366, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-09-15 11:39:33', 1, 6, '103.10.29.84'),
(367, 'Sub Package Image [deluxe]Data has added successfully.', '2023-09-15 11:40:40', 1, 3, '103.10.29.84'),
(368, 'Sub Package Image [delxue]Data has added successfully.', '2023-09-15 11:40:40', 1, 3, '103.10.29.84'),
(369, 'Sub Package Image [deluxe]Data has added successfully.', '2023-09-15 11:40:40', 1, 3, '103.10.29.84'),
(370, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2023-09-15 11:42:06', 1, 4, '103.10.29.84'),
(371, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2023-09-15 11:44:10', 1, 4, '103.10.29.84'),
(372, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2023-09-15 11:45:21', 1, 4, '103.10.29.84'),
(373, 'Changes on Sub Package \'Standard Room\' has been saved successfully.', '2023-09-15 11:45:47', 1, 4, '103.10.29.84'),
(374, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2023-09-15 11:46:31', 1, 4, '103.10.29.84'),
(375, 'Changes on Sub Package \'Junior Suite\' has been saved successfully.', '2023-09-15 11:47:11', 1, 4, '103.10.29.84'),
(376, 'Package Rooms Edit Successfully', '2023-09-15 11:59:06', 1, 4, '103.10.29.84'),
(377, 'Blog [Brief On Club Himalaya] Edit Successfully', '2023-09-15 12:04:11', 1, 4, '103.10.29.84'),
(378, 'Testimonial [Andrew Parker - Writer] Edit Successfully', '2023-09-15 12:08:45', 1, 4, '103.10.29.84'),
(379, 'Testimonial [Greg. S - Wagga] Edit Successfully', '2023-09-15 12:09:02', 1, 4, '103.10.29.84'),
(380, 'Testimonial [Andrew Parker - writer] Edit Successfully', '2023-09-15 12:10:59', 1, 4, '103.10.29.84'),
(381, 'Menu [ABOUT US] Edit Successfully', '2023-09-15 12:27:48', 1, 4, '103.10.29.84'),
(382, 'Login: ClubHimalaya   logged in.', '2023-09-15 12:44:06', 1, 1, '27.34.64.76'),
(383, 'Login: ClubHimalaya   logged in.', '2023-09-17 12:46:18', 1, 1, '27.34.76.145'),
(384, 'Sub Package Image [standard]Data has added successfully.', '2023-09-17 12:48:42', 1, 3, '27.34.76.145'),
(385, 'Sub Package Image [standard]Data has added successfully.', '2023-09-17 12:48:42', 1, 3, '27.34.76.145'),
(386, 'Sub Package Image [standard]Data has added successfully.', '2023-09-17 12:48:42', 1, 3, '27.34.76.145'),
(387, 'Login: ClubHimalaya   logged in.', '2023-09-17 13:55:22', 1, 1, '27.34.76.150'),
(388, 'Testimonial [Andrew Parker - writer] Edit Successfully', '2023-09-17 13:55:38', 1, 4, '27.34.76.150'),
(389, 'Testimonial [Andrew Parker] Edit Successfully', '2023-09-17 13:55:47', 1, 4, '27.34.76.150'),
(390, 'Testimonial [Greg. S ] Edit Successfully', '2023-09-17 13:57:54', 1, 4, '27.34.76.150'),
(391, 'Testimonial [WIRAEN] Edit Successfully', '2023-09-17 13:58:08', 1, 4, '27.34.76.150'),
(392, 'Login: ClubHimalaya   logged in.', '2023-09-17 17:11:07', 1, 1, '27.34.76.150'),
(393, 'Sub Package \'Library\' has added successfully.', '2023-09-17 17:15:37', 1, 3, '27.34.76.150'),
(394, 'Sub Package Image [kli]Data has added successfully.', '2023-09-17 17:16:29', 1, 3, '27.34.76.150'),
(395, 'SubPackage Gallery Image [kli]Data has deleted successfully.', '2023-09-17 17:16:36', 1, 6, '27.34.76.150'),
(396, 'Sub Package Image [lib]Data has added successfully.', '2023-09-17 17:18:17', 1, 3, '27.34.76.150'),
(397, 'Sub Package Image [lib]Data has added successfully.', '2023-09-17 17:18:17', 1, 3, '27.34.76.150'),
(398, 'Blog [Nagarkot Nepal ]Data has added successfully.', '2023-09-17 17:22:38', 1, 3, '27.34.76.150'),
(399, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-09-17 17:24:15', 1, 4, '27.34.76.150'),
(400, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-09-17 17:24:40', 1, 4, '27.34.76.150'),
(401, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-09-17 17:25:39', 1, 4, '27.34.76.150'),
(402, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-09-17 17:26:22', 1, 4, '27.34.76.150'),
(403, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-09-17 17:27:26', 1, 4, '27.34.76.150'),
(404, 'Login: ClubHimalaya   logged in.', '2023-09-18 08:28:10', 1, 1, '27.34.76.150'),
(405, 'Menu [Standard Room] CreatedData has added successfully.', '2023-09-18 08:35:32', 1, 3, '27.34.76.150'),
(406, 'Changes on Article \'about us home page\' has been saved successfully.', '2023-09-18 08:57:44', 1, 4, '27.34.76.150'),
(407, 'Changes on Article \'about us home page\' has been saved successfully.', '2023-09-18 08:58:00', 1, 4, '27.34.76.150'),
(408, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-09-18 08:58:08', 1, 4, '27.34.76.150'),
(409, 'Login: ClubHimalaya   logged in.', '2023-09-18 09:30:13', 1, 1, '27.34.76.150'),
(410, 'Login: ClubHimalaya   logged in.', '2023-09-18 10:34:46', 1, 1, '27.34.76.150'),
(411, 'Login: ClubHimalaya   logged in.', '2023-09-19 09:59:36', 1, 1, '27.34.76.167'),
(412, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 10:04:06', 1, 4, '27.34.76.167'),
(413, 'Login: ClubHimalaya   logged in.', '2023-09-19 17:49:22', 1, 1, '27.34.76.164'),
(414, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 17:53:16', 1, 4, '27.34.76.164'),
(415, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 17:54:33', 1, 4, '27.34.76.164'),
(416, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 17:56:15', 1, 4, '27.34.76.164'),
(417, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 17:57:25', 1, 4, '27.34.76.164'),
(418, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 18:05:13', 1, 4, '27.34.76.164'),
(419, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 18:06:00', 1, 4, '27.34.76.164'),
(420, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-19 18:06:34', 1, 4, '27.34.76.164'),
(421, 'Login: ClubHimalaya   logged in.', '2023-09-21 08:19:17', 1, 1, '27.34.76.158'),
(422, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-21 08:21:01', 1, 4, '27.34.76.158'),
(423, 'Changes on Sub Package \'Bhaktapur Hall\' has been saved successfully.', '2023-09-21 08:21:37', 1, 4, '27.34.76.158'),
(424, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-21 08:22:34', 1, 4, '27.34.76.158'),
(425, 'Changes on Sub Package \'Nagarkot Hall\' has been saved successfully.', '2023-09-21 08:23:21', 1, 4, '27.34.76.158'),
(426, 'Changes on Sub Package \'Library\' has been saved successfully.', '2023-09-21 08:23:59', 1, 4, '27.34.76.158'),
(427, 'Changes on Sub Package \'Library\' has been saved successfully.', '2023-09-21 08:24:48', 1, 4, '27.34.76.158'),
(428, 'Changes on Sub Package \'Nagarkot Hall\' has been saved successfully.', '2023-09-21 08:25:25', 1, 4, '27.34.76.158'),
(429, 'Changes on Sub Package \'Lalitpur Hall\' has been saved successfully.', '2023-09-21 08:27:48', 1, 4, '27.34.76.158'),
(430, 'Changes on Sub Package \'Bhaktapur Hall\' has been saved successfully.', '2023-09-21 08:28:11', 1, 4, '27.34.76.158'),
(431, 'Login: ClubHimalaya   logged in.', '2023-10-16 14:28:42', 1, 1, '27.34.64.117'),
(432, 'Changes on Article \'about us home page\' has been saved successfully.', '2023-10-16 14:34:55', 1, 4, '27.34.64.117'),
(433, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-10-16 14:35:27', 1, 4, '27.34.64.117'),
(434, 'Changes on Article \'about us home page\' has been saved successfully.', '2023-10-16 14:37:06', 1, 4, '27.34.64.117'),
(435, 'Menu [ABOUT US] Edit Successfully', '2023-10-16 14:37:47', 1, 4, '27.34.64.117'),
(436, 'Changes on Article \'about us\' has been saved successfully.', '2023-10-16 14:38:47', 1, 4, '27.34.64.117'),
(437, 'Menu [ABOUT US] Edit Successfully', '2023-10-16 14:39:05', 1, 4, '27.34.64.117'),
(438, 'Changes on Article \'about us\' has been saved successfully.', '2023-10-16 14:39:34', 1, 4, '27.34.64.117'),
(439, 'Changes on Article \'welcome To Club Himalaya\' has been saved successfully.', '2023-10-16 14:39:52', 1, 4, '27.34.64.117'),
(440, 'Changes on Main service \'Children Play Area Indoor & Outdoor\' has been saved successfully.', '2023-10-16 14:42:11', 1, 4, '27.34.64.117'),
(441, 'Changes on Main service \'Children Play Area Indoor & Outdoor\' has been saved successfully.', '2023-10-16 14:42:35', 1, 4, '27.34.64.117'),
(442, 'Changes on Main service \'Children Play Area Indoor & Outdoor\' has been saved successfully.', '2023-10-16 14:42:54', 1, 4, '27.34.64.117'),
(443, 'Login: ClubHimalaya   logged in.', '2023-10-17 13:12:04', 1, 1, '27.34.64.117'),
(444, 'Article \'Exceptional Experiences\' has added successfully.', '2023-10-17 13:56:59', 1, 3, '27.34.64.117'),
(445, 'Testimonial [Greg. S ] Edit Successfully', '2023-10-17 13:58:48', 1, 4, '27.34.64.117'),
(446, 'Changes on Article \'Exceptional Experiences\' has been saved successfully.', '2023-10-17 14:01:43', 1, 4, '27.34.64.117'),
(447, 'Changes on Article \'Exceptional Experiences\' has been saved successfully.', '2023-10-17 14:04:07', 1, 4, '27.34.64.117'),
(448, 'Login: ClubHimalaya   logged in.', '2023-10-17 14:06:04', 1, 1, '27.34.76.163'),
(449, 'Login: ClubHimalaya   logged in.', '2023-10-20 08:23:42', 1, 1, '27.34.76.176'),
(450, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-10-20 08:50:04', 1, 4, '27.34.76.176'),
(451, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-10-20 08:50:11', 1, 4, '27.34.76.176'),
(452, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-10-20 08:51:20', 1, 4, '27.34.76.176'),
(453, 'Login: ClubHimalaya   logged in.', '2023-10-29 13:52:56', 1, 1, '27.34.64.54'),
(454, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-29 13:53:26', 1, 4, '27.34.64.54'),
(455, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-29 13:53:48', 1, 4, '27.34.64.54'),
(456, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-29 13:59:19', 1, 4, '27.34.64.54'),
(457, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-29 14:15:31', 1, 4, '27.34.64.54'),
(458, 'Changes on FAQ \'What are the accepted credit cards?\' has been saved successfully.', '2023-10-29 14:37:43', 1, 4, '27.34.64.54'),
(459, 'Changes on FAQ \'What are the accepted credit cards?\' has been saved successfully.', '2023-10-29 14:38:12', 1, 4, '27.34.64.54'),
(460, 'Changes on FAQ \'We guarantee\' has been saved successfully.', '2023-10-29 14:39:02', 1, 4, '27.34.64.54'),
(461, 'Changes on FAQ \'What are the things to do in Nagarkot?\' has been saved successfully.', '2023-10-29 14:39:55', 1, 4, '27.34.64.54'),
(462, 'Article \'Partners\' has added successfully.', '2023-10-29 14:41:53', 1, 3, '27.34.64.54'),
(463, 'Menu [Our Partners] Edit Successfully', '2023-10-29 14:42:22', 1, 4, '27.34.64.54'),
(464, 'Menu [FAQ\'s] Edit Successfully', '2023-10-29 14:42:46', 1, 4, '27.34.64.54'),
(465, 'Changes on Article \'Partners\' has been saved successfully.', '2023-10-29 14:43:46', 1, 4, '27.34.64.54'),
(466, 'Article \'Enhanced Safety\' has added successfully.', '2023-10-29 14:46:24', 1, 3, '27.34.64.54'),
(467, 'Menu [Enhanced Safety] Edit Successfully', '2023-10-29 14:46:57', 1, 4, '27.34.64.54'),
(468, 'Changes on Article \'Enhanced Safety\' has been saved successfully.', '2023-10-29 14:48:23', 1, 4, '27.34.64.54'),
(469, 'Blog [Brief On Club Himalaya] Edit Successfully', '2023-10-29 14:50:39', 1, 4, '27.34.64.54'),
(470, 'Blog [Nagarkot Nepal ] Edit Successfully', '2023-10-29 14:52:40', 1, 4, '27.34.64.54'),
(471, 'Login: ClubHimalaya   logged in.', '2023-10-30 09:21:27', 1, 1, '27.34.76.183'),
(472, 'User [ClubHimalaya  ] Edit Successfully', '2023-10-30 09:21:49', 1, 4, '27.34.76.183'),
(473, 'Login: ClubHimalaya   logged in.', '2023-10-30 10:54:57', 1, 1, '27.34.0.5'),
(474, 'Login: ClubHimalaya   logged in.', '2023-10-30 13:48:32', 1, 1, '27.34.0.5'),
(475, 'Changes on Main service \'SPA\' has been saved successfully.', '2023-10-30 13:50:58', 1, 4, '27.34.0.5'),
(476, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-30 13:53:17', 1, 4, '27.34.0.5'),
(477, 'Login: ClubHimalaya   logged in.', '2023-10-30 14:07:44', 1, 1, '27.34.64.54');
INSERT INTO `tbl_logs` (`id`, `action`, `registered`, `userid`, `user_action`, `ip_track`) VALUES
(478, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-30 14:08:16', 1, 4, '27.34.0.5'),
(479, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-30 14:08:34', 1, 4, '27.34.64.54'),
(480, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-10-30 14:09:39', 1, 4, '27.34.64.54'),
(481, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-10-30 14:17:37', 1, 4, '27.34.0.5'),
(482, 'Slideshow [By Ace Hotel] Edit Successfully', '2023-10-30 14:17:51', 1, 4, '27.34.0.5'),
(483, 'Changes on Article \'about us\' has been saved successfully.', '2023-10-30 14:24:08', 1, 4, '27.34.64.54'),
(484, 'Changes on Article \'about us\' has been saved successfully.', '2023-10-30 14:24:31', 1, 4, '27.34.64.54'),
(485, 'Login: ClubHimalaya   logged in.', '2023-10-30 14:24:34', 1, 1, '27.34.64.193'),
(486, 'Changes on Article \'about us\' has been saved successfully.', '2023-10-30 14:24:50', 1, 4, '27.34.64.54'),
(487, 'SocialNetworking [Facebook] Edit Successfully', '2023-10-30 14:30:21', 1, 4, '27.34.0.5'),
(488, 'Changes on Main service \'SPA\' has been saved successfully.', '2023-10-30 14:38:13', 1, 4, '27.34.0.5'),
(489, 'Changes on Main service \'SPA\' has been saved successfully.', '2023-10-30 14:38:42', 1, 4, '27.34.0.5'),
(490, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-10-30 14:39:43', 1, 4, '27.34.64.193'),
(491, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:41:22', 1, 6, '27.34.64.193'),
(492, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:12', 1, 6, '27.34.0.5'),
(493, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:22', 1, 6, '27.34.0.5'),
(494, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:22', 1, 6, '27.34.0.5'),
(495, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:34', 1, 6, '27.34.0.5'),
(496, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:34', 1, 6, '27.34.0.5'),
(497, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:42:34', 1, 6, '27.34.0.5'),
(498, 'Vacency [HR post wanted]Data has added successfully.', '2023-10-30 14:42:48', 1, 3, '27.34.0.5'),
(499, 'SubPackage Gallery Image []Data has deleted successfully.', '2023-10-30 14:43:16', 1, 6, '27.34.64.193'),
(500, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-10-30 14:46:05', 1, 4, '27.34.64.193'),
(501, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-10-30 14:57:14', 1, 4, '27.34.64.193'),
(502, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-10-30 14:59:48', 1, 4, '27.34.64.193'),
(503, 'Login: ClubHimalaya   logged in.', '2023-10-30 16:19:42', 1, 1, '27.34.64.193'),
(504, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-10-30 16:20:02', 1, 4, '27.34.64.193'),
(505, 'Login: ClubHimalaya   logged in.', '2023-10-31 14:05:47', 1, 1, '27.34.64.54'),
(506, 'Login: ClubHimalaya   logged in.', '2023-11-02 15:02:34', 1, 1, '27.34.64.4'),
(507, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-02 15:03:17', 1, 4, '27.34.64.4'),
(508, 'Menu [RESTAURANTS / BAR] Edit Successfully', '2023-11-02 15:06:33', 1, 4, '27.34.64.4'),
(509, 'Menu [RESTAURANTS & BAR] Edit Successfully', '2023-11-02 15:06:48', 1, 4, '27.34.64.4'),
(510, 'Package Dining Edit Successfully', '2023-11-02 15:10:24', 1, 4, '27.34.64.4'),
(511, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-11-02 15:10:51', 1, 4, '27.34.64.4'),
(512, 'Changes on Sub Package \'Kantipur Restaurant\' has been saved successfully.', '2023-11-02 15:11:28', 1, 4, '27.34.64.4'),
(513, 'Login: ClubHimalaya   logged in.', '2023-11-05 12:35:52', 1, 1, '163.53.26.226'),
(514, 'Package Dining Edit Successfully', '2023-11-05 12:36:16', 1, 4, '163.53.26.226'),
(515, 'Package Dining Edit Successfully', '2023-11-05 12:36:53', 1, 4, '163.53.26.226'),
(516, 'Package Dining Edit Successfully', '2023-11-05 12:39:13', 1, 4, '163.53.26.226'),
(517, 'Package Dining Edit Successfully', '2023-11-05 12:40:33', 1, 4, '163.53.26.226'),
(518, 'Changes on Sub Package \'Kantipur Restaurant\' has been saved successfully.', '2023-11-05 12:43:48', 1, 4, '163.53.26.226'),
(519, 'Changes on Sub Package \'Indrawati Bar\' has been saved successfully.', '2023-11-05 12:45:22', 1, 4, '163.53.26.226'),
(520, 'Login: ClubHimalaya   logged in.', '2023-11-05 16:08:23', 1, 1, '113.199.255.222'),
(521, 'Changes on FAQ \'What is the weather in Nagarkot like ?\' has been saved successfully.', '2023-11-05 16:09:59', 1, 4, '113.199.255.222'),
(522, 'Changes on FAQ \'What is the weather in Nagarkot like ?\' has been saved successfully.', '2023-11-05 16:14:12', 1, 4, '113.199.255.222'),
(523, 'Changes on FAQ \'What is the weather in Nagarkot like ?\' has been saved successfully.', '2023-11-05 16:15:19', 1, 4, '113.199.255.222'),
(524, 'Changes on FAQ \'What is the weather in Nagarkot like ?\' has been saved successfully.', '2023-11-05 16:28:05', 1, 4, '113.199.255.222'),
(525, 'Login: ClubHimalaya   logged in.', '2023-11-09 07:49:33', 1, 1, '::1'),
(526, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 08:05:04', 1, 4, '::1'),
(527, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 08:09:56', 1, 4, '::1'),
(528, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 08:19:06', 1, 4, '::1'),
(529, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:38:20', 1, 4, '::1'),
(530, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:38:30', 1, 4, '::1'),
(531, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:38:38', 1, 4, '::1'),
(532, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:44:08', 1, 4, '::1'),
(533, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:52:23', 1, 4, '::1'),
(534, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:52:34', 1, 4, '::1'),
(535, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 10:52:53', 1, 4, '::1'),
(536, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 11:01:21', 1, 4, '::1'),
(537, 'Login: ClubHimalaya   logged in.', '2023-11-09 11:13:42', 1, 1, '::1'),
(538, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 12:59:53', 1, 4, '::1'),
(539, 'Login: ClubHimalaya   logged in.', '2023-11-09 13:14:02', 1, 1, '::1'),
(540, 'SocialNetworking [Facebook] Edit Successfully', '2023-11-09 13:16:15', 1, 4, '::1'),
(541, 'SocialNetworking [Facebook] Edit Successfully', '2023-11-09 13:18:59', 1, 4, '::1'),
(542, 'SocialNetworking [Twitter] Edit Successfully', '2023-11-09 13:28:18', 1, 4, '::1'),
(543, 'SocialNetworking [Twitter] Edit Successfully', '2023-11-09 13:28:26', 1, 4, '::1'),
(544, 'SocialNetworking [Twitter] Edit Successfully', '2023-11-09 13:28:56', 1, 4, '::1'),
(545, 'SocialNetworking [Twitter] Edit Successfully', '2023-11-09 13:29:31', 1, 4, '::1'),
(546, 'Login: ClubHimalaya   logged in.', '2023-11-09 15:07:07', 1, 1, '::1'),
(547, 'Login: ClubHimalaya   logged in.', '2023-11-09 15:10:05', 1, 1, '::1'),
(548, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 15:15:15', 1, 4, '::1'),
(549, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 15:20:22', 1, 4, '::1'),
(550, 'Package [asdasd]Data has added successfully.', '2023-11-09 15:24:44', 1, 3, '::1'),
(551, 'Package asdasd Edit Successfully', '2023-11-09 15:25:12', 1, 4, '::1'),
(552, 'Package asdasd Edit Successfully', '2023-11-09 15:25:44', 1, 4, '::1'),
(553, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 15:26:14', 1, 4, '::1'),
(554, 'Login: ClubHimalaya   logged in.', '2023-11-09 15:41:26', 1, 1, '::1'),
(555, 'Login: Super admin   logged in.', '2023-11-09 15:59:32', 1, 1, '::1'),
(556, 'Login: ClubHimalaya   logged in.', '2023-11-09 16:05:26', 1, 1, '::1'),
(557, 'Login: ClubHimalaya   logged in.', '2023-11-09 16:35:17', 1, 1, '::1'),
(558, 'Login: ClubHimalaya   logged in.', '2023-11-09 16:39:40', 1, 1, '::1'),
(559, 'Login: Super admin   logged in.', '2023-11-09 16:40:07', 1, 1, '::1'),
(560, 'User [Super admin  ] Edit Successfully', '2023-11-09 16:48:42', 1, 4, '::1'),
(561, 'Login: Super admin   logged in.', '2023-11-09 16:48:59', 1, 1, '::1'),
(562, 'Login: ClubHimalaya   logged in.', '2023-11-09 16:55:28', 1, 1, '::1'),
(563, 'Changes on Article \'Enhanced Safety\' has been saved successfully.', '2023-11-09 17:06:08', 1, 4, '::1'),
(564, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-09 17:06:28', 1, 4, '::1'),
(565, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-09 17:10:38', 1, 4, '::1'),
(566, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-09 17:12:25', 1, 4, '::1'),
(567, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-09 17:19:03', 1, 4, '::1'),
(568, 'Changes on Article \'about us\' has been saved successfully.', '2023-11-09 17:20:06', 1, 4, '::1'),
(569, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 17:41:56', 1, 4, '::1'),
(570, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 17:42:04', 1, 4, '::1'),
(571, 'Login: ClubHimalaya   logged in.', '2023-11-09 17:55:33', 1, 1, '::1'),
(572, 'Login: Super admin   logged in.', '2023-11-09 17:56:29', 1, 1, '::1'),
(573, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 17:58:44', 1, 4, '::1'),
(574, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 18:05:05', 1, 4, '::1'),
(575, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-09 18:05:15', 1, 4, '::1'),
(576, 'Login: ClubHimalaya   logged in.', '2023-11-10 10:41:03', 1, 1, '::1'),
(577, 'Login: Super admin   logged in.', '2023-11-10 10:42:06', 1, 1, '::1'),
(578, 'Login: ClubHimalaya   logged in.', '2023-11-10 11:59:19', 1, 1, '::1'),
(579, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-10 12:10:51', 1, 4, '::1'),
(580, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-10 12:11:03', 1, 4, '::1'),
(581, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-10 12:18:24', 1, 4, '::1'),
(582, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-10 12:32:34', 1, 4, '::1'),
(583, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2023-11-10 13:39:16', 1, 4, '::1'),
(584, 'Login: ClubHimalaya   logged in.', '2023-11-11 12:24:05', 1, 1, '::1'),
(585, 'Login: Super admin   logged in.', '2023-11-11 12:24:59', 1, 1, '::1'),
(586, 'User [ClubHimalaya  ] Edit Successfully', '2023-11-11 12:25:10', 1, 4, '::1'),
(587, 'User [Super admin  ] Edit Successfully', '2023-11-11 12:25:51', 1, 4, '::1'),
(588, 'ota [asdasdasd]Data has added successfully.', '2023-11-11 12:27:21', 1, 3, '::1'),
(589, 'ota [booking.com]Data has added successfully.', '2023-11-11 12:29:41', 1, 3, '::1'),
(590, 'ota [asd]Data has added successfully.', '2023-11-11 12:31:50', 1, 3, '::1'),
(591, 'ota  [asdasdasd]Data has deleted successfully.', '2023-11-11 12:31:59', 1, 6, '::1'),
(592, 'ota  [asdasdasd]Data has deleted successfully.', '2023-11-11 12:31:59', 1, 6, '::1'),
(593, 'ota  []Data has deleted successfully.', '2023-11-11 12:32:02', 1, 6, '::1'),
(594, 'ota  []Data has deleted successfully.', '2023-11-11 12:32:02', 1, 6, '::1'),
(595, 'ota  [booking.com]Data has deleted successfully.', '2023-11-11 12:32:02', 1, 6, '::1'),
(596, 'ota  [booking.com]Data has deleted successfully.', '2023-11-11 12:32:02', 1, 6, '::1'),
(597, 'ota [booking.com] Edit Successfully', '2023-11-11 12:32:27', 1, 4, '::1'),
(598, 'ota [agoda]Data has added successfully.', '2023-11-11 12:32:45', 1, 3, '::1'),
(599, 'ota [booking] Edit Successfully', '2023-11-11 12:32:54', 1, 4, '::1'),
(600, 'ota [expedia]Data has added successfully.', '2023-11-11 12:33:12', 1, 3, '::1'),
(601, 'ota [tripadvisor]Data has added successfully.', '2023-11-11 12:33:35', 1, 3, '::1'),
(602, 'ota [Make My Trip]Data has added successfully.', '2023-11-11 12:33:56', 1, 3, '::1'),
(603, 'Login: ClubHimalaya   logged in.', '2023-11-21 11:26:47', 1, 1, '::1'),
(604, 'Login: ClubHimalaya   logged in.', '2023-11-21 11:42:05', 1, 1, '::1'),
(605, 'Slideshow [asdasdasdasd]Data has added successfully.', '2023-11-21 11:55:43', 1, 3, '::1'),
(606, 'Login: ClubHimalaya   logged in.', '2023-11-22 12:39:54', 1, 1, '::1'),
(607, 'Login: ClubHimalaya   logged in.', '2023-11-29 19:11:14', 1, 1, '::1'),
(608, 'Login: ClubHimalaya   logged in.', '2023-12-12 10:50:45', 1, 1, '::1'),
(609, 'Login: ClubHimalaya   logged in.', '2024-01-08 14:49:51', 1, 1, '::1'),
(610, 'Login: ClubHimalaya   logged in.', '2024-01-10 12:47:25', 1, 1, '::1'),
(611, 'Login: ClubHimalaya   logged in.', '2024-01-10 12:47:40', 1, 1, '::1'),
(612, 'Login: ClubHimalaya   logged in.', '2024-01-10 12:49:19', 1, 1, '::1'),
(613, 'Login: ClubHimalaya   logged in.', '2024-01-10 12:51:17', 1, 1, '::1'),
(614, 'Login: ClubHimalaya   logged in.', '2024-01-10 12:52:51', 1, 1, '::1'),
(615, 'User [asdasd asdasd asdasd] login Created Data has added successfully.', '2024-01-10 12:55:05', 1, 3, '::1'),
(616, 'Login: Super admin   logged in.', '2024-01-10 12:55:36', 1, 1, '::1'),
(617, 'Menu [test] CreatedData has added successfully.', '2024-01-10 12:57:00', 1, 3, '::1'),
(618, 'Menu  [test]Data has deleted successfully.', '2024-01-10 12:57:47', 1, 6, '::1'),
(619, 'Article \'asdfasdf\' has added successfully.', '2024-01-10 13:11:12', 1, 3, '::1'),
(620, 'Changes on Article \'asdfasdf\' has been saved successfully.', '2024-01-10 13:11:39', 1, 4, '::1'),
(621, 'Features [inabsdioniasd]Data has added successfully.', '2024-01-10 13:13:19', 1, 3, '::1'),
(622, 'Features  [inabsdioniasd]Data has deleted successfully.', '2024-01-10 13:13:28', 1, 6, '::1'),
(623, 'Features [adfwererrd]Data has added successfully.', '2024-01-10 13:13:48', 1, 3, '::1'),
(624, 'Features  [adfwererrd]Data has deleted successfully.', '2024-01-10 13:14:09', 1, 6, '::1'),
(625, 'Package [testing 8.2]Data has added successfully.', '2024-01-10 13:14:35', 1, 3, '::1'),
(626, 'Sub Package \'asdasdasddasasd\' has added successfully.', '2024-01-10 13:15:21', 1, 3, '::1'),
(627, 'Slideshows  [asdasdasdasd]Data has deleted successfully.', '2024-01-10 13:15:39', 1, 6, '::1'),
(628, 'Slideshow  [asdasdasdasd]Data has deleted successfully.', '2024-01-10 13:15:39', 1, 6, '::1'),
(629, 'Slideshows  []Data has deleted successfully.', '2024-01-10 13:15:49', 1, 6, '::1'),
(630, 'Slideshow  []Data has deleted successfully.', '2024-01-10 13:15:49', 1, 6, '::1'),
(631, 'Vacency  [HR post wanted]Data has deleted successfully.', '2024-01-10 13:16:09', 1, 6, '::1'),
(632, 'Main service \'yuvvyuvyui\' has added successfully.', '2024-01-10 13:22:30', 1, 3, '::1'),
(633, 'Changes on Main service \'yuvvyuvyui\' has been saved successfully.', '2024-01-10 13:22:41', 1, 4, '::1'),
(634, 'Changes on Main service \'yuvvyuvyui\' has been saved successfully.', '2024-01-10 13:22:54', 1, 4, '::1'),
(635, 'Sub Gallery Image  [e]Data has deleted successfully.', '2024-01-10 13:25:45', 1, 6, '::1'),
(636, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 13:25:48', 1, 6, '::1'),
(637, 'Sub Gallery Image  [e]Data has deleted successfully.', '2024-01-10 13:25:48', 1, 6, '::1'),
(638, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 13:25:52', 1, 6, '::1'),
(639, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 13:25:52', 1, 6, '::1'),
(640, 'Sub Gallery Image  [e]Data has deleted successfully.', '2024-01-10 13:25:52', 1, 6, '::1'),
(641, 'Sub Gallery Image [ytvasd]Data has added successfully.', '2024-01-10 13:26:05', 1, 3, '::1'),
(642, 'Sub Gallery Image [yvasydiv]Data has added successfully.', '2024-01-10 13:26:05', 1, 3, '::1'),
(643, 'Sub Gallery Image [asdyvhjkv]Data has added successfully.', '2024-01-10 13:26:05', 1, 3, '::1'),
(644, 'User [Super admin  ] Edit Successfully', '2024-01-10 13:26:49', 1, 4, '::1'),
(645, 'Offers [ASAs]Data has added successfully.', '2024-01-10 13:29:39', 1, 3, '::1'),
(646, 'Offers [ASAs] Edit Successfully', '2024-01-10 13:30:02', 1, 4, '::1'),
(647, 'Offers [ASAs] Edit Successfully', '2024-01-10 13:30:23', 1, 4, '::1'),
(648, 'Login: Super admin   logged in.', '2024-01-10 14:50:52', 1, 1, '::1'),
(649, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:01', 1, 6, '::1'),
(650, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:04', 1, 6, '::1'),
(651, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:04', 1, 6, '::1'),
(652, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:30', 1, 6, '::1'),
(653, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:30', 1, 6, '::1'),
(654, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:30', 1, 6, '::1'),
(655, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:35', 1, 6, '::1'),
(656, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:35', 1, 6, '::1'),
(657, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:35', 1, 6, '::1'),
(658, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:35', 1, 6, '::1'),
(659, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:38', 1, 6, '::1'),
(660, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:38', 1, 6, '::1'),
(661, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:38', 1, 6, '::1'),
(662, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:38', 1, 6, '::1'),
(663, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:39', 1, 6, '::1'),
(664, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(665, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(666, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(667, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(668, 'Sub Gallery Image  []Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(669, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-01-10 14:52:44', 1, 6, '::1'),
(670, 'Sub Gallery Image [a]Data has added successfully.', '2024-01-10 14:53:12', 1, 3, '::1'),
(671, 'Sub Gallery Image [a]Data has added successfully.', '2024-01-10 14:53:12', 1, 3, '::1'),
(672, 'Sub Gallery Image [a]Data has added successfully.', '2024-01-10 14:53:12', 1, 3, '::1'),
(673, 'Popup \'asefasdasd\' has added successfully.', '2024-01-10 14:55:03', 1, 3, '::1'),
(674, 'Services [rtsetsdf]Data has added successfully.', '2024-01-10 14:57:52', 1, 3, '::1'),
(675, 'Servicess  [rtsetsdf]Data has deleted successfully.', '2024-01-10 14:58:09', 1, 6, '::1'),
(676, 'Services  [rtsetsdf]Data has deleted successfully.', '2024-01-10 14:58:09', 1, 6, '::1'),
(677, 'Login: Super admin   logged in.', '2024-01-11 17:07:29', 1, 1, '::1'),
(678, 'Login: ClubHimalaya   logged in.', '2024-01-12 10:59:26', 1, 1, '::1'),
(679, 'Login: ClubHimalaya   logged in.', '2024-01-16 10:32:37', 1, 1, '::1'),
(680, 'SocialNetworking [Facebook] Edit Successfully', '2024-01-16 10:35:23', 1, 4, '::1'),
(681, 'Login: ClubHimalaya   logged in.', '2024-01-17 11:13:45', 1, 1, '::1'),
(682, 'Menu  [HOME]Data has deleted successfully.', '2024-01-17 11:13:52', 1, 6, '::1'),
(683, 'Menu  [ABOUT US]Data has deleted successfully.', '2024-01-17 11:13:55', 1, 6, '::1'),
(684, 'Menu  [ROOMS & SUITES]Data has deleted successfully.', '2024-01-17 11:13:57', 1, 6, '::1'),
(685, 'Menu  [MICE]Data has deleted successfully.', '2024-01-17 11:13:59', 1, 6, '::1'),
(686, 'Menu  [RESTAURANTS & BAR]Data has deleted successfully.', '2024-01-17 11:14:01', 1, 6, '::1'),
(687, 'Menu  [FACILITIES]Data has deleted successfully.', '2024-01-17 11:14:03', 1, 6, '::1'),
(688, 'Menu  [GALLERY]Data has deleted successfully.', '2024-01-17 11:14:05', 1, 6, '::1'),
(689, 'Menu  [CAREER]Data has deleted successfully.', '2024-01-17 11:14:07', 1, 6, '::1'),
(690, 'Menu  [CONTACT US]Data has deleted successfully.', '2024-01-17 11:14:09', 1, 6, '::1'),
(691, 'Menu  [Our Partners]Data has deleted successfully.', '2024-01-17 11:14:11', 1, 6, '::1'),
(692, 'Login: ClubHimalaya   logged in.', '2024-01-18 13:37:35', 1, 1, '::1'),
(693, 'Login: ClubHimalaya   logged in.', '2024-01-23 15:41:13', 1, 1, '::1'),
(694, 'Login: Super admin   logged in.', '2024-01-23 15:50:09', 1, 1, '::1'),
(695, 'Login: ClubHimalaya   logged in.', '2024-01-23 15:50:16', 1, 1, '::1'),
(696, 'User [ClubHimalaya  ] Edit Successfully', '2024-01-23 15:53:56', 1, 4, '::1'),
(697, 'User [ClubHimalaya  ] Edit Successfully', '2024-01-23 15:57:02', 1, 4, '::1'),
(698, 'Login: ClubHimalaya   logged in.', '2024-01-23 15:57:08', 1, 1, '::1'),
(699, 'Login: Super admin   logged in.', '2024-01-23 16:00:52', 1, 1, '::1'),
(700, 'User [Super admin  ] Edit Successfully', '2024-01-23 16:47:00', 1, 4, '::1'),
(701, 'User Group [Administrator] Edit Successfully', '2024-01-23 16:48:35', 1, 4, '::1'),
(702, 'User Group [Administrator] Edit Successfully', '2024-01-23 16:48:59', 1, 4, '::1'),
(703, 'User [Super admin  ] Edit Successfully', '2024-01-23 16:49:15', 1, 4, '::1'),
(704, 'Login: Super admin   logged in.', '2024-01-23 16:49:20', 1, 1, '::1'),
(705, 'User [Super admin  ] Edit Successfully', '2024-01-23 16:49:39', 1, 4, '::1'),
(706, 'Login: Super admin   logged in.', '2024-01-23 16:49:44', 1, 1, '::1'),
(707, 'User Group [Administrator] Edit Successfully', '2024-01-23 16:56:17', 1, 4, '::1'),
(708, 'User [Super admin  ] Edit Successfully', '2024-01-23 16:56:27', 1, 4, '::1'),
(709, 'Login: Super admin   logged in.', '2024-01-23 16:56:31', 1, 1, '::1'),
(710, 'Login: Super admin   logged in.', '2024-01-24 10:56:17', 1, 1, '::1'),
(711, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2024-01-24 11:15:08', 1, 4, '::1'),
(712, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2024-01-24 11:18:03', 1, 4, '::1'),
(713, 'Changes on Config \'Club Himalaya\' has been saved successfully.', '2024-01-24 11:18:13', 1, 4, '::1'),
(714, 'User [Super admin  ] Edit Successfully', '2024-01-24 11:28:50', 1, 4, '::1'),
(715, 'Login: Super admin   logged in.', '2024-01-24 12:12:57', 1, 1, '::1'),
(716, 'Login: Super admin   logged in.', '2024-01-24 12:13:06', 1, 1, '::1'),
(717, 'Login: Super admin   logged in.', '2024-01-24 12:14:50', 1, 1, '::1'),
(718, 'Login: Super admin   logged in.', '2024-01-24 12:17:27', 1, 1, '::1'),
(719, 'Login: Super admin   logged in.', '2024-01-24 12:18:09', 1, 1, '::1'),
(720, 'Login: Super admin   logged in.', '2024-01-24 12:18:42', 1, 1, '::1'),
(721, 'User Group [Administrator] Edit Successfully', '2024-01-24 12:21:38', 1, 4, '::1'),
(722, 'User Group [Administrator] Edit Successfully', '2024-01-24 12:39:43', 1, 4, '::1'),
(723, 'Slideshow [testing video]Data has added successfully.', '2024-01-24 12:50:22', 1, 3, '::1'),
(724, 'Changes on Config \'Synhawk3.0\' has been saved successfully.', '2024-01-24 15:21:29', 1, 4, '::1'),
(725, 'Changes on Config \'Synhawk3.0\' has been saved successfully.', '2024-01-24 15:22:25', 1, 4, '::1'),
(726, 'Changes on Config \'Synhawk3.0\' has been saved successfully.', '2024-01-24 15:22:58', 1, 4, '::1'),
(727, 'Successfully Preference Properties Settings', '2024-01-24 15:54:10', 1, 4, '::1'),
(728, 'Login: ClubHimalaya   logged in.', '2024-01-25 15:54:57', 1, 1, '::1'),
(729, 'Login: ClubHimalaya   logged in.', '2024-01-25 15:55:21', 1, 1, '::1'),
(730, 'Login: ClubHimalaya   logged in.', '2024-01-25 15:56:37', 1, 1, '::1'),
(731, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-25 15:56:52', 1, 4, '::1'),
(732, 'Login: ClubHimalaya   logged in.', '2024-01-25 16:18:24', 1, 1, '::1'),
(733, 'Login: Super admin   logged in.', '2024-01-25 16:21:15', 1, 1, '::1'),
(734, 'User Group [Administrator] Edit Successfully', '2024-01-25 16:21:39', 1, 4, '::1'),
(735, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-25 16:23:44', 1, 4, '::1'),
(736, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-25 16:23:58', 1, 4, '::1'),
(737, 'Successfully Preference Properties Settings', '2024-01-25 16:26:19', 1, 4, '::1'),
(738, 'User Group [Administrator] Edit Successfully', '2024-01-25 16:27:28', 1, 4, '::1'),
(739, 'Features [facilities]Data has added successfully.', '2024-01-25 16:51:25', 1, 3, '::1'),
(740, 'Gallery Image [] Edit Successfully', '2024-01-25 16:52:36', 1, 4, '::1'),
(741, 'Gallery Image [asdasd] Edit Successfully', '2024-01-25 16:52:39', 1, 4, '::1'),
(742, 'Login: ClubHimalaya   logged in.', '2024-01-26 15:22:51', 1, 1, '::1'),
(743, 'Testimonial [Andrew Parker] Edit Successfully', '2024-01-26 15:27:16', 1, 4, '::1'),
(744, 'Testimonial [Andrew Parker] Edit Successfully', '2024-01-26 15:27:20', 1, 4, '::1'),
(745, 'Testimonial [Andrew Parker] Edit Successfully', '2024-01-26 15:36:21', 1, 4, '::1'),
(746, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-26 16:26:36', 1, 4, '::1'),
(747, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-26 16:26:45', 1, 4, '::1'),
(748, 'Login: ClubHimalaya   logged in.', '2024-01-28 10:29:13', 1, 1, '::1'),
(749, 'User Group [Administrator] Edit Successfully', '2024-01-28 10:45:29', 1, 4, '::1'),
(750, 'Login: ClubHimalaya   logged in.', '2024-01-28 11:03:59', 1, 1, '::1'),
(751, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-28 11:20:35', 1, 4, '::1'),
(752, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-28 11:20:43', 1, 4, '::1'),
(753, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-28 11:23:35', 1, 4, '::1'),
(754, 'User Group [General Admin] Edit Successfully', '2024-01-28 11:32:02', 1, 4, '::1'),
(755, 'Login: Super admin   logged in.', '2024-01-28 11:49:53', 1, 1, '::1'),
(756, 'User Group [Hotel Users] Edit Successfully', '2024-01-28 11:50:16', 1, 4, '::1'),
(757, 'User Group [General Users] Edit Successfully', '2024-01-28 11:50:38', 1, 4, '::1'),
(758, 'User [ClubHimalaya  ] Edit Successfully', '2024-01-28 11:50:52', 1, 4, '::1'),
(759, 'User [asdasd asdasd asdasd] Edit Successfully', '2024-01-28 11:51:10', 1, 4, '::1'),
(760, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:08:34', 1, 3, '::1'),
(761, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:12:59', 1, 3, '::1'),
(762, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:15:31', 1, 3, '::1'),
(763, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:17:00', 1, 3, '::1'),
(764, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:20:20', 1, 3, '::1'),
(765, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:21:19', 1, 3, '::1'),
(766, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:22:38', 1, 3, '::1'),
(767, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:22:52', 1, 3, '::1'),
(768, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:23:15', 1, 3, '::1'),
(769, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:23:24', 1, 3, '::1'),
(770, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:24:52', 1, 3, '::1'),
(771, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:26:06', 1, 3, '::1'),
(772, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:30:36', 1, 3, '::1'),
(773, 'Slideshow [dsaasd]Data has added successfully.', '2024-01-28 12:35:36', 1, 3, '::1'),
(774, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 12:36:35', 1, 3, '::1'),
(775, 'Slideshow [asdasdasdasdasd]Data has added successfully.', '2024-01-28 12:42:51', 1, 3, '::1'),
(776, 'Slideshow [asdasdasdasdasd]Data has added successfully.', '2024-01-28 12:43:05', 1, 3, '::1'),
(777, 'Slideshow [asdasdasdasdasd]Data has added successfully.', '2024-01-28 12:43:36', 1, 3, '::1'),
(778, 'Slideshows  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:32', 1, 6, '::1'),
(779, 'Slideshow  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:32', 1, 6, '::1'),
(780, 'Slideshows  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:35', 1, 6, '::1'),
(781, 'Slideshow  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:35', 1, 6, '::1'),
(782, 'Slideshows  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:37', 1, 6, '::1'),
(783, 'Slideshow  [asdasdasdasdasd]Data has deleted successfully.', '2024-01-28 12:55:37', 1, 6, '::1'),
(784, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:03:33', 1, 3, '::1'),
(785, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:05:53', 1, 3, '::1'),
(786, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:06:56', 1, 3, '::1'),
(787, 'Slideshow [asdasdas]Data has added successfully.', '2024-01-28 13:09:30', 1, 3, '::1'),
(788, 'Slideshow [asdasdas]Data has added successfully.', '2024-01-28 13:09:43', 1, 3, '::1'),
(789, 'Slideshow [asdasdas]Data has added successfully.', '2024-01-28 13:13:33', 1, 3, '::1'),
(790, 'Slideshows  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:48', 1, 6, '::1'),
(791, 'Slideshow  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:48', 1, 6, '::1'),
(792, 'Slideshows  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:51', 1, 6, '::1'),
(793, 'Slideshow  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:51', 1, 6, '::1'),
(794, 'Slideshows  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:54', 1, 6, '::1'),
(795, 'Slideshow  [asdasdas]Data has deleted successfully.', '2024-01-28 13:14:54', 1, 6, '::1'),
(796, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:16:38', 1, 3, '::1'),
(797, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:16:46', 1, 3, '::1'),
(798, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:20:47', 1, 3, '::1'),
(799, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:21:28', 1, 3, '::1'),
(800, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 13:21:46', 1, 6, '::1'),
(801, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 13:21:46', 1, 6, '::1'),
(802, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 13:21:46', 1, 6, '::1'),
(803, 'Slideshow  [testing]Data has deleted successfully.', '2024-01-28 13:21:46', 1, 6, '::1'),
(804, 'Slideshow [asdasdasdasdasd]Data has added successfully.', '2024-01-28 13:22:05', 1, 3, '::1'),
(805, 'Slideshow [asdasdasdasdasdsASDasd] Edit Successfully', '2024-01-28 13:24:30', 1, 4, '::1'),
(806, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:25:05', 1, 3, '::1'),
(807, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:31:57', 1, 3, '::1'),
(808, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:40:15', 1, 3, '::1'),
(809, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:41:03', 1, 3, '::1'),
(810, 'Slideshow [asdasdasd]Data has added successfully.', '2024-01-28 13:41:40', 1, 3, '::1'),
(811, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:42:15', 1, 3, '::1'),
(812, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:42:44', 1, 3, '::1'),
(813, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:47:49', 1, 3, '::1'),
(814, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:48:10', 1, 3, '::1'),
(815, 'Slideshow [asdasd]Data has added successfully.', '2024-01-28 13:51:14', 1, 3, '::1'),
(816, 'Successfully Tour Package Properties Settings', '2024-01-28 14:10:12', 1, 4, '::1'),
(817, 'Successfully Tour Package Properties Settings', '2024-01-28 14:10:30', 1, 4, '::1'),
(818, 'Login: Super admin   logged in.', '2024-01-28 14:51:04', 1, 1, '::1'),
(819, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(820, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(821, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(822, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(823, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(824, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(825, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(826, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(827, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-01-28 14:51:38', 1, 6, '::1'),
(828, 'Slideshow [qweqweqwe]Data has added successfully.', '2024-01-28 14:54:26', 1, 3, '::1'),
(829, 'Slideshow [qweqweqwe]Data has added successfully.', '2024-01-28 14:54:46', 1, 3, '::1'),
(830, 'Slideshow [sadfasdsdafasd]Data has added successfully.', '2024-01-28 15:02:25', 1, 3, '::1'),
(831, 'Slideshow [sadfasdsdafasd]Data has added successfully.', '2024-01-28 15:02:49', 1, 3, '::1'),
(832, 'Slideshow [asd]Data has added successfully.', '2024-01-28 15:09:35', 1, 3, '::1'),
(833, 'Slideshow  [sadfasdsdafasd]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(834, 'Slideshow  [sadfasdsdafasd]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(835, 'Slideshow  [qweqweqwe]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(836, 'Slideshow  [qweqweqwe]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(837, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(838, 'Slideshow  [dsaasd]Data has deleted successfully.', '2024-01-28 15:14:18', 1, 6, '::1'),
(839, 'Slideshow [saddsaasd]Data has added successfully.', '2024-01-28 15:14:30', 1, 3, '::1'),
(840, 'Slideshow [saddsaasd]Data has added successfully.', '2024-01-28 15:15:37', 1, 3, '::1'),
(841, 'Slideshow [saddsaasd]Data has added successfully.', '2024-01-28 15:17:55', 1, 3, '::1'),
(842, 'Slideshow [saddsaasd]Data has added successfully.', '2024-01-28 15:20:35', 1, 3, '::1'),
(843, 'Slideshow  [saddsaasd]Data has deleted successfully.', '2024-01-28 15:20:59', 1, 6, '::1'),
(844, 'Slideshow  [saddsaasd]Data has deleted successfully.', '2024-01-28 15:20:59', 1, 6, '::1'),
(845, 'Slideshow  [saddsaasd]Data has deleted successfully.', '2024-01-28 15:20:59', 1, 6, '::1'),
(846, 'Slideshow  [saddsaasd]Data has deleted successfully.', '2024-01-28 15:20:59', 1, 6, '::1'),
(847, 'Slideshow [dsadsadad]Data has added successfully.', '2024-01-28 15:21:34', 1, 3, '::1'),
(848, 'Slideshow [asdasdasdsad]Data has added successfully.', '2024-01-28 15:22:18', 1, 3, '::1'),
(849, 'Slideshow [asdasdasdsad]Data has added successfully.', '2024-01-28 15:23:07', 1, 3, '::1'),
(850, 'Slideshow [asdasdasdsada]Data has added successfully.', '2024-01-28 15:24:42', 1, 3, '::1'),
(851, 'Slideshow [asdasdasdsad] Edit Successfully', '2024-01-28 15:30:58', 1, 4, '::1'),
(852, 'Slideshow  [asdasdasdsada]Data has deleted successfully.', '2024-01-28 15:31:50', 1, 6, '::1'),
(853, 'Slideshow  [asdasdasdsad]Data has deleted successfully.', '2024-01-28 15:31:50', 1, 6, '::1'),
(854, 'Slideshow  [asdasdasdsad]Data has deleted successfully.', '2024-01-28 15:31:50', 1, 6, '::1'),
(855, 'Slideshow  [dsadsadad]Data has deleted successfully.', '2024-01-28 15:31:50', 1, 6, '::1'),
(856, 'Slideshow [asd]Data has added successfully.', '2024-01-28 15:32:02', 1, 3, '::1'),
(857, 'Slideshow [asdd] Edit Successfully', '2024-01-28 15:32:15', 1, 4, '::1'),
(858, 'Slideshow [asdd] Edit Successfully', '2024-01-28 15:35:12', 1, 4, '::1'),
(859, 'Slideshow [asddd] Edit Successfully', '2024-01-28 15:35:25', 1, 4, '::1'),
(860, 'Slideshow [asddd] Edit Successfully', '2024-01-28 15:35:32', 1, 4, '::1'),
(861, 'Slideshow [asddd] Edit Successfully', '2024-01-28 15:35:35', 1, 4, '::1'),
(862, 'Login: ClubHimalaya   logged in.', '2024-01-28 15:38:58', 1, 1, '::1'),
(863, 'User [ClubHimalayaa  ] Edit Successfully', '2024-01-28 15:39:06', 1, 4, '::1'),
(864, 'User [ClubHimalayaa  ] Edit Successfully', '2024-01-28 15:39:23', 1, 4, '::1'),
(865, 'Login: Super admin   logged in.', '2024-01-28 15:40:29', 1, 1, '::1'),
(866, 'Login: ClubHimalayaa   logged in.', '2024-01-28 15:44:54', 1, 1, '::1'),
(867, 'Login: ClubHimalayaa   logged in.', '2024-01-28 15:45:31', 1, 1, '::1'),
(868, 'Login: Super admin   logged in.', '2024-01-28 15:45:38', 1, 1, '::1'),
(869, 'User [ClubHimalayaa  ] Edit Successfully', '2024-01-28 15:45:49', 1, 4, '::1'),
(870, 'Login: ClubHimalayaa   logged in.', '2024-01-28 15:46:07', 1, 1, '::1'),
(871, 'User [ClubHimalayaa  ] Edit Successfully', '2024-01-28 15:46:55', 1, 4, '::1'),
(872, 'Login: Super admin   logged in.', '2024-01-28 15:48:13', 1, 1, '::1'),
(873, 'Login: ClubHimalayaa   logged in.', '2024-01-28 15:48:32', 1, 1, '::1'),
(874, 'Login: Super admin   logged in.', '2024-01-28 15:48:35', 1, 1, '::1'),
(875, 'User [ClubHimalayaa  ] Edit Successfully', '2024-01-28 15:50:22', 1, 4, '::1'),
(876, 'Login: ClubHimalayaa   logged in.', '2024-01-28 15:50:28', 1, 1, '::1'),
(877, 'User [ClubHimalaya  ] Edit Successfully', '2024-01-28 15:50:42', 1, 4, '::1'),
(878, 'Login: ClubHimalaya   logged in.', '2024-01-28 15:50:49', 1, 1, '::1'),
(879, 'Login: Super admin   logged in.', '2024-01-28 15:51:57', 1, 1, '::1'),
(880, 'User [Super admina  ] Edit Successfully', '2024-01-28 15:52:08', 1, 4, '::1'),
(881, 'User [Super admina  ] Edit Successfully', '2024-01-28 15:55:50', 1, 4, '::1'),
(882, 'Login: Super admina   logged in.', '2024-01-28 15:55:58', 1, 1, '::1'),
(883, 'User [Super admin  ] Edit Successfully', '2024-01-28 15:56:05', 1, 4, '::1'),
(884, 'Login: Super admin   logged in.', '2024-01-28 15:56:10', 1, 1, '::1'),
(885, 'User [Super admin  ] Edit Successfully', '2024-01-28 15:58:44', 1, 4, '::1'),
(886, 'Login: Super admin   logged in.', '2024-01-28 15:58:54', 1, 1, '::1'),
(887, 'User [Super admina  ] Edit Successfully', '2024-01-28 15:59:10', 1, 4, '::1'),
(888, 'Login: Super admina   logged in.', '2024-01-28 15:59:16', 1, 1, '::1'),
(889, 'User [Super admin  ] Edit Successfully', '2024-01-28 15:59:25', 1, 4, '::1'),
(890, 'Login: ClubHimalaya   logged in.', '2024-01-28 16:00:08', 1, 1, '::1'),
(891, 'Login: Super admin   logged in.', '2024-01-28 16:01:36', 1, 1, '::1'),
(892, 'Successfully Preference Properties Settings', '2024-01-28 16:26:42', 1, 4, '::1'),
(893, 'Successfully Preference Properties Settings', '2024-01-28 16:29:24', 1, 4, '::1'),
(894, 'Successfully Preference Properties Settings', '2024-01-28 16:32:13', 1, 4, '::1'),
(895, 'Successfully Preference Properties Settings', '2024-01-28 16:32:22', 1, 4, '::1'),
(896, 'Login: Super admin   logged in.', '2024-01-28 16:52:41', 1, 1, '::1'),
(897, 'Login: ClubHimalaya   logged in.', '2024-01-28 16:53:39', 1, 1, '::1'),
(898, 'Login: Super admin   logged in.', '2024-01-28 16:54:10', 1, 1, '::1'),
(899, 'User Group [Administrator] Edit Successfully', '2024-01-28 17:02:39', 1, 4, '::1'),
(900, 'User Group [Administrator] Edit Successfully', '2024-01-28 17:02:46', 1, 4, '::1'),
(901, 'User Group [Hotel Users] Edit Successfully', '2024-01-28 17:03:12', 1, 4, '::1'),
(902, 'User Group [General Users] Edit Successfully', '2024-01-28 17:03:22', 1, 4, '::1'),
(903, 'Successfully Preference Properties Settings', '2024-01-28 17:05:34', 1, 4, '::1'),
(904, 'Slideshow [qweqwe]Data has added successfully.', '2024-01-28 17:06:12', 1, 3, '::1'),
(905, 'Slideshow [qweqweqw]Data has added successfully.', '2024-01-28 17:06:28', 1, 3, '::1'),
(906, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-28 17:16:18', 1, 4, '::1'),
(907, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-28 17:17:16', 1, 4, '::1'),
(908, 'Login: Super admin   logged in.', '2024-01-28 23:06:25', 1, 1, '::1'),
(909, 'Login: Super admin   logged in.', '2024-01-29 10:32:12', 1, 1, '::1'),
(910, 'Login: ClubHimalaya   logged in.', '2024-01-29 10:43:48', 1, 1, '::1'),
(911, 'Changes on Sub Package \'Junior Suite\' has been saved successfully.', '2024-01-29 10:44:19', 1, 4, '::1'),
(912, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-01-29 10:44:34', 1, 4, '::1'),
(913, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2024-01-29 10:44:46', 1, 4, '::1'),
(914, 'Changes on Sub Package \'Standard Room\' has been saved successfully.', '2024-01-29 10:45:03', 1, 4, '::1'),
(915, 'Login: Super admin   logged in.', '2024-01-29 10:54:13', 1, 1, '::1'),
(916, 'Successfully News Properties Settings', '2024-01-29 10:57:01', 1, 4, '::1'),
(917, 'Successfully News Properties Settings', '2024-01-29 10:59:28', 1, 4, '::1'),
(918, 'Successfully News Properties Settings', '2024-01-29 11:02:32', 1, 4, '::1'),
(919, 'Successfully News Properties Settings', '2024-01-29 11:03:39', 1, 4, '::1'),
(920, 'Successfully Offers Properties Settings', '2024-01-29 11:07:43', 1, 4, '::1'),
(921, 'Successfully  Package Properties Settings', '2024-01-29 11:22:42', 1, 4, '::1'),
(922, 'Successfully Social Link Properties Settings', '2024-01-29 11:25:20', 1, 4, '::1'),
(923, 'Successfully Articles Properties Settings', '2024-01-29 11:28:22', 1, 4, '::1'),
(924, 'Successfully Slideshow Properties Settings', '2024-01-29 11:29:23', 1, 4, '::1'),
(925, 'Successfully  Package Properties Settings', '2024-01-29 11:30:28', 1, 4, '::1'),
(926, 'Successfully Gallery Properties Settings', '2024-01-29 11:33:20', 1, 4, '::1'),
(927, 'Gallery [adasdas]Data has added successfully.', '2024-01-29 11:33:38', 1, 3, '::1'),
(928, 'Successfully Testimonial Properties Settings', '2024-01-29 11:37:44', 1, 4, '::1'),
(929, 'Successfully Social Link Properties Settings', '2024-01-29 11:47:58', 1, 4, '::1'),
(930, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-29 11:50:01', 1, 4, '::1'),
(931, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-29 11:51:11', 1, 4, '::1'),
(932, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-29 12:15:31', 1, 4, '::1'),
(933, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-01-29 12:15:47', 1, 4, '::1'),
(934, 'Login: ClubHimalaya   logged in.', '2024-05-10 16:32:10', 1, 1, '::1'),
(935, 'Login: Super admin   logged in.', '2024-05-10 16:40:01', 1, 1, '::1'),
(936, 'User Group [Administrator] Edit Successfully', '2024-05-10 16:40:11', 1, 4, '::1'),
(937, 'Download [asdasd]Data has added successfully.', '2024-05-10 16:44:57', 1, 3, '::1'),
(938, 'Login: admin logged in.', '2024-07-31 21:19:25', 1, 1, '::1'),
(939, 'Menu  [FAQ\'s]Data has deleted successfully.', '2024-07-31 21:25:01', 1, 6, '::1'),
(940, 'Menu  [Enhanced Safety]Data has deleted successfully.', '2024-07-31 21:25:04', 1, 6, '::1'),
(941, 'Menu  [Event Halls]Data has deleted successfully.', '2024-07-31 21:25:06', 1, 6, '::1'),
(942, 'Menu  [Contact]Data has deleted successfully.', '2024-07-31 21:25:08', 1, 6, '::1'),
(943, 'Menu [Home] CreatedData has added successfully.', '2024-07-31 21:25:34', 1, 3, '::1'),
(944, 'Menu [Accommodation] CreatedData has added successfully.', '2024-07-31 21:25:52', 1, 3, '::1'),
(945, 'Menu [Dining] CreatedData has added successfully.', '2024-07-31 21:26:08', 1, 3, '::1'),
(946, 'Menu [Meeting & Events] CreatedData has added successfully.', '2024-07-31 21:26:29', 1, 3, '::1'),
(947, 'Menu [Gallery] CreatedData has added successfully.', '2024-07-31 21:27:09', 1, 3, '::1'),
(948, 'Menu [Facilities] CreatedData has added successfully.', '2024-07-31 21:27:22', 1, 3, '::1'),
(949, 'Menu [Contact] CreatedData has added successfully.', '2024-07-31 21:27:35', 1, 3, '::1'),
(950, 'Menu [The Hotel] CreatedData has added successfully.', '2024-07-31 21:27:58', 1, 3, '::1'),
(951, 'Menu [Meeting & Events] CreatedData has added successfully.', '2024-07-31 21:28:06', 1, 3, '::1'),
(952, 'Menu [Gallery] CreatedData has added successfully.', '2024-07-31 21:28:14', 1, 3, '::1'),
(953, 'Menu [career] CreatedData has added successfully.', '2024-07-31 21:28:22', 1, 3, '::1'),
(954, 'Login: admin logged in.', '2024-08-22 15:43:13', 1, 1, '::1'),
(955, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-22 15:45:12', 1, 4, '::1'),
(956, 'Changes on Article \'About Annapurna View\' has been saved successfully.', '2024-08-22 16:12:49', 1, 4, '::1'),
(957, 'Changes on Article \'About Annapurna View\' has been saved successfully.', '2024-08-22 16:13:32', 1, 4, '::1'),
(958, 'Services [LED Tv] Edit Successfully', '2024-08-22 16:36:10', 1, 4, '::1'),
(959, 'Article \'Activities Around\' has added successfully.', '2024-08-22 16:45:51', 1, 3, '::1'),
(960, 'Changes on Article \'Activities Around\' has been saved successfully.', '2024-08-22 16:50:08', 1, 4, '::1'),
(961, 'Changes on Article \'Activities Around\' has been saved successfully.', '2024-08-22 17:24:41', 1, 4, '::1'),
(962, 'Login: admin logged in.', '2024-08-23 09:29:13', 1, 1, '::1'),
(963, 'Package Rooms Edit Successfully', '2024-08-23 09:42:40', 1, 4, '::1'),
(964, 'Package Accommodations Edit Successfully', '2024-08-23 09:43:20', 1, 4, '::1'),
(965, 'Menu [Accommodation] Edit Successfully', '2024-08-23 09:43:38', 1, 4, '::1'),
(966, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-08-23 09:48:09', 1, 4, '::1'),
(967, 'SubPackage Gallery Image [deluxe]Data has deleted successfully.', '2024-08-23 10:10:37', 1, 6, '::1'),
(968, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-23 10:10:40', 1, 6, '::1'),
(969, 'SubPackage Gallery Image [delxue]Data has deleted successfully.', '2024-08-23 10:10:40', 1, 6, '::1'),
(970, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-23 10:10:42', 1, 6, '::1'),
(971, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-23 10:10:42', 1, 6, '::1'),
(972, 'SubPackage Gallery Image [deluxe]Data has deleted successfully.', '2024-08-23 10:10:42', 1, 6, '::1'),
(973, 'Sub Package Image [room1]Data has added successfully.', '2024-08-23 10:11:24', 1, 3, '::1'),
(974, 'Sub Package Image [room2]Data has added successfully.', '2024-08-23 10:11:24', 1, 3, '::1'),
(975, 'Sub Package Image [room 3]Data has added successfully.', '2024-08-23 10:11:24', 1, 3, '::1'),
(976, 'Sub Package Image [room 4]Data has added successfully.', '2024-08-23 10:11:24', 1, 3, '::1'),
(977, 'Sub Package Image [room5]Data has added successfully.', '2024-08-23 10:11:24', 1, 3, '::1'),
(978, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-08-23 10:31:30', 1, 4, '::1'),
(979, 'Features [Room Amenities]Data has added successfully.', '2024-08-23 10:32:59', 1, 3, '::1'),
(980, 'Features [Twin Bed]Data has added successfully.', '2024-08-23 10:33:47', 1, 3, '::1'),
(981, 'Features  [Twin Bed]Data has deleted successfully.', '2024-08-23 10:33:57', 1, 6, '::1'),
(982, 'Features [Twin Bed]Data has added successfully.', '2024-08-23 10:34:07', 1, 3, '::1'),
(983, 'Features [Breakfast]Data has added successfully.', '2024-08-23 10:34:24', 1, 3, '::1'),
(984, 'Features [Bathrobe & Slippers]Data has added successfully.', '2024-08-23 10:34:43', 1, 3, '::1'),
(985, 'Features [Hairdryer]Data has added successfully.', '2024-08-23 10:35:10', 1, 3, '::1'),
(986, 'Features [Bathtub]Data has added successfully.', '2024-08-23 10:35:23', 1, 3, '::1'),
(987, 'Features [Sitting Area]Data has added successfully.', '2024-08-23 10:35:33', 1, 3, '::1'),
(988, 'Features [Desk]Data has added successfully.', '2024-08-23 10:35:42', 1, 3, '::1'),
(989, 'Features [Mountains View]Data has added successfully.', '2024-08-23 10:36:13', 1, 3, '::1'),
(990, 'Features [Wifi]Data has added successfully.', '2024-08-23 10:36:37', 1, 3, '::1'),
(991, 'Features [Air Conditioner]Data has added successfully.', '2024-08-23 10:36:48', 1, 3, '::1'),
(992, 'Features [Television]Data has added successfully.', '2024-08-23 10:37:00', 1, 3, '::1'),
(993, 'Features [Safe locker]Data has added successfully.', '2024-08-23 10:37:12', 1, 3, '::1'),
(994, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-08-23 10:37:43', 1, 4, '::1'),
(995, 'Testimonial [Andrew Parker] Edit Successfully', '2024-08-23 11:08:10', 1, 4, '::1'),
(996, 'Menu [Home] Edit Successfully', '2024-08-23 11:12:07', 1, 4, '::1'),
(997, 'Menu [Home] Edit Successfully', '2024-08-23 11:13:43', 1, 4, '::1'),
(998, 'Changes on Sub Package \'Junior Suite\' has been saved successfully.', '2024-08-23 11:17:40', 1, 4, '::1'),
(999, 'Changes on Sub Package \'Deluxe Premium Room\' has been saved successfully.', '2024-08-23 11:17:54', 1, 4, '::1'),
(1000, 'Changes on Sub Package \'Standard Room\' has been saved successfully.', '2024-08-23 11:18:09', 1, 4, '::1'),
(1001, 'Testimonial [Andrew Parker] Edit Successfully', '2024-08-23 11:22:41', 1, 4, '::1'),
(1002, 'Testimonial [PAVEL A] Edit Successfully', '2024-08-23 11:23:23', 1, 4, '::1'),
(1003, 'Changes on Article \'About Annapurna View\' has been saved successfully.', '2024-08-23 12:01:05', 1, 4, '::1'),
(1004, 'Changes on Article \'About Annapurna View\' has been saved successfully.', '2024-08-23 12:01:46', 1, 4, '::1'),
(1005, 'Changes on Article \'About Annapurna View\' has been saved successfully.', '2024-08-23 12:05:13', 1, 4, '::1'),
(1006, 'Login: admin logged in.', '2024-08-23 14:15:43', 1, 1, '::1'),
(1007, 'Package Dining Edit Successfully', '2024-08-23 14:22:57', 1, 4, '::1'),
(1008, 'Package Mice Edit Successfully', '2024-08-23 14:23:07', 1, 4, '::1'),
(1009, 'Login: admin logged in.', '2024-08-23 16:21:10', 1, 1, '::1'),
(1010, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-08-23 16:50:08', 1, 6, '::1'),
(1011, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:50:12', 1, 6, '::1'),
(1012, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-08-23 16:50:12', 1, 6, '::1'),
(1013, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:50:15', 1, 6, '::1');
INSERT INTO `tbl_logs` (`id`, `action`, `registered`, `userid`, `user_action`, `ip_track`) VALUES
(1014, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:50:15', 1, 6, '::1'),
(1015, 'Sub Gallery Image  [a]Data has deleted successfully.', '2024-08-23 16:50:15', 1, 6, '::1'),
(1016, 'Sub Gallery Image [room 1]Data has added successfully.', '2024-08-23 16:51:02', 1, 3, '::1'),
(1017, 'Sub Gallery Image [room 2]Data has added successfully.', '2024-08-23 16:51:02', 1, 3, '::1'),
(1018, 'Gallery Image  [adasdas]Data has deleted successfully.', '2024-08-23 16:51:20', 1, 6, '::1'),
(1019, 'Gallery Image [Dining] Edit Successfully', '2024-08-23 16:51:25', 1, 4, '::1'),
(1020, 'Sub Gallery Image  [asdasd]Data has deleted successfully.', '2024-08-23 16:51:30', 1, 6, '::1'),
(1021, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:51:33', 1, 6, '::1'),
(1022, 'Sub Gallery Image  [yvasydiv]Data has deleted successfully.', '2024-08-23 16:51:33', 1, 6, '::1'),
(1023, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:51:35', 1, 6, '::1'),
(1024, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:51:35', 1, 6, '::1'),
(1025, 'Sub Gallery Image  [asdyvhjkv]Data has deleted successfully.', '2024-08-23 16:51:35', 1, 6, '::1'),
(1026, 'Sub Gallery Image [dining 1]Data has added successfully.', '2024-08-23 16:51:58', 1, 3, '::1'),
(1027, 'Gallery Image  [restaurant]Data has deleted successfully.', '2024-08-23 16:52:22', 1, 6, '::1'),
(1028, 'Sub Gallery Image  [d]Data has deleted successfully.', '2024-08-23 16:52:25', 1, 6, '::1'),
(1029, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:52:27', 1, 6, '::1'),
(1030, 'Sub Gallery Image  [d]Data has deleted successfully.', '2024-08-23 16:52:27', 1, 6, '::1'),
(1031, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:52:29', 1, 6, '::1'),
(1032, 'Sub Gallery Image  []Data has deleted successfully.', '2024-08-23 16:52:30', 1, 6, '::1'),
(1033, 'Sub Gallery Image  [d]Data has deleted successfully.', '2024-08-23 16:52:30', 1, 6, '::1'),
(1034, 'Login: admin logged in.', '2024-08-24 17:26:25', 1, 1, '::1'),
(1035, 'Login: admin logged in.', '2024-08-26 09:26:03', 1, 1, '::1'),
(1036, 'Login: superadmin logged in.', '2024-08-26 09:26:37', 1, 1, '::1'),
(1037, 'Blog [Nagarkot Nepal ] Edit Successfully', '2024-08-26 09:26:57', 1, 4, '::1'),
(1038, 'Blog [qwseasdas] Edit Successfully', '2024-08-26 09:27:19', 1, 4, '::1'),
(1039, 'Blog [Nagarkot Nepal ] Edit Successfully', '2024-08-26 09:27:27', 1, 4, '::1'),
(1040, 'Blog [test 1] Edit Successfully', '2024-08-26 09:27:34', 1, 4, '::1'),
(1041, 'Blog [Places-of-interest] Edit Successfully', '2024-08-26 09:27:42', 1, 4, '::1'),
(1042, 'Blog [Excursions to nearby places] Edit Successfully', '2024-08-26 09:27:48', 1, 4, '::1'),
(1043, 'Blog [Brief On Club Himalaya] Edit Successfully', '2024-08-26 09:27:59', 1, 4, '::1'),
(1044, 'Package Dining and delight Edit Successfully', '2024-08-26 09:31:42', 1, 4, '::1'),
(1045, 'Changes on Sub Package \'Lounge and bar\' has been saved successfully.', '2024-08-26 09:32:55', 1, 4, '::1'),
(1046, 'Changes on Sub Package \'Shristi Restaurant\' has been saved successfully.', '2024-08-26 09:34:11', 1, 4, '::1'),
(1047, 'SubPackage Gallery Image [a]Data has deleted successfully.', '2024-08-26 09:34:38', 1, 6, '::1'),
(1048, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 09:34:41', 1, 6, '::1'),
(1049, 'SubPackage Gallery Image [a]Data has deleted successfully.', '2024-08-26 09:34:41', 1, 6, '::1'),
(1050, 'Sub Package Image [dine]Data has added successfully.', '2024-08-26 09:35:54', 1, 3, '::1'),
(1051, 'Sub Package Image [dine 2]Data has added successfully.', '2024-08-26 09:35:54', 1, 3, '::1'),
(1052, 'Sub Package Image [dine 3]Data has added successfully.', '2024-08-26 09:35:54', 1, 3, '::1'),
(1053, 'Sub Package Image [dine 4]Data has added successfully.', '2024-08-26 09:35:54', 1, 3, '::1'),
(1054, 'Sub Package Image [din e 5]Data has added successfully.', '2024-08-26 09:35:54', 1, 3, '::1'),
(1055, 'SubPackage Gallery Image [s]Data has deleted successfully.', '2024-08-26 09:36:02', 1, 6, '::1'),
(1056, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 09:36:05', 1, 6, '::1'),
(1057, 'SubPackage Gallery Image [s]Data has deleted successfully.', '2024-08-26 09:36:05', 1, 6, '::1'),
(1058, 'SubPackage Gallery Image [din e 5]Data has deleted successfully.', '2024-08-26 09:59:50', 1, 6, '::1'),
(1059, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 09:59:53', 1, 6, '::1'),
(1060, 'SubPackage Gallery Image [dine 4]Data has deleted successfully.', '2024-08-26 09:59:53', 1, 6, '::1'),
(1061, 'Package Meeting & Conference Edit Successfully', '2024-08-26 10:06:24', 1, 4, '::1'),
(1062, 'Changes on Sub Package \'The meeting rooms\' has been saved successfully.', '2024-08-26 10:17:23', 1, 4, '::1'),
(1063, 'SubPackage Gallery Image [b]Data has deleted successfully.', '2024-08-26 10:17:27', 1, 6, '::1'),
(1064, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 10:17:29', 1, 6, '::1'),
(1065, 'SubPackage Gallery Image [bb]Data has deleted successfully.', '2024-08-26 10:17:29', 1, 6, '::1'),
(1066, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 10:17:32', 1, 6, '::1'),
(1067, 'SubPackage Gallery Image [b]Data has deleted successfully.', '2024-08-26 10:17:32', 1, 6, '::1'),
(1068, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-08-26 10:17:32', 1, 6, '::1'),
(1069, 'Sub Package Image [meet]Data has added successfully.', '2024-08-26 10:17:56', 1, 3, '::1'),
(1070, 'Sub Package Image [meet 2]Data has added successfully.', '2024-08-26 10:17:56', 1, 3, '::1'),
(1071, 'Sub Package Image [meet 3]Data has added successfully.', '2024-08-26 10:17:56', 1, 3, '::1'),
(1072, 'Sub Package Image [meet 5]Data has added successfully.', '2024-08-26 10:18:19', 1, 3, '::1'),
(1073, 'Offers [ASAs] Edit Successfully', '2024-08-26 10:47:59', 1, 4, '::1'),
(1074, 'Offers [Package-1] Edit Successfully', '2024-08-26 10:48:10', 1, 4, '::1'),
(1075, 'Offers [Package-2]Data has added successfully.', '2024-08-26 10:48:22', 1, 3, '::1'),
(1076, 'Offers [Package-3]Data has added successfully.', '2024-08-26 10:48:50', 1, 3, '::1'),
(1077, 'Offers [Package-4]Data has added successfully.', '2024-08-26 10:49:06', 1, 3, '::1'),
(1078, 'Offers [Package-5]Data has added successfully.', '2024-08-26 10:49:39', 1, 3, '::1'),
(1079, 'Offers [Package-6]Data has added successfully.', '2024-08-26 10:49:53', 1, 3, '::1'),
(1080, 'Offers [Package-7]Data has added successfully.', '2024-08-26 10:50:09', 1, 3, '::1'),
(1081, 'Offers [Package-8]Data has added successfully.', '2024-08-26 10:50:21', 1, 3, '::1'),
(1082, 'Offers [Package-9]Data has added successfully.', '2024-08-26 10:50:33', 1, 3, '::1'),
(1083, 'Offers [Package-1] Edit Successfully', '2024-08-26 10:56:37', 1, 4, '::1'),
(1084, 'Offers [Package-2] Edit Successfully', '2024-08-26 10:56:41', 1, 4, '::1'),
(1085, 'Offers [Package-3] Edit Successfully', '2024-08-26 10:56:45', 1, 4, '::1'),
(1086, 'Offers [Package-4] Edit Successfully', '2024-08-26 10:56:49', 1, 4, '::1'),
(1087, 'Offers [Package-5] Edit Successfully', '2024-08-26 10:56:56', 1, 4, '::1'),
(1088, 'Offers [Package-6] Edit Successfully', '2024-08-26 10:57:02', 1, 4, '::1'),
(1089, 'Slideshow  [qweqwe]Data has deleted successfully.', '2024-08-26 11:12:28', 1, 6, '::1'),
(1090, 'Slideshow  [asd]Data has deleted successfully.', '2024-08-26 11:12:28', 1, 6, '::1'),
(1091, 'Slideshow  [asdasdasdasdasdsASDasd]Data has deleted successfully.', '2024-08-26 11:12:28', 1, 6, '::1'),
(1092, 'Slideshow  [asdasd]Data has deleted successfully.', '2024-08-26 11:12:28', 1, 6, '::1'),
(1093, 'Slideshow  [qweqweqw]Data has deleted successfully.', '2024-08-26 11:13:44', 1, 6, '::1'),
(1094, 'Slideshow  [asddd]Data has deleted successfully.', '2024-08-26 11:13:44', 1, 6, '::1'),
(1095, 'Slideshow  [asdasdasd]Data has deleted successfully.', '2024-08-26 11:13:44', 1, 6, '::1'),
(1096, 'Slideshow [Experience matter]Data has added successfully.', '2024-08-26 11:14:51', 1, 3, '::1'),
(1097, 'Changes on Article \'Welcome to the 5-star luxury Hotel Annapurna View\' has been saved successfully.', '2024-08-26 11:19:13', 1, 4, '::1'),
(1098, 'SocialNetworking [facebook]Data has added successfully.', '2024-08-26 12:40:57', 1, 3, '::1'),
(1099, 'SocialNetworking [instagram]Data has added successfully.', '2024-08-26 12:42:17', 1, 3, '::1'),
(1100, 'SocialNetworking [linkdin]Data has added successfully.', '2024-08-26 12:42:50', 1, 3, '::1'),
(1101, 'SocialNetworking [youtube]Data has added successfully.', '2024-08-26 12:43:08', 1, 3, '::1'),
(1102, 'Blog [Australian Base Camp] Edit Successfully', '2024-08-26 12:53:21', 1, 4, '::1'),
(1103, 'Login: superadmin logged in.', '2024-08-26 16:03:07', 1, 1, '::1'),
(1104, 'Testimonial [Greg. S ] Edit Successfully', '2024-08-26 16:03:53', 1, 4, '::1'),
(1105, 'Testimonial [Greg. S ] Edit Successfully', '2024-08-26 16:04:03', 1, 4, '::1'),
(1106, 'SocialNetworking [Expedia]Data has added successfully.', '2024-08-26 16:41:37', 1, 3, '::1'),
(1107, 'SocialNetworking [Tripadvisor]Data has added successfully.', '2024-08-26 16:42:12', 1, 3, '::1'),
(1108, 'Sub Package \'Yoga and Fitness\' has added successfully.', '2024-08-26 16:56:00', 1, 3, '::1'),
(1109, 'Changes on Sub Package \'Yoga and Fitness\' has been saved successfully.', '2024-08-26 16:59:09', 1, 4, '::1'),
(1110, 'Login: superadmin logged in.', '2024-08-27 09:28:06', 1, 1, '::1'),
(1111, 'Offers [monsoon offer]Data has added successfully.', '2024-08-27 09:28:58', 1, 3, '::1'),
(1112, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-08-27 09:39:17', 1, 4, '::1'),
(1113, 'Changes on Sub Package \'Deluxe Suite\' has been saved successfully.', '2024-08-27 09:40:51', 1, 4, '::1'),
(1114, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-08-27 09:41:30', 1, 4, '::1'),
(1115, 'Sub Package [Standard Room]Data has deleted successfully.', '2024-08-27 09:41:48', 1, 6, '::1'),
(1116, 'Changes on Sub Package \'Deluxe Suite\' has been saved successfully.', '2024-08-27 09:41:59', 1, 4, '::1'),
(1117, 'Changes on Sub Package \'The meeting rooms\' has been saved successfully.', '2024-08-27 10:10:42', 1, 4, '::1'),
(1118, 'Menu  [The Hotel]Data has deleted successfully.', '2024-08-27 10:17:21', 1, 6, '::1'),
(1119, 'Menu  [Meeting & Events]Data has deleted successfully.', '2024-08-27 10:17:23', 1, 6, '::1'),
(1120, 'Menu  [Gallery]Data has deleted successfully.', '2024-08-27 10:17:25', 1, 6, '::1'),
(1121, 'Menu  [career]Data has deleted successfully.', '2024-08-27 10:17:32', 1, 6, '::1'),
(1122, 'Menu [About Hotel] Edit Successfully', '2024-08-27 10:18:05', 1, 4, '::1'),
(1123, 'Menu [Restaurant & Bar] Edit Successfully', '2024-08-27 10:18:31', 1, 4, '::1'),
(1124, 'Menu [Offers & Packages] Edit Successfully', '2024-08-27 10:18:46', 1, 4, '::1'),
(1125, 'Menu [Offers & Packages] Edit Successfully', '2024-08-27 10:18:54', 1, 4, '::1'),
(1126, 'Menu [Meeting & Conference] Edit Successfully', '2024-08-27 10:20:19', 1, 4, '::1'),
(1127, 'Menu [Know Pokhara] Edit Successfully', '2024-08-27 10:20:43', 1, 4, '::1'),
(1128, 'Menu [Know Pokhara] Edit Successfully', '2024-08-27 10:20:50', 1, 4, '::1'),
(1129, 'Menu [Activities Around] Edit Successfully', '2024-08-27 10:21:13', 1, 4, '::1'),
(1130, 'Menu [Nearby Hotel] CreatedData has added successfully.', '2024-08-27 10:21:27', 1, 3, '::1'),
(1131, 'Menu [Instagram Wall] CreatedData has added successfully.', '2024-08-27 10:21:42', 1, 3, '::1'),
(1132, 'Menu [Blog] CreatedData has added successfully.', '2024-08-27 10:21:57', 1, 3, '::1'),
(1133, 'Menu [Gallery] CreatedData has added successfully.', '2024-08-27 10:22:17', 1, 3, '::1'),
(1134, 'Menu [Contact us] CreatedData has added successfully.', '2024-08-27 10:22:33', 1, 3, '::1'),
(1135, 'Menu [Rules & Policies] CreatedData has added successfully.', '2024-08-27 10:22:54', 1, 3, '::1'),
(1136, 'Menu [Activities Around] Edit Successfully', '2024-08-27 10:23:12', 1, 4, '::1'),
(1137, 'Menu [About Hotel] CreatedData has added successfully.', '2024-08-27 10:23:37', 1, 3, '::1'),
(1138, 'Menu [Accomodation] CreatedData has added successfully.', '2024-08-27 10:23:48', 1, 3, '::1'),
(1139, 'Menu [Meeting and Conference] CreatedData has added successfully.', '2024-08-27 10:24:03', 1, 3, '::1'),
(1140, 'Menu [Restaurant and Bar] CreatedData has added successfully.', '2024-08-27 10:24:17', 1, 3, '::1'),
(1141, 'Menu [Other Facilities] CreatedData has added successfully.', '2024-08-27 10:24:24', 1, 3, '::1'),
(1142, 'Menu [Know Pokhara] CreatedData has added successfully.', '2024-08-27 10:24:34', 1, 3, '::1'),
(1143, 'Menu [Nearby Hotel] CreatedData has added successfully.', '2024-08-27 10:24:43', 1, 3, '::1'),
(1144, 'Menu [Activities Around] CreatedData has added successfully.', '2024-08-27 10:24:51', 1, 3, '::1'),
(1145, 'Menu [Offers and Packages] CreatedData has added successfully.', '2024-08-27 10:25:01', 1, 3, '::1'),
(1146, 'Menu [Instagram Wall] CreatedData has added successfully.', '2024-08-27 10:25:11', 1, 3, '::1'),
(1147, 'Menu [Blog] CreatedData has added successfully.', '2024-08-27 10:25:22', 1, 3, '::1'),
(1148, 'Menu [Gallery] CreatedData has added successfully.', '2024-08-27 10:25:28', 1, 3, '::1'),
(1149, 'Menu [Rules & Policies] CreatedData has added successfully.', '2024-08-27 10:25:38', 1, 3, '::1'),
(1150, 'Changes on Article \'Welcome to the 5-star luxury Hotel Annapurna View\' has been saved successfully.', '2024-08-27 10:33:21', 1, 4, '::1'),
(1151, 'Offers [Low Season Offer] Edit Successfully', '2024-08-27 10:35:35', 1, 4, '::1'),
(1152, 'Blog [Pokhara city day tour] Edit Successfully', '2024-08-27 10:41:18', 1, 4, '::1'),
(1153, 'Blog [Bandipur                                                      ] Edit Successfully', '2024-08-27 10:42:39', 1, 4, '::1'),
(1154, 'Blog [Dahi Chiura] Edit Successfully', '2024-08-27 10:43:30', 1, 4, '::1'),
(1155, 'Blog [Kwati on janaipurnima                                 ] Edit Successfully', '2024-08-27 10:44:28', 1, 4, '::1'),
(1156, 'Blog [Significance of Dashain and Tihar                                 ] Edit Successfully', '2024-08-27 10:45:28', 1, 4, '::1'),
(1157, 'Blog [Kwati on janaipurnima                                 ] Edit Successfully', '2024-08-27 10:46:08', 1, 4, '::1'),
(1158, 'Package Dining and delight Edit Successfully', '2024-08-27 10:49:09', 1, 4, '::1'),
(1159, 'Changes on Sub Package \'Yoga and Fitness\' has been saved successfully.', '2024-08-27 14:31:10', 1, 4, '::1'),
(1160, 'Changes on Sub Package \'The meeting rooms\' has been saved successfully.', '2024-08-27 14:31:31', 1, 4, '::1'),
(1161, 'Login: superadmin logged in.', '2024-08-27 16:17:47', 1, 1, '::1'),
(1162, 'Testimonial [PAVEL A P]Data has added successfully.', '2024-08-27 16:19:19', 1, 3, '::1'),
(1163, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-27 16:44:42', 1, 4, '::1'),
(1164, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-27 16:45:11', 1, 4, '::1'),
(1165, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-27 17:05:56', 1, 4, '::1'),
(1166, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-27 17:08:52', 1, 4, '::1'),
(1167, 'Blog [Bandipur                                                      ] Edit Successfully', '2024-08-27 17:25:02', 1, 4, '::1'),
(1168, 'Blog [Australian Base Camp] Edit Successfully', '2024-08-27 17:25:31', 1, 4, '::1'),
(1169, 'Slideshow [qweqweqwe]Data has added successfully.', '2024-08-27 17:39:54', 1, 3, '::1'),
(1170, 'Services [Hair Dryer] Edit Successfully', '2024-08-27 18:01:26', 1, 4, '::1'),
(1171, 'Login: superadmin logged in.', '2024-08-28 08:21:48', 1, 1, '::1'),
(1172, 'Testimonial [PAVEL accomodation]Data has added successfully.', '2024-08-28 08:22:39', 1, 3, '::1'),
(1173, 'Login: superadmin logged in.', '2024-08-28 10:34:46', 1, 1, '::1'),
(1174, 'Testimonial [PAVEL deluxe]Data has added successfully.', '2024-08-28 10:35:34', 1, 3, '::1'),
(1175, 'Testimonial [PAVEL A Dining]Data has added successfully.', '2024-08-28 11:08:52', 1, 3, '::1'),
(1176, 'Login: superadmin logged in.', '2024-08-28 12:39:37', 1, 1, '::1'),
(1177, 'Changes on Sub Package \'Conference Hall\' has been saved successfully.', '2024-08-28 12:50:09', 1, 4, '::1'),
(1178, 'Menu [Meeting & Conference] Edit Successfully', '2024-08-28 12:50:19', 1, 4, '::1'),
(1179, 'Changes on Sub Package \'Conference Hall\' has been saved successfully.', '2024-08-28 12:55:41', 1, 4, '::1'),
(1180, 'Changes on Sub Package \'Conference Hall\' has been saved successfully.', '2024-08-28 12:59:05', 1, 4, '::1'),
(1181, 'Testimonial [PAVEL A hall]Data has added successfully.', '2024-08-28 13:12:49', 1, 3, '::1'),
(1182, 'Testimonial [PAVEL A hall] Edit Successfully', '2024-08-28 13:13:04', 1, 4, '::1'),
(1183, 'Package Meeting & Conference Edit Successfully', '2024-08-28 13:36:48', 1, 4, '::1'),
(1184, 'Login: superadmin logged in.', '2024-08-28 15:46:32', 1, 1, '::1'),
(1185, 'SocialNetworking [facebook] Edit Successfully', '2024-08-28 16:06:42', 1, 4, '::1'),
(1186, 'SocialNetworking [facebook] Edit Successfully', '2024-08-28 16:06:51', 1, 4, '::1'),
(1187, 'SocialNetworking [facebook] Edit Successfully', '2024-08-28 16:09:39', 1, 4, '::1'),
(1188, 'SocialNetworking [instagram] Edit Successfully', '2024-08-28 16:19:48', 1, 4, '::1'),
(1189, 'SocialNetworking [linkdin] Edit Successfully', '2024-08-28 16:20:04', 1, 4, '::1'),
(1190, 'SocialNetworking [youtube] Edit Successfully', '2024-08-28 16:20:34', 1, 4, '::1'),
(1191, 'Login: superadmin logged in.', '2024-08-29 08:54:06', 1, 1, '::1'),
(1192, 'Sub Package Image [dine 1]Data has added successfully.', '2024-08-29 11:42:21', 1, 3, '::1'),
(1193, 'Sub Package Image [dine 2]Data has added successfully.', '2024-08-29 11:42:21', 1, 3, '::1'),
(1194, 'Sub Package Image [dine 3]Data has added successfully.', '2024-08-29 11:42:21', 1, 3, '::1'),
(1195, 'Testimonial [PAVEL A hall] Edit Successfully', '2024-08-29 13:46:38', 1, 4, '::1'),
(1196, 'Testimonial [PAVEL A hall] Edit Successfully', '2024-08-29 13:47:16', 1, 4, '::1'),
(1197, 'Testimonial [PAVEL A Dining] Edit Successfully', '2024-08-29 13:47:55', 1, 4, '::1'),
(1198, 'Testimonial [PAVEL deluxe] Edit Successfully', '2024-08-29 13:48:01', 1, 4, '::1'),
(1199, 'Testimonial [PAVEL A P] Edit Successfully', '2024-08-29 13:48:07', 1, 4, '::1'),
(1200, 'Testimonial [PAVEL A] Edit Successfully', '2024-08-29 13:48:14', 1, 4, '::1'),
(1201, 'Testimonial [Greg. S ] Edit Successfully', '2024-08-29 13:48:21', 1, 4, '::1'),
(1202, 'Testimonial [WIRAEN] Edit Successfully', '2024-08-29 13:48:27', 1, 4, '::1'),
(1203, 'Login: superadmin logged in.', '2024-08-29 17:17:16', 1, 1, '::1'),
(1204, 'Sub Package Image [jkbnasdcasd]Data has added successfully.', '2024-08-29 17:18:52', 1, 3, '::1'),
(1205, 'SubPackage Gallery Image [jkbnasdcasd]Data has deleted successfully.', '2024-08-29 17:19:22', 1, 6, '::1'),
(1206, 'Login: superadmin logged in.', '2024-08-30 07:48:32', 1, 1, '::1'),
(1207, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-30 07:48:53', 1, 4, '::1'),
(1208, 'Login: superadmin logged in.', '2024-08-30 09:28:54', 1, 1, '::1'),
(1209, 'Main service  [yuvvyuvyui]Data has deleted successfully.', '2024-08-30 09:29:01', 1, 6, '::1'),
(1210, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 09:30:05', 1, 4, '::1'),
(1211, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 09:30:16', 1, 4, '::1'),
(1212, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 09:31:20', 1, 4, '::1'),
(1213, 'Main service  [Children Play Area Indoor & Outdoor]Data has deleted successfully.', '2024-08-30 09:31:39', 1, 6, '::1'),
(1214, 'Changes on Main service \'Yoga and Fitness\' has been saved successfully.', '2024-08-30 09:32:06', 1, 4, '::1'),
(1215, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 09:43:46', 1, 4, '::1'),
(1216, 'Changes on Main service \'Yoga and Fitness\' has been saved successfully.', '2024-08-30 09:43:55', 1, 4, '::1'),
(1217, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-30 09:49:20', 1, 4, '::1'),
(1218, 'SocialNetworking [Expedia] Edit Successfully', '2024-08-30 09:53:31', 1, 4, '::1'),
(1219, 'Changes on Config \'Synhawk 3.0\' has been saved successfully.', '2024-08-30 09:58:11', 1, 4, '::1'),
(1220, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-08-30 09:58:56', 1, 4, '::1'),
(1221, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-08-30 09:59:03', 1, 4, '::1'),
(1222, 'Article \'Know Pokhara\' has added successfully.', '2024-08-30 10:15:53', 1, 3, '::1'),
(1223, 'Menu [Know Pokhara] Edit Successfully', '2024-08-30 10:16:04', 1, 4, '::1'),
(1224, 'Testimonial [PAVEL accomodation] Edit Successfully', '2024-08-30 10:24:44', 1, 4, '::1'),
(1225, 'Testimonial [PAVEL deluxe] Edit Successfully', '2024-08-30 10:31:40', 1, 4, '::1'),
(1226, 'Menu [Activities Around] Edit Successfully', '2024-08-30 10:56:58', 1, 4, '::1'),
(1227, 'Menu [Nearby Hotel] Edit Successfully', '2024-08-30 10:57:43', 1, 4, '::1'),
(1228, 'Changes on Article \'Shiva Mandir\' has been saved successfully.', '2024-08-30 11:03:19', 1, 4, '::1'),
(1229, 'Changes on Article \'View Tower\' has been saved successfully.', '2024-08-30 11:04:22', 1, 4, '::1'),
(1230, 'Changes on Article \'Cable Car\' has been saved successfully.', '2024-08-30 11:04:51', 1, 4, '::1'),
(1231, 'Changes on Article \'Zip Line\' has been saved successfully.', '2024-08-30 11:05:17', 1, 4, '::1'),
(1232, 'Changes on Article \'Jaljala Waterfall\' has been saved successfully.', '2024-08-30 11:05:44', 1, 4, '::1'),
(1233, 'Changes on Article \'View Point\' has been saved successfully.', '2024-08-30 11:06:14', 1, 4, '::1'),
(1234, 'Article \'Yamdi Waterfall\' has added successfully.', '2024-08-30 11:06:39', 1, 3, '::1'),
(1235, 'Article \'Lakeside\' has added successfully.', '2024-08-30 11:07:07', 1, 3, '::1'),
(1236, 'Article \'Pumidkot Religious area\' has added successfully.', '2024-08-30 11:07:29', 1, 3, '::1'),
(1237, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-08-30 11:10:53', 1, 4, '::1'),
(1238, 'Blog [Australian Base Camp] Edit Successfully', '2024-08-30 11:24:47', 1, 4, '::1'),
(1239, 'Services  [Room Slippers]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1240, 'Services  [Mini-bar In Suites]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1241, 'Services  [Meeting Hall]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1242, 'Services  [Pick/Drop]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1243, 'Services  [Iron/Iron Boar]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1244, 'Services  [EV Charging station]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1245, 'Services  [Pool/Hot Tub]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1246, 'Services  [Spa]Data has deleted successfully.', '2024-08-30 11:28:58', 1, 6, '::1'),
(1247, 'Services  [Free Parking]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1248, 'Services  [Safety Deposite Box]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1249, 'Services  [24hrs Front-desk]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1250, 'Services  [Coffee Maker]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1251, 'Services  [Bathtub]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1252, 'Services  [Air-Conditioner]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1253, 'Services  [Free WiFi]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1254, 'Services  [Room Services]Data has deleted successfully.', '2024-08-30 11:29:06', 1, 6, '::1'),
(1255, 'Services  [Breakfast]Data has deleted successfully.', '2024-08-30 11:29:12', 1, 6, '::1'),
(1256, 'Services  [Panoramic Views]Data has deleted successfully.', '2024-08-30 11:29:12', 1, 6, '::1'),
(1257, 'Services [Swimming Pool] Edit Successfully', '2024-08-30 11:30:06', 1, 4, '::1'),
(1258, 'Services [Poolside bar] Edit Successfully', '2024-08-30 11:30:46', 1, 4, '::1'),
(1259, 'Services [Fireplace]Data has added successfully.', '2024-08-30 11:30:59', 1, 3, '::1'),
(1260, 'Services [Extensive gardens with pergolas and hammocks]Data has added successfully.', '2024-08-30 11:31:14', 1, 3, '::1'),
(1261, 'Services [Swimming Pool] Edit Successfully', '2024-08-30 11:35:32', 1, 4, '::1'),
(1262, 'Services [Swimming Pool] Edit Successfully', '2024-08-30 11:35:35', 1, 4, '::1'),
(1263, 'Changes on Main service \'Conference Halla\' has been saved successfully.', '2024-08-30 11:37:22', 1, 4, '::1'),
(1264, 'Changes on Main service \'Conference Halla\' has been saved successfully.', '2024-08-30 11:37:38', 1, 4, '::1'),
(1265, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 11:38:17', 1, 4, '::1'),
(1266, 'Changes on Main service \'Conference Hall\' has been saved successfully.', '2024-08-30 11:38:26', 1, 4, '::1'),
(1267, 'Changes on Main service \'Conference Hall a\' has been saved successfully.', '2024-08-30 11:38:59', 1, 4, '::1'),
(1268, 'Changes on Main service \'Conference Hall a\' has been saved successfully.', '2024-08-30 11:39:09', 1, 4, '::1'),
(1269, 'Changes on Main service \'Conference Hall a\' has been saved successfully.', '2024-08-30 11:39:44', 1, 4, '::1'),
(1270, 'Changes on Main service \'Conference Hall \' has been saved successfully.', '2024-08-30 11:39:49', 1, 4, '::1'),
(1271, 'Blog [Bandipur                    a                                  ] Edit Successfully', '2024-08-30 11:41:30', 1, 4, '::1'),
(1272, 'Blog [Bandipur                         ] Edit Successfully', '2024-08-30 11:41:36', 1, 4, '::1'),
(1273, 'Changes on Article \'Shiva Mandira\' has been saved successfully.', '2024-08-30 11:42:59', 1, 4, '::1'),
(1274, 'Changes on Article \'Shiva Mandir\' has been saved successfully.', '2024-08-30 11:43:02', 1, 4, '::1'),
(1275, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-08-30 11:46:00', 1, 4, '::1'),
(1276, 'User [annapurnaview  ] Edit Successfully', '2024-08-30 13:05:57', 1, 4, '::1'),
(1277, 'Login: admin logged in.', '2024-08-30 14:10:50', 1, 1, '103.10.28.207'),
(1278, 'Login: admin logged in.', '2024-08-30 14:10:58', 1, 1, '103.10.28.207'),
(1279, 'Login: admin logged in.', '2024-09-01 12:27:43', 1, 1, '27.34.66.26'),
(1280, 'Login: admin logged in.', '2024-09-01 12:27:58', 1, 1, '27.34.66.26'),
(1281, 'Login: superadmin logged in.', '2024-09-03 11:50:22', 1, 1, '::1'),
(1282, 'Menu  [Know Pokhara]Data has deleted successfully.', '2024-09-03 11:50:31', 1, 6, '::1'),
(1283, 'Menu  [Activities Around]Data has deleted successfully.', '2024-09-03 11:50:33', 1, 6, '::1'),
(1284, 'Menu  [Nearby Hotel]Data has deleted successfully.', '2024-09-03 11:50:35', 1, 6, '::1'),
(1285, 'Menu  [Instagram Wall]Data has deleted successfully.', '2024-09-03 11:50:39', 1, 6, '::1'),
(1286, 'Menu  [Blog]Data has deleted successfully.', '2024-09-03 11:50:41', 1, 6, '::1'),
(1287, 'Menu  [Gallery]Data has deleted successfully.', '2024-09-03 11:50:44', 1, 6, '::1'),
(1288, 'Menu  [Contact us]Data has deleted successfully.', '2024-09-03 11:50:46', 1, 6, '::1'),
(1289, 'Menu  [Rules & Policies]Data has deleted successfully.', '2024-09-03 11:50:49', 1, 6, '::1'),
(1290, 'Menu  [Know Pokhara]Data has deleted successfully.', '2024-09-03 11:50:55', 1, 6, '::1'),
(1291, 'Menu  [Nearby Hotel]Data has deleted successfully.', '2024-09-03 11:50:58', 1, 6, '::1'),
(1292, 'Menu  [Activities Around]Data has deleted successfully.', '2024-09-03 11:51:00', 1, 6, '::1'),
(1293, 'Menu  [Offers and Packages]Data has deleted successfully.', '2024-09-03 11:51:03', 1, 6, '::1'),
(1294, 'Menu  [Instagram Wall]Data has deleted successfully.', '2024-09-03 11:51:06', 1, 6, '::1'),
(1295, 'Menu  [Blog]Data has deleted successfully.', '2024-09-03 11:51:09', 1, 6, '::1'),
(1296, 'Menu  [Gallery]Data has deleted successfully.', '2024-09-03 11:51:11', 1, 6, '::1'),
(1297, 'Menu  [Rules & Policies]Data has deleted successfully.', '2024-09-03 11:51:14', 1, 6, '::1'),
(1298, 'Menu [Home] Edit Successfully', '2024-09-03 11:51:55', 1, 4, '::1'),
(1299, 'Menu [Dining] Edit Successfully', '2024-09-03 11:52:13', 1, 4, '::1'),
(1300, 'Menu  [Offers & Packages]Data has deleted successfully.', '2024-09-03 11:52:21', 1, 6, '::1'),
(1301, 'Menu [Meeting & Events] Edit Successfully', '2024-09-03 11:52:25', 1, 4, '::1'),
(1302, 'Menu [Gallery] Edit Successfully', '2024-09-03 11:52:45', 1, 4, '::1'),
(1303, 'Menu [Facilities] Edit Successfully', '2024-09-03 11:53:06', 1, 4, '::1'),
(1304, 'Menu [Facilities] Edit Successfully', '2024-09-03 11:53:15', 1, 4, '::1'),
(1305, 'Menu [Contact] Edit Successfully', '2024-09-03 11:53:28', 1, 4, '::1'),
(1306, 'Menu [About Hotel] Edit Successfully', '2024-09-03 11:53:48', 1, 4, '::1'),
(1307, 'Menu [Photo Gallery] Edit Successfully', '2024-09-03 11:53:59', 1, 4, '::1'),
(1308, 'Menu [CSR] CreatedData has added successfully.', '2024-09-03 11:54:08', 1, 3, '::1'),
(1309, 'Menu [Career] CreatedData has added successfully.', '2024-09-03 11:54:17', 1, 3, '::1'),
(1310, 'Menu [Deluxe Room] CreatedData has added successfully.', '2024-09-03 11:57:04', 1, 3, '::1'),
(1311, 'Menu [Premier Room] CreatedData has added successfully.', '2024-09-03 11:57:20', 1, 3, '::1'),
(1312, 'Menu [Suite Room] CreatedData has added successfully.', '2024-09-03 11:57:30', 1, 3, '::1'),
(1313, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-03 11:59:40', 1, 4, '::1'),
(1314, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-03 15:45:18', 1, 4, '::1'),
(1315, 'Login: superadmin logged in.', '2024-09-03 15:45:45', 1, 1, '::1'),
(1316, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-03 15:45:59', 1, 4, '::1'),
(1317, 'Menu [Facilities] Edit Successfully', '2024-09-03 15:48:13', 1, 4, '::1'),
(1318, 'Sub Gallery Image  [room 1]Data has deleted successfully.', '2024-09-03 16:10:47', 1, 6, '::1'),
(1319, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-03 16:10:49', 1, 6, '::1'),
(1320, 'Sub Gallery Image  [room 2]Data has deleted successfully.', '2024-09-03 16:10:50', 1, 6, '::1'),
(1321, 'Sub Gallery Image [room 1]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1322, 'Sub Gallery Image [room 2]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1323, 'Sub Gallery Image [room 3]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1324, 'Sub Gallery Image [room 4]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1325, 'Sub Gallery Image [room5 ]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1326, 'Sub Gallery Image [room 6]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1327, 'Sub Gallery Image [room 7]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1328, 'Sub Gallery Image [room 8]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1329, 'Sub Gallery Image [room 9]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1330, 'Sub Gallery Image [room 10]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1331, 'Sub Gallery Image [room 11]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1332, 'Sub Gallery Image [room 12]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1333, 'Sub Gallery Image [room 13]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1334, 'Sub Gallery Image [room 14]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1335, 'Sub Gallery Image [room 15 ]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1336, 'Sub Gallery Image [room 16]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1337, 'Sub Gallery Image [room 17]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1338, 'Sub Gallery Image [room 18]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1339, 'Sub Gallery Image [room 19]Data has added successfully.', '2024-09-03 16:14:18', 1, 3, '::1'),
(1340, 'Gallery Image [Dining & Bar ] Edit Successfully', '2024-09-03 16:14:45', 1, 4, '::1'),
(1341, 'Sub Gallery Image  [dining 1]Data has deleted successfully.', '2024-09-03 16:14:49', 1, 6, '::1'),
(1342, 'Sub Gallery Image [dine 1]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1343, 'Sub Gallery Image [dine 2]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1344, 'Sub Gallery Image [dine 3]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1345, 'Sub Gallery Image [dine 4]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1346, 'Sub Gallery Image [dine 5]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1347, 'Sub Gallery Image [dine 6]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1348, 'Sub Gallery Image [dine 7]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1349, 'Sub Gallery Image [dine 8]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1350, 'Sub Gallery Image [dine 9]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1351, 'Sub Gallery Image [dine 10]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1352, 'Sub Gallery Image [dine 11]Data has added successfully.', '2024-09-03 16:16:16', 1, 3, '::1'),
(1353, 'Gallery Image [Meeting & Events  ] Edit Successfully', '2024-09-03 16:16:46', 1, 4, '::1'),
(1354, 'Sub Gallery Image [hall 1]Data has added successfully.', '2024-09-03 16:17:40', 1, 3, '::1'),
(1355, 'Sub Gallery Image [hall 2]Data has added successfully.', '2024-09-03 16:17:40', 1, 3, '::1'),
(1356, 'Sub Gallery Image [hall 3]Data has added successfully.', '2024-09-03 16:17:40', 1, 3, '::1'),
(1357, 'Sub Gallery Image [hall 4]Data has added successfully.', '2024-09-03 16:17:40', 1, 3, '::1'),
(1358, 'Gallery [Recreation]Data has added successfully.', '2024-09-03 16:18:03', 1, 3, '::1'),
(1359, 'Sub Gallery Image [pool 1]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1360, 'Sub Gallery Image [pool 2]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1361, 'Sub Gallery Image [pool 3]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1362, 'Sub Gallery Image [pool 4]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1363, 'Sub Gallery Image [pool 5]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1364, 'Sub Gallery Image [pool 6]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1365, 'Sub Gallery Image [pool 7]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1366, 'Sub Gallery Image [pool 8]Data has added successfully.', '2024-09-03 16:19:40', 1, 3, '::1'),
(1367, 'Gallery [Activities]Data has added successfully.', '2024-09-03 16:20:45', 1, 3, '::1'),
(1368, 'Sub Gallery Image [Activities 1]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1369, 'Sub Gallery Image [Activities 2]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1370, 'Sub Gallery Image [Activities 3]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1371, 'Sub Gallery Image [Activities 4]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1372, 'Sub Gallery Image [Activities 5]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1373, 'Sub Gallery Image [Activities 6]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1374, 'Sub Gallery Image [Activities 7]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1375, 'Sub Gallery Image [Activities 8]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1376, 'Sub Gallery Image [Activities 9]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1377, 'Sub Gallery Image [Activities 10]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1378, 'Sub Gallery Image [Activities 12]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1379, 'Sub Gallery Image [Activities 13]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1380, 'Sub Gallery Image [Activities 14]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1381, 'Sub Gallery Image [Activities 15]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1382, 'Sub Gallery Image [Activities 16]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1383, 'Sub Gallery Image [Activities 17]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1384, 'Sub Gallery Image [Activities18]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1385, 'Sub Gallery Image [Activities 19]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1386, 'Sub Gallery Image [Activities 20]Data has added successfully.', '2024-09-03 16:23:34', 1, 3, '::1'),
(1387, 'Gallery [Hotel]Data has added successfully.', '2024-09-03 16:24:08', 1, 3, '::1'),
(1388, 'Sub Gallery Image [hotel ]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1389, 'Sub Gallery Image [hotel 1]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1390, 'Sub Gallery Image [v 2]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1391, 'Sub Gallery Image [hotel  3]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1392, 'Sub Gallery Image [hotel  4]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1393, 'Sub Gallery Image [hotel 5]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1394, 'Sub Gallery Image [hotel 6]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1395, 'Sub Gallery Image [hotel 7]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1396, 'Sub Gallery Image [hotel 8]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1397, 'Sub Gallery Image [hotel 9]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1398, 'Sub Gallery Image [hotel 10]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1399, 'Sub Gallery Image [hotel 11]Data has added successfully.', '2024-09-03 16:25:36', 1, 3, '::1'),
(1400, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-03 17:19:54', 1, 4, '::1'),
(1401, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-03 17:25:15', 1, 4, '::1'),
(1402, 'Login: superadmin logged in.', '2024-09-04 10:22:44', 1, 1, '::1'),
(1403, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-04 10:49:35', 1, 4, '::1'),
(1404, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-04 10:49:59', 1, 4, '::1'),
(1405, 'Offers [Jungle Safari]Data has added successfully.', '2024-09-04 11:29:19', 1, 3, '::1'),
(1406, 'Offers  [monsoon offer]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1407, 'Offers  [Low Season Offer]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1408, 'Offers  [Package-2]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1409, 'Offers  [Package-3]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1410, 'Offers  [Package-4]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1411, 'Offers  [Package-5]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1412, 'Offers  [Package-6]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1413, 'Offers  [Package-7]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1414, 'Offers  [Package-8]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1415, 'Offers  [Package-9]Data has deleted successfully.', '2024-09-04 11:29:54', 1, 6, '::1'),
(1416, 'Offers [Cultural Dance]Data has added successfully.', '2024-09-04 11:30:24', 1, 3, '::1'),
(1417, 'Offers [Canoeing]Data has added successfully.', '2024-09-04 11:30:40', 1, 3, '::1'),
(1418, 'Login: superadmin logged in.', '2024-09-05 12:03:39', 1, 1, '::1'),
(1419, 'Package Meeting & Events Edit Successfully', '2024-09-05 12:05:52', 1, 4, '::1'),
(1420, 'Package Meeting & Events Edit Successfully', '2024-09-05 12:06:06', 1, 4, '::1'),
(1421, 'Package Meeting & Events Edit Successfully', '2024-09-05 12:06:28', 1, 4, '::1'),
(1422, 'Changes on Sub Package \'Elephant Hall\' has been saved successfully.', '2024-09-05 12:11:33', 1, 4, '::1'),
(1423, 'Changes on Sub Package \'Yoga and Fitness\' has been saved successfully.', '2024-09-05 12:12:24', 1, 4, '::1'),
(1424, 'Changes on Sub Package \'Lounge and bar\' has been saved successfully.', '2024-09-05 13:23:40', 1, 4, '::1'),
(1425, 'Package Dining Edit Successfully', '2024-09-05 13:25:50', 1, 4, '::1'),
(1426, 'Sub Package [Shristi Restaurant]Data has deleted successfully.', '2024-09-05 13:25:56', 1, 6, '::1'),
(1427, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-05 13:26:12', 1, 4, '::1'),
(1428, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-05 13:26:59', 1, 4, '::1'),
(1429, 'SubPackage Gallery Image [dine]Data has deleted successfully.', '2024-09-05 13:27:32', 1, 6, '::1'),
(1430, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-05 13:27:36', 1, 6, '::1'),
(1431, 'SubPackage Gallery Image [dine 2]Data has deleted successfully.', '2024-09-05 13:27:36', 1, 6, '::1'),
(1432, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-05 13:27:38', 1, 6, '::1'),
(1433, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-05 13:27:38', 1, 6, '::1'),
(1434, 'SubPackage Gallery Image [dine 3]Data has deleted successfully.', '2024-09-05 13:27:38', 1, 6, '::1'),
(1435, 'Sub Package Image [dining 1]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1436, 'Sub Package Image [dining 2]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1437, 'Sub Package Image [dining 3]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1438, 'Sub Package Image [dining 4]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1439, 'Sub Package Image [dining 5]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1440, 'Sub Package Image [dining 6]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1441, 'Sub Package Image [dining 7]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1442, 'Sub Package Image [dining 8]Data has added successfully.', '2024-09-05 13:29:30', 1, 3, '::1'),
(1443, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-05 14:07:36', 1, 4, '::1'),
(1444, 'Login: superadmin logged in.', '2024-09-06 08:11:35', 1, 1, '::1'),
(1445, 'Gallery [HOTEL]Data has added successfully.', '2024-09-06 08:19:38', 1, 3, '::1'),
(1446, 'Gallery [Room/Suite ]Data has added successfully.', '2024-09-06 08:19:57', 1, 3, '::1'),
(1447, 'Gallery [Dining]Data has added successfully.', '2024-09-06 08:20:17', 1, 3, '::1'),
(1448, 'Gallery [Meeting hall]Data has added successfully.', '2024-09-06 08:20:48', 1, 3, '::1'),
(1449, 'Sub Gallery Image [hotel]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1450, 'Sub Gallery Image [hotel 1]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1451, 'Sub Gallery Image [hotel 2]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1452, 'Sub Gallery Image [hotel 3]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1453, 'Sub Gallery Image [hotel 4]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1454, 'Sub Gallery Image [hotel 5]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1455, 'Sub Gallery Image [hotel 6]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1456, 'Sub Gallery Image [hotel 7]Data has added successfully.', '2024-09-06 08:22:26', 1, 3, '::1'),
(1457, 'Sub Gallery Image  [hotel]Data has deleted successfully.', '2024-09-06 08:22:48', 1, 6, '::1'),
(1458, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:51', 1, 6, '::1'),
(1459, 'Sub Gallery Image  [hotel 1]Data has deleted successfully.', '2024-09-06 08:22:51', 1, 6, '::1'),
(1460, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:54', 1, 6, '::1'),
(1461, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:54', 1, 6, '::1'),
(1462, 'Sub Gallery Image  [hotel 2]Data has deleted successfully.', '2024-09-06 08:22:54', 1, 6, '::1'),
(1463, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:58', 1, 6, '::1'),
(1464, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:58', 1, 6, '::1'),
(1465, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:22:58', 1, 6, '::1'),
(1466, 'Sub Gallery Image  [hotel 3]Data has deleted successfully.', '2024-09-06 08:22:58', 1, 6, '::1'),
(1467, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:01', 1, 6, '::1'),
(1468, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:01', 1, 6, '::1'),
(1469, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:01', 1, 6, '::1'),
(1470, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:01', 1, 6, '::1'),
(1471, 'Sub Gallery Image  [hotel 4]Data has deleted successfully.', '2024-09-06 08:23:01', 1, 6, '::1'),
(1472, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1473, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1474, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1475, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1476, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1477, 'Sub Gallery Image  [hotel 5]Data has deleted successfully.', '2024-09-06 08:23:03', 1, 6, '::1'),
(1478, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1479, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1480, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1481, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1482, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1483, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1484, 'Sub Gallery Image  [hotel 6]Data has deleted successfully.', '2024-09-06 08:23:06', 1, 6, '::1'),
(1485, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1486, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1487, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1488, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1489, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1490, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1491, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1492, 'Sub Gallery Image  [hotel 7]Data has deleted successfully.', '2024-09-06 08:23:09', 1, 6, '::1'),
(1493, 'Sub Gallery Image [HOTEL]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1494, 'Sub Gallery Image [HOTEL11]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1495, 'Sub Gallery Image [HOTEL2]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1496, 'Sub Gallery Image [HOTEL3]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1497, 'Sub Gallery Image [HOTEL4]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1498, 'Sub Gallery Image [HOTEL5]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1499, 'Sub Gallery Image [HOTEL6]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1500, 'Sub Gallery Image [HOTEL7]Data has added successfully.', '2024-09-06 08:26:22', 1, 3, '::1'),
(1501, 'Sub Gallery Image [ROOM 1]Data has added successfully.', '2024-09-06 08:27:57', 1, 3, '::1'),
(1502, 'Sub Gallery Image [ROOM 2]Data has added successfully.', '2024-09-06 08:27:57', 1, 3, '::1'),
(1503, 'Sub Gallery Image [ROOM 3]Data has added successfully.', '2024-09-06 08:27:57', 1, 3, '::1'),
(1504, 'Sub Gallery Image [ROOM 4]Data has added successfully.', '2024-09-06 08:27:57', 1, 3, '::1'),
(1505, 'Testimonial  []Data has deleted successfully.', '2024-09-06 08:41:18', 1, 6, '::1'),
(1506, 'Testimonial  []Data has deleted successfully.', '2024-09-06 08:41:18', 1, 6, '::1'),
(1507, 'Testimonial  []Data has deleted successfully.', '2024-09-06 08:41:18', 1, 6, '::1'),
(1508, 'Testimonial  []Data has deleted successfully.', '2024-09-06 08:41:18', 1, 6, '::1'),
(1509, 'Testimonial [SANJAY D] Edit Successfully', '2024-09-06 08:43:34', 1, 4, '::1'),
(1510, 'Testimonial [JIBAK] Edit Successfully', '2024-09-06 08:44:21', 1, 4, '::1'),
(1511, 'Testimonial [JOSIE S] Edit Successfully', '2024-09-06 08:44:59', 1, 4, '::1'),
(1512, 'Testimonial  []Data has deleted successfully.', '2024-09-06 08:45:03', 1, 6, '::1'),
(1513, 'SocialNetworking [booking]Data has added successfully.', '2024-09-06 08:49:35', 1, 3, '::1'),
(1514, 'SocialNetworking [agoda]Data has added successfully.', '2024-09-06 08:50:27', 1, 3, '::1'),
(1515, 'SocialNetworking [mmt]Data has added successfully.', '2024-09-06 08:50:51', 1, 3, '::1'),
(1516, 'SocialNetworking [ctrip]Data has added successfully.', '2024-09-06 08:51:13', 1, 3, '::1'),
(1517, 'SocialNetworking [trivago]Data has added successfully.', '2024-09-06 08:51:33', 1, 3, '::1'),
(1518, 'Login: superadmin logged in.', '2024-09-06 15:27:33', 1, 1, '::1');
INSERT INTO `tbl_logs` (`id`, `action`, `registered`, `userid`, `user_action`, `ip_track`) VALUES
(1519, 'Package Meeting & Events Edit Successfully', '2024-09-06 15:31:35', 1, 4, '::1'),
(1520, 'Package Dining Edit Successfully', '2024-09-06 16:21:44', 1, 4, '::1'),
(1521, 'Package Dining Edit Successfully', '2024-09-06 16:22:30', 1, 4, '::1'),
(1522, 'Package Dining Edit Successfully', '2024-09-06 16:22:53', 1, 4, '::1'),
(1523, 'Package Dining Edit Successfully', '2024-09-06 16:22:58', 1, 4, '::1'),
(1524, 'Package Dining Edit Successfully', '2024-09-06 16:23:28', 1, 4, '::1'),
(1525, 'Package Meeting & Events Edit Successfully', '2024-09-06 16:23:39', 1, 4, '::1'),
(1526, 'Login: superadmin logged in.', '2024-09-09 08:16:15', 1, 1, '::1'),
(1527, 'Changes on Article \'Chitwan National Park\' has been saved successfully.', '2024-09-09 08:17:19', 1, 4, '::1'),
(1528, 'Changes on Article \'Chitwan National Park\' has been saved successfully.', '2024-09-09 08:19:43', 1, 4, '::1'),
(1529, 'Changes on Article \'Tharu Cultural Museum & Research Center\' has been saved successfully.', '2024-09-09 08:20:29', 1, 4, '::1'),
(1530, 'Changes on Article \'Elephant Breeding Center\' has been saved successfully.', '2024-09-09 08:21:10', 1, 4, '::1'),
(1531, 'Login: superadmin logged in.', '2024-09-09 09:30:38', 1, 1, '::1'),
(1532, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:32:34', 1, 4, '::1'),
(1533, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:33:08', 1, 4, '::1'),
(1534, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:33:49', 1, 4, '::1'),
(1535, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:48:59', 1, 4, '::1'),
(1536, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:49:32', 1, 4, '::1'),
(1537, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:50:48', 1, 4, '::1'),
(1538, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 09:59:33', 1, 4, '::1'),
(1539, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 10:10:32', 1, 4, '::1'),
(1540, 'Package Accommodations Edit Successfully', '2024-09-09 10:11:55', 1, 4, '::1'),
(1541, 'Package Accommodation Edit Successfully', '2024-09-09 10:12:17', 1, 4, '::1'),
(1542, 'Package Accommodation Edit Successfully', '2024-09-09 10:12:40', 1, 4, '::1'),
(1543, 'Menu [Accommodation] Edit Successfully', '2024-09-09 10:12:46', 1, 4, '::1'),
(1544, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 10:27:20', 1, 4, '::1'),
(1545, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 10:27:36', 1, 4, '::1'),
(1546, 'Changes on Config \'Annapurna View\' has been saved successfully.', '2024-09-09 10:27:47', 1, 4, '::1'),
(1547, 'Menu [Dining] Edit Successfully', '2024-09-09 10:32:51', 1, 4, '::1'),
(1548, 'Menu [Meeting & Events] Edit Successfully', '2024-09-09 10:32:58', 1, 4, '::1'),
(1549, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 10:33:47', 1, 4, '::1'),
(1550, 'SubPackage Gallery Image [dep]Data has deleted successfully.', '2024-09-09 10:34:38', 1, 6, '::1'),
(1551, 'SubPackage Gallery Image [dep]Data has deleted successfully.', '2024-09-09 10:34:40', 1, 6, '::1'),
(1552, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:34:40', 1, 6, '::1'),
(1553, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:34:43', 1, 6, '::1'),
(1554, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:34:43', 1, 6, '::1'),
(1555, 'SubPackage Gallery Image [dep]Data has deleted successfully.', '2024-09-09 10:34:43', 1, 6, '::1'),
(1556, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 10:37:42', 1, 4, '::1'),
(1557, 'SubPackage Gallery Image [j]Data has deleted successfully.', '2024-09-09 10:39:06', 1, 6, '::1'),
(1558, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:39:09', 1, 6, '::1'),
(1559, 'SubPackage Gallery Image [j]Data has deleted successfully.', '2024-09-09 10:39:09', 1, 6, '::1'),
(1560, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:39:12', 1, 6, '::1'),
(1561, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 10:39:12', 1, 6, '::1'),
(1562, 'SubPackage Gallery Image [j]Data has deleted successfully.', '2024-09-09 10:39:12', 1, 6, '::1'),
(1563, 'Sub Package Image [suite1]Data has added successfully.', '2024-09-09 10:41:35', 1, 3, '::1'),
(1564, 'Sub Package Image [suite 2]Data has added successfully.', '2024-09-09 10:41:35', 1, 3, '::1'),
(1565, 'Sub Package Image [suite 3]Data has added successfully.', '2024-09-09 10:41:35', 1, 3, '::1'),
(1566, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 10:43:09', 1, 4, '::1'),
(1567, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 10:44:02', 1, 4, '::1'),
(1568, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 10:45:00', 1, 4, '::1'),
(1569, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 10:45:33', 1, 4, '::1'),
(1570, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 10:46:05', 1, 4, '::1'),
(1571, 'Sub Package Image [premier 1]Data has added successfully.', '2024-09-09 10:47:06', 1, 3, '::1'),
(1572, 'Sub Package Image [premier 2]Data has added successfully.', '2024-09-09 10:47:06', 1, 3, '::1'),
(1573, 'Sub Package Image [premier 3]Data has added successfully.', '2024-09-09 10:47:06', 1, 3, '::1'),
(1574, 'Sub Package Image [premier 4]Data has added successfully.', '2024-09-09 10:47:06', 1, 3, '::1'),
(1575, 'User [Hotel Seven Star  ] Edit Successfully', '2024-09-09 10:49:54', 1, 4, '::1'),
(1576, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 10:50:07', 1, 4, '::1'),
(1577, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 10:52:36', 1, 4, '::1'),
(1578, 'SocialNetworking [facebook] Edit Successfully', '2024-09-09 10:56:20', 1, 4, '::1'),
(1579, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 10:58:13', 1, 4, '::1'),
(1580, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 10:58:21', 1, 4, '::1'),
(1581, 'Slideshow [Experience matter] Edit Successfully', '2024-09-09 11:00:57', 1, 4, '::1'),
(1582, 'Slideshow [Experience matter] Edit Successfully', '2024-09-09 11:01:02', 1, 4, '::1'),
(1583, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 11:02:26', 1, 4, '::1'),
(1584, 'SubPackage Gallery Image [room1]Data has deleted successfully.', '2024-09-09 11:02:45', 1, 6, '::1'),
(1585, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 11:02:48', 1, 6, '::1'),
(1586, 'SubPackage Gallery Image [room2]Data has deleted successfully.', '2024-09-09 11:02:48', 1, 6, '::1'),
(1587, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 11:05:59', 1, 4, '::1'),
(1588, 'Changes on Sub Package \'Elephant Hall\' has been saved successfully.', '2024-09-09 11:07:48', 1, 4, '::1'),
(1589, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 11:13:30', 1, 4, '::1'),
(1590, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 11:13:37', 1, 4, '::1'),
(1591, 'Sub Package [Yoga and Fitness]Data has deleted successfully.', '2024-09-09 11:54:39', 1, 6, '::1'),
(1592, 'Changes on Sub Package \'Hall\' has been saved successfully.', '2024-09-09 11:54:49', 1, 4, '::1'),
(1593, 'Changes on Sub Package \'Hall\' has been saved successfully.', '2024-09-09 12:05:32', 1, 4, '::1'),
(1594, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-09 14:14:28', 1, 4, '::1'),
(1595, 'Package Meeting & Events Edit Successfully', '2024-09-09 14:16:52', 1, 4, '::1'),
(1596, 'Changes on Sub Package \'Hall\' has been saved successfully.', '2024-09-09 14:17:07', 1, 4, '::1'),
(1597, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 14:20:36', 1, 4, '::1'),
(1598, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 14:21:37', 1, 4, '::1'),
(1599, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:34:51', 1, 4, '::1'),
(1600, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:37:03', 1, 4, '::1'),
(1601, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:37:16', 1, 4, '::1'),
(1602, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:38:15', 1, 4, '::1'),
(1603, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:39:17', 1, 4, '::1'),
(1604, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 14:39:34', 1, 4, '::1'),
(1605, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-09 14:39:43', 1, 4, '::1'),
(1606, 'Services [Swimming Poola] Edit Successfully', '2024-09-09 14:49:03', 1, 4, '::1'),
(1607, 'Services [Swimming Pool] Edit Successfully', '2024-09-09 14:49:05', 1, 4, '::1'),
(1608, 'SocialNetworking [Expedia] Edit Successfully', '2024-09-09 14:49:47', 1, 4, '::1'),
(1609, 'SocialNetworking [Tripadvisor] Edit Successfully', '2024-09-09 14:50:04', 1, 4, '::1'),
(1610, 'Testimonial [SANJAY Da] Edit Successfully', '2024-09-09 14:50:22', 1, 4, '::1'),
(1611, 'Testimonial [SANJAY D] Edit Successfully', '2024-09-09 14:50:25', 1, 4, '::1'),
(1612, 'Article \'career\' has added successfully.', '2024-09-09 14:51:57', 1, 3, '::1'),
(1613, 'Changes on Article \'career\' has been saved successfully.', '2024-09-09 14:52:55', 1, 4, '::1'),
(1614, 'Package Accommodation Edit Successfully', '2024-09-09 14:54:25', 1, 4, '::1'),
(1615, 'Package Accommodation Edit Successfully', '2024-09-09 14:54:42', 1, 4, '::1'),
(1616, 'Login: admin logged in.', '2024-09-09 15:27:18', 1, 1, '27.34.24.45'),
(1617, 'Slideshow [slide 1] Edit Successfully', '2024-09-09 15:28:28', 1, 4, '27.34.24.45'),
(1618, 'Slideshow [slide 2] Edit Successfully', '2024-09-09 15:29:05', 1, 4, '27.34.24.45'),
(1619, 'Slideshow [slide 3]Data has added successfully.', '2024-09-09 15:32:02', 1, 3, '27.34.24.45'),
(1620, 'Slideshow [slide 4]Data has added successfully.', '2024-09-09 15:32:23', 1, 3, '27.34.24.45'),
(1621, 'Slideshow [slide 5]Data has added successfully.', '2024-09-09 15:32:49', 1, 3, '27.34.24.45'),
(1622, 'Slideshow [slide 6]Data has added successfully.', '2024-09-09 15:33:08', 1, 3, '27.34.24.45'),
(1623, 'Slideshow [slide 7]Data has added successfully.', '2024-09-09 15:33:32', 1, 3, '27.34.24.45'),
(1624, 'Slideshow [slide 8]Data has added successfully.', '2024-09-09 15:33:50', 1, 3, '27.34.24.45'),
(1625, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-09 15:34:38', 1, 4, '27.34.24.45'),
(1626, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 15:38:49', 1, 4, '27.34.24.45'),
(1627, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 15:40:05', 1, 4, '27.34.24.45'),
(1628, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 15:40:29', 1, 4, '27.34.24.45'),
(1629, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 15:40:43', 1, 4, '27.34.24.45'),
(1630, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 15:41:50', 1, 4, '27.34.24.45'),
(1631, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 15:46:50', 1, 4, '27.34.24.45'),
(1632, 'Services [24hr Reception] Edit Successfully', '2024-09-09 15:48:55', 1, 4, '27.34.24.45'),
(1633, 'Services [Shuttle Service] Edit Successfully', '2024-09-09 15:49:39', 1, 4, '27.34.24.45'),
(1634, 'Services [travel desk] Edit Successfully', '2024-09-09 15:50:24', 1, 4, '27.34.24.45'),
(1635, 'Services [Swimming Pool] Edit Successfully', '2024-09-09 15:50:54', 1, 4, '27.34.24.45'),
(1636, 'Services [GYM]Data has added successfully.', '2024-09-09 15:51:17', 1, 3, '27.34.24.45'),
(1637, 'Services [Room Service]Data has added successfully.', '2024-09-09 15:52:14', 1, 3, '27.34.24.45'),
(1638, 'Services [Cards Accepted]Data has added successfully.', '2024-09-09 15:52:38', 1, 3, '27.34.24.45'),
(1639, 'Services [Spa (Coming Soon)]Data has added successfully.', '2024-09-09 15:53:01', 1, 3, '27.34.24.45'),
(1640, 'Services [Housekeeping]Data has added successfully.', '2024-09-09 15:54:50', 1, 3, '27.34.24.45'),
(1641, 'Services [Laundry Service]Data has added successfully.', '2024-09-09 15:55:08', 1, 3, '27.34.24.45'),
(1642, 'Services [Spacious Garden]Data has added successfully.', '2024-09-09 15:56:52', 1, 3, '27.34.24.45'),
(1643, 'Services [Concierge service]Data has added successfully.', '2024-09-09 15:57:19', 1, 3, '27.34.24.45'),
(1644, 'Services [Delicious Cuisine]Data has added successfully.', '2024-09-09 15:57:40', 1, 3, '27.34.24.45'),
(1645, 'Services [CCTV Security]Data has added successfully.', '2024-09-09 15:57:51', 1, 3, '27.34.24.45'),
(1646, 'Services [Doctor on Call]Data has added successfully.', '2024-09-09 15:58:03', 1, 3, '27.34.24.45'),
(1647, 'Services [Safe Deposit Locker]Data has added successfully.', '2024-09-09 15:58:16', 1, 3, '27.34.24.45'),
(1648, 'Services [High Speed WIFI]Data has added successfully.', '2024-09-09 15:58:47', 1, 3, '27.34.24.45'),
(1649, 'Services [Electricity Back]Data has added successfully.', '2024-09-09 15:59:18', 1, 3, '27.34.24.45'),
(1650, 'Services [Parking]Data has added successfully.', '2024-09-09 15:59:58', 1, 3, '27.34.24.45'),
(1651, 'Services [Fire Extinguisher]Data has added successfully.', '2024-09-09 16:00:28', 1, 3, '27.34.24.45'),
(1652, 'Services [Jacuzzi (in suite room)]Data has added successfully.', '2024-09-09 16:01:03', 1, 3, '27.34.24.45'),
(1653, 'Services [Program Desk]Data has added successfully.', '2024-09-09 16:01:23', 1, 3, '27.34.24.45'),
(1654, 'Services [Airport Pickup & drop (on charge]Data has added successfully.', '2024-09-09 16:01:54', 1, 3, '27.34.24.45'),
(1655, 'Services [Airport Pickup & drop (on charge)] Edit Successfully', '2024-09-09 16:02:12', 1, 4, '27.34.24.45'),
(1656, 'Login: admin logged in.', '2024-09-09 16:06:57', 1, 1, '103.10.28.143'),
(1657, 'Sub Gallery Image [suite 1]Data has added successfully.', '2024-09-09 16:20:39', 1, 3, '27.34.24.45'),
(1658, 'Sub Gallery Image [suite 2]Data has added successfully.', '2024-09-09 16:20:39', 1, 3, '27.34.24.45'),
(1659, 'Sub Gallery Image [suite 3]Data has added successfully.', '2024-09-09 16:20:39', 1, 3, '27.34.24.45'),
(1660, 'Sub Gallery Image [suite 4]Data has added successfully.', '2024-09-09 16:20:39', 1, 3, '27.34.24.45'),
(1661, 'Sub Gallery Image [dining 1]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1662, 'Sub Gallery Image [dining 2]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1663, 'Sub Gallery Image [dining 3]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1664, 'Sub Gallery Image [dining 5]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1665, 'Sub Gallery Image [dining 6]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1666, 'Sub Gallery Image [dining 7]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1667, 'Sub Gallery Image [dining 8]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1668, 'Sub Gallery Image [dining 9]Data has added successfully.', '2024-09-09 16:21:54', 1, 3, '27.34.24.45'),
(1669, 'Sub Gallery Image [hall 1]Data has added successfully.', '2024-09-09 16:22:25', 1, 3, '27.34.24.45'),
(1670, 'Sub Gallery Image [hall 2]Data has added successfully.', '2024-09-09 16:22:25', 1, 3, '27.34.24.45'),
(1671, 'Sub Gallery Image [hall3 ]Data has added successfully.', '2024-09-09 16:22:25', 1, 3, '27.34.24.45'),
(1672, 'Sub Gallery Image [hall 4]Data has added successfully.', '2024-09-09 16:22:25', 1, 3, '27.34.24.45'),
(1673, 'Changes on Article \'Chitwan Tharu Village\' has been saved successfully.', '2024-09-09 16:23:29', 1, 4, '27.34.24.45'),
(1674, 'Changes on Article \'New Sauraha Tharu Cultural House\' has been saved successfully.', '2024-09-09 16:24:41', 1, 4, '27.34.24.45'),
(1675, 'Articles  [View Point]Data has deleted successfully.', '2024-09-09 16:24:46', 1, 6, '27.34.24.45'),
(1676, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 16:25:15', 1, 4, '27.34.24.45'),
(1677, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 16:25:31', 1, 4, '27.34.24.45'),
(1678, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 16:26:08', 1, 4, '27.34.24.45'),
(1679, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 16:26:37', 1, 4, '27.34.24.45'),
(1680, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 16:31:07', 1, 4, '27.34.24.45'),
(1681, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 16:31:31', 1, 4, '27.34.24.45'),
(1682, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 16:31:59', 1, 4, '27.34.24.45'),
(1683, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 16:32:42', 1, 4, '27.34.24.45'),
(1684, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 16:33:50', 1, 4, '27.34.24.45'),
(1685, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 16:34:09', 1, 4, '27.34.24.45'),
(1686, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 16:35:55', 1, 4, '27.34.24.45'),
(1687, 'SubPackage Gallery Image [room 3]Data has deleted successfully.', '2024-09-09 16:36:56', 1, 6, '27.34.24.45'),
(1688, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:36:59', 1, 6, '27.34.24.45'),
(1689, 'SubPackage Gallery Image [room 4]Data has deleted successfully.', '2024-09-09 16:36:59', 1, 6, '27.34.24.45'),
(1690, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:37:01', 1, 6, '27.34.24.45'),
(1691, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:37:01', 1, 6, '27.34.24.45'),
(1692, 'SubPackage Gallery Image [room5]Data has deleted successfully.', '2024-09-09 16:37:01', 1, 6, '27.34.24.45'),
(1693, 'Sub Package Image [deluxe 1]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1694, 'Sub Package Image [deluxe 2]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1695, 'Sub Package Image [deluxe 3]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1696, 'Sub Package Image [deluxe 4]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1697, 'Sub Package Image [deluxe 5]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1698, 'Sub Package Image [deluxe 6]Data has added successfully.', '2024-09-09 16:38:06', 1, 3, '27.34.24.45'),
(1699, 'Features [Free WIFI] Edit Successfully', '2024-09-09 16:39:16', 1, 4, '27.34.24.45'),
(1700, 'Features [Fruit Basket]Data has added successfully.', '2024-09-09 16:39:56', 1, 3, '27.34.24.45'),
(1701, 'Features  [Fruit Basket]Data has deleted successfully.', '2024-09-09 16:40:18', 1, 6, '27.34.24.45'),
(1702, 'Features  []Data has deleted successfully.', '2024-09-09 16:40:19', 1, 6, '27.34.24.45'),
(1703, 'Features [Fruit Basket]Data has added successfully.', '2024-09-09 16:40:34', 1, 3, '27.34.24.45'),
(1704, 'Features [Mineral Water]Data has added successfully.', '2024-09-09 16:41:08', 1, 3, '27.34.24.45'),
(1705, 'Features [Air Conditioner] Edit Successfully', '2024-09-09 16:41:43', 1, 4, '27.34.24.45'),
(1706, 'Features [Tea Coffee Maker]Data has added successfully.', '2024-09-09 16:42:10', 1, 3, '27.34.24.45'),
(1707, 'Features [Wakeup Call] Edit Successfully', '2024-09-09 16:42:40', 1, 4, '27.34.24.45'),
(1708, 'Features [Room Service] Edit Successfully', '2024-09-09 16:43:54', 1, 4, '27.34.24.45'),
(1709, 'Features [In-room Slipper] Edit Successfully', '2024-09-09 16:45:23', 1, 4, '27.34.24.45'),
(1710, 'Features [Telephone]Data has added successfully.', '2024-09-09 16:45:49', 1, 3, '27.34.24.45'),
(1711, 'Features [TV] Edit Successfully', '2024-09-09 16:46:21', 1, 4, '27.34.24.45'),
(1712, 'Features [Shower]Data has added successfully.', '2024-09-09 16:46:41', 1, 3, '27.34.24.45'),
(1713, 'Features [Toilerities]Data has added successfully.', '2024-09-09 16:47:08', 1, 3, '27.34.24.45'),
(1714, 'Features [Minibar]Data has added successfully.', '2024-09-09 16:47:39', 1, 3, '27.34.24.45'),
(1715, 'Features [safe Deposit Box] Edit Successfully', '2024-09-09 16:48:20', 1, 4, '27.34.24.45'),
(1716, 'Features  [Hairdryer]Data has deleted successfully.', '2024-09-09 16:48:43', 1, 6, '27.34.24.45'),
(1717, 'Features  []Data has deleted successfully.', '2024-09-09 16:48:58', 1, 6, '27.34.24.45'),
(1718, 'Features  [Mountains View]Data has deleted successfully.', '2024-09-09 16:48:58', 1, 6, '27.34.24.45'),
(1719, 'Features  []Data has deleted successfully.', '2024-09-09 16:49:24', 1, 6, '27.34.24.45'),
(1720, 'Features  []Data has deleted successfully.', '2024-09-09 16:49:24', 1, 6, '27.34.24.45'),
(1721, 'Features  [Sitting Area]Data has deleted successfully.', '2024-09-09 16:49:24', 1, 6, '27.34.24.45'),
(1722, 'Features  [Breakfast]Data has deleted successfully.', '2024-09-09 16:49:43', 1, 6, '27.34.24.45'),
(1723, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 16:51:02', 1, 4, '27.34.24.45'),
(1724, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 16:51:56', 1, 4, '27.34.24.45'),
(1725, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 16:52:08', 1, 4, '27.34.24.45'),
(1726, 'Package Meeting & Events Edit Successfully', '2024-09-09 16:52:55', 1, 4, '27.34.24.45'),
(1727, 'SubPackage Gallery Image [meet 5]Data has deleted successfully.', '2024-09-09 16:53:36', 1, 6, '27.34.24.45'),
(1728, 'SubPackage Gallery Image [meet]Data has deleted successfully.', '2024-09-09 16:53:38', 1, 6, '27.34.24.45'),
(1729, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:38', 1, 6, '27.34.24.45'),
(1730, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:41', 1, 6, '27.34.24.45'),
(1731, 'SubPackage Gallery Image [meet 2]Data has deleted successfully.', '2024-09-09 16:53:41', 1, 6, '27.34.24.45'),
(1732, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:41', 1, 6, '27.34.24.45'),
(1733, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:43', 1, 6, '27.34.24.45'),
(1734, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:43', 1, 6, '27.34.24.45'),
(1735, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 16:53:43', 1, 6, '27.34.24.45'),
(1736, 'SubPackage Gallery Image [meet 3]Data has deleted successfully.', '2024-09-09 16:53:43', 1, 6, '27.34.24.45'),
(1737, 'Sub Package Image [hall 1 ]Data has added successfully.', '2024-09-09 16:54:06', 1, 3, '27.34.24.45'),
(1738, 'Sub Package Image [hall 2]Data has added successfully.', '2024-09-09 16:54:06', 1, 3, '27.34.24.45'),
(1739, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-09 16:55:13', 1, 4, '27.34.24.45'),
(1740, 'Sub Gallery Image [washroom]Data has added successfully.', '2024-09-09 16:56:21', 1, 3, '27.34.24.45'),
(1741, 'SocialNetworking [facebook] Edit Successfully', '2024-09-09 16:59:36', 1, 4, '27.34.24.45'),
(1742, 'SocialNetworking [instagram] Edit Successfully', '2024-09-09 17:02:13', 1, 4, '27.34.24.45'),
(1743, 'SocialNetworking [linkdin] Edit Successfully', '2024-09-09 17:02:39', 1, 4, '27.34.24.45'),
(1744, 'SocialNetworking [linkdin] Edit Successfully', '2024-09-09 17:02:46', 1, 4, '27.34.24.45'),
(1745, 'SocialNetworking [Twitter] Edit Successfully', '2024-09-09 17:03:28', 1, 4, '27.34.24.45'),
(1746, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:05:02', 1, 4, '27.34.24.45'),
(1747, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:05:50', 1, 4, '27.34.24.45'),
(1748, 'Login: admin logged in.', '2024-09-09 17:07:17', 1, 1, '27.34.66.78'),
(1749, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:12:44', 1, 4, '27.34.24.45'),
(1750, 'Login: admin logged in.', '2024-09-09 17:14:10', 1, 1, '27.34.66.78'),
(1751, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:14:17', 1, 4, '27.34.24.45'),
(1752, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:15:01', 1, 4, '27.34.24.45'),
(1753, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 17:15:03', 1, 4, '27.34.66.78'),
(1754, 'Package Accommodation Edit Successfully', '2024-09-09 17:17:34', 1, 4, '27.34.66.78'),
(1755, 'Slideshow [slide 2] Edit Successfully', '2024-09-09 17:18:43', 1, 4, '27.34.24.45'),
(1756, 'User [Hotel Seven Star  ] Edit Successfully', '2024-09-09 17:25:58', 1, 4, '27.34.24.45'),
(1757, 'Login: admin logged in.', '2024-09-09 17:34:08', 1, 1, '27.34.24.45'),
(1758, 'Offers [Jungle Safari] Edit Successfully', '2024-09-09 17:34:15', 1, 4, '27.34.24.45'),
(1759, 'Menu [Premier Room] Edit Successfully', '2024-09-09 17:44:43', 1, 4, '27.34.24.45'),
(1760, 'Login: admin logged in.', '2024-09-09 21:01:48', 1, 1, '27.34.66.78'),
(1761, 'User [Hotel Seven Star  ] Edit Successfully', '2024-09-09 21:02:07', 1, 4, '27.34.66.78'),
(1762, 'Login: superadmin logged in.', '2024-09-09 21:02:59', 1, 1, '27.34.66.78'),
(1763, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 21:03:41', 1, 4, '27.34.66.78'),
(1764, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 21:03:57', 1, 4, '27.34.66.78'),
(1765, 'Package Vintage Style Restaurant Edit Successfully', '2024-09-09 21:05:56', 1, 4, '27.34.66.78'),
(1766, 'Package Vintage Style Restaurant Edit Successfully', '2024-09-09 21:06:40', 1, 4, '27.34.66.78'),
(1767, 'Login: admin logged in.', '2024-09-09 21:58:57', 1, 1, '27.34.66.78'),
(1768, 'Changes on Article \'Chitwan National Park\' has been saved successfully.', '2024-09-09 22:01:20', 1, 4, '27.34.66.78'),
(1769, 'Changes on Article \'Tharu Cultural Museum & Research Center\' has been saved successfully.', '2024-09-09 22:01:57', 1, 4, '27.34.66.78'),
(1770, 'Changes on Article \'Elephant Breeding Center\' has been saved successfully.', '2024-09-09 22:03:50', 1, 4, '27.34.66.78'),
(1771, 'Changes on Article \'Chitwan Tharu Village\' has been saved successfully.', '2024-09-09 22:04:24', 1, 4, '27.34.66.78'),
(1772, 'Changes on Article \'New Sauraha Tharu Cultural House\' has been saved successfully.', '2024-09-09 22:04:53', 1, 4, '27.34.66.78'),
(1773, 'Testimonial [SANJAY D] Edit Successfully', '2024-09-09 22:08:27', 1, 4, '27.34.66.78'),
(1774, 'Testimonial [JIBAK] Edit Successfully', '2024-09-09 22:08:55', 1, 4, '27.34.66.78'),
(1775, 'Testimonial [JOSIE S] Edit Successfully', '2024-09-09 22:09:16', 1, 4, '27.34.66.78'),
(1776, 'SocialNetworking [Expedia] Edit Successfully', '2024-09-09 22:10:01', 1, 4, '27.34.66.78'),
(1777, 'SocialNetworking [Booking.com] Edit Successfully', '2024-09-09 22:12:05', 1, 4, '27.34.66.78'),
(1778, 'SocialNetworking [Expedia] Edit Successfully', '2024-09-09 22:13:19', 1, 4, '27.34.66.78'),
(1779, 'SocialNetworking [agoda] Edit Successfully', '2024-09-09 22:17:12', 1, 4, '27.34.66.78'),
(1780, 'SocialNetworking [Makemytrip] Edit Successfully', '2024-09-09 22:19:39', 1, 4, '27.34.66.78'),
(1781, 'SocialNetworking [ctrip] Edit Successfully', '2024-09-09 22:20:25', 1, 4, '27.34.66.78'),
(1782, 'SocialNetworking [Tripadvisor] Edit Successfully', '2024-09-09 22:21:20', 1, 4, '27.34.66.78'),
(1783, 'SocialNetworking [trivago] Edit Successfully', '2024-09-09 22:21:52', 1, 4, '27.34.66.78'),
(1784, 'Menu [About Hotel] Edit Successfully', '2024-09-09 22:27:23', 1, 4, '27.34.66.78'),
(1785, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-09 22:35:09', 1, 4, '27.34.66.78'),
(1786, 'Services [Travel Desksss] Edit Successfully', '2024-09-09 22:37:23', 1, 4, '27.34.66.78'),
(1787, 'Services [Travel Desk] Edit Successfully', '2024-09-09 22:37:35', 1, 4, '27.34.66.78'),
(1788, 'SubPackage Gallery Image [hall 1 ]Data has deleted successfully.', '2024-09-09 22:43:21', 1, 6, '27.34.66.78'),
(1789, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-09 22:43:25', 1, 6, '27.34.66.78'),
(1790, 'SubPackage Gallery Image [hall 2]Data has deleted successfully.', '2024-09-09 22:43:25', 1, 6, '27.34.66.78'),
(1791, 'Sub Package Image [Meeting & Events]Data has added successfully.', '2024-09-09 22:45:04', 1, 3, '27.34.66.78'),
(1792, 'Sub Package Image [Meeting & Events]Data has added successfully.', '2024-09-09 22:45:04', 1, 3, '27.34.66.78'),
(1793, 'Sub Package Image [Meeting & Events]Data has added successfully.', '2024-09-09 22:45:04', 1, 3, '27.34.66.78'),
(1794, 'Menu [Dining] Edit Successfully', '2024-09-09 22:50:57', 1, 4, '27.34.66.78'),
(1795, 'Menu [Dining] Edit Successfully', '2024-09-09 22:51:27', 1, 4, '27.34.66.78'),
(1796, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-09 22:53:15', 1, 4, '27.34.66.78'),
(1797, 'Package Vintage Style Restaurant Edit Successfully', '2024-09-09 22:53:38', 1, 4, '27.34.66.78'),
(1798, 'Package Vintage Style Restaurant Edit Successfully', '2024-09-09 22:53:56', 1, 4, '27.34.66.78'),
(1799, 'Changes on Sub Package \'Vintage Style Restaurant\' has been saved successfully.', '2024-09-09 22:57:47', 1, 4, '27.34.66.78'),
(1800, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 23:04:42', 1, 4, '27.34.66.78'),
(1801, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 23:05:43', 1, 4, '27.34.66.78'),
(1802, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 23:11:46', 1, 4, '27.34.66.78'),
(1803, 'Features [jacuzzi]Data has added successfully.', '2024-09-09 23:13:59', 1, 3, '27.34.66.78'),
(1804, 'Features [Separate Living room]Data has added successfully.', '2024-09-09 23:14:42', 1, 3, '27.34.66.78'),
(1805, 'Changes on Sub Package \'Suite Room\' has been saved successfully.', '2024-09-09 23:15:26', 1, 4, '27.34.66.78'),
(1806, 'Changes on Sub Package \'Premier Room\' has been saved successfully.', '2024-09-09 23:16:18', 1, 4, '27.34.66.78'),
(1807, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-09 23:17:01', 1, 4, '27.34.66.78'),
(1808, 'Menu [Career] Edit Successfully', '2024-09-09 23:18:44', 1, 4, '27.34.66.78'),
(1809, 'Changes on Article \'career\' has been saved successfully.', '2024-09-09 23:19:43', 1, 4, '27.34.66.78'),
(1810, 'Article \'Corporate Social Responsibility (CSR)\' has added successfully.', '2024-09-09 23:21:18', 1, 3, '27.34.66.78'),
(1811, 'Menu [CSR] Edit Successfully', '2024-09-09 23:21:42', 1, 4, '27.34.66.78'),
(1812, 'Login: admin logged in.', '2024-09-10 10:41:02', 1, 1, '27.34.24.45'),
(1813, 'Login: admin logged in.', '2024-09-10 11:18:39', 1, 1, '27.34.24.45'),
(1814, 'Changes on Article \'Corporate Social Responsibility (CSR)\' has been saved successfully.', '2024-09-10 11:18:47', 1, 4, '27.34.24.45'),
(1815, 'Changes on Article \'Corporate Social Responsibility (CSR)\' has been saved successfully.', '2024-09-10 11:20:15', 1, 4, '27.34.24.45'),
(1816, 'Changes on Article \'Corporate Social Responsibility (CSR)\' has been saved successfully.', '2024-09-10 11:21:27', 1, 4, '27.34.24.45'),
(1817, 'Changes on Article \'Corporate Social Responsibility (CSR)\' has been saved successfully.', '2024-09-10 11:22:28', 1, 4, '27.34.24.45'),
(1818, 'Changes on Article \'Corporate Social Responsibility (CSR)\' has been saved successfully.', '2024-09-10 11:23:43', 1, 4, '27.34.24.45'),
(1819, 'Changes on Article \'career\' has been saved successfully.', '2024-09-10 11:29:36', 1, 4, '27.34.24.45'),
(1820, 'Login: admin logged in.', '2024-09-10 16:19:51', 1, 1, '103.10.28.206'),
(1821, 'Package [test]Data has added successfully.', '2024-09-10 16:20:39', 1, 3, '103.10.28.206'),
(1822, 'Login: superadmin logged in.', '2024-09-11 10:32:02', 1, 1, '::1'),
(1823, 'Sub Gallery Image  [room 1]Data has deleted successfully.', '2024-09-11 10:36:36', 1, 6, '::1'),
(1824, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:40', 1, 6, '::1'),
(1825, 'Sub Gallery Image  [room 2]Data has deleted successfully.', '2024-09-11 10:36:40', 1, 6, '::1'),
(1826, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:43', 1, 6, '::1'),
(1827, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:43', 1, 6, '::1'),
(1828, 'Sub Gallery Image  [room 3]Data has deleted successfully.', '2024-09-11 10:36:43', 1, 6, '::1'),
(1829, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:45', 1, 6, '::1'),
(1830, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:45', 1, 6, '::1'),
(1831, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 10:36:45', 1, 6, '::1'),
(1832, 'Sub Gallery Image  [room 4]Data has deleted successfully.', '2024-09-11 10:36:45', 1, 6, '::1'),
(1833, 'Services [Travel Desk] Edit Successfully', '2024-09-11 10:43:09', 1, 4, '::1'),
(1834, 'Services [24hr Reception] Edit Successfully', '2024-09-11 10:43:43', 1, 4, '::1'),
(1835, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-11 10:52:26', 1, 4, '::1'),
(1836, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-11 10:53:16', 1, 4, '::1'),
(1837, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-11 10:54:26', 1, 4, '::1'),
(1838, 'Changes on Article \'about us\' has been saved successfully.', '2024-09-11 11:02:58', 1, 4, '::1'),
(1839, 'Blog [Bandipur                         ] Edit Successfully', '2024-09-11 11:19:47', 1, 4, '::1'),
(1840, 'Package [test]Data has deleted successfully.', '2024-09-11 11:39:18', 1, 6, '::1'),
(1841, 'Package Rooms Edit Successfully', '2024-09-11 11:39:33', 1, 4, '::1'),
(1842, 'Changes on Sub Package \'Deluxe Room\' has been saved successfully.', '2024-09-11 13:01:24', 1, 4, '::1'),
(1843, 'SubPackage Gallery Image [deluxe 1]Data has deleted successfully.', '2024-09-11 13:24:13', 1, 6, '::1'),
(1844, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:15', 1, 6, '::1'),
(1845, 'SubPackage Gallery Image [deluxe 2]Data has deleted successfully.', '2024-09-11 13:24:15', 1, 6, '::1'),
(1846, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:18', 1, 6, '::1'),
(1847, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:18', 1, 6, '::1'),
(1848, 'SubPackage Gallery Image [deluxe 3]Data has deleted successfully.', '2024-09-11 13:24:18', 1, 6, '::1'),
(1849, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:21', 1, 6, '::1'),
(1850, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:21', 1, 6, '::1'),
(1851, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:21', 1, 6, '::1'),
(1852, 'SubPackage Gallery Image [deluxe 4]Data has deleted successfully.', '2024-09-11 13:24:21', 1, 6, '::1'),
(1853, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:23', 1, 6, '::1'),
(1854, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:23', 1, 6, '::1'),
(1855, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:23', 1, 6, '::1'),
(1856, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:23', 1, 6, '::1'),
(1857, 'SubPackage Gallery Image [deluxe 5]Data has deleted successfully.', '2024-09-11 13:24:23', 1, 6, '::1'),
(1858, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1859, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1860, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1861, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1862, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1863, 'SubPackage Gallery Image [deluxe 6]Data has deleted successfully.', '2024-09-11 13:24:27', 1, 6, '::1'),
(1864, 'Sub Package Image [king 1]Data has added successfully.', '2024-09-11 13:26:35', 1, 3, '::1'),
(1865, 'Sub Package Image [king 2]Data has added successfully.', '2024-09-11 13:26:35', 1, 3, '::1'),
(1866, 'Sub Package Image [king 2]Data has added successfully.', '2024-09-11 13:26:35', 1, 3, '::1'),
(1867, 'Sub Package Image [king 4]Data has added successfully.', '2024-09-11 13:26:35', 1, 3, '::1'),
(1868, 'Package []Data has deleted successfully.', '2024-09-11 13:27:19', 1, 6, '::1'),
(1869, 'Package [Meeting & Events]Data has deleted successfully.', '2024-09-11 13:27:19', 1, 6, '::1'),
(1870, 'Package Restaurant Edit Successfully', '2024-09-11 13:27:54', 1, 4, '::1'),
(1871, 'Login: superadmin logged in.', '2024-09-11 16:12:06', 1, 1, '::1'),
(1872, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-11 16:12:55', 1, 4, '::1'),
(1873, 'SubPackage Gallery Image [dining 1]Data has deleted successfully.', '2024-09-11 16:13:25', 1, 6, '::1'),
(1874, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:27', 1, 6, '::1'),
(1875, 'SubPackage Gallery Image [dining 2]Data has deleted successfully.', '2024-09-11 16:13:27', 1, 6, '::1'),
(1876, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:30', 1, 6, '::1'),
(1877, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:30', 1, 6, '::1'),
(1878, 'SubPackage Gallery Image [dining 3]Data has deleted successfully.', '2024-09-11 16:13:30', 1, 6, '::1'),
(1879, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:34', 1, 6, '::1'),
(1880, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:34', 1, 6, '::1'),
(1881, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:34', 1, 6, '::1'),
(1882, 'SubPackage Gallery Image [dining 4]Data has deleted successfully.', '2024-09-11 16:13:34', 1, 6, '::1'),
(1883, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:36', 1, 6, '::1'),
(1884, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:36', 1, 6, '::1'),
(1885, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:36', 1, 6, '::1'),
(1886, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:36', 1, 6, '::1'),
(1887, 'SubPackage Gallery Image [dining 5]Data has deleted successfully.', '2024-09-11 16:13:36', 1, 6, '::1'),
(1888, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:38', 1, 6, '::1'),
(1889, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:39', 1, 6, '::1'),
(1890, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:39', 1, 6, '::1'),
(1891, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:39', 1, 6, '::1'),
(1892, 'SubPackage Gallery Image [dining 6]Data has deleted successfully.', '2024-09-11 16:13:39', 1, 6, '::1'),
(1893, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:39', 1, 6, '::1'),
(1894, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1895, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1896, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1897, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1898, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1899, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1900, 'SubPackage Gallery Image [dining 7]Data has deleted successfully.', '2024-09-11 16:13:41', 1, 6, '::1'),
(1901, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1902, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1903, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1904, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1905, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1906, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1907, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1908, 'SubPackage Gallery Image [dining 8]Data has deleted successfully.', '2024-09-11 16:13:44', 1, 6, '::1'),
(1909, 'Sub Package Image [dining 1]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1910, 'Sub Package Image [dining 2]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1911, 'Sub Package Image [dining 3]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1912, 'Sub Package Image [dining 4]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1913, 'Sub Package Image [dining 5]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1914, 'Sub Package Image [dining 6]Data has added successfully.', '2024-09-11 16:14:42', 1, 3, '::1'),
(1915, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-11 16:27:14', 1, 4, '::1'),
(1916, 'Login: superadmin logged in.', '2024-09-11 22:15:52', 1, 1, '::1'),
(1917, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-11 22:17:33', 1, 4, '::1'),
(1918, 'Slideshow [slide 1] Edit Successfully', '2024-09-11 22:29:27', 1, 4, '::1'),
(1919, 'Slideshow [slide 2] Edit Successfully', '2024-09-11 22:29:43', 1, 4, '::1'),
(1920, 'Slideshow [slide 3] Edit Successfully', '2024-09-11 22:31:11', 1, 4, '::1'),
(1921, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-09-11 22:34:26', 1, 4, '::1'),
(1922, 'Gallery Image [HOMEPAGE] Edit Successfully', '2024-09-11 22:42:44', 1, 4, '::1'),
(1923, 'Sub Gallery Image  [HOTEL]Data has deleted successfully.', '2024-09-11 22:42:49', 1, 6, '::1'),
(1924, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:52', 1, 6, '::1'),
(1925, 'Sub Gallery Image  [HOTEL11]Data has deleted successfully.', '2024-09-11 22:42:52', 1, 6, '::1'),
(1926, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:54', 1, 6, '::1'),
(1927, 'Sub Gallery Image  [HOTEL2]Data has deleted successfully.', '2024-09-11 22:42:54', 1, 6, '::1'),
(1928, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:54', 1, 6, '::1'),
(1929, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:57', 1, 6, '::1'),
(1930, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:57', 1, 6, '::1'),
(1931, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:57', 1, 6, '::1'),
(1932, 'Sub Gallery Image  [HOTEL3]Data has deleted successfully.', '2024-09-11 22:42:57', 1, 6, '::1'),
(1933, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:59', 1, 6, '::1'),
(1934, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:59', 1, 6, '::1'),
(1935, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:59', 1, 6, '::1'),
(1936, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:42:59', 1, 6, '::1'),
(1937, 'Sub Gallery Image  [HOTEL4]Data has deleted successfully.', '2024-09-11 22:42:59', 1, 6, '::1'),
(1938, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1939, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1940, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1941, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1942, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1943, 'Sub Gallery Image  [HOTEL5]Data has deleted successfully.', '2024-09-11 22:43:02', 1, 6, '::1'),
(1944, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1945, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1946, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1947, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1948, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1949, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1950, 'Sub Gallery Image  [HOTEL6]Data has deleted successfully.', '2024-09-11 22:43:05', 1, 6, '::1'),
(1951, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1952, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1953, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1954, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1955, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1956, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1957, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1958, 'Sub Gallery Image  [HOTEL7]Data has deleted successfully.', '2024-09-11 22:43:07', 1, 6, '::1'),
(1959, 'Sub Gallery Image [room1]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1960, 'Sub Gallery Image [room2]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1961, 'Sub Gallery Image [room3]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1962, 'Sub Gallery Image [room4]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1963, 'Sub Gallery Image [room5]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1964, 'Sub Gallery Image [room6]Data has added successfully.', '2024-09-11 22:44:22', 1, 3, '::1'),
(1965, 'Login: superadmin logged in.', '2024-09-12 08:28:12', 1, 1, '::1'),
(1966, 'Package Rooms O\'Ganga Edit Successfully', '2024-09-12 08:28:54', 1, 4, '::1'),
(1967, 'Package Rooms <span>O\\\'Ganga</span> Edit Successfully', '2024-09-12 08:34:41', 1, 4, '::1'),
(1968, 'Package Rooms O\'Ganga Edit Successfully', '2024-09-12 08:34:57', 1, 4, '::1'),
(1969, 'Login: superadmin logged in.', '2024-09-12 16:38:25', 1, 1, '::1'),
(1970, 'Changes on Article \'Chitwan National Park\' has been saved successfully.', '2024-09-12 17:00:29', 1, 4, '::1'),
(1971, 'SocialNetworking [facebook] Edit Successfully', '2024-09-12 17:16:39', 1, 4, '::1'),
(1972, 'SocialNetworking  [linkdin]Data has deleted successfully.', '2024-09-12 17:16:43', 1, 6, '::1'),
(1973, 'SocialNetworking  [linkdin]Data has deleted successfully.', '2024-09-12 17:16:43', 1, 6, '::1'),
(1974, 'SocialNetworking [instagram] Edit Successfully', '2024-09-12 17:16:51', 1, 4, '::1'),
(1975, 'SocialNetworking [Twitter] Edit Successfully', '2024-09-12 17:17:18', 1, 4, '::1'),
(1976, 'SocialNetworking [Twitter] Edit Successfully', '2024-09-12 17:18:26', 1, 4, '::1'),
(1977, 'Login: superadmin logged in.', '2024-09-13 07:10:17', 1, 1, '::1'),
(1978, 'Testimonial [SANJAY D] Edit Successfully', '2024-09-13 07:10:27', 1, 4, '::1'),
(1979, 'Testimonial [JOSIE S] Edit Successfully', '2024-09-13 07:11:04', 1, 4, '::1'),
(1980, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:12:41', 1, 4, '::1'),
(1981, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:15:11', 1, 4, '::1'),
(1982, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:15:32', 1, 4, '::1'),
(1983, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:18:11', 1, 4, '::1'),
(1984, 'Menu [About] Edit Successfully', '2024-09-13 07:19:01', 1, 4, '::1'),
(1985, 'Menu [Rooms] Edit Successfully', '2024-09-13 07:19:23', 1, 4, '::1'),
(1986, 'Menu [Restaurants] Edit Successfully', '2024-09-13 07:19:53', 1, 4, '::1'),
(1987, 'Menu [Hotel Facilities] Edit Successfully', '2024-09-13 07:20:26', 1, 4, '::1'),
(1988, 'Menu [News & Events] Edit Successfully', '2024-09-13 07:20:59', 1, 4, '::1'),
(1989, 'Menu  [Photo Gallery]Data has deleted successfully.', '2024-09-13 07:21:27', 1, 6, '::1'),
(1990, 'Menu  [CSR]Data has deleted successfully.', '2024-09-13 07:21:29', 1, 6, '::1'),
(1991, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:24:13', 1, 4, '::1'),
(1992, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:26:00', 1, 4, '::1'),
(1993, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:26:31', 1, 4, '::1'),
(1994, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:27:04', 1, 4, '::1'),
(1995, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:33:18', 1, 4, '::1'),
(1996, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 07:33:43', 1, 4, '::1'),
(1997, 'Blog [60 Days of Joy in Pokhara      ] Edit Successfully', '2024-09-13 07:35:18', 1, 4, '::1'),
(1998, 'Services [Airport Pick Up & Drop] Edit Successfully', '2024-09-13 07:36:37', 1, 4, '::1');
INSERT INTO `tbl_logs` (`id`, `action`, `registered`, `userid`, `user_action`, `ip_track`) VALUES
(1999, 'Services [Parking Space] Edit Successfully', '2024-09-13 07:36:56', 1, 4, '::1'),
(2000, 'Services [Room Service] Edit Successfully', '2024-09-13 08:07:00', 1, 4, '::1'),
(2001, 'Services [Lake View] Edit Successfully', '2024-09-13 08:07:47', 1, 4, '::1'),
(2002, 'Services [Free Wi-Fi] Edit Successfully', '2024-09-13 08:08:04', 1, 4, '::1'),
(2003, 'Services [Breakfast] Edit Successfully', '2024-09-13 08:08:22', 1, 4, '::1'),
(2004, 'Services [CCTV Camera] Edit Successfully', '2024-09-13 08:08:39', 1, 4, '::1'),
(2005, 'Services [Credit Card Accepted] Edit Successfully', '2024-09-13 08:08:58', 1, 4, '::1'),
(2006, 'Services [Minibar] Edit Successfully', '2024-09-13 08:09:20', 1, 4, '::1'),
(2007, 'Services [Hot and Cold Water] Edit Successfully', '2024-09-13 08:09:42', 1, 4, '::1'),
(2008, 'Services [24 Hour Front Desk] Edit Successfully', '2024-09-13 08:10:09', 1, 4, '::1'),
(2009, 'Services [Laundry Services] Edit Successfully', '2024-09-13 08:10:45', 1, 4, '::1'),
(2010, 'Services  [Housekeeping]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2011, 'Services  [Program Desk]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2012, 'Services  [Jacuzzi (in suite room)]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2013, 'Services  [Parking]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2014, 'Services  [Doctor on Call]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2015, 'Services  [Electricity Back]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2016, 'Services  [High Speed WIFI]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2017, 'Services  [Delicious Cuisine]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2018, 'Services  [Spacious Garden]Data has deleted successfully.', '2024-09-13 08:13:38', 1, 6, '::1'),
(2019, 'Servicess  [Laundry Service]Data has deleted successfully.', '2024-09-13 08:13:55', 1, 6, '::1'),
(2020, 'Services  [Laundry Service]Data has deleted successfully.', '2024-09-13 08:13:55', 1, 6, '::1'),
(2021, 'Services [Rooftop Garden]Data has added successfully.', '2024-09-13 08:14:20', 1, 3, '::1'),
(2022, 'Services [Mountain View]Data has added successfully.', '2024-09-13 08:15:01', 1, 3, '::1'),
(2023, 'Services [Elevator]Data has added successfully.', '2024-09-13 08:16:03', 1, 3, '::1'),
(2024, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 08:17:52', 1, 4, '::1'),
(2025, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-13 08:19:56', 1, 4, '::1'),
(2026, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-13 08:20:06', 1, 4, '::1'),
(2027, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-13 08:20:19', 1, 4, '::1'),
(2028, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-13 08:20:33', 1, 4, '::1'),
(2029, 'Gallery Image [Restaurant] Edit Successfully', '2024-09-13 08:25:11', 1, 4, '::1'),
(2030, 'Gallery Image [Food] Edit Successfully', '2024-09-13 08:25:24', 1, 4, '::1'),
(2031, 'Gallery Image [Restaurant] Edit Successfully', '2024-09-13 08:25:32', 1, 4, '::1'),
(2032, 'Login: superadmin logged in.', '2024-09-13 15:29:37', 1, 1, '127.0.0.1'),
(2033, 'Articles  [Corporate Social Responsibility (CSR)]Data has deleted successfully.', '2024-09-13 15:50:43', 1, 6, '::1'),
(2034, 'Testimonial [Benjamin Nembang Official] Edit Successfully', '2024-09-13 15:52:46', 1, 4, '::1'),
(2035, 'Testimonial [Ray Smith] Edit Successfully', '2024-09-13 15:55:37', 1, 4, '::1'),
(2036, 'Testimonial [Robertchapple] Edit Successfully', '2024-09-13 15:56:54', 1, 4, '::1'),
(2037, 'Testimonial [Jonathan]Data has added successfully.', '2024-09-13 16:03:08', 1, 3, '::1'),
(2038, 'Changes on Article \'World Peace Pagoda\' has been saved successfully.', '2024-09-13 16:04:10', 1, 4, '::1'),
(2039, 'Changes on Article \'Fewa Lake\' has been saved successfully.', '2024-09-13 16:04:25', 1, 4, '::1'),
(2040, 'Changes on Article \'Tal Barahi Temple\' has been saved successfully.', '2024-09-13 16:04:55', 1, 4, '::1'),
(2041, 'Changes on Article \'Pumdikot Shiva Statue\' has been saved successfully.', '2024-09-13 16:05:17', 1, 4, '::1'),
(2042, 'Changes on Article \'Pokhara Lakeside\' has been saved successfully.', '2024-09-13 16:05:40', 1, 4, '::1'),
(2043, 'Article \'Pokhara Disneyland\' has added successfully.', '2024-09-13 16:06:04', 1, 3, '::1'),
(2044, 'Article \'Davis Fall\' has added successfully.', '2024-09-13 16:06:18', 1, 3, '::1'),
(2045, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-13 16:09:30', 1, 4, '::1'),
(2046, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:10:29', 1, 4, '::1'),
(2047, 'Changes on Sub Package \'Super Deluxe Family Room\' has been saved successfully.', '2024-09-13 16:11:30', 1, 4, '::1'),
(2048, 'Package Rooms O\'Ganga Edit Successfully', '2024-09-13 16:19:09', 1, 4, '::1'),
(2049, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-13 16:19:41', 1, 4, '::1'),
(2050, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-13 16:20:37', 1, 4, '::1'),
(2051, 'Features [Water Bottles] Edit Successfully', '2024-09-13 16:21:38', 1, 4, '::1'),
(2052, 'Features [Safety Locker] Edit Successfully', '2024-09-13 16:21:57', 1, 4, '::1'),
(2053, 'Features [Mini Refrigerator] Edit Successfully', '2024-09-13 16:22:22', 1, 4, '::1'),
(2054, 'Features [Towels] Edit Successfully', '2024-09-13 16:22:39', 1, 4, '::1'),
(2055, 'Features [Mini Refrigerator] Edit Successfully', '2024-09-13 16:23:15', 1, 4, '::1'),
(2056, 'Features [Slippers] Edit Successfully', '2024-09-13 16:23:58', 1, 4, '::1'),
(2057, 'Features [Toiletries] Edit Successfully', '2024-09-13 16:24:17', 1, 4, '::1'),
(2058, 'Features [Shower Gel] Edit Successfully', '2024-09-13 16:26:16', 1, 4, '::1'),
(2059, 'Features  [Wakeup Call]Data has deleted successfully.', '2024-09-13 16:26:27', 1, 6, '::1'),
(2060, 'Features [LED TV] Edit Successfully', '2024-09-13 16:26:39', 1, 4, '::1'),
(2061, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-13 16:27:29', 1, 4, '::1'),
(2062, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:27:42', 1, 4, '::1'),
(2063, 'Changes on Sub Package \'Super Deluxe Family Room\' has been saved successfully.', '2024-09-13 16:28:36', 1, 4, '::1'),
(2064, 'Menu [Super Deluxe King Room] Edit Successfully', '2024-09-13 16:30:21', 1, 4, '::1'),
(2065, 'Menu [Super Deluxe Twin Room] Edit Successfully', '2024-09-13 16:30:31', 1, 4, '::1'),
(2066, 'Menu [Super Deluxe Family Room] Edit Successfully', '2024-09-13 16:30:53', 1, 4, '::1'),
(2067, 'SubPackage Gallery Image [premier 1]Data has deleted successfully.', '2024-09-13 16:33:01', 1, 6, '::1'),
(2068, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:05', 1, 6, '::1'),
(2069, 'SubPackage Gallery Image [premier 2]Data has deleted successfully.', '2024-09-13 16:33:05', 1, 6, '::1'),
(2070, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:07', 1, 6, '::1'),
(2071, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:07', 1, 6, '::1'),
(2072, 'SubPackage Gallery Image [premier 3]Data has deleted successfully.', '2024-09-13 16:33:07', 1, 6, '::1'),
(2073, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:10', 1, 6, '::1'),
(2074, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:10', 1, 6, '::1'),
(2075, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:33:10', 1, 6, '::1'),
(2076, 'SubPackage Gallery Image [premier 4]Data has deleted successfully.', '2024-09-13 16:33:10', 1, 6, '::1'),
(2077, 'Sub Package Image [twin ]Data has added successfully.', '2024-09-13 16:33:34', 1, 3, '::1'),
(2078, 'Sub Package Image [twin 2]Data has added successfully.', '2024-09-13 16:33:34', 1, 3, '::1'),
(2079, 'Sub Package Image [twin 3]Data has added successfully.', '2024-09-13 16:33:34', 1, 3, '::1'),
(2080, 'Sub Package Image [twin 4]Data has added successfully.', '2024-09-13 16:33:34', 1, 3, '::1'),
(2081, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:34:24', 1, 4, '::1'),
(2082, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:35:09', 1, 4, '::1'),
(2083, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:37:43', 1, 4, '::1'),
(2084, 'Changes on Sub Package \'Super Deluxe Family Room\' has been saved successfully.', '2024-09-13 16:40:05', 1, 4, '::1'),
(2085, 'SubPackage Gallery Image [suite1]Data has deleted successfully.', '2024-09-13 16:40:25', 1, 6, '::1'),
(2086, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:40:28', 1, 6, '::1'),
(2087, 'SubPackage Gallery Image [suite 2]Data has deleted successfully.', '2024-09-13 16:40:28', 1, 6, '::1'),
(2088, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:40:30', 1, 6, '::1'),
(2089, 'SubPackage Gallery Image []Data has deleted successfully.', '2024-09-13 16:40:30', 1, 6, '::1'),
(2090, 'SubPackage Gallery Image [suite 3]Data has deleted successfully.', '2024-09-13 16:40:30', 1, 6, '::1'),
(2091, 'Sub Package Image [family]Data has added successfully.', '2024-09-13 16:41:10', 1, 3, '::1'),
(2092, 'Sub Package Image [family 1]Data has added successfully.', '2024-09-13 16:41:10', 1, 3, '::1'),
(2093, 'Sub Package Image [family 2]Data has added successfully.', '2024-09-13 16:41:10', 1, 3, '::1'),
(2094, 'Sub Package Image [family 3]Data has added successfully.', '2024-09-13 16:41:10', 1, 3, '::1'),
(2095, 'Sub Package Image [family 4]Data has added successfully.', '2024-09-13 16:41:10', 1, 3, '::1'),
(2096, 'Changes on Sub Package \'Super Deluxe Family Room\' has been saved successfully.', '2024-09-13 16:42:20', 1, 4, '::1'),
(2097, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-13 16:42:31', 1, 4, '::1'),
(2098, 'Sub Gallery Image  [room5 ]Data has deleted successfully.', '2024-09-13 16:42:54', 1, 6, '::1'),
(2099, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:42:57', 1, 6, '::1'),
(2100, 'Sub Gallery Image  [room 6]Data has deleted successfully.', '2024-09-13 16:42:57', 1, 6, '::1'),
(2101, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:42:59', 1, 6, '::1'),
(2102, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:42:59', 1, 6, '::1'),
(2103, 'Sub Gallery Image  [room 7]Data has deleted successfully.', '2024-09-13 16:42:59', 1, 6, '::1'),
(2104, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:02', 1, 6, '::1'),
(2105, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:02', 1, 6, '::1'),
(2106, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:02', 1, 6, '::1'),
(2107, 'Sub Gallery Image  [room 8]Data has deleted successfully.', '2024-09-13 16:43:02', 1, 6, '::1'),
(2108, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:04', 1, 6, '::1'),
(2109, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:04', 1, 6, '::1'),
(2110, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:04', 1, 6, '::1'),
(2111, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:04', 1, 6, '::1'),
(2112, 'Sub Gallery Image  [room 9]Data has deleted successfully.', '2024-09-13 16:43:04', 1, 6, '::1'),
(2113, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:06', 1, 6, '::1'),
(2114, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:06', 1, 6, '::1'),
(2115, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:06', 1, 6, '::1'),
(2116, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:06', 1, 6, '::1'),
(2117, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:07', 1, 6, '::1'),
(2118, 'Sub Gallery Image  [room 10]Data has deleted successfully.', '2024-09-13 16:43:07', 1, 6, '::1'),
(2119, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2120, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2121, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2122, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2123, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2124, 'Sub Gallery Image  []Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2125, 'Sub Gallery Image  [room 11]Data has deleted successfully.', '2024-09-13 16:43:09', 1, 6, '::1'),
(2126, 'Gallery [Rooms]Data has added successfully.', '2024-09-13 16:43:54', 1, 3, '::1'),
(2127, 'Sub Gallery Image [rooms 1]Data has added successfully.', '2024-09-13 16:45:36', 1, 3, '::1'),
(2128, 'Sub Gallery Image [room 2]Data has added successfully.', '2024-09-13 16:45:36', 1, 3, '::1'),
(2129, 'Sub Gallery Image [room 3]Data has added successfully.', '2024-09-13 16:45:36', 1, 3, '::1'),
(2130, 'Gallery [Exterior]Data has added successfully.', '2024-09-13 16:45:48', 1, 3, '::1'),
(2131, 'Sub Gallery Image [exterior]Data has added successfully.', '2024-09-13 16:46:14', 1, 3, '::1'),
(2132, 'Sub Gallery Image [exterior1]Data has added successfully.', '2024-09-13 16:46:14', 1, 3, '::1'),
(2133, 'Sub Gallery Image [exterior 2]Data has added successfully.', '2024-09-13 16:46:14', 1, 3, '::1'),
(2134, 'Gallery [Restaurant]Data has added successfully.', '2024-09-13 16:46:26', 1, 3, '::1'),
(2135, 'Sub Gallery Image [restaurant]Data has added successfully.', '2024-09-13 16:46:45', 1, 3, '::1'),
(2136, 'Sub Gallery Image [restaurant1]Data has added successfully.', '2024-09-13 16:46:45', 1, 3, '::1'),
(2137, 'Sub Gallery Image [restaurant2]Data has added successfully.', '2024-09-13 16:46:45', 1, 3, '::1'),
(2138, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:11:24', 1, 4, '::1'),
(2139, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:11:49', 1, 4, '::1'),
(2140, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:15:42', 1, 4, '::1'),
(2141, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:17:17', 1, 4, '::1'),
(2142, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:17:25', 1, 4, '::1'),
(2143, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-13 17:24:27', 1, 4, '::1'),
(2144, 'Changes on Article \'Davis Fall\' has been saved successfully.', '2024-09-13 17:27:00', 1, 4, '::1'),
(2145, 'Blog [We are on Tripadvisor] Edit Successfully', '2024-09-13 17:34:56', 1, 4, '::1'),
(2146, 'Blog [Happy Dashain!                     ] Edit Successfully', '2024-09-13 17:36:12', 1, 4, '::1'),
(2147, 'Blog [Our doors are now open.                       ] Edit Successfully', '2024-09-13 17:36:47', 1, 4, '::1'),
(2148, 'Blog  [Pokhara city day tour]Data has deleted successfully.', '2024-09-13 17:37:05', 1, 6, '::1'),
(2149, 'Blog  [Australian Base Camp]Data has deleted successfully.', '2024-09-13 17:37:05', 1, 6, '::1'),
(2150, 'Blog  []Data has deleted successfully.', '2024-09-13 17:38:00', 1, 6, '::1'),
(2151, 'Blog [We are on Tripadvisor] Edit Successfully', '2024-09-13 17:38:15', 1, 4, '::1'),
(2152, 'Blog [Happy Dashain!                     ] Edit Successfully', '2024-09-13 17:38:45', 1, 4, '::1'),
(2153, 'Blog [Our doors are now open.                       ] Edit Successfully', '2024-09-13 17:39:27', 1, 4, '::1'),
(2154, 'Blog [Our doors are now open.                       ] Edit Successfully', '2024-09-13 17:58:27', 1, 4, '::1'),
(2155, 'Login: superadmin logged in.', '2024-09-16 07:52:55', 1, 1, '::1'),
(2156, 'Slideshow [slide 4] Edit Successfully', '2024-09-16 07:54:05', 1, 4, '::1'),
(2157, 'Slideshow [slide 5] Edit Successfully', '2024-09-16 07:54:42', 1, 4, '::1'),
(2158, 'Slideshow  [slide 6]Data has deleted successfully.', '2024-09-16 07:54:52', 1, 6, '::1'),
(2159, 'Slideshow  [slide 7]Data has deleted successfully.', '2024-09-16 07:54:52', 1, 6, '::1'),
(2160, 'Slideshow  [slide 8]Data has deleted successfully.', '2024-09-16 07:54:52', 1, 6, '::1'),
(2161, 'Blog [60 Days of Joy in Pokhara      ] Edit Successfully', '2024-09-16 08:13:16', 1, 4, '::1'),
(2162, 'Blog [60 Days of Joy in Pokhara      ] Edit Successfully', '2024-09-16 08:19:29', 1, 4, '::1'),
(2163, 'Blog [60 Days of Joy in Pokhara      ] Edit Successfully', '2024-09-16 08:19:46', 1, 4, '::1'),
(2164, 'Blog [We are on Tripadvisor] Edit Successfully', '2024-09-16 08:19:57', 1, 4, '::1'),
(2165, 'Blog [Happy Dashain!                     ] Edit Successfully', '2024-09-16 08:20:10', 1, 4, '::1'),
(2166, 'SocialNetworking  [Expedia]Data has deleted successfully.', '2024-09-16 08:23:02', 1, 6, '::1'),
(2167, 'SocialNetworking  [Expedia]Data has deleted successfully.', '2024-09-16 08:23:02', 1, 6, '::1'),
(2168, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:05', 1, 6, '::1'),
(2169, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:05', 1, 6, '::1'),
(2170, 'SocialNetworking  [ctrip]Data has deleted successfully.', '2024-09-16 08:23:05', 1, 6, '::1'),
(2171, 'SocialNetworking  [ctrip]Data has deleted successfully.', '2024-09-16 08:23:05', 1, 6, '::1'),
(2172, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2173, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2174, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2175, 'SocialNetworking  []Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2176, 'SocialNetworking  [trivago]Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2177, 'SocialNetworking  [trivago]Data has deleted successfully.', '2024-09-16 08:23:11', 1, 6, '::1'),
(2178, 'SocialNetworking [Booking.com] Edit Successfully', '2024-09-16 08:23:37', 1, 4, '::1'),
(2179, 'SocialNetworking [Makemytrip] Edit Successfully', '2024-09-16 08:24:21', 1, 4, '::1'),
(2180, 'SocialNetworking [agoda] Edit Successfully', '2024-09-16 08:24:40', 1, 4, '::1'),
(2181, 'SocialNetworking [Tripadvisor] Edit Successfully', '2024-09-16 08:24:56', 1, 4, '::1'),
(2182, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-16 08:25:54', 1, 4, '::1'),
(2183, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-16 08:26:35', 1, 4, '::1'),
(2184, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-16 08:51:12', 1, 4, '::1'),
(2185, 'Changes on Config \'Hotel Seven Star\' has been saved successfully.', '2024-09-16 08:51:16', 1, 4, '::1'),
(2186, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-09-16 08:52:52', 1, 4, '::1'),
(2187, 'Changes on Popup \'asefasdasd\' has been saved successfully.', '2024-09-16 08:55:48', 1, 4, '::1'),
(2188, 'Changes on Popup \'asefasdasd\' has been saved successfully.', '2024-09-16 08:57:03', 1, 4, '::1'),
(2189, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-16 09:00:36', 1, 4, '::1'),
(2190, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-16 09:07:35', 1, 4, '::1'),
(2191, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-16 09:08:55', 1, 4, '::1'),
(2192, 'Changes on Sub Package \'Super Deluxe King Room\' has been saved successfully.', '2024-09-16 09:09:18', 1, 4, '::1'),
(2193, 'Changes on Sub Package \'Super Deluxe Twin Room\' has been saved successfully.', '2024-09-16 09:09:53', 1, 4, '::1'),
(2194, 'Changes on Sub Package \'Super Deluxe Family Room\' has been saved successfully.', '2024-09-16 09:10:42', 1, 4, '::1'),
(2195, 'Changes on Sub Package \' Restaurant O\'Ganga\' has been saved successfully.', '2024-09-16 09:11:44', 1, 4, '::1'),
(2196, 'Services [Elevatora] Edit Successfully', '2024-09-16 09:13:09', 1, 4, '::1'),
(2197, 'Services [Elevator] Edit Successfully', '2024-09-16 09:13:12', 1, 4, '::1'),
(2198, 'Login: superadmin logged in.', '2024-09-16 10:59:30', 1, 1, '::1'),
(2199, 'Changes on Popup \'sdad\' has been saved successfully.', '2024-09-16 13:11:50', 1, 4, '::1'),
(2200, 'Changes on Popup \'sdad\' has been saved successfully.', '2024-09-16 13:12:05', 1, 4, '::1'),
(2201, 'Changes on Popup \'sdad\' has been saved successfully.', '2024-09-16 13:12:36', 1, 4, '::1'),
(2202, 'Login: superadmin logged in.', '2024-09-18 16:30:10', 1, 1, '::1'),
(2203, 'Login: superadmin logged in.', '2024-09-18 16:31:39', 1, 1, '::1'),
(2204, 'Login: superadmin logged in.', '2024-09-18 16:32:09', 1, 1, '::1'),
(2205, 'Login: superadmin logged in.', '2024-09-18 16:32:21', 1, 1, '::1'),
(2206, 'Login: superadmin logged in.', '2024-09-18 16:33:16', 1, 1, '::1'),
(2207, 'Login: superadmin logged in.', '2024-09-18 16:33:48', 1, 1, '::1'),
(2208, 'Login: superadmin logged in.', '2024-09-18 16:35:02', 1, 1, '::1'),
(2209, 'Login: superadmin logged in.', '2024-09-18 16:35:35', 1, 1, '::1'),
(2210, 'Login: superadmin logged in.', '2024-09-18 16:35:49', 1, 1, '::1'),
(2211, 'Login: superadmin logged in.', '2024-09-18 16:38:12', 1, 1, '::1'),
(2212, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-09-18 16:38:31', 1, 4, '::1'),
(2213, 'Login: superadmin logged in.', '2024-11-27 09:36:42', 1, 1, '::1'),
(2214, 'Login: superadmin logged in.', '2024-11-27 11:57:16', 1, 1, '::1'),
(2215, 'Changes on Article \'About Freelancer Engineers World\' has been saved successfully.', '2024-11-27 11:57:45', 1, 4, '::1'),
(2216, 'Menu [About] Edit Successfully', '2024-11-27 11:57:53', 1, 4, '::1'),
(2217, 'Changes on Article \'About Us home\' has been saved successfully.', '2024-11-27 12:04:07', 1, 4, '::1'),
(2218, 'Login: superadmin logged in.', '2024-11-27 15:46:14', 1, 1, '::1'),
(2219, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-11-27 15:47:27', 1, 4, '::1'),
(2220, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-11-27 15:48:14', 1, 4, '::1'),
(2221, 'SocialNetworking  [Makemytrip]Data has deleted successfully.', '2024-11-27 15:50:15', 1, 6, '::1'),
(2222, 'SocialNetworking  [Makemytrip]Data has deleted successfully.', '2024-11-27 15:50:15', 1, 6, '::1'),
(2223, 'SocialNetworking  [Booking.com]Data has deleted successfully.', '2024-11-27 15:52:26', 1, 6, '::1'),
(2224, 'SocialNetworking  [Booking.com]Data has deleted successfully.', '2024-11-27 15:52:26', 1, 6, '::1'),
(2225, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:26', 1, 6, '::1'),
(2226, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:26', 1, 6, '::1'),
(2227, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2228, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2229, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2230, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2231, 'SocialNetworking  [Facebook]Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2232, 'SocialNetworking  [Facebook]Data has deleted successfully.', '2024-11-27 15:52:28', 1, 6, '::1'),
(2233, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2234, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2235, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2236, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2237, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2238, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2239, 'SocialNetworking  [agoda]Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2240, 'SocialNetworking  [agoda]Data has deleted successfully.', '2024-11-27 15:52:34', 1, 6, '::1'),
(2241, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2242, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2243, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2244, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2245, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2246, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2247, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2248, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2249, 'SocialNetworking  [Twitter]Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2250, 'SocialNetworking  [Twitter]Data has deleted successfully.', '2024-11-27 15:52:36', 1, 6, '::1'),
(2251, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2252, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2253, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2254, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2255, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2256, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2257, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2258, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2259, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2260, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2261, 'SocialNetworking  [Tripadvisor]Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2262, 'SocialNetworking  [Tripadvisor]Data has deleted successfully.', '2024-11-27 15:52:41', 1, 6, '::1'),
(2263, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2264, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2265, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2266, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2267, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2268, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2269, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2270, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2271, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2272, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2273, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2274, 'SocialNetworking  []Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2275, 'SocialNetworking  [Instagram]Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2276, 'SocialNetworking  [Instagram]Data has deleted successfully.', '2024-11-27 15:52:44', 1, 6, '::1'),
(2277, 'SocialNetworking [facebook] Edit Successfully', '2024-11-27 15:53:03', 1, 4, '::1'),
(2278, 'SocialNetworking [facebook] Edit Successfully', '2024-11-27 15:53:08', 1, 4, '::1'),
(2279, 'SocialNetworking [instagram] Edit Successfully', '2024-11-27 15:53:34', 1, 4, '::1'),
(2280, 'SocialNetworking [instagram] Edit Successfully', '2024-11-27 15:53:39', 1, 4, '::1'),
(2281, 'SocialNetworking  [Twitter]Data has deleted successfully.', '2024-11-27 15:53:44', 1, 6, '::1'),
(2282, 'SocialNetworking  [Twitter]Data has deleted successfully.', '2024-11-27 15:53:44', 1, 6, '::1'),
(2283, 'SocialNetworking [YouTube] Edit Successfully', '2024-11-27 15:53:50', 1, 4, '::1'),
(2284, 'SocialNetworking [asdcasd]Data has added successfully.', '2024-11-27 15:54:13', 1, 3, '::1'),
(2285, 'SocialNetworking  [asdcasd]Data has deleted successfully.', '2024-11-27 15:54:19', 1, 6, '::1'),
(2286, 'SocialNetworking  [asdcasd]Data has deleted successfully.', '2024-11-27 15:54:19', 1, 6, '::1'),
(2287, 'User Group [Administrator] Edit Successfully', '2024-11-27 16:01:00', 1, 4, '::1'),
(2288, 'Advertisement [become a member] Edit Successfully', '2024-11-27 16:10:05', 1, 4, '::1'),
(2289, 'Advertisement [new year 2080]Data has deleted successfully.', '2024-11-27 16:10:34', 1, 6, '::1'),
(2290, 'Advertisement [become a member] Edit Successfully', '2024-11-27 16:10:44', 1, 4, '::1'),
(2291, 'Advertisement [rooom] Edit Successfully', '2024-11-27 16:10:51', 1, 4, '::1'),
(2292, 'Advertisement [room] Edit Successfully', '2024-11-27 16:10:56', 1, 4, '::1'),
(2293, 'Advertisement [rooom]Data has deleted successfully.', '2024-11-27 16:11:03', 1, 6, '::1'),
(2294, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-11-27 16:11:43', 1, 4, '::1'),
(2295, 'Menu [Find Work] Edit Successfully', '2024-11-27 16:12:33', 1, 4, '::1'),
(2296, 'Menu [About Us] Edit Successfully', '2024-11-27 16:12:47', 1, 4, '::1'),
(2297, 'Menu  [Rooms]Data has deleted successfully.', '2024-11-27 16:12:54', 1, 6, '::1'),
(2298, 'Menu  [Restaurants]Data has deleted successfully.', '2024-11-27 16:12:56', 1, 6, '::1'),
(2299, 'Menu  [Hotel Facilities]Data has deleted successfully.', '2024-11-27 16:12:58', 1, 6, '::1'),
(2300, 'Menu  [News & Events]Data has deleted successfully.', '2024-11-27 16:13:00', 1, 6, '::1'),
(2301, 'Changes on Config \'Hotel Haven O\'Ganga\' has been saved successfully.', '2024-11-27 16:14:16', 1, 4, '::1'),
(2302, 'Menu [FAQ] Edit Successfully', '2024-11-27 16:14:56', 1, 4, '::1'),
(2303, 'Menu [About Us] CreatedData has added successfully.', '2024-11-27 16:15:28', 1, 3, '::1'),
(2304, 'Menu [About Us] Edit Successfully', '2024-11-27 16:15:42', 1, 4, '::1'),
(2305, 'Menu [About Us] Edit Successfully', '2024-11-27 16:15:51', 1, 4, '::1'),
(2306, 'Menu [FAQ] Edit Successfully', '2024-11-27 16:16:05', 1, 4, '::1'),
(2307, 'Menu [Privacy Policy] CreatedData has added successfully.', '2024-11-27 16:16:39', 1, 3, '::1'),
(2308, 'Menu [I\'m a client] CreatedData has added successfully.', '2024-11-27 16:17:10', 1, 3, '::1'),
(2309, 'Menu [I\'m a freelancer] CreatedData has added successfully.', '2024-11-27 16:17:23', 1, 3, '::1'),
(2310, 'Slideshow  [slide 2]Data has deleted successfully.', '2024-11-27 16:18:50', 1, 6, '::1'),
(2311, 'Slideshow  [slide 3]Data has deleted successfully.', '2024-11-27 16:18:50', 1, 6, '::1'),
(2312, 'Slideshow  [slide 4]Data has deleted successfully.', '2024-11-27 16:18:50', 1, 6, '::1'),
(2313, 'Slideshow  [slide 5]Data has deleted successfully.', '2024-11-27 16:18:50', 1, 6, '::1'),
(2314, 'Changes on Config \'Hotel Haven O\'Gangaa\' has been saved successfully.', '2024-11-27 16:21:08', 1, 4, '::1'),
(2315, 'Changes on Config \'Freelancer Engineers World\' has been saved successfully.', '2024-11-27 16:21:22', 1, 4, '::1'),
(2316, 'Slideshow [slide 1] Edit Successfully', '2024-11-27 16:26:50', 1, 4, '::1'),
(2317, 'Slideshow [slide 1] Edit Successfully', '2024-11-27 16:29:38', 1, 4, '::1'),
(2318, 'Advertisement [room] Edit Successfully', '2024-11-27 17:45:12', 1, 4, '::1'),
(2319, 'Login: superadmin logged in.', '2024-11-28 09:37:19', 1, 1, '::1'),
(2320, 'User Group [Administrator] Edit Successfully', '2024-11-28 09:37:34', 1, 4, '::1'),
(2321, 'FAQ \'IT\' has added successfully.', '2024-11-28 09:40:00', 1, 3, '::1'),
(2322, 'FAQ \'I.T\' has added successfully.', '2024-11-28 09:40:32', 1, 3, '::1'),
(2323, 'jobtitle \'I.T\' has added successfully.', '2024-11-28 09:41:49', 1, 3, '::1'),
(2324, 'FAQ [I.T]Data has deleted successfully.', '2024-11-28 09:41:57', 1, 6, '::1'),
(2325, 'FAQ []Data has deleted successfully.', '2024-11-28 09:41:59', 1, 6, '::1'),
(2326, 'FAQ [IT]Data has deleted successfully.', '2024-11-28 09:41:59', 1, 6, '::1'),
(2327, 'FAQ []Data has deleted successfully.', '2024-11-28 09:42:05', 1, 6, '::1'),
(2328, 'FAQ []Data has deleted successfully.', '2024-11-28 09:42:05', 1, 6, '::1'),
(2329, 'FAQ \'Can anyone be a member of the Freelancer Engineers World platform?\' has added successfully.', '2024-11-28 09:42:57', 1, 3, '::1'),
(2330, 'FAQ \'What service charge is applicable to work through the platform?\' has added successfully.', '2024-11-28 09:43:16', 1, 3, '::1'),
(2331, 'FAQ \'What tax applies to the work?\' has added successfully.', '2024-11-28 09:43:36', 1, 3, '::1'),
(2332, 'FAQ \'How can a freelancer increase their chances of securing more projects?\' has added successfully.', '2024-11-28 09:44:01', 1, 3, '::1'),
(2333, 'FAQ \'What is online verification for a freelancer?\' has added successfully.', '2024-11-28 09:44:19', 1, 3, '::1'),
(2334, 'FAQ \'How can a client find trustworthy freelancers for their published projects?\' has added successf', '2024-11-28 09:44:39', 1, 3, '::1'),
(2335, 'FAQ \'Can a freelancer withdraw from a project before completing it?\' has added successfully.', '2024-11-28 09:45:01', 1, 3, '::1'),
(2336, 'FAQ \'How will freelancers communicate with the platform?\' has added successfully.', '2024-11-28 09:45:18', 1, 3, '::1'),
(2337, 'FAQ \'How will freelancers and clients communicate with each other?\' has added successfully.', '2024-11-28 09:45:45', 1, 3, '::1'),
(2338, 'FAQ \'How will clients communicate with the platform?\' has added successfully.', '2024-11-28 09:46:15', 1, 3, '::1'),
(2339, 'FAQ \'What happens if a freelancer does not deliver the agreed service to the client?\' has added succ', '2024-11-28 09:46:34', 1, 3, '::1'),
(2340, 'FAQ \'What if the client does not pay the agreed amount after the project is completed?\' has added su', '2024-11-28 09:46:46', 1, 3, '::1'),
(2341, 'Changes on Article \'About Freelancer Engineers World\' has been saved successfully.', '2024-11-28 09:54:58', 1, 4, '::1'),
(2342, 'Changes on Article \'FEW Policy\' has been saved successfully.', '2024-11-28 09:56:45', 1, 4, '::1'),
(2343, 'Changes on Article \'FEW Policya\' has been saved successfully.', '2024-11-28 09:57:45', 1, 4, '::1'),
(2344, 'Changes on Article \'FEW Policy\' has been saved successfully.', '2024-11-28 09:57:47', 1, 4, '::1'),
(2345, 'User [Freelancer Engineers World  ] Edit Successfully', '2024-11-28 09:58:15', 1, 4, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs_action`
--

CREATE TABLE `tbl_logs_action` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `bgcolor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_logs_action`
--

INSERT INTO `tbl_logs_action` (`id`, `title`, `icon`, `bgcolor`) VALUES
(1, 'Login', 'icon-sign-in', 'bg-blue'),
(2, 'Logout', 'icon-sign-out', 'primary-bg'),
(3, 'Add', 'icon-plus-circle', 'bg-green'),
(4, 'Edit', 'icon-edit', 'bg-blue-alt'),
(5, 'Copy', 'icon-copy', 'ui-state-default'),
(6, 'Delete', 'icon-clock-os-circle', 'bg-red');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mainservices`
--

CREATE TABLE `tbl_mainservices` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `content` text NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `linksrc` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `meta_title` tinytext NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `type` int(1) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `modified_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `homepage` int(1) NOT NULL DEFAULT 0,
  `image` blob NOT NULL,
  `date` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `linksrc` varchar(150) NOT NULL,
  `parentOf` int(11) NOT NULL DEFAULT 0,
  `linktype` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `linksrc`, `parentOf`, `linktype`, `status`, `sortorder`, `added_date`, `type`, `icon`) VALUES
(20, 'Find Work', '#', 0, '0', 1, 1, '2024-07-31 21:25:34', 1, ''),
(37, 'FAQ', 'faq', 0, '0', 1, 3, '2024-08-27 10:23:37', 1, ''),
(39, 'Contact', 'contact-us', 0, '0', 1, 4, '2024-08-27 10:24:03', 1, ''),
(40, 'About Us', 'about-freelancer-engineers-world', 0, '0', 1, 2, '2024-08-27 10:24:17', 1, ''),
(51, 'FAQ', 'faq', 0, '0', 1, 6, '2024-09-03 11:54:17', 2, ''),
(55, 'About Us', 'about-freelancer-engineers-world', 0, '0', 1, 5, '2024-11-27 16:15:28', 2, ''),
(56, 'Privacy Policy', '#', 0, '0', 1, 7, '2024-11-27 16:16:39', 2, ''),
(57, 'I\'m a client', '#', 0, '0', 1, 8, '2024-11-27 16:17:10', 3, ''),
(58, 'I\'m a freelancer', '#', 0, '0', 1, 9, '2024-11-27 16:17:23', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mlink`
--

CREATE TABLE `tbl_mlink` (
  `mod_class` varchar(50) NOT NULL,
  `m_url` tinytext NOT NULL,
  `act_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_mlink`
--

INSERT INTO `tbl_mlink` (`mod_class`, `m_url`, `act_id`) VALUES
('Package', 'rooms-oganga', 1),
('Subpackage', 'super-deluxe-family-room', 21),
('Subpackage', 'super-deluxe-twin-room', 28),
('Subpackage', 'super-deluxe-king-room', 29),
('Subpackage', 'event-halls', 31),
('Subpackage', 'tribhuvan-intl-airport', 33),
('Subpackage', 'patan-durbar-square', 34),
('Subpackage', 'swayambhunath-temple', 35),
('Subpackage', 'pashupatinath-temple', 36),
('Package', 'restaurant', 12),
('Subpackage', 'restaurant-oganga', 38),
('Article', 'pool-jacuzzi', 3),
('Article', 'about-freelancer-engineers-world', 2),
('Article', 'children-play-area-indoor-outdoor', 4),
('Article', 'few-policy', 18),
('Article', 'about-us-home', 11),
('Main service', 'children-play-area-indoor-outdoor', 4),
('Main service', 'spa', 1),
('Article', 'asdfasdf', 0),
('Subpackage', 'asdasdasddasasd', 0),
('Main service', 'yuvvyuvyui', 0),
('Main service', 'yuvvyuvyui', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL DEFAULT 'dashboard',
  `mode` varchar(20) NOT NULL,
  `icon_link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `properties` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`id`, `parent_id`, `name`, `link`, `mode`, `icon_link`, `status`, `sortorder`, `added_date`, `properties`) VALUES
(1, 74, 'User Mgmt', 'user/list', 'user', 'icon-users', 1, 1, '0000-00-00', ''),
(2, 0, 'Menu Mgmt', 'menu/list', 'menu', 'icon-list', 1, 2, '0000-00-00', 'a:1:{s:5:\"level\";s:1:\"3\";}'),
(3, 0, 'Articles Mgmt', 'articles/list', 'articles', 'icon-adn', 1, 2, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:3:\"450\";s:9:\"imgheight\";s:3:\"350\";}'),
(4, 0, 'Slideshow Mgmt', 'slideshow/list', 'slideshow', 'icon-film', 1, 2, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:4:\"1263\";s:9:\"imgheight\";s:3:\"600\";}'),
(5, 0, 'Gallery Mgmt', 'gallery/list', 'gallery', 'icon-picture-o', 0, 6, '0000-00-00', 'a:4:{s:8:\"imgwidth\";s:3:\"900\";s:9:\"imgheight\";s:3:\"600\";s:9:\"simgwidth\";s:3:\"400\";s:10:\"simgheight\";s:3:\"350\";}'),
(6, 0, 'News Mgmt', 'news/list', 'news', 'icon-list-alt', 0, 19, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:3:\"300\";s:9:\"imgheight\";s:3:\"300\";}'),
(7, 0, 'Event Mgmt', 'events/list', 'events', 'icon-bullhorn', 0, 10, '0000-00-00', ''),
(8, 0, 'Advertisement Mgmt', 'advertisement/list', 'advertisement', 'icon-indent', 1, 4, '0000-00-00', 'a:8:{s:9:\"limgwidth\";s:3:\"100\";s:10:\"limgheight\";s:3:\"200\";s:9:\"timgwidth\";s:3:\"300\";s:10:\"timgheight\";s:3:\"400\";s:9:\"rimgwidth\";s:3:\"500\";s:10:\"rimgheight\";s:3:\"600\";s:9:\"bimgwidth\";s:3:\"700\";s:10:\"bimgheight\";s:3:\"800\";}'),
(9, 0, 'Video Mgmt', 'video/list', 'video', 'icon-hdd-o', 0, 13, '0000-00-00', ''),
(10, 0, 'Poll Mgmt', 'poll/list', 'poll', 'icon-exchange', 0, 22, '0000-00-00', ''),
(11, 0, 'Social Mgmt', 'social/list', 'social', 'icon-google-plus', 1, 6, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:3:\"141\";s:9:\"imgheight\";s:2:\"13\";}'),
(12, 0, 'Setting Mgmt', 'setting/list', 'settings', 'icon-gear', 1, 21, '0000-00-00', ''),
(13, 12, 'Preference Mgmt', 'preference/list', 'preference', 'icon-gear', 1, 1, '0000-00-00', 'a:18:{s:8:\"imgwidth\";s:8:\"12312312\";s:9:\"imgheight\";s:2:\"12\";s:9:\"simgwidth\";s:2:\"12\";s:10:\"simgheight\";s:2:\"12\";s:10:\"fbimgwidth\";s:2:\"12\";s:11:\"fbimgheight\";s:2:\"12\";s:9:\"timgwidth\";s:2:\"12\";s:10:\"timgheight\";s:2:\"12\";s:9:\"gimgwidth\";s:2:\"12\";s:10:\"gimgheight\";s:2:\"12\";s:9:\"cimgwidth\";s:3:\"121\";s:10:\"cimgheight\";s:2:\"12\";s:9:\"oimgwidth\";s:2:\"12\";s:10:\"oimgheight\";s:2:\"12\";s:9:\"fimgwidth\";s:2:\"21\";s:10:\"fimgheight\";s:2:\"21\";s:10:\"ofimgwidth\";s:2:\"21\";s:11:\"ofimgheight\";s:2:\"12\";}'),
(14, 12, 'Office Info/Location', 'location/list', 'location', 'icon-gear', 1, 2, '0000-00-00', ''),
(15, 12, 'Modules Mgmt', 'module/list', 'module', 'icon-gear', 0, 3, '0000-00-00', ''),
(16, 12, 'Properties Mgmt', 'properties/list', 'properties', 'icon-gear', 1, 4, '0000-00-00', ''),
(17, 0, 'Testimonial', 'testimonial/list', 'testimonial', 'icon-list-alt', 0, 6, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:4:\"1001\";s:9:\"imgheight\";s:3:\"100\";}'),
(18, 0, 'Subscribers Mgmt', 'subscribers/list', 'subscribers', 'icon-comments', 0, 14, '2015-05-17', ''),
(19, 0, 'Offers Mgmt', 'offers/list', 'offers', 'icon-tags', 0, 18, '2015-05-20', 'a:4:{s:9:\"bimgwidth\";s:2:\"22\";s:10:\"bimgheight\";s:2:\"22\";s:8:\"imgwidth\";s:3:\"200\";s:9:\"imgheight\";s:3:\"200\";}'),
(20, 0, 'Services Mgmt', 'services/list', 'services', 'icon-exchange', 0, 5, '2015-08-09', 'a:2:{s:8:\"imgwidth\";s:2:\"48\";s:9:\"imgheight\";s:2:\"48\";}'),
(21, 0, 'Movies Mgmt', 'movies/list', 'movies', 'icon-list', 0, 15, '2015-10-30', ''),
(22, 0, 'Theaters', 'theaters/list', 'theaters', 'icon-film', 0, 17, '2015-11-01', ''),
(23, 25, 'Package Mgmt', 'package/list', 'package', 'icon-exchange', 0, 5, '2016-06-17', 'a:6:{s:8:\"imgwidth\";s:1:\"4\";s:9:\"imgheight\";s:3:\"350\";s:12:\"subbimgwidth\";s:2:\"11\";s:13:\"subbimgheight\";s:2:\"12\";s:11:\"subimgwidth\";s:2:\"13\";s:12:\"subimgheight\";s:2:\"14\";}'),
(24, 25, 'Features Mgmt', 'features/list', 'features', 'icon-gear', 1, 1, '2016-11-16', ''),
(25, 0, 'Package Mgmt', 'package/list', '', 'icon-bullhorn', 0, 4, '2016-11-16', ''),
(26, 0, 'Activity Mgmt', 'activity/list', 'activity', '\r\nicon-hand-o-left', 0, 7, '0000-00-00', 'a:4:{s:8:\"imgwidth\";s:3:\"800\";s:9:\"imgheight\";s:3:\"600\";s:9:\"simgwidth\";s:3:\"400\";s:10:\"simgheight\";s:3:\"350\";}'),
(27, 0, 'Blog Mgmt', 'blog/list', 'blog', '\r\n\r\n\r\n\r\nicon-list-alt', 0, 8, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:2:\"22\";s:9:\"imgheight\";s:2:\"22\";}'),
(28, 0, 'Popup', 'popup/list', 'popup', 'icon-list', 0, 20, '2020-02-13', 'a:2:{s:8:\"imgwidth\";s:3:\"100\";s:9:\"imgheight\";s:3:\"300\";}'),
(29, 0, ' News/Events Mgmt', 'combinednews/list', 'combinednews', 'icon-tags', 0, 14, '2020-09-05', 'a:2:{s:8:\"imgwidth\";s:3:\"350\";s:9:\"imgheight\";s:3:\"240\";}'),
(30, 0, 'Product Mgmt', 'product/list', 'product', 'icon-list', 0, 1, '2021-11-25', ''),
(74, 0, 'Users', '', '', 'icon-users', 1, 1, '2021-10-03', ''),
(300, 0, 'FAQ', 'faq/list', 'faq', 'icon-list', 1, 8, '2023-08-31', ''),
(301, 0, 'Nearby ', 'nearby/list', 'nearby', 'icon-list', 0, 8, '2023-08-29', 'a:2:{s:8:\"imgwidth\";s:2:\"23\";s:9:\"imgheight\";s:2:\"23\";}'),
(302, 0, 'Vacancy Mgmt', 'vacency/list', 'vacency', 'icon-list', 0, 7, '2023-08-28', ''),
(303, 0, 'Main service Mgt', 'mservices/list', 'mservice', 'icon-list', 0, 6, '2023-09-01', 'a:2:{s:8:\"imgwidth\";s:2:\"12\";s:9:\"imgheight\";s:2:\"12\";}'),
(304, 0, 'OTA Mgmt', 'ota/list', 'ota', 'icon-google-plus', 0, 12, '0000-00-00', 'a:2:{s:8:\"imgwidth\";s:2:\"14\";s:9:\"imgheight\";s:2:\"13\";}'),
(305, 0, 'Nearby ', 'nearby/list', 'nearby', 'icon-list', 0, 8, '2023-08-29', ''),
(306, 74, 'User Group', 'usergroup/list', 'usergroup', 'icon-gears', 1, 3, '2023-10-10', ''),
(309, 0, 'Download Mgmt', 'download/list', 'download', 'icon-gear', 0, 7, '2024-03-28', ''),
(310, 0, 'jobtitle', 'jobtitle/list', 'jobtitle', 'icon-list', 1, 8, '2023-08-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nearby`
--

CREATE TABLE `tbl_nearby` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `content` text NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `linksrc` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `meta_title` tinytext NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `type` int(1) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `modified_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `homepage` int(1) NOT NULL DEFAULT 0,
  `image` blob NOT NULL,
  `date` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `distance` varchar(10) NOT NULL,
  `Google_embed` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_nearby`
--

INSERT INTO `tbl_nearby` (`id`, `parent_id`, `slug`, `title`, `sub_title`, `content`, `linktype`, `linksrc`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `type`, `added_date`, `modified_date`, `sortorder`, `homepage`, `image`, `date`, `category`, `distance`, `Google_embed`) VALUES
(14, 0, 'mahankal-temple', 'Pokhara Lakeside', 'Mahankal Temple', '<p>\r\n	The temple of Mahankal is situated near New Road in Kathmandu. Mahankal denotes someone who is beyond time and the Lord Mahankal is also known as Mahankaleshvar. The temple as well as the statue of the god is one of the most amazing examples of the Nepalese ancient heritage. Every day thousands of devotees come to worship the Lord in this temple. The area is also called Mahankal because of the presence of the temple.</p>\r\n', 0, '', 1, '', '', '', 0, '2023-09-04 13:26:09', '2024-09-13 16:05:40', 1, 0, 0x613a313a7b693a303b733a31353a226e4f4437662d74686172752e6a7067223b7d, '', '', '650 M', '#'),
(22, 0, '', 'Pokhara Disneyland', '', '', 0, '', 1, '', '', '', 0, '2024-09-13 16:06:04', '2024-09-13 16:06:04', 6, 0, '', '', '', '1.2 Km', '#'),
(15, 0, 'santi-stupa', 'Pumdikot Shiva Statue', 'santi stupa', '', 0, '', 1, '', '', '', 0, '2023-09-04 13:26:55', '2024-09-13 16:05:17', 2, 0, 0x613a313a7b693a303b733a31373a2242756139412d76696c6c6167652e6a7067223b7d, '', '', '10.4 Km', '#'),
(16, 0, 'changu-narayan-temple', 'Tal Barahi Temple', 'Changu Narayan Temple', '', 0, '', 1, '', '', '', 0, '2023-09-04 13:27:35', '2024-09-13 16:04:55', 3, 0, 0x613a313a7b693a303b733a31383a226d706553752d656c657068616e742e6a7067223b7d, '', '', '750 m', '#'),
(17, 0, 'dhulikhel', 'Fewa Lake', 'Dhulikhel', '', 0, '', 1, '', '', '', 0, '2023-09-04 13:28:02', '2024-09-13 16:04:25', 4, 0, 0x613a313a7b693a303b733a31353a224d6a364e482d74686172752e6a7067223b7d, '', '', '7.5 Km', 'https://maps.app.goo.gl/LNM6WNGLAXCcmswh6'),
(18, 0, 'bhaktapur', 'World Peace Pagoda', 'Bhaktapur', '<p>\r\n	testing</p>\r\n', 0, '', 1, '', '', '', 0, '2023-09-04 13:28:33', '2024-09-13 16:04:10', 5, 0, 0x613a313a7b693a303b733a31373a2248464665582d6368697477616e2e6a7067223b7d, '', '', '6.7 Km', '#'),
(23, 0, '', 'Davis Fall', '', '', 0, '', 1, '', '', '', 0, '2024-09-13 16:06:18', '2024-09-13 17:27:00', 7, 0, '', '', '', '4.3 Km', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d28129.509730426693!2d83.94919583755444!3d28.201578457748056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x3995951db8016fef%3A0x1647c2227c18f95!2sHotel%20Haven%20O&#39;Ganga%2C%2016th%20Street%2C%20Samiko%2C%20Patan%20Marga%206%2C%20Pokhara%2033700!3m2!1d28.2109117!2d83.96002109999999!4m5!1s0x399595134e82378f%3A0xb581716c3b162f6b!2sDavis%20Fall%20Pokhara.%2C%205XQ5%2BHP2%2C%20H10%2C%20Pokhara%2033700!3m2!1d28.1895642!2d83.9586637!5e0!3m2!1sen!2snp!4v1726227685346!5m2!1sen!2snp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL,
  `author` varchar(100) NOT NULL,
  `brief` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `news_date` date NOT NULL,
  `archive_date` date DEFAULT NULL,
  `sortorder` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `image` varchar(50) NOT NULL,
  `source` longtext NOT NULL,
  `type` int(1) NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT 0,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offers`
--

CREATE TABLE `tbl_offers` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `list_image` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `linksrc` varchar(255) NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `rate` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `brief` tinytext NOT NULL,
  `content` longtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `added_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `offer_date` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_offers`
--

INSERT INTO `tbl_offers` (`id`, `slug`, `title`, `image`, `list_image`, `adults`, `children`, `linksrc`, `linktype`, `rate`, `discount`, `brief`, `content`, `status`, `added_date`, `sortorder`, `type`, `offer_date`, `start_date`) VALUES
(13, 'canoeing', 'Canoeing', '', '8OXLC-Canoeing.jpg', 0, 0, '', 0, 0, 0, 'Canoeing along the Rapti River in Chitwan National Park offers a serene experience amidst Nepal\'s lush wilderness. Gliding through tranquil waters, surrounded by dense foliage and diverse wildlife, creates a harmonious blend of relaxation and adventure.', '', 1, '2024-09-04 11:30:40', 1, 0, '2024-09-30', '2024-09-01'),
(12, 'cultural-dance', 'Cultural Dance', '', 'tdhga-culturedance.jpg', 0, 0, '', 0, 0, 0, 'Cultural dance in Chitwan features vibrant Tharu community performances, showcasing their rich heritage and traditions with lively music and colorful costumes. These entertaining shows educate tourists about Tharu culture, making them a must-see for visit', '', 1, '2024-09-04 11:30:24', 2, 0, '2024-09-30', '2024-09-01'),
(11, 'jungle-safari', 'Jungle Safari', '', 'KzanG-jeepsafari.jpg', 0, 0, '', 0, 0, 0, 'Chitwan Jungle Safari offers immersive activities like jeep safaris, elephant rides, canoeing, and jungle walks in Chitwan National Park, where visitors can observe wildlife such as the one-horned rhinoceros, Royal Bengal tiger, and numerous bird species.', '', 1, '2024-09-04 11:29:19', 3, 0, '2024-09-30', '2024-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_child`
--

CREATE TABLE `tbl_offer_child` (
  `offer_id` int(11) NOT NULL,
  `offer_pax` varchar(200) NOT NULL,
  `offer_usd` varchar(10) NOT NULL,
  `offer_inr` varchar(10) NOT NULL,
  `offer_npr` varchar(10) NOT NULL,
  `offer_no` int(11) NOT NULL,
  `multi_offer_title` varchar(255) NOT NULL,
  `multi_offer_npr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ota`
--

CREATE TABLE `tbl_ota` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `linksrc` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_ota`
--

INSERT INTO `tbl_ota` (`id`, `title`, `image`, `icon`, `linksrc`, `status`, `sortorder`, `registered`) VALUES
(7, 'booking', 'guqcq-bo.png', '', '#', 1, 1, ''),
(8, 'agoda', '8fj3b-ag.png', '', '#', 1, 2, ''),
(9, 'expedia', 'hhqsu-ex.png', '', '#', 1, 3, ''),
(10, 'tripadvisor', 'qw86F-ta.png', '', '#', 1, 4, ''),
(11, 'Make My Trip', 'sFzjy-ma.png', '', '#', 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL,
  `sub_title` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `header_image` text NOT NULL,
  `banner_image` mediumtext NOT NULL,
  `detail` longtext NOT NULL,
  `content` mediumtext NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `modified_date` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `slug`, `title`, `sub_title`, `image`, `header_image`, `banner_image`, `detail`, `content`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `sortorder`, `added_date`, `modified_date`, `type`) VALUES
(1, 'rooms-oganga', 'Rooms O\'Ganga', 'Comfort and Luxury, Redefined', '', '', 'a:1:{i:0;s:16:\"GL825-banner.jpg\";}', '', '<p>\r\n	Step into a world where elegance embraces comfort. Our 26 chic boutique rooms redefine luxury, blending style with thoughtful amenities. Your private balcony opens up to breathtaking vistas&mdash;Fewa Lake, snow-capped peaks, and rolling hills. It&rsquo;s an invitation to create unforgettable memories. Book your stay today and let the beauty of Pokhara envelop you.</p>\r\n', '', '', '', 1, 1, '2017-04-24 17:25:53', '2024-09-13 16:19:09', 1),
(12, 'restaurant', 'Restaurant', 'Dining Redefined, Elegance Served', '', 'iIVjB-dining.jpg', 'a:0:{}', '', '<p>\r\n	The finest flavours, succulent textures, carefully selected ingredients, and a refined presentation that resembles a work of art: these are the components of our restaurants&rsquo; gourmet delights. The finest wines round off your gourmet journey</p>\r\n', '', '', '', 1, 2, '2023-08-29 14:33:04', '2024-09-11 13:27:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_sub`
--

CREATE TABLE `tbl_package_sub` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `detail` longtext NOT NULL,
  `image` mediumtext NOT NULL,
  `header_image` text NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `feature` blob NOT NULL,
  `content` mediumtext NOT NULL,
  `facility_title` varchar(255) NOT NULL,
  `number_room` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `people_qnty` int(11) NOT NULL,
  `onep_price` int(11) NOT NULL,
  `twop_price` int(11) NOT NULL,
  `threep_price` int(11) NOT NULL,
  `oneb_price` int(11) NOT NULL,
  `twob_price` int(11) NOT NULL,
  `threeb_price` int(11) NOT NULL,
  `extra_bed` varchar(10) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `serve` varchar(255) NOT NULL,
  `theatre_style` varchar(255) NOT NULL,
  `class_room_style` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `round_table` varchar(255) NOT NULL,
  `clusture` varchar(255) NOT NULL,
  `cocktail` varchar(255) NOT NULL,
  `seats` varchar(20) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `modified_date` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT 0,
  `below_content` mediumtext NOT NULL,
  `seminar` varchar(50) NOT NULL,
  `meeting` varchar(50) NOT NULL,
  `events` varchar(50) NOT NULL,
  `conference` varchar(50) NOT NULL,
  `catering` varchar(50) NOT NULL,
  `celebration` varchar(50) NOT NULL,
  `organic_food` varchar(50) NOT NULL,
  `occupancy` varchar(50) NOT NULL,
  `view` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `live_music` varchar(50) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `room_size` varchar(50) NOT NULL,
  `room_service` text NOT NULL,
  `airport_pickup` varchar(50) NOT NULL,
  `private_balcony` varchar(50) NOT NULL,
  `checkinout` varchar(50) NOT NULL,
  `rojai_room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_package_sub`
--

INSERT INTO `tbl_package_sub` (`id`, `slug`, `title`, `sub_title`, `detail`, `image`, `header_image`, `image2`, `image3`, `image4`, `feature`, `content`, `facility_title`, `number_room`, `currency`, `discount`, `people_qnty`, `onep_price`, `twop_price`, `threep_price`, `oneb_price`, `twob_price`, `threeb_price`, `extra_bed`, `short_title`, `time`, `location`, `serve`, `theatre_style`, `class_room_style`, `shape`, `round_table`, `clusture`, `cocktail`, `seats`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `sortorder`, `added_date`, `modified_date`, `type`, `below_content`, `seminar`, `meeting`, `events`, `conference`, `catering`, `celebration`, `organic_food`, `occupancy`, `view`, `size`, `service`, `live_music`, `bed`, `room_size`, `room_service`, `airport_pickup`, `private_balcony`, `checkinout`, `rojai_room_id`) VALUES
(21, 'super-deluxe-family-room', 'Super Deluxe Family Room', '', 'These beautifully decorated rooms have 1 queen bed and 1 single bed, a seating area, large windows and a private balcony with beautiful views of lakeside, Fewa Lake and/or the mountain range.', 'a:1:{i:0;s:12:\"S7Adq-12.jpg\";}', '', '', '', '', 0x613a313a7b693a3131393b613a323a7b693a303b613a313a7b693a303b733a31343a22526f6f6d20416d656e6974696573223b7d693a313b613a383a7b693a303b733a333a22313331223b693a313b733a333a22313330223b693a323b733a333a22313239223b693a333b733a333a22313233223b693a343b733a333a22313231223b693a353b733a333a22313336223b693a363b733a333a22313334223b693a373b733a333a22313235223b7d7d7d, '<p class=\"mb-30\">\r\n	Luxuriate in comfort and aesthetics in our Beautifully Decorated Super Deluxe Family Room. With tastefully furnished queen and single beds, a cozy seating area, and large windows offering captivating views of the lakeside, Fewa Lake, and the majestic mountain range, this room is a haven. Step onto your private balcony to immerse yourself in natural beauty.</p>\r\n<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-in</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-in from 12:00 AM - anytime</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Early check-in subject to availability</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-out</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-out before noon</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Express check-out</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-12\">\r\n		<h6>\r\n			Special check-in instructions</h6>\r\n		<p>\r\n			Guests will receive an email 5 days before arrival with check-in instructions. Front desk staff will greet guests on arrival. For more details, please contact our frontdesk for information on the booking confirmation.</p>\r\n	</div>\r\n</div>\r\n', '', 0, '\\$', 0, 0, 80, 0, 0, 0, 0, 0, '3', 'Luxury Redefined, Comfort Perfected.', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '2020-02-14 12:20:31', '2024-09-16 09:10:42', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(28, 'super-deluxe-twin-room', 'Super Deluxe Twin Room', '', 'These tastefully furnished rooms have two twin size beds, a seating area, large windows and a private balcony with breathtaking views of the lake or the mountain range include a rain shower', 'a:1:{i:0;s:12:\"bhuDL-13.jpg\";}', '', '', '', '', 0x613a313a7b693a3131393b613a323a7b693a303b613a313a7b693a303b733a303a22223b7d693a313b613a383a7b693a303b733a333a22313331223b693a313b733a333a22313330223b693a323b733a333a22313239223b693a333b733a333a22313233223b693a343b733a333a22313231223b693a353b733a333a22313336223b693a363b733a333a22313334223b693a373b733a333a22313235223b7d7d7d, '<p class=\"mb-30\">\r\n	Indulge in comfort and luxury in our Super Deluxe Twin Bed Room. With tastefully furnished single beds, a perfect seating area, and large windows offering captivating views of the serene lake or majestic mountain range, this room is a haven. Step onto your private balcony to immerse yourself in natural beauty. Every detail has been designed for your pampering.</p>\r\n<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-in</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-in from 12:00 AM - anytime</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Early check-in subject to availability</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-out</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-out before noon</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Express check-out</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-12\">\r\n		<h6>\r\n			Special check-in instructions</h6>\r\n		<p>\r\n			Guests will receive an email 5 days before arrival with check-in instructions. Front desk staff will greet guests on arrival. For more details, please contact our frontdesk for information on the booking confirmation.</p>\r\n	</div>\r\n</div>\r\n', '', 0, '\\$', 0, 0, 60, 0, 0, 0, 0, 0, '', 'Premier Comfort, Unmatched Elegance', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, '2023-06-06 12:40:04', '2024-09-16 09:09:53', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(29, 'super-deluxe-king-room', 'Super Deluxe King Room', '', 'These spacious and luxurious rooms have a king size bed, a seating area, large windows and a private balcony with beautiful unobstructed views of the lakeside and mountain range', 'a:1:{i:0;s:12:\"e7iuN-15.jpg\";}', '', '', '', '', 0x613a313a7b693a3131393b613a323a7b693a303b613a313a7b693a303b733a393a22416d656e6974696573223b7d693a313b613a383a7b693a303b733a333a22313331223b693a313b733a333a22313330223b693a323b733a333a22313239223b693a333b733a333a22313233223b693a343b733a333a22313231223b693a353b733a333a22313336223b693a363b733a333a22313334223b693a373b733a333a22313235223b7d7d7d, '<p class=\"mb-30\">\r\n	Escape to elegance and comfort in our spacious Super Deluxe King Bed Room. Imagine sinking into a plush king-size bed, surrounded by tasteful decor and large windows with stunning lakeside and mountain views. Your private balcony invites you to breathe in the fresh air. Every detail has been meticulously designed for unparalleled comfort and sophistication.</p>\r\n<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-in</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-in from 12:00 AM - anytime</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Early check-in subject to availability</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-6\">\r\n		<h6>\r\n			Check-out</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Check-out before noon</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-check\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Express check-out</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n	<div class=\"col-md-12\">\r\n		<h6>\r\n			Special check-in instructions</h6>\r\n		<p>\r\n			Guests will receive an email 5 days before arrival with check-in instructions. Front desk staff will greet guests on arrival. For more details, please contact our frontdesk for information on the booking confirmation.</p>\r\n	</div>\r\n</div>\r\n', '', 0, '\\$', 0, 0, 60, 0, 0, 0, 0, 0, '', 'Experience Deluxe, Live the Dream.', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3, '2023-06-06 13:02:18', '2024-09-16 09:09:18', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(38, 'restaurant-oganga', ' Restaurant O\'Ganga', '', '', 'a:2:{i:0;s:11:\"Mky9A-4.jpg\";i:1;s:11:\"ai7BE-5.jpg\";}', '', '', '', '', 0x613a303a7b7d, '<p>\r\n	&ldquo;Start your day with our wholesome and satisfying complimentary breakfast. Freshly prepared delicacies await, providing the perfect fuel for your day&rsquo;s activities.</p>\r\n<p>\r\n	Whether you prefer Nepali, Indian, Chinese, or Continental cuisine, our made-to-order lunch and dinner options cater to your taste. And when it&rsquo;s time to unwind, our bar offers an array of local and imported liquors and beers. Cheers to a delightful dining experience!&rdquo;</p>\r\n<div class=\"row\">\r\n	<div class=\"col-md-12\">\r\n		<h6>\r\n			Hours</h6>\r\n		<ul class=\"list-unstyled page-list mb-30\">\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-time\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Breakfast: 7.00 am &ndash; 11.00 am (daily)</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-time\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Lunch: 12.00 noon &ndash; 2.00 pm (daily)</p>\r\n				</div>\r\n			</li>\r\n			<li>\r\n				<div class=\"page-list-icon\">\r\n					<i class=\"ti-time\"></i></div>\r\n				<div class=\"page-list-text\">\r\n					<p>\r\n						Dinner: open from 6.30 pm, last order at 10.00 pm (daily)</p>\r\n				</div>\r\n			</li>\r\n		</ul>\r\n	</div>\r\n</div>\r\n', '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', ' Restaurant O\'Ganga', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4, '2023-08-29 14:35:35', '2024-09-16 09:11:44', 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `group_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_popup`
--

CREATE TABLE `tbl_popup` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `source` varchar(250) NOT NULL,
  `linktype` varchar(150) NOT NULL,
  `linksrc` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_popup`
--

INSERT INTO `tbl_popup` (`id`, `title`, `date1`, `date2`, `image`, `source`, `linktype`, `linksrc`, `position`, `status`, `sortorder`, `type`, `slug`) VALUES
(1, 'sdad', '2023-09-03', '2024-09-19', 'a:1:{i:0;s:25:\"aCBN2-dc4HI-service-2.jpg\";}', '', '0', 'about-us', 1, 1, 1, 1, 'sdad'),
(2, 'asefasdasd', '2024-01-01', '2025-01-29', 'a:1:{i:0;s:12:\"50WjM-s1.jpg\";}', '', '0', 'about-us', 1, 1, 2, 1, 'asefasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_jpg` varchar(255) NOT NULL,
  `img_png` varchar(255) NOT NULL,
  `img_svg` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `modified_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `title`, `content`, `img_thumb`, `img_jpg`, `img_png`, `img_svg`, `status`, `sortorder`, `added_date`, `modified_date`) VALUES
(2, 'test', 'test ', '<p>\r\n	dfcgvhhjbk</p>\r\n', '', '', '', '', 1, 1, '2021-11-24 12:47:12', '2021-11-24 12:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_price`
--

CREATE TABLE `tbl_room_price` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `one_person` int(11) NOT NULL,
  `two_person` int(11) NOT NULL,
  `three_person` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `linksrc` varchar(255) NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `content` longtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `added_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `brief` varchar(250) NOT NULL,
  `meta_title` tinyint(4) NOT NULL,
  `meta_keywords` int(11) NOT NULL,
  `meta_description` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `slug`, `title`, `sub_title`, `image`, `icon`, `linksrc`, `linktype`, `content`, `status`, `added_date`, `sortorder`, `type`, `brief`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(60, 'lake-view', 'Lake View', '', 'a:1:{i:0;s:15:\"52yg0-beach.png\";}', '', '', 0, '', 1, '2023-09-04 12:35:46', 11, 0, '', 0, 0, 0),
(61, 'parking-space', 'Parking Space', 'LED Tv', 'a:1:{i:0;s:15:\"YN2w5-beach.png\";}', 'flaticon-car', '', 0, '', 1, '2023-09-04 12:35:57', 13, 0, '', 0, 0, 0),
(63, 'airport-pick-up-drop', 'Airport Pick Up & Drop', '', 'a:0:{}', 'flaticon-world', '', 0, '', 1, '2024-08-30 11:30:59', 14, 0, '', 0, 0, 0),
(64, 'free-wi-fi', 'Free Wi-Fi', '', 'a:0:{}', 'flaticon-wifi', '', 0, '', 1, '2024-08-30 11:31:14', 10, 0, '', 0, 0, 0),
(65, 'breakfast', 'Breakfast', '', 'a:0:{}', 'flaticon-breakfast', '', 0, '', 1, '2024-09-09 15:51:17', 9, 0, '', 0, 0, 0),
(66, 'room-service', 'Room Service', '', 'a:0:{}', 'flaticon-bed', '', 0, '', 1, '2024-09-09 15:52:14', 12, 0, '', 0, 0, 0),
(67, 'credit-card-accepted', 'Credit Card Accepted', '', 'a:1:{i:0;s:20:\"FS79E-creditcard.png\";}', '', '', 0, '', 1, '2024-09-09 15:52:38', 7, 0, '', 0, 0, 0),
(68, 'cctv-camera', 'CCTV Camera', '', 'a:1:{i:0;s:14:\"iTQcK-cctv.png\";}', '', '', 0, '', 1, '2024-09-09 15:53:01', 8, 0, '', 0, 0, 0),
(84, 'rooftop-garden', 'Rooftop Garden', '', 'a:1:{i:0;s:16:\"l6Gaj-plants.png\";}', '', '', 0, '', 1, '2024-09-13 08:14:20', 0, 0, '', 0, 0, 0),
(85, 'mountain-view', 'Mountain View', '', 'a:1:{i:0;s:15:\"cOGgX-view.jpeg\";}', '', '', 0, '', 1, '2024-09-13 08:15:01', 1, 0, '', 0, 0, 0),
(72, 'concierge-service', 'Concierge service', '', 'a:1:{i:0;s:14:\"0KO6f-Bar.webp\";}', '', '', 0, '', 1, '2024-09-09 15:57:19', 2, 0, '', 0, 0, 0),
(86, 'elevator', 'Elevator', '', 'a:1:{i:0;s:13:\"EwL4S-ele.png\";}', '', '', 0, '', 1, '2024-09-13 08:16:03', 15, 0, '', 0, 0, 0),
(74, 'minibar', 'Minibar', '', 'a:1:{i:0;s:17:\"qyLSB-minibar.png\";}', '', '', 0, '', 1, '2024-09-09 15:57:51', 6, 0, '', 0, 0, 0),
(76, 'hot-and-cold-water', 'Hot and Cold Water', '', 'a:1:{i:0;s:16:\"MxxNN-faucet.png\";}', '', '', 0, '', 1, '2024-09-09 15:58:16', 5, 0, '', 0, 0, 0),
(80, '24-hour-front-desk', '24 Hour Front Desk', '', 'a:1:{i:0;s:26:\"Auf2e-information-desk.png\";}', '', '', 0, '', 1, '2024-09-09 16:00:28', 4, 0, '', 0, 0, 0),
(83, 'laundry-services', 'Laundry Services', '', 'a:1:{i:0;s:30:\"0F8VO-washing-machine-icon.png\";}', '', '', 0, '', 1, '2024-09-09 16:01:54', 3, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

CREATE TABLE `tbl_slideshow` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `image` tinytext NOT NULL,
  `linksrc` tinytext NOT NULL,
  `linktype` tinyint(1) NOT NULL DEFAULT 0,
  `content` longtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `m_status` tinyint(1) NOT NULL DEFAULT 1,
  `added_date` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `source` varchar(250) NOT NULL,
  `source_vid` varchar(255) NOT NULL,
  `url_type` varchar(50) NOT NULL,
  `thumb_image` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `class` varchar(100) NOT NULL,
  `mode` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`id`, `title`, `image`, `linksrc`, `linktype`, `content`, `status`, `m_status`, `added_date`, `sortorder`, `type`, `source`, `source_vid`, `url_type`, `thumb_image`, `url`, `host`, `class`, `mode`) VALUES
(81, 'slide 1', '', '', 0, '', 1, 0, '2024-08-26 11:14:51', 1, 0, 'u3ZNr-bannervideo.mp4', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshows_withouttlist`
--

CREATE TABLE `tbl_slideshows_withouttlist` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_networking`
--

CREATE TABLE `tbl_social_networking` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `linksrc` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL,
  `review_image` varchar(255) NOT NULL,
  `d_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_social_networking`
--

INSERT INTO `tbl_social_networking` (`id`, `title`, `image`, `icon`, `type`, `linksrc`, `status`, `sortorder`, `registered`, `review_image`, `d_title`) VALUES
(1, 'YouTube', 'hq2YV-YouTube.png', '', 1, '#', 1, 3, '', '', ''),
(5, 'facebook', 'q4yTh-Facebook.png', '', 1, 'https://www.facebook.com/havenofganga', 1, 1, '2024-08-26 12:40:57', 'yImul-Facebook2.png', 'hotelannapurnaviewsarankot'),
(6, 'instagram', 'NBW6q-Instagram.png', '', 1, '#', 1, 2, '2024-08-26 12:42:17', 'tUuw3-Instagram2.png', 'annapurnaview');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subpackage_images`
--

CREATE TABLE `tbl_subpackage_images` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subpackageid` int(11) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `registered` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_subpackage_images`
--

INSERT INTO `tbl_subpackage_images` (`id`, `title`, `subpackageid`, `detail`, `status`, `sortorder`, `registered`, `image`) VALUES
(73, 'Hall', 31, '', 1, 18, '2023-06-21 13:59:14', 'lumn1-1.jpg'),
(74, 'Hall', 31, '', 1, 19, '2023-06-21 13:59:14', 'TXYew-2.jpg'),
(75, 'Hall', 31, '', 1, 20, '2023-06-21 13:59:14', '3WSgO-3.jpg'),
(76, 'Hall', 31, '', 1, 21, '2023-06-21 13:59:14', 'V7UWD-4.jpg'),
(77, 'Hall', 31, '', 1, 22, '2023-06-21 13:59:14', 'IZ0in-5.jpg'),
(78, 'Hall', 31, '', 1, 23, '2023-06-21 13:59:14', 's8rXz-6.jpg'),
(167, 'king 1', 29, '', 1, 2, '2024-09-11 13:26:35', '9DwY2-king4.jpg'),
(168, 'king 2', 29, '', 1, 7, '2024-09-11 13:26:35', 'EFgUA-king3.jpg'),
(169, 'king 2', 29, '', 1, 9, '2024-09-11 13:26:35', 'KA5OC-king1.jpg'),
(170, 'king 4', 29, '', 1, 10, '2024-09-11 13:26:35', 'qWLwL-king2.jpg'),
(171, 'dining 1', 38, '', 1, 5, '2024-09-11 16:14:42', 'nLsWX-6.jpg'),
(172, 'Restaurant', 38, '', 1, 4, '2024-09-11 16:14:42', '7ltsL-3.jpg'),
(173, 'dining 3', 38, '', 1, 6, '2024-09-11 16:14:42', '1uUcz-2.jpg'),
(174, 'Restaurant', 38, '', 1, 1, '2024-09-11 16:14:42', 'Mr3el-1.jpg'),
(175, 'Food', 38, '', 1, 3, '2024-09-11 16:14:42', '28Vkg-7.jpg'),
(176, 'dining 6', 38, '', 1, 8, '2024-09-11 16:14:42', 'nw8kQ-8.jpg'),
(177, 'twin ', 28, '', 1, 1, '2024-09-13 16:33:34', 'vy9CI-twin3.jpg'),
(178, 'twin 2', 28, '', 1, 2, '2024-09-13 16:33:34', '2vdcl-twin2.jpg'),
(179, 'twin 3', 28, '', 1, 3, '2024-09-13 16:33:34', 'IzScO-twin1.jpg'),
(180, 'twin 4', 28, '', 1, 4, '2024-09-13 16:33:34', 'kRMVe-twin4.jpg'),
(181, 'family', 21, '', 1, 1, '2024-09-13 16:41:10', '3gfaR-family2.jpg'),
(182, 'family 1', 21, '', 1, 2, '2024-09-13 16:41:10', '93b8z-family3.jpg'),
(183, 'family 2', 21, '', 1, 3, '2024-09-13 16:41:10', 'V2zCS-family5.jpg'),
(184, 'family 3', 21, '', 1, 4, '2024-09-13 16:41:10', 'Ag4wz-family1.jpg'),
(185, 'family 4', 21, '', 1, 5, '2024-09-13 16:41:10', 'hYkSA-family4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `mailaddress` varchar(250) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `parentOf` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(225) NOT NULL,
  `linksrc` text NOT NULL,
  `content` mediumtext NOT NULL,
  `rating` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `via_type` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `tes_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `parentOf`, `name`, `image`, `linksrc`, `content`, `rating`, `sortorder`, `status`, `country`, `via_type`, `type`, `page_slug`, `tes_date`) VALUES
(2, 0, 'Robertchapple', 'GCY2j-tripadv.png', 'https://www.tripadvisor.com/Hotel_Review-g1367591-d4550850-Reviews-Hotel_Seven_Star-Sauraha_Chitwan_District_Narayani_Zone_Central_Region.html', '<p>\r\n	Wonderful, luxury, boutique hotel in excellent location near the Lakeside. Staff were very helpful and attentive. Breakfast was bespoke and great. Hotel organised trips for us including: driver, cable car ride to watch sunrise over Annapurna. An unforgettable experience. Thank you.</p>\r\n', 5, 1, 1, 'Manchester, England', 'USA', 0, 'offer/package-8', '2024-08-26'),
(3, 0, 'Ray Smith', 'IvTLx-1.jpg', 'https://www.expedia.com/Sauraha-Hotels-Hotel-Seven-Star.h6469078.Hotel-Information', '<p>\r\n	Great space for events. They were able to cater to the event I was working while simultaneously having an event and a wedding on separate floors. Hotel is massive. Employees are very friendly and always willing to help if need be. Will definitely be having more events here in the future.</p>\r\n', 5, 2, 1, 'Kolkata, India', 'Singapore', 0, 'about-annapurna-view', '2024-08-27'),
(4, 0, 'Benjamin Nembang Official', 'toiww-1.jpg', 'https://www.tripadvisor.com/Hotel_Review-g1367591-d4550850-Reviews-Hotel_Seven_Star-Sauraha_Chitwan_District_Narayani_Zone_Central_Region.html', '<p>\r\n	I recently stayed at Heaven O Ganga, and my experience was perfect. The staff was welcoming and provided excellent service throughout my stay. The room was well-maintained, offering a comfortable and relaxing atmosphere. Breakfast was freshly served and it will be more better if hotel add some more fruits items. The hotel&rsquo;s central location made it convenient for exploring the city. Overall, I highly recommend Heaven O Ganga for a delightful and enjoyable stay.</p>\r\n', 5, 3, 1, 'Los Angeles, California', 'USA', 0, 'lounge-and-bar', '2024-08-22'),
(9, 0, 'Jonathan', '1Js8w-team1.jpg', '#', '<p>\r\n	The hotel is nicely situated in one of the calmer streets of Pokhara lake side. Staff is very welcoming, helpful and friendly, and is doing everything they can to help you. Great hotel for the price!</p>\r\n', 5, 4, 1, '', 'Norway', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `optional_email` longtext NOT NULL,
  `hall_email` varchar(200) NOT NULL,
  `hr_email` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `accesskey` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `access_code` varchar(255) NOT NULL,
  `facebook_uid` varchar(255) NOT NULL,
  `facebook_accesstoken` varchar(255) NOT NULL,
  `facebook_tokenexpire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `permission` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `middle_name`, `last_name`, `contact`, `email`, `optional_email`, `hall_email`, `hr_email`, `username`, `password`, `accesskey`, `image`, `group_id`, `access_code`, `facebook_uid`, `facebook_accesstoken`, `facebook_tokenexpire`, `status`, `sortorder`, `added_date`, `permission`) VALUES
(1, 'Freelancer Engineers World', '', '', '', 'sunita@longtail.info', 'support@longtail.info', 'support@longtail.info', 'statshakya@gmail.com', 'admin', '32b9da145699ea9058dd7d6669e6bcc5', 'Ui46j8jvhZPoGNLpojmNsSYfH', '', 2, 'IKLxivj8RW', '', '', '2021-04-29 05:40:38', 1, 1, '2014-03-26', 0x613a32313a7b693a303b733a313a2231223b693a313b733a313a2232223b693a323b733a313a2233223b693a333b733a323a223235223b693a343b733a323a223234223b693a353b733a323a223233223b693a363b733a313a2234223b693a373b733a333a22333032223b693a383b733a333a22333033223b693a393b733a313a2235223b693a31303b733a323a223237223b693a31313b733a333a22333030223b693a31323b733a333a22333031223b693a31333b733a323a223131223b693a31343b733a333a22333034223b693a31353b733a323a223137223b693a31363b733a323a223230223b693a31373b733a323a223238223b693a31383b733a323a223132223b693a31393b733a323a223133223b693a32303b733a323a223134223b7d),
(2, 'Super admin', '', '', '', 'support@longtail.info', 'support@longtail.info', 'support@longtail.info', 'support@longtail.info', 'superadmin', '4ef961d430016feab913571a25818e97', '5BnuwlwbgTcJNtbymC8Kmq23e', '', 1, '', '', '', '2023-11-09 10:05:54', 1, 0, '0000-00-00', 0x613a32363a7b693a303b733a323a223734223b693a313b733a313a2231223b693a323b733a333a22333036223b693a333b733a313a2232223b693a343b733a313a2233223b693a353b733a323a223235223b693a363b733a323a223234223b693a373b733a323a223233223b693a383b733a313a2234223b693a393b733a333a22333032223b693a31303b733a333a22333033223b693a31313b733a313a2235223b693a31323b733a323a223237223b693a31333b733a333a22333030223b693a31343b733a333a22333031223b693a31353b733a333a22333035223b693a31363b733a323a223131223b693a31373b733a323a223137223b693a31383b733a333a22333034223b693a31393b733a323a223230223b693a32303b733a323a223139223b693a32313b733a323a223238223b693a32323b733a323a223132223b693a32333b733a323a223133223b693a32343b733a323a223134223b693a32353b733a323a223136223b7d),
(3, 'asdasd', 'asdasd', 'asdasd', '', 'stat@gmail.com', 'stat@gmail.com', 'stat@gmail.com', 'stat@gmail.com', 'asdas', '80c9ef0fb86369cd25f90af27ef53a9e', 'XZtQjE8Rse66xhHG6sSVqzyDZ', '', 3, '', '', '', '0000-00-00 00:00:00', 1, 2, '2024-01-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacency`
--

CREATE TABLE `tbl_vacency` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `post` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `pax` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `archive_date` date DEFAULT NULL,
  `sortorder` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `image` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_vacency`
--

INSERT INTO `tbl_vacency` (`id`, `title`, `post`, `location`, `slug`, `pax`, `content`, `date1`, `date2`, `archive_date`, `sortorder`, `status`, `image`, `type`, `meta_keywords`, `meta_description`, `added_date`) VALUES
(9, 'Asst. Laundry Manager', 'Manager', 'Kathmandu, Nepal', 'asst-laundry-manager', '1', '<p>\r\n	Bachelor</p>\r\n', '0000-00-00', '2023-08-31', '0000-00-00', 1, 1, '', 0, '', '', '2023-08-28 15:12:02'),
(10, 'Painter / Plumber', 'Painter / Plumber', 'Kathmandu, Nepal', 'painter-plumber', '1', '<p>\r\n	<span style=\"color: rgb(71, 61, 53); font-family: Roboto, sans-serif; font-size: 20px; background-color: rgb(247, 246, 246);\">Painter / Plumber</span></p>\r\n', '0000-00-00', '2023-09-22', '0000-00-00', 3, 1, '', 0, '', '', '2023-08-29 11:42:43'),
(12, 'Sales Executive', 'Sales Executive', 'patan', 'sales-executive', '1', '<p>\r\n	asdasd</p>\r\n', '0000-00-00', '2023-09-15', '0000-00-00', 2, 1, '', 0, '', '', '2023-09-03 15:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `source` varchar(200) NOT NULL,
  `url_type` varchar(50) NOT NULL,
  `title` longtext NOT NULL,
  `thumb_image` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `class` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sortorder` int(11) NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_conbined_news`
--
ALTER TABLE `tbl_conbined_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_configs`
--
ALTER TABLE `tbl_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galleries`
--
ALTER TABLE `tbl_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_type`
--
ALTER TABLE `tbl_group_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobtitle`
--
ALTER TABLE `tbl_jobtitle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs_action`
--
ALTER TABLE `tbl_logs_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mainservices`
--
ALTER TABLE `tbl_mainservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nearby`
--
ALTER TABLE `tbl_nearby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer_child`
--
ALTER TABLE `tbl_offer_child`
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `tbl_ota`
--
ALTER TABLE `tbl_ota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package_sub`
--
ALTER TABLE `tbl_package_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room_price`
--
ALTER TABLE `tbl_room_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slideshows_withouttlist`
--
ALTER TABLE `tbl_slideshows_withouttlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_networking`
--
ALTER TABLE `tbl_social_networking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subpackage_images`
--
ALTER TABLE `tbl_subpackage_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vacency`
--
ALTER TABLE `tbl_vacency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_conbined_news`
--
ALTER TABLE `tbl_conbined_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_configs`
--
ALTER TABLE `tbl_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_galleries`
--
ALTER TABLE `tbl_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `tbl_group_type`
--
ALTER TABLE `tbl_group_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jobtitle`
--
ALTER TABLE `tbl_jobtitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2346;

--
-- AUTO_INCREMENT for table `tbl_logs_action`
--
ALTER TABLE `tbl_logs_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mainservices`
--
ALTER TABLE `tbl_mainservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `tbl_nearby`
--
ALTER TABLE `tbl_nearby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ota`
--
ALTER TABLE `tbl_ota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_package_sub`
--
ALTER TABLE `tbl_package_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_popup`
--
ALTER TABLE `tbl_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_room_price`
--
ALTER TABLE `tbl_room_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_slideshow`
--
ALTER TABLE `tbl_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_slideshows_withouttlist`
--
ALTER TABLE `tbl_slideshows_withouttlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_social_networking`
--
ALTER TABLE `tbl_social_networking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_subpackage_images`
--
ALTER TABLE `tbl_subpackage_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vacency`
--
ALTER TABLE `tbl_vacency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
