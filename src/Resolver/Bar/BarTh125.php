<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh125
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeInstallation', 'typeEquipement', 'surfaceHabitable', 'nombreLogements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeInstallation']) {
            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                switch ($data['typeEquipement']) {
                    case Value::BAR_TH_125_TYPE_AUTOREGLABLE:
                        switch ($data['zoneClimatique']) {
                            case Value::ZONE_CLIMATIQUE_H1:
                                return 39700 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            case Value::ZONE_CLIMATIQUE_H2:
                                return 32500 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            case Value::ZONE_CLIMATIQUE_H3:
                                return 21600 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            default:
                                return null;
                        }
                    case Value::BAR_TH_125_TYPE_MODULE:
                        switch ($data['zoneClimatique']) {
                            case Value::ZONE_CLIMATIQUE_H1:
                                return 42000 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            case Value::ZONE_CLIMATIQUE_H2:
                                return 34400 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            case Value::ZONE_CLIMATIQUE_H3:
                                return 22900 * Common::facteurCorrectifMaison($data['surfaceHabitable']);
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            case Value::TYPE_INSTALLATION_COLLECTIF:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 23000 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 18800 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 12500 * $data['nombreLogements'];
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
