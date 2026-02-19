-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2024 at 10:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrinet`
--

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_experts`
--

CREATE TABLE `agriculture_experts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `expertise_area` varchar(255) DEFAULT NULL,
  `years_of_experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agriculture_experts`
--

INSERT INTO `agriculture_experts` (`id`, `user_id`, `full_name`, `expertise_area`, `years_of_experience`) VALUES
(1, 15, 'Sehan Jeewantha', 'Tea', 5),
(2, 19, 'Chanuka Gayantha', 'Tea', 4),
(3, 41, 'dcd', 'sds', 2),
(4, 42, 'Ranbo', 'Tomato', 5),
(5, 51, 'Expert User', 'Rice', 3);

-- --------------------------------------------------------

--
-- Table structure for table `expert_posts`
--

CREATE TABLE `expert_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` varchar(255) NOT NULL,
  `advice` text NOT NULL,
  `related_references` text DEFAULT NULL,
  `case_studies` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert_posts`
--

INSERT INTO `expert_posts` (`id`, `user_id`, `topic`, `advice`, `related_references`, `case_studies`, `created_at`, `imgpath`) VALUES
(6, 15, 'Water Conservation Techniques in Agriculture', 'Implement drip irrigation and rainwater harvesting to reduce water wastage.', 'Best practices for water conservation in farming', 'Case study of water-efficient farming in dry zones', '2024-09-20 12:15:56', NULL),
(7, 51, 'Sample Topic', 'Advice', 'refs', 'Case cse', '2024-09-25 21:00:44', NULL),
(8, 51, 'cd', 'cd', 'cd', 'cd', '2024-09-26 03:58:46', 'img/hi.jpeg'),
(9, 51, 'Expert Post Title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.youtube.com/watch?v=qiEx4sCeS1c&t=1411s', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-09-26 06:39:25', 'img/property-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `farm_name` varchar(255) DEFAULT NULL,
  `farm_location` varchar(255) DEFAULT NULL,
  `crops_grown` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `user_id`, `full_name`, `farm_name`, `farm_location`, `crops_grown`) VALUES
(1, 4, 'Chanuka Gayantha', 'Kandy Estate', '', 'TWwad , colvfr'),
(2, 5, 'Chanuka Gayantha', 'Kandy Estate', 'Kandy', 'Tea, Coconut'),
(3, 12, 'Chanuka Gayantha', 'Kandy Estate', 'Colombo', 'Tea, rubber'),
(4, 13, 'Chanuka Gayantha', 'Kandy Estate', 'Kandy', 'Tea, Rubber'),
(5, 37, 'Chanuka', 'SDF', 'Kandy', 'BEED'),
(6, 48, 'Farmer User', 'My Farm', 'Kandy', 'Tomato');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_posts`
--

CREATE TABLE `farmer_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `crop_type` varchar(255) DEFAULT NULL,
  `farm_size` decimal(10,2) DEFAULT NULL,
  `farm_location` varchar(255) DEFAULT NULL,
  `weather_conditions` varchar(255) DEFAULT NULL,
  `problem_description` text DEFAULT NULL,
  `solution_description` text DEFAULT NULL,
  `experience_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_posts`
--

INSERT INTO `farmer_posts` (`id`, `user_id`, `title`, `crop_type`, `farm_size`, `farm_location`, `weather_conditions`, `problem_description`, `solution_description`, `experience_description`, `created_at`, `imgpath`) VALUES
(4, 4, 'Tackling Low Yield in Paddy Fields', 'Rice', 5.00, 'Anuradhapura', 'Mildly rainy with occasional dry spells', 'This season, I experienced a significant drop in yield due to inconsistent rain patterns and unexpected droughts during crucial growth phases. My crops were visibly stunted, and pest infestation worsened the situation.', 'I implemented a water conservation method by building small ponds for irrigation during dry spells. I also started using natural pesticides to reduce pest damage, which helped improve plant health.', 'The water conservation method proved effective in maintaining soil moisture during dry spells, and the use of natural pesticides drastically reduced pest attacks. I plan to expand this method to other parts of the farm in the coming season.', '2024-09-20 12:13:00', NULL),
(5, 5, 'Boosting Tomato Production Through Soil Management', 'Tomato', 3.00, 'Nuwara Eliya', 'Cool and dry, occasional light showers', 'My tomatoes were suffering from poor growth, with yellowing leaves and reduced fruit size. I suspected the soil quality was a major factor, as it was becoming compacted and nutrient-deficient over time.', 'I introduced compost and organic manure into the soil and switched to drip irrigation for better water management. I also rotated crops to improve soil health.', 'The results were remarkable. The compost improved soil texture, and drip irrigation reduced water wastage. I’ve seen healthier plants and larger, tastier tomatoes. Crop rotation also worked wonders for the soil.', '2024-09-20 12:13:00', NULL),
(6, 4, 'Combating Pest Infestation in Tea Plantations', 'Tea', 10.00, 'Kandy', 'Humid and rainy', 'My tea crops were heavily affected by a pest infestation that spread quickly during the rainy season, resulting in significant crop damage. The leaves turned yellow, and some plants stopped producing new shoots.', 'I implemented an integrated pest management system, combining biological pest control with natural repellents. I also pruned infected areas to prevent further spread.', 'After introducing beneficial insects and using natural repellents, the pest population declined significantly. Pruning infected plants helped contain the issue, and the plants are now recovering with new, healthy shoots.', '2024-09-20 12:13:00', NULL),
(7, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:24:24', NULL),
(8, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:25:53', NULL),
(9, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:27:51', NULL),
(10, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:28:11', NULL),
(11, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:28:44', NULL),
(12, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:28:57', NULL),
(13, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:29:31', NULL),
(14, 48, 'Sample Title', 'Totato', 2.00, 'Kandy', 'Cool', 'Problem is here', 'Got the solution', 'it waS ok', '2024-09-25 20:29:49', NULL),
(15, 48, 'Image', 'type', 3.00, 'vsn ', 'sm v', ' sm', ' n', ' ssd', '2024-09-26 03:55:23', 'img/test.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `normal_users`
--

CREATE TABLE `normal_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `favorite_topics` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normal_users`
--

INSERT INTO `normal_users` (`id`, `user_id`, `full_name`, `user_location`, `favorite_topics`) VALUES
(1, 18, 'Chanuka Gayantha', 'Colombo', 'Organic, IoT'),
(2, 26, 'Chanuka Gayantha', 'Colombo', 'Tea, Organic, IoT'),
(3, 29, 'Chanuka Gayantha', 'Colombo', 'mn'),
(4, 46, 'cdc', 'ccc', 'sdc'),
(5, 47, 'Zeegy Solutions', 'Kandy', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `affiliation` varchar(255) DEFAULT NULL,
  `research_field` varchar(255) DEFAULT NULL,
  `publications` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`id`, `user_id`, `full_name`, `affiliation`, `research_field`, `publications`) VALUES
(1, 17, 'Chanuka Gayantha', 'University of Sri Jayewardenepura', 'IoT Agriculture', 'lorem ipsum, some pulication'),
(2, 21, 'Chanuka Gayantha', 'University of Sri Jayewardenepura', 'IoT Agriculture', 'non'),
(3, 43, 'AAA', 'AA', 'AA', 'AA'),
(4, 49, 'Researcher User', 'USJ', 'IoT', 'A few');

-- --------------------------------------------------------

--
-- Table structure for table `researcher_posts`
--

CREATE TABLE `researcher_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `research_title` varchar(255) NOT NULL,
  `research_field` varchar(255) DEFAULT NULL,
  `research_methodology` text DEFAULT NULL,
  `research_results` text DEFAULT NULL,
  `publication_link` varchar(255) DEFAULT NULL,
  `conclusion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researcher_posts`
--

INSERT INTO `researcher_posts` (`id`, `user_id`, `research_title`, `research_field`, `research_methodology`, `research_results`, `publication_link`, `conclusion`, `created_at`, `imgpath`) VALUES
(6, 49, 'Sample Title', 'IoT', 'Methodology', 'Resluts', 'link', 'end', '2024-09-25 20:47:01', NULL),
(7, 49, 'Sample Title', 'IoT', 'Methodology', 'Resluts', 'link', 'end', '2024-09-25 20:47:35', NULL),
(8, 49, '        cx', 'cd', 'cd', 'cd', 'cdc', 'cdc', '2024-09-26 04:02:53', 'img/hui.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_location` varchar(255) DEFAULT NULL,
  `products_sold` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `full_name`, `business_name`, `business_location`, `products_sold`) VALUES
(1, 16, 'Chanuka Gayantha', 'ZS', 'Kandy', 'Seeds, Fertilizer'),
(2, 20, 'Chanuka Gayantha', 'Zagri', 'Colombo', 'Fert, seeds'),
(3, 44, 'Saman Herath', 'Galle', '', 'Seeds, Fert'),
(4, 45, 'Amal Shantha', '', '', ''),
(5, 45, 'Amal Shantha', '', '', ''),
(6, 45, 'Amal Shantha', '', '', ''),
(7, 50, 'Seller User', 'Colombo', '', 'Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `seller_posts`
--

CREATE TABLE `seller_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgpath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_posts`
--

INSERT INTO `seller_posts` (`id`, `user_id`, `item_name`, `description`, `price`, `contact_info`, `created_at`, `imgpath`) VALUES
(1, 20, 'Onion Seed', 'Original Quality', 1200.00, '0702458558', '2024-08-25 17:38:11', 'img/pr4.png'),
(12, 12, 'Tomato Seed', 'High Yield Variety', 1500.00, '0712345678', '2024-09-20 16:15:03', 'img/pr1.png'),
(13, 13, 'Potato Seed', 'Disease Resistant', 1800.00, '0771234567', '2024-09-20 16:15:03', 'img/pr3.png'),
(14, 14, 'Cabbage Seed', 'Organic Certified', 1200.00, '0781234567', '2024-09-20 16:15:03', 'img/pr2.png'),
(15, 15, 'Carrot Seed', 'Fast Growing', 1600.00, '0759876543', '2024-09-20 16:15:03', 'img/pr1.png'),
(16, 16, 'Spinach Seed', 'High Nutrition Value', 1400.00, '0719876543', '2024-09-20 16:15:03', 'img/pr3.png'),
(22, 24, 'Organic Fertilizer', 'Enriched with essential nutrients for all plants', 1800.00, '0712345678', '2024-09-24 20:29:01', 'img/pr2.png'),
(23, 25, 'Garden Tools Set', 'Essential tools for easy gardening', 2500.00, '0723456789', '2024-09-24 20:29:01', 'img/pr1.png'),
(24, 26, 'Pest Control Spray', 'Organic pesticide to protect crops', 950.00, '0734567890', '2024-09-24 20:29:01', 'img/pr3.png'),
(25, 30, 'Seed Starter Kit', 'Complete kit for starting your own garden', 1200.00, '0745678901', '2024-09-24 20:29:01', 'img/pr4.png'),
(26, 15, 'Plant Growth Booster', 'Promotes faster and healthier plant growth', 1500.00, '0756789012', '2024-09-24 20:29:01', 'img/pr2.png'),
(27, 50, 'Tomoto Seed', 'High quality imported tomato seeds with highest rate of harvest', 1200.00, '0702345760', '2024-09-25 20:53:04', 'img/pr3.png'),
(28, 50, 'mkmk', 'mkkm', 233.00, '0723458990', '2024-09-26 04:05:45', 'img/babi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('temp_user','farmer','agriculture_expert','seller','researcher','normal_user') NOT NULL DEFAULT 'temp_user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`) VALUES
(3, 'admin@gmail.com', '$2y$10$mRRzI0Et1KuGtszfCX/g3uhuw0N2on9yilP0kUUT84dKL/FcWQQSG', 'farmer', '2024-08-24 08:33:20'),
(4, 'abc@gmail.com', '$2y$10$ypnyxm3p9nozei.ndCYVKuzbCBROY43Mn1q4tb5LSWkS4Dj2ozVSy', 'farmer', '2024-08-24 08:40:09'),
(5, 'c@gmail.com', '$2y$10$nHIue4WVwhfPEpUFo2BYLu.tm0EMfqLxscK0MfQuci1V1zsOgRnha', 'farmer', '2024-08-24 08:41:14'),
(9, 'asam@gmail.com', '$2y$10$IbBV2r9xCFHqKFtxWdwk1.ICac1cXRhIRIAQhS.ahN3aEYCg4jclW', 'temp_user', '2024-08-24 09:07:14'),
(11, 'adminwe@gmail.com', '$2y$10$wx2yIJB6zyh.lXr6wuJUbu0WKSPGkc3cdr0e27ssdpi.REWH85GVS', 'farmer', '2024-08-24 09:10:20'),
(12, 'zx@gmail.com', '$2y$10$d1QctKNYWU1nBjqAV/kRX.Iehzsl0ZDU1xbe2ShXZqBq4r509yXHu', 'farmer', '2024-08-24 09:13:27'),
(13, 'chanuka@gmail.com', '$2y$10$hKhvcLcTxeSSID5QFYk5reWJaeyssyi.r2YkNm1QeZXLonC17i/eC', 'farmer', '2024-08-24 12:54:04'),
(14, 'gayantha@gmail.com', '$2y$10$d7XEU.1vNwduHpo9CUy1PeqwNywnDZAjl/Xv3/NWnHZ6oamruZkF6', 'farmer', '2024-08-24 13:07:22'),
(15, 'amal@gmail.com', '$2y$10$qA4ywg90oLlTgUXLExx82.qWOE2FM2U7u22nL6RAQg6douXDouQcS', 'agriculture_expert', '2024-08-24 13:31:11'),
(16, 'poo@gmail.com', '$2y$10$sSWs90dBnyAnctUEpk3DGu17ngLs1NB1GnHw1/2iFncKX..yFWTUi', 'seller', '2024-08-24 13:54:22'),
(17, 'cool@gmail.com', '$2y$10$iFn.fyxTrSt.emPv.SXXZe1adcksc3YyJFOwk3xqSQ2etFiX9.kAe', 'researcher', '2024-08-24 14:41:46'),
(18, 'loo@gmail.com', '$2y$10$KaFdm1Zp4sV2uvztcpGRtumLhsP8MwYw0NlMK0g9JtxEiIRcWkkwa', 'normal_user', '2024-08-24 14:55:56'),
(19, 'expert@gmail.com', '$2y$10$oPXvw0etpdqm51bagGAJXeFWfGjuMpuMyAsa5mTXdGErKUDFc0NbC', 'agriculture_expert', '2024-08-25 17:32:55'),
(20, 'seller@gmail.com', '$2y$10$tF0pPHp0RgU/BbRM/68hYuYYTCqNTwTzb2lGSaYxhRohyqeYXha6q', 'seller', '2024-08-25 17:36:58'),
(21, 'r@gmail.com', '$2y$10$XQ/keLdOIa9koN8qgT/IdOzRYqrPQbtKTDMM8WjtR5yIPm6rZg7Ja', 'researcher', '2024-08-25 17:40:20'),
(22, 'root@gmail.com', '$2y$10$su6cpRxz9KOsbScfhkCpB.QdLYySjwNfoSkuOJVYw1tSrsP93n6om', 'temp_user', '2024-08-26 17:33:43'),
(24, 'chanukaccc@gmail.com', '$2y$10$lX.YyL3hvrAhjiuOqLGrC.CtX881BmG4E0TlLPjxprnqU0pu2kUoa', 'temp_user', '2024-08-26 17:40:52'),
(25, 'aaa@gmail.com', '$2y$10$bddeKqxcSA7MckozvRYIhOXL7qmUIxKIRxfgowPIIQgISrwF4Nb.q', 'normal_user', '2024-08-26 17:41:58'),
(26, 'cd@gmail.com', '$2y$10$kltATJ3nhguvIonxXpkbI.ygFWdvap7sEmdOO.opjYVoR5mL6CH6u', 'normal_user', '2024-08-26 17:42:38'),
(29, 'admins@gmail.com', '$2y$10$x/aQTOyOCNSbaT4MgZmAsebjZRCaLxnOwG0bLd2JLf5OeNW4ijgYa', 'normal_user', '2024-08-26 18:01:12'),
(30, 'kate_91@gmail.com', '$2y$10$XRr4wsoEWlF5ETRYiJXnUuGC3BPteo7gnwjUQ2sIjqflSBwv9/7su', 'temp_user', '2024-08-27 09:57:53'),
(31, 'cdvf@gmail.com', '$2y$10$kovuQG9VRBGZzlizV35/mufLXvK5.nCLSQA/iliN4HmeigAg3Z1bq', 'farmer', '2024-09-25 10:29:53'),
(32, 'zam@gmail.com', '$2y$10$NugLFtoC7eXdArhS64XY8OJeKl0.tOEVqPOt9EktfmfEpqh34Gk4i', 'farmer', '2024-09-25 12:53:27'),
(33, 'zamx@gmail.com', '$2y$10$qlpqJx6YvUVMKKHCtil67uAiAB7Yv7GOyG7q9WyEHbjElQHLcK2BO', 'farmer', '2024-09-25 12:57:50'),
(34, 'mdd@gmail.com', '$2y$10$gaz.BD3/ZnO8.rbwsFfESukCAQq2.xrtkCqb456KxbCtxsuq9TOR2', 'normal_user', '2024-09-25 12:59:05'),
(35, 'zamxs@gmail.com', '$2y$10$Pr.BBnImDoKwZFA/Dhq9T.gFFa84ccBW0tXyIONsNaYKUi2TwYTQ6', 'farmer', '2024-09-25 13:01:00'),
(36, 'amalbiso@gmail.com', '$2y$10$K.XlJqa7hxqMH7G082zbOujrVr4wCqo5kvkuFpNrw5x6TpvMQoj6C', 'farmer', '2024-09-25 17:49:21'),
(37, 'cfg@gmail.com', '$2y$10$YA8BLRmYItsDuNF4CBwbT.QV/ZoYP2fb92JOWCtPqN8rHKx4gk87u', 'farmer', '2024-09-25 17:59:36'),
(38, 'nm@gmail.com', '$2y$10$l8a9J2s/bHOQD5ExpcqJGeeSp05U/QpFnPwpvQWcw2fhtSQbWV02.', 'agriculture_expert', '2024-09-25 18:12:22'),
(39, 'nmm@gmail.com', '$2y$10$UcA/nohhD3t6axE2jbR.R.2/fQnYx9I4Ho9.GXbCLO8E3tg1IF1s6', 'agriculture_expert', '2024-09-25 18:13:22'),
(40, 'nmms@gmail.com', '$2y$10$K22HT3d9qNI/F4Qc5wsJQ.In4ChL0MVPSrzpoQusO/UdapTmRwcSa', 'agriculture_expert', '2024-09-25 18:14:31'),
(41, 'xsxsx@gmail.com', '$2y$10$aCo55yS3ZYZdBHCE/QNvzOksUE8ffVeKqDlq0OA0kzQaTtPrSHr7e', 'agriculture_expert', '2024-09-25 18:16:07'),
(42, 'qwe@gmail.com', '$2y$10$3YwO8vPOuPEZiGozCtiluuu/TCs66bhCBr58M4X0RfYDONlKSOIrG', 'agriculture_expert', '2024-09-25 18:18:27'),
(43, 'res@gmail.com', '$2y$10$oANjmLR7XqrOjGYEMRJta.c6QSC.Z4p9hJKrpfZfbnEkw30db21su', 'researcher', '2024-09-25 18:44:38'),
(44, 'sell@gmail.com', '$2y$10$FsFRcbmKmP/lEAMvXXEg3uVq1e/jGLNGqoElxTORUv.8SIlVWW7UG', 'seller', '2024-09-25 19:11:46'),
(45, 'norus@gmail.com', '$2y$10$T2I8U1Mc4JAHdrxuEeRv1eMyY0PQ0aVHwyy6bzhZRH5OVrTrMF0Te', 'normal_user', '2024-09-25 19:20:32'),
(46, 'amalo@gmail.com', '$2y$10$I4D/bC0Z2Ke0paw53wODqunbSJd8opy8gchTY945xA5dqLK8sMbXO', 'normal_user', '2024-09-25 19:23:07'),
(47, 'zeegysolutions@gmail.com', '$2y$10$k1GtCSYW8LAnb9q8fKRo8uPJeTMHxLt3L4erDqTP/WnSLGydvVwxe', 'normal_user', '2024-09-25 20:06:23'),
(48, 'farmer@gmail.com', '$2y$10$05ulylSB0YCcjz0ZNI9q8ufgBFKbOlZr598uT9VwzdTD4duck/jZu', 'farmer', '2024-09-25 20:22:09'),
(49, 'researcher@gmail.com', '$2y$10$hgvqIXE.042DvkfOSpgIbeE5m3PTf9.EkyvljxjZqkSyUsPjKVqoW', 'researcher', '2024-09-25 20:45:43'),
(50, 'sellers@gmail.com', '$2y$10$Zh5tz5o26ULs28/4TRByHelMrLCUlRqSYk6NrxQbJHmKJqctD0MBe', 'seller', '2024-09-25 20:51:19'),
(51, 'experts@gmail.com', '$2y$10$wr355Agx8UY29uJWFrLyku0RaQyeSBTKkX6NgqaZJqrXAf4MyAmDO', 'agriculture_expert', '2024-09-25 20:59:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agriculture_experts`
--
ALTER TABLE `agriculture_experts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expert_posts`
--
ALTER TABLE `expert_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `normal_users`
--
ALTER TABLE `normal_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `researcher_posts`
--
ALTER TABLE `researcher_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seller_posts`
--
ALTER TABLE `seller_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agriculture_experts`
--
ALTER TABLE `agriculture_experts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expert_posts`
--
ALTER TABLE `expert_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `normal_users`
--
ALTER TABLE `normal_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `researcher_posts`
--
ALTER TABLE `researcher_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller_posts`
--
ALTER TABLE `seller_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agriculture_experts`
--
ALTER TABLE `agriculture_experts`
  ADD CONSTRAINT `agriculture_experts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `expert_posts`
--
ALTER TABLE `expert_posts`
  ADD CONSTRAINT `expert_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `farmer_posts`
--
ALTER TABLE `farmer_posts`
  ADD CONSTRAINT `farmer_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `normal_users`
--
ALTER TABLE `normal_users`
  ADD CONSTRAINT `normal_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `researchers`
--
ALTER TABLE `researchers`
  ADD CONSTRAINT `researchers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `researcher_posts`
--
ALTER TABLE `researcher_posts`
  ADD CONSTRAINT `researcher_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `seller_posts`
--
ALTER TABLE `seller_posts`
  ADD CONSTRAINT `seller_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
