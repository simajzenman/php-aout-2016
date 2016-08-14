-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 13 Août 2016 à 23:33
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `sheraton`
--
CREATE DATABASE IF NOT EXISTS `sheraton` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sheraton`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` mediumint(9) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `ip` varchar(1024) NOT NULL,
  `com` varchar(2048) NOT NULL,
  `jour` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `prenom`, `email`, `ip`, `com`, `jour`) VALUES
(1, 'Clavier', 'Christian', '', '::1', 'Cet hotel était extra', '10 Août 2016'),
(2, 'Bond', 'James', 'test@gmail.com', '::1', 'Le monde ne suffit pas', '08 novembre 1999'),
(7, 'Pharrell', 'Williams', '', '::1', 'I''m so happy here!', '12 Août 2016'),
(8, 'Harry', 'Potter', 'harry.potter@toto.com', '::1', 'Mon séjour était magique!', '13 Août 2016'),
(9, 'Pierre', 'Paul', '', '::1', 'Bien joué', '13 Août 2016'),
(11, 'Loic', 'Politos', '', '::1', 'La bouffe était délicieuse wesh!', '13 Août 2016'),
(12, 'Karim', 'Benzema', '', '::1', 'Super hotel, mais je n''ai pas pu prendre ma caméra', '13 Août 2016'),
(13, 'Admin', 'Legrand', '', '::1', 'J''ai fais une bonne affaire', '13 Août 2016'),
(14, 'Daft', 'Punk', 'daft@punk.com', '::1', 'Work it! Make it! Do it! Makes us!\r\n\r\nHarder! Better! Faster! Stronger!', '13 Août 2016');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `role` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'toxyS8DP0rCYQ', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;