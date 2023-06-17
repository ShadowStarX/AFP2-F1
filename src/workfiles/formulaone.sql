-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jun 13, 2023 at 04:53 PM
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
(1, 1, 22),
(1, 2, 3),
(1, 3, 7),
(1, 4, 5),
(1, 5, 23),
(1, 6, 8),
(1, 7, 14),
(1, 8, 1),
(2, 1, 1),
(2, 2, 4),
(2, 3, 23),
(2, 4, 11),
(2, 5, 22),
(2, 6, 3),
(2, 7, 10),
(2, 8, 5),
(3, 1, 2),
(3, 2, 1),
(3, 3, 4),
(3, 4, 3),
(3, 5, 23),
(3, 6, 11),
(3, 7, 10),
(3, 8, 7),
(4, 1, 1),
(4, 2, 2),
(4, 3, 22),
(4, 4, 4),
(4, 5, 10),
(4, 6, 16),
(4, 7, 8),
(4, 8, 11),
(5, 1, 2),
(5, 2, 22),
(5, 3, 1),
(5, 4, 4),
(5, 5, 3),
(5, 6, 5),
(5, 7, 10),
(5, 8, 7),
(6, 1, 22),
(6, 2, 4),
(6, 3, 2),
(6, 4, 10),
(6, 5, 15),
(6, 6, 17),
(6, 7, 8),
(6, 8, 23),
(7, 1, 4),
(7, 2, 3),
(7, 3, 9),
(7, 4, 12),
(7, 5, 2),
(7, 6, 11),
(7, 7, 17),
(7, 8, 15);

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
(1, 'Ausztrália', 'Albert Park Grand Prix Circuit', 5278),
(2, 'Malajzia', 'Sepang International Circuit', 5543),
(3, 'Bahrein', 'Sakhir International Circuit', 5412),
(4, 'Spanyolország', 'Circuit de Catalunya', 4675),
(5, 'Törökország', 'Isztambul Park', 5333),
(6, 'Monaco', 'Circuit de Monaco', 3340),
(7, 'Kanada', 'Circuit Gilles Villeneuve', 4361),
(8, 'Franciaország', 'Magny-Cours', 4411),
(9, 'Nagy-Britannia', 'Silverstone Circuit', 5100),
(10, 'Németország', 'Hockenheimring', 4574),
(11, 'Magyarország', 'Hungaroring', 4381),
(12, 'Spanyolország', 'Valencia Street Circuit', 5473),
(13, 'Belgium', 'Circuit de Spa-Francorschamps', 7004),
(14, 'Olaszország', 'Autodromo Nazionale di Monza', 5793),
(15, 'Szingapúr', 'Marina Bay', 4928),
(16, 'Japán', 'Fuji Speedway', 4523),
(17, 'Kína', 'Shanghai International Circuit', 5451),
(18, 'Brazília', 'Interlagos', 4309);

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
(3, 'Nick Heidfeld', 'Németország', '1977-05-11'),
(4, 'Robert Kubica', 'Lengyelország', '1984-12-07'),
(5, 'Fernando Alonso', 'Spanyolország', '0000-00-00'),
(6, 'Nelson Piquet Jr.', 'Brazília', '0000-00-00'),
(7, 'Nico Rosberg', 'Németország', '0000-00-00'),
(8, 'Kazuki Nakajima', 'Japán', '0000-00-00'),
(9, 'David Coulthard', 'Egyesült Királyság', '0000-00-00'),
(10, 'Mark Webber', 'Ausztrália', '0000-00-00'),
(11, 'Jarno Trulli', 'Olaszország', '0000-00-00'),
(12, 'Timo Glock', 'Németország', '0000-00-00'),
(14, 'Sébastien Bourdais', 'Franciaország', '0000-00-00'),
(15, 'Sebastian Vettel', 'Németország', '0000-00-00'),
(16, 'Jenson Button', 'Egyesült Királyság', '0000-00-00'),
(17, 'Rubens Barrichello', 'Brazília', '0000-00-00'),
(18, 'Takuma Sato', 'Japán', '0000-00-00'),
(19, 'Anthony Davidson', 'Egyesült Királyság', '0000-00-00'),
(20, 'Adrian Sutil', 'Németország', '0000-00-00'),
(21, 'Giancarlo Fisichella', 'Olaszország', '0000-00-00'),
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
-- Dumping data for table `pontszamitas`
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
