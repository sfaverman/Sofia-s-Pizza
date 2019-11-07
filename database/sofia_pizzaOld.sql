-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 05, 2019 at 07:41 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofia_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp19_cartitems`
--

CREATE TABLE `sp19_cartitems` (
  `productid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sp19_products`
--

CREATE TABLE `sp19_products` (
  `prodid` int(5) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `proddesc` text NOT NULL,
  `prodprice` decimal(9,2) NOT NULL,
  `featured` enum('yes','no') NOT NULL,
  `weeklyspecial` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `catid` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp19_products`
--

INSERT INTO `sp19_products` (`prodid`, `prodname`, `proddesc`, `prodprice`, `featured`, `weeklyspecial`, `image`, `catid`) VALUES
(1, 'Square Cheese Pizza', 'Classic thin crust sqaure four cheese pizza baked to perfection.', 9.99, 'no', 'Mon', 'pi-1', 2),
(2, 'Supreme Veggie Pizza', 'This Vegetarian Pizza is loaded with eggplant, carrots, and even more fresh veggies! The mixture of salty feta and creamy mozzarella really makes it much loved veggie pizza. ', 12.99, 'yes', 'Tue', 'pi-2', 2),
(3, 'Spicy Bacon Pizza', 'This top-rated spicy bacon pizza is our customer\'s favorite. What makes this awesome chicken-and-bacon-topped pizza spicy? Pepper Jack cheese is what\'s behind the kick!\r\n', 14.99, 'yes', 'Wed', 'pi-3', 2),
(4, 'Red Pepper Pizza', 'Looking for a healthy and delicious pizza alternative?  You have to try this amazingly delicious roasted red pepper, eggplant and goat cheese square pizza baked to perfection.', 13.99, 'no', 'Thu', 'pi-4', 2),
(5, 'Green Olive Pizza', 'This caramelized only, green olive and crispy and smoked canadian bakon pizza on a traditional pan is absolutely delicious in and of itself.', 14.99, 'no', 'Fri', 'pi-5', 2),
(6, 'Classic Pepperoni Pizza', 'Our homemade like pepperoni pizza produces a delicious classic! An Italian-American favorite: chewy pizzeria crust, mild and creamy cheeses and our signature Italian-Style Pizza Sauce topped off with a generous handful of zesty pepperoni.', 9.99, 'yes', 'Sat', 'pi-6', 2),
(7, 'Mediterranean Pizza', 'This Mediterranean Roasted Red Pepper is particular cheesy specimen, topped with roasted red peppers, sausage, and plenty of Monterey Jack cheese, is one of our stand-by pizzas.', 12.99, 'no', 'Sun', 'pi-7', 2),
(8, 'Ollie Veggie Pizza', 'The ollie veggie thin crust pizza is made with green olives, onions, mashrooms, fresh tomatos, marinated artichoke hearts and fresh spinach.', 14.99, 'yes', 'Mon', 'pi-8', 2),
(9, 'BBQ Chicken Pizza', 'This classic BBQ chicken pizza with tangy BBQ sauce, chicken, and red onion. Gouda cheese gives the homemade pizza the most delicious smoky flavor and cilantro adds a touch of freshness.  ', 16.99, 'no', 'Tue', 'pi-9', 2),
(10, 'Supreme Breakfast Pizza', 'It’s basically a pizza topped with everything you would like for your breakfast. The topping combinations are  bacon, tomatoes, mozzarella, green peppers, olives, cooked eggs, onions and mushrooms. ', 12.99, 'yes', 'Wed', 'pi-10', 2),
(11, 'Classic Supreme Pizza', 'The Classic Supreme pizza is one of our best sellers! Taste the fresh dough and homemade sauce. Toppings include pepperoni, black olives, green peppers and mashrooms.', 16.99, 'yes', 'Thu', 'pi-11', 2),
(12, 'Half-Half Specialty Pizza  ', 'Half Sausage/Half Pepperoni Pizza - Damn That Looks Good! Additional toppings like mashrooms, pickles, corn, onions, black olives makes for a delicious pie!', 17.99, 'yes', 'Fri', 'pi-12', 2),
(13, 'Hawaiian Pizza', 'Hawaiian pizza is a traditional pan pizza topped with tomato sauce, cheese, fresh pineapple chunks, and ham and is baked to perfection.', 11.99, 'no', 'Sat', 'pi-13', 2),
(14, 'Grilled Eggplant Pizza', 'Rejoice pizza lovers who recently switched to a vegan diet! This Classic Vegan Pizza with Grilled Eggplant and Zucchini, black olives and spinach is every vegetarian dream!', 15.99, 'yes', 'Sun', 'pi-14', 2),
(15, 'Margherita Pizza', 'Margherita Pizza with Tomato, fresh Mozzarella and Basil leaves. This most iconic of pizzas that shows the colors of the Italian flag.', 12.99, 'yes', 'Mon', 'pi-15', 2),
(16, 'Pepper and Mashroom Pizza', 'This delicious homemade pizza is topped with meaty portobello mushrooms, creamy mozzarella cheese, sweet red peppers and fresh basil. ', 14.99, 'yes', 'Tue', 'pi-16', 2),
(17, 'Mediterranean Sandwich', 'Come tomato season, our favorite quick lunch is an open-face sandwich made from a slice of good bread toasted with melty cheese and topped with our favorite pesto, avocado, and fresh tomatoes. Great choice for picky vegetarians.', 10.99, 'no', 'Mon', 'san-1', 3),
(18, 'Grilled Beef Sandwich', 'This is our customer\'s delight sandwich!\r\nGrilled beef, roasted bell peppers, provolone cheese, onions, garlic and mayo.  We like it served with a nice fresh Caesar salad. Don\'t be intimidated by the extra sharp provolone\'s smell - it\'s really delicious.\r\n', 12.99, 'yes', 'Tue', 'san-2', 3),
(19, 'Spinach Veggie Sandwich ', 'This Spinach and Carrot Sandwich is made on a wheat bun with fresh baby spinach leaves, roasted carrots, spring onions and lettuce is  great option for our vegetarian customers.', 10.99, 'no', 'Wed', 'san-3', 3),
(20, 'Classic Hamburger', 'Our famous 1/3 pound ground top sirloin juicy patty with real creamy american cheese, lettuce and dill pickles. You\'ll enjoy every bite. Served with our delicious Fries or Onion Rings.', 13.99, 'yes', 'Thu', 'san-4', 3),
(21, 'BBQ Chicken Sandwich', 'This picnic inspired barbeque grilled chicken sandwich is served on a toasted multigrain bun with french fries, romaine lettuce and fresh tomatos.', 10.99, 'no', 'Fri', 'san-5', 3),
(22, 'Breakfast Sandwich', 'Our Baked Croissant Breakfast Sandwiches are made with fluffy and cheesy scrambled eggs, sliced grilled ham, french cheese, on buttery croissants.', 8.99, 'yes', 'Sat', 'san-6', 3),
(23, 'Crispy Chicken Sandwich', 'Our Crispy Chicken Sandwich is served on a toasted bread with a ranch dressing to four of the slices and topped each with the bacon, lettuce, fresh tomato, scrambled eggs, and finally the chicken breasts with cheese.', 9.99, 'no', 'Sun', 'san-7', 3),
(24, 'Roast Beef Sandwich', 'This Roast Beef Sandwich is servered on a grain bread with cooked carrots, lettuce, creamed horseradish, pepper jack cheese and a cranberry sauce on the roast beef slices. ', 12.99, 'no', 'Mon', 'san-8', 3),
(25, 'Turkey Sandwich', 'With whole grains, lean protein, vegetables and dairy, these turkey, fresh tomatos and cucumber sandwiches make a balanced meal and will keep you satisfied all afternoon. ', 7.99, 'no', 'Tue', 'san-9', 3),
(26, 'Carbonnade Beef Sandwich', 'Our cheef special, Carbonnade Beef Sandwich made on a crispy grain bread with carrots, scrambled eggs, fresh tomatos, american cheese, lettuce and served with a crispy french fries and bacon. ', 14.99, 'yes', 'Wed', 'san-10', 3),
(28, 'Crispy Turkey Sandwich', 'Bursts of molten cheddar accompany every bite of this Crispy Turkey Sandwich made on a crispy grain bread with oven-roasted  turkey, tomatoes, romaine lettuce, cheddar cheese and served with our specialty crispy french fries. ', 14.99, 'yes', 'Thu', 'san-11', 3),
(29, 'Avocado Egg Sandwich', 'Avocado Egg Sandwich is a one of our breakfast sandwich. It\'s easy and delicious! The sliced avocado is what makes this sandwich pop and gives it a unique flavor. It is chock-full of protein, as well, so this sandwich will keep you full until lunchtime. ', 7.99, 'no', 'Fri', 'san-12', 3),
(30, 'Grilled Chicken Sandwich', 'This Roasted Red Pepper & Provolone Grilled Chicken Sandwich is oh-so-tasty!\r\nA lemon-herb marinated boneless breast of chicken, grilled for a tender and juicy backyard-smokey taste, served on a toasted white bun with roasted red and green peppers and sauteed onions.', 11.99, 'no', 'Sat', 'san-13', 3),
(31, 'B.L.T. Salad', 'This salad is made with bacon, romaine lettuce and cherry tomatoes. This BLT salad is simple and compelling. The crunchy, saltiness of the bacon paired with the soft, sweetness of the tomato, cucumber and croutons combined in a large salad bowl.', 8.99, 'no', 'Mon', 'sal-1', 4),
(32, 'Greek Salad', 'A simple Greek Salad loaded with lots of fresh veggies - cucumber, red and yellow bell peppers, cherry tomatoes and red onion, olives and feta and tossed with a tangy lemon-herb vinaigrette. ', 9.99, 'no', 'Tue', 'sal-2', 4),
(33, 'Spinach and Strawberry Salad', 'This bright and tangy salad is sweet and savory, and just delicious. Served in a large bowl, this Spinach and sliced Strawberry salad with sesame and poppy seeds, tossed with a vegetable oil and a white wine vinegar.', 8.99, 'no', 'Wed', 'sal-3', 4),
(34, 'Avocado Mango Salad', 'This beautifully hued salad features fresh cherry tomatos, avocado, and mango, the peach of the tropics. Dressing made from combination of cilantro, olive oil, vinegar, lemon juice, garlic, salt, and pepper.', 8.99, 'yes', 'Thu', 'sal-4', 4),
(35, 'Greens with Figs Salad', 'This mixed greens and herb slad with Figs and Walnuts is very lovely and presented beautifully. The salad consisted of several sorts of vegetables (romaine lettuce, arugala, cherry tomatos, cucumber, carrots), feta cheese , walnuts and a special dressing.  ', 11.99, 'yes', 'Fri', 'sal-5', 4),
(36, 'Spinach Fig Salad', 'This Spinach Fig Salad is made with fresh figs, avocado, toasted walnuts, and homemade balsamic vinaigrette for a delicious fall salad that will fill you up. ... Fresh Figs! ', 10.88, 'no', 'Sat', 'sal-6', 4),
(37, 'Chickpea Avocado Salad', 'This healthy Mediterranean Chickpea Salad with Avocado is a favorite vegetarian dish. Juicy tomatos, creamy avocado, crunchy cucumber, canned chickpeas and simple dressing with olive oil, ...', 9.99, 'no', 'Sun', 'sal-7', 4),
(38, 'Roasted Artichoke Salad', 'This delicious side features kalamata olives, artichoke hearts, baked Roma tomatoes and fresh basil, all mixed together and roasted to tender perfection.\r\n', 13.99, 'no', 'Mon', 'sal-8', 4),
(39, 'Summer Delight Salad', 'This beautiful and tasteful salad features baby spinach leaves, reddish, sliced strawberries, yellow bell peppers, cherry tomatoes, cucumbers and roasted cashews, all mixed together and served on a large plate.', 12.99, 'yes', 'Tue', 'sal-9', 4),
(40, 'Chocolate Layer Cake', 'Sofia\'s - Five Layer Cake - Chocolate - 2lbs. This three layer chocolate cake has a whipped cream filling and chocolate icing. Perfect dessert for any special occasion.', 18.99, 'no', 'Mon', 'des-1', 5),
(41, 'Fresh Cherry Cake', 'This Fresh Cherry Cake is full of cherries and deliciously moist.  It’s perfect on its own, with a cup of tea or coffee in the morning for breakfast or snack in the afternoon.', 16.99, 'yes', 'Tue', 'des-2', 5),
(42, 'Chocolate Caramel Cake', 'This Chocolate Caramel Cake features two chocolate chip layers with homemade caramel sauce and topped with fresh strawberries, cherries and blueberries.', 16.99, 'yes', 'Wed', 'des-3', 5),
(43, 'Orange Slice Pie', 'The orange Slice Pie is This is the pie for you marmalade fans out there. This light and refreshing pie taste just like sunshine.', 12.99, 'no', 'Thu', 'des-4', 5),
(44, 'Triple Chocolate Muffin', 'The Triple Chocolate Muffin are made with cocoa, chocolate chunks and dark chocolate chips. These muffins are soft, moist, and full of chocolatey flavors. Great for breakfast, or as a snack anytime of the day.', 3.99, 'yes', 'Fri', 'des-5', 5),
(45, 'Black Forest Cake', 'This Black Forest Cake combines rich chocolate cake layers with fresh cherries, cherry liqueur, and a homemade cherry jam. It\'s super moist and flavorful!', 14.99, 'no', 'Sat', 'des-6', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp19_categories`
--
ALTER TABLE `sp19_categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `sp19_products`
--
ALTER TABLE `sp19_products`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp19_categories`
--
ALTER TABLE `sp19_categories`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sp19_products`
--
ALTER TABLE `sp19_products`
  MODIFY `prodid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
