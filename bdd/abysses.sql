-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 juin 2022 à 10:37
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abysses`
--

-- --------------------------------------------------------

--
-- Structure de la table `aquariums`
--

CREATE TABLE `aquariums` (
  `id` int(100) NOT NULL,
  `nbac` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `conductivite` float NOT NULL,
  `ph` float NOT NULL,
  `volume` float NOT NULL,
  `biotopEspeces` varchar(255) NOT NULL,
  `typeNourriture` varchar(255) NOT NULL,
  `typeEau` varchar(100) NOT NULL,
  `prixVente` varchar(10) NOT NULL,
  `chronoEau` datetime NOT NULL DEFAULT current_timestamp(),
  `chronoFiltre` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aquariums`
--

INSERT INTO `aquariums` (`id`, `nbac`, `image`, `conductivite`, `ph`, `volume`, `biotopEspeces`, `typeNourriture`, `typeEau`, `prixVente`, `chronoEau`, `chronoFiltre`) VALUES
(1, 2, 'platy.jpg', 50, 7.3, 250, 'blablablabla', 'burger', 'trtrtrrt', '20.00€', '2022-06-30 10:00:00', '2022-06-08 22:14:10'),
(12, 15, 'tetra.jpg', 66, 6, 666, 'bla bla', 'sticks', 'douce', '6.00€', '2022-06-15 12:20:40', '2022-06-29 14:26:34'),
(22, 4, 'crevette_red_cherry.jpg', 25, 7.8, 250, 'crevette', 'paillettes', 'douce', '0.00€', '2022-06-06 13:40:50', '2022-06-28 14:26:34'),
(26, 7, 'platy (2).jpg', 52, 7.6, 50, 'platy', 'flocons, paillettes sticks', 'Douce', '12.00€', '2022-06-17 22:13:32', '2022-07-01 14:26:34'),
(27, 8, 'corydoras (4).jpg', 55, 7, 250, 'Corydoras', 'esacargots', 'Eau douce', '2.00€', '2022-05-22 16:20:52', '2022-07-10 14:26:34'),
(28, 20, 'cichlidé_joyau.jpg', 50, 7, 300, 'scalaire', 'paillettes', 'douce', '2.50€', '2022-05-24 18:15:44', '2022-06-15 14:26:34'),
(29, 3, 'guppy_endler_femelle.jpg', 50, 7.5, 200, 'pppppp', 'sticks', 'douce', '0.00€', '2022-05-23 09:33:55', '2022-07-02 14:26:34'),
(30, 52, 'corydoras.jpg', 40, 9, 100, 'Corydoras', 'pailletes', 'Douce', '0.00€', '2022-05-21 17:17:26', '2022-07-17 14:45:46'),
(39, 41, 'loricaria.jpg', 350, 7.5, 250, 'Loricaria', 'paillettes', 'Douce', '20.00€', '2022-06-17 14:18:07', '2022-07-08 14:26:34'),
(40, 1, 'axelotl.jpg', 300, 7.5, 250, 'axelhot', 'paillettes', 'Douce', '0.00€', '2022-06-17 14:15:38', '2022-07-17 16:39:59'),
(41, 26, 'scalaire.jpg', 100, 5.3, 250, 'scalaire', 'paillettes', 'Douce', '0.00€', '2022-06-01 20:58:54', '2022-07-02 14:26:34'),
(42, 46, 'corydoras (4).jpg', 230, 703, 180, 'Corydoras', 'sticks', 'Douce', '23.00€', '2022-06-01 21:00:50', '2022-06-02 14:26:34'),
(43, 5, 'cichlidé_joyau.jpg', 250, 7.55, 300, 'poissons d\'eau douce', 'paillettes et sticks', 'Douce', '0.00€', '2022-06-09 09:23:10', '2022-06-09 09:23:10'),
(44, 6, 'crevette_red_cherry.jpg', 150, 8, 450, 'Crevette d\'eau douce', 'Flocons et paillettes', 'Douce', '2.00€', '2022-06-24 09:28:19', '2022-07-24 09:28:34'),
(45, 9, 'scalaire.jpg', 200, 7.2, 225, 'scalaire', 'paillettes', 'Douce', '0.00€', '2022-06-09 10:59:05', '2022-06-09 10:59:05'),
(46, 10, 'axelotl.jpg', 300, 7.2, 300, 'Axelhot', 'Flocons', 'Douce', '2.00€', '2022-06-09 11:55:13', '2022-06-09 11:55:13');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `objet`, `nom`, `mail`, `telephone`, `date`, `message`, `image`) VALUES
(59, 'marcel', 'marcel', 'marcel@gmail.com', '11 11 11 11 11', '2022-04-22 17:50:43', 'tyuiopjhg jhgdfsd uytreea kjghfgfs ', ''),
(62, 'bidule', 'bidule', 'bidule@gmail.com', '33 33 33 33 33 ', '2022-04-22 17:59:04', 'mlkjhg iuyt jhgfd nbvcx:;, &quot;\'(- 741 mlkjhgfds poiuytr sdfgh kjhgfds lkjhgfd oiuytre <br />\r\njhgfds kjhgfd ertyuio lkjhgfds', '1griezmann.jpg'),
(63, 'trop grand', 'julien', 'julien@gmail.com', '88 88 88 88 88 ', '2022-04-22 18:02:15', 'mlkjhgf oiuytre kjhgfd nbvc', ''),
(78, 'salut', 'oihid', 'oihid@gmail.com', '069528', '2022-04-27 14:06:29', 'dfghj dyu dsfghj dfghj', 'guppy_endler_femelle.jpg'),
(79, 'test', 'yann', 'yann@gmail.com', '0605040203', '2022-04-27 14:16:33', 'fuHUIRHGR THJTISJTHJSOIT', ''),
(90, 'démo pour lesly', 'ahmad', 'pro.kalthoum@gmail.com', '01020300405', '2022-05-24 14:41:55', 'bonjour lesly', 'guppy_endler_femelle.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` varchar(12) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `date_de_naissance`, `mail`, `telephone`, `password`, `role`, `image`) VALUES
(33, 'Ahmad', '', '', 'ahmad@gmail.com', '', '62feb2cc80217f43532d9cdcb44b4e031b918e9b75a7e9a70db7a3488b193f32', 'adherent', '../image/21mandanda.jpg'),
(34, 'yann', '', '', 'yann@gmail.com', '', '3f03cc7104daabdeac65e0cde329a74ae9e6870b4210fa745004e560bfe59899', 'adherent', '../image/13varane.webp'),
(38, 'AAAAAAA', 'BABABABAB', '09/11/2001', 'fddfd@gmail.com', '0303030303', '476bfe2c9daff0f2d6186272bb9fcad5eeab3b052664f29599fe5c54e37ae01a', 'adherent', '../image/platy (2).jpg'),
(42, 'rtrtrt', 'azazzzza', '01/02/2000', 'fdfdffd@gmail.com', '0102030405', 'b2fc3f8b493723e0b49e2ca4009da7ea685f9655b21a9c422e0b004382bee9d5', 'adherent', ''),
(43, 'minus', 'major', '01/01/2011', 'minus@gmail.com', '01 02 03 04 05', '6cc02e3fa57f30a76f38caf8fc9971363619105b20f28e737061e41d7c8fb7b3', 'adherent', ''),
(45, 'bureau2', 'testBureau', '', 'bureau2@gmail.com', '', '738cea25be811f6cd6bbe377648c5979d1ed893ec832dcf553fce193ba4b594a', 'bureau', ''),
(47, 'adherent', '', '', 'adherent@gmail.com', '', 'a706a4cba350df2067dd2e5668a4df2bbccbfce1494b04d2fd15cc39da8c3d38', 'adherent', ''),
(48, 'adherent2', 'adherent2', '', 'adherent2@gmail.com', '', '38030092855a8eb90f576022f7426c6b4ae92e285bb8da1647555d85e8c53cf9', 'adherent', ''),
(50, 'mohamed', 'mohamed', '01/01/2000', 'mohamed@gmail.com', '01 02 03 04 05', 'f775fc3e3aac094fe7e2d06277b2b21e04cefbeb6601172a5151f3768bb15517', 'adherent', ''),
(53, 'Popol', 'Michel', '01/01/2003', 'popol@gmail.com', '01 02 03 04 05', '1c5eb4cea8b7ca8614a96ddf460b8fa10ba213f30bd1a6d7cd6c5f4514d6c270', 'adherent', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aquariums`
--
ALTER TABLE `aquariums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aquariums`
--
ALTER TABLE `aquariums`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
