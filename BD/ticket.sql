-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2020 à 18:02
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(255) NOT NULL,
  `COM_CONTENU` varchar(255) NOT NULL,
  `tic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `tic_ID`) VALUES
(1, '2020-03-20 16:29:44', 'Samba', 'On peut commenter ce ticket ouvert ?', 2),
(2, '2020-03-20 16:30:00', 'Ichem', 'Oui, cest plutôt agréable !', 2),
(3, '2020-11-16 11:46:01', 'I. Bouzidi', 'Bonjour, nous avons pris en note votre plainte elle sera traitée d\'ici quelques semaines.\r\nBonne chance :)', 14562),
(4, '2020-11-16 11:46:21', 'G. Dumillier', 'J\'ai peur, Ichem est de plus en plus violent..', 14562);

-- --------------------------------------------------------

--
-- Structure de la table `t_etats`
--

CREATE TABLE `t_etats` (
  `idetat` int(11) NOT NULL,
  `nometat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_etats`
--

INSERT INTO `t_etats` (`idetat`, `nometat`) VALUES
(1, 'Ouvert'),
(2, 'En cours de traitement..'),
(3, 'Résolu');

-- --------------------------------------------------------

--
-- Structure de la table `t_ticket`
--

CREATE TABLE `t_ticket` (
  `TIC_ID` int(11) NOT NULL,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(255) NOT NULL,
  `TIC_CONTENU` varchar(255) NOT NULL,
  `TIC_AUTEUR` varchar(255) NOT NULL,
  `TIC_ETAT` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_ticket`
--

INSERT INTO `t_ticket` (`TIC_ID`, `TIC_DATE`, `TIC_TITRE`, `TIC_CONTENU`, `TIC_AUTEUR`, `TIC_ETAT`) VALUES
(1, '2020-11-13 10:06:13', 'Premier ticket', 'Bonjour monde ! Ceci est le premier ticket sur le site.', 'E. Cartman', 1),
(2, '2020-11-13 10:06:47', 'Second ticket ', 'd', 'K. McCormick', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`);

--
-- Index pour la table `t_etats`
--
ALTER TABLE `t_etats`
  ADD PRIMARY KEY (`idetat`),
  ADD KEY `id` (`idetat`);

--
-- Index pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD PRIMARY KEY (`TIC_ID`),
  ADD KEY `TIC_ETAT` (`TIC_ETAT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  MODIFY `TIC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14563;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD CONSTRAINT `t_ticket_ibfk_1` FOREIGN KEY (`TIC_ETAT`) REFERENCES `t_etats` (`idetat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
