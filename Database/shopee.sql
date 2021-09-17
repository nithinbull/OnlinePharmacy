-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 05:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(254) NOT NULL,
  `blog_name` varchar(200) NOT NULL,
  `blog_image` varchar(200) NOT NULL,
  `blog_link` varchar(200) NOT NULL,
  `blog_abstract` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_name`, `blog_image`, `blog_link`, `blog_abstract`) VALUES
(1, 'Coping with the loss of smell and taste', 'https://hhp-blog.s3.amazonaws.com/2020/10/GettyImages-1205742732-300x200.jpg', 'https://www.health.harvard.edu/blog/coping-with-the-loss-of-sense-of-smell-and-taste-2020101921141', 'A majority of people with mild or moderate COVID-19 have reported problems...'),
(5, 'The tragedy of the post-COVID “long haulers”', 'https://hhp-blog.s3.amazonaws.com/2020/10/GettyImages-491747470-300x200.jpg', 'https://www.health.harvard.edu/blog/the-tragedy-of-the-post-covid-long-haulers-2020101521173', 'Tens of thousands of people in the US have recovered from COVID-19...'),
(6, 'Stress and the heart: Lessons from the pandemic', 'https://hhp-blog.s3.amazonaws.com/2020/10/woman-stressed-by-pandemic-300x200.jpg', 'https://www.health.harvard.edu/blog/stress-and-the-heart-lessons-from-the-pandemic-2020101421094', 'Doctors have begun to study the effects of COVID-related..');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(200) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `item_quantity`) VALUES
(258, 1, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `order_quantity`) VALUES
(100, 20, 29, 3),
(101, 20, 31, 2),
(102, 21, 32, 2),
(103, 21, 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_description` varchar(2000) DEFAULT NULL,
  `item_prescription` varchar(2000) DEFAULT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_description`, `item_prescription`, `item_quantity`) VALUES
(29, 'Numark', 'Paracetamol', 72.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.chemist-4-u.com%2Fmedia%2Fcatalog%2Fproduct%2FZ%2FO%2FZOLS1BPZPCZ.jpg&f=1&nofb=1', NULL, 'Paracetamol relieves pain and brings down high temperatures (reduces fever). Paracetamol 500mg Tablets are used for relief of: mild to moderate pain including headache, migraine, nerve pain (neuralgia), toothache, sore throat and period pains, symptoms of rheumatic and muscular aches and pains, sciatica, back pain (lumbago), joint swelling and stiffness and symptoms of cold and flu.Do not take Paracetamol 500mg Tablets if you are allergic to paracetamol, sodium metabisulphite or any of the other ingredients.', 'Swallow the tablets, preferably with a drink of water. Adults can take 1 or 2 tablets up to four times a day, as required and children aged 6 - 12 half to one tablet up to four times a day, as required. Please do not take if your child is under 6 years old.', 150),
(31, 'Numark', 'Cocodamol', 90.00, 'https://dwcahaziz34hy.cloudfront.net/media/resized/1000/catalog/product/3/4/3467040-vg.jpg', NULL, 'Co-Codamol Tablets are a painkiller which combines 2 active ingredients to help to relieve your pain, paracetamol and codeine. This is the perfect temporary pain relief for those who find that their pain is not eased by painkillers such as ibuprofen or paracetamol alone. If you’re suffering from moderate pain such as a migraine, toothache, or rheumatic pain, co-codamol can help to ease your pain until they’ve passed.', 'For adults and children over the age of 16, take 1 – 2 Paracetamol Capsules every 4 – 6 hours as needed. For children between the ages of 12 – 15, take one caplet every 4 – 6 hours as needed. Do not take more than 4 doses in any 24 hours.\r\n\r\n', 150),
(32, 'Dabur', 'Cough syrup', 100.00, 'https://www.dabur.com/img/product/large/46-honitus-cough-syrup.jpg', NULL, 'Dabur\'s Honitus Cough Syrup provides effective relief from cough, without side-effects. Dabur Honitus Cough Syrup is an ayurvedic medicine for cough that is fortified with Tulsi , Mulethi & Banapsha and other powerful scientifically proven medicinal plants as recommended by ayurveda in India. The formulation is clinically proven and provides fast relief against acute cough and throat irritation. It is 100% Ayurvedic and safe\r\n', 'Children: 1 teaspoon 3-4 times a day\r\nAdults: 2 teaspoon 3-4 times a day ', 200),
(33, 'Johnson Ltd', 'Benadryl', 86.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fomsi.in%2Fwp-content%2Fuploads%2F2014%2F08%2FOTCAS450v1.jpg&f=1&nofb=1', NULL, 'Benadryl (diphenhydramine) is an antihistamine that reduces the effects of natural chemical histamine in the body. Histamine can produce symptoms of sneezing, itching, watery eyes, and runny nose.\r\n', 'Infants\r\n5 mg/kg/24 hr or 150 mg/m2/24 hr. Maximum daily dosage is 300 mg. Divide into four doses, administered intravenously at a rate generally not exceeding 25 mg/min, or deep intramuscularly.\r\nAdults\r\n10 to 50 mg intravenously at a rate generally not exceeding 25 mg/min, or deep intramuscularly, 100 mg if required; maximum daily dosage is 400 mg.\r\n', 150),
(34, 'Digene', 'Digene Total', 95.00, 'https://tiimg.tistatic.com/fp/1/006/281/digene-tablet-301.jpg', NULL, 'Digene Total 40mg Tablet is a medicine that reduces the amount of acid produced in your stomach. It is used for treating acid-related diseases of the stomach and intestine such as heartburn, acid reflux, peptic ulcer disease, and some other stomach conditions associated with excessive acid production.', 'Digene Total 40mg Tablet should be taken 1 hour before a meal, preferably in the morning.', 150),
(35, 'Ranbaxy', 'Volini 86ml', 125.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.ukdirectbd.com%2Fwp-content%2Fuploads%2F2019%2F04%2FUntitled-36.png&f=1&nofb=1', NULL, 'Volini spray is used for muscular pains, sprains and more. Scientifically formulated with ingredients such as diclofenac diethylamine, methyl salicylate, menthol and linseed oil, it provides effective relief from backache, knee pain and shoulder pain.\r\n', 'The dosage and duration prescribed by the doctor must be followed. Generally, the Spray is used as and when the pain occurs. In case of mild pain, sprains or strains, it is advised to be used twice a day.\r\n\r\nIn case of persistent pain in adults, it should be used three to four times a day along with oral medications to address the main disorder causing the pain. In children above 12 years old, it can be used two times a day under adult supervision.\r\n', 150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT current_timestamp(),
  `user_mail` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` varchar(200) DEFAULT NULL,
  `user_address` varchar(2000) DEFAULT NULL,
  `security_question` varchar(2000) DEFAULT NULL,
  `security_answer` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`, `user_mail`, `user_password`, `user_type`, `user_address`, `security_question`, `security_answer`) VALUES
(7, 'Ratan', 'Tata', '2020-10-21 18:46:07', 'admin', '$2y$10$71hQFPxWZLUO4XNHooJL5.Uc2b.FOIDmZk1Zf9G7RtaU8QiQ0/ARC', 'admin', NULL, NULL, NULL),
(20, 'Indu', 'Raj', '2020-10-29 19:17:02', 'InduRaj', '$2y$10$nNNxlqk04uC8ACGTPEVRg.EqBUZUYjpG3lO7LE4Tj2nuMmM8wA6om', 'user', '', 'your Favourite color', '$2y$10$nG9LpoipJcxMY9bLkEqS9evr5JLr60Pc8P.3iQ53UTMpHQ7pfXcQm'),
(21, 'Nithin', 'Raj', '2020-10-29 22:01:11', 'nithin1106', '$2y$10$pW5zdQcHsOPKcEWxHkcJFO80UoVr0BcJEZTPuYcsBYuGTcEhj0TIq', 'user', '', 'Name of your favourite pet', '$2y$10$P6aUfGUYRs3kU.GRzw1WJu0ZEcvVQgdsl6f56Rf96IDdhdFWkSiCW');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQUE` (`user_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
