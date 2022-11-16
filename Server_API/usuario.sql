-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usuario`
--

-- --------------------------------------------------------

--
-- Table structure for table `codigo`
--

CREATE TABLE `codigo` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pase` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`id`, `user`, `password`, `correo`, `estado`) VALUES
(126, 'reyes', '1234567890', 'peach3091@gmail.com', 'Activo'),
(129, 'reyes1', '0987654321', 'zalasar1820@gmail.com', 'Activo'),
(130, 'armando', 'holamundo98', 'salasar@buscaminas.xyz', 'Desactivado'),
(131, 'jose', 'Peach$1998', 'jzalasar2018@gmail.com', 'Desactivado'),
(132, 'carlos', 'Carlos$1996', 'carloseduardoespinal@outlook.com', 'Desactivado'),
(138, 'cralos', '0987654321', 'salasar@salasar.xyz', 'Activo'),
(139, 'jreyes', '1234567890', 'salasar1820@gmail.com', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `llegada`
--

CREATE TABLE `llegada` (
  `id` int(11) NOT NULL,
  `turno` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pase` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `llegada`
--

INSERT INTO `llegada` (`id`, `turno`, `pase`) VALUES
(1, '69', '1');

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `dinero` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `dni`, `iduser`, `dinero`) VALUES
(77, 'Jose Salasar', '0501199809525', 126, ''),
(80, 'Jose Salasar', '0501199809525', 129, ''),
(81, 'Armando Reyes', '0501199809525', 130, ''),
(82, 'Jose Salasar', '0501199809525', 131, ''),
(83, 'Carlos Espinal', '0501199625801', 132, ''),
(89, 'Carlos Salasar', '0501200400987', 138, '100'),
(90, 'Jose Reyes', '0501199809525', 139, '527593041');

-- --------------------------------------------------------

--
-- Table structure for table `rclave`
--

CREATE TABLE `rclave` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rcorreo`
--

CREATE TABLE `rcorreo` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verificar`
--

CREATE TABLE `verificar` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `verificar`
--

INSERT INTO `verificar` (`id`, `correo`, `user`, `code`) VALUES
(29, 'salasar@buscaminas.xyz', 'armando', '9890564861'),
(41, 'carloseduardoespinal@outlook.com', 'carlos', '8442574742');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llegada`
--
ALTER TABLE `llegada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `rclave`
--
ALTER TABLE `rclave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcorreo`
--
ALTER TABLE `rcorreo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verificar`
--
ALTER TABLE `verificar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codigo`
--
ALTER TABLE `codigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `llegada`
--
ALTER TABLE `llegada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `rclave`
--
ALTER TABLE `rclave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rcorreo`
--
ALTER TABLE `rcorreo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `verificar`
--
ALTER TABLE `verificar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
