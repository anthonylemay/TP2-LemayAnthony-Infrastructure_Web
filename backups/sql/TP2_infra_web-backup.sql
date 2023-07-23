-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 03 juil. 2023 à 21:54
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_final_2023`
--

-- --------------------------------------------------------

--
-- Structure de la table `chalets`
--

CREATE TABLE `chalets` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `personnes_max` int NOT NULL,
  `prix_haute_saison` int NOT NULL,
  `prix_basse_saison` int NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `fk_region` int NOT NULL,
  `id_picsum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chalets`
--

INSERT INTO `chalets` (`id`, `nom`, `description`, `personnes_max`, `prix_haute_saison`, `prix_basse_saison`, `actif`, `promo`, `date_inscription`, `fk_region`, `id_picsum`) VALUES
(1, 'Chalet Havre de paix - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo. ', 12, 165, 150, 1, 1, '2023-06-01', 1, 380),
(2, 'Chalet INACTIF - Centre du Québec', 'Magnifique Chalet. Puisqu\'il est inactif, il ne devrait pas s\'afficher sur le site, dans aucune page. ', 4, 110, 100, 0, 1, '2023-06-02', 1, 10),
(3, 'Chalet Havre de paix - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo. ', 14, 132, 120, 1, 1, '2023-06-03', 2, 13),
(4, 'Chalet Havre de paix - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo. ', 10, 209, 190, 1, 1, '2023-06-04', 3, 14),
(5, 'Chalet Havre de paix - Saguenay-Lac-Saint-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo. ', 12, 214, 195, 1, 1, '2023-06-05', 4, 17),
(6, 'Chalet PAS PROMO - Centre du Québec', 'Magnifique chalet pas en promotion.... Il peut s\'afficher dans la liste des chalets de la région Centre-du-Québec et dans la liste complète des chalets. Il ne doit pas appraître sur l\'accueil, ni dans la liste des chalets en promo. ', 6, 165, 150, 1, 0, '2023-06-06', 1, 28),
(7, 'Chalet INACTIF et PAS PROMO - Centre-du-Québec', 'Magnifique Chalet. Puisqu\'il est inactif, il ne devrait pas s\'afficher sur le site, dans aucune page. ', 6, 236, 215, 0, 0, '2023-06-07', 1, 380),
(8, 'Chalet Sérénité - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo.', 8, 248, 225, 1, 1, '2023-07-02', 1, 380),
(9, 'Chalet Sérénité - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 242, 220, 1, 1, '2023-06-09', 2, 380),
(10, 'Chalet Sérénité - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 187, 170, 1, 1, '2023-06-10', 3, 380),
(11, 'Chalet Sérénité - Saguenay-Lac-St-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo.', 8, 110, 100, 1, 1, '2023-06-11', 4, 380),
(12, 'Chalet Le paradis perdu - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo.', 10, 214, 195, 1, 1, '2023-06-12', 1, 380),
(13, 'Chalet Le paradis perdu - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 126, 115, 1, 1, '2023-06-13', 2, 380),
(14, 'Chalet Le paradis perdu - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 214, 195, 1, 1, '2023-06-14', 3, 380),
(15, 'Chalet Le paradis perdu - Saguenay-Lac-St-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo.', 12, 264, 240, 1, 1, '2023-06-15', 4, 380);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'Centre-du-Québec'),
(2, 'Mauricie'),
(3, 'Montérégie'),
(4, 'Saguenay–Lac-Saint-Jean ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chalets`
--
ALTER TABLE `chalets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chalets_regions` (`fk_region`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chalets`
--
ALTER TABLE `chalets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chalets`
--
ALTER TABLE `chalets`
  ADD CONSTRAINT `chalets_regions` FOREIGN KEY (`fk_region`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
