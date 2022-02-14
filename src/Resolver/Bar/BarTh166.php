<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh166
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'puissanceEquipementsEligibles',
            'puissanceFinaleChaufferie',
            'puissanceChaudieresEligibles',
            'puissancePacEligibles',
            'etasEquipement',
            'usageEcsEquipement',
            'nombreLogements'
        ];
    }

    public static function get(array $data): ?float
    {
        if ($data['etasEquipement'] >= 111 && $data['etasEquipement'] < 120) {
            switch ($data['zoneClimatique']) {
                case Value::ZONE_CLIMATIQUE_H1:
                    return $data['usageEcsEquipement']
                        ? 52000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 34000 * $data['nombreLogements'] * self::getFacteur($data);
                case Value::ZONE_CLIMATIQUE_H2:
                    return $data['usageEcsEquipement']
                        ? 43000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 28000 * $data['nombreLogements'] * self::getFacteur($data);
                case Value::ZONE_CLIMATIQUE_H3:
                    return $data['usageEcsEquipement']
                        ? 34000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 18700 * $data['nombreLogements'] * self::getFacteur($data);
                default:
                    return null;
            }
        } else if ($data['etasEquipement'] >= 120) {
            switch ($data['zoneClimatique']) {
                case Value::ZONE_CLIMATIQUE_H1:
                    return $data['usageEcsEquipement']
                        ? 65000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 43000 * $data['nombreLogements'] * self::getFacteur($data);
                case Value::ZONE_CLIMATIQUE_H2:
                    return $data['usageEcsEquipement']
                        ? 55000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 35000 * $data['nombreLogements'] * self::getFacteur($data);
                case Value::ZONE_CLIMATIQUE_H3:
                    return $data['usageEcsEquipement']
                        ? 43000 * $data['nombreLogements'] * self::getFacteur($data)
                        : 23700 * $data['nombreLogements'] * self::getFacteur($data);
                default:
                    return null;
            }
        }
        return null;;
    }

    private static function getFacteur(array $data): ?float
    {
        if ($data['puissanceChaudieresEligibles'] || $data['puissancePacEligibles']) {
            return $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
                ? $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie']
                : 1;
        }
        return $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
            ? $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie']
            : 1;
    }
}
