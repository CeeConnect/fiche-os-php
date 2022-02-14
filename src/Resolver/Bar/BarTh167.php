<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh167
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'typeBatiment',
            'typeEquipement',
            'surfaceHabitable',
            'nombreLogements'
        ];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['typeEquipement']) {
                            case Value::BAR_TH_167_HAUT_RENDEMENT:
                                return 30700 * self::getFacteur($data);
                            case Value::BAR_TH_167_CONDENSATION:
                                return 36500 * self::getFacteur($data);
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['typeEquipement']) {
                            case Value::BAR_TH_167_HAUT_RENDEMENT:
                                return 26000 * self::getFacteur($data);
                            case Value::BAR_TH_167_CONDENSATION:
                                return 31100 * self::getFacteur($data);
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['typeEquipement']) {
                            case Value::BAR_TH_167_HAUT_RENDEMENT:
                                return 22200 * self::getFacteur($data);
                            case Value::BAR_TH_167_CONDENSATION:
                                return 27400 * self::getFacteur($data);
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 32000 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 28500 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 23500 * $data['nombreLogements'];
                    default:
                        return null;
                }
            default:
                return null;
        }
    }

    private static function getFacteur(array $data): ?float
    {
        if ($data['surfaceHabitable'] < 70) {
            return 0.7;
        } else if ($data['surfaceHabitable'] < 90) {
            return 0.9;
        } else if ($data['surfaceHabitable'] < 130) {
            return 1;
        } else if ($data['surfaceHabitable'] > 130) {
            return 1.2;
        } else {
            return null;
        }
    }
}
