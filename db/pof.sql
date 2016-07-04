-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2016 at 06:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testpof`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `addressId` int(12) NOT NULL AUTO_INCREMENT,
  `entityId` int(12) NOT NULL,
  `stateId` int(12) NOT NULL,
  `districtId` int(12) NOT NULL,
  `cityId` int(12) NOT NULL,
  `addressLine1` varchar(200) NOT NULL,
  `addressLine2` varchar(200) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addressType` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addressId`, `entityId`, `stateId`, `districtId`, `cityId`, `addressLine1`, `addressLine2`, `deleted`, `status`, `created_at`, `updated_at`, `addressType`, `description`) VALUES
(1, 1, 18, 0, 0, 'kalwar road ', '', 0, 0, '2016-07-02 05:01:30', '2016-07-02 05:01:30', '', ''),
(2, 2, 12, 0, 0, 'Mandha Bhim Singh', '', 0, 0, '2016-07-02 05:08:44', '2016-07-02 05:08:44', '', ''),
(3, 3, 18, 0, 0, 'Mandha Bhim Singh', '', 0, 0, '2016-07-02 05:09:54', '2016-07-02 05:09:54', '', ''),
(4, 4, 15, 0, 0, 'Sindoli', '', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44', '', ''),
(5, 5, 27, 0, 0, 'Mandha Bhim Singh', '', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26', '', ''),
(6, 6, 31, 0, 0, 'Mandha Bhim Singh', '', 0, 0, '2016-07-02 05:12:18', '2016-07-02 05:12:18', '', ''),
(7, 7, 16, 0, 0, 'Mandha Bhim Singh', '', 0, 0, '2016-07-02 05:48:16', '2016-07-02 05:48:16', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(8) NOT NULL DEFAULT '0',
  `state_id` int(8) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`) VALUES
(1, 1, 'North Andaman'),
(2, 1, 'South Andaman'),
(3, 1, 'Nicobar'),
(4, 2, 'Adilabad'),
(5, 2, 'Anantapur'),
(6, 2, 'Chittoor'),
(7, 2, 'East Godavari'),
(8, 2, 'Guntur'),
(9, 2, 'Hyderabad'),
(10, 2, 'Karimnagar'),
(11, 2, 'Khammam'),
(12, 2, 'Krishna'),
(13, 2, 'Kurnool'),
(14, 2, 'Mahbubnagar'),
(15, 2, 'Medak'),
(16, 2, 'Nalgonda'),
(17, 2, 'Nizamabad'),
(18, 2, 'Prakasam'),
(19, 2, 'Ranga Reddy'),
(20, 2, 'Srikakulam'),
(21, 2, 'Sri Potti Sri Ramulu Nellore'),
(22, 2, 'Vishakhapatnam'),
(23, 2, 'Vizianagaram'),
(24, 2, 'Warangal'),
(25, 2, 'West Godavari'),
(26, 2, 'Cudappah'),
(27, 3, 'Anjaw'),
(28, 3, 'Changlang'),
(29, 3, 'East Siang'),
(30, 3, 'East Kameng'),
(31, 3, 'Kurung Kumey'),
(32, 3, 'Lohit'),
(33, 3, 'Lower Dibang Valley'),
(34, 3, 'Lower Subansiri'),
(35, 3, 'Papum Pare'),
(36, 3, 'Tawang'),
(37, 3, 'Tirap'),
(38, 3, 'Dibang Valley'),
(39, 3, 'Upper Siang'),
(40, 3, 'Upper Subansiri'),
(41, 3, 'West Kameng'),
(42, 3, 'West Siang'),
(43, 4, 'Baksa'),
(44, 4, 'Barpeta'),
(45, 4, 'Bongaigaon'),
(46, 4, 'Cachar'),
(47, 4, 'Chirang'),
(48, 4, 'Darrang'),
(49, 4, 'Dhemaji'),
(50, 4, 'Dima Hasao'),
(51, 4, 'Dhubri'),
(52, 4, 'Dibrugarh'),
(53, 4, 'Goalpara'),
(54, 4, 'Golaghat'),
(55, 4, 'Hailakandi'),
(56, 4, 'Jorhat'),
(57, 4, 'Kamrup'),
(58, 4, 'Kamrup Metropolitan'),
(59, 4, 'Karbi Anglong'),
(60, 4, 'Karimganj'),
(61, 4, 'Kokrajhar'),
(62, 4, 'Lakhimpur'),
(63, 4, 'Morigaon'),
(64, 4, 'Nagaon'),
(65, 4, 'Nalbari'),
(66, 4, 'Sivasagar'),
(67, 4, 'Sonitpur'),
(68, 4, 'Tinsukia'),
(69, 4, 'Udalguri'),
(70, 5, 'Araria'),
(71, 5, 'Arwal'),
(72, 5, 'Aurangabad'),
(73, 5, 'Banka'),
(74, 5, 'Begusarai'),
(75, 5, 'Bhagalpur'),
(76, 5, 'Bhojpur'),
(77, 5, 'Buxar'),
(78, 5, 'Darbhanga'),
(79, 5, 'East Champaran'),
(80, 5, 'Gaya'),
(81, 5, 'Gopalganj'),
(82, 5, 'Jamui'),
(83, 5, 'Jehanabad'),
(84, 5, 'Kaimur'),
(85, 5, 'Katihar'),
(86, 5, 'Khagaria'),
(87, 5, 'Kishanganj'),
(88, 5, 'Lakhisarai'),
(89, 5, 'Madhepura'),
(90, 5, 'Madhubani'),
(91, 5, 'Munger'),
(92, 5, 'Muzaffarpur'),
(93, 5, 'Nalanda'),
(94, 5, 'Nawada'),
(95, 5, 'Patna'),
(96, 5, 'Purnia'),
(97, 5, 'Rohtas'),
(98, 5, 'Saharsa'),
(99, 5, 'Samastipur'),
(100, 5, 'Saran'),
(101, 5, 'Sheikhpura'),
(102, 5, 'Sheohar'),
(103, 5, 'Sitamarhi'),
(104, 5, 'Siwan'),
(105, 5, 'Supaul'),
(106, 6, 'Chandigarh'),
(107, 7, 'Bastar'),
(108, 7, 'Bijapur'),
(109, 7, 'Bilaspur'),
(110, 7, 'Dantewada'),
(111, 7, 'Dhamtari'),
(112, 7, 'Durg'),
(113, 7, 'Jashpur'),
(114, 7, 'Janjgir-Champa'),
(115, 7, 'Korba'),
(116, 7, 'Koriya'),
(117, 7, 'Kanker'),
(118, 7, 'Kabirdham (formerly Kawardha)'),
(119, 7, 'Mahasamund'),
(120, 7, 'Narayanpur'),
(121, 7, 'Raigarh'),
(122, 7, 'Rajnandgaon'),
(123, 7, 'Raipur'),
(124, 7, 'Surguja'),
(125, 8, 'Dadra and Nagar Haveli'),
(126, 9, 'Daman'),
(127, 9, 'Diu'),
(128, 10, 'Central Delhi'),
(129, 10, 'East Delhi'),
(130, 10, 'New Delhi'),
(131, 10, 'North Delhi'),
(132, 10, 'North East Delhi'),
(133, 10, 'North West Delhi'),
(134, 10, 'South Delhi'),
(135, 10, 'South West Delhi'),
(136, 10, 'West Delhi'),
(137, 11, 'North Goa'),
(138, 11, 'South Goa'),
(139, 12, 'Ahmedabad'),
(140, 12, 'Amreli district'),
(141, 12, 'Anand'),
(142, 12, 'Banaskantha'),
(143, 12, 'Bharuch'),
(144, 12, 'Bhavnagar'),
(145, 12, 'Dahod'),
(146, 12, 'The Dangs'),
(147, 12, 'Gandhinagar'),
(148, 12, 'Jamnagar'),
(149, 12, 'Junagadh'),
(150, 12, 'Kutch'),
(151, 12, 'Kheda'),
(152, 12, 'Mehsana'),
(153, 12, 'Narmada'),
(154, 12, 'Navsari'),
(155, 12, 'Patan'),
(156, 12, 'Panchmahal'),
(157, 12, 'Porbandar'),
(158, 12, 'Rajkot'),
(159, 12, 'Sabarkantha'),
(160, 12, 'Surendranagar'),
(161, 12, 'Surat'),
(162, 12, 'Tapi'),
(163, 12, 'Vadodara'),
(164, 12, 'Valsad'),
(165, 13, 'Ambala'),
(166, 13, 'Bhiwani'),
(167, 13, 'Faridabad'),
(168, 13, 'Fatehabad'),
(169, 13, 'Gurgaon'),
(170, 13, 'Hissar'),
(171, 13, 'Jhajjar'),
(172, 13, 'Jind'),
(173, 13, 'Karnal'),
(174, 13, 'Kaithal'),
(175, 13, 'Kurukshetra'),
(176, 13, 'Mahendragarh'),
(177, 13, 'Mewat'),
(178, 13, 'Palwal'),
(179, 13, 'Panchkula'),
(180, 13, 'Panipat'),
(181, 13, 'Rewari'),
(182, 13, 'Rohtak'),
(183, 13, 'Sirsa'),
(184, 13, 'Sonipat'),
(185, 13, 'Yamuna Nagar'),
(186, 14, 'Bilaspur'),
(187, 14, 'Chamba'),
(188, 14, 'Hamirpur'),
(189, 14, 'Kangra'),
(190, 14, 'Kinnaur'),
(191, 14, 'Kullu'),
(192, 14, 'Lahaul and Spiti'),
(193, 14, 'Mandi'),
(194, 14, 'Shimla'),
(195, 14, 'Sirmaur'),
(196, 14, 'Solan'),
(197, 14, 'Una'),
(198, 15, 'Anantnag'),
(199, 15, 'Badgam'),
(200, 15, 'Bandipora'),
(201, 15, 'Baramulla'),
(202, 15, 'Doda'),
(203, 15, 'Ganderbal'),
(204, 15, 'Jammu'),
(205, 15, 'Kargil'),
(206, 15, 'Kathua'),
(207, 15, 'Kishtwar'),
(208, 15, 'Kupwara'),
(209, 15, 'Kulgam'),
(210, 15, 'Leh'),
(211, 15, 'Poonch'),
(212, 15, 'Pulwama'),
(213, 15, 'Rajouri'),
(214, 15, 'Ramban'),
(215, 15, 'Reasi'),
(216, 15, 'Samba'),
(217, 15, 'Shopian'),
(218, 15, 'Srinagar'),
(219, 15, 'Udhampur'),
(220, 16, 'Bokaro'),
(221, 16, 'Chatra'),
(222, 16, 'Deoghar'),
(223, 16, 'Dhanbad'),
(224, 16, 'Dumka'),
(225, 16, 'East Singhbhum'),
(226, 16, 'Garhwa'),
(227, 16, 'Giridih'),
(228, 16, 'Godda'),
(229, 16, 'Gumla'),
(230, 16, 'Hazaribag'),
(231, 16, 'Jamtara'),
(232, 16, 'Khunti'),
(233, 16, 'Koderma'),
(234, 16, 'Latehar'),
(235, 16, 'Lohardaga'),
(236, 16, 'Pakur'),
(237, 16, 'Palamu'),
(238, 16, 'Ramgarh'),
(239, 16, 'Ranchi'),
(240, 16, 'Sahibganj'),
(241, 16, 'Seraikela Kharsawan'),
(242, 16, 'Simdega'),
(243, 16, 'West Singhbhum'),
(244, 17, 'Bagalkot'),
(245, 17, 'Bangalore Rural'),
(246, 17, 'Bangalore Urban'),
(247, 17, 'Belgaum'),
(248, 17, 'Bellary'),
(249, 17, 'Bidar'),
(250, 17, 'Bijapur'),
(251, 17, 'Chamarajnagar'),
(252, 17, 'Chikkamagaluru'),
(253, 17, 'Chikkaballapur'),
(254, 17, 'Chitradurga'),
(255, 17, 'Davanagere'),
(256, 17, 'Dharwad'),
(257, 17, 'Dakshina Kannada'),
(258, 17, 'Gadag'),
(259, 17, 'Gulbarga'),
(260, 17, 'Hassan'),
(261, 17, 'Haveri district'),
(262, 17, 'Kodagu'),
(263, 17, 'Kolar'),
(264, 17, 'Koppal'),
(265, 17, 'Mandya'),
(266, 17, 'Mysore'),
(267, 17, 'Raichur'),
(268, 17, 'Shimoga'),
(269, 17, 'Tumkur'),
(270, 17, 'Udupi'),
(271, 17, 'Uttara Kannada'),
(272, 17, 'Ramanagara'),
(273, 17, 'Yadgir'),
(274, 18, 'Alappuzha'),
(275, 18, 'Ernakulam'),
(276, 18, 'Idukki'),
(277, 18, 'Kannur'),
(278, 18, 'Kasaragod'),
(279, 18, 'Kollam'),
(280, 18, 'Kottayam'),
(281, 18, 'Kozhikode'),
(282, 18, 'Malappuram'),
(283, 18, 'Palakkad'),
(284, 18, 'Pathanamthitta'),
(285, 18, 'Thrissur'),
(286, 18, 'Thiruvananthapuram'),
(287, 18, 'Wayanad'),
(288, 19, 'Lakshadweep'),
(289, 20, 'Agar'),
(290, 20, 'Alirajpur'),
(291, 20, 'Anuppur'),
(292, 20, 'Ashok Nagar'),
(293, 20, 'Balaghat'),
(294, 20, 'Barwani'),
(295, 20, 'Betul'),
(296, 20, 'Bhind'),
(297, 20, 'Bhopal'),
(298, 20, 'Burhanpur'),
(299, 20, 'Chhatarpur'),
(300, 20, 'Chhindwara'),
(301, 20, 'Damoh'),
(302, 20, 'Datia'),
(303, 20, 'Dewas'),
(304, 20, 'Dhar'),
(305, 20, 'Dindori'),
(306, 20, 'Guna'),
(307, 20, 'Gwalior'),
(308, 20, 'Harda'),
(309, 20, 'Hoshangabad'),
(310, 20, 'Indore'),
(311, 20, 'Jabalpur'),
(312, 20, 'Jhabua'),
(313, 20, 'Katni'),
(314, 20, 'Khandwa (East Nimar)'),
(315, 20, 'Khargone (West Nimar)'),
(316, 20, 'Mandla'),
(317, 20, 'Mandsaur'),
(318, 20, 'Morena'),
(319, 20, 'Narsinghpur'),
(320, 20, 'Neemuch'),
(321, 20, 'Panna'),
(322, 20, 'Raisen'),
(323, 20, 'Rajgarh'),
(324, 20, 'Ratlam'),
(325, 20, 'Rewa'),
(326, 20, 'Sagar'),
(327, 20, 'Satna'),
(328, 20, 'Sehore'),
(329, 20, 'Seoni'),
(330, 20, 'Shahdol'),
(331, 20, 'Shajapur'),
(332, 20, 'Sheopur'),
(333, 20, 'Shivpuri'),
(334, 20, 'Sidhi'),
(335, 20, 'Singrauli'),
(336, 20, 'Tikamgarh'),
(337, 20, 'Ujjain'),
(338, 20, 'Umaria'),
(339, 20, 'Vidisha'),
(340, 21, 'Ahmednagar'),
(341, 21, 'Akola'),
(342, 21, 'Amravati'),
(343, 21, 'Aurangabad'),
(344, 21, 'Beed'),
(345, 21, 'Bhandara'),
(346, 21, 'Buldhana'),
(347, 21, 'Chandrapur'),
(348, 21, 'Dhule'),
(349, 21, 'Gadchiroli'),
(350, 21, 'Gondia'),
(351, 21, 'Hingoli'),
(352, 21, 'Jalgaon'),
(353, 21, 'Jalna'),
(354, 21, 'Kolhapur'),
(355, 21, 'Latur'),
(356, 21, 'Mumbai City'),
(357, 21, 'Mumbai suburban'),
(358, 21, 'Nanded'),
(359, 21, 'Nandurbar'),
(360, 21, 'Nagpur'),
(361, 21, 'Nashik'),
(362, 21, 'Osmanabad'),
(363, 21, 'Parbhani'),
(364, 21, 'Pune'),
(365, 21, 'Raigad'),
(366, 21, 'Ratnagiri'),
(367, 21, 'Sangli'),
(368, 21, 'Satara'),
(369, 21, 'Sindhudurg'),
(370, 21, 'Solapur'),
(371, 21, 'Thane'),
(372, 21, 'Wardha'),
(373, 21, 'Washim'),
(374, 21, 'Yavatmal'),
(375, 22, 'Bishnupur'),
(376, 22, 'Churachandpur'),
(377, 22, 'Chandel'),
(378, 22, 'Imphal East'),
(379, 22, 'Senapati'),
(380, 22, 'Tamenglong'),
(381, 22, 'Thoubal'),
(382, 22, 'Ukhrul'),
(383, 22, 'Imphal West'),
(384, 23, 'East Garo Hills'),
(385, 23, 'East Khasi Hills'),
(386, 23, 'Jaintia Hills'),
(387, 23, 'Ri Bhoi'),
(388, 23, 'South Garo Hills'),
(389, 23, 'West Garo Hills'),
(390, 23, 'West Khasi Hills'),
(391, 24, 'Aizawl'),
(392, 24, 'Champhai'),
(393, 24, 'Kolasib'),
(394, 24, 'Lawngtlai'),
(395, 24, 'Lunglei'),
(396, 24, 'Mamit'),
(397, 24, 'Saiha'),
(398, 24, 'Serchhip'),
(399, 25, 'Dimapur'),
(400, 25, 'Kiphire'),
(401, 25, 'Kohima'),
(402, 25, 'Longleng'),
(403, 25, 'Mokokchung'),
(404, 25, 'Mon'),
(405, 25, 'Peren'),
(406, 25, 'Phek'),
(407, 25, 'Tuensang'),
(408, 25, 'Wokha'),
(409, 25, 'Zunheboto'),
(410, 26, 'Angul'),
(411, 26, 'Boudh (Bauda)'),
(412, 26, 'Bhadrak'),
(413, 26, 'Balangir'),
(414, 26, 'Bargarh (Baragarh)'),
(415, 26, 'Balasore'),
(416, 26, 'Cuttack'),
(417, 26, 'Debagarh (Deogarh)'),
(418, 26, 'Dhenkanal'),
(419, 26, 'Ganjam'),
(420, 26, 'Gajapati'),
(421, 26, 'Jharsuguda'),
(422, 26, 'Jajpur'),
(423, 26, 'Jagatsinghpur'),
(424, 26, 'Khordha'),
(425, 26, 'Kendujhar (Keonjhar)'),
(426, 26, 'Kalahandi'),
(427, 26, 'Kandhamal'),
(428, 26, 'Koraput'),
(429, 26, 'Kendrapara'),
(430, 26, 'Malkangiri'),
(431, 26, 'Mayurbhanj'),
(432, 26, 'Nabarangpur'),
(433, 26, 'Nuapada'),
(434, 26, 'Nayagarh'),
(435, 26, 'Puri'),
(436, 26, 'Rayagada'),
(437, 26, 'Sambalpur'),
(438, 26, 'Subarnapur (Sonepur)'),
(439, 26, 'Sundergarh'),
(440, 27, 'Karaikal'),
(441, 27, 'Mahe'),
(442, 27, 'Pondicherry'),
(443, 27, 'Yanam'),
(444, 28, 'Amritsar'),
(445, 28, 'Barnala'),
(446, 28, 'Bathinda'),
(447, 28, 'Firozpur'),
(448, 28, 'Faridkot'),
(449, 28, 'Fatehgarh Sahib'),
(450, 28, 'Fazilka[6]'),
(451, 28, 'Gurdaspur'),
(452, 28, 'Hoshiarpur'),
(453, 28, 'Jalandhar'),
(454, 28, 'Kapurthala'),
(455, 28, 'Ludhiana'),
(456, 28, 'Mansa'),
(457, 28, 'Moga'),
(458, 28, 'Sri Muktsar Sahib'),
(459, 28, 'Pathankot'),
(460, 28, 'Patiala'),
(461, 28, 'Rupnagar'),
(462, 28, 'Ajitgarh (Mohali)'),
(463, 28, 'Sangrur'),
(464, 28, 'Shahid Bhagat Singh Nagar'),
(465, 28, 'Tarn Taran'),
(466, 29, 'Ajmer'),
(467, 29, 'Alwar'),
(468, 29, 'Bikaner'),
(469, 29, 'Barmer'),
(470, 29, 'Banswara'),
(471, 29, 'Bharatpur'),
(472, 29, 'Baran'),
(473, 29, 'Bundi'),
(474, 29, 'Bhilwara'),
(475, 29, 'Churu'),
(476, 29, 'Chittorgarh'),
(477, 29, 'Dausa'),
(478, 29, 'Dholpur'),
(479, 29, 'Dungapur'),
(480, 29, 'Ganganagar'),
(481, 29, 'Hanumangarh'),
(482, 29, 'Jhunjhunu'),
(483, 29, 'Jalore'),
(484, 29, 'Jodhpur'),
(485, 29, 'Jaipur'),
(486, 29, 'Jaisalmer'),
(487, 29, 'Jhalawar'),
(488, 29, 'Karauli'),
(489, 29, 'Kota'),
(490, 29, 'Nagaur'),
(491, 29, 'Pali'),
(492, 29, 'Pratapgarh'),
(493, 29, 'Rajsamand'),
(494, 29, 'Sikar'),
(495, 29, 'Sawai Madhopur'),
(496, 29, 'Sirohi'),
(497, 29, 'Tonk'),
(498, 29, 'Udaipur'),
(499, 30, 'East Sikkim'),
(500, 30, 'North Sikkim'),
(501, 30, 'South Sikkim'),
(502, 30, 'West Sikkim'),
(503, 31, 'Ariyalur'),
(504, 31, 'Chennai'),
(505, 31, 'Coimbatore'),
(506, 31, 'Cuddalore'),
(507, 31, 'Dharmapuri'),
(508, 31, 'Dindigul'),
(509, 31, 'Erode'),
(510, 31, 'Kanchipuram'),
(511, 31, 'Kanyakumari'),
(512, 31, 'Karur'),
(513, 31, 'Krishnagiri'),
(514, 31, 'Madurai'),
(515, 31, 'Nagapattinam'),
(516, 31, 'Nilgiris'),
(517, 31, 'Namakkal'),
(518, 31, 'Perambalur'),
(519, 31, 'Pudukkottai'),
(520, 31, 'Ramanathapuram'),
(521, 31, 'Salem'),
(522, 31, 'Sivaganga'),
(523, 31, 'Tirupur'),
(524, 31, 'Tiruchirappalli'),
(525, 31, 'Theni'),
(526, 31, 'Tirunelveli'),
(527, 31, 'Thanjavur'),
(528, 31, 'Thoothukudi'),
(529, 31, 'Tiruvallur'),
(530, 31, 'Tiruvarur'),
(531, 31, 'Tiruvannamalai'),
(532, 31, 'Vellore'),
(533, 31, 'Viluppuram'),
(534, 31, 'Virudhunagar'),
(535, 32, 'Dhalai'),
(536, 32, 'North Tripura'),
(537, 32, 'South Tripura'),
(538, 32, 'Khowai[7]'),
(539, 32, 'West Tripura'),
(540, 33, 'Agra'),
(541, 33, 'Aligarh'),
(542, 33, 'Allahabad'),
(543, 33, 'Ambedkar Nagar'),
(544, 33, 'Auraiya'),
(545, 33, 'Azamgarh'),
(546, 33, 'Bagpat'),
(547, 33, 'Bahraich'),
(548, 33, 'Ballia'),
(549, 33, 'Balrampur'),
(550, 33, 'Banda'),
(551, 33, 'Barabanki'),
(552, 33, 'Bareilly'),
(553, 33, 'Basti'),
(554, 33, 'Bijnor'),
(555, 33, 'Budaun'),
(556, 33, 'Bulandshahr'),
(557, 33, 'Chandauli'),
(558, 33, 'Chhatrapati Shahuji Maharaj Nagar[8]'),
(559, 33, 'Chitrakoot'),
(560, 33, 'Deoria'),
(561, 33, 'Etah'),
(562, 33, 'Etawah'),
(563, 33, 'Faizabad'),
(564, 33, 'Farrukhabad'),
(565, 33, 'Fatehpur'),
(566, 33, 'Firozabad'),
(567, 33, 'Gautam Buddh Nagar'),
(568, 33, 'Ghaziabad'),
(569, 33, 'Ghazipur'),
(570, 33, 'Gonda'),
(571, 33, 'Gorakhpur'),
(572, 33, 'Hamirpur'),
(573, 33, 'Hardoi'),
(574, 33, 'Hathras'),
(575, 33, 'Jalaun'),
(576, 33, 'Jaunpur district'),
(577, 33, 'Jhansi'),
(578, 33, 'Jyotiba Phule Nagar'),
(579, 33, 'Kannauj'),
(580, 33, 'Kanpur'),
(581, 33, 'Kanshi Ram Nagar'),
(582, 33, 'Kaushambi'),
(583, 33, 'Kushinagar'),
(584, 33, 'Lakhimpur Kheri'),
(585, 33, 'Lalitpur'),
(586, 33, 'Lucknow'),
(587, 33, 'Maharajganj'),
(588, 33, 'Mahoba'),
(589, 33, 'Mainpuri'),
(590, 33, 'Mathura'),
(591, 33, 'Mau'),
(592, 33, 'Meerut'),
(593, 33, 'Mirzapur'),
(594, 33, 'Moradabad'),
(595, 33, 'Muzaffarnagar'),
(596, 33, 'Panchsheel Nagar district (Hapur)'),
(597, 33, 'Pilibhit'),
(598, 33, 'Pratapgarh'),
(599, 33, 'Raebareli'),
(600, 33, 'Ramabai Nagar (Kanpur Dehat)'),
(601, 33, 'Rampur'),
(602, 33, 'Saharanpur'),
(603, 33, 'Sant Kabir Nagar'),
(604, 33, 'Sant Ravidas Nagar'),
(605, 33, 'Shahjahanpur'),
(606, 33, 'Shamli[9]'),
(607, 33, 'Shravasti'),
(608, 33, 'Siddharthnagar'),
(609, 33, 'Sitapur'),
(610, 33, 'Sonbhadra'),
(611, 33, 'Sultanpur'),
(612, 33, 'Unnao'),
(613, 33, 'Varanasi'),
(614, 34, 'Almora'),
(615, 34, 'Bageshwar'),
(616, 34, 'Chamoli'),
(617, 34, 'Champawat'),
(618, 34, 'Dehradun'),
(619, 34, 'Haridwar'),
(620, 34, 'Nainital'),
(621, 34, 'Pauri Garhwal'),
(622, 34, 'Pithoragarh'),
(623, 34, 'Rudraprayag'),
(624, 34, 'Tehri Garhwal'),
(625, 34, 'Udham Singh Nagar'),
(626, 34, 'Uttarkashi'),
(627, 35, 'Bankura'),
(628, 35, 'Bardhaman'),
(629, 35, 'Birbhum'),
(630, 35, 'Cooch Behar'),
(631, 35, 'Dakshin Dinajpur'),
(632, 35, 'Darjeeling'),
(633, 35, 'Hooghly'),
(634, 35, 'Howrah'),
(635, 35, 'Jalpaiguri'),
(636, 35, 'Kolkata'),
(637, 35, 'Maldah'),
(638, 35, 'Murshidabad'),
(639, 35, 'Nadia'),
(640, 35, 'North 24 Parganas'),
(641, 35, 'Paschim Medinipur'),
(642, 35, 'Purba Medinipur'),
(643, 35, 'Purulia'),
(644, 35, 'South 24 Parganas'),
(645, 35, 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `emailaddresses`
--

CREATE TABLE IF NOT EXISTS `emailaddresses` (
  `emailId` int(12) NOT NULL AUTO_INCREMENT,
  `entityId` int(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emailType` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emailId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `emailaddresses`
--

INSERT INTO `emailaddresses` (`emailId`, `entityId`, `email`, `emailType`, `description`, `deleted`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ramkumawatk45@gmail.com', '', '', 0, 0, '2016-07-02 05:01:30', '2016-07-02 05:01:30'),
(2, 2, 'ravi@bel-technology.com', '', '', 0, 0, '2016-07-02 05:08:45', '2016-07-02 05:08:45'),
(3, 3, 'suraj@bel-technology.com', '', '', 0, 0, '2016-07-02 05:09:54', '2016-07-02 05:09:54'),
(4, 4, 'ravi@bel-technology.com', '', '', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44'),
(5, 5, 'suraj@bel-technology.com', '', '', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26'),
(6, 6, 'suraj@bel-technology.com', '', '', 0, 0, '2016-07-02 05:12:18', '2016-07-02 05:12:18'),
(7, 7, 'rajesh@bel-technology.com', '', '', 0, 0, '2016-07-02 05:48:16', '2016-07-02 05:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employeeId` int(12) NOT NULL AUTO_INCREMENT,
  `entityId` int(12) NOT NULL,
  `sessionYear` varchar(100) NOT NULL,
  `employeeCode` varchar(100) NOT NULL,
  `dateOfJoining` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `employeeLocation` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeId`, `entityId`, `sessionYear`, `employeeCode`, `dateOfJoining`, `dob`, `pincode`, `designation`, `employeeLocation`, `description`, `deleted`, `status`, `updated_at`, `created_at`) VALUES
(1, 1, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:01:30', '2016-07-02 05:01:30'),
(2, 2, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:08:44', '2016-07-02 05:08:44'),
(3, 3, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:09:53', '2016-07-02 05:09:53'),
(4, 4, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44'),
(5, 5, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26'),
(6, 6, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:12:17', '2016-07-02 05:12:17'),
(7, 7, '', '', '12/03/2016', '', '', '', '', '', 0, 0, '2016-07-02 05:48:15', '2016-07-02 05:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `entitys`
--

CREATE TABLE IF NOT EXISTS `entitys` (
  `entityId` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `entityType` varchar(100) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`entityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `entitys`
--

INSERT INTO `entitys` (`entityId`, `name`, `entityType`, `deleted`, `status`, `updated_at`, `created_at`, `description`) VALUES
(1, 'Ramniwas', '', 0, 0, '2016-07-02 05:01:30', '2016-07-02 05:01:30', ''),
(2, 'Ravi kumawat', '', 0, 0, '2016-07-02 05:08:44', '2016-07-02 05:08:44', ''),
(3, 'Suraj Kumawat', '', 0, 0, '2016-07-02 05:09:53', '2016-07-02 05:09:53', ''),
(4, 'Babulal kumawat', '', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44', ''),
(5, 'Shyam singh', '', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26', ''),
(6, 'Pawan', '', 0, 0, '2016-07-02 05:12:17', '2016-07-02 05:12:17', ''),
(7, 'Rajesh', '', 0, 0, '2016-07-02 05:48:16', '2016-07-02 05:48:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2016_07_01_113705_add_paid_to_employees', 2),
('2016_07_01_114602_add_mobileNo_to_employees', 3),
('2016_07_01_115120_add_mobileNo_to_employees', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `phoneId` int(12) NOT NULL AUTO_INCREMENT,
  `entityId` int(11) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `phoneType` varchar(200) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`phoneId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phoneId`, `entityId`, `phoneNumber`, `phoneType`, `deleted`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '9166782146', 'primary', 0, 0, '2016-07-02 05:01:30', '2016-07-02 05:01:30'),
(2, 1, '9929906336', 'secondary', 0, 0, '2016-07-02 05:01:31', '2016-07-02 05:01:31'),
(3, 2, '9166782145', 'primary', 0, 0, '2016-07-02 05:08:45', '2016-07-02 05:08:45'),
(4, 2, '9929906337', 'secondary', 0, 0, '2016-07-02 05:08:45', '2016-07-02 05:08:45'),
(5, 3, '9166782145', 'primary', 0, 0, '2016-07-02 05:09:54', '2016-07-02 05:09:54'),
(6, 3, '9929906336', 'secondary', 0, 0, '2016-07-02 05:09:54', '2016-07-02 05:09:54'),
(7, 4, '9166782146', 'primary', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44'),
(8, 4, '9166782146', 'secondary', 0, 0, '2016-07-02 05:10:44', '2016-07-02 05:10:44'),
(9, 5, '9166782145', 'primary', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26'),
(10, 5, '9929906337', 'secondary', 0, 0, '2016-07-02 05:11:26', '2016-07-02 05:11:26'),
(11, 6, '9166782145', 'primary', 0, 0, '2016-07-02 05:12:18', '2016-07-02 05:12:18'),
(12, 6, '9929906337', 'secondary', 0, 0, '2016-07-02 05:12:18', '2016-07-02 05:12:18'),
(13, 7, '9166782145', 'primary', 0, 0, '2016-07-02 05:48:16', '2016-07-02 05:48:16'),
(14, 7, '0', 'secondary', 0, 0, '2016-07-02 05:48:16', '2016-07-02 05:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andaman and Nicobar (AN)'),
(2, 'Andhra Pradesh (AP)'),
(3, 'Arunachal Pradesh (AR)'),
(4, 'Assam (AS)'),
(5, 'Bihar (BR)'),
(6, 'Chandigarh (CH)'),
(7, 'Chhattisgarh (CG)'),
(8, 'Dadra and Nagar Haveli (DN)'),
(9, 'Daman and Diu (DD)'),
(10, 'Delhi (DL)'),
(11, 'Goa (GA)'),
(12, 'Gujarat (GJ)'),
(13, 'Haryana (HR)'),
(14, 'Himachal Pradesh (HP)'),
(15, 'Jammu and Kashmir (JK)'),
(16, 'Jharkhand (JH)'),
(17, 'Karnataka (KA)'),
(18, 'Kerala (KL)'),
(19, 'Lakshdweep (LD)'),
(20, 'Madhya Pradesh (MP)'),
(21, 'Maharashtra (MH)'),
(22, 'Manipur (MN)'),
(23, 'Meghalaya (ML)'),
(24, 'Mizoram (MZ)'),
(25, 'Nagaland (NL)'),
(26, 'Odisha (OD)'),
(27, 'Puducherry (PY)'),
(28, 'Punjab (PB)'),
(29, 'Rajasthan (RJ)'),
(30, 'Sikkim (SK)'),
(31, 'Tamil Nadu (TN)'),
(32, 'Tripura (TR)'),
(33, 'Uttar Pradesh (UP)'),
(34, 'Uttarakhand (UK)'),
(35, 'West Bengal (WB)');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `teamId` int(12) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(200) NOT NULL,
  `teamLocation` varchar(100) NOT NULL,
  `teamLeader` varchar(200) NOT NULL,
  `teamCreationDate` varchar(100) NOT NULL,
  `teamEndDate` varchar(100) NOT NULL,
  `teamCode` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamId`, `teamName`, `teamLocation`, `teamLeader`, `teamCreationDate`, `teamEndDate`, `teamCode`, `description`, `deleted`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Team1', 'Jaipur', 'Ramniwas', '29/06/2016', '29/06/2016', '34', 'Hello How are you', 0, 0, '2016-06-29 05:52:49', '2016-06-29 07:33:28'),
(2, 'fdsf', 'fds', 'fsf', 'fsf', 'fsf', 'dd', 'fsf', 0, 0, '2016-06-29 05:58:13', '2016-06-29 07:23:33'),
(3, 'dsf', 'fsdf', 'fsf', 'fds', 'fsdf', '', 'fs', 0, 0, '2016-06-29 05:58:31', '2016-06-29 05:58:31'),
(4, 'dsd', 'fdsf', 'fsf', 'fsf', 'efsf', '', 'fsdf', 0, 0, '2016-06-29 05:58:44', '2016-06-29 05:58:44'),
(5, 'fsf', 'f', 'f', 'dfsf', 'fsf', '', 'ff', 0, 0, '2016-06-29 05:58:59', '2016-06-29 05:58:59'),
(6, 'fsf', 'fsf', 'fsf', 'd', 'fsd', '', 'fsdf', 0, 0, '2016-06-29 05:59:14', '2016-06-29 05:59:14'),
(7, 'fsf', 'fsfq', 'qfsf', 'dfsfd', 'fsf', '', 'fd', 0, 0, '2016-06-29 05:59:27', '2016-06-29 05:59:27'),
(8, 'sdvds', 'dsdsfvds', 'qfd', 'dv', 'qfds', 'qvc', 'qfdv', 0, 0, '2016-06-30 06:31:18', '2016-06-30 06:31:18'),
(9, 'Team 04', 'Kota', 'Shyam', '29/06/2016', '29/06/2016', '1020', 'this is ram', 1, 1, '2016-06-30 22:43:19', '2016-06-30 22:43:19'),
(11, 'Sikar', 'Sikar', 'Karan', '29/06/2016', '29/06/2016', '1313', 'sfsfsf', 0, 0, '2016-06-30 22:44:31', '2016-06-30 22:44:31'),
(20, 'Jaipur Team', 'Jaipur', 'Ramniwas', '29/06/2016', '29/06/2016', '21313', 'sfdsf', 0, 1, '2016-06-30 22:23:02', '2016-06-30 22:23:02'),
(34, '44', '234', 'fdsf', 'dsfg', 'fsf', 'fsff', 'fsf', 0, 0, '2016-06-30 06:31:45', '2016-06-30 06:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ravi', 'ravikumar', 'ravi@bel-technology.com', '$2y$10$i/KrdVeTn0HAEoC1py3WjO2bb9GPUF4MZ91fxiVbAdEfa79hWr1gy', '3nURrbhJmmvP26aMwTqXzwaCVoxmmh9BWtGQU8hodDIAX7Dc1Bb10gWYaHgk', '2016-06-29 02:02:32', '2016-07-02 05:27:10'),
(2, 'rakesh', 'rakesh', 'rakesh@test.com', '$2y$10$SfAsSwMdLnxPLLaiU8C6MudHN9Els3Y223l4f0L7eX41/URFLAGee', 'nTsXQnr32Cl8c3CUh14WDnWgGdUuKjeQJqYM0IIr0Cw6ElX4I3FILw7fmDPH', '2016-06-29 23:49:58', '2016-06-30 00:45:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
