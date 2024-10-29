-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 03:46 PM
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
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(150) NOT NULL,
  `product_img` varchar(150) NOT NULL,
  `product_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Bridal Gown'),
(2, 'Groom Suit');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_fname` varchar(20) NOT NULL,
  `contact_lname` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_message` text NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_fname`, `contact_lname`, `contact_email`, `contact_phone`, `contact_message`, `upload_date`) VALUES
(1, 'Imasha', 'Senadheera', 'imasharandima26@gmai', '+94768708457', 'This is Test', '2024-10-23'),
(7, 'Thila', 'Priyangana', 'thila23@gmail.com', '+94758463221', 'message is ', '2024-10-23'),
(12, 'chathura', 'randima', 'chathura24@gmail.com', '+94768708453', 'this is a message', '2024-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `number` varchar(14) NOT NULL,
  `email` varchar(150) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `total_products`, `total_price`) VALUES
(1, 'Milinda', '0768704578', 'milindashamal@gmail.com', 'cash on delivery', 'No.76/A', 'Kahanthota Road', 'Malabe', 'Western Province', 'White Lace Dress (1) , Black Gothic Gown (1) , Wedding Suit’s in Blue (2) ', '474000'),
(43, 'thila', '0784561234', 'thila@gmail.com', 'cash on delivery', 'No.76/A', 'athurugiriya', 'kaduwela', 'Western Province', 'Hooper Green And Blue Check Tweed Suit (1) , Beige Suit (1) , Azalia (1) ', '356000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_descp` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_img`, `product_price`, `product_descp`, `category_id`) VALUES
(17, 'White Lace Dress', './uploads/white.jpg', '120000', 'Elegant Wedding Dresses Off the Shoulder Lace Appliques Sweep Train Bridal Gowns', 1),
(18, 'Pink Wedding Dress', './uploads/pink.jpg', '95000', 'A light pink bridal gown with one side sculpted sleeves', 1),
(19, 'Black Suits', './uploads/men.jpg', '125000', 'JEXJ Mens Wedding Slim Fit 3 Piece Formal Business Suit Set', 2),
(20, 'Beige Suit', './uploads/bl.jpg', '99000', 'Dark beige unlined linen Suit', 2),
(21, 'Wedding Suit’s in Blue', './uploads/blue.jpeg', '102000', 'Salem Sky Blue Slim Fit Peak Lapel Tuxedo', 2),
(22, 'Black Gothic Gown', './uploads/black.jpg', '150000', 'Black Wedding Dress Lace Long Sleeves Sweetheart Velvet Tulle Gothic Bridal Gown', 1),
(23, 'Blue Shade Dress', './uploads/blue_gown.jpg', '190000', 'A Bold, Off-the-Shoulder Dress', 1),
(24, 'Slim Fit Grey Suit', './uploads/grey.jpg', '78000', 'This grey textured suit from Antique Rogue is the ideal contemporary take on a classic style', 2),
(25, 'Hooper Green And Blue Check Tweed Suit', './uploads/gre.jpg', '122000', 'Contemporary design, heritage influence. Combining legendary British tailoring with a personal, distinctive style, the menswear brand creates timeless collections made to be dressed up or down depending on the occasion or mood', 2),
(26, 'Tailored Fit Forest Green Flannel Suit', './uploads/flan.jpg', '143000', 'With roots tracing back to London’s iconic Savile Row, Alexandre of England was established over a century ago, and it now holds the Royal Warrant from Queen Elizabeth II', 2),
(27, 'Slim Fit Austin Chocolate Flannel Suit', './uploads/brow.jpg', '154000', 'Farah has a rich history dating back to 1920, having re-emerged in the 70s as a menswear staple. Known for kitting out Mods, Rude Boys to Casuals and the ‘90s music scene', 2),
(28, 'Azalia', './uploads/rose.jpg', '135000', 'Outstanding mini dress on wide straps made from textured lace embellished with sequinned ornament', 1),
(29, 'Alaia', './uploads/al.jpg', '178000', 'Refined A-line wedding gown crafted from mikado. This classic design features a corset with a cinched waist, a draped heart-shaped neckline framed by wide straps', 1),
(30, 'Aggie', './uploads/mila.jpg', '108000', 'Striking long-sleeved semi-transparent mini dress adorned with 3D flowers and dozens of pearls, beadings, and dazzling sequins', 1),
(31, 'Adeline', './uploads/ad.jpg', '154000', 'Grotesque 2-piece wedding set fashioned from ruched organza. Featuring a satin fitted drop waist boned corset with a ruched neckline and a lush voluminous skirt handcrafted from dozens of organza layers formed into waves', 1),
(32, 'Catalina', './uploads/cat.jpg', '126000', 'Lustrous wedding gown in trumpet silhouette embellished with sizable sequins and pearls. Featuring a heart-shaped neckline with built-in cups on wide straps, a boned corset with zipper closure on the open V-back, and a short train', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `wed_date` date NOT NULL,
  `servicetype` varchar(50) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `wed_date`, `servicetype`, `isAdmin`) VALUES
(1, 'admin', 'admin@example.com', 'admin', '0000-00-00', '', 1),
(5, 'milinda', 'milindashamal@gmail.com', 'r0llr0ll', '2024-11-05', 'planning', 0),
(6, 'vishwa', 'vishwasaranga@gmail.com', '12345', '2024-11-09', 'groom', 0),
(8, 'thila', 'thila@gmail.com', 'rollroll', '2024-10-31', 'groom', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `test` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `test` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
