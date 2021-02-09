-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 fév. 2021 à 10:23
-- Version du serveur :  5.7.11
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `assocsport`
--
CREATE DATABASE IF NOT EXISTS `assocsport` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `assocsport`;

-- --------------------------------------------------------

--
-- Structure de la table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `libelle_budget` varchar(255) NOT NULL,
  `montant_initial_budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `budget`
--

INSERT INTO `budget` (`id`, `libelle_budget`, `montant_initial_budget`) VALUES
(1, 'AS', 3000),
(2, 'EPS', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_document`
--

CREATE TABLE `categorie_document` (
  `id` int(11) NOT NULL,
  `libelle_categorie_doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_document`
--

INSERT INTO `categorie_document` (`id`, `libelle_categorie_doc`) VALUES
(1, 'Administration');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_eleve`
--

CREATE TABLE `categorie_eleve` (
  `id` int(11) NOT NULL,
  `libelle_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_eleve`
--

INSERT INTO `categorie_eleve` (`id`, `libelle_categorie`) VALUES
(1, 'Toutes'),
(2, 'Cadet'),
(3, 'Cadette'),
(4, 'Junior Garçon'),
(5, 'Junior Fille');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `libelle`) VALUES
(1, 'BTS S.I.O 1ère année'),
(2, 'BTS S.I.O 2ème année'),
(3, 'TERMINALE GENERALE 1'),
(4, 'TERMINALE GENERALE 2'),
(5, 'TERMINALE GENERALE 3'),
(6, 'TERMINALE GENERALE 4'),
(7, 'TERMINALE GENERALE 5'),
(8, 'TERMINALE GENERALE 6'),
(9, 'TER SC TECH SANTE SOCIAL'),
(10, 'TER SC TECH MAN GESTION'),
(11, '1ERE GENERALE 1'),
(12, '1ERE GENERALE 2'),
(13, '1ERE GENERALE 3'),
(14, '1ERE GENERALE 4'),
(15, '1ERE GENERALE 5'),
(16, '1ERE GENERALE 6'),
(17, '1ERE GENERALE 7'),
(18, '1ERE SCES TECH MANAG GEST'),
(19, '1-ST2S SC.&TECHNO.SANTE&S'),
(20, '2NDE GENERALE 1'),
(21, '2NDE GENERALE 2'),
(22, '2NDE GENERALE 3'),
(23, '2NDE GENERALE 4'),
(24, '2NDE GENERALE 5'),
(25, '2NDE GENERALE 6'),
(26, '2NDE GENERALE 7');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210125090952', '2021-01-25 09:10:40', 507),
('DoctrineMigrations\\Version20210125092546', '2021-01-25 09:26:00', 106),
('DoctrineMigrations\\Version20210125092849', '2021-01-25 09:28:57', 114),
('DoctrineMigrations\\Version20210203090853', '2021-02-03 09:17:22', 725),
('DoctrineMigrations\\Version20210203093911', '2021-02-03 09:39:22', 287),
('DoctrineMigrations\\Version20210204093044', '2021-02-04 09:31:13', 321);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `categorie_document_id` int(11) DEFAULT NULL,
  `nom_document` varchar(255) NOT NULL,
  `lien_document` varchar(255) NOT NULL,
  `description_document` longtext NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id`, `evenement_id`, `categorie_document_id`, `nom_document`, `lien_document`, `description_document`, `date_ajout`) VALUES
(2, 2, 1, 'Inscription au cross', 'inscription.pdf', 'Dossier permettant de s\'inscrire pour le cross nationale', '2020-10-11 12:45:00'),
(7, 2, 1, 'test 4', 'PPE-C-sujet-AS.pdf', 'test d\'ajout 2', '2021-02-01 11:00:58'),
(8, 2, 1, 'test2', 'CDC-piscine-2.pdf', 'test d\'ajout', '2021-02-01 11:09:41'),
(9, 2, 1, 'test2', 'Dossier-Fonctionnel.pdf', 'test d\'ajout 2', '2021-02-01 15:56:17');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `nom_eleve` varchar(255) NOT NULL,
  `prenom_eleve` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `genre_eleve` varchar(1) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_maj` datetime DEFAULT NULL,
  `archive_eleve` smallint(6) NOT NULL,
  `num_tel_eleve` int(11) NOT NULL,
  `num_tel_parent` int(11) NOT NULL,
  `photo_eleve` varchar(255) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `classe_id`, `categorie_id`, `nom_eleve`, `prenom_eleve`, `date_naissance`, `genre_eleve`, `date_creation`, `date_maj`, `archive_eleve`, `num_tel_eleve`, `num_tel_parent`, `photo_eleve`, `utilisateur_id`) VALUES
(1, 2, 4, 'Monteiro', 'Hugo', '2000-10-12', 'H', '2020-09-09 10:11:14', NULL, 0, 664892345, 375567302, 'profil1.jpg', 5),
(2, 20, 2, 'Savouret', 'Louis', '2003-06-22', 'H', '2020-09-09 10:08:30', '2021-01-05 10:15:18', 0, 345436784, 345797647, 'profil2.jpg', 6),
(3, 12, 3, 'Dupond', 'Maria', '2003-08-23', 'F', '2020-10-24 10:11:14', NULL, 0, 632945065, 357994934, 'profil3.jpg', 7),
(4, 9, 5, 'Dior', 'Anastasia', '2001-04-16', 'F', '2020-12-09 10:11:14', NULL, 0, 668034904, 345467859, 'profil4.jpg', 8),
(5, 21, 2, 'Georg', 'Stephen', '2003-04-16', 'H', '2020-11-19 10:11:14', NULL, 1, 643445643, 355467896, 'profil5.jpg', 9),
(6, 1, 5, 'Rosales', 'Emily', '2000-10-11', 'F', '2020-09-09 10:08:30', NULL, 1, 645678934, 358590350, 'profil6.jpg', 10),
(7, 3, 4, 'Jepson', 'Josh', '2001-08-16', 'H', '2020-12-09 10:11:14', NULL, 1, 648645685, 356764839, 'profil7.jpg', 11),
(9, 10, 5, 'Bellez', 'Donna', '2001-05-26', 'F', '2020-09-09 10:11:14', NULL, 1, 647958934, 326128643, 'profil9.jpg', 13),
(10, 11, 2, 'Morales', 'Miles', '2002-07-12', 'H', '2020-12-09 10:11:14', NULL, 0, 653882473, 395384132, 'profil10.jpg', 14);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `lieu_evenement` varchar(255) NOT NULL,
  `cout_evenement` int(11) NOT NULL,
  `descrip_evenement` longtext NOT NULL,
  `nb_place` int(11) NOT NULL,
  `image_evenement` varchar(255) DEFAULT NULL,
  `vignette_evenement` varchar(255) DEFAULT NULL,
  `categorie_eleve_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `type_id`, `sport_id`, `nom_evenement`, `date_debut`, `date_fin`, `lieu_evenement`, `cout_evenement`, `descrip_evenement`, `nb_place`, `image_evenement`, `vignette_evenement`, `categorie_eleve_id`) VALUES
(2, 1, 2, 'Cross national', '2020-10-13 12:45:00', '2020-11-09 12:00:00', 'Paris', 20, 'Cette course se déroulera pour une durée de 2h30 sur une distance de 15km.', 40, 'cross.jpg', 'cross.jpg', 1),
(8, 1, 2, 'Imagine for Margot', '2021-02-10 12:00:00', '2021-03-03 12:35:00', 'Saint Dominique', 20, 'course pour l\'association caricative', 50, 'pageCompta.jpg', 'pageCompta.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `id` int(11) NOT NULL,
  `fichier_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`id`, `fichier_nom`) VALUES
(3, 'Eleve2021.xlsx'),
(4, 'Eleve2021.xlsx'),
(5, 'Eleve2021.txt'),
(6, 'Eleve2021.xlsx'),
(7, 'Eleve2021.xlsx'),
(8, 'Eleve2021.xlsx'),
(9, 'Eleve2021.xlsx'),
(10, 'Eleve2021.xlsx'),
(11, 'Eleve2021.xlsx'),
(12, 'Eleve2021.xlsx'),
(13, 'Eleve2021.xlsx'),
(14, 'Eleve2021.xlsx'),
(15, 'Eleve2021.xlsx'),
(16, 'Eleve2021.xlsx'),
(17, 'Eleve2021.xlsx'),
(18, 'Eleve2021.xlsx'),
(19, 'Eleve2021.xlsx'),
(20, 'Eleve2021.xlsx'),
(21, 'Eleve2021.xlsx'),
(22, 'Eleve2021.xlsx'),
(23, 'Eleve2021.xlsx'),
(24, 'Eleve2021.xlsx'),
(25, 'Eleve2021.xlsx'),
(26, 'Eleve2021.xlsx'),
(27, 'Eleve2021.txt'),
(28, 'Eleve2021.xlsx'),
(29, 'Eleve2021.xlsx'),
(30, 'Eleve2021.txt');

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

CREATE TABLE `flux` (
  `id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `type_flux_id` int(11) DEFAULT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `montant_flux` int(11) NOT NULL,
  `date_flux` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `eleve_id`, `evenement_id`, `date_inscription`) VALUES
(1, 1, 2, '2020-10-21 14:36:52'),
(2, 4, 2, '2020-10-28 14:42:01');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `nom_sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `nom_sport`) VALUES
(1, 'Badminton'),
(2, 'Course à Pieds'),
(4, 'Tennis de table'),
(5, 'Tennis');

-- --------------------------------------------------------

--
-- Structure de la table `type_evenement`
--

CREATE TABLE `type_evenement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_evenement`
--

INSERT INTO `type_evenement` (`id`, `nom`) VALUES
(1, 'Cross 2020'),
(2, 'Compétition');

-- --------------------------------------------------------

--
-- Structure de la table `type_flux`
--

CREATE TABLE `type_flux` (
  `id` int(11) NOT NULL,
  `libelle_type_flux` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `nom_user`, `prenom_user`) VALUES
(1, 'fammar@nodevo.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$YkpuMEVtSjVhMTFJYWJrLg$jjDE0Ow7JRY4BBq63mJSfRT7Z+ZUpzFXIYeXe2wZscY', 0, 'Ammar', 'Fethi'),
(2, 'mikael.idasiak@lyceestvincent.fr', '[\"ROLE_ENSEIGNANT\"]', '$argon2id$v=19$m=65536,t=4,p=1$dXlKbE8wTGQzY0hvL3BaeQ$s7cSv8ozeJHGcfJ5vKU+/s3BZR5W7zhwup2y9IrSd8o', 0, 'Idasiak', 'Mikael'),
(3, 'stella.ribas@lyceestvincent.net', '[\"ROLE_COMPTABLE\"]', '$argon2id$v=19$m=65536,t=4,p=1$ak5yR3BHL1A0dzA0MVFOMg$UWpXndnNCgu9ER8gn/OFQk5eWj2+AbcRJHdnBJNDrU4', 0, 'Ribas', 'Stella'),
(4, 'virginie.hougron@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dG5YQkNuNFU3eUFuNjZOMA$V+gsmSzXTXKFfzvgDdZiCIsFmhR9uM8uRr9/ko7xEiw', 0, 'Hougron', 'Virginie'),
(5, 'eleve1.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 1', 'prenom 1'),
(6, 'eleve2.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 2', 'prenom 2'),
(7, 'eleve3.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 3', 'prenom 3'),
(8, 'eleve4.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 4', 'prenom 4'),
(9, 'eleve5.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 5', 'prenom 5'),
(10, 'eleve6.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 6', 'prenom 6'),
(11, 'eleve7.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 7', 'prenom 7'),
(12, 'eleve8.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 8', 'prenom 8'),
(13, 'eleve9.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 9', 'prenom 9'),
(14, 'eleve10.prenom@gmail.com', '[\"ROLE_ELEVE\"]', '$argon2id$v=19$m=65536,t=4,p=1$Y3J4aFVFV1c1WVBJTlFZUw$7e27L8H5A6UnzXKj5IlXvass3Mazuk2VFCCnrS0sAAE', 0, 'nom 10', 'prenom 10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_document`
--
ALTER TABLE `categorie_document`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_eleve`
--
ALTER TABLE `categorie_eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8698A76FD02F13` (`evenement_id`),
  ADD KEY `IDX_D8698A761CC15E3E` (`categorie_document_id`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_ECA105F7FB88E14F` (`utilisateur_id`),
  ADD KEY `IDX_ECA105F78F5EA509` (`classe_id`),
  ADD KEY `IDX_ECA105F7BCF5E72D` (`categorie_id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B26681EC54C8C93` (`type_id`),
  ADD KEY `IDX_B26681EAC78BCF8` (`sport_id`),
  ADD KEY `IDX_B26681E32EB86D8` (`categorie_eleve_id`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `flux`
--
ALTER TABLE `flux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7252313AA6CC7B2` (`eleve_id`),
  ADD KEY `IDX_7252313A24A4FD9B` (`type_flux_id`),
  ADD KEY `IDX_7252313AFD02F13` (`evenement_id`),
  ADD KEY `IDX_7252313A36ABA6B8` (`budget_id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E90F6D6A6CC7B2` (`eleve_id`),
  ADD KEY `IDX_5E90F6D6FD02F13` (`evenement_id`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_evenement`
--
ALTER TABLE `type_evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_flux`
--
ALTER TABLE `type_flux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie_document`
--
ALTER TABLE `categorie_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie_eleve`
--
ALTER TABLE `categorie_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `flux`
--
ALTER TABLE `flux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_evenement`
--
ALTER TABLE `type_evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_flux`
--
ALTER TABLE `type_flux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_D8698A761CC15E3E` FOREIGN KEY (`categorie_document_id`) REFERENCES `categorie_document` (`id`),
  ADD CONSTRAINT `FK_D8698A76FD02F13` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F78F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `FK_ECA105F7BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_eleve` (`id`),
  ADD CONSTRAINT `FK_ECA105F7FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_B26681E32EB86D8` FOREIGN KEY (`categorie_eleve_id`) REFERENCES `categorie_eleve` (`id`),
  ADD CONSTRAINT `FK_B26681EAC78BCF8` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `FK_B26681EC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_evenement` (`id`);

--
-- Contraintes pour la table `flux`
--
ALTER TABLE `flux`
  ADD CONSTRAINT `FK_7252313A24A4FD9B` FOREIGN KEY (`type_flux_id`) REFERENCES `type_flux` (`id`),
  ADD CONSTRAINT `FK_7252313A36ABA6B8` FOREIGN KEY (`budget_id`) REFERENCES `budget` (`id`),
  ADD CONSTRAINT `FK_7252313AA6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `FK_7252313AFD02F13` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D6A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `FK_5E90F6D6FD02F13` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
