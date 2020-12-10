-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 10 déc. 2020 à 09:03
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sf_batcine`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `critical_opinion`
--

CREATE TABLE `critical_opinion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` double DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201202111406', '2020-12-02 12:18:31', 66),
('DoctrineMigrations\\Version20201202123933', '2020-12-02 13:42:13', 52),
('DoctrineMigrations\\Version20201202124747', '2020-12-02 13:47:53', 37),
('DoctrineMigrations\\Version20201202125801', '2020-12-02 13:58:33', 160),
('DoctrineMigrations\\Version20201202131517', '2020-12-02 14:16:18', 86),
('DoctrineMigrations\\Version20201202133014', '2020-12-02 14:30:40', 122),
('DoctrineMigrations\\Version20201202133807', '2020-12-02 14:39:18', 184),
('DoctrineMigrations\\Version20201202134425', '2020-12-02 14:44:32', 90),
('DoctrineMigrations\\Version20201202134748', '2020-12-02 14:48:16', 49),
('DoctrineMigrations\\Version20201202135035', '2020-12-02 14:50:57', 198),
('DoctrineMigrations\\Version20201202140926', '2020-12-02 15:09:51', 45),
('DoctrineMigrations\\Version20201202141822', '2020-12-02 15:19:47', 130),
('DoctrineMigrations\\Version20201202142750', '2020-12-02 15:28:38', 65),
('DoctrineMigrations\\Version20201202143318', '2020-12-02 15:33:40', 150),
('DoctrineMigrations\\Version20201202143942', '2020-12-02 15:39:54', 57),
('DoctrineMigrations\\Version20201202150716', '2020-12-02 16:08:20', 217),
('DoctrineMigrations\\Version20201202151049', '2020-12-02 16:11:06', 65),
('DoctrineMigrations\\Version20201202151254', '2020-12-02 16:13:10', 155),
('DoctrineMigrations\\Version20201203153515', '2020-12-03 16:36:14', 859);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_genre`
--

CREATE TABLE `media_genre` (
  `media_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_staff`
--

CREATE TABLE `media_staff` (
  `media_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_user`
--

CREATE TABLE `media_user` (
  `media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `publication_date` datetime DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `creation_date`, `publication_date`, `is_published`) VALUES
(3, 'New 1', 'Claude Lelouch réunit une vaste distribution pour son dernier film. Il s\'est confié sur le tournage de son prochain et dernier long métrage, \"L\'Amour, c\'est mieux que la vie\". Il y réunira un casting hétéroclite, parmi lesquels Jean-Louis Trintignant, Kev Adams et Béatrice Dalle.', 'Claude-Lelouch-5fcf65c276e3b.jpeg', '2020-12-25 00:00:00', '2020-12-22 00:00:00', 1),
(4, 'New 2', 'Bande-annonce Les Cobayes : Thomas Ngijol et Judith Chemla prêts à tout pour sauver leur couple.\r\nDécouvrez la bande-annonce des Cobayes, une comédie sur le désir et la passion dans le couple, portée par Thomas Ngijol et Judith Chemla. Au cinéma le 25 novembre.', 'Les-Cobayes-5fd0ab55a0338.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(5, 'New 3', 'Claude Lelouch réunit une vaste distribution pour son dernier film. Il s\'est confié sur le tournage de son prochain et dernier long métrage, \"L\'Amour, c\'est mieux que la vie\". Il y réunira un casting hétéroclite, parmi lesquels Jean-Louis Trintignant, Kev Adams et Béatrice Dalle.', 'Claude-Lelouch-5fd0b4d5131ef.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(6, 'New 4', 'Bande-annonce Les Cobayes : Thomas Ngijol et Judith Chemla prêts à tout pour sauver leur couple.\r\nDécouvrez la bande-annonce des Cobayes, une comédie sur le désir et la passion dans le couple, portée par Thomas Ngijol et Judith Chemla. Au cinéma le 25 novembre.', 'Les-Cobayes-5fd0c23bdbf76.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(7, 'New 5', 'Claude Lelouch réunit une vaste distribution pour son dernier film. Il s\'est confié sur le tournage de son prochain et dernier long métrage, \"L\'Amour, c\'est mieux que la vie\". Il y réunira un casting hétéroclite, parmi lesquels Jean-Louis Trintignant, Kev Adams et Béatrice Dalle.', 'Claude-Lelouch-5fd0fa6557ee4.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(8, 'New 6', 'Bande-annonce Les Cobayes : Thomas Ngijol et Judith Chemla prêts à tout pour sauver leur couple.\r\nDécouvrez la bande-annonce des Cobayes, une comédie sur le désir et la passion dans le couple, portée par Thomas Ngijol et Judith Chemla. Au cinéma le 25 novembre.', 'Les-Cobayes-5fd0fa83ccda3.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(9, 'New 7', 'Claude Lelouch réunit une vaste distribution pour son dernier film. Il s\'est confié sur le tournage de son prochain et dernier long métrage, \"L\'Amour, c\'est mieux que la vie\". Il y réunira un casting hétéroclite, parmi lesquels Jean-Louis Trintignant, Kev Adams et Béatrice Dalle.', 'Claude-Lelouch-5fd0fad4afbdf.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(10, 'New 8', 'Bande-annonce Les Cobayes : Thomas Ngijol et Judith Chemla prêts à tout pour sauver leur couple.\r\nDécouvrez la bande-annonce des Cobayes, une comédie sur le désir et la passion dans le couple, portée par Thomas Ngijol et Judith Chemla. Au cinéma le 25 novembre.', 'Les-Cobayes-5fd0fb3a3d899.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(11, 'New 9', 'Claude Lelouch réunit une vaste distribution pour son dernier film. Il s\'est confié sur le tournage de son prochain et dernier long métrage, \"L\'Amour, c\'est mieux que la vie\". Il y réunira un casting hétéroclite, parmi lesquels Jean-Louis Trintignant, Kev Adams et Béatrice Dalle.', 'Claude-Lelouch-5fd0fb543239c.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1),
(12, 'New 10', 'Bande-annonce Les Cobayes : Thomas Ngijol et Judith Chemla prêts à tout pour sauver leur couple.\r\nDécouvrez la bande-annonce des Cobayes, une comédie sur le désir et la passion dans le couple, portée par Thomas Ngijol et Judith Chemla. Au cinéma le 25 novembre.', 'Les-Cobayes-5fd0fb68b8348.jpeg', '2020-12-09 00:00:00', '2020-12-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `staff_type`
--

CREATE TABLE `staff_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `critical_opinion`
--
ALTER TABLE `critical_opinion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_48F94A0BA76ED395` (`user_id`),
  ADD KEY `IDX_48F94A0BEA9FDD75` (`media_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6A2CA10C12469DE2` (`category_id`);

--
-- Index pour la table `media_genre`
--
ALTER TABLE `media_genre`
  ADD PRIMARY KEY (`media_id`,`genre_id`),
  ADD KEY `IDX_9C49F749EA9FDD75` (`media_id`),
  ADD KEY `IDX_9C49F7494296D31F` (`genre_id`);

--
-- Index pour la table `media_staff`
--
ALTER TABLE `media_staff`
  ADD PRIMARY KEY (`media_id`,`staff_id`),
  ADD KEY `IDX_5D773723EA9FDD75` (`media_id`),
  ADD KEY `IDX_5D773723D4D57CD` (`staff_id`);

--
-- Index pour la table `media_user`
--
ALTER TABLE `media_user`
  ADD PRIMARY KEY (`media_id`,`user_id`),
  ADD KEY `IDX_4ED4099AEA9FDD75` (`media_id`),
  ADD KEY `IDX_4ED4099AA76ED395` (`user_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_426EF39299FA9B25` (`staff_type_id`);

--
-- Index pour la table `staff_type`
--
ALTER TABLE `staff_type`
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
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `critical_opinion`
--
ALTER TABLE `critical_opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `critical_opinion`
--
ALTER TABLE `critical_opinion`
  ADD CONSTRAINT `FK_48F94A0BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_48F94A0BEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `media_genre`
--
ALTER TABLE `media_genre`
  ADD CONSTRAINT `FK_9C49F7494296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9C49F749EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `media_staff`
--
ALTER TABLE `media_staff`
  ADD CONSTRAINT `FK_5D773723D4D57CD` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5D773723EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `media_user`
--
ALTER TABLE `media_user`
  ADD CONSTRAINT `FK_4ED4099AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4ED4099AEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_426EF39299FA9B25` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
