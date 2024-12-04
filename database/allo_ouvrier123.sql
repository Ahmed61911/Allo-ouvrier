-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 déc. 2024 à 21:06
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allo_ouvrier123`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `cin`, `image`, `date_creation`) VALUES
(1, 'Amin', 'El youssefi', 'abc@123.com', 'abc123', '0678327964', 'sx6870', '/assets/uploads/profile/CL674e00bac01af.jpeg', '2024-05-29 16:46:10'),
(2, 'Amina', 'Moumni', 'abc1@123.com', 'abc123', '0612345678', 'az8451', '/assets/uploads/profile/CL674e013b97a65.jpeg', '2024-11-20 14:00:33'),
(3, 'Mohamed', 'Erramdani', 'abc2@123.com', 'abc123', '0623458476', '', '/assets/uploads/profile/CL674e01677fb13.jpeg', '2024-11-30 19:26:32');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_ouvrier` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_client`, `id_ouvrier`, `commentaire`, `date_creation`) VALUES
(1, 1, 15, 'Bon Travail', '2024-05-29 22:15:52'),
(3, 2, 15, 'travail bien fait', '2024-11-20 14:01:04'),
(4, 1, 10, 'mauvaise travail', '2024-11-20 16:41:24'),
(13, 1, 16, 'Bon qualité de service', '2024-12-02 19:00:23');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrier`
--

CREATE TABLE `ouvrier` (
  `id_ouvrier` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(15) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `addresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `gallerie` varchar(512) NOT NULL,
  `heure_debut` varchar(20) NOT NULL,
  `heure_arret` varchar(20) NOT NULL,
  `nbr_vote` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrier`
--

INSERT INTO `ouvrier` (`id_ouvrier`, `nom`, `prenom`, `email`, `mot_de_passe`, `sexe`, `date_de_naissance`, `addresse`, `ville`, `telephone`, `description`, `fonction`, `photo_profile`, `gallerie`, `heure_debut`, `heure_arret`, `nbr_vote`, `score`) VALUES
(10, 'Mohamed', 'youssef', 'xyz@123.com', 'xyz123', 'homme', '5423-06-09', 'Lotissement DOHA oujda N°214', 'aztyt', '0612457896', 'Avec l\'avènement de la technologie numérique et l\'accélération des innovations, notre société traverse une période de transformation profonde.', ',Plomberie,Electrecite,Peinture', '/assets/uploads/profile/OU674dfdebe9b1b.jpg', ',/assets/uploads/galleries/674dfe30d3f5c.webp,/assets/uploads/galleries/674dfe393e62b.webp,/assets/uploads/galleries/674dfe46481db.webp', '1733130000', '1733166000', 65, 43),
(15, 'John', 'Doe', 'xyz1@123.com', 'xyz123', 'homme', '1996-07-12', '18 Rue Paganini, 06000 Nice, France', 'Al Aaroui', '0666778899', 'Je suis John, un Electricien de 35 ans avec plus de dix ans d\'expérience dans le métier. J\'ai toujours été passionné par le bricolage et la réparation, ce qui m\'a naturellement conduit à la plomberie. Dans mon travail, je suis reconnu pour mon expertise e', ',Electrecite,Electromenager', '/assets/uploads/photo_abc.jpg', ',/assets/uploads/galleries/674dfecedb1c9.webp,/assets/uploads/galleries/674dfed70e7a8.webp,/assets/uploads/galleries/674dfede5008e.webp', '1733151600', '1733112000', 20, 100),
(16, 'Lamrini', 'youssef', 'xyz2@123.com', 'xyz123', 'homme', '1996-07-12', '18 Rue Annakhil, Oujda', 'Al Aaroui', '0666778899', 'Dans un monde en constante évolution, l\'importance de s\'adapter aux nouvelles technologies et aux tendances émergentes ne peut être sous-estimée. Que ce soit dans le domaine professionnel ou personnel, la capacité à comprendre et à intégrer les innovation', ',Plomberie,Peinture,Autre', '', ',/assets/uploads/galleries/674dffb22311e.webp,/assets/uploads/galleries/674dffbec8921.webp,/assets/uploads/galleries/674dffc7b66c6.webp,/assets/uploads/galleries/674dffcdaeb8e.webp', '1733122800', '1733158800', 1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `FK_client` (`id_client`),
  ADD KEY `FK_ouvrier` (`id_ouvrier`);

--
-- Index pour la table `ouvrier`
--
ALTER TABLE `ouvrier`
  ADD PRIMARY KEY (`id_ouvrier`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `ouvrier`
--
ALTER TABLE `ouvrier`
  MODIFY `id_ouvrier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `FK_ouvrier` FOREIGN KEY (`id_ouvrier`) REFERENCES `ouvrier` (`id_ouvrier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
