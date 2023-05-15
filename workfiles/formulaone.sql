-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 15, 2023 at 08:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formulaone`
--

-- --------------------------------------------------------

--
-- Table structure for table `eredmenyek`
--

CREATE TABLE `eredmenyek` (
  `palya` int(2) NOT NULL,
  `helyezes` int(2) NOT NULL,
  `pilota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eredmenyek`
--

INSERT INTO `eredmenyek` (`palya`, `helyezes`, `pilota`) VALUES
(1, 0, 22),
(1, 1, 22);
-- --------------------------------------------------------

--
-- Table structure for table `konstruktorok`
--

CREATE TABLE `konstruktorok` (
  `id` int(2) NOT NULL,
  `csapat` varchar(40) NOT NULL,
  `orszag` varchar(40) NOT NULL,
  `egyikpilota` int(2) NOT NULL,
  `masikpilota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konstruktorok`
--

INSERT INTO `konstruktorok` (`id`, `csapat`, `orszag`, `egyikpilota`, `masikpilota`) VALUES
(1, 'Ferrari', 'Olaszország', 1, 2),
(2, 'McLaren', 'Egyesült Királyság', 22, 23);


-- --------------------------------------------------------

--
-- Table structure for table `nagydijak`
--

CREATE TABLE `nagydijak` (
  `id` int(2) NOT NULL,
  `orszag` varchar(40) NOT NULL,
  `palya` varchar(60) NOT NULL,
  `hossz` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nagydijak`
--

INSERT INTO `nagydijak` (`id`, `orszag`, `palya`, `hossz`) VALUES
(1, 'Ausztrália', 'Albert Park', 5278),
(2, 'Malajzia', 'Sepang', 5543);
-- --------------------------------------------------------

--
-- Table structure for table `pilotak`
--

CREATE TABLE `pilotak` (
  `rajtszam` int(2) NOT NULL,
  `nev` varchar(40) NOT NULL,
  `orszag` varchar(40) NOT NULL,
  `szulido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilotak`
--

INSERT INTO `pilotak` (`rajtszam`, `nev`, `orszag`, `szulido`) VALUES
(1, 'Kimi Räikkönen', 'Finnország', '1979-10-17'),
(2, 'Felipe Massa', 'Brazília', '1981-04-25'),
(22, 'Lewis Hamilton', 'Egyesült Királyság', '1985-01-07'),
(23, 'Heikki Kovalainen', 'Finnország', '1981-10-19');
-- --------------------------------------------------------

--
-- Table structure for table `pontszamitas`
--

CREATE TABLE `pontszamitas` (
  `helyezes` int(2) NOT NULL,
  `pontok` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
INSERT INTO `pontszamitas` (`helyezes`, `pontok`) VALUES
(1, 10),
(2, 8),
(3, 6),
(4, 5),
(5, 4),
(6, 3),
(7, 2),
(8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eredmenyek`
--
ALTER TABLE `eredmenyek`
  ADD PRIMARY KEY (`palya`,`helyezes`);

--
-- Indexes for table `konstruktorok`
--
ALTER TABLE `konstruktorok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nagydijak`
--
ALTER TABLE `nagydijak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilotak`
--
ALTER TABLE `pilotak`
  ADD PRIMARY KEY (`rajtszam`);

--
-- Indexes for table `pontszamitas`
--
ALTER TABLE `pontszamitas`
  ADD PRIMARY KEY (`helyezes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
