-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 25, 2022 at 11:45 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Foods.io`
--
CREATE DATABASE IF NOT EXISTS `Food.io` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Food.io`;
-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(128) NOT NULL,
  `restaurant_password` varchar(255) NOT NULL,
  `restaurant_description` varchar(500) NOT NULL,
  `address` varchar(250) NOT NULL,
  `owner_name` varchar(128) NOT NULL,
  `phone` char(10) NOT NULL,
  `restaurant_email` varchar(250) NOT NULL,
  `restaurant_type` varchar(25) NOT NULL,
  PRIMARY KEY (`restaurant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `role` char(1) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`user_ID`),
  CONSTRAINT CHECK_user_role CHECK (role IN ('U', 'A'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `restaurant_ID` int(11) NOT NULL,
  PRIMARY KEY (`follow_ID`),
  KEY `restaurant_ID` (`restaurant_ID`),
  KEY `user_ID` (`user_ID`),
  CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`),
  CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_ID` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_ID` int(11) NOT NULL,
  `food_name` varchar(128) NOT NULL,
  `food_description` varchar(500) NOT NULL,
  `food_type` varchar(16) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`food_ID`),
  KEY `restaurant_ID` (`restaurant_ID`),
  CONSTRAINT `food_ibfk_1` FOREIGN KEY (`restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` char(1) NOT NULL,
  `review_date` date NOT NULL,
  `response` varchar(500) NOT NULL,
  PRIMARY KEY (`review_ID`),
  KEY `restaurant_ID` (`restaurant_ID`),
  KEY `user_ID` (`user_ID`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`restaurant_ID`) REFERENCES `restaurant` (`restaurant_ID`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`),
  CONSTRAINT CHECK_review_rating CHECK (rating IN ('1','2','3','4','5'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- INSERT commands 

INSERT INTO `user` (`username`, `password`, `name`, `user_email`, `role`) 
VALUES ('m_watts10', '2ee787aa6c8d7f27fadec774f6fb76df', 'Miranda Watts', 'miranda_w@yahoo.com', 'A'),
('John12', '3f636a2b633c45039894ee8f7b502a3a', 'John Hatfield', 'HatfieldJ@gmail.com', 'U'),
('tommy_smith', '627cf356c8c420cdacca961ebcada994', 'Tommy Smith', 'tsmith@hotmail.com', 'U'),
('jenny_01', 'e2eb7465e39db51504203ed1a7f1fae8', 'Jennifer Stone', 'JStone@gmail.com', 'A'),
('foodlover21', '5d7e1dafdfd2620c59864c2d03dee382', 'Sally Johnson', 'sally_j_1995@yahoo.com', 'U'),
('bsmith', '437bf775c66d56bc554ddf7bce6da303', 'Ben Smith', 'BenSmith2@gmail.com', 'A'),
('m_watts10', '2ee787aa6c8d7f27fadec774f6fb76df', 'Miranda Watts', 'miranda_w@yahoo.com', 'A'),
('jon01', '35aadb27e524d87b8ebba32ae89db1bf', 'Jon Sesame', 'jons@gmail.com', 'U'),
('harry1', '27b78a44a450d7d5d14bdcc54bccc9be', 'Harry Smith', 'hsmith@hotmail.com', 'U'),
('bettyOfSmith', 'c31b787ad836b0ff74bba37777f32afd', 'Betty Smith', 'bsmith@gmail.com', 'U'),
('theguy01', '2697f327b6fa02edcf5376345f4eec1d', 'Guy Johnson', 'guyjohn@yahoo.com', 'U'),
('TadGo', '2758a52dd09031dbb8b6ac3acbc9e381', 'Tad Gorrand', 'tgmax@gmail.com', 'U'),
('myval', '5010f1b81d888e6d7e3f9135b47221ff', 'Miranda Valentine', 'miranda_val@yahoo.com', 'U'),
('johncena', 'f8bc8dffb903563ba9e6a205e8e6f63c', 'John Cena', 'jcena4lyfe@gmail.com', 'U'),
('tomjones', '7f0fd43f2b867f75d9a0c03553e00cb3', 'Tommy Jones', 'tjonesss@hotmail.com', 'U'),
('candice01', 'fd5e94cf739e4c9dc43f5c6e0d506df3', 'Candice Stone', 'CanStone@gmail.com', 'U'),
('greeklover', '044999be376c30c7a09375668ccf475e', 'Alexios Beyane', 'greekfoodrocks@yahoo.com', 'U'),
('sneakyman', '5ebd1c53b3cf93f5647721d8710a0c0f', 'Ezio Auditore', 'bladeboi12@gmail.com', 'U'),
('lHassan', 'efa7962610fd8c2f6a418ac6ae3f4805', 'Layla Hassan', 'animusaddict@yahoo.com', 'U'),
('deimos12', '3ca6e7e90b9a87c273652133c0ff2bf9', 'Deimos Pythagoras', 'alwayskassandra@yahoo.com', 'U'),
('othersneakyman', '7acf4dc1c4078bc6178ecfeef8ebf24a', 'Altair Ibn-La-Ahad', 'sulkingdude@gmail.com', 'U'),
('dmiles888', '0ad0cbe2e37d58696d26f17f70329cf0', 'Desmond Miles', 'alwaysbeingkidnapped@yahoo.com', 'U'),
('pjones', 'f8f236ebed199333f89002fffc023487', 'Peter Jones', 'pjones@yahoo.com', 'U');

INSERT INTO `restaurant` (`restaurant_name`, `restaurant_password`, `restaurant_description`, `address`, `owner_name`, `phone`, `restaurant_email`, `restaurant_type`)
VALUES ('Slices', '26fa324d689234e02237aac59f0890b4', 'Pizza by the slice, new specials every week!', '4333 Hickory Street\r\nSalt Lake City, UT 84111', 'Edgar Cobb', '8017050546', 'slicesslc@yahoo.com', 'Italian'),
('Hungry House', 'b38c421a576ef98cd4f374e9e3f1c952', 'Customizable rice bowls to satisfy any appetite', '2868 White River Way\r\nWest Valley City, UT 84120', 'Katelyn Burton', '4354019656', 'contactus@hungryhouse.com', 'American'),
('Just Like Home', '74802858fb0555022f464b4a9f67478c', 'Homestyle dishes made fresh everyday. Open for dine in or carry out.', '4757 Kemper Lane\nFairview, UT 84629', 'Tess Walmsley', '4352629277', 'JustLikeHomeUtah@yahoo.com', 'American'),
('Golden Peach', '08bd9b5320d60adc403e8cb33b7703a1', 'Traditional Chinese style cooking with a twist. Come join us on Saturdays for half price appetizers!', '1379 Tori Lane\nDraper, UT 84020', 'Teri Reyes', '8015718805', 'about@goldenpeachdraper.com', 'Asian'),
('Taste of Italy', '12539c58c08c997cba52432047a75910', 'Voted best fettuccine in Utah 3 years in a row!', '4488 Philadelphia Avenue\nSalt Lake City, UT 84101', 'Darcey Glover', '8013163211', 'contactus_tasteofitaly@gmail.com', 'Italian'),
('Aphrodite Grill', '34159b88d236570aded3ee9d2ff21796', 'Serving Utah’s most authentic Greek dishes since 2014!', '9047 S Tolman Farms Cir Sandy, UT 84070', 'Lani Barclay', '8012527098', 'contactus@aphroditegrill.com', 'Greek'),
('The Taco Shack', 'd3881ec4fd3e64c24013dbe592fd96f3', 'Taco Tuesday, everyday!', '827 Fox Meadow Dr \nDraper, UT 84020', 'Isabella Hinton', '8014952209', 'help@thetacoshackdraper.com', 'Mexican'),
('Prime Cut Steakhouse', '8f5d235318e2d5183dd3bd7140bb0c4f', 'Taste and quality are our top priorities, and we won’t settle for anything less', '715 E Green Valley Dr Salt Lake City, UT 84107', 'Jenson Spencer', '8012630938', 'contactus@PrimeCut.com', 'Steakhouse'),
('Wasatch Subs', '0ae0afaf4f90a96212bf89ebb2bbe46f', 'Not your typical sandwich shop--choose from one of our handcrafted subs or create your own!', '9034 Quarry Stone Way Sandy, UT 84094', 'Andrea York', '8012557928', 'WasatchSubs@gmail.com', 'Sandwiches'),
('Roots', 'f0aaefb27f63d8ada51ece47d5a886f7', 'Botomless coffee, specialty lattes, and decadent pastries that are guarenteed to please!', '3350 S 2300 E Millcreek, UT 84109', 'Savanna Haney', '8013522324', 'contactus@rootscafe.com', 'Cafe'),
('Yum Town', '04fb37bd36aaef43d9511f245fb0c9e7', 'Take a trip to yum town.', '2100  WINTER EAGLE MOUNTAIN UT 84005-4279 USA', 'Desmond Miles', '5556771234', 'yumtown@fish.cat', 'Comfort'),
('Food Lyfe', '74bcaff4fa89cb39530ddf0328acdd1a', 'Come live the food life.', '251 E 1300 BOUNTIFUL UT 84010-4538 USA', 'Gindy Matters', '5551239921', 'foodlyfe@gmail.com', 'Comfort'),
('Mama Mia', 'fae306db2be264e8e0ce4585611fe25e', 'Come enjoy our world class pasta, award winning in 2 states and oddly enough in Mexico.', '2199  RIDGEWOOD BOUNTIFUL UT 84010-1603 USA', 'George Boyd', '5550183648', 'mamamiarestaurant@gmail.com', 'Italian'),
('Hamboning', 'f918a0fd48771697c6b3f0df0b75a2c5', 'We serve ham in every way possible.', '200 W 1450 AMERICAN FORK UT 84003-3746 USA', 'Ham Boening', '5550019274', 'hamman@gmail.com', 'American'),
('Bread Town', 'c9e6cf21329fb97938fa71163fb1316d', 'We literally just give you bread that is all.', '751  QUALITY AMERICAN FORK UT 84003-3367 USA', 'Mr Bread', '5554837263', 'mrbread@mrbread.net', 'American'),
('Cupcake Mansion', '81863e0d2515515d3962236211ff0806', 'We serve cupcakes for everyone to enjoy.', '1600  SHADOW EAGLE MOUNTAIN UT 84005-4771 USA', 'Muffin Man', '5550175223', 'cupyum@gmail.com', 'Comfort'),
('Desert Palace', 'bfbbc763f939ebbd3a1e363cb9f5d1ed', 'We serve deserts from all over the world, come enjoy our sugary snacks!', '7700 N DECRESCENDO EAGLE MOUNTAIN UT 84005-5795 USA', 'Palace Man', '3339383737', 'palace@gmail.com', 'Comfort'),
('Grove of Italy', '566cfb476531d26a8e59d5a33de9ef8b', 'We have all sorts of rare foods from every corner of italy.', '97 N 300 AMERICAN FORK UT 84003-1480 USA', 'Ma Donden', '7220198272', 'gitaly@gmail.com', 'Italian'),
('Pint Town', '73ada4ee5ca87c18d685a12d2373c6cf', 'We have beer from all over the world, come enjoy it!', '9701 N ELK RIDGE EAGLE MOUNTAIN UT 84005-5409 USA', 'John Seeds', '7169283763', 'pinttown@gmail.com', 'American'),
('Italy Town', '9a87ed470970c5c7de7659579830e180', 'We have italian food from all over the world, come enjoy it!', '143 N 800 AMERICAN FORK UT 84003-2062 USA', 'Faith Seeds', '9271727282', 'italytown@gmail.com', 'Italian'),
('Sandwich Town', '79b8d4058bd053bafd1c0778522e019f', 'We have sandwiches from all over the world, come enjoy it!', '1001 E 900 BOUNTIFUL UT 84010-2718 USA', 'Jacob Seeds', '1016276272', 'sandwichtown@gmail.com', 'American');

INSERT INTO `food` (`restaurant_ID`, `food_name`, `food_description`, `food_type`, `price`) VALUES
(1, 'Cheese Slice', 'Made to order with your choice of sauces & toppings but will have marinara and our house mozzarella & Monterey Jack blend', 'Slices', '4.00'),
(1, 'Garlic Rolls', 'Our sourdough rolls covered with extra virgin olive oil, herbs, & parmesan cheese', 'Appetizer', '6.50'),
(1, 'Calzone', 'We fold your choice of up to four fillings into our sourdough crust, along with marinara, ricotta & our house-blend cheese', 'Entrees', '7.00'),
(1, 'Custom Slice', 'A slice of our original cheese with your choice of toppings', 'Slices', '4.50'),
(2, 'Create Your Own', 'Choose one base, two protiens, and add as many toppings as you want', 'Entree', '10.99'),
(2, 'Chicken Bowl', 'Our signature grilled chicken with your choice of rice or quinoa, topped with fresh veggies and our special sauce', 'Entree', '9.99'),
(2, 'The Vegetarian ', 'Tofu, chickpeas, and quinoa topped with fresh vegetables and our spciy peanut sauce', 'Entree', '8.99'),
(2, 'The PB Lover', 'Organic Açai, almond milk, apple juice, peanut butter, bananas, and organic flax seed blended to perfection. Topped with banana slices, crushed peanuts, creamy peanut butter, granola, and honey.', 'Dessert', '10.99'),
(3, 'Loaded Mac & Cheese', 'Our famous mac & cheese made with 4 kinds of cheeses and topped with chicken and bacon bits', 'Entree', '9.99'),
(3, 'Biscuits and Gravy', 'Homemade biscuits topped with our own gravy recipe', 'Side', '8.99'),
(3, 'Chicken Pot Pie', 'Just like your mother used to make! Made with our famous house-made flaky crust', 'Entree', '9.99'),
(3, 'Lasagna', 'Served with a side salad and fresh Artisan bread', 'Entree', '10.99'),
(4, 'Chicken Lettuce Wraps', 'Our seasoned chicken served with iceberg lettuce and our house-made sauce', 'Appetizer', '7.25'),
(4, 'Hot & Sour Soup', 'Enjoy a bowl before your meal', 'Appetizer', '3.95'),
(4, 'Orange Chicken', 'Served family style with steamed rice', 'Entree', '9.99'),
(4, 'Beef & Broccoli', 'Served family style with steamed rice', 'Entree', '9.99'),
(5, 'Fried Calamari', 'Served with our homemade spicy marinara', 'Appetizer', '9.99'),
(5, 'Bruschetta', 'Roma tomatoes, fresh mozzarella, red onions, basil-infused olive oil & balsamic vinegar, served with parmesan crostini', 'Appetizer', '9.99'),
(5, 'Fettuccine Alfredo', 'A classic favorite featuring fettuccine tossed with our creamy homemade Alfredo sauce', 'Entree', '15.99'),
(5, 'Caesar Salad', 'Caesar dressing with roasted garlic croutons & shredded parmesan', 'Salads', '10.99'),
(6, 'Traditional Gyro', 'Freshly made pita bread with our signature beef and lamb gyro. Topped with feta cheese, tomatoes, onions, cucumbers, and olives. Served with your choice of side', 'Entree', '9.99'),
(6, 'Hummus & Pita', 'Blend of ground garbanzo beans, tahini, and lemon. Served with fresh pita', 'Side', '6.00'),
(6, 'Loaded Greek Fries', 'Topped with minced garlic and feta cheese and tossed on our delicious garlic-parsley vinagrette', 'Side', '8.00'),
(6, 'Baklava', 'Sweet, flaky pastry filled with a buttery crumble of nuts and cinnamon. Drizzled with fresh raw honey', 'Dessert', '4.00'),
(7, 'Street Tacos', 'Rice, black beans, sweet corn, pico de gallo, and our house-made cilantro ranch served with corn tortillas and loaded with your choice of meat', 'Entree', '9.99'),
(7, 'Taco Salad', 'Like a taco without the shell. Includes your choice of meat and dressing', 'Entree', '12.99'),
(7, 'Taco Shack Tacos', '3 hard shell corn tortillas filled with your choice of seasoned shredded beef or chicken, garnished with lettuce, guacamole, and our house-made salsa', 'Entree', '9.99'),
(7, 'Guacamole and Chips', 'Avocado, onions, cilantro, and our house-made salsa. Made fresh daily.', 'Appetizer', '10.99'),
(8, 'Grilled Brie', 'One of our signatures. Topped with apples, roasted pecans, and cranberries', 'Appetizer', '12.99'),
(8, 'Caprese Salad', 'Made with fresh tomoatoes, basil and mozzarella', 'Appetizer', '10.99'),
(8, 'Prime Rib', 'Topped with au jus and creamed horseradish. Served with your choice of side', 'Entree', '32.99'),
(8, 'BBQ Baby Back Ribs', 'Smothered in house made BBQ glaze and served with hand cut fries', 'Entree', '24.99'),
(9, 'Turkey Bacon Wrap', 'Tender turkey, crisp bacon, and creamy ranch dressing wrapped in our house-made wheat tortilla', 'Entree', '7.99'),
(9, 'The Wasatch', 'Roasted chicken breast, pepperoni, and pepperjack cheese on our signature sourdough bread', 'Entree', '8.99'),
(9, 'Grilled Chicken Sub', 'Grilled chicken breast strips and provolone cheese. Heated to perfection on your choice of bread', 'Entree', '8.99'),
(9, 'Create Your Own', 'Create the sandwhich of your dreams. Choose from our selection of cheeses, premium deli meats and fresh baked breads', 'Entree', '10.99'),
(10, 'Coffee Cake', 'Buttery with a cinnamon sugar layer, topped with walnut crumbs sweet glaze icing', 'Pastries', '4.00'),
(10, 'Muffin', 'Assorted flavors of individual sized muffins. Baked fresh in house daily!', 'Pastries', '5.00'),
(10, 'Bottomless Coffee', 'Your cup will never be empty!', 'Drinks', '2.95'),
(10, 'Roots Latte', 'Steamed milk, blonde espresso, topped with cinnamon dust', 'Drinks', '4.50');



INSERT INTO `review` (`restaurant_ID`, `user_ID`, `subject`, `review`, `rating`, `review_date`, `response`) VALUES
(1, 3, 'Best slice in Utah!', 'My family has been coming here for years. The BBQ chicken slice with added pineapple is the best!', '4', '2022-07-02', ''),
(6, 2, 'Worth the price!', 'Their dishes are a little more expensive but the quality of the food is unmatched! Most authentic gyro in Utah', '5', '2021-12-05', ''),
(7, 1, 'A lot of options', 'Highly recommend the nachos! Every dish tastes fresh and I love the vibe', '5', '2021-06-12', ''),
(10, 5, 'Quiet and clean', 'I could spend hours reading here. Their frappes are better than starbucks and the chocolate chip muffin is to die for!', '5', '2022-02-10', ''),
(4, 4, 'Loyal customer', 'Super fast service and food is always perfectly prepared.', '5', '2021-10-15', ''),
(5, 3, 'Satisfied customer', 'Large portions and top quality. Tastes fresh and authentic every time', '5', '2022-03-10', ''),
(2, 2, 'More vegetarian options', 'I was slightly disappointed with the number of vegetarian options, but what I ordered was delicious!', '3', '2021-09-14', ''),
(3, 1, 'Slow service', 'I come here all the time with my wife. The service is a little slow, but the food is worth the wait.', '4', '2021-05-16', ''),
(8, 3, 'Top Notch', 'Brought a business client here for lunch and had a great experience. Fast service, high quality dishes, and an extensive wine list', '5', '2021-11-12', ''),
(9, 4, 'Ditch Subway', 'The Wasatch sub is the best! Only sandwich shop in Utah I go to', '4', '2022-01-15', ''),
(2, 1, 'Was okay', 'i had an okay time here the food was alright', '3', '2022-01-15', ''),
(2, 3, 'Couldve been worse', 'The food was all pallatable kind of average though.', '3', '2022-01-15', ''),
(2, 4, 'Great food!', 'I was surprised how great the food was here, definitely make the trip1', '4', '2022-01-15', ''),
(2, 5, 'Good food, nice owner', 'This is a great restaurant with a local feel and an owner who really cares.', '5', '2022-01-15', ''),
(2, 6, 'Terrible service', 'Sat around for 1 hour waiting for my food and got nothing but excuses and attitude from the employees.', '1', '2022-01-15', ''),
(2, 7, 'Meh.', 'Food was okay, my daughter found a hair in her food so we wont be coming back.', '2', '2022-01-15', ''),
(2, 8, 'very good', 'The food here is to die for! I come here every week after work.', '4', '2022-01-15', ''),
(2, 9, 'Best restaurant in utah', 'Hard to beat prices this amazing with food this delicious.', '5', '2022-01-15', ''),
(3, 2, 'Okay food ', 'I think I will stick to the chain version but it was cute to visit.', '3', '2022-01-15', ''),
(3, 3, 'Wont be coming back here', 'The wait time is long and the food is average, would not recommend.', '2', '2022-01-15', ''),
(3, 7, 'It is alright', 'I have had much better food, at least the atmosphere was nice.', '2', '2022-01-15', '');



INSERT INTO `follow` (`user_ID`, `restaurant_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(2, 7),
(3, 7),
(3, 10),
(3, 3),
(3, 5),
(4, 8),
(5, 6),
(5, 1),
(5, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






