-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 09:00 PM
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
-- Database: `TP1_infra_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredients` int NOT NULL,
  `nom_ingredient` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unite_mesure` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredients`, `nom_ingredient`, `id_unite_mesure`) VALUES
(1, 'carotte', 1),
(2, 'lait', 8),
(3, 'blanc d\'oeuf', 11),
(4, 'farine', 1),
(5, 'sucre', 5),
(6, 'eau', 8),
(7, 'huile végétale', 6),
(8, 'compote de pomme sans sucre ajouté', 8),
(9, 'extrait de vanille', 5),
(10, 'levure', 1),
(11, 'bicarbonate de soude', 1),
(12, 'canelle moulue', 5),
(13, 'noix de muscade', 1),
(14, 'sel', 6),
(15, 'fromage à la crème', 7),
(16, 'beurre', 1),
(17, 'pacanes', 1),
(18, 'poivre', 6),
(19, 'crème', 3),
(20, 'tranches de pain', 11),
(21, 'huile d\'olive', 6),
(22, 'échalottes', 1),
(23, 'fromage cheddar', 16),
(24, 'bacon', 1),
(25, 'champignon blanc', 1),
(26, 'fromage parmesan', 17),
(27, 'Spaghetti', 17),
(28, 'Pâtes Spaghetti', 1),
(29, 'gousse d\'ail', 11),
(30, 'Oignon', 1),
(31, 'café', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recette`
--

CREATE TABLE `ingredient_recette` (
  `id_ingredient_recette` int NOT NULL,
  `id_ingredients` int NOT NULL,
  `id_recette` int NOT NULL,
  `id_qte_ingredient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient_recette`
--

INSERT INTO `ingredient_recette` (`id_ingredient_recette`, `id_ingredients`, `id_recette`, `id_qte_ingredient`) VALUES
(1, 5, 1, 2),
(2, 7, 1, 5),
(3, 10, 1, 20),
(4, 12, 1, 7),
(5, 3, 1, 6),
(6, 1, 1, 21),
(7, 5, 1, 9),
(8, 13, 1, 19),
(9, 3, 2, 8),
(10, 6, 2, 16),
(11, 7, 2, 21),
(12, 18, 2, 23),
(13, 21, 2, 17),
(14, 22, 2, 27),
(15, 2, 3, 22),
(16, 8, 3, 2),
(17, 10, 3, 6),
(18, 12, 3, 9),
(19, 14, 3, 19),
(21, 17, 3, 23),
(22, 1, 4, 1),
(23, 6, 4, 20),
(24, 8, 4, 7),
(25, 13, 4, 19),
(26, 14, 4, 7),
(27, 19, 4, 20),
(28, 25, 4, 2),
(29, 1, 5, 10),
(30, 4, 5, 24),
(31, 6, 5, 12),
(32, 7, 5, 21),
(33, 16, 5, 9),
(34, 18, 5, 6),
(35, 21, 5, 3),
(36, 23, 5, 9),
(37, 24, 5, 19),
(38, 3, 6, 20),
(39, 9, 6, 26),
(40, 2, 6, 1),
(41, 12, 6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `qte_ingredient`
--

CREATE TABLE `qte_ingredient` (
  `id_qte_ingredient` int NOT NULL,
  `quantite` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qte_ingredient`
--

INSERT INTO `qte_ingredient` (`id_qte_ingredient`, `quantite`) VALUES
(1, '1/4'),
(2, '1/2'),
(3, '1/3'),
(4, '1/8'),
(5, '1'),
(6, '2'),
(7, '3'),
(8, '4'),
(9, '5'),
(10, '6'),
(11, '7'),
(12, '8'),
(13, '9'),
(14, '10'),
(15, '2/3'),
(16, '3/4'),
(17, '15'),
(18, '20'),
(19, '25'),
(20, '100'),
(21, '200'),
(22, '300'),
(23, '500'),
(24, '250'),
(25, '150'),
(26, '175'),
(27, '225'),
(28, '125'),
(29, '275'),
(30, '350');

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int NOT NULL,
  `nom_recette` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etapes_recette` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_publication_recette` date NOT NULL,
  `temps_cuisson_recette` time NOT NULL,
  `auteur_recette` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_type` int NOT NULL,
  `id_regime` int NOT NULL,
  `id_ingredient_recette` int DEFAULT NULL,
  `allergies_et_intolerances` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`id_recette`, `nom_recette`, `etapes_recette`, `date_publication_recette`, `temps_cuisson_recette`, `auteur_recette`, `id_type`, `id_regime`, `id_ingredient_recette`, `allergies_et_intolerances`) VALUES
(1, 'Muffins aux carottes', 'Préparation : Râper les carottes et mélanger avec la farine, le sucre, les œufs, l\'huile végétale, la levure chimique, la cannelle moulue et le sel. Verser la pâte dans des moules à muffins et cuire au four pendant environ 20 minutes.', '2023-04-21', '00:20:00', 'Chef Tony Boyardee', 7, 1, NULL, NULL),
(2, 'Oeufs brouillés aux légumes', 'Préparation : Battre les œufs avec du lait, du sel et du poivre. Faire revenir les carottes, les champignons et l\'oignon dans de l\'huile d\'olive. Ajouter les œufs battus et remuer jusqu\'à ce qu\'ils soient cuits.', '2023-03-14', '00:10:00', 'Chef Tony Boyardee', 2, 1, NULL, NULL),
(3, 'Crêpes à la pomme et à la cannelle', 'Préparation : Dans un bol, mélanger la farine, le sucre, le lait, les œufs, la levure chimique, la cannelle moulue et la compote de pomme sans sucre ajouté. Faire cuire la pâte dans une poêle légèrement huilée jusqu\'à ce que les pancakes soient dorés des deux côtés.', '2023-02-02', '00:15:00', 'Chef Tony Boyardee', 2, 1, NULL, 'contient du lactose'),
(4, 'Spaghetti crémeux aux champignons', 'Préparation : Cuire les pâtes selon les instructions sur l\'emballage. Dans une poêle, faire revenir les champignons, l\'oignon et l\'ail dans de l\'huile d\'olive. Ajouter la crème, le sel, le poivre et le fromage Parmesan (si désiré). Mélanger les pâtes cuites avec la sauce aux champignons.', '2023-05-14', '00:35:00', 'Chef Tony Boyardee', 3, 13, NULL, 'contient du lactose'),
(5, 'Quiche au cheddar et au bacon', 'Préparation : Préchauffer le four et préparer une pâte brisée en mélangeant la farine, le beurre et l\'eau. Abaisser la pâte dans un moule à tarte et la garnir de fromage cheddar râpé et de bacon préalablement cuit. Dans un bol, mélanger les œufs, le lait, le sel et le poivre, puis verser ce mélange sur la garniture. Cuire au four jusqu\'à ce que la quiche soit dorée et prise.', '2023-10-29', '00:55:00', 'Chef Tony Boyardee', 3, 13, NULL, 'contient du lactose'),
(6, 'Lait de poule du champion', 'Préparation : Casser les oeufs dans votre mélaxeur, ajoutez le lait, l\'extrait de vanille et la canelle puis ajoutez de glace à votre convenance. Mélaxez le tout pendant 30 secondes et servez dans une pinte. Bon appétit!', '2023-06-04', '00:04:00', 'Chef Tony Boyardee', 4, 1, NULL, 'contient du lactose');

-- --------------------------------------------------------

--
-- Table structure for table `regime`
--

CREATE TABLE `regime` (
  `id_regime` int NOT NULL,
  `type_regime` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regime`
--

INSERT INTO `regime` (`id_regime`, `type_regime`) VALUES
(1, 'Végétarien'),
(2, 'Carnivore Cru'),
(3, 'Cétogène'),
(4, 'Vegan'),
(5, 'Sans Gluten'),
(6, 'Faible en Glucides'),
(7, 'Paléolithique'),
(8, 'Méditerranéen'),
(9, 'Sans Sucre'),
(10, 'Hypocalorique'),
(11, 'Pescétarien'),
(12, 'Alcalin'),
(13, 'Sans restrictions'),
(14, 'Riche en Protéines');

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

-- --------------------------------------------------------

--
-- Table structure for table `unite_mesure`
--

CREATE TABLE `unite_mesure` (
  `id_unite_mesure` int NOT NULL,
  `unite_mesure` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unite_mesure`
--

INSERT INTO `unite_mesure` (`id_unite_mesure`, `unite_mesure`) VALUES
(1, 'g'),
(2, 'kg'),
(3, 'ml'),
(4, 'l'),
(5, 'c. à thé'),
(6, 'c. à soupe'),
(7, 'oz'),
(8, 'tasse'),
(9, 'gallon'),
(10, 'lb'),
(11, 'u'),
(12, '°C'),
(13, '°F'),
(14, 'chopine'),
(15, 'pinte'),
(16, 'tranche'),
(17, 'pincée');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredients`),
  ADD KEY `fk_id_unite_mesure` (`id_unite_mesure`);

--
-- Indexes for table `ingredient_recette`
--
ALTER TABLE `ingredient_recette`
  ADD PRIMARY KEY (`id_ingredient_recette`),
  ADD KEY `fk_id_recette` (`id_recette`),
  ADD KEY `fk_id_ingredients` (`id_ingredients`),
  ADD KEY `fk_id_qte_ingredient` (`id_qte_ingredient`);

--
-- Indexes for table `qte_ingredient`
--
ALTER TABLE `qte_ingredient`
  ADD PRIMARY KEY (`id_qte_ingredient`);

--
-- Indexes for table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `fk_recipe_type` (`id_type`),
  ADD KEY `fk_regime_type` (`id_regime`),
  ADD KEY `fk_ingredient_recette` (`id_ingredient_recette`);

--
-- Indexes for table `regime`
--
ALTER TABLE `regime`
  ADD PRIMARY KEY (`id_regime`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `unite_mesure`
--
ALTER TABLE `unite_mesure`
  ADD PRIMARY KEY (`id_unite_mesure`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredients` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ingredient_recette`
--
ALTER TABLE `ingredient_recette`
  MODIFY `id_ingredient_recette` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `qte_ingredient`
--
ALTER TABLE `qte_ingredient`
  MODIFY `id_qte_ingredient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `regime`
--
ALTER TABLE `regime`
  MODIFY `id_regime` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unite_mesure`
--
ALTER TABLE `unite_mesure`
  MODIFY `id_unite_mesure` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_id_unite_mesure` FOREIGN KEY (`id_unite_mesure`) REFERENCES `unite_mesure` (`id_unite_mesure`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ingredient_recette`
--
ALTER TABLE `ingredient_recette`
  ADD CONSTRAINT `fk_id_ingredients` FOREIGN KEY (`id_ingredients`) REFERENCES `ingredients` (`id_ingredients`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_qte_ingredient` FOREIGN KEY (`id_qte_ingredient`) REFERENCES `qte_ingredient` (`id_qte_ingredient`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_recette` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_ingredient_recette` FOREIGN KEY (`id_ingredient_recette`) REFERENCES `ingredient_recette` (`id_ingredient_recette`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_recipe_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_regime_type` FOREIGN KEY (`id_regime`) REFERENCES `regime` (`id_regime`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
