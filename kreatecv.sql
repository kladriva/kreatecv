-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 août 2025 à 02:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kreatecv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) UNSIGNED NOT NULL,
  `cv_submission_id` int(11) UNSIGNED NOT NULL,
  `nom_competence` varchar(255) NOT NULL,
  `niveau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `cv_submission_id`, `nom_competence`, `niveau`) VALUES
(1, 3, 'programmation', 'Avancé'),
(2, 3, 'courtier', 'Débutant');

-- --------------------------------------------------------

--
-- Structure de la table `cv_submissions`
--

CREATE TABLE `cv_submissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_whatsapp` varchar(50) DEFAULT NULL,
  `profile_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cv_submissions`
--

INSERT INTO `cv_submissions` (`id`, `nom_utilisateur`, `email`, `contact_whatsapp`, `profile_description`, `created_at`) VALUES
(1, 'freddy', 'freddy2@gmail.com', '655552555', NULL, '2025-08-07 22:19:33'),
(2, 'freddy', 'freddy@gmail.com', '655255565', NULL, '2025-08-07 22:49:11'),
(3, 'freddy', 'alexis@gmail.com', '653158667', 'Décrivez en 2-3 phrases qui vous êtes et votre objectif professionnel.', '2025-08-08 00:39:15');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) UNSIGNED NOT NULL,
  `cv_submission_id` int(11) UNSIGNED NOT NULL,
  `titre_poste` varchar(255) NOT NULL,
  `entreprise` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `cv_submission_id`, `titre_poste`, `entreprise`, `description`, `date_debut`, `date_fin`) VALUES
(1, 2, 'dev', 'kladriva', 'rien comme tache', NULL, NULL),
(2, 3, 'dev', 'kladriva', 'rien de nouveau', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) UNSIGNED NOT NULL,
  `cv_submission_id` int(11) UNSIGNED NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `etablissement` varchar(255) DEFAULT NULL,
  `annee_obtention` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `cv_submission_id`, `diplome`, `etablissement`, `annee_obtention`) VALUES
(1, 2, 'bts', 'isetag', '2025'),
(2, 3, 'brevet', 'isetag', '2025');

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) UNSIGNED NOT NULL,
  `cv_submission_id` int(11) UNSIGNED NOT NULL,
  `nom_hobby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hobbies`
--

INSERT INTO `hobbies` (`id`, `cv_submission_id`, `nom_hobby`) VALUES
(1, 3, 'lecture');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` int(11) UNSIGNED NOT NULL,
  `cv_submission_id` int(11) UNSIGNED NOT NULL,
  `nom_langue` varchar(100) NOT NULL,
  `niveau` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `cv_submission_id`, `nom_langue`, `niveau`) VALUES
(1, 3, 'français', 'Intermédiaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_submission_id` (`cv_submission_id`);

--
-- Index pour la table `cv_submissions`
--
ALTER TABLE `cv_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_submission_id` (`cv_submission_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_submission_id` (`cv_submission_id`);

--
-- Index pour la table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_submission_id` (`cv_submission_id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_submission_id` (`cv_submission_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cv_submissions`
--
ALTER TABLE `cv_submissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`cv_submission_id`) REFERENCES `cv_submissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`cv_submission_id`) REFERENCES `cv_submissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`cv_submission_id`) REFERENCES `cv_submissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `hobbies_ibfk_1` FOREIGN KEY (`cv_submission_id`) REFERENCES `cv_submissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `langues`
--
ALTER TABLE `langues`
  ADD CONSTRAINT `langues_ibfk_1` FOREIGN KEY (`cv_submission_id`) REFERENCES `cv_submissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
