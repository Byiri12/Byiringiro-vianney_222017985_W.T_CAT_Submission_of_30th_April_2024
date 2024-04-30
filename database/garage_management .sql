-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 02:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Vehicle_Id` int(11) NOT NULL,
  `Service_Id` int(11) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_Id`, `Customer_Id`, `Vehicle_Id`, `Service_Id`, `Appointment_Date`, `Status`) VALUES
(1, 1, 2, 3, '2024-04-29', 'qwertyu'),
(5, 17, 12, 12, '2024-04-27', '0'),
(9, 1, 5, 4, '2023-12-01', 'Scheduled'),
(11, 10, 7, 8, '2024-04-11', 'pending'),
(13, 10, 7, 8, '2009-12-09', 'fghhh'),
(20, 4, 3, 2, '3009-09-09', 'DTRUY'),
(25, 10, 7, 8, '1897-08-03', 'received'),
(1005, 10, 7, 8, '2024-04-26', 'scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_Id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(120) NOT NULL,
  `Contact_Number` varchar(10) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_Id`, `First_Name`, `Last_Name`, `Contact_Number`, `Address`) VALUES
(1, 'Simon', 'Dave', '0724567890', '123 Main St'),
(2, 'eghjkjnbv', 'fghjkj', '0987654', 'kger'),
(3, 'Kevin', 'Debryne', '0785111223', '789 Pine Rd'),
(4, 'Alison', 'Becker', '0787888999', '101 Cedar Ln'),
(5, 'Shadia', 'Mbabazi', '0787666677', '202 Elm Blvd'),
(6, 'tuyi', 'shime', '0799999', 'kgl23'),
(8, 'moure', 'keila', '078888', 'kgl'),
(10, 'vox', 'wagen', '07896543', 'rozario'),
(13, 'brigitte', 'uwa', '0788888', 'kr'),
(14, 'kanyem', 'razo', '09876543', 'kg200'),
(15, 'kanyem', 'razo', '09876543', 'kg200'),
(16, 'kanyem', 'razo', '09876543', 'kg200'),
(17, 'kanyem', 'razo', '09876543', 'kg200');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_Id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(120) NOT NULL,
  `Contact_Number` varchar(10) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Position` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_Id`, `First_Name`, `Last_Name`, `Contact_Number`, `Email`, `Position`) VALUES
(1, 'tuyi', 'sabie', '07890987', 'tuy@sabgmail.com', 'secretair'),
(2, 'Albert', 'Mugisha', '0795555222', 'albertmgsh@gmail.com', 'Accountant'),
(3, 'Albert', 'Peter', '0721555112', 'leandrepeter@gmail.com', 'Manager'),
(4, 'Uwera', 'Diane', '075785222', 'uweradiane@gmail.com', 'Secretary'),
(6, 'muneza', 'fred', '0788988888', 'muneza@gmail.com', 'manager'),
(7, 'nsabima', 'eric', '07888999', 'nsab@gmail.com', 'scretary'),
(8, 'muhay', 'simon', '0789895656', 'muh@gmail.com', 'secretary'),
(11, 'mune', 'sam', '0722222222', 'mune@gmail.com', 'humnRM'),
(13, 'kanani', 'kamir', '078654376', 'byi@gmail.com', 'manager'),
(15, 'niyo', 'xavie', '0732343233', 'niyo@gmail.com', 'auditor'),
(16, 'knc', 'kakuza', '07888888', 'knc@gmail.com', 'presid'),
(45, 'fifi', 'gaga', '07893443', 'gaga@gmail.com', 'account');

-- --------------------------------------------------------

--
-- Table structure for table `party_inventory`
--

CREATE TABLE `party_inventory` (
  `Item_Id` int(11) NOT NULL,
  `Item_Name` varchar(350) NOT NULL,
  `Description` varchar(700) NOT NULL,
  `Item_Type` varchar(100) NOT NULL,
  `Cost_Per_Type` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_inventory`
--

INSERT INTO `party_inventory` (`Item_Id`, `Item_Name`, `Description`, `Item_Type`, `Cost_Per_Type`) VALUES
(5, 'Oil', 'A viscous liquid derived from petroleum, especially for use as fuel or lubricant', 'Synthetic Oil', 15000),
(7, 'iufrh', ';djhfmd', 'bmw', 6000),
(8, 'rtijhg', 'hgfdgh', 'fghj', 1340),
(9, 'battery', 'batt234', 'for car', 50000),
(10, 'yhundai', 'tacon', 'taxon', 20000000),
(30, 'toyota', 'landcruser', 'gh', 15000000),
(189, 'iuytr', 'ytre', 'ytrertyu', 4567);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Id` int(11) NOT NULL,
  `Service_Name` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Id`, `Service_Name`, `Description`, `Cost`) VALUES
(2, 'ffghj', 'hjkk', 3000),
(3, 'Customer Relationship Management', 'To helps build and maintain strong relationships with customers. ', 10000),
(4, 'Warranty Tracking', 'Keeps track of warranties for parts and services, helping the garage and customers stay informed about coverage and expiration dates', 12000),
(5, 'Repair vehicles', 'To repairing the broken vehicles and renew them', 15000),
(6, 'fghfghj', 'dfgty', 500),
(8, 'fjkl', 'ffghukjl', 20000),
(10, 'sells', 'battery', 50000),
(12, 'mungu', 'uuuuuuuuuuuuu', 555555);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `Service_Id` int(11) NOT NULL,
  `Transaction_Name` varchar(800) NOT NULL,
  `Transaction_Date` date NOT NULL,
  `Total_Amount` float NOT NULL,
  `Payment_Method` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_Id`, `Customer_Id`, `Employee_Id`, `Service_Id`, `Transaction_Name`, `Transaction_Date`, `Total_Amount`, `Payment_Method`) VALUES
(11, 5, 3, 4, 'Selling Engine', '2023-03-20', 500000, 'Cheque'),
(13, 4, 4, 2, 'Axle ordered', '2023-05-05', 30000, 'Cash'),
(14, 4, 4, 2, 'sell', '1987-12-09', 7000, '0'),
(2345, 10, 4, 2, 'done', '0000-00-00', 12000, 'momo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'vianney', 'phyiro', 'phyiro', 'byiringiro@gmail.com', '0785922794', '$2y$10$05c3KVGLCwfbUrno30vPb.P2otNNG1I40PIL5IF6V0XqdBko0rzyK', '2024-04-08 13:43:15', '1', 0),
(6, 'vianney', 'phyiro', '222017985', 'phyiro@gmail.com', '0785922794', '$2y$10$NnUtO2j1wqwRRCepNRvrWu1a9mGDGHb.BngPH9M15X9Iuxw.P.cVe', '2024-04-08 13:45:15', '1', 0),
(24, 'gaga', 'vivi', 'gagav', 'vi@gmail.com', '0785922794', '$2y$10$4hj6Zw5SDojdeLnDmgxV9OWzK3zmHKQQUW/6qQsujK.veX1QUVS.e', '2024-04-08 14:03:08', 'gg', 0),
(25, 'vicent', 'vic', 'phyiro@gmail.com', 'vic@gmail.com', '0798654324', '$2y$10$kERaVsVhkOKcTgz2ESb8Te3ggyPPMkKDwBib/QwJzvhUFf7JelgHe', '2024-04-08 14:05:54', '5', 0),
(26, 'one', 'two', 'one', 'one@gmail.com', '08909877', '$2y$10$bgrKCIWjs3mL1chjzJewuOBUU.uvEsMBUvu4q.6IEpka6yWm3Jqvy', '2024-04-09 07:45:24', 'hgf', 0),
(27, 'william', 'sariba', 'sariba', 'sariba@gmail.com', '0789567654', '$2y$10$lXfo7ax2Ep8jLyOK/7GsvesPeij2Tu1w0y4RtrGB2C1nUwSEG2W/i', '2024-04-09 07:47:35', '240', 0),
(28, 'kamil', 'justin', 'justin', 'justin@gmail.com', '0787654322', '$2y$10$isgVegDNJeEBD3lInrmAkOINu4Em4UIBe0Ha3YcMZgERkio.Yjn9K', '2024-04-10 08:39:31', '189', 0),
(29, 'vianney', 'via', 'via', 'via@gmail.com', '0789567654', '$2y$10$CDicaVEESIWrN2DtlaQccezEYOEyC2HKl5bPUxrKrf.kJNV/c19Fa', '2024-04-11 08:09:08', '25', 0),
(30, 'ggg', 'byir', 'ggg', 'ggg@gmail.com', '09765432', '$2y$10$jrQQWNl.qzsA/xH25H4uN.9iiJkDfN8v9zxw7AxBv5ReVXdSppDf2', '2024-04-25 14:49:55', '888', 0),
(32, 'bbbb', 'vvvv', 'vvv', 'vvvv@gmail.com', '0878965433', '$2y$10$fiQHvh6jkyUL8HqX94./FustUBXzulCL.DZR/3ESM.grDOSsV9Pn6', '2024-04-25 15:15:29', '123', 0),
(33, 'kanimba', 'jaque', 'jaque', 'jaque@gmail.com', '0785922794', '$2y$10$L6EBlg5u/HBO0hDtuB1zgeQnD3/WndfemzDfC2nUzi8H8nHeNOg4O', '2024-04-26 07:02:00', '123', 0),
(35, 'Byiringiro ', 'vianney', 'vianney', 'byiringirov00@gmail.com', '0785922794', '$2y$10$1hqtOEq9GU89eoykhRpvuuGsqPPvexrMzCK5A/1EpQJzIv78GAUaC', '2024-04-30 12:38:24', '250', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `Vehicle_Id` int(11) NOT NULL,
  `Customer_Id` int(11) NOT NULL,
  `Make` varchar(300) NOT NULL,
  `Model` varchar(250) NOT NULL,
  `Licence_Plate` varchar(95) NOT NULL,
  `Vehicle_Identification_Number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`Vehicle_Id`, `Customer_Id`, `Make`, `Model`, `Licence_Plate`, `Vehicle_Identification_Number`) VALUES
(1, 5, 'Toyota', 'Camry', 'RAG123', 'VIN12345678901234'),
(2, 3, 'Barabas', 'Civic', 'RAD789', 'VIN56789012345678'),
(3, 2, 'Suzuki', 'Escape', 'RAC456', 'VIN90123456789012'),
(4, 4, 'Chevrolet', 'Malibu', 'RAB789', 'VIN34567890123456'),
(5, 5, 'BUGHAT', 'UGST', 'URG145', 'VIN3456789'),
(7, 10, 'HGFV', 'HGFVB', 'BGFCXD6', 'FRTT6777'),
(10, 10, 'yhundai', 'taxon', 'fgd', '12345'),
(12, 10, 'VBNM', 'HJKL', 'HJK', 'FGY7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`),
  ADD KEY `Vehicle_Id` (`Vehicle_Id`),
  ADD KEY `Service_Id` (`Service_Id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_Id`);

--
-- Indexes for table `party_inventory`
--
ALTER TABLE `party_inventory`
  ADD PRIMARY KEY (`Item_Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Transaction_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`),
  ADD KEY `Service_Id` (`Service_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`Vehicle_Id`),
  ADD KEY `Customer_Id` (`Customer_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `party_inventory`
--
ALTER TABLE `party_inventory`
  MODIFY `Item_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4568;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Transaction_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2346;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `Vehicle_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers` (`Customer_Id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Vehicle_Id`) REFERENCES `vehicles` (`Vehicle_Id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`Service_Id`) REFERENCES `services` (`Service_Id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers` (`Customer_Id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`Service_Id`) REFERENCES `services` (`Service_Id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `customers` (`Customer_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
