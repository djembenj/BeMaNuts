-- Nuts by BeMa SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- ----------------------------------------------------------
-- Base de données :  `digitaleco`
-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` int(10) NOT NULL,
  `id_equipement_constructeur` int(10) NOT NULL,
  `nom_equipement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_equipement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_equipement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref2_equipement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type_equipement` int(10) NOT NULL,
  `information_equipement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `equipement_constructeur`
--

CREATE TABLE `equipement_constructeur` (
  `id_equipement_constructeur` int(10) NOT NULL,
  `nom_equipement_constructeur` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `equipement_constructeur`
--

INSERT INTO `equipement_constructeur` (`id_equipement_constructeur`, `nom_equipement_constructeur`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Lenovo'),
(4, 'Blaupunkt'),
(5, 'Freebox'),
(6, 'Xerox'),
(7, 'Canon'),
(8, 'Atos'),
(9, 'CapGemini'),
(10, 'Hitachi'),
(11, 'Google'),
(12, 'Samsung'),
(13, 'NVIDIA'),
(14, 'SAP'),
(15, 'HP'),
(16, 'iiyama');

-- --------------------------------------------------------

--
-- Structure de la table `equipement_informations`
--

CREATE TABLE `equipement_informations` (
  `id_equipement_informations` int(10) NOT NULL,
  `screen_size_equipement_informations` int(3) DEFAULT 0 COMMENT 'La taille de l''écran',
  `weight_equipement_informations` decimal(11,3) DEFAULT NULL COMMENT 'la poids du l''équipement',
  `tec_equipement_informations` decimal(10,2) DEFAULT NULL COMMENT 'Energy Demand kWh',
  `capacity_stockage_equipement_informations` int(10) NOT NULL DEFAULT 0 COMMENT 'Pour les baie de stockage en To',
  `assembly_location` int(10) DEFAULT NULL COMMENT 'Lié à la table use_location',
  `date_equipement_informations` date DEFAULT NULL,
  `id_equipement` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Structure de la table `gaz_emission_equipement`
--

CREATE TABLE `gaz_emission_equipement` (
  `id_gaz_emission_equipement` int(10) NOT NULL,
  `recycling_gaz_emission_equipement` decimal(3,1) NOT NULL COMMENT 'en %',
  `transport_gaz_emission_equipement` decimal(3,1) NOT NULL COMMENT 'en %',
  `custumer_user_gaz_emission_equipement` decimal(3,1) NOT NULL COMMENT 'en %',
  `production_gaz_emission_equipement` decimal(3,1) NOT NULL COMMENT 'en %',
  `kg_co2_eq_gaz_emission_equipement` int(10) NOT NULL COMMENT 'Total greenhouse gas emissions',
  `variation_kg_co2_gaz_emission_equipement` int(11) DEFAULT NULL,
  `kg2_co2_eq_gaz_emission_equipement` int(10) DEFAULT NULL,
  `variation2_kg_co2_gaz_emission_equipement` int(11) DEFAULT NULL,
  `use_period_equipement` int(2) NOT NULL,
  `date_emission_equipement` date NOT NULL,
  `id_equipement` int(10) NOT NULL,
  `id_use_location` int(11) DEFAULT 1,
  `source_gaz_emission_equipement` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_notifications` int(10) NOT NULL,
  `id_notifications_type` int(10) NOT NULL,
  `date_notification` datetime NOT NULL,
  `description_notification` text COLLATE utf8_unicode_ci NOT NULL,
  `id_table` int(11) DEFAULT NULL COMMENT 'qui est impacté dans la TABLE',
  `la_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'LA TABLE qui est concernée',
  `create_id_user` int(10) NOT NULL,
  `ip_notifications` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Structure de la table `notifications_type`
--

CREATE TABLE `notifications_type` (
  `id_notifications_type` int(10) NOT NULL,
  `description_notifications_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifications_type`
--

INSERT INTO `notifications_type` (`id_notifications_type`, `description_notifications_type`) VALUES
(1, 'ADD_SMARTPHONE'),
(2, 'ADD SMARTPHONE EMISSION'),
(3, 'ADD_LAPTOP'),
(4, 'ADD_DESKTOP'),
(5, 'ADD_BOX'),
(6, 'ADD_SERVER'),
(7, 'ADD_AUDIO'),
(8, 'ADD_DISPLAY'),
(9, 'ADD_PRINTER'),
(10, 'ADD_TABLETTE'),
(11, 'ADD_SMART_DEVICE'),
(12, 'ADD LAPTOP EMISSION'),
(13, 'ADD DESKTOP EMISSION'),
(14, 'ADD BOX EMISSION'),
(15, 'ADD SERVER EMISSION'),
(16, 'ADD AUDIO EMISSION'),
(17, 'ADD DISPLAY EMISSION'),
(18, 'ADD PRINTER EMISSION'),
(19, 'ADD TABLETTE EMISSION'),
(20, 'ADD SMARTDEVICE EMISSION'),
(21, 'ADD LAPTOP INFORMATION'),
(22, 'ADD DESKTOP INFORMATION'),
(23, 'ADD BOX INFORMATION'),
(24, 'ADD SERVER INFORMATION'),
(25, 'ADD AUDIO INFORMATION'),
(26, 'ADD SMARTPHONE INFORMATION'),
(27, 'ADD DISPLAY INFORMATION'),
(28, 'ADD PRINTER INFORMATION'),
(29, 'ADD TABLETTE INFORMATION'),
(30, 'ADD SMARTDEVICE INFORMATION'),
(31, 'ADD BAIE STOCKAGE'),
(32, 'ADD BAIE STOCKAGE EMISSION'),
(33, 'ADD BAIE STOCKAGE INFORMATION'),
(34, 'ADD NETWORK'),
(35, 'ADD NETWORK EMISSION'),
(36, 'ADD NETWORK INFORMATION');

-- --------------------------------------------------------


--
-- Structure de la table `type_equipement`
--

CREATE TABLE `type_equipement` (
  `id_type_equipement` int(10) NOT NULL,
  `nom_type_equipement` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_equipement`
--

INSERT INTO `type_equipement` (`id_type_equipement`, `nom_type_equipement`) VALUES
(1, 'Laptop'),
(2, 'Desktop'),
(3, 'Box Internet'),
(4, 'Serveur'),
(5, 'Enceinte Intégrée'),
(6, 'Smartphone'),
(7, 'Display'),
(8, 'Printer'),
(9, 'Tablette'),
(10, 'Smart device'),
(11, 'Baie de Stockage'),
(12, 'Network');

-- --------------------------------------------------------

--
-- Structure de la table `use_location`
--

CREATE TABLE `use_location` (
  `id_use_location` int(11) NOT NULL,
  `nom_use_location` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nom_complet_use_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `use_location`
--

INSERT INTO `use_location` (`id_use_location`, `nom_use_location`, `nom_complet_use_location`) VALUES
(1, '??', ''),
(2, 'US', 'United States'),
(3, 'EU', 'Europe'),
(4, 'WW', 'World Wide'),
(5, 'CN', 'China'),
(6, 'JP', 'Japon');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`),
  ADD UNIQUE KEY `nom_equipement` (`nom_equipement`,`model_equipement`,`ref_equipement`,`ref2_equipement`),
  ADD KEY `Type_Equipement` (`id_type_equipement`),
  ADD KEY `id_equipement_constructeur` (`id_equipement_constructeur`);

--
-- Index pour la table `equipement_constructeur`
--
ALTER TABLE `equipement_constructeur`
  ADD PRIMARY KEY (`id_equipement_constructeur`);

--
-- Index pour la table `equipement_informations`
--
ALTER TABLE `equipement_informations`
  ADD PRIMARY KEY (`id_equipement_informations`),
  ADD UNIQUE KEY `date_equipement_informations` (`date_equipement_informations`,`id_equipement`),
  ADD KEY `equipement` (`id_equipement`),
  ADD KEY `screen_size_equipement_informations` (`screen_size_equipement_informations`),
  ADD KEY `id_equipement` (`id_equipement`),
  ADD KEY `assembly_location` (`assembly_location`),
  ADD KEY `capacity_stockage_equipement_informations` (`capacity_stockage_equipement_informations`);

--
-- Index pour la table `gaz_emission_equipement`
--
ALTER TABLE `gaz_emission_equipement`
  ADD PRIMARY KEY (`id_gaz_emission_equipement`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notifications`);

--
-- Index pour la table `notifications_type`
--
ALTER TABLE `notifications_type`
  ADD PRIMARY KEY (`id_notifications_type`);

--
-- Index pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  ADD PRIMARY KEY (`id_type_equipement`);

--
-- Index pour la table `use_location`
--
ALTER TABLE `use_location`
  ADD PRIMARY KEY (`id_use_location`);

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id_equipement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `equipement_constructeur`
--
ALTER TABLE `equipement_constructeur`
  MODIFY `id_equipement_constructeur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `equipement_informations`
--
ALTER TABLE `equipement_informations`
  MODIFY `id_equipement_informations` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `gaz_emission_equipement`
--
ALTER TABLE `gaz_emission_equipement`
  MODIFY `id_gaz_emission_equipement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notifications` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `notifications_type`
--
ALTER TABLE `notifications_type`
  MODIFY `id_notifications_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- AUTO_INCREMENT pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  MODIFY `id_type_equipement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `use_location`
--
ALTER TABLE `use_location`
  MODIFY `id_use_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
