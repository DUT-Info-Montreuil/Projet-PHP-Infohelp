-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 jan. 2023 à 17:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dutinfopw201612`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomCat` varchar(255) NOT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCat`, `nomCat`) VALUES
(1, 'appareils ménagers'),
(2, 'appareils portatifs'),
(3, 'développement logiciel'),
(4, 'développement mobile'),
(5, 'maintenance'),
(6, 'périphériques (ex:écran)'),
(7, 'sécurité réseaux/logiciels'),
(8, 'unité centrale (composants)');

-- --------------------------------------------------------

--
-- Structure de la table `categorietutos`
--

DROP TABLE IF EXISTS `categorietutos`;
CREATE TABLE IF NOT EXISTS `categorietutos` (
  `idCategorieTuto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(32) NOT NULL,
  PRIMARY KEY (`idCategorieTuto`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorietutos`
--

INSERT INTO `categorietutos` (`idCategorieTuto`, `nomCategorie`) VALUES
(1, 'Système exploitation'),
(2, 'Ordinateur portable'),
(5, 'Ordinateur'),
(6, 'Téléphone');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idFavoris` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idTechnicien` bigint(20) UNSIGNED NOT NULL,
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`idFavoris`),
  KEY `idTechnicien` (`idTechnicien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`idFavoris`, `idTechnicien`, `idUtilisateur`) VALUES
(2, 11, 95);

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `idMateriel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomMateriel` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` text NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(25) NOT NULL,
  `image` text,
  `prix` smallint(6) NOT NULL,
  `vendeur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`idMateriel`, `nomMateriel`, `quantite`, `description`, `marque`, `couleur`, `image`, `prix`, `vendeur`) VALUES
(2, 'Dell G15 5511', 18, ' Processeur Intel Core i5-11400H 15.6\" Full HD Black 8Go SSD de 256Go NVIDIA GeForce RTX 3050 Windows 11H Home\nPerformances puissantes : avec des processeurs Intel Core jusqu\'à la 11e génération, vous pouvez profiter de performances puissantes sans interrompre vos jeux, votre streaming ou vos vidéos.\nLe panneau d\'affichage 120 Hz offre des taux de rafraîchissement rapides et une résolution FHD pour garantir une expérience de jeu rapide, fluide et détaillée.\nOffrez-vous un boost de puissance lorsque le jeu devient critique en appuyant simplement sur FN plus le bouton Game Shift pour déclencher un mode de performance dynamique.\nSon immersif : deux haut-parleurs avec audio 3D nahimique pour les joueurs vous permettent d\'entendre chaque plan d\'attaque avec une clarté nette ', 'Dell', 'Noir', '2022.12.09 - 09.52.05pm.jpg', 899, NULL),
(6, 'SanDisk Ultra', 1, 'Cle', 'SanDisk', 'Noir', '2022.12.10 - 03.31.20pm.jpg', 16, NULL),
(7, 'AMD Ryzen 5 5600X Processeur 3,7 GHz 32 Mo L3 Boîte Multicolore', 1, 'Fabricant : AMD. Nb de cœurs du CPU: 6. Fréquence de base 3.7GHz', 'AMD', '-', '2023.01.23 - 07.29.50pm.jpg', 189, 'DILIPE'),
(8, 'Clavier Souris sans Fil', 1, 'Le clavier et la souris sans fil fonctionnent confortablement. La technologie sans fil 2,4 GHz, le clavier et la souris assurent une connexion stable et fiable avec une distance maximale de 15 mètres.', 'TedGem', 'Noir', '2023.01.23 - 07.32.08pm.jpg', 28, 'DILIPE'),
(11, 'Seagate BarraCuda, 1 To, Disque dur interne HDD', 1, 'Disque dur mécanique', 'Seagate', 'Noir et vert', '2023.01.23 - 07.39.25pm.jpg', 45, 'DILIPE');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `idRdv` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `horaire` time NOT NULL,
  `dateRDV` date NOT NULL,
  `idTechnicien` bigint(20) UNSIGNED NOT NULL,
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `idCategorie` bigint(20) UNSIGNED NOT NULL,
  `note` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRdv`),
  KEY `idTechnicien` (`idTechnicien`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`idRdv`, `horaire`, `dateRDV`, `idTechnicien`, `idUtilisateur`, `idCategorie`, `note`) VALUES
(6, '10:25:00', '2023-01-28', 11, 89, 2, 0),
(7, '10:00:00', '2023-01-28', 11, 89, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

DROP TABLE IF EXISTS `techniciens`;
CREATE TABLE IF NOT EXISTS `techniciens` (
  `idTechnicien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `idVille` bigint(20) UNSIGNED NOT NULL,
  `note` decimal(10,0) DEFAULT NULL,
  `idCategorie` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`idTechnicien`),
  KEY `idVille` (`idVille`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`idTechnicien`, `nom`, `prenom`, `idVille`, `note`, `idCategorie`) VALUES
(2, 'CHIPAN', 'Lucas', 1, '0', 1),
(3, 'GHLOUC', 'Merwanne', 1, '0', 2),
(4, 'GERMANA KINKELA', 'Geovany', 6, '0', 3),
(5, 'TOUR', 'Modi', 6, '0', 4),
(8, 'BAU', 'Patric', 1, '0', 7),
(9, 'PINCHONNIER', 'Franc', 3, '0', 8),
(10, 'JACQUE', 'Thommy', 2, '2', 3),
(11, 'DILIPE', 'Daniel', 1, '0', 2),
(12, 'KEMA', 'Yannis', 6, '0', 3),
(13, 'NGATCH', 'Antoinette', 4, '0', 4),
(14, 'BOULAND', 'Fabrice', 3, '0', 5),
(15, 'AHAMO', 'Clark', 5, '0', 6),
(16, 'MANDE', 'Yanis', 4, '0', 7),
(17, 'AHAMO', 'Mohamed', 1, '0', 8),
(18, 'TOU', 'Louis', 2, '0', 1),
(19, 'KILI', 'Shainis', 3, '0', 2),
(20, 'ADJO', 'Raphaelle', 4, '0', 3),
(21, 'MALEBE', 'Corneil', 5, '0', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tutos`
--

DROP TABLE IF EXISTS `tutos`;
CREATE TABLE IF NOT EXISTS `tutos` (
  `idTuto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `miniature` text NOT NULL,
  `auteur` varchar(32) NOT NULL,
  `nbVues` int(11) DEFAULT '0',
  `idCategorieVideo` bigint(20) UNSIGNED NOT NULL,
  `lienVideo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTuto`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tutos`
--

INSERT INTO `tutos` (`idTuto`, `titre`, `miniature`, `auteur`, `nbVues`, `idCategorieVideo`, `lienVideo`) VALUES
(1, 'Installer / Réinstaller Windows 10 sur son PC ! [Tuto Complet]', '2022.12.05 - 01.29.06pm.jpeg', 'iPodTouchisapro', 9, 1, 'KecoxVL2UDU'),
(2, 'Pour comprendre et réparer des problèmes d\'absence ou échec du démarrage de Windows 10', '2022.12.05 - 01.30.04pm.jpeg', 'DellVousAide', 6, 1, 'pG1QaXPvvO4'),
(3, 'Comment démonter un ordinateur portable', '2022.12.05 - 01.31.15pm.jpeg', 'Spareka', 6, 2, 'FoQnCVos0XE'),
(4, 'Comment Monter Son Premier PC Gamer en 2022', '2022.12.05 - 01.32.57pm.jpeg', 'DiscoverID', 3, 5, '_lnDdxbrRF8'),
(5, 'COMMENT MONTER SON PC en 2022 !', '2022.12.05 - 01.37.03pm.jpeg', 'FrenchHardware', 3, 5, 'W_81oSroorU'),
(6, 'Cours informatique débutant : Les BASES de Windows 10 (tuto français)', '2022.12.11 - 07.22.16pm.jpg', 'La Tech avec Bertrand', 3, 1, 'jvL8jUglStA'),
(8, 'Comment changer le disque dur d\'un ordinateur portable', '2022.12.12 - 07.28.35pm.jpg', 'Spareka', 3, 2, 'HHC4MxHU0ik'),
(11, 'Comment remplacer la batterie iPhone 11 ', '2023.01.23 - 01.06.26pm.jpeg', 'SOSav', 3, 6, '0FhEUIA59wU'),
(12, 'Comment réparer un téléphone Android qui ne s’allume plus (écran noir) ?', '2023.01.23 - 07.44.06pm.jpg', 'Wondershare Français', 0, 6, '4sN4u8dipZ4');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `mode` int(11) DEFAULT '0',
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `adresse_postale`, `ville`, `mode`, `image`) VALUES
(1, 'ADMIN', 'ADMIN', 'admin@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '94000', 'Creteil', 1, '2022.12.11 - 09.32.50pm.jpg'),
(62, 'CHIPAN', 'Lucas', 'lchipan@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '7 RUE DE L\'ALBONI', 'Pars', 2, '2022.12.11 - 09.55.18pm.png'),
(63, 'GHLOUC', 'Merwanne', 'mghlouci@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '3 RUE RUDOLF NOUREEV\r\n', 'Paris', 2, ''),
(64, 'TOUR', 'Modi', 'mtoure@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '104 RUE DE LA GLACIERE\r\n', 'Cergy', 2, ''),
(67, 'BAU', 'Patric', 'pbaude@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '162 AV D\'ITALIE\r\n', 'Paris', 2, ''),
(68, 'PINCHONNIER', 'Franc', 'fpinchon@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '3 PAS JEAN NICOT\r\n', 'Sarcelles', 2, ''),
(69, 'JACQUE', 'Thommy', 'tjacquemin@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '48 RUE LEON FROT\r\n', 'Creteil', 2, ''),
(70, 'DILIPE', 'Daniel', 'ddilipe@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '12 HAM DU DANUBE\r\n', 'Paris', 2, ''),
(71, 'KEMA', 'Yannis', 'ykemayou@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '35 RUE DU REPOS\r\n', 'Cergy', 2, ''),
(72, 'NGATCH', 'Antoinette', 'angatchou@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '2 RUE VOLTA\r\n', 'Nanterre', 2, ''),
(74, 'AHAMO', 'Clark', 'kahamed@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '2 SQ DE VAUCLUSE\r\n', 'Montreuil', 2, ''),
(75, 'MANDE', 'Yanis', 'ydiomande@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '14 RUE GAVARNI\r\n', 'Nanterre', 2, ''),
(76, 'AHAMO', 'Mohamed', 'mahamed@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '10 RUE JOSEPH DIJON\r\n', 'Paris', 2, ''),
(77, 'TOU', 'Louis', 'ttouil@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '82 RUE MANIN\r\n', 'Creteil', 2, ''),
(78, 'KILI', 'Shainis', 'sbakili@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '152 RUE DE GRENELLE\r\n', 'Sarcelles', 2, ''),
(79, 'ADJO', 'Raphaelle', 'radjovie@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '2 RUE DES MAUVAIS GARCONS\r\n', 'Nanterre', 2, ''),
(80, 'MALE', 'Corneille', 'cmalebe@gmail.com', '$2y$10$U3qmUHsKZy4G.ZD0v..UROAOcuRUxSE7pbLz1//Z0nJ3o0Ev4Ma1O', '85 P RUE DU BAC\r\n', 'Montreuil', 2, ''),
(81, 'GERMANA KINKELA', 'Geovany', 'ggermana@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '30 RUE FABERT\r\n', 'Cergy', 0, ''),
(89, 'DILIPE', 'Daniel', 'daniel@gmail.com', '$2y$10$JfIHaxsdGrkVoN0vwpdoZOt03IYUImnHMD8XbxP/X/zmpacXxQvzu', '29 rue edison', 'Creteil', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`, `codePostal`) VALUES
(1, 'Paris', 75000),
(2, 'Creteil', 94000),
(3, 'Sarcelles', 95520),
(4, 'Nanterre', 92000),
(5, 'Montreuil', 93100),
(6, 'Cergy', 95800);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`idTechnicien`) REFERENCES `techniciens` (`idTechnicien`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`idTechnicien`) REFERENCES `techniciens` (`idTechnicien`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `rendezvous_ibfk_3` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCat`);

--
-- Contraintes pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD CONSTRAINT `techniciens_ibfk_1` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`),
  ADD CONSTRAINT `techniciens_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
