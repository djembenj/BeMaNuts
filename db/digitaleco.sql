-- Nuts by BeMa
-- V1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Base de données :  `digitaleco`
--

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

-- --------------------------------------------------------

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

-- --------------------------------------------------------

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
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(10) NOT NULL,
  `name_fr_pays` varchar(255) NOT NULL,
  `code_pays` varchar(3) DEFAULT NULL,
  `name_ma_pays` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='La listes de pays Cooptalis';

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `name_fr_pays`, `code_pays`, `name_ma_pays`) VALUES
(1, 'France', 'FR', 'FR'),
(2, 'Maroc', 'MA', 'MA'),
(3, 'Tunisie', 'TN', 'TN'),
(4, 'Vietnam', 'VN', 'VN'),
(5, 'Canada', 'CA', 'CA'),
(106, 'Afghanistan', 'AF', NULL),
(107, 'Afrique du sud', 'ZA', NULL),
(108, 'Åland, îles', 'AX', NULL),
(109, 'Albanie', 'AL', NULL),
(110, 'Algérie', 'DZ', NULL),
(111, 'Allemagne', 'DE', NULL),
(112, 'Andorre', 'AD', NULL),
(113, 'Angola', 'AO', NULL),
(114, 'Anguilla', 'AI', NULL),
(115, 'Antarctique', 'AQ', NULL),
(116, 'Antigua et barbuda', 'AG', NULL),
(117, 'Arabie saoudite', 'SA', NULL),
(118, 'Argentine', 'AR', NULL),
(119, 'Arménie', 'AM', NULL),
(120, 'Aruba', 'AW', NULL),
(121, 'Australie', 'AU', NULL),
(122, 'Autriche', 'AT', NULL),
(123, 'Azerbaïdjan', 'AZ', NULL),
(124, 'Bahamas', 'BS', NULL),
(125, 'Bahreïn', 'BH', NULL),
(126, 'Bangladesh', 'BD', NULL),
(127, 'Barbade', 'BB', NULL),
(128, 'Bélarus', 'BY', NULL),
(129, 'Belgique', 'BE', NULL),
(130, 'Belize', 'BZ', NULL),
(131, 'Bénin', 'BJ', NULL),
(132, 'Bermudes', 'BM', NULL),
(133, 'Bhoutan', 'BT', NULL),
(134, 'Bolivie, l\'état plurinational de', 'BO', NULL),
(135, 'Bonaire, saint eustache et saba', 'BQ', NULL),
(136, 'Bosnie herzégovine', 'BA', NULL),
(137, 'Botswana', 'BW', NULL),
(138, 'Bouvet, île', 'BV', NULL),
(139, 'Brésil', 'BR', NULL),
(140, 'Brunei darussalam', 'BN', NULL),
(141, 'Bulgarie', 'BG', NULL),
(142, 'Burkina faso', 'BF', NULL),
(143, 'Burundi', 'BI', NULL),
(144, 'Caïmans, îles', 'KY', NULL),
(145, 'Cambodge', 'KH', NULL),
(146, 'Cameroun', 'CM', NULL),
(147, 'Cap vert', 'CV', NULL),
(148, 'Centrafricaine, république', 'CF', NULL),
(149, 'Chili', 'CL', NULL),
(150, 'Chine', 'CN', NULL),
(151, 'Christmas, île', 'CX', NULL),
(152, 'Chypre', 'CY', NULL),
(153, 'Cocos (keeling), îles', 'CC', NULL),
(154, 'Colombie', 'CO', NULL),
(155, 'Comores', 'KM', NULL),
(156, 'Congo', 'CG', NULL),
(157, 'Congo, la république démocratique du', 'CD', NULL),
(158, 'Cook, îles', 'CK', NULL),
(159, 'Corée, république de', 'KR', NULL),
(160, 'Corée, république populaire démocratique de', 'KP', NULL),
(161, 'Costa rica', 'CR', NULL),
(162, 'Iraq', 'IQ', NULL),
(163, 'Irlande', 'IE', NULL),
(164, 'Islande', 'IS', NULL),
(165, 'Israël', 'IL', NULL),
(166, 'Italie', 'IT', NULL),
(167, 'Jamaïque', 'JM', NULL),
(168, 'Japon', 'JP', NULL),
(169, 'Jersey', 'JE', NULL),
(170, 'Jordanie', 'JO', NULL),
(171, 'Kazakhstan', 'KZ', NULL),
(172, 'Kenya', 'KE', NULL),
(173, 'Kirghizistan', 'KG', NULL),
(174, 'Kiribati', 'KI', NULL),
(175, 'Koweït', 'KW', NULL),
(176, 'Lao, république démocratique populaire', 'LA', NULL),
(177, 'Lesotho', 'LS', NULL),
(178, 'Lettonie', 'LV', NULL),
(179, 'Liban', 'LB', NULL),
(180, 'Libéria', 'LR', NULL),
(181, 'Libye', 'LY', NULL),
(182, 'Liechtenstein', 'LI', NULL),
(183, 'Lituanie', 'LT', NULL),
(184, 'Luxembourg', 'LU', NULL),
(185, 'Macao', 'MO', NULL),
(186, 'Macédoine, l\'ex république yougoslave de', 'MK', NULL),
(187, 'Madagascar', 'MG', NULL),
(188, 'Malaisie', 'MY', NULL),
(189, 'Malawi', 'MW', NULL),
(190, 'Maldives', 'MV', NULL),
(191, 'Mali', 'ML', NULL),
(192, 'Malte', 'MT', NULL),
(193, 'Mariannes du nord, îles', 'MP', NULL),
(194, 'Marshall, îles', 'MH', NULL),
(195, 'Martinique', 'MQ', NULL),
(196, 'Maurice', 'MU', NULL),
(197, 'Mauritanie', 'MR', NULL),
(198, 'Mayotte', 'YT', NULL),
(199, 'Mexique', 'MX', NULL),
(200, 'Micronésie, états fédérés de', 'FM', NULL),
(201, 'Moldova, république de', 'MD', NULL),
(202, 'Monaco', 'MC', NULL),
(203, 'Mongolie', 'MN', NULL),
(204, 'Monténégro', 'ME', NULL),
(205, 'Montserrat', 'MS', NULL),
(206, 'Mozambique', 'MZ', NULL),
(207, 'Myanmar', 'MM', NULL),
(208, 'Namibie', 'NA', NULL),
(209, 'Nauru', 'NR', NULL),
(210, 'Népal', 'NP', NULL),
(211, 'Nicaragua', 'NI', NULL),
(212, 'Niger', 'NE', NULL),
(213, 'Nigéria', 'NG', NULL),
(214, 'Niué', 'NU', NULL),
(215, 'Norfolk, île', 'NF', NULL),
(216, 'Norvège', 'NO', NULL),
(217, 'Nouvelle calédonie', 'NC', NULL),
(218, 'Nouvelle zélande', 'NZ', NULL),
(219, 'Océan indien, territoire britannique de l\'', 'IO', NULL),
(220, 'Oman', 'OM', NULL),
(221, 'Ouganda', 'UG', NULL),
(222, 'Ouzbékistan', 'UZ', NULL),
(223, 'Pakistan', 'PK', NULL),
(224, 'Palaos', 'PW', NULL),
(225, 'Palestinien occupé, territoire', 'PS', NULL),
(226, 'Panama', 'PA', NULL),
(227, 'Papouasie nouvelle guinée', 'PG', NULL),
(228, 'Paraguay', 'PY', NULL),
(229, 'Pays bas', 'NL', NULL),
(230, 'Pérou', 'PE', NULL),
(231, 'Philippines', 'PH', NULL),
(232, 'Pitcairn', 'PN', NULL),
(233, 'Pologne', 'PL', NULL),
(234, 'Polynésie française', 'PF', NULL),
(235, 'Porto rico', 'PR', NULL),
(236, 'Portugal', 'PT', NULL),
(237, 'Qatar', 'QA', NULL),
(238, 'Réunion', 'RE', NULL),
(239, 'Roumanie', 'RO', NULL),
(240, 'Royaume uni', 'GB', NULL),
(241, 'Russie, fédération de', 'RU', NULL),
(242, 'Rwanda', 'RW', NULL),
(243, 'Sahara occidental', 'EH', NULL),
(244, 'Saint barthélemy', 'BL', NULL),
(245, 'Sainte hélène, ascension et tristan da cunha', 'SH', NULL),
(246, 'Sainte lucie', 'LC', NULL),
(247, 'Saint kitts et nevis', 'KN', NULL),
(248, 'Saint marin', 'SM', NULL),
(249, 'Saint martin(partie française)', 'MF', NULL),
(250, 'Saint martin (partie néerlandaise)', 'SX', NULL),
(251, 'Saint pierre et miquelon', 'PM', NULL),
(252, 'Saint siège (état de la cité du vatican)', 'VA', NULL),
(253, 'Saint vincent et les grenadines', 'VC', NULL),
(254, 'Salomon, îles', 'SB', NULL),
(255, 'Samoa', 'WS', NULL),
(256, 'Samoa américaines', 'AS', NULL),
(257, 'Sao tomé et principe', 'ST', NULL),
(258, 'Sénégal', 'SN', NULL),
(259, 'Serbie', 'RS', NULL),
(260, 'Seychelles', 'SC', NULL),
(261, 'Sierra leone', 'SL', NULL),
(262, 'Singapour', 'SG', NULL),
(263, 'Slovaquie', 'SK', NULL),
(264, 'Slovénie', 'SI', NULL),
(265, 'Somalie', 'SO', NULL),
(266, 'Soudan', 'SD', NULL),
(267, 'Soudan du sud', 'SS', NULL),
(268, 'Sri lanka', 'LK', NULL),
(269, 'Suède', 'SE', NULL),
(270, 'Suisse', 'CH', NULL),
(271, 'Suriname', 'SR', NULL),
(272, 'Svalbard et île jan mayen', 'SJ', NULL),
(273, 'Swaziland', 'SZ', NULL),
(274, 'Syrienne, république arabe', 'SY', NULL),
(275, 'Tadjikistan', 'TJ', NULL),
(276, 'Taïwan, province de chine', 'TW', NULL),
(277, 'Tanzanie, république unie de', 'TZ', NULL),
(278, 'Tchad', 'TD', NULL),
(279, 'Tchèque, république', 'CZ', NULL),
(280, 'Terres australes françaises', 'TF', NULL),
(281, 'Thaïlande', 'TH', NULL),
(282, 'Timor leste', 'TL', NULL),
(283, 'Togo', 'TG', NULL),
(284, 'Tokelau', 'TK', NULL),
(285, 'Tonga', 'TO', NULL),
(286, 'Trinité et tobago', 'TT', NULL),
(287, 'Turkménistan', 'TM', NULL),
(288, 'Turks et caïcos, îles', 'TC', NULL),
(289, 'Turquie', 'TR', NULL),
(290, 'Tuvalu', 'TV', NULL),
(291, 'Ukraine', 'UA', NULL),
(292, 'Uruguay', 'UY', NULL),
(293, 'Vanuatu', 'VU', NULL),
(294, 'Venezuela, république bolivarienne du', 'VE', NULL),
(295, 'Wallis et futuna', 'WF', NULL),
(296, 'Yémen', 'YE', NULL),
(297, 'Zambie', 'ZM', NULL),
(298, 'Zimbabwe', 'ZW', NULL);

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
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `id_pays` int(10) NOT NULL,
  `login` varchar(200) DEFAULT NULL,
  `date_derniere_connexion_user` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  ADD PRIMARY KEY (`id_type_equipement`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `mail_user` (`mail_user`),
  ADD KEY `id_pays` (`id_pays`);

--
-- Index pour la table `use_location`
--
ALTER TABLE `use_location`
  ADD PRIMARY KEY (`id_use_location`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id_equipement` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipement_constructeur`
--
ALTER TABLE `equipement_constructeur`
  MODIFY `id_equipement_constructeur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `equipement_informations`
--
ALTER TABLE `equipement_informations`
  MODIFY `id_equipement_informations` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gaz_emission_equipement`
--
ALTER TABLE `gaz_emission_equipement`
  MODIFY `id_gaz_emission_equipement` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notifications` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications_type`
--
ALTER TABLE `notifications_type`
  MODIFY `id_notifications_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  MODIFY `id_type_equipement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `use_location`
--
ALTER TABLE `use_location`
  MODIFY `id_use_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
