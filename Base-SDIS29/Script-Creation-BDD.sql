-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 14 sep. 2018 à 09:32
-- Version du serveur :  10.0.34-MariaDB
-- Version de PHP :  7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `SDIS29`
--

-- --------------------------------------------------------

--
-- Structure de la table `caserne`
--

CREATE TABLE `caserne` (
  `CIS_ID` int(11) NOT NULL,
  `CIS_NOM` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exercer`
--

CREATE TABLE `exercer` (
  `SP_MATRICULE` varchar(7) NOT NULL,
  `FCT_ID` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `FCT_ID` char(15) NOT NULL,
  `FCT_LIBELLE` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `FOR_ID` varchar(32) NOT NULL,
  `FCT_ID` char(15) DEFAULT NULL,
  `FOR_LIBELLE` varchar(32) NOT NULL,
  `FOR_DTE_DEBUT` date NOT NULL,
  `FOR_DTE_FIN` date NOT NULL,
  `FOR_CAPACITE` smallint(6) NOT NULL,
  `FOR_SALLE` varchar(32) DEFAULT NULL,
  `FOR_ADRESSE` varchar(120) NOT NULL,
  `FOR_CP` varchar(5) NOT NULL,
  `FOR_VILLE` varchar(60) NOT NULL,
  `FOR_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `GRA_ID` char(3) NOT NULL,
  `GRA_LIBELLE` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE `inscrire` (
  `SP_MATRICULE` varchar(7) NOT NULL,
  `FOR_ID` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `LOG_LOGIN` varchar(32) NOT NULL,
  `SP_MATRICULE` varchar(7) NOT NULL,
  `LOG_MDP` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LOG_NOM` varchar(60) NOT NULL,
  `LOG_PRENOM` varchar(60) NOT NULL,
  `LOG_PROFIL` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pompier`
--

CREATE TABLE `pompier` (
  `SP_MATRICULE` varchar(7) NOT NULL,
  `GRA_ID` char(3) NOT NULL,
  `SP_NOM` varchar(60) NOT NULL,
  `SP_PRENOM` varchar(60) NOT NULL,
  `SP_DTE_NAISSANCE` date NOT NULL,
  `SP_TEL_FIXE` varchar(10) DEFAULT NULL,
  `SP_TEL_PORTABLE` varchar(10) DEFAULT NULL,
  `SP_BIP` varchar(8) NOT NULL,
  `STATUT_ID` int(15) NOT NULL,
  `SP_DTE_MAJ` date NOT NULL,
  `DATE_PROMOTION` date NOT NULL,
  `DATE_AFFECTATION` date NOT NULL,
  `CIS_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `PROFIL_ID` int(11) NOT NULL,
  `PROFIL_LIBELLE` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `STATUT_ID` int(11) NOT NULL,
  `STATUT_LIBELLE` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `valide`
--

CREATE TABLE `valide` (
  `SP_MATRICULE` varchar(7) NOT NULL,
  `FOR_ID` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caserne`
--
ALTER TABLE `caserne`
  ADD PRIMARY KEY (`CIS_ID`);

--
-- Index pour la table `exercer`
--
ALTER TABLE `exercer`
  ADD PRIMARY KEY (`SP_MATRICULE`,`FCT_ID`),
  ADD KEY `FK_SP_MATRICULE` (`SP_MATRICULE`),
  ADD KEY `FK_exercer_FCT_ID` (`FCT_ID`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`FCT_ID`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`FOR_ID`),
  ADD KEY `FK_formation_FCT_ID` (`FCT_ID`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GRA_ID`),
  ADD KEY `GRAD_ID` (`GRA_ID`);

--
-- Index pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD PRIMARY KEY (`SP_MATRICULE`,`FOR_ID`),
  ADD KEY `FK_SP_MATRICULE` (`SP_MATRICULE`),
  ADD KEY `FK_inscrire_FOR_ID` (`FOR_ID`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LOG_LOGIN`),
  ADD KEY `FK_SP_MATRICULE` (`SP_MATRICULE`),
  ADD KEY `FK_LOG_PROFIL` (`LOG_PROFIL`);

--
-- Index pour la table `pompier`
--
ALTER TABLE `pompier`
  ADD PRIMARY KEY (`SP_MATRICULE`),
  ADD KEY `FK_CIS_ID` (`CIS_ID`),
  ADD KEY `FK_pompier_GRA_ID` (`GRA_ID`),
  ADD KEY `FK_STATUT_ID` (`STATUT_ID`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`PROFIL_ID`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`STATUT_ID`);

--
-- Index pour la table `valide`
--
ALTER TABLE `valide`
  ADD PRIMARY KEY (`SP_MATRICULE`,`FOR_ID`),
  ADD KEY `FK_SP_MATRICULE` (`SP_MATRICULE`),
  ADD KEY `FK_valide_FOR_ID` (`FOR_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caserne`
--
ALTER TABLE `caserne`
  MODIFY `CIS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `PROFIL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `STATUT_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
