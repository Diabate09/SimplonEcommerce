-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 fév. 2024 à 00:43
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
-- Base de données : `yallahou`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `commande_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 2, 46, 1, '2024-01-27 15:00:46', '2024-01-27 15:47:19'),
(5, 2, 46, 1, '2024-01-27 15:03:33', '2024-01-27 15:47:19'),
(7, 3, 46, 1, '2024-01-27 15:47:19', '2024-01-27 15:47:19'),
(8, 2, 47, 1, '2024-01-27 15:50:15', '2024-01-27 15:50:15');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `totalPrice` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `subtotal`, `totalPrice`, `created_at`, `updated_at`) VALUES
(36, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 50000.00, 50000.00, '2024-01-27 14:16:37', '2024-01-27 14:16:37'),
(37, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 50000.00, 50000.00, '2024-01-27 14:21:56', '2024-01-27 14:21:56'),
(38, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:20:18', '2024-01-27 15:20:18'),
(39, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:23:43', '2024-01-27 15:23:43'),
(40, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:26:04', '2024-01-27 15:26:04'),
(41, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:31:05', '2024-01-27 15:31:05'),
(42, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:34:54', '2024-01-27 15:34:54'),
(43, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:39:06', '2024-01-27 15:39:06'),
(44, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:40:04', '2024-01-27 15:40:04'),
(45, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:46:50', '2024-01-27 15:46:50'),
(46, 'DIABATE', 'Salimata', 'salimatadiabte764@gmail.com', '+2250758035428', 'Koumassi 05', 70000.00, 70000.00, '2024-01-27 15:47:18', '2024-01-27 15:47:18'),
(47, 'Fanny', 'Madoussou', 'salimatadiabte764@gmail.com', '0758035428', 'Koumassi 05', 50000.00, 50000.00, '2024-01-27 15:50:15', '2024-01-27 15:50:15');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_02_114238_create_contact_table', 1),
(6, '2024_01_02_114336_create_commandes_table', 1),
(7, '2024_01_02_115321_create_products_table', 1),
(8, '2024_01_02_115330_create_paniers_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Fauteuil isolé ', 'Fauteuil isolé sur le rendu 3D de fond blanc', 'https://media.istockphoto.com/id/869078270/fr/photo/fauteuil-isol%C3%A9-sur-le-rendu-3d-de-fond-blanc.jpg?s=612x612&w=0&k=20&c=DA2yrq0TYIkv_kWPGRE20mSSw59hN4vc1kLzhM84pTk=', 50000, 1, NULL, NULL),
(2, ' Fauteuil Wingback  ', 'Fauteuil Wingback Salon Confortable ', 'https://media.istockphoto.com/id/1321320075/fr/photo/rendu-3d-dun-fauteuil-wingback-salon-confortable-vert-p%C3%A2le-isol%C3%A9-du-milieu-du-si%C3%A8cle.jpg?s=612x612&w=0&k=20&c=YMXMLZFwtPtCg3CdzHrcCrvMJ8VFraQ_xXkdtoV62bY=', 50000, 1, NULL, NULL),
(3, 'Fauteuil Bozzolo', 'Écru - H91 x l110 x P102 cm - Bois massif / Tissu', 'https://storage.gra.cloud.ovh.net/v1/AUTH_fe24026bf6904347923685044c80f086/assets/cache/Product/picture_hover/main/f/c/2766.jpg', 70000, 1, NULL, NULL),
(4, 'Fauteuil Bozzolo', 'Pousse de Tilleul - H72 x l75 x P71 cm - Noyer / Velours', 'https://storage.gra.cloud.ovh.net/v1/AUTH_fe24026bf6904347923685044c80f086/assets/cache/Product/picture_hover/main/5/b/3440.jpg', 700000, 1, NULL, NULL),
(5, 'Fauteuil Martine', 'Beige - H80 x l65 x P66 cm - Flanelle', 'https://storage.gra.cloud.ovh.net/v1/AUTH_fe24026bf6904347923685044c80f086/assets/cache/Product/picture_hover/main/b/6/1056.jpg', 850000, 1, NULL, NULL),
(6, 'Fauteuil Margot\r\n', 'Bleu Sarah - H77x l64 x P65 cm - Velours', 'https://storage.gra.cloud.ovh.net/v1/AUTH_fe24026bf6904347923685044c80f086/assets/cache/Product/picture_hover/main/5/1/382.jpg', 90000, 1, NULL, NULL),
(7, 'Fauteuil Rétro ', 'Fauteuil Rétro en velours Brooks - Drawer', 'https://www.drawer.fr/72093-thickbox_default/fauteuil-retro-velours-brooks.jpg', 70000, 1, NULL, NULL),
(8, 'Fauteuil Rétro ', 'Fauteuil Rétro en tissu bouclette pieds bois foncé ecru - BROOKS', 'https://media.adeo.com/marketplace/MKP/84835415/d88eefde19e32367f404883d859b1691.jpeg?width=3000&height=3000&format=jpg&quality=80&fit=bounds', 50000, 1, NULL, NULL),
(9, 'Fauteuil Salon', 'Fauteuil Salon Chic Et Moderne De Style Esthétique De Luxe Dans Les Tons Bleus', 'https://img.freepik.com/photos-gratuite/salon-chic-moderne-style-esthetique-luxe-dans-tons-bleus_53876-125839.jpg?w=900&t=st=1704308842~exp=1704309442~hmac=bf55b2467a42306e4899d129c62fbe9eab3d29071affa89abf8e7572dfbf09b1', 900000, 0, NULL, NULL),
(10, 'Casa Padrino Fauteuil ', 'Casa Padrino fauteuil Chesterfield de luxe gris / or 90', 'data:image/jpeg;base64,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', 900000, 1, NULL, NULL),
(11, 'Casa Padrino Fauteuil Luxe', 'Casa Padrino fauteuil luxe gris / or - Fauteuil de salon moderne', 'https://cdn02.plentymarkets.com/vji7b8phcm0f/item/images/118921/full/Casa-Padrino-Luxus-Sessel-Grau---Schwarz---Gold-82-x-89-x-H--91-cm-Moderner-Wohnzimmer-Sessel-Wohnzimmer-Moebel-118921_6.JPG', 900000, 1, NULL, NULL),
(12, 'Casa Padrino Fauteuil Chesterfield ', 'Casa Padrino fauteuil Chesterfield de luxe bleu / or', 'https://cdn02.plentymarkets.com/vji7b8phcm0f/item/images/117530/full/Casa-Padrino-Luxus-Chesterfield-Sessel-Gruen---Gold-90-x-95-x-H--75-cm-Moderner-Wohnzimmer-Sessel-Chesterfield-Wohnzimmer-Moebel-117530_3.JPG', 900000, 0, NULL, NULL),
(13, 'Fauteuil Capitonné ', 'Fauteuil Capitonné  PIED COULEUR OU CHESTERFIELD', 'https://www.meublerdesign.com/19943-large_default/fauteuil-capitonne-pied-couleur-ou-chesterfield.jpg', 80000, 1, NULL, NULL),
(14, 'TTGIEET Chaise D\'appoint ', 'TTGIEET Chaise d\'appoint en velours avec ottoman, fauteuil capitonné moderne, confortable avec pieds en métal doré et accoudoirs réglables pour salon, ...\r\n', 'data:image/jpeg;base64,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', 100000, 1, NULL, NULL),
(15, 'Chaise D\'appoint Jaune ', 'Chaise d\'appoint jaune moderne avec fauteuil à', 'https://cocochairs.com/cdn/shop/products/cb1e516b4fc20f5714652b264f345b88_40391bd2-cd04-425a-865d-6f02f678d76a.jpg?v=1657372126', 70000, 1, NULL, NULL),
(16, 'Source Chaises Modernes ', 'Source Chaises modernes En Bois de Salon Canapé Chaise', 'https://sc04.alicdn.com/kf/HLB1wg4KbsrrK1RjSspaq6AREXXa3.jpg', 80000, 1, NULL, NULL),
(17, 'Fauteuil De Chambre ', 'Fauteuil De Chambre Couleur Vert', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsL0pXbgOnIgPhfsVxwrs53o67hjbMPmITNMFdp83UAMyWk_8lHCa-uYEO0AIl3VooEuI&usqp=CAU', 70000, 1, NULL, NULL),
(18, 'Fauteuil de salon ', 'Fauteuil de salon | Fauteuil moderne en velours ', 'https://shop.planete-deco.fr/cdn/shop/products/31OwCKiW_3S.jpg?v=1627105235', 50000, 1, NULL, NULL),
(19, 'Fauteuil De Salon Capitonné', 'Fauteuil de salon capitonné et capitonné en tissu ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCBQc2i4ggx0rqbyiG5tCMTQwJJyF7xFGckg&usqp=CAU', 60000, 1, NULL, NULL),
(20, 'Fauteuil Design Moderne', 'Fauteuil Design Moderne, Avec Capitonnè - Enea', 'https://www.viadurini.fr/data/prod/img/poltrona-di-design-moderno-con-lavorazione-capitonne-enea-18.jpg', 40000, 1, NULL, NULL),
(21, 'Fauteuil Capitonné Chesterfield ', 'Fauteuil capitonné chesterfield isadora | DIOTTI.COM', 'https://www.diotti.com/media/catalog/product/cache/1/image/163b81649b7ef7bc8a00b0066e59ae0a/r/s/rsn-poltrona-capitonne-chesterfield-isadora-03.jpg', 65000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'DIABATE Salimata', 'salimatadiabate764@gmail.com', NULL, '$2y$12$8SvRoZibJo0o9JX1J/lYFujRfFc/Hgz9YF.33tl1JgQ6iWit2CTgO', NULL, '2024-01-28 22:17:13', '2024-01-28 22:17:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_commande_id_foreign` (`commande_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
