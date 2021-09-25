-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 05:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `phone`) VALUES
('pavithra@foodie', 'pavithra@123', 'Pavithra', '7896854712'),
('ramya@foodie', 'ramya@123', 'Ramya', '7896854712');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_quantity` int(50) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `sumtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `item_name`, `item_quantity`, `item_price`, `cust_email`, `sumtotal`) VALUES
(1, 1, 'PANI-PURI', 2, 40.00, 'abhi12@gmail.com', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart_orders`
--

CREATE TABLE `cart_orders` (
  `no` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `ord_time` datetime NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_quantity` int(50) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `order_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_orders`
--

INSERT INTO `cart_orders` (`no`, `order_id`, `ord_time`, `item_id`, `item_name`, `item_quantity`, `cust_email`, `order_price`) VALUES
(1, 'ORD484733', '2021-09-25 19:45:58', 34, 'WATERMELON', 1, 'abhi12@gmail.com', 25.00),
(4, 'ORD836960', '2021-09-25 20:19:34', 37, 'COFFEE', 1, 'rahul@gmail.com', 100.00),
(5, 'ORD185567', '2021-09-25 20:30:13', 19, 'ALOO PARATHA', 1, 'pavithra@gmail.com', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(20) NOT NULL,
  `cust_phone` varchar(11) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_password` varchar(500) NOT NULL,
  `register_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phone`, `cust_address`, `cust_email`, `cust_password`, `register_time`) VALUES
(1, 'Pavithra', '9686684745', '#1, RR Nagar, Bangalore', 'pavithra@gmail.com', 'pavithra@123', '2021-09-25 17:06:50'),
(2, 'Abhi', '7789654152', '#1, JP Nagar', 'abhi12@gmail.com', 'Abhi@123', '2021-09-25 17:21:14'),
(3, 'Rahul', '9632587415', '#9, Jayanagar, Bengaluru', 'rahul@gmail.com', 'Rahul@123', '2021-09-25 17:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_descr` varchar(255) NOT NULL,
  `item_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`category_id`, `item_id`, `item_name`, `item_price`, `item_descr`, `item_image`) VALUES
(1, 1, 'PANI-PURI', 40.00, 'The spicy mint water, sweet imli chutney and aloos. Just can\'t stop eating. One of the most common and popular indian street food recipe.', 'imgs/panipuri.jpg'),
(1, 2, 'SEV-PURI', 40.00, 'Sev Puri an appetizer that can steal the thunder out of any meal!Flat puri topped with chopped veggies and chutneys, garnished with sev!', 'imgs/sevpuri.jpg'),
(1, 3, 'MASALA-PURI', 40.00, 'Masala puri is an awesome street food snack made with layers of crunchy puri, creamy and spicy white peas gravy, rich spices and fresh veggies.', 'imgs/masalpuri.jpeg'),
(1, 4, 'PAV-BHAJI', 40.00, 'Pav Bhaji is a flavorful meal of mashed vegetable gravy with fluffy soft buttery dinner rolls served with a side of onions, lemon and coriander.', 'imgs/pavbhaji.jpg'),
(1, 5, 'DAHI-VADA', 40.00, 'They consist of fried lentil dumpling fritters, dunked in creamy whipped yogurt and topped with chutneys.', 'imgs/dahipuri.jpg'),
(1, 6, 'BHEL-PURI', 40.00, 'Bhel Puri is a very popular Mumbai street food snack made with puffed rice, potatoes, onions, chutneys.', 'imgs/bhelpuri.jpg'),
(1, 7, 'SAMOSA', 40.00, 'Samosa feature a pastry-like crust but are filled with savory potatoes and peas for a hearty, delicious snack.', 'imgs/samosa.jpg'),
(1, 8, 'KACHORI', 40.00, 'Filling can be varied from savory to sweet, from potato & peas to lentils and even onions.', 'imgs/kachori.jpg'),
(2, 9, 'DOSA', 25.00, 'Dosa can be served for morning breakfast or also as an evening snack with coconut chutney and sambar. It is most loved breakfast of South India.', 'imgs/dosa.jpg'),
(2, 10, 'IDLI', 25.00, 'Idli with coconut chutney and sambar can never go wrong. It is prepared from rice and urad dal. This is famous especially in Bangalore and Mysore.', 'imgs/idli.jpg'),
(2, 11, 'PONGAL', 25.00, 'It is a popular south indian savoury and spicy dish, made from moong dal,rice and other spices, served with sambar chutneys.', 'imgs/pongal.jpg'),
(2, 12, 'VADA', 20.00, 'It is an ideal evening snack, which can also be served for morning breakfast with a choice of idli and spicy chutneys.', 'imgs/vada.jpg'),
(2, 13, 'UPMA', 20.00, ' A classic south indian breakfast recipe made with rava with assorted spices\r\n                        and herbs.', 'imgs/upma.jpg'),
(2, 14, 'POORI', 35.00, 'Poori is served for breakfast or for lunch and dinner, with aloo bhaji. It is everybody\'s favourite.', 'imgs/puri.jpg'),
(2, 15, 'RAGI MUDDE', 25.00, 'A healthy and a filling wholesome meal from karnataka cuisine, served with saaru or bassaru', 'imgs/ragi.jpg'),
(2, 16, 'SOUTH MEALS', 40.00, 'A combination of different tastes and flavours mixed with rice as main dish and served on banana leaf.', 'imgs/sthali.jpg'),
(3, 17, 'CHAPATHI', 30.00, 'A flatbread recipe made with just wheat flour for both lunch and dinner. Served with dal or any other side dish.', 'imgs/chapati.jpg'),
(3, 18, 'PARATHA', 35.00, 'A unique and popular paratha made with plain flour. Generally served with kurma or even spicy chutney recipes', 'imgs/parota.jpg'),
(3, 19, 'ALOO PARATHA', 40.00, 'A classical north indian stuffed bread recipe made with wheat flour and spiced potato mash for stuffing.', 'imgs/alooparatha.jpg'),
(3, 20, 'CHOLA BATURA', 30.00, 'It is a popular street food meal, generally eaten as a breakfast, but can be served any time of the day.', 'imgs/batura.jpg'),
(3, 21, 'VEG PULAV', 40.00, 'Flavoured rice recipe made with long grain rice, choice of vegetables and fresh herbs. Tastes great when served with simple yoghurt raita.', 'imgs/pulav.jpg'),
(3, 22, 'BIRIYANI', 40.00, 'Indian rice biriyani made with a combination of vegetables and a blend of spices.\r\nThe flavours of biriyani are irresistible.', 'imgs/biriyani.jpg'),
(3, 23, 'JEERA RICE', 40.00, 'An easy and flavoured rice recipe made with cumin seeds, ghee and basmati rice. Served with dal and any gravy based curries.', 'imgs/jeera.jpg'),
(3, 24, 'NORTH MEALS', 40.00, 'A combination of different tastes and flavours mixed with chapati/poori as main dish, paneer sabzi and more. Served on thali.', 'imgs/nthali.jpg'),
(4, 25, 'VEGGIE PIZZA', 100.00, 'A medium sized pizza, for everyone a treat that goes easy on the spices,the onions, the capsicum, those delectable mushrooms, paneer and golden corn.', 'imgs/vegpizza.jpg'),
(4, 26, 'CHEESE n TOMATO PIZZA', 120.00, 'Medium sized pizza loaded with cheese, crisp capsicum and juicy tomatoes with a liberal sprinkling of exotic Mexican herbs.', 'imgs/cheesentomato.jpg'),
(4, 27, 'WHITE PASTA', 120.00, 'White Sauce Pasta! With its silky smooth and aromatic sauce made from butter, milk and flour will leave you an exotic taste. Prepared by foodie\'s talented chefs..                                         ', 'imgs/whitepasta.jfif'),
(4, 28, 'RED PASTA', 120.00, 'Red sauce pasta made of pasta and exotic veggies like tomatoes, bell peppers, onion and garlic with fresh herbs.  Prepared by foodie\'s talented chefs..          ', 'imgs/redpasta.jfif'),
(5, 29, 'CLASSIC BURGER', 100.00, 'Extra crunchy veg Patty, fresh onion, crispy lettuce,\r\njuicy tomatoes, tangy gherkins, creamy and smoky sauces', 'imgs/burger.jfif'),
(5, 30, 'CHEESE BURGER', 120.00, 'Our Spicy & Crunchy Patty topped with crispy lettuce, juicy tomatoes and creamy sauce with our unique corn.', 'imgs/cheeseburger.jpg'),
(5, 31, 'FRENCH FRIES', 120.00, 'Crispy, Tender and Golden Fried Potatoes. Served with Snack Dressing and Cheesy Veg Mayonnaise Dip.', 'imgs/frenchfries.jfif'),
(5, 32, 'POTATO WEDGES', 120.00, 'A shareable portion of lightly seasoned and spiced potato wedges fried until crispy. Just irresistible', 'imgs/wedges.jfif'),
(6, 33, 'ORANGE', 30.00, 'Fresh, chill and healthy Orange Juice.....', 'imgs/orange.jfif'),
(6, 34, 'WATERMELON', 25.00, 'Chill and refreshing watermelon juice...', 'imgs/watermelon.jfif'),
(6, 35, 'CHOCOLATE SHAKE', 60.00, 'Everybody\'s favourite CHOCOLATE can never go wrong..', 'imgs/chocolate.jfif'),
(6, 36, 'STRAWBERRY SHAKE', 60.00, 'A sweet and refreshing strawberry milkshake is the perfect drink..', 'imgs/strawberry.jfif'),
(7, 37, 'COFFEE', 20.00, 'Start your day with a cup of coffee..', 'imgs/coffee.jpg'),
(7, 38, 'TEA', 20.00, 'Start your day with a cup of tea..', 'imgs/tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`category_id`, `category_name`) VALUES
(1, 'Chaats'),
(2, 'South-Indian'),
(3, 'North-Indian'),
(4, 'Pizzas & Pastas'),
(5, 'Burgers & Fries'),
(6, 'Juices & Shakes'),
(7, 'Hot Beverages');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cust_email` (`cust_email`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD PRIMARY KEY (`no`),
  ADD KEY `cust_email` (`cust_email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart_orders`
--
ALTER TABLE `cart_orders`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`cust_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD CONSTRAINT `cart_orders_ibfk_1` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`cust_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `menu` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
