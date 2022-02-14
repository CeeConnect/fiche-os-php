<?php

namespace CeeConnect\FicheOS\Value;

class Value
{
    /**
     * Catégorie de ressource
     */
    public const CATEGORIE_RESSOURCE_TRES_MODESTE = 'tres_modeste';
    public const CATEGORIE_RESSOURCE_MODESTE = 'modeste';
    public const CATEGORIE_RESSOURCE_INTERMEDIAIRE = 'intermediaire';
    public const CATEGORIE_RESSOURCE_SUPERIEUR = 'superieur';

    /**
     * Class efficacité énergétique
     */
    public const CLASSE_ENERGIE_A = 'A';
    public const CLASSE_ENERGIE_A1 = 'A+';
    public const CLASSE_ENERGIE_A2 = 'A++';
    public const CLASSE_ENERGIE_A3 = 'A+++';
    public const CLASSE_ENERGIE_A4 = 'A++++';

    /**
     * Energie de chauffage
     */
    public const ENERGIE_CHAUFFAGE_ELECTRICITE = 'electricite';
    public const ENERGIE_CHAUFFAGE_GAZ_NATUREL = 'gaz_naturel';
    public const ENERGIE_CHAUFFAGE_FIOUL = 'fioul';
    public const ENERGIE_CHAUFFAGE_PAC = 'pac';
    public const ENERGIE_CHAUFFAGE_BOIS = 'bois';
    public const ENERGIE_CHAUFFAGE_GPL = 'gpl';
    public const ENERGIE_CHAUFFAGE_CHARBON = 'charbon';
    public const ENERGIE_CHAUFFAGE_COMBUSTIBLE = 'combustible';

    /**
     * Secteur d'application
     */
    public const SECTEUR_AGRI = 'AGRI';
    public const SECTEUR_BAR = 'BAR';
    public const SECTEUR_BAT = 'BAT';
    public const SECTEUR_IND = 'IND';
    public const SECTEUR_RES = 'RES';
    public const SECTEUR_TRA = 'TRA';

    /**
     * Type installation / chauffage
     */
    public const TYPE_INSTALLATION_INDIVIDUEL = 'individuel';
    public const TYPE_INSTALLATION_COLLECTIF = 'collectif';

    /**
     * Type d'isolation
     */
    public const TYPE_ISOLATION_ITE = 'ite';
    public const TYPE_ISOLATION_ITI = 'iti';

    /**
     * Type de bâtiment
     */
    public const TYPE_BATIMENT_MAISON = 'maison';
    public const TYPE_BATIMENT_APPARTEMENT = 'appartement';
    public const TYPE_BATIMENT_IMMEUBLE = 'immeuble';

    /**
     * Zone climatique
     */
    public const ZONE_CLIMATIQUE_H1 = 'H1';
    public const ZONE_CLIMATIQUE_H2 = 'H2';
    public const ZONE_CLIMATIQUE_H3 = 'H3';

    /**
     * BAR-EN-101
     */
    public const BAR_EN_101_COMBLES_PERDUS = 'combles_perdus';
    public const BAR_EN_101_RAMPANT = 'rampant';

    /**
     * BAR-EQ-103
     */
    public const BAR_EQ_103_REFRIGERATEUR = 'refrigerateur';
    public const BAR_EQ_103_CONGELATEUR = 'congelateur';

    /**
     * BAR-EQ-110
     */
    public const BAR_EQ_110_TYPE_DETECTION_SIMPLE = 'simple';
    public const BAR_EQ_110_TYPE_DETECTION_MULTIPLE = 'multiple';

    /**
     * BAR-SE-106
     */
    public const BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE = 'chauffage_electrique';
    public const BAR_SE_106_USAGE_CHAUFFAGE_GAZ = 'chauffage_gaz';
    public const BAR_SE_106_USAGE_ELECTRICITE = 'electricite_specifique';

    /**
     * BAR-TH-127
     */
    public const BAR_TH_127_TYPE_A = 'type_A';
    public const BAR_TH_127_TYPE_B = 'type_B';
    public const BAR_TH_127_TYPE_CAISSON_BASSE_CONSOMMATION = 'basse_consommation';
    public const BAR_TH_127_TYPE_CAISSON_BASSE_PRESSION = 'basse_pression';
    public const BAR_TH_127_TYPE_CAISSON_STANDARD = 'standard';

    /**
     * BAR-TH-155
     */
    public const BAR_TH_155_TYPE_A = 'type_A';
    public const BAR_TH_155_TYPE_B = 'type_B';
    public const BAR_TH_155_TYPE_EXTRACTEUR_BASSE_CONSOMMATION = 'basse_consommation';
    public const BAR_TH_155_TYPE_EXTRACTEUR_STANDARD = 'standard';

    /**
     * BAR-TH-161
     */
    public const BAR_TH_161_TYPE_ECHANGEUR = 'echangeur_plaques';
    public const BAR_TH_161_TYPE_AUTRES = 'autres';

    /**
     * BAR-TH-167
     */
    public const BAR_TH_167_HAUT_RENDEMENT = 'haut_rendement';
    public const BAR_TH_167_CONDENSATION = 'contensation';
}
