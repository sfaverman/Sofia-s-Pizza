DROP TABLE `sp19_attributes`;

CREATE TABLE `sp19_attributes` (
  `prodid` int(5) NOT NULL,
  `labelid` int(5) NOT NULL,
  `value` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping PIZZA data for table `sp19_attributes`
--

INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
(1, 1, 'S', 7.99),
(1, 1, 'M', 9.99),
(1, 1, 'L', 11.99),
(1, 1, 'XL', 13.99);

INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
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
(16, 1, 'XL', 16.99);

--
-- Dumping SANDWICHES data for table `sp19_attributes`
--


INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
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
(30, 1, 'Half', 7.49);

--
-- Dumping SALADS data for table `sp19_attributes`
--


INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
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
(39, 1, 'Small', 7.49);

--
-- Dumping DESSERTS data for table `sp19_attributes`
--


INSERT INTO `sp19_attributes` (`prodid`, `labelid`, `value`, `price`) VALUES
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
