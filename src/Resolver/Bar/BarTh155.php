<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh155
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'typeEquipement',
            'typeExtracteurEquipement',
            'nombreLogements',
            'puissanceChaudieresEligibles',
            'etasEquipement',
            'copEquipement',
            'usageEcsEquipement',
            'nombreLogements'
        ];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 17700 * $data['nombreLogements'] * self::getFacteur($data);
            case Value::ZONE_CLIMATIQUE_H2:
                return 14500 * $data['nombreLogements'] * self::getFacteur($data);
            case Value::ZONE_CLIMATIQUE_H3:
                return 9700 * $data['nombreLogements'] * self::getFacteur($data);
            default:
                return null;
        }
    }

    private static function getFacteur(array $data): ?float
    {
        switch ($data['typeEquipement']) {
            case 'type_A':
                switch ($data['typeExtracteurEquipement']) {
                    case 'basse_consommation':
                        return 0.98;
                    case 'standard':
                        return 0.93;
                    default:
                        return null;
                }
            case 'type_B':
                switch ($data['typeExtracteurEquipement']) {
                    case 'basse_consommation':
                        return 1;
                    case 'standard':
                        return 0.95;
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
