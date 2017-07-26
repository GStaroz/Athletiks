-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 26 Juillet 2017 à 08:34
-- Version du serveur :  5.7.19-0ubuntu0.17.04.1
-- Version de PHP :  7.0.21-1~ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ECFatle`
--

-- --------------------------------------------------------

--
-- Structure de la table `athlete`
--

CREATE TABLE `athlete` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `birthdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `athlete`
--

INSERT INTO `athlete` (`id`, `firstname`, `lastname`, `birthdate`) VALUES
(1, 'Jean Claude', 'Duss', 1985),
(2, 'Bibi', 'Lafrite', 1965),
(3, 'Robert', 'Camembert', 1989),
(4, 'Christine', 'Boutin', 1992),
(5, 'Albert', 'Heinstein', 1995),
(6, 'Marguaret', 'Thatcher', 2003),
(7, 'Jules', 'Cesar', 1991),
(8, 'Momo', 'Ise', 1997),
(9, 'Sidharta', 'gautama', 1991),
(10, 'Adolf', 'Hitler', 2006),
(11, 'Oussama', 'Ben Laden', 2001),
(12, 'Jonnhy', 'Haliday', 1989),
(13, 'Justin', 'Bieber', 1982),
(14, 'Nicky', 'Minaj', 2006),
(15, 'Lionel', 'Duboeuf', 2004),
(16, 'Pika', 'Tchu', 1999),
(17, 'Bruce', 'waynes', 1973),
(18, 'James', 'Malezieux', 1978),
(19, 'nabila', 'jhons', 1863);

-- --------------------------------------------------------

--
-- Structure de la table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `meeting`
--

INSERT INTO `meeting` (`id`, `name`, `description`, `date`) VALUES
(1, 'Peta Ouchnok', '', '2017-07-18'),
(2, 'Troufaillon Les oies', '', '2017-07-28'),
(5, 'Quimper', 'Une course dans le centre ville, terrain moins plat mais vue a croquer !', '2017-07-22'),
(6, 'Benodet', 'Prevue sur la promenade le long de la plage, piquenique prévue a la suite !', '2017-08-09'),
(7, 'Bout-du-monde', 'la folie furieuse magl', '2017-09-18');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20170718074732'),
('20170718092140'),
('20170718092331'),
('20170718092716'),
('20170720064359'),
('20170720070557'),
('20170720094612'),
('20170720121542'),
('20170720125203');

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) DEFAULT NULL,
  `athlete_id` int(11) DEFAULT NULL,
  `time` float DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `result`
--

INSERT INTO `result` (`id`, `meeting_id`, `athlete_id`, `time`, `points`) VALUES
(1, 1, 1, 3.13, 319),
(2, 1, 2, 4.34, 311),
(3, 1, 3, 3.72, 269),
(4, 1, 4, 4.34, 230),
(5, 1, 5, 4.18, 261),
(6, 1, 6, 3.1, 435),
(7, 1, 8, 5.49, 199),
(8, 1, 9, 4.76, 210),
(9, 1, 7, 5.49, 182),
(10, 1, 10, 5.68, 264),
(11, 1, 11, 3.08, 393),
(12, 1, 12, 4.36, 229),
(13, 1, 13, 4.18, 239),
(14, 1, 14, 5.62, 267),
(15, 1, 15, 3.6, 394),
(16, 1, 16, 5.79, 204),
(17, 2, 1, 5.7, 175),
(18, 5, 1, 5.77, 173),
(24, 6, 1, NULL, NULL),
(25, 5, 17, 4.89, 204),
(26, 2, 18, 3.17, 315),
(27, 2, 19, 4.07, 332);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `athlete_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `athlete_id`) VALUES
(1, 'bob', 'bob', 'bob@bob.com', 'bob@bob.com', 1, NULL, '$2y$13$9ayzQ2wh3yrYvbjtCa/4d.Znta26rWCtvENTx0669jtwy2NbqOzTS', '2017-07-25 08:09:40', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 1),
(2, 'jhon', 'jhon', 'jhon@doe.com', 'jhon@doe.com', 1, NULL, '$2y$13$.X1tGvNL41ra6QAqUyHL7OalD66EJ6RwzIm2loFIkSTIJnk2f56fe', '2017-07-18 14:54:35', NULL, NULL, 'a:0:{}', 2),
(3, 'jane', 'jane', 'jane@random.com', 'jane@random.com', 1, NULL, '$2y$13$tDqATmAIeBIV7TO8IET7beA7EM7ZJx2lIRMRGZB8dpgp7/nyQ9X6K', '2017-07-18 15:10:38', NULL, NULL, 'a:0:{}', 3),
(4, 'jean-marc', 'jean-marc', 'jean-marc@bob.com', 'jean-marc@bob.com', 1, NULL, '$2y$13$bh8r.qtEqkKE3dss0/Bu2uANC9Dtq6ShLbceONe4eP3Z/7wEDRe.K', '2017-07-18 15:14:47', NULL, NULL, 'a:0:{}', 4),
(5, 'batman', 'batman', 'superriche@gotham.com', 'superriche@gotham.com', 1, NULL, '$2y$13$C4yunSqk8EFX/4crJShUCeVjGumALkFkPpnr4MW/lOr2Tk9OzJbXq', '2017-07-25 11:45:36', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 17),
(6, 'Wakidaisho', 'wakidaisho', 'random@zfae.fr', 'random@zfae.fr', 1, NULL, '$2y$13$3cAS1O74Jk03CRcsQPObvugC0O1sboiymAh679pgUYGPsxMxHx6Z2', '2017-07-24 15:06:50', NULL, NULL, 'a:0:{}', 18),
(7, 'nonmaisallo', 'nonmaisallo', 'stupid@net.debile', 'stupid@net.debile', 1, NULL, '$2y$13$s4YgbCAPBh4kBKYTQckeEOrECW77oG0F7Hu.MHnuEy6onf9akRIpi', '2017-07-24 15:17:46', NULL, NULL, 'a:0:{}', 19);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `athlete_id` (`athlete_id`),
  ADD KEY `meeting_id` (`meeting_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`),
  ADD KEY `IDX_8D93D649FE6BCB8B` (`athlete_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`athlete_id`) REFERENCES `athlete` (`id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649FE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athlete` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
