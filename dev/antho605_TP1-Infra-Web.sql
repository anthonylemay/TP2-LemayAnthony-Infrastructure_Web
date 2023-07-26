-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2023 at 11:45 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antho605_TP1-Infra-Web`
--

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int NOT NULL,
  `nom_recette` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `temps_cuisson_recette` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`id_recette`, `nom_recette`, `temps_cuisson_recette`, `id_type`) VALUES
(1, 'Muffins aux carottes', '20 minutes', 7),
(2, 'Oeufs brouillés aux légumes', '25 minutes', 2),
(3, 'Quiche', '30 minutes', 3),
(4, 'Fondue Chinoise', '15 minutes', 3),
(5, 'Quiche au cheddar et au bacon', '25 minutes', 3),
(6, 'Lait de poule du champion', '5 minutes', 4),
(10, 'Biscuits', '1 minute', 1),
(11, 'Steak & Eggs', '35 minutes', 2),
(13, 'Brownies', '45 minutes', 7),
(14, 'Buche de noël', '1H30', 7),
(16, 'Pain aux bananes', '35 minutes', 7);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int NOT NULL,
  `type_repas` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type_repas`) VALUES
(1, 'Collations'),
(2, 'Petits déjeuners'),
(3, 'Repas'),
(4, 'Breuvages'),
(5, 'Pré-entraînements'),
(6, 'Suppléments'),
(7, 'Desserts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `fk_recipe_type` (`id_type`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_recipe_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
