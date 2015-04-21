-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2015 at 02:37 PM
-- Server version: 5.5.41
-- PHP Version: 5.3.10-1ubuntu3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adamglobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `city_name`) VALUES
(1, 3, 'Pune'),
(2, 3, 'indore'),
(3, 3, 'dehli'),
(4, 3, 'Mumbai'),
(5, 3, 'bhopal');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `country_name`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(10, 'AQ', 'Antarctica'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Ivory Coast'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People''s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'XK', 'Kosovo'),
(116, 'KW', 'Kuwait'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'LA', 'Lao People''s Democratic Republic'),
(119, 'LV', 'Latvia'),
(120, 'LB', 'Lebanon'),
(121, 'LS', 'Lesotho'),
(122, 'LR', 'Liberia'),
(123, 'LY', 'Libyan Arab Jamahiriya'),
(124, 'LI', 'Liechtenstein'),
(125, 'LT', 'Lithuania'),
(126, 'LU', 'Luxembourg'),
(127, 'MO', 'Macau'),
(128, 'MK', 'Macedonia'),
(129, 'MG', 'Madagascar'),
(130, 'MW', 'Malawi'),
(131, 'MY', 'Malaysia'),
(132, 'MV', 'Maldives'),
(133, 'ML', 'Mali'),
(134, 'MT', 'Malta'),
(135, 'MH', 'Marshall Islands'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritania'),
(138, 'MU', 'Mauritius'),
(139, 'TY', 'Mayotte'),
(140, 'MX', 'Mexico'),
(141, 'FM', 'Micronesia, Federated States of'),
(142, 'MD', 'Moldova, Republic of'),
(143, 'MC', 'Monaco'),
(144, 'MN', 'Mongolia'),
(145, 'ME', 'Montenegro'),
(146, 'MS', 'Montserrat'),
(147, 'MA', 'Morocco'),
(148, 'MZ', 'Mozambique'),
(149, 'MM', 'Myanmar'),
(150, 'NA', 'Namibia'),
(151, 'NR', 'Nauru'),
(152, 'NP', 'Nepal'),
(153, 'NL', 'Netherlands'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NC', 'New Caledonia'),
(156, 'NZ', 'New Zealand'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Niger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Norfork Island'),
(162, 'MP', 'Northern Mariana Islands'),
(163, 'NO', 'Norway'),
(164, 'OM', 'Oman'),
(165, 'PK', 'Pakistan'),
(166, 'PW', 'Palau'),
(167, 'PA', 'Panama'),
(168, 'PG', 'Papua New Guinea'),
(169, 'PY', 'Paraguay'),
(170, 'PE', 'Peru'),
(171, 'PH', 'Philippines'),
(172, 'PN', 'Pitcairn'),
(173, 'PL', 'Poland'),
(174, 'PT', 'Portugal'),
(175, 'PR', 'Puerto Rico'),
(176, 'QA', 'Qatar'),
(177, 'RE', 'Reunion'),
(178, 'RO', 'Romania'),
(179, 'RU', 'Russian Federation'),
(180, 'RW', 'Rwanda'),
(181, 'KN', 'Saint Kitts and Nevis'),
(182, 'LC', 'Saint Lucia'),
(183, 'VC', 'Saint Vincent and the Grenadines'),
(184, 'WS', 'Samoa'),
(185, 'SM', 'San Marino'),
(186, 'ST', 'Sao Tome and Principe'),
(187, 'SA', 'Saudi Arabia'),
(188, 'SN', 'Senegal'),
(189, 'RS', 'Serbia'),
(190, 'SC', 'Seychelles'),
(191, 'SL', 'Sierra Leone'),
(192, 'SG', 'Singapore'),
(193, 'SK', 'Slovakia'),
(194, 'SI', 'Slovenia'),
(195, 'SB', 'Solomon Islands'),
(196, 'SO', 'Somalia'),
(197, 'ZA', 'South Africa'),
(198, 'GS', 'South Georgia South Sandwich Islands'),
(199, 'ES', 'Spain'),
(200, 'LK', 'Sri Lanka'),
(201, 'SH', 'St. Helena'),
(202, 'PM', 'St. Pierre and Miquelon'),
(203, 'SD', 'Sudan'),
(204, 'SR', 'Suriname'),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(206, 'SZ', 'Swaziland'),
(207, 'SE', 'Sweden'),
(208, 'CH', 'Switzerland'),
(209, 'SY', 'Syrian Arab Republic'),
(210, 'TW', 'Taiwan'),
(211, 'TJ', 'Tajikistan'),
(212, 'TZ', 'Tanzania, United Republic of'),
(213, 'TH', 'Thailand'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinidad and Tobago'),
(218, 'TN', 'Tunisia'),
(219, 'TR', 'Turkey'),
(220, 'TM', 'Turkmenistan'),
(221, 'TC', 'Turks and Caicos Islands'),
(222, 'TV', 'Tuvalu'),
(223, 'UG', 'Uganda'),
(224, 'UA', 'Ukraine'),
(225, 'AE', 'United Arab Emirates'),
(226, 'GB', 'United Kingdom'),
(227, 'UM', 'United States minor outlying islands'),
(228, 'UY', 'Uruguay'),
(229, 'UZ', 'Uzbekistan'),
(230, 'VU', 'Vanuatu'),
(231, 'VA', 'Vatican City State'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Virgin Islands (British)'),
(235, 'VI', 'Virgin Islands (U.S.)'),
(236, 'WF', 'Wallis and Futuna Islands'),
(237, 'EH', 'Western Sahara'),
(238, 'YE', 'Yemen'),
(239, 'YU', 'Yugoslavia'),
(240, 'ZR', 'Zaire'),
(241, 'ZM', 'Zambia'),
(242, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `doc_file` text NOT NULL,
  `assign_to` int(11) NOT NULL COMMENT '0=publicly  ,  other id is customer_id',
  `search_keyword` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `customer_id`, `title`, `slug`, `budget`, `description`, `doc_file`, `assign_to`, `search_keyword`, `date`, `status`) VALUES
(3, 22, 'Wend', 'Wend_q72gMQwOK20HJMFm', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 27, 'nv', '1427289053', 0),
(4, 14, 'New', 'New_MhAxt9SPsDBSTaHf', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1427289053', 1),
(5, 1, 'Wow', 'Wow_mRbz15ZdtCDHLmDS', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1427289053', 1),
(6, 1, 'Tester', 'Tester_PA6e8Xeb28epoJNx', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1427290977', 1),
(7, 1, 'Checker', 'Checker_gAqjRrDgLeHLaaJx', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1427703934', 1),
(8, 26, 'Mobiles', 'Mobiles_K6rl1A8KFPYYHFMz', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428328343', 1),
(9, 26, 'Frnds', 'Frnds_X67J7sWMMrviqmt1', '25$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'sd dsf', '1428328382', 1),
(10, 26, 'Milk Agency', 'Milk-Agency_3bYER9tMRuCLi9kD', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428328425', 1),
(11, 15, 'News Agency', 'News-Agency_FiOuIwtVOH5i15Np', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428494678', 1),
(12, 26, 'Do check', 'Do-check_8xFQArsVuhWtR7pe', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428564905', 0),
(13, 26, 'How', 'How_qKMAPlPT2YIcw0ls', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428565055', 1),
(14, 26, 'Check', 'Check_xVa9O4hV0KcB44Cd', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428565223', 1),
(15, 15, 'Test', 'Test_Xt9Pyzw2yFZyS6Ai', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428565456', 1),
(16, 15, 'test', 'test_bjmIwgqcHbmMfRzm', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428565477', 1),
(17, 15, 'Query', 'Query_38Q6ZtgyyUeQu39i', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428565978', 1),
(18, 15, 'Php Developer', 'Php-Developer_Ew30VXa7Zi0MBCXW', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428566340', 0),
(19, 26, 'Test title d', 'Test-title-d_s1wZQlOhrDBaePQ5', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 1, 'nv', '1428578419', 1),
(20, 15, 'Test title2', 'Test-title2_RikE3UuQgV2LZLUj', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'NsV36CLwDU3vLllG.jpg', 0, 'nv', '1428579144', 1),
(21, 26, 'Test title', 'Test-title_HLO2M0Y8f0GOVU5K', '241$', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '["3nXv2ynDaq8jaD27.jpg","xYS2LoF0GQKuDsK4.jpg"]', 15, 'nv,fghfg', '1428662457', 1),
(22, 26, 'cvbcbcvb', 'cvbcbcvb_5b5LxjtvP7uKCbY0', 'cbv', '<p>cvbc fdg d</p>', '["DcNcNOxs1PMpBe0H.jpg","zNVvMf6mHCksDZ7G.jpg","gzLLyad0Uz4qhBfH.docx"]', 0, 'purple', '1429022473', 1),
(23, 1, 'sfd', 'sfd_wm7p1kiFMdglEaCE', 'fdsfsfs', '<p>sfdfds dsfsd</p>', '', 26, 'dsffs,df,s', '1429079260', 1),
(24, 26, 'dsad', 'dsadpHZw49zoKcdPbxqK', 'dasdas', '<p>dasdas<br/></p>', '', 14, 'dsada', '1429108855', 1),
(25, 26, 'Test New deal', 'Test-New-dealDIhNOiY4lfOmBj6y', '200 $', '<p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised <br/></p>', 'MZ0qVzdck7nUYHlP.jpg', 1, 'asd,as,d,as', '1429256247', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deal_files`
--

CREATE TABLE IF NOT EXISTS `deal_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deal_files`
--

INSERT INTO `deal_files` (`id`, `deal_id`, `file_name`) VALUES
(1, 22, '4P1RKrMGVCFKTkwo.jpg'),
(2, 22, 'xULDiYLoV7kHvwIS.jpg'),
(4, 23, 'CNlketIlMmZW5X1y.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(50) NOT NULL,
  `g_status` int(11) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`g_id`, `g_name`, `g_status`) VALUES
(1, 'admin', 1),
(2, 'city_admin', 1),
(3, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Its a message sender id',
  `reciver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `delete` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `deal_id`, `user_id`, `reciver_id`, `subject`, `message`, `date`, `status`, `delete`) VALUES
(1, 7, 26, 1, '', 'dfgdf gdfg', '1428066693', 0, 1),
(2, 0, 1, 26, '', '<p>Hello Eevetry One</p>\n\n<p>how are you</p>', '1428135692', 0, 1),
(3, 3, 26, 22, '', 'sdcssdc', '1428140754', 1, 1),
(4, 3, 26, 22, '', 'sdcsdc', '1428140756', 1, 1),
(5, 0, 26, 1, '', 'test Message section', '1428303675', 0, 1),
(6, 0, 26, 22, '', 'gbhfghgf hfgh fgh', '1428304281', 1, 1),
(7, 0, 26, 1, '', 'dfgdg', '1428304977', 0, 1),
(8, 0, 26, 28, '', 'Hello Hii', '1428307709', 1, 1),
(9, 0, 26, 22, '', 'dfgdfg', '1428307740', 1, 1),
(10, 0, 26, 20, '', 'vvxcv cx', '1428307758', 1, 1),
(11, 0, 26, 26, '', 'vdfvdfv', '1428307796', 0, 1),
(12, 0, 26, 26, '', 'dfvfdv', '1428307797', 0, 1),
(13, 0, 26, 1, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus', '1428307865', 0, 1),
(14, 0, 26, 1, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus', '1428307879', 0, 1),
(15, 0, 26, 15, '', 'vdvsd vdsv sdv\nds \nvds', '1428308831', 1, 1),
(16, 0, 26, 1, '', 'sddsvsd', '1428308847', 0, 1),
(17, 0, 26, 1, '', 'nfgnfgn', '1428308898', 0, 1),
(18, 0, 26, 1, '', 'vcbcvb', '1428308904', 0, 1),
(19, 0, 26, 20, '', 'dbffdbdfb', '1428308932', 1, 1),
(20, 0, 26, 15, 'dfgd', 'fgdfgdf', '1428308961', 1, 1),
(21, 0, 26, 26, '0', 'sdfsdfsd', '1428313073', 0, 1),
(22, 0, 26, 26, 'dfgdf', 'gdfgdf', '1428313165', 0, 1),
(23, 0, 26, 26, 'fdgdfdfg', 'ddfg', '1428313190', 0, 1),
(24, 3, 26, 22, 'sfsff sfd sfsd ds', 'sdfdsf sdfsfdsfdsf sd', '1428314471', 1, 1),
(25, 3, 26, 22, 'xvc', 'vxvxc', '1428314498', 1, 1),
(26, 3, 26, 22, 'sdfsdf', 'sdfdsfds sdf sdfsfs', '1428314525', 1, 1),
(27, 3, 14, 22, 'asda', 'dadasd', '1428315025', 1, 1),
(28, 0, 26, 26, 'This is to test', 'hi this is to test', '1428393596', 0, 1),
(29, 0, 26, 26, 'erterr', 'er ert', '1428395357', 0, 1),
(30, 5, 26, 1, 'hiiiii', 'uibubkj kjnkj kjk jkjnbik', '1428398133', 0, 1),
(31, 0, 26, 1, '........................', '.................', '1428398308', 0, 1),
(32, 0, 26, 1, 'y', 'rtyryrt', '1428403529', 0, 1),
(33, 0, 15, 26, 'sdfsdf', 'sdfsd', '1428494306', 0, 1),
(34, 0, 26, 15, 'dfgdfgdf', 'dfgdfg', '1428496565', 1, 1),
(35, 0, 26, 15, 'this is my reply', 'replied message', '1428820852', 1, 1),
(36, 7, 26, 1, 'acasc', 'ascasc', '1428929061', 0, 1),
(37, 0, 1, 20, '', '<p>adf asd asdaknd asd</p>', '1428992098', 1, 1),
(38, 0, 15, 20, 'vbbvbc', 'cvbc vcb vcbcv', '1428992713', 1, 1),
(39, 9, 26, 26, 'dfgdfg dfg', 'dfg dfgdf', '1428993050', 0, 1),
(40, 23, 26, 1, 'da', 'dsa', '1429093805', 0, 1),
(41, 0, 26, 14, 'fgdfgdg', 'dfgdfgdf', '1429103039', 0, 1),
(42, 23, 26, 1, 'dad', 'dada', '1429104984', 0, 1),
(43, 23, 26, 1, 'dfbdfdb', 'vsdvsvvds', '1429105048', 0, 1),
(44, 13, 14, 26, 'nvbn', 'vbnvbn', '1429109125', 0, 1),
(45, 20, 14, 15, 'rty', 'rty tr yry', '1429109206', 1, 1),
(46, 13, 14, 26, 'dfg', 'dfg', '1429109310', 0, 1),
(47, 0, 26, 1, '54', 'hfg', '1429167053', 0, 1),
(48, 0, 26, 14, 'kamlesh', 'fjksdj fksj fksj', '1429171602', 1, 1),
(49, 23, 26, 1, 'cvbc', 'cvbcv', '1429172115', 0, 1),
(50, 0, 26, 14, 'New Message', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1429176772', 1, 1),
(51, 0, 26, 14, 'Again NEaew', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1429176852', 1, 1),
(52, 23, 26, 1, 'dsasd', 'ad asd', '1429183629', 0, 1),
(53, 23, 26, 1, 'Again NEaew', 'ccc', '1429185776', 0, 1),
(54, 0, 26, 1, 'tgf', 'gdfgdfg', '1429186548', 0, 1),
(55, 0, 26, 14, 'ssad', 'dsadad', '1429186631', 1, 1),
(56, 0, 26, 14, 'sgsdg', 'sgds', '1429186658', 1, 1),
(57, 0, 26, 14, 'xcvx', 'vxvcxcv', '1429194442', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `query` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `deal_id`, `user_id`, `query`, `date`, `status`) VALUES
(1, 13, 14, 'dfg dfgdfgdfg df', '1429109287', 0),
(2, 4, 26, 'dsa da asd', '1429110120', 0),
(3, 4, 26, 'acacas sacac casa ca asc', '1429164954', 0),
(4, 23, 26, 'cxvxcv', '1429171878', 0),
(5, 23, 26, 'sdfdsf', '1429171904', 0),
(6, 23, 26, 'cvbcb', '1429172104', 0),
(7, 23, 26, 'gg', '1429172139', 0),
(8, 23, 26, 'New Query In my side', '1429183625', 0);

-- --------------------------------------------------------

--
-- Table structure for table `query_response`
--

CREATE TABLE IF NOT EXISTS `query_response` (
  `response_id` int(11) NOT NULL AUTO_INCREMENT,
  `query_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`response_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `query_response`
--

INSERT INTO `query_response` (`response_id`, `query_id`, `user_id`, `response`, `date`, `status`) VALUES
(1, 1, 26, 'fgd gd dfg dfg dfgdfg dgdfgd', '1429109298', 0),
(2, 1, 26, 'fghfhh fghfh', '1429109332', 0),
(3, 3, 14, 'dgf dgdfgdfgdfg df', '1429164974', 0),
(4, 3, 26, 'dbf dg dgf', '1429164987', 0),
(5, 3, 26, 'dbdfbdfbd bdfbg', '1429164997', 0),
(6, 3, 26, 'dfgdfgdf', '1429165028', 0),
(7, 3, 14, 'dbdfbfdbd', '1429165044', 0),
(8, 3, 26, 'fghfh fg', '1429165058', 0),
(9, 1, 26, 'sa', '1429172161', 1),
(10, 6, 1, 'xcvxv', '1429177865', 0),
(11, 6, 26, 'bcvbcv', '1429177880', 1),
(12, 6, 26, 'bfgfg', '1429183543', 1),
(13, 6, 26, 'asdadas', '1429183638', 1),
(14, 6, 26, 'Nice thankyou', '1429183726', 1),
(15, 6, 26, 'dfgfd dfg', '1429183737', 1),
(16, 6, 26, 'ss', '1429183766', 1),
(17, 6, 26, 'dfg', '1429184198', 1),
(18, 1, 26, 'fgfgd', '1429184202', 1),
(19, 1, 26, 'gdfgdf', '1429184316', 1),
(20, 1, 26, 'gdfgdf', '1429184320', 1),
(21, 1, 26, 'd', '1429184339', 1),
(22, 1, 26, 'fsdf', '1429184382', 1),
(23, 6, 26, 'dfgdf', '1429186431', 1),
(24, 6, 26, 'dfgdf', '1429186436', 1),
(25, 6, 26, '5475454564554', '1429186442', 1),
(26, 6, 26, 'dfgfdgdfg', '1429186523', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_group` int(11) NOT NULL DEFAULT '2',
  `u_status` tinyint(1) NOT NULL DEFAULT '1',
  `approval` int(11) NOT NULL,
  `u_delete` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_password`, `u_group`, `u_status`, `approval`, `u_delete`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0, 1),
(14, 'denJohn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 0, 1, 1),
(15, 'Johnmark@gmail.com', '7db23e43298847bc9b993411f7bd8fd3', 3, 1, 1, 0),
(20, 'mark@gmail.com', '2cdaf9216530032c197a0baaa4f8f37b', 3, 0, 1, 1),
(22, 'test@gmail.com', '32593720dd7ab121b680144a5002a973', 2, 1, 1, 1),
(26, 'amit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 1, 1, 1),
(27, 'signup@gmail.com', '770147e3453e4c2f63a26d1a4784c0d4', 3, 0, 1, 1),
(28, 'sd@fdss.com', '5261c7e023186006bc56c3360ecad5f7', 3, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_u_id` int(11) NOT NULL,
  `comp_person_name` varchar(20) NOT NULL,
  `comp_person_position` varchar(20) NOT NULL,
  `comp_person_gender` varchar(20) NOT NULL,
  `comp_person_image` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_city` varchar(255) NOT NULL,
  `comp_country` varchar(255) NOT NULL,
  `comp_zipcode` varchar(255) NOT NULL,
  `comp_phone` varchar(255) NOT NULL,
  `comp_fax` varchar(255) NOT NULL,
  `comp_email` varchar(255) NOT NULL,
  `comp_website` varchar(255) NOT NULL,
  `comp_person_phone` varchar(255) NOT NULL,
  `comp_managing_person_Title` varchar(255) NOT NULL,
  `comp_managing_person_name` varchar(255) NOT NULL,
  `comp_services` text NOT NULL,
  `comp_target_market` text NOT NULL,
  `comp_territories` varchar(255) NOT NULL,
  `comp_strength` text NOT NULL,
  `content_office_opened` varchar(255) NOT NULL,
  `comp_employees` varchar(255) NOT NULL,
  `comp_partners` varchar(255) NOT NULL,
  `comp_yearly_turnover` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_u_id` (`p_u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `p_u_id`, `comp_person_name`, `comp_person_position`, `comp_person_gender`, `comp_person_image`, `comp_name`, `comp_address`, `comp_city`, `comp_country`, `comp_zipcode`, `comp_phone`, `comp_fax`, `comp_email`, `comp_website`, `comp_person_phone`, `comp_managing_person_Title`, `comp_managing_person_name`, `comp_services`, `comp_target_market`, `comp_territories`, `comp_strength`, `content_office_opened`, `comp_employees`, `comp_partners`, `comp_yearly_turnover`) VALUES
(1, 1, 'Jamie', 'Smith', 'male', 'http://103.21.53.250/adamglobal/uploads/profile/55rxrAmLqFXarecK.jpg', '', '', '5', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 14, 'DenJohn', '', 'Mr.', '', 'sdfds', 'sdfsdf', '5', '3', 'sdf', 'sdfsd', 'dsfsd', 'sdfs@dfsf.com', 'fdsds', 'sdfsdf', 'Mr.', 'dsfsd', 'sdf', 'sfd', 'sdf', 'sdfs', 'sdf', 'sdff', '', 'sdfsd'),
(8, 15, 'Johnmark', 'sfsd', 'Mr.', '', 'amie', 'sfsdf', '5', '3', 'dsf', 'sdfsd', '', 'sdfs@dfsf.com', '', '3212', '--Please Select--', '', 'ds', 'asd', 'asd', 'asd', 'asa', 'sda', '', 'dsad'),
(13, 20, 'mark', '', '', 'http://103.21.53.250/adamglobal/uploads/profile/uV6sic28FQ5QFLHm.jpeg', '', '', '5', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 26, 'Amit Test', 'Sr Developer', 'Mr.', 'http://103.21.53.250/adamglobal/uploads/profile/uV6sic28FQ5QFLHm.jpeg', 'Test Comapny', 'test Address', '4', '3', '1255', '987654321', '147', 'test@gmail.com', 'http://103.21.53.250/adamglobal', '147852369', 'Mr.', 'Test mange', 'Please provide a brief description of the services provided by your companyPlease provide a brief description of the services provided by your company', 'Please provide a brief description of the services provided by your companyPlease provide a brief description of the services provided by your company', 'cover Test', 'What are the strengths and qualities of your company? *What are the strengths and qualities of your company? *', '2015/10/10', '1200', '', ''),
(17, 22, 'Johnmark', 'amit1@gmail.com', 'Mr.', 'http://103.21.53.250/adamglobal/uploads/profile/55rxrAmLqFXarecK.jpg', 'amit', 'amit', '2', '3', 'amit', '125487', '', 'amit1@gmail.com', '', '3211', 'Mr.', 'amit1@gmail.com', 'amit1@gmail.com', 'amit1@gmail.com', 'amit1@gmail.com', 'amit1@gmail.com', 'amit1@gmail.com', 'amit1@gmail.com', '', 'amit1@gmail.com'),
(18, 27, 'signup', 'signup', 'Mr.', '', 'signup', 'signup', '3', '3', 'signup', '121', '3', 'signup@sdfs.com', '', '15256', 'Mr.', 'signup@gmail.com', 'signup@gmail.com', 'signup@gmail.com', 'signup@gmail.com', 'signup@gmail.com', 'signup@gmail.com', 'signup@gmail.com', '', 'signup@gmail.com'),
(19, 28, 'sd@fdss.com', 'sd@fdss.com', 'Mr.', '', 'sd@fdss.com', 'sd@fdss.com', '2', '3', 'sd@fdss.com', '545641', '', 'sd@fdss.com', '', '156156', 'Mr.', 'sd@fdss.com', 'sd@fdss.com', 'sd@fdss.com', 'sd@fdss.com', 'sd@fdss.com', '', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`p_u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
