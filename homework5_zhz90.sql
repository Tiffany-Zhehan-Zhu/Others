-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 12:50 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework5_zhz90`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `country`, `email`) VALUES
(1001, 'Ed', 'Harrison', 'Spain', 'edh@hotmail.com'),
(1002, 'Mihael', 'Holz', 'USA', 'mihaelh@outlook.com'),
(1003, 'Jan', 'Klaeboe', 'Germany', 'jank@hotmail.com'),
(1004, 'Bradley', 'Schuyler', 'Denmark', 'bradleys@hotmail.com'),
(1005, 'Mel', 'Andersen', 'Canada', 'mela@gmail.com'),
(1006, 'Pirkko', 'Koskitalo', 'Spain', 'pirkkok@outlook.com'),
(1007, 'Catherine ', 'Dewey', 'USA', 'catherined@gmail.com'),
(1008, 'Steve', 'Frick', 'UK', 'stevef@hotmail.com'),
(1009, 'Wing', 'Huang', 'France', 'wingh@sina.com'),
(1010, 'Julie', 'Brown', 'Germany', 'julieb@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `deptID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` int(10) NOT NULL,
  `manager` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptID`, `name`, `size`, `manager`) VALUES
(10, 'Administration and Human Resource', 2, 101),
(20, 'Sales', 2, 203),
(30, 'Production and Quality Assurance', 2, 301),
(40, 'Customer Service', 2, 402),
(50, 'IT', 2, 501);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empID` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `deptID` int(10) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empID`, `firstName`, `lastName`, `deptID`, `position`) VALUES
(101, 'Tiffany', 'Zhu', 10, 'HR Manager'),
(102, 'Anthony', 'Bow', 10, 'HR '),
(201, 'Leslie', 'Jennings', 20, 'Sales Rep'),
(202, 'Leslie', 'Thompson', 20, 'Sales Rep'),
(203, 'Julie', 'Firrelli', 20, 'Sales Manager'),
(301, 'Steve', 'Patterson', 30, 'Production Manager'),
(302, 'Foon Yue', 'Tseng', 30, 'Production Designer'),
(401, 'George', 'Vanauf', 40, 'Customer Service Rep'),
(402, 'Loui', 'Bondur', 40, 'Customer Service Manager'),
(501, 'Gerard', 'Hernandez', 50, 'IT manager');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) DEFAULT NULL,
  `orderDate` text,
  `productID` text,
  `quantityOrdered` int(11) DEFAULT NULL,
  `priceEach` double DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `salesRep` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `productID`, `quantityOrdered`, `priceEach`, `customerID`, `salesRep`) VALUES
(10001, '1/13/2016', 'A01', 41, 43.13, 1001, 201),
(10001, '1/18/2016', 'A02', 26, 214.33, 1001, 201),
(10001, '1/18/2016', 'A03', 42, 119.67, 1001, 201),
(10001, '2/07/2016', 'A04', 27, 121.64, 1001, 201),
(10002, '2/09/2016', 'A01', 35, 43.13, 1002, 202),
(10002, '2/21/2016', 'A02', 22, 214.33, 1002, 202),
(10003, '2/24/2016', 'A03', 27, 119.67, 1003, 203),
(10004, '3/03/2016', 'A04', 35, 121.64, 1004, 201),
(10005, '3/12/2016', 'A05', 25, 86.92, 1005, 203),
(10006, '3/19/2016', 'A03', 46, 119.67, 1003, 202);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` text,
  `productName` text,
  `productLine` text,
  `quantityInStock` int(11) DEFAULT NULL,
  `buyPrice` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productLine`, `quantityInStock`, `buyPrice`) VALUES
('A01', '1969 Harley Davidson Ultimate Chopper', 'A', 7933, 43.13),
('A02', '1952 Alpine Renault 1300', 'A', 7305, 214.33),
('A03', '1996 Moto Guzzi 1100i', 'A', 6625, 119.67),
('A04', '2003 Harley-Davidson Eagle Drag Bike', 'A', 5582, 121.64),
('A05', '1972 Alfa Romeo GTA', 'A', 3252, 86.92);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*1. */
select customers.customerID, sum(orders.quantityOrdered*orders.priceEach) as totalMoney
from customers, orders
where customers.customerID=orders.customerID
group by customers.customerID;

/*2. */
select salesRep, sum(quantityOrdered*priceEach) as totalMoney
from orders
group by salesRep
order by sum(quantityOrdered*priceEach) desc
limit 1;

/*3. */
select productID, sum(quantityOrdered) as totalQuantity
from orders
group by productID
order by sum(quantityOrdered) desc
limit 1;
