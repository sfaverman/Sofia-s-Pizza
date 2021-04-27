-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2021 at 10:47 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9575535_sofia_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp19_admin`
--

CREATE TABLE `sp19_admin` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_admin`
--

INSERT INTO `sp19_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$hxq1qZuHxuyTJHsv7kJg4.3KV/6.4O2ittpta86nWdjND5lLvCWE2'),
(2, 'sfaverman', '$2y$10$yjT6FXZlrbhwTNFFb2.siuWZu5ZIupQgq9WVvnBGZebpePEMTO5Fi');

-- --------------------------------------------------------

--
-- Table structure for table `sp19_attributes`
--

CREATE TABLE `sp19_attributes` (
  `prodid` int(5) NOT NULL,
  `labelid` int(5) NOT NULL,
  `value` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_attributes`
--

INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
(1, 1, 'S', 7.99),
(1, 1, 'M', 9.99),
(1, 1, 'L', 11.99),
(1, 1, 'XL', 13.99),
(2, 1, 'S', 8.49),
(2, 1, 'M', 10.99),
(2, 1, 'L', 14.99),
(2, 1, 'XL', 16.99),
(3, 1, 'S', 8.49),
(3, 1, 'M', 10.99),
(3, 1, 'L', 14.99),
(3, 1, 'XL', 16.99),
(4, 1, 'S', 8.49),
(4, 1, 'M', 10.99),
(4, 1, 'L', 12.99),
(4, 1, 'XL', 14.99),
(5, 1, 'S', 8.49),
(5, 1, 'M', 10.99),
(5, 1, 'L', 14.99),
(5, 1, 'XL', 16.99),
(6, 1, 'S', 8.99),
(6, 1, 'M', 11.49),
(6, 1, 'L', 13.99),
(6, 1, 'XL', 15.99),
(7, 1, 'S', 8.49),
(7, 1, 'M', 10.99),
(7, 1, 'L', 14.99),
(7, 1, 'XL', 16.99),
(8, 1, 'S', 11.49),
(8, 1, 'M', 14.49),
(8, 1, 'L', 16.99),
(8, 1, 'XL', 18.99),
(9, 1, 'S', 11.49),
(9, 1, 'M', 14.49),
(9, 1, 'L', 16.99),
(9, 1, 'XL', 18.99),
(10, 1, 'S', 8.49),
(10, 1, 'M', 10.99),
(10, 1, 'L', 12.99),
(10, 1, 'XL', 14.99),
(11, 1, 'S', 11.49),
(11, 1, 'M', 14.49),
(11, 1, 'L', 16.99),
(11, 1, 'XL', 18.99),
(12, 1, 'S', 11.49),
(12, 1, 'M', 14.49),
(12, 1, 'L', 16.99),
(12, 1, 'XL', 18.99),
(13, 1, 'S', 8.49),
(13, 1, 'M', 10.99),
(13, 1, 'L', 12.99),
(13, 1, 'XL', 14.99),
(14, 1, 'S', 10.49),
(14, 1, 'M', 13.49),
(14, 1, 'L', 15.99),
(14, 1, 'XL', 17.99),
(15, 1, 'S', 8.49),
(15, 1, 'M', 10.99),
(15, 1, 'L', 14.99),
(15, 1, 'XL', 16.99),
(16, 1, 'S', 8.49),
(16, 1, 'M', 10.99),
(16, 1, 'L', 14.99),
(16, 1, 'XL', 16.99),
(17, 1, 'Whole', 8.49),
(17, 1, 'Half', 5.49),
(18, 1, 'Whole', 12.99),
(18, 1, 'Half', 7.99),
(19, 1, 'Whole', 9.99),
(19, 1, 'Half', 6.49),
(20, 1, '6oz', 13.99),
(20, 1, '4oz', 11.49),
(21, 1, 'Whole', 10.99),
(21, 1, 'Half', 6.99),
(22, 1, 'Whole', 8.99),
(22, 1, 'Half', 5.99),
(23, 1, 'Whole', 9.99),
(23, 1, 'Half', 5.99),
(24, 1, 'Whole', 11.99),
(24, 1, 'Half', 7.49),
(25, 1, 'Whole', 7.99),
(25, 1, 'Half', 4.99),
(26, 1, 'Whole', 14.99),
(26, 1, 'Half', 9.49),
(28, 1, 'Whole', 14.99),
(28, 1, 'Half', 9.49),
(29, 1, 'Whole', 7.99),
(29, 1, 'Half', 4.99),
(30, 1, 'Whole', 11.99),
(30, 1, 'Half', 7.49),
(31, 1, 'Large', 7.99),
(31, 1, 'Small', 4.99),
(32, 1, 'Large', 9.99),
(32, 1, 'Small', 6.49),
(33, 1, 'Large', 7.99),
(33, 1, 'Small', 4.99),
(34, 1, 'Large', 8.99),
(34, 1, 'Small', 5.49),
(35, 1, 'Large', 11.99),
(35, 1, 'Small', 7.49),
(36, 1, 'Large', 8.99),
(36, 1, 'Small', 5.49),
(37, 1, 'Large', 8.99),
(37, 1, 'Small', 5.49),
(38, 1, 'Large', 13.99),
(38, 1, 'Small', 8.49),
(39, 1, 'Large', 12.99),
(39, 1, 'Small', 7.49),
(40, 1, 'Whole', 18.99),
(40, 1, 'Half', 10.49),
(40, 1, 'Slice', 3.49),
(41, 1, 'Whole', 16.99),
(41, 1, 'Half', 7.99),
(41, 1, 'Slice', 2.49),
(42, 1, 'Whole', 16.99),
(42, 1, 'Half', 7.99),
(42, 1, 'Slice', 2.49),
(43, 1, 'Whole', 11.99),
(43, 1, 'Half', 6.49),
(43, 1, 'Slice', 1.99),
(44, 1, 'Piece', 2.49),
(44, 1, 'Dozen', 23.99),
(45, 1, 'Whole', 14.99),
(45, 1, 'Half', 6.99),
(45, 1, 'Slice', 1.99);

-- --------------------------------------------------------

--
-- Table structure for table `sp19_cartitems`
--

CREATE TABLE `sp19_cartitems` (
  `productid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `label` int(5) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_cartitems`
--

INSERT INTO `sp19_cartitems` (`productid`, `qty`, `sessionid`, `label`, `attribute`) VALUES
(17, 1, '', 0, ''),
(2, 1, 'fba9920edf10764d3408bbb845e5b24b', 0, ''),
(18, 1, 'fba9920edf10764d3408bbb845e5b24b', 0, ''),
(2, 2, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(22, 1, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(24, 3, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(13, 2, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(17, 1, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(14, 1, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(3, 1, 'ebc1ede76e985676e5e707f0c9806fc3', 0, ''),
(45, 1, 'bd574c54963e66c8f5d9cd40fcffb61d', 0, ''),
(2, 1, '3f059d5fc3ba343447aea148e147287e', 0, ''),
(7, 1, '3f059d5fc3ba343447aea148e147287e', 0, ''),
(14, 1, '3f059d5fc3ba343447aea148e147287e', 0, ''),
(13, 1, '3f059d5fc3ba343447aea148e147287e', 0, ''),
(17, 1, '3f059d5fc3ba343447aea148e147287e', 0, ''),
(15, 2, '9cc5acfbe7b492e4f922f1633901d400', 0, ''),
(4, 1, '9cc5acfbe7b492e4f922f1633901d400', 0, ''),
(2, 1, 'b1ab2d16ccf8639395326d408fdd5400', 0, ''),
(41, 2, 'b1ab2d16ccf8639395326d408fdd5400', 0, ''),
(8, 1, 'lhmisiofsc7qpjn0vjftnf12q8', NULL, NULL),
(1, 1, 'lhmisiofsc7qpjn0vjftnf12q8', NULL, NULL),
(17, 2, 'lhmisiofsc7qpjn0vjftnf12q8', NULL, NULL),
(11, 1, 'qecoghtrkaig985f51pe0gp2cr', NULL, NULL),
(18, 2, 'qecoghtrkaig985f51pe0gp2cr', NULL, NULL),
(2, 1, 'qecoghtrkaig985f51pe0gp2cr', NULL, NULL),
(1, 1, 'p8k0ietn8rti1r05sbc28tq988', NULL, NULL),
(7, 1, '4663m68r1g7c2fhio3551dunqa', NULL, NULL),
(4, 1, '4663m68r1g7c2fhio3551dunqa', NULL, NULL),
(8, 1, '4663m68r1g7c2fhio3551dunqa', NULL, NULL),
(17, 1, '4663m68r1g7c2fhio3551dunqa', NULL, NULL),
(8, 2, '3kfklh9qn03e1d34s7gve79bbr', NULL, NULL),
(17, 1, '3kfklh9qn03e1d34s7gve79bbr', NULL, NULL),
(15, 2, 'nql2ug3giodrkbfmjl7j12e2k0', NULL, NULL),
(21, 2, 'nql2ug3giodrkbfmjl7j12e2k0', NULL, NULL),
(8, 2, 'mbfvvgfrtv6ln2jfqfihdssvbt', NULL, NULL),
(19, 2, 'mbfvvgfrtv6ln2jfqfihdssvbt', NULL, NULL),
(1, 1, '8eifkmoanjhrq9v7h1g1uasjfj', NULL, NULL),
(40, 2, '8eifkmoanjhrq9v7h1g1uasjfj', NULL, NULL),
(2, 2, 'al5e6c1praocil8f8notkm5rbn', NULL, NULL),
(1, 1, 'e5gig543odngki3a9b91jarvtl', NULL, NULL),
(3, 1, 'e5gig543odngki3a9b91jarvtl', NULL, NULL),
(9, 1, 'r49krvhkil6kagrn0sjmgsghgk', NULL, NULL),
(29, 1, 'r49krvhkil6kagrn0sjmgsghgk', NULL, NULL),
(1, 1, 'r49krvhkil6kagrn0sjmgsghgk', NULL, NULL),
(2, 1, 'd3blg57d4lcurumbn1herkaq2s', NULL, NULL),
(32, 1, 'kcclgunofaja4ncq5p3qt3bpgd', NULL, NULL),
(38, 2, 'kcclgunofaja4ncq5p3qt3bpgd', NULL, NULL),
(17, 2, 'ljh1hd1dm6impe9la8tnvuvphf', NULL, NULL),
(35, 1, '6ids6urev6qftg2ln4enrvc1ms', NULL, NULL),
(21, 1, '53itc1h2ertlhjvd1e71imnhqh', NULL, NULL),
(1, 2, '53itc1h2ertlhjvd1e71imnhqh', NULL, NULL),
(15, 1, '2bgvadecor4s7l0i2u8bsran5g', NULL, NULL),
(44, 1, '94jrttbhtt87t1hha3cgqggjd6', NULL, NULL),
(31, 1, '94jrttbhtt87t1hha3cgqggjd6', NULL, NULL),
(1, 1, '94jrttbhtt87t1hha3cgqggjd6', NULL, NULL),
(40, 1, '94jrttbhtt87t1hha3cgqggjd6', NULL, NULL),
(31, 2, 'ufi4a56u79h4bhcc1d8embq4q0', NULL, NULL),
(5, 1, '94jrttbhtt87t1hha3cgqggjd6', NULL, NULL),
(1, 1, 'a9q0ogkrud15go9efsg56efp2q', NULL, NULL),
(8, 1, 'a9q0ogkrud15go9efsg56efp2q', NULL, NULL),
(18, 1, 'a9q0ogkrud15go9efsg56efp2q', NULL, NULL),
(10, 2, 'a9q0ogkrud15go9efsg56efp2q', NULL, NULL),
(33, 1, '2pcm4p58uc02stgtp6cefp1lik', NULL, NULL),
(18, 1, 'mfr4555r7ktnsdu6tb3ebe0gas', NULL, NULL),
(19, 1, 'hvpm8c7r0iqus89la8df15fj10', NULL, NULL),
(8, 2, 'hvpm8c7r0iqus89la8df15fj10', NULL, NULL),
(32, 1, 'hvpm8c7r0iqus89la8df15fj10', NULL, NULL),
(17, 1, '625oi5ub8la6v2mcjteqd6nljc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sp19_categories`
--

CREATE TABLE `sp19_categories` (
  `catid` int(5) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_categories`
--

INSERT INTO `sp19_categories` (`catid`, `catname`) VALUES
(2, 'Pizzas'),
(3, 'Sandwiches'),
(4, 'Salads'),
(5, 'Desserts'),
(6, 'Beverages'),
(7, 'Parties');

-- --------------------------------------------------------

--
-- Table structure for table `sp19_labels`
--

CREATE TABLE `sp19_labels` (
  `labelId` int(5) NOT NULL,
  `labelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_labels`
--

INSERT INTO `sp19_labels` (`labelId`, `labelname`) VALUES
(1, 'Size'),
(2, 'Crust'),
(3, 'Cheese'),
(4, 'Sauce'),
(5, 'Toppings');

-- --------------------------------------------------------

--
-- Table structure for table `sp19_products`
--

CREATE TABLE `sp19_products` (
  `prodid` int(5) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `proddesc` text NOT NULL,
  `prodprice` decimal(9,2) NOT NULL,
  `link` varchar(255) NOT NULL,
  `featured` enum('yes','no') NOT NULL,
  `weeklyspecial` varchar(255) NOT NULL,
  `menutype` enum('Breakfast','Lunch','Dinner','All') NOT NULL DEFAULT 'All',
  `image` varchar(255) NOT NULL,
  `catid` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_products`
--

INSERT INTO `sp19_products` (`prodid`, `prodname`, `proddesc`, `prodprice`, `link`, `featured`, `weeklyspecial`, `menutype`, `image`, `catid`) VALUES
(1, 'Square Cheese Pizza', 'Classic thin crust square four cheese pizza baked to perfection.', 7.99, 'square-cheese-pizza', 'no', 'Mon', 'Lunch', 'pi-1', 2),
(2, 'Supreme Veggie Pizza', 'This Vegetarian Pizza is loaded with eggplant, carrots, and even more fresh veggies! The mixture of salty feta and creamy mozzarella really makes it much loved veggie pizza. ', 14.99, 'supreme-veggie-pizza', 'yes', 'Tue', 'Dinner', 'pi-2', 2),
(3, 'Spicy Bacon Pizza', 'This top-rated spicy bacon pizza is our customer\'s favorite. What makes this awesome chicken-and-bacon-topped pizza spicy? Pepper Jack cheese is what\'s behind the kick!\r\n', 14.99, 'spicy-bacon-pizza', 'yes', 'Wed', 'All', 'pi-3', 2),
(4, 'Red Pepper Pizza', 'Looking for a healthy and delicious pizza alternative?  You have to try this amazingly delicious roasted red pepper, eggplant and goat cheese square pizza baked to perfection.', 8.99, 'red-pepper-pizza', 'no', 'Thu', 'Lunch', 'pi-4', 2),
(5, 'Green Olive Pizza', 'This caramelized only, green olive and crispy and smoked canadian bakon pizza on a traditional pan is absolutely delicious in and of itself.', 14.99, 'green-olive-pizza', 'no', 'Fri', 'All', 'pi-5', 2),
(6, 'Classic Pepperoni Pizza', 'Our homemade like pepperoni pizza produces a delicious classic! An Italian-American favorite: chewy pizzeria crust, mild and creamy cheeses and our signature Italian-Style Pizza Sauce topped off with a generous handful of zesty pepperoni.', 9.99, 'classic-pepperoni-pizza', 'yes', 'Sat', 'All', 'pi-6', 2),
(7, 'Mediterranean Pizza', 'This Mediterranean Roasted Red Pepper is particular cheesy specimen, topped with roasted red peppers, sausage, and plenty of Monterey Jack cheese, is one of our stand-by pizzas.', 14.99, 'mediterranean-pizza', 'no', 'Sun', 'Dinner', 'pi-7', 2),
(8, 'Ollie Veggie Pizza', 'The ollie veggie thin crust pizza is made with green olives, onions, mashrooms, fresh tomatos, marinated artichoke hearts and fresh spinach.', 16.99, 'ollie-veggie-pizza', 'yes', 'Mon', 'Dinner', 'pi-8', 2),
(9, 'BBQ Chicken Pizza', 'This classic BBQ chicken pizza with tangy BBQ sauce, chicken, and red onion. Gouda cheese gives the homemade pizza the most delicious smoky flavor and cilantro adds a touch of freshness.  ', 16.99, 'bbq-chicken-pizza', 'no', 'Tue', 'All', 'pi-9', 2),
(10, 'Supreme Breakfast Pizza', 'It is basically a pizza topped with everything you would like for your breakfast. The topping combinations are  bacon, tomatoes, mozzarella, green peppers, olives, cooked eggs, onions and mushrooms. ', 12.99, 'supreme-breakfast-pizza', 'yes', 'Wed', 'Breakfast', 'pi-10', 2),
(11, 'Classic Supreme Pizza', 'The Classic Supreme pizza is one of our best sellers! Taste the fresh dough and homemade sauce. Toppings include pepperoni, black olives, green peppers and mashrooms.', 16.99, 'classic-supreme-pizza', 'yes', 'Thu', 'All', 'pi-11', 2),
(12, 'Half-Half Specialty Pizza  ', 'Half Sausage/Half Pepperoni Pizza - Damn That Looks Good! Additional toppings like mashrooms, pickles, corn, onions, black olives makes for a delicious pie!', 17.99, 'half-sausage-half-pepperoni-pizza', 'yes', 'Fri', 'All', 'pi-12', 2),
(13, 'Hawaiian Pizza', 'Hawaiian pizza is a traditional pan pizza topped with tomato sauce, cheese, fresh pineapple chunks, and ham and is baked to perfection.', 11.99, 'hawaiian-pizza', 'no', 'Sat', 'All', 'pi-13', 2),
(14, 'Grilled Eggplant Pizza', 'Rejoice pizza lovers who recently switched to a vegan diet! This Classic Vegan Pizza with Grilled Eggplant and Zucchini, black olives and spinach is every vegetarian dream!', 15.99, 'grilled-eggplant-pizza', 'yes', 'Sun', 'Dinner', 'pi-14', 2),
(15, 'Margherita Pizza', 'Margherita Pizza with Tomato, fresh Mozzarella and Basil leaves. This most iconic of pizzas that shows the colors of the Italian flag.', 14.99, 'margherita-pizza', 'yes', 'Mon', 'Dinner', 'pi-15', 2),
(16, 'Pepper and Mashroom Pizza', 'This delicious homemade pizza is topped with meaty portobello mushrooms, creamy mozzarella cheese, sweet red peppers and fresh basil. ', 14.99, 'pepper-mashroom-pizza', 'yes', 'Tue', 'All', 'pi-16', 2),
(17, 'Mediterranean Sandwich', 'Come tomato season, our favorite quick lunch is an open-face sandwich made from a slice of good bread toasted with melty cheese and topped with our favorite pesto, avocado, and fresh tomatoes. Great choice for picky vegetarians.', 8.99, 'mediterranean-sandwich', 'no', 'Mon', 'Lunch', 'san-1', 3),
(18, 'Grilled Beef Sandwich', 'This is our customer\'s delight sandwich!\r\nGrilled beef, roasted bell peppers, provolone cheese, onions, garlic and mayo.  We like it served with a nice fresh Caesar salad. Don\'t be intimidated by the extra sharp provolone\'s smell - it\'s really delicious.\r\n', 12.99, 'grilled-beef-sandwich', 'yes', 'Tue', 'Dinner', 'san-2', 3),
(19, 'Spinach Veggie Sandwich ', 'This Spinach and Carrot Sandwich is made on a wheat bun with fresh baby spinach leaves, roasted carrots, spring onions and lettuce is  great option for our vegetarian customers.', 9.99, 'spinach-sandwich', 'no', 'Wed', 'Lunch', 'san-3', 3),
(20, 'Classic Hamburger', 'Our famous 1/3 pound ground top sirloin juicy patty with real creamy american cheese, lettuce and dill pickles. You\'ll enjoy every bite. Served with our delicious Fries or Onion Rings.', 13.99, 'classic-hamburger', 'yes', 'Thu', 'All', 'san-4', 3),
(21, 'BBQ Chicken Sandwich', 'This picnic inspired barbeque grilled chicken sandwich is served on a toasted multigrain bun with french fries, romaine lettuce and fresh tomatos.', 10.99, 'bbq-chicken-sandwich', 'no', 'Fri', 'Lunch', 'san-5', 3),
(22, 'Breakfast Sandwich', 'Our Baked Croissant Breakfast Sandwiches are made with fluffy and cheesy scrambled eggs, sliced grilled ham, french cheese, on buttery croissants.', 8.99, 'breakfast-croissant-sandwich', 'yes', 'Sat', 'Breakfast', 'san-6', 3),
(23, 'Crispy Chicken Sandwich', 'Our Crispy Chicken Sandwich is served on a toasted bread with a ranch dressing to four of the slices and topped each with the bacon, lettuce, fresh tomato, scrambled eggs, and finally the chicken breasts with cheese.', 9.99, 'crispy-chicken-sandwich', 'no', 'Sun', 'All', 'san-7', 3),
(24, 'Roast Beef Sandwich', 'This Roast Beef Sandwich is servered on a grain bread with cooked carrots, lettuce, creamed horseradish, pepper jack cheese and a cranberry sauce on the roast beef slices. ', 11.99, 'roast-beef-sandwich', 'no', 'Mon', 'Lunch', 'san-8', 3),
(25, 'Turkey Sandwich', 'With whole grains, lean protein, vegetables and dairy, these turkey, fresh tomatos and cucumber sandwiches make a balanced meal and will keep you satisfied all afternoon. ', 7.99, 'turkey-sandwich', 'no', 'Tue', 'Lunch', 'san-9', 3),
(26, 'Carbonnade Beef Sandwich', 'Our cheef special, Carbonnade Beef Sandwich made on a crispy grain bread with carrots, scrambled eggs, fresh tomatos, american cheese, lettuce and served with a crispy french fries and bacon. ', 14.99, 'carbonnade-beef-sandwich', 'yes', 'Wed', 'Dinner', 'san-10', 3),
(28, 'Crispy Turkey Sandwich', 'Bursts of molten cheddar accompany every bite of this Crispy Turkey Sandwich made on a crispy grain bread with oven-roasted  turkey, tomatoes, romaine lettuce, cheddar cheese and served with our specialty crispy french fries. ', 14.99, 'crispy-turkey-sandwich', 'yes', 'Thu', 'Dinner', 'san-11', 3),
(29, 'Avocado Egg Sandwich', 'Avocado Egg Sandwich is a one of our breakfast sandwich. It\'s easy and delicious! The sliced avocado is what makes this sandwich pop and gives it a unique flavor. It is chock-full of protein, as well, so this sandwich will keep you full until lunchtime. ', 7.99, 'avocado-egg-sandwich', 'no', 'Fri', 'Breakfast', 'san-12', 3),
(30, 'Grilled Chicken Sandwich', 'This Roasted Red Pepper & Provolone Grilled Chicken Sandwich is oh-so-tasty!\r\nA lemon-herb marinated boneless breast of chicken, grilled for a tender and juicy backyard-smokey taste, served on a toasted white bun with roasted red and green peppers and sauteed onions.', 11.99, 'grilled-chicken-sandwich', 'no', 'Sat', 'All', 'san-13', 3),
(31, 'B.L.T. Salad', 'This salad is made with bacon, romaine lettuce and cherry tomatoes. This BLT salad is simple and compelling. The crunchy, saltiness of the bacon paired with the soft, sweetness of the tomato, cucumber and croutons combined in a large salad bowl.', 7.99, 'BLT-salad', 'no', 'Mon', 'Lunch', 'sal-1', 4),
(32, 'Greek Salad', 'A simple Greek Salad loaded with lots of fresh veggies - cucumber, red and yellow bell peppers, cherry tomatoes and red onion, olives and feta and tossed with a tangy lemon-herb vinaigrette. ', 9.99, 'greek-salad', 'no', 'Tue', 'All', 'sal-2', 4),
(33, 'Spinach and Strawberry Salad', 'This bright and tangy salad is sweet and savory, and just delicious. Served in a large bowl, this Spinach and sliced Strawberry salad with sesame and poppy seeds, tossed with a vegetable oil and a white wine vinegar.', 7.99, 'spinach-strawberry-salad', 'no', 'Wed', 'Lunch', 'sal-3', 4),
(34, 'Avocado Mango Salad', 'This beautifully hued salad features fresh cherry tomatos, avocado, and mango, the peach of the tropics. Dressing made from combination of cilantro, olive oil, vinegar, lemon juice, garlic, salt, and pepper.', 8.99, 'avocado-mango-salad', 'yes', 'Thu', 'All', 'sal-4', 4),
(35, 'Greens with Figs Salad', 'This mixed greens and herb slad with Figs and Walnuts is very lovely and presented beautifully. The salad consisted of several sorts of vegetables (romaine lettuce, arugala, cherry tomatos, cucumber, carrots), feta cheese , walnuts and a special dressing.  ', 11.99, 'greens-figs-salad', 'yes', 'Fri', 'Dinner', 'sal-5', 4),
(36, 'Spinach Fig Salad', 'This Spinach Fig Salad is made with fresh figs, avocado, toasted walnuts, and homemade balsamic vinaigrette for a delicious fall salad that will fill you up. ... Fresh Figs! ', 8.99, 'spinach-fig-salad', 'no', 'Sat', 'Lunch', 'sal-6', 4),
(37, 'Chickpea Avocado Salad', 'This healthy Mediterranean Chickpea Salad with Avocado is a favorite vegetarian dish. Juicy tomatos, creamy avocado, crunchy cucumber, canned chickpeas and simple dressing with olive oil, ...', 8.99, 'chickpea-avocado-salad', 'no', 'Sun', 'Lunch', 'sal-7', 4),
(38, 'Roasted Artichoke Salad', 'This delicious side features kalamata olives, artichoke hearts, baked Roma tomatoes and fresh basil, all mixed together and roasted to tender perfection.\r\n', 13.99, 'roasted-artichoke-salad', 'no', 'Mon', 'Dinner', 'sal-8', 4),
(39, 'Summer Delight Salad', 'This beautiful and tasteful salad features baby spinach leaves, reddish, sliced strawberries, yellow bell peppers, cherry tomatoes, cucumbers and roasted cashews, all mixed together and served on a large plate.', 12.99, 'summer-delight-salad', 'yes', 'Tue', 'All', 'sal-9', 4),
(40, 'Chocolate Layer Cake', 'Sofia\'s - Five Layer Cake - Chocolate - 2lbs. This three layer chocolate cake has a whipped cream filling and chocolate icing. Perfect dessert for any special occasion.', 18.99, 'chocolate-layer-cake', 'no', 'Mon', 'All', 'des-1', 5),
(41, 'Fresh Cherry Cake', 'This Fresh Cherry Cake is full of cherries and deliciously moist.  It’s perfect on its own, with a cup of tea or coffee in the morning for breakfast or snack in the afternoon.', 16.99, 'fresh-cherry-cake', 'yes', 'Tue', 'All', 'des-2', 5),
(42, 'Chocolate Caramel Cake', 'This Chocolate Caramel Cake features two chocolate chip layers with homemade caramel sauce and topped with fresh strawberries, cherries and blueberries.', 16.99, 'chocolate-caramel-cake', 'yes', 'Wed', 'All', 'des-3', 5),
(43, 'Orange Slice Pie', 'The Orange Slice Pie is the pie for you marmalade fans out there. This light and refreshing pie taste just like sunshine.', 11.99, 'orange-slice-pie', 'no', 'Thu', 'Breakfast', 'des-4', 5),
(44, 'Triple Chocolate Muffin', 'The Triple Chocolate Muffin are made with cocoa, chocolate chunks and dark chocolate chips. These muffins are soft, moist, and full of chocolatey flavors. Great for breakfast, or as a snack anytime of the day.', 3.99, 'triple-chocolate-muffin', 'yes', 'Fri', 'All', 'des-5', 5),
(45, 'Black Forest Cake', 'This Black Forest Cake combines rich chocolate cake layers with fresh cherries, cherry liqueur, and a homemade cherry jam. It\'s super moist and flavorful!', 14.99, 'black-forest-cake', 'no', 'Sat', 'All', 'des-6', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp19_admin`
--
ALTER TABLE `sp19_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp19_categories`
--
ALTER TABLE `sp19_categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `sp19_labels`
--
ALTER TABLE `sp19_labels`
  ADD PRIMARY KEY (`labelId`);

--
-- Indexes for table `sp19_products`
--
ALTER TABLE `sp19_products`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp19_admin`
--
ALTER TABLE `sp19_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sp19_categories`
--
ALTER TABLE `sp19_categories`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sp19_labels`
--
ALTER TABLE `sp19_labels`
  MODIFY `labelId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sp19_products`
--
ALTER TABLE `sp19_products`
  MODIFY `prodid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
