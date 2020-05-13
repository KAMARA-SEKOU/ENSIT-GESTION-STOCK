-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 13, 2020 at 10:37 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dd`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `ID_Cat` int(100) NOT NULL,
  `NomCat` char(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`ID_Cat`, `NomCat`, `date_added`) VALUES
(4, 'ITECH', '2019-08-07 23:03:35'),
(7, 'EDUCATION', '2019-08-08 05:43:39'),
(9, 'SANTE', '2019-08-10 19:50:32'),
(10, 'SHOWBIZ', '2019-09-18 00:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
  `ID_Com` int(100) NOT NULL,
  `utilisateur_FK` int(100) NOT NULL,
  `fournisseur_FK` int(100) NOT NULL,
  `produitCom` char(100) NOT NULL,
  `quantiteCom` int(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COMMANDE`
--

INSERT INTO `COMMANDE` (`ID_Com`, `utilisateur_FK`, `fournisseur_FK`, `produitCom`, `quantiteCom`, `date_added`) VALUES
(1, 1, 8, 'SAVON', 6534, '2019-09-19 00:00:00'),
(5, 1, 15, 'VISA CARTE', 643, '2019-09-17 23:22:44'),
(6, 1, 19, 'CARTE VISA PREPAYEE', 1000, '2019-09-18 15:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `ETUDIANT`
--

CREATE TABLE `ETUDIANT` (
  `Id_Etud` int(100) NOT NULL,
  `PrenomEtud` char(200) NOT NULL,
  `NomEtud` char(200) NOT NULL,
  `MatriculeEtud` char(200) NOT NULL,
  `SexeEtud` tinyint(4) NOT NULL,
  `NiveauEtud` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ETUDIANT`
--

INSERT INTO `ETUDIANT` (`Id_Etud`, `PrenomEtud`, `NomEtud`, `MatriculeEtud`, `SexeEtud`, `NiveauEtud`, `date_added`) VALUES
(3, 'SEKOU', 'KAMARA', '02020830w', 1, 5, '2019-08-04 21:27:59'),
(4, 'OUMAR', 'DIABY', '12ER4567', 1, 5, '2019-08-05 00:31:51'),
(5, 'SEKOU', 'KONE SEGO', '23EN2345T', 1, 2, '2019-08-10 19:56:44'),
(6, 'AHMED', 'KAMARA', '34EP3478', 2, 2, '2019-11-07 19:15:30'),
(7, 'ADJA', 'KONE', '09EN0888', 1, 1, '2020-05-06 22:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `FOURNISSEUR`
--

CREATE TABLE `FOURNISSEUR` (
  `ID_Fournisseur` int(100) NOT NULL,
  `EntrepriseFour` char(20) NOT NULL,
  `AdresseFour` char(20) NOT NULL,
  `EmailFour` char(20) NOT NULL,
  `TelFour` int(20) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FOURNISSEUR`
--

INSERT INTO `FOURNISSEUR` (`ID_Fournisseur`, `EntrepriseFour`, `AdresseFour`, `EmailFour`, `TelFour`, `date_added`) VALUES
(1, 'CANAL+', '234 kgo 23', 'oum@gmail.ci', 345678456, '2019-12-25 11:34:34'),
(8, 'SEKOU SARL', '1409 ABJ 15', 'ksekou@gmail.com', 77147369, '2019-08-04 11:31:29'),
(9, 'HENRY SOCIETY', '1409 ABJ 15', 'ksekou@gmail.com', 77147369, '2019-08-04 11:46:32'),
(10, 'NSIA BANK', '1409 ABJ 15', 'ksekou@gmail.com', 45892922, '2019-08-04 12:20:46'),
(15, 'GLOBE KAMARA', '1409 ABJ 15', 'ksekou@gmail.com', 77147369, '2019-08-10 19:59:12'),
(17, 'SAMSUNG', '1409 ABJ 15', 'samsung@gmail.com', 8664883, '2019-08-18 16:03:49'),
(18, 'KAMARA', '1234 yahro 44', 'ddd22@gmail.com', 345566665, '2019-08-30 16:52:39'),
(19, 'CORIS BANK', '31 bke 20', 'coris-ci@gmail.ci', 346788934, '2019-09-18 00:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUIT`
--

CREATE TABLE `PRODUIT` (
  `ID_Prod` int(100) NOT NULL,
  `categorie_FK` int(100) NOT NULL,
  `fournisseur_FK2` int(100) NOT NULL,
  `utilisateur_FK2` int(100) NOT NULL,
  `NomProd` char(100) NOT NULL,
  `codeProd` int(100) NOT NULL,
  `QuantiteProd` int(100) NOT NULL,
  `DesignationProd` char(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUIT`
--

INSERT INTO `PRODUIT` (`ID_Prod`, `categorie_FK`, `fournisseur_FK2`, `utilisateur_FK2`, `NomProd`, `codeProd`, `QuantiteProd`, `DesignationProd`, `date_added`) VALUES
(1, 4, 9, 1, 'HP PRINTER', 343547834, 54, 'ROUGE', '2019-09-17 00:00:00'),
(6, 9, 8, 4, 'seringue', 345677, 356, 'blanc', '2017-04-09 14:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `user_id` int(100) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `session_id`) VALUES
(1, 'KAMARA', 'SEKOU', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-05-21 15:06:00', ''),
(4, 'TATI', 'PAUL', 'tpaul', '$2y$10$HLS2VSFsObEIdrh48tKTKOHncSe.khChge.gLJBE7H8B55bAc12hW', 'konem@gmail.com', '2019-08-18 16:02:09', 'nfluedgalu4tmv6edq9r2ma06v'),
(5, 'DIABATE', 'AROUNA', 'diab', '$2y$10$9Dz801AhzaDgKdo5PCg21enMKCqZvKov6v0SGGrzuouxWFW8JbPjm', 'diab@gmail.com', '2019-11-07 18:57:05', '96708e2090339453ead177cd1dcdaef5'),
(6, 'KAMARA', 'SEKOU', 'webpreparations', '$2y$10$C0ORdjA.zPP50/ib4JH9ge7gYLBp8VUMiSM1Uq6szjpZZIVKVGBxW', 'kamarasekou@hotmail.com', '2020-05-06 22:13:06', ''),
(7, 'KARE', 'AMARA', 'AMARA', '$2y$10$gB0hZudW9uD0S0NK1XmvzenX2e3/oL41Anm8p8bsrfqwOt5ROebfW', 'kamarasekouFD@hotmail.com', '2020-05-06 22:14:53', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`ID_Cat`);

--
-- Indexes for table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD PRIMARY KEY (`ID_Com`),
  ADD KEY `FK_FOURNISSEUR` (`fournisseur_FK`),
  ADD KEY `FK_UTILISATEUR` (`utilisateur_FK`);

--
-- Indexes for table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  ADD PRIMARY KEY (`Id_Etud`);

--
-- Indexes for table `FOURNISSEUR`
--
ALTER TABLE `FOURNISSEUR`
  ADD PRIMARY KEY (`ID_Fournisseur`),
  ADD UNIQUE KEY `ID_Fournisseur` (`ID_Fournisseur`,`EntrepriseFour`,`AdresseFour`,`EmailFour`,`TelFour`),
  ADD UNIQUE KEY `ID_Fournisseur_2` (`ID_Fournisseur`),
  ADD UNIQUE KEY `ID_Fournisseur_3` (`ID_Fournisseur`),
  ADD UNIQUE KEY `ID_Fournisseur_4` (`ID_Fournisseur`),
  ADD UNIQUE KEY `EntrepriseFour_2` (`EntrepriseFour`),
  ADD KEY `ID_Fournisseur_5` (`ID_Fournisseur`),
  ADD KEY `EntrepriseFour` (`EntrepriseFour`);

--
-- Indexes for table `PRODUIT`
--
ALTER TABLE `PRODUIT`
  ADD PRIMARY KEY (`ID_Prod`),
  ADD KEY `FK_CATEGORIE` (`categorie_FK`),
  ADD KEY `FK_FOURNISSEUR2` (`fournisseur_FK2`),
  ADD KEY `FK_UTILISATEUR2` (`utilisateur_FK2`);

--
-- Indexes for table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  MODIFY `ID_Cat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  MODIFY `ID_Com` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  MODIFY `Id_Etud` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `FOURNISSEUR`
--
ALTER TABLE `FOURNISSEUR`
  MODIFY `ID_Fournisseur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `PRODUIT`
--
ALTER TABLE `PRODUIT`
  MODIFY `ID_Prod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD CONSTRAINT `FK_FOURNISSEUR` FOREIGN KEY (`fournisseur_FK`) REFERENCES `FOURNISSEUR` (`ID_Fournisseur`),
  ADD CONSTRAINT `FK_UTILISATEUR` FOREIGN KEY (`utilisateur_FK`) REFERENCES `UTILISATEUR` (`user_id`);

--
-- Constraints for table `PRODUIT`
--
ALTER TABLE `PRODUIT`
  ADD CONSTRAINT `FK_CATEGORIE` FOREIGN KEY (`categorie_FK`) REFERENCES `CATEGORIE` (`ID_Cat`),
  ADD CONSTRAINT `FK_FOURNISSEUR2` FOREIGN KEY (`fournisseur_FK2`) REFERENCES `FOURNISSEUR` (`ID_Fournisseur`),
  ADD CONSTRAINT `FK_UTILISATEUR2` FOREIGN KEY (`utilisateur_FK2`) REFERENCES `UTILISATEUR` (`user_id`);
