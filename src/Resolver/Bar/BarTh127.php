<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh127
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeInstallation', 'typeEquipement', 'typeCaissonEquipement'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeInstallation']) {
            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 31600 * Common::facteurCorrectifMaison($data['surfaceHabitable']) * self::getFacteur($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 25900 * Common::facteurCorrectifMaison($data['surfaceHabitable']) * self::getFacteur($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 17200 * Common::facteurCorrectifMaison($data['surfaceHabitable']) * self::getFacteur($data);
                    default:
                        return null;
                }
            case Value::TYPE_INSTALLATION_COLLECTIF:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 21800 * $data['nombreLogements'] * self::getFacteur($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 17800 * $data['nombreLogements'] * self::getFacteur($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 11900 * $data['nombreLogements'] * self::getFacteur($data);
                    default:
                        return null;
                }
            default:
                return null;
        }
    }

    private static function getFacteur(array $data): ?float
    {
        switch ($data['typeInstallation']) {
            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                switch ($data['typeEquipement']) {
                    case Value::BAR_TH_155_TYPE_A:
                        switch ($data['typeCaissonEquipement']) {
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_CONSOMMATION:
                                return 0.9;
                            default:
                                return null;
                        }
                    case Value::BAR_TH_127_TYPE_B:
                        switch ($data['typeCaissonEquipement']) {
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_CONSOMMATION:
                                return 1;
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            case Value::TYPE_INSTALLATION_COLLECTIF:
                switch ($data['typeEquipement']) {
                    case Value::BAR_TH_155_TYPE_A:
                        switch ($data['typeCaissonEquipement']) {
                            case Value::BAR_TH_127_TYPE_CAISSON_STANDARD:
                                return 0.91;
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_CONSOMMATION:
                                return 0.96;
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_PRESSION:
                                return 0.76;
                            default:
                                return null;
                        }
                    case Value::BAR_TH_127_TYPE_B:
                        switch ($data['typeCaissonEquipement']) {
                            case Value::BAR_TH_127_TYPE_CAISSON_STANDARD:
                                return 0.95;
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_CONSOMMATION:
                                return 1;
                            case Value::BAR_TH_127_TYPE_CAISSON_BASSE_PRESSION:
                                return 0.78;
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
