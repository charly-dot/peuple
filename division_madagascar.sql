-- Administrateur 5.2.1 MariaDB 10.4.32-Vidage MariaDB

ENSEMBLE DE NOMS utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

ENSEMBLE DE NOMS utf8mb4;

SUPPRIMER LA TABLE SI EXISTE `commune`;
CR�ER LA TABLE `commune` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_reg` varchar(60) NON NULL,
  `nom` varchar(60) NON NULL,
  `prenom` varchar(60) NON NULL,
  `t�l�phone` varchar(60) NON NULL,
  `nom_pro` varchar(60) NON NULL,
  `nom_cum` varchar(60) NON NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `commune` (`id`, `nom_reg`, `nom`, `prenom`, `telephone`, `nom_pro`, `nom_cum`) VALEURS
(34, 'AVARADRANO', 'habitant', 'k', '544', '0', 'commune AVARADRAN') ;

SUPPRIMER LA TABLE SI EXISTE `district`;
CR�ER LA TABLE `district` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `non_distric` varchar(60) PAR D�FAUT NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;


SUPPRIMER LA TABLE SI EXISTE `fokotany`;
CR�ER LA TABLE `fokotany` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom` varchar(60) PAR D�FAUT NULL,
  `prenom` varchar(60) NULL PAR D�FAUT,
  `t�l�phone` varchar(60) PAR D�FAUT NULL,
  `nom_pro` varchar(60) PAR D�FAUT NULL,
  `nom_reg` varchar(60) PAR D�FAUT NULL,
  `nom_fkt` varchar(60) NULL PAR D�FAUT,
  `nom_comm` varchar(60) PAR D�FAUT NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `fokotany` (`id`, `nom`, `prenom`, `telephone`, `nom_pro`, `nom_reg`, `nom_fkt`, `nom_comm`) VALEURS
(19, 'k', 'k', '5', 'tananarivo', 'AVARADRANO', '67HA', 'commune AVARADRANO'),
(20, 'k', 'k', '5', 'tananarivo', 'AVARADRANO', 'ANDAVAMAMBA', 'commune AVARADRANO') ;

SUPPRIMER LA TABLE SI EXISTE `habitant`;
CR�ER LA TABLE `habitant` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_reg` varchar(60) PAR D�FAUT NULL,
  `nom_pro` varchar(60) PAR D�FAUT NULL,
  `nom_cum` varchar(60) PAR D�FAUT NULL,
  `adress` varchar(60) PAR D�FAUT NULL,
  `prenom` varchar(60) NULL PAR D�FAUT,
  `nom` varchar(60) PAR D�FAUT NULL,
  `date_de_naissance` varchar(60) NULL PAR D�FAUT,
  `t�l�phone` varchar(255) PAR D�FAUT NULL,
  `cin` varchar(255) PAR D�FAUT NULL,
  `genre` varchar(60) PAR D�FAUT NULL,
  `lieu_de_naissance` varchar(255) NULL PAR D�FAUT,
  `nom_fkt` varchar(60) NULL PAR D�FAUT,
  `nom_maison` varchar(60) NULL PAR D�FAUT,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `habitant` (`id`, `nom_reg`, `nom_pro`, `nom_cum`, `adress`, `prenom`, `nom`, `date_de_naissance`, `telephone`, `cin`, `genre`, `lieu_de_naissance`, `nom_fkt`, `nom_maison`) VALEURS
(19, 'AVARADRANO', 'tananarivo', '0', 'b10', 'k', 'ZAHA', '2025-06-18', '23452345', '3452345', 'femme', 'QSDFQSDF', '67HA', '37'),
(20, 'AVARADRANO', 'tananarivo', '0', 'B11', 'ZERTZERTFFFFFFFFFFFFFF', 'ZAREO', '2025-06-03', '23452345', '352345', 'homme', 'ZERTZERT', 'ANDAVAMAMBA', '39'),
(21, 'AVARADRANO', 'tananarivo', '0', 'b10', 'k', 'k', '2025-06-25', '876', '78676576', 'homme', 'QSDFQSDF', '67HA', '37'),
(22, 'AVARADRANO', 'tananarivo', '0', 'b10', 'k', 'k', '2025-06-26', '987987', '9768976976', 'homme', 'lkjh', '67HA', '37');

DROP TABLE IF EXISTS `maison`;
CR�ER LA TABLE `maison` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_reg` varchar(60) PAR D�FAUT NULL,
  `nom_pro` varchar(60) PAR D�FAUT NULL,
  `nom_cum` varchar(60) PAR D�FAUT NULL,
  `adress` varchar(60) PAR D�FAUT NULL,
  `nom_fkt` varchar(60) NULL PAR D�FAUT,
  `nom` varchar(60) PAR D�FAUT NULL,
  `prenom` varchar(60) NULL PAR D�FAUT,
  `t�l�phone` varchar(60) PAR D�FAUT NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `maison` (`id`, `nom_reg`, `nom_pro`, `nom_cum`, `adress`, `nom_fkt`, `nom`, `prenom`, `telephone`) VALEURS
(24, 'k', 'region1', '0', 'kKKKKKK', 'k', 'k', 'k', '7'),
(25, 'k', 'r�gion1', '0', 'k', 'k', 'k', 'k', '0'),
(26, NULL, NULL, NULL, 'HOBY', NULL, 'LANTO', 'habitant', '8979879'),
(27, NULL, NULL, NULL, 'ZAREO', NULL, 'k', 'k', '8976876'),
(28, NULL, NULL, NULL, 'k', NULL, 'k', 'k', '76788'),
(29, NULL, NULL, NULL, 'ZAHAY', NULL, 'SDQFS', 'SQF', '8768'),
(30, NULL, NULL, NULL, 'aty ^non', NULL, 'aty ^nay', 'aty ^nay', '7657657'),
(31, NULL, NULL, NULL, 'k', NULL, 'k', 'k', '5'),
(37, 'AVARADRANO', 'tananarivo', '0', 'b10', '67HA', 'k', 'k', '8687'),
(38, 'AVARADRANO', 'tananarivo', '0', 'k', '67HA', 'k', 'k', '3452345'),
(39, 'AVARADRANO', 'tananarivo', '0', 'B11', 'ANDAVAMAMBA', 'ZEAZ', 'AZERA', '23452345') ;

SUPPRIMER LA TABLE SI EXISTE `province`;
CR�ER LA TABLE `province` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_pro` varchar(60) PAR D�FAUT NULL,
  `nom` varchar(60) PAR D�FAUT NULL,
  `prenom` varchar(60) NULL PAR D�FAUT,
  `t�l�phone` varchar(60) PAR D�FAUT NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `province` (`id`, `nom_pro`, `nom`, `prenom`, `telephone`) VALEURS
(10, 'tananarivo', 'charly', 'LANTOTIANA Joseph', '875876'),
(11, 'FIANARATSOA', 'k', 'KGHSFDH', '5') ;

SUPPRIMER LA TABLE SI EXISTE `region`;
CR�ER LA TABLE `r�gion` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_reg` varchar(60) PAR D�FAUT NULL,
  `nom` varchar(60) PAR D�FAUT NULL,
  `prenom` varchar(60) NULL PAR D�FAUT,
  `t�l�phone` varchar(60) PAR D�FAUT NULL,
  `nom_pro` varchar(60) PAR D�FAUT NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `region` (`id`, `nom_reg`, `nom`, `prenom`, `telephone`, `nom_pro`) VALEURS
(14, 'AVARADRANO', 'habitant', 'kSSS', '5', '10'),
(15, 'ATSIMONDRANO', 'habitant', 'k', '5444', '10') ;

DROP TABLE SI EXISTE `utilisateur`;
CR�ER LA TABLE `utilisateur` (
  `id` int(11) NON NULL AUTO_INCREMENT,
  `nom_du_compte` varchar(60) NULL PAR D�FAUT,
  `pss` varchar(60) PAR D�FAUT NULL,
  `email` varchar(60) NON NULL,
  CL� PRIMAIRE (`id`)
) MOTEUR=InnoDB JEU DE CARACT�RES PAR D�FAUT=utf8mb4 COLLATE=utf8mb4_general_ci;

INS�RER DANS `utilisateur` (`id`, `nom_du_compte`, `pss`, `email`) VALEURS
(1, 'charly', '0000', 'charly@gmail.com');

-- 2025-06-24 07:56:04 UTC